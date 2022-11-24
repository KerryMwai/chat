-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 25, 2022 at 07:27 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatting`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `chat` text NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `user_id`, `chat`, `date`, `time`, `created_at`) VALUES
(36, 5, 'Hello', '2022/01/21', '5:43 PM', '2022-01-21 14:43:10'),
(37, 2, 'Too', '2022/01/21', '5:43 PM', '2022-01-21 14:43:26'),
(38, 2, 'Give me a copy of your assignment please I dont know if I am going to make it that is why I am asking', '2022/02/15', '1:54 PM', '2022-02-15 10:54:13'),
(39, 2, 'Morning', '2022/02/20', '12:27 PM', '2022-02-20 09:27:29'),
(40, 6, 'Mrning too', '2022/02/20', '12:29 PM', '2022-02-20 09:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_image` varchar(100) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `user_email` varchar(64) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_image`, `full_name`, `user_email`, `user_password`, `id`) VALUES
('../user_images/af318aabbd02afcd95a4f8379b52b31bprofile7.jpeg', 'Kerry Wangamati', 'kerrywa@ueab.ac.ke', '$2y$10$rvv8myC.blYBAbhYndJ10eGIInAFt4CBs5NNcutMjafl9FQUxdkcG', 2),
('../user_images/f5e21b1777abdc3c8e0d7755041bdf8dprofile5.jpeg', 'Kerry Mwai', 'kerrymwai@ueab.ac.ke', '$2y$10$rXUEFD/3q5JKZGnzLAO2qOu8giLo1jTPp1Mpc7Tscs7et4b/3Bc76', 3),
('../user_images/53311e269a8df42333c41d5c8f45c598profile1.jpeg', 'Cherry Monica', 'cherry@gmail.com', '$2y$10$OweeQSJPM0c2zsPfwq.cm.U9syRmyBLhz7pD1Wo2RXeD66XhzcV/2', 4),
('../user_images/fb9a6e3b28fbd81bea6f283bdce122513d2.png', 'John Terry', 'test5768@gmail.com', '$2y$10$EuvIDMqmcLaFY1Ym.l7GvudEL4GTg.SQa1an7.OzE5SkaGTzh2.gi', 5),
('../user_images/d3d171dcc714940e80c8d015ade11c5cav1.jpg', 'Test Wan', 'test@gmail.com', '$2y$10$gVO0VB7ic..at8tT19Hr6OVK7dK.gQt4euDn24OCYNbnyooZ193vW', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
