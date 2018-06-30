-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2018 at 03:01 PM
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
  `sid` varchar(255) NOT NULL,
  `csgt_total` varchar(255) NOT NULL,
  `ssgt_total` varchar(255) NOT NULL,
  `isgt_total` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `frieght_amount` varchar(255) NOT NULL,
  `gst_frieght_amount` varchar(255) NOT NULL,
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
  `mid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_master`
--

INSERT INTO `po_master` (`poid`, `sid`, `csgt_total`, `ssgt_total`, `isgt_total`, `total_amount`, `frieght_amount`, `gst_frieght_amount`, `gross_amount`, `invoice_to`, `contact_name`, `contact_no`, `tandc`, `pocreatedon`, `m_unit`, `qty`, `app_qty`, `unit`, `dtid`, `discount`, `cgst`, `sgst`, `igst`, `total`, `vid`, `remark`, `pocreatedby`, `mid`) VALUES
(1, '1', '', '', '', '', '', '', '', '', '', '', '', '1970-01-01', '2', '65', '65', '5', 'amount', '', '', '', '', '', '', '', '', ''),
(2, '2', '', '', '', '', '', '', '', '', '', '', '', '1970-01-01', '1,2', '1,1', '10,10', '5,10', '2,2', '20,20', '1,1', '1,1', '1,1', '30.900000000000002,82.39999999999999', '4', ',', '', ''),
(3, '2', '', '', '', '', '', '', '', '', '', '', '', '1970-01-01', '1,2', '1,1', '10,10', '50,12', '1,2', '50,10', '1,1', '1,1', '1,1', '463.5,111.24', '4', ',', '', '1,0');

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
  MODIFY `poid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
