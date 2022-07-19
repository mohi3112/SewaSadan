 <?php
include('lcheck.php');

if(isset($_POST['save']))
{ 


foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}
	echo "<br><br><br><br><br><br>"; print_r($_POST);
$qt="select * from `rooms` where `room_no`='$roomno' group by `room_no`;";
					  $rrr=mysqli_query($con,$qt);
					  $rss=mysqli_fetch_array($rrr);
					  $ttype=$rss['room_type'];
					  $ccharge=$rss['room_charge'];
		for($r=2;$r<=$bedno;$r++)
		{			
		  $qur="INSERT INTO `rooms` (`sr`, `room_no`, `bed_no`, `room_type`, `room_charge`, `status`, `curr_guest`, `arrival`, `valid`, `checkout`, `bookingid`, `recipt`, `gno`) VALUES (NULL, '$roomno', '$r', '$ttype', '$ccharge', 'vacant', 'N/A', '0', '0', '0', '0', '0', '0');";
		mysqli_query($con,$qur);
		}
	echo "<script>window.location.href = 'addbed.php';</script>";
		
}
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Add New Bed</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
						<form class="form-horizontal style-form" method="post" action="addbed.php" enctype="multipart/form-data">
					  
					  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Room No:</label>
                              <div class="col-sm-10">
                                  <select name="roomno"  class="form-control show-tick" data-live-search="true">
								  
								  <?php echo $qq="select * from `rooms` group by `room_no`;";
					  $rr=mysqli_query($con,$qq);
					  while($rs=mysqli_fetch_array($rr))
					  {
					  ?>
		 <option Value="<?php echo $rs['room_no']; ?>"><?php echo $rs['room_no']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rs['room_type']; ?></option>';
					  <?php } 
					    
					  ?> 
					  
					  
					  </select>
                              </div>
                          </div>
					 
					 <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bed No:</label>
                              <div class="col-sm-10">
                                  <select name="bedno"  class="form-control show-tick" data-live-search="true">
								  <?php 
								  for($r=1;$r<26;$r++)
								  {
									  echo '<option Value='.$r.'>'.$r.'</option>';
								  }  ?>
								  <option Value='extra1'>Extra Bed 1</option>
								  <option Value='extra2'>Extra Bed 2</option>
									</select>
                              </div>
                          </div>
					 
					
						  <div class="row mt">
                              
							  <div class="col-sm-6 text-center">
                                  <input type="submit" name="save" class="btn btn-round btn-default"/>
                              </div>
                          </div>
						
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