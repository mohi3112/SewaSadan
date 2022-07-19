  <?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Cash Report</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<table width="100%" cellspacing="6px" style="padding-top:100px;background-color:#ccc;" align="center" width="100%" bgcolor="#ccc">
						  <form method="get" action="cashreport.php">
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
		$e=$end." ".$ft;
	$st=strtotime($start);
	$en=strtotime($e);
 $qr="SELECT * FROM `cash`  WHERE `handovertime` BETWEEN '$st' AND '$en' ;";

	?>
	<style> table tr td { font-size:12px;}</style>
	<section id="no-more-tables">
                              <table id="tblexportData" class="table table-bordered table-striped table-condensed cf">
                                    <tr>
								  <th width="12%">Date:</th> 
								  <th >Slip No:</th> <th >VC No:</th>
								  <th width="23%">Attendant
                                  <th>Room:</th>
								  <th>Bed-No:</th>
								  <th>Cash Type:</th>
								  <th>Collected-By:</th>
								  <th>Amount:</th>
								   
								  <th>Total:</th>
								  
                                      </tr>
                                  
                                  <tbody>
						  <tr>

			 <?php 
	$rr=mysqli_query($con,$qr);
		while($rt=mysqli_fetch_array($rr))
		{ 
	
			?>
	
<tr style="<?php if($rt['cashtype']=="Refund"){echo "background-color:'#f00';";} ?>">
<td><?php echo date('d/m/Y',$rt['handovertime']); ?></td>

	<td ><?php echo $rt['vcno'];?></td>
	<td><?php echo $rt['reciptno']; ?></td>
	<td><?php echo $rt['name']; ?></td>
	<td data-title="Room No:"><?php echo $rt['room']; ?></td>
	<td data-title="Bed No:"><?php echo $rt['bed']; ?></td>
	<td data-title="Cash Type:"><?php echo $rt['cashtype']; ?></td>
	<td data-title="Collected By:"><?php echo $rt['collectby']; ?></td>
	<td data-title="Amount:">
	    <?php if($rt['cashtype']=="donation" || $rt['cashtype']=="advance"){echo $rt['donation'];$xxtot=$xxtot+$rt['donation'];}
	    elseif($rt['cashtype']=="Refund"){ $xxtot=$xxtot-$rt['refund']; echo $rt['refund'];}
	   ?></td>

	<td data-title="Total:"><?php echo $xxtot; ?></td>
	</tr>
	
	
	
<?php	
}
echo "</tbody></table>";
}
else{
   
$st=time();
$en=$st-172800;
$qr="SELECT * FROM `cash`  WHERE `handovertime` BETWEEN '$en' AND '$st' ;";
	?>
	<b><i><center>Last 10 Days Visits</center></i></b><br>
	<section id="no-more-tables">
                               <table  class="table table-bordered table-striped table-condensed cf">
   <thead class="cf" >
								  
                                  <tr>
								  <th width="12%">Date:</th> 
								  <th >Slip No:</th> <th >VC No:</th> <th >Recipt No:</th>
								  <th width="23%">Attendant</th>                           <th>Room:</th>
								  <th>Bed-No:</th>
								  <th>Cash Type:</th>
								  
								  <th>Amount:</th>
								   <th>Handover-To:</th>
								  <th>Total:</th>
								  
                                      </tr>
                                  </thead>
                                  <tbody>
						  
						  <?php 
	$rr=mysqli_query($con,$qr); 
		while($rt=mysqli_fetch_array($rr))
		{
			?>
<tr>
<td data-title="Date"><?php echo date('d/m/Y h:i a',$rt['handovertime']); ?></td>
	<td data-title="Attendant:"><?php echo $rt['slip']; ?></td>
	<td data-title="Attendant:"><?php echo $rt['vcno'];?></td>
	<td data-title="Attendant:"><?php echo $rt['reciptno']; ?></td>
	<td data-title="Attendant:"><?php echo $rt['name']; ?></td>
	<td data-title="Room No:"><?php echo $rt['room']; ?></td>
	<td data-title="Bed No:"><?php echo $rt['bed']; ?></td>
	<td data-title="Cash Type:"><?php echo $rt['cashtype']; ?></td>
	<td data-title="Amount:">
	<?php 
	/* if($rt['cashtype']=="donation"){echo $rt['donation']; $xxtot=$xxtot+$rt['donation']; }
	if($rt['cashtype']=="Extra Donation"){echo $rt['donation']; $xxtot=$xxtot+$rt['donation']; }
	if($rt['cashtype']=="advance" ){echo $rt['donation']; $xxtot=$xxtot+$rt['donation']; }
	elseif( $rt['cashtype']=="Refund"){ $xxtot=$xxtot-$rt['refund']; echo $rt['refund'];} 
	else {echo $rt['handover'];} 
	*/ ?>

	    <?php if($rt['cashtype']=="donation" || $rt['cashtype']=="advance"){echo $rt['donation'];$xxtot=$xxtot+$rt['donation'];}
	    elseif($rt['cashtype']=="Refund"){ $xxtot=$xxtot-$rt['refund']; echo $rt['refund'];}
	   ?>
	
	</td>
	<td data-title="Handover To:"><?php echo $rt['handoverto']; $xxtot=$xxtot-$rt['donation']; ?></td>
	<td data-title="Total:"><?php echo $xxtot; ?></td>
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