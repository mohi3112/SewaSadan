<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Second Person Issue Report</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<table width="100%" cellspacing="6px" style="padding-top:100px;background-color:#ccc;" align="center" width="100%" bgcolor="#ccc">
						  <form method="get" action="secissue.php">
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
 $qr="SELECT * FROM `visits` where `bed_no` ='2'  and `checkin_date` BETWEEN '$st' AND '$en' and `room_no` between '200' and '300'ORDER BY `rcpt`;";
$start;

	?><section id="no-more-tables"><div id="printableArea" style="width:100%;height:90%;">
	
                              <table  id="tblexportData" class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf" >
                                  <tr >
								  <th class="numeric">Slip:</th>
								  <th class="numeric">Date:</th>
								  <th class="numeric">Time:</th>
								  <th class="numeric">Name:</th>
								  <th class="numeric">Address:</th>
								  <th class="numeric">Phone:</th>
								  <th class="numeric">Id-Type:</th>
								  <th class="numeric">ID-Number:</th>
								  <th class="numeric">MRD:</th>
                            	  <th class="numeric">Room/Bed</th>
                            	  <th class="numeric">Issued By</th>

								  </tr>
                                  </thead>
                                  <tbody>
						  
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
<td data-title="Date:"><?php echo date('d/m/Y',$rt['checkin_date']); ?></td>
<td data-title="Time:"><?php echo date('G:i',$rt['checkin_date']); ?></td>
<td data-title="Name:"><?php echo $rt['guestname']; ?></td>
<td data-title="Address:"><?php echo $rt['address'];  ?></td>
<td data-title="Mobile:"><?php echo $rt['mobile'];  ?></td>
<td data-title="ID Type:"><?php echo $rt['id_type'];  ?></td>
<td data-title="Id Number:"><?php echo $rt['id_number'];  ?></td>
<td data-title="MRD:"><?php echo $rt['mrd'];  ?></td>
<td data-title="Room/Bed:"><?php echo $rt['room_no']."/".$rt['bed_no']; ;  ?></td>
<td data-title="Entry By:"><?php echo $rt['checkin_by']; ?></td>
</tr>
	
	
	
<?php	
}
echo "</tbody></table>";
}
?>		  
						  
						  
						  
						  
						  
						  
						  
                          
                              <center>
                              
                              </center>
                          </section>
                      </div><!-- /content-panel -->
					 <center> <input type="button" onclick="printDiv('printableArea')" value="Print" /><button onclick="exportToExcel('tblexportData')">Export Table Data To Excel File</button></center>
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