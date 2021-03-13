-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2021 at 08:27 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flexi_hires`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientID` bigint(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `address` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `profileSummary` varchar(200) NOT NULL,
  `companyName` varchar(200) NOT NULL,
  `cnotificationID` int(11) NOT NULL,
  `cnotification` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientID`, `username`, `fname`, `sname`, `email`, `password`, `address`, `dob`, `profileSummary`, `companyName`, `cnotificationID`, `cnotification`) VALUES
(1, 'client', 'ClientFname', 'ClientSurname', 'email', '21232f297a57a5a743894a0e4a801fc3', '223 something road', '1999-03-12', '', '', 0, ''),
(2, 'client2', 'Client2- Fname', 'Surname', 'email', '21232f297a57a5a743894a0e4a801fc3', '44 remote street', '1993-03-03', '', '', 0, ''),
(3, 'Client3', 'Client3', 'Sname C3', 'EMAIL', 'e3afed0047b08059d0fada10f400c1e5', 'addy', '1993-03-11', '', '', 0, ''),
(4, 'Client4', 'Client 4 - Fname', 'Sname C4', 'Email', '73acd9a5972130b75066c82595a1fae3', '32 VAS STREET', '1989-03-12', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `freelancers`
--

CREATE TABLE `freelancers` (
  `freelancerID` bigint(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `address` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `profileSummary` varchar(200) NOT NULL,
  `skills` varchar(200) NOT NULL,
  `experience` varchar(200) NOT NULL,
  `education` varchar(200) NOT NULL,
  `minimumRate(£)` int(11) NOT NULL,
  `fnotificationID` int(11) NOT NULL,
  `fnotification` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `freelancers`
--

INSERT INTO `freelancers` (`freelancerID`, `username`, `fname`, `sname`, `email`, `password`, `address`, `dob`, `profileSummary`, `skills`, `experience`, `education`, `minimumRate(£)`, `fnotificationID`, `fnotification`) VALUES
(1, 'freelancer', 'fname', 'sname', 'email', '21232f297a57a5a743894a0e4a801fc3', 'addy', '1999-03-12', 'profile summary', 'web dev, voice over', '3 years web dev', 'De Monfort University', 23, 1, '1st Notification'),
(2, 'freelancer2', 'Fname testFreelancer', 'Sname testFreelancer', 'email', '21232f297a57a5a743894a0e4a801fc3', '132 gateway street', '1992-02-24', '', '', '', '', 0, 0, ''),
(3, 'freelancer3', 'Freelancer', 'Sname F3', 'EMAIL', 'e3afed0047b08059d0fada10f400c1e5', 'addy', '1992-03-11', '', '', '', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `ProjectID` bigint(11) NOT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `FreelancerID` int(11) DEFAULT NULL,
  `ProjectTitle` varchar(50) DEFAULT NULL,
  `Pay(£)` int(11) DEFAULT NULL,
  `Vacancies` int(11) DEFAULT NULL,
  `Applicants` int(11) DEFAULT NULL,
  `DueDate` date DEFAULT NULL,
  `ProjectStatus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientID`),
  ADD KEY `Key` (`fname`,`sname`,`email`,`password`,`cnotificationID`,`cnotification`);

--
-- Indexes for table `freelancers`
--
ALTER TABLE `freelancers`
  ADD PRIMARY KEY (`freelancerID`),
  ADD KEY `Key` (`fname`,`sname`,`email`,`password`,`minimumRate(£)`,`fnotificationID`,`fnotification`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`ProjectID`),
  ADD KEY `Key` (`ProjectTitle`,`Pay(£)`,`Vacancies`,`Applicants`,`DueDate`,`ProjectStatus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientID` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `freelancers`
--
ALTER TABLE `freelancers`
  MODIFY `freelancerID` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `ProjectID` bigint(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
