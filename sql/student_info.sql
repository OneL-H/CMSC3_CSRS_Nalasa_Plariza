-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 02:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `stud_num` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `units_enlisted` int(3) NOT NULL,
  `didILoginForTheFirstTime` tinyint(1) NOT NULL DEFAULT 1,
  `yearlevel` int(1) NOT NULL,
  `fname` varchar(64) NOT NULL,
  `mname` varchar(64) NOT NULL,
  `lname` varchar(64) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `bdate` date NOT NULL,
  `college` varchar(4) NOT NULL DEFAULT '0',
  `degprog` varchar(64) NOT NULL DEFAULT '0',
  `sex` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`stud_num`, `password`, `units_enlisted`, `didILoginForTheFirstTime`, `yearlevel`, `fname`, `mname`, `lname`, `address1`, `address2`, `bdate`, `college`, `degprog`, `sex`) VALUES
('2019-10613', '2019-10613', 0, 0, 4, 'Walter', 'Hartwell', 'White', '308 Negra Arroyo Lane, Albuquerque, New Mexico', '', '1998-09-07', 'CSM', 'BS Food Technology', 'M'),
('2020-11111', '2020-11111', 0, 0, 3, 'Vic', 'Calag', 'Calag', 'Davao City', '', '1999-01-01', 'CSM', 'BS Computer Science', 'M'),
('2021-06531', '2021-06531', 0, 0, 2, 'Tyrone Vincent', 'Sanchez', 'Parker', 'Davao City', '', '2001-09-06', 'CHSS', 'BS Architecture', 'M'),
('2022-03484', 'gian', 0, 0, 1, 'Violette Gwen Rai', 'Esperancilla', 'Rosales', 'Tipaz Road, Magugpo East, Tagum City', '', '2003-08-15', 'CSM', 'BS Biology', 'F'),
('2022-05204', 'ilovegwen', 0, 0, 1, 'Gian Paolo', 'Debarbo', 'Plariza', 'B1 L1 P3 Niagara Falls St., Wellspring Village, Catalunan Pequeno, Davao City', '', '2004-02-01', 'CSM', 'BS Computer Science', 'M'),
('2022-12345', '12345', 0, 0, 1, 'Juan', 'Jose', 'Dela Cruz', 'Manila, Davao City', '', '2010-10-10', 'CHSS', 'BA Communication and Media Arts', 'M');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`stud_num`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
