<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>
	<?php
					    
if(isset($_POST['submit']))
{ 
		
$dp=$_FILES['pic'];
if ( $dp['error']==0)
{
$src=$dp['tmp_name'];
$tgt="images/stockcat/".$dp['name'];
move_uploaded_file($src,$tgt) or die ("file not uploaded");
}

foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}	
		$qs="SELECT * FROM `stock_headers` where `name` ='$prstockhead';";
		$mr=mysqli_query($con,$qs);
		$myrs=mysqli_fetch_array($mr);
		$pcat=$myrs['shid'];
		$t=time();
		$qq="INSERT INTO `stock_headers` (`shid`, `name`, `parent_shid`, `parent_cat`, `type`, `create_date`, `created_by`, `pic`, `barcode`, `extra1`, `extra2`) VALUES (NULL, '$catname', '$pcat', '$prstockhead', '$type', '$t', '$usr', '$tgt', '$bc', '', '');";
		mysqli_query($con,$qq);
		echo "<script>alert('Data Is Saved...');</script>";
		echo "<script>window.location.href = 'addstockcat.php';</script>";
		
		
}		
					  ?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"> <h2>Add Stock Category</h2> </div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
				
                      <form method="post" action="addstockcat.php" enctype="multipart/form-data">
              						
							
		<?php   $qi="SELECT * FROM `stock_headers` where `parent_shid`='';"; ?>					
		<div class="body">
                        
						   
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Parent Category</span>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <select name="prstockhead" required  class="form-control show-tick" data-live-search="true">
                                            <option value="None" selected="selected">Select An Item</option>
								   <?php  
					  $rri=mysqli_query($con,$qi);
					  while($rsi=mysqli_fetch_array($rri))
					  { ?>
		 <option Value="<?php echo $rsi['name']; ?>">
		 <?php echo $rsi['type']."  >>  ".$rsi['name'];?></option>'; <?php } ?> 
					  </select>	
                                    </div>
                                </div>
                                
                            </div>
                         <! –– End Element  -->   
					 <! –– Start Element  --> 
						   
                            <div class="row clearfix">
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Category Name</span>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <input type="text" name="catname" class="form-control" placeholder="Category Name">
                                    </div>
                                </div>
                                
                            </div>
                         <! –– End Element  --> 
                    <! –– Start Element  --> 
						   
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Goods Type</span>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <select  class="form-control" name="type" class="form-control show-tick" data-live-search="true"><option value="asset">Assets</option><option value="Stock">Stock</option></select>
                                    </div>
                                </div>
                                
                            </div>
                         <! –– End Element  -->   
							 <! –– Start Element  --> 
						   
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <span>BarCode</span>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                       <input type="text" name="bc" class="form-control" placeholder="BarCode">
                                    </div>
                                </div>
                                
                            </div>
                         <! –– End Element  -->  
						 	 <! –– Start Element  --> 
						   
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Image</span>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                       <input type="file" name="pic" class="form-control">
                                    </div>
                                </div>
                                
                            </div>
                         <! –– End Element  --> 
							 <! –– Start Element  --> 
						   
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group">
                                       <input type="submit" name="submit" value="Save" class="form-control">
                                    </div>
                                </div>
                                
                            </div>
                         
  </div>					
	             	
						
                      </form>
                  </div>
          		</div><!-- col-lg-6--> 



				   	
          	
			
						<?php  // Code Ends Here/////  ?>
                        </div>
                        
                        <div class="col-lg-4"> 
                        <div class="card">
                        <div class="body">
                            
                            
                            
                            <ul class="nav nav-tabs p-0 mb-3">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Assets</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile">Consumable</a></li>
                            </ul>                        
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane in active" id="home">
                                    <h4 align="center">Category List</h4>
                                <table width="100%" border=1 >
                            <tr><th align="center">Sr</th><th align="center">Category</th><th align="center">Parent</th></tr>
                       
                    	<?php   $q1="SELECT * FROM `stock_headers` where `type`='asset';"; 
                            $qq11=mysqli_query($con,$q1);$srs=1;
		                    while($slist=mysqli_fetch_array($qq11))
		                    {
		                      ?>
		                      <tr><td><?php echo $srs;?></td><td><?php echo $slist['name'];?></td><td><?php echo $slist['parent_cat'];?></td></tr>
		                      <?php
		                      $srs++;
		                    }
		                    ?> </table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile">
                                     <h4 align="center">Category List</h4>
                                <table width="100%" border=1 >
                            <tr><th align="center">Sr</th><th align="center">Category</th><th align="center">Parent</th></tr>
                       
                    	<?php   $q12="SELECT * FROM `stock_headers` where `type`='Stock';"; 
                            $qq112=mysqli_query($con,$q12);$srs2=1;
		                    while($slist2=mysqli_fetch_array($qq112))
		                    {
		                      ?>
		                      <tr><td><?php echo $srs2;?></td><td><?php echo $slist2['name'];?></td><td><?php echo $slist2['parent_cat'];?></td></tr>
		                      <?php
		                      $srs2++;
		                    }
		                    ?> </table>
                                </div>
                               
                            </div>
                            
                        </div></div>
                        </div>
                    </div>
                </div>
            
</section>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="assets/bundles/mainscripts.bundle.js"></script>
</body>
</html>