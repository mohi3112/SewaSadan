 <?php
include('lcheck.php');

$string = date('Y/m/d H:i:s a', time());
$year = substr($string,0,4);
$month = substr($string,5,2);
echo $day = substr($string,8,2);
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
	 window.setTimeout(window.location.href = "donationall.php",1000);
}</script>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Custom Donation</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
						<center>
				<?php
				$s=$_GET['booking'];
				$sel="select * from `visits` where `bookingid`='$s';";
				$rr=mysqli_query($con,$sel);
				$rs=mysqli_fetch_array($rr);
		
				?>
				
				
				<div id="printableArea" style="width:100%;height:90%">


		<br>
		<?php
	$s=$_GET['booking'];
		 $select="select * from `cash` where `bookinid`='$s';";
				$rrs=mysqli_query($con,$select);
				$rss=mysqli_fetch_array($rrs);
				$mytt=$rss['handovertime'];
			
		?>
		<div><img src="assets/img/custom.png" height="300px" width="auto"></div><font size="3">
<table height="160px" align="center" width="68%" background="" style="margin-top:-165px; margin-left:80px;z-index:9999569;">
<tr><td>&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;C-<?php echo $rss['reciptno'];?></td><td>&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;<?php echo $chec = date('d-m-Y', $mytt);?> </td></tr>
<tr><td colspan=3 valign="top">&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;<?php $number=$rss['donation']; include("inc/indiancurrency.php");?> </td></tr>
<tr><td><h2 style="color:#fff;"><?php echo $rss['donation'];?>/-</h2></td><td>&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;</td><td> </td></tr>
		</table>
		
	
				
				
				
				
				
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