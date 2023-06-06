-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2023 at 05:33 PM
-- Server version: 10.5.20-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lawsjgfe_cmslawyer`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_tb`
--

CREATE TABLE `client_tb` (
  `Client_id` int(11) NOT NULL,
  `Client_name` varchar(100) NOT NULL,
  `C_contact` varchar(100) NOT NULL,
  `Case_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emailtb`
--

CREATE TABLE `emailtb` (
  `id` int(11) NOT NULL,
  `to` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `sms` varchar(1000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emailtb`
--

INSERT INTO `emailtb` (`id`, `to`, `subject`, `sms`, `date`) VALUES
(6, 'aliyankhan6446@gmail.com', 'Test', '                      \r\n                    44t', '2023-06-06 16:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `events_tb`
--

CREATE TABLE `events_tb` (
  `event_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `events_tb`
--

INSERT INTO `events_tb` (`event_id`, `user_id`, `title`, `date`, `description`) VALUES
(2, 41, '$title', '0000-00-00', '$description'),
(3, 41, '$title', '0000-00-00', '$description'),
(11, 43, 'OOAD Evaluation', '2023-06-07', 'Tomorrow Morining'),
(12, 43, 'OOAD Evaluation', '2023-06-07', 'Tomorrow Morining'),
(13, 43, 'OOAD Evaluation', '2023-06-07', 'Tomorrow Morining'),
(14, 43, 'OOAD Evaluation', '2023-06-07', 'Tomorrow Morining'),
(15, 43, 'OOAD Evaluation', '2023-06-07', 'Tomorrow Morining');

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `User_id` int(11) NOT NULL,
  `User_Email` varchar(150) NOT NULL,
  `Area_of_Law` varchar(1000) NOT NULL,
  `User_Password` varchar(255) NOT NULL,
  `verification_code` varchar(100) NOT NULL,
  `username` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`User_id`, `User_Email`, `Area_of_Law`, `User_Password`, `verification_code`, `username`) VALUES
(41, 'syedadnanalibhatti@gmail.com', '', '$2y$10$ZFnxByAjRbPCFoHvMALYSuht8OkmNtAqY5rQXCq.JAYjo9vItDb8C', 'Verified', 'AdnanAli'),
(42, 'rizvihamza34@gmail.com', '', '$2y$10$racwXjmTwXSurVMCdfOjeOmxymwhR.WPMWLjNFm0QRzK.pWjIvtz2', '15207', 'hamzawajeeh'),
(43, 'hamzaahmedwajeeh@gmail.com', '', '$2y$10$NKmDhfqPUh9RKK8SyAaD0ehsx2lEwnZv5TXLZvlHyQf0InZrA4kSW', 'Verified', 'hamzaahmed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_tb`
--
ALTER TABLE `client_tb`
  ADD PRIMARY KEY (`Client_id`);

--
-- Indexes for table `emailtb`
--
ALTER TABLE `emailtb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_tb`
--
ALTER TABLE `events_tb`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_tb`
--
ALTER TABLE `client_tb`
  MODIFY `Client_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emailtb`
--
ALTER TABLE `emailtb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events_tb`
--
ALTER TABLE `events_tb`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events_tb`
--
ALTER TABLE `events_tb`
  ADD CONSTRAINT `events_tb_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_tb` (`User_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
