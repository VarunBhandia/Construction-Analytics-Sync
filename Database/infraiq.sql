-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2018 at 08:46 PM
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(10) NOT NULL,
  `cname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`) VALUES
(1, 'Earth Work'),
(2, 'Concreting'),
(3, 'Shuttering'),
(4, 'Reinforced Steel'),
(5, 'cname'),
(6, 'Wood'),
(7, 'Structural Steel'),
(8, 'Flooring'),
(9, 'Finishing'),
(10, 'Electric Item'),
(11, 'Site Items'),
(12, 'Plumbing/Sanitary'),
(13, 'Roofing/Water Proofing'),
(14, 'Hardware Items'),
(15, 'Miscl. Items'),
(16, 'Stationery Items'),
(17, 'Building Material');

-- --------------------------------------------------------

--
-- Table structure for table `consumption`
--

CREATE TABLE `consumption` (
  `consid` int(11) NOT NULL,
  `sid` varchar(10) NOT NULL,
  `mid` varchar(50) NOT NULL,
  `muid` varchar(50) NOT NULL,
  `consqty` varchar(50) NOT NULL,
  `consunitprice` varchar(50) NOT NULL,
  `consremark` varchar(2550) NOT NULL,
  `conscreatedby` varchar(255) NOT NULL,
  `conscreatedon` datetime NOT NULL,
  `consissuedate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumption`
--

INSERT INTO `consumption` (`consid`, `sid`, `mid`, `muid`, `consqty`, `consunitprice`, `consremark`, `conscreatedby`, `conscreatedon`, `consissuedate`) VALUES
(1, '1', '3,1', '1,3', '444,111', '42342,132343434', '42342,34356657', '', '0000-00-00 00:00:00', '2018-06-04 00:00:00'),
(0, '2', '2', '1', '89', '35435', '532352', '', '0000-00-00 00:00:00', '2018-06-19 00:00:00'),
(0, '1', '3', '1', '', '', '', '', '0000-00-00 00:00:00', '2018-06-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cp_master`
--

CREATE TABLE `cp_master` (
  `cpid` int(5) NOT NULL,
  `cprefid` varchar(50) NOT NULL,
  `sid` int(5) NOT NULL,
  `vid` int(5) NOT NULL,
  `cppurchasedate` date NOT NULL,
  `cpchallan` varchar(50) NOT NULL,
  `mid` varchar(50) NOT NULL,
  `muid` varchar(50) NOT NULL,
  `cpunitprice` varchar(50) NOT NULL,
  `cplinechallan` varchar(50) NOT NULL,
  `cpremark` varchar(2550) NOT NULL,
  `cpcreatedon` datetime(6) NOT NULL,
  `cpcreatedby` varchar(50) NOT NULL,
  `cpqty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cp_master`
--

INSERT INTO `cp_master` (`cpid`, `cprefid`, `sid`, `vid`, `cppurchasedate`, `cpchallan`, `mid`, `muid`, `cpunitprice`, `cplinechallan`, `cpremark`, `cpcreatedon`, `cpcreatedby`, `cpqty`) VALUES
(1, '', 1, 4, '2018-06-01', '12', '1', '1', '', '', 'sddqsdqd', '0000-00-00 00:00:00.000000', '', '12');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT '',
  `city` varchar(50) NOT NULL DEFAULT '',
  `country` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `FirstName`, `LastName`, `phone`, `address`, `city`, `country`) VALUES
(1, 'Carine ', 'Schmitt', '40.32.2555', '54, rue Royale', 'Nantes', 'France'),
(2, 'Jean', 'King', '7025551838', '8489 Strong St.', 'Las Vegas', 'USA'),
(3, 'Peter', 'Ferguson', '03 9520 4555', '636 St Kilda Road', 'Melbourne', 'Australia'),
(4, 'Janine ', 'Labrune', '40.67.8555', '67, rue des Cinquante Otages', 'Nantes', 'France'),
(5, 'Jonas ', 'Bergulfsen', '07-98 9555', 'Erling Skakkes gate 78', 'Stavern', 'Norway'),
(6, 'Susan', 'Nelson', '4155551450', '5677 Strong St.', 'San Rafael', 'USA'),
(7, 'Zbyszek ', 'Piestrzeniewicz', '(26) 642-7555', 'ul. Filtrowa 68', 'Warszawa', 'Poland'),
(8, 'Roland', 'Keitel', '+49 69 66 90 2555', 'Lyonerstr. 34', 'Frankfurt', 'Germany'),
(9, 'Julie', 'Murphy', '6505555787', '5557 North Pendale Street', 'San Francisco', 'USA'),
(10, 'Kwai', 'Lee', '2125557818', '897 Long Airport Avenue', 'NYC', 'USA'),
(11, 'Diego ', 'Freyre', '(91) 555 94 44', 'C/ Moralzarzal, 86', 'Madrid', 'Spain'),
(12, 'Christina ', 'Berglund', '0921-12 3555', 'Berguvsvägen  8', 'Luleå', 'Sweden'),
(13, 'Jytte ', 'Petersen', '31 12 3555', 'Vinbæltet 34', 'Kobenhavn', 'Denmark'),
(14, 'Mary ', 'Saveley', '78.32.5555', '2, rue du Commerce', 'Lyon', 'France'),
(15, 'Eric', 'Natividad', '+65 221 7555', 'Bronz Sok.', 'Singapore', 'Singapore'),
(16, 'Jeff', 'Young', '2125557413', '4092 Furth Circle', 'NYC', 'USA'),
(17, 'Kelvin', 'Leong', '2155551555', '7586 Pompton St.', 'Allentown', 'USA'),
(18, 'Juri', 'Hashimoto', '6505556809', '9408 Furth Circle', 'Burlingame', 'USA'),
(19, 'Wendy', 'Victorino', '+65 224 1555', '106 Linden Road Sandown', 'Singapore', 'Singapore'),
(20, 'Veysel', 'Oeztan', '+47 2267 3215', 'Brehmen St. 121', 'Bergen', 'Norway  '),
(21, 'Keith', 'Franco', '2035557845', '149 Spinnaker Dr.', 'New Haven', 'USA'),
(22, 'Isabel ', 'de Castro', '(1) 356-5555', 'Estrada da saúde n. 58', 'Lisboa', 'Portugal'),
(23, 'Martine ', 'Rancé', '20.16.1555', '184, chaussée de Tournai', 'Lille', 'France'),
(24, 'Marie', 'Bertrand', '(1) 42.34.2555', '265, boulevard Charonne', 'Paris', 'France'),
(25, 'Jerry', 'Tseng', '6175555555', '4658 Baden Av.', 'Cambridge', 'USA'),
(26, 'Julie', 'King', '2035552570', '25593 South Bay Ln.', 'Bridgewater', 'USA'),
(27, 'Mory', 'Kentary', '+81 06 6342 5555', '1-6-20 Dojima', 'Kita-ku', 'Japan'),
(28, 'Michael', 'Frick', '2125551500', '2678 Kingston Rd.', 'NYC', 'USA'),
(29, 'Matti', 'Karttunen', '90-224 8555', 'Keskuskatu 45', 'Helsinki', 'Finland'),
(30, 'Rachel', 'Ashworth', '(171) 555-1555', 'Fauntleroy Circus', 'Manchester', 'UK'),
(31, 'Dean', 'Cassidy', '+353 1862 1555', '25 Maiden Lane', 'Dublin', 'Ireland'),
(32, 'Leslie', 'Taylor', '6175558428', '16780 Pompton St.', 'Brickhaven', 'USA'),
(33, 'Elizabeth', 'Devon', '(171) 555-2282', '12, Berkeley Gardens Blvd', 'Liverpool', 'UK'),
(34, 'Yoshi ', 'Tamuri', '(604) 555-3392', '1900 Oak St.', 'Vancouver', 'Canada'),
(35, 'Miguel', 'Barajas', '6175557555', '7635 Spinnaker Dr.', 'Brickhaven', 'USA'),
(36, 'Julie', 'Young', '6265557265', '78934 Hillside Dr.', 'Pasadena', 'USA'),
(37, 'Brydey', 'Walker', '+612 9411 1555', 'Suntec Tower Three', 'Singapore', 'Singapore'),
(38, 'Frédérique ', 'Citeaux', '88.60.1555', '24, place Kléber', 'Strasbourg', 'France'),
(39, 'Mike', 'Gao', '+852 2251 1555', 'Bank of China Tower', 'Central Hong Kong', 'Hong Kong'),
(40, 'Eduardo ', 'Saavedra', '(93) 203 4555', 'Rambla de Cataluña, 23', 'Barcelona', 'Spain'),
(41, 'Mary', 'Young', '3105552373', '4097 Douglas Av.', 'Glendale', 'USA'),
(42, 'Horst ', 'Kloss', '0372-555188', 'Taucherstraße 10', 'Cunewalde', 'Germany'),
(43, 'Palle', 'Ibsen', '86 21 3555', 'Smagsloget 45', 'Århus', 'Denmark'),
(44, 'Jean ', 'Fresnière', '(514) 555-8054', '43 rue St. Laurent', 'Montréal', 'Canada'),
(45, 'Alejandra ', 'Camino', '(91) 745 6555', 'Gran Vía, 1', 'Madrid', 'Spain'),
(46, 'Valarie', 'Thompson', '7605558146', '361 Furth Circle', 'San Diego', 'USA'),
(47, 'Helen ', 'Bennett', '(198) 555-8888', 'Garden House', 'Cowes', 'UK'),
(48, 'Annette ', 'Roulet', '61.77.6555', '1 rue Alsace-Lorraine', 'Toulouse', 'France'),
(49, 'Renate ', 'Messner', '069-0555984', 'Magazinweg 7', 'Frankfurt', 'Germany'),
(50, 'Paolo ', 'Accorti', '011-4988555', 'Via Monte Bianco 34', 'Torino', 'Italy'),
(51, 'Daniel', 'Da Silva', '+33 1 46 62 7555', '27 rue du Colonel Pierre Avia', 'Paris', 'France'),
(52, 'Daniel ', 'Tonini', '30.59.8555', '67, avenue de l\'Europe', 'Versailles', 'France'),
(53, 'Henriette ', 'Pfalzheim', '0221-5554327', 'Mehrheimerstr. 369', 'Köln', 'Germany'),
(54, 'Elizabeth ', 'Lincoln', '(604) 555-4555', '23 Tsawassen Blvd.', 'Tsawassen', 'Canada'),
(55, 'Peter ', 'Franken', '089-0877555', 'Berliner Platz 43', 'München', 'Germany'),
(56, 'Anna', 'O\'Hara', '02 9936 8555', '201 Miller Street', 'North Sydney', 'Australia'),
(57, 'Giovanni ', 'Rovelli', '035-640555', 'Via Ludovico il Moro 22', 'Bergamo', 'Italy'),
(58, 'Adrian', 'Huxley', '+61 2 9495 8555', 'Monitor Money Building', 'Chatswood', 'Australia'),
(59, 'Marta', 'Hernandez', '6175558555', '39323 Spinnaker Dr.', 'Cambridge', 'USA'),
(60, 'Ed', 'Harrison', '+41 26 425 50 01', 'Rte des Arsenaux 41 ', 'Fribourg', 'Switzerland'),
(61, 'Mihael', 'Holz', '0897-034555', 'Grenzacherweg 237', 'Genève', 'Switzerland'),
(62, 'Jan', 'Klaeboe', '+47 2212 1555', 'Drammensveien 126A', 'Oslo', 'Norway  '),
(63, 'Bradley', 'Schuyler', '+31 20 491 9555', 'Kingsfordweg 151', 'Amsterdam', 'Netherlands'),
(64, 'Mel', 'Andersen', '030-0074555', 'Obere Str. 57', 'Berlin', 'Germany'),
(65, 'Pirkko', 'Koskitalo', '981-443655', 'Torikatu 38', 'Oulu', 'Finland'),
(66, 'Catherine ', 'Dewey', '(02) 5554 67', 'Rue Joseph-Bens 532', 'Bruxelles', 'Belgium'),
(67, 'Steve', 'Frick', '9145554562', '3758 North Pendale Street', 'White Plains', 'USA'),
(68, 'Wing', 'Huang', '5085559555', '4575 Hillside Dr.', 'New Bedford', 'USA'),
(69, 'Julie', 'Brown', '6505551386', '7734 Strong St.', 'San Francisco', 'USA'),
(70, 'Mike', 'Graham', '+64 9 312 5555', '162-164 Grafton Road', 'Auckland  ', 'New Zealand'),
(71, 'Ann ', 'Brown', '(171) 555-0297', '35 King George', 'London', 'UK'),
(72, 'William', 'Brown', '2015559350', '7476 Moss Rd.', 'Newark', 'USA'),
(73, 'Ben', 'Calaghan', '61-7-3844-6555', '31 Duncan St. West End', 'South Brisbane', 'Australia'),
(74, 'Kalle', 'Suominen', '+358 9 8045 555', 'Software Engineering Center', 'Espoo', 'Finland'),
(75, 'Philip ', 'Cramer', '0555-09555', 'Maubelstr. 90', 'Brandenburg', 'Germany'),
(76, 'Francisca', 'Cervantes', '2155554695', '782 First Street', 'Philadelphia', 'USA'),
(77, 'Jesus', 'Fernandez', '+34 913 728 555', 'Merchants House', 'Madrid', 'Spain'),
(78, 'Brian', 'Chandler', '2155554369', '6047 Douglas Av.', 'Los Angeles', 'USA'),
(79, 'Patricia ', 'McKenna', '2967 555', '8 Johnstown Road', 'Cork', 'Ireland'),
(80, 'Laurence ', 'Lebihan', '91.24.4555', '12, rue des Bouchers', 'Marseille', 'France'),
(81, 'Paul ', 'Henriot', '26.47.1555', '59 rue de l\'Abbaye', 'Reims', 'France'),
(82, 'Armand', 'Kuger', '+27 21 550 3555', '1250 Pretorius Street', 'Hatfield', 'South Africa'),
(83, 'Wales', 'MacKinlay', '64-9-3763555', '199 Great North Road', 'Auckland', 'New Zealand'),
(84, 'Karin', 'Josephs', '0251-555259', 'Luisenstr. 48', 'Münster', 'Germany'),
(85, 'Juri', 'Yoshido', '6175559555', '8616 Spinnaker Dr.', 'Boston', 'USA'),
(86, 'Dorothy', 'Young', '6035558647', '2304 Long Airport Avenue', 'Nashua', 'USA'),
(87, 'Lino ', 'Rodriguez', '(1) 354-2555', 'Jardim das rosas n. 32', 'Lisboa', 'Portugal'),
(88, 'Braun', 'Urs', '0452-076555', 'Hauptstr. 29', 'Bern', 'Switzerland'),
(89, 'Allen', 'Nelson', '6175558555', '7825 Douglas Av.', 'Brickhaven', 'USA'),
(90, 'Pascale ', 'Cartrain', '(071) 23 67 2555', 'Boulevard Tirou, 255', 'Charleroi', 'Belgium'),
(91, 'Georg ', 'Pipps', '6562-9555', 'Geislweg 14', 'Salzburg', 'Austria'),
(92, 'Arnold', 'Cruz', '+63 2 555 3587', '15 McCallum Street', 'Makati City', 'Philippines'),
(93, 'Maurizio ', 'Moroni', '0522-556555', 'Strada Provinciale 124', 'Reggio Emilia', 'Italy'),
(94, 'Akiko', 'Shimamura', '+81 3 3584 0555', '2-2-8 Roppongi', 'Minato-ku', 'Japan'),
(95, 'Dominique', 'Perrier', '(1) 47.55.6555', '25, rue Lauriston', 'Paris', 'France'),
(96, 'Rita ', 'Müller', '0711-555361', 'Adenauerallee 900', 'Stuttgart', 'Germany'),
(97, 'Sarah', 'McRoy', '04 499 9555', '101 Lambton Quay', 'Wellington', 'New Zealand'),
(98, 'Michael', 'Donnermeyer', ' +49 89 61 08 9555', 'Hansastr. 15', 'Munich', 'Germany'),
(99, 'Maria', 'Hernandez', '2125558493', '5905 Pompton St.', 'NYC', 'USA'),
(100, 'Alexander ', 'Feuer', '0342-555176', 'Heerstr. 22', 'Leipzig', 'Germany'),
(101, 'Dan', 'Lewis', '2035554407', '2440 Pompton St.', 'Glendale', 'USA'),
(102, 'Martha', 'Larsson', '0695-34 6555', 'Åkergatan 24', 'Bräcke', 'Sweden'),
(103, 'Sue', 'Frick', '4085553659', '3086 Ingle Ln.', 'San Jose', 'USA'),
(104, 'Roland ', 'Mendel', '7675-3555', 'Kirchgasse 6', 'Graz', 'Austria'),
(105, 'Leslie', 'Murphy', '2035559545', '567 North Pendale Street', 'New Haven', 'USA'),
(106, 'Yu', 'Choi', '2125551957', '5290 North Pendale Street', 'NYC', 'USA'),
(107, 'Martín ', 'Sommer', '(91) 555 22 82', 'C/ Araquil, 67', 'Madrid', 'Spain'),
(108, 'Sven ', 'Ottlieb', '0241-039123', 'Walserweg 21', 'Aachen', 'Germany'),
(109, 'Violeta', 'Benitez', '5085552555', '1785 First Street', 'New Bedford', 'USA'),
(110, 'Carmen', 'Anton', '+34 913 728555', 'c/ Gobelas, 19-1 Urb. La Florida', 'Madrid', 'Spain'),
(111, 'Sean', 'Clenahan', '61-9-3844-6555', '7 Allen Street', 'Glen Waverly', 'Australia'),
(112, 'Franco', 'Ricotti', '+39 022515555', '20093 Cologno Monzese', 'Milan', 'Italy'),
(113, 'Steve', 'Thompson', '3105553722', '3675 Furth Circle', 'Burbank', 'USA'),
(114, 'Hanna ', 'Moos', '0621-08555', 'Forsterstr. 57', 'Mannheim', 'Germany'),
(115, 'Alexander ', 'Semenov', '+7 812 293 0521', '2 Pobedy Square', 'Saint Petersburg', 'Russia'),
(116, 'Raanan', 'Altagar,G M', '+ 972 9 959 8555', '3 Hagalim Blv.', 'Herzlia', 'Israel'),
(117, 'José Pedro ', 'Roel', '(95) 555 82 82', 'C/ Romero, 33', 'Sevilla', 'Spain'),
(118, 'Rosa', 'Salazar', '2155559857', '11328 Douglas Av.', 'Philadelphia', 'USA'),
(119, 'Sue', 'Taylor', '4155554312', '2793 Furth Circle', 'Brisbane', 'USA'),
(120, 'Thomas ', 'Smith', '(171) 555-7555', '120 Hanover Sq.', 'London', 'UK'),
(121, 'Valarie', 'Franco', '6175552555', '6251 Ingle Ln.', 'Boston', 'USA'),
(122, 'Tony', 'Snowden', '+64 9 5555500', 'Arenales 1938 3\'A\'', 'Auckland  ', 'New Zealand');

-- --------------------------------------------------------

--
-- Table structure for table `discount_type`
--

CREATE TABLE `discount_type` (
  `dtid` int(11) NOT NULL,
  `dtname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount_type`
--

INSERT INTO `discount_type` (`dtid`, `dtname`) VALUES
(1, 'Amount'),
(2, 'Percentage');

-- --------------------------------------------------------

--
-- Table structure for table `dropdown_value`
--

CREATE TABLE `dropdown_value` (
  `dropdown_single` varchar(255) NOT NULL,
  `dropdown_multi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dropdown_value`
--

INSERT INTO `dropdown_value` (`dropdown_single`, `dropdown_multi`) VALUES
('Electronics and Comm. Engineering', 'a:3:{i:0;s:1:\"C\";i:1;s:3:\"C++\";i:2;s:6:\"ORACLE\";}');

-- --------------------------------------------------------

--
-- Table structure for table `dyform`
--

CREATE TABLE `dyform` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

CREATE TABLE `employee_info` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_date_of_join` date NOT NULL,
  `emp_address` varchar(255) NOT NULL,
  `emp_mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fruits`
--

CREATE TABLE `fruits` (
  `id` int(10) NOT NULL,
  `fruits_name` varchar(200) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fruits`
--

INSERT INTO `fruits` (`id`, `fruits_name`, `quantity`) VALUES
(1, 'Mango', 20),
(2, 'Pineapple', 50),
(3, 'Apple', 30),
(4, 'Banana', 10),
(5, 'Orange', 25);

-- --------------------------------------------------------

--
-- Table structure for table `grn_master`
--

CREATE TABLE `grn_master` (
  `grnid` int(10) NOT NULL,
  `sid` varchar(10) DEFAULT NULL,
  `vid` varchar(10) DEFAULT NULL,
  `grnchallan` varchar(50) DEFAULT NULL,
  `grnreceivedate` date DEFAULT NULL,
  `grncreatedon` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  `grncreatedby` varchar(50) DEFAULT NULL,
  `mid` varchar(50) DEFAULT NULL,
  `grnqty` varchar(50) DEFAULT NULL,
  `grnunitprice` varchar(50) DEFAULT NULL,
  `muid` varchar(10) DEFAULT NULL,
  `grntruck` varchar(50) DEFAULT NULL,
  `grnlinechallan` varchar(50) DEFAULT NULL,
  `tid` varchar(10) DEFAULT NULL,
  `grnremarks` varchar(2550) DEFAULT NULL,
  `grnrefid` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `import`
--

CREATE TABLE `import` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `first_name` varchar(100) NOT NULL COMMENT 'First Name',
  `last_name` varchar(100) NOT NULL COMMENT 'Last Name',
  `email` varchar(255) NOT NULL COMMENT 'Email Address',
  `dob` varchar(20) NOT NULL COMMENT 'Date of Birth',
  `contact_no` int(11) NOT NULL COMMENT 'Contact No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='datatable demo table';

--
-- Dumping data for table `import`
--

INSERT INTO `import` (`id`, `first_name`, `last_name`, `email`, `dob`, `contact_no`) VALUES
(1, 'Team', 'Tech Arise', 'info@techarise.com', '21-02-2011', 2147483647),
(2, 'Admin', '1st', 'admin@techarise.com', '21-02-2011', 2147483647),
(3, 'User', '4rth', 'user@techarise.com', '21-02-2011', 2147483647),
(4, 'Editor', '3rd', 'editor@techarise.com', '21-02-2011', 2147483647),
(5, 'Writer', '2nd', 'writer@techarise.com', '21-02-2011', 2147483647),
(6, 'Contact', 'one', 'contact@techarise.com', '21-02-2011', 2147483647),
(7, 'Manager', '1st', 'manager@techarise.com', '21-02-2011', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `material` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `material`) VALUES
(1, 'old material '),
(2, 'new material'),
(3, 'single material'),
(4, 'row material');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `mid` int(11) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `munit` varchar(255) NOT NULL,
  `mcategory` varchar(255) NOT NULL,
  `mdesc` varchar(255) NOT NULL,
  `hsn` varchar(255) NOT NULL,
  `mgst` varchar(255) NOT NULL,
  `mbase` varchar(255) NOT NULL,
  `mtype` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`mid`, `mname`, `munit`, `mcategory`, `mdesc`, `hsn`, `mgst`, `mbase`, `mtype`) VALUES
(0, 'gvasdsad', '24', '3', 'ewqeqwe', 'eweqw', 'eqeq', 'eeqw', 'ewewqeqe'),
(1, 'weqweqwe', '2', '1', 'werwerw', 'werwerw', 'rewrwer', 'rerwer', 'rrwr');

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
-- Dumping data for table `material_rqst`
--

INSERT INTO `material_rqst` (`mrid`, `sid`, `mid`, `mrqty`, `mrunitprice`, `mrrefid`, `muid`, `mrremarks`, `mrcreatedon`, `mrcreatedby`) VALUES
(2, '2', '2,2', '1,1', '5,10', '', '1,2', ',', '1970-01-01', ''),
(3, '2', '1', '', '', '', '', '', '1970-01-01', ''),
(4, '2', '2,2', '500', '2,4', '', '', '', '1970-01-01', ''),
(5, '1', '3', '65', '5', '', '2', 'hgfd>						</td>						<td><a class=', '1970-01-01', '');

-- --------------------------------------------------------

--
-- Table structure for table `mo_master`
--

CREATE TABLE `mo_master` (
  `moid` int(10) NOT NULL,
  `morefid` varchar(50) NOT NULL,
  `sid` varchar(100) NOT NULL,
  `vid` varchar(255) NOT NULL,
  `mid` varchar(50) NOT NULL,
  `muid` varchar(50) NOT NULL,
  `modate` date NOT NULL,
  `mochallan` varchar(255) NOT NULL,
  `moqty` varchar(50) NOT NULL,
  `movehicle` varchar(100) NOT NULL,
  `tid` varchar(50) NOT NULL,
  `moremark` varchar(100) NOT NULL,
  `mocreatedon` datetime NOT NULL,
  `mocreatedby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mo_master`
--

INSERT INTO `mo_master` (`moid`, `morefid`, `sid`, `vid`, `mid`, `muid`, `modate`, `mochallan`, `moqty`, `movehicle`, `tid`, `moremark`, `mocreatedon`, `mocreatedby`) VALUES
(1, '', '1', '', '2', '2', '2018-06-25', '', '344', '', '1', '42424', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `munits`
--

CREATE TABLE `munits` (
  `muid` int(11) NOT NULL,
  `muname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `munits`
--

INSERT INTO `munits` (`muid`, `muname`) VALUES
(1, 'Numbers'),
(2, 'Milli Litre'),
(3, 'Hourly'),
(4, 'Bundle'),
(5, 'cubic metre'),
(6, 'Units'),
(7, 'Trucks'),
(8, 'Ton'),
(9, 'Square Meter'),
(10, 'Square Feet'),
(11, 'Rolls'),
(12, 'Pieces'),
(13, 'Pairs'),
(14, 'Packets'),
(15, 'Meters'),
(16, 'Litre'),
(17, 'Kilogram'),
(18, 'Grams'),
(19, 'Gaadi'),
(20, 'Feet'),
(21, 'Drums'),
(22, 'Cubic Feet'),
(23, 'Box'),
(24, 'Bags');

-- --------------------------------------------------------

--
-- Table structure for table `officedetails`
--

CREATE TABLE `officedetails` (
  `oid` int(10) NOT NULL,
  `oname` varchar(100) NOT NULL,
  `oaddress` varchar(255) NOT NULL,
  `ogst` varchar(255) NOT NULL,
  `ocreatedon` datetime NOT NULL,
  `ocreatedby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officedetails`
--

INSERT INTO `officedetails` (`oid`, `oname`, `oaddress`, `ogst`, `ocreatedon`, `ocreatedby`) VALUES
(2, 'tueqwe', 'eqweqw21212', 'eqeqwe2121311231', '0000-00-00 00:00:00', ''),
(3, '32323', '313123', '3213213', '0000-00-00 00:00:00', ''),
(0, 'wwweqeq', 'wqwweqwe', 'weqeqeqe', '0000-00-00 00:00:00', ''),
(0, 'wwweqeqweqeqe', 'wqwweqweeweqe', 'weqeqeqeeqeqe', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `foods` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `performance_id` int(10) UNSIGNED NOT NULL,
  `performance_year` smallint(4) UNSIGNED NOT NULL,
  `performance_sales` int(10) UNSIGNED NOT NULL,
  `performance_expense` double NOT NULL,
  `performance_profit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`performance_id`, `performance_year`, `performance_sales`, `performance_expense`, `performance_profit`) VALUES
(1, 2010, 1000, 400, 200),
(2, 2011, 1100, 450, 220),
(3, 2012, 760, 1120, 400),
(4, 2013, 1030, 540, 310),
(5, 2014, 850, 420, 260),
(6, 2015, 1250, 560, 330),
(7, 2016, 1450, 600, 360);

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
(3, '2', '', '', '', '', '', '', '', '', '', '', '', '1970-01-01', '1,2', '1,1', '10,10', '5,10', '2,1', '20,20', '1,2', '1,3', '1,4', '30.900000000000002,87.2', '4', ',', '', '1,0');

-- --------------------------------------------------------

--
-- Table structure for table `rtv_master`
--

CREATE TABLE `rtv_master` (
  `rtvid` int(11) NOT NULL,
  `rtvrefid` varchar(50) NOT NULL,
  `sid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `rtvreturndate` date NOT NULL,
  `rtvcreatedby` varchar(255) NOT NULL,
  `rtvcreatedon` timestamp(5) NOT NULL DEFAULT '0000-00-00 00:00:00.00000' ON UPDATE CURRENT_TIMESTAMP(5),
  `vchallan` varchar(50) NOT NULL,
  `schallan` varchar(50) NOT NULL,
  `mid` varchar(11) NOT NULL,
  `muid` varchar(11) NOT NULL,
  `rtvqty` varchar(50) NOT NULL,
  `rtvtruck` varchar(50) NOT NULL,
  `rtvremark` varchar(2550) NOT NULL,
  `tid` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rtv_master`
--

INSERT INTO `rtv_master` (`rtvid`, `rtvrefid`, `sid`, `vid`, `rtvreturndate`, `rtvcreatedby`, `rtvcreatedon`, `vchallan`, `schallan`, `mid`, `muid`, `rtvqty`, `rtvtruck`, `rtvremark`, `tid`) VALUES
(1, '', 1, 5, '2018-06-05', '', '2018-06-25 00:14:49.34148', '123', '456', '2,4', '3,1', '23123,45', '6789,1234', '32,0909', '1'),
(2, '', 1, 6, '2018-06-22', '', '2018-06-25 00:15:13.85121', '999999999', '88888888', '2', '2', '777777888888888', '66666666', '55555', '1'),
(3, '', 1, 5, '2018-06-12', '', '2018-06-24 23:58:07.88372', '23123', '3313', '2,4', '1,2', '21,3132', '313,3131', '3123123,123131', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sitedetails`
--

CREATE TABLE `sitedetails` (
  `sid` int(11) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `sitestartdate` date NOT NULL,
  `uniquesid` varchar(255) NOT NULL,
  `contactname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sitedetails`
--

INSERT INTO `sitedetails` (`sid`, `sname`, `sitestartdate`, `uniquesid`, `contactname`, `mobile`, `email`, `address`) VALUES
(1, 'DEE KAY BUILDCON PVT. LTD', '0000-00-00', 'office', 'Meenakshi', '8800695656', 'dkbuildcon@gmail.com', '147 1ST FLOOR OM SHUBHAM TOWER NEELAM BATA ROAD NIT FARIDABAD'),
(2, 'SUN INFO', '0000-00-00', 'SunInfo', '', '', '', 'PLOT NO 38, SEC 20A FARIDABAD'),
(3, 'GUPTA EXIM PVT. LTD.', '0000-00-00', 'gupta40/20', 'Foji ji', '9716733618', '', 'PLOT NO 40, SEC 20A FARIDABAD'),
(4, 'sname', '0000-00-00', 'uniquesid', 'contactname', 'mobile', 'email', 'address'),
(5, 'DEE KAY BUILDCON (P) LTD', '0000-00-00', 'Bhakri', 'MR. VERMA', '8800695624 , 8800695651', '', '184/166 min,khatoni no.200,Khasra no. 197,Mauja, bhankri, Pali Road, VILLAGE BHANKRI,FARIDABAD-121004'),
(6, 'GUPTA EXIM', '0000-00-00', 'guptapr.', 'SIMS.AppMaster.Model.MSite', '8800695630', '', 'PRITHLA'),
(7, 'INDO', '0000-00-00', 'indoimt', 'MR. MUNESH', '8800466207', '', 'PLOT NO 132.133 MANESAR'),
(8, 'INDO AUTO TEK', '0000-00-00', 'indo13/20', 'MR. PRAKASH', '9654294850', '', 'PLOT NO 61 SEC 25 FBD'),
(9, 'JBM', '0000-00-00', 'jbmmane', 'MR. Mohan', '8800695644', '', 'SEC-36, MOHAMMADPUR JHARSA, NEAR KHANDSA VILLAGE, PACE CITY-II, GURGAON-122 001'),
(10, 'KSS PLOTNO 6 SEC 16', '0000-00-00', 'kss', 'MR. SANJAY', '9999460500', '', 'BHADURGARH'),
(11, 'NEEL METAL PRODUCTS LTD. GUR', '0000-00-00', 'nmpl gur', 'MR. Mohan', '8800695644', '', 'SEC-36, MOHAMMADPUR JHARSA, NEAR KHANDSA VILLAGE, PACE CITY-II, GURGAON'),
(12, 'RPS VIKAS', '0000-00-00', 'rps', 'MR DINESH', '8800695604', '', 'AURNGABAD PALWAL'),
(13, 'SPRON HUNDAI', '0000-00-00', 'supron35/35', 'MR. kuldeep yadav', '8800695654', '', 'PLOT NO 35 SEC 35 GURGAON'),
(14, 'SUPERON TECHNIK INDIA PVT.LTD.', '0000-00-00', 'stanvac551/37', 'MR. THAKUR', '8800695605 , 8800695654', '', 'PLOT NO 551 SEC 37 GURGAON'),
(15, 'V.K.GLOBLE', '0000-00-00', 'vkg15/1', 'MR. RAMKUMAR', '8800695637', '', '15/1 SEC 31 FARIDABAD'),
(16, 'FRUIT GARDEN', '0000-00-00', 'f-25', 'MR. ANKUR', '9212545580', '', 'F-25 NEAR GREEN AUTO MOBILE'),
(17, 'Jc auto', '0000-00-00', '213 /58', 'meenakshi', 'ronald', '', '213 SEC 58 FBD'),
(18, 'NEEL METAL PRODUCTS LTD.', '0000-00-00', 'nmplmane', '', '8800695636', '', 'SEC 7 NEAR BANS GAON MANESAR'),
(19, 'SHIVANI', '0000-00-00', 'shivani27', 'meenakshi', '9990158722', '', 'PLOT NO 59,60 SEC 27A FBD'),
(20, 'ICT', '0000-00-00', 'ict62/20', 'Mr. sanjay', '9910234318', '', 'PLOT NO 62, SEC 20A FBD'),
(21, 'AVON TUBE', '0000-00-00', 'avont.pur', '', '', '', 'tatarpur'),
(22, 'Indo Autotech Limited', '0000-00-00', 'indo332/24', 'MR. HARPRASAD', '8800695634', '', 'PLOT NO 332 SEC 24  FARIDABAD'),
(23, 'PRPL PAKAGING', '0000-00-00', 'prpl', 'sachin', '', '', 'PRITHLA'),
(24, 'Shivam Autoteck', '0000-00-00', 'har', '', '9729824623, 8800695637', '', 'plot no. 3, industrial park-2, phase -1, village salempur  mehdood haridwar (UK)'),
(25, 'Oxinion India Pvt. Ltd.', '0000-00-00', 'Oxinion', 'meenakshi', '8800695634', '', 'PLOT NO 6SECTOR 27A'),
(26, 'KHEMKA', '0000-00-00', 'kemka', 'meenakshi', '', '', 'PLOT NO 135 SEC 24 FARIDABAD'),
(27, 'VENUS INDUSTRIAL CORPORATION PVT. LTD', '0000-00-00', 'venus24', 'its both 197&262 sec 24', '8800695634', '', 'plot no 262 SEC 24'),
(28, 'ACME COLLEGE AURANGABAD', '0000-00-00', 'acme', 'rajeev', '', '', 'SIMS.AppMaster.Model.MSite'),
(29, 'PLOT NO. 167/ SEC 25', '0000-00-00', '167/25', 'meenakshi', '', '', 'PLOT NO. 167/ SEC 25'),
(30, 'AMBICA STEEL LTD', '0000-00-00', 'ambicaa-30', '', '8800695604', '', 'A-30, SITE IV, SAHIBABAD INDUSTRIAL AREA, UP.'),
(31, 'RDS IMPEX', '0000-00-00', 'rds190/8', 'nitesh', '', '', 'PLOT NO 190SEC 8 MANESAR'),
(32, 'PLOT NO 502 SEC 37 GURGOAN', '0000-00-00', '502/37', 'nitesh , kuldeep', '', '', 'SIMS.AppMaster.Model.MSite'),
(33, 'MELCO INDIA', '0000-00-00', 'melco291/58', 'MR. DIVAKAR', '8800695641', '', 'PLOT NO 291 SEC 58 FARIDABAD'),
(34, 'DUMP', '0000-00-00', 'dump', '', '', '', 'SIMS.AppMaster.Model.MSite'),
(35, 'd', '0000-00-00', 'd', '', '', '', 'c FBD'),
(36, 'TUBE TECH TATARPUR', '0000-00-00', 'TBD', '', '', '', 'SIMS.AppMaster.Model.MSite FBD'),
(37, 'MARS INDUSTRIES LTD', '0000-00-00', 'mars binola', 'MR. NISHANT', '8800466203', '', 'BINOLA GURGOAN NEAR BAJAJ AUTO'),
(38, 'RPS SATA VIKAS', '0000-00-00', 'satavikas', 'MR. YOGESH', '', '', 'SIMS.AppMaster.Model.MSite'),
(39, 'RPS PRANAV VIKAS', '0000-00-00', 'rpspvl', 'MR. YOGESH', '', '', 'SIMS.AppMaster.Model.MSite'),
(40, 'STAR HOOK & LOOP', '0000-00-00', 'starhook', '', '', '', 'BHADURGARH'),
(41, 'AKASH OVERSEAS P LTD', '0000-00-00', 'akash268/58', 'MR. SUNDER', '8800695633', '', 'PLOT NO 268 SEC 58 FBD'),
(42, 'Supron hundai', '0000-00-00', '106/37', '', '8800695605', '', 'Plot no 255 Udyog vihar  Gurgaon'),
(43, 'SPS INTERNATIONAL SCHOOL', '0000-00-00', 'sps palwal', 'MR. SACHIN', '8800695659', '', 'SEC 2, PALWAL'),
(44, 'M/S COMPAGE AUTOMATION SYSTEM', '0000-00-00', 'compagedlf', 'MR. RAJESH', '8800466214', '', 'PLOT NO 20-21 NEW DLF INDUSTRIAL AREA FARIDABAD'),
(45, 'SHIVANI LOCK P LTD', '0000-00-00', 'shivani', '', '', '', '14/6 MATHURA ROAD'),
(46, 'M/S OMEGA LIFE STYLE PVT LTD.', '0000-00-00', 'omegabhr.', 'Mr. Rathi', '8684033155', '', '179 I, SECTOR 16 ,BAHADURGARH'),
(47, 'banti house', '0000-00-00', 'banti', '', '9910240239', '', 'gali no 3 hanuman nagar  faridabad'),
(48, 'ATUL KATARIA CHOWK GUR', '0000-00-00', 'atulkataria gur', '', '', '', 'SIMS.AppMaster.Model.MSite'),
(49, 'INDO AUTO TECH., P.NO. SPL-5, TAPUKARA', '0000-00-00', 'indotappu', '', '', '', 'SIMS.AppMaster.Model.MSite'),
(50, 'gupta', '0000-00-00', 'gupta exim', 'Mr Nirakar', '8800466202', '', 'PLOT NO 45 SEC6 FARIDABAD'),
(51, 'GLEN PLOT NO4 SEC6', '0000-00-00', 'glen4/6', '', '', '', ''),
(52, 'JAIN INDO', '0000-00-00', '1443/14', '', '', '', 'PLOT NO 1443 SEC 14'),
(53, '261/24', '0000-00-00', '261/24', '', '', '', 'FARIDABAD'),
(54, 'MANGLA  REDIMIX pvt. ltd.', '0000-00-00', 'MANGLA', 'MR. JITENDER MANGLA', '9310104321', '', 'GADPURI PALWAL'),
(55, 'STERLING TOOLS LTD', '0000-00-00', 'sterling', '', '8800695633', '', 'PRITHLA PALWAL'),
(56, 'TESTING SITE45', '0000-00-00', 'tsite', '', '', '', 'INNOSOLS INNOSOLS'),
(57, 'DK', '0000-00-00', '15', '', '9810160500', '', 'HOUSE NO 974 SEC 17 FARIDABAD'),
(58, 'Vijay kumar singh', '0000-00-00', '1914/28', '', '', '', '1914 SEC 28 FARIDABAD'),
(59, 'DAGA TRADING COMPANY', '0000-00-00', 'DAGAPALWAL', '', '8800695641', '', 'PRITHLA ROAD DUDHOLA PALWAL'),
(60, 'DEE KAY DEVELOPERS', '0000-00-00', 'DK', 'Meenakshi', '8800695656', '', '147 1ST FLOOR OM SHUBHAM TOWER NEELAM BATA ROAD FARIDABAD'),
(61, 'TCIL NATIONAL HIGH NO 8 VILL. SANGWARI NEAR DHARUWEDA, REWARI', '0000-00-00', 'tcil', '', '8800695654', '', ''),
(62, 'MENTAL HEALTH CARE CENTER', '0000-00-00', 'nasha', 'Mr. Rana', '8800695617', '', 'SEC 14 FARIDABAD'),
(63, 'TESTING SITE25', '0000-00-00', 'ts', '', '', '', ''),
(64, 'LALIT ELECTRICAL', '0000-00-00', 'motor', '', '', '', ''),
(65, 'Venus Stamping Pvt. Ltd.', '0000-00-00', 'Ven', '9466163914, 8800695611', '', '', 'Baghola'),
(66, 'DB TIMBER', '0000-00-00', 'db', '', '', '', ''),
(67, 'SANKEI PRAGATI INDIA PVT LTD.', '0000-00-00', 'bilaspur', '', '9466297065', '', 'PLOT B 101-103, VILLAGE PATHRERI , PIONEER INDUSTRIAL PARK BILASPUR DIST. GURGOAN'),
(68, 'JC AUTO PRITHLA', '0000-00-00', 'JC', '', '8800695633', '', 'A'),
(69, 'JLJ SCHOOL AURANGABAD', '0000-00-00', 'JLJ', '', '9992965802', '', ''),
(70, 'NEHRU GRD PLOT NO 22 -23', '0000-00-00', 'nit', '', '', '', ''),
(71, 'LAKHANI 1278/SEC 14', '0000-00-00', 'lakhani', '', '', '', ''),
(72, 'TECHNO SPRING INDUSTRIES PLOT NO 44 SEC 68 FARIDABAD', '0000-00-00', 'IMT', '', '8800695634', '', ''),
(73, 'RADHIKA IMT MANESAR', '0000-00-00', 'radhika', '', '8800695649', '', ''),
(74, 'SARVOTAM ALLOYS PVT LTD', '0000-00-00', 'bhiwadi', '', '8800695642', '', 'BHIWADI'),
(75, 'M/S SFG EXPORTS PVT. LTD.', '0000-00-00', 'shahi', '', '8800695660', '', '12/6 SARAI KHAWAJA FARIDABAD FARIDABAD'),
(76, 'METRO HOSPITAL', '0000-00-00', 'metro', '', '8800695612', '', 'SEC 16 FARIDABD'),
(77, 'THOMSON PRESS INDIA LIMITED', '0000-00-00', 'Thomson', '', '8800695632', '', '18-35 DELHI MATHURA ROAD  FARIDABAD'),
(78, 'MUNJAL AUTO INDUSTRIES LTD.', '0000-00-00', 'DHARUHERA', '', '8800695605', '', 'BAWAL'),
(79, 'Shimizu Corporation India Pvt Ltd', '0000-00-00', 'Shimizu', '', '8800695636', '', 'Honda Siel Cars India Ltd, Package-B, Suppliers Park, Tapukara, Bhiwadi'),
(80, '354/21a', '0000-00-00', 'glen', '', '', '', ''),
(81, 'JBM  A-4 INDUSTRIAL AREA', '0000-00-00', 'KOSI', '', '9761820163', '', 'KOSI KALAN'),
(82, 'Aurania', '0000-00-00', 'sec 56', '', '8800695654', '', 'sec 56 gurgaon'),
(83, 'anand jain', '0000-00-00', 'sec 14', '', '8800695634', '', '673 sec 14'),
(84, 'TEST', '0000-00-00', 'TST1', '', '', '', ''),
(85, 'AVON TUBE TECH', '0000-00-00', 'BHAGOLA', 'manish', '8802474357, 9466163914', '', 'BHAGOLA'),
(86, 'Aggarwal college', '0000-00-00', 'college', '', '9999460500', '', 'ballabgarh'),
(87, 'M/S MASU BRAKES(P.LTD.)', '0000-00-00', 'masu', '', '8684033155', '', '43 milestone nh 10 delhi rohtak road bhadurgarh'),
(88, 'Chelsea blocks & pipes pvt ltd.', '0000-00-00', 'Chelsea', '', '8800695635', '', 'Plot no.11, Sec-5, Industrial Estate ,Phase -11, G.C . BAWAL  HARYANA'),
(89, 'Delhi public school', '0000-00-00', 'DPS', '', '8800695657', '', 'Sec.-81 faridabad'),
(90, 'RMC READYMIX (INDIA)', '0000-00-00', 'RMC 01', '', '', '', '14/7, MILE STONE , MATHURA ROAD FARIDABAD'),
(91, 'rajeev colony', '0000-00-00', 'ramesh', '', '8800695630', '', 'sec 56 faridabad'),
(92, 'Dr. Bharti Gupta', '0000-00-00', 'dr', '', '8800695604', '', 'plot no 38 sec 31 Faridabad'),
(93, 'DAMCO SOLUTIONS PVT. LTD.', '0000-00-00', 'DAMCO', '', '8800695604', '', 'PLOT NO 39 SEC 20A FARIDABAD'),
(94, 'OM CEMENT', '0000-00-00', 'ABC', '', '', '', '42930 FARIDABAD'),
(95, 'CHANDRA ENGINEERS', '0000-00-00', 'NEEMRANA', '', '9785406573', '', 'PLOT NO – ( E 131 ) EPIP INDUSTRIAL AREA,  NEEMRANA - RAJASTHAN'),
(96, 'ANIL CHANANA', '0000-00-00', 'Okhla', '', '8800695638', '', 'C-5, Okhla, Phase-1 New Delhi'),
(97, 'Forza Medi India PVT. LTD.', '0000-00-00', 'Forza', '', '8800695612', '', 'Plote No 78 Sec. 4  Manesar Gurgaon'),
(98, 'Singhal', '0000-00-00', '21b', '', '8800695604', '', '712/21 b'),
(99, 'JC AUTO PUNCHING', '0000-00-00', 'JCPUNCHING', '', '8800695633', '', 'PRITHLA'),
(100, 'Gupta Promoters Pvt. Ltd.', '0000-00-00', 'gpl', '', '8800695654', '', 'Housing Complex , Sector-70-a, Gurgaon'),
(101, 'SITA SINGH & SONS', '0000-00-00', 'SITA', '', '8800695633', '', 'PRITHLA  PALWAL'),
(102, 'kenmore', '0000-00-00', 'kenmore', '', '8800695604', '', '20th Milestone, Plot no. 4, Mathura Road faridabad'),
(103, 'jbm 3', '0000-00-00', 'jbmbawal', 'nitesh', '8800695636', '', 'bawal'),
(104, 'GARG REDIMIX PVT LTD', '0000-00-00', 'GARG', '', '', '', 'SAHAPUR ROAD , SIKRI'),
(105, 'naveen aggarwal', '0000-00-00', 'nauchali', '', '8800695634', '', 'nauchali'),
(106, 'S P Sharma', '0000-00-00', 'south ex', '', '8800695618', '', 'F- 45 , South Extension -1 new delhi'),
(107, 'RMG PREMIER POLYFILM LTD.', '0000-00-00', 'RMG', '', '08755975267, 7500496179', '', 'A-13 , INDUSTRIAL AREA  SIKANDRABAD'),
(108, 'ttttttt', '0000-00-00', 'tytytytyt', '', '', '', ''),
(109, 'Super auto india ltd.', '0000-00-00', '50/6', '', '8800695650', '', 'plot no 50 sec 6  faridabad'),
(110, 'Shilpi Cable Technologies ltd.', '0000-00-00', 'sp', '', '8800695619', '', 'SP-1037 Industrial area Chopanki Bhiwadi'),
(111, 'Aggarwal School', '0000-00-00', 'machgar', '', '8800695634', '', 'Machgar Faridabad'),
(112, 'KNOR', '0000-00-00', '17-Jun', '', '8800695634', '', 'PLOT NO 17 SEC 6'),
(113, 'Agro Engg', '0000-00-00', 'agro', '', '8800695612', '', '22/7, IMT , Manesar gurgaon'),
(114, 'JBM BALLABHGARH', '0000-00-00', 'JBMF', '', '8800695630', '', 'PLOT NO  118 SEC 59'),
(115, 'SHIVAM AUTOTECH', '0000-00-00', 'rohtak', '', '08800695605 , 9729733514', '', 'Plot no 9 sec 30 a , imt rohtak'),
(116, 'VECTORA TOOLS', '0000-00-00', 'TOOLS', '8800695604', '', '', 'PLOT NO. 42/20A FARIDABAD'),
(117, 'metro', '0000-00-00', '331', '', '8800695604', '', 'plot no 331 sec 21a'),
(118, 'phsycotropy', '0000-00-00', '17/20', '', '8800695655', '', 'plot no 17 sec 20 a'),
(119, 'KHANDEL', '0000-00-00', '68/6', '', '8800695630', '', 'PLOT NO 68 SEC 6 FARIDABAD'),
(120, 'Sho', '0000-00-00', '313/29', '', '8800695604', '', '313 sec 29 faridabad'),
(121, 'GKN DRIVLINE', '0000-00-00', 'GKN 270/24', '', '8813091408, 9999460500', '', 'PLOT NO. 270  SEC 24'),
(122, 'Narender Aggarwal', '0000-00-00', 'softa', '', '8800695635', '', 'softa sikri'),
(123, 'bharatpal', '0000-00-00', 'bharatpal', '', '7827279421', '', 'plot no. 190/ 31'),
(124, 'Beltecno India Pvt. Ltd.', '0000-00-00', 'Beltecno', '', '8800695636 , 7023440406', '', 'SP 2-23, Japanese Industrial Zone Neemrana, Distt.- Alwar , Rajasthan'),
(125, 'Lakhani footwear pvt.ltd', '0000-00-00', 'HARIDWAR', '', '08684033155 , 8800695637,18', '', 'PLOT NO 11 SEC 11  HARIDWAR'),
(126, 'JAI BHARAT MARUTI', '0000-00-00', 'JBMN', '', '8800695618', '', 'PLOT NO 33 SEC 44  GURGAON'),
(127, 'Narender aggarwal school', '0000-00-00', 'school', '', '8800695635', '', 'palwal'),
(128, 'Super auto', '0000-00-00', 'sec15', '', '8800695630', '', 'plot no 1154 sec 15 faridabad'),
(129, 'Sterling tool limited', '0000-00-00', 'sec 25', '', '8800695634', '', 'plot no 81 sec 25 faridabad'),
(130, 'JC punching', '0000-00-00', 'tatarpur', '', '8800695633', '', 'tatarpur'),
(131, 'SANDHAR COMPONENTS', '0000-00-00', 'SANDHAR', '', '8800695619 ,  7822895183', '', 'PLOT NO. 14 , SEC -5 PHASE 2 BAWAL  REWARI'),
(132, 'SANDHAR TECHNOLOGIES', '0000-00-00', 'PATHRERI', '', '8800695617 , 8800695619', '', 'PLOT NO. SP-1/889 , RIICO INDL. AREA, PATHREDI, BHIWADI, RAJ , TIN NO. 08060703042'),
(133, 'Multitech products', '0000-00-00', 'Multitech', '', '8800695658', '', 'plot no 4 northen india faridabad'),
(134, 'Super Screw Pvt Ltd', '0000-00-00', 'super', '', '7834846502 , 9999460500', '', 'Plot no 83 vilage Aurangabad Palwal'),
(135, 'Glen Appliances p ltd', '0000-00-00', 'glenimt', '', '8800695630, 8800695631', '', 'Plot No.-919 ,sec 68 , IMT,\nFaridabad'),
(136, 'THAPAR UNIVERSITY', '0000-00-00', 'PATIALA', '', '8800695617 , 9115946340', '', 'bhadson road , Thapad Technology Campus  PATIALA'),
(137, 'Andritz hydro pvt  ltd', '0000-00-00', 'Andritz', '', '8802474357 , 9466163914', '', 'prithla'),
(138, 'PSYCHOTROPICS INDIA LTD.', '0000-00-00', 'PIL', '', '8800695618, 8171745512,', '', 'PLOT - 12 & 12A, INDUSTRIAL PARK-2, VILLAGE SALEMPUR MEHOOD'),
(139, 'Gupta ji', '0000-00-00', '1018', '', '', '', '1018 sec 17 FARIDABAD'),
(140, 'Gaursons', '0000-00-00', '12', '', '8800695634', '', '1, Barakhamba Road  New Delhi'),
(141, 'SRI SATYA SAI SANJEEVANI INTERNATIONAL CENTER FOR CHILD HEART CARE & RESEARCH', '0000-00-00', 'sai', '', '9654095696', '', 'DELHI MATHURA ROAD , VILLAGE BAGHOLA  PALWAL'),
(142, 'BIC AUTO PVT.LTD.', '0000-00-00', 'BIC', '', '9896864864,  8800695605', '', 'E-9 OLD INDUSTRIAL AREA  Bahadurgarh'),
(143, 'Manav Rachna International School', '0000-00-00', 'MRIS', '', '9599801288', '', 'Eros Garden, Charmwood Village, Delhi - Surajkund Road , Faridabad-121008'),
(144, 'Shail Global International school', '0000-00-00', 'SGI', '', '8800695657, 8800695641', '', 'sec 81  faridabad'),
(145, 'Sufdarjang hyundai', '0000-00-00', 'maya', '', '8800695618, 8010608744', '', 'B-100, Maya Puri new delhi'),
(146, 'SOUTH CITY', '0000-00-00', 'SOUTH CITY', '', '8800695635', '', 'E23 & F2 SOUTH CITY 1 GURGAON'),
(147, 'Shimizu Corporation India Pvt Ltd (G -TIP)', '0000-00-00', 'G - TIP', '', '8800695619', '', 'Address:  Honda Siel Cars India Ltd, Package-B, Suppliers Park, Tapukara,  Bhiwadi'),
(148, 'NATIONAL HIGHWAY 2', '0000-00-00', 'NH', '', '9971500225', '', 'MATHURA ROAD  FARIDABAD'),
(149, 'TIMPY FARM HOUSE', '0000-00-00', 'DR. BHARTI GUPTA', '', '8800695604, 8826415874', '', 'SEC- 11  FARIDABAD'),
(150, 'Manav Rachna International  University ( G --  BLOCK )', '0000-00-00', 'MRIU', '', '9811416263. 8800695604', '', 'Delhi Suraj kund Road, Sector 43, faridabad'),
(151, 'KAMAL ENCON INDUSTRIES LTD.', '0000-00-00', 'KAMAL', '', '8800695631, 9654095696', '', 'PLOT NO. 917, SEC 68 IMT  FARIDABAD'),
(152, 'SARC  AVIATION PVT.LTD', '0000-00-00', 'SARC', '', '8800695655', '', 'PLOT NO. 93 , RANGPURI , BASANT KUNJ  NEW DELHI'),
(153, 'Twin House', '0000-00-00', '21 sec', '', '8800695604 , 7827279421', '', '727-728 sec 21 c faridabad'),
(154, 'DECATHLON SPORTS INDIA PRIVATE LIMITED', '0000-00-00', 'jaipur', '', '9660665199', '', 'khasara no 1123, gram bhankrota,Ajmer Road Jaipur'),
(155, 'ROSE VIEW PROMOTERS PVT.LTD & ASSOCIATES', '0000-00-00', 'ROSE', '', '8750469962, 8010180104', '', 'PLOT NO. -2 , SECTOR M-11, TRANSPORTS HUB, INDUSTRIAL ESTATE IMT MANESAR GURGAON'),
(156, 'C. LAL ALLOYS PVT.LTD', '0000-00-00', 'LAL', '', '9466163914, 8802474357', '', 'NANGLA BHIKU PALWAL'),
(157, 'Bluebells Public School', '0000-00-00', 'bell', '', '8800695657 , 8800695605', '', 'Malibal Town Sohna Road Gurgaon'),
(158, 'Munjal Auto Industries limited', '0000-00-00', 'BAWAL', '', '8800695605', '', 'BAWAL'),
(159, 'LAKHANI INDIA LTD', '0000-00-00', 'Lakhan', '', '8800695647', '', '266/24, FARIDABAD'),
(160, 'SUZUKI MOTORCYCLES INDIA PVT LTD', '0000-00-00', 'SUZUKI', '', '8800695654', '', 'VILLAGE KHERKI DHAULA, N.H -8 LINK ROAD\nGURGAON'),
(161, 'RMC', '2017-09-01', 'RMC', '', '', '', '12/7, Mathura Road\nFARIDABAD'),
(162, 'Dada Farmhouse', '2017-09-06', 'Dada', '-', '9312948976', '', 'RAJOKARI\nNEW DELHI'),
(163, 'HARSH NIWAS', '0000-00-00', 'JONAPUR', 'SURESH JI', '9560502947 , 8813841388', '', 'Address: FARM NO. 65,  VILLAGE JONAPUR, NEAR FATHPUR BERI POLICE STATION , DELHI)'),
(164, 'VENUS INDUSTRIES LTD.', '0000-00-00', 'VENUS', '8800695634', '8800695634', '', 'PLOT NO. 91, SEC 25'),
(165, 'MCF SEC-22', '0000-00-00', 'MCF', '', '8800695634', '', 'SEC -22  FARIDABAD'),
(166, 'DELITE ARAVALI VIEW', '2017-11-06', 'DELITE', '9999460500,', '7834846502, 8800695641', '', 'NEAR GYM KHANA CLUB , FARIDABAD )'),
(167, 'Venus Industrial corporation pvt ltd', '2017-11-14', 'gujrat', 'Boby', '9660665199', '', 'Modhera Becharaji road \nvillage delvada Mehesana : 384210\nGujrat'),
(168, 'WINGS AUTOMOBILE PRODUCT PVT. LTD', '2017-11-17', 'WINGS', 'Mr Ram kumar', '8860624640', '', 'PLOT NO. 53, SEC -6 , FARIDABAD'),
(169, 'Carrier Air Conditioning & Refrigeration Ltd.', '0000-00-00', 'Carrier Aircon', 'Mr. Tarsem Singh', '8800695617', '', 'Kherki Daula post,  Narsing Pur, Gurugram- 122004, (near Haldiram)'),
(170, 'Mohta bright steel', '0000-00-00', 'mohta', '', '9555828666', '', 'prithla'),
(171, 'Super Auto India Ltd', '0000-00-00', 'pune', 'Nagesh', '8412877804', '', 'Pune'),
(172, 'Venus Industries Corporation Pvt Limited', '0000-00-00', 'Sec-24', 'Rajesh', '9818579969', '', 'Plot NO.-197, Sector-24, Faridabad'),
(173, 'Shahi Exports Pvt. Ltd.- Odisha 2', '0000-00-00', 'Shahi Odisha', 'Mitesh', '9636282706', '', 'Plot No. H-10, H-11 & H-12.\nMancheswar Industries Estate,\nBhubaneswar, Odisha-751010'),
(174, 'Silicon Construction Pvt.Ltd.', '2018-03-21', 'DECATHLON', 'Imran', '9654095696', '', 'Village Singhpura Zirakpur Hadbast no. 43.'),
(175, 'Starlic Fabric', '0000-00-00', 'NHPC', 'Anil Bansal', '8800695621', '', '12/2, Near Vatika (NHPC Chock)'),
(176, 'Venus Otuka', '0000-00-00', 'sector 27-A', 'Anil Bansal', '9899523184', '', 'Sector-27-A, Plot no. 58,58,60'),
(177, 'kamal', '2018-05-09', 'sdfug', 'kjysysadfy8twf', '6216519815', 'skejfhgyt', 'isrghsfryg8rg');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Student_id` int(10) NOT NULL,
  `Student_Name` varchar(255) NOT NULL,
  `Student_Email` varchar(255) NOT NULL,
  `Student_Mobile` varchar(255) NOT NULL,
  `Student_Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Student_id`, `Student_Name`, `Student_Email`, `Student_Mobile`, `Student_Address`) VALUES
(1, 'varun', 'varunbhandia@gmail.com', '9001126303', 'dev nagar tonk road');

-- --------------------------------------------------------

--
-- Table structure for table `subcontdetails`
--

CREATE TABLE `subcontdetails` (
  `subid` int(10) NOT NULL,
  `subname` varchar(255) NOT NULL,
  `submobile` varchar(50) NOT NULL,
  `subaltmobile` varchar(50) NOT NULL,
  `subemail` varchar(50) NOT NULL,
  `subgst` varchar(50) NOT NULL,
  `subaddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcontdetails`
--

INSERT INTO `subcontdetails` (`subid`, `subname`, `submobile`, `subaltmobile`, `subemail`, `subgst`, `subaddress`) VALUES
(2, 'tushar', '797978', '2147483647', '0@0', '0afsafaf', '0asfafasf');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'varun'),
(2, 'bhandia'),
(3, 'tushar'),
(4, 'mitesh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(250) NOT NULL,
  `Address` text NOT NULL,
  `City` varchar(250) NOT NULL,
  `PostalCode` varchar(30) NOT NULL,
  `Country` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`CustomerID`, `CustomerName`, `Address`, `City`, `PostalCode`, `Country`) VALUES
(1, 'Maria Anders', 'Obere Str. 57', 'Berlin', '12209', 'Germany'),
(2, 'Ana Trujillo', 'Avda. de la Construction 2222', 'Mexico D.F.', '5021', 'Mexico'),
(3, 'Antonio Moreno', 'Mataderos 2312', 'Mexico D.F.', '5023', 'Mexico'),
(4, 'Thomas Hardy', '120 Hanover Sq.', 'London', 'WA1 1DP', 'UK'),
(5, 'Paula Parente', 'Rua do Mercado, 12', 'Resende', '08737-363', 'Brazil'),
(6, 'Wolski Zbyszek', 'ul. Filtrowa 68', 'Walla', '01-012', 'Poland'),
(7, 'Matti Karttunen', 'Keskuskatu 45', 'Helsinki', '21240', 'Finland'),
(8, 'Karl Jablonski', '305 - 14th Ave. S. Suite 3B', 'Seattle', '98128', 'USA'),
(9, 'Paula Parente', 'Rua do Mercado, 12', 'Resende', '08737-363', 'Brazil'),
(10, 'Pirkko Koskitalo', 'Torikatu 38', 'Oulu', '90110', 'Finland'),
(11, 'Ronald Bowne', '2343 Shadowmar Drive', 'New Orleans', '70112', 'United States'),
(12, 'Joyce Rosenberry', 'Norra Esplanaden 56', 'HELSINKI', '00380', 'Finland'),
(13, 'Jeff Putnam', 'Industrieweg 56', 'Bouvignies', '7803', 'Belgium'),
(14, 'Trina Davidson', '1049 Lockhart Drive', 'Barrie', 'ON L4M 3B1', 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `name`, `address`, `gender`, `designation`, `age`) VALUES
(1, 'Bruce Tom', '656 Edsel Road\r\nSherman Oaks, CA 91403', 'Male', 'Driver', 36),
(5, 'Clara Gilliam', '63 Woodridge Lane\r\nMemphis, TN 38138', 'Female', 'Programmer', 24),
(6, 'Barbra K. Hurley', '1241 Canis Heights Drive\r\nLos Angeles, CA 90017', 'Female', 'Service technician', 26),
(7, 'Antonio J. Forbes', '403 Snyder Avenue\r\nCharlotte, NC 28208', 'Male', 'Faller', 32),
(8, 'Charles D. Horst', '1636 Walnut Hill Drive\r\nCincinnati, OH 45202', 'Male', 'Financial investigator', 29),
(9, 'Beau L. Clayton', '3588 Karen Lane\r\nLouisville, KY 40223', 'Male', 'Extractive metallurgical engin', 33),
(10, 'Ramona W. Burns', '2170 Ocala Street\r\nOrlando, FL 32801', 'Female', 'Electronic typesetting machine operator', 27),
(11, 'Jennifer A. Morrison', '2135 Lakeland Terrace\r\nPlymouth, MI 48170', 'Female', 'Rigging chaser', 29),
(12, 'Susan M. Juarez', '3177 Horseshoe Lane\r\nNorristown, PA 19403', 'Female', 'Control and valve installer', 25),
(13, 'Ellan D. Downie', '384 Flynn Street\r\nStrongsville, OH 44136', 'Female', 'Education and training manager', 26),
(14, 'Larry T. Williamson', '1424 Andell Road\r\nBrentwood, TN 37027', 'Male', 'Teaching assistant', 30),
(15, 'Lauren M. Reynolds', '4798 Echo Lane\r\nKentwood, MI 49512', 'Female', 'Internet developer', 22),
(16, 'Joseph L. Judge', '3717 Junkins Avenue\r\nMoultrie, GA 31768', 'Male', 'Refrigeration mechanic', 35),
(17, 'Eric C. Lavelle', '1120 Whitetail Lane\r\nDallas, TX 75207', 'Male', 'Model', 21),
(18, 'Cheryl T. Smithers', '1203 Abia Martin Drive\r\nCommack, NY 11725', 'Female', 'Personal banker', 23),
(19, 'Tonia J. Diaz', '4724 Rocky Road\r\nPhiladelphia, PA 19107', 'Female', 'Facilitator', 29),
(20, 'Stephanie P. Lederman', '2117 Larry Street\r\nWaukesha, WI 53186', 'Female', 'Mental health aide', 27),
(21, 'Edward F. Sanchez', '2313 Elliott Street\r\nManchester, NH 03101', 'Male', 'Marine oiler', 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

CREATE TABLE `tbl_employees` (
  `id` int(11) NOT NULL,
  `employee_name` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employees`
--

INSERT INTO `tbl_employees` (`id`, `employee_name`, `address`, `created_at`, `updated_at`) VALUES
(6, 'Veasna', 'Kandal', '2018-06-12 08:08:24', '2018-06-14 07:33:56'),
(7, 'Varun', 'c18', '2018-06-12 14:30:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `site` varchar(255) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `challan` int(11) NOT NULL,
  `receive_date` date NOT NULL,
  `material` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `unit_price` varchar(255) NOT NULL,
  `material_unit` varchar(255) NOT NULL,
  `trunk_no` varchar(255) NOT NULL,
  `challan_no` varchar(255) NOT NULL,
  `transporter` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `site`, `vendor`, `challan`, `receive_date`, `material`, `qty`, `unit_price`, `material_unit`, `trunk_no`, `challan_no`, `transporter`, `remarks`) VALUES
(9, 'tfh', '2', 53165165, '2018-06-20', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,'),
(10, 'gfxdfd', '2', 453432, '2018-06-07', '2', '5', '5', '3', '56498', '165848', '2', 'gfxtrdx');

-- --------------------------------------------------------

--
-- Table structure for table `transporters`
--

CREATE TABLE `transporters` (
  `tid` int(10) NOT NULL,
  `tname` varchar(255) NOT NULL,
  `tmobile` varchar(255) NOT NULL,
  `taltmobile` varchar(255) NOT NULL,
  `tconame` varchar(255) NOT NULL,
  `temail` varchar(255) NOT NULL,
  `tgst` varchar(255) NOT NULL,
  `taddress` varchar(2550) NOT NULL,
  `tdesc` varchar(2550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transporters`
--

INSERT INTO `transporters` (`tid`, `tname`, `tmobile`, `taltmobile`, `tconame`, `temail`, `tgst`, `taddress`, `tdesc`) VALUES
(1, 'qwert', '34546', '213456', 'qwert', 'qwerty', 'qwerty', 'qwerty', 'asdfghjkl');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `uaddress` varchar(255) NOT NULL,
  `umobile` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `site_role` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `mr` varchar(255) NOT NULL,
  `po` varchar(255) NOT NULL,
  `rtv` varchar(255) NOT NULL,
  `cp` varchar(255) NOT NULL,
  `uogrn` varchar(255) NOT NULL,
  `vendorbills` varchar(255) NOT NULL,
  `vendorbillpayment` varchar(255) NOT NULL,
  `moveorder` varchar(255) NOT NULL,
  `officegstdetails` varchar(255) NOT NULL,
  `subcontractor` varchar(255) NOT NULL,
  `transporter` varchar(255) NOT NULL,
  `workorder` varchar(255) NOT NULL,
  `reporting` varchar(255) NOT NULL,
  `workordermaterials` varchar(255) NOT NULL,
  `consumption` varchar(255) NOT NULL,
  `site` varchar(2550) NOT NULL,
  `ucreatedon` date NOT NULL,
  `ucreatedby` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `uemail`, `uaddress`, `umobile`, `user_role`, `site_role`, `material`, `vendor`, `mr`, `po`, `rtv`, `cp`, `uogrn`, `vendorbills`, `vendorbillpayment`, `moveorder`, `officegstdetails`, `subcontractor`, `transporter`, `workorder`, `reporting`, `workordermaterials`, `consumption`, `site`, `ucreatedon`, `ucreatedby`) VALUES
(2, 'varun', 'varun', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', ''),
(3, 'tushar', 'tushar', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6', '0000-00-00', ''),
(11, 'varunbhandia', 'varun', 'dfhdfh@zfgdf.sdg', 'fsdgdfh', 'dfhdfh', '0', '1', '2', '0', '0', '2', '0', '1', '2', '0', '1', '2', '0', '1', '2', '0', '1', '2', '0', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177', '0000-00-00', ''),
(12, 'mitesh1', 'varun', 'adfadf@dfh.dsg', 'asfasf', '9000', '2', '0', '1', '2', '0', '1', '2', '0', '1', '0', '0', '1', '2', '0', '1', '2', '0', '1', '2', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,169,170,171,172,173,174,175,176,177', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `vendor` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `vendor`) VALUES
(1, 'test'),
(2, 'testing'),
(3, 'testing test');

-- --------------------------------------------------------

--
-- Table structure for table `vendordetails`
--

CREATE TABLE `vendordetails` (
  `vid` int(10) NOT NULL,
  `vname` varchar(255) NOT NULL,
  `vmobile` varchar(50) NOT NULL,
  `valtmobile` varchar(50) NOT NULL,
  `vemail` varchar(50) NOT NULL,
  `vgst` varchar(50) NOT NULL,
  `vaddress` varchar(255) NOT NULL,
  `vdesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendordetails`
--

INSERT INTO `vendordetails` (`vid`, `vname`, `vmobile`, `valtmobile`, `vemail`, `vgst`, `vaddress`, `vdesc`) VALUES
(1, 'A.D STEEL', '09868412797 , 9212300152', '', '', '', '112, PHASE - 1, UDOG VIHAR   GURGAON', ''),
(2, 'A.K .Engineering', '9891193951', '', '', '', 'B-43 west jyoti nager shahdara  Delhi  110094', ''),
(3, 'A.S ENTERPRISES', '8058825594,  9024115053', '', '', '', 'VILL.GANDHOLA  CHOPANKI  RAJESTHAN', ''),
(4, 'A.S.traders', '9636134786 , 9991987974', '', '', '', 'ward no-8, shop no-7,Near Gupta Dharam Kanta Nuh Road Tauru. Dharuhera', ''),
(5, 'AAJANA METAL INDUSTRIES', '9810962211, 9310946488, 9899565837', '', 'aajanametal@gmail.com', '', '38, RAGHU SHREE MARKET, AJMERI GATE  DELHI  110006', ''),
(6, 'vname', 'vmobile', 'valtmobile', 'vemail', 'vgst', 'vaddress', 'Description'),
(7, 'Aastha Tiles and Developers  Pvt Ltd.', '9811145002', '', 'aasthatiles.ggn@gmail.com', '', 'GUR', ''),
(8, 'AB  Sea Container Pvt. Ltd', '09873690621 , 9810022080', '', 'yogesh.sairam@gmail.com', '', 'F-87 Vishwakarma Colony Tuglakabad New Delhi  110044', ''),
(9, 'ABB INDIA LIMITED', '9810858694, 0129-2275592', '', 'vinay.agrawal@in.abb.com', '', '14, MATHURA ROAD  FARIDABAD', ''),
(10, 'ABDUL USMAN', '9812186286 , 9802554786 , 9992280299', '', '', '', 'BOLDER 20', ''),
(11, 'ABHISHEK MARBLE', '0129-4043126, 9811707455', '', '', '', 'FARIADABAD SHOP NO . 10, 13 MARBLE MARKET, SEC 21C FARIDABAD', ''),
(12, 'ABHISHEK PAINT / HARDWARE & PLYWOOD STORE', '9646197001, 9878923041', '', '', '', 'NEAR DHINDSA PETROL PUMP , BADSON ROAD  PATIALA', ''),
(13, 'Acc concrete', '9670000000', '', 'jagpal.singh@acclimited.com', '', 'PLOT NO. GL28,GL38,GL39, VILLAGE SANKOL , GAMPATH DHAM IND.AREA BAHADURGARH', ''),
(14, 'ACC LTD Faridabad', '9582217146 , 09582217001', '', 'anand.kumar2.ext@acclimited.com', '', 'sarai khwaja chock FARIDABAD', ''),
(15, 'Acc Ltd.', '7060077688', '', '', '', 'sales unit office dehradun NCR Plaza, 26 A new cantt. road dehradun 248001', ''),
(16, 'Acme cc products', '9811295337 , 0124-2580151', '', 'anujgupta@acmeccproducts.com', '', 'O-16 south city-1  gurgaon', ''),
(17, 'ACTION CONSTRUCTION EQUIPMENT LTD.', '01275-280147,48', '9540998050', 'tc.1@ace-cranes.com', '06AAACA6189P1Z5', '4th Floor|Pinnacle|Surajkund|Faridabad NCR-121009', 'ACE CRANE'),
(18, 'ACTIVE CRANE ENGINEERS', '9811454649 , 09810507649', '', 'activecrane@gmail.com', '', 'KAMAL VIHAR, BHARAT COLONY', ''),
(19, 'Active Enterprises', '9868067441 , 9212627441', '', '', '', 'Add - H.no. -24/9, qutab vihar Ph-11.Gali no.-14  New Delhi 110071', ''),
(20, 'Adarsh Consultant & Engineer', '011-25358614 , 9210885853 , 9313286451', '', 'adarshmtv1995@gmail.com', '', 'H-45, Mohan Garden ,Uttam Nagar  New Delhi 110059', ''),
(21, 'ADROIT INTERNATIONAL', '9999595934, 011-23932104', '', 'sameer.dalmia@gmail.com, sameer@adroitintl.com', '', '54-55, BAGH DEWAR , FATEHPURI  DELHI', ''),
(22, 'Adros System', '9810296759', '', '', '', '20/2/7, Dr. Burman Marg, Site-4, Sahibabad Industrial Area, Ghaziabad', ''),
(23, 'ADVENT CONCRETOVISION', '9891765005, 9810411720', '', 'www.adventconcretovision.com', '', 'ADJOINING FARIDABAD CONVENT SCHOOL , MUJERI ROAD  BALLABGARH  FARIDABAD', ''),
(24, 'AEROLAM INSULATIONS PRIVATE LIMITED', '91-79-26872108 , 91-9428413305', '', 'exports@aerolaminsulations.com', '', '501/ MAURYA ATRIA . OPP. KALGI APPT .NR.ATITHI DINING HALL . JUDGES BUNGLOW ROAD ,BADAKDEV AHMEDABAD - 54', ''),
(25, 'AGARWAL CONCRETE', '7838343450', '', 'agarwalconcrete@gmail.com', '', 'BEHIND IMT POWER HOUSE  BALLABGARH', ''),
(26, 'Agarwal Ready Mix Private Limited', '7568786121, 7568786127', '', 'readymixagarwal@gmail.com', '', 'Corporate Office: SP1-A3, RIICO Industrial Area Tapukara, Distt. Alwar Rajasthan', ''),
(27, 'AGGARWAL COMPRESSOR WORKS', '9599545018, 9810073410', '', 'rhlgupta055@gmail.com', '', 'SEC-21D , VILLAGE ANKHIR , NEAR BADKHAL LAKE  FARIDABAD', ''),
(28, 'Aggarwal Iron Trader', '9210436353 , 9250931192', '', '', '', 'sihi gate , balabgard faridabad', ''),
(29, 'Aggarwal Marble Traders', '9818215905,  0124 - 4067905 ,', '9810468905', '', '', 'Plot No. 44 - P , Sec. - 34, Marble Market , Gurgaon 122001', ''),
(30, 'Aggarwal Plywood Co.', '880094794', '', '', '', '9035/1, Multani Dhanda,Paharganj New Delhi', ''),
(31, 'AGGARWAL PLYWOOD COMPANY', '9818571297 , 9811085026', '', '', '', 'DELHI', ''),
(32, 'AGGARWAL TIMBER TRADERS', '9891067001 , 0129-2282175', '', '', '', 'PLOT NO. 1/228 A NEAR GURU DAWARA , TIMBER MARKET SHASTRI COLONY  FARIDABAD', ''),
(33, 'AGGARWAL TRADERS', '9991301130', '', 'aggarwalparmod.1967@gmail.com', '', 'MAIN BAZAR , JUREHRA, DISTT. BHARATPUR (RAJ)', ''),
(34, 'AGGARWAL TRADING CO.', '9810568169, 9810756705', '', '', '', 'SOHNA ROAD , BALLABGARH FARIDABAD', ''),
(35, 'AGGARWAL WOOD INDUSTRIES', '9810447111, 9312434979', '9911275710, 09811406551', 'nimitaggarwal@yahoo.co.in', '', '21/6 G.T ROAD (NEAR STAT BANK OF INDIA) BALLABGRAH, HARYANA', ''),
(36, 'AGROA GREEN BRICKS', '9910867603, 9582848267 , 9050011454', '', 'agroainfra@gmail.com , rahul.agroa@gmail.com', '', '', ''),
(37, 'AHMAD HARDWARE', '9412952825,', '', '', '', 'MOH. CHAUHAN , ROORKI , JAWALPUR HARIDWAR', ''),
(38, 'AHURA MAZDA MFG.CO.PVT.LTD (FIRE DOORS)', '9711210357, +91- 2602780380', '', 'sunil.rana@ahuramazagroup.com', '', 'PLOT NO.1604, 1640/1/2/3/5 G.I.D.C, SARIGAM , DIST. VALSA GUJARAT', ''),
(39, 'AJANTA  ASSOCIATES', '26836853 , 26929121, 9910208881 , 9999859085', '', 'ajanta.associates@gmail.com', '', '75,  11 nd FLOOR, BHARAT NAGAR NEW DELHI 110025', ''),
(40, 'AJANTA STEEL', '4036551 , 2416551', '', '', '', '41 VP NEELAM BATA ROAD NIT FBD SIMS.AppMaster.Model.MVendor', ''),
(41, 'Ajay Enterprises', '9992252299', '', '', '', 'PLOT NO. HI/305 RICCO INDUSTRIES AREA  KHUSHERA BHIWADI', ''),
(42, 'AJAY TRADING COMPANY', '9416553082, 9992930906', '', '', '', 'SOHNA ROAD , DHARUHERA  REWARI', ''),
(43, 'Ajit Singh Building Material', '9310148544', '', '', '', 'Main Bur Stand , Bhangrola Gurgaon', ''),
(44, 'AKG Extrusions Pvt. Ltd.', '9717580083', '', 'akgextrusions@gmail.com', '', 'B-39, Sector-80 Noida', ''),
(45, 'AKG Industries', '09810371064 , 09650183174', '', '', '', 'B-67,Phase-I, Okhla I, Okhla Industrial Area new delhi', ''),
(46, 'AKG Shutterings private limited', '9810312954', '', 'contact@akgshutterings.com', '', 'NH-8 HERO HONDA CHOCK GURGAON', ''),
(47, 'AKG WORLD ASHOK KUMAR GARG & BROS', '8826688041 , 26810704', '', 'akggroup@vsnl.com', '', 'D-186,OKHLA INDUSTRIAL AREA PHASE 1  new delhi', ''),
(48, 'ALCRAFT', '9212164752  ,  4022817', '', 'skpawa@alcraft.in', '', '1 -A , TIKONA PARK , NIT FARIDABAD  SIMS.AppMaster.Model.MVendor', ''),
(49, 'AMAN ENTERPRIZES', '9313802969', '', '', '', 'WZ - 101,B, Sant Garh, Gali No.18,MBS Nagar, New Delhi', ''),
(50, 'Aman Industries', '9873690621', '', 'yogesh.sairam@gmail.com', '', 'H-17/32 , TUGLAKABAD new delhi', ''),
(51, 'AMAR NATH   SHANKAR DASS', '9814040253, 9814738253', '', 'varungoel07@gmail.com', '03ADBPK3889M1Z8', 'NEAR MANDIR TYAGI , SANAURI  PATAILA', ''),
(52, 'AMARPAL', '9050544545', '', '', '', 'JAMUNA SAND 12 SIMS.AppMaster.Model.MVendor', ''),
(53, 'Amba Tiles', '9212089396 , 9899972323', '', 'ekeeshchopra@gmail.com', '', 'Vill. Ladrawan, Bahadurgar Distt. Jhajjar, Haryana', ''),
(54, 'AMBA TRADING COMPANY', '9212223042', '', '', '', 'Village Samas Pur Src. 51 Gurgaon', ''),
(55, 'AMIT KUMAR', '9818095655 , 8010459024', '', '', '', 'GUR (GLASS)  ROSE LAND PUBLIC SCHOOL, NR. HERO HONDA CHOWK , N.H8 GURGAON HR', ''),
(56, 'Amit kumar building material supplier', '9718380087 , 9718829366', '', '', '', 'V.P.OBaroli, sec-80 Faridabad', ''),
(57, 'AMITEX POLYMERS PVT.LTD.', '26321916, 26321976, 9810030712', '', '', '', '17, Tribhuvan Complex, Ishwar Nagar, Friends Colony  New Delhi', ''),
(58, 'AMOL DICALITE LIMITED', '079-40246246 / 26443331 , 09824409904', '', 'anand.pareek@amoldicalite.com', '', '301, \'Akshay\'\', 53 Shrimali Society,Navrangpura, Ahmedabad', ''),
(59, 'ANAND CREATIONS INTERIOR & EXTERIOR SOLUTION', '9873004685,  9873007849', '', 'anandglasscreation@yahoo.co.in', '', 'BY PASS ROAD , BHIND SEC-9 ,  FARIDABAD', ''),
(60, 'ANAND ENTERPRISES', '9213130013, 2415838', '', '', '', 'BUNGLOW PLOT NO. 1E/19, N.I.T  FARIDABAD', ''),
(61, 'ANAND SALES CORPORATION', '0120-4549968, 9810178270, 9311236343,', '', 'anandsales@live.com', '', 'Shop No.-1, VS Plaza, Sector-27, Gautam Budh Nagar Noida (UP)', ''),
(62, 'ANIL KUMAR', '9999613001', '', '', '', 'VILL. ANKHIR ,NEAR DAGAR SERVICE STATION WALI GALI  FARIDABAD', ''),
(63, 'Anil kumar earth mover', '9811578282', '', '', '', 'near fire station, sec-37 Gurgaon', ''),
(64, 'ANIL YADAV BMS', '9811206785', '', '', '', 'SEC  5 NEAR MATA MANDIR GURGAON SIMS.AppMaster.Model.MVendor', ''),
(65, 'ANJANA METAL', '7570429141', '', 'aajanametal@gmail.com', '', 'J-152, 1ST FLOOR , SHYAMJI MAL LANE , SHANKAR GALI, NO. MOTIA KHAN , PAHAR GANJ  NEW DELHI', ''),
(66, 'Ankit Electricals pvt.ltd (Hansel)', '9999765968 , 9999765967', '', 'ankitelectricals@gmail.com', '', 'B-9, Satyam plaza complex,civil lines,jharsa road  Gurgaon 122001', ''),
(67, 'Ankur lighting', '9910483826', '', 'bharat@ankurlighting.com', '', 'E-13, East of kailash \nNew Delhi-65\nsales@ankurlighting.com', 'Light'),
(68, 'ANKUR TRADING CO.', '9927075354', '', '', '', '57, QAZIWAJA , SIKANDRABAD  BULANDSHAHR (UP)', ''),
(69, 'ANS TECHNOLOGIES FBD', '9811704466 , 9311704466 , 9310904466', '', '', '', '3D/15 NIT computer', ''),
(70, 'A-One Industries', '9871771840 , 9818462657', '', 'contact@aoneindustries.in', '', '506, 5th Floor,Ring Road mall Sector –3 Delhi', ''),
(71, 'AP EARTH MOVERS', '9350970368 , 9311656757', '', '', '', 'MANESAR , VILLAGE -NAHARPUR , NEAR SEC -6 , IMT MANESAR', ''),
(72, 'Apex Fire Protection', '9811114567 , 4013517', '', 'parveshapexfire@yahoo.com', '', 'B-321 ground floor , NIT  Faridabad', ''),
(73, 'Aravali stone cursher', '09413303673 , 09829247343', '', '', '', 'neemrana', ''),
(74, 'Ardex Endura India Pvt Ltd.', '09711060889, 9972157312 , 09810882116', '', '', '', 'Plot No 21-22 Block A1, Chattarpur Extension  New Delhi', ''),
(75, 'Arihant Trading Company', '98', '', '', '', 'bharatpur raj', ''),
(76, 'ARMSTRONG WORLD INDUSTRIES  PVT. LTD.', '8800188766 , 0124-2385671', '', 'smittal@armstrong.com', '', '2ND FLOOR, \'C\' WINGS, CHIMES,PLOT NO. 61, SEC-44, Gurgaon', ''),
(77, 'Armstrong world industries (India) pvt. ltd.', '0124-4226381 gurgaon', '', 'helpdeskindia@armstrong.com', '', 'B2,G-01,Marathon Innova ,Off.Ganpatrao Kadam marg, Lower Parel Mumbai 400013', ''),
(78, 'Arpitha Exports', '9910036893', '', 'info@arpithaexports.com ,', '', '3323/A , Chander lok , DLF Phase - IV Gurgaon - 122002', ''),
(79, 'ARUN WATER SUPPLIER', '8396862099,  8199966645,', '', '', '', 'V.P.O GANDHI BOHAR  ROHTAK', ''),
(80, 'ARVIND KUMAR( M.B.T  SOLUTION )', '9813775375, 9811272966, 9868408777', '', '', '', 'VILLAGE PELPA , OFF. ----PLOT NO. 1529, SEC-10A GUR.  JHAJJAR (HR)', ''),
(81, 'Ascentech Lightening Solution', '9891558687 , 9711472021', '', '', '06AAZFA4428R1ZK', 'plot no 150-151/a sector 59 faridabad', ''),
(82, 'ASES Security Pvt. Ltd.', '9711311082 , 8800334794', '', 'sumit.negi@asesindia.com', '', 'ASES House, A-2/69 | G.D. Steel Compound | Site-IV, Sahibabad Industrial Area | Ghaziabad', ''),
(83, 'ASHIANA MANUFACTURING INDIA LTD.', '01493-519800', '', 'amlindia22@gamil.com', '', '', ''),
(84, 'ASHISH CRANE SERVICE', '9812222851, 01276-311851', '', '', '', 'V.P.O SANKHOL , MAIN DELHI ROHTAK ROAD NEAR BARAHI MAUR', ''),
(85, 'ASHOK AIR PRESSURE WORK', '9810073410 , 2420391', '', '', '', 'PARSOON MARG ,ANKHIR ( NEAR BADKHAL) OPP. SEC 21D FARIDABAD', ''),
(86, 'ASHOK KUMAR', '8107445189,  8058496089', '', '', '', 'NEEMRANA  ALWAR', ''),
(87, 'Ashok kumar (RO Water)', '9728192578', '', '', '', 'vijay nager ,ward no.2, Tawdu, Mewat Haryana', ''),
(88, 'ASHOK MITTI', '9812389163 ,  9728196558', '', '', '', 'VILLAGE SEKINDERPUR PALWAL', ''),
(89, 'ASHOK SHUTTERING OIL', '09810806080 , 9811101966', '', 'ashoka.oil.co@gmail.com', '', '9/64 PUNJABI BAGH WEST NEW DELHI', ''),
(90, 'ASHOK TRADING CO.', '9899412503, 4162503', '', '', '', '1K-11, KALYAN SINGH CHOWK NIT  FARIDABAD', ''),
(91, 'Asian Granito India Ltd', '88,006,107,199,313,199,104', '', 'aglasiangranito.com', '', 'E-1/6, 2ND FLOOR , PATEL ROAD NEAR FEDERAL BANK , EAST PATEL NAGAR  NEW DELHI', ''),
(92, 'ASLAM  SAZAD', '9760326749, 9719861042', '', '', '', 'BADHEDI RAJPUTANA  HARIDWAR', ''),
(93, 'Aspiring warp -II Technologies', '09891992357 , 09958514955', '', 'aspiringwrap2@gmail.com', '', 'D-585 , Dabua colony Faridabad', ''),
(94, 'ASSOCIATED CONSTRUCTION COMPANY (satish kumar)', '9999357733 , 9810219412', '', '', '', 'OFFICE : H.NO.1100,SEC -7C FARIDABAD HR', ''),
(95, 'AV VISHWA ENTERPRISES PVT. LTD.', '9818686450 , 09811448769', '', '', '', 'DELHI:UNIT NO. 42; TRIBHUWAN COMPLEX;MAIN MATHURA ROAD; FRIENDS COLONY WEST new delhi', ''),
(96, 'Avaneesh Distributors , MAVAV ENTERPRISES', '09350107050 , 09311411611, 9810720500', '', '', '', 'shop no 3 , 2a /9a b.p.   nit  faridabad', ''),
(97, 'AYAN TRADERS', '9818917466 , 8826405256 , 09818566235', '', 'ayantraders72@gmail.com', '', 'M.G ROAD , NEAR GURU DRONACHARYA METRO STATION  GURGAON', ''),
(98, 'AZAD', '9811461220, 9953968273', '', '', '', 'VILL. BEHRAMPUR SEC. 59 GURGAON', ''),
(99, 'B.D. ENGINEERS', '4069099', '', '', '', 'B-324 FIRST FLOOR NIT, NEHRU GROUND\nFaridabad', ''),
(100, 'B.E.C INDUSTRIES', '09871716151 , 11-47113333, 28111800 , 09971802300', '', '', '', 'C 108 Mayapuri Industrial Area (Phase II) New Delhi', ''),
(101, 'B.S.B. CONTRACTOR', '9996661884, 9991537782', '', '', '', 'MAIN MATHURA ROAD, TATARPUR MORE, VILLAGE PRITHLA  PALWAL  121102', ''),
(102, 'BABA BHAGWAN DAS', '9783086611', '', '', '', 'BILASPUR 42', ''),
(103, 'Baba bricks udyog , Parmhansh trading company', '09416636489, 7500200040', '', '', '', 'sec- 59,  balabgard faridabad', ''),
(104, 'BABA BUILDING MATERIAL', '93155120741 , 9992010741', '', '', '', 'DHANI CHANDPUR, BAWAL ROAD , REWARI 123401 HR', ''),
(105, 'Baba grit suppliers', '9812133398, 9610020647', '', '', '', 'Pahari (Bharatpur)  Rajasthan', ''),
(106, 'BABLI', '8800695640', '', '', '', 'DK BUILDCON PVT LTD', ''),
(107, 'BABU BUILDING MATERIAL', '9811786755, 9211275765', '', '', '', 'S.NO. 29 , L.N.J.P COLONY MKT, OPP. NEHRU HILL, NEAR ZAKIR HUSSAIN COLLAGE  NEW DELHI', ''),
(108, 'BACHCHOO SINGH', '9412661949', '', '', '', 'VILL.POST-PAIGAON , TEH. CHHATA ,  MATHURA', ''),
(109, 'BAJAJ STEEL', '9818297203, 9311297203', '', '', '', '2L/62, B.P  FARIDABAD', ''),
(110, 'BAJRANG HARDWARE', '4027352  , 2417352 , 2412486', '', '', '', 'TEST ADDRESS 178, TIKONA PARK , N.I.T FARIDABAD HARYANA SIMS.AppMaster.Model.MVendor', ''),
(111, 'BAJRANG MARBLE MAHADEO STONE INDUSTRY', '2417352 , 9811707455 , 9829038622', '', '', '', 'F-263(F), INDERPRASTHA AREA , ROAD NO-5, KOTA - 324005(RAJ)', ''),
(112, 'Bajrang Spun pipe udyog', '9466586918 , 9416882706', '', '', '', 'village gokalpur distt.  rewari', ''),
(113, 'BAJRANGI (BRICKS)', '9310389751, 9810389751', '', '', '', 'OKHLA NEW DELHI', ''),
(114, 'BALA JEE FABRICATORS &  BRICKS', '9540464488', '', 'balajeefab@gmail.com', '', 'PLOT NO. 55, HARFALLA ROAD , VILLAGE -SEEKRI, BALLABGARH  FARIDABAD', ''),
(115, 'BALA JI BMS', '9050719730  , 8816898917 , 07568450602', '', '', '', 'VILL. BHORI , NEAR ATELI DISTT . MOHINDER GARH HARYANA', ''),
(116, 'BALA JI BUILDING MATERIAL SUPPLIER & EARTH MOVER', '9466446513,  9254005009', '', '', '', 'NEAR SAHID MAJOR SAJAN SINGH STADIUM, KHEDI SAAD ROHTAK', ''),
(117, 'BALA JI ENTERPRISES BMS', '9971794817, 9818208709', '', '', '', 'A-1969, 2ND FLOOR GREEN FILED COLONY FARIDABAD', ''),
(118, 'BALA JI IRON STONE', '9412307016 , 9837436420', '', 'balajiironstorekankhal@gmail.com', '', 'DADUBAG , SHARVAN NATH MARKET JWALAPUR ROAD  UTTARAKHAND', ''),
(119, 'BALAJEE FABRICATORS, BRICKS', '9540464488', '', 'balajeefab@gmail.com', '', 'PLOT NO. 55 ,  HARFALLA ROAD , VILL, SEEKRI BALLABGARH  FARIDABAD', ''),
(120, 'H R TRADERS (RAHUL)', '9560933004 ,  9711971325', '', '', '06CFNPS7232C1ZC', 'SHOP NO 203/9 BARH MOHLLA NEAR BHARAT FURNITURE FARIDABAD', ''),
(121, 'Balaji Enterprises', '8826747333, 9812338870', '', '', '', 'Village Palra, Near Badshahpur, Sohna Road Gurgaon', ''),
(122, 'BALJEET TRADERS  ((N.K Gandhi (Gaurav Sharma)', '9650016321,7428441421,0129-2503247,9350673954', '', '', '', '968, Sector-29,Opp.Bangali Sweet, Faridabad', ''),
(123, 'BALVEER SAINI & EARTH MOVERS', '9818237740 , 9811186059', '', '', '', 'SAHIBABAD LINK ROAD, NEAR TYAGI PETROL PUMP , PRAHLAD GARHI, MAIN STAND  GHAZIABAD', ''),
(124, 'Bansal enterprises', '9254087300', '', 'bansalenterprises15@gmail.com', '', 'dadri rohtak road rohtak', ''),
(125, 'BANSHI LAL', '9717443758,  9910697829', '', '', '', 'VILLAGE . NAHARPAR , NEAR SEC. -6 , IMT MANESAR  GURGAON', ''),
(126, 'BATH BEYOND PARADISE', '9899479029, 8744056370', '', 'bbp2009@gmail.com', '', '511/5A, GOVINDPURI, OPP. HYUNDAI  SHOWROOM , KALKAJI  NEW DELHI  110019', ''),
(127, 'Bath Selection', '9811468512 , 0124-4146307 , 9711549399', '', '', '', 'dhrona charya  Gurgaon Haryana', ''),
(128, 'BATRA ENTERPRISES', '9810178328', '', '', '', '', ''),
(129, 'BCC CEMENT PRIVATE LIMITED .', '29244444,', '', 'bccdel@vsnl.net', '', '87A/1 11ND FLOOR , ZAMRUDPUR, OPP. N-115,G..K.-1 NEW DELHI  110048', ''),
(130, 'BD BANSAL & SONS (STEEL)', '0129-4030278 , 9811253877', '', '', '', 'B-233 NEHRU GROUND FARIDABAD SIMS.AppMaster.Model.MVendor', ''),
(131, 'BEDI SAXENA SERVICE STATION', '9810030058, 59', '', '', '', 'REWARI LINE INDUSTRIAL AREA , PHASE -1 , MAYAPURI  NEW DELHI', ''),
(132, 'Bellstone Hi-Tech International', '9971550775. 9971555775', '', 'marketing@bellstone.in', '09AADFB4096J1Z7', 'room plot no,b-16,sec a-1, industrail area, tronica city, LONI Ghaziabad (UP)', ''),
(133, 'BENIWAL EARTH MOVERS', '9999775067', '', '', '', 'OPP.PLOT NO. 76-77, SEC-25, GALI NO.5  KRISHNA COLONY faridabad', ''),
(134, 'BEST AGENCIES', '9810042002, 9871093252', '', '', '', 'HALL NO-3 , CABIN NO 2 , 2ND FLOOR PLOT NO. D-478, PALAM EXTN. SEC -7 DWARKA  NEW DELHI', ''),
(135, 'bhagwandass and sond', '9896277433', '', '', '', 'jhajjar road rohtak SIMS.AppMaster.Model.MVendor', ''),
(136, 'Bhagwati Enterprises', '9810842450, 2411310', '', '', '', '1K/93, phawra singh chowk, n.i.t  Faridabad', ''),
(137, 'BHAGWATI FURNISHERS', '2411339', '', '', '', '1-G/55, KALYAN SINGH CHOWK ,N.I.T  FARIDABAD', ''),
(138, 'BHAMBRA OVERSEAS', '8750062574, 8750062590, 08750062584', '', 'sales1@bhambraglass.in , bh', '', 'DUDHOLA DHATIR ROAD PRITHLA PALWAL', ''),
(139, 'BHARAT BRICKS INDUSTRIES ( jain bricks)', '9219552482, 9911166532', '', '', '', 'HODAL - PUNHANA ROAD , VILL. SINGAR ,TEC. PUNHANA   MEWAT', ''),
(140, 'BHARAT ENGINEERING WORKS', '9811375929, 9811799316', '', 'bharatew@gmail.com', '', 'PLOT NO. 55, JEEVAN NAGAR PH.11, WAZIERPUR ROAD NAHAR PAAR FARIDABAD', ''),
(141, 'BHARAT OIL COMPANY', '9717088117 , 011-26839978 , 26917264 , 9310674919', '', '', '', '169, KAILASH HILLS, EAST OF KAILASH NEW DELHI SIMS.AppMaster.Model.MVendor', ''),
(142, 'BHARAT PEST CONTROL', '9810118729', '', '', '', '4A, RAMAPLACE , 1ST FLOOR , NEELAM FLYOVER , FBD SIMS.AppMaster.Model.MVendor', ''),
(143, 'Bharat trading co.', '46207620', '', 'btcnewdelhi@gmail.com', '', '505, vishwa sadan  tower , disst. center , Janakpuri New Delhi', ''),
(144, 'Bhardwaj Trade Links', '011-65150089, 9810166543', '', '', '', '8780,Roshan Ara Road , Delhi 7', ''),
(145, 'Bhatat Glass Company', '9728000054 , 9812041620', '', 'bbbathla@gmail.com', '', 'Quter Quilla Road Rohtak', ''),
(146, 'BHATI BMS', '9250547386 , 9212219333 , 9911987655', '', '', '', 'BOOTH NO 31 SEC 17 FBD SIMS.AppMaster.Model.MVendor', ''),
(147, 'BHERU LAL', '9810267563 , 09001607163', '', '', '', 'COMPRESSOR GUR NEAR G.P -51 , SECTOR - 18 , SARHAUL , GURGAON SIMS.AppMaster.Model.MVendor', ''),
(148, 'BHOJRAJ & SONS DEEPAK GUPTA', '9810033255 , 9212793048', '', '', '06AFLPG9026Q1ZV', 'GURGOAN (NAILS) bhojrajandsons@rediffmail.com', ''),
(149, 'BHUMI MINERAL WATER', '9910919702, 8745066801', '', '', '', 'DARBARI PUR , SEC-69, BADSHAPUR  GURGAON', ''),
(150, 'BIDHARAM PARJAPATI', '8130743360,  9810522501,', '', '', '', 'SATBADI PHADI BHARTPUR RAJ.', ''),
(151, 'BIJENDER SINGH', '9991914888, 9416228605', '', '', '', 'PREM CHAUDHARY DHARM KANT , NEAR TAU DEVI LAL PARK  BAHADURGARH', ''),
(152, 'BILAL JCB MOVER', '09416513703 , 9896546179', '', '', '', 'VILL. SHRI NAGAR , P.O. AURANGABAD DISTT. FARIDABAD SIMS.AppMaster.Model.MVendor', ''),
(153, 'BILTECH BUILDING ELEMENTS LTD.', '9810281884 , 9811076657', '', 'yatin.srivastava@biltechindia.com', '', '232 B, Okhla Industrial Estate Phase III New Delhi  110020', ''),
(154, 'Bitu chem industry', '9910368313', '', '', '', '54,daryaganj newdelhi', ''),
(155, 'BITUMEN SALES CORPORATION', '+919811333320, 011-23215881, 011-26692858', '', 'sidharth_bsc@yahoo.com', '07ADHPJ2339K1ZG', '7/3938 behind hdfc bank, G.B. ROAD, DELHI 110006', ''),
(156, 'BMR MARBLE', '9416261730 , 9416553082 , 9416553083', '', 'bmrmarble@gmail.com', '', 'SOHNA ROAD NEAR PNB DHARUHERA', ''),
(157, 'BOMBAY INTERIORS', '0175-2302365', '', 'bombayinteriors.seth@yahoo.com', '', '', ''),
(158, 'BPT POLYMERS', '0120-3211047, 9312632907, 9350633722,9899789481', '', 'fixopan.pvc@gmail.com', '', 'E-99, Sector-6, Noida, G.B.Nagar(U.P.) 201301', ''),
(159, 'BS BUILDING MATERIAL CARRIER', '9313315472 , 9891919772', '', '', '', 'SEC 10 A CHOWK NEAR HIMGIRI SCHOOL , GURGAON', ''),
(160, 'BS CONSTRUCTION CHEMICAL', '9811165500 , 9810110134', '09540169737', '', '', '24 FIRST FLOOR JAIN COMPLEX GURUDWARE ROD GUR.', ''),
(161, 'BSC INTERIORS PRIVATE LTD.', '9654521000', '', '', '', 'BSC INTERIORS PVT.LTD. 12 SIRI FORT ROAD GF  NEW DELHI', ''),
(162, 'BUDHPUR BRICKS UDHYOG (RK BMS)', '9315510155', '', '', '', 'RIWARI', ''),
(163, 'BUILDCON EQUIPMENT', '91-011-41410902/03/04 , 9811150929', '', 'INFO@BUILDCON.CO.IN', '07AAGPK3701Q1ZI', 'C-159 ROOM NO 115 1 FLOOR NARAYENA NEW DELHI', ''),
(164, 'BVM GLASS & ALUMINIUM CRAFTS', '8860638706,  9990822889', '', 'manish_tewatia@yahoo.com', '', 'FCA 51 , 100 FEET ROAD , CHAWLA BALLABGARH  FARIDABAD  121004', ''),
(165, 'C.C. CONSTRUCTIONS', '9818096777', '', '', '', 'A4/20, PEPSI ROAD,HARIT VIHAR,NEAR EKTA BUILDER BURARI NEW DELHI', ''),
(166, 'CAPRI BATHAID P LTD', '-22263300', '', 'hq@gmgr.net', '', '3370 ,HAUZ QAZI , DELHI - 110000 SIMS.AppMaster.Model.MVendor', ''),
(167, 'CC ENTERPRISES', '27613100 , 27613000 , 9910032555', '', 'ccconstruction_Raj@yahoo.co.in', '', 'A-4/20 PEPSI ROAD, HARIT VIHARDELHI SIMS.AppMaster.Model.MVendor', ''),
(168, 'CEG Test House And Research Centre Pvt. Ltd.', '7073089998,9982650232, 0141-4046599', '', 'gtm.bd3@cegtesthouse.com, gtm.bd1@cegtesthouse.com', '', 'B-11(G), Malviya industrial area JAIPUR', ''),
(169, 'Ceiling impex pvt .ltd', '011-41834225/125 , 9818184027', '', 'accounts@ciplgroup.com , cnarula@ciplgroup.com', '', 'C-17,okhla industrial area, phase -1, New Delhi', ''),
(170, 'Cenlub Systems', '9818558267', '', '', '06AABFC9427E1ZO', '42, dlf industrial estate  faridabad', ''),
(171, 'CENTURY PLYBOARD (I) LTD.', '8053742959', '', 'tarunp.singh@centurply.com', '', 'LOWER GROUND FLOOR , RAO PRAHLAD APARTMENT , M.G ROAD SIKANDERPUR  GURGAON', ''),
(172, 'Century Plyboards (I) Limited', '9999131845, 08588884792', '', '', '', '203, Rajnigandha Building, 5/2, D. B. Gupta Road, Paharganj, New Delhi', ''),
(173, 'CH.SURAJ PAL', '9810213119, 9810613119', '', '', '', 'OPP SEC-9, NEAR INDIAN OIL R&D CENTRE   AGRA CANAL BYE PASS RD , faridabad', ''),
(174, 'CHADHA SCRAP CO.', '9878030745', '', '', '', 'JHILL CHOWK , SIRHIND ROAD  PATIALA', ''),
(175, 'Chaitanya Impex', '98,112,338,839,312,695,296', '', 'tarangg@canvasfabric.in', '', '', ''),
(176, 'CHAND SINGH', '0124-3208019 / 9312321552', '', '', '', 'NEAR OBC BANK, BUS STAND, MANESAR, GURGAON SIMS.AppMaster.Model.MVendor', ''),
(177, 'Chandila Building Material Supplier', '9599090000,  9582820087', '', 'KULDEEPCHANDILA@YAHOO.COM', '', 'B-459, basement, nehru ground, near P.N.B bank N.I.T Faridabad', ''),
(178, 'CHARDI KALA ENTERPRISES', '0129-2412765, 8860304294', '', '', '', '1A/65, N.I.T  FARIDABAD', ''),
(179, 'CHAUDHARY BUILDING MATERIAL SUPPLIER', '09350545199 , 9899492749', '', 'pankajyash09@yahoo.com', '', 'H. NO. 324, SEC-15A, FARIDABAD (HR.) SIMS.AppMaster.Model.MVendor', ''),
(180, 'CHAUHAN EARTH MOVERS', '9990200270 , 9818935047', '', '', '', 'SEC 8 , IMT MANESAR , GURGAON SIMS.AppMaster.Model.MVendor', ''),
(181, 'Chawla fire protection engineer pvt ltd', '011-42458300. 42458301', '', 'chawlafireprotectionengineers@yahoo.com', '', 'A56 ,phase 11 ,Mangolpuri industrial area  New Delhi 110083', ''),
(182, 'Chawla Ispat Pvt Ltd', '9936400333', '', '', '', 'Galla Mandi, Rudrapur', ''),
(183, 'CHHITARMAL & RAHUL (COMPRESSOR) OM DHAWAJAVAND ENTER.', '9971248532 , 9958178779 , 09829978336', '', '', '', 'GUR SHOP 86, SEC 5 SHEETLA MATA ROAD NEAR PRINCE VATIKA GUR SIMS.AppMaster.Model.MVendor', ''),
(184, 'Chittarmal Shankar lal', '23550485, 64146580', '', '', '', '8758, multani Dhandha, Pahar Ganj New Delhi', ''),
(185, 'Choksey Chemicals Pvt Ltd', '(011) 23535171 , 9891681149', '', '', '', '74-A, Opposite Jhandewalan Mandir, Rani Jhansi Road,  Paharganj, Delhi', ''),
(186, 'CHOPRA ALLUMINIUM', '011-26366904 , 26366905', '', 'ykbahal@vsnl.net', '', 'D-78A , VISHWAKARMA COLONY, MB ROAD NEW DELHI', ''),
(187, 'CHOUDARY BHOLA WATER & COMPRESSER CONTRACTOR', '9910813632', '', '', '', 'SEC 21 FARIDABAD SIMS.AppMaster.Model.MVendor', ''),
(188, 'CHOUDARY BMS', '9255566751 , 9350545199', '', '', '', 'MEETROL , HODAL , PALWAL SIMS.AppMaster.Model.MVendor', ''),
(189, 'CHOUDHARY TRADERS', '9728010606 , 9812230021', '', 'lovelytaneja54@gmail.com', '', 'PALWAL', ''),
(190, 'Chowgule Construction Technologies Pvt. ltd.', '9811824799 , 9899717189', '', 'sharmar.cct@chowgule.co.in', '', 'Bakhtawar 4th floor nariman point  Mumbai', ''),
(191, 'CICO TECHNOLOGIES LIMITED', '9643335139', '', 'rajeshkumar@cicogroup.com', '', '3 km basai road , gugaon', ''),
(192, 'Cipy Polyurethanes Private Limited', '9011066621 , 8888861882 , (20)-66316433', '', '', '', 'Manjusha Sakpal (Assistant General Manager) Maharashtra', ''),
(193, 'Cobble Stone Pvt Ltd Ram Babu Delhi Stone Suppliers', '(011) 26364399 , 9811885353 , 9210447177', '', 'cobble.stone@aol.com', '', '1a,Shop No-2, Kishore & Co. Indian Oil Petrol Pump, Mehrauli Badarpur Road,  delhi', ''),
(194, 'Commercial Equipment', '9971990145 , 09810883228', '', '', '', 'E-19, Flatted Factory Complex Rani Jhansi Road, Jhandewalan', ''),
(195, 'CONCEPT CARRIER', '9414012944', '', '', '', '25, DHABA COMPLEX, BHIWADI SIMS.AppMaster.Model.MVendor', ''),
(196, 'CONSOLIDATED CARPET INDUSTRIES LIMITED. CCIL', '9888889077', '', 'rajbir@ccil.in', '', 'PLOT NO. 4A , FIRST FLOOR , ADHCHINI, SHRI AUROBINDO MARG. NEW DELHI', ''),
(197, 'Conspec Container Services Pvt. Ltd', '9999990176 , 7838358396', '', 'delhidepot@conspec.co.in', '', 'Plot No.12/2, Old Sher Shah Suri Marg,Sector-37  Faridabad', ''),
(198, 'Contact us HIL Limited', '+91 40 30999000 , 9490164722 , 9717545577', '', '', '', 'Sanatnagar, 		 Hyderabad- 500018, A.P,', ''),
(199, 'Crompton Greaves Limited', '7838487569', '', '', '', 'Express Building,9-10, Bahadur Shah Zafar Marg,Near ITO Crossing, New Delhi', ''),
(200, 'DAGA TRADING CO.PVT.LTD', '0129-2420434,', '', 'daga@dagagroup.in', '06AAACD2847D1Z2', 'B-618, 1ST FLOOR , NEHRU GROUND N.I.T  FARIDABAD', ''),
(201, 'DASHMESH SHUTTERING STORE', '9815388663, 9915509500,', '', 'dashmeshshuttering.com ,', '', 'Plot No. 101 Singla Enclave pakhowal road ludhiana', ''),
(202, 'DATA SPECIAL STEEL', '0129-4020001,  9811368001', '', '', '', 'PLOT NO. 60/5 , METAL BOX COMPOUND , INDUSTRIAL AREA N.I.T  FARIDABAD', ''),
(203, 'Daxcon construction company', '9711007542, 9818007542', '', 'daxconconstruction@gmail.com', '', '5D-8E, 1st floor , neelam railway road n.i.t  Faridabad  121001', ''),
(204, 'DAYA SHANKAR SHARMA', '9828086497, 9314636497', '', '', '08APSD8347JIZA', 'N.H. AJMER ROAD DEVLIYA BANGRU JAIPUR', ''),
(205, 'DECORE STEELS', '9414415432, 9829658041', '', 'in_decoresteels@rediffimail.com', '', 'BADA BAJAR BEHROR  ALWAR', ''),
(206, 'DEEP BATTA', '9911293610', '', '', '', '', ''),
(207, 'DEEP BUILDING MATERIAL PARVEEN', '9718580400 , 9718582400 , 9034840148', '', '', '', 'PRILTHLA, PALWAL   stonedust', ''),
(208, 'Deep building material supplier', '9811609000 , 9599090000', '', 'kuldeepchandila@yahoo.com', '', '5 F -41 A nit faridabad', ''),
(209, 'DEEP ENTERPRISES', '9891022919', '', '', '', 'KHASRA NO 29/5, GALINO 6 MASTER MOHALLA LIBASPUR DELHI', ''),
(210, 'DEEPAK AHUJA', '9810007298 , 9818720613', '', '', '', '993 SEC 16 FBD SIMS.AppMaster.Model.MVendor', ''),
(211, 'DEEPAK EARTH MOVERS', '9818406851, 9810140771', '', '', '', 'N.H.-8 NEAR PACE CITY PETROL PUMP,36TH MILE STONE HARI NAGER, GURGAON', ''),
(212, 'DEEPAK ENTERPRISES', '9461031857 , 9999798777', '', '', '', 'PLOT NO. 1 , NAWADA EXTN, UTTAM NAGAR NEAR ALLAHABAD BANK  NEW DELHI', ''),
(213, 'DEEPAK MARBLE & GRANITE', '9876305901 , 9413910478', '', '', '', 'NEAR ASHIANA , BAGEECHA ALWER BYE PASS ROAD  BHIWADI (RAJ)', ''),
(214, 'DEEPAK MARBLE HOUSE', '09416303321 , 9729637214 , 09310993109', '', '', '', 'RAIWAY CHOCK, BY PASS ROAD , HODAL PALWAL  121106', ''),
(215, 'Deepak Plywood', '9350195004', '', '', '', 'A-3, Hari Nagar, Jaitpur Road, Badarpur, Delhi - 110044, Opposite Rama Garden badarpur , delhi', ''),
(216, 'DEEPAK SAFETY TANK', '9213600214 , 9210007638 , 9873308610', '', '', '', 'NAMBERDAR MARKET , VILL, NAHARPUR ( KASAN),IMT MANESAR , GURGAON SIMS.AppMaster.Model.MVendor', ''),
(217, 'DEEPAK TRADERS', '9810198598, 4100094', '', '', '', 'D.S.S. 45-46 , MARBEL MARKET , SEC - 21C FBD cement', ''),
(218, 'DELHI BUILDERS STORES', '9811019797 , 9899109797 , 9810067067', '', 'info@dbsbp.com , sales@delhibuilder.com', '', 'SIR SHOBHA SINGH BUILDING , 5253-54, SHRADHANAND MARG AJMERI GATE DELHI', ''),
(219, 'DELHI SHUTTERING HOUSE', '9811882334 , 9015416065', '', '', '06AZTPS1631D1ZA', '39 MILESTONE NH-8  NARSINGHPUR NEAR SHANI MANDIR JAIPUR ROAD , gurgaon', ''),
(220, 'Delhi steel & cement', '9212038372', '', '', '', 'Jal vihar colony  , sec-46  Gurgaon', ''),
(221, 'Deshwal khad beej bhandar', '09991166116 , 09416762340', '', 'deshwal66@gmail.com', '', 'vpo mahna faridabad', ''),
(222, 'DEV BUILDING MATERIAL SUPPLIER', '9982262400 , 9983804191 , 9413588681', '', '', '', 'BHIWADI TAPPU', ''),
(223, 'DEVENDER BMS NARNOL', '9813700918 , 9253302810', '', '', '', '', ''),
(224, 'DEVENDER EARTH MOVERS', '9416486219  , 9991914888', '', '', '', 'OMEGA    PREM CHOUDHARY DHARMKATA, DELHI - ROHTAK ROAD , BAHADUGARH, DISTT. JHAJJAR', ''),
(225, 'DEVESH FREIGHT CARRIER ( YADAV TRANSPORT )', '9811366766, 9810408624', '', '', '', 'SHOP NO. 214 , KRISHAN PLAE , NEAR SOHNA CHOWK  GURGAON', ''),
(226, 'DEVI KARAM ASSOCIATES', '9212011576', '', 'sales@devikaram.com', '', 'H-31 , SD MANDIR ROAD , UTTAM NAGAR  NEW DELHI', ''),
(227, 'DEVI LAL', '9873081004, 9999326677', '', '', '', '24th MILE STONE , DELHI MATHURA ROAD , JHARSAINTLY  BALLABGARH', ''),
(228, 'DEVILAL', '9996218161 , 9996842729', '', '', '', 'VILLAGE PRITHLA (PALWAL) SIMS.AppMaster.Model.MVendor', ''),
(229, 'DEVRAJ KUMAR PAL', '9319248056, 9528671122, 9997229129', '', '', '', 'ROSHNABAD HARIDWAR', ''),
(230, 'Dhanlaxmi khad beej bhandar', '7568973123', '', '', '', 'bus stand rajender complex rajasthan', ''),
(231, 'Dhansingh  Chaudhary', '9045185216', '', '', '', 'Cotwan Kosiklan', ''),
(232, 'Dharamvir deshwal', '9991166116 , 8222888156', '', '', '', 'Palwal', ''),
(233, 'Dharmender BMS', '9991139449 , 9996773767', '', '', '', 'VILLAGE . SULTAN PUR , TESHIL& DISTT. PALWAL HARYANA', ''),
(234, 'DHEERAJ TRADERS', '01493-221797, 9414333355', '', '', '', 'TIJARA ROAD , BHIWADI  ALWER', ''),
(235, 'DHRUV INTERNATIONAL', '8285519555, 7827273464', '', 'atulnandanil@gmail.com', '06AEWPJ6916L1ZS', 'SHOP NO. 102, SEC-7A , HUDA MARKET , NEAR SATYA PLACE  FARIDABAD', ''),
(236, 'DIAMOND DISEL SALES & SERVICE', '9810831297 , 9818677028', '', 'Diamond_diesel_fbd@yahoo.in ,', '', '20A, INDUSTRIAL AREA , DHANDA COMPLEX, N.I.T.  FARIDABAD', ''),
(237, 'DIAMOND EDGE', '9811671933, 9811011933, 011-29963946', '', 'karan_sakhuja@yahoo.com,  diamondedgeindia.com', '', '56-D , KHANPUR   NEW DELHI', ''),
(238, 'Digital Solutions', '0129-4036455 , 9899961246', '', 'digitalsolutions@airtelmail.in', '', 'B-425-426, Nehru Ground ,Nit , Faridabad 121001', ''),
(239, 'Dilip chouhan', '9971478941', '', '', '', '3 no.nehru colo, pullia wali road,  dabua colony  nit  Faridabad', ''),
(240, 'DILSHAD KHAN D.K. CREATIONS', '9871432003,9209992192', '9649871613', '', '', '', ''),
(241, 'DINESH BROTHERS', '2268595 , 9999712411', '', '', '', 'T.C.C. COMPLAX , SEC 10 SEC 10-11 DIVIDING ROAD Faridabad', ''),
(242, 'DISHA SALES', '09810184114 , 08750570569 , \"9910895965\"\"\"\"', '', 'dishasales.32@gmail.com', '', 'JAIPUR 6/280, VIDYADHAR NAGAR , JAIPUR - 302023 SIMS.AppMaster.Model.MVendor', ''),
(243, 'Divine Thermal Wrap Pvt. Ltd.', '9810622385 , 9810213162', '', 'info@divinethermalwrap.com', '', '180-C, IIND floor, Jeevan Nagar,  New Delhi', ''),
(244, 'DIXIT KATHURIA', '9213274211, 9873460007', '', '', '', '20/2 , MAIN MATHURA ROAD ,NORTHERN INDIA COMPLEX , NEAR YMCA  FARIDABAD', ''),
(245, 'DK YADAV (WASH SAND)', '9818063755     ,  9818412676', '', '', '', 'PACHGAON TO MOHMADPUR ROAD, GURGAON    HARYANA SIMS.AppMaster.Model.MVendor', ''),
(246, 'DOOR AUTOMATION PVT.LTD', '41450539, 9810209770', '', 'doorauto@gmail.com', '', '8C/6 , 1st FLOOR  , W.E.A , ABDUL AZIZ ROAD , KAROL BAGH  NEW DELHI', ''),
(247, 'DORMA India Private Limited', '98100 57660 , 9910007055, 01147684799', '', 'vikas.chawla@dormaindia.com', '', '4th Floor, VIPPS Centre Plot No 2, LSC, Masjid Moth Greater Kailash , Delhi', ''),
(248, 'DORSET KABA SECURITY SYSTEMS PVT. LTD.', '8288844906 , 08130499100 , 9717997312', '', '', '', 'A-88, Road No-2, Mahipalpur Extension, NEw Delhi-110037.', ''),
(249, 'DS CARRIER', '09313821921 , 09992105731', '', '', '', 'PATOUDI ROAD , HAYATPUR GURGAON india', ''),
(250, 'Dura Build Care Pvt. Ltd.', '011 - 25050236/7/8 , 09911117296', '', 'swarup@durabuildcare.com', '', '104-106 Dimension Deepti Plaza,Plot No.-3, LSC, Pocket - 6 Nasirpur Dwarka , New Delhi', ''),
(251, 'ecovision', '9810309630, 9810279630', '', 'info@ecovision.in', '', 'D-15 & 16, Site B, UPSIDC, Surajpur Industrial Area  Greater Noida,Uttar Pradesh', ''),
(252, 'Ekdantam infra Pvt Ltd', '9810115989 , 9650669768 , (11)-29840289', '', '', '', '56,GF Vinobapuri,Lajpatnagar-II,', ''),
(253, 'ELECTRICAL ENGINEERING WORK', '9999627256', '', '', '', 'G-82, JAITPUR EXTN. BADARPUR  NEW DELHI', ''),
(254, 'ELEMENTE HOMES PVT.LTD.', '05946--235401', '', '', '', 'DEWAL CHOR , RAMPUR ROAD , HALDWANI  NAINITAL', ''),
(255, 'ELXIRE IT SERVICES PVT. LTD', '9643104718', '', 'pankaj@elxireit.in', '', '5A-13, B.P 2ND FLOOR NIT FARIDABAD', ''),
(256, 'EMPIRE TUBEWELLS (P) LTD.', '9871699066, 26422689, 26477210 , 9871697509', '', 'admin@empiretubewells.com', '', '663, (BASEMENT), STREET NO. 8 GOVINDPURI , KALKAJI NEW DELHI  110019', ''),
(257, 'FAHIM ENTERPRISES', '9812392950, 9314965499, 9529460909', '', '', '', '', ''),
(258, 'FAQIR CHAND BHATIA & SONS', '9312537798 , 9312311784 , 9871407569', '', 'akash_hotel@rediffmail.com', '', '8,9 1E SSI PLOT , GITA MANDIR ROAD, NIT MKT NO. 1  Faridabad SIMS.AppMaster.Model.MVendor', ''),
(259, 'FENSTERBAU LINGEL INDIA PVT. LTD.', '9958893030,', '', 'handa_aditya@yahoo.co.in,   window.com', '', 'SHOP NO. SF-23, OMAXE CELEBRATION MALL SOHNA ROAD  GURGAON', ''),
(260, 'FERROUS TILE WORLD', '9811555955, 4005515 , 08447733738 , 8447731837', '', 'tileworld@ferrouscrete.com', '', '10B/2 FRUIT GARDEN , NEAR NEELAM CHOWK  FARIDABAD', ''),
(261, 'FIBERFILL SALES CORPORATION', '9810246676', '', '', '', '84/1 Hauz Rani,Opp-Modi Hospital Malviya Nagar New Delhi 110017', ''),
(262, 'Fibre glass creation', '+91 011 45126464 , 9560488449, 9560931112', '', 'sales@durotuff.com', '', '8 , maharashtra bhwan opp. paharganj police station New Delhi 110034', ''),
(263, 'Fibrex Construction Chemicals Private Limited', '9871290021 , 9871297979', '', '', '', 'Plot No. 73, New D. L. F. Industrial Area Faridabad', ''),
(264, 'FIRE SECURITY JUNCTION', '8285037371', '', 'durgeshfsj@gmail.com', '', 'C-166, GROUND FLOOR SEC-10 ,  NOIDA', ''),
(265, 'FMG MARGO COMPANY', '9313005267 , 011-32076260', '', '', '', 'FRANCE MARBLE AND SEC 7 ROHANI DELHI india', ''),
(266, 'Fosroc Chemicals (India) Private Limited', '9717080152, 9717888795 , 09711060889', '', 'vijay.gautam@fosroc.com, as', '', 'D-166, Sector-10 , dist.gautam budhha nagar  Noida 201301', ''),
(267, 'FRIENDS GRIT UDYOG', '9728178078', '', '', '', 'VILLAGE NANGAL,TEH, PAHARI ,DISTT. BHARATPUR  RAJ.', ''),
(268, 'Frontier Polymers Pvt. Ltd.', '9899186747 , 41679398', '', 'dinkar@frontierpolymers.com', '', 'B-1/H-2, Mohan Co-operative Industrial Estate, New Delhi', ''),
(269, 'FUSION INDUSTRIES LTD.', '9811961007  , 9871237996', '', 'project@fesion.com', '', '9, South plaza, Pocket - H, 2nd Floor, Above HDFC Bank, Sarita vihar, New Delhi 110076', ''),
(270, 'FUTURE ECO CRETA PVT. LTD.', '7835050454, 8287195950', '', 'sales@aacecocrete.com', '', '206, 207 , OM SUBHAM TOWER ,2nd FLOOR , NEELAM BATA ROAD N.I.T  FARIDABAD', ''),
(271, 'G & G CONCRETE SOLUTIONS', '9891754579 , 09560291573', '', '', '', 'Vill : Baghanki (Manesar),Gurgaon.', ''),
(272, 'G S INTERNATIONAL SF-23 & 24', '4161047 , 4161048 , 9654311341', '', '', '', 'CROWN INTERIORS SARAI CHOWK,MATHURA ROAD,FARIDABAD SIMS.AppMaster.Model.MVendor', ''),
(273, 'G.K TECHNOCHEM', '01126857588 , 26523327 , 9312885110 , 09312885104', '', '', '', '27-J JIA SARAI NEW DELHI NEAR IIT', ''),
(274, 'G.M ENTERPRISES', '9999166777, 9873340696', '', '', '', 'NEAR SHIV MANDIR PETROL PUMP  BALLABGARH', ''),
(275, 'G.R. Traders', '9867226156', '', 'grtraders47@gmail.com', '', '', ''),
(276, 'G.S ALUMINIUM & HARDWARE', '7088265659, 7088265925, 9414706806', '', 'gsaluminiumharidwar@gmail.com', '', 'SHOP NO. A-4, IP -2, NEAR SAI MANDIR , SIDCUL  HARIDWAR', ''),
(277, 'GAGAN SANITARY', '9811545411 , 9891208000 , 4018359 , 9266773993', '', '', '', 'SEC 15A SHOP NO 50 FARIDABAD SIMS.AppMaster.Model.MVendor SIMS.AppMaster.Model.MVendor', ''),
(278, 'Gajanand  safty tank cleaner', '9416575132 ,  9466864170', '', '', '', 'Bas road Dharuhera  Haryana', ''),
(279, 'GALAXY FIRE PROTECTION CO.', '9899117748, 9911310222', '', 'galaxy.fireprotection@gmail.com', '', 'H-112 STREET NO.4 , SAURABH VIHAR JAITPUR ROAD , BADARPUR  NEW DELHI', ''),
(280, 'GANGA BHATTA CO.', '9467211099, 9991973415', '', '', '', 'VILLAGE . BHANGURI , HATHIN  PALWAL', ''),
(281, 'GANPATI  COMPRESSOR  & TRACTOR WORKS', '9810628899 , 9818250866', '', '', '', 'PLOT NO. 1191/1 , BABA NAGAR , TALAB ROAD FARIDABAD', ''),
(282, 'GANPATI BATH GALLERY', '9779721015, 9779921015', '', 'ganpatibathgallery@yahoo.co.in', '', 'Rajpura bye pass , sirhind road patiala', ''),
(283, 'Ganpati Earthmovers', '9818262453', '', '', '', 'gur', ''),
(284, 'GARG HARDWARE', '9811007102 , 9891174514 , 4028102 , 2410486', '', '', '', 'NIT FBD SIMS.AppMaster.Model.MVendor', ''),
(285, 'Garg Marketing co.', '9250711750', '', 'gmcdelhi2001@yahoo.com', '', 'New T-35 , Bindapur Matiala Road, uttam nagar , new delhi', ''),
(286, 'GARG REDIMIX PVT LTD', '9971359822 , 2220251', '', 'pankaj_garg7857@yahoo.co.in', '', '445 SEC 9 FARIDABAD sikri', ''),
(287, 'GARG TRADERS', '9310038232 , 9310038230', '', '', '', '2862,STEEL TUBE HOUSE,BAZAR SIRKIWALAN,HAUZ QAZI,DELHI -110 006', ''),
(288, 'GARG TRADING COMPANY', '9991604652, 9050297006', '', '', '', 'DELHI - ALWER ROAD  SOHNA', ''),
(289, 'GARG TUBE COMPANY', '9896273481, 9354892150,  252834, 251975 , 251493', '', '6741308951', '', 'G.T ROAD  PALWAL', ''),
(290, 'GARNET  PLY DOOR', '9313173734,  +91-11-64691671', '', 'garnetplywoods@gmail.com', '', '2937/3, 1ST FLOOR , CHUNA MANDI, PAHARGANJ  NEW DELHI 110055', ''),
(291, 'GAURAV INDUSTRIAL CORPORATION', '9818805261', '', '', '', '', ''),
(292, 'GEE EMM STEEL INDUSTRIES', '2415178 , 4031037', '', '', '', 'B-274 NIT FBD', ''),
(293, 'Geeken Seating Collection', '9958799225,  9717213399', '', 'ajay.geeken100@gmail.com', '', 'B-87, sector-63 Noida', ''),
(294, 'GHANSHYAM DAS', '9812039505, 9728937625', '', '', '', 'KHANDORA  REWARI', ''),
(295, 'Ghanshyam Jute Trading Co.', '9811475905 , 011-23924564, 011-23912034', '', 'ghanshyam.jute@gmail.com', '', '1510-11, Shiv Ashram Market,Ist Floor, Shop No.3 S.P Mukherji Marg, Delhi', ''),
(296, 'GHASI RAM & SONS', '92,101,039,399,310,098,432', '', '', '', '24/1, BANKEY LAL MARKET , BADARPUR NEW DELHI 110044', ''),
(297, 'GIRDHARI LAL GUPTA & SONS', '9818483112,  23232059', '', '', '', '234-B ,AJMERI GATE  DELHI 110006', ''),
(298, 'GLOBAL BUILDTECH', '9818242757', '', '', '06AGXPB9539R1Z9', 'PALWAL HARYANA', ''),
(299, 'GMP TECHNICAL SOLUTIONS  PRIVATE LIMITED', '8527300884, 0120-4112062', '', 'navneet.s@gmptech.net', '', 'UG-SR-1C, ANSAL PLAZA , SEC-1, VAISHALI , GHAZIABAD  201010', ''),
(300, 'GOLDEN HARDWARE STORE', '981158480, 8587063737', '', 'goldenhardwarestore0090@gmail.com', '', 'SHOP NO.10A, RAJ NAGAR KHANDSA ROAD  GURUGRAM', ''),
(301, 'GOLDEN INTERNATIONAL PVT.LTD', '-4023089', '', 'info@goldeninternational.in', '', 'NEAR HOTEL MID- TOWEN , G.T ROAD  PANIPAT  132103', ''),
(302, 'GOOD HOME MARBLE', '9811263210 , 9891261207', '', '', '', '264,TEERTH NAGAR,NEW JAIN NAGAR,BUS STAND main khanjhawala road delhi', ''),
(303, 'GOPAL RMC', '9560068276', '', 'gopalrmc@gmail.com', '', 'MANGLA STEEL SIMS.AppMaster.Model.MVendor', ''),
(304, 'GOVIND SALES CORPORATION', '9818214300, 4025758', '', 'govindsales05@gmail.com', '06ACRPA6564A1ZT', '2A/3 , B.P , N.I.T  FARIDABAD', ''),
(305, 'govind traders', '9358919545 , 9319021556', '', '', '', 'haridwar', ''),
(306, 'GOYAL IRON STORE', '9416214086, 9354768998', '', '', '', 'KULANA ROAD , JATAULI, HAILY MANDI GURGAON', ''),
(307, 'GOYAL NARNOL SAND', '9899926068', '', '', '', '', ''),
(308, 'GRAAVAA PEARL MINERAL PVT.LTD.', '8800622009, 46780000', '', 'info@graavaa.com', '', '', ''),
(309, 'GREEN ECO ENGINEERS SIPLA SOLUTIONS', '9891322446, 9953738533,  9971685965', '', 'siplainsulations@gmail.com', '', '413,4TH FLOOR ,D-MALL .SEC-10 ROHINI  DELHI', ''),
(310, 'GREEN WORLD', '9818237444', '', '', '', '', ''),
(311, 'Greenlam Industries Ltd.', '9560400746', '', '', '', 'village panjera nalagarh distt. solan Himachal pradesh', ''),
(312, 'Greenply Industries Ltd', '8800947948 , 011- 45001300 , 9717595678', '', 'amitmalhotra.ply@greenply.com', '', '2/42 WHS Kirti Nagar , Opp, Dsidc complex , New Delhi 110015', ''),
(313, 'GROVER BRICKS (SAHIL BRICKS INDUSTRY)nahar', '9313779545', '', '', '', 'VILLAGE FAFUNDA, BALLABGARH FARIDABAD', ''),
(314, 'GUDDU BUILDING MATERIAL SUPPLIER', '9891330070, 9310007191', '', 'guddu.gbm@gmail.com', '', 'NEAR GATE NO.2 , DPS SCHOOL ,16/4 , MATHURA ROAD  OLD FARIDABAD', ''),
(315, 'GUGLANI TRADERS', '9811161134 , 9899336234 , 9811308034 , 9811808034', '', '', '06AAQPG1183J1ZK', '49 SEC 11 FBD NEAR MILAN SIMS.AppMaster.Model.MVendor', ''),
(316, 'GULSHER SINGH', '9897846367', '', '', '', 'HARIDWAR', ''),
(317, 'GUPTA BROTHERS', '01332-291165, 9410689731', '', '', '', 'DEHRADUN ROAD , BHAGWANPUR - ROORKEE,  HARDWAR (UK)', ''),
(318, 'gupta enterprises , L & L ENTERPRISES', '981095542, 9212795542', '', '', '', 'c-3 bhagwati garden  new delhi', ''),
(319, 'Gupta Plaster', '9818324237 , 9891347228', '', '', '', 'C-254 , pul prahladpur new delhi', ''),
(320, 'GUPTA SALES CORPORATION', '9311275592 , 9811030856 , 4010856', '', '', '', 'SEC15 A FARIDABAD', ''),
(321, 'GUPTA TRADERS', '9873340696, 9999166777', '', '', '', 'OPP.SPUN PIPE , TIGAON ROAD BALLABGARH  FARIDABAD', ''),
(322, 'Gupta Trading Company', '9928508305', '', '', '', 'Shop no. 35, sec 3a near Aggarwal Dharmshala , Gourav path  Bhiwadi  Raj.', ''),
(323, 'GURDEV INDUSTRIES', '2650626, 2201132', '', '', '', 'NEAR JAINSON INDUSTRIES , BASTI BEWA KHEL  JALANDHAR', ''),
(324, 'GURDIP SINGH', '9811547246, 8076888370', '', 'gurdip962@gmail.com', '', '', ''),
(325, 'Gurgaon Engineering Work', '9990220421', '', '', '', 'Shop No.4, 37th Mile Stone Hero Honda Chowk  Gurgaon  122001', ''),
(326, 'GURGAON TIMBER MERCHANTS', '2320113  ,', 'tele fax :  4118944', '', '', 'BARA BAZAR, BASIA ROAD , GURGAON 122001', ''),
(327, 'GURMEET SINGH CONTRACTOR', '9815033920', '', '', '', 'SARABHA NAGAR , ABLOWAL  PATIALA', ''),
(328, 'GURU KIRPA BMS', '9781123100', '', '', '', 'RANJEET NAGAR PATIALA', ''),
(329, 'gurunanak bms', '9810007298', '', '', '', 'pali', ''),
(330, 'Gyan plywood & cement co.', '09810328944 , 09015772246', '', '', '06CASPS7410L1Z2', 'shop no 1 , jal vihar colony sec 46 samaspur road gurgaon', ''),
(331, 'H &R JOHNSON INDIA (A Divison of Prism Cement Limited)', '9540001100', '', 'jha.arun@hrjohnsonindia.com', '', 'WZ -89, Ring Road , Raja Garden New Delhi', ''),
(332, 'H.L sons marble home', '09416331082 , 09416422179', '', '', '', 'kath mandi rewari', ''),
(333, 'HAQUMUDIN', '9812909378 , 9813960492', '', '', '', 'hathin palwal SIMS.AppMaster.Model.MVendor', ''),
(334, 'HARI IRON AND TUBEWELL TRADERS', '0124 - 4118702 , 2320826', '', 'HARIIRON68@GMAIL.COM', '', 'BARA BAZAAR , BASAI ROAD GURGAON', ''),
(335, 'HARI OM STEELS', '9837106049', '', 'vipin.steelexpressmart@gmail.com', '', 'RAMDHAN COLONY , NEAR SHIVALIK NAGAR , BHEL , RANIPUR  HARIDWAR (UK)', ''),
(336, 'HARIOM MINERALS', '9166222233, 9414019011', '', '', '', 'G-1/ 15D , RIICO INDUSTRIAL AREA , SOTANALA ( BEHROR ) ALWAR', ''),
(337, 'HARISH CHANDILA', '9873002700,  9289444693', '', '', '', 'V.P.O BAROLI , SECTOR- 80  FARIDABAD', ''),
(338, 'HARISH KUMAR (VB TRADERS)', '9811511978', '9873000978', '', '', 'V.P.O. PALI , FARIDABAD', ''),
(339, 'HARKESH ENG. WORKS', '8053082597, 9813514374', '', '', '', 'PATAUDI ROAD , BHORA KALAN  GURGAON', ''),
(340, 'HARYANA ELECTRICALS IN FARIDABAD,', '9810328575', '', '', '', '', ''),
(341, 'HARYANA HARDWAR  & MILL STORE', '9350809592, 9311709592 , 4021671', '', '6731300178', '', '2A-1A, (B.P) HARDWARE CHOWK N.I.T  FARIDABAD', ''),
(342, 'hasiam khan (PRAKESH CHAND ) JCB', '9899510843, 9266634814', '', '', '', 'OLD DELHI GURGAON ROAD , SARHAUL MORE , NEAR SHANI MANDIR  GURGAON', ''),
(343, 'HASIM KHAN UNIS', '09813481357 , 9813447350 , 09416390517', '', '', '', 'BOLDER VILLAGE MATHEPUR, TEH.HATHIN (FARIDABAD) 26', ''),
(344, 'Havelia ispat trading pvt ltd.', '09312855111, 9310155100', '', 'haveliaispat@yahoo.com', '', 'sec-32, village  jharsa , Gurgaon', ''),
(345, 'HB ASSOCIATE', '09990941708 , 09313662849', '', '', '', '20-A/1 nit fbd SIMS.AppMaster.Model.MVendor', ''),
(346, 'Hercules Structural Systems Pvt. Ltd.', '011-22157089/65256639 , 9810265311', '', 'hsspl@herculesindia.com', '', 'IInd Floor, Plot No. B-2, DSIDC Complex Patparganj Industrial Area', ''),
(347, 'Hetram bms (hr carrier & bms rewari)', '09416342360 , 9729749014', '', '', '', 'Dharuveda', ''),
(348, 'HIL  LIMITED', '9643332688, 0120-4914900', '', 'vikash.rajora@hil.in', '', 'SURAKSHA BUILDING ,A-76 , SECOND FLOOR ,SEC-4 , NEAR SEC-16 METRO STATION ,LANDMARK RAJNIGANDA CHOCK  NOIDA  201301', ''),
(349, 'HIL LIMITED', '120-4914900 , 09717704116', '', 'vikash.rajora@hil.in', '', 'SUREKSHA BUILDING A-76 , SECOND FLOOR ,SEC-4 ,NEAR SEC-16 METRO STATION  NOIDA', ''),
(350, 'HILTI INDIA PVT LTD', '9811629994', '01142701111 / 22', '', '07AAACH3583Q1Z2', 'F-90/4, OKHLA INDUSTRIAL AREA \nPHASE 1,NEW DELHI', ''),
(351, 'Hilti india pvt ltd.', '9811629994', '', '', '', '543 c ,pace city 2 ,sec 37 Gurgaon', ''),
(352, 'HIND HEALTH & ENVIRO SOLUTIONS PVT.LTD', 'R.S.Jha 9717121561', '', '', '', 'E-3/270, shivram Park Nangloi, New Delhi 110041', ''),
(353, 'Hind InfraDevelopers India Pvt. Ltd', '9910076549 , 9818303086', '', '', '', 'D-77, 1st Floor, Kalkaji New Delhi', ''),
(354, 'Hind Tiles', '7503228333', '', '', '', 'B 42 I Floor Zakir Nagar West New Delhi', ''),
(355, 'HINDUSTAN TILES', '9212008834 , 9810049273', '', 'hindustantiles@hotmail.com', '', '601,602 SUNEJA TOWER - 11 , DISTRICT CENTER , JANAK PURI ,  NEW DELHI', ''),
(356, 'Hitech Rubber Industries', '09322288578 , 022-28395931/32', '', '', '', '“INIZIO” 201, 2nd Floor Cardinal Gracious Road, Chakala Andheri (East), Mumbai', ''),
(357, 'HMD  MAI IMPEX PVT .LTD', '9971773647, 0124-4389071', '', '', '', 'PLOT NO. 3 , MAIN M.G ROAD SIKANDERPUR  GURGAON', ''),
(358, 'Horizon Hardware & Glasses Pvt Ltd', '98100 57660 , 9910007055 , 09810114724', '', 'horizonhardware@gmail.com', '', '', ''),
(359, 'HP BOXER FUEL POINT', '9811689949 , 9654068722', '', '', '', 'VILLAGE GADHOLI KHURD , PATAUDI ROAD , GURGAON HR. SIMS.AppMaster.Model.MVendor', ''),
(360, 'HYGIE PROFILE CO', '9873489808 , 0112502172', '', '', '', 'INTEGRATED FLOORING SOLUTION OFFICE . 39,SAI BABA ENCLAVE TEHSIL ROAD NAJAFGARH NEW DELHI 110043 SIMS.AppMaster.Model.MVendor', ''),
(361, 'IMPACT FLOORS INDIA PVT. LTD.', '+91 22 6716 6000 , 09910071437 , 08826295019', '', 'pradeep.sharma@impactfloors.co.in', '07aabci8933l1z6', 'f-3/4, okhla industrial area phase new delhi', ''),
(362, 'IMRAJ', '9996218161 , 8053355829', '', '', '', 'J/SAND SIMS.AppMaster.Model.MVendor', ''),
(363, 'IMRAN', '9982308252. 9001821152', '', '', '', 'VILLAGE .GHANDHOLA, TIJARA, ALWER RAJ.', ''),
(364, 'INDERJEET YADAV (AMIT BMS)', '9810420218', '', '', '', 'N.H 8 , NEAR PACE CITY PETROL PUMP ,36 KM MILE STONE ,HARI NAGER , GURGAON(HR) - 122001', ''),
(365, 'INDIAN INSULATION & ENGINEERING', '9915080488 , 0172-5093735', '', 'indianenggs@gmail.com  ,  www.coolroofpaint.com', '', 'H.O .SCF 37, PHASE -9 , MOHALI , PANJAB', ''),
(366, 'Indica wire Products', '09891215427 , 2415060', '', 'indikawireproducts@gmail.com', '', '1 G/51 , bp nit faridabad', ''),
(367, 'INDIKA WIRE PRODUCTS', '9891215427, 2415060, 4028060', '', 'indikawireproducts@gmail.com', '', '1G/51, B.P N.I.T  FARIDABAD', ''),
(368, 'INDU PAINTS', '9873333076, 9873303318', '', '', '', '1376/50, NEAR TATA INDICOM TOWER , PARVAITIYA COLONY  FARIDABAD  121005', ''),
(369, 'Industrial Sales Agency', '0129-3296444 , 4086844, 9811369559', '', '', '', '1D-1B.P., (Main Road) Hardware Chock , N.I.T  Faridabad 121001', ''),
(370, 'Industrial Solution', '9812510352', '', 'lal.sohan32@yahoo.in', '', 'Office no 3112/1 , Opp. Bharawas Gate Rewari , Haryana', ''),
(371, 'Interarch Building Product Private Limited', '08045322517 ,  9871754333  , 9810416282', '', '', '', 'B-30 Sector 57, Noida  Uttar Pradesh', ''),
(372, 'ISH HARDWARE STORE', '9818250457', '', 'ish_hardware@yahoo.com', '', '1-G /75, N.I.T  FARIDABAD', '');
INSERT INTO `vendordetails` (`vid`, `vname`, `vmobile`, `valtmobile`, `vemail`, `vgst`, `vaddress`, `vdesc`) VALUES
(373, 'ISLAMKHAN BMS', '9812782997 , 9050722161', '', '', '', 'VILL. BAWLA , THE. TAURU , DISTT. MEWAT HR. SIMS.AppMaster.Model.MVendor', ''),
(374, 'ISMAIL KHAN BMS', '09896134378 , 09541282177', '', '', '', 'DHARUVEDA', ''),
(375, 'J B ASSOCIATES', '011-41553830/20 , 8802244042 , 09313035993', '', 'b.pandey@jbaindia.com', '', '135 ARJUN NAGAR KOTLA MUBARAK PUR new delhi', ''),
(376, 'J. B. GUPTA HARDWARE COLLECTION P LTD.', '29217776 , 29217779 , 29224407 , 29224776', '', '', '', 'M-28 MKT GK 2  NEW DELHI', ''),
(377, 'J. RAJAN STEEL P. LTD,', '9811221350, 2428846 , 9999672572', '', 'rajansteels@gmail.com', '', '1H/59 B.P ., N.I.T  FARIDABAD', ''),
(378, 'J.K STANDARD STEEL CRAFT', '9990786712 , 9971197175', '', 'jkssc1@gmail.com , www.jkrailing.com', '', 'B-110, STREET NO. 2 , CHAMAN PARK , KARAWAL NAGAR DELHI  110094', ''),
(379, 'J.K. ENGG. WORKS', '9811276409', '', '', '', 'V-182/A, GANDHI COLONY , SECTOR -21B  FARIDABAD', ''),
(380, 'J.K. SPUN PIPES', '9811040447 , 9811019448 , 9999964286', '', '', '06AAZPA6689E1Z7', '1648 SEC 3 HUDA FARIDABAD SIMS.AppMaster.Model.MVendor', ''),
(381, 'J.M.B CONTRACTOR & EARTH MOVER', '8057045000 , 8791315907', '', '', '', 'OFF.Between Essar Pump, Kotwan Police Chowki Kosi Kalan Mathura', ''),
(382, 'J.N. & SONS', '9416338491 , 8901272188', '', '', '', 'OPP. P.W.D. REST HOUSE , ROHTAK ROAD , BAHADURGARH SIMS.AppMaster.Model.MVendor', ''),
(383, 'J.R.INDUSTRIES', '9212300152 , 9868412797, 9711976117', '', 'adsteelsadsteels@gmail.com', '', '112 UDYOG VIHAR PHASE -1 GURGAON', ''),
(384, 'J.S ENTERPRISES', '9215605015, 9991055777, 9587501051', '', '6952707818', '', 'VILLAGE .BANIPUR , BAWAL REWARI', ''),
(385, 'J.S.CARRIER BUILDING MATERIAL', '9414261625  , 9413685792', '', '', '', 'MAIN ROAD , U.I.T., BHIWADI, DISTT.ALWER RAJ', ''),
(386, 'J.V. Enterprises (MANISH)', '9412429488', '', '', '', 'SIKANDRABAD', ''),
(387, 'Jagat Singh Harbhajan Singh Rooprai', '9899867746', '', '', '', 'B-266 Okhla Industrial Area Phase 1 New Delhi 110020', ''),
(388, 'Jagbir singh beniwal', '9911729722', '', '', '', 'E-584, sgm nagar Faridabad  121001', ''),
(389, 'JAGDAMBA SALES', '22524022, 9811795564', '', '', '07ADMPG2430K3ZK', 'F-82, MAIN ROAD JAGATPURI  DELHI', ''),
(390, 'JAGMOHAN LAL GARG', '9878553505', '', '', '', 'RANJEET NAGAR, BADSHON ROAD  PATIALA', ''),
(391, 'JAI AMBEY MARBLE', '9811617007 , 9250037007', '', '', '', '', ''),
(392, 'JAI DURGA HI-TECH ENTERPRISES', '9811647351', '', 'jdconcertina@gmail.com', '', 'PLOT NO 245 KHASARA NO 38 GALI NO2 VILL. DABARI INDUS. AREA new delhi 46', ''),
(393, 'JAI DURGA SAINITARY AND HARDWARE', '9958132930 , 9818872411', '', '', '', 'SEC 8 MANESAR SIMS.AppMaster.Model.MVendor', ''),
(394, 'JAI DURGA TRADERS JAMUNA, bricks', '9810374267', '', '', '', 'SAHIBABAD', ''),
(395, 'Jai Gurudev spun pipe udhyog', '9416441213 , 9813395104', '', '', '', 'nh -8 highway road vil jarthal distt. rewari', ''),
(396, 'JAI MAA KALI FURNISHING HOUSE', '9350316702, 9650176097', '', '', '', '1F - 32 BP , TIKONA PARK , OPPOSITE VAISHNO DEVI MANDIT N.I.T FARIDABAD', ''),
(397, 'Jai Manglam interiors', '829058080 , 09314041699 , 09950027276', '', 'manmohan.jmi@gmail.com', '', 'BUS STAND ROAD , BEHROR , ALWER (RAJ))', ''),
(398, 'JAI NUKAL NATH  BUILDING MATERIAL', '9929683646, 8432619118', '', '', '', 'NEEMRANA', ''),
(399, 'JAI PRAKASH ASSOCIATES LTD', '9810198598', '', '', '', 'FARIDABAD', ''),
(400, 'JAI SHRI SHYAM GRANITE', '9871875000 , 9910965707', '', 'jssg5000@gmail.com', '', 'GURHEETLA MATA ROAD , OPP. UTSAV VATIKA, NEW MARBLE MARKET, GUR HR SIMS.AppMaster.Model.MVendor', ''),
(401, 'JAIBEER TOMAR J/SAND', '9999979514', '', '', '', 'VILL. MACHHGAR, BALLABGARH 11', ''),
(402, 'JAIKISHAN', '9992346808 , 9991980750', '', '', '', 'GURGAON-PATTUDI ROAD, HARYANA GURGAON SIMS.AppMaster.Model.MVendor', ''),
(403, 'JAIN (HAFELE)', '01204315310 ,  9899199100', '', '', '', 'E-103 SECTOR 9 NOIDA', ''),
(404, 'Jain book agency ( Central)', '42542652,  47528979', '', 'jainbookagency.com, central@jainbooksagency.com', '', '5061, Sant nagar , D.B.Gupta road , Karol Bagh  New Delhi', ''),
(405, 'JAIN ELECTRICALS', '0129 241 8485', '', '', '', 'SHOP NO. 2A / 1 N.I.T., FARIDABAD', ''),
(406, 'JAIN ENTERPRISES', '4021951 , 09312121951 , 09990105100', '', 'rajat_jainenterprises@gmail.com', '', '1F/39, B.P ,OPP. TIKONA PARK , N.I.T  FARIDABAD', ''),
(407, 'Jain Spun Pipe Co.', '9311109118 , 9310432111 , 011 - 25255817', '', '', '', '9, Inder Enclave, Ground Floor, Paschim Vihar	 New Delhi', ''),
(408, 'JAMSHED SAND FILLING CONTRACTOR', '9783114488, 9783782705', '', '', '', 'VILLAGE : CHOPANKI , ALWAR', ''),
(409, 'JANAK MITTAL', '9871097402', '', '', '', '', ''),
(410, 'JANGRA GENERATOR SERVICES', '9811769287', '', '', '', 'B- 516, NEHRU GROUND N.I.T  FARIDABAD', ''),
(411, 'JAQUAR & COMPANY PRIVATE LIMITED', '88826699420 , 9711867799 +91-11-33002233', '', '', '', 'D-56, Defence Colony , New Delhi - 110024', ''),
(412, 'JATAN KUMAR SATA', '9810280458', '', '', '', 'SIMS.AppMaster.Model.MVendor SIMS.AppMaster.Model.MVendor', ''),
(413, 'JAWALA PARSHAD AND CO. PVT. LTD.', '011 - 45536871 ,   46543691 9810064026', '', 'jpcnewdelhi@gmail.com', '', 'REGD OFF  ,  57 -58 ,ARJUN NAGAR , KOTLA MUBARAKPUR, NEW DELHI 110003', ''),
(414, 'Jaycee Punching Solutions Pvt.Ltd.', '9891820083 , 09811830411', '', 'jayceepunch@gmail.com', '', '50, Km Milestone, Mathura Road Highway, Opp. Shivanilocks & Behind Container Depot,Prothla. Palwal', ''),
(415, 'JAYPEE INDIA LIMITED', '91-332289, 0496/97/98 9891820083', '', 'equipments@jaypee.in, rahul@jaypee.in', '', 'TRINITY 5G, 226/1, A.J.C. BOSE ROAD KOLKATA', ''),
(416, 'JEVAN THAKEDAR', '9728157502, 9812766674', '', '', '', 'VILLAGE , AASLVAS , N.H. -8 , REWARI (HR)', ''),
(417, 'JILE SINGH SEFTY TANK SERVICE', '9991371445, 9991908847', '', '', '', 'VILLAGE PRITHLA , MAIN MATHURA ROAD ,NEAR TATARPUR MORE  PALWAL', ''),
(418, 'Jindal Mectec Pvt. Ltd', '91-11-27512283, 9882000027', '', 'ravi.gupta@jindalbrothers.in', '', 'B-29, SANJAY MARKET ,POCKET -111, SEC-2, ROHINI DELHI  DELHI', ''),
(419, 'JINDAL PIPE AGENCIES', '4028591 , 4028596', '', '', '', '1-F/40 TIKONA PARK NIT FBD SIMS.AppMaster.Model.MVendor', ''),
(420, 'JITENDER CARRIER', '951276300  ,   9812827444', '', '', '', 'BHADURGARD    MAIN MAMA  CHOWK , DELHI - ROHTAK ROAD ,  M.I.E', ''),
(421, 'JITESH SHREE BALAJI CARRIER', '9873708034 , 9810280600, 9910445151', '', '', '', 'A-1/8, NEHRU GND NEELAM BATA ROAD FBD SIMS.AppMaster.Model.MVendor', ''),
(422, 'JK CEMENT WORKS', '01477-220087 , 220553', '', '', '', 'JAIPUR RAJASTHAN', ''),
(423, 'JK COMPANY SAHIBABAD', '9818528182', '', '', '', 'MAIN WAZIRABAD ROAD, PASOUNDA, NEAR BHOPURA SAHIBABAD, GHAZIABAD', ''),
(424, 'JK LAKSHMI CEMENT LIMITED SAHIBABAD', 'Hari Om Gupta 9999342705', '', '', '', '', ''),
(425, 'JK CEMENT WORKS LTD', '8059777387', '9717100163', '', '', 'VILLAGE BAJITPUR, \nPOST JARLI , DISTT-JHAJJAR\nHARYANA', ''),
(426, 'JMD traders', '09255524720 , 09729069375', '', 'sales.jmd@outlook.com', '', 'near old REI Agro ltd. vill. Jaliawas bawal  Rewari', ''),
(427, 'JOBINDRA PAL', '9719019191', '', '', '', 'SIDCUL  HARIDWAR', ''),
(428, 'JOGENDER WATER SUPLIER 400', '9991669353 ,   9813091072', '', '', '', 'REWARI ROAD DHARUHERA (REWARI)', ''),
(429, 'JOGINDER SINGH', '9871666247, 9871163010', '', '', '', 'BHATI KALA  NEW DELHI', ''),
(430, 'JOHNSON INDIA TILES', '9015629126', '', '', '', 'GURGOAN SIMS.AppMaster.Model.MVendor', ''),
(431, 'JOON KSK DIESEL CENTRE', '8221859584, 82211859585', '', '', '', 'VILL BARKTABAD, BADLI ROAD, BAHADURGARH', ''),
(432, 'JOSHI SPUN PIPE CO.', '9873869463, 9810025797', '', '', '', 'SAHAPUR ROAD , SEEKRI BALLABGARH FARIDABAD', ''),
(433, 'JSL ISPAT P LTD', '9650060820 , 01149650005', '', '', '', 'MS PIPE GI PIPE , SIMS.AppMaster.Model.MVendor', ''),
(434, 'JUGAL KISHOR (BMS)', '9929758260', '', '', '', 'VILL. JHIWANA ,DIST.ALWAR  ,TAPUKUDRA RAJASTHAN', ''),
(435, 'JUST CONCRETE', '8527593921,22,23', '', '', '', 'GS - 167,1 ST FLOOR , MALIBU TOWN  SOHNA ROAD  GURGAON', ''),
(436, 'JYOTI CARRIER', '9899982798 , 9810412641 , 9818147014', '', '', '', 'M.AIN BUS STAND MANESAR GUR SIMS.AppMaster.Model.MVendor', ''),
(437, 'JYOTI RUBBER AJMERI GATE', '9811065754', '', '', '', '', ''),
(438, 'K L RATHI STEEL LTD.', '9910389484  ,    01204187575', '', '', '', 'BISRAKH ROAD  VILL. CHHAPRAULA, GREATER NOIDA GAUTAM BUDH NAGAR     U.P     201001', ''),
(439, 'K. C. SHARMA', '9747539225', '', '', '', '', ''),
(440, 'K.K CARRIER', '9888253346', '', '', '', 'BURJ KOTIA ROAD MOTOR MARKET CHANDIMANDIR PANCHKULA  HARYANA', ''),
(441, 'K.K CONCRETE PRODUCT', '9350618568 , 9810267226', '', 'goelajay_kk@yahoo.co.in', '', 'TIGAON ROAD BALLABGARH FARIDABAD', ''),
(442, 'K.K. ENTERPRISES', '9810263177, 26853177', '', '', '', '406 AJIT SINGH HOUSE, YUSUF SARAI  NEW DELHI', ''),
(443, 'K.K. MARBLE & GRANITE', '9899630011', '', 'kkmarbles02@gmail.com', '', 'MARBLE MARKET, SHEETLA MATA ROAD , PLOTE NO.83,SEC -34  GURGAON 122001', ''),
(444, 'K.S. STEEL', '9811120405', '9212070405', '', '', 'B-618-619 , NEHRU GND FBD', ''),
(445, 'KAILASH CHAUHAN', '9815317155', '', '', '', 'BEHIND NEW ANAJ MANDI , NEAR WATER TANK , VILL & P.O LALRU , TEH. DERABASSI  MOHALI (PB)', ''),
(446, 'KAILASO INSTURMENTS INC', '011-23284342 , 23273051', '', '', '', '21/4719M DAYANAND ROAD, DARYA GANJ, NEW DLEHI', ''),
(447, 'Kajaria Ceramics Ltd.', '9971744115', '', 'dipesh@kajariaworld.com', '', 'J1/B1 Extn, Mohan Co-op. Industrial Estate mathura road new delhi', ''),
(448, 'KAKA DECOR', '9211111271 , 9810280844', '', '', '', '5K/109,4/5 CHOK  NIT FARIDABAD', ''),
(449, 'KAKKAR CARRIER', '9810118791', '9810271311 , 2425885', '', '', 'VILLAGE PRITHLA', ''),
(450, 'KALLU KHAN BMS  BRICKS', '9610405029', '', '', '', 'JHIWANA CHOWK , TAPUKARA (ALWER) RAJ', ''),
(451, 'KALRA ENTERPRIZE', '4031777     ext  98  - 777, 96 - 677', '', '', '', 'NIT    SHOP NO C -31 , NEHRU GROUND , NIT FARIDABAD', ''),
(452, 'R. K. Traders  ( SHASHI KANT )', '9868306003', '', '', '06AATPS3825J1Z4', 'Sec 69, near IMT main gate Ballabgarh, Faridabad', 'binding wire , nails'),
(453, 'KAMAL BMS', '9896546179 , 9812296125', '', '', '', 'OLD GT ROAD , PALWAL SIMS.AppMaster.Model.MVendor', ''),
(454, 'KAMAL PRAKESH & SONS', '23541297, 9810344510', '', '', '', 'SHOP NO. 2449, TELIWARA SADAR BAZAR  DELHI', ''),
(455, 'KAMAL TRADERS', '9818255245', '', '', '', 'PLOT NO 9 SEC 64      FBD SIMS.AppMaster.Model.MVendor SIMS.AppMaster.Model.MVendor', ''),
(456, 'KAMDHENU CEMENT (G)', '7836000020, 9871777744', '', '', '06AAPFK0206P1Z4', '', 'rmc'),
(457, 'KAMDHENU ISPAT', '9811394004', '9999777238 , 9811210011', '', '', 'A-1114, RIICO INDS. AREA, PHASE III, BHIWADI', ''),
(458, 'Kanak shri marbles', '9983845974 , 9785466888', '', '', '', 'sodavas road  alwar rajsthan', ''),
(459, 'KANIKASTEELS PVT LTD.', '9811885005, 9899573660', '', '', '', 'B-240 NEHRU GROUND', ''),
(460, 'Kannav Superlie', '09899429744,  8588823173 , 8826184417', '', 'kannavaac@gmail.com', '09AADCK3139Q1ZO', 'Khasra No. 730, 732, 734 Surajpur Indusrtria Works l Area ,Gulishtanpur :G.B.Nagar, UP', ''),
(461, 'KAPOOR SINGH', '9896269533 , 9315353828', '', '', '', 'DELHI ROAD SAMPLA ROHTAK, HARYANA', ''),
(462, 'Kapoor tradind co.', '9891128501,  2325566', '', '', '', 'Near main  post office chowk, near raiway road Gurgaon', ''),
(463, 'KAPOOR TRADING CORPORATION', '9212156869 , 9212166869 , 2416869', '', '', '06ACEPK9347A1ZT', 'SHOP NO. 64-65, K.C. ROAD , FARIDABAD HARYANA', ''),
(464, 'KARAN SINGH ( N. RAVI )', '9250633151, 9211448586', '', '', '', 'G- BLOCK , SRINIWAS PURI  NEW DELHI', ''),
(465, 'Karanwal  Infratech Materials Pvt. Ltd.', '9650730033, 0129-4033888', '', 'www. info@kimpl.in', '', 'Sco.42, huda market , sec. -28 ,  Faridabad (HR) 121003', ''),
(466, 'KARTIK FURNITURE WORK', '9899012454, 0129-2410892', '', '', '06AHEPB4113A1ZE', 'SSI PLOT NO. 2-3, GEETA MANDIR ROAD, MARKET NO.1  FARIDABAD', ''),
(467, 'kassi', '9812650932', '', '', '', 'palwal', ''),
(468, 'KATARIA BATH COLLECTION', '0129-2221042,4072042', '', '', '', 'SCO 27 SEC 16 MKT FARIDABAD', ''),
(469, 'KATARIA ELECTRICALS', '9810118940 , 4072042', '', '', '', 'SHOP NO . 67 -68 , SEC 16 MARKET , NEAR SAGAR CINEMA , FARIDABAD', ''),
(470, 'KATYAL', '9818365123', '', '', '', 'CHEMICAL SIMS.AppMaster.Model.MVendor', ''),
(471, 'KAUSHAL MACHINE TOOLS', '9582259010, 9350899364', '', '', '06AFRPC4575J1Z3', 'PLOT NO. 121 , GALI NO. - 6, BHIKAM COLONY , TIGAON ROAD BALLABGARH  FARIDABAD', ''),
(472, 'KGM  Export Pvc Blocks', '09811176387 , 9873175421', '', 'kgmexport@gmail.com', '', 'Plot no.1-2, HSIIDC, Sectore - 59 , Faridabad 121004', ''),
(473, 'KGM Traders', '9212203452 , 9999933605', '', 'kgmtraders1989@gmail.com', '', '1/82, W.H.S kirti nagar new delhi', ''),
(474, 'KHAJAN SINGH', '9891875080 , 9210589640', '', '', '', '', ''),
(475, 'KHAN PALI GAON', '9212515857', '', '', '', '', ''),
(476, 'khandelwal ranjan', '9811056658', '', '', '', '', ''),
(477, 'KHANDELWAL STEEL & TIMBER', '29255000,  29251231,  29250109', '', 'khandelwalsteeland timber@gmail.com', '', '553/2 MAIN ROAD , CHIRAG  DELHI  NEW DELHI', ''),
(478, 'KHANDELWAL STONE INDUSTRIES', '9214521926 , 9811263210 d', '', '', '', 'BAJAR NO 4 RAMGANJMANDI KOTA RAJESTHAN SIMS.AppMaster.Model.MVendor', ''),
(479, 'KHANNA AIRCON', '2412019 , 2414076', '', '', '', '59, NEELAM BATA ROAD , NIT  FARIDABAD 121001', ''),
(480, 'khatana', '9466531882 , 8901202101 , 9812315484', '', '', '', 'bawal SIMS.AppMaster.Model.MVendor', ''),
(481, 'khem chand traders', '9555531000 , 9818637270 , 9818107270', '', '', '', 'c-4 , shop no 9 first floor nit faridabad', ''),
(482, 'KHETESHVER ELECTRICAL & HARDWARE', '09219562707 , 9897910571', '', 'kheteshver.elect2011@yahoo .com', '', 'A-59, SHIVALIK NAGAR , BHEL  HARIDWAR', ''),
(483, 'Khola crane services', '8059130425 , 9050748649, 8930330817', '', '', '', 'Near police station, opp.Seghal paper mils, n.h-8 , Distt.- Rewari  Dharuhera', ''),
(484, 'KHUSHRANG BHATTA CO.', '9810118791 , 9810271311 , 2425885', '', '', '', 'VILL. PRITHLA, PALWAL SIMS.AppMaster.Model.MVendor', ''),
(485, 'KINDLE FIRE PROTECTION', '9811779370,', '', 'kindlefireprotection@gmail.com.', '', 'D-12, BASEMENT , NEAR KALKAJI POLICE STATION , OPP. NEHRU PLACE  NEW  DELHI', ''),
(486, 'Kirloslar Brothers Limited', '9560398989', '', 'jyoti.kalash@kbl.co.in', '', 'M-11, 3rd Floor, Middle Circle Connaught Place, New Delhi-', ''),
(487, 'Kisori lal', '9971287339', '', '', '', 'faridabad', ''),
(488, 'Kissan pipe', '9990833005', '', 'samark485@gmail.com', '', '', ''),
(489, 'KJS Concrete Pvt. Ltd', '8860077003 , 7838265577', '', '', '', 'I-1, Phase - III, Masuri Gulavati Road,  UPSIDCE, Industrial Area, Ghaziabad', ''),
(490, 'KK Manhole & Gratings Co Pvt Ltd / KONKRETE PRODUCTS CO.', '9810268711 , 9810155266 , 9910012478 , 9810061152', '', 'injo@kkindia.com', '06AAACK0613N1ZQ', 'PLOT NO 90 SEC 25 FBD      FACTORY   MUJERI , BALLABGARH -2104', ''),
(491, 'kobinder bhati', '9457588083', '', '', '', '', ''),
(492, 'Komprassor House', '9810810540  , 9310810540', '', '', '', '1d-6 , B.P ,Nit  Faridabad  , Haryana 121001', ''),
(493, 'KONCEPT STEEL PVT.LTD', '9312487189, 9810395559', '', 'vikas@konceptgallery.com', '', '83, ROAD NO.2 PLOT NO.9 ,INDUSTRIAL AREA MUNDKA NEW DELHI', ''),
(494, 'KOVINDER BHATI', '9457588083', '', '', '', 'VILLAGE .  GOPALPUR , INDUSTRAIL AREA , SIKANDRABAD BULANDSHAHR 203205', ''),
(495, 'KRISHAN KUMAR WATER SUPPLIERS', '9728099933 ,  94116287511', '', '', '', 'BHADURGARD V.P.O KASSAR, TEH. BAHEDURGARH , DISTT. JHAJJAR      HR', ''),
(496, 'KRISHAN PAL SINGH', '9811751991, 9873625035', '', '', '', '171, SEC -4-R  FARIDABAD', ''),
(497, 'Krishna Chaudhary Earthmovers.', '9414638952', '', '', '', 'Bawal', ''),
(498, 'KRISHNA COMPRESSOR & CONTRACTORS', '9312902888 , 9891122636', '', '', '', 'VILL. ANKHIR, NEAR DAGAR SERVICE STATION WALI GALI faridabad', ''),
(499, 'KRISHNA GOPAL & COMPANY', '9213134141', '', '', '', 'SIHI GATE  BULBHGRAH', ''),
(500, 'KRISHNA SERVICE CENTER', '9540095500', '', '', '', '10 KM STONE    GURGAON - PATAUDI ROAD VILL. WAZIRPUR GUR SIMS.AppMaster.Model.MVendor', ''),
(501, 'KRISHNA TIMBER TRADERS', '09811678856 , 9811626441', '', '', '', '39 GT ROAD OPP MMMG HOSPITAL GAZIABAD', ''),
(502, 'KRISHNA TRADING CO.', '9412307016', '', 'balajiironstorekankhal@gmail.com', '', 'LATTO WALI, KANKHAL C/O BALA JI IRON STORE HARIDWAR', ''),
(503, 'KRUGER & BRENTT EQUIPMENT PVT. LTD.', 'Zulfiquar Khan :9310164051', '', '', '', 'ADD. : 204, V4 MAYUR PLAZA – II, DDA, LSC, MAYUR VIHAR PHASE - I, NEW DELHI -110091', ''),
(504, 'kryton buildmat co pvt ltd', '9899887928', '', 'info@kryton.in', '', 'plot no 63 industrial estate dehradun riwari', ''),
(505, 'KUKREJA GLASS', '9313882818 , 9911065206', '', '', '', 'SEC 28 ,LINK ROAD   FARIDABAD HARYANA SIMS.AppMaster.Model.MVendor', ''),
(506, 'KULBEER', '9992243244', '', '', '', 'SUNDER SIMS.AppMaster.Model.MVendor', ''),
(507, 'KULDEEP BUILDING MATERIAL SUPPLIER', '9671315730', '', '', '', '', ''),
(508, 'KULDEEP GENERAL STORE', '9671315730', '', '', '', 'KHERI SADH  ROHTAK', ''),
(509, 'KUMAR CARRIER BRICKS GUR', '9992105731 , 9911283431', '', '', '', 'GURGAON - PATAUDI ROAD , HAYATPUR MORE, GURGAON', ''),
(510, 'KUMAR PLY WOOD', '23,588,749,235,629,600,056,279,040', '', '', '', '3058/63, D.B GUPTA ROAD, PAHAR GANG,  NEW DELHI -110055', ''),
(511, 'KUMARPAL TAWAITIYA  WATER SUPPLIER', '9671165117, 9812629569, 8818043113', '', '', '', 'VILLAGE MIRAPUR  PALWAL', ''),
(512, 'KUSHAL TIMBER P LTD', '28343054 , 9312430715', '', '', '', 'PLOT NO . 1 , MAIN ROHTAK ROAD , NEAR SWARAN PARK BUS STAND ., NANGLOI DELHI', ''),
(513, 'KV  Konstech equipment pvt ltd,', '01127290589, 01145670887, 9810401545...', '', 'konstech@gmail.com', '', 'Konstech House, B-2/83 sector 16 Rohini, New Delhi 110089', ''),
(514, 'KWALITY FIBRE PRODUCTS', '9811362129', '', '', '', '1081, SIHI , SECTOR-8 ,  FARIDABAD', ''),
(515, 'L .J .R  & SONS', '9837008867 , 9359336584', '', 'emash_ljr@yahoo.co.in', '', 'VILLAGE MOTICHUR , NEAR SHANTIKUNJ UNIVERSITY HARIDWAR', ''),
(516, 'Lafarge  India Pvt. Ltd. (RMC)', '8800495952', '', 'prashantkumar.attri@in.lafarge.com', '', '14/4, Milestone, Mathura Road Faridabad , Haryana 121003', ''),
(517, 'Lafarge Aggregates & Concrete India Pvt. Ltd.', '9871877221', '', 'neha.sharma@in.lafarge.com', '', 'Plot No-33B,Sec-32 Gurgaon', ''),
(518, 'LAKHANI HARDWARE STORE', '2415951,2417500,4022458 , 9810155336', '', '', '06ABTPL1621N1ZB', '1 D/10 B.P. OPP. BANK OF INDIA , NIT FBD.', ''),
(519, 'Lakshmi steel traders', '9811014463 , 4038766', '', '', '', 'B-548 nit faridabad', ''),
(520, 'LALIT ELECTRIC WORKS', '9810726115', '', '', '', '127,BABA HIRDYA RAM COLONY, MUJESAR NIT FBD SIMS.AppMaster.Model.MVendor', ''),
(521, 'Lamba Techno Flooring Solutions Pvt. Ltd.', '9717854400 , 011-42804024', '', 'ltfspl@gmail.com', '', '110075', ''),
(522, 'LANEXIS ENTERPRISES P LTD NEW DELHI', '9810067067 , 9871600552 , 8826008121', '', 'sales@lanexis.com', '', '901,ANSAL BHAWAN , 16 KASTURBA GANDI MARG , NEW DELHI 110001 SIMS.AppMaster.Model.MVendor', ''),
(523, 'LATICRATE', '9350621095 , 9350504894', '', '', '', '', ''),
(524, 'LAVANA', '9910107157', '', '', '', '', ''),
(525, 'Laxman', '8802543730', '', '', '', 'h no 586 , sec 10 faridabad', ''),
(526, 'LAXMI BHATTA CO. M/S SHIVJI BHATTA CO', '9813775375', '9811272966,9811362966', '', '', 'PLOT NO 1529 SEC 10 A GUR    VILLAGE - JHAJJAR   (HR)', ''),
(527, 'LAXMI BUILDING MATERIAL SUPPLIER', '9411053356', '', '', '', 'ROAD NO. 13 , INDUSTRIAL AREA , SIKANDRABAD  BULANDSHAHR', ''),
(528, 'LAXMI H/W NIT FBD', '9212246370', '', '', '', 'B.O : B548 , NEHRU GROUND , NIT FARIDABAD', ''),
(529, 'LAXMI HARDWARE AND PAINTS STORE', '129-2421718 , 2416279', '', '', '', '1E/22, BP, NIT FARIDABAD', ''),
(530, 'Laxmi plywood', '9910310009 , 9310520009 , 09990720008', '', 'laxmiplywood.bhatia@gmail.com', '', '18/1 , main ajronda road , opp. sec.- 15a  market  faridabad', ''),
(531, 'laxmi supplies& services', '9818890044', '', 'laxmi.sspl@gmail.com', '', 'D 260 , Phase 1 , ashok vihar', ''),
(532, 'Life \'N\' Style', '9311033218 , 9311033211 , 9313562069', '', 'lifenstyale@live.com', '', 'A-14/1-A, DLF Qutab Enclave Phase-I Gurgaon 122002', ''),
(533, 'LIYAKAT ALI', '9958505056, 8800735816, 9311424285', '', '', '', 'C-10,J.J COLONY  KHANPUR  NEW DELHI', ''),
(534, 'LUCKY TRADERS', '9814040250', '', 'anujmarwaha31@yahoo.co.in', '', 'LOWER MALL ROAD , OPP. BRITISH CO-ED SCHOOL  PATIALA', ''),
(535, 'Luxmi Electrical works', '9811287579', '', '', '', 'shop no 704, sanjay memorial industrial estateopp. YMCA  faridabad', ''),
(536, 'M G MARKETING SERVICES', '9350614823, 9350614824', '', 'manishgupta14@hotmail.com', '', '', ''),
(537, 'M. B. TUBES PVT. LTD.', '(0120)2624754, 2625906', '', '', '', '100, PRAKASH INDUSTRIAL ESTATE  P.O. SAHIBABAD, GHAZIABAD (UP)', ''),
(538, 'M.B. ENTERPRISES', '8802712002 , 9899573660 , 9818440619', '', 'mayank0083@gmail.com', '06ADRPB0231E1Z6', 'c-24 A nehru ground faridabad', ''),
(539, 'M.C. Company', '01206542062 , 09971328278 , 09811514770', '', 'mcandcompany94@yahoo.com', '', '2nd floor nehru ground  gaziabad', ''),
(540, 'M.D GLAZING & RESEARCH', '32418500, 011-65157165', '', '', '', 'KHASRA NO. 967, GROUND FLOOR , LAL DORA , RITHALA  DELHI', ''),
(541, 'M.G INDUSTRIES', '9818692471, 9911637453', '', 'anuj@mgindustries.com, sonexdecor@gmail.com', '', '20/6 , MATHURA ROAD , NUCHEM COMPOUND  FARIDABAD', ''),
(542, 'M.J ENGINEERING WORKS', '9416213808, 9416321745', '', 'mj.engineerings@gmail.com', '', 'G1-181, 11D CENTER, INDUSTRIAL AREA ,KHUSHERA ,ALWAR  RAJ.', ''),
(543, 'M.P STEELS', '9416517085, 9416845544', '', '', '', 'PWD STORE , JHAJJAR ROAD  ROHTAK', ''),
(544, 'M.T WOOD SUPPLIER', '9897846367,  9837995532', '', '', '', 'RAHMATPUR PIRAN KALIYAR SHARIF ROORKE  HARIDWARE', ''),
(545, 'MAAN EARTHMOVERS', '9811641018, 9891190062', '', '', '', 'VILL. PIYALA (BALLABGARH) FBD. SIMS.AppMaster.Model.MVendor', ''),
(546, 'MAC ROOF INDIA PVT.LTD', '8527294289, 8527294292', '', 'sales@macroof.in  , smm1@macroof.in', '', 'PLOT NO. SC-1, BLOCK-C SEC-12, PRATAP VIHAR ,  GHAZIABAD', ''),
(547, 'MADAN TRACTOR', '9312407415,  0129-2414281', '', '', '', 'SHOP NO. 8 , BATRA BUILDING , BATA CHOWK , N.I.T  FARIDABAD', ''),
(548, 'Magicrete building solutions', '8130515368', '', 'pawan.choudhary@magicrete.in', '', '305,Dlf qutub plaza, dlf city phase-1,  Gurgaon (HR)', ''),
(549, 'Maha laxmi traders', '252021', '', '', '', 'palwal', ''),
(550, 'MAHABIR BUILDING MATERIAL STORE', '9810062316', '', 'mbms.delhi@gmail.com', '07AXKPA6023A1Z5', '', ''),
(551, 'MAHADEV BRICKS UDYOG', '9896408791 , 9812393932 , 07206339606', '', '', '', 'NEAR K.C.M.  SCHOOL , BANCHARI - HODAL , PALWAL SIMS.AppMaster.Model.MVendor', ''),
(552, 'Mahadev Industries', '9811119301 , 9873582450', '', '', '', 'C - 10, Sector A - 2, UPSIDC, Tronica  Ghaziabad', ''),
(553, 'MAHAJAN IRON WORKS PVT. LTD.', '9999777238 , 9811210011', '', 'mahajansteel_1985@yahoo.in', '06AAGCM1809E1ZT', '17H/9A, Industrial Area, NIT FARIDABAD faridabad', 'TMT & Cement'),
(554, 'Mahalaxmi Electrical & Hardware Store', '7060070626 , 7060070627', '', 'Mahalaxmi2015hr@gmail.com', '', 'T-1 Shivalik Nager B,H,E,L Ranipu Haridwar', ''),
(555, 'MAHALAXMI TRADING CORPORATION', '9811547845, 0129-4023814', '', 'khatri_vinod@hotmail.com', '06AALFM3526G1ZC', 'PLOT NO. 40/66B, INDUSTRIAL AREA , HARDWARE CHOWK   FARIDABAD', ''),
(556, 'MAHAVIR MARBLE', '9810556992 , 4043143', '', 'smm10821c@gmail.com', '', 'PLOT NO 108 SECTOR 21-C FARIDABAD', ''),
(557, 'MAHENDER mudgal BMS', '9810439531   .   09728232425 , 9728531221', '', '', '', 'OMEGA IMT MANESAR , DISTT GUR HR', ''),
(558, 'MAHENDER SINGH WATER SUPPLIER', '9050339911 , 9416039911', '', '', '', 'PRITHLA', 'BMS'),
(559, 'MAHENDRA FABRICATOR', '9416350292 , 9053262636', '', '', '', 'ALIGARH ROAD SALLAGARH  PALWAL', ''),
(560, 'MAHESH CRANE', '9999336642, 7065898955', '', '', '', 'TIGAON PULL , BY PASS ROAD BALLABGARH  FARIDABAD', ''),
(561, 'MAHESH KUMAR', '9784425791 , 7737616141', '', '', '', 'E.P.I.P GATE MOHLADIA ,   NEEMRANA  RAJASTHAN', ''),
(562, 'MAHESH ROOFING ENTERPRISE', '09650072121 , 9650252121 , 09811470807', '', 'maheshroofing@gmail.com', '06AAUFM5009P1ZM', 'PLOT NO 287 , SEC 24 FARIDABAD', ''),
(563, 'MAIDHAN (JCB)', '9212395998 , 9811162020', '', '', '', 'VILL.BHALGROLA, NEAR IMT MANESAR, GURGAON SIMS.AppMaster.Model.MVendor', ''),
(564, 'MAKHAN LAL EARTH MOVER', '9991367375 , 8607115005', '', '', '', 'AADRESH COLONY , HODEL  PALWAL  121106', ''),
(565, 'MAKRANA MARBLES', '08054060160, , 80540604604,9215566524,9416073666', '', '3752099448', '03ABCPK6696D1ZR', 'JODI SARAKA , CHEEKA ROAD  PATIALA', ''),
(566, 'MALANI MARBLES', '9810387297, 9811012011', '', 'www.malanimarbles.com', '', '809-810 ,Chattarpur Mandir Road , Near Tivoli Garden  New Delhi', ''),
(567, 'Malani Marbles & Granites', '09810387297 , 09811012011 , 09312951868', '', 'malani77@gmail.com', '', 'Plot no 54 P, sec 34 huda marble market gurgaon', ''),
(568, 'MALIK EARTH  MOVER  & MATERIAL SUPPLIER', '9996298788,   9466755364', '', '', '', '', ''),
(569, 'MALIK SANITARY STORE', '9810742460, 0129-2413474,- 75', '', 'maliksanitary@gmail.com', '', '1G-49 B.P N.I.T  FARIDABAD', ''),
(570, 'MALIK SONS', '2329156 , 2321033 , 4065903 , 9350183911', '', 'maliksons.ggn@gmail.com', '', 'BANSAI ROAD BADA BAZAAR GUR', ''),
(571, 'MANALI MINERAL WATER ENT.', '9871977765 ,  9718304023', '', '', '', '318, AAPKA BAZAR GURGAON 122001 SIMS.AppMaster.Model.MVendor', ''),
(572, 'Mangal glass & plywood house', '9314041699, 8290258080, 9950027276', '', '', '', 'BUS STAND ROAD BEHROR ALWER RAJ.', ''),
(573, 'MANGALAM CEMENT LTD.', '07459- 232812, 233123', '', '', '', 'ADITYA NAGAR , P.O MORAK , DISTT. KOTA', ''),
(574, 'MANGLA FABRICATOR', '9873421744', '', '', '', '', ''),
(575, 'MANGLA REDIMIX PVT LTD', '9310104321 -23', '', '', '06AAFCM1490C1ZT', 'SIKRI , FBD SIMS.AppMaster.Model.MVendor', ''),
(576, 'MANGLA STEEL', '9215740025 , 9416308681 , 9717773446 ,09650001712', '', 'bb40', '', 'MAL GOUDUAN ROAD PALWAL SIMS.AppMaster.Model.MVendor', ''),
(577, 'MANGLA TRADERS', '9871622917 , 2276305 , 08527272277', '', 'Dhanesh.mangla@gmail.com', '', 'S.C.F  NO . 28 ,103-104, SEC 28  FARIDABAD , HR', 'TAPE CRETE, PUTTI'),
(578, 'MANGLAM TRADERS', '9540402263, 9015055059', '', '', '', 'MAIN DADRI ROAD , SEC. 41, G.B NAGAR  NOIDA', ''),
(579, 'Mangtu ram yadav bms', '9667684481 , 9828509414', '', '', '', 'modern shopping complex camps , neemrana  Alwer (Raj)', ''),
(580, 'Manish sanitary store', '9811914154, 0129- 2230742', '', '', '', 'sohna road', ''),
(581, 'MANJEET TRADERS', '23236785 ,9891169213, 9811991010', '', 'manjittrders@gmail.com', '07AAHPK9591R1ZN', '110006', ''),
(582, 'MANOJ BROTHER PRIVATE LIMITED', '9811071747, 45561900', '', 'mbpl.cement@gmail.com', '', '211-212, LOCAL SHOPPING COMPLEX ,H-BLOCK ,VIKAS PURI  NEW DELHI', ''),
(583, 'Manoj Engineering works', '09811872414 , 09873542414 , 01292426762', '', '', '', '2 H/38 , Park Market NIT  Faridabad', ''),
(584, 'MANOJ KUMAR JCB', '9799285100 , 8107265506', '', '', '', 'HONDA CHOWK , BANBIRPUR ,  KHUSHKHERA DISTT. ALWER  (RAJ)', ''),
(585, 'MARION WUERTH INDIA PVT.LTD', '8860632145, 9999979863', '', 'ravi.rahi@wurthdelhi.co.in ,', '', '#2, NEPCO - COMPOUND 20/4 , MATHURA ROAD  FARIDABAD  121006', ''),
(586, 'marshal enterprises', '9811748920 , 23210826', '', 'marshalvibrators@gmail.com', '07AAEFM7296A1ZA', '702/2 phatak dhobiyan gb road  new delhi', ''),
(587, 'MARSHAL SALES  AGENCIES', '9811748920,  23218986', '', 'zahid@marshalvibrators.in', '07AATPS7250B1ZG', '2440-41, BEHIND 65, G.B ROAD,  NEW DELHI  110006', ''),
(588, 'Maruti Concrete Udyog Prithla', '98120070091', '', 'maruticoncrete10@gmail.com', '', 'jatola road palwal', ''),
(589, 'MASARS GOVIND TRADERS', '9358919545,  9319021556', '', '', '', 'BUS STAND JAGJITPUR KANKHAL  HARIDWAR', ''),
(590, 'MATA JI BATTA BHARAT SUPPLIER', '9811461167', '', '', '', 'SIMS.AppMaster.Model.MVendor SIMS.AppMaster.Model.MVendor', ''),
(591, 'Matrix Trade Link', '9818365123, 9560963929', '', '', '', 'Shopping Centre, Near Ajrondha chowk,  Sector-15 A Faridabad', ''),
(592, 'MB ENTERPRISES', '9599208494 , 9899975437', '', '', '', '112 rajpur khurd chattarpur new delhi', ''),
(593, 'MEENA CONCRETE', '9717249997', '', '', '', '', ''),
(594, 'MEENU WATER SUPPLIER', '9871098578', '', '', '', 'VILL.KAKROLA, NEAR SEC 7, IMT MANESAR ,GURGAON SIMS.AppMaster.Model.MVendor', ''),
(595, 'MEGHRAJ EARTHMOVERS', '9810808102 , 9810632904', '', '', '', 'KASAN ROAD , MANESHER, IMT ,DISTT.GURGAON  - 122050 (HR) SIMS.AppMaster.Model.MVendor', ''),
(596, 'MEHAR CHAND TEWATIA', '9255999516 ,    9812629569', '', '', '', 'VILL MIRAPUR, THE & DISS. PALWAL, HARYANA SIMS.AppMaster.Model.MVendor', ''),
(597, 'MEHRA AUTOMATION INDUSTEIES', '9466711994, 9315777795', '', '', '', '', ''),
(598, 'MEHTA FABRICATORS & TRADERS', '9310264466 , 09311430595', '', 'mehtafabricatorsandtraders@gmail.com', '', 'PRAVESH MARG , RAILWAY ROAD OLD FARIDABAD  FARIDABAD', ''),
(599, 'MERINO PANEL PRODUCTS LIMITED', '9650390775,9 011-30515300 , 09811330358', '', 'merinopg@merinoindia.com', '', '2/14, WHS , 2nd Floor , kirti nagar ,  New Delhi  110015', ''),
(600, 'Metal Roofing System', '9818139440 , 9582379668', '', '', '', '1C/37, Near Land Mark Bata Flyover, Faridabad', ''),
(601, 'METRO STEEL TRADERS', '0129-4019534 (M) 9811253877,9311253878', '', '', '', 'PLOT NO. 61/5-V, INDUSTRIAL AREA, EICHER CHOWK,  FARIDABAD (Dealsin: ANGLE, CHANNEL, TMT-TOR ETC.)', ''),
(602, 'MG Enterprises', '4009802 , 09873443456 , 09212211200', '', 'anuj@mgenterprises.in', '', 'SCF-35, SEC-11-D, SHOPPING CENTRE, NEAR- AGARWAL SEWA SADAN Faridabad', ''),
(603, 'MG MATERIALS', '011-25408625, 8802242769, 8588852431', '', 'info@mg-materials.com', '', 'J-52C , 3RD FLOOR , BERIWALA BAGH ,HARI NAGAR  NEW DELHI', ''),
(604, 'MIGLANI INTERNATIONAL', '011-27312016,   27314016 , 9811316670 , 9582254342', '', 'spares.miglani@yahoo.com ,', '', 'F-1 , 7-D.P , LOCAL SHOPING COMPLAX  PITAM PURA  DELHI', ''),
(605, 'MIGLANI PAWAN', '9811133232', '', '', '', 'SEC 24 FBD SIMS.AppMaster.Model.MVendor', ''),
(606, 'MINI HARDWARE', '9811370575', '', '', '', 'NIT FBD SIMS.AppMaster.Model.MVendor', ''),
(607, 'MITALI ALLOYS  P LTD', '09983132377 , 9829915677 , 09672309077', '', 'info@mitalialloys.com', '08AAFCM2043R1Z3', 'Khasra No. 298, sec. 2-A, Gaurav Path Bhiwadi 301019', ''),
(608, 'MITALI ALLOYS (P) LTD.', '01765-251815, 252815', '', 'info@mitalialloys.com', '03AAFCM2043R1ZD', 'OPP. HARCHAND MILL . MOTIA KHAN , GOBINDGARH  PUNJAB', ''),
(609, 'MITTAL BOOT HOUSE', '9891892911, 9911992880', '', '', '06BCVPK1201R1Z7', 'H.NO. 26, GALI NO. -3, NATHU COLONY, 100 FT ROAD CHAWLA COLONY  BALLABGARH', ''),
(610, 'mittal bricks bhanra gram udhyog samiti', '9872995890 , 9814834404 , 8437672654', '', '', '', 'thaper  patiala', ''),
(611, 'MITTAL FOAM HOUSE', '9810285255, 9871864815, 0129-2418572, 4108572', '', '', '06ABHPM8207FIZR', 'SHOP NO. 17,18, NEW TIKONA PARK N.I.T  FARIDABAD', ''),
(612, 'MITTAL HARDWARE KALSA ROAD NEAR SEC 10A', '9810646320 , 2304597', '', '', '', 'GUR MAIN KHANDSA ROAD , GURGAON HR SIMS.AppMaster.Model.MVendor', ''),
(613, 'Mittal oceantrade pvt. ltd.', '0184-2273520, 4045560', '', '', '', 'Imambara , sadar bazar Karnal (HR) SIMS.AppMaster.Model.MVendor', ''),
(614, 'MOD FURNITURES', '0129-2415811, 4022067 , 9310133033,', '', 'modoffice@gmail.com ,  www.modfurnitures.com', '', '', ''),
(615, 'MODERN BUILDERS', '9812027444 , 9812827444', '', '', '', 'MAIN MAMA CHOWK , DELHI - ROHTAK ROAD ,M.I.E   BAHADURGARH   HARYANA  SIMS.AppMaster.Model.MVendor', ''),
(616, 'MODERN HARDWARE STORE', '9811085484 , 08285031196 , 4028512', '', 'specialityexim.in@gmail.com', '06AAGFM9081R1ZG', '2A-1 BP NIT  FARIDABAD', 'NITO BOND , HARDNER'),
(617, 'Modern Steels Corporation', '9999860689', '', 'modernsteelscorp@gmail.com', '06ADVPJ4426F1ZF', 'Avon Complex, Sector-55 FARIDABAD', ''),
(618, 'MODERN TRADERS', '8826511010, 9650511010', '', '', '', 'PLOT NO. 60, BAZRI INDUSTRIAL AREA , DABUA - PALI ROAD N.I.T  FARIDABAD', ''),
(619, 'MODERN TRADERS & ENGINEER DELHI', 'tele/fax : 100-23218003', '', '', '', '3663,11ND FLOOR, GALI SHAHTALA (BHIND G.B ROAD ) DELHIB 110006 SIMS.AppMaster.Model.MVendor', ''),
(620, 'MODI DIAMOND TOOLS (MODI SALES CORP)', '9810802705, 91-11-28520262', '', 'modidt@yahoo.co.in', '', 'C-5A/264, 2ND FLOOR , JANAK PURI  NEW DELHI  18', ''),
(621, 'MODI HARDWARE STORE', '9876107368 , 9915002668', '', '', '', 'OLD GRAIN MARKET , SIRHIND  PUNJAB', ''),
(622, 'MOHAR RAM', '9927783100 , 9219702251', '', '', '', 'SHOP NO,18. SUPER MARKET , ANAJ MANDI , KOSI KALAN MATHURA', ''),
(623, 'MOHD. IRFAN', '9871434789, 9818413136', '', '', '', 'CN-688, VASANT KUNJ ENCLAVE , SHANKER CAMP , RANGPURI PAHARI NEW DELHI', ''),
(624, 'Mohunta Agencies', '9017505000, 7015200469', '', 'ani9215910955@gmail.com', '', 'geeta bhawan marg sirsa', ''),
(625, 'MOJINDER SINGH YADAV', '9871467085', '', '', '', 'H .NO. 647-1/22, GALI NO. 7 , SHIVAJI PARK  GURGAON', ''),
(626, 'MOTI BHATTA SONDHAD, FARIDABAD', '9215611066 , 9991139359. 946067687', '', '', '', 'SONDHAD, FARIDABAD bricks', ''),
(627, 'MR Choudary', '9219702251', '', '', '', 'Kosi', ''),
(628, 'MR RAWAT HILTI', '9990637640', '', '', '', '', ''),
(629, 'MRN Industries', '09812007091, 9050031425 , 9999270040', '', 'mrnindia10@gmail.com', '', '', ''),
(630, 'Ms.Poswal crane service', '9982839683, 8875870000, 9982602964', '', '', '', 'near paramount cable ltd. khushkhera  alwar raj.', ''),
(631, 'Mukesh Brother', '9810366040, 4036040, 9310366040', '', '', '', 'B-280, nehru ground ,nit  faridabad', ''),
(632, 'MUKESH KUMAR', '9818412676 , 08930960083', '', '', '', 'B BLOCK PREM NAGAR N SIMS.AppMaster.Model.MVendor', ''),
(633, 'MUKESH KUMAR JUGDISH PARSHAD STONE MARCHANT', '9929520031,  9829453073', '', '', '', 'BUS STAND ROAD BEHROAD ALWER  RAJESTHAN', ''),
(634, 'MULTI DECOR', '9953558947', '', '', '', '157 A, BLOCK B SECTOR -11, FARIDABAD, HARYANA', ''),
(635, 'MUNDHRA BROTHERS', '9999934375 , 0129-2418245', '', 'mundhrabrother@airtelmail.in', '', '1/D14 B.P , 1&2CHOCK , N.I.T  FARIDABAD', ''),
(636, 'MURARI LAL', '9313780170, 9811477359', '', '', '', 'MAIN ROAD , GOVINDPURI METRO STATION  NEW DELHI  110019', ''),
(637, 'MYK LATICRETE', '9650468884 , 9111--43020145/6', '', 'akhan@myklaticrete.com', '', 'NO.357, FIE, PATPARGANJ INDUSTRIAL ESTATE  NEW DELHI', ''),
(638, 'MYK SCHOMBURG INDIA PVT LTD', '9310117490 , 9350621097', '', 'amareshm@mykschomburg.com', '', 'D- 343, 1st Floor, Sector – 10 Noida', ''),
(639, 'N.B. EARTHMOVING SPARE', '9711987514, 9211699370', '', '', '', 'SEC-9, BYE PASS, NEAR BAROLI CHECK POST  FARIDABAD', ''),
(640, 'N.N STONE COMPANY', '9414485315, 9261235415', '', '', '', 'FACT.   HI-141, AMARPURA IND.AREA , RAMGANJMANDI KOTA   RAJ.', ''),
(641, 'N.S. Concretes Pvt. Ltd.', '8130495501', '', 'manish@nsgroup.in', '', 'Gurgaon', ''),
(642, 'NAFIS AHMED', '9991400163, 9813181802', '', '', '', 'NAGLA AHSANPUR  HODAL ( PALWAL)', ''),
(643, 'NAGAR EARTH MOVER', '9891306142, 9911993360', '', '', '06AEPPN5082A1ZJ', 'OPP. SHIV B.ED. COLLAGE , BALLABGARH TIGAON ROAD  FARIDABAD', ''),
(644, 'NANAK STEEL', '9899160048, 9811673045', '', '', '', 'SHOP NO.11 , LAKHI MARKET , SEC-31  FARIDABAD', ''),
(645, 'Narender Kumar', '9711501027', '', '', '', 'B-411,Dubua colony nit faridabad', ''),
(646, 'NARESH KUMAR  ( SAHAJ NEER)', '9034002450', '', '', '', 'VILLAGE. CHHAPROLA  PALWAL', ''),
(647, 'NATIONAL CEMENT & LIME STORE', '9810031187, 9811333320 , 01123217497 ,', '', 'ncls1942@yahoo.com', '', '7-3938, Behind HDFC Bank, GB ROAD , DELHI -110006', 'Bitumin, Sealing compound, Polysulphide'),
(648, 'NATIONAL SALES CORP', '4112918 , 4112919 , 4112920', '', '', '', 'BARA BAZAR, BASAI ROAD, GURGAON SIMS.AppMaster.Model.MVendor', ''),
(649, 'NATURAL STONE GURGAON', '9811096354 - 9873411345', '', '', '', 'HERO HONDA CHOWK , OPP. ROSELAND PUBLIC SCHOOL ,NH 8 -GURGAON SIMS.AppMaster.Model.MVendor', ''),
(650, 'Navair International Pvt. Ltd.', '9910495247', '', 'sandeep.sharma@navairindia.com', '', '59/17, 2nd Floor, Kalkaji Extn. Guru Ravidass Marg New Delhi', ''),
(651, 'NAVAL SINGH', '9810335421, 26784937', '', '', '', 'VILLAGE.& P.O , MAHIPALPUR NEW DELHI', ''),
(652, 'NAVEEN KUMAR', '9899606047 , 9911132400', '', '', '', '', ''),
(653, 'Naveen Plywood', '9877000154', '', '', '', 'Nabha gate Patiala', ''),
(654, 'NAVEEN TRADERS', '9971359041, 9818399008', '', '', '', 'VILLAGE . ANANGPUR ,NEAR GREEN FIELD COLONY FARIDABAD', ''),
(655, 'NAVNEET INDUSTRIES (MAHAVIR) KOTA', '9887427843', '', '', '', 'E-67,ROAD NO. 4 INDREPRASTHA INDUATRIAL AREA , KOTA', ''),
(656, 'NAVRATAN PIPE AND PROFILE LIMITED', '9811961007, 011-47285555', '', 'dnbhardwaj@navratangroup.com', '', '10, COMMUNITY CENTER ,3Rd FLOOR , MAYAPURI INDUSTRIAL AREA PHASE -1  NEW DELHI', ''),
(657, 'POSH BUILDING SOLUTIONS', '9416344427', '7206091427', '', '', '6071/1, MACHHI  MOHALLA, NEAR SEWA SAMITI GIRLS HIGH SCHOOL', 'CHEMICAL'),
(658, 'Neelkanth Enterprises Pvt. Ltd.', '98,112,116,839,999,700,992', '', 'neelkanthent@yahoo.com', '', '84/13, Gali No.3, Mundka Udyog Nagar New Delhi', ''),
(659, 'NEHAL ENGINEERING WORKS', '9891701237', '', '', '', '1857,SARAN TALAB ROAD , JAWAHAR COLONY N.I.T  FARIDABAD', ''),
(660, 'NEMI SINGH CHAUDHARY', '9950444144, 9521931180', '', '', '', 'JAIPUR', ''),
(661, 'Neta Bhatia Forver Living Products', '9213738475', '', 'neeta_bhatia@ymail.com', '', 'faridabad  121008', ''),
(662, 'NETRAM GURJAR BUILDING MATERIAL SUPPLIER', '9251079715, 9950817878', '', '', '', 'N.H-8, NEEMRANA MODE , NEEMRANA  BEHROR', ''),
(663, 'NETRAPAL', '9999775067 , 9250133637 , 9213344795', '', '', '', '', ''),
(664, 'NETWORK DOT ZONE', '9873156040', '', 'raviindel@gmail.com', '', 'SHOP NO.44, SEC.29 FARIDABAD', ''),
(665, 'NEW GOLD WATER PROOFING', '9899622959', '', '', '', 'BE141 TIGDI EXTENSION DELHI 62  DELHI', ''),
(666, 'NEW HARINDRA BRICK KILN', '9811133232', '', '', '', 'VILL. SAGARPUR, BALLABGARH, FARIDABAD SIMS.AppMaster.Model.MVendor', ''),
(667, 'NEW LAXMI BUILDING MATERIAL SUPPLIER', '9810833785, 9212649950, 9899989971', '', '', '', 'VILL. & P.O. KHERKI DAULA, GURGAON SIMS.AppMaster.Model.MVendor', ''),
(668, 'NEW LAXMI TILE', '9899989971 , 09599999983', '', '', '', 'MANESAR', ''),
(669, 'New Star Carrier (goyal)', '09311433222 , 9811119684', '', '', '', '10 no bhatta road sec 28 faridabad', ''),
(670, 'NIKSON ENTERPRISES', '9811406551', '', '', '', '21/5 MILESTONE, BALLABGARH faridabad', ''),
(671, 'NIMODIA STONE IMPEX', '9811133232,  7737078551,  9414178551', '', '', '', 'C-231,INDRAPRASTHA INDL.AREA, ROAD NO.5, KOTA RAJASTHAN', ''),
(672, 'NINA CONCRETE SYSTEM PVT. LTD.', '9999985404 , 9814572443 , 9910071437', '', '', '', 'D10/3 Okhla Industrial Area,Phase 1,Near Skoda Motors Showroom NEW DELHI', ''),
(673, 'NINE PROJECT PRIVATE LIMITED.', '91-11-29532601', '', 'sales@9projects.com, www.9projects.com', '', 'KHASRA NO. 262, WESTEND MARG , SAIDULLAJAB, NEAR SAKET METRO STATION  NEW DELHI', ''),
(674, 'Nirali hardware  gallery', '09350043092 , 011- 32223092 / 26387092 / 93', '', 'niralidelhi@nirali.com', '', 'S-26, Ground Floor, Okhla Industrial Area, Phase II New Delhi', ''),
(675, 'NIRALI JYOTI INDIA METAL IND. PVT. LTD.', '011-32223092, 9350043092,', '', 'niralidelhi@nirali.com,  www.niralisinks.com', '', 'S-26, GROUND FLOOR , OKHLA INDUSTRIAL AREA , PHASE 11,  NEW DELHI', ''),
(676, 'Nitco marble & granite pvt. ltd', '9313010510, 011-24633684/85 , 09910508297', '', 'sales@nitcotiles.in', '', 'J-29, jor bagh road  New Delhi', ''),
(677, 'NITCO TILES', '9818216583', '', '', '', 'PLOT NO 300 PHASE 2ND UDYOG VIHAR GUR SIMS.AppMaster.Model.MVendor', ''),
(678, 'NITESH MISHRA', '9717528725', '', 'nitesh.avco@gmail.com', '', 'I- 222, EKTA VIHAR, JAITPUR PART -1 , BADARPUR NEW DELHI', ''),
(679, 'NITIN ENTERPRISES', '9971697468 , 41420328', '', '', '', '1/51, GROUND FLOOR, W.H.S. KIRTI NAGAR, NEW DELHI-110015', ''),
(680, 'NORTHERN STEEL & GENERAL MILLS PVT LTD.', '45695051', '', '', '', '95B 11 THE MOHAN CO.OP.INDL ESTATE LTD. BADARPUR  NEW DELHI  110044', ''),
(681, 'NUOVA FORZA IMPEX PVT.LTD', '9873870776', '', '', '', '24/17, old rajinder nagar  new delhi', ''),
(682, 'NUVOCO VISTAS CORP. LTD. ( formerly lafarge india limited )', '9205143322, 0124-44112250', '', '', '06AAACL4159L1ZC', 'ADDRESS :14/4 MILESTONE , MATHURA ROAD , FARIDABAD  HARYANA', ''),
(683, 'Om and Shiv Stone Co.', '0124-2379557', '', '', '', 'Bilaspur chowk  , vill. bhora kan gurgaon', ''),
(684, 'OM CARRIER', '9873695212 , 9873975212', '', '', '', 'SEC8 IMT MANESAR GURGAON india', ''),
(685, 'OM CEMENT', '2283025', '9810701195 ,4006195', '', '06AABFO2440H1ZN', 'SEC 11 D SHOP NO 40 FARIDABAD', ''),
(686, 'OM ENTERPRISES', '9818032727', '', '', '', 'GURGAON 122001 HR SIMS.AppMaster.Model.MVendor', ''),
(687, 'OM MANGLA STEEL & FAB', '9873421744 , 9811421744', '', '', '', 'SEC 7 PLOT NO 34  60 FOOT ROAD FARIDABAD jawahar colony', ''),
(688, 'OM PAL CHACHAL', '09891112994 , 09891110994', '', '', '', 'HERO HONDA CHOCK NH 8 HUR', ''),
(689, 'Mitali Alloys Pvt Ltd', '9829915677', '', '', '24AAFCM2043R1Z9', 'D - 508, Madhav Avenue, \nSafari Hotel,  S.P. Ring Road, \nOdhav to Vastral Road, \nOdhav, Ahmedabad - 382415 ( Gujrat)', ''),
(690, 'OM Prakash BMS', '9812165033 , 09050561632', '', '', '', 'Prithla', ''),
(691, 'OM PRAKASH SATISH KUMAR', '9990006006', '', 'ayushbansal23@gmail.com', '', 'NAGLOI Delhi', ''),
(692, 'OM PRAKESH & SONS', '9810465221, 012402307200', '', '', '06AEEPP0488L1Z4', 'BHUTESHWAR MANDIR CHOWK , BARA BAZAR ROAD  GURGAON', ''),
(693, 'OM PRAKESH SATERING', '9250378278', '', '', '', '', ''),
(694, 'OM SAI CRANE SERVICE', '9718523123, 9911682780', '', '', '', 'N.H- 8, BEHRAMPUR ROAD, OPP. PUROLATER INDIA LTD . KHANDSA GURGAON', ''),
(695, 'OM SAI FABRICATOR (JAGDISH)', '9873899569', '', '', '', '', ''),
(696, 'OM SPUN PIPE INDUSTIRES', '9811881516, 9811138821', '', 'osp.industries@gmail.com', '', 'Booth No. 4 & 5, Huda Market, Sec-1, NEAR ANAZ MANDI , BALLABGARH  FARIDABAD, Haryana -121004\nomspunpipes.com,', 'RCC pipe'),
(697, 'OM STEEL', '9891046556 , 9810798620', '', 'omsteelfbd35@gmail.com', '06AEYPR6555F1ZS', '1J-4, NIT FBD', ''),
(698, 'OM STEELS', '01493-297325, 09214311737', '', 'omsteels30@yahoo.in', '', 'NEAR LIC BUILDING , TIJARA ROAD , BHIWADI  ALWAR (RAJ)', ''),
(699, 'OM TRADING CO.', '9899272775', '', '', '', '20/7 MATHURA ROAD FARIDABAD SIMS.AppMaster.Model.MVendor', ''),
(700, 'OMKAR STAINLESS STEEL', '0129-4175683 , 09958002799', '', '', '', '1B/39,OPP.RAMDHARM KANTA N.I.T FARIDABAD-121001(NCR DELHI)', ''),
(701, 'OMVIR (yash bms)', '09899487515 , 9466405016', '', '', '', 'J/SAND', ''),
(702, 'OP GARG & SONS PVT LTD', '9810701195 , 4006195 , 2283025', '', '', '', 'BOOTH NO 40 SEC 11D FBD cement', ''),
(703, 'ORBIT TRADEX PVT. LTD', '99999 72999 , 9810134720', '', '', '', 'A - 75, J. F. F. Complex, Jhandewalan Flated Factory New Delhi', ''),
(704, 'ORIENT CERAMIC & INDUSTERIES LTD.', '+915735222,203,205 , 8373914439', '', 'IMFO@ORIRNTTILES.COM', '', '8, INDUSTRIAL AREA , SIKANDRABAD -203205, DISTT.BULANDSHAHR UP SIMS.AppMaster.Model.MVendor', ''),
(705, 'Ovilite Industries', '9818812889', '', 'Ovilitedel1@gmail.com', '07ABQPA9983K1ZW', 'B6/1, 3rd Floor Commercial Complex Safdarjung Enclave, New Delhi', ''),
(706, 'P - SAT CONCRETE SOLUTIONS', '9216523036', '', 'bansal.gcpl@gmail.com', '', 'NR. DERA SACHA SUDA SATSANG BHAWAN, SANGRUR ROAD, PATIALA', ''),
(707, 'P L Stone Industries', '9829099589', '', 'plstoneindustries@gmail.com', '', '212 , 1st floor , apex mall lalkhoti tonak road Jaipur', ''),
(708, 'PACIFIC  PARAS INFRA P LIMITED', '9610958675', '', 'parasinfrabilling@gmail.com', '', 'NEEMRANA', ''),
(709, 'PADMINI  INDUSTRIES LIMITED', '9711118830,  +91-1123235293', '', 'vinay@padminiindia.com', '', 'H.O -29, RAGHUSHREE COMPLEX , GROUND FLOOR , AJMERI GATE    DELHI', ''),
(710, 'PANKAJ CHAUHAN EARTH MOVER', '9719332200', '', '', '', 'RAJA BISCUIT CHOWK SIDCUL  HARIDWAR', ''),
(711, 'PANKAJ TRADING ENGINEERS', '2412866, 2473745', '', '', '', '', ''),
(712, 'Paramhans  trading company', '7500200040 , 9416636489', '', '', '', 'Sec.59 ,  Ballabgarh', ''),
(713, 'PARAMOUNT INTERCONTINENTAL PVT LTD', '9711625424 , 9810363888 , 9818644470', '', 'harsh@foampe.com , insulation@pisw.com', '', '56-B, BLOCK ED, MADHUBAN CHOWK PITAMPURA, NEW DELHI', ''),
(714, 'PARAS PETROLEUM', '8745878000', '', '', '', 'N-H 8 , ANAJ MANDI  GURGAON', ''),
(715, 'PARKER  DAVIS ( INDIA )', '24033081', '', '', '', '48, S.N ROY ROAD , BEHALA  KOLKATA', ''),
(716, 'PARNAMI ENTERPRISES', 'PH - 0129-2420033, 2420044', '', 'parnamient@yahoo.co.in', '', 'SHOP NO.5 OPP.GAZAL HOTEL , NEAR 1-2 CHOWK NIT  FARIDABAD 121001', ''),
(717, 'PARNAMI SALES CORPORATION', '420044 , 9818689552 , 09711918030', '', '', '', 'SHOP NO.4 , 5 TIKONA PARK  NEAR NIT  Faridabad', ''),
(718, 'PATEL SONS', '9312941731,  9811407128', '', '', '', '18/1 , MATHURA ROAD , NEAR CROWN PLAZA  FARIDABAD', ''),
(719, 'PATHAK TRADERS', '9899435298, 9899561699', '', '', '', '3E-17A,B.P ,NEAR NO.3 PULIA , N.I.T  FARIDABAD', ''),
(720, 'PAVERS INDIA PVT LTD', '9818585267', '', '', '', 'VILL. RITHOJ , SOHNA ROAD GURGAON HARYANA', ''),
(721, 'PAVING INTERNATIONNNAL', '9610139900', '', 'dhaker.naresh@gmail.con,  www. cobblepaving.in', '08ARGPD1025K1Z3', 'VILL. AANT , PO- MAKREDI , TEH- BIJOLIA , BHILWARE  RAJASTHAN', ''),
(722, 'PAVIT INSPIRED MINDSCAPES', '9311221072 , 9958934349, 9313455310', '', 'anant.dwivedi@pavits.com  , gopal.singh@pavits.com', '', '254 A/1, T.K HOUSE , 2ND FLOOR PRESS ENCLAVE ROAD , OPP MAX HOSPITAL SAKET  NEW DELHI  110017', ''),
(723, 'Pawan  chandila bisleri water supplier', '9266017902, 9266006925', '', '', '', 'Sec.9, by pass road near badoli check post , Faridabad', ''),
(724, 'PAWAN S/ SH. ANGOOR SINGH', '9996459408', '', '', '', 'V.P.O. GIJHI TEHSIL SAMPLA  ROHTAK', ''),
(725, 'PAWAN SEHRAWAT', '9671603086, 9467147577', '', '', '', 'NEAR JANOLI MORE BAGHOLA  PALWAL', ''),
(726, 'PAWAN TIMBER MERCHANT', '9899091022 ,  9311091022', '', '', '', 'PLOT NO. B-339, POWER HOUSE ROAD , ASHOK ENCLAVE MAIN, SARAI KHAWAJA , FARIDABAD   12103', ''),
(727, 'PCI PEST CONTROL PVT.LTD', '0124-2384190', '', '', '06AABCJ9086F1ZE', 'SCO NO. 129 , 2ND FLOOR /HUDA MARKET ,SEC-46  GURGAON', ''),
(728, 'Penetron India Pvt. Ltd.', '9320201301 , 9599928044 , 9871164792', '', '', '', '', ''),
(729, 'Perfect Celling', '9560035151 , 9811310923', '', 'perfectcelling@gmail.com', '', 'Rama palace shop -2, 3rd floor, phase-2,  faridabad 121003', ''),
(730, 'PERFECT LIVING', '9717444337 , 9818579189', '', '', '', '1F/36 BP ,TIKONA PARK, NIT', ''),
(731, 'PHILIPS INDIA LIMITED', '+91-124-4606318, 9910041383 , 09891013950', '', 'sandeep.shah@philips.com, www.philips.com', '', '9TH FLOOR ,DLF 9-B , DLF CYBER CITY , DLF PHASE -3  GURGAON  122002', ''),
(732, 'Pidilite industries limited', '0172-4246010, 4246017 , 09958210080 , 9468420556', '', 'amitkumargupta79@yahoo.co.in', '', 'Plot no. 72, industrial area phase-11, Ram darbar, Chandigarh', ''),
(733, 'PIKASO HOUSEWARE', '9810805020, 9810722033', '', 'neelkanthpolymers@yahoo.com', '', '5A-48 ,N.I.T   FARIDABAD', ''),
(734, 'PILWAN CRANE SERVICE', '9891290009, 9718380009', '', '', '', 'SHOP NO. 5, KRISHNA COLONY . OPP . PLOT NO. 77, SEC. 55  FARIDABAD', ''),
(735, 'PINTOO BUILDING MATERIAL SUPPLIER', '9711548181, 9718548181,  8750548181', '', '', '', 'VILL. KHERI KALAN ,  FARIDABAD', ''),
(736, 'Pioneer Caps &  Slopes Pvt Ltd', '9855375285', '', 'salespioneercaps@gmail.com', '', '', ''),
(737, 'PIONEER ENGINEERING INDUSTRIES, GUR', '09311140512 , 9311140515', '', 'pioneer.engineeringindustries@gmail.com', '', '36.5 K.M MILESTONE, NEAR HERO HONDA CHOWK, DELHI JAIPUR HIGHWAY,GURGAON -122001 HR SIMS.AppMaster.Model.MVendor', ''),
(738, 'PIONEER INDIA ROOFING SHEET COLOUR COATED IN DELHI NCR', '9811081730, 0129-2280545 , 9811006496', '', 'pioneerindia@yahoo.com', '', '16/7 RAJIV GANDHI CHOWK MATHURA ROAD FARIDABAD  roofing sheet colour coated in Delhi NCR', ''),
(739, 'piyush engineering works', '09210691720 , 09210466588', '', '', '', '58 bone mill complex gali no 2 ballabgarh faridabad', ''),
(740, 'Piyush Engineers', '919810368385 , 9254071800', '', '', '', '47M, INDUSRIAL AREA,EAST INDIA CHOWK, N.I.T Faridabad', ''),
(741, 'PM Impex pvt. ltd.', '9911239991', '', 'prashant@pmimpex.in , info@pmimpex.in', '', 'plot no 57 , mup 1st, ecotech 3rd greater noida', ''),
(742, 'POLYCRAFT', '9212712326', '', '', '', 'L-17 G SHEIKH SARAI PHASE II NEW DELHI -17', ''),
(743, 'polypack pipe', '09811393179 , 9891237707 , 9811874950', '', 'ps.polypack@gmail.com', '', 'gur', ''),
(744, 'POLYSKYLIGHTS', '9212712326, 9811574300, 9250694174', '', 'sarna_amit77@rediffmail.com', '', 'L-41/G, SHEIKH SARAI , PH-11,  NEW DELHI', ''),
(745, 'G.D TRADERS (Pooja bms)', '09896102508 , 09991715271', '9466984063', 'gdtraders0@gmail', '06ABLFS6074N1ZG', 'TITARPUR ROAD , PRITHLA PALWAL', 'BRICKS'),
(746, 'POOJA ENTERPRISES', '9811158393  , 9311158393', '', '', '', 'PLOT NO -18 , SECTORE 6 , FARIDABAD', ''),
(747, 'PRADEEP CROCKERY HOUSE', '0129-4054998 , 9810805020', '', '', '', '5A-48, N.I.T  FARIDABAD', ''),
(748, 'Pradeep hardware', '9983132377', '', '', '', 'industrial area khushkhera Bhiwadi', ''),
(749, 'PRADEEP NIJHAWAN', '9811818066', '', '', '', 'PALWAL', ''),
(750, 'PRADEEP TIMBER', '9810039976', '9810442666(baton),9810339976(ply)', 'pradeeptimber@gmail.com', '07AAJFP4265H1ZI', '2806, SADAR TIMBER MKT , TELIWARA.', 'Sawn Timber'),
(751, 'Pragati Concrete Udyog (spun pipe)', '9818681921 ,9818681903, 01125552191', '', '', '', 'A - 1/B - 6, Local Shopping Centre, Janakpuri, Delhi', ''),
(752, 'PRAKASH CHAND TRACTOR', '9899510843 , 9650258606', '', '', '', 'NEAR G.P - 51 ,SEC - 18 , SARHOUL , GUR HR SIMS.AppMaster.Model.MVendor', ''),
(753, 'PRAKASH ENGINEER TRADERS', '9312413933 , 9350937658', '', 'pumpwala@gmail.com', '', 'N.H 8,NEAR BUS STAND MANESAR , GURGAON SIMS.AppMaster.Model.MVendor', ''),
(754, 'PRASHANT INTERIORS', '98,106,217,819,810,594,816', '', '', '', 'RZ-B2/38VIJAY ENCLAVE.DABRI PALAM ROAD NEW DELHI', ''),
(755, 'PRAVEEN BATRA', '7503091658', '', '', '', 'YAMUNA 15.5', ''),
(756, 'PREETI TRADE LINK', '9810198598', '', '', '06AAFCP1874K1Z5', 'DSS 45,46 MARBAL MKT SEC 21C faridabad', ''),
(757, 'Prem Engineering works', '9899293015', '', '', '', '', ''),
(758, 'PREMIER AGENCIES', '9811394130', '', '', '', '487/86, PEERAGARHI CHOWK  NEW DELHI', ''),
(759, 'Premier powder coating', '0124-4030737', '', '', '', '210,sec-37, Udyog vihar, phase-vi, Gurgaon', '');
INSERT INTO `vendordetails` (`vid`, `vname`, `vmobile`, `valtmobile`, `vemail`, `vgst`, `vaddress`, `vdesc`) VALUES
(760, 'Premier sales', '01493--512687, 09783114444', '', 'psbhiwadi@gmail.com', '', 'B-294-295, 11nd area , Bhiwadi, near Union Bank of India  Rajasthan', ''),
(761, 'PREMIER STEEL COMPANY', '9810377969', '', 'anoop.khandelwal@hotmail.com', '', 'Y-256/6, 1ST FLOOR ,LOHA MANDI, NARAINA  NEW DELHI', ''),
(762, 'PRERIT TRADING', '9899034909', '', '', '', '1E/3,S.S.I. PLOT , MARKRT NO.1.GEETA MANDIR ROAD NIT  FARIDABAD', ''),
(763, 'PRINCE PIPES & FITTINGS PVT LTD', '9717415778', '', 'nru@princepipes.com', '', '911,Kriti shikhar tower, District Center, Janak Puri New Delhi-110058', ''),
(764, 'PRINCE SPUN PIPE', '9466083326', '', '', '', 'VILL. MANDHIYA KHURD , BERLI ROAD  REWARI HR', ''),
(765, 'PRIYA PRINTING PRESS', '9811700369', '', '', '06AMLPK4531H1Z3', 'SHOP NO. TIKONA PARK MKT , FBD', ''),
(766, 'PROMAT MALAYSIA SDN BHD', '9902044557, 9910695564, 011-25778413 , 9910695564', '', 'ramr@promat-asia.com , info-india@promat-asia.com', '', '610-611, ANSAL IMPERIAL TOWER , C- BLOCK COMMUNITY CENTRE, NARAINA  NEW DELHI', ''),
(767, 'PUNEET BUILDING METRIAL SUPPLIER', '0129-2232383 , 9891450457', '', '', '', 'MAIN ROAD ,SEC 23/24,OPP.LAKHANI (I) LTD. FARIDABAD', ''),
(768, 'PUNEET IRON  STEEL PVT LTD', '0129 241 6657 , 9818004444', '', '', '', 'NEHRU GROUND  B-275, BK CHOWK, NEHRU GROUND, NEW INDUSTRIAL TOWNSHIP, FARIDABAD, HARYANA SIMS.AppMaster.Model.MVendor', ''),
(769, 'Puri tyre & tube centre', '9312225986, 9810975000', '', 'purityre78@yahoo.com', '06AAPPP0878C1ZJ', 'shop-78,tikona park, n.i.t faridabad   faridabad   121001', ''),
(770, 'Puru Enterprises', '9212233459', '', 'yashpalchawla.yp@gmail.com', '', '516, sec.-21c,  Faridabad  121001', ''),
(771, 'PUTZMEISTER CONC. MACHINE PVT LTD', '91 09911923522 , 09899933080', '', '', '', 'C/O DTDC SUPPLY CHAIN SOLUTIONS B1/E-23 MOHAN CO-OPERATIVE INDUSTRIAL AREA BADARPUR, NEW DELHI-110044', ''),
(772, 'Puzzolana green bricks', '9971430666, 9810063596', '', 'amit@puzzolanagreen.com', '', 'Dhansa border, vill.dhansa, najafgarh,  new Delhi', ''),
(773, 'QUICK BUILDING SOLUTIONS', '0129-4132803, 9999926015', '', 'quickbuildingsolutions@gmail.com', '', 'OFF. 304, BASEMENT, ASHOKA ENCLAVE MAIN, SEC.-34,FARIDABAD', ''),
(774, 'R P TRADERS', '9214012641 , 9251471013', '', '', '', '', ''),
(775, 'R. S. INDUSTRIES', '+919810532567, +919212306802', '', '', '', 'B-64, 3rd Floor, Flatted Factory Complex, Jhandewalan,  New Delhi', ''),
(776, 'R.B.WATERPROOFING (I) PVT LTD.', '9873713408', '', 'rbwaterproofing@gmail.com', '', 'B-7/53, Safdarjung Enclave Extn., New Delhi-29', ''),
(777, 'R.G TRADING  CO.', '9999991835', '', 'praveengargswpipes@gmail.com', '', 'PLOT NO.94 , SEC-3 FARIDABAD', ''),
(778, 'R.K BRICK  FIELD', '9927087799, 9837210888', '', '', '', 'RAILWAY ROAD LANDHAURA, , OFF. ARYA NAGAR CHOWK , JWALAPUR  HARIDWAR', ''),
(779, 'R.K. CRANE SERVICE & EARTH MOVERS', '9350704180, 9312887474', '', '', '', 'U.P.S.I.D.C. INDUSTARL AREA PLOT NO. E-23 SIKANDRABAD (U.P)', ''),
(780, 'R.K.BMS', '9416066360', '', '', '', 'MALL GODOWN ROAD PALWAL FBD SIMS.AppMaster.Model.MVendor', ''),
(781, 'R.N BUILDING (RAJPAL)', '9582513797 , 9910524500', '', '', '', 'J/SAND SIMS.AppMaster.Model.MVendor', ''),
(782, 'R.P ENTERPRISES', '9871154071', '', '', '', 'PLOTE NO. 45, GALI NO.54/6, SANJQAY COLONY, SECTOR-23, N.I.T FARIDABAD', ''),
(783, 'R.S Engineering Works', '9811882954 , 9818561762 , 9717888795', '', 'rsew.pidilite@gmail.com', '', '245, Prem Nagar, Mohna Road, Ballabgarh Faridabad', ''),
(784, 'R.S SUPPLIERS', '9958178705 , 9990933130', '', '', '', 'GURGAON NURSINGPUR', ''),
(785, 'RADHA BUILDER', '9999180164 , 9650137825', '', 'radhabuilder2017@gmail.com', '', 'PLANT NO. 175, MAIN ROAD LONI Gaziabad', 'bms'),
(786, 'RADHA PLYWOOD', '9871139480', '', '', '', 'OPP. AGGARWAL DHARMSHALA LINK ROAD FBD faridabad', ''),
(787, 'RAHUL', '9971238655', '', '', '', 'yamuna keri pul', ''),
(788, 'RAHUL  BUILDING MATERIAL SUPPLIERS', '9999820097, 8447910906', '', '', '', 'VILLAGE KHARI KALAN , NEHAR PAAR  FARIDABAD', ''),
(789, 'RAHUL MARBLE & GRANITE', '9810041263 , 9212526068', '', '', '', 'plot no. 11 & 38 , sec- 21c, marble market faridabad', ''),
(790, 'RAINBOW PAINTS AND CHEMICALS', '+91-129-2418757,+91-129-2415962 , 981-818-3959', '', '', '', '', ''),
(791, 'RAJ ENTERPRISES', '2414706 , 2415086 , 9899442111', '', '', '06ABMPR5611D1ZR', '1F/37 , B.P. TIKONA PARK , NIT FARIDABAD gi , ms pipes', 'water tank'),
(792, 'RAJ HARDWARE STORE', '2415217 , 9873952256', '', '', '06AAWPB3389H1ZC', '1 e /18 bp NIT FBD', ''),
(793, 'RAJ TRADING CO.', '0124.4086753 , 09810506753', '', 'sintex.gurgaon@gmail.com', '', '17, GAUSHALA MARKET , OPP. BUS STAND  GURGAON', ''),
(794, 'Rajan Associates.', '0129-4052759 , 2414654 , 9811115442', '', '', '', 'Shop No.1, 1D-8 NIT Faridabad', ''),
(795, 'RAJASTHAN ENGINEERING WORKS', '9887476126, 7339935011', '', '', '', 'NEAR PARSA MATA CHOURAHA , KUDAYLA RAMGANJMANDI KOTA  RAJASTHAN', ''),
(796, 'RAJBIR MATERIAL SUPPLIER (POOJA BATTA)', '9468225207 , 9813924001', '', '', '', 'HASANPUR ROAD HODAL SIMS.AppMaster.Model.MVendor', ''),
(797, 'Rajesh Color Lab', '2415903 , 2415011', '', '', '', 'B-440-443 , Nehru Ground , opp.Escorts Medical Center , Bhind neelam cinema , N.I.T  Faridabad 121001', ''),
(798, 'RAJESH GOYAL BMS', '9813031212 , 9891498350', '', '', '', 'OLD G.T. ROAD, PALWAL', ''),
(799, 'Rajesh kumar', '9654541242 , 9315898900', '', '', '', 'sec 16 faridabad', ''),
(800, 'RAJESH YADAV, H.S. CARRIER(MANESAR)', '9871294545 , 9582302200 , 9599350065', '', '', '', 'N.H.-8, BUS STAND,NEAR STATE BANK OF INDIA,  Maneser (Gurgaon) B.M.S', ''),
(801, 'RAJKUMAR SHIVGANPATI', '9818768676 , 9212768676', '', '', '', '', ''),
(802, 'RAJPAL', '9983132377 , 9718375705 , 9891741079', '', '', '', 'J/SAND SIMS.AppMaster.Model.MVendor', ''),
(803, 'RAJVEER', '8755767267, 8439907001', '', '', '', 'HARIDWAR', ''),
(804, 'RAJVEER YADAV', '9928740629 , 8058839447', '', '', '', 'VILLAGE . MIRZAPUR , DIS. MUNDAWAR ALWER RAJ.', ''),
(805, 'Rakesh Kumar (BMS)', '9873300823 , 9911871099', '', '', '', '121002', ''),
(806, 'RAKESH KUMAR YADAV', '98106395208', '', '', '', 'V.P.O BAGHANKI , DISTT.  GURGAON   HR  SIMS.AppMaster.Model.MVendor', ''),
(807, 'RAKESH TRADING CO.', '23231378, 22118976, 9899144289,', '', '', '', '66/15, NARAIN MARKET , AJEMRI GATE, DELHI', ''),
(808, 'KARTIK ELECTRICALS & PNEUMATICS', '0129- 2417672', '2416557', '', '06AAIPN4328C1ZZ', '1E-3A, N.I.T FARIDABAD 121001', 'ELECTRICALS ITEMS'),
(809, 'RAM KARAN    (R.K)', '8890579591', '', '', '', 'N.H. 8  NEEMRANA', ''),
(810, 'RAMA BUILDING MATERIAL STORE', '9837620019', '', '', '', 'HIRDAYPUR MORE . OPP MANISH HOTEL .G.T ROAD SIKANDRABAD UP', ''),
(811, 'RAMA ENTERPRISES FBD', '9810449164 , 9810602799 , 9212495690 , 9013352744', '', '', '', 'E 41, NEHRU GROUND, N.I.T FARIDABAD', ''),
(812, 'RAMA PLYWOOD AGENCIE', '9911448899', '', '', '', '', ''),
(813, 'Rama Rolling Shutter Works', '23613072 , 9811177561', '', '', '', '75 , M. M. Road Rani Jhansi Road Pahar Ganj New Delhi', ''),
(814, 'RAMAN WATER PROOFING', '9810702246', '', '', '', 'FBD SIMS.AppMaster.Model.MVendor', ''),
(815, 'RAMESH', '9911569103 , 9811158393,9911237578', '', '', '', 'NARNOL SAND 35 SIMS.AppMaster.Model.MVendor', ''),
(816, 'RAMESH FILLING STATION', '82,851,155,939,266,592,768', '', '', '', '56/22,VOL NEEMKA TIGAON BLB FARIDABAD', ''),
(817, 'Ramkesh Crane Service', '9999036613 , 9015415014', '', '', '', 'Vill. Naharpur, Nar Kuma Company, IMT Manesar Gurgaon', ''),
(818, 'RAMNATH YADAV R.O  BOTTAL & DM BATTERY WATER SUPPLIER', '9813813044, 9996702375', '', '', '', 'NEAR GOSAI MANDIR VILL.JHUNDSARAI ,IMT MANESAR GURGAON', ''),
(819, 'RAMSWAROOP & SONS', '9414707030, 9413067026, 94139 92333', '', 'ramswaroop.and.sons2012@gmail.com', '', '', ''),
(820, 'RANBIR SINGH', '9468008768', '', '', '', 'MATHURA ROAD , BADARPUR  NEW DELHI', ''),
(821, 'RANGU RAM MOHAN LAL', '23217386,  25823721, 9711959817', '', '', '07AAVPM9654K1ZP', '5279/38,  GB ROAD  SHARDHANAND MARG  DELHI', ''),
(822, 'RAPID INDIA', 'MAYANK 9910981996', '', 'rapidindiars@gmail.com', '', '2443, Basement Hudson Lane Kingway Camp Delhi', ''),
(823, 'Rashid Husain', '8826058076, 8285042734', '', 'husain.Rashid893@gmail.com', '', 'H.NO. G-129, GROUND FLOOR, SAURABH VIHAR, JAITPUR, BADARPUR  NEW DELHI', ''),
(824, 'RATHI BARS LIMITED', '(01493) 518855, 518833.', '', 'www.rathisteels.com , rathisteelms@gmail.com,', '', 'SP1-7, RIICO INDUSTRIAL AREA, KHUSHKHERA, P.O. TAPUKRA-301707, DISTT.ALWAR,, RAJASTHAN', ''),
(825, 'RATHI INDUSTRIES LIMITED', '8802932460', '', 'vishawaas.rathisteel@gmail.com', '', 'MAIN G.T ROAD , CHHAPRAULA GAUTAMBUDH NAGAR  UTTAR PRADESH', ''),
(826, 'Rathi JCB services', '9950817878', '', '', '', 'neemrana  rajasthan', ''),
(827, 'Rathi special steel limited', '1143165400', '', '', '', 'Plot no SP 29 , F 20-24 RIICO ind. area khushkhera bhiwadi', ''),
(828, 'Rattan Sales Corporation', '0129-4169884, 4027248, 9811705010,9811903224', '', 'rattansalescorp@gmail.com', '', '11-12 ,Tikona Park Market ,N.I.T  Faridabad 121001', ''),
(829, 'RAVE ENERGY LLP', '8503019195, 0129-4044004', '', 'info@raveenergy.co.in', '', '250,  1ST FLOOR , OM SUBHAM TOWER NIT  FARIDABAD', ''),
(830, 'RAVI  DHOLPUR HOUSE', '9871308308 , 9971308308', '', '', '', 'PLOT NO. 2, SECTOR -21C , MARBLE MARKET  FARIDABAD', ''),
(831, 'RAVI BMS', '9812027444 , 9812827444', '', '', '', 'BHADURGARD   MAIN MAMA CHOWK , DELHI - ROHTAK ROD M.I.E 124507', ''),
(832, 'RAVI DEALERS', '951276- 267300,   9812027444,', '', '', '', 'MAIN MAMA CHOCK DELHI -ROHTAK ROAD MIE  BAHADURGARH', ''),
(833, 'RAVI STEEL', '9214332851', '', 'sharma_steel@redifmail.com', '', 'H-31, PHASE -1 , INDUSTRIAL AREA  BHIWADI', ''),
(834, 'RAVIT  (BARS)', '9871809315', '', '', '', 'SIMS.AppMaster.Model.MVendor SIMS.AppMaster.Model.MVendor', ''),
(835, 'Rawat brother & company', '9215573818, 9416373818', '', '', '', 'Near bus stand, old g.t road, hodal  Palwal', ''),
(836, 'RD BUILDING MATERIAL', '9660896916 , 9929329222', '', '', '', 'NEAR GULMAHAR HOTEL BYE PASS- TAPUKARA,DISTT,. ALWER (RAJ) SIMS.AppMaster.Model.MVendor', ''),
(837, 'RDC CONCRETE (INDIA) PVT.LTD.', '9205593023', '', 'sumit.tewari@rdcconcrete.com', '', 'Sarai Khawaja 12 / 2 Mile Stone Opposite Vatika Mind Scapes', ''),
(838, 'REHAAN CARRIER UNASS', '967145500', '', '', '', 'VIJAY CHOWK , NEAR NEW BUS STAND , TAURU HR', ''),
(839, 'RICHA INFRASTRUCTURE LIMITED', '4009262, 4133968, 9718998845 , 08826897638', '', 'sanjay.sharma@richa.in', '', 'PLOT NO. 29 , DLF INDUSTRIAL AREA , PHASE -11 FARIDABAD 121003', ''),
(840, 'RIPPLE CONSTRUCTION PRODUCTS PVT.LTD', '9999090720, 9030041058, 9555650668', '', 'jatin@rippleindia.in', '', 'BOOTH NO. 32 , SEC-46, HUDA MARKET  FARIDABAD', ''),
(841, 'RISHAB GLASS & PLYWOOD CO.', '981851275', '', '', '', 'MALKHAN MARKET , IMT CHOWK MANESAR , N.H -8 , DISTT. GURGAON', ''),
(842, 'RITU TECH', '9540483838 , 9927406826', '8194001390', 'ravi@ritutech.net', '', 'PLOT NO. 9C , INDUSTRIAL PARK -2 , HERO REALITY LTD. NEAR SIDCUL  HARIDWAR (UK)', ''),
(843, 'RK BATTA CO.', '9811430053 , 9211672529', '', '', '', 'BALLABGARH', ''),
(844, 'RK EARTH MOVERS JCB (chhel singh)', '9414638952 , 9414543617', '', 'rkearthmovers2011@rediffmail.com', '', 'TIJARA ROAD , BHIWADI MODE  BHIWADI', ''),
(845, 'RK ENTERPRISES', '4027252 , 2410252 , 9811015024', '', '', '', 'SIMS.AppMaster.Model.MVendor SIMS.AppMaster.Model.MVendor', ''),
(846, 'RK FIRE PROTECTION', '9810257054 , 9811596941', '', '', '', '5L/126, NIT  FARIDABAD', ''),
(847, 'RMC READYMIX (INDIA)', '9560111362', '', 'manvendra.singh@rmcindia.com', '', '14/07 CHINTAMANI METAL UDYOG MATHURA ROAD  FARIDABAD', ''),
(848, 'RMC Readymix (India) ( A Division of Prism Cement Limited)', '9646005819', '', 'rajnish.tripathi@rmcindia.com ,', '', '', ''),
(849, 'RMC Readymix (GGN-India)(A Division of Prism Cement Limited)', '9650195114, 9717492309', '9717492310, 9717492304', 'salesncr@rmcindia.com', '', 'Vill.-Dhumaspur,Jail Road, P.O.-Badshahpur,Sohna Road, Farukh Nagar,Tajnagar Gurgaon 122101\npravin.kumar@rmcindia.com', 'rmc'),
(850, 'RMC READYMIX PLOT NO B-65 SITE IV', '8800888401', '', 'brijmohan.sharma@rmcindia.com ,', '', 'INDUSTRIAL AREA SAHIBABAD GAZIABAD SIMS.AppMaster.Model.MVendor', ''),
(851, 'RMG STEELS PVT LTD', '0120-4225844, 4571152', '', 'rmgsteelspvtltd@gmail.com', '', 'B-51, Hosiery Complex Phase-II Extn. Noida', ''),
(852, 'ROHAN ENGINEERING WORKS', '26302439, 26301862 FAX 26302439', '', '', '', 'VILLAGE RAJPUR KHURD, NEW DELHI-110030 SIMS.AppMaster.Model.MVendor', ''),
(853, 'ROHIT RAO', '9971093492, 9891381916', '', '', '', 'PLOT NO.372, ARYA NAGAR , MILK PLANT ROAD BALLABGARH FBD', ''),
(854, 'ROSHAN LAL STEEL & COMPANY', '9810123606,9818105856', '', 'gargvinay@gmail.com', '', 'H.O. 113/16, PREM NAGAR , NEAR BHUTESHAR MANDIR  .     BARA BAZAR ,BASAI ROAD ,GURGAON', ''),
(855, 'RR INDUSTRIES', '9650575495', '', '', '', 'PLOT NO.111B , SEC-4, FARIDABAD', ''),
(856, 'RS TRADERS', '9818143753', '', '', '', 'PLOT NO 20 MAN SINGH MARKET SEC 3 FBD SIMS.AppMaster.Model.MVendor', ''),
(857, 'S.B. TRADERS', '9891499910, 9910484220', '', '', '06ACPFS0448F1Z1', '102/8 , SARAI HUSSENI OLD  FARIDABAD', ''),
(858, 'S L TRADERS', '8287883481', '', 'slt.sintex@gmail.com', '', 'PLOT NO . 8 , MANGE RAM PARK , MAIN KANJHAWLA ROAD BUDH VIHAR , NEW DELHI - 110086', ''),
(859, 'S. SHARMA & SONS', '9818643887,  8802945087', '', '', '', 'PALLA NO. 1, VILAG PALLA , TILPAT ROAD  FARIDABAD', ''),
(860, 'S.K   Beverages  (Aquafizz)', '9255171602', '', '', '', '35, Mile Stone,Rewari-Pataudi Road, Vill.Gadaipur,( (Gurgaon) 1235002', ''),
(861, 'S.K ENGINEERS', '9814715666', '', 's.k.enggk13@gmail.com', '', 'EKTA NAGAR , ADJOINING , B-31 , FOCAL POINT  PATIALA PUNJAB', ''),
(862, 'S.K. ENGINEERS', '9911413396 , 98993396', '9213040450,  9910127003', '', '06AXFPM1048Q1Z4', '(DELHI)  Shop No.2 Vazirpur Road, Jeewan Nagar, Nehar Par, Old Faridabad, Haryana', ''),
(863, 'S.M.P.S', '8860000327, 8700303070', '', '', '', '', ''),
(864, 'S.R TRADING COMPANY', '0129-2416626, 2413608', '', 'srtradingfaridabad@yahoo.com', '', 'B-318-319 , NEHRU GROUND ,  FARIDABAD', ''),
(865, 'S.R.B. Traders', '9460256146, 9602408001', '', '', '', 'NH-8 Near HP Petrol Pump Alwar', ''),
(866, 'S.S WATER SUPPLIER', '9810491297', '', '', '', 'HR-125/6 , PUL PEHLADPUR , NEW DELHI 110044', ''),
(867, 'S.S.C BUILDING MATERIAL SUPPLIER ( SATPAL SINGH )', '9212044898, 9899044684, 9899072403', '', '', '', 'OFF. HARGOVIND ENCLAVE , DD MARKET  DELHI', ''),
(868, 'S.Y. BMS', '9810271919', '', '', '', 'NEAR HERO HONDA CHOWK, GURGAON SIMS.AppMaster.Model.MVendor', ''),
(869, 'SACHIN CARRIER', '9958955221', '', '', '', '954 , SEC 23A , NEW  CARTERPUR , GURGAON SIMS.AppMaster.Model.MVendor', ''),
(870, 'SADRE ALAM', '9810825027', '', '', '', 'SEC 31, 1108 LIG GUR -', ''),
(871, 'Safe- weld traders & engineers', '9873598504, 9891461682, 4022140', '', 'safeweld_sanket@yahoo.co.in', '', '2B-88, nit  Faridabad', ''),
(872, 'SAFEGUARD FIRE PROTECTIONS PVT. LTD., ashoka sales corporation', '9818272647, 8744070075', '', 'firesafeguard@yahoo.com', '', '347, DEEPALI , MAIN OUTER RING ROAD, PITAMPURA  NEW DELHI,  sales@firesafeguard.co.in', 'fire items'),
(873, 'Safety Solution', '9811007135 , 9313267122', '', 'safetysolution55@yahoo.com', '06AJXPJ8110G1Z1', 'Near Phase City , Petrol pump, Opp.Rose Land Public School, Hero Honda Chowk ,N.H - Gurgaon', ''),
(874, 'SAFEX CHEMICALS INDIA LTD.', '9001046081', '', '', '', 'C-60, ROAD NO.1C , VKI JAIPUR', ''),
(875, 'SAGAR BEARING & AGRICULTURE STORE', '9812650932', '', '', '', 'RASULPUR ROAD PALWAL', ''),
(876, 'SAGAR BRICKS FILD', '9719963570', '', '', '', 'NARSAN KELA HARIDWAR', ''),
(877, 'SAGAR WATER SUPPLIER', '9899673636, 9811258672', '', '', '', 'RZ-1 , SAYEED NANGLOI  NEW DELHI', ''),
(878, 'SAGGU TRADERS', '2215750, 5000985, 9872663288 , 9023332003', '', '', '03ADYPS1856K1ZU', 'INSIDE SHERANWALA GATE  PATIALA', ''),
(879, 'SAHJAD KHAN BOLDER MANESAR', '9813025452  ,   9050470953', '', '', '', 'VILL. CHILL, TEH. TAHRU, DISTT. MEWAT   HR', ''),
(880, 'SAI ENTERPRISES', '9910108484, 9212502050', '', '', '', 'PLOT NO.210, SAMASPUR, SEC-51 GURGAON', ''),
(881, 'Sai WATER SUPPLIER', '9350089966 , 09810842507', '', '', '', 'BYPASS ROAD - 9 , VILLAGE BADOLI, FARIDABAD SIMS.AppMaster.Model.MVendor', ''),
(882, 'SAIFI TIMBER & PLYWOOD', '9811078640, 0129-4012786, 2267702', '', '', '', 'SECTOR, 15A, SHOP NO. 5, HUDA MARKET, FARIDABAD', ''),
(883, 'Saini building material (monu bms)', '09812626888 , 09215199985, 9813463239', '', '', '', 'rajinder nagar gohana road', ''),
(884, 'SAINIK FILLING STATION (rana fuel)', '9654068722 , 9811689949', '', '', '', 'NH- 8 VILLAGE BINOLA GUR SIMS.AppMaster.Model.MVendor', ''),
(885, 'SAINKA CONSTRUCTIONS', '9810813904, 9810973904', '', 'sainkacons@gmail.com', '', '11nd , FLOOR GANESH NAGAR  TILAK NAGAR  NEW DELHI  18', ''),
(886, 'Saint-Gobain Gyproc India Limited', '9999798470 , 120-4061829', '', 'Ashwini.Chawla@saint-gobain.com', '', 'A-80 ( First Floor ) , Sector-2, Noida Uttar Pardesh', ''),
(887, 'SAKIR BMS', '9873122978 , 9813174878', '', '', '', 'MARKET NO..5, N.I.T  FARIDABAD', ''),
(888, 'SAKSHI INFRA PROJECTS', '9821162002, 8287351101, 7835844017', '', 'info.sakshiinfraprojects@gmail.com', '09AIGPT1892B2Z2', '10, RADHEY SHYAM PARK , SEC -5 , RAJENDER NAGAR SAHIBABAD GHAZIABAD', ''),
(889, 'SALIG RAM JIWAN LAL', '5015450, 5004772', '', '', '', 'NEAR SHAHI SAMADHAN , RAGHO MAJRA  PATIALA', ''),
(890, 'SAMBHAV PIPE INDUSTRIES', '9873775903, 23231378', '', 'ayush.jain021@gmail.com', '', '42-A , GROUND FLOOR INDUSTRIAL AREA, DILSHAD GARDEN  DELHI', ''),
(891, 'Samrat Techno Industries', '0129-4027328, 09811232800', '', 'samrat_technoindustries@yahoo.com', '', '1-C/6, B.P., N.I.T.  Faridabad (Hr.)', ''),
(892, 'SANA INDUSTRIES INDIA', '011- 65904281,82', '', '', '', '86 , SHAHZADA BAGH EXT, INDUSTRIAL AREA NEW DELHI', 'compactor'),
(893, 'SANDEEP STEEL TRADERS', '2422381 , 2422290 , 9810433572', '', '', '', 'PLOT NO39 VP NEELAM BATA ROAD NIT FBD SIMS.AppMaster.Model.MVendor', ''),
(894, 'Sandhu Engineers', '9868053295 , 9871982634', '', '', '', 'Plot No.82/7, Block -a, Bhart Colony, Naharpar Kheri Road OLd Faridabad 121002', ''),
(895, 'Sangam Trading co.', '9992177610 , 978218539', '', '', '', 'Railway road  Palwal', ''),
(896, 'SANJAY', '8398923367,  8053427845', '', '', '', 'SULTA PUR', ''),
(897, 'SANJAY ELECTRONIKS', '4101333, 4101555', '', '', '', 'SHOP NO.25, NEW TIKONA PARK MARKET ,N.I.T  FARIDABAD 121001', ''),
(898, 'SANJAY HARDWARE STORE', '9999152747, 9582450058', '', '', '', 'VILLAGE BHAKRI NEAR LAHA YARD & OPP. SAB GENERAL STORE N.I.T  FARIDABAD', ''),
(899, 'SANJAY MALIK', '9996298788, 9729456080', '', '', '', 'V.P.O KHARAWAR , DIST. ROHTAK', ''),
(900, 'SANJAY SANITARY STORE', '9837041517', '', '', '', '22, CIVIL LINES ,  ROORKEE', ''),
(901, 'SANJU', '9001832437', '', '', '', 'NEEMRANA', ''),
(902, 'SANJU KUMAR BUILDING MATERIAL SUPPLIER', '7733008324, 8852928324, 9214413919', '', '', '', 'N-H- 8, NEAR OM DHARAM KANTA , NEEMRANA MODE  NEEMRANA', ''),
(903, 'SANTLAL JCB SHIVA EARTH MOVERS', '09416065081, 09466784716', '', '', '', 'RIWARI OFFICE :   BANIPUR CHOWK ,96 KM STONE DELHI - JAIPUR ROAD . NH 8 BAWAL HR', ''),
(904, 'SARA PLAST PVT LTD.', '7838222911, 7838222905 ,8588847314', '', 'jatinder.mahajan@3sindia.com', '06AAJCS6876Q1ZA', 'PLOT NO.16, SHAHABAD MOHHAMADPUR  DELHI  61', ''),
(905, 'SARASWATI ENTERP BMS', '9250911999 , 8826269999', '', '', '', 'H.NO 67/B SUSHANT LOK II , NEAR POWER HOUSE GUR SIMS.AppMaster.Model.MVendor', ''),
(906, 'SARIF JAMSHED KHAN', '9813926456 , 9812286456 , 9813926456', '', 'jamshed6456@gmail.com', '', 'TIKRI KHEDA POST OFFICE DHOG FBD SIMS.AppMaster.Model.MVendor', ''),
(907, 'SAROJ ENGINEERING WORK', '9717546684, 9910020475', '', 'sarojeingineeringwork1984@gmai.com', '', 'D-11/38, HARI NAGAR EXTN. JAITPUR BADARPUR NEW DELHI', ''),
(908, 'SARSWATI SALES PVT LTD .', '9028141451', '', 'ajayrathi.sspl@gmail.com', '', 'OFFICE NO.14 ,  MITRA BUSINESS TRADE CENTER ,14  CHARATA  ROAD  DEHRADUN', ''),
(909, 'SATAKSHI CONSTRUCTION', '9818143753', '', '', '', 'NARNOUL SAND 2372, SEC 8  SIMS.AppMaster.Model.MVendor', ''),
(910, 'SATISH KUMAR', '9466593923, 8607420523', '', '', '', 'ASTHAL BOHAR, DELHI ROAD  ROHTAK', ''),
(911, 'SATISH KUMAR & SONS', '65233123, 9811340698', '', '', '', '2446-A , TELIWARA , SADAR BAZAR  DELHI', ''),
(912, 'SATNAM BRICKS', '9815530007, 9417523133', '', '', '', 'VILLAGE . DAKALA  PATIALA', ''),
(913, 'SATPAL SINGH JAMUNA', '9013733804', '', '', '', 'VILLAGE RAHIMPUR , PALWAL', ''),
(914, 'SATVEER BRICKS', '8440996542', '', '', '', 'TAPPU 34 SILARPUR- TIJAR (ALWAR) RAJ', ''),
(915, 'Satya Deep Udyog, S. A. Iron Foundry', '09412721134 , 09412271966', '', '', '', '11/42-C, Rambagh Crossing, Hathras Road, Agra', ''),
(916, 'SATYA PRAKASH (JAMUNA SAND)', '9990753481, 9873920070', '', '', '', 'FARIDABAD 11.5', ''),
(917, 'SATYA PRAKESH AGGARWAL & CO.', '23633907, 9811443468, 9818101123', '', '', '', 'SHOP NO. 2356-A, TELIWARA SADAR BAZAR  DELHI', ''),
(918, 'SATYAM ENTERPRIZES SANJEEV GUGLANI', '9711389001,4049001  . 9211334416', '', '', '', 'YAMUNA 14 SECTOR - 143 , NEAR VILLAGE GARHI - SHAHDRA NOIDA UP  SIMS.AppMaster.Model.MVendor', ''),
(919, 'SATYAM THERMOPACK INDUSTRIES', '0129- 6418180,', '', 'satyam_pack@yahoo.com', '', 'MOHNA ROAD , BALLABGARH  FARIDABAD', ''),
(920, 'Satyanarayan Bricks S.N.B.', '09319271195 , 09582506350', '', '', '09AIVPB1736B1ZF', 'SIKANDRABAD', ''),
(921, 'SAURABH SHEET CUTTER & BENDING WORKS', '9711739653, 9971421919', '', 'suryametal.processours@gmail.com', '', 'PLOT NO. 23, BABA HIRDAY RAM COLONY , MUJESSAR , SEC-24 , N.I.T  FARIDABAD', ''),
(922, 'SCHDEVA', '9250783455 , 9266066360', '', '', '', 'KALKA PAINT , E59 BADKHAL ROAD SGM NAGAR SIMS.AppMaster.Model.MVendor', ''),
(923, 'SCHNEIDER ELECTRIC  INDIA PRIVATE LIMITED', '7838188885, 91-124-3940400', '', 'suyashkumar.sharma@schneider-electric.com', '', '9TH FLOOR , DLF BUILDING NO. 10 , TOWER C , DLF CYBER CITY , PHASE 11 GURGAON  122002', ''),
(924, 'Securtech systems', '9999108430, 9313352131', '', 'vishalsecurtek@gmail.com', '', 'U-52/25,frist floor ,DLF Phase-111, Gurgaon Haryana', ''),
(925, 'SEHGAL DOORS (Dauerhaft Engineers (OPC) Pvt Ltd.', '9958764379, 9891139444 , 9891186444', '', 'neeraj@firedoorsehgal.com', '07aagcd1033m1zr', '22 c red mig flat rajouri garden NEW DELHI  110027', ''),
(926, 'Sentiment Furniture', '91 129 4080760 / 64 , 9910695447', '', '', '', '16/4, MAIN MATHURA ROAD  FARIDABAD', ''),
(927, 'SETHI HOME DECOR (dorset)', '9810224941', '', 'sethihomedecor@gmail.com', '', '', ''),
(928, 'SETHIA UDYOG', '9829038546, 9829035382', '', '', '', 'F-471, I.P.I.A ROAD NO.7 , ANANTPURA KOTA (RAJ.) SIMS.AppMaster.Model.MVendor', ''),
(929, 'SEVEN SEAS CARRIER', '9582010101 , 9899500120', '', '', '', 'FARIDABAD', ''),
(930, 'SEWA RAM BMS', '9911036160 , 9911180560', '', '', '', 'H.NO. 51C, SEC11 FBD SIMS.AppMaster.Model.MVendor', ''),
(931, 'SHABUDDIN', '9211110091, 7838958516', '', '', '', 'H.NO. 14, GALI NO.-1, AJJI COLONY BALLABGARH FARIDABAD', ''),
(932, 'SHAHZAD TIMBER', '9811117974, 9873892974', '', '', '', 'BADKHAL COLONY ,NEAR UNIQUE PUBLIC SCHOOL N.I.T  FARIDABAD', ''),
(933, 'SHAKTI HORMANN PVT. LIMITED', '9711201744 , 43,    011- 32449581 ,  2784 0394 ,', '', 'delhi-sales@shaktihormann.com', '', 'Plot No.20, Sripuri Colony, Karkhana, Secunderabad SIMS.AppMaster.Model.MVendor 110019', ''),
(934, 'SHAKTI INDUSTRIES HAZI ATUQUR RAHMAN', '9829240007  ,  2386307 , 2386107', '', '', '', 'KOTA   G- 407 -D,  INDERPRASTHA IND.AREA, ROAD NO. 6, KOTA - 5 SIMS.AppMaster.Model.MVendor', ''),
(935, 'Shakti Met-Dor Ltd.', '011 32449581 , 09711201743 , 9711201747', '', '', '', '205, Red Rose Building, 49-50, Nehru Place New Delhi', ''),
(936, 'Shalimar Seal & Tar Products Pvt. Ltd.', '09829065184 , 8003993312', '', '', '', 'B-7-8, Jaipur Tower M.I. Road, Jaipur', ''),
(937, 'Shalimar Trading Company', '9999700180 , 9810622110', '', '', '', 'No. 124- B, Chander Puri, Hapur Road, Chandar Puri Ghaziabad', ''),
(938, 'SHAM PIPES & IRON STORE', '98,184,455,452,304,896', '', '', '', 'KHANDSA ROAD GUR SIMS.AppMaster.Model.MVendor', ''),
(939, 'SHANKAR B.K.O', '9316667881', '', '', '', 'DHANOURI PATIALA', ''),
(940, 'Sharma hardware  & iron store', '9983132377 , 9799725280 , 9315577262, 9416577261', '', 'shardwarebwl@gmail.com', '', 'Banipur chowk, Bawal Rewari', ''),
(941, 'SHARMA JI KHANGARWALE & CO.', '9911312575 , 9811791862', '', '', '', 'MAIN DADRI ROAD , AGGHAPUR SEC-41 NOIDA', ''),
(942, 'SHARMA TRADERS', '01334-221759 , 9358192826', '', '', '', 'DEVPURA  HARIDWAR', ''),
(943, 'Sheel technology system', '9413066733', '', '', '', 'Shop .no 4 ,1st floor bhatiyaron ki gali ALWAR (RAJ)', ''),
(944, 'SHELLCO (REGD)', '9899033751, 9811033751', '', 'rathiinsulation@gmail.com', '', 'NEAR NIZAMMUDIN RAILWAY STATION , SARAI KALEY KHAN  NEW DELHI', ''),
(945, 'SHIV GORKSH BUILDERS', '9728626806', '', '', '', 'SUKHPURA CHOOK ROHTAK', ''),
(946, 'SHIV LAL BUILDING MATERIAL SUPPLIER', '9992160151,  9416140062', '', '', '', 'N.H -8 , BILASPUR CHOWK , PATAUDI ROAD  GURGAON', ''),
(947, 'Shiv plywood agency', '9910310009', '', 'shivplywood@gmail.com', '06AHQPB0283KIZA', '1e /22 bp nit faridabad', ''),
(948, 'Shiv Sai Steel', '9643700642', '', 'shivsaisteel@yahoo.in', '', '17h/7 nit  Faridabad', ''),
(949, 'SHIV SHAKTI EARTH MOVER', '9991895645, 9813141470', '', '', '', 'VILLAGE SIKANDERPUR  PALWAL', ''),
(950, 'SHIV SHAKTI ENTERPRISES', '8447756015, 9599987221', '', 'shikha@completescaffolding.in', '', 'Plot no. 8, Gali no. 8, Kadipur Industrial Area, Pataudi Road GURGAON', 'ply , batten'),
(951, 'SHIV SHAKTI ENTERPRISES (satpal)', '9999812002', '', '', '', 'SOUTH-EX  NEW DELHI', ''),
(952, 'SHIV SONS DELHI', '9810004082 , 23218327', '', '', '', '5214, G.B ROAD , OLD .HDFC BANK AJMERI GATE , NEAR RAILWAY SIDDING GATE , DELHI -6  SIMS.AppMaster.Model.MVendor', ''),
(953, 'SHIVA BRICKS INDUSTRIES (Sharma carrier )', '9416267649, 9466966022', '', 'erryougesh@yahoo.co.in', '06AJLPS4169A1Z5', 'VILL. SONDH  PALWAL', ''),
(954, 'shokin bms wbm', '9728122820', '', '', '', '', ''),
(955, 'SHREE BALA JI  RMC', '9582802104', '', '', '', 'NOORPUR TIKLI  ROAD BADSAHPUR   GURGAON', ''),
(956, 'CHAUDHARY TRADING COMPANY', '8239708188', '', '', '08AJPPJ8625A1Z5', 'N.H - 8 , DELHI ROAD - BEHROR (ALWAR ) RAJ.', 'BMS'),
(957, 'SHREE BALAJI EARTH MOVERS', '9068823276', '', '', '', '3 RS BILASPUR NEAR OLD BHARAT PETROL PUMP', ''),
(958, 'Shree Enterprises', '9425224492, 7014118575', '', 'shreejaipur21@gmail.com', '08ADDFS5065R1ZB', '6/384 chitrakoot scheme, vaishali nagar jaipur', ''),
(959, 'SHREE G INDUSTRIES', '9711278727', '', 'shreegindust@gmail.com', '', 'OFFICE NO. 135 ,1ST FLOOR , VARDHMAN TOWER PREET VIHAR  DELHI', ''),
(960, 'Shree Ganesh Traders', '9610962222', '', 'sgtbhiwadi@gmail.com', '', 'B92 Bhagat singh colony Bhiwadi', ''),
(961, 'SHREE HARI SALES PROMOTERS PVT LTD', '9212556526', '', 'shsp97@gmail.com', '', 'BARA BAZAR BASAI ROAD GURGAON', ''),
(962, 'Shree Karni Tiles', '9351371735 , 9650215151', '', '', '', 'G-573-574, south ext. , alwar', ''),
(963, 'SHREE KRISHNA TRADING  CO.', '9891460764', '', '', '', 'D-3, OIL MARKET, MANGOL PURI , PHASE-1,  DELHI', ''),
(964, 'SHREE MAA DURGA CARRIER', '9971136820, 9958892507', '', '', '', 'VILLAGE . NAURANGPUR, NEAR KARMA LAKE LAND GURGAON  HARYANA', ''),
(965, 'SHREE MANSHA TRADING CO.', '9911335952, 9212598914', '', '', '', 'MAIN ROAD , SEC. 57 ,OPP. WAZIRABAD VILLAGE , NEAR ARTMIS HOSPITAL  GURGAON', ''),
(966, 'SHREE OM STEEL CORPORTATION', '9810214208, 9871413767, 25892107', '', '7050279950', '', 'X-54, LOHA MANDI , NARAINA  NEW DELHI', ''),
(967, 'SHREE RAM SALES CORPORATION', '9872232444', '', 'shreeramsalescorporation.uppal@gmail.com', '', 'PLOT NO. 147, JLPL SECTOR 82 MOHALI  PUNJAB', ''),
(968, 'SHREE SAI STEELS', '9810602799 , 9810449164 , 0129-4058575', '', 'rama.fbd@gmail.com', '06AERPG1557K2Z6', 'PLOT NO. 132-133, SEC-59 FARIDABAD', ''),
(969, 'SHREE SHYAM ALUMINIUM & GLASS HOUSE', '9999841927, 9812556630', '', '', '', 'MAIN PATUDI ROAD , NEAR PEER BABA MAJAR KADIPUR GURGAON', ''),
(970, 'SHREE SHYAM TIMBER & PLYWOOD', '9810312936', '', '', '', '5A BAREJA SADAN MKT BADARPUR new delhi', ''),
(971, 'Shri Azad nath earth movers', '8059551807 , 9466882119', '', '', '', 'Near n.h.-8, hsiidc office , vill. Asalwas,  Bawal (Rewari)', ''),
(972, 'SHRI BALA JI CRANE SERVICE', '9813578792', '', '', '', '', ''),
(973, 'SHRI BALA JI PLYWOOD', '9837651595', '', 'shribalajirohit@gmail.com', '', 'NEW MARKET NEAR RAILWAY POLICE CHOCK JAWALAPUR  HARIDWAR', ''),
(974, 'Shri Balaji water supplier', '9891409078, 9818539543', '', '', '', '180, Sharmik vihar,  by pass road, sec30, Faridabad', ''),
(975, 'SHRI GOPAL ENTERPRISES', '9654171611, 9013320494', '', '', '', 'SHOP NO. MCF- 4182/2, SANJAY COLONY SEC-23, NEAR LAKHANI CHOWK  FARIDABAD', ''),
(976, 'SHRI JI TRADERS', '2418694', '', '', '', 'PLOT NO. 13, BATA NEELAM ROAD  FARIDABAD', ''),
(977, 'Shri krishna aluminium house', '9810040084, 9953809050', '', '', '', 'C-1 main road jugat puri ,  Delhi', ''),
(978, 'SHRI KRISHNA KHATRI  GOLDEN EARTH MOVER', '9813575556', '', '', '', 'VILL.& PO KULASI , TEH. BAHADURGARH  JHAJJAR', ''),
(979, 'shri laxmi electrical', '8285519555', '', 'atulnandani1@gmail.com', '', '2 a / 2 bp nit  faridabad', ''),
(980, 'SHRI MAYA TRADING CO.', '9639017253, 9412212450', '', 'shrimaya149@gmail.com', '', '38/2 , THDC COLONY, DEHRAKHAS ,  DEHRADUN', ''),
(981, 'SHRI PRAGYA SAGAR TRADING CO.', '9810171957', '', '', '', 'SHOP NO. D-4, MANGOLPURI INDL.AREA, PHASE -1  DELHI  83', ''),
(982, 'SHRI RADHEY KRISHNA ENTERPRISES', '7056777762', '', '', '', 'VILL. ASAOTI  PALWAL', ''),
(983, 'SHRI RAM CEMENT WORKS', '07744-2480214,  fax. 0744-2480296', '', '', '', 'KOTA RAJESTHAN', ''),
(984, 'SHRI RAM CONCRETE PRODUCTS', '8130713434,', '9911802003', 'shreeramconcrete@gmail.com', '', '147, SEC-37 ,  FARIDABAD', 'rmc'),
(985, 'SHRI RAM ENTERPRIESES', '9717773446 , 9811088496 , 23840083 , 23843274', '', 'sb.shriramenterprises@gmail.com', '', 'SHOP NO.23 & 24, VASHIST COMPLEX, M.G. ROAD SIKANDERPUR GURGAON', ''),
(986, 'SHRI RAM FENCING', '9811647573', '', 'dkpfencing14@gmail.com', '', 'PLOT NO. 683, GALI NO. -3 , SAINI VIHAR ,NR. METRO PILLAR NO. -506  , MUNDKA NEW DELHI', ''),
(987, 'SHRI RAM NATURAL STONE', '9871308308 , 9971308308', '', '', '', 'PLOT NO 2&5 SEC 21C FBD SIMS.AppMaster.Model.MVendor', ''),
(988, 'SHRI RAM SPUN PIPE', '9810263641 , 9711295111', '', 'srspipe@gmail.com', '06abkfs3265n1zm', 'khasra no 52/1 vpo seekri ballabgarh  faridabad', ''),
(989, 'shri ram trading co.', '9560422220 , 9899483540', '', '', '', '358/01, shastri colony sec 19  faridabad', ''),
(990, 'SHRI SHYAM CONTACTOR', '9313310025 , 9466503325', '', '', '', 'PLOT NO 1, SEC 1 , MANESAR, DISTT. GUR. SIMS.AppMaster.Model.MVendor', ''),
(991, 'SHRI SHYAM PLYWOOD AND GLASS HOUSE', '9810312926', '', '', '', 'SIMS.AppMaster.Model.MVendor SIMS.AppMaster.Model.MVendor', ''),
(992, 'SHRI VISHWKARMA DHARAM KANTA', '9466916005, 9812162519', '', '', '', 'BAGHOLA ROAD , TATARPUR CHOCK PALWAL', ''),
(993, 'SHRIJEE PLYWOOD TIMBER', '9990006006 , 9310448629', '', '', '', 'ISLAMPUR , NEAR JND GARDEN , SHONA  ROAD , GURGAON    HR    SIMS.AppMaster.Model.MVendor', ''),
(994, 'SHUKLA & COMPANY', '9811917925, 9811917935 , 9711976117', '', '', '', '370-D CHIRAG DELHI', ''),
(995, 'SHWETA ENTERPRISES', '65336631 , 09136823500', '', '', '', 'C129, CHHATTERPUR ENCLAVE  NEW DELHI', ''),
(996, 'SIKA INDIA PVT LTD', '9166011117, 01141030264,5,6', '', '', '', '505 & 506 , 5TH FLOOR ELEGANCE TOWER JASOLA  new delhi', ''),
(997, 'SILICON CONCEPTS INTL.(P) LTD.', '40525858, 9650111723', '', 'devender@siliconeconcepts.com', '', 'A-77, DDA SHEDS , OKHLA INDUSTRIALL AREA PHASE 11 NEW DELHI', ''),
(998, 'SINGHAL IRON FOUNDARY PVT. LTD.', '919897947777,', '', '', '', 'E-211, KAMALA NAGAR, Agra - 281004 Uttar Pradesh, India', ''),
(999, 'SK BMS WASH SAND', '9416228605 , 9991666162', '', '', '', 'C/O PREM CHAUDHARY DHARAM KANTA, DELHI- ROHTAK ROAD , NEAR DEVI LAL PARK , BAHADURGARH HR', ''),
(1000, 'SKYLIGHT SOLUTIONS', '9811574300 , 9212712326', '', 'sarna_amit77@rediffmail.com', '', '383 B CHIRAG DELHI NEW DELHI', ''),
(1001, 'SOMANI BROTHER', '9810041735, 0129-2421746, 4022914', '', '', '', 'SHOP NO. 1G/67, OPP. SYNDICATE BANK, N.I.T FARIDABAD  121001', ''),
(1002, 'Somany Ceramics Ltd.', '9871400166 , 9312121951, 8742928298', '', 'sandeepsharma@somanyceramics.com,', '', 'kassar , bahadurgarh - haryana  1245007', ''),
(1003, 'SPECIALITY EXIM PVT.LTD.', '9811085484 , 07838771193 , 08285031196 , 4028512', '', 'specialityexim.in@gmail.com', '', 'PLOT NO. 4B, GALI NO.5, KRISHNA NAGAR, OPP SEC-25 FARIABAD', ''),
(1004, 'spectrum concrete', '09310104659, 9810104659', '', 'spectrumconcrete@gmail.com', '07AAICS6319K1ZZ', 'g 27 /5 sec 3 rohini delhi', ''),
(1005, 'SR SETH & SONS', '9810004200', '', 'srsonline@gmail.com', '', '170 ,  KAMLA MARKET , ASAF ALI ROAD  NEW DELHI', ''),
(1006, 'SRG International Pvt Ltd.', '9650575495', '', 'info@srginternational.in', '', 'Plot No.13/A,  Sector–4  Industrial Area Faridabad', ''),
(1007, 'SRI TRIVENI ENGINEERING CO.', '9818499924', '', '', '', 'DAULTABAD INDUSTRIAL AREA  GURGAON', ''),
(1008, 'SRISHTI ADVANCED TECHNOLOGY', '9211767611', '', '', '', '237, GARHI MOHALLA , FARIDABAD OLD', ''),
(1009, 'SS READY MIX CONCRETE', '8199000233', '', '', '', 'VILLAGE - BAGHANKI, NEAR - PACHGAON  MANESAR GURGAON', ''),
(1010, 'SSV ENTERPRIZES', '9354603029', '', '', '', 'OPP. SEC 9 POLISE STATION NABGARD ROAD bhadurgard', ''),
(1011, 'STA Concrete Flooring Solutions', '91-20-25209053, 9422033554, 9822028193', '', 'teksun@staflooring.com,,www.staflooring.com', '', '233, Kakade Plaza,Karvenagar, Pune  Maharastra 411 052.', ''),
(1012, 'Standard Electric', '+91-129-2419432, ,4006818', '', 'standardelectric@airtelmail.in', '', '1H/16 Arya Samaj Road,N.I.T  Faridabad 121001', ''),
(1013, 'Star Engineering Chemicals Applicators (p) Ltd.', '9818300528, 9971419595', '', 'abhishek.tyagi@starcoating.in', '', 'A-92-C , 2nd floor , namerdar estate taimoor nagar new delhi', ''),
(1014, 'Star Wire (India) Ltd', '4094247 , 4094200 , 09313431171 , 9910152812', '', '', '', 'Mathura Road, Faridabad', ''),
(1015, 'Steel Authority Of India', '9478402192', '', 'bilal.bhat201@gmail.com', '', 'Ludhiana', ''),
(1016, 'Stone Age Pvt Ltd', '+91 141 3242001, +91 998 3800004', '', 'pawan@stoneage.co.in,', '', 'Village Saipura, Diggi Malpura Road, Sanganer  Jaipur', ''),
(1017, 'Stone Oasis', '9828585558', '', 'amit@stoneoasis.in', '08ACPFS7659Q1ZR', 'G-489, road no.9 A, vishwakarma industrial area jaipur', ''),
(1018, 'STP Limited', '8130298881/ 9818198109, 8130298865', '', '', '', '707, 7th Floor, Chiranjiv Tower 43,Nehru Place New Delhi', ''),
(1019, 'STP LTD. NEHRU PLACE', '+911146561359 , 9891193951', '', '', '', '14-15 NEHRU PLACE , FARM BHAWAN , 3RD FLORRE , NEW DELHI', ''),
(1020, 'SUBHASH SINGH CONTRACTOR & EARTH MOVER', '9719399366, 05735-224544, 9917927516', '', '', '', 'TIL KI MANDAIYYA , JOKHABAD  SIKANDRABAD BULANDSHAHR', ''),
(1021, 'SUBI KHAN BMS (Asham khan)', '9610565904', '', '', '', 'VILLAGE TAPUKARA,TIJARA,ALWAR rajesthan bolder', ''),
(1022, 'Sukri Paints & Chemicals Pvt Ltd', '09811030329 , 09891059311 , 09210044781', '', 'gfpc@mail.com', '', '380, Grd Flr, Chirag Delhi,  Delhi - 110017, Nr Water Tank', ''),
(1023, 'SUNHEART  TILES', '+91-11-46158880,   9810048381', '', 'delhi@sunheart.in', '', 'F-3 SHOPPING CENTER-1, MANSAROVAR, GARDEN, NEW DELHI 110015', ''),
(1024, 'Sunil art', '9811369728', '', '', '', 'near shri ram services station , 17/4 mathura road  Faridabad', ''),
(1025, 'SUNIL KASANA', '9310630001 , 9313682062', '', '', '', 'DLF , DILSAAD EXT- .11 BHOPRA GAZIYABAD', ''),
(1026, 'SUNIL KUMAR', '9891915558, 9540048241', '', '', '', 'SEC-2-3, BY PASS ROAD ,NEAR CHUNGI BALLABGARH (FBD)', ''),
(1027, 'SUNIL KUMAR BMS', '9873854298', '', '', '', 'PALAM VIHAR EXTN. SECTOR ROAD. OPP. A.C.P. OFFICE GURGAON', ''),
(1028, 'SUNIL SHARMA', '9990931236', '', '', '', 'WATER SUPPLIER VILLAGE - DHANA , SEC - 8 , IMT MANESAR, GUR', ''),
(1029, 'SUNIL VIKAL (JAMUNA SAND)', '9873732007', '', '', '', 'FARIDABAD SIMS.AppMaster.Model.MVendor', ''),
(1030, 'super sainitary sales', '2251052 , 4088258', '', '', '', 'kholsa house near railway station  gurgaon', ''),
(1031, 'Super sanitary  sales', '9811221352  ,2414703,  4021133', '', 'supersanitary@gmail.com', '', '1F-37 , B.P ,N.I.T FARIDABAD  121001', ''),
(1032, 'SUPER TILES & MARBLE PVT.LTD.', '9311116571,  7042062961', '', '', '', 'PLOT NO. C-51/1 , SITE-C U.P.S.I.D.C , SURAJPUR  GREATER NOIDA', ''),
(1033, 'Super Veneers and wood products', '9818170250', '', 'alok@uniply.in', '', 'Kh no 53/1 bawana road pehladpur banger delhi', ''),
(1034, 'Superrior systems', '987182551, 9654808987,', '', 'superior_systems@rediffmail.com', '', '1St floor ,suneja bhawan , 16/6 mathura road , Faridabad', ''),
(1035, 'Supra Group', '91-11-2641-4209,3144 , 9350679923', '', 'info@supragroup.in', '', '32-33, Room No.403 Nehru Place, New Delhi', ''),
(1036, 'supreme electrical & switchgear', '9810267185 , 01244103854', '', '', '', '37,milestone hero honda chock nh8  gurgaon', ''),
(1037, 'SUPREME INDUSTRIES LTD.', '9871344288, 26217454,  9958997935,9971144215', '', 'yadu_jaluka@supreme.co.in', '', '518,OSIAN, BUILDING -1 2, NEHRU PLACE, NEW DELHI', ''),
(1038, 'Supreme Poly Products', '9910085114', '', '', '', 'Shop no.3,1st floor,Rampuri Central Market Ghaziabad-201101(up)', ''),
(1039, 'SUPREME STORE', '9810944095 , 129-2230042 , 9999791534', '', 'supremestorefbd@gmail.com', '', 'MCF-5416, Payal Complex, Opposite Lakhani India Limited Sector- 23', ''),
(1040, 'SURAJ EARTH MOVERS', '9999909215 , 9811328624', '', '', '', 'VILLAGE DADENA , SEC - 8 IMT MANESAR SIMS.AppMaster.Model.MVendor', ''),
(1041, 'SURENDER KUMAR', '9873718898, 8860267023 , 8130046154', '', '', '', '154-A, GUJJAR DAIRY, GAUTAM NAGAR, NEW DELHI  110049', ''),
(1042, 'surender pal (deepak)', '9928814549', '', '', '', 'sidcul bhadarabad  haridwar', ''),
(1043, 'SURENDER SINGH BMS (sakir)', '09416294563 , 09812760972', '', '', '', 'VILLAGE . RAJPURA , TEH. PALWAL (FARIDABAD) SIMS.AppMaster.Model.MVendor', ''),
(1044, 'Surender Yadav', '9416245197', '', '', '', 'Jamalpur Rood Puchgaon Bilaspur Gurgaon', ''),
(1045, 'Suresh  choudhary ( civil contractor)', '9810575861 , 9810808102', '', '', '', '', ''),
(1046, 'SURINDRA STEEL CORP.', '9811436977, 24372288, 24373294', '7920022858', '', '', 'T - 87, BHOGAL ROAD , BHOGAL NEW DELHI', ''),
(1047, 'SURYA POWER ENGINEERS', '9810074440, 9871852643', '', 'sskheraco@yahoo.com, sskheraco@gmail.com', '', 'NH-131-A, SUB DIVISION-A , NH-5 RAILWAY ROAD NIT FARIDABAD', ''),
(1048, 'SUSHIL GRAVELS , DIKSHA TRADERS, PRIYANSHU TRADING', '9910283447 , 9891017415', '', '', '', 'MAIN SECTOR ROAD, INDRA  COLONY ,NEAR ARTIMIS HOSPITAL, OPP.SEC 51, GUR    HR', ''),
(1049, 'SUVEDIN', '9873056983 , 9671576738', '', '', '', 'DUGNEJA , DISTT. FEROJPUR JIRKA MEWAT  HR', ''),
(1050, 'Suyash Tools Pvt. Ltd (DIAMOND)', '022-27893104 / 36 , 09867951970', '', 'suyash22003@yahoo.com , suyashtools@gmail.com', '27AABCS3035M1Z9', '126, Arenja Arcade, Sect-17 Vashi, Navi Mumbai', ''),
(1051, 'SV METALLOYS P LTD', '9811394004', '', '', '', 'PLOT NO 17 H NEAR EAST INDIA CHOCK', ''),
(1052, 'SVAN POWER PLANT PVT LTD', '0129-4028316 - 19  ,', '', '', '', 'A 3/2, NEHRU GROUND NEELAM BATA ROAD \nFARIDABAD', 'www.svampower.com'),
(1053, 'SWARUP ROLLING MILLS LIMITED', '01396- 235334, 235335', '', 'swaruprollinggmaills@hotmail.com', '', 'VILL. SALARPUR , TEH. JANSATH MUZAFFARNAGAR', ''),
(1054, 'Swasti structure and concretes', '7830121212', '', '', '', 'khasra no 710 ibrahimpur minor jawalapur  haridwar', ''),
(1055, 'SWASTIDAL TRADERS', '9467212211, 9416762121, 09466071064', '', '', '', 'Bamnikhera , hasanpur road , vill. deeghot , near saloti more Palwal', ''),
(1056, 'Systech Infracore Private Ltd.', '9891820083', '', 'rahul@systechinfracore.com', '', 'A-209 , somdutt chamber-1 ,Bhikaji Cama Place New delhi', ''),
(1057, 'T & T Instruments', '1123284342', '', '', '', '21/4722, dayanand road darya gaanj new delhi', ''),
(1058, 'T.S. CARRIER BMS', '8053010400 , 8053012020', '', '', '', 'BRICKS , BILASPUR', ''),
(1059, 'TAKSH INDIA SERVICES', '9999093120,', '', '', '', 'GREEN FILELD COLONY , SEC-42 FARIDABAD', ''),
(1060, 'Tata BlueScope Steel Ltd', '09810507291 , 08042963505', '', '', '', 'Plot No. 298-299, RIICO Industrial Area, Chopanki, Bhiwadi Rajasthan', ''),
(1061, 'TBK SHRI RAM TILE BATH KITCHEN PVT. LTD.', '9266200306, 9650293502', '', 'shriramtbk@gmail.com', '06AADCT1491Q1ZU', 'SIKANDERPUR , MG ROAD , NEXT TO HANUMAN MANDIR  GURGAON ( HARYANA)', ''),
(1062, 'Techno buildsys pvt.ltd', '9818309244, 9717623501, 9810100228', '', 'technobuildsys@gmail.com,  jainsudhir64@yahoo.in', '', '67/P, Mathura Road ,Badarpur ,  New Delhi  110044', ''),
(1063, 'TECHNO EASYCRETE PVT LTD.', '09958922882', '07838026669', '', '', 'A- 40/1 SITE - IV , SAHIBABAD', ''),
(1064, 'TECHNO EASYCRETE PVT. LTD.', '07838026669 , 09711514939', '', '', '', 'GL-50, GANPATI DHAM INDUSTRIAL AREA, BAHADURGARH', ''),
(1065, 'TEK CHAND WATER SUPPLIER', '09416635622  , 9416737461', '', '', '', 'PRITHLA', ''),
(1066, 'Thakural Electric  Works', '9582183547, 9811114193', '', 'thakuralelectric@gmail.com', '', '23, New Tikona Park	 N.I.T. Faridabad -121001', ''),
(1067, 'The Indian Merchants', '9811390091 , 011-23364564', '', 'funnel@sify.com ,  www.theindianmerchants.com', '', 'F-5, BHAGAT SINGH MARKET NEW DELHI  110001', ''),
(1068, 'The Structural Waterproofing company (p) ltd.', '9711006709 , 9903485404', '', 'ranjankrjha@yahoo.co.in', '', 'A21, Block B1, Mohan Cooprative Indust. Estate, Mathura Road New Delhi 110044', ''),
(1069, 'THE SUPREME INDUSTRIES LIMITED (PVC)', '9650600265', '9.11126E+11', 'delhi_pvc@supreme.co.in', '', '22, DEEPAK BUILDIND ,13 , NEHRU PLACE\namit_jha@supreme.co.in', ''),
(1070, 'THE WATER WORLD', '9711883256', '', '', '', '3A-63, N.I.T FARIDABAD', ''),
(1071, 'TIGER RUBBER COMPANY', '9873799073', '', '', '', '4003, AJMERI GATE  DELHI', ''),
(1072, 'TILES BAZAR ( GAURAV MARMO IMPEX PVT .LTD. )', '9818347125,  9810800989', '', 'ggoel73@gmail.com', '', 'DELHI', ''),
(1073, 'TILES INDIA', '9818622355', '', '', '', 'G 105 INDRA ENCLAVE SEC 21 -D  FARIDABAD', ''),
(1074, 'TINNY CRAFT', '9810146576 , 9910208881, 9818108005', '', 'tinnycraft@gmail.com', '', '2474, Nalwa Street, Pahar Ganj, N.D.- 55', ''),
(1075, 'Topcon Sokkia India Pvt. Ltd.', '9811335082', '', '', '', 'C - 25, Ground Floor, Sector - 8 Noida', ''),
(1076, 'Toshi Automatic Systems Pvt. Ltd.', '+91-120-2705117, 9212349989', '', 'office@toshiautomatic.com', '', 'D - 132, BSR  Industrial Area, Ghaziabad  201009', ''),
(1077, 'TRUE RMC ( INDIA )', '9599788485, 9728499206', '', 'truermcindia@gmail.com', '06AXMPK4945K1ZZ', 'KHERKI MAJRA ROAD, DHANKOT  GURGAON (HR)', ''),
(1078, 'Twiga House', '91 11) 2646 0860, 09811978317 , 09811121216', '', 'marketing@twigafiber.com', '', 'Twiga House, 3 Community Centre.East of Kailash New Delhi 110 065', ''),
(1079, 'Khodiyar Stationery Mart', '9879658717', '027620251587', 'khodiyarpp@gmail.com', '24ABHPP7163K1ZA', '3 Sarswati Society, opp B K Cinema, Khodiyar Building, opp Surya Complex, Mehsana. Gujrat', ''),
(1080, 'TYRE ZONE', '4033065-66', '', '', '', '5R/5 BUNGLOW PLOT , NEELAM BK ROAD  NIT  FARIDABAD', ''),
(1081, 'UDAYVIR WATER SUPPLIER', '9991303689', '', '', '', 'AURANGABAD , HODAL , FBD SIMS.AppMaster.Model.MVendor', ''),
(1082, 'ULTRATECH CEMENT LTD', '-', '', '', '', 'JAIPUR RAJASTHAN', ''),
(1083, 'ULTRATECH CEMENT LTD.(RMC) 158, NAURANGPUR GUR', '9718991120 , 9718991119', '', '', '06AAACL6442L1ZE', '38 MILESTON BEHRAMPUR GUR , 122001', 'rmc cement'),
(1084, 'UMA SHANKER MISHRA PAINT CONTRACTOR', '9810339402', '', '', '', 'SHOP NO . 2 NEAR WATER TANK , SIHI, SECTOR - 8, FARIDABAD', ''),
(1085, 'UMARSHED BMS', '98,131,591,179,255,005,184', '', '', '', 'VILL. MATHEPUR , TEH . HATHIN , DISTT. PALWAL', ''),
(1086, 'UNES KHAN', '9671415500', '', '', '', 'REHAAN CARRIER, TAURU', ''),
(1087, 'Unicon Building Systems Pvt Ltd', '9811389273 , 011 - 27947565', '', '', '', 'C-7/86, 1st Floor, Sector 8, Rohini, Delhi - 110085', ''),
(1088, 'Unidus Associates', '9810637376, 9810755377 , 09312715003', '', 'sid.india@gmail.com', '', '1/ 101-B, WHS, Timber Market Kirti Nagar, New Delhi', ''),
(1089, 'Unik pipe fittings', '9814162337 , 09216202094', '', '', '', 'Bulandpur Road, Bye Pass, Nirla,', ''),
(1090, 'Unimet Profiles Pvt. Ltd.', '913-6662-913 , 9810006855 , 01146029804', '', 'aks.unimet@ymail.com; ajay-mkt@unimet.in', '', '', ''),
(1091, 'UNIQUE ENTERPRISES', '9811040451 , 9711768317 , 4163084', '', 'ashokpackaging@outlook.com', '', 'PLOT NO. 251 , VILAGE BHAKRI FBD SIMS.AppMaster.Model.MVendor', ''),
(1092, 'UNISTONE', '9212202492 , 9818859398', '', 'atul@unistone.in', '', '17, ARIHANT NAGAR, PUNJABI BAGH WEST, NEW DELHI', ''),
(1093, 'United glass agencies', '9958488006 , 9811115658', '', 'theunitedglass@gmail.com, www.theunitedglass.com', '', '1c - dt17, n.i.t , near bata flyover  Faridabad', ''),
(1094, 'UNIVERSAL CONSTRUCTION MACHNERY  & EQUIPMENT LTD.', '0120-  4328321,   08800294095', '', 'v.kumar@universalconstore.com', '', 'A -24 , SEC. - 5  NOIDA', ''),
(1095, 'UNNAS BMS', '09813481357 , 09991561029 , 9991087377', '', '', '', 'VILL. MATHEPUR , DISTT. PALWAL SIMS.AppMaster.Model.MVendor', ''),
(1096, 'USMAN BOLDER', '9812186286', '', '', '', 'H.NO.137, W.NO.9, KHAN ROAD, NEAR I.T.I SOHNA GURGAON', ''),
(1097, 'V. P. SHARMA', '9811407607', '', '', '', '454 SEC 21 D  FARIDABAD SIMS.AppMaster.Model.MVendor', ''),
(1098, 'V.B. constructions', '9811278878', '', '', '', 'A-45 ,Sainik colony sec 49 faridabad', ''),
(1099, 'V.D METAL INDUSTRIES', '9015340655, 9312163995', '', '', '', 'SHOP NO. 2, 11/27, LAKSHMI RATTAN INDUSTRIES COMPALEX , OPP GOVT PRESS , NEAR HARDWARE CHOCK NIT  FARIDABAD', ''),
(1100, 'V.K.TRADERS', '9350751352 , 011-23232920,011-47292920', '', 'vktdr2007@yahoo.co.in', '', '180-182, IVTH FLOOR RAMACHANDRA HOUSE GALI BANDOOK WALI AJMERI GATE DELHI', ''),
(1101, 'V.S ENTERPRISES', '9560037795', '', '', '06AWIPJ4563FIZJ', '1K-21, N.I.T  FARIDABAD', ''),
(1102, 'VAID', '01275-251360, 9255491925 , 9416066360', '', 'ved.arora1@gmail.com', '', 'RASULPUR ROAD, (OPP. NISHANT PUBLIC SCHOOL )  PALWAL', ''),
(1103, 'VALIA INTERNATIONAL M/C CORP.', '25546044 , 25521275 , 9811115974', '', '', '', '408 VISHVDIP DIST. CENTER JANAK PURI NEW DELHI', ''),
(1104, 'VARMA ART PAINTER & DECORATORS', '9811561240', '', '', '', 'MCF- 89 , NAVLU COLONY  BALLABGARH  FARIDABAD', ''),
(1105, 'Varmora granito pvt.ltd', '8376904731, +9111-46588401,2,3', '', 'delhi@vermora.com, anupkt2007@reddifimal.com', '', '1521, Wazir nagar , timber market, defance colony kotla mubarkpur New Delhi', ''),
(1106, 'VASUDEV SHAKTI TRADERS', '9599987221 , 7011880311', '', '', '06AJWPS4367F1ZK', 'PLOT NO. 6/13, GALI NO. 11 , BEHIND RADHASWAMI SATSANG BHAWAN , PATAUDI ROAD  GURGAON', ''),
(1107, 'Vea Industries', '09811445620 , 9990993311', '', '', '', 'B-12/17, Site B, Surajpur Industrial Area,  G. B. Nagar Greater Noida', ''),
(1108, 'VICKY EARTH MOVERS', '99100032792', '', '', '', 'PLOT NO. 213 , SEC 10A  , GURGAON 122001 HR', ''),
(1109, 'Vijay Generator House', '09818195705 , 09212963977', '', '', '', '45 , nehru market badarpur new delhi', ''),
(1110, 'VIJAY KUMAR', '9999390515', '', '', '', 'W-144A,SUDAMA PURI ,MOTI NAGAR, NEW DELHI 110015', ''),
(1111, 'Vijay kumar aggarwal and co.', '09412549522 , 09897737472', '', '', '09AEYPK7932D1ZY', '401, aggarwal sadan , gt road sikandrabad , bulandshahar', ''),
(1112, 'VIJAY KUMAR SANJEEV KUMAR ELECTRICALS', '66301517, 23874158 , 23874161', '', 'vksk11976@vkske.com , www.vkske.com', '', '1822 A/5,BHAGIRATH PLACE, CHANDNI CHOWK,  DELHI 110006', ''),
(1113, 'VIJAY PAL omega', '9811156618 , 9312131414, 9466531137,  9467171895', '', '', '', 'MASU', ''),
(1114, 'VIKRAM', '9214597006', '', '', '', 'NEEMRANA', ''),
(1115, 'Vikram bms', '9813082016, 9671327100', '', '', '', 'village : Khtala ,Hodal  Palwal', ''),
(1116, 'VIKRAM JEET (YOGESH BANSAL)', '9891334211', '', '', '', 'JAMUNA', ''),
(1117, 'VINAYAK ASSOCIATES', '9811103429', '', 'vinayakassociates30@yahoo.co.in', '', 'H.NO 1532 , GROUND FLOOR , GALO NO. 54, BADERPUR NEW DELHI', ''),
(1118, 'VINAYK CEMENT', '4041031, (M) 9811360262, 9312218782', '', '', '', '2041, SECTOR-28, FARIDABAD', ''),
(1119, 'VINOD  WATER SUPPLIER', '9811330399  , 9999889898', '', '', '', 'NEAR .B.R. PROPERTIES , HERO HONDA CHOWK , N.H. -8 GURGAON HARYANA', ''),
(1120, 'VINOD KUMAR BUILDING MATERIAL SUPPLIER', '9034935793', '', '', '', 'RASULPUR ROAD LOHAGAD PALWAL', ''),
(1121, 'VINOD KUMAR GAHLAWAT', '9254005009, 9466446513', '', '', '', 'KHERI SADH ROHTAK', ''),
(1122, 'VINOD SHUTRING MATERIAL', '9899272775 , 9250378278', '', '', '', 'sec 58 balabgarh faridabad', ''),
(1123, 'VINOD SUPPLIER', '9812381681', '', '', '', 'YAMUNA GUPTA PRITHLA  , RSULPUR ROAD \nPALWAL', ''),
(1124, 'VINOD TUBWELL TRADERS', '9810947783', '9871098597', '', '', 'NEAR IMT MANESAR ,SEC - 8 ,NEAR ANAND DHARAM KANTA , BAS KUSHLA ,NEAR MARUTI GODWAN , GURGAON', ''),
(1125, 'VINTAGE SWITCHGEAR', '2243476 , 3296870,  9871177044', '', '', '', 'ATALI ROAD , KAURALI  ,  FARIDABAD 121004', ''),
(1126, 'VIPIN KUMAR', '8750904836, 9598872486', '', '', '', '', ''),
(1127, 'VIPIN LUBRICANTS', '9716633960', '', 'vipinlubricant@gmail.com', '', '1D/42A, N.I.T  FARIDABAD', ''),
(1128, 'VIRDI CONTROL & INSTRUMENTS', '9312650979', '32400979', '', '', 'RZ-171B,RAVI NAGAR EXT, NEAR PARK HOSPITAL , KHAYALA VILLAGE , NEW DELHI - 18.', ''),
(1129, 'VIRENDAR KUMAR SINGH', '9811589985, 9212373657', '', '', '', 'HOUSE NO. 583, SEC.30  FARIDABAD', ''),
(1130, 'VIRENDER', '9540008987 , 9899916687', '', '', '', 'JAMUNA   H  BLOCK , GALI NO. 5 BHART COLONY , KHERI ROAD NAHER PAR OLD FARIDABAD SPS - 7.5 , IP 11.5', ''),
(1131, 'virender earth movers', '9910032792 , 9999210417', '', '', '', 'plot no 213 sec 10a gur', ''),
(1132, 'Virendra Textiles', '09210620021 , 9015089981', '', 'vtextiles@gmail.com', '', 'b-51 , sec 10 noida', ''),
(1133, 'Vishal Earth Mover', '9810240288', '', '', '', 'Gurgaon', ''),
(1134, 'Vishal Enterprises', '8449278883', '', '', '', 'devpura, opp. PNB  haridwar', ''),
(1135, 'VISHAL ENTERPRISE', '9811950222 , 9811420842', '', '', '', 'PARVESH MARG , RAILWAY ROAD, FBD nails', '');
INSERT INTO `vendordetails` (`vid`, `vname`, `vmobile`, `valtmobile`, `vemail`, `vgst`, `vaddress`, `vdesc`) VALUES
(1136, 'VISHNU DOOR INDUSTRIES P LTD.', '9811724655, 9953410441, 011-64158092', '', 'vishnufiredoors78@gmail.com', '', 'B-7 , JAIN NAGAR EXTN , NEAR ROHINI SEC-22, KARALA NEW DELHI', ''),
(1137, 'Vishnu Tiles & Sanitary Pvt Ltd', '9818943311', '', 'vts.toto@yahoo.com', '', 'A-18/1-2, Radhey Puri Extn. JAGAT PURI DELHI-51', ''),
(1138, 'Vishwakarma builders', '9416657394, 9416837400', '', '', '', 'bhiwani road  Rohtak', ''),
(1139, 'VITAL SECURITY SYSTEM', '9313691043 , 9911512424', '', '', '', 'FARIDABAD', ''),
(1140, 'VK ENTERPRISES', '9899174756 , 4015524', '', '', '', '1-C/67, N.I.T ,FARIDABAD', 'Electricals'),
(1141, 'VRB TRADERS', '9999934452,', '', '', '', '', ''),
(1142, 'WADHWA STEEL HARDWARE TRADER NIT FBD', '9891419987', '', '', '', 'SHOP NO. 26 , TIKONA PARK, N.I.T.\nFARIDABAD', ''),
(1143, 'WAHID KHAN', '9812368786 , 9813497850', '', '', '', '', 'BOLDER'),
(1144, 'Wallia International Machines Corpn', '25546044 , 25521275', '', '', '', '408, Vishwadeep District  centre, Janak Puri New DElhi 110058', ''),
(1145, 'WATER PROOFING MEMBRANE', '9212315946', '', '', '', '', ''),
(1146, 'YADAV BUILDING MATERIAL SUPPLIER', '9812077888, 9212054188,  01274-220817', '', '', '', 'BHARAWAS CHOWK , OPP. VETERINARY HOSPITAL REWARI', ''),
(1147, 'YASH PAL & SONS', '23546821 , 9810172722', '', '', '', '211, 334- 334 , AZAD MARKET ,  DELHI  110006', ''),
(1148, 'YASH TILES AND SANITARY HOUSE', '9811231788 , 4082773 , 09211792773', '', 'yashtile@yahoo.co.in', '', 'DSS - 36 , MARBLE MKT SEC 21-C FBD', ''),
(1149, 'YASHPAL CRANE', '9818214335, 9873831600', '', '', '', '37K.M, STONE , JAIPUR HIGHWAY ROAD , OPP. ROSELAND PUBLIC SCHOOL GURGAON', ''),
(1150, 'YK ENTERPRISES', '9013082525 , 9891975225', '', '', '', '16/241 STREET NO. 8 JOSHI ROAD , KAROL BAGH new delhi', ''),
(1151, 'YOGESH SHARMA', '9871383670', '', '', '', '', 'Jamuna Sand'),
(1152, 'YOGESH TRADER BMS', '9891334211 , 9899305611', '', '', '', 'PLOT NO 127 NEHER PAR INDER COMPLEX TIGOAN ROAD j/sand', ''),
(1153, 'Zee huzoor marketing ( choksey )', '9829056815, 9785465187 , 09871466878', '', '', '', '622, bodi ka rasta ,opp.hunuman mandir, kishan pol bazar  Jaipur', ''),
(1154, 'ZEN DIAMOND TOOLS', '9884271847', '', 'zendiatools@gmail.com', '', 'T 229, WOMAN INDL.PARK, SIDCO INDL.ESTATE, KATTUR, THIRUMULLAI VOYAL CHENNAI', ''),
(1155, 'ZOLOTO INDUSTRIES', '11 23234065, 23230799', '', '', '', '5 & 6, 1st Floor, Raghushree Bldg  Ajmeri Gate , delhi', ''),
(1156, 'Jayaswal Neco Industries Ltd.', '9350614245 , 01244115245', '', 'necoggn@gmail.com', '', 'basai road gurgaon', ''),
(1157, 'Sanjay Water Supplier', '-', '', '', '', '', ''),
(1158, 'ULTRATECH CEMENT LTD.', '1', '', '', '', 'ALWER RAJ.', 'CEMENT'),
(1159, 'GUPTA BROTHER', '9818887270', '9811063736', 'skg_gupta@yahoo.com', '', 'X-24/A, LOHA MANDI ,NARAINA \nNEW DELHI', ''),
(1160, 'KAKU ENTERPRISES', '9936400333 , 9829011337 , 9636580303', '', 'kamal.keshwani@fosroc.com', '', 'TONK ROAD.  JAIPUR', ''),
(1161, 'SHREE KRISHNA PRODUCTS', '8094317954, 9166669159', '', 'krishnaproductsjpr@gmail.com', '', 'PLOT NO. 39, AKEDA DOONGAR, ROAD NO. 18 , VISHWAKARMA INDUSTRIAL AREA , JAIPUR - 302013', ''),
(1162, 'MAHADEV SALES', '9772150925, 9462848311', '', 'mahadevsalesjpr@gmail.com', '9166369266', '23A, PANCHWATI COLONY , KAMLA NEHRU NAGAR AJMER ROAD, JAIPUR', 'PVC , UPVC'),
(1163, 'Shib Dass & Sons Pvt.Ltd.', '7290034705', '9811685944', '', '', 'Tatarpur Road, Deoli,\nTehsil+Distt.- Palwal(HR)', 'ms pipe'),
(1164, 'ULTRATECH CEMENT ltd. a', '9053028408', '', 'robin.sharma@adityabirla.com', '', 'SCO-4 , THIRD FLOOR SEC-14, GURGAON', 'cement'),
(1165, 'HINDUSTAN MARBLES', '9810001573, 930000090', '', 'mehendra.saxena09@yahoo.com', '', 'plot no. 79, sector 20, marble market dwarka', ''),
(1166, 'Om prakash Mahender kumar', '9811614134', '', '', '', '1/51,WHS Kirti Nagar,New Delhi', 'Ply & batten'),
(1167, 'Gulshan Kumar', '-', '', '', '', 'MAIN MATHURA ROAD , BADARPUR (OPP.BARAT GHAR ) NEW DELHI - 110044', ''),
(1168, 'Naveen Tractor', '-', '', '', '', 'Gurgaon', ''),
(1169, 'Mohna Bricks Industries', '9873443727', '', '', '', '1959, SEC-16 ,Faridabad', ''),
(1170, 'Local Market', '-', '', '', '', '-', ''),
(1171, 'Mittal Enterprises Bricks', '9312284785', '', '', '', 'Faridabad', ''),
(1172, 'DEHRADOON MARBLE HOUSE', '9971744115 , 9810562594', '', 'dipesh@kajariaeternity.com', '', 'WZ-1394/4 , NANGAL RAYA , PANKA ROAD , JANAKPURI , NEW DELHI', 'KAJARIA TILE'),
(1173, 'Ultracon International', '-', '', 'info@ultracon.in', '', 'c-1-403, sidcon hsidc,sec-1 Manesar\nGurgaon-122050', 'Slick pak'),
(1174, 'A.S.Creations', '-', '', 'ascreation1115@gmail.com', '', 'SHOP NO. 1 & 2 , L.G FLOOR , SITA RAM COMPLEX, OPP. METRO PILLER NO. 50, M.G ROAD , SIKANDERPUR MARKET ,GURGAON', 'CICO'),
(1175, 'A M Supplier (mitti)', '-', '', '', '08AGKPM2657H1Z4', '', 'Mitti'),
(1176, 'ACC LIMITED', '-', '', '', '', 'PLOT NO. 38/1 -A & 38/1B ,  SITE 4 , INDUSTRIAL AREA ,  SAHIBABAD', 'Pan-AAACT1507C\nCST-09241400041'),
(1177, 'Ajay Enterprise', '9213808822', '', '', '', '1B,24k,Near Radha Krishan Mandir , N.I.T\nFaridabad', 'Cutting Cloth'),
(1178, 'Yaduraj Filling Station', '-', '', '', '', 'Jaipur', 'Diesel,Petrol'),
(1179, 'VK Ahuja', '-', '', '', '', 'Faridabad', ''),
(1180, 'ALLIED SALES CORPORATION', '-', '', '', '08ABAPJ1347E124', 'MEER JI KA BAGH OPP. JALUPURA THANA , MLA QUARTERS M.I ROAD,JAIPUR', 'Testing Items'),
(1181, 'AMAN INTERNATIONAL', '-', '', 'amanscafforlding@gmail.com', '', 'KHASRA NO 29/5, GALINO 6 MASTER MOHALLA \nLIBASPUR DELHI', 'CST-07710293070\n\n(Steel)'),
(1182, 'NIDHI MARMO PVT.  LTD.', '9818527155', '9810439655', 'nidhimarmopvtltd@yahoo.in', '', 'A-2/15, W.H.S , MARBLE MARKET , KIRTI NAGAR , NEW DELHI', 'SADAR ALI, KOTA STONE'),
(1183, 'Goyal Diamond Tools', '9810074056', '', '', '', 'SHOP NO. 22, KHAJAN BUILDING , M.B ROAD, KHANPUR\nNEW DELHI', 'BLADE'),
(1184, 'Sunil Marble & Granites', '9414068935', '9829108068', '', '', 'NEAR TAGORE NAGAR, MAIN AJMER ROAD \nJaipur', ''),
(1185, 'ANAND ASSOCIATES', '-', '', 'cement1967@gmail.com', '', 'CC 121/123, SUBJI MANDI , LINK ROAD , JAWAHAR NAGAR\nJAIPUR', 'CEMENT\n\nTin-08081608720'),
(1186, 'APPLICATORS INDIA', '9828952602', '', 'applicatorindia@gmail.com', '', 'G-2 , PLOT NO. 38, MAHARANA PRATAP NAGAR , KHATIPURA ,JAIPUR', 'Dorma'),
(1187, 'Ashok-Kumar', '-', '', '', '', 'SECTOR-25, MAIN ROAD,OPP. SEC-55, FARIDABAD', 'rodi , dust'),
(1188, 'Ashoka Bolt House', '9911105671', '2417523', 'ashokabolt09@yahoo.com', '', 'Shop no.1/D-5, Bunglow Plot, Near Hardware Chowk, Opp Bank of India, Main Dividing Road,Faridabad', 'Bolt Hex-LPS'),
(1189, 'B.S CARRIER', '9811119973', '9899100899', '', '', 'H.O. OPP RADHA - KRISHNA HOSPITAL , MAIN GURGAON JHAJJAR ROAD,FARUKHNAGAR', 'BRICKS'),
(1190, 'ARUN AMBAWATTA', '9718486952', '', '', '', 'JONAPUR', 'JCB'),
(1191, 'BABA BISHAN DASS K.S.K FILLING STATION', '9812601170', '', '', '', 'IOC , DHARUHERA KHUSHKHERA ROAD ,NANDRAMPUR BASS ,REWARI', 'Diesel,Petrol'),
(1192, 'BALBIR SAINI', '9818237740', '8287482483', '', '', 'LINK ROAD , NEAR TYAGI PETROL PUMP , PRAHLAD GARHI , MAIN STAND , SAHIBABAD', 'JCB'),
(1193, 'Bharat Sales corporation', '-', '', '', '', '626/1, DEVI DAYAL MARKET RAILWAY ROAD,\nGURGAON-122001', 'Tin -06941924403\nMyk'),
(1194, 'BHARDWAJ STEEL', '-', '', 'bhardwajsteel.6152@gmail.com', '', 'Faridabad', 'Steel'),
(1195, 'DEVENDER SINGH', '9899224428', '9899224438', '', '', 'ADD. 91, MAIN ROAD JINAPUR \nNEW DELHI-110047', 'Water Tank'),
(1196, 'SURYA INFO SOLUTIONS', '9990730730', '8826886123', 'bishamber@shauryainfosolutions.in', '', 'A-610,(L.G.F)Sector -46, Noida\nBranch :Kalkaji,Wazirpur (Delhi)', 'TALLY'),
(1197, 'AK DILSHAN CONT.', '9929608586', '9649871613', '', '', 'VILL. NEEMLI, TIJARA ALWER\nRajasthan', 'MITTI'),
(1198, 'MAHLAWAT TRADERS', '8059186900', '9728829040', '', '', 'JAT BEHROR , SHAHJAHANPUR ALWAR \nRAJASTHAN', 'GSB BOLDER'),
(1199, 'Narender Kumar( A.N INFOTECH)', '9711501027', '9958777000', 'aninfotech@yahoo.in', '', 'E-34, NEHRU GROUND , N.I.T \nFARIDABAD', 'Computer , Laptop Repairing'),
(1200, 'NAMI CHAND', '9950444144', '9521931180', '', '', 'JAIPUR', 'Water tank'),
(1201, 'OFFICE', '0129-4064147', '', '', '06AACCD6742K1ZJ', 'Dee Kay BUILDCON Pvt. Ltd., 147, 1st Floor, OM Shubham Tower, Neelam-Bata Road, NIT,\nFaridabad(HR)-121001', ''),
(1202, 'CHOUDHARY BHATT CO.', '-', '', '', '', 'Saban ,BAWAL', 'Bricks'),
(1203, 'Aditya Polytubes Pvt Ltd', '9829015231', '', '', '08aaica1915d1z2', '1st floor new atish market mansrover jaipur', ''),
(1204, 'MMT DISTRIBUTERS PVT.LTD', '7503858519', '0120-2853169', 'kirloskar.mmt@gmail.com', '', 'A House Of  Kirloskar Products\nEstablished 1988\n3825/2, 1st Floor Shahganj\nShardhanand Marg, New Delhi -110006', 'AC & DC Motors | Alternators | Transformers | HVAC Pumpsets | DG Sets | Firefighting Pumpsets | Diesel engines| Hydropnuematic Pumps|'),
(1205, 'SAHEED MANOHARLAL FILLING STATION', '8901088503,', '8375820001', '', '', 'INDIAN OIL PETROL PUMP , SEC 49 , GURGAON', ''),
(1206, 'Nirma limited.', '-', '', 'harshgupta.iitm@gmail.com', '', 'Ahmedabad', 'CEMENT'),
(1207, 'SHAHID KHAN', '9837335727', '9927701129', '', '09FEUPS7874M2ZW', 'VILL. TIL BAGAMPUR, OPP. KAJARIA CERAMICS , INDUSTRIAL AREA SIKANDRABAD , DIST. BULANDSHAHR (UP)', 'BMS'),
(1208, 'AKG Shutterings Private Limited 1', '9971113120,  9810312954', '', '', '', 'Plot no.6, Survey No.142/2,          \nIrana Road, Budasan-Kadi.                     \nMehesana, Gujarat- 382715', 'SHUTTERING'),
(1209, 'SANJIVANI TRADERS', '9726669990', '', '', '', '134-A , PALIKA BAZA , RAJMAHEL ROAD NEAR , RAILWAY ROAD , GUJRAT', 'BMS'),
(1210, 'SINGHAL GAS AGENCY', '9891042864,', '9211222007', '', '06AWBPS9742G1Z8', '128/6, BRAHMAN WARA, BALLABGARH FARIDABAD, 121004', 'OXYGEN CYLINDER'),
(1211, 'SANDEEP PAL', '7053373160', '9953008424', '', '', 'B-219, RMS MALL NEAR APRILPARK , TRONICA CITY LONI ,  GHAZIABAD UP 201102', 'BAR CUTTING , BAR BINDING M/C REPAIR'),
(1212, 'jaquar neco industries ltd', '9350554125', '', 'necodelhi@gmail.com', '', 'c-58/2 okhla industrial area , phase 2', ''),
(1213, 'ALPESH BHAI BRICKS', '1', '', '', '', 'GUJARAT', 'BRICKS'),
(1214, 'ULTRATECH CEMENT LTD ,b', '1', '', '', '', 'MEHESANA GUJRAT', 'CEMENT'),
(1215, 'DESAI JAYRAMBHAI BHUDARBHAI', '9016730350', '', '', '', 'MAHESANA GUJRAT', 'BMS , JCB ,'),
(1216, 'SFC INFRATECH PRIVATE LIMITED.', '9910287950', '', 'sfcinfratech@gmail.com', '06AASCS5292D1Z0', '1613 , SEC 10A, GURUGRAM , HARYANA', 'JCB'),
(1217, 'L.K.S ENTERPRISES', '1', '', '', '', '5/6 , ASHOK NAGAR NEW DELHI 110018', 'WATER BOTTEL'),
(1218, 'SHREE SHYAM STEEL', '9810000017', '9212040360', 'omkarmrt009@gmail.com', '07ANTPA7861M1ZB', 'PLOT NO 13, OPP , MTNL TOWER , JONAPUR', 'CEMENT , STEEL'),
(1219, 'UNIQUE TRADING CO.', '8587861449', '9873724413', 'dalipchhabra02@gmail.com', '06ANCPK9737F1ZW', 'B-461, NEHRU GROUND N.I.T FARIDABAD', 'WASHING M/C'),
(1220, 'GAURAV STEEL CORPORATION', '9999743743', '011-45660743', 'gauravaroraa15@gmail.com', '07ADIPA3067A1Z6', 'Y-226, LOHA MANDI, NARAINA , NEW DELHI 110028', 'STEEL , MS PIPE'),
(1221, 'RAM AVTAR', '9416710501', '9050710501', '', '', 'BAHODA KALAN, GURGAON', 'TRACTOR'),
(1222, 'jain hardware electricals store', '09350396060', '', '', '', 'shop no 34, s.d. mandir market , subhash nagar new delhi', ''),
(1223, 'soni enterprises', '129', '', '', '', 'c-196/2 shop no 1 , phase 2 mayapuri main road  new delhi', ''),
(1224, 'JD STEEL CORPORATION', '9904150357', '', 'jdsc077@gmail.com', '', 'NEAR S.SHANKAR LAL , MALGODOWN , MEHSANA', 'STEEL'),
(1225, 'SHANKAR CRANE SERVICE', '9050761403', '9991260735', '', '06AFTPT8329P2Z7', 'PRITHLADUDHOLA ROAD , VILLAGE DUDHOLA , DIST. PALWAL', 'HYDRA'),
(1226, 'MAHESH RO WATER SUPPLIER', '9991502726,', '8684859768', '', '', 'VILLAGE SIKANDERPUR, NEAR RAM TALAB MANDIR, PALWAL', 'WATER BOTTEL'),
(1227, 'jay brahmani traders', '1', '', '', '', 'shankhalpur road, panamanagar bechara ji mehsana', ''),
(1228, 'shree bahuchar bricks', '9925071704', '', '', '24bkgpp5203b1zp', 'gb/6 shree shyam anclave palavasana becharaji road mehsana gujrat', ''),
(1229, 'ULTRATECH CEMENT LTD,D', '1', '', '', '', 'NEW DELHI', 'CEMENT'),
(1230, 'Shakti krupa sand supplier', '9879369843 , 9978756748', '', 'spaldi5436@gmail.com', '24akupb3429j1z1', 'gujrat', ''),
(1231, 'SHREE MAHAKALI TRADERS', '9824682470', '', '', '', '1 MANGALDARSAN APP SAHAJ HIGHT RADHANPUR ROAD MEHSANA', 'BMS'),
(1232, 'ATLAS EQUIPMENTS', '98795 54070', '+91 2762 224383', 'marketing@atlasequipments.com', '', 'Plot No. 317/1, G.I.D.C. II, Dediyasan,\nMehsana - 384002, Gujarat, India', 'mixture m/c'),
(1233, 'MOTI RAM & CO.', '9811017904', '', '', '', 'PLOT NO. 10, SEC-3 , IMT MANESAR', 'DIESEL'),
(1234, 'RAMA KRISHNA CERAMICS PVT.LTD', '9717795028, 9810042382', '9015542382', 'rkcpl@gmail.com', '07AAFCR2034P1Z5', 'wz-5/3a, ganesh nagar , najafgarh road , opp . metro pilar -541, new delhi -18,', 'kajaria tile'),
(1235, 'Surbhi Glass Pvt. Ltd.', '0124-4366770,4011980', '', 'info@surbhiituff.com', '06AAICS1103M1ZH', 'Plot No.-122, Sec-5, IMT Manesar, Gurugram-122051', 'glass'),
(1236, 'SHIV RAJ MALI', '9899510843', '', 'shivrajmali50@gmail.com', '06AWKPM1486AZO', 'old delhi road , house at anpurna vihar , near shani mandir, sarhaul more gurgaon', 'jcb'),
(1237, 'KRISHNA ENTERPRISES', '955563100', '', '', '06BMHPK2553G1Z6', 'PALI FARIDABAD', 'YAMUNA SAND'),
(1238, 'B B K Bhatta Co.', '9350829216', '', '', '', 'VILLAGE NARYALA TEH. BALLABGARH,\nFARIDABAD', 'BRICKS'),
(1239, 'DHARMSON', '7042071579', '', 'dharmsondiaries@gmail.com', '07AAFPD1488A1Z7', '2597, NAI SARAK', 'DIARY'),
(1240, 'SHUBHAM TRADERS', '9650108787', '', '', '06AIXPG9557H1ZJ', 'SHOP NO. 10, DIVISION NO. 7, BATA ROAD A COLONY , NEAR BATA PETROL PUMP N.I.T FARIDABAD', 'HAND GLOVES'),
(1241, 'BALJEET WATER SUPPLIER', '9990862372, 9278995945', '', '', '', 'VILL. KANHAI , SEC-45, NEAR COMMUNITY CENTER GURGAON', 'WATER TANKER'),
(1242, 'D.C METAL CORPORATION', '1', '', '', '071GRPA4752E1ZH', 'WH -41 . BASEMENT , MAYAPURI INDUSTRIAL AREA , PHASE -1 , NEW DELHI', 'ALUMINIUM ITEM'),
(1243, 'VISHKARMA ELECTRICAL WORKS', '0129-4096070', '0129-4109070', '', '06BBYPS4698N1Z7', 'SHOP NO. 228-229, SEC-21C , HUDA MARKET FARIDABAD', 'ELECTRICAL ITEMS'),
(1244, 'ARYA SALES & SERVICE', '8800778252', '7027393940', 'aryasalesservice@gmail.com', '06CCAPS8560H1ZC', 'MCF -19, 1ST FLOOR ,BALLABGARH, PIN NO. 121004, FARIDABAD', 'TRACTOR REPAIR'),
(1245, 'GANESH TRADING COMPANY', '9811525511', '9212387371', '', '06ADVPV5600K1ZY', 'VILLAGE WAZIRABAD, NEAR TEMPO STAND , GURGAON HARYANA', 'CEMENT'),
(1246, 'JK LAKSHMI CEMENT LTD', '09717322876,8826531010', '9599934357', 'misaac@jkmail.com', '', 'HARYANA', 'JK MORTAR\n vgoswami70@yahoo.com'),
(1247, 'SAI TRADERS', '9899154454', '', '', '07AFWPV6181Q1Z1', 'SHOP NO. 144, MAIN ROAD , JONAPUR NEW DELHI 110047', 'PLUMBING'),
(1248, 'ARUN AMBAWATA', '9718486952', '9871820052', '', '', 'JONAPUR', 'JCB'),
(1249, 'NEWAGE PUMP', '9811466872,', '9999138822', 'newagepump@gmail.com', '', 'room no. 11 , 3rd floor , empire business cemeter 59, rani jhansi  road ,jhandewalan new delhi 110055', 'fire item'),
(1250, 'STAR BRICK COMPANY', '9997436276', '', '', '09AALPZ6050C1ZF', 'GRAM ASARA , DISTT, BAGHPAT UP', 'BRICKS'),
(1251, 'S.C ENGINEERING', '9971350824,', '7503877401', '', '09BMGPB2294A1ZG', 'SHOP NO. 402, PATEL MARG , NEAR TATA DHARAM KANTA', 'GAMJEN RAPIER'),
(1252, 'SHRADDHA FUELS', '9818187777', '9871124444', '', '', 'OPP. 1 , PILLI KOTHI , DERA MORE , CHATTERPUR - BATTI MINES ROAD , NEW DELHI', 'DIESEL'),
(1253, 'Maruti Trading', '8128447773 , 8128447774', '', 'maruti0407@gmail.com', '24EPUPS3542J1Z8', 'Motipura Bol Gidc Sanand\nAhmedabad Gujarat-382110 (India)', ''),
(1254, 'NANAK RAM ELECTRIC WORK', '9899601484', '', '', '06DTPPK6509F1ZG', 'MAIN SOHNA ROAD , OPP. SBI BADSHAHPUR', 'MOTOR'),
(1255, 'MITHLESH BRICK KILN', '9873386215', '', '', '06AGSPA9403HIZE', 'VILLAGE JAWAN , TEH. BALLABGARH , DISTT, FARIDABAD HR.', 'BRICKS'),
(1256, 'SHREE RAM PETROLEUM', '7490033675', '', '', '', 'BECHRAJI , MEHSANA ROAD , BECHRAJI', 'PETROL. DIESEL'),
(1257, 'BALA KRUPA TRADERS', '9909233704', '', '', '', 'NEAR , RELIANCE PETROL PUMP , BECHRAJI ,N.G, DISTT. MEHSANA', 'CEMENT'),
(1258, 'NABROCO TOOLS & TECHNOLOGIES PVT.LTD.', '9415470109', '', 'info@nabroco.com', '09AACCN9281B1ZE', '20/144-A, INDIRA NAGAR , LACKNOW, 226016', 'CIRCUIT INTERRUPTER'),
(1259, 'JAI MAHAKALI EARTH MOVER', '9426311816', '', '', '', 'MEHSANA', 'JCB'),
(1260, 'BAJAJ GRANITE\'S', '9717795028', '', '', '', 'PLOT NO. 13, SEC -20, MARBLE MARKET , DWARKA DELHI', 'KAJARIA TILE'),
(1261, 'Yadav Traders', '9650494058, 9818147258', '', 'yadavtradersmanesar@gmail.com', '', 'Opp. Balaji Board, NH-8,Manesar, Distt. gurgoan, Haryana', 'UPVC , PVC'),
(1262, 'SANJEEV IRON STORE', '9818612093', '', 'sanjeevironstore@gmail.com', '06allpk3321q1zs', '2A/7, B.P , N.I.T FARIDABAD', 'IRON , STEEL'),
(1263, 'GURUSABH POWER', '9643101720, 25', '', '', '06AEPPG9423E1ZH', 'E-34, NEHRU GROUND  FARIDABAD , 121001', 'KIRLOSKAR MOTOR'),
(1264, 'GLOBAL INDUSTRIAL SUPPLIER', '09958311183', '09555511183', 'gis007@ymail.com', '', '3891, 1st Floor, G.B.Road , Delhi-110006', 'Fabrication l Shuttering l Scaffolding'),
(1265, 'V.KALRI ASSOCIATE', '8000779113', '9879586594', 'v.kalri.associate@gmail.com', '', 'F-29, SUNDRAM GATE, DAYANAND COMPLEX, BAHUCHARAJI, DIST. MEHSANA , PIN NO. 384210', 'RMC \ngautamkalriassociate@gmail.com'),
(1266, 'KHANDEWAL GROUP PVT.LTD', '9873911272', '', 'cpbangar@gmail.com', '', 'MG ROAD , NEAR SIKANDERPUR METRO STATION GURGAON . HARYANA', 'STEEL'),
(1267, 'SHREE OM TIMBERS', '9921091264', '9850979334', '', '', 'TALAGAON ROAD NEAR SHREYA LAWNS , CHAKAN TAL KHED', 'PLY , BATTEN'),
(1268, 'Associated Stone Crusher', '7597682098', '9461824881', '', '08AAXFA6500C1ZK', 'K.NO.-1106, Village-Chandoli, Teh.- Kotpulli, Distt.- Jipur (Raj.)', 'Dust, rodi, BMS'),
(1269, 'SHARMA SALES', '9871400396', '', '', '07BEGPS4722G1ZF', '14/2, ASOLA FATEHPUR BERI , NEW DELHI 110074,', 'BRICKS'),
(1270, 'SAINI ELECTRICALS', '9899932099', '01244065799', 'sainielectricals99@gmail.com', '06AXDPS7747J1ZW', 'BEHIND RAMLILA GROUND , SADAR BAZAR GURUGRAM , 122001', 'ELEC.'),
(1271, 'SHAKTI ENGINEERING WORKS', '9810261380', '', '', '06AEVPB2822E1ZR', 'H.NO. 1172, GALI NO. 9 INDRA NAGAR N.I.T FARIDABAD', 'PUMP FITTING'),
(1272, 'MARS GLASS SOLUTION PVT.LTD', '011-43411290, 01125104489', '', '', '07AAICM8145K1Z1', 'A-9 , RAJOURI GARDEN , OPP. PILLAR NO. 389, NEW DELHI -110027', 'GLASS'),
(1273, 'Jagriti Bricks Pvt. ltd.', '9312344378', '9811361207', '', '09AAECJ0774B1ZS', 'Near Hero Motors, Patwari ka bagh, NH-91,Gautam Budh Nagar,UP -2030207', 'Dry fly ash in Bags & Bulkers'),
(1274, 'BHOORA', '1', '', '', '', 'CARRIER GURGAON', 'TRACTOR'),
(1275, 'UMESH', '1', '', '', '', 'CARRIER SITE, GURGAON', 'TRACTOR'),
(1276, 'PAPPU', '1', '', '', '', 'CARRIER SITE, GURGAON', 'TRACTOR'),
(1277, 'Om Parkash', '9810467442', '9911567442', '', '', 'H. No. 632/18, Om Nagar, Gurgaon-122001 (HR)', 'Road Roller on hire'),
(1278, 'N.M. Trading', '9979732771', '', '', '24AACCD6742K1ZL', 'Sahjanand Comlex, opp Shreeji Hotel, NH-8A, GUJARAT', 'BMS'),
(1279, 'CHAUDHARY WATER SUPPLIER', '9811562639', '', '', '', 'VILLAGE . ANKHIR NEAR 21D, FARIDABAD 121001', 'WATER TANK'),
(1280, 'Ultratech Cement Limited', '1', '', '', '', 'Faridabad, Hariyana', ''),
(1281, 'Dharmbeer Bhadona', '9811704379', '', '', '', 'Delite', 'Aggregate'),
(1282, 'Dc Bhatta & Carrier', '1', '', '', '', 'Gurugram', ''),
(1283, 'ACC limited gur.', '9582217001', '', '', '', 'kherdi daula,sihi, sikanderpur road gugaon', ''),
(1284, 'MJM CONTROL & ENGINEERS PVT.LTD.', '9811160184', '', 'mjmcontrol@gmail.com', '06AALCM0911E1ZV', 'PLOT NO. 261, SEC-58, FARIADABAD', 'PANAL'),
(1285, 'MUKESH BRICK KILN', '9818283012', '', '', '06AKWPK1284A1Z6', 'VILLAGE JAWAN , TEH, BALLABGARH , DISTT, FARIDABAD', 'BRICKS'),
(1286, 'Royal Hardware & Tools', '9810824619', '9650904301', 'wasanrht@gmail.com', '06AAMPW0225F1ZS', 'Bara Bazar, Basai road, Gurgoan.', ''),
(1287, 'PRASAD ENTERPRISES', '9850799283', '', 'aabasaheb.nanekar@yahoo.co.in', '27ACPPN8170RIZH', 'GAT NO. 41, OPP. HOTEL SAVERA CHAKAN , TALEGAON ROAD , CHAKAN , TAL- KHED , DIST. PUNE', 'BMS'),
(1288, 'S.K ENTERPRISES', '9817831288', '', 'chawankapasia88@gmail.com', '06CDSPK7934E1Z6', 'IMT , MUJHERI , NEAR TATA IRON FACTORY, SEC-69, FARIDABAD 121004', 'BMS'),
(1289, 'Gehlawat Trading Company', '9813078310 , 9166661995', '8708124932', '', '06AZZPP2758G1ZN', 'Loharu Road, Charkhi Dadri (HR) - 127306', 'Quartz sand'),
(1290, 'Patidar Multi Service', '9825125491', '9825078458', 'mukesh_pms@yahoo.com', '', 'Plot no. 9. G.I.D.C-2, Nr. Gate no.-2, Dediyasan, Mehsana,', 'Hydra, Crane, generator sales and hiring'),
(1291, 'Dheeraj Carrier', '9958321713', '9810564123', '', '06BAUPS0191M1ZZ', 'Rao Pipe Ind.Villagae Dhanawas, Near Railway Crossing, P.O. Warizpur, Distt.Gurgoan (HR)', 'Soil Dumfer, Rodi, Badarpur'),
(1292, 'SHRI KRISHNA INDUSTRIES', '9910601962', '', '', '06BJIPK9997CIZP', '1C-73, NISSAN HUT , NIT FARIDABAD', 'MIXTURE M/C'),
(1293, 'GUPTA TYRE & RETREADING CO.', '9896217580, 9896780124', '', 'guptatyresolution@gmail.com', '06AAQFG5590H1ZZ', 'OPP. BHARAT GAS AGENCY OLD G.T ROAD , HODAL 121106', 'TYRE RUBBER'),
(1294, 'ASHA NAND ROSHAN LAL PVT.LTD.', '0124-4118913. 4913', '', 'ashanandroshanlal1968@gmai.com', '06AAACA7914N1ZI', '113/16 , OLD JALI ROAD , PREM NAGAR GURGAON, 122001', 'STEEL'),
(1295, 'Prakash Chand Building Material suppliers', '8696005555', '', '', '08APEPP3255K1ZL', 'JAGDISH RAWAT, Green Akars, B-74, Gram Ishwar Singhapura,Neemrana, (Alwar) Rajsthan-301705.', 'GSB'),
(1296, 'Semoj Steel Corporation', '9898230908', '9998363529', '', '', 'Balaji Complex , Viiramgam Highway, Besharaji', 'Iron & Steel'),
(1297, 'Tinku Tractor', '9050710501', '', '', '', '', 'tractor service'),
(1298, 'S.R. Thermopack', '9711684239', '8587050478', '', '06AVRPK8616L1ZW', 'H.no.-383, Ward No.-33, Koli Wara, Gopal Mandir Gali, Near SKG Hospital, Opp. City Park, Ballabgarh, Faidabad, Haryana - 121004', 'Tharmacol'),
(1299, 'Eco Fastners Private Limited', '8586980790', '', 'sales@ecofastners.in', '', 'Plot no.1 Faridabad gurgaon road near Krishna\npram dham mandir Faridabad (Haryana)', 'rebar chemical'),
(1300, 'S.S. Enterprises', '9910591698', '9811836194', 'ssent68@gmail.com', '07GAMPS5129CZH', 'M/S-11/3, Hari Nagar, New Delhi- 110064', 'wire rope, chain pully block, Electric hoists'),
(1301, 'Shakti Enterprises', '9582456691', '', '', '', 'DF- 848, Dabua Pali Road, Uttam nagar, N.I.T. Faridabad', 'Drinking water'),
(1302, 'Vinod Water Supplier', '9560713457', '9910758557', '', '', 'Bill Baroli, Faridabad', ''),
(1303, 'METAL CARE', '9871534789', '', 'metalcare2002@gmail.com', '06AOJPR5468E1Z0', 'VILLAGE . BHUPANI, KHERI BHUPANI ROAD , NEAR SATYUG DARSHAN SCHOOL , NEHAR PAR OLD FARIDABAD', 'HOT DIP GALVAINZING'),
(1304, 'MFS Fomwork Systems Pvt. Ltd.', '9810439840', '7700977009, 9311196072', 'info@mfsformwork.com', '', 'A 1/268, 1st Floor Neelam Bata Road, NIT Faridabad- 12001', 'Formwork system'),
(1305, 'Shri Bala ji Trading Company', '9811902367', '', '', '', 'House no.-05, Plot no.-16, Spring field colony, Faridabad-121002', 'Bricks'),
(1306, 'Mavatar Patroleum', '9825923421', '9825893535', '', '', 'Modhera-Bechraji Road, Near Canal, At Modhera, Ta Beshraji, dist. Mehsana.', 'Diesel'),
(1307, 'Industrial Metal Corporation', '9810287378', '9717047378', 'imc_fbd@yahoo.co.in', '06AABFI9979F1ZZ', 'Plot no.-47-B, Industrial Area, Near Oswal Dai Casting, N.I.T., Faridabad (Haryana) - 121001', ''),
(1308, 'Om Alumiminium & Decorators', '9810081708', '9213090210', 'omaluminium@yahoo.com', '06ADDPG0656J1ZR', 'SHOP NO. -6 , Bata Flyover, Bata Hardware Road, NIT Faridabad-121001', 'Aluminium Extruded PROFILE'),
(1309, 'MUKESH SINGH', '7838486155', '8750978718', '', '', 'VILLAGE BHUPANI , GREATER FARIDABAD', 'REBARING HILTI'),
(1310, 'Hindustan Pipe Sales Corporation', '9810079112 , 9810633922', '01145075768', 'hindustan.pipes@gmail.com', '', 'H.O. :- 319, Syndicate House, Inder Lok, Old Rohtak Road, Near Inderlok Metro Station, New Delhi-110035.', ''),
(1311, 'Jain Tile', '9811343514', '9811997321', '', '07ACHPB2923N1ZM', 'Near Qutub Minar Matro, Mehrauli Gurgaon Road, New Delhi-30', 'Pebbles stone, Slates Khaprel Kota Stone\n(Pradeep Jain- Lalit Jain)'),
(1312, 'Kakade Stone Crusher', '020-226922', '', 'sales@kakadestonecrusher.com', '', 'R.M.K. Square, Nutan Maharashra Polytechnic Road, Talegaon Station, Ta. Maval, Jila Pune-410507', 'aggregate'),
(1313, 'Sunder Service Station', '9891941005', '7011880311', 'sunderservicestation@gmail.com', '06ACFFS6410D1ZH', 'Bata Chowk, NIT Faridabad, Haryana-121--1', 'DIESEL'),
(1314, 'Chamunda Construction company', '9725555069', '9601916595', '', '', 'Ahamdabad', ''),
(1315, 'Sudhir Power Limited', '9971003685', '', '', '06AABCS6697K1ZR', 'Plot No. 92, Sector-8, IMT Manesar\nGurgaon, Haryana', 'dg set'),
(1316, 'Kargil Stone Crusher', '9439009197', '9078355993', 'cajaykumar1979@gmail.com', '', 'Plant 1- Tapanga, Khordha\nPlant 1- Kadalibadi, Daleiput, Khordha\nMr. Ajaya Ku. Chhotaray', 'Aggregate'),
(1317, 'Royal Hydrulics', '9938530817', '9853011817', '', '21DPAPS2111N1Z4', 'Plot No.- 40-41, Rasulgarh, Bhubaneswar751010', '3DX bACKUP lOADER'),
(1318, 'mukesh Kumar Mahto', '9891495164', '7982254147', 'mukeshkumarmahtorebarwork@gmail.com', '06AVAPM1876H1ZK', 'House No.- 133, Ved Ram Colony, Palla No. 1, Amar Nagar, Faridabad (HR)', 'Core cutting, Rebar Grouting'),
(1319, 'Super Steel & Sanitary Store', '0129-2243073', '4103073', '', '06ADFPD6122L1ZR', '2622, Sector 7A, YMCA Road, Faridabad', 'SANITARY- HARDWARE- Electrical- LW (Dr.Fixit)'),
(1320, 'Chauhan Building Material Supplier', '9711480380', '9711380480', 'nareshchauhan0448@gmail.com', '06AWJPC1778Q1ZZ', 'H.NO. 1,Vill. Harphali, PO. Dadpuri, Teh. & Distt. Palwal-121102 (Haryana)', 'mitti'),
(1321, 'Neelkanth Enterprises pvt.ltd.', '9891560245', '', 'somdaga70@gmail.com', '', 'Faridabad', 'green ply , shuttering ply'),
(1322, 'Bharat Pest Management', '9437136369', '9337066635', 'Bharatpestmanagenent@gmail.com', '21BIVPS9703E1ZY', 'PLOT NO.-579, At: Nuagaon, P.O. Itipur, Old Town, Bhubaneswar-751002', 'Anti-Termite treatment'),
(1323, 'Sai Furnishers', '9717383834', '01292413172', 'saisteelalmirah@yahoo.com', '06AANPA6546N1ZC', '1K/35A, Near Kalyan singh Chowk,NIT-1, Faridabad, Haryana-121001', 'Air Cooler'),
(1324, 'R.B. Enterprises', '1', '', 'vbt0078@gmail.com', '06CPYPB9919Q1ZQ', 'V.P.O.Pali, Near Bharat Petrol Pump, Pali , Faridabad.', ''),
(1325, 'Times Security Services', '9437942299', '0674-2360899', 'vbp@timessccurity.com', '', 'Plot No. N-5/496, IRC Village, Nayapalli, Bhubaneswar-751015', 'Security gaurd placement'),
(1326, 'S.T. Enterprises', '9579165555, 9850933930', '', 'tarangegopal5555@gmail.com', '', 'At/Post- Chikhali, Pune-411062', 'JCB , Pocklain, Tractors on hire'),
(1327, 'Gagan Enterprises', '9763617932, 8630758980', '', 'gaganenterprises25@gmail.com', '27AANFG7026R2ZL', 'Kulswamini Housing society, Flat no. b-404,Medankarwdi, Chakan Tal.Khed, Dis. Pune.410501', 'Fabrication'),
(1328, 'Varsha Electricals & Industrial Material', '9822613090, 9623613960', '', 'varshaelectricals1@gmail.com', '', 'Shopno. B-1, Shraddha Complex opp IDBI Bank,Talegoan chowk, Chakan, Tal. Khed, Pune-410501', 'Polycab cable'),
(1329, 'Suryoday Solar Energy Systems', '9822595974', '', 'solarsuryoday@gmail.com', '27ADEFS1535M1ZT', '11/18, Landewadi, Vikas Colony, Near Santoshi Mata Mandir, Bhosari, Pune-39', 'LED Lights'),
(1330, 'Electro Mech Engineers', '9999937666, 9811012992', '', 'electromechengineers@rocketmail.com', '07AQLPS1763K1ZA', '20 DSIICD Industrial Complex, Dakshinipuri New Delhi -110062', ''),
(1331, 'Shree Ji Traders', '9810145096', '', '', '06AEBPP9818C1ZJ', '13 BP, Neelam Bata, NIT Faridabad', ''),
(1332, 'RUDRA MARBLE HANDICRAFT & GRANITE', '9462227849', '9828015733', '', '08ADOPA8216C1ZU', 'NAI KI THADI, RAMGARH ROAD , JAIPUR 302002', 'KOTA'),
(1333, 'Reliable Waterproofing', '9868241557, 9540240975', '', '', '07AASFR8954N2Z0', 'Flat No. -479, Pocket -3, DDA Flat , Bindapur, New Delhi-110059', 'Tape crete'),
(1334, 'Punjab Bricks Traders', '9814897407, 9417511080', '', '', '', '', 'Bricks'),
(1335, 'Emaranmiya Sindhi', '9909233763', '', '', '', 'village: Poyda, Ta. Becharaji , Distt. Mehsana, Gujrat', 'Dust, Aggregate'),
(1336, 'Jay Maharashtra Hardware & Tools', '8624008640, 8446725252', '', 'jaymaharashtrahaardware01@gmail.com', '27AEEPC2750F1ZY', 'Shop no.11698, Alandi phata, MedankarWadi, Pune-nsk Highway, Chakan Tal-khed, Pune-410501', ''),
(1337, 'M/s kirti Land Davelopers', '9922323639, 9689887275', '', '', '', 'Pune-410501', 'JCB, Building Material'),
(1338, 'Ashtavinayak Surveyors', '9850110035', '', 'ashtavinayaksurveyors9@gmail.com', '', 'Flat no. E-104, Suryakiran Aptt., Plot No. 29/30, Pune- 412105', ''),
(1339, 'Jai Enterprises', '9881153988, 9881992000', '', 'vikas.nanekarent@gmail.com', '', 'Chakan MIDC, Opp. Sanny Company, Near kad Patrol Pump, Chakan Tal. Khed, Dist. Pune-410501', 'JCB , Poclane on Hire'),
(1340, 'Shahid & Brothers', '9210872008, 9210113411', '', '', '', 'Anaj Mandi, Main Mathura Road, Ballabgharh, FBD.', 'JCB on Hire'),
(1341, 'Krishna Electrical Service', '9999202189, 9891957111', '', '', '', 'MCF, 4182, Near Payal Cenema, Sanjay Colony, Sector-23, Faridabad-121005, Haryana', 'DG service'),
(1342, 'Siddhi Vinayak Enterprises', '9719332200', '', '', '05ATSPP4999E1ZX', 'Rawli Mehboob, Bahadrabad, Haridwar (UK) 249403', 'Tractor trolly, JCB, Water tank'),
(1343, 'A.K Construction', '9416382878, 8076187721', '', 'abhishekaharwal123@gmail.com', '06AUSPA6295M1ZY', 'Dhaulagarh Mod, Near B.P.S School, Palwal-121102 (Haryana)', 'Aggregate, stone dust'),
(1344, 'Parmar Hareshkumar Parsotambhai', '9909434139', '', '', '24BVTPP5792F1ZW', 'At & Post. Ranela, TA. Becharji, Dist. Mehsana', 'np2 pipe'),
(1345, 'Ultratech Cement Limited Punjab', '1', '', '', '', 'Punjab', 'cement'),
(1346, 'A M ASSOCIATES', '9899495782, 8800810688', '', 'ashishkumarrai@bullmachine.com', '', 'Unit - 357, 3rd Floor, Vardhman Fortune Mall,\nGT Karnal Road, GTK Industrial Area,\nDelhi - 110033.', 'Loader (tractor)'),
(1347, 'Gupta General Store', '9810734133, 9810774133', '0129-4052070', 'guptagenstore@yahoo.co.in', '06AENPM4279A1ZH', '5C/47 NIT Faridabad-121001', ''),
(1348, 'SHAILESH SINGH', '8800423178', '', 'srfms.pvt@gmail.com', '07bnjps2444f1zw', 'G/F , LI-164/6 , SANGAM VIHAR NEW DELHI -110080', 'ANTI TERMITE'),
(1349, 'KHEMCHAND', '7503757010', '9910500813', '', '', 'GURGAON', 'TRACTOR'),
(1350, 'DEV TRACTORS', '01275-252841, 324156', '', 'devtractors@ayahoo.co.in', '', 'delhi mathura bye pass, palwal-121102 haryana', 'tractor'),
(1351, 'A.K TECHNOLOGIES', '9355547773, 9812760019', '', '', '', 'ALAWALPUR CHOWK, BYE  PASS ROAD , PALWAL', 'LOADER ATTACHMENTS'),
(1352, 'HARJEET', '9718125454', '9718000062', 'meghaaqua@gmail.com', '', 'village begampur khatola , sec-74, gurgaon', 'water bottel'),
(1353, 'NUVOCO Vistas Corp Ltd. (Formerly Lafarge India Ltd )', '9872967841', '', 'rakesh.kumar01@nuvoco.in', '', 'PANCHKULA PLANT \nPLOT NO-101, IND AREA PH-1,PANCHKULA H.R -134113\nMOHALI\nPLOT NO-B-34,IND AREA PH-3, MOHALI', 'rmc'),
(1354, 'Satish Kumar Delite', '7011034909', '', '', '', 'C-430, S.G.M. Nagar, NIT, faridabad', 'Water Tank Supplier'),
(1355, 'Buildcon Infra-Chem Technology', '8130878475, 8368802691', '', 'buildconinfrachem@gmail.com', '', 'Sector-22, NIT fridabad, Haryana', 'Admixture, Auramix 400'),
(1356, 'Jagdeep Sales Corporation', '01294025028', '', '', '06ABZPS8490G1ZO', '185, Tikona Park, NIT Faridabad', 'open well pump, Crompton'),
(1357, 'Shahin Bano Sikander Khan', '9818655141', '', '', '', 'C-227, Shain Bagh, Abdul Fazal Enclave, Jamia Nagar, Okhla Village, New Delhi-110025.', 'fixing of ms fire door'),
(1358, 'Krishna Enterprises..', '9212627441, 9868067441', '', 'bholajha@yahoo.com', '06DEVPK2998F1ZS', '209/2, Shiv Colony, Nahar Pur Road, Gurgaon, Haryana-122001', 'Portable Toilet'),
(1359, 'Khemchand Gera & Grand Sons', '1', '', '', '', '2M-32, B.P. NIT Faridabad', ''),
(1360, 'Ganpati Carriers', '9810913749', '', '', '', 'NIT. Faridabad - 121001', 'Building Material Supplier'),
(1361, 'Durga Stone Co.', '01722730184', '', '', '06ABBPA0414E1ZQ', 'Stone Crusher Zone, Burj Kotian, Distt. Panchkula', 'Aggregate'),
(1362, 'V.A ENTERPRISES', '1', '', '', '06ALCPB2481J1ZJ', 'KEELA NO. 15, PALI BHAKRI ROAD , NEAR ULTIMATE KANTA , VILL. PALI , FARIDABAD', 'RODI , DUST,'),
(1363, 'rajender engineering works', '9717732093', '', '', '06cnnps8760h1za', 'sohna road ballabgarh 121004 faridabad', 'mixture m/c'),
(1364, 'BRIGHT STEEL', '2575031, 2575731', '', 'brightsteel_bbsr@rediffmail.com', '21AACCB2305E2ZM', 'P.N.3, INDUSTRIAL ESTATE ,SEC-A PHASE -D , MANCHESWAR , BHUBANESWAR -10', 'STEEL'),
(1365, 'THE PAPER HOUSE', '9853106861', '', 'tps.bbsr@gmai.com', '21CHQPS9559F1ZP', 'a.92, sahid nagar bhubaneswar', 'stationery'),
(1366, 'D.S TRADING CO.', '9815375094', '', '', '03ATGPS6224B1Z2', 'SHOP NO. 1, F.F SHIVA COMPLEX , KALGIDHAR ELCLAVE , BALTANA , ZIRAKPUR', 'DUST, RODI'),
(1367, 'SANSKRUTI EARTHMOVERS', '9579165555,', '9850933930', 'tarangegopal5555@gmail.com', '27AHLPT5076H1ZR', 'CHIKHALI PUNE 411062', 'JCB'),
(1368, 'Cico Technologies Ltd.', '9643330974', '', 'ramanand@cicogroup.com', '', 'Plot no. 18,19,20, sector -3 IIE Sidcul Haridwar.', ''),
(1369, 'KALINGA DISTRIBUTOR', '7205191746', '', 'sahoo.bharatbhusan@gmail.com', '21DIDPS7619B1ZH', 'PALASUNI, RASULGARH, BHUBANESWAR 751010', 'WATTER BOTTEL'),
(1370, 'Uma Marble', '1', '', '', '24AJDPP3060D1ZO', 'Opp. GEB, Viramgam Road, Bechraji - 384210', 'Granite'),
(1371, 'Dongyue brick engineering pvt.ltd', '9090065353', '', 'pradeep@indiablockmachine.com', '21AADCD9415G1ZZ', 'janla khurda', 'block'),
(1372, 'COSMOS CONSTRUCTION MACHINERIES & EQUIPMENT (P) LTD.', '1', '', 'ccmepl@gmail.com', '27AACCC4854HIZM', 'PLOT NO. E/307/5, GAT NO. 307 NANEKAR WADI, CHAKAN TALUKA - KHED , DIST. PUNE, MAHARASHTRA CODE 27', 'CONCRETE MIXTURE'),
(1373, 'Paramount industrial equipments', '9337115253', '', 'paramount.bbsr@gmail.com', '21aaqfp5890h1zv', '121 cuttack road opp. mango hotel\nbhuvneshwar,odisha', ''),
(1374, 'Gupta distributors', '1', '', '', '', 'cuttack road laxmi sagar bhuvneshwar odisha', ''),
(1375, 'Maruti agency', '1', '', '', '21atips1551m1zj', 'plot no 264/265 swarnamahal rasulgarh \nbhuvneshwar odisha', ''),
(1376, 'Maa timber', '9861548999', '', '', '21bhdps0665q1zz', 'sc/5,vss nagar\nbhuvneshwar odisha', ''),
(1377, 'Shree ram enterprises', '9438298186', '', 'sreeramenterprises_bbsr@rediffmail.com', '21aajfm6662k1z2', '22/a falcon house cuttack road\nbhuvneshwar odisha', ''),
(1378, 'Baladev traders', '9437389432 , 9437357210', '', '', '21b1ypp5283k1z1', 'cuttack roaf\nbhuvneshwar odisha', ''),
(1379, 'Industrial machinery & tool', '9437022652', '', 'khozemranapurwala@gmail.com', '21ahnpr7872f1zz', '121 cuttack road\nbhuvneshwar odisha', ''),
(1380, 'SHRI ANAND ELECTRICAL WORKS', '9891164504', '9212300842', '', '', '2A/63, NEAR HARDWARE CHOWK , N.I.T FARIDABAD', 'REPAIRING , REWINDING'),
(1381, 'Skipper Technologies India Pvt. Ltd.', '8800659876', '', 'topcon@skippertech.com', '09AARCS4065R1Z9', 'G-16,Sector -6, Noida-201301 U.P.', 'Mini Prism , total station'),
(1382, 'Sunder Basela Water Tank Supplier', '9953686700', '', '', '', 'H. No. 67/3, Sunder Colony, Kheri Gujran, Kheri, Fdb, Haryana', ''),
(1383, 'Rudratech RMC', '9311497400, 9654527868', '', 'info@rudratechrmc.com', '09AMXPG9485A1ZG', 'Plot No. 388, Site-C, Surjpur Industrial Area, Greater Noida-201306', 'RMC'),
(1384, 'Siba Sankara Behera', '1', '', '', '', 'Plot no. 16/ 2059, Jail Road , Bhubaneshwar', ''),
(1385, 'Ajaya Kumar Sahoo', '9178558832', '', '', '', 'Plot no-16, Jail Road, Jharapada, Bhubaneshwar', ''),
(1386, 'Gupta Generators', '9810671276, 9910736276', '', 'guptagenerators@gmail.com', '06AACC06742K1ZJ', 'Gupta Market, G.T. Road, Ballabgarh, Faridabad-121004', 'Tractor Parts'),
(1387, 'Odisha Trade and Co.', '9437162987', '', 'otc.odisha@gmail.com', '21CRKPS2626H1ZS', '27-a, ist Floor, Sidhartha Tower, Ravi Takies, Bhubaneshwr-751002', ''),
(1388, 'Lingraraj Stone Crusher', '7975111134', '', '', '21afzps1430c1zm', '7, Bhagbanpur Industrial Estate, Bhubaneshwar, Odisha-751019', 'solid bricks'),
(1389, 'Maa Sarla Traders', '9437009475', '', '', '21AFMPB5202L1ZV', 'Plot No.-799, Rasulgharh, Bhubaneshwar-751010', 'Batten'),
(1390, 'N.S. Decor', '9953410939', '', 'saifiimran632@gmail.com', '06AFQP14376E1ZA', 'a', '');

-- --------------------------------------------------------

--
-- Table structure for table `workitems`
--

CREATE TABLE `workitems` (
  `wiid` int(10) NOT NULL,
  `winame` varchar(100) NOT NULL,
  `widesc` varchar(100) NOT NULL,
  `wigst` varchar(100) NOT NULL,
  `wibase` varchar(100) NOT NULL,
  `wicategory` varchar(100) NOT NULL,
  `witype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workitems`
--

INSERT INTO `workitems` (`wiid`, `winame`, `widesc`, `wigst`, `wibase`, `wicategory`, `witype`) VALUES
(1, 'erewer', 'twewtwt', 'ett523532', 'ewrwetew', 'twetwtwt', 'etwetwetw');

-- --------------------------------------------------------

--
-- Table structure for table `wo_master`
--

CREATE TABLE `wo_master` (
  `woid` int(10) NOT NULL,
  `sid` varchar(50) NOT NULL,
  `subid` varchar(50) NOT NULL,
  `wodate` datetime NOT NULL,
  `wiid` varchar(50) NOT NULL,
  `muid` varchar(50) NOT NULL,
  `woqty` varchar(50) NOT NULL,
  `wounitprice` varchar(255) NOT NULL,
  `dtid` varchar(50) NOT NULL,
  `wodiscount` varchar(255) NOT NULL,
  `wocgst` varchar(255) NOT NULL,
  `wosgst` varchar(255) NOT NULL,
  `woigst` varchar(255) NOT NULL,
  `wototal` varchar(255) NOT NULL,
  `woremark` varchar(2550) NOT NULL,
  `wocgsttotal` varchar(50) NOT NULL,
  `wosgsttotal` varchar(50) NOT NULL,
  `woigsttotal` varchar(50) NOT NULL,
  `wototalamount` varchar(255) NOT NULL,
  `wofreight` varchar(255) NOT NULL,
  `wogstfreight` varchar(255) NOT NULL,
  `wogrossamount` varchar(255) NOT NULL,
  `oid` varchar(50) NOT NULL,
  `wocontactname` varchar(255) NOT NULL,
  `wocontactno` varchar(50) NOT NULL,
  `wotandc` varchar(50) NOT NULL,
  `wocreatedon` datetime NOT NULL,
  `wocreatedby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wo_master`
--

INSERT INTO `wo_master` (`woid`, `sid`, `subid`, `wodate`, `wiid`, `muid`, `woqty`, `wounitprice`, `dtid`, `wodiscount`, `wocgst`, `wosgst`, `woigst`, `wototal`, `woremark`, `wocgsttotal`, `wosgsttotal`, `woigsttotal`, `wototalamount`, `wofreight`, `wogstfreight`, `wogrossamount`, `oid`, `wocontactname`, `wocontactno`, `wotandc`, `wocreatedon`, `wocreatedby`) VALUES
(2, '1', '2', '1970-01-01 00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1970-01-01 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dyform`
--
ALTER TABLE `dyform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `fruits`
--
ALTER TABLE `fruits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grn_master`
--
ALTER TABLE `grn_master`
  ADD PRIMARY KEY (`grnid`);

--
-- Indexes for table `import`
--
ALTER TABLE `import`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `material_rqst`
--
ALTER TABLE `material_rqst`
  ADD PRIMARY KEY (`mrid`);

--
-- Indexes for table `munits`
--
ALTER TABLE `munits`
  ADD PRIMARY KEY (`muid`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`performance_id`);

--
-- Indexes for table `po_master`
--
ALTER TABLE `po_master`
  ADD PRIMARY KEY (`poid`);

--
-- Indexes for table `sitedetails`
--
ALTER TABLE `sitedetails`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Student_id`);

--
-- Indexes for table `subcontdetails`
--
ALTER TABLE `subcontdetails`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendordetails`
--
ALTER TABLE `vendordetails`
  ADD PRIMARY KEY (`vid`);

--
-- Indexes for table `workitems`
--
ALTER TABLE `workitems`
  ADD PRIMARY KEY (`wiid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `dyform`
--
ALTER TABLE `dyform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee_info`
--
ALTER TABLE `employee_info`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fruits`
--
ALTER TABLE `fruits`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `import`
--
ALTER TABLE `import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `material_rqst`
--
ALTER TABLE `material_rqst`
  MODIFY `mrid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `munits`
--
ALTER TABLE `munits`
  MODIFY `muid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `performance`
  MODIFY `performance_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `po_master`
--
ALTER TABLE `po_master`
  MODIFY `poid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sitedetails`
--
ALTER TABLE `sitedetails`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `Student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subcontdetails`
--
ALTER TABLE `subcontdetails`
  MODIFY `subid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vendordetails`
--
ALTER TABLE `vendordetails`
  MODIFY `vid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1391;
--
-- AUTO_INCREMENT for table `workitems`
--
ALTER TABLE `workitems`
  MODIFY `wiid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
