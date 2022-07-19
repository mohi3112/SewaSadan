  <?php include('lcheck.php'); 
include("inc/config.php");

$dis_date=date('d',time());
$dis_month=date('m',time());
$dis_year=date('Y',time());
$discontinue_on=time();
$usr=$_SESSION['usr'];

?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2> Asset Reports</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
					
	  
		  	<div class="row mt">
              <div class="col-lg-12">
			  
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> All Discontinued Assets</h4>
                          <section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf" width="100%">
                                  <thead class="cf">
                                  <tr>
									  
                                      <th class="numeric">Asset Name:</th>
                                      <th class="numeric">Category:</th>
                                      <th class="numeric">Quality:</th>
                                      <th  class="numeric">Color:</th>
                                      <th class="numeric">Dis-Date:</th>
                                      <th class="numeric">Reason:</th>
                                      <th class="numeric">Extra-Note:</th>
                                      <th  class="numeric">Dis-by:</th>
                                     
                                 
                                  </tr>
                                  </thead>
                                  <tbody>
						  
						 
						    <?php  
						  
						 $mq="select * from `stock_assets` where `status`='Discontinued' order by `header_id`;";
						 $myq=mysqli_query($con,$mq);
			             while($disass=mysqli_fetch_array($myq))
			             {
			             			$hids=$disass['header_id'];
  								$ck="SELECT * FROM `stock_headers` WHERE `shid` = '$hids'; ";
                                       $ched=mysqli_query($con,$ck);
			                          $myhead=mysqli_fetch_array($ched);
                                     
			?>
	
	
                                  
                                  <tr>
								 
                             <td data-title="Item Name:"><?php echo $disass['item_name']; ?></td>
                             <td class="numeric" data-title="Category:"><?php  echo $myhead['name']; ?></td>
                             <td class="numeric" data-title="Quality:"><?php echo $disass['quality']; ?></td>
                             <td class="numeric" data-title="Color:"><?php echo $disass['color']; ?></td>
                             <td class="numeric"  data-title="Dis-Date:"><?php echo $disass['dis_date']."-".$disass['dis_month']."-".$disass['dis_year']; ?></td>
                             <td class="numeric" data-title="Reason:"><?php echo $disass['dis_reason']; ?></td>
                             <td class="numeric" data-title="Extra-Note:"><?php echo $disass['dis_note']; ?></td>
                             <td  class="numeric" data-title="Dis-by:"><?php echo $disass['discontinued_by']; ?></td>
                              </tr>
                               
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