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
-- Table structure for table `userid_100_friend_list`
--

CREATE TABLE `userid_100_friend_list` (
  `ID` int(255) UNSIGNED NOT NULL,
  `FriendName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `State` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userid_100_friend_list`
--

INSERT INTO `userid_100_friend_list` (`ID`, `FriendName`, `State`) VALUES
(4, '103', 'following'),
(5, '104', 'following'),
(7, '110', 'following'),
(8, '109', 'following'),
(11, '108', 'following'),
(12, '120', 'following'),
(13, '121', 'following');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userid_100_friend_list`
--
ALTER TABLE `userid_100_friend_list`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userid_100_friend_list`
--
ALTER TABLE `userid_100_friend_list`
  MODIFY `ID` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
