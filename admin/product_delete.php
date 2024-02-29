
<?php
require_once 'config.php';

$id = $_GET['pd_id'];
$del_query = "DELETE FROM products WHERE p_id = '{$id}'";
$res_del = mysqli_query($con, $del_query);
if($res_del){
    echo "<script>window.location.href='http://localhost/jenny_web/admin/product_list.php'</script>";
}

?>

