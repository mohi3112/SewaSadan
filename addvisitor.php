<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Add Visitors</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<?php
					    
if(isset($_POST['savevisitor']))
{ 
$ids =mt_rand(100000, 999999);	
	

foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}
		$issue=time();
		$idate=date('d-m-Y',time());
		$itime=date('h:i a',time());
		 $qur="INSERT INTO `visitor` (`sr`,`passid`, `visitor`, `guest`, `room`, `bed`, `issueon`, `vistdate`, `visittime`, `noofperson`, `isuueby`, `photo`, `visitormobile`) VALUES (NULL,'$ids', '$visitor', '$atname', '$room', '$bed', '$issue', '$idate', '$itime', '$noof', '$issueby', '$noof', '$mobile');";
		mysqli_query($con,$qur);
		echo "<script>window.location.href = 'printvisitor.php?sr=".$ids."';</script>";
	
	
		
}

					  
					  ?>
                      <form class="form-horizontal style-form" method="post" action="addvisitor.php" enctype="multipart/form-data">
                          
						
                          
                          	
                          	<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Mobile:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="mobile" maxlength="10" class="form-control">
                              </div>
                          </div> 
				<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">Room:</label>
                              <div class="col-sm-8">
                                  <input type="text" name="room" maxlength="10" class="form-control">
                              </div>
                          </div> 
						  	

							
						
                                  <input type="hidden" name="issueby" value="<?php echo $usr; ?>">
                             
				
				
				<div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label">No Of Persons:</label>
                              <div class="col-sm-8">
                                  <select name="noof"  class="form-control show-tick" data-live-search="true">
								  <?php
								  for($s=0;$s<10;$s++)
								  {
									echo "<option value='".$s."'>".$s."</option>";  
									  
								  }
								  ?>
								  </select>
                              </div>
                          </div>		  
						  <div class="row mt">
                              
							  <div class="col-sm-6 text-center">
                                  <input type="submit" name="savevisitor" class="btn btn-round btn-default"/>
                              </div>
                          </div>
						
                      </form>
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