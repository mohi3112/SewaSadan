<?php
include('lcheck.php');
include("inc/config.php");
$usr=$_SESSION['usr'];

?>

<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Vendors List</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
						<div id="printableArea" style="width:100%;height:90%;">
						  
						  
						  
						  
	<?php					 
 $qr="SELECT * FROM `stock_vendors` ;";

	?>
	
	<section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
								  
                                  <tr>
								  <th>ID:</th> 
								   <th>Vendor Name:</th> 
								   <th>Added On:</th> 
								   <th>Added By:</th> 
								   </tr>
                                  </thead>
                                  <tbody>
						 
			 <?php 
	$rr=mysqli_query($con,$qr);
		while($rt=mysqli_fetch_array($rr))
		{ 
	
			?>
	
<tr>
<td data-title="ID"><?php echo $rt['vendor_id']; ?></td>
<td data-title="Brand Name"><?php echo $rt['name']; ?></td>
<td data-title="Added On"><?php $dt=$rt['added_on']; echo $ddt=date('d-m-Y',$dt); ?></td>
<td data-title="Brand Name"><?php echo $rt['added_by']; ?></td>	

	</tr>
<?php } ?></table>	

						  
						  
						  
						  
                          
                              <center>
                              
                              </center>
                          </section>
                      </div><!-- /content-panel --><input type="button" onclick="printDiv('printableArea')" value="Print" />
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