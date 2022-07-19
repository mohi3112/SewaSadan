<?php
include('lcheck.php');
if(isset($_POST['edituser']))
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
		$qur="update `guests` set `guestname`='$name', `fnwo`='$fnwo', `photo`='$tgt',`mobile`='$mobile',`mobile2`='$mobile2',`address`='$address',`id_type`='$id_type',  `id_number`='$id_number'where `ssid`='$ssid';";
		mysqli_query($con,$qur);		
	//echo "<script>window.location.href = 'checkin.php?aid=".$id_number."';</script>";		
}
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Edit Guest Details</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
				<center>
				
					<form class="form-horizontal style-form" method="get" action="editguest.php">
                          
					<table><tr><td>Fill By Aadhaar: </td><td>  <input type="text" name="aid" class="form-control"></td><td>Fill By Phone:  </td><td>  <input type="text" name="phone" maxlength="12" class="form-control"></td><td> <input type="submit" name="searchuser" Value="Search" class="btn btn-round btn-default"/></td></tr>
                             </table>
				</center>
				</div>
			</div></form>
			
			
			
			
			
			
			
			
			
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Edit User</h4>
                      <form class="form-horizontal style-form" method="post" action="editguest.php" enctype="multipart/form-data">
                          
						<?php //if(isset($_GET[]))
							if (empty($_GET)) {
								echo '<h3>You Just Need To Search An Attendat By Phone Number Or ID Number Like-Aadhaar No/ Voter No/ Gov ID No etc<br> After This Just Edit The Form.</h3>';
							}
							else
						  {   $ss=$_GET['phone']; $idd=$_GET['aid'];
							  if($_GET['aid']!="")
							  {
							  $tr="select * from `guests` where `id_number`='$idd';";
							  }
							  
							  if($_GET['phone']!="")
							  {
								$tr="select * from `guests` where `mobile`='$ss';";
							  }
							 
							 
							$rrr=mysqli_query($con,$tr);
							if($rss=mysqli_fetch_array($rrr))
							{
						 ?> 
						  <div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">SSID :</label>
                              <div class="col-sm-8">
                                  <input type="text"  required  name="ssid" value="<?php echo $rss['ssid']; ?>" readonly="readonly" class="form-control">
								  <br>Sorry It Can't Change!!!!
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Attendant Name:</label>
                              <div class="col-sm-8">
                                  <input type="text" required   name="name" value="<?php echo $rss['guestname']; ?>" class="form-control">
                              </div>
                          </div>
                          	
                          <div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Father/Husband Name:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="fnwo"  required  value="<?php echo $rss['fnwo']; ?>" class="form-control">
                              </div>
                          </div>
                          	
                          	<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Mobile:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="mobile" required   value="<?php echo $rss['mobile']; ?>" maxlength="10" class="form-control">
                              </div>
                          </div> 
				<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Mobile 2:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="mobile2" value="<?php echo $rss['mobile2']; ?>" maxlength="10" class="form-control">
                              </div>
                          </div> 
						  		  
						  <div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Address:</label>
                              <div class="col-sm-8">
                                  <textarea name="address"  required  class="form-control"><?php echo $rss['address']; ?> </textarea>
                              </div>
                          </div>
				<div class="form-group">Selected Id Proof: <?php echo $rss['id_type']; ?>
                              <label class="col-sm-4 col-sm-4 control-label">Id Proof Type:</label>
                              <div class="col-sm-8">
                                  <select name="id_type"  required   class="form-control show-tick" data-live-search="true">
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
                                  <input type="text"  required  name="id_number" value="<?php echo $rss['id_number']; ?>" class="form-control">
                              </div>
                          </div>
				
				
				<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Photo:</label>
                              <div class="col-sm-4">
                                  <input type="file"  required  name="dp" class="form-control" accept="image/*">
                              </div>
							  <div class="col-sm-4">
                         <img src="<?php echo $rss['photo']; ?>" height="100px"  width="auto">
                              </div>
                          </div>		  
						  <div class="row mt">
						 
							  <div class="col-sm-6 text-center">
                                  <input type="submit" name="edituser" class="btn btn-round btn-default"/>
                              </div>
                          </div>
						
                      </form> <?php }} ?>
                  </div>
          		</div><!-- col-lg-6--> 
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