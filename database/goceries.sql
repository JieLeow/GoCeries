-- MySQL Script generated by MySQL Workbench
-- Fri Nov 13 02:02:59 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;


-- -----------------------------------------------------
-- Schema goceries
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `goceries` DEFAULT CHARACTER SET utf8mb4 ;
USE `goceries` ;

-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` INT(11) NOT NULL,
  `user_loginname` VARCHAR(255) NOT NULL,
  `user_password` VARCHAR(255) NOT NULL,
  `user_name` VARCHAR(255) NOT NULL,
  `user_email` VARCHAR(255) NOT NULL

  )

ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

INSERT INTO `users` (`user_id`, `user_loginname`, `user_password`, `user_name`,`user_email`) VALUES
(1, 'stan123', '123', 'Stan', 's@gmail.com'),
(2, 'k123', 'abc', 'K','k@gmail.com');


ALTER TABLE `users`
ADD PRIMARY KEY (`user_id`);
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;


-- -----------------------------------------------------
-- Table `orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `orders` (
  `order_ID` INT(11) NOT NULL,
  `user_ID` INT(10) NOT NULL,
  `order_total` INT(11) NOT NULL,
  `order_tax` INT(11) NOT NULL,
  `order_date` DATETIME NULL,
  `order_delivery_status` VARCHAR(45) NULL,
  PRIMARY KEY (`order_ID`)
  -- CONSTRAINT FK_person_who_ordered
  --   FOREIGN KEY (`user_ID`)
  --   REFERENCES `users` (`user_ID`)
  )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `products` (
  `product_ID` INT(3) NOT NULL,
  `product_name` VARCHAR(255) NOT NULL,
  `product_category` VARCHAR(45) NOT NULL,
  `product_price` DECIMAL(10,2) NOT NULL,
  `product_weight` DECIMAL(10,2) NOT NULL,
  `product_stock` INT(5) NOT NULL,
  `product_description` VARCHAR(2555) NOT NULL,
  `product_imagename` VARCHAR(255) NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `orders_products_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `orders_products_details` (
  `order_product_details_ID` INT(11) NOT NULL,
  `order_ID` INT(11) NOT NULL,
  `product_ID` INT(3) NOT NULL,
  `order_product_totalweight` DECIMAL(10,2) NOT NULL,
  `order_product_totalquantity` INT NOT NULL,
  PRIMARY KEY (`order_product_details_ID`),
  CONSTRAINT FK_orderID
    FOREIGN KEY (`order_ID`)
    REFERENCES `orders` (`order_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
  -- CONSTRAINT FK_product_ID
  --   FOREIGN KEY (`product_ID`)
  --   REFERENCES `products` (`product_ID`).
  --   ON DELETE NO ACTION
  --   ON UPDATE NO ACTION
  )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;



-- ------------------------------------------------------
--    Dump products data to products table
-- ------------------------------------------------------
INSERT INTO `products` (`product_ID`,`product_name`,`product_category`,`product_price`, `product_weight`, `product_stock`, `product_description`,
`product_imagename`)

VALUES
(101, 'Organic Gala Apple', 'fruits', 0.76 , 0.35 ,200, 'Gala apples are high in fiber, vitamin C, and various antioxidants.', 'fruit-apple.jpg' ),
(102, 'Banana', 'fruits', 0.31 , 0.4, 200, 'Bananas contain a fair amount of fiber and several antioxidants.', 'fruit-banana.jpg' ),
(103, 'Blueberry', 'fruits', 3.99 , 6, 200, 'Blueberries are packed with antioxidants and phytoflavinoids; high in potassium and vitamin C.', 'fruit-blueberry.jpg' ),
(104, 'Cantaloupe', 'fruits', 2.5 , 2, 200, 'The water, antioxidants, vitamins, and minerals provide a variety of health benefits.', 'fruit-cantaloupe.jpg' ),
(105, 'Peach', 'fruits', 1.81 , 0.3, 200, 'Peaches are low in calories, and contain no saturated fats.', 'fruit-peach.jpg' ),
(106, 'Strawberry', 'fruits', 4.5 , 1, 200, 'They’re an excellent source of vitamin C and manganese and also contain decent amounts of folate and potassium.', 'fruit-strawberry.jpg' ),
(201, 'Asparagus','vegetables', 3.01 , 1, 200, 'Asparagus is low in calories and packed with essential vitamins, minerals and antioxidants.', 'vegetable-asparagus.jpg' ),
(202, 'Beans', 'vegetables', 1.99 , 1, 200, 'Beans provide protein, fiber, folate, iron, potassium and magnesium.', 'vegetable-beans.jpg' ),
(203, 'Cabbage', 'vegetables', 0.99 , 2, 200, 'Cabbage is a good source of potassium, folate, vitamin K, calcium, iron, vitamin A, and vitamin C.', 'vegetable-cabbage.jpg' ),
(204, 'Carrot', 'vegetables', 0.99 , 0.2, 200, 'Carrot is a particularly good source of beta carotene, fiber, vitamin K1, potassium, and antioxidants.', 'vegetable-carrot.jpg' ),
(205, 'Pepper', 'vegetables', 0.99 , 0.4, 200, 'Peppers are packed with vitamins and low in calories; excellent source of vitamin A, vitamin C, and potassium.' , 'vegetable-pepper.jpg' ),
(206, 'Tomato', 'vegetables', 1.49 , 0.25, 200,'Major dietary source of the antioxidant lycopene; great source of vitamin C, potassium, folate, and vitamin K.', 'vegetable-tomato.jpg' ),
(301, 'Creamer', 'Dairy & Eggs', 4.49 , 1.5, 200, 'Transform your everyday coffee into something extraordinary.', 'dairy-creamer.jpg' ),
(302, 'Milk', 'Dairy & Eggs', 7.99 , 4.2, 200, 'Good source of Vitamin D, Riboflavin, Vitamin B12, Calcium and Phosphorus.', 'dairy-milk.jpg' ),
(303, 'Egg', 'Dairy & Eggs',8.79 , 2.5, 200, 'Eggs contain protein, healthy fats, vitamins A, D, E, choline, iron and folate.', 'dairy-vitalegg.jpg' ),
(304, 'Oatmilk', 'Dairy & Eggs',4.49 , 3, 200, 'Oat milk is rich in fiber and essential vitamins, such as vitamin A, B12 and D.', 'dairy-oatmilk.jpg' ),
(305, 'Eggland', 'Dairy & Eggs',3.99 , 1.3, 200, 'Eggs contain protein, healthy fats, vitamins A, D, E, choline, iron and folate.', 'dairy-eggland.jpg' ),
(306, 'Yogurt', 'Dairy & Eggs',1.00 , 0.33, 200, 'Yogurt is an excellent source of protein, calcium and potassium.', 'dairy-yogurt.jpg' ),
(401, 'Apple juice', 'beverages',4.29 , 3.4, 200, 'Apple juice contains minerals such as calcium, potassium, iron, manganese and magnesium. ', 'beverage-applejuice.jpg' ),
(402, 'Berry seltzer', 'beverages',20.69 , 9, 200, '100% All Natural Sparkling Seltzer Water; low sugars; Splash of all-natural fruit flavor.', 'beverage-berryseltzer.jpg' ),
(403, 'Citrus seltzer', 'beverages',20.69 , 9, 200, '100% All Natural Sparkling Seltzer Water; low sugars; Splash of all-natural fruit flavor.', 'beverage-citrusseltzer.jpg' ),
(404, 'Kombucha', 'beverages',3.19 , 1, 200, 'Fermented tea plus real, organic & raw ingredients – never concentrates or flavorings', 'beverage-kombucha.jpg' ),
(405, 'Mint tea', 'beverages',8.69 , 0.5, 200, 'Our tea bags are constructed of Abacá Hemp Fiber Paper. They are free of dyes, adhesive, glue and chlorine bleach.', 'beverage-minttea.jpg' ),
(406, 'Peach tea', 'beverages',1.48 , 1.06, 200, 'All Honest Tea Organic iced tea beverages are real brewed with Fair Trade Certified tea leaves, gluten Free, OU Kosher certified, and Non GMO.', 'beverage-peachtea.jpg' );
