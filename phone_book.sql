-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 10:23 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phone_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `caller_table`
--

CREATE TABLE `caller_table` (
  `id` int(255) NOT NULL,
  `contact_num` varchar(11) NOT NULL,
  `service_providers` varchar(255) NOT NULL,
  `ci_num` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caller_table`
--

INSERT INTO `caller_table` (`id`, `contact_num`, `service_providers`, `ci_num`) VALUES
(1, '09057486176', 'Globe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `contact_type` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `contact_name`, `relationship`, `contact_type`) VALUES
(1, 'rhem', 'friend', 'work'),
(2, 'Dann', 'co-worker', 'work'),
(3, 'Dann', 'co-worker', 'work');

-- --------------------------------------------------------

--
-- Table structure for table `email_table`
--

CREATE TABLE `email_table` (
  `id` int(255) NOT NULL,
  `email_add` varchar(255) NOT NULL,
  `ci_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_table`
--

INSERT INTO `email_table` (`id`, `email_add`, `ci_id`) VALUES
(1, 'email_add', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_pb`
-- (See below for the actual view)
--
CREATE TABLE `vw_pb` (
`id` int(255)
,`contact_name` varchar(255)
,`relationship` varchar(255)
,`contact_type` varchar(22)
,`contact_num` varchar(11)
,`service_providers` varchar(255)
,`email_add` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_pb`
--
DROP TABLE IF EXISTS `vw_pb`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_pb`  AS SELECT `contact_info`.`id` AS `id`, `contact_info`.`contact_name` AS `contact_name`, `contact_info`.`relationship` AS `relationship`, `contact_info`.`contact_type` AS `contact_type`, `caller_table`.`contact_num` AS `contact_num`, `caller_table`.`service_providers` AS `service_providers`, `email_table`.`email_add` AS `email_add` FROM ((`contact_info` join `caller_table` on(`contact_info`.`id` = `caller_table`.`id`)) join `email_table` on(`contact_info`.`id` = `email_table`.`id`)) ORDER BY `contact_info`.`id` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caller_table`
--
ALTER TABLE `caller_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_table`
--
ALTER TABLE `email_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caller_table`
--
ALTER TABLE `caller_table`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `email_table`
--
ALTER TABLE `email_table`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
