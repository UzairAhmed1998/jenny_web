<?php
require_once 'config.php';
$email=$_SESSION['cusemail'];
$select_cart="SELECT * FROM customer WHERE cus_email = '{$email}'";
$cart_reg=mysqli_query($con, $select_cart);
$total_rows=mysqli_num_rows($cart_reg);
if($total_rows != 0){
    while($data= mysqli_fetch_assoc($cart_reg)){
        $c_id=$data['cus_id'];
        

    }
}

$total_cost="SELECT SUM(total) AS cart_total from cart WHERE cus_email='{$email}' ";
$cost_reg=mysqli_query($con, $total_cost);
$totalcost_rows=mysqli_num_rows($cost_reg);
if($totalcost_rows!=0){
    while($data=mysqli_fetch_assoc($cost_reg)){
        $order_total=$data['cart_total'];
    }
}
$order_id=rand(10,200);
$city=$_POST['city'];
$adress=$_POST['address'];
$code=$_POST['code'];
$cod=$_POST['cod'];
$insert_order="INSERT INTO orders (order_id,cu_id,address,city,Pincode,payment_type,payment_status,order_status,pro_total)VALUES('{$order_id}','{$c_id}','{$adress}','{$city}','{$code}','{$cod}','success','1','{$order_total}')";
$orderins_reg=mysqli_query($con, $insert_order);


$select_cart2="SELECT * FROM cart WHERE cus_email='{$email}'";
$cart_reg2=mysqli_query($con, $select_cart2);
$total_rows2=mysqli_num_rows($cart_reg2);



if($orderins_reg){
    if($total_rows2 != 0){
        while($data=mysqli_fetch_assoc($cart_reg2)){
            
            $orderdt_id=rand(100,500);
            $prod_id=$data['pro_id'];
            $qty = $data['quantity'];
            $total=$data['total'];
       
        $insertdt_order="INSERT INTO order_detail(od_id,ordr_id,pro_id,quantity,total)VALUES('{$orderdt_id}','{$order_id}', '{$prod_id}','{$qty}','{$total}')";
        $orderdtins_reg=mysqli_query($con, $insertdt_order);
        $delete_cart="DELETE FROM cart WHERE cus_email ='{$email}'";
        $delcart_reg=mysqli_query($con, $delete_cart);
    }
    }
  
}
echo "<script>alert('You successfully placed your order...!')</script>";
echo "<script>window.location.href='http://localhost/jenny_web/jennys_choice/'</script>";


?>