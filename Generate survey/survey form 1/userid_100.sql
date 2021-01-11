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
-- Table structure for table `userid_100`
--

CREATE TABLE `userid_100` (
  `ID` int(255) UNSIGNED NOT NULL,
  `SurveyName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DayCreated` date DEFAULT NULL,
  `DayLeft` date DEFAULT NULL,
  `PeopleRespond` int(10) DEFAULT NULL,
  `ProfilePic` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `SurveyBackgroundPic` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ActiveSurvey` int(10) DEFAULT NULL,
  `SurveyFont` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SurveyFontColor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Bold` int(2) DEFAULT NULL,
  `Italic` int(2) DEFAULT NULL,
  `Underline` int(2) DEFAULT NULL,
  `Outerline` int(2) DEFAULT NULL,
  `Size` int(3) DEFAULT NULL,
  `EnableResultPage` int(2) DEFAULT NULL,
  `EnableComment` int(2) DEFAULT NULL,
  `EnableRate` int(2) DEFAULT NULL,
  `EnablePublic` int(2) DEFAULT NULL,
  `Online_Status` time DEFAULT NULL,
  `Rate` decimal(50,0) DEFAULT NULL,
  `Report` int(3) DEFAULT NULL,
  `OuterDiv` int(2) DEFAULT NULL,
  `OuterDivColor` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `InnerDiv` int(2) DEFAULT NULL,
  `InnerDivColor` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ThemeBlack` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userid_100`
--

INSERT INTO `userid_100` (`ID`, `SurveyName`, `DayCreated`, `DayLeft`, `PeopleRespond`, `ProfilePic`, `SurveyBackgroundPic`, `ActiveSurvey`, `SurveyFont`, `SurveyFontColor`, `Bold`, `Italic`, `Underline`, `Outerline`, `Size`, `EnableResultPage`, `EnableComment`, `EnableRate`, `EnablePublic`, `Online_Status`, `Rate`, `Report`, `OuterDiv`, `OuterDivColor`, `InnerDiv`, `InnerDivColor`, `ThemeBlack`) VALUES
(6, 'Best_Game_Category', '2019-02-03', '2019-02-01', 113, '', '8b6c87b389b292174b806f2ce9daa88388e54c47.jpg', 1, 'Script MT', 'red', 1, 0, 0, 1, 50, 1, 1, 0, 1, '13:03:47', 0, 0, 1, 'black', 1, 'white', 0),
(12, 'News_channels', '2019-08-06', NULL, 0, NULL, 'blue-background-portrait-4.jpg', 0, '', '', 1, 1, 1, 1, 40, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 'black', 1, 'black', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userid_100`
--
ALTER TABLE `userid_100`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userid_100`
--
ALTER TABLE `userid_100`
  MODIFY `ID` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
