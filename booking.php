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

$sql = "SELECT pickupdate, returndate, pickup_location, return_location FROM  booking  WHERE customer_username='$customer_username'";
$result = mysqli_query($con, $sql);

$booking = array();


if ($result && mysqli_num_rows($result) > 0) {
    $booking = mysqli_fetch_assoc($result);
    
  } 
 
  if (!$booking) {
    echo "<script>alert('No Booking found for the specified username')</script>";
     
}

$vsql = "SELECT vehicle_name, vehicle_image, vehicle_detail FROM vehicle ";
$result = mysqli_query($con, $vsql);

$vehicle = array();

if ($result && mysqli_num_rows($result) > 0) {
    $vehicle = mysqli_fetch_assoc($result);
    
  } 
 

  if (isset($_POST['deleteusername'])) {

    $customer_username = $_SESSION['customer_username'];
   
   $delete = "DELETE FROM booking WHERE customer_username = '$customer_username'";
   $deleteResult = mysqli_query($con,$delete);
    
   header('dashboard.php');
}


?>

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
       <li class="menu"><a href="dashboard.php"><i class="fa fa-home" id="nav-image"></i>Customer Profile</a></li>
       <li class="menu"><a href="booking.php"><i class="fa fa-home" id="nav-image"></i>Customer Booking</a></li>
	   <li class="menu"><a href="editaccount.php"><i class="fa fa-home" id="nav-image"></i>Customer EditAccount</a></li>
	   <li class="menu"><a href="logout.php"><i class="fa fa-home" id="nav-image"></i>Logout</a></li>
  
  
 </ul>


<body>
<h1 style="color: yellow;">Customer Booking Details</h1>
<style>
li a {
  display: block;
  width: 60px;
}
</style>

<form action="" method="post" enctype="multipart/form-data">
<h2 style="color: yellow;">Customer Details</h2>
<table  style="width:40%" >
    <thead>
    <tr> <th> 
             <td colspan="2">
                <input type="submit" name="deleteusername" value="Cancel Booking" style="background-color: green; color: white; padding: 10px 70px; margin: 8px 8px; cursor: pointer;">
                <style>
                    input[type="submit"]:hover { background: red; }
                </style>
            </td>
            </th>
           </tr>
           <?php
           $sql = "SELECT customer_firstname, customer_lastname, customer_gender, customer_contact, customer_email, customer_address  FROM  customer  WHERE customer_username='$customer_username'";
           $result = mysqli_query($con, $sql);

           $customer = array();


          if ($result && mysqli_num_rows($result) > 0) {
             $customer = mysqli_fetch_assoc($result);
    
              } 
            ?>
          <tr><th style="background-color: orange;">First Name:</th><td style="background-color: yellow;"><?php echo htmlspecialchars($customer['customer_firstname']); ?></td></tr>
          <tr><th style="background-color: orange;">Last Name:</th><td style="background-color: yellow;"><?php echo htmlspecialchars($customer['customer_lastname']); ?></td></tr>
          <tr><th style="background-color: orange;">Gender:</th><td style="background-color: yellow;"><?php echo htmlspecialchars($customer['customer_gender']); ?></td></tr>
          <tr><th style="background-color: orange;">Mobile No:</th><td style="background-color: yellow;"><?php echo htmlspecialchars($customer['customer_contact']); ?></td></tr>
          <tr><th style="background-color: orange;">Email:</th><td style="background-color: yellow;"><?php echo htmlspecialchars($customer['customer_email']); ?></td></tr>
          <tr><th style="background-color: orange;">Address:</th><td style="background-color: yellow;"><?php echo htmlspecialchars($customer['customer_address']); ?></td></tr>
        </thead>        
</table><br>
<h2 style="color: yellow;">Vehicle Details</h2>
<table  style="width:40%" >
    <thead>
          <tr><th><img src="vehicle_img/<?php echo  htmlspecialchars($vehicle['vehicle_image']); ?>" style='width: 150px; height: 150px; '></td></tr>
           <tr><th style="background-color: orange;">Vehicle Name:</th><td style="background-color: yellow;"><?php echo htmlspecialchars($vehicle['vehicle_name']); ?></td></tr>
           <tr><th style="background-color: orange;">Vehicle Details:</th><td style="background-color: yellow;"><?php echo htmlspecialchars($vehicle['vehicle_detail']); ?></td></tr>
        
          </thead>        
</table><br>
<h2 style="color: yellow;">Booking Details</h2>

<table  style="width:40%" >
    <thead>
           <tr><th style="background-color: orange;">Pickup Date:</th><td style="background-color: yellow;"><?php echo htmlspecialchars($booking['pickupdate']); ?></td></tr>
           <tr><th style="background-color: orange;">Return Date:</th><td style="background-color: yellow;"><?php echo htmlspecialchars($booking['returndate']); ?></td></tr>
           <tr><th style="background-color: orange;">Pick Location:</th><td style="background-color: yellow;"><?php echo htmlspecialchars($booking['pickup_location']); ?></td></tr>
           <tr><th style="background-color: orange;">Return Location:</th><td style="background-color: yellow;"><?php echo htmlspecialchars($booking['return_location']); ?></td></tr>
          
       </thead>     
             
</table>
</form>



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

    
    
    
    
    