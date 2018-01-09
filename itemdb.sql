-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2018 at 05:05 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itemdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(12) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `access_level` tinyint(1) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `registered_at` int(11) NOT NULL,
  `verification_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `firstname`, `lastname`, `username`, `contact_no`, `access_level`, `image`, `status`, `registered_at`, `verification_code`) VALUES
(1, 'veocalimlim@gmail.com', '$2y$10$wso1ckAZl0BbRgDIKF.dyepxLiXX4ctvqdx1D3Mwgm.zTRqD6Dd0a', 'Veo Thadeus', 'Calimlim', 'veocalimlim', NULL, 1, 'default-user.png', 1, 1511079552, '97bbe0a44892225f83bd27a7703633cbf3dc8bbdbb025dce3f33c9e03101'),
(2, 'cmagarap@fit.edu.ph', '$2y$10$dIdroXz22sY4A7PGfJSqTuS3GKBCFGZVj9ULr76NfMrUGPbky.wt.', 'Chris John', 'Agarap', 'seej', '09173673233', 0, 'default-user.png', 1, 1512515685, 'c794c8ed8feb2ec1ec9896daf0f21cf4fb65fad3f46b5ab7ae6beca5dd5e'),
(3, 'vv.vicqtory315@gmail.com', '$2y$10$Y7Mgo/S446efiPTPlytgGeJ2wHFRy9u.16HYpptGkrRZgwWlipXwm', 'VVilliam', 'Suarez', 'vvilliam', NULL, 1, 'f3ebd1ab5cd39c93fd66ecb966a239e8.JPG', 1, 1511351673, '440ed919305a1bfc73dd80847daf3da345c28c7a6b48e9d1e86094ff0756'),
(4, 'vavethe42@hotmail.com', '$2y$10$yhlwfq3oKSXOb0wEYRDIBevyUllq0myh6mu.8x2.6epqpCHZI2NAq', 'Will To Live', 'Suarez', NULL, NULL, 1, '52f6e78dcb0c39ac910ed31f94f3ff52.JPG', 1, 1511351800, 'bddb02650433b0dcdb53f69e34ca6e5e1987f22a8e2436bfe919be44596f');

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE `audit_trail` (
  `at_id` int(12) UNSIGNED NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `purchase_date` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `customer_id` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(12) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `complete_address` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city_municipality` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `zip_code` varchar(4) NOT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `is_verified` tinyint(4) NOT NULL,
  `registered_at` int(11) NOT NULL,
  `verification_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `email`, `password`, `firstname`, `lastname`, `username`, `complete_address`, `province`, `city_municipality`, `barangay`, `zip_code`, `contact_no`, `image`, `status`, `is_verified`, `registered_at`, `verification_code`) VALUES
(1, 'tiltedface@gmail.com', '$2y$10$vjAHPMTIlA105nVl9M6dJ.rKYfHn.ngx0cS4LW/0/fXqTlmTVf39C', 'Tilted', 'Face', 'tabingi_mukha_ko', '1101 Tilted Bldg., Maceda St.', 'Metro Manila', 'Titled Place', 'Brgy. Tilted', '1069', NULL, 'default-user.png', 1, 1, 1511318551, '8372ff6856c18e05066a8ae3db7136212966ad18ec09ad3c875f94c4eb70');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `content_id` int(11) UNSIGNED NOT NULL,
  `image_1` varchar(50) NOT NULL,
  `image_2` varchar(50) NOT NULL,
  `image_3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(12) UNSIGNED NOT NULL,
  `products_bought` varchar(200) NOT NULL,
  `order_quantity` int(8) NOT NULL,
  `total_price` float(8,2) NOT NULL,
  `order_detail` varchar(200) DEFAULT NULL,
  `transaction_date` int(11) NOT NULL,
  `delivery_date` int(11) NOT NULL,
  `shipping_address` varchar(200) NOT NULL,
  `admin_id` int(12) UNSIGNED NOT NULL,
  `customer_id` int(12) UNSIGNED NOT NULL,
  `shipper_id` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `orderitems_id` int(12) UNSIGNED NOT NULL,
  `quantity` int(8) DEFAULT NULL,
  `order_id` int(12) UNSIGNED NOT NULL,
  `product_id` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(12) UNSIGNED NOT NULL,
  `payment_detail` varchar(200) NOT NULL,
  `payment_date` int(11) NOT NULL,
  `customer_id` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(12) UNSIGNED NOT NULL,
  `product_category` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_brand` varchar(250) NOT NULL,
  `product_desc` varchar(250) NOT NULL,
  `product_price` varchar(30) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_image1` varchar(250) NOT NULL,
  `product_image2` varchar(250) DEFAULT NULL,
  `product_image3` varchar(250) DEFAULT NULL,
  `product_image4` varchar(250) DEFAULT NULL,
  `supplier` varchar(50) NOT NULL,
  `added_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `supplier_id` int(12) UNSIGNED NOT NULL,
  `admin_id` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `r_order_product`
--

CREATE TABLE `r_order_product` (
  `ORDER_order_id` int(12) UNSIGNED NOT NULL,
  `PRODUCT_product_id` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(12) UNSIGNED NOT NULL,
  `sales_detail` varchar(200) DEFAULT NULL,
  `income` float(8,2) NOT NULL,
  `sales_date` int(11) NOT NULL,
  `admin_id` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipper`
--

CREATE TABLE `shipper` (
  `shipper_id` int(12) UNSIGNED NOT NULL,
  `shipper_name` varchar(50) NOT NULL,
  `contact_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(12) UNSIGNED NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `log_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `customer_id` int(12) UNSIGNED DEFAULT NULL,
  `admin_id` int(12) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`log_id`, `user_id`, `user_type`, `username`, `date`, `action`, `status`, `customer_id`, `admin_id`) VALUES
(4, 2, '0', 'seej', '1515383600', 'Logged out.', 1, NULL, NULL),
(5, 3, '1', 'vvilliam', '1515383878', 'Logged in.', 1, NULL, NULL),
(6, 3, '1', 'vvilliam', '1515384191', 'Logged out.', 1, NULL, NULL),
(7, 1, '2', 'tabingi_mukha_ko', '1515384202', 'Logged in.', 1, NULL, NULL),
(8, 1, '2', 'tabingi_mukha_ko', '1515384205', 'Logged out.', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(12) UNSIGNED NOT NULL,
  `wish_id` int(12) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` float(8,2) NOT NULL,
  `product_desc` varchar(200) DEFAULT NULL,
  `customer_id` int(12) UNSIGNED NOT NULL,
  `product_id` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `audit_trail`
--
ALTER TABLE `audit_trail`
  ADD PRIMARY KEY (`at_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `shipper_id` (`shipper_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`orderitems_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `r_order_product`
--
ALTER TABLE `r_order_product`
  ADD KEY `ORDER_order_id` (`ORDER_order_id`),
  ADD KEY `PRODUCT_product_id` (`PRODUCT_product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`shipper_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `audit_trail`
--
ALTER TABLE `audit_trail`
  MODIFY `at_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `content_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `orderitems_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shipper`
--
ALTER TABLE `shipper`
  MODIFY `shipper_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `log_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_trail`
--
ALTER TABLE `audit_trail`
  ADD CONSTRAINT `audit_trail_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`shipper_id`) REFERENCES `shipper` (`shipper_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `r_order_product`
--
ALTER TABLE `r_order_product`
  ADD CONSTRAINT `r_order_product_ibfk_1` FOREIGN KEY (`ORDER_order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `r_order_product_ibfk_2` FOREIGN KEY (`PRODUCT_product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `user_log`
--
ALTER TABLE `user_log`
  ADD CONSTRAINT `user_log_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `user_log_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
