<?php
require_once 'config.php';
if(isset($_SESSION['cusemail'])){
$email =$_SESSION['cusemail'];
$select_cart="SELECT * FROM cart WHERE cus_email ='{$email}'";
$cart_reg=mysqli_query($con, $select_cart);
$total_rows=mysqli_num_rows($cart_reg);
$select_cart3="SELECT * FROM cart WHERE cus_email ='{$email}'";
$cart_reg3=mysqli_query($con, $select_cart3);
$total_rows3=mysqli_num_rows($cart_reg3);
}
$select_cart2="SELECT SUM(total) AS cart_total FROM cart WHERE cus_email = '{$email}'";
$cart_reg2=mysqli_query($con, $select_cart2);
$total_rows2=mysqli_num_rows($cart_reg2);


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
                        <span>Shopping cart</span>
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
                               
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if($total_rows != 0){
                                    while($data=mysqli_fetch_assoc($cart_reg)){

                               
                                ?>
                                <tr>
                                    <td class="cart__product__item">
                                        <img src="../admin/media/<?php echo $data['cart_img'] ?>" alt="" width="100px" height="90px">
                                        <div class="cart__product__item__title">
                                            <h6><?php echo $data['pro_name'] ?></h6>
                                           
                                        </div>
                                    </td>
                                    <td class="cart__price">PKR <?php echo $data['cart_price'] ?></td>
                                    <td >
                                        <div >
                                        <a href="minus.php?cr_id=<?php echo $data['cart_id'] ?>" style="font-size:30px;">-</a>
                                            &nbsp;
                                            <?php echo $data['quantity'] ?>
                                            &nbsp;
                                            <a href="plus.php?cr_id=<?php echo $data['cart_id'] ?>" style="font-size:20px;">+</a>
                                            
                                        </div>
                                    </td>
                                    <td class="cart__total">PKR <?php echo $data['total'] ?></td>
                                    <td class="cart__close"><a href="cart_delete.php?cr_id=<?php echo $data['cart_id'] ?>"><span  class="icon_close"></span></a></td>
                                </tr>
                                <?php
                                     }
                                    }
                                   
                                ?>
                               
                              
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>
            <?php
                         if($total_rows3 == 0){
                           
                            echo "You haven't cart any product now...!";
                        }
                            
                                    
                               ?>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="product_list2.php">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <!-- <div class="cart__btn update__btn">
                        <a href="#"><span class="icon_loading"></span> Update cart</a>
                    </div> -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <!-- <div class="discount__content">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Apply</button>
                        </form>
                    </div> -->
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <?php if($total_rows2 != 0){
                                while($data=mysqli_fetch_assoc($cart_reg2)){

                           
                            ?>
                            <li>Total 
                                <span>PKR <?php echo $data['cart_total'] ?></span>
                            </li>
                            <?php
                                 }
                                } 
                            ?>
                        </ul>
                        <?php if($total_rows3==0){

                        }
                        else{?>
                        <a href="order.php" class="primary-btn btn-secondary">Proceed to checkout</a>
                    <?php } ?>
                    </div>
                </div>
            </div>
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