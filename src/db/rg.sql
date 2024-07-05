-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2024 at 02:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rg`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `emp_name` varchar(50) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `proof` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_name`, `designation`, `dob`, `doj`, `blood_group`, `mobile`, `email`, `address`, `proof`, `created_at`, `updated_on`) VALUES
(1, 'John Doe', 'Software Engineer', '1985-05-15', '2010-04-20', 'O+', '1234567890', 'johndoe@example.com', '123 Main St, City, Country', '6687c54ddcf27.png', '2024-07-05 11:43:01', '2024-07-05 10:57:40'),
(2, 'Jane Smith', 'Project Manager', '1982-08-30', '2008-11-15', 'A+', '2345678901', 'janesmith@example.com', '456 Elm St, City, Country', '6687c54ddcf27.png', '2024-07-05 11:43:30', '2024-07-05 10:57:40'),
(3, 'Alice Johnson', 'Data Analyst', '1990-12-12', '2015-06-01', 'B+', '3456789012', 'alicejohnson@example.com', '789 Maple St, City, Country', '6687c54ddcf27.png', '2024-07-05 11:43:30', '2024-07-05 10:57:40'),
(4, 'Bob Brown', 'DevOps Engineer', '1988-07-23', '2012-09-17', 'AB-', '4567890123', 'bobbrown@example.com', '101 Pine St, City, Country', '6687c54ddcf27.png', '2024-07-05 11:43:30', '2024-07-05 10:57:40'),
(5, 'Carol White', 'HR Manager', '1975-03-08', '2005-02-25', 'O-', '5678901234', 'carolwhite@example.com', '202 Birch St, City, Country', '6687c54ddcf27.png', '2024-07-05 11:43:30', '2024-07-05 10:57:40'),
(6, 'David Green', 'System Administrator', '1987-01-20', '2011-07-10', 'B-', '6789012345', 'davidgreen@example.com', '303 Cedar St, City, Country', '6687c54ddcf27.png', '2024-07-05 11:43:30', '2024-07-05 10:57:40'),
(7, 'Emma Brown', 'Business Analyst', '1992-04-14', '2016-08-22', 'A-', '7890123456', 'emmabrown@example.com', '404 Walnut St, City, Country', '6687c54ddcf27.png', '2024-07-05 11:43:30', '2024-07-05 10:57:40'),
(8, 'Frank Harris', 'Marketing Manager', '1983-09-11', '2009-03-18', 'O+', '8901234567', 'frankharris@example.com', '505 Oak St, City, Country', '6687c54ddcf27.png', '2024-07-05 11:43:30', '2024-07-05 10:57:40'),
(9, 'Grace Lee', 'Accountant', '1991-11-19', '2013-12-05', 'B+', '9012345678', 'gracelee@example.com', '606 Spruce St, City, Country', '6687c54ddcf27.png', '2024-07-05 11:43:30', '2024-07-05 10:57:40'),
(10, 'Henry Clark', 'Network Engineer', '1986-02-22', '2010-05-23', 'AB+', '0123456789', 'henryclark@example.com', '707 Redwood St, City, Country', '6687c54ddcf27.png', '2024-07-05 11:43:30', '2024-07-05 10:57:40'),
(11, 'Ivy Scott', 'UI/UX Designers', '1993-06-18', '2017-10-14', 'O-', '1234567890', 'ivyscott@example.com', '808 Aspen St, City, Country', '', '2024-07-05 12:10:13', '2024-07-05 10:57:40'),
(12, 'Jack Wilson', 'Database Administrator', '1984-04-28', '2011-11-21', 'A+', '2345678901', 'jackwilson@example.com', '909 Willow St, City, Country', '6687c54ddcf27.png', '2024-07-05 11:43:30', '2024-07-05 10:57:40'),
(13, 'Kate Martinez', 'Product Manager', '1987-12-05', '2012-06-11', 'B-', '3456789012', 'katemartinez@example.com', '1010 Chestnut St, City, Country', '6687c54ddcf27.png', '2024-07-05 11:43:30', '2024-07-05 10:57:40'),
(14, 'Leo Walker', 'Technical Support', '1990-01-15', '2015-07-30', 'O+', '4567890123', 'leowalker@example.com', '1111 Ash St, City, Country', '6687c54ddcf27.png', '2024-07-05 11:43:30', '2024-07-05 10:57:40'),
(15, 'Mia Young', 'Content Writer', '1989-03-20', '2014-04-01', 'A-', '5678901234', 'miayoung@example.com', '1212 Alder St, City, Country', '6687c54ddcf27.png', '2024-07-05 11:43:30', '2024-07-05 10:57:40'),
(16, 'Noah King', 'Sales Manager', '1986-07-09', '2008-08-27', 'B+', '6789012345', 'noahking@example.com', '1313 Fir St, City, Country', '6687c54ddcf27.png', '2024-07-05 11:43:30', '2024-07-05 10:57:40'),
(17, 'Olivia Perez', 'Graphic Designer', '1994-10-13', '2018-09-03', 'AB-', '7890123456', 'oliviaperez@example.com', '1414 Beech St, City, Country', '6687c54ddcf27.png', '2024-07-05 11:43:30', '2024-07-05 10:57:40'),
(18, 'Ivy Scott', 'UI/UX Designers', '1993-06-18', '2017-10-14', 'O-', '1234567890', 'ivyscott@example.com', '808 Aspen St, City, Country', '', '2024-07-05 12:09:52', '2024-07-05 12:09:52'),
(19, 'Kumar S', 'MD', '2024-12-31', '2024-12-31', 'AB-', '7896321450', 'kumar@gmail.com', 'Hydrabad', '6687e379347c0.png', '2024-07-05 12:17:43', '2024-07-05 12:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` enum('Super Admin','Admin','User') NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `dob` date NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `is_approved` int(10) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `mobile`, `email`, `password`, `address`, `gender`, `dob`, `profile_picture`, `signature`, `is_approved`, `created_at`, `updated_on`) VALUES
(2, 'Admin', 'Admin', '7984765466', 'admin', '123', 'sdfsd', 'male', '2024-07-01', NULL, NULL, 0, '2024-07-04 15:00:29', '2024-07-04 00:00:00'),
(4, 'Super Admin', 'Super Admin', '8465464', 'super', '123', 'sdfsdf', 'male', '2024-07-17', '6687c54ddcf27.png', '', 0, '2024-07-04 17:35:35', '2024-07-04 23:05:35'),
(5, 'Arun', 'User', '7502263833', 'arun@gmail.com', '123', 'Check', 'male', '2024-07-13', NULL, NULL, 0, '2024-07-05 05:59:35', '2024-07-05 11:29:35'),
(6, 'KkK', 'User', '7896541233', 'asdf@gsf.c', '123', 'sdf', 'male', '0024-04-12', NULL, NULL, 2, '2024-07-05 06:03:22', '2024-07-05 11:33:22'),
(9, 'Kumar', 'User', '8220091100', 'kumar@gmail.com', '123', 'sadf', 'male', '2024-12-31', NULL, NULL, 0, '2024-07-05 08:00:36', '2024-07-05 13:30:36'),
(10, 'Jegan', 'User', '9638527410', 'jegan@gmail.com', '123', 'pondy', 'male', '2024-12-31', NULL, NULL, 1, '2024-07-05 09:59:30', '2024-07-05 15:29:30'),
(11, 'Appu', 'User', '78966541230', 'appu@gmail.com', '123', 'abc', 'male', '2024-12-31', NULL, NULL, 1, '2024-07-05 10:02:32', '2024-07-05 15:32:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
