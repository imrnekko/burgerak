<?php
session_start();

include("connection/connection.php");



if($_SESSION['role_id']==1){
    session_destroy();
    header("Location: login-admin.html");
}
else if($_SESSION['role_id']==2){
    session_destroy();
    header("Location: login-user.html");
}



 ?>
