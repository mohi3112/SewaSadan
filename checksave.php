  <?php
include('lcheck.php');
$usr=$_SESSION['usr'];
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
						<center>
				
				<?php
				
foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}
				///////Check Double/////$id_number
					$bknid = $_POST['ids'];
				$dbl="select * from `rooms` where `room_no`='$roomno' and `bed_no`='$bedno' and `bookingid`='$bknid' and `status`='vacant';";
				$dubl=mysqli_query($con,$dbl);
				//To Disable 24 hours check   $dbl2="select * from `visits` where `id_number`='$id_number' and `checkin_date`  between '$ds' and '$de' ;";
				//$dubl2=mysqli_query($con,$dbl2);
                if(mysqli_fetch_array($dubl))
                {header("location:lcheck.php");
                echo "Something Went Wrong!!<br>You Was Tried To Make Duplicate Entry<br><a href='docsection.php'>Click Here To Print Documents From List..</a>";    
                }
                /////if not double then proceed with new entry//////
                elseif(mysqli_fetch_array($dubl2)){
                 echo "Something Went Wrong!!<br>You Cannot Enter Add Entry For Same ID/Person in Between 24 Hours <br><a href='lcheck.php'>Click Here To Go To Home..</a>";    
                  
                }
                else{
				$_POST['checkin'];
			
				if(isset($_POST['checkin']))
{ 

		
echo $bc="select * from `rooms` where `room_no` = '$roomno';";
$bbc=mysqli_query($con,$bc);
$rbbc=mysqli_fetch_array($bbc);

if($advance==0){$bchrg=0; }else{ $bchrg=$rbbc['room_charge']; }

	$ids =$ids= uniqid();
	$cur_time=time();
	$dte=date('j',time());
	$m=date('m',time());
	$y=date('Y',time());
	

		
	if($roomno>200)
	{
	   $myq="select * from `cash` where `bookinid` ='$ids';"; 
	   $myq1=mysqli_query($con,$myq);
if($dup=mysqli_fetch_array($myq1))
{
    
}
else
{     echo $qur="INSERT INTO `visits` (`rcpt`, `bookingid`, `ssid`,`slip`, `mrd`, `patient`, `patient_adm_date`, `guestname`, `fnwo`, `photo`, `mobile`, `mobile2`, `address`, `id_type`, `id_number`, `checkin_date`, `visit_type`, `checkin_by`, `advance`,  `room_no`, `bed_no`, `bed_charge`, `store_status`, `bedsheet`, `mattress`, `pillow_cover`, `blanket`, `gno`, `issue_by`, `ren_date`, `donation`, `d100`, `rno100`, `d200`, `rno200`, `d500`, `rno500`, `d1000`, `rno1000`, `refundvoucher`, `vcno`, `checkout_date`, `checkout_by`, `roomcheck`,`checkby`, `extrabed`, `guest2`,`date`,`month`,`year`) VALUES (NULL, '$ids', '$ssid',$slipnext, '$mrd', '$pname','$admdate', '$name', '$fnwo', '$photo', '$mobile', '$mobile2', '$address', '$id_type', '$id_number','$cur_time', '$visit_type', '$usr', '$advance' ,'$roomno', '$bedno' , '$bchrg', '$store_status', NULL, NULL, NULL, NULL, NULL, NULL, '$renew', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, '$extra', '$sec_att','$dte','$m','$y');";
		mysqli_query($con,$qur);
		
		if($sec_att<>"")
		{echo $qur2="INSERT INTO `visits` (`rcpt`, `bookingid`, `ssid`, `mrd`, `patient`, `patient_adm_date`, `guestname`, `fnwo`, `photo`, `mobile`, `mobile2`, `address`, `id_type`, `id_number`, `checkin_date`, `visit_type`, `checkin_by`, `advance`,  `room_no`, `bed_no`, `bed_charge`, `store_status`, `bedsheet`, `mattress`, `pillow_cover`, `blanket`, `gno`, `issue_by`, `ren_date`, `donation`, `d100`, `rno100`, `d200`, `rno200`, `d500`, `rno500`, `d1000`, `rno1000`, `refundvoucher`, `vcno`, `checkout_date`, `checkout_by`, `roomcheck`,`checkby`, `extrabed`, `guest2`,`date`,`month`,`year`) VALUES (NULL, '$ids', '$sec_att', '$mrd', '$pname','$admdate', '$name2', '$fnwo2', '$photo2', '$sec_mobile', '$mobile2', '$address2', '$id_type2', '$id_number2','$cur_time', '$visit_type', '$usr', '0' ,'$roomno', '$bedno', '0', 'returned', NULL, NULL, NULL, NULL, NULL, NULL, '$renew', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, '$extra', '0','$dte','$m','$y');";
		mysqli_query($con,$qur2);}
		//////////?CASH/////////
		
		$q1="SELECT * FROM `cash` ORDER BY `sr` DESC LIMIT 1;";
			$c1=mysqli_query($con,$q1);
			$cr1=mysqli_fetch_array($c1);
			$cashinhand=$cih+$advance;
			$ssr=time();
			$chec = date('d-m-Y h:i',$cur_time);
			 echo $adv="INSERT INTO `cash` (`sr`,`time`, `reciptno`, `name`, `cashtype`, `bookinid`, `room`, `bed`, `arrival`, `checkout`, `refund`, `vcno`, `donation`, `dslip`, `cashinhand`,`collectby`,`handover`,`handoverto`,`handovertime`,`slip`) VALUES (NULL,CURRENT_TIMESTAMP,'0', '$name', 'advance', '$ids', '$roomno', '$bedno', '$chec', '0', '0', '0', '$advance', '0', '$cashinhand','$usr','0',NULL,'$ssr', '$slipnext');";
			mysqli_query($con,$adv);
			$rct=$cr1['recipt'];
			
			
		echo $ru="UPDATE `rooms` SET `curr_guest` = '$name',`status`='occupied', `arrival` = '$chec', `valid` = '$rentime', `bookingid` = '$ids', `recipt` = '$rct', `gno` = '0' WHERE  `room_no`='$roomno' and `bed_no`=$bedno;";
		mysqli_query($con,$ru);
		if($sec_att<>"")
		{
			echo $ru="UPDATE `rooms` SET `curr_guest` = '$name2',`status`='occupied', `arrival` = '$chec', `valid` = '$rentime', `bookingid` = '$ids', `recipt` = '$rct', `gno` = '0' WHERE  `room_no`='$roomno' and `bed_no`='2';";
		mysqli_query($con,$ru);
		}
}
	}
	else
	{
	    $myq="select * from `cash` where `bookinid` ='$ids';"; 
	   $myq1=mysqli_query($con,$myq);
if($dup=mysqli_fetch_array($myq1))
{
    
}
else
{ 	  echo $qur="INSERT INTO `visits` (`rcpt`, `bookingid`, `ssid`,`slip`, `mrd`, `patient`, `patient_adm_date`, `guestname`, `fnwo`, `photo`, `mobile`, `mobile2`, `address`, `id_type`, `id_number`, `checkin_date`, `visit_type`, `checkin_by`, `advance`,  `room_no`, `bed_no`, `bed_charge`, `store_status`, `bedsheet`, `mattress`, `pillow_cover`, `blanket`, `gno`, `issue_by`, `ren_date`, `donation`, `d100`, `rno100`, `d200`, `rno200`, `d500`, `rno500`, `d1000`, `rno1000`, `refundvoucher`, `vcno`, `checkout_date`, `checkout_by`, `roomcheck`,`checkby`, `extrabed`, `guest2`,`date`,`month`,`year`) VALUES (NULL, '$ids', '$ssid','$slipnext', '$mrd', '$pname','$admdate', '$name', '$fnwo', '$photo', '$mobile', '$mobile2', '$address', '$id_type', '$id_number','$cur_time', '$visit_type', '$usr', '$advance' ,'$roomno', '$bedno', '$bchrg', '$store_status', NULL, NULL, NULL, NULL, NULL, NULL, '$renew', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, '$extra', '$sec_att','$dte','$m','$y');";
		mysqli_query($con,$qur);
	//////////?CASH/////////

			$cashinhand=$cih+$advance;
			$ssr=time();
			 echo $adv="INSERT INTO `cash` (`sr`,`time`, `reciptno`, `name`, `cashtype`, `bookinid`, `room`, `bed`, `arrival`, `checkout`, `refund`, `vcno`, `donation`, `dslip`, `cashinhand`,`collectby`,`handover`,`handoverto`,`handovertime`,`slip`) VALUES (NULL,CURRENT_TIMESTAMP,'0', '$name', 'advance', '$ids', '$roomno', '$bedno', '$chec', '0', '0', '0', '$advance', '0', '$cashinhand','$usr','0',NULL,'$ssr', '$slipnext');";
			mysqli_query($con,$adv);
			$rct=$cr1['recipt'];
			$chec = date('d-m-Y',$cur_time);
		echo $ru="UPDATE `rooms` SET `curr_guest` = '$name',`status`='occupied', `arrival` = '$chec', `valid` = '$rentime', `bookingid` = '$ids', `recipt` = '$rct', `gno` = '0' WHERE  `room_no`='$roomno' and `bed_no`='$bedno';";
		mysqli_query($con,$ru);
		
		
}	
	}
	
		
echo "<script>window.location.href = 'print.php?booking=".$ids."&type=".$type."&sid=".$sec_att."';</script>";
		
}
	}			?>
				
				</center>
						
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