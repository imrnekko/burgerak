<?php 
     
    session_start();
    include("connection/connection.php");
    

    if (isset($_POST['submit']))
    {
        $sqlCheck1 = "UPDATE hotitem set menu_id = '".$_POST['hotmenu1']."' where 
                        hotitem_id = 1 ";

        $qryCheck1 = mysqli_query($con,$sqlCheck1);

        $sqlCheck2 = "UPDATE hotitem set menu_id = '".$_POST['hotmenu2']."' where 
                        hotitem_id = 2 ";

        $qryCheck2 = mysqli_query($con,$sqlCheck2);

        $sqlCheck3 = "UPDATE hotitem set menu_id = '".$_POST['hotmenu3']."' where 
                        hotitem_id = 3 ";

        $qryCheck3 = mysqli_query($con,$sqlCheck3);

        $sqlCheck4 = "UPDATE hotitem set menu_id = '".$_POST['hotmenu4']."' where 
                        hotitem_id = 4 ";

        $qryCheck4 = mysqli_query($con,$sqlCheck4);

        echo"<script language = 'javascript'>
        alert('This hot selling item list have been updated.');
        window.location='hotitem.php';</script>";
    }

?>