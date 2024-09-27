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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $v_id = mysqli_real_escape_string($con,$_POST['id']);
    $v_number = intval($_POST['number']);
    $v_type = mysqli_real_escape_string($con,$_POST['type']);
    $v_name = mysqli_real_escape_string($con,$_POST['name']);
    $v_detail = mysqli_real_escape_string($con,$_POST['detail']);
   
    
   $checkQuery = "SELECT * FROM vehicle WHERE vehicle_name = '$v_name' AND vehicle_number='$v_number'";
    $result = mysqli_query($con, $checkQuery);
 
    $target_dir = "admin/image/vehicle/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
      if (mysqli_num_rows($result) > 0) {
        $updateQuery = "UPDATE vehicle SET  vehicle_name = '$v_name',vehicle_type='$v_type',vehicle_image='$target_file', vehicle_detail='$v_detail' WHERE vehicle_number='$v_number'";
        if (mysqli_query($con, $updateQuery)) {
            echo "<script>alert('Vehicle updated successfully.')</script>";
            echo "<script>window.open('vehicle.php','_self')</script>";
            
        } 
    } else {
        $insertQuery = "INSERT INTO vehicle (vehicle_number, vehicle_type, vehicle_name, vehicle_image, vehicle_detail) VALUES ('$v_number', '$v_type','$v_name', '$target_file', '$v_detail')";
        if (mysqli_query($con, $insertQuery)) {
            echo "<script>alert('Vehicle added successfully.')</script>";
            echo "<script>window.open('vehicle.php','_self')</script>";

        } else {
            echo "<script>alert('Error adding subject: " . mysqli_error($con) . "')</script>";
        }
    }
}

mysqli_close($con);
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
            <h2>Insert Vehicle</h2>
               
            </header>
         
            <div class="content">
            

            <h1>Add Vehicle</h1>

         <form action="" method="post" enctype="multipart/form-data">
        
        
           <label for="type">Vehicle Type:</label>
          <select id="type" name="type" required>
            <option value="">Choose Vehicle..</option>
            <option value="car">Car</option>
            <option value="bike">Bike</option>
            <option value="bus">Bus</option>
          </select><br><br>

          <label for="number">Vehicle Number:</label>
          <input type="number" id="number" name="number" placeholder="Enter Vehicle Number" ><br>


          <label for="name">Vehicle Name:</label>
          <input type="text" id="username" name="name" placeholder="Enter Vehicle Name" ><br>

          <label for="image">Vehicle Image:</label>
          <input type="file" id="username" name="image" placeholder="Enter Vehicle Image" ><br>

          <label for="detail">Vehicle Detail:</label>
          <input type="text" id="username" name="detail" placeholder="Enter Vehicle Detail" ><br>

          
          <button type="submit" name="add">Add Vehicle </button><br>

</form>










        </div>
        </div>
    </div>
</body>
</html>