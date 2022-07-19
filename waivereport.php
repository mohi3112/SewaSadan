  <?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Waive-Off Report</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<form method="get" action="waivereport.php" enctype="multipart/form-data">
						<div class="row clearfix" style="background-color:#ccc;">
                                
                 <div class="col-md-3" style="font-weight:bold;padding:10px 5px;text-align: center;vertical-align: middle;">
                                    <div class="form-group">
                                     <p>Start Date:</p>  <input type="date" name="start">
                                    </div>
                                </div>
                                  <div class="col-md-3" style="font-weight:bold;padding:10px 5px;text-align: center;vertical-align: middle;">
                                    <div class="form-group">
                                       <p>End Date: </p> <input type="date" name="end">
                                    </div>
                                </div>
                        <div class="col-md-2"></div>
                                 <div class="col-md-2" style="font-weight:bold;padding:10px 5px;text-align: center;vertical-align: middle;">
                                    <div class="form-group"><p>&nbsp;</p>
                                       <input type="submit" name="chk" value="search">
                                    </div>
                                </div>
                                 <div class="col-md-2"></div>
                            </div>
						</form>
						  <br><br>
						  <div id="printableArea" style="width:100%;height:90%;">
						    
						<section id="no-more-tables">
                              <table id="tblexportData" width="100%" class="table table-bordered table-striped table-condensed cf">
                                  <tr>
								  <th>Sr</th> 
								  <th>Guest Name</th> 
								  <th>Booking-ID</th> 
								  <th >Slip:</th>
								  <th >Voucher:</th>
								  <th >Room:</th>
								  <th >Bed:</th>
								  <th >Amount:</th>
								  <th >Reason:</th>
								 
								   <th>Date</th> 
								   <th>Entry By</th>
								  </tr>
                                  
                                  <tbody>
						  <tr>
  
						     <?php					 
if(isset($_GET['chk']))
{
	foreach($_GET as $k=>$v)
		{
			$$k=$v;
		}
		$ft=date('G:i:s',time());
		$e=$end." ".$ft;
	$st=strtotime($start);
	$en=strtotime($e);
}
else{
$total=0;
$st=time();
$en=$st-172800;

	}
		
//	print_r($_GET);
$qr="SELECT * FROM `waiveoff` where  `bindate`  BETWEEN '$st' AND '$en';";
	$rr=mysqli_query($con,$qr);  $total=0;$sr=1;
		while($rt=mysqli_fetch_array($rr))
		{ 
	//	print_r($rt);
	?>
	<tr>
	<td><?php echo $sr; ?></td>
	<td><?php echo $rt['guest']; ?></td>
	<td><?php echo $rt['bookingid']; ?></td>
	<td><?php echo $rt['slip']; ?></td>
	<td><?php echo $rt['voucher']; ?></td>
	<td><?php echo $rt['room']; ?></td>
	<td><?php echo $rt['bed']; ?></td>
	<td><?php echo $rt['amount']; $total=$total+$amount; ?></td>
	<td><?php echo $rt['reason']; ?></td>
	
	<td><?php $ddt=$rt['bindate'];echo $waive_date = date('d-m-Y h:i a',$ddt); ?></td>
	<td><?php echo $rt['checkoutby']; ?></td>
	
	</tr>
	
	
	<?php
	$sr++;
		}
		
		echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td>Total:</td><td><b>".$total."</b></td></tr>";
		
		echo "</tbody></table>";
	?>			  
					
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