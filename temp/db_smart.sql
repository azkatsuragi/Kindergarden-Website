CREATE DATABASE IF NOT EXISTS db_smart;
USE db_smart;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 22, 2023 at 09:12 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_activity`
--

CREATE TABLE `tb_activity` (
  `n_ID` int(10) NOT NULL,
  `n_date` date NOT NULL,
  `n_time` time NOT NULL,
  `n_desc` varchar(100) NOT NULL,
  `n_name` varchar(50) NOT NULL,
  `ac_location` varchar(60) NOT NULL,
  `ac_environment` varchar(10) NOT NULL,
  `n_pic` blob NOT NULL,
  `n_status` int(1) NOT NULL DEFAULT 0 COMMENT '0=visible, 1=hidden, 2=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_activity`
--

INSERT INTO `tb_activity` (`n_ID`, `n_date`, `n_time`, `n_desc`, `n_name`, `ac_location`, `ac_environment`, `n_pic`, `n_status`) VALUES
(1, '2023-01-17', '19:47:00', 'football', 'Play', 'aclocation', 'acenvironm', 0x3237353937373232305f3438363234323837363531323838385f333732343038373136303235383234393134315f6e2e6a7067, 2),
(2, '2023-01-17', '20:35:00', 'banana', 'eat', 'room', 'out', 0x494d475f32303138313130385f3232323134362e6a7067, 2),
(4, '2023-01-22', '15:24:00', 'yesyes', 'nono', 'room', 'in', 0x3237353939313930365f313134353537383936393533343738345f313030373238343139343338343036353833375f6e2e6a7067, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_actualattendance`
--

CREATE TABLE `tb_actualattendance` (
  `attendance_ID` varchar(20) NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance_status` varchar(1) NOT NULL,
  `k_mykid` int(20) NOT NULL,
  `s_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `a_id` varchar(20) NOT NULL,
  `a_pwd` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_announcement`
--

CREATE TABLE `tb_announcement` (
  `ann_ID` int(10) NOT NULL,
  `ann_name` varchar(50) NOT NULL,
  `ann_date` date NOT NULL,
  `ann_time` time NOT NULL,
  `ann_desc` varchar(50) NOT NULL,
  `ann_pic` varchar(100) NOT NULL,
  `ann_status` int(1) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden,2=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_announcement`
--

INSERT INTO `tb_announcement` (`ann_ID`, `ann_name`, `ann_date`, `ann_time`, `ann_desc`, `ann_pic`, `ann_status`) VALUES
(1, 'RAYA', '2023-01-19', '11:46:00', 'holiday raya', '2023-01-05 (2).png', 1),
(2, 'hahaha', '2023-01-22', '15:24:00', '44', 'received_178720819679171.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_assessment`
--

CREATE TABLE `tb_assessment` (
  `assessment` int(1) NOT NULL,
  `assessment_method` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_assessment`
--

INSERT INTO `tb_assessment` (`assessment`, `assessment_method`) VALUES
(1, 'VAK'),
(2, 'Subject');

-- --------------------------------------------------------

--
-- Table structure for table `tb_checkbox`
--

CREATE TABLE `tb_checkbox` (
  `checkbox_id` int(2) NOT NULL,
  `checkbox_data` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_checkbox`
--

INSERT INTO `tb_checkbox` (`checkbox_id`, `checkbox_data`) VALUES
(1, 'Sunday'),
(2, 'Monday'),
(3, 'Tuesday'),
(4, 'Wednesday'),
(5, 'Thursday'),
(6, 'Friday'),
(7, 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `tb_expattendance`
--

CREATE TABLE `tb_expattendance` (
  `k_mykid` int(20) NOT NULL,
  `g_id` varchar(20) NOT NULL,
  `week` int(2) NOT NULL,
  `monday` varchar(10) NOT NULL,
  `tuesday` varchar(10) NOT NULL,
  `wednesday` varchar(10) NOT NULL,
  `thursday` varchar(10) NOT NULL,
  `friday` varchar(10) NOT NULL,
  `exp_att` int(1) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden,2=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_expattendance`
--

INSERT INTO `tb_expattendance` (`k_mykid`, `g_id`, `week`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `exp_att`) VALUES
(1, '0201140201', 1, 'present', 'present', 'present', 'present', 'present', 2),
(1, '0201140201', 2, 'present', 'present', 'present', 'present', 'present', 0),
(1, '0201140201', 3, 'present', 'present', 'present', 'present', 'present', 0),
(1, '0201140201', 4, 'present', 'absent', 'present', 'absent', 'present', 0),
(2, '0207040203', 2, 'present', 'present', 'present', 'present', 'present', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_expectedattendance`
--

CREATE TABLE `tb_expectedattendance` (
  `attendance_date` date NOT NULL,
  `attendance_day` varchar(100) NOT NULL,
  `RTK_picture` varchar(100) NOT NULL,
  `k_mykid` int(20) NOT NULL,
  `g_id` varchar(20) NOT NULL,
  `exp_att` int(1) NOT NULL DEFAULT 0 COMMENT '0=visible, 1=hidden,2=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_expectedattendance`
--

INSERT INTO `tb_expectedattendance` (`attendance_date`, `attendance_day`, `RTK_picture`, `k_mykid`, `g_id`, `exp_att`) VALUES
('2023-01-19', 'Sunday, Monday, Tuesday, Wednesday, Thursday', '2023-01-05 (2).png', 1, '', 2),
('2023-01-21', 'Tuesday, Wednesday', '2023-01-05 (1).png', 1, '0201140201', 2),
('2023-01-31', 'Monday', 'Screenshot_20230111_064432.png', 1, '0201140201', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_funkindyland`
--

CREATE TABLE `tb_funkindyland` (
  `ass_id` varchar(20) NOT NULL,
  `k_mykid` int(20) NOT NULL,
  `s_id` varchar(20) NOT NULL,
  `sub_name` varchar(20) NOT NULL,
  `sub_criteria` varchar(20) NOT NULL,
  `sub_level` varchar(20) NOT NULL,
  `sub_manner` varchar(20) NOT NULL,
  `mi_criteria` varchar(20) NOT NULL,
  `mi_comment` varchar(20) DEFAULT NULL,
  `vak_comment` varchar(20) DEFAULT NULL,
  `ass_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_guardian`
--

CREATE TABLE `tb_guardian` (
  `g_id` varchar(20) NOT NULL,
  `g_occupation` varchar(10) NOT NULL,
  `g_name` varchar(20) NOT NULL,
  `g_IC` int(12) NOT NULL,
  `g_street` varchar(20) NOT NULL,
  `g_city` varchar(20) NOT NULL,
  `g_postcode` int(5) NOT NULL,
  `g_phone` int(12) NOT NULL,
  `g_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_guardian`
--

INSERT INTO `tb_guardian` (`g_id`, `g_occupation`, `g_name`, `g_IC`, `g_street`, `g_city`, `g_postcode`, `g_phone`, `g_email`) VALUES
('0201140201', 'chef', 'NG SUANG JOO', 114020164, '228, TMN SRI PUTRA', 'SP', 8000, 162093523, 'ngjoo@graduate.utm.my'),
('0207040203', 'other', 'FONG KHAH KHEH', 205270203, 'KTDI', 'jb', 81310, 135698746, 'fong@gmail.com'),
('123456', 'manager', 'LING WAN YIN', 207040804, 'KDSE', 'JB', 81310, 12625860, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kidprogram`
--

CREATE TABLE `tb_kidprogram` (
  `k_mykid` int(20) NOT NULL,
  `g_id` varchar(20) NOT NULL,
  `k_name` varchar(50) NOT NULL,
  `k_dob` date NOT NULL,
  `k_allergy` varchar(100) NOT NULL,
  `k_healthcondt` varchar(100) NOT NULL,
  `k_disease` varchar(20) NOT NULL,
  `k_color` varchar(20) NOT NULL,
  `k_food` varchar(20) NOT NULL,
  `k_toys` varchar(20) NOT NULL,
  `k_diapers` varchar(20) NOT NULL,
  `kid_programme` int(2) NOT NULL,
  `kid_session` int(2) NOT NULL,
  `kid_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kidprogram`
--

INSERT INTO `tb_kidprogram` (`k_mykid`, `g_id`, `k_name`, `k_dob`, `k_allergy`, `k_healthcondt`, `k_disease`, `k_color`, `k_food`, `k_toys`, `k_diapers`, `kid_programme`, `kid_session`, `kid_status`) VALUES
(1, '0201140201', 'BB', '2023-01-14', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 1, 1, 1),
(2, '0207040203', 'CC', '2018-01-08', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_littleexplorer`
--

CREATE TABLE `tb_littleexplorer` (
  `k_mykid` int(20) NOT NULL,
  `s_id` varchar(20) NOT NULL,
  `ass_date` date NOT NULL,
  `v_comment` varchar(500) NOT NULL,
  `a_comment` varchar(500) NOT NULL,
  `k_comment` varchar(500) NOT NULL,
  `summary` varchar(500) NOT NULL,
  `session` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_littleexplorer`
--

INSERT INTO `tb_littleexplorer` (`k_mykid`, `s_id`, `ass_date`, `v_comment`, `a_comment`, `k_comment`, `summary`, `session`) VALUES
(1, 'Staff', '2023-01-19', 'gdzv', 'dfab', 'svfs', 'dsvfd', 1),
(1, 'Staff', '2023-01-20', 'non', '1', 'dscd', 'nonoyesyes', 2),
(1, 'Staff', '2023-01-31', '<br />trfb>Warning</b>:  Trying to access array offset on value of type null in <b>C:xampphtdocssmartmodifylittleexplorer.php</b> on line <b>121</b><br />', '<br /><b>Wtrsbarning</b>:  Trying to access array offset on value of type null in <b>C:xampphtdocssmartmodifylittleexplorer.php</b> on line <b>122</b><br />', '<br /><b>Warning</b>:  Trying to access array offset on value of type null in <b>C:xampphtdocssmartmodifylittleexplorer.php</b> on line <b>123</b><br />', '<br /><b>Warning</b>:  Trying to access array offset on value of type null in <b>C:xampphtdocssmartmodifylittleexplorer.php</b> on line <b>130</b><br />', 1),
(2, 'Staff', '2023-01-24', 'good', 'good', 'good', 'very good', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_program`
--

CREATE TABLE `tb_program` (
  `program` int(2) NOT NULL,
  `program_type` varchar(20) NOT NULL,
  `ass_method` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_program`
--

INSERT INTO `tb_program` (`program`, `program_type`, `ass_method`) VALUES
(1, 'Little Explorer', 1),
(2, 'Fun Kindy Land', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_salary`
--

CREATE TABLE `tb_salary` (
  `sa_referenceNum` varchar(10) NOT NULL,
  `sa_issuedate` date NOT NULL,
  `sa_basic` decimal(6,2) NOT NULL,
  `sa_ot` decimal(6,2) NOT NULL,
  `sa_eplaygroup` int(11) NOT NULL,
  `sa_ecutiumum` int(11) NOT NULL,
  `sa_elebihmasa` time NOT NULL,
  `sa_kwsp` int(11) NOT NULL,
  `sa_cutitanpagaji` int(11) NOT NULL,
  `s_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_session`
--

CREATE TABLE `tb_session` (
  `session` int(2) NOT NULL,
  `session_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_session`
--

INSERT INTO `tb_session` (`session`, `session_type`) VALUES
(1, 'morning'),
(2, 'afternoon');

-- --------------------------------------------------------

--
-- Table structure for table `tb_staff`
--

CREATE TABLE `tb_staff` (
  `s_id` varchar(20) NOT NULL,
  `s_bankAccNum` int(15) NOT NULL,
  `s_bankOwnerName` varchar(20) NOT NULL,
  `s_bankName` varchar(20) NOT NULL,
  `s_pwd` varchar(20) NOT NULL,
  `s_name` varchar(20) NOT NULL,
  `s_IC` int(12) NOT NULL,
  `s_street` varchar(20) NOT NULL,
  `s_city` varchar(20) NOT NULL,
  `s_postcode` int(5) NOT NULL,
  `s_phone` int(12) NOT NULL,
  `s_email` varchar(50) DEFAULT NULL,
  `s_position` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_staff`
--

INSERT INTO `tb_staff` (`s_id`, `s_bankAccNum`, `s_bankOwnerName`, `s_bankName`, `s_pwd`, `s_name`, `s_IC`, `s_street`, `s_city`, `s_postcode`, `s_phone`, `s_email`, `s_position`) VALUES
('Staff', 123456, 'WK', 'Maybank', 'staff123', 'WK', 205010212, 'tmn', 'jb', 81310, 126547896, 'wk@gmail.com', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `tb_staffattendance`
--

CREATE TABLE `tb_staffattendance` (
  `attendance_ID` varchar(20) NOT NULL,
  `attendance_status` varchar(1) NOT NULL,
  `RTK_picture` blob NOT NULL,
  `attendance_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `attendance_event` varchar(1) NOT NULL,
  `mc_attachment` blob NOT NULL,
  `attendance_duration` varchar(10) NOT NULL,
  `attendance_latitude` decimal(11,7) NOT NULL,
  `attendance_longitude` decimal(11,7) NOT NULL,
  `s_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `status` int(2) NOT NULL,
  `status_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`status`, `status_type`) VALUES
(1, 'Approved'),
(2, 'Rejected'),
(3, 'Cancelled'),
(4, 'Deleted');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `u_id` varchar(20) NOT NULL,
  `u_pwd` varchar(20) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_phone` int(12) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`u_id`, `u_pwd`, `u_name`, `u_phone`, `u_email`, `u_type`) VALUES
('0201140201', 'abc12345', 'NG SUANG JOO', 162093523, 'ngsuangjoo@gmail.com', 3),
('0207040203', 'ling12345', 'LING WAN YIN', 162093524, 'ling@gmail.com', 3),
('123456', '123456', 'AA', 123456789, 'roza@gmail.com', 3),
('Admin', 'admin123', 'Roza', 123456789, 'roza@gmail.com', 1),
('Staff', 'staff123', 'WK', 123654785, 'ng@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_usertype`
--

CREATE TABLE `tb_usertype` (
  `ut_id` int(1) NOT NULL,
  `ut_desc` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_usertype`
--

INSERT INTO `tb_usertype` (`ut_id`, `ut_desc`) VALUES
(1, 'Admin'),
(2, 'Staff'),
(3, 'Guardian');

-- --------------------------------------------------------

--
-- Table structure for table `tb_week`
--

CREATE TABLE `tb_week` (
  `no_week` int(2) NOT NULL,
  `which_week` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_week`
--

INSERT INTO `tb_week` (`no_week`, `which_week`) VALUES
(1, 'week 1'),
(2, 'week 2'),
(3, 'week 3'),
(4, 'week 4'),
(5, 'week 5'),
(6, 'week 6'),
(7, 'week 7'),
(8, 'week 8'),
(9, 'week 9'),
(10, 'week 10'),
(11, 'week 11'),
(12, 'week 12'),
(13, 'week 13'),
(14, 'week 14'),
(15, 'week 15'),
(16, 'week 16'),
(17, 'week 17'),
(18, 'week 18'),
(19, 'week 19'),
(20, 'week 20'),
(21, 'week 21'),
(22, 'week 22'),
(23, 'week 23'),
(24, 'week 24'),
(25, 'week 25'),
(26, 'week 26'),
(27, 'week 27'),
(28, 'week 28'),
(29, 'week 29'),
(30, 'week 30'),
(31, 'week 31'),
(32, 'week 32'),
(33, 'week 33'),
(34, 'week 34'),
(35, 'week 35'),
(36, 'week 36'),
(37, 'week 37'),
(38, 'week 38'),
(39, 'week 39'),
(40, 'week 40'),
(41, 'week 41'),
(42, 'week 42'),
(43, 'week 43'),
(44, 'week 44'),
(45, 'week 45'),
(46, 'week 46'),
(47, 'week 47'),
(48, 'week 48'),
(49, 'week 49'),
(50, 'week 50'),
(51, 'week 51'),
(52, 'week 52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_activity`
--
ALTER TABLE `tb_activity`
  ADD PRIMARY KEY (`n_ID`);

--
-- Indexes for table `tb_actualattendance`
--
ALTER TABLE `tb_actualattendance`
  ADD PRIMARY KEY (`attendance_ID`),
  ADD KEY `k_mykid` (`k_mykid`,`s_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tb_announcement`
--
ALTER TABLE `tb_announcement`
  ADD PRIMARY KEY (`ann_ID`);

--
-- Indexes for table `tb_assessment`
--
ALTER TABLE `tb_assessment`
  ADD PRIMARY KEY (`assessment`);

--
-- Indexes for table `tb_checkbox`
--
ALTER TABLE `tb_checkbox`
  ADD PRIMARY KEY (`checkbox_id`);

--
-- Indexes for table `tb_expattendance`
--
ALTER TABLE `tb_expattendance`
  ADD PRIMARY KEY (`k_mykid`,`g_id`,`week`),
  ADD KEY `k_mykid` (`k_mykid`,`g_id`),
  ADD KEY `week` (`week`),
  ADD KEY `g_id` (`g_id`);

--
-- Indexes for table `tb_expectedattendance`
--
ALTER TABLE `tb_expectedattendance`
  ADD PRIMARY KEY (`attendance_date`,`k_mykid`),
  ADD KEY `k_mykid` (`k_mykid`),
  ADD KEY `g_id` (`g_id`);

--
-- Indexes for table `tb_funkindyland`
--
ALTER TABLE `tb_funkindyland`
  ADD PRIMARY KEY (`ass_id`),
  ADD KEY `k_mykid` (`k_mykid`,`s_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `tb_guardian`
--
ALTER TABLE `tb_guardian`
  ADD PRIMARY KEY (`g_id`),
  ADD KEY `g_id` (`g_id`),
  ADD KEY `g_name` (`g_name`);

--
-- Indexes for table `tb_kidprogram`
--
ALTER TABLE `tb_kidprogram`
  ADD PRIMARY KEY (`k_mykid`),
  ADD KEY `g_id` (`g_id`),
  ADD KEY `kid_programme` (`kid_programme`,`kid_session`),
  ADD KEY `kid_status` (`kid_status`),
  ADD KEY `kid_session` (`kid_session`);

--
-- Indexes for table `tb_littleexplorer`
--
ALTER TABLE `tb_littleexplorer`
  ADD PRIMARY KEY (`k_mykid`,`s_id`,`ass_date`),
  ADD KEY `k_mykid` (`k_mykid`,`s_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `session` (`session`);

--
-- Indexes for table `tb_program`
--
ALTER TABLE `tb_program`
  ADD PRIMARY KEY (`program`),
  ADD KEY `ass_method` (`ass_method`);

--
-- Indexes for table `tb_salary`
--
ALTER TABLE `tb_salary`
  ADD PRIMARY KEY (`sa_referenceNum`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `tb_session`
--
ALTER TABLE `tb_session`
  ADD PRIMARY KEY (`session`);

--
-- Indexes for table `tb_staff`
--
ALTER TABLE `tb_staff`
  ADD KEY `s_name` (`s_name`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `tb_staffattendance`
--
ALTER TABLE `tb_staffattendance`
  ADD PRIMARY KEY (`attendance_ID`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`status`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `u_type` (`u_type`);

--
-- Indexes for table `tb_usertype`
--
ALTER TABLE `tb_usertype`
  ADD PRIMARY KEY (`ut_id`);

--
-- Indexes for table `tb_week`
--
ALTER TABLE `tb_week`
  ADD PRIMARY KEY (`no_week`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_activity`
--
ALTER TABLE `tb_activity`
  MODIFY `n_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_announcement`
--
ALTER TABLE `tb_announcement`
  MODIFY `ann_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kidprogram`
--
ALTER TABLE `tb_kidprogram`
  MODIFY `k_mykid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_actualattendance`
--
ALTER TABLE `tb_actualattendance`
  ADD CONSTRAINT `tb_actualattendance_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `tb_staff` (`s_id`);

--
-- Constraints for table `tb_expattendance`
--
ALTER TABLE `tb_expattendance`
  ADD CONSTRAINT `tb_expattendance_ibfk_1` FOREIGN KEY (`week`) REFERENCES `tb_week` (`no_week`),
  ADD CONSTRAINT `tb_expattendance_ibfk_2` FOREIGN KEY (`g_id`) REFERENCES `tb_kidprogram` (`g_id`);

--
-- Constraints for table `tb_funkindyland`
--
ALTER TABLE `tb_funkindyland`
  ADD CONSTRAINT `tb_funkindyland_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `tb_staff` (`s_id`);

--
-- Constraints for table `tb_guardian`
--
ALTER TABLE `tb_guardian`
  ADD CONSTRAINT `tb_guardian_ibfk_1` FOREIGN KEY (`g_id`) REFERENCES `tb_user` (`u_id`);

--
-- Constraints for table `tb_kidprogram`
--
ALTER TABLE `tb_kidprogram`
  ADD CONSTRAINT `tb_kidprogram_ibfk_1` FOREIGN KEY (`g_id`) REFERENCES `tb_guardian` (`g_id`),
  ADD CONSTRAINT `tb_kidprogram_ibfk_2` FOREIGN KEY (`kid_programme`) REFERENCES `tb_program` (`program`),
  ADD CONSTRAINT `tb_kidprogram_ibfk_3` FOREIGN KEY (`kid_session`) REFERENCES `tb_session` (`session`),
  ADD CONSTRAINT `tb_kidprogram_ibfk_4` FOREIGN KEY (`kid_status`) REFERENCES `tb_status` (`status`);

--
-- Constraints for table `tb_littleexplorer`
--
ALTER TABLE `tb_littleexplorer`
  ADD CONSTRAINT `tb_littleexplorer_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `tb_staff` (`s_id`),
  ADD CONSTRAINT `tb_littleexplorer_ibfk_3` FOREIGN KEY (`k_mykid`) REFERENCES `tb_kidprogram` (`k_mykid`),
  ADD CONSTRAINT `tb_littleexplorer_ibfk_4` FOREIGN KEY (`session`) REFERENCES `tb_session` (`session`);

--
-- Constraints for table `tb_program`
--
ALTER TABLE `tb_program`
  ADD CONSTRAINT `tb_program_ibfk_1` FOREIGN KEY (`ass_method`) REFERENCES `tb_assessment` (`assessment`);

--
-- Constraints for table `tb_salary`
--
ALTER TABLE `tb_salary`
  ADD CONSTRAINT `tb_salary_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `tb_staff` (`s_id`);

--
-- Constraints for table `tb_staff`
--
ALTER TABLE `tb_staff`
  ADD CONSTRAINT `tb_staff_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `tb_user` (`u_id`);

--
-- Constraints for table `tb_staffattendance`
--
ALTER TABLE `tb_staffattendance`
  ADD CONSTRAINT `tb_staffattendance_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `tb_staff` (`s_id`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`u_type`) REFERENCES `tb_usertype` (`ut_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;