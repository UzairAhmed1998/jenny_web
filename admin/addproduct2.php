<?php
require_once 'config.php';
if(isset($_POST['add'])){
$id=$_POST['p_id'];
$name=$_POST['p_name'];
$price=$_POST['p_price'];
$mrp=$_POST['p_mrp'];
$category=$_POST['category'];
$status=$_POST['status'];

if(isset($_FILES['profile'])){
    $errors = array();
    $filename= rand(1,10).$_FILES['profile']['name'];
    $type =$_FILES['profile']['type'];
    $temp = $_FILES['profile']['tmp_name'];
    $size = $_FILES['profile']['size'];
    $extension = array('jpg', 'png', 'PNG','jpeg', 'avif', 'jfif','webp');
    $file_ext = explode('.', $filename);
    $ext = end($file_ext);
    if(in_array($ext, $extension)=== false){
        $errors[]= "";
    }
    if($size >2097152 ){
        $errors[] = "";
    }
    if(empty($errors)== true){
        move_uploaded_file($temp,'media/'.$filename);
    }
   else if(empty($errors)==false){
       echo "<script>alert('please check your file size and extension')</script>";
        echo "<script>window.location.href='http://localhost/jenny_web/admin/addproduct.php'</script>";
        die();
    }
$insert_prod = "INSERT INTO products(p_id, p_name,p_price, p_mrp, p_img, p_status, ca_id) VALUES ('{$id}', '{$name}','{$price}','{$mrp}','{$filename}','{$status}','{$category}')";
$reg_insert = mysqli_query($con, $insert_prod);
if($reg_insert){
    echo "<script>alert('You have succeessfully added a Product')</script>";
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
  <title>Jenny's Choice - Add Product</title>
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
                <a href="product_list.php" role="button" class="btn btn-primary"><h6>View Products</h6></a>
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">ADD Product</h1>
                  </div>
                 
                  <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label> Product ID</label>
                      <input type="text" name="p_id" class="form-control" value="<?php echo rand(100,300); ?>">
                    </div>
                    <div class="form-group">
                      <label> Product Name</label>
                      <input type="text"  name="p_name" class="form-control" id="exampleInputLastName" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                      <label> Price</label>
                      <input type="text" name="p_price"  class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        >
                    </div>
                    <div class="form-group">
                      <label> M.R.P</label>
                      <input type="text" name="p_mrp" class="form-control" id="exampleInputPassword" >
                    </div>
                   
                    <div class="form-group">
                      <label>Profile picture</label>
                      <input type="file" class="form-control" name="profile">
                    </div>
                  
                    <div class="form-group">
                      <label>Category</label>
                      <select name='category'  class="form-control">
                        <?php
                        $select_cat = "SELECT * FROM category";
                        $reg_select = mysqli_query($con, $select_cat);
                        $total_rows = mysqli_num_rows($reg_select);
                        if($total_rows != 0){
                            while($data = mysqli_fetch_assoc($reg_select)){

                       
                        ?>
                        <option value="<?php echo $data['cat_id'] ?>"><?php echo $data['cat_name'] ?></option>

                        <?php
                             }
                            }
                        ?>
                    </select>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select name="status" class="form-control" >
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <button type="submit" name="add" class="btn btn-primary btn-block">ADD</button>
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

</html>