<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db = "rentvehicle";

$con = new mysqli($host,$user,$pass,$db);

  if(!$con)
     {
         die('connection fail');
     }

     
?>