<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
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
					<table width="100%" cellspacing="6px" style="padding-top:100px;background-color:#ccc;" align="center" width="100%" bgcolor="#ccc">
						  <form method="get" action="occupancyreport.php">
						  <td>Start Date: <input type="date" name="start"></td><td><input type="submit" name="chk" value="search"></td>
						  </tr>
						  </table> 
						  <br><br>
						
<section id="no-more-tables" width="100%"><div id="printableArea" style="width:100%;height:90%;">
	
                              <table id="tblexportData" class="table table-bordered table-striped table-condensed cf" >
                                  <thead class="cf">
								  <tr>
								  <th colspan=6>Checkin New Entries</th>
								  <th colspan=3>Extra Bed</th>
								  <th colspan=3>Private Rooms</th>
								  <th colspan=5>Checkout New Entries</th>
								    <th colspan=4>Checkout</th>
								 
								  <th>Bed</th>
								  <th>Room</th>
								  <th>Ex Bed</th>
								  <th>Vacant</th>
								  <th>Vacant</th>
								  <th>Per</th>
								  </tr>
                                  <tr>
								  <th class="numeric">Date:</th>
								  <th class="numeric">Day:</th>
								  <th class="numeric">Night:</th>
								  <th class="numeric">Total:</th>
								  <th class="numeric">150:</th>
								  <th class="numeric">300:</th>								  
								  <th class="numeric">Day:</th>
								  <th class="numeric">Night:</th>
								  <th class="numeric">Total:</th>
								  
								   <th class="numeric">Day:</th>
								  <th class="numeric">Night:</th>
								  <th class="numeric">Total:</th>
								  
								  <th class="numeric">Day:</th>
								  <th class="numeric">Night:</th>
								  <th class="numeric">300:</th>
								  <th class="numeric">150:</th>
								  <th class="numeric">Total:</th>
								  
								  <th class="numeric">Bed:</th>
								  <th class="numeric">Room:</th>
								  <th class="numeric">Extra:</th>
								  <th class="numeric">Total:</th>
								  
								  <th>Occupied</th>
								  <th>Occupied</th>
								  <th>Occupied</th>
								  <th>Bed</th>
								  <th>Room</th>
								  
								  </tr>
								  
                                  </thead>
                                  <tbody>						  
						  
						  
						  
	<?php					 
if(isset($_GET['chk']))
{
	foreach($_GET as $k=>$v)
		{
			$$k=$v;
		}
		
	$st=strtotime($start);
	$ft=date('-m-Y',$st);
	$d=date('j',$st);
	$m=date('m',$st);
	$yy=date('Y',$st);
	$ft=date('-m-Y',$st);
 $stt="01".$ft." 00:00:00";
	$mystart=strtotime($stt);
	
	$et=date('m',$st);
	if($et==1){$dd=31;}
	if($et==2){$dd=28;}
	if($et==3){$dd=31;}
	if($et==4){$dd=30;}
	if($et==5){$dd=31;}
	if($et==6){$dd=30;}
	if($et==7){$dd=31;}
	if($et==8){$dd=31;}
	if($et==9){$dd=30;}
	if($et==10){$dd=31;}
	if($et==11){$dd=30;}
	if($et==12){$dd=31;}

$enn=$dd.$ft." 23:59:59";
	$myentime=strtotime($enn);
 
 $rmp=mysqli_query($con,"select * from `rooms` where `room_no` between 200 and 300 and `bed_no`= 1 ;");
$all_rooms = mysqli_num_rows($rmp);
$rmp9=mysqli_query($con,"select * from `rooms` where `room_no` between 200 and 300 and `bed_no` like 'extra%' ;");
$all_extra = mysqli_num_rows($rmp9);

	$rmp3=mysqli_query($con,"select * from `rooms` where `room_no` not between 200 and 300;");
$all_hall_bed = mysqli_num_rows($rmp3);

	
 for($y=1;$y<=$dd;$y++)
{	

$today=$y."-".$et."-".$yy."%";
///////////CHECKIN DATES AND FORM//////////////
///////////////MORNING SHIFT///////////////////
$daystart=$y."-".$et."-".$yy." 08:00:00";
$minstart=strtotime($daystart);
$minstop=$minstart+43200;
$abc=mysqli_query($con,"SELECT * FROM `visits` WHERE `checkin_date` between '$minstart' and '$minstop';");
$morningin= mysqli_num_rows($abc);$renew=0;$exchange=0;
while($morningindata=mysqli_fetch_array($abc))
{
	if($morningindata['bed_charge']==300){$twoin++;}
	if($morningindata['bed_charge']==150){$onein++;}
	if($morningindata['bed_charge']==950){$pvtmorningin++;}
	if($morningindata['room_no']>200 && $morningindata['room_no']<300)
	{ $roommorningin++;}else{ $hallmorningin++;}
	if($morningindata['bed_no']=='extra1' || $morningindata['bed_no']=='extra2')
	{$extramorningin++;}
	
 if($morningindata['visit_type']=='Renew'){$renew++;}
  if($morningindata['visit_type']=='Exchange'){$exchange++;}
}
///////////////NIGHT SHIFT///////////////////

$ninstop=$minstop+43200;
$nabc=mysqli_query($con,"SELECT * FROM `visits` WHERE `checkin_date` between '$minstop' and '$ninstop';");
while($nightindata=mysqli_fetch_array($nabc))
{
	if($nightindata['bed_charge']==300){$twoin++;}
	if($nightindata['bed_charge']==150){$onein++;}
if($nightindata['bed_charge']==950){$pvtnightin++;}
if($nightindata['room_no']>200 && $nightindata['room_no']<300)
	{$roomnightin++;}else{ $hallnightin++;}
	if($nightindata['bed_no']=='extra1' || $nightindata['bed_no']=='extra2')
	{$extranightin++;}
		
 if($nightindata['visit_type']=='Renew'){$renew++;}
  if($nightindata['visit_type']=='Exchange'){$exchange++;}
}
$nightin= mysqli_num_rows($nabc);
/////////////////////////////////////////////

///////////CHECKOUT DATES AND FORM//////////////
///////////////MORNING SHIFT///////////////////
$daystart2=$y."-".$et."-".$yy." 00:00:00";
$moutstart=strtotime($daystart2);
$moutstop=$moutstart+43200;
$xyz=mysqli_query($con,"SELECT * FROM `visits` WHERE `checkout_date` between '$moutstart' and '$moutstop';");
while($morningoutdata=mysqli_fetch_array($xyz))
{
	if($morningoutdata['bed_charge']==300){$twoout++;}
	if($morningoutdata['bed_charge']==950){$pvtmorningout++;}
	if($morningoutdata['bed_charge']==150){$oneout++;}
	if($morningoutdata['room_no']>200 && $morningoutdata['room_no']<300)
	{$roommorningout++;}else{ $hallmorningout++;}
	if($morningoutdata['bed_no']=='extra1' || $morningoutdata['bed_no']=='extra2')
	{$extramorningout++;}
}
$morningout= mysqli_num_rows($xyz);
///////////////NIGHT SHIFT///////////////////
$noutstart=$moutstop;
$noutstop=$moutstop+43200;
$aaho="SELECT * FROM `visits` WHERE `checkout_date` between '$noutstart' and '$noutstop';";
$xyz2=mysqli_query($con,$aaho);
while($nightoutdata=mysqli_fetch_array($xyz2))
{$nightout++;
	if($nightoutdata['bed_charge']==300){$twoout++;}
	if($nightoutdata['bed_charge']==150){$oneout++;}
	if($nightoutdata['bed_charge']==950){$pvtnightout++;}
	if($nightoutdata['room_no']>200 && $nightoutdata['room_no']<300)
	{$roomnightout++;}else{ $hallnightout++;}
	if($nightoutdata['bed_no']=='extra1' || $nightoutdata['bed_no']=='extra2')
	{$extranightout++;}
}

/////////////////////////////////////////////
$daystart3=$y."-".$et."-".$yy." 00:00:00";
$rstart=strtotime($daystart3);
 $trtrtr="SELECT * FROM `visits` WHERE '$rstart' BETWEEN `checkin_date` and `checkout_date` and `bed_charge` != 0;";
$haha=mysqli_query($con,"SELECT * FROM `visits` WHERE '$rstart' BETWEEN `checkin_date` and `checkout_date` and `bed_charge` != 0;");
$occroom=0;$occhall=0;$occextra=0;
while($occ=mysqli_fetch_array($haha))
{

	
    if($occ['room_no']>200 && $occ['room_no']<300 && $occ['bed_no']==1 )
	{ $occroom++;}
	if($occ['bed_no']=='extra1' || $occ['bed_no']=='extra2' )
	{ $myoccextra++;}
	if($occ['room_no']>0 && $occ['room_no']<200 ||$occ['room_no']>300 && $occ['room_no']<500)
	{$occhall++;}
}

	$finalroommorningin=$roommorningin-$extramorningin;
	$finalroomnightin=$roomnightin-$extranightin;
	$froom=$finalroommorningin+$finalroomnightin;
	$finalroommorningout=$roommorningout-$extramorningout;
	$finalroomnightout=$roomnightout-$extranightout;
	$froomout=$finalroommorningout+$finalroomnightout;
	$extout=$extramorningout+$extranightout;
	$extin=$extramorningin+$extranightin;
	 $totalsout=$morningout+$nightout; 
	 $totalin=$morningin+$nightin;
	 $totalhallin=$onein+$twoin-$extin-$exchange-$renew;
	 $pvtin=$pvtnightin+$pvtmorningin;
	?>
	<tr>
<td data-title="Date:"><?php echo $y."/".$m; ?></td>
<td data-title="Day:"><?php echo $morningin; ?></td>
<td data-title="Night:"><?php echo $nightin; ?></td>
<td data-title="Total:"><?php echo $totalin=$morningin+$nightin;  ?></td>
<td data-title="100:"><?php echo $onein; ?></td>
<td data-title="200:"><?php echo $twoin; ?></td>
<td data-title="Day:"><?php echo $extramorningin;  ?></td>
<td data-title="Night:"><?php echo $extranightin;  ?></td>
<td data-title="Total:"><?php echo $totalextrain=$extramorningin+$extranightin;  ?></td>
<td data-title="Day:"><?php echo $finalroommorningin;  ?></td>
<td data-title="Night:"><?php echo $finalroomnightin;  ?></td>
<td data-title="Total:"><?php echo $froom;  ?></td>
<td data-title="Day:"><?php echo $morningout; ?></td>
<td data-title="Night:"><?php echo $nightout;  ?></td>
	<td data-title="200:"><?php echo $twoout; ?></td>
	<td data-title="100:"><?php echo $oneout; ?></td>

	
	
	<td data-title="Total:"><?php echo  $totalsout; ?></td>
	<td data-title="Beds:"><?php echo $thallouts=$twoout+$oneout-$extout;?></td>
	<td data-title="Rooms:"><?php echo  $mstrchkout=$pvtmorningout+$pvtnightout; ?></td>
	<td data-title="Extra:"><?php echo  $extout; $extout=0;?></td>
	<td data-title="Total:"><?php echo $masterchkout=$thallouts+$mstrchkout+$extout; ?></td>
	
	
	
	
	
	
	
	
	<td data-title="Bed Occupied:"><?php echo $occhall; ?></td>
	<td data-title="Room Occupied:"><?php echo $occroom; ?></td>
	<td data-title="Extra Occupied:"><?php echo $myoccextra;$myoccextra=0; ?></td>
	<?php
$vacantroom=$all_rooms-$occroom;
$vacantex=$all_extra-$occextra;
$sts=$hallmorningin+$hallnightin;
$allvacanthalls=$all_hall_bed-$occhall;

?>	
	
	<td data-title="Vacant Beds:"><?php echo $allvacanthalls;?></td>
	<td data-title="Vacant Rooms:"><?php echo $vacantroom; ?></td>


</tr>
	
	
	<?php
$finalroommorningin=0;$extin=0;$totalhallin=0;$masterchkout=0; $mstrchkout=0;$pvtin=0;
	$finalroomnightin=0;
	$froom=0;	
	$pvtmorningout=0;$pvtnightout=0;
 $hallins=0;
$morningin=0;
$nightin=0;
$totalin=0;
$onein=0;$exchange=0;$renew=0;
$twoin=0;$foccroom=0;
$extramorningin=0;
$extranightin=0;
$totalextrain=0;
$roommorningin=0;
$roomnightin=0;
$totalprivatein=0;
$morningout=0;
$nightout=0; 
$twoout=0;
$oneout=0;
$totalsout=0;
$hallouts=0;
 $thallouts=0;
$pvtout=0;
$extout=0;
$mstrchkout=0;
$allhallentry=0;
$ahe=0;
$totalprivatein=0;
$totalextrain=0;
$allvacanthalls=0;
$vacantroom=0;
 $masterchkout=0;	
 $occrooms=0; $occroom=0; $occhall=0; $occextra=0;
}	
	
	
	
	
	$fdate=$dd.$est." 23:59:59";
	$cdate=strtotime($fdate);
	
}
	
echo "</tbody></table>";
	?>
	             <center>
                              
                              </center>
                          </section>
                      </div><!-- /content-panel -->
					  <input type="button" onclick="printDiv('printableArea')" value="Print" />
<button onclick="exportToExcel('tblexportData')">Export Table Data To Excel File</button>
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