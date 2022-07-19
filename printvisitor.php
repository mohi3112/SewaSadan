<?php
include('lcheck.php');
if (!isset($_COOKIE['user']))
{
header("location:index.php");
}
$string = date('Y/m/d H:i:s a', time());
$year = substr($string,0,4);
$month = substr($string,5,2);
$day = substr($string,8,2);
$x=$day+3;
$hour = substr($string,11,2);
$minute = substr($string,14,2);
$rentime= $x."-".$month."-".$year." 14:00";
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
					<center>
				<?php
				$s=$_GET['sr'];
				$sel="select * from `visitor` where `passid`='$s'";
				$rr=mysqli_query($con,$sel);
				$rs=mysqli_fetch_array($rr);
				?>
				
				
				<div id="printableArea" style="width:100%;height:90%;">
		<?php

if(isset($_GET['sr']))
{
		?>
				<div><img src="assets/img/visitor.png" height="300px" width="auto"></div><font size="4">

<table background="" width="450px" style="margin-left:10px;margin-top:-200px;">
<tr><td  colspan=3 style="font-weight:bold;color:red;">
<center><?php echo $rs['sr']; ?><center></td><td><?php echo $rs['vistdate']; ?></td></tr>

<tr><td></td>
<td><?php echo $rs['room']."/".$rs['bed']; ?></td><td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rs['noofperson']; ?></td></tr>

<tr><td width="13%"></td>
<td><?php echo $rs['visittime']; ?></td><td></td><td><?php echo $rs['']; ?></td></tr>


<tr><td></td>
<td colspan=3><?php echo $rs['visitormobile']; ?></td></tr>


</table>
<?php  } ?>		</div>
				</center>
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