-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2023 at 04:11 PM
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
-- Database: `id20798358_cms`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emailtb`
--

INSERT INTO `emailtb` (`id`, `to`, `subject`, `sms`, `date`) VALUES
(5, 'smateeb208@gmail.com', 'Mustafa Ali Asghar', 'hello', '2023-05-24 05:25:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emailtb`
--
ALTER TABLE `emailtb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emailtb`
--
ALTER TABLE `emailtb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
