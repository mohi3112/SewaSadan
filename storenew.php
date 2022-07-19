<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
					    
if(isset($_POST['addnow']))
{ 
		
$dp=$_FILES['pic'];
if ( $dp['error']==0)
{
$src=$dp['tmp_name'];
$tgt="images/stockitem/".$dp['name'];
move_uploaded_file($src,$tgt) or die ("file not uploaded");
}
$add_date=date('d',time());
$add_month=date('m',time());
$add_year=date('Y',time());
$added_on=time();

foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}	
if($itemname == "mattress"){$nb="gn";}		
if($itemname == "Blanket"){$nb="bl";}	
if($itemname == "Bedsheet"){$nb="bs";}	
if($itemname == "Pillow"){$nb="pl";}	
	$qi3="SELECT * FROM `stock_headers` where `shid`='$shid';"; 
					$rr3=mysqli_query($con,$qi3);
					  $rs3=mysqli_fetch_array($rr3);
					  $header=$rs3['name'];
					  $loop=0;
                      $chko="select * from `stock_assets` where `item_name`='$itemname'  order by `asset_id` desc;";
                      if($chold=mysqli_query($con,$chko))
                      {
                         $oldstockname=mysqli_fetch_array($chold);
                         $stkid=$oldstockname['barcode'];
                         $stkid2 = substr($stkid, 3); 
                         $newbr=$nb."-".$stkid2+1;
                      }
                      else
                      {
                         $newbr=$nb."-1";
                      }
                      
                     

					  while($loop<$quantity)
					  {

					  $addq=" INSERT INTO `stock_assets` (`asset_id`, `header_id`, `item_name`, `header`, `status`, `measures`, `stock_type`, `quality`, `color`, `count`, `barcode`, `pic`, `added_on`, `add_date`, `add_month`, `add_year`, `added_by`, `rate`, `vendor`,`dis_reason`, `discontinue_date`, `dis_date`, `dis_month`, `dis_year`, `discontinued_by`,`dis_note`, `stock_status`, `room`,`brand`) VALUES 
					  (NULL, '$shid', '$itemname', '$header', 'active', '$measures', '$stocktype', '$quality', '$color', '1', '$newbr', '$tgt', '$added_on', '$add_date', '$add_month', '$add_year', '$usr', '$rate', '$vendor','', '', '', '', '', '', '' , 'free','$room','$brand');";
					  mysqli_query($con,$addq);
					  $loop++;$newbr++;
					  }
	
}		
					  ?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"> <h2>Add New Assets</h2> </div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
				
                      <form method="post" action="storenew.php" enctype="multipart/form-data">
     						
		<div class="body">
                          
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Item Name</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                     <input type="text" name="itemname" class="form-group">   
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Parent Category</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
									<select name="shid"  class="form-control show-tick" data-live-search="true"> <option value="none">Please Select </option>
                                        <?php   $qi="SELECT * FROM `stock_headers` where `parent_shid`<>'0' and `type`='asset';"; 
					$rr=mysqli_query($con,$qi);
					  while($rs=mysqli_fetch_array($rr))
					  { ?>
					  <option value="<?php echo $rs['shid'];?>"><?php echo $rs['name'];?></option>
					  
					  <?php
					  }?>
                               </select>
							   </div>
                                </div>                               
                            </div>
                         <! –– End Element  -->         
					                           <! –– Start Element  --> 
						   
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Department</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <select name="brand"  class="form-control show-tick" data-live-search="true">
									   <option value="none">Select Option</option>
									   <?php   $qi34="SELECT * FROM `brands`;"; 
					$rr34=mysqli_query($con,$qi34);
					  while($rs34=mysqli_fetch_array($rr34))
					  { ?>
					  <option value="<?php echo $rs34['bid'];?>"><?php echo $rs34['name'];?></option>
					  
					  <?php
					  }?>
									   
									   </select>
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Stock Type</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <select name="stocktype"  class="form-control show-tick" data-live-search="true">
									   <option value="none">Select Option</option>
									   <option value="running" selected="selected">Running Stock</option>
									   <option value="reserve">Reserve Stock</option>
									   
									   </select> 
                                    </div>
                                </div>                               
                            </div>
                         <! –– End Element  -->                            <! –– Start Element  --> 
						   
                            <div class="row clearfix">

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Rate</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <input type="text" name="rate" class="form-group">    
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Quantity</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="quantity" class="form-group">     
                                    </div>
                                </div>                               
                            </div>
                         <! –– End Element  -->                            <! –– Start Element  --> 
						   
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Measure</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <select name="measures"  class="form-control show-tick" data-live-search="true">
									   <option value="none">Select Option</option>
									   <option value="grams">Grams</option>
									   <option value="kg">Kilograms(kg)</option>
									   <option value="pcs">Pieces(pcs)</option>
									   <option value="ltr">Liters(ltr)</option>
									   <option value="meter">Meters(M)</option>
									   </select>   
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Vendor</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="vendor"  class="form-control show-tick" data-live-search="true"> <option value="none">Please Select </option>
                                        <?php   $qi2="SELECT * FROM `stock_vendors`;"; 
					$rr2=mysqli_query($con,$qi2);
					  while($rs2=mysqli_fetch_array($rr2))
					  { ?>
					  <option value="<?php echo $rs2['name'];?>"><?php echo $rs2['name'];?></option>
					  
					  <?php
					  }?>
                               </select>
                                    </div>
                                </div>                               
                            </div>
                         <! –– End Element  -->                            <! –– Start Element  --> 
						   <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Quality</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="quality"  class="form-control show-tick" data-live-search="true">
									   <option value="none">Select Option</option>
									   <option value="plain">Plain</option>
									  
									   <option value="strip">Strips</option>
									   <option value="check">Check</option>
									   <option value="printed">Printed</option>
									   <option value="light-gift">Light-Gift</option>
									   <option value="xl-winter">XL-Winter</option>
									    <option value="new">New</option>
									   <option value="light">Light</option>
									   <option value="tv">TV Remote</option>
									   <option value="ac">AC Remote</option>
									   </select>  
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Color</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="color"  class="form-control show-tick" data-live-search="true">
									   <option value="none">Select Option</option>
									   <option value="red">Red</option>
									   <option value="brown">Brown</option>
									   <option value="green">Green</option>
									   <option value="black">Black</option>
									   <option value="white">White</option>
									   <option value="blue">Blue</option>
									   <option value="grey">Grey</option>
									    <option value="mehndi">Mehndi</option>
									     <option value="grey-black">Grey-Black</option>
									   
									   </select> 
                                    </div>
                                </div>                               
                            </div>
							
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Barcode</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="barcode" class="form-group">     
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Picture</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                         <input type="file" name="pic">    
                                    </div>
                                </div>                               
                            </div>
                         <! –– End Element  --> 
						  <! –– Start Element  --> 
						   
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Room/Hall</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                         <input type="text" name="room">    
                                    </div>
                                </div>
                               
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="submit" name="addnow" Value="Save">
                                    </div>
                                </div>
                                                             
                            </div>
                         <! –– End Element  --> 
  </div>					
	             	
						
                      </form>
                  </div>
          		</div><!-- col-lg-6--> 

 </div>

				   	
          	
			
						<?php  // Code Ends Here/////  ?>
                       
                        
                       
                    </div>
                </div>
            
</section>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="assets/bundles/mainscripts.bundle.js"></script>
</body>
</html>