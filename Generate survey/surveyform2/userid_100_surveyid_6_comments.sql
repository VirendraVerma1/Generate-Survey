-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 06, 2019 at 01:21 PM
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
-- Database: `id8517650_surveyname`
--

-- --------------------------------------------------------

--
-- Table structure for table `userid_100_surveyid_6_comments`
--

CREATE TABLE `userid_100_surveyid_6_comments` (
  `ID` int(50) UNSIGNED NOT NULL,
  `Comment` text COLLATE utf8_unicode_ci NOT NULL,
  `DateTime` datetime DEFAULT NULL,
  `Person` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userid_100_surveyid_6_comments`
--

INSERT INTO `userid_100_surveyid_6_comments` (`ID`, `Comment`, `DateTime`, `Person`) VALUES
(1, 'Very good survey', '2019-02-03 15:01:00', 100),
(2, 'Nice one', '2019-02-03 17:31:00', 0),
(3, '', '2019-02-03 23:45:00', 0),
(4, '', '2019-02-04 06:07:00', 0),
(5, '', '2019-02-04 15:52:00', 0),
(6, 'Good', '2019-02-04 17:19:00', 0),
(7, 'Good', '2019-02-04 17:19:00', 0),
(8, '', '2019-02-04 20:58:00', 0),
(9, 'yash chutiya hai', '2019-02-05 14:55:00', 0),
(10, '', '2019-02-09 20:03:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userid_100_surveyid_6_comments`
--
ALTER TABLE `userid_100_surveyid_6_comments`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userid_100_surveyid_6_comments`
--
ALTER TABLE `userid_100_surveyid_6_comments`
  MODIFY `ID` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
