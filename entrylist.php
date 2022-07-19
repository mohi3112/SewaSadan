<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Performance Report</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
					<table width="100%" cellspacing="6px" style="padding-top:100px;background-color:#ccc;" align="center" width="100%" bgcolor="#ccc">
						  <form method="get" action="entrylist.php">
						  <td>Start Date: <input type="date" name="start"></td><td>End Date: <input type="date" name="end"></td><td><input type="submit" name="chk" value="search"></td>
						  </tr>
						  </table> 
						  <br><br>
						  <?php ?>
<div id="printableArea" style="width:100%;height:90%;">
	<section id="no-more-tables" width="100%">
                              <table id="tblexportData" class="table table-bordered table-striped table-condensed cf" >
                                  <thead class="cf">
								  <tr >
								  
								  <th rowspan=2 style="padding:0px;text-align:center;">SR. No</th>
								  <th rowspan=2 style="padding:0px;text-align:center;">User Name</th>
								  <th colspan=2 style="padding:0px;text-align:center;">Check-In Entries</th>
								  <th colspan=2 style="padding:0px;text-align:center;">Checkout Entries</th>
								  <th rowspan=2 style="padding:0px;text-align:center;">Check-In Cancel</th>
								  <th rowspan=2 style="padding:0px;text-align:center;">Checkout Cancel</th>
								  
								  </tr>
								   <tr><td style="padding:0px;text-align:center;">Rooms</td><td style="padding:0px;text-align:center;">Hall</td><td style="padding:0px;text-align:center;">Rooms</td><td style="padding:0px;text-align:center;">Hall</td></tr>
                                  </thead>
                                  <tbody>						  
						  	<tr>
						  
						  
	<?php					 
if(isset($_GET['chk']))
{
	foreach($_GET as $k=>$v)
		{
			$$k=$v;
		}
		
	$st=strtotime($start);	
	$ft=date('d-m-Y',$st);
	$date1=$ft." 08:00:00";
	$date1f=strtotime($date1);
	$en=strtotime($end);	
	$en1=date('d-m-Y',$en);
	$date2=$en1." 07:59:59";	
	$date2f=strtotime($date2);
$one="select * from `user` where `actype`='front' or `actype`='manager' and `sr`>1; ";
	$two=mysqli_query($con, $one);
	$srno=1;
	while($tree=mysqli_fetch_array($two))
	{
	    $usnames=$tree['name'];
	      
$uarr=explode(" ",$usnames); 
	    $usname=$uarr[0]."%";
	    
	    
	    //print_r($tree);
$tyr="SELECT * from `visits` where `checkin_by` like '$usname' and `visit_type`='new' and `slip`!='0' and `checkin_date` between '$date1f' and '$date2f' and `guest2`!='No' and `room_no` > '200';";
 $rtr=mysqli_query($con,$tyr);
 $slipcountroom=mysqli_num_rows($rtr);
 $cdataroom=mysqli_fetch_array($rtr);
 $tyr2="SELECT * from `visits` where `checkin_by` like '$usname' and `visit_type`='new' and `slip`!='0' and `checkin_date` between '$date1f' and '$date2f' and `guest2`!='No' and `room_no` < '200';";
 $rtr2=mysqli_query($con,$tyr2);
 $slipcounthall=mysqli_num_rows($rtr2);
 $cdatahall=mysqli_fetch_array($rtr2);
 
 
  $tyr22="SELECT * from `visits` where `checkout_by` like '$usname' and `visit_type`='new' and `vcno`!='0' and `checkout_date` between '$date1f' and '$date2f' and `guest2`!='No' and `room_no` > '200';";
 $rtr22=mysqli_query($con,$tyr22);
 $vccountroom=mysqli_num_rows($rtr22);
 $vcdataroom=mysqli_fetch_array($rtr22);
 
 
  $tyr23="SELECT * from `visits` where `checkout_by` like '$usname' and `visit_type`='new' and `vcno`!='0' and `checkout_date` between '$date1f' and '$date2f' and `guest2`!='No';";
 $rtr23=mysqli_query($con,$tyr23);
 $vccounthall=mysqli_num_rows($rtr23);
 $vcdatahall=mysqli_fetch_array($rtr23);
 
 $tyr3="SELECT * from `cash` where `collectby` like '$usname' and `slip`!='0' and `name` like '%(CANCEL%' and `handovertime` between '$date1f' and '$date2f';";
 $rtr3=mysqli_query($con,$tyr3);
 $slcancount=mysqli_num_rows($rtr3);
 $slcandata=mysqli_fetch_array($rtr3); 
 
 
 
   $tyr4="SELECT * from `cash` where `collectby` like '$usname' and `vcno`!='0' and `name` like '%(CANCEL%' and `handovertime` between '$date1f' and '$date2f';";
 $rtr4=mysqli_query($con,$tyr4);
 $vccancount=mysqli_num_rows($rtr4);
 $vccandata=mysqli_fetch_array($rtr4);
 ?>
 <td data-title="Sr No:"><?php echo $srno; ?></td>
<td data-title="User Name:"><?php echo $uarr[0]; ?></td>
<td data-title="Check-In Entries:"><?php echo  $slipcountroom; ?></td>
<td><?php echo  $slipcounthall; ?> </td> 
<td data-title="Check-Out Entries:"><?php echo  $vccountroom; ?></td>
<td> <?php echo  $vccounthall; ?></td>
<td data-title="Check-Out Entries:"><?php echo $slcancount; ?></td> 			
<td data-title="Check-Out Entries:"><?php echo  $vccancount; ?></td> 

 </tr>

 <?php

$srno++;
	}

			
	?>

</table>
                          </section>
                      </div><!-- /content-panel -->
					  <input type="button" onclick="printDiv('printableArea')" value="Print" />
<button onclick="exportToExcel('tblexportData')">Export Table Data To Excel File</button>
						<?php  // Code Ends Here/////  ?><?php } ?>
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