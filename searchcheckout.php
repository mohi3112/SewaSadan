<?php
include('lcheck.php');
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2> Search Checkout</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<form class="form-horizontal style-form" method="get" action="searchcheckout.php">
          	<!-- BASIC FORM ELELEMNTS -->
			<table style="background-color:#002;color:#fff;">
          		<tr><td>VC No:</td><td> <input type="text" name="vcno" class="form-control"></td>
				<td>Slip No:</td><td> <input type="text" name="slip" class="form-control"></td>
				<td><input type="submit" name="searchuser" Value="Search" class="btn btn-round btn-default"/></td></tr>
                      </table></form>
			
			
			
			
			
			
			
			
			
          	<div class="row mt">

          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i>Search Your Old Checkout Records</h4>
                    
                        <?php //if(isset($_GET[]))
							if (empty($_GET)) {
								echo '<h3>Please Provide The Search Criteria</h3>';
							}
							else
						  {   $ss=$fnyear."/".$_GET['slip']; 
						  $idd=$fnyear."/".$_GET['vcno'];
							  if($_GET['vcno']!="")
							  {
							   $tr="select * from `cash` where `vcno`='$idd';";
							  }
							  
							  if($_GET['slip']!="")
							  {
								 $tr="select * from `cash` where `slip`='$ss';";
							  }
							 
							 
							$rrr2=mysqli_query($con,$tr);
							if($rss2=mysqli_fetch_array($rrr2))
							{	$b=$rss2['bookinid'];
								$tr2="select * from `visits` where `bookingid`='$b';";
								$rrr=mysqli_query($con,$tr2);
							$rss=mysqli_fetch_array($rrr);
						 ?> 
<table class="table table-bordered table-striped table-condensed cf">
 <thead class="cf">
<tr>
 <th>Attendant Name:</th>
<th class="numeric">Father/Husband:</th>
<th class="numeric">SSID:</th>
<th class="numeric">Booking No:</th>
<th rowspan=5><img src="<?php echo $rss['photo']; ?>" height="200px" width="auto"></th></tr>
</thead>
<tbody>
<tr>	
<td data-title="Attendant Name:"><?php echo $rss['guestname']; ?></td>
<td data-title="Father/Husband:"><?php echo $rss['fnwo']; ?></td>
<td data-title="SSID:"><?php echo $rss['ssid']; ?></td>
<td data-title="Booking No:"><?php echo $rss['bookingid']; ?></td>
</tr>
<tr>
 <th>Patient Name:</th>
<th class="numeric">MRD No/ Adm No:</th>
<th class="numeric">Admitted On:</th>
<th class="numeric">Visit Type:</th>
</tr>
<tr>	
<td data-title="Patient Name:"><?php echo $rss['patient']; ?></td>
<td data-title="MRD No/ Adm No:"><?php echo $rss['mrd']; ?></td>
<td data-title="Admitted On:"><?php echo $rss['patient_adm_date']; ?></td>
<td data-title="Visit Type:"><?php echo $rss['visit_type']; ?></td>
</tr>
<tr>
 <th>Checkin Date:</th>
<th class="numeric">Checkout Date:</th>
<th class="numeric">Room No:</th>
<th class="numeric">Bed No:</th>
</tr>
<tr>	
<td data-title="Checkin Date:"><?php echo date('d/m/Y @ h:i:s',$rss['checkin_date']); ?></td>
<td data-title="Checkout Date:"><?php echo date('d/m/Y @ h:i:s',$rss['checkout_date']); ?></td>
<td data-title="Room No:"><?php echo $rss['room_no']; ?></td>
<td data-title="Bed No:"><?php echo $rss['bed_no']; ?></td>
</tr>
						 </table>
						
						  <?php }else{echo "Invalid ID or Phone Number.."; }} ?>
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	
			
			
			
			
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