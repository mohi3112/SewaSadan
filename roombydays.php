<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Room By Days</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					 <div id="printableArea" style="width:100%;height:90%;">
                      <section id="no-more-tables">
                              <table  id="tblexportData" class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
									  <th>Sr:</th>
									  <th>Room No:</th>
									  <th>Attendent Name:</th>
									  <th>Arrival Date:</th>
									  <th>Patient:</th>
									  <th>MRD:</th>
                                      <th>Days</th>
                                  </tr>
                                  </thead>
                                  <tbody>
					  <?php
					  
$usr=$_SESSION['usr'];
		
		$qur=" select * from `rooms` where `bed_no`=1 and  `checkout` is null and `status`='occupied' and `room_no` between '101' and '199' or `room_no` between '201' and '299' or `room_no` between '301' and '399'  ;";
		$ret=mysqli_query($con,$qur);$count=1;
		
		while($res=mysqli_fetch_array($ret))
		{$tdays=0;
			$s=$res['bookingid'];
		$qur2="select * from `visits` where `bookingid`='$s';";
		$chal=mysqli_query($con,$qur2);
		$result=mysqli_fetch_array($chal);
		$mrd=$result['mrd'];	$mrom=$result['room_no'];
			$mr="select * from `visits` where  `bed_no`=1 and  `mrd`='$mrd' and  `room_no` ='$mrom'  limit 1 ;";
		$daffaho=mysqli_query($con,$mr);
		$mrdbased=mysqli_fetch_array($daffaho);
		$now=time();
		$datediff=$now - $mrdbased['checkin_date'];
		$gdays = round($datediff / (60 * 60 * 24));
		
		$tdays=$tdays+$gdays;
		

		
		
		
		
	///echo "<script>window.location.href = 'storepending.php';</script>";
		
?>
					  
			<tr>
            <td data-title="Sr:"><?php echo $count; ?></td>
            <td data-title="Room No:"><?php echo $res['room_no'];?></td>
			<td data-title="Attendent Name:"><?php echo $result['guestname']; ?></td>
			<td data-title="Arrival Date:"><?php if($arrival=='01-01-1970'){echo "N/A";} else{ $cmdt=$mrdbased['checkin_date'];echo  date('d-M-Y', $cmdt); } ?></td>
			<td data-title="Patient:"><?php echo $mrdbased['patient']; ?></td>
			<td data-title="MRD:"><?php echo $mrdbased['mrd']; ?></td>
			<td data-title="Days:"><?php if($arrival=='01-01-1970'){echo "0 Days";} else{ echo $tdays." Days"; }  ?></td>
            </tr>
                                  
		<?php $count++;



?>
                                 
                            
									<?php  } ?>
					  
					   </tbody>
</table>
                
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