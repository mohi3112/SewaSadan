  <?php
include('lcheck.php');
if(isset($_POST['save']))
{ 

	
$dp=$_FILES['dp'];
if ( $dp['error']==0)
{
$src=$dp['tmp_name'];
$tgt="images/staff/".$dp['name'];
move_uploaded_file($src,$tgt) or die ("file not uploaded");
}

foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}
	echo "<br><br><br><br><br><br>"; //print_r($_POST);

		
		
		echo $qur="INSERT INTO `user` (`sr`, `name`, `password`, `designation`, `actype`, `address`, `mobile`, `login`, `photo`, `adhar`) VALUES (NULL, '$name', '$password', '$designation', '$utype', '$address', '$mobile', '$login', '$tgt', '$adhar');";
		mysqli_query($con,$qur);
		
	echo "<script>window.location.href = 'adduser.php';</script>";
		
}
?>
    <section class="content">
        <form class="form-horizontal style-form" method="post" action="adduser.php" enctype="multipart/form-data">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Add New User</h2> </div></div></div>
        
        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                   
                    <div class="card">
                        <div class="body">
                          
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">                                    
                                        <input type="text" name="login" maxlength="10" class="form-control" placeholder="Username" />
                                    </div>
                                    <div class="form-group">                                   
                                        <input type="password" name="password"  class="form-control" placeholder="Password" />
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">                                    
                                        <input type="text" name="name" class="form-control" placeholder="Full Name" />                                   
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">                                   
                                        <input type="text" name="designation" class="form-control" placeholder="Designation" />                                    
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <select name="utype"  class="form-control show-tick" data-live-search="true">
                                        <option value="">-- User Type --</option>
                                        <option Value="admin">Admin</option>
									<option Value="front">Front Desk</option>
									<option Value="store">Store Manager</option>
									<option Value="manager">Manager</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">                                   
                                        <input type="text" name="mobile" class="form-control" placeholder="Mobile No" />                                   
                                    </div>
                                </div>
                                
                                </div>
								
								<div class="row clearfix">
                                <div class="col-sm-6">
                                    <input type="file" name="dp" class="form-control" accept="image/*">
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">                                   
                                       <input type="text" name="adhar" class="form-control" placeholder="Adhaar ID">                                 
                                    </div>
                                </div>
                                
                                </div>
								            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                       
                        <div class="body">
                            <h2 class="card-inside-title">Address</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="address" rows="4" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
											<br>
											 <input type="submit" name="save" class="btn btn-round btn-default"/>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
                            </div>
                       </div>
                    </div>
                </div>
            </div>

          </form>  
</section>

<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="assets/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js --> 
<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 
<script src="assets/js/pages/forms/basic-form-elements.js"></script>
</body>
</html>