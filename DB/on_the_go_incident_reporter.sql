-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 07:02 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `on_the_go incident reporter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `admin_pass` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_pass`) VALUES
('admin@123', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `c_id` int(11) NOT NULL,
  `id_no` bigint(12) NOT NULL,
  `location` varchar(50) NOT NULL,
  `type_crime` varchar(50) NOT NULL,
  `d_o_c` date NOT NULL,
  `repo_time_and_date` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `description` varchar(7000) NOT NULL,
  `inc_status` varchar(50) DEFAULT 'Unassigned',
  `pol_status` varchar(50) DEFAULT 'null',
  `p_id` varchar(50) DEFAULT 'Null',
  `image_url` text NOT NULL,
  `audio_url` text NOT NULL,
  `video_url` text NOT NULL,
  `Active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `del_taker`
--

CREATE TABLE `del_taker` (
  `c_id` int(11) NOT NULL,
  `id_no` bigint(12) NOT NULL,
  `type_crime` varchar(50) CHARACTER SET latin1 NOT NULL,
  `d_o_c` date NOT NULL,
  `repo_time_and_date` varchar(50) CHARACTER SET latin1 NOT NULL,
  `location` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description` varchar(7000) CHARACTER SET latin1 NOT NULL,
  `image_url` varchar(255) CHARACTER SET latin1 NOT NULL,
  `audio_url` varchar(255) CHARACTER SET latin1 NOT NULL,
  `video_url` varchar(255) CHARACTER SET latin1 NOT NULL,
  `inc_status` varchar(50) CHARACTER SET latin1 NOT NULL,
  `p_id` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `handler`
--

CREATE TABLE `handler` (
  `h_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `h_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `h_pass` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `handler`
--

INSERT INTO `handler` (`h_id`, `h_name`, `h_pass`) VALUES
('11@11', 'manuhe', 'e10adc3949ba59abbe56e057f20f883e'),
('22@22', 'Yoseph', 'c33367701511b4f6020ec61ded352059');

-- --------------------------------------------------------

--
-- Table structure for table `p_handler`
--

CREATE TABLE `p_handler` (
  `c_id` int(11) NOT NULL,
  `id_no` bigint(12) NOT NULL,
  `type_crime` varchar(50) CHARACTER SET latin1 NOT NULL,
  `d_o_c` date NOT NULL,
  `repo_time_and_date` varchar(50) CHARACTER SET latin1 NOT NULL,
  `location` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description` varchar(7000) CHARACTER SET latin1 NOT NULL,
  `image_url` varchar(255) CHARACTER SET latin1 NOT NULL,
  `audio_url` varchar(255) CHARACTER SET latin1 NOT NULL,
  `video_url` varchar(255) CHARACTER SET latin1 NOT NULL,
  `inc_status` varchar(50) CHARACTER SET latin1 NOT NULL,
  `pol_status` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `p_id` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sub_police`
--

CREATE TABLE `sub_police` (
  `p_name` varchar(50) NOT NULL,
  `p_id` varchar(50) NOT NULL,
  `spec` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `p_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_police`
--

INSERT INTO `sub_police` (`p_name`, `p_id`, `spec`, `location`, `p_pass`) VALUES
('Manuhe', '11@11', 'Inspector', 'Bole', 'e10adc3949ba59abbe56e057f20f883e'),
('Yoseph', '22@22', 'Commander', 'Akaki-Kality', 'c33367701511b4f6020ec61ded352059');

-- --------------------------------------------------------

--
-- Table structure for table `taker`
--

CREATE TABLE `taker` (
  `T_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `T_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `T_pass` varchar(30000) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taker`
--

INSERT INTO `taker` (`T_id`, `T_name`, `T_pass`) VALUES
('11@11', 'Manuhe', 'e10adc3949ba59abbe56e057f20f883e'),
('22@22', 'Yoseph', 'c33367701511b4f6020ec61ded352059');

-- --------------------------------------------------------

--
-- Table structure for table `update_case`
--

CREATE TABLE `update_case` (
  `c_id` int(11) NOT NULL,
  `d_o_u` timestamp NOT NULL DEFAULT current_timestamp(),
  `case_update` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_name` varchar(50) NOT NULL,
  `u_id` varchar(50) NOT NULL,
  `u_pass` varchar(50) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `woreda` int(2) NOT NULL,
  `id_no` bigint(12) NOT NULL,
  `gen` varchar(15) NOT NULL,
  `mob` bigint(13) NOT NULL,
  `code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_name`, `u_id`, `u_pass`, `sub`, `woreda`, `id_no`, `gen`, `mob`, `code`) VALUES
('Manuhe Melkamu', 'Manuheit1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Bole', 2, 11111, 'Male', 251920720239, '65249a60e116db0305efc5ee042f28b4'),
('Yoseph Negash', 'Yoseph@gmail.com', 'c33367701511b4f6020ec61ded352059', 'Akaki-Kality', 1, 22222, 'Male', 251947461118, '197fc71afb2d4bc2a754b815932ce66c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `handler`
--
ALTER TABLE `handler`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `sub_police`
--
ALTER TABLE `sub_police`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `taker`
--
ALTER TABLE `taker`
  ADD PRIMARY KEY (`T_id`);

--
-- Indexes for table `update_case`
--
ALTER TABLE `update_case`
  ADD UNIQUE KEY `d_o_u` (`d_o_u`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_no`),
  ADD UNIQUE KEY `u_id` (`u_id`),
  ADD UNIQUE KEY `mob` (`mob`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
