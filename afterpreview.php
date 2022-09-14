<?php session_start();

include("connection/connection.php");


  if(isset($_GET['orderid']))
  {

    $orderid = $_GET['orderid'];

    $sqlFilter = "SELECT * from orders where order_id = '".$_GET['orderid']."' ";
    $qryFilter = mysqli_query($con, $sqlFilter);

    $rowFilter = mysqli_num_rows($qryFilter);

    if($rowFilter > 0)
    { 
      $dataO=mysqli_fetch_assoc($qryFilter);

      $sqlUpdateOrder = "UPDATE orders set subtotal_price = '".$_POST['subtotalprice']."',total_price = '".$_POST['totalprice']."' where order_id = '".$_GET['orderid']."' ";
      $qryUpdateOrder = mysqli_query($con, $sqlUpdateOrder);

      $sqlUpdateCust = "UPDATE customer set cust_fullname = '".$_POST['fullname']."',cust_email = '".$_POST['email']."',cust_phoneno = '".$_POST['phoneno']."' where cust_username =  '".$_SESSION['username']."' ";
      $qryUpdateCust = mysqli_query($con, $sqlUpdateCust);

      echo"<script language = 'javascript'>
       window.location='delivery.php?orderid=$orderid';</script>";
    }
  }


?>
