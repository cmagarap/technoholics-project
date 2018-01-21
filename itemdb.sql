-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2018 at 06:42 PM
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
(4, 'vavethe42@hotmail.com', '$2y$10$yhlwfq3oKSXOb0wEYRDIBevyUllq0myh6mu.8x2.6epqpCHZI2NAq', 'Will To Live', 'Suarez', NULL, NULL, 1, '52f6e78dcb0c39ac910ed31f94f3ff52.JPG', 1, 1511351800, 'bddb02650433b0dcdb53f69e34ca6e5e1987f22a8e2436bfe919be44596f'),
(5, 'fsafas@gmail.com', '$2y$10$BCu7XVGLJSdzsFGXawJideUjxSUOZKq.zG.c0fuXyvvwJt7ATYziC', '[removed]alert&amp;#40;&#039;jdgashdsa&#039;&amp;#', '&quot;Heelo', NULL, '&lt;a href = &quot;f', 1, 'default-user.png', 0, 1515559579, '9a8560739eedc59ba06a0c9a3142e7756aa81ec1e070ebb61423c059232f');

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE `audit_trail` (
  `at_id` int(12) UNSIGNED NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `at_detail` varchar(50) DEFAULT NULL,
  `at_date` int(11) NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `customer_id` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`at_id`, `customer_name`, `item_name`, `at_detail`, `at_date`, `status`, `customer_id`) VALUES
(1, 'tabingi_mukha_ko', 'Galaxy Grand Prime', 'Purchase', 1516332322, 1, 1),
(2, 'tabingi_mukha_ko', 'HUAWEI Mate 9 Pro', 'Purchase', 1515482070, 1, 1),
(3, 'tabingi_mukha_ko', 'iPhone 6 Plus 16GB', 'Purchase', 1516409136, 1, 1),
(4, 'tabingi_mukha_ko', 'Acer Aspire F 15', 'Purchase', 1516409137, 1, 1),
(5, 'tabingi_mukha_ko', 'Asus Laptop Charger 19V', 'Purchase', 1516409137, 1, 1);

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
(1, 'tiltedface@gmail.com', '$2y$10$vjAHPMTIlA105nVl9M6dJ.rKYfHn.ngx0cS4LW/0/fXqTlmTVf39C', 'Tilted', 'Face', 'tabingi_mukha_ko', '1101 Tilted Bldg., Maceda St.', 'Metro Manila', 'Titled Place', 'Brgy. Tilted', '1069', NULL, 'default-user.png', 1, 1, 1511318551, '8372ff6856c18e05066a8ae3db7136212966ad18ec09ad3c875f94c4eb70'),
(3, 'kervinprime@yahoo.com', 'customer', 'Kervin', 'Rollan', 'KR1515550574', 'Suntrust building', 'Mindoro', 'Quezon City', 'Bahay Toro', '1231', '0912335598', NULL, 0, 0, 0, ''),
(4, 'rexb@gmail.com', '$2y$10$rEkMAgjR/DuJJngX54ysM.gHX8mtTp7VHUeStwYOGLnLXAMminUvq', 'Rex', 'Baldonado', 'RB1515560608', 'Paredes St. #11', 'None', 'Quezon City', 'Brgy. FEU', '123', '0912335527', 'default-user.png', 1, 1, 0, '1da7957d86c646d930d37624fe550ba9564f07917786865c8df0e38c1940'),
(5, 'edersonvillegas50@gmail.com', '$2y$10$N2PDAht1XXaRlMU4Dn3RH.0x.Q89yun8icgYoUzeoXL50FkflUAiO', 'Ederson', 'Villegas', 'EV1515640022', 'Lower Nawasa #71', 'Quezon Province', 'Quezon City', 'CommonWealth', '1661', '0912335598', 'default-user.png', 1, 0, 0, '5f7449161e5d2373aebeb5f9e66c93f1a2680a6adaa7539d96f91d19e143'),
(6, 'arjhomeljimenez@gmail.com', '$2y$10$738OkUDjTuth6wx4AC7X4O88UTyfnoE0nlnOtr7XVS00rf8Bhmcce', 'Arjhomel', 'Jimenez', 'AJ1515640308', 'FEU Instititue #69', 'Quezon Province', 'Quezon City', 'Toro', '1661', '0912335598', 'default-user.png', 1, 0, 0, '78b4bcfffb6180db327ce2948036f10d5cb1e9c6f0c6b9920bc2afee998d'),
(7, 'atl@yahoo.com', '$2y$10$AkkJ6LNbadLa7/vQs0bbluOdWKlIRABHNKfQqsRtzlqjGGBIEZwr.', 'Andrew', 'Leona', 'AL1515664193', 'adasda', 'zdads', 'asdadasd', 'dasdada', '1661', '094143213', 'default-user.png', 1, 0, 0, 'd13eb2e652de51b878cc93eca890e42c55cfc033fc181ee5cbfe112d8952');

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
  `order_quantity` int(8) NOT NULL,
  `total_price` float(8,2) UNSIGNED NOT NULL,
  `order_detail` varchar(200) DEFAULT NULL,
  `payment_method` varchar(50) NOT NULL,
  `transaction_date` int(11) NOT NULL,
  `delivery_date` int(11) NOT NULL,
  `shipping_address` varchar(200) NOT NULL,
  `process_status` tinyint(1) UNSIGNED DEFAULT '1',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `admin_id` int(12) UNSIGNED DEFAULT NULL,
  `customer_id` int(12) UNSIGNED NOT NULL,
  `shipper_id` int(12) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_quantity`, `total_price`, `order_detail`, `payment_method`, `transaction_date`, `delivery_date`, `shipping_address`, `process_status`, `status`, `admin_id`, `customer_id`, `shipper_id`) VALUES
(2, 3, 100997.00, NULL, 'payment3', 1515550574, 1515550574, 'Suntrust building', 2, 0, NULL, 3, 903),
(3, 3, 100997.00, NULL, 'payment3', 1515560608, 1515819808, 'Paredes St. #11', 3, 1, NULL, 4, 904),
(4, 5, 166551.00, NULL, 'payment3', 1515640022, 1515899222, 'Lower Nawasa #71', 2, 0, NULL, 5, 904),
(5, 5, 149995.00, NULL, 'payment3', 1515640308, 1515899508, 'FEU Instititue #69', 3, 1, NULL, 6, 903),
(6, 6, 197994.00, NULL, 'payment3', 1515664193, 1515923393, 'adasda', 3, 1, NULL, 7, 903),
(8, 2, 24998.00, 'CANCELLED', 'payment2', 1516336528, 1516595728, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 3, 0, NULL, 1, 903),
(9, 4, 65996.00, NULL, 'payment2', 1516336719, 1516595919, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 3, 1, NULL, 1, 904),
(10, 2, 898.00, NULL, 'payment2', 1516336896, 1516596096, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 3, 1, NULL, 1, 903),
(11, 1, 8999.00, NULL, 'payment1', 1516407895, 1516667095, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 2, 0, 2, 1, 903),
(12, 2, 17998.00, NULL, 'payment3', 1516408908, 1516668108, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 2, 1, 1, 1, 903),
(13, 2, 17998.00, NULL, 'payment1', 1516408934, 1516668134, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 1, 1, 2, 1, 904),
(14, 3, 33848.00, NULL, 'payment3', 1516409136, 1516668336, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 1, 1, NULL, 1, 904),
(15, 1, 9999.00, NULL, 'payment1', 1516450877, 1516710077, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 1, 1, NULL, 1, 904),
(16, 1, 499.00, NULL, 'payment3', 1516466530, 1516725730, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 2, 1, 2, 1, 903);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `orderitems_id` int(12) UNSIGNED NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_price` float(8,2) UNSIGNED NOT NULL,
  `quantity` int(5) UNSIGNED DEFAULT NULL,
  `product_image1` varchar(250) NOT NULL,
  `order_id` int(12) UNSIGNED NOT NULL,
  `product_id` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`orderitems_id`, `product_name`, `product_price`, `quantity`, `product_image1`, `order_id`, `product_id`) VALUES
(2, 'ASUS Laptop X556UQ-NH71 Intel Core i7 7th Gen 7500U (2.70 GHz)', 59999.00, 1, 'default-product.jpg', 2, 20),
(3, 'Acer Aspire F 15', 15999.00, 1, 'default-product.jpg', 2, 19),
(4, 'ACER ASPIRE ES1 332 BLACK', 24999.00, 1, 'default-product.jpg', 2, 22),
(5, 'ASUS Laptop X556UQ-NH71 Intel Core i7 7th Gen 7500U (2.70 GHz)', 59999.00, 1, 'default-product.jpg', 3, 20),
(6, 'Acer Aspire F 15', 15999.00, 1, 'default-product.jpg', 3, 19),
(7, 'ACER ASPIRE ES1 332 BLACK', 24999.00, 1, 'default-product.jpg', 3, 22),
(8, 'HP 15 Core i3 6th Gen - (4 GB/1 TB HDD/Windows', 29999.00, 3, 'default-product.jpg', 4, 16),
(9, 'HP Flyer Red 15.6', 45555.00, 1, 'default-product.jpg', 4, 52),
(10, 'HP Laptop - 15z touch optional', 30999.00, 1, 'default-product.jpg', 4, 14),
(11, 'HP 15 Core i3 6th Gen - (4 GB/1 TB HDD/Windows', 29999.00, 5, '55f4ebe3f3a2346c13437c9faedecf6f.jpg', 5, 16),
(12, 'HP 15 Core i3 6th Gen - (4 GB/1 TB HDD/Windows', 29999.00, 1, 'default-product.jpg', 6, 16),
(13, 'ASUS Laptop X556UQ-NH71 Intel Core i7 7th Gen 7500U (2.70 GHz)', 59999.00, 2, 'default-product.jpg', 6, 20),
(14, 'Acer Aspire F 15', 15999.00, 3, 'default-product.jpg', 6, 19),
(16, 'ACER ASPIRE ES1 332 BLACK', 24999.00, 1, 'default-product.jpg', 9, 22),
(17, 'Acer Aspire F 15', 15999.00, 1, 'default-product.jpg', 9, 19),
(18, 'iPhone 6 Plus 16GB', 15999.00, 1, 'default-product.jpg', 9, 36),
(19, 'HUAWEI P9', 8999.00, 1, 'default-product.jpg', 9, 48),
(20, 'Cell Phone Pocket Protectors', 199.00, 1, 'default-product.jpg', 10, 34),
(21, 'Cellphone Handy Tripod', 699.00, 1, 'default-product.jpg', 10, 27),
(22, 'HUAWEI P9', 8999.00, 1, 'default-product.jpg', 11, 48),
(23, 'Galaxy Grand Prime', 7999.00, 1, 'default-product.jpg', 12, 45),
(24, 'Galaxy Grand Prime', 7999.00, 1, 'default-product.jpg', 13, 45),
(25, 'HUAWEI Mate 9 Pro', 9999.00, 1, 'default-product.jpg', 13, 47),
(26, 'iPhone 6 Plus 16GB', 15999.00, 1, 'default-product.jpg', 14, 36),
(27, 'Acer Aspire F 15', 15999.00, 1, 'default-product.jpg', 14, 19),
(28, 'Asus Laptop Charger 19V', 1850.00, 1, 'default-product.jpg', 14, 3),
(29, 'HUAWEI Mate 9 Pro', 9999.00, 1, 'default-product.jpg', 15, 47),
(30, 'ASUS Charger for Zenfone2/T100CHI', 499.00, 1, 'default-product.jpg', 16, 7);

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
  `product_category` varchar(250) DEFAULT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_brand` varchar(250) DEFAULT NULL,
  `product_desc` varchar(250) NOT NULL,
  `product_price` float(8,2) UNSIGNED NOT NULL,
  `product_quantity` int(5) UNSIGNED NOT NULL,
  `no_of_views` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `product_image1` varchar(250) NOT NULL,
  `product_image2` varchar(250) DEFAULT NULL,
  `product_image3` varchar(250) DEFAULT NULL,
  `product_image4` varchar(250) DEFAULT NULL,
  `supplier` varchar(50) DEFAULT NULL,
  `added_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` int(1) UNSIGNED NOT NULL,
  `supplier_id` int(12) UNSIGNED DEFAULT NULL,
  `admin_id` int(12) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_category`, `product_name`, `product_brand`, `product_desc`, `product_price`, `product_quantity`, `no_of_views`, `product_image1`, `product_image2`, `product_image3`, `product_image4`, `supplier`, `added_at`, `updated_at`, `status`, `supplier_id`, `admin_id`) VALUES
(3, 'Laptop', 'Asus Laptop Charger 19V', 'ASUS', '100% compatibility\r\n', 1850.00, 3, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515468435, 0, 1, NULL, 2),
(4, 'Chargers', 'Universal Charger', NULL, 'One charger for more than 300 different batteries.', 499.00, 15, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515468998, 0, 1, NULL, 2),
(6, 'Chargers', 'Samsung Convoy U640 Cell Phone Charger', 'Samsung', 'Samsung Convoy U640 Cell Phone Charger', 200.00, 10, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515469096, 0, 1, NULL, 2),
(7, 'Chargers', 'ASUS Charger for Zenfone2/T100CHI', 'ASUS', 'ASUS Charger for Zenfone2/T100CHI', 499.00, 9, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515469132, 0, 1, NULL, 2),
(8, 'Chargers', 'Cell Phone Home / Travel Charger for SamsungGravity 3', 'Samsung', 'Cell Phone Home / Travel Charger for SamsungGravity 3', 199.00, 10, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515469178, 0, 1, NULL, 2),
(9, 'Chargers', 'ChargeAll-Universal-Cell-Phone-Charger', NULL, 'ChargeAll-Universal-Cell-Phone-Charger', 699.00, 10, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515473320, 0, 1, NULL, 2),
(10, 'Chargers', 'Motorola Motorola SPN5185B Cell Phone Travel Charger', 'Motorola', 'Motorola Motorola SPN5185B Cell Phone Travel Charger\r\n', 549.00, 12, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515473368, 0, 1, NULL, 2),
(11, 'Chargers', 'Apple 85W MagSafe 2 Power Adapter for MacBook Pro', 'Apple', 'Apple 85W MagSafe 2 Power Adapter for MacBook Pro', 3000.00, 12, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515473738, 0, 1, NULL, 2),
(12, 'Chargers', 'Genuine Apple A1399 USB Mains Wall Charger Adaptor', 'Apple', 'Genuine Apple A1399 USB Mains Wall Charger Adaptor\r\n', 999.00, 10, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515473771, 0, 1, NULL, 2),
(13, 'Chargers', 'Genuine Apple Macbook Charger 60W Magsafe Power Adapter', 'Apple', 'Genuine Apple Macbook Charger 60W Magsafe Power Adapter', 2999.00, 10, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515473794, 0, 1, NULL, 2),
(14, 'Laptop', 'HP Laptop - 15z touch optional', 'HP', 'Windows 10 Home 64\r\nAMD Dual-Core A9 APU\r\n8 GB memory; 1 TB HDD storage\r\nAMD Radeon™ R5 Graphics\r\n15.6" diagonal HD display', 30999.00, 4, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515482070, 0, 1, NULL, 2),
(15, 'Laptop', 'Lenovo - 15.6" Laptop - AMD A6-Series - 4GB Memory - 500GB Hard', 'Lenovo', 'Lenovo - 15.6" Laptop - AMD A6-Series - 4GB Memory - 500GB Hard', 15999.00, 3, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515482113, 0, 1, NULL, 2),
(16, 'Laptop', 'HP 15 Core i3 6th Gen - (4 GB/1 TB HDD/Windows', 'HP', 'HP 15 Core i3 6th Gen - 4 GB/1 TB HDD/Windows', 29999.00, 0, 0, '55f4ebe3f3a2346c13437c9faedecf6f.jpg', NULL, NULL, NULL, '', 1515482236, 0, 1, NULL, 2),
(17, 'Laptop', 'HP Spectre x360 Laptop - 15" Touch', 'HP', 'HP Spectre x360 Laptop - 15" Touch', 45999.00, 5, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515482537, 0, 1, NULL, 2),
(19, 'Laptop', 'Acer Aspire F 15', 'Acer', 'Acer Aspire F 15" Touchscreen Laptop - Silver (Intel Core i5-7200U/1 TB HDD/ 12 GB RAM/ Windows 10) ', 15999.00, 3, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515491282, 0, 1, NULL, NULL),
(20, 'Laptop', 'ASUS Laptop X556UQ-NH71 Intel Core i7 7th Gen 7500U (2.70 GHz)', 'ASUS', '59999', 59999.00, 0, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515491327, 0, 1, NULL, NULL),
(21, 'Laptop', 'HP Stream 11.6" Celeron Laptop', 'HP', 'HP Stream 11.6" Celeron Laptop', 13999.00, 4, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515491364, 0, 1, NULL, NULL),
(22, 'Laptop', 'ACER ASPIRE ES1 332 BLACK', 'Acer', 'ACER ASPIRE ES1 332 BLACK\r\n', 24999.00, 4, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515491407, 0, 1, NULL, NULL),
(23, 'Laptop', 'Razer Blade 14 RZ09 Gaming Laptop', '', 'Razer Blade 14 RZ09 Gaming Laptop\r\n', 49999.00, 5, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515491467, 0, 1, NULL, NULL),
(24, 'Laptop', 'HP OMEN Gaming Laptop - 15"', 'HP', 'HP OMEN Gaming Laptop - 15"', 69999.00, 5, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515491493, 0, 1, NULL, NULL),
(25, 'Accessories', 'Handy Grip Phone Strap', NULL, 'Handy Grip Phone Strap', 79.00, 1, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515491524, 0, 1, NULL, NULL),
(26, 'Accessories', 'Wallet Card Holder Monogram', NULL, 'Wallet Card Holder Monogram', 149.00, 10, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515491549, 0, 1, NULL, NULL),
(27, 'Accessories', 'Cellphone Handy Tripod', NULL, 'Cellphone Handy Tripod', 699.00, 11, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515491570, 0, 1, NULL, NULL),
(28, 'Accessories', 'Pop Socket', NULL, 'Pop Socket', 159.00, 5, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515491589, 0, 1, NULL, NULL),
(29, 'Accessories', 'Pop Socket', NULL, 'Pop Socket', 159.00, 5, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515491589, 0, 1, NULL, NULL),
(30, 'Accessories', 'iPhone X Silicone Case', 'Apple', 'iPhone X Silicone Case ', 499.00, 5, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515491605, 0, 1, NULL, NULL),
(31, 'Accessories', 'Selfie Stick', NULL, 'Selfie Stick', 149.00, 5, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515491644, 0, 1, NULL, NULL),
(32, 'Accessories', 'Zilu CM001 Universal Car Phone Mount', NULL, 'Zilu CM001 Universal Car Phone Mount', 599.00, 5, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515491664, 0, 1, NULL, NULL),
(33, 'Accessories', 'Pokémon Folio Wallet iPhone 6 Case', 'Apple', 'Pokémon Folio Wallet iPhone 6 Case', 799.00, 5, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515491686, 0, 1, NULL, NULL),
(34, 'Accessories', 'Cell Phone Pocket Protectors', NULL, 'Cell Phone Pocket Protectors', 199.00, 4, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515491710, 0, 1, NULL, NULL),
(35, 'Accessories', 'Sports Armband for iPhone', 'Apple', 'Sports Armband for iPhone', 499.00, 5, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515491730, 0, 1, NULL, NULL),
(36, 'Smartphone', 'iPhone 6 Plus 16GB', 'Apple', 'iPhone 6 Plus 16GB', 15999.00, 3, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515491772, 0, 1, NULL, NULL),
(37, 'Smartphone', 'Samsung Note 7', 'Samsung', 'The best and the new cellphone of samsung', 31231.00, 3, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515491807, 0, 1, NULL, NULL),
(39, 'Chargers', 'Voltaic Amp Portable Solar Charger', '', 'Voltaic Amp Portable Solar Charger', 1299.00, 12, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515492210, 0, 1, NULL, NULL),
(40, 'Accessories', 'Silicone Phone Wallet Stand', NULL, 'Silicone Phone Wallet Stand\r\n', 79.00, 15, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515492233, 0, 1, NULL, NULL),
(41, 'Accessories', 'Dual Layer Armor Defender Shockproof Protective Hard Case With Stand', NULL, 'Dual Layer Armor Defender Shockproof Protective Hard Case With Standv', 1199.00, 10, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515492269, 0, 1, NULL, NULL),
(42, 'Smartphone', 'LG V30 LTE Advanced', 'LG', 'LG V30 LTE Advanced', 4999.00, 10, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515492308, 0, 1, NULL, NULL),
(43, 'Smartphone', 'LG Leon 4G LTE H345', 'LG', 'LG Leon 4G LTE H345', 4999.00, 5, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515492333, 0, 1, NULL, NULL),
(44, 'Smartphone', 'Samsung Galaxy J7 J700M, 16GB, Dual SIM LTE, Factory Unlocked', 'Samsung', 'Samsung Galaxy J7 J700M, 16GB, Dual SIM LTE, Factory Unlocked', 11499.00, 10, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515492351, 0, 1, NULL, NULL),
(45, 'Smartphone', 'Galaxy Grand Prime', 'Samsung', 'Galaxy Grand Prime ', 7999.00, 5, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515492377, 0, 1, NULL, NULL),
(46, 'Smartphone', 'Samsung Galaxy Ace Dual-Sim', 'Samsung', 'Samsung Galaxy Ace Dual-Sim', 3999.00, 6, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515492405, 0, 1, NULL, NULL),
(47, 'Smartphone', 'HUAWEI Mate 9 Pro', 'Huawei', 'HUAWEI Mate 9 Pro', 9999.00, 4, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515492441, 0, 1, NULL, NULL),
(48, 'Smartphone', 'HUAWEI P9', 'Huawei', 'HUAWEI P9', 8999.00, 5, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515492461, 0, 1, NULL, NULL),
(49, 'Smartphone', 'OPPO R9s', 'OPPO', 'OPPO R9s', 8999.00, 7, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515492480, 0, 1, NULL, NULL),
(50, 'Smartphone', 'OPPO R9s Plus- Rose Gold', 'OPPO', 'OPPO R9s Plus- Rose Gold', 10999.00, 10, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515492499, 0, 1, NULL, NULL),
(51, 'Laptop', 'Lenovo IdeaPad 300 Series', 'Lenovo', 'Lenovo IdeaPad 300 Series', 45999.00, 10, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515492542, 0, 1, NULL, NULL),
(52, 'Laptop', 'HP Flyer Red 15.6" 15-f272wm Laptop PC', 'HP', 'HP Flyer Red 15.6" 15-f272wm Laptop PC', 45555.00, 9, 0, 'default-product.jpg', NULL, NULL, NULL, '', 1515492566, 0, 1, NULL, NULL),
(53, 'Chargers', 'jnjknj', 'Apple', 'kjaskjnas', 351355.00, 51561, 0, 'FB_IMG_1470008387092.jpg', 'Liza-Soberano-liza-soberano-39301588-640-640.jpg', 'received_1517952838230724.jpeg', 'Screen_Shot_2015-02-23_at_4_48_34_PM.png', 'kjjknkj', 1516350438, 0, 1, NULL, NULL),
(54, 'Chargers', 'kjgkj', 'Lenovo', 'jhvjbjhbjjb', 56564.00, 654654, 0, '92a72c9d7f98dafad3e8e0b9345ba275.jpg', NULL, NULL, NULL, 'ytjlkbjk', 1516351824, 0, 1, NULL, NULL);

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
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `admin_id` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `sales_detail`, `income`, `sales_date`, `status`, `admin_id`) VALUES
(1, 'sales detail...', 100997.00, 1516328659, 1, 2),
(2, 'sales detail...', 100997.00, 1516328785, 1, 2),
(3, 'sales detail...', 100997.00, 1516328809, 1, 2),
(4, 'sales detail...', 166551.00, 1516332997, 1, 2),
(5, 'sales detail...', 149995.00, 1516333031, 1, 2),
(6, 'sales detail...', 166551.00, 1516333167, 1, 2),
(7, 'sales detail...', 197994.00, 1516333203, 1, 2),
(8, 'sales detail...', 149995.00, 1516333243, 1, 2),
(9, 'sales detail...', 100997.00, 1516333248, 1, 2),
(10, 'sales detail...', 197994.00, 1516333310, 1, 2),
(11, 'sales detail...', 149995.00, 1516333385, 1, 2),
(12, 'sales detail...', 100997.00, 1516335249, 1, 2),
(13, 'sales detail...', 100997.00, 1516335305, 1, 2),
(14, 'sales detail...', 100997.00, 1516335322, 1, 2),
(15, 'sales detail...', 100997.00, 1516450947, 1, 2),
(16, 'sales detail...', 149995.00, 1516451002, 1, 2),
(17, 'sales detail...', 65996.00, 1516456365, 1, 2),
(18, 'For 2 items, 898.00is earned.', 898.00, 1516458017, 1, 2),
(19, 'In this order, 2 items were bought and 898.00 is earned.', 898.00, 1516458201, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `shipper`
--

CREATE TABLE `shipper` (
  `shipper_id` int(12) UNSIGNED NOT NULL,
  `shipper_name` varchar(50) NOT NULL,
  `contact_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipper`
--

INSERT INTO `shipper` (`shipper_id`, `shipper_name`, `contact_no`) VALUES
(903, 'Hooli', '09173673233'),
(904, 'Raviga', '09987881213');

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

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `company_name`, `contact_no`, `address`) VALUES
(801, 'Flutterbeam', '09505959054', 'SA'),
(802, 'Dectosphere', '09123355692', 'CA');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `log_id` int(11) UNSIGNED NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `customer_id` int(12) UNSIGNED DEFAULT NULL,
  `admin_id` int(12) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`log_id`, `user_type`, `username`, `date`, `action`, `status`, `customer_id`, `admin_id`) VALUES
(4, '0', 'seej', '1515383600', 'Logged out.', 1, NULL, 1),
(5, '1', 'vvilliam', '1515383878', 'Logged in.', 1, NULL, 3),
(6, '1', 'vvilliam', '1515384191', 'Logged out.', 1, NULL, 3),
(7, '2', 'tabingi_mukha_ko', '1515384202', 'Logged in.', 1, 1, NULL),
(8, '2', 'tabingi_mukha_ko', '1515384205', 'Logged out.', 1, 1, NULL),
(9, '0', 'seej', '1515395733', 'Logged in.', 1, NULL, 1),
(10, '0', 'seej', '1515462813', 'Logged in.', 1, NULL, 1),
(11, '0', 'seej', '1515468435', 'Added product: Asus Laptop Charger 19V', 1, NULL, 1),
(12, '0', 'seej', '1515468998', 'Added product: Universal Charger', 1, NULL, 1),
(13, '0', 'seej', '1515468998', 'Added product: Universal Charger', 1, NULL, 1),
(14, '0', 'seej', '1515469096', 'Added product: Samsung Convoy U640 Cell Phone Charger', 1, NULL, 1),
(15, '0', 'seej', '1515469132', 'Added product: ASUS Charger for Zenfone2/T100CHI', 1, NULL, 1),
(16, '0', 'seej', '1515469178', 'Added product: Cell Phone Home / Travel Charger for SamsungGravity 3', 1, NULL, 1),
(17, '0', 'seej', '1515473320', 'Added product: ChargeAll-Universal-Cell-Phone-Charger', 1, NULL, 1),
(18, '0', 'seej', '1515473368', 'Added product: Motorola Motorola SPN5185B Cell Phone Travel Charger', 1, NULL, 1),
(19, '0', 'seej', '1515473738', 'Added product: Apple 85W MagSafe 2 Power Adapter for MacBook Pro', 1, NULL, 1),
(20, '0', 'seej', '1515473771', 'Added product: Genuine Apple A1399 USB Mains Wall Charger Adaptor', 1, NULL, 1),
(21, '0', 'seej', '1515473794', 'Added product: Genuine Apple Macbook Charger 60W Magsafe Power Adapter', 1, NULL, 1),
(22, '0', 'seej', '1515481989', 'Logged in.', 1, NULL, 1),
(23, '0', 'seej', '1515482070', 'Added product: HP Laptop - 15z touch optional', 1, NULL, 1),
(24, '0', 'seej', '1515482113', 'Added product: Lenovo - 15.6" Laptop - AMD A6-Series - 4GB Memory - 500GB Hard', 1, NULL, 1),
(25, '0', 'seej', '1515482236', 'Added product: HP 15 Core i3 6th Gen - (4 GB/1 TB HDD/Windows', 1, NULL, 1),
(26, '0', 'seej', '1515482537', 'Added product: HP Spectre x360 Laptop - 15" Touch', 1, NULL, 1),
(27, '0', 'seej', '1515490556', 'Logged in.', 1, NULL, 1),
(28, '0', 'seej', '1515491282', 'Added product: Acer Aspire F 15', 1, NULL, 1),
(29, '0', 'seej', '1515491327', 'Added product: ASUS Laptop X556UQ-NH71 Intel Core i7 7th Gen 7500U (2.70 GHz)', 1, NULL, 1),
(30, '0', 'seej', '1515491364', 'Added product: HP Stream 11.6" Celeron Laptop', 1, NULL, 1),
(31, '0', 'seej', '1515491407', 'Added product: ACER ASPIRE ES1 332 BLACK', 1, NULL, 1),
(32, '0', 'seej', '1515491467', 'Added product: Razer Blade 14 RZ09 Gaming Laptop', 1, NULL, 1),
(33, '0', 'seej', '1515491493', 'Added product: HP OMEN Gaming Laptop - 15"', 1, NULL, 1),
(34, '0', 'seej', '1515491524', 'Added product: Handy Grip Phone Strap', 1, NULL, 1),
(35, '0', 'seej', '1515491549', 'Added product: Wallet Card Holder Monogram', 1, NULL, 1),
(36, '0', 'seej', '1515491570', 'Added product: Cellphone Handy Tripod', 1, NULL, 1),
(37, '0', 'seej', '1515491589', 'Added product: Pop Socket', 1, NULL, 1),
(38, '0', 'seej', '1515491589', 'Added product: Pop Socket', 1, NULL, 1),
(39, '0', 'seej', '1515491605', 'Added product: iPhone X Silicone Case', 1, NULL, 1),
(40, '0', 'seej', '1515491644', 'Added product: Selfie Stick', 1, NULL, 1),
(41, '0', 'seej', '1515491664', 'Added product: Zilu CM001 Universal Car Phone Mount', 1, NULL, 1),
(42, '0', 'seej', '1515491686', 'Added product: Pokémon Folio Wallet iPhone 6 Case', 1, NULL, 1),
(43, '0', 'seej', '1515491710', 'Added product: Cell Phone Pocket Protectors', 1, NULL, 1),
(44, '0', 'seej', '1515491730', 'Added product: Sports Armband for iPhone', 1, NULL, 1),
(45, '0', 'seej', '1515491772', 'Added product: iPhone 6 Plus 16GB', 1, NULL, 1),
(46, '0', 'seej', '1515491807', 'Added product: Samsung Note 7', 1, NULL, 1),
(47, '0', 'seej', '1515492166', 'Added product: Hoffco Celltronix Braided Heavy Duty Cell Phone Charging Cable', 1, NULL, 1),
(48, '0', 'seej', '1515492210', 'Added product: Voltaic Amp Portable Solar Charger', 1, NULL, 1),
(49, '0', 'seej', '1515492233', 'Added product: Silicone Phone Wallet Stand', 1, NULL, 1),
(50, '0', 'seej', '1515492269', 'Added product: Dual Layer Armor Defender Shockproof Protective Hard Case With Stand', 1, NULL, 1),
(51, '0', 'seej', '1515492308', 'Added product: LG V30 LTE Advanced', 1, NULL, 1),
(52, '0', 'seej', '1515492333', 'Added product: LG Leon 4G LTE H345', 1, NULL, 1),
(53, '0', 'seej', '1515492351', 'Added product: Samsung Galaxy J7 J700M, 16GB, Dual SIM LTE, Factory Unlocked', 1, NULL, 1),
(54, '0', 'seej', '1515492377', 'Added product: Galaxy Grand Prime', 1, NULL, 1),
(55, '0', 'seej', '1515492405', 'Added product: Samsung Galaxy Ace Dual-Sim', 1, NULL, 1),
(56, '0', 'seej', '1515492441', 'Added product: HUAWEI Mate 9 Pro', 1, NULL, 1),
(57, '0', 'seej', '1515492461', 'Added product: HUAWEI P9', 1, NULL, 1),
(58, '0', 'seej', '1515492480', 'Added product: OPPO R9s', 1, NULL, 1),
(59, '0', 'seej', '1515492499', 'Added product: OPPO R9s Plus- Rose Gold', 1, NULL, 1),
(60, '0', 'seej', '1515492542', 'Added product: Lenovo IdeaPad 300 Series', 1, NULL, 1),
(61, '0', 'seej', '1515492566', 'Added product: HP Flyer Red 15.6" 15-f272wm Laptop PC', 1, NULL, 1),
(62, '0', 'seej', '1515493528', 'Logged in.', 1, NULL, 1),
(67, '0', 'seej', '1515498580', 'Logged out.', 1, NULL, 1),
(68, '0', 'seej', '1515498873', 'Logged in.', 1, NULL, 1),
(69, '0', 'seej', '1515559529', 'Logged in.', 1, NULL, 1),
(70, '0', 'seej', '1515559579', 'Added account: &quot;Heelo, [removed]alert&amp;#40;&#039;jdgashdsa&#039;&amp;#41;;[removed]', 1, NULL, 1),
(71, '0', 'seej', '1515560423', 'Logged out.', 1, NULL, 1),
(72, '2', 'tabingi_mukha_ko', '1515561433', 'Logged in.', 1, 1, NULL),
(73, '2', 'tabingi_mukha_ko', '1515561439', 'Logged out.', 1, 1, NULL),
(74, '2', 'RB1515560608', '1515561686', 'Logged in.', 1, 4, NULL),
(75, '2', 'RB1515560608', '1515561799', 'Logged out.', 1, 4, NULL),
(76, '2', 'tabingi_mukha_ko', '1515666579', 'Logged in.', 1, 1, NULL),
(77, '2', 'tabingi_mukha_ko', '1515666664', 'Logged out.', 1, 1, NULL),
(78, '0', 'seej', '1515666670', 'Logged in.', 1, NULL, 1),
(79, '0', 'seej', '1515666791', 'Logged out.', 1, NULL, 1),
(80, '1', 'veocalimlim', '1516066085', 'Logged in.', 1, NULL, 2),
(81, '1', 'veocalimlim', '1516066608', 'Added product: Test', 1, NULL, 2),
(82, '1', 'veocalimlim', '1516066772', 'Added product: adsad', 1, NULL, 2),
(83, '1', 'veocalimlim', '1516068206', 'Added product: dsada', 1, NULL, 2),
(84, '1', 'veocalimlim', '1516068512', 'Added product: sadad', 1, NULL, 2),
(85, '1', 'veocalimlim', '1516070400', 'Added product: sadad', 1, NULL, 2),
(86, '1', 'veocalimlim', '1516070443', 'Added product: sadad', 1, NULL, 2),
(87, '1', 'veocalimlim', '1516070586', 'Added product: sadad', 1, NULL, 2),
(88, '1', 'veocalimlim', '1516070748', 'Added product: sadad', 1, NULL, 2),
(89, '1', 'veocalimlim', '1516070843', 'Added product: sadad', 1, NULL, 2),
(90, '1', 'veocalimlim', '1516070917', 'Added product: sadad', 1, NULL, 2),
(91, '1', 'veocalimlim', '1516071252', 'Added product: sadad', 1, NULL, 2),
(92, '1', 'veocalimlim', '1516073760', 'Added product: asdadas', 1, NULL, 2),
(93, '1', 'veocalimlim', '1516077569', 'Added product: asdadas', 1, NULL, 2),
(94, '1', 'veocalimlim', '1516077588', 'Added product: asdadas', 1, NULL, 2),
(95, '1', 'veocalimlim', '1516078261', 'Added product: asdadas', 1, NULL, 2),
(96, '1', 'veocalimlim', '1516078278', 'Added product: asdadas', 1, NULL, 2),
(97, '1', 'veocalimlim', '1516078314', 'Added product: asdadas', 1, NULL, 2),
(98, '1', 'veocalimlim', '1516078347', 'Added product: asdadas', 1, NULL, 2),
(99, '1', 'veocalimlim', '1516079709', 'Added product: sadsad', 1, NULL, 2),
(100, '1', 'veocalimlim', '1516079912', 'Added product: adsadsa', 1, NULL, 2),
(101, '1', 'veocalimlim', '1516084664', 'Added product: dasdsad', 1, NULL, 2),
(102, '1', 'veocalimlim', '1516086165', 'Added product: Product Test1', 1, NULL, 2),
(103, '1', 'veocalimlim', '1516086332', 'Added product: William', 1, NULL, 2),
(104, '1', 'veocalimlim', '1516086532', 'Added product: William', 1, NULL, 2),
(105, '', 'seej', '1516093746', 'Logged out.', 1, NULL, 1),
(106, '1', 'veocalimlim', '1516153546', 'Logged in.', 1, NULL, 2),
(107, '1', 'veocalimlim', '1516154837', 'Added product: asdad', 1, NULL, 2),
(108, '1', 'veocalimlim', '1516154949', 'Added product: asdad', 1, NULL, 2),
(109, '1', 'veocalimlim', '1516155354', 'Added product: asdad', 1, NULL, 2),
(110, '1', 'veocalimlim', '1516155384', 'Added product: asdad', 1, NULL, 2),
(111, '1', 'veocalimlim', '1516155438', 'Added product: asdad', 1, NULL, 2),
(112, '1', 'veocalimlim', '1516155731', 'Added product: asdad', 1, NULL, 2),
(113, '1', 'veocalimlim', '1516162345', 'Logged out.', 1, NULL, 2),
(114, '1', 'veocalimlim', '1516162398', 'Logged in.', 1, NULL, 2),
(115, '1', 'veocalimlim', '1516200995', 'Logged in.', 1, NULL, 2),
(116, '1', 'veocalimlim', '1516234916', 'Logged in.', 1, NULL, 2),
(117, '1', 'veocalimlim', '1516244619', 'Logged in.', 1, NULL, 2),
(119, '1', 'veocalimlim', '1516279839', 'Logged in.', 1, NULL, 2),
(120, '1', 'veocalimlim', '1516287495', 'Logged out.', 1, NULL, 2),
(121, '0', 'seej', '1516327686', 'Logged in.', 1, NULL, 1),
(122, '0', 'seej', '1516332322', 'Logged in.', 1, NULL, 1),
(123, '2', 'tabingi_mukha_ko', '1516335640', 'Logged in.', 1, 1, NULL),
(124, '1', 'veocalimlim', '1516350332', 'Logged in.', 1, NULL, 2),
(125, '1', 'veocalimlim', '1516350438', 'Added product: jnjknj', 1, NULL, 2),
(126, '0', 'seej', '1516350934', 'Logged in.', 1, NULL, 1),
(127, '0', 'seej', '1516351304', 'Logged out.', 1, NULL, 1),
(128, '1', 'veocalimlim', '1516351824', 'Added product: kjgkj', 1, NULL, 2),
(129, '0', 'seej', '1516407327', 'Logged in.', 1, NULL, 1),
(130, '2', 'tabingi_mukha_ko', '1516407851', 'Logged in.', 1, 1, NULL),
(131, '0', 'seej', '1516449831', 'Logged in.', 1, NULL, 1),
(132, '2', 'tabingi_mukha_ko', '1516450766', 'Logged in.', 1, 1, NULL),
(133, '0', 'seej', '1516455589', 'Deleted account #5', 1, NULL, 1),
(134, '0', 'seej', '1516455714', 'Reactivated account #5', 1, NULL, 1),
(136, '1', 'veocalimlim', '1516458967', 'Logged in.', 1, NULL, 2),
(137, '1', 'veocalimlim', '1516459187', 'Edited order #12', 1, NULL, 2),
(138, '1', 'veocalimlim', '1516459296', 'Edited order #13', 1, NULL, 2),
(139, '1', 'veocalimlim', '1516460780', 'Logged out.', 1, NULL, 2),
(140, '0', 'seej', '1516461537', 'Cancelled order #11', 1, NULL, 1),
(141, '0', 'seej', '1516464046', 'Deleted account #5', 1, NULL, 2),
(142, '2', 'tabingi_mukha_ko', '1516466520', 'Logged in.', 1, 1, NULL),
(143, '0', 'seej', '1516469355', 'Edited order #16', 1, NULL, 2),
(144, '0', 'seej', '1516469407', 'Edited order #13', 1, NULL, 2),
(145, '0', 'seej', '1516469924', 'Logged out.', 1, NULL, 2);

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
  MODIFY `admin_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `audit_trail`
--
ALTER TABLE `audit_trail`
  MODIFY `at_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `content_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `orderitems_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `shipper`
--
ALTER TABLE `shipper`
  MODIFY `shipper_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=905;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=803;
--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `log_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
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
