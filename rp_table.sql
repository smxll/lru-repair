-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2020 at 10:27 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rp_table`
--

-- --------------------------------------------------------

--
-- Table structure for table `rp_inventory`
--

CREATE TABLE `rp_inventory` (
  `id` int(3) NOT NULL,
  `job_id` varchar(3) NOT NULL,
  `job_type` varchar(30) NOT NULL,
  `job_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rp_inventory`
--

INSERT INTO `rp_inventory` (`id`, `job_id`, `job_type`, `job_name`) VALUES
(101, 'E01', 'งานไฟฟ้า/โทรศัพท์', 'หลอดไฟ'),
(102, 'E01', 'งานไฟฟ้า/โทรศัพท์', 'พัดลม'),
(103, 'E01', 'งานไฟฟ้า/โทรศัพท์', 'เครื่องปรับอากาศ'),
(104, 'E01', 'งานไฟฟ้า/โทรศัพท์', 'โทรศัพท์'),
(105, 'E01', 'งานไฟฟ้า/โทรศัพท์', 'สวิทช์/ปลั๊ก'),
(106, 'E01', 'งานไฟฟ้า/โทรศัพท์', 'งานไฟฟ้าอื่นๆ'),
(201, 'P01', 'งานประปา/สุขาภิบาล', 'ท่อประปา'),
(202, 'P01', 'งานประปา/สุขาภิบาล', 'ก๊อกน้ำ'),
(203, 'P01', 'งานประปา/สุขาภิบาล', 'หัวฉีดชำระ'),
(204, 'P01', 'งานประปา/สุขาภิบาล', 'ระบบชักโครก'),
(205, 'P01', 'งานประปา/สุขาภิบาล', 'ระบบน้ำทิ้ง'),
(206, 'P01', 'งานประปา/สุขาภิบาล', 'ระบบกำจัดสิ่งปฏิกูล'),
(207, 'P01', 'งานประปา/สุขาภิบาล', 'งานประปาอื่นๆ'),
(301, 'B01', 'งานอาคาร/ไม้/ปูน/เหล็ก', 'โต๊ะ'),
(302, 'B01', 'งานอาคาร/ไม้/ปูน/เหล็ก', 'เก้าอี้'),
(303, 'B01', 'งานอาคาร/ไม้/ปูน/เหล็ก', 'ตู้'),
(304, 'B01', 'งานอาคาร/ไม้/ปูน/เหล็ก', 'ประตู'),
(305, 'B01', 'งานอาคาร/ไม้/ปูน/เหล็ก', 'หน้าต่าง'),
(306, 'B01', 'งานอาคาร/ไม้/ปูน/เหล็ก', 'ลูกบิด/กลอน'),
(307, 'B01', 'งานอาคาร/ไม้/ปูน/เหล็ก', 'หลังคา'),
(308, 'B01', 'งานอาคาร/ไม้/ปูน/เหล็ก', 'พื้น/ผนัง/เสา'),
(309, 'B01', 'งานอาคาร/ไม้/ปูน/เหล็ก', 'งานอาคารอื่นๆ'),
(401, 'A01', 'งานภูมิสถาปัตย์/ต้นไม้/สนาม', 'ตัดต้นไม้'),
(402, 'A01', 'งานภูมิสถาปัตย์/ต้นไม้/สนาม', 'ขนย้ายต้นไม้'),
(403, 'A01', 'งานภูมิสถาปัตย์/ต้นไม้/สนาม', 'งานภูมิสถาปัตย์อื่นๆ');

-- --------------------------------------------------------

--
-- Table structure for table `rp_repair`
--

CREATE TABLE `rp_repair` (
  `id` int(4) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `job_id` varchar(4) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `room` varchar(10) NOT NULL,
  `building` varchar(30) NOT NULL,
  `lands_detail` varchar(30) NOT NULL,
  `job_detail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rp_repair_status`
--

CREATE TABLE `rp_repair_status` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `job_id` varchar(4) NOT NULL,
  `room` varchar(10) NOT NULL,
  `building` varchar(30) NOT NULL,
  `lands_detail` varchar(30) NOT NULL,
  `job_detail` varchar(30) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'ยังไม่เสร็จ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rp_user`
--

CREATE TABLE `rp_user` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dept_name` varchar(30) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rp_inventory`
--
ALTER TABLE `rp_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rp_repair`
--
ALTER TABLE `rp_repair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rp_repair_status`
--
ALTER TABLE `rp_repair_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rp_user`
--
ALTER TABLE `rp_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rp_inventory`
--
ALTER TABLE `rp_inventory`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=404;

--
-- AUTO_INCREMENT for table `rp_repair`
--
ALTER TABLE `rp_repair`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rp_repair_status`
--
ALTER TABLE `rp_repair_status`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rp_user`
--
ALTER TABLE `rp_user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
