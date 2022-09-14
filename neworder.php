<?php 

session_start();

include("connection/connection.php");
date_default_timezone_set("Asia/Kuala_Lumpur");



    if(isset($_POST['submit']) && isset($_POST['menuid']) ){ //check if form was submitted

    
        $custid = $_SESSION['user_id'];
        $orderstatus = 1;
        $datetime = date('Y/m/d H:i');
        $orderid = $custid+date('mdyHis')+(rand(99,999));;

        $sqlCheckOrder = "SELECT order_id FROM order where order_id = ' ".$orderid."'";

        $qryCheckOrder = mysqli_query($con,$sqlCheckOrder);
      
          
          $sqlInsertOrder = "INSERT INTO orders(order_id,cust_id,order_time,orderstatus_id) VALUES('".$orderid."','".$custid."','".$datetime."','".$orderstatus."')";
          $qryInsertOrder = mysqli_query($con,$sqlInsertOrder);

          $menuarray=(array_values($_POST['menuid']));
          $qtyarray=(array_values($_POST['qty']));
          $descarray=(array_values($_POST['desc']));

          

            
                foreach($_POST['menuid'] as $key => $menuid)
                {
                    $shiftmenu=array_shift($menuarray);
                    $shiftqty=array_shift($qtyarray);
                    $shiftdesc=array_shift($descarray);

                    $sqlInsertOrderMenu = "INSERT INTO order_menu (order_id,menu_id,quantity,descr) VALUES
                    ('".$orderid."','".$menuid."','".$shiftqty."','".$shiftdesc."')";

                    $qryInsertOrderMenu = mysqli_query($con,$sqlInsertOrderMenu) or die ("Error: ". mysqli_error ($con));

                
                }
            

                echo"<script language = 'javascript'>
                alert('Please confirm the order details!');
                window.location='previeworder.php?orderid=$orderid';</script>";

       

    }
    else{
        echo"<script language = 'javascript'>
        alert('Please choose atleast one item');
        window.location='menu.php';</script>";

    }
    
?>