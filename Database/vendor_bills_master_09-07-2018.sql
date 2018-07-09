-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2018 at 05:00 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `construction`
--

-- --------------------------------------------------------

--
-- Table structure for table `vendor_bills_master`
--

CREATE TABLE `vendor_bills_master` (
  `id` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `order_index` longtext NOT NULL,
  `csgt_total` float(10,2) NOT NULL,
  `ssgt_total` float(10,2) NOT NULL,
  `isgt_total` float(10,2) NOT NULL,
  `total_amount` float(10,2) NOT NULL,
  `frieght_amount` float(10,2) NOT NULL,
  `frieght_gst` float(10,2) NOT NULL,
  `gross_amount` float(10,2) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `bill_date` date NOT NULL,
  `bill_type` varchar(255) NOT NULL,
  `invoice_to` varchar(255) NOT NULL,
  `pocreatedon` date DEFAULT NULL,
  `payment_days` int(11) NOT NULL,
  `vbremarks` text NOT NULL,
  `date` date NOT NULL,
  `unit` longtext NOT NULL,
  `cgst` longtext NOT NULL,
  `sgst` longtext NOT NULL,
  `igst` longtext NOT NULL,
  `total` longtext NOT NULL,
  `remark` longtext NOT NULL,
  `status` longtext NOT NULL,
  `u_status` enum('Approved','Disapprove') NOT NULL DEFAULT 'Disapprove',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vendor_bills_master`
--
ALTER TABLE `vendor_bills_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vendor_bills_master`
--
ALTER TABLE `vendor_bills_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
