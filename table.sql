-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 12, 2026 at 07:54 AM
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
-- Database: `auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbcookie`
--

CREATE TABLE `tbcookie` (
  `user_id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `gender` enum('male','female') DEFAULT 'male',
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbcookie`
--

INSERT INTO `tbcookie` (`user_id`, `username`, `gender`, `email`, `password`, `profile`, `role`) VALUES
(1, 'vinakKH', 'male', 'sokphari8@gmail.com', '$2y$10$UGPUWIelGy2DMGlxFQBXxOVs0LWLmLDJeJkcet66cPgolqGc7cKvS', NULL, 'user'),
(2, 'sreyNeangKH', 'female', 'sokphari8@gmail.com', '$2y$10$1LZaZ6LFdfO2PLcW7z5Cg.QdKehHerpBtOTdCV20sncQli7l2SVDC', NULL, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbcookie`
--
ALTER TABLE `tbcookie`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbcookie`
--
ALTER TABLE `tbcookie`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
