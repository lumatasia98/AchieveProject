-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 12:35 AM
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
-- Database: `achievedatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignmentID` int(11) NOT NULL,
  `assignmentType` varchar(20) NOT NULL,
  `dueDate` date NOT NULL,
  `courseID` int(30) NOT NULL,
  `assignmentName` varchar(50) NOT NULL,
  `pointValue` int(11) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `fileAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignmentID`, `assignmentType`, `dueDate`, `courseID`, `assignmentName`, `pointValue`, `description`, `fileAddress`) VALUES
(1, 'homework', '2021-12-02', 3, 'hw1', 100, 'please complete questions 1-20 on pg. 234 of the textbook. ', ''),
(2, 'homework', '2021-12-15', 2, 'hw1', 20, 'please complete questions 1-10 on pg 230 of the textbook.', ''),
(3, 'exam', '2021-12-23', 3, 'exam 2', 30, 'download and complete the take home exam.', 'uploads/test.txt'),
(4, 'homework', '2021-12-22', 3, 'hw2', 20, 'please complete questions 30-35 on pg 245 of the texbook', ''),
(5, 'quiz', '2021-12-23', 2, 'quiz 1', 30, '\r\nBalance the following chemical reaction:  CO + O2  CO2\r\n\r\n\r\n', ''),
(7, 'homework', '2021-12-31', 3, 'hw3', 100, 'q1-q10', 'uploads/test.txt'),
(8, 'exam', '2021-12-12', 3, 'exam 1', 99, 'download and complete the take home exam.', 'uploads/test.txt'),
(9, 'homework', '2021-12-30', 2, 'hw 2', 100, '\r\nBalance the following chemical reactions:  KNO3  KNO2 + O2\r\n\r\n', ''),
(10, 'exam', '2021-12-25', 1, 'Final project', 200, 'Please submit to me your finished piece and upload the self-assessment here', ''),
(11, 'homework', '2021-12-07', 7, 'hw1', 20, 'Please build an html file which displays \"Hi this is my first html file\" in blue 12pt font.\r\n', ''),
(12, 'homework', '2021-12-22', 7, 'hw2', 20, 'Download and complete the following worksheet.', 'uploads/test.txt'),
(13, 'homework', '2021-12-07', 8, 'hw1', 20, 'Please download and complete the following worksheet', 'uploads/test.txt'),
(14, 'homework', '2021-12-25', 8, 'hw2', 20, 'Please download and complete the following worksheet', 'uploads/test.txt'),
(15, 'exam', '2021-12-30', 9, 'Final Exam', 200, 'write an essay on a case study of your choice. \r\n', ''),
(16, 'homework', '2021-12-23', 3, 'hw4', 30, '', 'uploads/test5.txt_1');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseID` int(255) NOT NULL,
  `courseName` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `roomNumber` varchar(30) NOT NULL,
  `instructor` int(30) NOT NULL,
  `meetingTimes` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `books` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `courseName`, `department`, `roomNumber`, `instructor`, `meetingTimes`, `description`, `books`) VALUES
(1, 'ART302', 'Art', 'SC102', 3, 'T/F 1:15pm-2:30pm', 'Art and design II- different visual media like painting, drawing, sculpture, and graphic design. Art and design majors learn basic design principles, color theory, critical thinking, and artistic techniques.', 'Design Media for the Digital Age'),
(2, 'CHEM105', 'Science', 'R204', 4, 'M/W 2:45pm-4:00pm', 'Basic Chemistry- Introduction to the general principles of chemistry for students planning a professional career in chemistry, a related science, the health professions, or engineering. Stoichiometry, atomic structure, chemical bonding and geometry, thermochemistry, gases, types of chemical reactions, statistics. ', 'Chemistry Concepts and Applications'),
(3, 'MATH100', 'Mathematics', 'R301', 1, 'T 11:00am-1:30pm', 'Intermediate algebra- Topics include relations, functions (linear and quadratic), factoring, exponents, proportions, probability and development of fundamentals/concepts for college mathematics. Active learning centered model includes small group active learning sessions and online mini-lectures. This class does not count for credit toward the degrees in the College of Science and Mathematics.', 'Intermediate algebra concepts'),
(7, 'CSIT302', 'Computer Science', 'R409', 1, 'TW 3:30pm - 4:45', 'Internet computing- learn how to create dynamic and interactive web applications by programming using html, php, javascript and SQL', 'internet computing'),
(8, 'HIST104', 'Humanities', 'D209', 4, 'MF 5:30pm-6:5', 'Intro to Greek and Roman history-This introduces students to key aspects and events in ancient Greek and Roman history, and to some of the main historians of Greece and Rome.', 'Ancient antiquities'),
(9, 'PSYCH101', 'Psychology', 'P102', 3, 'TH 9:15am-10:30am', 'Psychology 101-studies behavior through an exploration of major concepts, theoretical perspectives, research findings, and historical trends in psychology. Designed to promote an understanding of human behavior and mental processes. In other words, Psychology 101 will journey through the discipline of Psychology.', 'Introduction to psychology');

-- --------------------------------------------------------

--
-- Table structure for table `gradebook`
--

CREATE TABLE `gradebook` (
  `courseName` varchar(255) NOT NULL,
  `assignID` int(20) NOT NULL,
  `assignName` varchar(255) NOT NULL,
  `userID` int(30) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `assignType` varchar(255) NOT NULL,
  `grade` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gradebook`
--

INSERT INTO `gradebook` (`courseName`, `assignID`, `assignName`, `userID`, `userName`, `assignType`, `grade`) VALUES
('CHEM105', 1, 'hw2', 2, 'msue', 'homework', '58'),
('CHEM105', 1, 'hw2', 6, 'jsmith', 'homework', '44'),
('CHEM105', 1, 'hw2', 8, 'llu', 'homework', '26'),
('CHEM105', 1, 'hw2', 13, 'gsilver', 'homework', '74'),
('CHEM105', 1, 'hw2', 14, 'jtmechk', 'homework', '99'),
('CHEM105', 1, 'hw2', 15, 'jtmecho', 'homework', '83'),
('CHEM105', 2, 'hw1', 2, 'msue', 'homework', '0'),
('CHEM105', 2, 'hw1', 6, 'jsmith', 'homework', '0'),
('CHEM105', 2, 'hw1', 8, 'llu', 'homework', '0'),
('CHEM105', 2, 'hw1', 13, 'gsilver', 'homework', '0'),
('CHEM105', 2, 'hw1', 14, 'jtmechk', 'homework', '0'),
('CHEM105', 2, 'hw1', 15, 'jtmecho', 'homework', '0'),
('MATH100', 3, 'test1', 2, 'msue', 'exam', '0'),
('MATH100', 3, 'test1', 5, 'lwilson', 'exam', '0'),
('MATH100', 3, 'test1', 6, 'jsmith', 'exam', '0'),
('MATH100', 3, 'test1', 7, 'jmech', 'exam', '0'),
('MATH100', 3, 'test1', 8, 'llu', 'exam', '0'),
('MATH100', 3, 'test1', 13, 'gsilver', 'exam', '0'),
('CHEM105', 4, 'hw3', 2, 'msue', 'homework', '14'),
('CHEM105', 4, 'hw3', 6, 'jsmith', 'homework', '12'),
('CHEM105', 4, 'hw3', 8, 'llu', 'homework', '9'),
('CHEM105', 4, 'hw3', 13, 'gsilver', 'homework', '3'),
('CHEM105', 4, 'hw3', 14, 'jtmechk', 'homework', '11'),
('CHEM105', 4, 'hw3', 15, 'jtmecho', 'homework', '20'),
('CSIT302', 5, 'quiz 2', 2, 'msue', 'quiz', '30'),
('CART302', 7, 'fdsfd', 2, 'msue', 'homework', '99'),
('CART302', 7, 'fdsfd', 5, 'lwilson', 'homework', '38'),
('CART302', 7, 'fdsfd', 7, 'jmech', 'homework', '22'),
('CART302', 7, 'fdsfd', 8, 'llu', 'homework', '67'),
('CART302', 7, 'fdsfd', 13, 'gsilver', 'homework', '20'),
('CSIT302', 8, 'hw5', 2, 'msue', 'exam', '54');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `submissionID` int(255) NOT NULL,
  `assignmentID` int(11) NOT NULL,
  `courseID` int(30) NOT NULL,
  `submitDate` date NOT NULL,
  `studentID` int(30) NOT NULL,
  `fileAddress` varchar(255) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`submissionID`, `assignmentID`, `courseID`, `submitDate`, `studentID`, `fileAddress`, `points`) VALUES
(1, 8, 3, '2021-12-13', 2, 'uploads/test.txt', 70),
(3, 4, 3, '2021-12-13', 2, 'uploads/test.txt', 20),
(5, 8, 3, '2021-12-13', 5, 'uploads/test.txt', 60),
(6, 2, 2, '2021-12-13', 2, 'uploads/test.txt', 0),
(7, 10, 1, '2021-12-14', 2, 'uploads/test2.txt', 200),
(8, 10, 1, '2021-12-14', 2, 'uploads/test5.txt', 200);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(255) NOT NULL,
  `fName` varchar(20) NOT NULL,
  `lName` varchar(20) NOT NULL,
  `userType` char(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `fName`, `lName`, `userType`, `username`, `password`) VALUES
(1, 'Samantha', 'Schiff', 'Instructor', 'sschiff', 'daisies'),
(2, 'Mary', 'Sue', 'Student', 'msue', 'suepass'),
(3, 'Kevin', 'Solorzano-Hernandez', 'Instructor', 'khernandez', 'roses'),
(4, 'Nathan', 'Dixon', 'Instructor', 'ndixon', 'lilacs'),
(5, 'Liam', 'Wilson', 'Student', 'lwilson', 'liampass'),
(6, 'Jane', 'Smith', 'Student', 'jsmith', 'janepass'),
(7, 'James', 'Mechowski', 'Student', 'jmech', 'jamespass'),
(8, 'lucy', 'lu', 'Student', 'llu', 'lupass'),
(13, 'Greg', 'silver', 'Student', 'gsilver', 'gregpass'),
(14, 'sean', 'gem', 'Student', 'sgem', 'gempass'),
(15, 'luke', 'pram', 'Student', 'lpram', 'lukepass'),
(16, 'rose', 'dawson', 'Student', 'rdawson', 'rosepass'),
(19, 'sarah', 'short', 'Student', 'sshort', 'shortpass');

-- --------------------------------------------------------

--
-- Table structure for table `users_has_courses`
--

CREATE TABLE `users_has_courses` (
  `userID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_has_courses`
--

INSERT INTO `users_has_courses` (`userID`, `courseID`) VALUES
(1, 1),
(1, 3),
(1, 7),
(2, 1),
(2, 2),
(2, 3),
(2, 7),
(3, 1),
(3, 9),
(4, 2),
(4, 8),
(5, 1),
(5, 3),
(5, 8),
(5, 9),
(6, 1),
(6, 2),
(6, 3),
(6, 7),
(7, 1),
(7, 3),
(8, 1),
(8, 2),
(8, 3),
(13, 1),
(13, 2),
(13, 3),
(13, 8),
(13, 9),
(14, 2),
(19, 1),
(19, 3),
(19, 7),
(19, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignmentID`) USING BTREE,
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`),
  ADD KEY `instructor` (`instructor`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`submissionID`),
  ADD KEY `courseID` (`courseID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `assignmentID` (`assignmentID`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_has_courses`
--
ALTER TABLE `users_has_courses`
  ADD PRIMARY KEY (`userID`,`courseID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `submissionID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`instructor`) REFERENCES `users` (`userID`);

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`),
  ADD CONSTRAINT `submissions_ibfk_2` FOREIGN KEY (`assignmentID`) REFERENCES `assignments` (`assignmentID`),
  ADD CONSTRAINT `submissions_ibfk_3` FOREIGN KEY (`studentID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `users_has_courses`
--
ALTER TABLE `users_has_courses`
  ADD CONSTRAINT `courseID` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`),
  ADD CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
