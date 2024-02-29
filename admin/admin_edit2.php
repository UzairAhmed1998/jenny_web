<?php
require_once 'config.php';
$id=$_GET['ad_id'];
if(isset($_POST['update'])){
    $id = $_GET['ad_id'];
    if($_FILES['profile']['name'] !=''){
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
            echo"<script>window.location.href='http://localhost:82/ebook_project/admin/admin_edit'</script>";
            die();
        }
    }
    $update_query=  "UPDATE admin SET a_id ='{$id}' , a_name = '{$name}', a_email = '{$email}' , a_password = '{$password}' , a_img = '{$filename}' WHERE a_id = '{$id}'";
       
    }
    else{
    $name = $_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['pass']; 
    $update_query= "UPDATE admin SET a_id ='{$id}' , a_name = '{$name}', a_email = '{$email}' , a_password = '{$password}' WHERE a_id = '{$id}'";
    }
    $res = mysqli_query($con, $update_query);
    if($res){
        echo "<script>window.location.href='http://localhost/jenny_web/admin/dashboard.php'</script>";
    }
}
$select_query = "SELECT * FROM admin WHERE a_id = '{$id}' ";
$res_select = mysqli_query($con,$select_query);
$total_rows = mysqli_num_rows($res_select);

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
  <title>Jenny's Choice - Admin_Edit</title>
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
                    <h1 class="h4 text-gray-900 mb-4">UPDATE</h1>
                  </div>
                  <?php
                  if($total_rows > 0 ){
                    while($data = mysqli_fetch_assoc($res_select)){

                 
                  ?>
                  <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>ID</label>
                      <input type="text" name="id" class="form-control" value="<?php echo $data['a_id'] ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text"  name="name" class="form-control" id="exampleInputLastName" value="<?php echo $data['a_name'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email"  class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                      value="<?php echo $data['a_email'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="text" name="pass" class="form-control" id="exampleInputPassword" value="<?php echo $data['a_password'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Repeat Password</label>
                      <input type="password" class="form-control" id="exampleInputPasswordRepeat"
                        placeholder="Repeat Password">
                    </div>
                    <div class="form-group">
                      <label>Profile picture</label>
                      <input type="file" class="form-control" name="profile">
                    </div>
                    <div class="form-group">
                      <button type="submit" name="update" class="btn btn-primary btn-block">UPDATE</button>
                    </div>
                    <hr>
                   
                  </form>
                  <?php
                     }
                    }
                    ?>
                  <hr>
                 
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

</html>
