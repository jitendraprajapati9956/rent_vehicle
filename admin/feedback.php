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

$customersql = "SELECT * FROM customer";
$vehiclesql = "SELECT vehicle_name FROM vehicle";
$driversql="SELECT * FROM driver";
$bookingsql="SELECT pickupdate, returndate, pickup_location, return_location FROM booking WHERE customer_username";


$customer = mysqli_query($con,$customersql);
$vehicle = mysqli_query($con,$vehiclesql);
$driver = mysqli_query($con,$driversql);
$booking = mysqli_query($con,$bookingsql);



if (isset($_POST['delete']) && isset($_POST['customer_username'])) {
        
    $customer_username = $_POST['customer_username'];
  

   $deletecustomer = "DELETE FROM feedback WHERE customer_username = '$customer_username'";
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
                <h2>View Feedback</h2>
              
            </header>
         
            <div class="content">
                <h1>Customer Feedback</h1>
             <form action="" method="post" enctype="multipart/form-data">
             <table>
                <thead>
                  <tr style="background-color: black ; color:white;">
                       <th>Feedback  Username</th>
                        <th>Feedback Email</th>
                       <th>Feedback  Contact</th>
                        <th>Feedback Message</th>
                         <th><label> Double Click to Delete Feedback</label></th>
      
                      </tr>

                   </thead>

                       <tbody>
                              <?php
                         
                                  $feedbackcustomer="SELECT feedback_id, customer_username, customer_email, customer_contact, feedback_message FROM feedback ";
                                  $feedback = mysqli_query($con,$feedbackcustomer);

                                  
                                  if (mysqli_num_rows($feedback) > 0) {
                                  while($row= mysqli_fetch_assoc($feedback)) {
                                    ?>
                                  <tr style="background-color: aqua;">
                                       <td><?php echo htmlspecialchars($row["customer_username"]); ?></td>
                                       <td><?php echo htmlspecialchars($row["customer_email"]); ?></td>
                                     <td><?php echo htmlspecialchars($row["customer_contact"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["feedback_message"]); ?></td>
                                <td>
                                     <form action="#" method="post"> 
                                   <input type="hidden" name="customer_username" value="<?php echo htmlspecialchars($row['customer_username']); ?>">
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



             <div class="content">
                <h1>Driver Feedback</h1>
             <form action="" method="post" enctype="multipart/form-data">
             <table>
                <thead>
                  <tr style="background-color: black ; color:white;">
                        <th>Feedback  Username</th>
                        <th>Feedback Email</th>
                       <th>Feedback  Contact</th>
                        <th>Feedback Message</th>
                         <th><label> Double Click to Delete Feedback</label></th>
      
                      </tr>

                   </thead>

                       <tbody>
                              <?php

                             $feedbackdriver="SELECT feedback_id, driver_username, driver_email, driver_contact, feedback_driver FROM feedback";
                            $feedback_d = mysqli_query($con,$feedbackdriver);


                            if (isset($_POST['delete']) && isset($_POST['driver_username'])) {
        
                                $driver_username = $_POST['driver_username'];
                              
                            
                               $deletedriver = "DELETE FROM feedback WHERE driver_username = '$driver_username'";
                               $deleteResult = mysqli_query($con,$deletedriver);
                            }
                            

                                  if (mysqli_num_rows($feedback_d) > 0) {
                                  while($row_d= mysqli_fetch_assoc($feedback_d)) {
                                    ?>
                                  <tr style="background-color: aqua;">
                                      <td><?php echo htmlspecialchars($row_d["driver_username"]); ?></td>
                                       <td><?php echo htmlspecialchars($row_d["driver_email"]); ?></td>
                                     <td><?php echo htmlspecialchars($row_d["driver_contact"]); ?></td>
                                    <td><?php echo htmlspecialchars($row_d["feedback_driver"]); ?></td>
                                <td>
                                     <form action="#" method="post"> 
                                   <input type="hidden" name="driver_username" value="<?php echo htmlspecialchars($row_d['driver_username']); ?>">
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