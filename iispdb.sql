-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 09:10 AM
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
-- Database: `iispdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_08_002657_add_username_to_users_table', 1),
(6, '2023_05_08_023959_modify_user_table', 1),
(7, '2023_05_09_063818_create_timesheets_table', 1),
(8, '2023_05_11_083106_add_profile_picture_to_users_table', 1),
(9, '2023_05_12_031917_add_department_to_user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timesheets`
--

CREATE TABLE `timesheets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_type` enum('TASK','BREAK','LOGIN','LOGOUT','LUNCH','MEETING','TRAINING','WEBINAR') NOT NULL,
  `project_type` enum('Deep Dive Session','Meeting','Debugging') NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timesheets`
--

INSERT INTO `timesheets` (`id`, `user_id`, `task_name`, `task_type`, `project_type`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 4, 'igtca Development', 'TRAINING', 'Debugging', '1970-01-01 00:00:00', '1991-11-30 23:49:32', '2023-05-11 23:08:37', '2023-05-11 23:08:37'),
(2, 3, 'snufi Development', 'TASK', 'Deep Dive Session', '1970-01-01 00:00:00', '1993-07-21 22:53:33', '2023-05-11 23:08:37', '2023-05-11 23:08:37'),
(3, 7, 'lkvaj Development', 'MEETING', 'Debugging', '1970-01-01 00:00:00', '1989-07-01 05:34:59', '2023-05-11 23:08:37', '2023-05-11 23:08:37'),
(4, 4, 'hzitf Development', 'WEBINAR', 'Debugging', '1970-01-01 00:00:00', '2014-04-21 11:21:05', '2023-05-11 23:08:37', '2023-05-11 23:08:37'),
(5, 4, 'klgew Development', 'TRAINING', 'Debugging', '1970-01-01 00:00:00', '1982-02-04 18:36:28', '2023-05-11 23:08:37', '2023-05-11 23:08:37'),
(6, 8, 'vrqqw Development', 'BREAK', 'Debugging', '1970-01-01 00:00:00', '1979-06-08 18:34:49', '2023-05-11 23:08:37', '2023-05-11 23:08:37'),
(7, 7, 'toihm Development', 'MEETING', 'Meeting', '1970-01-01 00:00:00', '1972-11-19 04:50:56', '2023-05-11 23:08:37', '2023-05-11 23:08:37'),
(8, 5, 'bgwei Development', 'WEBINAR', 'Deep Dive Session', '1970-01-01 00:00:00', '1988-06-25 14:54:21', '2023-05-11 23:08:37', '2023-05-11 23:08:37'),
(9, 6, 'nrgan Development', 'LOGIN', 'Deep Dive Session', '1970-01-01 00:00:00', '2006-06-21 17:10:02', '2023-05-11 23:08:37', '2023-05-11 23:08:37'),
(10, 3, 'lnunm Development', 'LOGOUT', 'Debugging', '1970-01-01 00:00:00', '2000-10-02 18:30:37', '2023-05-11 23:08:37', '2023-05-11 23:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','superadmin','intern') NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `active` tinyint(1) NOT NULL,
  `hourly_rate` int(11) DEFAULT NULL,
  `required_hours` int(11) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `hourly_rate_last_updated` date DEFAULT NULL,
  `supervisor` varchar(255) DEFAULT NULL,
  `bank_account_no` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `department` enum('Technology','People','Business Development') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `contact_number`, `position`, `start_date`, `active`, `hourly_rate`, `required_hours`, `bank`, `hourly_rate_last_updated`, `supervisor`, `bank_account_no`, `profile_picture`, `department`) VALUES
(1, 'testsuperadmin', 'Test Superadmin', 'test@example.com', '2023-05-11 23:08:37', '$2y$10$rxT0CxeyTytk5q4kALgsz.vziU.l2AYpn280oWTCMGhDf3qgjJUdC', 'Nh7JhbEzyO', '2023-05-11 23:08:37', '2023-05-11 23:08:37', 'superadmin', '123456', 'CEO', '2023-01-02', 1, 54, 500, 'GCASH', '2023-06-03', 'Juan de la Cruz', '1244356', NULL, 'Business Development'),
(2, 'testadmin', 'Test Admin', 'test1@example.com', '2023-05-11 23:08:37', '$2y$10$HFFNlUUd3qF1u9p5Lcndne09Vjs2pS.u.D.7Bxg6e8gKtQ3u/Ia/q', 'TWmziwF4lG', '2023-05-11 23:08:37', '2023-05-11 23:08:37', 'admin', '123456', 'CEO', '2023-01-02', 1, 54, 500, 'GCASH', '2023-06-03', 'Juan de la Cruz', '1244356', NULL, 'Business Development'),
(3, 'testintern', 'Test Intern', 'test2@example.com', '2023-05-11 23:08:37', '$2y$10$CyARdp1e1T6xWi5fst5Bd.wdufCmQ.rqKXu8IMcl/vHsjKB09MoQe', 'JrQo6f90RT', '2023-05-11 23:08:37', '2023-05-11 23:08:37', 'intern', '123456', 'CEO', '2023-01-02', 1, 54, 500, 'GCASH', '2023-06-03', 'Juan de la Cruz', '1244356', NULL, 'Business Development'),
(4, 'Roob', 'Zelda Orn I', 'qwisozk@example.net', '2023-05-11 23:08:37', '$2y$10$.YQXMfvh80BLdpj07rt/xOi9hc5.ZKOeSv170URphS.ZaTzidnwUS', 'owm5cDZxhm', '2023-05-11 23:08:37', '2023-05-11 23:08:37', 'admin', '701-294-1990', 'Marking Machine Operator', '2023-01-02', 1, 56, 336, 'BDO', '2023-06-03', 'Braxton Kris', '5361391952697584', NULL, 'Technology'),
(5, 'Blick', 'Mrs. Gladyce Haag', 'padberg.conor@example.org', '2023-05-11 23:08:37', '$2y$10$M44fyHg8HHKw6Kfqs88BJeWFLM.l.kbbkSrQz4zQ9yCpbZl4NCvAO', 'aB3uF010xk', '2023-05-11 23:08:37', '2023-05-11 23:08:37', 'intern', '+14798712538', 'Copy Writer', '2023-01-02', 1, 26, 317, 'BDO', '2023-06-03', 'Fanny Stamm', '2600532965174677', NULL, 'Technology'),
(6, 'Wolf', 'Hobart Upton II', 'maximillian08@example.org', '2023-05-11 23:08:37', '$2y$10$0DUiZ2.2Ad2rOtXm.5VjkOEb2kZ1paBts5wRPj0I6O7G3xQt6FVeS', 'oNzKjiOKvZ', '2023-05-11 23:08:37', '2023-05-11 23:08:37', 'intern', '475.275.8819', 'Waiter', '2023-01-02', 1, 36, 126, 'BDO', '2023-06-03', 'Gilberto Schuster', '2221620652372404', NULL, 'People'),
(7, 'Klein', 'Marielle Turcotte', 'fquitzon@example.com', '2023-05-11 23:08:37', '$2y$10$ivrmf3Vc7J5pvdRzGC.jVeHDU4zSfbI2JOzfAy9hytyd7cMdgKljy', 'xaKu9rQYcQ', '2023-05-11 23:08:37', '2023-05-11 23:08:37', 'admin', '+1-661-697-0436', 'Photographic Process Worker', '2023-01-02', 1, 54, 446, 'DBP', '2023-06-03', 'Ismael King', '5222375254215004', NULL, 'Business Development'),
(8, 'Simonis', 'Leora Jerde', 'olin.lakin@example.net', '2023-05-11 23:08:37', '$2y$10$yi3tRYwc9eEyMz8LhhXUS.HlhvmdsJ6cTsAZs3R4YBr.PrdOwulLq', 'lhVHRhZVMd', '2023-05-11 23:08:37', '2023-05-11 23:08:37', 'superadmin', '+1-714-485-7309', 'Armored Assault Vehicle Crew Member', '2023-01-02', 1, 45, 204, 'DBP', '2023-06-03', 'Prof. Jettie Douglas III', '5438629318954648', NULL, 'Business Development');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `timesheets`
--
ALTER TABLE `timesheets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timesheets_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timesheets`
--
ALTER TABLE `timesheets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `timesheets`
--
ALTER TABLE `timesheets`
  ADD CONSTRAINT `timesheets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
