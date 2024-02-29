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
  <title>Jenny's Choice - Product Edit</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
<?php require_once 'topbar.php' ?>

  <!-- Register Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
             
              <div class="col-lg-12">
              
                <div class="login-form">
                <a href="product_list.php"><h4>View Products</h4></a>
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">EDIT Product</h1>
                  </div>
                  <?php if($total_rows_sclt != 0){
                    while($data = mysqli_fetch_assoc($select_reg)){

            
                  ?> 
                  <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label> Product ID</label>
                      <input type="text" name="p_id" class="form-control" value="<?php echo rand(100,300); ?>">
                    </div>
                    <div class="form-group">
                      <label> Product Name</label>
                      <input type="text"  name="p_name" class="form-control" id="exampleInputLastName" value="<?php echo $data['p_name'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Price</label>
                      <input type="text" name="p_price"  class="form-control" id="exampleInputEmail" value="<?php echo $data['p_price'] ?>" aria-describedby="emailHelp"
                        >
                    </div>
                    <div class="form-group">
                      <label>M.R.P</label>
                      <input type="text" name="p_mrp" class="form-control" id="exampleInputPassword" value="<?php echo $data['p_mrp'] ?>" >
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