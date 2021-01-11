-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 06, 2019 at 01:20 PM
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
-- Table structure for table `userid_100_surveyid_6`
--

CREATE TABLE `userid_100_surveyid_6` (
  `ID` int(50) UNSIGNED NOT NULL,
  `Ques` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Ques_Order` int(50) NOT NULL,
  `Page` int(10) NOT NULL,
  `Save_Ques` int(10) NOT NULL,
  `FontFamilyQues` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Required` int(10) NOT NULL,
  `Multiple` int(20) NOT NULL,
  `Heading` int(10) NOT NULL,
  `Bold` int(10) NOT NULL,
  `Italic` int(10) NOT NULL,
  `Underline` int(10) NOT NULL,
  `Text_SizeQues` int(10) NOT NULL,
  `Answer_Type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Answer_Options` int(50) NOT NULL,
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
  `Result1` int(10) NOT NULL,
  `Result2` int(10) NOT NULL,
  `Result3` int(10) NOT NULL,
  `Result4` int(10) NOT NULL,
  `Result5` int(10) NOT NULL,
  `Result6` int(10) NOT NULL,
  `Result7` int(10) NOT NULL,
  `Result8` int(10) NOT NULL,
  `Result9` int(10) NOT NULL,
  `Result10` int(10) NOT NULL,
  `Result11` int(10) NOT NULL,
  `Result12` int(10) NOT NULL,
  `Result13` int(10) NOT NULL,
  `Result14` int(10) NOT NULL,
  `Result15` int(10) NOT NULL,
  `Result16` int(10) NOT NULL,
  `Result17` int(10) NOT NULL,
  `Result18` int(10) NOT NULL,
  `Result19` int(10) NOT NULL,
  `Result20` int(10) NOT NULL,
  `TotalResult` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userid_100_surveyid_6`
--

INSERT INTO `userid_100_surveyid_6` (`ID`, `Ques`, `Ques_Order`, `Page`, `Save_Ques`, `FontFamilyQues`, `Required`, `Multiple`, `Heading`, `Bold`, `Italic`, `Underline`, `Text_SizeQues`, `Answer_Type`, `Answer_Options`, `Option1`, `Option2`, `Option3`, `Option4`, `Option5`, `Option6`, `Option7`, `Option8`, `Option9`, `Option10`, `Option11`, `Option12`, `Option13`, `Option14`, `Option15`, `Option16`, `Option17`, `Option18`, `Option19`, `Option20`, `Result1`, `Result2`, `Result3`, `Result4`, `Result5`, `Result6`, `Result7`, `Result8`, `Result9`, `Result10`, `Result11`, `Result12`, `Result13`, `Result14`, `Result15`, `Result16`, `Result17`, `Result18`, `Result19`, `Result20`, `TotalResult`) VALUES
(1, 'Which game category do you like in android?', 1, 1, 0, 'Verdana', 0, 0, 0, 0, 0, 0, 22, 'Checkbox', 12, 'Massively Multiplayer Online (MMO)', 'Simulations', 'Adventure', 'Real-Time Strategy (RTS)', 'Puzzle', 'Action', 'Stealth Shooter', 'Combat', ' First Person Shooters (FPS)', ' Sports', 'Role-Playing (RPG)', 'Educational', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 40, 4, 14, 14, 11, 23, 8, 3, 12, 18, 4, 13, 0, 0, 0, 0, 0, 0, 0, 0, 112),
(3, 'Which you  prefer more in Android Games?', 2, 1, 1, 'Verdana', 0, 0, 0, 0, 0, 0, 22, 'Radio', 3, 'Single Player', 'Story Mode', 'Multiplayer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, 13, 67, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 111),
(4, 'In which platform you play most of your games', 3, 1, 1, 'Verdana', 0, 0, 0, 0, 0, 0, 22, 'Radio', 6, 'Playstation', 'Computer', 'Phone', 'Tablet', 'XBOX', 'others', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 27, 74, 4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 116),
(6, 'How much time did you spend on a day for playing games?', 4, 1, 1, 'Verdana', 0, 0, 0, 0, 0, 0, 22, 'Radio', 5, '1-2 hours', '2-4 hours', '4-6 hours', '6-8 hours', 'more than 8 hours', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 78, 19, 8, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 111),
(7, 'How much money did you spend per year on games?', 5, 1, 1, 'Verdana', 0, 0, 0, 0, 0, 0, 22, 'Radio', 5, '$0', 'Less than $500', 'Less than $2000', 'Less than $5000', 'More than $5000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 82, 15, 4, 2, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 115),
(8, 'Do you feel like gaming helps your eye and hand coordination?', 6, 2, 1, 'Verdana', 0, 0, 0, 0, 0, 0, 22, 'Radio', 2, 'Yes', 'No', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 67, 33, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100),
(9, 'Has playing video games negatively affected your sleep habits?', 7, 2, 1, 'Verdana', 0, 0, 0, 0, 0, 0, 22, 'Radio', 3, 'Not at all', 'Little', 'A lot', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, 51, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100),
(10, 'Do you want to make your own game?', 8, 2, 1, 'Verdana', 0, 0, 0, 0, 0, 0, 22, 'Radio', 2, 'Yes', 'No', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 75, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100),
(11, 'Your favourite android game', 9, 2, 1, 'Verdana', 0, 0, 0, 0, 0, 0, 22, 'Comment', 1, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(12, 'Do you play PUBG', 10, 2, 1, 'Verdana', 0, 0, 0, 0, 0, 0, 22, 'Radio', 2, 'Yes', 'No', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 64, 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userid_100_surveyid_6`
--
ALTER TABLE `userid_100_surveyid_6`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userid_100_surveyid_6`
--
ALTER TABLE `userid_100_surveyid_6`
  MODIFY `ID` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
