<?php
session_start();
include("connection/connection.php");

    if(isset($_GET['orderidP']))
    {
        $orderid=$_GET['orderidP'];
        date_default_timezone_set('Asia/Kuala_Lumpur');

        //static usd currency rate
        $usdprice = $_POST['totalprice'] * 0.23824;

        $pickupdate = $_POST['estpickupdate'];
        $pickuptime = $_POST['estpickuptime'];
        $pickupdatetime = date('Y-m-d H:i:s', strtotime("$pickupdate $pickuptime"));
        $currentdate = date('y/m/d H:i');
        $sqlConfirmOrder = "UPDATE orders set shipment_id = 1, estimated_pickuptime = '".$pickupdatetime."' ,order_message = '".$_POST['addmessage']."',total_price_usd = '".$usdprice."'
                                         where order_id =  '".$_GET['orderidP']."'  ";
        $qryConfirmOrder = mysqli_query($con,$sqlConfirmOrder);

        echo"<script language = 'javascript'>
        alert('Proceed to the payment transaction.');
        window.location='paypal/payment.php?orderid=$orderid';</script>";
        

    }
    if(isset($_GET['orderidD']))
    {
        $orderid=$_GET['orderidD'];
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $currentdate = date('y/m/d H:i');

        //static usd currency rate
        $usdprice = $_POST['totalprice'] * 0.23824;

        $sqlConfirmOrder = "UPDATE orders set shipment_id = 2,
                            address1 = '".$_POST['deliveraddress1']."',address2 = '".$_POST['deliveraddress2']."',address3 = '".$_POST['deliveraddress3']."',
                            city =  '".$_POST['city']."', postcode = '".$_POST['postcode']."', state = '".$_POST['state']."',order_message = '".$_POST['addmessage']."', total_price = '".$_POST['totalprice']."',total_price_usd = '".$usdprice."' where order_id =  '".$_GET['orderidD']."' ";
        $qryConfirmOrder = mysqli_query($con,$sqlConfirmOrder);



        echo"<script language = 'javascript'>
        alert('Proceed to the payment transaction.');
        window.location='paypal/payment.php?orderid=$orderid';</script>";
    }
    
?>