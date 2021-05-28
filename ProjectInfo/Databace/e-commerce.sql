-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 28, 2021 at 01:42 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(0, 'fadi', 'Admin', 'fadi19912010@gmail.com', '$2y$10$0HXA1GpR3WdbrY7JpoMXxeHc7IOEl7tQmXJv.lJjIBgAe70eezDx6', 1, '2021-05-26 15:21:03', '2021-05-26 15:21:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `title` varchar(250) NOT NULL,
  `customer` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `title`, `customer`, `created_at`, `updated_at`) VALUES
(126, 0, 'order2', 'rami', '2021-05-27 22:31:38', NULL),
(125, 0, 'order1', 'fadi', '2021-05-27 22:31:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders-products`
--

DROP TABLE IF EXISTS `orders-products`;
CREATE TABLE IF NOT EXISTS `orders-products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=150 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders-products`
--

INSERT INTO `orders-products` (`id`, `order_id`, `product_id`) VALUES
(149, 126, 29),
(148, 126, 28),
(147, 126, 27),
(146, 126, 26),
(145, 125, 20),
(144, 125, 22),
(143, 125, 23);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `photo` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `status`, `photo`, `price`, `created_at`, `updated_at`) VALUES
(23, 'mango', NULL, 1, 'image/prod-photo/SFdHCQLXpeuPZ7OBiOC55kz2eoS9axyJ7w9go0Ey.jpg', 10, '2021-05-27 21:26:30', '2021-05-27 21:26:30'),
(22, 'screen', NULL, 1, 'image/prod-photo/kN8GxH1zmdZqs5HNbeFBDk7Ou38YDkRLAK4aEgfD.png', 100, '2021-05-27 21:26:08', '2021-05-27 21:26:08'),
(20, 'baby food', NULL, 1, 'image/prod-photo/vNcXPj7Bpsn2P85ebs4X1PxXf7MzgKPQP1N42iVY.jpg', 20, '2021-05-27 21:25:24', '2021-05-27 21:25:24'),
(21, 'camera', NULL, 1, 'image/prod-photo/Q7HbNRsYZReIVY3WCYNde8rRcTg4b58hYtS4XtuY.jpg', 50, '2021-05-27 21:25:45', '2021-05-27 21:25:45'),
(24, 'wow', NULL, 1, 'image/prod-photo/pZ7gcDhUvthH1NsY2XmAX1MQHZkp6IHjspW991RE.jpg', 5, '2021-05-27 21:26:52', '2021-05-27 21:26:52'),
(25, 'mac', NULL, 1, 'image/prod-photo/8X9ivWk6byLTscNtRYeNCmtEReqW4IJbudCjaRhl.jpg', 20, '2021-05-27 21:27:15', '2021-05-27 21:27:15'),
(26, 'jonson', NULL, 1, 'image/prod-photo/QsBM3P9e3nQqdjHc8lPjg3qIlvlfhPMVmq8ub6f2.png', 15, '2021-05-27 21:27:43', '2021-05-27 21:27:43'),
(27, 'lushen', NULL, 1, 'image/prod-photo/MBai1PX0LdDsxqkEFSXLuLcrV2DvGavruDsb32tL.jpg', 20, '2021-05-27 21:28:11', '2021-05-27 21:28:11'),
(28, 'kids', NULL, 1, 'image/prod-photo/UBC1zEcU2x81JhG0B0FNfu4eniV1yUpjtFfj1MHM.jpg', 10, '2021-05-27 21:28:30', '2021-05-27 21:28:30'),
(29, 'ear phone', NULL, 1, 'image/prod-photo/Qnwck8jZqo6lhZm84Q7OveLDSJRw4YFVdw8aXoU2.jpg', 20.5, '2021-05-27 21:28:58', '2021-05-27 21:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
