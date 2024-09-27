<?php
session_start();
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['username']) && empty($_POST['password'])) {
          $username = mysqli_real_escape_string($con, $_POST['username']);
        $query = "SELECT password FROM admin WHERE admin_username='$username'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "Password: " . $row['admin_password']; 
        } else {
            echo "No user found with that username.";
        }
    } elseif (!empty($_POST['password']) && !empty($_POST['confirmPassword'])) {
         $username = mysqli_real_escape_string($con, $_POST['username']);
        $newPassword = mysqli_real_escape_string($con, $_POST['password']);
        $confirmPassword = mysqli_real_escape_string($con, $_POST['confirmPassword']);

        if ($newPassword == $confirmPassword) {
            $updateQuery = "UPDATE admin SET admin_password='$newPassword' WHERE admin_username='$username'";
            if (mysqli_query($con, $updateQuery)) {
                 echo "<script>alert('Password changed successfully.')</script>";  
                 echo "<script>window.open('login.php','_self')</script>";
     
            } else {
                echo "<script>alert('Error updating password..')</script>";  
                 
            }
        } else {
        
            echo "<script>alert('Passwords do not match..')</script>";  
                
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0">	
        <link rel="stylesheet" href="style/styles.css">
     <link rel="stylesheet" href="style/body.css">
     
    </head>

<body>

<center>
      
<h1>Change Password  </h1>
<form action="#" method="post">

  <div class="container">
  <input type="text" placeholder="Enter Username" name="username" required><br>
   <input type="password" id="password" placeholder="New Password" name="password" required> <br>
  <input type="password" id="confirmPassword" placeholder="Confirm Change Password" name="confirmPassword"><br>
  <button type="submit">Change Password</button><br>

  <a href="login.php">Back to login</a></span>

  </div>

</form>
</center>
</body>
</html>

