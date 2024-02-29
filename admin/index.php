<?php
require_once "config.php";
if(isset($_POST['login'])){

  $admin_email = $_POST['adminemail'];
  $admin_pass = $_POST['adminpassword'];
  $login_sql = "SELECT * FROM admin WHERE a_email = '{$admin_email}' AND a_password='{$admin_pass}'";
  $res_login = mysqli_query($con,$login_sql);
  $total_rows = mysqli_num_rows($res_login);
  if($total_rows!=0){
    while($data = mysqli_fetch_assoc($res_login)){
      $_SESSION['adminname'] = $data['a_name'];
      $_SESSION['profile'] = $data['a_img'];
      $_SESSION['adminemail'] = $data['a_email'];
      echo "<script>window.location.href='http://localhost/jenny_web/admin/dashboard.php'</script>";
    }
  }
  else{
    echo "<script>alert('Username or password is incorrect..!')</script>";
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
  <title>Jenny's Choice -Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" method="POST">
                    <div class="form-group">
                      <input type="email" name="adminemail" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address">
                    </div>
                    <div class="form-group">
                      <input type="password" name="adminpassword" class="form-control" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Login" name="login" href="dashboard.php" class="btn btn-primary btn-block">
                    </div>
                    <hr>
                 
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="register.php">Create an Account!</a>
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
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>