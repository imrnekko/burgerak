<?php

session_start();

include("connection/connection.php");

    if(isset($_POST['hantar']))
    {
        $category = str_replace(' ', '', $_POST['category']);
        $sqlCheckMenu = "SELECT menu_id FROM menu where menu_type = '". $category."'";

        $qryCheckMenu = mysqli_query($con,$sqlCheckMenu);
        $countMenu = mysqli_num_rows($qryCheckMenu);

        if($countMenu > 0){

            $found = -1;
            $counter = 1;

            while($rMenu = mysqli_fetch_assoc($qryCheckMenu))
            {
                $sub = substr($rMenu['menu_id'],2);

                if($sub == $counter)
                {

                 
                    
                }else{
                    $found = $counter;
                    break;

                }
                $counter++;
                
            } 

            if($found == -1){
                $found =$countMenu+1;
            }
            
        }

        $idCount = $countMenu + 1;
        $menuid = $category . $found;

        $dir = 'assets/img/menu/';

        $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name= addslashes($_FILES['image']['name']);
        $target_file = $dir . basename($image_name);
        $image_size= getimagesize($_FILES['image']['tmp_name']);
    
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        $location= $dir . $_FILES['image']['name'];

        $sqlInsertMenu = "INSERT into menu(menu_id,menu_name,menu_type,menu_price,menu_img,menu_desc)
                         values ('".$menuid."','".$_POST['menuname']."','". $category."',
                         '".$_POST['price']."','".$location."','". $_POST['descr']."')";

        $qryInsertMenu = mysqli_query($con,$sqlInsertMenu);

        echo"<script language = 'javascript'>
            alert('Your menu have been added to the system.');
            window.location='foodlist.php';</script>";
    }else{

        echo"<script language = 'javascript'>
            alert('BABI!');
            window.location='foodlist.php';</script>";


    }

?>