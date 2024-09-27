<?php 
include ('../admin/function.php');
$host = "localhost";
$user = "root";
$pass = "";
$db = "rentvehicle";

$con = new mysqli($host,$user,$pass,$db);

  if(!$con)
     {
         die('connection fail');
     }

     $customerCount = getCustomerCount($con);
     $vehicleCount = getVehicleCount($con);
     $driverCount = getDriverCount($con);
     $feedbackCount = getFeedbackCount($con);
     $bookingCount = getBookingCount($con);
     
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
<style>
    a:hover {
  color: red;
}

a:active {
  color: blue;
}
</style>
    <div class="admin-wrapper">
         <div class="sidebar">
            <h3>Admin Panel</h3>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="customer.php">Customer</a></li>
                <li><a href="driver.php">Driver</a></li>
                <li><a href="vehicle.php">Vehicle</a></li>
                <li><a href="feedback.php">Feedback</a></li>
                <li><a href="editaccount.php">Edit Account</a></li>
                <li><a href="logout.php">logout</a></li>
                
            </ul>
          </div>
         
          <!-- Main Content -->
          <div class="main-content">
             <header>
                <h2>Dashboard</h2>
                <p>Welcome to the admin panel</p>
             </header>
          

            <div class="content">
               <a href="customer.php"> Total Customers: <?php echo $customerCount; ?></a>
            </div>

            <div class="content">
            
            <a href="vehicle.php">   Total Vehicles: <?php echo $vehicleCount; ?></a>
            </div>

            <div class="content">
            <a href="driver.php">    Total  Drivers: <?php echo $driverCount; ?></a>
            </div>

            <div class="content">
            <a href="feedback.php">    Total Feedbacks: <?php echo $feedbackCount; ?></a>
            </div>

            <div class="content">
            <a href="booking.php">    Total Booking Vehicle Customer: <?php echo $bookingCount; ?></a>
            </div>

            </div>
        </div>
        
    </div>
</div>
</body>
</html>