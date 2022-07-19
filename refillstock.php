  <?php include('lcheck.php'); 
include("inc/config.php");
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2> Refill Your Stock</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<form class="form-horizontal style-form" method="get" action="refillstock.php">
			  <table>
			  <tr><td>Department:</td><td> <select name="brand"  class="form-control show-tick" data-live-search="true"><option value="">Select Department</option>
			  <?php
			  $sca1="select * from `brands`;";
			  $cs1=mysqli_query($con,$sca1);
			  while($cat1=mysqli_fetch_array($cs1))
			  {
			  ?>
			  <option value="<?php echo $cat1['bid'];?>"><?php echo $cat1['name'];?></option>
			  <?php } ?>
			  
			  </select>
			  </td>
			  <td>Category:</td><td> <select name="scat"  class="form-control show-tick" data-live-search="true"><option value="">Select Category</option>
			  <?php
			  $sca="select * from `stock_headers` where `type`='Stock';";
			  $csa=mysqli_query($con,$sca);
			  while($cat=mysqli_fetch_array($csa))
			  {
			  ?>
			  <option value="<?php echo $cat['shid'];?>"><?php echo $cat['name'];?></option>
			  <?php } ?>
			  
			  </select>
			  </td>
			  
			  <td><input type="submit" name="search" Value="Search" class="btn btn-round btn-default"/></td>
			  </tr>
			  </table>
			  </form>
	  
		  	<div class="row mt">
              <div class="col-lg-12">
			  
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> List Of Store Items</h4>
                          <section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf" width="100%">
                                  <thead class="cf">
                                  <tr>
									  <th>Stock ID:</th>
                                      <th class="numeric">Item Name:</th>
                                      <th class="numeric">Category:</th><th class="numeric">Department:</th>
                                      <th class="numeric">Quantity:</th>
                                      <th  class="numeric">Rate:</th>
                                      <th>Action:</th>
                                 
                                  </tr>
                                  </thead>
                                  <tbody>
						  
						 
						    <?php  
						  
						  if(isset($_GET['search']))
						  {$stid=$_GET['scat'];$bid=$_GET['brand'];
						      $sel23="SELECT * FROM `stock_consumable` where `shid`='$stid' and `brand`='$bid'  GROUP BY `stid` ;";
					
				$rr23=mysqli_query($con,$sel23);
				while($rs23=mysqli_fetch_array($rr23))
				
			{
			$ss=$rs23['stid'];
			$resl="SELECT * FROM `stock_consumable` where `stid`='$ss' order by `sr` DESC  limit 1;";
			$p=mysqli_query($con,$resl);
			$pre=mysqli_fetch_array($p);
			 $bbid=$pre['brand'];
		$resl1="SELECT * FROM `brands` where `bid`='$bbid';";
			$p1=mysqli_query($con,$resl1);
			$pre1=mysqli_fetch_array($p1);
			?>
	
	
                                  
                                  <tr>
								  <td class="numeric" data-title="Stock ID:"><?php echo $pre['stid']; ?></td>
                                        <td data-title="Item Name:"><?php echo $pre['item_name']; ?></td>
                                      <td class="numeric" data-title="Category:"><?php echo $pre['header']; ?></td>
                                      <td class="numeric" data-title="department:"><?php echo $pre1['name']; ?></td>
                                      <td class="numeric" data-title="Quantity:"><?php echo $pre['remain']; ?> <?php echo $pre['measures']; ?></td>
                                      <td class="numeric" data-title="Rate:"><?php echo $pre['rate']; ?></td>
                                      <td class="numeric" data-title="Action:"> 
									  <a href="refill.php?stid=<?php echo $pre['stid'];?>"><input type="button" value= "Refill Now"></a>
									  </td>
									
                                  </tr>
                                <?php }  } ?>  
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