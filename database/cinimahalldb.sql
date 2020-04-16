-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 03:34 PM
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
  `id` int(15) NOT NULL,
  `load_time` datetime NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `mobile_no` int(10) NOT NULL,
  `seat_info` varchar(4) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `ticket_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `load_time`, `full_name`, `mobile_no`, `seat_info`, `payment_date`, `ticket_no`) VALUES
(1, '2020-04-16 00:10:10', 'michael belayneh', 911064533, 'A2', '2020-05-03', '4533'),
(2, '2020-04-16 00:10:10', 'dagnachew alemu', 923647367, 'A1', '2020-06-03', '4534'),
(3, '2020-04-16 00:10:10', 'yeneneh fantahun', 936230201, 'B3', '2020-07-03', '4535'),
(4, '2020-04-16 00:10:10', 'diriba kumsa', 948813035, 'B5', '2020-08-03', '4536'),
(5, '2020-04-16 00:10:10', 'hagos silas', 961395869, 'A3', '2020-09-03', '4537'),
(6, '2020-04-16 00:10:10', 'tirhas samson', 973978703, 'A5', '2020-10-03', '4538'),
(7, '2020-04-16 00:10:10', 'dinkineh yeneneh', 986561537, 'B2', '2020-05-03', '4539'),
(8, '2020-04-16 00:10:10', 'meron alemu', 988144371, 'A4', '2020-06-03', '4540'),
(9, '2020-04-16 00:10:10', 'bethel girma', 911727205, 'B4', '2020-07-03', '4541'),
(10, '2020-04-16 00:10:10', 'tirsit firew', 987310039, 'B7', '2020-08-03', '4542'),
(11, '2020-04-16 00:10:10', 'senedu mengistu', 949892873, 'C6', '2020-09-03', '4543'),
(12, '2020-04-16 00:10:10', 'samson girma', 912475707, 'A6', '2020-10-03', '4544'),
(13, '2020-04-16 00:10:10', 'rediate asrat', 975058541, 'D6', '2020-05-03', '4545'),
(14, '2020-04-16 00:10:10', 'nahom dereje', 937641375, 'F3', '2020-06-03', '4546'),
(15, '2020-04-16 00:10:10', 'mikiyas daresema', 900224209, 'G2', '2020-07-03', '4547'),
(16, '2020-04-16 00:10:10', 'lamek sntayehu', 962807043, 'G1', '2020-08-03', '4548'),
(17, '2020-04-16 00:10:10', 'nebyu ezra', 925389877, 'G3', '2020-09-03', '4549'),
(18, '2020-04-16 00:10:10', 'lukman asefa', 987972711, 'G4', '2020-10-03', '4550'),
(19, '2020-04-16 00:10:10', 'yonas million', 950555545, 'G5', '2020-05-03', '4551'),
(20, '2020-04-16 00:10:10', 'dereje admassu', 913138379, 'G6', '2020-06-03', '4552'),
(21, '2020-04-16 00:10:10', 'aweke kasa', 936435499, 'F6', '2020-07-03', '4553'),
(22, '2020-04-16 00:10:10', 'mebrate zerihun', 934732618, 'F5', '2020-08-03', '4554'),
(23, '2020-04-16 00:10:10', 'yohannes million', 933029738, 'F4', '2020-09-03', '4555'),
(24, '2020-04-16 00:10:10', 'kalab samson', 931326858, 'F2', '2020-10-03', '4556'),
(25, '2020-04-16 00:10:10', 'yohannes temesgen', 929623978, 'F1', '2020-05-03', '4557'),
(26, '2020-04-16 00:10:10', 'amensiyans temesgen', 936254431, 'E6', '2020-06-03', '4558'),
(27, '2020-04-16 00:10:10', 'mikiyas ejgu', 938122979, 'E3', '2020-07-03', '4559'),
(28, '2020-04-16 00:10:10', 'nahom getahun', 939991527, 'E4', '2020-08-03', '4560'),
(29, '2020-04-16 00:10:10', 'nathnael legese', 941860075, 'E1', '2020-09-03', '4561'),
(30, '2020-04-16 00:10:10', 'nathnael ketema', 943728624, 'E5', '2020-10-03', '4562'),
(31, '2020-04-16 00:10:10', 'eyosyas yohannes', 945597172, 'E2', '2020-05-03', '4563'),
(32, '2020-04-16 00:10:10', 'minas alemayehu', 947465720, 'H5', '2020-06-03', '4564'),
(33, '2020-04-16 00:10:10', 'yshak abrham', 949334269, 'H2', '2020-07-03', '4565'),
(34, '2020-04-16 00:10:10', 'temesgen admassu', 951202817, 'H6', '2020-08-03', '4566'),
(35, '2020-04-16 00:10:10', 'bekele grima', 953071365, 'H4', '2020-09-03', '4567'),
(36, '2020-04-16 00:10:10', 'grum ermiyas', 954939913, 'H1', '2020-10-03', '4568'),
(37, '2020-04-16 00:10:10', 'amanuel abebe', 956808462, 'H3', '2020-05-03', '4569'),
(38, '2020-04-16 00:10:10', 'kasech tilahun', 958677010, 'I6', '2020-06-03', '4570'),
(39, '2020-04-16 00:10:10', 'elsa dereje', 960545558, 'I3', '2020-07-03', '4571'),
(40, '2020-04-16 00:10:10', 'shalom zeray ', 962414107, 'J6', '2020-08-03', '4572'),
(41, '2020-04-16 00:13:12', 'michael belayneh', 911064533, 'A2', '2020-05-03', '4533'),
(42, '2020-04-16 00:13:12', 'dagnachew alemu', 923647367, 'A1', '2020-06-03', '4534'),
(43, '2020-04-16 00:13:12', 'yeneneh fantahun', 936230201, 'B3', '2020-07-03', '4535'),
(44, '2020-04-16 00:13:12', 'diriba kumsa', 948813035, 'B5', '2020-08-03', '4536'),
(45, '2020-04-16 00:13:12', 'hagos silas', 961395869, 'A3', '2020-09-03', '4537'),
(46, '2020-04-16 00:13:12', 'tirhas samson', 973978703, 'A5', '2020-10-03', '4538'),
(47, '2020-04-16 00:13:12', 'dinkineh yeneneh', 986561537, 'B2', '2020-05-03', '4539'),
(48, '2020-04-16 00:13:12', 'meron alemu', 988144371, 'A4', '2020-06-03', '4540'),
(49, '2020-04-16 00:13:12', 'bethel girma', 911727205, 'B4', '2020-07-03', '4541'),
(50, '2020-04-16 00:13:12', 'tirsit firew', 987310039, 'B7', '2020-08-03', '4542'),
(51, '2020-04-16 00:13:12', 'senedu mengistu', 949892873, 'C6', '2020-09-03', '4543'),
(52, '2020-04-16 00:13:12', 'samson girma', 912475707, 'A6', '2020-10-03', '4544'),
(53, '2020-04-16 00:13:12', 'rediate asrat', 975058541, 'D6', '2020-05-03', '4545'),
(54, '2020-04-16 00:13:12', 'nahom dereje', 937641375, 'F3', '2020-06-03', '4546'),
(55, '2020-04-16 00:13:12', 'mikiyas daresema', 900224209, 'G2', '2020-07-03', '4547'),
(56, '2020-04-16 00:13:12', 'lamek sntayehu', 962807043, 'G1', '2020-08-03', '4548'),
(57, '2020-04-16 00:13:12', 'nebyu ezra', 925389877, 'G3', '2020-09-03', '4549'),
(58, '2020-04-16 00:13:12', 'lukman asefa', 987972711, 'G4', '2020-10-03', '4550'),
(59, '2020-04-16 00:13:12', 'yonas million', 950555545, 'G5', '2020-05-03', '4551'),
(60, '2020-04-16 00:13:12', 'dereje admassu', 913138379, 'G6', '2020-06-03', '4552'),
(61, '2020-04-16 00:13:12', 'aweke kasa', 936435499, 'F6', '2020-07-03', '4553'),
(62, '2020-04-16 00:13:12', 'mebrate zerihun', 934732618, 'F5', '2020-08-03', '4554'),
(63, '2020-04-16 00:13:12', 'yohannes million', 933029738, 'F4', '2020-09-03', '4555'),
(64, '2020-04-16 00:13:12', 'kalab samson', 931326858, 'F2', '2020-10-03', '4556'),
(65, '2020-04-16 00:13:12', 'yohannes temesgen', 929623978, 'F1', '2020-05-03', '4557'),
(66, '2020-04-16 00:13:12', 'amensiyans temesgen', 936254431, 'E6', '2020-06-03', '4558'),
(67, '2020-04-16 00:13:12', 'mikiyas ejgu', 938122979, 'E3', '2020-07-03', '4559'),
(68, '2020-04-16 00:13:12', 'nahom getahun', 939991527, 'E4', '2020-08-03', '4560'),
(69, '2020-04-16 00:13:12', 'nathnael legese', 941860075, 'E1', '2020-09-03', '4561'),
(70, '2020-04-16 00:13:12', 'nathnael ketema', 943728624, 'E5', '2020-10-03', '4562'),
(71, '2020-04-16 00:13:12', 'eyosyas yohannes', 945597172, 'E2', '2020-05-03', '4563'),
(72, '2020-04-16 00:13:12', 'minas alemayehu', 947465720, 'H5', '2020-06-03', '4564'),
(73, '2020-04-16 00:13:12', 'yshak abrham', 949334269, 'H2', '2020-07-03', '4565'),
(74, '2020-04-16 00:13:12', 'temesgen admassu', 951202817, 'H6', '2020-08-03', '4566'),
(75, '2020-04-16 00:13:12', 'bekele grima', 953071365, 'H4', '2020-09-03', '4567'),
(76, '2020-04-16 00:13:12', 'grum ermiyas', 954939913, 'H1', '2020-10-03', '4568'),
(77, '2020-04-16 00:13:12', 'amanuel abebe', 956808462, 'H3', '2020-05-03', '4569'),
(78, '2020-04-16 00:13:12', 'kasech tilahun', 958677010, 'I6', '2020-06-03', '4570'),
(79, '2020-04-16 00:13:12', 'elsa dereje', 960545558, 'I3', '2020-07-03', '4571'),
(80, '2020-04-16 00:13:12', 'shalom zeray ', 962414107, 'J6', '2020-08-03', '4572'),
(81, '2020-04-16 13:28:56', 'michael belayneh', 911064533, 'A2', '2020-05-03', '4533'),
(82, '2020-04-16 13:28:56', 'dagnachew alemu', 923647367, 'A1', '2020-06-03', '4534'),
(83, '2020-04-16 13:28:56', 'yeneneh fantahun', 936230201, 'B3', '2020-07-03', '4535'),
(84, '2020-04-16 13:28:56', 'diriba kumsa', 948813035, 'B5', '2020-08-03', '4536'),
(85, '2020-04-16 13:28:56', 'hagos silas', 961395869, 'A3', '2020-09-03', '4537'),
(86, '2020-04-16 13:28:56', 'tirhas samson', 973978703, 'A5', '2020-10-03', '4538'),
(87, '2020-04-16 13:28:56', 'dinkineh yeneneh', 986561537, 'B2', '2020-05-03', '4539'),
(88, '2020-04-16 13:28:56', 'meron alemu', 988144371, 'A4', '2020-06-03', '4540'),
(89, '2020-04-16 13:28:56', 'bethel girma', 911727205, 'B4', '2020-07-03', '4541'),
(90, '2020-04-16 13:28:56', 'tirsit firew', 987310039, 'B7', '2020-08-03', '4542'),
(91, '2020-04-16 13:28:56', 'senedu mengistu', 949892873, 'C6', '2020-09-03', '4543'),
(92, '2020-04-16 13:28:56', 'samson girma', 912475707, 'A6', '2020-10-03', '4544'),
(93, '2020-04-16 13:28:56', 'rediate asrat', 975058541, 'D6', '2020-05-03', '4545'),
(94, '2020-04-16 13:28:56', 'nahom dereje', 937641375, 'F3', '2020-06-03', '4546'),
(95, '2020-04-16 13:28:56', 'mikiyas daresema', 900224209, 'G2', '2020-07-03', '4547'),
(96, '2020-04-16 13:28:56', 'lamek sntayehu', 962807043, 'G1', '2020-08-03', '4548'),
(97, '2020-04-16 13:28:56', 'nebyu ezra', 925389877, 'G3', '2020-09-03', '4549'),
(98, '2020-04-16 13:28:56', 'lukman asefa', 987972711, 'G4', '2020-10-03', '4550'),
(99, '2020-04-16 13:28:56', 'yonas million', 950555545, 'G5', '2020-05-03', '4551'),
(100, '2020-04-16 13:28:56', 'dereje admassu', 913138379, 'G6', '2020-06-03', '4552'),
(101, '2020-04-16 13:28:56', 'aweke kasa', 936435499, 'F6', '2020-07-03', '4553'),
(102, '2020-04-16 13:28:56', 'mebrate zerihun', 934732618, 'F5', '2020-08-03', '4554'),
(103, '2020-04-16 13:28:56', 'yohannes million', 933029738, 'F4', '2020-09-03', '4555'),
(104, '2020-04-16 13:28:56', 'kalab samson', 931326858, 'F2', '2020-10-03', '4556'),
(105, '2020-04-16 13:28:56', 'yohannes temesgen', 929623978, 'F1', '2020-05-03', '4557'),
(106, '2020-04-16 13:28:56', 'amensiyans temesgen', 936254431, 'E6', '2020-06-03', '4558'),
(107, '2020-04-16 13:28:56', 'mikiyas ejgu', 938122979, 'E3', '2020-07-03', '4559'),
(108, '2020-04-16 13:28:56', 'nahom getahun', 939991527, 'E4', '2020-08-03', '4560'),
(109, '2020-04-16 13:28:56', 'nathnael legese', 941860075, 'E1', '2020-09-03', '4561'),
(110, '2020-04-16 13:28:56', 'nathnael ketema', 943728624, 'E5', '2020-10-03', '4562'),
(111, '2020-04-16 13:28:56', 'eyosyas yohannes', 945597172, 'E2', '2020-05-03', '4563'),
(112, '2020-04-16 13:28:56', 'minas alemayehu', 947465720, 'H5', '2020-06-03', '4564'),
(113, '2020-04-16 13:28:56', 'yshak abrham', 949334269, 'H2', '2020-07-03', '4565'),
(114, '2020-04-16 13:28:56', 'temesgen admassu', 951202817, 'H6', '2020-08-03', '4566'),
(115, '2020-04-16 13:28:56', 'bekele grima', 953071365, 'H4', '2020-09-03', '4567'),
(116, '2020-04-16 13:28:56', 'grum ermiyas', 954939913, 'H1', '2020-10-03', '4568'),
(117, '2020-04-16 13:28:56', 'amanuel abebe', 956808462, 'H3', '2020-05-03', '4569'),
(118, '2020-04-16 13:28:56', 'kasech tilahun', 958677010, 'I6', '2020-06-03', '4570'),
(119, '2020-04-16 13:28:56', 'elsa dereje', 960545558, 'I3', '2020-07-03', '4571'),
(120, '2020-04-16 13:28:56', 'shalom zeray ', 962414107, 'J6', '2020-08-03', '4572'),
(121, '2020-04-16 13:56:08', 'dagnachew alemu', 923647367, 'A1', '0000-00-00', '4534'),
(122, '2020-04-16 13:56:08', 'yeneneh fantahun', 936230201, 'B3', '0000-00-00', '4535'),
(123, '2020-04-16 13:56:08', 'diriba kumsa', 948813035, 'B5', '0000-00-00', '4536'),
(124, '2020-04-16 13:56:08', 'hagos silas', 961395869, 'A3', '0000-00-00', '4537'),
(125, '2020-04-16 13:56:08', 'tirhas samson', 973978703, 'A5', '0000-00-00', '4538'),
(126, '2020-04-16 13:56:08', 'dinkineh yeneneh', 986561537, 'B2', '0000-00-00', '4539'),
(127, '2020-04-16 13:56:08', 'meron alemu', 988144371, 'A4', '0000-00-00', '4540'),
(128, '2020-04-16 13:56:08', 'bethel girma', 911727205, 'B4', '0000-00-00', '4541'),
(129, '2020-04-16 13:56:08', 'tirsit firew', 987310039, 'B7', '0000-00-00', '4542'),
(130, '2020-04-16 13:56:08', 'senedu mengistu', 949892873, 'C6', '0000-00-00', '4543'),
(131, '2020-04-16 13:56:08', 'samson girma', 912475707, 'A6', '0000-00-00', '4544'),
(132, '2020-04-16 13:56:08', 'rediate asrat', 975058541, 'D6', '0000-00-00', '4545'),
(133, '2020-04-16 13:56:08', 'nahom dereje', 937641375, 'F3', '0000-00-00', '4546'),
(134, '2020-04-16 13:56:08', 'mikiyas daresema', 900224209, 'G2', '0000-00-00', '4547'),
(135, '2020-04-16 13:56:08', 'lamek sntayehu', 962807043, 'G1', '0000-00-00', '4548'),
(136, '2020-04-16 13:56:08', 'nebyu ezra', 925389877, 'G3', '0000-00-00', '4549'),
(137, '2020-04-16 13:56:08', 'lukman asefa', 987972711, 'G4', '0000-00-00', '4550'),
(138, '2020-04-16 13:56:08', 'yonas million', 950555545, 'G5', '0000-00-00', '4551'),
(139, '2020-04-16 13:56:08', 'dereje admassu', 913138379, 'G6', '0000-00-00', '4552'),
(140, '2020-04-16 13:56:08', 'aweke kasa', 936435499, 'F6', '0000-00-00', '4553'),
(141, '2020-04-16 13:56:08', 'mebrate zerihun', 934732618, 'F5', '0000-00-00', '4554'),
(142, '2020-04-16 13:56:08', 'yohannes million', 933029738, 'F4', '0000-00-00', '4555'),
(143, '2020-04-16 13:56:08', 'kalab samson', 931326858, 'F2', '0000-00-00', '4556'),
(144, '2020-04-16 13:56:08', 'yohannes temesgen', 929623978, 'F1', '0000-00-00', '4557'),
(145, '2020-04-16 13:56:08', 'amensiyans temesgen', 936254431, 'E6', '0000-00-00', '4558'),
(146, '2020-04-16 13:56:08', 'mikiyas ejgu', 938122979, 'E3', '0000-00-00', '4559'),
(147, '2020-04-16 13:56:08', 'nahom getahun', 939991527, 'E4', '0000-00-00', '4560'),
(148, '2020-04-16 13:56:08', 'nathnael legese', 941860076, 'E1', '0000-00-00', '4561'),
(149, '2020-04-16 13:56:08', 'nathnael ketema', 943728624, 'E5', '0000-00-00', '4562'),
(150, '2020-04-16 13:56:08', 'eyosyas yohannes', 945597172, 'E2', '0000-00-00', '4563'),
(151, '2020-04-16 13:56:08', 'minas alemayehu', 947465720, 'H5', '0000-00-00', '4564'),
(152, '2020-04-16 13:56:08', 'yshak abrham', 949334269, 'H2', '0000-00-00', '4565'),
(153, '2020-04-16 13:56:08', 'temesgen admassu', 951202817, 'H6', '0000-00-00', '4566'),
(154, '2020-04-16 13:56:08', 'bekele grima', 953071365, 'H4', '0000-00-00', '4567'),
(155, '2020-04-16 13:56:08', 'grum ermiyas', 954939914, 'H1', '0000-00-00', '4568'),
(156, '2020-04-16 13:56:08', 'amanuel abebe', 956808462, 'H3', '0000-00-00', '4569'),
(157, '2020-04-16 13:56:08', 'kasech tilahun', 958677010, 'I6', '0000-00-00', '4570'),
(158, '2020-04-16 13:56:08', 'elsa dereje', 960545558, 'I3', '2020-04-15', '4571');

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
-- Table structure for table `shows_detail`
--

DROP TABLE IF EXISTS `shows_detail`;
CREATE TABLE `shows_detail` (
  `id` int(5) NOT NULL,
  `show_title` varchar(100) NOT NULL,
  `show_genrs` set('Action Films','Adventure Films','Comedy Films','Drama Films','Horror Films','Science Fiction Films','Biographical Films (or "Biopics") - or Historical') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'ethio14543', '23d42f5f3f66498b2c8ff4c20b8c5ac826e47146', 'Admin', 1, 'Anania Mesfin', 14543, '(+251) 911-066609', 'anania.mesfin@ethiotelecom.et', '2020-04-11', '2020-04-11', '1583347943484.png'),
(2, 'ethio6542', '84f831b21e96401b0209df234a2b0666b2bceda5', 'Staff', 1, 'Teferi Baranto', 6542, '(+251) 911-513054', 'teferi.baranto@ethiotelecom.et', '2020-04-11', '2020-04-11', '1584896819331.jpg');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shows_detail`
--
ALTER TABLE `shows_detail`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `shows_detail`
--
ALTER TABLE `shows_detail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `user_login`
--
ALTER TABLE `user_login`
  ADD CONSTRAINT `user_login_ibfk_1` FOREIGN KEY (`type`) REFERENCES `type` (`Level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
