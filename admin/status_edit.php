<?php
require_once 'config.php';
$id=$_GET['st_id'];
if(isset($_POST['update'])){
    $id=$_GET['st_id'];
    
    $status =$_POST['status'];
    $update_query = "UPDATE order_status SET status = '{$status}' WHERE id ='{$id}' ";
    $res_update = mysqli_query($con,$update_query);
    if($res_update){
        echo "<script>window.location.href='http://localhost/jenny_web/admin/view_status.php'</script>";
    }
}
$select_query = "SELECT * FROM order_status WHERE id ='{$id}'";
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
  <title>Jenny's Choice -Edit Order Status</title>
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
            <h1 class="h3 mb-0 text-gray-800">Edit Order Status</h1>
            <ol class="breadcrumb">
              <!-- <li class="breadcrumb-item"><a href="./">Home</a></li> -->
              <li class="breadcrumb-item">Order Status</li>
              <li class="breadcrumb-item active" aria-current="page">Edit Order Status</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-10">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <a role="button" class="btn btn-primary" href="view_status.php">View Order Status</a>
                </div>
                <div class="card-body">
                <?php if($total_rows != 0){
                    while($data = mysqli_fetch_assoc($res_select)){

                 
                  ?>
                  <form method="POST">
                    <div class="form-group">
                      <label>ID</label>
                      <input type="text" required name="id" class="form-control" value="<?php echo $data['id'] ?>">
                    </div>
                   
                    <div class="form-group">
                      <label>Category Status</label>
                      <select name="status" class="form-control" >
                      <option value="Processing">Processing</option>
                      <option value="Pending">Pending</option>
                      <option value="Complete">Complete</option>
                      <option value="Shipped">Shipped</option>
                      <option value="Cancel">Cancel</option>
                      
                     </select>
                    <br>
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