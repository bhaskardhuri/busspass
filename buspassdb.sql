-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2022 at 05:15 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buspassdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE IF NOT EXISTS `tbladmin` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `UserName` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Email` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Password` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'YBP college', 'admin', 1234567891, 'ybpsawantwadi@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '2020-04-14 06:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

DROP TABLE IF EXISTS `tblcategory`;
CREATE TABLE IF NOT EXISTS `tblcategory` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CategoryName`, `CreationDate`) VALUES
(8, 'AC Bus', '2021-07-04 14:27:53'),
(9, 'Non AC Bus', '2021-07-04 14:28:32'),
(10, 'Volvo Bus', '2021-07-04 14:28:47'),
(11, 'Delux Bus', '2021-07-04 14:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

DROP TABLE IF EXISTS `tblcontact`;
CREATE TABLE IF NOT EXISTS `tblcontact` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Email` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Message` mediumtext COLLATE utf8mb4_general_ci,
  `EnquiryDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsRead` int DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `Name`, `Email`, `Message`, `EnquiryDate`, `IsRead`) VALUES
(1, 'Babali Anil Shirodkar', 'shirodkarbabli@gmail.com', 'when will bus arrive please inform me', '2021-12-31 13:38:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

DROP TABLE IF EXISTS `tblpage`;
CREATE TABLE IF NOT EXISTS `tblpage` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `PageType` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PageTitle` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PageDescription` mediumtext COLLATE utf8mb4_general_ci,
  `Email` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`) VALUES
(1, 'aboutus', 'About us', '<font color=\"#747474\" face=\"Roboto, sans-serif, arial\"><span style=\"font-size: 13px;\">Online bus pass generation system is a web development for student to get bus passes through online. Before this implementation the manual process is used to do the process of issuing the bus pass to the students. The manual process requires man power and more time consuming. To avoid such difficulties, we implemented this system. the online system lets the customers check the availability of the bus ticket before they buy bus ticket. Hence, there is a need of reformation of the system with more advantages and flexibility. Bus pass web system to put it simply, means system can provides pass identification, cancellation, updating, etc. Using this website, we can check all details related Bus pass and instruction like how to update it, and also provide details of. This website keeps all information of all Bus pass..</b></span></font><br>', NULL, NULL),
(2, 'contactus', 'Contact Us', '               ybp polytechmic\r\ncharathe,Vazarwadi,Tal.Sawantwadi.', 'ybppoytechnic@gmail.com', 4654789799);

-- --------------------------------------------------------

--
-- Table structure for table `tblpass`
--

DROP TABLE IF EXISTS `tblpass`;
CREATE TABLE IF NOT EXISTS `tblpass` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `PassNumber` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `FullName` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ProfileImage` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ContactNumber` bigint DEFAULT NULL,
  `Email` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `DepartmentName` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ClassName` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `InstituteName` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `AdharCard` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Month` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PasscreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpass`
--

INSERT INTO `tblpass` (`ID`, `PassNumber`, `FullName`, `ProfileImage`, `ContactNumber`, `Email`, `DepartmentName`, `ClassName`, `Address`, `InstituteName`, `AdharCard`, `Month`, `PasscreationDate`) VALUES
(1, '376371809', 'Babali Shirodkar', '07e7eacf6bc5fe379ed7efb68e8fe7e91638862528.jpg', 8551879826, 'shirodkarbabli@gmail.com', 'Computer', 'TY', 'Dodamarg', 'ypb', '889089706789', 'december', '2021-12-07 07:35:28'),
(2, '612505994', 'Babali Shirodkar', '07e7eacf6bc5fe379ed7efb68e8fe7e91638970133.jpg', 9130692369, 'shirodkarbabli@gmail.com', 'Computer', 'TY', 'Dodamarg', 'Yashwantrao bhonsale Polytechnic,sawantwadi', '889089706789', 'december', '2021-12-08 13:28:53');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
