-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2017 at 04:59 AM
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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `access_level` tinyint(1) NOT NULL,
  `registered_at` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `verification_code` varchar(100) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`user_id`, `firstname`, `lastname`, `username`, `password`, `address`, `status`, `access_level`, `registered_at`, `email`, `image`, `verification_code`, `is_verified`) VALUES
(11, 'Veo', 'Calimlim', 'veocalimlim', '5fa0328a573f93df69b06a5f55ccf5ef0523e8aa', NULL, 1, 1, 1511079552, 'veocalimlim@gmail.com', '18195045_1455663144456723_8646497117616610019_n4.jpg', '2ZXGNjCedk', 1),
(12, 'Tilted', 'Beyo', NULL, 'b39f008e318efd2bb988d724a161b61c6909677f', NULL, 1, 2, 1511318551, 'veocalimlim@yahoo.com', 'default-user.png', 'NRVhbl2zuO', 1),
(13, 'William', 'Suarez', 'William', 'ac8c1966e853449ac181e21d7bf3462092813c05', NULL, 0, 1, 1511351673, 'vv.victory315@gmail.com', 'f3ebd1ab5cd39c93fd66ecb966a239e8.JPG', 'jWhVSuQq94', 0),
(14, 'William', 'Suarez', NULL, '85aa0de4d46bfcd9ece0c15b686f95ec57c3908e', NULL, 1, 1, 1511351800, 'vavethe@hotmail.com', '52f6e78dcb0c39ac910ed31f94f3ff52.JPG', '8nG5tqKpd6', 1),
(15, 'Chris John', 'Agarap', 'seej', '086a5f64597c1f510641b304a9f85a622754f8d1', NULL, 1, 0, 1512515685, '', 'default-user.png', 'ga1E3e21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `content_id` int(11) NOT NULL,
  `image_1` varchar(50) NOT NULL,
  `image_2` varchar(50) NOT NULL,
  `image_3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_category` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_desc` varchar(250) NOT NULL,
  `product_price` varchar(30) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_image` varchar(250) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `added_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_category`, `product_name`, `product_desc`, `product_price`, `product_quantity`, `product_image`, `supplier`, `added_at`, `updated_at`, `status`) VALUES
(47, 'Chargers', 'Asus Laptop Charger 19V', '100% compatibility', '1850', 4, 'dfc40568ef70a98e539f2651060139f5.jpg', '', 1511337409, 0, 1),
(49, 'Chargers', 'Universal Charger', 'One charger for more than 300 different batteries.', '499', 15, '821279748f6074f8f8700713ecfa93be.jpg', '', 1511338251, 0, 1),
(50, 'Chargers', 'Samsung Convoy U640 Cell Phone Charger', 'Samsung Convoy U640 Cell Phone Charger', '200', 10, 'bd0c67026e0747f475c84f7300c0006c.jpg', '', 1511338462, 0, 1),
(51, 'Chargers', 'ASUS Charger for Zenfone2/T100CHI', 'ASUS Charger for Zenfone2/T100CHI', '499', 10, '96d35782e7e77cb6049c6d76bbec8d92.jpg', '', 1511338515, 0, 1),
(52, 'Chargers', 'Cell Phone Home / Travel Charger for SamsungGravity 3', 'Cell Phone Home / Travel Charger for SamsungGravity 3', '199', 10, '8f229ce2b3dde9de546182a54510fa64.jpg', '', 1511338720, 0, 0),
(53, 'Chargers', 'ChargeAll-Universal-Cell-Phone-Charger', 'ChargeAll-Universal-Cell-Phone-Charger', '699', 10, '45aff2a3f07300799486bf4e9b7ea5ab.jpg', '', 1511338763, 0, 1),
(54, 'Chargers', 'Motorola Motorola SPN5185B Cell Phone Travel Charger', 'Motorola Motorola SPN5185B Cell Phone Travel Charger', '549', 12, '2fc71deba5a8b219654835a705ef721c.jpg', '', 1511338829, 0, 1),
(55, 'Chargers', 'Apple 85W MagSafe 2 Power Adapter for MacBook Pro', 'Apple 85W MagSafe 2 Power Adapter for MacBook Pro', '3000', 12, '2c853259a245dc3a3a64ed3c4d752cf9.jpg', '', 1511338901, 0, 1),
(56, 'Chargers', 'Genuine Apple A1399 USB Mains Wall Charger Adaptor', 'Genuine Apple A1399 USB Mains Wall Charger Adaptor', '999', 10, 'c9ef545cec84595dbd79f8c1a87975fa.jpg', '', 1511338975, 0, 1),
(57, 'Chargers', 'Genuine Apple Macbook Charger 60W Magsafe Power Adapter', 'Genuine Apple Macbook Charger 60W Magsafe Power Adapter', '2999', 10, '989e81edc29e8c15b53f31c6c64145d0.jpg', '', 1511339012, 0, 1),
(58, 'Laptop', 'HP Laptop - 15z touch optional', 'Windows 10 Home 64\r\nAMD Dual-Core A9 APU\r\n8 GB memory; 1 TB HDD storage\r\nAMD Radeon™ R5 Graphics\r\n15.6" diagonal HD display', '30999', 5, 'cafba17f3f8c2f5d5893a1f8cd76cb9e.png', '', 1511339385, 0, 1),
(59, 'Laptop', 'Lenovo - 15.6" Laptop - AMD A6-Series - 4GB Memory - 500GB Hard', 'Lenovo - 15.6" Laptop - AMD A6-Series - 4GB Memory - 500GB Hard', '15999', 3, 'd9912a8df6951210e4f05abca3653c36.jpg', '', 1511339440, 0, 1),
(60, 'Laptop', 'HP 15 Core i3 6th Gen - (4 GB/1 TB HDD/Windows', 'HP 15 Core i3 6th Gen - 4 GB/1 TB HDD/Windows', '29999', 9, '17c118b2176d632dc2f04816be19963c.jpg', '', 1511339579, 0, 1),
(61, 'Laptop', 'HP Spectre x360 Laptop - 15" Touch', 'HP Spectre x360 Laptop - 15" Touch', '45999', 5, '1fe9f067fc3ac5688d11efde48505220.png', '', 1511339618, 0, 1),
(62, 'Accesories', 'Acer Aspire F 15', 'Acer Aspire F 15" Touchscreen Laptop - Silver (Intel Core i5-7200U/1 TB HDD/ 12 GB RAM/ Windows 10) ', '15999', 0, '5215ee78b85c7955468e764d688c49eb.jpg', 'ACER', 1511339908, 1514214731, 1),
(63, 'Laptop', 'ASUS Laptop X556UQ-NH71 Intel Core i7 7th Gen 7500U (2.70 GHz) ', 'ASUS Laptop X556UQ-NH71 Intel Core i7 7th Gen 7500U (2.70 GHz) ', '59999', 5, '02b9bc41bd0b7ba1778a54741126d226.jpg', '', 1511339965, 0, 1),
(64, 'Laptop', 'HP Stream 11.6" Celeron Laptop', 'HP Stream 11.6" Celeron Laptop', '13999', 4, '1932e7669c5fa71154426c080995d8de.jpg', '', 1511340053, 0, 1),
(65, 'Accesories', 'ACER ASPIRE ES1 332 BLACK', 'ACER ASPIRE ES1 332 BLACK', '24999', 5, 'a4416ce5dfdcbc12f2fed7e021a05bfb.jpg', 'Hope Elizabeth', 1511340098, 1514214675, 1),
(66, 'Laptop', 'Razer Blade 14 RZ09 Gaming Laptop', 'Razer Blade 14 RZ09 Gaming Laptop', '49999', 5, '0fa986baf6ab3c08f2f2da8c2590028c.jpg', '', 1511340190, 0, 1),
(67, 'Laptop', 'HP OMEN Gaming Laptop - 15"', 'HP OMEN Gaming Laptop - 15"', '69999', 5, '4bb0ab017e66c27d3cfe4c8af67a5c72.png', '', 1511340232, 0, 1),
(68, 'Accesories', 'Handy Grip Phone Strap', 'Handy Grip Phone Strap', '79', 1, '88a8fb3a3ebc5cfae89188b7ba2a0f13.jpg', '', 1511340458, 0, 1),
(70, 'Accesories', 'Wallet Card Holder Monogram', 'Wallet Card Holder Monogram', '149', 10, 'ab837e89c16fa65676a1c64dc3f4f2e6.jpg', '', 1511340559, 0, 1),
(71, 'Accesories', 'Cellphone Handy Tripod', 'Cellphone Handy Tripod', '699', 12, 'c88ed7275001601a42f182caf777a6f2.jpg', '', 1511340654, 0, 1),
(72, 'Accesories', 'Pop Socket', 'Pop Socket', '159', 5, '883a61eb5f1906380d501e61473f4a0c.jpg', '', 1511340697, 0, 1),
(73, 'Accesories', 'iPhone X Silicone Case ', 'iPhone X Silicone Case ', '499', 4, '086d5a48093979b6ff3d21a50e2d7593.png', '', 1511340732, 0, 1),
(74, 'Accesories', 'Selfie Stick', 'Selfie Stick', '149', 5, 'ea5efca5f2e91f7f2aa921d59e9ffcce.jpg', '', 1511340828, 0, 1),
(75, 'Accesories', 'Zilu CM001 Universal Car Phone Mount', 'Zilu CM001 Universal Car Phone Mount', '599', 5, 'cfee9f7173ba79d7d1bc23fe3b58017b.jpg', '', 1511340882, 0, 1),
(76, 'Accesories', 'Pokémon Folio Wallet iPhone 6 Case', 'Pokémon Folio Wallet iPhone 6 Case', '799', 5, '8c661bafef43556e6952691b9d109071.jpg', '', 1511340938, 0, 1),
(77, 'Accesories', 'Cell Phone Pocket Protectors', 'Cell Phone Pocket Protectors', '199', 5, '52d7a71cb950f6bac673ae057a6cf424.png', '', 1511341033, 0, 0),
(78, 'Accesories', 'Sports Armband for iPhone', 'Sports Armband for iPhone', '499', 5, 'c9b7c9536c6dd768fdde46a73039a666.jpg', '', 1511341087, 0, 1),
(79, 'Cellphone', 'iPhone 6 Plus 16GB', ' iPhone 6 Plus 16GB', '15999', 5, 'fbce06289bd19e1b0e3d6ed0cc6ee248.jpg', '', 1511341183, 0, 1),
(80, 'Featured', 'Samsung Note 7', 'The best and the new cellphone of samsung', '31231', 3, 'eb346adde4dece62a944a2406654ec32.jpg', '', 1511088860, 0, 1),
(81, 'Featured', 'HP Laptop - 15z touch optional', 'Windows 10 Home 64\r\nAMD Dual-Core A9 APU\r\n8 GB memory; 1 TB HDD storage\r\nAMD Radeon™ R5 Graphics\r\n15.6" diagonal HD display', '30999', 5, 'cafba17f3f8c2f5d5893a1f8cd76cb9e.png', '', 1511339385, 0, 1),
(82, 'Featured', 'HP Stream 11.6" Celeron Laptop', 'HP Stream 11.6" Celeron Laptop', '13999', 4, '1932e7669c5fa71154426c080995d8de.jpg', '', 1511340053, 0, 1),
(83, 'Featured', 'HP OMEN Gaming Laptop - 15"', 'HP OMEN Gaming Laptop - 15"', '69999', 5, '4bb0ab017e66c27d3cfe4c8af67a5c72.png', '', 1511340232, 0, 1),
(87, 'Chargers', 'Hoffco Celltronix Braided Heavy Duty Cell Phone Charging Cable', 'Hoffco Celltronix Braided Heavy Duty Cell Phone Charging Cable', '499', 5, '22a6e075f4e9b714efc7be7928e535b1.jpg', '', 1511345145, 0, 1),
(88, 'Chargers', 'Voltaic Amp Portable Solar Charger', 'Voltaic Amp Portable Solar Charger', '1299', 12, '5f0971d9aafb7a41013e748c6032cecb.jpg', '', 1511345207, 0, 1),
(89, 'Accesories', 'Silicone Phone Wallet Stand', 'Silicone Phone Wallet Stand', '79', 15, '4f808fb4b783d79eac2271a1ce5348b5.jpg', '', 1511345309, 0, 1),
(90, 'Accesories', 'Dual Layer Armor Defender Shockproof Protective Hard Case With Stand', 'Dual Layer Armor Defender Shockproof Protective Hard Case With Stand', '1199', 10, '903e1ed48fc87d7bdd11aff089509f54.jpg', '', 1511345438, 0, 1),
(92, 'Cellphone', 'LG V30 LTE Advanced', 'LG V30 LTE Advanced', '4999', 10, '42aad9ec180e618923171a985d5b5177.jpg', '', 1511346154, 0, 1),
(93, 'Cellphone', 'LG Leon 4G LTE H345', ' LG Leon 4G LTE H345', '4999', 5, 'fde3bff74cebc1fe33d8a0e516e2586b.jpg', '', 1511346297, 0, 1),
(94, 'Cellphone', 'Samsung Galaxy J7 J700M, 16GB, Dual SIM LTE, Factory Unlocked', 'Samsung Galaxy J7 J700M, 16GB, Dual SIM LTE, Factory Unlocked', '11499', 5, '10bcc2a89c4e2aa6536f90fc3e5aedaf.jpg', '', 1511346363, 0, 1),
(95, 'Cellphone', 'Galaxy Grand Prime ', 'Galaxy Grand Prime ', '7999', 6, '48f7d179581079ee7ec300385084c2eb.jpg', '', 1511346424, 0, 1),
(96, 'Cellphone', 'Samsung Galaxy Ace Dual-Sim', 'Samsung Galaxy Ace Dual-Sim', '3999', 6, 'a31284150fd78bf54d0e2271c0bcbd4c.jpg', '', 1511346484, 0, 1),
(97, 'Cellphone', 'HUAWEI Mate 9 Pro', 'HUAWEI Mate 9 Pro', '9999', 6, '8422e08ca4e8734225cc74944e336fb6.png', '', 1511346541, 0, 1),
(98, 'Cellphone', 'HUAWEI P9', 'HUAWEI P9', '8999', 7, 'aa2d913eb289ed760f717a43cb6dea2b.png', '', 1511346604, 0, 1),
(99, 'Cellphone', 'OPPO R9s', 'OPPO R9s', '8999', 10, '74e7fd054fe240537da1d0f7ac691a04.png', '', 1511346675, 0, 1),
(100, 'Cellphone', 'OPPO R9s Plus- Rose Gold', 'OPPO R9s Plus- Rose Gold', '10999', 6, 'e49eebe691b84d8891a3b3aebd1e7e4e.jpg', '', 1511346845, 0, 1),
(101, 'Laptop', 'Lenovo IdeaPad 300 Series', 'Lenovo IdeaPad 300 Series', '45000', 5, 'a93946af27682fa2065a4de782d4c23f.png', '', 1511346942, 0, 1),
(102, 'Laptop', 'HP Flyer Red 15.6" 15-f272wm Laptop PC', 'HP Flyer Red 15.6" 15-f272wm Laptop PC', '45555', 5, '045cc8f73811d9393cfb3448643e7235.jpg', '', 1511347083, 0, 1),
(103, 'Accesories', 'kjhinkl', 'hdshd\r\n', '55', 564, 'default-product.jpg', '43jb', 1514251960, 0, 1);

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
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`log_id`, `user_id`, `user_type`, `username`, `date`, `action`, `status`) VALUES
(83, 11, '1', 'veocalimlim', '1511308371', 'veocalimlim just logged out.', 1),
(84, 11, '1', 'veocalimlim', '1511308442', 'veocalimlim just logged in.', 1),
(85, 11, '1', 'veocalimlim', '1511317037', 'veocalimlim just logged out.', 1),
(86, 12, '2', 'vvcalimlim', '1511318670', 'vvcalimlim just logged in.', 1),
(87, 11, '1', 'veocalimlim', '1511318909', 'veocalimlim just logged in.', 1),
(88, 11, '1', 'veocalimlim', '1511335134', 'veocalimlim just logged in.', 1),
(89, 11, '1', 'veocalimlim', '1511335217', 'veocalimlim just logged out.', 1),
(90, 12, '2', 'vvcalimlim', '1511335228', 'vvcalimlim just logged in.', 1),
(91, 12, '2', 'vvcalimlim', '1511335267', 'vvcalimlim just logged out.', 1),
(92, 11, '1', 'veocalimlim', '1511335292', 'veocalimlim just logged in.', 1),
(93, 11, '1', 'veocalimlim', '1511335494', 'veocalimlim just logged out.', 1),
(94, 12, '2', 'vvcalimlim', '1511335500', 'vvcalimlim just logged in.', 1),
(95, 12, '2', 'vvcalimlim', '1511335506', 'vvcalimlim viewed the product Laptop', 0),
(96, 12, '2', 'vvcalimlim', '1511335508', 'vvcalimlim viewed the product ', 0),
(97, 12, '2', 'vvcalimlim', '1511335518', 'vvcalimlim just logged out.', 1),
(98, 11, '1', 'veocalimlim', '1511335589', 'veocalimlim just logged in.', 1),
(99, 11, '1', 'veocalimlim', '1511336157', 'veocalimlim just logged out.', 1),
(100, 11, '1', 'veocalimlim', '1511336309', 'veocalimlim just logged in.', 1),
(101, 12, '2', 'vvcalimlim', '1511336385', 'vvcalimlim just logged in.', 1),
(102, 12, '2', 'vvcalimlim', '1511336528', 'vvcalimlim just logged out.', 1),
(103, 12, '2', 'vvcalimlim', '1511336677', 'vvcalimlim just logged in.', 1),
(104, 12, '2', 'vvcalimlim', '1511337250', 'vvcalimlim viewed the product Laptop', 0),
(105, 12, '2', 'vvcalimlim', '1511337251', 'vvcalimlim viewed the product ', 0),
(106, 12, '2', 'vvcalimlim', '1511337436', 'vvcalimlim just logged out.', 1),
(107, 12, '2', 'vvcalimlim', '1511337459', 'vvcalimlim just logged in.', 1),
(108, 12, '2', 'vvcalimlim', '1511337478', 'vvcalimlim viewed the product Asus Laptop Charger 19V', 0),
(109, 12, '2', 'vvcalimlim', '1511337480', 'vvcalimlim viewed the product ', 0),
(110, 11, '1', 'veocalimlim', '1511338330', 'veocalimlim viewed the product Universal Charger', 0),
(111, 11, '1', 'veocalimlim', '1511338331', 'veocalimlim viewed the product ', 0),
(112, 11, '1', 'veocalimlim', '1511340280', 'veocalimlim viewed the product Test2', 0),
(113, 11, '1', 'veocalimlim', '1511340282', 'veocalimlim viewed the product ', 0),
(114, 11, '1', 'veocalimlim', '1511341330', 'veocalimlim just logged out.', 1),
(115, 11, '1', 'veocalimlim', '1511344069', 'veocalimlim just logged in.', 1),
(116, 11, '1', 'veocalimlim', '1511344948', 'veocalimlim just logged in.', 1),
(117, 11, '1', 'veocalimlim', '1511345216', 'veocalimlim viewed the product Hoffco Celltronix Braided Heavy Duty Cell Phone Charging Cable', 0),
(118, 11, '1', 'veocalimlim', '1511345217', 'veocalimlim viewed the product ', 0),
(119, 11, '1', 'veocalimlim', '1511346681', 'veocalimlim viewed the product OPPO R9s', 0),
(120, 11, '1', 'veocalimlim', '1511346682', 'veocalimlim viewed the product ', 0),
(121, 12, '2', 'vvcalimlim', '1511352501', 'vvcalimlim just logged in.', 1),
(122, 12, '2', 'vvcalimlim', '1511352573', 'vvcalimlim viewed the product Alcatel Flash Plus', 0),
(123, 12, '2', 'vvcalimlim', '1511352573', 'vvcalimlim viewed the product ', 0),
(124, 12, '2', 'vvcalimlim', '1511352600', 'vvcalimlim just logged out.', 1),
(125, 11, '1', 'veocalimlim', '1511352611', 'veocalimlim just logged in.', 1),
(126, 12, '2', 'vvcalimlim', '1511420104', 'vvcalimlim just logged in.', 1),
(127, 12, '2', 'vvcalimlim', '1511420121', 'vvcalimlim just logged out.', 1),
(128, 12, '2', 'vvcalimlim', '1511420569', 'vvcalimlim just logged in.', 1),
(129, 12, '2', 'vvcalimlim', '1511420645', 'vvcalimlim just logged out.', 1),
(130, 11, '1', 'veocalimlim', '1511420661', 'veocalimlim just logged in.', 1),
(131, 12, '2', 'vvcalimlim', '1511423530', 'vvcalimlim just logged in.', 1),
(132, 12, '2', 'vvcalimlim', '1511423540', 'vvcalimlim just logged out.', 1),
(133, 11, '1', 'veocalimlim', '1511424652', 'veocalimlim just logged out.', 1),
(134, 11, '1', 'veocalimlim', '1511425861', 'veocalimlim just logged in.', 1),
(135, 11, '1', 'veocalimlim', '1511425956', 'veocalimlim just logged out.', 1),
(136, 12, '2', 'vvcalimlim', '1511425981', 'vvcalimlim just logged in.', 1),
(137, 12, '2', 'vvcalimlim', '1511426051', 'vvcalimlim just logged out.', 1),
(138, 11, '1', 'veocalimlim', '1511426137', 'veocalimlim just logged in.', 1),
(139, 12, '2', 'vvcalimlim', '1511490930', 'vvcalimlim just logged in.', 1),
(140, 12, '2', 'vvcalimlim', '1511494847', 'vvcalimlim viewed the product Samsung Note 7', 0),
(141, 12, '2', 'vvcalimlim', '1511494848', 'vvcalimlim viewed the product ', 0),
(142, 12, '2', 'vvcalimlim', '1511513568', 'vvcalimlim just logged in.', 1),
(143, 12, '2', 'vvcalimlim', '1511513589', 'vvcalimlim viewed the product HP Laptop - 15z touch optional', 0),
(144, 12, '2', 'vvcalimlim', '1511513590', 'vvcalimlim viewed the product ', 0),
(145, 12, '2', 'vvcalimlim', '1511513642', 'vvcalimlim just logged out.', 1),
(146, 12, '2', 'vvcalimlim', '1511513889', 'vvcalimlim just logged in.', 1),
(147, 15, '0', 'seej', '1513436935', 'seej just logged in.', 1),
(148, 11, '1', 'veocalimlim', '1513437858', 'veocalimlim just logged in.', 1),
(149, 11, '1', 'veocalimlim', '1513438057', 'veocalimlim just logged in.', 1),
(150, 11, '1', 'veocalimlim', '1513438453', 'veocalimlim just logged out.', 1),
(151, 15, '0', 'seej', '1513471218', 'seej just logged in.', 1),
(152, 15, '0', 'seej', '1513471397', 'seej just logged in.', 1),
(153, 15, '0', 'seej', '1513471558', 'seej just logged in.', 1),
(154, 11, '1', 'veocalimlim', '1513472395', 'veocalimlim just logged in.', 1),
(155, 11, '1', 'veocalimlim', '1513472425', 'veocalimlim just logged in.', 1),
(156, 15, '0', 'seej', '1513473018', 'seej just logged in.', 1),
(157, 15, '0', 'seej', '1513473134', 'seej just logged in.', 1),
(158, 11, '1', 'veocalimlim', '1513473159', 'veocalimlim just logged in.', 1),
(159, 11, '1', 'veocalimlim', '1513474398', 'veocalimlim just logged out.', 1),
(160, 15, '0', 'seej', '1513474403', 'seej just logged in.', 1),
(161, 15, '0', 'seej', '1513474992', 'seej just logged out.', 1),
(162, 15, '0', 'seej', '1513474995', 'seej just logged in.', 1),
(163, 15, '0', 'seej', '1513475751', 'seej just logged out.', 1),
(164, 11, '1', 'veocalimlim', '1513475757', 'veocalimlim just logged in.', 1),
(165, 11, '1', 'veocalimlim', '1513476912', 'veocalimlim just logged out.', 1),
(166, 15, '0', 'seej', '1513476916', 'seej just logged in.', 1),
(167, 15, '0', 'seej', '1513476971', 'seej just logged out.', 1),
(168, 11, '1', 'veocalimlim', '1513477038', 'veocalimlim just logged in.', 1),
(169, 11, '1', 'veocalimlim', '1513478865', 'veocalimlim just logged out.', 1),
(170, 15, '0', 'seej', '1513485630', 'seej just logged in.', 1),
(171, 15, '0', 'seej', '1513517167', 'seej just logged in.', 1),
(172, 11, '1', 'veocalimlim', '1513517296', 'veocalimlim just logged in.', 1),
(173, 15, '0', 'seej', '1513517309', 'seej just logged in.', 1),
(174, 15, '0', 'seej', '1513517982', 'seej just logged in.', 1),
(175, 15, '0', 'seej', '1513518137', 'seej just logged out.', 1),
(176, 11, '1', 'veocalimlim', '1513518144', 'veocalimlim just logged in.', 1),
(177, 11, '1', 'veocalimlim', '1513518216', 'veocalimlim just logged out.', 1),
(178, 15, '0', 'seej', '1513518220', 'seej just logged in.', 1),
(179, 15, '0', 'seej', '1513518633', 'seej just logged out.', 1),
(180, 11, '1', 'veocalimlim', '1513518637', 'veocalimlim just logged in.', 1),
(181, 15, '0', 'seej', '1513519025', 'seej just logged in.', 1),
(182, 11, '1', 'veocalimlim', '1513549753', 'veocalimlim just logged in.', 1),
(183, 15, '0', 'seej', '1513566751', 'seej just logged in.', 1),
(184, 15, '0', 'seej', '1513566975', 'seej just logged out.', 1),
(185, 15, '0', 'seej', '1513570778', 'seej just logged in.', 1),
(186, 15, '0', 'seej', '1513570916', 'seej just logged out.', 1),
(187, 15, '0', 'seej', '1513570939', 'seej just logged in.', 1),
(188, 15, '0', 'seej', '1513573222', 'seej just logged out.', 1),
(189, 15, '0', 'seej', '1513603381', 'seej just logged in.', 1),
(190, 15, '0', 'seej', '1513603777', 'seej just logged in.', 1),
(191, 15, '0', 'seej', '1513644641', 'seej just logged in.', 1),
(192, 15, '0', 'seej', '1513649189', 'seej just logged out.', 1),
(193, 15, '0', 'seej', '1513649202', 'seej just logged in.', 1),
(194, 15, '0', 'seej', '1513650518', 'seej just logged in.', 1),
(195, 15, '0', 'seej', '1513650737', 'seej just logged in.', 1),
(196, 11, '1', 'veocalimlim', '1513651355', 'veocalimlim just logged in.', 1),
(197, 15, '0', 'seej', '1513660254', 'seej just logged in.', 1),
(198, 15, '0', 'seej', '1513663444', 'seej just logged in.', 1),
(199, 15, '0', 'seej', '1513681688', 'seej just logged in.', 1),
(200, 15, '0', 'seej', '1513682594', 'seej just logged in.', 1),
(201, 15, '0', 'seej', '1513686879', 'seej just logged in.', 1),
(202, 15, '0', 'seej', '1513687800', 'seej just logged in.', 1),
(203, 15, '0', 'seej', '1513689434', 'seej just logged out.', 1),
(204, 15, '0', 'seej', '1513689438', 'seej just logged in.', 1),
(205, 15, '0', 'seej', '1513689507', 'seej just logged out.', 1),
(206, 15, '0', 'seej', '1513689513', 'seej just logged in.', 1),
(207, 15, '0', 'seej', '1513689771', 'seej just logged out.', 1),
(208, 11, '1', 'veocalimlim', '1513689776', 'veocalimlim just logged in.', 1),
(209, 11, '1', 'veocalimlim', '1513689866', 'veocalimlim just logged out.', 1),
(210, 15, '0', 'seej', '1513693214', 'seej just logged in.', 1),
(211, 15, '0', 'seej', '1513693922', 'seej just logged in.', 1),
(212, 15, '0', 'seej', '1513694049', 'seej just logged in.', 1),
(213, 15, '0', 'seej', '1513694883', 'seej just logged out.', 1),
(214, 15, '0', 'seej', '1513733138', 'seej just logged in.', 1),
(215, 15, '0', 'seej', '1513733495', 'seej just logged out.', 1),
(216, 11, '1', 'veocalimlim', '1513733500', 'veocalimlim just logged in.', 1),
(217, 15, '0', 'seej', '1513733592', 'seej just logged in.', 1),
(218, 15, '0', 'seej', '1513734955', 'seej just logged out.', 1),
(219, 11, '1', 'veocalimlim', '1513734966', 'veocalimlim just logged out.', 1),
(220, 15, '0', 'seej', '1513735500', 'seej just logged in.', 1),
(221, 15, '0', 'seej', '1513754482', 'seej just logged in.', 1),
(222, 15, '0', 'seej', '1513829334', 'seej just logged in.', 1),
(223, 15, '0', 'seej', '1513829342', 'seej just logged out.', 1),
(224, 11, '1', 'veocalimlim', '1513829352', 'veocalimlim just logged in.', 1),
(225, 11, '1', 'veocalimlim', '1513830343', 'veocalimlim just logged out.', 1),
(226, 15, '0', 'seej', '1513830361', 'seej just logged in.', 1),
(227, 15, '0', 'seej', '1513832924', 'seej just logged out.', 1),
(228, 15, '0', 'seej', '1513852796', 'seej just logged in.', 1),
(229, 15, '0', 'seej', '1513853650', 'seej just logged out.', 1),
(230, 12, '2', 'vvcalimlim', '1513853665', 'vvcalimlim just logged in.', 1),
(231, 12, '2', 'vvcalimlim', '1513853770', 'vvcalimlim just logged out.', 1),
(232, 11, '1', 'veocalimlim', '1513853887', 'veocalimlim just logged in.', 1),
(233, 11, '1', 'veocalimlim', '1513854096', 'veocalimlim just logged out.', 1),
(234, 12, '2', 'vvcalimlim', '1513854109', 'vvcalimlim just logged in.', 1),
(235, 12, '2', 'vvcalimlim', '1513854775', 'vvcalimlim just logged out.', 1),
(236, 15, '0', 'seej', '1513855230', 'seej just logged in.', 1),
(237, 15, '0', 'seej', '1513867247', 'seej just logged in.', 1),
(238, 15, '0', 'seej', '1513869136', 'seej just logged out.', 1),
(239, 11, '1', 'veocalimlim', '1513869173', 'veocalimlim just logged in.', 1),
(240, 11, '1', 'veocalimlim', '1513869694', 'veocalimlim just logged out.', 1),
(241, 15, '0', 'seej', '1513869698', 'seej just logged in.', 1),
(242, 15, '0', 'seej', '1513869748', 'seej just logged out.', 1),
(243, 11, '1', 'veocalimlim', '1513869755', 'veocalimlim just logged in.', 1),
(244, 11, '1', 'veocalimlim', '1513869826', 'veocalimlim just logged in.', 1),
(245, 15, '0', 'seej', '1514040784', 'seej just logged in.', 1),
(246, 15, '0', 'seej', '1514042096', 'seej just logged out.', 1),
(247, 15, '0', 'seej', '1514042118', 'seej just logged in.', 1),
(248, 15, '0', 'seej', '1514042962', 'seej just logged out.', 1),
(249, 11, '1', 'veocalimlim', '1514042969', 'veocalimlim just logged in.', 1),
(250, 11, '1', 'veocalimlim', '1514048323', 'veocalimlim just logged out.', 1),
(251, 15, '0', 'seej', '1514048331', 'seej just logged in.', 1),
(252, 15, '0', 'seej', '1514048889', 'seej just logged out.', 1),
(253, 15, '0', 'seej', '1514048920', 'seej just logged in.', 1),
(254, 15, '0', 'seej', '1514049002', 'seej just logged out.', 1),
(255, 15, '0', 'seej', '1514092111', 'seej just logged in.', 1),
(256, 15, '0', 'seej', '1514094065', 'seej just logged out.', 1),
(257, 15, '0', 'seej', '1514094071', 'seej just logged in.', 1),
(258, 15, '0', 'seej', '1514094093', 'seej just logged out.', 1),
(259, 15, '0', 'seej', '1514094490', 'seej just logged in.', 1),
(260, 15, '0', 'seej', '1514094657', 'seej just logged out.', 1),
(261, 15, '0', 'seej', '1514094773', 'seej just logged in.', 1),
(262, 15, '0', 'seej', '1514094801', 'seej just logged in.', 1),
(263, 15, '0', 'seej', '1514094873', 'seej just logged out.', 1),
(264, 11, '1', 'veocalimlim', '1514094883', 'veocalimlim just logged in.', 1),
(265, 11, '1', 'veocalimlim', '1514094901', 'veocalimlim just logged out.', 1),
(266, 15, '0', 'seej', '1514094904', 'seej just logged in.', 1),
(267, 15, '0', 'seej', '1514094926', 'seej just logged in.', 1),
(268, 15, '0', 'seej', '1514094967', 'seej just logged in.', 1),
(269, 15, '0', 'seej', '1514095055', 'seej just logged out.', 1),
(270, 15, '0', 'seej', '1514095107', 'seej just logged out.', 1),
(271, 11, '1', 'veocalimlim', '1514095113', 'veocalimlim just logged in.', 1),
(272, 11, '1', 'veocalimlim', '1514096078', 'veocalimlim just logged out.', 1),
(273, 12, '2', 'vvcalimlim', '1514096715', 'vvcalimlim just logged in.', 1),
(274, 12, '2', 'vvcalimlim', '1514096730', 'vvcalimlim just logged out.', 1),
(275, 15, '0', 'seej', '1514097339', 'seej just logged in.', 1),
(276, 15, '0', 'seej', '1514097794', 'seej just logged out.', 1),
(277, 15, '0', 'seej', '1514098387', 'seej just logged in.', 1),
(278, 15, '0', 'seej', '1514099335', 'seej just logged out.', 1),
(279, 12, '2', 'vvcalimlim', '1514099741', 'vvcalimlim just logged in.', 1),
(280, 15, '0', 'seej', '1514104180', 'seej just logged in.', 1),
(281, 15, '0', 'seej', '1514104251', 'seej just logged out.', 1),
(282, 12, '2', 'vvcalimlim', '1514104262', 'vvcalimlim just logged in.', 1),
(283, 12, '2', 'vvcalimlim', '1514104313', 'vvcalimlim just logged in.', 1),
(284, 15, '0', 'seej', '1514105127', 'seej just logged in.', 1),
(285, 12, '2', 'vvcalimlim', '1514105475', 'vvcalimlim just logged out.', 1),
(286, 12, '2', 'vvcalimlim', '1514105496', 'vvcalimlim just logged in.', 1),
(287, 12, '2', 'vvcalimlim', '1514107927', 'vvcalimlim just logged in.', 1),
(288, 12, '2', 'vvcalimlim', '1514107988', 'vvcalimlim just logged out.', 1),
(289, 15, '0', 'seej', '1514110582', 'seej just logged in.', 1),
(290, 15, '0', 'seej', '1514110587', 'seej just logged out.', 1),
(291, 15, '0', 'seej', '1514110645', 'seej just logged in.', 1),
(292, 15, '0', 'seej', '1514111484', 'seej just logged out.', 1),
(293, 15, '0', 'seej', '1514114009', 'seej just logged in.', 1),
(294, 15, '0', 'seej', '1514114015', 'seej just logged out.', 1),
(295, 12, '2', 'vvcalimlim', '1514114393', 'vvcalimlim just logged in.', 1),
(296, 12, '2', 'vvcalimlim', '1514114399', 'vvcalimlim just logged out.', 1),
(297, 15, '0', 'seej', '1514114464', 'seej just logged in.', 1),
(298, 15, '0', 'seej', '1514114473', 'seej just logged out.', 1),
(299, 12, '2', 'vvcalimlim', '1514127266', 'vvcalimlim just logged in.', 1),
(300, 12, '2', 'vvcalimlim', '1514127282', 'vvcalimlim just logged out.', 1),
(301, 15, '0', 'seej', '1514127288', 'seej just logged in.', 1),
(302, 15, '0', 'seej', '1514127302', 'seej just logged out.', 1),
(303, 12, '2', 'vvcalimlim', '1514127315', 'vvcalimlim just logged in.', 1),
(304, 12, '2', 'vvcalimlim', '1514127323', 'vvcalimlim just logged out.', 1),
(305, 15, '0', 'seej', '1514127337', 'seej just logged in.', 1),
(306, 15, '0', 'seej', '1514127463', 'seej just logged out.', 1),
(307, 15, '0', 'seej', '1514127497', 'seej just logged in.', 1),
(308, 15, '0', 'seej', '1514127515', 'seej just logged out.', 1),
(309, 15, '0', 'seej', '1514127547', 'seej just logged in.', 1),
(310, 15, '0', 'seej', '1514127569', 'seej just logged out.', 1),
(311, 15, '0', 'seej', '1514128075', 'seej just logged in.', 1),
(312, 15, '0', 'seej', '1514128546', 'seej just logged out.', 1),
(313, 15, '0', 'seej', '1514128558', 'seej just logged in.', 1),
(314, 15, '0', 'seej', '1514128642', 'seej just logged out.', 1),
(315, 15, '0', 'seej', '1514128901', 'seej just logged in.', 1),
(316, 15, '0', 'seej', '1514128974', 'seej just logged out.', 1),
(317, 15, '0', 'seej', '1514128999', 'seej just logged in.', 1),
(318, 15, '0', 'seej', '1514130179', 'seej just logged out.', 1),
(319, 15, '0', 'seej', '1514130187', 'seej just logged in.', 1),
(320, 15, '0', 'seej', '1514131125', 'seej just logged out.', 1),
(321, 15, '0', 'seej', '1514131133', 'seej just logged in.', 1),
(322, 15, '0', 'seej', '1514131885', 'seej just logged in.', 1),
(323, 15, '0', 'seej', '1514131985', 'seej just logged in.', 1),
(324, 15, '0', 'seej', '1514132098', 'seej just logged out.', 1),
(325, 15, '0', 'seej', '1514133328', 'seej just logged out.', 1),
(326, 12, '2', 'vvcalimlim', '1514133338', 'vvcalimlim just logged in.', 1),
(327, 12, '2', 'vvcalimlim', '1514133414', 'vvcalimlim just logged out.', 1),
(328, 12, '2', 'vvcalimlim', '1514133420', 'vvcalimlim just logged in.', 1),
(329, 12, '2', 'vvcalimlim', '1514133527', 'vvcalimlim just logged out.', 1),
(330, 15, '0', 'seej', '1514133533', 'seej just logged in.', 1),
(331, 15, '0', 'seej', '1514133544', 'seej just logged out.', 1),
(332, 15, '0', 'seej', '1514133561', 'seej just logged in.', 1),
(333, 12, '2', 'vvcalimlim', '1514134249', 'vvcalimlim just logged in.', 1),
(334, 12, '2', 'vvcalimlim', '1514134254', 'vvcalimlim just logged out.', 1),
(335, 12, '2', 'vvcalimlim', '1514134360', 'vvcalimlim just logged in.', 1),
(336, 12, '2', 'vvcalimlim', '1514134368', 'vvcalimlim just logged out.', 1),
(337, 15, '0', 'seej', '1514134433', 'seej just logged in.', 1),
(338, 15, '0', 'seej', '1514134760', 'seej just logged out.', 1),
(339, 15, '0', 'seej', '1514173881', 'seej just logged in.', 1),
(340, 12, '2', 'vvcalimlim', '1514173920', 'vvcalimlim just logged in.', 1),
(341, 12, '2', 'vvcalimlim', '1514174081', 'vvcalimlim just logged out.', 1),
(342, 15, '0', 'seej', '1514174089', 'seej just logged in.', 1),
(343, 15, '0', 'seej', '1514174772', 'seej just logged out.', 1),
(344, 15, '0', 'seej', '1514174777', 'seej just logged in.', 1),
(345, 15, '0', 'seej', '1514176410', 'seej just logged out.', 1),
(346, 15, '0', 'seej', '1514176415', 'seej just logged in.', 1),
(347, 15, '0', 'seej', '1514176710', 'seej just logged out.', 1),
(348, 15, '0', 'seej', '1514176715', ' just logged in.', 1),
(349, 15, '0', 'seej', '1514176829', 'seej just logged out.', 1),
(350, 15, '0', 'seej', '1514176839', 'seej just logged in.', 1),
(351, 15, '0', 'seej', '1514176862', 'seej just logged out.', 1),
(352, 15, '0', 'seej', '1514176868', 'seej just logged in.', 1),
(353, 15, '0', 'seej', '1514176921', 'seej just logged out.', 1),
(354, 15, '0', 'seej', '1514176929', 'Logged in.', 1),
(355, 15, '0', 'seej', '1514177190', 'seej just logged out.', 1),
(356, 11, '1', 'veocalimlim', '1514177198', 'Logged in.', 1),
(357, 11, '1', 'veocalimlim', '1514177554', 'veocalimlim just logged out.', 1),
(358, 12, '2', 'vvcalimlim', '1514177892', 'Logged in.', 1),
(359, 12, '2', 'vvcalimlim', '1514178092', 'Logged out.', 1),
(360, 15, '0', 'seej', '1514178100', 'Logged in.', 1),
(361, 15, '0', 'seej', '1514178361', 'Logged out.', 1),
(362, 15, '0', 'seej', '1514179255', 'Logged in.', 1),
(363, 15, '0', 'seej', '1514179447', 'Restored product65', 1),
(364, 15, '0', 'seej', '1514179458', 'Restored product65', 1),
(365, 15, '0', 'seej', '1514179502', 'Restored product #51', 1),
(366, 15, '0', 'seej', '1514179578', 'Deleted product #62', 1),
(367, 15, '0', 'seej', '1514179594', 'Restored product #62', 1),
(368, 15, '0', 'seej', '1514179620', 'Deleted product #67', 1),
(369, 15, '0', 'seej', '1514179624', 'Restored product #58', 1),
(370, 15, '0', 'seej', '1514179691', 'Deleted product #87', 1),
(371, 15, '0', 'seej', '1514179701', 'Restored product #87', 1),
(372, 15, '0', 'seej', '1514179902', 'Logged out.', 1),
(373, 15, '0', 'seej', '1514179942', 'Logged in.', 1),
(374, 15, '0', 'seej', '1514181714', 'Logged out.', 1),
(375, 15, '0', 'seej', '1514182524', 'Logged in.', 1),
(376, 15, '0', 'seej', '1514184293', 'Logged in.', 1),
(377, 15, '0', 'seej', '1514184310', 'Logged out.', 1),
(378, 12, '2', 'vvcalimlim', '1514184324', 'Logged in.', 1),
(379, 12, '2', 'vvcalimlim', '1514184329', 'Logged out.', 1),
(380, 15, '0', 'seej', '1514184351', 'Logged in.', 1),
(381, 15, '0', 'seej', '1514184360', 'Logged out.', 1),
(382, 12, '2', 'vvcalimlim', '1514184370', 'Logged in.', 1),
(383, 12, '2', 'vvcalimlim', '1514184376', 'Logged out.', 1),
(384, 15, '0', 'seej', '1514184386', 'Logged in.', 1),
(385, 15, '0', 'seej', '1514189481', 'Logged in.', 1),
(386, 15, '0', 'seej', '1514189781', 'Logged in.', 1),
(387, 15, '0', 'seej', '1514190077', 'Deleted product #65', 1),
(388, 15, '0', 'seej', '1514190118', 'Deleted product #62', 1),
(389, 15, '0', 'seej', '1514190126', 'Deleted product #51', 1),
(390, 15, '0', 'seej', '1514190130', 'Deleted product #47', 1),
(391, 15, '0', 'seej', '1514190134', 'Deleted product #63', 1),
(392, 15, '0', 'seej', '1514190142', 'Deleted product #52', 1),
(393, 15, '0', 'seej', '1514190158', 'Deleted product #77', 1),
(394, 15, '0', 'seej', '1514190214', 'Restored product #65', 1),
(395, 15, '0', 'seej', '1514190219', 'Restored product #67', 1),
(396, 15, '0', 'seej', '1514190248', 'Restored product #62', 1),
(397, 15, '0', 'seej', '1514190276', 'Restored product #55', 1),
(398, 15, '0', 'seej', '1514190300', 'Restored product #51', 1),
(399, 15, '0', 'seej', '1514192381', 'Logged out.', 1),
(400, 15, '0', 'seej', '1514192388', 'Logged in.', 1),
(401, 15, '0', 'seej', '1514193319', 'Logged out.', 1),
(402, 15, '0', 'seej', '1514193640', 'Logged in.', 1),
(403, 15, '0', 'seej', '1514193977', 'Restored product #63', 1),
(404, 15, '0', 'seej', '1514206175', 'Logged out.', 1),
(405, 15, '0', 'seej', '1514206223', 'Logged in.', 1),
(406, 15, '0', 'seej', '1514206366', 'Logged in.', 1),
(407, 15, '0', 'seej', '1514208024', 'Logged out.', 1),
(408, 11, '1', 'veocalimlim', '1514208131', 'Logged in.', 1),
(409, 11, '1', 'veocalimlim', '1514208169', 'Logged out.', 1),
(410, 12, '2', 'vvcalimlim', '1514208224', 'Logged in.', 1),
(411, 12, '2', 'vvcalimlim', '1514208227', 'Logged out.', 1),
(412, 15, '0', 'seej', '1514208232', 'Logged in.', 1),
(413, 15, '0', 'seej', '1514209259', 'Restored product #47', 1),
(414, 12, '2', 'vvcalimlim', '1514213204', 'Logged in.', 1),
(415, 12, '2', 'vvcalimlim', '1514213227', 'Logged out.', 1),
(416, 15, '0', 'seej', '1514213233', 'Logged in.', 1),
(417, 15, '0', 'seej', '1514218947', 'Logged out.', 1),
(418, 15, '0', 'seej', '1514219064', 'Logged in.', 1),
(419, 15, '0', 'seej', '1514219169', 'Logged out.', 1),
(420, 15, '0', 'seej', '1514220101', 'Logged in.', 1),
(421, 15, '0', 'seej', '1514220117', 'Logged out.', 1),
(422, 15, '0', 'seej', '1514220257', 'Logged in.', 1),
(423, 15, '0', 'seej', '1514220261', 'Logged out.', 1),
(424, 15, '0', 'seej', '1514220543', 'Logged in.', 1),
(425, 15, '0', 'seej', '1514220551', 'Logged out.', 1),
(426, 15, '0', 'seej', '1514221484', 'Logged in.', 1),
(427, 15, '0', 'seej', '1514250817', 'Logged in.', 1),
(428, 15, '0', 'seej', '1514253997', 'Logged out.', 1),
(429, 11, '1', 'veocalimlim', '1514257158', 'Logged in.', 1),
(430, 11, '1', 'veocalimlim', '1514257279', 'Logged out.', 1),
(431, 12, '2', 'vvcalimlim', '1514257530', 'Logged in.', 1),
(432, 12, '2', 'vvcalimlim', '1514257585', 'Logged out.', 1),
(433, 15, '0', 'seej', '1514257590', 'Logged in.', 1),
(434, 15, '0', 'seej', '1514257611', 'Logged out.', 1),
(435, 11, '1', 'veocalimlim', '1514257787', 'Logged in.', 1),
(436, 11, '1', 'veocalimlim', '1514258470', 'Logged out.', 1),
(437, 15, '0', 'seej', '1514261212', 'Logged in.', 1),
(438, 15, '0', 'seej', '1514261249', 'Logged out.', 1),
(439, 12, '2', 'vvcalimlim', '1514261305', 'Logged in.', 1),
(440, 12, '2', 'vvcalimlim', '1514261312', 'Logged out.', 1),
(441, 15, '0', 'seej', '1514263387', 'Logged in.', 1),
(442, 15, '0', 'seej', '1514263671', 'Logged out.', 1),
(443, 15, '0', 'seej', '1514285348', 'Logged in.', 1),
(444, 15, '0', 'seej', '1514296876', 'Logged in.', 1),
(445, 15, '0', 'seej', '1514296998', 'Logged in.', 1),
(446, 15, '0', 'seej', '1514299994', 'Logged out.', 1),
(447, 11, '1', 'veocalimlim', '1514300002', 'Logged in.', 1),
(448, 11, '1', 'veocalimlim', '1514300183', 'Logged out.', 1),
(449, 15, '0', 'seej', '1514300892', 'Logged in.', 1),
(450, 15, '0', 'seej', '1514301499', 'Logged out.', 1),
(451, 15, '0', 'seej', '1514303747', 'Logged in.', 1),
(452, 15, '0', 'seej', '1514303753', 'Logged out.', 1),
(453, 15, '0', 'seej', '1514303760', 'Logged in.', 1),
(454, 15, '0', 'seej', '1514303765', 'Logged out.', 1),
(455, 11, '1', 'veocalimlim', '1514303775', 'Logged in.', 1),
(456, 11, '1', 'veocalimlim', '1514303783', 'Logged out.', 1),
(457, 11, '1', 'veocalimlim', '1514303817', 'Logged in.', 1),
(458, 11, '1', 'veocalimlim', '1514303822', 'Logged out.', 1),
(459, 12, '2', 'vvcalimlim', '1514303921', 'Logged in.', 1),
(460, 12, '2', 'vvcalimlim', '1514303924', 'Logged out.', 1),
(461, 11, '1', 'veocalimlim', '1514304078', 'Logged in.', 1),
(462, 11, '1', 'veocalimlim', '1514304082', 'Logged out.', 1),
(463, 12, '2', 'vvcalimlim', '1514304091', 'Logged in.', 1),
(464, 12, '2', 'vvcalimlim', '1514304095', 'Logged out.', 1),
(465, 12, '2', 'vvcalimlim', '1514304304', 'Logged in.', 1),
(466, 12, '2', 'vvcalimlim', '1514304307', 'Logged out.', 1),
(467, 15, '0', 'seej', '1514304579', 'Logged in.', 1),
(468, 15, '0', 'seej', '1514304583', 'Logged out.', 1),
(469, 11, '1', 'veocalimlim', '1514304661', 'Logged in.', 1),
(470, 11, '1', 'veocalimlim', '1514304671', 'Logged out.', 1),
(471, 15, '0', 'seej', '1514305926', 'Logged in.', 1),
(472, 15, '0', 'seej', '1514306303', 'Logged out.', 1),
(473, 11, '1', 'veocalimlim', '1514306322', 'Logged in.', 1),
(474, 11, '1', 'veocalimlim', '1514306329', 'Logged out.', 1),
(475, 15, '0', 'seej', '1514306476', 'Logged in.', 1),
(476, 15, '0', 'seej', '1514306511', 'Logged out.', 1),
(477, 11, '1', 'veocalimlim', '1514306517', 'Logged in.', 1),
(478, 11, '1', 'veocalimlim', '1514306521', 'Logged out.', 1),
(479, 12, '2', 'vvcalimlim', '1514307044', 'Logged in.', 1),
(480, 12, '2', 'vvcalimlim', '1514307053', 'Logged out.', 1),
(481, 11, '1', 'veocalimlim', '1514307059', 'Logged in.', 1),
(482, 11, '1', 'veocalimlim', '1514307074', 'Logged out.', 1),
(483, 11, '1', 'veocalimlim', '1514341588', 'Logged in.', 1),
(484, 11, '1', 'veocalimlim', '1514341601', 'Logged out.', 1),
(485, 15, '0', 'seej', '1514341616', 'Logged in.', 1),
(486, 15, '0', 'seej', '1514343398', 'Logged out.', 1),
(487, 12, '2', 'vvcalimlim', '1514343406', 'Logged in.', 1),
(488, 12, '2', 'vvcalimlim', '1514343520', 'Logged out.', 1),
(489, 15, '0', 'seej', '1514343527', 'Logged in.', 1),
(490, 15, '0', 'seej', '1514345526', 'Logged out.', 1),
(491, 14, '1', 'vavethe@hotmail.com', '1514345848', 'Logged in.', 1),
(492, 14, '1', 'vavethe@hotmail.com', '1514345884', 'Logged out.', 1),
(493, 15, '0', 'seej', '1514345924', 'Logged in.', 1),
(494, 15, '0', 'seej', '1514345969', 'Logged out.', 1),
(495, 12, '2', 'veocalimlim1@yahoo.com', '1514345986', 'Logged in.', 1),
(496, 12, '2', 'veocalimlim1@yahoo.com', '1514345996', 'Logged out.', 1),
(497, 14, '1', 'vavethe@hotmail.com', '1514346012', 'Logged in.', 1),
(498, 14, '1', 'vavethe@hotmail.com', '1514346202', 'Logged out.', 1),
(499, 15, '0', 'seej', '1514346207', 'Logged in.', 1),
(500, 15, '0', 'seej', '1514346388', 'Logged out.', 1),
(501, 11, '1', 'veocalimlim', '1514346430', 'Logged in.', 1),
(502, 11, '1', 'veocalimlim', '1514346478', 'Logged out.', 1),
(503, 15, '0', 'seej', '1514346484', 'Logged in.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `log_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=504;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
