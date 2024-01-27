-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2024 at 04:33 PM
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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
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
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `title`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, 'view-products-category-list', 'نمایش لیست دسته بندی محصولات', 'سطح دسترسی برای 	\nنمایش لیست دسته بندی محصولات در پنل', 1, NULL, '2024-01-17 16:06:01', '2024-01-17 16:54:21'),
(9, 'create-product-category', 'ایجاد دسته بندی محصولات', 'سطح دسترسی برای ایجاد دسته بندی محصولات در پنل', 1, NULL, '2024-01-17 16:39:00', '2024-01-17 16:43:56'),
(10, 'edit-product-category', 'ویرایش دسته بندی محصولات', 'سطح دسترسی برای ویرایش دسته بندی محصولات در پنل', 1, NULL, '2024-01-17 16:40:57', '2024-01-17 16:40:57'),
(11, 'delete-product-category', 'حذف دسته بندی محصولات', 'سطح دسترسی برای حذف دسته بندی محصولات در پنل', 1, NULL, '2024-01-17 16:42:42', '2024-01-17 16:42:42'),
(12, 'view-product-properties-list', 'نمایش لیست فرم کالا', 'سطح دسترسی برای 	\nنمایش لیست فرم کالا در پنل', 1, NULL, '2024-01-17 16:54:04', '2024-01-17 16:58:21'),
(13, 'create-product-property', 'ایجاد فرم کالا', 'سطح دسترسی برای ایجاد فرم کالا در پنل', 1, NULL, '2024-01-17 16:55:36', '2024-01-17 16:58:08'),
(14, 'edit-product-property', 'ویرایش فرم کالا', 'سطح دسترسی برای ویرایش فرم کالا در پنل', 1, NULL, '2024-01-17 16:56:24', '2024-01-17 16:57:46'),
(15, 'delete-product-property', 'حذف فرم کالا', 'سطح دسترسی برای حذف فرم کالا در پنل', 1, NULL, '2024-01-17 16:57:34', '2024-01-17 16:58:01'),
(16, 'view-property-values-list', 'نمایش لیست مقادیر فرم کالا', 'سطح دسترسی برای نمایش لیست مقادیر فرم کالا در پنل', 1, NULL, '2024-01-17 17:00:19', '2024-01-17 17:00:19'),
(17, 'create-property-value', 'ایجاد مقدار فرم کالا', 'سطح دسترسی برای ایجاد مقدار فرم کالا در پنل', 1, NULL, '2024-01-17 17:01:17', '2024-01-17 17:01:17'),
(18, 'edit-property-value', 'ویرایش مقدار فرم کالا', 'سطح دسترسی برای ویرایش مقدار فرم کالا در پنل', 1, NULL, '2024-01-17 17:04:29', '2024-01-17 17:04:29'),
(19, 'delete-property-value', 'حذف مقدار فرم کالا', 'سطح دسترسی برای حذف مقدار فرم کالا در پنل', 1, NULL, '2024-01-17 17:08:23', '2024-01-17 17:08:23'),
(20, 'view-brands-list', 'نمایش لیست برندها', 'سطح دسترسی برای نمایش لیست برندها در پنل', 1, NULL, '2024-01-17 17:09:57', '2024-01-17 17:09:57'),
(21, 'create-brand', 'ایجاد برند جدید', 'سطح دسترسی برای ایجاد برند جدید در پنل', 1, NULL, '2024-01-17 17:12:01', '2024-01-17 17:12:01'),
(22, 'edit-brand', 'ویرایش برند', 'سطح دسترسی برای ویرایش برند در  پنل', 1, NULL, '2024-01-17 17:12:46', '2024-01-17 17:12:46'),
(23, 'delete-brand', 'حذف برند', 'سطح دسترسی برای حذف برند در پنل', 1, NULL, '2024-01-17 17:14:39', '2024-01-17 17:14:39'),
(24, 'view-products-list', 'نمایش لیست کالاها', 'سطح دسترسی برای نمایش لسیت کالاها در پنل', 1, NULL, '2024-01-17 17:16:13', '2024-01-17 17:16:13'),
(25, 'create-product', 'ایجاد کالا جدید', 'سطح دسترسی برای ایجاد کالا جدید در پنل', 1, NULL, '2024-01-17 17:17:12', '2024-01-17 17:17:12'),
(26, 'edit-product', 'ویرایش کالا', 'سطح دسترسی برای ویرایش کالا در پنل', 1, NULL, '2024-01-17 17:17:49', '2024-01-17 17:17:49'),
(27, 'delete-product', 'حذف کالا', 'سطح دسترسی برای حذف کالا در پنل', 1, NULL, '2024-01-17 17:18:27', '2024-01-17 17:18:27'),
(28, 'view-product-gallerys-list', 'نمایش لیست گالری کالا', 'سطح دسترسی برای نمایش لیست گالری کالا در پنل', 1, NULL, '2024-01-17 17:20:55', '2024-01-17 17:20:55'),
(29, 'create-gallery', 'ایجاد تصویر جدید در گالری کالا', 'سطح دسترسی برای ایجاد تصویر جدید در گالری کالا در پنل', 1, NULL, '2024-01-17 17:23:07', '2024-01-17 17:23:07'),
(30, 'delete-gallery', 'حذف تصویر از گالری کالا', 'سطح دسترسی برای حذف تصویر از گالری کالا در پنل', 1, NULL, '2024-01-17 17:24:26', '2024-01-17 17:24:26'),
(31, 'view-guarantees-list', 'مشاهده لیست گارانتی های کالا', 'سطح دسترسی برای مشاهده لیست گارانتی های کالا در پنل', 1, NULL, '2024-01-17 17:25:29', '2024-01-17 17:25:29'),
(32, 'create-guarantee', 'ایجاد گارانتی جدید کالا', 'سطح دسترسی برای ایجاد گارانتی جدید کالا در پنل', 1, NULL, '2024-01-17 17:28:07', '2024-01-17 17:28:07'),
(33, 'delete-guarantee', 'حذف گارانتی کالا', 'سطح دسترسی برای حذف گارانتی کالا در پنل', 1, NULL, '2024-01-17 17:31:49', '2024-01-17 17:31:49'),
(34, 'view-product-colors-list', 'نمایش لیست رنگ های کالا', 'سطح دسترسی برای نمایش لیست رنگ های کالا در پنل', 1, NULL, '2024-01-17 17:33:01', '2024-01-17 17:33:01'),
(35, 'create-color', 'ایجاد رنگ جدید کالا', 'سطح دسترسی برای ایجاد رنگ جدید کالا در پنل', 1, NULL, '2024-01-17 17:33:46', '2024-01-17 17:33:46'),
(36, 'delete-color', 'حذف رنگ محصول', 'سطح دسترسی برای حذف رنگ کالا در پنل', 1, NULL, '2024-01-17 17:34:38', '2024-01-17 17:34:38'),
(37, 'view-store', 'نمایش انبار محصولات', 'سطح دسترسی برای مشاهده لیست انبار کالاها در پنل', 1, NULL, '2024-01-17 17:36:58', '2024-01-17 17:36:58'),
(38, 'add-to-store', 'افزایش موجودی تعداد موجودی انبار محصول', 'سطح دسترسی برای افزایش موجودی تعداد موجودی انبار کالا در پنل', 1, NULL, '2024-01-17 17:38:31', '2024-01-17 17:38:31'),
(39, 'edit-store', 'اصلاح موجودی انبار محصول', 'سطح دسترسی برای اصلاح موجودی انبار کالا در پنل', 1, NULL, '2024-01-17 17:40:14', '2024-01-17 17:40:14'),
(40, 'view-product-comments-list', 'نمایش لیست نظرات کالا', 'سطح دسترسی برای نمایش لیست نظرت کالا در پنل', 1, NULL, '2024-01-18 06:33:30', '2024-01-18 06:33:30'),
(41, 'approved-comment-product', 'تایید نظر کالا', 'سطح دسترسی برای تایید نظر کالا در پنل', 1, NULL, '2024-01-18 06:35:20', '2024-01-18 06:35:20'),
(42, 'show-comment-product', 'مشاهده نظر کالا', 'سطح دسترسی برای مشاهده نظر کالا در پنل', 1, NULL, '2024-01-18 06:44:04', '2024-01-18 06:44:04'),
(43, 'answer-comment-product', 'پاسخ به نظرات محصول', 'سطح دسترسی برای پاسخ به نظرات کالا در پنل', 1, NULL, '2024-01-18 06:45:26', '2024-01-18 06:45:26'),
(44, 'view-payment-list', 'نمایش لیست پرداخت ها', 'سطح دسترسی برای نمایش لیست پرداخت ها در پنل', 1, NULL, '2024-01-18 07:08:18', '2024-01-18 07:08:18'),
(45, 'canceled-payment', 'باطل کردن پرداخت', 'سطح دسترسی برای باطل کردن پرداخت در پنل', 1, NULL, '2024-01-18 07:15:38', '2024-01-18 07:15:38'),
(46, 'returned-payment', 'برگرداندن وجه پرداخت', 'سطح دسترسی برای برگرداندن وجه پرداخت در پنل', 1, NULL, '2024-01-18 07:16:53', '2024-01-18 07:16:53'),
(47, 'view-copans-list', 'نمایش لیست کوپن تخفیف', 'سطح دسترسی برای نمایش لیست کوپن تخفیف در پنل', 1, NULL, '2024-01-18 07:21:24', '2024-01-18 07:21:24'),
(48, 'create-copan', 'ایجاد کوپن جدید', 'سطح دسترسی برای ایجاد کوپن جدید در پنل', 1, NULL, '2024-01-18 07:22:31', '2024-01-18 07:22:31'),
(49, 'edit-copan', 'ویرایش کوپن', 'سطح دسترسی برای ویرایش کوپن در پنل', 1, NULL, '2024-01-18 07:23:46', '2024-01-18 07:23:46'),
(50, 'delete-copan', 'حذف کوپن', 'سطح دسترسی برای حدف کوپن در پنل', 1, NULL, '2024-01-18 07:24:35', '2024-01-18 07:24:35'),
(51, 'view-common-discount-list', 'مشاهده لیست تخفیف های عمومی', 'سطح دسترسی برای مشاهده لیست تخفیف های عمومی در پنل', 1, NULL, '2024-01-18 07:25:49', '2024-01-18 07:25:49'),
(52, 'create-common-discount', 'ایجاد تخفیف عمومی', 'سطح دسترسی برای ایجاد تخفیف عمومی در پنل', 1, NULL, '2024-01-18 07:27:11', '2024-01-18 07:27:11'),
(53, 'edit-common-discount', 'ویرایش تخفیف عمومی', 'سطح دسترسی برای ویرایش تخفیف عمومی در پنل', 1, NULL, '2024-01-18 07:28:32', '2024-01-18 07:28:32'),
(54, 'delete-common-discount', 'حذف تخفیف عمومی', 'سطح دسترسی برای حذف تخفیف عمومی در پنل', 1, NULL, '2024-01-18 07:29:30', '2024-01-18 07:29:30'),
(55, 'view-amazing-sales', 'نمایش لیست فروش شگفت انگیز', 'سطح دسترسی برای نمایش لیست فروش شگفت انگیز در پنل', 1, NULL, '2024-01-18 08:00:49', '2024-01-18 08:00:49'),
(56, 'create-amazing-sale', 'ایجاد فروش شگفت انگیز جدید', 'سطح دسترسی برای ایجاد فروش شگفت انگیز جدید در پنل', 1, NULL, '2024-01-18 08:01:56', '2024-01-18 08:01:56'),
(57, 'edit-amazing-sale', 'ویرایش فروش شگفت انگیز', 'سطح دسترسی برای ویرایش فروش شگفت انگیز در پنل', 1, NULL, '2024-01-18 08:02:48', '2024-01-18 08:02:48'),
(58, 'delete-amazing-sale', 'حذف فروش شگفت انگیز', 'سطح دسترسی برای حذف فروش شگفت انگیز در پنل', 1, NULL, '2024-01-18 08:03:41', '2024-01-18 08:03:41'),
(59, 'view-deliveries-list', 'نمایش لیست روش های ارسال', 'سطح دسترسی برای نمایش لیست روش های ارسال در پنل', 1, NULL, '2024-01-18 08:04:53', '2024-01-18 08:04:53'),
(60, 'create-delivery', 'ایجاد روش ارسال جدید', 'سطح دسترسی برای ایجاد روش ارسال جدید در پنل', 1, NULL, '2024-01-18 08:05:34', '2024-01-18 08:05:34'),
(61, 'edit-delivery', 'ویرایش روش ارسال', 'سطح دسترسی برای ویرایش روش ارسال در پنل', 1, NULL, '2024-01-18 08:06:19', '2024-01-18 08:06:19'),
(62, 'delete-delivery', 'حذف روش ارسال', 'سطح دسترسی برای حذف روش ارسال در پنل', 1, NULL, '2024-01-18 08:07:15', '2024-01-18 08:07:15'),
(63, 'view-content-categories-list', 'نمایش لیست دسته بندی ها محتوی', 'سطح دسترسی برای نمایش لیست دسته بندی ها محتوی در پنل', 1, NULL, '2024-01-18 08:08:38', '2024-01-18 08:08:38'),
(64, 'create-content-category', 'ایجاد دسته بندی جدید محتوی', 'سطح دسترسی برای ایجاد دسته بندی جدید محتوی در پنل', 1, NULL, '2024-01-18 08:11:29', '2024-01-18 08:11:29'),
(65, 'edit-content-category', 'ویرایش دسته بندی محتوی', 'سطح دسترسی برای ویرایش دسته بندی محتوی در پنل', 1, NULL, '2024-01-18 08:12:38', '2024-01-18 08:12:38'),
(66, 'delete-content-category', 'حذف دسته بندی محتوی', 'سطح دسترسی برای حذف دسته بندی محتوی در پنل', 1, NULL, '2024-01-18 08:13:25', '2024-01-18 08:13:25'),
(67, 'view-posts-list', 'نمایش لیست پست ها', 'سطح دسترسی برای نمایش لیست پست ها در پنل', 1, NULL, '2024-01-18 08:15:52', '2024-01-18 08:15:52'),
(68, 'create-post', 'ایجاد پست جدید', 'سطح دسترسی برای ایجاد پست جدید در پنل', 1, NULL, '2024-01-18 08:16:24', '2024-01-18 08:16:24'),
(69, 'edit-post', 'ویرایش پست', 'سطح دسترسی برای ویرایش پست در پنل', 1, NULL, '2024-01-18 08:17:02', '2024-01-18 08:17:02'),
(70, 'delete-post', 'حذف پست', 'سطح دسترسی برای حذف پست در پنل', 1, NULL, '2024-01-18 08:17:25', '2024-01-18 08:17:25'),
(71, 'view-content-comments-list', 'نمایش لیست نظرات', 'سطح دسترسی برای مشاهده لیست نظرات محتوی در پنل', 1, NULL, '2024-01-18 13:48:15', '2024-01-18 13:48:15'),
(72, 'show-content-comment', 'مشاهده نظر محتوی', 'سطح دسترسی برای نمایش نظر محتوی در پنل', 1, NULL, '2024-01-18 13:49:09', '2024-01-18 13:49:09'),
(73, 'approved-content-comment', 'تایید نظر محتوی', 'سطح دسترسی برای تایید نظر محتوی در پنل', 1, NULL, '2024-01-18 13:50:17', '2024-01-18 13:50:17'),
(74, 'answer-comment-content', 'پاسخ به نظر محتوی', 'سطح دسترسی برای پاسخ به نظر محتوی در پنل', 1, NULL, '2024-01-18 13:51:16', '2024-01-18 13:51:16'),
(75, 'view-menus-list', 'نمایش لیست منو ها', 'سطح دسترسی برای نمایش لیست منو ها در پنل', 1, NULL, '2024-01-18 14:01:19', '2024-01-18 14:01:19'),
(76, 'create-menu', 'ایجاد منو جدید', 'سطح دسترسی برای ایجاد منو جدید در پنل', 1, NULL, '2024-01-18 14:01:46', '2024-01-18 14:01:46'),
(77, 'edit-menu', 'ویرایش منو', 'سطح دسترسی برای ویرایش منو در پنل', 1, NULL, '2024-01-18 14:02:21', '2024-01-18 14:02:21'),
(78, 'delete-menu', 'حذف منو', 'سطح دسترسی برای حذف منو در پنل', 1, NULL, '2024-01-18 14:02:51', '2024-01-18 14:02:51'),
(79, 'view-faqs-list', 'نمایش لیست سوالات متداول', 'سطح دسترسی برای نمایش لیست سوالات متداول در پنل', 1, NULL, '2024-01-18 14:07:27', '2024-01-18 14:07:27'),
(80, 'craete-faq', 'ایجاد پرسش جدید سولات متداول', 'سطح دسترسی برای ایجاد پرسش جدید سولات متداول در پنل', 1, NULL, '2024-01-18 14:08:37', '2024-01-18 14:08:37'),
(81, 'edit-faq', 'ویرایش پرسش سوال متداول', 'سطح دسترسی برای ویرایش پرسش سوال متداول در پنل', 1, NULL, '2024-01-18 14:09:10', '2024-01-18 14:10:17'),
(82, 'delete-faq', 'حذف پرسش سوالات متداول', 'سطح دسترسی برای حذف پرسش سوالات متداول در پنل', 1, NULL, '2024-01-18 14:09:52', '2024-01-18 14:09:52'),
(83, 'view-pages-list', 'نمایش لیست صفحات پیج ساز', 'سطح دسترسی برای لیست صفحات پیج ساز در پنل', 1, NULL, '2024-01-18 14:11:28', '2024-01-18 14:11:28'),
(84, 'create-page', 'ایجاد صفحه جدید با پیج ساز', 'سطح دسترسی برای ایجاد صفحه جدید با پیج ساز در پنل', 1, NULL, '2024-01-18 14:12:15', '2024-01-18 14:14:23'),
(85, 'edit-page', 'ویرایش صفحه پیج ساز', 'سطح دسترسی برای ویرایش صفحه پیج ساز در پنل', 1, NULL, '2024-01-18 14:13:10', '2024-01-18 14:13:10'),
(86, 'delete-page', 'حذف صفحه از پیج ساز', 'سطح دسترسی برای حذف صفحه از پیج ساز در پنل', 1, NULL, '2024-01-18 14:14:08', '2024-01-18 14:14:08'),
(87, 'view-banners-list', 'نمایش لیست بنرها', 'سطح دسترسی برای نمایش لیست بنرها در پنل', 1, NULL, '2024-01-18 15:26:22', '2024-01-18 15:26:22'),
(88, 'create-banner', 'ایجاد بنر جدید', 'سطح دسترسی برای ایجاد بنر جدید در پنل', 1, NULL, '2024-01-18 15:26:52', '2024-01-18 15:26:52'),
(89, 'edit-banner', 'ویرایش بنر', 'سطح دسترسی برای ویرایش بنر در پنل', 1, NULL, '2024-01-18 15:27:17', '2024-01-18 15:27:17'),
(90, 'view-admins-list', 'نمایش لیست کاربران ادمین', 'سطح دسترسی برای نمایش لیست کاربران ادمین در پنل', 1, NULL, '2024-01-18 17:05:39', '2024-01-18 17:05:39'),
(91, 'create-admin', 'ایجاد ادمین جدید', 'سطح دسترسی برای ایجاد ادمین جدید در پنل', 1, NULL, '2024-01-18 17:06:58', '2024-01-18 17:06:58'),
(92, 'edit-admin', 'ویرایش ادمین', 'سطح دسترسی برای ویرایش ادمین در پنل', 1, NULL, '2024-01-18 17:08:21', '2024-01-18 17:08:21'),
(93, 'delete-admin', 'حذف ادمین', 'سطح دسترسی برای حذف ادمین در پنل', 1, NULL, '2024-01-18 17:09:09', '2024-01-18 17:09:09'),
(94, 'edit-admin-permission', 'اصلاح دسترسی ادمین', 'سطح دسترسی برای اصلاح دسترسی ادمین در پنل', 1, NULL, '2024-01-18 17:10:38', '2024-01-18 17:10:38'),
(95, 'edit-admin-role', 'تخصیص نقش به کاربران ادمین', 'سطح دسترسی برای تخصیص نقش به کاربران ادمین در پنل', 1, NULL, '2024-01-18 17:11:18', '2024-01-18 17:11:18'),
(96, 'view-customers-list', 'نمایش لیست مشتریان', 'سطح دسترسی برای نمایش لیست مشتریان در پنل', 1, NULL, '2024-01-18 17:12:45', '2024-01-18 17:12:45'),
(97, 'create-customer', 'ایجاد مشتری جدید', 'سطح دسترسی برای ایجاد مشتری جدید در پنل', 1, NULL, '2024-01-18 17:13:21', '2024-01-18 17:13:21'),
(98, 'edit-customer', 'ویرایش مشتری', 'سطح دسترسی برای ویرایش مشتری در پنل', 1, NULL, '2024-01-18 17:13:54', '2024-01-18 17:13:54'),
(99, 'delete-customer', 'حذف مشتری', 'سطح دسترسی برای حذف مشتری در پنل', 1, NULL, '2024-01-18 17:14:30', '2024-01-18 17:14:30'),
(100, 'view-roles-list', 'نمایش لیست نقش ها', 'سطح دسترسی برای نمایش لیست نقش ها در پنل', 1, NULL, '2024-01-18 17:15:09', '2024-01-18 17:15:09'),
(101, 'create-role', 'ایجاد نقش جدید', 'سطح دسترسی برای ایجاد نقش جدید در پنل', 1, NULL, '2024-01-18 17:15:38', '2024-01-18 17:15:38'),
(102, 'edit-role', 'ویرایش نقش', 'سطح دسترسی برای ویرایش نقش در پنل', 1, NULL, '2024-01-18 17:16:37', '2024-01-18 17:16:37'),
(103, 'delete-role', 'حذف نقش', 'سطح دسترسی برای حذف نقش در پنل', 1, NULL, '2024-01-18 17:16:58', '2024-01-18 17:16:58'),
(104, 'permission-role-sync', 'تخصیص سطح دسترسی به نقش', 'سطح دسترسی برای تخصیص سطح دسترسی به نقش در پنل', 1, NULL, '2024-01-18 17:18:22', '2024-01-18 17:18:22'),
(105, 'view-permissions', 'نمایش لیست سطوح دسترسی', 'سطح دسترسی برای نمایش لیست سطوح دسترسی در پنل', 1, NULL, '2024-01-18 17:19:20', '2024-01-18 17:19:20'),
(106, 'create-permission', 'ایجاد سطح دسترسی جدید', 'سطح دسترسی برای ایجاد سطح دسترسی جدید در پنل', 1, NULL, '2024-01-18 17:19:59', '2024-01-18 17:20:10'),
(107, 'edit-permission', 'ویرایش سطح دسترسی', 'سطح دسترسی برای ویرایش سطح دسترسی در پنل', 1, NULL, '2024-01-18 17:21:00', '2024-01-18 17:21:00'),
(108, 'delete-permission', 'حذف سطح دسترسی', 'سطح دسترسی برای حذف سطح دسترسی در پنل', 1, NULL, '2024-01-18 17:22:03', '2024-01-18 17:22:03'),
(109, 'view-ticket-admins', 'نمایش لیست مسئولین تیکت', 'سطح دسترسی برای نمایش لیست مسئولین تیکت در پنل', 1, NULL, '2024-01-18 17:25:23', '2024-01-18 17:25:23'),
(110, 'edit-ticket-admin', 'ویرایش مسئولین تیکت', 'سطح دسترسی برای ویرایش مسئولین تیکت در پنل', 1, NULL, '2024-01-18 17:26:14', '2024-01-18 17:26:14'),
(111, 'view-ticket-category-list', 'نمایش لیست دسته بندی تیکت', 'سطح دسترسی برای نمایش لیست دسته بندی تیکت در پنل', 1, NULL, '2024-01-18 17:27:42', '2024-01-18 17:27:42'),
(112, 'create-ticket-category', 'ایجاد دسته بندی جدید تیکت', 'سطح دسترسی برای ایجاد دسته بندی جدید تیکت  در پنل', 1, NULL, '2024-01-18 17:28:53', '2024-01-18 17:28:53'),
(113, 'edit-ticket-category', 'ویرایش دسته بندی تیکت', 'سطح دسترسی برای ویرایش دسته بندی تیکت در پنل', 1, NULL, '2024-01-18 17:29:28', '2024-01-18 17:29:28'),
(114, 'delete-ticket-category', 'حذف دسته بندی تیکت', 'سطح دسترسی برای حذف دسته بندی تیکت در پنل', 1, NULL, '2024-01-18 17:30:04', '2024-01-18 17:30:04'),
(115, 'view-priorities-list', 'نمایش لیست اولویت ها', 'سطح دسترسی برای نمایش لیست اولویت ها در پنل', 1, NULL, '2024-01-18 17:31:49', '2024-01-18 17:31:49'),
(116, 'create-priority', 'ایجاد اولویت جدید', 'سطح دسترسی برای ایجاد اولویت جدید در پنل', 1, NULL, '2024-01-18 17:32:55', '2024-01-18 17:32:55'),
(117, 'edit-priority', 'ویرایش اولویت', 'سطح دسترسی برای ویرایش اولویت در پنل', 1, NULL, '2024-01-18 17:33:26', '2024-01-18 17:33:26'),
(118, 'delete-priority', 'حذف اولویت', 'سطح دسترسی برای حذف اولویت در پنل', 1, NULL, '2024-01-18 17:33:56', '2024-01-18 17:33:56'),
(119, 'view-tickets-list', 'نمایش لیست تیکت ها', 'سطح دسترسی برای نمایش لیست تیکت ها در پنل', 1, NULL, '2024-01-18 17:44:30', '2024-01-18 17:44:30'),
(120, 'show-ticket', 'مشاهده تیکت', 'سطح دسترسی برای مشاهده تیکت در پنل', 1, NULL, '2024-01-18 17:46:17', '2024-01-18 17:46:17'),
(121, 'view-notify-emails-list', 'نمایش لیست اطلاعیه ایمیلی', 'سطح دسترسی برای نمایش لیست اطلاعیه ایمیلی در پنل', 1, NULL, '2024-01-18 17:47:48', '2024-01-18 17:47:48'),
(122, 'create-notify-email', 'ایجاد اطلاعیه ایمیلی جدید', 'سطح دسترسی برای ایجاد اطلاعیه ایمیلی جدید در پنل', 1, NULL, '2024-01-18 17:48:23', '2024-01-18 17:48:23'),
(123, 'edit-notify-email', 'ویرایش اطلاعیه ایمیلی', 'سطح دسترسی برای ویرایش اطلاعیه ایمیلی در پنل', 1, NULL, '2024-01-18 17:49:40', '2024-01-18 17:49:40'),
(124, 'delete-notify-email', 'حذف اطلاعیه ایمیلی', 'سطح دسترسی برای حذف اطلاعیه ایمیلی در پنل', 1, NULL, '2024-01-18 17:50:32', '2024-01-18 17:50:32'),
(125, 'sync-notify-email-file', 'تخصیص فایل های ضمیمه شده به اطلاعیه ایمیلی', 'سطح دسترسی برای تخصیص فایل های ضمیمه شده به اطلاعیه ایمیلی در پنل', 1, NULL, '2024-01-18 17:52:06', '2024-01-18 17:52:06'),
(126, 'view-notify-sms-list', 'نمایش لیست اطلاعیه پیامکی', 'سطح دسترسی برای نمایش لیست اطلاعیه پیامکی در پنل', 1, NULL, '2024-01-18 17:53:13', '2024-01-18 17:53:13'),
(127, 'create-notify-sms', 'ایجاد اطلاعیه پیامکی جدید', 'سطح دسترسی برای ایجاد اطلاعیه پیامکی جدید در پنل', 1, NULL, '2024-01-18 17:53:55', '2024-01-18 17:53:55'),
(128, 'edit-notify-sms', 'ویرایش اطلاعیه پیامکی', 'سطح دسترسی برای ویرایش اطلاعیه پیامکی در پنل', 1, NULL, '2024-01-18 17:54:31', '2024-01-18 17:54:31'),
(129, 'delete-notify-sms', 'حذف اطلاعیه ایمیلی', 'سطح دسترسی برای حذف اطلاعیه ایمیلی در پنل', 1, NULL, '2024-01-18 17:55:12', '2024-01-18 17:55:12'),
(130, 'send-notify-sms', 'ارسال اطلاعیه پیامکی', 'سطح دسترسی برای ارسال اطلاعیه پیامکی در پنل', 1, NULL, '2024-01-18 17:55:45', '2024-01-18 17:55:45'),
(131, 'send-notify-email', 'ارسال اطلاعیه ایمیلی', 'سطح دسترسی برای ارسال اطلاعیه ایمیلی در پنل', 1, NULL, '2024-01-18 17:56:16', '2024-01-18 17:56:16'),
(132, 'view-settings-list', 'نمایش لیست تنظیمات سایت', 'سطح دسترسی برای نمایش لیست تنظیمات سایت در پنل', 1, NULL, '2024-01-18 17:57:14', '2024-01-18 17:57:14'),
(133, 'create-setting', 'ایجاد تنظیمات جدید', 'سطح دسترسی برای ایجاد تنظیمات جدید در پنل', 1, NULL, '2024-01-18 17:58:30', '2024-01-18 17:58:30'),
(134, 'edit-setting', 'ویرایش تنظیمات', 'سطح دسترسی برای ویرایش تنظیمات در پنل', 1, NULL, '2024-01-18 17:59:02', '2024-01-18 17:59:02'),
(135, 'delete-setting', 'حذف تنظیمات', 'سطح دسترسی برای حذف تنظیمات در پنل', 1, NULL, '2024-01-18 17:59:33', '2024-01-18 17:59:33'),
(136, 'view-provinces-list', 'نمایش لیست مدیریت استان و شهرستان', 'سطح دسترسی برای نمایش لیست مدیریت استان و شهرستان در پنل', 1, NULL, '2024-01-18 18:01:49', '2024-01-18 18:01:49'),
(137, 'create-province', 'ایجاد استان جدید', 'سطح دسترسی برای ایجاد استان جدید در پنل', 1, NULL, '2024-01-18 18:02:29', '2024-01-18 18:02:29'),
(138, 'edit-province', 'ویرایش استان', 'سطح دسترسی برای ویرایش استان در پنل', 1, NULL, '2024-01-18 18:03:05', '2024-01-18 18:03:05'),
(139, 'delete-province', 'حذف استان', 'سطح دسترسی برای حذف استان در پنل', 1, NULL, '2024-01-18 18:03:43', '2024-01-18 18:03:43'),
(140, 'view-cities-list', 'نمایش لیست شهرستان ها', 'سطح دسترسی برای نمایش لیست شهرستان ها در پنل', 1, NULL, '2024-01-18 18:04:38', '2024-01-18 18:04:38'),
(141, 'create-city', 'ایجاد شهرستان جدید', 'سطح دسترسی برای ایجاد شهرستان جدید در پنل', 1, NULL, '2024-01-18 18:05:11', '2024-01-18 18:05:11'),
(142, 'edit-city', 'ویرایش شهرستان', 'سطح دسترسی برای ویرایش شهرستان در پنل', 1, NULL, '2024-01-18 18:05:40', '2024-01-18 18:05:40'),
(143, 'delete-city', 'حذف شهرستان', 'سطح دسترسی برای حذف شهرستان در پنل', 1, NULL, '2024-01-18 18:06:06', '2024-01-18 18:06:06'),
(144, 'manage-index-page', 'مدیریت تنظیمات صفحه اصلی سایت', 'سطح دسترسی برای مدیریت تنظیمات صفحه اصلی سایت در پنل', 1, NULL, '2024-01-18 18:07:01', '2024-01-18 18:07:01'),
(145, 'view-orders-list', 'نمایش لیست سفارسات', 'سطح دسترسی برای نمایش لیست سفارسات در پنل', 1, NULL, '2024-01-18 18:09:22', '2024-01-18 18:09:22'),
(146, 'show-order', 'نمایش فاکتور سفارش', 'سطح دسترسی برای  نمایش فاکتور سفارش در پنل', 1, NULL, '2024-01-18 19:24:42', '2024-01-18 19:24:42'),
(147, 'change-order-send-status', 'تغییر وضعیت ارسال سفارش سفارشات', 'سطح دسترسی برای تغییر وضعیت ارسال سفارش سفارشات در پنل', 1, NULL, '2024-01-18 19:28:07', '2024-01-18 19:29:48'),
(148, 'change-order-status', 'تغییر وضعیت سفارش سفارشات', 'سطح دسترسی برای تغییر وضعیت سفارش سفارشات در پنل', 1, NULL, '2024-01-18 19:29:13', '2024-01-18 19:29:13'),
(149, 'delete-banner', 'حذف بنر', 'سطح دسترسی برای حذف بنر در پنل', 1, NULL, '2024-01-18 15:27:17', '2024-01-18 15:27:17'),
(150, 'show-comment-content', 'مشاهده نظر محتوی', 'سطح دسترسی برای مشاهده نظر محتوی در پنل', 1, NULL, '2024-01-18 13:50:17', '2024-01-18 13:50:17'),
(151, 'show-payment', 'مشاهده پرداخت', 'سطح دسترسی برای مشاهده پرداخت در پنل', 1, NULL, '2024-01-18 07:08:18', '2024-01-18 07:08:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;