  <?php include('lcheck.php'); 
include("inc/config.php");
?>

<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Return Beddings</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
						<form class="form-horizontal style-form" method="get" action="storereturn.php">
		  	<table><tr>
			<td>Slip No</td><td><input type="text" name="slip" class="form-control"></td>
			<td>Aadhaar</td><td><input type="text" name="aid"  class="form-control"></td>
			<td>Phone</td><td><input type="text" name="phone" maxlength="12" class="form-control"></td>
			<td><input type="submit" value="Search" name="chk"></td>
			</tr></table></form>
						
						<?php
						
 $booking=$_GET['booking'];$ss=$_GET['phone']; $idd=$_GET['aid'];$ea=$fnyear."/".$_GET['slip'];
if(isset($_GET))
{
							if($_GET['aid']!="")
							  {
							   $tr="select * from `visits` where `id_number`='$idd';";
							  }
							  
							  if($_GET['phone']!="")
							  {
								 $tr="select * from `visits` where `mobile`='$ss';";
							  }
							  
							  if($_GET['slip']!="")
							  {
								 $trs="select * from `cash` where `slip`='$ea';";
								 $rtes=mysqli_query($con,$trs);
								 $xrt=mysqli_fetch_array($rtes);
								 $xbk=$xrt['bookinid'];
								 $tr="select * from `visits` where `bookingid`='$xbk';";
							  }
							  if($_GET['booking']!="")
							  {
								 $tr="select * from `visits` where `bookingid` = '$booking';";
							  }
	
	
	$rr=mysqli_query($con,$tr);
	$rt=mysqli_fetch_array($rr);
	//print_r($rt);
						  if($rt['store_status']=="pending")
						  {
							  //echo "Bedding Are Already Issued To This Attendent";
							  echo "<script>alert('Bedding Have Not Issued Yet To This Attendent');</script>";
							   echo "<script>window.location.href = 'storereturn.php';</script>";
							  
						  }
						  if($rt['store_status']=="Returned")
						  { //echo "Bedding Are Returned By This Attendent";
				echo "<script>alert('This Attendent Returned The Beddings.');</script>";
							 //print_r($rt);
							 echo "<script>window.location.href = 'storereturn.php';</script>";
						  }
						  //echo $rt['store_status'];
						  $mbk=$rt['bookingid'];
						  $msss="select * from `stock_asset_allocation` where `booking_id`='$mbk' and `stock_status`='issued';";
						  $ams=mysqli_query($con,$msss);
						  $newrs2=mysqli_fetch_array($ams);
	
	
	?>		

          <div class="row clearfix">
			<div class="col-lg-7">			  
						 <h4>Please Match The Details</h4> 
						 <table align="center" width="100%" style="text-transform: uppercase;">
						 <tr><th>#</th><th>Item Name</th><th>Quality/Type</th><th>Color</th><th>Asset No</th></tr>
						 <?php $sr=1;
						 while($newrs=mysqli_fetch_array($ams))
						 {
						 ?>
						 <tr><td><?php echo $sr;?></td><td><?php echo $newrs['item_name'];?></td><td><?php echo $newrs['quality'];?></td><td><?php echo $newrs['color'];?></td><td><?php echo $newrs['asset_id'];?></td></tr>
						 <?php
						 $sr++;
						 }
						 
						 ?>
						 </table>
						 <br><br><br><center><a href="return.php?booking=<?php echo $mbk; ?>"><input type="button" value="Return Now"></center>
				</div>
						  
	
			
                <div class="col-lg-5">			  
					<table width="330px"  style="text-transform: uppercase;"><tr><td colspan=2><center><img src="<?php echo $rt['photo']; ?>" height="100px" width="auto"></center></td></tr>
					<tr><td><b>Name:</b></td><td><?php echo $rt['guestname'];?></td></tr>
					<tr><td><b>Care Of</b></td><td><?php echo $rt['fnwo'];?></td></tr>
					<tr><td><b>Room No:</b></td><td><?php echo $rt['room_no'];?></td></tr>
					<tr><td><b>Bed No:</b></td><td><?php echo $rt['bed_no'];?></td></tr>
					<tr><td><b>Slip No:</b></td><td><?php echo $rt['slip'];?></td></tr>
					<tr><td><b>Issue Date:</b></td><td><?php $ret=$newrs2['issue_date']; echo $tpm=date('d-m-Y',$ret);?></td></tr>
					<tr><td><b>Issued By:</b></td><td><?php echo $rt['issue_by'];?></td></tr>
					</table>	  
				</div>
			
			
			 
  <?php }	?>  
						
						
						
						<?php  // Code Ends Here/////  ?>
                        </div>
                    </div>
					
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