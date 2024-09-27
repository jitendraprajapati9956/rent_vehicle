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

if (!isset($_SESSION['driver_username'])) {
    header('Location: driver_login.php');
    exit();
}



$driver_username = mysqli_real_escape_string($con, $_SESSION['driver_username']);
$driver_id= mysqli_real_escape_string($con, $_SESSION['driver_id']);
$sql = "SELECT  driver_image,  driver_password, driver_firstname, driver_lastname, driver_gender, driver_contact, driver_email, driver_licenceno, driver_dob FROM driver WHERE driver_username='$driver_username' AND driver_id='$driver_id'";
$result = mysqli_query($con, $sql);

$driver = array();


if ($result && mysqli_num_rows($result) > 0) {
    $driver = mysqli_fetch_assoc($result);
    
  } 
 
  if (!$driver) {
    echo "<script>alert('No profile found for the specified username')</script>";
          echo "<script>window.open('driver_login.php','_self')</script>";

}




if (isset($_POST['deleteusername'])) {
        
    $driver_username = $_SESSION['driver_username'];

   $delete = "DELETE FROM driver WHERE driver_username = '$driver_username'";
   $deleteResult = mysqli_query($con,$delete);
    
   header('driver_login.php');
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
       <li class="menu"><a href="driver_contactUs.php"><i class="fa fa-phone" id="nav-image"></i>Contact Us</a></li>
       <li class="menu"><a href="register.php"><i class="register" id="nav-image"></i>Register</a></li>
       <li class="menu"><a href="carrent.php"><i class="fa fa-phone" id="nav-image"></i>Car Rent</a></li>
       <li class="menu"><a href="driver_dashboard.php"><i class="fa fa-home" id="nav-image"></i>Driver Profile</a></li>
       <li class="menu"><a href="driver_editaccount.php"><i class="fa fa-phone" id="nav-image"></i>Driver Edit Accont</a></li>
       <li class="menu"><a href="logout.php"><i class="fa fa-phone" id="nav-image"></i>Logout</a></li>
</ul>

   
<body>

<h1 style="color: yellow;">Driver Details</h1>
<style>
li a {
  display: block;
  width: 60px;
}
</style>
<ul>
      
   
</ul>

       <form action="" method="post" enctype="multipart/form-data">
  
<table  style="width:60%" >
    <thead>
        <tr><th><img src="admin/image/driver/<?php echo  htmlspecialchars($driver['driver_image']); ?>" style='width: 150px; height: 150px; '></td></tr>
         <tr><th style="background-color: orange;">First Name:</th><td style="background-color: yellow;"><?php echo htmlspecialchars($driver['driver_firstname']); ?></td></tr>
          <tr><th style="background-color: orange;">Last Name:</th><td style="background-color: yellow;"><?php echo htmlspecialchars($driver['driver_lastname']); ?></td></tr>
          <tr><th style="background-color: orange;">Gender:</th><td style="background-color: yellow;"><?php echo htmlspecialchars($driver['driver_gender']); ?></td></tr>
          <tr><th style="background-color: orange;">Mobile No:</th><td style="background-color: yellow;"><?php echo htmlspecialchars($driver['driver_contact']); ?></td></tr>
          <tr><th style="background-color: orange;">Email:</th><td style="background-color: yellow;"><?php echo htmlspecialchars($driver['driver_email']); ?></td></tr>
          <tr><th style="background-color: orange;">LicenceNO:</th><td style="background-color: yellow;"><?php echo htmlspecialchars($driver['driver_licenceno']); ?></td></tr>
          <tr><th style="background-color: orange;">Date Of Birth:</th><td style="background-color: yellow;"><?php echo htmlspecialchars($driver['driver_dob']); ?></td></tr>
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


