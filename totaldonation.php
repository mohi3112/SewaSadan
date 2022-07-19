<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Total Bills</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<table width="100%" cellspacing="6px" style="padding-top:100px;background-color:#ccc;" align="center" width="100%" bgcolor="#ccc">
						  <form method="get" action="totaldonation.php">
						  <td>Start Bill No: <input type="text" name="ss"></td><td>End Bill No: <input type="text" name="ee" ></td><td><input type="submit" name="chk" value="search"></td>
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
		//$ss=$fnyear."/".$start;
	//	$ee=$fnyear."/".$end;
$stq="SELECT * from `cash` where  `reciptno` = '$ss';";
 $strs=mysqli_query($con,$stq);
 $strset=mysqli_fetch_array($strs);	
$stpq="SELECT * from `cash` where  `reciptno` = '$ee';";
 $stprs=mysqli_query($con,$stpq);
 $stprset=mysqli_fetch_array($stprs);	
	
$starting=$strset['sr'];	
$ending=$stprset['sr'];	
				
		
	
 $tyr="SELECT sum(donation) as total from `cash` where `cashtype`='donation' and `sr` between '$starting' and '$ending';";
 $rtr=mysqli_query($con,$tyr);
 $totaladvance=mysqli_fetch_array($rtr);
 echo "<h1 align='center'>Total Amout You Recived By Room Rent ".$totaladvance['total']." </h1>";
 $qr="SELECT * from `cash` where `cashtype`='donation' and `sr` between '$starting' and '$ending';";

	?>
	
	<section id="no-more-tables">
                              <table id="tblexportData" class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
								  
                                  <tr>
								  <th class="numeric">Date:</th>
								    <th class="numeric">Recipt No:</th>
								  <th class="numeric">Attendant:</th>
								   <th class="numeric">Amount:</th>
                                  <th class="numeric">Room No:</th>
								  <th class="numeric">Bed No:</th>
								  <th class="numeric">Cash Type:</th>
								  <th class="numeric">Recived By:</th>
								 
								  
								  <th class="numeric">Total:</th>
								 
                                      </tr>
                                  </thead>
                                  <tbody>
						  
						  <?php 
	$rr=mysqli_query($con,$qr); 
		while($rt=mysqli_fetch_array($rr))
		{ 
	
			?>
	
<tr style="<?php if($rt['cashtype']=="refund"){echo "background-color:'#f00';";} ?>">
<td data-title="Date"><?php echo date('d/m/Y',$rt['handovertime']); ?></td>
	<td data-title="Recipt No:"><?php echo $rt['reciptno']; ?></td>
	<td data-title="Attendant:"><?php echo $rt['name']; ?></td>
		<td data-title="Amount:"><?php echo $rt['donation']; ?></td>
	<td data-title="Room No:"><?php echo $rt['room']; ?></td>
	<td data-title="Bed No:"><?php echo $rt['bed']; ?></td>
	<td data-title="Cash Type:"><?php if($rt['cashtype']=="donation"){echo "Rent";}?></td>
	<td data-title="Collected By:"><?php echo $rt['collectby']; ?></td>


	<td data-title="Total:"><?php echo $x=$x+$rt['donation']; ?></td>
	
	</tr>
	
	
	
<?php	
}

echo "</tbody></table>";

} 		  
	?>
<center>Select Your Search.</center>	
						  
						  
						  
						  
						  
						  
                          <input type="button" onclick="printDiv('printableArea')" value="Print" />   <button onclick="exportToExcel('tblexportData')">Export To Excel</button>
                              <center>
                              
                              </center>
                          </section>
                      </div><!-- /content-panel -->
						      
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