<?php
include("connection/connection.php");

if(isset($_POST['uname']))
{
    $username = mysqli_real_escape_string($con,$_POST["uname"]);
    $password = mysqli_real_escape_string($con,$_POST["psw"]);
    $sql = "SELECT * FROM customer WHERE cust_username ='".$username."' and cust_password ='".$password."' ";
    $qry = mysqli_query($con,$sql);
    $row =mysqli_num_rows($qry);


    if($row>0)
    {
      session_start();
      $data = mysqli_fetch_assoc($qry);
      $_SESSION['userlogged']=1;
      $_SESSION['role_id']=2;//role as customer
      //$_SESSION['roleid']=$data['roleid']=4;
      $_SESSION['username']=$data['cust_username'];
      $_SESSION['user_id']=$data['cust_id'];
      $_SESSION['email']=$data['cust_email'];
      $_SESSION['phoneno']=$data['cust_phoneno'];
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $date = date('Y/m/d H:i:s');

      

      header("Location: menu.php");



    }
    else {
  {

      echo "<script language = 'javascript'>
      alert ('Mismatched User ID or Password. Please try again.');
      window.location='login-user.html';
      </script>";
  }

  }
}

?>