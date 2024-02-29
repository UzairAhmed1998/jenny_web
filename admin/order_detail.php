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
  <div class="row" >
            <div class="col-lg-12 mb-4" >
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <a href="order.php" role="button" class="btn btn-primary"> <h6 class="m-0 font-weight-bold text-light">Orders List</h6></a>
                </div>
                <div class="table-responsive">
                <h4 class="text-center">Order Details</h4>
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
                        <td><?php echo $data['total'] ?></td>
                      
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
                        <td style="width:200px; font-size:15px;"><?php echo $data['total_cost'] ?></td>
                        <?php
                           }
                          }
                        ?>
                      
                      </tr>
   
                      
                    </tbody>
                  </table>
                </div>   
    <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-8 col-md-8">
        <div class="card shadow-sm ">
          <div class="card-body p-0">
            <div class="row">
             
         <div class="col-lg-12 text-center ">
              
                <div class="login-form">
               
                  <!-- <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">EDIT Product</h1>
                  </div> -->
                 
                 <?php
                 if($total_rows3 != 0){
                  while($data=mysqli_fetch_assoc($selorder2_reg)){

                 
                 ?>
                    <div class="form-group">
                      <label> Order ID </label>
                      <h5><?php echo $data['order_id'] ?></h5>
                    </div>
                    <div class="form-group">
                      <label> Customer ID</label>
                      <input type="text"  name="p_name" class="form-control" id="exampleInputLastName" value="">
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" name="p_price"  class="form-control" id="exampleInputEmail" value="" aria-describedby="emailHelp"
                        >
                    </div>
                    <div class="form-group">
                      <label>City</label>
                      <input type="text" name="p_mrp" class="form-control" id="exampleInputPassword" value="" >
                    </div>
                   
                    <div class="form-group">
                      <label>Pincode</label>
                      <input type="file" class="form-control" name="profile">
                    </div>
                    <div class="form-group">
                      <label>Payment Type</label>
                      <input type="file" class="form-control" name="profile">
                    </div>
                    <div class="form-group">
                      <label>Payment Status</label>
                      <input type="file" class="form-control" name="profile">
                    </div>
                    <div class="form-group">
                      <label>Added On</label>
                      <input type="file" class="form-control" name="profile">
                    </div>
                    <?php
                    }
                  }
                    ?>
                    <form method="POST">
                    <div class="form-group">
                      <label>Order Status</label>
                      <select name='status'  class="form-control">
                        
                        <option value=""></option>

                       
                    </select>
                    </div>
                   
                    <div class="form-group">
                      <button type="submit" name="update" class="btn btn-primary btn-block">UPDATE</button>
                    </div>
                    <hr>
                   
                  </form>
                 
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