-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 02:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codexspot`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_content`
--

CREATE TABLE `add_content` (
  `ac_id` int(10) NOT NULL,
  `l_id` int(10) NOT NULL,
  `c_id` int(10) NOT NULL,
  `s_id` int(10) NOT NULL,
  `pdf` longtext NOT NULL,
  `disc` varchar(300) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_content`
--

INSERT INTO `add_content` (`ac_id`, `l_id`, `c_id`, `s_id`, `pdf`, `disc`, `date`, `status`) VALUES
(1, 4, 6, 16, 'upload/Manipulation Dark Psychology to Manipulate and Control People (Arthur Horn) (Z-Library).pdf', 'w', '2023-06-30 17:17:07', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(10) NOT NULL,
  `a_name` varchar(30) NOT NULL,
  `a_password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_password`) VALUES
(1, 'admin', '$2y$10$GrU8geT26gfsh1ZlWauQtuUoHY/S96mRzr8pq8coQNuuwVvVfg9O6');

-- --------------------------------------------------------

--
-- Table structure for table `class_link`
--

CREATE TABLE `class_link` (
  `cl_id` int(11) NOT NULL,
  `mc_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `j_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `l_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `class_link` varchar(400) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `cl_status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_link`
--

INSERT INTO `class_link` (`cl_id`, `mc_id`, `st_id`, `j_id`, `s_id`, `l_id`, `c_id`, `class_link`, `date`, `cl_status`) VALUES
(1, 1, 3, 1, 9, 1, 5, 'https://www.youtube.com/watch?v=r0c1f6XxRQg', '2023-06-17 15:46:12', ''),
(2, 3, 5, 2, 1, 1, 3, 'class_link.php', '2023-06-26 06:53:57', ''),
(3, 4, 10, 4, 1, 1, 3, 'google.com', '2023-06-27 12:21:58', ''),
(4, 2, 12, 1, 16, 4, 6, 'google.com', '2023-06-30 17:43:06', ''),
(5, 3, 17, 2, 16, 4, 6, 'google.com', '2023-06-30 18:34:02', ''),
(6, 5, 18, 3, 3, 10, 3, 'hhhhhhhhdddddddddd', '2023-07-02 15:41:27', ''),
(7, 7, 18, 4, 22, 10, 3, 'wwwwwwwwwwwwww', '2023-07-02 15:44:46', ''),
(8, 8, 18, 5, 4, 10, 3, 'rrrrrrrrrrrrrrrrrrrr', '2023-07-02 15:54:53', ''),
(9, 9, 26, 6, 23, 12, 11, 'https://www.youtube.com/watch?v=r0c1f6XxRQg', '2023-07-03 11:19:15', '');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(40) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`, `date`, `status`) VALUES
(11, 'Basic Web Development', '2023-07-03 09:06:19', ''),
(12, 'Advanced Web development', '2023-07-03 09:08:18', ''),
(13, 'Basic Back-End', '2023-07-03 09:09:10', ''),
(14, 'Advanced Back-End', '2023-07-03 09:10:04', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(10) NOT NULL,
  `st_id` int(10) NOT NULL,
  `l_id` int(10) NOT NULL,
  `message` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `st_id`, `l_id`, `message`, `date`, `status`) VALUES
(6, 17, 4, 'good', '2023-06-30 18:45:40', ''),
(10, 26, 12, 'Good class', '2023-07-03 11:19:32', '');

-- --------------------------------------------------------

--
-- Table structure for table `join_class`
--

CREATE TABLE `join_class` (
  `j_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `l_id` int(11) NOT NULL,
  `mc_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `j_status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `join_class`
--

INSERT INTO `join_class` (`j_id`, `c_id`, `s_id`, `l_id`, `mc_id`, `st_id`, `date`, `j_status`) VALUES
(1, 6, 16, 4, 2, 12, '2023-06-30 17:42:51', 'accepted'),
(2, 6, 16, 4, 3, 17, '2023-06-30 18:33:04', 'accepted'),
(3, 3, 3, 10, 5, 18, '2023-07-02 15:41:02', 'accepted'),
(4, 3, 22, 10, 7, 18, '2023-07-02 15:44:26', 'accepted'),
(5, 3, 4, 10, 8, 18, '2023-07-02 15:53:48', 'accepted'),
(6, 11, 23, 12, 9, 26, '2023-07-03 11:11:25', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `l_id` int(10) NOT NULL,
  `c_id` int(11) NOT NULL,
  `l_name` varchar(60) NOT NULL,
  `l_email` varchar(20) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `address` varchar(40) NOT NULL,
  `experience` varchar(250) NOT NULL,
  `acc_no` bigint(16) NOT NULL,
  `ifsc` varchar(90) NOT NULL,
  `password` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`l_id`, `c_id`, `l_name`, `l_email`, `phone_no`, `address`, `experience`, `acc_no`, `ifsc`, `password`, `date`, `status`) VALUES
(4, 6, 'mark smith', 'marksmith@gmail.com', 2147483647, 'pvs managlore karnataka-575019', 'upload/mark smith resume.jpg', 111134567234567, '', '$2y$10$pq6/5IZBgEM/QkeotIZjiOTgia7HYQ8.F7yUBpVl1ugfSf8IAcOQO', '2023-06-27 22:03:00', 'Accepted'),
(10, 3, 'Anjudahiya', 'Anjudahiya@gmail.com', 2147483647, ' District Sonipat, Haryana 131001', 'upload/my-node (25).png', 234234234, 'SBIN1234567', '$2y$10$/9tsyXk5fzVhMgQPWiA1eOOfchwvX./3pQvDH261pu9ITksVH8lce', '2023-07-02 15:08:36', 'Accepted'),
(12, 11, 'Yudhveer', 'Yudhveer@gmail.com', 8234632461, 'JBT Incharge of the School, GPS Anoga, D', 'upload/instructor-01.jpg', 652486541546, 'SBIN0005751', '$2y$10$yEdwIgpudFIbtGNYeaurbejW67Hr2Qt3/xLiSqwlOm3l3VX7H6uA2', '2023-07-03 09:16:58', 'Accepted'),
(13, 12, 'Virender Kumar', 'VirenderKumar@gmail.', 8612481545, 'Teacher, GSSS Dharogra, District Shimla,', 'upload/instructor-03.jpg', 4318514152148, 'SBIN0013285', '$2y$10$Y0.oi1mHTv3VZ.GxcsIZTOR57e95Jx0FrxV9QQUALKjbsikLeD6JS', '2023-07-03 09:18:58', 'Accepted'),
(14, 13, 'Harpreet Singh', 'HarpreetSingh@gmail.', 9262362163, ' Head Teacher, Govt. Primary Smart Schoo', 'upload/instructor-02.jpg', 15231253215, 'SBIN0011580', '$2y$10$Vyz6NiY4LSM/eXoGVrKxvOcmgb9VdrNNCalhmLiXCkm2HKAFAQcJi', '2023-07-03 09:21:22', 'Rejected'),
(15, 14, 'Arun Kumar', 'ArunKumar@gmail.com', 8832469861, 'Principal, GMSS Datewas, District Mansa,', 'upload/profile-avatar.jpg', 321244212412, 'SBIN0013285', '$2y$10$s090dxgDbcmE6pAan7n69.Aq0TEY4lajZqyXyfxiIs37MdKNv9Uq2', '2023-07-03 09:23:39', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_payment`
--

CREATE TABLE `lecturer_payment` (
  `lp_id` int(11) NOT NULL,
  `l_id` int(10) NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `lp_status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturer_payment`
--

INSERT INTO `lecturer_payment` (`lp_id`, `l_id`, `amount`, `date`, `lp_status`) VALUES
(1, 1, 5000, '2023-06-27', 'paid'),
(2, 2, 12000, '2023-06-27', 'paid'),
(3, 4, 12000, '2023-06-27', 'paid'),
(4, 5, 0, '2023-06-27', 'paid'),
(5, 6, 12000, '2023-06-27', 'paid'),
(6, 10, 1200, '2023-07-03', 'paid'),
(7, 12, 2000, '2023-07-03', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `manage_class`
--

CREATE TABLE `manage_class` (
  `mc_id` int(10) NOT NULL,
  `l_id` int(10) NOT NULL,
  `s_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `m_date` date NOT NULL,
  `m_time` time NOT NULL,
  `discription` longtext NOT NULL,
  `img` varchar(250) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_class`
--

INSERT INTO `manage_class` (`mc_id`, `l_id`, `s_id`, `c_id`, `m_date`, `m_time`, `discription`, `img`, `status`) VALUES
(1, 4, 18, 6, '2023-07-01', '19:12:00', 'physics', 'upload/yasin munir resume.jpg', ''),
(2, 4, 16, 6, '2023-06-30', '20:38:00', 'W', 'upload/Premium Photo _ Top view office desk with computer and office supplies with copy space.jpg', ''),
(3, 4, 16, 6, '2023-06-30', '19:28:00', 'weeee', 'upload/WhatsApp Image 2023-06-22 at 18.13.57.jpg', ''),
(4, 10, 22, 3, '2023-07-03', '15:20:00', 'hellloo', 'upload/Jersey.jpg', ''),
(5, 10, 3, 3, '2023-07-02', '16:41:00', 'kjjkjjkjkj', 'upload/Jersey.jpg', ''),
(6, 10, 4, 3, '2023-07-03', '16:44:00', 'djflg', 'upload/Jersey.jpg', ''),
(7, 10, 22, 3, '2023-07-02', '16:44:00', 'cvxcxdv', 'upload/my-node (26).png', ''),
(8, 10, 4, 3, '2023-07-02', '15:54:00', 'cvvvvvv', 'upload/Jersey.jpg', ''),
(9, 12, 23, 11, '2023-07-03', '12:00:00', 'Bsasic  htmnl', 'upload/skill-02.jpg', ''),
(10, 12, 25, 11, '2023-07-04', '12:33:00', 'css', 'upload/skill-03.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `m_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `pay_method` varchar(30) NOT NULL,
  `trans_id` varchar(70) NOT NULL,
  `card_name` varchar(40) NOT NULL,
  `card_no` int(35) NOT NULL,
  `pay_date` date NOT NULL DEFAULT current_timestamp(),
  `pay_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`m_id`, `st_id`, `p_id`, `pay_method`, `trans_id`, `card_name`, `card_no`, `pay_date`, `pay_status`) VALUES
(1, 12, 7, 'upi', '12345', '', 0, '2023-06-30', 'active'),
(6, 26, 7, 'card', '', '', 0, '2023-07-03', 'Active'),
(7, 26, 7, 'card', '', '', 0, '2023-07-03', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `p_id` int(10) NOT NULL,
  `p_duration` varchar(200) NOT NULL,
  `amount` int(20) NOT NULL,
  `details` varchar(100) NOT NULL,
  `info` varchar(400) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`p_id`, `p_duration`, `amount`, `details`, `info`, `date`, `status`) VALUES
(7, '1month', 1599, 'Live ClassesNotesClass  Videos', 'Live Classes,Notes,Class  Videos', '2023-08-27 21:28:58', ''),
(8, '6month', 2999, 'Live Classes,Notes,Class Videos,Many Courses,Core study materials,Limited access to supplementary re', 'Live Classes,Notes,Class Videos,Many Courses,Core study materials,Access to all available resources', '2023-08-27 21:32:04', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `st_id` int(10) NOT NULL,
  `c_id` int(11) NOT NULL,
  `st_name` varchar(10) NOT NULL,
  `s_email` varchar(20) NOT NULL,
  `s_phone_no` bigint(10) NOT NULL,
  `s_address` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`st_id`, `c_id`, `st_name`, `s_email`, `s_phone_no`, `s_address`, `password`, `date`, `status`) VALUES
(12, 6, 'ankith', 'ankith@gmail.com', 9976876543, 'mulki ', '$2y$10$85hLYPTgYDsg05ko1Sfcwuez68f1VTiL.OPJkwEantWRD/UUSdwu2', '2023-06-27 22:10:54', ''),
(23, 11, 'Bhooshan', 'Bhooshan@gmail.com', 8234633361, 'Bandiyod', '$2y$10$RCDlry7rekA3CSaJwxGidOjpW3enyMi6FdLyYI81SexI5IEUr8Gka', '2023-07-03 09:27:57', ''),
(24, 12, 'Preethesh', 'Preethesh@gmail.com', 8921321362, 'uppala,kasaragod', '$2y$10$fIr8AGTfsI7AbmY7sHbNeeSUVOZmB.KFW3RIHEbX7tWoNJBqmes8a', '2023-07-03 09:28:55', ''),
(25, 11, 'Shreejesh', 'Shreejesh@gmail.com', 8914916212, 'ponnathod,bandiyod,kasaragod', '$2y$10$gA8F5Z1eXgFOxM.vaj3tCe9BT48j/89/Kw6Q.0VjSVZZ9qkF0uS2K', '2023-07-03 09:30:11', ''),
(26, 11, 'Ajay', 'Ajay@gmail.com', 8954634500, 'Mangalore', '$2y$10$gbm3wSFNnmx0UAnb7dD6KOO5tYnZnWpzwd05N/CtFkBQTwI7fPR9y', '2023-07-03 09:32:23', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `s_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_name` varchar(40) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`s_id`, `c_id`, `s_name`, `date`, `status`) VALUES
(23, 11, 'HTML', '2023-07-03 09:06:27', ''),
(25, 11, 'CSS', '2023-07-03 09:06:45', ''),
(26, 11, 'Javascript', '2023-07-03 09:07:07', ''),
(27, 12, 'Swift', '2023-07-03 09:08:26', ''),
(28, 0, 'python', '2023-07-03 09:08:35', ''),
(29, 12, 'Ruby', '2023-07-03 09:08:46', ''),
(30, 13, 'Php', '2023-07-03 09:09:35', ''),
(31, 13, 'Mysql', '2023-07-03 09:09:46', ''),
(32, 14, 'Mongo-DB', '2023-07-03 09:10:15', '');

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `t_id` int(11) NOT NULL,
  `day` varchar(40) NOT NULL,
  `period_1` int(11) NOT NULL,
  `period_2` int(11) NOT NULL,
  `period_3` int(11) NOT NULL,
  `period_4` int(11) NOT NULL,
  `period_5` int(11) NOT NULL,
  `period_6` int(11) NOT NULL,
  `t_date` date NOT NULL DEFAULT current_timestamp(),
  `t_status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`t_id`, `day`, `period_1`, `period_2`, `period_3`, `period_4`, `period_5`, `period_6`, `t_date`, `t_status`) VALUES
(8, 'Monday', 23, 25, 29, 30, 26, 25, '2023-07-03', ''),
(11, 'Thuesday', 27, 23, 25, 26, 32, 31, '2023-07-03', ''),
(16, 'Wednesday', 30, 31, 32, 29, 28, 28, '2023-07-03', ''),
(17, 'Thursday', 27, 26, 29, 25, 23, 26, '2023-07-03', ''),
(18, 'Friday', 23, 25, 26, 29, 30, 31, '2023-07-03', '');

-- --------------------------------------------------------

--
-- Table structure for table `upload_video`
--

CREATE TABLE `upload_video` (
  `u_id` int(10) NOT NULL,
  `l_id` int(10) NOT NULL,
  `c_id` int(10) NOT NULL,
  `s_id` int(10) NOT NULL,
  `u_video` longtext NOT NULL,
  `desc` varchar(400) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upload_video`
--

INSERT INTO `upload_video` (`u_id`, `l_id`, `c_id`, `s_id`, `u_video`, `desc`, `date`, `status`) VALUES
(2, 10, 3, 22, 'upload/UFO.mp4', 'ufo video', '2023-07-02 15:18:20', ''),
(3, 12, 11, 23, 'upload/objectv.mp4', 'html', '2023-07-03 11:13:33', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_content`
--
ALTER TABLE `add_content`
  ADD PRIMARY KEY (`ac_id`),
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `class_link`
--
ALTER TABLE `class_link`
  ADD PRIMARY KEY (`cl_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `s_id` (`st_id`),
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `join_class`
--
ALTER TABLE `join_class`
  ADD PRIMARY KEY (`j_id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `lecturer_payment`
--
ALTER TABLE `lecturer_payment`
  ADD PRIMARY KEY (`lp_id`);

--
-- Indexes for table `manage_class`
--
ALTER TABLE `manage_class`
  ADD PRIMARY KEY (`mc_id`),
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `upload_video`
--
ALTER TABLE `upload_video`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `l_id` (`l_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_content`
--
ALTER TABLE `add_content`
  MODIFY `ac_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class_link`
--
ALTER TABLE `class_link`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `join_class`
--
ALTER TABLE `join_class`
  MODIFY `j_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `l_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lecturer_payment`
--
ALTER TABLE `lecturer_payment`
  MODIFY `lp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `manage_class`
--
ALTER TABLE `manage_class`
  MODIFY `mc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `st_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `upload_video`
--
ALTER TABLE `upload_video`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_content`
--
ALTER TABLE `add_content`
  ADD CONSTRAINT `add_content_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `lecturer` (`l_id`);

--
-- Constraints for table `manage_class`
--
ALTER TABLE `manage_class`
  ADD CONSTRAINT `manage_class_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `lecturer` (`l_id`);

--
-- Constraints for table `upload_video`
--
ALTER TABLE `upload_video`
  ADD CONSTRAINT `upload_video_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `lecturer` (`l_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
