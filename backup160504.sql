-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2016 at 01:17 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `relationship`
--
CREATE DATABASE IF NOT EXISTS `relationship` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `relationship`;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `qualitytime_points` int(2) NOT NULL DEFAULT '0',
  `compliments_points` int(2) NOT NULL DEFAULT '0',
  `physicaltouch_points` int(2) NOT NULL DEFAULT '0',
  `gift_points` int(2) NOT NULL DEFAULT '0',
  `other_points` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `partner_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `Anniversary` date NOT NULL,
  `love_language` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `partner_id`, `first_name`, `email`, `DOB`, `Anniversary`, `love_language`) VALUES
(7, 8, 'Daryl', 'daryl@batchelors.id.au', '1983-05-01', '2010-05-08', 'physical touch'),
(8, 7, 'Brooke', 'brooke@batchelors.id.au', '1981-07-24', '2010-05-08', 'Quality Time'),
(9, NULL, 'john', 'john@smith.com', '2015-03-27', '2016-03-15', '');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `point_id` int(20) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `category` enum('Quality Time','Compliments','Physical Touch','Gift','Chores') NOT NULL,
  `status` enum('pending','not approved','approved','') NOT NULL,
  `player_giving` int(11) NOT NULL,
  `player_getting` int(11) NOT NULL,
  `type` enum('1','2','3') NOT NULL,
  `game_status` enum('current game','past game') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`point_id`, `reason`, `date`, `category`, `status`, `player_giving`, `player_getting`, `type`, `game_status`) VALUES
(1, 'first reason', '2016-05-03', 'Quality Time', 'approved', 7, 8, '2', 'current game'),
(6, 'three', '2016-05-04', 'Physical Touch', 'pending', 7, 8, '2', 'current game'),
(7, 'I liked it', '2016-05-03', 'Physical Touch', 'approved', 8, 7, '2', 'current game'),
(8, 'you know what', '2016-05-03', 'Physical Touch', 'pending', 8, 7, '3', 'current game'),
(10, 'second you know what', '2016-05-03', 'Physical Touch', 'pending', 8, 7, '1', 'current game');

-- --------------------------------------------------------

--
-- Table structure for table `prizes`
--

CREATE TABLE `prizes` (
  `prize_id` int(11) NOT NULL,
  `player_id` int(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` enum('pending','not approved','approved','completed','not set') NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comments` varchar(500) NOT NULL,
  `enddate` date NOT NULL,
  `game_status` enum('complete','pending','active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prizes`
--

INSERT INTO `prizes` (`prize_id`, `player_id`, `description`, `status`, `Created_at`, `comments`, `enddate`, `game_status`) VALUES
(1, 7, 'I would like a 2 hr full body massage', 'completed', '2016-04-27 03:12:28', '', '0000-00-00', 'complete'),
(2, 8, 'I would like a romantic date to A touch of salt', 'approved', '2016-04-27 06:31:39', 'ok we will go', '0000-00-00', 'complete'),
(3, 7, 'I want some sexy time', 'completed', '2016-04-27 23:59:41', 'bring it on', '2016-04-30', 'complete'),
(38, 9, 'Something great', 'pending', '2016-04-27 04:24:23', '', '0000-00-00', 'complete'),
(40, 9, '', 'pending', '2016-04-27 23:18:04', '', '0000-00-00', 'pending'),
(41, 7, '   I want the same thing again ', 'approved', '2016-04-28 00:15:18', 'sounds good', '2016-05-05', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `category` enum('short','multi') NOT NULL,
  `multichoice1` varchar(300) NOT NULL,
  `multichoice2` varchar(300) NOT NULL,
  `multichoice3` varchar(300) NOT NULL,
  `multichoice4` varchar(300) NOT NULL,
  `answer_lovelanguage1` enum('quality time','compliments','physical touch','gifts','acts of service','other') NOT NULL,
  `answer_lovelanguage2` enum('quality time','compliments','physical touch','gifts','acts of service','other') NOT NULL,
  `answer_lovelanguage3` enum('quality time','compliments','physical touch','gifts','acts of service','other') NOT NULL,
  `answer_lovelanguage4` enum('quality time','compliments','physical touch','gifts','acts of service','other') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partner_id` (`partner_id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`point_id`),
  ADD KEY `player_giving` (`player_giving`),
  ADD KEY `player_getting` (`player_getting`);

--
-- Indexes for table `prizes`
--
ALTER TABLE `prizes`
  ADD PRIMARY KEY (`prize_id`),
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `point_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `prizes`
--
ALTER TABLE `prizes`
  MODIFY `prize_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`);

--
-- Constraints for table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`partner_id`) REFERENCES `player` (`id`);

--
-- Constraints for table `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_ibfk_1` FOREIGN KEY (`player_giving`) REFERENCES `player` (`id`),
  ADD CONSTRAINT `points_ibfk_2` FOREIGN KEY (`player_getting`) REFERENCES `player` (`id`);

--
-- Constraints for table `prizes`
--
ALTER TABLE `prizes`
  ADD CONSTRAINT `prizes_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
