<?php

session_start();

include("connection/connection.php");

    
    if(isset($_GET['menuid'])){
        $sqlDelMenu = "DELETE from menu where menu_id = '". $_GET['menuid']."'";

        $qryDelMenu = mysqli_query($con,$sqlDelMenu);
       

        echo"<script language = 'javascript'>
        alert('The selected menu have been deleted.');
        window.location='foodlist.php';</script>";
    }else{

        header("location:foodlist.php");
    }


?>