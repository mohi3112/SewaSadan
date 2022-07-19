<?php 
include('lcheck.php');
if(isset($_GET['stid']))
{
    $findstid=$_GET['stid'];
    $st=$_GET['strt'];
    $en=$_GET['end'];
   $mkquery="SELECT * FROM `stock_consumable` where `stid`='$findstid' and `action`='consume' and `issued_on`  BETWEEN '$st' AND '$en';";
    $mqury=mysqli_query($con,$mkquery);
    $name=mysqli_fetch_array($mqury);
    $count=1;
}
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Ledger Of <?php echo $name['item_name']; ?></h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
					
					  <div id="printableArea" style="width:100%;height:90%;">
                      <section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
									  <th>Sr:</th>
									  <th>Item Name:</th>
									  <th>Category:</th>
									  <th>Quality:</th>
									  <th>Color:</th>
									  <th>Quantity:</th>
									  <th>Rate:</th>
									  <th>Issued on:</th>
									  <th>Issued To:</th> <th>Narration:</th> <th>Issued By:</th>
                                  </tr>
                                  </thead>
                                  <tbody>
					  <?php  $findstid=$_GET['stid'];
   $mkquery2="SELECT * FROM `stock_consumable` where `stid`='$findstid' and `action`='consume' and `issued_on`  BETWEEN '$st' AND '$en';";
    $mqury2=mysqli_query($con,$mkquery2);
						
							while ($rt=mysqli_fetch_array($mqury2))
							{
							
							 ?>
							
							<tr>
                                      <td data-title="Sr:"><?php echo $count; ?></td>
                                      <td data-title="Iten Name:"><?php
									  echo $rt['item_name']; ?></td>
									  <td data-title="Category:"><?php echo $rt['header']; ?></td>
									  <td data-title="Quality:"><?php echo $rt['quality']; ?></td>
									  <td data-title="Color:"><?php echo $rt['color']; ?></td>
									  <td data-title="Quantity:"><?php echo $rt['quantity']." ".$rt['measures'];; ?></td>
									  <td data-title="Rate:"><?php echo $rt['rate']; ?></td>
									  <td data-title="Issued On:"><?php $dt=$rt['issued_on']; echo date('d-m-Y h:i a' , $dt);?></td>
                                      
                                     <td data-title="Issued To:"><?php echo $rt['issue_to']; ?></td> 
                                     <td data-title="narration:"><?php echo $rt['pic']; ?></td>
                                      <td data-title="Issued To:"><?php echo $rt['issued_by']; ?></td>
                                      </tr>
                                  
		<?php $count++;
}


?>
                                 
                            
					  
					   </tbody>
</table>
                  </div>
						<?php  // Code Ends Here/////  ?>
						<input type="button" onclick="printDiv('printableArea')" value="Print" /><button onclick="exportToExcel('tblexportData')">Export To Excel</button> 
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