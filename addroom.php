 <?php
include('lcheck.php');
if(isset($_POST['save']))
{ 


foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}
	echo "<br><br><br><br><br><br>"; print_r($_POST);

		
		
		 $qur="INSERT INTO `rooms` (`sr`, `room_no`, `bed_no`, `room_type`, `room_charge`, `status`, `curr_guest`, `arrival`, `valid`,`checkout`, `bookingid`, `recipt`, `gno`) VALUES (NULL, '$roomno', '$bedno', '$type', '$charges', 'vacant', 'N/A', '0', '0','0', '0', '0', '0');";
		mysqli_query($con,$qur);
		
	echo "<script>window.location.href = 'addroom.php';</script>";
		
}
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Add New Room</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
						<form class="form-horizontal style-form" method="post" action="addroom.php" enctype="multipart/form-data">
					  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Room No:</label>
                              <div class="col-sm-10">
                                  <input type="text" name="roomno" class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bed No:</label>
                              <div class="col-sm-10">
                                  <input type="text" name="bedno" value="1" readonly="readonly" class="form-control">
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Room Type:</label>
                              <div class="col-sm-10">
										  <select name="type" class="form-control"  class="form-control show-tick" data-live-search="true">
										<option Value="NON-AC-HALL">NON AC HALL</option>
										<option Value="NON-AC-FAMILY">Non Ac Family Hall</option>
										  <option Value="AC-HALL">AC HALL</option>
										  <option Value="AC-HALL(FAMILY)">AC HALL(FAMILY)</option>
											<option Value="PRIVATE-ROOM">PRIVATE ROOM</option>
											<option Value="EXTRA-BEDS">EXTRA BEDS</option>
											</select>
                              </div>
                          </div>
						  
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Charges:</label>
                              <div class="col-sm-10">
                                  <input type="text" name="charges" class="form-control">
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