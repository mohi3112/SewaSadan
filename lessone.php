<?php 

date_default_timezone_set('Asia/Kolkata');

$con = mysqli_connect("localhost", "u402268216_sewa", "8xN!LdZYTK:", "u402268216_sewa");
$fnyear='2021-22';
$chkvalidity=4;

echo $ax="SELECT * FROM `cash` WHERE `cashtype`='lastday' and `sr`>'102090'; ";
$rr=mysqli_query($con,$ax); 
		while($rt=mysqli_fetch_array($rr))
		{
		    $csr=$rt['sr'];
		    $hnd=$rt['handover'];
		    $hndovr=$hnd-1;
		   echo $ew="update `cash` set `handover`='$hndovr' where `sr`='$csr';";
		    echo "<br>";
		   mysqli_query($con,$ew);
		    	    
		}
	?>