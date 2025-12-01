🚗 Rent Vehicle – Online Vehicle Rental System

A simple, user-friendly PHP-based Vehicle Rental Application that allows customers to book cars and drivers, and helps admins manage vehicles, bookings, payments, and user details.

📌 Features
Customer Panel

Create account / Login / Forgot password

Browse available cars

Book cars for rent

Make online payment

View booking history

Contact support

Driver Panel

Driver login / registration

Manage booking requests

Update profile details

Dashboard for driver activity

Admin Panel

Add / edit / delete vehicles

Manage customers & drivers

View all bookings

Approve / reject bookings

Payment management

Content pages (About, Contact, Terms, etc.)

🛠️ Tech Stack

Frontend: HTML, CSS, JavaScript, jQuery

Backend: PHP

Database: MySQL

Hosting: Vercel (Static hosting, PHP rendered externally/local)

📂 Project Structure
rent_vehicle/
│── admin/                 # Admin panel pages
│── images/                # Images used in UI
│── js/                    # JavaScript files
│── styles/                # CSS files
│── *.php                  # Website pages (customer, driver, auth, etc.)
│── rentvehicle.sql        # Database file
│── README.md

⚙️ Setup Instructions
1. Clone the repository
git clone https://github.com/your-username/rent_vehicle.git

2. Import the database

Open phpMyAdmin

Create a database, e.g., rentvehicle

Import rentvehicle.sql

3. Configure database

Update db.php:

$host = "localhost";
$user = "root";
$pass = "";
$db = "rentvehicle";
$conn = mysqli_connect($host, $user, $pass, $db);

4. Run the project

Place the folder inside XAMPP/htdocs
Open in browser:

http://localhost/rent_vehicle/

🔐 Login Details (Sample)
Admin

URL: /admin/admin_login.php

Use credentials you set in DB

Customer / Driver

Register from UI → Login

🌐 Live Demo

🔗 https://rent-vehicle-roan.vercel.app

🤝 Contributing

Pull requests are welcome.
For major changes, please open an issue first to discuss what you’d like to change.

📄 License

This project is open-source and free to use for learning purposes.
