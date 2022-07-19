<?php
include('lcheck.php');
$usr=$_SESSION['usr'];
if(isset($_POST['send']))
{ 
foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}
		$dt=strtotime($dated);
		$stdate=date('d-m-Y', $dt);
		$sttime=date(' h:i:s', time());
		$mydate=$stdate.$sttime;
		$current=strtotime($mydate);
		 
		 if($cash<$amount)
		 {
			 echo "<script>alert('Amount Cannot Be Greater Then Cash In Hand');window.location.href = 'tobank.php';</script>";
			 
		 }
		 else
		 {
		     $cash=$cash-$amount;
		$ttt=time();
			$qur="INSERT INTO `cashhandover` (`sr`, `time`, `handoverby`, `handoverto`, `amount`) VALUES (NULL, CURRENT_TIMESTAMP, '$usr', 'bank', '$amount');";
		 mysqli_query($con,$qur);
		 
 $refnd="
INSERT INTO `cash` (`sr`, `time`, `reciptno`, `name`, `cashtype`, `bookinid`, `room`, `bed`, `arrival`, `checkout`, `refund`, `vcno`, `donation`, `dslip`, `cashinhand`, `collectby`, `handover`, `handoverto`, `handovertime`, `slip`) VALUES
(NULL,'$dated', '0', 'Handover', 'Handover', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '$cash', '$usr','$amount', 'bank', '$current', '0');";
		mysqli_query($con,$refnd); 
		 }
		
		//echo "<script>window.location.href = 'printvisitor.php?sr=".$ids."';</script>";
}


?>

<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Send To Bank</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					 <form class="form-horizontal style-form" method="post" action="tobank.php" enctype="multipart/form-data">
                         
						<table width="80%" align="center">
						<tr>
						<td>Total Amount: </td>
						<td><input type="text" name="amount" class="form-control"></td>
						<td>Send To Bank :  <i class="fa fa-bank" style="font-size:48px;color:red"></i></td>
							<td>On Date : <input type="date" name="dated" class="form-control"> </td>
						<td> <input type="submit" name="send" class="btn btn-round btn-default"/></td>
						</tr>
						</table></form>
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