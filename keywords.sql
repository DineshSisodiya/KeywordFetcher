-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2018 at 11:24 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admito`
--

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `isClg` varchar(10) NOT NULL,
  `clgId` varchar(300) NOT NULL,
  `pid` int(11) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `category` varchar(300) NOT NULL,
  `level1` varchar(300) NOT NULL,
  `level2` varchar(300) NOT NULL,
  `level3` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`isClg`, `clgId`, `pid`, `subject`, `category`, `level1`, `level2`, `level3`) VALUES
('1', 'iimamdbd', 11122, 'college', 'collegen', 'indian institute of management, ahmedabad', 'indian institute of management, ahmedabad', 'iima'),
('0', 'NA', 11123, 'College', 'CollegeP', 'admissions', 'Cut off', 'Cutoff'),
('1', 'iimamdbd', 11124, 'college', 'collegen', 'indian institute of management, ahmedabad', 'indian institute of management, ahmedabad', 'iim a'),
('0', 'NA', 11124, 'Exam', 'ExamP', 'ExamP', 'Percentile', 'Percentile'),
('0', 'NA', 11125, 'College', 'CollegeP', 'admissions', 'Cut off', 'Cutoff'),
('1', 'iimbanglo', 11125, 'college', 'collegen', 'indian institute of management, bangalore', 'indian institute of management, bangalore', 'iim bangalore'),
('1', 'xavier school of management, jamshedpur', 11125, 'college', 'collegen', 'xavier school of management, jamshedpur', 'xavier school of management, jamshedpur', 'xlri'),
('0', 'NA', 11126, 'College', 'CollegeP', 'attribute', 'About', 'about'),
('0', 'NA', 11126, 'Exam', 'ExamP', 'ExamP', 'GD', 'GD'),
('0', 'NA', 11126, 'College', 'CollegeP', 'articles', 'personal interviews', 'interview Experience'),
('0', 'NA', 11126, 'College', 'CollegeP', 'articles', 'personal interviews', 'pi'),
('1', 'iimlucknow', 11127, 'college', 'collegen', 'indian institute of management, lucknow', 'indian institute of management, lucknow', 'iim lucknow'),
('0', 'NA', 11127, 'Exam', 'ExamP', 'ExamP', 'Percentile', 'Percentile'),
('0', 'NA', 11127, 'College', 'CollegeP', 'admissions', 'Work Exp', 'Work Experience'),
('1', 'fmsdelhi', 11129, 'college', 'collegen', 'faculty of management studies, university of delhi, delhi', 'faculty of management studies, university of delhi, delhi', 'fms'),
('1', 'fmsdelhi', 11129, 'college', 'collegen', 'faculty of management studies, university of delhi, delhi', 'faculty of management studies, university of delhi, delhi', 'fms delhi'),
('1', 'fmsdelhi', 11130, 'college', 'collegen', 'faculty of management studies, university of delhi, delhi', 'faculty of management studies, university of delhi, delhi', 'fms'),
('1', 'fmsdelhi', 11130, 'college', 'collegen', 'faculty of management studies, university of delhi, delhi', 'faculty of management studies, university of delhi, delhi', 'fms delhi'),
('0', 'NA', 11130, 'Exam', 'ExamP', 'ExamP', 'Score', 'Score'),
('1', 'fmsdelhi', 11131, 'college', 'collegen', 'faculty of management studies, university of delhi, delhi', 'faculty of management studies, university of delhi, delhi', 'fms'),
('1', 'fmsdelhi', 11131, 'college', 'collegen', 'faculty of management studies, university of delhi, delhi', 'faculty of management studies, university of delhi, delhi', 'fms delhi'),
('0', 'NA', 11131, 'Exam', 'ExamP', 'ExamP', 'Score', 'Score'),
('1', 'fmsdelhi', 11134, 'college', 'collegen', 'faculty of management studies, university of delhi, delhi', 'faculty of management studies, university of delhi, delhi', 'fms'),
('1', 'fmsdelhi', 11134, 'college', 'collegen', 'faculty of management studies, university of delhi, delhi', 'faculty of management studies, university of delhi, delhi', 'fms delhi'),
('0', 'NA', 11134, 'Exam', 'ExamP', 'ExamP', 'Score', 'Score'),
('1', 'fmsdelhi', 11135, 'college', 'collegen', 'faculty of management studies, university of delhi, delhi', 'faculty of management studies, university of delhi, delhi', 'fms'),
('1', 'fmsdelhi', 11135, 'college', 'collegen', 'faculty of management studies, university of delhi, delhi', 'faculty of management studies, university of delhi, delhi', 'fms delhi'),
('0', 'NA', 11135, 'Exam', 'ExamP', 'ExamP', 'Score', 'Score'),
('0', 'NA', 11136, 'Exam', 'ExamP', 'ExamP', 'Exam', 'Exam'),
('0', 'NA', 11136, 'Exam', 'ExamP', 'ExamP', 'Percentile', 'Percentile'),
('0', 'NA', 11138, 'College', 'CollegeP', 'admissions', '10th', '10th'),
('0', 'NA', 11138, 'College', 'CollegeP', 'admissions', '12th', '12th'),
('0', 'NA', 11139, 'Exam', 'ExamP', 'ExamP', 'Entrance', 'Entrance'),
('0', 'NA', 11140, 'Exam', 'ExamP', 'ExamP', 'Score', 'Score');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`pid`,`level3`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
