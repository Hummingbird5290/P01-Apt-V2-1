-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2017 at 04:58 PM
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
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Flag` bit(1) NOT NULL,
  `Create_By` int(11) NOT NULL,
  `Create_Date` datetime NOT NULL,
  `Update_By` int(11) NOT NULL,
  `Update_Date` datetime NOT NULL,
  `Delete_By` int(11) DEFAULT NULL,
  `Delete_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Id` bigint(20) NOT NULL,
  `Room_Id` bigint(20) NOT NULL COMMENT 'id room',
  `Book_No` int(11) DEFAULT NULL,
  `Title` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Last_Name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CardId` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Tel` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Tel2` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Create_By` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Create_Date` datetime NOT NULL,
  `Update_By` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Update_Date` datetime NOT NULL,
  `Delete_By` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Delete_Date` datetime DEFAULT NULL,
  `Book_Amount` decimal(10,0) DEFAULT NULL COMMENT 'ค่ามัดจำ',
  `Status_Book` tinyint(1) NOT NULL COMMENT 'ยื่นยันการเข้าอยู่ 1 ยืนยัน 0 ไม่ยืนยัน'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Id`, `Room_Id`, `Book_No`, `Title`, `Name`, `Last_Name`, `CardId`, `Email`, `Tel`, `Tel2`, `Address`, `Create_By`, `Create_Date`, `Update_By`, `Update_Date`, `Delete_By`, `Delete_Date`, `Book_Amount`, `Status_Book`) VALUES
(6, 5, 2, 'นาย', 'ทดสอบ6666', 'นามทดสอบ', '1-1111-11-111-11-1', 'dgdgf@dsfgh.com', '(121) 212-1212', '(999) 999-9999', 'uuuuuuuuu', 'kimimaro', '2017-03-20 00:37:19', 'kimimaro', '2017-03-20 01:16:00', NULL, NULL, '50000', 0),
(7, 2, 3, 'นาย', '                 ทดสอบ77777                ', '                 นามทดสอบ                ', '1-1111-11-111-11-1', 'dgdgf@dsfgh.com', '(222) 222-2222', '', '', 'kimimaro', '2017-03-20 00:47:16', 'kimimaro', '2017-03-20 01:05:35', NULL, NULL, '500002', 0);

-- --------------------------------------------------------

--
-- Table structure for table `configobj`
--

CREATE TABLE `configobj` (
  `Id` int(11) NOT NULL,
  `Electricity` float NOT NULL,
  `Water` float NOT NULL,
  `Flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

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
  `ContractNo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ApartmentId` int(11) NOT NULL,
  `RoomId` int(11) NOT NULL,
  `Customer_id` bigint(20) NOT NULL,
  `Create_By` int(11) NOT NULL,
  `Create_Date` datetime NOT NULL,
  `Update_By` int(11) NOT NULL,
  `Update_Date` datetime NOT NULL,
  `Delete_By` int(11) DEFAULT NULL,
  `Delete_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

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
  `Title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Last_Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CradId` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Tel2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Create_By` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Create_Date` datetime NOT NULL,
  `Update_By` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Update_Date` datetime NOT NULL,
  `Delete_By` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Delete_Date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `Id` bigint(20) NOT NULL,
  `Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Group_Id` int(11) NOT NULL,
  `Active` tinyint(1) NOT NULL,
  `Create_Date` datetime DEFAULT NULL,
  `Update_Date` datetime DEFAULT NULL,
  `Delete_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

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
  `Room_No` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เลขที่ห้อง',
  `RoomType_Id` int(11) NOT NULL COMMENT 'รหัสประเภทห้อง',
  `Start_date` datetime DEFAULT NULL COMMENT 'วันที่เข้าอยู่',
  `End_Date` datetime DEFAULT NULL COMMENT 'วันที่ออก',
  `Status_Room` int(11) DEFAULT NULL COMMENT 'สถานะของห้อง',
  `Book_Id` bigint(20) DEFAULT NULL COMMENT 'Id การจอง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Id`, `Room_No`, `RoomType_Id`, `Start_date`, `End_Date`, `Status_Room`, `Book_Id`) VALUES
(1, '001', 1, NULL, NULL, 1, NULL),
(2, '002', 1, NULL, NULL, 2, 7),
(3, '003', 1, NULL, NULL, 2, NULL),
(4, '004', 2, NULL, NULL, 1, NULL),
(5, '005', 2, NULL, NULL, 4, 6),
(6, '006', 2, NULL, NULL, 2, NULL),
(7, '007', 2, NULL, NULL, 4, NULL),
(8, '008', 2, NULL, NULL, 4, NULL),
(9, '009', 2, NULL, NULL, 2, NULL),
(10, '010', 2, NULL, NULL, 2, NULL),
(11, '011', 2, NULL, NULL, 2, NULL),
(12, '012', 2, NULL, NULL, 2, NULL),
(13, '013', 1, NULL, NULL, 2, NULL),
(14, '014', 1, NULL, NULL, 2, NULL),
(15, '015', 2, NULL, NULL, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roomstatus`
--

CREATE TABLE `roomstatus` (
  `Id` int(11) NOT NULL COMMENT 'รหัส',
  `RoomStatusId` int(11) NOT NULL COMMENT 'รหัสสถานะห้อง',
  `RoomStatusDetail` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'สถานะห้อง',
  `Flag` tinyint(1) NOT NULL,
  `Sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roomstatus`
--

INSERT INTO `roomstatus` (`Id`, `RoomStatusId`, `RoomStatusDetail`, `Flag`, `Sort`) VALUES
(1, 1, 'ต่อสัญญา', 1, 4),
(2, 2, 'ว่าง', 1, 1),
(3, 3, 'จอง', 1, 5),
(4, 4, 'แจ้งออก', 1, 2),
(5, 5, 'ยังไม่ชำระเงิน', 1, 7),
(6, 6, 'ชำระเงินแล้ว', 1, 6);

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
  `Forniture_Lease` decimal(10,0) DEFAULT NULL COMMENT 'ค่าเช่าเฟอร์นิเจอร์',
  `Service_Lease` decimal(10,0) DEFAULT NULL COMMENT 'ค่าบริการ',
  `Phone_Lease` decimal(10,0) DEFAULT NULL COMMENT 'ค่าโทรศัพท์',
  `Fine` decimal(10,0) DEFAULT NULL COMMENT 'ค่าปรับ',
  `Status_Receive` int(1) NOT NULL COMMENT 'สถานะการจ่ายค่าห้อง',
  `Bill_Date` date DEFAULT NULL,
  `Create_Date` datetime NOT NULL,
  `Receive_Date` datetime DEFAULT NULL,
  `Receive_By` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Receive_Manager` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Flag_Receive` int(1) NOT NULL COMMENT 'สถานะการจ่ายค่าห้อง',
  `Total_Amount` decimal(10,2) DEFAULT NULL COMMENT 'รวมค่าห้อง',
  `Other_Amount` decimal(10,2) DEFAULT NULL COMMENT 'รวมค่าอื่นๆ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `room_bill`
--

INSERT INTO `room_bill` (`Id`, `Room_Id`, `Bill_No`, `Electricity_Unit`, `Electricity_Unit_End`, `Water_Unit`, `Water_Unit_End`, `Forniture_Lease`, `Service_Lease`, `Phone_Lease`, `Fine`, `Status_Receive`, `Bill_Date`, `Create_Date`, `Receive_Date`, `Receive_By`, `Receive_Manager`, `Flag_Receive`, `Total_Amount`, `Other_Amount`) VALUES
(7, 10, 4, 200, 350, 100, 150, '0', '0', '0', NULL, 0, '2017-03-21', '2017-03-21 22:06:35', NULL, '', '', 5, '7200.00', '0.00');

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
  `ucardid` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `ugroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `upass`, `fullname`, `uemail`, `ucardid`, `ugroup`) VALUES
(1, 'kimimaro', 'c93ccd78b2076528346216b3b2f701e6', '\0\0\0\02\0\0\"\0\0\0\0\0\0*\0\0-\0\0\Z', 'kimimaro1952@hotmail.com', '1-2345-67-897-88-5', 99),
(11, 'admin', 'c93ccd78b2076528346216b3b2f701e6', '\0\0\0a\0\0\0?\0\0\0?\0\0\0?\0\0\0?', 'admin@hotmail.com', '1234567891123', 2),
(12, 'user1', 'c93ccd78b2076528346216b3b2f701e6', '\0\0\0?\0\0\0?\0\0\0?\0\0\0?', 'user@hotmail.com', '1234567891123', 1),
(13, 'user2', 'c93ccd78b2076528346216b3b2f701e6', '\0\0\0U\0\0\0?\0\0\0?\0\0\0?\0\0\0?', 'user1@hotmail.com', '', 0),
(14, 'user3', 'c93ccd78b2076528346216b3b2f701e6', '\0\0\0U\0\0\0?\0\0\0?\0\0\0?\0\0\0?', 'user2@hotmail.com', '', 0),
(15, 'user4', 'c93ccd78b2076528346216b3b2f701e6', '\0\0\0U\0\0\0?\0\0\0?\0\0\0?\0\0\0?', 'dgdfgf@dsfgh.com', '', 0),
(16, 'user5', 'c93ccd78b2076528346216b3b2f701e6', '\0\0\0U\0\0\0?\0\0\0?\0\0\0?\0\0\0?', 'dgdgf1@dsfgh.com', '1-2345-67-897-88-5', 0),
(23, 'นายทดสอบ1', 'c93ccd78b2076528346216b3b2f701e6', '\0\0\0\02\0\0\"\0\0\0\0\0\0*\0\0-\0\0\Z\0\0\01', '55555@dsfgh.com', '5-5555-55-555-55-5', 0);

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
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uname` (`uname`),
  ADD UNIQUE KEY `uemail` (`uemail`),
  ADD KEY `ucardid` (`ucardid`);

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
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
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
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
