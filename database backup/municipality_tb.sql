-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 11:31 AM
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
-- Table structure for table `municipality_tb`
--

CREATE TABLE `municipality_tb` (
  `municipality_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `municipality_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `municipality_tb`
--

INSERT INTO `municipality_tb` (`municipality_id`, `province_id`, `municipality_name`) VALUES
(1, 1, 'Manila'),
(2, 1, 'Mandaluyong City'),
(3, 1, 'Marikina City'),
(4, 1, 'Pasig City'),
(5, 1, 'Quezon City'),
(6, 1, 'San Juan City'),
(7, 1, 'Caloocan City'),
(8, 1, 'Malabon City'),
(9, 1, 'Navotas City'),
(10, 1, 'Valenzuela City'),
(11, 1, 'Las Piñas City'),
(12, 1, 'Makati City'),
(13, 1, 'Muntinlupa City'),
(14, 1, 'Parañaque City'),
(15, 1, 'Pasay City'),
(16, 1, 'Pateros'),
(17, 1, 'Taguig City'),
(18, 22, 'Angono'),
(19, 22, 'City of Antipolo'),
(20, 22, 'Baras'),
(21, 22, 'Binangonan'),
(22, 22, 'Cainta'),
(23, 22, 'Cardona'),
(24, 22, 'Jala-Jala'),
(25, 22, 'Rodriguez'),
(26, 22, 'Morong'),
(27, 22, 'Pililla'),
(28, 22, 'San Mateo'),
(29, 22, 'Tanay'),
(30, 22, 'Taytay'),
(31, 22, 'Teresa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `municipality_tb`
--
ALTER TABLE `municipality_tb`
  ADD PRIMARY KEY (`municipality_id`),
  ADD KEY `province_id` (`province_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `municipality_tb`
--
ALTER TABLE `municipality_tb`
  MODIFY `municipality_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `municipality_tb`
--
ALTER TABLE `municipality_tb`
  ADD CONSTRAINT `municipality_tb_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `province_tb` (`province_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
