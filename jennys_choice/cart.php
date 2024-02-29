<?php
require_once 'config.php';
$id=$_GET['pt_id'];
$email=$_SESSION['cusemail'];
$select_pro="SELECT * FROM products WHERE p_id='{$id}'";
$reg_pro=mysqli_query($con, $select_pro);
$total_rows=mysqli_num_rows($reg_pro);
if($total_rows != 0){
    while($data=mysqli_fetch_assoc($reg_pro)){
        $pro_name=$data['p_name'];
        $pro_price=$data['p_price'];
        $pro_img=$data['p_img'];
    }
 $select_cart="SELECT * FROM cart WHERE pro_id ='{$id}' AND cus_email='{$email}'";
 $cart_reg=mysqli_query($con, $select_cart);
 $total_rowscr=mysqli_num_rows($cart_reg);
 if($total_rowscr != 0){
    while($data=mysqli_fetch_assoc($cart_reg)){
        $cart_name=$data['cus_email'];
    }
 }   
}
$cart_id=rand(10,90);
if($cart_name > 0){
    $update="UPDATE cart SET quantity=quantity + 1, total = cart_price * quantity WHERE cus_email='{$email}'";
    $update_reg=mysqli_query($con, $update);
    echo "<script>alert('Your product successfully added into cart')</script>";
    echo "<script>window.location.href='http://localhost/jenny_web/jennys_choice/product_detail.php?pt_id=$id'</script>";
}
else{
$insert_cart="INSERT INTO cart (cart_id,pro_id,quantity,total,cart_img,cart_price,pro_name,cus_email)VALUES('{$cart_id}','{$id}','1','{$pro_price}','{$pro_img}','{$pro_price}', '{$pro_name}','{$email}')";
$insert_reg=mysqli_query($con, $insert_cart);
echo "<script>alert('Your product successfully added into cart')</script>";
echo "<script>window.location.href='http://localhost/jenny_web/jennys_choice/product_detail.php?pt_id=$id'</script>";
}



?>

