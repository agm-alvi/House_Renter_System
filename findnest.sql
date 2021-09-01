-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2021 at 01:54 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findnest`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `comments` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `creators`
--

CREATE TABLE `creators` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `nsu_id` int(20) NOT NULL,
  `position` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `fID` int(5) NOT NULL,
  `hID` int(5) NOT NULL,
  `rID` int(5) NOT NULL,
  `comments` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `houselist`
--

CREATE TABLE `houselist` (
  `houseID` int(5) NOT NULL,
  `houseType` varchar(20) NOT NULL,
  `houseDetails` varchar(20) NOT NULL,
  `house_no` varchar(10) NOT NULL,
  `street_no` varchar(10) NOT NULL,
  `area` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `garage` tinyint(5) NOT NULL,
  `bachelors` tinyint(5) NOT NULL,
  `lift` tinyint(5) NOT NULL,
  `security` tinyint(5) NOT NULL,
  `genderAllowance` tinyint(5) NOT NULL,
  `vID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `renters`
--

CREATE TABLE `renters` (
  `renterID` int(5) NOT NULL,
  `username` varchar(10) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `location` varchar(20) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `booked` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendorID` int(5) NOT NULL,
  `username` varchar(10) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `location` varchar(20) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `houseListed` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creators`
--
ALTER TABLE `creators`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`fID`),
  ADD UNIQUE KEY `fID` (`fID`);

--
-- Indexes for table `houselist`
--
ALTER TABLE `houselist`
  ADD PRIMARY KEY (`houseID`),
  ADD UNIQUE KEY `hid` (`houseID`);

--
-- Indexes for table `renters`
--
ALTER TABLE `renters`
  ADD PRIMARY KEY (`renterID`),
  ADD UNIQUE KEY `rid` (`renterID`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendorID`),
  ADD UNIQUE KEY `vid` (`vendorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `fID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `houselist`
--
ALTER TABLE `houselist`
  MODIFY `houseID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `renters`
--
ALTER TABLE `renters`
  MODIFY `renterID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendorID` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
