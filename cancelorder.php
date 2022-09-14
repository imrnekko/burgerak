<?php 
session_start();
include("connection/connection.php");

    if(isset($_GET['orderid']))
    {

        $orderid = $_GET['orderid'];

        $sqlDelete2 = "DELETE from order_menu where order_id = '".$orderid."' ";
        $qryDelete2 = mysqli_query($con, $sqlDelete2);

        $sqlDelete1 = "DELETE from orders where order_id = '".$orderid."' ";
        $qryDelete1 = mysqli_query($con, $sqlDelete1);


        echo"<script language = 'javascript'>
        alert('Your order has been cancelled!');
        window.location='menu.php';</script>";
    }

?>