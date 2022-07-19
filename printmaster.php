  <?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Print Master</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
				 <h4><i class="fa fa-angle-right"></i> What You Want To Print</h4>
						  <br><br><br><table cellspacing="6px" style="padding-top:100px;background-color:#ccc;" align="center" width="100%" bgcolor="#ccc">
						  <form  action="print.php" method="get">
						 <tr> <td>Booking ID: <input type="text" name="booking"></td><td>Need Print For: 
						  <select name="typess" class="form-control show-tick" data-live-search="true" > 
						  
						  <option value="all" >All</option>
						  <option value="pass">Pass</option><option value="pass2">Pass2</option>
						   <option value="application">Application Form</option>
						    <option value="security">Security Slip</option>
						  </select></td>
						  <td><input type="submit" value="Print"></td>
						  </tr>
						   </form>
						  </table>
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