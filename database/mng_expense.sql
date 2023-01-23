-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 03:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mng_expense`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(6) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'Khaled Al-Ghamdi', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(6) NOT NULL,
  `item` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `start_date` date NOT NULL DEFAULT current_timestamp(),
  `end_date` date NOT NULL DEFAULT current_timestamp(),
  `user_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `item`, `amount`, `start_date`, `end_date`, `user_id`) VALUES
(2, 'food', 50, '2023-01-15', '0000-00-00', 1),
(3, 'water', 48, '2023-01-15', '0000-00-00', 1),
(10, 'fffffffffffff', 1800, '2023-01-20', '2023-01-20', 3),
(11, 'transportation', 35, '2023-01-19', '0000-00-00', 1),
(12, 'transportation', 60, '2023-01-19', '0000-00-00', 1),
(13, 'water', 1300, '2023-01-19', '2023-01-20', 1),
(14, 'transportation', 50, '2023-01-18', '0000-00-00', 1),
(15, 'water', 60, '2023-01-14', '0000-00-00', 1),
(16, 'food', 120, '2023-01-21', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_create` date NOT NULL DEFAULT current_timestamp(),
  `capacity` int(11) NOT NULL,
  `admin_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `date_create`, `capacity`, `admin_id`) VALUES
(1, 'G101', '2023-01-20', 15, 1),
(2, 'G102', '2023-01-20', 20, 1),
(3, 'G103', '2023-01-20', 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `descrption` varchar(50) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `amount` double NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'income',
  `user_id` int(6) NOT NULL,
  `group_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `name`, `descrption`, `date`, `amount`, `type`, `user_id`, `group_id`) VALUES
(10, 'salary', 'feb salary 203', '2023-01-14', 10000, 'income', 1, NULL),
(11, 'new sav', 'save for .....', '2023-01-14', 1300, 'saving', 1, NULL),
(12, 'Bonus', 'from', '2023-01-15', 1000, 'income', 1, 3),
(14, 'Bonus', 'from', '2023-01-15', 330, 'saving', 1, NULL),
(15, 'Bonus', 'from', '2023-01-16', 130, 'saving', 1, NULL),
(19, 'Bonus', 'feb salary 203', '2023-01-19', 100, 'income', 1, NULL),
(20, '', '', '0000-00-00', 0, 'Array', 1, 3),
(21, 'sav', 'saving', '2023-01-20', 1000, 'saving', 4, 1),
(22, 'bous', '', '2023-01-20', 500, 'income', 6, 3),
(23, 'enco', '', '2023-01-21', 456, 'saving', 1, 1),
(24, 'Bonus', 'feb', '2023-01-21', 140, 'income', 1, 1),
(25, 'new sav', 'feb salary 204', '2023-01-21', 60, 'saving', 1, NULL),
(26, 'salary', 'feb salary 203', '2023-01-21', 190, 'saving', 1, NULL),
(28, 'salary', 'feb salary 203', '0000-00-00', 190, 'saving', 1, NULL),
(42, 'ddfdf', 'faaaf', '2023-01-23', 360, 'income', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `img` blob DEFAULT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'user',
  `admin_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `gender`, `img`, `type`, `admin_id`) VALUES
(1, 'Anas  Al-Qahtani', 'anas@gmail.com', 'anas', '507843703', 'male', 0x2e2e2f696d672f757365722e706e67, 'leader', 1),
(2, 'Fahad  Al-Ghamdi', 'fahd@gmail.com', 'fahd', '509447851', 'male', 0x2e2e2f696d672f757365722e706e67, 'leader', 1),
(3, 'raf', 'raf@gmail.com', 'raf', '6362462', 'male', 0x2e2e2f696d672f757365722e706e67, 'user', 1),
(4, 'mohammed Ali', 'moh@gmail.com', 'moh', '47393893833', 'male', NULL, 'member', 1),
(5, 'ahmed mohammed', 'ahmed@gmail.com', 'ahmed', '565644556', 'male', NULL, 'member', 1),
(6, 'morad ahmed', 'morad@gmail.com', 'morad', '564564564', 'male', NULL, 'member', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `user_id` int(6) NOT NULL,
  `group_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`user_id`, `group_id`) VALUES
(1, 1),
(2, 2),
(1, 3),
(4, 1),
(5, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_expense_fk` (`user_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_group_fk` (`admin_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_income_fk` (`user_id`),
  ADD KEY `group_fk` (`group_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `admin_fk` (`admin_id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD KEY `user_g_fk` (`user_id`),
  ADD KEY `group_user_fk` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `user_expense_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `admin_group_fk` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `group_fk` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `user_income_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `admin_fk` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `user_group`
--
ALTER TABLE `user_group`
  ADD CONSTRAINT `group_user_fk` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `user_g_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
