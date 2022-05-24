-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 24, 2022 at 03:54 PM
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
-- Database: `pdppn`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `selKategorit`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `selKategorit` ()  SELECT * FROM kategoria$$

DROP PROCEDURE IF EXISTS `selMadhesit`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `selMadhesit` (IN `id` INT)  SELECT * FROM madhesit
Where kategoriaID=id$$

DROP PROCEDURE IF EXISTS `selNgjyrat`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `selNgjyrat` (IN `id` INT)  SELECT * FROM ngjyrat
Where kategoriaID=id$$

DROP PROCEDURE IF EXISTS `selQytet`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `selQytet` ()  Select * From cities$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `code`, `status`) VALUES
(2, 'Uranik Sejdiu', 'u.sejdiu4@gmail.com', '$2y$10$t8HEHOUB.HzLaDceZUoq2e3xLgsH4NfvP43KNdGm3AsWiRyD2qQ4q', 0, 'verified'),
(11, 'Filan Fisteku', 'u.sejdiu56@gmail.com', '$2y$10$D7YN1dt6VXd98X9TQ7Z/Zecevy3U5CkqweVHNbTljDC6CGXW/4AXa', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id_city` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_city`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id_city`, `name`) VALUES
(1, 'Ferizaj'),
(2, 'Prishtine');

-- --------------------------------------------------------

--
-- Table structure for table `kategoria`
--

DROP TABLE IF EXISTS `kategoria`;
CREATE TABLE IF NOT EXISTS `kategoria` (
  `kategoriaID` int(11) NOT NULL AUTO_INCREMENT,
  `kategoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`kategoriaID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategoria`
--

INSERT INTO `kategoria` (`kategoriaID`, `kategoria`) VALUES
(1, 'Veshje'),
(2, 'Këpucë'),
(3, 'Teknologji');

-- --------------------------------------------------------

--
-- Table structure for table `kompanite`
--

DROP TABLE IF EXISTS `kompanite`;
CREATE TABLE IF NOT EXISTS `kompanite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nrfiskal` int(9) NOT NULL,
  `lokacioni` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `telefoni` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(999) COLLATE utf8_unicode_ci NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kompanite`
--

INSERT INTO `kompanite` (`id`, `logo`, `name`, `nrfiskal`, `lokacioni`, `telefoni`, `email`, `password`, `code`, `status`) VALUES
(2, '../images/kompani/1652531410-627fa0d2304fc.jpg', 'Filan', 111111111, '42.349188,21.17604', '(+383)48/434-177', 'ferizaj0006@gmail.com', '$2y$10$Yvf3/GQmVlvMNrda83SKHe/rwYhYkr8EAV2v2swvUqD4eDDNn6ieS', 0, 'verified'),
(5, '../images/kompani/1652963525-628638c5308e5.png', 'Uranik Sejdiu', 545454598, '42.560057,20.855082', '(+383)44/879-569', 'u.sejdiu4@gmail.com', '$2y$10$Lee7Nl8gMHAh7BvN6t6NWeUYzKwGq4PfFaQPWumt1OyBAprTIg1Hy', 0, 'verified'),
(10, '../images/kompani/1652791679-6283997f66b8b.png', 'Hewlet Packard', 555555555, '42.697829,23.322001', '(+383)45/555-555', 'u.sejdiu56@gmail.com', '$2y$10$AbP.FHKxvt9xUJMVdVsupu3GO9Wj8KN2VwjWQojtd/7jBsoSy8m36', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `kontaktet`
--

DROP TABLE IF EXISTS `kontaktet`;
CREATE TABLE IF NOT EXISTS `kontaktet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjekti` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mesazhi` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `moduli` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kontaktet`
--

INSERT INTO `kontaktet` (`id`, `subjekti`, `mesazhi`, `moduli`, `createdDate`) VALUES
(1, 'asdasdasdasdasd', 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd', 'Admin', '2022-05-11 15:11:53'),
(4, 'admin', 'adminadminadm', 'Admin', '2022-05-11 15:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `madhesit`
--

DROP TABLE IF EXISTS `madhesit`;
CREATE TABLE IF NOT EXISTS `madhesit` (
  `madhesiaID` int(11) NOT NULL AUTO_INCREMENT,
  `madhesia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kategoriaID` int(11) NOT NULL,
  PRIMARY KEY (`madhesiaID`),
  KEY `kategoriaMadhesia` (`kategoriaID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `madhesit`
--

INSERT INTO `madhesit` (`madhesiaID`, `madhesia`, `kategoriaID`) VALUES
(1, 'M', 1),
(2, 'L', 1),
(3, '40', 2),
(4, '41', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ngjyrat`
--

DROP TABLE IF EXISTS `ngjyrat`;
CREATE TABLE IF NOT EXISTS `ngjyrat` (
  `ngjyraID` int(11) NOT NULL AUTO_INCREMENT,
  `ngjyra` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kategoriaID` int(11) NOT NULL,
  PRIMARY KEY (`ngjyraID`),
  KEY `ngjyraKetegorit` (`kategoriaID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ngjyrat`
--

INSERT INTO `ngjyrat` (`ngjyraID`, `ngjyra`, `kategoriaID`) VALUES
(1, 'E Zezë', 1),
(2, 'E Kuqe', 1),
(3, 'E Kaltër', 1),
(4, 'E Hirtë', 2),
(5, 'E Zezë', 2);

-- --------------------------------------------------------

--
-- Table structure for table `perdoruesit`
--

DROP TABLE IF EXISTS `perdoruesit`;
CREATE TABLE IF NOT EXISTS `perdoruesit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `id_city` int(11) NOT NULL,
  `adress` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(999) COLLATE utf8_unicode_ci NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cityForeignKey` (`id_city`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `perdoruesit`
--

INSERT INTO `perdoruesit` (`id`, `fullName`, `id_city`, `adress`, `phone`, `email`, `password`, `code`, `status`) VALUES
(2, 'Filan Fisteku', 2, 'Mataj', '(+383)45/333-333', 'ferizaj0004@gmail.com', '$2y$10$e5FDa2mXvJ3IiDmnEAVeIeMrzT7oUMRtEYNgE4ZCAiLHRMBctdldS', 547301, 'notverified');

-- --------------------------------------------------------

--
-- Table structure for table `produktet`
--

DROP TABLE IF EXISTS `produktet`;
CREATE TABLE IF NOT EXISTS `produktet` (
  `produktID` int(11) NOT NULL AUTO_INCREMENT,
  `produkti` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `imazhi1` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `imazhi2` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `imazhi3` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `imazhi4` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `kategoriaID` int(11) NOT NULL,
  `pershkrimi` longtext COLLATE utf8_unicode_ci NOT NULL,
  `qmimi` decimal(15,2) NOT NULL,
  `stoku` int(11) NOT NULL,
  `madhesiaID` int(11) DEFAULT NULL,
  `ngjyraID` int(11) DEFAULT NULL,
  `kompaniaID` int(11) NOT NULL,
  PRIMARY KEY (`produktID`),
  KEY `katForeignKey` (`kategoriaID`),
  KEY `colorForeignKey` (`ngjyraID`),
  KEY `kompaniaForeignKey` (`kompaniaID`),
  KEY `sizeKatForeignkey` (`madhesiaID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produktet`
--

INSERT INTO `produktet` (`produktID`, `produkti`, `imazhi1`, `imazhi2`, `imazhi3`, `imazhi4`, `kategoriaID`, `pershkrimi`, `qmimi`, `stoku`, `madhesiaID`, `ngjyraID`, `kompaniaID`) VALUES
(1, 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'adasd', 3, 'asdasdadsadadsasdadsasd', '321.00', 1, NULL, 4, 5);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `madhesit`
--
ALTER TABLE `madhesit`
  ADD CONSTRAINT `kategoriaMadhesia` FOREIGN KEY (`kategoriaID`) REFERENCES `kategoria` (`kategoriaID`);

--
-- Constraints for table `ngjyrat`
--
ALTER TABLE `ngjyrat`
  ADD CONSTRAINT `ngjyraKetegorit` FOREIGN KEY (`kategoriaID`) REFERENCES `kategoria` (`kategoriaID`);

--
-- Constraints for table `perdoruesit`
--
ALTER TABLE `perdoruesit`
  ADD CONSTRAINT `cityForeignKey` FOREIGN KEY (`id_city`) REFERENCES `cities` (`id_city`);

--
-- Constraints for table `produktet`
--
ALTER TABLE `produktet`
  ADD CONSTRAINT `colorForeignKey` FOREIGN KEY (`ngjyraID`) REFERENCES `ngjyrat` (`ngjyraID`),
  ADD CONSTRAINT `katForeignKey` FOREIGN KEY (`kategoriaID`) REFERENCES `kategoria` (`kategoriaID`),
  ADD CONSTRAINT `kompaniaForeignKey` FOREIGN KEY (`kompaniaID`) REFERENCES `kompanite` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sizeKatForeignkey` FOREIGN KEY (`madhesiaID`) REFERENCES `madhesit` (`madhesiaID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
