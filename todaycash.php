<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>


<script type="text/javascript">
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
	 window.setTimeout(window.location.href = "checkout.php",1000);
}</script>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>My Today Cash</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<table width="65%" cellspacing="6px" style="padding-top:100px;background-color:#ccc;" align="center" width="100%" bgcolor="#ccc">
						  <form method="get" action="todaycash.php">
						  <td>Start Date: <input type="date" name="start"></td><td>End Date: <input type="date" name="end"></td><td><input type="submit" name="chk" value="search"></td>
						  </tr>
						  </table> 
						  <br><br>
						 <div id="printableArea" style="width:100%;height:90%;">
						  <?php
						  if(isset($_GET['chk']))
							{
								foreach($_GET as $k=>$v)
									{
										$$k=$v;
									}
									$dy=strtotime($start);
									$mydays=date('Y-m-d', $dy);
									$tm=$mydays." 00:00:00";
									$strt=strtotime($tm);
									
								    $en=strtotime($end);
									$myenddays=date('Y-m-d', $en);
									$tm2=$myenddays." 23:59:59";
									$ending=strtotime($tm2);
									
								 }
							else
							{
									$mydays=date('Y-m-d', time());
									$tm=$mydays." 00:00:00";
									$strt=strtotime($tm);
									$ending=$strt+86300;
							}
						  ?>
						  
						  
                          <section id="no-more-tables">
                              <table id="tblexportData" class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr><th>Sr:   </th>
									  <th> Reason: </th>
									 
                                      <th class="numeric">  Attendant Name:                                </th>
                                      <th class="numeric">Room:  </th>
                                      <th class="numeric">Bed-No:    </th>
                                      <th class="numeric">    Cash-Type:      </th>
									   <th> Slip-No:  </th>
									    <th> VC-NO:  </th>
										 <th> Recipt:  </th>
										 
                                      <th>  Payment-Time:                                </th>
									  <th>Amount:            </th>
									  <th>Total:</th>
                                  </tr><tr><td colspan=12>  </td>
                                      </tr>
                                  </thead>
                                  <tbody>
						  
						  <?php 
				$qr="SELECT * FROM `cash` WHERE `collectby` ='$usr' and  `handovertime` BETWEEN '$strt' and '$ending';";
	$rr=mysqli_query($con,$qr); $count=1;
		while ($rt=mysqli_fetch_array($rr))
		{
			?>
	
	
                                  
                                  <tr><td data-title="sr:"><?php echo $count; ?></td>
                                      <td data-title="Booking ID:"><?php echo $rt['dslip']; ?></td>
									  
                                      <td data-title="Name:"><?php echo $rt['name']; ?></td>
                                      <td class="numeric" data-title="Room No:"><?php echo $rt['room']; ?></td>
                                      <td class="numeric" data-title="Bed No:"><?php echo $rt['bed']; ?></td>
                                      <td class="numeric" data-title="Cash Type:"><?php echo $rt['cashtype']; ?></td>
									   <td data-title="Slip:"><?php echo $rt['slip']; ?></td>
									      <td class="numeric" data-title="VC No:"><?php echo $rt['vcno']; ?></td>
										      <td class="numeric" data-title="Recipt:"><?php echo $rt['reciptno']; ?></td>
                                      <td class="numeric" data-title="Payment Time:">
									  <?php echo $rt['time']; ?></td>
		<td><?php 
if($rt['cashtype']=="Handover"){echo "(+)  ".$amount=$rt['handover'];$tota=$tota+$amount;}
if($rt['cashtype']=="advance"){echo "(+)  ".$amount=$rt['donation'];$tota=$tota+$amount;}
if($rt['cashtype']=="donation"){echo "(+)  ".$amount=$rt['donation'];$tota=$tota+$amount;}
if($rt['cashtype']=="Refund"){echo "(-)  ".$amount=$rt['refund'];$tota=$tota-$amount;}
if($rt['cashtype']=="Extra Donation"){echo "(+)  ".$amount=$rt['donation'];$tota=$tota+$amount;}
?></td>
									<td class="numeric" data-title="Total:">
									  <?php echo $tota; ?></td>
									  
                                      
                                  </tr>
                                  
		<?php  $count++;}


?>
                                  </tbody>
                              </table>
                              <center>
                              <input type="button" onclick="printDiv('printableArea')" value="Print" />
                              <button onclick="exportToExcel('tblexportData')">Export To Excel</button>
                              </center></div>
                          </section>
                      </div><!-- /content-panel -->
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