  <?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Refill/Add Report</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<form method="get" action="stockinreport.php" enctype="multipart/form-data">
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
                                 <div class="col-md-4" style="font-weight:bold;padding:10px 5px;text-align: center;vertical-align: middle;">
                                    <div class="form-group">
                                        <p>Select Category:</p>
                                    	<select name=shid class="form-control show-tick" data-live-search="true"> 
						  <option value="none"  disabled selected>Select Category </option>
                     <?php   $qi="SELECT * FROM `stock_headers` where `parent_shid`<>'0' and `type`='Stock';"; 
					$rr=mysqli_query($con,$qi);
					  while($rs=mysqli_fetch_array($rr))
					  { ?>
					  <option value="<?php echo $rs['shid'];?>"><?php echo $rs['name'];?></option>
					  
					  <?php
					  }?>
                               </select>
                                    </div>
                                </div>
                                 <div class="col-md-2" style="font-weight:bold;padding:10px 5px;text-align: center;vertical-align: middle;">
                                    <div class="form-group"><p>&nbsp;</p>
                                       <input type="submit" name="chk" value="search">
                                    </div>
                                </div>
                            </div>
						</form>
						  <br><br>
						  <div id="printableArea" style="width:100%;height:90%;">
						    
						<section id="no-more-tables">
                              <table id="tblexportData" width="100%" class="table table-bordered table-striped table-condensed cf">
                                  <tr>
								  <th>Sr</th> 
								  <th>Item Name</th> 
								  <th>Type</th> 
								  <th >Quantity:</th>
								  <th >Rate:</th>
								   
								   <th>Date</th> 
								   <th>Entry By</th> <th>Amount:</th><th>Action:</th>
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
//	print_r($_GET);
$qr="SELECT * FROM `stock_consumable` where `action`!='consume' and `shid`='$shid' and `added_on`  BETWEEN '$st' AND '$en' and `quantity`!='0';";
	$rr=mysqli_query($con,$qr);  $total=0;$sr=1;
		while($rt=mysqli_fetch_array($rr))
		{ 
	//	print_r($rt);
	?>
	<tr>
	<td><?php echo $sr; ?></td>
	<td><?php echo $rt['item_name']; ?></td>
	<td><?php echo $rt['action']; ?></td>
	<td><?php echo $rt['quantity']." ".$rt['measures']; ?></td>
	<td><?php echo $rt['rate']; ?></td>
	
	<td><?php $ddt=$rt['added_on'];echo $add_date = date('d-m-Y',$ddt); ?></td>
	<td><?php echo $rt['added_by']; ?></td>
	<td><?php echo $amount=$rt['rate']*$rt['addition']; $total=$total+$amount;?></td>
		<td><a href="editstockin.php?stid=<?php echo $rt['stid'];?>">EDIT</a></td>
	</tr>
	
	
	<?php
	$sr++;
		}
		
		echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Total:</td><td><b>".$total."</b></td></tr>";
		
		echo "</tbody></table>";

}
else{
    $total=0;
$st=time();
$en=$st-172800;

	?>
	<b><i><center>Last 10 Days Consumption For </center></i></b><br>
	
						  <?php 
	$qr="SELECT * FROM `stock_consumable` where `action`!='consume' and  `added_on`  BETWEEN  '$en' AND '$st'  and `quantity`!='0' ;";
	$rr=mysqli_query($con,$qr);  $total=0;$sr=1;
		while($rt=mysqli_fetch_array($rr))
		{ 
		
	?>
	<tr>
	<td><?php echo $sr; ?></td>
	<td><?php echo $rt['item_name']; ?></td>
	<td><?php echo $rt['action']; ?></td>
	<td><?php echo $rt['quantity']." ".$rt['measures'];; ?></td>
	<td><?php echo $rt['rate']; ?></td>
	
	<td><?php $ddt=$rt['added_on'];echo $add_date = date('d-m-Y',$ddt); ?></td>
	<td><?php echo $rt['added_by']; ?></td>
	<td><?php echo $amount=$rt['rate']*$rt['addition']; $total=$total+$amount;?></td>
	</tr>
	
	
	<?php
	$sr++;
		}
		
		echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td>Total:</td><td><b>".$total."</b></td></tr>";
		
		echo "</tbody></table>";
}			  
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