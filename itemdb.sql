-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2017 at 03:39 AM
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
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
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

INSERT INTO `accounts` (`user_id`, `firstname`, `lastname`, `username`, `password`, `status`, `access_level`, `registered_at`, `email`, `image`, `verification_code`, `is_verified`) VALUES
(11, 'Veo', 'Calimlim', 'veocalimlim', '5fa0328a573f93df69b06a5f55ccf5ef0523e8aa', 1, 1, 1511079552, 'veocalimlim@gmail.com', '18195045_1455663144456723_8646497117616610019_n4.jpg', '2ZXGNjCedk', 1),
(12, 'Oteng', 'Beyo', 'vvcalimlim', '4be30d9814c6d4e9800e0d2ea9ec9fb00efa887b', 1, 2, 1511318551, 'veocalimlim@yahoo.com', '94fda43ae9a9ccdb33bc42dda413e032.png', 'NRVhbl2zuO', 1),
(13, 'William', 'Suarez', 'William', 'ac8c1966e853449ac181e21d7bf3462092813c05', 1, 1, 1511351673, 'vv.victory315@gmail.com', 'f3ebd1ab5cd39c93fd66ecb966a239e8.JPG', 'jWhVSuQq94', 0),
(14, 'William', 'Suarez', 'suarez', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 2, 1511351800, 'vavethe@hotmail.com', '52f6e78dcb0c39ac910ed31f94f3ff52.JPG', '8nG5tqKpd6', 0),
(15, 'Chris John', 'Agarap', 'seej', '086a5f64597c1f510641b304a9f85a622754f8d1', 1, 0, 515685, 'chrisjohn.seej@gmail.com', 'Seej.jpg', 'ga1E3e21', 1);

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
  `product_id` int(11) NOT NULL,
  `product_category` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_desc` varchar(250) NOT NULL,
  `product_price` varchar(30) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_image` varchar(250) NOT NULL,
  `added_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_category`, `product_name`, `product_desc`, `product_price`, `product_quantity`, `product_image`, `added_at`, `updated_at`, `status`) VALUES
(47, 'Chargers', 'Asus Laptop Charger 19V', '100% compatibility', '1850', 4, 'dfc40568ef70a98e539f2651060139f5.jpg', 1511337409, 0, 1),
(49, 'Chargers', 'Universal Charger', 'One charger for more than 300 different batteries.', '499', 15, '821279748f6074f8f8700713ecfa93be.jpg', 1511338251, 0, 1),
(50, 'Chargers', 'Samsung Convoy U640 Cell Phone Charger', 'Samsung Convoy U640 Cell Phone Charger', '200', 10, 'bd0c67026e0747f475c84f7300c0006c.jpg', 1511338462, 0, 1),
(51, 'Chargers', 'ASUS Charger for Zenfone2/T100CHI', 'ASUS Charger for Zenfone2/T100CHI', '499', 10, '96d35782e7e77cb6049c6d76bbec8d92.jpg', 1511338515, 0, 1),
(52, 'Chargers', 'Cell Phone Home / Travel Charger for SamsungGravity 3', 'Cell Phone Home / Travel Charger for SamsungGravity 3', '199', 10, '8f229ce2b3dde9de546182a54510fa64.jpg', 1511338720, 0, 1),
(53, 'Chargers', 'ChargeAll-Universal-Cell-Phone-Charger', 'ChargeAll-Universal-Cell-Phone-Charger', '699', 10, '45aff2a3f07300799486bf4e9b7ea5ab.jpg', 1511338763, 0, 1),
(54, 'Chargers', 'Motorola Motorola SPN5185B Cell Phone Travel Charger', 'Motorola Motorola SPN5185B Cell Phone Travel Charger', '549', 12, '2fc71deba5a8b219654835a705ef721c.jpg', 1511338829, 0, 1),
(55, 'Chargers', 'Apple 85W MagSafe 2 Power Adapter for MacBook Pro', 'Apple 85W MagSafe 2 Power Adapter for MacBook Pro', '3000', 12, '2c853259a245dc3a3a64ed3c4d752cf9.jpg', 1511338901, 0, 1),
(56, 'Chargers', 'Genuine Apple A1399 USB Mains Wall Charger Adaptor', 'Genuine Apple A1399 USB Mains Wall Charger Adaptor', '999', 10, 'c9ef545cec84595dbd79f8c1a87975fa.jpg', 1511338975, 0, 1),
(57, 'Chargers', 'Genuine Apple Macbook Charger 60W Magsafe Power Adapter', 'Genuine Apple Macbook Charger 60W Magsafe Power Adapter', '2999', 10, '989e81edc29e8c15b53f31c6c64145d0.jpg', 1511339012, 0, 1),
(58, 'Laptop', 'HP Laptop - 15z touch optional', 'Windows 10 Home 64\r\nAMD Dual-Core A9 APU\r\n8 GB memory; 1 TB HDD storage\r\nAMD Radeon™ R5 Graphics\r\n15.6" diagonal HD display', '30999', 5, 'cafba17f3f8c2f5d5893a1f8cd76cb9e.png', 1511339385, 0, 1),
(59, 'Laptop', 'Lenovo - 15.6" Laptop - AMD A6-Series - 4GB Memory - 500GB Hard', 'Lenovo - 15.6" Laptop - AMD A6-Series - 4GB Memory - 500GB Hard', '15999', 3, 'd9912a8df6951210e4f05abca3653c36.jpg', 1511339440, 0, 1),
(60, 'Laptop', 'HP 15 Core i3 6th Gen - (4 GB/1 TB HDD/Windows', 'HP 15 Core i3 6th Gen - 4 GB/1 TB HDD/Windows', '29999', 9, '17c118b2176d632dc2f04816be19963c.jpg', 1511339579, 0, 1),
(61, 'Laptop', 'HP Spectre x360 Laptop - 15" Touch', 'HP Spectre x360 Laptop - 15" Touch', '45999', 5, '1fe9f067fc3ac5688d11efde48505220.png', 1511339618, 0, 1),
(62, 'Laptop', 'Acer Aspire F 15" Touchscreen Laptop', 'Acer Aspire F 15" Touchscreen Laptop - Silver (Intel Core i5-7200U/1 TB HDD/ 12 GB RAM/ Windows 10) ', '15999', 5, '5215ee78b85c7955468e764d688c49eb.jpg', 1511339908, 0, 1),
(63, 'Laptop', 'ASUS Laptop X556UQ-NH71 Intel Core i7 7th Gen 7500U (2.70 GHz) ', 'ASUS Laptop X556UQ-NH71 Intel Core i7 7th Gen 7500U (2.70 GHz) ', '59999', 5, '02b9bc41bd0b7ba1778a54741126d226.jpg', 1511339965, 0, 1),
(64, 'Laptop', 'HP Stream 11.6" Celeron Laptop', 'HP Stream 11.6" Celeron Laptop', '13999', 4, '1932e7669c5fa71154426c080995d8de.jpg', 1511340053, 0, 1),
(65, 'Laptop', 'ACER ASPIRE ES1 332 BLACK', 'ACER ASPIRE ES1 332 BLACK', '24999', 5, '492c10069bacef7ee0b99ace91475fef.jpg', 1511340098, 0, 1),
(66, 'Laptop', 'Razer Blade 14 RZ09 Gaming Laptop', 'Razer Blade 14 RZ09 Gaming Laptop', '49999', 5, '0fa986baf6ab3c08f2f2da8c2590028c.jpg', 1511340190, 0, 1),
(67, 'Laptop', 'HP OMEN Gaming Laptop - 15"', 'HP OMEN Gaming Laptop - 15"', '69999', 5, '4bb0ab017e66c27d3cfe4c8af67a5c72.png', 1511340232, 0, 1),
(68, 'Accesories', 'Handy Grip Phone Strap', 'Handy Grip Phone Strap', '79', 1, '88a8fb3a3ebc5cfae89188b7ba2a0f13.jpg', 1511340458, 0, 1),
(70, 'Accesories', 'Wallet Card Holder Monogram', 'Wallet Card Holder Monogram', '149', 10, 'ab837e89c16fa65676a1c64dc3f4f2e6.jpg', 1511340559, 0, 1),
(71, 'Accesories', 'Cellphone Handy Tripod', 'Cellphone Handy Tripod', '699', 12, 'c88ed7275001601a42f182caf777a6f2.jpg', 1511340654, 0, 1),
(72, 'Accesories', 'Pop Socket', 'Pop Socket', '159', 5, '883a61eb5f1906380d501e61473f4a0c.jpg', 1511340697, 0, 1),
(73, 'Accesories', 'iPhone X Silicone Case ', 'iPhone X Silicone Case ', '499', 4, '086d5a48093979b6ff3d21a50e2d7593.png', 1511340732, 0, 1),
(74, 'Accesories', 'Selfie Stick', 'Selfie Stick', '149', 5, 'ea5efca5f2e91f7f2aa921d59e9ffcce.jpg', 1511340828, 0, 1),
(75, 'Accesories', 'Zilu CM001 Universal Car Phone Mount', 'Zilu CM001 Universal Car Phone Mount', '599', 5, 'cfee9f7173ba79d7d1bc23fe3b58017b.jpg', 1511340882, 0, 1),
(76, 'Accesories', 'Pokémon Folio Wallet iPhone 6 Case', 'Pokémon Folio Wallet iPhone 6 Case', '799', 5, '8c661bafef43556e6952691b9d109071.jpg', 1511340938, 0, 1),
(77, 'Accesories', 'Cell Phone Pocket Protectors', 'Cell Phone Pocket Protectors', '199', 5, '52d7a71cb950f6bac673ae057a6cf424.png', 1511341033, 0, 1),
(78, 'Accesories', 'Sports Armband for iPhone', 'Sports Armband for iPhone', '499', 5, 'c9b7c9536c6dd768fdde46a73039a666.jpg', 1511341087, 0, 1),
(79, 'Cellphone', 'iPhone 6 Plus 16GB', ' iPhone 6 Plus 16GB', '15999', 5, 'fbce06289bd19e1b0e3d6ed0cc6ee248.jpg', 1511341183, 0, 1),
(80, 'Featured', 'Samsung Note 7', 'The best and the new cellphone of samsung', '31231', 3, 'eb346adde4dece62a944a2406654ec32.jpg', 1511088860, 0, 1),
(81, 'Featured', 'HP Laptop - 15z touch optional', 'Windows 10 Home 64\r\nAMD Dual-Core A9 APU\r\n8 GB memory; 1 TB HDD storage\r\nAMD Radeon™ R5 Graphics\r\n15.6" diagonal HD display', '30999', 5, 'cafba17f3f8c2f5d5893a1f8cd76cb9e.png', 1511339385, 0, 1),
(82, 'Featured', 'HP Stream 11.6" Celeron Laptop', 'HP Stream 11.6" Celeron Laptop', '13999', 4, '1932e7669c5fa71154426c080995d8de.jpg', 1511340053, 0, 1),
(83, 'Featured', 'HP OMEN Gaming Laptop - 15"', 'HP OMEN Gaming Laptop - 15"', '69999', 5, '4bb0ab017e66c27d3cfe4c8af67a5c72.png', 1511340232, 0, 1),
(87, 'Chargers', 'Hoffco Celltronix Braided Heavy Duty Cell Phone Charging Cable', 'Hoffco Celltronix Braided Heavy Duty Cell Phone Charging Cable', '499', 5, '22a6e075f4e9b714efc7be7928e535b1.jpg', 1511345145, 0, 1),
(88, 'Chargers', 'Voltaic Amp Portable Solar Charger', 'Voltaic Amp Portable Solar Charger', '1299', 12, '5f0971d9aafb7a41013e748c6032cecb.jpg', 1511345207, 0, 1),
(89, 'Accesories', 'Silicone Phone Wallet Stand', 'Silicone Phone Wallet Stand', '79', 15, '4f808fb4b783d79eac2271a1ce5348b5.jpg', 1511345309, 0, 1),
(90, 'Accesories', 'Dual Layer Armor Defender Shockproof Protective Hard Case With Stand', 'Dual Layer Armor Defender Shockproof Protective Hard Case With Stand', '1199', 10, '903e1ed48fc87d7bdd11aff089509f54.jpg', 1511345438, 0, 1),
(92, 'Cellphone', 'LG V30 LTE Advanced', 'LG V30 LTE Advanced', '4999', 10, '42aad9ec180e618923171a985d5b5177.jpg', 1511346154, 0, 1),
(93, 'Cellphone', 'LG Leon 4G LTE H345', ' LG Leon 4G LTE H345', '4999', 5, 'fde3bff74cebc1fe33d8a0e516e2586b.jpg', 1511346297, 0, 1),
(94, 'Cellphone', 'Samsung Galaxy J7 J700M, 16GB, Dual SIM LTE, Factory Unlocked', 'Samsung Galaxy J7 J700M, 16GB, Dual SIM LTE, Factory Unlocked', '11499', 5, '10bcc2a89c4e2aa6536f90fc3e5aedaf.jpg', 1511346363, 0, 1),
(95, 'Cellphone', 'Galaxy Grand Prime ', 'Galaxy Grand Prime ', '7999', 6, '48f7d179581079ee7ec300385084c2eb.jpg', 1511346424, 0, 1),
(96, 'Cellphone', 'Samsung Galaxy Ace Dual-Sim', 'Samsung Galaxy Ace Dual-Sim', '3999', 6, 'a31284150fd78bf54d0e2271c0bcbd4c.jpg', 1511346484, 0, 1),
(97, 'Cellphone', 'HUAWEI Mate 9 Pro', 'HUAWEI Mate 9 Pro', '9999', 6, '8422e08ca4e8734225cc74944e336fb6.png', 1511346541, 0, 1),
(98, 'Cellphone', 'HUAWEI P9', 'HUAWEI P9', '8999', 7, 'aa2d913eb289ed760f717a43cb6dea2b.png', 1511346604, 0, 1),
(99, 'Cellphone', 'OPPO R9s', 'OPPO R9s', '8999', 10, '74e7fd054fe240537da1d0f7ac691a04.png', 1511346675, 0, 1),
(100, 'Cellphone', 'OPPO R9s Plus- Rose Gold', 'OPPO R9s Plus- Rose Gold', '10999', 6, 'e49eebe691b84d8891a3b3aebd1e7e4e.jpg', 1511346845, 0, 1),
(101, 'Laptop', 'Lenovo IdeaPad 300 Series', 'Lenovo IdeaPad 300 Series', '45000', 5, 'a93946af27682fa2065a4de782d4c23f.png', 1511346942, 0, 1),
(102, 'Laptop', 'HP Flyer Red 15.6" 15-f272wm Laptop PC', 'HP Flyer Red 15.6" 15-f272wm Laptop PC', '45555', 5, '045cc8f73811d9393cfb3448643e7235.jpg', 1511347083, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `trans_id` int(11) NOT NULL,
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

INSERT INTO `user_log` (`trans_id`, `user_id`, `user_type`, `username`, `date`, `action`, `status`) VALUES
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
(168, 11, '1', 'veocalimlim', '1513477038', 'veocalimlim just logged in.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

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
  ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
