-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2015 at 08:48 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project_se`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `Username` varchar(24) NOT NULL,
  `Password` char(60) NOT NULL,
  `Fullname` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Username`, `Password`, `Fullname`) VALUES
('ashesh', '$2y$12$hhh3A3w0WkVLdWMhpWLGLuSzevW8/Xp82.0yU8fHLfu89odV65NhS', 'Ashesh Kumar Singh'),
('parag', '$2y$12$lAKm73PJI7wy6m4q.VCdh.YwNHc2lqI4aSTYIEmajiPcE7DtuPZmm', 'Parag Watwe'),
('pritesh', '$2y$12$eaFalRNBatrnItx4EhFA5OGm1pNXPswBjt1KMiGZPqZ.px71FmpcS', 'Pritesh Tupe'),
('shubham', '$2y$12$vGmjmmjJJx/00iQ4beM/PuUMOvS3aMcTsGXtHx8mapLNqayyrpCbq', 'Shubham Thakur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
ADD PRIMARY KEY (`Username`), ADD UNIQUE KEY `Fullname` (`Fullname`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
