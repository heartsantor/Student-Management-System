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
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_serial`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_serial` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
