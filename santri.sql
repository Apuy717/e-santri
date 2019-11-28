-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 12:10 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `santri`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 2, '1', 1, NULL, NULL, NULL),
(2, 8, 'EwnSj3KPMQSrmfKt2NtWeAUvWyQekVy5', 1, '2019-11-18 08:18:50', '2019-11-18 08:18:50', '2019-11-18 08:18:50'),
(3, 9, 'M0tTMFlPPkcrUKj63kr0260EIMIo2c4u', 1, '2019-11-18 08:24:13', '2019-11-18 08:24:13', '2019-11-18 08:24:13'),
(4, 10, 'jxPeljWkR5bdUpK5Ar5SCJEZJB5p4gBW', 1, '2019-11-18 10:13:45', '2019-11-18 10:13:45', '2019-11-18 10:13:45'),
(5, 11, 'QnLUVsMl3pLwHPAVQMqqMVpsktTnRmbE', 1, '2019-11-18 10:15:01', '2019-11-18 10:15:01', '2019-11-18 10:15:01'),
(6, 12, 'yZx3YQ85gTDQB28miWdqDlUR0qgFGWRl', 1, '2019-11-18 17:08:59', '2019-11-18 14:51:38', '2019-11-18 17:08:59'),
(7, 13, '1WjS2y2TqLOAbI2w7zDcfi1LV14U9gxB', 1, '2019-11-18 17:07:12', '2019-11-18 15:01:07', '2019-11-18 17:07:12');

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
(2, '2014_07_02_230147_migration_cartalyst_sentinel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(1, 2, 'EYilKMPLaAfJ4bY51N4Aw9w5Esf3f9Ze', '2019-11-18 07:09:49', '2019-11-18 07:09:49'),
(2, 2, '483DY0fXSNc98BBMrBwgwcTCfrbjQfKQ', '2019-11-18 07:17:34', '2019-11-18 07:17:34'),
(3, 11, 'gIBorMmnveM45hmUhtZX60HuCpVQiJMV', '2019-11-18 10:27:34', '2019-11-18 10:27:34'),
(4, 10, 'Cl9tizcCmvABHXWr7gZLgWmU8tz2lvBw', '2019-11-18 10:35:23', '2019-11-18 10:35:23'),
(5, 10, 'X5qehECUZYNsJQ59W5Qp1vrukvYAUZtn', '2019-11-18 10:49:09', '2019-11-18 10:49:09'),
(6, 10, 'SynOUatE41RMouvBoXcNG7R7ffWi877y', '2019-11-18 10:54:06', '2019-11-18 10:54:06'),
(7, 10, 'hUOOSbjXaJoFmir1U0A7ZhQZbVB7OG2R', '2019-11-18 10:56:11', '2019-11-18 10:56:11'),
(8, 10, 'dE7mYBcktxqHJOElSWzbafaGXOr3W2v3', '2019-11-18 10:57:52', '2019-11-18 10:57:52'),
(25, 11, 'dOj8QmyVGVJXr0y4hDkmT6QyAdXzBqm6', '2019-11-18 15:29:38', '2019-11-18 15:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, NULL, NULL),
(2, 'user', 'user', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(10, 2, '2019-11-18 10:13:45', '2019-11-18 10:13:45'),
(11, 1, '2019-11-18 10:15:01', '2019-11-18 10:15:01'),
(12, 2, '2019-11-18 14:51:38', '2019-11-18 14:51:38'),
(13, 2, '2019-11-18 15:01:07', '2019-11-18 15:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 'global', NULL, '2019-11-18 06:23:14', '2019-11-18 06:23:14'),
(2, NULL, 'ip', '127.0.0.1', '2019-11-18 06:23:14', '2019-11-18 06:23:14'),
(3, NULL, 'global', NULL, '2019-11-18 06:26:52', '2019-11-18 06:26:52'),
(4, NULL, 'ip', '127.0.0.1', '2019-11-18 06:26:52', '2019-11-18 06:26:52'),
(5, 1, 'user', NULL, '2019-11-18 06:26:52', '2019-11-18 06:26:52'),
(6, NULL, 'global', NULL, '2019-11-18 14:46:41', '2019-11-18 14:46:41'),
(7, NULL, 'ip', '127.0.0.1', '2019-11-18 14:46:41', '2019-11-18 14:46:41'),
(8, 10, 'user', NULL, '2019-11-18 14:46:41', '2019-11-18 14:46:41'),
(9, NULL, 'global', NULL, '2019-11-18 14:48:18', '2019-11-18 14:48:18'),
(10, NULL, 'ip', '127.0.0.1', '2019-11-18 14:48:18', '2019-11-18 14:48:18'),
(11, NULL, 'global', NULL, '2019-11-18 14:49:00', '2019-11-18 14:49:00'),
(12, NULL, 'ip', '127.0.0.1', '2019-11-18 14:49:00', '2019-11-18 14:49:00'),
(13, NULL, 'global', NULL, '2019-11-18 14:50:32', '2019-11-18 14:50:32'),
(14, NULL, 'ip', '127.0.0.1', '2019-11-18 14:50:32', '2019-11-18 14:50:32'),
(15, 10, 'user', NULL, '2019-11-18 14:50:32', '2019-11-18 14:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `NIM` int(20) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `NIM`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(10, 3211, 'abdulgopur2306@gmail.com', '$2y$10$BSu9MzMFVV69iAWdVVPRGe9RjBmJR9pOOeCW0icwSzWpTaSx6ZPwC', '\"123\"', '2019-11-18 13:29:55', 'Abdul', 'Gopur', '2019-11-18 10:13:45', '2019-11-18 13:29:55'),
(11, 3212, 'apuystereo@gmail.com', '$2y$10$5YcbtBs4apwFlX/ghvogu.AEJ47nxfLeeguzRzEf7lWY19C7QsTMe', '\"123\"', '2019-11-18 15:29:38', 'Apuy', 'St', '2019-11-18 10:15:01', '2019-11-18 15:29:38'),
(12, 32, 'alan@gmail.com', '$2y$10$P9m6TRkFqaO8h8BnNdc96uJ4K2pbfQVMB8Gw4vQOgiDOZ2elClb/m', '\"123\"', '2019-11-18 14:51:45', 'alan', 'maulidan', '2019-11-18 14:51:38', '2019-11-18 14:51:45'),
(13, 99, 'sebri@gmail.com', '$2y$10$aUh8GbvQJmQww6tgwoBuLerODl9ZOMcLbR4nDqj4MWiQEW.r69meO', '\"123\"', NULL, 'sebri', 'utama', '2019-11-18 15:01:07', '2019-11-18 15:01:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`NIM`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
