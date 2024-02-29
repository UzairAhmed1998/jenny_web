<?php
require_once 'config.php';
require_once 'function.php';
$order_query = "SELECT * FROM orders INNER JOIN orders_status ON orders.order_status = orders_status.id";
$res_select= mysqli_query($con, $order_query);
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
  <title>Jenny's Choice -Order List</title>
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
            <h1 class="h3 mb-0 text-gray-800">Order List</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Menu</li>
              <li class="breadcrumb-item active" aria-current="page">Orders</li>
            </ol>
          </div>

          <div class="row" >
            <div class="col-lg-12 mb-4" >
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <!-- <a href="addproduct.php" role="button" class="btn btn-primary"> <h6 class="m-0 font-weight-bold text-light">ADD Product</h6></a> -->
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush" style="font-size:12px; font-weight:bold;">
                    <thead class="thead-light">
                      <tr>
                        <th>Order ID</th>
                        <th>Customer ID</th>
                        <th> Address </th>
                        <th> City</th>
                        <th>Pincode</th>
                        <th >Payment Type</th>
                     
                     <th >Payment Status</th>
                     <th >Order Status</th>
                     <th >Added On</th>
                     <th >Total Amount</th>
                     <th>Actions</th>
                     
                       
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if($total_rows != 0){
                        while($data = mysqli_fetch_assoc($res_select)){

                    
                      ?>
                      <tr>
                        <td style="width:20px;" ><?php echo $data['order_id'] ?></td>
                        <td style="width:20px;"><?php echo $data['cu_id'] ?></td>
                        <td><?php echo $data['address'] ?></td>
                        <td><?php echo $data['city'] ?></td>
                        <td><?php echo $data['Pincode'] ?></td>
                        <td><?php echo $data['payment_type'] ?></td>
                        <td><?php echo $data['payment_status'] ?></td>
                        <?php if($data['order_status']=='1'){

                        ?>

                        <td><span class="badge badge-info" style="font-size:12px;">Processing</span></td>
                       <?php 
                       } 
                       ?>
                        <?php if($data['order_status']=='2'){

?>

<td><span class="badge badge-primary" style="font-size:12px;">Pending</span></td>
<?php 
} 
?>
 <?php if($data['order_status']=='3'){

?>

<td><span class="badge badge-success" style="font-size:12px;">Complete</span></td>
<?php 
} 
?>
 <?php if($data['order_status']=='4'){

?>

<td><span class="badge badge-warning" style="font-size:12px;">Shipped</span></td>
<?php 
} 
?>
 <?php if($data['order_status']=='5'){

?>

<td><span class="badge badge-danger" style="font-size:12px;">Cancel</span></td>
<?php 
} 
?>
                       
                        <td><?php echo $data['added_on'] ?></td>
                        <td>PKR <?php echo $data['pro_total'] ?></td>
                        <td>
                        <a href="order_detail2.php?od_id=<?php echo $data['order_id'] ?>" role="button" style="width: 60px; font-size:12px;" class="btn btn-warning" >Detail</a>
                        <br>
                        <a href="order_delete.php?od_id=<?php echo $data['order_id'] ?>" role="button" style="width: 65px; font-size:12px;" class="btn btn-danger" >Delete</a>
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
     <?php require_once 'footer.php' ?>
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