  <?php include('lcheck.php'); 
include("inc/config.php");
if(isset($_POST['submit']))
{
foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}
	$vt="update `rooms` set `room_charge`='$newrent', `room_type`='$rtype' where `room_no`='$room';";
	mysqli_query($con,$vt);
	echo "<script>alert('Room Rent Has Been Changed!');</script>";
}
$qr="select * from `rooms` group by `room_no`;";
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Change Room Rent</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
						 <?php
						  if(isset($_GET['room']))
{
	$rr=$_GET['room'];
	$qqq="select * from `rooms` where `room_no`='$rr';";
	$qrr=mysqli_query($con,$qqq);
	$qrt=mysqli_fetch_array($qrr);
	
?>
<form action="changerent.php" method="post">
<h3>Change The Rent For Room No: <?php echo $qrt['room_no']; ?></h3>
<table align="center" border=0 width="80%">
<tr>
<td>Current Rent</td><td><?php echo $qrt['room_charge']; ?></td><td>New Type</td><td>
<select name="rtype"  class="form-control show-tick" data-live-search="true">
						<option Value="NON-AC-HALL">NON AC HALL</option>
						<option Value="NON-AC-FAMILY">Non Ac Family Hall</option>
						<option Value="AC-HALL">AC HALL</option>
						<option Value="AC-HALL(FAMILY)">AC HALL(FAMILY)</option>
						<option Value="AC HALL(GENTS)">AC HALL(GENTS)</option>
						<option Value="PRIVATE-ROOM">PRIVATE ROOM</option>
											</select>
</td><td>New Rent</td><td><input type="text" name="newrent"><input type="hidden" name="room" value="<?php echo $qrt['room_no']; ?>"></td><td><input type="submit" name="submit" value="Change Rent"></td>
</tr>
 
</table>
</form>
<?php	
}
else
{
?>
						  
						  
						  
						  
						  <section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
									  <th>Sr:</th>
                                      <th class="numeric">Room No:</th>
                                      <th class="numeric">Room Type:</th>
                                      <th class="numeric">Room Rent:</th>
                                      <th>Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
						  
						  <?php 
	$rr=mysqli_query($con,$qr); $count=1;
		while ($rt=mysqli_fetch_array($rr))
		{
			?>
	
	
                                  
                                  <tr>
                                      <td data-title="SSID:"><?php echo $count; ?></td>
                                      <td data-title="Room No:"><?php echo $rt['room_no']; ?></td>
                                      <td class="numeric" data-title="Room Type:"><?php echo $rt['room_type']; ?></td>
                                      <td class="numeric" data-title="Room Rent:"><?php echo $rt['room_charge']; ?></td>
                                     
                                      <td data-title="Action:"><a href="changerent.php?room=<?php echo $rt['room_no'];?>"><input type="button" value ="Change Rent"></a></td>
                                  </tr>
                                  
		<?php $count++; } ?>



                                  </tbody>
                              </table>
                              <center>
<?php } ?> 
                              </center>
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