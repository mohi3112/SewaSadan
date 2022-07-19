<?php
include('lcheck.php');
if(isset($_POST['save']))
{ 
foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}
	$ids =mt_rand(100000, 999999);
$usr=$_SESSION['usr'];
$ts=time();
$checkout=time();
  $qur="INSERT INTO `visits` (`rcpt`, `bookingid`, `ssid`, `mrd`, `patient`, `patient_adm_date`, `guestname`, `fnwo`, `photo`, `mobile`, `mobile2`, `address`, `id_type`, `id_number`, `checkin_date`, `visit_type`, `checkin_by`, `advance`,  `room_no`, `bed_no`, `bed_charge`, `store_status`, `bedsheet`, `mattress`, `pillow_cover`, `blanket`, `gno`, `issue_by`, `ren_date`, `donation`, `d100`, `rno100`, `d200`, `rno200`, `d500`, `rno500`, `d1000`, `rno1000`, `refundvoucher`, `vcno`, `checkout_date`, `checkout_by`, `roomcheck`,`checkby`, `extrabed`, `guest2`) VALUES (NULL, '$ids', '0', '0', 'Extra Donation','0', '$name', 'Extra Donation', '0', '$mobile', 'Extra Donation', 'Extra Donation', 'Extra Donation', 'Extra Donation','$ts', 'Extra Donation', '$usr', '$amount' ,'0', '0', '0', 'Extra Donation', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '$d100', 0, '$d200', 0, '$d500', 0, '$d1000', '0', NULL, NULL, NULL, NULL, 'no', NULL, 'Extra Donation', 'Extra Donation');";
		mysqli_query($con,$qur);
	///////DONATION SLIP 100///////
 $reciptnext++;
			$q1="SELECT * FROM `cash` ORDER BY `reciptno` DESC LIMIT 1;";
			$c1=mysqli_query($con,$q1);
			$cr1=mysqli_fetch_array($c1);
			$cashinhand=$cr1['cashinhand']+100;
		 echo $refnd2="INSERT INTO `cash` (`sr`,`time`, `reciptno`, `name`, `cashtype`, `bookinid`, `room`, `bed`, `arrival`, `checkout`, `refund`, `vcno`, `donation`, `dslip`, `cashinhand`,`collectby`,`handover`,`handoverto`,`handovertime`,`slip`) VALUES (NULL, CURRENT_TIMESTAMP,'$donationnext', '$name', 'Extra Donation', '$ids', '0', '0', '0', '0', '0', '0', '$amt', '$amt', '$cashinhand','$usr','0',NULL,'$checkout','0');";
			mysqli_query($con,$refnd2);
		echo "<script>window.location.href = 'printcusdonate.php?booking=".$ids."';</script>";
}
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Custom Donation</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
						
						<form class="form-horizontal style-form" method="post" action="customdonation.php" enctype="multipart/form-data">
<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name:</label>
                              <div class="col-sm-10">
                                  <input type="text" name="name" class="form-control">
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Mobile:</label>
                              <div class="col-sm-10">
                                  <input type="text" name="mobile"   class="form-control">
                              </div>
                          </div>
				 <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Amount:</label>
                              <div class="col-sm-10">
                                  <input type="text" name="amt"   class="form-control">
                              </div>
                          </div>
							  
						  <div class="row mt">
                              
							  <div class="col-sm-6 text-center">
                                  <input type="submit" name="save" class="btn btn-round btn-default"/>
                              </div>
                          </div>
						
</form>
						
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