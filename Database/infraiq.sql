-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2018 at 11:11 AM
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
  `mrid` int(100) NOT NULL,
  `sid` varchar(2550) NOT NULL,
  `mid` varchar(2550) NOT NULL,
  `mrqty` varchar(2550) NOT NULL,
  `mrunitprice` varchar(2550) NOT NULL,
  `mrrefid` varchar(2550) NOT NULL,
  `muid` varchar(2550) NOT NULL,
  `mrremarks` varchar(2550) NOT NULL,
  `mrrecievedate` date NOT NULL,
  `mrcreatedon` datetime NOT NULL,
  `mrcreatedby` varchar(255) NOT NULL,
  `mrupdatedby` varchar(100) NOT NULL,
  `mrupdatedon` datetime NOT NULL,
  `uid` varchar(50) NOT NULL,
  `mrapprove` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_rqst`
--

INSERT INTO `material_rqst` (`mrid`, `sid`, `mid`, `mrqty`, `mrunitprice`, `mrrefid`, `muid`, `mrremarks`, `mrrecievedate`, `mrcreatedon`, `mrcreatedby`, `mrupdatedby`, `mrupdatedon`, `uid`, `mrapprove`) VALUES
(2104, '1', '3420', '', '', 'MR/2018/office1', '', '', '1970-01-01', '2018-08-12 14:40:05', 'varunbhandia', 'varunbhandia', '2018-08-12 14:40:59', '', '');

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
  MODIFY `mrid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2105;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
