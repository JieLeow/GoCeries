-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2020 at 05:41 AM
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
-- Database: `goceries`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_ID`, `user_ID`, `product_ID`) VALUES
(1, 1, 101),
(1, 1, 102);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_ID` int(3) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_category` varchar(45) NOT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_weight` decimal(10,2) DEFAULT NULL,
  `product_stock` int(5) NOT NULL,
  `product_description` varchar(2555) NOT NULL,
  `product_imagename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_ID`, `product_name`, `product_category`, `product_price`, `product_weight`, `product_stock`, `product_description`, `product_imagename`) VALUES
(101, 'Organic Gala Apple', 'fruits', '2.99', '0.35', 100, '', 'fruit-apple.jpg'),
(102, 'Banana', 'fruits', '1.99', '0.35', 100, '', 'fruit-apple.jpg'),
(103, 'Blueberry', 'fruits', '2.99', '0.35', 100, '', 'fruit-apple.jpg'),
(104, 'Cantaloupe', 'fruits', '0.76', '0.35', 100, '', 'fruit-apple.jpg'),
(105, 'Peach', 'fruits', '0.76', '0.35', 100, '', 'fruit-apple.jpg'),
(106, 'Strawberry', 'fruits', '0.76', '0.35', 100, '', 'fruit-apple.jpg'),
(201, 'Asparagus', 'vegetables', '0.76', '0.35', 100, '', 'fruit-apple.jpg'),
(202, 'Beans', 'vegetables', '0.76', '0.35', 100, '', 'fruit-apple.jpg'),
(203, 'Cabbage', 'vegetables', '0.76', '0.35', 100, '', 'fruit-apple.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
