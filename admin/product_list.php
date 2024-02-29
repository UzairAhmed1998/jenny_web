<?php
require_once 'config.php';
require_once 'function.php';
$book_query = "SELECT * FROM products INNER JOIN category ON products.ca_id = category.cat_id";
$res_select= mysqli_query($con, $book_query);
$total_rows = mysqli_num_rows($res_select);
if(isset($_GET['pd_id']) && $_GET['pd_id'] != '' ){
  $id = get_safe_value($con, $_GET['pd_id']);
  $type = get_safe_value($con, $_GET['type']);
  $operation = get_safe_value($con,$_GET['operation']);
  if($type =='status'){
    if($operation == 'active'){
      $status = 1 ;
    }
    else{
      $status = 0;
    }
    $update_status="UPDATE products SET p_status = '{$status}' WHERE p_id = '{$id}' ";
    $reg_update = mysqli_query($con,$update_status);
    if($reg_update){
      echo "<script>window.location.href='http://localhost/jenny_web/admin/product_list.php'</script>";
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
  <title>Jenny's Choice -Products List</title>
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
            <h1 class="h3 mb-0 text-gray-800">Products List</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Menu</li>
              <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <a href="addproduct.php" role="button" class="btn btn-primary"> <h6 class="m-0 font-weight-bold text-light">ADD Product</h6></a>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush" style="font-size:14px; font-weight:bold;">
                    <thead class="thead-light">
                      <tr>
                        <th style="width:60px;">Product ID</th>
                        <th style="width:100px;">Product Name</th>
                        <th style="width:70px;"> Price </th>
                        <th style="width:70px;"> M.R.P</th>
                        <th>Product Image</th>
                        <th style="width:70px;">Category</th>
                     
                        <th style="width:70px;">Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if($total_rows != 0){
                        while($data = mysqli_fetch_assoc($res_select)){

                    
                      ?>
                      <tr>
                        <td><?php echo $data['p_id'] ?></td>
                        <td><?php echo $data['p_name'] ?></td>
                        <td><?php echo $data['p_price'] ?></td>
                        <td><?php echo $data['p_mrp'] ?></td>
                        <td><img src="media/<?php echo $data['p_img'] ?>" alt="" width="80px"></td>
                        <td><?php echo $data['cat_name'] ?></td>
                        <td>
                        <?php
                        if($data['p_status'] == '1' ){

                        
                        ?>
                        <a href="?type=status&operation=deactive&pd_id=<?php echo $data['p_id'] ?>" role="button" class="btn btn-success" >Active</a>
                        <?php
                        }
                        else{
                        ?>
                         <a href="?type=status&operation=active&pd_id=<?php echo $data['p_id'] ?>" role="button" class="btn btn-danger" >Deactive</a>
                         <?php
                        }
                        ?>
                      </td>
                      <td>
                        <a href="product_edit.php?pd_id=<?php echo $data['p_id'] ?>" role="button" class="btn btn-warning" >Edit</a>
                        <a href="product_delete.php?pd_id=<?php echo $data['p_id'] ?>" role="button" class="btn btn-danger" >Delete</a>
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
      <?php require_once 'logoutmodal.php'; ?>
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