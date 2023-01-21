-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2023 at 06:19 PM
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
-- Database: `drutoshop_notification`
--

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
  `price` double(10,2) NOT NULL,
  `discount_rate` double(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount_price` double(10,2) NOT NULL,
  `discription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` double(10,2) NOT NULL,
  `feature_product` tinyint(4) NOT NULL DEFAULT 0,
  `trand_product` tinyint(4) NOT NULL DEFAULT 0,
  `exclusive_product` tinyint(4) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `product_name`, `brand_id`, `category_id`, `subcategory_id`, `price`, `discount_rate`, `quantity`, `discount_price`, `discription`, `image`, `images`, `slug`, `sku`, `credit`, `total_price`, `feature_product`, `trand_product`, `exclusive_product`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Meredith Salazar', 3, 4, 8, 677.00, 631.00, 70, 559.00, 'Aute commodo ut iure', 'assets/images/product/1671089002-.jpg', '[\"assets\\/images\\/product\\/1671089002-.jpg\",\"assets\\/images\\/product\\/1671089002-1.jpg\",\"assets\\/images\\/product\\/1671089002-2.jpg\",\"\"]', 'meredith-salazar', 'PRO-BD-26712', 'Select Discount Type', 39130.00, 0, 0, 0, 'active', '2022-12-15 01:23:22', NULL),
(2, 1, 'Chloe Glover', 5, 4, 8, 15.00, 576.00, 40, 331.00, 'Officiis omnis venia', 'assets/images/product/1671090907-.jpg', '[\"assets\\/images\\/product\\/1671090907-.jpg\",\"assets\\/images\\/product\\/1671090907-1.jpg\",\"assets\\/images\\/product\\/1671090907-2.jpg\",\"assets\\/images\\/product\\/1671090907-3.jpg\"]', 'chloe-glover', 'PRO-BD-95633', 'Select Discount Type', 13240.00, 0, 0, 0, 'active', '2022-12-15 01:55:07', NULL),
(3, 1, 'Vernon Ward', 5, 3, 6, 303.00, 10.00, 500, 272.00, 'Quidem nisi totam ut', 'assets/images/product/1671093581-.jpg', '[\"assets\\/images\\/product\\/1671093581-.jpg\",\"assets\\/images\\/product\\/1671093581-1.jpg\",\"assets\\/images\\/product\\/1671093581-2.jpg\",\"assets\\/images\\/product\\/1671093581-3.jpg\"]', 'vernon-ward', 'PRO-BD-14193', '%', 136000.00, 0, 0, 0, 'active', '2022-12-15 02:39:41', NULL),
(4, 1, 'Gary Kent', 3, 1, 1, 854.00, 15.00, 60, 725.00, 'Assumenda id deseru', 'assets/images/product/1671093930-.jpg', '[\"assets\\/images\\/product\\/1671093930-.jpg\",\"assets\\/images\\/product\\/1671093930-1.jpg\",\"assets\\/images\\/product\\/1671093930-2.jpg\",\"assets\\/images\\/product\\/1671093930-3.jpg\"]', 'gary-kent', 'PRO-BD-62841', '%', 43500.00, 0, 0, 0, 'active', '2022-12-15 02:45:30', NULL),
(6, 1, 'Fay Chambers', 4, 2, 4, 991.00, 102.00, 1096, 190.00, 'Alias itaque ut et u', 'assets/images/product/1672152144-.jpg', '[\"assets\\/images\\/product\\/1672152144-.jpg\",\"assets\\/images\\/product\\/1672152144-1.jpg\"]', 'fay-chambers', 'PRO-BD-31253', '%', 208240.00, 0, 0, 0, 'active', '2022-12-27 08:42:24', NULL),
(8, 1, 'Amelia Logan', 4, 7, 15, 279.00, 690.00, 40, 381.00, 'Non voluptatibus dol', 'assets/images/product/1672152753-.jpg', '[\"assets\\/images\\/product\\/1672152753-.jpg\"]', 'amelia-logan', 'PRO-BD-37321', 'Select Discount Type', 15240.00, 0, 0, 0, 'active', '2022-12-27 08:52:33', NULL),
(9, 1, 'Zoe Tanner', 1, 5, 10, 796.00, 600.00, 1404, 3980.00, 'Duis aut velit offic', 'assets/images/product/1672330826-.PNG', '[\"assets\\/images\\/product\\/1672330826-.PNG\"]', 'zoe-tanner', 'PRO-BD-71212', '%', 5587920.00, 0, 0, 0, 'active', '2022-12-29 10:20:27', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
