<?php
require_once 'config.php';
$id=$_GET['ct_id'];
$delete_query="DELETE FROM category WHERE cat_id = '{$id}'";
$res_delete = mysqli_query($con,$delete_query);
if($res_delete){
    echo "<script>window.location.href='http://localhost/jenny_web/admin/category_list.php'</script>";
}


?>