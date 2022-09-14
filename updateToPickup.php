<?php 
     
    session_start();
    include("connection/connection.php");
    date_default_timezone_set("Asia/Kuala_Lumpur");
    if (isset($_POST['order_id']))
    {
        $datetime = date('Y/m/d H:i');
        $sqlCheck = "UPDATE orders set orderstatus_id = 5,receive_time = '".$datetime."' WHERE order_id = '".$_POST['order_id']."'";

    $qryCheck = mysqli_query($con,$sqlCheck);
    }
    echo"<script language = 'javascript'>
    alert('This order has been received and payed by the customer.');
    window.location='toPickupTable.php';</script>";
?>