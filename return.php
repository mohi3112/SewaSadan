<?php include('lcheck.php'); 
include("inc/config.php");
$usr=$_SESSION['usr'];
$t=time();
$booking=$_GET['booking'];
$q="SELECT * FROM `stock_asset_allocation` where `booking_id`='$booking';";
$qu=mysqli_query($con,$q);
while($qur=mysqli_fetch_array($qu))
{
$asset=$qur['asset_id'];
$mq="update `stock_assets` set `stock_status`='free' where `asset_id` ='$asset';";
mysqli_query($con,$mq);
}
$mqr="update `stock_asset_allocation`  set `stock_status`='returned' , `return_date`='$t', `return_by`='$usr' where `booking_id`='$booking';";
mysqli_query($con,$mqr);
$mqrs="update `visits`  set `store_status`='returned'  where `bookingid`='$booking';";
mysqli_query($con,$mqrs);
echo "<script>alert('Beddings Returned Successfully.');</script>";
echo "<script>window.location.href = 'storereturn.php';</script>";
?>