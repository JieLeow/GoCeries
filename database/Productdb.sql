-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2020 at 06:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Productdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`) VALUES
(1, 1, 2),
(1, 1, 3),
(1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Producttb`
--

CREATE TABLE `Producttb` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(25) NOT NULL,
  `item_price` float DEFAULT NULL,
  `item_weight` float DEFAULT NULL,
  `item_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Producttb`
--

INSERT INTO `Producttb` (`item_id`, `item_name`, `item_price`, `item_weight`, `item_image`) VALUES
(1, 'Apple', 3.99, 1, './upload/apple.jpg'),
(2, 'Banana', 1.69, 1, './upload/banana.png'),
(3, 'Roma Tomato', 2.99, 1, './upload/tomato.jpg'),
(4, 'Strawberries', 3.69, 1, './upload/strawberries.jpg'),
(5, 'Carrots', 1.69, 1, './upload/carrots.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Producttb`
--
ALTER TABLE `Producttb`
  ADD PRIMARY KEY (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Producttb`
--
ALTER TABLE `Producttb`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
