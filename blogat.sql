-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2021 at 02:03 PM
-- Server version: 8.0.26-0ubuntu0.20.04.3
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
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`) VALUES
(14, 'the gioi', 'the-gioi', '2021-09-30 02:45:44'),
(18, 'giai tri', 'giai-tri', '2021-09-30 03:38:48'),
(19, 'keira', 'keira', '2021-09-30 07:57:15'),
(20, 'tin tuc mua sam', 'tin-tuc-mua-sam', '2021-09-30 08:48:39');

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
(106, 18, 25, 'game pokemon 2021', '2021-10-05-11-21-04.png', 'game-pokemon-2021', '<h3 style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 17px; font-family: Poppins, serif; line-height: 30px; color: #111111; font-size: 22px; background-color: #ffffff;\"><span style=\"box-sizing: inherit; font-weight: bolder;\">Nam non velit est. Sed lobortis arcu vitae nunc molestie consectetur. Nam eget neque ac ex fringilla dignissim eu ac est. Nunc et nisl vel odio posuere.</span></h3>\r\n<p style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 26px; font-family: Poppins, serif; color: #5e5e5e; font-size: 15px; line-height: 26px; background-color: #ffffff;\">Vivamus non condimentum orci. Pellentesque venenatis nibh sit amet est vehicula lobortis. Cras eget aliquet eros. Nunc lectus elit, suscipit at nunc sed, finibus imperdiet ipsum. Maecenas dapibus neque sodales nulla finibus volutpat. Integer pulvinar massa vitae ultrices posuere. Proin ut tempor turpis. Mauris felis neque, egestas in lobortis et, sodales non ante. Ut vestibulum libero quis luctus tempus. Nullam eget dignissim massa. Vivamus id condimentum orci. Nunc ac sem urna. Aliquam et hendrerit nisl massa nunc.</p>\r\n<p style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 26px; font-family: Poppins, serif; color: #5e5e5e; font-size: 15px; line-height: 26px; background-color: #ffffff;\">Morbi pharetra porta consequat. Aenean et diam sapien.&nbsp;<a style=\"box-sizing: inherit; background-color: transparent; touch-action: manipulation; font-weight: bold; color: #ff6347 !important; text-decoration-line: none !important;\" href=\"https://html.design/demo/tech-blog/tech-single.html\">Interdum et malesuada</a>&nbsp;fames ac ante ipsum primis in faucibus. Pellentesque dictum ligula iaculis, feugiat metus eu, sollicitudin ex. Quisque eu ullamcorper ligula. In vel ex ac purus finibus viverra. Maecenas pretium lobortis turpis. Fusce lacinia nisi in tortor massa nunc.</p>\r\n<ul class=\"check\" style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 25px; padding-bottom: 0px; list-style: none; color: #5e5e5e; font-family: Poppins, serif; font-size: 15px; background-color: #ffffff;\">\r\n<li style=\"box-sizing: inherit;\">Integer sit amet odio ac lectus imperdiet elementum.</li>\r\n<li style=\"box-sizing: inherit;\">Praesent vitae lacus sed lacus ullamcorper mollis.</li>\r\n<li style=\"box-sizing: inherit;\">Donec vitae metus ac felis vulputate tincidunt non et ex.</li>\r\n<li style=\"box-sizing: inherit;\">In dapibus sapien at viverra venenatis.</li>\r\n<li style=\"box-sizing: inherit;\">Pellentesque mollis velit id maximus finibus.</li>\r\n</ul>\r\n<p style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 26px; font-family: Poppins, serif; color: #5e5e5e; font-size: 15px; line-height: 26px; background-color: #ffffff;\">Proin ultricies nulla consectetur, sollicitudin dolor at, sollicitudin mauris. Maecenas at nunc nunc. Ut nulla felis, tincidunt et porttitor at, rutrum in dolor. Aenean id tincidunt ligula. Donec vitae placerat odio. Mauris accumsan nibh ut nunc maximus, ac auctor elit vehicula. Cras leo sem, vehicula a ultricies ac, condimentum vitae lectus. Sed ut eros euismod, luctus nisl eu, congue odio.<img style=\"float: left;\" src=\"https://html.design/demo/tech-blog/upload/tech_menu_10.jpg\" alt=\"\" width=\"286\" height=\"164\" />Suspendisse ultrices placerat dolor sed efficitur. Morbi in laoreet diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris ut massa id lectus laoreet porta non in metus. Donec nibh justo, tincidunt non justo ut, tincidunt malesuada turpis. Cras pellentesque sollicitudin ex eget pharetra.rta non in metus. Donec nibh justo, tincidunt non justo ut, tincidunt malesuada turpis. Cras pellentesque sollicitudin ex eget pharetra</p>\r\n<p style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 26px; font-family: Poppins, serif; color: #5e5e5e; font-size: 15px; line-height: 26px; background-color: #ffffff;\">&nbsp;</p>', 'active', '2021-10-05 04:21:04'),
(143, 14, 25, 'xin chao cac ban', '2021-10-19-11-40-47.jpg', 'xin-chao-cac-ban', '<p>toi yeu cac ban</p>', 'active', '2021-10-11 10:04:35'),
(146, 18, 25, 'dasdad', '2021-10-19-12-33-24.jpg', 'dasdad', 'asdasdasd', 'inactive', '2021-10-19 05:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `post_reviews`
--

CREATE TABLE `post_reviews` (
  `id` int NOT NULL,
  `post_id` int NOT NULL,
  `name` varchar(250) NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `review` text NOT NULL,
  `created_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `post_reviews`
--

INSERT INTO `post_reviews` (`id`, `post_id`, `name`, `rating`, `review`, `created_at`) VALUES
(16, 143, 'asdasd', 5, 'dasd', 1634623928),
(17, 106, 'asdasd', 5, 'dasd', 1634624231),
(18, 143, 'asdasd', 5, 'asdasd', 1634624518),
(19, 143, 'asdasd', 5, 'asdasd', 1634624639),
(20, 143, 'asd', 0, 'asdasd', 1634624679),
(21, 143, 'dasd', 5, 'asdasd', 1634624818),
(22, 143, 'asd', 5, 'asd', 1634624874),
(23, 143, 'sd', 5, 'dad', 1634624991),
(24, 106, 'test', 4, 'asd', 1634626778);

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
(47, 143, 137, '2021-10-11 10:04:35'),
(48, 148, 140, '2021-10-19 05:37:06'),
(49, 149, 140, '2021-10-19 05:37:39');

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
(137, 'xinchao', '2021-10-11 10:04:35'),
(138, ',a', '2021-10-19 05:33:24'),
(139, 'faff', '2021-10-19 05:36:15'),
(140, 'fafaf', '2021-10-19 05:37:06'),
(141, 'fafaf', '2021-10-19 05:37:39');

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
(55, 'keira', 'keiradom296@gmail.com', '$2y$10$G8J.3lGwTKtZtVgINbkL2.0J5dcRy5K4LJE3EOOZFfMr.6em76ywG', 'admin', '2021-10-04 08:39:56');

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
-- Indexes for table `post_reviews`
--
ALTER TABLE `post_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `post_reviews`
--
ALTER TABLE `post_reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
