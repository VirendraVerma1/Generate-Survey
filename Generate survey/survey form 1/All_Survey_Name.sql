-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 06, 2019 at 01:27 PM
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
-- Table structure for table `All_Survey_Name`
--

CREATE TABLE `All_Survey_Name` (
  `ID` int(11) NOT NULL,
  `Survey_Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `User_Id` int(50) NOT NULL,
  `Survey_Id` int(50) NOT NULL,
  `People_Respond` int(50) DEFAULT NULL,
  `ActiveSurvey` int(2) DEFAULT NULL,
  `Survey_User_Id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `All_Survey_Name`
--

INSERT INTO `All_Survey_Name` (`ID`, `Survey_Name`, `User_Id`, `Survey_Id`, `People_Respond`, `ActiveSurvey`, `Survey_User_Id`) VALUES
(16, 'Best Game Category', 100, 6, 113, 1, 'userid_100_surveyid_6'),
(18, 'Education', 107, 1, 0, 0, 'userid_107_surveyid_1'),
(20, 'Survey', 108, 1, 0, 0, 'userid_108_surveyid_1'),
(27, 'python  language', 120, 1, 0, NULL, 'userid_120_surveyid_1'),
(28, 'IPL 2019', 121, 1, 0, NULL, 'userid_121_surveyid_1'),
(30, 'News channels', 100, 12, 0, NULL, 'userid_100_surveyid_12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `All_Survey_Name`
--
ALTER TABLE `All_Survey_Name`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `All_Survey_Name`
--
ALTER TABLE `All_Survey_Name`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
