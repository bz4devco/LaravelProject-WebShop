-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2024 at 12:30 PM
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
(1, 'دیجی کالا', '<h1>هر آنچه که نیاز دارید با بهترین قیمت از دیجی&zwnj;کالا بخرید! جدیدترین انواع گوشی موبایل، لپ تاپ، لباس، لوازم آرایشی و بهداشتی، کتاب، لوازم خانگی، خودرو و... با امکان تعویض و مرجوعی آسان | ✓ارسال رايگان ✓پرداخت در محل ✓ضمانت بازگشت کالا - برای خرید کلیک کنید!</h1>', 'فروشگاه اینترنتی,دیجی کالا,digikala,موبیل,لپ تاپ,پوشاک,فروش آنلاین,ارسال رایگان,سفر,ورزشی', '\"images\\\\setting\\\\2024\\\\01\\\\11\\\\logo.svg\"', '\"images\\\\setting\\\\2024\\\\01\\\\11\\\\icon.png\"', 'http://127.0.0.1:8000', 1, '02161930000', 'info@digikala.com', 'تهران تهران محله کاووسیه، خیابان گاندی جنوبی، خیابان بیست و یکم، پلاک 28، طبقه نهم', 'http://telegram.com/digikala', 'http://inestagram.com/digikala', 'http://linkedin.com/digikala', 'http://twitter.com/digikala', 'https://twitter.com/digikala', '<link href=\"/Content/CSS/leaflet.css?v=5.0.0.3777\" rel=\"stylesheet\">\n                                <script src=\"/Content/JS/leaflet.js?v=5.0.0.3777\"></script> <div id=\"map\" class=\"map map-home leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom\" style=\"width: 100%; height: 350px; border: 1px solid rgb(239, 239, 239) !important; position: relative; outline: none;\" tabindex=\"0\"><div style=\"text-align: center;height: 350px;\" \"=\"\"> <img src=\"../Content/Images/Main/loader.gif\" style=\"width: 20%; margin: auto;\"> </div><table style=\"height: 100%; margin: auto;\"> <tbody><tr>  </tr> </tbody></table><div class=\"leaflet-pane leaflet-map-pane\" style=\"transform: translate3d(0px, 8px, 0px);\"><div class=\"leaflet-pane leaflet-tile-pane\"><div class=\"leaflet-layer \" style=\"z-index: 1; opacity: 1;\"><div class=\"leaflet-tile-container leaflet-zoom-animated\" style=\"z-index: 18; transform: translate3d(0px, 0px, 0px) scale(1);\"><img alt=\"\" role=\"presentation\" src=\"https://c.tile.openstreetmap.org/16/42127/25789.png\" class=\"leaflet-tile leaflet-tile-loaded\" style=\"width: 256px; height: 256px; transform: translate3d(176px, -100px, 0px); opacity: 1;\"><img alt=\"\" role=\"presentation\" src=\"https://a.tile.openstreetmap.org/16/42127/25790.png\" class=\"leaflet-tile leaflet-tile-loaded\" style=\"width: 256px; height: 256px; transform: translate3d(176px, 156px, 0px); opacity: 1;\"><img alt=\"\" role=\"presentation\" src=\"https://b.tile.openstreetmap.org/16/42126/25789.png\" class=\"leaflet-tile leaflet-tile-loaded\" style=\"width: 256px; height: 256px; transform: translate3d(-80px, -100px, 0px); opacity: 1;\"><img alt=\"\" role=\"presentation\" src=\"https://a.tile.openstreetmap.org/16/42128/25789.png\" class=\"leaflet-tile leaflet-tile-loaded\" style=\"width: 256px; height: 256px; transform: translate3d(432px, -100px, 0px); opacity: 1;\"><img alt=\"\" role=\"presentation\" src=\"https://c.tile.openstreetmap.org/16/42126/25790.png\" class=\"leaflet-tile leaflet-tile-loaded\" style=\"width: 256px; height: 256px; transform: translate3d(-80px, 156px, 0px); opacity: 1;\"><img alt=\"\" role=\"presentation\" src=\"https://b.tile.openstreetmap.org/16/42128/25790.png\" class=\"leaflet-tile leaflet-tile-loaded\" style=\"width: 256px; height: 256px; transform: translate3d(432px, 156px, 0px); opacity: 1;\"></div></div></div><div class=\"leaflet-pane leaflet-shadow-pane\"><img src=\"../Content/Images/Markers/marker-shadow.png\" class=\"leaflet-marker-shadow leaflet-zoom-animated\" alt=\"\" style=\"margin-left: -30px; margin-top: -60px; width: 60px; height: 60px; transform: translate3d(275px, 174px, 0px);\"></div><div class=\"leaflet-pane leaflet-overlay-pane\"></div><div class=\"leaflet-pane leaflet-marker-pane\"><img src=\"../Content/Images/Markers/Main.png\" class=\"leaflet-marker-icon leaflet-zoom-animated leaflet-interactive\" alt=\"\" tabindex=\"0\" style=\"margin-left: -40px; margin-top: -50px; width: 50px; height: 50px; transform: translate3d(275px, 174px, 0px); z-index: 174;\"></div><div class=\"leaflet-pane leaflet-tooltip-pane\"></div><div class=\"leaflet-pane leaflet-popup-pane\"><div class=\"leaflet-popup  leaflet-zoom-animated\" style=\"opacity: 1; transform: translate3d(261px, 139px, 0px); bottom: -7px; left: -171px;\"><div class=\"leaflet-popup-content-wrapper\"><div class=\"leaflet-popup-content\" style=\"width: 301px;\"><strong>دیجی کالا</strong><br><br>تهران تهران محله کاووسیه، خیابان گاندی جنوبی، خیابان بیست و یکم، پلاک 28، طبقه نهم<br><br>02161930000</div></div><div class=\"leaflet-popup-tip-container\"><div class=\"leaflet-popup-tip\"></div></div><a class=\"leaflet-popup-close-button\" href=\"#close\">×</a></div></div><div class=\"leaflet-proxy leaflet-zoom-animated\" style=\"transform: translate3d(1.07846e+07px, 6.60225e+06px, 0px) scale(32768);\"></div></div><div class=\"leaflet-control-container\"><div class=\"leaflet-top leaflet-left\"><div class=\"leaflet-control-zoom leaflet-bar leaflet-control\"><a class=\"leaflet-control-zoom-in\" href=\"#\" title=\"Zoom in\" role=\"button\" aria-label=\"Zoom in\">+</a><a class=\"leaflet-control-zoom-out\" href=\"#\" title=\"Zoom out\" role=\"button\" aria-label=\"Zoom out\">−</a></div></div><div class=\"leaflet-top leaflet-right\"></div><div class=\"leaflet-bottom leaflet-left\"></div><div class=\"leaflet-bottom leaflet-right\"><div class=\"leaflet-control-attribution leaflet-control\"><a href=\"http://leafletjs.com\" title=\"A JS library for interactive maps\">Leaflet</a> | © <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors</div></div></div></div><script>function loadmap() { var osmUrl = \'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png\', osmAttrib = \'&copy; <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors\', osm = L.tileLayer(osmUrl, { maxZoom: 18, attribution: osmAttrib }); var map = L.map(\'map\').setView([35.75510767357269,51.412646781876546], 16).addLayer(osm);var greenIcon = L.icon({iconUrl: \'../Content/Images/Markers/Main.png\',shadowUrl: \'../Content/Images/Markers/marker-shadow.png\',iconSize:[50, 50],shadowSize:[60, 60],iconAnchor: [40, 50],shadowAnchor: [30, 60],popupAnchor:  [-14, -35]}); L.marker([35.75510767357269, 51.412646781876546], {icon: greenIcon}).addTo(map).bindPopup(\'<strong>دیجی کالا</strong><br /><br />تهران تهران محله کاووسیه، خیابان گاندی جنوبی، خیابان بیست و یکم، پلاک 28، طبقه نهم<br /><br />02161930000\').openPopup(); } </script>', '{\"slider\":\"on\",\"mostVisitedProducts\":\"on\",\"middleBanners\":\"on\",\"popularProducts\":\"on\",\"fourBanners\":\"on\",\"offerProducts\":\"on\",\"bottomBanner\":\"on\",\"brands\":\"on\"}', 1, '2023-12-12 20:00:10', '2024-01-19 13:39:35', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
