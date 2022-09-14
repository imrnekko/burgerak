<?php
include("connection/connection.php");

if(isset($_POST['uname']))
{
    $username = mysqli_real_escape_string($con,$_POST["uname"]);
    $password = mysqli_real_escape_string($con,$_POST["psw"]);
    $sql = "SELECT * FROM admin WHERE admin_username ='".$username."' and admin_password ='".$password."' ";
    $qry = mysqli_query($con,$sql);
    $row =mysqli_num_rows($qry);


    if($row>0)
    {
      session_start();
      $data = mysqli_fetch_assoc($qry);
      $_SESSION['userlogged']=1;
      $_SESSION['role_id']=1;//role as admin

      //$_SESSION['roleid']=$data['roleid']=4;
      $_SESSION['username']=$data['admin_username'];
      $_SESSION['user_id']=$data['admin_id'];

      date_default_timezone_set("Asia/Kuala_Lumpur");
      $date = date('Y/m/d H:i:s');

      

      header("Location: admindashboard.php");



    }
    else {
  {

      echo "<script language = 'javascript'>
      alert ('Mismatched User ID or Password. Please try again.');
      window.location='login-admin.html';
      </script>";
  }

  }
}

?>