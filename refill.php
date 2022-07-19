<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
$t=time();

$add_date=date('d',time());
$add_month=date('m',time());
$add_year=date('Y',time());

if(isset($_GET['stid']))
{
$stid=$_GET['stid'];
 $sel24="SELECT * FROM `stock_consumable` where `stid`='$stid'  ORDER BY `sr` DESC LIMIT 1;";
						     $rr24=mysqli_query($con,$sel24);
			               	$rs24=mysqli_fetch_array($rr24);
}
if(isset($_POST['refill']))
{
	foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}
	
		$newquantity=$remain+$quantity;
		echo $addq="INSERT INTO `stock_consumable` (`sr`,`stid`, `shid`, `item_name`, `header`, `status`, `measures`, `stock_type`, `quality`, `addition`, `less`, `remain`, `color`, `quantity`, `barcode`, `pic`, `added_on`, `add_date`, `add_month`, `add_year`, `added_by`, `rate`, `vendor`, `brand`, `stock_status`, `issued_by`, `issued_on`, `issue_to`, `action`) VALUES (NULL,'$stid', '$shid', '$itemname', '$header', '$status', '$measures', '$stocktype', '$quality', '$quantity', '', '$newquantity', '$color', '$quantity', '$barcode', '$pic', '$t', '$add_date', '$add_month', '$add_year', '$usr', '$rate', '$vendor', '$brand', 'instock', '', '', '', 'refill');";
					  mysqli_query($con,$addq);
			 $addqs2="INSERT INTO `stock_billing` (`sr`, `billno`, `billdate`, `item_name`, `header`, `measures`, `stock_type`, `quality`, `color`, `quantity`, `barcode`, `pic`, `added_on`, `add_date`, `add_month`, `add_year`, `added_by`, `rate`, `vendor`, `brand`, `stock_status`, `notes`, `action`) VALUES ('', '$billno', '$bdate',  '$itemname', '$header','$measures', '$stocktype', '$quality',  '$color', '$quantity', '$barcode', '$tgt', '$added_on', '$add_date', '$add_month', '$add_year', '$usr', '$rate', '$vendor', '$brand_name', 'instock', '', '');";
					  mysqli_query($con,$addqs2);
					  echo "<script>alert('You Have Successfully Refill Stock.');</script>";
                        echo "<script>window.location.href = 'refillstock.php';</script>";
}
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"> <h2>Refill Stock Items</h2> </div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
				
                      <form method="post" action="refill.php">
     						
		<div class="body">
                          
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Item Name</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
									<input type="hidden" name="status" value="<?php echo $rs24['status']; ?>" class="form-group"> 
                                    <input type="hidden" name="stid" value="<?php echo $rs24['stid']; ?>" class="form-group"> 
									<input type="hidden" name="shid" value="<?php echo $rs24['shid']; ?>" class="form-group"> 
									<input type="hidden" name="remain" value="<?php echo $rs24['remain']; ?>" class="form-group"> 
									<input type="hidden" name="pic" value="<?php echo $rs24['pic']; ?>" class="form-group"> 
									<input type="hidden" name="brand" value="<?php echo $rs24['brand']; ?>" class="form-group"> 
										<input type="hidden" name="measures" value="<?php echo $rs24['measures']; ?>" class="form-group"> 
									<input type="hidden" name="itemname" value="<?php echo $rs24['item_name']; ?>" class="form-group"> 
									<?php echo $rs24['item_name']; ?>
									 
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Parent Category</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
									 <input type="hidden" name="header" value="<?php echo $rs24['header']; ?>" class="form-group"> <?php echo $rs24['header']; ?>
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
                                        <input type="hidden" name="barcode" value="<?php echo $rs24['barcode']; ?>" class="form-group">
                                        <input type="hidden" name="brand" value="<?php echo $rs24['brand']; ?>" class="form-group">  <?php $bri=$rs24['brand']; $trt="select * from `brands` where `bid`='$bri';"; 
                                         $trt1=mysqli_query($con,$trt);
			                        	$brnd=mysqli_fetch_array($trt1);
			                        	echo $brnd['name'];
                                        ?>    
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Bill No</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="hidden" name="stock_type" value="<?php echo $rs24['stock_type']; ?>" class="form-group">  
                                        <input type="text" name="billno" class="form-group"> 
									
                                    </div>
                                </div>                               
                            </div>
                         <! –– End Element  -->                  
						 <! –– Start Element  --> 
						   
                           
                         <! –– End Element  -->              
						 <! –– Start Element  --> 
						   
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Bill Date</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <input type="hidden" name="measures" value="<?php echo $rs24['measures']; ?>" class="form-group">  
                                       <input type="date" name="bdate" class="form-group"> 
									 
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Vendor</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                         <select name="vendor" required> <option value="none">Please Select </option>
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
                         <! –– End Element  -->                          
						 <! –– Start Element  --> 
						   <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Quality</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="hidden" name="quality"  value="<?php echo $rs24['quality']; ?>" class="form-group"> 
										<?php echo $rs24['quality']; ?>
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Color</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                     <select name="color" required class="form-control show-tick" data-live-search="true">
                                         <option value="">Select Option</option>
                                       <option value="N/A">N/A</option>
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
                                        <span>Rate</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <input type="text" name="rate" required class="form-group">    
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Quantity</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="quantity" required class="form-group"> <span style=" text-transform: uppercase;"><?php echo $rs24['measures']; ?> </span>   
                                    </div>
                                </div>                               
                            </div>
						   
						   
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="form-group">
                                       <span> Remaining Stock</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                          <h2><?php echo $rs24['remain']; ?>  <span style=" font-size: 15px; text-transform: uppercase;"><?php echo $rs24['measures']; ?> </span></h2>
                                    </div>
                                </div>
                               
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <input type="submit" name="refill" Value="Refill Now">    
                                    </div>
                                </div>
                                                             
                            </div>
                        
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