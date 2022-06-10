-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 27, 2022 at 12:52 AM
-- Server version: 8.0.21
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, '1'),
(10, '2'),
(11, '3'),
(12, '4'),
(15, 'rgdergr'),
(14, 'ayham'),
(16, 'rgdrgdgrd'),
(17, 'ngfngngfggggggggggggggggggg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `phone`, `message`) VALUES
(0, 'North Theodore', 'aaa@gmail.com', 'trtr', 4864, 'rttrrt');

-- --------------------------------------------------------

--
-- Table structure for table `element`
--

DROP TABLE IF EXISTS `element`;
CREATE TABLE IF NOT EXISTS `element` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` bigint DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `element`
--

INSERT INTO `element` (`id`, `category_id`, `name`, `email`, `price`, `image`, `description`, `file`, `location`) VALUES
(132, 15, 'ayham', 'rashed@gmail.com', '12', '1652547145.88.jpg', 'asssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '', 'https://maps.google.com/?q=31.990967, 35.969737'),
(133, 14, 'assasasasaas', 'rashed@gmail.com', '', '1652547172.88.jpg', 'sdsdddddddddddddddddddd', '1652547172.22.pdf', ''),
(134, 15, 'ayham', 'rashed@gmail.com', '12', '1652553278.88.jpg', 'hjfkgyjgijkhk', '', 'https://maps.google.com/?q=31.990967, 35.969737'),
(135, 15, 'k.m.kmn', 'rashed@gmail.com', '', '1652553313.88.jpg', 'jk,glkiugvjhvjkh', '1652553313.22.pdf', ''),
(136, 15, 'dfgfgfg', 'rashed@gmail.com', '4545', '1653610375.1.png', 'fdeffefefe', '', 'https://maps.google.com/?q=31.990967, 35.969737'),
(137, 15, 'dfgfgfg', 'rashed@gmail.com', '4545', '1653610432.1.png', 'fdeffefefe', '', 'https://maps.google.com/?q=31.990967, 35.969737'),
(138, 17, 'ayham', 'rashed@gmail.com', '45', '1653610455.1.png', 'fdeseffeefses', '', 'https://maps.google.com/?q=31.990967, 35.969737'),
(139, 11, 'ayham', 'rashed@gmail.com', '54', '1653610571.11.jpg', 'regegrre', '', 'https://maps.google.com/?q=31.990967, 35.969737');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'rashed@gmail.com', '12341234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
