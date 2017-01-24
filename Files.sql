-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 24, 2017 at 12:17 
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `files`
--

-- --------------------------------------------------------

--
-- Table structure for table `Files`
--

CREATE TABLE `Files` (
  `UserFileID` int(11) NOT NULL,
  `UserFileName` varchar(226) NOT NULL,
  `UserLastChecked` datetime NOT NULL,
  `UserLastReplaced` datetime NOT NULL,
  `UserFileStatus` varchar(255) NOT NULL,
  `UserMoreInfo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Files`
--

INSERT INTO `Files` (`UserFileID`, `UserFileName`, `UserLastChecked`, `UserLastReplaced`, `UserFileStatus`, `UserMoreInfo`) VALUES
(1, 'www.kpro.co.za', '2017-01-14 15:30:01', '2017-01-15 14:30:01', 'green', 'needs impovement'),
(1, 'www.kpro.co.za', '2017-01-14 15:30:01', '2017-01-15 14:30:01', 'green', 'needs impovement'),
(1, 'www.kpro.co.za', '2017-01-14 15:30:01', '2017-01-15 14:30:01', 'green', 'needs impovement'),
(1, 'www.kpro.co.za', '2017-01-14 15:30:01', '2017-01-15 14:30:01', 'green', 'needs impovement');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
