<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];


?>
<section class="content">
<div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
          	<h3><i class="fa fa-angle-right"></i>User List</h3>
		  		
		  	
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
                          
						  <h4><i class="fa fa-angle-right"></i> Select A User To Edit</h4>
						  
						  <div id="printableArea" style="width:100%;height:90%;">
						  
						  
						  
						  
	<?php					 
 $qr="SELECT * FROM `user` where `sr` > 1 ;";

	?>
	
	<section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
								  
                                  <tr>
								  <th width="12%">User Name:</th> 
								  <th >User Type:&nbsp;&nbsp;&nbsp;</th> <th>Action:&nbsp;&nbsp;&nbsp;</th> </tr>
                                  </thead>
                                  <tbody>
						 
			 <?php 
	$rr=mysqli_query($con,$qr);
		while($rt=mysqli_fetch_array($rr))
		{ 
	
			?>
	
<tr>
<td data-title="User Name"><?php echo $rt['name']; ?></td>

	<td data-title="Attendant:"><?php echo $rt['actype'];?></td>
	<td data-title="Collected By:"><a href="editusers.php?sr=<?php echo $rt['sr'];?>"><input type=button name='edit' value='Edit User'></a></td>

	</tr>
<?php } ?></table>	

						  
						  
						  
						  
                          
                              <center>
                              
                              </center>
                          </section>
                      </div><!-- /content-panel --><input type="button" onclick="printDiv('printableArea')" value="Print" />
                  </div></div><!-- /col-lg-12 -->
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