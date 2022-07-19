<?php 
include('lcheck.php');
?>
	  <script>
					  function getValue(obj){
						  var dt=obj.value;
						  var newURL =document.URL+ "&room=" +dt;
						  window.location.href = newURL;
						  
					  }
					  function getValues(obj){
						  var dts=obj.value;
						  var newURL =document.URL+ "&bed=" +dts;
						  window.location.href = newURL;
						  
					  }
		</script>					  
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Shift Room</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
				 <form action="shiftaccomodation.php" method="get">
				            <input type="text" name="slip" value="2019-20/" >
				            <input type="submit" value="Search">
				        </form><br><br>
				        	 <form class="form-horizontal style-form" method="post" action="shiftnow.php"> 
				        <?php
				        $slp=$_GET['slip'];
				         $myq="select * from `cash` where `slip`='$slp';";
$cashraw=mysqli_query($con,$myq);
$cash=mysqli_fetch_array($cashraw);
 $bookingid=$cash['bookinid'];
 $visqur="select * from `visits` where `bookingid`='$bookingid' and `checkout_date` iS NULL;";
$visraw=mysqli_query($con,$visqur);
if($visit=mysqli_fetch_array($visraw))
{
?><input type="hidden"  readonly="readonly" value="<?php echo $bookingid;?>" name="booking"  required class="form-control">
<input type="hidden" value="<?php echo $visit['guestname'];?>" name="guest" >
<input type="hidden" value="<?php $cd=$visit['checkin_date']; echo date('d-m-Y',$cd);?>" name="arival" >
<input type="hidden" value="<?php $rd=$visit['ren_date']; echo date('d-m-Y',$rd);?>" name="valid" >
<table border="1" class="table table-bordered table-striped table-condensed cf">
				           <tr>
				               <th>Name </th>
<th>Son/Daughter/wife Of </th>
<th>Mobile No</th>
<th>Checkin Time </th>
<th>Security </th>
<th>Room No</th>
<th>Bed No</th>
<th>Bed Charge </th>
				           </tr>
				          <tr>
<td><?php echo $visit['guestname'];?> </td>
<td><?php echo $visit['fnwo'];?> </td>
<td><?php echo $visit['mobile'];?> </td>
<td><?php $chd= $visit['checkin_date'];echo date('d-m-Y h:i',$chd);?> </td>
<td><?php echo $visit['advance'];?> </td>
<td><?php echo $visit['room_no'];?> </td>
<td><?php echo $visit['bed_no'];?> </td>
<td><?php echo $visit['bed_charge'];?> </td>

</tr>
				        </table>
				        <br>
	<h2>Select A New Room --></h2>	
<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Room No:</label>
                              <div class="col-sm-10"><?php  $qi="select * from `rooms`   group by `room_no`;"; ?>
                                  <select name="roomno" required onchange="getValue(this)"  class="form-control show-tick" data-live-search="true">
								  
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
					
					  
						  <?php 
						  echo $drt="<script>document.getElementByID('rm').value;</script>";
						   
						   ?> 
						   
					<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bed No:</label>
                              <div class="col-sm-10">
                                  <select name="bedno" onchange="getValues(this)" required   class="form-control show-tick" data-live-search="true">
								  <option value=0>Select A Bed</option>
								  <?php 
								  $srn=$_GET['room'];
								 $rq="select * from `rooms` where `room_no`='$srn' and `status` ='vacant';";
									 $rqi=mysqli_query($con,$rq);
					  while($rsq=mysqli_fetch_array($rqi))
					  {
					  ?>
		 <option Value="<?php echo $rsq['bed_no']; ?>" <?php if($_GET['bed']==$rsq['bed_no']){ echo "selected";}?>><?php echo $rsq['bed_no']; ?></option>';
					  <?php } 
					    
					  ?>
									</select>
                              </div>
                          </div>	  
 	 
						 
						  <?php 
$tim=$rss['regdate'];
$tv=strtotime($tim);
$da = date("Y", $tv);
?>
 <?php  $srn=$_GET['room'];$sbn=$_GET['bed'];
								 $rqy="select * from `rooms` where `room_no`='$srn'  and `bed_no`='$sbn' limit 1;";
								 $aqy=mysqli_query($con,$rqy) or die(mysqli_error());
			  
								$sbal=mysqli_fetch_array($aqy);
								 
								 ?>
				<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Security:</label>
                              <div class="col-sm-8">
                                  <input type="text"  readonly="readonly" value="<?php echo $tsec=$sbal['room_charge']*$chkvalidity;?>" name="advance"  required class="form-control">
                              </div>
                          </div>						
				        
				        <div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Bed Charges:</label>
                              <div class="col-sm-8">
                                  <input type="text" readonly="readonly" value="<?php echo $tsec=$sbal['room_charge'];?>" name="bedcharge"  required class="form-control">
                              </div>
                          </div>
                          <input type="submit" name="shift" value="Shift Accomodation">
                          </form>
<?php
}
else
{
 ?>
 <script>alert("User Already Checked Out.");</script>
 <?php
}
				        ?>
				
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