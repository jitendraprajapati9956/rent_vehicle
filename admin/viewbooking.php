<?php
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'rentvehicle';

$con = mysqli_connect($host, $user, $pass, $db);

if (!$con) {
    die('Connection failed: ' . mysqli_connect_error());
}

if (!isset($_SESSION['admin_username'])) {
    header('Location: login.php');
    exit();
}
$username = mysqli_real_escape_string($con,$_SESSION['admin_username']);


$vehiclesql = "SELECT vehicle_name FROM vehicle";
$driversql="SELECT * FROM driver";
$feedbacksql="SELECT * FROM feedback";
$bookingsql="SELECT * FROM booking";



$vehicle = mysqli_query($con,$vehiclesql);
$driver = mysqli_query($con,$driversql);
$booking = mysqli_query($con,$bookingsql);




if (isset($_POST['delete']) && isset($_POST['customer_username'])) {
        
    $customer_username = $_POST['customer_username'];

   $deletecustomer = "DELETE FROM booking WHERE customer_username = '$customer_username'";
   $deleteResult = mysqli_query($con,$deletecustomer);
}


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
                <li><a href="booking.php">Booking Customer</a></li>
                <li><a href="viewpayment.php">View Payment</a></li>
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
                <h2>Booking Vehicle Customer</h2>
              
            </header>
         
            <div class="content">
                     <form action="" method="post" enctype="multipart/form-data">
                     <table>
                      <thead>
                  <tr style="background-color: black ; color:white;">
                      <th>Booking Id</th>
                          <th>Customer Pickup Date</th>
                         <th>Customer Return Date</th>
                         <th>Customer Pickup Location</th>
                         <th>Customer Return Location</th>
                      
                          <th><label> Double Click to Delete Customer</label></th>
      
                      </tr>

                   </thead>

                       <tbody>
                              <?php
                                  if (mysqli_num_rows($booking) > 0) {
                                  while($rowbook= mysqli_fetch_assoc($booking)) {
                                    ?>
                                  <tr style="background-color: aqua;">
                                  <td><?php echo htmlspecialchars($rowbook["booking_id"]); ?></td>
                             
                                   <td><?php echo htmlspecialchars($rowbook["pickupdate"]); ?></td>
                               <td><?php echo htmlspecialchars($rowbook["returndate"]); ?></td>
                               <td><?php echo htmlspecialchars($rowbook["pickup_location"]); ?></td>
                               <td><?php echo htmlspecialchars($rowbook["return_location"]); ?></td>
                          
                              <td>
                                     <form action="#" method="post"> 
                                   <input type="hidden" name="customer_username" value="<?php echo htmlspecialchars($rowbook['customer_username']); ?>">
                                  <input type="submit" name="delete" value="Delete"><label style="color:whitesmoke;">
                             <style>
                              input[type="submit"]
                            {
                            background-color: green;
                              color: white;
                             padding: 10px 70px;
	                          margin: 8px 8px;
                            cursor: pointer;
                             }
                            input:hover[type="submit"] 
		                     {
			                    background: red;
		                     }
		
                	            </style>
                             </form>
                                 </td>
                              </tr>
                              <?php } } ?>  
                       </tbody>
             </table>
                    </div>
                    </div>
     
                 </div>
          </div>
         </body>
</html>