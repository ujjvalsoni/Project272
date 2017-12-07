-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2017 at 05:34 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market_272`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pdesc` varchar(50) NOT NULL,
  `pimg` varchar(50) NOT NULL,
  `pprice` decimal(10,0) NOT NULL,
  `pavail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `sid`, `pname`, `pdesc`, `pimg`, `pprice`, `pavail`) VALUES
(3, 1, 'Product1', 'P1_Description ', 'p1.jpg', '100', 10),
(4, 2, 'Product2', 'P2_Description ', 'p2.jpg', '200', 5),
(5, 1, 'Product1', 'P1_Description ', 'p1.jpg', '100', 10),
(6, 2, 'Product2', 'P2_Description ', 'p2.jpg', '200', 5),
(7, 1, 'Product1', 'P1_Description ', 'p1.jpg', '100', 10),
(8, 2, 'Product2', 'P2_Description ', 'p2.jpg', '200', 5),
(9, 1, 'Product1', 'P1_Description ', 'p1.jpg', '100', 10),
(10, 2, 'Product2', 'P2_Description ', 'p2.jpg', '200', 5),
(11, 1, 'Product1', 'P1_Description ', 'p1.jpg', '100', 10),
(12, 2, 'Product2', 'P2_Description ', 'p2.jpg', '200', 5),
(13, 1, 'Product1', 'P1_Description ', 'p1.jpg', '100', 10),
(14, 2, 'Product2', 'P2_Description ', 'p2.jpg', '200', 5),
(15, 1, 'Product1', 'P1_Description ', 'p1.jpg', '100', 10),
(16, 2, 'Product2', 'P2_Description ', 'p2.jpg', '200', 5),
(17, 1, 'Product1', 'P1_Description ', 'p1.jpg', '100', 10),
(18, 2, 'Product2', 'P2_Description ', 'p2.jpg', '200', 5),
(19, 1, 'Product1', 'P1_Description ', 'p1.jpg', '100', 10),
(20, 3, 'Product2', 'P2_Description ', 'p2.jpg', '200', 5),
(21, 3, 'Product1', 'P1_Description ', 'p1.jpg', '100', 10),
(22, 3, 'Product2', 'P2_Description ', 'p2.jpg', '200', 5),
(23, 3, 'Product1', 'P1_Description ', 'p1.jpg', '100', 10),
(24, 3, 'Product2', 'P2_Description ', 'p2.jpg', '200', 5),
(25, 3, 'Product1', 'P1_Description ', 'p1.jpg', '100', 10),
(26, 3, 'Product2', 'P2_Description ', 'p2.jpg', '200', 5),
(27, 4, 'Product1', 'P1_Description ', 'p1.jpg', '100', 10),
(28, 4, 'Product2', 'P2_Description ', 'p2.jpg', '200', 5),
(29, 4, 'Product1', 'P1_Description ', 'p1.jpg', '100', 10),
(30, 4, 'Product2', 'P2_Description ', 'p2.jpg', '200', 5),
(31, 4, 'Product1', 'P1_Description ', 'p1.jpg', '100', 10),
(32, 4, 'Product2', 'P2_Description ', 'p2.jpg', '200', 5),
(33, 4, 'Product1', 'P1_Description ', 'p1.jpg', '100', 10),
(34, 4, 'Product2', 'P2_Description ', 'p2.jpg', '200', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `rating` decimal(10,0) NOT NULL,
  `review` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `sid` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `semail` varchar(50) NOT NULL,
  `swebsite` varchar(50) NOT NULL,
  `scontact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`sid`, `sname`, `semail`, `swebsite`, `scontact`) VALUES
(1, 'Mandipsinh', 'mandipsinh@gmail.com', 'mandipnish.com', '123456789'),
(2, 'Ujjval', 'u@u.com', 'www.ujjval.com', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uemail` varchar(50) NOT NULL,
  `upass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
