<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>

<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Same Day Report</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<table width="100%" cellspacing="6px" style="padding-top:100px;background-color:#ccc;" align="center" width="100%" bgcolor="#ccc">
						  <form method="get" action="sameday.php">
						  <td>Select Date: <input type="date" name="starts"></td><td><input type="submit" name="chk" value="search"></td>
						  </tr>
						  </table> 
						  
						  <div id="printableArea" style="width:100%;height:90%;">
	<section id="no-more-tables" width="100%">
                              <table id="tblexportData" class="table table-bordered table-striped table-condensed cf" >
                                  
								  <tr>
								  
								  <td>Sr</td>
								  <td>Name:</td>
								  <td>Patient</td>
								  <td>Checkin</td>
								  <td>Slip</td>
								  <td>Checkin By</td>
								  <td>Checkout</td>
								  <td>Vc.No</td>
								  <td>Checkout By</td>
								 <td>Room/Bed</td>
								 
								  </tr>
								
	<?php
if(isset($_GET['chk']))
{
	foreach($_GET as $k=>$v)
		{
			$$k=$v;
		}
$stt=$starts." 00:00:01";
$stp=$starts." 23:59:59";

$starttime=strtotime($stt);
$stoptime=strtotime($stp);


$sr=1;
$qur="select * from `visits` where `checkin_date` between '$starttime' and '$stoptime' and  `checkout_date` between '$starttime' and '$stoptime';";
$raw=mysqli_query($con,$qur);
	while($rt=mysqli_fetch_array($raw))
	{
	    $tt=$rt['bookingid'];
	    $rf1="select * from `cash` where `bookinid`='$tt' and `cashtype`='advance';";
	    $rrf1=mysqli_query($con,$rf1);
	    $rt2=mysqli_fetch_array($rrf1);
	    
	    $rf2="select * from `cash` where `bookinid`='$tt' and `cashtype`='refund';";
	    $rrf2=mysqli_query($con,$rf2);
	    $rt3=mysqli_fetch_array($rrf2);
	    
	    $rf3="select * from `cash` where `bookinid`='$tt' and `cashtype`='donation';";
	    $rrf3=mysqli_query($con,$rf3);
	    $rt4=mysqli_fetch_array($rrf3);
	    
	   ?>
	   <tr>
	   <td><?php echo $sr++; ?></td>
	   <td><?php echo $rt['guestname']; ?></td>
	   <td><?php echo $rt['patient']; ?></td>
	   <td><?php $in=$rt['checkin_date']; echo date('d-m-Y G:i:s',$in); ?></td>
	   <td><?php echo $rt2['slip'];  ?></td>
	   <td><?php echo $rt2['collectby']; ?></td>
	   <td><?php $out=$rt['checkout_date']; echo  date('d-m-Y G:i:s',$out);?></td>
	   <td><?php echo $rt3['vcno'];  ?></td>
	   <td><?php  echo $rt3['collectby'];  ?></td>	   

	   <td><?php echo $rt['room_no']."/".$rt['bed_no']; } ?></td>	   
	  
	   </tr>
	   
	   <?php
	  
	}
	
echo "</tbody></table>";

?>
	             <center>
                              
                              </center>
                          </section>
                      </div><!-- /content-panel -->
					  <input type="button" onclick="printDiv('printableArea')" value="Print" />
					  <button onclick="exportToExcel('tblexportData')">Export To Excel</button>
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