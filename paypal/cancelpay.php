<?php
session_start();
include("../connection/connection.php");

if(isset($_GET['orderid']))
{

        $orderid=$_GET['orderid'];
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $currentdate = date('y/m/d H:i');

        $sqlCancelOrder = "UPDATE orders set orderstatus_id = 6 where order_id =  '".$_GET['orderid']."' ";
        $qryCancelOrder = mysqli_query($con,$sqlCancelOrder);



        echo"<script language = 'javascript'>
        alert('Your payment order was failed.');
        window.location='failed.php?orderid=$orderid';</script>";
}
    
?>