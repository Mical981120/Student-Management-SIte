-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2022 at 01:51 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abcinstitute`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`) VALUES
(3, 'CSI002 Exam ', '2022-03-02 00:00:00', '2022-03-03 00:00:00'),
(4, 'CSI004 Exam', '2022-03-02 00:00:00', '2022-03-03 00:00:00'),
(5, 'Award Ceromany', '2022-03-03 00:00:00', '2022-03-04 00:00:00'),
(7, 'Exam ', '2022-03-07 03:00:00', '2022-03-07 03:30:00'),
(8, 'Exam', '2022-03-07 05:00:00', '2022-03-07 05:30:00'),
(9, 'Software Carpentry Exam', '2022-04-07 00:00:00', '2022-04-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `paymentrecords`
--

CREATE TABLE `paymentrecords` (
  `id` int(8) NOT NULL,
  `login` varchar(10) NOT NULL,
  `MID` varchar(10) NOT NULL,
  `Amount` varchar(10) NOT NULL,
  `Pmethod` varchar(220) NOT NULL,
  `Status` varchar(220) NOT NULL,
  `PaymentDate` date NOT NULL,
  `Month` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentrecords`
--

INSERT INTO `paymentrecords` (`id`, `login`, `MID`, `Amount`, `Pmethod`, `Status`, `PaymentDate`, `Month`) VALUES
(1, 'ST001', 'JN001', '40000.00', 'Visa', 'Payed', '2022-02-10', 'January'),
(3, 'ST001', 'MR001', '40000.00', 'Visa', 'Payed', '2022-04-10', 'March'),
(4, 'ST001', 'MR001', '40000.00', 'Direct Transfer', 'Payed', '2022-04-10', 'March'),
(5, 'ST001', 'FB002', '40000.00', 'Direct Transfer', 'Payed', '2022-03-10', 'March');

-- --------------------------------------------------------

--
-- Table structure for table `pcass`
--

CREATE TABLE `pcass` (
  `id` int(8) NOT NULL,
  `CourseI` varchar(220) NOT NULL,
  `login` varchar(220) NOT NULL,
  `BatchN` varchar(220) NOT NULL,
  `Sday` date NOT NULL,
  `Semester` varchar(220) NOT NULL,
  `Subject` varchar(220) NOT NULL,
  `name` varchar(220) NOT NULL,
  `size` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pcass`
--

INSERT INTO `pcass` (`id`, `CourseI`, `login`, `BatchN`, `Sday`, `Semester`, `Subject`, `name`, `size`) VALUES
(1, 'SF/002/3', 'SF0001', 'Batch 01', '2022-03-30', 'Semester 1', 'SFM/000/3SF', '71FBKflFvpL._AC_SL1500_.jpg', 111969),
(2, 'SF0004', 'SF00065', 'Batch 04', '2022-04-13', 'Semester 1', 'SFM/000/3SF', '', 0),
(4, 'SF0001', 'CSI005Data', 'Batch 06', '2022-04-07', 'Semester 3', 'Research Project', 'loads.zip', 173797),
(5, 'SF/002/3', 'CSI005Data', 'Batch 01', '2022-04-20', 'Semester 4', 'Research Project', 'loads.zip', 173797);

-- --------------------------------------------------------

--
-- Table structure for table `pcpayment`
--

CREATE TABLE `pcpayment` (
  `id` int(8) NOT NULL,
  `MID` varchar(8) NOT NULL,
  `Amount` varchar(10) NOT NULL,
  `Ldate` date NOT NULL,
  `Month` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pcpayment`
--

INSERT INTO `pcpayment` (`id`, `MID`, `Amount`, `Ldate`, `Month`) VALUES
(1, 'JN001', '40000.00', '2022-02-10', 'January'),
(8, 'FB002', '40000.00', '2022-03-10', 'March');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(8) NOT NULL,
  `login` varchar(220) NOT NULL,
  `Fname` varchar(220) NOT NULL,
  `BatchN` varchar(220) NOT NULL,
  `CourseI` varchar(220) NOT NULL,
  `Rday` date NOT NULL,
  `Semester` varchar(220) NOT NULL,
  `Subject` varchar(220) NOT NULL,
  `Result` varchar(220) NOT NULL,
  `Grade` varchar(220) NOT NULL,
  `Feedback` varchar(220) NOT NULL,
  `StudentI` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `login`, `Fname`, `BatchN`, `CourseI`, `Rday`, `Semester`, `Subject`, `Result`, `Grade`, `Feedback`, `StudentI`) VALUES
(1, 'ST001', 'Lasith Fernando', 'Batch 01', 'SF/002/3', '2022-04-07', 'Semester 1', 'System Analysis', '88%', 'A+', 'Good ', 'ST110001');

-- --------------------------------------------------------

--
-- Table structure for table `stassignment`
--

CREATE TABLE `stassignment` (
  `id` int(8) NOT NULL,
  `login` varchar(220) NOT NULL,
  `CourseI` varchar(220) NOT NULL,
  `BatchN` varchar(220) NOT NULL,
  `Semester` varchar(220) NOT NULL,
  `Subject` varchar(220) NOT NULL,
  `Sday` date NOT NULL,
  `name` varchar(220) NOT NULL,
  `size` int(10) NOT NULL,
  `SubjecID` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stassignment`
--

INSERT INTO `stassignment` (`id`, `login`, `CourseI`, `BatchN`, `Semester`, `Subject`, `Sday`, `name`, `size`, `SubjecID`) VALUES
(9, 'ST001', 'SF0001', 'Batch 06', 'Semester 3', 'Research Project', '2022-04-07', 'Reflective Review.docx', 863390, 'CSI005Data'),
(11, 'ST001', 'SF/002/3', 'Batch 01', 'Semester 4', 'Research Project', '2022-04-20', 'loads.zip', 173797, 'CSI005Data');

-- --------------------------------------------------------

--
-- Table structure for table `stdetails`
--

CREATE TABLE `stdetails` (
  `Fname` varchar(50) NOT NULL,
  `BatchN` varchar(50) NOT NULL,
  `CourseI` varchar(10) NOT NULL,
  `Pdtime` varchar(20) NOT NULL,
  `Jday` date NOT NULL,
  `Course` varchar(20) NOT NULL,
  `name` varchar(225) NOT NULL,
  `size` int(20) NOT NULL,
  `id` int(8) NOT NULL,
  `login` varchar(8) NOT NULL,
  `Branch` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stdetails`
--

INSERT INTO `stdetails` (`Fname`, `BatchN`, `CourseI`, `Pdtime`, `Jday`, `Course`, `name`, `size`, `id`, `login`, `Branch`) VALUES
('Dilina Malith', 'Batch 05', 'SF/002/3', '3 Years', '2022-04-13', 'Civil Eng', '61xWqwRPuQL._AC_SL1000_.jpg', 65429, 10, 'ST003', 'Gampaha'),
('Ravindu Sathsara', 'Batch 01', 'SF/002/3', '4 Years', '2022-04-28', 'Electronic Eng', '71FBKflFvpL._AC_SL1500_.jpg', 111969, 13, 'ST002', 'Kandy'),
('Ravindu Heshan', 'Batch 01', 'SF/002/3', '3 Years', '2022-04-28', 'Electronic Eng', '61xWqwRPuQL._AC_SL1000_.jpg', 65429, 18, 'ST005', 'Kandy'),
('Kavindy Mendis', 'Batch 01', 'SF/002/3', '3 Years', '2022-04-21', 'Civil Eng', '61xWqwRPuQL._AC_SL1000_.jpg', 65429, 20, 'ST004', 'Galle');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `login` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(11) NOT NULL DEFAULT '0',
  `Fname` varchar(220) NOT NULL,
  `Address` varchar(220) NOT NULL,
  `Mobile` int(10) NOT NULL,
  `Email` varchar(220) NOT NULL,
  `NIC` varchar(10) NOT NULL,
  `Pname` varchar(220) NOT NULL,
  `size` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `role`, `Fname`, `Address`, `Mobile`, `Email`, `NIC`, `Pname`, `size`) VALUES
(18, 'Ravindu Mendis', 'MS001', '123', 'M', 'Ravindu Mendis Ravindu Mendis', 'N0 3 Colombo', 788886767, 'Ravn44@gmail.com', '975642332v', '71FBKflFvpL._AC_SL1500_.jpg', 111969),
(19, 'Ravindu Perea', 'PC001', '123', 'P', 'Ravindu Mendis', 'N0 6 Gampaha', 786644545, 'Rv34@gmail.com', '975642332v', '61xWqwRPuQL._AC_SL1000_.jpg', 65429),
(21, 'Lakshan Gamage', 'ST001', '123', 'S', 'Pathirana', 'No 78 Colombo', 775554058, 'lak22@gmail.com', '984564321v', '71FBKflFvpL._AC_SL1500_.jpg', 111969);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentrecords`
--
ALTER TABLE `paymentrecords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pcass`
--
ALTER TABLE `pcass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pcpayment`
--
ALTER TABLE `pcpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stassignment`
--
ALTER TABLE `stassignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stdetails`
--
ALTER TABLE `stdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `paymentrecords`
--
ALTER TABLE `paymentrecords`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pcass`
--
ALTER TABLE `pcass`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pcpayment`
--
ALTER TABLE `pcpayment`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stassignment`
--
ALTER TABLE `stassignment`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `stdetails`
--
ALTER TABLE `stdetails`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
