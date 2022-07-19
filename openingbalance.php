<?php
include('lcheck.php');
echo "<br><br><br><br><br>";

$usr=$_SESSION['usr'];
if(isset($_POST['send']))
{ 
foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}
		$dt=strtotime($dated);
		$stdate=date('d-m-Y', $dt);
		$sttime=$stdate.' 13:21:00';
		$current=strtotime($sttime);
	$refnd="INSERT INTO `cash` (`sr`, `time`, `reciptno`, `name`, `cashtype`, `bookinid`, `room`, `bed`, `arrival`, `checkout`, `refund`, `vcno`, `donation`, `dslip`, `cashinhand`, `collectby`, `handover`, `handoverto`, `handovertime`, `slip`) VALUES
(NULL, '$sttime', '0', '0', 'lastday', '0', 0, '0', '0', '0', 0, '0', 0, 0, 0, '0', $amount, '0', '$current', '0');";
	    mysqli_query($con,$refnd);
}


?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Today Opening Balance</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					   <form class="form-horizontal style-form" method="post" action="openingbalance.php" enctype="multipart/form-data">
                         
						<table width="80%" align="center">
						<tr>
						<td>Opening Cash : </td>
						<td><input type="text" name="amount" class="form-control" size=5></td>
						
							<td>On Date : </td>
						<td><input type="date" name="dated" class="form-control" size=5> </td>
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