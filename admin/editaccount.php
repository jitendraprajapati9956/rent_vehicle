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


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $username = mysqli_real_escape_string($con, trim($_POST['username']));
    $email = mysqli_real_escape_string($con, trim($_POST['email']));
    $name = mysqli_real_escape_string($con, trim($_POST['name']));
    $mobile = mysqli_real_escape_string($con, trim($_POST['mobile']));
    $gender = mysqli_real_escape_string($con, trim($_POST['gender']));
    $birthdate = mysqli_real_escape_string($con, trim($_POST['birthdate']));
  
    $user = $_SESSION['username'];

    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES["profilephoto"]["name"]);
    if (move_uploaded_file($_FILES["profilephoto"]["tmp_name"], $target_file)) {
        $sql = "UPDATE admin SET admin_username='$username', admin_email='$email', admin_name='$name', admin_contact='$mobile', admin_gender='$gender', admin_dob='$birthdate', admin_image='$target_file'  WHERE admin_username='$username'";

        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Profile updated successfully.')</script>";  
            echo "<script>window.open('login.php','_self')</script>";

        } 
      }
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
  button {
	background-color: #1290de;
	color: rgb(255, 255, 255);
	padding: 12px 12px;
	margin: 8px 0;
	border: none;
	cursor: pointer;
	width: 15%;
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
                <h2>Edit Profile</h2>
              </header>
          

            <div class="content">
<h1>Edit Profile</h1>
<form action="#" method="post" enctype="multipart/form-data">

  <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Edit Username"  minlength="5"><br><br>

        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Edit Email Address"  required><br><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Edit Full Name"  required><br><br>

      
        <label for="mobile">Mobile:</label>
        <input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" placeholder="Edit Mobile No."  required title="Ten digits code"><br><br>

       
        <label for="gender">Gender:</label>
        <select id="gender" name="gender"  required>
            <option value="">Choose Gender..</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select><br><br>

        <label for="birthdate">Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate"  required><br><br>

        <label for="profilephoto">Profile Photo:</label>
        <input type="file" id="profilephoto" name="profilephoto" accept="image/*" required><br><br>

      
        <button type="submit" name="update">Update Profile</button><br>
</form>
            </div>
          </div>
    </div>

</body>
</html>