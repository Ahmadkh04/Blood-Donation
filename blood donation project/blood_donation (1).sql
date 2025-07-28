-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2025 at 09:18 AM
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
-- Database: `blood_donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_inventory`
--

CREATE TABLE `blood_inventory` (
  `id` int(11) NOT NULL,
  `blood_type` varchar(5) NOT NULL,
  `units_available` int(11) NOT NULL DEFAULT 0,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_inventory`
--

INSERT INTO `blood_inventory` (`id`, `blood_type`, `units_available`, `last_updated`) VALUES
(1, 'A+', 0, '2025-05-18 11:57:00'),
(2, 'A-', 0, '2025-05-18 11:57:00'),
(3, 'B+', 0, '2025-05-18 11:57:00'),
(4, 'B-', 0, '2025-05-18 11:57:00'),
(5, 'AB+', 0, '2025-05-18 11:57:00'),
(6, 'AB-', 0, '2025-05-18 11:57:00'),
(7, 'O+', 0, '2025-05-18 11:57:00'),
(8, 'O-', 0, '2025-05-18 11:57:00'),
(9, 'A+', 0, '2025-05-18 12:21:11'),
(10, 'A-', 0, '2025-05-18 12:21:11'),
(11, 'B+', 0, '2025-05-18 12:21:11'),
(12, 'B-', 0, '2025-05-18 12:21:11'),
(13, 'AB+', 0, '2025-05-18 12:21:11'),
(14, 'AB-', 0, '2025-05-18 12:21:11'),
(15, 'O+', 0, '2025-05-18 12:21:11'),
(16, 'O-', 0, '2025-05-18 12:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `blood_type` varchar(5) NOT NULL,
  `donation_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `name`, `email`, `phone`, `blood_type`, `donation_date`, `created_at`) VALUES
(1, 'ahmad khatib', 'ahmadelkhatib040@gmail.com', '+96176702286', 'A+', '2025-05-12', '2025-05-18 12:00:22'),
(2, 'Ahmad Khatib', 'ahmadelkhatib040@gmail.com', '+96176702286', 'A+', '2025-05-09', '2025-05-18 13:16:16'),
(3, 'Ahmad Khatib', 'ahmadelkhatib040@gmail.com', '+96176702286', 'A-', '2025-05-09', '2025-05-18 13:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `blood_type` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `blood_type`, `created_at`) VALUES
(1, 'Ahmad Khatib ', 'ahmadelkhatib040@gmail.com', '$2y$10$94l1JlQhCCKpiTZ3Hi1qrOvCQk19Oi/PS7E5HisCaFiajP5NUK6ra', 'A+', '2025-05-18 12:29:41'),
(2, 'Tamer Khatib', 'Tamerkhatib12@gmail.com', '$2y$10$Gbzvg8r0NYQqW49y/fFLV.hTToIr0xWFuZPHH9NPlLTCy0EmL4kv2', 'B+', '2025-05-18 12:45:26'),
(3, 'israa khatib', 'israakhatib@gmail.com', '$2y$10$4wK30hBOsOOx/qWa6wPi.OuBUUqcoI0bpiACZMbuuUXi3/eXohwYW', 'A+', '2025-05-18 12:55:50'),
(4, 'Karim Ali', 'KarimAli@gmail.com', '$2y$10$gquJPQi4j41V9O2drCqQI.X/k6iTPVcq7ieYHKC0xvffZ30Ho2hsm', 'AB+', '2025-05-19 06:12:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_inventory`
--
ALTER TABLE `blood_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
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
-- AUTO_INCREMENT for table `blood_inventory`
--
ALTER TABLE `blood_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
