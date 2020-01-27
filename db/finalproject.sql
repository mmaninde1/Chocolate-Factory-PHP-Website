-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 27, 2020 at 07:51 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE IF NOT EXISTS `admin_user` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products_table`
--

DROP TABLE IF EXISTS `products_table`;
CREATE TABLE IF NOT EXISTS `products_table` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `min_order` int(11) NOT NULL,
  `n_likes` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_table`
--

INSERT INTO `products_table` (`p_id`, `name`, `description`, `img_url`, `price`, `min_order`, `n_likes`) VALUES
(13, 'Bounty', 'chocolate covering with coconut', 'bounty.jpg', 3.99, 1, 1),
(14, 'Camino', 'salted caramel crunch', 'camino.jpg', 2.99, 1, 0),
(15, 'Caramilk', 'Caramel and milk with chocolate', 'caramilk.jpg', 1.25, 1, 0),
(16, 'Crunky', 'Crunch Chocolate', 'crunky.jpg', 2.25, 1, 0),
(17, 'Dove', 'Dark Chocolate', 'dove.jpg', 6.49, 1, 0),
(18, 'Oh Henry', 'Peanuts, Caramel and fudge coated in chocolate', 'ohhenry.jpg', 1.99, 1, 0),
(19, 'Snickers', 'Peanuts with Caramel', 'snickers.jpg', 3, 1, 0),
(20, 'Reese', 'Pretzels, peanut butter, caramel and chocolate', 'resses.jpg', 6.99, 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
