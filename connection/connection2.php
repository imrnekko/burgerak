<?php

$host = "localhost";
$user = "u674073926_poro";
$password = "Itachi123";
$dbname = "u674073926_burgerak";

$con = mysqli_connect($host,$user,$password,$dbname);

if(!$con)
  echo "unable to connect to database!";
?>
