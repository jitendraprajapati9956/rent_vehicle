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
		$customer_username = $_POST['user'];
		$customer_firstname = $_POST['fname']; 
		$customer_lastname = $_POST['lname'];
		$customer_gender = $_POST['gender'];
		$customer_contact = $_POST['phone'];
		$customer_email = $_POST['email'];
		$customer_address = $_POST['addr'];
		$customer_dob = $_POST['dob'];
		$customer_password = $_POST['rpwd'];
	 
		if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
			$allowed = ['jpg' => 'imges/jpg', 'jpeg' => 'imges/jpeg', 'gif' => 'imges/gif', 'png' => 'imges/png'];
			$customer_image = $_FILES['image']['name'];
			$filetype = $_FILES['image']['type'];
			$filesize = $_FILES['image']['size'];
			
			$ext = pathinfo($customer_image, PATHINFO_EXTENSION);
			if (!array_key_exists($ext, $allowed)) {
				die(" Please select a valid file format.");
			}
	
			$maxsize = 5 * 1024 * 1024;
			if ($filesize > $maxsize) {
				die(" File size is larger than the allowed limit.");
			}
	
			if (in_array($filetype, $allowed)) {
				$newfilename = md5(time() . $customer_image) . ".$ext";  
				$filepath = "imges/" . $newfilename;
				if (move_uploaded_file($_FILES["image"]["tmp_name"], $filepath)) {
					echo "<script>alert('Your file was uploaded successfully..')</script>";
				} 
	
			 }
		}
			
			
	$sql = "INSERT INTO customer (customer_username, customer_image, customer_firstname, customer_lastname, customer_gender, customer_contact, customer_email, customer_address, customer_dob, customer_password)  VALUES ('$customer_username', '$customer_image', '$customer_firstname', '$customer_lastname', '$customer_gender', '$customer_contact', '$customer_email', '$customer_address', '$customer_dob', '$customer_password')";

 
	if (mysqli_query($con,$sql) === TRUE) {
        
    echo "<script>alert('New Customer Account Create successfully.')</script>";  
    echo "<script>window.open('customer_login.php','_self')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
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
<br>
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
<div class="regform"><h1>Customer Registration Form</h1></div>
	<div class="form">
	
	<form action="#" method="POST" onsubmit="return checkPassword()" enctype="multipart/form-data">

	
	<p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none; float: right"></p>
	<img style = "float:center" id="output" width="200" /><br><br>
	<button class = "btnUpload" class = "up1"><label for="file" style="font-size: 20px; cursor: pointer; text-align:right">Upload Profile Picture</label></button><br><br>
	
	<label for="fname" id="formalign">User name:</label><br>
		<input type="text" id="user" name="user" style="width:500px" placeholder="First Name" required>
		<br><br>
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
		
		
		<input type="submit" id="btn1" name="btn1" value="Register Now" disabled>
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

