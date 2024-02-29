<?php
require_once 'config.php';
$id=$_GET['ct_id'];
if(isset($_POST['update'])){
    $id=$_GET['ct_id'];
    $name=$_POST['name'];
    $status =$_POST['status'];
    $update_query = "UPDATE category SET cat_name ='{$name}', cat_status = '{$status}' WHERE cat_id ='{$id}' ";
    $res_update = mysqli_query($con,$update_query);
    if($res_update){
        echo "<script>window.location.href='http://localhost/jenny_web/admin/category_list.php'</script>";
    }
}
$select_query = "SELECT * FROM category WHERE cat_id ='{$id}'";
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
  <title>Jenny's Choice - Cat_Edit</title>
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
                  <?php if($total_rows != 0){
                    while($data = mysqli_fetch_assoc($res_select)){

                 
                  ?>
                  <form method="POST">
                    <div class="form-group">
                      <label>Category ID</label>
                      <input type="text" name="id" class="form-control" value="<?php echo rand(10000,50000) ?>">
                    </div>
                    <div class="form-group">
                      <label>Category Name</label>
                      <input type="text"  name="name" class="form-control" id="exampleInputLastName" value="<?php echo $data['cat_name'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Category Status</label>
                     <select name="status" class="form-control" >
                      <option value="1">Active</option>
                      <option value="0">Deactive</option>
                     </select>
                    <br>
                    <div class="form-group">
                      <button type="submit" name="update" class="btn btn-primary btn-block">Add Category</button>
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