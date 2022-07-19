  <?php include('lcheck.php'); 
include("inc/config.php");
$qr="select * from `visits` where `store_status`='pending';";
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Issue Beddings</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<form class="form-horizontal style-form" method="get" action="issue.php">
			  <table>
			  <tr><td>Slip No:</td><td><input type="text" name="slip" class="form-control"></td>
			  <td>Aadhaar:</td><td> <input type="text" name="aid"  class="form-control"></td>
			  <td>Phone:</td><td><input type="text" name="phone" maxlength="12" class="form-control"></td>
			  <td><input type="submit" name="searchuser" Value="Search" class="btn btn-round btn-default"/></td>
			  </tr>
			  </table>
			  </form>
	  
		  	<div class="row mt">
              <div class="col-lg-12">
			  
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> List Of Pending Check-In</h4>
                          <section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
									  <th>Slip No:</th>
                                      <th class="numeric">Name:</th>
                                      <th class="numeric">Phone:</th>
                                      <th class="numeric">Room No:</th>
                                      <th  class="numeric">Bed No:</th>
                                      <th>Registeration Time:</th>
                                 
									  <th>Photo:</th><th>Action:</th>
                                  </tr>
                                  </thead>
                                  <tbody>
						  
						  <?php 
	$rr=mysqli_query($con,$qr); $count=0;
		while ($rt=mysqli_fetch_array($rr))
		{$t=$rt['bookingid'];
			$sel23="select * from `cash` where `bookinid`='$t' and `cashtype`='advance' ORDER BY `reciptno` DESC LIMIT 1;";
				$rr23=mysqli_query($con,$sel23);
				$rs23=mysqli_fetch_array($rr23);
			
			
			?>
	
	
                                  
                                  <tr>
								  <td class="numeric" data-title="Slip No:"><?php echo $rs23['slip']; ?></td>
                                        <td data-title="Name:"><?php echo $rt['guestname']; ?></td>
                                      <td class="numeric" data-title="Phone:"><?php echo $rt['mobile']; ?></td>
                                      <td class="numeric" data-title="Room No:"><?php echo $rt['room_no']; ?></td>
                                      <td class="numeric" data-title="Bed No:"><?php echo $rt['bed_no']; ?></td>
                                      <td class="numeric" data-title="Registeration:">
									  <?php echo $chec = date('d-m-Y G:i:s', $rt['checkin_date']); ?></td>
									
									  <td data-title="Photo:"><center><img src="<?php echo $rt['photo']; ?>" height="150px" width="auto" alt="Image" style="vertical-align: top; moz-box-shadow: 0 10px 20px rgba(0,0,0,.1); -webkit-box-shadow: 0 10px 20px rgba(0,0,0,.1); box-shadow: 0 10px 20px rgba(0,0,0,.1);	"></center></td>
                                  <td><a href="issue.php?slip=<?php $momo=$rs23['slip']; echo substr($momo,8);?>"><input type="button" value="Issue Now"></a></td>
                                  </tr>
                                  
		<?php  }


?>
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