<?php
$con = mysqli_connect("localhost","root","","ebook");
if(!$con){
    echo "connection failed";
}
session_start();

?>