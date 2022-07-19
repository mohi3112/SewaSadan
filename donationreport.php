<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Donation Report</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<br><table width="100%" cellspacing="6px" style="padding-top:100px;background-color:#ccc;" align="center" width="100%" bgcolor="#ccc">
						  <form method="get" action="donationreport.php">
						  <td>Start Date: <input type="date" name="start"></td><td>End Date: <input type="date" name="end"></td><td><input type="submit" name="chk" value="Count Donations"></td>
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
	$st=strtotime($start);
	$en=strtotime($end);
 $qr="SELECT * FROM `cash` WHERE `cashtype`='Extra Donation' and  `handovertime` BETWEEN '$st' AND '$en' ;";
	?>
	<section id="no-more-tables">
                              <table  id="tblexportData" class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
                                      <th class="numeric">Date:</th>
                                       <th class="numeric">Recipt:</th>
                                      <th class="numeric">Guest Name:</th>
									  <th class="numeric">Donation:</th>
                                      <th class="numeric">Purpose:</th>
									  <th class="numeric">Room/Bed:</th>
                                  
                                      </tr>
                                  </thead>
                                  <tbody>
						  
						  <?php 
	$rr=mysqli_query($con,$qr); $count=1;
	while($rt=mysqli_fetch_array($rr))
	{
			?>
	
	
                                  
                        <tr>
                            <td data-title="Date:"><?php  $sss=$rt['handovertime'];echo date('d-m-Y',$sss); ?></td>
                        <td data-title="Guest Name:"><?php echo $rt['reciptno']; ?></td>
						 <td data-title="Guest Name:"><?php echo $rt['name']; ?></td>			  
                        <td data-title="Donation:"><?php echo $rt['donation']; ?></td>
                        <td data-title="Purpose:"><?php echo $rt['dslip']; ?></td>
				<td class="numeric" data-title="Room/Bed:"><?php echo $rt['room']."/".$rt['bed']; ?></td>
                                      
									  
                                      
                                  </tr><?php } ?>
                                 </tbody>
                              </table>
	
	
	
<?php	
}
?>
 <input type="button" onclick="printDiv('printableArea')" value="Print" />
<button onclick="exportToExcel('tblexportData')">Export Table Data To Excel File</button>
                     
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