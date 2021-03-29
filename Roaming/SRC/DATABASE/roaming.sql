-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 04:54 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roaming`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `countryID` int(5) NOT NULL,
  `engName` varchar(50) NOT NULL,
  `arabName` varchar(50) NOT NULL,
  `dataZoneID` int(5) NOT NULL,
  `zoneID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `galleryID` int(5) NOT NULL,
  `flag` int(5) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hardtoreach`
--

CREATE TABLE `hardtoreach` (
  `hardtoreachID` int(5) NOT NULL,
  `zoneID` int(5) NOT NULL,
  `countryID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `packageID` int(5) NOT NULL,
  `packageName` varchar(50) NOT NULL,
  `fees` double NOT NULL,
  `volume` double NOT NULL,
  `dataZoneID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`packageID`, `packageName`, `fees`, `volume`, `dataZoneID`) VALUES
(1, 'Weekly', 100, 1000, 2),
(3, 'After package rate inside Country', 999.9, 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `script`
--

CREATE TABLE `script` (
  `scriptID` int(5) NOT NULL,
  `head` text NOT NULL,
  `script` text NOT NULL,
  `flag` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `script`
--

INSERT INTO `script` (`scriptID`, `head`, `script`, `flag`) VALUES
(1, 'يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم ', 'يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم يا فندم ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sr`
--

CREATE TABLE `sr` (
  `srID` int(5) NOT NULL,
  `shortCode` int(10) NOT NULL,
  `type` varchar(30) NOT NULL,
  `area` varchar(30) NOT NULL,
  `subarea` varchar(30) NOT NULL,
  `product` varchar(30) NOT NULL,
  `flag` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sr`
--

INSERT INTO `sr` (`srID`, `shortCode`, `type`, `area`, `subarea`, `product`, `flag`) VALUES
(4, 123456, 'aaaa aaaa ', 'aaaa aaaa aaaa', 'aaaa aaaa aaaa aaaa aaaa aaaa ', 'aaaaaa', 3),
(5, 123457, 'type1', 'area1', 'subarea1', 'product1', 3),
(6, 1234567, 'type2', 'area2', 'subarea2', 'product2', 4),
(7, 2964057, 'type3', 'area3', 'subarea3', 'product3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `zoneID` int(5) NOT NULL,
  `localMin` double NOT NULL,
  `internationalMin` double NOT NULL,
  `backHomeMin` double NOT NULL,
  `sms` double NOT NULL,
  `RecMin` double NOT NULL,
  `dataMB` double NOT NULL,
  `videoCallMin` double NOT NULL,
  `videoCallRecMin` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`zoneID`, `localMin`, `internationalMin`, `backHomeMin`, `sms`, `RecMin`, `dataMB`, `videoCallMin`, `videoCallRecMin`) VALUES
(2, 20, 15, 15, 2.5, 4, 30, 22, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countryID`),
  ADD KEY `pricingZoneID` (`zoneID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`galleryID`);

--
-- Indexes for table `hardtoreach`
--
ALTER TABLE `hardtoreach`
  ADD PRIMARY KEY (`hardtoreachID`),
  ADD KEY `countryID` (`countryID`),
  ADD KEY `firstZone` (`zoneID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`packageID`);

--
-- Indexes for table `script`
--
ALTER TABLE `script`
  ADD PRIMARY KEY (`scriptID`);

--
-- Indexes for table `sr`
--
ALTER TABLE `sr`
  ADD PRIMARY KEY (`srID`),
  ADD UNIQUE KEY `shortCode` (`shortCode`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`zoneID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `countryID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `galleryID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hardtoreach`
--
ALTER TABLE `hardtoreach`
  MODIFY `hardtoreachID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `packageID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `script`
--
ALTER TABLE `script`
  MODIFY `scriptID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sr`
--
ALTER TABLE `sr`
  MODIFY `srID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `zoneID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `country`
--
ALTER TABLE `country`
  ADD CONSTRAINT `country_ibfk_2` FOREIGN KEY (`zoneID`) REFERENCES `zone` (`zoneID`);

--
-- Constraints for table `hardtoreach`
--
ALTER TABLE `hardtoreach`
  ADD CONSTRAINT `hardtoreach_ibfk_1` FOREIGN KEY (`countryID`) REFERENCES `country` (`countryID`),
  ADD CONSTRAINT `hardtoreach_ibfk_2` FOREIGN KEY (`zoneID`) REFERENCES `zone` (`zoneID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
