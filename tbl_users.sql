-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 08:23 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spices`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userStatus` enum('Y','N') NOT NULL DEFAULT 'Y',
  `tokenCode` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `lastname` varchar(5000) DEFAULT NULL,
  `state` varchar(5000) DEFAULT NULL,
  `pincode` varchar(5000) DEFAULT NULL,
  `locality` varchar(5000) DEFAULT NULL,
  `city` varchar(5000) DEFAULT NULL,
  `landmark` varchar(5000) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `country` varchar(5000) DEFAULT NULL,
  `shiptoaddress` varchar(1000) DEFAULT NULL,
  `shiptostate` varchar(100) DEFAULT NULL,
  `shiptopincode` varchar(50) DEFAULT NULL,
  `shiptocountry` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `userName`, `userEmail`, `userPass`, `userStatus`, `tokenCode`, `mobile`, `address`, `lastname`, `state`, `pincode`, `locality`, `city`, `landmark`, `phone`, `country`, `shiptoaddress`, `shiptostate`, `shiptopincode`, `shiptocountry`) VALUES
(109, 'Meet', 'meetshah9819@gmail.com', '202cb962ac59075b964b07152d234b70', 'Y', '876056372548926f022218ec31f2b2c2', ' 9819461979 ', ' B-602 Shree Manahaalm Anand nagar ', 'sm', 'Maharashtra', '401107', '', '   MIRA ROAD (E) ', '', '9820995229', ' India ', ' B-602 Shree Manahaalm Anand nagar ', 'Maharashtra', '401107', NULL),
(149, 'meet', 'm@m.com', 'e10adc3949ba59abbe56e057f20f883e', 'Y', '64d7137d4d73c3503194e3c3be41c12d', '9819461979', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 'meet', 'q@q.com', 'e10adc3949ba59abbe56e057f20f883e', 'Y', 'cd87e90c9a4312d4b6b230a33675ad0a', '9819461979', 'dahs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, 'wW', 'w@w.com', 'e10adc3949ba59abbe56e057f20f883e', 'Y', 'a9cb257e726627f4e146d25e4e05a966', '9819461979', 'j', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 'm', 'meetshah9819@gmail.comm', 'e10adc3949ba59abbe56e057f20f883e', 'Y', '4b2798aaa09a3ad6a7ad161e71cd3fb3', '9819461979', 'dahissar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 'p', 'preet@gmail.com', '202cb962ac59075b964b07152d234b70', 'Y', '2da9b6aeb6875697f97553a90301cd16', '9819461979', 'abc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 'p', 'preet@gmail.comm', '202cb962ac59075b964b07152d234b70', 'Y', '429894560155c5bf8f35cc13c0bff89d', '9819461949', 'abc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
