-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 26, 2018 at 01:50 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

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
-- Table structure for table `bid_detail`
--

CREATE TABLE `bid_detail` (
  `B_id` char(20) NOT NULL,
  `U_id` char(20) NOT NULL,
  `S_id` char(20) NOT NULL,
  `price` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `C_id` char(20) NOT NULL,
  `U_id` char(20) NOT NULL,
  `card_num` int(11) NOT NULL,
  `expire_date` date NOT NULL,
  `cvv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Description`
--

CREATE TABLE `Description` (
  `P_id` char(20) NOT NULL,
  `V_id` char(20) NOT NULL,
  `Description` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `picture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `O_id` char(20) NOT NULL,
  `S_id` char(20) NOT NULL,
  `V_id` char(20) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Order details';

-- --------------------------------------------------------

--
-- Table structure for table `Review`
--

CREATE TABLE `Review` (
  `R_id` char(20) NOT NULL,
  `P_id` char(20) NOT NULL,
  `U_id` char(20) NOT NULL,
  `postdate` date NOT NULL,
  `username` char(10) NOT NULL,
  `content` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Review for each database';

-- --------------------------------------------------------

--
-- Table structure for table `Space`
--

CREATE TABLE `Space` (
  `S_id` char(20) NOT NULL,
  `U_id` char(20) NOT NULL,
  `V_id` char(20) NOT NULL,
  `location` char(200) NOT NULL,
  `price` int(11) NOT NULL,
  `bid_start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bid_end_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resv_start_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `resv_end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Terms`
--

CREATE TABLE `Terms` (
  `T_id` char(20) NOT NULL,
  `S_id` char(20) NOT NULL,
  `end_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `start_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `U_id` char(20) NOT NULL,
  `email` char(60) NOT NULL,
  `user_name` char(20) NOT NULL,
  `password` char(30) NOT NULL,
  `address` char(100) NOT NULL,
  `royal_points` int(11) NOT NULL,
  `phone_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Vender`
--

CREATE TABLE `Vender` (
  `V_id` char(20) NOT NULL,
  `U_id` char(20) NOT NULL,
  `company` char(200) NOT NULL,
  `deposit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bid_detail`
--
ALTER TABLE `bid_detail`
  ADD PRIMARY KEY (`B_id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`C_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`O_id`);

--
-- Indexes for table `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`R_id`);

--
-- Indexes for table `Space`
--
ALTER TABLE `Space`
  ADD PRIMARY KEY (`S_id`);

--
-- Indexes for table `Terms`
--
ALTER TABLE `Terms`
  ADD PRIMARY KEY (`T_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`U_id`);

--
-- Indexes for table `Vender`
--
ALTER TABLE `Vender`
  ADD PRIMARY KEY (`V_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
