<?php
session_start();


$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'rentvehicle';

$con = new mysqli($db_host, $db_user, $db_pass, $db_name);

if (!$con) {
    die("Connection failed: ");
}

if (!isset($_SESSION['customer_username'])) {
    header('Location: customer_login.php');
    exit();
}




$customer_username = mysqli_real_escape_string($con, $_SESSION['customer_username']);


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
   
    $customer_firstname = mysqli_real_escape_string($con, trim($_POST['fname']));
    $customer_lastname = mysqli_real_escape_string($con, trim($_POST['lname']));
    $customer_gender = mysqli_real_escape_string($con, trim($_POST['gender']));
    $customer_contact = mysqli_real_escape_string($con, trim($_POST['phone']));
    $customer_email = mysqli_real_escape_string($con, trim($_POST['email']));
    $customer_address = mysqli_real_escape_string($con, trim($_POST['addr']));
    $customer_dob = mysqli_real_escape_string($con, trim($_POST['dob']));
    $customer_password = mysqli_real_escape_string($con, trim($_POST['pwd']));
    $customer_password = mysqli_real_escape_string($con, trim($_POST['rpwd']));

    $target_dir = "admin/image/customer/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $sql = "UPDATE customer SET customer_firstname='$customer_firstname', customer_lastname='$customer_lastname', customer_gender='$customer_gender', customer_contact='$customer_contact', customer_email='$customer_email', customer_address='$customer_address', customer_dob='$customer_dob', customer_password='$customer_password', customer_image='$target_file' WHERE customer_username='$customer_username'";

        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Customer Profile updated successfully.')</script>";  
            echo "<script>window.open('customer_login.php','_self')</script>";

        } 
      }
}

?>




<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles/Home_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/footer.css">
	<link rel="stylesheet" type="text/css" href="styles/stylesss.css">
    <link rel="stylesheet" type="text/css" href="a.css">
    <link rel="icon" href="admin/images/logo.jpeg">

	<script src="js/JavaScript.js"></script>
</head>


<body style="background-color:rgb(3, 1, 1)">

   
<div style="background-color:rgb(11, 11, 2); width: 100%; height:100px; padding-bottom:20px">
<a href="index.php"><img src="admin/image/logo.jpeg" width = "110" height = "110" class = "logo" style="border-radius:80px; padding-top:2px; padding-left:5px" align = "left"></a>
 <div style="padding-top: 1px; padding-left: 10px; padding-right:10px">
  <header>
   <center><h1 class="monospace"  style="color:rgb(238, 158, 29);"><b>Rent Vehicle</b></h1></center>
   </header>
</div>
</div><br>

<ul class="menu">
       <li class="menu"><a href="index.php"><i class="fa fa-home" id="nav-image"></i>Home</a></li>
       <li class="menu"><a href="aboutus.php"><i class="fa fa-user" id="nav-image"></i>About Us</a></li>
       <li class="menu"><a href="contactUs.php"><i class="fa fa-phone" id="nav-image"></i>Contact Us</a></li>
       <li class="menu"><a href="register.php"><i class="register" id="nav-image"></i>Register</a></li>
       <li class="menu"><a href="carrent.php"><i class="fa fa-phone" id="nav-image"></i>Car Rent</a></li>
       <li class="menu"><a href="dashboard.php"><i class="fa fa-home" id="nav-image"></i>Customer Profile</a></li>
       <li class="menu"><a href="booking.php"><i class="fa fa-home" id="nav-image"></i>Customer Booking</a></li>
	   <li class="menu"><a href="editaccount.php"><i class="fa fa-home" id="nav-image"></i>Customer EditAccount</a></li>
	   <li class="menu"><a href="logout.php"><i class="fa fa-home" id="nav-image"></i>Logout</a></li>
  
 </ul>
   
<div style="background-image:url(images/img4.jpg); background-position:center; background-size:cover; font-family:sans-serif">
<center>
<br>
<div class="regform"><h1>Edit Form</h1></div>
	<div class="form">
	
	<form action="#" target="_self" method="POST" enctype="multipart/form-data" onsubmit="return checkPassword()">

	
	<p><input type="file" accept="customer/*" name="image" id="file" onchange="loadFile(event)" style="display: none; float: right"></p>
	<img style = "float:center" id="output" width="200" /><br><br>
	<button class = "btnUpload" class = "up1"><label for="file" style="font-size: 20px; cursor: pointer; text-align:right">Upload Profile Picture</label></button><br><br>
	

	<div id="name">
		<label for="fname" id="formalign">First name:</label><br>
		<input type="text" id="fname" name="fname" style="width:500px" placeholder="First Name" required>
		<br><br>
		
		<label for="lname" id="formalign">Last name:</label><br>
		<input type="text" id="lname" name="lname" style="width:500px" placeholder="Last Name" required>
		<br><br>
		
		<label id="formalign">Gender</label><br>
		<input type="radio" id="male" name="gender" value="male" checked="checked" required>
		<label for="male" id="formalign">Male</label>
		
		<input type="radio" id="female" name="gender" value="female" required>
		<label for="female" id="formalign">Female</label>
		<br><br>
		
		<label for="phone" id="formalign">Mobile number:</label><br>
		<input type="tel" id="phone" name="phone" pattern="[0-9]{10}" style="width:500px" placeholder="Phone number" required>
		<br><br>
		
		<label for="email" id="formalign">Email Address:</label><br>
		<input type="email" id="email" name="email" style="width:500px" pattern="[a-zA-Z0-9._%+-]+@[a-z]+.[a-z]{2,4}" placeholder="E mail" required>
		<br><br>
		
		<label for="addr" id="formalign">Address:</label><br>
		<textarea id="addr" name="addr" rows="10" cols="50" style="width:500px" placeholder="Address" required></textarea>
		<br><br>
		
		<label for="dob" id="formalign">Date of Birth:</label><br>
		<input type="date" id="dob" name="dob">
		<br><br>
		
		<label for="pwd" id="formalign">Password</label><br>
		<input type="password" id="pwd" name="pwd" style="width:500px" placeholder="Create Password" required>
		<br><br>
		
		<label for="pwd" id="formalign">Re-enter Password</label><br>
		<input type="password" id="rpwd" name="rpwd" style="width:500px" placeholder="Confirm Password" required>
		<br><br>
		
		<label for="policy" id="formalign">Accept privacy policy terms:</label>
		<input type="checkbox" id="policy" name="policy" required onclick="enableButton()">
		<br><br>
		
		
		<input type="submit" id="btn1" name="edit" value="Edit Now" disabled>
		<input type="reset" id="btn2" name="btn2" value="Reset">
		
	
	</div>
	
	</form>
	
	</div>

</center>
<br>
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
