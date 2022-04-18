-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2022 at 08:24 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `micro-blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` int(10) UNSIGNED NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes_dislikes`
--

CREATE TABLE `likes_dislikes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes_dislikes`
--

INSERT INTO `likes_dislikes` (`id`, `post_id`, `type`, `user_id`, `created_at`, `updated_at`) VALUES
(25, 11, 'dislike', 1, '2022-04-16 06:46:39', '2022-04-16 06:46:39'),
(28, 16, 'like', 3, '2022-04-16 06:49:08', '2022-04-16 06:49:08'),
(31, 2, 'like', 3, '2022-04-16 08:17:35', '2022-04-16 08:17:35'),
(35, 17, 'like', 3, '2022-04-16 09:45:50', '2022-04-16 09:45:50'),
(42, 20, 'like', 3, '2022-04-16 10:47:28', '2022-04-16 10:47:28'),
(43, 22, 'like', 1, '2022-04-16 11:06:36', '2022-04-16 11:06:36'),
(46, 11, 'dislike', 3, '2022-04-16 11:07:51', '2022-04-16 11:07:51'),
(47, 25, 'like', 1, '2022-04-16 12:31:54', '2022-04-16 12:31:54'),
(51, 24, 'dislike', 1, '2022-04-16 12:39:46', '2022-04-16 12:39:46'),
(53, 25, 'like', 3, '2022-04-16 16:38:54', '2022-04-16 16:38:54'),
(54, 24, 'dislike', 3, '2022-04-16 16:39:44', '2022-04-16 16:39:44'),
(55, 23, 'like', 3, '2022-04-16 16:42:43', '2022-04-16 16:42:43'),
(64, 29, 'dislike', 6, '2022-04-17 14:00:42', '2022-04-17 14:00:42'),
(65, 29, 'like', 7, '2022-04-17 14:00:46', '2022-04-17 14:00:46'),
(70, 30, 'like', 3, '2022-04-17 14:12:51', '2022-04-17 14:12:51'),
(94, 29, 'dislike', 3, '2022-04-17 17:09:23', '2022-04-17 17:09:23'),
(95, 27, 'like', 3, '2022-04-17 17:10:51', '2022-04-17 17:10:51'),
(96, 27, 'like', 1, '2022-04-17 17:11:30', '2022-04-17 17:11:30'),
(98, 29, 'dislike', 1, '2022-04-17 17:13:03', '2022-04-17 17:13:03'),
(101, 30, 'like', 1, '2022-04-17 17:22:17', '2022-04-17 17:22:17'),
(102, 28, 'like', 1, '2022-04-18 02:15:30', '2022-04-18 02:15:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_08_10_102131_create_posts_table', 1),
(5, '2020_08_10_102206_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `notification_viewed` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `post_id`, `text`, `created_at`, `updated_at`, `notification_viewed`) VALUES
(1, 1, 30, 'Commented', '2022-04-17 15:59:43', '2022-04-17 15:59:43', 0),
(2, 1, 30, 'disliked', '2022-04-17 16:04:00', '2022-04-17 16:04:00', 0),
(3, 1, 30, 'Admin Commented on your post.', '2022-04-17 16:05:45', '2022-04-17 16:05:45', 0),
(4, 1, 30, 'Admin liked your post.', '2022-04-17 16:10:21', '2022-04-17 16:10:21', 0),
(5, 1, 30, 'Admin disliked your post.', '2022-04-17 16:10:32', '2022-04-17 16:10:32', 0),
(6, 1, 30, 'Admin liked your post.', '2022-04-17 16:45:20', '2022-04-17 16:45:20', 0),
(7, 1, 30, 'Admin disliked your post.', '2022-04-17 16:45:20', '2022-04-17 16:45:20', 0),
(8, 1, 30, 'Admin liked your post.', '2022-04-17 16:45:21', '2022-04-17 16:45:21', 0),
(9, 1, 30, 'Admin disliked your post.', '2022-04-17 16:45:22', '2022-04-17 16:45:22', 0),
(10, 1, 30, 'Admin liked your post.', '2022-04-17 16:45:23', '2022-04-17 16:45:23', 0),
(11, 1, 30, 'Admin disliked your post.', '2022-04-17 16:45:24', '2022-04-17 16:45:24', 0),
(12, 1, 30, 'Admin liked your post.', '2022-04-17 16:45:25', '2022-04-17 16:45:25', 0),
(13, 1, 30, 'Admin disliked your post.', '2022-04-17 16:45:25', '2022-04-17 16:45:25', 0),
(14, 1, 30, 'Admin liked your post.', '2022-04-17 16:45:27', '2022-04-17 16:45:27', 0),
(15, 1, 30, 'Admin disliked your post.', '2022-04-17 16:45:27', '2022-04-17 16:45:27', 0),
(16, 1, 30, 'Admin liked your post.', '2022-04-17 16:45:28', '2022-04-17 16:45:28', 0),
(17, 1, 30, 'Admin disliked your post.', '2022-04-17 16:45:29', '2022-04-17 16:45:29', 0),
(18, 1, 30, 'Admin liked your post.', '2022-04-17 16:45:30', '2022-04-17 16:57:03', 1),
(19, 1, 30, 'Admin disliked your post.', '2022-04-17 16:45:30', '2022-04-17 16:57:14', 1),
(20, 1, 30, 'Admin liked your post.', '2022-04-17 16:45:31', '2022-04-17 16:56:14', 1),
(21, 1, 30, 'Admin disliked your post.', '2022-04-17 16:45:32', '2022-04-17 16:52:42', 1),
(22, 3, 29, 'ssdfsdf Commented on your post.', '2022-04-17 17:08:28', '2022-04-17 17:09:11', 1),
(23, 1, 29, 'Admin disliked your post.', '2022-04-17 17:08:46', '2022-04-17 17:08:46', 0),
(24, 3, 29, 'ssdfsdf disliked your post.', '2022-04-17 17:09:23', '2022-04-17 17:09:23', 0),
(25, 3, 27, 'ssdfsdf liked your post.', '2022-04-17 17:10:51', '2022-04-17 17:10:51', 0),
(26, 1, 27, 'Admin liked your post.', '2022-04-17 17:11:30', '2022-04-17 17:16:25', 1),
(27, 1, 29, 'Admin liked your post.', '2022-04-17 17:12:39', '2022-04-17 17:16:30', 1),
(28, 1, 29, 'Admin disliked your post.', '2022-04-17 17:13:03', '2022-04-17 17:16:22', 1),
(29, 1, 29, 'Admin Commented on your post.', '2022-04-17 17:13:16', '2022-04-17 17:16:20', 1),
(30, 1, 29, 'Admin Commented on your post.', '2022-04-17 17:13:21', '2022-04-17 17:16:17', 1),
(31, 3, 30, 'Admin liked your post.', '2022-04-17 17:16:52', '2022-04-17 17:16:52', 0),
(32, 3, 30, 'Admin Commented on your post.', '2022-04-17 17:17:48', '2022-04-17 17:17:48', 0),
(33, 3, 30, 'Admin Commented on your post.', '2022-04-17 17:20:14', '2022-04-17 17:20:14', 0),
(34, 3, 30, 'ssdfsdf disliked your post.', '2022-04-17 17:21:22', '2022-04-18 02:16:35', 1),
(35, 3, 30, 'Admin liked your post.', '2022-04-17 17:22:17', '2022-04-17 17:22:25', 1),
(36, 3, 28, 'Admin liked your post.', '2022-04-18 02:15:30', '2022-04-18 02:16:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislikes` int(11) NOT NULL DEFAULT '0',
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `content`, `slug`, `created_at`, `updated_at`, `user_id`, `likes`, `dislikes`, `title`, `image`) VALUES
(23, 'What is Lorem Ipsum?\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-04-16-122624', '2022-04-16 06:56:24', '2022-04-16 11:12:43', 3, 1, 0, 'Fisrt Post', '16501119847472.jpeg'),
(24, 'Where does it come from?\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '2022-04-16-122703', '2022-04-16 06:57:03', '2022-04-16 11:09:44', 3, 0, 2, 'Second Post', '16501120235420.jpeg'),
(25, 'Why do we use it?\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2022-04-16-123124', '2022-04-16 07:01:24', '2022-04-16 11:08:54', 1, 2, 0, 'Admin Post edit', '16501125187397.jpeg'),
(26, 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book. It usually begins with:', '2022-04-16-164112', '2022-04-16 11:11:12', '2022-04-16 11:11:12', 3, 0, 0, 'Sample Post', '16501272724956.png'),
(27, 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book. It usually begins with:', '2022-04-16-164149', '2022-04-16 11:11:49', '2022-04-17 11:41:30', 3, 2, 0, 'Next blog', '16501273093397.jpeg'),
(28, 'The purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn\'t distract from the layout. A practice not without controversy, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content.', '2022-04-16-164224', '2022-04-16 11:12:24', '2022-04-17 20:45:30', 3, 1, 0, 'Another New Post', '16502046539837.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `notification_count` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `notification_count`) VALUES
(1, 'Admin', 'admin@example.com', '$2y$10$0rW0eytPtbL3xpTepgMIGu.lqCwYv4JIxsGFGZ3cDYraYUBSjL17G', 'admin', NULL, NULL, '2022-04-17 11:47:48', 8),
(2, 'User', 'user@example.com', '$2y$10$ONzPqXy.XLsV8cvp2TNEf.gC7k1S5ENaYGrNbnxC2EpDpHHc0LW8e', 'user', NULL, NULL, NULL, 0),
(3, 'ssdfsdf', 'aaaaaa@aaaaaa.aaaaaa', '$2y$10$jJ.AGlrwE/zH8xeUhSitv.plCM8p0YylsMF9BO5lTtnUZRgI9.DUi', 'user', NULL, '2022-04-15 05:26:35', '2022-04-17 20:46:35', 3),
(4, 'dfsdfsdf', 'zxcsdasd@sdf.zf', '$2y$10$7pDWOcT0jKKLwntb5CCRreQ2hlzUcPI8zIDUP9LYadwp4jy6iKoKG', 'user', NULL, '2022-04-16 11:38:41', '2022-04-16 11:38:41', 0),
(5, 'dfsdfsdf', 'zxcsdasd@sdf.zfs', '$2y$10$O2Z62QGmdA0D3n3S6ZAfReR2Tp22TvzIKms6jwnKeMUX8AZyHhyUi', 'user', NULL, '2022-04-16 11:52:02', '2022-04-16 11:52:02', 0),
(6, 'Second User', 'user@mail1com', '$2y$10$BYnd4dAM8q61vOBVeEUau.kGkNiFCsnD.4Hk1JxkDmzoeZfgLM7ZK', 'user', NULL, '2022-04-17 08:23:49', '2022-04-17 08:23:49', 0),
(7, 'Third User', 'email@dsf', '$2y$10$bl5ibEAwv8cwtpyi2yGzBuYtKP9kgAEDRryou0sHhBRRllD34EVPO', 'user', NULL, '2022-04-17 08:28:33', '2022-04-17 08:28:33', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_parent_id_foreign` (`parent_id`),
  ADD KEY `comments_commentable_id_foreign` (`commentable_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes_dislikes`
--
ALTER TABLE `likes_dislikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `likes_dislikes`
--
ALTER TABLE `likes_dislikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_commentable_id_foreign` FOREIGN KEY (`commentable_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
