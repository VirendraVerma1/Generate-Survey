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
-- Table structure for table `userid_100_member_survey_location`
--

CREATE TABLE `userid_100_member_survey_location` (
  `ID` int(255) UNSIGNED NOT NULL,
  `City` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Region` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Country` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `userid_100_surveyid_6` int(10) NOT NULL,
  `userid_100_surveyid_12` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userid_100_member_survey_location`
--

INSERT INTO `userid_100_member_survey_location` (`ID`, `City`, `Region`, `Country`, `userid_100_surveyid_6`, `userid_100_surveyid_12`) VALUES
(1, 'Unknown', 'Unknown', 'Unknown', 0, NULL),
(2, 'Lucknow', 'Uttar Pradesh', 'India', 6, NULL),
(3, 'Varanasi', 'Uttar Pradesh', 'India', 4, NULL),
(4, 'Mumbai', 'Maharashtra', 'India', 50, NULL),
(5, 'Kanpur', 'Uttar Pradesh', 'India', 12, NULL),
(6, 'Allahabad', 'Uttar Pradesh', 'India', 4, NULL),
(7, 'Bangalore', 'Karnataka', 'India', 1, NULL),
(8, '', '', 'India', 10, NULL),
(9, 'Ambala', 'Haryana', 'India', 2, NULL),
(10, 'Ludhiana', 'Punjab', 'India', 4, NULL),
(11, 'unknown', 'unknown', 'UNKNOWN', 1, NULL),
(12, 'Connaught Place', 'Delhi', 'India', 1, NULL),
(13, 'Vaikam', 'Kerala', 'India', 1, NULL),
(14, 'Gurgaon', 'Haryana', 'India', 3, NULL),
(15, 'New Delhi', 'National Capital Territory of Delhi', 'India', 2, NULL),
(16, 'Lar', 'Uttar Pradesh', 'India', 1, NULL),
(17, 'Delhi', 'National Capital Territory of Delhi', 'India', 1, NULL),
(18, 'Fyzabad', 'Uttar Pradesh', 'India', 1, NULL),
(19, 'Gorakhpur', 'Uttar Pradesh', 'India', 2, NULL),
(20, 'Dehradun', 'Uttarakhand', 'India', 1, NULL),
(21, 'Pune', 'Maharashtra', 'India', 1, NULL),
(22, 'Thanjavur', 'Tamil Nadu', 'India', 1, NULL),
(23, 'Villupuram', 'Tamil Nadu', 'India', 1, NULL),
(24, 'Kolkata', 'West Bengal', 'India', 1, NULL),
(25, 'Bengaluru', 'Karnataka', 'India', 1, NULL),
(26, 'Frankfurt', 'Hessen', 'Germany', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userid_100_member_survey_location`
--
ALTER TABLE `userid_100_member_survey_location`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userid_100_member_survey_location`
--
ALTER TABLE `userid_100_member_survey_location`
  MODIFY `ID` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
