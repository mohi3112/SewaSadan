<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Room All Person List</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<div id="printableArea" style="width:100%;height:90%;">
						  	<section id="no-more-tables">
								<table id="tblexportData" class="table table-bordered table-striped table-condensed cf">
								 <thead class="cf">
								  
								<tr > 
								<td>Booking ID</td> 
								<td>Room No</td> 
								<td>Person</td> 
								<td>Arrival Date</td> 
								<td>Valid Date</td> 
								<td>Name</td> 
								<td>Slip No</td> 
				
								
								</tr>
								 </thead>
                                  <tbody>
                          <?php
$qr="SELECT * FROM `rooms` where `room_no` between 200 and 300 ORDER BY `sr` ASC;";
						  $result = mysqli_query($con,$qr);
							while($row = mysqli_fetch_array($result))
							{ 
							 
							 ?>
								

								<?php 
								$bid=$row['bookingid'];
								$r12="select * from `cash` where `bookinid`='$bid';";
								$mty=mysqli_query($con,$r12);
								$mtyr=mysqli_fetch_array($mty);
								?>
								
								<tr> 
								<td><?php echo $row['bookingid']; ?></td> 
								<td><?php echo $row['room_no']; ?></td> 
								<td><?php echo $row['bed_no']; ?></td>
								<td><?php $svc2=strtotime($row['arrival']); $yyy=date('d-m-Y',$svc2); if($yyy=='01-01-1970'){echo "VACANT";}else{echo $yyy;}?></td> 
								<td><?php $svc=strtotime($row['valid']); $xxxx=date('d-m-Y',$svc); if($xxxx=='01-01-1970'){echo "N/A";}else{echo $xxxx;}?></td> 
								<td><?php echo $row['curr_guest']; ?></td> 
								<td><?php echo $mtyr['slip']; ?></td> 
								
								
								</tr> <?php
								}



								?>
								</table>
								
								</section>
								
	
                      
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