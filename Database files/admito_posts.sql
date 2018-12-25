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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admito_posts`
--
ALTER TABLE `admito_posts`
  ADD PRIMARY KEY (`id`);

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
