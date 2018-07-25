-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2018 at 08:59 AM
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
-- Table structure for table `po_master`
--

CREATE TABLE `po_master` (
  `poid` int(11) NOT NULL,
  `mrrefid` varchar(255) NOT NULL,
  `porefid` varchar(50) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `csgt_total` varchar(255) NOT NULL,
  `ssgt_total` varchar(255) NOT NULL,
  `isgt_total` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `frieght_amount` varchar(255) NOT NULL,
  `gross_amount` varchar(255) NOT NULL,
  `invoice_to` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `tandc` varchar(255) NOT NULL,
  `pocreatedon` date NOT NULL,
  `m_unit` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `app_qty` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `dtid` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `cgst` varchar(255) NOT NULL,
  `sgst` varchar(255) NOT NULL,
  `igst` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `vid` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `pocreatedby` varchar(255) NOT NULL,
  `mid` varchar(255) NOT NULL,
  `uid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_master`
--

INSERT INTO `po_master` (`poid`, `mrrefid`, `porefid`, `sid`, `csgt_total`, `ssgt_total`, `isgt_total`, `total_amount`, `frieght_amount`, `gross_amount`, `invoice_to`, `contact_name`, `contact_no`, `tandc`, `pocreatedon`, `m_unit`, `qty`, `app_qty`, `unit`, `dtid`, `discount`, `cgst`, `sgst`, `igst`, `total`, `vid`, `remark`, `pocreatedby`, `mid`, `uid`) VALUES
(1, '', '', '2', '', '', '', '', '', '', '', '', '', '', '1970-01-01', '', '2', '2', '0', '1', '', '', '', '', '', '', '', 'varunbhandia', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `po_master`
--
ALTER TABLE `po_master`
  ADD PRIMARY KEY (`poid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `po_master`
--
ALTER TABLE `po_master`
  MODIFY `poid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
