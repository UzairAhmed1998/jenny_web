<?php
require_once 'config.php';
$email =$_SESSION['cusemail'];
$select_cus="SELECT * FROM customer WHERE cus_email='{$email}'";
$cus_reg=mysqli_query($con, $select_cus);
$total_rows=mysqli_num_rows($cus_reg);
if($total_rows != 0){
    while($data=mysqli_fetch_assoc($cus_reg)){
        $id=$data['cus_id'];
    }
}
$select_order="SELECT * FROM orders INNER JOIN order_detail ON orders.order_id=order_detail.ordr_id INNER JOIN products ON order_detail.pro_id=products.p_id WHERE cu_id='{$id}'";
$order_reg=mysqli_query($con, $select_order);
$total_rows2=mysqli_num_rows($order_reg);

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jenny's Choice | Shopping Cart</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
   
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
   <?php require_once 'header.php' ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Your Orders</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                               
                                <tr style="text-align:center;">
                                    <th style="font-size:15px;">Product Image</th>
                                    <th style="font-size:15px;">Product Name</th>
                                    <th style="font-size:15px;">Price</th>
                                    <th style="font-size:15px;">Quantity</th>
                                    <th style="font-size:15px;">City</th>
                                    <th style="font-size:15px;">Address </th>
                                    <th style="font-size:15px;">Pincode</th>
                                    <th style="font-size:15px;">Added On</th>
                                    <th style="font-size:15px;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if($total_rows2 != 0){
                                    while($data=mysqli_fetch_assoc($order_reg)){

                               
                                ?>
                                <tr style="text-align:center;">
                                    <td class="cart__product__item" style="width:180px">
                                        <img src="../admin/media/<?php echo $data['p_img'] ?>" alt="" width="100px" height="90px">
                                    </td>
                                    <td>
                                        <div class="cart__product__item__title" style="width:250px">
                                            <h6 style="font-size:14px;"><?php echo $data['p_name'] ?></h6>
                                           
                                        </div>
                                    </td>
                                    <td class="cart__price" style="font-size:14px;">PKR <?php echo $data['p_price'] ?></td>
                                    <td class="cart__price"  style="width:60px;font-size:14px"> <?php echo $data['quantity'] ?></td>
                                    <td class="cart__price" style="font-size:14px;" > <?php echo $data['city'] ?></td>
                                    <td class="cart__price" style="font-size:14px;" > <?php echo $data['address'] ?></td>
                                    <td class="cart__price" style="font-size:14px;" > <?php echo $data['Pincode'] ?></td>
                                    <td class="cart__price" style="font-size:14px;" > <?php echo $data['added_on'] ?></td>
                                    <td class="cart__total" style="font-size:14px;">PKR <?php echo $data['total'] ?></td>
                                  
                                </tr>
                                <?php
                                     }
                                    }
                                ?>
                               
                            </tbody>
                        </table>
                        <h5>For more information according to your order please contact us by visiting our <a href="contact.php">contact page.</a></h5>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="product_list2.php">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="#"><span class="icon_loading"></span> Update cart</a>
                    </div>
                </div>
            </div> -->
            <!-- <div class="row">
                <div class="col-lg-6">
                    <div class="discount__content">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Apply</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                           
                        </ul>
                       
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <!-- Shop Cart Section End -->

    <!-- Instagram Begin -->
  
    <!-- Instagram End -->

    <!-- Footer Section Begin -->
 <?php require_once 'footer.php' ?>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>