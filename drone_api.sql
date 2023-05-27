-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 01:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drone_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `drones`
--

CREATE TABLE `drones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `battery_life` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` double(8,2) NOT NULL,
  `payload` double(8,2) NOT NULL,
  `max_speed` double(8,2) NOT NULL,
  `max_altitude` double(8,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drones`
--

INSERT INTO `drones` (`id`, `name`, `type`, `battery_life`, `weight`, `payload`, `max_speed`, `max_altitude`, `user_id`, `plan_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'D23', 'Spray', '24', 100.00, 25.00, 7.00, 20.00, 2, 1, NULL, NULL, NULL),
(2, 'A34', 'spray', '21', 150.00, 35.00, 6.00, 15.00, 1, 3, NULL, NULL, NULL),
(3, 'B055', 'seeding', '18', 80.00, 10.00, 9.00, 50.00, 4, 5, NULL, NULL, NULL),
(4, 'G022', 'Map', '32', 50.00, 10.00, 12.00, 100.00, 2, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `farms`
--

CREATE TABLE `farms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farms`
--

INSERT INTO `farms` (`id`, `name`, `address`, `size`, `user_id`, `province_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'KPCfarm', 'phum thmey chamkaler KPC   ', '12', 2, 1, NULL, NULL, NULL),
(2, 'Khmer Farm', ' beng veng RTK ', '40', 1, 2, NULL, NULL, NULL),
(3, 'Khmer Natural farm', 'nokorban kampongseim KPC', '25', 3, 1, NULL, NULL, NULL),
(4, 'Khmer durian ', 'baray preychor KPC', '16', 1, 1, NULL, NULL, NULL),
(5, 'Lyma natural farm', 'Or kras samkey ST', '43', 2, 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

CREATE TABLE `instructions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drone_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructions`
--

INSERT INTO `instructions` (`id`, `status`, `drone_id`, `plan_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'stop', 2, 5, NULL, NULL, NULL),
(2, 'stop', 3, 2, NULL, NULL, NULL),
(3, 'stop', 1, 2, NULL, NULL, NULL),
(4, 'stop', 3, 3, NULL, NULL, NULL),
(5, 'stop', 3, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `latitude` double(8,2) NOT NULL,
  `longitude` double(8,2) NOT NULL,
  `farm_id` bigint(20) UNSIGNED NOT NULL,
  `drone_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `latitude`, `longitude`, `farm_id`, `drone_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 12.00, 34.00, 4, 3, NULL, NULL, NULL),
(2, 7.00, 56.00, 2, 4, NULL, NULL, NULL),
(3, 12.00, 24.00, 1, 1, NULL, NULL, NULL),
(4, 20.00, 77.00, 5, 1, NULL, NULL, NULL),
(5, 11.00, 22.00, 2, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE `maps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `drone_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `farm_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maps`
--

INSERT INTO `maps` (`id`, `drone_id`, `image`, `farm_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 2, 'hndsf934.png', 1, NULL, NULL, NULL),
(4, 3, 'uhfnmopedcpsxjrv994.png', 1, NULL, NULL, NULL),
(5, 4, 'yriu903urh.png', 3, NULL, NULL, NULL),
(6, 1, 'i94ifnjkd.png', 2, NULL, NULL, NULL);

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
(1, '2014_10-11-000000_role', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_000000_users', 1),
(4, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_05_23_000708_create_provinces_table', 1),
(8, '2023_05_23_013213_farm', 1),
(9, '2023_05_23_013717_plans', 1),
(10, '2023_05_23_014012_drones', 1),
(11, '2023_05_23_014126_instructions', 1),
(12, '2023_05_23_014835_maps', 1),
(13, '2023_05_23_014945_locations', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 6, 'ADMIN-TOKEN', '39a7aaa5c95b25370987dda40654f94a742059fb17cd181d8d4a8cd88a5bfa4e', '[\"select\",\"create\",\"update\",\"delete\"]', NULL, NULL, '2023-05-27 04:35:36', '2023-05-27 04:35:36'),
(2, 'App\\Models\\User', 7, 'ADMIN-TOKEN', '8c074389abd0eff7ba9f630c500f62968f0d943750e94bf676d0614a6ab63ed3', '[\"select\",\"create\",\"update\",\"delete\"]', NULL, NULL, '2023-05-27 04:36:06', '2023-05-27 04:36:06'),
(3, 'App\\Models\\User', 7, 'ADMIN-TOKEN', '89ea4d3f4a591eaae5248ebd1edc378cd4bc97c4990841ea5e6460491f1d1173', '[\"select\",\"create\",\"update\",\"delete\"]', NULL, NULL, '2023-05-27 04:36:35', '2023-05-27 04:36:35'),
(4, 'App\\Models\\User', 7, 'ADMIN-TOKEN', '4176b9ba0821ed90703118c951d26aed4b6c8af27bbc726736696ffba5cf17cf', '[\"select\",\"create\",\"update\",\"delete\"]', NULL, NULL, '2023-05-27 04:36:55', '2023-05-27 04:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `altitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `date_time`, `area`, `altitude`, `user_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'order66', '2023-06-13 18:17:07', 'Prey ler (11.9924000,105.4645030   11.9924006,105.4645057 11.9924102,105.4645254)', '2m', 1, NULL, NULL, NULL),
(2, 'order22', '2023-05-27 13:17:07', 'Prey ler (11.9924000,105.4645030   11.9924006,105.4645057 11.9924102,105.4645254)', '2m', 3, NULL, NULL, NULL),
(3, 'order11', '2023-05-17 07:20:14', 'Prey ler (11.9924000,105.4645030   11.9924006,105.4645057 11.9924102,105.4645254)', '2m', 1, NULL, NULL, NULL),
(4, 'order24', '2023-05-27 13:20:14', 'Prey ler (11.9924000,105.4645030   11.9924006,105.4645057 11.9924102,105.4645254)', '10m', 5, NULL, NULL, NULL),
(5, 'order002', '2023-07-12 08:30:00', 'Prey ler (11.9924000,105.4645030   11.9924006,105.4645057 11.9924102,105.4645254)', '2m', 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'KampongCham', NULL, NULL),
(2, 'Ratanakiri', NULL, NULL),
(3, 'Phnom Penh', NULL, NULL),
(4, 'Takeo', NULL, NULL),
(5, 'StengTreng', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Marany', 'marany@gmailcome', 1, NULL, '123456789', NULL, NULL, NULL),
(2, 'Lyma', 'lyma@gmial.com', 2, NULL, '123456789', NULL, NULL, NULL),
(3, 'Yada', 'yada@gmail.com', 1, NULL, '123456789', NULL, NULL, NULL),
(4, 'Liya', 'liya@gmail.com', 2, NULL, '123456789', NULL, NULL, NULL),
(5, 'Mona', 'mona@gmail.com', 2, NULL, '123456789', NULL, NULL, NULL),
(6, 'Mori', 'mori@gmail.com', 1, NULL, '$2y$10$AdJJ6.mspJCRwTiOpYaY3OTArNS17KtE2W3QMcehhPaqk3TGEOrXu', NULL, '2023-05-27 04:35:36', '2023-05-27 04:35:36'),
(7, 'riya', 'riya@gmail.com', 1, NULL, '$2y$10$cbgLxFkvzFy./wVmS5OnVei3oAU5XG/b8zt5f3dZsVN30kBpJhkUG', NULL, '2023-05-27 04:36:06', '2023-05-27 04:36:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drones`
--
ALTER TABLE `drones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drones_user_id_foreign` (`user_id`),
  ADD KEY `drones_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `farms`
--
ALTER TABLE `farms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farms_user_id_foreign` (`user_id`),
  ADD KEY `farms_province_id_foreign` (`province_id`);

--
-- Indexes for table `instructions`
--
ALTER TABLE `instructions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructions_drone_id_foreign` (`drone_id`),
  ADD KEY `instructions_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_farm_id_foreign` (`farm_id`),
  ADD KEY `locations_drone_id_foreign` (`drone_id`);

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maps_drone_id_foreign` (`drone_id`),
  ADD KEY `maps_farm_id_foreign` (`farm_id`);

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
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plans_user_id_foreign` (`user_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `drones`
--
ALTER TABLE `drones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farms`
--
ALTER TABLE `farms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instructions`
--
ALTER TABLE `instructions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `maps`
--
ALTER TABLE `maps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drones`
--
ALTER TABLE `drones`
  ADD CONSTRAINT `drones_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `drones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `farms`
--
ALTER TABLE `farms`
  ADD CONSTRAINT `farms_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `farms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `instructions`
--
ALTER TABLE `instructions`
  ADD CONSTRAINT `instructions_drone_id_foreign` FOREIGN KEY (`drone_id`) REFERENCES `drones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `instructions_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_drone_id_foreign` FOREIGN KEY (`drone_id`) REFERENCES `drones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `locations_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `maps`
--
ALTER TABLE `maps`
  ADD CONSTRAINT `maps_drone_id_foreign` FOREIGN KEY (`drone_id`) REFERENCES `drones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `maps_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `plans`
--
ALTER TABLE `plans`
  ADD CONSTRAINT `plans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
