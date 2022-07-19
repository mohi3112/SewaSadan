<?php 
include('lcheck.php');

if(isset($_POST['sub']))
{
	foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}
$newadvance=$adv+$newsecurity;
$newren=$rdate+5184100;
echo "<br><br><br><br><br>".$update="update `visits` set `advance`='$newadvance' ,`ren_date`='$newren' where `bookingid`='$booking';";
mysqli_query($con,$update);
$q1="SELECT * FROM `cash` ORDER BY `reciptno` DESC LIMIT 1;";
			$c1=mysqli_query($con,$q1);
			$cr1=mysqli_fetch_array($c1);
			$cashinhand=$cr1['cashinhand']+$newsecurity;
			 echo $adv="INSERT INTO `cash` (`reciptno`, `name`, `cashtype`, `bookinid`, `room`, `bed`, `arrival`, `checkout`, `refund`, `vcno`, `donation`, `dslip`, `cashinhand`) VALUES (NULL, '$name', 'advance', '$booking', '$room', '$bed', '$chkin', '0', '0', '0', '$newsecurity', '0', '$cashinhand');";
			mysqli_query($con,$adv);
	echo "<script>window.location.href = 'print.php?type=security&samount=".$newsecurity."booking=".$booking."';</script>";

}


?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Upcoming Renewals</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<?php
					  
if(isset($_GET['booking']))
{ 

$usr=$_SESSION['usr'];
		$b=$_GET['booking'];
		
		$qur=" select * from `visits` where `bookingid`='$b';";
		$ret=mysqli_query($con,$qur);
		$res=mysqli_fetch_array($ret);
		?>
									  
		
		
		
		<?php
		//echo $qur2="UPDATE `rooms` SET `gno`='$gno', `recipt`='$rcpt' WHERE `bookingid` = '$sr' ;";
		//mysqli_query($con,$qur2);
		
	///echo "<script>window.location.href = 'storepending.php';</script>";
		
}else{
					  ?>
					  <div id="printableArea" style="width:100%;height:90%;">
                      <section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
									  <th>Sr:</th>
									  <th>Slip No:</th>
									  <th>Attendent Name:</th>
									  <th>Father Name-W/O:</th>
									  <th>Checkin Date:</th>
									  <th>Renew Date:</th>
									  <th>Room No:</th>
									  <th>Bed No:</th>
									  <th>Mobile:</th>
                                      <th>Photo</th>
                                  </tr>
                                  </thead>
                                  <tbody>
					  <?php $count=1;
							$w="select * from `visits` where `checkout_date` IS NULL  and `fnwo` != 'Extra Donation';";
							$rr=mysqli_query($con,$w); $renewcount=0;
							while ($rt=mysqli_fetch_array($rr))
							{
								$checkin=$rt['checkin_date'];
								$chec = date('d-m-Y G:i:s', $checkin);
								$checkindate = date('d', $checkin);
								$checkintime = date('m', $checkin);
								$chec2 = date('d-m-Y', $checkin);
								 $renew=$rt['ren_date'];
								 //echo time();
								 
								$renewf = date('d-m-Y G:i:s', $renew);
								$renew2 = date('d-m-Y', $renew);
								$renewdate = date('d', $renew);
								$renewtime = date('m', $renew);
								$cur=time();
								$dren=$cur+86400;
								  
									 $renew22 = date('d-m-Y', time());
								 //echo $t=strtotime('26-05-2018 14:00:00');
								  $cren=$renew-21600;
								 	 $renewf2 = date('d-m-Y G:i:s', $cren);
								if($dren>$cren)
								{
									$renewcount++;
									
							 ?>
							
							<tr>
                                      <td data-title="Sr:"><?php echo $count; ?></td>
                                      <td data-title="Slip No:"><?php
									  $sw=$rt['bookingid'];
										$sel2="select * from `cash` where `bookinid`='$sw' and `cashtype`='advance' ORDER BY `reciptno` DESC LIMIT 1;";
										$rr2=mysqli_query($con,$sel2);
										$rs2=mysqli_fetch_array($rr2);
										echo $rs2['slip'];
										?></td>
									  <td data-title="Attendent Name:"><?php echo $rt['guestname']; ?></td>
									  <td data-title="Father Name - W/O:"><?php echo $rt['fnwo']; ?></td>
									  <td data-title="Checkin Date:"><?php echo $chec2; ?></td>
									  <td data-title="Checkin Date:"><?php echo $renew2; ?></td>
									  <td data-title="Room No:"><?php echo $rt['room_no']; ?></td>
									  <td data-title="Bed No:"><?php echo $rt['bed_no']; ?></td>
                                      
                                     <td data-title="Mobile:"><?php echo $rt['mobile']; ?></td>
                                      <td data-title="Photo:"><img src="<?php echo $rt['photo']; ?>" height="150px" width=auto></td>
                                  </tr>
                                  
		<?php $count++;



?>
                                 
                            
									<?php  } } ?>
					  
					   </tbody>
</table><?php }?>
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