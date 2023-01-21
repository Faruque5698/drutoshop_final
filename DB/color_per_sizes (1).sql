-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2023 at 06:15 PM
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
-- Table structure for table `color_per_sizes`
--

CREATE TABLE `color_per_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`color_code`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color_per_sizes`
--

INSERT INTO `color_per_sizes` (`id`, `product_id`, `size_name`, `color_code`, `created_at`, `updated_at`) VALUES
(1, 6, 'S', '[\"#fafafa\",\"#000000\",\"#000000\",\"#000000\",\"#fafafa\"]', '2022-12-27 08:42:25', '2022-12-27 08:42:25'),
(2, 6, 'M', '[\"#fafafa\",\"#000000\",\"#000000\",\"#000000\",\"#fafafa\"]', '2022-12-27 08:42:25', '2022-12-27 08:42:25'),
(3, 6, 'L', '[\"#fafafa\",\"#000000\",\"#000000\",\"#000000\",\"#fafafa\"]', '2022-12-27 08:42:25', '2022-12-27 08:42:25'),
(4, 6, 'XL', '[\"#fafafa\",\"#000000\",\"#000000\",\"#000000\",\"#fafafa\"]', '2022-12-27 08:42:25', '2022-12-27 08:42:25'),
(5, 6, 'XXL', '[\"#fafafa\",\"#000000\",\"#000000\",\"#000000\",\"#fafafa\"]', '2022-12-27 08:42:25', '2022-12-27 08:42:25'),
(6, 7, 'S', '[\"#f8960d\",\"#0ff01e\",\"#fff242\",\"#fff242\",\"#0ff01e\"]', '2022-12-27 08:46:15', '2022-12-27 08:46:15'),
(7, 7, 'M', '[\"#f8960d\",\"#0ff01e\",\"#fff242\",\"#fff242\",\"#0ff01e\"]', '2022-12-27 08:46:15', '2022-12-27 08:46:15'),
(8, 7, 'L', '[\"#f8960d\",\"#0ff01e\",\"#fff242\",\"#fff242\",\"#0ff01e\"]', '2022-12-27 08:46:15', '2022-12-27 08:46:15'),
(9, 7, 'XL', '[\"#f8960d\",\"#0ff01e\",\"#fff242\",\"#fff242\",\"#0ff01e\"]', '2022-12-27 08:46:15', '2022-12-27 08:46:15'),
(10, 7, 'XXL', '[\"#f8960d\",\"#0ff01e\",\"#fff242\",\"#fff242\",\"#0ff01e\"]', '2022-12-27 08:46:15', '2022-12-27 08:46:15'),
(11, 8, 'S', '[\"#fafafa\",\"#f8960d\"]', '2022-12-27 08:52:33', '2022-12-27 08:52:33'),
(12, 8, 'M', '[\"#f8960d\",\"#0ff01e\"]', '2022-12-27 08:52:33', '2022-12-27 08:52:33'),
(13, 9, 'S', '[\"#000000\",\"#0ff01e\",\"#fff242\"]', '2022-12-29 10:20:28', '2022-12-29 10:20:28'),
(14, 9, 'L', '[\"#fff242\"]', '2022-12-29 10:20:28', '2022-12-29 10:20:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `color_per_sizes`
--
ALTER TABLE `color_per_sizes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `color_per_sizes`
--
ALTER TABLE `color_per_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
