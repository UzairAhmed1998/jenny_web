<?php
require_once 'config.php';
$id = $_GET['cr_id'];
$select_cart="SELECT * FROM cart WHERE quantity > 0 AND cart_id ='{$id}'";
$slt_cart_reg=mysqli_query($con, $select_cart);
$total_rows=mysqli_num_rows($slt_cart_reg);
if($total_rows != 0){
    $update_cart ="UPDATE cart SET quantity=quantity - 1, total= cart_price * quantity WHERE cart_id ='{$id}'";
    $update_reg=mysqli_query($con, $update_cart);
echo "<script>window.location.href='http://localhost/jenny_web/jennys_choice/view_cart.php'</script>";

}
else{
    echo "<script>alert('Error in quantity..!')</script>";
    echo "<script>window.location.href='http://localhost/jenny_web/jennys_choice/view_cart.php'</script>";

}
?>