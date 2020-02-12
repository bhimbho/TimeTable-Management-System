-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 12, 2020 at 05:07 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `time_table`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_date_created` date NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_date_created`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `alloc_slots`
--

DROP TABLE IF EXISTS `alloc_slots`;
CREATE TABLE IF NOT EXISTS `alloc_slots` (
  `alloc_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `time_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `date_alloc_created` date NOT NULL,
  PRIMARY KEY (`alloc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alloc_slots`
--

INSERT INTO `alloc_slots` (`alloc_id`, `course_id`, `room_id`, `day_id`, `time_id`, `semester_id`, `session_id`, `date_alloc_created`) VALUES
(1, 2, 6, 1, 1, 1, 4, '2020-02-04'),
(10, 5, 7, 4, 3, 1, 4, '2020-02-08'),
(9, 2, 6, 1, 2, 1, 4, '2020-02-06');

-- --------------------------------------------------------

--
-- Table structure for table `allowed`
--

DROP TABLE IF EXISTS `allowed`;
CREATE TABLE IF NOT EXISTS `allowed` (
  `course_id` char(10) NOT NULL,
  `batch_name` varchar(30) NOT NULL,
  `batch_dept` char(5) NOT NULL,
  PRIMARY KEY (`course_id`,`batch_name`,`batch_dept`),
  KEY `course_id` (`course_id`),
  KEY `batch_name` (`batch_name`,`batch_dept`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assigned_course`
--

DROP TABLE IF EXISTS `assigned_course`;
CREATE TABLE IF NOT EXISTS `assigned_course` (
  `assigned_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `date_assigned` date NOT NULL,
  PRIMARY KEY (`assigned_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigned_course`
--

INSERT INTO `assigned_course` (`assigned_id`, `course_id`, `lecturer_id`, `date_assigned`) VALUES
(1, 2, 1, '2020-02-02'),
(2, 3, 2, '2020-02-06'),
(3, 4, 4, '2020-02-06'),
(4, 5, 5, '2020-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

DROP TABLE IF EXISTS `batches`;
CREATE TABLE IF NOT EXISTS `batches` (
  `batch_name` varchar(30) NOT NULL,
  `batch_dept` char(5) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`batch_name`,`batch_dept`),
  KEY `batches_department` (`batch_dept`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `Name` varchar(30) NOT NULL,
  `value` varchar(30) NOT NULL,
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_title` varchar(255) NOT NULL,
  `course_unit` varchar(255) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `date_course_created` date NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_title`, `course_unit`, `dept_id`, `level_id`, `date_course_created`) VALUES
(1, 'Introduction to Computer', 'COM101', 1, 1, '2020-02-02'),
(2, 'Introduction to Programming', 'Com 113', 1, 1, '2020-02-02'),
(3, 'Algebra Mathematics', 'MTH101', 1, 1, '2020-02-06'),
(4, 'ElectricTurbine', 'Mec101', 4, 1, '2020-02-06'),
(5, 'Introduction to Power', 'Pow101', 4, 1, '2020-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` char(10) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `fac_id` char(25) NOT NULL,
  `allow_conflict` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`course_id`),
  KEY `fac_id` (`fac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

DROP TABLE IF EXISTS `day`;
CREATE TABLE IF NOT EXISTS `day` (
  `day_id` int(11) NOT NULL AUTO_INCREMENT,
  `day_name` varchar(13) NOT NULL,
  PRIMARY KEY (`day_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`day_id`, `day_name`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_title` varchar(255) NOT NULL,
  `date_dept_created` date NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_title`, `date_dept_created`) VALUES
(1, 'Computer Science', '2020-02-02'),
(2, 'Computer Engineering', '2020-02-02'),
(3, 'Math and Statistics', '2020-02-02'),
(4, 'Electrical Engineering', '2020-02-02'),
(5, 'Business Administration', '2020-02-02'),
(6, 'Marketing', '2020-02-02'),
(7, 'Hospitality Mgt', '2020-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `depts`
--

DROP TABLE IF EXISTS `depts`;
CREATE TABLE IF NOT EXISTS `depts` (
  `dept_code` char(5) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  PRIMARY KEY (`dept_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `uName` char(25) NOT NULL,
  `fac_name` varchar(50) NOT NULL,
  `pswd` char(64) NOT NULL,
  `level` enum('dean','hod','faculty','') NOT NULL DEFAULT 'faculty',
  `dept_code` char(5) NOT NULL,
  `dateRegd` char(25) NOT NULL,
  PRIMARY KEY (`uName`),
  KEY `dept_code` (`dept_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

DROP TABLE IF EXISTS `lecturer`;
CREATE TABLE IF NOT EXISTS `lecturer` (
  `lecturer_id` int(11) NOT NULL AUTO_INCREMENT,
  `lecturer_firstname` varchar(255) NOT NULL,
  `lecturer_lastname` varchar(255) NOT NULL,
  `lecturer_username` varchar(199) NOT NULL,
  `lecturer_password` varchar(199) NOT NULL,
  `lecturer_email` varchar(199) NOT NULL,
  `lecturer_phone` varchar(199) NOT NULL,
  `lecturer_dept` int(11) NOT NULL,
  `lecturer_level` varchar(255) NOT NULL,
  `lecturer_type` int(11) NOT NULL DEFAULT '1',
  `lecturer_date_added` date NOT NULL,
  PRIMARY KEY (`lecturer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`lecturer_id`, `lecturer_firstname`, `lecturer_lastname`, `lecturer_username`, `lecturer_password`, `lecturer_email`, `lecturer_phone`, `lecturer_dept`, `lecturer_level`, `lecturer_type`, `lecturer_date_added`) VALUES
(1, 'Soneye', 'Oluwasina', 'bhimbho', 'c58caa33fb2d2a442156fed05bc37f6f', 'advancoplanet@gmail.com', '08141656572', 1, 'Lecture II', 1, '2020-02-02'),
(2, 'Dosunmu', 'Afeez', 'Afeez', '827ccb0eea8a706c4c34a16891f84e7b', 'afeez@gmail.com', '91616165', 2, 'Lecture II', 1, '2020-02-02'),
(3, 'Amode', 'Habeeb', 'amode', '827ccb0eea8a706c4c34a16891f84e7b', 'amode@gmail.com', '51616', 1, 'Lecture I', 1, '2020-02-02'),
(4, 'Adebayo', 'kazeem', 'kazeem', '827ccb0eea8a706c4c34a16891f84e7b', 'kazeem@gmail.com', '89808997', 4, 'Lecture I', 1, '2020-02-06'),
(5, 'Soneye', 'Oluwasina', 'lecturer1', '827ccb0eea8a706c4c34a16891f84e7b', 'advancoplanet@gmail.com', '08141656572', 4, 'Lecture I', 1, '2020-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

DROP TABLE IF EXISTS `level`;
CREATE TABLE IF NOT EXISTS `level` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(150) NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level`) VALUES
(1, 'ND I'),
(2, 'ND II'),
(3, 'HND I'),
(4, 'HND II');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_title` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_title`, `capacity`) VALUES
(1, 'BA I', 200),
(2, 'BA II', 200),
(3, 'BA III', 200),
(4, 'BB I', 200),
(5, 'BB IIII', 200),
(6, 'BB II', 200),
(7, 'Multimedia Hall', 300);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

DROP TABLE IF EXISTS `semester`;
CREATE TABLE IF NOT EXISTS `semester` (
  `semester_id` int(11) NOT NULL AUTO_INCREMENT,
  `semester_title` varchar(100) NOT NULL,
  PRIMARY KEY (`semester_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester_title`) VALUES
(1, '1st'),
(2, '2nd'),
(3, '3rd');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_year` varchar(255) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `session_year`) VALUES
(1, '2017/2018'),
(2, '2018/2019'),
(3, '2019/2020'),
(4, '2020/2021');

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

DROP TABLE IF EXISTS `slots`;
CREATE TABLE IF NOT EXISTS `slots` (
  `table_name` varchar(30) NOT NULL,
  `day` int(1) UNSIGNED NOT NULL,
  `slot_num` int(2) UNSIGNED NOT NULL,
  `state` enum('active','disabled') NOT NULL,
  PRIMARY KEY (`table_name`,`day`,`slot_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slot_allocs`
--

DROP TABLE IF EXISTS `slot_allocs`;
CREATE TABLE IF NOT EXISTS `slot_allocs` (
  `table_name` varchar(30) NOT NULL,
  `day` int(1) UNSIGNED NOT NULL,
  `slot_num` int(2) UNSIGNED NOT NULL,
  `room` varchar(25) NOT NULL,
  `course_id` char(10) NOT NULL,
  PRIMARY KEY (`table_name`,`day`,`slot_num`,`room`),
  KEY `fk_course_id` (`course_id`),
  KEY `fk_room` (`room`),
  KEY `fk_slot` (`day`,`slot_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_firstname` varchar(250) NOT NULL,
  `student_lastname` varchar(250) NOT NULL,
  `student_email` varchar(200) NOT NULL,
  `student_phone` varchar(100) NOT NULL,
  `student_matricno` varchar(150) NOT NULL,
  `student_password` varchar(150) NOT NULL,
  `student_dept_id` int(11) NOT NULL,
  `student_type` int(11) NOT NULL DEFAULT '0',
  `date_student_created` varchar(150) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_firstname`, `student_lastname`, `student_email`, `student_phone`, `student_matricno`, `student_password`, `student_dept_id`, `student_type`, `date_student_created`) VALUES
(1, 'advancoplanet@gmail.com', 'Oluwasina', 'advancoplanet@gmail.com', '08141656572', 'a', '0cc175b9c0f1b6a831c399e269772661', 2, 0, '2020-02-08'),
(2, 'advancoplanet@gmail.com', 'Oluwasina', 'advancoplanet@gmail.com', '08141656572', 'a', '0cc175b9c0f1b6a831c399e269772661', 2, 0, '2020-02-08'),
(3, 'Soneye', 'Oluwasina', 'advancoplanet@gmail.com', '08141656572', 'a', '0cc175b9c0f1b6a831c399e269772661', 2, 0, '2020-02-08'),
(4, 'Soneye', 'Oluwasina', 'advancoplanet@gmail.com', '08141656572', 'a', '0cc175b9c0f1b6a831c399e269772661', 1, 0, '2020-02-08'),
(5, 'Soneye', 'Oluwasina', 'advancoplanet@gmail.com', '08141656572', 'a', '0cc175b9c0f1b6a831c399e269772661', 1, 0, '2020-02-08'),
(6, 'b', 'b', 'boluxmoyo@gmail.com', '9823098230', 'b', 'cf0c8ebc76173fedee762887c8de384e', 4, 1, '2020-02-08'),
(7, 'Soneye', 'Oluwasina', 'advancoplanet@gmail.com', '08141656572', 'bb', '21ad0bd836b90d08f4cf640b4c298e7c', 2, 0, '2020-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

DROP TABLE IF EXISTS `time`;
CREATE TABLE IF NOT EXISTS `time` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` varchar(150) NOT NULL,
  `end_time` varchar(150) NOT NULL,
  `hours` int(11) NOT NULL,
  `time_added_date` date NOT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`time_id`, `start_time`, `end_time`, `hours`, `time_added_date`) VALUES
(1, '08:00', '10:00', 2, '2020-02-02'),
(2, '10:00', '12:00', 2, '2020-02-02'),
(3, '12:00', '14:00', 2, '2020-02-02'),
(4, '14:00', '16:00', 2, '2020-02-06'),
(5, '16:00', '18:00', 2, '2020-02-06'),
(6, '18:00', '20:00', 2, '2020-02-06');

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

DROP TABLE IF EXISTS `timetables`;
CREATE TABLE IF NOT EXISTS `timetables` (
  `table_name` varchar(30) NOT NULL,
  `days` int(11) NOT NULL DEFAULT '5',
  `slots` int(11) NOT NULL DEFAULT '0',
  `duration` int(11) NOT NULL DEFAULT '90',
  `start_hr` char(2) NOT NULL DEFAULT '08',
  `start_min` char(2) NOT NULL DEFAULT '30',
  `start_mer` enum('AM','PM') NOT NULL DEFAULT 'AM',
  `allowConflicts` tinyint(1) NOT NULL DEFAULT '0',
  `frozen` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

DROP TABLE IF EXISTS `venue`;
CREATE TABLE IF NOT EXISTS `venue` (
  `venue_id` int(11) NOT NULL AUTO_INCREMENT,
  `venue_title` varchar(255) NOT NULL,
  `venue_code` varchar(255) NOT NULL,
  `date_venue_created` date NOT NULL,
  PRIMARY KEY (`venue_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allowed`
--
ALTER TABLE `allowed`
  ADD CONSTRAINT `batch` FOREIGN KEY (`batch_name`,`batch_dept`) REFERENCES `batches` (`batch_name`, `batch_dept`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `batches`
--
ALTER TABLE `batches`
  ADD CONSTRAINT `batches_department` FOREIGN KEY (`batch_dept`) REFERENCES `depts` (`dept_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`fac_id`) REFERENCES `faculty` (`uName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`dept_code`) REFERENCES `depts` (`dept_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slots`
--
ALTER TABLE `slots`
  ADD CONSTRAINT `fk_timetable` FOREIGN KEY (`table_name`) REFERENCES `timetables` (`table_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slot_allocs`
--
ALTER TABLE `slot_allocs`
  ADD CONSTRAINT `fk_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_room` FOREIGN KEY (`room`) REFERENCES `rooms` (`room_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_slot` FOREIGN KEY (`table_name`,`day`,`slot_num`) REFERENCES `slots` (`table_name`, `day`, `slot_num`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
