-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2018 at 11:21 AM
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
-- Table structure for table `admito_posts`
--

CREATE TABLE `admito_posts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `query` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admito_posts`
--

INSERT INTO `admito_posts` (`id`, `name`, `query`, `status`) VALUES
(11122, 'Dinesh Sisodiya', 'i am planning to do MBA, so am seeking admition in iima, iim delhi', 1),
(11123, 'Priya Singh', 'What is the exact minimum CMAT cutoff for GLIM chennai PGDM? #GLIMChennai', 1),
(11124, 'Parichit', 'hi there, this is lokesh pursuing BCA from Amity noida, I belong to obc with academics of 88/97/87 ,is there any chances of getting into IIM A, B, C if get a CAT percentile of 99.99', 1),
(11125, 'Priya Singh', 'What is the exact minimum CMAT cutoff for iim bangalore and xlri.', 1),
(11126, 'Parichit', 'i want to know review of colleges for mba like GD and PI , about , interview Experience', 1),
(11127, 'Rohit', 'I am biotechnology graduate with 2 year work experience in IT industry. I am expecting percentile between 90 to 97. With this percentile will I be able to get into IIM Lucknow.', 1),
(11128, 'aaditya', 'I am an engineer with avg academic record I appeared for cat18 and I think I\'ll get 85-95%ile, since I\'m from middle class family I\'m planning to fund my MBA with education loan,which colleges have good ROI according to my profile?', 1),
(11129, 'Pranjli', 'IIM review, fms delhi review', 1),
(11130, 'Sangeeta', 'How much score is required for male general with commerce background having ,83%in 10th,91% in 12 and doing final year graduation.for all IIM and FMS delhi and all top 25 colleges.', 1),
(11131, 'Sonia', 'How much score is required for female general with commerce background having ,83%in 10th,91% in 12 and doing final year graduation. for all IIM and FMS delhi and all top 25 colleges.', 1),
(11133, 'Bijaya Senapati', 'I appeared nmat and scored 190 . From Which colleges i may get call ?', 1),
(11134, 'Aishwarya chatte', 'How much score is required for female nc-obc with engineering background having 91.82%in 10th,69.54 in 12 and 5.88/10 CGPA in graduation.for all IIM and FMS delhi', 0),
(11135, 'Aishwarya chatte', 'How much score is required for female nc-obc with engineering background having 91.82%in 10th,69.54 in 12 and 5.88/10 CGPA in graduation.for all IIM and FMS delhi', 1),
(11136, 'Sambhit Patra', 'Hi, I\'m an MBA aspirant, and I\'m currently scoring in the 92-96 percentile range in the mocks, sometimes lower but never above. Could you suggest any last minute tips to ace the exam on D-day?', 1),
(11137, 'Navin Bansal', 'Is it suitable for freshers to join SIIB Pune keeping in mind the curriculum? #SIIBPune', 1),
(11138, 'Pankaj Nerkar', 'I got in 10th 72% , 12th 53% and in graduation 67% then after i can got an admission in iisc Bangalore college', 1),
(11139, 'Sagarika Sharma', 'I want to know best MBA colleges which give admission without cat or any other entrance exams', 1),
(11140, 'Rithik Sisodiya', 'I have the following profile\r\n10th 65%\r\n12th 75%\r\nGrad engineering 51%\r\nGeneral male\r\nWork ex: 1 year in Amazon \r\nI am currently scoring around 75% in aimcats and would like to score above 95% in the main cat exams.\r\nWhich colleges can I try with my low acads and are any realistic chances of me getting a good college?', 1);

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
-- Indexes for table `admito_posts`
--
ALTER TABLE `admito_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`pid`,`level3`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admito_posts`
--
ALTER TABLE `admito_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11141;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
