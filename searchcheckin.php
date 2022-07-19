<?php
include('lcheck.php');
 $srn=$_GET['room'];
 $rq="select * from `rooms` where `bed_no`='1'  and  `room_no`='$srn';";
 $rqi=mysqli_query($con,$rq);
 $iuyt=mysqli_fetch_array($rqi);
$rcharge=$iuyt['room_charge'];

?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Search Check-In</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<form class="form-horizontal style-form" method="get" action="searchcheckin.php">
          	<!-- BASIC FORM ELELEMNTS -->
			<div class="row mt">
          		<div class="col-lg-12">
				<center>
				
				<table>
				    <tr>
                          
						<td>Slip No:</td> <td><input type="text" name="slip" placeholder="Slip No"  class="form-control"></td>
                              <td>ID No:</td>
                                 <td> <input type="text" name="aid" placeholder="ID No"  class="form-control"></td>
                              </div>
							 <td>Phone:</td>
                                  <td><input type="text" name="phone" maxlength="12" placeholder="Mobile No"  class="form-control">
                              </td><td>
                                  <input type="submit" name="searchuser" Value="Search" class="btn btn-round btn-default"/></td></tr></table>
				
				</center>
				</div>
			</div></form>
			
			<?php 
			if(isset($_POST['save']))
{
	foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}
		
	

	if(isset($_FILES['my']))
	{
		$dpva=$_FILES['my'];
if ( $dpva['error']==0)
{
$src=$dpva['tmp_name'];
$tgt="images/guest/".$dpva['name'];
move_uploaded_file($src,$tgt) or die ("file not uploaded");
}

	}
		$x=substr($ssid, 0, -5);
		
		
 
if($puranaroom>200 && $puranaroom<300)
{
$rq2="select * from `rooms` where `status`='occupied' and `bed_no`='2' and  `room_no`='$puranaroom';";
$rqi2=mysqli_query($con,$rq2);
if($iuyt2=mysqli_fetch_array($rqi2))
	{
		$cguest=$iuyt2['curr_guest'];
		 $qwerty122="update `visits` set `guestname`='$cguest',`photo`='$tgt',`patient`='$pname', `mrd`='$mrd', `room_no`='$roomno', `bed_no`='2' ,`bed_charge`='0', `patient_adm_date`='$admdate' where `bookingid`='$book';"; 
		 $qwerty12="UPDATE `rooms` SET `curr_guest` = NULL ,`status`='vacant', `arrival` = NULL, `valid` = NULL, `bookingid` = NULL, `recipt` = '0', `gno` = '0' WHERE  `room_no` = '$puranaroom' and `bed_no` = '2' ;";
		  $qwertyss="update `visits` set `guestname`='$cguest',`patient`='$pname', `mrd`='$mrd', `room_no`='$roomno', `bed_no`='2' ,`bed_charge`='0', `patient_adm_date`='$admdate' where `bookingid`='$book' and `bed_no`='2';";

mysqli_query($con,$qwertyss);
		 mysqli_query($con,$qwerty122);
		mysqli_query($con,$qwerty12);
	}
}

 $qwerty="update `visits` set `guestname`='$name',`photo`='$tgt',`fnwo`='$parent' ,`patient`='$pname', `mrd`='$mrd', `room_no`='$roomno', `bed_no`='$bedno' ,`bed_charge`='$roomcharge', `patient_adm_date`='$admdate' where `bookingid`='$book';";
	$qwerty2="update `cash` set `name`='$name',  `room`='$roomno', `bed`='$bedno' where `bookinid`='$book';";
	 $qwerty3="update `guests` set `guestname`='$name', `fnwo`='$parent', `photo`='$tgt' where `ssid`='$x';";
	
	 $ru="UPDATE `rooms` SET `curr_guest` = '$name',`status`='occupied', `arrival` = '$chec', `valid` = '$rentime', `bookingid` = '$book', `recipt` = '0', `gno` = '0' WHERE  `room_no`='$roomno' and `bed_no`='$bedno';";
	 $qwerty4="UPDATE `rooms` SET `curr_guest` = NULL ,`status`='vacant', `arrival` = NULL, `valid` = NULL, `bookingid` = NULL, `recipt` = '0', `gno` = '0' WHERE  `room_no` = '$puranaroom' and `bed_no` = '$puranabed';";
	
	mysqli_query($con,$qwerty);
	mysqli_query($con,$qwerty2);
	mysqli_query($con,$qwerty3);
	mysqli_query($con,$ru);
	mysqli_query($con,$qwerty4);
	
	//echo "<script>alert('Record Updated..');window.location.href = document.referrer;</script>";
	
}
			
			?>
			
			
			
			
			
			
			
          	<div class="row mt">

          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i>Search Your Old Checkin Records</h4>
                    
                        <?php //if(isset($_GET[]))
							if (empty($_GET)) {
								echo '<h3>Please Provide The Search Criteria</h3>';
							}
							else
						  {   $ss=$_GET['phone']; $idd=$_GET['aid'];$ea=$fnyear."/".$_GET['slip'];
							  if($_GET['aid']!="")
							  {
							   $tr="select * from `visits` where `id_number`='$idd' limit=1 DESC;";
							  }
							  
							  if($_GET['phone']!="")
							  {
								 $tr="select * from `visits` where `mobile`='$ss' order BY `rcpt`  limit=1 DESC;";
							  }
							  
							  if($_GET['slip']!="")
							  {
								$trs="select * from `cash` where `slip`='$ea';";
								 $rtes=mysqli_query($con,$trs);
								 $xrt=mysqli_fetch_array($rtes);
								 $xbk=$xrt['bookinid'];
								 $tr="select * from `visits` where `bookingid`='$xbk';";
							  }
							  
							 
							 
							$rrr=mysqli_query($con,$tr);
							if($rss=mysqli_fetch_array($rrr))
							{
						 ?> 
						 <form class="form-horizontal style-form" method="post" action="searchcheckin.php">
<table class="table table-bordered table-striped table-condensed cf">
<tr>
<th>Attendant Name:</th>
<th class="numeric">Father/Husband:</th>
<th class="numeric">SSID:</th>
<th><input type="file" name="my" class="form-control" accept="image/*"></th>
</tr>
<tr>	
<td data-title="Attendant Name:"><input type="text" name="name" value="<?php echo $rss['guestname']; ?>"></td>
<td data-title="Father/Husband:"><input type="text" name="parent" value="<?php echo $rss['fnwo']; ?>"></td>
<td data-title="SSID:"><input type="text" name="ssid" value="<?php echo $rss['ssid'];?>" readonly></td>

<td rowspan="3"><img src="<?php echo $rss['photo']; ?>" height="150px" width="auto"><br>
Phone: <?php echo $rss['mobile']; ?></td>
</tr>
<tr>
 <th>Patient Name:</th>
<th class="numeric">MRD No/ Adm No:</th>
<th class="numeric">Admitted On:</th>
</tr>
<tr>
<td data-title="Patient Name:"><input type="text" name="pname" value="<?php echo $rss['patient']; ?>"></td>
<td data-title="MRD No/ Adm No:">
<input type="text" name="mrd" value="<?php echo $rss['mrd'];?>"></td>
<td data-title="Admitted On:"><input type="date" name="admdate" value="<?php echo $rss['patient_adm_date']; ?>"></td>
</tr>

<th class="numeric">Room No:</th>
<th class="numeric">Bed No:</th>
<th>Checkin Date:</th>
<th class="numeric">Checkout Date:</th>
</tr>
<tr>
<td data-title="Room No:">
Selected Room: <?php echo $rss['room_no']; ?>
<input type="hidden" name="puranaroom" value="<?php echo $rss['room_no']; ?>">
<input type="hidden" name="puranabed" value="<?php echo $rss['bed_no']; ?>">
<input type="hidden" name="book" value="<?php echo $rss['bookingid'];?>">
<input type="hidden" name="puraniphoto" value="<?php echo $rss['photo'];?>">
<input type="hidden" name="rentime" value="<?php echo $rss['ren_date'];?>">
<input type="hidden" name="chec" value="<?php echo $rss['checkin_date'];?>">
<select name="roomno" required onchange="getValue(this)"  class="form-control show-tick" data-live-search="true">
<option value="Not Selected" selected=selected>Select New Room</option>
<?php if($rss['room_no']=="Not Selected" || $rss['room_no']=="0"){$rtype=" "; } elseif($rss['room_no']>200 && $rss['room_no']<300){$rtype="where `room_no` between 200 and 300"; } else {$rtype="where `room_no` not between 200 and 300";}  $qi="select * from `rooms` $rtype group by `room_no`;";
					  $rri=mysqli_query($con,$qi);
					  while($rsi=mysqli_fetch_array($rri))
					  {
					  ?>
		 <option Value="<?php echo $rsi['room_no']; ?>" <?php if(isset($_GET['room'])){ if($_GET['room']==$rsi['room_no']){ echo "selected";}} ?> ><?php echo $rsi['room_no']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rsi['room_type']; ?></option>';
					  <?php } 
					    
					  ?> 
					  </select>
<script>
function getValue(obj){
var dt=obj.value;
var newURL =document.URL+ "&room=" +dt;
window.location.href = newURL;
}</script>

</td>
<td data-title="Bed No:">
Selected Bed: <?php echo $obd=$rss['bed_no']; ?>
<select style="width:22px; padding:0px;margin:0px;" name="bedno" required  class="form-control">
	<option value="Not Selected" selected=selected>Select New Bed</option>							  
								  <?php 
								$srn=$_GET['room'];
								$rq="select * from `rooms` where  `room_no`='$srn' and  `status`='vacant' or `bed_no`='$obd' group by `bed_no`;";
								 
									 $rqi=mysqli_query($con,$rq);
									 
					  while($rsq=mysqli_fetch_array($rqi))
					  {
					  ?>
		 <option Value="<?php echo $rsq['bed_no']; ?>">
		 <?php echo $rsq['bed_no']; ?></option>';
					  <?php } 
					    
					  ?>
									</select>
<input type="text" name="roomcharge" value="<?php if(isset($_GET['room'])){ echo  $rcharge;  } else{ echo $rss['bed_charge'];} ?>">
</td>
<td data-title="Checkin Date:"><?php echo date('d/m/Y @ h:i:sa',$rss['checkin_date']); ?></td>
<td data-title="Checkout Date:"><?php if(isset($rss['checkout_date'])){echo date('d/m/Y @ h:i:sa',$rss['checkout_date']);} else { echo "Not Yet";} ?></td>
</tr>
<tr>
 <th>Booking ID:</th>
<th class="numeric">Visit Type:</th>
<th rowspan=2 colspan=2><?php if(isset($_GET['room'])){?><input type="submit" name="save" Value="Update Record" class="btn btn-round btn-default"/><?php } ?>
<a href="print.php?booking=<?php echo $rss['bookingid'];?>&type=all&sid=<?php echo $rss['guest2']; ?>"><input type="button" Value="Print All" class="btn btn-round btn-default"/></a>
<a href="print.php?booking=<?php echo $rss['bookingid'];?>&type=pass&sid=<?php echo $rss['guest2']; ?>"><input type="button" Value="Print Pass" class="btn btn-round btn-default"/></a></th>
</tr>
<tr>
<td data-title="Booking No:"><?php echo $rss['bookingid']; ?></td>
<td data-title="Visit Type:"><?php echo $rss['visit_type']; ?></td>
</tr>
</table>
		</form>				
						  <?php }else{echo "Invalid ID or Phone Number.."; }} ?>
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	
			
			
			

			
			</div><!-- /row -->
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