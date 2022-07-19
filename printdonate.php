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

        <div class="container-fluid">
            <div class="row clearfix">
               
			   	
				<center>
				<?php
				$s=$_GET['booking'];
				$sel="select * from `cash` where `reciptno`='$s';";
				$rr=mysqli_query($con,$sel);
				$rs=mysqli_fetch_array($rr);
		
				?>
				
				
				<div id="printableArea" style="width:100%;height:90%">


		<br>
	
		<div><img src="assets/img/donall.jpg" height="300px" width="auto"></div><font size="3">
<table height="168px"  align="center"  width="74%" background="" style="margin-top:-185px; margin-left:60px;z-index:9999569;">
    <tr><td style="width:25%;">&nbsp;</td><td style="width:25%;">&nbsp;</td><td style="width:25%;">&nbsp;</td><td style="width:25%;">&nbsp;</td></tr>
<tr><td colspan=2 style="vertical-align:text-top;"><?php echo $rs['reciptno'];?></td><td colspan=2 style="vertical-align: text-top;"><?php $stt=$rs['handovertime']; echo date('d-m-Y', $stt);?> </td></tr>
<tr><td style="vertical-align: text-top;"> </td><td colspan=3 class="baseb" style="vertical-align: text-top;text-transform:uppercase;"><?php $number=$rs['donation']; include("inc/indiancurrency.php");?> </td></tr>
<tr><td colspan=2 style="vertical-align: text-top;"><?php echo $rs['dslip'];?></td><td colspan=2 style="vertical-align: text-top;"><?php echo $rs['room']."/".$rs['bed'];?> </td></tr>
<tr><td style="vertical-align: text-top;"><?php echo $rs['donation'];?></td><td> </td></tr>

		</table>
		
			
				</div>
				
				
				
				
				
				
				</center>
<input type="button" onclick="printDiv('printableArea')" value="Print" />
			   
			   
            </div>
        </div>
    </div>
</section>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="assets/bundles/mainscripts.bundle.js"></script>
</body>
</html><style>
#applicationf
{
	
}
#applicationf tr{
}
#applicationf tr td{
	color:#000;
	font-size:19px;
}
</style>