-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 05:54 AM
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
  `user_ID` int(10) NOT NULL,
  `order_total` decimal(10,2) NOT NULL,
  `order_tax` decimal(10,2) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `order_delivery_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_ID`, `user_ID`, `order_total`, `order_tax`, `order_date`, `order_delivery_status`) VALUES
(1607018510, 13, '46.09', '4.19', '2020-12-03 08:50:09', 'Processing Order'),
(1607029390, 13, '46.09', '4.19', '2020-12-03 08:52:08', 'Processing Order'),
(1607038642, 13, '14.16', '1.29', '2020-12-03 14:03:18', 'Processing Order'),
(1607041085, 13, '40.85', '3.71', '2020-12-03 14:01:31', 'Processing Order'),
(1607045003, 13, '4.95', '0.45', '2020-12-03 16:23:36', 'Processing Order'),
(1607045206, 13, '8.20', '0.75', '2020-12-03 15:17:17', 'Processing Order'),
(1607048628, 15, '53.04', '4.37', '2020-12-03 17:52:55', 'Processing Order'),
(1607056619, 14, '66.81', '5.62', '2020-12-03 17:37:55', 'Processing Order'),
(1607056820, 17, '2.75', '0.25', '2020-12-03 19:07:58', 'Processing Order'),
(1607061634, 17, '38.65', '3.06', '2020-12-03 19:04:03', 'Processing Order'),
(1607066159, 16, '82.72', '7.07', '2020-12-03 18:45:41', 'Processing Order');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products_details`
--

CREATE TABLE `orders_products_details` (
  `order_ID` int(11) NOT NULL,
  `product_ID` int(3) NOT NULL,
  `order_product_totalweight` decimal(10,2) NOT NULL,
  `order_product_totalquantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_products_details`
--

INSERT INTO `orders_products_details` (`order_ID`, `product_ID`, `order_product_totalweight`, `order_product_totalquantity`) VALUES
(1607029390, 404, '10.00', 10),
(1607029390, 104, '8.00', 4),
(1607041085, 303, '10.00', 4),
(1607041085, 203, '4.00', 2),
(1607038642, 401, '10.20', 3),
(1607045206, 206, '1.25', 5),
(1607045003, 106, '1.00', 1),
(1607056619, 204, '0.40', 2),
(1607056619, 101, '1.75', 5),
(1607056619, 201, '3.00', 3),
(1607056619, 403, '18.00', 2),
(1607048628, 401, '20.40', 6),
(1607048628, 203, '4.00', 2),
(1607048628, 404, '5.00', 5),
(1607066159, 402, '27.00', 3),
(1607066159, 401, '6.80', 2),
(1607061634, 203, '20.00', 10),
(1607061634, 402, '9.00', 1),
(1607056820, 104, '2.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_user_id` int(255) NOT NULL,
  `payment_fname` varchar(255) NOT NULL,
  `payment_lname` varchar(255) NOT NULL,
  `payment_email` varchar(255) NOT NULL,
  `payment_address` varchar(255) NOT NULL,
  `payment_city` varchar(255) NOT NULL,
  `payment_state` varchar(255) NOT NULL,
  `payment_zip` varchar(255) NOT NULL,
  `payment_cardholder` varchar(255) NOT NULL,
  `payment_ccnumber` varchar(255) NOT NULL,
  `payment_expmonth` varchar(255) NOT NULL,
  `payment_expyear` varchar(255) NOT NULL,
  `payment_cvv` varchar(255) NOT NULL,
  `payment_billingname` varchar(255) NOT NULL,
  `payment_billingemail` varchar(255) NOT NULL,
  `payment_billingaddress` varchar(255) NOT NULL,
  `payment_billingcity` varchar(255) NOT NULL,
  `payment_billingstate` varchar(255) NOT NULL,
  `payment_billingzip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_user_id`, `payment_fname`, `payment_lname`, `payment_email`, `payment_address`, `payment_city`, `payment_state`, `payment_zip`, `payment_cardholder`, `payment_ccnumber`, `payment_expmonth`, `payment_expyear`, `payment_cvv`, `payment_billingname`, `payment_billingemail`, `payment_billingaddress`, `payment_billingcity`, `payment_billingstate`, `payment_billingzip`) VALUES
(13, 'LiJie', 'Leow', 'lijie.leow@sjsu.edu', 'One Washington Square', 'San Jose', 'CA', '95112', 'Li Jie Leow', '0000000000000000', 'January', '2013', '333', 'Li Jie', 'lijie.leow@sjsu.edu', 'One Washington Square', 'San Jose', 'CA', '95112'),
(13, 'Li', 'Jie', 'lijie.leow@sjsu.edu', 'One Washington Square', 'San Jose', 'CA', '95112', 'Leow', '0000000000000000', 'January', '2030', '123', 'Li', 'lijie.leow@sjsu.edu', 'One Washington Square', 'San Jose', 'CA', '95112'),
(13, 'Li', 'Jie', 'lijie.leow@sjsu.edu', 'One Washington Square', 'San Jose', 'CA', '95112', 'Leow', '1231232132132131', 'January', '2011', '311', 'Li', 'lijie.leow@sjsu.edu', 'One Washington Square', 'San Jose', 'CA', '95112'),
(13, 'Li', 'Jie', 'lijie.leow@sjsu.edu', 'One Washington Square', 'San Jose', 'CA', '95112', 'Leow', '1232131232133213', 'November', '2013', '333', 'Li', 'lijie.leow@sjsu.edu', 'One Washington Square', 'San Jose', 'CA', '95112'),
(13, 'dfsa', 'Jie', 'dafsfd@gmai.com', 'fdsaf', 'adsf', 'CA', '94539', 'Leow', '1231232131231232', 'January', '2011', '333', 'dfsa', 'dafsfd@gmai.com', 'fdsaf', 'adsf', 'CA', '94539'),
(13, 'LJ', 'Leow', 'lijie.leow@sjsu.edu', 'One washington Square', 'san jose', 'CA', '95112', 'Leow', '1234123412341234', 'January', '2022', '333', 'LJ', 'lijie.leow@sjsu.edu', 'One washington Square', 'san jose', 'CA', '95112'),
(14, 'Bob', 'B', 'b@yahoo.com', '1 B', 'B', 'CA', '91023', 'B', '1123817239810273', 'January', '2021', '103', 'Bob', 'b@yahoo.com', '1 B', 'B', 'CA', '91023'),
(15, 'Bob', 'b', '2@gmail.com', '1 B', 'B', 'CA', '91032', 'B', '1238712309127309', 'January', '2021', '103', 'Bob', '2@gmail.com', '1 B', 'B', 'CA', '91032'),
(16, 'LJ', 'Leow', 'lijie.leow@sjsu.edu', 'One washington Square', 'san jose', 'CA', '95112', 'Leow', '2798123789327983', 'January', '2022', '333', 'LJ', 'lijie.leow@sjsu.edu', 'One washington Square', 'san jose', 'CA', '95112'),
(17, 'Marissa', 'Student', 'marissa@gmail.com', 'apple', 'apple', 'CA', '95123', 'Marissa', '1238912038921823', 'January', '2021', '232', 'Marissa', 'marissa@gmail.com', 'apple', 'san jose', 'CA', '95123'),
(17, 'Marissa', 'Leow', 'marissa@gmail.com', 'apple', 'apple', 'CA', '95123', 'Leow', '3204829043802342', 'January', '2022', '333', 'Marissa', 'marissa@gmail.com', 'apple', 'apple', 'CA', '95123');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_ID` int(3) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_category` varchar(45) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_weight` decimal(10,2) NOT NULL,
  `product_stock` int(5) UNSIGNED NOT NULL DEFAULT 0,
  `product_description` varchar(2555) NOT NULL,
  `product_imagename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_ID`, `product_name`, `product_category`, `product_price`, `product_weight`, `product_stock`, `product_description`, `product_imagename`) VALUES
(101, 'Organic Gala Apple', 'fruits', '0.76', '0.35', 2, 'Gala apples are high in fiber, vitamin C, and various antioxidants.', 'fruit-apple.jpg'),
(102, 'Banana', 'fruits', '0.31', '0.40', 200, 'Bananas contain a fair amount of fiber and several antioxidants.', 'fruit-banana.jpg'),
(103, 'Blueberry', 'fruits', '3.99', '0.38', 200, 'Blueberries are packed with antioxidants and phytoflavinoids; high in potassium and vitamin C.', 'fruit-blueberry.jpg'),
(104, 'Cantaloupe', 'fruits', '2.50', '2.00', 195, 'The water, antioxidants, vitamins, and minerals provide a variety of health benefits.', 'fruit-cantaloupe.jpg'),
(105, 'Peach', 'fruits', '1.81', '0.30', 200, 'Peaches are low in calories, and contain no saturated fats.', 'fruit-peach.jpg'),
(106, 'Strawberry', 'fruits', '4.50', '1.00', 199, 'They’re an excellent source of vitamin C and manganese and also contain decent amounts of folate and potassium.', 'fruit-strawberry.jpg'),
(201, 'Asparagus', 'vegetables', '3.01', '1.00', 3, 'Asparagus is low in calories and packed with essential vitamins, minerals and antioxidants.', 'vegetable-asparagus.jpg'),
(202, 'Beans', 'vegetables', '1.99', '1.00', 200, 'Beans provide protein, fiber, folate, iron, potassium and magnesium.', 'vegetable-beans.jpg'),
(203, 'Cabbage', 'vegetables', '0.99', '2.00', 186, 'Cabbage is a good source of potassium, folate, vitamin K, calcium, iron, vitamin A, and vitamin C.', 'vegetable-cabbage.jpg'),
(204, 'Carrot', 'vegetables', '0.99', '0.20', 193, 'Carrot is a particularly good source of beta carotene, fiber, vitamin K1, potassium, and antioxidants.', 'vegetable-carrot.jpg'),
(205, 'Pepper', 'vegetables', '0.99', '0.40', 200, 'Peppers are packed with vitamins and low in calories; excellent source of vitamin A, vitamin C, and potassium.', 'vegetable-pepper.jpg'),
(206, 'Tomato', 'vegetables', '1.49', '0.25', 195, 'Major dietary source of the antioxidant lycopene; great source of vitamin C, potassium, folate, and vitamin K.', 'vegetable-tomato.jpg'),
(301, 'Creamer', 'Dairy & Eggs', '4.49', '1.50', 200, 'Transform your everyday coffee into something extraordinary.', 'dairy-creamer.jpg'),
(302, 'Milk', 'Dairy & Eggs', '7.99', '4.20', 200, 'Good source of Vitamin D, Riboflavin, Vitamin B12, Calcium and Phosphorus.', 'dairy-milk.jpg'),
(303, 'Egg', 'Dairy & Eggs', '8.79', '2.50', 196, 'Eggs contain protein, healthy fats, vitamins A, D, E, choline, iron and folate.', 'dairy-vitalegg.jpg'),
(304, 'Oatmilk', 'Dairy & Eggs', '4.49', '3.00', 200, 'Oat milk is rich in fiber and essential vitamins, such as vitamin A, B12 and D.', 'dairy-oatmilk.jpg'),
(305, 'Eggland', 'Dairy & Eggs', '3.99', '1.30', 200, 'Eggs contain protein, healthy fats, vitamins A, D, E, choline, iron and folate.', 'dairy-eggland.jpg'),
(306, 'Yogurt', 'Dairy & Eggs', '1.00', '0.33', 200, 'Yogurt is an excellent source of protein, calcium and potassium.', 'dairy-yogurt.jpg'),
(401, 'Apple juice', 'beverages', '4.29', '3.40', 189, 'Apple juice contains minerals such as calcium, potassium, iron, manganese and magnesium. ', 'beverage-applejuice.jpg'),
(402, 'Berry seltzer', 'beverages', '20.69', '9.00', 196, '100% All Natural Sparkling Seltzer Water; low sugars; Splash of all-natural fruit flavor.', 'beverage-berryseltzer.jpg'),
(403, 'Citrus seltzer', 'beverages', '20.69', '9.00', 198, '100% All Natural Sparkling Seltzer Water; low sugars; Splash of all-natural fruit flavor.', 'beverage-citrusseltzer.jpg'),
(404, 'Kombucha', 'beverages', '3.19', '1.00', 4, 'Fermented tea plus real, organic & raw ingredients – never concentrates or flavorings', 'beverage-kombucha.jpg'),
(405, 'Mint tea', 'beverages', '8.69', '0.09', 200, 'Our tea bags are constructed of Abacá Hemp Fiber Paper. They are free of dyes, adhesive, glue and chlorine bleach.', 'beverage-minttea.jpg'),
(406, 'Peach tea', 'beverages', '1.48', '1.06', 200, 'All Honest Tea Organic iced tea beverages are real brewed with Fair Trade Certified tea leaves, gluten Free, OU Kosher certified, and Non GMO.', 'beverage-peachtea.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_loginname` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_loginname`, `user_password`, `user_name`, `user_email`) VALUES
(13, 'test', '8eee3efdde1eb6cf6639a58848362bf4', 'Li Jie', 'lijie.leow@sjsu.edu'),
(14, 'stan1', '202cb962ac59075b964b07152d234b70', 's', '2@gmail.com'),
(15, 'stan2', '202cb962ac59075b964b07152d234b70', 'Stan', 'thong2@gmail.com'),
(16, 'test3', '86985e105f79b95d6bc918fb45ec7727', 'test3', 'test3@gmail.com'),
(17, 'marissa', '098f6bcd4621d373cade4e832627b4f6', 'Marissa', 'marissa@gmail.com'),
(18, 'example', 'e10adc3949ba59abbe56e057f20f883e', 'example', 'example@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `orders_products_details`
--
ALTER TABLE `orders_products_details`
  ADD KEY `FK_orderDetails_orders` (`order_ID`),
  ADD KEY `FK_orderDetails_Product` (`product_ID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD KEY `FK_Payment_User` (`payment_user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_ID`);

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_userOrder` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `orders_products_details`
--
ALTER TABLE `orders_products_details`
  ADD CONSTRAINT `FK_orderDetails_Product` FOREIGN KEY (`product_ID`) REFERENCES `products` (`product_ID`),
  ADD CONSTRAINT `FK_orderDetails_orders` FOREIGN KEY (`order_ID`) REFERENCES `orders` (`order_ID`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `FK_Payment_User` FOREIGN KEY (`payment_user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
