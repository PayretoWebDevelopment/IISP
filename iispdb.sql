-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 05:50 AM
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
(283, '2014_10_12_000000_create_users_table', 1),
(284, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(285, '2019_08_19_000000_create_failed_jobs_table', 1),
(286, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(287, '2023_05_08_002657_add_username_to_users_table', 1),
(288, '2023_05_08_023959_modify_user_table', 1),
(289, '2023_05_09_063818_create_timesheets_table', 1),
(290, '2023_05_11_083106_add_profile_picture_to_users_table', 1),
(291, '2023_05_12_031917_add_department_to_user', 1),
(292, '2023_05_12_103027_create_approvals_table', 1);

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
  `project_type` enum('Attendance: Break','Attendance: Login','Attendance: Logout','HR General: Ad Hoc','HR General: Email Correspondence','HR General: Meeting','HR General: Monthly Assembly','HR General: Performance Evaluation','HR General: Team Building','HR General: Team Tailgate','HR General: Touchbase','HR General: Training or Webinar','HR General: Weekly Huddle','Data Analytics: Automation','Data Analytics: Data Analysis','Data Analytics: Data Cleansing','Data Analytics: Data Consolidation','Data Analytics: Meeting','Data Analytics: Networking Debugging','Data Analytics: Report Generation','Data Analytics: Workshop','Web Development: Deep Dive Session','Web Development: Meeting','Web Development: Debugging') NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timesheets`
--

INSERT INTO `timesheets` (`id`, `user_id`, `task_name`, `task_type`, `project_type`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 8, 'iindj Development', 'TASK', 'Data Analytics: Networking Debugging', '1970-01-01 08:00:00', '1993-08-27 01:19:06', '2023-05-22 03:43:13', '2023-05-22 03:43:13'),
(2, 5, 'ltxpu Development', 'MEETING', 'HR General: Meeting', '1970-01-01 08:00:00', '1985-05-08 07:26:34', '2023-05-22 03:43:13', '2023-05-22 03:43:13'),
(3, 4, 'tnbel Development', 'LOGIN', 'Data Analytics: Data Cleansing', '1970-01-01 08:00:00', '2000-09-09 18:01:27', '2023-05-22 03:43:13', '2023-05-22 03:43:13'),
(4, 4, 'bomaq Development', 'WEBINAR', 'HR General: Team Tailgate', '1970-01-01 08:00:00', '1973-06-02 12:37:14', '2023-05-22 03:43:13', '2023-05-22 03:43:13'),
(5, 5, 'uprin Development', 'TRAINING', 'Attendance: Login', '1970-01-01 08:00:00', '1998-01-12 19:56:03', '2023-05-22 03:43:13', '2023-05-22 03:43:13'),
(6, 2, 'cydzp Development', 'WEBINAR', 'HR General: Training or Webinar', '1970-01-01 08:00:00', '1977-03-30 03:20:16', '2023-05-22 03:43:13', '2023-05-22 03:43:13'),
(7, 2, 'jzedx Development', 'TASK', 'HR General: Email Correspondence', '1970-01-01 08:00:00', '1992-03-04 03:04:29', '2023-05-22 03:43:13', '2023-05-22 03:43:13'),
(8, 3, 'fmbtw Development', 'LUNCH', 'HR General: Email Correspondence', '1970-01-01 08:00:00', '2015-07-10 23:26:04', '2023-05-22 03:43:13', '2023-05-22 03:43:13'),
(9, 8, 'cubok Development', 'TASK', 'HR General: Weekly Huddle', '1970-01-01 08:00:00', '2002-03-15 23:06:06', '2023-05-22 03:43:13', '2023-05-22 03:43:13'),
(10, 2, 'xmtez Development', 'TRAINING', 'Data Analytics: Workshop', '1970-01-01 08:00:00', '1974-04-16 19:00:30', '2023-05-22 03:43:13', '2023-05-22 03:43:13');

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
  `hourly_rate` double(8,2) DEFAULT NULL,
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
(1, 'testsuperadmin', 'Test Superadmin', 'test@example.com', '2023-05-22 03:43:12', '$2y$10$1YT.PZXxSnu.2Pq9MM2OIuY78uYpiI9CItMGv4bXGc9lllGn1.3YW', 'NuE8aeHHtU', '2023-05-22 03:43:12', '2023-05-22 03:43:12', 'superadmin', '123456', 'CEO', '2023-01-02', 1, 54.01, 500, 'GCASH', '2023-06-03', 'Juan de la Cruz', '1244356', NULL, 'Business Development'),
(2, 'testadmin', 'Test Admin', 'test1@example.com', '2023-05-22 03:43:12', '$2y$10$vYkwHXyx.96SelUJo36saeyqZeP4wP7RSRot/tQz92xWVHhjSievm', 'zR1ajFLYev', '2023-05-22 03:43:12', '2023-05-22 03:43:12', 'admin', '123456', 'CEO', '2023-01-02', 1, 54.00, 500, 'GCASH', '2023-06-03', 'Juan de la Cruz', '1244356', NULL, 'Technology'),
(3, 'testintern', 'Test Intern', 'test2@example.com', '2023-05-22 03:43:13', '$2y$10$GqVrhB7vjAbtWQQEWfQg/OK/fkaDhCxvT0za92z3aYr7QjLmpgQuO', 'fEOwW4AyRe', '2023-05-22 03:43:13', '2023-05-22 03:43:13', 'intern', '123456', 'CEO', '2023-01-02', 1, 54.34, 500, 'GCASH', '2023-06-03', 'Juan de la Cruz', '1244356', NULL, 'Technology'),
(4, 'Paucek', 'Mrs. Ocie Sauer DVM', 'rdicki@example.com', '2023-05-22 03:43:13', '$2y$10$DqvDT8w.WHg.g0RYJGkX4.TT.iA38uujdlJjp70dduywxZWGnLL62', 'NpbWp28h3t', '2023-05-22 03:43:13', '2023-05-22 03:43:13', 'superadmin', '1-409-496-5562', 'Actuary', '2023-01-02', 1, 58.00, 402, 'DBP', '2023-06-03', 'Malachi Sawayn', '5421735529465701', NULL, 'Business Development'),
(5, 'Smith', 'Dino Schuster', 'delphine31@example.com', '2023-05-22 03:43:13', '$2y$10$BhI6rm7seulwM2Ds1xRerO9/jae8Z.ugHcGz3pz7wL1ttIqPaeY/.', 'Q8yppBNRUV', '2023-05-22 03:43:13', '2023-05-22 03:43:13', 'superadmin', '1-404-686-6132', 'Claims Adjuster', '2023-01-02', 1, 54.00, 155, 'DBP', '2023-06-03', 'Rosetta Hayes', '2598072350159003', NULL, 'People'),
(6, 'Wyman', 'Rachelle Russel', 'mschamberger@example.com', '2023-05-22 03:43:13', '$2y$10$OIEihuvCGRj.AzJgIevfqehsBXyEUYVcslWwJHRyBR5WKVnjOxCq.', '1gAdzv09vD', '2023-05-22 03:43:13', '2023-05-22 03:43:13', 'intern', '+1 (561) 768-5679', 'Avionics Technician', '2023-01-02', 1, 34.00, 447, 'DBP', '2023-06-03', 'Moriah Bradtke', '4916617123442127', NULL, 'Technology'),
(7, 'Swift', 'Griffin Windler', 'shawn96@example.net', '2023-05-22 03:43:13', '$2y$10$LsKZBV7ScHGqsG6sJNpBGOwSrsrOFY3ZIwZW3ipMMpSV1aALrUjtu', 'dece1Pw5my', '2023-05-22 03:43:13', '2023-05-22 03:43:13', 'admin', '+1-757-625-6749', 'Home Appliance Installer', '2023-01-02', 1, 43.00, 125, 'DBP', '2023-06-03', 'Shayne Roberts', '3589524793592215', NULL, 'People'),
(8, 'Frami', 'Winston Bartoletti PhD', 'mertz.santino@example.com', '2023-05-22 03:43:13', '$2y$10$4Pavk6affmksWBzdjFvycugbtQot7LI8tFYKD9.IY3uJ/bGNbbdnO', 'FWKGNYw5wu', '2023-05-22 03:43:13', '2023-05-22 03:43:13', 'admin', '(769) 398-3466', 'Reservation Agent OR Transportation Ticket Agent', '2023-01-02', 1, 42.00, 100, 'BDO', '2023-06-03', 'Prof. Lincoln Kris DVM', '2376832069580171', NULL, 'People');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

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
