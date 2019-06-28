-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2019 at 05:15 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `remed`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT 0,
  `activation_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `extradata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `remember_token`, `first_name`, `last_name`, `created_at`, `updated_at`, `extradata`) VALUES
(1, 'admin@mail.com', '$2y$10$PfFnhm5Sf1hljYfz3MyN1.DdnVZ03IUmnYF49yOHLtokK23gpm6He', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'Jin', 'Ri Dong', '2019-06-16 23:33:31', '2019-06-17 11:31:10', '{\"picture\":\"\\/uploads\\/panel_avatars\\/jin_ri-dong_1560799829.PNG\"}');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`role_id`, `admin_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `doctor_id` bigint(20) NOT NULL,
  `date_from` datetime NOT NULL,
  `date_to` datetime NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `user_id`, `doctor_id`, `date_from`, `date_to`, `note`, `created_at`, `updated_at`) VALUES
(4, 2, 1, '2019-06-14 05:00:00', '2019-06-14 06:00:00', 'asdfasdf', '2019-06-17 16:00:00', '2019-06-18 16:00:00'),
(5, 2, 1, '2019-06-27 05:34:00', '2019-06-27 05:45:00', 'gggggg', '2019-06-27 01:35:04', '2019-06-27 01:35:04'),
(6, 2, 2, '2019-06-12 05:37:00', '2019-06-13 05:37:00', 'ghj fg fhjfgh', '2019-06-27 01:37:40', '2019-06-27 01:37:40'),
(7, 2, 2, '2019-06-19 06:12:00', '2019-06-19 07:18:00', 'asdfasdfasdfasdf', '2019-06-27 02:16:11', '2019-06-27 02:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `spec_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `spec_id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 3, 'Dr.jone', 'jone@mail.com', '1861423223', 'new street.', '2019-06-17 05:54:28', '2019-06-17 05:54:28'),
(2, 3, 'johnson', 'json@mail.com', '123234232', 'old street', '2019-06-17 05:55:11', '2019-06-17 05:55:11'),
(3, 5, 'Dr.tomson', 'tom@mail.com', '23423234', 'city center', '2019-06-17 07:04:34', '2019-06-17 07:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(10) UNSIGNED NOT NULL,
  `display` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `main` tinyint(1) DEFAULT NULL,
  `show_menu` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `display`, `url`, `created_at`, `updated_at`, `main`, `show_menu`) VALUES
(1, 'Links', 'Link', '2019-06-16 23:33:32', '2019-06-16 23:33:37', 1, 1),
(2, 'Roles', 'Role', NULL, NULL, 1, 1),
(3, 'Permissions', 'Permission', NULL, NULL, 1, 1),
(4, 'Admins', 'Admin', NULL, '2019-06-16 23:33:37', 1, 1),
(9, 'Doctors', 'Doctor', '2019-06-17 02:39:51', '2019-06-17 02:39:51', NULL, 1),
(10, 'Services', 'Service', '2019-06-17 03:01:43', '2019-06-17 03:01:43', NULL, 1),
(11, 'Specializations', 'Specialization', '2019-06-17 03:02:02', '2019-06-17 03:02:02', NULL, 1),
(12, 'Appointments', 'Appointment', '2019-06-17 05:06:56', '2019-06-17 05:06:56', NULL, 1),
(14, 'Tests', 'Test', '2019-06-25 02:33:14', '2019-06-25 02:33:14', NULL, 1);

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
(3, '2014_11_16_205658_create_admins_table', 2),
(4, '2014_12_02_152920_create_password_reminders_table', 2),
(5, '2015_02_20_130902_create_url_table', 2),
(6, '2015_03_15_123956_edit_url_table', 2),
(7, '2016_02_10_181651_create_roles_tables', 2),
(8, '2016_09_20_123956_edit_url_menu_table', 2),
(9, '2016_09_20_143956_edit_roles_table', 2),
(10, '2019_06_04_092344_edit_admin_table', 2),
(11, '2019_06_17_094809_create_doctors_table', 3),
(12, '2019_06_17_100039_create_specialization_table', 3),
(13, '2019_06_17_100117_create_service_table', 3),
(14, '2019_06_17_101335_create_doctor_table', 4),
(15, '2019_06_17_130401_create_appointment_table', 5),
(16, '2019_06_25_103120_create_test_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reminders`
--

CREATE TABLE `password_reminders` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('hellowjone@mail.com', '$2y$10$GVX3ZF0xVx/NbPz3JxwtJ.cmPozY7nWp9Lj9unNLG39IX55bwQGq6', '2019-06-16 22:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'super', 'This goup has all permissions', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `doctor_id`, `name`, `price`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'service1', '500USD', '', '2019-06-17 07:33:48', '2019-06-17 07:33:48'),
(2, 2, 'service1.2', '1000USD', '', '2019-06-17 07:34:21', '2019-06-17 07:36:28'),
(3, 2, 'service2', '1000USD', '', '2019-06-17 07:34:24', '2019-06-17 07:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'surgery', '2019-06-17 05:09:55', '2019-06-17 05:09:55'),
(4, 'medicine', '2019-06-17 05:12:49', '2019-06-17 05:12:49'),
(5, 'Neurology', '2019-06-17 05:13:47', '2019-06-17 05:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@mail.com', NULL, '$2y$10$Knnd7gRZVCVfjqHWShJiSuG8n2ufrhjVDcb3QOyGzYY1xDiWhxTCe', NULL, '2019-06-16 16:02:33', '2019-06-16 16:02:33'),
(2, 'jone', 'hellowjone@mail.com', NULL, '$2y$10$QcVIOVODNvDaURnbgmVKFeP21xLLy7pz4II6pmN5SU6DYz5xe.bK6', NULL, '2019-06-16 22:53:36', '2019-06-16 22:53:36'),
(3, 'Destiney Spencer', 'audreanne.stracke@example.com', '2019-06-17 08:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'iumg48F0Zm', '2019-06-17 08:20:02', '2019-06-17 08:20:02'),
(4, 'Miss Tina Jerde', 'wtreutel@example.net', '2019-06-17 08:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rPegvDmqcb', '2019-06-17 08:20:02', '2019-06-17 08:20:02'),
(5, 'Elian McCullough', 'thiel.trey@example.org', '2019-06-17 08:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ktnd42pyK0', '2019-06-17 08:20:02', '2019-06-17 08:20:02'),
(6, 'Charlotte Shanahan', 'maryam57@example.net', '2019-06-17 08:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9mqNmaySiW', '2019-06-17 08:20:02', '2019-06-17 08:20:02'),
(7, 'Lila Upton', 'madyson44@example.com', '2019-06-17 08:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VrqFg80T8z', '2019-06-17 08:20:02', '2019-06-17 08:20:02'),
(8, 'Dr. Eldridge Cartwright', 'christina69@example.net', '2019-06-17 08:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zHkfmxVl6m', '2019-06-17 08:20:02', '2019-06-17 08:20:02'),
(9, 'Mr. Eusebio Lesch', 'barry.shanahan@example.org', '2019-06-17 08:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MZyPwLOo8e', '2019-06-17 08:20:02', '2019-06-17 08:20:02'),
(10, 'Freda Hoppe PhD', 'fcorwin@example.net', '2019-06-17 08:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Jw5RzgOtmg', '2019-06-17 08:20:02', '2019-06-17 08:20:02'),
(11, 'Ms. Alize Purdy DDS', 'acasper@example.com', '2019-06-17 08:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'w3wNPhV25K', '2019-06-17 08:20:02', '2019-06-17 08:20:02'),
(12, 'Dr. Jayson Johnson V', 'kenny84@example.org', '2019-06-17 08:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ok8NtvLXbF', '2019-06-17 08:20:02', '2019-06-17 08:20:02'),
(13, 'Ms. Janiya Hoeger II', 'wschuster@example.net', '2019-06-17 08:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '64rgz7riTi', '2019-06-17 08:20:02', '2019-06-17 08:20:02'),
(14, 'Nelle Rohan', 'monahan.norene@example.org', '2019-06-17 08:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'U5r3MeQT57', '2019-06-17 08:20:02', '2019-06-17 08:20:02'),
(15, 'Victor Nicolas', 'hegmann.lamar@example.org', '2019-06-17 08:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6cfDhXPgiF', '2019-06-17 08:20:02', '2019-06-17 08:20:02'),
(16, 'Arnoldo Beahan', 'bria.farrell@example.org', '2019-06-17 08:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cBYvuuzjOp', '2019-06-17 08:20:02', '2019-06-17 08:20:02'),
(17, 'Timothy Stoltenberg', 'obruen@example.net', '2019-06-17 08:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1yqT1EvuMj', '2019-06-17 08:20:02', '2019-06-17 08:20:02'),
(18, 'Selina Klocko', 'lenore55@example.net', '2019-06-17 08:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nPs4Cqg407', '2019-06-17 08:20:02', '2019-06-17 08:20:02'),
(19, 'Jonathon O\'Kon', 'mertz.watson@example.net', '2019-06-17 08:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rvQNxWf3ot', '2019-06-17 08:20:02', '2019-06-17 08:20:02'),
(20, 'Prof. Pierce Raynor V', 'fraynor@example.org', '2019-06-17 08:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ns1DTDToGf', '2019-06-17 08:20:02', '2019-06-17 08:20:02'),
(21, 'Kaylin Casper', 'janis69@example.com', '2019-06-17 08:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'IDF3TOg9iv', '2019-06-17 08:20:02', '2019-06-17 08:20:02'),
(22, 'Wilford Satterfield', 'rose32@example.com', '2019-06-17 08:20:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gKJK5QKERB', '2019-06-17 08:20:03', '2019-06-17 08:20:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_activation_code_index` (`activation_code`),
  ADD KEY `admins_reset_password_code_index` (`reset_password_code`);

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`role_id`,`admin_id`),
  ADD KEY `admin_role_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctor_email_unique` (`email`),
  ADD UNIQUE KEY `doctor_phone_unique` (`phone`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reminders`
--
ALTER TABLE `password_reminders`
  ADD KEY `password_reminders_email_index` (`email`),
  ADD KEY `password_reminders_token_index` (`token`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD CONSTRAINT `admin_role_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admin_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
