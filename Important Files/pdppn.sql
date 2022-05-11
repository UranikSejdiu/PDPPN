-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2022 at 01:31 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

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
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_city`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id_city`, `name`) VALUES
(1, 'Ferizaj'),
(2, 'Prishtine');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kompanite`
--

INSERT INTO `kompanite` (`id`, `logo`, `name`, `nrfiskal`, `lokacioni`, `telefoni`, `email`, `password`, `code`, `status`) VALUES
(2, 'img/kompanite/1648904652-624849cc47b45.png', 'Filan', 111111111, '42.349188,21.17604', '(+383)48/434-177', 'ferizaj0005@gmail.com', '$2y$10$/Q7yWzh8BMnFKqSNVzyXCufKI0vT96Dm.MPhYpZyWpN2ZGCBdynui', 959432, 'notverified');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontaktet`
--

INSERT INTO `kontaktet` (`id`, `subjekti`, `mesazhi`, `moduli`, `createdDate`) VALUES
(1, 'asdasdasdasdasd', 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd', 'Admin', '2022-05-11 15:11:53'),
(4, 'admin', 'adminadminadm', 'Admin', '2022-05-11 15:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `perdoruesit`
--

DROP TABLE IF EXISTS `perdoruesit`;
CREATE TABLE IF NOT EXISTS `perdoruesit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(150) NOT NULL,
  `id_city` int(11) NOT NULL,
  `adress` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(999) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cityForeignKey` (`id_city`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perdoruesit`
--

INSERT INTO `perdoruesit` (`id`, `fullName`, `id_city`, `adress`, `phone`, `email`, `password`, `code`, `status`) VALUES
(2, 'Filan Fisteku', 2, 'Mataj', '(+383)45/333-333', 'ferizaj0004@gmail.com', '$2y$10$e5FDa2mXvJ3IiDmnEAVeIeMrzT7oUMRtEYNgE4ZCAiLHRMBctdldS', 547301, 'notverified');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `perdoruesit`
--
ALTER TABLE `perdoruesit`
  ADD CONSTRAINT `cityForeignKey` FOREIGN KEY (`id_city`) REFERENCES `cities` (`id_city`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
