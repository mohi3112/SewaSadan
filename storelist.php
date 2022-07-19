<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
?>





<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header"><div class="row"><div class="col-lg-7 col-md-6 col-sm-12"><h2>Bedding Statement</h2></div></div></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
						<?php  // Code Here/////  ?>
						 <div id="printableArea" style="width:100%;height:90%;"> <h3 class="mb"><i class="fa fa-angle-right"></i> Stock Available In Store.</h3>
<?php 
$atat="SELECT sum(`count`) as bs FROM `stock_assets` WHERE `item_name`='bedsheet' and `stock_status`='issued';";
$tata=mysqli_query($con,$atat);
$bss=mysqli_fetch_array($tata);
$issuedbs=$bss['bs'];

$atat2="SELECT sum(`count`) as totbs FROM `stock_assets` WHERE `item_name`='bedsheet';";
$tata2=mysqli_query($con,$atat2);
$bss2=mysqli_fetch_array($tata2);
$totbs=$bss2['totbs'];

$qu1="SELECT sum(`count`) as bl FROM `stock_assets` WHERE `item_name`='blanket' and `stock_status`='issued';";
$tata1=mysqli_query($con,$qu1);
$bll=mysqli_fetch_array($tata1);
$issuedbl=$bll['bl'];

$qu12="SELECT sum(`count`) as bl2 FROM `stock_assets` WHERE `item_name`='blanket';";
$tata12=mysqli_query($con,$qu12);
$bll2=mysqli_fetch_array($tata12);
$totbl=$bll2['bl2'];

$qu2="SELECT sum(`count`) as mt FROM `stock_assets` WHERE `item_name`='mattress' and `stock_status`='issued';";
$tata2=mysqli_query($con,$qu2);
$mtt=mysqli_fetch_array($tata2);
$issuedmt=$mtt['mt'];

$qu22="SELECT sum(`count`) as mt2 FROM `stock_assets` WHERE `item_name`='mattress' ;";
$tata22=mysqli_query($con,$qu22);
$mtt2=mysqli_fetch_array($tata22);
$totmt=$mtt2['mt2'];

$qu3="SELECT sum(`count`) as pc FROM `stock_assets` WHERE `item_name`='pillow' and `stock_status`='issued';";
$tata3=mysqli_query($con,$qu3);
$pcvr=mysqli_fetch_array($tata3);
$issuedpc=$pcvr['pc'];

$qu32="SELECT sum(`count`) as pc2 FROM `stock_assets` WHERE `item_name`='pillow';";
$tata32=mysqli_query($con,$qu32);
$pcvr2=mysqli_fetch_array($tata32);
$totpc=$pcvr2['pc2'];

$qu4="SELECT sum(`count`) as rt FROM `stock_assets` WHERE `item_name`='remote' and `quality`='tv' and `stock_status`='issued';";
$tata4=mysqli_query($con,$qu4);
$rtt=mysqli_fetch_array($tata4);
$issuedrt=$rtt['rt'];

$qu42="SELECT sum(`count`) as rt2 FROM `stock_assets` WHERE `item_name`='remote' and `quality`='tv' ;";
$tata42=mysqli_query($con,$qu42);
$rtt2=mysqli_fetch_array($tata42);
$totrt=$rtt2['rt2'];


$qu425="SELECT sum(`count`) as rt3 FROM `stock_assets` WHERE `item_name`='remote' and `stock_status`='issued' and `quality`='ac';";
$tata425=mysqli_query($con,$qu425);
$rtt25=mysqli_fetch_array($tata425);
$issuedrtac=$rtt25['rt3'];

$qu423="SELECT sum(`count`) as rt4 FROM `stock_assets` WHERE `item_name`='remote' and `quality`='ac';";
$tata423=mysqli_query($con,$qu423);
$rtt423=mysqli_fetch_array($tata423);
$totrtac=$rtt423['rt4'];
?>					  
					  
    						  
<table width="75%" border='1'>
<tr><th>Sr</th><th>Item</th><th>Total</th><th>Issued</th><th>Balance</th></tr>
<tr><td>1</td><td>Bedsheets</td><td><?php echo $totbs; ?></td><td><?php echo $issuedbs; ?></td><td><?php echo $sbs=$totbs-$issuedbs; ?></td></tr>
<tr><td>2</td><td>Mattress</td><td><?php echo $totmt;?></td><td><?php echo $issuedmt; ?></td><td><?php echo $smt=$totmt-$issuedmt; ?></td></tr>
<tr><td>3</td><td>Pillow Covers</td><td><?php echo $totpc;?></td><td><?php echo $issuedpc; ?></td><td><?php echo $spc=$totpc-$issuedpc; ?></td></tr>
<tr><td>4</td><td>Blanket</td><td><?php echo $totbl;?></td><td><?php echo $issuedbl; ?></td><td><?php echo $sbl=$totbl-$issuedbl; ?></td></tr>
<tr><td>5</td><td>Remotes TV</td><td><?php echo $totrt;?></td><td><?php echo $issuedrt; ?></td><td><?php echo $srt=$totrt-$issuedrt; ?></td></tr>
<tr><td>5</td><td>Remotes AC</td><td><?php echo $totrtac;?></td><td><?php echo $issuedrtac; ?></td><td><?php echo $srtac=$totrtac-$issuedrtac; ?></td></tr>
					  </table>
					  	</div><!-- /content-panel -->
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