<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "rentvehicle";
$con = mysqli_connect($host, $user, $pass, $db);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


if (!isset($_SESSION['customer_username'])) {
    echo "<script>alert('You are not logged in. Please login to continue.');</script>";
    echo "<script>window.location.href='customer_login.php';</script>"; 
    exit; 
}

if (isset($_POST['update'])) {
          
    $customer_username = mysqli_real_escape_string($con, $_SESSION['customer_username']);
    $payment_mode = mysqli_real_escape_string($con, $_POST['pay_mode']);
    $c_type = mysqli_real_escape_string($con, $_POST['c_type']);
    $c_number = mysqli_real_escape_string($con, $_POST['c_number']);
    $c_hname = mysqli_real_escape_string($con, $_POST['c_hname']);
   
    $query = "INSERT INTO payment (customer_username, payment_mode, card_type, card_no, card_holder) VALUES ('$customer_username', '$payment_mode', '$c_type', '$c_number', '$c_hname')";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Payment recorded successfully.');</script>";
        echo "<script>window.location.href='booking.php';</script>"; 
  
    } else {
        echo "<script>alert('Failed to record payment: " . mysqli_error($con) . "');</script>";
    }
}

mysqli_close($con);
?>

<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles/Home_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/home.css">
    <link rel="stylesheet" type="text/css" href="styles/footer.css">
    <link rel="stylesheet" type="text/css" href="a.css">
    <link rel="icon" href="admin/images/logo.jpeg">
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
<a href="index.php"><img src="admin/images/logo.jpeg" width = "110" height = "110" class = "logo" style="border-radius:80px; padding-top:2px; padding-left:5px" align = "left"></a>
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
  


<style>
 
 input[type=text], input[type=password] {
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

form {
    background-color: #bcbac9;
}
h1{
    color: yellow;
}
</style>

<center>
<form action="" method="post">
<select name="pay_mode">
<option name="pay_mode" >Card </option>                                      
</select></h1>

<h1 style="color: yellow;">Card Type:
<select name="c_type">
<option name="c_type" value="VISA">Card Type </option>
<option name="c_type" value="VISA">VISA </option>
<option name="c_type" value="MasterCard">Master Card </option>
<option name="c_type" value="Rupay">Rupay </option>
    </select>                                       
</select></h1>
<h1 style="color: yellow;">Card Number(16 digit):<input type="number" name="c_number" minlength="16" required></h1>
<h1 style="color: yellow;">Card Holder Name: <input type="text" name="c_hname" required></h1>
            
<button     name='update'>Submit</button><br>
                       
<a href="payment.php">Back to Payment Method</a>