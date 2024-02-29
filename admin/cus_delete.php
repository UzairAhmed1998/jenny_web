<?php
require_once 'config.php';
$id=$_GET['cu_id'];
$del_cus="DELETE FROM customer WHERE cus_id='{$id}'";
$del_res=mysqli_query($con, $del_cus);
if($del_res){
    echo "<script>window.location.href='http://localhost/jenny_web/admin/customer.php'</script>";
}
?>