<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
$t=time();
if(isset($_POST['resolve']))
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
			$bookid=$cash['bookinid'];
			$guestname=$cash['name'];
		    $rno=$cash['room'];
			$bno=$cash['bed'];
			if($rno == 100 || $rno == 200 || $rno == 300)
			{ $rncharge=350;}
			else
			{ $rncharge=950;}

        $newq1=" UPDATE `visits` SET `bed_charge`='$rncharge' where  `bookingid`='$bookid' and  `room_no`='$rno' and `bed_no`='$bno';";
        
        mysqli_query($con,$newq1);
		$newq=" UPDATE `rooms` SET `status`='occupied',`curr_guest`='$guestname', `bookingid`='$bookid' WHERE `room_no`='$rno' and `bed_no`='$bno';";
		mysqli_query($con,$newq);
		echo "<script>window.location.href = 'checkoutbackend.php?slip=".$slips."';</script>";
	}
		else{
		echo "<script>alert('Slip Does Not Exist.');</script>";
		echo "<script>window.location.href = 'checkout.php';</script>"; 
		}
		
}
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"> <h2>Find By Slip No</h2> </div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
				
                   	<form method="post" action="roomzero.php">
                   	   <br><br><br><br><br> <table width="100%"><tr><td>Slip No</td><td><input type="hidden" name="canby" value="<?php echo $usr; ?>" class="form-group"> 
                                    <input type="text" name="slip" value="" class="form-group"> </td><td>	<input type="submit" name="resolve" value="Resolve" class="form-group"> 
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