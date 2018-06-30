-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2018 at 10:15 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infraiq`
--

-- --------------------------------------------------------

--
-- Table structure for table `material_rqst`
--

CREATE TABLE `material_rqst` (
  `mrid` int(11) NOT NULL,
  `sid` varchar(50) NOT NULL,
  `mid` varchar(50) NOT NULL,
  `mrqty` varchar(50) NOT NULL,
  `mrunitprice` varchar(50) NOT NULL,
  `mrrefid` varchar(50) NOT NULL,
  `muid` varchar(50) NOT NULL,
  `mrremarks` varchar(2550) NOT NULL,
  `mrcreatedon` date NOT NULL,
  `mrcreatedby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `material_rqst`
--
ALTER TABLE `material_rqst`
  ADD PRIMARY KEY (`mrid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `material_rqst`
--
ALTER TABLE `material_rqst`
  MODIFY `mrid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
