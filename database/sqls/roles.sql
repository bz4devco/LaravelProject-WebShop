-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2024 at 05:55 PM
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `title`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'سوپر ادمین', 'مدیر کل پنل ادمین و دسترسی به تمامی قسمت های پنل ادمین', 1, NULL, '2024-01-17 15:09:32', '2024-01-19 16:23:32'),
(2, 'admin', 'ادمین سطح دو', 'دسترسی به عنوان معاون و مدیر سطح دوم پنل ادمین و دسترسی به تمام قسمت های پنل به غیر (از مدیریت ادمین ها)', 1, NULL, '2024-01-17 15:13:17', '2024-01-19 16:25:48'),
(3, 'content-author', 'نویسنده بخش محتوی', 'نویسنده بخش محتوای سایت و دسترسی به بخش های (پیج ساز، بنر ها، دسته بندی محتوی، پست ها و سولات متداول) پنل ادمین', 1, NULL, '2024-01-17 15:17:18', '2024-01-19 16:28:20'),
(4, 'content-manager', 'مدیر محتوی', 'مدیر محتوای سایت با دسترسی به بخش کل محتوی پنل ادمین', 1, NULL, '2024-01-17 15:19:04', '2024-01-19 16:29:41'),
(5, 'products-manager', 'مدیر محصولات', 'مدیر بخش محصولات وبسایت با دسترسی به بخش های (دسته بندی محصولات، فرم کالا، برندها، کالاها، انبار و نظرات محصول)', 1, NULL, '2024-01-17 15:22:10', '2024-01-19 16:31:10'),
(6, 'products-author', 'نویسنده محصولات', 'نویسنده محصولات سایت با دسترسی به بخش های (دسته بندی ها، فرم کالا، برندها، کالاها)', 1, NULL, '2024-01-17 15:23:35', '2024-01-19 16:37:36'),
(7, 'orders-manager', 'مدیر مالی', 'مدیر مالی با دسترسی به بخش سفارشات سایت در پنل ادمین', 1, NULL, '2024-01-17 15:24:57', '2024-01-19 16:38:51'),
(8, 'orders-operator', 'اپراتور سفارشات', 'اپراتور سفارشات با دسترسی به بخش های (مدیریت تغییر وضعیت سفارشات و وضعیت ارسال محصول)', 1, NULL, '2024-01-17 15:29:07', '2024-01-19 16:38:57'),
(9, 'store-manager', 'مدیر انبار', 'مدیر انبار با دسترسی به بخش انبار پنل ادمین', 1, NULL, '2024-01-17 15:32:44', '2024-01-19 16:39:36'),
(10, 'store-operator', 'اپراتور انبار', 'اپراتور انبار با دسترسی به گزینه افزایش موجودی در بخش انبار پنل ادمین', 1, NULL, '2024-01-17 15:34:53', '2024-01-19 16:40:46'),
(11, 'comments-oprator', 'مسئول نظرات', 'مسئول نظرات با دسترسی به بخش های پاسخ گویی به نظرات و تایید نظرات بخش محتوی و محصولات', 1, NULL, '2024-01-17 15:39:36', '2024-01-19 16:41:20'),
(12, 'ticket-admin', 'مدیر تیکت ها', 'مدیر بخش تیکت های پنل ادمین', 1, NULL, '2024-01-17 15:41:19', '2024-01-19 16:44:26'),
(13, 'orderpayments-admin', 'مدیر سفارشات و پرداخت ها', 'مدیر سفارشات و پرداخت ها با دسترسی به بخش های مدیریت سفارشات و مدیرت پرداختی ها', 1, NULL, '2024-01-17 15:45:49', '2024-01-19 16:46:17'),
(14, 'notify-admin', 'مدیر اطلاع رسانی ها', 'مدیر بخش اطلاع رسانی ها با دسترسی به بخش های (اطلاعیه ایمیلی و فایل ها، اطلاعیه پیامکی) پنل ادمین', 1, NULL, '2024-01-17 15:47:30', '2024-01-19 16:47:46'),
(15, 'market-admin', 'مدیر بخش فروش', 'مدیر بخش فروش با دسترسی و مدیریت تمامی بخش فروش پنل ادمین و سایت', 1, NULL, '2024-01-17 15:49:33', '2024-01-19 16:47:52'),
(17, 'discount-manager', 'مسئول تخفیفات', 'مسئول تخفیفات با دسترسی به بخش تخفیفات پنل', 1, NULL, '2024-01-19 16:53:01', '2024-01-19 16:53:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
