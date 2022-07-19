  <?php
include('lcheck.php');
 $srn=$_GET['sr'];
 $rq="select * from `user` where `sr`='$srn';";
 $rqi=mysqli_query($con,$rq);
 $rec=mysqli_fetch_array($rqi);


?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
    <section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Edit A User</h2>
                 </div>
            </div>
        </div>
<div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
       
   
 <form method="post" action="editusers.php" enctype="multipart/form-data">
     
<table>
<tr><td>User Name: </td><td data-title="User Name:"><input type="hidden" readonly name="sr" value="<?php echo  $srn; ?>"><input type="text" readonly  value="<?php echo $rec['name']; ?>"></td></tr>
<tr><td>Login Id:</td>
<td data-title="Login Id:"><input type="text" readonly value="<?php echo $rec['login']; ?>"></td></tr>
<tr><td>Account Type: </td><td data-title="User Name:">  <select name="utype"  class="form-control show-tick" data-live-search="true">
								  <option Value="admin">Admin</option>
									<option Value="front">Front Desk</option>
									<option Value="store">Store Manager</option>
									<option Value="manager">Manager</option>
									</select></td></tr>
<tr><td>Password: </td><td data-title="User Name:"><input type="text" name="pass" ></td></tr>
<tr><td colspan=2><input type="submit" readonly name="edt" value="Edit Now"></td></tr>
						 </table>
						
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	
			
			
			
			
			</div><!-- /row -->

		</section><! --/wrapper -->
   </div>	</div>
	
	
	
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
<?php if(isset($_POST['edt']))
{
  foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}
  $ttr="update `user` set `actype`='$utype' , `password`='$pass' where `sr`='$sr';";
    mysqli_query($con,$ttr);
   // echo "<script>alert('Record Has Been Updated!!');</script>";
} ?>