<?php
include('lcheck.php');

if(isset($_POST['saveuser']))
{ 

	
$dp=$_FILES['dp'];
if ( $dp['error']==0)
{
$temp = explode(".", $_FILES["dp"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
$src=$dp['tmp_name'];
$tgt="images/guest/".$newfilename;
move_uploaded_file($src,$tgt) or die ("file not uploaded");
}

$dp2=$_FILES['dp2'];
if ( $dp2['error']==0)
{
$src2=$dp2['tmp_name'];
$tgt2="images/guest/".$dp2['name'];
move_uploaded_file($src2,$tgt2) or die ("file not uploaded");
}
foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}
		
		if($id_type=='Aadhaar')
			{
				$qur="INSERT INTO `guests` (`ssid`, `guestname`, `fnwo`, `photo`, `mobile`, `mobile2`, `address`, `id_type`, `id_number`, `aadhaar`, `driving`, `voterid`, `govt_id`, `passport`, `other_id`, `regdate`) VALUES (NULL,'$name','$fnwo', '$tgt', '$mobile', '$mobile2', '$address', '$id_type', '$id_number','$id_number','','','','','', CURRENT_TIMESTAMP);";
			}
			else if($id_type=='driving-licence')
			{
				$qur="INSERT INTO `guests` (`ssid`, `guestname`, `fnwo`, `photo`, `mobile`, `mobile2`, `address`, `id_type`, `id_number`, `aadhaar`, `driving`, `voterid`, `govt_id`, `passport`, `other_id`, `regdate`) VALUES (NULL,'$name','$fnwo', '$tgt', '$mobile', '$mobile2', '$address', '$id_type', '$id_number','','$id_number','','','','', CURRENT_TIMESTAMP);";
			}
						else if($id_type=='voter-card')
			{
				$qur="INSERT INTO `guests` (`ssid`, `guestname`, `fnwo`, `photo`, `mobile`, `mobile2`, `address`, `id_type`, `id_number`, `aadhaar`, `driving`, `voterid`, `govt_id`, `passport`, `other_id`, `regdate`) VALUES (NULL,'$name','$fnwo', '$tgt', '$mobile', '$mobile2', '$address', '$id_type', '$id_number','','','$id_number','','','', CURRENT_TIMESTAMP);";
			}
						else if($id_type=='passport')
			{
				$qur="INSERT INTO `guests` (`ssid`, `guestname`, `fnwo`, `photo`, `mobile`, `mobile2`, `address`, `id_type`, `id_number`, `aadhaar`, `driving`, `voterid`, `govt_id`, `passport`, `other_id`, `regdate`) VALUES (NULL,'$name','$fnwo', '$tgt', '$mobile', '$mobile2', '$address', '$id_type', '$id_number','','','','','$id_number','', CURRENT_TIMESTAMP);";
			}
						else if($id_type=='gov')
			{
				$qur="INSERT INTO `guests` (`ssid`, `guestname`, `fnwo`, `photo`, `mobile`, `mobile2`, `address`, `id_type`, `id_number`, `aadhaar`, `driving`, `voterid`, `govt_id`, `passport`, `other_id`, `regdate`) VALUES (NULL,'$name','$fnwo', '$tgt', '$mobile', '$mobile2', '$address', '$id_type', '$id_number','','','','$id_number','','', CURRENT_TIMESTAMP);";
			}
						else if($id_type=='other')
			{
				$qur="INSERT INTO `guests` (`ssid`, `guestname`, `fnwo`, `photo`, `mobile`, `mobile2`, `address`, `id_type`, `id_number`, `aadhaar`, `driving`, `voterid`, `govt_id`, `passport`, `other_id`, `regdate`) VALUES (NULL,'$name','$fnwo', '$tgt', '$mobile', '$mobile2', '$address', '$id_type', '$id_number','','','','','','$id_number', CURRENT_TIMESTAMP);";
			}
	




if($id_type2=='Aadhaar')
			{
			$qur2="INSERT INTO `guests` (`ssid`,`guestname`,`fnwo`, `photo`, `mobile`, `mobile2`, `address`, `id_type`, `id_number`,`regdate`) VALUES (NULL,'$name2','$fnwo2', '$tgt2', '$mobile2', '$amobile2', '$address2', '$id_type2', '$id_number2', CURRENT_TIMESTAMP);";
			
				$qur2="INSERT INTO `guests` (`ssid`, `guestname`, `fnwo`, `photo`, `mobile`, `mobile2`, `address`, `id_type`, `id_number`, `aadhaar`, `driving`, `voterid`, `govt_id`, `passport`, `other_id`, `regdate`) VALUES (NULL,'$name2','$fnwo2', '$tgt2', '$mobile2', '$amobile2', '$address2', '$id_type2', '$id_number2','$id_number2','','','','','', CURRENT_TIMESTAMP);";
			}
			else if($id_type2=='driving-licence')
			{
				$qur2="INSERT INTO `guests` (`ssid`, `guestname`, `fnwo`, `photo`, `mobile`, `mobile2`, `address`, `id_type`, `id_number`, `aadhaar`, `driving`, `voterid`, `govt_id`, `passport`, `other_id`, `regdate`) VALUES (NULL,'$name2','$fnwo2', '$tgt2', '$mobile2', '$amobile2', '$address2', '$id_type2', '$id_number2','','','$id_number2','','','', CURRENT_TIMESTAMP);";
			}
						else if($id_type2=='voter-card')
			{
				$qur2="INSERT INTO `guests` (`ssid`, `guestname`, `fnwo`, `photo`, `mobile`, `mobile2`, `address`, `id_type`, `id_number`, `aadhaar`, `driving`, `voterid`, `govt_id`, `passport`, `other_id`, `regdate`) VALUES (NULL,'$name2','$fnwo2', '$tgt2', '$mobile2', '$amobile2', '$address2', '$id_type2', '$id_number2','','$id_number2','','','','', CURRENT_TIMESTAMP);";
			}
						else if($id_type2=='passport')
			{
				$qur2="INSERT INTO `guests` (`ssid`, `guestname`, `fnwo`, `photo`, `mobile`, `mobile2`, `address`, `id_type`, `id_number`, `aadhaar`, `driving`, `voterid`, `govt_id`, `passport`, `other_id`, `regdate`) VALUES (NULL,'$name2','$fnwo2', '$tgt2', '$mobile2', '$amobile2', '$address2', '$id_type2', '$id_number2','','','','','$id_number2','', CURRENT_TIMESTAMP);";
			}
						else if($id_type2=='gov')
			{
				$qur2="INSERT INTO `guests` (`ssid`, `guestname`, `fnwo`, `photo`, `mobile`, `mobile2`, `address`, `id_type`, `id_number`, `aadhaar`, `driving`, `voterid`, `govt_id`, `passport`, `other_id`, `regdate`) VALUES (NULL,'$name2','$fnwo2', '$tgt2', '$mobile2', '$amobile2', '$address2', '$id_type2', '$id_number2','','','','$id_number2','','', CURRENT_TIMESTAMP);";
			}
						else if($id_type2=='other')
			{
				$qur2="INSERT INTO `guests` (`ssid`, `guestname`, `fnwo`, `photo`, `mobile`, `mobile2`, `address`, `id_type`, `id_number`, `aadhaar`, `driving`, `voterid`, `govt_id`, `passport`, `other_id`, `regdate`) VALUES (NULL,'$name2','$fnwo2', '$tgt2', '$mobile2', '$amobile2', '$address2', '$id_type2', '$id_number2','','','','','','$id_number2', CURRENT_TIMESTAMP);";
			}


	
		
		
		
$mch="select * from `guests` where `id_number`='$id_number'  ORDER BY `ssid` DESC LIMIT 1;";
		$mch2="select * from `guests` where `mobile`='$mobile'  ORDER BY `ssid` DESC LIMIT 1;";
		$mc2=mysqli_query($con, $mch2);
		$mc=mysqli_query($con, $mch);
		if($rmc=mysqli_fetch_array($mc))
			{echo "<script> alert('Sorry This Member Already Exist In Our Database!!!!Please Check ID Number'); window.location.href='checkin.php';  </script>";}
		else if($rmc2=mysqli_fetch_array($mc2))
			{echo "<script> alert('Sorry This Member Already Exist In Our Database!!!!Please Check Mobile Number'); window.location.href='checkin.php';  </script>";}		
		
		
		else{
		
		mysqli_query($con,$qur);
		mysqli_query($con,$qur2); }
	echo "<script>window.location.href = 'roomcheckin.php?aid=".$id_number."&sid=".$id_number2."';</script>";
		
}


?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Room Check-In</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
						<form class="form-horizontal style-form" method="get" action="roomcheckin.php">
          
          	<!-- BASIC FORM ELELEMNTS -->
			<div class="row mt" style="background-color:#002;color:#fff;">
          		<div class="col-lg-12">
				<center>
				
				<table>
				    <tr style="color:#FFF;"><td>Fill By ID No:</td><td><input type="text" name="aid"  class="form-control"></td><td>Fill By Phone:</td><td> <input type="text" name="phone" maxlength="12" class="form-control"></td><td><input type="submit" name="searchuser" Value="Search" class="btn btn-round btn-default"/></td></tr>
				</table>
				
				</center>
				</div>
			</div></form>
			
			
			
			
			
			
			
			
			
          	<div class="row mt">
          		<div class="col-lg-6">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Attendant 1</h4>
                      <form class="form-horizontal style-form" method="post" action="roomcheckin.php" enctype="multipart/form-data">
                          
						
                          <div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Attendant Name:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="name" class="form-control">
                              </div>
                          </div>
                          	
                          <div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Father/Husband Name:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="fnwo" class="form-control">
                              </div>
                          </div>
                          	
                          	<div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Mobile:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="mobile" maxlength="10" class="form-control">
                              </div>
                          </div> 
				<div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Mobile 2:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="amobile" maxlength="10" class="form-control">
                              </div>
                          </div> 
						  		  
						  <div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Address:</label>
                              <div class="col-sm-8">
                                  <textarea name="address" class="form-control"></textarea>
                              </div>
                          </div>
				<div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Id Proof Type:</label>
                              <div class="col-sm-8">
                                  <select name="id_type"  class="form-control show-tick" data-live-search="true">
								  <option Value="Aadhaar">Aadhaar Card</option>
								  <option Value="driving-licence">Driving Licence</option>
									<option Value="voter-card">Voter Card</option>
									<option Value="passport">Passport</option>
									<option Value="gov">Govt ID</option>
									<option Value="other">Other</option>
									</select>
                              </div>
                          </div>
							<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Id No:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="id_number" class="form-control">
                              </div>
                          </div>
				
				
				<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Photo:</label>
                              <div class="col-sm-8">
                                  <input type="file" name="dp" class="form-control" accept="image/*">
                              </div>
                          </div>		  
						
						
						
						
						<h4 class="mb"><i class="fa fa-angle-right"></i> Attendant 2</h4>
                      
                          <div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Attendant Name:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="name2" class="form-control">
                              </div>
                          </div>
                          	
                          <div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Father/Husband Name:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="fnwo2" class="form-control">
                              </div>
                          </div>
                          	
                          	<div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Mobile:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="mobile2" maxlength="10" class="form-control">
                              </div>
                          </div> 
				<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Mobile 2:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="amobile2" maxlength="10" class="form-control">
                              </div>
                          </div> 
						  		  
						  <div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Address:</label>
                              <div class="col-sm-8">
                                  <textarea name="address2" class="form-control"></textarea>
                              </div>
                          </div>
				<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Id Proof Type:</label>
                              <div class="col-sm-8">
                                  <select name="id_type2"  class="form-control show-tick" data-live-search="true">
								  <option Value="Aadhaar">Aadhaar Card</option>
								  <option Value="driving-licence">Driving Licence</option>
									<option Value="voter-card">Voter Card</option>
									<option Value="passport">Passport</option>
									<option Value="gov">Govt ID</option>
									
									</select>
                              </div>
                          </div>
							<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Id No:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="id_number2" class="form-control">
                              </div>
                          </div>
				
				
				<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Photo:</label>
                              <div class="col-sm-8">
                                  <input type="file" name="dp2" class="form-control" accept="image/*">
                              </div>
                          </div>		  
						  <div class="row mt">
                              
							  <div class="col-sm-6 text-center">
                                  <input type="submit" name="saveuser" class="btn btn-round btn-default"/>
                              </div>
                          </div>
						
						
						
						
						
						
						
						
                      </form>
                  </div>
          		</div><!-- col-lg-6--> 



				
          		<div class="col-lg-6">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Check-In Form</h4>
                      <form class="form-horizontal style-form" method="post" action="checksave.php">
                        <?php //if(isset($_GET[]))
							if (empty($_GET)) {
								echo '<h3>Checkin Form Will Automaticaly Fill By The System.<br><br> You Just Need To Search An Attendat By Phone Number Or ID Number Like-Aadhaar No/ Voter No/ Gov ID No etc</h3>';
							}
							else
						  {   $ss=$_GET['phone']; $idd=$_GET['aid'];$idd2=$_GET['sid'];
							  if($_GET['aid']!="")
							  {
							  $tr="select * from `guests` where `id_number`='$idd'  ORDER BY `ssid` DESC LIMIT 1;";
							  }
							  
							  if($_GET['phone']!="")
							  {
								$tr="select * from `guests` where `mobile`='$ss' ORDER BY `ssid` DESC LIMIT 1;";
							  }
							   if($_GET['sid']!="")
							  {
							 $tr2="select * from `guests` where `id_number`='$idd2' ORDER BY `ssid` DESC LIMIT 1;";
							 $rrr2=mysqli_query($con,$tr2);
							 $xr=mysqli_fetch_array($rrr2);
							  $des=date('Y',time());                          
    ?> <input type="hidden"  required  name="id_number2"  value="<?php echo $xr['ssid'];?>" class="form-control">
    <input type="hidden"  required  name="id_type2"  value="<?php echo $xr['id_type'];?>" class="form-control">  
<input type="hidden" required   name="sec_att"  value="<?php echo $xr['ssid'];?>" class="form-control">	
    <input type="hidden"  required  name="sec_mobile"  value="<?php echo $xr['mobile'];?>" class="form-control">
    <input type="hidden"  required  name="fnwo2"  value="<?php echo $xr['fnwo'];?>" class="form-control">
    <input type="hidden"  required  name="photo2"  value="<?php echo $xr['photo'];?>" class="form-control">    
     <input type="hidden"  required  name="name2"  value="<?php echo $xr['guestname'];?>" class="form-control">  <?php  
							  }
							 
							 
							$rrr=mysqli_query($con,$tr);
							if($rss=mysqli_fetch_array($rrr))
							{
						 ?>  
						 
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Room No:</label>
                              <div class="col-sm-10">
                                  <select name="roomno" required onchange="getValue(this)"  class="form-control show-tick" data-live-search="true">
								  <option value="Not Selected">Select A Room</option>
								  <?php  $qi="select * from `rooms`  where `room_no` <> '100' and`room_no` <> '200' and`room_no` <> '300' and `bed_no` ='1' and `status`='vacant' group by `room_no`;";
								   
					  $rri=mysqli_query($con,$qi);
					  while($rsi=mysqli_fetch_array($rri))
					  {
					  ?>
		 <option Value="<?php echo $rsi['room_no']; ?>" 
		 
		 <?php if($_GET['room']==$rsi['room_no']){ echo "selected";}?>><?php echo $rsi['room_no']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rsi['room_type']; ?></option>';
					  <?php } 
					    
					  ?> 
					  </select>
                              </div>
                          </div>
						  <script>
					  function getValue(obj){
						  var dt=obj.value;
						  var newURL =document.URL+ "&room=" +dt;
						  window.location.href = newURL;
						  
					  }</script>
					  
						  <?php 
						  echo $drt="<script>document.getElementByID('rm').value;</script>";
						   
						   echo "<input type='hidden' name='bedno' value='1'>";
						  
						   ?> 
					<div class="form-group"><?php $de=date('Y',time());?>
                              <label class="col-sm-4 col-sm-4 control-label">SSID :</label>
                              <div class="col-sm-8">
                                  <input type="text"  required  name="ssid" value="<?php echo $rss['ssid']; ?>" readonly="readonly" required class="form-control">
                              </div>
                          </div>
						 
						<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Patient Name:</label>
                              <div class="col-sm-8">
                                  <input type="text"  required  name="pname" required  class="form-control">
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Admittion Date:</label>
                              <div class="col-sm-8">
                                  <input type="date" required  name="admdate" required  class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">MRD NO / Adm No:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="mrd" required  class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Attendant Name:</label>
                              <div class="col-sm-8">
    <input type="text" name="name" value="<?php echo $rss['guestname']; ?>" readonly="readonly"  class="form-control">
                              </div>
                          </div>
                          	<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Father/Husband Name:</label>
                              <div class="col-sm-8">
    <input type="text" name="fnwo" value="<?php echo $rss['fnwo']; ?>" readonly="readonly"  class="form-control">
                              </div>
                          </div>
                         
                          	<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Mobile:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="mobile" readonly="readonly"  value="<?php echo $rss['mobile']; ?>" class="form-control">
                              </div>
                          </div> 
				<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Mobile 2:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="mobile2" readonly="readonly"  value="<?php echo $rss['mobile2']; ?>" class="form-control">
                              </div>
                          </div> 
						  		  
						  <div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Address:</label>
                              <div class="col-sm-8">
                                  <textarea name="address" class="form-control"><?php echo $rss['address']; ?></textarea>
                              </div>
                          </div>
				<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Id Proof Type:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="id_type" readonly="readonly"  value="<?php echo $rss['id_type']; ?>" class="form-control">
                              </div>
                          </div> 
				
							<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Id No:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="id_number" readonly="readonly"  value="<?php echo $rss['id_number']; ?>" class="form-control">
                              </div>
                          </div>
				
				
				<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Photo:</label>
                              <div class="col-sm-8">
                                  <img src="<?php echo $rss['photo']; ?>" height="150px" width="auto">
                              </div>
                          </div>
						  
				<div class="form-group"> <?php  $srn=$_GET['room'];
								 $rqy="select * from `rooms` where `room_no`='$srn'  and `bed_no`='1';";
								 $aqy=mysqli_query($con,$rqy) or die(mysqli_error());
			  
								$sbal=mysqli_fetch_array($aqy);
								 
								 ?>
                              <label class="col-sm-4 col-sm-4 control-label">Security:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="advance"  <?php if($_SESSION['type']=='admin'){ echo " "; }else { echo "readonly=readonly";}?> value="<?php $roomrents=$sbal['room_charge']; $fnlsec=$roomrents*$chkvalidity; echo $fnlsec;?>" required class="form-control">
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Print:</label>
                              <div class="col-sm-8">
                    <select name="type" required  class="form-control show-tick" data-live-search="true"><option value="all">All</option><option value="withoutpass">Without Pass</option></select> 
                              </div>
                          </div>
<!-- Hidden Variables Start--> 
<?php 
$tim=$rss['regdate'];
$tv=strtotime($tim);

 $da = date("Y", $tv);
$de=date('Y',time());
					  

?>
<input type="hidden" name="ssid" value="<?php echo $rss['ssid']."/".$de; ?>">
<input type="hidden"  readonly name="bcharges" value="<?php echo $sbal['room_charge']; ?>">
<input type="hidden" name="photo" value="<?php echo $rss['photo']; ?>">
<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Registration Type:</label>
<div class="col-sm-8">
<label class="radio-inline">
<input type="radio" name="visit_type" required value="new">New</label>
    <label class="radio-inline">
      <input type="radio" name="visit_type" required  value="Renew">Renew
    </label>
    <label class="radio-inline">
      <input type="radio" name="visit_type" required value="Exchange">Exchange
    </label>
</div></div>

<input type="hidden" name="checkin_by" value="<?php echo $_SESSION['usr']; ?>">
<input type="hidden" name="store_status" value="pending">
<!-- Hidden Variables Close--> 						  
						  <div class="row mt">
                              
							  <div class="col-sm-6 text-center">
                                  <input type="submit" name="checkin" class="btn btn-round btn-default"/>
                              </div>
                          </div>
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