<?php
include('lcheck.php');
$string = date('Y/m/d H:i:s a', time());
$year = substr($string,0,4);
$month = substr($string,5,2);
$day = substr($string,8,2);
$x=$day+3;
$hour = substr($string,11,2);
$minute = substr($string,14,2);
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
}</script>

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
			
				?>
				
				
				<div id="printableArea" style="width:100%;height:90%;">
		<?php
if(isset($_GET['booking']))
{				$s=$_GET['booking'];
				$sel="select * from `visits` where `bookingid`='$s' and `bed_no`='2';";
				$rr=mysqli_query($con,$sel);
				$rs=mysqli_fetch_array($rr);
				$sel2="select * from `cash` where `bookinid`='$s' and `cashtype`='advance';";
				$rr2=mysqli_query($con,$sel2);
				$rs2=mysqli_fetch_array($rr2); 
	
		?>
		<div style="float:right; border-style: solid;width:48%;border-width: medium;">
		<h4 align="center" style="color:#f00;"><b>SHRI RAM SHARNAM SEWA SADAN</b></h4>
<h6 align="center" style="color:#f00;margin-top:-9px;"><b>A Unit Of Ram Sewa Swami Satyanand Trust</b></h6>
<table align="center" style="width:91%;height:auto;padding:2px;">
<tr><td width="20%">Date:</td><td width="35%"><?php echo date('d-m-Y', $rs['checkin_date']);  ?></td><td rowspan="6" width="45%"><img align="right" src="<?php echo $rs['photo']; ?>" height="125px" width="auto"></td></tr>
<tr><td width="20%">Slip No:</td><td><?php echo $rs2['slip']; ?></td></tr>
<tr><td width="20%">Att Name:</td><td><?php echo $rs['guestname']; ?></td></tr>
<tr><td width="20%">F.N/W/o:</td><td><?php echo $rs['fnwo']; ?></td ></tr>
<tr><td width="20%">Mobile:</td><td><?php echo $rs['mobile']; ?></td></tr>
<tr><td width="20%">Room/DMT:</td><td><?php echo $rs['room_no']."/2"; ?></td ></tr>
<tr><td colspan="3"><center>Valid For 5 Days Only.</center></td ></tr>
</table>
				</div>	
		<?php	
}
?>				
				</center>
<input type="button" onclick="printDiv('printableArea')" value="Print" />
				
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