<?php
include('lcheck.php');
include("inc/config.php");
$usr=$_SESSION['usr'];

$t=time();
if(isset($_POST['save']))
{ 


foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}
	echo "<br><br><br><br><br><br>"; //print_r($_POST);

		 $qur="INSERT INTO `stock_vendors` (`vendor_id`, `name`,`added_by`,`added_on`) VALUES ('$bno', '$name','$usr','$t');";
		mysqli_query($con,$qur);
		
	echo "<script>window.location.href = 'createvendor.php';</script>";
		
}
?>

<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Create Vendor</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
						<form class="form-horizontal style-form" method="post" action="createvendor.php" enctype="multipart/form-data">
					  <div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Vendor Name:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="name" class="form-control">
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