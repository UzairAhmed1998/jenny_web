<?php
require_once 'config.php';
$id = $_GET['pd_id'];
if(isset($_POST['update'])){
    $id = $_GET['pd_id'];
  if($_FILES['profile']['name'] != ''){
    $name = $_POST['p_name'];
    $price = $_POST['p_price'];
    $mrp = $_POST['p_mrp'];
    $category = $_POST['category'];
    $status = $_POST['status'];
    if(isset($_FILES['profile'])){
        $errors = array();
        $filename = $_FILES['profile']['name'];
        $size = $_FILES['profile']['size'];
        $temp = $_FILES['profile']['tmp_name'];
        $type = $_FILES['profile']['type'];
       
        $extension = array('png','jpg','jpeg','PNG','avif','jfif','webp');
        $file_ext=explode('.',$filename);
        $ext = end($file_ext);
        if(in_array($ext, $extension)===false){
            $errors[] = "";
        }
        if($size > 2097152){
            $errors[] = "";
        }
        if(empty($errors)==true){
            move_uploaded_file($temp,'media/'.$filename);
        }
        else if(empty($errors)==false){
            echo "<script>alert('Please check your file extension and size')</script>";
            echo "<script>window.location.href='http://localhost/jenny_web/admin/product_edit.php'</script>";
            die();
        }
       

    }
    $bupdate = "UPDATE products SET p_name ='{$name}', p_price = '{$price}', p_mrp ='{$mrp}', p_img = '{$filename}', ca_id ='{$category}', p_status ='{$status}' WHERE p_id ='{$id}' ";
   
  }  
 else {
  $name = $_POST['p_name'];
  $price = $_POST['p_price'];
  $mrp = $_POST['p_mrp'];
  $category = $_POST['category'];
  $status = $_POST['status'];
  $bupdate = "UPDATE products SET p_name ='{$name}', p_price = '{$price}', p_mrp ='{$mrp}',ca_id ='{$category}', p_status ='{$status}' WHERE p_id ='{$id}' ";
  

 } 
 $bupdate_res = mysqli_query($con, $bupdate);
 if($bupdate_res){
     echo "<script>window.location.href='http://localhost/jenny_web/admin/product_list.php'</script>";
 }
}
$select_query="SELECT * FROM products WHERE p_id ='{$id}'";
$select_reg=mysqli_query($con, $select_query);
$total_rows_sclt = mysqli_num_rows($select_reg); 
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
  <title>Jenny's Choice - Edit Product</title>
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
            <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
            <ol class="breadcrumb">
              <!-- <li class="breadcrumb-item"><a href="./">Home</a></li> -->
              <li class="breadcrumb-item">Products</li>
              <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
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
                <?php if($total_rows_sclt != 0){
                    while($data = mysqli_fetch_assoc($select_reg)){

            
                  ?> 
                  <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label> Product ID</label>
                      <input type="text" name="p_id" required class="form-control" value="<?php echo rand(100,300); ?>">
                    </div>
                    <div class="form-group">
                      <label> Product Name</label>
                      <input type="text"  name="p_name" required class="form-control" id="exampleInputLastName" value="<?php echo $data['p_name'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Price</label>
                      <input type="text" name="p_price" required  class="form-control" id="exampleInputEmail" value="<?php echo $data['p_price'] ?>" aria-describedby="emailHelp"
                        >
                    </div>
                    <div class="form-group">
                      <label>M.R.P</label>
                      <input type="text" required name="p_mrp" class="form-control" id="exampleInputPassword" value="<?php echo $data['p_mrp'] ?>" >
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
                        <option value="<?php echo $data['cat_id']; ?>"><?php echo $data['cat_name']; ?></option>

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
                      <button type="submit" name="update" class="btn btn-primary btn-block">UPDATE</button>
                    </div>
                    <hr>
                   
                  </form>
                  <?php
                  }
                }
                  ?>
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