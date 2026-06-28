-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 28, 2026 at 08:33 AM
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
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbcustomer`
--

CREATE TABLE `tbcustomer` (
  `cus_id` tinyint(4) NOT NULL,
  `name` varchar(60) NOT NULL,
  `gender` enum('male','female') DEFAULT 'male',
  `address` varchar(100) NOT NULL,
  `is_active` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbcustomer`
--

INSERT INTO `tbcustomer` (`cus_id`, `name`, `gender`, `address`, `is_active`) VALUES
(1, 'cheam sok', 'male', 'KPC', 0),
(2, 'Dara sok', 'female', 'BMC', 0),
(3, 'chantha sok', 'male', 'PP', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tborders`
--

CREATE TABLE `tborders` (
  `id` smallint(6) NOT NULL,
  `product` varchar(60) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `cus_id` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tborders`
--

INSERT INTO `tborders` (`id`, `product`, `price`, `cus_id`) VALUES
(1, 'Monitor', 1200.00, 2),
(2, 'Mouse', 29.00, 1),
(3, 'Key board', 50.00, 3),
(4, 'key board bluetooth', 100.00, 2),
(5, 'Mouse Wireless', 20.00, 1),
(6, 'Desktop', 40.00, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbcustomer`
--
ALTER TABLE `tbcustomer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `tborders`
--
ALTER TABLE `tborders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbcustomer`
--
ALTER TABLE `tbcustomer`
  MODIFY `cus_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tborders`
--
ALTER TABLE `tborders`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tborders`
--
ALTER TABLE `tborders`
  ADD CONSTRAINT `tborders_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `tbcustomer` (`cus_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
