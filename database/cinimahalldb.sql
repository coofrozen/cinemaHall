-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2020 at 09:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinimahalldb`
--
CREATE DATABASE IF NOT EXISTS `cinimahalldb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cinimahalldb`;

-- --------------------------------------------------------

--
-- Table structure for table `cinema_news`
--

DROP TABLE IF EXISTS `cinema_news`;
CREATE TABLE `cinema_news` (
  `id` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `img_link` varchar(200) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `link` varchar(150) NOT NULL,
  `date_published` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE `reservations` (
  `idr` int(15) NOT NULL,
  `load_time` datetime NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `mobile_no` int(10) NOT NULL,
  `seat_info` varchar(4) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `ticket_no` varchar(10) NOT NULL,
  `show_identifier` int(11) NOT NULL,
  `attendance` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`idr`, `load_time`, `full_name`, `mobile_no`, `seat_info`, `payment_date`, `ticket_no`, `show_identifier`, `attendance`) VALUES
(1, '2020-04-17 21:57:01', 'michael belayneh', 911064533, 'A2', '2020-04-24', '4533', 1, 0),
(2, '2020-04-17 21:57:01', 'dagnachew alemu', 923647367, 'A1', '2020-03-05', '4534', 1, 0),
(3, '2020-04-17 21:57:01', 'yeneneh fantahun', 936230201, 'B3', '2020-03-06', '4535', 1, 0),
(4, '2020-04-17 21:57:01', 'diriba kumsa', 948813035, 'B5', '2020-03-07', '4536', 1, 0),
(5, '2020-04-17 21:57:01', 'hagos silas', 961395869, 'A3', '2020-03-08', '4537', 1, 0),
(6, '2020-04-17 21:57:01', 'tirhas samson', 973978703, 'A5', '2020-03-09', '4538', 1, 0),
(7, '2020-04-17 21:57:01', 'dinkineh yeneneh', 986561537, 'B2', '2020-03-04', '4539', 1, 0),
(8, '2020-04-17 21:57:01', 'meron alemu', 988144371, 'A4', '2020-03-05', '4540', 1, 0),
(9, '2020-04-17 21:57:01', 'bethel girma', 911727205, 'B4', '2020-03-06', '4541', 2, 0),
(10, '2020-04-17 21:57:01', 'tirsit firew', 987310039, 'B7', '2020-03-07', '4542', 2, 0),
(11, '2020-04-17 21:57:01', 'senedu mengistu', 949892873, 'C6', '2020-03-08', '4543', 2, 0),
(12, '2020-04-17 21:57:01', 'samson girma', 912475707, 'A6', '2020-03-09', '4544', 2, 0),
(13, '2020-04-17 21:57:01', 'rediate asrat', 975058541, 'D6', '2020-03-04', '4545', 2, 0),
(14, '2020-04-17 21:57:01', 'nahom dereje', 937641375, 'F3', '2020-03-05', '4546', 2, 0),
(15, '2020-04-17 21:57:01', 'mikiyas daresema', 900224209, 'G2', '2020-03-06', '4547', 2, 0),
(16, '2020-04-17 21:57:01', 'lamek sntayehu', 962807043, 'G1', '2020-03-07', '4548', 2, 0),
(17, '2020-04-17 21:57:01', 'nebyu ezra', 925389877, 'G3', '2020-03-08', '4549', 2, 0),
(18, '2020-04-17 21:57:01', 'lukman asefa', 987972711, 'G4', '2020-03-09', '4550', 2, 0),
(19, '2020-04-17 21:57:01', 'yonas million', 950555545, 'G5', '2020-03-04', '4551', 2, 0),
(20, '2020-04-17 21:57:01', 'dereje admassu', 913138379, 'G6', '2020-03-05', '4552', 2, 0),
(21, '2020-04-17 21:57:01', 'aweke kasa', 936435499, 'F6', '2020-03-06', '4553', 2, 0),
(22, '2020-04-17 21:57:01', 'mebrate zerihun', 934732618, 'F5', '2020-03-07', '4554', 2, 0),
(23, '2020-04-17 21:57:01', 'yohannes million', 933029738, 'F4', '2020-03-08', '4555', 2, 0),
(24, '2020-04-17 21:57:01', 'kalab samson', 931326858, 'F2', '2020-03-09', '4556', 2, 0),
(25, '2020-04-17 21:57:01', 'yohannes temesgen', 929623978, 'F1', '2020-03-04', '4557', 3, 0),
(26, '2020-04-17 21:57:01', 'amensiyans temesgen', 936254431, 'E6', '2020-03-05', '4558', 3, 0),
(27, '2020-04-17 21:57:01', 'mikiyas ejgu', 938122979, 'E3', '2020-03-06', '4559', 3, 0),
(28, '2020-04-17 21:57:01', 'nahom getahun', 939991527, 'E4', '2020-03-07', '4560', 3, 0),
(29, '2020-04-17 21:57:01', 'nathnael legese', 941860076, 'E1', '2020-03-08', '4561', 3, 0),
(30, '2020-04-17 21:57:01', 'nathnael ketema', 943728624, 'E5', '2020-03-09', '4562', 3, 0),
(31, '2020-04-17 21:57:01', 'eyosyas yohannes', 945597172, 'E2', '2020-03-04', '4563', 3, 0),
(32, '2020-04-17 21:57:01', 'minas alemayehu', 947465720, 'H5', '2020-03-05', '4564', 3, 0),
(33, '2020-04-17 21:57:01', 'yshak abrham', 949334269, 'H2', '2020-03-06', '4565', 3, 0),
(34, '2020-04-17 21:57:01', 'temesgen admassu', 951202817, 'H6', '2020-03-07', '4566', 3, 0),
(35, '2020-04-17 21:57:01', 'bekele grima', 953071365, 'H4', '2020-03-08', '4567', 3, 0),
(36, '2020-04-17 21:57:01', 'grum ermiyas', 954939914, 'H1', '2020-03-09', '4568', 3, 0),
(37, '2020-04-17 21:57:01', 'amanuel abebe', 956808462, 'H3', '2020-03-04', '4569', 3, 0),
(38, '2020-04-17 21:57:01', 'kasech tilahun', 958677010, 'I6', '2020-03-05', '4570', 3, 0),
(39, '2020-04-17 21:57:01', 'elsa dereje', 960545558, 'I3', '2020-03-06', '4571', 3, 0),
(40, '2020-04-17 21:57:01', 'shalom zeray ', 962414107, 'J6', '2020-03-07', '4572', 3, 0);

--
-- Triggers `reservations`
--
DROP TRIGGER IF EXISTS `b4_insert_reservation`;
DELIMITER $$
CREATE TRIGGER `b4_insert_reservation` BEFORE INSERT ON `reservations` FOR EACH ROW BEGIN	

set new.load_time = NOW();

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

DROP TABLE IF EXISTS `shows`;
CREATE TABLE `shows` (
  `id` int(11) NOT NULL,
  `load_time` date NOT NULL,
  `show_title` varchar(30) DEFAULT NULL,
  `show_iden` varchar(60) NOT NULL,
  `show_genrs` varchar(30) NOT NULL,
  `show_start_date` date NOT NULL,
  `show_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `load_time`, `show_title`, `show_iden`, `show_genrs`, `show_start_date`, `show_end_date`) VALUES
(1, '2020-04-17', 'HERMELA PART 2', 'HERMELA PART 2 2020-04-17', 'Biographical Films', '2020-04-17', '2020-04-21'),
(2, '2020-04-17', 'ADWA MOVIE', 'ADWA MOVIE 2020-04-17', 'Biographical Films', '2020-04-16', '2020-05-16'),
(3, '2020-04-17', 'SEREYET PART 3', 'SEREYET PART 3 2020-04-17', 'Horror Films', '2020-04-17', '2020-04-30');

--
-- Triggers `shows`
--
DROP TRIGGER IF EXISTS `b4_insert_shows`;
DELIMITER $$
CREATE TRIGGER `b4_insert_shows` BEFORE INSERT ON `shows` FOR EACH ROW BEGIN	
set new.load_time = NOW();

set new.show_iden=concat(new.show_title,' ',new.load_time);   
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `b4_update_shows`;
DELIMITER $$
CREATE TRIGGER `b4_update_shows` BEFORE UPDATE ON `shows` FOR EACH ROW BEGIN	
set new.load_time = NOW();

set new.show_iden=concat(new.show_title,' ',new.load_time);   
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `show_genre`
--

DROP TABLE IF EXISTS `show_genre`;
CREATE TABLE `show_genre` (
  `show_genre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `show_genre`
--

INSERT INTO `show_genre` (`show_genre`) VALUES
('Action Films'),
('Adventure Films'),
('Biographical Films'),
('Comedy Films'),
('Drama Films'),
('Horror Films'),
('Science Fiction Films');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `Level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`Level`) VALUES
('Admin'),
('Staff');

-- --------------------------------------------------------

--
-- Table structure for table `upl_time`
--

DROP TABLE IF EXISTS `upl_time`;
CREATE TABLE `upl_time` (
  `upl_id` int(11) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upl_time`
--

INSERT INTO `upl_time` (`upl_id`, `time`) VALUES
(1, '2020-04-16 00:08:51'),
(2, '2020-04-16 00:10:10'),
(3, '2020-04-16 00:13:12'),
(4, '2020-04-16 13:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

DROP TABLE IF EXISTS `user_login`;
CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `type` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `name` varchar(30) CHARACTER SET latin1 NOT NULL,
  `org_id` int(11) NOT NULL,
  `phoneNo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'person.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `password`, `type`, `status`, `name`, `org_id`, `phoneNo`, `email`, `date_created`, `date_updated`, `photo`) VALUES
(1, 'ethio14543', '298834481ed85e928c4b06c7ef780973b1efb59f', 'Admin', 1, 'Anania Mesfin', 14543, '(+251) 911-066609', 'anania.mesfin@gmail.com', '2020-04-11', '2020-04-16', '1583347943484.png'),
(2, 'ethio6542', '57edacaa3e41b91f426d536c60e2c8473cade9e4', 'Staff', 1, 'Teferi Baranto', 6542, '(+251) 911-513054', 'teferi.baranto@gmail.com', '2020-04-11', '2020-04-17', '1587065220897.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cinema_news`
--
ALTER TABLE `cinema_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`idr`),
  ADD KEY `show_identifier` (`show_identifier`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sh_id` (`show_iden`),
  ADD KEY `show_genrs` (`show_genrs`);

--
-- Indexes for table `show_genre`
--
ALTER TABLE `show_genre`
  ADD UNIQUE KEY `prime` (`show_genre`),
  ADD KEY `show_genre` (`show_genre`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`Level`),
  ADD UNIQUE KEY `Level` (`Level`);

--
-- Indexes for table `upl_time`
--
ALTER TABLE `upl_time`
  ADD PRIMARY KEY (`upl_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `oracle_id` (`org_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `type` (`type`),
  ADD KEY `type_2` (`type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cinema_news`
--
ALTER TABLE `cinema_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `idr` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `upl_time`
--
ALTER TABLE `upl_time`
  MODIFY `upl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`show_identifier`) REFERENCES `shows` (`id`);

--
-- Constraints for table `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `shows_ibfk_1` FOREIGN KEY (`show_genrs`) REFERENCES `show_genre` (`show_genre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_login`
--
ALTER TABLE `user_login`
  ADD CONSTRAINT `user_login_ibfk_1` FOREIGN KEY (`type`) REFERENCES `type` (`Level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
