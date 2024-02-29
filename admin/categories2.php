<?php
require_once 'config.php';
if(isset($_POST['add'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $status=$_POST['status'];
    
        $insert_reg = "INSERT INTO category(cat_id, cat_name, cat_status) VALUES('{$id}','{$name}', '{$status}')";
        $res_reg = mysqli_query($con,$insert_reg);
        if($res_reg){
            echo "<script>alert('you have successfully add category')</script>";
            
           
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
  <title>Jenny's Choice - ADD_Cat</title>
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
                  <a role="button" class="btn btn-primary" href="category_list.php">View Category List</a>
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Category</h1>
                  </div>
                  <form method="POST">
                    <div class="form-group">
                      <label>Category ID</label>
                      <input type="text" name="id" class="form-control" value="<?php echo rand(10000,50000) ?>">
                    </div>
                    <div class="form-group">
                      <label>Category Name</label>
                      <input type="text"  name="name" class="form-control" id="exampleInputLastName" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                      <label>Category Status</label>
                     <select name="status" class="form-control" >
                      <option value="1">Active</option>
                      <option value="0">Deactive</option>
                     </select>
                    <br>
                    <div class="form-group">
                      <button type="submit" name="add" class="btn btn-primary btn-block">Add Category</button>
                    </div>
                    <hr>
                   
                  </form>
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