-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2017 at 11:13 AM
-- Server version: 5.6.31
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tgcn`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'ASUS'),
(2, 'ACER'),
(3, 'DELL'),
(4, 'APPLE'),
(5, 'SAMSUNG'),
(6, 'SONY');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(9, 'Máy in'),
(10, 'Laptop'),
(11, 'Máy tính'),
(12, 'Điện thoại');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(4) NOT NULL,
  `amount` float NOT NULL,
  `price` float NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `id_transaction`, `id_product`, `qty`, `amount`, `price`, `status`) VALUES
(1, 1, 1, 1, 6290, 0, 0),
(2, 1, 2, 1, 6390, 0, 0),
(3, 1, 3, 1, 11290, 0, 0),
(4, 1, 3, 1, 11290, 0, 0),
(5, 1, 3, 1, 11290, 0, 0),
(6, 1, 2, 1, 6390, 0, 0),
(7, 1, 1, 1, 6290, 0, 0),
(8, 2147483647, 4, 2, 43980000, 21990000, 0),
(9, 2147483647, 5, 1, 20.49, 20.49, 0),
(10, 2147483647, 4, 1, 21990000, 21990000, 0),
(11, 2147483647, 5, 1, 20490000, 20490000, 0),
(12, 2147483647, 1, 3, 18870000, 6290000, 0),
(13, 2147483647, 4, 1, 21990000, 21990000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `inventory` int(11) NOT NULL,
  `sold` int(11) NOT NULL DEFAULT '0',
  `created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `cat_id`, `brand_id`, `image`, `inventory`, `sold`, `created`) VALUES
(1, 'Laptop Asus E402SA N3060/2GB/500GB/Win10/(WX251T)', '', 6290000, 9, 1, 'product1.png', 1, 0, '2017-08-01'),
(2, 'Laptop Acer Aspire ES1 432 C5J2 N3350/2GB/500GB/Win10/(NX.GFSSV.004)', '', 6390000, 10, 2, 'product2.png', 0, 0, '2017-08-25'),
(3, 'Laptop Dell Inspiron 3467 i3 7100U/4GB/1TB/Win10/(M20NR21)', '', 11290000, 10, 3, 'product3.png', 3, 100, '2017-08-09'),
(4, 'Điện thoại iPhone 7 Plus 32GB', '', 21990000, 12, 4, '170826080353.png', 0, 50, '2017-08-26'),
(5, 'Điện thoại Samsung Galaxy S8 Plus', '', 20490000, 12, 5, '170826081443.png', 0, 13, '2017-08-26');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `payment` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_info` text COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `trac_id` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `type`, `status`, `id_user`, `name`, `email`, `phone`, `address`, `amount`, `payment`, `payment_info`, `message`, `trac_id`, `created`) VALUES
(1, 0, 0, 3, 'toi', 'toi@gmail.com', '1234', '', 6290000, 'tiền mặt', '', 'gui hang cho toi vao ngay mai     ', 1, '2016-07-19'),
(2, 0, 0, 4, 'a', 'abc@gmail.com', '01674717919', '', 6390000, 'Tiền mặt', '', 'thanh toan khi nhan hang                            ', 2, '2016-07-21'),
(3, 0, 1, 3, 'toi', 'toi@gmail.com', '01674717919', '', 11290000, 'tiền mặt', '', 'abc                            ', 3, '2016-07-21'),
(4, 0, 0, 5, 'admini', 'Abc@gmail.com', '09215625400', '', 43980020, 'Tiền mặt', '', '', 2147483647, '2017-08-27'),
(5, 0, 0, 5, 'admini', 'Abc@gmail.com', '09215625400', '', 42480000, 'Tiền mặt', '', '', 2147483647, '2017-08-27'),
(6, 0, 0, 2, 'user', 'thien@gmail.com', '0993603225', 'Quận Thủ Đức, TP.HCM', 40860000, 'Tiền mặt', '', 'Giao trong giờ hành chính', 2147483647, '2017-08-28');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `pass`, `dname`, `phone`, `email`, `address`, `permission`) VALUES
(1, 'admin', 'admin321', 'Quản trị viên', '', '', '', 0),
(2, 'user', 'user', 'Người dùng', '', '', '', 1),
(3, 'toi', 'toi', 'toi', '1254', 'Toi@abc.vn', '', 0),
(4, 'a', 'b', 'a', '12', 'Abc@gmail.com', '', 1),
(5, 'admini', 'admini', 'admini', '09215625400', 'Abc@gmail.com', '', 1),
(8, 'administrator', 'admin', 'administrator', '', 'admin@gmail.com', '', 0),
(9, 'thien', 'thien', 'thien', '', 'thien@abc', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
