-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2020 at 07:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samlong_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(255) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `category` varchar(1000) NOT NULL,
  `foundDate` varchar(1000) NOT NULL,
  `foundBy` varchar(1000) NOT NULL,
  `location` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `claimed` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `category`, `foundDate`, `foundBy`, `location`, `description`, `image`, `claimed`) VALUES
(1, 'Iphone 7plus black', 'Electronics', '2020-02-17', 'Bob longting', 'outside the library', 'Black iphone with a few small scratches \r\n                                                                                    on the back with a picture of a man and \r\n                                                                                    a girl as the background', 'images/iphoneimage1.jpg', 'N'),
(2, 'Iphone 11X', 'Electronics', '2020-02-17', 'Beve nan', 'outside shopping centre', 'Black iphone with a cracked screen obv', 'images/iphonecracked2.jpg', 'N'),
(3, 'brown dog names zak', 'Pets', '2020-02-17', 'paul ven', 'local park', 'has a brown collar and red bandana on found running around the park', 'images/zak3.jpg', 'N'),
(5, 'omega seamaster', 'Jewellery', '2020-02-17', 'nat hilf', 'outside chinese takeaway', 'blue face with a scratch on the glass  ', 'images/omega4.jpg', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `requestId` int(11) NOT NULL,
  `personId` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `status` varchar(128) NOT NULL,
  `proof` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`requestId`, `personId`, `id`, `status`, `proof`) VALUES
(15, 11, 1, 'Rejected', 'this is mine '),
(16, 13, 2, 'Rejected', 'THIS IS MINE ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `personId` int(11) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(300) NOT NULL,
  `userType` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`personId`, `firstname`, `lastname`, `email`, `password`, `userType`) VALUES
(11, 'User', 'USER', 'USeR@USER.com', '$2y$10$8SzvyN7XuLpNtIGHtb6/v.fbiTIDpJ56zbhQ6NG3MrzyITihQ3DE.', 1),
(13, 'Sam', 'Longton', 'samlongton@hotmail.co.uk', '$2y$10$zmR45o.80AeMnaHHtdc5M.3v5RINUdWEm/2WCsJqt1doxO7s2vQNC', 1),
(10, 'ADMIN', 'TEST', 'Admin@test.com', '$2y$10$PQlNkkGgiVkpwJ6doj6NTOCwrbqALXAGsnpaBNoDI3g9hbSDZhR4C', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`requestId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`personId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `requestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `personId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
