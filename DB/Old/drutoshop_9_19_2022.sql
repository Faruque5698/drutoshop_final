-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2022 at 02:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drutoshop_notification`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `address_name`, `address`, `zipcode`, `city`, `created_at`, `updated_at`) VALUES
(1, 1, 'Home', 'Fulltola, Panchagarh', 5000, 'Dhaka, Bangladesh', '2022-09-16 12:15:36', '2022-09-18 02:00:01'),
(3, 7, 'Bari', 'Fulltola Baza, Panchagarh', 5000, 'Dhaka,,Bangladesh', '2022-09-17 03:54:39', '2022-09-17 04:02:30'),
(6, 8, 'Home', 'Fulltola Baza, Panchagarh', 5000, 'Dhaka , Bangladesh', '2022-09-17 04:09:50', '2022-09-17 04:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `add_to_carts`
--

CREATE TABLE `add_to_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_price` double(10,2) DEFAULT NULL,
  `product_total_price` double(10,2) DEFAULT NULL,
  `color_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_reset_passes`
--

CREATE TABLE `admin_reset_passes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_reset_passes`
--

INSERT INTO `admin_reset_passes` (`id`, `user_id`, `token`, `created_at`, `updated_at`) VALUES
(17, 1, 18745, '2022-09-17 02:54:43', '2022-09-17 02:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_title`, `photo`, `summary`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mart', 'assets/images/brand/Mart-1660811636.jpg', NULL, 'active', '2022-08-18 02:21:47', '2022-08-18 02:33:56'),
(2, 'Fashon', NULL, NULL, 'active', '2022-08-18 02:22:10', '2022-08-18 02:22:10'),
(3, 'Apple', NULL, NULL, 'active', '2022-08-18 02:23:05', '2022-08-18 02:23:05'),
(4, 'HP', NULL, NULL, 'active', '2022-08-18 02:23:27', '2022-08-18 02:23:27'),
(5, 'Beauty', NULL, NULL, 'active', '2022-08-18 02:23:55', '2022-08-18 02:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `photo`, `summary`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Women\'s Fashion', 'assets/images/category/open-the-would-1647581259.png', NULL, 'active', '2022-08-18 01:35:44', '2022-08-18 01:35:44'),
(2, 'Health & Beauty', NULL, NULL, 'active', '2022-08-18 01:36:07', '2022-08-18 01:36:07'),
(3, 'Watches, Bags, Jewellery', NULL, NULL, 'active', '2022-08-18 01:37:12', '2022-08-18 01:37:12'),
(4, 'Men\'s Fashion', NULL, NULL, 'active', '2022-08-18 01:37:34', '2022-08-18 01:37:34'),
(5, 'Electronic Devices', NULL, NULL, 'active', '2022-08-18 01:37:59', '2022-08-18 01:37:59'),
(6, 'Home & Lifestyle', NULL, NULL, 'active', '2022-08-18 01:38:23', '2022-08-18 01:38:23'),
(7, 'Sports & Outdoor', NULL, NULL, 'active', '2022-08-18 01:38:42', '2022-08-18 01:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `color_code`, `status`, `created_at`, `updated_at`) VALUES
(2, 'White', '#fafafa', 'active', NULL, '2022-06-28 23:45:23'),
(3, 'Black', '#000000', 'active', NULL, NULL),
(4, 'Ornge', '#f8960d', 'active', '2022-06-28 23:45:06', NULL),
(5, 'Green', '#0ff01e', 'active', '2022-06-29 12:32:09', NULL),
(6, 'Coffe', '#fff242', 'active', '2022-06-29 12:33:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `color_size_qties`
--

CREATE TABLE `color_size_qties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` int(11) NOT NULL,
  `size_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_color_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color_size_qties`
--

INSERT INTO `color_size_qties` (`id`, `product_id`, `size_id`, `size_name`, `color_name`, `color_code`, `size_color_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'S', 'White', '#fafafa', 90, '2022-08-29 08:26:01', '2022-08-31 05:21:35'),
(2, 1, 8, 'M', 'Black', '#000000', 500, '2022-08-29 08:26:01', '2022-08-29 08:26:01'),
(3, 1, 9, 'L', 'Ornge', '#f8960d', 100, '2022-08-29 08:26:02', '2022-08-29 08:26:02'),
(4, 2, 8, 'M', 'Black', '#000000', 100, '2022-08-29 08:28:21', '2022-08-29 08:28:21'),
(5, 2, 9, 'L', 'Ornge', '#f8960d', 200, '2022-08-29 08:28:22', '2022-08-29 08:28:22'),
(6, 2, 10, 'XXL', 'Green', '#0ff01e', 400, '2022-08-29 08:28:22', '2022-08-29 08:28:22'),
(7, 3, 3, 'S', 'Black', '#000000', 100, '2022-08-29 08:29:47', '2022-08-29 08:29:47'),
(8, 3, 8, 'M', 'Ornge', '#f8960d', 500, '2022-08-29 08:29:47', '2022-08-29 08:29:47'),
(9, 4, 3, 'S', 'White', '#fafafa', 100, '2022-08-29 08:53:35', '2022-08-29 08:53:35'),
(10, 4, 8, 'M', 'Black', '#000000', 20, '2022-08-29 08:53:35', '2022-08-29 08:53:35'),
(11, 4, 9, 'L', 'Ornge', '#f8960d', 50, '2022-08-29 08:53:35', '2022-08-29 08:53:35'),
(12, 4, 10, 'XXL', 'Coffe', '#fff242', 100, '2022-08-29 08:53:35', '2022-08-29 08:53:35'),
(13, 5, 3, 'S', 'White', '#fafafa', 376, '2022-08-29 09:10:44', '2022-08-29 09:10:44'),
(14, 5, 8, 'M', 'Black', '#000000', 100, '2022-08-29 09:10:45', '2022-08-29 09:10:45'),
(15, 5, 9, 'L', 'Ornge', '#f8960d', 10, '2022-08-29 09:10:45', '2022-08-29 09:10:45'),
(16, 5, 10, 'XXL', 'Coffe', '#fff242', 1000, '2022-08-29 09:10:45', '2022-08-29 09:10:45'),
(17, 6, 8, 'M', 'White', '#fafafa', 661, '2022-09-15 23:17:53', '2022-09-15 23:17:53'),
(18, 16, 3, 'S', 'White', '#fafafa', 747, '2022-09-16 05:24:51', '2022-09-16 05:24:51'),
(19, 16, 8, 'M', 'Ornge', '#f8960d', 100, '2022-09-16 05:24:51', '2022-09-16 05:24:51'),
(20, 17, 9, 'L', 'Black', '#000000', 50, '2022-09-18 02:10:12', '2022-09-18 02:10:12'),
(21, 17, 10, 'XXL', 'Ornge', '#f8960d', 60, '2022-09-18 02:10:12', '2022-09-18 02:10:12');

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
-- Table structure for table `favourite_products`
--

CREATE TABLE `favourite_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_products`
--

CREATE TABLE `gallery_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_products`
--

INSERT INTO `gallery_products` (`id`, `product_id`, `image`, `image1`, `image2`, `image3`, `created_at`, `updated_at`) VALUES
(1, 1, 'assets/images/product/1661783161-.jpeg', 'assets/images/product/1661783161-.jpeg', NULL, NULL, NULL, '2022-08-29 08:26:01'),
(2, 2, 'assets/images/product/1661783301-.jpeg', 'assets/images/product/1661783301-.jpeg', 'assets/images/product/1661783301-.jpeg', NULL, NULL, '2022-08-29 08:28:21'),
(3, 3, 'assets/images/product/1661783387-.jpeg', 'assets/images/product/1661783387-.jpeg', 'assets/images/product/1661783387-.jpeg', NULL, NULL, '2022-08-29 08:29:47'),
(4, 4, 'assets/images/product/1661784814-.jpeg', 'assets/images/product/1661784815-.jpeg', 'assets/images/product/1661784815-.jpeg', NULL, NULL, '2022-08-29 08:53:35'),
(5, 5, 'assets/images/product/1661785844-.jpeg', 'assets/images/product/1661785844-.jpeg', 'assets/images/product/1661785844-.jpeg', NULL, NULL, '2022-08-29 09:10:44'),
(6, 6, 'assets/images/product/1663305473-.jpeg', NULL, NULL, NULL, NULL, NULL),
(7, 7, 'assets/images/product/1663305590-.jpeg', NULL, NULL, NULL, NULL, NULL),
(8, 8, 'assets/images/product/1663306698-.jpeg', NULL, NULL, NULL, NULL, NULL),
(9, 9, 'assets/images/product/1663306960-.jpeg', NULL, NULL, NULL, NULL, NULL),
(10, 10, 'assets/images/product/1663307216-.jpeg', NULL, NULL, NULL, NULL, NULL),
(11, 11, 'assets/images/product/1663307842-.jpeg', NULL, NULL, NULL, NULL, NULL),
(12, 12, 'assets/images/product/1663309437-.jpeg', NULL, NULL, NULL, NULL, NULL),
(13, 13, 'assets/images/product/1663324984-.jpeg', NULL, NULL, NULL, NULL, NULL),
(14, 14, 'assets/images/product/1663327040-.jpeg', 'assets/images/product/1663327040-1.jpeg', NULL, NULL, NULL, '2022-09-16 05:17:20'),
(15, 15, 'assets/images/product/1663327386-.jpeg', NULL, NULL, NULL, NULL, NULL),
(16, 16, 'assets/images/product/1663327491-.jpeg', NULL, NULL, NULL, NULL, NULL),
(17, 17, 'assets/images/product/1663488611-.jpeg', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screet_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `extra` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `code`, `name`, `images`, `client_id`, `screet_key`, `status`, `extra`, `description`, `created_at`, `updated_at`) VALUES
(1, 101, 'Paypal', 'Admin/image/gateway-image/1663588588-jpg', 'Paypal-Tvy+XM0v1eBARMklugZafbDNMCVoMGpY1j7OZY', 'Tvy+XM0v1eBARMklugZafbDNMCVoMGpY1j7OZY', 1, NULL, 'PayPal allows customers to establish an account on its platform, which is connected to a user\'s credit card or checking account. PayPal is a fast, simple, and secure way to make a payment online.', '2022-09-19 03:32:37', '2022-09-19 05:56:28'),
(2, 102, 'Stripe', 'Admin/image/gateway-image/1663588049-png', 'Stripe-Tvy+XM0v1eBARMklugZafbDNMCVoMGpY1j7OZY', 'Tvy+XM0v1eBARMklugZafbDNMCVoMGpY1j7OZY', 1, NULL, 'Stripe is a third-party payments processor built around a simple idea: make it easy for companies to do business online.', '2022-09-19 03:32:37', '2022-09-19 05:47:29'),
(3, 103, 'SSLcommerz', 'Admin/image/gateway-image/1663587098-png', 'SSLcpmmerz-vy+XM0v1eBARMklugZafbDNMCVoMGpY1j7OZY', 'Tvy+XM0v1eBARMklugZafbDNMCVoMGpY1j7OZY', 1, NULL, 'SSLcommerz is a third-party payments processor built around a simple idea: make it easy for companies to do business online.', '2022-09-19 03:32:37', '2022-09-19 05:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(29, '2014_10_12_000000_create_users_table', 1),
(30, '2014_10_12_100000_create_password_resets_table', 1),
(31, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(32, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(33, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(34, '2016_06_01_000004_create_oauth_clients_table', 1),
(35, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(36, '2019_08_19_000000_create_failed_jobs_table', 1),
(37, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(38, '2022_03_25_191247_create_homes_table', 1),
(43, '2022_06_24_115146_create_colors_table', 4),
(44, '2022_06_24_125902_create_sizes_table', 5),
(48, '2022_06_15_120625_create_categories_table', 7),
(49, '2022_06_16_101914_create_subcategories_table', 7),
(50, '2022_06_20_130347_create_brands_table', 7),
(51, '2022_07_27_091629_create_addresses_table', 7),
(52, '2022_08_03_054431_create_favourite_products_table', 7),
(53, '2022_08_03_073659_create_add_to_carts_table', 7),
(99, '2022_06_27_063912_create_products_table', 8),
(100, '2022_08_18_090234_create_gallery_products_table', 8),
(101, '2022_08_22_043426_create_color_size_qties_table', 8),
(102, '2022_08_22_043936_create_stock_products_table', 8),
(103, '2022_08_29_081300_create_temp_data_table', 8),
(104, '2022_08_31_052405_create_ratings_table', 9),
(107, '2022_08_31_085138_create_orders_table', 10),
(108, '2022_09_14_022728_create_notifications_table', 11),
(109, '2022_09_16_181354_create_admin_reset_passes_table', 12),
(113, '2022_09_19_071404_create_gateways_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('13b8fe652e3c7aebeabc8aa0349683fd29c2fc63665036c2990cf7756bea2ce740b1c97225921a73', 6, 7, 'authToken', '[]', 0, '2022-09-16 02:23:07', '2022-09-16 02:23:07', '2023-09-16 08:23:07'),
('437d8e0aed16cbaf17a258c30f5dd7db26011c0d006bddcc817cb41bf5bf75f2362580432cea22c4', 4, 1, 'authToken', '[]', 0, '2022-08-31 00:58:14', '2022-08-31 00:58:14', '2023-08-31 06:58:14'),
('9b443e0f8124431c78ca2fb75df17fed10b98ef8d661c3057cc234708b07ac7bc911e7e908662f74', 6, 7, 'authToken', '[]', 0, '2022-09-16 02:35:58', '2022-09-16 02:35:58', '2023-09-16 08:35:58'),
('d3958287d2c4e5c1bd01ef8b85eaaa6d7243251e4c33afaa052a8a804278c193ed608b95d187162a', 4, 1, 'authToken', '[]', 0, '2022-08-31 02:48:33', '2022-08-31 02:48:33', '2023-08-31 08:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'dOeB7YFmXJGSAL1KzGYRQqVknh5gSIYizpb58sH5', NULL, 'http://localhost', 1, 0, 0, '2022-08-30 23:49:33', '2022-08-30 23:49:33'),
(2, NULL, 'Laravel Password Grant Client', '8XfreCqY2YzOmTdnK7ZbjVVUNPLsnFN7SSkkI5Uz', 'users', 'http://localhost', 0, 1, 0, '2022-08-30 23:49:34', '2022-08-30 23:49:34'),
(3, NULL, 'Laravel Personal Access Client', 'ac2HuABOK8PFitIYPbKY7UZzIwejFlx7QVB7TLA5', NULL, 'http://localhost', 1, 0, 0, '2022-09-13 20:42:45', '2022-09-13 20:42:45'),
(4, NULL, 'Laravel Password Grant Client', 'g5QmXEmCJDsoK9PKnxrvaCF5siPMTBh6YV3BLIbF', 'users', 'http://localhost', 0, 1, 0, '2022-09-13 20:42:46', '2022-09-13 20:42:46'),
(5, NULL, 'Laravel Personal Access Client', '5SZkls0PhpdPGvc0EyPkf1J7yj5OgnKGmXrAMKGn', NULL, 'http://localhost', 1, 0, 0, '2022-09-13 20:42:56', '2022-09-13 20:42:56'),
(6, NULL, 'Laravel Password Grant Client', 'kOSOfO54aq2uRaM3YPyVV4Oyy2Rwj3f8tJ5vE0U7', 'users', 'http://localhost', 0, 1, 0, '2022-09-13 20:42:56', '2022-09-13 20:42:56'),
(7, NULL, 'Laravel Personal Access Client', 'mm7dvm1bPcjxyzuoK32OS5wlpo7TsjgJKmWyRsoU', NULL, 'http://localhost', 1, 0, 0, '2022-09-16 02:01:31', '2022-09-16 02:01:31'),
(8, NULL, 'Laravel Password Grant Client', '17vchKuASxtLTRo11gM3fmhQ8XcNsx8KwSF4MqCT', 'users', 'http://localhost', 0, 1, 0, '2022-09-16 02:01:31', '2022-09-16 02:01:31'),
(9, NULL, 'Laravel Personal Access Client', 'eV7S4RDfBqT2ERvmIeO5o3HIipEHIwSaHa5Fbs3d', NULL, 'http://localhost', 1, 0, 0, '2022-09-16 11:41:44', '2022-09-16 11:41:44'),
(10, NULL, 'Laravel Password Grant Client', 'xRjynjrRqdAKXtjqX1PYLWLs9BaCFNJm7KxbrXLu', 'users', 'http://localhost', 0, 1, 0, '2022-09-16 11:41:45', '2022-09-16 11:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-08-30 23:49:34', '2022-08-30 23:49:34'),
(2, 3, '2022-09-13 20:42:46', '2022-09-13 20:42:46'),
(3, 5, '2022-09-13 20:42:56', '2022-09-13 20:42:56'),
(4, 7, '2022-09-16 02:01:31', '2022-09-16 02:01:31'),
(5, 9, '2022-09-16 11:41:45', '2022-09-16 11:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `total_price` double(10,2) NOT NULL DEFAULT 0.00,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isPaid` int(11) NOT NULL DEFAULT 0,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `product_id`, `user_id`, `quantity`, `total_price`, `payment_type`, `size`, `color_code`, `isPaid`, `address`, `city`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ord-89472', 1, 4, 10, 1000.00, NULL, 'S', '#fafafa', 0, 'Kazipara, Mirpur 10', 'Dhaka', 0, '2022-08-31 05:21:35', '2022-08-31 05:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `size` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`size`)),
  `color` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`color`)),
  `price` double(10,2) NOT NULL,
  `discount_rate` double(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount_price` double(10,2) NOT NULL,
  `discription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` double(10,2) NOT NULL,
  `feature_product` tinyint(4) NOT NULL DEFAULT 0,
  `trand_product` tinyint(4) NOT NULL DEFAULT 0,
  `exclusive_product` tinyint(4) NOT NULL DEFAULT 0,
  `rate` double NOT NULL DEFAULT 0,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `product_name`, `brand_id`, `category_id`, `subcategory_id`, `size`, `color`, `price`, `discount_rate`, `quantity`, `discount_price`, `discription`, `image`, `slug`, `sku`, `credit`, `total_price`, `feature_product`, `trand_product`, `exclusive_product`, `rate`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Malachi Gordon', 2, 2, 4, '[\"S\",\"M\",\"L\"]', '[\"#fafafa\",\"#000000\",\"#f8960d\"]', 675.00, 75.00, 700, 600.00, 'Culpa voluptas volup', 'assets/images/product/1661783161-.jpeg', 'malachi-gordon', 'PRO-BD-71622', '-', 420000.00, 1, 1, 1, 5, 'active', '2022-08-29 08:26:01', '2022-08-31 01:18:01'),
(2, 1, 'Emery French', 5, 6, 13, '[\"M\",\"L\",\"XXL\"]', '[\"#000000\",\"#f8960d\",\"#0ff01e\"]', 1520.00, 15.00, 700, 1292.00, 'Error sit iste id', 'assets/images/product/1661783301-.jpeg', 'emery-french', 'PRO-BD-61989', '%', 904400.00, 1, 1, 1, 0, 'active', '2022-08-29 08:28:21', '2022-08-29 23:01:09'),
(3, 1, 'Ciaran Lawson', 3, 5, 10, '[\"S\",\"M\"]', '[\"#000000\",\"#f8960d\"]', 700.00, 5.00, 800, 665.00, 'Dolore tempor velit', 'assets/images/product/1661783387-.jpeg', 'ciaran-lawson', 'PRO-BD-32219', '%', 532000.00, 0, 1, 1, 0, 'active', '2022-08-29 08:29:47', '2022-08-29 23:01:11'),
(4, 1, 'Aline Lucas', 5, 2, 5, '[\"S\",\"M\",\"L\",\"XXL\"]', '[\"#fafafa\",\"#000000\",\"#f8960d\",\"#fff242\"]', 1500.00, 70.00, 500, 1430.00, 'Delectus sed odio q', 'assets/images/product/1661784814-.jpeg', 'aline-lucas', 'PRO-BD-63983', '-', 715000.00, 0, 1, 1, 0, 'active', '2022-08-29 08:53:35', '2022-08-29 23:01:13'),
(5, 1, 'Zachary Gordon', 2, 6, 13, '[\"S\",\"M\",\"L\",\"XXL\"]', '[\"#fafafa\",\"#000000\",\"#f8960d\",\"#fff242\"]', 460.00, 50.00, 347, 230.00, 'Incididunt anim culp', 'assets/images/product/1661785844-.jpeg', 'zachary-gordon', 'PRO-BD-40174', '%', 79810.00, 0, 1, 1, 0, 'active', '2022-08-29 09:10:44', '2022-08-29 23:01:16'),
(6, 1, 'Aladdin Hurst', 2, 5, 10, '[\"M\"]', '[\"#fafafa\"]', 496.00, 50.00, 661, 248.00, 'Ratione quaerat quia', 'assets/images/product/1663305473-.jpeg', 'aladdin-hurst', 'PRO-BD-19708', '%', 0.00, 0, 0, 0, 0, 'active', '2022-09-15 23:17:53', NULL),
(7, 1, 'Raja Cummings', 3, 7, 15, '[]', '[]', 412.00, 50.00, 0, 206.00, 'Magna repudiandae qu', 'assets/images/product/1663305590-.jpeg', 'raja-cummings', 'PRO-BD-66563', '%', 0.00, 0, 0, 0, 0, 'active', '2022-09-15 23:19:50', NULL),
(8, 1, 'Vladimir Black', 3, 3, 6, '[]', '[]', 804.00, 72.00, 0, 570.00, 'Voluptatem est tempo', 'assets/images/product/1663306698-.jpeg', 'vladimir-black', 'PRO-BD-76339', 'Select Discount Type', 526110.00, 0, 0, 0, 0, 'active', '2022-09-15 23:38:18', NULL),
(9, 1, 'Ira Flowers', 4, 3, 6, '[]', '[]', 460.00, 10.00, 0, 414.00, 'Dolorum sunt totam l', 'assets/images/product/1663306960-.jpeg', 'ira-flowers', 'PRO-BD-24580', '%', 200790.00, 0, 0, 1, 0, 'active', '2022-09-15 23:42:40', '2022-09-15 23:43:44'),
(10, 1, 'Velma Guy', 3, 1, 1, '[]', '[]', 58.00, 10.00, 0, 52.00, 'Vel sunt in voluptas', 'assets/images/product/1663307216-.jpeg', 'velma-guy', 'PRO-BD-17758', '%', 19396.00, 0, 0, 0, 0, 'active', '2022-09-15 23:46:56', NULL),
(11, 1, 'Dakota Acosta', 2, 4, 9, '[\"S\",\"M\"]', '[\"#fafafa\",\"#f8960d\"]', 797.00, 50.00, 150, 398.00, 'Optio id labore qui', 'assets/images/product/1663307842-.jpeg', 'dakota-acosta', 'PRO-BD-39660', '%', 131738.00, 0, 0, 0, 0, 'active', '2022-09-15 23:57:22', NULL),
(12, 1, 'Nadine Sanders', 2, 2, 4, '[\"S\",\"M\",\"L\"]', '[\"#000000\",\"#f8960d\",\"#0ff01e\"]', 254.00, 65.00, 650, 88.00, 'Esse eos pariatur L', 'assets/images/product/1663309437-.jpeg', 'nadine-sanders', 'PRO-BD-63612', '%', 57200.00, 0, 0, 0, 0, 'active', '2022-09-16 00:23:57', NULL),
(13, 1, 'Raja Cummings', 3, 3, 6, '[\"S\",\"M\"]', '[\"#fafafa\",\"#000000\"]', 500.00, 29.00, 550, 355.00, 'oijdasjd hfjkdsfdosifhios jfoskdflksdf', 'assets/images/product/1663324984-.jpeg', 'raja-cummings', 'PRO-BD-18036', '%', 195250.00, 0, 0, 0, 0, 'active', '2022-09-16 04:43:04', NULL),
(14, 1, 'Mark Walter', 5, 6, 13, '[]', '[]', 1000.00, 20.00, 0, 800.00, 'Tempora placeat com', 'assets/images/product/1663327040-.jpeg', 'mark-walter', 'PRO-BD-65685', '%', 657600.00, 0, 0, 0, 0, 'active', '2022-09-16 05:17:20', NULL),
(15, 1, 'Quail Simpson', 3, 2, 4, '[]', '[]', 357.00, 50.00, 533, 178.00, 'Rem qui qui non exer', 'assets/images/product/1663327386-.jpeg', 'quail-simpson', 'PRO-BD-47240', '%', 94874.00, 0, 0, 0, 0, 'active', '2022-09-16 05:23:06', NULL),
(16, 1, 'Matthew Riddle', 2, 1, 1, '[\"S\",\"M\"]', '[\"#fafafa\",\"#f8960d\"]', 908.00, 21.00, 847, 717.00, 'Rerum aliquam a sit', 'assets/images/product/1663327491-.jpeg', 'matthew-riddle', 'PRO-BD-92559', '%', 607299.00, 0, 0, 0, 0, 'active', '2022-09-16 05:24:51', NULL),
(17, 1, 'Raja Cummings', 2, 2, 4, '[\"L\",\"XXL\"]', '[\"#000000\",\"#f8960d\"]', 1500.00, 15.00, 110, 1275.00, 'This is product', 'assets/images/product/1663488611-.jpeg', 'raja-cummings', 'PRO-BD-73584', '%', 140250.00, 0, 0, 0, 0, 'active', '2022-09-18 02:10:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rating` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `product_id`, `user_id`, `rating`, `created_at`, `updated_at`) VALUES
(5, 1, 4, 5, '2022-08-31 01:18:01', '2022-08-31 01:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size_name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'S', 'active', '2022-06-24 07:15:06', '2022-08-29 23:00:27'),
(8, 'M', 'active', '2022-08-25 11:44:51', NULL),
(9, 'L', 'active', '2022-08-25 11:45:09', NULL),
(10, 'XXL', 'active', '2022-08-25 11:45:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock_products`
--

CREATE TABLE `stock_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `total_qty` int(11) NOT NULL,
  `last_qty` int(11) NOT NULL,
  `sale_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_products`
--

INSERT INTO `stock_products` (`id`, `product_id`, `total_qty`, `last_qty`, `sale_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 700, 690, 10, '2022-08-29 08:26:02', '2022-08-31 05:21:35'),
(2, 2, 700, 700, 0, '2022-08-29 08:28:22', '2022-08-29 08:28:22'),
(3, 3, 800, 800, 0, '2022-08-29 08:29:47', '2022-08-29 08:29:47'),
(4, 4, 500, 500, 0, '2022-08-29 08:53:35', '2022-08-29 08:53:35'),
(5, 5, 347, 347, 0, '2022-08-29 09:10:45', '2022-08-29 09:10:45'),
(6, 6, 661, 661, 0, '2022-09-15 23:17:53', '2022-09-15 23:17:53'),
(7, 7, 0, 0, 0, '2022-09-15 23:19:51', '2022-09-15 23:19:51'),
(8, 8, 0, 0, 0, '2022-09-15 23:38:19', '2022-09-15 23:38:19'),
(9, 9, 0, 0, 0, '2022-09-15 23:42:41', '2022-09-15 23:42:41'),
(10, 10, 373, 373, 0, '2022-09-15 23:46:56', '2022-09-15 23:46:56'),
(11, 11, 331, 331, 0, '2022-09-15 23:57:22', '2022-09-15 23:57:22'),
(12, 12, 650, 650, 0, '2022-09-16 00:23:57', '2022-09-16 00:23:57'),
(13, 13, 550, 550, 0, '2022-09-16 04:43:04', '2022-09-16 04:43:04'),
(14, 14, 822, 822, 0, '2022-09-16 05:17:20', '2022-09-16 05:17:20'),
(15, 15, 533, 533, 0, '2022-09-16 05:23:06', '2022-09-16 05:23:06'),
(16, 16, 847, 847, 0, '2022-09-16 05:24:51', '2022-09-16 05:24:51'),
(17, 17, 110, 110, 0, '2022-09-18 02:10:12', '2022-09-18 02:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `title`, `photo`, `summary`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Clothing', 'assets/images/category/Clothing-1660808603.jpg', NULL, 'active', '2022-08-18 01:43:23', '2022-08-18 01:43:23'),
(2, 1, 'Watches', 'assets/images/category/Watches-1660808724.jpg', NULL, 'active', '2022-08-18 01:45:24', '2022-08-18 01:45:24'),
(3, 1, 'Bags', 'assets/images/category/Bags-1660808757.jpg', NULL, 'active', '2022-08-18 01:45:57', '2022-08-18 01:45:57'),
(4, 2, 'Makeup', 'assets/images/category/Makeup-1660808802.jpg', NULL, 'active', '2022-08-18 01:46:42', '2022-08-18 01:46:42'),
(5, 2, 'Bath  & Body', 'assets/images/category/Bath  & Body-1660808856.jpg', NULL, 'active', '2022-08-18 01:47:36', '2022-08-18 01:47:36'),
(6, 3, 'Women\'s Bag', 'assets/images/category/Women\'s Bag-1660808944.jpg', NULL, 'active', '2022-08-18 01:49:04', '2022-08-18 01:49:04'),
(7, 3, 'Kids Watches', 'assets/images/category/Kids Watches-1660808989.jpg', NULL, 'active', '2022-08-18 01:49:49', '2022-08-18 01:49:49'),
(8, 4, 'Bags', 'assets/images/category/Bags-1660809037.jpg', NULL, 'active', '2022-08-18 01:50:37', '2022-08-18 01:50:37'),
(9, 4, 'Watch', 'assets/images/category/Watch-1660809075.jpg', NULL, 'active', '2022-08-18 01:51:15', '2022-08-18 01:51:15'),
(10, 5, 'Laptop', 'assets/images/category/Laptop-1660809231.jpeg', NULL, 'active', '2022-08-18 01:53:51', '2022-08-18 01:53:51'),
(11, 5, 'Desktop', 'assets/images/category/Desktop-1660809262.jpeg', NULL, 'active', '2022-08-18 01:54:22', '2022-08-18 01:54:22'),
(12, 5, 'Mobail', 'assets/images/category/Mobail-1660809289.jpg', NULL, 'active', '2022-08-18 01:54:49', '2022-08-18 01:54:49'),
(13, 6, 'Books', 'assets/images/category/Books-1660809333.jpg', NULL, 'active', '2022-08-18 01:55:33', '2022-08-18 01:55:33'),
(14, 6, 'Furniture', 'assets/images/category/Furniture-1660809395.jpg', NULL, 'active', '2022-08-18 01:56:35', '2022-08-18 01:56:35'),
(15, 7, 'Team Sports', 'assets/images/category/Team Sports-1660809447.jpg', NULL, 'active', '2022-08-18 01:57:27', '2022-08-18 01:57:27'),
(16, 7, 'Cricket', 'assets/images/category/Cricket-1660809513.jpg', NULL, 'active', '2022-08-18 01:58:33', '2022-08-18 01:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `temp_data`
--

CREATE TABLE `temp_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_id` int(11) NOT NULL,
  `size_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `isBan` tinyint(4) NOT NULL DEFAULT 1,
  `is_delete` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile_no`, `email_verified_at`, `password`, `image`, `role`, `isBan`, `is_delete`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md Rabbi Hasan', 'admin@gmail.com', '01766053807', NULL, '$2y$10$0DlHZtXOBgmbz367Y6FUxesL3uvDx1PPsb2civuTyikAs7GJKtwDW', 'Admin/image/Profile/202209161538-admin.jpg', 1, 1, 1, 1, NULL, '2022-06-16 05:24:56', '2022-09-17 02:55:50'),
(3, 'Rabbi Hasan', 'hasan610@gmail.com', NULL, NULL, '$2y$10$mn6NKFTnmUCLXqCckZl0DeHdjlS8XSVa2QcKvqWIF7Tjs8gH/0h.2', NULL, 1, 1, 1, 1, 'u1mN5DvbQbJyjYtriGIWQZBwyyFnXEQ4iST2aOpo9f5kfaZddNdTxbEWkn5I', '2022-06-28 11:24:30', '2022-06-28 11:24:30'),
(4, 'testuser', 'testuser@gmail.com', NULL, NULL, '$2y$10$TORkFQYvCncdN4xZSMN0h.OaS29YzvQT67xfttGfH6YlC34X6929y', NULL, 0, 1, 1, 1, NULL, '2022-08-31 00:58:13', '2022-08-31 00:58:13'),
(5, 'md rabbi hasan', 'rabbi@gmail.com', NULL, NULL, '$2y$10$SomAdkJk2pJltQQcHhuXj.qsK9rVtv6kJ9eaKaUfrvLUIgDWGCYb6', NULL, 0, 1, 1, 1, NULL, '2022-09-16 01:51:02', '2022-09-16 01:51:02'),
(6, 'md rabbi hasan', 'hasan02@gmail.com', NULL, NULL, '$2y$10$9vvtrNVA4X0scIXQC7yuoOaytcTuqCTTWVaMTTi6SnAsdZVZXZn3i', NULL, 0, 1, 1, 1, NULL, '2022-09-16 02:23:05', '2022-09-16 02:23:05'),
(7, 'nowsad', 'nowsad@gmail.com', '01710528972', NULL, '$2y$10$njtDVSsFonlnfza7jvZ4j.3YgfdJlETacSuNIhxWOQlXsiLhlXCbC', 'Admin/image/Profile/202209170945-DSC_0000007.jpg', 1, 1, 1, 1, NULL, '2022-09-17 03:41:04', '2022-09-17 03:45:16'),
(8, 'Remon', 'remon@gmail.com', '01710528973', NULL, '$2y$10$cPL96nqM27JZVHH78KfE5elbSO1trCtlKZMoz1.RAsWUUDY.qIMAq', 'Admin/image/Profile/202209171018-DSC_0000007.jpg', 1, 1, 1, 1, NULL, '2022-09-17 04:07:23', '2022-09-17 04:18:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `add_to_carts`
--
ALTER TABLE `add_to_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_reset_passes`
--
ALTER TABLE `admin_reset_passes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_size_qties`
--
ALTER TABLE `color_size_qties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_size_qties_product_id_foreign` (`product_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favourite_products`
--
ALTER TABLE `favourite_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_products`
--
ALTER TABLE `gallery_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_product_id_foreign` (`product_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_product_id_foreign` (`product_id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_products`
--
ALTER TABLE `stock_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_data`
--
ALTER TABLE `temp_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `temp_data_size_id_unique` (`size_id`),
  ADD UNIQUE KEY `temp_data_size_name_unique` (`size_name`),
  ADD UNIQUE KEY `temp_data_color_code_unique` (`color_code`),
  ADD UNIQUE KEY `temp_data_color_name_unique` (`color_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_no_unique` (`mobile_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `add_to_carts`
--
ALTER TABLE `add_to_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_reset_passes`
--
ALTER TABLE `admin_reset_passes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `color_size_qties`
--
ALTER TABLE `color_size_qties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourite_products`
--
ALTER TABLE `favourite_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_products`
--
ALTER TABLE `gallery_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stock_products`
--
ALTER TABLE `stock_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `temp_data`
--
ALTER TABLE `temp_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `color_size_qties`
--
ALTER TABLE `color_size_qties`
  ADD CONSTRAINT `color_size_qties_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery_products`
--
ALTER TABLE `gallery_products`
  ADD CONSTRAINT `gallery_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock_products`
--
ALTER TABLE `stock_products`
  ADD CONSTRAINT `stock_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
