<?php include('lcheck.php'); 
include("inc/config.php");


$q = "SELECT max(stid) AS max_value FROM `stock_consumable`";
$q = mysqli_query($con,$q);
$row=mysqli_fetch_assoc($q) ; //just one set of data
$maxItemNum = $row['max_value'];		
$calstid=$maxItemNum+1;		
		
$usr=$_SESSION['usr'];
			$t=time();	
	    
if(isset($_POST['addnow']))
{
foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}
	if($_POST['colorRadio']=="selected")
		{$qui="SELECT * FROM  `brands` where `name`='$cbrand';"; 
					$rest=mysqli_fetch_array($rr=mysqli_query($con,$qui));
					if(isset($rest)){}else{ $qure="INSERT INTO `brands` (`bid`, `name`,`added_on`,`added_by`) VALUES ('$bno', '$cbrand','$t','$usr');";
					mysqli_query($con,$qure);}
					$vvr=mysqli_fetch_array($rr=mysqli_query($con,$qui));
					$brand_name=$vvr['bid'];
		}	
	elseif($_POST['colorRadio']=="current")
	{$brand_name=$sbrand;}
	
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
	
	
		
	$qi3="SELECT * FROM `stock_headers` where `shid`='$shid';"; 
					$rr3=mysqli_query($con,$qi3);
					  $rs3=mysqli_fetch_array($rr3);
					  $header=$rs3['name'];
					  
					 $addq="INSERT INTO `stock_consumable` (`sr`,`stid`, `shid`, `item_name`, `header`, `status`, `measures`, `stock_type`, `quality`, `addition`, `less`, `remain`, `color`, `quantity`, `barcode`, `pic`, `added_on`, `add_date`, `add_month`, `add_year`, `added_by`, `rate`, `vendor`, `brand`, `stock_status`, `issued_by`, `issued_on`, `issue_to`, `action`) VALUES  (NULL,'$calstid', '$shid', '$itemname', '$header', 'active', '$measures', '$stocktype', '$quality', '', '', '$quantity', '$color', '$quantity', '$barcode', '$tgt', '$added_on', '$add_date', '$add_month', '$add_year', '$usr', '$rate', '$vendor', '$brand_name', 'instock', '', '', '', 'add');";
					  mysqli_query($con,$addq);
					  
					  	 $addq2="INSERT INTO `stock_billing` (`sr`, `billno`, `billdate`,`stid`, `item_name`, `header`, `measures`, `stock_type`, `quality`, `color`, `quantity`, `barcode`, `pic`, `added_on`, `add_date`, `add_month`, `add_year`, `added_by`, `rate`, `vendor`, `brand`, `stock_status`, `notes`, `action`) VALUES ('', '$billno', '$billdate','$calstid',  '$itemname', '$header','$measures', '$stocktype', '$quality',  '$color', '$quantity', '$barcode', '$tgt', '$added_on', '$add_date', '$add_month', '$add_year', '$usr', '$rate', '$vendor', '$brand_name', 'instock', '', '');";
					  mysqli_query($con,$addq2);
					 	echo "<script>window.location.href = 'addconsumable.php';</script>";
	
}	
					  ?>
					  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}</script>
<script type="text/javascript" language="JavaScript">
function radioWithText(d) {
    document.getElementById('one').style.display = "none";
    document.getElementById('two').style.display = "none";
    document.getElementById('three').style.display = "none";
    document.getElementById(d).style.display='inline'; 
}
</script>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"> <h2>Add Consumable Stock Items</h2> </div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
				
                      <form method="post" action="addconsumable.php" enctype="multipart/form-data">
     						
		<div class="body">
                        <input type="hidden"  name="stocktype"  value="running">
							   <! –– Start Element  --> 
						   
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Bill No</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <input type="text"  class="form-group"  name="billno">
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Billing Date</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <input type="text"  class="form-group"  name="billdate">
                                    </div>
                                </div>                               
                            </div>		     
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Item Name</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                     <input type="text" name="itemname" class="form-group" required>   
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Parent Category</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
									<select name="shid" required> <option value="none">Please Select </option>
                                        <?php   $qi="SELECT * FROM `stock_headers` where `parent_shid`<>'0' and `type`='Stock';"; 
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
                                        <span>Rate</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <input type="text" name="rate" class="form-group" required>    
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Quantity</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="quantity" class="form-group" required>     
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
                                       <select name="measures"  class="form-control show-tick" data-live-search="true" required>
									   <option value="none">Select Option</option>
									   <option value="grams">Grams</option>
									   <option value="kg">Kilograms(kg)</option>
									   <option value="pcs">Pieces(pcs)</option>
									   <option value="ltr">Liters(ltr)</option>
									   <option value="pkt">Packets(pkt)</option>
									   <option value="box">Box</option>
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
                                        <select name="vendor"> <option value="none">Please Select </option>
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
                                        <span>Color</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="color"  class="form-control show-tick" data-live-search="true">
									   <option value="none">Select Option</option>
									   <option value="red">Red</option>
									   <option value="green">Green</option>
									   <option value="black">Black</option>
									   <option value="white">White</option>
									   <option value="blue">Blue</option>
									   <option value="grey">Grey</option>
									   
									   </select> 
                                    </div>
                                </div>                               
                            </div>
							
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Department</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <div>
 <label><input type="radio" name="colorRadio" checked="checked" value="current" required>Select</label>
        <label><input type="radio" name="colorRadio" value="selected">Create</label>
    </div>    
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
                                        
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                       
									   <div class="current box" style="display:visible;">
	                                    <select name="sbrand"  class="form-control show-tick" data-live-search="true">
										<option value="">Select A Department</option>
										<?php
										$b="select * from `brands`;";
										$bb=mysqli_query($con,$b);
										while($bbb=mysqli_fetch_array($bb))
										{
										$brand=$bbb['bid'];
										?>
										<option style="text-transform:uppercase;" value="<?php echo $brand;?>"><?php echo $bbb['name'];?></option>
										<?php
										}
										?>
										</select>
										</div>
										<div class="selected box" style="display:none;">
                                        <input type="text" name="cbrand">
										</div> 
									   
									   
									   
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