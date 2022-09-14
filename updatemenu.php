<?php

session_start();

include("connection/connection.php");

    if(isset($_POST['update']))
    {

        $dir = 'assets/img/menu/';

        $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name= addslashes($_FILES['image']['name']);
        $target_file = $dir . basename($image_name);
        $image_size= getimagesize($_FILES['image']['tmp_name']);
    
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        $location= $dir . $_FILES['image']['name'];
       
        $sqlUpdateMenu = "UPDATE menu set menu_name = '". $_POST['menuname']."',menu_type = '".$_POST['category']."',
                            menu_price = '". $_POST['price']."',menu_img = '".$location."',menu_desc = '". $_POST['descr']."' where menu_id = '". $_POST['menuid']."'";

        $qryUpdateMenu = mysqli_query($con,$sqlUpdateMenu);
       

        echo"<script language = 'javascript'>
        alert('Your menu have been updated to the system.');
        window.location='foodlist.php';</script>";
    }else{

        echo"<script language = 'javascript'>
            alert('BABI!');
            window.location='foodlist.php';</script>";


    }

?>