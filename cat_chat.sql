-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 09, 2020 at 01:38 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cat_chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8mb4_bin NOT NULL,
  `user_id` int(100) NOT NULL,
  `msg` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `username`, `user_id`, `msg`) VALUES
(1, 'jasmin', 5, 'I love you'),
(2, 'joselin', 3, 'I love you too'),
(3, 'joselin', 3, 'hehehehz'),
(4, 'joselin', 3, 'hi'),
(5, 'jasmin', 5, 'I love vv ko'),
(6, 'joselin', 3, 'I love you too'),
(7, 'joselin', 3, 'mwa'),
(8, 'joselin', 3, 'mwa'),
(9, 'joselin', 3, 'kiss'),
(10, 'jasmin', 5, 'k'),
(11, 'joselin', 3, 'IHH'),
(12, 'joselin', 3, 'vv'),
(13, 'joselin', 3, 'I love you'),
(14, 'joselin', 3, 'mwa'),
(15, 'joselin', 3, 'I love you'),
(16, 'joselin', 3, 'Hello'),
(17, 'jasmin', 5, 'hello'),
(18, 'joselin', 3, 'Mwa'),
(19, 'joselin', 3, 'mwa'),
(20, 'jasmin', 5, 'KO'),
(21, 'joselin', 3, 'yow'),
(22, 'joselin', 3, 'sdsd'),
(23, 'test', 8, 'a'),
(24, 'test', 8, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `typing` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `typing`) VALUES
(3, 'joselin', 'joselin', 'no'),
(5, 'jasmin', 'jasmin', 'no'),
(8, 'test', 'test', 'no');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
