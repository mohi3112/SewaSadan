<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
$t=time();
if(isset($_GET['stid']))
{
$stid=$_GET['stid'];
 $sel24="SELECT * FROM `stock_consumable` where `stid`='$stid'  and `rate` >'0' ORDER BY `sr` DESC LIMIT 1;";
                 $rr24=mysqli_query($con,$sel24);
                      $rs24=mysqli_fetch_array($rr24);
}
if(isset($_POST['consume']))
{
  foreach($_POST as $k=>$v)
    {
      $$k=$v;
    }
    $tt=strtotime($condate);
  //  echo $remain." remaining <br>";
  //  echo $quantity." quantity";
  
    if($quantity<=$remain && $remain>0)
    {
    $newquantity=$remain-$quantity;
    
    if($remain==0){ $stocksts="outstock"; }else{ $stocksts="instock";}
    
    echo $addq="INSERT INTO `stock_consumable` (`sr`,`stid`, `shid`, `item_name`, `header`, `status`, `measures`, `stock_type`, `quality`, `addition`, `less`, `remain`, `color`, `quantity`, `barcode`, `pic`, `added_on`, `add_date`, `add_month`, `add_year`, `added_by`, `rate`, `vendor`, `brand`, `stock_status`, `issued_by`, `issued_on`, `issue_to`, `action`) VALUES (NULL,'$stid', '$shid', '$itemname', '$header', '$status', '$measures', '$stocktype', '$quality', '', '$quantity', '$newquantity', '$color', '$quantity', '$barcode', '$narration', '$added_on', '$add_date', '$add_month', '$add_year', '', '$rate', '$vendor', '$brand', '$stocksts', '$usr', '$tt', '$issueto', 'consume');";
            mysqli_query($con,$addq);
           echo "<script>alert('You Have Successfully consume Stock.');</script>";
                     echo "<script>window.location.href = 'consumestock.php';</script>";
            }
            else{ 
          echo "<script>alert('Sorry Insufficient Stock!!!');</script>";
                     echo "<script>window.location.href = 'consumestock.php';</script>";
            }
    
}
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"> <h2>Consume Stock Items</h2> </div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
            <?php  // Code Here/////  ?>
        
                      <form method="post" action="consume.php">
                
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
                  <input type="text" name="rate" value="<?php echo $rs24['rate']; ?>" class="form-group"> 
                  
                  <input type="hidden" name="brand" value="<?php echo $rs24['brand']; ?>" class="form-group"> 
                    <input type="hidden" name="stocktype" value="<?php echo $rs24['stock_type']; ?>" class="form-group">
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
                                        <input type="hidden" name="brand" value="<?php echo $rs24['brand']; ?>" class="form-group">  <?php $bri=$rs24['brand']; 
                                        $trt="select * from `brands` where `bid`='$bri';";
                                        $trt2=mysqli_query($con,$trt);
                                        $brand=mysqli_fetch_array($trt2);
                                        echo $brand['name'];
                                        ?>    
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Stock Type</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="hidden" name="stock_type" value="<?php echo $rs24['stock_type']; ?>" class="form-group"> 
                    <?php echo $rs24['stock_type']; ?>
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
                                        <span>Measure</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <input type="hidden" name="measures" value="<?php echo $rs24['measures']; ?>" class="form-group"> 
                     <?php echo $rs24['measures']; ?>
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Vendor</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="hidden" name="vendor" value="<?php echo $rs24['vendor']; ?>" class="form-group"> 
                    <?php echo $rs24['vendor']; ?>
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
                                        <input type="hidden" name="quality" value="<?php echo $rs24['quality']; ?>" class="form-group"> 
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
                                       <input type="hidden" name="color" value="<?php echo $rs24['color']; ?>" class="form-group"> 
                     <?php echo $rs24['color']; ?>
                                    </div>
                                </div>                               
                            </div>
              
                <div class="row clearfix">

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Issued To</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <input type="text" name="issueto" required class="form-group">    
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Quantity</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="quantity" required class="form-group">     
                                    </div>
                                </div>                               
                            </div>
               
                   <div class="row clearfix">

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Narration</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <textarea name="narration"></textarea>
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Issue Date</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="date" name="condate" required class="form-group">     
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
                                          <h2><?php echo $rs24['remain']; ?> </h2>
                                    </div>
                                </div>
                               
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <input type="submit" name="consume" Value="Consume Now">    
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