-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 28, 2018 at 03:56 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noteapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `user_id`, `category_name`) VALUES
(1, 1, 'food'),
(2, 1, '$category_name'),
(3, 1, 'Laptop'),
(4, 1, 'test'),
(5, 1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `note_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `note_title` varchar(255) NOT NULL,
  `note_content` text NOT NULL,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`note_id`, `user_id`, `category_id`, `note_title`, `note_content`, `create_date`, `lastmod`) VALUES
(1, 1, 1, 'First Note', 'Christopher is beautiful.', '2018-04-21 12:47:50', '2018-04-21 16:47:50'),
(2, 1, 1, 'First Note', 'Christopher is beautiful.', '2018-04-21 12:50:39', '2018-04-21 16:50:39'),
(3, 1, 1, 'This is a new note', 'It\'s a pretty cool note.', '2018-04-21 12:51:22', '2018-04-21 16:51:22'),
(4, 1, 1, 'This is a new note', 'It\'s a pretty cool note, yes it is.', '2018-04-21 12:55:37', '2018-04-21 16:55:37'),
(5, 1, 1, 'TITLE', 'NOTE', '2018-04-21 13:09:30', '2018-04-21 17:09:30'),
(6, 1, 1, 'New Note', 'Title of the Note', '2018-04-21 13:37:20', '2018-04-21 17:37:20'),
(7, 1, 1, 'April 23rd, 2018', 'Late night coding is fun!', '2018-04-23 23:45:59', '2018-04-24 03:45:59'),
(8, 1, 1, '$note_title', '$note', '2018-04-23 23:51:52', '2018-04-24 03:51:52'),
(9, 1, 1, 'Testing', 'This should work.', '2018-04-24 00:04:47', '2018-04-24 04:04:47'),
(10, 1, 1, 'Test With Switch', 'I like that the title is up there.', '2018-04-24 00:07:26', '2018-04-24 04:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `login_pw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email_id`, `first_name`, `last_name`, `login_pw`) VALUES
(1, 'test@gmail.com', 'Sarah', 'Gichuhi', 'ieatfeet');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `FK_user_id_for_category` (`user_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`),
  ADD KEY `FK_user_id` (`user_id`),
  ADD KEY `FK_category_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UK_email_id` (`email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `FK_user_id_for_category` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `FK_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
