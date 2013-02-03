-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2013 at 08:08 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE IF NOT EXISTS `favorite` (
  `favorite_id` int(11) NOT NULL AUTO_INCREMENT,
  `favorite_image_id` varchar(50) NOT NULL,
  `favorite_image_server` varchar(50) NOT NULL,
  `favorite_image_secret` varchar(50) NOT NULL,
  `favorite_user_ip` varchar(20) NOT NULL,
  `favorite_image_title` text NOT NULL,
  PRIMARY KEY (`favorite_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`favorite_id`, `favorite_image_id`, `favorite_image_server`, `favorite_image_secret`, `favorite_user_ip`, `favorite_image_title`) VALUES
(8, '8353058920', '8091', '40b054ab20', '127.0.0.1', 'test description'),
(11, '8405911348', '8189', 'f343bfeb08', '127.0.0.1', ''),
(12, '8422937351', '8230', 'e423f661d9', '127.0.0.1', ''),
(13, '8433982207', '8369', '0cfb89809a', '127.0.0.1', ''),
(14, '8345945987', '8217', '2476441a33', '127.0.0.1', ''),
(17, '8384027920', '8044', '34ce6647fd', '127.0.0.1', ''),
(18, '8300392239', '8071', 'b1c756640b', '127.0.0.1', 'yes new one is fit to be do this is'),
(19, '8412549107', '8047', '93b15064f1', '127.0.0.1', ''),
(20, '8410619495', '8212', '26f4b2ea1a', '127.0.0.1', 'test yakimbi'),
(21, '8349167719', '8331', '2468aef166', '127.0.0.1', ''),
(22, '8404802385', '8190', 'f6cc53f182', '127.0.0.1', ''),
(24, '8431836361', '8368', '62c0f53855', '127.0.0.1', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
