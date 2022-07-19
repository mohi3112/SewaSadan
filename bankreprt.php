<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Bank Report</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<table width="100%" cellspacing="6px" style="padding-top:100px;background-color:#ccc;" align="center" width="100%" bgcolor="#ccc">
						  <form method="get" action="bankreprt.php">
						  <td>Start Date: <input type="date" name="start"></td><td>End Date: <input type="date" name="end"></td><td><input type="submit" name="chk" value="search"></td>
						  </tr>
						  </table> 
						  <br><br>
						  
						  
						  
						  
						  
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
 $qr="SELECT * FROM `cash`  WHERE `handoverto` = 'bank' and `handovertime` BETWEEN '$st' AND '$en' ORDER BY `handovertime` ASC;";
  $start;

	?><section id="no-more-tables"><div id="printableArea" style="width:100%;height:90%;">
	
                              <table  id="tblexportData" class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
								  
                                  <tr >
								  <th class="numeric" width="25%">Date:</th>
								  <th class="numeric" width="25%">Amount:</th>
									  <th class="numeric" width="25%">Send By:</th>
                                      <th class="numeric" width="25%">Total:</th>
									  
                                      </tr>
                                  </thead>
                                  <tbody>
						  
						  <?php 
	$rr=mysqli_query($con,$qr); 
		while($rt=mysqli_fetch_array($rr))
		{$x=$x+$rt['handover'];
			?>
	
<tr>

	<td data-title="Date:"><?php echo date('d/m/Y G:i:s',$rt['handovertime']); ?></td>
	<td data-title="Amount"><?php echo $rt['handover']; ?></td>
	<td data-title="Send By:"><?php echo $rt['collectby']; ?></td>
	<td data-title="Total:"><?php echo $x; ?></td>
	
</tr>
	
	
	
<?php	
}
echo "</tbody></table>";
}
else{
$st=time();
$en=$st-864000;
$qr="SELECT * FROM `cash`  WHERE  `handoverto` = 'bank' and `handovertime` BETWEEN '$en' AND '$st' ORDER BY `handovertime` ASC;";

	?><section id="no-more-tables"><div id="printableArea" style="width:100%;height:90%;">
	<section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
								  
                                  <tr style="font-size:11px;position:fixed;width:100%;background-color:#ADFF2F;color:#000;">
								  <th width="25%">Date:</th>
								  <th width="25%">Amount:</th>
									  <th width="25%">Send By:</th>
                                      <th width="25%">Total:</th>
									  
                                      </tr>
                                  </thead>
                                  <tbody>
						  
						  <?php 
	$rr=mysqli_query($con,$qr); 
		while($rt=mysqli_fetch_array($rr))
		{$x=$x+$rt['handover'];
			?>
	
<tr>

	<td data-title="Date:"><?php echo date('d/m/Y G:i:s',$rt['handovertime']); ?></td>
	<td data-title="Amount"><?php echo $rt['handover']; ?></td>
	<td data-title="Send By:"><?php echo $rt['collectby']; ?></td>
	<td data-title="Total:"><?php echo $x; ?></td>
	
</tr>
	
	
	
<?php	
}

echo "</tbody></table>";
	?>
						
						
		<?php				  
}			  
			?>			  
						  
						  
						  
						  
						  
						  
						  
                          
                              <center>
                              
                              </center>
                          </section>
                      </div><!-- /content-panel -->
					  <input type="button" onclick="printDiv('printableArea')" value="Print" />
<button onclick="exportToExcel('tblexportData')">Export Table Data To Excel File</button>

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