<?php
require_once 'config.php';
$id = $_GET['ct_id'];
$select_pro="SELECT * FROM products WHERE ca_id ='{$id}'";
$pro_reg=mysqli_query($con, $select_pro);
$total_rows=mysqli_num_rows($pro_reg);
if(isset($_SESSION['cusemail'])){
$email=$_SESSION['cusemail'];
$slt_cart="SELECT COUNT(*) AS total_cart FROM cart WHERE cus_email='{$email}'";
$slt_cart_reg=mysqli_query($con, $slt_cart);
$total_rows_sltcart=mysqli_num_rows($slt_cart_reg);
if($total_rows_sltcart != 0){
    while($data =mysqli_fetch_assoc($slt_cart_reg)){
        $count=$data['total_cart'];
    }
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
    <title>Jenny's Choice | Products</title>

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
    <style>
        .cat:hover{
            
            text-decoration:underline;
            
        }
        .header__right__auth{
            margin-right:10px;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
 
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <div class="header__right__auth">
                            <a href="#" style="font-weight:bold;"><?php if(isset($_SESSION['cusname'])){
                                                                            echo $_SESSION['cusname']; }
                                                                            else{
                                                                                echo "Guest";
                                                                            } ?></a>
                            
                        </div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <!-- <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li> -->
            <?php if(isset($_SESSION['cusemail'])){

?>
<li><a href="view_cart.php"><span class="icon_bag_alt"></span>

   <div class="tip"><?php echo $count ?></div>
</a></li>
<?php
}
else{


?>
<li><a href="login2.php"><span class="icon_bag_alt"></span>

<div class="tip"><?php echo $count ?></div>
</a></li>
<?php
}
?>
        </ul>
        <div class="offcanvas__logo">
            <a href="index.php"><img src="img/logo3.png" width="100px" height="90px" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <?php if(isset($_SESSION['cusname'])){
                  echo "<a href='logout.php'>Log Out</a>
                  <a href='account.php'>My Account</a>";
              }
              
              
              else{
                  echo " <a href='login.php'>Login</a>
                  <a href='register.php'>Register</a>";
              }
            ?>
           
            <!-- <a href="login.php">Login</a>
            <a href="register.php">Register</a> -->
        </div>
    </div>
<header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="index.php"><img src="img/logo3.PNG" alt="" width="120px" height="110px"></a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <!-- <li><a href="#">Women’s</a></li> -->
                            <!-- <li><a href="#">Men’s</a></li> -->
                            <!-- <li><a href="./shop.html">Shop</a></li> -->
                            <li class="active"><a href="product_list2.php">Shop</a>
                                <ul class="dropdown">
                                    <?php 
                                    $select_cat="SELECT * FROM category WHERE cat_status = '1'";
                                    $cat_reg=mysqli_query($con,$select_cat);
                                    $total_rowsh =mysqli_num_rows($cat_reg);
                                    if($total_rowsh != 0){
                                        while($data=mysqli_fetch_assoc($cat_reg)){

                                    
                                    ?>
                                    <li><a href="product_list.php?ct_id=<?php echo $data['cat_id']?>"><?php echo $data['cat_name'] ?></a></li>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <!-- <li><a href="./shop-cart.html">Shop Cart</a></li>
                                    <li><a href="./checkout.html">Checkout</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li> -->
                                </ul>
                            </li>
                            <!-- <li><a href="./blog.html">Blog</a></li> -->
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-4">
                    <div class="header__right">
                        <div class="header__right__auth">
                        <?php if(isset($_SESSION['cusname'])){
                  echo "<a href='logout.php'>Log Out</a>
                  <a href='account.php'>My Account</a>";
              }
              
              
              else{
                  echo " <a href='login.php'>Login</a>
                  <a href='register.php'>Register</a>";
              }
            ?>
            <!-- <a href='register.php'>Register</a> -->
                        </div>
                        <div class="header__right__auth">
                            <a href="#" style="font-weight:bold;"><?php if(isset($_SESSION['cusname'])){
                                                                            echo $_SESSION['cusname']; }
                                                                            else{
                                                                                echo "Guest";
                                                                            } ?></a>
                            
                        </div>
                                                                        </div>
                                                                        </div>
                     <div class="col-lg-1">
                    <div class="header__right">
                       
                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                            <!-- <li><a href="#"><span class="icon_heart_alt"></span>
                                <div class="tip">2</div>
                            </a></li> -->
                          
                            <?php if(isset($_SESSION['cusemail'])){

?>
<li><a href="view_cart.php"><span class="icon_bag_alt"></span>

   <div class="tip"><?php echo $count ?></div>
</a></li>
<?php
}
else{


?>
<li><a href="login2.php"><span class="icon_bag_alt"></span>

<div class="tip"><?php echo $count ?></div>
</a></li>
<?php
}
?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Categories</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
<?php
$select_cat="SELECT * FROM category";
$select_reg=mysqli_query($con, $select_cat);
$total_rows2=mysqli_num_rows($select_reg);
if($total_rows2 != 0){
    while($data = mysqli_fetch_assoc($select_reg)){


?>
                                    <div class="card">
                                        <div >
                                            <a href="product_list.php?ct_id=<?php echo $data['cat_id'] ?>" style="color:red;" class="cat"><?php echo $data['cat_name'] ?></a>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <!-- <ul>
                                                    <li><a href="#">Coats</a></li>
                                                    <li><a href="#">Jackets</a></li>
                                                    <li><a href="#">Dresses</a></li>
                                                    <li><a href="#">Shirts</a></li>
                                                    <li><a href="#">T-shirts</a></li>
                                                    <li><a href="#">Jeans</a></li>
                                                </ul> -->
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <!-- <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseTwo">Men</a>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Coats</a></li>
                                                    <li><a href="#">Jackets</a></li>
                                                    <li><a href="#">Dresses</a></li>
                                                    <li><a href="#">Shirts</a></li>
                                                    <li><a href="#">T-shirts</a></li>
                                                    <li><a href="#">Jeans</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseThree">Kids</a>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Coats</a></li>
                                                    <li><a href="#">Jackets</a></li>
                                                    <li><a href="#">Dresses</a></li>
                                                    <li><a href="#">Shirts</a></li>
                                                    <li><a href="#">T-shirts</a></li>
                                                    <li><a href="#">Jeans</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="card">
                                        <div >
                                            <a  >Accessories</a>
                                        </div>
                                        <div >
                                           
                                        </div>
                                    </div> -->
                                    <!-- <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseFive">Cosmetic</a>
                                        </div>
                                        <div id="collapseFive" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Coats</a></li>
                                                    <li><a href="#">Jackets</a></li>
                                                    <li><a href="#">Dresses</a></li>
                                                    <li><a href="#">Shirts</a></li>
                                                    <li><a href="#">T-shirts</a></li>
                                                    <li><a href="#">Jeans</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- <div class="sidebar__filter">
                            <div class="section-title">
                                <h4>Shop by price</h4>
                            </div>
                            <div class="filter-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="33" data-max="99"></div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <p>Price:</p>
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                            <a href="#">Filter</a>
                        </div> -->
                        <div class="sidebar__sizes">
                            <!-- <div class="section-title">
                                <h4>Shop by size</h4>
                            </div> -->
                            <!-- <div class="size__list">
                                <label for="xxs">
                                    xxs
                                    <input type="checkbox" id="xxs">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="xs">
                                    xs
                                    <input type="checkbox" id="xs">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="xss">
                                    xs-s
                                    <input type="checkbox" id="xss">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="s">
                                    s
                                    <input type="checkbox" id="s">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="m">
                                    m
                                    <input type="checkbox" id="m">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="ml">
                                    m-l
                                    <input type="checkbox" id="ml">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="l">
                                    l
                                    <input type="checkbox" id="l">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="xl">
                                    xl
                                    <input type="checkbox" id="xl">
                                    <span class="checkmark"></span>
                                </label>
                            </div> -->
                        </div>
                        <!-- <div class="sidebar__color">
                            <div class="section-title">
                                <h4>Shop by size</h4>
                            </div>
                            <div class="size__list color__list">
                                <label for="black">
                                    Blacks
                                    <input type="checkbox" id="black">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="whites">
                                    Whites
                                    <input type="checkbox" id="whites">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="reds">
                                    Reds
                                    <input type="checkbox" id="reds">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="greys">
                                    Greys
                                    <input type="checkbox" id="greys">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="blues">
                                    Blues
                                    <input type="checkbox" id="blues">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="beige">
                                    Beige Tones
                                    <input type="checkbox" id="beige">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="greens">
                                    Greens
                                    <input type="checkbox" id="greens">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="yellows">
                                    Yellows
                                    <input type="checkbox" id="yellows">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        <?php 
                        if($total_rows !=0){
                            while($data=mysqli_fetch_assoc($pro_reg)){

                        
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="../admin/media/<?php echo $data['p_img'] ?>">
                                    <!-- <div class="label new">New</div> -->
                                    <ul class="product__hover">
                                        <li><a href="../admin/media/<?php echo $data['p_img'] ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <!-- <li><a href="#"><span class="icon_heart_alt"></span></a></li> -->
                                        <li><a href="product_detail.php?pt_id=<?php echo $data['p_id'] ?>"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="product_detail.php?pt_id=<?php echo $data['p_id'] ?>"><?php echo $data['p_name'] ?></a></h6>
                                    <!-- <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div> -->
                                    <div class="product__price">PKR  <?php echo $data['p_price'] ?></div>
                                </div>
                            </div>
                        </div>
                        <?php 
                            }
                        }
                        ?>
                        <!-- <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/shop/shop-2.jpg">
                                    <ul class="product__hover">
                                        <li><a href="img/shop/shop-2.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Flowy striped skirt</a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">$ 49.0</div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/shop/shop-3.jpg">
                                    <ul class="product__hover">
                                        <li><a href="img/shop/shop-3.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Croc-effect bag</a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">$ 59.0</div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/shop/shop-4.jpg">
                                    <ul class="product__hover">
                                        <li><a href="img/shop/shop-4.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Dark wash Xavi jeans</a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">$ 59.0</div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-4 col-md-6">
                            <div class="product__item sale">
                                <div class="product__item__pic set-bg" data-setbg="img/shop/shop-5.jpg">
                                    <div class="label">Sale</div>
                                    <ul class="product__hover">
                                        <li><a href="img/shop/shop-5.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Ankle-cuff sandals</a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">$ 49.0 <span>$ 59.0</span></div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/shop/shop-6.jpg">
                                    <ul class="product__hover">
                                        <li><a href="img/shop/shop-6.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Contrasting sunglasses</a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">$ 59.0</div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/shop/shop-7.jpg">
                                    <ul class="product__hover">
                                        <li><a href="img/shop/shop-7.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Circular pendant earrings</a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">$ 59.0</div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/shop/shop-8.jpg">
                                    <div class="label stockout stockblue">Out Of Stock</div>
                                    <ul class="product__hover">
                                        <li><a href="img/shop/shop-8.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Cotton T-Shirt</a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">$ 59.0</div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-4 col-md-6">
                            <div class="product__item sale">
                                <div class="product__item__pic set-bg" data-setbg="img/shop/shop-9.jpg">
                                    <div class="label">Sale</div>
                                    <ul class="product__hover">
                                        <li><a href="img/shop/shop-9.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Water resistant zips backpack</a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">$ 49.0 <span>$ 59.0</span></div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-12 text-center">
                            <!-- <div class="pagination__option">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-angle-right"></i></a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    <!-- Instagram Begin -->
    <!-- <div class="instagram">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-1.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-2.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-3.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-4.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-5.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-6.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Instagram End -->

    <!-- Footer Section Begin -->
  <?php require_once 'footer.php' ?>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form" method="GET" action="search2.php">
                <input type="text" id="search-input" name="search"  placeholder="Search here.....">
               
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