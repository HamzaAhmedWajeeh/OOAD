-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 28, 2023 at 04:18 PM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20546600_cms_lawyer`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `User_id` int(11) NOT NULL,
  `User_Email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Area_of_Law` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `User_Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verification_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(80) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`User_id`, `User_Email`, `Area_of_Law`, `User_Password`, `verification_code`, `username`) VALUES
(1, '$email', '$selectedOptions', '$hashedPassword', '$verificationCode', '$username'),
(2, 'syedadnanalibhatti@gmail.com', '', '$2y$10$MLivSTj2wblPF2l7RB2tyOcmZIdXoDDP5jnP/RN0AOsv.fEc6jzru', 'Adnan Ali9403', 'Adnan Ali'),
(3, '', '', '$2y$10$rqAb3Mm9/ZX7xpPerbGjYubwonD2Jx09sLkTWn6wlbeYNnKUrxnla', '3234', ''),
(5, 'aliyankhan6446@gmail.com', '', '$2y$10$i5St5xZeea6bEsjlGNH5f.IzUwws4AR/g1WmgVKNXZTa/3xdQTQjO', '7635', 'Adnan Ali 12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
