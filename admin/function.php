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
    

     function getCustomerCount($con) {
         $sql = "SELECT COUNT(*) AS count FROM customer";
         $result = mysqli_query($con, $sql);
         if ($row = mysqli_fetch_assoc($result)) {
             return $row['count'];
         }
         return 0;
     }
     
     function getVehicleCount($con) {
         $sql = "SELECT COUNT(*) AS count FROM vehicle";
         $result = mysqli_query($con, $sql);
         if ($row = mysqli_fetch_assoc($result)) {
             return $row['count'];
         }
         return 0;
     }
     
     function getDriverCount($con) {
         $sql = "SELECT COUNT(*) AS count FROM driver";
         $result = mysqli_query($con, $sql);
         if ($row = mysqli_fetch_assoc($result)) {
             return $row['count'];
         }
         return 0;
     }
     
     function getFeedbackCount($conn) {
         $sql = "SELECT COUNT(*) AS count FROM feedback";
         $result = mysqli_query($conn, $sql);
         if ($row = mysqli_fetch_assoc($result)) {
             return $row['count'];
         }
         return 0;
     }

     function getBookingCount($con) {
        $sql = "SELECT COUNT(*) AS count FROM booking";
        $result = mysqli_query($con, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
            return $row['count'];
        }
        return 0;
    }
     ?>
     
    