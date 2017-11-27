-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2017 at 01:32 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 5.6.32-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blooddonation`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodgroup`
--

CREATE TABLE `bloodgroup` (
  `id` int(11) NOT NULL,
  `BloodGroup` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodgroup`
--

INSERT INTO `bloodgroup` (`id`, `BloodGroup`) VALUES
(1, 'O+'),
(2, 'A+'),
(3, 'O-'),
(5, 'B+'),
(6, 'AB+'),
(7, 'AB-'),
(8, 'A-'),
(9, 'B-');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(10) NOT NULL,
  `Name` varchar(20) DEFAULT 'NILL',
  `Location` varchar(20) NOT NULL DEFAULT 'NILL',
  `Gender` varchar(10) NOT NULL,
  `Mob_no` varchar(20) NOT NULL,
  `Age` int(2) NOT NULL DEFAULT '0',
  `Blood_Group` varchar(4) NOT NULL DEFAULT 'NILL',
  `Type` varchar(10) NOT NULL DEFAULT 'NILL'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `Name`, `Location`, `Gender`, `Mob_no`, `Age`, `Blood_Group`, `Type`) VALUES
(10, 'ASWIN A V', 'Ernakulam', 'Male', '9746354664', 20, 'A+', 'Donor'),
(11, 'Sunil', 'Ernakulam', 'Male', '8891803255', 50, 'A+', 'Donor'),
(12, 'Meena', 'Ernakulam', 'Male', '9061655519', 46, 'O+', 'Donor'),
(13, 'Vikram', 'Kaloor', 'Male', '123456789', 25, 'A+', 'Donor'),
(14, 'test123', 'Calicut', 'Male', '123456787', 27, 'O+', 'Donor'),
(15, 'ty', 'Kannur', 'Male', '2345', 29, 'A-', 'Donor'),
(16, 'test2', 'mysore', 'Male', '987423', 24, 'O+', 'Donor'),
(17, 'test45', 'CV', 'Female', '0987', 23, 'B-', 'Donor'),
(18, 'Virat', 'Delhi', 'Male', '9865467812', 28, 'AB+', 'Donor');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `Blood_id` int(10) NOT NULL,
  `Qty` varchar(10) NOT NULL DEFAULT '0',
  `Location` varchar(20) NOT NULL DEFAULT 'NILL',
  `Blood_Group` varchar(4) NOT NULL DEFAULT 'NILL'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `Mob_no` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL DEFAULT 'NILL',
  `Type` varchar(10) NOT NULL DEFAULT 'NILL'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `Mob_no`, `password`, `Type`) VALUES
(10, '9746354664', '1234', 'Donor'),
(11, '8891803255', '12345', 'Donor'),
(12, '9061655519', '123456', 'Donor'),
(13, '123456789', '12345678', 'Donor'),
(14, '123456787', '12345', 'Donor'),
(15, '2345', '12345', 'Donor'),
(16, '987423', '123456', 'Donor'),
(17, '0987', 'NILL', 'Donor'),
(18, '9865467812', 'NILL', 'Donor');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `req_id` int(3) NOT NULL,
  `patient_name` varchar(20) NOT NULL DEFAULT 'NILL',
  `BloodGroup` varchar(20) DEFAULT 'NILL',
  `Location` varchar(20) NOT NULL,
  `mob_no` varchar(20) NOT NULL,
  `hospital_name` varchar(30) NOT NULL,
  `hospital_address` varchar(200) NOT NULL,
  `req_date` date NOT NULL,
  `Qty` varchar(10) NOT NULL,
  `info` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`req_id`, `patient_name`, `BloodGroup`, `Location`, `mob_no`, `hospital_name`, `hospital_address`, `req_date`, `Qty`, `info`) VALUES
(1, 'test', 'O+', 'Ernakulam', '12345', 'Little Flower', 'er', '2017-11-16', '200', 'ewtr'),
(2, 'test', 'O+', 'Ernakulam', '12345', 'Little Flower', 'er', '2017-11-16', '200', 'ewtr'),
(3, 'krishnan', 'A+', 'Kaloor', '123456789', 'abc', 'little', '2017-11-16', '200', 'no'),
(4, 'krishnan12', 'A+', 'Ernakulam', '123456789', 'abc', 'little', '2017-11-16', '200', 'no'),
(5, '123', 'O+', 'Ernakulam', '2345', 'yu', 'etykcj', '2017-11-17', '300', 'thdt'),
(6, 'trwt', 'O+', 'CV', 'gh', 'ui', 'dfg', '2017-11-17', '400', 'yrt'),
(7, 'Vishnu', 'A+', 'Kaloor', '987854612', 'Aster Medcity', 'KOCHI', '2017-11-29', '500', 'URGENT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Blood_id`),
  ADD UNIQUE KEY `Blood_id` (`Blood_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`req_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `req_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
