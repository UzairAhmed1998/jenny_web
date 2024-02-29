<?php
require_once 'config.php';
require_once 'function.php';
$slct_query = "SELECT * FROM category";
$res_select= mysqli_query($con, $slct_query);
$total_rows = mysqli_num_rows($res_select);
if(isset($_GET['ct_id']) && $_GET['ct_id'] != '' ){
  $id = get_safe_value($con, $_GET['ct_id']);
  $type = get_safe_value($con, $_GET['type']);
  $operation = get_safe_value($con,$_GET['operation']);
  if($type =='status'){
    if($operation == 'active'){
      $status = 1 ;
    }
    else{
      $status = 0;
    }
    $update_status="UPDATE category SET cat_status = '{$status}' WHERE cat_id = '{$id}' ";
    $reg_update = mysqli_query($con,$update_status);
    if($reg_update){
      echo "<script>window.location.href='http://localhost/jenny_web/admin/category_list.php'</script>";
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
  <title>Jenny's Choice - Cat_list</title>
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

            <h1 class="h3 mb-0 text-gray-800">Category List</h1>
             
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Menu</li>
              <li class="breadcrumb-item active" aria-current="page">Categories</li>
            </ol>
          </div>
          <a href="categories.php" role="button" class="btn btn-primary">Add Category</a>

          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <!-- <h6 class="m-0 font-weight-bold text-primary">Simple Tables</h6> -->
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                     
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if($total_rows != 0){
                        while($data = mysqli_fetch_assoc($res_select)){

                    
                      ?>
                      <tr>
                        <td><?php echo $data['cat_id'] ?></td>
                        <td><?php echo $data['cat_name'] ?></td>
                        <td>
                        <?php
                        if($data['cat_status'] == '1' ){

                        
                        ?>
                        <a href="?type=status&operation=deactive&ct_id=<?php echo $data['cat_id'] ?>" role="button" class="btn btn-success" >Active</a>
                        <?php
                        }
                        else{
                        ?>
                         <a href="?type=status&operation=active&ct_id=<?php echo $data['cat_id'] ?>" role="button" class="btn btn-danger" >Deactive</a>
                         <?php
                        }
                        ?>
                      </td>
                      <td>
                        <a href="cat_edit.php?ct_id=<?php echo $data['cat_id'] ?>" role="button" class="btn btn-warning" >Edit</a>
                        <a href="cat_delete.php?ct_id=<?php echo $data['cat_id'] ?>" role="button" class="btn btn-danger" >Delete</a>
                      </td>
                       
                      </tr>
                      <?php
    }
  }
                      ?>
                      
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.php" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
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