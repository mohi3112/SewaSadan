<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
$t=time();
if(isset($_POST['cancel']))
{
	foreach($_POST as $k=>$v)
		{
			$$k=$v;
		}
		
		/// if block if checkout not null
		
		$slips=$fnyear."/".$slip;
		$qu1="select * from `cash` where `slip`='$slips';";
		$q1r=mysqli_query($con,$qu1);
		$cash=mysqli_fetch_array($q1r);
		if(isset($cash))
		{
		$name=$cash['name'];
		$newnames=explode(" ",$name);
		$nameedit=$newnames[0];
		$editednm=$nameedit."(cancel)";
		
		$booking=$cash['bookinid'];
		$qu2="select * from `visits` where `bookingid`='$booking';";
		$q12=mysqli_query($con,$qu2);
		$visits=mysqli_fetch_array($q12);
		$cd=$visits['checkout_date'];
		
		if (is_null($cd))
		{
		$spl="update `cash` set  `name`='$editednm' ,`donation` ='0' where `slip`='$slips';";
		$qpl="update `visits` set `advance`='0' , `bed_charge`='0', `store_status`='Returned' ,`donation`='0' ,`checkout_date`='$t' where `bookingid`='$booking';";
		mysqli_query($con,$spl);
		mysqli_query($con,$qpl);
		}
		else
		{
		echo "<script>alert('This User Already Checkout..');</script>";
		echo "<script>window.location.href = 'canslip.php';</script>";
		}
		}
		else{
		   echo "<script>alert('Slip Does Not Exist.');</script>";
		echo "<script>window.location.href = 'canslip.php';</script>"; 
		}
		
}
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"> <h2>Cancel Entry By Slip No</h2> </div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
				
                   	<form method="post" action="canslip.php">
                   	   <br><br><br><br><br> <table width="100%"><tr><td>Slip No</td><td><input type="hidden" name="canby" value="<?php echo $usr; ?>" class="form-group"> 
                                    <input type="text" name="slip" value="" class="form-group"> </td><td>	<input type="submit" name="cancel" value="Cancel Slip" class="form-group"> 
                                  </td></tr></table>
                                <br><br><br><br>
                                   </form>                           
                            
                         
                        
  </div>					
	             	
						
                      
                  </div>
          		</div><!-- col-lg-6--> 

 </div>

				   	
          	
			
						<?php  // Code Ends Here/////  ?>
                       
                        
                       
                    </div></div>
                </div>
            
</section>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="assets/bundles/mainscripts.bundle.js"></script>
</body>
</html>                           