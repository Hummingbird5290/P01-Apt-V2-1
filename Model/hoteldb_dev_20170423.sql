-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2017 at 12:11 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoteldb_dev`
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
-- Table structure for table `bill_electricity`
--

CREATE TABLE `bill_electricity` (
  `Id` bigint(20) NOT NULL,
  `Bill_Room_Id` bigint(20) NOT NULL COMMENT 'id_room',
  `Electricity_Unit` int(11) DEFAULT NULL COMMENT 'หน่วยค่าไฟเริ่ม/เดือน',
  `Electricity_Unit_End` int(11) DEFAULT NULL COMMENT 'หน่วยค่าไฟสุดท้าย/เดือน',
  `Electricity_Price` decimal(10,0) DEFAULT NULL COMMENT 'ค่าไฟ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bill_electricity`
--

INSERT INTO `bill_electricity` (`Id`, `Bill_Room_Id`, `Electricity_Unit`, `Electricity_Unit_End`, `Electricity_Price`) VALUES
(1, 1, 2000, 2065, '520'),
(2, 2, 5000, 5060, '480'),
(3, 3, 3203, 3694, '2946');

-- --------------------------------------------------------

--
-- Table structure for table `bill_forniture`
--

CREATE TABLE `bill_forniture` (
  `Id` bigint(20) NOT NULL,
  `Bill_Room_Id` bigint(20) NOT NULL COMMENT 'id_room',
  `Forniture_Lease` decimal(10,0) DEFAULT NULL COMMENT 'ค่าเช่าเฟอร์นิเจอร์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bill_forniture`
--

INSERT INTO `bill_forniture` (`Id`, `Bill_Room_Id`, `Forniture_Lease`) VALUES
(1, 1, '200'),
(2, 2, '200'),
(3, 3, '0');

-- --------------------------------------------------------

--
-- Table structure for table `bill_group`
--

CREATE TABLE `bill_group` (
  `Id` int(1) NOT NULL,
  `Bill_Type_Id` int(1) NOT NULL COMMENT 'รหัสประเภทบิล',
  `ฺBill_GroupDetail_Id` int(1) NOT NULL COMMENT 'หมายเลขรายละเอียด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bill_group`
--

INSERT INTO `bill_group` (`Id`, `Bill_Type_Id`, `ฺBill_GroupDetail_Id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 2, 7),
(9, 3, 1),
(10, 3, 2),
(11, 3, 3),
(12, 3, 4),
(13, 3, 5),
(14, 3, 6),
(15, 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `bill_groupdetail`
--

CREATE TABLE `bill_groupdetail` (
  `Id` bigint(20) NOT NULL,
  `Bill_GroupDetail_No` bigint(20) NOT NULL COMMENT 'Bill_GroupDetail_No',
  `Bill_Detail` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อประเภทบิล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bill_groupdetail`
--

INSERT INTO `bill_groupdetail` (`Id`, `Bill_GroupDetail_No`, `Bill_Detail`) VALUES
(1, 1, 'ค่าเช่าห้องพัก (ROOM LEASE)'),
(2, 2, 'ค่าเช่าเฟอร์นิเจอร์ (FURNITURE LEASE)'),
(3, 3, 'ค่าบริการ (SERVICE)'),
(4, 4, 'ค่าประปา (WATER CHARGE)'),
(5, 5, 'ค่าไฟฟ้า (ELECTRICITY CHARGE)'),
(6, 6, 'ค่าโทรศัพท์ (TELEPHONE CHARGE)'),
(7, 7, 'ค่ามัดจำล่วงหน้า'),
(8, 8, 'เงินค่าประกัน');

-- --------------------------------------------------------

--
-- Table structure for table `bill_other`
--

CREATE TABLE `bill_other` (
  `Id` bigint(20) NOT NULL,
  `Room_Id` bigint(20) NOT NULL COMMENT 'Room_Id',
  `Bill_No` int(11) NOT NULL COMMENT 'เลขที่บิล',
  `Detail` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'คำอธิบาย',
  `Price` decimal(10,0) DEFAULT NULL COMMENT 'ราคา',
  `Create_Date` datetime NOT NULL COMMENT 'วันที่บันทึก',
  `Delete_Date` datetime DEFAULT NULL,
  `Status_Bill` int(1) NOT NULL COMMENT 'สถานะบิล 0=ไม่ยืนยัน 1=ยืนยัน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bill_other`
--

INSERT INTO `bill_other` (`Id`, `Room_Id`, `Bill_No`, `Detail`, `Price`, `Create_Date`, `Delete_Date`, `Status_Bill`) VALUES
(1, 3, 1, 'ค่าจอดรถ', '200', '2017-04-22 12:59:39', NULL, 0),
(2, 2, 1, 'dgdgg45353', '5333', '2017-04-22 13:31:29', NULL, 0),
(3, 3, 1, 'teetete', '353533', '2017-04-22 13:31:51', NULL, 0),
(4, 2, 1, 'teete', '5366', '2017-04-22 13:32:37', NULL, 0),
(5, 4, 1, 'etete', '353335333', '2017-04-22 13:32:57', NULL, 0),
(6, 38, 1, 'ค่าปรับ', '200', '2017-04-23 16:51:23', NULL, 0),
(7, 38, 1, 'ค่าปรับ', '200', '2017-04-23 16:57:22', '2017-04-23 17:04:44', 0),
(8, 9, 1, 'ค่าที่จอดรถ', '250', '2017-04-23 16:58:02', NULL, 0),
(9, 38, 1, 'ค่าปรับ', '300', '2017-04-23 17:07:16', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill_phone`
--

CREATE TABLE `bill_phone` (
  `Id` bigint(20) NOT NULL,
  `Bill_Room_Id` bigint(20) NOT NULL COMMENT 'id_room',
  `Phone_Lease` decimal(10,0) DEFAULT NULL COMMENT 'ค่าโทรศัพท์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bill_phone`
--

INSERT INTO `bill_phone` (`Id`, `Bill_Room_Id`, `Phone_Lease`) VALUES
(1, 1, '150'),
(2, 2, '89'),
(3, 3, '0');

-- --------------------------------------------------------

--
-- Table structure for table `bill_priceroom`
--

CREATE TABLE `bill_priceroom` (
  `Id` bigint(20) NOT NULL,
  `Bill_Room_Id` bigint(20) NOT NULL COMMENT 'id_room',
  `Priceroom` decimal(10,0) DEFAULT NULL COMMENT 'ค่าห้อง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bill_priceroom`
--

INSERT INTO `bill_priceroom` (`Id`, `Bill_Room_Id`, `Priceroom`) VALUES
(1, 1, '4500'),
(2, 2, '5000'),
(3, 3, '5500');

-- --------------------------------------------------------

--
-- Table structure for table `bill_room`
--

CREATE TABLE `bill_room` (
  `Id` bigint(20) NOT NULL,
  `Room_Id` bigint(20) NOT NULL COMMENT 'Room_Id',
  `Bill_No` int(11) NOT NULL COMMENT 'เลขที่บิล',
  `Br_Status` int(1) NOT NULL COMMENT 'สถานะการจ่ายค่าห้อง',
  `Create_Date` datetime NOT NULL,
  `Create_By` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Total_Amount` decimal(10,0) NOT NULL COMMENT 'รวมเงิน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bill_room`
--

INSERT INTO `bill_room` (`Id`, `Room_Id`, `Bill_No`, `Br_Status`, `Create_Date`, `Create_By`, `Total_Amount`) VALUES
(1, 1, 1, 8, '2017-04-16 15:44:29', '0000-00-00 00:00:00', '5970'),
(2, 4, 2, 5, '2017-04-17 15:28:33', '0000-00-00 00:00:00', '6369'),
(3, 38, 3, 7, '2017-04-23 15:35:55', '11', '8581');

-- --------------------------------------------------------

--
-- Table structure for table `bill_service`
--

CREATE TABLE `bill_service` (
  `Id` bigint(20) NOT NULL,
  `Bill_Room_Id` bigint(20) NOT NULL COMMENT 'id_room',
  `Service_Lease` decimal(10,0) DEFAULT NULL COMMENT 'ค่าบริการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bill_service`
--

INSERT INTO `bill_service` (`Id`, `Bill_Room_Id`, `Service_Lease`) VALUES
(1, 1, '200'),
(2, 2, '0'),
(3, 3, '0');

-- --------------------------------------------------------

--
-- Table structure for table `bill_type`
--

CREATE TABLE `bill_type` (
  `Id` bigint(20) NOT NULL,
  `Bill_No` int(1) NOT NULL COMMENT 'สถานะบิล',
  `Bill_Type` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อสถานะบิล',
  `Bill_TypeDetail` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ประเภทบิล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bill_type`
--

INSERT INTO `bill_type` (`Id`, `Bill_No`, `Bill_Type`, `Bill_TypeDetail`) VALUES
(1, 1, 'ใบแจ้งหนี้/INVOICE', 'ใบแจ้งหนี้'),
(2, 2, 'ใบรับเงิน/RECEIPT', 'บิลค่ามัดจำล่วงหน้า'),
(3, 3, 'ใบรับเงิน/RECEIPT', 'บิลใบรับเงิน'),
(4, 4, 'ใบรับเงิน/RECEIPT', 'บิลอื่นๆ');

-- --------------------------------------------------------

--
-- Table structure for table `bill_water`
--

CREATE TABLE `bill_water` (
  `Id` bigint(20) NOT NULL,
  `Bill_Room_Id` bigint(20) NOT NULL COMMENT 'id_room',
  `Water_Unit` int(11) DEFAULT NULL COMMENT 'หน่วยค่าน้ำเริ่ม/เดือน',
  `Water_Unit_End` int(11) DEFAULT NULL COMMENT 'หน่วยค่าน้ำสิ้นสุด/เดือน',
  `Water_Price` decimal(10,0) DEFAULT NULL COMMENT 'ค่าน้ำ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bill_water`
--

INSERT INTO `bill_water` (`Id`, `Bill_Room_Id`, `Water_Unit`, `Water_Unit_End`, `Water_Price`) VALUES
(1, 1, 2000, 2020, '400'),
(2, 2, 2000, 2030, '600'),
(3, 3, 1794, 1803, '135');

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
  `Book_Date` datetime DEFAULT NULL COMMENT 'วันที่เข้าอยู่',
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

INSERT INTO `booking` (`Id`, `Room_Id`, `Book_No`, `Title`, `Name`, `Last_Name`, `CardId`, `Email`, `Tel`, `Tel2`, `Address`, `Book_Date`, `Create_By`, `Create_Date`, `Update_By`, `Update_Date`, `Delete_By`, `Delete_Date`, `Book_Amount`, `Status_Book`) VALUES
(1, 1, 1, 'นาย', 'ทดสอบ', 'นามทดสอบ', '', '', '(111) 111-1111', '', '', '2017-04-15 01:00:00', 'kimimaro', '2017-04-15 23:53:17', 'kimimaro', '2017-04-15 23:53:17', NULL, NULL, '12000', 1),
(4, 2, 2, 'นาย', 'kimimaro1', 'นามทดสอบ', '', '', '(111) 111-1111', '', '', '2017-04-16 01:00:00', 'kimimaro', '2017-04-16 00:19:51', 'kimimaro', '2017-04-16 00:19:51', NULL, NULL, '50000', 1),
(7, 1, 4, 'นาย', 'kimimaro1', 'นามทดสอบ', '', '', '(111) 111-1111', '', '', '2017-04-18 01:00:00', 'kimimaro', '2017-04-18 22:15:04', 'kimimaro', '2017-04-18 22:15:04', NULL, NULL, '50000', 0),
(6, 3, 3, 'นาย', 'kimimaro1', '23', '', '', '(111) 111-1111', '', '', '2017-04-16 01:00:00', 'kimimaro', '2017-04-16 00:51:00', 'kimimaro', '2017-04-16 00:51:00', NULL, NULL, '20000', 1),
(8, 1, 5, 'นาย', 'kimimaro1', 'นามทดสอบ', '', '', '(111) 111-1111', '', '', '2017-04-18 01:00:00', 'kimimaro', '2017-04-18 22:15:56', 'kimimaro', '2017-04-18 22:15:56', NULL, NULL, '50000', 0),
(9, 1, 6, 'นาย', 'kimimaro1', 'นามทดสอบ', '', '', '(111) 111-1111', '', '', '2017-04-18 01:00:00', 'kimimaro', '2017-04-18 22:16:01', 'kimimaro', '2017-04-18 22:16:01', NULL, NULL, '50000', 1);

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
(1, 6, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `Id` int(11) NOT NULL,
  `ContractNo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RoomId` int(11) NOT NULL,
  `Customer_id` bigint(20) NOT NULL,
  `Contract_Date` datetime DEFAULT NULL COMMENT 'วันที่เริ่มสัญญา',
  `Book_Amount` decimal(10,0) NOT NULL COMMENT 'ค่ามัดจำ',
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

INSERT INTO `contract` (`Id`, `ContractNo`, `RoomId`, `Customer_id`, `Contract_Date`, `Book_Amount`, `Create_By`, `Create_Date`, `Update_By`, `Update_Date`, `Delete_By`, `Delete_Date`) VALUES
(1, '1', 6, 1, '2017-04-22 01:00:00', '50000', 0, '2017-04-15 18:01:35', 0, '2017-04-15 18:01:35', NULL, NULL),
(2, '2', 2, 2, '2017-04-01 01:00:00', '500000', 0, '2017-04-15 18:10:58', 0, '2017-04-15 18:10:58', NULL, NULL),
(5, '5', 4, 9, '2017-04-16 01:00:00', '50000', 0, '2017-04-16 02:26:19', 0, '2017-04-16 02:26:19', NULL, NULL),
(6, '6', 5, 10, '2017-04-16 01:00:00', '50000', 0, '2017-04-16 14:30:51', 0, '2017-04-16 14:30:51', NULL, NULL),
(7, '7', 3, 11, '2017-04-16 01:00:00', '20000', 0, '2017-04-16 15:10:33', 0, '2017-04-16 15:10:33', NULL, NULL),
(8, '8', 1, 12, '2017-04-18 01:00:00', '50000', 0, '2017-04-18 22:40:48', 0, '2017-04-18 22:40:48', NULL, NULL),
(9, '9', 81, 13, '2017-04-23 01:00:00', '30000', 0, '2017-04-23 15:26:10', 0, '2017-04-23 15:26:10', NULL, NULL),
(10, '10', 38, 14, '2017-04-23 01:00:00', '12000', 0, '2017-04-23 15:30:55', 0, '2017-04-23 15:30:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Id` bigint(20) NOT NULL,
  `Title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Last_Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CardId` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Tel2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Create_By` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Create_Date` datetime NOT NULL,
  `Update_By` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Update_Date` datetime NOT NULL,
  `Delete_By` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Delete_Date` datetime DEFAULT NULL,
  `Room_Id` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Id`, `Title`, `Name`, `Last_Name`, `CardId`, `Email`, `Tel`, `Tel2`, `Address`, `Create_By`, `Create_Date`, `Update_By`, `Update_Date`, `Delete_By`, `Delete_Date`, `Room_Id`) VALUES
(1, 'นาย', 'kimimaro1', 'นามทดสอบ', '', '', '(111) 111-1111', '', '', 'kimimaro', '2017-04-15 18:01:35', 'kimimaro', '2017-04-15 18:01:35', NULL, NULL, 6),
(2, 'นาย', 'ทดสอบ', 'นามทดสอบ', '5-5555-55-555-55-5', '', '(888) 888-8888', '', '', 'kimimaro', '2017-04-15 18:10:58', 'kimimaro', '2017-04-15 18:10:58', NULL, NULL, 2),
(3, 'นาย', 'ทดสอบ', 'นามทดสอบ', '', '', '(111) 111-1111', '', '', 'kimimaro', '2017-04-16 00:00:51', 'kimimaro', '2017-04-16 00:00:51', NULL, NULL, 1),
(4, 'นาย', 'kimimaro1', 'นามทดสอบ', '', '', '(111) 111-1111', '', '', 'kimimaro', '2017-04-16 00:41:46', 'kimimaro', '2017-04-16 00:41:46', NULL, NULL, 2),
(5, '', '', '', '', '', '', '', '', 'kimimaro', '2017-04-16 01:47:53', 'kimimaro', '2017-04-16 01:47:53', NULL, NULL, 0),
(6, 'นาย', 'kimimaro1', 'นามทดสอบ', '', '', '(111) 111-1111', '', '', 'kimimaro', '2017-04-16 02:15:39', 'kimimaro', '2017-04-16 02:15:39', NULL, NULL, 4),
(7, 'นาย', 'kimimaro1', 'นามทดสอบ', '', '', '(111) 111-1111', '', '', 'kimimaro', '2017-04-16 02:19:09', 'kimimaro', '2017-04-16 02:19:09', NULL, NULL, 4),
(8, '23', 'kimimaro1', '23', '', '', '(111) 111-11__', '', '', 'kimimaro', '2017-04-16 02:23:56', 'kimimaro', '2017-04-16 02:23:56', NULL, NULL, 4),
(9, '23', 'kimimaro1', '23', '', '', '(111) 111-11__', '', '', 'kimimaro', '2017-04-16 02:26:19', 'kimimaro', '2017-04-16 02:26:19', NULL, NULL, 4),
(10, 'นาย', 'kimimaro1', 'นามทดสอบ', '', '', '(111) 111-1111', '', '', 'kimimaro', '2017-04-16 14:30:51', 'kimimaro', '2017-04-16 14:30:51', NULL, NULL, 5),
(11, 'นาย', 'kimimaro1', '23', '', '', '(111) 111-1111', '', '', 'kimimaro', '2017-04-16 15:10:33', 'kimimaro', '2017-04-16 15:10:33', NULL, NULL, 3),
(12, 'นาย', 'kimimaro1', 'นามทดสอบ', '', '', '(111) 111-1111', '', '', 'kimimaro', '2017-04-18 22:40:48', 'kimimaro', '2017-04-18 22:40:48', NULL, NULL, 1),
(13, 'นาง', 'ดวงเด่น', 'มาลาทอง', '', '', '(099) 120-2444', '', '', 'admin', '2017-04-23 15:26:10', 'admin', '2017-04-23 15:26:10', NULL, NULL, 81),
(14, 'mr.', 'Hsu ', 'Kun-Liang', '', '', '(099) 999-9999', '', '', 'admin', '2017-04-23 15:30:55', 'admin', '2017-04-23 15:30:55', NULL, NULL, 38);

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
(9, '301', 6, NULL, NULL, 2, NULL),
(10, '303', 6, NULL, NULL, 2, NULL),
(11, '304', 6, NULL, NULL, 2, NULL),
(13, '305', 6, NULL, NULL, 2, NULL),
(14, '306', 6, NULL, NULL, 2, NULL),
(15, '307', 6, NULL, NULL, 2, NULL),
(16, '308', 6, NULL, NULL, 2, NULL),
(17, '308', 6, NULL, NULL, 2, NULL),
(18, '309', 6, NULL, NULL, 2, NULL),
(19, '310', 6, NULL, NULL, 2, NULL),
(21, '311', 6, NULL, NULL, 2, NULL),
(22, '312', 6, NULL, NULL, 2, NULL),
(23, '401', 6, NULL, NULL, 2, NULL),
(24, '402', 5, NULL, NULL, 2, NULL),
(25, '403', 6, NULL, NULL, 2, NULL),
(26, '404', 5, NULL, NULL, 2, NULL),
(27, '405', 6, NULL, NULL, 2, NULL),
(28, '406', 6, NULL, NULL, 2, NULL),
(29, '407', 6, NULL, NULL, 2, NULL),
(30, '408', 6, NULL, NULL, 2, NULL),
(31, '409', 6, NULL, NULL, 2, NULL),
(32, '410', 6, NULL, NULL, 2, NULL),
(33, '411', 6, NULL, NULL, 2, NULL),
(34, '412', 5, NULL, NULL, 2, NULL),
(35, '501', 6, NULL, NULL, 2, NULL),
(36, '502', 6, NULL, NULL, 2, NULL),
(37, '503', 5, NULL, NULL, 2, NULL),
(38, '504', 6, NULL, NULL, 4, NULL),
(39, '505', 6, NULL, NULL, 2, NULL),
(40, '506', 6, NULL, NULL, 2, NULL),
(41, '507', 6, NULL, NULL, 2, NULL),
(42, '508', 6, NULL, NULL, 2, NULL),
(43, '509', 6, NULL, NULL, 2, NULL),
(44, '510', 6, NULL, NULL, 2, NULL),
(45, '511', 6, NULL, NULL, 2, NULL),
(46, '512', 6, NULL, NULL, 2, NULL),
(47, '601', 16, NULL, NULL, 2, NULL),
(48, '602', 17, NULL, NULL, 2, NULL),
(49, '603', 16, NULL, NULL, 2, NULL),
(50, '604', 17, NULL, NULL, 2, NULL),
(51, '605', 16, NULL, NULL, 2, NULL),
(52, '606', 16, NULL, NULL, 2, NULL),
(53, '701', 10, NULL, NULL, 2, NULL),
(54, '702', 10, NULL, NULL, 2, NULL),
(55, '703', 10, NULL, NULL, 2, NULL),
(56, '704', 10, NULL, NULL, 2, NULL),
(57, '705', 8, NULL, NULL, 2, NULL),
(58, '706', 10, NULL, NULL, 2, NULL),
(59, '707', 8, NULL, NULL, 2, NULL),
(60, '708', 9, NULL, NULL, 2, NULL),
(61, '709', 9, NULL, NULL, 2, NULL),
(62, '710', 9, NULL, NULL, 2, NULL),
(63, '711', 9, NULL, NULL, 2, NULL),
(64, '712', 9, NULL, NULL, 2, NULL),
(65, '801', 8, NULL, NULL, 2, NULL),
(66, '802', 10, NULL, NULL, 2, NULL),
(67, '804', 9, NULL, NULL, 2, NULL),
(68, '805', 8, NULL, NULL, 2, NULL),
(69, '806', 9, NULL, NULL, 2, NULL),
(70, '807', 9, NULL, NULL, 2, NULL),
(71, '808', 8, NULL, NULL, 2, NULL),
(72, '809', 9, NULL, NULL, 2, NULL),
(73, '810', 7, NULL, NULL, 2, NULL),
(74, '811', 9, NULL, NULL, 2, NULL),
(75, '812', 9, NULL, NULL, 2, NULL),
(76, '901', 11, NULL, NULL, 2, NULL),
(77, '902', 12, NULL, NULL, 2, NULL),
(78, '903', 11, NULL, NULL, 2, NULL),
(79, '904', 12, NULL, NULL, 2, NULL),
(80, '905', 12, NULL, NULL, 2, NULL),
(81, '906', 12, NULL, NULL, 1, NULL),
(82, '1001', 11, NULL, NULL, 2, NULL),
(83, '1002', 11, NULL, NULL, 2, NULL),
(84, '1003', 12, NULL, NULL, 2, NULL),
(85, '1004', 12, NULL, NULL, 2, NULL),
(86, '1005', 12, NULL, NULL, 2, NULL),
(87, '1006', 12, NULL, NULL, 2, NULL),
(88, '1101', 12, NULL, NULL, 2, NULL),
(89, '1102', 12, NULL, NULL, 2, NULL),
(90, '1103', 13, NULL, NULL, 2, NULL),
(91, '1104', 13, NULL, NULL, 2, NULL),
(92, '1105', 12, NULL, NULL, 2, NULL),
(93, '1106', 12, NULL, NULL, 2, NULL),
(94, '1201', 14, NULL, NULL, 2, NULL),
(95, '1202', 14, NULL, NULL, 2, NULL),
(96, '1203', 14, NULL, NULL, 2, NULL),
(97, '1204', 14, NULL, NULL, 2, NULL),
(98, '1205', 14, NULL, NULL, 2, NULL),
(99, '1206', 14, NULL, NULL, 2, NULL);

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
(1, 1, 'ต่อสัญญา', 1, 3),
(2, 2, 'ว่าง', 1, 1),
(3, 3, 'จอง', 1, 4),
(4, 4, 'แจ้งออก', 1, 2),
(5, 5, 'รอยืนยันพิมพ์ใบแจ้งหนี้', 1, 5),
(6, 6, 'พิมพ์ใบแจ้งหนี้', 1, 6),
(7, 7, 'ยังไม่ชำระเงิน', 1, 7),
(8, 8, 'ชำระเงินแล้ว', 1, 8),
(9, 9, 'พิมพ์ใบเสร็จแล้ว', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `roomstatus_20170423`
--

CREATE TABLE `roomstatus_20170423` (
  `Id` int(11) NOT NULL COMMENT 'รหัส',
  `RoomStatusId` int(11) NOT NULL COMMENT 'รหัสสถานะห้อง',
  `RoomStatusDetail` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'สถานะห้อง',
  `Flag` tinyint(1) NOT NULL,
  `Sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `roomstatus_20170423`
--

INSERT INTO `roomstatus_20170423` (`Id`, `RoomStatusId`, `RoomStatusDetail`, `Flag`, `Sort`) VALUES
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
(1, 'ปกติ', 'ขนาด 4*6.5', 6000, 1),
(2, 'ปกติ(1)', 'ขนาด 4*6.5', 7000, 1),
(3, 'พิเศษ 4+6.5', 'แอร์', 5500, 1),
(4, 'พิเศษ 4+6.5', 'แอร์', 6000, 1),
(5, 'พิเศษ 4+6.5', 'แอร์', 6000, 1),
(6, 'ธรรมดา', 'สัญญา 1ปี', 5500, 1),
(7, 'ธรรมดา', 'สัญญา 6 เดือน', 6000, 1),
(8, 'ธรรมดา F 7', 'ธรรมดา 6 เดือน', 7000, 1),
(9, 'ธรรมดา F 7', 'สัญญา 1 ปี', 6500, 1),
(10, 'ธรรมดา F 7 โปรด้านหลัง', 'สัญญา 1 ปี', 6000, 1),
(11, 'สูทธรรมดา F 10', 'สัญญา 1ปี พิเศษ', 11500, 1),
(12, 'ธรรมดา F 10', 'สัญญา 1 ปี', 12000, 1),
(13, 'สูทธรรมดา F 11', 'ปรกติ 1 ปี', 12000, 1),
(14, 'สูทธรรมดา F 12', 'สัญญา 1 ปี', 13500, 1),
(15, 'สูทธรรมดา F 12', 'เดือนที่ 13 ลด 50 เปอร์เซ็น', 6750, 1),
(16, 'สููท F 6', 'สัญญา 1 ปี', 10000, 1),
(17, 'สูทธรรมดา F 6', 'สูทพิเศษ F6', 11000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roomtype_20170422`
--

CREATE TABLE `roomtype_20170422` (
  `Id` int(11) NOT NULL,
  `RoomType` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสห้อง',
  `RoomDetail` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ประเภทห้อง',
  `Room_Rates` float NOT NULL COMMENT 'ค่าห้อง',
  `flag` tinyint(1) NOT NULL COMMENT 'สถานะของประเภทห้อง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `roomtype_20170422`
--

INSERT INTO `roomtype_20170422` (`Id`, `RoomType`, `RoomDetail`, `Room_Rates`, `flag`) VALUES
(1, 'test', 'test', 0, 1),
(2, 'ปกติ(1)', 'ขนาด 4*6.5', 7000, 1),
(3, 'พิเศษ 4+6.5', 'แอร์', 5500, 1),
(4, 'พิเศษ 4+6.5', 'แอร์', 6000, 1),
(5, 'พิเศษ 4+6.5', 'แอร์', 6000, 1),
(6, 'ธรรมดา', 'สัญญา 1ปี', 5500, 1),
(7, 'ธรรมดา', 'สัญญา 6 เดือน', 6000, 1),
(8, 'ธรรมดา F 7', 'ธรรมดา 6 เดือน', 7000, 1),
(9, 'ธรรมดา F 7', 'สัญญา 1 ปี', 6500, 1),
(10, 'ธรรมดา F 7 โปรด้านหลัง', 'สัญญา 1 ปี', 6000, 1),
(11, 'สูทธรรมดา F 10', 'สัญญา 1ปี พิเศษ', 11500, 1),
(12, 'ธรรมดา F 10', 'สัญญา 1 ปี', 12000, 1),
(13, 'สูทธรรมดา F 11', 'ปรกติ 1 ปี', 12000, 1),
(14, 'สูทธรรมดา F 12', 'สัญญา 1 ปี', 13500, 1),
(15, 'สูทธรรมดา F 12', 'เดือนที่ 13 ลด 50 เปอร์เซ็น', 6750, 1),
(16, 'สููท F 6', 'สัญญา 1 ปี', 10000, 1),
(17, 'สูทธรรมดา F 6', 'สูทพิเศษ F6', 11000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roomtype_pro`
--

CREATE TABLE `roomtype_pro` (
  `Id` int(11) NOT NULL,
  `RoomType` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสห้อง',
  `RoomDetail` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ประเภทห้อง',
  `Room_Rates` float NOT NULL COMMENT 'ค่าห้อง',
  `flag` tinyint(1) NOT NULL COMMENT 'สถานะของประเภทห้อง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `roomtype_pro`
--

INSERT INTO `roomtype_pro` (`Id`, `RoomType`, `RoomDetail`, `Room_Rates`, `flag`) VALUES
(1, 'ปกติ', 'ขนาด 4*6.5', 6000, 1),
(2, 'ปกติ(1)', 'ขนาด 4*6.5', 7000, 1),
(3, 'พิเศษ 4+6.5', 'แอร์', 5500, 1),
(4, 'พิเศษ 4+6.5', 'แอร์', 6000, 1),
(5, 'พิเศษ 4+6.5', 'แอร์', 6000, 1),
(6, 'ธรรมดา', 'สัญญา 1ปี', 5500, 1),
(7, 'ธรรมดา', 'สัญญา 6 เดือน', 6000, 1),
(8, 'ธรรมดา F 7', 'ธรรมดา 6 เดือน', 7000, 1),
(9, 'ธรรมดา F 7', 'สัญญา 1 ปี', 6500, 1),
(10, 'ธรรมดา F 7 โปรด้านหลัง', 'สัญญา 1 ปี', 6000, 1),
(11, 'สูทธรรมดา F 10', 'สัญญา 1ปี พิเศษ', 11500, 1),
(12, 'ธรรมดา F 10', 'สัญญา 1 ปี', 12000, 1),
(13, 'สูทธรรมดา F 11', 'ปรกติ 1 ปี', 12000, 1),
(14, 'สูทธรรมดา F 12', 'สัญญา 1 ปี', 13500, 1),
(15, 'สูทธรรมดา F 12', 'เดือนที่ 13 ลด 50 เปอร์เซ็น', 6750, 1),
(16, 'สููท F 6', 'สัญญา 1 ปี', 10000, 1),
(17, 'สูทธรรมดา F 6', 'สูทพิเศษ F6', 11000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_20170422`
--

CREATE TABLE `room_20170422` (
  `Id` bigint(20) NOT NULL,
  `Room_No` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เลขที่ห้อง',
  `RoomType_Id` int(11) NOT NULL COMMENT 'รหัสประเภทห้อง',
  `Start_date` datetime DEFAULT NULL COMMENT 'วันที่เข้าอยู่',
  `End_Date` datetime DEFAULT NULL COMMENT 'วันที่ออก',
  `Status_Room` int(11) DEFAULT NULL COMMENT 'สถานะของห้อง',
  `Book_Id` bigint(20) DEFAULT NULL COMMENT 'Id การจอง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `room_20170422`
--

INSERT INTO `room_20170422` (`Id`, `Room_No`, `RoomType_Id`, `Start_date`, `End_Date`, `Status_Room`, `Book_Id`) VALUES
(1, '101', 1, NULL, NULL, 1, NULL),
(2, '202', 3, NULL, NULL, 4, NULL),
(3, '301', 11, NULL, NULL, 1, NULL),
(4, '401', 15, NULL, NULL, 1, NULL),
(5, '601', 17, NULL, NULL, 1, NULL),
(6, '9999', 17, NULL, NULL, 2, NULL),
(7, '909', 7, NULL, NULL, 2, NULL);

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
-- Indexes for table `bill_electricity`
--
ALTER TABLE `bill_electricity`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `Bill_Room_Id` (`Bill_Room_Id`);

--
-- Indexes for table `bill_forniture`
--
ALTER TABLE `bill_forniture`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `Bill_Room_Id` (`Bill_Room_Id`);

--
-- Indexes for table `bill_group`
--
ALTER TABLE `bill_group`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `bill_groupdetail`
--
ALTER TABLE `bill_groupdetail`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Bill_GroupDetail_No` (`Bill_GroupDetail_No`);

--
-- Indexes for table `bill_other`
--
ALTER TABLE `bill_other`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `Room_Id` (`Room_Id`);

--
-- Indexes for table `bill_phone`
--
ALTER TABLE `bill_phone`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `Bill_Room_Id` (`Bill_Room_Id`);

--
-- Indexes for table `bill_priceroom`
--
ALTER TABLE `bill_priceroom`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Bill_Room_Id` (`Bill_Room_Id`),
  ADD KEY `Id` (`Id`);

--
-- Indexes for table `bill_room`
--
ALTER TABLE `bill_room`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Room_Id` (`Room_Id`),
  ADD KEY `Id` (`Id`);

--
-- Indexes for table `bill_service`
--
ALTER TABLE `bill_service`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `Bill_Room_Id` (`Bill_Room_Id`);

--
-- Indexes for table `bill_type`
--
ALTER TABLE `bill_type`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

--
-- Indexes for table `bill_water`
--
ALTER TABLE `bill_water`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `Bill_Room_Id` (`Bill_Room_Id`);

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
  ADD KEY `Id` (`Id`),
  ADD KEY `ContractNo` (`ContractNo`),
  ADD KEY `RoomId` (`RoomId`),
  ADD KEY `Customer_id` (`Customer_id`);

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
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

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
-- Indexes for table `roomstatus_20170423`
--
ALTER TABLE `roomstatus_20170423`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `roomtype_20170422`
--
ALTER TABLE `roomtype_20170422`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

--
-- Indexes for table `roomtype_pro`
--
ALTER TABLE `roomtype_pro`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

--
-- Indexes for table `room_20170422`
--
ALTER TABLE `room_20170422`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `Book_Id` (`Book_Id`),
  ADD KEY `Status_Room` (`Status_Room`);

--
-- Indexes for table `room_bill`
--
ALTER TABLE `room_bill`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Room_Id` (`Room_Id`),
  ADD KEY `Id` (`Id`);

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
-- AUTO_INCREMENT for table `bill_electricity`
--
ALTER TABLE `bill_electricity`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bill_forniture`
--
ALTER TABLE `bill_forniture`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bill_group`
--
ALTER TABLE `bill_group`
  MODIFY `Id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `bill_groupdetail`
--
ALTER TABLE `bill_groupdetail`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `bill_other`
--
ALTER TABLE `bill_other`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `bill_phone`
--
ALTER TABLE `bill_phone`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bill_priceroom`
--
ALTER TABLE `bill_priceroom`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bill_room`
--
ALTER TABLE `bill_room`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bill_service`
--
ALTER TABLE `bill_service`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bill_type`
--
ALTER TABLE `bill_type`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bill_water`
--
ALTER TABLE `bill_water`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `configobj`
--
ALTER TABLE `configobj`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `roomstatus`
--
ALTER TABLE `roomstatus`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `roomstatus_20170423`
--
ALTER TABLE `roomstatus_20170423`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `roomtype_20170422`
--
ALTER TABLE `roomtype_20170422`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `roomtype_pro`
--
ALTER TABLE `roomtype_pro`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `room_20170422`
--
ALTER TABLE `room_20170422`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
