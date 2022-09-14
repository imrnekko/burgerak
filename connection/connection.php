<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "burgerak";

$con = mysqli_connect($host,$user,$password,$dbname);

if(!$con)
  echo "unable to connect to database!";
?>
