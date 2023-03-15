-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 02:22 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ceedoos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_tb`
--

CREATE TABLE `cart_tb` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `cart_number` int(11) NOT NULL,
  `item_number` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_tb`
--

CREATE TABLE `customer_tb` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_initial` varchar(2) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `order_count` int(11) NOT NULL DEFAULT 0,
  `address` varchar(100) NOT NULL,
  `baranggay` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `username` varchar(75) NOT NULL,
  `password` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_tb`
--

INSERT INTO `customer_tb` (`customer_id`, `first_name`, `middle_initial`, `last_name`, `contact_number`, `email`, `order_count`, `address`, `baranggay`, `city`, `username`, `password`) VALUES
(13, 'Jan Patrick', 'D', 'Edisan', '09063264907', 'janpatrickedisan0407@gmail.com', 0, '168Dao St.', 'Marikina Heights', 'Marikina', 'jaypee', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(14, 'Jan Patrick', 'D', 'Edisan', '09063264907', 'janpatrickedisan0407@gmail.com', 0, '', '', '', 'jp', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(15, '', '', '', '', '', 0, '', '', '', '', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855');

-- --------------------------------------------------------

--
-- Table structure for table `employee_tb`
--

CREATE TABLE `employee_tb` (
  `employee_id` int(11) NOT NULL,
  `employee_type` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_initial` varchar(2) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `baranggay` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `username` varchar(75) NOT NULL,
  `password` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_tb`
--

INSERT INTO `employee_tb` (`employee_id`, `employee_type`, `first_name`, `middle_initial`, `last_name`, `contact_number`, `email`, `address`, `baranggay`, `city`, `username`, `password`) VALUES
(1, 'admin', '', '', '', '', '', '26 Yamson/Ignacio Cruz St.', 'San Roque', 'Marikina', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
(2, 'staff', 'Jan Patrick', 'D', 'Edisan', '09063264907', 'janpatrickedisan0407@gmail.com', '168 Dao St. ', 'Marikina Heights', 'Marikina', 'jaypee', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_table`
--

CREATE TABLE `inventory_table` (
  `item_id` int(11) NOT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_address` varchar(150) DEFAULT NULL,
  `cust_contact` int(11) DEFAULT NULL,
  `del_pick_time` time NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `ordered_from` varchar(50) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `rider` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `orders` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `cart_number` int(11) NOT NULL,
  `item_number` int(11) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_address` varchar(150) DEFAULT NULL,
  `cust_contact` int(11) DEFAULT NULL,
  `del_pick_time` time NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `ordered_from` varchar(50) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `rider` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `orders` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products_tb`
--

CREATE TABLE `products_tb` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_ingredients` varchar(200) DEFAULT NULL,
  `product_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_tb`
--

INSERT INTO `products_tb` (`product_id`, `product_name`, `product_category`, `product_price`, `product_ingredients`, `product_image`) VALUES
(1, '1975 Classic', 1, 105, NULL, 'css/item images/Classic.png'),
(2, 'Hawaiian Classic', 1, 135, NULL, 'css/item images/Hawaiian Classic_.png'),
(3, 'Double Classic', 1, 155, NULL, 'css/item images/Double Classic_.png'),
(4, 'Triple Classic', 1, 195, NULL, 'css/item images/Triple Classic_.png'),
(5, 'Classic O\'rings', 1, 135, NULL, 'css/item images/Classic O_rings.png'),
(6, 'Classic BBQ', 1, 135, NULL, 'css/item images/Classic BBQ.png'),
(7, 'Classic Fried Chicken Sandwich', 1, 155, NULL, 'css/item images/Fries Chicken Sandwich_.png'),
(8, 'Fried Chicken BBQ Sandwich', 1, 165, NULL, 'css/item images/Fried Chicken BBQ Sandwich_.png'),
(9, 'Classic Cheesy Bacon Hungarian', 1, 130, NULL, 'css/item images/Cheesy Bacon Hungarian Sandwich_.png'),
(10, 'Chik\'n Wings (6 pieces)', 2, 189, NULL, 'css/item images/chikn wings.jpg'),
(11, 'Chik\'n Poppers (6 pieces)', 2, 169, NULL, 'css/item images/chikn poppers.jpg'),
(14, 'Cheesy Bacon Potato Fries', 3, 80, NULL, 'css/item images/Cheesy Bacon Potato Fries.png'),
(15, 'Onion Rings', 3, 105, NULL, 'css/item images/onion rings.jpg'),
(16, 'Classic Nachos', 3, 105, NULL, 'css/item images/classic nachos.jpg'),
(17, 'Bacon', 4, 18, NULL, ''),
(18, 'Grilled Patty', 4, 65, NULL, ''),
(19, 'Sliced Cheese', 4, 12, NULL, ''),
(20, 'Pineapple', 4, 30, NULL, ''),
(21, 'Steamed Rice', 4, 18, NULL, ''),
(22, 'Cheese Sauce', 4, 20, NULL, ''),
(23, 'Barbecue Sauce', 4, 25, NULL, ''),
(24, 'Secret Burger Sauce', 4, 25, NULL, ''),
(25, 'Garlic Aioli', 4, 25, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories_tb`
--

CREATE TABLE `product_categories_tb` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `categroy_additionals` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories_tb`
--

INSERT INTO `product_categories_tb` (`category_id`, `category_name`, `categroy_additionals`) VALUES
(1, 'Burgers', '[17,18,19,20,22,23,24,25]'),
(2, 'Chik\'n Series', ''),
(3, 'Sides', ''),
(4, 'Extras', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_tb`
--
ALTER TABLE `cart_tb`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `customer_tb`
--
ALTER TABLE `customer_tb`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employee_tb`
--
ALTER TABLE `employee_tb`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `inventory_table`
--
ALTER TABLE `inventory_table`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products_tb`
--
ALTER TABLE `products_tb`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_category` (`product_category`);

--
-- Indexes for table `product_categories_tb`
--
ALTER TABLE `product_categories_tb`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_tb`
--
ALTER TABLE `cart_tb`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `customer_tb`
--
ALTER TABLE `customer_tb`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employee_tb`
--
ALTER TABLE `employee_tb`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory_table`
--
ALTER TABLE `inventory_table`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_tb`
--
ALTER TABLE `products_tb`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_categories_tb`
--
ALTER TABLE `product_categories_tb`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products_tb`
--
ALTER TABLE `products_tb`
  ADD CONSTRAINT `products_tb_ibfk_1` FOREIGN KEY (`product_category`) REFERENCES `product_categories_tb` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
