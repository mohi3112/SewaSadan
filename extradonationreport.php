<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Extra Donation Report</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<table width="100%" cellspacing="6px" style="padding-top:100px;background-color:#ccc;" align="center" width="100%" bgcolor="#ccc">
						  <form method="get" action="extradonationreport.php">
						  <td>Start Date: <input type="date" name="start"></td><td>End Date: <input type="date" name="end"></td><td><input type="submit" name="chk" value="search"></td>
						  </tr>
						  </table> 
						  <br><br>
						  <div id="printableArea" style="width:100%;height:90%;">
						      					  
	<?php					 
if(isset($_GET['chk']))
{
	foreach($_GET as $k=>$v)
		{
			$$k=$v;
		}
		$ft=date('G:i:s',time());
		$e=$end." 23:59:59";
		$sst=$start." 00:00:00";
	$st=strtotime($sst);
	$en=strtotime($e);
	
 $tyr="SELECT sum(donation) as total from `cash` where `cashtype`='Extra Donation' and `handovertime` between '$st' and '$en';";
 $rtr=mysqli_query($con,$tyr);
 $totaladvance=mysqli_fetch_array($rtr);
 echo "<h1 align='center'>Total Donation You Recived ".$totaladvance['total']." </h1>";
  $qr="SELECT * from `cash` where `cashtype`='Extra Donation' and `handovertime` between '$st' and '$en' order by `sr`;";

	?>
	
	<section id="no-more-tables">
                              <table id="tblexportData" class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
								  
                                  <tr>
								  <th class="numeric">Date:</th>
								  <th class="numeric">Name:</th>
                                   <th class="numeric">Mobile:</th>
								  <th class="numeric">Cash Type:</th>
								  <th class="numeric">Recived By:</th>
								  <th class="numeric">Amount:</th>
								  
								  <th class="numeric">Total:</th>
								   <th class="numeric">Recipt No:</th>
                                      </tr>
                                  </thead>
                                  <tbody>
						  
						  <?php 
	$rr=mysqli_query($con,$qr); 
		while($rt=mysqli_fetch_array($rr))
		{ 
		    $bbid=$rt['bookinid'];
	$fnm="select * from `visits` where `bookingid`='$bbid';";
	$xxx=mysqli_query($con,$fnm);
	$xxxx=mysqli_fetch_array($xxx);		
			
			
			?>
	
<tr style="<?php if($rt['cashtype']=="refund"){echo "background-color:'#f00';";} ?>">
<td data-title="Date"><?php echo date('d/m/Y',$rt['handovertime']); ?></td>
	<td data-title="Attendant:"><?php echo $rt['name']; ?></td>
	<td data-title="Attendant:"><?php echo $xxxx['mobile']; ?></td>
	<td data-title="Cash Type:"><?php echo $rt['cashtype']; ?></td>
	<td data-title="Collected By:"><?php echo $rt['collectby']; ?></td>
	<td data-title="Amount:"><?php echo $rt['donation'];$x=$x+$rt['donation']; ?></td>

	<td data-title="Total:"><?php echo $x; ?></td>
		<td data-title="Recipt No:"><?php echo $rt['reciptno']; ?></td>
	</tr>
	
	
	
<?php	
}

echo "</tbody></table>";

} 		  
	?>
<center>Select Your Search.</center>	
						  
						  
						  
						  
						  
						  
                          
                              <center>
                              
                              </center>
                          </section>
                      </div><!-- /content-panel --><input type="button" onclick="printDiv('printableArea')" value="Print" /><button onclick="exportToExcel('tblexportData')">Export To Excel</button>
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