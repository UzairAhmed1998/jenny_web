<?php
$con = mysqli_connect("localhost","root","","jennyshop");
if(!$con){
    echo "connection failed";
}
session_start();

?>