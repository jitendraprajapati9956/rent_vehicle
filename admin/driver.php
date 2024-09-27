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
$feedbacksql="SELECT * FROM feedback";
$bookingsql="SELECT pickupdate, returndate, pickup_location, return_location FROM booking WHERE customer_username";


$customer = mysqli_query($con,$customersql);
$vehicle = mysqli_query($con,$vehiclesql);
$driver = mysqli_query($con,$driversql);
$booking = mysqli_query($con,$bookingsql);




if (isset($_POST['delete']) && isset($_POST['driver_username'])) {
        
    $driver_username = $_POST['driver_username'];

   $deletedriver = "DELETE FROM driver WHERE driver_username = '$driver_username'";
   $deleteResult = mysqli_query($con,$deletedriver);
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
                <h2>View Driver</h2>
              
            </header>
         
            <div class="content">
            <form action="" method="post" enctype="multipart/form-data">
             <table>
                <thead>
                  <tr style="background-color: black ; color:white;">
                      <th>Driver Id</th>
                       <th>Driver Username</th>
                        <th>Driver Image</th>
                       <th>Driver Firstname</th>
                        <th>Driver Lastname</th>
                        <th>Driver DOB</th>
                        <th>Driver Email</th>
                        <th>Driver Contact</th>
                         <th>Driver Gender</th>
                          <th>Driver LicenceNo</th>
                         <th>Driver Password</th>
                          <th><label> Double Click to Delete Driver</label></th>
      
                      </tr>

                   </thead>

                       <tbody>
                              <?php
                                  if (mysqli_num_rows($driver) > 0) {
                                  while($row= mysqli_fetch_assoc($driver)) {
                                    ?>
                                  <tr style="background-color: aqua;">
                                       <td><?php echo htmlspecialchars($row["driver_id"]); ?></td>
                                      <td><?php echo htmlspecialchars($row["driver_username"]); ?></td>
                                 <td><?php echo htmlspecialchars($row["driver_image"]); ?></td>
                                <td><?php echo htmlspecialchars($row["driver_firstname"]); ?></td>
                               <td><?php echo htmlspecialchars($row["driver_lastname"]); ?></td>
                              <td><?php echo htmlspecialchars($row["driver_dob"]); ?></td><br>
                                <td><?php echo htmlspecialchars($row["driver_email"]); ?></td>
                                 <td><?php echo htmlspecialchars($row["driver_contact"]); ?></td>
                              <td><?php echo htmlspecialchars($row["driver_gender"]); ?></td>
                                   <td><?php echo htmlspecialchars($row["driver_licenceno"]); ?></td>
                            <td><?php echo htmlspecialchars($row["driver_password"]); ?></td>
                              <td>
                                     <form action="#" method="post"> 
                                   <input type="hidden" name="driver_username" value="<?php echo htmlspecialchars($row['driver_username']); ?>">
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
                    </div>
                    </div>
     
                 </div>
          </div>
         </body>
</html>