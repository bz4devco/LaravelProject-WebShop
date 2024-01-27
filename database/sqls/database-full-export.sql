-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2024 at 11:07 AM
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
-- Database: `laravel-shop-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `no` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `recipient_first_name` varchar(255) DEFAULT NULL,
  `recipient_last_name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `amazing_sales`
--

CREATE TABLE `amazing_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `percentage` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `url` text NOT NULL,
  `position` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'developer explain 0 or 01 ... in Admin\\Content\\Banner model',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `sort` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `persian_name` varchar(255) DEFAULT NULL,
  `orginal_name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `logo` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `tags` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `persian_name`, `orginal_name`, `slug`, `logo`, `status`, `tags`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'شیائومی', 'Xiaomi', 'Xiaomi', 'images\\brand\\2024\\01\\26\\1706295152.jpg', 1, 'شیائومی,Xiaomi', '2024-01-26 18:38:30', '2024-01-26 18:52:32', NULL),
(2, 'اپل', 'apple', 'apple', 'images\\brand\\2024\\01\\26\\1706295169.jpg', 1, 'apple,اپل,آیفون', '2024-01-26 18:44:37', '2024-01-26 18:52:49', NULL),
(3, 'سامسونگ', 'sumsong', 'sumsong', 'images\\brand\\2024\\01\\26\\1706295187.svg', 1, 'sumsong,سامسونگ', '2024-01-26 18:45:27', '2024-01-26 18:53:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `guarantee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `number` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_item_selected_attributes`
--

CREATE TABLE `cart_item_selected_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_item_id` bigint(20) UNSIGNED NOT NULL,
  `category_attribute_id` bigint(20) UNSIGNED NOT NULL,
  `category_value_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cash_payments`
--

CREATE TABLE `cash_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(20,3) NOT NULL COMMENT 'IR price unit',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cash_receiver` varchar(255) DEFAULT NULL,
  `pay_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_attributes`
--

CREATE TABLE `category_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `unit` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_attribute_default_values`
--

CREATE TABLE `category_attribute_default_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `category_attribute_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_values`
--

CREATE TABLE `category_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` text NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'value type is 0 => simple, 1 => multi values select by customers (affected on price',
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_attribute_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `province_id`, `name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'اسکو', 'اسکو', 1, NULL, NULL, NULL),
(2, 1, 'اهر', 'اهر', 1, NULL, NULL, NULL),
(3, 1, 'ایلخچی', 'ایلخچی', 1, NULL, NULL, NULL),
(4, 1, 'آبش احمد', 'آبش-احمد', 1, NULL, NULL, NULL),
(5, 1, 'آذرشهر', 'آذرشهر', 1, NULL, NULL, NULL),
(6, 1, 'آقکند', 'آقکند', 1, NULL, NULL, NULL),
(7, 1, 'باسمنج', 'باسمنج', 1, NULL, NULL, NULL),
(8, 1, 'بخشایش', 'بخشایش', 1, NULL, NULL, NULL),
(9, 1, 'بستان آباد', 'بستان-آباد', 1, NULL, NULL, NULL),
(10, 1, 'بناب', 'بناب', 1, NULL, NULL, NULL),
(11, 1, 'بناب جدید', 'بناب-جدید', 1, NULL, NULL, NULL),
(12, 1, 'تبریز', 'تبریز', 1, NULL, NULL, NULL),
(13, 1, 'ترک', 'ترک', 1, NULL, NULL, NULL),
(14, 1, 'ترکمانچای', 'ترکمانچای', 1, NULL, NULL, NULL),
(15, 1, 'تسوج', 'تسوج', 1, NULL, NULL, NULL),
(16, 1, 'تیکمه داش', 'تیکمه-داش', 1, NULL, NULL, NULL),
(17, 1, 'جلفا', 'جلفا', 1, NULL, NULL, NULL),
(18, 1, 'خاروانا', 'خاروانا', 1, NULL, NULL, NULL),
(19, 1, 'خامنه', 'خامنه', 1, NULL, NULL, NULL),
(20, 1, 'خراجو', 'خراجو', 1, NULL, NULL, NULL),
(21, 1, 'خسروشهر', 'خسروشهر', 1, NULL, NULL, NULL),
(22, 1, 'خضرلو', 'خضرلو', 1, NULL, NULL, NULL),
(23, 1, 'خمارلو', 'خمارلو', 1, NULL, NULL, NULL),
(24, 1, 'خواجه', 'خواجه', 1, NULL, NULL, NULL),
(25, 1, 'دوزدوزان', 'دوزدوزان', 1, NULL, NULL, NULL),
(26, 1, 'زرنق', 'زرنق', 1, NULL, NULL, NULL),
(27, 1, 'زنوز', 'زنوز', 1, NULL, NULL, NULL),
(28, 1, 'سراب', 'سراب', 1, NULL, NULL, NULL),
(29, 1, 'سردرود', 'سردرود', 1, NULL, NULL, NULL),
(30, 1, 'سهند', 'سهند', 1, NULL, NULL, NULL),
(31, 1, 'سیس', 'سیس', 1, NULL, NULL, NULL),
(32, 1, 'سیه رود', 'سیه-رود', 1, NULL, NULL, NULL),
(33, 1, 'شبستر', 'شبستر', 1, NULL, NULL, NULL),
(34, 1, 'شربیان', 'شربیان', 1, NULL, NULL, NULL),
(35, 1, 'شرفخانه', 'شرفخانه', 1, NULL, NULL, NULL),
(36, 1, 'شندآباد', 'شندآباد', 1, NULL, NULL, NULL),
(37, 1, 'صوفیان', 'صوفیان', 1, NULL, NULL, NULL),
(38, 1, 'عجب شیر', 'عجب-شیر', 1, NULL, NULL, NULL),
(39, 1, 'قره آغاج', 'قره-آغاج', 1, NULL, NULL, NULL),
(40, 1, 'کشکسرای', 'کشکسرای', 1, NULL, NULL, NULL),
(41, 1, 'کلوانق', 'کلوانق', 1, NULL, NULL, NULL),
(42, 1, 'کلیبر', 'کلیبر', 1, NULL, NULL, NULL),
(43, 1, 'کوزه کنان', 'کوزه-کنان', 1, NULL, NULL, NULL),
(44, 1, 'گوگان', 'گوگان', 1, NULL, NULL, NULL),
(45, 1, 'لیلان', 'لیلان', 1, NULL, NULL, NULL),
(46, 1, 'مراغه', 'مراغه', 1, NULL, NULL, NULL),
(47, 1, 'مرند', 'مرند', 1, NULL, NULL, NULL),
(48, 1, 'ملکان', 'ملکان', 1, NULL, NULL, NULL),
(49, 1, 'ملک کیان', 'ملک-کیان', 1, NULL, NULL, NULL),
(50, 1, 'ممقان', 'ممقان', 1, NULL, NULL, NULL),
(51, 1, 'مهربان', 'مهربان', 1, NULL, NULL, NULL),
(52, 1, 'میانه', 'میانه', 1, NULL, NULL, NULL),
(53, 1, 'نظرکهریزی', 'نظرکهریزی', 1, NULL, NULL, NULL),
(54, 1, 'هادی شهر', 'هادی-شهر', 1, NULL, NULL, NULL),
(55, 1, 'هرگلان', 'هرگلان', 1, NULL, NULL, NULL),
(56, 1, 'هریس', 'هریس', 1, NULL, NULL, NULL),
(57, 1, 'هشترود', 'هشترود', 1, NULL, NULL, NULL),
(58, 1, 'هوراند', 'هوراند', 1, NULL, NULL, NULL),
(59, 1, 'وایقان', 'وایقان', 1, NULL, NULL, NULL),
(60, 1, 'ورزقان', 'ورزقان', 1, NULL, NULL, NULL),
(61, 1, 'یامچی', 'یامچی', 1, NULL, NULL, NULL),
(62, 2, 'ارومیه', 'ارومیه', 1, NULL, NULL, NULL),
(63, 2, 'اشنویه', 'اشنویه', 1, NULL, NULL, NULL),
(64, 2, 'ایواوغلی', 'ایواوغلی', 1, NULL, NULL, NULL),
(65, 2, 'آواجیق', 'آواجیق', 1, NULL, NULL, NULL),
(66, 2, 'باروق', 'باروق', 1, NULL, NULL, NULL),
(67, 2, 'بازرگان', 'بازرگان', 1, NULL, NULL, NULL),
(68, 2, 'بوکان', 'بوکان', 1, NULL, NULL, NULL),
(69, 2, 'پلدشت', 'پلدشت', 1, NULL, NULL, NULL),
(70, 2, 'پیرانشهر', 'پیرانشهر', 1, NULL, NULL, NULL),
(71, 2, 'تازه شهر', 'تازه-شهر', 1, NULL, NULL, NULL),
(72, 2, 'تکاب', 'تکاب', 1, NULL, NULL, NULL),
(73, 2, 'چهاربرج', 'چهاربرج', 1, NULL, NULL, NULL),
(74, 2, 'خوی', 'خوی', 1, NULL, NULL, NULL),
(75, 2, 'دیزج دیز', 'دیزج-دیز', 1, NULL, NULL, NULL),
(76, 2, 'ربط', 'ربط', 1, NULL, NULL, NULL),
(77, 2, 'سردشت', 'آذربایجان-غربی-سردشت', 1, NULL, NULL, NULL),
(78, 2, 'سرو', 'سرو', 1, NULL, NULL, NULL),
(79, 2, 'سلماس', 'سلماس', 1, NULL, NULL, NULL),
(80, 2, 'سیلوانه', 'سیلوانه', 1, NULL, NULL, NULL),
(81, 2, 'سیمینه', 'سیمینه', 1, NULL, NULL, NULL),
(82, 2, 'سیه چشمه', 'سیه-چشمه', 1, NULL, NULL, NULL),
(83, 2, 'شاهین دژ', 'شاهین-دژ', 1, NULL, NULL, NULL),
(84, 2, 'شوط', 'شوط', 1, NULL, NULL, NULL),
(85, 2, 'فیرورق', 'فیرورق', 1, NULL, NULL, NULL),
(86, 2, 'قره ضیاءالدین', 'قره-ضیاءالدین', 1, NULL, NULL, NULL),
(87, 2, 'قطور', 'قطور', 1, NULL, NULL, NULL),
(88, 2, 'قوشچی', 'قوشچی', 1, NULL, NULL, NULL),
(89, 2, 'کشاورز', 'کشاورز', 1, NULL, NULL, NULL),
(90, 2, 'گردکشانه', 'گردکشانه', 1, NULL, NULL, NULL),
(91, 2, 'ماکو', 'ماکو', 1, NULL, NULL, NULL),
(92, 2, 'محمدیار', 'محمدیار', 1, NULL, NULL, NULL),
(93, 2, 'محمودآباد', 'آذربایجان-غربی-محمودآباد', 1, NULL, NULL, NULL),
(94, 2, 'مهاباد', 'آذربایجان-غربی-مهاباد', 1, NULL, NULL, NULL),
(95, 2, 'میاندوآب', 'میاندوآب', 1, NULL, NULL, NULL),
(96, 2, 'میرآباد', 'میرآباد', 1, NULL, NULL, NULL),
(97, 2, 'نالوس', 'نالوس', 1, NULL, NULL, NULL),
(98, 2, 'نقده', 'نقده', 1, NULL, NULL, NULL),
(99, 2, 'نوشین', 'نوشین', 1, NULL, NULL, NULL),
(100, 3, 'اردبیل', 'اردبیل', 1, NULL, NULL, NULL),
(101, 3, 'اصلاندوز', 'اصلاندوز', 1, NULL, NULL, NULL),
(102, 3, 'آبی بیگلو', 'آبی-بیگلو', 1, NULL, NULL, NULL),
(103, 3, 'بیله سوار', 'بیله-سوار', 1, NULL, NULL, NULL),
(104, 3, 'پارس آباد', 'پارس-آباد', 1, NULL, NULL, NULL),
(105, 3, 'تازه کند', 'تازه-کند', 1, NULL, NULL, NULL),
(106, 3, 'تازه کندانگوت', 'تازه-کندانگوت', 1, NULL, NULL, NULL),
(107, 3, 'جعفرآباد', 'جعفرآباد', 1, NULL, NULL, NULL),
(108, 3, 'خلخال', 'خلخال', 1, NULL, NULL, NULL),
(109, 3, 'رضی', 'رضی', 1, NULL, NULL, NULL),
(110, 3, 'سرعین', 'سرعین', 1, NULL, NULL, NULL),
(111, 3, 'عنبران', 'عنبران', 1, NULL, NULL, NULL),
(112, 3, 'فخرآباد', 'فخرآباد', 1, NULL, NULL, NULL),
(113, 3, 'کلور', 'کلور', 1, NULL, NULL, NULL),
(114, 3, 'کوراییم', 'کوراییم', 1, NULL, NULL, NULL),
(115, 3, 'گرمی', 'گرمی', 1, NULL, NULL, NULL),
(116, 3, 'گیوی', 'گیوی', 1, NULL, NULL, NULL),
(117, 3, 'لاهرود', 'لاهرود', 1, NULL, NULL, NULL),
(118, 3, 'مشگین شهر', 'مشگین-شهر', 1, NULL, NULL, NULL),
(119, 3, 'نمین', 'نمین', 1, NULL, NULL, NULL),
(120, 3, 'نیر', 'اردبیل-نیر', 1, NULL, NULL, NULL),
(121, 3, 'هشتجین', 'هشتجین', 1, NULL, NULL, NULL),
(122, 3, 'هیر', 'هیر', 1, NULL, NULL, NULL),
(123, 4, 'ابریشم', 'ابریشم', 1, NULL, NULL, NULL),
(124, 4, 'ابوزیدآباد', 'ابوزیدآباد', 1, NULL, NULL, NULL),
(125, 4, 'اردستان', 'اردستان', 1, NULL, NULL, NULL),
(126, 4, 'اژیه', 'اژیه', 1, NULL, NULL, NULL),
(127, 4, 'اصفهان', 'اصفهان', 1, NULL, NULL, NULL),
(128, 4, 'افوس', 'افوس', 1, NULL, NULL, NULL),
(129, 4, 'انارک', 'انارک', 1, NULL, NULL, NULL),
(130, 4, 'ایمانشهر', 'ایمانشهر', 1, NULL, NULL, NULL),
(131, 4, 'آران وبیدگل', 'آران-وبیدگل', 1, NULL, NULL, NULL),
(132, 4, 'بادرود', 'بادرود', 1, NULL, NULL, NULL),
(133, 4, 'باغ بهادران', 'باغ-بهادران', 1, NULL, NULL, NULL),
(134, 4, 'بافران', 'بافران', 1, NULL, NULL, NULL),
(135, 4, 'برزک', 'برزک', 1, NULL, NULL, NULL),
(136, 4, 'برف انبار', 'برف-انبار', 1, NULL, NULL, NULL),
(137, 4, 'بهاران شهر', 'بهاران-شهر', 1, NULL, NULL, NULL),
(138, 4, 'بهارستان', 'بهارستان', 1, NULL, NULL, NULL),
(139, 4, 'بوئین و میاندشت', 'بوئین-میاندشت', 1, NULL, NULL, NULL),
(140, 4, 'پیربکران', 'پیربکران', 1, NULL, NULL, NULL),
(141, 4, 'تودشک', 'تودشک', 1, NULL, NULL, NULL),
(142, 4, 'تیران', 'تیران', 1, NULL, NULL, NULL),
(143, 4, 'جندق', 'جندق', 1, NULL, NULL, NULL),
(144, 4, 'جوزدان', 'جوزدان', 1, NULL, NULL, NULL),
(145, 4, 'جوشقان و کامو', 'جوشقان-کامو', 1, NULL, NULL, NULL),
(146, 4, 'چادگان', 'چادگان', 1, NULL, NULL, NULL),
(147, 4, 'چرمهین', 'چرمهین', 1, NULL, NULL, NULL),
(148, 4, 'چمگردان', 'چمگردان', 1, NULL, NULL, NULL),
(149, 4, 'حبیب آباد', 'حبیب-آباد', 1, NULL, NULL, NULL),
(150, 4, 'حسن آباد', 'اصفهان-حسن-آباد', 1, NULL, NULL, NULL),
(151, 4, 'حنا', 'حنا', 1, NULL, NULL, NULL),
(152, 4, 'خالدآباد', 'خالدآباد', 1, NULL, NULL, NULL),
(153, 4, 'خمینی شهر', 'خمینی-شهر', 1, NULL, NULL, NULL),
(154, 4, 'خوانسار', 'خوانسار', 1, NULL, NULL, NULL),
(155, 4, 'خور', 'اصفهان-خور', 1, NULL, NULL, NULL),
(157, 4, 'خورزوق', 'خورزوق', 1, NULL, NULL, NULL),
(158, 4, 'داران', 'داران', 1, NULL, NULL, NULL),
(159, 4, 'دامنه', 'دامنه', 1, NULL, NULL, NULL),
(160, 4, 'درچه', 'درچه', 1, NULL, NULL, NULL),
(161, 4, 'دستگرد', 'دستگرد', 1, NULL, NULL, NULL),
(162, 4, 'دهاقان', 'دهاقان', 1, NULL, NULL, NULL),
(163, 4, 'دهق', 'دهق', 1, NULL, NULL, NULL),
(164, 4, 'دولت آباد', 'اصفهان-دولت-آباد', 1, NULL, NULL, NULL),
(165, 4, 'دیزیچه', 'دیزیچه', 1, NULL, NULL, NULL),
(166, 4, 'رزوه', 'رزوه', 1, NULL, NULL, NULL),
(167, 4, 'رضوانشهر', 'اصفهان-رضوانشهر', 1, NULL, NULL, NULL),
(168, 4, 'زاینده رود', 'زاینده-رود', 1, NULL, NULL, NULL),
(169, 4, 'زرین شهر', 'زرین-شهر', 1, NULL, NULL, NULL),
(170, 4, 'زواره', 'زواره', 1, NULL, NULL, NULL),
(171, 4, 'زیباشهر', 'زیباشهر', 1, NULL, NULL, NULL),
(172, 4, 'سده لنجان', 'سده-لنجان', 1, NULL, NULL, NULL),
(173, 4, 'سفیدشهر', 'سفیدشهر', 1, NULL, NULL, NULL),
(174, 4, 'سگزی', 'سگزی', 1, NULL, NULL, NULL),
(175, 4, 'سمیرم', 'سمیرم', 1, NULL, NULL, NULL),
(176, 4, 'شاهین شهر', 'شاهین-شهر', 1, NULL, NULL, NULL),
(177, 4, 'شهرضا', 'شهرضا', 1, NULL, NULL, NULL),
(178, 4, 'طالخونچه', 'طالخونچه', 1, NULL, NULL, NULL),
(179, 4, 'عسگران', 'عسگران', 1, NULL, NULL, NULL),
(180, 4, 'علویجه', 'علویجه', 1, NULL, NULL, NULL),
(181, 4, 'فرخی', 'فرخی', 1, NULL, NULL, NULL),
(182, 4, 'فریدونشهر', 'فریدونشهر', 1, NULL, NULL, NULL),
(183, 4, 'فلاورجان', 'فلاورجان', 1, NULL, NULL, NULL),
(184, 4, 'فولادشهر', 'فولادشهر', 1, NULL, NULL, NULL),
(185, 4, 'قمصر', 'قمصر', 1, NULL, NULL, NULL),
(186, 4, 'قهجاورستان', 'قهجاورستان', 1, NULL, NULL, NULL),
(187, 4, 'قهدریجان', 'قهدریجان', 1, NULL, NULL, NULL),
(188, 4, 'کاشان', 'کاشان', 1, NULL, NULL, NULL),
(189, 4, 'کرکوند', 'کرکوند', 1, NULL, NULL, NULL),
(190, 4, 'کلیشاد و سودرجان', 'کلیشاد-سودرجان', 1, NULL, NULL, NULL),
(191, 4, 'کمشچه', 'کمشچه', 1, NULL, NULL, NULL),
(192, 4, 'کمه', 'کمه', 1, NULL, NULL, NULL),
(193, 4, 'کهریزسنگ', 'کهریزسنگ', 1, NULL, NULL, NULL),
(194, 4, 'کوشک', 'کوشک', 1, NULL, NULL, NULL),
(195, 4, 'کوهپایه', 'کوهپایه', 1, NULL, NULL, NULL),
(196, 4, 'گرگاب', 'گرگاب', 1, NULL, NULL, NULL),
(197, 4, 'گزبرخوار', 'گزبرخوار', 1, NULL, NULL, NULL),
(198, 4, 'گلپایگان', 'گلپایگان', 1, NULL, NULL, NULL),
(199, 4, 'گلدشت', 'گلدشت', 1, NULL, NULL, NULL),
(200, 4, 'گلشهر', 'گلشهر', 1, NULL, NULL, NULL),
(201, 4, 'گوگد', 'گوگد', 1, NULL, NULL, NULL),
(202, 4, 'لای بید', 'لای-بید', 1, NULL, NULL, NULL),
(203, 4, 'مبارکه', 'مبارکه', 1, NULL, NULL, NULL),
(204, 4, 'مجلسی', 'مجلسی', 1, NULL, NULL, NULL),
(205, 4, 'محمدآباد', 'اصفهان-محمدآباد', 1, NULL, NULL, NULL),
(206, 4, 'مشکات', 'مشکات', 1, NULL, NULL, NULL),
(207, 4, 'منظریه', 'منظریه', 1, NULL, NULL, NULL),
(208, 4, 'مهاباد', 'اصفهان-مهاباد', 1, NULL, NULL, NULL),
(209, 4, 'میمه', 'اصفهان-میمه', 1, NULL, NULL, NULL),
(210, 4, 'نائین', 'نائین', 1, NULL, NULL, NULL),
(211, 4, 'نجف آباد', 'نجف-آباد', 1, NULL, NULL, NULL),
(212, 4, 'نصرآباد', 'اصفهان-نصرآباد', 1, NULL, NULL, NULL),
(213, 4, 'نطنز', 'نطنز', 1, NULL, NULL, NULL),
(214, 4, 'نوش آباد', 'نوش-آباد', 1, NULL, NULL, NULL),
(215, 4, 'نیاسر', 'نیاسر', 1, NULL, NULL, NULL),
(216, 4, 'نیک آباد', 'نیک-آباد', 1, NULL, NULL, NULL),
(217, 4, 'هرند', 'هرند', 1, NULL, NULL, NULL),
(218, 4, 'ورزنه', 'ورزنه', 1, NULL, NULL, NULL),
(219, 4, 'ورنامخواست', 'ورنامخواست', 1, NULL, NULL, NULL),
(220, 4, 'وزوان', 'وزوان', 1, NULL, NULL, NULL),
(221, 4, 'ونک', 'ونک', 1, NULL, NULL, NULL),
(222, 5, 'اسارا', 'اسارا', 1, NULL, NULL, NULL),
(223, 5, 'اشتهارد', 'اشتهارد', 1, NULL, NULL, NULL),
(224, 5, 'تنکمان', 'تنکمان', 1, NULL, NULL, NULL),
(225, 5, 'چهارباغ', 'چهارباغ', 1, NULL, NULL, NULL),
(226, 5, 'سعید آباد', 'سعید-آباد', 1, NULL, NULL, NULL),
(227, 5, 'شهر جدید هشتگرد', 'شهر-جدید-هشتگرد', 1, NULL, NULL, NULL),
(228, 5, 'طالقان', 'طالقان', 1, NULL, NULL, NULL),
(229, 5, 'کرج', 'کرج', 1, NULL, NULL, NULL),
(230, 5, 'کمال شهر', 'کمال-شهر', 1, NULL, NULL, NULL),
(231, 5, 'کوهسار', 'کوهسار', 1, NULL, NULL, NULL),
(232, 5, 'گرمدره', 'گرمدره', 1, NULL, NULL, NULL),
(233, 5, 'ماهدشت', 'ماهدشت', 1, NULL, NULL, NULL),
(234, 5, 'محمدشهر', 'البرز-محمدشهر', 1, NULL, NULL, NULL),
(235, 5, 'مشکین دشت', 'مشکین-دشت', 1, NULL, NULL, NULL),
(236, 5, 'نظرآباد', 'نظرآباد', 1, NULL, NULL, NULL),
(237, 5, 'هشتگرد', 'هشتگرد', 1, NULL, NULL, NULL),
(238, 6, 'ارکواز', 'ارکواز', 1, NULL, NULL, NULL),
(239, 6, 'ایلام', 'ایلام', 1, NULL, NULL, NULL),
(240, 6, 'ایوان', 'ایوان', 1, NULL, NULL, NULL),
(241, 6, 'آبدانان', 'آبدانان', 1, NULL, NULL, NULL),
(242, 6, 'آسمان آباد', 'آسمان-آباد', 1, NULL, NULL, NULL),
(243, 6, 'بدره', 'بدره', 1, NULL, NULL, NULL),
(244, 6, 'پهله', 'پهله', 1, NULL, NULL, NULL),
(245, 6, 'توحید', 'توحید', 1, NULL, NULL, NULL),
(246, 6, 'چوار', 'چوار', 1, NULL, NULL, NULL),
(247, 6, 'دره شهر', 'دره-شهر', 1, NULL, NULL, NULL),
(248, 6, 'دلگشا', 'دلگشا', 1, NULL, NULL, NULL),
(249, 6, 'دهلران', 'دهلران', 1, NULL, NULL, NULL),
(250, 6, 'زرنه', 'زرنه', 1, NULL, NULL, NULL),
(251, 6, 'سراب باغ', 'سراب-باغ', 1, NULL, NULL, NULL),
(252, 6, 'سرابله', 'سرابله', 1, NULL, NULL, NULL),
(253, 6, 'صالح آباد', 'ایلام-صالح-آباد', 1, NULL, NULL, NULL),
(254, 6, 'لومار', 'لومار', 1, NULL, NULL, NULL),
(255, 6, 'مهران', 'مهران', 1, NULL, NULL, NULL),
(256, 6, 'مورموری', 'مورموری', 1, NULL, NULL, NULL),
(257, 6, 'موسیان', 'موسیان', 1, NULL, NULL, NULL),
(258, 6, 'میمه', 'ایلام-میمه', 1, NULL, NULL, NULL),
(259, 7, 'امام حسن', 'امام-حسن', 1, NULL, NULL, NULL),
(260, 7, 'انارستان', 'انارستان', 1, NULL, NULL, NULL),
(261, 7, 'اهرم', 'اهرم', 1, NULL, NULL, NULL),
(262, 7, 'آب پخش', 'آب-پخش', 1, NULL, NULL, NULL),
(263, 7, 'آبدان', 'آبدان', 1, NULL, NULL, NULL),
(264, 7, 'برازجان', 'برازجان', 1, NULL, NULL, NULL),
(265, 7, 'بردخون', 'بردخون', 1, NULL, NULL, NULL),
(266, 7, 'بندردیر', 'بندردیر', 1, NULL, NULL, NULL),
(267, 7, 'بندردیلم', 'بندردیلم', 1, NULL, NULL, NULL),
(268, 7, 'بندرریگ', 'بندرریگ', 1, NULL, NULL, NULL),
(269, 7, 'بندرکنگان', 'بندرکنگان', 1, NULL, NULL, NULL),
(270, 7, 'بندرگناوه', 'بندرگناوه', 1, NULL, NULL, NULL),
(271, 7, 'بنک', 'بنک', 1, NULL, NULL, NULL),
(272, 7, 'بوشهر', 'بوشهر', 1, NULL, NULL, NULL),
(273, 7, 'تنگ ارم', 'تنگ-ارم', 1, NULL, NULL, NULL),
(274, 7, 'جم', 'جم', 1, NULL, NULL, NULL),
(275, 7, 'چغادک', 'چغادک', 1, NULL, NULL, NULL),
(276, 7, 'خارک', 'خارک', 1, NULL, NULL, NULL),
(277, 7, 'خورموج', 'خورموج', 1, NULL, NULL, NULL),
(278, 7, 'دالکی', 'دالکی', 1, NULL, NULL, NULL),
(279, 7, 'دلوار', 'دلوار', 1, NULL, NULL, NULL),
(280, 7, 'ریز', 'ریز', 1, NULL, NULL, NULL),
(281, 7, 'سعدآباد', 'سعدآباد', 1, NULL, NULL, NULL),
(282, 7, 'سیراف', 'سیراف', 1, NULL, NULL, NULL),
(283, 7, 'شبانکاره', 'شبانکاره', 1, NULL, NULL, NULL),
(284, 7, 'شنبه', 'شنبه', 1, NULL, NULL, NULL),
(285, 7, 'عسلویه', 'عسلویه', 1, NULL, NULL, NULL),
(286, 7, 'کاکی', 'کاکی', 1, NULL, NULL, NULL),
(287, 7, 'کلمه', 'کلمه', 1, NULL, NULL, NULL),
(288, 7, 'نخل تقی', 'نخل-تقی', 1, NULL, NULL, NULL),
(289, 7, 'وحدتیه', 'وحدتیه', 1, NULL, NULL, NULL),
(290, 8, 'ارجمند', 'ارجمند', 1, NULL, NULL, NULL),
(291, 8, 'اسلامشهر', 'اسلامشهر', 1, NULL, NULL, NULL),
(292, 8, 'اندیشه', 'اندیشه', 1, NULL, NULL, NULL),
(293, 8, 'آبسرد', 'آبسرد', 1, NULL, NULL, NULL),
(294, 8, 'آبعلی', 'آبعلی', 1, NULL, NULL, NULL),
(295, 8, 'باغستان', 'باغستان', 1, NULL, NULL, NULL),
(296, 8, 'باقرشهر', 'باقرشهر', 1, NULL, NULL, NULL),
(297, 8, 'بومهن', 'بومهن', 1, NULL, NULL, NULL),
(298, 8, 'پاکدشت', 'پاکدشت', 1, NULL, NULL, NULL),
(299, 8, 'پردیس', 'پردیس', 1, NULL, NULL, NULL),
(300, 8, 'پیشوا', 'پیشوا', 1, NULL, NULL, NULL),
(301, 8, 'تهران', 'تهران', 1, NULL, NULL, NULL),
(302, 8, 'جوادآباد', 'جوادآباد', 1, NULL, NULL, NULL),
(303, 8, 'چهاردانگه', 'چهاردانگه', 1, NULL, NULL, NULL),
(304, 8, 'حسن آباد', 'تهران-حسن-آباد', 1, NULL, NULL, NULL),
(305, 8, 'دماوند', 'دماوند', 1, NULL, NULL, NULL),
(306, 8, 'دیزین', 'دیزین', 1, NULL, NULL, NULL),
(307, 8, 'شهر ری', 'شهر-ری', 1, NULL, NULL, NULL),
(308, 8, 'رباط کریم', 'رباط-کریم', 1, NULL, NULL, NULL),
(309, 8, 'رودهن', 'رودهن', 1, NULL, NULL, NULL),
(310, 8, 'شاهدشهر', 'شاهدشهر', 1, NULL, NULL, NULL),
(311, 8, 'شریف آباد', 'شریف-آباد', 1, NULL, NULL, NULL),
(312, 8, 'شمشک', 'شمشک', 1, NULL, NULL, NULL),
(313, 8, 'شهریار', 'شهریار', 1, NULL, NULL, NULL),
(314, 8, 'صالح آباد', 'تهران-صالح-آباد', 1, NULL, NULL, NULL),
(315, 8, 'صباشهر', 'صباشهر', 1, NULL, NULL, NULL),
(316, 8, 'صفادشت', 'صفادشت', 1, NULL, NULL, NULL),
(317, 8, 'فردوسیه', 'فردوسیه', 1, NULL, NULL, NULL),
(318, 8, 'فشم', 'فشم', 1, NULL, NULL, NULL),
(319, 8, 'فیروزکوه', 'فیروزکوه', 1, NULL, NULL, NULL),
(320, 8, 'قدس', 'قدس', 1, NULL, NULL, NULL),
(321, 8, 'قرچک', 'قرچک', 1, NULL, NULL, NULL),
(322, 8, 'کهریزک', 'کهریزک', 1, NULL, NULL, NULL),
(323, 8, 'کیلان', 'کیلان', 1, NULL, NULL, NULL),
(324, 8, 'گلستان', 'شهر-گلستان', 1, NULL, NULL, NULL),
(325, 8, 'لواسان', 'لواسان', 1, NULL, NULL, NULL),
(326, 8, 'ملارد', 'ملارد', 1, NULL, NULL, NULL),
(327, 8, 'میگون', 'میگون', 1, NULL, NULL, NULL),
(328, 8, 'نسیم شهر', 'نسیم-شهر', 1, NULL, NULL, NULL),
(329, 8, 'نصیرآباد', 'نصیرآباد', 1, NULL, NULL, NULL),
(330, 8, 'وحیدیه', 'وحیدیه', 1, NULL, NULL, NULL),
(331, 8, 'ورامین', 'ورامین', 1, NULL, NULL, NULL),
(332, 9, 'اردل', 'اردل', 1, NULL, NULL, NULL),
(333, 9, 'آلونی', 'آلونی', 1, NULL, NULL, NULL),
(334, 9, 'باباحیدر', 'باباحیدر', 1, NULL, NULL, NULL),
(335, 9, 'بروجن', 'بروجن', 1, NULL, NULL, NULL),
(336, 9, 'بلداجی', 'بلداجی', 1, NULL, NULL, NULL),
(337, 9, 'بن', 'بن', 1, NULL, NULL, NULL),
(338, 9, 'جونقان', 'جونقان', 1, NULL, NULL, NULL),
(339, 9, 'چلگرد', 'چلگرد', 1, NULL, NULL, NULL),
(340, 9, 'سامان', 'سامان', 1, NULL, NULL, NULL),
(341, 9, 'سفیددشت', 'سفیددشت', 1, NULL, NULL, NULL),
(342, 9, 'سودجان', 'سودجان', 1, NULL, NULL, NULL),
(343, 9, 'سورشجان', 'سورشجان', 1, NULL, NULL, NULL),
(344, 9, 'شلمزار', 'شلمزار', 1, NULL, NULL, NULL),
(345, 9, 'شهرکرد', 'شهرکرد', 1, NULL, NULL, NULL),
(346, 9, 'طاقانک', 'طاقانک', 1, NULL, NULL, NULL),
(347, 9, 'فارسان', 'فارسان', 1, NULL, NULL, NULL),
(348, 9, 'فرادنبه', 'فرادبنه', 1, NULL, NULL, NULL),
(349, 9, 'فرخ شهر', 'فرخ-شهر', 1, NULL, NULL, NULL),
(350, 9, 'کیان', 'کیان', 1, NULL, NULL, NULL),
(351, 9, 'گندمان', 'گندمان', 1, NULL, NULL, NULL),
(352, 9, 'گهرو', 'گهرو', 1, NULL, NULL, NULL),
(353, 9, 'لردگان', 'لردگان', 1, NULL, NULL, NULL),
(354, 9, 'مال خلیفه', 'مال-خلیفه', 1, NULL, NULL, NULL),
(355, 9, 'ناغان', 'ناغان', 1, NULL, NULL, NULL),
(356, 9, 'نافچ', 'نافچ', 1, NULL, NULL, NULL),
(357, 9, 'نقنه', 'نقنه', 1, NULL, NULL, NULL),
(358, 9, 'هفشجان', 'هفشجان', 1, NULL, NULL, NULL),
(359, 10, 'ارسک', 'ارسک', 1, NULL, NULL, NULL),
(360, 10, 'اسدیه', 'اسدیه', 1, NULL, NULL, NULL),
(361, 10, 'اسفدن', 'اسفدن', 1, NULL, NULL, NULL),
(362, 10, 'اسلامیه', 'اسلامیه', 1, NULL, NULL, NULL),
(363, 10, 'آرین شهر', 'آرین-شهر', 1, NULL, NULL, NULL),
(364, 10, 'آیسک', 'آیسک', 1, NULL, NULL, NULL),
(365, 10, 'بشرویه', 'بشرویه', 1, NULL, NULL, NULL),
(366, 10, 'بیرجند', 'بیرجند', 1, NULL, NULL, NULL),
(367, 10, 'حاجی آباد', 'خراسان-جنوبی-حاجی-آباد', 1, NULL, NULL, NULL),
(368, 10, 'خضری دشت بیاض', 'خضری-دشت-بیاض', 1, NULL, NULL, NULL),
(369, 10, 'خوسف', 'خوسف', 1, NULL, NULL, NULL),
(370, 10, 'زهان', 'زهان', 1, NULL, NULL, NULL),
(371, 10, 'سرایان', 'سرایان', 1, NULL, NULL, NULL),
(372, 10, 'سربیشه', 'سربیشه', 1, NULL, NULL, NULL),
(373, 10, 'سه قلعه', 'سه-قلعه', 1, NULL, NULL, NULL),
(374, 10, 'شوسف', 'شوسف', 1, NULL, NULL, NULL),
(375, 10, 'طبس', 'خراسان-جنوبی-طبس-', 1, NULL, NULL, NULL),
(376, 10, 'فردوس', 'فردوس', 1, NULL, NULL, NULL),
(377, 10, 'قاین', 'قاین', 1, NULL, NULL, NULL),
(378, 10, 'قهستان', 'قهستان', 1, NULL, NULL, NULL),
(379, 10, 'محمدشهر', 'خراسان-جنوبی-محمدشهر', 1, NULL, NULL, NULL),
(380, 10, 'مود', 'مود', 1, NULL, NULL, NULL),
(381, 10, 'نهبندان', 'نهبندان', 1, NULL, NULL, NULL),
(382, 10, 'نیمبلوک', 'نیمبلوک', 1, NULL, NULL, NULL),
(383, 11, 'احمدآباد صولت', 'احمدآباد-صولت', 1, NULL, NULL, NULL),
(384, 11, 'انابد', 'انابد', 1, NULL, NULL, NULL),
(385, 11, 'باجگیران', 'باجگیران', 1, NULL, NULL, NULL),
(386, 11, 'باخرز', 'باخرز', 1, NULL, NULL, NULL),
(387, 11, 'بار', 'بار', 1, NULL, NULL, NULL),
(388, 11, 'بایگ', 'بایگ', 1, NULL, NULL, NULL),
(389, 11, 'بجستان', 'بجستان', 1, NULL, NULL, NULL),
(390, 11, 'بردسکن', 'بردسکن', 1, NULL, NULL, NULL),
(391, 11, 'بیدخت', 'بیدخت', 1, NULL, NULL, NULL),
(392, 11, 'تایباد', 'تایباد', 1, NULL, NULL, NULL),
(393, 11, 'تربت جام', 'تربت-جام', 1, NULL, NULL, NULL),
(394, 11, 'تربت حیدریه', 'تربت-حیدریه', 1, NULL, NULL, NULL),
(395, 11, 'جغتای', 'جغتای', 1, NULL, NULL, NULL),
(396, 11, 'جنگل', 'جنگل', 1, NULL, NULL, NULL),
(397, 11, 'چاپشلو', 'چاپشلو', 1, NULL, NULL, NULL),
(398, 11, 'چکنه', 'چکنه', 1, NULL, NULL, NULL),
(399, 11, 'چناران', 'چناران', 1, NULL, NULL, NULL),
(400, 11, 'خرو', 'خرو', 1, NULL, NULL, NULL),
(401, 11, 'خلیل آباد', 'خلیل-آباد', 1, NULL, NULL, NULL),
(402, 11, 'خواف', 'خواف', 1, NULL, NULL, NULL),
(403, 11, 'داورزن', 'داورزن', 1, NULL, NULL, NULL),
(404, 11, 'درگز', 'درگز', 1, NULL, NULL, NULL),
(405, 11, 'در رود', 'در-رود', 1, NULL, NULL, NULL),
(406, 11, 'دولت آباد', 'خراسان-رضوی-دولت-آباد', 1, NULL, NULL, NULL),
(407, 11, 'رباط سنگ', 'رباط-سنگ', 1, NULL, NULL, NULL),
(408, 11, 'رشتخوار', 'رشتخوار', 1, NULL, NULL, NULL),
(409, 11, 'رضویه', 'رضویه', 1, NULL, NULL, NULL),
(410, 11, 'روداب', 'روداب', 1, NULL, NULL, NULL),
(411, 11, 'ریوش', 'ریوش', 1, NULL, NULL, NULL),
(412, 11, 'سبزوار', 'سبزوار', 1, NULL, NULL, NULL),
(413, 11, 'سرخس', 'سرخس', 1, NULL, NULL, NULL),
(414, 11, 'سفیدسنگ', 'سفیدسنگ', 1, NULL, NULL, NULL),
(415, 11, 'سلامی', 'سلامی', 1, NULL, NULL, NULL),
(416, 11, 'سلطان آباد', 'سلطان-آباد', 1, NULL, NULL, NULL),
(417, 11, 'سنگان', 'سنگان', 1, NULL, NULL, NULL),
(418, 11, 'شادمهر', 'شادمهر', 1, NULL, NULL, NULL),
(419, 11, 'شاندیز', 'شاندیز', 1, NULL, NULL, NULL),
(420, 11, 'ششتمد', 'ششتمد', 1, NULL, NULL, NULL),
(421, 11, 'شهرآباد', 'شهرآباد', 1, NULL, NULL, NULL),
(422, 11, 'شهرزو', 'شهرزو', 1, NULL, NULL, NULL),
(423, 11, 'صالح آباد', 'خراسان-رضوی-صالح-آباد', 1, NULL, NULL, NULL),
(424, 11, 'طرقبه', 'طرقبه', 1, NULL, NULL, NULL),
(425, 11, 'عشق آباد', 'خراسان-رضوی-عشق-آباد', 1, NULL, NULL, NULL),
(426, 11, 'فرهادگرد', 'فرهادگرد', 1, NULL, NULL, NULL),
(427, 11, 'فریمان', 'فریمان', 1, NULL, NULL, NULL),
(428, 11, 'فیروزه', 'فیروزه', 1, NULL, NULL, NULL),
(429, 11, 'فیض آباد', 'فیض-آباد', 1, NULL, NULL, NULL),
(430, 11, 'قاسم آباد', 'قاسم-آباد', 1, NULL, NULL, NULL),
(431, 11, 'قدمگاه', 'قدمگاه', 1, NULL, NULL, NULL),
(432, 11, 'قلندرآباد', 'قلندرآباد', 1, NULL, NULL, NULL),
(433, 11, 'قوچان', 'قوچان', 1, NULL, NULL, NULL),
(434, 11, 'کاخک', 'کاخک', 1, NULL, NULL, NULL),
(435, 11, 'کاریز', 'کاریز', 1, NULL, NULL, NULL),
(436, 11, 'کاشمر', 'کاشمر', 1, NULL, NULL, NULL),
(437, 11, 'کدکن', 'کدکن', 1, NULL, NULL, NULL),
(438, 11, 'کلات', 'کلات', 1, NULL, NULL, NULL),
(439, 11, 'کندر', 'کندر', 1, NULL, NULL, NULL),
(440, 11, 'گلمکان', 'گلمکان', 1, NULL, NULL, NULL),
(441, 11, 'گناباد', 'گناباد', 1, NULL, NULL, NULL),
(442, 11, 'لطف آباد', 'لطف-آباد', 1, NULL, NULL, NULL),
(443, 11, 'مزدآوند', 'مزدآوند', 1, NULL, NULL, NULL),
(444, 11, 'مشهد', 'مشهد', 1, NULL, NULL, NULL),
(445, 11, 'ملک آباد', 'ملک-آباد', 1, NULL, NULL, NULL),
(446, 11, 'نشتیفان', 'نشتیفان', 1, NULL, NULL, NULL),
(447, 11, 'نصرآباد', 'خراسان-رضوی-نصرآباد', 1, NULL, NULL, NULL),
(448, 11, 'نقاب', 'نقاب', 1, NULL, NULL, NULL),
(449, 11, 'نوخندان', 'نوخندان', 1, NULL, NULL, NULL),
(450, 11, 'نیشابور', 'نیشابور', 1, NULL, NULL, NULL),
(451, 11, 'نیل شهر', 'نیل-شهر', 1, NULL, NULL, NULL),
(452, 11, 'همت آباد', 'همت-آباد', 1, NULL, NULL, NULL),
(453, 11, 'یونسی', 'یونسی', 1, NULL, NULL, NULL),
(454, 12, 'اسفراین', 'اسفراین', 1, NULL, NULL, NULL),
(455, 12, 'ایور', 'ایور', 1, NULL, NULL, NULL),
(456, 12, 'آشخانه', 'آشخانه', 1, NULL, NULL, NULL),
(457, 12, 'بجنورد', 'بجنورد', 1, NULL, NULL, NULL),
(458, 12, 'پیش قلعه', 'پیش-قلعه', 1, NULL, NULL, NULL),
(459, 12, 'تیتکانلو', 'تیتکانلو', 1, NULL, NULL, NULL),
(460, 12, 'جاجرم', 'جاجرم', 1, NULL, NULL, NULL),
(461, 12, 'حصارگرمخان', 'حصارگرمخان', 1, NULL, NULL, NULL),
(462, 12, 'درق', 'درق', 1, NULL, NULL, NULL),
(463, 12, 'راز', 'راز', 1, NULL, NULL, NULL),
(464, 12, 'سنخواست', 'سنخواست', 1, NULL, NULL, NULL),
(465, 12, 'شوقان', 'شوقان', 1, NULL, NULL, NULL),
(466, 12, 'شیروان', 'شیروان', 1, NULL, NULL, NULL),
(467, 12, 'صفی آباد', 'خراسان-شمالی-صفی-آباد', 1, NULL, NULL, NULL),
(468, 12, 'فاروج', 'فاروج', 1, NULL, NULL, NULL),
(469, 12, 'قاضی', 'قاضی', 1, NULL, NULL, NULL),
(470, 12, 'گرمه', 'گرمه', 1, NULL, NULL, NULL),
(471, 12, 'لوجلی', 'لوجلی', 1, NULL, NULL, NULL),
(472, 13, 'اروندکنار', 'اروندکنار', 1, NULL, NULL, NULL),
(473, 13, 'الوان', 'الوان', 1, NULL, NULL, NULL),
(474, 13, 'امیدیه', 'امیدیه', 1, NULL, NULL, NULL),
(475, 13, 'اندیمشک', 'اندیمشک', 1, NULL, NULL, NULL),
(476, 13, 'اهواز', 'اهواز', 1, NULL, NULL, NULL),
(477, 13, 'ایذه', 'ایذه', 1, NULL, NULL, NULL),
(478, 13, 'آبادان', 'آبادان', 1, NULL, NULL, NULL),
(479, 13, 'آغاجاری', 'آغاجاری', 1, NULL, NULL, NULL),
(480, 13, 'باغ ملک', 'باغ-ملک', 1, NULL, NULL, NULL),
(481, 13, 'بستان', 'بستان', 1, NULL, NULL, NULL),
(482, 13, 'بندرامام خمینی', 'بندرامام-خمینی', 1, NULL, NULL, NULL),
(483, 13, 'بندرماهشهر', 'بندرماهشهر', 1, NULL, NULL, NULL),
(484, 13, 'بهبهان', 'بهبهان', 1, NULL, NULL, NULL),
(485, 13, 'ترکالکی', 'ترکالکی', 1, NULL, NULL, NULL),
(486, 13, 'جایزان', 'جایزان', 1, NULL, NULL, NULL),
(487, 13, 'چمران', 'چمران', 1, NULL, NULL, NULL),
(488, 13, 'چویبده', 'چویبده', 1, NULL, NULL, NULL),
(489, 13, 'حر', 'حر', 1, NULL, NULL, NULL),
(490, 13, 'حسینیه', 'حسینیه', 1, NULL, NULL, NULL),
(491, 13, 'حمزه', 'حمزه', 1, NULL, NULL, NULL),
(492, 13, 'حمیدیه', 'حمیدیه', 1, NULL, NULL, NULL),
(493, 13, 'خرمشهر', 'خرمشهر', 1, NULL, NULL, NULL),
(494, 13, 'دارخوین', 'دارخوین', 1, NULL, NULL, NULL),
(495, 13, 'دزآب', 'دزآب', 1, NULL, NULL, NULL),
(496, 13, 'دزفول', 'دزفول', 1, NULL, NULL, NULL),
(497, 13, 'دهدز', 'دهدز', 1, NULL, NULL, NULL),
(498, 13, 'رامشیر', 'رامشیر', 1, NULL, NULL, NULL),
(499, 13, 'رامهرمز', 'رامهرمز', 1, NULL, NULL, NULL),
(500, 13, 'رفیع', 'رفیع', 1, NULL, NULL, NULL),
(501, 13, 'زهره', 'زهره', 1, NULL, NULL, NULL),
(502, 13, 'سالند', 'سالند', 1, NULL, NULL, NULL),
(503, 13, 'سردشت', 'خوزستان-سردشت', 1, NULL, NULL, NULL),
(504, 13, 'سوسنگرد', 'سوسنگرد', 1, NULL, NULL, NULL),
(505, 13, 'شادگان', 'شادگان', 1, NULL, NULL, NULL),
(506, 13, 'شاوور', 'شاوور', 1, NULL, NULL, NULL),
(507, 13, 'شرافت', 'شرافت', 1, NULL, NULL, NULL),
(508, 13, 'شوش', 'شوش', 1, NULL, NULL, NULL),
(509, 13, 'شوشتر', 'شوشتر', 1, NULL, NULL, NULL),
(510, 13, 'شیبان', 'شیبان', 1, NULL, NULL, NULL),
(511, 13, 'صالح شهر', 'صالح-شهر', 1, NULL, NULL, NULL),
(512, 13, 'صفی آباد', 'خوزستان-صفی-آباد', 1, NULL, NULL, NULL),
(513, 13, 'صیدون', 'صیدون', 1, NULL, NULL, NULL),
(514, 13, 'قلعه تل', 'قلعه-تل', 1, NULL, NULL, NULL),
(515, 13, 'قلعه خواجه', 'قلعه-خواجه', 1, NULL, NULL, NULL),
(516, 13, 'گتوند', 'گتوند', 1, NULL, NULL, NULL),
(517, 13, 'لالی', 'لالی', 1, NULL, NULL, NULL),
(518, 13, 'مسجدسلیمان', 'مسجدسلیمان', 1, NULL, NULL, NULL),
(520, 13, 'ملاثانی', 'ملاثانی', 1, NULL, NULL, NULL),
(521, 13, 'میانرود', 'میانرود', 1, NULL, NULL, NULL),
(522, 13, 'مینوشهر', 'مینوشهر', 1, NULL, NULL, NULL),
(523, 13, 'هفتگل', 'هفتگل', 1, NULL, NULL, NULL),
(524, 13, 'هندیجان', 'هندیجان', 1, NULL, NULL, NULL),
(525, 13, 'هویزه', 'هویزه', 1, NULL, NULL, NULL),
(526, 13, 'ویس', 'ویس', 1, NULL, NULL, NULL),
(527, 14, 'ابهر', 'ابهر', 1, NULL, NULL, NULL),
(528, 14, 'ارمغان خانه', 'ارمغان-خانه', 1, NULL, NULL, NULL),
(529, 14, 'آب بر', 'آب-بر', 1, NULL, NULL, NULL),
(530, 14, 'چورزق', 'چورزق', 1, NULL, NULL, NULL),
(531, 14, 'حلب', 'حلب', 1, NULL, NULL, NULL),
(532, 14, 'خرمدره', 'خرمدره', 1, NULL, NULL, NULL),
(533, 14, 'دندی', 'دندی', 1, NULL, NULL, NULL),
(534, 14, 'زرین آباد', 'زرین-آباد', 1, NULL, NULL, NULL),
(535, 14, 'زرین رود', 'زرین-رود', 1, NULL, NULL, NULL),
(536, 14, 'زنجان', 'زنجان', 1, NULL, NULL, NULL),
(537, 14, 'سجاس', 'سجاس', 1, NULL, NULL, NULL),
(538, 14, 'سلطانیه', 'سلطانیه', 1, NULL, NULL, NULL),
(539, 14, 'سهرورد', 'سهرورد', 1, NULL, NULL, NULL),
(540, 14, 'صائین قلعه', 'صائین-قلعه', 1, NULL, NULL, NULL),
(541, 14, 'قیدار', 'قیدار', 1, NULL, NULL, NULL),
(542, 14, 'گرماب', 'گرماب', 1, NULL, NULL, NULL),
(543, 14, 'ماه نشان', 'ماه-نشان', 1, NULL, NULL, NULL),
(544, 14, 'هیدج', 'هیدج', 1, NULL, NULL, NULL),
(545, 15, 'امیریه', 'امیریه', 1, NULL, NULL, NULL),
(546, 15, 'ایوانکی', 'ایوانکی', 1, NULL, NULL, NULL),
(547, 15, 'آرادان', 'آرادان', 1, NULL, NULL, NULL),
(548, 15, 'بسطام', 'بسطام', 1, NULL, NULL, NULL),
(549, 15, 'بیارجمند', 'بیارجمند', 1, NULL, NULL, NULL),
(550, 15, 'دامغان', 'دامغان', 1, NULL, NULL, NULL),
(551, 15, 'درجزین', 'درجزین', 1, NULL, NULL, NULL),
(552, 15, 'دیباج', 'دیباج', 1, NULL, NULL, NULL),
(553, 15, 'سرخه', 'سرخه', 1, NULL, NULL, NULL),
(554, 15, 'سمنان', 'سمنان', 1, NULL, NULL, NULL),
(555, 15, 'شاهرود', 'شاهرود', 1, NULL, NULL, NULL),
(556, 15, 'شهمیرزاد', 'شهمیرزاد', 1, NULL, NULL, NULL),
(557, 15, 'کلاته خیج', 'کلاته-خیج', 1, NULL, NULL, NULL),
(558, 15, 'گرمسار', 'گرمسار', 1, NULL, NULL, NULL),
(559, 15, 'مجن', 'مجن', 1, NULL, NULL, NULL),
(560, 15, 'مهدی شهر', 'مهدی-شهر', 1, NULL, NULL, NULL),
(561, 15, 'میامی', 'میامی', 1, NULL, NULL, NULL),
(562, 16, 'ادیمی', 'ادیمی', 1, NULL, NULL, NULL),
(563, 16, 'اسپکه', 'اسپکه', 1, NULL, NULL, NULL),
(564, 16, 'ایرانشهر', 'ایرانشهر', 1, NULL, NULL, NULL),
(565, 16, 'بزمان', 'بزمان', 1, NULL, NULL, NULL),
(566, 16, 'بمپور', 'بمپور', 1, NULL, NULL, NULL),
(567, 16, 'بنت', 'بنت', 1, NULL, NULL, NULL),
(568, 16, 'بنجار', 'بنجار', 1, NULL, NULL, NULL),
(569, 16, 'پیشین', 'پیشین', 1, NULL, NULL, NULL),
(570, 16, 'جالق', 'جالق', 1, NULL, NULL, NULL),
(571, 16, 'چابهار', 'چابهار', 1, NULL, NULL, NULL),
(572, 16, 'خاش', 'خاش', 1, NULL, NULL, NULL),
(573, 16, 'دوست محمد', 'دوست-محمد', 1, NULL, NULL, NULL),
(574, 16, 'راسک', 'راسک', 1, NULL, NULL, NULL),
(575, 16, 'زابل', 'زابل', 1, NULL, NULL, NULL),
(576, 16, 'زابلی', 'زابلی', 1, NULL, NULL, NULL),
(577, 16, 'زاهدان', 'زاهدان', 1, NULL, NULL, NULL),
(578, 16, 'زهک', 'زهک', 1, NULL, NULL, NULL),
(579, 16, 'سراوان', 'سراوان', 1, NULL, NULL, NULL),
(580, 16, 'سرباز', 'سرباز', 1, NULL, NULL, NULL),
(581, 16, 'سوران', 'سوران', 1, NULL, NULL, NULL),
(582, 16, 'سیرکان', 'سیرکان', 1, NULL, NULL, NULL),
(583, 16, 'علی اکبر', 'علی-اکبر', 1, NULL, NULL, NULL),
(584, 16, 'فنوج', 'فنوج', 1, NULL, NULL, NULL),
(585, 16, 'قصرقند', 'قصرقند', 1, NULL, NULL, NULL),
(586, 16, 'کنارک', 'کنارک', 1, NULL, NULL, NULL),
(587, 16, 'گشت', 'گشت', 1, NULL, NULL, NULL),
(588, 16, 'گلمورتی', 'گلمورتی', 1, NULL, NULL, NULL),
(589, 16, 'محمدان', 'محمدان', 1, NULL, NULL, NULL),
(590, 16, 'محمدآباد', 'سیستان-و-بلوچستان-محمدآباد', 1, NULL, NULL, NULL),
(591, 16, 'محمدی', 'محمدی', 1, NULL, NULL, NULL),
(592, 16, 'میرجاوه', 'میرجاوه', 1, NULL, NULL, NULL),
(593, 16, 'نصرت آباد', 'نصرت-آباد', 1, NULL, NULL, NULL),
(594, 16, 'نگور', 'نگور', 1, NULL, NULL, NULL),
(595, 16, 'نوک آباد', 'نوک-آباد', 1, NULL, NULL, NULL),
(596, 16, 'نیک شهر', 'نیک-شهر', 1, NULL, NULL, NULL),
(597, 16, 'هیدوچ', 'هیدوچ', 1, NULL, NULL, NULL),
(598, 17, 'اردکان', 'فارس-اردکان', 1, NULL, NULL, NULL),
(599, 17, 'ارسنجان', 'ارسنجان', 1, NULL, NULL, NULL),
(600, 17, 'استهبان', 'استهبان', 1, NULL, NULL, NULL),
(601, 17, 'اشکنان', 'اشکنان', 1, NULL, NULL, NULL),
(602, 17, 'افزر', 'افزر', 1, NULL, NULL, NULL),
(603, 17, 'اقلید', 'اقلید', 1, NULL, NULL, NULL),
(604, 17, 'امام شهر', 'امام-شهر', 1, NULL, NULL, NULL),
(605, 17, 'اهل', 'اهل', 1, NULL, NULL, NULL),
(606, 17, 'اوز', 'اوز', 1, NULL, NULL, NULL),
(607, 17, 'ایج', 'ایج', 1, NULL, NULL, NULL),
(608, 17, 'ایزدخواست', 'ایزدخواست', 1, NULL, NULL, NULL),
(609, 17, 'آباده', 'آباده', 1, NULL, NULL, NULL),
(610, 17, 'آباده طشک', 'آباده-طشک', 1, NULL, NULL, NULL),
(611, 17, 'باب انار', 'باب-انار', 1, NULL, NULL, NULL),
(612, 17, 'بالاده', 'فارس-بالاده', 1, NULL, NULL, NULL),
(613, 17, 'بنارویه', 'بنارویه', 1, NULL, NULL, NULL),
(614, 17, 'بهمن', 'بهمن', 1, NULL, NULL, NULL),
(615, 17, 'بوانات', 'بوانات', 1, NULL, NULL, NULL),
(616, 17, 'بیرم', 'بیرم', 1, NULL, NULL, NULL),
(617, 17, 'بیضا', 'بیضا', 1, NULL, NULL, NULL),
(618, 17, 'جنت شهر', 'جنت-شهر', 1, NULL, NULL, NULL),
(619, 17, 'جهرم', 'جهرم', 1, NULL, NULL, NULL),
(620, 17, 'جویم', 'جویم', 1, NULL, NULL, NULL),
(621, 17, 'زرین دشت', 'زرین-دشت', 1, NULL, NULL, NULL),
(622, 17, 'حسن آباد', 'فارس-حسن-آباد', 1, NULL, NULL, NULL),
(623, 17, 'خان زنیان', 'خان-زنیان', 1, NULL, NULL, NULL),
(624, 17, 'خاوران', 'خاوران', 1, NULL, NULL, NULL),
(625, 17, 'خرامه', 'خرامه', 1, NULL, NULL, NULL),
(626, 17, 'خشت', 'خشت', 1, NULL, NULL, NULL),
(627, 17, 'خنج', 'خنج', 1, NULL, NULL, NULL),
(628, 17, 'خور', 'فارس-خور', 1, NULL, NULL, NULL),
(629, 17, 'داراب', 'داراب', 1, NULL, NULL, NULL),
(630, 17, 'داریان', 'داریان', 1, NULL, NULL, NULL),
(631, 17, 'دبیران', 'دبیران', 1, NULL, NULL, NULL),
(632, 17, 'دژکرد', 'دژکرد', 1, NULL, NULL, NULL),
(633, 17, 'دهرم', 'دهرم', 1, NULL, NULL, NULL),
(634, 17, 'دوبرجی', 'دوبرجی', 1, NULL, NULL, NULL),
(635, 17, 'رامجرد', 'رامجرد', 1, NULL, NULL, NULL),
(636, 17, 'رونیز', 'رونیز', 1, NULL, NULL, NULL),
(637, 17, 'زاهدشهر', 'زاهدشهر', 1, NULL, NULL, NULL),
(638, 17, 'زرقان', 'زرقان', 1, NULL, NULL, NULL),
(639, 17, 'سده', 'سده', 1, NULL, NULL, NULL),
(640, 17, 'سروستان', 'سروستان', 1, NULL, NULL, NULL),
(641, 17, 'سعادت شهر', 'سعادت-شهر', 1, NULL, NULL, NULL),
(642, 17, 'سورمق', 'سورمق', 1, NULL, NULL, NULL),
(643, 17, 'سیدان', 'سیدان', 1, NULL, NULL, NULL),
(644, 17, 'ششده', 'ششده', 1, NULL, NULL, NULL),
(645, 17, 'شهرپیر', 'شهرپیر', 1, NULL, NULL, NULL),
(646, 17, 'شهرصدرا', 'شهرصدرا', 1, NULL, NULL, NULL),
(647, 17, 'شیراز', 'شیراز', 1, NULL, NULL, NULL),
(648, 17, 'صغاد', 'صغاد', 1, NULL, NULL, NULL),
(649, 17, 'صفاشهر', 'صفاشهر', 1, NULL, NULL, NULL),
(650, 17, 'علامرودشت', 'علامرودشت', 1, NULL, NULL, NULL),
(651, 17, 'فدامی', 'فدامی', 1, NULL, NULL, NULL),
(652, 17, 'فراشبند', 'فراشبند', 1, NULL, NULL, NULL),
(653, 17, 'فسا', 'فسا', 1, NULL, NULL, NULL),
(654, 17, 'فیروزآباد', 'فارس-فیروزآباد', 1, NULL, NULL, NULL),
(655, 17, 'قائمیه', 'قائمیه', 1, NULL, NULL, NULL),
(656, 17, 'قادرآباد', 'قادرآباد', 1, NULL, NULL, NULL),
(657, 17, 'قطب آباد', 'قطب-آباد', 1, NULL, NULL, NULL),
(658, 17, 'قطرویه', 'قطرویه', 1, NULL, NULL, NULL),
(659, 17, 'قیر', 'قیر', 1, NULL, NULL, NULL),
(660, 17, 'کارزین (فتح آباد)', 'کارزین-فتح-آباد', 1, NULL, NULL, NULL),
(661, 17, 'کازرون', 'کازرون', 1, NULL, NULL, NULL),
(662, 17, 'کامفیروز', 'کامفیروز', 1, NULL, NULL, NULL),
(663, 17, 'کره ای', 'کره-ای', 1, NULL, NULL, NULL),
(664, 17, 'کنارتخته', 'کنارتخته', 1, NULL, NULL, NULL),
(665, 17, 'کوار', 'کوار', 1, NULL, NULL, NULL),
(666, 17, 'گراش', 'گراش', 1, NULL, NULL, NULL),
(667, 17, 'گله دار', 'گله-دار', 1, NULL, NULL, NULL),
(668, 17, 'لار', 'لار', 1, NULL, NULL, NULL),
(669, 17, 'لامرد', 'لامرد', 1, NULL, NULL, NULL),
(670, 17, 'لپویی', 'لپویی', 1, NULL, NULL, NULL),
(671, 17, 'لطیفی', 'لطیفی', 1, NULL, NULL, NULL),
(672, 17, 'مبارک آباددیز', 'مبارک-آباددیز', 1, NULL, NULL, NULL),
(673, 17, 'مرودشت', 'مرودشت', 1, NULL, NULL, NULL),
(674, 17, 'مشکان', 'مشکان', 1, NULL, NULL, NULL),
(675, 17, 'مصیری', 'مصیری', 1, NULL, NULL, NULL),
(676, 17, 'مهر', 'مهر', 1, NULL, NULL, NULL),
(677, 17, 'میمند', 'میمند', 1, NULL, NULL, NULL),
(678, 17, 'نوبندگان', 'نوبندگان', 1, NULL, NULL, NULL),
(679, 17, 'نوجین', 'نوجین', 1, NULL, NULL, NULL),
(680, 17, 'نودان', 'نودان', 1, NULL, NULL, NULL),
(681, 17, 'نورآباد', 'فارس-نورآباد', 1, NULL, NULL, NULL),
(682, 17, 'نی ریز', 'نی-ریز', 1, NULL, NULL, NULL),
(683, 17, 'وراوی', 'وراوی', 1, NULL, NULL, NULL),
(684, 18, 'ارداق', 'ارداق', 1, NULL, NULL, NULL),
(685, 18, 'اسفرورین', 'اسفرورین', 1, NULL, NULL, NULL),
(686, 18, 'اقبالیه', 'اقبالیه', 1, NULL, NULL, NULL),
(687, 18, 'الوند', 'الوند', 1, NULL, NULL, NULL),
(688, 18, 'آبگرم', 'آبگرم', 1, NULL, NULL, NULL),
(689, 18, 'آبیک', 'آبیک', 1, NULL, NULL, NULL),
(690, 18, 'آوج', 'آوج', 1, NULL, NULL, NULL),
(691, 18, 'بوئین زهرا', 'بوئین-زهرا', 1, NULL, NULL, NULL),
(692, 18, 'بیدستان', 'بیدستان', 1, NULL, NULL, NULL),
(693, 18, 'تاکستان', 'تاکستان', 1, NULL, NULL, NULL),
(694, 18, 'خاکعلی', 'خاکعلی', 1, NULL, NULL, NULL),
(695, 18, 'خرمدشت', 'خرمدشت', 1, NULL, NULL, NULL),
(696, 18, 'دانسفهان', 'دانسفهان', 1, NULL, NULL, NULL),
(697, 18, 'رازمیان', 'رازمیان', 1, NULL, NULL, NULL),
(698, 18, 'سگزآباد', 'سگزآباد', 1, NULL, NULL, NULL),
(699, 18, 'سیردان', 'سیردان', 1, NULL, NULL, NULL),
(700, 18, 'شال', 'شال', 1, NULL, NULL, NULL),
(701, 18, 'شریفیه', 'شریفیه', 1, NULL, NULL, NULL),
(702, 18, 'ضیاآباد', 'ضیاآباد', 1, NULL, NULL, NULL),
(703, 18, 'قزوین', 'قزوین', 1, NULL, NULL, NULL),
(704, 18, 'کوهین', 'کوهین', 1, NULL, NULL, NULL),
(705, 18, 'محمدیه', 'محمدیه', 1, NULL, NULL, NULL),
(706, 18, 'محمودآباد نمونه', 'محمودآباد-نمونه', 1, NULL, NULL, NULL),
(707, 18, 'معلم کلایه', 'معلم-کلایه', 1, NULL, NULL, NULL),
(708, 18, 'نرجه', 'نرجه', 1, NULL, NULL, NULL),
(709, 19, 'جعفریه', 'جعفریه', 1, NULL, NULL, NULL),
(710, 19, 'دستجرد', 'دستجرد', 1, NULL, NULL, NULL),
(711, 19, 'سلفچگان', 'سلفچگان', 1, NULL, NULL, NULL),
(712, 19, 'قم', 'قم', 1, NULL, NULL, NULL),
(713, 19, 'قنوات', 'قنوات', 1, NULL, NULL, NULL),
(714, 19, 'کهک', 'کهک', 1, NULL, NULL, NULL),
(715, 20, 'آرمرده', 'آرمرده', 1, NULL, NULL, NULL),
(716, 20, 'بابارشانی', 'بابارشانی', 1, NULL, NULL, NULL),
(717, 20, 'بانه', 'بانه', 1, NULL, NULL, NULL),
(718, 20, 'بلبان آباد', 'بلبان-آباد', 1, NULL, NULL, NULL),
(719, 20, 'بوئین سفلی', 'بوئین-سفلی', 1, NULL, NULL, NULL),
(720, 20, 'بیجار', 'بیجار', 1, NULL, NULL, NULL),
(721, 20, 'چناره', 'چناره', 1, NULL, NULL, NULL),
(722, 20, 'دزج', 'دزج', 1, NULL, NULL, NULL),
(723, 20, 'دلبران', 'دلبران', 1, NULL, NULL, NULL),
(724, 20, 'دهگلان', 'دهگلان', 1, NULL, NULL, NULL),
(725, 20, 'دیواندره', 'دیواندره', 1, NULL, NULL, NULL),
(726, 20, 'زرینه', 'زرینه', 1, NULL, NULL, NULL),
(727, 20, 'سروآباد', 'سروآباد', 1, NULL, NULL, NULL),
(728, 20, 'سریش آباد', 'سریش-آباد', 1, NULL, NULL, NULL),
(729, 20, 'سقز', 'سقز', 1, NULL, NULL, NULL),
(730, 20, 'سنندج', 'سنندج', 1, NULL, NULL, NULL),
(731, 20, 'شویشه', 'شویشه', 1, NULL, NULL, NULL),
(732, 20, 'صاحب', 'صاحب', 1, NULL, NULL, NULL),
(733, 20, 'قروه', 'قروه', 1, NULL, NULL, NULL),
(734, 20, 'کامیاران', 'کامیاران', 1, NULL, NULL, NULL),
(735, 20, 'کانی دینار', 'کانی-دینار', 1, NULL, NULL, NULL),
(736, 20, 'کانی سور', 'کانی-سور', 1, NULL, NULL, NULL),
(737, 20, 'مریوان', 'مریوان', 1, NULL, NULL, NULL),
(738, 20, 'موچش', 'موچش', 1, NULL, NULL, NULL),
(739, 20, 'یاسوکند', 'یاسوکند', 1, NULL, NULL, NULL),
(740, 21, 'اختیارآباد', 'اختیارآباد', 1, NULL, NULL, NULL),
(741, 21, 'ارزوئیه', 'ارزوئیه', 1, NULL, NULL, NULL),
(742, 21, 'امین شهر', 'امین-شهر', 1, NULL, NULL, NULL),
(743, 21, 'انار', 'انار', 1, NULL, NULL, NULL),
(744, 21, 'اندوهجرد', 'اندوهجرد', 1, NULL, NULL, NULL),
(745, 21, 'باغین', 'باغین', 1, NULL, NULL, NULL),
(746, 21, 'بافت', 'بافت', 1, NULL, NULL, NULL),
(747, 21, 'بردسیر', 'بردسیر', 1, NULL, NULL, NULL),
(748, 21, 'بروات', 'بروات', 1, NULL, NULL, NULL),
(749, 21, 'بزنجان', 'بزنجان', 1, NULL, NULL, NULL),
(750, 21, 'بم', 'بم', 1, NULL, NULL, NULL),
(751, 21, 'بهرمان', 'بهرمان', 1, NULL, NULL, NULL),
(752, 21, 'پاریز', 'پاریز', 1, NULL, NULL, NULL),
(753, 21, 'جبالبارز', 'جبالبارز', 1, NULL, NULL, NULL),
(754, 21, 'جوپار', 'جوپار', 1, NULL, NULL, NULL),
(755, 21, 'جوزم', 'جوزم', 1, NULL, NULL, NULL),
(756, 21, 'جیرفت', 'جیرفت', 1, NULL, NULL, NULL),
(757, 21, 'چترود', 'چترود', 1, NULL, NULL, NULL),
(758, 21, 'خاتون آباد', 'خاتون-آباد', 1, NULL, NULL, NULL),
(759, 21, 'خانوک', 'خانوک', 1, NULL, NULL, NULL),
(760, 21, 'خورسند', 'خورسند', 1, NULL, NULL, NULL),
(761, 21, 'درب بهشت', 'درب-بهشت', 1, NULL, NULL, NULL),
(762, 21, 'دهج', 'دهج', 1, NULL, NULL, NULL),
(763, 21, 'رابر', 'رابر', 1, NULL, NULL, NULL),
(764, 21, 'راور', 'راور', 1, NULL, NULL, NULL),
(765, 21, 'راین', 'راین', 1, NULL, NULL, NULL),
(766, 21, 'رفسنجان', 'رفسنجان', 1, NULL, NULL, NULL),
(767, 21, 'رودبار', 'کرمان-رودبار', 1, NULL, NULL, NULL),
(768, 21, 'ریحان شهر', 'ریحان-شهر', 1, NULL, NULL, NULL),
(769, 21, 'زرند', 'زرند', 1, NULL, NULL, NULL),
(770, 21, 'زنگی آباد', 'زنگی-آباد', 1, NULL, NULL, NULL),
(771, 21, 'زیدآباد', 'زیدآباد', 1, NULL, NULL, NULL),
(772, 21, 'سیرجان', 'سیرجان', 1, NULL, NULL, NULL),
(773, 21, 'شهداد', 'شهداد', 1, NULL, NULL, NULL),
(774, 21, 'شهربابک', 'شهربابک', 1, NULL, NULL, NULL),
(775, 21, 'صفائیه', 'صفائیه', 1, NULL, NULL, NULL),
(776, 21, 'عنبرآباد', 'عنبرآباد', 1, NULL, NULL, NULL),
(777, 21, 'فاریاب', 'فاریاب', 1, NULL, NULL, NULL),
(778, 21, 'فهرج', 'فهرج', 1, NULL, NULL, NULL),
(779, 21, 'قلعه گنج', 'قلعه-گنج', 1, NULL, NULL, NULL),
(780, 21, 'کاظم آباد', 'کاظم-آباد', 1, NULL, NULL, NULL),
(781, 21, 'کرمان', 'کرمان', 1, NULL, NULL, NULL),
(782, 21, 'کشکوئیه', 'کشکوئیه', 1, NULL, NULL, NULL),
(783, 21, 'کهنوج', 'کهنوج', 1, NULL, NULL, NULL),
(784, 21, 'کوهبنان', 'کوهبنان', 1, NULL, NULL, NULL),
(785, 21, 'کیانشهر', 'کیانشهر', 1, NULL, NULL, NULL),
(786, 21, 'گلباف', 'گلباف', 1, NULL, NULL, NULL),
(787, 21, 'گلزار', 'گلزار', 1, NULL, NULL, NULL),
(788, 21, 'لاله زار', 'لاله-زار', 1, NULL, NULL, NULL),
(789, 21, 'ماهان', 'ماهان', 1, NULL, NULL, NULL),
(790, 21, 'محمدآباد', 'کرمان-محمدآباد', 1, NULL, NULL, NULL),
(791, 21, 'محی آباد', 'محی-آباد', 1, NULL, NULL, NULL),
(792, 21, 'مردهک', 'مردهک', 1, NULL, NULL, NULL),
(793, 21, 'مس سرچشمه', 'مس-سرچشمه', 1, NULL, NULL, NULL),
(794, 21, 'منوجان', 'منوجان', 1, NULL, NULL, NULL),
(795, 21, 'نجف شهر', 'نجف-شهر', 1, NULL, NULL, NULL),
(796, 21, 'نرماشیر', 'نرماشیر', 1, NULL, NULL, NULL),
(797, 21, 'نظام شهر', 'نظام-شهر', 1, NULL, NULL, NULL),
(798, 21, 'نگار', 'نگار', 1, NULL, NULL, NULL),
(799, 21, 'نودژ', 'نودژ', 1, NULL, NULL, NULL),
(800, 21, 'هجدک', 'هجدک', 1, NULL, NULL, NULL),
(801, 21, 'یزدان شهر', 'یزدان-شهر', 1, NULL, NULL, NULL),
(802, 22, 'ازگله', 'ازگله', 1, NULL, NULL, NULL),
(803, 22, 'اسلام آباد غرب', 'اسلام-آباد-غرب', 1, NULL, NULL, NULL),
(804, 22, 'باینگان', 'باینگان', 1, NULL, NULL, NULL),
(805, 22, 'بیستون', 'بیستون', 1, NULL, NULL, NULL),
(806, 22, 'پاوه', 'پاوه', 1, NULL, NULL, NULL),
(807, 22, 'تازه آباد', 'تازه-آباد', 1, NULL, NULL, NULL),
(808, 22, 'جوان رود', 'جوان-رود', 1, NULL, NULL, NULL),
(809, 22, 'حمیل', 'حمیل', 1, NULL, NULL, NULL),
(810, 22, 'ماهیدشت', 'ماهیدشت', 1, NULL, NULL, NULL),
(811, 22, 'روانسر', 'روانسر', 1, NULL, NULL, NULL),
(812, 22, 'سرپل ذهاب', 'سرپل-ذهاب', 1, NULL, NULL, NULL),
(813, 22, 'سرمست', 'سرمست', 1, NULL, NULL, NULL),
(814, 22, 'سطر', 'سطر', 1, NULL, NULL, NULL),
(815, 22, 'سنقر', 'سنقر', 1, NULL, NULL, NULL),
(816, 22, 'سومار', 'سومار', 1, NULL, NULL, NULL),
(817, 22, 'شاهو', 'شاهو', 1, NULL, NULL, NULL),
(818, 22, 'صحنه', 'صحنه', 1, NULL, NULL, NULL),
(819, 22, 'قصرشیرین', 'قصرشیرین', 1, NULL, NULL, NULL),
(820, 22, 'کرمانشاه', 'کرمانشاه', 1, NULL, NULL, NULL),
(821, 22, 'کرندغرب', 'کرندغرب', 1, NULL, NULL, NULL),
(822, 22, 'کنگاور', 'کنگاور', 1, NULL, NULL, NULL),
(823, 22, 'کوزران', 'کوزران', 1, NULL, NULL, NULL),
(824, 22, 'گهواره', 'گهواره', 1, NULL, NULL, NULL),
(825, 22, 'گیلانغرب', 'گیلانغرب', 1, NULL, NULL, NULL),
(826, 22, 'میان راهان', 'میان-راهان', 1, NULL, NULL, NULL),
(827, 22, 'نودشه', 'نودشه', 1, NULL, NULL, NULL),
(828, 22, 'نوسود', 'نوسود', 1, NULL, NULL, NULL),
(829, 22, 'هرسین', 'هرسین', 1, NULL, NULL, NULL),
(830, 22, 'هلشی', 'هلشی', 1, NULL, NULL, NULL),
(831, 23, 'باشت', 'باشت', 1, NULL, NULL, NULL),
(832, 23, 'پاتاوه', 'پاتاوه', 1, NULL, NULL, NULL),
(833, 23, 'چرام', 'چرام', 1, NULL, NULL, NULL),
(834, 23, 'چیتاب', 'چیتاب', 1, NULL, NULL, NULL),
(835, 23, 'دهدشت', 'دهدشت', 1, NULL, NULL, NULL),
(836, 23, 'دوگنبدان', 'دوگنبدان', 1, NULL, NULL, NULL),
(837, 23, 'دیشموک', 'دیشموک', 1, NULL, NULL, NULL),
(838, 23, 'سوق', 'سوق', 1, NULL, NULL, NULL),
(839, 23, 'سی سخت', 'سی-سخت', 1, NULL, NULL, NULL),
(840, 23, 'قلعه رئیسی', 'قلعه-رئیسی', 1, NULL, NULL, NULL),
(841, 23, 'گراب سفلی', 'گراب-سفلی', 1, NULL, NULL, NULL),
(842, 23, 'لنده', 'لنده', 1, NULL, NULL, NULL),
(843, 23, 'لیکک', 'لیکک', 1, NULL, NULL, NULL),
(844, 23, 'مادوان', 'مادوان', 1, NULL, NULL, NULL),
(845, 23, 'مارگون', 'مارگون', 1, NULL, NULL, NULL),
(846, 23, 'یاسوج', 'یاسوج', 1, NULL, NULL, NULL),
(847, 24, 'انبارآلوم', 'انبارآلوم', 1, NULL, NULL, NULL),
(848, 24, 'اینچه برون', 'اینچه-برون', 1, NULL, NULL, NULL),
(849, 24, 'آزادشهر', 'آزادشهر', 1, NULL, NULL, NULL),
(850, 24, 'آق قلا', 'آق-قلا', 1, NULL, NULL, NULL),
(851, 24, 'بندرترکمن', 'بندرترکمن', 1, NULL, NULL, NULL),
(852, 24, 'بندرگز', 'بندرگز', 1, NULL, NULL, NULL),
(853, 24, 'جلین', 'جلین', 1, NULL, NULL, NULL),
(854, 24, 'خان ببین', 'خان-ببین', 1, NULL, NULL, NULL),
(855, 24, 'دلند', 'دلند', 1, NULL, NULL, NULL),
(856, 24, 'رامیان', 'رامیان', 1, NULL, NULL, NULL),
(857, 24, 'سرخنکلاته', 'سرخنکلاته', 1, NULL, NULL, NULL),
(858, 24, 'سیمین شهر', 'سیمین-شهر', 1, NULL, NULL, NULL),
(859, 24, 'علی آباد کتول', 'علی-آباد-کتول', 1, NULL, NULL, NULL),
(860, 24, 'فاضل آباد', 'فاضل-آباد', 1, NULL, NULL, NULL),
(861, 24, 'کردکوی', 'کردکوی', 1, NULL, NULL, NULL),
(862, 24, 'کلاله', 'کلاله', 1, NULL, NULL, NULL),
(863, 24, 'گالیکش', 'گالیکش', 1, NULL, NULL, NULL),
(864, 24, 'گرگان', 'گرگان', 1, NULL, NULL, NULL),
(865, 24, 'گمیش تپه', 'گمیش-تپه', 1, NULL, NULL, NULL),
(866, 24, 'گنبدکاووس', 'گنبدکاووس', 1, NULL, NULL, NULL),
(867, 24, 'مراوه', 'مراوه', 1, NULL, NULL, NULL),
(868, 24, 'مینودشت', 'مینودشت', 1, NULL, NULL, NULL),
(869, 24, 'نگین شهر', 'نگین-شهر', 1, NULL, NULL, NULL),
(870, 24, 'نوده خاندوز', 'نوده-خاندوز', 1, NULL, NULL, NULL),
(871, 24, 'نوکنده', 'نوکنده', 1, NULL, NULL, NULL),
(872, 25, 'ازنا', 'ازنا', 1, NULL, NULL, NULL),
(873, 25, 'اشترینان', 'اشترینان', 1, NULL, NULL, NULL),
(874, 25, 'الشتر', 'الشتر', 1, NULL, NULL, NULL),
(875, 25, 'الیگودرز', 'الیگودرز', 1, NULL, NULL, NULL),
(876, 25, 'بروجرد', 'بروجرد', 1, NULL, NULL, NULL),
(877, 25, 'پلدختر', 'پلدختر', 1, NULL, NULL, NULL),
(878, 25, 'چالانچولان', 'چالانچولان', 1, NULL, NULL, NULL),
(879, 25, 'چغلوندی', 'چغلوندی', 1, NULL, NULL, NULL),
(880, 25, 'چقابل', 'چقابل', 1, NULL, NULL, NULL),
(881, 25, 'خرم آباد', 'لرستان-خرم-آباد', 1, NULL, NULL, NULL),
(882, 25, 'درب گنبد', 'درب-گنبد', 1, NULL, NULL, NULL),
(883, 25, 'دورود', 'دورود', 1, NULL, NULL, NULL),
(884, 25, 'زاغه', 'زاغه', 1, NULL, NULL, NULL),
(885, 25, 'سپیددشت', 'سپیددشت', 1, NULL, NULL, NULL),
(886, 25, 'سراب دوره', 'سراب-دوره', 1, NULL, NULL, NULL),
(887, 25, 'فیروزآباد', 'لرستان-فیروزآباد', 1, NULL, NULL, NULL),
(888, 25, 'کونانی', 'کونانی', 1, NULL, NULL, NULL),
(889, 25, 'کوهدشت', 'کوهدشت', 1, NULL, NULL, NULL),
(890, 25, 'گراب', 'گراب', 1, NULL, NULL, NULL),
(891, 25, 'معمولان', 'معمولان', 1, NULL, NULL, NULL),
(892, 25, 'مومن آباد', 'مومن-آباد', 1, NULL, NULL, NULL),
(893, 25, 'نورآباد', 'لرستان-نورآباد', 1, NULL, NULL, NULL),
(894, 25, 'ویسیان', 'ویسیان', 1, NULL, NULL, NULL),
(895, 26, 'احمدسرگوراب', 'احمدسرگوراب', 1, NULL, NULL, NULL),
(896, 26, 'اسالم', 'اسالم', 1, NULL, NULL, NULL),
(897, 26, 'اطاقور', 'اطاقور', 1, NULL, NULL, NULL),
(898, 26, 'املش', 'املش', 1, NULL, NULL, NULL),
(899, 26, 'آستارا', 'آستارا', 1, NULL, NULL, NULL),
(900, 26, 'آستانه اشرفیه', 'آستانه-اشرفیه', 1, NULL, NULL, NULL),
(901, 26, 'بازار جمعه', 'بازار-جمعه', 1, NULL, NULL, NULL),
(902, 26, 'بره سر', 'بره-سر', 1, NULL, NULL, NULL),
(903, 26, 'بندرانزلی', 'بندرانزلی', 1, NULL, NULL, NULL),
(906, 26, 'پره سر', 'پره-سر', 1, NULL, NULL, NULL),
(907, 26, 'تالش', 'تالش', 1, NULL, NULL, NULL),
(908, 26, 'توتکابن', 'توتکابن', 1, NULL, NULL, NULL),
(909, 26, 'جیرنده', 'جیرنده', 1, NULL, NULL, NULL),
(910, 26, 'چابکسر', 'چابکسر', 1, NULL, NULL, NULL),
(911, 26, 'چاف و چمخاله', 'چاف-و-چمخاله', 1, NULL, NULL, NULL),
(912, 26, 'چوبر', 'چوبر', 1, NULL, NULL, NULL),
(913, 26, 'حویق', 'حویق', 1, NULL, NULL, NULL),
(914, 26, 'خشکبیجار', 'خشکبیجار', 1, NULL, NULL, NULL),
(915, 26, 'خمام', 'خمام', 1, NULL, NULL, NULL),
(916, 26, 'دیلمان', 'دیلمان', 1, NULL, NULL, NULL),
(917, 26, 'رانکوه', 'رانکوه', 1, NULL, NULL, NULL),
(918, 26, 'رحیم آباد', 'رحیم-آباد', 1, NULL, NULL, NULL),
(919, 26, 'رستم آباد', 'رستم-آباد', 1, NULL, NULL, NULL),
(920, 26, 'رشت', 'رشت', 1, NULL, NULL, NULL),
(921, 26, 'رضوانشهر', 'گیلان-رضوانشهر', 1, NULL, NULL, NULL),
(922, 26, 'رودبار', 'گیلان-رودبار', 1, NULL, NULL, NULL),
(923, 26, 'رودبنه', 'رودبنه', 1, NULL, NULL, NULL),
(924, 26, 'رودسر', 'رودسر', 1, NULL, NULL, NULL),
(925, 26, 'سنگر', 'سنگر', 1, NULL, NULL, NULL),
(926, 26, 'سیاهکل', 'سیاهکل', 1, NULL, NULL, NULL),
(927, 26, 'شفت', 'شفت', 1, NULL, NULL, NULL),
(928, 26, 'شلمان', 'شلمان', 1, NULL, NULL, NULL),
(929, 26, 'صومعه سرا', 'صومعه-سرا', 1, NULL, NULL, NULL),
(930, 26, 'فومن', 'فومن', 1, NULL, NULL, NULL),
(931, 26, 'کلاچای', 'کلاچای', 1, NULL, NULL, NULL),
(932, 26, 'کوچصفهان', 'کوچصفهان', 1, NULL, NULL, NULL),
(933, 26, 'کومله', 'کومله', 1, NULL, NULL, NULL),
(934, 26, 'کیاشهر', 'کیاشهر', 1, NULL, NULL, NULL),
(935, 26, 'گوراب زرمیخ', 'گوراب-زرمیخ', 1, NULL, NULL, NULL),
(936, 26, 'لاهیجان', 'لاهیجان', 1, NULL, NULL, NULL),
(937, 26, 'لشت نشا', 'لشت-نشا', 1, NULL, NULL, NULL),
(938, 26, 'لنگرود', 'لنگرود', 1, NULL, NULL, NULL),
(939, 26, 'لوشان', 'لوشان', 1, NULL, NULL, NULL),
(940, 26, 'لولمان', 'لولمان', 1, NULL, NULL, NULL),
(941, 26, 'لوندویل', 'لوندویل', 1, NULL, NULL, NULL),
(942, 26, 'لیسار', 'لیسار', 1, NULL, NULL, NULL),
(943, 26, 'ماسال', 'ماسال', 1, NULL, NULL, NULL),
(944, 26, 'ماسوله', 'ماسوله', 1, NULL, NULL, NULL),
(945, 26, 'مرجقل', 'مرجقل', 1, NULL, NULL, NULL),
(946, 26, 'منجیل', 'منجیل', 1, NULL, NULL, NULL),
(947, 26, 'واجارگاه', 'واجارگاه', 1, NULL, NULL, NULL),
(948, 27, 'امیرکلا', 'امیرکلا', 1, NULL, NULL, NULL),
(949, 27, 'ایزدشهر', 'ایزدشهر', 1, NULL, NULL, NULL),
(950, 27, 'آلاشت', 'آلاشت', 1, NULL, NULL, NULL),
(951, 27, 'آمل', 'آمل', 1, NULL, NULL, NULL),
(952, 27, 'بابل', 'بابل', 1, NULL, NULL, NULL),
(953, 27, 'بابلسر', 'بابلسر', 1, NULL, NULL, NULL),
(954, 27, 'بلده', 'مازندران-بلده', 1, NULL, NULL, NULL),
(955, 27, 'بهشهر', 'بهشهر', 1, NULL, NULL, NULL),
(956, 27, 'بهنمیر', 'بهنمیر', 1, NULL, NULL, NULL),
(957, 27, 'پل سفید', 'پل-سفید', 1, NULL, NULL, NULL),
(958, 27, 'تنکابن', 'تنکابن', 1, NULL, NULL, NULL),
(959, 27, 'جویبار', 'جویبار', 1, NULL, NULL, NULL),
(960, 27, 'چالوس', 'چالوس', 1, NULL, NULL, NULL),
(961, 27, 'چمستان', 'چمستان', 1, NULL, NULL, NULL),
(962, 27, 'خرم آباد', 'مازندران-خرم-آباد', 1, NULL, NULL, NULL),
(963, 27, 'خلیل شهر', 'خلیل-شهر', 1, NULL, NULL, NULL),
(964, 27, 'خوش رودپی', 'خوش-رودپی', 1, NULL, NULL, NULL),
(965, 27, 'دابودشت', 'دابودشت', 1, NULL, NULL, NULL),
(966, 27, 'رامسر', 'رامسر', 1, NULL, NULL, NULL),
(967, 27, 'رستمکلا', 'رستمکلا', 1, NULL, NULL, NULL),
(968, 27, 'رویان', 'رویان', 1, NULL, NULL, NULL),
(969, 27, 'رینه', 'رینه', 1, NULL, NULL, NULL),
(970, 27, 'زرگرمحله', 'زرگرمحله', 1, NULL, NULL, NULL),
(971, 27, 'زیرآب', 'زیرآب', 1, NULL, NULL, NULL),
(972, 27, 'ساری', 'ساری', 1, NULL, NULL, NULL),
(973, 27, 'سرخرود', 'سرخرود', 1, NULL, NULL, NULL),
(974, 27, 'سلمان شهر', 'سلمان-شهر', 1, NULL, NULL, NULL),
(975, 27, 'سورک', 'سورک', 1, NULL, NULL, NULL),
(976, 27, 'شیرگاه', 'شیرگاه', 1, NULL, NULL, NULL),
(977, 27, 'شیرود', 'شیرود', 1, NULL, NULL, NULL),
(978, 27, 'عباس آباد', 'عباس-آباد', 1, NULL, NULL, NULL),
(979, 27, 'فریدونکنار', 'فریدونکنار', 1, NULL, NULL, NULL),
(980, 27, 'فریم', 'فریم', 1, NULL, NULL, NULL),
(981, 27, 'قائم شهر', 'قائم-شهر', 1, NULL, NULL, NULL),
(982, 27, 'کتالم', 'کتالم', 1, NULL, NULL, NULL),
(983, 27, 'کلارآباد', 'کلارآباد', 1, NULL, NULL, NULL),
(984, 27, 'کلاردشت', 'کلاردشت', 1, NULL, NULL, NULL),
(985, 27, 'کله بست', 'کله-بست', 1, NULL, NULL, NULL),
(986, 27, 'کوهی خیل', 'کوهی-خیل', 1, NULL, NULL, NULL),
(987, 27, 'کیاسر', 'کیاسر', 1, NULL, NULL, NULL),
(988, 27, 'کیاکلا', 'کیاکلا', 1, NULL, NULL, NULL),
(989, 27, 'گتاب', 'گتاب', 1, NULL, NULL, NULL),
(990, 27, 'گزنک', 'گزنک', 1, NULL, NULL, NULL),
(991, 27, 'گلوگاه', 'گلوگاه', 1, NULL, NULL, NULL),
(992, 27, 'محمودآباد', 'مازندران-محمودآباد', 1, NULL, NULL, NULL),
(993, 27, 'مرزن آباد', 'مرزن-آباد', 1, NULL, NULL, NULL),
(994, 27, 'مرزیکلا', 'مرزیکلا', 1, NULL, NULL, NULL),
(995, 27, 'نشتارود', 'نشتارود', 1, NULL, NULL, NULL),
(996, 27, 'نکا', 'نکا', 1, NULL, NULL, NULL),
(997, 27, 'نور', 'نور', 1, NULL, NULL, NULL);
INSERT INTO `cities` (`id`, `province_id`, `name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(998, 27, 'نوشهر', 'نوشهر', 1, NULL, NULL, NULL),
(999, 28, 'اراک', 'اراک', 1, NULL, NULL, NULL),
(1000, 28, 'آستانه', 'آستانه', 1, NULL, NULL, NULL),
(1001, 28, 'آشتیان', 'آشتیان', 1, NULL, NULL, NULL),
(1002, 28, 'پرندک', 'پرندک', 1, NULL, NULL, NULL),
(1003, 28, 'تفرش', 'تفرش', 1, NULL, NULL, NULL),
(1004, 28, 'توره', 'توره', 1, NULL, NULL, NULL),
(1005, 28, 'جاورسیان', 'جاورسیان', 1, NULL, NULL, NULL),
(1006, 28, 'خشکرود', 'خشکرود', 1, NULL, NULL, NULL),
(1007, 28, 'خمین', 'خمین', 1, NULL, NULL, NULL),
(1008, 28, 'خنداب', 'خنداب', 1, NULL, NULL, NULL),
(1009, 28, 'داودآباد', 'داودآباد', 1, NULL, NULL, NULL),
(1010, 28, 'دلیجان', 'دلیجان', 1, NULL, NULL, NULL),
(1011, 28, 'رازقان', 'رازقان', 1, NULL, NULL, NULL),
(1012, 28, 'زاویه', 'زاویه', 1, NULL, NULL, NULL),
(1013, 28, 'ساروق', 'ساروق', 1, NULL, NULL, NULL),
(1014, 28, 'ساوه', 'ساوه', 1, NULL, NULL, NULL),
(1015, 28, 'سنجان', 'سنجان', 1, NULL, NULL, NULL),
(1016, 28, 'شازند', 'شازند', 1, NULL, NULL, NULL),
(1017, 28, 'غرق آباد', 'غرق-آباد', 1, NULL, NULL, NULL),
(1018, 28, 'فرمهین', 'فرمهین', 1, NULL, NULL, NULL),
(1019, 28, 'قورچی باشی', 'قورچی-باشی', 1, NULL, NULL, NULL),
(1020, 28, 'کرهرود', 'کرهرود', 1, NULL, NULL, NULL),
(1021, 28, 'کمیجان', 'کمیجان', 1, NULL, NULL, NULL),
(1022, 28, 'مامونیه', 'مامونیه', 1, NULL, NULL, NULL),
(1023, 28, 'محلات', 'محلات', 1, NULL, NULL, NULL),
(1024, 28, 'مهاجران', 'مهاجران', 1, NULL, NULL, NULL),
(1025, 28, 'میلاجرد', 'میلاجرد', 1, NULL, NULL, NULL),
(1026, 28, 'نراق', 'نراق', 1, NULL, NULL, NULL),
(1027, 28, 'نوبران', 'نوبران', 1, NULL, NULL, NULL),
(1028, 28, 'نیمور', 'نیمور', 1, NULL, NULL, NULL),
(1029, 28, 'هندودر', 'هندودر', 1, NULL, NULL, NULL),
(1030, 29, 'ابوموسی', 'ابوموسی', 1, NULL, NULL, NULL),
(1031, 29, 'بستک', 'بستک', 1, NULL, NULL, NULL),
(1032, 29, 'بندرجاسک', 'بندرجاسک', 1, NULL, NULL, NULL),
(1033, 29, 'بندرچارک', 'بندرچارک', 1, NULL, NULL, NULL),
(1034, 29, 'بندرخمیر', 'بندرخمیر', 1, NULL, NULL, NULL),
(1035, 29, 'بندرعباس', 'بندرعباس', 1, NULL, NULL, NULL),
(1036, 29, 'بندرلنگه', 'بندرلنگه', 1, NULL, NULL, NULL),
(1037, 29, 'بیکا', 'بیکا', 1, NULL, NULL, NULL),
(1038, 29, 'پارسیان', 'پارسیان', 1, NULL, NULL, NULL),
(1039, 29, 'تخت', 'تخت', 1, NULL, NULL, NULL),
(1040, 29, 'جناح', 'جناح', 1, NULL, NULL, NULL),
(1041, 29, 'حاجی آباد', 'هرمزگان-حاجی-آباد', 1, NULL, NULL, NULL),
(1042, 29, 'درگهان', 'درگهان', 1, NULL, NULL, NULL),
(1043, 29, 'دهبارز', 'دهبارز', 1, NULL, NULL, NULL),
(1044, 29, 'رویدر', 'رویدر', 1, NULL, NULL, NULL),
(1045, 29, 'زیارتعلی', 'زیارتعلی', 1, NULL, NULL, NULL),
(1046, 29, 'سردشت', 'هرمزگان-سردشت', 1, NULL, NULL, NULL),
(1047, 29, 'سندرک', 'سندرک', 1, NULL, NULL, NULL),
(1048, 29, 'سوزا', 'سوزا', 1, NULL, NULL, NULL),
(1049, 29, 'سیریک', 'سیریک', 1, NULL, NULL, NULL),
(1050, 29, 'فارغان', 'فارغان', 1, NULL, NULL, NULL),
(1051, 29, 'فین', 'فین', 1, NULL, NULL, NULL),
(1052, 29, 'قشم', 'قشم', 1, NULL, NULL, NULL),
(1053, 29, 'قلعه قاضی', 'قلعه-قاضی', 1, NULL, NULL, NULL),
(1054, 29, 'کنگ', 'کنگ', 1, NULL, NULL, NULL),
(1055, 29, 'کوشکنار', 'کوشکنار', 1, NULL, NULL, NULL),
(1056, 29, 'کیش', 'کیش', 1, NULL, NULL, NULL),
(1057, 29, 'گوهران', 'گوهران', 1, NULL, NULL, NULL),
(1058, 29, 'میناب', 'میناب', 1, NULL, NULL, NULL),
(1059, 29, 'هرمز', 'هرمز', 1, NULL, NULL, NULL),
(1060, 29, 'هشتبندی', 'هشتبندی', 1, NULL, NULL, NULL),
(1061, 30, 'ازندریان', 'ازندریان', 1, NULL, NULL, NULL),
(1062, 30, 'اسدآباد', 'اسدآباد', 1, NULL, NULL, NULL),
(1063, 30, 'برزول', 'برزول', 1, NULL, NULL, NULL),
(1064, 30, 'بهار', 'بهار', 1, NULL, NULL, NULL),
(1065, 30, 'تویسرکان', 'تویسرکان', 1, NULL, NULL, NULL),
(1066, 30, 'جورقان', 'جورقان', 1, NULL, NULL, NULL),
(1067, 30, 'جوکار', 'جوکار', 1, NULL, NULL, NULL),
(1068, 30, 'دمق', 'دمق', 1, NULL, NULL, NULL),
(1069, 30, 'رزن', 'رزن', 1, NULL, NULL, NULL),
(1070, 30, 'زنگنه', 'زنگنه', 1, NULL, NULL, NULL),
(1071, 30, 'سامن', 'سامن', 1, NULL, NULL, NULL),
(1072, 30, 'سرکان', 'سرکان', 1, NULL, NULL, NULL),
(1073, 30, 'شیرین سو', 'شیرین-سو', 1, NULL, NULL, NULL),
(1074, 30, 'صالح آباد', 'همدان-صالح-آباد', 1, NULL, NULL, NULL),
(1075, 30, 'فامنین', 'فامنین', 1, NULL, NULL, NULL),
(1076, 30, 'فرسفج', 'فرسفج', 1, NULL, NULL, NULL),
(1077, 30, 'فیروزان', 'فیروزان', 1, NULL, NULL, NULL),
(1078, 30, 'قروه درجزین', 'قروه-درجزین', 1, NULL, NULL, NULL),
(1079, 30, 'قهاوند', 'قهاوند', 1, NULL, NULL, NULL),
(1080, 30, 'کبودر آهنگ', 'کبودر-آهنگ', 1, NULL, NULL, NULL),
(1081, 30, 'گل تپه', 'گل-تپه', 1, NULL, NULL, NULL),
(1082, 30, 'گیان', 'گیان', 1, NULL, NULL, NULL),
(1083, 30, 'لالجین', 'لالجین', 1, NULL, NULL, NULL),
(1084, 30, 'مریانج', 'مریانج', 1, NULL, NULL, NULL),
(1085, 30, 'ملایر', 'ملایر', 1, NULL, NULL, NULL),
(1086, 30, 'نهاوند', 'نهاوند', 1, NULL, NULL, NULL),
(1087, 30, 'همدان', 'همدان', 1, NULL, NULL, NULL),
(1088, 31, 'ابرکوه', 'ابرکوه', 1, NULL, NULL, NULL),
(1089, 31, 'احمدآباد', 'احمدآباد', 1, NULL, NULL, NULL),
(1090, 31, 'اردکان', 'یزد-اردکان', 1, NULL, NULL, NULL),
(1091, 31, 'اشکذر', 'اشکذر', 1, NULL, NULL, NULL),
(1092, 31, 'بافق', 'بافق', 1, NULL, NULL, NULL),
(1093, 31, 'بفروئیه', 'بفروئیه', 1, NULL, NULL, NULL),
(1094, 31, 'بهاباد', 'بهاباد', 1, NULL, NULL, NULL),
(1095, 31, 'تفت', 'تفت', 1, NULL, NULL, NULL),
(1096, 31, 'حمیدیا', 'حمیدیا', 1, NULL, NULL, NULL),
(1097, 31, 'خضرآباد', 'خضرآباد', 1, NULL, NULL, NULL),
(1098, 31, 'دیهوک', 'دیهوک', 1, NULL, NULL, NULL),
(1099, 31, 'زارچ', 'زارچ', 1, NULL, NULL, NULL),
(1100, 31, 'شاهدیه', 'شاهدیه', 1, NULL, NULL, NULL),
(1101, 31, 'طبس', 'یزد-طبس', 1, NULL, NULL, NULL),
(1103, 31, 'عقدا', 'عقدا', 1, NULL, NULL, NULL),
(1104, 31, 'مروست', 'مروست', 1, NULL, NULL, NULL),
(1105, 31, 'مهردشت', 'مهردشت', 1, NULL, NULL, NULL),
(1106, 31, 'مهریز', 'مهریز', 1, NULL, NULL, NULL),
(1107, 31, 'میبد', 'میبد', 1, NULL, NULL, NULL),
(1108, 31, 'ندوشن', 'ندوشن', 1, NULL, NULL, NULL),
(1109, 31, 'نیر', 'یزد-نیر', 1, NULL, NULL, NULL),
(1110, 31, 'هرات', 'هرات', 1, NULL, NULL, NULL),
(1111, 31, 'یزد', 'یزد', 1, NULL, NULL, NULL),
(1116, 8, 'پرند', 'پرند', 1, NULL, NULL, NULL),
(1117, 5, 'فردیس', 'فردیس', 1, NULL, NULL, NULL),
(1118, 5, 'مارلیک', 'مارلیک', 1, NULL, NULL, NULL),
(1119, 27, 'سادات شهر', 'سادات-شهر', 1, NULL, NULL, NULL),
(1121, 26, 'زیباکنار', 'زیباکنار', 1, NULL, NULL, NULL),
(1135, 5, 'کردان', 'کردان', 1, NULL, NULL, NULL),
(1137, 5, 'ساوجبلاغ', 'ساوجبلاغ', 1, NULL, NULL, NULL),
(1138, 5, 'تهران دشت', 'تهران-دشت', 1, NULL, NULL, NULL),
(1150, 11, 'گلبهار', 'گلبهار', 1, NULL, NULL, NULL),
(1153, 8, 'قیامدشت', 'قیامدشت', 1, NULL, NULL, NULL),
(1155, 11, 'بینالود', 'بینالود', 1, NULL, NULL, NULL),
(1159, 26, 'پیربازار', 'پیربازار', 1, NULL, NULL, NULL),
(1160, 31, 'رضوانشهر', 'رضوانشهر', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `answer` text DEFAULT NULL COMMENT 'answer from admin for commenter user',
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `responder_id` bigint(20) UNSIGNED DEFAULT NULL,
  `commentable_id` bigint(20) UNSIGNED NOT NULL,
  `commentable_type` varchar(255) NOT NULL,
  `answershow` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => dont show answer of admin, 1 => show answer of admin',
  `seen` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => unseen and not seen with admins, 1 => seened with admin',
  `approved` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => not approved  with admin , 1 => approved with admin',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `answer_date` timestamp NULL DEFAULT NULL COMMENT 'admin answer date',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `common_discount`
--

CREATE TABLE `common_discount` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `percentage` int(11) NOT NULL,
  `discount_ceiling` bigint(20) UNSIGNED DEFAULT NULL,
  `minimal_order_amount` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compares`
--

CREATE TABLE `compares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compare_product`
--

CREATE TABLE `compare_product` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `compare_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `copans`
--

CREATE TABLE `copans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `amount_type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => percentage, 1 => price unit',
  `discount_ceiling` bigint(20) UNSIGNED DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => common (each user can use one time), 1 => private (one user can use one time)',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` decimal(20,3) DEFAULT NULL,
  `delivery_time` int(11) DEFAULT NULL,
  `delivery_time_unit` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `name`, `amount`, `delivery_time`, `delivery_time_unit`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'پست پیشتاز', 30000.000, 5, 'روز', 1, '2024-01-26 20:56:37', '2024-01-26 20:56:37', NULL);

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qusetion` text NOT NULL,
  `answer` text NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `tags` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guarantees`
--

CREATE TABLE `guarantees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price_increase` decimal(20,3) NOT NULL DEFAULT 0.000,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guarantees`
--

INSERT INTO `guarantees` (`id`, `name`, `product_id`, `price_increase`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'گارانتی ۱۸ ماهه سی تلکام', 1, 100000.000, 1, '2024-01-26 19:04:33', '2024-01-26 19:04:33', NULL),
(2, 'گارانتی ۱۸ ماهه سورین ارتباط بهسا', 3, 200000.000, 1, '2024-01-26 19:39:31', '2024-01-26 19:39:31', NULL),
(3, 'گارانتی ۱۸ ماهه راشا مهر نیکان', 2, 200000.000, 1, '2024-01-26 19:41:22', '2024-01-26 19:41:22', NULL),
(4, 'گارانتی ۱۸ ماهه دیجی کالا سرویس به همراه  بیمه ۱۲ ماهه تجهیزات الکترونیک دیجی پی', 4, 300000.000, 1, '2024-01-26 19:53:38', '2024-01-26 19:53:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `position` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'developer explain 0 or 01 ... in Admin\\Content\\Menu model',
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
(17, 'سوپرمارکت', 'http://127.0.0.1:8000/super-market', 0, 1, 1, NULL, '2024-01-21 07:34:58', '2024-01-21 07:34:58', NULL),
(18, 'تخفیف ها و پیشنهادها', 'http://127.0.0.1:8000/products?sort=47', 0, 1, 2, NULL, '2024-01-21 07:48:49', '2024-01-21 07:53:29', NULL),
(19, 'درباره ما', 'http://127.0.0.1:8000/page/about-us', 0, 1, 3, NULL, '2024-01-21 07:57:09', '2024-01-21 07:57:09', NULL),
(20, 'فروشنده شوید', 'http://127.0.0.1:8000/page/seller-introduction/', 0, 1, 4, NULL, '2024-01-21 07:58:23', '2024-01-21 07:58:23', NULL),
(21, 'شرایط و قوانین', 'http://127.0.0.1:8000/page/rules', 1, 1, 1, NULL, '2024-01-21 08:18:40', '2024-01-21 08:18:40', NULL),
(22, 'درباره ما', 'http://127.0.0.1:8000/page/about-us', 1, 1, 2, NULL, '2024-01-21 08:19:05', '2024-01-21 08:19:05', NULL),
(23, 'تماس با ما', 'http://127.0.0.1:8000/contact-us', 1, 1, 3, NULL, '2024-01-21 08:19:35', '2024-01-21 08:19:35', NULL),
(24, 'فروشنده شوید', 'http://127.0.0.1:8000/page/seller-introduction/', 1, 1, 4, NULL, '2024-01-21 08:20:37', '2024-01-21 08:20:37', NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_11_28_155209_create_sessions_table', 1),
(7, '2023_11_28_163446_create_post_categories_table', 1),
(8, '2023_11_28_163901_create_posts_table', 1),
(9, '2023_11_28_171010_create_menus_table', 1),
(10, '2023_11_28_171322_create_faqs_table', 1),
(11, '2023_11_28_171930_create_pages_table', 1),
(12, '2023_11_28_172153_create_comments_table', 1),
(13, '2023_11_28_173600_create_ticket_categories_table', 1),
(14, '2023_11_28_173636_create_ticket_priorities_table', 1),
(15, '2023_11_28_173703_create_ticket_admins_table', 1),
(16, '2023_11_28_174816_create_tickets_table', 1),
(17, '2023_11_28_174918_create_ticket_files_table', 1),
(18, '2023_11_29_072809_create_roles_table', 1),
(19, '2023_11_29_073126_create_permissions_table', 1),
(20, '2023_11_29_073706_create_permission_role_table', 1),
(21, '2023_11_29_073749_create_role_user_table', 1),
(22, '2023_11_29_084941_create_product_categories_table', 1),
(23, '2023_11_29_085020_create_brands_table', 1),
(24, '2023_11_29_095553_create_category_attributes_table', 1),
(25, '2023_11_29_101416_create_category_attribute_default_values_table', 1),
(26, '2023_11_29_101444_create_products_table', 1),
(27, '2023_11_29_144836_create_product_images_table', 1),
(28, '2023_11_29_145006_create_guarantees_table', 1),
(29, '2023_11_29_151626_create_product_colors_table', 1),
(30, '2023_11_29_151708_create_category_values_table', 1),
(31, '2023_11_29_151810_create_product_meta_table', 1),
(32, '2023_11_29_155443_create_copans_table', 1),
(33, '2023_11_29_155512_create_amazing_sales_table', 1),
(34, '2023_11_29_155557_create_common_discount_table', 1),
(35, '2023_11_29_161237_create_provinces_table', 1),
(36, '2023_11_29_161314_create_cities_table', 1),
(37, '2023_11_29_161353_create_addresses_table', 1),
(38, '2023_11_29_161433_create_delivery_table', 1),
(41, '2023_11_29_162801_create_public_sms_table', 2),
(42, '2023_11_29_162826_create_public_mail_table', 2),
(43, '2023_11_29_162859_create_public_mail_files_table', 2),
(44, '2023_11_29_163344_create_product_user_table', 2),
(45, '2023_11_29_164218_create_offline_payments_table', 2),
(46, '2023_11_29_164237_create_online_payments_table', 2),
(47, '2023_11_29_164257_create_cash_payments_table', 2),
(48, '2023_11_29_164327_create_payments_table', 2),
(49, '2023_11_29_172712_create_cart_items_table', 2),
(50, '2023_11_29_172742_create_cart_item_selected_attributes_table', 2),
(51, '2023_11_29_174229_create_orders_table', 2),
(52, '2023_11_29_180309_create_order_items_table', 2),
(53, '2023_11_29_180412_create_order_item_selected_attributes_table', 2),
(54, '2023_12_09_143827_create_settings_table', 2),
(55, '2023_12_24_211056_create_notifications_table', 2),
(56, '2023_12_27_162834_create_otps_table', 2),
(57, '2023_12_27_173848_add_mobile_verified_at_to_users_table', 2),
(58, '2023_12_30_194906_create_banners_table', 2),
(59, '2024_01_09_115508_create_permission_user_table', 2),
(60, '2024_01_12_192421_add_view_to_products_table', 2),
(61, '2024_01_14_112153_create_ratings_table', 2),
(62, '2024_01_15_121751_create_jobs_table', 2),
(63, '2024_01_21_203011_create_compares_table', 2),
(64, '2024_01_21_203325_create_compare_product_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offline_payments`
--

CREATE TABLE `offline_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(20,3) NOT NULL COMMENT 'IR price unit',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `pay_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `online_payments`
--

CREATE TABLE `online_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(20,3) NOT NULL COMMENT 'IR price unit',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `gateway` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `bank_first_response` text DEFAULT NULL,
  `bank_second_response` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address_object` longtext DEFAULT NULL,
  `payment_object` longtext DEFAULT NULL,
  `payment_type` tinyint(4) NOT NULL DEFAULT 0,
  `payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `delivery_id` bigint(20) UNSIGNED DEFAULT NULL,
  `delivery_object` longtext DEFAULT NULL,
  `delivery_amount` decimal(20,3) DEFAULT NULL,
  `delivery_status` tinyint(4) NOT NULL DEFAULT 0,
  `delivery_date` timestamp NULL DEFAULT NULL COMMENT '0 => ارسال نشده , 1 => درحال ارسال , 2 => ارسال شده, 3 => تحویل داده شده',
  `order_final_amount` decimal(20,3) DEFAULT NULL,
  `order_discount_amount` decimal(20,3) DEFAULT NULL,
  `copan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `copan_object` longtext DEFAULT NULL,
  `order_copan_discount_amount` decimal(20,3) DEFAULT NULL,
  `common_discount_id` bigint(20) UNSIGNED DEFAULT NULL,
  `common_discount_object` longtext DEFAULT NULL,
  `order_common_discount_amount` decimal(20,3) DEFAULT NULL,
  `order_total_products_discount_amount` decimal(20,3) DEFAULT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => در انتظار تایید, 1 => تاییده نشده, 2 => تایید شده, 3 => باطل شده, 4 => مرجوع شده',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `products` longtext NOT NULL,
  `amazing_sale_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amazing_sale_object` longtext DEFAULT NULL,
  `amazing_sale_discount_amount` decimal(20,3) NOT NULL COMMENT 'IR price unit',
  `number` int(11) NOT NULL DEFAULT 1,
  `final_product_price` decimal(20,3) NOT NULL,
  `final_total_product_price` decimal(20,3) NOT NULL COMMENT 'number * final_product_price',
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `guarantee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_item_selected_attributes`
--

CREATE TABLE `order_item_selected_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `category_attribute_id` bigint(20) UNSIGNED NOT NULL,
  `category_value_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `otp_code` varchar(255) NOT NULL,
  `login_id` varchar(255) NOT NULL COMMENT 'mobile number or email address',
  `type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '	0 => mobile number 1 => email address',
  `used` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => not used, 1 => used',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `url` varchar(255) DEFAULT NULL COMMENT 'only for save and create slugs',
  `slug` varchar(255) DEFAULT NULL COMMENT 'orginal url for use',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `tags` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(20,3) NOT NULL COMMENT 'IR price unit',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => notPaid, 1 => paid, 2 => cancel, 3 => returned',
  `type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => online, 1 => offline, 2 => cash',
  `paymentable_id` bigint(20) UNSIGNED NOT NULL,
  `paymentable_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `name`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, 'نمایش لیست دسته بندی محصولات', 'view-products-category-list', 'سطح دسترسی برای 	\nنمایش لیست دسته بندی محصولات در پنل', 1, NULL, '2024-01-17 12:36:01', '2024-01-17 13:24:21'),
(9, 'ایجاد دسته بندی محصولات', 'create-product-category', 'سطح دسترسی برای ایجاد دسته بندی محصولات در پنل', 1, NULL, '2024-01-17 13:09:00', '2024-01-17 13:13:56'),
(10, 'ویرایش دسته بندی محصولات', 'edit-product-category', 'سطح دسترسی برای ویرایش دسته بندی محصولات در پنل', 1, NULL, '2024-01-17 13:10:57', '2024-01-17 13:10:57'),
(11, 'حذف دسته بندی محصولات', 'delete-product-category', 'سطح دسترسی برای حذف دسته بندی محصولات در پنل', 1, NULL, '2024-01-17 13:12:42', '2024-01-17 13:12:42'),
(12, 'نمایش لیست فرم کالا', 'view-product-properties-list', 'سطح دسترسی برای 	\nنمایش لیست فرم کالا در پنل', 1, NULL, '2024-01-17 13:24:04', '2024-01-17 13:28:21'),
(13, 'ایجاد فرم کالا', 'create-product-property', 'سطح دسترسی برای ایجاد فرم کالا در پنل', 1, NULL, '2024-01-17 13:25:36', '2024-01-17 13:28:08'),
(14, 'ویرایش فرم کالا', 'edit-product-property', 'سطح دسترسی برای ویرایش فرم کالا در پنل', 1, NULL, '2024-01-17 13:26:24', '2024-01-17 13:27:46'),
(15, 'حذف فرم کالا', 'delete-product-property', 'سطح دسترسی برای حذف فرم کالا در پنل', 1, NULL, '2024-01-17 13:27:34', '2024-01-17 13:28:01'),
(16, 'نمایش لیست مقادیر فرم کالا', 'view-property-values-list', 'سطح دسترسی برای نمایش لیست مقادیر فرم کالا در پنل', 1, NULL, '2024-01-17 13:30:19', '2024-01-17 13:30:19'),
(17, 'ایجاد مقدار فرم کالا', 'create-property-value', 'سطح دسترسی برای ایجاد مقدار فرم کالا در پنل', 1, NULL, '2024-01-17 13:31:17', '2024-01-17 13:31:17'),
(18, 'ویرایش مقدار فرم کالا', 'edit-property-value', 'سطح دسترسی برای ویرایش مقدار فرم کالا در پنل', 1, NULL, '2024-01-17 13:34:29', '2024-01-17 13:34:29'),
(19, 'حذف مقدار فرم کالا', 'delete-property-value', 'سطح دسترسی برای حذف مقدار فرم کالا در پنل', 1, NULL, '2024-01-17 13:38:23', '2024-01-17 13:38:23'),
(20, 'نمایش لیست برندها', 'view-brands-list', 'سطح دسترسی برای نمایش لیست برندها در پنل', 1, NULL, '2024-01-17 13:39:57', '2024-01-17 13:39:57'),
(21, 'ایجاد برند جدید', 'create-brand', 'سطح دسترسی برای ایجاد برند جدید در پنل', 1, NULL, '2024-01-17 13:42:01', '2024-01-17 13:42:01'),
(22, 'ویرایش برند', 'edit-brand', 'سطح دسترسی برای ویرایش برند در  پنل', 1, NULL, '2024-01-17 13:42:46', '2024-01-17 13:42:46'),
(23, 'حذف برند', 'delete-brand', 'سطح دسترسی برای حذف برند در پنل', 1, NULL, '2024-01-17 13:44:39', '2024-01-17 13:44:39'),
(24, 'نمایش لیست کالاها', 'view-products-list', 'سطح دسترسی برای نمایش لسیت کالاها در پنل', 1, NULL, '2024-01-17 13:46:13', '2024-01-17 13:46:13'),
(25, 'ایجاد کالا جدید', 'create-product', 'سطح دسترسی برای ایجاد کالا جدید در پنل', 1, NULL, '2024-01-17 13:47:12', '2024-01-17 13:47:12'),
(26, 'ویرایش کالا', 'edit-product', 'سطح دسترسی برای ویرایش کالا در پنل', 1, NULL, '2024-01-17 13:47:49', '2024-01-17 13:47:49'),
(27, 'حذف کالا', 'delete-product', 'سطح دسترسی برای حذف کالا در پنل', 1, NULL, '2024-01-17 13:48:27', '2024-01-17 13:48:27'),
(28, 'نمایش لیست گالری کالا', 'view-product-gallerys-list', 'سطح دسترسی برای نمایش لیست گالری کالا در پنل', 1, NULL, '2024-01-17 13:50:55', '2024-01-17 13:50:55'),
(29, 'ایجاد تصویر جدید در گالری کالا', 'create-gallery', 'سطح دسترسی برای ایجاد تصویر جدید در گالری کالا در پنل', 1, NULL, '2024-01-17 13:53:07', '2024-01-17 13:53:07'),
(30, 'حذف تصویر از گالری کالا', 'delete-gallery', 'سطح دسترسی برای حذف تصویر از گالری کالا در پنل', 1, NULL, '2024-01-17 13:54:26', '2024-01-17 13:54:26'),
(31, 'مشاهده لیست گارانتی های کالا', 'view-guarantees-list', 'سطح دسترسی برای مشاهده لیست گارانتی های کالا در پنل', 1, NULL, '2024-01-17 13:55:29', '2024-01-17 13:55:29'),
(32, 'ایجاد گارانتی جدید کالا', 'create-guarantee', 'سطح دسترسی برای ایجاد گارانتی جدید کالا در پنل', 1, NULL, '2024-01-17 13:58:07', '2024-01-17 13:58:07'),
(33, 'حذف گارانتی کالا', 'delete-guarantee', 'سطح دسترسی برای حذف گارانتی کالا در پنل', 1, NULL, '2024-01-17 14:01:49', '2024-01-17 14:01:49'),
(34, 'نمایش لیست رنگ های کالا', 'view-product-colors-list', 'سطح دسترسی برای نمایش لیست رنگ های کالا در پنل', 1, NULL, '2024-01-17 14:03:01', '2024-01-17 14:03:01'),
(35, 'ایجاد رنگ جدید کالا', 'create-color', 'سطح دسترسی برای ایجاد رنگ جدید کالا در پنل', 1, NULL, '2024-01-17 14:03:46', '2024-01-17 14:03:46'),
(36, 'حذف رنگ محصول', 'delete-color', 'سطح دسترسی برای حذف رنگ کالا در پنل', 1, NULL, '2024-01-17 14:04:38', '2024-01-17 14:04:38'),
(37, 'نمایش انبار محصولات', 'view-store', 'سطح دسترسی برای مشاهده لیست انبار کالاها در پنل', 1, NULL, '2024-01-17 14:06:58', '2024-01-17 14:06:58'),
(38, 'افزایش موجودی تعداد موجودی انبار محصول', 'add-to-store', 'سطح دسترسی برای افزایش موجودی تعداد موجودی انبار کالا در پنل', 1, NULL, '2024-01-17 14:08:31', '2024-01-17 14:08:31'),
(39, 'اصلاح موجودی انبار محصول', 'edit-store', 'سطح دسترسی برای اصلاح موجودی انبار کالا در پنل', 1, NULL, '2024-01-17 14:10:14', '2024-01-17 14:10:14'),
(40, 'نمایش لیست نظرات کالا', 'view-product-comments-list', 'سطح دسترسی برای نمایش لیست نظرت کالا در پنل', 1, NULL, '2024-01-18 03:03:30', '2024-01-18 03:03:30'),
(41, 'تایید نظر کالا', 'approved-comment-product', 'سطح دسترسی برای تایید نظر کالا در پنل', 1, NULL, '2024-01-18 03:05:20', '2024-01-18 03:05:20'),
(42, 'مشاهده نظر کالا', 'show-comment-product', 'سطح دسترسی برای مشاهده نظر کالا در پنل', 1, NULL, '2024-01-18 03:14:04', '2024-01-18 03:14:04'),
(43, 'پاسخ به نظرات محصول', 'answer-comment-product', 'سطح دسترسی برای پاسخ به نظرات کالا در پنل', 1, NULL, '2024-01-18 03:15:26', '2024-01-18 03:15:26'),
(44, 'نمایش لیست پرداخت ها', 'view-payment-list', 'سطح دسترسی برای نمایش لیست پرداخت ها در پنل', 1, NULL, '2024-01-18 03:38:18', '2024-01-18 03:38:18'),
(45, 'باطل کردن پرداخت', 'canceled-payment', 'سطح دسترسی برای باطل کردن پرداخت در پنل', 1, NULL, '2024-01-18 03:45:38', '2024-01-18 03:45:38'),
(46, 'برگرداندن وجه پرداخت', 'returned-payment', 'سطح دسترسی برای برگرداندن وجه پرداخت در پنل', 1, NULL, '2024-01-18 03:46:53', '2024-01-18 03:46:53'),
(47, 'نمایش لیست کوپن تخفیف', 'view-copans-list', 'سطح دسترسی برای نمایش لیست کوپن تخفیف در پنل', 1, NULL, '2024-01-18 03:51:24', '2024-01-18 03:51:24'),
(48, 'ایجاد کوپن جدید', 'create-copan', 'سطح دسترسی برای ایجاد کوپن جدید در پنل', 1, NULL, '2024-01-18 03:52:31', '2024-01-18 03:52:31'),
(49, 'ویرایش کوپن', 'edit-copan', 'سطح دسترسی برای ویرایش کوپن در پنل', 1, NULL, '2024-01-18 03:53:46', '2024-01-18 03:53:46'),
(50, 'حذف کوپن', 'delete-copan', 'سطح دسترسی برای حدف کوپن در پنل', 1, NULL, '2024-01-18 03:54:35', '2024-01-18 03:54:35'),
(51, 'مشاهده لیست تخفیف های عمومی', 'view-common-discount-list', 'سطح دسترسی برای مشاهده لیست تخفیف های عمومی در پنل', 1, NULL, '2024-01-18 03:55:49', '2024-01-18 03:55:49'),
(52, 'ایجاد تخفیف عمومی', 'create-common-discount', 'سطح دسترسی برای ایجاد تخفیف عمومی در پنل', 1, NULL, '2024-01-18 03:57:11', '2024-01-18 03:57:11'),
(53, 'ویرایش تخفیف عمومی', 'edit-common-discount', 'سطح دسترسی برای ویرایش تخفیف عمومی در پنل', 1, NULL, '2024-01-18 03:58:32', '2024-01-18 03:58:32'),
(54, 'حذف تخفیف عمومی', 'delete-common-discount', 'سطح دسترسی برای حذف تخفیف عمومی در پنل', 1, NULL, '2024-01-18 03:59:30', '2024-01-18 03:59:30'),
(55, 'نمایش لیست فروش شگفت انگیز', 'view-amazing-sales', 'سطح دسترسی برای نمایش لیست فروش شگفت انگیز در پنل', 1, NULL, '2024-01-18 04:30:49', '2024-01-18 04:30:49'),
(56, 'ایجاد فروش شگفت انگیز جدید', 'create-amazing-sale', 'سطح دسترسی برای ایجاد فروش شگفت انگیز جدید در پنل', 1, NULL, '2024-01-18 04:31:56', '2024-01-18 04:31:56'),
(57, 'ویرایش فروش شگفت انگیز', 'edit-amazing-sale', 'سطح دسترسی برای ویرایش فروش شگفت انگیز در پنل', 1, NULL, '2024-01-18 04:32:48', '2024-01-18 04:32:48'),
(58, 'حذف فروش شگفت انگیز', 'delete-amazing-sale', 'سطح دسترسی برای حذف فروش شگفت انگیز در پنل', 1, NULL, '2024-01-18 04:33:41', '2024-01-18 04:33:41'),
(59, 'نمایش لیست روش های ارسال', 'view-deliveries-list', 'سطح دسترسی برای نمایش لیست روش های ارسال در پنل', 1, NULL, '2024-01-18 04:34:53', '2024-01-18 04:34:53'),
(60, 'ایجاد روش ارسال جدید', 'create-delivery', 'سطح دسترسی برای ایجاد روش ارسال جدید در پنل', 1, NULL, '2024-01-18 04:35:34', '2024-01-18 04:35:34'),
(61, 'ویرایش روش ارسال', 'edit-delivery', 'سطح دسترسی برای ویرایش روش ارسال در پنل', 1, NULL, '2024-01-18 04:36:19', '2024-01-18 04:36:19'),
(62, 'حذف روش ارسال', 'delete-delivery', 'سطح دسترسی برای حذف روش ارسال در پنل', 1, NULL, '2024-01-18 04:37:15', '2024-01-18 04:37:15'),
(63, 'نمایش لیست دسته بندی ها محتوی', 'view-content-categories-list', 'سطح دسترسی برای نمایش لیست دسته بندی ها محتوی در پنل', 1, NULL, '2024-01-18 04:38:38', '2024-01-18 04:38:38'),
(64, 'ایجاد دسته بندی جدید محتوی', 'create-content-category', 'سطح دسترسی برای ایجاد دسته بندی جدید محتوی در پنل', 1, NULL, '2024-01-18 04:41:29', '2024-01-18 04:41:29'),
(65, 'ویرایش دسته بندی محتوی', 'edit-content-category', 'سطح دسترسی برای ویرایش دسته بندی محتوی در پنل', 1, NULL, '2024-01-18 04:42:38', '2024-01-18 04:42:38'),
(66, 'حذف دسته بندی محتوی', 'delete-content-category', 'سطح دسترسی برای حذف دسته بندی محتوی در پنل', 1, NULL, '2024-01-18 04:43:25', '2024-01-18 04:43:25'),
(67, 'نمایش لیست پست ها', 'view-posts-list', 'سطح دسترسی برای نمایش لیست پست ها در پنل', 1, NULL, '2024-01-18 04:45:52', '2024-01-18 04:45:52'),
(68, 'ایجاد پست جدید', 'create-post', 'سطح دسترسی برای ایجاد پست جدید در پنل', 1, NULL, '2024-01-18 04:46:24', '2024-01-18 04:46:24'),
(69, 'ویرایش پست', 'edit-post', 'سطح دسترسی برای ویرایش پست در پنل', 1, NULL, '2024-01-18 04:47:02', '2024-01-18 04:47:02'),
(70, 'حذف پست', 'delete-post', 'سطح دسترسی برای حذف پست در پنل', 1, NULL, '2024-01-18 04:47:25', '2024-01-18 04:47:25'),
(71, 'نمایش لیست نظرات', 'view-content-comments-list', 'سطح دسترسی برای مشاهده لیست نظرات محتوی در پنل', 1, NULL, '2024-01-18 10:18:15', '2024-01-18 10:18:15'),
(72, 'مشاهده نظر محتوی', 'show-content-comment', 'سطح دسترسی برای نمایش نظر محتوی در پنل', 1, NULL, '2024-01-18 10:19:09', '2024-01-18 10:19:09'),
(73, 'تایید نظر محتوی', 'approved-content-comment', 'سطح دسترسی برای تایید نظر محتوی در پنل', 1, NULL, '2024-01-18 10:20:17', '2024-01-18 10:20:17'),
(74, 'پاسخ به نظر محتوی', 'answer-comment-content', 'سطح دسترسی برای پاسخ به نظر محتوی در پنل', 1, NULL, '2024-01-18 10:21:16', '2024-01-18 10:21:16'),
(75, 'نمایش لیست منو ها', 'view-menus-list', 'سطح دسترسی برای نمایش لیست منو ها در پنل', 1, NULL, '2024-01-18 10:31:19', '2024-01-18 10:31:19'),
(76, 'ایجاد منو جدید', 'create-menu', 'سطح دسترسی برای ایجاد منو جدید در پنل', 1, NULL, '2024-01-18 10:31:46', '2024-01-18 10:31:46'),
(77, 'ویرایش منو', 'edit-menu', 'سطح دسترسی برای ویرایش منو در پنل', 1, NULL, '2024-01-18 10:32:21', '2024-01-18 10:32:21'),
(78, 'حذف منو', 'delete-menu', 'سطح دسترسی برای حذف منو در پنل', 1, NULL, '2024-01-18 10:32:51', '2024-01-18 10:32:51'),
(79, 'نمایش لیست سوالات متداول', 'view-faqs-list', 'سطح دسترسی برای نمایش لیست سوالات متداول در پنل', 1, NULL, '2024-01-18 10:37:27', '2024-01-18 10:37:27'),
(80, 'ایجاد پرسش جدید سولات متداول', 'craete-faq', 'سطح دسترسی برای ایجاد پرسش جدید سولات متداول در پنل', 1, NULL, '2024-01-18 10:38:37', '2024-01-18 10:38:37'),
(81, 'ویرایش پرسش سوال متداول', 'edit-faq', 'سطح دسترسی برای ویرایش پرسش سوال متداول در پنل', 1, NULL, '2024-01-18 10:39:10', '2024-01-18 10:40:17'),
(82, 'حذف پرسش سوالات متداول', 'delete-faq', 'سطح دسترسی برای حذف پرسش سوالات متداول در پنل', 1, NULL, '2024-01-18 10:39:52', '2024-01-18 10:39:52'),
(83, 'نمایش لیست صفحات پیج ساز', 'view-pages-list', 'سطح دسترسی برای لیست صفحات پیج ساز در پنل', 1, NULL, '2024-01-18 10:41:28', '2024-01-18 10:41:28'),
(84, 'ایجاد صفحه جدید با پیج ساز', 'create-page', 'سطح دسترسی برای ایجاد صفحه جدید با پیج ساز در پنل', 1, NULL, '2024-01-18 10:42:15', '2024-01-18 10:44:23'),
(85, 'ویرایش صفحه پیج ساز', 'edit-page', 'سطح دسترسی برای ویرایش صفحه پیج ساز در پنل', 1, NULL, '2024-01-18 10:43:10', '2024-01-18 10:43:10'),
(86, 'حذف صفحه از پیج ساز', 'delete-page', 'سطح دسترسی برای حذف صفحه از پیج ساز در پنل', 1, NULL, '2024-01-18 10:44:08', '2024-01-18 10:44:08'),
(87, 'نمایش لیست بنرها', 'view-banners-list', 'سطح دسترسی برای نمایش لیست بنرها در پنل', 1, NULL, '2024-01-18 11:56:22', '2024-01-18 11:56:22'),
(88, 'ایجاد بنر جدید', 'create-banner', 'سطح دسترسی برای ایجاد بنر جدید در پنل', 1, NULL, '2024-01-18 11:56:52', '2024-01-18 11:56:52'),
(89, 'ویرایش بنر', 'edit-banner', 'سطح دسترسی برای ویرایش بنر در پنل', 1, NULL, '2024-01-18 11:57:17', '2024-01-18 11:57:17'),
(90, 'نمایش لیست کاربران ادمین', 'view-admins-list', 'سطح دسترسی برای نمایش لیست کاربران ادمین در پنل', 1, NULL, '2024-01-18 13:35:39', '2024-01-18 13:35:39'),
(91, 'ایجاد ادمین جدید', 'create-admin', 'سطح دسترسی برای ایجاد ادمین جدید در پنل', 1, NULL, '2024-01-18 13:36:58', '2024-01-18 13:36:58'),
(92, 'ویرایش ادمین', 'edit-admin', 'سطح دسترسی برای ویرایش ادمین در پنل', 1, NULL, '2024-01-18 13:38:21', '2024-01-18 13:38:21'),
(93, 'حذف ادمین', 'delete-admin', 'سطح دسترسی برای حذف ادمین در پنل', 1, NULL, '2024-01-18 13:39:09', '2024-01-18 13:39:09'),
(94, 'اصلاح دسترسی ادمین', 'edit-admin-permission', 'سطح دسترسی برای اصلاح دسترسی ادمین در پنل', 1, NULL, '2024-01-18 13:40:38', '2024-01-18 13:40:38'),
(95, 'تخصیص نقش به کاربران ادمین', 'edit-admin-role', 'سطح دسترسی برای تخصیص نقش به کاربران ادمین در پنل', 1, NULL, '2024-01-18 13:41:18', '2024-01-18 13:41:18'),
(96, 'نمایش لیست مشتریان', 'view-customers-list', 'سطح دسترسی برای نمایش لیست مشتریان در پنل', 1, NULL, '2024-01-18 13:42:45', '2024-01-18 13:42:45'),
(97, 'ایجاد مشتری جدید', 'create-customer', 'سطح دسترسی برای ایجاد مشتری جدید در پنل', 1, NULL, '2024-01-18 13:43:21', '2024-01-18 13:43:21'),
(98, 'ویرایش مشتری', 'edit-customer', 'سطح دسترسی برای ویرایش مشتری در پنل', 1, NULL, '2024-01-18 13:43:54', '2024-01-18 13:43:54'),
(99, 'حذف مشتری', 'delete-customer', 'سطح دسترسی برای حذف مشتری در پنل', 1, NULL, '2024-01-18 13:44:30', '2024-01-18 13:44:30'),
(100, 'نمایش لیست نقش ها', 'view-roles-list', 'سطح دسترسی برای نمایش لیست نقش ها در پنل', 1, NULL, '2024-01-18 13:45:09', '2024-01-18 13:45:09'),
(101, 'ایجاد نقش جدید', 'create-role', 'سطح دسترسی برای ایجاد نقش جدید در پنل', 1, NULL, '2024-01-18 13:45:38', '2024-01-18 13:45:38'),
(102, 'ویرایش نقش', 'edit-role', 'سطح دسترسی برای ویرایش نقش در پنل', 1, NULL, '2024-01-18 13:46:37', '2024-01-18 13:46:37'),
(103, 'حذف نقش', 'delete-role', 'سطح دسترسی برای حذف نقش در پنل', 1, NULL, '2024-01-18 13:46:58', '2024-01-18 13:46:58'),
(104, 'تخصیص سطح دسترسی به نقش', 'permission-role-sync', 'سطح دسترسی برای تخصیص سطح دسترسی به نقش در پنل', 1, NULL, '2024-01-18 13:48:22', '2024-01-18 13:48:22'),
(105, 'نمایش لیست سطوح دسترسی', 'view-permissions', 'سطح دسترسی برای نمایش لیست سطوح دسترسی در پنل', 1, NULL, '2024-01-18 13:49:20', '2024-01-18 13:49:20'),
(106, 'ایجاد سطح دسترسی جدید', 'create-permission', 'سطح دسترسی برای ایجاد سطح دسترسی جدید در پنل', 1, NULL, '2024-01-18 13:49:59', '2024-01-18 13:50:10'),
(107, 'ویرایش سطح دسترسی', 'edit-permission', 'سطح دسترسی برای ویرایش سطح دسترسی در پنل', 1, NULL, '2024-01-18 13:51:00', '2024-01-18 13:51:00'),
(108, 'حذف سطح دسترسی', 'delete-permission', 'سطح دسترسی برای حذف سطح دسترسی در پنل', 1, NULL, '2024-01-18 13:52:03', '2024-01-18 13:52:03'),
(109, 'نمایش لیست مسئولین تیکت', 'view-ticket-admins', 'سطح دسترسی برای نمایش لیست مسئولین تیکت در پنل', 1, NULL, '2024-01-18 13:55:23', '2024-01-18 13:55:23'),
(110, 'ویرایش مسئولین تیکت', 'edit-ticket-admin', 'سطح دسترسی برای ویرایش مسئولین تیکت در پنل', 1, NULL, '2024-01-18 13:56:14', '2024-01-18 13:56:14'),
(111, 'نمایش لیست دسته بندی تیکت', 'view-ticket-category-list', 'سطح دسترسی برای نمایش لیست دسته بندی تیکت در پنل', 1, NULL, '2024-01-18 13:57:42', '2024-01-18 13:57:42'),
(112, 'ایجاد دسته بندی جدید تیکت', 'create-ticket-category', 'سطح دسترسی برای ایجاد دسته بندی جدید تیکت  در پنل', 1, NULL, '2024-01-18 13:58:53', '2024-01-18 13:58:53'),
(113, 'ویرایش دسته بندی تیکت', 'edit-ticket-category', 'سطح دسترسی برای ویرایش دسته بندی تیکت در پنل', 1, NULL, '2024-01-18 13:59:28', '2024-01-18 13:59:28'),
(114, 'حذف دسته بندی تیکت', 'delete-ticket-category', 'سطح دسترسی برای حذف دسته بندی تیکت در پنل', 1, NULL, '2024-01-18 14:00:04', '2024-01-18 14:00:04'),
(115, 'نمایش لیست اولویت ها', 'view-priorities-list', 'سطح دسترسی برای نمایش لیست اولویت ها در پنل', 1, NULL, '2024-01-18 14:01:49', '2024-01-18 14:01:49'),
(116, 'ایجاد اولویت جدید', 'create-priority', 'سطح دسترسی برای ایجاد اولویت جدید در پنل', 1, NULL, '2024-01-18 14:02:55', '2024-01-18 14:02:55'),
(117, 'ویرایش اولویت', 'edit-priority', 'سطح دسترسی برای ویرایش اولویت در پنل', 1, NULL, '2024-01-18 14:03:26', '2024-01-18 14:03:26'),
(118, 'حذف اولویت', 'delete-priority', 'سطح دسترسی برای حذف اولویت در پنل', 1, NULL, '2024-01-18 14:03:56', '2024-01-18 14:03:56'),
(119, 'نمایش لیست تیکت ها', 'view-tickets-list', 'سطح دسترسی برای نمایش لیست تیکت ها در پنل', 1, NULL, '2024-01-18 14:14:30', '2024-01-18 14:14:30'),
(120, 'مشاهده تیکت', 'show-ticket', 'سطح دسترسی برای مشاهده تیکت در پنل', 1, NULL, '2024-01-18 14:16:17', '2024-01-18 14:16:17'),
(121, 'نمایش لیست اطلاعیه ایمیلی', 'view-notify-emails-list', 'سطح دسترسی برای نمایش لیست اطلاعیه ایمیلی در پنل', 1, NULL, '2024-01-18 14:17:48', '2024-01-18 14:17:48'),
(122, 'ایجاد اطلاعیه ایمیلی جدید', 'create-notify-email', 'سطح دسترسی برای ایجاد اطلاعیه ایمیلی جدید در پنل', 1, NULL, '2024-01-18 14:18:23', '2024-01-18 14:18:23'),
(123, 'ویرایش اطلاعیه ایمیلی', 'edit-notify-email', 'سطح دسترسی برای ویرایش اطلاعیه ایمیلی در پنل', 1, NULL, '2024-01-18 14:19:40', '2024-01-18 14:19:40'),
(124, 'حذف اطلاعیه ایمیلی', 'delete-notify-email', 'سطح دسترسی برای حذف اطلاعیه ایمیلی در پنل', 1, NULL, '2024-01-18 14:20:32', '2024-01-18 14:20:32'),
(125, 'تخصیص فایل های ضمیمه شده به اطلاعیه ایمیلی', 'sync-notify-email-file', 'سطح دسترسی برای تخصیص فایل های ضمیمه شده به اطلاعیه ایمیلی در پنل', 1, NULL, '2024-01-18 14:22:06', '2024-01-18 14:22:06'),
(126, 'نمایش لیست اطلاعیه پیامکی', 'view-notify-sms-list', 'سطح دسترسی برای نمایش لیست اطلاعیه پیامکی در پنل', 1, NULL, '2024-01-18 14:23:13', '2024-01-18 14:23:13'),
(127, 'ایجاد اطلاعیه پیامکی جدید', 'create-notify-sms', 'سطح دسترسی برای ایجاد اطلاعیه پیامکی جدید در پنل', 1, NULL, '2024-01-18 14:23:55', '2024-01-18 14:23:55'),
(128, 'ویرایش اطلاعیه پیامکی', 'edit-notify-sms', 'سطح دسترسی برای ویرایش اطلاعیه پیامکی در پنل', 1, NULL, '2024-01-18 14:24:31', '2024-01-18 14:24:31'),
(129, 'حذف اطلاعیه ایمیلی', 'delete-notify-sms', 'سطح دسترسی برای حذف اطلاعیه ایمیلی در پنل', 1, NULL, '2024-01-18 14:25:12', '2024-01-18 14:25:12'),
(130, 'ارسال اطلاعیه پیامکی', 'send-notify-sms', 'سطح دسترسی برای ارسال اطلاعیه پیامکی در پنل', 1, NULL, '2024-01-18 14:25:45', '2024-01-18 14:25:45'),
(131, 'ارسال اطلاعیه ایمیلی', 'send-notify-email', 'سطح دسترسی برای ارسال اطلاعیه ایمیلی در پنل', 1, NULL, '2024-01-18 14:26:16', '2024-01-18 14:26:16'),
(132, 'نمایش لیست تنظیمات سایت', 'view-settings-list', 'سطح دسترسی برای نمایش لیست تنظیمات سایت در پنل', 1, NULL, '2024-01-18 14:27:14', '2024-01-18 14:27:14'),
(133, 'ایجاد تنظیمات جدید', 'create-setting', 'سطح دسترسی برای ایجاد تنظیمات جدید در پنل', 1, NULL, '2024-01-18 14:28:30', '2024-01-18 14:28:30'),
(134, 'ویرایش تنظیمات', 'edit-setting', 'سطح دسترسی برای ویرایش تنظیمات در پنل', 1, NULL, '2024-01-18 14:29:02', '2024-01-18 14:29:02'),
(135, 'حذف تنظیمات', 'delete-setting', 'سطح دسترسی برای حذف تنظیمات در پنل', 1, NULL, '2024-01-18 14:29:33', '2024-01-18 14:29:33'),
(136, 'نمایش لیست مدیریت استان و شهرستان', 'view-provinces-list', 'سطح دسترسی برای نمایش لیست مدیریت استان و شهرستان در پنل', 1, NULL, '2024-01-18 14:31:49', '2024-01-18 14:31:49'),
(137, 'ایجاد استان جدید', 'create-province', 'سطح دسترسی برای ایجاد استان جدید در پنل', 1, NULL, '2024-01-18 14:32:29', '2024-01-18 14:32:29'),
(138, 'ویرایش استان', 'edit-province', 'سطح دسترسی برای ویرایش استان در پنل', 1, NULL, '2024-01-18 14:33:05', '2024-01-18 14:33:05'),
(139, 'حذف استان', 'delete-province', 'سطح دسترسی برای حذف استان در پنل', 1, NULL, '2024-01-18 14:33:43', '2024-01-18 14:33:43'),
(140, 'نمایش لیست شهرستان ها', 'view-cities-list', 'سطح دسترسی برای نمایش لیست شهرستان ها در پنل', 1, NULL, '2024-01-18 14:34:38', '2024-01-18 14:34:38'),
(141, 'ایجاد شهرستان جدید', 'create-city', 'سطح دسترسی برای ایجاد شهرستان جدید در پنل', 1, NULL, '2024-01-18 14:35:11', '2024-01-18 14:35:11'),
(142, 'ویرایش شهرستان', 'edit-city', 'سطح دسترسی برای ویرایش شهرستان در پنل', 1, NULL, '2024-01-18 14:35:40', '2024-01-18 14:35:40'),
(143, 'حذف شهرستان', 'delete-city', 'سطح دسترسی برای حذف شهرستان در پنل', 1, NULL, '2024-01-18 14:36:06', '2024-01-18 14:36:06'),
(144, 'مدیریت تنظیمات صفحه اصلی سایت', 'manage-index-page', 'سطح دسترسی برای مدیریت تنظیمات صفحه اصلی سایت در پنل', 1, NULL, '2024-01-18 14:37:01', '2024-01-18 14:37:01'),
(145, 'نمایش لیست سفارسات', 'view-orders-list', 'سطح دسترسی برای نمایش لیست سفارسات در پنل', 1, NULL, '2024-01-18 14:39:22', '2024-01-18 14:39:22'),
(146, 'نمایش فاکتور سفارش', 'show-order', 'سطح دسترسی برای  نمایش فاکتور سفارش در پنل', 1, NULL, '2024-01-18 15:54:42', '2024-01-18 15:54:42'),
(147, 'تغییر وضعیت ارسال سفارش سفارشات', 'change-order-send-status', 'سطح دسترسی برای تغییر وضعیت ارسال سفارش سفارشات در پنل', 1, NULL, '2024-01-18 15:58:07', '2024-01-18 15:59:48'),
(148, 'تغییر وضعیت سفارش سفارشات', 'change-order-status', 'سطح دسترسی برای تغییر وضعیت سفارش سفارشات در پنل', 1, NULL, '2024-01-18 15:59:13', '2024-01-18 15:59:13'),
(149, 'حذف بنر', 'delete-banner', 'سطح دسترسی برای حذف بنر در پنل', 1, NULL, '2024-01-18 11:57:17', '2024-01-18 11:57:17'),
(151, 'مشاهده پرداخت', 'show-payment', 'سطح دسترسی برای مشاهده پرداخت در پنل', 1, NULL, '2024-01-18 03:38:18', '2024-01-18 03:38:18'),
(152, 'نمایش آمار و نمودار صفحه اصلی ادمین', 'view-chart-admin', 'سطح دسترسی برای نمایش آمار و نمودار صفحه اصلی ادمین در پنل', 1, NULL, '2024-01-26 17:04:46', '2024-01-26 17:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`, `created_at`) VALUES
(1, 8, '2024-01-26 15:23:51'),
(1, 9, '2024-01-26 15:23:51'),
(1, 10, '2024-01-26 15:23:51'),
(1, 11, '2024-01-26 15:23:51'),
(1, 12, '2024-01-26 15:23:51'),
(1, 13, '2024-01-26 15:23:52'),
(1, 14, '2024-01-26 15:23:52'),
(1, 15, '2024-01-26 15:23:52'),
(1, 16, '2024-01-26 15:23:52'),
(1, 17, '2024-01-26 15:23:52'),
(1, 18, '2024-01-26 15:23:52'),
(1, 19, '2024-01-26 15:23:52'),
(1, 20, '2024-01-26 15:23:52'),
(1, 21, '2024-01-26 15:23:52'),
(1, 22, '2024-01-26 15:23:52'),
(1, 23, '2024-01-26 15:23:52'),
(1, 24, '2024-01-26 15:23:52'),
(1, 25, '2024-01-26 15:23:52'),
(1, 26, '2024-01-26 15:23:52'),
(1, 27, '2024-01-26 15:23:52'),
(1, 28, '2024-01-26 15:23:52'),
(1, 29, '2024-01-26 15:23:53'),
(1, 30, '2024-01-26 15:23:53'),
(1, 31, '2024-01-26 15:23:53'),
(1, 32, '2024-01-26 15:23:53'),
(1, 33, '2024-01-26 15:23:53'),
(1, 34, '2024-01-26 15:23:53'),
(1, 35, '2024-01-26 15:23:53'),
(1, 36, '2024-01-26 15:23:53'),
(1, 37, '2024-01-26 15:23:53'),
(1, 38, '2024-01-26 15:23:53'),
(1, 39, '2024-01-26 15:23:53'),
(1, 40, '2024-01-26 15:23:53'),
(1, 41, '2024-01-26 15:23:53'),
(1, 42, '2024-01-26 15:23:53'),
(1, 43, '2024-01-26 15:23:54'),
(1, 44, '2024-01-26 15:23:54'),
(1, 45, '2024-01-26 15:23:54'),
(1, 46, '2024-01-26 15:23:54'),
(1, 47, '2024-01-26 15:23:54'),
(1, 48, '2024-01-26 15:23:54'),
(1, 49, '2024-01-26 15:23:54'),
(1, 50, '2024-01-26 15:23:54'),
(1, 51, '2024-01-26 15:23:54'),
(1, 52, '2024-01-26 15:23:54'),
(1, 53, '2024-01-26 15:23:54'),
(1, 54, '2024-01-26 15:23:54'),
(1, 55, '2024-01-26 15:23:54'),
(1, 56, '2024-01-26 15:23:54'),
(1, 57, '2024-01-26 15:23:54'),
(1, 58, '2024-01-26 15:23:55'),
(1, 59, '2024-01-26 15:23:55'),
(1, 60, '2024-01-26 15:23:55'),
(1, 61, '2024-01-26 15:23:55'),
(1, 62, '2024-01-26 15:23:55'),
(1, 63, '2024-01-26 15:23:55'),
(1, 64, '2024-01-26 15:23:55'),
(1, 65, '2024-01-26 15:23:55'),
(1, 66, '2024-01-26 15:23:55'),
(1, 67, '2024-01-26 15:23:55'),
(1, 68, '2024-01-26 15:23:55'),
(1, 69, '2024-01-26 15:23:55'),
(1, 70, '2024-01-26 15:23:55'),
(1, 71, '2024-01-26 15:23:55'),
(1, 72, '2024-01-26 15:23:55'),
(1, 73, '2024-01-26 15:23:56'),
(1, 74, '2024-01-26 15:23:56'),
(1, 75, '2024-01-26 15:23:56'),
(1, 76, '2024-01-26 15:23:56'),
(1, 77, '2024-01-26 15:23:56'),
(1, 78, '2024-01-26 15:23:56'),
(1, 79, '2024-01-26 15:23:56'),
(1, 80, '2024-01-26 15:23:56'),
(1, 81, '2024-01-26 15:23:56'),
(1, 82, '2024-01-26 15:23:56'),
(1, 83, '2024-01-26 15:23:56'),
(1, 84, '2024-01-26 15:23:56'),
(1, 85, '2024-01-26 15:23:56'),
(1, 86, '2024-01-26 15:23:56'),
(1, 87, '2024-01-26 15:23:56'),
(1, 88, '2024-01-26 15:23:56'),
(1, 89, '2024-01-26 15:23:57'),
(1, 90, '2024-01-26 15:23:57'),
(1, 91, '2024-01-26 15:23:57'),
(1, 92, '2024-01-26 15:23:57'),
(1, 93, '2024-01-26 15:23:57'),
(1, 94, '2024-01-26 15:23:57'),
(1, 95, '2024-01-26 15:23:57'),
(1, 96, '2024-01-26 15:23:57'),
(1, 97, '2024-01-26 15:23:57'),
(1, 98, '2024-01-26 15:23:57'),
(1, 99, '2024-01-26 15:23:57'),
(1, 100, '2024-01-26 15:23:57'),
(1, 101, '2024-01-26 15:23:57'),
(1, 102, '2024-01-26 15:23:57'),
(1, 103, '2024-01-26 15:23:57'),
(1, 104, '2024-01-26 15:23:57'),
(1, 105, '2024-01-26 15:23:57'),
(1, 106, '2024-01-26 15:23:57'),
(1, 107, '2024-01-26 15:23:57'),
(1, 108, '2024-01-26 15:23:57'),
(1, 109, '2024-01-26 15:23:57'),
(1, 110, '2024-01-26 15:23:58'),
(1, 111, '2024-01-26 15:23:58'),
(1, 112, '2024-01-26 15:23:58'),
(1, 113, '2024-01-26 15:23:58'),
(1, 114, '2024-01-26 15:23:58'),
(1, 115, '2024-01-26 15:23:58'),
(1, 116, '2024-01-26 15:23:58'),
(1, 117, '2024-01-26 15:23:58'),
(1, 118, '2024-01-26 15:23:58'),
(1, 119, '2024-01-26 15:23:58'),
(1, 120, '2024-01-26 15:23:58'),
(1, 121, '2024-01-26 15:23:58'),
(1, 122, '2024-01-26 15:23:58'),
(1, 123, '2024-01-26 15:23:58'),
(1, 124, '2024-01-26 15:23:58'),
(1, 125, '2024-01-26 15:23:58'),
(1, 126, '2024-01-26 15:23:58'),
(1, 127, '2024-01-26 15:23:58'),
(1, 128, '2024-01-26 15:23:58'),
(1, 129, '2024-01-26 15:23:58'),
(1, 130, '2024-01-26 15:23:59'),
(1, 131, '2024-01-26 15:23:59'),
(1, 132, '2024-01-26 15:23:59'),
(1, 133, '2024-01-26 15:23:59'),
(1, 134, '2024-01-26 15:23:59'),
(1, 135, '2024-01-26 15:23:59'),
(1, 136, '2024-01-26 15:23:59'),
(1, 137, '2024-01-26 15:23:59'),
(1, 138, '2024-01-26 15:23:59'),
(1, 139, '2024-01-26 15:23:59'),
(1, 140, '2024-01-26 15:23:59'),
(1, 141, '2024-01-26 15:23:59'),
(1, 142, '2024-01-26 15:23:59'),
(1, 143, '2024-01-26 15:24:00'),
(1, 144, '2024-01-26 15:24:00'),
(1, 145, '2024-01-26 15:24:00'),
(1, 146, '2024-01-26 15:24:00'),
(1, 147, '2024-01-26 15:24:00'),
(1, 148, '2024-01-26 15:24:00'),
(1, 149, '2024-01-26 15:24:00'),
(1, 151, '2024-01-26 17:05:21'),
(1, 152, '2024-01-26 17:05:21'),
(2, 8, '2024-01-26 15:36:43'),
(2, 9, '2024-01-26 15:36:44'),
(2, 10, '2024-01-26 15:36:44'),
(2, 11, '2024-01-26 15:36:44'),
(2, 12, '2024-01-26 15:36:44'),
(2, 13, '2024-01-26 15:36:44'),
(2, 14, '2024-01-26 15:36:44'),
(2, 15, '2024-01-26 15:36:44'),
(2, 16, '2024-01-26 15:36:44'),
(2, 17, '2024-01-26 15:36:44'),
(2, 18, '2024-01-26 15:36:44'),
(2, 19, '2024-01-26 15:36:44'),
(2, 20, '2024-01-26 15:36:44'),
(2, 21, '2024-01-26 15:36:44'),
(2, 22, '2024-01-26 15:36:44'),
(2, 23, '2024-01-26 15:36:45'),
(2, 24, '2024-01-26 15:36:45'),
(2, 25, '2024-01-26 15:36:45'),
(2, 26, '2024-01-26 15:36:45'),
(2, 27, '2024-01-26 15:36:45'),
(2, 28, '2024-01-26 15:36:45'),
(2, 29, '2024-01-26 15:36:45'),
(2, 30, '2024-01-26 15:36:46'),
(2, 31, '2024-01-26 15:36:46'),
(2, 32, '2024-01-26 15:36:46'),
(2, 33, '2024-01-26 15:36:46'),
(2, 34, '2024-01-26 15:36:46'),
(2, 35, '2024-01-26 15:36:46'),
(2, 36, '2024-01-26 15:36:46'),
(2, 37, '2024-01-26 15:36:47'),
(2, 38, '2024-01-26 15:36:47'),
(2, 39, '2024-01-26 15:36:47'),
(2, 40, '2024-01-26 15:36:47'),
(2, 41, '2024-01-26 15:36:47'),
(2, 42, '2024-01-26 15:36:47'),
(2, 43, '2024-01-26 15:36:47'),
(2, 44, '2024-01-26 15:36:47'),
(2, 45, '2024-01-26 15:36:47'),
(2, 46, '2024-01-26 15:36:47'),
(2, 47, '2024-01-26 15:36:47'),
(2, 48, '2024-01-26 15:36:47'),
(2, 49, '2024-01-26 15:36:47'),
(2, 50, '2024-01-26 15:36:48'),
(2, 51, '2024-01-26 15:36:48'),
(2, 52, '2024-01-26 15:36:48'),
(2, 53, '2024-01-26 15:36:48'),
(2, 54, '2024-01-26 15:36:48'),
(2, 55, '2024-01-26 15:36:48'),
(2, 56, '2024-01-26 15:36:48'),
(2, 57, '2024-01-26 15:36:48'),
(2, 58, '2024-01-26 15:36:48'),
(2, 59, '2024-01-26 15:36:48'),
(2, 60, '2024-01-26 15:36:48'),
(2, 61, '2024-01-26 15:36:48'),
(2, 62, '2024-01-26 15:36:48'),
(2, 63, '2024-01-26 15:36:48'),
(2, 64, '2024-01-26 15:36:49'),
(2, 65, '2024-01-26 15:36:49'),
(2, 66, '2024-01-26 15:36:49'),
(2, 67, '2024-01-26 15:36:49'),
(2, 68, '2024-01-26 15:36:49'),
(2, 69, '2024-01-26 15:36:49'),
(2, 70, '2024-01-26 15:36:49'),
(2, 71, '2024-01-26 15:36:49'),
(2, 72, '2024-01-26 15:36:49'),
(2, 73, '2024-01-26 15:36:49'),
(2, 74, '2024-01-26 15:36:49'),
(2, 75, '2024-01-26 15:36:49'),
(2, 76, '2024-01-26 15:36:50'),
(2, 77, '2024-01-26 15:36:50'),
(2, 78, '2024-01-26 15:36:50'),
(2, 79, '2024-01-26 15:36:50'),
(2, 80, '2024-01-26 15:36:50'),
(2, 81, '2024-01-26 15:36:50'),
(2, 82, '2024-01-26 15:36:50'),
(2, 83, '2024-01-26 15:36:50'),
(2, 84, '2024-01-26 15:36:50'),
(2, 85, '2024-01-26 15:36:50'),
(2, 86, '2024-01-26 15:36:50'),
(2, 87, '2024-01-26 15:36:50'),
(2, 88, '2024-01-26 15:36:50'),
(2, 89, '2024-01-26 15:36:50'),
(2, 96, '2024-01-26 15:36:50'),
(2, 97, '2024-01-26 15:36:50'),
(2, 98, '2024-01-26 15:36:51'),
(2, 99, '2024-01-26 15:36:51'),
(2, 109, '2024-01-26 15:36:51'),
(2, 110, '2024-01-26 15:36:51'),
(2, 111, '2024-01-26 15:36:51'),
(2, 112, '2024-01-26 15:36:51'),
(2, 113, '2024-01-26 15:36:51'),
(2, 114, '2024-01-26 15:36:51'),
(2, 115, '2024-01-26 15:36:52'),
(2, 116, '2024-01-26 15:36:52'),
(2, 117, '2024-01-26 15:36:52'),
(2, 118, '2024-01-26 15:36:52'),
(2, 119, '2024-01-26 15:36:52'),
(2, 120, '2024-01-26 15:36:52'),
(2, 121, '2024-01-26 15:36:52'),
(2, 122, '2024-01-26 15:36:52'),
(2, 123, '2024-01-26 15:36:52'),
(2, 124, '2024-01-26 15:36:52'),
(2, 125, '2024-01-26 15:36:53'),
(2, 126, '2024-01-26 15:36:53'),
(2, 127, '2024-01-26 15:36:53'),
(2, 128, '2024-01-26 15:36:54'),
(2, 129, '2024-01-26 15:36:54'),
(2, 130, '2024-01-26 15:36:54'),
(2, 131, '2024-01-26 15:36:54'),
(2, 132, '2024-01-26 15:36:54'),
(2, 133, '2024-01-26 15:36:54'),
(2, 134, '2024-01-26 15:36:55'),
(2, 135, '2024-01-26 15:36:55'),
(2, 136, '2024-01-26 15:36:55'),
(2, 137, '2024-01-26 15:36:55'),
(2, 138, '2024-01-26 15:36:55'),
(2, 139, '2024-01-26 15:36:55'),
(2, 140, '2024-01-26 15:36:55'),
(2, 141, '2024-01-26 15:36:55'),
(2, 142, '2024-01-26 15:36:56'),
(2, 143, '2024-01-26 15:36:56'),
(2, 144, '2024-01-26 15:36:56'),
(2, 145, '2024-01-26 15:36:56'),
(2, 146, '2024-01-26 15:36:56'),
(2, 147, '2024-01-26 15:36:56'),
(2, 148, '2024-01-26 15:36:56'),
(2, 149, '2024-01-26 15:36:56'),
(2, 151, '2024-01-26 15:36:56'),
(2, 152, '2024-01-26 17:05:45'),
(3, 63, '2024-01-26 15:42:31'),
(3, 64, '2024-01-26 15:42:31'),
(3, 65, '2024-01-26 15:42:31'),
(3, 66, '2024-01-26 15:42:31'),
(3, 67, '2024-01-26 15:42:31'),
(3, 68, '2024-01-26 15:42:31'),
(3, 69, '2024-01-26 15:42:31'),
(3, 70, '2024-01-26 15:42:31'),
(3, 75, '2024-01-26 16:01:11'),
(3, 76, '2024-01-26 15:42:31'),
(3, 77, '2024-01-26 15:42:31'),
(3, 78, '2024-01-26 15:42:32'),
(3, 79, '2024-01-26 15:42:32'),
(3, 80, '2024-01-26 15:42:32'),
(3, 81, '2024-01-26 15:42:32'),
(3, 82, '2024-01-26 15:42:32'),
(3, 83, '2024-01-26 15:42:32'),
(3, 84, '2024-01-26 15:42:32'),
(3, 85, '2024-01-26 15:42:32'),
(3, 86, '2024-01-26 15:42:32'),
(3, 87, '2024-01-26 15:42:32'),
(3, 88, '2024-01-26 15:42:32'),
(3, 89, '2024-01-26 15:42:32'),
(3, 149, '2024-01-26 15:42:32'),
(4, 63, '2024-01-26 15:39:23'),
(4, 64, '2024-01-26 15:39:23'),
(4, 65, '2024-01-26 15:39:23'),
(4, 66, '2024-01-26 15:39:23'),
(4, 67, '2024-01-26 15:39:23'),
(4, 68, '2024-01-26 15:39:23'),
(4, 69, '2024-01-26 15:39:23'),
(4, 70, '2024-01-26 15:39:23'),
(4, 71, '2024-01-26 15:39:24'),
(4, 72, '2024-01-26 15:39:24'),
(4, 73, '2024-01-26 15:39:24'),
(4, 74, '2024-01-26 15:39:24'),
(4, 75, '2024-01-26 15:39:24'),
(4, 76, '2024-01-26 15:39:24'),
(4, 77, '2024-01-26 15:39:24'),
(4, 78, '2024-01-26 15:39:24'),
(4, 79, '2024-01-26 15:39:24'),
(4, 80, '2024-01-26 15:39:24'),
(4, 81, '2024-01-26 15:39:24'),
(4, 82, '2024-01-26 15:39:24'),
(4, 83, '2024-01-26 15:39:24'),
(4, 84, '2024-01-26 15:39:24'),
(4, 85, '2024-01-26 15:39:24'),
(4, 86, '2024-01-26 15:39:25'),
(4, 87, '2024-01-26 15:39:25'),
(4, 88, '2024-01-26 15:39:25'),
(4, 89, '2024-01-26 15:39:25'),
(4, 149, '2024-01-26 15:39:25'),
(5, 8, '2024-01-26 15:40:46'),
(5, 9, '2024-01-26 15:40:46'),
(5, 10, '2024-01-26 15:40:47'),
(5, 11, '2024-01-26 15:40:47'),
(5, 12, '2024-01-26 15:40:47'),
(5, 13, '2024-01-26 15:40:47'),
(5, 14, '2024-01-26 15:40:47'),
(5, 15, '2024-01-26 15:40:47'),
(5, 16, '2024-01-26 15:40:47'),
(5, 17, '2024-01-26 15:40:47'),
(5, 18, '2024-01-26 15:40:47'),
(5, 19, '2024-01-26 15:40:47'),
(5, 20, '2024-01-26 15:40:47'),
(5, 21, '2024-01-26 15:40:48'),
(5, 22, '2024-01-26 15:40:48'),
(5, 23, '2024-01-26 15:40:48'),
(5, 24, '2024-01-26 15:40:48'),
(5, 25, '2024-01-26 15:40:48'),
(5, 26, '2024-01-26 15:40:48'),
(5, 27, '2024-01-26 15:40:48'),
(5, 28, '2024-01-26 15:40:48'),
(5, 29, '2024-01-26 15:40:48'),
(5, 30, '2024-01-26 15:40:48'),
(5, 31, '2024-01-26 15:40:48'),
(5, 32, '2024-01-26 15:40:48'),
(5, 33, '2024-01-26 15:40:48'),
(5, 34, '2024-01-26 15:40:48'),
(5, 35, '2024-01-26 15:40:48'),
(5, 36, '2024-01-26 15:40:48'),
(5, 37, '2024-01-26 15:40:48'),
(5, 38, '2024-01-26 15:40:48'),
(5, 39, '2024-01-26 15:40:49'),
(5, 40, '2024-01-26 15:40:49'),
(5, 41, '2024-01-26 15:40:49'),
(5, 42, '2024-01-26 15:40:49'),
(5, 43, '2024-01-26 15:40:49'),
(6, 8, '2024-01-26 15:43:12'),
(6, 9, '2024-01-26 15:43:12'),
(6, 10, '2024-01-26 15:43:13'),
(6, 11, '2024-01-26 15:43:13'),
(6, 12, '2024-01-26 15:43:13'),
(6, 13, '2024-01-26 15:43:13'),
(6, 14, '2024-01-26 15:43:13'),
(6, 15, '2024-01-26 15:43:13'),
(6, 16, '2024-01-26 15:43:13'),
(6, 17, '2024-01-26 15:43:14'),
(6, 18, '2024-01-26 15:43:14'),
(6, 19, '2024-01-26 15:43:14'),
(6, 20, '2024-01-26 15:43:14'),
(6, 21, '2024-01-26 15:43:14'),
(6, 22, '2024-01-26 15:43:14'),
(6, 23, '2024-01-26 15:43:14'),
(6, 24, '2024-01-26 15:43:14'),
(6, 25, '2024-01-26 15:43:14'),
(6, 26, '2024-01-26 15:43:14'),
(6, 27, '2024-01-26 15:43:14'),
(6, 28, '2024-01-26 15:43:14'),
(6, 29, '2024-01-26 15:43:14'),
(6, 30, '2024-01-26 15:43:14'),
(6, 31, '2024-01-26 15:43:15'),
(6, 32, '2024-01-26 15:43:15'),
(6, 33, '2024-01-26 15:43:15'),
(6, 34, '2024-01-26 15:43:15'),
(6, 35, '2024-01-26 15:43:15'),
(6, 36, '2024-01-26 15:43:15'),
(7, 44, '2024-01-26 15:44:38'),
(7, 45, '2024-01-26 15:44:38'),
(7, 46, '2024-01-26 15:44:38'),
(7, 151, '2024-01-26 15:44:38'),
(8, 145, '2024-01-26 15:45:20'),
(8, 146, '2024-01-26 15:45:20'),
(8, 147, '2024-01-26 15:45:20'),
(8, 148, '2024-01-26 15:45:20'),
(9, 37, '2024-01-26 15:45:36'),
(9, 38, '2024-01-26 15:45:37'),
(9, 39, '2024-01-26 15:45:37'),
(10, 37, '2024-01-26 15:45:55'),
(10, 38, '2024-01-26 15:45:55'),
(11, 40, '2024-01-26 15:47:10'),
(11, 41, '2024-01-26 15:47:10'),
(11, 42, '2024-01-26 15:47:10'),
(11, 43, '2024-01-26 15:47:10'),
(11, 71, '2024-01-26 15:47:10'),
(11, 72, '2024-01-26 15:47:10'),
(11, 73, '2024-01-26 15:47:10'),
(11, 74, '2024-01-26 15:47:10'),
(12, 109, '2024-01-26 15:49:40'),
(12, 110, '2024-01-26 15:49:40'),
(12, 111, '2024-01-26 15:49:40'),
(12, 112, '2024-01-26 15:49:40'),
(12, 113, '2024-01-26 15:49:40'),
(12, 114, '2024-01-26 15:49:40'),
(12, 115, '2024-01-26 15:49:41'),
(12, 116, '2024-01-26 15:49:41'),
(12, 117, '2024-01-26 15:49:41'),
(12, 118, '2024-01-26 15:49:41'),
(12, 119, '2024-01-26 15:49:41'),
(12, 120, '2024-01-26 15:49:41'),
(13, 44, '2024-01-26 15:50:56'),
(13, 45, '2024-01-26 15:50:56'),
(13, 46, '2024-01-26 15:50:56'),
(13, 145, '2024-01-26 15:50:56'),
(13, 146, '2024-01-26 15:50:56'),
(13, 147, '2024-01-26 15:50:56'),
(13, 148, '2024-01-26 15:50:56'),
(13, 151, '2024-01-26 15:50:56'),
(14, 121, '2024-01-26 15:51:57'),
(14, 122, '2024-01-26 15:51:57'),
(14, 123, '2024-01-26 15:51:58'),
(14, 124, '2024-01-26 15:51:58'),
(14, 125, '2024-01-26 15:51:58'),
(14, 126, '2024-01-26 15:51:58'),
(14, 127, '2024-01-26 15:51:58'),
(14, 128, '2024-01-26 15:51:58'),
(14, 129, '2024-01-26 15:51:58'),
(14, 130, '2024-01-26 15:51:58'),
(14, 131, '2024-01-26 15:51:58'),
(15, 8, '2024-01-26 15:53:06'),
(15, 9, '2024-01-26 15:53:06'),
(15, 10, '2024-01-26 15:53:06'),
(15, 11, '2024-01-26 15:53:07'),
(15, 12, '2024-01-26 15:53:07'),
(15, 13, '2024-01-26 15:53:07'),
(15, 14, '2024-01-26 15:53:07'),
(15, 15, '2024-01-26 15:53:07'),
(15, 16, '2024-01-26 15:53:07'),
(15, 17, '2024-01-26 15:53:07'),
(15, 18, '2024-01-26 15:53:07'),
(15, 19, '2024-01-26 15:53:07'),
(15, 20, '2024-01-26 15:53:07'),
(15, 21, '2024-01-26 15:53:07'),
(15, 22, '2024-01-26 15:53:07'),
(15, 23, '2024-01-26 15:53:07'),
(15, 24, '2024-01-26 15:53:08'),
(15, 25, '2024-01-26 15:53:08'),
(15, 26, '2024-01-26 15:53:08'),
(15, 27, '2024-01-26 15:53:08'),
(15, 28, '2024-01-26 15:53:08'),
(15, 29, '2024-01-26 15:53:08'),
(15, 30, '2024-01-26 15:53:08'),
(15, 31, '2024-01-26 15:53:08'),
(15, 32, '2024-01-26 15:53:08'),
(15, 33, '2024-01-26 15:53:08'),
(15, 34, '2024-01-26 15:53:08'),
(15, 35, '2024-01-26 15:53:08'),
(15, 36, '2024-01-26 15:53:08'),
(15, 37, '2024-01-26 15:53:08'),
(15, 38, '2024-01-26 15:53:08'),
(15, 39, '2024-01-26 15:53:08'),
(15, 40, '2024-01-26 15:53:09'),
(15, 41, '2024-01-26 15:53:09'),
(15, 42, '2024-01-26 15:53:09'),
(15, 43, '2024-01-26 15:53:09'),
(15, 44, '2024-01-26 15:53:09'),
(15, 45, '2024-01-26 15:53:09'),
(15, 46, '2024-01-26 15:53:09'),
(15, 47, '2024-01-26 15:53:09'),
(15, 48, '2024-01-26 15:53:09'),
(15, 49, '2024-01-26 15:53:09'),
(15, 50, '2024-01-26 15:53:09'),
(15, 51, '2024-01-26 15:53:09'),
(15, 52, '2024-01-26 15:53:09'),
(15, 53, '2024-01-26 15:53:09'),
(15, 54, '2024-01-26 15:53:10'),
(15, 55, '2024-01-26 15:53:10'),
(15, 56, '2024-01-26 15:53:10'),
(15, 57, '2024-01-26 15:53:10'),
(15, 58, '2024-01-26 15:53:10'),
(15, 59, '2024-01-26 15:53:10'),
(15, 60, '2024-01-26 15:53:10'),
(15, 61, '2024-01-26 15:53:10'),
(15, 62, '2024-01-26 15:53:10'),
(15, 145, '2024-01-26 15:53:10'),
(15, 146, '2024-01-26 15:53:10'),
(15, 147, '2024-01-26 15:53:10'),
(15, 148, '2024-01-26 15:53:10'),
(15, 151, '2024-01-26 15:53:10'),
(17, 47, '2024-01-26 15:53:54'),
(17, 48, '2024-01-26 15:53:54'),
(17, 49, '2024-01-26 15:53:54'),
(17, 50, '2024-01-26 15:53:54'),
(17, 51, '2024-01-26 15:53:54'),
(17, 52, '2024-01-26 15:53:54'),
(17, 53, '2024-01-26 15:53:54'),
(17, 54, '2024-01-26 15:53:54'),
(17, 55, '2024-01-26 15:53:55'),
(17, 56, '2024-01-26 15:53:55'),
(17, 57, '2024-01-26 15:53:55'),
(17, 58, '2024-01-26 15:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `summery` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` text NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `commentable` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => uncommentable, 1 => commentable',
  `tags` varchar(255) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `introduction` text NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` text NOT NULL,
  `related_product` text DEFAULT NULL,
  `weight` decimal(10,2) NOT NULL COMMENT 'kg unit',
  `length` decimal(10,1) NOT NULL COMMENT 'cm unit',
  `width` decimal(10,1) NOT NULL COMMENT 'cm unit',
  `height` decimal(10,1) NOT NULL COMMENT 'cm unit',
  `price` decimal(20,3) NOT NULL COMMENT 'IR price unit',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `marketable` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 => marketable, 0 => is not marketable',
  `tags` varchar(255) DEFAULT NULL,
  `sold_number` tinyint(4) NOT NULL DEFAULT 0,
  `frozen_number` tinyint(4) NOT NULL DEFAULT 0,
  `marketable_number` tinyint(4) NOT NULL DEFAULT 0,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `view` bigint(20) NOT NULL DEFAULT 0,
  `published_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `introduction`, `slug`, `image`, `related_product`, `weight`, `length`, `width`, `height`, `price`, `status`, `marketable`, `tags`, `sold_number`, `frozen_number`, `marketable_number`, `brand_id`, `category_id`, `view`, `published_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'گوشی موبایل شیائومی مدل Poco X5 Pro 5G دو سیم کارت ظرفیت 256 گیگابایت و رم 8 گیگابایت - گلوبال', '<p>میان&zwnj;رده&zwnj;ای با توانایی&zwnj;های یک پرچمدار</p>\r\n\r\n<p>در بین گوشی&zwnj;های هوشمند میان&zwnj;رده سری Poco شرکت شیائومی، شاهد رونمایی برخی از محصولاتی بودیم که عملکردی در حد و اندازه&zwnj; گوشی&zwnj;های هوشمند پرچمدار داشتند. Poco X5 Pro 5G هم یکی از این گوشی&zwnj;های هوشمند است. در همان نگاه اول زبان طراحی آشنای سری poco را شاهد هستیم که این بار با تغییرات اندکی همراه بود. تغییراتی که سبب شده تا Poco X5 Pro 5G ظاهری پرچمدار&zwnj;گونه به خودش بگیرد. در نمای رو&zwnj;به&zwnj;رویی صفحه&zwnj;نمایش یکدست به طراحی ناچ جذاب اینفینیتی O مجهز شده که بریدگی دایره&zwnj;&zwnj;ای شکل ناچ در قسمت بالایی و مرکزی صفحه&zwnj;نمایش، سنسور دوربین سلفی را در خود جای داده است. حاشیه&zwnj;های به نسبت کم هم سبب شده تا ۸۶.۸ درصد از نمای رو&zwnj;به&zwnj;رویی را صفحه&zwnj;نمایش به خودش اختصاص دهد. در مجموع باید بگوییم با صفحه&zwnj;نمایشی بسیار یکدست و با حاشیه&zwnj;های بسیار کمی رو&zwnj;به&zwnj;رو هستید.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/images/product-introduction/2024/01/26/1706295567.jpg\" /></p>\r\n\r\n<p>در قسمت پشتی اما زبان طراحی سری Poco این بار با تغیرات اندکی همراه بوده است و باید بگوییم که بیش از پیش Poco X5 Pro 5G را شبیه به گوشی&zwnj;های پرچمدار کرده است. وزن بسیار مناسب 181 گرمی این گوشی نه&zwnj;تنها در استفاده طولانی مدت خستگی برای دست به&zwnj;همراه ندارد، بلکه آنقدر هم سبک نیست که در حین استفاده احساس افتادن را تشدید کند (طراحی مناسب هم در این زمینه تاثیر بالایی داشته است). پشتیبانی از استاندارد IP53 سبب شده تا این گوشی در برابر قطرات آب مقاوم باشد. پس برای مثال می&zwnj;توانید از این گوشی زیر بارش باران نه&zwnj;چندان سنگین استفاده کنید و نگرانی برای آسیب رسیدن به آن نداشته باشید.</p>', 'گوشی-موبایل-شیائومی-مدل-Poco-X5-Pro-5G-دو-سیم-کارت-ظرفیت-256-گیگابایت-و-رم-8-گیگابایت-گلوبال', '{\"indexArray\":{\"large\":\"images\\\\product\\\\2024\\\\01\\\\26\\\\1706295673\\\\1706295673_large.webp\",\"medium\":\"images\\\\product\\\\2024\\\\01\\\\26\\\\1706295673\\\\1706295673_medium.webp\",\"small\":\"images\\\\product\\\\2024\\\\01\\\\26\\\\1706295673\\\\1706295673_small.webp\"},\"directory\":\"images\\\\product\\\\2024\\\\01\\\\26\\\\1706295673\",\"currentImage\":\"medium\"}', NULL, 0.18, 0.7, 7.6, 16.2, 14399000.000, 1, 1, 'Xiaomi,Poco,X5 Pro 5G,Dual SIM,256GB', 0, 0, 0, 1, 2, 23, '2024-01-26 21:02:20', '2024-01-26 19:01:14', '2024-01-26 21:01:56', NULL),
(2, 'گوشی موبایل اپل مدل iphone 13 CH دو سیم کارت ظرفیت 128 گیگابایت و رم 4 گیگابایت', '<p><strong>طراحی جذاب</strong></p>\r\n\r\n<p>اپل چندان تمایلی به تغییر طراحی&zwnj;های موفق خود ندارد و ترجیح می&zwnj;دهد تا زبان طراحی موفق و جذاب خود را حفظ کند. آیفون 13 نیز از طراحی مشابهی با نسل قبلی خود بهره برده است. در نمای رو&zwnj;به&zwnj;رویی همان ناچ و بریدگی آشنای سری&zwnj;های قبلی را می&zwnj;بینیم که این بار عرض کمتری به نسبت ناچ صفحه&zwnj;نمایش آیفون 12 دارد. در نمای پشتی هم شاهد قرار گیری دو سنسور دوربین می&zwnj;باشیم که بر&zwnj;خلاف مدل آیفون 12، این بار دو سنسور دوربین با چیدمانی ضربدری با فلش LED در بریدگی مربعی شکل قرار گرفته&zwnj;اند. این در حالی است که دو سنسور دوربین قسمت پشتی آیفون 12 با چیدمانی ستونی شکل در کنار یکدیگر قرار گرفته&zwnj;اند.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/images/product-introduction/2024/01/26/1706296852.jpg\" /></p>\r\n\r\n<p>برای فریم های دور نیز از ساختار آلومینیومی استفاده شده است. وزن 174 گرمی نیز به نسبت آیفون 13 پرو و 13 پرو مکس، وزن سبک&zwnj;تری می باشد که سبب شده تا نه تنها حس و حال یک گوشی پرچمدار و با&zwnj;کیفیت را به شما ارائه می&zwnj;کند، بلکه در استفاده&zwnj;های طولانی مدت نیز خستگی برای دستان شما به ارمغان نمی&zwnj;آورد. آیفون 13 همانند بسیاری از گوشی&zwnj;های هوشمند این شرکت به لطف بهره برده از ساختار بسیار با&zwnj;کیفیت، توانایی پشتیبانی از استاندارد ضد&zwnj;آب IP68 را دارد (توانایی قرار گیری در عمق 6 متری آب و مدت زمان 30 دقیقه&zwnj;ای).</p>', 'گوشی-موبایل-اپل-مدل-iphone-13-CH-دو-سیم-کارت-ظرفیت-128-گیگابایت-و-رم-4-گیگابایت', '{\"indexArray\":{\"large\":\"images\\\\product\\\\2024\\\\01\\\\26\\\\1706297280\\\\1706297280_large.webp\",\"medium\":\"images\\\\product\\\\2024\\\\01\\\\26\\\\1706297280\\\\1706297280_medium.webp\",\"small\":\"images\\\\product\\\\2024\\\\01\\\\26\\\\1706297280\\\\1706297280_small.webp\"},\"directory\":\"images\\\\product\\\\2024\\\\01\\\\26\\\\1706297280\",\"currentImage\":\"medium\"}', NULL, 0.17, 0.7, 7.1, 14.6, 36450000.000, 1, 1, 'Apple,iPhone 13 CH,Dual SIM,128GB', 0, 0, 0, 2, 2, 0, '2024-01-25 19:26:16', '2024-01-26 19:28:01', '2024-01-26 19:28:01', NULL),
(3, 'گوشی موبایل اپل مدل iPhone 11 A2223 ZAA دو سیم کارت ظرفیت 128 گیگابایت و رم 4 گیگابایت', '<p><strong>انقلاب طراحی</strong></p>\r\n\r\n<p>&nbsp; مدتی بود که گوشی&zwnj;های هوشمند اپل از طراحی&zwnj;های مشابه و آشنایی بهره برده بودند و البته نمی&zwnj;توان از کاربر&zwnj;پسند بودن این طراحی&zwnj;های به&zwnj;راحتی گذشت. اما گوشی&zwnj;های هوشمند خانواده iPhone 11 با طراحی متفاوت به نسبت نسل&zwnj;های قبلی روانه بازار شدند که باید بگوییم اپل در این بخش کاملا موفق بوده و تغییر طراحی در نظر گرفته شده برای گوشی&zwnj;های هوشمند این خانواده، اتفاق بسیار خوب و مثبتی بود. در نمای رو&zwnj;به&zwnj;رویی تفاوت چندان زیادی با نسل&zwnj;های قبلی شاهد نیستیم. همان صفحه&zwnj;نمایش زیبا و یکدست که حاشیه قسمت بالایی و مرکزی صفحه&zwnj;نمایش، سنسور دوربین سلفی و سنسور تشخیض چهره سه&zwnj;بعدی را در خود جای داده است. شاید بهتر بود حاشیه&zwnj;های کمتری را برای صفحه&zwnj;نمایش شاهد باشیم و در مجموع ۷۹ درصد از نمای رو&zwnj;به&zwnj;رویی را صفحه&zwnj;نمایش به خودش اختصاص داده است. اما تفاوت اصلی طراحی در نظر گرفته شده برای این گوشی به نسبت نسل قبلی، قرار&zwnj;گیری سنسور&zwnj;های دوربین قسمت پشتی است. این بار معماری مربعی شکلی برای قرار&zwnj;گیری سنسور&zwnj;های دوربین پشتی iPhone 11 در نظر گرفته شده و دیگر خبری از چیدمان خطی ساده سنسور&zwnj;های دوربین نسل&zwnj;های قبلی نیست.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/images/product-introduction/2024/01/26/1706297720.jpg\" /></p>', 'گوشی-موبایل-اپل-مدل-iPhone-11-A2223-ZAA-دو-سیم-کارت-ظرفیت-128-گیگابایت-و-رم-4-گیگابایت', '{\"indexArray\":{\"large\":\"images\\\\product\\\\2024\\\\01\\\\26\\\\1706297823\\\\1706297823_large.webp\",\"medium\":\"images\\\\product\\\\2024\\\\01\\\\26\\\\1706297823\\\\1706297823_medium.webp\",\"small\":\"images\\\\product\\\\2024\\\\01\\\\26\\\\1706297823\\\\1706297823_small.webp\"},\"directory\":\"images\\\\product\\\\2024\\\\01\\\\26\\\\1706297823\",\"currentImage\":\"medium\"}', '[\"2\"]', 0.19, 0.8, 7.5, 15.0, 33299000.000, 1, 1, 'Apple,iPhone,11 A2223 ZAA,Dual SIM,128GB', 0, 0, 0, 2, 2, 2, '2024-01-26 20:47:01', '2024-01-26 19:37:04', '2024-01-26 20:47:01', NULL),
(4, 'گوشی موبایل سامسونگ مدل Galaxy A14 دو سیم کارت ظرفیت 64 گیگابایت و رم 4 گیگابایت - ویتنام', '<p><strong>میان رده استاندارد و قابل اعتماد</strong></p>\r\n\r\n<p>در میان گوشی&zwnj;های مختلف میان رده با قیمت اقتصادی و مناسب، سامسونگ اغلب گوشی&zwnj;های وسوسه&zwnj; کننده&zwnj;ای را ارائه می&zwnj;کند که بسیاری اوقات کیفیتی بالاتر از تگ قیمتی خود دارند و A14 هم در همین دسته بندی قرار می&zwnj;گیرد. یکی از جذابیت&zwnj;های A14 طراحی بدنه آن است. با کمی دقت در شکل و محل قرارگیری ماژول دوربین به نظر می&zwnj;رسد که این طراحی از پرچم&zwnj;داران سامسونگ مانند گلکسی S23 الهام گرفته شده است. جنس قاب پلاستیکی است و وجود شیارها و طراحی ظریف پشت گوشی سبب می&zwnj;شود هم در دست گرفتنش راحت باشد و هم اثر انگشت را به خود نگیرد.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/images/product-introduction/2024/01/26/1706298672.jpg\" /></p>\r\n\r\n<p>با داشتن ضخامت ۹.۱۱ میلی&zwnj;متری نمی&zwnj;توان گفت با یک گوشی باریک و ظریف طرفیم، اما با توجه به وزن ۲۰۱ گرمی، این گوشی سنگین هم نیست و در رنج متوسط گوشی&zwnj;های میان رده قرار می&zwnj;گیرد. حسگر اثر انگشت در دکمه پاور قرار گرفته است که البته عملکرد خوبی هم دارد. در نهایت این گوشی تنها یک اسپیکر دارد که در وجه پایینی گوشی تعبیه شده است. برای جبران این اسپیکر نه چندان قوی، جک هدفون از این گوشی حذف نشده و به شما اجازه می&zwnj;دهد همچنان از هندزفری سیمی محبوب خود استفاده کنید.</p>', 'گوشی-موبایل-سامسونگ-مدل-Galaxy-A14-دو-سیم-کارت-ظرفیت-64-گیگابایت-و-رم-4-گیگابایت-ویتنام', '{\"indexArray\":{\"large\":\"images\\\\product\\\\2024\\\\01\\\\26\\\\1706298738\\\\1706298738_large.webp\",\"medium\":\"images\\\\product\\\\2024\\\\01\\\\26\\\\1706298738\\\\1706298738_medium.webp\",\"small\":\"images\\\\product\\\\2024\\\\01\\\\26\\\\1706298738\\\\1706298738_small.webp\"},\"directory\":\"images\\\\product\\\\2024\\\\01\\\\26\\\\1706298738\",\"currentImage\":\"medium\"}', '[\"1\",\"2\"]', 0.20, 0.9, 7.8, 16.7, 5249000.000, 1, 1, 'Samsung,Galaxy A14,Dual SIM,64GB', 0, 0, 0, 3, 2, 0, '2024-01-25 19:47:30', '2024-01-26 19:52:18', '2024-01-26 19:52:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `show_in_menu` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => not showed in menu, 1= showed in menu',
  `tags` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `description`, `slug`, `image`, `status`, `show_in_menu`, `tags`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'تکنولوژی', '<p>دسته بندی تکنولوژی</p>', 'تکنولوژی', NULL, 1, 1, 'تکنولوژی', NULL, '2024-01-26 17:17:11', '2024-01-26 17:17:11', NULL),
(2, 'موبایل', '<p>دسته بندی موبایل</p>', 'موبایل', NULL, 1, 1, 'موبایل,گوشی,mobile', 1, '2024-01-26 17:22:55', '2024-01-26 17:22:55', NULL),
(3, 'لپتاپ', '<p>دسته بندی لپتاپ</p>', 'لپتاپ', NULL, 1, 1, 'لپتاپ,laptop', 1, '2024-01-26 17:23:48', '2024-01-26 17:23:48', NULL),
(4, 'لوازم جانبی موبایل', '<p>دسته بندی&nbsp;لوازم جانبی موبایل</p>', 'لوازم-جانبی-موبایل', NULL, 1, 1, 'لوازم جانبی موبایل', 2, '2024-01-26 17:24:37', '2024-01-26 17:31:32', NULL),
(5, 'لوازم خانگی برقی', '<p>دسته بندی&nbsp;لوازم خانگی برقی</p>', 'لوازم-خانگی-برقی', NULL, 1, 1, 'لوازم خانگی برقی', NULL, '2024-01-26 17:36:28', '2024-01-26 17:36:28', NULL),
(6, 'خانه و آشپزخانه', '<p>دسته بندی&nbsp;خانه و آشپزخانه</p>', 'خانه-و-آشپزخانه', NULL, 1, 1, 'خانه و آشپزخانه', NULL, '2024-01-26 17:40:36', '2024-01-26 17:42:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price_increase` decimal(20,3) NOT NULL DEFAULT 0.000,
  `sold_number` tinyint(4) NOT NULL DEFAULT 0,
  `frozen_number` tinyint(4) NOT NULL DEFAULT 0,
  `marketable_number` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `name`, `color`, `product_id`, `price_increase`, `sold_number`, `frozen_number`, `marketable_number`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'مشکی', '#000000', 1, 10000.000, 0, 0, 0, 1, '2024-01-26 19:05:07', '2024-01-26 19:05:07', NULL),
(2, 'صورتی', '#ff80ab', 2, 10000.000, 0, 0, 0, 1, '2024-01-26 19:42:43', '2024-01-26 19:42:43', NULL),
(3, 'مشکی', '#000000', 2, 0.000, 0, 0, 0, 1, '2024-01-26 19:43:04', '2024-01-26 19:43:04', NULL),
(4, 'آبی', '#2196f3', 2, 20000.000, 0, 0, 0, 1, '2024-01-26 19:44:19', '2024-01-26 19:44:19', NULL),
(5, 'سفید', '#ffffff', 2, 0.000, 0, 0, 0, 1, '2024-01-26 19:44:39', '2024-01-26 19:44:39', NULL),
(6, 'مشکی', '#000000', 3, 10000.000, 0, 0, 0, 1, '2024-01-26 19:46:29', '2024-01-26 19:46:29', NULL),
(7, 'سفید', '#ffffff', 3, 0.000, 0, 0, 0, 1, '2024-01-26 19:46:45', '2024-01-26 19:46:45', NULL),
(8, 'مشکی', '#000000', 4, 0.000, 0, 0, 0, 1, '2024-01-26 19:54:06', '2024-01-26 19:54:06', NULL),
(9, 'نقره ای', '#c7c7c7', 4, 30000.000, 0, 0, 0, 1, '2024-01-26 19:54:36', '2024-01-26 19:54:36', NULL),
(10, 'سبز روشن', '#85ffb4', 4, 50000.000, 0, 0, 0, 1, '2024-01-26 19:55:23', '2024-01-26 19:55:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '{\"indexArray\":{\"large\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706295697\\\\1706295697_large.jpg\",\"medium\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706295697\\\\1706295697_medium.jpg\",\"small\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706295697\\\\1706295697_small.jpg\"},\"directory\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706295697\",\"currentImage\":\"medium\"}', 1, '2024-01-26 19:01:38', '2024-01-26 19:01:38', NULL),
(2, '{\"indexArray\":{\"large\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706295710\\\\1706295710_large.jpg\",\"medium\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706295710\\\\1706295710_medium.jpg\",\"small\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706295710\\\\1706295710_small.jpg\"},\"directory\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706295710\",\"currentImage\":\"medium\"}', 1, '2024-01-26 19:01:50', '2024-01-26 19:01:50', NULL),
(3, '{\"indexArray\":{\"large\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706295719\\\\1706295719_large.jpg\",\"medium\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706295719\\\\1706295719_medium.jpg\",\"small\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706295719\\\\1706295719_small.jpg\"},\"directory\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706295719\",\"currentImage\":\"medium\"}', 1, '2024-01-26 19:02:00', '2024-01-26 19:02:00', NULL),
(4, '{\"indexArray\":{\"large\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706297859\\\\1706297859_large.jpg\",\"medium\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706297859\\\\1706297859_medium.jpg\",\"small\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706297859\\\\1706297859_small.jpg\"},\"directory\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706297859\",\"currentImage\":\"medium\"}', 2, '2024-01-26 19:37:39', '2024-01-26 19:39:51', '2024-01-26 19:39:51'),
(5, '{\"indexArray\":{\"large\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706297942\\\\1706297942_large.jpg\",\"medium\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706297942\\\\1706297942_medium.jpg\",\"small\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706297942\\\\1706297942_small.jpg\"},\"directory\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706297942\",\"currentImage\":\"medium\"}', 2, '2024-01-26 19:39:04', '2024-01-26 19:39:55', '2024-01-26 19:39:55'),
(6, '{\"indexArray\":{\"large\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298009\\\\1706298009_large.jpg\",\"medium\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298009\\\\1706298009_medium.jpg\",\"small\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298009\\\\1706298009_small.jpg\"},\"directory\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298009\",\"currentImage\":\"medium\"}', 2, '2024-01-26 19:40:09', '2024-01-26 19:40:09', NULL),
(7, '{\"indexArray\":{\"large\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298021\\\\1706298021_large.jpg\",\"medium\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298021\\\\1706298021_medium.jpg\",\"small\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298021\\\\1706298021_small.jpg\"},\"directory\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298021\",\"currentImage\":\"medium\"}', 2, '2024-01-26 19:40:22', '2024-01-26 19:40:22', NULL),
(8, '{\"indexArray\":{\"large\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298051\\\\1706298051_large.jpg\",\"medium\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298051\\\\1706298051_medium.jpg\",\"small\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298051\\\\1706298051_small.jpg\"},\"directory\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298051\",\"currentImage\":\"medium\"}', 2, '2024-01-26 19:40:52', '2024-01-26 19:41:01', '2024-01-26 19:41:01'),
(9, '{\"indexArray\":{\"large\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298317\\\\1706298317_large.jpg\",\"medium\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298317\\\\1706298317_medium.jpg\",\"small\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298317\\\\1706298317_small.jpg\"},\"directory\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298317\",\"currentImage\":\"medium\"}', 3, '2024-01-26 19:45:18', '2024-01-26 19:45:18', NULL),
(10, '{\"indexArray\":{\"large\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298325\\\\1706298325_large.jpg\",\"medium\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298325\\\\1706298325_medium.jpg\",\"small\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298325\\\\1706298325_small.jpg\"},\"directory\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298325\",\"currentImage\":\"medium\"}', 3, '2024-01-26 19:45:27', '2024-01-26 19:45:27', NULL),
(11, '{\"indexArray\":{\"large\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298757\\\\1706298757_large.jpg\",\"medium\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298757\\\\1706298757_medium.jpg\",\"small\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298757\\\\1706298757_small.jpg\"},\"directory\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298757\",\"currentImage\":\"medium\"}', 4, '2024-01-26 19:52:37', '2024-01-26 19:52:37', NULL),
(12, '{\"indexArray\":{\"large\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298766\\\\1706298766_large.jpg\",\"medium\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298766\\\\1706298766_medium.jpg\",\"small\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298766\\\\1706298766_small.jpg\"},\"directory\":\"images\\\\product-gallery\\\\2024\\\\01\\\\26\\\\1706298766\",\"currentImage\":\"medium\"}', 4, '2024-01-26 19:52:46', '2024-01-26 19:52:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_meta`
--

CREATE TABLE `product_meta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_value` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_meta`
--

INSERT INTO `product_meta` (`id`, `meta_key`, `meta_value`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'فناوری صفحه‌ نمایش', 'AMOLED', 1, '2024-01-26 19:09:07', '2024-01-26 19:09:07', NULL),
(7, 'رزولوشن عکس', '108 مگاپیکسل', 1, '2024-01-26 19:09:07', '2024-01-26 19:09:07', NULL),
(8, 'نسخه سیستم عامل', 'Android 12', 1, '2024-01-26 19:09:07', '2024-01-26 19:09:07', NULL),
(9, 'اندازه', '6.67', 1, '2024-01-26 19:09:07', '2024-01-26 19:09:07', NULL),
(10, 'اقلام همراه', 'دفترچه‌ راهنما، شارژر', 1, '2024-01-26 19:09:07', '2024-01-26 19:09:07', NULL),
(11, 'فناوری صفحه‌ نمایش', 'Super Retina XDR OLED', 2, '2024-01-26 19:28:01', '2024-01-26 19:28:01', NULL),
(12, 'رزولوشن عکس', '۱۲ مگاپیکسل', 2, '2024-01-26 19:28:01', '2024-01-26 19:28:01', NULL),
(13, 'اندازه', '6.1', 2, '2024-01-26 19:28:01', '2024-01-26 19:28:01', NULL),
(14, 'ساختار بدنه', 'قاب جلویی و پشتی از جنس شیشه فریم از جنس آلومینیومی صفحه‌نمایش با شیشه مقاوم در برابر خط‌وخش با پوشش Gorilla Glass سرامیکی دارای استاندارد IP۶۸ (مقاومت در برابر نفوذ آب، گِل، گرد و خاک) دارای مقاومت تا ۳۰ دقیقه در آب تا عمق ۶ متر', 2, '2024-01-26 19:28:01', '2024-01-26 19:28:01', NULL),
(15, 'تعداد سیم کارت', 'دو عدد', 2, '2024-01-26 19:28:01', '2024-01-26 19:28:01', NULL),
(16, 'تراشه', 'Apple A۱۵ Bionic (۵ nm) Chipset', 2, '2024-01-26 19:28:01', '2024-01-26 19:28:01', NULL),
(17, 'پردازنده‌ مرکزی', '۲x GHz Avalanche + ۴x GHz Blizzard', 2, '2024-01-26 19:28:01', '2024-01-26 19:28:01', NULL),
(18, 'فرکانس پردازنده‌ مرکزی', '۳.۳۲ - ۱.۸۲ گیگاهرتز', 2, '2024-01-26 19:28:01', '2024-01-26 19:28:01', NULL),
(19, 'پردازنده‌ گرافیکی', 'Apple GPU ۴-core graphics', 2, '2024-01-26 19:28:01', '2024-01-26 19:28:01', NULL),
(20, 'حافظه داخلی', '۱۲۸ گیگابایت', 2, '2024-01-26 19:28:01', '2024-01-26 19:28:01', NULL),
(21, 'مقدار RAM', 'چهار گیگابایت', 2, '2024-01-26 19:28:01', '2024-01-26 19:28:01', NULL),
(22, 'بلندگو', 'استریو', 2, '2024-01-26 19:28:01', '2024-01-26 19:28:01', NULL),
(23, 'نسخه سیستم عامل', 'iOS ۱۵', 2, '2024-01-26 19:28:01', '2024-01-26 19:28:01', NULL),
(24, 'فناوری صفحه‌ نمایش', 'Liquid Retina', 3, '2024-01-26 19:37:04', '2024-01-26 19:37:04', NULL),
(25, 'رزولوشن عکس', '12 مگاپیکسل', 3, '2024-01-26 19:37:04', '2024-01-26 19:37:04', NULL),
(26, 'نسخه سیستم عامل', 'iOS 13', 3, '2024-01-26 19:37:04', '2024-01-26 19:37:04', NULL),
(27, 'اندازه', '6.1', 3, '2024-01-26 19:37:04', '2024-01-26 19:37:04', NULL),
(28, 'تراشه', 'Apple A۱۳ Bionic (۷ nm+) Chipset', 3, '2024-01-26 19:37:04', '2024-01-26 19:37:04', NULL),
(29, 'پردازنده‌ مرکزی', 'Dual-core Lightning + Quad-core Thunder CPU', 3, '2024-01-26 19:37:05', '2024-01-26 19:37:05', NULL),
(30, 'فرکانس پردازنده‌ مرکزی', '۲.۶۵ و ۱.۸ گیگاهرتز', 3, '2024-01-26 19:37:05', '2024-01-26 19:37:05', NULL),
(31, 'پردازنده‌ گرافیکی', 'Apple GPU (۴-core graphics) GPU', 3, '2024-01-26 19:37:05', '2024-01-26 19:37:05', NULL),
(32, 'فناوری صفحه‌ نمایش', 'PLS', 4, '2024-01-26 19:52:19', '2024-01-26 19:52:19', NULL),
(33, 'رزولوشن عکس', '50 مگاپیکسل', 4, '2024-01-26 19:52:19', '2024-01-26 19:52:19', NULL),
(34, 'نسخه سیستم عامل', 'Android 13', 4, '2024-01-26 19:52:19', '2024-01-26 19:52:19', NULL),
(35, 'اندازه', '6.6', 4, '2024-01-26 19:52:19', '2024-01-26 19:52:19', NULL),
(36, 'اقلام همراه', 'دفترچه‌ راهنما', 4, '2024-01-26 19:52:19', '2024-01-26 19:52:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_user`
--

CREATE TABLE `product_user` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'آذربایجان شرقی', 'آذربایجان-شرقی', 1, NULL, NULL, NULL),
(2, 'آذربایجان غربی', 'آذربایجان-غربی', 1, NULL, NULL, NULL),
(3, 'اردبیل', 'اردبیل', 1, NULL, NULL, NULL),
(4, 'اصفهان', 'اصفهان', 1, NULL, NULL, NULL),
(5, 'البرز', 'البرز', 1, NULL, NULL, NULL),
(6, 'ایلام', 'ایلام', 1, NULL, NULL, NULL),
(7, 'بوشهر', 'بوشهر', 1, NULL, NULL, NULL),
(8, 'تهران', 'تهران', 1, NULL, NULL, NULL),
(9, 'چهارمحال و بختیاری', 'چهارمحال-بختیاری', 1, NULL, NULL, NULL),
(10, 'خراسان جنوبی', 'خراسان-جنوبی', 1, NULL, NULL, NULL),
(11, 'خراسان رضوی', 'خراسان-رضوی', 1, NULL, NULL, NULL),
(12, 'خراسان شمالی', 'خراسان-شمالی', 1, NULL, NULL, NULL),
(13, 'خوزستان', 'خوزستان', 1, NULL, NULL, NULL),
(14, 'زنجان', 'زنجان', 1, NULL, NULL, NULL),
(15, 'سمنان', 'سمنان', 1, NULL, NULL, NULL),
(16, 'سیستان و بلوچستان', 'سیستان-بلوچستان', 1, NULL, NULL, NULL),
(17, 'فارس', 'فارس', 1, NULL, NULL, NULL),
(18, 'قزوین', 'قزوین', 1, NULL, NULL, NULL),
(19, 'قم', 'قم', 1, NULL, NULL, NULL),
(20, 'کردستان', 'کردستان', 1, NULL, NULL, NULL),
(21, 'کرمان', 'کرمان', 1, NULL, NULL, NULL),
(22, 'کرمانشاه', 'کرمانشاه', 1, NULL, NULL, NULL),
(23, 'کهگیلویه و بویراحمد', 'کهگیلویه-بویراحمد', 1, NULL, NULL, NULL),
(24, 'گلستان', 'گلستان', 1, NULL, NULL, NULL),
(25, 'لرستان', 'لرستان', 1, NULL, NULL, NULL),
(26, 'گیلان', 'گیلان', 1, NULL, NULL, NULL),
(27, 'مازندران', 'مازندران', 1, NULL, NULL, NULL),
(28, 'مرکزی', 'مرکزی', 1, NULL, NULL, NULL),
(29, 'هرمزگان', 'هرمزگان', 1, NULL, NULL, NULL),
(30, 'همدان', 'همدان', 1, NULL, NULL, NULL),
(31, 'یزد', 'یزد', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `public_mail`
--

CREATE TABLE `public_mail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `public_mail_files`
--

CREATE TABLE `public_mail_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `public_mail_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` text NOT NULL,
  `file_size` bigint(20) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `storage_path` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => public path , 1 => storage path',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `public_sms`
--

CREATE TABLE `public_sms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `rateable_type` varchar(255) NOT NULL,
  `rateable_id` bigint(20) UNSIGNED NOT NULL,
  `value` decimal(2,1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `name`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'سوپر ادمین', 'super-admin', 'مدیر کل پنل ادمین و دسترسی به تمامی قسمت های پنل ادمین', 1, NULL, '2024-01-17 11:39:32', '2024-01-19 12:53:32'),
(2, 'ادمین سطح دو', 'admin', 'دسترسی به عنوان معاون و مدیر سطح دوم پنل ادمین و دسترسی به تمام قسمت های پنل به غیر (از مدیریت ادمین ها)', 1, NULL, '2024-01-17 11:43:17', '2024-01-19 12:55:48'),
(3, 'نویسنده بخش محتوی', 'content-author', 'نویسنده بخش محتوای سایت و دسترسی به بخش های (پیج ساز، بنر ها، دسته بندی محتوی، پست ها و سولات متداول) پنل ادمین', 1, NULL, '2024-01-17 11:47:18', '2024-01-19 12:58:20'),
(4, 'مدیر محتوی', 'content-manager', 'مدیر محتوای سایت با دسترسی به بخش کل محتوی پنل ادمین', 1, NULL, '2024-01-17 11:49:04', '2024-01-19 12:59:41'),
(5, 'مدیر محصولات', 'products-manager', 'مدیر بخش محصولات وبسایت با دسترسی به بخش های (دسته بندی محصولات، فرم کالا، برندها، کالاها، انبار و نظرات محصول)', 1, NULL, '2024-01-17 11:52:10', '2024-01-19 13:01:10'),
(6, 'نویسنده محصولات', 'products-author', 'نویسنده محصولات سایت با دسترسی به بخش های (دسته بندی ها، فرم کالا، برندها، کالاها)', 1, NULL, '2024-01-17 11:53:35', '2024-01-19 13:07:36'),
(7, 'مدیر مالی', 'orders-manager', 'مدیر مالی با دسترسی به بخش سفارشات سایت در پنل ادمین', 1, NULL, '2024-01-17 11:54:57', '2024-01-19 13:08:51'),
(8, 'اپراتور سفارشات', 'orders-operator', 'اپراتور سفارشات با دسترسی به بخش های (مدیریت تغییر وضعیت سفارشات و وضعیت ارسال محصول)', 1, NULL, '2024-01-17 11:59:07', '2024-01-19 13:08:57'),
(9, 'مدیر انبار', 'store-manager', 'مدیر انبار با دسترسی به بخش انبار پنل ادمین', 1, NULL, '2024-01-17 12:02:44', '2024-01-19 13:09:36'),
(10, 'اپراتور انبار', 'store-operator', 'اپراتور انبار با دسترسی به گزینه افزایش موجودی در بخش انبار پنل ادمین', 1, NULL, '2024-01-17 12:04:53', '2024-01-19 13:10:46'),
(11, 'مسئول نظرات', 'comments-oprator', 'مسئول نظرات با دسترسی به بخش های پاسخ گویی به نظرات و تایید نظرات بخش محتوی و محصولات', 1, NULL, '2024-01-17 12:09:36', '2024-01-19 13:11:20'),
(12, 'مدیر تیکت ها', 'ticket-admin', 'مدیر بخش تیکت های پنل ادمین', 1, NULL, '2024-01-17 12:11:19', '2024-01-19 13:14:26'),
(13, 'مدیر سفارشات و پرداخت ها', 'orderpayments-admin', 'مدیر سفارشات و پرداخت ها با دسترسی به بخش های مدیریت سفارشات و مدیرت پرداختی ها', 1, NULL, '2024-01-17 12:15:49', '2024-01-19 13:16:17'),
(14, 'مدیر اطلاع رسانی ها', 'notify-admin', 'مدیر بخش اطلاع رسانی ها با دسترسی به بخش های (اطلاعیه ایمیلی و فایل ها، اطلاعیه پیامکی) پنل ادمین', 1, NULL, '2024-01-17 12:17:30', '2024-01-19 13:17:46'),
(15, 'مدیر بخش فروش', 'market-admin', 'مدیر بخش فروش با دسترسی و مدیریت تمامی بخش فروش پنل ادمین و سایت', 1, NULL, '2024-01-17 12:19:33', '2024-01-19 13:17:52'),
(17, 'مسئول تخفیفات', 'discount-manager', 'مسئول تخفیفات با دسترسی به بخش تخفیفات پنل', 1, NULL, '2024-01-19 13:23:01', '2024-01-19 13:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`, `created_at`) VALUES
(1, 1, '2024-01-26 14:56:56');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Ab4pnnAfqgqqCeAfiJUt191VuB8GYfqeSAXJlBft', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2F1dGgvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiY1dRcUx2YUhpRnBxZ0tNbGNJbFB1M1pXTmN3Z2l4VlJRSWt3YkhtMSI7fQ==', 1706337926),
('vBKLGuLckcRX1p1glEELbMpUcOUopfd9qh56uEn5', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRHo4ZjRwMzlobTJ0ZjJQdEJ5SFlHOUNuM1pldnlTUW94WkMxUXBmbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9zb2xkLXByb2R1Y3RzLWRhdGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1706337240);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `base_url` text DEFAULT NULL,
  `theme_id` int(11) DEFAULT 1,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `telegram` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `google_plus` text DEFAULT NULL,
  `google_map` text DEFAULT NULL,
  `index_page` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `description`, `keywords`, `logo`, `icon`, `base_url`, `theme_id`, `tel`, `email`, `address`, `telegram`, `instagram`, `linkedin`, `twitter`, `google_plus`, `google_map`, `index_page`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'دیجی کالا', '<p>ما همواره تلاش می کنیم بهترین خدمات را به مشتریان آمازون ارائه کنیم. به شما کمک می کنیم بهترین انتخاب را داشته باشید و با اطمینان خاطر خرید را انجام بدهید و در کوتاه ترین زمان ممکن کالای خود را دریافت کنید. همچنین ما 24 ساعته در هفت روز هفته به مشتریان مان خدمات ارائه می دهیم. و 7 روز ضمانت برگشت برای تمامی کالاها داریم.</p>', 'کلمات کلیدی', '\"images\\\\setting\\\\2024\\\\01\\\\26\\\\logo.svg\"', '\"images\\\\setting\\\\2024\\\\01\\\\26\\\\icon.png\"', 'http://127.0.0.1:8000', 1, '02161930000', 'digi.shop@mail.com', 'تهران تهران محله کاووسیه، خیابان گاندی جنوبی، خیابان بیست و یکم، پلاک 28، طبقه نهم', 'http://telegram.com/digikala', 'http://inestagram.com/digikala', 'http://linkedin.com/digikala', 'http://inestagram.com/digikala', 'https://twitter.com/digikala', NULL, '{\"slider\":\"on\",\"mostVisitedProducts\":\"on\",\"middleBanners\":\"on\",\"popularProducts\":\"on\",\"fourBanners\":\"on\",\"offerProducts\":\"on\",\"bottomBanner\":\"on\",\"brands\":\"on\"}', 1, '2024-01-26 16:06:58', '2024-01-26 17:02:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `answer` text DEFAULT NULL COMMENT 'admin''s response to users tickets',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `seen` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => unseen and not seen with admins, 1 => seened with admin',
  `seen_user` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => unseen and not seen with user, 1 => seened with user',
  `reference_id` bigint(20) UNSIGNED NOT NULL COMMENT 'admin id of responder as reference_id ',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `priority_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED DEFAULT NULL,
  `answer_status` tinyint(4) DEFAULT NULL,
  `answer_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_admins`
--

CREATE TABLE `ticket_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_categories`
--

CREATE TABLE `ticket_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => inactive and does not have access, 1 => active and does have access',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_categories`
--

INSERT INTO `ticket_categories` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'سبد خرید', 1, '2024-01-26 17:45:42', '2024-01-26 17:45:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_files`
--

CREATE TABLE `ticket_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_path` text NOT NULL COMMENT 'ticket attachment',
  `file_size` bigint(20) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_priorities`
--

CREATE TABLE `ticket_priorities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_priorities`
--

INSERT INTO `ticket_priorities` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ضروری', 1, '2023-12-12 07:10:25', '2024-01-19 13:26:34', NULL),
(2, 'مهم', 1, '2024-01-19 13:27:35', '2024-01-19 13:27:35', NULL),
(3, 'متوسط', 1, '2024-01-19 13:28:06', '2024-01-19 13:28:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `national_code` varchar(255) DEFAULT NULL COMMENT 'code meli',
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL COMMENT 'full name for profile slug route',
  `profile_photo_path` text DEFAULT NULL COMMENT 'avatar',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `activation` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'this field is used to find out whether the user is active or inactive (email verified) (0 => inactive, 1 => active) ',
  `activation_date` timestamp NULL DEFAULT NULL COMMENT 'get user activity time',
  `user_type` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'to find out if the user is an admin or a regular user (0 => user, 1 => admin) ',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => inactive and does not have access, 1 => active and does have access',
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `mobile`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `national_code`, `first_name`, `last_name`, `slug`, `profile_photo_path`, `email_verified_at`, `mobile_verified_at`, `activation`, `activation_date`, `user_type`, `status`, `current_team_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'shoping.mywebsite@gmail.com', '09372145771', '$2y$10$mX3bbZh50zRUUCptPBCdyeUg2FFs3XMBULRnhUyaiqS2SEHBwi8vi', NULL, NULL, NULL, NULL, 'علی', 'بابازاده', 'علی-بابازاده', 'images\\admin-avatar\\2024\\01\\22\\1705935303.jpg', '2024-01-24 13:46:12', '2024-01-09 11:28:42', 1, NULL, 1, 1, NULL, 'avCe8I8phzEooDPlEwPlfZsktquOqq7PYvZmRngd8BoFd1ArICTjQ5YpTPBr', '2023-12-11 15:28:10', '2024-01-24 13:46:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`),
  ADD KEY `addresses_city_id_foreign` (`city_id`);

--
-- Indexes for table `amazing_sales`
--
ALTER TABLE `amazing_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `amazing_sales_product_id_foreign` (`product_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_user_id_foreign` (`user_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`),
  ADD KEY `cart_items_color_id_foreign` (`color_id`),
  ADD KEY `cart_items_guarantee_id_foreign` (`guarantee_id`);

--
-- Indexes for table `cart_item_selected_attributes`
--
ALTER TABLE `cart_item_selected_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_item_selected_attributes_cart_item_id_foreign` (`cart_item_id`),
  ADD KEY `cart_item_selected_attributes_category_attribute_id_foreign` (`category_attribute_id`),
  ADD KEY `cart_item_selected_attributes_category_value_id_foreign` (`category_value_id`);

--
-- Indexes for table `cash_payments`
--
ALTER TABLE `cash_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cash_payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `category_attributes`
--
ALTER TABLE `category_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_attributes_category_id_foreign` (`category_id`);

--
-- Indexes for table `category_attribute_default_values`
--
ALTER TABLE `category_attribute_default_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_attribute_default_values_category_attribute_id_foreign` (`category_attribute_id`);

--
-- Indexes for table `category_values`
--
ALTER TABLE `category_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_values_product_id_foreign` (`product_id`),
  ADD KEY `category_values_category_attribute_id_foreign` (`category_attribute_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_province_id_foreign` (`province_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_parent_id_foreign` (`parent_id`),
  ADD KEY `comments_author_id_foreign` (`author_id`),
  ADD KEY `comments_responder_id_foreign` (`responder_id`);

--
-- Indexes for table `common_discount`
--
ALTER TABLE `common_discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compares`
--
ALTER TABLE `compares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compares_user_id_foreign` (`user_id`);

--
-- Indexes for table `compare_product`
--
ALTER TABLE `compare_product`
  ADD PRIMARY KEY (`product_id`,`compare_id`),
  ADD KEY `compare_product_compare_id_foreign` (`compare_id`);

--
-- Indexes for table `copans`
--
ALTER TABLE `copans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `copans_user_id_foreign` (`user_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faqs_slug_unique` (`slug`);

--
-- Indexes for table `guarantees`
--
ALTER TABLE `guarantees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guarantees_product_id_foreign` (`product_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `offline_payments`
--
ALTER TABLE `offline_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offline_payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `online_payments`
--
ALTER TABLE `online_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `online_payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_address_id_foreign` (`address_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`),
  ADD KEY `orders_delivery_id_foreign` (`delivery_id`),
  ADD KEY `orders_copan_id_foreign` (`copan_id`),
  ADD KEY `orders_common_discount_id_foreign` (`common_discount_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_amazing_sale_id_foreign` (`amazing_sale_id`),
  ADD KEY `order_items_color_id_foreign` (`color_id`),
  ADD KEY `order_items_guarantee_id_foreign` (`guarantee_id`);

--
-- Indexes for table `order_item_selected_attributes`
--
ALTER TABLE `order_item_selected_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_item_selected_attributes_order_item_id_foreign` (`order_item_id`),
  ADD KEY `order_item_selected_attributes_category_attribute_id_foreign` (`category_attribute_id`),
  ADD KEY `order_item_selected_attributes_category_value_id_foreign` (`category_value_id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `otps_user_id_foreign` (`user_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_author_id_foreign` (`author_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_categories_slug_unique` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_categories_slug_unique` (`slug`),
  ADD KEY `product_categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_meta`
--
ALTER TABLE `product_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_meta_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_user`
--
ALTER TABLE `product_user`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `product_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_mail`
--
ALTER TABLE `public_mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_mail_files`
--
ALTER TABLE `public_mail_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `public_mail_files_public_mail_id_foreign` (`public_mail_id`);

--
-- Indexes for table `public_sms`
--
ALTER TABLE `public_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `ratings_rateable_type_rateable_id_index` (`rateable_type`,`rateable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_reference_id_foreign` (`reference_id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`),
  ADD KEY `tickets_category_id_foreign` (`category_id`),
  ADD KEY `tickets_priority_id_foreign` (`priority_id`),
  ADD KEY `tickets_ticket_id_foreign` (`ticket_id`);

--
-- Indexes for table `ticket_admins`
--
ALTER TABLE `ticket_admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_admins_user_id_foreign` (`user_id`);

--
-- Indexes for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_files`
--
ALTER TABLE `ticket_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_files_ticket_id_foreign` (`ticket_id`),
  ADD KEY `ticket_files_user_id_foreign` (`user_id`);

--
-- Indexes for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_national_code_unique` (`national_code`),
  ADD UNIQUE KEY `users_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amazing_sales`
--
ALTER TABLE `amazing_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_item_selected_attributes`
--
ALTER TABLE `cart_item_selected_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cash_payments`
--
ALTER TABLE `cash_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_attributes`
--
ALTER TABLE `category_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_attribute_default_values`
--
ALTER TABLE `category_attribute_default_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_values`
--
ALTER TABLE `category_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1161;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `common_discount`
--
ALTER TABLE `common_discount`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compares`
--
ALTER TABLE `compares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `copans`
--
ALTER TABLE `copans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guarantees`
--
ALTER TABLE `guarantees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `offline_payments`
--
ALTER TABLE `offline_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `online_payments`
--
ALTER TABLE `online_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_item_selected_attributes`
--
ALTER TABLE `order_item_selected_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_meta`
--
ALTER TABLE `product_meta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `public_mail`
--
ALTER TABLE `public_mail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `public_mail_files`
--
ALTER TABLE `public_mail_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `public_sms`
--
ALTER TABLE `public_sms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_admins`
--
ALTER TABLE `ticket_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket_files`
--
ALTER TABLE `ticket_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `amazing_sales`
--
ALTER TABLE `amazing_sales`
  ADD CONSTRAINT `amazing_sales_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `product_colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_items_guarantee_id_foreign` FOREIGN KEY (`guarantee_id`) REFERENCES `guarantees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_item_selected_attributes`
--
ALTER TABLE `cart_item_selected_attributes`
  ADD CONSTRAINT `cart_item_selected_attributes_cart_item_id_foreign` FOREIGN KEY (`cart_item_id`) REFERENCES `cart_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_item_selected_attributes_category_attribute_id_foreign` FOREIGN KEY (`category_attribute_id`) REFERENCES `category_attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_item_selected_attributes_category_value_id_foreign` FOREIGN KEY (`category_value_id`) REFERENCES `category_values` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cash_payments`
--
ALTER TABLE `cash_payments`
  ADD CONSTRAINT `cash_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_attributes`
--
ALTER TABLE `category_attributes`
  ADD CONSTRAINT `category_attributes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_attribute_default_values`
--
ALTER TABLE `category_attribute_default_values`
  ADD CONSTRAINT `category_attribute_default_values_category_attribute_id_foreign` FOREIGN KEY (`category_attribute_id`) REFERENCES `category_attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_values`
--
ALTER TABLE `category_values`
  ADD CONSTRAINT `category_values_category_attribute_id_foreign` FOREIGN KEY (`category_attribute_id`) REFERENCES `category_attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `comments_responder_id_foreign` FOREIGN KEY (`responder_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `compares`
--
ALTER TABLE `compares`
  ADD CONSTRAINT `compares_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `compare_product`
--
ALTER TABLE `compare_product`
  ADD CONSTRAINT `compare_product_compare_id_foreign` FOREIGN KEY (`compare_id`) REFERENCES `compares` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compare_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `copans`
--
ALTER TABLE `copans`
  ADD CONSTRAINT `copans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guarantees`
--
ALTER TABLE `guarantees`
  ADD CONSTRAINT `guarantees_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`);

--
-- Constraints for table `offline_payments`
--
ALTER TABLE `offline_payments`
  ADD CONSTRAINT `offline_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `online_payments`
--
ALTER TABLE `online_payments`
  ADD CONSTRAINT `online_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_common_discount_id_foreign` FOREIGN KEY (`common_discount_id`) REFERENCES `common_discount` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_copan_id_foreign` FOREIGN KEY (`copan_id`) REFERENCES `copans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_delivery_id_foreign` FOREIGN KEY (`delivery_id`) REFERENCES `delivery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_amazing_sale_id_foreign` FOREIGN KEY (`amazing_sale_id`) REFERENCES `amazing_sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `product_colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_guarantee_id_foreign` FOREIGN KEY (`guarantee_id`) REFERENCES `guarantees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item_selected_attributes`
--
ALTER TABLE `order_item_selected_attributes`
  ADD CONSTRAINT `order_item_selected_attributes_category_attribute_id_foreign` FOREIGN KEY (`category_attribute_id`) REFERENCES `category_attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_selected_attributes_category_value_id_foreign` FOREIGN KEY (`category_value_id`) REFERENCES `category_values` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_selected_attributes_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `otps`
--
ALTER TABLE `otps`
  ADD CONSTRAINT `otps_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `post_categories` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_meta`
--
ALTER TABLE `product_meta`
  ADD CONSTRAINT `product_meta_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_user`
--
ALTER TABLE `product_user`
  ADD CONSTRAINT `product_user_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `public_mail_files`
--
ALTER TABLE `public_mail_files`
  ADD CONSTRAINT `public_mail_files_public_mail_id_foreign` FOREIGN KEY (`public_mail_id`) REFERENCES `public_mail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `ticket_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_priority_id_foreign` FOREIGN KEY (`priority_id`) REFERENCES `ticket_priorities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_reference_id_foreign` FOREIGN KEY (`reference_id`) REFERENCES `ticket_admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_admins`
--
ALTER TABLE `ticket_admins`
  ADD CONSTRAINT `ticket_admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_files`
--
ALTER TABLE `ticket_files`
  ADD CONSTRAINT `ticket_files_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
