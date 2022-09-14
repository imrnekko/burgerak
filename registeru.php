<?php
session_start();

  if(isset($_POST['uname']))
  {
    include("connection/connection.php");

    $fullname  = $_POST['fullname'];
    $username  = $_POST['uname'];
    $password  = $_POST['psw'];
    $email  = $_POST['email'];
    $phoneno  = $_POST['phoneno'];

    $sqlCheck = "SELECT cust_username,cust_email FROM customer where cust_username = ' ".$username."' and cust_email = ' ".$email."'";

    $qryCheck = mysqli_query($con,$sqlCheck);
    $rowCheck = mysqli_num_rows($qryCheck);

    if ($rowCheck == 0)
    {
      $sqlInsertApp = "INSERT INTO customer (cust_fullname,cust_username,cust_password,cust_phoneno,cust_email,role_id) VALUES ('".$fullname."','".$username."','".$password."','".$phoneno."','".$email."',2)";

      $qryInsertApp = mysqli_query($con,$sqlInsertApp);

     


      echo"<script language = 'javascript'>
      alert('User registration success! Back to login page.');
      window.location='login-user.html';</script>";
    }
    else
    {
      echo"<script language = 'javascript'>
      alert('Username already registered!');
      window.location='signup-user.html';</script>";

    }



  }



?>
