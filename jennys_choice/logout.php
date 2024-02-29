<?php
require_once 'config.php';

session_unset();
session_destroy();
echo "<script>window.location.href='http://localhost/jenny_web/jennys_choice/login.php'</script>";

?>