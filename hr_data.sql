-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2024 at 08:09 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `checktime`
--

CREATE TABLE `checktime` (
  `id_checktime` int(10) NOT NULL COMMENT 'รหัสเช็คอิน',
  `prefix_em` varchar(100) DEFAULT NULL,
  `firstname_em` varchar(200) NOT NULL COMMENT 'ชื่อพนักงาน',
  `lastname_em` varchar(200) NOT NULL COMMENT 'นามสกุลพนักงาน',
  `id_em` varchar(50) NOT NULL COMMENT 'รหัสประจำตัวพนักงาน',
  `department_em` varchar(200) NOT NULL COMMENT 'แผนก',
  `date_check` date NOT NULL COMMENT 'วันที่เช็ค',
  `time_check` time NOT NULL COMMENT 'เวลาที่เช็ค',
  `status_check` varchar(50) NOT NULL COMMENT 'สถานะว่าสายหรือทันหรือออก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checktime`
--

INSERT INTO `checktime` (`id_checktime`, `prefix_em`, `firstname_em`, `lastname_em`, `id_em`, `department_em`, `date_check`, `time_check`, `status_check`) VALUES
(1, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-08', '16:51:22', 'สาย'),
(6, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-09', '18:11:23', 'ออกงาน'),
(7, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-09', '18:25:24', 'ออกงาน'),
(9, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-11', '13:13:25', 'สาย'),
(10, 'นาย', 'ชัยพัฒน์', 'จงสุขศิริ', '000100', 'IT', '2023-11-11', '13:13:33', 'สาย'),
(11, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-13', '15:03:16', 'สาย'),
(12, 'นาย', 'ชัยพัฒน์', 'จงสุขศิริ', '000100', 'IT', '2023-11-14', '10:35:46', 'สาย'),
(13, 'นาย', 'ชัยพัฒน์', 'จงสุขศิริ', '000100', 'IT', '2023-11-14', '10:37:32', 'สาย'),
(14, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-14', '10:37:42', 'สาย'),
(15, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-14', '12:08:15', 'สาย'),
(16, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-14', '12:08:25', 'สาย'),
(17, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-14', '12:24:55', 'สาย'),
(18, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-14', '13:25:52', 'สาย'),
(19, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-14', '13:26:01', 'สาย'),
(20, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-14', '13:26:09', 'สาย'),
(21, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-14', '13:26:16', 'สาย'),
(22, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-14', '20:49:23', 'ออกงาน'),
(23, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-14', '21:35:08', 'ออกงาน'),
(24, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-14', '21:35:16', 'ออกงาน'),
(25, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-14', '21:35:23', 'ออกงาน'),
(26, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-14', '21:35:30', 'ออกงาน'),
(27, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-14', '21:37:00', 'ออกงาน'),
(28, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-14', '21:37:08', 'ออกงาน'),
(29, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-14', '21:37:15', 'ออกงาน'),
(30, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-14', '21:38:54', 'ออกงาน'),
(31, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-11-14', '21:39:02', 'ออกงาน'),
(32, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-12-15', '13:39:27', 'สาย'),
(33, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-12-15', '13:52:38', 'สาย'),
(34, 'นาย', 'ชัยพัฒน์', 'จงสุขศิริ', '000100', 'IT', '2023-12-15', '13:52:52', 'สาย'),
(35, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', '2023-12-15', '13:53:15', 'สาย'),
(36, 'นาย', 'ชัยพัฒน์', 'จงสุขศิริ', '000100', 'IT', '2023-12-15', '13:53:23', 'สาย');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) NOT NULL,
  `title` varchar(190) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `start_date`, `end_date`) VALUES
(1, 'วันสิ้นปี', 'วันสิ้นปี', '2023-12-31', '2023-12-31'),
(3, 'วันปีใหม่', 'วันปีใหม่', '2024-01-01', '2024-01-02'),
(6, 'วันพ่อ', 'วันพ่อ', '2023-12-05', '2023-12-06'),
(7, 'วันรัฐธรรมนูญ', 'วันรัฐธรรมนูญ', '2023-12-10', '2023-12-11'),
(8, 'ํวันแม่แห่งชาติ', 'วันแม่แห่งชาติ', '2024-08-12', '2024-08-13'),
(9, 'วันปิยะมหาราช', 'วันปิยะมหาราช', '2024-10-23', '2024-10-24'),
(10, 'วันสิ้นปี', 'วันสิ้นปี', '2024-12-31', '2024-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `leave_form`
--

CREATE TABLE `leave_form` (
  `id_leave` int(10) NOT NULL COMMENT 'รหัสการลา',
  `prefix_em` varchar(100) NOT NULL COMMENT 'คำนำหน้า',
  `firstname_em` varchar(200) DEFAULT NULL COMMENT 'ชื่อพนักงาน',
  `lastname_em` varchar(200) DEFAULT NULL COMMENT 'นามสกุลพนักงาน',
  `id_em` varchar(50) NOT NULL COMMENT 'รหัสประจำตัวพนักงาน',
  `department_em` varchar(200) DEFAULT NULL COMMENT 'แผนก',
  `leave_type` varchar(100) NOT NULL COMMENT 'ประเภทการลา',
  `details` varchar(200) DEFAULT NULL,
  `start_leave` date DEFAULT NULL COMMENT 'วันที่เริ่มลา',
  `end_leave` date DEFAULT NULL COMMENT 'วันสุดท้ายที่ลา',
  `starttime_leave` time DEFAULT NULL COMMENT 'เวลาที่เริ่มลา',
  `endtime_leave` time DEFAULT NULL COMMENT 'เวลาสิ้นสุดการลา',
  `status_leave` varchar(50) DEFAULT NULL COMMENT 'สถานะตัวลาว่าอนุมัติหรือไม่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_form`
--

INSERT INTO `leave_form` (`id_leave`, `prefix_em`, `firstname_em`, `lastname_em`, `id_em`, `department_em`, `leave_type`, `details`, `start_leave`, `end_leave`, `starttime_leave`, `endtime_leave`, `status_leave`) VALUES
(1, 'นาย', 'สมเกียรติ', 'รุ่งเรือง', '000123', 'การเงิน', 'ลาป่วย', 'เป็นไข้สูง', '2023-07-14', '2023-07-17', NULL, NULL, 'ไม่อนุมัติ'),
(2, 'นาย', 'เอนก', ' แซ่เจียง', '000090', 'IT', 'ลาพักร้อน', '', '2023-07-19', '2023-07-31', NULL, NULL, 'ไม่อนุมัติ'),
(4, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 'ลาพักร้อน', '', '2023-10-27', '2023-10-31', '00:00:00', '00:00:00', 'ไม่อนุมัติ'),
(8, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 'ลาป่วย', '', '2023-11-03', '2023-11-04', '00:00:00', '00:00:00', 'ไม่อนุมัติ'),
(9, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 'ลาป่วย', '', '2023-11-03', '2023-11-04', '00:00:00', '00:00:00', 'ไม่อนุมัติ'),
(10, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 'ลาป่วย', '', '2023-11-03', '2023-11-04', '00:00:00', '00:00:00', 'ไม่อนุมัติ'),
(11, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 'ลาป่วย', '', '2023-11-03', '2023-11-06', '00:00:00', '00:00:00', 'ไม่อนุมัติ'),
(12, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 'ลาป่วย', '', '2023-11-04', '2023-11-04', '13:00:00', '17:00:00', 'ไม่อนุมัติ'),
(13, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 'ลาป่วย', '', '2023-11-04', '2023-11-04', '13:00:00', '17:00:00', 'ไม่อนุมัติ'),
(14, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 'ลาป่วย', '', '2023-11-03', '2023-11-04', '00:00:00', '00:00:00', 'ไม่อนุมัติ'),
(16, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 'ลาป่วย', '', '2023-11-03', '2023-11-06', '00:00:00', '00:00:00', 'ไม่อนุมัติ'),
(17, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 'ลาป่วย', '', '2023-11-03', '2023-11-06', '00:00:00', '00:00:00', 'ไม่อนุมัติ'),
(18, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 'ลาป่วย', '', '2023-11-03', '2023-11-06', '00:00:00', '00:00:00', 'ไม่อนุมัติ'),
(21, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 'ลาพักร้อน', '', '2023-11-04', '2023-11-06', '00:00:00', '00:00:00', 'อนุมัติ'),
(22, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 'ลาป่วย', '', '2023-11-04', '2023-11-06', '00:00:00', '00:00:00', 'ไม่อนุมัติ'),
(24, 'นาย', 'เอนก', 'แซ่เจียง', '000090', 'IT', 'ลากิจ', 'ทำบัตรประชาชน', '2023-11-13', '2023-11-13', '13:30:00', '17:30:00', 'อนุมัติ'),
(25, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 'ลาป่วย', '', '2023-11-13', '2023-11-13', '13:00:00', '17:00:00', 'อนุมัติ'),
(26, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 'ลาพักร้อน', '', '2023-11-14', '2023-11-15', '00:00:00', '00:00:00', 'อนุมัติ'),
(27, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 'ลาพักร้อน', '', '2023-11-15', '2023-11-15', '00:00:00', '00:00:00', 'ไม่อนุมัติ'),
(28, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 'ลาพักร้อน', '', '2023-11-16', '2023-11-16', '08:00:00', '08:10:33', 'อนุมัติ'),
(29, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 'ลาพักร้อน', '', '2024-08-08', '2024-08-09', '00:00:00', '12:00:48', 'ไม่อนุมัติ');

-- --------------------------------------------------------

--
-- Table structure for table `leave_number`
--

CREATE TABLE `leave_number` (
  `id_leavenum` int(10) NOT NULL COMMENT 'รหัสจำนวนการลา',
  `prefix_em` varchar(100) DEFAULT NULL,
  `firstname_em` varchar(200) NOT NULL,
  `lastname_em` varchar(200) NOT NULL,
  `id_em` varchar(50) NOT NULL COMMENT 'รหัสประจำตัวพนักงาน',
  `department_em` varchar(200) NOT NULL,
  `vacation_leave` int(10) NOT NULL DEFAULT 0 COMMENT 'จำนวนลาพักร้อนที่ลาไป',
  `sick_leave` double NOT NULL DEFAULT 0 COMMENT 'จำนวนลาป่วยที่ลาไป',
  `business_leave` double NOT NULL DEFAULT 0 COMMENT 'จำนวนลากิจที่ลาไป',
  `ordination_leave` int(10) NOT NULL DEFAULT 0 COMMENT 'จำนวนลาบวชที่ลาไป',
  `maternity_leave` int(10) NOT NULL DEFAULT 0 COMMENT 'จำนวนลาคลอดที่ลาไป',
  `other_leave` int(10) NOT NULL DEFAULT 0 COMMENT 'จำนวนลาอื่นๆที่ลาไป'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_number`
--

INSERT INTO `leave_number` (`id_leavenum`, `prefix_em`, `firstname_em`, `lastname_em`, `id_em`, `department_em`, `vacation_leave`, `sick_leave`, `business_leave`, `ordination_leave`, `maternity_leave`, `other_leave`) VALUES
(1, 'นาย', 'สมเกียรติ', 'รุ่งเรือง', '000123', 'การเงิน', 0, 0, 0, 0, 0, 0),
(2, 'นาย', 'เอนก', 'แซ่เจียง', '000090', 'IT', 0, 0, 1, 0, 0, 0),
(3, 'นาย', 'วรเมศ', 'แสงเทียน', '000095', 'การตลาด', 0, 0, 0, 0, 0, 0),
(4, 'นางสาว', 'นฤมาศ', 'เห็นดี', '000085', 'IT', 0, 0, 0, 0, 0, 0),
(5, 'นาย', 'มนัสนันท์', 'ครณาญจ์', '000089', 'การคลัง', 0, 0, 0, 0, 0, 0),
(6, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'HR', 6, 0.5, 6, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `leave_remain`
--

CREATE TABLE `leave_remain` (
  `id_leaverem` int(10) NOT NULL,
  `sick_leave` int(10) DEFAULT NULL COMMENT 'จำนวนลาป่วย',
  `business_leave` int(10) DEFAULT NULL COMMENT 'จำนวนลากิจ',
  `ordination_leave` int(10) DEFAULT NULL COMMENT 'จำนวนลาบวช',
  `maternity_leave` int(10) DEFAULT NULL COMMENT 'จำนวนลาคลอด',
  `other_leave` int(10) DEFAULT NULL COMMENT 'จำนวนลาอื่นๆ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_remain`
--

INSERT INTO `leave_remain` (`id_leaverem`, `sick_leave`, `business_leave`, `ordination_leave`, `maternity_leave`, `other_leave`) VALUES
(1, 30, 6, 120, 90, 10);

-- --------------------------------------------------------

--
-- Table structure for table `leave_vacation`
--

CREATE TABLE `leave_vacation` (
  `id_vacation` int(11) NOT NULL COMMENT 'รหัสลาพักร้อน',
  `prefix_em` varchar(100) DEFAULT NULL,
  `firstname_em` varchar(200) DEFAULT NULL COMMENT 'ชื่อพนักงาน',
  `lastname_em` varchar(200) DEFAULT NULL,
  `id_em` varchar(50) DEFAULT NULL,
  `department_em` varchar(200) DEFAULT NULL,
  `leavenumber_em` int(11) DEFAULT NULL COMMENT 'จำนวนลาพักร้อนที่ลาได้',
  `year_leave` year(4) DEFAULT NULL COMMENT 'รอบปีของลาพักร้อน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_vacation`
--

INSERT INTO `leave_vacation` (`id_vacation`, `prefix_em`, `firstname_em`, `lastname_em`, `id_em`, `department_em`, `leavenumber_em`, `year_leave`) VALUES
(1, 'นาย', 'เอนก', 'แซ่เจียง', '000090', 'IT', 10, 2023),
(3, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 7, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `ot_form`
--

CREATE TABLE `ot_form` (
  `id_ot` int(10) NOT NULL COMMENT 'รหัสโอที',
  `prefix_em` varchar(100) DEFAULT NULL,
  `firstname_em` varchar(200) DEFAULT NULL COMMENT 'ชื่อพนักงาน',
  `lastname_em` varchar(200) DEFAULT NULL COMMENT 'นามสกุลพนักงาน',
  `id_em` varchar(50) DEFAULT NULL COMMENT 'รหัสประจำตัวพนักงาน',
  `department_em` varchar(200) DEFAULT NULL COMMENT 'แผนก',
  `details` varchar(200) DEFAULT NULL COMMENT 'รายละเอียด',
  `date_ot` date DEFAULT NULL COMMENT 'วันที่ทำโอที',
  `start_ot` time DEFAULT NULL COMMENT 'เวลาเริ่มโอที',
  `end_ot` time DEFAULT NULL COMMENT 'เวลาสิ้นสุดโอที',
  `status_ot` varchar(20) DEFAULT NULL COMMENT 'สถานะโอที'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ot_form`
--

INSERT INTO `ot_form` (`id_ot`, `prefix_em`, `firstname_em`, `lastname_em`, `id_em`, `department_em`, `details`, `date_ot`, `start_ot`, `end_ot`, `status_ot`) VALUES
(1, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 'ซ่อมคอม', '2023-10-17', '17:30:00', '21:30:00', 'อนุมัติ'),
(8, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 'lk\'', '2023-11-05', '17:30:00', '19:30:00', 'อนุมัติ'),
(9, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 'Draft\r\n', '2024-08-08', '19:00:00', '20:00:00', 'รออนุมัติ');

-- --------------------------------------------------------

--
-- Table structure for table `profiles_employee`
--

CREATE TABLE `profiles_employee` (
  `id_profile` int(11) NOT NULL,
  `prefix_em` varchar(100) DEFAULT NULL COMMENT 'คำนำหน้า',
  `firstname_em` varchar(200) DEFAULT NULL,
  `lastname_em` varchar(200) DEFAULT NULL,
  `nickname_em` varchar(100) DEFAULT NULL COMMENT 'ชื่อเล่น',
  `gender_em` varchar(255) DEFAULT NULL,
  `id_em` varchar(50) NOT NULL COMMENT 'รหัสประจำตัวพนักงาน',
  `department_em` varchar(100) DEFAULT NULL,
  `position_em` varchar(100) DEFAULT NULL COMMENT 'ตำแหน่ง',
  `citizen_em` varchar(13) DEFAULT NULL COMMENT 'รหัสประจำตัวประชาชน',
  `birthday_em` date DEFAULT NULL,
  `age_em` int(5) NOT NULL,
  `weight_em` double DEFAULT NULL,
  `height_em` double DEFAULT NULL,
  `address_house_em` text DEFAULT NULL COMMENT 'บ้านเลขที่',
  `district_house_em` varchar(100) DEFAULT NULL COMMENT 'ตำบล/แขวง',
  `amphoe_house_em` varchar(100) DEFAULT NULL COMMENT 'อำเภอ/เขต',
  `province_house_em` varchar(100) DEFAULT NULL COMMENT 'จังหวัด',
  `zipcode_house_em` varchar(10) DEFAULT NULL COMMENT 'รหัสไปรษณีย์',
  `phone_em` varchar(50) DEFAULT NULL COMMENT 'โทรศัพท์',
  `email_em` varchar(100) NOT NULL,
  `startwork_em` time DEFAULT NULL COMMENT 'เวลาเริ่มงาน',
  `endwork_em` time DEFAULT NULL COMMENT 'เวลาเลิกงาน',
  `trialwork_em` int(11) NOT NULL,
  `img_em` varchar(100) DEFAULT NULL,
  `date_em` datetime DEFAULT NULL,
  `update_em` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'เวลาที่อัพเดทข้อมูล',
  `salary_em` double NOT NULL COMMENT 'เงินเดือน',
  `savings_em` double NOT NULL,
  `type_em` int(11) NOT NULL COMMENT 'ประเภทพนักงาน'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `profiles_employee`
--

INSERT INTO `profiles_employee` (`id_profile`, `prefix_em`, `firstname_em`, `lastname_em`, `nickname_em`, `gender_em`, `id_em`, `department_em`, `position_em`, `citizen_em`, `birthday_em`, `age_em`, `weight_em`, `height_em`, `address_house_em`, `district_house_em`, `amphoe_house_em`, `province_house_em`, `zipcode_house_em`, `phone_em`, `email_em`, `startwork_em`, `endwork_em`, `trialwork_em`, `img_em`, `date_em`, `update_em`, `salary_em`, `savings_em`, `type_em`) VALUES
(304, 'นาย', 'เอนก', 'แซ่เจียง', 'เอก', 'ชาย', '000090', 'IT', 'พนักงาน', '123456789456', '1995-10-06', 26, 75, 179, '17/4 หมู่ 5 ถนนบำรุงราษฎร์  ', 'ตำบลพิบูลสงคราม', ' อำเภอเมือง ', 'กรุงเทพมหานคร ', '10400', '0978561230', 'anekjiang@gmail.com', '08:30:00', '17:30:00', 0, NULL, '2019-10-17 13:30:54', '2023-10-15 13:30:54', 0, 0, 0),
(305, 'นาย', 'ธนดล', 'ทองสมบุญ', 'บอม', 'ชาย', '000152', '้hr', 'พนักงาน', '123456789456', '2000-03-29', 23, 88, 174, '17/4 หมู่ 5 ถนนบำรุงราษฎร์  ', 'ตำบลพิบูลสงคราม', ' อำเภอเมือง ', 'กรุงเทพมหานคร ', '10400', '0978561230', 'thanadol292543@gmail.com', '08:30:00', '17:30:00', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salary_employee`
--

CREATE TABLE `salary_employee` (
  `id_salary` int(10) NOT NULL COMMENT 'รหัสเงินเดือน',
  `prefix_em` varchar(100) DEFAULT NULL COMMENT 'คำนำหน้า',
  `firstname_em` varchar(200) DEFAULT NULL,
  `lastname_em` varchar(200) DEFAULT NULL,
  `id_em` varchar(50) NOT NULL COMMENT 'รหัสประจำตัวพนักงาน',
  `department_em` varchar(100) NOT NULL COMMENT 'แผนก',
  `salary_em` double NOT NULL COMMENT 'เงินเดือนพนักงาน',
  `ot_em` double NOT NULL COMMENT 'ค่า OT พนักงาน',
  `datecal` date DEFAULT current_timestamp() COMMENT 'วันที่คำนวณ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary_employee`
--

INSERT INTO `salary_employee` (`id_salary`, `prefix_em`, `firstname_em`, `lastname_em`, `id_em`, `department_em`, `salary_em`, `ot_em`, `datecal`) VALUES
(1, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 3333.3333333333, 750, '2023-11-14'),
(2, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 3333.3333333333, 750, '2023-11-14'),
(3, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 3333.3333333333, 750, '2023-11-14'),
(4, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 3333.3333333333, 750, '2023-11-14'),
(5, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 3333.3, 749.97, '2023-11-14'),
(6, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 3333.3, 749.97, '2023-11-14'),
(7, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 3333.3, 749.97, '2023-11-14'),
(8, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 3333.3, 749.97, '2023-11-14'),
(12, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 11980.51, 749.97, '2024-08-08'),
(13, 'นาย', 'วรเมศ', 'แสงเทียน', '000095', 'การตลาด', -775, 0, '2024-10-25'),
(14, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', -738.48, 0.72, '2024-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `taxdeduct_employee`
--

CREATE TABLE `taxdeduct_employee` (
  `id_taxdeduct` int(11) NOT NULL COMMENT 'รหัสลดหย่อนภาษี',
  `prefix_em` varchar(100) DEFAULT NULL,
  `firstname_em` varchar(200) DEFAULT NULL,
  `lastname_em` varchar(200) DEFAULT NULL,
  `id_em` varchar(50) DEFAULT NULL COMMENT 'รหัสประจำตัวพนักงาน',
  `department_em` varchar(100) DEFAULT NULL,
  `salary_em` double NOT NULL DEFAULT 0,
  `salary_year_em` double NOT NULL DEFAULT 0 COMMENT 'เงินเดือนทั้งปี',
  `cost_tax` double NOT NULL DEFAULT 0 COMMENT 'หักค่าใช้จ่าย',
  `parental_tax` double DEFAULT 0 COMMENT 'ลดหย่อนบิดามารดา',
  `spouse_tax` double NOT NULL DEFAULT 0 COMMENT 'คู่สมรส',
  `children_nstudy_num` int(5) NOT NULL DEFAULT 0 COMMENT 'จำนวนบุตร',
  `children_nstudy_tax` double NOT NULL DEFAULT 0 COMMENT 'ลดหย่อนบุตร',
  `adopt1_tax` double NOT NULL DEFAULT 0,
  `adopt2_tax` double NOT NULL DEFAULT 0,
  `adopt3_tax` double NOT NULL DEFAULT 0,
  `disabled_tax` double NOT NULL DEFAULT 0 COMMENT 'ทุพพลภาพ',
  `life_insurance_tax` double NOT NULL DEFAULT 0 COMMENT 'เบี้ยประกันชีวิต',
  `insurance_tax` double NOT NULL DEFAULT 0 COMMENT 'เงินสมทบกองทุนประกันสังคม',
  `health_insurance_tax` double NOT NULL DEFAULT 0 COMMENT 'ประกันสุขภาพ',
  `parental_health_tax` double NOT NULL DEFAULT 0 COMMENT 'เบี้ยประกันสุขภาพบิดารมารดา',
  `rmf_tax` double NOT NULL DEFAULT 0,
  `ssf_tax` double NOT NULL DEFAULT 0,
  `provident_tax` double NOT NULL DEFAULT 0 COMMENT 'เงินสะสมกองทุนสำรองเลี้ยงชีพ',
  `savings_tax` double NOT NULL DEFAULT 0 COMMENT 'เงินสะสม กบข.',
  `fund_savings_tax` double NOT NULL DEFAULT 0 COMMENT 'เงินสะสมกองทุน\r\nกอช.',
  `pension_tax` double NOT NULL DEFAULT 0 COMMENT 'เบี้ยบำนาญ',
  `education_tax` double NOT NULL DEFAULT 0 COMMENT 'สนับสนุนเพื่อการศึกษา',
  `other_tax` double NOT NULL DEFAULT 0 COMMENT 'อื่นๆ',
  `interest_tax` double NOT NULL DEFAULT 0 COMMENT 'ดอกเบี้ยกู้ยืม',
  `update_tax` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `taxdeduct_employee`
--

INSERT INTO `taxdeduct_employee` (`id_taxdeduct`, `prefix_em`, `firstname_em`, `lastname_em`, `id_em`, `department_em`, `salary_em`, `salary_year_em`, `cost_tax`, `parental_tax`, `spouse_tax`, `children_nstudy_num`, `children_nstudy_tax`, `adopt1_tax`, `adopt2_tax`, `adopt3_tax`, `disabled_tax`, `life_insurance_tax`, `insurance_tax`, `health_insurance_tax`, `parental_health_tax`, `rmf_tax`, `ssf_tax`, `provident_tax`, `savings_tax`, `fund_savings_tax`, `pension_tax`, `education_tax`, `other_tax`, `interest_tax`, `update_tax`) VALUES
(1, 'นาย', 'สมเกียรติ', 'รุ่งเรือง', '000123', 'การเงิน', 15000, 180000, 60000, 60000, 0, 0, 0, 0, 0, 0, 0, 0, 9000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-13 15:08:55'),
(2, 'นาย', 'เอนก', 'แซ่เจียง', '000090', 'IT', 33000, 396000, 60000, 60000, 60000, 0, 0, 0, 0, 0, 0, 12000, 9000, 20000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-11-13 18:03:21'),
(3, 'นาย', 'วรเมศ', 'แสงเทียน', '000095', 'การตลาด', 30000, 360000, 60000, 60000, 0, 0, 0, 0, 0, 0, 0, 15000, 9000, 20000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-11-13 18:03:43'),
(4, 'นางสาว', 'นฤมาศ ', 'เห็นดี', '000085', 'IT', 50000, 600000, 60000, 60000, 60000, 1, 30000, 0, 0, 0, 0, 20000, 9000, 20000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-11-13 18:04:02'),
(5, 'นาย', 'มนัสนันท์', 'ครณาญน์', '000089', 'การคลัง', 25000, 300000, 60000, 60000, 60000, 1, 30000, 0, 0, 0, 0, 15000, 9000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-11-21 18:04:17'),
(6, 'นาย', 'เอนก', 'แซ่เจียง', '000090', 'IT', 32000, 396000, 60000, 60000, 60000, 0, 0, 0, 0, 0, 0, 12000, 9000, 20000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-10-13 18:03:21'),
(7, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 20000, 240000, 60000, 60000, 60000, 0, 0, 0, 0, 0, 0, 12000, 9000, 20000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-11-13 16:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `tax_employee`
--

CREATE TABLE `tax_employee` (
  `id_tax` int(10) NOT NULL,
  `prefix_em` varchar(100) NOT NULL COMMENT 'คำนำหน้า',
  `firstname_em` varchar(200) DEFAULT NULL,
  `lastname_em` varchar(200) DEFAULT NULL,
  `id_em` varchar(50) NOT NULL COMMENT 'รหัสประจำตัวพนักงาน',
  `department_em` varchar(200) DEFAULT NULL COMMENT 'แผนก',
  `tax_year` double DEFAULT NULL COMMENT 'ภาษีรายปี',
  `tax_month` double DEFAULT NULL COMMENT 'ภาษีรายเดือน',
  `datecaltax` date DEFAULT current_timestamp() COMMENT 'วันที่คำนวณภาษี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tax_employee`
--

INSERT INTO `tax_employee` (`id_tax`, `prefix_em`, `firstname_em`, `lastname_em`, `id_em`, `department_em`, `tax_year`, `tax_month`, `datecaltax`) VALUES
(1, '', 'มนัสนันท์', 'ครณาญน์', '000089', 'การคลัง', 0, 0, '2023-08-24'),
(2, 'นาย', 'เอนก', 'แซ่เจียง', '000090', 'IT', 0, 0, '2023-08-24'),
(3, '', 'นฤมาศ ', 'เห็นดี', '000085', 'IT', 7550, 629, '2023-08-24'),
(12, 'นาย', 'สมเกียรติ', 'รุ่งเรือง', '000123', 'การเงิน', 0, 0, '2023-11-09'),
(13, 'นาย', 'เอนก', 'แซ่เจียง', '000090', 'IT', 0, 0, '2023-11-13'),
(14, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'hr', 0, 0, '2023-11-14'),
(15, 'นาย', 'เอนก', 'แซ่เจียง', '000090', 'IT', 0, 0, '2023-11-14'),
(16, 'นาย', 'สมเกียรติ', 'รุ่งเรือง', '000123', 'การเงิน', 0, 0, '2023-12-15'),
(17, 'นาย', 'วรเมศ', 'แสงเทียน', '000095', 'การตลาด', 300, 25, '2024-08-08'),
(18, 'นาย', 'เอนก', 'แซ่เจียง', '000090', 'IT', 0, 0, '2024-08-08'),
(19, 'นาย', 'เอนก', 'แซ่เจียง', '000090', 'IT', 0, 0, '2024-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) NOT NULL COMMENT 'รหัสผู้ใช้งาน',
  `prefix_em` varchar(100) DEFAULT NULL COMMENT 'คำนำหน้า',
  `firstname_em` varchar(200) NOT NULL COMMENT 'ชื่อพนักงาน',
  `lastname_em` varchar(200) NOT NULL COMMENT 'นามสกุลพนักงาน',
  `id_em` varchar(50) NOT NULL COMMENT 'รหัสประจำตัวพนักงาน',
  `email_em` varchar(100) NOT NULL COMMENT 'อีเมล',
  `passwd` varchar(300) NOT NULL COMMENT 'รหัสผ่าน',
  `department_em` varchar(100) DEFAULT NULL COMMENT 'แผนก',
  `prior_em` varchar(100) NOT NULL COMMENT 'สถานะว่าเป็นพนักงานหรือHR',
  `img_em` varchar(100) DEFAULT NULL COMMENT 'รูปพนักงาน',
  `firstlog_em` int(5) NOT NULL DEFAULT 0 COMMENT 'เช็คว่าเคยเข้าใช้งานครั้งแรกหรือยัง',
  `token_em` varchar(300) DEFAULT NULL COMMENT 'token สำหรับเปลี่ยนรหัสผ่านเมื่อลืมรหัสผ่าน',
  `expiration` datetime DEFAULT NULL COMMENT 'อายุของ token'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `prefix_em`, `firstname_em`, `lastname_em`, `id_em`, `email_em`, `passwd`, `department_em`, `prior_em`, `img_em`, `firstlog_em`, `token_em`, `expiration`) VALUES
(1, 'นาย', 'สมเกียรติ', 'รุ่งเรือง', '000123', 'somkiat000123@gmail.com', '77778888', 'การเงิน', 'employee', NULL, 0, '0', NULL),
(2, 'นาย', 'เอนก', 'แซ่เจียง', '000090', 'anekjiang@gmail.com', '$2y$10$LTC63ydCLFJ2U9l0eDMh1uj9LYE5BZ6v3Gh4wy0cbN7/g61CkRrwK', 'IT', 'employee', NULL, 1, '0', NULL),
(3, 'นาย', 'วรเมศ', 'แสงเทียน', '000095', 'worames_sangtian@gmail.com', '$2y$10$11PkuJAZc6XHf5cXw89SSuOU5UPsUzULuowd9G1DKExjZ7ewMPngC', 'การตลาด', 'SV', NULL, 1, '0', NULL),
(4, 'นาย', 'ธนดล', 'ทองสมบุญ', '000152', 'thanadol292543@gmail.com', '$2y$10$NEgE.4QLaK76XQhnV6EQHOmR2/0FQcwPNsrCfbO/ROnN0rGDJoffm', 'hr', 'HR', NULL, 1, NULL, NULL),
(6, 'นาย', 'ชัยพัฒน์', 'จงสุขศิริ', '000100', 'anglelean@gmail.com', '0', 'IT', 'employee', NULL, 0, '0', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checktime`
--
ALTER TABLE `checktime`
  ADD PRIMARY KEY (`id_checktime`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_form`
--
ALTER TABLE `leave_form`
  ADD PRIMARY KEY (`id_leave`),
  ADD KEY `id_leave` (`id_leave`);

--
-- Indexes for table `leave_number`
--
ALTER TABLE `leave_number`
  ADD PRIMARY KEY (`id_leavenum`);

--
-- Indexes for table `leave_remain`
--
ALTER TABLE `leave_remain`
  ADD PRIMARY KEY (`id_leaverem`);

--
-- Indexes for table `leave_vacation`
--
ALTER TABLE `leave_vacation`
  ADD PRIMARY KEY (`id_vacation`);

--
-- Indexes for table `ot_form`
--
ALTER TABLE `ot_form`
  ADD PRIMARY KEY (`id_ot`);

--
-- Indexes for table `profiles_employee`
--
ALTER TABLE `profiles_employee`
  ADD PRIMARY KEY (`id_profile`) USING BTREE,
  ADD KEY `id_em` (`id_profile`) USING BTREE;

--
-- Indexes for table `salary_employee`
--
ALTER TABLE `salary_employee`
  ADD PRIMARY KEY (`id_salary`);

--
-- Indexes for table `taxdeduct_employee`
--
ALTER TABLE `taxdeduct_employee`
  ADD PRIMARY KEY (`id_taxdeduct`) USING BTREE,
  ADD KEY `id_em` (`firstname_em`) USING BTREE,
  ADD KEY `id_tax` (`id_taxdeduct`) USING BTREE;

--
-- Indexes for table `tax_employee`
--
ALTER TABLE `tax_employee`
  ADD PRIMARY KEY (`id_tax`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checktime`
--
ALTER TABLE `checktime`
  MODIFY `id_checktime` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสเช็คอิน', AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `leave_form`
--
ALTER TABLE `leave_form`
  MODIFY `id_leave` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการลา', AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `leave_number`
--
ALTER TABLE `leave_number`
  MODIFY `id_leavenum` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสจำนวนการลา', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leave_remain`
--
ALTER TABLE `leave_remain`
  MODIFY `id_leaverem` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_vacation`
--
ALTER TABLE `leave_vacation`
  MODIFY `id_vacation` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสลาพักร้อน', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ot_form`
--
ALTER TABLE `ot_form`
  MODIFY `id_ot` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสโอที', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `profiles_employee`
--
ALTER TABLE `profiles_employee`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT for table `salary_employee`
--
ALTER TABLE `salary_employee`
  MODIFY `id_salary` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสเงินเดือน', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `taxdeduct_employee`
--
ALTER TABLE `taxdeduct_employee`
  MODIFY `id_taxdeduct` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสลดหย่อนภาษี', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tax_employee`
--
ALTER TABLE `tax_employee`
  MODIFY `id_tax` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้งาน', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
