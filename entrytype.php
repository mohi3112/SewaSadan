<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Report By Entry Type</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<table width="100%" cellspacing="6px" style="padding-top:100px;background-color:#ccc;" align="center" width="100%" bgcolor="#ccc">
						  <form method="get" action="entrytype.php">
						  <td>Start Date: <input type="date" name="start"></td><td>End Date: <input type="date" name="end"></td><td>Entry Type: <select name="type"> 
						  <option>Select A Type</option>
						  <option value="new">New</option>
						  <option value="renew">Renew</option>
						   <option value="exchange">Exchange</option>
						  </select></td><td><input type="submit" name="chk" value="Find Records"></td>
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
	$st=strtotime($start);
	$en=strtotime($end);
$qr="SELECT * FROM `visits` WHERE `visit_type` ='$type' and  `checkin_date` BETWEEN '$st' AND '$en' ;";
	?>
	<section id="no-more-tables">
                              <table id="tblexportData" class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr><th>Sr:</th>
								  <th>Date:</th>
									  <th>Slip No:</th>
                                      <th class="numeric">Name:</th>
									  <th class="numeric">Father/Husband Name:</th>
                                      <th class="numeric">Room No:</th>
                                      <th class="numeric">Bed No:</th>
                                      <th  class="numeric">Visit Type:</th>
                                      
                                  </tr>
                                  </thead>
                                  <tbody>
						  
						  <?php 
	$rr=mysqli_query($con,$qr); $count=1;
		while ($rt=mysqli_fetch_array($rr))
		{
			$ctre=$rt['bookingid'];
			$sel2="select * from `cash` where `bookinid`='$ctre' and `cashtype`='advance';";
				$rr2=mysqli_query($con,$sel2);
				$rs2=mysqli_fetch_array($rr2);
				?>
	
	
                                  
                                  <tr><td data-title="Sr:"><?php echo $count; ?></td>
								  <td data-title="Date:"><?php echo date('d-m-Y',$rt['checkin_date']); ?></td>
                                      <td data-title="Booking ID:"><?php echo $rs2['slip']; ?></td>
									  
                                      <td data-title="Name:"><?php echo $rt['guestname']; ?></td>
                                     <td data-title="Father/Husband Name:"><?php echo $rt['fnwo']; ?></td>
									 <td class="numeric" data-title="Room No:"><?php echo $rt['room_no']; ?></td>
                                      <td class="numeric" data-title="Bed No:"><?php echo $rt['bed_no']; ?></td>
                                      <td class="numeric" data-title="Visit Type:"><?php echo $rt['visit_type']; ?></td>
                                      
									  
                                      
                                  </tr>
                                  
		<?php  $count++;}


?>
                                  </tbody>
                              </table>
	
	
	
<?php	
}
else{
$st=time();
$en=$st-864000;
$qr="SELECT * FROM `visits` WHERE `checkin_date` BETWEEN '$en' AND '$st' ;";
	?>
	<b><i><center>Last 10 Days Records</center></i></b><br>
	<section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr><th>Sr:</th>
								  	  <th>Date:</th>
									  <th>Slip No:</th>
                                      <th class="numeric">Name:</th>
									  <th class="numeric">Father/Husband Name:</th>
                                      <th class="numeric">Room No:</th>
                                      <th class="numeric">Bed No:</th>
                                      <th  class="numeric">Visit Type:</th>
                                      
                                  </tr>
                                  </thead>
                                  <tbody>
						  
						  <?php 
	$rr=mysqli_query($con,$qr); $count=1;
		while ($rt=mysqli_fetch_array($rr))
		{
			$ctre=$rt['bookingid'];
			$sel2="select * from `cash` where `bookinid`='$ctre' and `cashtype`='advance' ORDER BY `reciptno` DESC LIMIT 1;";
				$rr2=mysqli_query($con,$sel2);
				$rs2=mysqli_fetch_array($rr2);
			?>
	
	
                                  
                                  <tr><td data-title="Sr:"><?php echo $count; ?></td>
								  <td data-title="Date:"><?php echo date('d-m-Y',$rt['checkin_date']); ?></td>
                                      <td data-title="Booking ID:"><?php echo $rs2['slip']; ?></td>
									  
                                      <td data-title="Name:"><?php echo $rt['guestname']; ?></td>
                                     <td data-title="Father/Husband Name:"><?php echo $rt['fnwo']; ?></td>
									 <td class="numeric" data-title="Room No:"><?php echo $rt['room_no']; ?></td>
                                      <td class="numeric" data-title="Bed No:"><?php echo $rt['bed_no']; ?></td>
                                      <td class="numeric" data-title="Visit Type:"><?php echo $rt['visit_type']; ?></td>
                                      
									  
                                      
                                  </tr>
                                  
		<?php  $count++;}


?>
                                  </tbody>
                              </table>
	
	
	
<?php	




	?>
						
						
		<?php				  
}			  
			?>			  
						  
						  
						  
						  
						  
						  
						  
                          
                              <center>
                              
                              </center>
                          </section><input type="button" onclick="printDiv('printableArea')" value="Print" />
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