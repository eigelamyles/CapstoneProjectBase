-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 02:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `certificate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `fullname`, `contact`, `address`, `password`) VALUES
(1, 'admin@gmail.com', 'admin admin1', '09123456789', 'sample address', '@Admin0123');

-- --------------------------------------------------------

--
-- Table structure for table `clea`
--

CREATE TABLE `clea` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `completion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clea`
--

INSERT INTO `clea` (`id`, `id_number`, `department`, `status`, `completion`) VALUES
(55, '089174', 'LIBRARIAN', 'CLEARED', ''),
(56, '089174', 'CSDL', '', ''),
(57, '089174', 'GSD', '', ''),
(58, '089174', 'CITE DEAN', '', ''),
(59, '089174', 'REGISTRAR', '', ''),
(60, '089174', 'FINANCE', '', ''),
(61, '04-2023-0957', 'LIBRARIAN', 'CLEARED', ''),
(62, '04-2023-0957', 'CSDL', '', ''),
(63, '04-2023-0957', 'GSD', '', ''),
(64, '04-2023-0957', 'CITE DEAN', '', ''),
(65, '04-2023-0957', 'REGISTRAR', '', ''),
(66, '04-2023-0957', 'FINANCE', '', ''),
(67, '04-1920-01122', 'LIBRARIAN', 'CLEARED', ''),
(68, '04-1920-01122', 'CSDL', '', ''),
(69, '04-1920-01122', 'GSD', 'CLEARED', 'may kulanng'),
(70, '04-1920-01122', 'CITE DEAN', '', ''),
(71, '04-1920-01122', 'REGISTRAR', '', ''),
(72, '04-1920-01122', 'FINANCE', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dept_account`
--

CREATE TABLE `dept_account` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dept_account`
--

INSERT INTO `dept_account` (`id`, `lastname`, `firstname`, `email`, `password`, `department`) VALUES
(3, 'sample1', 'sample ', 'sample@gmail.com', '@sample123', 'GSD'),
(4, 'Jamero', 'Carla Terese', 'jamero@gmail.com', 'Password1', 'LIBRARIAN');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `year_level` varchar(255) NOT NULL,
  `account_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `id_number`, `lastname`, `firstname`, `contact`, `email`, `password`, `course`, `department`, `year_level`, `account_status`) VALUES
(6, '04-2023-0957', 'Lastname', 'Firstname', '091231', 'sample26@gmail.com', '@password1', 'Batchelor of Science in Information Technology', 'College of Information Technology', '4th Year', 'Approved'),
(7, '04-1920-01122', 'Lumawag', 'Eigela', '09123456', 'lumawag@gmail.com', '@Password1', 'Batchelor of Science in Information Technology', 'College of Information Technology', '4th Year', 'Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clea`
--
ALTER TABLE `clea`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept_account`
--
ALTER TABLE `dept_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clea`
--
ALTER TABLE `clea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dept_account`
--
ALTER TABLE `dept_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
