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
$mch="select * from `guests` where `id_number`='$id_number';";
		$mch2="select * from `guests` where `mobile`='$mobile';";
		$mc2=mysqli_query($con, $mch2);
		$mc=mysqli_query($con, $mch);
		if($rmc=mysqli_fetch_array($mc))
			{echo "<script> alert('Sorry This Member Already Exist In Our Database!!!!Please Check ID Number'); window.location.href='checkin.php';  </script>";}
		else if($rmc2=mysqli_fetch_array($mc2))
			{echo "<script> alert('Sorry This Member Already Exist In Our Database!!!!Please Check Mobile Number'); window.location.href='checkin.php';  </script>";}
		else{
		 $qur="INSERT INTO `guests` (`ssid`,`guestname`,`fnwo`, `photo`, `mobile`, `mobile2`, `address`, `id_type`, `id_number`,`regdate`) VALUES (NULL,'$name','$fnwo', '$tgt', '$mobile', '$mobile2', '$address', '$id_type', '$id_number', CURRENT_TIMESTAMP);";
		mysqli_query($con,$qur);}	
	echo "<script>window.location.href = 'extra.php?aid=".$id_number."';</script>";	
}
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Issue Second Person</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					
					
				<form class="form-horizontal style-form" method="get" action="extra.php">
          	<!-- BASIC FORM ELELEMNTS -->
			<div class="row mt" >
          		<div class="col-lg-12">
				<center>
								<table>
				    <tr><td>Fill By ID No:</td><td><input type="text" name="aid"  class="form-control"></td><td>Fill By Phone:</td><td> <input type="text" name="phone" maxlength="12" class="form-control"></td><td><input type="submit" name="searchuser" Value="Search" class="btn btn-round btn-default"/></td></tr>
				</table>
				
				</center>
				</div>
			</div></form>
			
			
			
			
			
			
			
			
			
          	<div class="row mt">
          		<div class="col-lg-6">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Add Extra Persons To Room</h4>
                      <form class="form-horizontal style-form" method="post" action="extra.php" enctype="multipart/form-data">
                          
						
                          <div class="form-group">
                              <label class="col-sm-8 col-sm-8  control-label">Attendant Name:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="name" class="form-control">
                              </div>
                          </div>
                          	
                          <div class="form-group">
                              <label class="col-sm-8  col-sm-8  control-label">Father/Husband Name:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="fnwo" class="form-control">
                              </div>
                          </div>
                          	
                          	<div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Mobile:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="mobile"  required  maxlength="10" class="form-control">
                              </div>
                          </div> 
				<div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Mobile 2:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="mobile2" maxlength="10" class="form-control">
                              </div>
                          </div> 
						  		  
						  <div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Address:</label>
                              <div class="col-sm-8">
                                  <textarea name="address" class="form-control"></textarea>
                              </div>
                          </div>
				<div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Id Proof Type:</label>
                              <div class="col-sm-8">
                                  <select name="id_type" required   class="form-control show-tick" data-live-search="true">
								  <option Value="Aadhaar">Aadhaar Card</option>
								  <option Value="driving-licence">Driving Licence</option>
									<option Value="voter-card">Voter Card</option>
									<option Value="passport">Passport</option>
									<option Value="gov">Govt ID</option>
									
									</select>
                              </div>
                          </div>
							<div class="form-group">
                              <label class="col-sm-8 col-sm-8  control-label">Id No:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="id_number" required  class="form-control">
                              </div>
                          </div>
				
				
				<div class="form-group">
                              <label class="col-sm-8  col-sm-8 control-label">Photo:</label>
                              <div class="col-sm-8">
                                  <input type="file" name="dp" class="form-control" accept="image/*">
                              </div>
                          </div>		  
						  <div class="row mt">
                              
							  <div class="col-sm-8  text-center">
                                  <input type="submit" name="saveuser" class="btn btn-round btn-default"/>
                              </div>
                          </div>
						
                      </form>
                  </div>
          		</div><!-- col-lg-6--> 



				
          		<div class="col-lg-6">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Check-In Form</h4>
                      <form class="form-horizontal style-form" method="post" action="extrasave.php">
                        <?php //if(isset($_GET[]))
							if (empty($_GET)) {
								echo '<h3>Checkin Form Will Automaticaly Fill By The System.<br><br> You Just Need To Search An Attendat By Phone Number Or ID Number Like-Aadhaar No/ Voter No/ Gov ID No etc</h3>';
							}
							else
						  {   $ss=$_GET['phone']; $idd=$_GET['aid'];
							  if($_GET['aid']!="")
							  {
							  $tr="select * from `guests` where `id_number`='$idd' ORDER BY `ssid` DESC LIMIT 1;";
							  }
							  
							  if($_GET['phone']!="")
							  {
								$tr="select * from `guests` where `mobile`='$ss' ORDER BY `ssid` DESC LIMIT 1;";
							  }
							 
							 
							$rrr=mysqli_query($con,$tr);
							if($rss=mysqli_fetch_array($rrr))
							{
						 ?>  
						 
						<div class="form-group">
                              <label class="col-sm-8  col-sm-8  control-label">Room No:</label>
                              <div class="col-sm-10">
							  <?php  $qi="select * from `rooms` where `room_type` = 'PRIVATE-ROOM' and `bed_no`=2  group by `room_no`;"; ?>
                                  <select name="roomno" required onchange="getValue(this)"  class="form-control show-tick" data-live-search="true" style="height:200px;">
								  <option Value="N/A" selected="selected">Select A Room</option>
								  <?php  
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
					<div class="form-group">
                              <label class="col-sm-8  col-sm-8  control-label">Person/Extra Bed:</label>
                              <div class="col-sm-10">
                                  <select name="bedno" required id='bd' onchange="findmyvalue()"   class="form-control show-tick" data-live-search="true">
								   <option Value="N/A" selected="selected">Select A Bed</option>
								  <?php 
								  $srn=$_GET['room'];
								 $rq="select * from `rooms` where `room_no`='$srn' and `status` ='vacant' and `bed_no`!='1';";
									 if($rqi=mysqli_query($con,$rq))
									 {
					  while($rsq=mysqli_fetch_array($rqi))
					  {
					  ?>
		 <option Value="<?php echo $rsq['bed_no']; ?>"><?php echo $rsq['bed_no']; ?></option>';
					  <?php } 
									 
					  ?>
									</select>
									
								
						
									
                              </div>
							  <?php }
									 else{  echo "<script>alert('Sorry! There Is No More Space In This Room.');</script>"; } ?>
                          </div>	  
 
						  <?php ?>
						 <div class="form-group">
                              <label class="col-sm-8  col-sm-8  control-label">SSID:</label>
                              <div class="col-sm-8">
    <input type="text" name="ssid" value="<?php echo $rss['ssid']; ?>" readonly="readonly"  class="form-control">
                              </div>
                          </div>
						<div class="form-group">
                              <label class="col-sm-8  col-sm-8  control-label">Patient Name:</label>
                              <div class="col-sm-8">
                                  <input type="text"  required  name="pname" required  class="form-control">
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Admittion Date:</label>
                              <div class="col-sm-8">
                                  <input type="date" required  name="admdate" required  class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-8  col-sm-8 control-label">MRD NO / Adm No:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="mrd" required  class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Attendant Name:</label>
                              <div class="col-sm-8">
    <input type="text" name="name" value="<?php echo $rss['guestname']; ?>" readonly="readonly"  class="form-control">
                              </div>
                          </div>
                          	<div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Father/Husband Name:</label>
                              <div class="col-sm-8">
    <input type="text" name="fnwo" value="<?php echo $rss['fnwo']; ?>" readonly="readonly"  class="form-control">
                              </div>
                          </div>
                          
                          	<div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Mobile:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="mobile"  readonly="readonly"  value="<?php echo $rss['mobile']; ?>" class="form-control">
                              </div>
                          </div> 
				<div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Mobile 2:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="mobile2" readonly="readonly"  value="<?php echo $rss['mobile2']; ?>" class="form-control">
                              </div>
                          </div> 
						  		  
						  <div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Address:</label>
                              <div class="col-sm-8">
                                  <textarea name="address" class="form-control"><?php echo $rss['address']; ?></textarea>
                              </div>
                          </div>
				<div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Id Proof Type:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="id_type" readonly="readonly"  value="<?php echo $rss['id_type']; ?>" class="form-control">
                              </div>
                          </div> 
				
							<div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Id No:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="id_number" readonly="readonly"  value="<?php echo $rss['id_number']; ?>" class="form-control">
                              </div>
                          </div>
				
				
				<div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Photo:</label>
                              <div class="col-sm-8">
                                  <img src="<?php echo $rss['photo']; ?>" height="150px" width="auto">
                              </div>
                          </div>
						  	<script>
									function findmyvalue()
						{
						var r1 = Number(document.getElementById("bd").value);
						if(r1==2){ document.getElementById("secr").innerHTML = " <input type=text  name=advance value=0 readonly=readonly >" ; } else { document.getElementById("secr").innerHTML="<input type=text  name=advance value=1400 readonly=readonly >"; }
						}</script>
				<div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Security:</label>
                              <div class="col-sm-8" id="secr">
                                  
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label">Print:</label>
                              <div class="col-sm-8">
                    <select name="type" required  class="form-control show-tick" data-live-search="true"><option value="all">All</option><option value="withoutpass">Without Pass</option></select> 
                              </div>
                          </div>
<!-- Hidden Variables Start--> 
<?php 
$tim=$rss['regdate'];
$tv=strtotime($tim);

 $da = date("Y", $tv);

					  

?>
<input type="hidden" name="ssid" value="<?php echo $rss['ssid']."/".$da; ?>">
<input type="hidden" name="bcharges" value="<?php echo $rbbc['bed_charge']; ?>">
<input type="hidden" name="photo" value="<?php echo $rss['photo']; ?>">
<div class="form-group">
                              <label class="col-sm-8 col-sm-8  control-label">Registration Type:</label>
<div class="col-sm-8">
<label class="radio-inline">
<input type="radio" name="visit_type" value="new">New</label>
    <label class="radio-inline">
      <input type="radio" name="visit_type" value="Renew">Renew
    </label>
    <label class="radio-inline">
      <input type="radio" name="visit_type" value="Exchange">Exchange
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