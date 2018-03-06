-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2018 at 08:04 AM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `talaha`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mohamed', 'm@gmail.com', '$2y$10$aoMxIKRMVMiZe3yE85Xddu80npS02FxnuAX3hA.OGbgIZ3sDheE8W', 'zvdrlw55OQF6AvPOy4pcTuehD2NbWGDahjlP7g0xHRZcwFa86lNmPwQqTB9y', '2017-11-08 09:48:34', '2017-11-08 09:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE IF NOT EXISTS `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `admin_password_resets_email_index` (`email`),
  KEY `admin_password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ads_splashes`
--

CREATE TABLE IF NOT EXISTS `ads_splashes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ads_splashes`
--

INSERT INTO `ads_splashes` (`id`, `image`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'uploads/ads/5a97cb68f36cd.jpg', 1, '2018-03-01 16:44:09', '2018-03-01 16:44:09', NULL),
(2, 'uploads/splash/5a97cba6b521c.jpg', 2, '2018-03-01 16:45:10', '2018-03-01 16:45:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `logo`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'uploads/company/5a97cbe61a962.png', 0, '2018-03-01 16:46:14', '2018-03-01 16:46:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_translations`
--

CREATE TABLE IF NOT EXISTS `company_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `company_translations`
--

INSERT INTO `company_translations` (`id`, `company_id`, `locale`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'Lays', 'layslayslayslayslayslayslayslayslayslayslayslayslayslayslayslayslayslayslayslayslayslayslayslayslayslayslayslayslays', '2018-03-01 16:46:14', '2018-03-01 16:46:14', NULL),
(2, 1, 'ar', 'ليز', 'ليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليزليز', '2018-03-01 16:46:14', '2018-03-01 16:46:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `mobile`, `details`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'mohamed', 'mohamed.alijla@gmail.com', '05999895357', 'hi my name mohamed', '2018-03-04 20:22:32', '2018-03-04 20:22:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `craftnames`
--

CREATE TABLE IF NOT EXISTS `craftnames` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `craftname_translations`
--

CREATE TABLE IF NOT EXISTS `craftname_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `craftname_id` int(11) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `helps`
--

CREATE TABLE IF NOT EXISTS `helps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `help_translations`
--

CREATE TABLE IF NOT EXISTS `help_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `help_id` int(11) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `lang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'en', NULL, NULL, NULL),
(2, 'ar', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `language_translations`
--

CREATE TABLE IF NOT EXISTS `language_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=113 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(22, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(23, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(24, '2016_06_01_000004_create_oauth_clients_table', 1),
(25, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(26, '2016_09_13_070520_add_verification_to_user_table', 1),
(27, '2017_09_19_071635_create_admins_table', 1),
(28, '2017_09_19_071636_create_admin_password_resets_table', 1),
(29, '2017_09_19_081555_create_categories_table', 1),
(30, '2017_09_19_083732_create_category_translations_table', 1),
(31, '2017_09_19_084025_create_pages_table', 1),
(32, '2017_09_19_084040_create_page_translations_table', 1),
(33, '2017_09_19_122835_create_languages_table', 1),
(34, '2017_09_19_133337_create_language_translations_table', 1),
(35, '2017_09_27_131246_create_settings_table', 1),
(36, '2017_09_27_131315_create_setting_translations_table', 1),
(79, '2017_11_14_082048_create_cities_table', 2),
(80, '2017_11_14_082103_create_city_translations_table', 2),
(81, '2017_11_14_083816_create_category_bodies_table', 2),
(82, '2017_11_14_083851_create_categorybody_translations_table', 2),
(83, '2017_11_14_093639_create_restaurants_table', 2),
(84, '2017_11_14_093701_create_restaurants_translations_table', 2),
(85, '2017_11_14_095343_create_types_table', 2),
(86, '2017_11_14_095402_create_type_translations_table', 2),
(87, '2017_12_04_073702_create_food_categories_table', 2),
(88, '2017_12_04_082057_create_food_category__translations_table', 2),
(89, '2017_12_04_100117_create_food_categoryrestaurants_table', 2),
(90, '2017_12_05_071657_create_foods_table', 2),
(91, '2017_12_05_071714_create_food__translations_table', 2),
(92, '2017_12_05_115216_create_favourites_table', 2),
(93, '2017_12_05_131852_create_orders_table', 2),
(94, '2017_12_05_132003_create_meals_orders_table', 2),
(95, '2017_12_05_132634_create_rates_table', 2),
(96, '2017_12_07_063722_create_bookings_table', 2),
(97, '2017_12_07_074923_create_rest_countries_table', 3),
(98, '2017_12_07_074941_create_rest_country_translations_table', 3),
(99, '2017_12_07_082605_create_food_countries_table', 4),
(100, '2017_11_28_070513_create_helps_table', 5),
(101, '2017_11_28_071746_create_help_translations_table', 5),
(102, '2017_12_26_083113_create_products_table', 5),
(103, '2017_12_26_083126_create_product_translations_table', 5),
(104, '2017_12_28_111143_create_orders_table', 5),
(105, '2017_12_28_111233_create_product_orders_table', 5),
(106, '2018_01_30_101100_create_tokens_table', 5),
(107, '2018_02_04_064416_create_ads_splashes_table', 5),
(108, '2018_02_11_093748_create_contacts_table', 5),
(109, '2018_02_11_102632_create_craftnames_table', 5),
(110, '2018_02_11_102646_create_craftname_translations_table', 5),
(111, '2018_02_27_073000_create_companies_table', 5),
(112, '2018_02_27_073112_create_company_translations_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0422dd6a23adca4ae75d731dd2d8fdede85d431b82ae504d6335334ba23ecd47b1b314ac82661283', 8, 3, NULL, '[]', 0, '2017-12-10 20:08:10', '2017-12-10 20:08:10', '2018-12-10 13:08:10'),
('1f465780aa4e7834d1dc0b5518ba88d9c69e2c2c8b154a3dcda5ac001e5668bef5758abe8a1b1091', 12, 3, NULL, '[]', 0, '2017-12-10 17:55:43', '2017-12-10 17:55:43', '2018-12-10 10:55:43'),
('237834843f1db72e55437830c9cc95328b6d35ea8d8427d402149c0b5d4c70dd4d3fcdba2af67232', 28, 3, NULL, '[]', 0, '2017-12-10 19:11:03', '2017-12-10 19:11:03', '2018-12-10 12:11:03'),
('23fd429316a75d07dfbde655c8f040ac86f11eea07a84804a5487d103dd97f1c40d79af37cf40abd', 6, 3, NULL, '[]', 0, '2017-11-09 03:14:07', '2017-11-09 03:14:07', '2018-11-09 06:14:07'),
('28bb2c853347dfa737d2c8172b66925be028c7aeaa64e5e0c56864835b775ddec30a86f8287ce9f9', 5, 3, NULL, '[]', 0, '2017-11-12 05:50:17', '2017-11-12 05:50:17', '2018-11-12 08:50:17'),
('299804ced706aa4a4b79784919a10bfb3c53ff432b03f9bed9a29feb9550ce2d0986e1af4d51e6dc', 8, 3, NULL, '[]', 0, '2017-12-10 19:08:00', '2017-12-10 19:08:00', '2018-12-10 12:08:00'),
('2f5491faf889b0b2436c3671d4db453f97a89e0a08eef6993d144d9d3d927bac54da7fbfd73c4127', 9, 4, 'mobile', '[]', 0, '2017-12-07 18:25:03', '2017-12-07 18:25:03', '2018-12-07 11:25:03'),
('30698b4a78fd15b05fdcf1eb482acbb6d66dc12649195a344fabec924866eb72d49444445da77fc8', 1, 3, NULL, '[]', 1, '2017-11-12 03:14:00', '2017-11-12 03:14:00', '2018-11-12 06:14:00'),
('3acce51d3e1a1b558dc1b67e8321136b08f9c1a82ebe8b6ec03564466a9370fb408cbfd140194e20', 31, 4, 'mobile', '[]', 0, '2017-12-10 19:26:02', '2017-12-10 19:26:02', '2018-12-10 12:26:02'),
('3c4510c4cfbb284740399adb7b707db3d7e05dfa133b3c7f52949a4581f3ac1c7515c5a1d6e68ebd', 8, 3, NULL, '[]', 0, '2017-12-10 19:59:24', '2017-12-10 19:59:24', '2018-12-10 12:59:24'),
('3d605ad8e7ff35c58142c6a60627c7250993b60d54e16d6bd4ce0e8cc0b069027dadaaa1228fb8e4', 5, 3, NULL, '[]', 0, '2017-11-12 05:51:11', '2017-11-12 05:51:11', '2018-11-12 08:51:11'),
('4438538c299e5e3ad49093e4613e15a1dfb79fe276912f455b895a6ef95ecc85a6484d94449c121b', 9, 4, 'mobile', '[]', 0, '2017-12-07 18:25:23', '2017-12-07 18:25:23', '2018-12-07 11:25:23'),
('448d883464a982b4ff769ef5f34aca4be66a2175d40d0d9788e8dc286201b4bc638e4bdfdb069c73', 7, 3, NULL, '[]', 0, '2017-11-09 03:15:47', '2017-11-09 03:15:47', '2018-11-09 06:15:47'),
('45f2eed3530532f09a92c52cb4c47c29f0c3b6e7dfe0d4f8c7ea291e44ca827bc96d81108a54f7b8', 12, 3, NULL, '[]', 0, '2017-12-10 17:15:04', '2017-12-10 17:15:04', '2018-12-10 10:15:04'),
('468bf3edfd28e4c0f05cbc4011eb5032019f70c03927587ba8a99e0872f510a2f999389dd53cfb6e', 8, 3, NULL, '[]', 0, '2017-12-07 17:44:15', '2017-12-07 17:44:15', '2018-12-07 10:44:15'),
('46c7f105e541193b2ea6751d8c7d86399a936f50f9d7a35e0dec0a506bc9c59ed4129679d1934956', 26, 3, NULL, '[]', 0, '2017-12-10 19:10:24', '2017-12-10 19:10:24', '2018-12-10 12:10:24'),
('46ed83a5e98aa06008df30d7dbdb804efa6208590e05aec8fe2b73e11b9fb32753635498c550b14d', 8, 3, NULL, '[]', 0, '2017-12-10 20:14:12', '2017-12-10 20:14:12', '2018-12-10 13:14:12'),
('4c20b4546534c5f5fcb0898fb24e968ce374b29e4985271eceacd479ab2f2fc8033c73f14e914da1', 8, 4, 'mobile', '[]', 0, '2017-12-10 20:03:56', '2017-12-10 20:03:56', '2018-12-10 13:03:56'),
('4f15952d527dfd08f78f86e3737899366b7b95a8b76bbc792588dddbba01546c498705ec50f86c89', 5, 3, NULL, '[]', 0, '2017-11-12 05:51:55', '2017-11-12 05:51:55', '2018-11-12 08:51:55'),
('50937d6393aef445faab35b43278b732d5ab3b755d26e1675db52ae3809e869b602c03ab83106d80', 2, 3, NULL, '[]', 0, '2017-11-09 06:04:18', '2017-11-09 06:04:18', '2018-11-09 08:04:18'),
('560114d24d559683a67d7effc23a817c3adc400ae1c51145f5f45c6f800b675a4d374d2130a3106a', 35, 4, 'mobile', '[]', 0, '2018-02-21 18:50:40', '2018-02-21 18:50:40', '2019-02-21 11:50:40'),
('56f7bfd3b6df51cce4fd94159aeb1cb3a403c79ac2b6d6e6ffbd7ba149f0cfdea22b35d05281f738', 8, 4, 'mobile', '[]', 0, '2017-12-10 19:58:02', '2017-12-10 19:58:02', '2018-12-10 12:58:02'),
('594968512271a16f343caa4513148857070751ab812b1cbee2d6e0b96ecc3a5190b4d94275d7a887', 12, 3, NULL, '[]', 0, '2017-12-10 17:56:30', '2017-12-10 17:56:30', '2018-12-10 10:56:30'),
('5b4f4cf70c572dd232ace6b2d04ccdb26c2f3def70f4f7ce2b2ceca2db4afaf0a02f107cebff0f32', 1, 3, NULL, '[]', 0, '2017-11-09 02:49:22', '2017-11-09 02:49:22', '2018-11-09 05:49:22'),
('5c49c5e83a60fbfda2a1cf69239fc5e7cad5fa0061bccffd7a6a4c709c52e2f8402313ed96049711', 9, 4, 'mobile', '[]', 0, '2017-12-07 18:28:59', '2017-12-07 18:28:59', '2018-12-07 11:28:59'),
('61de675847fcc0432a8548afc7b428a68546d7fa5a68178a540cce953fcce55cdb706ec5c4881499', 12, 3, NULL, '[]', 0, '2017-12-10 17:15:53', '2017-12-10 17:15:53', '2018-12-10 10:15:53'),
('622e33c975421f5f97b472c1d5fcd4651cc351032dbc59c2ff0ef10ff64267b517dfbc00e7e847f4', 2, 3, NULL, '[]', 0, '2017-11-12 04:38:59', '2017-11-12 04:38:59', '2018-11-12 07:38:59'),
('651e8d7d7d22e452b36c13ee04b59354a4c86c63a84193333ad5973d0de721fe0ea51fc1cb3a73f3', 1, 3, NULL, '[]', 0, '2017-11-12 04:29:23', '2017-11-12 04:29:23', '2018-11-12 07:29:23'),
('65528c3825276b7d7ac78c24da48f4aa314dc38329e7fb54fdf4e49038646be42240b165c324c1d5', 8, 3, NULL, '[]', 0, '2017-12-10 20:15:45', '2017-12-10 20:15:45', '2018-12-10 13:15:45'),
('6b7a274050731db801a731480e479dd473e409e6294ab8290d8e5f552b602b07c5fc8b9b2b748e5f', 6, 3, NULL, '[]', 0, '2017-11-12 03:03:48', '2017-11-12 03:03:48', '2018-11-12 06:03:48'),
('6fa04f06e19869c35eaed03d13d0d3ab8e9a5be44f8b781ff9341db25c7d658da44f7b0b16920f8d', 26, 3, NULL, '[]', 0, '2017-12-10 19:46:21', '2017-12-10 19:46:21', '2018-12-10 12:46:21'),
('732963ae7e36e56bbc4b3900476b8f31a35343f3289ed441ab901b99d8211054220a6da2c14cd860', 7, 3, NULL, '[]', 0, '2017-11-12 03:07:49', '2017-11-12 03:07:49', '2018-11-12 06:07:49'),
('7384523a77400ed875b316bc9af0d5210d34de349f3f75443aa536619522a876381118339c1c0fdb', 1, 3, NULL, '[]', 0, '2017-11-12 04:08:03', '2017-11-12 04:08:03', '2018-11-12 07:08:03'),
('75877ecd8b17bba42268595d694afd4408a7290b8bbc52bce94cae85b7741a657d79df74339e55e1', 35, 3, NULL, '[]', 0, '2018-02-21 18:47:47', '2018-02-21 18:47:47', '2019-02-21 11:47:47'),
('7778b76d01299c7b8874e9ab681253699b249b0721e7cc98f09fb007ee06d02a656c3e9c751c1eba', 35, 3, NULL, '[]', 0, '2018-02-21 19:00:27', '2018-02-21 19:00:27', '2019-02-21 12:00:27'),
('785050d7107032a004395a62150345fe834a41a5e38fe05d0ae605b03269e7c9c67ab77f9d14e662', 62, 4, 'mobile', '[]', 0, '2018-03-04 16:04:52', '2018-03-04 16:04:52', '2019-03-04 09:04:52'),
('7b2f3cab7a449a261ddfac5a994f96a9d3adba3033d9ffd1a4097fa5ca77c9dc4a332ed8482f5859', 1, 3, NULL, '[]', 0, '2017-11-10 12:13:40', '2017-11-10 12:13:40', '2018-11-10 15:13:40'),
('7dfeed5a02f21af5a0fef809f32b8a416ac1226ede3f20610c49e1dfda1a89234a7a13dcc6e7bafc', 26, 3, NULL, '[]', 0, '2017-12-10 20:35:00', '2017-12-10 20:35:00', '2018-12-10 13:35:00'),
('86b83ce367639cf648309f4af8796cbe214d3f489d41d62cdd336594ec21338ab23e5c2654e25493', 1, 3, NULL, '[]', 0, '2017-11-12 03:11:06', '2017-11-12 03:11:06', '2018-11-12 06:11:06'),
('8839de08ad6c34b0d7c8ee48e3eac81879506ee4a264a43f29ee6914d8ba6a076364699bdf15f327', 26, 4, 'mobile', '[]', 0, '2017-12-10 19:08:02', '2017-12-10 19:08:02', '2018-12-10 12:08:02'),
('8b1381f67d2efef60aef0f28870375dc20562a2422070f1bf7d1e4196025d9f6410f98114ed54c52', 5, 3, NULL, '[]', 0, '2017-11-12 03:00:15', '2017-11-12 03:00:15', '2018-11-12 06:00:15'),
('8c95baadb47d348d70f23923785cd16d94f50ee25950926eed4d5cb27d2644299a349679b5ae63a4', 33, 4, 'mobile', '[]', 0, '2017-12-10 19:35:18', '2017-12-10 19:35:18', '2018-12-10 12:35:18'),
('8d1b224f2b837f0e9e3ca4590e8723969847c8235dcd2b97fb2cf9169ddf3aae0233003d31b0504f', 1, 3, NULL, '[]', 1, '2017-11-12 03:11:57', '2017-11-12 03:11:57', '2018-11-12 06:11:57'),
('905477f2f5e346b1a669dff61394d2c19f88cd8fa694c79dd98ef6f5ea4d9d3f2fd54181d9f787ed', 3, 3, NULL, '[]', 0, '2017-11-09 02:31:49', '2017-11-09 02:31:49', '2018-11-09 05:31:49'),
('9b2976c2e4a7d5c09571837cd1c557cd6f50545e8167becd70c682746c6a06d4222d78fd09d046ef', 1, 3, NULL, '[]', 0, '2017-11-12 03:02:40', '2017-11-12 03:02:40', '2018-11-12 06:02:40'),
('9c618b585d21243ddfc3b6e69f55e081a0fb699ea5df54be7aac676675717c4ddbc94afd890d5827', 4, 3, NULL, '[]', 0, '2017-11-09 02:58:44', '2017-11-09 02:58:44', '2018-11-09 05:58:44'),
('9cd263b7c5b6fc89049b5a91c12b01623f1a9bb7b8e76805001edcc33d124244631d7659556aaa51', 35, 4, 'mobile', '[]', 0, '2018-02-21 19:00:54', '2018-02-21 19:00:54', '2019-02-21 12:00:54'),
('9e5e7049846a8e7cab316afb82ed11cd1df6189243737c6d4fb8da8d5b08c8160a8af38f62b64e93', 8, 3, NULL, '[]', 0, '2017-12-10 20:10:07', '2017-12-10 20:10:07', '2018-12-10 13:10:07'),
('a527cd307bbff530b9210b39dd059d842e31f0eebd1691ec3c44ce9709228aae6b665c9aa3726261', 62, 4, 'mobile', '[]', 0, '2018-03-04 16:11:03', '2018-03-04 16:11:03', '2019-03-04 09:11:03'),
('a932fce4302c7ed6a09d43a720b20ee7d93271166a553dffb12a0dbde56dc598080429093e33632d', 5, 3, NULL, '[]', 0, '2017-11-12 05:56:47', '2017-11-12 05:56:47', '2018-11-12 08:56:47'),
('aee15bb05480fd28e54ac06b0e9c628db71fafedd77e7ed3025746bc5ebe559137d2a0e82584547b', 9, 3, NULL, '[]', 0, '2017-12-07 18:04:31', '2017-12-07 18:04:31', '2018-12-07 11:04:31'),
('af7419f33522162bd3b96ddee9bfba2717fe9759ae87c2564cd8c31e53177882ab8a94374e6a9509', 10, 3, NULL, '[]', 0, '2017-12-07 18:25:40', '2017-12-07 18:25:40', '2018-12-07 11:25:40'),
('b0a62f10073625912438950d401dacec7c4d43234ab93001db7be1f7bc9606882d7cbc5ae90e68c2', 35, 3, NULL, '[]', 0, '2018-02-21 18:48:04', '2018-02-21 18:48:04', '2019-02-21 11:48:04'),
('b7ea69aee2ae3a579723a31f769b36254fa961dc700857fb13e5703d33fcbf90efe246a0b83f7540', 8, 4, 'mobile', '[]', 0, '2017-12-10 20:15:15', '2017-12-10 20:15:15', '2018-12-10 13:15:15'),
('bab039166008cca719b5f99922756f65f4cfea98385471754aec96785175ad16268685450095ecfb', 8, 3, NULL, '[]', 0, '2018-02-21 18:41:53', '2018-02-21 18:41:53', '2019-02-21 11:41:53'),
('bad426550be672f1b64c11c8aa81d7394969159e0b673632d9c770cd07e7cfb6c9242032934628b8', 1, 3, NULL, '[]', 1, '2017-11-09 02:34:51', '2017-11-09 02:34:51', '2018-11-09 05:34:51'),
('bfb2db7c9c851184f54aaf4dd072cb80db367ad9d15fbb5a9380a34490fcd4e8ba4bd98b2cf33c49', 8, 4, 'mobile', '[]', 0, '2017-12-10 19:55:02', '2017-12-10 19:55:02', '2018-12-10 12:55:02'),
('c54f98e0d3ffb4c6b3ae1690882acceb92d71822a44a6e599a422ed6fab81bd3cc892575f0560103', 8, 3, NULL, '[]', 0, '2017-12-10 19:21:56', '2017-12-10 19:21:56', '2018-12-10 12:21:56'),
('c6c8efbda93e7ab8e352b3632b4cdb8a2908ce1ade497a036318bda27fbedc14f3ba775c45f38e08', 9, 4, 'mobile', '[]', 0, '2017-12-07 18:28:17', '2017-12-07 18:28:17', '2018-12-07 11:28:17'),
('c76cda65d1b5995408d50996f4562bccd8e127dd04a214b13eb8e19f4e0dec449bc2598994328186', 8, 3, NULL, '[]', 0, '2017-12-10 20:10:31', '2017-12-10 20:10:31', '2018-12-10 13:10:31'),
('c79c06bda2d06e2981c7d2ca7acd445356dc209c6260ee166573deb9f98e9151dd7ed4ca262bcdef', 9, 4, 'mobile', '[]', 0, '2017-12-07 18:30:14', '2017-12-07 18:30:14', '2018-12-07 11:30:14'),
('ca35eb1646ac79a3d90692e4dabf8f93dac0d1e7f9b6fc04357986635fafb0e64f107c83293ee60c', 35, 3, NULL, '[]', 0, '2018-02-21 18:56:04', '2018-02-21 18:56:04', '2019-02-21 11:56:04'),
('ca4a50de13ecb6250fed27867fc30b1dfd326bdd10cc862971082c2468b7dbde7933d562db74024e', 35, 4, 'mobile', '[]', 0, '2018-03-01 19:25:18', '2018-03-01 19:25:18', '2019-03-01 12:25:18'),
('ce47d7dc74653149d4164bfc5c030e5d8695d1f2844d167895f796fe9291635d8dfc5b82cbecce06', 1, 3, NULL, '[]', 0, '2017-11-13 10:06:59', '2017-11-13 10:06:59', '2018-11-13 13:06:59'),
('d2da1e95d15b393972c6097dea36644d13678b82cbcac9a4f555f5e7920cfe5a9ace2fc7d8e34c3d', 1, 3, NULL, '[]', 0, '2017-11-12 03:17:52', '2017-11-12 03:17:52', '2018-11-12 06:17:52'),
('d5123ba3fdb427b61e6386859151271a295317ac6ca49ad909d669d11a053e75685008f7ee7b2c8f', 34, 4, 'mobile', '[]', 0, '2017-12-10 19:41:49', '2017-12-10 19:41:49', '2018-12-10 12:41:49'),
('d5c34bfcca8c50a000684b65c08224c5a591398db2f5e6e4601b5643e9b92cb8ea8cc3462195a54d', 8, 3, NULL, '[]', 0, '2017-12-10 20:14:28', '2017-12-10 20:14:28', '2018-12-10 13:14:28'),
('d64790866157a5b25a7480ca6b3dfa93713d4c8ac71a6c1c609dfa18d8a4eaff9d2038d3d746b6d3', 1, 3, NULL, '[]', 0, '2017-11-09 02:27:01', '2017-11-09 02:27:01', '2018-11-09 05:27:01'),
('d6db7da7d134f83ab537147d0c7b7712174210f0bcb77b8bd3c1591d3ba265999a7732601a14de04', 5, 3, NULL, '[]', 0, '2017-11-12 04:47:52', '2017-11-12 04:47:52', '2018-11-12 07:47:52'),
('d7f54800e71e7f7fb0b9084728182082f31e8a244e05da0cd8b69e85d82e37bec80cdfaa9e4fa303', 12, 3, NULL, '[]', 0, '2017-12-10 17:55:29', '2017-12-10 17:55:29', '2018-12-10 10:55:29'),
('d813baf1f3c225b16d292f1c09a79212c1dc4721cc2d943db06d84960f999a3e5e411050d1acaeab', 8, 4, 'mobile', '[]', 0, '2017-12-10 19:54:22', '2017-12-10 19:54:22', '2018-12-10 12:54:22'),
('dae38e557b3e45ae3db95800094fe06f8745e5d4eb8575470b6bd24e430ff1ba1b6e4259b1b95a9c', 12, 3, NULL, '[]', 0, '2017-12-10 17:55:14', '2017-12-10 17:55:14', '2018-12-10 10:55:14'),
('dd499e0dc819635375b5ae02a529f2e3a29efcf3ad7d7d926848220cda4941116d70b43d7b37adb4', 35, 3, NULL, '[]', 0, '2018-02-21 18:54:02', '2018-02-21 18:54:02', '2019-02-21 11:54:02'),
('de96edf3ffd27e34ac1d4496cb630801ecd2a2ad9a889c98739d190d8c0bceb2af56ad4ff8957ce3', 1, 3, NULL, '[]', 0, '2017-11-12 06:26:09', '2017-11-12 06:26:09', '2018-11-12 09:26:09'),
('df265c31eafc7e3aa411f590eb1cf723ad072a20d9656e0082cc116aaa240098fe28bee2a07ec6e7', 8, 3, NULL, '[]', 0, '2018-02-21 18:45:35', '2018-02-21 18:45:35', '2019-02-21 11:45:35'),
('df4a9370294a97a23f8df1e3d4980b07cb3180b285b2c572ab3d6e5b41d2d409f21972cc1a8b5e1b', 5, 3, NULL, '[]', 0, '2017-11-09 03:11:27', '2017-11-09 03:11:27', '2018-11-09 06:11:27'),
('e082c6b561775b262c9cd277d3e532518f62bba9ecb3da170bc535bc11b400232f2b5a73534da6bd', 12, 3, NULL, '[]', 0, '2017-12-10 17:55:19', '2017-12-10 17:55:19', '2018-12-10 10:55:19'),
('e2992e191d4be303fd10ea21ed493726f36d054d509767e99a79702725849806396b9dff2ea20d82', 1, 3, NULL, '[]', 0, '2017-11-13 10:10:20', '2017-11-13 10:10:20', '2018-11-13 13:10:20'),
('e7ec536e1c0f1f6912243d15ab383cc3429a82088eca39a1f25079827aa545e203231fb3cb0bc2ab', 1, 3, NULL, '[]', 0, '2017-11-12 02:57:23', '2017-11-12 02:57:23', '2018-11-12 05:57:23'),
('e9a5efdfaad0040a0ea7e8b50e753fc2ad92bcdf32a5e6694414ab85a14031e4b7cd75fda87c7ee5', 8, 3, NULL, '[]', 0, '2017-12-10 19:50:39', '2017-12-10 19:50:39', '2018-12-10 12:50:39'),
('f1ed202ff0bf218b0a475f0476d924ae2de2a0e335aff9eeba4ff8f9f594270d78241270775c0859', 35, 4, 'mobile', '[]', 0, '2018-02-21 18:51:18', '2018-02-21 18:51:18', '2019-02-21 11:51:18'),
('f261876b84bcd2dd039e71be72586a530cf593745ea81ddc3acbce404253445ec7cebe21f0182776', 9, 4, 'mobile', '[]', 0, '2017-12-07 18:26:40', '2017-12-07 18:26:40', '2018-12-07 11:26:40'),
('f338958e96203ab4dd2c7d564c89e10088f07baf06103a8fddeaa2be1ee1d6a1099095b61959e994', 62, 4, 'mobile', '[]', 0, '2018-03-04 16:05:44', '2018-03-04 16:05:44', '2019-03-04 09:05:44'),
('f35dfafbe6d140feb548e5124115b27aa4c288295aa1adba792e8ed65de842bb710574e43620b79a', 1, 3, NULL, '[]', 0, '2017-11-09 06:02:52', '2017-11-09 06:02:52', '2018-11-09 08:02:52'),
('fbd4eb0a7d9a826dfc199eaeaea2c1cadb19bfc8c17cb8aef2fdaea9f384ecd01f870cab81b042d0', 26, 3, NULL, '[]', 0, '2017-12-10 19:07:40', '2017-12-10 19:07:40', '2018-12-10 12:07:40'),
('fdd6fda30b98b594975957483adacd11532e9ebad374bf8b5f2b5b43c814cd00889959cb508be8d6', 32, 4, 'mobile', '[]', 0, '2017-12-10 19:26:36', '2017-12-10 19:26:36', '2018-12-10 12:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(3, NULL, 'khafayf Password Grant Client', 'RAesX7wO4N65G2BwEijHKGVfcSMzHWu4D3Odzcfy', 'http://localhost', 0, 1, 0, '2017-11-09 05:58:08', '2017-11-09 05:58:08'),
(4, NULL, 'khafayf Password Grant Client', '0FexLnoyfahGC3HZmitaTsfEobr7q74L0Qv9jOUt', 'http://localhost', 1, 0, 0, '2017-11-09 05:58:35', '2017-11-09 05:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-11-09 05:53:52', '2017-11-09 05:53:52'),
(2, 4, '2017-11-09 05:58:35', '2017-11-09 05:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('00cf3bf71237e2d094b7703426287d43266635abbaeaff958942e4511518f969f9bcbd82b2f4cd4b', 'd6db7da7d134f83ab537147d0c7b7712174210f0bcb77b8bd3c1591d3ba265999a7732601a14de04', 0, '2018-11-12 07:47:52'),
('0147a652163cd75a332c53edef494f2a4e830b22f75e7c9be028ffb9f1b21f5c1d27f31fc807f5c1', 'aee15bb05480fd28e54ac06b0e9c628db71fafedd77e7ed3025746bc5ebe559137d2a0e82584547b', 0, '2018-12-07 11:04:32'),
('0198db23860d3cb726df628d47883829c38c6d6dfb35d901d4f5342422e74643db07f8efb9c65949', 'e082c6b561775b262c9cd277d3e532518f62bba9ecb3da170bc535bc11b400232f2b5a73534da6bd', 0, '2018-12-10 10:55:19'),
('036b4288ffd2fdcf6a8ad6d2b930bfa671ad038d51895bb5f6674a98a2263280adad4fec9a2255fc', 'df4a9370294a97a23f8df1e3d4980b07cb3180b285b2c572ab3d6e5b41d2d409f21972cc1a8b5e1b', 0, '2018-11-09 06:11:28'),
('05ca3ddd98928dda92d0fec11cee5e99069f3787d06f2966f7228fb365386791bda3ba62c6554be1', 'de96edf3ffd27e34ac1d4496cb630801ecd2a2ad9a889c98739d190d8c0bceb2af56ad4ff8957ce3', 0, '2018-11-12 09:26:09'),
('09001a6bd9d8bd90968bd06573baf13501f340c023038d548d11e759593495f2e1738ce823a850ea', '9e5e7049846a8e7cab316afb82ed11cd1df6189243737c6d4fb8da8d5b08c8160a8af38f62b64e93', 0, '2018-12-10 13:10:07'),
('0b8f2bf7c7fd1052b33486dd64fc89b1ae031dff2db267b8d4aeb2e54dd1a947f30579af47e685a8', '622e33c975421f5f97b472c1d5fcd4651cc351032dbc59c2ff0ef10ff64267b517dfbc00e7e847f4', 0, '2018-11-12 07:38:59'),
('0ded71727d6e7d7006924b761c85ef1daca959b14e09977add67fbacf4712fb6893f60d816825493', '8d1b224f2b837f0e9e3ca4590e8723969847c8235dcd2b97fb2cf9169ddf3aae0233003d31b0504f', 0, '2018-11-12 06:11:57'),
('126c5eea6ea9f2be15c9cf6dab1fdf0fd27138c48683186a86fcc19495cc1c644befc96ecdb2792a', '9c618b585d21243ddfc3b6e69f55e081a0fb699ea5df54be7aac676675717c4ddbc94afd890d5827', 0, '2018-11-09 05:58:46'),
('1366ee5b2dd005f1ad8ce5c06808a15dfe353205c9e2d58db2df597acc3d2438afbda494c528a5f3', '9b2976c2e4a7d5c09571837cd1c557cd6f50545e8167becd70c682746c6a06d4222d78fd09d046ef', 0, '2018-11-12 06:02:40'),
('14c74358e0a5f4d39a3cc54808e3983b6d9218be36fc794b4b8806ff691337810e098517949dc475', '4f15952d527dfd08f78f86e3737899366b7b95a8b76bbc792588dddbba01546c498705ec50f86c89', 0, '2018-11-12 08:51:55'),
('17b91c4f8a417d311f4c8c24fdbb1cea520931f707c2bc10326a89f0598d232e6c8148a0cd029ce3', '468bf3edfd28e4c0f05cbc4011eb5032019f70c03927587ba8a99e0872f510a2f999389dd53cfb6e', 0, '2018-12-07 10:44:15'),
('19b7862964f3683f507b5673bfaf3eb31993864eda5ba4b5a5e621c0eb7f13a1af728a335673d736', '6fa04f06e19869c35eaed03d13d0d3ab8e9a5be44f8b781ff9341db25c7d658da44f7b0b16920f8d', 0, '2018-12-10 12:46:21'),
('2008635cbecb51141f6a3c3574a73ff8110acf1ffe65cb16db1cec457180bae4362345b2df5c40b3', 'df265c31eafc7e3aa411f590eb1cf723ad072a20d9656e0082cc116aaa240098fe28bee2a07ec6e7', 0, '2019-02-21 11:45:35'),
('265f0716a0cc0e5232ac63585047cef67c04c09a6d753871bdb8f8b72e2c7b215272454e09734a20', '3d605ad8e7ff35c58142c6a60627c7250993b60d54e16d6bd4ce0e8cc0b069027dadaaa1228fb8e4', 0, '2018-11-12 08:51:11'),
('28ae2b4d93435207a510fec6d4543878da23cd5f1bcffed7118ff01a8892307c4be00d47a0e4ec36', '3c4510c4cfbb284740399adb7b707db3d7e05dfa133b3c7f52949a4581f3ac1c7515c5a1d6e68ebd', 0, '2018-12-10 12:59:24'),
('29083a2ce23c5da7f3d907fe874139d349abaa53c8f0e2ba4d9f4d46ddb15dff63314e9596efeb0d', '45f2eed3530532f09a92c52cb4c47c29f0c3b6e7dfe0d4f8c7ea291e44ca827bc96d81108a54f7b8', 0, '2018-12-10 10:15:04'),
('29cc4d14416285274ac15316c43def19bef14082cc1a3b84f425661643d71abe58137d53075b31ab', 'e7ec536e1c0f1f6912243d15ab383cc3429a82088eca39a1f25079827aa545e203231fb3cb0bc2ab', 0, '2018-11-12 05:57:26'),
('2c6570867a75650b260c000d5314386545d95c6a3c776c0ef6bebe1977626030dce066295936fe21', '905477f2f5e346b1a669dff61394d2c19f88cd8fa694c79dd98ef6f5ea4d9d3f2fd54181d9f787ed', 0, '2018-11-09 05:31:52'),
('2fe37f1d84e47aa5036b2957ca8aa658be6fd7858996db313b0c52c89359e2edd8e591155adcd38f', '6b7a274050731db801a731480e479dd473e409e6294ab8290d8e5f552b602b07c5fc8b9b2b748e5f', 0, '2018-11-12 06:03:51'),
('307596118d8c6d4f143c9ce9f73a9172d6e1fa1ba7299edcc7045ca7cd38d0acb12f6d034cf6ea3e', '0422dd6a23adca4ae75d731dd2d8fdede85d431b82ae504d6335334ba23ecd47b1b314ac82661283', 0, '2018-12-10 13:08:10'),
('3436061a4b2d8da6cfd75f6222e073a98f04ce79cc9c5bc17cff3861ee47a68999178e206cfe6dbe', 'e2992e191d4be303fd10ea21ed493726f36d054d509767e99a79702725849806396b9dff2ea20d82', 0, '2018-11-13 13:10:21'),
('3e65f7676d3f2ad8269733371e1be819f147f4abd1c76de6456f93d58d08cda9b706372677222db7', 'b0a62f10073625912438950d401dacec7c4d43234ab93001db7be1f7bc9606882d7cbc5ae90e68c2', 0, '2019-02-21 11:48:04'),
('3e863f670d18b272d8394be394d49cce6392e8d00e254cddc4e539a321275dd551aabb6d02f9f928', 'a932fce4302c7ed6a09d43a720b20ee7d93271166a553dffb12a0dbde56dc598080429093e33632d', 0, '2018-11-12 08:56:48'),
('3f369cf540fdae4a3b8f0fe5e22ffebb13f04bd9a2922a82c40286fdaf59198e3887af808961f080', 'c54f98e0d3ffb4c6b3ae1690882acceb92d71822a44a6e599a422ed6fab81bd3cc892575f0560103', 0, '2018-12-10 12:21:56'),
('490d0d89166b2fad2e384995e67ebc416d2719cff4465628bf719af68fb1804654bcf6144d98eab0', '46c7f105e541193b2ea6751d8c7d86399a936f50f9d7a35e0dec0a506bc9c59ed4129679d1934956', 0, '2018-12-10 12:10:24'),
('4a325b4d240b092aad3901b912a3d0c48e48041ce2b016d34138612d5fcf2496d061fd41252ea13e', 'e9a5efdfaad0040a0ea7e8b50e753fc2ad92bcdf32a5e6694414ab85a14031e4b7cd75fda87c7ee5', 0, '2018-12-10 12:50:39'),
('4f0a84a16dd35b92375aa6c38dac0771470e313d5a2f1f9bdcafe755de95042c0a1f2683a3553a04', '594968512271a16f343caa4513148857070751ab812b1cbee2d6e0b96ecc3a5190b4d94275d7a887', 0, '2018-12-10 10:56:30'),
('51c1ca17ddb960e25bf5b1c56511737ac82e2a253c85a4b2422aaec88223cb72ef4906451338b40b', '732963ae7e36e56bbc4b3900476b8f31a35343f3289ed441ab901b99d8211054220a6da2c14cd860', 0, '2018-11-12 06:07:50'),
('5406cf31e0b0ba069a1c4dd676c692a759b2040070ec801c624dac5c270b93e5658dac0e7ac80d5c', 'ca35eb1646ac79a3d90692e4dabf8f93dac0d1e7f9b6fc04357986635fafb0e64f107c83293ee60c', 0, '2019-02-21 11:56:04'),
('541d6bd9d9167cbce607d254d466df118cb8facaf2ce8413235755048e7d67a18b9b2e329a623ddb', 'f35dfafbe6d140feb548e5124115b27aa4c288295aa1adba792e8ed65de842bb710574e43620b79a', 0, '2018-11-09 08:02:52'),
('5748deeb4532c8c4c5c245fccf7c93e5bc5e3cb7903b3a3cc2d3c3a56438cb350d641ab09285d1bd', '237834843f1db72e55437830c9cc95328b6d35ea8d8427d402149c0b5d4c70dd4d3fcdba2af67232', 0, '2018-12-10 12:11:03'),
('5d7ef77491e7baded8ae7a1266e29164490da9c494874c0edb8dd67f5bf214596d13bbef0ca2b596', 'd7f54800e71e7f7fb0b9084728182082f31e8a244e05da0cd8b69e85d82e37bec80cdfaa9e4fa303', 0, '2018-12-10 10:55:29'),
('5f2b8c00aa7acdfdd5cf293dd4bdf7b3aafad6ddbb6912839441c206a23da7ebd8e863f755c571ed', '7384523a77400ed875b316bc9af0d5210d34de349f3f75443aa536619522a876381118339c1c0fdb', 0, '2018-11-12 07:08:03'),
('60f7bd546b581cd1a5d56e9d154e4bac4b333846b2dcd823f781ce9d694bf349528c423fbe447d5e', '7b2f3cab7a449a261ddfac5a994f96a9d3adba3033d9ffd1a4097fa5ca77c9dc4a332ed8482f5859', 0, '2018-11-10 15:13:40'),
('620b9cc6f32eefd4d6e7cd5cbcae07b2eb5573cba6e17d989065576189ebc3a80e4907de8f270842', '5b4f4cf70c572dd232ace6b2d04ccdb26c2f3def70f4f7ce2b2ceca2db4afaf0a02f107cebff0f32', 0, '2018-11-09 05:49:22'),
('66606fc059cef7a1e70354b49a0452375f4be11ebf88019b0d7c86550bda7137bed2f2da822a4d0e', '61de675847fcc0432a8548afc7b428a68546d7fa5a68178a540cce953fcce55cdb706ec5c4881499', 0, '2018-12-10 10:15:53'),
('69c0228bf90e8a33bc1d2749c881e516345959e43906439f54edca5956a38d486eaa327c610771e6', 'dae38e557b3e45ae3db95800094fe06f8745e5d4eb8575470b6bd24e430ff1ba1b6e4259b1b95a9c', 0, '2018-12-10 10:55:14'),
('757a4d58b3f2db4fb47689e1995981f2dfa5ce6a0615b05f714c2ff64905e42b62017e35f19771a9', '28bb2c853347dfa737d2c8172b66925be028c7aeaa64e5e0c56864835b775ddec30a86f8287ce9f9', 0, '2018-11-12 08:50:21'),
('77b157f861b56f9e0a93a32973d7d78a37a7f006a4ce274e34e6bcdaf9c038be8c79b1a061acca80', '86b83ce367639cf648309f4af8796cbe214d3f489d41d62cdd336594ec21338ab23e5c2654e25493', 0, '2018-11-12 06:11:08'),
('7fd4b83618fe4539bc067cff540a9b5461f1548f6f4c673b6f8e4ea50e44dfce9e29d002cadc36cb', '50937d6393aef445faab35b43278b732d5ab3b755d26e1675db52ae3809e869b602c03ab83106d80', 0, '2018-11-09 08:04:18'),
('830d9557e3959904470c0ec845cea3a83e156c12907900adf37895722485fce9492717a6d7f9c923', '65528c3825276b7d7ac78c24da48f4aa314dc38329e7fb54fdf4e49038646be42240b165c324c1d5', 0, '2018-12-10 13:15:45'),
('882663f5faf58fce4e4814edd0b7fd68f71c6a0913e311122529ce947219bcf4aab1eaa490ce2cf3', '1f465780aa4e7834d1dc0b5518ba88d9c69e2c2c8b154a3dcda5ac001e5668bef5758abe8a1b1091', 0, '2018-12-10 10:55:43'),
('8b7efb32530db49385f8504a5544d88ae70cffdaf49ba44b4a83f5eb988c3551401b52f5d3fdb27c', '46ed83a5e98aa06008df30d7dbdb804efa6208590e05aec8fe2b73e11b9fb32753635498c550b14d', 0, '2018-12-10 13:14:12'),
('8e88cf2068e3d64fe62e92b9011de03ba1ca57e8b43985cef1ccd890db5c6d37cd2a4f4de1a38949', 'c76cda65d1b5995408d50996f4562bccd8e127dd04a214b13eb8e19f4e0dec449bc2598994328186', 0, '2018-12-10 13:10:31'),
('9516afd4c4313b73b4a3570381865f2422596a2dd8dae81ddff011420d22042b0ea7b0413a80317b', 'bab039166008cca719b5f99922756f65f4cfea98385471754aec96785175ad16268685450095ecfb', 0, '2019-02-21 11:41:53'),
('9d65472e914d58cb188bb12bd6cb4638820e25150971f5cbab7197ebdb32ba28d47b463895a8f199', '651e8d7d7d22e452b36c13ee04b59354a4c86c63a84193333ad5973d0de721fe0ea51fc1cb3a73f3', 0, '2018-11-12 07:29:26'),
('a0c8f9798988ecba636871f529d53170482a72e25ac16a14146a332182fe299e6e90db601d1def25', 'bad426550be672f1b64c11c8aa81d7394969159e0b673632d9c770cd07e7cfb6c9242032934628b8', 0, '2018-11-09 05:34:51'),
('aa23611cbc8fa206b142e963c8641a781da963dd62724f7a189f15eb32cee62cc2b4775fd63b62a8', '8b1381f67d2efef60aef0f28870375dc20562a2422070f1bf7d1e4196025d9f6410f98114ed54c52', 0, '2018-11-12 06:00:18'),
('abca3f9145ccb657f281daf0c25d3821d781b8caa2192a42d227b0d443c2473f0be575c28b95e0b9', '23fd429316a75d07dfbde655c8f040ac86f11eea07a84804a5487d103dd97f1c40d79af37cf40abd', 0, '2018-11-09 06:14:08'),
('abd01b66d3f5d746e3f51bb212ecb1317d15cdac2b9308c864b29eeb5feb7b01ae11e9b47d1a4623', 'ce47d7dc74653149d4164bfc5c030e5d8695d1f2844d167895f796fe9291635d8dfc5b82cbecce06', 0, '2018-11-13 13:06:59'),
('adef3db3f1398d82b583ad220e9961a615b9f33164c2a1fb717cffbdc32cfdbb712296680a28ac32', 'dd499e0dc819635375b5ae02a529f2e3a29efcf3ad7d7d926848220cda4941116d70b43d7b37adb4', 0, '2019-02-21 11:54:02'),
('b1231713be29ee50ae7199573da8f430e28547b552c1dd77004396bcda3701f8bad6049f5b250446', '448d883464a982b4ff769ef5f34aca4be66a2175d40d0d9788e8dc286201b4bc638e4bdfdb069c73', 0, '2018-11-09 06:15:48'),
('b71b4cda9318e5e353ff087c58109714a7044c9d9f9e074c756f75a8034fa2c954c76a9567a5fb14', '7778b76d01299c7b8874e9ab681253699b249b0721e7cc98f09fb007ee06d02a656c3e9c751c1eba', 0, '2019-02-21 12:00:27'),
('b77db360b1957094f0ed33dbb91ae57844120a074da3ed72b51796feae080e1c245003675c8a6223', 'fbd4eb0a7d9a826dfc199eaeaea2c1cadb19bfc8c17cb8aef2fdaea9f384ecd01f870cab81b042d0', 0, '2018-12-10 12:07:40'),
('b85380861842818b013c2e80c714954a9bda72fc1990db5ceeee4bc87fdc82e5cbab2492f218e38b', '75877ecd8b17bba42268595d694afd4408a7290b8bbc52bce94cae85b7741a657d79df74339e55e1', 0, '2019-02-21 11:47:47'),
('bbec5e39aa2bb9d27dc62f65c677a0e0c348e230a4248c91266f94b7b6488adc12ab2b69d0d81d64', 'd5c34bfcca8c50a000684b65c08224c5a591398db2f5e6e4601b5643e9b92cb8ea8cc3462195a54d', 0, '2018-12-10 13:14:28'),
('c4129d3c7d78f71d130f37a6915c45eb8d7a0d2fa4b0ed490f39469c9a31aca081d6b95f74ad2fb5', '299804ced706aa4a4b79784919a10bfb3c53ff432b03f9bed9a29feb9550ce2d0986e1af4d51e6dc', 0, '2018-12-10 12:08:00'),
('cd337557e071f4b31617fbed0e360942a2909fc7210e3d5f5209d6e128120208b2208425c34b8edd', 'd2da1e95d15b393972c6097dea36644d13678b82cbcac9a4f555f5e7920cfe5a9ace2fc7d8e34c3d', 0, '2018-11-12 06:17:54'),
('d7f21f852cfdcf5b20c75c4af25f04d0863318c893f3bac9f2afac669aafdad62e2713e235baf6a6', 'd64790866157a5b25a7480ca6b3dfa93713d4c8ac71a6c1c609dfa18d8a4eaff9d2038d3d746b6d3', 0, '2018-11-09 05:27:03'),
('df63c2c90c41c3be4a74e037a2ec2308f272801538f6568c2e6aa4f74208ecec4e925aa46fd2340f', '30698b4a78fd15b05fdcf1eb482acbb6d66dc12649195a344fabec924866eb72d49444445da77fc8', 0, '2018-11-12 06:14:01'),
('e45a1dedd04443a630ed3a1b944ca4d66661ec5c00215094fb9d092e68c77bb60eb974d297a5c283', 'af7419f33522162bd3b96ddee9bfba2717fe9759ae87c2564cd8c31e53177882ab8a94374e6a9509', 0, '2018-12-07 11:25:40'),
('fdbe7182a7e18db50dc6bec265bdd07181b2e26340c9c0e1a1f6b5301d8152b2bf90d82d9664e658', '7dfeed5a02f21af5a0fef809f32b8a416ac1226ede3f20610c49e1dfda1a89234a7a13dcc6e7bafc', 0, '2018-12-10 13:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `response` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `image`, `views`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 1, '2017-11-12 01:56:45', '2017-11-12 01:56:45', NULL),
(2, NULL, 1, '2017-11-12 01:57:32', '2017-11-12 01:57:32', NULL),
(3, NULL, 1, '2017-11-12 01:58:50', '2017-11-12 01:58:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE IF NOT EXISTS `page_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_words` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `page_translations`
--

INSERT INTO `page_translations` (`id`, `page_id`, `locale`, `title`, `slug`, `description`, `key_words`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'About Us', 'about-us', '<p>About us Description</p>', 'about us', '2017-11-12 01:56:46', '2017-11-12 01:56:46', NULL),
(2, 1, 'ar', 'من نحن', 'من-نحن', '<p>وصف من نحن</p>', 'من نحن', '2017-11-12 01:56:46', '2017-11-12 01:56:46', NULL),
(3, 2, 'en', 'Policy', 'policy', '<p>Policy</p>', 'Policy', '2017-11-12 01:57:33', '2017-11-12 01:57:33', NULL),
(4, 2, 'ar', 'سياسة الاستخدام', 'سياسة-الاستخدام', '<p>سياسة الاستخدام</p>', 'سياسة الاستخدام', '2017-11-12 01:57:33', '2017-11-12 01:57:33', NULL),
(5, 3, 'en', 'Terms', 'terms', '<p>Terms</p>', 'Terms', '2017-11-12 01:58:51', '2017-11-12 01:58:51', NULL),
(6, 3, 'ar', 'الشروط', 'الشروط', '<p>الشروط</p>', 'الشروط', '2017-11-12 01:58:51', '2017-11-12 01:58:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('m@gmail.com', '$2y$10$KprQ6GF3jauFCg.m1rG7zeMp7KC.Dq9.A9g0hnvDeoK3bEpqaykqC', '2017-12-12 16:00:53'),
('mohamed.alijla@gmail.com', '$2y$10$lBgroMl20ntgIimwEjhlEe9kdljnAaEG/OPAXlNSJm4J3ztIru2tm', '2018-03-04 19:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `quentity` int(11) NOT NULL,
  `slider` int(11) NOT NULL DEFAULT '0',
  `home_page` int(11) NOT NULL DEFAULT '0',
  `image` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `company_id`, `price`, `discount`, `quentity`, `slider`, `home_page`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 10, 2, 50, 1, 1, 'uploads/products/5a97ccb66d811.jpg', 0, '2018-03-01 16:49:42', '2018-03-01 16:49:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE IF NOT EXISTS `product_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dimension` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE IF NOT EXISTS `product_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `product_id`, `locale`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'ships', 'shipsshipsshipsshipsshipsshipsshipsshipsshipsshipsshipsshipsshipsshipsshipsshipsships', '2018-03-01 16:49:42', '2018-03-01 16:49:42', NULL),
(2, 1, 'ar', 'شيبسي', 'شيبسيشيبسيشيبسيشيبسيشيبسيشيبسيشيبسيشيبسيشيبسيشيبسيشيبسيشيبسي', '2018-03-01 16:49:42', '2018-03-01 16:49:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_store_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `play_store_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linked_in` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `url`, `logo`, `admin_email`, `app_store_url`, `play_store_url`, `info_email`, `mobile`, `phone`, `facebook`, `twitter`, `linked_in`, `instagram`, `google_plus`, `pinterest`, `note`, `created_at`, `updated_at`) VALUES
(1, 'http://etadrees.com', 'front_end_assets/image/logo.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-08 09:47:32', '2017-11-08 09:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE IF NOT EXISTS `setting_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `setting_id` int(11) NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_words` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `setting_translations`
--

INSERT INTO `setting_translations` (`id`, `setting_id`, `locale`, `title`, `address`, `description`, `key_words`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Skagen', 'Stavanger', '400fvfsv6', 'Norway', NULL, NULL),
(2, 1, 'ar', 'Skagen', 'Stavanger', '400fvfsv6', 'Norway', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE IF NOT EXISTS `tokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tokens` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `verification` tinyint(1) NOT NULL DEFAULT '0',
  `code` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=63 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `mobile`, `profile_image`, `user_type`, `details`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `verification`, `code`) VALUES
(35, 'dmohamed.alijla@gmail.com', '$2y$10$7Ex2CPsBs.tp2E0Ny6vjI.8X7pb7uwjeEAwSn23DnkH3CV.cwDWCe', 'mohameds', '0599895357', 'uploads/users/avatar.png', 0, NULL, 0, NULL, '2018-02-21 18:47:47', '2018-02-21 18:51:18', NULL, 0, NULL),
(36, 'mohamed.alijla@gmail.com', '$2y$10$fUTqXPSX5atEt.DAhR3Sz.h8rCA2MeXPk1PBghvS2PWGjGpJ.fxHW', 'moh', '456432465354', 'uploads/users/avatar.png', 1, 'dvfdsnb', 0, NULL, '2018-02-21 19:09:21', '2018-02-21 19:22:31', NULL, 0, NULL),
(61, 'mjgkajnejnf@gmail.com', '$2y$10$.i/cvCGi4QCjP3R3KCx3Mu3Y0sYNrQCsfzWhFv9ujahTa5CLWQihW', 'mazen', '966149226427', 'uploads/users/avatar.png', 0, NULL, 0, NULL, '2018-03-04 13:49:18', '2018-03-04 13:51:34', NULL, 1, 'UNrSa'),
(62, 'mdcdn@g.com', '$2y$10$neniitOJDHejWdE4Q5YIIeZNTuSBPuL4ph021ktl182L70cD2PYSK', 'mohddd', '966149226426', 'uploads/users/avatar.png', 0, NULL, 0, NULL, '2018-03-04 15:25:52', '2018-03-04 16:06:48', NULL, 1, '0v9zf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
