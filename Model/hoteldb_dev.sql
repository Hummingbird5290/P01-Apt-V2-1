-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2017 at 07:21 PM
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
(1, 8, 20, 1);

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
(8, '8', 1, 12, '2017-04-18 01:00:00', '50000', 0, '2017-04-18 22:40:48', 0, '2017-04-18 22:40:48', NULL, NULL);

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
(12, 'นาย', 'kimimaro1', 'นามทดสอบ', '', '', '(111) 111-1111', '', '', 'kimimaro', '2017-04-18 22:40:48', 'kimimaro', '2017-04-18 22:40:48', NULL, NULL, 1);

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
(1, '101', 1, NULL, NULL, 1, NULL),
(2, '202', 3, NULL, NULL, 4, NULL),
(3, '301', 11, NULL, NULL, 1, NULL),
(4, '401', 15, NULL, NULL, 1, NULL),
(5, '601', 17, NULL, NULL, 1, NULL),
(6, '9999', 17, NULL, NULL, 2, NULL),
(7, '909', 7, NULL, NULL, 2, NULL);

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
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `Book_Id` (`Book_Id`),
  ADD KEY `Status_Room` (`Status_Room`);

--
-- Indexes for table `roomstatus`
--
ALTER TABLE `roomstatus`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

--
-- Indexes for table `roomtype_pro`
--
ALTER TABLE `roomtype_pro`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `roomstatus`
--
ALTER TABLE `roomstatus`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `roomtype_pro`
--
ALTER TABLE `roomtype_pro`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
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
