<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];

foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}
		if(isset($change))
		{
		    $chng="update `rooms` set `status`='$status' where `room_no`='$room' and `bed_no`='$bed';";
		    mysqli_query($con,$chng);
		    echo "<script>alert('Room Status Saved..');</script>";
		echo "<script>window.location.href = 'roomstatus.php';</script>";
		}
?>
<style> table tr td,th{ font-size:14px;text-align: center;}</style>	
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"> <h2>Change Room Status</h2> </div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
				  <ul class="nav nav-tabs p-0 mb-3">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#a">101</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#b">102</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#c">103</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#d">104</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#e">105</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#f">301</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#g">302</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#h">303</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#i">304</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#j">Private</a></li>
                            </ul>                
			              <div class="tab-content">
                                <div role="tabpanel" class="tab-pane in active" id="a">
                                    <table border=1 width="100%"><tr><th>Sr</th><th>Room</th><th>Bed</th><th>Type</th><th>Charges</th><th>Guest</th><th>Arrival</th><th>Slip</th><th>Status</th></tr>
                                   <?php 
								   $sr1=1;
								   $qq1="select * from `rooms` where `room_no`='101';";
								   $r1=mysqli_query($con,$qq1);
								   while($q1=mysqli_fetch_array($r1))
								   {
								   $bk1=$q1['bookingid'];
								   $bs="select * from `cash` where `bookingid`='$bk1';";
								   $bss=mysqli_query($con,$bs);
								   $rbss=mysqli_fetch_array($bss);
								   $slip1=$rbss['slip'];
								   $rc1=$q1['status'];
								   ?>
								   <tr style="<?php if($rc1=='occupied'){ echo "color:#FFF;background-color:#f00;";}else{echo "color:#FFF;background-color:#0f0;";}?>"><td><?php echo $sr1; ?></td><td><?php echo $q1['room_no']; ?></td><td><?php echo $q1['bed_no']; ?></td><td><?php echo $q1['room_type']; ?></td><td><?php echo $q1['room_charge']; ?></td><td><?php if($q1['status']=='occupied'){echo $q1['curr_guest'];} else{echo " ";} ?></td>
								   	<td><?php if($q1['status']=='occupied'){echo $q1['arrival'];} else{echo " ";} ?></td><td><?php echo $slip1; ?></td><td><?php echo $q1['status']; ?></td></tr>
								   <?php
								  $sr1++; }
								   ?></table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="b">
                                    <table width="100%"><tr><th>Sr</th><th>Room</th><th>Bed</th><th>Type</th><th>Charges</th><th>Guest</th><th>Arrival</th><th>Slip</th><th>Status</th></tr>
                                   <?php 
								   $sr2=1;
								   $qq2="select * from `rooms` where `room_no`='102';";
								   $r2=mysqli_query($con,$qq2);
								   while($q2=mysqli_fetch_array($r2))
								   {
								   $bk2=$q2['bookingid'];
								   $bs2="select * from `cash` where `bookingid`='$bk2';";
								   $bss2=mysqli_query($con,$bs2);
								   $rbss2=mysqli_fetch_array($bss2);
								   $slip2=$rbss2['slip'];
								 $rc2=$q2['status'];
								   ?>
								   <tr style="<?php if($rc2=='occupied'){ echo "color:#FFF;background-color:#f00;";}else{echo "color:#FFF;background-color:#0f0;";}?>"><td><?php echo $sr2; ?></td><td><?php echo $q2['room_no']; ?></td><td><?php echo $q2['bed_no']; ?></td><td><?php echo $q2['room_type']; ?></td><td><?php echo $q2['room_charge']; ?></td><td><?php if($q2['status']=='occupied'){echo $q2['curr_guest'];} else{echo " ";}  ?></td><td><?php if($q2['status']=='occupied'){echo $q2['arrival'];} else{echo " ";}  ?></td><td><?php echo $slip2; ?></td><td><?php echo $q2['status']; ?></td></tr>
								   <?php
								  $sr2++; }
								   ?></table>
                                </div>
                             <div role="tabpanel" class="tab-pane" id="c">
                                     <table width="100%"><tr><th>Sr</th><th>Room</th><th>Bed</th><th>Type</th><th>Charges</th><th>Guest</th><th>Arrival</th><th>Slip</th><th>Status</th></tr>
                                   <?php 
								   $sr3=1;
								   $qq3="select * from `rooms` where `room_no`='103';";
								   $r3=mysqli_query($con,$qq3);
								   while($q3=mysqli_fetch_array($r3))
								   {
								   $bk3=$q3['bookingid'];
								   $bss3="select * from `cash` where `bookingid`='$bk3';";
								   $bs3=mysqli_query($con,$bss3);
								   $rbss3=mysqli_fetch_array($bs3);
								   $slip3=$rbss3['slip'];
								  $rc3=$q3['status'];
								   ?>
								   <tr style="<?php if($rc3=='occupied'){ echo "color:#FFF;background-color:#f00;";}else{echo "color:#FFF;background-color:#0f0;";}?>"><td><?php echo $sr3; ?></td><td><?php echo $q3['room_no']; ?></td><td><?php echo $q3['bed_no']; ?></td><td><?php echo $q3['room_type']; ?></td><td><?php echo $q3['room_charge']; ?></td><td><?php if($q3['status']=='occupied'){echo $q3['curr_guest'];} else{echo " ";} ?></td><td>
								   	<?php if($q3['status']=='occupied'){echo $q3['arrival'];} else{echo " ";}  ?></td><td><?php echo $slip3; ?></td><td><?php echo $q3['status']; ?></td></tr>
								   <?php
								  $sr3++; }
								   ?></table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="d">
                                    <table width="100%"><tr><th>Sr</th><th>Room</th><th>Bed</th><th>Type</th><th>Charges</th><th>Guest</th><th>Arrival</th><th>Slip</th><th>Status</th></tr>
                                   <?php 
								   $sr4=1;
								   $qq4="select * from `rooms` where `room_no`='104';";
								   $r4=mysqli_query($con,$qq4);
								   while($q4=mysqli_fetch_array($r4))
								   {
								   $bk4=$q4['bookingid'];
								   $bss4="select * from `cash` where `bookingid`='$bk4';";
								   $bs4=mysqli_query($con,$bss4);
								   $rbss4=mysqli_fetch_array($bs4);
								   $slip4=$rbss4['slip'];
								  $rc4=$q4['status'];
								   ?>
								   <tr style="<?php if($rc4=='occupied'){ echo "color:#FFF;background-color:#f00;";}else{echo "color:#FFF;background-color:#0f0;";}?>"><td><?php echo $sr4; ?></td><td><?php echo $q4['room_no']; ?></td><td><?php echo $q4['bed_no']; ?></td><td><?php echo $q4['room_type']; ?></td><td><?php echo $q4['room_charge']; ?></td><td><?php if($q4['status']=='occupied'){echo $q4['curr_guest'];} else{echo " ";}  ?></td><td><?php if($q4['status']=='occupied'){echo $q4['arrival'];} else{echo " ";}  ?></td><td><?php echo $slip4; ?></td><td><?php echo $q4['status']; ?></td></tr>
								   <?php
								  $sr4++; }
								   ?></table>
                                </div>
								<div role="tabpanel" class="tab-pane" id="e">
                                   <table width="100%"><tr><th>Sr</th><th>Room</th><th>Bed</th><th>Type</th><th>Charges</th><th>Guest</th><th>Arrival</th><th>Slip</th><th>Status</th></tr>
                                   <?php 
								   $sr5=1;
								   $qq5="select * from `rooms` where `room_no`='105';";
								   $r5=mysqli_query($con,$qq5);
								   while($q5=mysqli_fetch_array($r5))
								   {
								   $bk5=$q5['bookingid'];
								   $bss5="select * from `cash` where `bookingid`='$bk5';";
								   $bs5=mysqli_query($con,$bss5);
								   $rbss5=mysqli_fetch_array($bs5);
								   $slip5=$rbss5['slip'];
								  $rc5=$q5['status'];
								   ?>
								   <tr style="<?php if($rc5=='occupied'){ echo "color:#FFF;background-color:#f00;";}else{echo "color:#FFF;background-color:#0f0;";}?>"><td><?php echo $sr5; ?></td><td><?php echo $q5['room_no']; ?></td><td><?php echo $q5['bed_no']; ?></td><td><?php echo $q5['room_type']; ?></td><td><?php echo $q5['room_charge']; ?></td><td><?php if($q5['status']=='occupied'){echo $q5['curr_guest'];} else{echo " ";}  ?></td><td><?php if($q5['status']=='occupied'){echo $q5['arrival'];} else{echo " ";}  ?></td><td><?php echo $slip5; ?></td><td><?php echo $q5['status']; ?></td></tr>
								   <?php
								  $sr5++; }
								   ?></table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="f">
                                <table width="100%"><tr><th>Sr</th><th>Room</th><th>Bed</th><th>Type</th><th>Charges</th><th>Guest</th><th>Arrival</th><th>Slip</th><th>Status</th></tr>
                                   <?php 
								   $sr6=1;
								   $qq6="select * from `rooms` where `room_no`='301';";
								   $r6=mysqli_query($con,$qq6);
								   while($q6=mysqli_fetch_array($r6))
								   {
								   $bk6=$q6['bookingid'];
								   $bss6="select * from `cash` where `bookingid`='$bk6';";
								   $bs6=mysqli_query($con,$bss6);
								   $rbss6=mysqli_fetch_array($bs6);
								   $slip6=$rbss6['slip'];
								  $rc6=$q6['status'];
								   ?>
								   <tr style="<?php if($rc6=='occupied'){ echo "color:#FFF;background-color:#f00;";}else{echo "color:#FFF;background-color:#0f0;";}?>"><td><?php echo $sr6; ?></td><td><?php echo $q6['room_no']; ?></td><td><?php echo $q6['bed_no']; ?></td><td><?php echo $q6['room_type']; ?></td><td><?php echo $q6['room_charge']; ?></td><td><?php if($q6['status']=='occupied'){echo $q6['curr_guest'];} else{echo " ";}  ?></td><td><?php if($q6['status']=='occupied'){echo $q6['arrival'];} else{echo " ";}  ?></td><td><?php echo $slip6; ?></td><td><?php echo $q6['status']; ?></td></tr>
								   <?php
								  $sr6++; }
								   ?></table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="g">
                                 <table width="100%"><tr><th>Sr</th><th>Room</th><th>Bed</th><th>Type</th><th>Charges</th><th>Guest</th><th>Arrival</th><th>Slip</th><th>Status</th></tr>
                                   <?php 
								   $sr7=1;
								   $qq7="select * from `rooms` where `room_no`='302';";
								   $r7=mysqli_query($con,$qq7);
								   while($q7=mysqli_fetch_array($r7))
								   {
								   $bk7=$q7['bookingid'];
								   $bss7="select * from `cash` where `bookingid`='$bk7';";
								   $bs7=mysqli_query($con,$bss7);
								   $rbss7=mysqli_fetch_array($bs7);
								   $slip7=$rbs7['slip'];
								  $rc7=$q7['status'];
								   ?>
								   <tr style="<?php if($rc7=='occupied'){ echo "color:#FFF;background-color:#f00;";}else{echo "color:#FFF;background-color:#0f0;";}?>"><td><?php echo $sr7; ?></td><td><?php echo $q7['room_no']; ?></td><td><?php echo $q7['bed_no']; ?></td><td><?php echo $q7['room_type']; ?></td><td><?php echo $q7['room_charge']; ?></td><td><?php if($q7['status']=='occupied'){echo $q7['curr_guest'];} else{echo " ";} ?></td><td><?php if($q7['status']=='occupied'){echo $q7['arrival'];} else{echo " ";}  ?></td><td><?php echo $slip7; ?></td><td><?php echo $q7['status']; ?></td></tr>
								   <?php
								  $sr7++; }
								   ?></table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="h">
                                 <table width="100%"><tr><th>Sr</th><th>Room</th><th>Bed</th><th>Type</th><th>Charges</th><th>Guest</th><th>Arrival</th><th>Slip</th><th>Status</th></tr>
                                   <?php 
								   $sr8=1;
								   $qq8="select * from `rooms` where `room_no`='303';";
								   $r8=mysqli_query($con,$qq8);
								   while($q8=mysqli_fetch_array($r8))
								   {
								   $bk8=$q8['bookingid'];
								   $bss8="select * from `cash` where `bookingid`='$bk8';";
								   $bs8=mysqli_query($con,$bss8);
								   $rbss8=mysqli_fetch_array($bs8);
								   $slip8=$rbss8['slip'];
								   $rc8=$q8['status'];
								   ?>
								   <tr style="<?php if($rc8=='occupied'){ echo "color:#FFF;background-color:#f00;";}else{echo "color:#FFF;background-color:#0f0;";}?>"><td><?php echo $sr8; ?></td><td><?php echo $q8['room_no']; ?></td><td><?php echo $q8['bed_no']; ?></td><td><?php echo $q8['room_type']; ?></td><td><?php echo $q8['room_charge']; ?></td><td><?php if($q8['status']=='occupied'){echo $q8['curr_guest'];} else{echo " ";}  ?></td><td><?php if($q8['status']=='occupied'){echo $q8['arrival'];} else{echo " ";}  ?></td><td><?php echo $slip8; ?></td><td><?php echo $q8['status']; ?></td></tr>
								   <?php
								  $sr8++; }
								   ?></table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="i">
                                  <table width="100%"><tr><th>Sr</th><th>Room</th><th>Bed</th><th>Type</th><th>Charges</th><th>Guest</th><th>Arrival</th><th>Slip</th><th>Status</th></tr>
                                   <?php 
								   $sr9=1;
								   $qq9="select * from `rooms` where `room_no`='304';";
								   $r9=mysqli_query($con,$qq9);
								   while($q9=mysqli_fetch_array($r9))
								   {
								   $bk9=$q9['bookingid'];
								   $bss9="select * from `cash` where `bookingid`='$bk9';";
								   $bs9=mysqli_query($con,$bss9);
								   $rbss9=mysqli_fetch_array($bs9);
								   $slip9=$rbss9['slip'];
								  $rc9=$q9['status'];
								   ?>
								   <tr style="<?php if($rc9=='occupied'){ echo "color:#FFF;background-color:#f00;";}else{echo "color:#FFF;background-color:#0f0;";}?>"><td><?php echo $sr9; ?></td><td><?php echo $q9['room_no']; ?></td><td><?php echo $q9['bed_no']; ?></td><td><?php echo $q9['room_type']; ?></td><td><?php echo $q9['room_charge']; ?></td><td><?php if($q9['status']=='occupied'){echo $q9['curr_guest'];} else{echo " ";}  ?></td><td><?php if($q9['status']=='occupied'){echo $q9['arrival'];} else{echo " ";}  ?></td><td><?php echo $slip9; ?></td><td><?php echo $q9['status']; ?></td></tr>
								   <?php
								  $sr9++; }
								   ?></table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="j">
                                    <table width="100%"><tr><th>Sr</th><th>Room</th><th>Bed</th><th>Type</th><th>Charges</th><th>Guest</th><th>Arrival</th><th>Slip</th><th>Status</th></tr>
                                   <?php 
								   $sr10=1;
								   $qq10="select * from `rooms` where `room_no`  between 200 and 300 and `bed_no`= 1 ;";
								   $r10=mysqli_query($con,$qq10);
								   while($q10=mysqli_fetch_array($r10))
								   {
								   $bk10=$q10['bookingid'];
								   $bss10="select * from `cash` where `bookingid`='$bk10';";
								   $bs10=mysqli_query($con,$bss10);
								   $rbss10=mysqli_fetch_array($bs10);
								   $slip10=$rbss10['slip'];
								   $rc10=$q10['status'];
								   ?>
								   <tr style="<?php if($rc10=='occupied'){ echo "color:#FFF;background-color:#f00;";}else{echo "color:#FFF;background-color:#0f0;";}?>"><td><?php echo $sr10; ?></td><td><?php echo $q10['room_no']; ?></td><td><?php echo $q10['bed_no']; ?></td><td><?php echo $q10['room_type']; ?></td><td><?php echo $q10['room_charge']; ?></td><td><?php if($q10['status']=='occupied'){echo $q10['curr_guest'];} else{echo " ";}  ?></td><td><?php if($q10['status']=='occupied'){echo $q10['arrival'];} else{echo " ";} ?></td></td><td><?php echo $slip10; ?></td><td><?php echo $q10['status']; ?></td></tr>
								   <?php
								  $sr10++; }
								   ?></table>
                                </div>
                        </div>  
						<?php  // Code Ends Here/////  ?>
                        </div></div></div>
                        <div class="col-lg-4"> 
                        <div class="card">
                        <div class="body">
                            <h2><center>Change Status</center></h2>
                          <form method="post" action="roomstatus.php">
							<table>
							<tr><td width="35%">Room No:<br></td><td><select name="room"><option value="0">Select Room</option>
							<?php
							$serr="select * from `rooms` where `bed_no`='1';";
							$srh=mysqli_query($con,$serr);
							while($sroom=mysqli_fetch_array($srh))
							{
							?>
							<option value="<?php echo $sroom['room_no']; ?>"><?php echo $sroom['room_no']; ?></option>
							<?php }
							?>
							</select></td></tr>
							<tr><td>Bed No:<br></td><td><select name="bed"><option value="0">Select Bed</option>
							<?php
							$are=1;
							while($are<40)
							{
							?>
							<option value="<?php echo $are; ?>"><?php echo $are; ?></option>
							<?php $are++; }
							?>
							</select></td></tr>
							
							<tr><td>Status:<br></td><td><select name="status"><option value="0">Select Status</option>
							
							<option value="occupied">Occupied</option>
							
							<option value="vacant">Vacant</option>
							
							</select></td></tr>
							<tr><td colspan=2><br><input type="submit" name="change" value="Change Status"></td></tr>
							</table>

						  </form>
                          
                            
                        </div></div></div>
                        
                   </div></div></div>
            
</section>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="assets/bundles/mainscripts.bundle.js"></script>
</body>
</html>