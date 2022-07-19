<?php
include('lcheck.php');
 if (isset($_POST['shift']))
          	{
          	 
          	   foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}
$cashq="update `cash` set `room`='$roomno', `bed`='$bedno',`donation`='$advance' where `bookinid`='$booking';";
	mysqli_query($con,$cashq);
		
$visitq="update `visits` set `room_no`='$roomno', `bed_no`='$bedno',`advance`='$advance', `bed_charge`='$bedcharge' where `bookingid`='$booking';";
	mysqli_query($con,$visitq);
$updateroom="UPDATE `rooms` SET `curr_guest` = NULL ,`checkout`=NULL,`status`='vacant', `arrival` = NULL, `valid` = NULL, `bookingid` = NULL, `recipt` = '0', `gno` = '0' WHERE  `bookingid` = '$booking';";
	mysqli_query($con,$updateroom);
$roomq="update `rooms` set `curr_guest` = '$guest' , `arrival` = '$arival', `valid` = '$valid', `status`='occupied',`bookingid`='$booking' where `room_no`='$roomno' and `bed_no`='$bedno';";			
	mysqli_query($con,$roomq);	
		
	
		
          	}
?>
<script>
    alert("Room Data Has Been Changed Successfully ");
   window.location.href = 'shiftaccomodation.php';
</script>