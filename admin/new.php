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



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $email = $_POST['email'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
 
  

    if (isset($_FILES['profilephoto']) && $_FILES['profilephoto']['error'] == 0) {
        $allowed = ['jpg' => 'image/jpg', 'jpeg' => 'image/jpeg', 'gif' => 'image/gif', 'png' => 'image/png'];
        $filename = $_FILES['profilephoto']['name'];
        $filetype = $_FILES['profilephoto']['type'];
        $filesize = $_FILES['profilephoto']['size'];
        
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) {
            die(" Please select a valid file format.");
        }

        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) {
            die(" File size is larger than the allowed limit.");
        }

        if (in_array($filetype, $allowed)) {
            $newfilename = md5(time() . $filename) . ".$ext";  
            $filepath = "image/" . $newfilename;
            if (move_uploaded_file($_FILES["profilephoto"]["tmp_name"], $filepath)) {
                echo "Your file was uploaded successfully.";
            } 

 
 
 
    $sql = "INSERT INTO admin (admin_username, admin_password, admin_image, admin_email, admin_name, admin_contact, admin_gender, admin_dob) VALUES ('$username', '$password', '$filename', '$email', '$name',  '$mobile',  '$gender', '$birthdate')";

    if (mysqli_query($con,$sql) === TRUE) {
        
    echo "<script>alert('Account Create successfully.')</script>";  
    echo "<script>window.open('login.php','_self')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0">	
        <link rel="stylesheet" href="style/register.css">
    </head>

<body>
<style>
    
input[type=text], input[type=password] {
	width: 18%;
	padding: 12px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #bcbac9;
	box-sizing: border-box;
  }

  input[type=email], input[type=tel] {
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
	color: rgb(255, 255, 255);
	padding: 12px 12px;
	margin: 8px 0;
	border: none;
	cursor: pointer;
	width: 15%;
  }
</style>
<h1>Registration Form</h1>
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter Username" minlength="5"><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter Password" required minlength="8"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter Email Address" required><br><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter Full Name" required><br><br>


        <label for="mobile">Mobile:</label>
        <input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" placeholder="Enter Mobile No." required title="Ten digits code"><br><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="">Choose Gender..</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select><br><br>

        <label for="birthdate">Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate"  required><br><br>

        <label for="profilephoto">Profile Photo:</label>
        <input type="file" id="profilephoto" name="profilephoto" accept="image/*" required><br><br>

     
        <button type="submit">Register</button><br>

        <a href="login.php">Back to login</a></span>

    </form>
</body>
</html>
