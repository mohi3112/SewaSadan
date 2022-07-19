<?php include('lcheck.php'); 
include("inc/config.php");
date_default_timezone_set('Asia/Kolkata');
?>

<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Room / Hall List</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<table width="100%" cellspacing="6px" style="padding-top:100px;background-color:#ccc;" align="center" width="100%" bgcolor="#ccc">
						  <form method="get" action="allroom.php">
						  <td>Select Date: <input type="date" name="start"></td><td><input type="submit" name="chk" value="search"></td>
						  </tr>
						  </table> 
						  <div id="printableArea" style="width:100%;height:90%;">
				<style>table tr td{font-size:12px;}</style>
						  <?php
						  if(isset($_GET['chk']))
							{
								foreach($_GET as $k=>$v)
									{
										$$k=$v;
									}
									$ruk=$start." 23:59:59";
							$strt=strtotime($ruk);
								
								$d=date('d',$strt);$m=date('m',$strt);$y=date('Y',$strt);
								
							}
							else
							{ 
								 $strt=time();
								$d=date('d',time());$m=date('m',time());$y=date('Y',time());
							}
						  ?>
						  
                          <div class='row mt'style='padding-left:15px;'>
						  <div class="col-sm-4">
								<table border=1 width="100%">
								<tr><td colspan="6"><b><center>Private Rooms 1st Floor</center></b></td></tr>
								<tr > 
								<td width="5%">Sr</td> 
								<td width="15%">Arrival Date</td> 
								<td width="22%">Name</td> 
								<td width="10%">Slip</td> 
								<td  width="15%">Valid Date</td> 
							 
								</tr>
								
			 <?php 

								 $cntp=113;
			 
			 for($j=101;$j<=$cntp;$j++)
								{ 
                                   
                                $ahp1="select * from `visits` where `room_no`='$j' and `bed_no`='1' and `checkin_date` < '$strt' and `checkout_date` IS NULL;;";
								$myrep = mysqli_query($con,$ahp1);
								$mresp1 = mysqli_fetch_array($myrep);
								$bidp=$mresp1['bookingid'];
								$rp12="select * from `cash` where `bookinid`='$bidp' and `cashtype`='advance';";
								$mtyp=mysqli_query($con,$rp12);
								$mtyrp=mysqli_fetch_array($mtyp);
								?>
								<tr style="<?php if(isset($mresp1)){ echo "color:#000;background-color:#f87c7c;";}else{echo "color:#000;background-color:#2da140;";}?>"> 
								<td><?php echo $j; ?></td> 
								
								<td><?php $yyy=date('d-m-Y',$mresp1['checkin_date']); if($yyy=='01-01-1970'){echo "N/A";}else{echo $yyy;}?></td> 
								<td><?php echo $mresp1['guestname']; ?></td> 
								<td><?php echo $mtyrp['slip']; ?></td> 
								<td><?php  $xxxx=date('d-m-Y',$mresp1['ren_date']); if($xxxx=='01-01-1970'){echo "N/A";}else{echo $xxxx;}?></td> 
								
								</tr>
								

								<?php
								
                            }
			
							?>
			  </table>
								
								</div>
								
							
							




                                <div class="col-sm-4">
								<table border=1 width="100%">
								<tr><td colspan="6"><b><center>Private Rooms 2nd Floor</center></b></td></tr>
								<tr > 
								<td width="5%">Sr</td> 
								<td width="15%">Arrival Date</td> 
								<td width="22%">Name</td> 
								<td width="10%">Slip</td> 
								<td  width="15%">Valid Date</td> 
							 
								</tr>
								
			 <?php 

								 $cntp=215;
			 
			 for($j=201;$j<=$cntp;$j++)
								{ $ahp1="select * from `visits` where `room_no`='$j' and `bed_no`='1' and `checkin_date` < '$strt' and `checkout_date` IS NULL;;";
								$myrep = mysqli_query($con,$ahp1);
								$mresp1 = mysqli_fetch_array($myrep);
								$bidp=$mresp1['bookingid'];
								$rp12="select * from `cash` where `bookinid`='$bidp' and `cashtype`='advance';";
								$mtyp=mysqli_query($con,$rp12);
								$mtyrp=mysqli_fetch_array($mtyp);
								?>
								<tr style="<?php if(isset($mresp1)){ echo "color:#000;background-color:#f87c7c;";}else{echo "color:#000;background-color:#2da140;";}?>"> 
								<td><?php echo $j; ?></td> 
								
								<td><?php $yyy=date('d-m-Y',$mresp1['checkin_date']); if($yyy=='01-01-1970'){echo "N/A";}else{echo $yyy;}?></td> 
								<td><?php echo $mresp1['guestname']; ?></td> 
								<td><?php echo $mtyrp['slip']; ?></td> 
								<td><?php  $xxxx=date('d-m-Y',$mresp1['ren_date']); if($xxxx=='01-01-1970'){echo "N/A";}else{echo $xxxx;}?></td> 
								
								</tr>
								

								<?php
								}
			 
			
							?>
			  </table>
								
								</div>
								
							
							






							
							
							 <div class="col-sm-4">
								<table border=1 width="100%">
								<tr><td colspan="6"><b><center>Private Rooms 3rd Floor</center></b></td></tr>
								<tr > 
								<td width="5%">Sr</td> 
								<td width="15%">Arrival Date</td> 
								<td width="22%">Name</td> 
								<td width="10%">Slip</td> 
								<td  width="15%">Valid Date</td> 
							 
								</tr>
								
			 <?php 

								 $cntp=313;
			 
			 for($j=301;$j<=$cntp;$j++)
								{ $ahp1="select * from `visits` where `room_no`='$j' and `bed_no`='1' and `checkin_date` < '$strt' and `checkout_date` IS NULL;;";
								$myrep = mysqli_query($con,$ahp1);
								$mresp1 = mysqli_fetch_array($myrep);
								$bidp=$mresp1['bookingid'];
								$rp12="select * from `cash` where `bookinid`='$bidp' and `cashtype`='advance';";
								$mtyp=mysqli_query($con,$rp12);
								$mtyrp=mysqli_fetch_array($mtyp);
								?>
								<tr style="<?php if(isset($mresp1)){ echo "color:#000;background-color:#f87c7c;";}else{echo "color:#000;background-color:#2da140;";}?>"> 
								<td><?php echo $j; ?></td> 
								
								<td><?php $yyy=date('d-m-Y',$mresp1['checkin_date']); if($yyy=='01-01-1970'){echo "N/A";}else{echo $yyy;}?></td> 
								<td><?php echo $mresp1['guestname']; ?></td> 
								<td><?php echo $mtyrp['slip']; ?></td> 
								<td><?php  $xxxx=date('d-m-Y',$mresp1['ren_date']); if($xxxx=='01-01-1970'){echo "N/A";}else{echo $xxxx;}?></td> 
								
								</tr>
								

								<?php
								}
			 
			
							?>
			  </table>
								
              </div></div>
              <hr style="width:100%;color:#F00;">
							
                                <div class='row mt' style='padding-left:15px;'>
                                <?php 
$qr="select * from `rooms` WHERE `room_no` = '100' group by `room_no` order by `room_no`;";
						  $result = mysqli_query($con,$qr);
							while($row = mysqli_fetch_array($result))
							{ //print_r($row);
								$rm=$row['room_no'];
						
								//echo $row2['max']."<br>";
							 ?>
								<div class="col-sm-4">
								<table border=1>
								<tr><td colspan="6"><b><center><?php echo "Room No ".$rm; ?></center></b></td></tr>
								<tr > 
								<td width="5%">Sr</td> 
								<td width="15%">Arrival Date</td> 
								<td width="22%">Name</td> 
								<td width="10%">Slip</td> 
								<td  width="15%">Valid Date</td> 
								<td width="5%">G.No</td> 
								</tr>
								
								<?php $mycoun="select count(sr) as roomcount from `rooms` where `room_no`='$rm';";
								$mycount = mysqli_query($con,$mycoun);
								$count = mysqli_fetch_array($mycount);
								 $cnt=$count['roomcount'];
								for($i=1;$i<=$cnt;$i++)
								{$ah1="select * from `visits` where `room_no`='$rm' and `bed_no`='$i' and `checkin_date` < '$strt' and `checkout_date` IS NULL;";
								$myre = mysqli_query($con,$ah1);
								$mres1 = mysqli_fetch_array($myre);
								$bid=$mres1['bookingid'];
								$r12="select * from `cash` where `bookinid`='$bid' and `cashtype`='advance';";
								$mty=mysqli_query($con,$r12);
								$mtyr=mysqli_fetch_array($mty);
								?>
								<tr style="<?php if(isset($mres1)){ echo "color:#000;background-color:#f87c7c;";}else{echo "color:#000;background-color:#2da140;";}?>"> 
								<td><?php echo $i; ?></td> 
								
								<td><?php $yyy=date('d-m-Y',$mres1['checkin_date']); if($yyy=='01-01-1970'){echo "N/A";}else{echo $yyy;}?></td> 
								<td><?php echo $mres1['guestname']; ?></td> 
								<td><?php echo $mtyr['slip']; ?></td> 
								<td><?php  $xxxx=date('d-m-Y',$mres1['ren_date']); if($xxxx=='01-01-1970'){echo "N/A";}else{echo $xxxx;}?></td> 
								<td><?php echo $mres1['gno']; ?></td> 
								</tr>
								

								<?php 
								}
								?>
								</table>
								
								</div>
								<?php
								
							
							}
							
						  ?>	
							
							
							<?php 
$qr="select * from `rooms` WHERE `room_no` = '200' group by `room_no` order by `room_no`;";
						  $result = mysqli_query($con,$qr);
							while($row = mysqli_fetch_array($result))
							{ //print_r($row);
								$rm=$row['room_no'];
						
								//echo $row2['max']."<br>";
							 ?>
								<div class="col-sm-4">
								<table border=1>
								<tr><td colspan="6"><b><center><?php echo "Room No ".$rm; ?></center></b></td></tr>
								<tr > 
								<td width="5%">Sr</td> 
								<td width="15%">Arrival Date</td> 
								<td width="22%">Name</td> 
								<td width="10%">Slip</td> 
								<td  width="15%">Valid Date</td> 
								<td width="5%">G.No</td> 
								</tr>
								
								<?php $mycoun="select count(sr) as roomcount from `rooms` where `room_no`='$rm';";
								$mycount = mysqli_query($con,$mycoun);
								$count = mysqli_fetch_array($mycount);
								 $cnt=$count['roomcount'];
								for($i=1;$i<=$cnt;$i++)
								{$ah1="select * from `visits` where `room_no`='$rm' and `bed_no`='$i' and `checkin_date` < '$strt' and `checkout_date` IS NULL;";
								$myre = mysqli_query($con,$ah1);
								$mres1 = mysqli_fetch_array($myre);
								$bid=$mres1['bookingid'];
								$r12="select * from `cash` where `bookinid`='$bid' and `cashtype`='advance';";
								$mty=mysqli_query($con,$r12);
								$mtyr=mysqli_fetch_array($mty);
								?>
								<tr style="<?php if(isset($mres1)){ echo "color:#000;background-color:#f87c7c;";}else{echo "color:#000;background-color:#2da140;";}?>"> 
								<td><?php echo $i; ?></td> 
								
								<td><?php $yyy=date('d-m-Y',$mres1['checkin_date']); if($yyy=='01-01-1970'){echo "N/A";}else{echo $yyy;}?></td> 
								<td><?php echo $mres1['guestname']; ?></td> 
								<td><?php echo $mtyr['slip']; ?></td> 
								<td><?php  $xxxx=date('d-m-Y',$mres1['ren_date']); if($xxxx=='01-01-1970'){echo "N/A";}else{echo $xxxx;}?></td> 
								<td><?php echo $mres1['gno']; ?></td> 
								</tr>
								

								<?php 
								}
								?>
								</table>
								
								</div>
								<?php
								
							
							}
							
						  ?>	
							
							
							<?php 
$qr="select * from `rooms` WHERE `room_no` = '300' group by `room_no` order by `room_no`;";
						  $result = mysqli_query($con,$qr);
							while($row = mysqli_fetch_array($result))
							{ //print_r($row);
								$rm=$row['room_no'];
						
								//echo $row2['max']."<br>";
							 ?>
								<div class="col-sm-4">
								<table border=1>
								<tr><td colspan="6"><b><center><?php echo "Room No ".$rm; ?></center></b></td></tr>
								<tr > 
								<td width="5%">Sr</td> 
								<td width="15%">Arrival Date</td> 
								<td width="22%">Name</td> 
								<td width="10%">Slip</td> 
								<td  width="15%">Valid Date</td> 
								<td width="5%">G.No</td> 
								</tr>
								
								<?php $mycoun="select count(sr) as roomcount from `rooms` where `room_no`='$rm';";
								$mycount = mysqli_query($con,$mycoun);
								$count = mysqli_fetch_array($mycount);
								 $cnt=$count['roomcount'];
								for($i=1;$i<=$cnt;$i++)
								{$ah1="select * from `visits` where `room_no`='$rm' and `bed_no`='$i' and `checkin_date` < '$strt' and `checkout_date` IS NULL;";
								$myre = mysqli_query($con,$ah1);
								$mres1 = mysqli_fetch_array($myre);
								$bid=$mres1['bookingid'];
								$r12="select * from `cash` where `bookinid`='$bid' and `cashtype`='advance';";
								$mty=mysqli_query($con,$r12);
								$mtyr=mysqli_fetch_array($mty);
								?>
								<tr style="<?php if(isset($mres1)){ echo "color:#000;background-color:#f87c7c;";}else{echo "color:#000;background-color:#2da140;";}?>"> 
								<td><?php echo $i; ?></td> 
								
								<td><?php $yyy=date('d-m-Y',$mres1['checkin_date']); if($yyy=='01-01-1970'){echo "N/A";}else{echo $yyy;}?></td> 
								<td><?php echo $mres1['guestname']; ?></td> 
								<td><?php echo $mtyr['slip']; ?></td> 
								<td><?php  $xxxx=date('d-m-Y',$mres1['ren_date']); if($xxxx=='01-01-1970'){echo "N/A";}else{echo $xxxx;}?></td> 
								<td><?php echo $mres1['gno']; ?></td> 
								</tr>
								

								<?php 
								}
								?>
								</table>
								
								</div>
								<?php
								
							
							}
							
						  ?>	
							
							
							
							
								
	<!--
						  <div class="col-sm-4">
								<table border=1>
								<tr><td colspan="7"><b><center>Extra Beds 3rd Floor</center></b></td></tr>
								<tr > 
								<td width="5%">Room</td> <td width="5%">Bed</td> 
								<td width="20%">Arrival Date</td> 
								<td width="20%">Name</td> 
								<td width="8%">Slip</td> 
								<td  width="15%">Valid Date</td> <td>G No</td> 
							
								</tr>
                        
								
			 <?php /*

								$ahpo1="select * from `visits` where `room_no` > '300' and `checkin_date` < '$strt' and `checkout_date` IS NULL and `bed_no` like 'extra%'  order by `room_no`;";
								$myrepo = mysqli_query($con,$ahpo1);
								while($mrespo1 = mysqli_fetch_array($myrepo))
								{ 
								$bidpo=$mrespo1['bookingid'];
								$rpo12="select * from `cash` where `bookinid`='$bidpo' and `cashtype`='advance';";
								$mtypo=mysqli_query($con,$rpo12);
								$mtyrpo=mysqli_fetch_array($mtypo);
								
                                
                                ?>
								
                                <tr style="<?php if(isset($mrespo1)){ echo "color:#000;background-color:#f87c7c;";}else{echo "color:#000;background-color:#2da140;";}?>"> 
								
								<td><?php echo $mrespo1['room_no']; ?></td>
							<td><?php echo $mrespo1['bed_no']; ?></td>								
								<td><?php $yyy=date('d-m-Y',$mrespo1['checkin_date']); if($yyy=='01-01-1970'){echo "N/A";}else{echo $yyy;}?></td> 
								<td><?php echo $mrespo1['guestname']; ?></td> 
								<td><?php echo $mtyrpo['slip']; ?></td> 
								<td><?php  $xxxxo=date('d-m-Y',$mrespo1['ren_date']); if($xxxxo=='01-01-1970'){echo "N/A";}else{echo $xxxxo;}?></td> 
								<td><?php echo $mrespo1['gno'];?></td> 
								
								</tr>
								

								<?php
								}
			 
			
							?>
			  </table>
								
								</div>
    
    
    
    
    
    
    
    
    <!--
						  <div class="col-sm-4">
								<table border=1>
								<tr><td colspan="7"><b><center>Extra Beds 2nd Floor</center></b></td></tr>
								<tr > 
								<td width="5%">Room</td> <td width="5%">Bed</td> 
								<td width="20%">Arrival Date</td> 
								<td width="20%">Name</td> 
								<td width="8%">Slip</td> 
								<td  width="15%">Valid Date</td> <td>G No</td> 
							
								</tr>
								
			 <?php  /*

								$ahpo1="select * from `visits` where `room_no` between 200 and 300 and `checkin_date` < '$strt' and `checkout_date` IS NULL and `bed_no` like 'extra%'  order by `room_no`;";
								$myrepo = mysqli_query($con,$ahpo1);
								while($mrespo1 = mysqli_fetch_array($myrepo))
								{ 
								$bidpo=$mrespo1['bookingid'];
								$rpo12="select * from `cash` where `bookinid`='$bidpo' and `cashtype`='advance';";
								$mtypo=mysqli_query($con,$rpo12);
								$mtyrpo=mysqli_fetch_array($mtypo);
								?>
								<tr style="<?php if(isset($mrespo1)){ echo "color:#000;background-color:#f87c7c;";}else{echo "color:#000;background-color:#2da140;";}?>"> 
								
								<td><?php echo $mrespo1['room_no']; ?></td>
							<td><?php echo $mrespo1['bed_no']; ?></td>								
								<td><?php $yyy=date('d-m-Y',$mrespo1['checkin_date']); if($yyy=='01-01-1970'){echo "N/A";}else{echo $yyy;}?></td> 
								<td><?php echo $mrespo1['guestname']; ?></td> 
								<td><?php echo $mtyrpo['slip']; ?></td> 
								<td><?php  $xxxxo=date('d-m-Y',$mrespo1['ren_date']); if($xxxxo=='01-01-1970'){echo "N/A";}else{echo $xxxxo;}?></td> 
								<td><?php echo $mrespo1['gno'];?></td> 
								
								</tr>
								

								<?php
								}
			 
			
						*/ 	?>
			  </table>
								
								</div>
    -->
                      
                      
                      
                      
                      </div>
                      
                       <hr style="width:100%;color:#F00;">
							
                                <div class='row' style='padding-left:15px;'>
                      	
							
							<?php 
$qr="select * from `rooms` WHERE `room_no` = '400' group by `room_no` order by `room_no`;";
						  $result = mysqli_query($con,$qr);
							while($row = mysqli_fetch_array($result))
							{ //print_r($row);
								$rm=$row['room_no'];
						
								//echo $row2['max']."<br>";
							 ?>
								<div class="col-lg-12">
								<table border=1 align="center">
								<tr><td colspan="6"><b><center><?php echo "Room No ".$rm; ?></center></b></td></tr>
								<tr > 
								<td width="5%">Sr</td> 
								<td width="15%">Arrival Date</td> 
								<td width="22%">Name</td> 
								<td width="10%">Slip</td> 
								<td  width="15%">Valid Date</td> 
								<td width="5%">G.No</td> 
								</tr>
								
								<?php $mycoun="select count(sr) as roomcount from `rooms` where `room_no`='$rm';";
								$mycount = mysqli_query($con,$mycoun);
								$count = mysqli_fetch_array($mycount);
								 $cnt=$count['roomcount'];
								for($i=1;$i<=$cnt;$i++)
								{$ah1="select * from `visits` where `room_no`='$rm' and `bed_no`='$i' and `checkin_date` < '$strt' and `checkout_date` IS NULL;";
								$myre = mysqli_query($con,$ah1);
								$mres1 = mysqli_fetch_array($myre);
								$bid=$mres1['bookingid'];
								$r12="select * from `cash` where `bookinid`='$bid' and `cashtype`='advance';";
								$mty=mysqli_query($con,$r12);
								$mtyr=mysqli_fetch_array($mty);
								?>
								<tr style="<?php if(isset($mres1)){ echo "color:#000;background-color:#f87c7c;";}else{echo "color:#000;background-color:#2da140;";}?>"> 
								<td><?php echo $i; ?></td> 
								
								<td><?php $yyy=date('d-m-Y',$mres1['checkin_date']); if($yyy=='01-01-1970'){echo "N/A";}else{echo $yyy;}?></td> 
								<td><?php echo $mres1['guestname']; ?></td> 
								<td><?php echo $mtyr['slip']; ?></td> 
								<td><?php  $xxxx=date('d-m-Y',$mres1['ren_date']); if($xxxx=='01-01-1970'){echo "N/A";}else{echo $xxxx;}?></td> 
								<td><?php echo $mres1['gno']; ?></td> 
								</tr>
								

								<?php 
								}
								?>
								</table>
								
								</div>
								<?php
								
							
							}
							
						  ?>	
							
						</div>
                      
                      </div>
                      
                      
                      
                      
                      
                      
                      </div><!-- /content-panel -->
					  </div>
                  </div><!-- /col-lg-12 -->
              </div><!-- /row -->
			  <input type="button" onclick="printDiv('printableArea')" value="Print" />
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