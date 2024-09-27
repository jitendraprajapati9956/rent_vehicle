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
$vehiclesql = "SELECT * FROM vehicle";
$driversql="SELECT * FROM driver";
$feedbacksql="SELECT * FROM feedback";
$bookingsql="SELECT pickupdate, returndate, pickup_location, return_location FROM booking WHERE customer_username";


$customer = mysqli_query($con,$customersql);
$vehicle = mysqli_query($con,$vehiclesql);
$driver = mysqli_query($con,$driversql);
$booking = mysqli_query($con,$bookingsql);




if (isset($_POST['delete']) && isset($_POST['vehicle_name'])) {
        
    $vehicle_name = $_POST['vehicle_name'];
   

   $deletevehicle = "DELETE FROM vehicle WHERE vehicle_name = '$vehicle_name'";
   $deleteResult = mysqli_query($con,$deletevehicle);
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
    input[type=text], input[type=password] {
   width: 18%;
   padding: 12px 20px;
   margin: 8px 0;
   display: inline-block;
   border: 1px solid #bcbac9;
   box-sizing: border-box;
 }

 input[type=email], input[type=tel] {
   width: 18%;
   padding: 12px 20px;
   margin: 8px 0;
   display: inline-block;
   border: 1px solid #bcbac9;
   box-sizing: border-box;
 }
 input[type=number], input[type=date] {
   width: 18%;
   padding: 12px 20px;
   margin: 8px 0;
   display: inline-block;
   border: 1px solid #bcbac9;
   box-sizing: border-box;
 }
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
                <li><a href="vehicle_insert.php">InsertVehicle</a></li>
                <li><a href="vehicle_update.php">UpdateVehicle</a></li>
                <li><a href="feedback.php">Feedback</a></li>
                <li><a href="editaccount.php">Edit Account</a></li>
                <li><a href="logout.php">logout</a></li>
                
            </ul>
        </div>
         
        <!-- Main Content -->
        <div class="main-content">
            <header>
                <h2>View Vehicle</h2>
              
            </header>
         
            <div class="content">
            <form action="" method="post" enctype="multipart/form-data">
             <table>
                <thead>
                  <tr style="background-color: black ; color:white;">
                      <th>Vehicle Id</th>
                      <th>Vehicle Number</th>
                      <th>Vehicle Type</th>
                       <th>Vehicle Name</th>
                        <th>Vehicle Image</th>
                       <th>Vehicle Detail</th>
                        <th><label> Double Click to Delete Vehicle</label></th>
      
                        </tr>
 
                   </thead>

                       <tbody>
                              <?php
                                  if (mysqli_num_rows($vehicle) > 0) {
                                  while($row= mysqli_fetch_assoc($vehicle)) {
                                    ?>
                                  <tr style="background-color: aqua;">
                                       <td><?php echo htmlspecialchars($row["vehicle_id"]); ?></td>
                                       <td><?php echo htmlspecialchars($row["vehicle_number"]); ?></td>
                                       <td><?php echo htmlspecialchars($row["vehicle_type"]); ?></td>
                                      <td><?php echo htmlspecialchars($row["vehicle_name"]); ?></td>
                                 <td><?php echo htmlspecialchars($row["vehicle_image"]); ?></td>
                                <td><?php echo htmlspecialchars($row["vehicle_detail"]); ?></td>
                              
                                <td>
                                     <form action="#" method="post"> 
                                   <input type="hidden" name="vehicle_name" value="<?php echo htmlspecialchars($row['vehicle_name']); ?>">
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