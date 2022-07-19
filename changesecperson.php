<?php 
include('lcheck.php');
if(isset($_POST['saveuser']))
{
		
$dp=$_FILES['dp'];
if ( $dp['error']==0)
{
$src=$dp['tmp_name'];
$tgt="images/guest/".$dp['name'];
move_uploaded_file($src,$tgt) or die ("file not uploaded");
}

foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}
echo "<br><br><br><br><br><br><br><br>";
		
		$qur="INSERT INTO `guests` (`ssid`,`guestname`,`fnwo`, `photo`, `mobile`, `mobile2`, `address`, `id_type`, `id_number`,`regdate`) VALUES (NULL,'$name','$fnwo', '$tgt', '$mobile', '$mobile2', '$address', '$id_type', '$id_number', CURRENT_TIMESTAMP);";
		mysqli_query($con,$qur);

$ch3="select * from `guests` where `id_number`='$id_number'  ORDER BY `ssid` DESC LIMIT 1;";
$chop=mysqli_query($con,$ch3);
$cs=mysqli_fetch_array($chop);
$myssid=$cs['ssid'];

	echo $ch="update `visits` set `guestname`='$name', `fnwo`='$fnwo', `mobile`='$mobile', `mobile2`='$mobile2', `id_type`='$id_type', `id_number`='$id_number',`photo`='$tgt', `ssid`='$myssid' where `room_no`='$roomno' and `bed_no`='2' and `bookingid`='$book';";
mysqli_query($con,$ch);

$ch2="update `visits` set `guest2`='$myssid' where `bookingid`='$book' and `bed_no`='1';";
mysqli_query($con,$ch2);
echo "<script>window.location.href = 'secpersonprint.php?booking=".$book."';</script>";
}


?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2> Change Second Person</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
				 <?php
					  
if(isset($_GET['booking']))
{ 
foreach($_GET as $k=>$v)
		{
			$$k=$v;
		}

$qrt="select * from `visits` where `room_no`='$room' and `bed_no`='2' and `bookingid`='$booking';";
$ztc=mysqli_query($con,$qrt);
$zmr=mysqli_fetch_array($ztc);
?>
<form action="changesecperson.php" method="post" enctype="multipart/form-data">
<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Attendant Name:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="name" value="<?php echo $zmr['guestname'];?>" class="form-control">
                              </div>
                          </div>
                          	
                          <div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Father/Husband Name:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="fnwo"  value="<?php echo $zmr['fnwo'];?>" class="form-control">
                              </div>
                          </div>
                          	
                          	<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Mobile:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="mobile"  value="<?php echo $zmr['mobile'];?>"  required  maxlength="10" class="form-control">
                              </div>
                          </div> 
				<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Mobile 2:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="mobile2" value="<?php echo $zmr['mobile2'];?>"  maxlength="10" class="form-control">
                              </div>
                          </div> 
						  		  
						  <div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Address:</label>
                              <div class="col-sm-8">
                                  <textarea name="address" class="form-control"> <?php echo $zmr['address'];?></textarea>
                              </div>
                          </div>
				<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Id Proof Type:</label>
                              <div class="col-sm-8">
                                  <select name="id_type" required  class="form-control">
								  <option Value="Aadhaar" <?php if($zmr['id_type']=="Aadhaar"){echo "selected"; }?>>Aadhaar Card</option>
								  <option Value="driving-licence" <?php if($zmr['id_type']=="driving-licence"){echo "selected"; }?>>Driving Licence</option>
									<option Value="voter-card" <?php if($zmr['id_type']=="voter-card"){echo "selected"; }?>>Voter Card</option>
									<option Value="passport" <?php if($zmr['id_type']=="passport"){echo "selected"; }?>>Passport</option>
									<option Value="gov" <?php if($zmr['id_type']=="gov"){echo "selected"; }?>>Govt ID</option>
									
									</select>
					<input type="hidden" name="book" value="<?php echo $_GET['booking']; ?>" >
				<input type="hidden" name="roomno" value="<?php echo $_GET['room']; ?>" >
                              </div>
                          </div>
							<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Id No:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="id_number" value=" <?php echo $zmr['id_number'];?>" required  class="form-control">
                              </div>
                          </div>
				
				
				<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Photo:</label>
                              <div class="col-sm-8">
                                  <input type="file" name="dp" class="form-control" accept="image/*">
                              </div>
                          </div>		  
						  <div class="row mt">
                              
							  <div class="col-sm-6 text-center">
                                  <input type="submit" name="saveuser" class="btn btn-round btn-default"/>
                              </div>
                          </div>						
</form>

<?php		
}else{
					  ?><div id="printableArea" style="width:100%;height:90%;">
                      <section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
									  <th>Sr:</th>
									  <th>Slip No:</th>
									  <th>Attendent Name:</th>
									  <th>Father Name-W/O:</th>
									  <th>Checkin Date:</th>
									  <th>Room No:</th>
									  <th>Bed No:</th>
									  <th>Mobile:</th>
                                      <th>Photo</th><th></th>
                                  </tr>
                                  </thead>
                                  <tbody>
					  <?php $count=1;
							$w="select * from `visits` where `room_no` between '100' and '400' and `bed_no`=2 and `checkout_date` IS NULL order by `room_no`;";
							$rr=mysqli_query($con,$w);$count=1;
							while ($rt=mysqli_fetch_array($rr))
							{
							    if ($rt['room_no'] == '100' || $rt['room_no'] == '200' || $rt['room_no'] == '300' || $rt['room_no'] == '400')
							    { 
							        
							    }
							    else
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
									 
									  <td data-title="Room No:"><?php echo $rt['room_no']; ?></td>
									  <td data-title="Bed No:"><?php echo $rt['bed_no']; ?></td>
                                      
                                     <td data-title="Mobile:"><?php echo $rt['mobile']; ?></td>
                                      <td data-title="Photo:"><img src="<?php echo $rt['photo']; ?>" height="100px" width=auto></td>
 <td><a href="changesecperson.php?booking=<?php echo $rt['bookingid'];?>&room=<?php echo $rt['room_no'];?>&bed=<?php echo $rt['bed_no'];?>"><input type="button" value="Change Guest"></a></td>
                                  </tr>
                      
									<?php  $count++; }
									} ?>
					  
					   </tbody>
</table><?php }?>
                  </div>
          		
<input type="button" onclick="printDiv('printableArea')" value="Print" /></div>
				
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