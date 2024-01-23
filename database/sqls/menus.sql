-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 01:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `position` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `sort` int(11) NOT NULL DEFAULT 1,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `url`, `position`, `status`, `sort`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 'سوپرمارکت', 'http://127.0.0.1:8000/super-market', 0, 1, 1, NULL, '2024-01-21 11:04:58', '2024-01-21 11:04:58', NULL),
(18, 'تخفیف ها و پیشنهادها', 'http://127.0.0.1:8000/products?sort=47', 0, 1, 2, NULL, '2024-01-21 11:18:49', '2024-01-21 11:23:29', NULL),
(19, 'درباره ما', 'http://127.0.0.1:8000/page/about-us', 0, 1, 3, NULL, '2024-01-21 11:27:09', '2024-01-21 11:27:09', NULL),
(20, 'فروشنده شوید', 'http://127.0.0.1:8000/page/seller-introduction/', 0, 1, 4, NULL, '2024-01-21 11:28:23', '2024-01-21 11:28:23', NULL),
(21, 'شرایط و قوانین', 'http://127.0.0.1:8000/page/rules', 1, 1, 1, NULL, '2024-01-21 11:48:40', '2024-01-21 11:48:40', NULL),
(22, 'درباره ما', 'http://127.0.0.1:8000/page/about-us', 1, 1, 2, NULL, '2024-01-21 11:49:05', '2024-01-21 11:49:05', NULL),
(23, 'تماس با ما', 'http://127.0.0.1:8000/contact-us', 1, 1, 3, NULL, '2024-01-21 11:49:35', '2024-01-21 11:49:35', NULL),
(24, 'فروشنده شوید', 'http://127.0.0.1:8000/page/seller-introduction/', 1, 1, 4, NULL, '2024-01-21 11:50:37', '2024-01-21 11:50:37', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_id_foreign` (`parent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
