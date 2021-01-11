-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 06, 2019 at 01:26 PM
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
-- Table structure for table `userid_121_surveyid_1`
--

CREATE TABLE `userid_121_surveyid_1` (
  `ID` int(50) UNSIGNED NOT NULL,
  `Ques` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ques_Order` int(50) DEFAULT NULL,
  `Page` int(10) DEFAULT NULL,
  `Save_Ques` int(10) DEFAULT NULL,
  `FontFamilyQues` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Required` int(10) DEFAULT NULL,
  `Multiple` int(20) DEFAULT NULL,
  `Heading` int(10) DEFAULT NULL,
  `Bold` int(10) DEFAULT NULL,
  `Italic` int(10) DEFAULT NULL,
  `Underline` int(10) DEFAULT NULL,
  `Text_SizeQues` int(10) DEFAULT NULL,
  `Answer_Type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Answer_Options` int(50) DEFAULT NULL,
  `Option1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Option2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Option3` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Option4` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Option5` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Option6` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Option7` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Option8` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Option9` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Option10` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Option11` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Option12` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Option13` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Option14` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Option15` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Option16` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Option17` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Option18` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Option19` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Option20` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Result1` int(10) DEFAULT NULL,
  `Result2` int(10) DEFAULT NULL,
  `Result3` int(10) DEFAULT NULL,
  `Result4` int(10) DEFAULT NULL,
  `Result5` int(10) DEFAULT NULL,
  `Result6` int(10) DEFAULT NULL,
  `Result7` int(10) DEFAULT NULL,
  `Result8` int(10) DEFAULT NULL,
  `Result9` int(10) DEFAULT NULL,
  `Result10` int(10) DEFAULT NULL,
  `Result11` int(10) DEFAULT NULL,
  `Result12` int(10) DEFAULT NULL,
  `Result13` int(10) DEFAULT NULL,
  `Result14` int(10) DEFAULT NULL,
  `Result15` int(10) DEFAULT NULL,
  `Result16` int(10) DEFAULT NULL,
  `Result17` int(10) DEFAULT NULL,
  `Result18` int(10) DEFAULT NULL,
  `Result19` int(10) DEFAULT NULL,
  `Result20` int(10) DEFAULT NULL,
  `TotalResult` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userid_121_surveyid_1`
--

INSERT INTO `userid_121_surveyid_1` (`ID`, `Ques`, `Ques_Order`, `Page`, `Save_Ques`, `FontFamilyQues`, `Required`, `Multiple`, `Heading`, `Bold`, `Italic`, `Underline`, `Text_SizeQues`, `Answer_Type`, `Answer_Options`, `Option1`, `Option2`, `Option3`, `Option4`, `Option5`, `Option6`, `Option7`, `Option8`, `Option9`, `Option10`, `Option11`, `Option12`, `Option13`, `Option14`, `Option15`, `Option16`, `Option17`, `Option18`, `Option19`, `Option20`, `Result1`, `Result2`, `Result3`, `Result4`, `Result5`, `Result6`, `Result7`, `Result8`, `Result9`, `Result10`, `Result11`, `Result12`, `Result13`, `Result14`, `Result15`, `Result16`, `Result17`, `Result18`, `Result19`, `Result20`, `TotalResult`) VALUES
(1, '', 1, 1, 0, 'Verdana', 0, 0, 0, 0, 0, 0, 18, 'Radio', 2, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userid_121_surveyid_1`
--
ALTER TABLE `userid_121_surveyid_1`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userid_121_surveyid_1`
--
ALTER TABLE `userid_121_surveyid_1`
  MODIFY `ID` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
