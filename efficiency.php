<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Efficiency Report</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<table width="65%" cellspacing="6px" style="padding-top:100px;background-color:#ccc;" align="center" width="100%" bgcolor="#ccc">
						  <form method="get" action="efficiency.php">
						  <td>Start Date: <input type="date" name="start"></td><td><input type="submit" name="chk" value="search"></td>
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
		

 $rmp=mysqli_query($con,"select * from `rooms` where `room_no` between 200 and 300 and `bed_no`= 1 ;");
$all_rooms = mysqli_num_rows($rmp);
$rmp9=mysqli_query($con,"select * from `rooms` where `room_no` between 200 and 300 and `bed_no` like 'extra%' ;");
$all_extra = mysqli_num_rows($rmp9);

	$rmp3=mysqli_query($con,"select * from `rooms` where `room_no` not between 200 and 300;");
$all_hall_bed = mysqli_num_rows($rmp3);


$today=$start."%";
///////////CHECKIN DATES AND FORM//////////////
///////////////MORNING SHIFT///////////////////
$daystart=$start." 08:00:00";
$minstart=strtotime($daystart);
$minstop=$minstart+43200;
$show="SELECT * FROM `visits` WHERE `checkin_date` between '$minstart' and '$minstop';";
 $abc=mysqli_query($con,"SELECT * FROM `visits` WHERE `checkin_date` between '$minstart' and '$minstop';");
$morningin= mysqli_num_rows($abc);$renew=0;$exchange=0;$mhnew=0;$mhrenew=0;$nhrenew=0;$mhexchange=0;$nexexchange=0;$mexexchange=0;$nhexchange=0;$mrnew=0;$nrnew=0;$mrrenew=0;$nrrenew=0;$mrechange=0;$nrechange=0;$mexnew=0;$nexnew=0;$mexrenew=0;$nexrenew=0;$mexexchange=0;$mexexchange=0;
while($morningindata=mysqli_fetch_array($abc))
{
if($morningindata['bed_charge']==300 && $morningindata['visit_type']=='new'){$mhnew++;}
if($morningindata['bed_charge']==300 && $morningindata['visit_type']=='Renew'){$mhrenew++;}
if($morningindata['bed_charge']==300 && $morningindata['visit_type']=='Exchange'){$mhexchange++;}
if($morningindata['bed_charge']==150 && $morningindata['visit_type']=='new'){$mhnew++;}
if($morningindata['bed_charge']==150 && $morningindata['visit_type']=='Renew'){$mhrenew++;}
if($morningindata['bed_charge']==150 && $morningindata['visit_type']=='Exchange'){$mhexchange++;}
if($morningindata['bed_charge']==950 && $morningindata['visit_type']=='new'){$mrnew++;}
if($morningindata['bed_charge']==950 && $morningindata['visit_type']=='Renew'){$mrrenew++;}
if($morningindata['bed_charge']==950 && $morningindata['visit_type']=='Exchange'){$mrechange++;}
if($morningindata['bed_no']=='extra1' || $morningindata['bed_no']=='extra2' &&  $morningindata['visit_type']=='new'){$mexnew++;$mhnew--;}
if($morningindata['bed_no']=='extra1' || $morningindata['bed_no']=='extra2' &&  $morningindata['visit_type']=='Renew'){$mexrenew++;$mhrenew--;}
if($morningindata['bed_no']=='extra1' || $morningindata['bed_no']=='extra2' &&  $morningindata['visit_type']=='Exchange'){$mexexchange++;$mhexchange--;}

}
///////////////NIGHT SHIFT///////////////////

$ninstop=$minstop+43200;
$nabc=mysqli_query($con,"SELECT * FROM `visits` WHERE `checkin_date` between '$minstop' and '$ninstop';");
while($nightindata=mysqli_fetch_array($nabc))
{
if($nightindata['bed_charge']==300 && $nightindata['visit_type']=='new'){$nhnew++;}
if($nightindata['bed_charge']==300 && $nightindata['visit_type']=='Renew'){$nhrenew++;}
if($nightindata['bed_charge']==300 && $nightindata['visit_type']=='Exchange'){$nhexchange++;}
if($nightindata['bed_charge']==150 && $nightindata['visit_type']=='new'){$nhnew++;}
if($nightindata['bed_charge']==150 && $nightindata['visit_type']=='Renew'){$nhrenew++;}
if($nightindata['bed_charge']==150 && $nightindata['visit_type']=='Exchange'){$nhexchange++;}
if($nightindata['bed_charge']==950 && $nightindata['visit_type']=='new'){$nrnew++;}
if($nightindata['bed_charge']==950 && $nightindata['visit_type']=='Renew'){$nrrenew++;}
if($nightindata['bed_charge']==950 && $nightindata['visit_type']=='Exchange'){$nrechange++;}
if($nightindata['bed_no']=='extra1' || $nightindata['bed_no']=='extra2' &&  $nightindata['visit_type']=='new'){$nexnew++;$nhnew--;}
if($nightindata['bed_no']=='extra1' || $nightindata['bed_no']=='extra2' &&  $nightindata['visit_type']=='Renew'){$nexrenew++;$nhrenew--;}
if($nightindata['bed_no']=='extra1' || $nightindata['bed_no']=='extra2' &&  $nightindata['visit_type']=='Exchange'){$nexexchange++;$nhexchange--;}

}
$nightin= mysqli_num_rows($nabc);
/////////////////////////////////////////////

///////////CHECKOUT DATES AND FORM//////////////
///////////////MORNING SHIFT///////////////////
$daystart2=$start." 00:00:00";
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
		
<section id="no-more-tables" width="100%"><div id="printableArea" style="width:100%;height:90%;">
 <table  id="tblexportData" class="table table-bordered table-striped table-condensed cf" >
<tr>
<td colspan=2>DATE :</td><td colspan=16><?php echo $start; ?></td>
</tr>
<tr>
<td colspan=2></td><td colspan=4>BEDS</td><td colspan=4></td><td colspan=4>EXTRA BEDS</td><td colspan=4>ROOMS</td>
</tr>
<tr><td colspan=2></td><td>NEW</td><td>EX</td><td>RENEW</td><td>TOTAL</td><td colspan=2>CHECKOUT TOTAL</td><td colspan=2>DUTY PERSON</td><td>NEW</td><td>EX</td><td>RENEW</td><td>TOTAL</td><td>NEW</td><td>EX</td><td>RENEW</td><td>TOTAL</td></tr>
<tr><td></td><td>DAY</td><td><?php echo $mhnew;?></td><td><?php echo $mhexchange;?></td><td><?php echo $mhrenew;?></td><td><?php echo $totalmh=$mhnew+$mhrenew+$mhexchange;?></td><td>DAY</td><td><?php echo $hallmorningout;?></td><td colspan=2>  
<?php
 $abc2=mysqli_query($con,"SELECT `checkin_by` FROM `visits` WHERE `checkin_date` between '$minstart' and '$minstop' group by `checkin_by` ;");
 while($myusers=mysqli_fetch_array($abc2))
 {
     echo $myusers['checkin_by']."+";
 }
?>
</td> <td> <?php echo $mexnew; ?> </td><td> <?php echo $mexexchange; ?> </td><td> <?php echo $mexrenew; ?> </td><td> <?php echo $exttotal=$mexnew+$mexexchange+$mexrenew; ?></td><td><?php echo $mrnew; ?> </td><td><?php echo $mrechange; ?> </td><td><?php echo $mrrenew; ?> </td><td><?php echo $mrtotal=$mrrenew+$mrechange+$mrnew; ?> </td></tr>

<tr><td></td><td>NIGHT</td><td><?php echo $nhnew;?></td><td><?php echo $nhexchange;?></td><td><?php echo $nhrenew;?></td><td><?php echo $totalnh=$nhnew+$nhrenew+$nhexchange;?></td><td>NIGHT</td><td><?php echo $hallnightout;?></td><td colspan=2> 

<?php
 $abc3=mysqli_query($con,"SELECT `checkin_by` FROM `visits` WHERE `checkin_date` between '$minstop' and '$ninstop' group by `checkin_by` ;");
 while($myusers2=mysqli_fetch_array($abc3))
 {
     echo $myusers2['checkin_by']."+";
 }
?>



</td> <td> <?php echo $nexnew; ?> </td><td> <?php echo $nexexchange; ?> </td><td> <?php echo $nexrenew; ?> </td><td> <?php echo $nexttotal=$nexnew+$nexexchange+$nexrenew; ?></td><td><?php echo $nrnew; ?> </td><td><?php echo $nrechange; ?> </td><td><?php echo $nrrenew; ?> </td><td><?php echo $nrtotal=$nrrenew+$nrechange+$nrnew; ?> </td></tr>

<tr><td></td><td>TOTAL</td><td><?php echo $hnewtot=$mhnew+$nhnew; ?></td><td><?php echo $nextt=$nhexchange+$mhexchange;?></td><td><?php echo $dmhren=$mhrenew+$nhrenew;?></td><td><?php echo $mhmntot=$totalmh+$totalnh;?></td><td> </td><td><?php echo $outttot=$hallnightout+$hallmorningout;?></td><td colspan=2></td><td><?php echo $mnextot=$mexnew+$nexnew;?></td><td><?php echo $nnextots=$mexexchange+$nexexchange;?></td><td><?php echo $mmextots=$nexrenew+$mexrenew;?></td><td><?php echo $hahatot=$exttotal+$nexttotal;?></td><td><?php echo $totmrl=$mrnew+$nrnew; ?></td><td><?php echo $totnnrex=$mrechange+$nrechange; ?></td><td><?php echo $tottotrmren=$mrrenew+$nrrenew; ?></td><td><?php echo $tottotmrl=$nrtotal+$mrtotal; ?></td></tr>
</table>  
	<?php	$fdate=$dd.$est." 23:59:59";
	$cdate=strtotime($fdate);
	
}
	
echo "</tbody></table>";
	?>
	             <center>
                              
                              </center>
                          </section>
                      </div><!-- /content-panel -->
					  <input type="button" onclick="printDiv('printableArea')" value="Print" /> <button onclick="exportToExcel('tblexportData')">Export Table Data To Excel File</button>
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