<?php 
     
    session_start();
    include("connection/connection.php");
    date_default_timezone_set("Asia/Kuala_Lumpur");

    if (isset($_POST['order_id']))
    {
        $datetime = date('Y/m/d H:i');
        $orderid=$_POST['order_id'];

        $sqlCheck = "UPDATE orders set orderstatus_id = 3, complete_time = '".$datetime."' WHERE order_id = '".$_POST['order_id']."'";

    $qryCheck = mysqli_query($con,$sqlCheck);
    }
    echo"<script language = 'javascript'>
    alert('This order has been updated. Please wait for the customer to serve this order to them.');
    window.location='mail/emailtocust.php?orderid=$orderid';</script>";
?>