-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2020 m. Kov 02 d. 09:33
-- Server version: 10.4.10-MariaDB
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
-- Database: `atletas`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `ads`
--

DROP TABLE IF EXISTS `ads`;
CREATE TABLE IF NOT EXISTS `ads` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payed` tinyint(1) NOT NULL,
  `payed_until` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `ads`
--

INSERT INTO `ads` (`id`, `url`, `image`, `created_at`, `updated_at`, `title`, `payed`, `payed_until`) VALUES
(1, 'https://www.donatasp.lt/', '/ads/donatasp.png', NULL, NULL, 'DonatasP.LT - Web Solutions', 1, 1583146700),
(10, 'test123.lt', '/img/ads/1583139633.png', '2020-03-02 07:00:33', '2020-03-02 07:00:33', 'Atletas.LT', 0, 0),
(11, 'test123.lt', '/img/ads/1583140900.png', '2020-03-02 07:21:40', '2020-03-02 07:27:08', 'asd', 1, 1585819628);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Naujienos', NULL, '2020-02-18 11:31:07');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `chats`
--

DROP TABLE IF EXISTS `chats`;
CREATE TABLE IF NOT EXISTS `chats` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `chat_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `who` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `chats`
--

INSERT INTO `chats` (`id`, `chat_id`, `text`, `created_at`, `updated_at`, `who`) VALUES
(1, 1, 'sw', '2020-02-09 09:55:05', '2020-02-09 09:55:05', 1),
(2, 1, 'zdrw', NULL, NULL, 2),
(3, 1, 'aha', '2020-02-09 11:30:46', '2020-02-09 11:30:46', 1),
(4, 0, 'Testinė žinutė', '2020-02-19 22:00:00', '2020-02-19 22:00:00', 0),
(5, 0, 'Bandymas apeiti užsakymų patvirtinimo sistemą!\n            Užsakymo id:2\\nVartotojo id:1', '2020-02-23 10:03:17', '2020-02-23 10:03:17', 0),
(6, 0, 'Bandymas apeiti užsakymų patvirtinimo sistemą!\n            Užsakymo id:3\\nVartotojo id:1', '2020-02-23 10:05:29', '2020-02-23 10:05:29', 0),
(7, 0, 'Bandymas apeiti užsakymų patvirtinimo sistemą!\n            Užsakymo id:3\\nVartotojo id:1', '2020-02-23 10:13:18', '2020-02-23 10:13:18', 0),
(8, 0, 'Bandymas apeiti užsakymų patvirtinimo sistemą!\n            Užsakymo id:6\\nVartotojo id:1', '2020-03-02 07:22:58', '2020-03-02 07:22:58', 0),
(9, 0, 'Bandymas apeiti užsakymų patvirtinimo sistemą!\n            Užsakymo id:6\\nVartotojo id:1', '2020-03-02 07:25:42', '2020-03-02 07:25:42', 0),
(10, 0, 'Bandymas apeiti užsakymų patvirtinimo sistemą!\n            Užsakymo id:6\\nVartotojo id:1', '2020-03-02 07:26:39', '2020-03-02 07:26:39', 0),
(11, 0, 'Bandymas apeiti užsakymų patvirtinimo sistemą!\n            Užsakymo id:6\\nVartotojo id:1', '2020-03-02 07:27:02', '2020-03-02 07:27:02', 0);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `chat_heads`
--

DROP TABLE IF EXISTS `chat_heads`;
CREATE TABLE IF NOT EXISTS `chat_heads` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `who` int(11) NOT NULL,
  `whom` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `chat_heads`
--

INSERT INTO `chat_heads` (`id`, `created_at`, `updated_at`, `who`, `whom`) VALUES
(1, NULL, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client` int(11) NOT NULL,
  `trainer` int(11) NOT NULL,
  `trainer_submit` tinyint(1) NOT NULL DEFAULT 0,
  `client_submit` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `clients`
--

INSERT INTO `clients` (`id`, `client`, `trainer`, `trainer_submit`, `client_submit`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 1, '2020-02-08 13:37:24', '2020-02-08 13:37:24');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_01_28_173909_add_more_fields_to_users', 1),
(5, '2020_01_30_145606_create_news_table', 2),
(6, '2020_01_31_201006_create_categories_table', 3),
(7, '2020_01_31_203755_add_category_to_news', 4),
(8, '2020_02_01_152023_create_ads_table', 5),
(9, '2020_02_01_154234_add_title_to_ads', 6),
(10, '2020_02_01_162456_add_job_type_to_users', 7),
(11, '2020_02_01_171934_add_type_to_users', 8),
(12, '2020_02_01_180429_add_photo_to_users', 9),
(13, '2020_02_05_100608_create_navigations_table', 10),
(14, '2020_02_07_153043_add_submited_to_news', 11),
(15, '2020_02_07_155225_create_clients_table', 12),
(17, '2020_02_08_154024_create_chats_table', 13),
(19, '2020_02_08_175130_create_chat__heads_table', 14),
(20, '2020_02_09_100926_add_critical_columns_to_chat_heads', 14),
(21, '2020_02_09_113315_add_who_to_chats', 15),
(22, '2020_02_09_133436_create_schedules_table', 16),
(23, '2020_02_18_133205_create_systems_table', 17),
(24, '2020_02_18_164136_create_orders_table', 18),
(25, '2020_02_20_152817_update_system_table', 19),
(26, '2020_02_24_091444_add_subscribe_to_users', 20),
(27, '2020_03_02_080003_add_payment_to_ads', 21),
(28, '2020_03_02_081003_add_other_id_to_orders', 21),
(29, '2020_03_02_084238_add_price_ads_to_system', 22);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `navigations`
--

DROP TABLE IF EXISTS `navigations`;
CREATE TABLE IF NOT EXISTS `navigations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `havechilds` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `navigations`
--

INSERT INTO `navigations` (`id`, `link`, `title`, `parent`, `havechilds`, `created_at`, `updated_at`) VALUES
(1, 'https://donatasp.lt', 'DonatasP.LT', '0', 1, NULL, NULL),
(2, 'https://dworks.lt', 'dWorks.LT', '1', 0, NULL, NULL),
(3, 'htttp://google.lt', 'Google.LT', '1', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category` int(11) NOT NULL DEFAULT 0,
  `submited` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `text`, `author`, `slug`, `created_at`, `updated_at`, `category`, `submited`) VALUES
(1, 'testas', '/img/news/1581860637.png', 'The big brown fox jumps over the lazy', 1, 'test', '2020-02-06 22:00:00', '2020-02-16 11:43:57', 1, 1),
(2, 'test', '/img/test.jpg', 'The big brown fox jumps over the lazy dog', 1, 'test', '2020-02-06 22:00:00', '2020-02-16 11:08:26', 1, 1),
(3, 'test', '/img/test.jpg', 'The big brown fox jumps over the lazy dog', 1, 'test', NULL, '2020-02-16 11:08:27', 1, 1),
(4, 'test', '/img/test.jpg', 'The big brown fox jumps over the lazy dog', 1, 'test', NULL, NULL, 1, 0),
(5, 'test', '/img/test.jpg', 'The big brown fox jumps over the lazy dog', 1, 'test', NULL, NULL, 1, 2),
(6, 'test', '/img/test.jpg', 'The big brown fox jumps over the lazy dog', 1, 'test', NULL, NULL, 1, 0),
(7, 'test', '/img/test.jpg', 'The big brown fox jumps over the lazy dog', 1, 'test', NULL, NULL, 1, 0),
(8, 'test', '/img/test.jpg', 'The big brown fox jumps over the lazy dog', 1, 'test', NULL, NULL, 1, 0),
(9, 'test', '/img/test.jpg', 'The big brown fox jumps over the lazy dog', 1, 'test', NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `price` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `other_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `orders`
--

INSERT INTO `orders` (`id`, `user`, `type`, `price`, `status`, `created_at`, `updated_at`, `other_id`) VALUES
(3, 1, 1, 123, 1, '2020-02-25 22:00:00', '2020-02-23 10:07:03', NULL),
(6, 1, 2, 250, 1, '2020-03-02 07:21:40', '2020-03-02 07:27:08', 11);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `schedules`
--

DROP TABLE IF EXISTS `schedules`;
CREATE TABLE IF NOT EXISTS `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `trainer` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `time` time NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `schedules`
--

INSERT INTO `schedules` (`id`, `user`, `trainer`, `day`, `time`, `text`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '22:00:00', 'Kojų masažas', NULL, NULL),
(2, 1, 2, 3, '13:00:00', 'Bicepsų treniravimas', NULL, NULL),
(3, 2, 1, 1, '22:22:00', 'test', '2020-02-12 19:12:22', '2020-02-12 19:12:22');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `system`
--

DROP TABLE IF EXISTS `system`;
CREATE TABLE IF NOT EXISTS `system` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `online` tinyint(1) NOT NULL,
  `paysera_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paysera_projectid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price_ads` int(11) NOT NULL DEFAULT 0,
  `price_subscription` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `system`
--

INSERT INTO `system` (`id`, `title`, `online`, `paysera_password`, `paysera_projectid`, `created_at`, `updated_at`, `price_ads`, `price_subscription`) VALUES
(1, 'Atletas.LT', 1, '740a20d4e1051f3e11ca595e8d5a046f', '160674', NULL, '2020-03-02 07:16:08', 250, 100);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `job_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Nedirbantis',
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Nėra',
  `type` int(11) NOT NULL DEFAULT 0,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/img/user.png',
  `subscription` tinyint(1) NOT NULL DEFAULT 1,
  `subscribe_until` int(11) NOT NULL DEFAULT 1583831780,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`) USING HASH
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `Surname`, `job_place`, `video`, `job_type`, `type`, `photo`, `subscription`, `subscribe_until`) VALUES
(1, 'adminas', 'admin@admin.lt', NULL, '$2y$10$mgNja8wZfkmUHAglzBsL9eQZiDqbMQKqjKruNTyj/zSAX4EH1epGq', NULL, '2020-01-30 11:53:12', '2020-02-05 16:06:55', 'Pavarde', 'Kaunas', NULL, 'Mityba, kojos, plaukimas, čiuožimas', 2, '/img/avatars/1580895411.png', 1, 1583831780),
(2, 'admin2', 'admin@admin2.lt', NULL, '$2y$10$zEwkfwuIPU.EI3ui2UqFde61pHy0sENYb1z.y.YgIDZupdd7i2bXu', NULL, '2020-01-30 11:53:12', '2020-02-16 13:18:30', 'adminas', 'Nedirbantis', NULL, 'Mityba', 1, '/img/user.png', 1, 1583831780);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
