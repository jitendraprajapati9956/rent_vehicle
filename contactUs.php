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


	if (!isset($_SESSION['customer_username'])) {
		echo "<script>alert('You are not logged in. Please login to continue.');</script>";
		echo "<script>window.location.href='customer_login.php';</script>"; 
		exit; 
	
	     }
	
   else{



	$customer_username = $_SESSION['customer_username'];

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$customer_username = $_POST['user'];
		$customer_contact = $_POST['mono'];
		$customer_email = $_POST['email'];
		$feedback_message = $_POST['message'];		
	

	    $sql = "INSERT INTO feedback (customer_username, customer_email, customer_contact, feedback_message) VALUES('$customer_username', '$customer_email', '$customer_contact', '$feedback_message')";
		if (mysqli_query($con,$sql) === TRUE) {
        
			echo "<script>alert(' Customer Feedback successfully.')</script>";  
 
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
    <link rel="icon" href="admin/image/logo.jpeg">
</head>


<body style="background-color:rgb(3, 1, 1)">

<div style="background-color:rgb(11, 11, 2); width: 100%; height:100px; padding-bottom:20px">
<a href="index.php"><img src="admin/image/logo.jpeg" width = "110" height = "110" class = "logo" style="border-radius:80px; padding-top:2px; padding-left:5px" align = "left"></a>
 <div style="padding-top: 1px; padding-left: 10px; padding-right:10px">
  <header>
   <center><h1 class="monospace"  style="color:rgb(238, 158, 29);"><b>Rent Vehicle</b></h1></center>
   </header>
</div>
</div>
<br>
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

<br>
<center>
<div class="addform"><h1>---CONTACT Us---</h1></div>
<div class="add">
<form  method="post" action="">

<label for="name" id="addformalign">User Name:</label>
<input type="text" name="user" style="width:250px" placeholder="User Name" required><br><br>

<label for="email" id="addformalign">Email Address:</label><br>
<input type="email"  name="email" style="width:500px" pattern="[a-zA-Z0-9._%+-]+@[a-z]+.[a-z]{2,4}" placeholder="E mail" required>
<br><br>

<label for="phone" id="addformalign">Mobile number:</label><br>
<input type="tel"  name="mono" pattern="[0-9]{10}" style="width:500px" placeholder="Phone number" required>

<br><br>

<label class="msg" id="addformalign">Message:</label><br>
<textarea rows="10" name="message" placeholder="Your Message" style="width:500px; font-size:15px"></textarea>
<br><br>
<input style="background-color: #FFD700; border: none; border-radius: 10px; color: Black; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; cursor: pointer; box-shadow: 0 2px #999" type="submit" value="Submit">

</div>

</form>
</div>
<br>
</center>

<div class="BoxesRate">

	<div class="columnRate">
		<div class="cardRate">
			
			<h2>LOCATION</h2>
			<p>Deesa<br>Banaskatha</p>
			
		</div>
	</div>
	
	<div class="columnRate">
		<div class="cardRate">
			
			<h2>CALL Jitendra</h2>
			<p>9023983543</p>
			
		</div>
	</div>
	
	<div class="columnRate">
		<div class="cardRate">
			
			<h2>EMAIL US</h2>
			<p>prajapatijitendra9906@gmail.com</p>
			
		</div>
	</div>


</div>


<br>

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


