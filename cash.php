<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>
<style type="text/css" media="print">
    @page { 
        size: landscape;
        size: A4 landscape; 
    }
    body { 
        size: A4 landscape; 
}
</style>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Main Register</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<table width="100%" cellspacing="6px" style="padding-top:100px;background-color:#ccc;" align="center" width="100%" bgcolor="#ccc">
						  <form method="get" action="cash.php">
						  <td>Start Date: <input type="date" name="start"></td><td>End Date: <input type="date" name="end"></td><td><input type="submit" name="chk" value="search"></td>
						  </tr>
						  </table> 
						  
						  						  
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
 $qr="SELECT * FROM `visits` where `patient` !='Extra Donation' and `checkin_date` BETWEEN '$st' AND '$en' ORDER BY `rcpt`;";
$start;

	?><section id="no-more-tables">
		<div id="printableArea" style="width:100%;height:90%;">
	
                              <table class="table table-bordered table-striped table-condensed cf"  style="width:100%;">
                                  <thead class="cf" >
                                  <tr >
								  <th class="numeric">Slip:  </th>
								  <th class="numeric">Date:</th>
								  <th class="numeric">Name:</th>
								  <th class="numeric">Address:</th>
								  <th class="numeric">Phone:</th>
								  <th class="numeric">Id-Type:</th>
								  <th class="numeric">ID-Number:</th>
								  <th class="numeric">MRD:</th>
								  <th class="numeric">Admit:</th>
								  <th class="numeric">Patient:</th>
								  <th class="numeric">Room/Bed</th>
								  <th class="numeric">Security</th>
								  <th class="numeric">Vacant-Date</th>
								  <th class="numeric">Refund</th>
								  <th class="numeric">VcNo</th>
								  <th class="numeric">Don</th> <th class="numeric">Entry By</th>
								  </tr>
                                  </thead>
                                  <tbody>
						  <tr><td colspan=15> </td></tr>
						  <?php 
	$rr=mysqli_query($con,$qr); 
		while($rt=mysqli_fetch_array($rr))
		{$t=$rt['bookingid'];
	$sel2="select * from `cash` where `bookinid`='$t' and `cashtype`='advance' ORDER BY `sr` DESC LIMIT 1;";
				$rr2=mysqli_query($con,$sel2);
				$rs2=mysqli_fetch_array($rr2);
			?>
			
<tr>
<td data-title="Slip:"><?php echo $rs2['slip']; ?></td>
<td data-title="Arrival:"><?php echo date('d/m/Y',$rt['checkin_date']); ?></td>
<td data-title="Name:"><?php echo $rt['guestname']; ?></td>
<td data-title="Address:"><?php echo $rt['address'];  ?></td>
<td data-title="Mobile:"><?php echo $rt['mobile'];  ?></td>
<td data-title="ID Type:"><?php echo $rt['id_type'];  ?></td>
<td data-title="Id Number:"><?php echo $rt['id_number'];  ?></td>
<td data-title="MRD:"><?php echo $rt['mrd'];  ?></td>
<td data-title="Admit Date:"><?php echo $rt['patient_adm_date'];  ?></td>
<td data-title="Patient:"><?php echo $rt['patient'];  ?></td>
<td data-title="Room/Bed:"><?php echo $rt['room_no']."/".$rt['bed_no']; ;  ?></td>
<td data-title="Security:"><?php echo $rt['advance']; ?></td>
<td data-title="Vacant:"><?php echo date('d/m/Y',$rt['checkout_date']); ?></td>
	<td data-title="Refund:"><?php echo $rt['refundvoucher']; ?></td>
		<td data-title="Refund:"><?php echo $rt['vcno']; ?></td>
	<td data-title="Donation"><?php echo $rt['donation']; ?></td>
	<td data-title="Entry"><?php echo $rt['checkin_by']; ?></td>	
	
</tr>
	
	
	
<?php	
}
echo "</tbody></table>";
}
else{
$st=time();
$en=$st-864000;
$qr="SELECT * FROM `visits` where  `checkin_date` BETWEEN '$en' AND '$st'   and `checkout_date` IS NOT NULL;";

	?><section id="no-more-tables"><div id="printableArea" style="width:100%;height:90%;">
	<section id="no-more-tables">
                              <table  id="tblexportData" class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf" >
                                  <tr >
								  <th class="numeric">Slip:  </th>
								  <th class="numeric">Date:               </th>
								  <th class="numeric">Name:                       </th>
								  <th class="numeric">Address:                   </th>
								  <th class="numeric">  Phone:           </th>
								  <th class="numeric">Id-Type:
								       </th>
								  <th class="numeric">   ID-Number:               </th>
								  <th class="numeric">            MRD:    </th>
								  <th class="numeric">Admit:</th>
								  <th class="numeric">Patient:            </th>
								  <th class="numeric">Room/Bed</th>
								  <th class="numeric">Security</th>
								  <th class="numeric">
		Vacant-Date
								  </th>
								  <th class="numeric">Refund</th>
								  <th class="numeric">VcNo</th>
								  <th class="numeric">Don</th>
								  </tr>
                                  </thead>
                                  <tbody>
						  
						  <?php 
	$rr=mysqli_query($con,$qr); 
		while($rt=mysqli_fetch_array($rr))
		{ $t=$rt['bookingid'];
	
		
	$sel2="select * from `cash` where `bookinid`='$t' and `cashtype`='advance' ORDER BY `reciptno` DESC LIMIT 1;";
				$rr2=mysqli_query($con,$sel2);
				$rs2=mysqli_fetch_array($rr2);
			?>
	
<tr>

<td data-title="Date:"><?php echo $rs2['slip']; ?></td>
<td data-title="Arrival:"><?php echo date('d/m/Y',$rt['checkin_date']); ?></td>
<td data-title="Name:"><?php echo $rt['guestname']; ?></td>
<td data-title="Address:">
<?php 
	if($rt['room_no']>200 && $rt['room_no']<300 && $rt['bed_no']==2  )
		{
		   $r=$rt['room_no'];$b=$rt['bed_no'];
		   $xx="select * from `visits` where `room_no`='$r' and `bed_no`='1' and `bookingid`='$t';"; 
		    	$xr=mysqli_query($con,$xx);
				$xt=mysqli_fetch_array($xr);
				echo $xt['address'];
		}
		else{ echo $rt['address'];  } ?></td>
<td data-title="Mobile:"><?php echo $rt['mobile'];  ?></td>
<td data-title="ID Type:"><?php echo $rt['id_type'];  ?></td>
<td data-title="Id Number:"><?php echo $rt['id_number'];  ?></td>
<td data-title="MRD:"><?php echo $rt['mrd'];  ?></td>
<td data-title="Admit Date:"><?php echo $rt['patient_adm_date'];  ?></td>
<td data-title="Patient:"><?php echo $rt['patient'];  ?></td>
<td data-title="Room/Bed:"><?php echo $rt['room_no']."/".$rt['bed_no']; ;  ?></td>
<td data-title="Security:"><?php echo $rt['advance']; ?></td>
<td data-title="Vacant:"><?php echo date('d/m/Y',$rt['checkout_date']); ?></td>
	<td data-title="Refund:"><?php echo $rt['refundvoucher']; ?></td>
	<td data-title="Refund:"><?php echo $rt['vcno']; ?></td>
	<td data-title="Donation"><?php echo $rt['donation']; ?></td>

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
					  <input type="button" onclick="printDiv('printableArea')" value="Print" /><button onclick="exportToExcel('tblexportData')">Export Table Data To Excel File</button>
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