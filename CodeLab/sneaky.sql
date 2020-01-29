-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2017 at 06:08 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kool_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`order_id` int(11) NOT NULL,
  `customer_name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `total_price` double(9,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE IF NOT EXISTS `order_product` (
`order_product_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` double(9,2) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `price` double(7,2) NOT NULL,
  `amount` int(11) NOT NULL,
  `image` varchar(256) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `amount`, `image`) VALUES
(1, 'Apple iPhone 6 (16GB)', 8000.00, 10, NULL),
(2, 'Samsung Galaxy J7', 5000.00, 20, NULL),
(3, 'OPPO F1', 6200.00, 30, NULL),
(4, 'ASUS ZENFONE MAX ZC550KL 16GB', 5000.00, 5, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
 ADD PRIMARY KEY (`order_product_id`), ADD KEY `order_id` (`order_id`), ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
