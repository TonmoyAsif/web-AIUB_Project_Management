-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2018 at 10:00 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty_group_details`
--

CREATE TABLE `faculty_group_details` (
  `group_number` int(50) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `project_title` varchar(200) NOT NULL,
  `project_details` varchar(1000) NOT NULL,
  `number_of_member` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_group_joining_details`
--

CREATE TABLE `faculty_group_joining_details` (
  `faculty_user` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `project_title` varchar(200) NOT NULL,
  `project_details` varchar(1000) NOT NULL,
  `number_of_member` int(50) NOT NULL,
  `student_user` varchar(100) NOT NULL,
  `serial` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_group_joining_details`
--

INSERT INTO `faculty_group_joining_details` (`faculty_user`, `semester`, `subject`, `section`, `project_title`, `project_details`, `number_of_member`, `student_user`, `serial`) VALUES
('1111', 'spring17-18', 'pl1', 'A', 'AIUB Project Management', 'Details Here', 4, '1212', 1),
('1111', 'spring17-18', 'pl1', 'A', 'AIUB Shop', 'Details Here', 3, '1313', 2),
('1111', 'spring17-18', 'pl1', 'A', 'Fish Management', 'Details Here', 4, '1414', 3),
('1111', 'spring17-18', 'pl1', 'A', 'Caffee Shop', 'Details Here', 3, '1515', 5);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_group_joining_students`
--

CREATE TABLE `faculty_group_joining_students` (
  `faculty_user` varchar(100) NOT NULL,
  `student_user` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_group_joining_students`
--

INSERT INTO `faculty_group_joining_students` (`faculty_user`, `student_user`, `semester`, `subject`, `section`, `s_name`, `s_id`) VALUES
('1111', '1212', 'spring17-18', 'pl1', 'A', 'Ahamed', '15-76938-3'),
('1111', '1212', 'spring17-18', 'pl1', 'A', 'Shovon', '15-76892-3'),
('1111', '1212', 'spring17-18', 'pl1', 'A', 'Nowaj', '15-45458-3'),
('1111', '1313', 'spring17-18', 'pl1', 'A', 'Aslam', '15-020248-3'),
('1111', '1313', 'spring17-18', 'pl1', 'A', 'Abid', '16-020248-3');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_group_students`
--

CREATE TABLE `faculty_group_students` (
  `group_number` int(50) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_id` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_table`
--

CREATE TABLE `faculty_table` (
  `serial` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_table`
--

INSERT INTO `faculty_table` (`serial`, `username`, `password`, `email`, `name`, `department`) VALUES
(2, '1111', '1111', '1111@gmail.com', '1111', 'CSE'),
(3, '2222', '2222', '2222@gmail.com', '2222', 'CSE'),
(4, 'tonmoy', '1234', 'tonmoy.asif@gmail.com', 'tonmoy', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `group_list_table`
--

CREATE TABLE `group_list_table` (
  `serial` int(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `section` varchar(50) NOT NULL,
  `group_number` int(100) NOT NULL,
  `project_title` varchar(200) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `no_of_member` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_list_table`
--

INSERT INTO `group_list_table` (`serial`, `user`, `semester`, `subject`, `section`, `group_number`, `project_title`, `description`, `no_of_member`) VALUES
(6, '1111', 'spring17-18', 'pl1', 'A', 1, 'APM', 'Description Here', 0),
(7, '1111', 'spring17-18', 'pl1', 'A', 2, 'AP management1', 'description', 0);

-- --------------------------------------------------------

--
-- Table structure for table `group_student_table`
--

CREATE TABLE `group_student_table` (
  `serial` int(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `semester` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `section` varchar(100) NOT NULL,
  `group_number` int(100) NOT NULL,
  `student_name` varchar(150) NOT NULL,
  `student_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_student_table`
--

INSERT INTO `group_student_table` (`serial`, `user`, `semester`, `subject`, `section`, `group_number`, `student_name`, `student_id`) VALUES
(3, '1111', 'spring17-18', 'pl1', 'A', 1, 'Tonmoy', '15-30593-3'),
(4, '1111', 'spring17-18', 'pl1', 'A', 1, 'Asif', '15-30693-3'),
(5, '1111', 'spring17-18', 'pl1', 'A', 2, 'Tonmoy', '15-30593-3'),
(6, '1111', 'spring17-18', 'pl1', 'A', 2, 'Asif', '15-30693-3');

-- --------------------------------------------------------

--
-- Table structure for table `section_join_table`
--

CREATE TABLE `section_join_table` (
  `faculty` varchar(150) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `section` varchar(50) NOT NULL,
  `student_name` varchar(150) NOT NULL,
  `student_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section_join_table`
--

INSERT INTO `section_join_table` (`faculty`, `semester`, `subject`, `section`, `student_name`, `student_id`) VALUES
('1111', 'spring17-18', 'pl2', 'B', 'Tripto', '16-5976-5'),
('1111', 'spring17-18', 'pl1', 'B', 'Rahman', '16-5566-5'),
('1111', 'spring17-18', 'pl1', 'A', 'Zamann', '13-5976-4');

-- --------------------------------------------------------

--
-- Table structure for table `section_table`
--

CREATE TABLE `section_table` (
  `serial` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `section_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section_table`
--

INSERT INTO `section_table` (`serial`, `username`, `subject`, `semester`, `section_name`, `section_link`) VALUES
(13, '1111', 'pl1', 'spring17-18', 'A', 'APM+t1111O+npl1M+ospring17-18y+aAS+if'),
(14, '1111', 'pl1', 'spring17-18', 'B', 'APM+t1111O+npl1M+ospring17-18y+aBS+if'),
(15, '1111', 'pl1', 'spring17-18', 'C', 'APM+t1111O+npl1M+ospring17-18y+aCS+if'),
(17, '1111', 'pl2', 'fall17-18', 'A', 'APM+t1111O+npl2M+ofall17-18y+aAS+if'),
(20, '1111', 'pl2', 'fall17-18', 'D', 'APM+t1111O+npl2M+ofall17-18y+aDS+if'),
(21, '1111', 'pl1', '2017-2018, Spring', 'A', 'APM+t1111O+npl1M+o2017-2018, Springy+aAS+if'),
(23, '1111', 'pl2', 'spring17-18', 'C', 'APM+t1111O+npl2M+ospring17-18y+aCS+if'),
(24, '1111', 'pl1', 'spring17-18', 'X', 'APM+t1111O+npl1M+ospring17-18y+aXS+if'),
(25, '1111', 'pl1', 'spring17-18', 'V', 'APM+t1111O+npl1M+ospring17-18y+aVS+if'),
(26, '1111', 'pl1', 'spring17-18', 'M', 'APM+t1111O+npl1M+ospring17-18y+aMS+if');

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `serial` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `section` varchar(50) NOT NULL,
  `department` varchar(100) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `inGroup` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`serial`, `username`, `subject`, `semester`, `section`, `department`, `student_name`, `student_id`, `inGroup`) VALUES
(2, '1111', 'pl1', 'spring17-18', 'A', 'CSE', 'Rony', '15-30570-3', 'No'),
(3, '1111', 'pl1', 'spring17-18', 'A', 'CSE', 'Karno', '15-30500-3', 'No'),
(6, '1111', 'pl2', 'spring17-18', 'B', 'CSE', 'Borno', '15-30090-3', 'No'),
(8, '1111', 'pl1', 'spring17-18', 'A', 'CSE', 'Rohini', '15-37307-3', 'No'),
(9, '1111', 'pl1', 'spring17-18', 'A', 'CSE', 'Atik', '13-30539-3', 'No'),
(11, '1111', 'pl1', 'spring17-18', 'A', 'CSE', 'Sahariar', '13-32539-5', 'No'),
(12, '1111', 'pl1', 'spring17-18', 'A', 'CSE', 'Hello', '1-56938-3', 'No'),
(20, '1111', 'pl1', 'spring17-18', 'A', 'CSE', 'Rohit', '15-94682-3', 'No'),
(21, '1111', 'pl1', 'spring17-18', 'A', 'CS', 'Shakil', '16-86154-9', 'No'),
(22, '1111', 'pl1', 'spring17-18', 'A', 'CSSE', 'Sukhita', '13-46494-9', 'No'),
(23, '1111', 'pl1', 'spring17-18', 'A', 'CSE', 'Sorgo', '17-49941-9', 'No'),
(24, '1111', '', '', '', 'CSE', '', '<br />\n<b>Notice</b>:  Undefined index: student_id', 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty_group_details`
--
ALTER TABLE `faculty_group_details`
  ADD PRIMARY KEY (`group_number`);

--
-- Indexes for table `faculty_group_joining_details`
--
ALTER TABLE `faculty_group_joining_details`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `faculty_group_students`
--
ALTER TABLE `faculty_group_students`
  ADD PRIMARY KEY (`group_number`);

--
-- Indexes for table `faculty_table`
--
ALTER TABLE `faculty_table`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `group_list_table`
--
ALTER TABLE `group_list_table`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `group_student_table`
--
ALTER TABLE `group_student_table`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `section_table`
--
ALTER TABLE `section_table`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`serial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty_group_details`
--
ALTER TABLE `faculty_group_details`
  MODIFY `group_number` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty_group_joining_details`
--
ALTER TABLE `faculty_group_joining_details`
  MODIFY `serial` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculty_group_students`
--
ALTER TABLE `faculty_group_students`
  MODIFY `group_number` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty_table`
--
ALTER TABLE `faculty_table`
  MODIFY `serial` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `group_list_table`
--
ALTER TABLE `group_list_table`
  MODIFY `serial` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `group_student_table`
--
ALTER TABLE `group_student_table`
  MODIFY `serial` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `section_table`
--
ALTER TABLE `section_table`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `student_table`
--
ALTER TABLE `student_table`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
