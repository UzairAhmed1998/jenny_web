<?php
 require_once 'config.php';
 $id=$_GET['ad_id'];
 $delete_query = "DELETE from admin WHERE a_id = '{$id}'";
 $res_query=mysqli_query($con,$delete_query);
 if($res_query){
    echo "<script>window.location.href='http://localhost/jenny_web/admin/dashboard.php'</script>";
 }


?>