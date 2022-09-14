<?php

session_start();

include("connection/connection.php");

    
    if(isset($_GET['adminid'])){
        $sqlDelAdmin = "DELETE from admin where admin_id = '". $_GET['adminid']."'";

        $qryDelAdmin = mysqli_query($con, $sqlDelAdmin);
       

        echo"<script language = 'javascript'>
        alert('The selected staff have been deleted.');
        window.location='stafflist.php';</script>";
    }else{

        header("location:stafflist.php");
    }


?>