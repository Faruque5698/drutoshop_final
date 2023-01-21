-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 08:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drutoshop`
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `color_id` int(11) NOT NULL,
  `size_color_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color_size_qties`
--

INSERT INTO `color_size_qties` (`id`, `product_id`, `size_id`, `color_id`, `size_color_qty`, `created_at`, `updated_at`) VALUES
(13, 22, 4, 5, 100, '2022-08-22 01:22:39', '2022-08-22 01:22:39'),
(14, 22, 3, 3, 100, '2022-08-22 01:22:39', '2022-08-22 01:22:39'),
(15, 22, 2, 4, 400, '2022-08-22 01:22:39', '2022-08-22 01:22:39'),
(16, 23, 4, 3, 70, '2022-08-22 01:30:13', '2022-08-22 01:30:13'),
(17, 23, 2, 4, 50, '2022-08-22 01:30:13', '2022-08-22 01:30:13'),
(18, 24, 4, 2, 100, '2022-08-22 01:38:58', '2022-08-22 01:38:58'),
(19, 24, 3, 5, 50, '2022-08-22 01:38:58', '2022-08-22 01:38:58');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_products`
--

INSERT INTO `gallery_products` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(116, 22, 'assets/images/gallery/tws-new-awesome-laptop-63032ebec81c2.jpeg', '2022-08-22 01:22:38', '2022-08-22 01:22:38'),
(117, 22, 'assets/images/gallery/tws-new-awesome-laptop-63032ebf09619.jpeg', '2022-08-22 01:22:39', '2022-08-22 01:22:39'),
(118, 23, 'assets/images/gallery/mi2020-big-sale-63033085578c3.jpeg', '2022-08-22 01:30:13', '2022-08-22 01:30:13'),
(119, 23, 'assets/images/gallery/mi2020-big-sale-6303308564fb4.jpeg', '2022-08-22 01:30:13', '2022-08-22 01:30:13'),
(120, 24, 'assets/images/gallery/chava-simpson-630332920f114.png', '2022-08-22 01:38:58', '2022-08-22 01:38:58'),
(121, 24, 'assets/images/gallery/chava-simpson-630332922fdea.jpeg', '2022-08-22 01:38:58', '2022-08-22 01:38:58'),
(122, 24, 'assets/images/gallery/chava-simpson-630332923d071.jpeg', '2022-08-22 01:38:58', '2022-08-22 01:38:58'),
(123, 24, 'assets/images/gallery/chava-simpson-6303329255861.jpeg', '2022-08-22 01:38:58', '2022-08-22 01:38:58');

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
(54, '2022_06_27_063912_create_products_table', 8),
(55, '2022_08_18_090234_create_gallery_products_table', 8),
(56, '2022_08_21_120304_create_stocks_table', 9),
(57, '2022_08_22_043426_create_color_size_qties_table', 10),
(58, '2022_08_22_043936_create_stock_products_table', 10);

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
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `size_qty` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `color_qty` int(11) DEFAULT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount_price` double(10,2) NOT NULL,
  `discription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` double(10,2) NOT NULL,
  `future_product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `product_name`, `brand_id`, `category_id`, `subcategory_id`, `size_id`, `size_qty`, `color_id`, `color_qty`, `price`, `quantity`, `discount_price`, `discription`, `image`, `slug`, `sku`, `discount_type`, `total_price`, `future_product`, `status`, `created_at`, `updated_at`) VALUES
(22, 1, 'TWS new Awesome Laptop', 4, 5, 10, NULL, NULL, NULL, NULL, 45500.00, 600, 43225.00, '12th Generation Intel® Core™ i5 processor Windows 11 Home 39.6 cm (15.6) diagonal, FHD (1920 x 1080), IPS, micro-edge, anti-glare, Low Blue Light, 300 nits, 100% sRGB Intel® Iris® Xᵉ Graphics 16 GB DDR4-3200 MHz RAM (2 x 8 GB) 1.74 kg\r\n6D4K3PA', 'assets/images/product/download (4).jpeg', 'tws-new-awesome-laptop', 'PRO-BD-74588', 'parcentage', 25935000.00, 'product name', 'active', '2022-08-22 01:22:38', NULL),
(23, 1, 'Mi2020 big sale', 3, 5, 12, NULL, NULL, NULL, NULL, 1450.00, 70, 1305.00, '2th Generation Intel® Core™ i5 processor Windows 11 Home 39.6 cm (15.6) diagonal, FHD (1920 x 1080), IPS, micro-edge, anti-glare, Low Blue Light, 300 nits, 100%', 'assets/images/product/images.jpeg', 'mi2020-big-sale', 'PRO-BD-29652', 'parcentage', 91350.00, 'product name', 'active', '2022-08-22 01:30:13', NULL),
(24, 1, 'Chava Simpson', 5, 1, 1, NULL, NULL, NULL, NULL, 2950.00, 150, 2900.00, '11th Generation Intel® Core™ i3 processor Windows 11 Home 39.6 cm (15.6) diagonal, FHD (1920 x 1080), micro-edge, anti-glare, 250 nits, 45% NTSC Intel® UHD Graphics 8 GB DDR4-3200 MHz RAM (1 x 8 GB) 1.75 kg\r\n6N041PA', 'assets/images/product/download (5).jpeg', 'chava-simpson', 'PRO-BD-50020', 'credit', 435000.00, 'product name', 'active', '2022-08-22 01:38:57', NULL);

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
(2, 'SM', 'inactive', '2022-06-24 07:14:52', '2022-06-24 07:38:36'),
(3, 'S', 'inactive', '2022-06-24 07:15:06', NULL),
(4, 'XL', 'active', '2022-06-28 23:28:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `total_qty` int(11) NOT NULL,
  `last_qty` int(11) NOT NULL,
  `sale_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, 22, 600, 600, 0, '2022-08-22 01:22:39', '2022-08-22 01:22:39'),
(4, 23, 70, 70, 0, '2022-08-22 01:30:13', '2022-08-22 01:30:13'),
(5, 24, 150, 150, 0, '2022-08-22 01:38:58', '2022-08-22 01:38:58');

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
(1, 'Admin', 'admin@gmail.com', NULL, NULL, '$2y$10$AhSr7LNxaj5HKc3Rr5N66evvZRf8de.553IKADk6M4WfSL2Bwf3zu', NULL, 1, 1, 1, 1, NULL, '2022-06-16 05:24:56', '2022-06-16 05:24:56'),
(3, 'Rabbi Hasan', 'hasan610@gmail.com', NULL, NULL, '$2y$10$mn6NKFTnmUCLXqCckZl0DeHdjlS8XSVa2QcKvqWIF7Tjs8gH/0h.2', NULL, 1, 1, 1, 1, 'u1mN5DvbQbJyjYtriGIWQZBwyyFnXEQ4iST2aOpo9f5kfaZddNdTxbEWkn5I', '2022-06-28 11:24:30', '2022-06-28 11:24:30');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_product_id_foreign` (`product_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_to_carts`
--
ALTER TABLE `add_to_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_products`
--
ALTER TABLE `stock_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_products`
--
ALTER TABLE `stock_products`
  ADD CONSTRAINT `stock_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
