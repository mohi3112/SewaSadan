<?php 
include('lcheck.php'); 
include("inc/config.php");
	$issuedt=time();
if(isset($_POST['save']))
{
   //print_r($_POST);
foreach($_POST as $k=>$v)
								{
									$$k=$v;
								}	
								$slip=$fnyear."/".$slip;
$t=time();
//////bedsheet query

	for($sa1=1;$sa1<=$bcount;$sa1++)
	{
	$srbs="select * from `stock_assets` where `asset_id`='${"bedsheet" . $sa1}';";
	$fsrbs=mysqli_query($con,$srbs);
	$rsbs=mysqli_fetch_array($fsrbs);
	
	 if(${"bedsheet" . $sa1}=="")
	 { 
	     
	 }
	 else
	 {
$bss="INSERT INTO `stock_asset_allocation` (`sr`, `asset_id`, `item_name`, `header_id`, `status`, `measures`, `stock_type`, `quality`, `color`, `count`, `stock_status`, `room`, `bed`, `booking_id`, `attended_name`, `ssid`, `slip`, `issue_date`, `return_date`, `issued_by`, `return_by`, `gno`, `extra2`, `extra3`, `extra4`) VALUES (NULL, '${"bedsheet" . $sa1}', '{$rsbs['item_name']}', '{$rsbs['header_id']}', 'active', '{$rsbs['measures']}', '{$rsbs['stock_type']}', '{$rsbs['quality']}', '{$rsbs['color']}', '1', 'issued', '$room', '$bed', '$booking', '$name', '$ssid', '$slip', '$t', '', '$usr', '', '$gno', '', '', '');";
mysqli_query($con,$bss);
$qutr22="UPDATE `stock_assets` SET `stock_status`='issued' WHERE `asset_id` = '${"bedsheet" . $sa1}' ;";
		mysqli_query($con,$qutr22);
	 }
 
	}	
///////pillow query
	for($sa2=1;$sa2<=$pcount;$sa2++)
	{
		$srbs1="select * from `stock_assets` where `asset_id`='${"pillow" . $sa2}';";
	$fsrbs1=mysqli_query($con,$srbs1);
	$rsbs1=mysqli_fetch_array($fsrbs1);
	
	 if(${"pillow" . $sa2}=="")
	 { 
	     
	 }
	 else
	 {
$pss="INSERT INTO `stock_asset_allocation` (`sr`, `asset_id`, `item_name`, `header_id`, `status`, `measures`, `stock_type`, `quality`, `color`, `count`, `stock_status`, `room`, `bed`, `booking_id`, `attended_name`, `ssid`, `slip`, `issue_date`, `return_date`, `issued_by`, `return_by`, `gno`, `extra2`, `extra3`, `extra4`) VALUES (NULL, '${"pillow" . $sa2}', '{$rsbs1['item_name']}', '{$rsbs1['header_id']}', 'active', '{$rsbs1['measures']}', '{$rsbs1['stock_type']}', '{$rsbs1['quality']}', '{$rsbs1['color']}', '1', 'issued', '$room', '$bed', '$booking', '$name', '$ssid', '$slip', '$t', '', '$usr', '', '$gno', '', '', '');";

 mysqli_query($con,$pss); 
 $qutr23="UPDATE `stock_assets` SET `stock_status`='issued' WHERE `asset_id` = '${"pillow" . $sa2}' ;";
 mysqli_query($con,$qutr23);
	 }
 
	}	
	/////////blanket query
	
	for($sa3=1;$sa3<=$blcount;$sa3++)
	{
	 $srbs2="select * from `stock_assets` where `asset_id`='${"blanket" . $sa3}';";
	$fsrbs2=mysqli_query($con,$srbs2);
	$rsbs2=mysqli_fetch_array($fsrbs2);
	
	 if(${"blanket" . $sa3}=="")
	 { 
	     
	 }
	 else
	 {
$blss="INSERT INTO `stock_asset_allocation` (`sr`, `asset_id`, `item_name`, `header_id`, `status`, `measures`, `stock_type`, `quality`, `color`, `count`, `stock_status`, `room`, `bed`, `booking_id`, `attended_name`, `ssid`, `slip`, `issue_date`, `return_date`, `issued_by`, `return_by`, `gno`, `extra2`, `extra3`, `extra4`) VALUES (NULL, '${"blanket" . $sa3}', '{$rsbs2['item_name']}', '{$rsbs2['header_id']}', 'active', '{$rsbs2['measures']}', '{$rsbs2['stock_type']}', '{$rsbs2['quality']}', '{$rsbs2['color']}', '1', 'issued', '$room', '$bed', '$booking', '$name', '$ssid', '$slip', '$t', '', '$usr', '', '$gno', '', '', '');";

mysqli_query($con,$blss);
 $qutr24="UPDATE `stock_assets` SET `stock_status`='issued' WHERE `asset_id` = '${"blanket" . $sa3}' ;";
 mysqli_query($con,$qutr24);

	 }
 
	}	
	////mattress query
		for($sa4=1;$sa4<=$mcount;$sa4++)
	{
		$srbs3="select * from `stock_assets` where `asset_id`='${"mattress" . $sa4}';";
	$fsrbs3=mysqli_query($con,$srbs3);
	$rsbs3=mysqli_fetch_array($fsrbs3);
	if($rsbs3['item_name']=="mattress"){$gno=$rsbs3['asset_id'];}
	 if(${"mattress" . $sa4}=="")
	 { 
	     
	 }
	 else
	 {
$mss="INSERT INTO `stock_asset_allocation` (`sr`, `asset_id`, `item_name`, `header_id`, `status`, `measures`, `stock_type`, `quality`, `color`, `count`, `stock_status`, `room`, `bed`, `booking_id`, `attended_name`, `ssid`, `slip`, `issue_date`, `return_date`, `issued_by`, `return_by`, `gno`, `extra2`, `extra3`, `extra4`) VALUES (NULL, '$gno', '{$rsbs3['item_name']}', '{$rsbs3['header_id']}', 'active', '{$rsbs3['measures']}', '{$rsbs3['stock_type']}', '{$rsbs3['quality']}', '{$rsbs3['color']}', '1', 'issued', '$room', '$bed', '$booking', '$name', '$ssid', '$slip', '$t', '', '$usr', '', '$gno', '', '', '');";

mysqli_query($con,$mss);
 $qutr25="UPDATE `stock_assets` SET `stock_status`='issued' WHERE `asset_id` = '${"mattress" . $sa4}' ;";
 mysqli_query($con,$qutr25);
        $qury2="UPDATE `rooms` SET `gno`='${"mattress" . $sa4}' WHERE `bookingid` = '$booking' ;";
		mysqli_query($con,$qury2);
	 }
 
	}	
	if($remote=="tv")
	{
	$rr="select * from `stock_assets` where `room`='$room' and `quality`='tv';";
	$rtv=mysqli_query($con,$rr);
	$rmtv=mysqli_fetch_array($rtv);
	
	$rm="INSERT INTO `stock_asset_allocation` (`sr`, `asset_id`, `item_name`, `header_id`, `status`, `measures`, `stock_type`, `quality`, `color`, `count`, `stock_status`, `room`, `bed`, `booking_id`, `attended_name`, `ssid`, `slip`, `issue_date`, `return_date`, `issued_by`, `return_by`, `gno`, `extra2`, `extra3`, `extra4`) VALUES (NULL, '{$rmtv['asset_id']}', '{$rmtv['item_name']}', '{$rmtv['header_id']}', 'active', '{$rmtv['measures']}', '{$rmtv['stock_type']}', '{$rmtv['quality']}', '{$rmtv['color']}', '1', 'issued', '$room', '$bed', '$booking', '$name', '$ssid', '$slip', '$t', '', '$usr', '', '', '', '', '');";
	mysqli_query($con,$rm);
	
	 $qutr26="UPDATE `stock_assets` SET `stock_status`='issued' WHERE `asset_id` = '{$rmtv['asset_id']}' ;";
 mysqli_query($con,$qutr26);
	}
	else if($remote=="ac"){
	$rr2="select * from `stock_assets` where `room`='$room' and `quality`='ac';";
	$rtv2=mysqli_query($con,$rr2);
	$rmtv2=mysqli_fetch_array($rtv2);
	
	$rm="INSERT INTO `stock_asset_allocation` (`sr`, `asset_id`, `item_name`, `header_id`, `status`, `measures`, `stock_type`, `quality`, `color`, `count`, `stock_status`, `room`, `bed`, `booking_id`, `attended_name`, `ssid`, `slip`, `issue_date`, `return_date`, `issued_by`, `return_by`, `gno`, `extra2`, `extra3`, `extra4`) VALUES (NULL, '{$rmtv2['asset_id']}', '{$rmtv2['item_name']}', '{$rmtv2['header_id']}', 'active', '{$rmtv2['measures']}', '{$rmtv2['stock_type']}', '{$rmtv2['quality']}', '{$rmtv2['color']}', '1', 'issued', '$room', '$bed', '$booking', '$name', '$ssid', '$slip', '$t', '', '$usr', '', '', '', '', '');";
	    		mysqli_query($con,$rm);
			 $qutr27="UPDATE `stock_assets` SET `stock_status`='issued' WHERE `asset_id` = '{$rmtv2['asset_id']}' ;";
			mysqli_query($con,$qutr27);		
	}
	else if($remote=="tvac"){
	$rr="select * from `stock_assets` where `room`='$room' and `quality`='tv';";
	$rtv=mysqli_query($con,$rr);
	$rmtv=mysqli_fetch_array($rtv);
	
	$rm="INSERT INTO `stock_asset_allocation` (`sr`, `asset_id`, `item_name`, `header_id`, `status`, `measures`, `stock_type`, `quality`, `color`, `count`, `stock_status`, `room`, `bed`, `booking_id`, `attended_name`, `ssid`, `slip`, `issue_date`, `return_date`, `issued_by`, `return_by`, `gno`, `extra2`, `extra3`, `extra4`) VALUES (NULL, '{$rmtv['asset_id']}', '{$rmtv['item_name']}', '{$rmtv['header_id']}', 'active', '{$rmtv['measures']}', '{$rmtv['stock_type']}', '{$rmtv['quality']}', '{$rmtv['color']}', '1', 'issued', '$room', '$bed', '$booking', '$name', '$ssid', '$slip', '$t', '', '$usr', '', '', '', '', '');";
	mysqli_query($con,$rm);
	 $qutr28="UPDATE `stock_assets` SET `stock_status`='issued' WHERE `asset_id` = '{$rmtv['asset_id']}' ;";
			mysqli_query($con,$qutr28);	
			
	$rr2="select * from `stock_assets` where `room`='$room' and `quality`='ac';";
	$rtv2=mysqli_query($con,$rr2);
	$rmtv2=mysqli_fetch_array($rtv2);
	
	$rm2="INSERT INTO `stock_asset_allocation` (`sr`, `asset_id`, `item_name`, `header_id`, `status`, `measures`, `stock_type`, `quality`, `color`, `count`, `stock_status`, `room`, `bed`, `booking_id`, `attended_name`, `ssid`, `slip`, `issue_date`, `return_date`, `issued_by`, `return_by`, `gno`, `extra2`, `extra3`, `extra4`) VALUES (NULL, '{$rmtv2['asset_id']}', '{$rmtv2['item_name']}', '{$rmtv2['header_id']}', 'active', '{$rmtv2['measures']}', '{$rmtv2['stock_type']}', '{$rmtv2['quality']}', '{$rmtv2['color']}', '1', 'issued', '$room', '$bed', '$booking', '$name', '$ssid', '$slip', '$t', '', '$usr', '', '', '', '', '');";
	 mysqli_query($con,$rm2);
	  $qutr29="UPDATE `stock_assets` SET `stock_status`='issued' WHERE `asset_id` = '{$rmtv2['asset_id']}' ;";
			mysqli_query($con,$qutr29);	
	}
	
	$qutr="UPDATE `visits` SET `store_status`='issued',`issue_by` = '$usr' WHERE `bookingid` = '$booking' ;";
		mysqli_query($con,$qutr);
	
	
	$qur22="UPDATE `rooms` SET `gno`='$gno' WHERE `bookingid` = '$booking' ;";
		mysqli_query($con,$qur22);	
	 
		$qur64="UPDATE `visits` SET `bedsheet` = '$bcount',`store_status`='issued', `mattress` = '$mcount', `pillow_cover` = '$pcount', `blanket` = '$blcount', `gno`='$gno',`extrabed`='$remotetv',`issue_by` = '$usr' WHERE `bookingid` = '$booking' ;";
		mysqli_query($con,$qur64);
	echo "<script> alert('Data Successfully Saved '); window.location.href='storepending.php';  </script>";
}

?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2> Check-In</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
						 <?php if(isset($_GET['calc']))
						  
						  {
							  foreach($_GET as $k=>$v)
								{
									$$k=$v;
								}
					/////////////////////////////POST START///////////////////////////////////////////////////
							  ?>
							 
						<form class="form-horizontal style-form" method="post" action="issue.php" enctype="multipart/form-data">
                        
						
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name:</label>
                              <div class="col-sm-10">
                                  
                                  <input type="hidden" name="slip"  value="<?php echo $_GET['slip'];?>">
                                  <input type="text" name="name"  readonly="readonly"  value="<?php echo $_GET['name'];?>" class="form-control">
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Booking ID:</label>
                              <div class="col-sm-10">
                                  <input type="text" name="booking"  readonly="readonly" value="<?php echo $_GET['booking'];?>" class="form-control">
                              </div>
                          </div>
				<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Room No:</label>
                              <div class="col-sm-10">
                                  <input type="text" name="room"  readonly="readonly" value="<?php echo $_GET['room'];?>" class="form-control">
								 
                              </div>
                          </div>
				        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bed No:</label>
                              <div class="col-sm-10">
                                  <input type="text" name="bed" readonly="readonly" value="<?php echo $_GET['bed'];?>" class="form-control">
								  
								   <input type="hidden" name="remote" readonly="readonly" value="<?php echo $_GET['remote'];?>" class="form-control">
								  
								  <input type="hidden" name="rcpt" value="<?php echo $_GET['rcpt'];?>">
                              </div>
                          </div>
						
						
						  
                         
							  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bedsheets:</label>
                              <div class="col-sm-10">
							   <input type="hidden" name="bcount" value="<?php echo $bcount;?>">
							  <?php for($w=1;$w<=$bcount;$w++)
							  { 
								$qr4="SELECT sum(count)as bsleft FROM `stock_assets` WHERE `item_name`='bedsheet' and `stock_status`='free';";
								$tr4=mysqli_query($con,$qr4);
								$a=mysqli_fetch_array($tr4);
								$bsleft=$a['bsleft'];
								if($bsleft>=$w){
								?>
							  <select name="bedsheet<?php echo $w;?>"  class="form-control show-tick" data-live-search="true">
							  <?php  
							   $bs="select * from `stock_assets` where `item_name` = 'Bedsheet' and `stock_status`='free';";
							  $rbs=mysqli_query($con,$bs);
								while($bsr=mysqli_fetch_array($rbs))
									{ ?>
							  
							  <option value="<?php echo $bsr['barcode'];?>"> <?php echo $bsr['item_name']."/".$bsr['color']."/".$bsr['quality']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bedsheet No -->>&nbsp;&nbsp;".$bsr['barcode'];?> </option>
							  
							  <?php  } ?>
							  </select>
								<?php }
										else{ echo "Sorry No More Bedsheets Left..";
											}				
										} ?>
							 
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Pillow Covers:</label>
                              <div class="col-sm-10">
                               <input type="hidden" name="pcount" value="<?php echo $pcount;?>">
								<?php for($y=1;$y<=$pcount;$y++)
							  { 
								$qr5="SELECT sum(count)as pleft FROM `stock_assets` WHERE `item_name`='pillow' and `stock_status`='free';";
								$tr5=mysqli_query($con,$qr5);
								$b=mysqli_fetch_array($tr5);
								$pleft=$b['pleft'];
								if($pleft>=$y){
								?>
							  <select name="pillow<?php echo $y;?>"  class="form-control show-tick" data-live-search="true">
							  <?php  
							   $bs2="select * from `stock_assets` where `item_name`='pillow' and `stock_status`='free';";
							  $rbs2=mysqli_query($con,$bs2);
								while($bsr2=mysqli_fetch_array($rbs2))
									{ ?>
							  
							  <option value="<?php echo $bsr2['barcode'];?>"> <?php echo $bsr2['item_name']."/".$bsr2['color']."/".$bsr2['quality']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pillow No -->>&nbsp;&nbsp;".$bsr2['barcode'];?> </option>
							  
							  <?php  } ?>
							  </select>
								<?php }
										else{ echo "Sorry No More Pillow Covers Left..";
											}				
										} ?>


                              </div>
                          </div>
                          	<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Blankets:</label>
                              <div class="col-sm-10">
							   <input type="hidden" name="blcount" value="<?php echo $blcount;?>">
							  <?php for($x=1;$x<=$blcount;$x++)
								{ 
								$qr5="SELECT sum(count)as blleft FROM `stock_assets` WHERE `item_name`='blanket' and `stock_status`='free';";
								$tr5=mysqli_query($con,$qr5);
								$c=mysqli_fetch_array($tr5);
								$blleft=$c['blleft'];
								if($blleft>=$x){
								?>
							  <select name="blanket<?php echo $x;?>"  class="form-control show-tick" data-live-search="true">
							  <?php  
							   $bs3="select * from `stock_assets` where `item_name`='blanket' and `stock_status`='free';";
							  $rbs3=mysqli_query($con,$bs3);
								while($bsr3=mysqli_fetch_array($rbs3))
									{ ?>
							  
							  <option value="<?php echo $bsr3['barcode'];?>"> <?php echo $bsr3['item_name']."/".$bsr3['color']."/".$bsr3['quality']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Blanket No -->>&nbsp;&nbsp;".$bsr3['barcode'];?> </option>
							  
							  <?php  } ?>
							  </select>
								<?php }
										else{ echo "Sorry No More blankets Left..";
											}				
										} ?>
                                 </div>
                          </div>
						  
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Mattress:</label>
                              <div class="col-sm-10">
							   <input type="hidden" name="mcount" value="<?php echo $mcount;?>">
                                 <?php for($z=1;$z<=$mcount;$z++)
								{ 
								$qr6="SELECT sum(count)as mleft FROM `stock_assets` WHERE `item_name`='mattress' and `stock_status`='free';";
								$tr6=mysqli_query($con,$qr6);
								$d=mysqli_fetch_array($tr6);
								$mleft=$d['mleft'];
								if($mleft>=$z){
								?>
							  <select name="mattress<?php echo $z;?>"  class="form-control show-tick" data-live-search="true">
							  <?php  
							   $bs4="select * from `stock_assets` where `item_name`='mattress' and `stock_status`='free';";
							  $rbs4=mysqli_query($con,$bs4);
								while($bsr4=mysqli_fetch_array($rbs4))
									{ ?>
							  
							  <option value="<?php echo $bsr4['barcode'];?>"> <?php echo $bsr4['item_name']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gadda No -->>&nbsp;&nbsp;".$bsr4['barcode'];?> </option>
							  
							  <?php  } ?>
							  </select>
								<?php }
										else{ echo "Sorry No More Mattress Left..";
											}				
										} ?>
							 
                              </div>
                          </div>
						  
                          
						  <div class="row mt">
                              
							  <div class="col-sm-6 text-center">
                                  <input type="submit" name="save" class="btn btn-round btn-default"/>
                              </div>
                          </div>
						
</form> 
							  <?php
							  
							  
						  } 
						  else {
							  
							  
							  /////////////////////////////GET START///////////////////////////////////////////////////
							  ?>
						
						
						<form class="form-horizontal style-form" method="get" action="issue.php" enctype="multipart/form-data">
                        
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
								  $tr="select * from `visits` where `bookingid`='$xbk' and `checkout_date` IS NULL;";
							  }
							  if($_GET['booking']!="")
							  {
								 $tr="select * from `visits` where `bookingid` = '$booking';";
							  }
	
	
	$rr=mysqli_query($con,$tr);
	$rt=mysqli_fetch_array($rr);
						  
						if($rt['store_status']=="issued")
						{
							echo "<script>alert('Already Issued..');window.location.href = window.location.pathname;</script>";
						}

						else
						{
							
						  ?>
						   
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name:</label>
                              <div class="col-sm-10">
                                  
                                  <input type="hidden" name="slip"  value="<?php echo $_GET['slip'];?>">
                                  <input type="text" name="name"  readonly="readonly"  value="<?php echo $rt['guestname'];?>" class="form-control">
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Booking ID:</label>
                              <div class="col-sm-10">
                                  <input type="text" name="booking"  readonly="readonly" value="<?php echo $rt['bookingid'];?>" class="form-control">
                              </div>
                          </div>
				<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Room No:</label>
                              <div class="col-sm-10">
                                  <input type="text" name="room"  readonly="readonly" value="<?php echo $rt['room_no']; ?>" class="form-control">
								
                              </div>
                          </div>
				        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bed No:</label>
                              <div class="col-sm-10">
                                  <input type="text" name="bed" readonly="readonly" value="<?php echo $rt['bed_no'];?>" class="form-control">
								  
								  
								  
								  <input type="hidden" name="rcpt" value="<?php echo  $xrt['reciptno']; ?>"><?php } ?>
                              </div>
                          </div>
						  
                         
							  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bedsheets:</label>
                              <div class="col-sm-10">
							  <select name="bcount"  class="form-control show-tick" data-live-search="true">
							  <?php for($w=0;$w<6;$w++)
							  {
								 echo "<option value='".$w."'>".$w."</option>"; 
							  }?>
							  </select>
							  
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Pillow Covers:</label>
                              <div class="col-sm-10">
                                  <select name="pcount"  class="form-control show-tick" data-live-search="true">
							  <?php for($y=0;$y<6;$y++)
							  {
								 echo "<option value='".$y."'>".$y."</option>"; 
							  }?>
							  </select>
								 
                              </div>
                          </div>
                          	<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Mattress:</label>
                              <div class="col-sm-10">
							  <select name="mcount"  class="form-control show-tick" data-live-search="true">
							  <?php for($u=0;$u<6;$u++)
							  {
								 echo "<option value='".$u."'>".$u."</option>"; 
							  }?>
							  </select>
                                 </div>
                          </div>
						  
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Blankets:</label>
                              <div class="col-sm-10">
                                 <select name="blcount"  class="form-control show-tick" data-live-search="true">
							  <?php for($t=0;$t<6;$t++)
							  {
								 echo "<option value='".$t."'>".$t."</option>"; 
							  }?>
							  </select>
								 
                              </div>
                          </div>
						  	
							<?php
							if($rt['room_no']>200 && $rt['room_no']<300)
							{
							if($rt['bed_no']=='1')
								{	?>
							<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Remotes:</label>
                              <div class="col-sm-10">
                                 <select name="remote"  class="form-control show-tick" data-live-search="true">
							  <option value="none">Select An Option</option>
							  <option value="tv">TV</option>
							  <option value="ac">AC</option>
							  <option value="tvac">TV + AC</option>
							  </select>
								 
                              </div>
                          </div>
								<?php
							}}
							?>


						  
							 
						  
						  <div class="row mt">
                              
							  <div class="col-sm-6 text-center">
                                  <input type="submit" name="calc" class="btn btn-round btn-default"/>
                              </div>
                          </div>
						
</form> <?php
						  }
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