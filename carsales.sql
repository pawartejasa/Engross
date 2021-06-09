-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2020 at 10:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carsales`
--

-- --------------------------------------------------------

--
-- Table structure for table `cardata`
--

CREATE TABLE `cardata` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cardata`
--

INSERT INTO `cardata` (`id`, `brand`, `color`, `address`, `price`) VALUES
(103, 'Honda', 'Black', 'Sydney', 650),
(104, 'Honda', 'Red', 'Sydney', 5000),
(105, 'Suzuki', 'Black', 'Perth', 900),
(106, 'Ford', 'Black', 'Perth', 900),
(107, 'Audi', 'Green', 'Wollongong', 600),
(108, 'Audi', 'Blue', 'Thirrout', 600),
(109, 'Suzuki', 'Black', 'Sydney', 456),
(110, 'Honda', 'Blue', 'Mascot', 900),
(111, 'Honda', 'Red', 'Sydney', 680),
(112, 'Honda', 'Red', 'Perth', 960),
(114, 'Honda', 'Red', 'Sydney', 980);

-- --------------------------------------------------------

--
-- Table structure for table `logreports`
--

CREATE TABLE `logreports` (
  `logid` int(11) NOT NULL,
  `carid` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `record` text NOT NULL,
  `datetime` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logreports`
--

INSERT INTO `logreports` (`logid`, `carid`, `status`, `record`, `datetime`) VALUES
(14, 103, 'Record Updated', 'Tata Black', '2020-05-30'),
(15, 2, 'Record Added', 'Honda Red', '2020-05-30'),
(16, 3, 'Record Added', 'Suzuki Black', '2020-05-30'),
(17, 4, 'Record Added', 'Ford Black', '2020-05-30'),
(18, 5, 'Record Added', 'Audi Green', '2020-05-30'),
(19, 6, 'Record Added', 'Audi Blue', '2020-05-30'),
(20, 7, 'Record Added', 'Suzuki Black', '2020-05-30'),
(21, 8, 'Record Added', 'Honda Blue', '2020-05-30'),
(22, 103, 'Record Updated', 'Audi Black', '2020-05-30'),
(23, 9, 'Record Added', 'Honda Red', '2020-05-31'),
(24, 10, 'Record Added', 'Honda Red', '2020-06-01'),
(25, 11, 'Record Added', 'Honda Red', '2020-06-01'),
(26, 103, 'Record Updated', 'Honda Black', '2020-06-01'),
(27, 113, 'Record Updated', 'Honda', '2020-06-01'),
(28, 11, 'Record Added', 'Honda Red', '2020-06-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cardata`
--
ALTER TABLE `cardata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logreports`
--
ALTER TABLE `logreports`
  ADD PRIMARY KEY (`logid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cardata`
--
ALTER TABLE `cardata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `logreports`
--
ALTER TABLE `logreports`
  MODIFY `logid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
