<?php
require_once 'config.php';
$id=$_GET['od_id'];
$delete_orderdt="DELETE FROM order_detail WHERE ordr_id ='{$id}'";
$orderdt_reg=mysqli_query($con, $delete_orderdt);
if($orderdt_reg){
$delete_order="DELETE FROM orders WHERE order_id ='{$id}'";
$order_reg=mysqli_query($con, $delete_order);
echo "<script>window.location.href='http://localhost/jenny_web/admin/order.php'</script>";
}


?>