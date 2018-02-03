-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2018 at 02:07 PM
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
  `customer_id` int(12) UNSIGNED NOT NULL,
  `order_id` int(12) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`at_id`, `customer_name`, `item_name`, `at_detail`, `at_date`, `status`, `customer_id`, `order_id`) VALUES
(1, 'tabingi_mukha_ko', 'iPhone 7', 'Purchase', 1516764686, 1, 1, NULL),
(2, 'tabingi_mukha_ko', 'HP Stream 11.6" Celeron Laptop', 'Purchase', 1516764739, 1, 1, NULL),
(3, 'tabingi_mukha_ko', 'Apple iPad Mini 2', 'Purchase', 1516764792, 1, 1, NULL),
(4, 'tabingi_mukha_ko', 'ZenFone 3 Max ZC520TL', 'Purchase', 1516764856, 1, 1, NULL),
(5, 'tabingi_mukha_ko', 'Samsung J7', 'Purchase', 1516764905, 1, 1, NULL),
(6, 'tabingi_mukha_ko', 'iPhone 8', 'Purchase', 1516764945, 1, 1, NULL),
(7, 'tabingi_mukha_ko', 'ASUS Laptop X556UQ-NH71', 'Purchase', 1516766105, 1, 1, NULL),
(8, 'tabingi_mukha_ko', 'HP Laptop - 15z touch optional', 'Purchase', 1516766176, 1, 1, NULL),
(9, 'tabingi_mukha_ko', 'Samsung Galaxy Tab A 7.0', 'Purchase', 1516766176, 1, 1, NULL),
(10, 'RO1517055802', 'iPhone 8', 'Purchase', 1517056594, 1, 8, NULL),
(11, 'RO1517055802', 'iPhone 7', 'Purchase', 1517056595, 1, 8, NULL),
(12, 'RO1517055802', 'ASUS Laptop X556UQ-NH71', 'Purchase', 1517056638, 1, 8, NULL),
(13, 'RO1517055802', 'HP Laptop - 15z touch optional', 'Purchase', 1517056639, 1, 8, NULL),
(14, 'RO1517055802', 'HP Stream 11.6" Celeron Laptop', 'Purchase', 1517056639, 1, 8, NULL),
(15, 'RO1517055802', 'ACER ASPIRE ES1 332 BLACK', 'Purchase', 1517056640, 1, 8, NULL),
(16, 'EA1517057098', 'HP Laptop - 15z touch optional', 'Purchase', 1517057098, 1, 10, NULL),
(17, 'EA1517057098', 'Apple iPad Pro', 'Purchase', 1517057098, 1, 10, NULL),
(18, 'tabingi_mukha_ko', 'Samsung Galaxy Tab A 7.0', 'Purchase', 1517057440, 1, 1, 31),
(19, 'tabingi_mukha_ko', 'Apple iPad Pro', 'Purchase', 1517057441, 1, 1, 31),
(20, 'EA1517057098', 'ASUS Laptop X556UQ-NH71', 'Purchase', 1517057516, 1, 10, 32);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(12) UNSIGNED NOT NULL,
  `brand_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(601, 'Apple'),
(602, 'ASUS'),
(603, 'Samsung'),
(604, 'Lenovo'),
(605, 'Acer'),
(606, 'Dell'),
(607, 'HP'),
(608, 'Sony');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(12) UNSIGNED NOT NULL,
  `category` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
(701, 'Accessories'),
(702, 'Smartphone'),
(703, 'Laptop'),
(704, 'Charger'),
(705, 'Tablet'),
(706, 'Featured');

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
(7, 'atl@yahoo.com', '$2y$10$AkkJ6LNbadLa7/vQs0bbluOdWKlIRABHNKfQqsRtzlqjGGBIEZwr.', 'Andrew', 'Leona', 'AL1515664193', 'adasda', 'zdads', 'asdadasd', 'dasdada', '1661', '094143213', 'default-user.png', 1, 0, 0, 'd13eb2e652de51b878cc93eca890e42c55cfc033fc181ee5cbfe112d8952'),
(8, 'randyorton@gmail.com', '$2y$10$DhJfkyxUOz5dRiOuUJ1rdOnmifM6xNa12chgvQpIFAzNDifd6mVR6', 'Randal Keith', 'Orton', 'RO1517055802', '4509 Nutter St.', 'Missouri', 'St. Louis', 'Belton', '6401', '09491399640', 'default-user.png', 1, 1, 0, '873dec17c7c8d6821a8091d77df5589ccf8593c8246351ddc16aaf8118d5'),
(9, 'michaels@gmail.com', '$2y$10$u8UwRvakhaDd9pwpor059u5Zrox0xzrFifH299aYwtbUUua9XWx4q', 'Shawn', 'Michaels', 'SM1517056867', '2264 Sundown Lane', 'Texas', 'San Antonio', 'Connect', '7874', '09123655995', 'default-user.png', 1, 0, 0, '4148763f386fdd4d11b550fbffe2fe1148bae1dfb9c0b936ee111a5f1830'),
(10, 'sawft_kervin@gmail.com', '$2y$10$5U/tUafvIvXTku85icxISugVSw2.oPZKiKSonCH9gEuUWyJZGDl/S', 'Enzo', 'Amore', 'EA1517057098', '1403 Sawft', 'Metro Manila', 'Manila', 'Sampaloc', '6202', '09123655995', 'default-user.png', 1, 1, 0, '7d9e8162cd5f3cd553eb37c9f4a27e2801897d9f28aa53fd4eb9771b8e64');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(12) UNSIGNED DEFAULT NULL,
  `product_id` int(12) UNSIGNED DEFAULT NULL,
  `feedback` varchar(200) NOT NULL,
  `added_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `shipper_id` int(12) UNSIGNED DEFAULT '904'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_quantity`, `total_price`, `order_detail`, `payment_method`, `transaction_date`, `delivery_date`, `shipping_address`, `process_status`, `status`, `admin_id`, `customer_id`, `shipper_id`) VALUES
(2, 3, 100997.00, NULL, 'COD', 1515550574, 1515550574, 'Suntrust building', 2, 0, NULL, 3, 903),
(3, 3, 100997.00, NULL, 'COD', 1515560608, 1515819808, 'Paredes St. #11', 3, 0, NULL, 4, 904),
(4, 5, 166551.00, NULL, 'COD', 1515640022, 1515899222, 'Lower Nawasa #71', 2, 0, NULL, 5, 904),
(5, 5, 149995.00, NULL, 'paypal', 1515640308, 1515899508, 'FEU Instititue #69', 3, 0, NULL, 6, 903),
(6, 6, 197994.00, NULL, 'paypal', 1515664193, 1515923393, 'adasda', 3, 0, NULL, 7, 903),
(8, 2, 24998.00, 'CANCELLED', 'visa_mastercard', 1516336528, 1516595728, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 3, 0, NULL, 1, 903),
(9, 4, 65996.00, NULL, 'visa_mastercard', 1516336719, 1516595919, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 3, 0, NULL, 1, 904),
(10, 2, 898.00, NULL, 'visa_mastercard', 1516336896, 1516596096, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 3, 0, NULL, 1, 903),
(11, 1, 8999.00, NULL, 'COD', 1516407895, 1516667095, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 2, 0, 2, 1, 903),
(12, 2, 17998.00, NULL, 'COD', 1516408908, 1516668108, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 2, 0, 1, 1, 903),
(13, 2, 17998.00, NULL, 'COD', 1516408934, 1516668134, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 1, 0, 2, 1, 904),
(14, 3, 33848.00, NULL, 'paypal', 1516409136, 1516668336, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 1, 0, NULL, 1, 904),
(15, 1, 9999.00, NULL, 'COD', 1516450877, 1516710077, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 1, 0, NULL, 1, 904),
(16, 1, 499.00, NULL, 'visa_mastercard', 1516466530, 1516725730, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 3, 0, 1, 1, 903),
(17, 1, 35490.00, NULL, 'COD', 1516764686, 1517023886, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 3, 1, 2, 1, 904),
(18, 1, 25400.00, NULL, 'visa_mastercard', 1516764739, 1517023939, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 3, 1, 2, 1, 904),
(19, 1, 14990.00, NULL, 'paypal', 1516764792, 1517023992, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 3, 1, 2, 1, 904),
(20, 2, 13000.00, NULL, 'paypal', 1516764856, 1517024056, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 3, 1, 2, 1, 904),
(21, 2, 24980.00, NULL, 'COD', 1516764905, 1517024105, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 3, 1, 2, 1, 904),
(22, 1, 45990.00, NULL, 'visa_mastercard', 1516764944, 1517024144, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 3, 1, 2, 1, 904),
(23, 2, 83998.00, NULL, 'COD', 1516766105, 1517025305, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 3, 1, 2, 1, 904),
(24, 2, 38599.00, NULL, 'COD', 1516766175, 1517025375, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 3, 1, 2, 1, 904),
(25, 2, 15099.00, NULL, 'COD', 1517055802, 1517315002, '4509 Nutter St.', 1, 1, NULL, 8, 904),
(26, 2, 50480.00, NULL, 'COD', 1517056376, 1517315576, '4509 Nutter St., Belton, St. Louis, Missouri', 1, 1, NULL, 8, 904),
(27, 3, 116970.00, NULL, 'COD', 1517056594, 1517315794, '4509 Nutter St., Belton, St. Louis, Missouri', 1, 1, NULL, 8, 904),
(28, 4, 115397.00, NULL, 'paypal', 1517056638, 1517315838, '4509 Nutter St., Belton, St. Louis, Missouri', 1, 1, NULL, 8, 904),
(29, 1, 39990.00, NULL, 'visa_mastercard', 1517056867, 1517316067, '2264 Sundown Lane', 1, 1, NULL, 9, 904),
(30, 2, 70989.00, NULL, 'visa_mastercard', 1517057098, 1517316298, '1403 Sawft', 1, 1, NULL, 10, 904),
(31, 2, 47590.00, NULL, 'paypal', 1517057440, 1517316640, '1101 Tilted Bldg., Maceda St., Brgy. Tilted, Titled Place, Metro Manila', 1, 1, NULL, 1, 904),
(32, 1, 41999.00, NULL, 'COD', 1517057516, 1517316716, '1403 Sawft, Sampaloc, Manila, Metro Manila', 1, 1, NULL, 10, 904);

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
(1, 'iPhone 7', 35490.00, 1, 'ed84b2b347955d92d5b4bbe2363d1655.jpeg', 17, 75),
(2, 'HP Stream 11.6" Celeron Laptop', 25400.00, 1, '79894dd530010a23f536f5607aea5c4d.jpg', 18, 71),
(3, 'Apple iPad Mini 2', 14990.00, 1, 'a861ace37697ac911798e89073e8d3d7.jpg', 19, 84),
(4, 'ZenFone 3 Max ZC520TL', 6500.00, 2, 'b15969f923e4c8b71914df733addb5e3.jpg', 20, 80),
(5, 'Samsung J7', 12490.00, 2, 'ae4c7195898417e688fa5c8bda95dbbc.jpg', 21, 78),
(6, 'iPhone 8', 45990.00, 1, '02173be3ece0a965ceda82c1e9f2670d.jpeg', 22, 74),
(7, 'ASUS Laptop X556UQ-NH71', 41999.00, 2, 'c819ab0df1bea8bcce14a7a9e92ddb4d.jpg', 23, 70),
(8, 'HP Laptop - 15z touch optional', 30999.00, 1, '9e6b7401be8e1d07334e7400394fdabd.png', 24, 67),
(9, 'Samsung Galaxy Tab A 7.0', 7600.00, 1, '521efa1534dc8c29a1876c338415fd15.jpg', 24, 82),
(10, 'Samsung S4', 7499.00, 1, '12c8ad001f256b55c3a2fb55e427c052.jpg', 25, 79),
(11, 'Apple iPad Mini 2', 14990.00, 1, 'a861ace37697ac911798e89073e8d3d7.jpg', 26, 84),
(12, 'iPhone 8', 45990.00, 1, '02173be3ece0a965ceda82c1e9f2670d.jpeg', 27, 74),
(13, 'iPhone 7', 35490.00, 2, 'ed84b2b347955d92d5b4bbe2363d1655.jpeg', 27, 75),
(14, 'ASUS Laptop X556UQ-NH71', 41999.00, 1, 'c819ab0df1bea8bcce14a7a9e92ddb4d.jpg', 28, 70),
(15, 'HP Laptop - 15z touch optional', 30999.00, 1, '9e6b7401be8e1d07334e7400394fdabd.png', 28, 67),
(16, 'HP Stream 11.6" Celeron Laptop', 25400.00, 1, '79894dd530010a23f536f5607aea5c4d.jpg', 28, 71),
(17, 'ACER ASPIRE ES1 332 BLACK', 16999.00, 1, 'd6a65f8a81af237e472b33ce66751cba.jpg', 28, 72),
(18, 'Apple iPad Pro', 39990.00, 1, '84d1099989505d1e9b7740e1c4a5c7b1.png', 29, 73),
(19, 'HP Laptop - 15z touch optional', 30999.00, 1, '9e6b7401be8e1d07334e7400394fdabd.png', 30, 67),
(20, 'Apple iPad Pro', 39990.00, 1, '84d1099989505d1e9b7740e1c4a5c7b1.png', 30, 73),
(21, 'Samsung Galaxy Tab A 7.0', 7600.00, 1, '521efa1534dc8c29a1876c338415fd15.jpg', 31, 82),
(22, 'Apple iPad Pro', 39990.00, 1, '84d1099989505d1e9b7740e1c4a5c7b1.png', 31, 73),
(23, 'ASUS Laptop X556UQ-NH71', 41999.00, 1, 'c819ab0df1bea8bcce14a7a9e92ddb4d.jpg', 32, 70);

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
  `product_name` varchar(250) NOT NULL,
  `product_desc` varchar(250) NOT NULL,
  `product_brand` varchar(40) NOT NULL,
  `product_category` varchar(40) NOT NULL,
  `product_price` float(8,2) UNSIGNED NOT NULL,
  `product_quantity` int(5) UNSIGNED NOT NULL,
  `no_of_views` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `product_image1` varchar(250) NOT NULL,
  `product_image2` varchar(250) DEFAULT NULL,
  `product_image3` varchar(250) DEFAULT NULL,
  `product_image4` varchar(250) DEFAULT NULL,
  `added_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` int(1) UNSIGNED NOT NULL DEFAULT '1',
  `supplier_id` int(12) UNSIGNED NOT NULL,
  `admin_id` int(12) UNSIGNED DEFAULT NULL,
  `category_id` int(12) UNSIGNED NOT NULL,
  `brand_id` int(12) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_desc`, `product_brand`, `product_category`, `product_price`, `product_quantity`, `no_of_views`, `product_image1`, `product_image2`, `product_image3`, `product_image4`, `added_at`, `updated_at`, `status`, `supplier_id`, `admin_id`, `category_id`, `brand_id`) VALUES
(60, 'Zenfone Go', 'zenfone go RED', '', '', 5000.00, 5, 0, 'df5422b7165f0348dc28ef36c88eebf9.jpg', NULL, NULL, NULL, 1516603039, 0, 0, 801, 2, 702, 602),
(67, 'HP Laptop - 15z touch optional', 'Windows 10 Home 64\r\nAMD Dual-Core A9 APU\r\n8 GB memory; 1 TB HDD storage\r\nAMD Radeon™ R5 Graphics\r\n15.6&quot; diagonal HD display', 'HP', 'Laptop', 30999.00, 2, 0, '9e6b7401be8e1d07334e7400394fdabd.png', 'ac86eedeaf428f04d9e958e9faa4cb00.png', '12f38c5acd95fb986363cf395c58778e.png', 'a1be94f222d1e4bae7eb25d59576da80.png', 1516630134, 0, 1, 802, 2, 703, 607),
(68, 'Lenovo - 15.6&quot; Laptop - AMD A6-Series', 'Lenovo 110-15ACL Laptop: Enjoy productivity anywhere with this 15.6-inch Lenovo Ideapad laptop. Its 500GB of storage holds plenty of large applications and documents, and its built-in optical drive lets you read and write digital files. The quad-core', 'Lenovo', 'Laptop', 16740.00, 5, 0, 'ead536687dbbfd1c0d2b5d9981d7d6b1.jpg', '5873a2b88c69b11909671a0a8ee275d9.jpg', 'c3ff1872430ea7831fca017e3b8adf34.jpg', 'b96024033337b0287a2bbec47790cdbd.jpg', 1516630278, 0, 1, 802, 2, 703, 604),
(69, 'HP Spectre x360 Laptop - 15&quot; Touch', 'Windows 10 Home 64 with Windows Ink\r\n7th Generation Intel® Core™ i7 processor\r\n16 GB memory; 512 GB SSD storage\r\nNVIDIA® GeForce® 940MX (2 GB GDDR5 dedicated)\r\n15.6&quot; diagonal UHD UWVA eDP touch', 'HP', 'Laptop', 76999.00, 3, 0, 'hp_spectre_1.png', 'be31cdd4e3bb9bb79a6c8bcc9c010e7e.png', '1ddad77d384ec29bb7d5abd7f3dc2d30.png', '01ce373678f64afd794f2f50cc177080.png', 1516630462, 0, 0, 802, 2, 703, 607),
(70, 'ASUS Laptop X556UQ-NH71', 'Powerful &amp; efficient Intel­ Core i7-7500U 2.7GHz (Turbo up to 3.5GHz) Processor\r\nNVIDIA GeForce 940MX graphics; 8GB DDR4 RAM\r\n512GB 2.5&quot; SSD; Dual-layer DVD-RW drive; Ergonomic chiclet keyboard with number pad\r\nLightning-fast dual band 802.1', 'ASUS', 'Laptop', 41999.00, 0, 0, 'c819ab0df1bea8bcce14a7a9e92ddb4d.jpg', '9e491142d4cfff5c14aa1e5234119e63.jpg', 'b60d87056520114f38abfe862c46d0b2.jpg', '5c3b37519b2342fe4f96c52514bcd2aa.jpg', 1516630595, 0, 1, 802, 2, 703, 602),
(71, 'HP Stream 11.6&quot; Celeron Laptop', 'Operating System: Windows 10\r\nCPU (Model + Speed): Intel Celeron N3050 1.6GHz Processor\r\nRAM and Hard Disk Drive (HDD): 2GB RAM and 32GB eMMC\r\nGraphics: Intel HD Graphics', 'HP', 'Laptop', 25400.00, 3, 0, '79894dd530010a23f536f5607aea5c4d.jpg', '3bd42edc91a9b6fe4196385ef62f71e5.jpg', 'bed28d817d167c710b112dad0b6b3e53.jpg', '05355179c0c154fe427c92221be8faa2.jpg', 1516631606, 0, 1, 802, 2, 703, 607),
(72, 'ACER ASPIRE ES1 332 BLACK', 'Acer Aspire ES1-332-C8FS - Midnight Black is a 13.3&quot; notebook powered by Intel Celeron N3450 processor with 2MB of cache, with Intel HD Graphics, equipped with 64-bit Windows 10 Operating System. It runs at 1.6 GHz with 4Gb of RAM and 1600 MHz o', 'Acer', 'Laptop', 16999.00, 4, 0, 'd6a65f8a81af237e472b33ce66751cba.jpg', '126f08f649aaae01c49e17fe5feb6667.jpg', '78fbee640d9bd7d56318d66657ae310d.jpg', '38b824a2bca3eb2f5f8acf3a9ecec43a.jpg', 1516632423, 0, 1, 802, 2, 703, 605),
(73, 'Apple iPad Pro', 'Apple iPad Pro 12.9-inch Wi-Fi Gold 64GB', 'Apple', 'Tablet', 39990.00, 3, 0, '84d1099989505d1e9b7740e1c4a5c7b1.png', 'ipad_pro_2.png', 'ipad_pro_3.png', 'ipad_pro_4.png', 1516633112, 0, 1, 802, 2, 705, 601),
(74, 'iPhone 8', '4.7-inch Retina HD display with True Tone\r\nAll-glass and aluminum design, water and dust resistant\r\n12MP camera with 4K video up to 60 fps\r\n7MP FaceTime HD camera with Retina Flash for stunning selfies\r\nTouch ID for secure authentication\r\nA11 Bionic,', 'Apple', 'Smartphone', 45990.00, 3, 0, '02173be3ece0a965ceda82c1e9f2670d.jpeg', 'fa8856ad7b6c82a27bd4ed8748a439f2.jpeg', '974e53a95a78044fa8f25d006f886ba3.jpeg', '4963604fd06a9194402af2169a4e0296.jpeg', 1516633254, 0, 1, 802, 2, 702, 601),
(75, 'iPhone 7', '4.7-inch Retina HD display\r\nWater and dust resistant\r\n12MP camera with 4K video at 30 fps\r\n7MP FaceTime HD camera with Retina Flash for stunning selfies\r\nTouch ID for secure authentication and Apple Pay\r\nA10 Fusion chip', 'Apple', 'Smartphone', 35490.00, 2, 0, 'ed84b2b347955d92d5b4bbe2363d1655.jpeg', '06106fb33115444fe453086282b08316.jpeg', 'b352cc068d5e3a0b29b8aa3f6de42743.jpeg', '8c4f3fe446ea85d6e3aa62674f045bd0.jpg', 1516633371, 0, 1, 802, 2, 702, 601),
(76, 'Zenfone Go ZB551KL 16GBv', 'Asus Zenfone Go ZB551KL 16GB', 'ASUS', 'Smartphone', 5500.00, 5, 0, 'asusgo_1.png', 'd0d78385f749c69e62277e222b66f6e3.jpg', 'c72bb64c9794e1fb723abc7f2fbb0a1f.jpg', '1e9eec4383cf747450bc6fd4c6ddd4cc.jpg', 1516633645, 0, 0, 802, 2, 702, 602),
(77, 'Samsung Galaxy C5', 'The Samsung Galaxy C5 is powered by 1.2GHz octa-core Qualcomm Snapdragon 617 processor and it comes with 4GB of RAM. The phone packs 32GB of internal storage that can be expanded up to 128GB via a microSD card. As far as the cameras are concerned, th', 'Samsung', 'Smartphone', 12000.00, 5, 0, '55afb1383d9e6b8c006a2aef0d4d5d23.jpg', 'fa2173369c1fa8de2dbd289040b852f6.jpg', '1a173e733694212c1cd6b85e2a04c639.jpg', '87af405bf109748db10f4166ad12f380.jpg', 1516633900, 0, 1, 802, 2, 702, 603),
(78, 'Samsung J7', 'Samsung Galaxy J7 Pro - Black is a Dual SIM smartphone with a 5.5-inch display with a resolution of 1080 x 1920 pixels. It operates on Android Nougat and is powered by a 3600mAh non-removable Li-Ion battery. Under the hood, the Samsung Galaxy J7 Pro ', 'Samsung', 'Smartphone', 12490.00, 3, 0, 'ae4c7195898417e688fa5c8bda95dbbc.jpg', 'cec750026426f37fa65585f5b1671e8c.jpg', '204cc81fc19d01c0837825cdf8535ce3.jpg', 'ef903e731a8939110ad022f1a7d29a15.jpg', 1516635326, 0, 1, 802, 2, 702, 603),
(79, 'Samsung S4', 'Samsung Galaxy S4', 'Samsung', 'Smartphone', 7499.00, 5, 0, '12c8ad001f256b55c3a2fb55e427c052.jpg', 'a6a5a5a1294509f7cf64f3a45715feda.jpg', 'a57fd558037ba542c10f485346e8810b.jpg', '2809f8c7c80a56b66b94a9ce124a67a8.jpg', 1516635770, 0, 1, 802, 2, 702, 603),
(80, 'ZenFone 3 Max ZC520TL', 'ZenFone 3 Max is the 5.2-inch smartphone eliminates battery life worries, with enough power to get you through a full work day, and even beyond! With its high-capacity 4100mAh cell ZenFone 3 Max just keeps on going, with standby that lasts up to 30 d', 'ASUS', 'Smartphone', 6500.00, 3, 0, 'b15969f923e4c8b71914df733addb5e3.jpg', 'ad4c24eaf865a960106b2ef4ffe260a0.jpg', 'be1160d7258e847dbe1eef801563c070.jpg', '6d366b910ca648d0dac706b6896e0f06.jpg', 1516671804, 0, 1, 802, 2, 702, 602),
(81, 'Apple Air 2', 'Wi-Fi (802.11a/b/g/n/ac)\r\nBluetooth 4.0 technology \r\n9.7-inch Retina display\r\n8-megapixel iSight camera\r\nFaceTime HD camera\r\n1080p HD video recording\r\nA8X chip with 64-bit architecture\r\nM8 motion coprocessor\r\n10-hour battery life', 'Apple', 'Tablet', 20499.00, 5, 0, '68c0ba45fb7ac086d49debd62252d560.jpg', '4759bd8282d9f7c3c009bb6e4256d7a4.jpg', '1dcadd5720ee74875cf5d76f36db601f.jpg', '4fea15de7ed62ebd6b6cc1eb2fc1762c.jpg', 1516671979, 0, 1, 802, 2, 705, 601),
(82, 'Samsung Galaxy Tab A 7.0', 'The 2016 model is 7 inches display, 8GB of storage, runs Android 5.1 Lollipop with 1.3/1.5 GHz Quad Core processor.', 'Samsung', 'Tablet', 7600.00, 3, 0, '521efa1534dc8c29a1876c338415fd15.jpg', 'bd579cbe335bc870ab81ac790729f923.jpg', '07974bc8bc7d380b4f5909cceccd26cb.jpg', '091837347f7bf125c39d50f2b0fa3da2.jpg', 1516672123, 0, 1, 802, 2, 705, 603),
(84, 'Apple iPad Mini 2', 'Apple iPad Mini 2 16GB', 'Apple', 'Tablet', 14990.00, 4, 0, 'a861ace37697ac911798e89073e8d3d7.jpg', '1665e553cbb8ed809ab2a38df61c9a90.jpg', 'ipadmini2_3.jpg', '169ca2bca5dbb32166ec1fae7f365f6e.jpg', 1516672956, 0, 1, 802, 2, 705, 601),
(85, 'Apple iPhone X', 'Apple iPhone X 64GB', 'Apple', 'Smartphone', 64990.00, 5, 0, 'iphonex_1.jpeg', 'e8247ae009f85557f6e2784d57c11b57.jpg', '4c8f052ad9901b1989f9367d325aedd3.jpg', 'iphonex_4.jpeg', 1516673339, 0, 1, 802, 2, 702, 601);

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
  `admin_id` int(12) UNSIGNED NOT NULL,
  `order_id` int(12) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `sales_detail`, `income`, `sales_date`, `status`, `admin_id`, `order_id`) VALUES
(21, 'In this order, 1 items were bought and 35,490.00 is earned.', 35490.00, 1516801651, 1, 2, 17),
(22, 'In this order, 1 items were bought and 25,400.00 is earned.', 25400.00, 1516972499, 1, 2, 18),
(23, 'In this order, 1 items were bought and 14,990.00 is earned.', 14990.00, 1517056661, 1, 2, 19),
(24, 'In this order, 2 items were bought and 13,000.00 is earned.', 13000.00, 1517056669, 1, 2, 20),
(25, 'In this order, 2 items were bought and 24,980.00 is earned.', 24980.00, 1517056679, 1, 2, 21),
(26, 'In this order, 1 items were bought and 45,990.00 is earned.', 45990.00, 1517057190, 1, 2, 22),
(27, 'In this order, 2 items were bought and 83,998.00 is earned.', 83998.00, 1517057195, 1, 2, 23),
(28, 'In this order, 2 items were bought and 38,599.00 is earned.', 38599.00, 1517057200, 1, 2, 24);

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
(801, 'Octagon', '09505959054', 'SM North'),
(802, 'Abenson', '09123355692', 'SM North'),
(803, 'PC Express', '09086694541', 'SM Manila'),
(804, 'Silicon Valley', '09125854680', 'SM Manila');

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
(145, '1', 'veocalimlim', '1516529312', 'Logged in.', 1, NULL, 1),
(146, '1', 'veocalimlim', '1516529330', 'Edited order #16', 1, NULL, 1),
(147, '1', 'veocalimlim', '1516529330', 'Edited order #16''s status to ''delivered''.', 1, NULL, 1),
(148, '1', 'veocalimlim', '1516529586', 'Logged out.', 1, NULL, 1),
(149, '2', 'tabingi_mukha_ko', '1516536180', 'Logged in.', 1, 1, NULL),
(150, '1', 'veocalimlim', '1516579020', 'Logged in.', 1, NULL, 1),
(151, '1', 'veocalimlim', '1516579931', 'Added product: Product1', 1, NULL, 1),
(152, '1', 'veocalimlim', '1516584330', 'Logged out.', 1, NULL, 1),
(153, '1', 'veocalimlim', '1516591344', 'Logged in.', 1, NULL, 1),
(154, '1', 'veocalimlim', '1516592008', 'Added product: Product1', 1, NULL, 1),
(155, '0', 'seej', '1516596092', 'Logged in.', 1, NULL, 2),
(156, '0', 'seej', '1516603039', 'Added product: Zenfone Go', 1, NULL, 2),
(157, '0', 'seej', '1516606599', 'Added product: asfas', 1, NULL, 2),
(158, '0', 'seej', '1516606698', 'Added product: hjbk', 1, NULL, 2),
(159, '0', 'seej', '1516609097', 'Logged out.', 1, NULL, 2),
(160, '0', 'seej', '1516609229', 'Logged in.', 1, NULL, 2),
(161, '0', 'seej', '1516609536', 'Deleted product #61', 1, NULL, 2),
(162, '0', 'seej', '1516609537', 'Deleted product #62', 1, NULL, 2),
(163, '0', 'seej', '1516609539', 'Deleted product #60', 1, NULL, 2),
(164, '0', 'seej', '1516611042', 'Added product: iPhone X', 1, NULL, 2),
(165, '0', 'seej', '1516611297', 'Added product: jhvjkbk', 1, NULL, 2),
(166, '0', 'seej', '1516611372', 'Deleted product #64', 1, NULL, 2),
(167, '0', 'seej', '1516611374', 'Deleted product #63', 1, NULL, 2),
(168, '0', 'seej', '1516611406', 'Added product: iPhone X', 1, NULL, 2),
(169, '0', 'seej', '1516611555', 'Deleted product #65', 1, NULL, 2),
(170, '0', 'seej', '1516611869', 'Added product: iPhone X', 1, NULL, 2),
(171, '0', 'seej', '1516611899', 'Logged out.', 1, NULL, 2),
(172, '0', 'seej', '1516629346', 'Logged out.', 1, NULL, 2),
(173, '0', 'seej', '1516629359', 'Logged in.', 1, NULL, 2),
(174, '0', 'seej', '1516630134', 'Added product: HP Laptop - 15z touch optional', 1, NULL, 2),
(175, '0', 'seej', '1516630278', 'Added product: Lenovo - 15.6" Laptop - AMD A6-Series', 1, NULL, 2),
(176, '0', 'seej', '1516630462', 'Added product: HP Spectre x360 Laptop - 15" Touch', 1, NULL, 2),
(177, '0', 'seej', '1516630595', 'Added product: ASUS Laptop X556UQ-NH71', 1, NULL, 2),
(178, '0', 'seej', '1516631484', 'Deleted product #66', 1, NULL, 2),
(179, '0', 'seej', '1516631493', 'Deleted product #69', 1, NULL, 2),
(180, '0', 'seej', '1516631606', 'Added product: HP Stream 11.6" Celeron Laptop', 1, NULL, 2),
(181, '0', 'seej', '1516632423', 'Added product: ACER ASPIRE ES1 332 BLACK', 1, NULL, 2),
(182, '0', 'seej', '1516633112', 'Added product: Apple iPad Pro', 1, NULL, 2),
(183, '0', 'seej', '1516633254', 'Added product: iPhone 8', 1, NULL, 2),
(184, '0', 'seej', '1516633371', 'Added product: iPhone 7', 1, NULL, 2),
(185, '0', 'seej', '1516633645', 'Added product: Zenfone Go ZB551KL 16GBv', 1, NULL, 2),
(186, '0', 'seej', '1516633900', 'Added product: Samsung Galaxy C5', 1, NULL, 2),
(187, '0', 'seej', '1516635326', 'Added product: Samsung J7', 1, NULL, 2),
(188, '0', 'seej', '1516635770', 'Added product: Samsung S4', 1, NULL, 2),
(189, '0', 'seej', '1516671606', 'Logged in.', 1, NULL, 2),
(190, '0', 'seej', '1516671804', 'Added product: ZenFone 3 Max ZC520TL', 1, NULL, 2),
(191, '0', 'seej', '1516671979', 'Added product: Apple Air 2', 1, NULL, 2),
(192, '0', 'seej', '1516672123', 'Added product: Samsung Galaxy Tab A 7.0', 1, NULL, 2),
(193, '0', 'seej', '1516672340', 'Added product: APPLE IPAD MINI 2', 1, NULL, 2),
(194, '0', 'seej', '1516672371', 'Deleted product #83', 1, NULL, 2),
(195, '0', 'seej', '1516672422', 'Deleted product #76', 1, NULL, 2),
(196, '0', 'seej', '1516672956', 'Added product: Apple iPad Mini 2', 1, NULL, 2),
(197, '0', 'seej', '1516672988', 'Restored product #63', 1, NULL, 2),
(198, '0', 'seej', '1516673001', 'Deleted product #63', 1, NULL, 2),
(199, '0', 'seej', '1516673339', 'Added product: Apple iPhone X', 1, NULL, 2),
(200, '0', 'seej', '1516673976', 'Added product: zenfone go', 1, NULL, 2),
(201, '0', 'seej', '1516674109', 'Added product: asdada', 1, NULL, 2),
(202, '0', 'seej', '1516674163', 'Added product: 1231', 1, NULL, 2),
(203, '2', 'tabingi_mukha_ko', '1516764609', 'Logged in.', 1, 1, NULL),
(204, '0', 'seej', '1516799981', 'Logged in.', 1, NULL, 2),
(205, '0', 'seej', '1516801396', 'Logged out.', 1, NULL, 2),
(206, '0', 'seej', '1516801415', 'Logged in.', 1, NULL, 2),
(207, '0', 'seej', '1516801651', 'Edited order #17', 1, NULL, 2),
(208, '0', 'seej', '1516801651', 'Edited order #17''s status to ''delivered''.', 1, NULL, 2),
(209, '0', 'seej', '1516801676', 'Edited order #18', 1, NULL, 2),
(210, '0', 'seej', '1516972068', 'Logged in.', 1, NULL, 2),
(211, '0', 'seej', '1516972448', 'Logged in.', 1, NULL, 2),
(212, '0', 'seej', '1516972499', 'Edited order #18', 1, NULL, 2),
(213, '0', 'seej', '1516972499', 'Edited order #18''s status to ''delivered''.', 1, NULL, 2),
(214, '0', 'seej', '1516972545', 'Logged out.', 1, NULL, 2),
(215, '0', 'seej', '1516972654', 'Logged in.', 1, NULL, 2),
(216, '0', 'seej', '1516974784', 'Logged out.', 1, NULL, 2),
(217, '0', 'seej', '1517055192', 'Logged in.', 1, NULL, 2),
(218, '0', 'seej', '1517055387', 'Logged out.', 1, NULL, 2),
(219, '0', 'seej', '1517056169', 'Logged in.', 1, NULL, 2),
(220, '2', 'RO1517055802', '1517056335', 'Logged in.', 1, 8, NULL),
(221, '0', 'seej', '1517056660', 'Edited order #19', 1, NULL, 2),
(222, '0', 'seej', '1517056661', 'Edited order #19''s status to ''delivered''.', 1, NULL, 2),
(223, '0', 'seej', '1517056669', 'Edited order #20', 1, NULL, 2),
(224, '0', 'seej', '1517056669', 'Edited order #20''s status to ''delivered''.', 1, NULL, 2),
(225, '0', 'seej', '1517056678', 'Edited order #21', 1, NULL, 2),
(226, '0', 'seej', '1517056679', 'Edited order #21''s status to ''delivered''.', 1, NULL, 2),
(227, '2', 'RO1517055802', '1517056691', 'Logged out.', 1, 8, NULL),
(228, '0', 'seej', '1517057190', 'Edited order #22', 1, NULL, 2),
(229, '0', 'seej', '1517057190', 'Edited order #22''s status to ''delivered''.', 1, NULL, 2),
(230, '0', 'seej', '1517057195', 'Edited order #23', 1, NULL, 2),
(231, '0', 'seej', '1517057195', 'Edited order #23''s status to ''delivered''.', 1, NULL, 2),
(232, '0', 'seej', '1517057200', 'Edited order #24', 1, NULL, 2),
(233, '0', 'seej', '1517057200', 'Edited order #24''s status to ''delivered''.', 1, NULL, 2),
(234, '2', 'tabingi_mukha_ko', '1517057421', 'Logged in.', 1, 1, NULL),
(235, '2', 'tabingi_mukha_ko', '1517057470', 'Logged out.', 1, 1, NULL),
(236, '2', 'EA1517057098', '1517057496', 'Logged in.', 1, 10, NULL),
(237, '2', 'EA1517057098', '1517057902', 'Logged out.', 1, 10, NULL);

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
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

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
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

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
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `order_id` (`order_id`);

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
  MODIFY `at_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=609;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=707;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `content_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `orderitems_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `shipper`
--
ALTER TABLE `shipper`
  MODIFY `shipper_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=905;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=805;
--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `log_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;
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
  ADD CONSTRAINT `audit_trail_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `audit_trail_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

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
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`),
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `product_ibfk_5` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`);

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
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

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
