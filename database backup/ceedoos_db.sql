-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2023 at 11:51 PM
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
-- Table structure for table `customer_tb`
--

CREATE TABLE `customer_tb` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_initial` varchar(2) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `order_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `product_ingredients` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_tb`
--

INSERT INTO `products_tb` (`product_id`, `product_name`, `product_category`, `product_price`, `product_ingredients`) VALUES
(1, '1975 Classic', 1, 0, NULL),
(2, 'Hawaiian Classic', 1, 0, NULL),
(3, 'Double Classic', 1, 0, NULL),
(4, 'Triple Classic', 1, 0, NULL),
(5, 'Classic O\'rings', 1, 0, NULL),
(6, 'Classic BBQ', 1, 0, NULL),
(7, 'Classic Fried Chicken Sandwich', 1, 0, NULL),
(8, 'Fried Chicken BBQ Sandwich', 1, 0, NULL),
(9, 'Classic Cheesy Bacon Hungarian', 1, 0, NULL),
(10, 'Chik\'n Wings', 2, 0, NULL),
(11, 'Chik\'n Poppers', 2, 0, NULL),
(12, 'Classic Potato Fries', 3, 0, NULL),
(13, 'Cheesy Potato Fries', 3, 0, NULL),
(14, 'Cheesy Bacon Potato Fries', 3, 0, NULL),
(15, 'Onion Rings', 3, 0, NULL),
(16, 'Classic Nachos', 3, 0, NULL),
(17, 'Bacon', 4, 0, NULL),
(18, 'Grilled Patty', 4, 0, NULL),
(19, 'Sliced Cheese', 4, 0, NULL),
(20, 'Pineapple', 4, 0, NULL),
(21, 'Steamed Rice', 4, 0, NULL),
(22, 'Cheese Sauce', 4, 0, NULL),
(23, 'Barbecue Sauce', 4, 0, NULL),
(24, 'Secret Burger Sauce', 4, 0, NULL),
(25, 'Garlic Aioli', 4, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories_tb`
--

CREATE TABLE `product_categories_tb` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories_tb`
--

INSERT INTO `product_categories_tb` (`category_id`, `category_name`) VALUES
(1, 'Burgers'),
(2, 'Chik\'n Series'),
(3, 'Sides'),
(4, 'Extras');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_tb`
--
ALTER TABLE `customer_tb`
  ADD PRIMARY KEY (`customer_id`);

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
-- AUTO_INCREMENT for table `customer_tb`
--
ALTER TABLE `customer_tb`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

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
