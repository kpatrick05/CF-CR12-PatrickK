-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2021 at 11:52 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fswd13_cr12_mount_everest_patrickk`
--
CREATE DATABASE IF NOT EXISTS `fswd13_cr12_mount_everest_patrickk` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fswd13_cr12_mount_everest_patrickk`;

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(10) UNSIGNED NOT NULL,
  `picture` varchar(255) NOT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `picture`, `location_name`, `price`, `description`, `longitude`, `latitude`) VALUES
(4, '6128b2e909d76.jpg', 'New York', '1100 €', 'Big Apple', '40.714580690463826', '-74.01470685769677'),
(5, '6128c407cfbde.jpg', 'Vienna', '330 €', 'Lovely City', '48.23232858830514', '16.3871672614334'),
(9, '6128e8f0ccebd.jpg', 'Malta', '689 €', 'Island in the Ocean', '35.883419819828134', '14.44632046105227'),
(10, '6128ebf3eae45.jpg', 'Miami', '1050 €', 'Beuatiful sunset in Miami', '25.762912947905892', '-80.19444160788483'),
(11, '6128ecca92724.jpg', 'Oslo', '479 €', 'Explore the North', '59.91581650395144', '10.7528397200776'),
(14, '612a03d5028fa.jpg', 'Madrid', '410 €', 'Capital City of Spain', '40.424803176914', '-3.706322790607522'),
(16, '612a0556387ca.jpg', 'London', '489 €', 'A week in London with full view', '51.51531377744017', '-0.12632380490574385');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
