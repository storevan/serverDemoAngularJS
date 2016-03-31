-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2016 at 01:53 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hungnd_test`
--
CREATE DATABASE IF NOT EXISTS `hungnd_test` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `hungnd_test`;

-- --------------------------------------------------------

--
-- Table structure for table `cat_location`
--

CREATE TABLE `cat_location` (
  `location_id` int(10) NOT NULL,
  `location_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cat_location`
--

INSERT INTO `cat_location` (`location_id`, `location_name`, `parent_id`) VALUES
(31, 'Laos', NULL),
(32, 'England', NULL),
(33, 'Vieng Chan', 31),
(37, 'Viet Nam', NULL),
(39, 'Ha Noi', 37),
(48, 'Cam pu chia', NULL),
(49, 'Spain', NULL),
(50, 'TP Ho Chi Minh', 37),
(51, 'Da Nang', 37),
(52, 'Bac Giang', 37),
(53, 'Manchester United', 32);

-- --------------------------------------------------------

--
-- Table structure for table `sys_users`
--

CREATE TABLE `sys_users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(1) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_users`
--

INSERT INTO `sys_users` (`user_id`, `username`, `password`, `role`, `create_time`) VALUES
(10, 'hungnd', '	\n45c48cce2e2d7fbdea1afc51c7c6ad26\n', 1, '2016-03-24 22:03:14'),
(13, '3', 'ceea23519f6f86ad67e9f798bf8002cb', 1, '2016-03-23 21:27:24'),
(15, '12345', 'ceea23519f6f86ad67e9f798bf8002cb', 0, '2016-03-23 21:36:51'),
(16, '123456', 'ceea23519f6f86ad67e9f798bf8002cb', 0, '2016-03-23 21:27:37'),
(31, 'duyhungkhmt2@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, '2016-03-23 17:44:33'),
(32, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 1, '2016-03-24 22:12:21'),
(33, 'tranthiminhsg@gmail.com', 'ceea23519f6f86ad67e9f798bf8002cb', 0, '2016-03-23 21:20:44'),
(34, '1', 'ceea23519f6f86ad67e9f798bf8002cb', 0, '2016-03-24 21:07:33'),
(41, '9', 'ceea23519f6f86ad67e9f798bf8002cb', 0, '2016-03-24 21:59:10'),
(42, 'hungnd40', 'ceea23519f6f86ad67e9f798bf8002cb', 0, '2016-03-31 16:33:11'),
(43, '1234', 'ceea23519f6f86ad67e9f798bf8002cb', 0, '2016-03-31 16:33:26'),
(44, '2255', 'ceea23519f6f86ad67e9f798bf8002cb', 1, '2016-03-31 17:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_info_hungnd`
--

CREATE TABLE `user_info_hungnd` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `national` int(10) DEFAULT NULL,
  `province` int(10) DEFAULT NULL,
  `district` int(10) DEFAULT NULL,
  `home_address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8_unicode_ci,
  `website` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_info_hungnd`
--

INSERT INTO `user_info_hungnd` (`id`, `first_name`, `last_name`, `email`, `national`, `province`, `district`, `home_address`, `zip_code`, `about`, `website`, `facebook`, `twitter`, `other`) VALUES
(24, 'Nguyá»…n', 'HÆ°ng', 'duyhungkhmt2@gmail.com', 1, 3, 5, 'Tá»« LiÃªm', '10000', 'qweqw', 'tranthiminhsg@gmail.com', '12341', 'dfg12312', 'gdf'),
(32, 'Nguyá»…n', 'HÆ°ng', 'duyhungkhmt2@gmail.com', 1, 3, 6, 'Tá»« LiÃªm', '10000', 'khong viet linh tinh', 'khong viet linh tinh', 'khong viet linh tinh', 'khong viet linh tinh', 'khong viet linh tinh'),
(35, 'Nguyá»…n', 'HÆ°ng', 'duyhungkhmt2@gmail.com', 1, 3, 5, 'Tá»« LiÃªm', '10000', 'hungn', 'qew', 'hungn', 'fasjof', 'sdkfsd'),
(36, 'Tráº§n', 'Minh', 'tranthiminhsg@gmail.com', 1, 3, 5, 'HÃ  Ná»™i', '10000', 'hello', 'hello.com', 'hello', 'hello', 'hello'),
(40, 'Tráº§n', 'Minh', 'tranthiminhsg@gmail.com', 1, 3, 5, 'HÃ  Ná»™i', '10000', '342', '234', '234', '342', '342'),
(43, 'Nguyá»…n', 'HÆ°ng', 'duyhungkhmt2@gmail.com', 1, 3, 5, 'Tá»« LiÃªm', '10000', '123123', '23', '123', '@@@2342332', '@#!$!'),
(44, 'Nguyá»…n', 'HÆ°ng', 'duyhungkhmt2@gmail.com', 1, 3, 5, 'Tá»« LiÃªm', '10000', '123', '31', '3425', '5', '543'),
(45, 'Nguyá»…n', 'HÆ°ng', 'duyhungkhmt2@gmail.com', 1, 3, 5, 'Tá»« LiÃªm', '10000', 'fwer', 'werwer', 'we', 'wer', 'wer'),
(46, 'Nguyá»…n', 'HÆ°ng', 'duyhungkhmt2@gmail.com', 1, 3, 5, 'Tá»« LiÃªm', '324', '342', '234', '234', '234', '234'),
(47, 'Nguyá»…n', 'HÆ°ng', 'duyhungkhmt2@gmail.com', 1, 3, 5, 'Tá»« LiÃªm', '10000', '423', '23342', '342', '342', '34234'),
(48, 'Nguyá»…n', 'HÆ°ng', 'duyhungkhmt2@gmail.com', 1, 3, 5, 'Tá»« LiÃªm', '10000', '123123', '3423', '234', '324', '234'),
(49, 'Tráº§n', 'Minh', 'tranthiminhsg@gmail.com', 1, 3, 5, 'HÃ  Ná»™i', '10000', '213', '123', '123', '213', '123'),
(50, 'Nguyá»…n', 'HÆ°ng', 'duyhungkhmt2@gmail.com', 1, 3, 5, 'Tá»« LiÃªm', '10000', 'qweqw', '432', '234', '234', '234'),
(51, 'Nguyá»…n', 'HÆ°ng', 'duyhungkhmt2@gmail.com', 1, 3, 5, 'Tá»« LiÃªm', '10000', '123', '123', '213', '123231', '123'),
(52, 'Nguyá»…n', 'HÆ°ng', 'duyhungkhmt2@gmail.com', 1, 3, 5, 'Tá»« LiÃªm', '10000', '123', '312', '123', '312', '123');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `national` int(10) DEFAULT NULL,
  `province` int(10) DEFAULT NULL,
  `home_address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8_unicode_ci,
  `website` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`first_name`, `last_name`, `email`, `national`, `province`, `home_address`, `zip_code`, `about`, `website`, `facebook`, `twitter`, `other`, `user_id`) VALUES
('Trần', 'Minh', 'tranthiminhsg@gmail.com', 27, 36, 'Từ Liêm', '10000', 'home_address', 'home_address', 'home_address', '234', 'home_address', 0),
('Nguyễn', 'Hưng', 'duyhungkhmt2@gmail.com', 26, 0, 'Từ Liêm', '10000', 'home_address', 'home_address', 'home_address', '234', 'test', 1),
('Nguyen', 'Hung', 'duyhungkhmt2@gmail.com', 26, 29, 'Tu Liem', '10000', 'home_address', 'home_address', 'home_address', 'home_address', 'home_address', 10),
('NNN', 'HHH', 'duyhungkhmt2@gmail.com', 31, 33, 'Tá»« LiÃªm', '10000', 'home_address', 'home_address', 'home_address', '234', 'jfjfhjhgj', 13),
('VVV', 'BBB', 'duyhungkhmt2@gmail.com', 26, 30, 'TL', '10000', '132', '123', '132', '123', '123', 15),
('AAA', 'BBB', '123123', 26, 30, '342', '234', '34234', '234', '234', '23', '423', 16),
('Nguyễn', 'Hưng', 'duyhungkhmt2@gmail.com', 26, 29, 'Từ Liêm', '10000', 'home_address', 'home_address', 'home_address', '234', '234', 31),
('Nguyễn', 'Hưng', 'duyhungkhmt2@gmail.com', 26, 29, 'Từ Liêm', '10000', 'home_address', 'home_address', 'home_address', '234', 'test', 32),
('Trần', 'Minh', 'tranthiminhsg@gmail.com', 27, 36, 'Từ Liêm', '10000', 'SS', 'SS', 'SS', 'SS', 'SS', 33),
('Trần', 'Minh', 'tranthiminhsg@gmail.com', 26, 29, 'Hà Nội', '10000', 'home_address', 'home_address', 'home_address', '234', '234', 34),
('Trần', 'Minh', 'tranthiminhsg@gmail.com', 26, 29, 'Tu Liem', '10000', 'home_address', '234234', '423234', '23434', '234', 41),
('hungnd40', 'hungnd40', 'hungnd40', 37, 39, 'hungnd40', 'hungnd40', 'hungnd40', 'hungnd40', 'hungnd40', 'hungnd40', 'hungnd40', 42),
('13344', '13344', '13344', 32, 53, '13344', '13344', '13344', '13344', '13344', '13344', '13344', 43),
('abc', 'abc', 'abc', 37, 52, 'abc', 'abc', 'abc', 'abc', 'abc', 'abc', 'abc', 44);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat_location`
--
ALTER TABLE `cat_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `sys_users`
--
ALTER TABLE `sys_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_info_hungnd`
--
ALTER TABLE `user_info_hungnd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat_location`
--
ALTER TABLE `cat_location`
  MODIFY `location_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `sys_users`
--
ALTER TABLE `sys_users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `user_info_hungnd`
--
ALTER TABLE `user_info_hungnd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
