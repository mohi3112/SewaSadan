 <?php include('lcheck.php'); 
include("inc/config.php");
if(isset($_GET['rch']))
{
	$chno=$_GET['chkorno'];
	$chkby=$_GET['chkby'];
	$chslip=$_GET['chslip'];
	$book=$_GET['book'];
	$werxc="update `visits` set `roomcheck`='yes',`checkby`='$chkby' where `bookingid`='$book';";
	mysqli_query($con,$werxc);
	echo "<script>window.location.href = 'checkoutbackend.php?booking=".$book."';</script>";
}


$usr=$_SESSION['usr'];
$checkout=time();
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
								 $tr="select * from `visits` where `bookingid`='$xbk' ORDER BY `rcpt` ASC LIMIT 1;";
							  }
							  if($_GET['booking']!="")
							  {
								 $tr="select * from `visits` where `bookingid` = '$booking' ORDER BY `rcpt` ASC LIMIT 1;";
							  }
	
	
	$rr=mysqli_query($con,$tr);
	$rt=mysqli_fetch_array($rr);
	if($rt['store_status']=="issued")
	{
	echo "<script> alert('Sorry! Attendant Have Not Returned The Mattress Yet. Please Ask Attendant To Visit Store First.'); window.location.href='checkout.php';  </script>";	
	}
	if(!is_null($rt['checkout_date']))
	{
	echo "<script> alert('Sorry! Already checked Out!!'); window.location.href='checkout.php';  </script>";	
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

	if($days==0)
	{
		$days=1;
	}
	if($_GET['waive']==1){$days=$days-1;}
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
	
	if($rt['roomcheck']=="no" &&  $rt['room_no']!=100 &&$rt['room_no']!=200 && $rt['room_no']!=300 && $rt['bed_no'] ==1 )
	{
		echo "<h1> This Room Is Not Checked Yet.</h1>";
		echo "<form action='checkoutbackend.php' method='get'>
		<table width='80%'><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Is This Room Checked? </td><td><input type='radio' name='chkorno' value='yes'> YES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='radio' name='chkorno' value='no'>NO</td><td>Checked By</td><td><input type='text' name='chkby'><input type='hidden' name='chslip' value='".$_GET['slip']."'><input type='hidden' name='book' value='".$rt['bookingid']."'></td><td><input type='submit' name='rch' value='Save Report'></td></tr></table><br><br><br><br><br><br><br><br><br><br>";
	}else{
	?>
	
	<form action="checkoutbackend.php" method="post">
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
<td data-title="Room No:"><input type="text" name="room" value="<?php echo $rt['room_no']; ?>" readonly="readonly"></td>
<td data-title="Bed/Gadda No:"><input type="text" name="bed" value="<?php echo $rt['bed_no']; ?>" readonly="readonly"></td>
</tr>

									<tr> <th  class="numeric">Total Days:</th>
                                      <th class="numeric">Total Charges:</th>
									  <th  class="numeric">Security:</th>
									  <th  class="numeric">Balance Amount:</th>
										</tr>
<tr>

<td data-title="Total Days:"><input type="text" name="days" value="<?php echo $days; ?>" readonly="readonly"></td>
<td data-title="Total Rent:"><input type="text" name="totrent" value="<?php echo $totalrent; ?>" readonly="readonly"></td>
<td data-title="Security:"><input type="text" name="advance" value="<?php echo $advance; ?>" readonly="readonly"></td>
<td data-title="Balance Amount:"><input type="text" name="cbalance" required value="<?php echo $balancecollect; ?>"></td>
<td data-title="Action:"><input type="hidden" name="booking" value="<?php echo $rt['bookingid']; ?>"></td>
                                  </tr>
<tr>
									  <th>Voucher No:</th>
                                      <th class="numeric">Waive Off 1 Day</th>
                                      <th class="numeric">Room/Bed Maintenance:</th>
                                      <th class="numeric">Refund Amount:</th>
                                     
                                  </tr>
<tr>
                                     
<td data-title="Voucher No:"><input type="text" readonly name="vcno" value="<?php echo $vcnext; ?>"></td>
<td data-title="Donation 100:"><select name="waive" onchange="getValue(this)" class="form-control">
<option value="0" <?php if($_GET['waive']==0){ echo "selected";} ?>>NO</option>
<option value="1"<?php if($_GET['waive']==1){ echo "selected";} ?> >YES</option>
</select></td>
<td data-title="Rent:"><input type="text" name="charge" value="<?php echo $rt['bed_charge']; ?>" readonly="readonly"><input type="hidden" name="chkin" value="<?php echo $rt['checkin_date']; ?>" ><input type="hidden" name="days" value="<?php echo $days; ?>" ></td>
<td data-title="Refund:"><input type="text" name="ramount" required value="<?php echo $balancerefund; ?>"><input type="hidden" name="booking" value="<?php echo $rt['bookingid']; ?>"></td>

</tr>	
<tr><th>Waive-Off Reason: </th> <td colspan="4"> <textarea name="waivereason" cols="80%" placeholder="Reason Here"> </textarea> </td></tr>
<tr style="font-weight:bold;"><td><center><span>Security Deposited</span><h2><?php echo $advance; ?></h2></center></td>
<td><center><span>Total Charges</span><h2><?php echo $totalrent; ?></h2></center></td>
<td><center><span>Refundable</span><h2><?php echo $balancerefund; ?></h2></center></td>
<td><center><span>Net Payable</span><h2><?php echo $balancecollect; ?></h2></center></td>
<td>     

					 <script>
					 function getValue(obj)
					 {
						  var dt=obj.value;
						  var newURL =document.URL+ "&waive="+dt;
						  window.location.href = newURL;
						  
					  }
					  
					  function findmyvalue()
						{
						var r1 = Number(document.getElementById("r1").value);
						var r2 = Number(document.getElementById("r2").value);
						var r5 = Number(document.getElementById("r5").value);
						var r10 = Number(document.getElementById("r10").value);
						
						var r100=100*r1;
						var r200=200*r2;
						var r500=500*r5;
						var r1000=1000*r10;
						var tot=r100+r200+r500+r1000;
						var tor=<?php echo $totalrent; ?>;
						if(tot!=tor)
						{
							alert("You Cannot Donate More or Less Then Rent.");
							document.getElementById("sub_but").innerHTML="You Cannot Donate More Then Your Rent.";
						}
						
						else{
							document.getElementById("sub_but").innerHTML="<input type='submit' name='set' value ='Settle Account'>";
							
							}
						}</script>

</td></tr>	

<tr><td colspan=4><center><div id="sub_but"><input type='submit' name='set' value ='Settle Account'></div></center></td></tr>							  
	</table></div>							  
	</form>		
					
	<?php 		
}}
if(isset($_POST['set']))
{
	foreach($_POST as $k=>$v)
		{
			$$k=$v;
		} 
		

	$dbl="select * from `rooms` where `room_no`='$room' and `bed_no`='$bed' and `bookingid`='$booking' and `status`='occupied';";
				$dubl=mysqli_query($con,$dbl);
			if(mysqli_fetch_array($dubl))
                {	
	 $qtrs="UPDATE `visits` SET `donation` = '$totrent', `d100` = 'bill', `rno100` = '0', `d200` = 'bill',`rno200` = '0', `d500` = 'bill', `rno500` = '0', `d1000` = 'bill', `rno1000` = '$days', `vcno` = '$vcno', `checkout_date` = '$checkout', `checkout_by` = '$usr' WHERE `bookingid` = '$booking';";
	mysqli_query($con,$qtrs);
	 $qtrs2="UPDATE `visits` SET `refundvoucher` = '$advance' WHERE `bookingid` = '$booking' and `bed_no`='1';";
	mysqli_query($con,$qtrs2);
	//////////CHANGE ROOM STATUS////////
	$tms=date('j-m-Y G:i:s', time());
	$updateroom="UPDATE `rooms` SET `curr_guest` = NULL ,`checkout`=NULL,`status`='vacant', `arrival` = NULL, `valid` = NULL, `bookingid` = NULL, `recipt` = '0', `gno` = '0' WHERE  `bookingid` = '$booking';";
	mysqli_query($con,$updateroom);
	
	////REFUND ENTRY//////


 $q7="SELECT * FROM `cash` where  `cashtype`<>'lastday'  ORDER BY `sr` DESC LIMIT 1;";
			$c7=mysqli_query($con,$q7);
			$cr7=mysqli_fetch_array($c7);
			echo $ch=$cr7['cashinhand'] - $advance;
	$refnd="INSERT INTO `cash` (`sr`, `time`, `reciptno`, `name`, `cashtype`, `bookinid`, `room`, `bed`, `arrival`, `checkout`, `refund`, `vcno`, `donation`, `dslip`, `cashinhand`,`collectby`,`handover`,`handoverto`,`handovertime`,`slip`) VALUES (NULL, CURRENT_TIMESTAMP,'0', '$name', 'Refund', '$booking', '$room', '$bed', '$chkin', '$checkout', '$advance', '$vcnext', '0', NULL, '$ch','$usr','0',NULL,'$checkout','0');";
	mysqli_query($con,$refnd);
	
	///////DONATION SLIP 100///////
	$q1="SELECT * FROM `cash` where `cashtype`<>'lastday'  ORDER BY `sr` DESC LIMIT 1;";
			$c1=mysqli_query($con,$q1);
			$cr1=mysqli_fetch_array($c1);
			$cashinhand=$cr1['cashinhand']+$totrent;
	
	  $refnd2="INSERT INTO `cash` (`sr`,`time`, `reciptno`, `name`, `cashtype`, `bookinid`, `room`, `bed`, `arrival`, `checkout`, `refund`, `vcno`, `donation`, `dslip`, `cashinhand`,`collectby`,`handover`,`handoverto`,`handovertime`,`slip`) VALUES (NULL, CURRENT_TIMESTAMP,'$reciptnext', '$name', 'donation', '$booking', '$room', '$bed', '$chkin', '$checkout', '0', '0', '$totrent', 'bill', '$cashinhand','$usr','0',NULL,'$checkout','0');";
			mysqli_query($con,$refnd2);
			
	$dt= date('d-m-y', time());		
		if($waive==1){
	   $waive="INSERT INTO `waiveoff` (`sr`, `guest`, `bookingid`, `slip`, `voucher`, `room`, `bed`, `amount`, `reason`, `arrival`, `checkout`, `checkoutby`,`date`,`bindate`) VALUES (NULL, '$name', '$booking', '$ea', '$vcnext', '$room', '$bed',  '$charge', '$waivereason', '$chkin', '$checkout', '$usr','$dt','$checkout');";
			mysqli_query($con,$waive);
		}
	
	
	echo "<script>window.location.href = 'printafter.php?booking=".$booking."';</script>";


} }?>				
					
					
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