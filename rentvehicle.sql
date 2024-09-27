-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 06:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentvehicle`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(10) NOT NULL,
  `admin_image` varchar(20) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_contact` int(15) NOT NULL,
  `admin_gender` enum('Male','Female','','') NOT NULL,
  `admin_dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_image`, `admin_email`, `admin_name`, `admin_contact`, `admin_gender`, `admin_dob`) VALUES
(3, 'jitu90', '12345678', 'driver.jpg', 'prajapatijitendra9906@gmail.com', 'Jitendra Prajapati', 2147483647, 'Male', '0221-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `customer_username` varchar(20) NOT NULL,
  `pickupdate` date NOT NULL,
  `returndate` date NOT NULL,
  `pickup_location` varchar(20) NOT NULL,
  `return_location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `customer_username`, `pickupdate`, `returndate`, `pickup_location`, `return_location`) VALUES
(20, 'jitu9023', '2024-05-16', '2024-05-25', 'Deesa', 'Ananda'),
(21, 'jitu9023', '2024-05-16', '2024-05-25', 'Deesa', 'Ananda'),
(22, 'jitu9023', '2024-05-16', '2024-05-25', 'Deesa', 'Anand'),
(23, 'jitu9023', '0012-12-12', '0112-02-12', 'Deesa', 'Anand'),
(24, 'jitu9023', '0012-12-12', '0112-02-12', 'Deesa', 'Anand'),
(25, 'jitu9023', '2021-05-16', '0112-02-12', 'D', 'Anand'),
(26, 'jitu9023', '0211-12-21', '0121-02-12', 'Deesa', 'Anand'),
(27, 'jitu9023', '0002-02-12', '0003-03-22', 'Deesa', 'X'),
(28, 'jitu9023', '0001-12-21', '0012-12-12', '12', '12'),
(29, 'jitu9023', '0012-12-12', '0012-02-12', 'Deesa', 'Anand'),
(30, 'jitu9023', '0201-01-12', '0034-04-01', 'D', 'Anand'),
(31, 'jitu9023', '0012-12-12', '0012-12-12', 'D', 'Anand'),
(32, 'jitu9023', '0002-11-12', '0012-12-12', 'Deesa', 'Anand');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_username` varchar(20) NOT NULL,
  `customer_image` varchar(20) NOT NULL,
  `customer_firstname` varchar(50) NOT NULL,
  `customer_lastname` varchar(50) NOT NULL,
  `customer_gender` enum('Male','Female','','') NOT NULL,
  `customer_contact` int(15) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_dob` date NOT NULL,
  `customer_password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_username`, `customer_image`, `customer_firstname`, `customer_lastname`, `customer_gender`, `customer_contact`, `customer_email`, `customer_address`, `customer_dob`, `customer_password`) VALUES
(5, 'jitu9023', 'sd.jpg', 'JITENDRA', 'PRAJAPATI', 'Male', 2147483647, 'prajapatijitendra9906@gmail.com', 'DEESA', '2002-01-15', '111');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `driver_username` varchar(20) NOT NULL,
  `driver_image` varchar(20) NOT NULL,
  `driver_firstname` varchar(50) NOT NULL,
  `driver_lastname` varchar(50) NOT NULL,
  `driver_dob` date NOT NULL,
  `driver_email` varchar(255) NOT NULL,
  `driver_contact` varchar(15) NOT NULL,
  `driver_gender` enum('Male','Female','','') NOT NULL,
  `driver_licenceno` varchar(15) NOT NULL,
  `driver_password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `driver_username`, `driver_image`, `driver_firstname`, `driver_lastname`, `driver_dob`, `driver_email`, `driver_contact`, `driver_gender`, `driver_licenceno`, `driver_password`) VALUES
(1, 'jitu123', 'a6.jpg', 'ji', 'p', '2024-05-08', 'j@gmail.com', '902398354', 'Male', '1312', '111');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `customer_username` varchar(20) NOT NULL,
  `driver_username` varchar(20) NOT NULL,
  `driver_email` varchar(50) NOT NULL,
  `driver_contact` int(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_contact` int(50) NOT NULL,
  `feedback_message` text NOT NULL,
  `feedback_driver` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `card_type` enum('VISA','MasterCard','Rupay','') NOT NULL,
  `card_no` varchar(16) NOT NULL,
  `card_holder` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `customer_username`, `payment_mode`, `card_type`, `card_no`, `card_holder`) VALUES
(23, 'jitu9023', 'Card', 'VISA', '23424', 'JMP');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `vehicle_number` int(5) NOT NULL,
  `vehicle_type` enum('car','bike','bus','') NOT NULL,
  `vehicle_name` varchar(20) NOT NULL,
  `vehicle_image` varchar(50) NOT NULL,
  `vehicle_detail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `vehicle_number`, `vehicle_type`, `vehicle_name`, `vehicle_image`, `vehicle_detail`) VALUES
(18, 1, 'car', 'Lamborghini', 'image/vehicle/sd.jpg', 'personal car'),
(19, 2, 'car', 'Baleno', 'image/vehicle/sd.jpg', 'sport car');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
