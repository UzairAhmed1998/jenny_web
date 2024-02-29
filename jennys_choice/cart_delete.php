<?php
require_once 'config.php';
$id=$_GET['cr_id'];
$cart_delete="DELETE FROM cart WHERE cart_id='{$id}'";
$delete_reg=mysqli_query($con, $cart_delete);
if($delete_reg){
    echo "<script>window.location.href='http://localhost/jenny_web/jennys_choice/view_cart.php'</script>";
}

?>