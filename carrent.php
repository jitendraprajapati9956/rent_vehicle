<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db = "rentvehicle";

$con = new mysqli($host,$user,$pass,$db);

  if(!$con)
     {
         die('connection fail');
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
     
</ul>



<style>
  a{
    color:#eee;
  }
  #myInput {
  background-image: url('images/a.png');
  background-position: 10px;
  background-repeat: no-repeat;
  width: 10%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}

.card {
  box-shadow: 0 4px 8px 0 rgb(207, 205, 205);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: rgb(245, 241, 241);
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: rgb(255, 255, 255);
  background-color: rgb(217, 4, 4);
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
span{
     color:white;
}

.card button:hover {
  opacity: 0.7;
}
</style>
</head>
<body>

<style>
.grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    padding: 20px;
}

.grid-item {
    border: 1px solid #ccc;
    padding: 10px;
}
</style>
<h1 style="color: yellowgreen;"> Available Vehicle </h1>
<form action="rentcar.php" method="post" enctype="multipart/form-data">
<div class="grid-container">
    <?php
      $sql = "SELECT vehicle_name, vehicle_image, vehicle_detail FROM vehicle";
      $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='grid-item'>";
            echo "<h3 style='color: yellow;'>" . htmlspecialchars($row['vehicle_name']) . "</h3>";
            echo "<img src='" . htmlspecialchars($row['vehicle_image']) . "' alt='Vehicle Image' style='width: 100%;'>";
            echo "<p style='color: yellow;'>" . htmlspecialchars($row['vehicle_detail']) . "</p>";
            echo "<a href='rentcar.php'><button class='btn-add-to-cart'  id='rentvehicle'  name='rent'>Booking</button></td></a>";
          
            echo "</div>";
        }
    } else {
        echo "<p>No vehicles available.</p>";
    }
    ?>
</div>
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
