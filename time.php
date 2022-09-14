<?php

date_default_timezone_set('Asia/Kuala_Lumpur');

$currentTime = date('Hi',time());                 
echo $currentTime;    

if (((int) date('Hi', time())) >= 1130) {
   // .. do something
   echo $currentTime;
   echo ((int) date('Hi', time()));
 }

?>   