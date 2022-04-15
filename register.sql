-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 14, 2013 at 10:22 AM
-- Server version: 5.6.20-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `unit` varchar(3) NOT NULL,
  `addon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `p_id`, `price`, `qty`, `unit`, `addon`) VALUES
(5, 2, 11, 750, 15, 'KG', '2021-09-16 14:43:25'),
(3, 2, 10, 20, 2, 'KG', '2021-09-16 14:09:28');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`c_id` int(65) NOT NULL,
  `category` varchar(20) NOT NULL,
  `detail` varchar(78) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `addon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `category`, `detail`, `status`, `addon`) VALUES
(3, 'grain', 'grain are good for health', 1, '2021-09-16 11:08:41'),
(4, 'vegitabels', 'fresh vegitabels', 1, '2021-09-16 11:09:10'),
(5, 'fruits', 'fresh fruits', 1, '2021-09-16 11:09:49'),
(6, 'seed', 'seeds ', 0, '2021-09-16 11:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
`id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `feedback` varchar(15) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `feedback`) VALUES
(2, 2, 'good'),
(3, 2, 'good');

-- --------------------------------------------------------

--
-- Table structure for table `order_data`
--

CREATE TABLE IF NOT EXISTS `order_data` (
`id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `mobile` int(12) NOT NULL,
  `address` varchar(30) NOT NULL,
  `total_price` int(10) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `order_status` int(5) NOT NULL,
  `addon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `order_data`
--

INSERT INTO `order_data` (`id`, `user_id`, `mobile`, `address`, `total_price`, `payment`, `order_status`, `addon`) VALUES
(2, 2, 5545, 'sa', 510, 'pending', 0, '2021-09-16 12:49:05'),
(3, 4, 983927387, 'patel  chock', 348, 'pending', 1, '2021-09-16 16:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
`id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `p_id`, `price`) VALUES
(1, 2, 10, 10),
(2, 2, 11, 500),
(3, 3, 25, 200),
(4, 3, 16, 148);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `product` varchar(15) NOT NULL,
  `p_detail` varchar(15) NOT NULL,
  `image` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `addon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `product`, `p_detail`, `image`, `price`, `status`, `addon`) VALUES
(10, 4, 'poteto', 'dsz', '--500x500.jpeg', 10, 1, '2021-09-16 11:39:00'),
(11, 5, 'apple', 'sza', 'apple-500x500.jpg', 50, 1, '2021-09-16 11:39:36'),
(16, 3, 'zeera', 'df', 'LOOSE JEERA 1 kg-550x550.jpg', 295, 1, '2021-09-16 15:46:01'),
(17, 3, 'corn', 'sfesw', '41F62-VbHSL.jpg', 160, 1, '2021-09-17 12:13:16'),
(21, 3, 'Millet', 'ds', 'Sajje_DSC5025-500x350.jpg', 80, 1, '2021-09-17 12:24:24'),
(23, 5, 'guava', 'dscds', 'guava-500x500.jpg', 60, 1, '2021-09-18 10:49:30'),
(24, 5, 'Pomegranate', 'dfvs', 'red-pomegrenate-250x250.jpg', 65, 1, '2021-09-18 10:52:22'),
(26, 5, 'banana', 'dfsr', 'b.jpg', 34, 1, '2021-09-18 10:55:23'),
(27, 5, 'Whatermelon', 'dcs', 'w.jpg', 15, 1, '2021-09-18 10:58:15'),
(28, 5, 'chikoo', 'dss', 'fresh-chikoo-500x500.jpg', 50, 1, '2021-09-18 11:01:13'),
(30, 4, 'tomato', 'des', 't.jpg', 16, 1, '2021-09-18 11:04:23'),
(36, 4, 'Capsicum', 'd', 'cap.jpg', 40, 1, '2021-09-18 11:13:51'),
(37, 4, 'cabbage ', 'sd', 'cabbage-500x500.jpg', 140, 1, '2021-09-18 11:15:53'),
(40, 4, 'onion', 'fdd', 'red-onion-500x500.jpg', 30, 1, '2021-09-18 11:19:29'),
(41, 4, 'Ginger', 'fdfd', '0000000633741.jpg', 110, 1, '2021-09-18 11:23:46'),
(46, 3, 'Moong', 's', 'mung-beans-500x500.jpg', 103, 1, '2021-09-18 11:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
`id` int(10) NOT NULL,
  `f_name` varchar(10) NOT NULL,
  `pw` varchar(6) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `utype` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `f_name`, `pw`, `email`, `status`, `utype`) VALUES
(2, 'raxa', 'raxa', 'raxa@gmail.com', 1, 0),
(3, 'admin', 'admin', 'admin@gmail.com', 1, 1),
(4, 'darshna', 'darshn', 'darshna@gmail', 1, 0),
(5, 'user', 'user', 'user@gmail.com', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_data`
--
ALTER TABLE `order_data`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
 ADD PRIMARY KEY (`id`), ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`), ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `c_id` int(65) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_data`
--
ALTER TABLE `order_data`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
ADD CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `order_data` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
ADD CONSTRAINT `category` FOREIGN KEY (`category_id`) REFERENCES `category` (`c_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
