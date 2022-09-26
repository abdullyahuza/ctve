--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `title` varchar(5) NOT NULL,
  `gsm` varchar(13) NOT NULL,
  `password` varchar(64) NOT NULL,
  `name` varchar(50) NOT NULL,
  `joined` datetime NOT NULL,
  `group` int(11) NOT NULL,
  `role` varchar(10) NOT NULL,
  `img` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
);


CREATE TABLE `downloads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(500) NOT NULL,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `link` (`link`)
);

CREATE TABLE `featured` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(500) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
);

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL,
  PRIMARY KEY (`id`)
);


CREATE TABLE `happening` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `news_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `pwv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pwvm` char(1) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `quicklinks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
);


CREATE TABLE `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(500) NOT NULL,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `link` (`link`)
);


--
-- Table structure for table `staff_details`
--

CREATE TABLE `staff_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `firstName` varchar(20) DEFAULT NULL,
  `middleName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gsm` varchar(13) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `taking` varchar(50) DEFAULT NULL,
  `field` varchar(100) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `teaching` text DEFAULT NULL,
  `schedule` text DEFAULT NULL,
  `research` text DEFAULT NULL,
  `publications` text DEFAULT NULL,
  `img` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
);


--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `link` (`link`)
);

-- --------------------------------------------------------


--
-- Table structure for table `users_session`
--

CREATE TABLE `users_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
);

-- --------------------------------------------------------

--
-- Table structure for table `wall`
--

CREATE TABLE `wall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `link` varchar(100) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `users` (`id`, `username`, `email`, `title`, `gsm`, `password`, `name`, `joined`, `group`, `role`, `img`) VALUES
(1, 'abdullyahuza', 'yahuzaabdulrazak@abu.edu.ng', 'Dr.', '08039099210', '$2y$10$25e5HtVfsIsnG7C/bLaKqeng.mX2EPc9PFaF43Z4W2ifFbiC3YxGW', 'Abdull Yahuza', '2020-10-23 18:20:08', 1, '', 'abdullyahuza.JPG'),
(2, 'TahirJamilu', 'jamiltahir010@gmail.com', 'Mr.', '08035057227', '$2y$10$F7CAq/ag8yg99zYJ.4Wu.uwXEUKs1gygTTxQVPSLlp0D0rGwBwFZC', 'Jamilu Tahir', '2020-12-09 09:41:04', 2, 'hod', 'TahirJamilu.JPG'),
(5, 'yahuzaaisha', 'aeesh@gmail.com', 'Mrs.', '08099999999', '$2y$10$YkGNVFU/IHZK6DOzMyDeoOG2mN4Vsezqqp/CYJhh02az0qVGjpZX2', 'Aisha Yahuza', '2021-01-03 21:56:40', 2, '', 'yahuzaaisha.JPG'),
(16, 'YahuzaAnas', 'nasyam@gmail.com', 'Mal.', '08039099210', '$2y$10$5CQEMtaCCqRhlnB13nvPnOrs6OLbZLo1YT2i19kCZ36S8LHO6SXny', 'Anas Yahuza', '2022-09-27 00:23:48', 2, 'hod', 'YahuzaAnas.JPG');

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Administrator', '{\r\n\"admin\": 1,\r\n\"moderator\": 1\r\n}'),
(2, 'staff', '{\r\n\"admin\": 0,\r\n\"moderator\": 1\r\n}');

INSERT INTO `featured` (`id`, `img`, `name`, `title`, `role`, `date`, `body`) VALUES
(99, 'img/images/envi_health.jpg', 'Maryam Yahuza', 'Sustaining Plant Life', '2', 'Jan 15, 2021', 'If you really want to understand something the best way is to explain it to someone. That forces you to sort it out in your mind, by the time you have sorted a complicated idea into little steps that even a stupid machine can deal with. Then you have certainly learn something about it yourself.');

INSERT INTO `happening` (`id`, `body`) VALUES
(1, '<b>Happening:</b> At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.');


INSERT INTO `news_events` (`id`, `body`) VALUES
(1, 'At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.\r\n<li>Download Student Guide</li>');

INSERT INTO `pwv` (`id`, `pwvm`, `body`) VALUES
(1, 'p', '<b>Philosophy,</b> At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.'),
(2, 'w', '<p><b>Welcome,</b> At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.</p>\r\n<p>Welcome, At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.\r\n</p>\r\n<p>Welcome, At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.\r\n</p>\r\n<br/>'),
(3, 'v', '<b>Vision: </b> At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.\r\n<br/>\r\n<b>Mission: </b> At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.\r\n<br/>\r\n<br/>');

INSERT INTO `quicklinks` (`id`, `body`) VALUES
(1, '<li><a href=\"results/cover.pdf\">COSC303 Test Result 2020/2021 Session</a></li>');

INSERT INTO `results` (`id`, `link`, `title`) VALUES
(25, 'results/cover.pdf', '2nd Semester 200lvl result PDF');


INSERT INTO `staff_details` (`id`, `user_id`, `title`, `firstName`, `middleName`, `lastName`, `email`, `gsm`, `department`, `taking`, `field`, `bio`, `teaching`, `schedule`, `research`, `publications`, `img`) VALUES
(1, 1, 'Prof.', 'Abdulrazak', '', 'Yahuza', 'yahuzaabdulrazak@abu.edu.ng', '08039099210', 'Computer Science', 'COSC303', 'Professor of the Practice of Common Sense', '<p>\r\n     At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.\r\n</p>\r\n\r\n<p class=\"font-weight-bold\">Education</p>\r\n\r\n<ul class=\"fa-ul\">\r\n     <li>\r\n          <span class=\"fa-li fas fa-graduation-cap\"></span>\r\n          <div>Phd., Common Sense, 2007</div>\r\n          <div class=\"small\">University of Common Sense</div>\r\n     </li>\r\n\r\n     <li>\r\n          <span class=\"fa-li fas fa-graduation-cap\"></span>\r\n          <div>MSc., Common Sense, 2004</div>\r\n          <div class=\"small\">University of Common sense</div>\r\n     </li>\r\n\r\n     <li>\r\n          <span class=\"fa-li fas fa-graduation-cap\"></span>\r\n          <div>BSc., Common Sense, 1999</div>\r\n          <div class=\"small\">University of Common Sense</div>\r\n     </li>\r\n</ul>\r\n\r\n<p class=\"font-weight-bold\">Interests</p>\r\n\r\n<ul>\r\n     <li>cybersecurity</li>\r\n     <li>digital forensics</li>\r\n     <li>botnets</li>\r\n     <li>computer science education</li>\r\n     <li>distance learning</li>\r\n     <li>collaborative learning</li>\r\n     <li>computer-assisted instruction</li>\r\n</ul>\r\n', '<strong>2019/2020 </strong>\r\n\r\n<ul class=\"small\">\r\n\r\n    <li>Cosc211 - Introduction to Machine Learning, Teaching Fellow</li>\r\n    <li>Cosc211 - Introduction to Machine Learning, Teaching Assistant</li>\r\n    <li>Cosc211 - Introduction to Machine Learning, Technical Fellow</li>\r\n    <li>Cosc301 - Data Structure, Teaching Fellow</li>\r\n    <li>Cosc301 - Data Structure, Teaching Assistant</li>\r\n    <li>Cosc301 - Data Structure, Technical Fellow</li>\r\n\r\n\r\n</ul>\r\n', '', '', ' <details class=\"mb-2 small\">\r\n    <summary>MetaCognition - Thinking about thinking, Learning about learning.</summary>\r\n\r\n    <a class=\"float-right mb-1 small text-muted text-right\" href=\"/ctve1/staff/abdullyahuza/abdullyahuza.pdf\" target=\"_blank\">\r\n        Open\r\n        <i class=\"fas fa-external-link-alt ml-1\"></i>\r\n    </a>\r\n\r\n    <div class=\"embed-responsive embed-responsive-85by110 mt-1\">\r\n        <iframe class=\"b-0 embed-responsive-item\" src=\"/ctve1/dashboard/assets/pdfjs-2.5.207/web/viewer.html?file=/ctve1/staff/abdullyahuza/abdullyahuza.pdf#pagemode=none\"></iframe>\r\n    </div>\r\n</details>\r\n', ''),
(2, 2, 'Mr.', 'Jamilu', '', 'Tahir', 'jamiltahir010@gmail.com', '08035057227', 'Economics', 'ECON303', 'P.O.P Design and Constructions', '<p>\r\n     At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.\r\n</p>\r\n\r\n<p class=\"font-weight-bold\">Education</p>\r\n\r\n<ul class=\"fa-ul\">\r\n     <li>\r\n          <span class=\"fa-li fas fa-graduation-cap\"></span>\r\n          <div>Phd., Common Sense, 2007</div>\r\n          <div class=\"small\">University of Common Sense</div>\r\n     </li>\r\n\r\n     <li>\r\n          <span class=\"fa-li fas fa-graduation-cap\"></span>\r\n          <div>MSc., Common Sense, 2004</div>\r\n          <div class=\"small\">University of Common sense</div>\r\n     </li>\r\n\r\n     <li>\r\n          <span class=\"fa-li fas fa-graduation-cap\"></span>\r\n          <div>BSc., Common Sense, 1999</div>\r\n          <div class=\"small\">University of Common Sense</div>\r\n     </li>\r\n</ul>\r\n\r\n<p class=\"font-weight-bold\">Interests</p>\r\n\r\n<ul>\r\n     <li>cybersecurity</li>\r\n     <li>digital forensics</li>\r\n     <li>botnets</li>\r\n     <li>computer science education</li>\r\n     <li>distance learning</li>\r\n     <li>collaborative learning</li>\r\n     <li>computer-assisted instruction</li>\r\n</ul>\r\n', '<strong>2019/2020 </strong>\r\n\r\n<ul class=\"small\">\r\n\r\n    <li>Cosc211 - Introduction to Machine Learning, Teaching Fellow</li>\r\n    <li>Cosc211 - Introduction to Machine Learning, Teaching Assistant</li>\r\n    <li>Cosc211 - Introduction to Machine Learning, Technical Fellow</li>\r\n    <li>Cosc301 - Data Structure, Teaching Fellow</li>\r\n    <li>Cosc301 - Data Structure, Teaching Assistant</li>\r\n    <li>Cosc301 - Data Structure, Technical Fellow</li>\r\n\r\n\r\n</ul>\r\n<strong>2020/2021 </strong>\r\n\r\n<ul class=\"small\">\r\n\r\n    <li>Cosc211 - Introduction to Machine Learning, Teaching Fellow</li>\r\n    <li>Cosc211 - Introduction to Machine Learning, Teaching Assistant</li>\r\n    <li>Cosc211 - Introduction to Machine Learning, Technical Fellow</li>\r\n    <li>Cosc301 - Data Structure, Teaching Fellow</li>\r\n    <li>Cosc301 - Data Structure, Teaching Assistant</li>\r\n    <li>Cosc301 - Data Structure, Technical Fellow</li>\r\n\r\n\r\n</ul>\r\n', '', '', ' <details class=\"mb-2 small\">\r\n    <summary>MetaCognition - Thinking about thinking, Learning about learning.</summary>\r\n\r\n    <a class=\"float-right mb-1 small text-muted text-right\" href=\"/ctve1/staff/abdullyahuza/abdullyahuza.pdf\" target=\"_blank\">\r\n        Open\r\n        <i class=\"fas fa-external-link-alt ml-1\"></i>\r\n    </a>\r\n\r\n    <div class=\"embed-responsive embed-responsive-85by110 mt-1\">\r\n        <iframe class=\"b-0 embed-responsive-item\" src=\"/ctve1/dashboard/assets/pdfjs-2.5.207/web/viewer.html?file=/ctve1/staff/abdullyahuza/abdullyahuza.pdf#pagemode=none\"></iframe>\r\n    </div>\r\n</details>\r\n', ''),
(3, 5, 'Mrs.', 'Aisha', 'Haruna', 'Yahuza', 'aeesh@gamil.com', '08099999999', 'Economics', 'ECON314', 'General Household economy ', '<p>\r\n     At iCroft We believe that creativity is the backbone of anything out there, be it technology, business, or art. And that\'s why ours speaks for us. When you do the things you love you will never get bored in your life.\r\n</p>\r\n\r\n<p class=\"font-weight-bold\">Education</p>\r\n\r\n<ul class=\"fa-ul\">\r\n     <li>\r\n          <span class=\"fa-li fas fa-graduation-cap\"></span>\r\n          <div>Phd., Common Sense, 2007</div>\r\n          <div class=\"small\">University of Common Sense</div>\r\n     </li>\r\n\r\n     <li>\r\n          <span class=\"fa-li fas fa-graduation-cap\"></span>\r\n          <div>MSc., Common Sense, 2004</div>\r\n          <div class=\"small\">University of Common sense</div>\r\n     </li>\r\n\r\n     <li>\r\n          <span class=\"fa-li fas fa-graduation-cap\"></span>\r\n          <div>BSc., Common Sense, 1999</div>\r\n          <div class=\"small\">University of Common Sense</div>\r\n     </li>\r\n</ul>\r\n\r\n<p class=\"font-weight-bold\">Interests</p>\r\n\r\n<ul>\r\n     <li>cybersecurity</li>\r\n     <li>digital forensics</li>\r\n     <li>botnets</li>\r\n     <li>computer science education</li>\r\n     <li>distance learning</li>\r\n     <li>collaborative learning</li>\r\n     <li>computer-assisted instruction</li>\r\n</ul>\r\n', '<strong>2019/2020 </strong>\r\n\r\n<ul class=\"small\">\r\n    <li>Cosc211 - Introduction to Machine Learning, Teaching Fellow</li>\r\n    <li>Cosc211 - Introduction to Machine Learning, Teaching Assistant</li>\r\n    <li>Cosc211 - Introduction to Machine Learning, Technical Fellow</li>\r\n    <li>Cosc301 - Data Structure, Teaching Fellow</li>\r\n    <li>Cosc301 - Data Structure, Teaching Assistant</li>\r\n    <li>Cosc301 - Data Structure, Technical Fellow</li>\r\n</ul>\r\n', '', '', ' <details class=\"mb-2 small\">\r\n    <summary>MetaCognition - Thinking about thinking, Learning about learning.</summary>\r\n\r\n    <a class=\"float-right mb-1 small text-muted text-right\" href=\"/ctve1/staff/abdullyahuza/abdullyahuza.pdf\" target=\"_blank\">\r\n        Open\r\n        <i class=\"fas fa-external-link-alt ml-1\"></i>\r\n    </a>\r\n\r\n    <div class=\"embed-responsive embed-responsive-85by110 mt-1\">\r\n        <iframe class=\"b-0 embed-responsive-item\" src=\"/ctve1/dashboard/assets/pdfjs-2.5.207/web/viewer.html?file=/ctve1/staff/abdullyahuza/abdullyahuza.pdf#pagemode=none\"></iframe>\r\n    </div>\r\n</details>\r\n\r\n<details class=\"mb-2 small\">\r\n    <summary>Secrets To Success - Thinking about thinking, Learning about learning.</summary>\r\n\r\n    <a class=\"float-right mb-1 small text-muted text-right\" href=\"/ctve1/staff/yahuzaaisha/files/secrets_to_success.pdf\" target=\"_blank\">\r\n        Open\r\n        <i class=\"fas fa-external-link-alt ml-1\"></i>\r\n    </a>\r\n\r\n    <div class=\"embed-responsive embed-responsive-85by110 mt-1\">\r\n        <iframe class=\"b-0 embed-responsive-item\" src=\"/ctve1/dashboard/assets/pdfjs-2.5.207/web/viewer.html?file=/ctve1/staff/yahuzaaisha/files/secrets_to_success.pdf#pagemode=none\"></iframe>\r\n    </div>\r\n</details>\r\n\r\n<details class=\"mb-2 small\">\r\n    <summary>Cover Constitution - Thinking about thinking, Learning about learning.</summary>\r\n\r\n    <a class=\"float-right mb-1 small text-muted text-right\" href=\"/ctve1/staff/yahuzaaisha/files/cover_new.pdf\" target=\"_blank\">\r\n        Open\r\n        <i class=\"fas fa-external-link-alt ml-1\"></i>\r\n    </a>\r\n\r\n    <div class=\"embed-responsive embed-responsive-85by110 mt-1\">\r\n        <iframe class=\"b-0 embed-responsive-item\" src=\"/ctve1/dashboard/assets/pdfjs-2.5.207/web/viewer.html?file=/ctve1/staff/yahuzaaisha/files/cover_new.pdf#pagemode=none\"></iframe>\r\n    </div>\r\n</details>\r\n', ''),
(63, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

INSERT INTO `wall` (`id`, `user_id`, `date`, `link`, `title`, `description`) VALUES
(1, 1, 'Dec 27, 2020', 'cover.pdf', 'Cosc 301 test scores', 'Cosc301 - data structures and analysis 2020/2021 academic session.'),
(2, 1, 'Dec 27, 2020', 'cv.pdf', 'Python Data Analyis using Botnet', 'Using python to analyze data by creating botnet to do the job.'),
(3, 2, 'Jan 27, 2020', 'cover.pdf', 'Jamil P.O.P Investment Limited', 'Sales and installation of p.o.p materials.'),
(5, 5, 'Jan 27, 2021', 'DENS101_Test_result.pdf', 'DENS101 Test Result 2020/2021', 'Released Wednesday 2021'),
(6, 5, 'Jan 15, 2021', 'timetables.htm', 'This semester timetable', 'This semester timetable');