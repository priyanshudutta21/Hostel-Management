-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 12:02 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms_p`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_login_id` int(11) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `default_admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_login_id`, `a_email`, `a_password`, `a_name`, `default_admin`) VALUES
(1, 'admin@admin.com', 'admin', 'admin', 1),
(2, 'admin@gmail.com', 'admin1234', 'admin2', 0),
(7, 'admin@gmail.com', 'admin1', 'admin opt', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `cyear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `cname`, `cyear`) VALUES
(6, 'ENGG', 8),
(7, 'IT', 3);

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `hid` int(11) NOT NULL,
  `hname` varchar(255) NOT NULL,
  `hcap` int(11) NOT NULL,
  `sroom` int(11) NOT NULL,
  `droom` int(11) NOT NULL,
  `sroomprice` int(11) NOT NULL,
  `droomprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`hid`, `hname`, `hcap`, `sroom`, `droom`, `sroomprice`, `droomprice`) VALUES
(7, 'ABC Girls Hostel', 17, 5, 6, 5000, 2500),
(8, 'ABC Boys Hostel', 25, 5, 10, 5000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `rid` mediumint(9) NOT NULL,
  `hname` varchar(255) DEFAULT NULL,
  `rno` mediumint(9) DEFAULT NULL,
  `rprice` int(11) NOT NULL,
  `rtype` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`rid`, `hname`, `rno`, `rprice`, `rtype`, `status`) VALUES
(122, 'ABC Girls Hostel', 100, 5000, 'Single', '1'),
(123, 'ABC Girls Hostel', 101, 5000, 'Single', '0'),
(124, 'ABC Girls Hostel', 102, 5000, 'Single', '0'),
(125, 'ABC Girls Hostel', 103, 5000, 'Single', '0'),
(126, 'ABC Girls Hostel', 104, 5000, 'Single', '0'),
(131, 'ABC Girls Hostel', 200, 2500, 'Double', '0'),
(132, 'ABC Girls Hostel', 201, 2500, 'Double', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(11) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `phn` int(11) NOT NULL,
  `lgname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `addrs` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `roll` int(11) NOT NULL,
  `hname` varchar(255) NOT NULL,
  `RoomTyp` varchar(255) NOT NULL,
  `RoomNo` int(11) NOT NULL,
  `Bfrm` date NOT NULL,
  `Bto` varchar(255) NOT NULL,
  `bmonth` int(11) NOT NULL,
  `TotalPayment` int(11) NOT NULL,
  `Paymentdone` int(11) NOT NULL,
  `Currentpayment` int(11) NOT NULL,
  `Cpaydate` date DEFAULT NULL,
  `Cpaytime` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sname`, `phn`, `lgname`, `fname`, `addrs`, `gender`, `course`, `roll`, `hname`, `RoomTyp`, `RoomNo`, `Bfrm`, `Bto`, `bmonth`, `TotalPayment`, `Paymentdone`, `Currentpayment`, `Cpaydate`, `Cpaytime`, `image`) VALUES
(56, 'ANGEL PRIYA', 2147483647, 'PRANAY KALITA', 'PRAFULLA SAIKIA', 'NAKASARI', 'Female', 'ENGG', 1000001, 'ABC Girls Hostel', 'Single', 100, '2020-12-01', '2021-12-31', 14, 70000, 70000, 5000, '2021-01-02', '04:19:53am', 'download.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_login_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hostel`
--
ALTER TABLE `hostel`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `rid` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
