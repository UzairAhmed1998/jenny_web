<?php
require_once 'config.php';
$email=$_SESSION['cusemail'];
$select_cart = "SELECT * FROM cart WHERE cus_email ='{$email}'";
$cart_reg=mysqli_query($con, $select_cart);
$total_rows=mysqli_num_rows($cart_reg);
$select_cart2="SELECT SUM(total) AS total_cart FROM cart WHERE cus_email ='{$email}'";
$cart_reg2=mysqli_query($con, $select_cart2);
$total_rows2=mysqli_num_rows($cart_reg2);
if($total_rows2){
    while($data=mysqli_fetch_assoc($cart_reg2)){
        $total=$data['total_cart'];
    }
}


?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jenny's Choice | Order</title>

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
                    <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="view_cart.php">Shopping Cart </a>
                        <span>Order</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <!-- <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
                    here to enter your code.</h6>
                </div>
            </div> -->
            <form action="place_order.php" method="POST" class="checkout__form">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Billing detail</h5>
                        <div class="row">
                            <!-- <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>First Name <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div> -->
                            <!-- <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Last Name <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div> -->
                            <div class="col-lg-7">
                                <div class="checkout__form__input">
                                    <p>City <span>*</span></p>
                                    <input type="text" required name="city">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Address <span>*</span></p>
                                    <input type="text" required placeholder="Street Address" name="address">
                                   
                                </div>
                                <!-- <div class="checkout__form__input">
                                    <p>Town/City <span>*</span></p>
                                    <input type="text">
                                </div> -->
                                <!-- <div class="checkout__form__input">
                                    <p>Country/State <span>*</span></p>
                                    <input type="text">
                                </div> -->
                                <div class="checkout__form__input">
                                    <p>Postcode/Zip <span>*</span></p>
                                    <input type="text" required name="code">
                                </div>
                            </div>
                            <!-- <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Phone <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div> -->
                            <!-- <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div> -->
                            <div class="col-lg-5">
                                <div class="checkout__form__checkbox">
                                    <label >
                                        COD
                                        <input type="checkbox" required  value="COD" name="cod">
                                        <span class="checkmark"></span>
                                    </label>
                                   
                                    </div>
                                   
                                   
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="checkout__order">
                                <h5>Your order</h5>
                                <div class="checkout__order__product">
                                    <ul>
                                        <li>
                                            <span class="top__text">Product</span>
                                            <span class="top__text__right">Total</span>
                                        </li>
                                        <?php if($total_rows != 0){
                                            while($data=mysqli_fetch_assoc($cart_reg)){

                                       
                                        ?>
                                        <li><?php echo $data['cart_id'] ?>. <?php echo $data['pro_name'] ?> <span>PKR <?php echo $data['total'] ?></span></li>
                                        <?php
                                             }

                                            } 
                                        ?>
                                    </ul>
                                </div>
                                <div class="checkout__order__total">
                                    <ul>
                                        
                                        <li>Total <span>PKR <?php echo $total ?></span></li>
                                    </ul>
                                </div>
                                <!-- <div class="checkout__order__widget">
                                    <label for="o-acc">
                                        Create an acount?
                                        <input type="checkbox" id="o-acc">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>Create am acount by entering the information below. If you are a returing customer
                                    login at the top of the page.</p>
                                    <label for="check-payment">
                                        Cheque payment
                                        <input type="checkbox" id="check-payment">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label for="paypal">
                                        PayPal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div> -->
                                <button type="submit" class="site-btn btn-secondary">Place Order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Checkout Section End -->

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