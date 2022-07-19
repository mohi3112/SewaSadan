
  <?php
session_start();
$site="http://sewasadan.live/";

include("inc/config.php");
$time=time();
$chour=date('G',time());
$cday=date('d',time());
$cmon=date('m-Y',time());
if($chour<8){$cday=$cday-1;}
$finalin=$cday."-".$cmon." 08:00:00";
$ds=strtotime($finalin);
$de=$ds+86400;
$finalout=$cday."-".$cmon." 00:00:00";
$cmn=strtotime($finalout);
$com=$cmn+86400;
//$finalout=$cday."-".$cmon." 00:00:00";
//$indate=$finalin+86400;
//$outdate=$finalout+86400;
	
//$today=$y."-".$et."-".$yy."%";
//$daystart=$y."-".$et."-".$yy." 08:00:00";

//$refstart=$y."-".$et."-".$yy." 00:00:00";
//$df=strtotime($refstart);
//$dayend=$y."-".$et."-".$yy." 23:59:59";
//$de=strtotime($dayend);
//$newdat="%-".$m."-".$yy."%";

//$fe=$df+86400;
$qr="SELECT sum(donation)as security FROM `cash` WHERE `cashtype`='advance' and `handovertime` between '$ds' and '$de';";
$tr=mysqli_query($con,$qr);
$sec=mysqli_fetch_array($tr);

$qr2="SELECT sum(donation)as donation FROM `cash` WHERE `cashtype`='Extra Donation' and  `handovertime` between '$cmn' and '$com';";
$tr2=mysqli_query($con,$qr2);
$don=mysqli_fetch_array($tr2);

$qr3="SELECT sum(refund)as refund FROM `cash` WHERE `cashtype`='refund' and `handovertime` between '$cmn' and '$com';";
$tr3=mysqli_query($con,$qr3);
$ref=mysqli_fetch_array($tr3);

$qr9="SELECT sum(donation)as billing FROM `cash` WHERE `cashtype`='donation' and `dslip`='bill' and `handovertime` between '$cmn' and '$com';";
$tr9=mysqli_query($con,$qr9);
$bill=mysqli_fetch_array($tr9);

$qr4="SELECT sum(handover)as bank FROM `cash` WHERE `handoverto`='bank' and `handovertime` between '$cmn' and '$com';";
$tr4=mysqli_query($con,$qr4);
$bank=mysqli_fetch_array($tr4);

$qr6="SELECT sum(handover)as banktot FROM `cash` WHERE `handoverto`='bank' and `handovertime` < '$cmn';";
$tr6=mysqli_query($con,$qr6);
$banktot=mysqli_fetch_array($tr6);
$qr5="SELECT * FROM `cash` WHERE `cashtype`='lastday' and `handovertime` between '$cmn' and '$com';";
$tr5=mysqli_query($con,$qr5);
$lastday=mysqli_fetch_array($tr5);
$refd= $ref['refund']; $tddon=$don['donation'];
$add=$lastday['handover']+$sec['security']+$bill['billing']+$tddon;
$sub=$refd+$bank['bank'];
$cash=$add-$sub;


$time2=time()+9*60*60;
$usr=$_SESSION['usr'];	
$td=date('j-m-Y',time());

if (isset($_POST['login']))
{
	$user=$_POST['usr'];
	$pas=$_POST['pass1'];

$ad="select * from `user` where `login`='$user' and `password`='$pas';";
$ar=mysqli_query($con,$ad);
if ($at=mysqli_fetch_array($ar))
{
setcookie("user",$user,time()+12*8000);
$_SESSION['usr']=$user;
$_SESSION['type']=$at['actype'];
$_SESSION['dp']=$at['photo'];
//header("location:lcheck.php");
echo "<script>window.location.href = 'lcheck.php';</script>";
}else{
echo "Please check user name or password <a href=index.php> Try Again</a>";
}
}
if (isset($_GET['a']))
{
setcookie("user",$user,time()-12*8000);
//header("location:index.php");
echo "<script>window.location.href = 'index.php';</script>";
}

if (isset($_SESSION['usr']) && $_SESSION['usr']<>""){ include("header.php"); }

$e=$_SERVER['REQUEST_URI'];
$fn=basename($e);
if($fn=="lcheck.php")
{
	?>
	
	
<style>
    .blink_me {
  
  color:#f00;
  font-weight:bold;
}

</style>	
	
	

	
	
	<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
       
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        
                        <div class="body">
                            <center><h5>Welcome To Shri Ram Sharnam Sewa Sadan.</h5></center>
                           <!-- <marquee ><p style="color:#2a5f2a;font-weight:bold;">New Renew Functionality is Live Now. Please Use That For Renew an Account.</p></marquee><br> -->
                            <table align="center" width="60%" >
	                <tr><td>Date: <?php echo date('d/m/Y',time()); ?> </td><td>Time: <?php echo date('h:i a',time());?></td></tr>
					<tr><td colspan=2><h3>Counters</h3></td></tr>
				<tr><td>Next Slip: </td><td class="blink_me"><?php echo $slipnext;?></td></tr>
				<tr><td>Next Bill: </td><td class="blink_me"><?php echo $reciptnext;?></td></tr>
				<tr><td>Next vcno: </td><td class="blink_me"><?php echo $vcnext;?></td></tr>
				<tr><td>Next Recipt:</td><td class="blink_me"><?php echo $donationnext;?></td></tr>
					<tr><td colspan=2><h3>Cash Related</h3></td></tr>
					<tr><td>Today Opening Bal: </td><td class="blink_me">₹ <?php echo $lastday['handover'];?> /-</td></tr>
			
					<tr><td>Today Total Security: </td><td class="blink_me">₹ <?php echo $sec['security'];?> /-</td></tr>
					<tr><td>Today Total Refund: </td><td class="blink_me">₹ <?php echo $refd; ?> /-</td></tr>
					<tr><td>Today Total Billing: </td><td class="blink_me">₹ <?php echo $bill['billing'];?> /-</td></tr>
				<tr><td>Today Total Donation: </td><td class="blink_me">₹ <?php if(!isset($tddon)){echo "0";}else{echo $tddon;}?> /-</td></tr>
				<tr><td>Today Bank Transfer: </td><td class="blink_me">₹ <?php if(!isset($bank['bank'])){echo "0";}else{echo $bank['bank'];}?> /-</td></tr>
					<tr><td>Cash In Hand: </td><td class="blink_me">₹ <?php echo $cash;?> /-</td></tr>
				
				</table>
				
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
	
	
	
				
	
				
			<?php //echo "<br> last Slip: ".$sliplast;?>
				<div class="row mt">
              <div class="col-lg-6">
			  <?php $usr=$_SESSION['usr']; 
			  $d=date('j',time());$m=date('m',time());$y=date('Y',time());
			  $h=date('G',time());
			  if($h<8){$d--;}
			  $tds=$d."-".$m."-".$y;
 $y="select * from `cash` where  `name`='records' and  `time` like '$tds%' and `collectby`='$usr'   ORDER BY `sr` ASC LIMIT 1;"; 
			  $aq=mysqli_query($con,$y) or die(mysqli_error());
			  
				$scheck=mysqli_fetch_array($aq);
				if($scheck['handoverto']=="start")
				{
						$starting=$scheck['sr'];
						$_SESSION['starting']=$starting;
						?>
					<a href="lcheck.php?stopnow=1"><input type="button" value="Stop Now"></a>
					<?php
						
				}
				else{
					$ending=$scheck['sr'];
					$_SESSION['ending']=$ending;
					?>
						<?php
					}
				?>
			  
				</div>
				<div class="col-lg-6">
			  <?php
	$qr4="SELECT sum(handover)as bank FROM `cash` WHERE `handoverto`='bank' and `handovertime` between '$finalout' and '$outdate;";
$tr4=mysqli_query($con,$qr4);
$bank=mysqli_fetch_array($tr4);		
 $tyr="SELECT sum(donation) as total from `cash` where `cashtype`='donation' and `handovertime` between '$finalout' and '$outdate';";
 $rtr=mysqli_query($con,$tyr);
$totaladvance=mysqli_fetch_array($rtr);
$mydonation=$totaladvance['total'];


$tyr2="SELECT sum(donation) as total2 from `cash` where `cashtype`='advance' and `handovertime` between '$finalin' and '$indate';";
 $rtr2=mysqli_query($con,$tyr2);
 $totalsecurity=mysqli_fetch_array($rtr2);
$mysecurity=$totalsecurity['total2'];


$tyr3="SELECT sum(refund) as total3 from `cash` where `cashtype`='Refund'  and `handovertime` between '$finalout' and '$outdate';";
 $rtr3=mysqli_query($con,$tyr3);
 $totalrefund=mysqli_fetch_array($rtr3);

 
 
$myrefund=$totalrefund['total3'];
$exact=$mysecurity+$mydonation-$myrefund;
?>



<?php
			$mrc="SELECT min(reciptno) as minrec from `cash` where `cashtype`='donation' and `handovertime` between '$finalout' and '$outdate';";
 $mrc2=mysqli_query($con,$mrc);
 $minrecipt=mysqli_fetch_array($mrc2);
$minrecipts=$minrecipt['minrec'];

	$max="SELECT max(reciptno) as maxrec from `cash` where `cashtype`='donation' and `handovertime` between '$finalout' and '$outdate';"; 
 $max2=mysqli_query($con,$max);
 $maxrecipt=mysqli_fetch_array($max2);
$maxrecipts=$maxrecipt['maxrec'];

			$in="SELECT min(slip) as minslip from `cash` where `cashtype`='advance' and `handovertime` between '$finalin' and '$indate';";
 $minin=mysqli_query($con,$in);
 $mininno=mysqli_fetch_array($minin);
$minslip=$mininno['minslip'];

	$maxin="SELECT max(slip) as maxslip from `cash` where `cashtype`='advance' and `handovertime` between '$finalin' and '$indate';";
 $maxin2=mysqli_query($con,$maxin);
 $maxinno=mysqli_fetch_array($maxin2);
$maxslip=$maxinno['maxslip'];
			$invc="SELECT min(vcno) as minvc from `cash` where `cashtype`='refund' and `handovertime` between '$finalout' and '$outdate';";
 $mininvc=mysqli_query($con,$invc);
 $mininnovc=mysqli_fetch_array($mininvc);
$minvc=$mininnovc['minvc'];

	$maxinvc="SELECT max(vcno) as maxvc from `cash` where `cashtype`='refund' and `handovertime` between '$finalout' and '$outdate';";
 $maxinvc2=mysqli_query($con,$maxinvc);
 $maxinnovc=mysqli_fetch_array($maxinvc2);
$maxvc=$maxinnovc['maxvc'];
?>
	<?php
	
}

$y=date('d', time()); $et=date('m', time()); $yy=date('Y', time());

?>


<script type="text/javascript">
function exportToExcel(tableID, filename = ''){
    var downloadurl;
    var dataFileType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTMLData = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'export_excel_data.xls';
    
    // Create download link element
    downloadurl = document.createElement("a");
    
    document.body.appendChild(downloadurl);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTMLData], {
            type: dataFileType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadurl.href = 'data:' + dataFileType + ', ' + tableHTMLData;
    
        // Setting the file name
        downloadurl.download = filename;
        
        //triggering the function
        downloadurl.click();
    }
}
 
</script>
