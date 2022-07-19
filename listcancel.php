<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>All Cancel Slips</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<div id="printableArea" style="width:100%;height:90%;">
						  
						  
						  
						  
	<?php					 

  $qr="SELECT * from `cash` where `name` like '%cancel%' and `slip`<>'0';";

	?>
	
	<section id="no-more-tables">
                              <table  id="tblexportData" class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
								  
                                  <tr>
								  <th class="numeric">Date:</th>
								     <th class="numeric">Slip No:</th>
								  <th class="numeric">Attendant:</th>
								  <th class="numeric">Amount:</th>
                                  <th class="numeric">Room No:</th>
								  <th class="numeric">Bed No:</th>
								  <th class="numeric">Cash Type:</th>
								  <th class="numeric">Entry By:</th>

								
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
	<td data-title="Slip No:"><?php echo $rt['slip']; ?></td>
	<td data-title="Attendant:"><?php echo $rt['name']; ?></td>
		<td data-title="Amount:"><?php echo $rt['donation']; ?></td>
	<td data-title="Room No:"><?php echo $rt['room']; ?></td>
	<td data-title="Bed No:"><?php echo $rt['bed']; ?></td>
	<td data-title="Cash Type:"><?php echo $rt['cashtype']; ?></td>
	<td data-title="Collected By:"><?php echo $rt['collectby']; ?></td>
	
	</tr>
	
	
	
<?php	
}
echo "</tbody></table>";
	?>

						  
						  
						  
						  
						  
						  
                          
                              <center>
                              
                              </center>
                          </section>
                      </div><!-- /content-panel --><input type="button" onclick="printDiv('printableArea')" value="Print" /><button onclick="exportToExcel('tblexportData')">Export Table Data To Excel File</button>
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