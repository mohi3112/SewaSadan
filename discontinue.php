  <?php include('lcheck.php'); 
include("inc/config.php");

$dis_date=date('d',time());
$dis_month=date('m',time());
$dis_year=date('Y',time());
$discontinue_on=time();
$usr=$_SESSION['usr'];
if(isset($_POST['submit']))
{
	foreach($_POST as $k=>$v)
	{
		$$k=$v;
	}
	
 $gtr="select `barcode` from `stock_assets` WHERE  `item_name`='$item_name' and `color`='$dis_color' and `quality`='$dis_quality' and `header_id`='$item_header' and  `status`='active' limit 1 ;";
$getr=mysqli_query($con,$gtr);
$startrow=mysqli_fetch_array($getr);
$starting=$startrow['barcode'];
$endrow=$startrow['barcode']+$dis_quantity;
while($starting < $endrow)
{
$myqu="UPDATE `stock_assets` SET `status`='discontinued' , `dis_reason`='$reason',`discontinue_date`='$discontinue_on',`dis_date`='$dis_date',`dis_month`='$dis_month',`dis_year`='$dis_year',`discontinued_by`='$usr',`dis_note`='$dis_note' WHERE  `item_name`='$item_name' and `color`='$dis_color' and `quality`='$dis_quality' and `header_id`='$item_header' and  `barcode`='$starting' ;";
mysqli_query($con,$myqu);
$starting++;
echo "<br>";
}

echo "<script>alert('Assets Updated..');window.location.href = document.referrer;</script>";

}



?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2> Asset Management</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
					
	  
		  	<div class="row mt">
              <div class="col-lg-12">
			  
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> Discontinue An Asset</h4>
                          <section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf" width="100%">
                                  <thead class="cf">
                                  <tr>
									  
                                      <th class="numeric">Asset Name:</th>
                                      <th class="numeric">Category:</th>
                                      <th class="numeric">Quality:</th>
                                      <th  class="numeric">Color:</th>
                                     
                                 
                                  </tr>
                                  </thead>
                                  <tbody>
						  
						 
						    <?php  
						  
						  if(isset($_GET['check']))
						  {

						  	foreach($_GET as $k=>$v)
									{
										$$k=$v;
									}

			?>
	
	
                                  
                                  <tr>
								 
                                        <td data-title="Item Name:"><?php echo $item; ?></td>
                                      <td class="numeric" data-title="Category:"><?php $ck="SELECT * FROM `stock_headers` WHERE `shid` = '$header_id'; ";
                                       $ched=mysqli_query($con,$ck);
			                          $myhead=mysqli_fetch_array($ched);
                                      echo $myhead['name']; ?></td>
                                      <td class="numeric" data-title="Color:"><?php echo $color; ?></td>
                                      <td class="numeric" data-title="Quality:"><?php echo $quality; ?></td>
                                      </tr>
                                      <tr>
								 <form method="post" action="discontinue.php">
								 			<input type="hidden" name="dis_color" value="<?php echo $color; ?>">
								 			<input type="hidden" name="dis_quality" value="<?php echo $quality; ?>">
								 			<input type="hidden" name="item_name" value="<?php echo $item; ?>">
								 			<input type="hidden" name="item_header" value="<?php echo $header_id; ?>">	

                                        <td> Reason</td> 
                                        <td> <select name="reason"  class="form-control show-tick" data-live-search="true">
                                        	<option value="dg">Select An Option</option>
                                        	<option value="Damaged">Damaged</option>
                                        	<option value="Scraped">Scraped</option>
                                        	<option value="Misplaced">Misplaced</option>
                                        	<option value="Shifted">Shifted</option>
										 </select> </td>
										 <td class="numeric">Quantity:</td>
                                      <td><input type="text" name="dis_quantity" placeholder="Quantity to Discontinue"></td>
                                     
                                      </tr> 
                                      <tr> <td > Extra Note. </td>
                                      <td colspan="3"><textarea cols="65" name="dis_note" placeholder="Extra Notes"> </textarea></td>
                                      </tr>
                                      <tr><td colspan="4"> <input type="submit" name="submit" value="Discontinue"></td></tr> 
                                <?php  } ?>  
                                  </tbody>
                              </table>
                              <center>
                              
                              </center>
                          </section>
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