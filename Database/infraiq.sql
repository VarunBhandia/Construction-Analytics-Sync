-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2018 at 01:01 PM
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
(1, 'Concreting'),
(2, 'tusharms'),
(3, '23456');

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
(1, '1', '3,1', '1,3', '444,111', '42342,132343434', '42342,34356657', '', '0000-00-00 00:00:00', '2018-06-04 00:00:00');

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

--
-- Dumping data for table `grn_master`
--

INSERT INTO `grn_master` (`grnid`, `sid`, `vid`, `grnchallan`, `grnreceivedate`, `grncreatedon`, `grncreatedby`, `mid`, `grnqty`, `grnunitprice`, `muid`, `grntruck`, `grnlinechallan`, `tid`, `grnremarks`, `grnrefid`) VALUES
(15, '1', '4', '435467', '2020-02-04', '2018-06-22 06:28:16.091911', NULL, '2', '442', '424', '2', '22345678', '424', '1', '424', NULL),
(21, '2', '4', '', '1970-01-01', '2018-06-22 06:11:33.488151', NULL, '', '', '', '', '', '', '', '', NULL),
(22, '1', '6', '', '1970-01-01', '2018-06-22 06:38:06.569115', NULL, '', '', '', '', '', '', '', '', NULL),
(23, '1', '5', '234', '2018-06-22', NULL, NULL, '1', '334', '45678', '2', '535', '42424', '1', '333333', NULL),
(25, '1', '6', '234567', '1970-01-01', '2018-06-22 06:19:43.935513', NULL, '3', '21210000', '2210000', '2', '1212000', '4242400000', '1', '21212100000', NULL),
(27, '2', '5', '2345678909', '2018-06-21', NULL, NULL, '3,1', '123,456', '12,34', '2,1', '232424,999999', '24242424,0000011', '1,1', '2345678,09876543', NULL),
(29, NULL, NULL, NULL, '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 'old material ', '', '', '', '', '', '', ''),
(2, 'tushar', '', '', '', '', '', '', ''),
(3, 'single material', '', '', '', '', '', '', ''),
(4, 'row material', '', '', '', '', '', '', '');

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
(1, 'kg'),
(2, 'm');

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
(3, '32323', '313123', '3213213', '0000-00-00 00:00:00', '');

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
  `discount_type` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `cgst` varchar(255) NOT NULL,
  `sgst` varchar(255) NOT NULL,
  `igst` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_master`
--

INSERT INTO `po_master` (`poid`, `sid`, `csgt_total`, `ssgt_total`, `isgt_total`, `total_amount`, `frieght_amount`, `gst_frieght_amount`, `gross_amount`, `invoice_to`, `contact_name`, `contact_no`, `tandc`, `pocreatedon`, `m_unit`, `qty`, `app_qty`, `unit`, `discount_type`, `discount`, `cgst`, `sgst`, `igst`, `total`, `vendor`, `remark`) VALUES
(1, '1', '', '', '', '', '', '', '', '', '', '', '', '1970-01-01', '2', '65', '65', '5', 'amount', '', '', '', '', '', '', '');

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
(1, 'iup', '2018-06-18', 'aSF', 'asF', 'asF', 'ankit.cogni18@gmail.com', 'asF'),
(2, 'si2', '2018-06-20', 'aSF', 'asF', 'asF', 'ankit.cogni18@gmail.com', 'asF');

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
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `uid` int(10) NOT NULL,
  `uname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`uid`, `uname`) VALUES
(1, 'Kilogram');

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
  `site` varchar(255) NOT NULL,
  `ucreatedon` date NOT NULL,
  `ucreatedby` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `uemail`, `uaddress`, `umobile`, `user_role`, `site_role`, `material`, `vendor`, `mr`, `po`, `rtv`, `cp`, `uogrn`, `vendorbills`, `vendorbillpayment`, `moveorder`, `officegstdetails`, `subcontractor`, `transporter`, `workorder`, `reporting`, `workordermaterials`, `consumption`, `site`, `ucreatedon`, `ucreatedby`) VALUES
(2, 'varun', 'varun', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', ''),
(3, 'tushar', 'tushar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', ''),
(11, 'varunbhandia', 'varun', 'dfhdfh@zfgdf.sdg', 'fsdgdfh', 'dfhdfh', '0', '1', '2', '0', '1', '2', '0', '1', '2', '0', '1', '2', '0', '1', '2', '0', '1', '2', '0', '2', '0000-00-00', ''),
(12, 'mitesh1', 'varun', 'adfadf@dfh.dsg', 'asfasf', '9000', '2', '0', '1', '2', '0', '1', '2', '0', '1', '2', '0', '1', '2', '0', '1', '2', '0', '1', '2', '1,2', '0000-00-00', '');

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
(4, 'werwqw', 'qeqewe', '12313123', 'uri2uo@gmail.com', '313123123', '122ttus', 'services'),
(5, 'fsdf', '4324234', '234234234234', 'uri2uo@gmail.com', '2121eiwoije', 'sdjg', 'qqeweqwe');

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
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`uid`);

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
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `muid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `poid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sitedetails`
--
ALTER TABLE `sitedetails`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `vid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `workitems`
--
ALTER TABLE `workitems`
  MODIFY `wiid` int(10) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
