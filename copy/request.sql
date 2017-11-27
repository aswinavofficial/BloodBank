-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2017 at 12:09 PM
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
(2, 'test', 'O+', 'Ernakulam', '12345', 'Little Flower', 'er', '2017-11-16', '200', 'ewtr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`req_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `req_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
