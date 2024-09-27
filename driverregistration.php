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


	 if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$driver_username = $_POST['user'];
		$driver_firstname = $_POST['fname']; 
		$driver_lastname = $_POST['lname'];
        $driver_dob = $_POST['DOB'];
        $driver_email = $_POST['email'];
        $driver_contact = $_POST['pNumber'];
		$driver_gender = $_POST['gender'];
      	$driver_licenceno = $_POST['drivingLicenseNo'];
		$driver_password = $_POST['rpass'];
	 
		if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
			$allowed = ['jpg' => 'driver/jpg', 'jpeg' => 'driver/jpeg', 'gif' => 'driver/gif', 'png' => 'driver/png'];
			$driver_image = $_FILES['image']['name'];
			$filetype = $_FILES['image']['type'];
			$filesize = $_FILES['image']['size'];
			
			$ext = pathinfo($driver_image, PATHINFO_EXTENSION);
			if (!array_key_exists($ext, $allowed)) {
				die(" Please select a valid file format.");
			}
	
			$maxsize = 5 * 1024 * 1024;
			if ($filesize > $maxsize) {
				die(" File size is larger than the allowed limit.");
			}
	
			if (in_array($filetype, $allowed)) {
				$newfilename = md5(time() . $driver_image) . ".$ext";  
				$filepath = "driver/" . $newfilename;
				if (move_uploaded_file($_FILES["image"]["tmp_name"], $filepath)) {
					echo "<script>alert('Your file was uploaded successfully..')</script>";
				} 
	
			 }
		}
			
			
	$sql = "INSERT INTO driver (driver_username, driver_image, driver_firstname, driver_lastname, driver_gender, driver_contact, driver_email,  driver_dob, driver_password, driver_licenceno)  VALUES ('$driver_username', '$driver_image', '$driver_firstname', '$driver_lastname', '$driver_gender', '$driver_contact', '$driver_email', '$driver_dob', '$driver_password', '$driver_licenceno')";

 
	if (mysqli_query($con,$sql) === TRUE) {
        
    echo "<script>alert('New Driver Account Create successfully.')</script>";  
    echo "<script>window.open('driver_login.php','_self')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

	
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles/Home_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/driver_registration.css">
    <link rel="stylesheet" type="text/css" href="styles/footer.css">
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
  
  
    
<div class="contact">
<center><font color="white">Driver Registration Form</font></center>
</div> 
<div class="container">
<div class="contact-box">
<div class="contact-left">
<div class="wrapper">
<form action="#" onsubmit = "return checkPassword()" method="post" enctype="multipart/form-data">
   
   
   
   <div class="input-row">
   <div class="input-group">
   <img style = "float:left; padding-bottom:10px" id="output" width="100" />
   <p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none float left;"></p>
   
   <button class="btnUpload" class="up1"><label for="file" style="font-size: 15px; cursor: pointer; text-align:center">Upload Profile Image</label></button><br><br>
   </div>
   </div>

   <div class="input-row">
       <div class="input-group">
           <label>Username<font color="red">*</font></label><br>
           <input type="text" id="user" name="user" style="font-size:15px; width:131%" placeholder="Create Username" required>
       </div>
   </div>

   <div class="input-row">
       <div class="input-group">
           <label>First Name<font color="red">*</font></label><br>
		   <input type="text" name="fname" style="font-size:15px; width:118%" placeholder="First Name" required>
       </div>
	   <div class="input-group">
           <label>Last Name<font color="red">*</font></label><br>
           <input type="text" name="lname" style="font-size:15px; width:118%" placeholder="Last Name" required>
       </div>
   </div>
   
   <div class="input-row">
       <div class="input-group">
           <label>Date of Birth<font color="red">*</font></label><br>
		   <input type="date" name="DOB" style="font-size:15px; width:130%" required>
             
       </div>

       <div class="input-group">
           <label>Your Email Address<font color="red">*</font></label><br>
           <input type="email" name="email" style="font-size:15px; width:200%" placeholder="E mail" required>
       </div>

   </div>
   
   <div class="input-row">
       <div class="input-group">
           <label>Phone Number</label><br>
           <input type="text" name="pNumber" style="font-size:15px; width:130%"  placeholder="Phone number" required>
       </div>
   </div>
   
   <div class="input-row">
       <div class="input-group">
       <select name="gender">
       <option value="gender">Choose Gender</option>
        <option value="gender">Male</option>
        <option value="gender">Female</option>
      
    </select>
       </div>
   </div>
   
   <div class="input-row">
       <div class="input-group">
           <label>Driving license number<font color="red">*</font></label><br>
           <input type="number" name="drivingLicenseNo" style="font-size:15px; width:118%" placeholder="Driving license number" required>
       </div>
   </div>
   
   

   <div class="input-row">
       <div class="input-group">
           <label>Create Password<font color="red">*</font></label><br>
           <input type="password" id="pass" name="pass" style="font-size:15px; width:131%" placeholder="Create Password" required>
       </div>
   </div>
   
     <div class="input-row">
       <div class="input-group">
           <label>Confirm Password<font color="red">*</font></label><br>
           <input type="password" id="rpass" name="rpass" style="font-size:15px; width:131%" placeholder="Confirm Password" required>
       </div>
   </div>  
   
<br>
<input type="submit" class="send" value="SEND">
<input type="reset" class="reset" value="RESET">
<br><br><br><br>
</form>
</div>
</div>
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

