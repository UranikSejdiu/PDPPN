-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 22, 2022 at 03:38 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `code`, `status`) VALUES
(2, 'Uranik Sejdiu', 'u.sejdiu4@gmail.com', '$2y$10$t8HEHOUB.HzLaDceZUoq2e3xLgsH4NfvP43KNdGm3AsWiRyD2qQ4q', 0, 'verified'),
(11, 'Filan Fisteku', 'u.sejdiu56@gmail.com', '$2y$10$D7YN1dt6VXd98X9TQ7Z/Zecevy3U5CkqweVHNbTljDC6CGXW/4AXa', 0, 'verified'),
(12, 'Filan Fisteku', 'ferizaj0004@gmail.com', '$2y$10$wvoBIQF43K0imrMbplJb.e3HLIPBvkIGG0bljcoLA5Ho8JDZxdxpS', 409943, 'notverified');

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
(0, 'E pa cekur'),
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
(5, '../images/kompani/1652963525-628638c5308e5.png', 'Uranik Sejdiu', 545454598, '41.521431,14.106445', '(+383)44/879-569', 'u.sejdiu4@gmail.com', '$2y$10$eWY04Hw/SIYuioxO1zKc7OcQNDLkm/FWC.Fz/OpIGN1eay7YayU7i', 0, 'verified'),
(10, '../images/kompani/1652791679-6283997f66b8b.png', 'Hewlet Packard', 555555555, '42.697829,23.322001', '(+383)45/555-555', 'u.sejdiu56@gmail.com', '$2y$10$uoDe4GN.X/1H..VgaZDo4uau5pynsWtfYzEfc4yQKVXHWb5KkLNna', 0, 'verified');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kontaktet`
--

INSERT INTO `kontaktet` (`id`, `subjekti`, `mesazhi`, `moduli`, `createdDate`) VALUES
(1, 'asdasdasdasdasd', 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd', 'Admin', '2022-05-11 15:11:53'),
(4, 'admin', 'adminadminadm', 'Admin', '2022-05-11 15:19:32'),
(5, 'asdasdasdasd', 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd', 'Moduli Kompanise', '2022-06-01 14:28:35'),
(6, '1111111111111', '11111111111111111111111111111111111111111111111111111111111111111v', 'Moduli Kompanise', '2022-06-01 14:29:37');

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
(0, '0', 0),
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
  `kategoriaID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ngjyraID`),
  KEY `ngjyraKetegorit` (`kategoriaID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ngjyrat`
--

INSERT INTO `ngjyrat` (`ngjyraID`, `ngjyra`, `kategoriaID`) VALUES
(0, '0', 0),
(1, 'Black', 1),
(2, 'Red', 1),
(3, 'Blue', 1),
(4, 'Gray', 2),
(5, 'Black', 2),
(6, 'Purple', 1),
(7, 'Orange', 1);

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
  `zipCode` int(5) NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(999) COLLATE utf8_unicode_ci NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cityForeignKey` (`id_city`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `perdoruesit`
--

INSERT INTO `perdoruesit` (`id`, `fullName`, `id_city`, `adress`, `zipCode`, `phone`, `email`, `password`, `code`, `status`) VALUES
(3, 'Uranik Sejdiu', 1, 'Fashti Gaqke', 70000, '(+383)44/444-444', 'ferizaj0004@gmail.com', '$2y$10$ptLTLy759/sIc2nEVY1vy.0xUjSboanv/bfzdx76BKt42OwqNPb92', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `porosit`
--

DROP TABLE IF EXISTS `porosit`;
CREATE TABLE IF NOT EXISTS `porosit` (
  `porosiaID` int(11) NOT NULL AUTO_INCREMENT,
  `produktID` int(11) NOT NULL,
  `perdoruesID` int(11) NOT NULL,
  `emri` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qyteti` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipCode` int(5) NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mesazhi` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menyraPageses` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sasia` int(11) NOT NULL,
  `pagesa` decimal(15,2) NOT NULL,
  `statusi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataBlerjes` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`porosiaID`),
  KEY `perdoruesiPorosit` (`perdoruesID`),
  KEY `produktiPorosit` (`produktID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `porosit`
--

INSERT INTO `porosit` (`porosiaID`, `produktID`, `perdoruesID`, `emri`, `email`, `qyteti`, `adresa`, `zipCode`, `phone`, `mesazhi`, `menyraPageses`, `sasia`, `pagesa`, `statusi`, `dataBlerjes`) VALUES
(1, 21, 3, 'Uranik Sejdiu', 'ferizaj0004@gmail.com', 'Ferizaj', 'Fashti Gaqke', 70000, '(+383)44/444-444', 'Te telefonohet numri para se dergohet ne adres', 'Para në dorë', 2, '2.00', 'E rezervuar', '2022-06-18 17:20:26'),
(2, 18, 3, 'Uranik Sejdiu', 'ferizaj0004@gmail.com', 'Ferizaj', 'Fashti Gaqke', 70000, '(+383)44/444-444', '', 'Para në dorë', 1, '122.00', 'E rezervuar', '2022-06-21 09:12:13'),
(3, 18, 3, 'Uranik Sejdiu', 'ferizaj0004@gmail.com', 'Ferizaj', 'Fashti Gaqke', 70000, '(+383)44/444-444', '', 'Para në dorë', 1, '122.00', 'E rezervuar', '2022-06-21 09:28:19'),
(4, 22, 3, 'Uranik Sejdiu', 'ferizaj0004@gmail.com', 'Ferizaj', 'Fashti Gaqke', 70000, '(+383)44/444-444', '', 'Para në dorë', 1, '45.00', 'E rezervuar', '2022-06-21 09:28:33'),
(5, 22, 3, 'Uranik Sejdiu', 'ferizaj0004@gmail.com', 'Ferizaj', 'Fashti Gaqke', 70000, '(+383)44/444-444', '', 'Para në dorë', 1, '45.00', 'E rezervuar', '2022-06-21 09:28:56'),
(6, 23, 3, 'Uranik Sejdiu', 'ferizaj0004@gmail.com', 'Ferizaj', 'Fashti Gaqke', 70000, '(+383)44/444-444', '', 'Para në dorë', 1, '10.00', 'E rezervuar', '2022-06-21 09:29:39'),
(7, 18, 3, 'Uranik Sejdiu', 'ferizaj0004@gmail.com', 'Ferizaj', 'Fashti Gaqke', 70000, '(+383)44/444-444', '', 'Para në dorë', 1, '122.00', 'E rezervuar', '2022-06-21 09:41:26'),
(8, 18, 3, 'Uranik Sejdiu', 'ferizaj0004@gmail.com', 'Ferizaj', 'Fashti Gaqke', 70000, '(+383)44/444-444', 'Try this number too +388 44 565 996', 'Para në dorë', 2, '244.00', 'E rezervuar', '2022-06-22 17:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `produktet`
--

DROP TABLE IF EXISTS `produktet`;
CREATE TABLE IF NOT EXISTS `produktet` (
  `produktID` int(11) NOT NULL AUTO_INCREMENT,
  `produkti` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `imazhi1` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `imazhi2` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `imazhi3` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `imazhi4` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produktet`
--

INSERT INTO `produktet` (`produktID`, `produkti`, `imazhi1`, `imazhi2`, `imazhi3`, `imazhi4`, `kategoriaID`, `pershkrimi`, `qmimi`, `stoku`, `madhesiaID`, `ngjyraID`, `kompaniaID`) VALUES
(17, 'Hewlet Packard', '../images/produktet/1653659980-6290d94c992e4.png', '../images/produktet/1653659980-6290d94c99601.png', '../images/produktet/1653659980-6290d94c99611.png', '../images/produktet/1653659980-6290d94c99625.png', 1, 'asdasdasdadsads', '21.00', 9, 1, 3, 5),
(18, 'PDPPN', '../images/produktet/1653660030-6290d97e20592.png', '../images/produktet/1654000235-62960a6b7f1bf.jpg', '../images/produktet/1654000235-62960a6b7f9b8.png', '../images/produktet/1653660030-6290d97e2088a.png', 1, 'TESTtest TESTtest TESTtest TESTtest TESTtest TESTtest', '122.00', 4, 1, 3, 5),
(21, 'Filan Fisteku', '../images/produktet/1653660434-6290db12c4a63.jpg', '../images/produktet/1653998323-629602f37fe76.jpg', '../images/produktet/1653998323-629602f3805cd.jpg', '../images/produktet/1653998468-62960384a120e.jpg', 1, 'asdasdasdadsadsadsasd', '1.00', 3, 2, 1, 2),
(22, 'test', '../images/produktet/1653998550-629603d62aaa2.jpg', '../images/produktet/1653998512-629603b00d7ee.jpg', '../images/produktet/1653998442-6296036aac79e.jpg', '../images/produktet/1653998442-6296036aac7b0.jpg', 2, '44545453', '45.00', 7, 4, 4, 2),
(23, '111', '../images/produktet/1653660744-6290dc48ca7f9.png', '../images/produktet/1653998930-629605529d743.jpg', '../images/produktet/1653998930-629605529dc2d.jpg', '../images/produktet/1653998930-629605529dc3d.jpg', 1, '111', '10.00', 8, 0, 2, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produktreview`
--

INSERT INTO `produktreview` (`reviewID`, `perdoruesi`, `starRating`, `reviewText`, `produktID`, `date`) VALUES
(1, 'asdasdasd', 2, 'asdasdasd', 21, '2022-06-10 15:48:21'),
(2, 'asdasdasd', 2, 'asdasdasd', 21, '2022-06-10 15:48:21'),
(3, 'asdasdasdasd', 5, 'asdasdasdasd', 21, '2022-06-10 15:48:21'),
(4, 'asdadasdasdasd', 4, 'asdasdasdadadasdasd', 21, '2022-06-10 15:48:21'),
(5, 'asdadasdasdasd', 4, 'asdasdasdadadasdasd', 21, '2022-06-10 15:48:21'),
(6, 'test', 2, 'test', 17, '2022-06-10 15:48:21'),
(7, 'Uranik', 1, 'UranikUranikUranikUranik', 21, '2022-06-10 17:10:37'),
(8, 'Filan Fisteku', 3, 'E mirë', 21, '2022-06-10 17:42:30'),
(9, 'Uranik', 4, '363636', 18, '2022-06-18 13:13:51'),
(10, 'Uranik', 0, 'asdadasd', 18, '2022-06-18 13:15:00'),
(11, 'Uranik', 1, 'jo edhe mire', 18, '2022-06-18 13:17:35');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
