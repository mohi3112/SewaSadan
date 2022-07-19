<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Room Check Report</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<table width="100%" cellspacing="6px" style="padding-top:100px;background-color:#ccc;" align="center" width="100%" bgcolor="#ccc">
						  <form method="get" action="rcreport.php">
						  <td>Start Date: <input type="date" name="start"></td><td>End Date: <input type="date" name="end"></td><td> <?php
								$quer="SELECT * from `rooms` where `room_no` between '200' and '300' group by `room_no`;";
  $dm=mysqli_query($con,$quer);
  ?>Room No <select name="room"  class="form-control show-tick" data-live-search="true"><?php
 while( $dmm=mysqli_fetch_array($dm))
 {
				  ?><option value="<?php echo $dmm['room_no']; ?>"><?php echo $dmm['room_no']; ?></option>
 <?php } ?>
								  </select>
						</td><td><input type="submit" name="chk" value="search"></td>
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
 $qr="SELECT * FROM `visits`  WHERE `checkout_date` BETWEEN '$st' AND '$en' and `room_no`='$room';";

	?>
	
	<section id="no-more-tables">
                              <table  id="tblexportData" class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
								  
                                  <tr>
								  <th>Slip:</th>  
								  <th width="12%">Checkout Date:</th> 
								  <th width="12%">Checkout Time:</th> 
								  <th width="23%">Attendant</th>
								  <th>Room No</th>
								  <th>Bed-No</th>
								  <th>Check By</th> 
								  
                                      </tr>
                                  </thead>
                                  <tbody>
						  
			 <?php 
	$rr=mysqli_query($con,$qr); 
		while($rt=mysqli_fetch_array($rr))
		{ 
	
			?>
	
<tr><td data-title="Slip:"><?php $bid= $rt['bookingid'];$rq="select * from `cash` where `bookinid`='$bid'; "; $qrq=mysqli_query($con,$rq);$trt=mysqli_fetch_array($qrq);echo $trt['slip']; ?></td>
<td data-title="Date"><?php echo date('d/m/Y',$rt['checkout_date']); ?></td>
	<td data-title="Time:"><?php echo date('h:i a',$rt['checkout_date']);  ?></td>
	<td data-title="Attendant:"><?php echo $rt['guestname']; ?></td>
	<td data-title="Room No:"><?php echo $rt['room_no']; ?></td>
	<td data-title="Bed No:"><?php echo $rt['bed_no']; ?></td>
	<td data-title="Checked By:"><?php echo $rt['checkby']; ?></td>
	
	</tr>
	
	
	
<?php	
}
echo "</tbody></table>";
}			  
			  
			?>			  

                          </section>
                      <!-- /content-panel --><center><input type="button" onclick="printDiv('printableArea')" value="Print" /> <button onclick="exportToExcel('tblexportData')">Export Table Data To Excel File</button></center>
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