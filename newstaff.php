<?php

session_start();

include("connection/connection.php");

    if(isset($_POST['hantar']))
    {
        
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phoneno = $_POST['phoneno'];
        $password =  uniqid();


        $sqlInsertStaff = "INSERT into admin(admin_username,admin_fullname,admin_email,admin_phoneno,admin_password,role_id)
                         values ('".$username."','".$fullname."','". $email."',
                         '".$phoneno."','".$password."',1)";

        $qryInsertStaff = mysqli_query($con,$sqlInsertStaff);

        echo"<script language = 'javascript'>
            alert('New staff have been added to the system.');
            window.location='stafflist.php';</script>";
    }else{

        echo"<script language = 'javascript'>
            alert('BABI!');
            window.location='addstaff.php';</script>";


    }

?>