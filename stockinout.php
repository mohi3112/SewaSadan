  <?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Stock In-Out Summary</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
						
						
			
					
						  <br><br>
						  <div id="printableArea" style="width:100%;height:90%;">
						      <section id="no-more-tables">
						<?php if(isset($_GET['st']))
						{
						    $myst=$_GET['st'];
						    $sel26="SELECT * FROM `stock_consumable` where `stid` = '$myst';";
                    		$rr26=mysqli_query($con,$sel26);
                    		$rs26=mysqli_fetch_array($rr26);
						?>
						<center><h2> Stock In-Out Summary For ( <?php echo $rs26['item_name']; ?>) </h2></center>
						 <table id="tblexportData" width="100%" class="table table-bordered table-striped table-condensed cf">
                                  <tr>
								  <th>Date</th> 
								  <th >Particulars:</th>
								  <th >Recipt:</th>
								   <th >Issued:</th>
								   <th >Balance:</th>
								  
								  </tr>
                                  
                                  <tbody>
						  <tr>
						
						   <?php					 

$qr5="SELECT * FROM `stock_consumable` where `stid` = '$myst';";

	$rr5=mysqli_query($con,$qr5);  $totalin=0; $totalout=0;$ssr=1;$balance=0;
		while($rt5=mysqli_fetch_array($rr5))
		{ 
		$addon=$rt5['added_on'];
	$sel25="SELECT * FROM `stock_billing` where `added_on`='$addon';";
		$rr25=mysqli_query($con,$sel25);
		$rs25=mysqli_fetch_array($rr25);
	?>
	<tr>


	<?php 
	if($rt5['action']=='add' || $rt5['action']=='refill') {
	    ?>
	<td><?php echo date('d/m/Y', $addon); ?></td>
	<td>
	     <?php   echo "By Bill No: ".$rs25['billno']; $balance=$balance+$rt5['quantity'];
	$totalin=$totalin+$rt5['quantity'];
	echo "</td>";
	}
	else {
	    ?>
	    	<td><?php
	    	$issue=$rt5['issued_on'];
	    	echo date('d/m/Y', $issue);  ?></td>
	<td>
	<?php
 echo $rt5['pic']; $balance=$balance-$rt5['quantity']; $totalout=$totalout+$rt5['quantity'];
 echo "</td>";} 
	?>

	</td>
	<td>
	<?php 
	if($rt5['action']=='add' || $rt5['action']=='refill') { echo $rt5['quantity']." ".$rt5['measures']; }
	else { echo "---";} 
	?>
	</td>
	<td><?php 
	if($rt5['action']=='add' || $rt5['action']=='refill') { echo "---";}
	else { echo $rt5['quantity']." ".$rt5['measures']; } 
	?></td>
    <td><?php echo $balance." ".$rt5['measures']; ?></td>
	</tr>
	
	
	<?php
	
		}
		
	
		?>
	<tr><td colspan=2></td><td><?php echo $totalin." ".$rt9['measures']; ?></td><td><?php echo $totalout." ".$rt9['measures']; ?></td><td></td></tr>
		
		</tbody></table>
						
						
						
						
						<?php
						}
						else
						{
						?>    
						
                              <table id="tblexportData" width="100%" class="table table-bordered table-striped table-condensed cf">
                                  <tr>
								  <th>Sr</th> 
								  <th >Item Name:</th>
								  <th >Quantity:</th>
								   <th >Report:</th>
								  
								  </tr>
                                  
                                  <tbody>
						  <tr>
  
						     <?php					 

$qr="SELECT * FROM `stock_consumable` GROUP BY `stid`;";
	$rr=mysqli_query($con,$qr);  $total=0;$ssr=1;
		while($rt=mysqli_fetch_array($rr))
		{ 
		$findstid=$rt['stid'];
	$sel2="SELECT * FROM `stock_consumable` where `stid`='$findstid' ORDER BY `sr` DESC LIMIT 1;";
		$rr2=mysqli_query($con,$sel2);
		$rs2=mysqli_fetch_array($rr2);
	?>
	<tr>
	<td><?php echo $ssr; ?></td>
	<td><?php echo $rs2['item_name']; ?></td>
	<td><?php echo $rs2['remain']; ?>&nbsp;<?php echo $rs2['measures']; ?></td>
	<td><a href="stockinout.php?st=<?php echo $rs2['stid']; ?>">Ledger</a></td>

	</tr>
	
	
	<?php
	$ssr++;
		}
		
	
		echo "</tbody></table>";
		
				}  ///else closed
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