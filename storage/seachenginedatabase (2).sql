-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 04, 2023 at 11:54 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seachenginedatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `askexpert`
--

DROP TABLE IF EXISTS `askexpert`;
CREATE TABLE IF NOT EXISTS `askexpert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `question` varchar(250) DEFAULT NULL,
  `answer` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `askexpert`
--

INSERT INTO `askexpert` (`id`, `email`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(3, 'hero@hero.com', 'Come on gg wp', NULL, '2023-09-04 17:19:19', '2023-09-04 17:19:19'),
(2, 'zuzu@zuzu.com', 'ff123', NULL, '2023-09-04 16:23:00', '2023-09-04 16:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `materials_csv`
--

DROP TABLE IF EXISTS `materials_csv`;
CREATE TABLE IF NOT EXISTS `materials_csv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CSI` varchar(200) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Qualification` varchar(200) DEFAULT NULL,
  `Brief_Specs` varchar(200) DEFAULT NULL,
  `Function` varchar(200) DEFAULT NULL,
  `Origin` varchar(200) DEFAULT NULL,
  `Currency` varchar(200) DEFAULT NULL,
  `Price_Min` float DEFAULT NULL,
  `Price_Max` float DEFAULT NULL,
  `Unit` varchar(200) DEFAULT NULL,
  `Discount` float DEFAULT NULL,
  `Monthly_Trend` float DEFAULT NULL,
  `Availability` varchar(200) DEFAULT NULL,
  `Alternate` varchar(200) DEFAULT NULL,
  `Alternate_CSI` varchar(200) DEFAULT NULL,
  `Notes` varchar(200) DEFAULT NULL,
  `Keywords` varchar(200) DEFAULT NULL,
  `Photo` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materials_csv`
--

INSERT INTO `materials_csv` (`id`, `CSI`, `Description`, `Qualification`, `Brief_Specs`, `Function`, `Origin`, `Currency`, `Price_Min`, `Price_Max`, `Unit`, `Discount`, `Monthly_Trend`, `Availability`, `Alternate`, `Alternate_CSI`, `Notes`, `Keywords`, `Photo`, `created_at`, `updated_at`) VALUES
(1, 'MT-001', 'Reinorcement', 'Steel', 'Hydrogen', 'Steeling', 'Pakistan', 'PKR', 1500, 2500, 'ton', 13, 2, 'Yes', 'Sand1', 'MT-003', 'Blast', 'Reinorcement', NULL, '2023-08-28 22:40:33', '2023-08-28 22:40:33'),
(2, 'MT-002', 'Asphalt', 'Master', 'Good Asphalt', 'Road Making', 'Pakistan', 'PKR', 3500, 5500, 'kg', 5, 2, 'Yes', 'Reinorcement Steel', 'MT-001', 'Good One', 'Asphalt', NULL, '2023-08-28 22:42:39', '2023-08-28 22:42:39'),
(3, 'MT-005', 'Wire', 'Wires', 'Wires', 'Electricity', 'Pakistan', 'PKR', 1000, 2000, 'kg', 3, 3, 'Yes', NULL, NULL, 'Wire', 'Wire', NULL, '2023-08-29 00:19:37', '2023-08-29 00:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `resources_csv`
--

DROP TABLE IF EXISTS `resources_csv`;
CREATE TABLE IF NOT EXISTS `resources_csv` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `CSI` varchar(100) DEFAULT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Qualification` varchar(200) DEFAULT NULL,
  `Experience` varchar(200) DEFAULT NULL,
  `Awards` varchar(200) DEFAULT NULL,
  `Currency` varchar(100) DEFAULT NULL,
  `Photo` varchar(100) DEFAULT NULL,
  `Notes` varchar(100) DEFAULT NULL,
  `Engagement` varchar(100) DEFAULT NULL,
  `Availability` varchar(100) DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL,
  `Nationality` varchar(100) DEFAULT NULL,
  `Age_Years` int(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Keywords` varchar(200) DEFAULT NULL,
  `Price_Min` float DEFAULT NULL,
  `Price_Max` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources_csv`
--

INSERT INTO `resources_csv` (`id`, `CSI`, `Name`, `Qualification`, `Experience`, `Awards`, `Currency`, `Photo`, `Notes`, `Engagement`, `Availability`, `Location`, `Nationality`, `Age_Years`, `created_at`, `updated_at`, `Keywords`, `Price_Min`, `Price_Max`) VALUES
(3, 'AI-001', 'Cement', 'Cement', '4', '4', 'PKR', 'img/vuTxCaQyNCq7adMKKMbAd6WNSF8GRo24MpdzoEv3.jpg', 'gg', 'gg', 'Pakistan1', 'Pakistan', 'Pakistan', 4, '2023-08-28 18:47:56', '2023-08-28 18:48:26', NULL, 300, 400),
(4, 'AI-002', 'Sand', 'Sand', '3 years', '3', 'PKR', 'img/Cq25cDLZ6IYJCjcaUS9LMO0fdu6w7XW2bGbytSQc.jpg', 'Sand', 'Sand', 'Pakistan', 'Islamabad', 'Pakistani', 5, '2023-08-28 18:49:31', '2023-08-28 18:49:31', NULL, 500, 600);

-- --------------------------------------------------------

--
-- Table structure for table `service_csv`
--

DROP TABLE IF EXISTS `service_csv`;
CREATE TABLE IF NOT EXISTS `service_csv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CSI` varchar(200) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Specifications` varchar(200) DEFAULT NULL,
  `Unit` varchar(200) DEFAULT NULL,
  `Price_Min` float DEFAULT NULL,
  `Price_Max` float DEFAULT NULL,
  `Currency` varchar(200) DEFAULT NULL,
  `Discount` float DEFAULT NULL,
  `Monthly_Trend` float DEFAULT NULL,
  `Location` varchar(200) DEFAULT NULL,
  `Notes` varchar(200) DEFAULT NULL,
  `Keywords` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Photo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_csv`
--

INSERT INTO `service_csv` (`id`, `CSI`, `Description`, `Specifications`, `Unit`, `Price_Min`, `Price_Max`, `Currency`, `Discount`, `Monthly_Trend`, `Location`, `Notes`, `Keywords`, `created_at`, `updated_at`, `Photo`) VALUES
(1, 'SV-001', 'Plumbing', 'Toilet', 'kg', 5000, 10000, 'PKR', 5, 2, 'Islamabad', 'Plumbing1', 'Plumbing', '2023-08-28 22:50:38', '2023-08-28 22:50:38', NULL),
(2, 'SV-002', 'Wiring', 'Bulbs, circuits', 'kg', 1000, 3000, 'PKR', 0, 0, 'Rawalpindi', 'Wiring', 'Wires', '2023-08-28 22:51:25', '2023-08-28 22:51:25', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
