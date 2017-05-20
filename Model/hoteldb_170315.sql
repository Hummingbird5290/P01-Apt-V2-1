-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2017 at 05:24 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoteldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartmentobj`
--

CREATE TABLE `apartmentobj` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `Address` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `Flag` bit(1) NOT NULL,
  `Create_By` int(11) NOT NULL,
  `Create_Date` datetime NOT NULL,
  `Update_By` int(11) NOT NULL,
  `Update_Date` datetime NOT NULL,
  `Delete_By` int(11) DEFAULT NULL,
  `Delete_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Id` int(11) NOT NULL,
  `RoomType_Id` bigint(20) NOT NULL,
  `Booking_Date` datetime NOT NULL,
  `Create_By` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `configobj`
--

CREATE TABLE `configobj` (
  `Id` int(11) NOT NULL,
  `Electricity` float NOT NULL,
  `Water` float NOT NULL,
  `Flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configobj`
--

INSERT INTO `configobj` (`Id`, `Electricity`, `Water`, `Flag`) VALUES
(1, 8, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `Id` int(11) NOT NULL,
  `ContractNo` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ApartmentId` int(11) NOT NULL,
  `RoomId` int(11) NOT NULL,
  `Customer_id` bigint(20) NOT NULL,
  `Create_By` int(11) NOT NULL,
  `Create_Date` datetime NOT NULL,
  `Update_By` int(11) NOT NULL,
  `Update_Date` datetime NOT NULL,
  `Delete_By` int(11) DEFAULT NULL,
  `Delete_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`Id`, `ContractNo`, `ApartmentId`, `RoomId`, `Customer_id`, `Create_By`, `Create_Date`, `Update_By`, `Update_Date`, `Delete_By`, `Delete_Date`) VALUES
(1, '001', 1, 1, 1, 1, '2017-02-01 00:00:00', 1, '2017-02-01 00:00:00', 0, '0000-00-00 00:00:00'),
(2, '001', 1, 2, 2, 1, '2017-02-19 00:00:00', 1, '2017-02-19 00:00:00', NULL, NULL),
(3, '001', 1, 3, 3, 1, '2017-02-19 00:00:00', 1, '2017-02-19 00:00:00', NULL, NULL),
(4, '001', 1, 4, 4, 1, '2017-02-19 00:00:00', 1, '2017-02-19 00:00:00', NULL, NULL),
(5, '001', 1, 5, 5, 1, '2017-02-19 00:00:00', 1, '2017-02-19 00:00:00', NULL, NULL),
(6, '001', 1, 6, 6, 1, '2017-02-19 00:00:00', 1, '2017-02-19 00:00:00', NULL, NULL),
(7, '001', 1, 7, 7, 1, '2017-02-19 00:00:00', 1, '2017-02-19 00:00:00', NULL, NULL),
(8, '001', 1, 8, 8, 1, '2017-02-19 00:00:00', 1, '2017-02-19 00:00:00', NULL, NULL),
(9, '001', 1, 9, 9, 1, '2017-02-19 00:00:00', 1, '2017-02-19 00:00:00', NULL, NULL),
(10, '001', 1, 10, 10, 1, '2017-02-19 00:00:00', 1, '2017-02-19 00:00:00', NULL, NULL),
(11, '001', 1, 11, 11, 1, '2017-02-19 00:00:00', 1, '2017-02-19 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Id` bigint(20) NOT NULL,
  `Title` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `CradId` varchar(13) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Tel` varchar(10) NOT NULL,
  `Tel2` varchar(10) DEFAULT NULL,
  `Address` varchar(100) NOT NULL,
  `Create_By` varchar(50) NOT NULL,
  `Create_Date` datetime NOT NULL,
  `Update_By` varchar(50) NOT NULL,
  `Update_Date` datetime NOT NULL,
  `Delete_By` varchar(50) DEFAULT NULL,
  `Delete_Date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Id`, `Title`, `Name`, `Last_Name`, `CradId`, `Email`, `Tel`, `Tel2`, `Address`, `Create_By`, `Create_Date`, `Update_By`, `Update_Date`, `Delete_By`, `Delete_Date`) VALUES
(1, 'Mr.', 'Obama', 'St', '1234567891011', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(2, 'Mr.', 'stevb', 'job\r\n', '1234567891011', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(3, 'Mr.', 'joht', 'KT', '1234567891011', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(4, 'Mr.', 'man', 'LT', '1234567891011', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(5, 'Mr.', 'owen', 'it', '1234567891011', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(6, 'Mr.', 'messi', '10', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(7, 'Mr.', 'ronaldo', '7', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(8, 'Mr.', 'reus', '11', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(9, 'Mr.', 'neymar', '11', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(10, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(11, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(12, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(13, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(14, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(15, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(16, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(17, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(18, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(19, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(20, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(21, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(22, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(23, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(24, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(25, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(26, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(27, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(28, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(29, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(30, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(31, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(32, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(33, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(34, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(35, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(36, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(37, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(38, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(39, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(40, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(41, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(42, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(43, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(44, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(45, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(46, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(47, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(48, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(49, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(50, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(51, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(52, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(53, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(54, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(55, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(56, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(57, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(58, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(59, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(60, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(61, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(62, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(63, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(64, 'Mr.', 'Obama', 'St', '', 'dkisksi@hotmail.com', '0883226589', NULL, 'test', '1', '2017-02-19 00:00:00', '1', '2017-02-19 00:00:00', NULL, NULL),
(65, '', '', '', '', '', '', '', '', '0', '2017-02-25 02:18:40', '0', '2017-02-25 02:18:40', NULL, NULL),
(66, '', '', '', '', '', '', '', '', '0', '2017-02-26 00:29:53', '0', '2017-02-26 00:29:53', NULL, NULL),
(67, '34', '44', '44', '', '44@sdfd.com', '44', '44', '44', '0', '2017-02-26 00:30:22', '0', '2017-02-26 00:30:22', NULL, NULL),
(68, '34', '44', '44', '', '44@sdfd.com', '44', '44', '44', '0', '2017-02-26 00:30:52', '0', '2017-02-26 00:30:52', NULL, NULL),
(69, '234', '564', '464', '', '464', '46', '464', '464', '0', '2017-02-26 00:31:16', '0', '2017-02-26 00:31:16', NULL, NULL),
(70, '12', '12', '12', '', '12', '12', '12', '121', '0', '2017-02-26 00:31:38', '0', '2017-02-26 00:31:38', NULL, NULL),
(71, '12', '12', '12', '', '12', '12', '12', '121', '0', '2017-02-26 00:32:18', '0', '2017-02-26 00:32:18', NULL, NULL),
(72, '12', '12', '12', '', '12', '12', '12', '121', '0', '2017-02-26 00:32:59', '0', '2017-02-26 00:32:59', NULL, NULL),
(73, '12', '12', '12', '123456789012', '12', '12', '12', '121', '0', '2017-02-26 00:35:05', '0', '2017-02-26 00:35:05', NULL, NULL),
(74, '23', '23', '23', '23', '23', '23', '23', '23', '0', '2017-02-26 00:35:35', '0', '2017-02-26 00:35:35', NULL, NULL),
(75, '34', '343', '34', '34', '34', '34', '34', '34', '0', '2017-02-26 00:55:17', '0', '2017-02-26 00:55:17', NULL, NULL),
(76, '56', '56', '56', '56', '56', '56', '56', '56', '0', '2017-02-26 00:56:58', '0', '2017-02-26 00:56:58', NULL, NULL),
(77, '67', '67', '67', '67', '67@h.com', '67', '67', '676767', '0', '2017-02-26 01:45:59', '0', '2017-02-26 01:45:59', NULL, NULL),
(78, '57', '57', '57', '57', '57@hotmail.com', '(575) 755-', '(757) 575-', '5757575757575', '0', '2017-02-26 23:02:28', '0', '2017-02-26 23:02:28', NULL, NULL),
(79, '98', '98', '98', '98', '98@h.com', '(98_) ___-', '(98_) ___-', '89', '', '2017-02-26 23:07:14', '', '2017-02-26 23:07:14', NULL, NULL),
(80, '009', '009', '009', '009', '0990@tyhf.com', '(757) 575-', '(765) 757-', '5757575', '', '2017-02-26 23:08:54', '', '2017-02-26 23:08:54', NULL, NULL),
(81, '87', '87', '87', '87', '8@fgdg.com', '(878) 787-', '(878) 787-', '87878', 'kimimaro', '2017-02-26 23:09:48', 'kimimaro', '2017-02-26 23:09:48', NULL, NULL),
(82, 'dfgd', 'dgd', 'dgd', 'dgdg', 'dgd@ht.com', '(335) 3__-', '(353) 53_-', '3535335353', '', '2017-02-26 23:15:08', '', '2017-02-26 23:15:08', NULL, NULL),
(83, 'xf', 'dfgd', 'dg', 'dgdgd', 'dgdgf@dsfgh.comdg', '(453) 5__-', '(353) 53_-', '35353', 'kimimaro', '2017-02-26 23:17:21', 'kimimaro', '2017-02-26 23:17:21', NULL, NULL),
(84, 'gdd', 'dgdg', 'dgd', 'dgd', 'kimimaro1952@gmail.com', '(468) 868-', '(___) ___-', '6868686', 'kimimaro', '2017-02-26 23:21:49', 'kimimaro', '2017-02-26 23:21:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `type_id` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `parent_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `owner_id` int(11) UNSIGNED DEFAULT NULL,
  `priority` int(11) NOT NULL DEFAULT '0',
  `hours_total` double UNSIGNED DEFAULT NULL,
  `hours_remaining` double UNSIGNED DEFAULT NULL,
  `hours_spent` double UNSIGNED DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `closed_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `repeat_cycle` varchar(10) DEFAULT NULL,
  `sprint_id` int(10) UNSIGNED DEFAULT NULL,
  `due_date_sprint` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `issue_backlog`
--

CREATE TABLE `issue_backlog` (
  `id` int(10) UNSIGNED NOT NULL,
  `sprint_id` int(10) UNSIGNED DEFAULT NULL,
  `issues` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `issue_comment`
--

CREATE TABLE `issue_comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `issue_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `text` text NOT NULL,
  `file_id` int(10) UNSIGNED DEFAULT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `issue_file`
--

CREATE TABLE `issue_file` (
  `id` int(10) UNSIGNED NOT NULL,
  `issue_id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(255) NOT NULL DEFAULT '',
  `disk_filename` varchar(255) NOT NULL DEFAULT '',
  `disk_directory` varchar(255) DEFAULT NULL,
  `filesize` int(11) NOT NULL DEFAULT '0',
  `content_type` varchar(255) DEFAULT '',
  `digest` varchar(40) NOT NULL,
  `downloads` int(11) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL,
  `deleted_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `issue_priority`
--

CREATE TABLE `issue_priority` (
  `id` int(10) UNSIGNED NOT NULL,
  `value` int(10) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_priority`
--

INSERT INTO `issue_priority` (`id`, `value`, `name`) VALUES
(1, 0, 'Normal'),
(2, 1, 'High'),
(3, -1, 'Low');

-- --------------------------------------------------------

--
-- Table structure for table `issue_status`
--

CREATE TABLE `issue_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `closed` tinyint(1) NOT NULL DEFAULT '0',
  `taskboard` tinyint(1) NOT NULL DEFAULT '1',
  `taskboard_sort` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_status`
--

INSERT INTO `issue_status` (`id`, `name`, `closed`, `taskboard`, `taskboard_sort`) VALUES
(1, 'New', 0, 2, 1),
(2, 'Active', 0, 2, 2),
(3, 'Completed', 1, 2, 3),
(4, 'On Hold', 0, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `Id` bigint(20) NOT NULL,
  `Name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Group_Id` int(11) NOT NULL,
  `Active` tinyint(1) NOT NULL,
  `Create_Date` datetime DEFAULT NULL,
  `Update_Date` datetime DEFAULT NULL,
  `Delete_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Id`, `Name`, `Password`, `Email`, `Group_Id`, `Active`, `Create_Date`, `Update_Date`, `Delete_Date`) VALUES
(1, 'Admin', 'Admin@1234', NULL, 99, 1, '2017-02-17 22:15:58', '2017-02-17 22:15:58', NULL),
(3, 'User', '1234', NULL, 99, 1, '2017-02-17 22:15:58', '2017-02-17 22:15:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Id` bigint(20) NOT NULL,
  `Room_No` varchar(20) CHARACTER SET latin1 NOT NULL COMMENT 'เลขที่ห้อง',
  `RoomType_Id` int(11) NOT NULL COMMENT 'รหัสประเภทห้อง',
  `Start_date` datetime DEFAULT NULL COMMENT 'วันที่เข้าอยู่',
  `End_Date` datetime DEFAULT NULL COMMENT 'วันที่ออก',
  `Status_Room` int(11) NOT NULL COMMENT 'สถานะของห้อง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Id`, `Room_No`, `RoomType_Id`, `Start_date`, `End_Date`, `Status_Room`) VALUES
(1, '001', 1, NULL, NULL, 1),
(2, '002', 1, NULL, NULL, 2),
(3, '003', 1, NULL, NULL, 3),
(4, '004', 2, NULL, NULL, 1),
(5, '005', 2, NULL, NULL, 4),
(6, '006', 2, NULL, NULL, 2),
(7, '007', 2, NULL, NULL, 3),
(8, '008', 2, NULL, NULL, 3),
(9, '009', 2, NULL, NULL, 3),
(10, '010', 2, NULL, NULL, 3),
(11, '011', 2, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roomstatus`
--

CREATE TABLE `roomstatus` (
  `Id` int(11) NOT NULL COMMENT 'รหัส',
  `RoomStatusId` int(11) NOT NULL COMMENT 'รหัสสถานะห้อง',
  `RoomStatusDetail` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'สถานะห้อง',
  `Flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roomstatus`
--

INSERT INTO `roomstatus` (`Id`, `RoomStatusId`, `RoomStatusDetail`, `Flag`) VALUES
(1, 1, 'ต่อสัญญา', 1),
(2, 2, 'ว่าง', 1),
(3, 3, 'จอง', 1),
(4, 4, 'แจ้งออก', 1),
(5, 5, 'ยังไม่ชำระเงิน', 1),
(6, 6, 'ชำระเงินแล้ว', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `Id` int(11) NOT NULL,
  `RoomType` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสห้อง',
  `RoomDetail` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ประเภทห้อง',
  `Room_Rates` float NOT NULL COMMENT 'ค่าห้อง',
  `flag` tinyint(1) NOT NULL COMMENT 'สถานะของประเภทห้อง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`Id`, `RoomType`, `RoomDetail`, `Room_Rates`, `flag`) VALUES
(1, 'ห้องปกติ', 'พัดลม ขนาด 22Q', 4500, 1),
(2, 'ห้องพิเศษ', 'แอร์ ขนาด 25Q', 5000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_bill`
--

CREATE TABLE `room_bill` (
  `Id` bigint(20) NOT NULL,
  `Room_Id` bigint(20) NOT NULL COMMENT 'id_room',
  `Bill_No` int(11) NOT NULL COMMENT 'เลขที่ใบเสร็จ',
  `Electricity_Unit` int(11) DEFAULT NULL COMMENT 'หน่วยค่าไฟเริ่ม/เดือน',
  `Electricity_Unit_End` int(11) DEFAULT NULL COMMENT 'หน่วยค่าไฟสุดท้าย/เดือน',
  `Water_Unit` int(11) DEFAULT NULL COMMENT 'หน่วยค่าน้ำเริ่ม/เดือน',
  `Water_Unit_End` int(11) DEFAULT NULL COMMENT 'หน่วยค่าน้ำสิ้นสุด/เดือน',
  `Status_Receive` tinyint(1) NOT NULL COMMENT 'สถานะการจ่ายค่าห้อง',
  `Bill_Date` date DEFAULT NULL,
  `Create_Date` datetime NOT NULL,
  `Receive_Date` datetime DEFAULT NULL,
  `Receive_By` varchar(100) NOT NULL,
  `Receive_Manager` varchar(100) NOT NULL,
  `Flag_Receive` tinyint(1) NOT NULL COMMENT 'สถานะการจ่ายค่าห้อง'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_bill`
--

INSERT INTO `room_bill` (`Id`, `Room_Id`, `Bill_No`, `Electricity_Unit`, `Electricity_Unit_End`, `Water_Unit`, `Water_Unit_End`, `Status_Receive`, `Bill_Date`, `Create_Date`, `Receive_Date`, `Receive_By`, `Receive_Manager`, `Flag_Receive`) VALUES
(1, 1, 1, 200, 350, 200, 348, 0, '0000-00-00', '2017-02-19 00:00:00', NULL, '', '', 5),
(2, 2, 2, 200, 350, 200, 348, 0, '0000-00-00', '2017-02-19 00:00:00', NULL, '', '', 5),
(3, 3, 3, 200, 368, 200, 398, 0, '0000-00-00', '2017-02-19 00:00:00', NULL, '', '', 6),
(4, 4, 3, 200, 368, 200, 398, 0, '0000-00-00', '2017-02-19 00:00:00', NULL, '', '', 6),
(5, 4, 3, 200, 368, 200, 398, 0, '0000-00-00', '2017-01-19 00:00:00', NULL, '', '', 6),
(6, 2, 2, 200, 350, 200, 348, 0, '0000-00-00', '2017-01-19 00:00:00', NULL, '', '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content`
--

CREATE TABLE `tbl_content` (
  `content_id` int(10) NOT NULL,
  `content_title` varchar(255) DEFAULT NULL COMMENT 'ชื่อเรื่องบทความ',
  `content_create` datetime DEFAULT NULL COMMENT 'วันที่สร้าง',
  `content_update` datetime DEFAULT NULL COMMENT 'วันที่ปรับปรุง',
  `content_group_id` int(10) DEFAULT NULL COMMENT 'กลุ่มของบทความ',
  `sku` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_content`
--

INSERT INTO `tbl_content` (`content_id`, `content_title`, `content_create`, `content_update`, `content_group_id`, `sku`) VALUES
(3, 'โปรแกรมเมอร์', '2006-10-31 11:22:12', '2015-11-03 01:22:48', 4, 'โปรแกรมเมอร์'),
(6, 'ร่างกายใน 1 วัน', '2006-10-31 23:42:55', '2015-11-05 15:04:52', 10, 'ร่างกายใน-1-วัน'),
(7, 'กินให้ดี มีชัย', '2006-10-31 23:49:02', '2015-11-19 14:39:36', 10, 'กินให้ดี-มีชัย'),
(8, '10 คำถาม สัมภาษณ์งาน', '2006-10-31 23:56:22', '2015-11-05 15:03:48', 11, '10-คำถาม-สัมภาษณ์งาน'),
(9, 'จุดอ่อนของผู้สมัครงาน', '2006-10-31 23:59:16', '2015-11-05 15:03:37', 11, 'จุดอ่อนของผู้สมัครงาน'),
(10, 'การเขียน Resume ', '2006-11-01 00:02:22', '2015-11-05 14:56:47', 11, 'การเขียน-resume'),
(11, 'คาถาบูชา1', '2006-11-01 00:07:35', '2015-11-05 15:02:35', 12, 'คาถาบูชา1'),
(12, 'Com ENG กับ Com SCI', '2006-11-01 00:17:50', '2015-11-05 14:57:31', 4, 'com-eng-กับ-com-sci'),
(13, 'วิตามิน สารอาหาร', '2006-11-01 00:23:41', '2015-11-05 15:01:48', 10, 'วิตามิน-สารอาหาร'),
(14, 'ตรวจสอบเว็บไซต์', '2006-11-02 11:00:23', '2015-11-05 14:56:31', 13, 'ตรวจสอบเว็บไซต์'),
(16, 'อานิสงส์ทำบุญ', '2006-11-02 11:15:50', '2015-11-30 14:11:14', 12, 'อานิสงส์ทำบุญ'),
(17, 'SQL Server กับ Oracle', '2006-11-02 11:18:36', '2015-11-03 02:01:58', 4, 'sql-server-กับ-oracle'),
(20, 'กำลังใจดีดี', '2006-11-03 15:53:35', '2015-11-05 15:14:57', 14, 'กำลังใจดีดี'),
(21, 'คำแนะนำจาก Google', '2006-11-05 12:32:58', '2015-11-03 01:56:49', 13, 'คำแนะนำจาก-google'),
(22, 'คำขอขมา', '2006-11-05 12:43:42', '2015-11-30 14:11:55', 12, 'คำขอขมา'),
(24, 'บัณฑิต', '2006-11-05 14:21:11', '2015-11-05 15:03:17', 4, 'บัณฑิต'),
(25, 'ฟื้นร่างกาย ', '2006-11-05 15:12:52', '2015-11-05 15:03:06', 10, 'ฟื้นร่างกาย'),
(27, 'ทำภาพแบบค่อย ๆ ชัด', '2006-11-09 00:06:14', '2015-11-05 15:32:43', 19, 'ทำภาพแบบค่อย-ๆ-ชัด'),
(28, 'ไม้มงคลประจำวันเกิด', '2006-11-11 08:55:11', '2015-11-05 15:09:42', 12, 'ไม้มงคลประจำวันเกิด'),
(29, 'คุณ กำ อะไรอยู่', '2006-11-11 09:17:49', '2015-11-05 15:15:20', 14, 'คุณ-กำ-อะไรอยู่'),
(30, 'เหยือกเต็มหรือยัง.', '2006-11-11 09:44:06', '2015-11-05 15:15:30', 14, 'เหยือกเต็มหรือยัง'),
(31, 'ข้อคิด', '2006-11-11 09:58:52', '2015-11-05 15:16:34', 14, 'ข้อคิด'),
(32, 'มองแต่แง่ดีเถิด คำสอนท่านพุทธทาสภิกขุ', '2006-11-11 10:23:56', '2015-11-04 11:52:30', 12, 'มองแต่แง่ดีเถิด-คำสอนท่านพุทธทาสภิกขุ'),
(33, 'ความลับของ Google', '2006-11-11 10:42:37', '2015-11-05 15:18:55', 13, 'ความลับของ-google'),
(34, 'เหตุ-ผล', '2006-11-16 21:13:01', '2015-11-05 15:18:33', 12, 'เหตุ-ผล'),
(36, 'เวิร์กฮาร์ดกับเวิร์กสมาร์ต', '2006-11-16 22:37:02', '2015-11-05 15:09:13', 11, 'เวิร์กฮาร์ดกับเวิร์กสมาร์ต'),
(37, 'คำสั่งด้าน Network (DOS)', '2006-11-16 23:15:58', '2015-11-05 15:04:11', 4, 'คำสั่งด้าน-network-dos'),
(40, 'Stored Procedure', '2006-11-17 21:43:11', '2015-11-05 15:18:44', 17, 'stored-procedure'),
(41, 'แก้แฮงค์', '2006-11-19 13:14:59', '2015-11-05 14:50:51', 10, 'แก้แฮงค์'),
(42, 'Array', '2006-12-09 13:04:46', '2015-11-05 15:09:32', 19, 'array'),
(43, 'กินตามราศี', '2006-12-09 13:09:55', '2015-11-05 14:57:50', 10, 'กินตามราศี'),
(44, 'XML คืออะไร', '2006-12-09 20:18:50', '2015-11-03 01:56:29', 21, 'xml-คืออะไร'),
(46, '175 submit', '2006-12-09 23:03:52', '2015-11-05 15:19:06', 13, '175-submit'),
(47, 'Sort Array', '2006-12-09 23:36:07', '2015-11-05 15:31:45', 24, 'sort-array'),
(49, 'อันตรายจากบุหรี่', '2006-05-02 21:14:03', '2015-11-05 15:44:02', 10, 'อันตรายจากบุหรี่'),
(50, '4 เรื่องสุขภาพ', '2006-06-02 21:09:26', '2015-11-05 15:10:11', 10, '4-เรื่องสุขภาพ'),
(51, 'เป็นมนุษย์เป็นได้เพราะใจสูง', '2006-09-02 23:30:43', '2015-11-05 15:10:22', 12, 'เป็นมนุษย์เป็นได้เพราะใจสูง'),
(52, 'ดูว่า table ประกอบด้วย field ใดบ้าง', '2006-09-02 23:32:10', '2015-11-05 15:05:09', 17, 'ดูว่า-table-ประกอบด้วย-field-ใดบ้าง'),
(53, 'การใช้ WhileLoop ใน SP', '2006-09-02 23:37:53', '2015-11-05 15:02:57', 17, 'การใช้-whileloop-ใน-sp'),
(54, 'msFlexGrid', '2006-09-02 23:41:52', '2015-11-03 01:58:47', 22, 'msflexgrid'),
(56, 'สร้าง odbc_connect อัตโนมัติ', '2006-09-02 23:46:00', '2015-11-05 15:10:45', 22, 'สร้าง-odbc_connect-อัตโนมัติ'),
(57, 'งานพิเศษ รายได้เสริม', '2006-09-02 23:53:29', '2015-11-05 15:10:54', 11, 'งานพิเศษ-รายได้เสริม'),
(58, 'การตั้งชื่อตัวแปร', '2006-10-02 19:16:00', '2015-11-05 15:13:17', 4, 'การตั้งชื่อตัวแปร'),
(60, 'รหัส Ascii กับ HTML', '2006-10-02 20:31:32', '2015-11-05 15:13:28', 4, 'รหัส-ascii-กับ-html'),
(61, 'คาถาผู้สูงอายุ', '2006-10-02 21:16:09', '2015-11-05 15:13:39', 12, 'คาถาผู้สูงอายุ'),
(62, 'css คืออะไร', '2007-04-01 00:10:33', '2015-11-05 15:20:00', 18, 'css-คืออะไร'),
(64, 'การเพิ่ม css ไว้ในแต่ละหน้า', '2007-04-01 00:33:53', '2015-11-30 14:28:30', 18, 'การเพิ่ม-css-ไว้ในแต่ละหน้า'),
(65, 'การเพิ่ม css ไว้ในเว็บไซต์', '2007-04-01 00:39:40', '2015-11-05 15:21:14', 18, 'การเพิ่ม-css-ไว้ในเว็บไซต์'),
(120, 'การลดกรรม 45 อย่าง ', '2009-03-16 10:45:05', '2015-11-05 15:28:20', 12, 'การลดกรรม-45-อย่าง'),
(121, 'เปลี่ยนตัวอักษรใน Field ให้เป็นตัวเล็ก', '2009-03-16 12:24:40', '2015-11-05 15:33:37', 36, 'เปลี่ยนตัวอักษรใน-field-ให้เป็นตัวเล็ก'),
(122, 'การสร้าง CURSOR บน SP', '2009-03-18 15:10:26', '2015-11-05 15:28:39', 17, 'การสร้าง-cursor-บน-sp'),
(124, 'ASP.NET 2008 กับ CRYSTAL REPORT ', '2009-03-24 17:53:39', '2015-11-30 14:52:01', 37, 'asp-net-2008-กับ-crystal-report'),
(126, 'แปลงวันที่จาก Integer เป็นวันที่ภาษาไทย', '2009-04-20 08:51:54', '2015-11-03 02:00:41', 37, 'แปลงวันที่จาก-integer-เป็นวันที่ภาษาไทย'),
(127, 'select between datetime', '2009-04-29 11:43:50', '2015-11-05 15:33:11', 35, 'select-between-datetime'),
(128, 'mysql select datediff', '2009-04-29 11:57:13', '2015-11-05 15:31:08', 35, 'mysql-select-datediff'),
(129, 'ความเกรงใจ', '2009-05-05 09:44:55', '2015-11-05 15:29:25', 12, 'ความเกรงใจ'),
(130, 'ความซื่อสัตย์', '2009-05-05 09:45:33', '2015-11-05 15:29:33', 12, 'ความซื่อสัตย์'),
(131, 'ตรงต่อเวลา', '2009-05-05 09:46:20', '2015-11-05 15:29:41', 12, 'ตรงต่อเวลา'),
(132, 'อย่าเกียจคร้าน', '2009-05-05 09:46:51', '2015-11-05 15:29:57', 12, 'อย่าเกียจคร้าน'),
(133, 'ช่วยกันทำงาน', '2009-05-05 09:47:25', '2015-11-05 15:29:50', 12, 'ช่วยกันทำงาน'),
(134, 'IF-ELSE บน SP', '2009-05-07 10:20:54', '2015-11-05 15:30:05', 17, 'if-else-บน-sp'),
(135, 'หา ความกว้าง,ความสูง,ขนาด ของภาพที่ทำการ Upload', '2009-06-15 12:23:52', '2015-11-05 15:33:19', 35, 'หา-ความกว้าง,ความสูง,ขนาด-ของภาพที่ทำการ-upload'),
(136, 'คาถาเสริมความงาม', '2009-06-16 13:51:36', '2015-11-05 15:30:12', 12, 'คาถาเสริมความงาม'),
(137, 'คำสั่งในการ Optimize Table', '2009-06-21 22:08:51', '2015-11-05 15:33:47', 36, 'คำสั่งในการ-optimize-table'),
(138, 'ASP.NET(C#) CONNECT MYSQL', '2009-06-23 16:44:10', '2015-11-05 15:33:58', 25, 'asp-netc-connect-mysql'),
(167, 'คาถาของคนทำงาน(อย่างเราๆ) ', '2010-11-25 11:35:21', '2015-11-03 01:07:35', 12, 'คาถาของคนทำงานอย่างเราๆ'),
(168, 'ช่วงเวลาแห่งความสุข ', '2010-12-08 09:28:42', '2015-11-03 01:11:14', 14, 'ช่วงเวลาแห่งความสุข'),
(169, 'การหาจำวน (COUNT) ใน Table เดียวกัน', '2010-12-13 11:51:17', '2015-11-03 01:06:57', 36, 'การหาจำวน-count-ใน-table-เดียวกัน'),
(171, 'ดูการเปลี่ยนแปลงของ VIEW และ TABLE', '2010-12-22 10:21:53', '2015-11-19 16:48:25', 17, 'ดูการเปลี่ยนแปลงของ-view-และ-table'),
(172, 'รอยแผลจากคำพูด', '2011-01-04 13:14:17', '2015-11-05 15:43:52', 14, 'รอยแผลจากคำพูด'),
(173, 'หน้าที่ของเด็ก (เด็กเอ๋ยเด็กดี)', '2011-01-07 18:08:07', '2015-11-30 14:07:34', 12, 'หน้าที่ของเด็ก-เด็กเอ๋ยเด็กดี'),
(174, 'onmouseover cursor hand', '2011-01-13 15:41:01', '2015-11-05 14:54:58', 19, 'onmouseover-cursor-hand'),
(175, 'Firefox ช้า ต้องคืนแรม ด่วน!!', '2011-05-08 13:37:59', '2015-11-05 14:54:43', 4, 'firefox-ช้า-ต้องคืนแรม-ด่วน!!'),
(176, 'Event Close(X) บน ฟอร์ม ครับ', '2011-05-22 17:54:10', '2015-11-03 01:55:50', 38, 'event-closex-บน-ฟอร์ม-ครับ'),
(177, 'GOOGLE APP SETUP', '2011-05-26 11:52:30', '2015-11-05 14:51:51', 13, 'google-app-setup'),
(178, 'TEXT SHADOW', '2011-05-29 10:40:29', '2015-11-05 14:54:32', 18, 'text-shadow'),
(179, 'CSS HR STYLE', '2011-05-29 10:50:44', '2015-11-30 14:26:42', 18, 'css-hr-style'),
(180, 'รัน ASP บน IIS7', '2011-05-30 15:20:07', '2015-11-05 14:55:09', 24, 'รัน-asp-บน-iis7'),
(181, 'SP RETURN STRING VALUE', '2011-06-03 10:15:38', '2015-11-05 14:55:19', 17, 'sp-return-string-value'),
(182, 'โรคเกาต์ เมื่ออาหารทำร้ายสุขภาพ', '2011-07-22 12:07:11', '2015-11-03 01:54:44', 10, 'โรคเกาต์-เมื่ออาหารทำร้ายสุขภาพ'),
(183, 'SQL Server Date Time Format', '2011-08-18 19:59:38', '2015-11-05 15:51:42', 17, 'sql-server-date-time-format'),
(184, 'การเข้ารหัส field in table', '2011-08-20 15:47:48', '2015-11-05 14:55:29', 17, 'การเข้ารหัส-field-in-table'),
(185, 'CHANGE IDENTITY COLUMN VALUES', '2011-08-28 16:03:39', '2015-11-05 14:54:14', 17, 'change-identity-column-values'),
(186, 'CDATE() TimeZone', '2011-09-06 21:27:55', '2015-11-03 01:59:07', 24, 'cdate-timezone'),
(187, 'PHP OOP CONNECT MYSQL', '2011-09-27 02:34:37', '2015-11-05 14:51:32', 35, 'php-oop-connect-mysql'),
(188, 'CSS3 IMAGE SHADOW', '2011-09-29 11:48:16', '2015-11-05 14:55:41', 18, 'css3-image-shadow'),
(189, 'PHP AUTO INCLUDE FILE', '2011-10-06 14:18:27', '2015-11-03 01:11:54', 35, 'php-auto-include-file'),
(190, 'การทำ mod rewrite บน localhost', '2012-02-03 23:52:08', '2015-11-05 14:53:31', 35, 'การทำ-mod-rewrite-บน-localhost'),
(191, 'ทำขอบมนให้รูปภาพ', '2012-03-06 00:59:00', '2015-11-30 15:00:51', 18, 'ทำขอบมนให้รูปภาพ'),
(193, 'พุธห้ามตัด', '2012-04-18 02:33:09', '2015-11-30 14:10:40', 12, 'พุธห้ามตัด'),
(194, 'mysql update with replace', '2012-04-24 09:26:31', '2015-11-03 01:06:00', 39, 'mysql-update-with-replace'),
(195, 'mySQL DISTINCT AND ORDER BY', '2012-10-09 22:33:07', '2015-11-05 14:50:39', 39, 'mysql-distinct-and-order-by'),
(196, 'การแก้ปัญหา Compatibility View ใน IE 9', '2012-11-30 00:50:17', '2015-11-03 01:59:56', 19, 'การแก้ปัญหา-compatibility-view-ใน-ie-9'),
(197, 'Google App ไม่ฟรี อีกต่อไป ', '2012-12-25 22:18:20', '2015-11-05 10:53:04', 13, 'google-app-ไม่ฟรี-อีกต่อไป'),
(198, 'ปิดการแจ้งเตือนใน Line', '2014-02-27 22:02:42', '2015-11-03 00:55:41', 40, 'ปิดการแจ้งเตือนใน-line'),
(199, 'Mod Rewrite ใน Localhost', NULL, '2015-11-12 11:49:10', 35, 'mod-rewrite-ใน-localhost'),
(200, 'การทำ Online Marketing ด้วยตนเอง', NULL, '2015-11-05 15:44:27', 20, 'การทำ-online-marketing-ด้วยตนเอง'),
(206, 'PHP Connect to MySQL', NULL, '2016-01-28 12:47:08', 35, 'php-connect-to-mysql'),
(205, 'Social Media', NULL, '2015-12-01 13:10:35', 20, 'social-media'),
(201, 'การแปลง URL ให้สั้นลง', NULL, '2015-11-10 02:26:25', 13, 'การแปลง-url-ให้สั้นลง'),
(202, 'explode data ใน PHP ', NULL, '2015-11-10 03:11:47', 35, 'explode-data-ใน-php'),
(203, 'สร้างลิ้งบนเบอร์โทรให้โทรออกได้เลย', NULL, '2015-11-14 14:06:59', 19, 'สร้างลิ้งบนเบอร์โทรให้โทรออกได้เลย'),
(204, 'เครื่องมือการทำ SEO', NULL, '2015-11-21 04:52:08', 20, 'เครื่องมือการทำ-seo'),
(207, '10 ข้อผิดพลาดของการทำเว็บไซต์', NULL, '2016-03-17 14:44:49', 20, '10-ข้อผิดพลาดของการทำเว็บไซต์');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content_group`
--

CREATE TABLE `tbl_content_group` (
  `content_group_id` int(10) NOT NULL,
  `content_group_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อกลุ่มของ content',
  `content_group_update` datetime DEFAULT NULL COMMENT 'วันที่ Update',
  `sku` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_content_group`
--

INSERT INTO `tbl_content_group` (`content_group_id`, `content_group_name`, `content_group_update`, `sku`) VALUES
(4, 'วิทยาการคอมพ์', '2011-05-08 13:37:59', 'วิทยาการคอมพ์'),
(10, 'สุขภาพ', '2011-07-22 12:07:11', 'สุขภาพ'),
(11, 'การงาน', '2012-04-04 02:13:57', 'การงาน'),
(12, 'มงคล', '2012-04-18 02:34:03', 'มงคล'),
(13, 'Google', '2012-12-25 22:28:23', 'google'),
(14, 'กำลังใจ', '2011-01-04 13:14:17', 'กำลังใจ'),
(17, 'MS SQL Server', '2011-08-28 16:03:39', 'ms-sql-server'),
(18, 'CSS', '2012-03-06 04:01:49', 'css'),
(19, 'JavaScript', '2012-11-30 00:50:17', 'javascript'),
(20, 'SEO', '2009-12-19 10:24:35', 'seo'),
(21, 'XML', '2008-11-17 23:41:47', 'xml'),
(22, 'VB', '2008-11-17 23:44:32', 'vb'),
(24, 'ASP', '2011-09-06 21:27:55', 'asp'),
(25, 'ASP.NET', '2009-06-23 16:44:10', 'asp-net'),
(26, 'AJAX', '2008-11-18 00:01:52', 'ajax'),
(35, 'PHP', '2012-05-03 11:25:26', 'php'),
(36, 'SQL', '2012-10-09 22:33:07', 'sql'),
(37, 'Crystal Report', '2012-03-08 08:19:29', 'crystal-report'),
(38, 'VB.NET', '2011-05-22 17:54:10', 'vb-net'),
(39, 'mySql', '2012-10-09 22:34:44', 'mysql'),
(40, 'Mobile', '2014-02-27 22:06:04', 'mobile');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `name` varchar(32) NOT NULL,
  `password` char(40) DEFAULT NULL,
  `salt` char(32) DEFAULT NULL,
  `role` enum('user','admin','group') NOT NULL DEFAULT 'user',
  `rank` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `task_color` char(6) DEFAULT NULL,
  `theme` varchar(64) DEFAULT NULL,
  `language` varchar(5) DEFAULT NULL,
  `avatar_filename` varchar(64) DEFAULT NULL,
  `options` blob,
  `api_key` varchar(40) DEFAULT NULL,
  `api_visible` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `deleted_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `uname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `upass` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uemail` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ucardid` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `ugroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `upass`, `fullname`, `uemail`, `ucardid`, `ugroup`) VALUES
(1, 'kimimaro2', 'c93ccd78b2076528346216b3b2f701e6', 'kimimarokaguya', 'kimimaro1952@hotmail.com', '1-2345-67-897-88-5', 99),
(11, 'admin', 'c93ccd78b2076528346216b3b2f701e6', 'admin', 'admin@hotmail.com', '1234567891123', 2),
(12, 'user1', 'c93ccd78b2076528346216b3b2f701e6', 'user', 'user@hotmail.com', '1234567891123', 1),
(13, 'user2', 'c93ccd78b2076528346216b3b2f701e6', 'User2', 'user1@hotmail.com', '', 0),
(14, 'user3', 'c93ccd78b2076528346216b3b2f701e6', 'User3', 'user2@hotmail.com', '', 0),
(15, 'user4', 'c93ccd78b2076528346216b3b2f701e6', 'User4', 'dgdfgf@dsfgh.com', '', 0),
(16, 'user5', 'c93ccd78b2076528346216b3b2f701e6', 'User5', 'dgdgf1@dsfgh.com', '1-2345-67-897-88-5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `manager` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartmentobj`
--
ALTER TABLE `apartmentobj`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `configobj`
--
ALTER TABLE `configobj`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `Id_2` (`Id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sprint_id` (`sprint_id`),
  ADD KEY `repeat_cycle` (`repeat_cycle`),
  ADD KEY `due_date` (`due_date`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `issue_owner_id` (`owner_id`),
  ADD KEY `issue_status` (`status`);

--
-- Indexes for table `issue_backlog`
--
ALTER TABLE `issue_backlog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `issue_backlog_sprint_id` (`sprint_id`);

--
-- Indexes for table `issue_comment`
--
ALTER TABLE `issue_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issue_id` (`issue_id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `issue_file`
--
ALTER TABLE `issue_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_issue_id` (`issue_id`),
  ADD KEY `index_user_id` (`user_id`),
  ADD KEY `index_created_on` (`created_date`);

--
-- Indexes for table `issue_priority`
--
ALTER TABLE `issue_priority`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_status`
--
ALTER TABLE `issue_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `roomstatus`
--
ALTER TABLE `roomstatus`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `room_bill`
--
ALTER TABLE `room_bill`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Room_Id` (`Room_Id`);

--
-- Indexes for table `tbl_content`
--
ALTER TABLE `tbl_content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `tbl_content_group`
--
ALTER TABLE `tbl_content_group`
  ADD PRIMARY KEY (`content_group_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uname` (`uname`),
  ADD UNIQUE KEY `uemail` (`uemail`),
  ADD KEY `ucardid` (`ucardid`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `group_user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartmentobj`
--
ALTER TABLE `apartmentobj`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `configobj`
--
ALTER TABLE `configobj`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issue_backlog`
--
ALTER TABLE `issue_backlog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issue_comment`
--
ALTER TABLE `issue_comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issue_file`
--
ALTER TABLE `issue_file`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issue_priority`
--
ALTER TABLE `issue_priority`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `issue_status`
--
ALTER TABLE `issue_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `roomstatus`
--
ALTER TABLE `roomstatus`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `room_bill`
--
ALTER TABLE `room_bill`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_content`
--
ALTER TABLE `tbl_content`
  MODIFY `content_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;
--
-- AUTO_INCREMENT for table `tbl_content_group`
--
ALTER TABLE `tbl_content_group`
  MODIFY `content_group_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `issue`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `issue_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_sprint_id` FOREIGN KEY (`sprint_id`) REFERENCES `sprint` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_status` FOREIGN KEY (`status`) REFERENCES `issue_status` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_type_id` FOREIGN KEY (`type_id`) REFERENCES `issue_type` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `issue_backlog`
--
ALTER TABLE `issue_backlog`
  ADD CONSTRAINT `issue_backlog_sprint_id` FOREIGN KEY (`sprint_id`) REFERENCES `sprint` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `issue_comment`
--
ALTER TABLE `issue_comment`
  ADD CONSTRAINT `comment_issue` FOREIGN KEY (`issue_id`) REFERENCES `issue` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
