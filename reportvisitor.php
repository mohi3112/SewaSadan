<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Visitor Report</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<table width="65%" cellspacing="6px" style="padding-top:100px;background-color:#ccc;" align="center" width="100%" bgcolor="#ccc">
						  <form method="get" action="reportvisitor.php">
						  <td>Start Date: <input type="date" name="start"></td><td>End Date: <input type="date" name="end"></td><td><input type="submit" name="chk" value="search"></td>
						  </tr>
						  </table> 
						  <br><br>
						  
						  
						  
						  
						  
	<?php					 
if(isset($_GET['chk']))
{
	foreach($_GET as $k=>$v)
		{
			$$k=$v;
		}
		$ft=date('G:i:s',time());
		$e=$end." ".$ft;
	$st=strtotime($start);
	$en=strtotime($e);
 $qr="SELECT * FROM `visitor`  WHERE `issueon` BETWEEN '$st' AND '$en' ;";

	?>
	<section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
								  
                                  <tr>
								  <th class="numeric">Sr No:</th>
								  <th class="numeric">Visitor:</th>
									  <th class="numeric">Attendant:</th>
                                      <th class="numeric">Visit Date:</th>
									  <th class="numeric">Visit Time:</th>
                                      <th class="numeric">Room No:</th>
									  <th class="numeric">Bed No:</th>
									  <th class="numeric">Persons:</th>
									  <th class="numeric">Mobile:</th>
                                      </tr>
                                  </thead>
                                  <tbody>
						  
						  <?php 
	$rr=mysqli_query($con,$qr); 
		while($rt=mysqli_fetch_array($rr))
		{
			?>
	
<tr>
	<td data-title="Sr No:"><?php echo $rt['sr']; ?></td>
	<td data-title="Visitor:"><?php echo $rt['visitor']; ?></td>
	<td data-title="Attendant:"><?php echo $rt['guest']; ?></td>
	<td data-title="Visit Date:"><?php echo $rt['vistdate']; ?></td>
	<td data-title="Visit Time:"><?php echo $rt['visittime']; ?></td>
	<td data-title="Room No:"><?php echo $rt['room']; ?></td>
	<td data-title="Bed No:"><?php echo $rt['bed']; ?></td>
	<td data-title="Persons:"><?php echo $rt['noofperson']; ?></td>
	<td data-title="Mobile:"><?php echo $rt['visitormobile']; ?></td>
	
</tr>
	
	
	
<?php	
}
echo "</tbody></table>";
}
else{
$st=time();
$en=$st-864000;
$qr="SELECT * FROM `visitor`  WHERE `issueon` BETWEEN '$en' AND '$st' ;";
	?>
	<b><i><center>Last 10 Days Visits</center></i></b><br>
	<section id="no-more-tables">
                               <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
								  
                                  <tr>
								  <th class="numeric">Sr No:</th>
								  <th class="numeric">Visitor:</th>
									  <th class="numeric">Attendant:</th>
                                      <th class="numeric">Visit Date:</th>
									  <th class="numeric">Visit Time:</th>
                                      <th class="numeric">Room No:</th>
									  <th class="numeric">Bed No:</th>
									  <th class="numeric">Persons:</th>
									  <th class="numeric">Mobile:</th>
                                      </tr>
                                  </thead>
                                  <tbody>
						  
						  <?php 
	$rr=mysqli_query($con,$qr); 
		while($rt=mysqli_fetch_array($rr))
		{
			?>
	
<tr>
	<td data-title="Sr No:"><?php echo $rt['sr']; ?></td>
	<td data-title="Visitor:"><?php echo $rt['visitor']; ?></td>
	<td data-title="Attendant:"><?php echo $rt['guest']; ?></td>
	<td data-title="Visit Date:"><?php echo $rt['vistdate']; ?></td>
	<td data-title="Visit Time:"><?php echo $rt['visittime']; ?></td>
	<td data-title="Room No:"><?php echo $rt['room']; ?></td>
	<td data-title="Bed No:"><?php echo $rt['bed']; ?></td>
	<td data-title="Persons:"><?php echo $rt['noofperson']; ?></td>
	<td data-title="Mobile:"><?php echo $rt['visitormobile']; ?></td>
	
</tr>
<?php	

		}

echo "</tbody></table>";
	?>
						
						
		<?php				  
}			  
			?>			  
						  
						  
						  
						  
						  
						  
						  
                          
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