<?php
require_once 'config.php';
$id=$_GET['st_id'];
$delete_query="DELETE FROM order_status WHERE id = '{$id}'";
$res_delete = mysqli_query($con,$delete_query);
if($res_delete){
    echo "<script>window.location.href='http://localhost/jenny_web/admin/view_status.php'</script>";
}


?>