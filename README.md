# rent_vehicle

A simple vehicle rental management system built with PHP, HTML, CSS, and JavaScript. It allows customers to register, log in, browse available vehicles, book rentals, and manage reservations. There is also a driver module and an admin dashboard for managing vehicles, bookings, and user accounts.

## Features

### **Customer Features**

* Customer registration and login
* Browse available vehicles
* Book vehicles
* Payment processing page
* View and manage bookings
* Forgot password functionality

### **Driver Features**

* Driver registration and login
* Manage assigned rides
* Edit account information
* Forgot password functionality

### **Admin Features**

* Manage vehicles (add, edit, delete)
* Manage customers and drivers
* Manage bookings
* View system dashboard

## Project Structure

```
root/
 ├── admin/                 # Admin dashboard pages
 ├── images/                # Images used throughout the system
 ├── js/                    # JavaScript files
 ├── styles/                # CSS stylesheets
 ├── booking.php
 ├── carrent.php
 ├── contactUs.php
 ├── customer_login.php
 ├── customerregistration.php
 ├── driver_dashboard.php
 ├── driver_login.php
 ├── driverregistration.php
 ├── db.php                 # Database connection file
 ├── rentvehicle.sql        # Database schema
 └── index.php              # Homepage
```

## Installation

### **1. Clone the repository**

```
git clone https://github.com/yourusername/rent_vehicle.git
```

### **2. Import the database**

* Create a MySQL database (e.g., `rentvehicle_db`).
* Import the `rentvehicle.sql` file into your database.

### **3. Configure the database**

Open `db.php` and update the database credentials:

```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rentvehicle_db";
```

### **4. Run the project**

Place the project folder inside your web server directory (e.g., **XAMPP/htdocs**).

Navigate to:

```
http://localhost/rent_vehicle
```

## Requirements

* PHP 7+
* MySQL / MariaDB
* Apache or any compatible server

## Screenshots

(You can add screenshots here.)

## License

This project is open-source and free to use for learning or improvement.
