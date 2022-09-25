-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 25, 2022 at 10:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kadpoly_ctve`
--

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` int(11) NOT NULL,
  `link` varchar(500) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE `featured` (
  `id` int(11) NOT NULL,
  `img` varchar(500) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `featured`
--

INSERT INTO `featured` (`id`, `img`, `name`, `title`, `role`, `date`, `body`) VALUES
(99, 'img/images/envi_health.jpg', 'Maryam Yahuza', 'Sustaining Plant Life', '2', 'Jan 15, 2021', 'If you really want to understand something the best way is to explain it to someone. That forces you to sort it out in your mind, by the time you have sorted a complicated idea into little steps that even a stupid machine can deal with. Then you have certainly learn something about it yourself.');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Administrator', '{\r\n\"admin\": 1,\r\n\"moderator\": 1\r\n}'),
(2, 'staff', '{\r\n\"admin\": 0,\r\n\"moderator\": 1\r\n}');

-- --------------------------------------------------------

--
-- Table structure for table `happening`
--

CREATE TABLE `happening` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `happening`
--

INSERT INTO `happening` (`id`, `body`) VALUES
(1, '<b>Happening:</b> At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.');

-- --------------------------------------------------------

--
-- Table structure for table `news_events`
--

CREATE TABLE `news_events` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_events`
--

INSERT INTO `news_events` (`id`, `body`) VALUES
(1, 'At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.\r\n<li>Download Student Guide</li>');

-- --------------------------------------------------------

--
-- Table structure for table `pwv`
--

CREATE TABLE `pwv` (
  `id` int(11) NOT NULL,
  `pwvm` char(1) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pwv`
--

INSERT INTO `pwv` (`id`, `pwvm`, `body`) VALUES
(1, 'p', '<b>Philosophy,</b> At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.'),
(2, 'w', '<p><b>Welcome,</b> At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.</p>\r\n<p>Welcome, At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.\r\n</p>\r\n<p>Welcome, At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.\r\n</p>\r\n<br/>'),
(3, 'v', '<b>Vision: </b> At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.\r\n<br/>\r\n<b>Mission: </b> At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.\r\n<br/>\r\n<br/>');

-- --------------------------------------------------------

--
-- Table structure for table `quicklinks`
--

CREATE TABLE `quicklinks` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quicklinks`
--

INSERT INTO `quicklinks` (`id`, `body`) VALUES
(1, '<li><a href=\"results/cover.pdf\">COSC303 Test Result 2020/2021 Session</a></li>');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `link` varchar(500) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `link`, `title`) VALUES
(25, 'results/cover.pdf', '2nd Semester 200lvl result PDF');

-- --------------------------------------------------------

--
-- Table structure for table `staff_details`
--

CREATE TABLE `staff_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `middleName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gsm` varchar(13) NOT NULL,
  `department` varchar(50) NOT NULL,
  `taking` varchar(50) NOT NULL,
  `field` varchar(100) NOT NULL,
  `bio` text NOT NULL,
  `teaching` text NOT NULL,
  `schedule` text NOT NULL,
  `research` text NOT NULL,
  `publications` text NOT NULL,
  `img` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_details`
--

INSERT INTO `staff_details` (`id`, `user_id`, `title`, `firstName`, `middleName`, `lastName`, `email`, `gsm`, `department`, `taking`, `field`, `bio`, `teaching`, `schedule`, `research`, `publications`, `img`) VALUES
(1, 1, 'Prof.', 'Abdulrazak', '', 'Yahuza', 'yahuzaabdulrazak@abu.edu.ng', '08039099210', 'Computer Science', 'COSC303', 'Professor of the Practice of Common Sense', '<p>\r\n     At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.\r\n</p>\r\n\r\n<p class=\"font-weight-bold\">Education</p>\r\n\r\n<ul class=\"fa-ul\">\r\n     <li>\r\n          <span class=\"fa-li fas fa-graduation-cap\"></span>\r\n          <div>Phd., Common Sense, 2007</div>\r\n          <div class=\"small\">University of Common Sense</div>\r\n     </li>\r\n\r\n     <li>\r\n          <span class=\"fa-li fas fa-graduation-cap\"></span>\r\n          <div>MSc., Common Sense, 2004</div>\r\n          <div class=\"small\">University of Common sense</div>\r\n     </li>\r\n\r\n     <li>\r\n          <span class=\"fa-li fas fa-graduation-cap\"></span>\r\n          <div>BSc., Common Sense, 1999</div>\r\n          <div class=\"small\">University of Common Sense</div>\r\n     </li>\r\n</ul>\r\n\r\n<p class=\"font-weight-bold\">Interests</p>\r\n\r\n<ul>\r\n     <li>cybersecurity</li>\r\n     <li>digital forensics</li>\r\n     <li>botnets</li>\r\n     <li>computer science education</li>\r\n     <li>distance learning</li>\r\n     <li>collaborative learning</li>\r\n     <li>computer-assisted instruction</li>\r\n</ul>\r\n', '<strong>2019/2020 </strong>\r\n\r\n<ul class=\"small\">\r\n\r\n    <li>Cosc211 - Introduction to Machine Learning, Teaching Fellow</li>\r\n    <li>Cosc211 - Introduction to Machine Learning, Teaching Assistant</li>\r\n    <li>Cosc211 - Introduction to Machine Learning, Technical Fellow</li>\r\n    <li>Cosc301 - Data Structure, Teaching Fellow</li>\r\n    <li>Cosc301 - Data Structure, Teaching Assistant</li>\r\n    <li>Cosc301 - Data Structure, Technical Fellow</li>\r\n\r\n\r\n</ul>\r\n', '', '', ' <details class=\"mb-2 small\">\r\n    <summary>MetaCognition - Thinking about thinking, Learning about learning.</summary>\r\n\r\n    <a class=\"float-right mb-1 small text-muted text-right\" href=\"/ctve1/staff/abdullyahuza/abdullyahuza.pdf\" target=\"_blank\">\r\n        Open\r\n        <i class=\"fas fa-external-link-alt ml-1\"></i>\r\n    </a>\r\n\r\n    <div class=\"embed-responsive embed-responsive-85by110 mt-1\">\r\n        <iframe class=\"b-0 embed-responsive-item\" src=\"/ctve1/dashboard/assets/pdfjs-2.5.207/web/viewer.html?file=/ctve1/staff/abdullyahuza/abdullyahuza.pdf#pagemode=none\"></iframe>\r\n    </div>\r\n</details>\r\n', ''),
(2, 2, 'Mr.', 'Jamilu', '', 'Tahir', 'jamiltahir010@gmail.com', '08035057227', 'Economics', 'ECON303', 'P.O.P Design and Constructions', '<p>\r\n     At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.\r\n</p>\r\n\r\n<p class=\"font-weight-bold\">Education</p>\r\n\r\n<ul class=\"fa-ul\">\r\n     <li>\r\n          <span class=\"fa-li fas fa-graduation-cap\"></span>\r\n          <div>Phd., Common Sense, 2007</div>\r\n          <div class=\"small\">University of Common Sense</div>\r\n     </li>\r\n\r\n     <li>\r\n          <span class=\"fa-li fas fa-graduation-cap\"></span>\r\n          <div>MSc., Common Sense, 2004</div>\r\n          <div class=\"small\">University of Common sense</div>\r\n     </li>\r\n\r\n     <li>\r\n          <span class=\"fa-li fas fa-graduation-cap\"></span>\r\n          <div>BSc., Common Sense, 1999</div>\r\n          <div class=\"small\">University of Common Sense</div>\r\n     </li>\r\n</ul>\r\n\r\n<p class=\"font-weight-bold\">Interests</p>\r\n\r\n<ul>\r\n     <li>cybersecurity</li>\r\n     <li>digital forensics</li>\r\n     <li>botnets</li>\r\n     <li>computer science education</li>\r\n     <li>distance learning</li>\r\n     <li>collaborative learning</li>\r\n     <li>computer-assisted instruction</li>\r\n</ul>\r\n', '<strong>2019/2020 </strong>\r\n\r\n<ul class=\"small\">\r\n\r\n    <li>Cosc211 - Introduction to Machine Learning, Teaching Fellow</li>\r\n    <li>Cosc211 - Introduction to Machine Learning, Teaching Assistant</li>\r\n    <li>Cosc211 - Introduction to Machine Learning, Technical Fellow</li>\r\n    <li>Cosc301 - Data Structure, Teaching Fellow</li>\r\n    <li>Cosc301 - Data Structure, Teaching Assistant</li>\r\n    <li>Cosc301 - Data Structure, Technical Fellow</li>\r\n\r\n\r\n</ul>\r\n<strong>2020/2021 </strong>\r\n\r\n<ul class=\"small\">\r\n\r\n    <li>Cosc211 - Introduction to Machine Learning, Teaching Fellow</li>\r\n    <li>Cosc211 - Introduction to Machine Learning, Teaching Assistant</li>\r\n    <li>Cosc211 - Introduction to Machine Learning, Technical Fellow</li>\r\n    <li>Cosc301 - Data Structure, Teaching Fellow</li>\r\n    <li>Cosc301 - Data Structure, Teaching Assistant</li>\r\n    <li>Cosc301 - Data Structure, Technical Fellow</li>\r\n\r\n\r\n</ul>\r\n', '', '', ' <details class=\"mb-2 small\">\r\n    <summary>MetaCognition - Thinking about thinking, Learning about learning.</summary>\r\n\r\n    <a class=\"float-right mb-1 small text-muted text-right\" href=\"/ctve1/staff/abdullyahuza/abdullyahuza.pdf\" target=\"_blank\">\r\n        Open\r\n        <i class=\"fas fa-external-link-alt ml-1\"></i>\r\n    </a>\r\n\r\n    <div class=\"embed-responsive embed-responsive-85by110 mt-1\">\r\n        <iframe class=\"b-0 embed-responsive-item\" src=\"/ctve1/dashboard/assets/pdfjs-2.5.207/web/viewer.html?file=/ctve1/staff/abdullyahuza/abdullyahuza.pdf#pagemode=none\"></iframe>\r\n    </div>\r\n</details>\r\n', ''),
(3, 5, 'Mrs.', 'Aisha', 'Haruna', 'Yahuza', 'aeesh@gamil.com', '08099999999', 'Economics', 'ECON314', 'General Household economy ', '<p>\r\n     At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.\r\n</p>\r\n\r\n<p class=\"font-weight-bold\">Education</p>\r\n\r\n<ul class=\"fa-ul\">\r\n     <li>\r\n          <span class=\"fa-li fas fa-graduation-cap\"></span>\r\n          <div>Phd., Common Sense, 2007</div>\r\n          <div class=\"small\">University of Common Sense</div>\r\n     </li>\r\n\r\n     <li>\r\n          <span class=\"fa-li fas fa-graduation-cap\"></span>\r\n          <div>MSc., Common Sense, 2004</div>\r\n          <div class=\"small\">University of Common sense</div>\r\n     </li>\r\n\r\n     <li>\r\n          <span class=\"fa-li fas fa-graduation-cap\"></span>\r\n          <div>BSc., Common Sense, 1999</div>\r\n          <div class=\"small\">University of Common Sense</div>\r\n     </li>\r\n</ul>\r\n\r\n<p class=\"font-weight-bold\">Interests</p>\r\n\r\n<ul>\r\n     <li>cybersecurity</li>\r\n     <li>digital forensics</li>\r\n     <li>botnets</li>\r\n     <li>computer science education</li>\r\n     <li>distance learning</li>\r\n     <li>collaborative learning</li>\r\n     <li>computer-assisted instruction</li>\r\n</ul>\r\n', '<strong>2019/2020 </strong>\r\n\r\n<ul class=\"small\">\r\n    <li>Cosc211 - Introduction to Machine Learning, Teaching Fellow</li>\r\n    <li>Cosc211 - Introduction to Machine Learning, Teaching Assistant</li>\r\n    <li>Cosc211 - Introduction to Machine Learning, Technical Fellow</li>\r\n    <li>Cosc301 - Data Structure, Teaching Fellow</li>\r\n    <li>Cosc301 - Data Structure, Teaching Assistant</li>\r\n    <li>Cosc301 - Data Structure, Technical Fellow</li>\r\n</ul>\r\n', '', '', ' <details class=\"mb-2 small\">\r\n    <summary>MetaCognition - Thinking about thinking, Learning about learning.</summary>\r\n\r\n    <a class=\"float-right mb-1 small text-muted text-right\" href=\"/ctve1/staff/abdullyahuza/abdullyahuza.pdf\" target=\"_blank\">\r\n        Open\r\n        <i class=\"fas fa-external-link-alt ml-1\"></i>\r\n    </a>\r\n\r\n    <div class=\"embed-responsive embed-responsive-85by110 mt-1\">\r\n        <iframe class=\"b-0 embed-responsive-item\" src=\"/ctve1/dashboard/assets/pdfjs-2.5.207/web/viewer.html?file=/ctve1/staff/abdullyahuza/abdullyahuza.pdf#pagemode=none\"></iframe>\r\n    </div>\r\n</details>\r\n\r\n<details class=\"mb-2 small\">\r\n    <summary>Secrets To Success - Thinking about thinking, Learning about learning.</summary>\r\n\r\n    <a class=\"float-right mb-1 small text-muted text-right\" href=\"/ctve1/staff/yahuzaaisha/files/secrets_to_success.pdf\" target=\"_blank\">\r\n        Open\r\n        <i class=\"fas fa-external-link-alt ml-1\"></i>\r\n    </a>\r\n\r\n    <div class=\"embed-responsive embed-responsive-85by110 mt-1\">\r\n        <iframe class=\"b-0 embed-responsive-item\" src=\"/ctve1/dashboard/assets/pdfjs-2.5.207/web/viewer.html?file=/ctve1/staff/yahuzaaisha/files/secrets_to_success.pdf#pagemode=none\"></iframe>\r\n    </div>\r\n</details>\r\n\r\n<details class=\"mb-2 small\">\r\n    <summary>Cover Constitution - Thinking about thinking, Learning about learning.</summary>\r\n\r\n    <a class=\"float-right mb-1 small text-muted text-right\" href=\"/ctve1/staff/yahuzaaisha/files/cover_new.pdf\" target=\"_blank\">\r\n        Open\r\n        <i class=\"fas fa-external-link-alt ml-1\"></i>\r\n    </a>\r\n\r\n    <div class=\"embed-responsive embed-responsive-85by110 mt-1\">\r\n        <iframe class=\"b-0 embed-responsive-item\" src=\"/ctve1/dashboard/assets/pdfjs-2.5.207/web/viewer.html?file=/ctve1/staff/yahuzaaisha/files/cover_new.pdf#pagemode=none\"></iframe>\r\n    </div>\r\n</details>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `name`, `address`, `gender`, `designation`, `age`, `image`) VALUES
(1, 'Bruce Tom', '656 Edsel Road\r\nSherman Oaks, CA 91403', 'Male', 'Driver', 36, '1.jpg'),
(5, 'Clara Gilliam', '63 Woodridge Lane\r\nMemphis, TN 38138', 'Female', 'Programmer', 24, '2.jpg'),
(6, 'Barbra K. Hurley', '1241 Canis Heights Drive\r\nLos Angeles, CA 90017', 'Female', 'Service technician', 26, '3.jpg'),
(7, 'Antonio J. Forbes', '403 Snyder Avenue\r\nCharlotte, NC 28208', 'Male', 'Faller', 32, '4.jpg'),
(8, 'Charles D. Horst', '1636 Walnut Hill Drive\r\nCincinnati, OH 45202', 'Male', 'Financial investigator', 29, '5.jpg'),
(175, 'Ronald D. Colella', '1571 Bingamon Branch Road, Barrington, IL 60010', 'Male', 'Top executive', 32, '6.jpg'),
(174, 'Martha B. Tomlinson', '4005 Bird Spring Lane, Houston, TX 77002', 'Female', 'Systems programmer', 38, '7.jpg'),
(161, 'Glenda J. Stewart', '3482 Pursglove Court, Rossburg, OH 45362', 'Female', 'Cost consultant', 28, '8.jpg'),
(162, 'Jarrod D. Jones', '3827 Bingamon Road, Garfield Heights, OH 44125', 'Male', 'Manpower development advisor', 64, '9.jpg'),
(163, 'William C. Wright', '2653 Pyramid Valley Road, Cedar Rapids, IA 52404', 'Male', 'Political geographer', 33, '10.jpg'),
(178, 'Sara K. Ebert', '1197 Nelm Street\r\nMc Lean, VA 22102', 'Female', 'Billing machine operator', 50, ''),
(177, 'Patricia L. Scott', '1584 Dennison Street\r\nModesto, CA 95354', 'Female', 'Urban and regional planner', 54, ''),
(179, 'James K. Ridgway', '3462 Jody Road\r\nWayne, PA 19088', 'Female', 'Recreation leader', 41, ''),
(180, 'Stephen A. Crook', '448 Deercove Drive\r\nDallas, TX 75201', 'Male', 'Optical goods worker', 36, ''),
(181, 'Kimberly J. Ellis', '4905 Holt Street\r\nFort Lauderdale, FL 33301', 'Male', 'Dressing room attendant', 24, ''),
(182, 'Abdull Yahuza', '84 Kachia by Abuja road', 'Male', 'Software Adviser', 25, ''),
(183, 'Steve John', '108, Vile Parle, CL', 'Male', 'Software Engineer', 29, ''),
(184, 'Marks Johnson', '021, Big street, NY', 'Male', 'Head of IT', 41, ''),
(185, 'Mak Pub', '1462 Juniper Drive\r\nBreckenridge, MI 48612', 'Male', 'Mental health counselor', 40, ''),
(186, 'Louis C. Charmis', '1462 Juniper Drive\r\nBreckenridge, MI 48612', 'Male', 'Mental health counselor', 400, '');

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `id` int(11) NOT NULL,
  `link` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `title` varchar(5) NOT NULL,
  `gsm` varchar(13) NOT NULL,
  `password` varchar(64) NOT NULL,
  `name` varchar(50) NOT NULL,
  `joined` datetime NOT NULL,
  `group` int(11) NOT NULL,
  `role` varchar(10) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `title`, `gsm`, `password`, `name`, `joined`, `group`, `role`, `img`) VALUES
(1, 'abdullyahuza', 'yahuzaabdulrazak@abu.edu.ng', 'Dr.', '08039099210', '$2y$10$nDMFLB3W1sFpsHbtmDI1/ukx32Iiuug/h79/NiuchGSBZoDQLYp5u', 'Abdull Yahuza', '2020-10-23 18:20:08', 1, '', 'abdullyahuza.JPG'),
(2, 'TahirJamilu', 'jamiltahir010@gmail.com', 'Mr.', '08035057227', '$2y$10$F7CAq/ag8yg99zYJ.4Wu.uwXEUKs1gygTTxQVPSLlp0D0rGwBwFZC', 'Jamilu Tahir', '2020-12-09 09:41:04', 2, 'hod', 'TahirJamilu.JPG'),
(5, 'yahuzaaisha', 'aeesh@gmail.com', 'Mrs.', '08099999999', '$2y$10$YkGNVFU/IHZK6DOzMyDeoOG2mN4Vsezqqp/CYJhh02az0qVGjpZX2', 'Aisha Yahuza', '2021-01-03 21:56:40', 2, '', 'yahuzaaisha.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wall`
--

CREATE TABLE `wall` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `link` varchar(100) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wall`
--

INSERT INTO `wall` (`id`, `user_id`, `date`, `link`, `title`, `description`) VALUES
(1, 1, 'Dec 27, 2020', 'cover.pdf', 'Cosc 301 test scores', 'Cosc301 - data structures and analysis 2020/2021 academic session.'),
(2, 1, 'Dec 27, 2020', 'cv.pdf', 'Python Data Analyis using Botnet', 'Using python to analyze data by creating botnet to do the job.'),
(3, 2, 'Jan 27, 2020', 'cover.pdf', 'Jamil P.O.P Investment Limited', 'Sales and installation of p.o.p materials.'),
(5, 5, 'Jan 27, 2021', 'DENS101_Test_result.pdf', 'DENS101 Test Result 2020/2021', 'Released Wednesday 2021'),
(6, 5, 'Jan 15, 2021', 'timetables.htm', 'This semester timetable', 'This semester timetable');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `link` (`link`);

--
-- Indexes for table `featured`
--
ALTER TABLE `featured`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `happening`
--
ALTER TABLE `happening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_events`
--
ALTER TABLE `news_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pwv`
--
ALTER TABLE `pwv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quicklinks`
--
ALTER TABLE `quicklinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `link` (`link`);

--
-- Indexes for table `staff_details`
--
ALTER TABLE `staff_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetables`
--
ALTER TABLE `timetables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `link` (`link`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wall`
--
ALTER TABLE `wall`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featured`
--
ALTER TABLE `featured`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `happening`
--
ALTER TABLE `happening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news_events`
--
ALTER TABLE `news_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pwv`
--
ALTER TABLE `pwv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `staff_details`
--
ALTER TABLE `staff_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_session`
--
ALTER TABLE `users_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wall`
--
ALTER TABLE `wall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `staff_details`
--
ALTER TABLE `staff_details`
  ADD CONSTRAINT `staff_data` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
