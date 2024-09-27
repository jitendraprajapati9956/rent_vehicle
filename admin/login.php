<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style/styles.css">
     <link rel="stylesheet" href="style/body.css">
</head>
<body>
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

     

if ($_POST) {
  $username = mysqli_real_escape_string($con, $_POST['uname']);
  $password = mysqli_real_escape_string($con, $_POST['psw']);

  $sql = "SELECT * FROM admin WHERE admin_username='$username' AND admin_password='$password'";
  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) == 1) {
      $user = mysqli_fetch_assoc( $result);
      $_SESSION['admin_id'] =$user['admin_id'];
      $_SESSION['admin_username'] =$user['admin_username'];
      header('location: dashboard.php');              
      echo "<script>alert('Welcome to $user')</script>";
     
  }  else{
      echo "<script>alert('Check Username Or Password')</script>";   
  }  
 }
?>
<center>
    <h1>Admin Login </h1>
<form action="" method="post">
<div class="form">
  <div>      

  <div class="container">
   
    <input type="text" placeholder="Enter Username" name="uname" required><br>
       
    <input type="password" placeholder="Enter Password" name="psw" required><br>

    <button type="submit" name='admin_login'>Login </button>
    
  
  </div>

  <div class="container" >
      <a href="forgot.php">Forgot password?</a></span><br>
     <a href="new.php">New Admin Account</a></span>
  </div>
</form>
</center>
</div>
</div>

</body>
</html>