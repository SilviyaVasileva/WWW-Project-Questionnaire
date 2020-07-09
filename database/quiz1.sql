-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2020 at 08:17 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz1`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(10) UNSIGNED NOT NULL,
  `questionId` int(10) UNSIGNED NOT NULL,
  `answerNumber` int(10) UNSIGNED NOT NULL,
  `answerDescription` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `questionId`, `answerNumber`, `answerDescription`) VALUES
(5, 8, 1, 'am I?'),
(6, 8, 2, 'am I doing?'),
(7, 8, 3, 'do you want?'),
(8, 8, 4, 'to do?'),
(9, 9, 1, 'b'),
(10, 9, 2, 'bb'),
(11, 9, 3, 'bbb'),
(12, 9, 4, '3'),
(13, 10, 1, 'много зле'),
(14, 10, 2, 'зле'),
(15, 10, 3, 'добре'),
(16, 10, 4, 'много добре'),
(17, 11, 1, '123'),
(18, 11, 2, '1234'),
(19, 11, 3, '12345'),
(20, 11, 4, '123456'),
(25, 12, 1, '123'),
(26, 12, 2, '1234'),
(27, 12, 3, '12345'),
(28, 12, 4, '123456'),
(161, 46, 1, 'test1'),
(162, 46, 2, 'test2'),
(163, 46, 3, 'test3'),
(164, 46, 4, 'test4'),
(165, 47, 1, 'q'),
(166, 47, 2, 'qq'),
(167, 47, 3, 'qqq'),
(168, 47, 4, 'qqqq4'),
(169, 48, 1, '1'),
(170, 48, 2, '2'),
(171, 48, 3, '3'),
(172, 48, 4, '4'),
(173, 49, 1, '1'),
(174, 49, 2, '2'),
(175, 49, 3, '3'),
(176, 49, 4, '4'),
(177, 50, 1, '5'),
(178, 50, 2, '6'),
(179, 50, 3, 'не може да бъде пресметнато'),
(180, 50, 4, 'друг отговор'),
(181, 51, 1, '1.5 лв.'),
(182, 51, 2, '3 лв.'),
(183, 51, 3, '2 лв.'),
(184, 51, 4, 'друг отговор'),
(185, 52, 1, '9'),
(186, 52, 2, '10'),
(187, 52, 3, '16'),
(188, 52, 4, '18'),
(189, 53, 1, '553'),
(190, 53, 2, '683'),
(191, 53, 3, '555'),
(192, 53, 4, '583');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(10) UNSIGNED NOT NULL,
  `testId` int(10) UNSIGNED NOT NULL,
  `questionDescription` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` float DEFAULT 0,
  `correctAnswerNumber` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `testId`, `questionDescription`, `points`, `correctAnswerNumber`) VALUES
(8, 5, 'What', 1, 4),
(9, 5, 'aaa', 3, 3),
(10, 7, 'Как си?', 0, 0),
(11, 7, 'Hello', 0, 0),
(12, 5, 'Hello', 2, 2),
(46, 11, 'test', 1, 3),
(47, 13, 'qqqq?', 1, 4),
(48, 14, 'bbbb', 0, 0),
(49, 1, 'колко е 1+1', 1, 2),
(50, 1, 'Стойността на численият израз 10+54:9+1-11 е равна на:', 2, 2),
(51, 1, 'Преди намалението 6 еднакви ризи стрували 114лв., а след намалението 102лв. С колко е поевтиняла една риза?', 2, 3),
(52, 2, 'Преди намалението 6 еднакви ризи стрували 114лв., а след намалението 102лв. С колко е поевтиняла една риза?', 2, 4),
(53, 3, 'Кое е това число,което съсържа  55 десетици и 33 единици?', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(10) UNSIGNED NOT NULL,
  `creatorId` int(10) UNSIGNED NOT NULL,
  `testName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testType` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT 'test'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `creatorId`, `testName`, `testType`) VALUES
(1, 7, 'TEST ADD TEST 1', 'test'),
(2, 7, 'TEST ADD TEST 2', 'test'),
(3, 7, 'TEST ADD TEST 3', 'test'),
(4, 7, 'az', 'test'),
(5, 6, 'TEST ADD TEST 4', 'test'),
(7, 6, 'quiz1', 'quiz'),
(8, 6, 'quiz2', 'quiz'),
(11, 6, 'Testing', 'test'),
(13, 7, 'qqqq', 'test'),
(14, 7, 'aaaa', 'quiz');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FN` int(11) DEFAULT NULL,
  `userType` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `FN`, `userType`) VALUES
(1, 'az1', 'az1@az.az', 'c0c248675fd0979d381885404d9e94c88896d2fd', 1, 'student'),
(2, 'az2', 'az2@az.az', 'a8f342808cd697cf9cbdf7f49fb2deee862703fc', 2, 'student'),
(4, 'Silvijav1', 'sisi@si.si', 'c9362e9cc9677199868ec71811bb76edaa676615', 2, 'student'),
(6, 'az3AZ3', 'az3@az.az', '131610388719b43dd387864db6e5f43b4e55719d', 0, 'lector'),
(7, 'q1q1Q1', 'q1@q1.q', '7996cda9b82450c2a33a1d7f1bf40504668eb034', 0, 'lector');

-- --------------------------------------------------------

--
-- Table structure for table `user_answer`
--

CREATE TABLE `user_answer` (
  `id` int(10) UNSIGNED NOT NULL,
  `answerId` int(10) UNSIGNED NOT NULL,
  `questionId` int(10) UNSIGNED NOT NULL,
  `userSolvedTestId` int(10) UNSIGNED NOT NULL,
  `points` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_answer`
--

INSERT INTO `user_answer` (`id`, `answerId`, `questionId`, `userSolvedTestId`, `points`) VALUES
(73, 5, 8, 1, 0),
(74, 7, 8, 2, 1),
(75, 11, 9, 2, 3),
(76, 26, 12, 2, 2),
(77, 11, 9, 1, 3),
(78, 26, 12, 1, 3),
(79, 7, 8, 3, 1),
(80, 11, 9, 3, 3),
(81, 26, 12, 3, 2),
(82, 7, 8, 4, 1),
(83, 11, 9, 4, 3),
(84, 26, 12, 4, 2),
(85, 13, 10, 5, 0),
(86, 20, 11, 5, 0),
(87, 6, 8, 6, 1),
(88, 11, 9, 6, 3),
(89, 26, 12, 6, 2),
(90, 6, 8, 7, 1),
(91, 11, 9, 7, 3),
(92, 26, 12, 7, 2),
(93, 13, 10, 8, 0),
(94, 20, 11, 8, 0),
(95, 5, 8, 9, 1),
(96, 11, 9, 9, 3),
(97, 26, 12, 9, 2),
(98, 174, 49, 10, 1),
(99, 178, 50, 10, 2),
(100, 183, 51, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_test`
--

CREATE TABLE `user_test` (
  `id` int(10) UNSIGNED NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `solvedTestId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_test`
--

INSERT INTO `user_test` (`id`, `userId`, `solvedTestId`) VALUES
(1, 7, 5),
(2, 7, 5),
(3, 7, 5),
(4, 7, 5),
(5, 7, 7),
(6, 7, 5),
(7, 7, 5),
(8, 7, 7),
(9, 7, 5),
(10, 7, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`testId`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creatorId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_answer`
--
ALTER TABLE `user_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answerId` (`answerId`),
  ADD KEY `questionId` (`questionId`),
  ADD KEY `userSolvedTestId` (`userSolvedTestId`);

--
-- Indexes for table `user_test`
--
ALTER TABLE `user_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`userId`),
  ADD KEY `test_id` (`solvedTestId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_answer`
--
ALTER TABLE `user_answer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `user_test`
--
ALTER TABLE `user_test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`testId`) REFERENCES `test` (`id`);

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`creatorId`) REFERENCES `user` (`id`);

--
-- Constraints for table `user_answer`
--
ALTER TABLE `user_answer`
  ADD CONSTRAINT `user_answer_ibfk_3` FOREIGN KEY (`userSolvedTestId`) REFERENCES `user_test` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_answer_ibfk_4` FOREIGN KEY (`answerId`) REFERENCES `answer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_answer_ibfk_5` FOREIGN KEY (`questionId`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_test`
--
ALTER TABLE `user_test`
  ADD CONSTRAINT `user_test_ibfk_1` FOREIGN KEY (`solvedTestId`) REFERENCES `test` (`id`),
  ADD CONSTRAINT `user_test_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
