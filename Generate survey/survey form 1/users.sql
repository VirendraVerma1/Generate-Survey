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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PhoneNo` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TotalSurvey` int(50) DEFAULT NULL,
  `Lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Occupation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `About` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Gender` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProfilePic` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Online_Status` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Email`, `Password`, `PhoneNo`, `TotalSurvey`, `Lastname`, `Address`, `Occupation`, `Location`, `About`, `DOB`, `Gender`, `ProfilePic`, `Online_Status`) VALUES
(100, 'Virendra Verma       ', 'pkv555559@gmail.com', 'helloworld.5', '9452955620', 2, '', 'Sec 6 Vikas Nagar Lucknow', 'Developer of this website', 'Lucknow, India', '', '1997-06-25', 'Male', 'virendra.jpeg', '2019-08-06 18:17:52'),
(103, 'Divyansh', 'mishradivyansh682@gmail.com', '9450518288', '', 0, 'Mishra', '', '', '', '', '0000-00-00', '', '', '2019-02-06 18:42:35'),
(104, 'Arpit ', 'arpitdubey15031999@gmail.com', 'arpit07', '', 0, 'Dubey', '', '', '', '', '0000-00-00', '', '', '2019-01-31 13:56:54'),
(106, 'vishwas shukla', 'vishwasshukla0507@gmail.com', 'vishwas', '', 0, '', '', '', '', '', '0000-00-00', '', '', '2019-02-03 12:57:41'),
(107, 'Prachi Singh', 'Singhprachi646@gmail.com', 'qwertyuiop', '', 1, '', '', '', '', '', '0000-00-00', '', '', '2019-02-03 21:57:18'),
(108, 'ATUL  Kumar', 'Kumarvermaatul121@gmail.com', '1234567890', '', 1, '', '', '', '', '', '0000-00-00', '', '', '2019-02-04 16:06:01'),
(109, 'AKASH KUMAR', 'vermaakashkumar123@gmail.com', 'akash123#', '', 0, '', '', '', '', '', '0000-00-00', '', '', '2019-02-04 18:20:13'),
(110, 'Ashwani  Garg', 'ashwanigarg5000@gmail.com', 'APG@2000', '', 0, '', '', '', '', '', '0000-00-00', '', '', '2019-02-04 20:31:33'),
(120, 'Paritosh Chaudhary', 'chaudharyparitosh848@gmail.com', 'p@ritosh', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-31 08:09:21'),
(121, 'Swaraj Chaturvedi', 'chaturvedivineet434@gmail.com', 'swaraj', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-28 21:42:28'),
(122, 'Paritosh Chaudhary', 'paritosh@gmail.com', '113', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-06 17:30:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
