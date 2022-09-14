<?php
session_start();
include("../connection/connection.php");

    if(isset($_GET['orderid']))
    {
        $orderid=$_GET['orderid'];
        date_default_timezone_set('Asia/Kuala_Lumpur');


        $currentdate = date('y/m/d H:i');
        $sqlConfirmOrder = "UPDATE orders set orderstatus_id = 2, order_time = '".$currentdate."'
                                         where order_id =  '".$_GET['orderid']."'  ";
        $qryConfirmOrder = mysqli_query($con,$sqlConfirmOrder);

        echo"<script language = 'javascript'>
        alert('The order has been confirmed.');
        window.location='success.php?orderid=$orderid';</script>";
        
    }
    
?>