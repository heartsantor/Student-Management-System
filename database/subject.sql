-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2019 at 11:58 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nonisoft_ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_serial` int(20) NOT NULL,
  `subject_id` varchar(10) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `class_id` varchar(5) NOT NULL,
  `optional_type1` tinyint(4) NOT NULL DEFAULT '0',
  `religion` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_serial`, `subject_id`, `subject_name`, `subject_code`, `class_id`, `optional_type1`, `religion`) VALUES
(1, '101_vi', 'Bangla First Paper', '101', 'vi', 0, 0),
(2, '101_vii', 'Bangla First Paper', '101', 'vii', 0, 0),
(3, '101_viii', 'Bangla First Paper', '101', 'viii', 0, 0),
(4, '101_ix', 'Bangla First Paper', '101', 'ix', 0, 0),
(5, '101_x', 'Bangla First Paper', '101', 'x', 0, 0),
(6, '102_vi', 'Bangla Second Paper', '102', 'vi', 0, 0),
(7, '102_vii', 'Bangla Second Paper', '102', 'vii', 0, 0),
(8, '102_viii', 'Bangla Second Paper', '102', 'viii', 0, 0),
(9, '102_ix', 'Bangla Second Paper', '102', 'ix', 0, 0),
(10, '102_x', 'Bangla Second Paper', '102', 'x', 0, 0),
(11, '107_vi', 'English First Paper', '107', 'vi', 0, 0),
(12, '107_vii', 'English First Paper', '107', 'vii', 0, 0),
(13, '107_viii', 'English First Paper', '107', 'viii', 0, 0),
(14, '107_ix', 'English First Paper', '107', 'ix', 0, 0),
(15, '107_x', 'English First Paper', '107', 'x', 0, 0),
(16, '108_vi', 'English Second Paper', '108', 'vi', 0, 0),
(17, '108_vii', 'English Second Paper', '108', 'vii', 0, 0),
(18, '108_viii', 'English Second Paper', '108', 'viii', 0, 0),
(19, '108_ix', 'English Second Paper', '108', 'ix', 0, 0),
(20, '108_x', 'English Second Paper', '108', 'x', 0, 0),
(21, '109_vi', 'Mathematics', '109', 'vi', 0, 0),
(22, '109_vii', 'Mathematics', '109', 'vii', 0, 0),
(23, '109_viii', 'Mathematics', '109', 'viii', 0, 0),
(24, '109_ix', 'Mathematics', '109', 'ix', 0, 0),
(25, '109_x', 'Mathematics', '109', 'x', 0, 0),
(26, '111_vi', 'Religious Studies Islam', '111', 'vi', 0, 1),
(27, '111_vii', 'Religious Studies Islam', '111', 'vii', 0, 1),
(28, '111_viii', 'Religious Studies Islam', '111', 'viii', 0, 1),
(29, '111_ix', 'Religious Studies Islam', '111', 'ix', 0, 1),
(30, '111_x', 'Religious Studies Islam', '111', 'x', 0, 1),
(31, '112_vi', 'Religious Studies Hindu', '112', 'vi', 0, 1),
(32, '112_vii', 'Religious Studies Hindu', '112', 'vii', 0, 1),
(33, '112_viii', 'Religious Studies Hindu', '112', 'viii', 0, 1),
(34, '112_ix', 'Religious Studies Hindu', '112', 'ix', 0, 1),
(35, '112_x', 'Religious Studies Hindu', '112', 'x', 0, 1),
(36, '113_vi', 'Religious Studies Buddha', '113', 'vi', 0, 1),
(37, '113_vii', 'Religious Studies Buddha', '113', 'vii', 0, 1),
(38, '113_viii', 'Religious Studies Buddha', '113', 'viii', 0, 1),
(39, '113_ix', 'Religious Studies Buddha', '113', 'ix', 0, 1),
(40, '113_x', 'Religious Studies Buddha', '113', 'x', 0, 1),
(41, '114_vi', 'Religious Studies Christian', '114', 'vi', 0, 1),
(42, '114_vii', 'Religious Studies Christian', '114', 'vii', 0, 1),
(43, '114_viii', 'Religious Studies Christian', '114', 'viii', 0, 1),
(44, '114_ix', 'Religious Studies Christian', '114', 'ix', 0, 1),
(45, '114_x', 'Religious Studies Christian', '114', 'x', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_serial`),
  ADD UNIQUE KEY `subject_id` (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_serial` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
