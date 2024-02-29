<?php
require_once 'config.php';
$id=$_GET['ct_id'];
$delete_contact="DELETE FROM contact WHERE id='{$id}'";
$delete_reg=mysqli_query($con, $delete_contact);
if($delete_reg){
    echo "<script>window.location.href='http://localhost/jenny_web/admin/contact.php'</script>";
}


?>