<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
$amttotalfoot=0;
$bala=0;
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Accounts Report</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<table width="100%" cellspacing="6px" style="padding-top:100px;background-color:#ccc;" align="center" width="100%" bgcolor="#ccc">
						  <form method="get" action="accountsreport.php">
						  <td>Start Date: <input type="date" name="start"></td><td>End Date: <input type="date" name="end"></td><td><input type="submit" name="chk" value="search"></td>
						  </tr>
						  </table> 
						  <br><br>
						  <?php ?>
<div id="printableArea" style="width:100%;height:90%;">
	<section id="no-more-tables" width="100%">
                              <table id="tblexportData" class="table table-bordered table-striped table-condensed cf" >
                                  <thead class="cf">
								  <tr>
								  
								  <th>VC NO</th>
								  <th>AS NO</th>
								  <th>SECURITY</th>
								  <th>OVR SECURITY</th>
								  <th>DATE</th>
								  <th>BILL NO</th>
								  <th>AMOUNT</th>
								  <th>REFUND BAL</th>
								  </tr>
								  
                                  </thead>
                                  <tbody>						  
						  
						  
						  
	<?php					 
if(isset($_GET['chk']))
{
	foreach($_GET as $k=>$v)
		{
			$$k=$v;
		}
		
	$st=strtotime($start);	
	$ft=date('d-m-Y',$st);
	$date1=$ft." 00:00:00";
	$date1f=strtotime($date1);
	$en=strtotime($end);	
	$en1=date('d-m-Y',$en);
	$date2=$en1." 23:59:59";	
	$date2f=strtotime($date2);
	
/*	$d=date('j',$st);
	$m=date('m',$st);
	$yy=date('Y',$st);
	$ft=date('-m-Y',$st);
 $stt="01".$ft." 00:00:00";
 
	$mystart=strtotime($stt);
	
	$et=date('m',$st);
	if($et==1){$dd=31;}
	if($et==2){$dd=28;}
	if($et==3){$dd=31;}
	if($et==4){$dd=30;}
	if($et==5){$dd=31;}
	if($et==6){$dd=30;}
	if($et==7){$dd=31;}
	if($et==8){$dd=31;}
	if($et==9){$dd=30;}
	if($et==10){$dd=31;}
	if($et==11){$dd=30;}
	if($et==12){$dd=31;}

$enn=$dd.$ft." 23:59:59";
	$myentime=strtotime($enn);
 
 for($y=1;$y<=$dd;$y++)
{	
$today=$y."-".$et."-".$yy."%";
$daystart=$y."-".$et."-".$yy." 00:00:00";
$ds=strtotime($daystart);
$dayend=$y."-".$et."-".$yy." 23:59:59";
$de=strtotime($dayend);
$newdat="%-".$m."-".$yy."%";
*/
$qr="SELECT * FROM `visits` WHERE `checkout_date` between '$date1f' and '$date2f' group by `bookingid` ORDER BY `checkout_date` ASC ;";
 //$qr="SELECT * FROM `visits` WHERE `checkout_date` between '$date1f' and '$date2f' group by `bookingid` ORDER BY `checkout_date` ASC ;";
$tr=mysqli_query($con,$qr);$amttotalfoot=0;
 while($rt=mysqli_fetch_array($tr))
	{
		    $t=$rt['bookingid'];
		 $se="select * from `cash` where `bookinid`='$t' and `cashtype`='advance';";
		$sel=mysqli_query($con,$se);
		$slip=mysqli_fetch_array($sel);
		
		$se2="select * from `cash` where `bookinid`='$t' and `cashtype`='refund';";
		$sel2=mysqli_query($con,$se2);
		$vc=mysqli_fetch_array($sel2);
		
		$semx="select max(reciptno) as mxrecipt from `cash` where `bookinid`='$t';";
		$selmx=mysqli_query($con,$semx);
		$max=mysqli_fetch_array($selmx);

		$semn="select min(reciptno) as mnrecipt from `cash` where `bookinid`='$t'  and `cashtype` ='donation';";
		$selmn=mysqli_query($con,$semn);
		$min=mysqli_fetch_array($selmn);
		
		
		
		$se3="select * from `visits` where `bookingid`='$t' ORDER BY 'rcpt' DESC LIMIT 1;";
		$sel3=mysqli_query($con,$se3);
		$donation=mysqli_fetch_array($sel3); 
		     
		
		
	if($rt['bed_no']==2 && $rt['room_no'] != 200 && $rt['room_no'] != 300 && $rt['room_no'] != 100  ){echo "&nbsp;";}
		 else{	
	?>
	<tr>
<td data-title="VC NO:"><?php echo $vc['vcno']; ?></td>
<td data-title="AS NO:"><?php echo $slip['slip']; ?></td>
<td data-title="SECURITY:"><?php echo $slip['donation'];$amttotalfoot=$amttotalfoot+$slip['donation']; ?></td>
<td data-title="OVR SECURITY:"><?php if($slip['donation']<$donation['donation']){ echo $ovrsec=$donation['donation']-$slip['donation']; $totovr=$totovr+$ovrsec; } else{ echo '0';  } ?></td>
<td data-title="DATE:"><?php $co=$donation['checkin_date'];echo date('d-m-Y',$co); ?></td>
<td data-title="DS NO:"><?php if($min['mnrecipt']==$max['mxrecipt']){echo $max['mxrecipt'];}else{echo $min['mnrecipt']."-". $max['mxrecipt'];} ?></td>
<!--
<td data-title="DETAIL:">
<?php /** 
if($donation['d100']>0){echo "100 x ".$donation['d100']."<br>"; }
if($donation['d200']>0){echo "200 x ".$donation['d200']."<br>"; }
if($donation['d500']>0){echo "500 x ".$donation['d500']."<br>"; }
if($donation['d1000']>0){echo "1000 x ".$donation['d1000']."<br>"; } 

**/ 
?></td>
-->
<td data-title="AMOUNT:"><?php echo $donation['donation'];  ?></td>
<td data-title="BAL REFUND:"><?php if($slip['donation']<$donation['donation']){ echo $balref=0; } else if($slip['donation']==$donation['donation']){ echo $balref=0; }  else{echo $balref=$slip['donation']-$donation['donation']; } ?></td></tr>
<?php
$a=$a+$donation['donation']; $bala=$bala+$balref; }


}	
echo "<tr><td colspan=2></td><td>".$amttotalfoot."</td><td>".$totovr."</td><td colspan=2></td><td>".$a."</td><td>".$bala."</td></tr>";	
}
	
echo "</tbody></table>";
?>
	             <center>
                              
                              </center>
                          </section>
                      </div><!-- /content-panel -->
					  <input type="button" onclick="printDiv('printableArea')" value="Print" />
<button onclick="exportToExcel('tblexportData')">Export To Excel</button>
                  </div> 
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