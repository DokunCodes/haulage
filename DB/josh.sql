-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 06, 2021 at 02:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `josh`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(20) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `height` int(5) NOT NULL,
  `width` int(5) NOT NULL,
  `depth` int(5) NOT NULL,
  `weight` int(5) NOT NULL,
  `description` varchar(250) NOT NULL,
  `pickup` varchar(250) NOT NULL,
  `pickup_lat` varchar(100) DEFAULT NULL,
  `pickup_lng` varchar(100) DEFAULT NULL,
  `destination` varchar(250) NOT NULL,
  `destination_lat` varchar(100) DEFAULT NULL,
  `destination_lng` varchar(100) DEFAULT NULL,
  `package` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `fullname`, `email`, `phone`, `height`, `width`, `depth`, `weight`, `description`, `pickup`, `pickup_lat`, `pickup_lng`, `destination`, `destination_lat`, `destination_lng`, `package`, `created_at`) VALUES
('2185311075', 'Durosinmi', 'dupe@yahoo.com', '0893738399', 67, 5, 56, 78, 'Package', 'Ogudu GRA Estate, Lagos, Nigeria', '6.574910699999998', '3.3918106', 'Ikoyi Club 1938, Ikoyi Lagos, Ikoyi Club 1938 Road, Lagos, Nigeria', '6.4513998', '3.428329', 'cost*0.9', '2021-07-06 12:35:28'),
('3705560304', 'Adedokun Seyi', 'adedokunoluwaseyi@gmail.com', '08089236423', 34, 12, 5, 67, 'Iphone', 'Lagos, Nigeria', '6.5243793', '3.3792057', 'Abuja, Nigeria', '9.0764785', '7.398574', 'cost + 25', '2021-07-05 14:56:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD UNIQUE KEY `order_id` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
