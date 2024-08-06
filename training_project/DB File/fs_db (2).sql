-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 04, 2024 at 08:30 PM
-- Server version: 8.3.0
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
CREATE TABLE IF NOT EXISTS `application` (
  `ApplicationID` int NOT NULL AUTO_INCREMENT,
  `UserID` int DEFAULT NULL,
  `TrainingOrganizationID` int NOT NULL,
  `ApplicationDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `Status` tinyint(1) DEFAULT '0',
  `ApplicationNotes` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`ApplicationID`),
  KEY `UserID` (`UserID`),
  KEY `TrainingOrganizationID` (`TrainingOrganizationID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`ApplicationID`, `UserID`, `TrainingOrganizationID`, `ApplicationDate`, `Status`, `ApplicationNotes`) VALUES
(1, 2, 2, '2024-08-02 17:13:49', 2, NULL),
(2, 5, 2, '2024-08-02 20:44:40', 1, NULL),
(3, 5, 3, '2024-08-02 20:44:49', 1, NULL),
(4, 6, 2, '2024-08-02 20:48:42', 1, NULL),
(5, 9, 2, '2024-08-03 13:41:34', 1, NULL),
(6, 9, 3, '2024-08-03 14:03:13', 1, NULL),
(7, 9, 5, '2024-08-03 14:05:00', 1, NULL),
(8, 9, 6, '2024-08-03 14:05:00', 1, NULL),
(9, 10, 5, '2024-08-03 14:10:52', 1, NULL),
(10, 10, 6, '2024-08-03 14:11:17', 1, NULL),
(11, 2, 5, '2024-08-04 09:03:47', 1, NULL),
(12, 2, 10, '2024-08-04 10:46:15', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

DROP TABLE IF EXISTS `evaluation`;
CREATE TABLE IF NOT EXISTS `evaluation` (
  `EvaluationID` int NOT NULL AUTO_INCREMENT,
  `UserID` int DEFAULT NULL,
  `TrainingProgramID` int DEFAULT NULL,
  `Rating` int DEFAULT NULL,
  `Feedback` text COLLATE utf8mb4_unicode_ci,
  `EvaluationDate` date DEFAULT NULL,
  `Rating2` int DEFAULT '0',
  `Rating3` int DEFAULT '0',
  `Rating4` int DEFAULT '0',
  `Rating5` int DEFAULT '0',
  `Rating6` int DEFAULT '0',
  PRIMARY KEY (`EvaluationID`),
  KEY `UserID` (`UserID`),
  KEY `TrainingProgramID` (`TrainingProgramID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`EvaluationID`, `UserID`, `TrainingProgramID`, `Rating`, `Feedback`, `EvaluationDate`, `Rating2`, `Rating3`, `Rating4`, `Rating5`, `Rating6`) VALUES
(1, 9, 2, NULL, 'dddd', NULL, 0, 0, 0, 0, 0),
(2, 9, 2, 5, 'ddddddddddddddddddd', NULL, 0, 0, 0, 0, 0),
(3, 9, 2, 5, 'جج', NULL, 0, 0, 0, 0, 0),
(4, 9, 2, 5, 'dddd', NULL, 0, 0, 0, 0, 0),
(5, 9, 2, 5, 'dddd', NULL, 0, 0, 0, 0, 0),
(6, 10, 6, 4, '88', NULL, 0, 0, 0, 0, 0),
(7, 2, 5, 4, 'dddddddd', NULL, 4, 5, 3, 2, 2),
(8, 2, 5, 4, 'great', NULL, 4, 3, 5, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci,
  `date_` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `description`, `date_`, `user_name`) VALUES
(1, 'تمت إضافة تقييم جديد', '2024-08-03 13:52:53', NULL),
(2, 'تمت إضافة تقييم جديد', '2024-08-03 13:57:54', 'Kay Sweet'),
(3, '  تم تعديل طلب إنضمام لجهة   ', '2024-08-03 14:03:05', 'Admin'),
(4, '  تم تعديل طلب إنضمام لجهة   ', '2024-08-03 14:03:07', 'Admin'),
(5, 'تمت تسجيل طلب إنضمام لجهة   ', '2024-08-03 14:03:13', 'Kay Sweet'),
(6, '  تم تعديل طلب إنضمام لجهة   ', '2024-08-03 14:03:21', 'Admin'),
(7, 'تمت حذف جهة  ', '2024-08-03 14:03:23', 'Admin'),
(8, 'تم تسجيل طلب إضافة جهة جديدة', '2024-08-03 14:03:29', 'Admin'),
(9, 'تم تسجيل طلب إضافة جهة جديدة', '2024-08-03 14:04:39', 'Admin'),
(10, 'تمت حذف جهة  ', '2024-08-03 14:04:45', 'Admin'),
(11, 'تمت تسجيل طلب إنضمام لجهة   ', '2024-08-03 14:05:00', 'Kay Sweet'),
(12, 'تمت تسجيل طلب إنضمام لجهة   ', '2024-08-03 14:05:00', 'Kay Sweet'),
(13, '  تم تعديل طلب إنضمام لجهة   ', '2024-08-03 14:05:06', 'Admin'),
(14, '  تم تعديل طلب إنضمام لجهة   ', '2024-08-03 14:05:08', 'Admin'),
(15, 'تمت  رفع تقرير جديد  ', '2024-08-03 14:05:22', 'Kay Sweet'),
(16, 'تمت تسجيل درجة   ', '2024-08-03 14:05:34', 'Admin'),
(17, 'تمت تسجيل حساب طالب  جديد', '2024-08-03 14:06:25', 'Illiana Meadows'),
(18, 'تمت تسجيل طلب إنضمام لجهة   ', '2024-08-03 14:10:52', 'Illiana Meadows'),
(19, 'تمت تسجيل طلب إنضمام لجهة   ', '2024-08-03 14:11:17', 'Illiana Meadows'),
(20, '  تم تعديل طلب إنضمام لجهة   ', '2024-08-03 14:11:59', 'Admin'),
(21, '  تم تعديل طلب إنضمام لجهة   ', '2024-08-03 14:12:02', 'Admin'),
(22, '  تم تعديل طلب إنضمام لجهة   ', '2024-08-03 14:12:03', 'Admin'),
(23, 'تمت إضافة تقييم جديد', '2024-08-03 14:12:12', 'Illiana Meadows'),
(24, 'تمت  رفع تقرير جديد  ', '2024-08-03 14:12:22', 'Illiana Meadows'),
(25, 'تمت تسجيل درجة   ', '2024-08-03 14:12:36', 'Admin'),
(26, 'تمت تسجيل طلب إنضمام لجهة   ', '2024-08-04 09:03:47', 'Plato Riddle'),
(27, 'تمت إضافة تقييم جديد', '2024-08-04 09:06:20', 'Plato Riddle'),
(28, 'تمت  رفع تدكرة دعم فني   ', '2024-08-04 09:24:10', 'Plato Riddle'),
(29, 'تمت  رفع تدكرة دعم فني   ', '2024-08-04 09:24:55', 'Plato Riddle'),
(30, 'تم الرد على تذكرة    ', '2024-08-04 09:25:01', 'Admin'),
(31, 'تم الرد على تذكرة    ', '2024-08-04 09:25:02', 'Admin'),
(32, 'تم تسجيل طلب إضافة جهة جديدة', '2024-08-04 10:20:48', 'Admin'),
(33, 'تم تسجيل طلب إضافة جهة جديدة', '2024-08-04 10:25:18', 'Admin'),
(34, 'تم تسجيل طلب إضافة جهة جديدة', '2024-08-04 10:26:21', 'Admin'),
(35, 'تمت حذف جهة  ', '2024-08-04 10:45:07', 'Admin'),
(36, 'تمت حذف جهة  ', '2024-08-04 10:45:08', 'Admin'),
(37, 'تمت حذف جهة  ', '2024-08-04 10:45:09', 'Admin'),
(38, 'تمت حذف جهة  ', '2024-08-04 10:45:09', 'Admin'),
(39, 'تمت حذف جهة  ', '2024-08-04 10:45:09', 'Admin'),
(40, 'تم تسجيل طلب إضافة جهة جديدة', '2024-08-04 10:45:21', 'Admin'),
(41, 'تمت تسجيل طلب إنضمام لجهة   ', '2024-08-04 10:46:15', 'Plato Riddle'),
(42, 'تمت إضافة تقييم جديد', '2024-08-04 21:24:26', 'Plato Riddle'),
(43, 'تمت  رفع تدكرة دعم فني   ', '2024-08-04 21:24:37', 'Plato Riddle'),
(44, 'تم الرد على تذكرة    ', '2024-08-04 21:25:01', 'Pearl Thomas'),
(45, 'تم تسجيل طلب إضافة جهة جديدة', '2024-08-04 21:25:16', 'Pearl Thomas'),
(46, 'تمت تسجيل حساب طالب  جديد', '2024-08-04 21:27:41', 'Bryar Pugh');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `ReportID` int NOT NULL AUTO_INCREMENT,
  `UserID` int DEFAULT NULL,
  `TrainingProgramID` int DEFAULT NULL,
  `Status` tinyint(1) DEFAULT '0',
  `CreatedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `File` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AdvisorID` int DEFAULT NULL,
  `mark` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_mark_set` datetime DEFAULT NULL,
  PRIMARY KEY (`ReportID`),
  KEY `UserID` (`UserID`),
  KEY `AdvisorID` (`AdvisorID`),
  KEY `TrainingProgramID` (`TrainingProgramID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`ReportID`, `UserID`, `TrainingProgramID`, `Status`, `CreatedDate`, `File`, `AdvisorID`, `mark`, `date_mark_set`) VALUES
(1, 2, 2, 1, '2024-08-03 12:21:42', '20240803112142_66ae12c600f0e_1.pdf', 7, '100', '2024-08-03 12:32:11'),
(2, 9, 5, 1, '2024-08-03 14:05:22', '20240803130522_66ae2b1204172_uploads_20240802154413_66acfecddbb1c_ee.png', 7, '4', '2024-08-03 14:05:34'),
(3, 10, 6, 1, '2024-08-03 14:12:22', '20240803131222_66ae2cb6cba8e_uploads_20240802154413_66acfecddbb1c_ee.png', 7, '500', '2024-08-03 14:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `technicalsupport`
--

DROP TABLE IF EXISTS `technicalsupport`;
CREATE TABLE IF NOT EXISTS `technicalsupport` (
  `TicketID` int NOT NULL AUTO_INCREMENT,
  `UserID` int DEFAULT NULL,
  `AdminID` int DEFAULT NULL,
  `Subject` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci,
  `Status` tinyint(1) DEFAULT '0',
  `CreatedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `ResolvedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`TicketID`),
  KEY `UserID` (`UserID`),
  KEY `AdminID` (`AdminID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `technicalsupport`
--

INSERT INTO `technicalsupport` (`TicketID`, `UserID`, `AdminID`, `Subject`, `Description`, `Status`, `CreatedDate`, `ResolvedDate`) VALUES
(1, 2, 7, NULL, NULL, 1, '2024-08-04 09:24:10', '2024-08-04 09:25:02'),
(2, 2, 7, 'eeeeeeee', 'rrrrr', 1, '2024-08-04 09:24:55', '2024-08-04 09:25:01'),
(3, 2, 8, 'eeerr', 'rrr', 1, '2024-08-04 21:24:37', '2024-08-04 21:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `trainingorganization`
--

DROP TABLE IF EXISTS `trainingorganization`;
CREATE TABLE IF NOT EXISTS `trainingorganization` (
  `OrganizationID` int NOT NULL AUTO_INCREMENT,
  `OrganizationName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci,
  `ContactInformation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Website` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addresse` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsable` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Phone_number` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `change_` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`OrganizationID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainingorganization`
--

INSERT INTO `trainingorganization` (`OrganizationID`, `OrganizationName`, `Description`, `ContactInformation`, `Website`, `addresse`, `city`, `responsable`, `Phone_number`, `change_`, `Email`, `file`) VALUES
(5, 'Ross and Snyder Trading', NULL, NULL, 'https://www.xiwopyraho.me.uk', 'Corporis sint eos no', 'Sunt sed ex laborum', 'Ratione sit soluta ', '+1 (245) 535-1652', 'Aut esse quaerat vol', 'kamonaf@mailinator.com', NULL),
(10, 'Orr Roach Co', NULL, NULL, 'https://www.deboge.co', 'Culpa adipisci et do', 'Molestiae molestiae ', 'Rerum qui veniam fu', '+1 (492) 755-5899', 'Nihil aspernatur max', 'vokap@mailinator.com', NULL),
(11, 'Thornton and Clements Plc', NULL, NULL, 'https://www.biju.com.au', 'Et sed dolorem dolor', 'Enim dicta tempore ', 'Itaque voluptate ull', '+1 (693) 393-7379', 'Molestias enim qui i', 'kopukemig@mailinator.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trainingprogram`
--

DROP TABLE IF EXISTS `trainingprogram`;
CREATE TABLE IF NOT EXISTS `trainingprogram` (
  `TrainingProgramID` int NOT NULL AUTO_INCREMENT,
  `ProgramName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `Capacity` int DEFAULT NULL,
  `Fee` decimal(10,2) DEFAULT NULL,
  `Prerequisites` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `OrganizationID` int DEFAULT NULL,
  PRIMARY KEY (`TrainingProgramID`),
  KEY `OrganizationID` (`OrganizationID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainingprogram`
--

INSERT INTO `trainingprogram` (`TrainingProgramID`, `ProgramName`, `Description`, `StartDate`, `EndDate`, `Capacity`, `Fee`, `Prerequisites`, `OrganizationID`) VALUES
(1, NULL, 'Quam voluptas vero e', '0000-00-00', '0000-00-00', 0, 0.00, NULL, 8),
(2, NULL, 'Et odit aut est eu', '0000-00-00', '0000-00-00', 0, 0.00, NULL, 8),
(3, NULL, 'Aut adipisci archite', '0000-00-00', '0000-00-00', 0, 0.00, NULL, 8),
(4, NULL, 'Qui magna aspernatur', '1972-02-07', '1972-08-26', 52, 86.00, 'Aut Nam ut magnam vo', 9),
(5, NULL, 'Dolor et et dolorem ', '1981-02-14', '2022-12-10', 97, 76.00, 'Non optio eligendi ', 9),
(6, NULL, 'Quis aut reiciendis ', '1989-12-12', '2023-09-01', 77, 46.00, 'Laborum ea adipisici', 9),
(7, 'Bryar Joyner', 'Consequatur cum ali', '1994-12-17', '2006-05-16', 57, 7.00, 'Cumque eaque est sin', 10),
(8, 'Stephanie Hughes', 'Nemo dignissimos quo', '2001-10-22', '1995-12-18', 91, 38.00, 'Ut blanditiis volupt', 10),
(9, 'Nina Torres', 'Sapiente aut at aute', '2013-08-03', '2001-04-28', 31, 23.00, 'Illo libero soluta q', 10),
(10, 'Desiree Cooley', 'Maxime tempora omnis', '2004-05-25', '2015-02-24', 19, 49.00, 'Est eu inventore dig', 10),
(11, 'Natalie Rodgers', 'Quasi laudantium fu', '2020-10-14', '2011-12-23', 82, 83.00, 'Tempora amet harum ', 11),
(12, 'Aladdin Blevins', 'Vel illum quis ea p', '2018-11-15', '1991-01-28', 100, 89.00, 'Eos ex nihil nihil ', 11),
(13, 'Emma Reid', 'Non tenetur velit s', '1989-03-20', '1988-07-22', 63, 33.00, 'Voluptatum aspernatu', 11),
(14, 'Cathleen Kidd', 'Accusamus velit illo', '1996-04-24', '2017-11-09', 88, 16.00, 'Repudiandae sequi te', 11);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `FullName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Password` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ContactNumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` text COLLATE utf8mb4_unicode_ci,
  `CreatedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `GPA` float DEFAULT NULL,
  `MajOr` text COLLATE utf8mb4_unicode_ci,
  `AdvisorID` int DEFAULT NULL,
  `Hiredate` datetime DEFAULT NULL,
  `RoleUser` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Student_Number` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  KEY `AdvisorID` (`AdvisorID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FullName`, `Email`, `Password`, `ContactNumber`, `Address`, `CreatedDate`, `GPA`, `MajOr`, `AdvisorID`, `Hiredate`, `RoleUser`, `Student_Number`) VALUES
(1, 'testadvisor', 'testadvisor@app.com', '12345678', '1222', NULL, '2024-08-02 12:09:35', NULL, NULL, NULL, '2024-08-01 12:09:35', 'Advisor', NULL),
(2, 'Plato Riddle', 'jevovisy@mailinator.com', 'Pa$$w0rd!', '568', 'Irure et a blanditii', '2024-08-02 12:30:29', NULL, NULL, 0, NULL, 'Student', '86'),
(9, 'Kay Sweet', 'xubuceby@mailinator.com', 'Pa$$w0rd!', '987', 'Nemo delectus deser', '2024-08-03 13:41:22', NULL, NULL, 6, NULL, 'Student', '681'),
(4, 'Marshall Wiggins', 'cucijytav@mailinator.com', 'Pa$$w0rd!', '940', 'Enim aut eu consequa', '2024-08-02 20:42:34', NULL, NULL, 1, NULL, 'Student', '352'),
(5, 'Shelly Marks', 'syqi@mailinator.com', 'Pa$$w0rd!', '929', 'Velit sed natus ut q', '2024-08-02 20:42:52', NULL, NULL, 1, NULL, 'Student', '980'),
(6, 'Audra Holcombzzzzzzzzzzzzz', 'fisir@mailinator.com', 'Pa$$w0rd!', '437', 'Voluptas non dolores', '2024-08-02 20:48:02', NULL, NULL, 1, NULL, 'Advisor', '742'),
(7, 'Admin', 'admin@app.com', '12345678', NULL, NULL, '2024-08-03 11:21:29', NULL, NULL, NULL, '2024-08-03 11:20:49', 'Admin', NULL),
(8, 'Pearl Thomas', 'tebisuvira@mailinator.com', 'Pa$$w0rd!', NULL, NULL, '2024-08-03 11:42:27', NULL, NULL, NULL, NULL, 'Admin', NULL),
(10, 'Illiana Meadows', 'mifobev@mailinator.com', 'Pa$$w0rd!', '159', 'Aliquip fugit quos ', '2024-08-03 14:06:25', NULL, NULL, 1, NULL, 'Student', '212'),
(11, 'Bryar Pugh', 'bexode@mailinator.com', 'Pa$$w0rd!', '509', 'Voluptas illo quis m', '2024-08-04 21:27:41', NULL, NULL, 1, NULL, 'Student', '128');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
