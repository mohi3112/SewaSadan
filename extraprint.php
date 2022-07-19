    <?php
include('lcheck.php');
$string = date('Y/m/d H:i:s a', time());
$year = substr($string,0,4);
$month = substr($string,5,2);
$day = substr($string,8,2);
$x=$day+3;
$hour = substr($string,11,2);
$minute = substr($string,14,2);
$seconds = substr($string,17,2);
$slg = substr($string,20,3);
$rentime= $x."-".$month."-".$year." 14:00";
?>

<script type="text/javascript">
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
	 window.setTimeout(window.location.href = "checkin.php",1000);
}
</script>
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
				$s=$_GET['booking'];
				$sel="select * from `visits` where `bookingid`='$s' and `bed_no`='1';";
				$rr=mysqli_query($con,$sel);
				$rs=mysqli_fetch_array($rr);
				$sel2="select * from `cash` where `bookinid`='$s' and `cashtype`='advance' ORDER BY `slip` DESC LIMIT 1;";
				$rr2=mysqli_query($con,$sel2);
				$rs2=mysqli_fetch_array($rr2); 
				?>
				
				
				<div id="printableArea" style="width:100%;height:90%;">
		<?php
if($_GET['type']=="pass2")
{
	if(isset($_GET['ssid'])){$ssid=$_GET['ssid'];}
	if($_GET['type']=="pass2"){$ssid=$rs['guest2'];}
	//$g2=$rs['guest2'];
	 $seq="select * from `guests` where `ssid`='$ssid' ORDER BY `ssid` DESC LIMIT 1;";
				$rq=mysqli_query($con,$seq);
				$rmq2=mysqli_fetch_array($rq);			
			
				 $wit="select * from `visits` where `guest2`='$ssid'  ORDER BY `rcpt` DESC LIMIT 1;";
	$myr=mysqli_query($con,$wit);
	
	if($myfr=mysqli_fetch_array($myr))
	{
		$t=$myfr['bookingid'];
		$sel23="select * from `cash` where `bookinid`='$t' and `cashtype`='advance' ORDER BY `slip` DESC LIMIT 1;";
				$rr23=mysqli_query($con,$sel23);
				$rs23=mysqli_fetch_array($rr23);
		?>
		<div style="float:right; border-style: solid;width:48%;border-width: medium;">
		<h4 align="center" style="color:#f00;"><b>SHRI RAM SHARNAM SEWA SADAN</b></h4>
<h6 align="center" style="color:#f00;margin-top:-9px;"><b>A Unit Of Ram Sewa Swami Satyanand Trust</b></h6>
<table align="center" style="width:91%;height:auto;padding:2px;">
<tr><td width="20%">Date:</td><td width="35%"><?php echo date('d-m-Y', $myfr['checkin_date']);  ?></td><td rowspan="6" width="45%"><img align="right" src="<?php echo $rmq2['photo']; ?>" height="125px" width="auto"></td></tr>
<tr><td width="20%">Slip No:</td><td><?php echo $rs23['slip']; ?></td></tr>
<tr><td width="20%">Att Name:</td><td><?php echo $rmq2['guestname']; ?></td></tr>
<tr><td width="20%">F.N/W/o:</td><td><?php echo $rmq2['fnwo']; ?></td ></tr>
<tr><td width="20%">Mobile:</td><td><?php echo $rmq2['mobile']; ?></td></tr>
<tr><td width="20%">Room/DMT:</td><td><?php echo $myfr['room_no']."/2"; ?></td ></tr>
<tr><td colspan="3"><center>Valid For 4 Days Only.</center></td ></tr>


</table>
				</div>	
		<?php
	}
}



if(isset($_GET['exid']))
{$exid=$_GET['exid'];
 $seq1="select * from `guests` where `ssid`='$exid';";
				$rq1=mysqli_query($con,$seq1);
				$rmq21=mysqli_fetch_array($rq1);	
				$wit1="select * from `visits` where `ssid`='$exid'  ORDER BY `rcpt` DESC LIMIT 1;";
	$myr1=mysqli_query($con,$wit1);
	if($myfr1=mysqli_fetch_array($myr1))
	{
		$t=$myfr1['bookingid'];
		$sel231="select * from `cash` where `bookinid`='$t' and `cashtype`='advance' ORDER BY `slip` DESC LIMIT 1;";
				$rr231=mysqli_query($con,$sel231);
				$rs231=mysqli_fetch_array($rr231);
		?>		
		<div style="border-style: solid;border-width: medium;">		
<h3 align="center">SHRI RAM SHARNAM SEWA SADAN</h3>
<h5 align="center">A Unit Of Ram Sewa Swami Satyanand Trust</h5>
<table align="center" style="width:70%;height:auto;"  id="applicationf">
<tr><td width="25%"></td><td width="45%"></td><td width="30%"></td></tr>
<tr><td colspan="3"><center><b>APPLICATION FORM</b></center> </td></tr>
<tr><td>Security Slip No:</td><td><?php echo $rs231['slip']; ?></td><td rowspan="6"><img align="right" src="<?php echo $myfr1['photo']; ?>" height="150px" width="auto"></td></tr>
<tr><td>Arrival  Time:</td><td><?php echo $chec = date('d-m-Y G:i:s', $myfr1['checkin_date']); ?></td></tr>
<tr><td>Att Name:</td><td><?php echo $myfr1['guestname']; ?></td></tr>
<tr><td>Address:</td><td><?php echo $myfr1['address']; ?></td></tr>
<tr><td>Mobile:</td><td><?php echo $myfr1['mobile']; ?></td></tr>
<tr><td>ID Proof Type:</td><td><?php echo $myfr1['id_type']; ?></td></tr>
<tr><td>ID Proof No:</td ><td colspan="2"><?php echo $myfr1['id_number']; ?></td></tr>
<tr><td>MRD/Adm No:</td><td colspan="2"><?php echo $myfr1['mrd']; ?></td></tr>
<tr><td>Adm Date:</td ><td colspan="2"><?php echo $myfr1['patient_adm_date']; ?></td></tr>
<tr><td>Patient Name:</td ><td colspan="2"><?php echo $myfr1['patient']; ?></td></tr>
<tr><td>Room/Bed:</td><td colspan="2"><?php echo $myfr1['room_no']."/".$myfr1['bed_no']; ?></td></tr>
<tr><td>Security:</td><td colspan="2"><?php echo $myfr1['advance']; ?></td></tr>
<tr><td>Unique Booking No:</td ><td colspan="2"><?php echo $myfr1['bookingid']; ?></td></tr>
<tr><td>Extra Notes:</td><td colspan="2">_ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ </td></tr>
<tr><td colspan=3>&nbsp;</td></tr>

</table>

<table align="center" style="width:70%;height:auto;"  id="applicationf">
<tr><td >Attendant Sign:<br>.....................</td><td style="text-align:right;">Manager:<br>.....................</td><td style="text-align:right;">FrontDesk/Cashier:<br><?php echo $_SESSION['usr']; ?></td></tr>
</table><br></div>


	<div >	    	   
	<font size="3">
<style>.baseb{border-bottom-style: solid;border-bottom-width: 1px;padding-bottom: 5px;padding-top: 5px;}
.titles{font-size: 15px;color:#f00; font-weight:bold;padding-bottom: 5px;padding-top: 5px;}
.rw{}</style>

<table border="0" cellpadding="0" cellspacing="0" width="600" >
	<tbody>
		<tr>
			<td colspan="7" height="80" class="rw"><img src="assets/img/head.jpg" width="448px" height="auto"></td>
		</tr>
		<tr height="4">
			<td width="38"></td>
			<td width="70"></td>
			<td width="64"></td>
			<td width="44"></td>
			<td width="95"></td>
			<td width="47"></td>
			<td width="99"></td>
		</tr>
		<tr height="20"  class="rw">
			<td height="20" width="38" class="titles">No:&nbsp;</td>
			<td class="baseb" width="64" colspan="2"> <?php echo $rs231['slip']; ?></td>
			<td colspan="4"></td>
		</tr>
		<tr height="20" class="rw">
			<td colspan="2" height="20" class="titles">Room/Bed</td>
			<td class="baseb"> <?php echo $myfr1['room_no']."/".$myfr1['bed_no'];?> </td>
			<td class="titles">Time</td>
			<td class="baseb" ><?php $ttem=$rs231['handovertime'];echo date('h:i a',$ttem); ?></td>
			<td class="titles">Dated</td>
			<td class="baseb" ><?php $ttem=$rs2['handovertime'];echo date('d-m-Y',$ttem); ?></td>
		</tr>
		<tr height="20" class="rw">
			<td colspan="4" height="20" style="" class="titles">Received with thanks from</td>
			<td colspan="3" class="baseb" ><?php echo  $myfr1['guestname'];  ?></td>
		</tr>
		<tr height="20" class="rw">
			<td colspan="4" height="20" class="titles">Father&#39;s Husband Name</td>
			<td colspan="3" class="baseb" ><?php echo $myfr1['fnwo']; ?></td>
		</tr>
		<tr height="20" class="rw">
			<td colspan="2" height="20" class="titles">Admn/Ref No</td>
			<td colspan="3" class="baseb" ><?php echo $myfr1['mrd']; ?></td>
			<td class="titles">Dated</td>
			<td class="baseb" ><?php echo $myfr1['patient_adm_date']; ?></td>
		</tr>
		<tr height="20" class="rw">
			<td colspan="3" height="20" class="titles">the sum of Rupees</td>
			<td colspan="4" class="baseb" style="text-transform:capitalize;"><?php if(isset($_GET['samount'])){ $number=$_GET['samount']; } else { $number=$myfr1['advance']; } include("inc/indiancurrency.php");?></td>
		</tr>
		<tr height="20" class="rw">
			<td colspan="4" height="20"  class="baseb" ></td>
			<td colspan="3" style="padding-bottom: 5px;padding-top: 5px;font-size: 14px;color:#f00; font-weight:bold;">ON A/C OF SECURITY DEPOSIT</td>
		</tr>
		<tr height="20" class="rw">
			<td height="20" class="titles">Rs.</td>
			<td colspan="2" class="baseb" ><?php if(isset($_GET['samount'])){ echo $_GET['samount'];} else { echo $myfr1['advance']; } ?></td>
			<td class="titles">(M):</td>
			<td colspan="2" class="baseb" ><?php echo $myfr1['mobile']; ?></td>
			<td class="titles" align="right">Cashier</td>
		</tr>
	</tbody>
</table>
		     </div>







		<div style="float:right; border-style: solid;width:48%;border-width: medium;">
	
<h4 align="center" style="color:#f00;"><b>SHRI RAM SHARNAM SEWA SADAN</b></h4>
<h6 align="center" style="color:#f00;margin-top:-9px;"><b>A Unit Of Ram Sewa Swami Satyanand Trust</b></h6>
<table align="center" style="width:91%;height:auto;padding:2px;">
<tr><td width="20%">Date:</td><td width="35%"><?php echo date('d-m-Y', $myfr1['checkin_date']);  ?></td><td rowspan="6" width="45%"><img align="right" src="<?php echo $rmq21['photo']; ?>" height="125px" width="auto"></td></tr>
<tr><td width="20%">Slip No:</td><td><?php echo $rs231['slip']; ?></td></tr>
<tr><td width="20%">Att Name:</td><td><?php echo $rmq21['guestname']; ?></td></tr>
<tr><td width="20%">F.N/W/o:</td><td><?php echo $rmq21['fnwo']; ?></td ></tr>
<tr><td width="20%">Mobile:</td><td><?php echo $rmq21['mobile']; ?></td></tr>
<tr><td width="20%">Room/DMT:</td><td><?php echo $myfr1['room_no']."/".$myfr1['bed_no']; ?></td ></tr>
<tr><td colspan="3"><center>Valid For 4 Days Only.</center></td ></tr>


</table>
				</div>	
		<?php
	}
	
}
	 ?>	
	
				</center>
<input type="button" onclick="printDiv('printableArea')" value="Print" /></div>
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