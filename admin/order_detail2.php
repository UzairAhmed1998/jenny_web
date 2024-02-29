<?php
require_once 'config.php';
$id = $_GET['od_id'];
$select_order="SELECT * FROM order_detail INNER JOIN products ON order_detail.pro_id = products.p_id WHERE ordr_id='{$id}'";
$selorder_reg=mysqli_query($con, $select_order);
$total_rows=mysqli_num_rows($selorder_reg);
$sum_total="SELECT SUM(total) AS total_cost FROM order_detail WHERE ordr_id='{$id}'";
$sumtotal_reg=mysqli_query($con, $sum_total);
$total_rows2=mysqli_num_rows($sumtotal_reg);
$select_order2="SELECT * FROM orders WHERE order_id ='{$id}'";
  $selorder2_reg=mysqli_query($con, $select_order2);
  $total_rows3=mysqli_num_rows($selorder2_reg);
$select_status="SELECT * FROM orders INNER JOIN orders_status ON orders.order_status=orders_status.id WHERE order_id ='{$id}'";
$status_reg2=mysqli_query($con, $select_status);
$total_rows5=mysqli_num_rows($status_reg2);

$select_status="SELECT * FROM orders_status";
$status_reg=mysqli_query($con, $select_status);
$total_rows4=mysqli_num_rows($status_reg);
if(isset($_POST['update'])){
  $id = $_GET['od_id'];
  $status=$_POST['status'];
  $update_order="UPDATE orders SET order_status ='{$status}' WHERE order_id='{$id}'";
  $update_reg=mysqli_query($con, $update_order);
  if($update_reg){
    echo "<script>alert('Status updated successfully..!')</script>";
    echo "<script>window.location.href='http://localhost/jenny_web/admin/order_detail2.php?od_id=$id'</script>";
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
  <title>Jenny's Choice - Order Details</title>
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
            <h1 class="h3 mb-0 text-gray-800">Order Details</h1>
            <ol class="breadcrumb">
              <!-- <li class="breadcrumb-item"><a href="./">Home</a></li> -->
              <li class="breadcrumb-item">Orders</li>
              <li class="breadcrumb-item active" aria-current="page">Order Details</li>
            </ol>
          </div>
          <div class="row" >
            <div class="col-lg-12 mb-4" >
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <a href="order.php" role="button" class="btn btn-primary"> <h6 class="m-0 font-weight-bold text-light">Orders List</h6></a>
                </div>
                <div class="table-responsive">
                <!-- <h4 class="text-center">Order Details</h4> -->
                  <table class="table align-items-center table-flush" style="font-size:12px; font-weight:bold;">
                    <thead class="thead-light">
                      <tr>
                        
                        <th >Product ID</th>
                        <th> Product Image </th>
                        <th> Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th >Total Price</th>
                     
                     
                     
                       
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if($total_rows != 0){
                        while($data = mysqli_fetch_assoc($selorder_reg)){

                    
                      ?>
                      <tr>
                        
                        <td ><?php echo $data['pro_id'] ?></td>
                        <td><img src="media/<?php echo $data['p_img'] ?>" alt="" width="60px"></td>
                        <td><?php echo $data['p_name'] ?></td>
                        <td><?php echo $data['p_price'] ?></td>
                        <td><?php echo $data['quantity'] ?></td>
                        <td>PKR <?php echo $data['total'] ?></td>
                      
                      </tr>
                      <?php
    }
  }
                      ?>
                      
                    </tbody>
                  </table>
                  <div class="table-responsive">
                  <table class="table align-items-center table-flush" style="font-size:12px; font-weight:bold;">
                    <thead class="thead-light">
                      <tr>
                        
                        <th style="width:200px;" ></th>
                        <th style="width:200px;">  </th>
                        <th style="width:250px;"> </th>
                        <th style="width:300px;"></th>
                        <th style="width:300px;"></th>
                        <th style="width:200px; font-size:16px;" >TOTAL</th>
                     
                     
                     
                       
                      </tr>
                    </thead>
                    <tbody>
                     
                      <tr>
                        
                        <td style="width:200px;" ></td>
                        <td style="width:200px;"></td>
                        <td style="width:250px;"></td>
                        <td style="width:300px;"></td>
                        <td style="width:300px;"></td>
                        <?php if($total_rows2 != 0){
                          while($data=mysqli_fetch_assoc($sumtotal_reg)){

                       
                         ?>
                        <td style="width:200px; font-size:15px;">PKR <?php echo $data['total_cost'] ?></td>
                        <?php
                           }
                          }
                        ?>
                      
                      </tr>
   
                      
                    </tbody>
                  </table>
                </div>   
                <?php if($total_rows3 !=0){
                  while($data=mysqli_fetch_assoc($selorder2_reg)){

                  

                 
                ?>
                <div class="row">
                  <div class="col-8">Order ID</div>
                  <div class="col-4"><?php echo $data['order_id'] ?></div>
                </div>
                <div class="row">
                  <div class="col-8">Customer ID</div>
                  <div class="col-4"><?php echo $data['cu_id'] ?></div>
                </div>
                <div class="row">
                  <div class="col-8">Address</div>
                  <div class="col-4"><?php echo $data['address'] ?></div>
                </div>
                <div class="row">
                  <div class="col-8">City</div>
                  <div class="col-4"><?php echo $data['city'] ?></div>
                </div>
                <div class="row">
                  <div class="col-8">Pincode</div>
                  <div class="col-4"><?php echo $data['Pincode'] ?></div>
                </div>
                <div class="row">
                  <div class="col-8">Payment Type</div>
                  <div class="col-4"><?php echo $data['payment_type'] ?></div>
                </div>
                <div class="row">
                  <div class="col-8">Payment Status</div>
                  <div class="col-4"><?php echo $data['payment_status'] ?></div>
                </div>
                <div class="row">
                  <div class="col-8">Added On</div>
                  <div class="col-4"><?php echo $data['added_on'] ?></div>

                </div>
                <?php
                }
              }
                ?>
                 <?php 
                 if($total_rows5 !=0){
                  while($data=mysqli_fetch_assoc($status_reg2)){

                ?>
                <div class="row">
                  <div class="col-8">Order Status</div>
                  <div class="col-4"><?php echo $data['status'] ?></div>

                </div>
                <?php
                  }
                }
                ?>
              
<br>
          <div class="row text-center" >
            <div class="col-lg-3 text-center">
              <!-- Form Basic -->
              <div class="card mb-4">
                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <a href="product_list.php" role="button" class="btn btn-primary"><h6>View Products</h6></a>
                </div> -->
               
                    <form method="POST">
                    <div class="form-group">
                      <!-- <label>Order Status</label> -->
                      <select name='status'  class="form-control">
                      <?php 
                 if($total_rows4 !=0){
                  while($data=mysqli_fetch_assoc($status_reg)){

                ?>
                        <option value="<?php echo $data['id'] ?>"><?php echo $data['status'] ?></option>

                        <?php 
                  }
                }
                  ?>
                    </select>
                    </div>
                   
                    <div class="form-group">
                      <button type="submit" name="update" class="btn btn-primary btn-block">UPDATE</button>
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
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
          </div>
        </div>
      </footer>
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