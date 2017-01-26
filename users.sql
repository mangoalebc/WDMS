-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2017 at 08:43 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `academycity`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(3) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_ipaddress` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `user_email`, `user_password`, `user_ipaddress`) VALUES
(9, 'Bokang Molema', 'Bokangm@gmail.com', '9166c3658c96dc972d3582fcc780b0bb', 'www.w3schools.com'),
(12, 'Tebogo Lejaka', 'tebogo@csir.co.za', 'f373b8a2db08d0ec2a8144a7811e150c', '52.222.238.241'),
(13, 'Palesa Antony', 'palesa@csir.co.za', '7da4e383591df682f22d0b8bcbbc33e1', 'www.github.com'),
(14, 'Dineo Malatji', 'dineo@gmail.com', '597e80ebae976d81b2f21a175d4a39e0', 'www.w3schools.com'),
(15, 'Glenn Masango', 'glenn@gmail.com', '20c199f74a584a2b11bc4c89c40acaed', 'www.github.com'),
(16, 'Tumi Mshi', 'mshi@gmail.com', '94c2a75ad5df55b4571d47c3ed9dacf9', 'www.google.com'),
(17, 'Thami Now', 'now@gmail.com', '4ea1a5551b728586ba715ac53f042acc', 'www.w3schools.com'),
(18, 'Thami Nowe', 'nowe@gmail.com', 'a352633e3cbfc2f015bd6a8a802656c2', 'www.w3schools.com'),
(19, 'Lerato Millu', 'Lerato@gmail.com', 'b476c8494f5697e8dd8b3103af4ef523', 'www.google.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
