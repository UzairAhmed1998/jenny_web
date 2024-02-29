<?php
require_once 'config.php';
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
            <!-- <li><span class="icon_search search-switch"></span></li> -->
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
                <a href='register.php'>My Account</a>";
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
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="index.php">Home</a></li>
                            <!-- <li><a href="#">Women’s</a></li> -->
                            <!-- <li><a href="#">Men’s</a></li> -->
                            <!-- <li><a href="./shop.html">Shop</a></li> -->
                            <li><a href="product_list2.php">Shop</a>
                                <ul class="dropdown">
                                    <?php 
                                    $select_cat="SELECT * FROM category WHERE cat_status = '1'";
                                    $cat_reg=mysqli_query($con,$select_cat);
                                    $total_rows=mysqli_num_rows($cat_reg);
                                    if($total_rows != 0){
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
                <div class="col-lg-3">
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
                       
                        <ul class="header__right__widget">
                            <!-- <li><span class="icon_search search-switch"></span></li> -->
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