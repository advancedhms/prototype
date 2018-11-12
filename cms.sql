-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2018 at 09:36 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors_deduction`
--

CREATE TABLE `doctors_deduction` (
  `id` int(11) NOT NULL,
  `Doc_ID` varchar(30) DEFAULT NULL,
  `Pat_ID` varchar(30) DEFAULT NULL,
  `Disease` varchar(50) DEFAULT NULL,
  `Prescription` varchar(200) DEFAULT NULL,
  `accepted` varchar(1) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors_deduction`
--

INSERT INTO `doctors_deduction` (`id`, `Doc_ID`, `Pat_ID`, `Disease`, `Prescription`, `accepted`, `entry_date`) VALUES
(1, 'DAkoto11', 'MunIss01', 'HeadAche', 'Paracetamol', '1', '2018-11-03'),
(2, 'DAkoto11', 'Issah123', 'Tommy', 'Tea Bread', '1', '2018-11-03'),
(3, 'salisu', 'kjckjb', 'sssks', 'skskss', '1', '2018-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `pat_rep`
--

CREATE TABLE `pat_rep` (
  `pat_id` varchar(30) NOT NULL,
  `bp` varchar(10) NOT NULL,
  `pulse` varchar(10) NOT NULL,
  `temp` varchar(20) NOT NULL,
  `height` varchar(10) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `entry_date` date NOT NULL,
  `entry_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pat_rep`
--

INSERT INTO `pat_rep` (`pat_id`, `bp`, `pulse`, `temp`, `height`, `weight`, `entry_date`, `entry_time`) VALUES
('MunIss01', '56', '100', '26 Celsius', '34', '78', '2018-11-04', '10:05:30'),
('MunIss01', '56', '100', '26 Celsius', '34', '78', '2018-11-04', '10:07:19'),
('ALatif23', '45', '100', '26 Celsius', '65', '69', '2018-11-04', '10:07:48'),
('FalCao1', '45', '100', '27', '65', '78', '2018-11-04', '10:09:08'),
('Maman01', '32', '100', '36 celsius', '6 5', '78', '2018-11-04', '10:10:07'),
('Kwamena01', '89', '23', '29 Celsius', '6 6', '100.6', '2018-11-04', '12:57:11'),
('iidk', '32', '100', '27', '6 5', '10.6', '2018-11-05', '04:32:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors_deduction`
--
ALTER TABLE `doctors_deduction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors_deduction`
--
ALTER TABLE `doctors_deduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
