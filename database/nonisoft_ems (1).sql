-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2019 at 11:24 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

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
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_serial` int(5) NOT NULL,
  `class_id` varchar(10) NOT NULL,
  `class_name` varchar(10) NOT NULL,
  `has_group` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_serial`, `class_id`, `class_name`, `has_group`) VALUES
(1, 'vi', 'Six', 0),
(2, 'vii', 'Seven', 0),
(3, 'viii', 'Eight', 0),
(4, 'ix', 'Nine', 1),
(5, 'x', 'Ten', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_serial` int(5) NOT NULL,
  `group_id` varchar(30) NOT NULL,
  `group_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_serial`, `group_id`, `group_name`) VALUES
(1, 'science', 'Science'),
(2, 'commerce', 'Commerce'),
(3, 'arts', 'Arts');

-- --------------------------------------------------------

--
-- Table structure for table `institution_details`
--

CREATE TABLE `institution_details` (
  `serial` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `estd` date NOT NULL,
  `eiin` varchar(20) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `web` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institution_details`
--

INSERT INTO `institution_details` (`serial`, `name`, `address`, `estd`, `eiin`, `phone`, `email`, `web`, `logo`) VALUES
(1, 'à¦†à¦² à¦œà¦¾à¦¬à§‡à¦°', 'Muhuripara, North Agrabad, Chittagong', '1982-10-27', '104287', '031-724480', 'alzaber3034@gmail.com', 'www.alzaber.edu.bd', '../logo/instituition_logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `serial` int(50) NOT NULL,
  `id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'User',
  `active` varchar(20) NOT NULL DEFAULT 'yes',
  `esif` tinyint(4) NOT NULL DEFAULT '0',
  `eff` tinyint(4) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`serial`, `id`, `password`, `role`, `active`, `esif`, `eff`, `created`) VALUES
(1, 'admin@admin.com', '123', 'admin', 'yes', 1, 1, '2019-06-23 04:36:45'),
(2, 'test_user', '123', 'User', 'yes', 1, 0, '2019-06-23 05:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_serial` int(10) NOT NULL,
  `session_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_serial`, `session_name`) VALUES
(1, '2016'),
(2, '2017'),
(3, '2018'),
(4, '2019');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_serial` int(20) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_section` varchar(20) NOT NULL,
  `student_session` varchar(10) NOT NULL,
  `student_class` varchar(15) NOT NULL,
  `student_shift` varchar(15) NOT NULL,
  `student_roll` varchar(5) NOT NULL,
  `student_group` varchar(15) NOT NULL DEFAULT 'Other',
  `student_gender` varchar(20) NOT NULL,
  `student_dob` date NOT NULL,
  `student_blood` varchar(5) NOT NULL,
  `student_religion` varchar(15) NOT NULL,
  `student_special_need` varchar(50) NOT NULL,
  `student_nid` varchar(30) NOT NULL,
  `student_nationality` varchar(20) NOT NULL,
  `student_phone` varchar(20) NOT NULL,
  `student_present_address` text NOT NULL,
  `student_par_address` text NOT NULL,
  `student_adm_date` date NOT NULL,
  `student_transport` varchar(30) NOT NULL,
  `student_residential` varchar(30) NOT NULL,
  `student_photo` varchar(150) NOT NULL,
  `student_nid_photo` varchar(150) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `father_phone` varchar(20) NOT NULL,
  `father_nid` varchar(50) NOT NULL,
  `father_nid_photo` varchar(150) NOT NULL,
  `father_occupation` varchar(50) NOT NULL,
  `father_office` text NOT NULL,
  `father_income` varchar(20) NOT NULL,
  `father_photo` varchar(150) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `mother_phone` varchar(20) NOT NULL,
  `mother_nid` varchar(150) NOT NULL,
  `mother_nid_photo` varchar(150) NOT NULL,
  `mother_occupation` varchar(30) NOT NULL,
  `mother_income` varchar(20) NOT NULL,
  `mother_office` text NOT NULL,
  `mother_photo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_serial`, `student_id`, `student_name`, `student_section`, `student_session`, `student_class`, `student_shift`, `student_roll`, `student_group`, `student_gender`, `student_dob`, `student_blood`, `student_religion`, `student_special_need`, `student_nid`, `student_nationality`, `student_phone`, `student_present_address`, `student_par_address`, `student_adm_date`, `student_transport`, `student_residential`, `student_photo`, `student_nid_photo`, `father_name`, `father_phone`, `father_nid`, `father_nid_photo`, `father_occupation`, `father_office`, `father_income`, `father_photo`, `mother_name`, `mother_phone`, `mother_nid`, `mother_nid_photo`, `mother_occupation`, `mother_income`, `mother_office`, `mother_photo`) VALUES
(1, 'S00001', 'Montasirul Alam', 'Boys', '2018', 'viii', 'Day', '1', 'Other', 'Male', '2006-05-01', 'B +ve', 'Islam', 'No', '123-232-232', 'Bangladeshi', 'No', 'Rahamatganja', 'Rahamatganja 2', '2019-07-16', 'No', 'No', '../student_photo/S00001.jpg', '../student_nid_photo/nid-S00001.png', 'Md Manjurul Islam', '01819881188', '22312-2321', '../student_guardian_nid/f-nid-S00001.jpg', 'Teacher', 'Anderkilla', '50000', '../student_guardian/f-S00001.jpg', 'Nargis Akter', '01919191919', '22332-1232', '../student_guardian_nid/m-nid-S00001.jpg', 'House Wife', '123', 'GEC', '../student_guardian/m-S00001.j'),
(2, 'S00002', 'Simanta Paul', 'Boys', '2018', 'viii', 'Day', '2', 'Other', 'Male', '2016-10-01', 'B +ve', 'Hindu', 'No', '12312312', 'Bangladeshi', '01521487880', 'fdsafas', 'fsdafasfd', '2019-07-17', 'No', 'No', '../student_photo/S00002.png', '../student_nid_photo/nid-S00002.png', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'S00003', 'Simanta Paul', 'Boys', '2018', 'ix', 'Day', '1', 'Science', 'Male', '1996-02-06', 'B +ve', 'Hindu', 'No', '321312', 'Bangladeshi', '01521-487880', 'dasd', 'sadsa', '2019-07-22', 'No', 'No', '../student_photo/S00003.png', '../student_nid_photo/nid-S00003.png', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'S00007', 'Simanta Paul', 'Girls', '2018', 'ix', 'Day', '1', 'Science', 'Male', '2019-07-08', 'O +ve', 'Islam', 'No', '12312312', 'Bangladeshi', '01812711248', 'dd', 'sadasd', '2019-07-22', 'No', 'No', '../student_photo/S00007.png', '../student_nid_photo/nid-S00007.png', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'S00008', 'Simanta Paul', 'Boys', '2018', 'ix', 'Day', '3', 'Science', 'Male', '2019-07-18', 'O -ve', 'Islam', 'No', '12312312', 'Bangladeshi', 'No', 'sadsa', 'sdasa', '2019-07-22', 'No', 'No', '../student_photo/S00008.png', '../student_nid_photo/nid-S00008.png', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
  `optional_type2` tinyint(4) NOT NULL DEFAULT '0',
  `religion` tinyint(4) NOT NULL DEFAULT '0',
  `elective` tinyint(4) NOT NULL DEFAULT '0',
  `science` tinyint(1) NOT NULL DEFAULT '0',
  `commerce` tinyint(1) NOT NULL DEFAULT '0',
  `arts` tinyint(1) NOT NULL DEFAULT '0',
  `compulsory` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_serial`, `subject_id`, `subject_name`, `subject_code`, `class_id`, `optional_type1`, `optional_type2`, `religion`, `elective`, `science`, `commerce`, `arts`, `compulsory`) VALUES
(1, '101_vi', 'Bangla First Paper', '101', 'vi', 0, 0, 0, 0, 0, 0, 0, 0),
(2, '101_vii', 'Bangla First Paper', '101', 'vii', 0, 0, 0, 0, 0, 0, 0, 0),
(3, '101_viii', 'Bangla First Paper', '101', 'viii', 0, 0, 0, 0, 0, 0, 0, 0),
(4, '101_ix', 'Bangla First Paper', '101', 'ix', 0, 0, 0, 0, 0, 0, 0, 0),
(5, '101_x', 'Bangla First Paper', '101', 'x', 0, 0, 0, 0, 0, 0, 0, 0),
(6, '102_vi', 'Bangla Second Paper', '102', 'vi', 0, 0, 0, 0, 0, 0, 0, 0),
(7, '102_vii', 'Bangla Second Paper', '102', 'vii', 0, 0, 0, 0, 0, 0, 0, 0),
(8, '102_viii', 'Bangla Second Paper', '102', 'viii', 0, 0, 0, 0, 0, 0, 0, 0),
(9, '102_ix', 'Bangla Second Paper', '102', 'ix', 0, 0, 0, 0, 0, 0, 0, 0),
(10, '102_x', 'Bangla Second Paper', '102', 'x', 0, 0, 0, 0, 0, 0, 0, 0),
(11, '107_vi', 'English First Paper', '107', 'vi', 0, 0, 0, 0, 0, 0, 0, 0),
(12, '107_vii', 'English First Paper', '107', 'vii', 0, 0, 0, 0, 0, 0, 0, 0),
(13, '107_viii', 'English First Paper', '107', 'viii', 0, 0, 0, 0, 0, 0, 0, 0),
(14, '107_ix', 'English First Paper', '107', 'ix', 0, 0, 0, 0, 0, 0, 0, 0),
(15, '107_x', 'English First Paper', '107', 'x', 0, 0, 0, 0, 0, 0, 0, 0),
(16, '108_vi', 'English Second Paper', '108', 'vi', 0, 0, 0, 0, 0, 0, 0, 0),
(17, '108_vii', 'English Second Paper', '108', 'vii', 0, 0, 0, 0, 0, 0, 0, 0),
(18, '108_viii', 'English Second Paper', '108', 'viii', 0, 0, 0, 0, 0, 0, 0, 0),
(19, '108_ix', 'English Second Paper', '108', 'ix', 0, 0, 0, 0, 0, 0, 0, 0),
(20, '108_x', 'English Second Paper', '108', 'x', 0, 0, 0, 0, 0, 0, 0, 0),
(21, '109_vi', 'Mathematics', '109', 'vi', 0, 0, 0, 0, 0, 0, 0, 0),
(22, '109_vii', 'Mathematics', '109', 'vii', 0, 0, 0, 0, 0, 0, 0, 0),
(23, '109_viii', 'Mathematics', '109', 'viii', 0, 0, 0, 0, 0, 0, 0, 0),
(24, '109_ix', 'Mathematics', '109', 'ix', 0, 0, 0, 0, 0, 0, 0, 0),
(25, '109_x', 'Mathematics', '109', 'x', 0, 0, 0, 0, 0, 0, 0, 0),
(26, '111_vi', 'Religious Studies Islam', '111', 'vi', 0, 0, 1, 0, 0, 0, 0, 0),
(27, '111_vii', 'Religious Studies Islam', '111', 'vii', 0, 0, 1, 0, 0, 0, 0, 0),
(28, '111_viii', 'Religious Studies Islam', '111', 'viii', 0, 0, 1, 0, 0, 0, 0, 0),
(29, '111_ix', 'Religious Studies Islam', '111', 'ix', 0, 0, 1, 0, 0, 0, 0, 0),
(30, '111_x', 'Religious Studies Islam', '111', 'x', 0, 0, 1, 0, 0, 0, 0, 0),
(31, '112_vi', 'Religious Studies Hindu', '112', 'vi', 0, 0, 1, 0, 0, 0, 0, 0),
(32, '112_vii', 'Religious Studies Hindu', '112', 'vii', 0, 0, 1, 0, 0, 0, 0, 0),
(33, '112_viii', 'Religious Studies Hindu', '112', 'viii', 0, 0, 1, 0, 0, 0, 0, 0),
(34, '112_ix', 'Religious Studies Hindu', '112', 'ix', 0, 0, 1, 0, 0, 0, 0, 0),
(35, '112_x', 'Religious Studies Hindu', '112', 'x', 0, 0, 1, 0, 0, 0, 0, 0),
(36, '113_vi', 'Religious Studies Buddha', '113', 'vi', 0, 0, 1, 0, 0, 0, 0, 0),
(37, '113_vii', 'Religious Studies Buddha', '113', 'vii', 0, 0, 1, 0, 0, 0, 0, 0),
(38, '113_viii', 'Religious Studies Buddha', '113', 'viii', 0, 0, 1, 0, 0, 0, 0, 0),
(39, '113_ix', 'Religious Studies Buddha', '113', 'ix', 0, 0, 1, 0, 0, 0, 0, 0),
(40, '113_x', 'Religious Studies Buddha', '113', 'x', 0, 0, 1, 0, 0, 0, 0, 0),
(41, '114_vi', 'Religious Studies Christian', '114', 'vi', 0, 0, 1, 0, 0, 0, 0, 0),
(42, '114_vii', 'Religious Studies Christian', '114', 'vii', 0, 0, 1, 0, 0, 0, 0, 0),
(43, '114_viii', 'Religious Studies Christian', '114', 'viii', 0, 0, 1, 0, 0, 0, 0, 0),
(44, '114_ix', 'Religious Studies Christian', '114', 'ix', 0, 0, 1, 0, 0, 0, 0, 0),
(45, '114_x', 'Religious Studies Christian', '114', 'x', 0, 0, 1, 0, 0, 0, 0, 0),
(46, '154_vi', 'Information & Communication Technology', '154', 'vi', 0, 0, 0, 0, 0, 0, 0, 0),
(47, '154_vii', 'Information & Communication Technology', '154', 'vii', 0, 0, 0, 0, 0, 0, 0, 0),
(48, '154_viii', 'Information & Communication Technology', '154', 'viii', 0, 0, 0, 0, 0, 0, 0, 0),
(49, '154_ix', 'Information & Communication Technology', '154', 'ix', 0, 0, 0, 0, 0, 0, 0, 0),
(50, '154_x', 'Information & Communication Technology', '154', 'x', 0, 0, 0, 0, 0, 0, 0, 0),
(51, '147_vi', 'Physical  Education Health  & Sports', '147', 'vi', 0, 0, 0, 0, 0, 0, 0, 0),
(52, '147_vii', 'Physical  Education Health  & Sports', '147', 'vii', 0, 0, 0, 0, 0, 0, 0, 0),
(53, '147_viii', 'Physical  Education Health  & Sports', '147', 'viii', 0, 0, 0, 0, 0, 0, 0, 0),
(54, '147_ix', 'Physical  Education Health  & Sports', '147', 'ix', 0, 0, 0, 0, 0, 0, 0, 0),
(55, '147_x', 'Physical  Education Health  & Sports', '147', 'x', 0, 0, 0, 0, 0, 0, 0, 0),
(56, '155_vi', 'Work & Life Oriented Education', '155', 'vi', 0, 0, 0, 0, 0, 0, 0, 0),
(57, '155_vii', 'Work & Life Oriented Education', '155', 'vii', 0, 0, 0, 0, 0, 0, 0, 0),
(58, '155_viii', 'Work & Life Oriented Education', '155', 'viii', 0, 0, 0, 0, 0, 0, 0, 0),
(59, '127_vi', 'Science', '127', 'vi', 0, 0, 0, 0, 0, 0, 0, 0),
(60, '127_vii', 'Science', '127', 'vii', 0, 0, 0, 0, 0, 0, 0, 0),
(61, '127_viii', 'Science', '127', 'viii', 0, 0, 0, 0, 0, 0, 0, 0),
(62, '150_vi', 'Bangladesh & Global Studies', '150', 'vi', 0, 0, 0, 0, 0, 0, 0, 0),
(63, '150_vii', 'Bangladesh & Global Studies', '150', 'vii', 0, 0, 0, 0, 0, 0, 0, 0),
(64, '150_viii', 'Bangladesh & Global Studies', '150', 'viii', 0, 0, 0, 0, 0, 0, 0, 0),
(65, '134_vi', 'Agricultural Science', '134', 'vi', 1, 0, 0, 0, 0, 0, 0, 0),
(66, '134_vii', 'Agricultural Science', '134', 'vii', 1, 0, 0, 0, 0, 0, 0, 0),
(67, '134_viii', 'Agricultural Science', '134', 'viii', 1, 0, 0, 0, 0, 0, 0, 0),
(68, '151_vi', 'Home Science', '151', 'vi', 1, 0, 0, 0, 0, 0, 0, 0),
(69, '151_vii', 'Home Science', '151', 'vii', 1, 0, 0, 0, 0, 0, 0, 0),
(70, '151_viii', 'Home Science', '151', 'viii', 1, 0, 0, 0, 0, 0, 0, 0),
(71, '150_ix', 'Bangladesh & Global Studies', '150', 'ix', 0, 0, 0, 1, 1, 0, 0, 0),
(72, '150_x', 'Bangladesh & Global Studies', '150', 'x', 0, 0, 0, 1, 1, 0, 0, 0),
(73, '127_ix', 'Science', '127', 'ix', 0, 0, 0, 1, 0, 1, 1, 0),
(74, '127_x', 'Science', '127', 'x', 0, 0, 0, 1, 0, 1, 1, 0),
(75, '136_ix', 'Physics', '136', 'ix', 0, 0, 0, 1, 1, 0, 0, 0),
(76, '136_x', 'Physics', '136', 'x', 0, 0, 0, 1, 1, 0, 0, 0),
(77, '137_ix', 'Chemistry', '137', 'ix', 0, 0, 0, 1, 1, 0, 0, 0),
(78, '137_x', 'Chemistry', '137', 'x', 0, 0, 0, 1, 1, 0, 0, 0),
(79, '138_ix', 'Biology', '138', 'ix', 0, 1, 0, 1, 1, 0, 0, 1),
(80, '138_x', 'Biology', '138', 'x', 0, 1, 0, 1, 1, 0, 0, 1),
(81, '126_ix', 'Higher Mathematics', '126', 'ix', 0, 1, 0, 1, 1, 0, 0, 1),
(82, '126_x', 'Higher Mathematics', '126', 'x', 0, 1, 0, 1, 1, 0, 0, 1),
(83, '156_ix', 'Career Education', '156', 'ix', 0, 0, 0, 0, 0, 0, 0, 0),
(84, '156_x', 'Career Education', '156', 'x', 0, 0, 0, 0, 0, 0, 0, 0),
(85, '134_ix', 'Agricultural Science', '134', 'ix', 0, 1, 0, 0, 1, 1, 0, 0),
(86, '134_x', 'Agricultural Science', '134', 'x', 0, 1, 0, 0, 1, 1, 0, 0),
(87, '146_ix', 'Accounting', '146', 'ix', 0, 0, 0, 1, 0, 1, 0, 0),
(88, '146_x', 'Accounting', '146', 'x', 0, 0, 0, 1, 0, 1, 0, 0),
(89, '143_ix', 'Business Entrepreneurship', '143', 'ix', 0, 0, 0, 1, 0, 1, 0, 0),
(90, '143_x', 'Business Entrepreneurship', '143', 'x', 0, 0, 0, 1, 0, 1, 0, 0),
(91, '152_ix', 'Finance & Banking', '152', 'ix', 0, 1, 0, 1, 0, 1, 0, 0),
(92, '152_x', 'Finance & Banking', '152', 'x', 0, 1, 0, 1, 0, 1, 0, 0),
(93, '153_ix', 'History of Bangladesh and World Civilization', '153', 'ix', 0, 0, 0, 1, 0, 0, 1, 0),
(94, '153_x', 'History of Bangladesh and World Civilization', '153', 'x', 0, 0, 0, 1, 0, 0, 1, 0),
(95, '140_ix', 'Civics & Citizenship', '140', 'ix', 0, 0, 0, 1, 0, 0, 1, 0),
(96, '140_x', 'Civics & Citizenship', '140', 'x', 0, 0, 0, 1, 0, 0, 1, 0),
(97, '110_ix', 'Geography & Environment ', '110', 'ix', 0, 1, 0, 1, 0, 0, 1, 0),
(98, '110_x', 'Geography & Environment', '110', 'x', 0, 1, 0, 1, 0, 0, 1, 0),
(99, '141_ix', 'Economics', '141', 'ix', 0, 1, 0, 1, 0, 0, 1, 0),
(100, '141_x', 'Economics', '141', 'x', 0, 1, 0, 1, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject_student`
--

CREATE TABLE `subject_student` (
  `subject_student_serial` int(50) NOT NULL,
  `subject_student_id` varchar(10) NOT NULL,
  `subject_student_code` varchar(5) NOT NULL,
  `class_id` varchar(5) NOT NULL,
  `session_name` varchar(5) NOT NULL,
  `religion` tinyint(1) NOT NULL DEFAULT '0',
  `elective` tinyint(1) NOT NULL DEFAULT '0',
  `optional_type1` tinyint(1) NOT NULL DEFAULT '0',
  `optional_type2` tinyint(1) NOT NULL DEFAULT '0',
  `science` tinyint(1) NOT NULL DEFAULT '0',
  `commerce` tinyint(1) NOT NULL DEFAULT '0',
  `arts` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_student`
--

INSERT INTO `subject_student` (`subject_student_serial`, `subject_student_id`, `subject_student_code`, `class_id`, `session_name`, `religion`, `elective`, `optional_type1`, `optional_type2`, `science`, `commerce`, `arts`) VALUES
(1, 'S00001', '111', 'viii', '2018', 1, 0, 0, 0, 0, 0, 0),
(2, 'S00001', '134', 'viii', '2018', 0, 0, 1, 0, 0, 0, 0),
(13, 'S00001', '101', 'viii', '2018', 0, 0, 0, 0, 0, 0, 0),
(14, 'S00001', '102', 'viii', '2018', 0, 0, 0, 0, 0, 0, 0),
(15, 'S00001', '107', 'viii', '2018', 0, 0, 0, 0, 0, 0, 0),
(16, 'S00001', '108', 'viii', '2018', 0, 0, 0, 0, 0, 0, 0),
(17, 'S00001', '109', 'viii', '2018', 0, 0, 0, 0, 0, 0, 0),
(18, 'S00001', '154', 'viii', '2018', 0, 0, 0, 0, 0, 0, 0),
(19, 'S00001', '147', 'viii', '2018', 0, 0, 0, 0, 0, 0, 0),
(20, 'S00001', '155', 'viii', '2018', 0, 0, 0, 0, 0, 0, 0),
(21, 'S00001', '127', 'viii', '2018', 0, 0, 0, 0, 0, 0, 0),
(22, 'S00001', '150', 'viii', '2018', 0, 0, 0, 0, 0, 0, 0),
(23, 'S00002', '101', 'viii', '2018', 0, 0, 0, 0, 0, 0, 0),
(24, 'S00002', '102', 'viii', '2018', 0, 0, 0, 0, 0, 0, 0),
(25, 'S00002', '107', 'viii', '2018', 0, 0, 0, 0, 0, 0, 0),
(26, 'S00002', '108', 'viii', '2018', 0, 0, 0, 0, 0, 0, 0),
(27, 'S00002', '109', 'viii', '2018', 0, 0, 0, 0, 0, 0, 0),
(28, 'S00002', '154', 'viii', '2018', 0, 0, 0, 0, 0, 0, 0),
(29, 'S00002', '147', 'viii', '2018', 0, 0, 0, 0, 0, 0, 0),
(30, 'S00002', '155', 'viii', '2018', 0, 0, 0, 0, 0, 0, 0),
(31, 'S00002', '127', 'viii', '2018', 0, 0, 0, 0, 0, 0, 0),
(32, 'S00002', '150', 'viii', '2018', 0, 0, 0, 0, 0, 0, 0),
(33, 'S00002', '112', 'viii', '2018', 1, 0, 0, 0, 0, 0, 0),
(34, 'S00002', '134', 'viii', '2018', 0, 0, 1, 0, 0, 0, 0),
(66, 'S00003', '101', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(67, 'S00003', '102', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(68, 'S00003', '107', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(69, 'S00003', '108', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(70, 'S00003', '109', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(71, 'S00003', '154', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(72, 'S00003', '147', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(73, 'S00003', '156', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(74, 'S00003', '112', 'ix', '2018', 1, 0, 0, 0, 0, 0, 0),
(75, 'S00003', '126', 'ix', '2018', 0, 1, 0, 0, 1, 0, 0),
(76, 'S00003', '138', 'ix', '2018', 0, 0, 0, 1, 1, 0, 0),
(77, 'S00007', '101', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(78, 'S00007', '102', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(79, 'S00007', '107', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(80, 'S00007', '108', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(81, 'S00007', '109', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(82, 'S00007', '154', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(83, 'S00007', '147', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(84, 'S00007', '156', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(85, 'S00007', '111', 'ix', '2018', 1, 0, 0, 0, 0, 0, 0),
(86, 'S00007', '126', 'ix', '2018', 0, 1, 0, 0, 1, 0, 0),
(87, 'S00007', '138', 'ix', '2018', 0, 0, 0, 1, 1, 0, 0),
(88, 'S00008', '101', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(89, 'S00008', '102', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(90, 'S00008', '107', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(91, 'S00008', '108', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(92, 'S00008', '109', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(93, 'S00008', '154', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(94, 'S00008', '147', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(95, 'S00008', '156', 'ix', '2018', 0, 0, 0, 0, 0, 0, 0),
(96, 'S00008', '111', 'ix', '2018', 1, 0, 0, 0, 0, 0, 0),
(97, 'S00008', '150', 'ix', '2018', 0, 1, 0, 0, 1, 0, 0),
(98, 'S00008', '136', 'ix', '2018', 0, 1, 0, 0, 1, 0, 0),
(99, 'S00008', '137', 'ix', '2018', 0, 1, 0, 0, 1, 0, 0),
(100, 'S00008', '126', 'ix', '2018', 0, 1, 0, 0, 1, 0, 0),
(101, 'S00008', '138', 'ix', '2018', 0, 0, 0, 1, 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_serial`),
  ADD UNIQUE KEY `class_id` (`class_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_serial`);

--
-- Indexes for table `institution_details`
--
ALTER TABLE `institution_details`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_serial`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_serial`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_serial`),
  ADD UNIQUE KEY `subject_id` (`subject_id`);

--
-- Indexes for table `subject_student`
--
ALTER TABLE `subject_student`
  ADD PRIMARY KEY (`subject_student_serial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_serial` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_serial` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `institution_details`
--
ALTER TABLE `institution_details`
  MODIFY `serial` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `serial` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `session_serial` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_serial` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_serial` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `subject_student`
--
ALTER TABLE `subject_student`
  MODIFY `subject_student_serial` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
