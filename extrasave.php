  <?php
include('lcheck.php');
$usr=$_SESSION['usr'];
if (!isset($_COOKIE['user']))
{
header("location:index.php");
}

$checkin=time();
echo $checkindate = date('Y-m-d', $checkin);
$checkinhour = date('G', $checkin);
if($checkinhour<8)
{
		$checkindate = date('Y-m-d', strtotime($checkindate . ' -1 day'));
}
$ren = date('Y-m-d', strtotime($checkindate . ' +4 day'));
$rentime= $ren." 15:00:00";
$renew = strtotime($rentime);
$dte=date('d',time());$m=date('m',time());$y=date('Y',time());


?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2> Check-In</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
				
				<form class="form-horizontal style-form" method="get" action="checkin.php">
				<?php
				
				if(isset($_POST['checkin']))
{ 
		
	$cur_time=time();
foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}
	
		if($bedno==2)
		{
			$tyty="select * from `visits` where `room_no`='$roomno' and `bed_no`='1' and `checkout_date` is NULL ORDER BY `rcpt` DESC LIMIT 1;";
		$gtc=mysqli_query($con,$tyty);
		$gct=mysqli_fetch_array($gtc);
		$ids=$gct['bookingid'];
		
		$ytr="update `visits` set `guest2`='$ssid' where `room_no`='$roomno' and `bed_no`='1' and `checkout_date` is NULL ORDER BY `rcpt` DESC LIMIT 1;";
		mysqli_query($con,$ytr);
		echo $myqur="INSERT INTO `visits` (`rcpt`, `bookingid`, `ssid`, `mrd`, `patient`, `patient_adm_date`, `guestname`, `fnwo`, `photo`, `mobile`, `mobile2`, `address`, `id_type`, `id_number`, `checkin_date`, `visit_type`, `checkin_by`, `advance`,  `room_no`, `bed_no`, `bed_charge`, `store_status`, `bedsheet`, `mattress`, `pillow_cover`, `blanket`, `gno`, `issue_by`, `ren_date`, `donation`, `d100`, `rno100`, `d200`, `rno200`, `d500`, `rno500`, `d1000`, `rno1000`, `refundvoucher`, `vcno`, `checkout_date`, `checkout_by`, `roomcheck`,`checkby`, `extrabed`, `guest2`,`date`,`month`,`year`) VALUES (NULL, '$ids', '$ssid', '$mrd', '$pname','$admdate', '$name', '$fnwo', '$photo', '$mobile', '$mobile2', '$address', '$id_type', '$id_number','$cur_time', '$visit_type', '$usr', '0' ,'$roomno', '2', '0', 'returned', NULL, NULL, NULL, NULL, NULL, NULL, '$renew', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, '$extra', 'No','$dte','$m','$y');";
		mysqli_query($con,$myqur);
		
		}
		
		
		$cur_time=time();
		
			$rct=$cr1['recipt'];
			$chec = date('d-m-Y G:i:s', $cur_time);
		echo $ru="UPDATE `rooms` SET `curr_guest` = '$name',`status`='occupied', `arrival` = '$chec', `valid` = '$rentime', `bookingid` = '$ids', `recipt` = '$rct', `gno` = '0' WHERE  `room_no`='$roomno' and `bed_no`='$bedno';";
		mysqli_query($con,$ru);
		
		echo $bedno;
		if($bedno==2){echo "<script>window.location.href = 'extraprint.php?booking=".$ids."&type=pass2';</script>";}
		if($bedno=="extra1"||$bedno=="extra2"){echo "<script>window.location.href = 'extraprint.php?booking=".$ids."&type=extra&exid=".$ssid."';</script>";}
}
				?>
				
				</center>
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