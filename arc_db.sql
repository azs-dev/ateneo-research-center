-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2019 at 09:12 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `presentation`
--

CREATE TABLE `presentation` (
  `prs_id` int(100) NOT NULL,
  `prs_applicant` varchar(255) NOT NULL,
  `prs_email` varchar(255) NOT NULL,
  `prs_phone` varchar(15) NOT NULL,
  `prs_department` varchar(255) NOT NULL,
  `prs_papertitle` varchar(255) NOT NULL,
  `prs_conftitle` varchar(255) NOT NULL,
  `prs_confdate` date NOT NULL,
  `prs_reg_amount` double(255,2) DEFAULT NULL,
  `prs_air_amount` double(255,2) DEFAULT NULL,
  `prs_perdiem_amount` double(255,2) DEFAULT NULL,
  `prs_visa_amount` double(255,2) DEFAULT NULL,
  `prs_others_amount` text,
  `prs_important` text,
  `prs_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `prs_visibility` int(10) NOT NULL DEFAULT '0',
  `prs_link` int(100) DEFAULT NULL,
  `prs_date_sub` varchar(255) NOT NULL,
  `prs_feedback_sec` varchar(1000) NOT NULL,
  `prs_feedback_direc` varchar(1000) NOT NULL,
  `prs_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presentation`
--

INSERT INTO `presentation` (`prs_id`, `prs_applicant`, `prs_email`, `prs_phone`, `prs_department`, `prs_papertitle`, `prs_conftitle`, `prs_confdate`, `prs_reg_amount`, `prs_air_amount`, `prs_perdiem_amount`, `prs_visa_amount`, `prs_others_amount`, `prs_important`, `prs_status`, `prs_visibility`, `prs_link`, `prs_date_sub`, `prs_feedback_sec`, `prs_feedback_direc`, `prs_file`) VALUES
(46, 'Abdulaziz Somandar', 'azomndr@gmail.com', '09771050503', 'CSIT', 'abdulaziz sample paper', 'aziz conference', '2019-03-08', 321.00, 212.00, 412.00, 12.00, '12', 'none', 'Pending', 3, 52, '19/03/2019', 'lacking details', '', '5c90a1f627c0e2.90327646.txt'),
(47, 'Abdulaziz Somandar', 'azomndr@gmail.com', '09771050503', 'zzz', 'zzzz', 'zzzz', '2019-03-09', 0.00, 0.00, 0.00, 0.00, '', '', 'Returned to Applicant', 3, 52, '19/03/2019', 'hmm', '', '0'),
(48, 'Abdulaziz Somandar', 'azomndr@gmail.com', '09771050503', 'newnew', 'newnew', 'newnew', '2019-03-08', 0.00, 0.00, 0.00, 0.00, '', '', 'Sent to Director', 1, 52, '19/03/2019', 'newnew', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `pub_id` int(100) NOT NULL,
  `pub_applicant` varchar(255) NOT NULL,
  `pub_email` varchar(255) NOT NULL,
  `pub_phone` varchar(15) NOT NULL,
  `pub_department` varchar(255) NOT NULL,
  `pub_title` varchar(255) NOT NULL,
  `pub_publisher` varchar(255) NOT NULL,
  `pub_volume` varchar(255) NOT NULL,
  `pub_books` varchar(50) DEFAULT NULL,
  `pub_chapter` varchar(50) DEFAULT NULL,
  `pub_literary` varchar(50) DEFAULT NULL,
  `pub_journal` varchar(50) DEFAULT NULL,
  `pub_gifts` varchar(500) DEFAULT NULL,
  `pub_important` varchar(500) DEFAULT NULL,
  `pub_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `pub_visibility` int(10) NOT NULL DEFAULT '0',
  `pub_link` int(100) DEFAULT NULL,
  `pub_date_sub` varchar(255) NOT NULL,
  `pub_feedback_sec` varchar(1000) NOT NULL,
  `pub_feedback_direc` varchar(1000) NOT NULL,
  `pub_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`pub_id`, `pub_applicant`, `pub_email`, `pub_phone`, `pub_department`, `pub_title`, `pub_publisher`, `pub_volume`, `pub_books`, `pub_chapter`, `pub_literary`, `pub_journal`, `pub_gifts`, `pub_important`, `pub_status`, `pub_visibility`, `pub_link`, `pub_date_sub`, `pub_feedback_sec`, `pub_feedback_direc`, `pub_file`) VALUES
(62, 'Abdulaziz Somandar', 'azomndr@gmail.com', '09771050503', 'CSIT', 'CSIT aziz book', 'abdulaziz', 'volume 1', 'national', 'international', 'national', 'international non-isi', '', 'pls do include bla bla bla', 'Approved', 3, 52, '19/03/2019', 'yes ok good', 'ok good', '0'),
(63, 'Abdulaziz Somandar', 'azomndr@gmail.com', '09771050503', 'ded', 'ded', 'ded', 'ded', NULL, NULL, NULL, NULL, '', '', 'Returned to Applicant', 3, 52, '19/03/2019', 'lacking details', '', '0'),
(64, 'Abdulaziz Somandar', 'azomndr@gmail.com', '09771050503', 'newnew', 'newnew', 'newnew', 'newnew', NULL, NULL, NULL, NULL, '', '', 'Returned to Applicant', 3, 52, '19/03/2019', 'newnew', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `user_first` varchar(255) NOT NULL,
  `user_last` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(50) NOT NULL,
  `user_uid` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_email`, `user_phone`, `user_uid`, `user_pwd`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', '111111111', 'admin', '$2y$10$uE8/gnoU6P81mP08BYpA5.4KitDymCnh415bVxK5krlyOgLXTtCNC'),
(2, 'Secretary', 'Secretary', 'secretary@gmail.com', '222222222', 'secretary', '$2y$10$3wMROSEmiVsMU5D.jbtnwO7zpPqe8yWoR1ZthyOqzd10aFaQkgr3i'),
(52, 'Abdulaziz', 'Somandar', 'azomndr@gmail.com', '09771050503', 'azomndr', '$2y$10$1/GB9wpy9LZP8pp9bnytFe9.5bEsSty6AX6VQAXABuTeJ3vngS1/G');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `presentation`
--
ALTER TABLE `presentation`
  ADD PRIMARY KEY (`prs_id`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`pub_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `presentation`
--
ALTER TABLE `presentation`
  MODIFY `prs_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `pub_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
