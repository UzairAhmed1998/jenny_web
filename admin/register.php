<?php
require_once 'config.php';
if(isset($_POST['register'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['pass'];
    if(isset($_FILES['profile'])){
        $errors = array();
        $filename = rand(0,10).$_FILES['profile']['name'];
        $size = $_FILES['profile']['size'];
        $temp = $_FILES['profile']['tmp_name'];
        $type = $_FILES['profile']['type'];
        $extension = array('jpg','jpeg','avif','png','jfif','webp');
        $file_ext = explode('.',$filename);
        $ext = end($file_ext);
        if(in_array($ext,$extension)===false){
            $errors[] = "";

        }
        if($size > 2097152){
            $errors[] = "";

        }
        if(empty($errors)==true){
            move_uploaded_file($temp,'media/'.$filename);

        }
        else if(empty($errors)==false){

            echo "<script>alert('Please check file size or format')</script>";
            echo"<script>window.location.href='http://localhost/jenny_web/admin/register.php'</script>";
            die();
        }
        $insert_reg = "INSERT INTO admin(a_id, a_name, a_email, a_password, a_img) VALUES('{$id}','{$name}', '{$email}','{$password}','{$filename}')";
        $res_reg = mysqli_query($con,$insert_reg);
        if($res_reg){
            echo "<script>alert('you are successfully register')</script>";
            echo"<script>window.location.href='http://localhost/jenny_web/admin/index.php'</script>";
           
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/crown_jenny.png" rel="icon">
  <title>Jenny's Choice - Register</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Register Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register Your Account</h1>
                  </div>
                  <form method="POST" enctype="multipart/form-data" onsubmit="return repeat()">
                    <div class="form-group">
                      <label>ID</label>
                      <input type="text" name="id" class="form-control" required value="<?php echo rand(10,50); ?>">
                    </div>
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text"  name="name" class="form-control" required id="exampleInputLastName" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email"  class="form-control" required id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="pass" required class="form-control" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <!-- <div class="form-group">
                      <label>Repeat Password</label>
                      <p id="rp"></p>
                      <input type="password" class="form-control" id="exampleInputPasswordRepeat"
                        placeholder="Repeat Password">
                    </div> -->
                    <div class="form-group">
                      <label>Profile picture</label>
                      <input type="file" class="form-control" name="profile">
                    </div>
                    <div class="form-group">
                      <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <hr>
                   
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="index.php">Already have an account?</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Register Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>
<!-- <script>
  function repeat(){
a=document.querySelector('#exampleInputPassword');
b=document.querySelector('#exampleInputPasswordRepeat');
if(b.match(a)){
  document.querySelector('#rp').textContent = "confirm password";
  
}
else{
  document.querySelector("#rp").textContent = "Password doesnt match"
  return false;
}
  }

</script> -->

</html>