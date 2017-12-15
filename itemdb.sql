-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 04:34 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

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
(12, 'Oteng', 'Beyo', 'vvcalimlim', '4be30d9814c6d4e9800e0d2ea9ec9fb00efa887b', 1, 2, 1511318551, 'veocalimlim@yahoo.com', '94fda43ae9a9ccdb33bc42dda413e032.png', 'NRVhbl2zuO', 1);

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
  `product_desc` text NOT NULL,
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
(41, 'Cellphone', 'Test2', 'Dubi Dubi dap dap', '32322', 3, '78d39c09b00081982baabe3d1ad3633a.JPG', 1511088687, 0, 1),
(42, 'Cellphone', 'Test3', 'dsadsadsada', '31231', 3, 'eb346adde4dece62a944a2406654ec32.jpg', 1511088860, 0, 1),
(46, 'Featured', 'Laptop', 'lorem ipsum dolor', '12000', 4, '6c58c73ceb7d2e82259cb3aa836bbb2e.jpg', 1511321139, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `trans_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`trans_id`, `customer_id`, `user_type`, `username`, `date`, `action`, `status`) VALUES
(83, 11, '1', 'veocalimlim', '1511308371', 'veocalimlim just logged out.', 1),
(84, 11, '1', 'veocalimlim', '1511308442', 'veocalimlim just logged in.', 1),
(85, 11, '1', 'veocalimlim', '1511317037', 'veocalimlim just logged out.', 1),
(86, 12, '2', 'vvcalimlim', '1511318670', 'vvcalimlim just logged in.', 1),
(87, 11, '1', 'veocalimlim', '1511318909', 'veocalimlim just logged in.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`user_id`);

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
