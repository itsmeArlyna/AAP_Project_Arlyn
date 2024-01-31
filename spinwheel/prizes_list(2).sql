-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 06:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spin_the_wheel`
--

-- --------------------------------------------------------

--
-- Table structure for table `prizes_list`
--

CREATE TABLE `prizes_list` (
  `prize_id` int(11) NOT NULL,
  `prize_name` varchar(50) NOT NULL,
  `prize_code` varchar(50) NOT NULL,
  `prize_number` int(11) NOT NULL,
  `prize_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prizes_list`
--

INSERT INTO `prizes_list` (`prize_id`, `prize_name`, `prize_code`, `prize_number`, `prize_status`) VALUES
(1, 'IPHONE 15', 'Iphone 15', 0, 'ACTIVE'),
(2, 'AIRPODS (2ND GEN)', 'Airpods', 0, 'ACTIVE'),
(3, 'NESPRESSO', 'Nespresso Machine', 0, 'ACTIVE'),
(4, 'ICE MAKER', 'Ice maker', 0, 'ACTIVE'),
(5, '3K GAS VOUCHER FROM CALTEX', '3k Gas Voucher', 0, 'ACTIVE'),
(6, 'BLUETOOTH SPEAKER', 'Bluetooth Speaker', 0, 'ACTIVE'),
(7, 'GIFT CERTIFICATE WORTH 1K FROM SM', 'Gift Certificate', 0, 'ACTIVE'),
(8, 'SAMSUNG GALAXY A24', 'Samsung Galaxy', 0, 'ACTIVE'),
(9, 'INSTAX', 'Instax', 0, 'ACTIVE'),
(10, 'AGUILA AUTO GLASS GIFT VOUCHER', 'Aguila Glass', 0, 'ACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prizes_list`
--
ALTER TABLE `prizes_list`
  ADD PRIMARY KEY (`prize_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prizes_list`
--
ALTER TABLE `prizes_list`
  MODIFY `prize_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
