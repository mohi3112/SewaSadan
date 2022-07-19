  <?php include('lcheck.php'); 
include("inc/config.php");
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2> Manage Your Assets</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<form class="form-horizontal style-form" method="get" action="disasset.php">
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
			  $sca="select * from `stock_assets` where `status`='active' group by `header`;";
			  $csa=mysqli_query($con,$sca);
			  while($cat=mysqli_fetch_array($csa))
			  {
			  ?>
			  <option value="<?php echo $cat['header_id'];?>"><?php echo $cat['header'];?></option>
			  <?php } ?>
			  
			  </select>
			  </td>
			  
			  <td><input type="submit" name="search" Value="Search" class="btn btn-round btn-default"/></td>
			  </tr>
			  </table>
			  </form>
	  
	
		  	<div class="row mt">
              <div class="col-lg-12">
			  <div id="printableArea" style="width:100%;height:90%;">
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> List Of Assets</h4>
                          <section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf" width="100%">
                                  <thead class="cf">
                                  <tr>
									  <th>Quantity:</th>
                                      <th class="numeric">Asset Name:</th>
                                      <th class="numeric">Category:</th>
                                      <th class="numeric">Quality:</th>
                                      <th  class="numeric">Color:</th>
                                      <th>Action:</th>
                                 
                                  </tr>
                                  </thead>
                                  <tbody>
						  
						 
						    <?php  
						  
						  if(isset($_GET['search']))
						  {$stid=$_GET['scat'];$bid=$_GET['brand'];
						      $sel23="SELECT * , Count(*) FROM `stock_assets`  where `status`='active' and `header_id`='$stid' and `brand`='$bid'  GROUP BY `color`,`quality`,`item_name`;";
					
				$rr23=mysqli_query($con,$sel23);
				while($rs23=mysqli_fetch_array($rr23))
				
			{
		
			?>
	
	
                                  
                                  <tr>
								  <td class="numeric" data-title="Quantity:"><?php echo $rs23['Count(*)']; ?></td>
                                        <td data-title="Item Name:"><?php echo $rs23['item_name']; ?></td>
                                      <td class="numeric" data-title="Category:"><?php echo $rs23['header']; ?></td>
                                      <td class="numeric" data-title="Color:"><?php echo $rs23['color']; ?></td>
                                      <td class="numeric" data-title="Quality:"><?php echo $rs23['quality']; ?></td>
                                      <td class="numeric" data-title="Action:"> 
									  <a href="discontinue.php?item=<?php echo $rs23['item_name'];?>&header_id=<?php echo $rs23['header_id'];?>&quality=<?php echo $rs23['quality'];?>&color=<?php echo $rs23['color'];?>&check=1"><input type="button" value= "Discontinue"></a>
									  </td>
									
                                  </tr>
                                <?php }  } ?>  
                                  </tbody>
                              </table>
                              <center>
                              
                              </center>
                          </section>
                      </div><!-- /content-panel -->
                 
	<div><input type="button" onclick="printDiv('printableArea')" value="Print" /></div>
          </div>   
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