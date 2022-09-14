<?php
session_start();

  if(isset($_POST['submit']))
  {
    include("connection/connection.php");

    $fullname  = $_POST['fullname'];
    $username  = $_POST['uname'];
    $password  = $_POST['psw'];
    $email  = $_POST['email'];
    $phoneno  = $_POST['phoneno'];


    $_SESSION['username'] = $username;
    $_SESSION['email']=$email;
    $_SESSION['phoneno']=$phoneno;

    if($_SESSION['userlogged']==1 && $_SESSION['role_id']==2)
    {
        $sqlUpCust = "UPDATE customer set cust_fullname = '".$fullname."',cust_username = '".$username."',cust_password = '".$password."',
                      cust_email = '".$email."',cust_phoneno = '".$phoneno."' where cust_id = '".$_SESSION['user_id']."' ";

        $qryUpCust = mysqli_query($con,$sqlUpCust);

        
      echo"<script language = 'javascript'>
      alert('User Profile update success!');
      window.location='myprofile.php';</script>";
    }else if($_SESSION['userlogged']==1 && $_SESSION['role_id']==1)
    {
      $sqlUpAdmin = "UPDATE admin set admin_fullname = '".$fullname."',admin_username = '".$username."',admin_password = '".$password."',
      admin_email = '".$email."',admin_phoneno = '".$phoneno."' where admin_id = '".$_SESSION['user_id']."' ";

      $qryUpAdmin = mysqli_query($con,$sqlUpAdmin);

      
      echo"<script language = 'javascript'>
      alert('User Profile update success!');
      window.location='adminprofile.php';</script>";

    }



 



  }



?>
