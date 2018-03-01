-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2018 at 12:12 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Databus.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `Best_deal`
--

CREATE TABLE `Best_deal` (
  `Best_deal_id` char(20) NOT NULL,
  `Page_id` char(20) NOT NULL,
  `type` char(20) NOT NULL,
  `space_name` char(30) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Cards`
--

CREATE TABLE `Cards` (
  `Cards_id` char(20) NOT NULL,
  `card_num` int(11) NOT NULL,
  `expire_date` date NOT NULL,
  `cvv` int(11) NOT NULL,
  `Tenant_id` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `Category_id` char(20) NOT NULL,
  `category_name` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Pages`
--

CREATE TABLE `Pages` (
  `Page_id` char(20) NOT NULL,
  `Vender_id` char(20) NOT NULL,
  `Space_id` char(20) NOT NULL,
  `Description` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `picture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Regular`
--

CREATE TABLE `Regular` (
  `Regular_id` char(20) NOT NULL,
  `Tewards_id` char(20) NOT NULL,
  `Tenant_addr_id` char(20) NOT NULL,
  `points` int(11) NOT NULL,
  `email` char(20) NOT NULL,
  `password` char(60) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `user_name` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Review`
--

CREATE TABLE `Review` (
  `Review_id` char(20) NOT NULL,
  `postdate` date NOT NULL,
  `username` char(10) NOT NULL,
  `content` text NOT NULL,
  `rating` int(11) NOT NULL,
  `Space_id` char(20) NOT NULL,
  `Regular_id` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Review for each database';

-- --------------------------------------------------------

--
-- Table structure for table `Rewards`
--

CREATE TABLE `Rewards` (
  `Rewards_id` char(20) NOT NULL,
  `type` char(20) NOT NULL,
  `discount` char(60) NOT NULL,
  `expire_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `start_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Regular_id` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Space`
--

CREATE TABLE `Space` (
  `Space_id` char(20) NOT NULL,
  `Vender_id` char(20) NOT NULL,
  `Space_addr_id` char(20) NOT NULL,
  `Term_id` char(20) NOT NULL,
  `Page_id` char(20) NOT NULL,
  `Sub_category_id` char(20) NOT NULL,
  `price` int(11) NOT NULL,
  `resv_start_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `resv_end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `service` char(60) NOT NULL,
  `space_name` char(30) NOT NULL,
  `Regular_id` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Space_addr`
--

CREATE TABLE `Space_addr` (
  `Space_addr_id` char(20) NOT NULL,
  `Space_id` char(20) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `state` char(20) NOT NULL,
  `street` char(60) NOT NULL,
  `floor` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `company` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Sub_category`
--

CREATE TABLE `Sub_category` (
  `Sub_category_id` char(20) NOT NULL,
  `Category_id` char(20) NOT NULL,
  `size` int(11) NOT NULL,
  `sub_space_name` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Terms`
--

CREATE TABLE `Terms` (
  `Term_id` char(20) NOT NULL,
  `Space_id` char(20) NOT NULL,
  `end_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `start_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Transaction`
--

CREATE TABLE `Transaction` (
  `Trans_id` char(20) NOT NULL,
  `Regular_id` char(20) NOT NULL,
  `Space_id` char(20) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Order details';

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `User_id` char(20) NOT NULL,
  `email` char(60) NOT NULL,
  `user_name` char(20) NOT NULL,
  `password` char(30) NOT NULL,
  `phone_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `User_addr`
--

CREATE TABLE `User_addr` (
  `User_addr_id` char(20) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `street` char(60) NOT NULL,
  `apt` char(20) NOT NULL,
  `state` char(10) NOT NULL,
  `Regular_id` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Vender`
--

CREATE TABLE `Vender` (
  `Vender_id` char(20) NOT NULL,
  `company` char(200) NOT NULL,
  `deposit` double NOT NULL,
  `email` char(60) NOT NULL,
  `user_name` char(20) NOT NULL,
  `password` char(30) NOT NULL,
  `phone_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Best_deal`
--
ALTER TABLE `Best_deal`
  ADD PRIMARY KEY (`Best_deal_id`),
  ADD KEY `Page_id` (`Page_id`);

--
-- Indexes for table `Cards`
--
ALTER TABLE `Cards`
  ADD PRIMARY KEY (`Cards_id`),
  ADD KEY `Tenant_id` (`Tenant_id`);

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `Pages`
--
ALTER TABLE `Pages`
  ADD PRIMARY KEY (`Page_id`),
  ADD KEY `Vender_id` (`Vender_id`),
  ADD KEY `Space_id` (`Space_id`);

--
-- Indexes for table `Regular`
--
ALTER TABLE `Regular`
  ADD PRIMARY KEY (`Regular_id`);

--
-- Indexes for table `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`Review_id`),
  ADD KEY `Space_id` (`Space_id`),
  ADD KEY `Regular_id` (`Regular_id`);

--
-- Indexes for table `Rewards`
--
ALTER TABLE `Rewards`
  ADD PRIMARY KEY (`Rewards_id`),
  ADD KEY `Regular_id` (`Regular_id`);

--
-- Indexes for table `Space`
--
ALTER TABLE `Space`
  ADD PRIMARY KEY (`Space_id`),
  ADD KEY `Vender_id` (`Vender_id`),
  ADD KEY `Space_addr_id` (`Space_addr_id`),
  ADD KEY `Term_id` (`Term_id`),
  ADD KEY `Page_id` (`Page_id`),
  ADD KEY `Regular_id` (`Regular_id`),
  ADD KEY `Sub_category_id` (`Sub_category_id`);

--
-- Indexes for table `Space_addr`
--
ALTER TABLE `Space_addr`
  ADD PRIMARY KEY (`Space_addr_id`),
  ADD KEY `Space_id` (`Space_id`);

--
-- Indexes for table `Sub_category`
--
ALTER TABLE `Sub_category`
  ADD PRIMARY KEY (`Sub_category_id`),
  ADD KEY `Category_id` (`Category_id`);

--
-- Indexes for table `Terms`
--
ALTER TABLE `Terms`
  ADD PRIMARY KEY (`Term_id`),
  ADD KEY `Space_id` (`Space_id`);

--
-- Indexes for table `Transaction`
--
ALTER TABLE `Transaction`
  ADD PRIMARY KEY (`Trans_id`),
  ADD KEY `Regular_id` (`Regular_id`),
  ADD KEY `Space_id` (`Space_id`);

--
-- Indexes for table `User_addr`
--
ALTER TABLE `User_addr`
  ADD KEY `Regular_id` (`Regular_id`);

--
-- Indexes for table `Vender`
--
ALTER TABLE `Vender`
  ADD PRIMARY KEY (`Vender_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Best_deal`
--
ALTER TABLE `Best_deal`
  ADD CONSTRAINT `contains` FOREIGN KEY (`Page_id`) REFERENCES `Pages` (`Page_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Cards`
--
ALTER TABLE `Cards`
  ADD CONSTRAINT `Ten_card_id` FOREIGN KEY (`Tenant_id`) REFERENCES `Regular` (`Regular_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Pages`
--
ALTER TABLE `Pages`
  ADD CONSTRAINT `gives_vendor` FOREIGN KEY (`Vender_id`) REFERENCES `Vender` (`Vender_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `links` FOREIGN KEY (`Space_id`) REFERENCES `Space` (`Space_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Review`
--
ALTER TABLE `Review`
  ADD CONSTRAINT `regular_write` FOREIGN KEY (`Regular_id`) REFERENCES `Regular` (`Regular_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `space_write` FOREIGN KEY (`Space_id`) REFERENCES `Space` (`Space_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Rewards`
--
ALTER TABLE `Rewards`
  ADD CONSTRAINT `Rewards_ibfk_1` FOREIGN KEY (`Regular_id`) REFERENCES `Regular` (`Regular_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Space`
--
ALTER TABLE `Space`
  ADD CONSTRAINT `is_in_category` FOREIGN KEY (`Sub_category_id`) REFERENCES `Sub_category` (`Sub_category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `space_by_vendor` FOREIGN KEY (`Vender_id`) REFERENCES `Vender` (`Vender_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `space_linkedby_pages` FOREIGN KEY (`Page_id`) REFERENCES `Pages` (`Page_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `space_reserve_regular` FOREIGN KEY (`Regular_id`) REFERENCES `Regular` (`Regular_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Space_addr`
--
ALTER TABLE `Space_addr`
  ADD CONSTRAINT `located_in` FOREIGN KEY (`Space_id`) REFERENCES `Space` (`Space_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Sub_category`
--
ALTER TABLE `Sub_category`
  ADD CONSTRAINT `belongs_to` FOREIGN KEY (`Category_id`) REFERENCES `Category` (`Category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Terms`
--
ALTER TABLE `Terms`
  ADD CONSTRAINT `avaliable` FOREIGN KEY (`Space_id`) REFERENCES `Space` (`Space_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Transaction`
--
ALTER TABLE `Transaction`
  ADD CONSTRAINT `reserve_tran_reg` FOREIGN KEY (`Regular_id`) REFERENCES `Regular` (`Regular_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rev_space` FOREIGN KEY (`Space_id`) REFERENCES `Space` (`Space_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `update_tran_reg` FOREIGN KEY (`Regular_id`) REFERENCES `Regular` (`Regular_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `User_addr`
--
ALTER TABLE `User_addr`
  ADD CONSTRAINT `addr_reg_id` FOREIGN KEY (`Regular_id`) REFERENCES `Regular` (`Regular_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
