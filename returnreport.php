<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>





<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Bedding Return Report</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
						<table width="100%" cellspacing="6px" style="padding-top:100px;background-color:#ccc;" align="center" width="100%" bgcolor="#ccc">
						  <form method="get" action="returnreport.php">
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
	$en=strtotime($end);
 $qr="SELECT * FROM  `stock_asset_allocation`   WHERE `return_date` BETWEEN '$st' AND '$en' ;";


	?><section id="no-more-tables"><div id="printableArea" style="width:100%;height:90%;">
	
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
								  
                                  <tr >
								  <th class="numeric">Date:</th>
								  <th class="numeric">Name:</th>
								  <th class="numeric">Slip No:</th>
									  <th class="numeric">Room:</th>
                                      <th class="numeric">Bed:</th>
									   <th class="numeric">Time:</th><th class="numeric">Asset/Gadda No:</th>
									    <th class="numeric">Returned To:</th>
                                      </tr>
                                  </thead>
                                  <tbody>
						  
						  <?php 
	$rr=mysqli_query($con,$qr); 
		while($rt=mysqli_fetch_array($rr))
		{$x=$x+$rt['handover'];
			?>
	
<tr>

	<td data-title="Date:"><?php $id=$rt['return_date']; echo date('d-m-Y', $id)?></td>
	<td data-title="Name:"><?php echo $rt['attended_name']; ?></td>
	<td data-title="Slip No:"><?php echo $rt['slip']; ?></td>	
	<td data-title="Room:"><?php echo $rt['room']; ?></td>
	<td data-title="Bed:"><?php echo $rt['bed']; ?></td>
	<td data-title="Time:"><?php $idt=$rt['return_date']; echo date('h:i a', $idt)?></td>
	<td data-title="Return To:"><?php echo $rt['asset_id'];?></td>
	<td data-title="Return To:"><?php echo $rt['return_by']; ?></td>
	
</tr>
	
	
	
<?php	
}
echo "</tbody></table>";
}			?>			  
						  
						  
						  
						  
						
						
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