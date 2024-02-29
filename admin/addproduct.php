
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

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
  <?php require_once 'sidebar.php' ?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
      <?php require_once 'topbar.php' ?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
            <ol class="breadcrumb">
              <!-- <li class="breadcrumb-item"><a href="./">Home</a></li> -->
              <li class="breadcrumb-item">Products</li>
              <li class="breadcrumb-item active" aria-current="page">Add Product</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-10">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <a href="product_list.php" role="button" class="btn btn-primary"><h6>View Products</h6></a>
                </div>
                <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label> Product ID</label>
                      <input type="text" name="p_id" class="form-control" value="<?php echo rand(100,300); ?>">
                    </div>
                    <div class="form-group">
                      <label> Product Name</label>
                      <input type="text" required  name="p_name" class="form-control" id="exampleInputLastName" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                      <label> Price</label>
                      <input type="text" required name="p_price"  class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        >
                    </div>
                    <div class="form-group">
                      <label> M.R.P</label>
                      <input type="text" required name="p_mrp" class="form-control" id="exampleInputPassword" >
                    </div>
                   
                    <div class="form-group">
                      <label>Product Image</label>
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
                </div>
              </div>

              <!-- Form Sizing -->
            
              <!-- Horizontal Form -->
           
              <!-- General Element -->
           
              <!-- Input Group -->
             
          <!--Row-->

          <!-- Documentation Link -->
          <!-- <div class="row">
            <div class="col-lg-12 text-center">
              <p>For more documentations you can visit<a href="https://getbootstrap.com/docs/4.3/components/forms/"
                  target="_blank">
                  bootstrap forms documentations.</a> and <a
                  href="https://getbootstrap.com/docs/4.3/components/input-group/" target="_blank">bootstrap input
                  groups documentations</a></p>
            </div>
          </div> -->

          <!-- Modal Logout -->
          <?php require_once 'logoutmodal.php' ?>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
     
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>

</body>

</html>