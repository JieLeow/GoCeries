-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 05:13 AM
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
  `order_total` int(11) NOT NULL,
  `order_tax` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `order_delivery_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Table structure for table `orders_products_details`
--

CREATE TABLE `orders_products_details` (
  `order_product_details_ID` int(11) NOT NULL,
  `order_ID` int(11) NOT NULL,
  `product_ID` int(3) NOT NULL,
  `order_product_totalweight` decimal(10,2) NOT NULL,
  `order_product_totalquantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_user_id` int(255) NOT NULL,    -- added foreign key to userID -----
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
  `product_stock` int(5) NOT NULL,
  `product_description` varchar(2555) NOT NULL,
  `product_imagename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_ID`, `product_name`, `product_category`, `product_price`, `product_weight`, `product_stock`, `product_description`, `product_imagename`) VALUES
(101, 'Organic Gala Apple', 'fruits', '0.76', '0.35', 5, 'Gala apples are high in fiber, vitamin C, and various antioxidants.', 'fruit-apple.jpg'),
(102, 'Banana', 'fruits', '0.31', '0.40', 200, 'Bananas contain a fair amount of fiber and several antioxidants.', 'fruit-banana.jpg'),
(103, 'Blueberry', 'fruits', '3.99', '0.38', 200, 'Blueberries are packed with antioxidants and phytoflavinoids; high in potassium and vitamin C.', 'fruit-blueberry.jpg'),
(104, 'Cantaloupe', 'fruits', '2.50', '2.00', 200, 'The water, antioxidants, vitamins, and minerals provide a variety of health benefits.', 'fruit-cantaloupe.jpg'),
(105, 'Peach', 'fruits', '1.81', '0.30', 200, 'Peaches are low in calories, and contain no saturated fats.', 'fruit-peach.jpg'),
(106, 'Strawberry', 'fruits', '4.50', '1.00', 200, 'They’re an excellent source of vitamin C and manganese and also contain decent amounts of folate and potassium.', 'fruit-strawberry.jpg'),
(201, 'Asparagus', 'vegetables', '3.01', '1.00', 200, 'Asparagus is low in calories and packed with essential vitamins, minerals and antioxidants.', 'vegetable-asparagus.jpg'),
(202, 'Beans', 'vegetables', '1.99', '1.00', 200, 'Beans provide protein, fiber, folate, iron, potassium and magnesium.', 'vegetable-beans.jpg'),
(203, 'Cabbage', 'vegetables', '0.99', '2.00', 200, 'Cabbage is a good source of potassium, folate, vitamin K, calcium, iron, vitamin A, and vitamin C.', 'vegetable-cabbage.jpg'),
(204, 'Carrot', 'vegetables', '0.99', '0.20', 200, 'Carrot is a particularly good source of beta carotene, fiber, vitamin K1, potassium, and antioxidants.', 'vegetable-carrot.jpg'),
(205, 'Pepper', 'vegetables', '0.99', '0.40', 200, 'Peppers are packed with vitamins and low in calories; excellent source of vitamin A, vitamin C, and potassium.', 'vegetable-pepper.jpg'),
(206, 'Tomato', 'vegetables', '1.49', '0.25', 200, 'Major dietary source of the antioxidant lycopene; great source of vitamin C, potassium, folate, and vitamin K.', 'vegetable-tomato.jpg'),
(301, 'Creamer', 'Dairy & Eggs', '4.49', '1.50', 200, 'Transform your everyday coffee into something extraordinary.', 'dairy-creamer.jpg'),
(302, 'Milk', 'Dairy & Eggs', '7.99', '4.20', 200, 'Good source of Vitamin D, Riboflavin, Vitamin B12, Calcium and Phosphorus.', 'dairy-milk.jpg'),
(303, 'Egg', 'Dairy & Eggs', '8.79', '2.50', 200, 'Eggs contain protein, healthy fats, vitamins A, D, E, choline, iron and folate.', 'dairy-vitalegg.jpg'),
(304, 'Oatmilk', 'Dairy & Eggs', '4.49', '3.00', 200, 'Oat milk is rich in fiber and essential vitamins, such as vitamin A, B12 and D.', 'dairy-oatmilk.jpg'),
(305, 'Eggland', 'Dairy & Eggs', '3.99', '1.30', 200, 'Eggs contain protein, healthy fats, vitamins A, D, E, choline, iron and folate.', 'dairy-eggland.jpg'),
(306, 'Yogurt', 'Dairy & Eggs', '1.00', '0.33', 200, 'Yogurt is an excellent source of protein, calcium and potassium.', 'dairy-yogurt.jpg'),
(401, 'Apple juice', 'beverages', '4.29', '3.40', 200, 'Apple juice contains minerals such as calcium, potassium, iron, manganese and magnesium. ', 'beverage-applejuice.jpg'),
(402, 'Berry seltzer', 'beverages', '20.69', '9.00', 200, '100% All Natural Sparkling Seltzer Water; low sugars; Splash of all-natural fruit flavor.', 'beverage-berryseltzer.jpg'),
(403, 'Citrus seltzer', 'beverages', '20.69', '9.00', 200, '100% All Natural Sparkling Seltzer Water; low sugars; Splash of all-natural fruit flavor.', 'beverage-citrusseltzer.jpg'),
(404, 'Kombucha', 'beverages', '3.19', '1.00', 200, 'Fermented tea plus real, organic & raw ingredients – never concentrates or flavorings', 'beverage-kombucha.jpg'),
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
(3, 'hi', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test@email.com'),
(4, 'master', '0cc175b9c0f1b6a831c399e269772661', 'master', 'lljie2000@hotmail.com'),
(5, 'lijie', 'test2', 'test', '2000.lljie@gmail.com'),
(6, 'testinghash', '900150983cd24fb0d6963f7d28e17f72', 'testinghash', 'abc@gmail.com');

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
  ADD PRIMARY KEY (`order_product_details_ID`),
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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
