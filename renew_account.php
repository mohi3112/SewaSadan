 <?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
$checkout=time();
$booking=$_GET['booking'];
		$getslips="select * from `cash` where `bookinid`='$booking' and `slip`!='' ;  ";
		$getslp=mysqli_query($con,$getslips);
	    $getslip=mysqli_fetch_array($getslp);
	    $slip=$getslip['slip'];
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2> Renew Account for Slip-No: <?php echo $slip;?></h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					
	<?php $booking=$_GET['booking'];$ss=$_GET['phone']; $idd=$_GET['aid'];$ea=$fnyear."/".$_GET['slip'];
if(isset($_GET))
{
							if($_GET['aid']!="")
							  {
							   $tr="select * from `visits` where `id_number`='$idd';";
							  }
							  
							  if($_GET['phone']!="")
							  {
								 $tr="select * from `visits` where `mobile`='$ss';";
							  }
							  
							  if($_GET['slip']!="")
							  {
								 $trs="select * from `cash` where `slip`='$ea';";
								 $rtes=mysqli_query($con,$trs);
								 $xrt=mysqli_fetch_array($rtes);
								 $xbk=$xrt['bookinid'];
								 $tr="select * from `visits` where `bookingid`='$xbk';";
							  }
							  if($_GET['booking']!="")
							  {
								 $tr="select * from `visits` where `bookingid` = '$booking';";
							  }
	
	
	$rr=mysqli_query($con,$tr);
	$rt=mysqli_fetch_array($rr);
	
	if(!is_null($rt['checkout_date']))
	{
	echo "<script> alert('Sorry! Already checked Out!!'); window.location.href='renew_accomodation.php';  </script>";	
	}
	
$checkin=$rt['checkin_date'];
$checkindate = date('Y-m-d', $checkin);
$checkinhour = date('G', $checkin);
if($checkinhour<8)
{
	$checkindate = date('Y-m-d', strtotime($checkindate . ' -1 day'));
}
////////////Checkout/////////////////
$checkoutdate = date('Y-m-d', $checkout);
$checkouttime = date('G', $checkout);
if($checkouttime >= 15)
	{
		$checkoutdate = date('Y-m-d', strtotime($checkoutdate . ' +1 day'));
	}
$datetime1 = date_create($checkoutdate);
$datetime2 = date_create($checkindate);
$interval = date_diff($datetime1, $datetime2);
 $days=$interval->format('%a');	

	
	$trent=$rt['bed_charge'] * $days;	

	$xtra=0;
	$totalrent=$trent+$xtra;
	$advance=$rt['advance'];
	if($totalrent > $advance)
	{
		$balancecollect=$totalrent-$advance;
		$balancerefund=0;
	}
	else
	{
		$balancerefund=$advance-$totalrent;
		$balancecollect=0;
	}
	
	?>
	
	<form action="renew_account.php" method="post">
    <input type="hidden" name="oldslip" value="<?php echo $slip; ?>" >
	<table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
									 <th>Attendant Name:</th>
                                      <th class="numeric">Arrival Date:</th>
                                      <th class="numeric">Room No:</th>
                                      <th class="numeric">Bed/Gadda No:</th>
								  </tr>
									  
									  
                                  </thead>
                                  <tbody>
									<tr>
									<td data-title="Attendant Name:"><input type="text" name="name" value="<?php echo $rt['guestname']; ?>" readonly="readonly"></td>
<td data-title="Arrival Date:"><input type="text" name="arrival" value="<?php echo date('d-m-Y h:i a',$rt['checkin_date']) ?>" readonly="readonly"></td>
<td data-title="Room No:"><input type="text" name="room_no" value="<?php echo $rt['room_no']; ?>" readonly="readonly"></td>
<td data-title="Bed/Gadda No:"><input type="text" name="bed_no" value="<?php echo $rt['bed_no']; ?>" readonly="readonly"></td>
</tr>

									<tr> 
									  <th  class="numeric">Total Security Paid on Slip:</th>
									  <th  class="numeric">Balance Amount:</th>
									  <th class="numeric">Room/Bed Maintenance:</th>
                                      <th class="numeric">Days Left:</th>
										</tr>
<tr>


<td data-title="Security:"><input type="text" name="securityold" value="<?php echo $advance; ?>" readonly="readonly"><input type="hidden" name="booking" value="<?php echo $rt['bookingid'];?>"></td>
<td data-title="Balance Amount:"><input type="text" name="cbalance" required value="<?php echo $balancerefund; ?>" readonly="readonly"></td>
<td data-title="Room/Bed Maintenance:"><input type="text" name="charge" value="<?php echo $rt['bed_charge']; ?>" readonly="readonly"></td>
<td data-title="Days Left:"><input type="text" name="totrent" value="<?php echo $dayleft=$balancerefund/$rt['bed_charge']; ?>" readonly="readonly"></td>
                                  </tr>


<tr><td colspan=2> Add Security: <input type="text" name="renew_amount" value="<?php echo $nren=$rt['bed_charge']*4;?>" readonly="readonly" ></td><td colspan=2><center><div id="sub_but"><input type='submit' name='set' value ='Renew Account'></div></center></td></tr>							  
	</table></div>							  
	</form>		
					
	<?php 		
}
if(isset($_POST['set']))
{
    $curtime=date('d-m-Y g:i a' , time());
	foreach($_POST as $k=>$v)
		{
			$$k=$v;
		} 
		$newsecurity= $securityold + $renew_amount;

	    $gtcih="select * from `cash` ORDER BY `sr` DESC LIMIT 1";
	    $getch=mysqli_query($con,$getcih);
	    $getcashdetail=mysqli_fetch_array($getch);
	    $cih=$getcashdetail['cashinhand'];
 echo $visup="update visits set `advance`='$newsecurity' where `bookingid`='$booking' and `room_no`='$room_no' and `bed_no`='$bed_no';";
 mysqli_query($con,$visup);
 echo "<br>";
 echo $cashin="INSERT INTO `cash` (`sr`,`time`, `reciptno`, `name`, `cashtype`, `bookinid`, `room`, `bed`, `arrival`, `checkout`, `refund`, `vcno`, `donation`, `dslip`, `cashinhand`,`collectby`,`handover`,`handoverto`,`handovertime`,`slip`) VALUES (NULL,'$curtime','$reciptnext', '$name', 'advance', '$booking', '$room_no', '$bed_no', '$arrival', '0', '0', '0', '$renew_amount', '0', '$cih','$usr','0',NULL,'$checkout', '$oldslip');";
mysqli_query($con,$cashin);
 $cashup="update visits set `donation`='$renew_amount' where `bookingid`='$booking' and `room_no`='$room_no' and `bed_no`='$bed_no';";
 echo "<script>window.location.href = 'printrenew.php?booking=".$booking."';</script>";
}
?>				
					
					
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