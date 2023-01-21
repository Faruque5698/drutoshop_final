-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 08:28 PM
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
(26, 33, 2, 3, 200, '2022-08-25 11:36:01', '2022-08-25 11:36:01'),
(27, 33, 4, 5, 100, '2022-08-25 11:36:02', '2022-08-25 11:36:02'),
(28, 33, 3, 4, 50, '2022-08-25 11:36:02', '2022-08-25 11:36:02'),
(29, 33, 2, 2, 30, '2022-08-25 11:36:02', '2022-08-25 11:36:02'),
(30, 34, 2, 3, 500, '2022-08-25 11:37:49', '2022-08-25 11:37:49'),
(31, 34, 4, 2, 40, '2022-08-25 11:37:49', '2022-08-25 11:37:49'),
(32, 35, 2, 3, 50, '2022-08-25 11:39:34', '2022-08-25 11:39:34'),
(33, 35, 4, 5, 40, '2022-08-25 11:39:34', '2022-08-25 11:39:34'),
(34, 36, 2, 3, 50, '2022-08-25 11:42:28', '2022-08-25 11:42:28'),
(35, 36, 3, 5, 150, '2022-08-25 11:42:28', '2022-08-25 11:42:28'),
(36, 36, 3, 5, 150, '2022-08-25 11:42:29', '2022-08-25 11:42:29'),
(37, 37, 3, 2, 500, '2022-08-25 11:47:24', '2022-08-25 11:47:24'),
(38, 37, 4, 4, 200, '2022-08-25 11:47:24', '2022-08-25 11:47:24'),
(39, 37, 9, 3, 500, '2022-08-25 11:47:24', '2022-08-25 11:47:24'),
(40, 38, 10, 4, 20, '2022-08-25 11:49:58', '2022-08-25 11:49:58'),
(41, 38, 8, 3, 50, '2022-08-25 11:49:58', '2022-08-25 11:49:58'),
(42, 38, 3, 5, 80, '2022-08-25 11:49:58', '2022-08-25 11:49:58'),
(43, 39, 3, 2, 1000, '2022-08-25 11:54:26', '2022-08-25 11:54:26'),
(44, 39, 8, 3, 1000, '2022-08-25 11:54:26', '2022-08-25 11:54:26'),
(45, 39, 9, 4, 1000, '2022-08-25 11:54:26', '2022-08-25 11:54:26'),
(46, 39, 10, 5, 1000, '2022-08-25 11:54:26', '2022-08-25 11:54:26'),
(47, 40, 3, 2, 10, '2022-08-25 12:00:29', '2022-08-25 12:00:29'),
(48, 40, 8, 3, 100, '2022-08-25 12:00:29', '2022-08-25 12:00:29'),
(49, 40, 9, 4, 100, '2022-08-25 12:00:29', '2022-08-25 12:00:29'),
(50, 40, 4, 5, 100, '2022-08-25 12:00:29', '2022-08-25 12:00:29'),
(51, 40, 10, 6, 20, '2022-08-25 12:00:29', '2022-08-25 12:00:29'),
(52, 40, 10, 6, 20, '2022-08-25 12:00:30', '2022-08-25 12:00:30'),
(53, 40, 8, 3, 20, '2022-08-25 12:00:30', '2022-08-25 12:00:30'),
(54, 41, 3, 2, 200, '2022-08-25 12:02:42', '2022-08-25 12:02:42'),
(55, 41, 9, 4, 200, '2022-08-25 12:02:42', '2022-08-25 12:02:42'),
(56, 41, 10, 6, 200, '2022-08-25 12:02:43', '2022-08-25 12:02:43'),
(57, 42, 4, 4, 200, '2022-08-25 12:05:10', '2022-08-25 12:05:10');

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
(6, 33, 'assets/images/product/download (2).jpeg', 'assets/images/product/download (4).jpeg', 'assets/images/product/download (5).jpeg', 'assets/images/product/images (7).jpeg', NULL, '2022-08-25 11:36:01'),
(7, 34, 'assets/images/product/images (1).jpeg', 'assets/images/product/download (3).jpeg', 'assets/images/product/images (3).jpeg', NULL, NULL, '2022-08-25 11:37:49'),
(8, 35, 'assets/images/product/download (4).jpeg', 'assets/images/product/images (7).jpeg', 'assets/images/product/images (4).jpeg', NULL, NULL, '2022-08-25 11:39:34'),
(9, 36, 'assets/images/product/images (5).jpeg', 'assets/images/product/images.jpeg', 'assets/images/product/download (7).jpeg', NULL, NULL, '2022-08-25 11:42:28'),
(10, 37, 'assets/images/product/images.jpeg', 'assets/images/product/images (1).jpeg', 'assets/images/product/download (7).jpeg', NULL, NULL, '2022-08-25 11:47:24'),
(11, 38, 'assets/images/product/images (2).jpeg', 'assets/images/product/images (3).jpeg', 'assets/images/product/images (4).jpeg', 'assets/images/product/download (7).jpeg', NULL, '2022-08-25 11:49:58'),
(12, 39, 'assets/images/product/download (3).jpeg', 'assets/images/product/download (4).jpeg', 'assets/images/product/download (6).jpeg', NULL, NULL, '2022-08-25 11:54:26'),
(13, 40, 'assets/images/product/download (1).jpeg', 'assets/images/product/download (7).jpeg', 'assets/images/product/download (5).jpeg', NULL, NULL, '2022-08-25 12:00:29'),
(14, 41, 'assets/images/product/images.jpeg', 'assets/images/product/download (3).jpeg', 'assets/images/product/download (11).jpeg', NULL, NULL, '2022-08-25 12:02:42'),
(15, 42, 'assets/images/product/download (5).jpeg', 'assets/images/product/download (6).jpeg', 'assets/images/product/download (2).jpeg', NULL, NULL, '2022-08-25 12:05:10');

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
(56, '2022_08_21_120304_create_stocks_table', 9),
(57, '2022_08_22_043426_create_color_size_qties_table', 10),
(58, '2022_08_22_043936_create_stock_products_table', 10),
(59, '2022_08_18_090234_create_gallery_products_table', 11),
(60, '2022_08_24_115357_create_size_color_quantities_table', 11);

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
(33, 1, 'Gothic Metal Cross GOTHX Oversize Purse Ladies Handbag | Backpack Rucksack Steam', 1, 1, 3, NULL, NULL, NULL, NULL, 750.00, 380, 653.00, 'METAL CROSS Oversize Purse Ladies Handbag\r\nExquisite Black Faux PU Leather bag with detachable short and long strap\r\nFinished with a upper metal chrome trim with Metal Cross with Celtic Cross surrounds\r\nTraditional Metal Ball Clasp opening with Inner Zip Pocket\r\nDimensions (Approx) H=25cm W=20cm D=8cm', 'assets/images/product/download (2).jpeg', 'gothic-metal-cross-gothx-oversize-purse-ladies-handbag-backpack-rucksack-steam', 'PRO-BD-73075', 'parcentage', 248140.00, 'product name', 'active', '2022-08-25 11:36:00', NULL),
(34, 1, 'Steam Punk Rock Goth | School College PU Vegan Leather Bag', 1, 1, 3, NULL, NULL, NULL, NULL, 550.00, 540, 500.00, 'METAL CROSS Oversize Purse Ladies Handbag\r\nExquisite Black Faux PU Leather bag with detachable short and long strap\r\nFinished with a upper metal chrome trim with Metal Cross with Celtic Cross surrounds\r\nTraditional Metal Ball Clasp opening with Inner Zip Pocket\r\nDimensions (Approx) H=25cm W=20cm D=8cm', 'assets/images/product/images (1).jpeg', 'steam-punk-rock-goth-school-college-pu-vegan-leather-bag', 'PRO-BD-38199', 'credit', 270000.00, 'product name', 'active', '2022-08-25 11:37:48', NULL),
(35, 1, 'Cross GOTHX Oversize Purse Ladies Handbag | Backpack', 1, 1, 3, NULL, NULL, NULL, NULL, 690.00, 50, 680.00, 'METAL CROSS Oversize Purse Ladies Handbag\r\nExquisite Black Faux PU Leather bag with detachable short and long strap\r\nFinished with a upper metal chrome trim with Metal Cross with Celtic Cross surrounds\r\nTraditional Metal Ball Clasp opening with Inner Zip Pocket\r\nDimensions (Approx) H=25cm W=20cm D=8cm', 'assets/images/product/download (4).jpeg', 'cross-gothx-oversize-purse-ladies-handbag-backpack', 'PRO-BD-67569', 'credit', 34000.00, 'product name', 'active', '2022-08-25 11:39:34', NULL),
(36, 1, 'SINOPHANT High Waisted Leggings for Women, Buttery Soft Elastic Opaque Tummy Control', 2, 1, 1, NULL, NULL, NULL, NULL, 199.00, 350, 190.00, 'SINOPHANT High Waisted Leggings for Women, Buttery Soft Elastic Opaque Tummy Control SINOPHANT High Waisted Leggings for Women, Buttery Soft Elastic Opaque Tummy Control SINOPHANT High Waisted Leggings for Women, Buttery Soft Elastic Opaque Tummy Control SINOPHANT High Waisted Leggings for Women, Buttery Soft Elastic Opaque Tummy Control', 'assets/images/product/images (5).jpeg', 'sinophant-high-waisted-leggings-for-women-buttery-soft-elastic-opaque-tummy-control', 'PRO-BD-69817', 'credit', 66500.00, 'product name', 'active', '2022-08-25 11:42:28', NULL),
(37, 1, 'Tummy Control Leggings,Plus Size Workout Gym Yoga Stretchy Pants', 2, 1, 1, NULL, NULL, NULL, NULL, 600.00, 1200, 570.00, 'SUPER STRETCHY LEGGINGS & TROUSERS - The super stretchy design can accommodate to most body shapes, ( One Size = Small-Medium, Plus Size = Large-X-Large and Extra Plus Size = XX-Large ). Don’t worry about the one size leggings, even you have big thighs or a petite figure, these leggings will definitely fit and make you look attractive. These yoga pants would stand up to what your mind imagined is putting lightly.\r\nSUPER SOFT & OPAQUE MATERIAL - Buttery soft peachskin fabric, not shrink in the dryer. This leggings is super soft, not fade, no pilling and fully breathable and moisture wicking, almost like a second skin. Basic almighty leggings for women follow your every pavement without any restrictions, not too thin or thick fabric for non see-through while squat, bends and twist.\r\n92% Polyester, 8% Elastane\r\nHand Wash Only\r\nFastening: Belt\r\nHigh\r\nJeggings', 'assets/images/product/images.jpeg', 'tummy-control-leggingsplus-size-workout-gym-yoga-stretchy-pants', 'PRO-BD-66562', 'parcentage', 684000.00, 'product name', 'active', '2022-08-25 11:47:24', NULL),
(38, 1, 'SUPER SOFT & OPAQUE MATERIAL', 2, 3, 6, NULL, NULL, NULL, NULL, 1200.00, 150, 960.00, 'SUPER STRETCHY LEGGINGS & TROUSERS - The super stretchy design can accommodate to most body shapes, ( One Size = Small-Medium, Plus Size = Large-X-Large and Extra Plus Size = XX-Large ). Don’t worry about the one size leggings, even you have big thighs or a petite figure, these leggings will definitely fit and make you look attractive. These yoga pants would stand up to what your mind imagined is putting lightly.\r\nSUPER SOFT & OPAQUE MATERIAL - Buttery soft peachskin fabric, not shrink in the dryer. This leggings is super soft, not fade, no pilling and fully breathable and moisture wicking, almost like a second skin. Basic almighty leggings for women follow your every pavement without any restrictions, not too thin or thick fabric for non see-through while squat, bends and twist.\r\n92% Polyester, 8% Elastane\r\nHand Wash Only\r\nFastening: Belt\r\nHigh\r\nJeggings', 'assets/images/product/images (2).jpeg', 'super-soft-opaque-material', 'PRO-BD-55988', 'parcentage', 144000.00, 'product name', 'active', '2022-08-25 11:49:57', NULL),
(39, 1, 'Hp AMD Pro Laptop', 4, 5, 10, NULL, NULL, NULL, NULL, 12000.00, 4000, 10800.00, 'SUPER STRETCHY LEGGINGS & TROUSERS - The super stretchy design can accommodate to most body shapes, ( One Size = Small-Medium, Plus Size = Large-X-Large and Extra Plus Size = XX-Large ). Don’t worry about the one size leggings, even you have big thighs or a petite figure, these leggings will definitely fit and make you look attractive. These yoga pants would stand up to what your mind imagined is putting lightly.', 'assets/images/product/download (3).jpeg', 'hp-amd-pro-laptop', 'PRO-BD-43453', 'parcentage', 43200000.00, 'product name', 'active', '2022-08-25 11:54:26', NULL),
(40, 1, 'Apple Pro-mac Laptop', 3, 5, 10, NULL, NULL, NULL, NULL, 10000.00, 10000, 8800.00, 'SUPER STRETCHY LEGGINGS & TROUSERS - The super stretchy design can accommodate to most body shapes, ( One Size = Small-Medium, Plus Size = Large-X-Large and Extra Plus Size = XX-Large ). Don’t worry about the one size leggings, even you have big thighs or a petite figure, these leggings will definitely fit and make you look attractive. These yoga pants would stand up to what your mind imagined is putting lightly.', 'assets/images/product/download (1).jpeg', 'apple-pro-mac-laptop', 'PRO-BD-31493', 'parcentage', 88000000.00, 'product name', 'active', '2022-08-25 12:00:29', NULL),
(41, 1, 'Chava Simpson', 5, 2, 4, NULL, NULL, NULL, NULL, 15000.00, 600, 13500.00, 'SUPER STRETCHY LEGGINGS & TROUSERS - The super stretchy design can accommodate to most body shapes, ( One Size = Small-Medium, Plus Size = Large-X-Large and Extra Plus Size = XX-Large ). Don’t worry about the one size leggings, even you have big thighs or a petite figure, these leggings will definitely fit and make you look attractive. These yoga pants would stand up to what your mind imagined is putting lightly.', 'assets/images/product/images.jpeg', 'chava-simpson', 'PRO-BD-75072', 'parcentage', 8100000.00, 'product name', 'active', '2022-08-25 12:02:42', NULL),
(42, 1, 'Earbuds 5.0 Bluetooth Earphone Headphone', 5, 2, 5, NULL, NULL, NULL, NULL, 15000.00, 200, 12750.00, 'SUPER STRETCHY LEGGINGS & TROUSERS - The super stretchy design can accommodate to most body shapes, ( One Size = Small-Medium, Plus Size = Large-X-Large and Extra Plus Size = XX-Large ). Don’t worry about the one size leggings, even you have big thighs or a petite figure, these leggings will definitely fit and make you look attractive. These yoga pants would stand up to what your mind imagined is putting lightly.', 'assets/images/product/download (5).jpeg', 'earbuds-50-bluetooth-earphone-headphone', 'PRO-BD-79350', 'parcentage', 2550000.00, 'product name', 'active', '2022-08-25 12:05:10', NULL);

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
(3, 'S', 'inactive', '2022-06-24 07:15:06', NULL),
(4, 'XL', 'active', '2022-06-28 23:28:14', NULL),
(8, 'M', 'active', '2022-08-25 11:44:51', NULL),
(9, 'L', 'active', '2022-08-25 11:45:09', NULL),
(10, 'XXL', 'active', '2022-08-25 11:45:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `size_color_quantities`
--

CREATE TABLE `size_color_quantities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `size_color_quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(11, 33, 380, 380, 0, '2022-08-25 11:36:02', '2022-08-25 11:36:02'),
(12, 34, 540, 540, 0, '2022-08-25 11:37:49', '2022-08-25 11:37:49'),
(13, 35, 50, 50, 0, '2022-08-25 11:39:35', '2022-08-25 11:39:35'),
(14, 36, 350, 350, 0, '2022-08-25 11:42:29', '2022-08-25 11:42:29'),
(15, 37, 1200, 1200, 0, '2022-08-25 11:47:24', '2022-08-25 11:47:24'),
(16, 38, 150, 150, 0, '2022-08-25 11:49:58', '2022-08-25 11:49:58'),
(17, 39, 4000, 4000, 0, '2022-08-25 11:54:27', '2022-08-25 11:54:27'),
(18, 40, 10000, 10000, 0, '2022-08-25 12:00:30', '2022-08-25 12:00:30'),
(19, 41, 600, 600, 0, '2022-08-25 12:02:43', '2022-08-25 12:02:43'),
(20, 42, 200, 200, 0, '2022-08-25 12:05:10', '2022-08-25 12:05:10');

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
-- Indexes for table `size_color_quantities`
--
ALTER TABLE `size_color_quantities`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `size_color_quantities`
--
ALTER TABLE `size_color_quantities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_products`
--
ALTER TABLE `stock_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
