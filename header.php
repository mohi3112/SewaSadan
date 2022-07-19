	 <?php
session_start();
$type=$_SESSION['type'];
$q7="SELECT * FROM `cash` where `cashtype`<>'lastday' ORDER BY `sr` DESC LIMIT 1;";
			$c7=mysqli_query($con,$q7);
			$cr7=mysqli_fetch_array($c7);
			$cih=$cr7['cashinhand'];
 $cashquery="SELECT * FROM `cash` where `reciptno`<> '0' and `cashtype` ='donation' ORDER BY `sr` DESC LIMIT 1;";
			$cashres=mysqli_query($con,$cashquery);
			$resultsall=mysqli_fetch_array($cashres);
		 $myrecipt=$resultsall['reciptno'];
			$recipt32 = substr($myrecipt, 8); 
			$reciptlast=abs($recipt32);
			$reciptnext2=$reciptlast+1;
			$reciptnext=$fnyear.'/'.$reciptnext2;
	$myq2="SELECT * FROM `cash` where `cashtype`='Extra Donation' ORDER BY `sr`  DESC LIMIT 1;";
			$myc2=mysqli_query($con,$myq2);
			$mycr2=mysqli_fetch_array($myc2);
			$mydonrs=$mycr2['reciptno'];
			$mydonrs32 = substr($mydonrs, 10); 
			$mydonrslt=abs($mydonrs32);
			$nexdon2=$mydonrslt+1;
			$donationnext=$fnyear.'/d/'.$nexdon2;
			
			$cashquery2="SELECT * FROM `cash` where `vcno`<>'0' ORDER BY `sr` DESC LIMIT 1;";
			$cashres2=mysqli_query($con,$cashquery2);
			$resultsall2=mysqli_fetch_array($cashres2);
			$myvclast=$resultsall2['vcno'];
			$vclast32 = substr($myvclast, 8); 
			$vclast=abs($vclast32);
			$vcnext2=$vclast+1;
			$vcnext=$fnyear.'/'.$vcnext2;
						$cashquery3="SELECT * FROM `cash` where `slip` <>'0' ORDER BY `sr` DESC LIMIT 1;";
			$cashres3=mysqli_query($con,$cashquery3);
			$resultsall3=mysqli_fetch_array($cashres3);
			$mysliplast=$resultsall3['slip'];
			$sliplast32 = substr($mysliplast, 8); 
			$sliplast=abs($sliplast32);
			$slipnext2=$sliplast+1;
			$slipnext=$fnyear.'/'.$slipnext2;
			
					
	 $stock="SELECT * FROM `store` ORDER BY `sr` DESC limit 1;;";
			$stockres=mysqli_query($con,$stock);
			$mystock=mysqli_fetch_array($stockres);
			$sbs=$mystock['bedsheet_instock'];
			$spc=$mystock['pillow_instock'];
			$smt=$mystock['mattress_instock'];
			$sbl=$mystock['blenket_instock'];
			$srm=$mystock['remote_instock'];
			$srmtv=$mystock['arrival'];
?>
	
	
<html lang="en">
<head>
    <?php 
$e=$_SERVER['REQUEST_URI'];
$fn=basename($e);
?>

<script type="text/javascript">
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
	 window.setTimeout(window.location.href = "<?php echo $fn; ?>",1000);
}
</script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Ram Sharnam Sewa Sadan Ludhiana">

<title>:: Ram Sharnam Sewa Sadan ::</title>
<!-- Favicon-->
<!-- Favicon-->
<link  rel="stylesheet" href="<?php echo $site; ?>assets/plugins/bootstrap/css/bootstrap.min.css">
<!-- Morris Chart Css-->
<link rel="stylesheet" href="<?php echo $site; ?>assets/plugins/morrisjs/morris.css" />
<!-- Colorpicker Css -->
<link rel="stylesheet" href="<?php echo $site; ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
<!-- Multi Select Css -->
<link rel="stylesheet" href="<?php echo $site; ?>assets/plugins/multi-select/css/multi-select.css">
<!-- Bootstrap Spinner Css -->
<link rel="stylesheet" href="<?php echo $site; ?>assets/plugins/jquery-spinner/css/bootstrap-spinner.css">
<!-- Bootstrap Tagsinput Css -->
<link rel="stylesheet" href="<?php echo $site; ?>assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
<!-- Bootstrap Select Css -->
<link rel="stylesheet" href="<?php echo $site; ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" />
<!-- noUISlider Css -->
<link rel="stylesheet" href="<?php echo $site; ?>assets/plugins/nouislider/nouislider.min.css" />
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo $site; ?>assets/plugins/select2/select2.css" />

<!-- Custom Css -->
<link rel="stylesheet" href="<?php echo $site; ?>assets/css/style.min.css">
</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="<?php echo $site; ?>assets/images/loader.svg" width="48" height="48" alt="Aero"></div>
        <p>Please wait...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Main Search -->

<!-- Right Icon menu Sidebar -->
<div id="search">
    <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
    <form>
        <input type="search" value="" placeholder="Search..." />
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>

<!-- Right Icon menu Sidebar -->
<div class="navbar-right">
    <ul class="navbar-nav">
        <li><a href="#search" class="main_search" title="Search..."><i class="zmdi zmdi-search"></i></a></li>
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="App" data-toggle="dropdown" role="button"><i class="zmdi zmdi-apps"></i></a>
            <ul class="dropdown-menu slideUp2">
                <li class="header">App Sortcute</li>
                <li class="body">
                    <ul class="menu app_sortcut list-unstyled">
                        <li>
                            <a href="image-gallery.html">
                                <div class="icon-circle mb-2 bg-blue"><i class="zmdi zmdi-camera"></i></div>
                                <p class="mb-0">Photos</p>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle mb-2 bg-amber"><i class="zmdi zmdi-translate"></i></div>
                                <p class="mb-0">Translate</p>
                            </a>
                        </li>
                        <li>
                            <a href="events.html">
                                <div class="icon-circle mb-2 bg-green"><i class="zmdi zmdi-calendar"></i></div>
                                <p class="mb-0">Calendar</p>
                            </a>
                        </li>
                        <li>
                            <a href="contact.html">
                                <div class="icon-circle mb-2 bg-purple"><i class="zmdi zmdi-account-calendar"></i></div>
                                <p class="mb-0">Contacts</p>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle mb-2 bg-red"><i class="zmdi zmdi-tag"></i></div>
                                <p class="mb-0">News</p>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle mb-2 bg-grey"><i class="zmdi zmdi-map"></i></div>
                                <p class="mb-0">Maps</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="Notifications" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i>
                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
            </a>
            <ul class="dropdown-menu slideUp2">
                <li class="header">Notifications</li>
                <li class="body">
                    <ul class="menu list-unstyled">
                      <?php
							$w="select * from `visits` where `checkout_date` IS NULL;";
							$rr=mysqli_query($con,$w); $renewcount=0;
							while ($rt=mysqli_fetch_array($rr))
							{
								$checkin=$rt['checkin_date'];
								$chec = date('d-m-Y G:i:s', $checkin);
								$checkindate = date('d', $checkin);
								$checkintime = date('m', $checkin);
								
								$renew=$rt['ren_date'];
								$renewf = date('d-m-Y G:i:s', $renew);
								$renewdate = date('d', $renew);
								$renewtime = date('m', $renew);
								if($checkindate==$renewdate && $checkintime==$renewtime)
								{
									$renewcount++;
									if($renewcount<5)
									{
								
							?> 

							<?php } } } ?>

					   <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle bg-blue"><i class="zmdi zmdi-account"></i></div>
                                <div class="menu-info">
                                    <h4>You Have <?php echo $renewcount;?> Renewals Today.</h4>
                                    <p><i class="zmdi zmdi-time"></i> 14 mins ago </p>
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>
            </ul>
        </li>

        <li><a href="lcheck.php?a=56" class="mega-menu" title="Sign Out"><i class="zmdi zmdi-power"></i></a></li>
    </ul>
</div>


<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="index.php"><img src="<?php echo $site; ?>assets/images/rlogo.png" width="25" alt="Sewa Sadan"><span class="m-l-10">Sewa Sadan</span></a>
    </div>
     <div class="navbar-brand" style="margin:0;padding:o;text-align:center;">
      <center><font size="2">  Login as <?php echo$_SESSION['usr'];?></font></center>
    </div>
    <div class="menu">
        <ul class="list">
            
			<li ><a href="lcheck.php"><i class="zmdi zmdi-home"></i><span>Summary</span> </a></li>
      		<li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-money"></i><span>Donations</span></a>
                <ul class="ml-menu">
                   <li ><a href="donationall.php">Donation</a></li>
			<li ><a href="customdonation.php">Custom Donation </a></li>               
                </ul>
            </li>
			
			
			
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hotel"></i><span>Rooms & Beds</span></a>
                <ul class="ml-menu">
                   <li><a href="addroom.php">Add Room</a></li>
		<li><a href="addbed.php">Add New Bed</a></li>
		<li><a href="changerent.php">Change Bed Charges</a></li>                  
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span>Check-In</span></a>
                <ul class="ml-menu">
					
					<li><a href="roomcheckin.php">Room Check-In</a></li>
					<li><a href="extra.php">Issue Second Person </a></li>
					<li><a href="checkin.php">Issue Extra Bed</a></li>
					<li><a href="changesecperson.php">Change Second Person</a></li>
					<li><a href="searchcheckin.php">Search Check-In</a></li>
					<li><a href="shiftaccomodation.php">Shift Rooms</a></li>
					<li><a href="printmaster.php">Print Master</a></li>
					<li><a href='editguest.php'>Edit Guest Details</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-close"></i><span>Check-Out</span></a>
                <ul class="ml-menu">
					<li><a href="checkout.php">New Check-Out</a></li>
					<li><a href="searchcheckout.php">Search Check-Out</a></li>
					<li><a href="roomzero.php">Solve Checkout Zero Problem</a></li>
					<li><a href="reprint.php">Reprint Check-Out</a></li>
                </ul>
            </li>
			<li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-time-restore"></i><span>Renew</span></a>
                <ul class="ml-menu">
                   <li><a href="renew.php">Today Renewal Account</a></li>
                   <li><a href="renew_accomodation.php">Renew An Account</a></li>
                   
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-balance"></i><span>Cash Manager</span></a>
                <ul class="ml-menu">
                    	<li><a href='openingbalance.php'>Today Opening Balance</a></li>
						<li><a href="todaycash.php">My Today Cash</a></li>
						<li><a href="tobank.php">Send To Bank</a></li>
						<li><a href="totaldonation.php">Total Bills</a></li>
						<li><a href="totalrefund.php">Total Refund</a></li>
						<li><a href="totalsecurity.php">Total Security</a></li>
						<li><a href="extradonationreport.php">Extra Donation Report</a></li>
						<li><a href='dailycashreport.php'>Daily Cash Book</a></li>
                </ul>
            </li>
            
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>Reports</span></a>
                <ul class="ml-menu">
					<li><a href="allroom.php">Room/Hall List</a></li>
					<li><a href="sameday.php">Same Day</a></li>
					<li><a href="cash.php">Main Register</a></li>
					<li><a href="cashreport.php">Cash Report</a></li>
					<li><a href="accountsreport.php">Accounts Report</a></li>
					<li><a href="bankreprt.php">Bank Report</a></li>
					<li><a href="donationreport.php">Donation Report</a></li>
					<li><a href="entrytype.php">Report By Entry Type</a></li>
				<?php if($type=="admin"){?>	<li><a href="entrylist.php">Performance Report</a></li><?php }?>
					<li><a href="occupancyreport.php">Occupancy Report</a></li>
					<li><a href="roomallperson.php">Room Person List</a></li>
					<li><a href='roombydays.php'>Room By Days</a></li>
					<li><a href="rcreport.php">Room Check Report</a></li>
					<li><a href="efficiency.php">Efficiency Report </a></li>
					<li><a href="secissue.php">Second Person Issue Report </a></li>
					<li><a href="listcancel.php">All Cancel Slips </a></li>
					<li><a href="cancelbill.php">All Cancel Bills </a></li>
					<li><a href="waivereport.php">Waive-Off Report </a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-box-mail"></i><span>Visitor Management</span></a>
                <ul class="ml-menu">
					<li><a href="addvisitor.php">Visitor Entry</a></li>
					<li><a href="reportvisitor.php">Visitor Report</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-store"></i><span>Store Manager</span></a>
                <ul class="ml-menu">
				
					<li><a href="createbrand.php">Create Department</a></li>
					<li><a href="brandlist.php">Department List</a></li>
					<li><a href="createvendor.php">Create Vendors</a></li>
					<li><a href="vendorlist.php">vendors List</a></li>
					<li><a href="vendor_report.php">vendors Report</a></li>
						<li><a href="addstockcat.php">Add Stock Category</a></li>
					<li><a href="storenew.php">Add New Assets</a></li>
				    	<li><a href="disasset.php">Discontinue Assets</a></li>
				    	<li><a href="totaldis.php">Discontinued List</a></li>
					<li><a href='addconsumable.php'>Add Consumable Stock</a></li>
					<li><a href="refillstock.php">Refill/Add Stock </a></li>
					<li><a href='stockinreport.php'>Refill/Add Report</a></li>
					<li><a href="consumestock.php">Consume/Issue Stock</a></li>
					<li><a href='consumptionreport.php'>Consumption Report</a></li>   
					<li><a href='stockinout.php'>Stock Ledgers</a></li>   
				
					<li><a href="storepending.php">Issue Beddings</a></li>
					<li><a href='issuereport.php'>Issued Report</a></li>
					<li><a href="storereturn.php">Return Beddings</a></li>
					<li><a href='returnreport.php'>Return Report</a></li>    
					
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts"></i><span>User Manager</span></a>
                <ul class="ml-menu">
                   <li><a href="adduser.php">Add New User</a></li>
					<li><a href="usrlist.php">Edit User</a></li>
                </ul>
            </li>            
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-swap-alt"></i><span>Admin Roles</span></a>
                <ul class="ml-menu">
                   <li><a href="canslip.php">Cancel Slip</a></li>
					<li><a href="canvcno.php">Cancel Voucher</a></li>
					<li><a href="roomstatus.php">Change Room Status</a></li>
                </ul>
            </li>             
            <li>
               
            </li>
        </ul>
    </div>
</aside>
