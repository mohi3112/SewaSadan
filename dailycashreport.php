  <?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];

?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Daily Cash Report</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<table width="100%" cellspacing="6px" style="padding-top:100px;background-color:#ccc;" align="center" width="100%" bgcolor="#ccc">
						  <form method="get" action="dailycashreport.php">
						  <td>Start Date: <input type="date" name="start"></td><td><input type="submit" name="chk" value="search"></td>
						  </tr>
						  </table> 
						  						
<section id="no-more-tables" width="100%"><div id="printableArea" style="width:100%;height:90%;">
	
                              <table id="tblexportData" class="table table-bordered table-striped table-condensed cf" >
                                  <thead class="cf">
								 
                                  <tr>
								  <th class="numeric">Date:</th>
								  <th class="numeric">Last Day Balance:</th>
								  <th class="numeric">Security:</th>
								  <th class="numeric">Rent:</th>
								  <th class="numeric">Refund:</th>
								  <th class="numeric">Donation:</th>
								  <th class="numeric">Total:</th>
								  <th class="numeric">Send To Bank:</th>
								  <th class="numeric">Balance Cash:</th>
								  <th class="numeric">Balance Bank:</th>
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
	
	$ft=date('-m-Y',$st);
	$d=date('j',$st);
	$m=date('m',$st);
	$yy=date('Y',$st);
	$ft=date('-m-Y',$st);
 $stt="01".$ft." 00:00:00";
	$mystart=strtotime($stt);
	
	$et=date('m',$st);
	if($et==1){$dd=31;}
	if($et==2){$dd=29;}
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

 for($y=1;$y<=$dd;$y++)
{	
$today=$y."-".$et."-".$yy."%";
$daystart=$y."-".$et."-".$yy." 08:00:00";
$ds=strtotime($daystart);
$refstart=$y."-".$et."-".$yy." 00:00:00";
$df=strtotime($refstart);
//$dayend=$y."-".$et."-".$yy." 23:59:59";
//$de=strtotime($dayend);
//$newdat="%-".$m."-".$yy."%";
$de=$ds+86400;
$fe=$df+86400;
$qr="SELECT sum(donation)as security FROM `cash` WHERE `cashtype`='advance' and `handovertime` between '$ds' and '$de';";
$tr=mysqli_query($con,$qr);
$sec=mysqli_fetch_array($tr);
$qr2="SELECT sum(donation)as donation FROM `cash` WHERE `cashtype`='donation' and `handovertime` between '$df' and '$fe';";
$tr2=mysqli_query($con,$qr2);
$don=mysqli_fetch_array($tr2);
$qr7="SELECT sum(donation)as donation FROM `cash` WHERE `cashtype`='Extra Donation' and `handovertime` between '$df' and '$fe';";
$tr7=mysqli_query($con,$qr7);
$don7=mysqli_fetch_array($tr7);
$qr3="SELECT sum(refund)as refund FROM `cash` WHERE `cashtype`='refund' and `handovertime` between '$df' and '$fe';";
$tr3=mysqli_query($con,$qr3);
$ref=mysqli_fetch_array($tr3);

$qr4="SELECT sum(handover)as bank FROM `cash` WHERE `handoverto`='bank' and `handovertime` between '$df' and '$fe';";
$tr4=mysqli_query($con,$qr4);
$bank=mysqli_fetch_array($tr4);
$qr6="SELECT sum(handover)as banktot FROM `cash` WHERE `handoverto`='bank' and `handovertime` < '$de';";
$tr6=mysqli_query($con,$qr6);
$banktot=mysqli_fetch_array($tr6);

$qr5="SELECT * FROM `cash` WHERE `cashtype`='lastday' and `handovertime` between '$ds' and '$de';";
$tr5=mysqli_query($con,$qr5);
$lastday=mysqli_fetch_array($tr5);
	?>
	<tr>
<td data-title="Date:"><?php echo $y."/".$m; ?></td>
<td data-title="Last Day Balance:"><?php echo $lastday['handover']; ?></td>
<td data-title="Security:"><?php echo $sec['security']; ?></td>
<td data-title="Rent:"><?php echo $don['donation']; ?></td>
<td data-title="Refund:"><?php echo $ref['refund'];  ?></td>
<td data-title="Donation:"><?php echo $don7['donation']; ?></td>
<td data-title="Total:"><?php echo $total=$lastday['handover']+$sec['security']+$don7['donation']+$don['donation']-$ref['refund'];  ?></td>
<td data-title="send to bank:"><?php echo $bank['bank']; ?></td>
<td data-title="Cash In Hand:"><?php echo $xxxxv=$total-$bank['bank']; ?></td>
<td data-title="Cash In Bank:"><?php echo $banktot['banktot'];  ?></td>
</tr>
	<?php 
}
echo "</tbody></table>";}?>
	             <center>
                              
                              </center>
                          </section>
                      </div><!-- /content-panel -->
					  <input type="button" onclick="printDiv('printableArea')" value="Print" /><button onclick="exportToExcel('tblexportData')">Export To Excel</button>
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