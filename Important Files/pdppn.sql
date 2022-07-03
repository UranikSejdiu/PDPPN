-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 03, 2022 at 09:15 PM
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
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `code`, `status`) VALUES
(2, 'Uranik Sejdiu', 'u.sejdiu4@gmail.com', '$2y$10$aw2Ijo1bAPcerfbpf6K6zuvNpkgy/2BRP1Q0cD3SZyuVifMl7bXLi', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id_city` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_city`)
) ;

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
  `kategoria` varchar(50) NOT NULL,
  PRIMARY KEY (`kategoriaID`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `kompanite`
--

DROP TABLE IF EXISTS `kompanite`;
CREATE TABLE IF NOT EXISTS `kompanite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(250) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nrfiskal` int(9) NOT NULL,
  `lokacioni` varchar(200) NOT NULL,
  `telefoni` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(999) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `kontaktet`
--

DROP TABLE IF EXISTS `kontaktet`;
CREATE TABLE IF NOT EXISTS `kontaktet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjekti` varchar(100) NOT NULL,
  `mesazhi` varchar(500) NOT NULL,
  `moduli` varchar(50) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `madhesit`
--

DROP TABLE IF EXISTS `madhesit`;
CREATE TABLE IF NOT EXISTS `madhesit` (
  `madhesiaID` int(11) NOT NULL AUTO_INCREMENT,
  `madhesia` varchar(50) NOT NULL,
  `kategoriaID` int(11) NOT NULL,
  PRIMARY KEY (`madhesiaID`),
  KEY `kategoriaMadhesia` (`kategoriaID`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `ngjyrat`
--

DROP TABLE IF EXISTS `ngjyrat`;
CREATE TABLE IF NOT EXISTS `ngjyrat` (
  `ngjyraID` int(11) NOT NULL AUTO_INCREMENT,
  `ngjyra` varchar(50) NOT NULL,
  `kategoriaID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ngjyraID`),
  KEY `ngjyraKetegorit` (`kategoriaID`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `perdoruesit`
--

DROP TABLE IF EXISTS `perdoruesit`;
CREATE TABLE IF NOT EXISTS `perdoruesit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(150) NOT NULL,
  `id_city` int(11) NOT NULL,
  `adress` tinytext NOT NULL,
  `zipCode` int(5) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(999) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cityForeignKey` (`id_city`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `porosit`
--

DROP TABLE IF EXISTS `porosit`;
CREATE TABLE IF NOT EXISTS `porosit` (
  `porosiaID` int(11) NOT NULL AUTO_INCREMENT,
  `produktID` int(11) NOT NULL,
  `perdoruesID` int(11) NOT NULL,
  `emri` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `qyteti` varchar(50) NOT NULL,
  `adresa` varchar(100) NOT NULL,
  `zipCode` int(5) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mesazhi` varchar(500) NOT NULL,
  `menyraPageses` varchar(150) NOT NULL,
  `sasia` int(11) NOT NULL,
  `pagesa` decimal(15,2) NOT NULL,
  `statusi` int(1) NOT NULL DEFAULT '1',
  `dataBlerjes` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`porosiaID`),
  KEY `perdoruesiPorosit` (`perdoruesID`),
  KEY `produktiPorosit` (`produktID`)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `produktet`
--

DROP TABLE IF EXISTS `produktet`;
CREATE TABLE IF NOT EXISTS `produktet` (
  `produktID` int(11) NOT NULL AUTO_INCREMENT,
  `produkti` varchar(150) NOT NULL,
  `imazhi1` varchar(600) NOT NULL,
  `imazhi2` varchar(600) NOT NULL,
  `imazhi3` varchar(600) NOT NULL,
  `imazhi4` varchar(600) NOT NULL,
  `kategoriaID` int(11) NOT NULL,
  `pershkrimi` longtext  NOT NULL,
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
);

-- --------------------------------------------------------

--
-- Table structure for table `produktreview`
--

DROP TABLE IF EXISTS `produktreview`;
CREATE TABLE IF NOT EXISTS `produktreview` (
  `reviewID` int(11) NOT NULL AUTO_INCREMENT,
  `perdoruesi` varchar(150) NOT NULL,
  `starRating` int(1) NOT NULL,
  `reviewText` text NOT NULL,
  `produktID` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`reviewID`),
  KEY `reviewProdukt` (`produktID`)
) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `madhesit`
--
ALTER TABLE `madhesit`
  ADD CONSTRAINT `kategoriaMadhesia` FOREIGN KEY (`kategoriaID`) REFERENCES `kategoria` (`kategoriaID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ngjyrat`
--
ALTER TABLE `ngjyrat`
  ADD CONSTRAINT `ngjyraKetegorit` FOREIGN KEY (`kategoriaID`) REFERENCES `kategoria` (`kategoriaID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perdoruesit`
--
ALTER TABLE `perdoruesit`
  ADD CONSTRAINT `cityForeignKey` FOREIGN KEY (`id_city`) REFERENCES `cities` (`id_city`);

--
-- Constraints for table `porosit`
--
ALTER TABLE `porosit`
  ADD CONSTRAINT `perdoruesiPorosit` FOREIGN KEY (`perdoruesID`) REFERENCES `perdoruesit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produktiPorosit` FOREIGN KEY (`produktID`) REFERENCES `produktet` (`produktID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produktet`
--
ALTER TABLE `produktet`
  ADD CONSTRAINT `colorForeignKey` FOREIGN KEY (`ngjyraID`) REFERENCES `ngjyrat` (`ngjyraID`),
  ADD CONSTRAINT `katForeignKey` FOREIGN KEY (`kategoriaID`) REFERENCES `kategoria` (`kategoriaID`),
  ADD CONSTRAINT `kompaniaForeignKey` FOREIGN KEY (`kompaniaID`) REFERENCES `kompanite` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sizeKatForeignkey` FOREIGN KEY (`madhesiaID`) REFERENCES `madhesit` (`madhesiaID`);

--
-- Constraints for table `produktreview`
--
ALTER TABLE `produktreview`
  ADD CONSTRAINT `reviewProdukt` FOREIGN KEY (`produktID`) REFERENCES `produktet` (`produktID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
