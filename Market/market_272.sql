-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 07, 2017 at 06:11 PM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `market_272`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pdesc` varchar(50) NOT NULL,
  `pimg` varchar(50) NOT NULL,
  `pprice` decimal(10,0) NOT NULL,
  `pavail` int(11) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `sid` (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `rating` decimal(10,0) NOT NULL,
  `review` varchar(50) NOT NULL,
  PRIMARY KEY (`rid`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE IF NOT EXISTS `sellers` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `sname` varchar(50) NOT NULL,
  `semail` varchar(50) NOT NULL,
  `swebsite` varchar(50) NOT NULL,
  `scontact` varchar(50) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`sid`, `sname`, `semail`, `swebsite`, `scontact`) VALUES
(1, 'Mandipsinh', 'mandipsinh@gmail.com', 'mandipnish.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uemail` varchar(50) NOT NULL,
  `upass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `sellers` (`sid`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
