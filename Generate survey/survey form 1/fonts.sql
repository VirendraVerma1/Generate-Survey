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
-- Table structure for table `fonts`
--

CREATE TABLE `fonts` (
  `ID` int(11) NOT NULL,
  `FontName` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fonts`
--

INSERT INTO `fonts` (`ID`, `FontName`) VALUES
(1, 'Rage'),
(2, 'Script MT'),
(3, 'Bodoni MT PosterBodoni MT Poster'),
(4, 'Agency FB'),
(5, 'Algerian'),
(6, 'Arial'),
(7, 'Arial Rounded MT'),
(8, 'Arial Unicode MS'),
(9, 'Bahnschrift'),
(10, 'Baskerville Old Face'),
(11, 'Bauhaus 93'),
(12, 'Bell MT'),
(13, 'Berlin Sans FB'),
(14, 'Bernard MT'),
(15, 'Blackadder ITC'),
(16, 'Bodoni MT'),
(17, 'Book Antiqua'),
(18, 'Bookshelf Symbol 7'),
(19, 'Britannic'),
(20, 'Bradley Hand ITC'),
(21, 'Broadway'),
(22, 'Brush Script MT'),
(23, 'Cambria'),
(24, 'Castellar'),
(25, 'Calibri'),
(26, 'Californian FB'),
(27, 'Calisto MT'),
(28, 'Calisto MT'),
(29, 'Cambria'),
(30, 'Cambria Math'),
(31, 'Candara'),
(32, 'Centaur'),
(33, 'Century'),
(34, 'Century Gothic'),
(35, 'Century Schoolbook'),
(36, 'Chiller'),
(37, 'Colonna MT'),
(38, 'Comic Sans MS'),
(39, 'Consolas'),
(40, 'Constantia'),
(41, 'Cooper'),
(42, 'Copperplate Gothic'),
(43, 'Corbel'),
(44, 'Courier'),
(45, 'Courier New'),
(46, 'Curlz MT'),
(47, 'DevLys 010'),
(48, 'Ebrima'),
(49, 'Edwardian Script ITC'),
(50, 'Elephant'),
(51, 'Engravers MT'),
(52, 'Eras ITC'),
(53, 'Felix Titling'),
(54, 'Fixedsys'),
(55, 'Footlight MT'),
(56, 'Forte'),
(57, 'Franklin Gothic'),
(58, 'Franklin Gothic Book'),
(59, 'Freestyle Script'),
(60, 'French Script MT'),
(61, 'Gabriola'),
(62, 'Gadugi'),
(63, 'Garamond'),
(64, 'Georgia'),
(65, 'Gigi'),
(66, 'Gill Sans'),
(67, 'Gill Sans MT'),
(68, 'Gloucester MT'),
(69, 'Goudy Old Style'),
(70, 'Goudy Stout'),
(71, 'Haettenschweiler'),
(72, 'Harlow Solid'),
(73, 'Harrington'),
(74, 'High Tower Text'),
(75, 'HoloLens MDL2 Assets'),
(76, 'Impact'),
(77, 'Imprint MT Shadow'),
(78, 'Informal Roman'),
(79, 'Ink Free'),
(80, 'Javanese Text'),
(81, 'Jokerman'),
(82, 'Juice ITC'),
(83, 'Krishna'),
(84, 'Kristen ITC'),
(85, 'Kruti Dev 010'),
(86, 'Kruti Dev 012'),
(87, 'Kruti Dev 013'),
(88, 'Kruti Dev 014'),
(89, 'Kruti Dev 016'),
(90, 'Kruti Dev 020'),
(91, 'Kruti Dev 022'),
(92, 'Kruti Dev 021'),
(93, 'Kruti Dev 024'),
(94, 'Kruti Dev 030'),
(95, 'Kruti Dev 040'),
(96, 'Kruti Dev 050'),
(97, 'Kruti Dev 100'),
(98, 'Kruti Dev 110'),
(99, 'Kruti Dev 120'),
(100, 'Kruti Dev 130'),
(101, 'Kruti Dev 140'),
(102, 'Kundli NormalA'),
(103, 'Kunstler Script'),
(104, 'Latin'),
(105, 'Leelawadee UI'),
(106, 'Lucida Bright'),
(107, 'Lucida Calligraphy'),
(108, 'Lucida Console'),
(109, 'Lucida Fax'),
(110, 'Lucida Handwriting'),
(111, 'Lucida Sans'),
(112, 'Lucida Sans Typewriter'),
(113, 'Lucida Sans Unicode'),
(114, 'Magneto'),
(115, 'Maiandra GD'),
(116, 'Malgun Gothic'),
(117, 'Marlett'),
(118, 'Matura MT Script Capitals'),
(119, 'Microsoft Himalaya'),
(120, 'Microsoft JhengHei'),
(121, 'Microsoft JhengHei UI'),
(122, 'Microsoft New Tai Lue'),
(123, 'Microsoft New Tai Lue'),
(124, 'Microsoft Sans Serif'),
(125, 'Microsoft Tai Le'),
(126, 'Microsoft YaHei'),
(127, 'Microsoft YaHei UI'),
(128, 'Microsoft Yi Baiti'),
(129, 'MingLiU_HKSCS-ExtB'),
(130, 'MingLiU-ExtB'),
(131, 'Mistral'),
(132, 'Modern'),
(133, 'Modern No. 20'),
(134, 'Mongolian Baiti'),
(135, 'Monotype Corsiva'),
(136, 'MS Gothic'),
(137, 'MS Outlook'),
(138, 'MS PGothic'),
(139, 'MS Reference Sans Serif'),
(140, 'MS Reference Specialty'),
(141, 'MS Sans Serif'),
(142, 'MS Serif'),
(143, 'MS UI Gothic'),
(144, 'MT Extra'),
(145, 'MV Boli'),
(146, 'Myanmar Text'),
(147, 'Niagara Engraved'),
(148, 'Niagara Solid'),
(149, 'Nirmala UI'),
(150, 'NSimSun'),
(151, 'OCR A'),
(152, 'Old English Text MT'),
(153, 'Onyx'),
(154, 'Palace Script MT'),
(155, 'Palatino Linotype'),
(156, 'Papyrus'),
(157, 'Parchment'),
(158, 'Perpetua'),
(159, 'Perpetua Titling MT'),
(160, 'Playbill'),
(161, 'PMingLiU-ExtB'),
(162, 'Pristina'),
(163, 'Rage'),
(164, 'Ravie'),
(165, 'Rockwell'),
(166, 'Roman'),
(167, 'Script'),
(168, 'Script MT'),
(169, 'Segoe MDL2 Assets'),
(170, 'Segoe Print'),
(171, 'Segoe Script'),
(172, 'Segoe UI'),
(173, 'Segoe UI Emoji'),
(174, 'Segoe UI Historic'),
(175, 'Segoe UI Symbol'),
(176, 'Showcard Gothic'),
(177, 'SimSun'),
(178, 'SimSun-ExtB'),
(179, 'Sitka Banner'),
(180, 'Sitka Display'),
(181, 'Sitka Heading'),
(182, 'Sitka Small'),
(183, 'Sitka Subheading'),
(184, 'Sitka Text'),
(185, 'Small Fonts'),
(186, 'Snap ITC'),
(187, 'Stencil'),
(188, 'Sylfaen'),
(189, 'Symbol'),
(190, 'System'),
(191, 'Tahoma'),
(192, 'TeamViewer14'),
(193, 'Tempus Sans ITC'),
(194, 'Terminal'),
(195, 'Times New Roman'),
(196, 'Trebuchet MS'),
(197, 'Tw Cen MT'),
(198, 'Verdana'),
(199, 'Viner Hand ITC'),
(200, 'Vivaldi'),
(201, 'Vladimir Script'),
(202, 'Webdings'),
(203, 'Wingdings'),
(204, 'Wingdings 2'),
(205, 'Wingdings 3'),
(206, 'Yu Gothic'),
(207, 'Yu Gothic UI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fonts`
--
ALTER TABLE `fonts`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fonts`
--
ALTER TABLE `fonts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
