-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 04, 2021 at 09:52 AM
-- Server version: 8.0.26-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogat`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `slug`, `created_at`) VALUES
(14, 49, 'the gioi', 'the-gioi', '2021-09-30 02:45:44'),
(18, 47, 'giai tri', 'giai-tri', '2021-09-30 03:38:48'),
(19, 50, 'keira', 'keira', '2021-09-30 07:57:15'),
(20, 45, 'tin tuc mua sam', 'tin-tuc-mua-sam', '2021-09-30 08:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `cat_id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(200) NOT NULL,
  `img` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `cat_id`, `user_id`, `title`, `img`, `slug`, `content`, `status`, `created_at`) VALUES
(23, 14, 45, 'the gioi haha', '2021-09-30-15-35-14.png', 'dasdasd', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'inactive', '2021-09-30 08:35:14'),
(24, 14, 45, 'con sau mau gi', '2021-09-30-15-40-55.png', 'dadasd', '<p>dasd&aacute;d<img src=\"assets/uploads/2021-09-30-15-40-53.png\" alt=\"\" width=\"191\" height=\"87\" /></p>', 'active', '2021-09-30 08:40:55'),
(25, 14, 45, 'the thao chat luowgn', '2021-09-30-15-48-19.png', 'dasdasd', '<p>123123</p>', 'active', '2021-09-30 08:48:19'),
(26, 18, 47, 'ao quan the thao dep', '2021-09-30-15-50-22.png', 'dadasd', '<p>asdasd</p>', 'active', '2021-09-30 08:50:22'),
(28, 14, 25, 'a', '2021-10-03-10-06-58.png', 'a', '<p>aa</p>', 'inactive', '2021-10-03 03:06:58'),
(29, 19, 25, 'adsas', '2021-10-03-10-08-34.png', 'adsas', '<p>asd</p>', 'inactive', '2021-10-03 03:08:34'),
(33, 14, 25, 'asd', '2021-10-03-10-18-01.png', 'asd', '<p>asd</p>', 'inactive', '2021-10-03 03:18:01'),
(34, 14, 25, 'asd', '2021-10-03-10-20-54.png', 'asd', '<p>asd</p>', 'inactive', '2021-10-03 03:20:54'),
(35, 14, 25, 'ád', '2021-10-03-10-28-54.png', 'ad', '<p>asdd</p>', 'inactive', '2021-10-03 03:28:54'),
(36, 14, 25, 'ád', '2021-10-03-10-29-00.png', 'ad', '<p>asdd</p>', 'inactive', '2021-10-03 03:29:00'),
(37, 18, 25, 'a', '2021-10-03-10-30-39.png', 'a', '<p>asd</p>', 'inactive', '2021-10-03 03:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `id` int NOT NULL,
  `post_id` int NOT NULL,
  `tag_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`id`, `post_id`, `tag_id`, `created_at`) VALUES
(1, 23, 1, '2021-10-03 01:35:07'),
(2, 24, 1, '2021-10-03 01:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int NOT NULL,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`) VALUES
(1, 'haha post', '2021-10-03 01:33:05'),
(2, 'a', '2021-10-03 03:30:39'),
(3, 'f', '2021-10-03 03:30:39'),
(4, 'a', '2021-10-03 03:38:35'),
(5, 'a', '2021-10-03 03:43:01'),
(6, 'a', '2021-10-03 03:43:48'),
(7, 'a', '2021-10-03 03:44:22'),
(8, 'a', '2021-10-03 03:45:10'),
(9, 'a', '2021-10-03 03:45:55'),
(10, 'a', '2021-10-03 03:54:48'),
(11, 'a', '2021-10-03 03:55:44'),
(12, 'Doe', '2021-10-03 04:06:53'),
(13, 'A', '2021-10-03 04:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','editor','writer','user') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(25, 'babycool', 'keiradom296@gmail.com', '$2y$10$Y9qcHtC8NNMp8wetnL02.O7BLLiNQtZ5OvuEw6.62sV1ar0b/x.Z2', 'admin', '2021-09-22 10:06:35'),
(45, 'hopdinh', 'hop@gmailcom', '$2y$10$HDZRE9x6.3wDgvSvvyyPZeVR51OAofx7AhxEzzTfWIRxKVLyImHly', 'writer', '2021-09-23 16:05:34'),
(47, 'keira12', 'ki@gmail.com', '$2y$10$fUrpIvUDJr9udS3mhK48COKRyP5liJhpSPUyE3yAjyon2wefPP1kK', 'editor', '2021-09-24 02:43:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tags_ibfk_1` (`post_id`),
  ADD KEY `post_tags_ibfk_2` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `post_tags_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `post_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
