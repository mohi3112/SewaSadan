
<?php 


date_default_timezone_set('Asia/Kolkata');

$con = mysqli_connect("localhost", "u402268216_sewa", "8xN!LdZYTK:", "u402268216_sewa") or die ("Connection error");
  
$fnyear="2022-23";
$nslip="1";
   $ax="SELECT * FROM `cash` WHERE `sr`> '113005' and `cashtype`='advance';";
	$rr=mysqli_query($con,$ax); 
		while($rt=mysqli_fetch_array($rr))
		{
			$newslip=$fnyear."/".$nslip;
		    $ssr=$rt['sr'];
		    $nup="UPDATE `cash` SET `slip` = '$newslip' WHERE `sr` = '$ssr';";
		    mysqli_query($con,$nup);
		    $nslip++;	    
		}
	?>