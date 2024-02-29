<?php
function get_safe_value($connection,$argu){
    return mysqli_real_escape_string($connection,$argu);
}

?>