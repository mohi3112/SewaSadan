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
	 window.setTimeout(window.location.href = "checkout.php",1000);
}</script>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
      
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					
				<center>
				<?php
				
				if($_GET['booking']<>"")
				{
				    $s=$_GET['booking'];
				}
				if($_GET['slip']<>"")
				{
				 $cl=$fnyear."/".$_GET['slip'];
				$sel1="select * from `cash` where `slip`='$cl';";
				$rr1=mysqli_query($con,$sel1);
				$rs1=mysqli_fetch_array($rr1);
				$sre=$rs1['bookinid'];
				echo "<script>window.location.href = 'printafter.php?booking=".$sre."';</script>";
				}
				$sel="select * from `visits` where `bookingid`='$s' ORDER BY `rcpt` ASC LIMIT 1;";
				$rr=mysqli_query($con,$sel);
				$rs=mysqli_fetch_array($rr);
		$sel2="select * from `cash` where `bookinid`='$s' and `cashtype`='advance' ORDER BY `sr` DESC LIMIT 1;";
				$rr2=mysqli_query($con,$sel2);
				$rs2=mysqli_fetch_array($rr2);
				?>
<style>
	#vctab tr td{
		
		vertical-align: bottom;
	}
	
</style>				
				
				<div id="printableArea" style="width:100%;height:90%">
		
<div><img src="assets/img/vc.jpg" height="500px" width="auto"></div><font size="3">
<table id="vctab" height="auto"  width="75%" background=""  style="margin-top:-388px; margin-left:200px;font-size:18px;">
<tr><td width='50%' style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <?php echo $rs['vcno']; ?><br>&nbsp;</td><td width='20%' style="text-align:right;"> &nbsp;&nbsp;&nbsp; <?php echo $day.'-'.$month.'-'.$year; ?><br><?php echo $hour.':'.$minute.' '.$slg; ?></td><td width='30%'></td></tr>
<tr><td colspan=2 style="font-size:25px;text-align:center;"> &nbsp;&nbsp;</td><td></td></tr>
<tr><td colspan=2> &nbsp;</td><td><?php echo $rs['advance']."/-"; ?></td></tr>
<tr><td colspan=2><center>  <?php echo $rs['guestname']; ?></center></td><td></td></tr>
<tr><td colspan=2 style="text-align:right;" > <?php echo $rs2['slip']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td></td></tr>
<tr><td colspan=2 style="font-size:8px;text-align:center;"> &nbsp;&nbsp;</td><td></td></tr>
<tr><td colspan=2> <center> <?php echo date('d-m-Y',$rs['checkin_date']); ?></center></td><td></td></tr>
<tr><td colspan=2>&nbsp;</td><td></td></tr><tr><td colspan=2>&nbsp;</td><td></td></tr>
<tr><td colspan=2>&nbsp;</td><td></td></tr>
<tr><td colspan=2>&nbsp;</td><td></td></tr><tr><td colspan=2>&nbsp;</td><td></td></tr>
<tr><td colspan=2>&nbsp;</td><td></td></tr>
<tr><td colspan=2 style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php $number=$rs['advance'];include("inc/indiancurrency.php");?></td><td><?php echo $rs['advance']."/-"; ?></td></tr>
</table>
	
<br><br><br>
		<?php
		if($rs['d1000']=='bill')
		{
		
			$s=$_GET['booking'];
		 $select="select * from `cash` where `bookinid`='$s' and `dslip`='bill' limit 1;";
				$rrs=mysqli_query($con,$select);
				$rss=mysqli_fetch_array($rrs);
				
				///print_r($rss);
		?>
	

<style>
	#Table_01 tr td{
	COLOR:#000;	vertical-align: bottom;
	}
	
</style>
<br>
<table id="Table_01" style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95;border:15px #fff solid;" align="center" width="652" height="351"  cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="12">
			<img src="images/bill2_01.jpg" align="center" width="652" height="89" alt=""></td>
	</tr>
	<tr>
		<td colspan="12" ALIGN="center"  style="border-bottom: 2px solid #000;border-top: 2px solid #000;">
			CASH RECEIPT</td>
	</tr>
	<tr>
		<td colspan="12">
			</td>
	</tr>
	<tr>
		<td width="18%">
			Receipt No:</td>
		<td colspan="4" style="border-bottom: 1px solid #000;font-weight:bold;">
			<?php echo $rss['reciptno'];?></td>
	
		<td >
			&nbsp;</td>
			<td >
		<center>Date:</center>	</td>
		<td colspan="6" style="border-bottom: 1px solid #000;font-weight:bold;">
			<?php echo $chec = date('d-m-Y h:i a', time());?></td>
	</tr>
	<tr>
		<td colspan="12">
			RECEIVED WITH THANKS FROM: <span style="border-bottom: 1px solid #000;font-weight:bold;"> 	<?php echo $rss['name'];?></span></td>
		
	</tr>
	<tr>
		<td>
			As Rent @</td>
		<td style="border-bottom: 1px solid #000;font-weight:bold;" width="10%">
		<?php echo $rs['bed_charge']; ?></td>
		<td colspan="5" style="font-size:15px;">
			PER DAY ON A/C OF ROOM/BED NO:</td>
		<td style="border-bottom: 1px solid #000;font-weight:bold;">
			<?php echo $rss['room'].'/'.$rss['bed'];?></td>
		<td >
			For</td>
		<td colspan="2" style="border-bottom: 1px solid #000;font-weight:bold;">
			<?php echo $rs['rno1000'];?></td>
		<td>
			Days</td>
	</tr>
	<tr>
		<td>
			Address:</td>
		<td colspan="11" style="border-bottom: 1px solid #000;font-weight:bold;">
			<?php echo $rs['address'];?></td>
	</tr>
	<tr>
		<td colspan="2">
			CONTACT NO:</td>
		<td colspan="10" style="border-bottom: 1px solid #000;font-weight:bold;">
			<?php echo $rs['mobile'];?></td>
	</tr>
	<tr>
		<td colspan="4" style="border-bottom: 1px solid #000;">
			Rs. <?php echo $rss['donation'];?></td>
		<td colspan="8" ALIGN="RIGHT">
			SIGNATURE</td>
	</tr>
	<tr>
		<td colspan="12">
			</td>
	</tr>
	
</table>

<table id="Table_01" style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95;border:15px #fff solid;" align="center" width="652" height="351"  cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="12">
			<img src="images/bill2_01.jpg" align="center" width="652" height="89" alt=""></td>
	</tr>
	<tr>
		<td colspan="12" ALIGN="center"  style="border-bottom: 2px solid #000;border-top: 2px solid #000;">
			CASH RECEIPT</td>
	</tr>
	<tr>
		<td colspan="12">
			</td>
	</tr>
	<tr>
		<td width="18%">
			Receipt No:</td>
		<td colspan="4" style="border-bottom: 1px solid #000;font-weight:bold;">
			<?php echo $rss['reciptno'];?></td>
	
		<td >
			&nbsp;</td>
			<td >
		<center>Date:</center>	</td>
		<td colspan="6" style="border-bottom: 1px solid #000;font-weight:bold;">
			<?php echo $chec = date('d-m-Y h:i a', time());?></td>
	</tr>
	<tr>
		<td colspan="12">
			RECEIVED WITH THANKS FROM: <span style="border-bottom: 1px solid #000;font-weight:bold;"> 	<?php echo $rss['name'];?></span></td>
		
	</tr>
	<tr>
		<td>
			As Rent @</td>
		<td style="border-bottom: 1px solid #000;font-weight:bold;" width="10%">
		<?php echo $rs['bed_charge']; ?></td>
		<td colspan="5" style="font-size:15px;">
			PER DAY ON A/C OF ROOM/BED NO:</td>
		<td style="border-bottom: 1px solid #000;font-weight:bold;">
			<?php echo $rss['room'].'/'.$rss['bed'];?></td>
		<td >
			For</td>
		<td colspan="2" style="border-bottom: 1px solid #000;font-weight:bold;">
			<?php echo $rs['rno1000'];?></td>
		<td>
			Days</td>
	</tr>
	<tr>
		<td>
			Address:</td>
		<td colspan="11" style="border-bottom: 1px solid #000;font-weight:bold;">
			<?php echo $rs['address'];?></td>
	</tr>
	<tr>
		<td colspan="2">
			CONTACT NO:</td>
		<td colspan="10" style="border-bottom: 1px solid #000;font-weight:bold;">
			<?php echo $rs['mobile'];?></td>
	</tr>
	<tr>
		<td colspan="4" style="border-bottom: 1px solid #000;">
			Rs. <?php echo $rss['donation'];?></td>
		<td colspan="8" ALIGN="RIGHT">
			SIGNATURE</td>
	</tr>
	<tr>
		<td colspan="12">
			</td>
	</tr>
	
</table>











		
		
		
		

		
		<?php
		}
		?>
			<?php
		if($rs['d100']>0)
		{
			$s=$_GET['booking'];
		  $select="select * from `cash` where `bookinid`='$s' and `dslip`='100';";
				$rrs=mysqli_query($con,$select);
				while($rss=mysqli_fetch_array($rrs))
				{
				//print_r($rss);
		?>
		<div><img src="assets/img/100.png" height="300px" width="auto"></div><font size="3">
<table height="160px" align="center" width="68%" background="" style="margin-top:-165px; margin-left:170px;z-index:9999569;">
<tr><td style="vertical-align: text-top;">C-<?php echo $rss['reciptno'];?></td><td>&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;</td><td style="vertical-align: text-top;"><?php echo $chec = date('d-m-Y', time());?> </td></tr>
		</table>
		
		
		<?php
		}}
		?>
			<?php
		if($rs['d200']>0)
		{
			$s=$_GET['booking'];
		 $select="select * from `cash` where `bookinid`='$s' and `dslip`='200';";
				$rrs=mysqli_query($con,$select);
				while($rss=mysqli_fetch_array($rrs))
				{
				//print_r($rss);
		?>
		<div><img src="assets/img/200.png" height="300px" width="auto"></div><font size="3">
<table height="160px" align="center" width="68%" background="" style="margin-top:-165px; margin-left:170px;z-index:9999569;">
<tr><td style="vertical-align: text-top;">C-<?php echo $rss['reciptno'];?></td><td>&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;</td><td style="vertical-align: text-top;"><?php echo $chec = date('d-m-Y', time());?> </td></tr>
		</table>
		
		
		<?php
		}}
		?>
			<?php
		if($rs['d500']>0)
		{
			$s=$_GET['booking'];
		 $select="select * from `cash` where `bookinid`='$s' and `dslip`='500';";
				$rrs=mysqli_query($con,$select);
				while($rss=mysqli_fetch_array($rrs))
				{
				//print_r($rss);
		?>
		<div><img src="assets/img/500.png" height="300px" width="auto"></div><font size="3">
<table height="160px" align="center" width="68%" background="" style="margin-top:-165px; margin-left:170px;z-index:9999669;">
<tr><td style="vertical-align: text-top;">C-<?php echo $rss['reciptno'];?></td><td>&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;</td><td style="vertical-align: text-top;"><?php echo $chec = date('d-m-Y', time());?> </td></tr>
		</table>
		
		
		<?php
		}}
		?>
				</div>
				
				
				
				
				
				
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