<?php
session_start();


$host = "localhost";
$user = "root";
$pass = "";
$db = "rentvehicle";

$con = new mysqli($host,$user,$pass,$db);

  if(!$con)
     {
         die('connection fail');
     }


if (!isset($_SESSION['admin_username'])) {
    header('Location: login.php');
    exit();
}




$username = mysqli_real_escape_string($con, $_SESSION['admin_username']);

$sql = "SELECT admin_image, admin_name, admin_email, admin_contact, admin_gender, admin_dob  FROM admin WHERE admin_username='$username'";
$result = mysqli_query($con, $sql);

$admin = array();


if ($result && mysqli_num_rows($result) > 0) {
    $admin = mysqli_fetch_assoc($result);
    
  } 
 
  if (!$admin) {
    echo "<script>alert('No profile found for the specified username')</script>";
          echo "<script>window.open('login.php','_self')</script>";

}

if (isset($_POST['deleteusername'])) {
        
    $username = $_SESSION['admin_username'];

   $deleteadmin = "DELETE FROM admin WHERE admin_username = '$username'";
   $deleteResult = mysqli_query($con,$deleteadmin);
    
   header('login.php');
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
                <h2>Admin-Profile</h2>
              
            </header>
         
            <div class="content">
            <form action="" method="post" enctype="multipart/form-data">
              <table  style="width:100%">
              <thead>
               <b> Profile Photo</b>
 
        <tr><td><img src="admin/image/<?php echo  htmlspecialchars($admin['admin_image']); ?>" style='width: 150px; height: 150px; '></td></tr>
        <tr><th>Name:</th><td><?php echo htmlspecialchars($admin['admin_name']); ?></td></tr>
        <tr><th>Email:</th><td><?php echo htmlspecialchars($admin['admin_email']); ?></td></tr>
        <tr><th>Mobile No:</th><td><?php echo htmlspecialchars($admin['admin_contact']); ?></td></tr>
        <tr><th>Gender:</th><td><?php echo htmlspecialchars($admin['admin_gender']); ?></td></tr>
        <tr><th>Birthdate:</th><td><?php echo htmlspecialchars($admin['admin_dob']); ?></td></tr>
       
        <tr>
            <th> 
            <td colspan="2">
                <input type="submit" name="deleteusername" value="Delete Account" style="background-color: green; color: white; padding: 10px 70px; margin: 8px 8px; cursor: pointer;">
                <style>
                    input[type="submit"]:hover { background: red; }
                </style>
            </td>

            </th>
        </tr>
    </thead>
    
</table>
</form>
            </div>
                  
        </div>
    </div>
    </body>
    </html>