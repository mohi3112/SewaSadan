<?php include('lcheck.php'); 
include("inc/config.php");
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Renew</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					
					
					
					  <form class="form-horizontal style-form" method="get" action="renew_account.php">
          	<!-- BASIC FORM ELELEMNTS -->
		
          	
				<center>
					<table style="background-color:#002;color:#fff;">
				<tr><td>Slip No:</td><td> <input type="text" name="slip" class="form-control"></td>
				<td>Aadhaar:</td><td> <input type="text" name="aid"  class="form-control"></td>
				<td>Phone:</td><td> <input type="text" name="phone" maxlength="12" class="form-control"></td>
				<td><input type="submit" name="searchuser" Value="Search" class="btn btn-round btn-default"/></td></tr></center>
                       </form>
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> Renew an Account</h4>
						  
						  
						  
                          <section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
									  <th>Sr:</th>
									  
									  <th>Slip No:</th>
									  <th>Attendent Name:</th>
									  <th>Father Name-W/O:</th>
									  <th>Checkin Date:</th>
									  
									  <th>Room No:</th>
									  <th>Bed No:</th>
									  <th>Room Check:</th>
									  <th>Store:</th>
                                      <th>Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
						  
						  <?php 
$qr="select * from `visits` where `checkout_date` IS NULL and `fnwo` != 'Extra Donation';"; 
	$rr=mysqli_query($con,$qr); $count=1;
		while ($rt=mysqli_fetch_array($rr))
		{
			?>
	
	
                                  
                                  <tr>
                                      <td data-title="Sr:"><?php echo $count; ?></td>
                                      
									  <td data-title="Slip:"><?php $rtty=$rt['bookingid'];$khad="select * from `cash` where `bookinid` ='$rtty'; ";
									  $wty=mysqli_query($con,$khad);
									  $tft=mysqli_fetch_array($wty);
									  echo $tft['slip']; ?></td>
									  <td data-title="Attendent Name:"><?php echo $rt['guestname']; ?></td>
									  <td data-title="Father/Husband Name:"><?php echo $rt['fnwo']; ?></td>
									  <td data-title="Checkin Date:"><?php echo date('d/m/Y H:i:s a', $rt['checkin_date']); ?></td>
									  <td data-title="Room No:"><?php echo $rt['room_no']; ?></td>
									  <td data-title="Bed No:"><?php echo $rt['bed_no']; ?></td>
                                      <td data-title="Room Check:"><?php echo $rt['roomcheck']; ?></td>
									  <td data-title="Store:"><?php echo $rt['store_status']; ?></td>
                                      
                                     
                                      <td data-title="Action:"><a href="renew_account.php?booking=<?php echo $rt['bookingid'];?>"><input type="button" value ="Renew Account"></a></td>
                                  </tr>
                                  
		<?php $count++; }



?>
                                  </tbody>
                              </table>
                              <center>
                              
                              </center>
                          </section>
                      </div><!-- /content-panel -->
					
					
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