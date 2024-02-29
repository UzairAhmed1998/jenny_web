<?php
require_once 'config.php';
$cnt_id=rand(10,90);

if(isset($_SESSION['cusemail'])){
    if(isset($_POST['btn'])){
        $email = $_SESSION['cusemail'];
        $comment=$_POST['comments'];

        $select_cus="SELECT * FROM customer WHERE cus_email ='{$email}'";
        $cus_reg=mysqli_query($con, $select_cus);
        $total_rows=mysqli_num_rows($cus_reg);
        if($total_rows !=0){
            while($data=mysqli_fetch_assoc($cus_reg)){
                $c_name = $data['cus_name'];
            }
        }
        $insert_contact="INSERT INTO contact(id,msg,customer_eml,cnt_name)VALUES('{$cnt_id}','{$comment}','{$email}','{$c_name}')";
        $insert_reg=mysqli_query($con, $insert_contact);
        if($insert_reg){
            echo "<script>alert('Thank you for giving us your feedback.')</script>";
        }
    }
}
else{
    if(isset($_POST['btn'])){
        $comment=$_POST['comments'];
    $name=$_POST['name'];
    $email=$_POST['email'];    
    $insert_contact="INSERT INTO contact(id,msg,customer_eml,cnt_name)VALUES('{$cnt_id}','{$comment}','{$email}','{$name}')";
    $insert_reg=mysqli_query($con, $insert_contact);
    if($insert_reg){
        echo "<script>alert('Thank you for giving us your feedback.')</script>";
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
    <title>Jenny's Choice | Contact</title>

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
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__content">
                        <div class="contact__address">
                            <h5>Contact info</h5>
                            <ul>
                                <li>
                                    <h6><i class="fa fa-map-marker"></i> Address</h6>
                                    <p> Saddle River,New Jersey 07458, USA</p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-phone"></i> Phone</h6>
                                    <p><span>125-711-811</span><span>125-668-886</span></p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-headphones"></i> Support</h6>
                                    <p>Support.jennyschoice@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                        <div class="contact__form">
                            <h5>SEND MESSAGE</h5>
                            <?php if(isset($_SESSION['cusemail'])){ ?>
                            <form  method="POST">
                               
                               
                                <textarea placeholder="Message" name="comments"></textarea>
                                <button type="submit" name="btn"  class="site-btn">Send Message</button>
                            </form>
                            <?php
                            }
                            else{
                            ?>
                             <form method="POST">
                                <input type="text" required name="name" placeholder="Name">
                                <input type="text" required name="email" placeholder="Email">
                               
                                <textarea placeholder="Message" name="comments"></textarea>
                                <button type="submit" name="btn" class="site-btn">Send Message</button>
                            </form>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__map">
                        <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48158.305462977965!2d-74.13283844036356!3d41.02757295168286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2e440473470d7%3A0xcaf503ca2ee57958!2sSaddle%20River%2C%20NJ%2007458%2C%20USA!5e0!3m2!1sen!2sbd!4v1575917275626!5m2!1sen!2sbd"
                        height="780" style="border:0" allowfullscreen="">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

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