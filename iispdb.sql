-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 03:26 AM
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
  `approve` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `approvals`
--

INSERT INTO `approvals` (`id`, `requestor_id`, `profile_id`, `field_to_edit`, `original_value`, `modified_value`, `reason`, `approve`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 'hourly_rate', '56.22', '56.22', 'test float value input', 0, '2023-05-15 03:52:08', '2023-05-15 04:19:47'),
(2, 3, 3, 'hourly_rate', '56.33', '56.33', 'float test 2', 1, '2023-05-15 03:53:12', '2023-05-15 04:19:47'),
(3, 3, 3, 'name', 'Test2 Intern', 'Test2 Intern', 'asdasd', 0, '2023-05-15 03:54:13', '2023-05-15 04:19:47'),
(4, 3, 3, 'start_date', '2023-01-18', '2023-01-18', 'asdasd', 0, '2023-05-15 03:54:13', '2023-05-15 04:19:47'),
(5, 3, 3, 'name', 'Test2 Intern', 'Test2 Intern', 'sdad', 0, '2023-05-15 03:58:00', '2023-05-15 04:19:47'),
(6, 3, 3, 'name', '54.34', 'Test2 Intern', 'asdas', 0, '2023-05-15 04:01:28', '2023-05-15 04:19:47'),
(7, 3, 3, 'name', 'Test Intern', 'Test2 Intern', 'asdasd', 0, '2023-05-15 04:03:55', '2023-05-15 04:19:47'),
(8, 3, 3, 'name', 'Test Intern', 'Test2 Intern', 'update', 0, '2023-05-15 04:05:57', '2023-05-15 04:19:47'),
(9, 3, 3, 'hourly_rate', '54.34', '54.36', 'update', 0, '2023-05-15 04:05:57', '2023-05-15 04:19:47'),
(10, 3, 3, 'name', 'Test Intern', 'Test4 Intern', 'asdasdasd', 0, '2023-05-15 04:06:22', '2023-05-15 04:19:47'),
(11, 3, 3, 'hourly_rate', '54.34', '54.38', 'asdasdasd', 0, '2023-05-15 04:06:22', '2023-05-15 04:19:47'),
(12, 3, 3, 'hourly_rate', '56.33', '56.50', 'update', 1, '2023-05-15 04:25:06', '2023-05-15 04:42:15'),
(13, 1, 3, 'hourly_rate', '56.5', '57.5', 'asdsfdfg', 0, '2023-05-15 05:31:24', '2023-05-18 04:15:22'),
(14, 1, 3, 'hourly_rate', '56.5', '57.5', 'asdsfdfg', 0, '2023-05-15 05:32:08', '2023-05-18 04:15:22'),
(15, 2, 3, 'hourly_rate', '56.5', '58.5', 'dfgdfhhj', 0, '2023-05-15 05:33:47', '2023-05-18 04:15:22');

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
(87, '2014_10_12_000000_create_users_table', 1),
(88, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(89, '2019_08_19_000000_create_failed_jobs_table', 1),
(90, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(91, '2023_05_08_002657_add_username_to_users_table', 1),
(92, '2023_05_08_023959_modify_user_table', 1),
(93, '2023_05_09_063818_create_timesheets_table', 1),
(94, '2023_05_11_083106_add_profile_picture_to_users_table', 1),
(95, '2023_05_12_031917_add_department_to_user', 1),
(96, '2023_05_12_103027_create_approvals_table', 1);

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
(1, 6, 'rmzfu Development', 'LUNCH', 'Deep Dive Session', '2023-05-08 02:45:02', '2023-05-08 03:45:02', '2023-05-15 03:45:02', '2023-05-15 03:45:02'),
(2, 4, 'wpecf Development', 'LUNCH', 'Debugging', '2023-05-15 10:45:02', '2023-05-15 11:45:02', '2023-05-15 03:45:02', '2023-05-15 03:45:02'),
(3, 2, 'fqfqz Development', 'TASK', 'Deep Dive Session', '1970-01-01 08:00:00', '2010-09-20 11:53:10', '2023-05-15 03:45:02', '2023-05-15 03:45:02'),
(4, 7, 'dfgrb Development', 'WEBINAR', 'Meeting', '2023-03-08 06:45:02', '2023-03-08 08:45:02', '2023-05-15 03:45:02', '2023-05-15 03:45:02'),
(5, 6, 'ubxgl Development', 'TASK', 'Deep Dive Session', '2023-04-08 09:45:02', '2023-04-08 11:45:02', '2023-05-15 03:45:02', '2023-05-15 03:45:02'),
(6, 6, 'oiefh Development', 'TRAINING', 'Meeting', '2023-05-15 11:45:02', '2023-05-15 13:45:02', '2023-05-15 03:45:02', '2023-05-15 03:45:02'),
(7, 3, 'djrhr Development', 'BREAK', 'Debugging', '2023-06-15 08:00:02', '2023-06-15 08:45:02', '2023-05-15 03:45:02', '2023-05-15 03:45:02'),
(8, 2, 'jqybc Development', 'LUNCH', 'Meeting', '1970-01-01 08:00:00', '2003-01-01 09:33:44', '2023-05-15 03:45:02', '2023-05-15 03:45:02'),
(9, 5, 'yojwz Development', 'TASK', 'Deep Dive Session', '2023-05-15 11:45:02', '2023-05-15 12:45:02', '2023-05-15 03:45:02', '2023-05-15 03:45:02'),
(10, 3, 'ykkam Development', 'TRAINING', 'Deep Dive Session', '2023-05-15 10:45:02', '2023-05-15 11:45:02', '2023-05-15 03:45:02', '2023-05-15 03:45:02'),
(11, 3, 'time in', 'LOGIN', 'Debugging', '2023-05-15 00:12:58', '2023-05-15 00:13:01', '2023-05-15 04:13:01', '2023-05-15 04:13:01'),
(12, 3, 'asdfgb', 'LOGIN', 'Meeting', '2023-05-15 18:49:24', '2023-05-15 18:49:28', '2023-05-15 10:49:28', '2023-05-15 10:49:28'),
(13, 3, 'asdfg Development', 'TASK', 'Deep Dive Session', '2023-05-16 10:50:48', '2023-05-16 10:50:53', '2023-05-16 02:50:52', '2023-05-16 02:50:52'),
(14, 3, 'development again', 'TASK', 'Debugging', '2023-05-16 00:52:59', '2023-05-16 00:53:03', '2023-05-16 04:52:59', '2023-05-16 04:52:59');

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
  `hourly_rate` float(8,2) DEFAULT NULL,
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
(1, 'testsuperadmin', 'Test Superadmin', 'test@example.com', '2023-05-15 03:45:01', '$2y$10$WQGfneiiPGJAYJKIzXZJFOSnqOdAlPK9gLhihmXGgf0gU4AE1maYm', 'CFfYyC4YWGlIFuRsH8XMxh7YeULgsZcyEl2T0Bkg9h0GfCpvXa3k6InxU3gK', '2023-05-15 03:45:01', '2023-05-15 03:45:01', 'superadmin', '123456', 'CEO', '2023-01-02', 1, 54.01, 500, 'GCASH', '2023-06-03', 'Juan de la Cruz', '1244356', NULL, 'Technology'),
(2, 'testadmin', 'Test Admin', 'test1@example.com', '2023-05-15 03:45:01', '$2y$10$LBdZKgFgVsE/x/Yq2adJTOx3xZM02luZccI.n7S9p/fn/N5bTTnqa', '0eDR3dGlgrvZTV00Smq6oZYZaxPfSVIS5XuhAaIq6N3b1UsTTNQfBRy2jdIB', '2023-05-15 03:45:01', '2023-05-16 08:56:08', 'admin', '123456', 'CEO', '2023-01-02', 1, 54.00, 500, 'GCASH', '2023-06-03', 'Juan de la Cruz', '1244356', '2_1684227368.jpg', 'People'),
(3, 'testintern', 'Test Intern', 'test2@example.com', '2023-05-15 03:45:01', '$2y$10$FnColtYBM1dB0EM1X7DM.uuYZoXAVc0KMHWeMzyWo94TS1lh46A72', 'W7RllqnV1lnhVnYgmW4p7DF2pTIb6yFEWuDDILdJo9bKLsnqnT8tcvtJD9nQ', '2023-05-15 03:45:01', '2023-05-18 04:07:18', 'intern', '12345655', 'CEO', '2023-01-02', 1, 56.51, 500, 'GCASH', '2023-06-03', 'Juan de la Cruz', '123456', NULL, 'Technology'),
(4, 'Welch', 'Annie Brekke', 'nrolfson@example.net', '2023-05-15 03:45:02', '$2y$10$Bd6sdx8si11.0c3Dc5NjK.VWdUdDdAs35x6MJ/cLMFqU5oOxdTe.m', '4qhO7kM8st', '2023-05-15 03:45:02', '2023-05-15 03:45:02', 'admin', '(512) 209-2079', 'Photographic Restorer', '2023-01-02', 1, 40.00, 322, 'GCASH', '2023-06-03', 'Grover Vandervort III', '4716525136857904', NULL, 'Business Development'),
(5, 'Kohler', 'Evert Rodriguez', 'rebeca.lang@example.org', '2023-05-15 03:45:02', '$2y$10$catjtbq/WQf5iCsK6LW9Zu9o0XDWBcpqpth.ix5fx2/oqz8yIgdqm', '330SMQHwmd', '2023-05-15 03:45:02', '2023-05-15 03:45:02', 'intern', '973.656.8317', 'Bartender', '2023-01-02', 1, 60.00, 460, 'GCASH', '2023-06-03', 'Mr. Alphonso Beatty II', '4259936667208412', NULL, 'Technology'),
(6, 'Cormier', 'Emmanuel Kovacek', 'jacobson.vanessa@example.net', '2023-05-15 03:45:02', '$2y$10$WmXEHgXVRyB/erQGaUZqgeLi2zATgZwyXExCYXMLKDEJvRC4uZvJa', 'a2DcPOPOxU', '2023-05-15 03:45:02', '2023-05-15 03:45:02', 'intern', '+18382458725', 'Hand Trimmer', '2023-01-02', 1, 48.00, 121, 'BDO', '2023-06-03', 'Jaycee Stehr Jr.', '374572016232916', NULL, 'Business Development'),
(7, 'McKenzie', 'Dr. Berta Kassulke V', 'kristy.bernhard@example.org', '2023-05-15 03:45:02', '$2y$10$TovnizpeBhWdUWsYGAMhc.C7GBupVUsRdS97vujP21bPlRp9inJmC', 'KhrqHXHMAw', '2023-05-15 03:45:02', '2023-05-15 03:45:02', 'intern', '1-480-206-8814', 'Accountant', '2023-01-02', 1, 40.00, 424, 'BDO', '2023-06-03', 'Mrs. Rosalia Ritchie', '4539413813374953', NULL, 'People'),
(8, 'Leuschke', 'Art Rice', 'lenny90@example.net', '2023-05-15 03:45:02', '$2y$10$OpVGGR6P91v2ab9QY.E7mOAXyRqk0byZFMxtjNgHJauBD1qtRVw0q', '5l3pmXz9vt', '2023-05-15 03:45:02', '2023-05-15 03:45:02', 'intern', '769.924.9235', 'Transportation Equipment Maintenance', '2023-01-02', 1, 29.00, 428, 'DBP', '2023-06-03', 'Roberto Leuschke', '4916859338577533', NULL, 'Technology'),
(9, 'trysample', 'try', 'try@gmail.com', NULL, '$2y$10$m70YInr.sUrHGUJXWHXMaelCefYYvHdNG/XaGYfdIepf8BocYkO8q', NULL, '2023-05-16 00:42:25', '2023-05-16 00:42:25', 'admin', '1234565', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Technology');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timesheets`
--
ALTER TABLE `timesheets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
