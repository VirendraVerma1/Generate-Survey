-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 06, 2019 at 01:28 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id8517650_survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `userid_100_history`
--

CREATE TABLE `userid_100_history` (
  `ID` int(255) UNSIGNED NOT NULL,
  `Day` int(3) DEFAULT NULL,
  `Month` int(3) DEFAULT NULL,
  `Year` int(5) DEFAULT NULL,
  `userid_100_surveyid_6` int(10) NOT NULL,
  `userid_100_surveyid_12` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userid_100_history`
--

INSERT INTO `userid_100_history` (`ID`, `Day`, `Month`, `Year`, `userid_100_surveyid_6`, `userid_100_surveyid_12`) VALUES
(1, 30, 1, 2019, 0, NULL),
(2, 31, 1, 2019, 0, NULL),
(3, 1, 2, 2019, 0, NULL),
(4, 2, 2, 2019, 0, NULL),
(5, 3, 2, 2019, 52, NULL),
(6, 4, 2, 2019, 41, NULL),
(7, 5, 2, 2019, 9, NULL),
(8, 6, 2, 2019, 4, NULL),
(9, 7, 2, 2019, 1, NULL),
(10, 8, 2, 2019, 1, NULL),
(11, 9, 2, 2019, 3, NULL),
(12, 10, 2, 2019, 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userid_100_history`
--
ALTER TABLE `userid_100_history`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userid_100_history`
--
ALTER TABLE `userid_100_history`
  MODIFY `ID` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
