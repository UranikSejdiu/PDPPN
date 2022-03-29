-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 01:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `code`, `status`) VALUES
(2, 'Uranik Sejdiu', 'u.sejdiu4@gmail.com', '$2y$10$jy/YVXAnWknld8Ptd/D13utJA/dEJIU92wnp0F38Fm6rGTORrcOqO', 0, 'verified'),
(10, 'Filan Fisteku', 'ferizaj0004@gmail.com', '$2y$10$Hb9wtq2/vboRcb4UBSFT1.okSz7pFdyhjxZbnC/a2BYuEivF4USTu', 0, 'verified'),
(11, 'Filan Fisteku', 'u.sejdiu56@gmail.com', '$2y$10$D7YN1dt6VXd98X9TQ7Z/Zecevy3U5CkqweVHNbTljDC6CGXW/4AXa', 0, 'verified'),
(12, 'PDPPN', 'ferizaj0006@gmail.com', '$2y$10$JHw8o7FKckyiyn4039aIO.hrxpBfti2Th/aymJtJnTNTS6PspEwr.', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `kompanite`
--

CREATE TABLE `kompanite` (
  `id` int(11) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nrfiskal` int(9) NOT NULL,
  `lokacioni` varchar(200) NOT NULL,
  `telefoni` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(999) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kompanite`
--

INSERT INTO `kompanite` (`id`, `logo`, `name`, `nrfiskal`, `lokacioni`, `telefoni`, `email`, `password`, `code`, `status`) VALUES
(1, 'img/kompanite/1648552616-6242eaa8d4ff1.png', 'asdasd', 123123, '42.560057,20.855082', '(383)48/434-177', 'u.sejdiu4@gmail.com', '$2y$10$3IwAJs2p46o7higYsFYB8ejSmAwegnbXIJ9nZs6dLwE.M1FXEgBb6', 441186, 'notverified'),
(2, 'img/kompanite/1648553826-6242ef6251728.png', 'pdppn', 9898, '42.560057,20.855082', '(+383)48/434-177', 'ferizaj0006@gmail.com', '$2y$10$dWdMCxjMrHVRQxw0wVva6OANjD8dKnHoBhNhNGZGqMG.Y0NyfhwXO', 959432, 'notverified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kompanite`
--
ALTER TABLE `kompanite`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kompanite`
--
ALTER TABLE `kompanite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
