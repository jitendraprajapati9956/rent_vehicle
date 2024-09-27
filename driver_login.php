<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles/Home_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/home.css">
    <link rel="stylesheet" type="text/css" href="styles/footer.css">
    <link rel="stylesheet" type="text/css" href="a.css">
    <link rel="icon" href="admin/image/logo.jpeg">
</head>


<body style="background-color:rgb(3, 1, 1)">
<div class="nav-container">
            <div class="logo">
                
            </div>
            <div class="links">
                <a href="customer_login.php">Customer</a>
                <a href="driver_login.php">Driver</a>
            </div>
        </div>
        <style>
   

   nav {
       background-color: #333;
       color: white;
       font-family: Arial, sans-serif;
       padding: 10px 20px;
       position: fixed;
       width: 100%;
       top: 0;
       z-index: 1000;
   }
   
   .nav-container {
       display: flex;
       justify-content: space-between;
       align-items: center;
   }
   
   .logo a {
       color: white;
       text-decoration: none;
       font-size: 20px;
   }
   
   .links a {
       color: white;
       text-decoration: none;
       margin-left: 20px;
       font-size: 16px;
   }
   
   .links a:hover {
       color: #4CAF50;
   }
   
      </style>
<div style="background-color:rgb(11, 11, 2); width: 100%; height:100px; padding-bottom:20px">
<a href="index.php"><img src="admin/image/logo.jpeg" width = "110" height = "110" class = "logo" style="border-radius:80px; padding-top:2px; padding-left:5px" align = "left"></a>
 <div style="padding-top: 1px; padding-left: 10px; padding-right:10px">
  <header>
   <center><h1 class="monospace"  style="color:rgb(238, 158, 29);"><b>Rent Vehicle</b></h1></center>
   </header>
</div>
</div>

<ul class="menu">
       <li class="menu"><a href="index.php"><i class="fa fa-home" id="nav-image"></i>Home</a></li>
       <li class="menu"><a href="aboutus.php"><i class="fa fa-user" id="nav-image"></i>About Us</a></li>
       <li class="menu"><a href="contactUs.php"><i class="fa fa-phone" id="nav-image"></i>Contact Us</a></li>
       <li class="menu"><a href="register.php"><i class="register" id="nav-image"></i>Register</a></li>
       <li class="menu"><a href="carrent.php"><i class="fa fa-phone" id="nav-image"></i>Car Rent</a></li>
 </ul><br>
  

<marquee behavior="scroll" scrollamount="18" direction="right"><center><h1 style="font-family: 'Cinzel', serif;"><font color="white">Driver login </font></h1></center></marquee>



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
  $driver_username = mysqli_real_escape_string($con, $_POST['uname']);
  $driver_password = mysqli_real_escape_string($con, $_POST['psw']);

  $sql = "SELECT * FROM driver WHERE driver_username='$driver_username' AND driver_password='$driver_password'";
  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) == 1) {
      $user = mysqli_fetch_assoc( $result);
      $_SESSION['driver_id'] =$user['driver_id'];
      $_SESSION['driver_username'] =$user['driver_username'];
      header('location: driver_dashboard.php');              
      echo "<script>alert('Welcome to $user')</script>";
     
  }  else{
      echo "<script>alert('Check Username Or Password')</script>";   
  }  
 }
?>

<style>
 
 input[type=text], input[type=password] {
	width: 18%;
	padding: 12px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #bcbac9;
	box-sizing: border-box;
  }
  button {
	background-color: #1290de;
	color: yellow;
	padding: 20px 20px;
	margin: 8px 0;
	border: none;
	cursor: pointer;
	width: 15%;
  }
  
  button:hover {
	opacity: 0.3;
	background-color: yellow;
  }


</style>

<center>
<form action="" method="post">
<div class="form">
  <div>      

  <div class="container">
   
    <input type="text" placeholder="Enter Username" name="uname" required><br>
       
    <input type="password" placeholder="Enter Password" name="psw" required><br>

    <button type="submit" name='driver_login'>Login </button>
    
  
  </div>

  <div class="container" >
      <a href="driver_forgot.php">Forgot password?</a></span><br>
     <a href="driverregistration.php">New Driver Account</a></span>
  </div>
</form>
</center>
</div>
</div>


<footer style="background-color:#283c5f; width:100%; height:200px; padding-top:2px">
<div class="main-content">
<div class="left box1">

<h5><a href="#">HOME</a></h5>
<h5><a href="terms.php">TERMS & CONDITIONS</a></h5>
<h5><a href="aboutus.php">ABOUT US</a></h5>
<h5><a href="contactUs.php">CONTACT US</a></h5>
<h5><a href="register.php">REGISTER</a></h5>
<h5><a href="rentcar.php">BOOKING VEHICLE</a></h5>



</div>


<img src="admin/image/logo.jpeg" height = "170px" class = "logo" style="padding-top:15px; padding-left:10px; padding-right:230px" align = "center">


</footer>
<h5 align="center" style = "font-family: 'Poppins', sans-serif"><font color="white">Copyright 2024 © Jitendra Prajapati. All Rights Reserved.</font></h5>
</body>
</html>



