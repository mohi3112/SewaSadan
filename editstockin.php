  <?php include('lcheck.php'); 
include("inc/config.php");
$st=$_GET['stid'];
$qq="SELECT * FROM `stock_consumable` where `stid`='$st'; ";
$nabc=mysqli_query($con,$qq);
$rrs=mysqli_fetch_array($nabc);
$sbb="SELECT * FROM `stock_billing` where `stid`='$st'; ";
$ssb=mysqli_query($con,$sbb);
$sb=mysqli_fetch_array($ssb);
$bc=$rrs['barcode'];
$today=date('d-m-Y',time());
$notes="Updated by ".$_SESSION['usr']." on ".$today;
if(isset($_POST['savenow']))
{

foreach($_POST as $k=>$v)
    {
      $$k=$v;
    }

$fish="select * from `stock_headers` where `shid`='$shid';";
$fssh=mysqli_query($con,$fish);
$findsh=mysqli_fetch_array($fssh);
$hname=$findsh['name'];
$upbill="UPDATE `stock_billing` SET `billno`='$billno',`billdate`='$billdate',`stid`='$stid',`item_name`='$itemname',`header`='$hname',`measures`='$measures',`quality`='$quality',`color`='$color',`quantity`='$quantity',`barcode`='$barcode',`rate`='$rate',`vendor`='$vendor',`brand`='$brand',`notes`='$notes'WHERE `stid`='$stid';";

mysqli_query($con,$upbill);

$upstock="UPDATE `stock_consumable` SET `stid`='$stid',`shid`='$shid',`item_name`='$itemname',`header`='$hname',`measures`='$measures',`quality`='$quality',`color`='$color',`rate`='$rate',`vendor`='$vendor',`brand`='$brand',`barcode`='$barcode' WHERE `stid`='$stid';";

mysqli_query($con,$upstock);


 echo "<script>alert('Data Is Updated');window.location.href = 'stockinreport.php';</script>";

}
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2> Edit Stock Entry</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
            <?php  // Code Here/////  ?>
  
    
        <div class="row mt">
              <div class="col-lg-12">
        
                      <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Edit Entry</h4>
                        
                        
                         <form method="post" action="editstockin.php" enctype="multipart/form-data">
                
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
                                       <input type="text"  class="form-group" value="<?php echo $sb['billno'];?>"  name="billno">
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Billing Date</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <input type="text"  class="form-group"  value="<?php echo $sb['billdate'];?>"  name="billdate">
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
                                     <input type="text" name="itemname" class="form-group"  value="<?php echo $rrs['item_name'];?>"  required>   
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
                                       <input type="text" name="rate"  value="<?php echo $rss['rate'];?>" class="form-group" required>    
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <span>Quantity</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="quantity" readonly="readonly" value="<?php echo $rss['quantity'];?>" class="form-group" required>     
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
                                        <input type="text" name="barcode" value="<?php echo $rss['barcode'];?>" class="form-group">     
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
                                        <input type="submit" name="savenow" Value="Save">
                                    </div>
                                </div>
                                                             
                            </div>
                         <! –– End Element  --> 
  </div>          
                
            
                      </form>
                      </form>
                        
                        
                        
                        
                      </div><!-- /content-panel -->
                  </div><!-- /col-lg-12 -->
              </div><!-- /row -->
            <?php  // Code Ends Here/////  ?>
                        </div>
                    </div>
                </div>
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