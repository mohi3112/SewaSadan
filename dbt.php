<?php 


date_default_timezone_set('Asia/Kolkata');

$con = mysqli_connect("localhost", "u402268216_sewa", "8xN!LdZYTK:", "u402268216_sewa") or die ("Connection error");
  echo $ax="SELECT * FROM `rooms` WHERE `room_no` between '100' and '120' group by `room_no`; ";
$rr=mysqli_query($con,$ax); 
		while($rt=mysqli_fetch_array($rr))
		{
		    $rno=$rt['room_no'];
// $scnd="INSERT INTO `rooms` (`sr`, `room_no`, `bed_no`, `room_type`, `room_charge`, `status`, `curr_guest`, `arrival`, `valid`, `checkout`, `bookingid`, `recipt`, `gno`) VALUES (NULL, '$rno', '2', 'PRIVATE-ROOM', '0', 'vacant', NULL, NULL, NULL, '0', NULL, NULL, NULL);";
    
    $extra1="INSERT INTO `rooms` (`sr`, `room_no`, `bed_no`, `room_type`, `room_charge`, `status`, `curr_guest`, `arrival`, `valid`, `checkout`, `bookingid`, `recipt`, `gno`) VALUES (NULL, '$rno', 'extra1', 'PRIVATE-ROOM', '350', 'vacant', NULL, NULL, NULL, '0', NULL, NULL, NULL);";
    
    $extra2="INSERT INTO `rooms` (`sr`, `room_no`, `bed_no`, `room_type`, `room_charge`, `status`, `curr_guest`, `arrival`, `valid`, `checkout`, `bookingid`, `recipt`, `gno`) VALUES (NULL, '$rno', 'extra2', 'PRIVATE-ROOM', '350', 'vacant', NULL, NULL, NULL, '0', NULL, NULL, NULL);";
		    
		   // mysqli_query($con,$scnd);
		    mysqli_query($con,$extra1);
		    mysqli_query($con,$extra2);
		    	    
		}
	?>