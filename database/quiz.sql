-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2020 at 10:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
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
(21, 11, 1, '123'),
(22, 11, 2, '1234'),
(23, 11, 3, '12345'),
(24, 11, 4, '123456'),
(25, 12, 1, '123'),
(26, 12, 2, '1234'),
(27, 12, 3, '12345'),
(28, 12, 4, '123456'),
(29, 13, 1, '123'),
(30, 13, 2, '1234'),
(31, 13, 3, '12345'),
(32, 13, 4, '123456'),
(33, 14, 1, '123'),
(34, 14, 2, '1234'),
(35, 14, 3, '12345'),
(36, 14, 4, '123456'),
(37, 15, 1, '123'),
(38, 15, 2, '1234'),
(39, 15, 3, '12345'),
(40, 15, 4, '123456'),
(41, 16, 1, '123'),
(42, 16, 2, '1234'),
(43, 16, 3, '12345'),
(44, 16, 4, '123456'),
(45, 17, 1, '123'),
(46, 17, 2, '1234'),
(47, 17, 3, '12345'),
(48, 17, 4, '123456'),
(49, 18, 1, '123'),
(50, 18, 2, '1234'),
(51, 18, 3, '12345'),
(52, 18, 4, '123456'),
(53, 19, 1, '123'),
(54, 19, 2, '1234'),
(55, 19, 3, '12345'),
(56, 19, 4, '123456'),
(57, 20, 1, '123'),
(58, 20, 2, '1234'),
(59, 20, 3, '12345'),
(60, 20, 4, '123456'),
(61, 21, 1, '123'),
(62, 21, 2, '1234'),
(63, 21, 3, '12345'),
(64, 21, 4, '123456'),
(65, 22, 1, '123'),
(66, 22, 2, '1234'),
(67, 22, 3, '12345'),
(68, 22, 4, '123456'),
(69, 23, 1, '123'),
(70, 23, 2, '1234'),
(71, 23, 3, '12345'),
(72, 23, 4, '123456'),
(73, 24, 1, '123'),
(74, 24, 2, '1234'),
(75, 24, 3, '12345'),
(76, 24, 4, '123456'),
(77, 25, 1, '123'),
(78, 25, 2, '1234'),
(79, 25, 3, '12345'),
(80, 25, 4, '123456'),
(81, 26, 1, '123'),
(82, 26, 2, '1234'),
(83, 26, 3, '12345'),
(84, 26, 4, '123456'),
(85, 27, 1, '123'),
(86, 27, 2, '1234'),
(87, 27, 3, '12345'),
(88, 27, 4, '123456'),
(89, 28, 1, '123'),
(90, 28, 2, '1234'),
(91, 28, 3, '12345'),
(92, 28, 4, '123456'),
(93, 29, 1, '123'),
(94, 29, 2, '1234'),
(95, 29, 3, '12345'),
(96, 29, 4, '123456'),
(97, 30, 1, '123'),
(98, 30, 2, '1234'),
(99, 30, 3, '12345'),
(100, 30, 4, '123456'),
(101, 31, 1, '123'),
(102, 31, 2, '1234'),
(103, 31, 3, '12345'),
(104, 31, 4, '123456'),
(105, 32, 1, '123'),
(106, 32, 2, '1234'),
(107, 32, 3, '12345'),
(108, 32, 4, '123456'),
(109, 33, 1, '123'),
(110, 33, 2, '1234'),
(111, 33, 3, '12345'),
(112, 33, 4, '123456'),
(113, 34, 1, '123'),
(114, 34, 2, '1234'),
(115, 34, 3, '12345'),
(116, 34, 4, '123456'),
(117, 35, 1, '123'),
(118, 35, 2, '1234'),
(119, 35, 3, '12345'),
(120, 35, 4, '123456'),
(121, 36, 1, '123'),
(122, 36, 2, '1234'),
(123, 36, 3, '12345'),
(124, 36, 4, '123456'),
(125, 37, 1, '123'),
(126, 37, 2, '1234'),
(127, 37, 3, '12345'),
(128, 37, 4, '123456'),
(129, 38, 1, '123'),
(130, 38, 2, '1234'),
(131, 38, 3, '12345'),
(132, 38, 4, '123456'),
(133, 39, 1, '123'),
(134, 39, 2, '1234'),
(135, 39, 3, '12345'),
(136, 39, 4, '123456'),
(137, 40, 1, '123'),
(138, 40, 2, '1234'),
(139, 40, 3, '12345'),
(140, 40, 4, '123456'),
(141, 41, 1, '123'),
(142, 41, 2, '1234'),
(143, 41, 3, '12345'),
(144, 41, 4, '123456'),
(145, 42, 1, '123'),
(146, 42, 2, '1234'),
(147, 42, 3, '12345'),
(148, 42, 4, '123456'),
(149, 43, 1, '123'),
(150, 43, 2, '1234'),
(151, 43, 3, '12345'),
(152, 43, 4, '123456'),
(153, 44, 1, '123'),
(154, 44, 2, '1234'),
(155, 44, 3, '12345'),
(156, 44, 4, '123456'),
(157, 45, 1, '123'),
(158, 45, 2, '1234'),
(159, 45, 3, '12345'),
(160, 45, 4, '123456'),
(161, 46, 1, 'test1'),
(162, 46, 2, 'test2'),
(163, 46, 3, 'test3'),
(164, 46, 4, 'test4');

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
(13, 5, 'Hello', 3, 2),
(14, 5, 'Hello', 3, 2),
(15, 5, 'Hello', 3, 2),
(16, 5, 'Hello', 3, 2),
(17, 5, 'Hello', 3, 2),
(18, 5, 'Hello', 3, 2),
(19, 5, 'Hello', 3, 2),
(20, 5, 'Hello', 3, 2),
(21, 5, 'Hello', 3, 2),
(22, 5, 'Hello', 3, 2),
(23, 5, 'Hello', 3, 2),
(24, 5, 'Hello', 3, 2),
(25, 5, 'Hello', 3, 2),
(26, 5, 'Hello', 3, 2),
(27, 5, 'Hello', 3, 2),
(28, 5, 'Hello', 3, 2),
(29, 5, 'Hello', 3, 2),
(30, 5, 'Hello', 3, 2),
(31, 5, 'Hello', 3, 2),
(32, 5, 'Hello', 3, 2),
(33, 5, 'Hello', 3, 2),
(34, 5, 'Hello', 3, 2),
(35, 5, 'Hello', 3, 2),
(36, 5, 'Hello', 3, 2),
(37, 5, 'Hello', 3, 2),
(38, 5, 'Hello', 3, 2),
(39, 5, 'Hello', 3, 2),
(40, 5, 'Hello', 3, 2),
(41, 5, 'Hello', 3, 2),
(42, 5, 'Hello', 3, 2),
(43, 5, 'Hello', 3, 2),
(44, 5, 'Hello', 3, 2),
(45, 5, 'Hello', 3, 2),
(46, 11, 'test', 1, 3);

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
(1, 2, 'TEST ADD TEST 1', 'test'),
(2, 2, 'TEST ADD TEST 2', 'test'),
(3, 1, 'TEST ADD TEST 3', 'test'),
(4, 1, 'az', 'test'),
(5, 6, 'TEST ADD TEST 4', 'test'),
(7, 6, 'quiz1', 'quiz'),
(8, 6, 'quiz2', 'quiz'),
(9, 6, 'Hello. Nice to fuck up my day', 'test'),
(10, 6, 'Hello. Nice to fuck up my day', 'test'),
(11, 6, 'Testing', 'test'),
(12, 6, 'aaa', 'quiz');

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
(6, 'az3AZ3', 'az3@az.az', '131610388719b43dd387864db6e5f43b4e55719d', 0, 'lector');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`questionId`);

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
  ADD KEY `answer_id` (`answerId`),
  ADD KEY `question_id` (`questionId`),
  ADD KEY `user_test_id` (`userSolvedTestId`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_answer`
--
ALTER TABLE `user_answer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_test`
--
ALTER TABLE `user_test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`questionId`) REFERENCES `question` (`id`);

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
-- Constraints for table `user_test`
--
ALTER TABLE `user_test`
  ADD CONSTRAINT `user_test_ibfk_1` FOREIGN KEY (`solvedTestId`) REFERENCES `test` (`id`),
  ADD CONSTRAINT `user_test_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
