-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 04:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.5

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
-- Table structure for table `approvals`
--

CREATE TABLE `approvals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requestor_id` bigint(20) UNSIGNED NOT NULL,
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `field_to_edit` enum('id','username','name','email','email_verified_at','password','remember_token','created_at','updated_at','role','contact_number','position','start_date','active','hourly_rate','required_hours','bank','hourly_rate_last_updated','supervisor','bank_account_no','profile_picture','department') NOT NULL,
  `original_value` varchar(255) NOT NULL,
  `modified_value` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(57, '2014_10_12_000000_create_users_table', 1),
(58, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(59, '2019_08_19_000000_create_failed_jobs_table', 1),
(60, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(61, '2023_05_08_002657_add_username_to_users_table', 1),
(62, '2023_05_08_023959_modify_user_table', 1),
(63, '2023_05_09_063818_create_timesheets_table', 1),
(64, '2023_05_11_083106_add_profile_picture_to_users_table', 1),
(65, '2023_05_12_031917_add_department_to_user', 1),
(66, '2023_05_12_103027_create_approvals_table', 1);

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
(1, 1, 'bajqg Development', 'LOGIN', 'Deep Dive Session', '1970-01-01 00:00:00', '2022-12-05 09:51:44', '2023-05-12 05:13:23', '2023-05-12 05:13:23'),
(2, 5, 'nceck Development', 'LUNCH', 'Debugging', '1970-01-01 00:00:00', '2007-12-06 18:17:30', '2023-05-12 05:13:23', '2023-05-12 05:13:23'),
(3, 3, 'rpgnd Development', 'TASK', 'Deep Dive Session', '1970-01-01 00:00:00', '2021-06-26 06:20:31', '2023-05-12 05:13:23', '2023-05-12 05:13:23'),
(4, 8, 'emjjp Development', 'LOGIN', 'Debugging', '1970-01-01 00:00:00', '1985-06-26 20:21:55', '2023-05-12 05:13:23', '2023-05-12 05:13:23'),
(5, 5, 'ssdxp Development', 'LUNCH', 'Deep Dive Session', '1970-01-01 00:00:00', '1970-09-12 23:43:41', '2023-05-12 05:13:23', '2023-05-12 05:13:23'),
(6, 8, 'snurm Development', 'WEBINAR', 'Deep Dive Session', '1970-01-01 00:00:00', '2005-08-15 02:06:14', '2023-05-12 05:13:23', '2023-05-12 05:13:23'),
(7, 5, 'jdhns Development', 'LUNCH', 'Deep Dive Session', '1970-01-01 00:00:00', '2021-12-29 15:19:05', '2023-05-12 05:13:23', '2023-05-12 05:13:23'),
(8, 8, 'oowqg Development', 'LOGOUT', 'Meeting', '1970-01-01 00:00:00', '1971-07-21 05:58:55', '2023-05-12 05:13:23', '2023-05-12 05:13:23'),
(9, 7, 'mlayn Development', 'BREAK', 'Debugging', '1970-01-01 00:00:00', '1991-02-10 18:26:07', '2023-05-12 05:13:23', '2023-05-12 05:13:23'),
(10, 3, 'alejw Development', 'TRAINING', 'Deep Dive Session', '1970-01-01 00:00:00', '2019-03-05 14:24:23', '2023-05-12 05:13:23', '2023-05-12 05:13:23');

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
  `start_date` date DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
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
(1, 'testsuperadmin', 'Test Superadmin', 'test@example.com', '2023-05-12 05:13:22', '$2y$10$FxeW2Dci4.OcVMt2tkKFSejdqdqLVZOfF/M8/boQEcdmIoliEV7aW', 'lBYyfhvYJK', '2023-05-12 05:13:22', '2023-05-12 05:13:22', 'superadmin', '123456', 'CEO', '2023-01-02', 1, 54, 500, 'GCASH', '2023-06-03', 'Juan de la Cruz', '1244356', NULL, 'Technology'),
(2, 'testadmin', 'Test Admin', 'test1@example.com', '2023-05-12 05:13:22', '$2y$10$O1AtJffoMIRo7r9RUnf4yOrs5ppkkuwoBmbguPrHTp1.YAQ7diSs2', 'nUkySBHzNObr59GI08tOY9CmynS6kGKdA3hu2S250lG2RNB5o1naEA3ITBUh', '2023-05-12 05:13:22', '2023-05-12 05:13:22', 'admin', '123456', 'CEO', '2023-01-02', 1, 54, 500, 'GCASH', '2023-06-03', 'Juan de la Cruz', '1244356', NULL, 'Technology'),
(3, 'testintern', 'Test Intern', 'test2@example.com', '2023-05-12 05:13:22', '$2y$10$Rr5CnC/Gci601sRR2YO13.FJL8zgH3CXljA2Z2/CuLPXPTplfCM5K', '2Axt6KW0Xh', '2023-05-12 05:13:22', '2023-05-12 05:13:22', 'intern', '123456', 'CEO', '2023-01-02', 1, 54, 500, 'GCASH', '2023-06-03', 'Juan de la Cruz', '1244356', NULL, 'Technology'),
(4, 'O\'Conner', 'Dr. Neoma Kling', 'anolan@example.com', '2023-05-12 05:13:22', '$2y$10$j2/Qa7wfOwpthj7DdzKvvu4w84jOdEOdR6jqG7UbBVDqd.BSMjIjy', 'tR0pa416lo', '2023-05-12 05:13:23', '2023-05-12 05:13:23', 'admin', '+1-619-972-0036', 'Title Abstractor', '2023-01-02', 1, 39, 284, 'BDO', '2023-06-03', 'Reed Waters', '4532472266994185', NULL, 'Business Development'),
(5, 'Smitham', 'Mable Lakin Jr.', 'dtillman@example.com', '2023-05-12 05:13:22', '$2y$10$c0Z/fIclmSbNRCuvx5jBRetxqvuyphy0eX1hvwq9TCivFUC0w7c42', '5YOGg82yrw', '2023-05-12 05:13:23', '2023-05-12 05:13:23', 'intern', '1-478-215-8665', 'Dietetic Technician', '2023-01-02', 1, 40, 423, 'GCASH', '2023-06-03', 'Frederick Pfannerstill', '342219583964898', NULL, 'People'),
(6, 'Nikolaus', 'Nico Bahringer III', 'bgreenholt@example.org', '2023-05-12 05:13:22', '$2y$10$ifM1GkIDgcMmkb3wK343..qdvEILo54y37z3DM3C/NRnFC4eKpEv2', 'UczdfI2lci', '2023-05-12 05:13:23', '2023-05-12 05:13:23', 'superadmin', '+1-951-963-7895', 'Typesetter', '2023-01-02', 1, 51, 345, 'DBP', '2023-06-03', 'Dr. Clifton Sauer II', '4485904789417572', NULL, 'People'),
(7, 'Carter', 'Rocio Swaniawski', 'araceli19@example.com', '2023-05-12 05:13:23', '$2y$10$aljG1opvORd4fUbnIYcQd.8mUGn.NTub.hns0ZftaMlUvvKHkkUme', 'hYb2knkd0U', '2023-05-12 05:13:23', '2023-05-12 05:13:23', 'admin', '(660) 528-5600', 'Financial Manager', '2023-01-02', 1, 44, 428, 'GCASH', '2023-06-03', 'Alejandrin Purdy', '3589185452397203', NULL, 'Business Development'),
(8, 'Bernhard', 'Justine Gerhold', 'austin.zemlak@example.com', '2023-05-12 05:13:23', '$2y$10$SRkr5nI8UlwMlWA3Z4u1BucUCOWoJHZIyozKGEhI/DJd9/DidKDGe', 'U1bYuCu1ln', '2023-05-12 05:13:23', '2023-05-12 05:13:23', 'superadmin', '878.776.4187', 'Radiologic Technologist and Technician', '2023-01-02', 1, 49, 464, 'DBP', '2023-06-03', 'Augusta Flatley', '4539798098220289', NULL, 'Technology'),
(9, 'sample2', 'Test2 Intern', 'test2@sample.com', NULL, '$2y$10$PJdJ0HfkzRxPn6nd1CJxFOxyFf2nxjSnEucBjK8owN2eQC9RE/TRW', NULL, '2023-05-12 05:43:19', '2023-05-12 05:43:19', 'intern', '091241', 'dasd', '2023-02-02', 1, 56, 500, 'gcash', NULL, 'juan dl cruz', '12344363', NULL, 'Technology'),
(10, 'admin2', 'test2 admin', 'admin2@sample.com', NULL, '$2y$10$slDJNOqlACu7Y702IoLfyuKcLODJacuCg2xgdHmOu0d0muukOzT3q', NULL, '2023-05-12 06:05:29', '2023-05-12 06:05:29', 'admin', '1234565', 'dasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Technology');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approvals`
--
ALTER TABLE `approvals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `approvals_requestor_id_foreign` (`requestor_id`),
  ADD KEY `approvals_profile_id_foreign` (`profile_id`);

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
-- AUTO_INCREMENT for table `approvals`
--
ALTER TABLE `approvals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approvals`
--
ALTER TABLE `approvals`
  ADD CONSTRAINT `approvals_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `approvals_requestor_id_foreign` FOREIGN KEY (`requestor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `timesheets`
--
ALTER TABLE `timesheets`
  ADD CONSTRAINT `timesheets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
