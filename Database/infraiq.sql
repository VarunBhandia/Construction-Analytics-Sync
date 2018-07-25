-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2018 at 01:07 PM
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
(5, 'Brick'),
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
(17, 'Building Material'),
(18, 'Machinery & Tools');

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
  `consupdatedby` varchar(100) NOT NULL,
  `consupdatedon` datetime NOT NULL,
  `conscreatedon` datetime NOT NULL,
  `consissuedate` date NOT NULL,
  `uid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumption`
--

INSERT INTO `consumption` (`consid`, `sid`, `mid`, `muid`, `consqty`, `consunitprice`, `consremark`, `conscreatedby`, `consupdatedby`, `consupdatedon`, `conscreatedon`, `consissuedate`, `uid`) VALUES
(1, '5', '3421', '17', '43', '43', '44', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-07-05', ''),
(2, '17', '3386', '20', '23', '31', '3113', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-07-04', ''),
(3, '5', '3411', '7', '344', '24', '424', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-07-06', ''),
(4, '3', '3420', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-07-11', 'tushar'),
(5, '4', '3421', '5', '23', '323', '323', 'tushar', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-07-11', ''),
(6, '1', '3424', '1', '90', '90', '90', 'tushar', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-07-16', ''),
(7, '2', '3424', '2', '23', '23', '', 'tushar', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-07-19', ''),
(8, '157', '3423,3416', '2,14', '23,23', '23,23', '34,', 'tushar', 'tushar', '2018-07-19 12:00:09', '2018-07-19 11:58:33', '2018-07-17', '');

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
  `cpupdatedby` varchar(100) NOT NULL,
  `cpupdatedon` datetime(2) NOT NULL,
  `cpqty` varchar(50) NOT NULL,
  `uid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cp_master`
--

INSERT INTO `cp_master` (`cpid`, `cprefid`, `sid`, `vid`, `cppurchasedate`, `cpchallan`, `mid`, `muid`, `cpunitprice`, `cplinechallan`, `cpremark`, `cpcreatedon`, `cpcreatedby`, `cpupdatedby`, `cpupdatedon`, `cpqty`, `uid`) VALUES
(1, '', 4, 4, '2018-07-03', '', '', '', '', '', '', '0000-00-00 00:00:00.000000', '', '', '0000-00-00 00:00:00.00', '23', 'tushar'),
(2, '', 3, 4, '2018-07-03', '2323', '3412', '10', '44', '34', '434', '0000-00-00 00:00:00.000000', '', '', '0000-00-00 00:00:00.00', '424', ''),
(3, '', 68, 49, '2018-07-03', '33123', '3406', '15', '33', '23', '2332drwe', '0000-00-00 00:00:00.000000', 'tushar', '', '0000-00-00 00:00:00.00', '33323', ''),
(4, '', 4, 23, '2018-07-04', '412', '3387', '17', '32', '323', '323', '0000-00-00 00:00:00.000000', '', '', '0000-00-00 00:00:00.00', '23', ''),
(5, '', 40, 29, '2018-07-05', '424', '3406', '10', '424', '23', '424', '0000-00-00 00:00:00.000000', '', '', '0000-00-00 00:00:00.00', '42', ''),
(6, '', 6, 4, '2018-07-11', '32', '3411', '10', '23', '45', '12', '0000-00-00 00:00:00.000000', 'tushar', '', '0000-00-00 00:00:00.00', '34', ''),
(7, '', 1, 2, '2018-07-10', '23', '3423,3424', '1,2', '20,30', '45,46', ',', '2018-07-19 11:23:18.000000', 'tushar', 'tushar', '2018-07-19 11:24:07.00', '5,6', ''),
(8, '', 4, 1, '2018-07-22', '8', '3424', '4', '56', '34', '56', '2018-07-23 12:25:13.000000', 'tushar', '', '0000-00-00 00:00:00.00', '89', '');

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
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(2550) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL
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
  `grncreatedon` datetime NOT NULL,
  `grncreatedby` varchar(50) DEFAULT NULL,
  `grnupdatedby` varchar(100) NOT NULL,
  `grnupdatedon` datetime NOT NULL,
  `mid` varchar(50) DEFAULT NULL,
  `grnqty` varchar(50) DEFAULT NULL,
  `grnunitprice` varchar(50) DEFAULT NULL,
  `muid` varchar(10) DEFAULT NULL,
  `grntruck` varchar(50) DEFAULT NULL,
  `grnlinechallan` varchar(50) DEFAULT NULL,
  `tid` varchar(10) DEFAULT NULL,
  `grnremarks` varchar(2550) DEFAULT NULL,
  `grnrefid` varchar(10) DEFAULT NULL,
  `porefid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grn_master`
--

INSERT INTO `grn_master` (`grnid`, `sid`, `vid`, `grnchallan`, `grnreceivedate`, `grncreatedon`, `grncreatedby`, `grnupdatedby`, `grnupdatedon`, `mid`, `grnqty`, `grnunitprice`, `muid`, `grntruck`, `grnlinechallan`, `tid`, `grnremarks`, `grnrefid`, `porefid`) VALUES
(1, '5', '21', '43', '2018-07-05', '2018-07-11 13:43:15', NULL, '', '0000-00-00 00:00:00', '3403', '3236', '313', '7', '33', '333', '6', '', NULL, ''),
(2, '4', '30', '4442', '2018-07-05', '2018-07-11 14:42:54', 'tushar', '', '0000-00-00 00:00:00', '3393', '42', '42', '17', '24', '24', '7', '', NULL, ''),
(3, '2', '8', '', '2018-07-09', '0000-00-00 00:00:00', NULL, '', '0000-00-00 00:00:00', '3423', '21132', '3', '5', '33', '32', '7', '21', NULL, ''),
(4, '174', '27', '45', '2018-07-11', '0000-00-00 00:00:00', NULL, '', '0000-00-00 00:00:00', '3408', '1', '400', '1', '', '50', '7', 'hp', NULL, ''),
(5, '5', '2', '32', '2018-07-17', '0000-00-00 00:00:00', 'tushar', '', '0000-00-00 00:00:00', '3424', '20', '10', '1', '', '12', '8', '12', NULL, ''),
(7, '1', '2', '13', '2018-07-16', '0000-00-00 00:00:00', 'tushar', '', '0000-00-00 00:00:00', '3424,3423', '23,24', '23,24', '1,1', '23,24', '23,24', '9,9', '23,24', NULL, ''),
(8, '2', '2', '12', '2018-07-17', '2018-07-19 11:30:24', 'tushar', 'tushar', '2018-07-19 11:31:48', '3424,3424', '23,23', ',', '6,7', '23,11', '32,11', '8,8', ',11', NULL, '');

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
  `mtype` varchar(255) NOT NULL,
  `mcreatedby` varchar(100) NOT NULL,
  `mcreatedon` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`mid`, `mname`, `munit`, `mcategory`, `mdesc`, `hsn`, `mgst`, `mbase`, `mtype`, `mcreatedby`, `mcreatedon`) VALUES
(1, 'hand grinder', '2', '1', '23', '45', '43', '545', '46', 'tushar', '2018-07-24 09:52:13'),
(2, '4353', '2', '4', 'tushar', '5787', '50', '40', '756744', 'tushar', '2018-07-24 09:52:47');

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
  `uid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_rqst`
--

INSERT INTO `material_rqst` (`mrid`, `sid`, `mid`, `mrqty`, `mrunitprice`, `mrrefid`, `muid`, `mrremarks`, `mrrecievedate`, `mrcreatedon`, `mrcreatedby`, `mrupdatedby`, `mrupdatedon`, `uid`) VALUES
(2100, '174', '3428', '', '', '', '', '', '2018-07-18', '2018-07-21 15:42:20', 'tushar', '', '0000-00-00 00:00:00', ''),
(2101, '177', '3428', '', '', '', '', '', '2018-06-19', '2018-07-21 15:42:39', 'tushar', '', '0000-00-00 00:00:00', '');

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
  `moupdatedby` varchar(100) NOT NULL,
  `moupdatedon` datetime NOT NULL,
  `uid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mo_master`
--

INSERT INTO `mo_master` (`moid`, `morefid`, `tsid`, `rsid`, `mid`, `modate`, `mochallan`, `moqty`, `movehicle`, `tid`, `moremark`, `mocreatedon`, `mocreatedby`, `moupdatedby`, `moupdatedon`, `uid`) VALUES
(6, '', '', '', '3423,3413', '2018-07-19', '', '23,23', '', '8,', ',', '2018-07-19 11:36:22', 'tushar', 'tushar', '2018-07-19 11:38:15', ''),
(7, '', '5', '1', '2', '2018-07-20', '', '2', '', '7', 'today sent with all', '2018-07-25 10:53:00', 'varunbhandia', 'varunbhandia', '2018-07-25 10:54:43', ''),
(8, '', '2', '5', '2', '2018-07-17', '34', '23', '34', '7', '', '2018-07-25 13:16:46', 'varunbhandia', '', '0000-00-00 00:00:00', '');

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
(11, 'Dee Kay Buildcon Private Limited', 'Block- C, 217, Venus Royal Hyde Appartment, Rasulgarh, Bhubaneshwar, Khordha, Odisha, 751010', '21AACCD6742K1ZR', '0000-00-00 00:00:00', ''),
(10, 'Dee Kay Buildcon Private Limited', 'Ground Floor, Gat No. 316, Nanekar Wadi, Chakan, Pune, Maharashtra, 410501', '27AACCD6742K1ZF', '0000-00-00 00:00:00', ''),
(9, 'Dee Kay Buildcon Pvt ltd', 'siddheswari hospitality\nbechar becharaji mehsana\ngujrat : 384210', '24AACCD6742K1ZL', '0000-00-00 00:00:00', ''),
(8, 'M.L ENTERPRISES', '301, SEC-17 , FARIDABAD', '06ABEPL5804A1Z8', '0000-00-00 00:00:00', ''),
(7, 'Dee Kay Buildcon Pvt ltd', 'Shop No-2,274, Mosjid Moth\nSOUTH EXTENSION,PART-II\nNEW DELHI-110049', '07AACCD6742K1ZH', '0000-00-00 00:00:00', ''),
(6, 'Dee Kay Buildcon Pvt ltd', 'NH-08, Delhi-Jaipur Highway\nBEHROR, ALWAR\nRAJASTHAN-301701', '08AACCD6742K1ZF', '0000-00-00 00:00:00', ''),
(5, 'Dee Kay Buildcon Pvt ltd', 'Bhatia Bhawan Krishna Gali\nKHARKARI,HARIDWAR', '05AACCD6742K1ZL', '0000-00-00 00:00:00', ''),
(4, 'Dee Kay Buildcon Pvt ltd', 'UG-1,Vaishali\nGHAZIABAD', '09AACCD6742K1ZD', '0000-00-00 00:00:00', ''),
(3, 'Dee Kay Buildcon Pvt ltd', 'Thapar University\nPATIALA', '03AACCD6742K1ZP', '0000-00-00 00:00:00', ''),
(2, 'Dee Kay Buildcon Pvt ltd', '147,1st Floor,Om Shubham Tower\nN.I.T, FARIDABAD', '06AACCD6742K1ZJ', '0000-00-00 00:00:00', '');

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
  `mrrefid` varchar(255) NOT NULL,
  `porefid` varchar(50) NOT NULL,
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
  `pocreatedon` datetime NOT NULL,
  `m_unit` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `app_qty` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `dtid` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `cgst_rate` varchar(50) NOT NULL,
  `sgst_rate` varchar(50) NOT NULL,
  `igst_rate` varchar(50) NOT NULL,
  `cgst` varchar(255) NOT NULL,
  `sgst` varchar(255) NOT NULL,
  `igst` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `vid` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `potandc` text NOT NULL,
  `pocreatedby` varchar(255) NOT NULL,
  `poupdatedby` varchar(100) NOT NULL,
  `poupdatedon` datetime NOT NULL,
  `mid` varchar(255) NOT NULL,
  `uid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_master`
--

INSERT INTO `po_master` (`poid`, `mrrefid`, `porefid`, `sid`, `csgt_total`, `ssgt_total`, `isgt_total`, `total_amount`, `frieght_amount`, `gst_frieght_amount`, `gross_amount`, `invoice_to`, `contact_name`, `contact_no`, `tandc`, `pocreatedon`, `m_unit`, `qty`, `app_qty`, `unit`, `dtid`, `discount`, `cgst_rate`, `sgst_rate`, `igst_rate`, `cgst`, `sgst`, `igst`, `total`, `vid`, `remark`, `potandc`, `pocreatedby`, `poupdatedby`, `poupdatedon`, `mid`, `uid`) VALUES
(1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1970-01-01 00:00:00', '2', '65', '65', '5', '1', '', '', '', '', '', '', '', '', '1', '', '', 'tushar', 'tushar', '2018-07-23 12:46:33', '3423', ''),
(2, '', '', '65', '0', '0', '0', '450', '456', '', '933.36', '', '', '', '', '1970-01-01 00:00:00', '1', '1', '100', '5', '1', '50', '', '', '', '', '', '', '450', '4', '', '', 'tushar', '', '0000-00-00 00:00:00', '3418', ''),
(3, '', '', '130', '', '', '', '', '', '', '', '', '', '', '', '1970-01-01 00:00:00', '1,2', '1,1', '1,1', '50,12', '1,2', ',', '', '', '', ',', ',', ',', ',', '4', ',', '', 'tushar', '', '0000-00-00 00:00:00', '1,242', ''),
(4, '', '', '3', '', '', '', '', '', '', '', '', '', '', '', '1970-01-01 00:00:00', '1', '23', '23', '20', '2', '', '', '', '', '', '', '', '', '2', '', '', 'tushar', 'tushar', '2018-07-19 00:00:00', '3423', ''),
(5, '', '', '2', '172306', '85300', '85300', '513506', '500', '', '514026', 'dee', '', 'n', 't7c', '2018-07-19 00:00:00', '1', '3412', '3412', '50', '1', '', '', '', '', '101', '50', '50', '513506', '3', '', '', 'tushar', 'tushar', '2018-07-19 11:14:24', '3422', '');

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
  `rtvcreatedon` datetime NOT NULL,
  `rtvupdatedby` varchar(100) NOT NULL,
  `rtvupdatedon` datetime NOT NULL,
  `vchallan` varchar(50) NOT NULL,
  `schallan` varchar(50) NOT NULL,
  `mid` varchar(11) NOT NULL,
  `muid` varchar(11) NOT NULL,
  `rtvqty` varchar(50) NOT NULL,
  `rtvtruck` varchar(50) NOT NULL,
  `rtvremark` varchar(2550) NOT NULL,
  `tid` varchar(11) NOT NULL,
  `uid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rtv_master`
--

INSERT INTO `rtv_master` (`rtvid`, `rtvrefid`, `sid`, `vid`, `rtvreturndate`, `rtvcreatedby`, `rtvcreatedon`, `rtvupdatedby`, `rtvupdatedon`, `vchallan`, `schallan`, `mid`, `muid`, `rtvqty`, `rtvtruck`, `rtvremark`, `tid`, `uid`) VALUES
(1, '', 20, 1, '2018-07-03', 'tushar', '2018-07-11 14:55:17', 'tushar', '2018-07-23 12:26:57', '99', '45678', '1230', '22', '78', '67', 'ghqwe', '6', ''),
(2, '', 154, 1, '2018-07-03', '', '2018-07-03 18:57:54', 'tushar', '2018-07-23 12:27:03', '89', '90', '3373', '16', '89', '9', 'yui', '2', ''),
(3, '', 6, 1, '2018-07-01', 'tushar', '2018-07-17 13:39:25', 'tushar', '2018-07-23 12:27:09', '5', '55', '3424,3423', '1,1', '45,45', '3535,5545', 'gfdfg,dsfsd', '4', ''),
(4, '', 5, 4, '2018-07-16', 'tushar', '2018-07-19 09:56:25', '', '0000-00-00 00:00:00', '1', '2', '3424,3422', '1,1', '12,23', '1234,4424', 'test,', '7', ''),
(5, '', 3, 2, '2018-07-16', 'tushar', '2018-07-18 09:26:30', '', '0000-00-00 00:00:00', '2', '3', '3421,3418', '10,4', '33,12', '2344,2123', '233,3131', '6', ''),
(6, '', 2, 2, '2018-07-06', 'tushar', '2018-07-19 11:07:10', 'tushar', '2018-07-19 11:10:32', '121', '212', '3422,3421', '1,1', '34,35', '34,35', '313,313', '8', ''),
(7, '', 2, 2, '2018-07-21', 'tushar', '2018-07-21 15:50:29', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '6', ''),
(8, '', 173, 4, '2018-07-21', 'tushar', '2018-07-21 15:51:00', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '5', ''),
(9, '', 168, 3, '2018-07-21', 'tushar', '2018-07-21 15:51:48', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '7', '');

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
  `address` varchar(255) NOT NULL,
  `screatedby` varchar(100) NOT NULL,
  `screatedon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sitedetails`
--

INSERT INTO `sitedetails` (`sid`, `sname`, `sitestartdate`, `uniquesid`, `contactname`, `mobile`, `email`, `address`, `screatedby`, `screatedon`) VALUES
(1, 'DEE KAY BUILDCON PVT. LTD', '0000-00-00', 'office', 'Meenakshi', '8800695656', 'dkbuildcon@gmail.com', '147 1ST FLOOR OM SHUBHAM TOWER NEELAM BATA ROAD NIT FARIDABAD', '', '0000-00-00 00:00:00'),
(2, 'SUN INFO', '0000-00-00', 'SunInfo', '', '', '', 'PLOT NO 38, SEC 20A FARIDABAD', '', '0000-00-00 00:00:00'),
(3, 'GUPTA EXIM PVT. LTD.', '0000-00-00', 'gupta40/20', 'Foji ji', '9716733618', '', 'PLOT NO 40, SEC 20A FARIDABAD', '', '0000-00-00 00:00:00'),
(4, 'IP COLONY', '0000-00-00', 'IP Colony', 'MR. RAJIV', '8800695643', '', 'SEC 30,31 FARIDABAD', '', '0000-00-00 00:00:00'),
(5, 'DEE KAY BUILDCON (P) LTD', '0000-00-00', 'Bhakri', 'MR. VERMA', '8800695624 , 8800695651', '', '184/166 min,khatoni no.200,Khasra no. 197,Mauja, bhankri, Pali Road, VILLAGE BHANKRI,FARIDABAD-121004', '', '0000-00-00 00:00:00'),
(6, 'GUPTA EXIM', '0000-00-00', 'guptapr.', '', '8800695630', '', 'PRITHLA', '', '0000-00-00 00:00:00'),
(7, 'INDO', '0000-00-00', 'indoimt', 'MR. MUNESH', '8800466207', '', 'PLOT NO 132.133 MANESAR', '', '0000-00-00 00:00:00'),
(8, 'INDO AUTO TEK', '0000-00-00', 'indo13/20', 'MR. PRAKASH', '9654294850', '', 'PLOT NO 61 SEC 25 FBD', '', '0000-00-00 00:00:00'),
(9, 'JBM', '0000-00-00', 'jbmmane', 'MR. Mohan', '8800695644', '', 'SEC-36, MOHAMMADPUR JHARSA, NEAR KHANDSA VILLAGE, PACE CITY-II, GURGAON-122 001', '', '0000-00-00 00:00:00'),
(10, 'KSS PLOTNO 6 SEC 16', '0000-00-00', 'kss', 'MR. SANJAY', '9999460500', '', 'BHADURGARH', '', '0000-00-00 00:00:00'),
(11, 'NEEL METAL PRODUCTS LTD. GUR', '0000-00-00', 'nmpl gur', 'MR. Mohan', '8800695644', '', 'SEC-36, MOHAMMADPUR JHARSA, NEAR KHANDSA VILLAGE, PACE CITY-II, GURGAON', '', '0000-00-00 00:00:00'),
(12, 'RPS VIKAS', '0000-00-00', 'rps', 'MR DINESH', '8800695604', '', 'AURNGABAD PALWAL', '', '0000-00-00 00:00:00'),
(13, 'SPRON HUNDAI', '0000-00-00', 'supron35/35', 'MR. kuldeep yadav', '8800695654', '', 'PLOT NO 35 SEC 35 GURGAON', '', '0000-00-00 00:00:00'),
(14, 'Superon Technik India Pvt. Ltd.', '0000-00-00', 'stanvac551/37', 'MR. THAKUR', '8800695605 , 8800695657', '', 'PLOT NO 551 SEC 37 GURGAON', '', '0000-00-00 00:00:00'),
(15, 'V.K.GLOBLE', '0000-00-00', 'vkg15/1', 'MR. RAMKUMAR', '8800695637', '', '15/1 SEC 31 FARIDABAD', '', '0000-00-00 00:00:00'),
(16, 'FRUIT GARDEN', '0000-00-00', 'f-25', 'MR. ANKUR', '9212545580', '', 'F-25 NEAR GREEN AUTO MOBILE', '', '0000-00-00 00:00:00'),
(17, 'Jc auto', '0000-00-00', '213 /58', 'meenakshi', 'ronald', '', '213 SEC 58 FBD', '', '0000-00-00 00:00:00'),
(18, 'NEEL METAL PRODUCTS LTD.', '0000-00-00', 'nmplmane', '', '8800695636', '', 'SEC 7 NEAR BANS GAON MANESAR', '', '0000-00-00 00:00:00'),
(19, 'SHIVANI', '0000-00-00', 'shivani27', 'meenakshi', '9990158722', '', 'PLOT NO 59,60 SEC 27A FBD', '', '0000-00-00 00:00:00'),
(20, 'ICT', '0000-00-00', 'ict62/20', 'Mr. sanjay', '9910234318', '', 'PLOT NO 62, SEC 20A FBD', '', '0000-00-00 00:00:00'),
(21, 'AVON TUBE', '0000-00-00', 'avont.pur', '', '', '', 'Tatarpur', '', '0000-00-00 00:00:00'),
(22, 'Indo Autotech Limited', '0000-00-00', 'indo332/24', 'MR. HARPRASAD', '8800695634', '', 'PLOT NO 332 SEC 24  FARIDABAD', '', '0000-00-00 00:00:00'),
(23, 'PRPL PAKAGING', '0000-00-00', 'prpl', 'sachin', '', '', 'PRITHLA', '', '0000-00-00 00:00:00'),
(24, 'Shivam Autoteck', '0000-00-00', 'har', '', '9729824623, 8800695637', '', 'plot no. 3, industrial park-2, phase -1, village salempur  mehdood haridwar (UK)', '', '0000-00-00 00:00:00'),
(25, 'Oxinion India Pvt. Ltd.', '0000-00-00', 'Oxinion', 'meenakshi', '8800695634', '', 'PLOT NO 6SECTOR 27A', '', '0000-00-00 00:00:00'),
(26, 'KHEMKA', '0000-00-00', 'kemka', 'meenakshi', '', '', 'PLOT NO 135 SEC 24 FARIDABAD', '', '0000-00-00 00:00:00'),
(27, 'VENUS INDUSTRIAL CORPORATION PVT. LTD', '0000-00-00', 'venus24', 'its both 197&262 sec 24', '8800695634', '', 'plot no 262 SEC 24', '', '0000-00-00 00:00:00'),
(28, 'ACME COLLEGE AURANGABAD', '0000-00-00', 'acme', 'rajeev', '', '', 'SIMS.AppMaster.Model.MSite', '', '0000-00-00 00:00:00'),
(29, 'PLOT NO. 167/ SEC 25', '0000-00-00', '167/25', 'meenakshi', '', '', 'PLOT NO. 167/ SEC 25', '', '0000-00-00 00:00:00'),
(30, 'AMBICA STEEL LTD', '0000-00-00', 'ambicaa-30', '', '8800695604', '', 'A-30, SITE IV, SAHIBABAD INDUSTRIAL AREA, UP.', '', '0000-00-00 00:00:00'),
(31, 'RDS IMPEX', '0000-00-00', 'rds190/8', 'nitesh', '', '', 'PLOT NO 190SEC 8 MANESAR', '', '0000-00-00 00:00:00'),
(32, 'PLOT NO 502 SEC 37 GURGOAN', '0000-00-00', '502/37', 'nitesh , kuldeep', '', '', 'SIMS.AppMaster.Model.MSite', '', '0000-00-00 00:00:00'),
(33, 'MELCO INDIA', '0000-00-00', 'melco291/58', 'MR. DIVAKAR', '8800695641', '', 'PLOT NO 291 SEC 58 FARIDABAD', '', '0000-00-00 00:00:00'),
(34, 'DUMP', '0000-00-00', 'dump', '', '', '', 'SIMS.AppMaster.Model.MSite', '', '0000-00-00 00:00:00'),
(35, 'd', '0000-00-00', 'd', '', '', '', 'c FBD', '', '0000-00-00 00:00:00'),
(36, 'TUBE TECH TATARPUR', '0000-00-00', 'TBD', '', '', '', 'SIMS.AppMaster.Model.MSite FBD', '', '0000-00-00 00:00:00'),
(37, 'MARS INDUSTRIES LTD', '0000-00-00', 'mars binola', 'MR. NISHANT', '8800466203', '', 'BINOLA GURGOAN NEAR BAJAJ AUTO', '', '0000-00-00 00:00:00'),
(38, 'RPS SATA VIKAS', '0000-00-00', 'satavikas', 'MR. YOGESH', '', '', 'SIMS.AppMaster.Model.MSite', '', '0000-00-00 00:00:00'),
(39, 'RPS PRANAV VIKAS', '0000-00-00', 'rpspvl', 'MR. YOGESH', '', '', 'SIMS.AppMaster.Model.MSite', '', '0000-00-00 00:00:00'),
(40, 'STAR HOOK & LOOP', '0000-00-00', 'starhook', '', '', '', 'BHADURGARH', '', '0000-00-00 00:00:00'),
(41, 'AKASH OVERSEAS P LTD', '0000-00-00', 'akash268/58', 'MR. SUNDER', '8800695633', '', 'PLOT NO 268 SEC 58 FBD', '', '0000-00-00 00:00:00'),
(42, 'Supron hundai', '0000-00-00', '106/37', '', '8800695605', '', 'Plot no 255 Udyog vihar  Gurgaon', '', '0000-00-00 00:00:00'),
(43, 'SPS INTERNATIONAL SCHOOL', '0000-00-00', 'sps palwal', 'MR. SACHIN', '8800695659', '', 'SEC 2, PALWAL', '', '0000-00-00 00:00:00'),
(44, 'M/S COMPAGE AUTOMATION SYSTEM', '0000-00-00', 'compagedlf', 'MR. RAJESH', '8800466214', '', 'PLOT NO 20-21 NEW DLF INDUSTRIAL AREA FARIDABAD', '', '0000-00-00 00:00:00'),
(45, 'SHIVANI LOCK P LTD', '0000-00-00', 'shivani', '', '', '', '14/6 MATHURA ROAD', '', '0000-00-00 00:00:00'),
(46, 'M/S OMEGA LIFE STYLE PVT LTD.', '0000-00-00', 'omegabhr.', 'Mr. Rathi', '8684033155', '', '179 I, SECTOR 16 ,BAHADURGARH', '', '0000-00-00 00:00:00'),
(47, 'banti house', '0000-00-00', 'banti', '', '9910240239', '', 'gali no 3 hanuman nagar  faridabad', '', '0000-00-00 00:00:00'),
(48, 'ATUL KATARIA CHOWK GUR', '0000-00-00', 'atulkataria gur', '', '', '', 'SIMS.AppMaster.Model.MSite', '', '0000-00-00 00:00:00'),
(49, 'INDO AUTO TECH., P.NO. SPL-5, TAPUKARA', '0000-00-00', 'indotappu', '', '', '', 'SIMS.AppMaster.Model.MSite', '', '0000-00-00 00:00:00'),
(50, 'gupta', '0000-00-00', 'gupta exim', 'Mr Nirakar', '8800466202', '', 'PLOT NO 45 SEC6 FARIDABAD', '', '0000-00-00 00:00:00'),
(51, 'GLEN PLOT NO4 SEC6', '0000-00-00', 'glen4/6', '', '', '', '', '', '0000-00-00 00:00:00'),
(52, 'JAIN INDO', '0000-00-00', '1443/14', '', '', '', 'PLOT NO 1443 SEC 14', '', '0000-00-00 00:00:00'),
(53, '261/24', '0000-00-00', '261/24', '', '', '', 'FARIDABAD', '', '0000-00-00 00:00:00'),
(54, 'MANGLA  REDIMIX pvt. ltd.', '0000-00-00', 'MANGLA', 'MR. JITENDER MANGLA', '9310104321', '', 'GADPURI PALWAL', '', '0000-00-00 00:00:00'),
(55, 'STERLING TOOLS LTD', '0000-00-00', 'sterling', '', '8800695633', '', 'PRITHLA PALWAL', '', '0000-00-00 00:00:00'),
(56, 'TESTING SITE45', '0000-00-00', 'tsite', '', '', '', 'INNOSOLS INNOSOLS', '', '0000-00-00 00:00:00'),
(57, 'DK', '0000-00-00', '15', '', '9810160500', '', 'HOUSE NO 974 SEC 17 FARIDABAD', '', '0000-00-00 00:00:00'),
(58, 'Vijay kumar singh', '0000-00-00', '1914/28', '', '', '', '1914 SEC 28 FARIDABAD', '', '0000-00-00 00:00:00'),
(59, 'DAGA TRADING COMPANY', '0000-00-00', 'DAGAPALWAL', '', '8800695641', '', 'PRITHLA ROAD DUDHOLA PALWAL', '', '0000-00-00 00:00:00'),
(60, 'DEE KAY DEVELOPERS', '0000-00-00', 'DK', 'Meenakshi', '8800695656', '', '147 1ST FLOOR OM SHUBHAM TOWER NEELAM BATA ROAD FARIDABAD', '', '0000-00-00 00:00:00'),
(61, 'TCIL NATIONAL HIGH NO 8 VILL. SANGWARI NEAR DHARUWEDA, REWARI', '0000-00-00', 'tcil', '', '8800695654', '', '', '', '0000-00-00 00:00:00'),
(62, 'MENTAL HEALTH CARE CENTER', '0000-00-00', 'nasha', 'Mr. Rana', '8800695617', '', 'SEC 14 FARIDABAD', '', '0000-00-00 00:00:00'),
(63, 'TESTING SITE25', '0000-00-00', 'ts', '', '', '', '', '', '0000-00-00 00:00:00'),
(64, 'LALIT ELECTRICAL', '0000-00-00', 'motor', '', '', '', '', '', '0000-00-00 00:00:00'),
(65, 'Venus Stamping Pvt. Ltd.', '0000-00-00', 'Ven', '', '8800695641, 9991895645', '', 'Baghola', '', '0000-00-00 00:00:00'),
(66, 'DB TIMBER', '0000-00-00', 'db', '', '', '', '', '', '0000-00-00 00:00:00'),
(67, 'SANKEI PRAGATI INDIA PVT LTD.', '0000-00-00', 'bilaspur', '', '9466297065', '', 'PLOT B 101-103, VILLAGE PATHRERI , PIONEER INDUSTRIAL PARK BILASPUR DIST. GURGOAN', '', '0000-00-00 00:00:00'),
(68, 'JC AUTO PRITHLA', '0000-00-00', 'JC', '', '8800695633', '', 'A', '', '0000-00-00 00:00:00'),
(69, 'JLJ SCHOOL AURANGABAD', '0000-00-00', 'JLJ', '', '9992965802', '', '', '', '0000-00-00 00:00:00'),
(70, 'NEHRU GRD PLOT NO 22 -23', '0000-00-00', 'nit', '', '', '', '', '', '0000-00-00 00:00:00'),
(71, 'LAKHANI 1278/SEC 14', '0000-00-00', 'lakhani', '', '', '', '', '', '0000-00-00 00:00:00'),
(72, 'TECHNO SPRING INDUSTRIES PLOT NO 44 SEC 68 FARIDABAD', '0000-00-00', 'IMT', '', '8800695634', '', '', '', '0000-00-00 00:00:00'),
(73, 'RADHIKA IMT MANESAR', '0000-00-00', 'radhika', '', '8800695649', '', '', '', '0000-00-00 00:00:00'),
(74, 'SARVOTAM ALLOYS PVT LTD', '0000-00-00', 'bhiwadi', '', '8800695642', '', 'BHIWADI', '', '0000-00-00 00:00:00'),
(75, 'M/S SFG EXPORTS PVT. LTD.', '0000-00-00', 'shahi', '', '8800695660', '', '12/6 SARAI KHAWAJA FARIDABAD FARIDABAD', '', '0000-00-00 00:00:00'),
(76, 'METRO HOSPITAL', '0000-00-00', 'metro', '', '8800695612', '', 'SEC 16 FARIDABD', '', '0000-00-00 00:00:00'),
(77, 'THOMSON PRESS INDIA LIMITED', '0000-00-00', 'Thomson', '', '8800695632', '', '18-35 DELHI MATHURA ROAD  FARIDABAD', '', '0000-00-00 00:00:00'),
(78, 'MUNJAL AUTO INDUSTRIES LTD.', '0000-00-00', 'DHARUHERA', '', '8800695605', '', 'BAWAL', '', '0000-00-00 00:00:00'),
(79, 'Shimizu Corporation India Pvt Ltd', '0000-00-00', 'Shimizu', '', '8800695636', '', 'Honda Siel Cars India Ltd, Package-B, Suppliers Park, Tapukara, Bhiwadi', '', '0000-00-00 00:00:00'),
(80, '354/21a', '0000-00-00', 'glen', '', '', '', '', '', '0000-00-00 00:00:00'),
(81, 'JBM  A-4 INDUSTRIAL AREA', '0000-00-00', 'KOSI', '', '9761820163', '', 'KOSI KALAN', '', '0000-00-00 00:00:00'),
(82, 'Aurania', '0000-00-00', 'sec 56', '', '8800695654', '', 'sec 56 gurgaon', '', '0000-00-00 00:00:00'),
(83, 'anand jain', '0000-00-00', 'sec 14', '', '8800695634', '', '673 sec 14', '', '0000-00-00 00:00:00'),
(84, 'TEST', '0000-00-00', 'TST1', '', '', '', '', '', '0000-00-00 00:00:00'),
(85, 'AVON TUBE TECH', '0000-00-00', 'BHAGOLA', 'manish', '8802474357, 9466163914', '', 'BHAGOLA', '', '0000-00-00 00:00:00'),
(86, 'Aggarwal college', '0000-00-00', 'college', '', '9999460500', '', 'ballabgarh', '', '0000-00-00 00:00:00'),
(87, 'M/S MASU BRAKES(P.LTD.)', '0000-00-00', 'masu', '', '8684033155', '', '43 milestone nh 10 delhi rohtak road bhadurgarh', '', '0000-00-00 00:00:00'),
(88, 'Chelsea blocks & pipes pvt ltd.', '0000-00-00', 'Chelsea', '', '8800695635', '', 'Plot no.11, Sec-5, Industrial Estate ,Phase -11, G.C . BAWAL  HARYANA', '', '0000-00-00 00:00:00'),
(89, 'Delhi public school', '0000-00-00', 'DPS', '', '8800695657', '', 'Sec.-81 faridabad', '', '0000-00-00 00:00:00'),
(90, 'RMC READYMIX (INDIA)', '0000-00-00', 'RMC 01', '', '', '', '14/7, MILE STONE , MATHURA ROAD FARIDABAD', '', '0000-00-00 00:00:00'),
(91, 'rajeev colony', '0000-00-00', 'ramesh', '', '8800695630', '', 'sec 56 faridabad', '', '0000-00-00 00:00:00'),
(92, 'Dr. Bharti Gupta', '0000-00-00', 'dr', '', '8800695604', '', 'plot no 38 sec 31 Faridabad', '', '0000-00-00 00:00:00'),
(93, 'DAMCO SOLUTIONS PVT. LTD.', '0000-00-00', 'DAMCO', '', '8800695604', '', 'PLOT NO 39 SEC 20A FARIDABAD', '', '0000-00-00 00:00:00'),
(94, 'OM CEMENT', '0000-00-00', 'ABC', '', '', '', '42930 FARIDABAD', '', '0000-00-00 00:00:00'),
(95, 'CHANDRA ENGINEERS', '0000-00-00', 'NEEMRANA', '', '9785406573', '', 'PLOT NO – ( E 131 ) EPIP INDUSTRIAL AREA,  NEEMRANA - RAJASTHAN', '', '0000-00-00 00:00:00'),
(96, 'ANIL CHANANA', '0000-00-00', 'Okhla', '', '8800695638', '', 'C-5, Okhla, Phase-1 New Delhi', '', '0000-00-00 00:00:00'),
(97, 'Forza Medi India PVT. LTD.', '0000-00-00', 'Forza', '', '8800695612', '', 'Plote No 78 Sec. 4  Manesar Gurgaon', '', '0000-00-00 00:00:00'),
(98, 'Singhal', '0000-00-00', '21b', '', '8800695604', '', '712/21 b', '', '0000-00-00 00:00:00'),
(99, 'JC AUTO PUNCHING', '0000-00-00', 'JCPUNCHING', '', '8800695633', '', 'PRITHLA', '', '0000-00-00 00:00:00'),
(100, 'Gupta Promoters Pvt. Ltd.', '0000-00-00', 'gpl', '', '8800695654', '', 'Housing Complex , Sector-70-a, Gurgaon', '', '0000-00-00 00:00:00'),
(101, 'SITA SINGH & SONS', '0000-00-00', 'SITA', '', '8800695633', '', 'PRITHLA  PALWAL', '', '0000-00-00 00:00:00'),
(102, 'kenmore', '0000-00-00', 'kenmore', '', '8800695604', '', '20th Milestone, Plot no. 4, Mathura Road faridabad', '', '0000-00-00 00:00:00'),
(103, 'jbm 3', '0000-00-00', 'jbmbawal', 'nitesh', '8800695636', '', 'bawal', '', '0000-00-00 00:00:00'),
(104, 'GARG REDIMIX PVT LTD', '0000-00-00', 'GARG', '', '', '', 'SAHAPUR ROAD , SIKRI', '', '0000-00-00 00:00:00'),
(105, 'naveen aggarwal', '0000-00-00', 'nauchali', '', '8800695634', '', 'nauchali', '', '0000-00-00 00:00:00'),
(106, 'S P Sharma', '0000-00-00', 'south ex', '', '8800695618', '', 'F- 45 , South Extension -1 new delhi', '', '0000-00-00 00:00:00'),
(107, 'RMG PREMIER POLYFILM LTD.', '0000-00-00', 'RMG', '', '08755975267, 7500496179', '', 'A-13 , INDUSTRIAL AREA  SIKANDRABAD', '', '0000-00-00 00:00:00'),
(108, 'ttttttt', '0000-00-00', 'tytytytyt', '', '', '', '', '', '0000-00-00 00:00:00'),
(109, 'Super auto india ltd.', '0000-00-00', '50/6', '', '8800695650', '', 'plot no 50 sec 6  faridabad', '', '0000-00-00 00:00:00'),
(110, 'Shilpi Cable Technologies ltd.', '0000-00-00', 'sp', '', '8800695619', '', 'SP-1037 Industrial area Chopanki Bhiwadi', '', '0000-00-00 00:00:00'),
(111, 'Aggarwal School', '0000-00-00', 'machgar', '', '8800695634', '', 'Machgar Faridabad', '', '0000-00-00 00:00:00'),
(112, 'KNOR', '0000-00-00', '17-Jun', '', '8800695634', '', 'PLOT NO 17 SEC 6', '', '0000-00-00 00:00:00'),
(113, 'Agro Engg', '0000-00-00', 'agro', '', '8800695612', '', '22/7, IMT , Manesar gurgaon', '', '0000-00-00 00:00:00'),
(114, 'JBM BALLABHGARH', '0000-00-00', 'JBMF', '', '8800695630', '', 'PLOT NO  118 SEC 59', '', '0000-00-00 00:00:00'),
(115, 'SHIVAM AUTOTECH', '0000-00-00', 'rohtak', '', '08800695605 , 9729733514', '', 'Plot no 9 sec 30 a , imt rohtak', '', '0000-00-00 00:00:00'),
(116, 'VECTORA TOOLS', '0000-00-00', 'TOOLS', '8800695604', '', '', 'PLOT NO. 42/20A FARIDABAD', '', '0000-00-00 00:00:00'),
(117, 'metro', '0000-00-00', '331', '', '8800695604', '', 'plot no 331 sec 21a', '', '0000-00-00 00:00:00'),
(118, 'phsycotropy', '0000-00-00', '17/20', '', '8800695655', '', 'plot no 17 sec 20 a', '', '0000-00-00 00:00:00'),
(119, 'KHANDEL', '0000-00-00', '68/6', '', '8800695630', '', 'PLOT NO 68 SEC 6 FARIDABAD', '', '0000-00-00 00:00:00'),
(120, 'Sho', '0000-00-00', '313/29', '', '8800695604', '', '313 sec 29 faridabad', '', '0000-00-00 00:00:00'),
(121, 'GKN DRIVLINE', '0000-00-00', 'GKN 270/24', '', '8813091408, 9999460500', '', 'PLOT NO. 270  SEC 24', '', '0000-00-00 00:00:00'),
(122, 'Narender Aggarwal', '0000-00-00', 'softa', '', '8800695635', '', 'softa sikri', '', '0000-00-00 00:00:00'),
(123, 'bharatpal', '0000-00-00', 'bharatpal', '', '7827279421', '', 'plot no. 190/ 31', '', '0000-00-00 00:00:00'),
(124, 'Beltecno India Pvt. Ltd.', '0000-00-00', 'Beltecno', '', '8800695636 , 7023440406', '', 'SP 2-23, Japanese Industrial Zone Neemrana, Distt.- Alwar , Rajasthan', '', '0000-00-00 00:00:00'),
(125, 'Lakhani footwear pvt.ltd', '0000-00-00', 'HARIDWAR', '', '08684033155 , 8800695637,18', '', 'PLOT NO 11 SEC 11  HARIDWAR', '', '0000-00-00 00:00:00'),
(126, 'JAI BHARAT MARUTI', '0000-00-00', 'JBMN', '', '8800695618', '', 'PLOT NO 33 SEC 44  GURGAON', '', '0000-00-00 00:00:00'),
(127, 'Narender aggarwal school', '0000-00-00', 'school', '', '8800695635', '', 'palwal', '', '0000-00-00 00:00:00'),
(128, 'Super auto', '0000-00-00', 'sec15', '', '8800695630', '', 'plot no 1154 sec 15 faridabad', '', '0000-00-00 00:00:00'),
(129, 'Sterling tool limited', '0000-00-00', 'sec 25', '', '8800695634', '', 'plot no 81 sec 25 faridabad', '', '0000-00-00 00:00:00'),
(130, 'JC Punching-Tatarpur', '0000-00-00', 'tatarpur', '', '8800695633', '', 'Tatarpur', '', '0000-00-00 00:00:00'),
(131, 'SANDHAR COMPONENTS', '0000-00-00', 'SANDHAR', '', '8800695619 ,  7822895183', '', 'PLOT NO. 14 , SEC -5 PHASE 2 BAWAL  REWARI', '', '0000-00-00 00:00:00'),
(132, 'SANDHAR TECHNOLOGIES', '0000-00-00', 'PATHRERI', '', '8800695617 , 8800695619', '', 'PLOT NO. SP-1/889 , RIICO INDL. AREA, PATHREDI, BHIWADI, RAJ , TIN NO. 08060703042', '', '0000-00-00 00:00:00'),
(133, 'Multitech products', '0000-00-00', 'Multitech', '', '8800695658', '', 'plot no 4 northen india faridabad', '', '0000-00-00 00:00:00'),
(134, 'Super Screw Pvt Ltd', '0000-00-00', 'super', '', '7834846502 , 9999460500', '', 'Plot no 83 vilage Aurangabad Palwal', '', '0000-00-00 00:00:00'),
(135, 'Glen Appliances p ltd', '0000-00-00', 'glenimt', '', '8800695630, 8800695631', '', 'Plot No.-919 ,sec 68 , IMT,\nFaridabad', '', '0000-00-00 00:00:00'),
(136, 'THAPAR UNIVERSITY', '0000-00-00', 'PATIALA', '', '8800695617 , 9115946340', '', 'bhadson road , Thapad Technology Campus  PATIALA', '', '0000-00-00 00:00:00'),
(137, 'Andritz hydro pvt  ltd', '0000-00-00', 'Andritz', '', '8802474357 , 9466163914', '', 'prithla', '', '0000-00-00 00:00:00'),
(138, 'PSYCHOTROPICS INDIA LTD.', '0000-00-00', 'PIL', '', '8800695618, 8171745512,', '', 'PLOT - 12 & 12A, INDUSTRIAL PARK-2, VILLAGE SALEMPUR MEHOOD', '', '0000-00-00 00:00:00'),
(139, 'Gupta ji', '0000-00-00', '1018', '', '', '', '1018 sec 17 FARIDABAD', '', '0000-00-00 00:00:00'),
(140, 'Gaursons', '0000-00-00', '12', '', '8800695634', '', '1, Barakhamba Road  New Delhi', '', '0000-00-00 00:00:00'),
(141, 'SRI SATYA SAI SANJEEVANI INTERNATIONAL CENTER FOR CHILD HEART CARE & RESEARCH', '0000-00-00', 'sai', '', '9654095696', '', 'DELHI MATHURA ROAD , VILLAGE BAGHOLA  PALWAL', '', '0000-00-00 00:00:00'),
(142, 'BIC AUTO PVT.LTD.', '0000-00-00', 'BIC', '', '9896864864,  8800695605', '', 'E-9 OLD INDUSTRIAL AREA  Bahadurgarh', '', '0000-00-00 00:00:00'),
(143, 'Manav Rachna International School', '0000-00-00', 'MRIS', '', '9599801288', '', 'Eros Garden, Charmwood Village, Delhi - Surajkund Road , Faridabad-121008', '', '0000-00-00 00:00:00'),
(144, 'Shail Global International school', '0000-00-00', 'SGI', '', '8800695657, 8800695641', '', 'sec 81  faridabad', '', '0000-00-00 00:00:00'),
(145, 'Sufdarjang hyundai', '0000-00-00', 'maya', '', '8800695618, 8010608744', '', 'B-100, Maya Puri new delhi', '', '0000-00-00 00:00:00'),
(146, 'SOUTH CITY', '0000-00-00', 'SOUTH CITY', '', '8800695635', '', 'E23 & F2 SOUTH CITY 1 GURGAON', '', '0000-00-00 00:00:00'),
(147, 'Shimizu Corporation India Pvt Ltd (G -TIP)', '0000-00-00', 'G - TIP', '', '8800695619', '', 'Address:  Honda Siel Cars India Ltd, Package-B, Suppliers Park, Tapukara,  Bhiwadi', '', '0000-00-00 00:00:00'),
(148, 'NATIONAL HIGHWAY 2', '0000-00-00', 'NH', '', '9971500225', '', 'MATHURA ROAD  FARIDABAD', '', '0000-00-00 00:00:00'),
(149, 'TIMPY FARM HOUSE', '0000-00-00', 'DR. BHARTI GUPTA', '', '8800695604, 8826415874', '', 'SEC- 11  FARIDABAD', '', '0000-00-00 00:00:00'),
(150, 'Manav Rachna International  University ( G --  BLOCK )', '0000-00-00', 'MRIU', '', '9811416263. 8800695604', '', 'Delhi Suraj kund Road, Sector 43, faridabad', '', '0000-00-00 00:00:00'),
(151, 'KAMAL ENCON INDUSTRIES LTD.', '0000-00-00', 'KAMAL', '', '8800695631, 9654095696', '', 'PLOT NO. 917, SEC 68 IMT  FARIDABAD', '', '0000-00-00 00:00:00'),
(152, 'SARC  AVIATION PVT.LTD', '0000-00-00', 'SARC', '', '8800695655', '', 'PLOT NO. 93 , RANGPURI , BASANT KUNJ  NEW DELHI', '', '0000-00-00 00:00:00'),
(153, 'Twin House', '0000-00-00', '21 sec', '', '8800695604 , 7827279421', '', '727-728 sec 21 c faridabad', '', '0000-00-00 00:00:00'),
(154, 'DECATHLON SPORTS INDIA PRIVATE LIMITED', '0000-00-00', 'jaipur', '', '9660665199', '', 'khasara no 1123, gram bhankrota,Ajmer Road Jaipur', '', '0000-00-00 00:00:00'),
(155, 'ROSE VIEW PROMOTERS PVT.LTD & ASSOCIATES', '0000-00-00', 'ROSE', '', '8750469962, 8010180104', '', 'PLOT NO. -2 , SECTOR M-11, TRANSPORTS HUB, INDUSTRIAL ESTATE IMT MANESAR GURGAON', '', '0000-00-00 00:00:00'),
(156, 'C. Lal Alloys Pvt. Ltd', '0000-00-00', 'LAL', '', '9466163914, 8802474357', '', 'NANGLA BHIKU PALWAL', '', '0000-00-00 00:00:00'),
(157, 'Bluebells Public School', '0000-00-00', 'bell', '', '8800695657 , 8800695605', '', 'Malibal Town Sohna Road Gurgaon', '', '0000-00-00 00:00:00'),
(158, 'Munjal Auto Industries limited', '0000-00-00', 'BAWAL', '', '8800695605', '', 'BAWAL', '', '0000-00-00 00:00:00'),
(159, 'LAKHANI INDIA LTD', '0000-00-00', 'Lakhan', '', '8800695647', '', '266/24, FARIDABAD', '', '0000-00-00 00:00:00'),
(160, 'SUZUKI MOTORCYCLES INDIA PVT LTD', '0000-00-00', 'SUZUKI', '', '8800695654', '', 'VILLAGE KHERKI DHAULA, N.H -8 LINK ROAD\nGURGAON', '', '0000-00-00 00:00:00'),
(161, 'RMC', '2017-09-01', 'RMC', '', '', '', '12/7, Mathura Road\nFARIDABAD', '', '0000-00-00 00:00:00'),
(162, 'Dada Farmhouse', '2017-09-06', 'Dada', '-', '9312948976', '', 'RAJOKARI\nNEW DELHI', '', '0000-00-00 00:00:00'),
(163, 'HARSH NIWAS', '0000-00-00', 'JONAPUR', 'SURESH JI', '9560502947 , 8813841388', '', 'Farm No. 65,  Village Jonapur, Near Fathpur Beri Police Station, Delhi', '', '0000-00-00 00:00:00'),
(164, 'VENUS INDUSTRIES LTD.', '0000-00-00', 'VENUS', '8800695634', '8800695634', '', 'PLOT NO. 91, SEC 25', '', '0000-00-00 00:00:00'),
(165, 'MCF SEC-22', '0000-00-00', 'MCF', '', '8800695634', '', 'SEC -22  FARIDABAD', '', '0000-00-00 00:00:00'),
(166, 'DELITE ARAVALI VIEW', '2017-11-06', 'DELITE', '9999460500,', '7834846502, 8800695641, 8800695660', '', 'NEAR GYM KHANA CLUB , FARIDABAD )', '', '0000-00-00 00:00:00'),
(167, 'Venus Industrial corporation pvt ltd', '2017-11-14', 'gujrat', 'Boby', '9660665199', '', 'Modhera Becharaji road \nvillage delvada Mehesana : 384210\nGujrat', '', '0000-00-00 00:00:00'),
(168, 'Wings Automobile Product Pvt. Ltd', '2017-11-17', 'WINGS', 'Mr Ram kumar', '8860624640', '', 'PLOT NO. 53, SEC -6 , FARIDABAD', '', '0000-00-00 00:00:00'),
(169, 'Carrier Air Conditioning & Refrigeration Ltd.', '0000-00-00', 'Carrier Aircon', 'Mr. Tarsem Singh', '8800695617', '', 'Kherki Daula post,  Narsing Pur, Gurugram- 122004, (near Haldiram)', '', '0000-00-00 00:00:00'),
(170, 'Mohta bright steel', '0000-00-00', 'mohta', '', '9555828666', '', 'prithla', '', '0000-00-00 00:00:00'),
(171, 'Super Auto India Ltd', '0000-00-00', 'pune', 'Nagesh', '8412877804', '', 'Pune', '', '0000-00-00 00:00:00'),
(172, 'Venus Industries Corporation Pvt Limited', '0000-00-00', 'Sec-24', 'Rajesh', '9818579969', '', 'Plot NO.-197, Sector-24, Faridabad', '', '0000-00-00 00:00:00'),
(173, 'Shahi Exports Pvt. Ltd.- Odisha 2', '0000-00-00', 'Shahi Odisha', 'Mitesh', '9636282706', '', 'Plot No. H-10, H-11 & H-12.\nMancheswar Industries Estate,\nBhubaneswar, Odisha-751010', '', '0000-00-00 00:00:00'),
(174, 'Silicon Construction Pvt.Ltd.', '2018-03-21', 'DECATHLON', 'Imran', '9654095696', '', 'Village Singhpura Zirakpur Hadbast no. 43.', '', '0000-00-00 00:00:00'),
(175, 'Sterling Fabori', '0000-00-00', 'NHPC', 'Anil Bansal', '8800695621', '', '12/2, Near Vatika (NHPC Chock)', '', '0000-00-00 00:00:00'),
(176, 'Venus Otuka', '0000-00-00', 'sector 27-A', 'Anil Bansal', '9899523184', '', 'Sector-27-A, Plot no. 58,59,60', '', '0000-00-00 00:00:00'),
(177, 'Starlic AutoMobile 141', '0000-00-00', 'plot 141', 'Anil Bansal', '9899523184', '', 'Plot no. -141, Near NHPC Chowk (Classic Honda)', '', '0000-00-00 00:00:00'),
(178, 'Aakriti Nursing Home', '0000-00-00', 'BK Chock', 'Dinesh ji', '8800695604', '', 'E-5, Near B.K. Chock, Faridabad', '', '0000-00-00 00:00:00'),
(179, 'SHRI RAM CONCRETE PRODUCTS', '0000-00-00', 'RMC,', '', '8130713434', '', '147, SEC-37 , FARIDABAD', '', '0000-00-00 00:00:00');

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
  `subaddress` varchar(255) NOT NULL,
  `subcreatedby` varchar(100) NOT NULL,
  `subcreatedon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcontdetails`
--

INSERT INTO `subcontdetails` (`subid`, `subname`, `submobile`, `subaltmobile`, `subemail`, `subgst`, `subaddress`, `subcreatedby`, `subcreatedon`) VALUES
(1, 'Israil Painter', '9818092863', '9810713088', '', '', 'B-1007 behind sabdal market pali road badkhal lake faridabad', '', '0000-00-00 00:00:00'),
(2, 'Om Sai fabricator', '9873899569', '9057154224', '', '', 'plot no 1223 sec 31 \ngurugram\nomsaifabricator12@gmail.com', '', '0000-00-00 00:00:00'),
(3, 'Anju Bakshi', '', '', '', '', 'B-81, 1st Floor, Paryavaran complex, Saidulajaib, New Delhi-110030\r\n', '', '0000-00-00 00:00:00'),
(4, 'Naaz  Contractor & Dacorates', '9810879686', '', '', '', '1213, Sector-18, Faridabad', '', '0000-00-00 00:00:00'),
(5, 'M/S Amit Kumar Sharma', '9050220512', '7015856708', '', '', 'Vill.Shahbajpur Khalsa, P.O. Majra Gurdas, Distt. Rewari (Haryana)', '', '0000-00-00 00:00:00'),
(6, 'Jahangir', '8800546119', '9990173961', '', '', 'A-41, Sarai Kale Khan, NIzamuddin East, New Delhi - 110013', '', '0000-00-00 00:00:00'),
(7, 'Aslam Khan', '7053058786,837786212', '9971559801, 9006717403', '', '', 'Steel Conractor Vill. Lahasona, P.O. Gurahi, P.S.K', '', '0000-00-00 00:00:00'),
(8, 'eqweq', '3131', '31313', '31313', '3313', 'sdsfsdfs', 'tushar', '0000-00-00 00:00:00');

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
  `tdesc` varchar(2550) NOT NULL,
  `tcreatedby` varchar(100) NOT NULL,
  `tcreatedon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transporters`
--

INSERT INTO `transporters` (`tid`, `tname`, `tmobile`, `taltmobile`, `tconame`, `temail`, `tgst`, `taddress`, `tdesc`, `tcreatedby`, `tcreatedon`) VALUES
(9, 'Others', '-', '', '', '', '', '', '', '', '0000-00-00 00:00:00'),
(8, 'By Vendor', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00'),
(7, 'Nagar Tempo', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00'),
(6, 'DFC Logistic', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00'),
(5, 'Chaudhary', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00'),
(4, 'Fagna Canter', '', '', '', '', '', 'HR 38 U 0624', '', '', '0000-00-00 00:00:00'),
(3, 'Fagna Tata', '', '', '', '', '', 'HR 38T1688', '', '', '0000-00-00 00:00:00'),
(2, 'Fagna Pick Up CNG', '', '', '', '', '', 'DL1LX2142', '', '', '0000-00-00 00:00:00'),
(1, 'Fagna Pick Up', '', '', '', '', '', 'HR38 R 1912', '', '', '0000-00-00 00:00:00');

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
  `ucreatedon` datetime NOT NULL,
  `ucreatedby` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `uemail`, `uaddress`, `umobile`, `user_role`, `site_role`, `material`, `vendor`, `mr`, `po`, `rtv`, `cp`, `uogrn`, `vendorbills`, `vendorbillpayment`, `moveorder`, `officegstdetails`, `subcontractor`, `transporter`, `workorder`, `reporting`, `workordermaterials`, `consumption`, `site`, `ucreatedon`, `ucreatedby`) VALUES
(2, 'varun', 'varun', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', ''),
(3, 'tushar', 'tushar', '4634@gmail.com', '3456', '47737', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179', '0000-00-00 00:00:00', ''),
(11, 'varunbhandia', 'varun', 'dfhdfh@zfgdf.sdg', 'fsdgdfh', 'dfhdfh', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179', '0000-00-00 00:00:00', ''),
(13, 'deekay', 'deekay', 'rtyui@gmail.com', 'qwerty', '123456789', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179', '0000-00-00 00:00:00', '');

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
  `vdesc` varchar(255) NOT NULL,
  `vcreatedby` varchar(100) NOT NULL,
  `vcreatedon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendordetails`
--

INSERT INTO `vendordetails` (`vid`, `vname`, `vmobile`, `valtmobile`, `vemail`, `vgst`, `vaddress`, `vdesc`, `vcreatedby`, `vcreatedon`) VALUES
(1, 'tushar', '435435345235', '345678', 'dsavdd', '21144', 'sff fd bdfb', '231233434', 'tushar', '0000-00-00 00:00:00'),
(2, 'tushar', '435435345235', '345678', 'tushar@gmail.com', '213124', 'jaipur', '123', 'tushar', '0000-00-00 00:00:00'),
(3, 'delhi shuttering house', '435435345235', '345678', 'tushar@gmail.com', '16ktuwq', 'delhi', '3112', 'varunbhandia', '2018-07-25 10:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_bills_master`
--

CREATE TABLE `vendor_bills_master` (
  `id` int(11) NOT NULL,
  `grnrefid` varchar(50) NOT NULL,
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
  `adjustment` varchar(100) NOT NULL,
  `deduction` varchar(100) NOT NULL,
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
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uid` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `wicreatedby` varchar(50) NOT NULL,
  `wicreatedon` datetime NOT NULL,
  `witype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workitems`
--

INSERT INTO `workitems` (`wiid`, `winame`, `widesc`, `wigst`, `wibase`, `wicategory`, `wicreatedby`, `wicreatedon`, `witype`) VALUES
(1, 'painting work', '', '0', '0', '', '', '0000-00-00 00:00:00', 'Building Material'),
(2, 'Fabrication work', 'Laying & Fixing of steel reinforcement as per drawing (As per site Project Manager)', '18', '0', '8', '', '0000-00-00 00:00:00', 'Building Material'),
(3, 'Structural Glazing', '', '0', '0', '', '', '0000-00-00 00:00:00', 'Building Material'),
(4, 'Synthetic Enamel Paint', 'Unit- Sq. Ft.', '0', '0', '9', '', '0000-00-00 00:00:00', 'Building Material'),
(5, 'Tractor Acrylic Distemper OBD With Base , Birla Putty', 'Unit- Sq. Ft.', '0', '0', '9', '', '0000-00-00 00:00:00', 'Building Material'),
(7, 'BItumen', 'Cleaning of Existing surface apply Tack Coat with Bitumen 25kg per 100 sqm, providing and laying of ', '18', '0', 'Road Work', '', '0000-00-00 00:00:00', 'Building Material'),
(8, 'Apex Paint Exterior with Base', 'unit- Sq. Ft.', '0', '0', '9', '', '0000-00-00 00:00:00', 'Building Material'),
(9, 'Water Proofing', 'Applying 20mm thick w.p. plaster+2 coat of tapecrete +12mm thick Protection Plaster over Horizontal ', '0', '053434', '9', '', '0000-00-00 00:00:00', 'Building Material'),
(10, 'Water Proofing Plaster', 'Applying 20mm thick w.p. plaster+2 coat of tapecrete +12mm thick Protection Plaster over Vertical  s', '0', '10', '90', '', '0000-00-00 00:00:00', 'Building Material'),
(13, 'Steel Reinforcement', 'Laying & Fixing of steel reinforcement as per drawing (As per site Project Manager)', '0', '0', '90', 'username', '0000-00-00 00:00:00', 'Building Material'),
(14, 'Steel Reinforcement', 'Laying & Fixing of steel reinforcement as per drawing (As per site Project Manager)', '0', '', '90', 'varunbhandia', '0000-00-00 00:00:00', 'Building Material');

-- --------------------------------------------------------

--
-- Table structure for table `wo_master`
--

CREATE TABLE `wo_master` (
  `woid` int(10) NOT NULL,
  `worefid` text NOT NULL,
  `sid` varchar(50) NOT NULL,
  `subid` varchar(50) NOT NULL,
  `wodate` date NOT NULL,
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
  `wocreatedby` varchar(50) NOT NULL,
  `woupdatedby` varchar(50) NOT NULL,
  `woupdatedon` datetime NOT NULL,
  `uid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wo_master`
--

INSERT INTO `wo_master` (`woid`, `worefid`, `sid`, `subid`, `wodate`, `wiid`, `muid`, `woqty`, `wounitprice`, `dtid`, `wodiscount`, `wocgst`, `wosgst`, `woigst`, `wototal`, `woremark`, `wocgsttotal`, `wosgsttotal`, `woigsttotal`, `wototalamount`, `wofreight`, `wogstfreight`, `wogrossamount`, `oid`, `wocontactname`, `wocontactno`, `wotandc`, `wocreatedon`, `wocreatedby`, `woupdatedby`, `woupdatedon`, `uid`) VALUES
(2, '', '1', '', '1970-01-01', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1970-01-01 00:00:00', '', '', '2018-07-25 13:33:38', ''),
(0, '', '6', '5', '1970-01-01', '7', '8', '23', '', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1970-01-01 00:00:00', 'tushar', '', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `consumption`
--
ALTER TABLE `consumption`
  ADD PRIMARY KEY (`consid`);

--
-- Indexes for table `cp_master`
--
ALTER TABLE `cp_master`
  ADD PRIMARY KEY (`cpid`);

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
-- Indexes for table `employee`
--
ALTER TABLE `employee`
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
-- Indexes for table `mo_master`
--
ALTER TABLE `mo_master`
  ADD PRIMARY KEY (`moid`);

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
-- Indexes for table `rtv_master`
--
ALTER TABLE `rtv_master`
  ADD PRIMARY KEY (`rtvid`);

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
-- Indexes for table `vendor_bills_master`
--
ALTER TABLE `vendor_bills_master`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `consumption`
--
ALTER TABLE `consumption`
  MODIFY `consid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cp_master`
--
ALTER TABLE `cp_master`
  MODIFY `cpid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
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
-- AUTO_INCREMENT for table `grn_master`
--
ALTER TABLE `grn_master`
  MODIFY `grnid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `material_rqst`
--
ALTER TABLE `material_rqst`
  MODIFY `mrid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2102;

--
-- AUTO_INCREMENT for table `mo_master`
--
ALTER TABLE `mo_master`
  MODIFY `moid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `poid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rtv_master`
--
ALTER TABLE `rtv_master`
  MODIFY `rtvid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sitedetails`
--
ALTER TABLE `sitedetails`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `Student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcontdetails`
--
ALTER TABLE `subcontdetails`
  MODIFY `subid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendordetails`
--
ALTER TABLE `vendordetails`
  MODIFY `vid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendor_bills_master`
--
ALTER TABLE `vendor_bills_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workitems`
--
ALTER TABLE `workitems`
  MODIFY `wiid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
