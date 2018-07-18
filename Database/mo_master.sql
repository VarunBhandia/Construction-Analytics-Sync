-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2018 at 07:58 AM
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
-- Table structure for table `mo_master`
--

CREATE TABLE `mo_master` (
  `moid` int(10) NOT NULL,
  `morefid` varchar(50) NOT NULL,
  `tsid` varchar(100) NOT NULL,
  `rsid` varchar(50) NOT NULL,
  `mid` varchar(50) NOT NULL,
  `modate` date NOT NULL,
  `mochallan` varchar(255) NOT NULL,
  `moqty` varchar(50) NOT NULL,
  `movehicle` varchar(100) NOT NULL,
  `tid` varchar(50) NOT NULL,
  `moremark` varchar(100) NOT NULL,
  `mocreatedon` datetime NOT NULL,
  `mocreatedby` varchar(50) NOT NULL,
  `uid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mo_master`
--

INSERT INTO `mo_master` (`moid`, `morefid`, `tsid`, `rsid`, `mid`, `modate`, `mochallan`, `moqty`, `movehicle`, `tid`, `moremark`, `mocreatedon`, `mocreatedby`, `uid`) VALUES
(4, '', '1', '2', '2,1', '2018-07-18', ',', ',', ',', ',', ',', '0000-00-00 00:00:00', 'varunbhandia', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mo_master`
--
ALTER TABLE `mo_master`
  ADD PRIMARY KEY (`moid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mo_master`
--
ALTER TABLE `mo_master`
  MODIFY `moid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
