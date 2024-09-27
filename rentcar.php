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
	


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_username = $_SESSION['customer_username'];
    // Ensure the customer exists
    $checkUserQuery = "SELECT * FROM customer WHERE customer_username='$customer_username'";
    $userResult = mysqli_query($con, $checkUserQuery);
    
    if (mysqli_num_rows($userResult) > 0) {
        // Prepare to insert the booking
        $customer_pickupdate = mysqli_real_escape_string($con, $_POST['pickupdate']);
        $customer_returndate = mysqli_real_escape_string($con, $_POST['returndate']);
        $customer_pickuplocation = mysqli_real_escape_string($con, $_POST['pickuploc']);
        $customer_returnlocation = mysqli_real_escape_string($con, $_POST['droploc']);

        $insertQuery = "INSERT INTO booking (customer_username, pickupdate, returndate, pickup_location, return_location) 
                        VALUES ('$customer_username', '$customer_pickupdate', '$customer_returndate', '$customer_pickuplocation', '$customer_returnlocation')";
        if (mysqli_query($con, $insertQuery)) {
            echo "<script>alert('Booking confirmed successfully.');</script>";
            header("Location: payment.php");
  
        } else {
            echo "<script>alert('Failed to book. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('No customer found with given username. Please check and try again.');</script>";
    }
    mysqli_close($con);
}


?>
<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles/Home_styles.css">
     <link rel="stylesheet" type="text/css" href="styles/footer.css">
    <link rel="icon" href="admin/image/logo.jpeg">
	<link rel="stylesheet" type="text/css" href="styles/stylesss.css">
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
 </ul>

   

<div style="background-image:url(images/img4.jpg); background-position:center; background-size:cover; font-family:sans-serif">
<center>
<br>
<div class="regform"><h1>Booking</h1></div>
	<div class="form">
	
	<form action="booking.php" method="post">

	

	<div id="name">
		
		
            
            <label for="name" id="addformalign">Pickup Date:</label><br>
            <input type="date" name="pickupdate" style="width:500px"  required><br>
            
            <label for="month" id="addformalign">Return Date:<label><br>
            <input type="date"  name="returndate" style="width:500px"  required><br>
            
            <label for="week" id="addformalign">Pickup Location:<label><br>
            <input type="text" name="pickuploc" style="width:500px" placeholder="Pickup Location" required><br>
            
            <label for="week" id="addformalign">Drop Off Location:<label><br>
            <input type="text" name="droploc" style="width:500px" placeholder="Drop Off Location" required><br>
            <br>
            
		
		<label for="policy" id="formalign">Accept privacy policy terms:</label>
		<input type="checkbox" id="policy" name="policy" required onclick="enableButton()">
		<br><br>
		
		
		<input type="submit" id="btn1" name="btn1" value="Book" disabled>
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


