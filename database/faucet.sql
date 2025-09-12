-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2025 at 01:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faucet`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_no` varchar(255) NOT NULL,
  `section_condition` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_brief_detail` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_2` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `description_2` longtext DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `about_mains`
--

CREATE TABLE `about_mains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `signature_image` varchar(255) DEFAULT NULL,
  `experiance` int(11) DEFAULT NULL,
  `pop_card` varchar(255) DEFAULT NULL,
  `pop_card_image` varchar(255) DEFAULT NULL,
  `pop_card_description` varchar(255) DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_mains`
--

INSERT INTO `about_mains` (`id`, `heading`, `title`, `image`, `description`, `signature_image`, `experiance`, `pop_card`, `pop_card_image`, `pop_card_description`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'ABOUT COGENT DEVS', 'Our approach ensures flexibility, adaptability, & rapid response.', 'About-Us.webp', '<p class=\"text\" style=\"text-align: justify;\">Welcome to Cogent Devs, where innovation meets implementation, &amp; technology transforms possibilities into realities. Established with a vision to redefine the landscape of digital solutions, we are a dynamic and forward-thinking company committed to delivering cutting-edge services.Our mission is clear &ndash; to provide comprehensive, customized and afordable solutions that align seamlessly with your business objectives. We believe in not just meeting but exceeding expectations.</p>\r\n<div class=\"ceo-content\">\r\n<h2>Kamran Anjum</h2>\r\nCEO &amp; Founder</div>', NULL, NULL, NULL, NULL, NULL, 1, '2025-04-07 09:27:01', '2025-07-02 06:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_name` varchar(255) DEFAULT NULL,
  `app_url` varchar(255) DEFAULT NULL,
  `app_logo` varchar(255) DEFAULT NULL,
  `app_logo_footer` varchar(255) DEFAULT NULL,
  `app_favicon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`id`, `app_name`, `app_url`, `app_logo`, `app_logo_footer`, `app_favicon`, `created_at`, `updated_at`) VALUES
(1, 'Faucet', 'http://staging.roamsol.com/', 'newAsset-2.png', 'newAsset 1.png', 'newAsset-3.png', '2025-03-22 11:21:57', '2025-07-01 06:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `read_msg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `per_token` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `currency`, `value`, `per_token`, `created_at`, `updated_at`) VALUES
(1, 'DOGE', '0.00000100', 50, '2025-09-09 04:28:15', '2025-09-09 04:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `exchange_token_limits`
--

CREATE TABLE `exchange_token_limits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exchange_token_limit` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exchange_token_limits`
--

INSERT INTO `exchange_token_limits` (`id`, `exchange_token_limit`, `created_at`, `updated_at`) VALUES
(1, 500, '2025-08-30 04:37:31', '2025-08-29 23:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `experiance_on_claims`
--

CREATE TABLE `experiance_on_claims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `claims` int(11) DEFAULT NULL,
  `experiance` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiance_on_claims`
--

INSERT INTO `experiance_on_claims` (`id`, `claims`, `experiance`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2025-09-09 06:22:40', '2025-09-09 01:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `front_footers`
--

CREATE TABLE `front_footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_1` varchar(255) DEFAULT NULL,
  `phone_2` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `google` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `front_footers`
--

INSERT INTO `front_footers` (`id`, `address`, `phone_1`, `phone_2`, `email`, `google`, `linkedin`, `twitter`, `facebook`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'Mateen Shopping Galaxy, 5th Floor Office # Fi-12, Office Block, Main Rashid Minhas Road, Karachi Pakistan.', '+92-331-9998780', NULL, 'info@cogentdevs.com', 'https://g.co/kgs/t2LWF9x', 'https://www.linkedin.com/company/cogent-devs/', 'https://x.com/cogentdevs', 'https://www.facebook.com/cogentdevs', '', 'https://www.youtube.com/@CogentDevs', '2022-10-12 05:31:35', '2025-06-25 10:47:41');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"b99c5869-b2e9-42fa-a259-9fcaaeecc142\",\"displayName\":\"App\\\\Mail\\\\FreeConsultationMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:29:\\\"App\\\\Mail\\\\FreeConsultationMail\\\":3:{s:4:\\\"data\\\";a:3:{s:4:\\\"name\\\";s:17:\\\"Muhammad Muzammil\\\";s:5:\\\"email\\\";s:23:\\\"muzammilken95@gmail.com\\\";s:7:\\\"company\\\";s:10:\\\"CogentDevs\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:23:\\\"muzammilken95@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1748862331, 1748862331),
(2, 'default', '{\"uuid\":\"fda71600-23f4-4c2c-8ab9-d19ddf898366\",\"displayName\":\"App\\\\Mail\\\\FreeConsultationMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:29:\\\"App\\\\Mail\\\\FreeConsultationMail\\\":3:{s:4:\\\"data\\\";a:3:{s:4:\\\"name\\\";s:17:\\\"Muhammad Muzammil\\\";s:5:\\\"email\\\";s:23:\\\"muzammilken95@gmail.com\\\";s:7:\\\"company\\\";s:10:\\\"CogentDevs\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:23:\\\"muzammilken95@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1748862534, 1748862534),
(3, 'default', '{\"uuid\":\"32782a42-ad4a-415f-a20e-219604a17f85\",\"displayName\":\"App\\\\Mail\\\\FreeConsultationMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:29:\\\"App\\\\Mail\\\\FreeConsultationMail\\\":3:{s:4:\\\"data\\\";a:3:{s:4:\\\"name\\\";s:17:\\\"Muhammad Muzammil\\\";s:5:\\\"email\\\";s:23:\\\"muzammilken95@gmail.com\\\";s:7:\\\"company\\\";s:10:\\\"CogentDevs\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:23:\\\"muzammilken95@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1748863126, 1748863126),
(4, 'default', '{\"uuid\":\"5f3f2994-0e07-42c5-acaa-bd2cb6b14e87\",\"displayName\":\"App\\\\Jobs\\\\GenerateAIResponse\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\GenerateAIResponse\",\"command\":\"O:27:\\\"App\\\\Jobs\\\\GenerateAIResponse\\\":4:{s:7:\\\"room_id\\\";i:10;s:12:\\\"user_message\\\";s:48:\\\"i want to build a game for kids do you guys work\\\";s:7:\\\"user_id\\\";s:9:\\\"User_2397\\\";s:5:\\\"ai_id\\\";i:1;}\"}}', 0, NULL, 1749635304, 1749635304),
(5, 'default', '{\"uuid\":\"cceb4858-9771-4768-8e6e-59a78439575a\",\"displayName\":\"App\\\\Jobs\\\\GenerateAIResponse\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\GenerateAIResponse\",\"command\":\"O:27:\\\"App\\\\Jobs\\\\GenerateAIResponse\\\":4:{s:7:\\\"room_id\\\";i:10;s:12:\\\"user_message\\\";s:48:\\\"i want to build a game for kids do you guys work\\\";s:7:\\\"user_id\\\";s:9:\\\"User_2397\\\";s:5:\\\"ai_id\\\";i:1;}\"}}', 0, NULL, 1749635356, 1749635356);

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `level_bonus_on_experiances`
--

CREATE TABLE `level_bonus_on_experiances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `experiance` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `token_bonus` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level_bonus_on_experiances`
--

INSERT INTO `level_bonus_on_experiances` (`id`, `experiance`, `level`, `token_bonus`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 5, '2025-09-09 06:53:59', '2025-09-09 01:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `meta_tags`
--

CREATE TABLE `meta_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `table_name` varchar(255) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url_slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_20_071834_create_permission_tables', 1),
(5, '2024_09_20_111139_create_personal_access_tokens_table', 2),
(6, '2025_03_04_091122_create_client_pay_pricing_details_table', 2),
(7, '2025_03_06_061947_create_pricing_packages_table', 3),
(8, '2025_03_06_092336_create_client_package_purchases_table', 4),
(10, '2025_03_21_094227_create_home_abouts_table', 5),
(12, '2025_03_21_111118_create_app_settings_table', 6),
(13, '2025_06_26_061258_create_service_section_images_table', 7),
(14, '2025_06_26_085842_create_solutions_table', 8),
(16, '2025_07_01_115915_create_our_clients_table', 9),
(17, '2025_07_02_045212_create_privacy_policies_table', 10),
(18, '2025_07_02_045255_create_terms_and_conditions_table', 10),
(20, '2025_07_14_095415_create_case_studies_table', 11),
(21, '2025_07_14_095431_create_case_studies_details_table', 11),
(22, '2025_07_14_095930_create_case_studies_images_table', 11),
(23, '2025_08_16_060603_create_set_rewards_table', 12),
(24, '2025_08_16_060622_create_timers_table', 12),
(26, '2025_08_16_063414_create_user_details_table', 13),
(27, '2025_08_16_065821_create_user_reward_cliams_table', 14),
(28, '2025_08_18_075148_create_per_day_limits_table', 15),
(29, '2025_08_19_092243_create_referral_commision_percentages_table', 16),
(30, '2025_08_21_073826_create_referral_comissions_table', 17),
(32, '2025_08_22_063225_create_reward_tokens_table', 18),
(33, '2025_08_22_063628_create_exchange_token_limits_table', 19),
(34, '2025_08_22_064001_create_ptc_durations_table', 20),
(35, '2025_08_22_064014_create_ptc_intervals_table', 20),
(37, '2025_09_01_073127_create_withdrawals_table', 21),
(38, '2025_09_09_061225_create_experiance_on_claims_table', 22),
(39, '2025_09_09_063736_create_level_bonus_on_experiances_table', 23),
(40, '2025_09_09_075841_create_currencies_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `per_day_limits`
--

CREATE TABLE `per_day_limits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `per_day_limit` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `per_day_limits`
--

INSERT INTO `per_day_limits` (`id`, `per_day_limit`, `created_at`, `updated_at`) VALUES
(1, 10, '2025-08-18 07:57:51', '2025-08-18 03:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policies`
--

CREATE TABLE `privacy_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_policies`
--

INSERT INTO `privacy_policies` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', '<div class=\"single-terms\">\r\n<p class=\"mb-3\">Our Privacy Policy was last updated and posted on March 8, 2020. It governs the privacy terms of our Website, located at&nbsp;<a href=\"http://www.cogentdevs.com/\">Cogent Devs</a>, sub-domains, and any associated web-based and mobile applications (collectively, \"Website\"), as owned and operated by Cogent Devs. Any capitalized terms not defined in our Privacy Policy, have the meaning as specified in our Terms of Service.</p>\r\n<p class=\"mb-3\">Your privacy is very important to us. Accordingly, we have developed this Policy in order for you to understand how we collect, use, communicate and disclose and make use of personal information. We use your Personal Information only for providing and improving the website. By using the website, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, accessible at&nbsp;<a href=\"http://www.cogentdevs.com/privacy-policy\">Privacy-policy</a>. The following outlines our privacy policy.</p>\r\n<ul class=\"content-feature-list list-style\">\r\n<li>&bull; Before or at the time of collecting personal information, we will identify the purposes for which information is being collected.</li>\r\n<li>&bull; We will collect and use personal information solely with the objective of fulfilling those purposes specified by us and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.</li>\r\n<li>&bull; We will only retain personal information as long as necessary for the fulfillment of those purposes.</li>\r\n<li>&bull; We will collect personal information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned.</li>\r\n<li>&bull; Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and up-to-date.</li>\r\n<li>&bull; We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.</li>\r\n<li>&bull; We will make readily available to customers information about our policies and practices relating to the management of personal information.</li>\r\n</ul>\r\n</div>\r\n<div class=\"single-terms\">\r\n<h4>Your Privacy</h4>\r\n<p class=\"mb-3\">Cogent Devs follows all legal requirements to protect your privacy. Our Privacy Policy is a legal statement that explains how we may collect information from you, how we may share your information, and how you can limit our sharing of your information. We utilize the Personal Data you offer in a way that is consistent with this Personal privacy Policy. If you provide Personal Data for a particular reason, we could make use of the Personal Data in connection with the reason for which it was provided. For example, registration info sent when developing your account, might be used to suggest products to you based on past acquisitions. We might use your Personal Data to offer access to services on the Website and monitor your use of such services. Cogent Devs may also utilize your Personal Data and various other personally non-identifiable info gathered through the Website to assist us with improving the material and functionality of the Website, to much better comprehend our users, and to improve our services. You will see terms in our Privacy Policy that are capitalized. These terms have meanings as described in the Definitions section below.</p>\r\n<h4>Definitions</h4>\r\n<p class=\"mb-3\">\"Non Personal Information\" is information that is not personally identifiable to you and that we automatically collect when you access our Website with a web browser. It may also include publicly available information that is shared between you and others.</p>\r\n<p class=\"mb-3\">\"Personally Identifiable Information\" is non-public information that is personally identifiable to you and obtained in order for us to provide you within our Website. Personally Identifiable Information may include information such as your name, email address, and other related information that you provide to us or that we obtain about you.</p>\r\n<h4>Information We Collect</h4>\r\n<p class=\"mb-3\">Generally, you control the amount and type of information you provide to us when using our Website.</p>\r\n<p class=\"mb-3\">As a Visitor, you can browse our website to find out more about our Website. You are not required to provide us with any Personally Identifiable Information as a Visitor.</p>\r\n</div>\r\n<div class=\"single-terms\">\r\n<h4>Computer Information Collected</h4>\r\n<p class=\"mb-3\">When you use our Website, we automatically collect certain computer information by the interaction of your mobile phone or web browser with our Website. Such information is typically considered Non Personal Information. We also collect the following:</p>\r\n<ul class=\"content-feature-list list-style\">\r\n<li>\r\n<h6>Cookies</h6>\r\n<p class=\"mb-3\">Our Website uses \"Cookies\" to identify the areas of our Website that you have visited. A Cookie is a small piece of data stored on your computer or mobile device by your web browser. We use Cookies to personalize the Content that you see on our Website. Most web browsers can be set to disable the use of Cookies. However, if you disable Cookies, you may not be able to access functionality on our Website correctly or at all. We never place Personally Identifiable Information in Cookies.</p>\r\n</li>\r\n<li>\r\n<h6>Geographical Information</h6>\r\n<p class=\"mb-3\">When you use the mobile application, we may use GPS technology (or other similar technology) to determine your current location in order to determine the city you are located in and display information with relevant data or advertisements. We will not share your current location with other users or partners. If you do not want us to use your location for the purposes set forth above, you should turn off the location services for the mobile application located in your account settings or in your mobile phone settings and/or within the mobile application.</p>\r\n</li>\r\n<li>\r\n<h6>Automatic Information</h6>\r\n<p class=\"mb-3\">We automatically receive information from your web browser or mobile device. This information includes the name of the website from which you entered our Website, if any, as well as the name of the website to which you\'re headed when you leave our website. This information also includes the IP address of your computer/proxy server that you use to access the Internet, your Internet Website provider name, web browser type, type of mobile device, and computer operating system. We use all of this information to analyze trends among our Users to help improve our Website.</p>\r\n</li>\r\n<li>\r\n<h6>Log Data</h6>\r\n<p class=\"mb-3\">Like many Website operators, we collect information that your browser sends whenever you visit our Website (\"Log Data\"). This Log Data may include information such as your computer\'s Internet Protocol (\"IP\") address, browser type, browser version, the pages of our Website that you visit, the time and date of your visit, the time spent on those pages and other statistics.</p>\r\n</li>\r\n</ul>\r\n</div>\r\n<div class=\"single-terms\">\r\n<p class=\"mb-3\">Under the Child\'s Online Privacy Security Act, no Website operator can require, as a condition to involvement in an activity, that a child younger than 13 years of age divulge more details than is reasonably required. Cogent Devs abides by this demand. We just collects information willingly offered; no information is gathered passively. Children under 13 can submit only their email address when sending us an email in our \"Contact Us\" area. Currency Transfer Rate makes use of the email address to respond to a one-time demand from a child under 13 and afterwards deletes the email address. In case Currency Transfer Rate collects and maintains personal information relating to a child under 13, the parent may send out an email to us to review, alter and/or erase such info as well as to decline to enable any additional collection or use of the child\'s information.</p>\r\n</div>\r\n<div class=\"single-terms\">\r\n<h4>How We Use Your Information</h4>\r\n<p class=\"mb-3\">We use the information we receive from you as follows:</p>\r\n<ul class=\"content-feature-list list-style\">\r\n<li>\r\n<h6>Customizing Our Website</h6>\r\n<p class=\"mb-3\">We may use the Personally Identifiable information you provide to us along with any computer information we receive to customize our Website.</p>\r\n</li>\r\n<li>\r\n<h6>Sharing Information with Affiliates and Other Third Parties</h6>\r\n<p class=\"mb-3\">We do not sell, rent, or otherwise provide your Personally Identifiable Information to third parties for marketing purposes. We may provide your Personally Identifiable Information to affiliates that provide services to us with regards to our Website (i.e. payment processors, Website hosting companies, etc.); such affiliates will only receive information necessary to provide the respective services and will be bound by confidentiality agreements limiting the use of such information.</p>\r\n</li>\r\n<li>\r\n<h6>Data Aggregation</h6>\r\n<p class=\"mb-3\">We retain the right to collect and use any Non Personal Information collected from your use of our Website and aggregate such data for internal analytics that improve our Website and Service as well as for use or resale to others. At no time is your Personally Identifiable Information included in such data aggregations.</p>\r\n</li>\r\n<li>\r\n<h6>Legally Required Releases of Information</h6>\r\n<p class=\"mb-3\">We may be legally required to disclose your Personally Identifiable Information, if such disclosure is (a) required by subpoena, law, or other legal process; (b) necessary to assist law enforcement officials or government enforcement agencies; (c) necessary to investigate violations of or otherwise enforce our Legal Terms; (d) necessary to protect us from legal action or claims from third parties including you and/or other Members; and/or (e) necessary to protect the legal rights, personal/real property, or personal safety of Cogent Devs/Currency Transfer Rate, our Users, employees, and affiliates.</p>\r\n</li>\r\n</ul>\r\n</div>\r\n<div class=\"single-terms\">\r\n<h4>Opt-Out</h4>\r\n<p class=\"mb-3\">We offer you the chance to \"opt-out\" from having your personally identifiable information used for particular functions, when we ask you for this detail. When you register for the website, if you do not want to receive any additional material or notifications from us, you can show your preference on our registration form.</p>\r\n<h4>Links to Other Websites</h4>\r\n<p class=\"mb-3\">Our Website may contain links to other websites that are not under our direct control. These websites may have their own policies regarding privacy. We have no control of or responsibility for linked websites and provide these links solely for the convenience and information of our visitors. You access such linked Websites at your own risk. These websites are not subject to this Privacy Policy. You should check the privacy policies, if any, of those individual websites to see how the operators of those third-party websites will utilize your personal information. In addition, these websites may contain a link to Websites of our affiliates. The websites of our affiliates are not subject to this Privacy Policy, and you should check their individual privacy policies to see how the operators of such websites will utilize your personal information.</p>\r\n<h4>Security</h4>\r\n<p class=\"mb-3\">The security of your Personal Information is important to us, but remember that no method of transmission over the Internet, or method of electronic storage, is 100% secure. While we strive to use commercially acceptable means to protect your Personal Information, we cannot guarantee its absolute security. We utilize practical protection measures to safeguard against the loss, abuse, and modification of the individual Data under our control. Personal Data is kept in a secured database and always sent out by means of an encrypted SSL method when supported by your web browser. No Web or email transmission is ever totally protected or mistake cost-free. For example, email sent out to or from the Website may not be protected. You must take unique care in deciding what info you send to us by means of email.</p>\r\n<h4>Privacy Policy Updates</h4>\r\n<p class=\"mb-3\">We reserve the right to modify this Privacy Policy at any time. You should review this Privacy Policy frequently. If we make material changes to this policy, we may notify you on our Website, by a blog post, by email, or by any method we determine. The method we chose is at our sole discretion. We will also change the \"Last Updated\" date at the beginning of this Privacy Policy. Any changes we make to our Privacy Policy are effective as of this Last Updated date and replace any prior Privacy Policies.</p>\r\n<h4>Questions About Our Privacy Practices or This Privacy Policy</h4>\r\n<p class=\"mb-3\">We are committed to conducting our business in accordance with these principles in order to ensure that the confidentiality of personal information is protected and maintained. If you have any questions about our Privacy Practices or this Policy, please contact us.</p>\r\n</div>', '2025-07-02 05:01:39', '2025-07-02 00:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `ptc_durations`
--

CREATE TABLE `ptc_durations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seconds` int(11) DEFAULT NULL,
  `tokens_take_per_view` int(11) DEFAULT NULL,
  `tokens_give_per_view` int(11) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ptc_durations`
--

INSERT INTO `ptc_durations` (`id`, `seconds`, `tokens_take_per_view`, `tokens_give_per_view`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 5, 50, 35, 1, '2025-08-31 23:55:48', '2025-09-01 00:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `ptc_intervals`
--

CREATE TABLE `ptc_intervals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ptc_intervals`
--

INSERT INTO `ptc_intervals` (`id`, `duration`, `type`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 5, 'Hours', 1, '2025-09-01 01:08:27', '2025-09-01 01:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `referral_comissions`
--

CREATE TABLE `referral_comissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `referral_user_id` int(11) NOT NULL,
  `referred_by_user_id` int(11) NOT NULL,
  `amount` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referral_comissions`
--

INSERT INTO `referral_comissions` (`id`, `referral_user_id`, `referred_by_user_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 10, 7, 7, '2025-08-21 02:50:36', '2025-08-21 02:50:36'),
(2, 10, 7, 7, '2025-08-21 02:50:36', '2025-08-21 02:50:36'),
(3, 10, 7, 7, '2025-08-21 02:50:36', '2025-08-21 02:50:36'),
(4, 10, 7, 7, '2025-08-21 02:50:36', '2025-08-21 02:50:36'),
(5, 10, 7, 7, '2025-08-21 02:50:36', '2025-08-21 02:50:36'),
(6, 10, 7, 7, '2025-08-21 02:50:36', '2025-08-21 02:50:36'),
(7, 10, 7, 5, '2025-09-08 06:10:24', '2025-09-08 06:10:24'),
(8, 10, 7, 5, '2025-09-08 23:41:34', '2025-09-08 23:41:34'),
(9, 10, 7, 5, '2025-09-12 06:19:38', '2025-09-12 06:19:38'),
(10, 10, 7, 5, '2025-09-12 06:25:07', '2025-09-12 06:25:07'),
(11, 10, 7, 5, '2025-09-12 06:33:16', '2025-09-12 06:33:16');

-- --------------------------------------------------------

--
-- Table structure for table `referral_commision_percentages`
--

CREATE TABLE `referral_commision_percentages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `referral_percentage` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referral_commision_percentages`
--

INSERT INTO `referral_commision_percentages` (`id`, `referral_percentage`, `created_at`, `updated_at`) VALUES
(1, 10, '2025-08-19 09:42:12', '2025-08-19 04:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `reward_tokens`
--

CREATE TABLE `reward_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokens` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reward_tokens`
--

INSERT INTO `reward_tokens` (`id`, `tokens`, `created_at`, `updated_at`) VALUES
(1, 50, '2025-08-22 06:35:07', '2025-09-09 02:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-06-22 07:44:06', '2022-06-22 07:44:06'),
(2, 'user', 'web', '2022-06-22 07:44:06', '2022-06-22 07:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2z3xiBWmScPgdKCqZGOgXiV5QwJeNmmfOAnKvlhT', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNDNmRTNNTEtiR2xYdHBoTlBuSHRpd3pYVWhYTHVLeGNhMVoxb2RFdyI7czoxMjoiU3VwcG9ydF9Vc2VyIjtzOjk6IlVzZXJfMjYwMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC91c2VyL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc7fQ==', 1757677060),
('307cgykOQaFNFKEeGDKlxQqsyQGFeIbCUt9XJnKn', 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSlhKWVFNMEhjTm5aeTF0VnVFMlBDTnN4cFRFV1dFWGpJQmpQblMzZiI7czoxMjoiU3VwcG9ydF9Vc2VyIjtzOjk6IlVzZXJfODE2NyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC91c2VyL2ZhdWNldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEwO30=', 1757676796);

-- --------------------------------------------------------

--
-- Table structure for table `set_rewards`
--

CREATE TABLE `set_rewards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reward_on` int(20) DEFAULT NULL,
  `reward_value` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `set_rewards`
--

INSERT INTO `set_rewards` (`id`, `reward_on`, `reward_value`, `currency`, `created_at`, `updated_at`) VALUES
(1, 50, '0.00000100', 'DOGE', '2025-08-16 06:13:48', '2025-09-09 01:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions`
--

CREATE TABLE `terms_and_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_and_conditions`
--

INSERT INTO `terms_and_conditions` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Terms And Conditions', '<div class=\"single-terms\">\r\n<p class=\"mb-3\">This web page represents a legal document that serves as our Terms of Service and it governs the legal terms of our website,&nbsp;<a href=\"http://www.cogentdevs.com/\">Cogent Devs</a>, sub-domains, and any associated web-based and mobile applications (collectively, \"Website\"), as owned and operated by Cogent Devs.</p>\r\n<p class=\"mb-3\">Capitalized terms, unless otherwise defined, have the meaning specified within the Definitions section below. This Terms of Service, along with our Privacy Policy, any mobile license agreement, and other posted guidelines within our Website, collectively \"Legal Terms\", constitute the entire and only agreement between you and Cogent Devs, and supersede all other agreements, representations, warranties and understandings with respect to our Website and the subject matter contained herein. We may amend our Legal Terms at any time without specific notice to you. The latest copies of our Legal Terms will be posted on our Website, and you should review all Legal Terms prior to using our Website. After any revisions to our Legal Terms are posted, you agree to be bound to any such changes to them. Therefore, it is important for you to periodically review our Legal Terms to make sure you still agree to them.</p>\r\n<p class=\"mb-3\">By accessing this website, you are agreeing to be bound by these Website Terms and Conditions of Use, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws. If you do not agree with any of these terms, you are prohibited from using or accessing this site. The materials contained in this Website are protected by applicable copyright and trademark law.</p>\r\n<p class=\"mb-3\">The last update to our Terms of Service was posted on March 8, 2024.</p>\r\n</div>\r\n<div class=\"single-terms\">\r\n<h4>Definitions</h4>\r\n<p class=\"mb-3\">The terms \"us\" or \"we\" or \"our\" refers to Cogent Devs, the owner of the Website.<br><br>A \"Visitor\" is someone who merely browses our Website, but has not registered as Member.<br><br>A \"Member\" is an individual that has registered with us to use our Service.<br><br>Our \"Service\" represents the collective functionality and features as offered through our Website to our Members.<br><br>A \"User\" is a collective identifier that refers to either a Visitor or a Member.<br><br>All text, information, graphics, audio, video, and data offered through our Website are collectively known as our \"Content\".</p>\r\n</div>\r\n<div class=\"single-terms\">\r\n<h4>Use License</h4>\r\n<ul class=\"content-feature-list  list-style \">\r\n<li>a. Permission is granted to temporarily download one copy of the materials (information or software) on Cogent Devs&rsquo;s Website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:\r\n<ul class=\"content-feature-list  list-style \">\r\n<li>i. modify or copy the materials;</li>\r\n<li>ii. use the materials for any commercial purpose, or for any public display (commercial or non-commercial);</li>\r\n<li>iii. attempt to decompile or reverse engineer any software contained on Cogent Devs&rsquo;s website;</li>\r\n<li>iv. remove any copyright or other proprietary notations from the materials; or</li>\r\n<li>v. transfer the materials to another person or &ldquo;mirror&rdquo; the materials on any other server.</li>\r\n</ul>\r\n</li>\r\n<li>b. This license shall automatically terminate if you violate any of these restrictions and may be terminated by Cogent Devs at any time. Upon terminating your viewing of these materials or upon the termination of this license, you must destroy any downloaded materials in your possession whether in electronic or printed format.</li>\r\n</ul>\r\n</div>\r\n<div class=\"single-terms\">\r\n<h4>Restricted Uses</h4>\r\n<p class=\"mb-3\">Listing of offered products on the Website could be used only for lawful purposes by Users of the Website. You could not frame or utilize framing techniques to enclose any hallmark, logo, copyrighted image, or most proprietary details (consisting of images, text, page layout, or type) of Cogent Devs without express composed consent. You might not use any meta tags or any various other \"unseen text\" utilizing Cogent Devs \'s name or trademarks without the express written consent of Cogent Devs. You agree not to offer or modify any content found on the Website consisting of, however not limited to, names of Users and Content, or to recreate, display, openly perform, distribute, or otherwise make use of the Material, in any way for any public function, in connection with services or products that are not those of Cogent Devs, in other way that is likely to trigger confusion among consumers, that disparages or challenges Cogent Devs or its licensors, that dilutes the strength of Cogent Devs \'s or its licensor\'s residential property, or that otherwise infringes Cogent Devs \'s or its licensor\'s copyright rights. You also agree to abstain from abusing any of the material that appears on the Site. The use of the Material on any other website or in a networked computer system environment for any purpose is prohibited. Any code that Cogent Devs develops to generate or show any Material of the pages making up the Website is likewise secured by Cogent Devs \'s copyright, and you may not copy or adjust such code.<br><br>Cogent Devs has no duty to keep track of any products published, transferred, or connected to or with the Site. If you think that something on the Website breaches these Terms please contact our marked representative as set forth below.<br><br>If alerted by a User of any products which allegedly do not conform to these Terms, Cogent Devs could in its single discernment explore the allegation and figure out whether to take other actions or ask for the removal or get rid of the Content. Cogent Devs has no liability or duty to Individuals for efficiency or nonperformance of such activities.</p>\r\n<h4>Electronic Communication</h4>\r\n<p class=\"mb-3\">You are connecting with us electronically when you go to the Website or send out emails to us. You consent to get interactions from us online. We will connect with you by email or by uploading notifications on the Site. You concur that all contracts notifications, disclosure, and various other communications that we provide to you digitally please any legal requirements that such communications be in writing.</p>\r\n<h4>Your Account</h4>\r\n<p class=\"mb-3\">If you utilize the Website, you are accountable for maintaining the confidentiality of your account and password and you accept responsibility for all activities that happen under your account and password. You also accept not to reveal any personally identifiable information, consisting of, however not limited to, first and last names, credentials, or various other details of a personal nature (\"Personal Data\") from the Site. Your disclosure of any Personal Data on the website might result in the immediate termination of your account. Cogent Devs additionally reserves the right to refuse service, terminate accounts, and remove or edit Content at its sole discernment.<br><br>Cogent Devs does not guarantee the truthfulness, precision, or dependability of Content on the site, consisting of Personal Data. Each Individual is accountable for upgrading and changing any pertinent account info when essential to preserve the truthfulness, precision, or reliability of the details.</p>\r\n<h4>Reviews, Comments, and Other Material</h4>\r\n<p class=\"mb-3\">Registered Users of the Website might post evaluations and remarks of a product and services purchased by means of the Website, so long as the Material is not unlawful, profane, threatening, defamatory, an invasive of privacy, infringing of intellectual property rights, or otherwise injurious to third parties or objectionable and does not include industrial solicitation, mass mailings, or any type of \"spam.\" You may not use another User\'s account to impersonate a User or entity, or otherwise deceive as to the origin of the opinions. Cogent Devs reserves the right (however is not bound) to eliminate or modify such Material, but does not regularly examine posted Material.<br><br>If you post an evaluation or send comments, and unless Cogent Devs suggests otherwise, you grant Cogent Devs a nonexclusive, royalty-free, permanent, irrevocable, and completely sublicensable right to utilize, recreate, modify, adjust, release, equate, create derivative works from, distribute, and screen such content throughout the world, in any media. You grant Cogent Devs and sublicenses the right to utilize your name in connection with such Material, if they choose. You represent and require that You own or otherwise control all the rights to the content that You post; that the content is accurate; that use of the content You supply does not violate this policy and will not trigger injury to anyone or entity; which You will indemnify Cogent Devs for all claims resulting from Content You supply. Cogent Devs has the right but not the commitment to edit and keep track of or eliminate any task or Material. Cogent Devs takes no duty and assumes no liability for any content published by You or any 3rd party.</p>\r\n<h4>Legal Compliance</h4>\r\n<p class=\"mb-3\">You agree to comply with all applicable domestic and international laws, statutes, ordinances, and regulations regarding your use of our Website. Cogent Devs reserves the right to investigate complaints or reported violations of our Legal Terms and to take any action we deem appropriate, including but not limited to canceling your Member account, reporting any suspected unlawful activity to law enforcement officials, regulators, or other third parties and disclosing any information necessary or appropriate to such persons or entities relating to your profile, email addresses, usage history, posted materials, IP addresses and traffic information, as allowed under our Privacy Policy.</p>\r\n<h4>Intellectual Property</h4>\r\n<p class=\"mb-3\">Our Website may contain our service marks or trademarks as well as those of our affiliates or other companies, in the form of words, graphics, and logos. Your use of our Website does not constitute any right or license for you to use such service marks/trademarks, without the prior written permission of the corresponding service mark/trademark owner. Our Website is also protected under international copyright laws. The copying, redistribution, use or publication by you of any portion of our Website is strictly prohibited. Your use of our Website does not grant you ownership rights of any kind in our Website.</p>\r\n<h4>Revisions and Errata</h4>\r\n<p class=\"mb-3\">The materials appearing on Cogent Devs&rsquo;s Website could include technical, typographical, or photographic errors. Cogent Devs does not warrant that any of the materials on its Website are accurate, complete, or current. Cogent Devs may make changes to the materials contained on its Website at any time without notice. Cogent Devs does not, however, make any commitment to update the materials.</p>\r\n<h4>Disclaimer</h4>\r\n<p class=\"mb-3\">The materials on Cogent Devs\'s Website are provided \"as is\" Cogent Devs makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties, including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights. Furthermore,&nbsp;<strong>Egyptian Life Community</strong>&nbsp;does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its Internet Website or otherwise relating to such materials or on any sites linked to this site. The Website serves as a venue for Individuals to purchase distinct service or products. Neither Cogent Devs nor the Website has control over the quality or fitness for a particular function of a product. Cogent Devs likewise has no control over the accuracy, reliability, completeness, or timeliness of the User-submitted details and makes no representations or warranties about any info on the Site.</p>\r\n<p class=\"mb-3\">THE WEBSITE AND ALL DETAILS, CONTENT, MATERIALS, PRODUCTS (INCLUDING SOFTWARE APPLICATION) AND SERVICES LISTED ON OR OTHERWISE MADE AVAILABLE TO YOU THROUGH THIS WEBSITE ARE PROVIDED BY Egyptian Life Community ON AN \"AS IS\" AND \"AS AVAILABLE\" BASIS, UNLESS OTHERWISE SPECIFIED IN WRITING. Cogent Devs MAKES NO REPRESENTATIONS OR WARRANTIES OF ANY KIND, EXPRESS OR IMPLIED, ABOUT THE OPERATION OF THIS Website OR THE INFO, MATERIALS, PRODUCTS (INCLUDING SOFTWARE) OR SERVICES LISTED ON OR OTHERWISE MADE AVAILABLE TO YOU THROUGH THIS SITE, UNLESS OTHERWISE POINTED OUT IN WRITING. YOU EXPRESSLY AGREE THAT YOUR USE OF THIS WEBSITE IS AT YOUR OWN RISK.<br><br>TO THE COMPLETE EXTENT PERMISSIBLE BY APPLICABLE LAW, Cogent Devs DISCLAIMS ALL WARRANTIES, EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, IMPLIED WARRANTIES OF MERCHANTABILITY AND PHYSICAL FITNESS FOR A PARTICULAR PURPOSE. Cogent Devs DOES NOT WARRANT THAT THIS WEBSITE; DETAILS, CONTENT, MATERIALS, PRODUCTS (INCLUDING SOFTWARE APPLICATION) OR SERVICES CONSISTED OF ON OR OTHERWISE MADE AVAILABLE TO YOU THROUGH THE SITE; ITS SERVERS; OR EMAIL SENT FROM Cogent Devs ARE WITHOUT VIRUSES OR OTHER HARMFUL ELEMENTS. Egyptian Life Community WILL NOT BE LIABLE FOR ANY DAMAGES OF ANY KIND ARISING FROM THE USE OF THE WEBSITE OR FROM ANY DETAILS, CONTENT, MATERIALS, PRODUCTS (INCLUDING SOFTWARE APPLICATION) OR SERVICES LISTED ON OR OTHERWISE MADE AVAILABLE TO YOU WITH THIS SITE, INCLUDING, BUT NOT LIMITED TO DIRECT, INDIRECT, INCIDENTAL, PUNITIVE, AND CONSEQUENTIAL DAMAGES, UNLESS OTHERWISE POINTED OUT IN WRITING. UNDER NO SCENARIO SHALL Cogent Devs\'S LIABILITY DEVELOPING FROM OR IN CONNECTION WITH THE WEBSITE OR YOUR USE OF THE WEBSITE, DESPITE THE REASON FOR ACTION (WHETHER IN AGREEMENT, TORT, BREACH OF SERVICE WARRANTY OR OTHERWISE), GO BEYOND $100.</p>\r\n<h4>Links to Other Websites</h4>\r\n<p class=\"mb-3\">Our Website may contain links to third party websites. These links are provided solely as a convenience to you. By linking to these websites, we do not create or have an affiliation with, or sponsor such third party websites. The inclusion of links within our Website does not constitute any endorsement, guarantee, warranty, or recommendation of such third party websites. Cogent Devs has no control over the legal documents and privacy practices of third party websites; as such, you access any such third party websites at your own risk</p>\r\n<h4>Site Terms of Service Modifications</h4>\r\n<p class=\"mb-3\">Cogent Devs may revise these Terms of Service for its Website at any time without notice. By using this Website you are agreeing to be bound by the then current version of these Terms and Conditions of Use.</p>\r\n<h4>Governing Law</h4>\r\n<p class=\"mb-3\">Any claim relating to Cogent Devs&rsquo;s Website shall be governed by the laws of USA without regard to its conflict of law provisions, and You consent to exclusive jurisdiction and venue in such courts.</p>\r\n<h4>Indemnity</h4>\r\n<p class=\"mb-3\">You accept defend, indemnify, and hold safe Cogent Devs, its affiliates, and their corresponding officers, directors, agents and workers, from and against any claims, actions or demands, including without limitation affordable legal, accounting, and other provider charges, affirming or resulting from (i) any Content of most material You offer to the Site, (ii) Your use of any Content, or (iii) Your breach of the terms of these Terms. Cogent Devs will provide notice to You promptly of any such claim, match, or case.</p>\r\n<h4>General Terms</h4>\r\n<p class=\"mb-3\">Our Legal Terms shall be treated as though it were executed and performed in USA and shall be governed by and construed in accordance with the laws of USA without regard to conflict of law principles. In addition, you agree to submit to the personal jurisdiction and venue of such courts. Any cause of action by you with respect to our Website, must be instituted within one (1) year after the cause of action arose or be forever waived and barred. Should any part of our Legal Terms be held invalid or unenforceable, that portion shall be construed consistent with applicable law and the remaining portions shall remain in full force and effect. To the extent that any Content in our Website conflicts or is inconsistent with our Legal Terms, our Legal Terms shall take precedence. Our failure to enforce any provision of our Legal Terms shall not be deemed a waiver of such provision nor of the right to enforce such provision. The rights of Cogent Devs under our Legal Terms shall survive the termination of our Legal Terms.</p>\r\n</div>', '2025-07-02 05:01:19', '2025-07-02 00:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `timers`
--

CREATE TABLE `timers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `timer_in_mint` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timers`
--

INSERT INTO `timers` (`id`, `timer_in_mint`, `created_at`, `updated_at`) VALUES
(1, 5, '2025-08-16 06:13:47', '2025-08-16 01:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `referred_by` int(20) DEFAULT NULL,
  `referral_code` varchar(255) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT 1,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `referred_by`, `referral_code`, `isActive`, `isDeleted`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@faucet.com', NULL, NULL, '$2y$12$jEVhjlgDbCb.mwnVga7pgOpUo/kFMYH5WbyggX6LzTM.om5Xqgm02', NULL, NULL, NULL, 1, 0, '2025-08-15 07:14:52', '2025-08-15 07:14:52'),
(7, 'Muhammad Muzammil', 'muzammilken95@gmail.com', NULL, NULL, '$2y$12$64c6UEzHCqhDR2aN3uIiIOKNO.14A9YB86Inpywaq.L4ggi2KgMc2', NULL, NULL, 'e865d22d47d80695838320250815105400', 1, 0, '2025-08-15 05:54:00', '2025-08-15 08:08:31'),
(8, 'Muhammad Hammad', 'hammadkhan@gmail.com', NULL, NULL, '$2y$12$zMv4dHK.mn7WIGtEpxvBqe1MnXdOekN7QshMUXP3HKdo5AD2VvCou', NULL, NULL, 'e865d22d47d80695838320250818092202', 1, 0, '2025-08-18 04:22:02', '2025-08-18 04:22:02'),
(10, 'Muhammad Usama', 'usama@gmail.com', NULL, NULL, '$2y$12$NRf.uQAGZqPMlDBnURU/rOhM7TxFY0AKW/TFGslK5GDjIvu8K.zGG', NULL, 7, 'dce4e1585fd4e084effc20250819125051', 1, 0, '2025-08-19 07:50:51', '2025-08-19 07:50:51'),
(11, 'Wasi Sajjad', 'wasi@gmail.com', NULL, NULL, '$2y$12$Io2sk689YjmF25SFmQ.3iu8lMokb9gT/kkgL730gum4ylJVzW8.gG', NULL, NULL, 'c7aeae961dab12e96b2b20250909111905', 0, 0, '2025-09-09 06:19:05', '2025-09-09 06:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `base_reward_token` double DEFAULT NULL,
  `experiance` int(11) NOT NULL DEFAULT 0,
  `level` int(11) NOT NULL DEFAULT 0,
  `total_reward` int(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `base_reward_token`, `experiance`, `level`, `total_reward`, `created_at`, `updated_at`) VALUES
(1, 7, 52, 7, 1, 441, '2025-08-16 06:43:25', '2025-09-12 06:33:16'),
(2, 8, 50, 0, 0, 65, '2025-08-18 04:22:02', '2025-08-18 04:23:22'),
(4, 10, 52, 5, 1, 650, '2025-08-19 07:50:51', '2025-09-12 06:33:16'),
(5, 11, 50, 0, 0, 0, '2025-09-09 06:19:05', '2025-09-09 06:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_reward_cliams`
--

CREATE TABLE `user_reward_cliams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `get_reward` int(20) NOT NULL,
  `claim_on` varchar(255) NOT NULL,
  `next_claim_after` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_reward_cliams`
--

INSERT INTO `user_reward_cliams` (`id`, `user_id`, `get_reward`, `claim_on`, `next_claim_after`, `created_at`, `updated_at`) VALUES
(1, 7, 65, '2025-08-18 07:00:14', '2025-08-18 07:05:14', '2025-08-18 02:00:14', '2025-08-18 02:00:14'),
(2, 7, 65, '2025-08-18 07:05:53', '2025-08-18 07:10:53', '2025-08-18 02:05:53', '2025-08-18 02:05:53'),
(3, 7, 65, '2025-08-18 07:11:22', '2025-08-18 07:16:22', '2025-08-18 02:11:22', '2025-08-18 02:11:22'),
(4, 7, 65, '2025-08-18 09:12:46', '2025-08-18 09:17:46', '2025-08-18 04:12:46', '2025-08-18 04:12:46'),
(5, 7, 65, '2025-08-18 09:17:58', '2025-08-18 09:22:58', '2025-08-18 04:17:58', '2025-08-18 04:17:58'),
(6, 8, 65, '2025-08-18 09:23:21', '2025-08-18 09:28:21', '2025-08-18 04:23:21', '2025-08-18 04:23:21'),
(7, 7, 65, '2025-08-18 09:27:01', '2025-08-18 09:32:01', '2025-08-18 04:27:01', '2025-08-18 04:27:01'),
(8, 7, 65, '2025-08-21 06:27:39', '2025-08-21 06:32:39', '2025-08-21 01:27:39', '2025-08-21 01:27:39'),
(9, 10, 65, '2025-08-21 06:27:50', '2025-08-21 06:32:50', '2025-08-21 01:27:50', '2025-08-21 01:27:50'),
(10, 10, 65, '2025-08-21 07:18:06', '2025-08-21 07:23:06', '2025-08-21 02:18:06', '2025-08-21 02:18:06'),
(11, 10, 65, '2025-08-21 07:46:43', '2025-08-21 07:51:43', '2025-08-21 02:46:43', '2025-08-21 02:46:43'),
(12, 10, 65, '2025-08-21 07:47:21', '2025-08-21 07:52:21', '2025-08-21 02:47:21', '2025-08-21 02:47:21'),
(13, 10, 65, '2025-08-21 07:50:14', '2025-08-21 07:55:14', '2025-08-21 02:50:14', '2025-08-21 02:50:14'),
(14, 10, 65, '2025-08-21 07:50:36', '2025-08-21 07:55:36', '2025-08-21 02:50:36', '2025-08-21 02:50:36'),
(15, 7, 65, '2025-08-21 07:54:01', '2025-08-21 07:59:01', '2025-08-21 02:54:01', '2025-08-21 02:54:01'),
(16, 7, 50, '2025-09-08 10:50:08', '2025-09-08 10:55:08', '2025-09-08 05:50:08', '2025-09-08 05:50:08'),
(17, 7, 50, '2025-09-08 11:03:10', '2025-09-08 11:08:10', '2025-09-08 06:03:10', '2025-09-08 06:03:10'),
(18, 10, 50, '2025-09-08 11:10:24', '2025-09-08 11:15:24', '2025-09-08 06:10:24', '2025-09-08 06:10:24'),
(19, 7, 50, '2025-09-09 04:40:08', '2025-09-09 04:45:08', '2025-09-08 23:40:08', '2025-09-08 23:40:08'),
(20, 10, 50, '2025-09-09 04:41:34', '2025-09-09 04:46:34', '2025-09-08 23:41:34', '2025-09-08 23:41:34'),
(21, 7, 50, '2025-09-12 11:13:22', '2025-09-12 11:18:22', '2025-09-12 06:13:22', '2025-09-12 06:13:22'),
(22, 10, 50, '2025-09-12 11:19:38', '2025-09-12 11:24:38', '2025-09-12 06:19:38', '2025-09-12 06:19:38'),
(23, 7, 52, '2025-09-12 11:20:55', '2025-09-12 11:25:55', '2025-09-12 06:20:55', '2025-09-12 06:20:55'),
(24, 10, 50, '2025-09-12 11:25:07', '2025-09-12 11:30:07', '2025-09-12 06:25:07', '2025-09-12 06:25:07'),
(25, 7, 52, '2025-09-12 11:26:31', '2025-09-12 11:31:31', '2025-09-12 06:26:31', '2025-09-12 06:26:31'),
(26, 7, 52, '2025-09-12 11:33:11', '2025-09-12 11:38:11', '2025-09-12 06:33:11', '2025-09-12 06:33:11'),
(27, 10, 50, '2025-09-12 11:33:16', '2025-09-12 11:38:16', '2025-09-12 06:33:16', '2025-09-12 06:33:16');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `amount` decimal(18,8) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `tx_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `user_id`, `address`, `amount`, `currency`, `status`, `tx_id`, `created_at`, `updated_at`) VALUES
(1, 7, 'muzammilken95@gmail.com', 0.00000086, 'BTC', 'failed', NULL, '2025-09-08 01:13:23', '2025-09-08 01:13:28'),
(2, 7, 'muzammilken95@gmail.com', 0.00000086, 'BTC', 'failed', NULL, '2025-09-08 01:19:06', '2025-09-08 01:19:08'),
(3, 7, 'muzammilken95@gmail.com', 0.00000086, 'BTC', 'failed', NULL, '2025-09-08 02:38:22', '2025-09-08 02:38:25'),
(4, 7, 'muzammilken95@gmail.com', 0.00000086, 'BTC', 'failed', NULL, '2025-09-08 02:39:42', '2025-09-08 02:39:43'),
(5, 7, 'muzammilken95@gmail.com', 0.00000086, 'BTC', 'failed', NULL, '2025-09-08 02:49:30', '2025-09-08 02:49:32'),
(6, 7, 'muzammilken95@gmail.com', 0.00000086, 'BTC', 'failed', NULL, '2025-09-08 04:40:27', '2025-09-08 04:40:29'),
(7, 7, 'muzammilken95@gmail.com', 0.00000086, 'DOGE', 'failed', NULL, '2025-09-08 04:49:45', '2025-09-08 04:49:47'),
(8, 7, 'muzammilken95@gmail.com', 0.00000086, 'DOGE', 'failed', NULL, '2025-09-08 04:52:21', '2025-09-08 04:52:22'),
(9, 7, 'muzammilken95@gmail.com', 0.00000086, 'DOGE', 'failed', NULL, '2025-09-08 04:53:46', '2025-09-08 04:53:47'),
(10, 7, 'muzammilken95@gmail.com', 0.00000086, 'DOGE', 'failed', NULL, '2025-09-08 04:55:07', '2025-09-08 04:55:08'),
(11, 7, 'muzammilken95@gmail.com', 0.01000000, 'DOGE', 'failed', NULL, '2025-09-08 05:06:26', '2025-09-08 05:06:28'),
(12, 7, 'muzammilken95@gmail.com', 0.00010000, 'DOGE', 'failed', NULL, '2025-09-08 05:08:05', '2025-09-08 05:08:06'),
(13, 7, 'muzammilken95@gmail.com', 0.00010000, 'DOGE', 'failed', NULL, '2025-09-08 05:12:06', '2025-09-08 05:12:07'),
(14, 7, 'DPu5qQtg86LtV69qLquQw4EotvMkzf3t64', 1.00000000, 'DOGE', 'success', '6226425786', '2025-09-08 05:22:01', '2025-09-08 05:22:03'),
(15, 7, 'DPu5qQtg86LtV69qLquQw4EotvMkzf3t64', 100.00000000, 'DOGE', 'success', '6226434421', '2025-09-08 05:28:20', '2025-09-08 05:28:21'),
(16, 7, 'DPu5qQtg86LtV69qLquQw4EotvMkzf3t64', 0.00000100, 'DOGE', 'failed', NULL, '2025-09-08 05:33:12', '2025-09-08 05:33:13'),
(17, 7, 'DPu5qQtg86LtV69qLquQw4EotvMkzf3t64', 0.00000100, 'DOGE', 'success', '6226444437', '2025-09-08 05:35:27', '2025-09-08 05:35:29'),
(18, 7, 'DPu5qQtg86LtV69qLquQw4EotvMkzf3t64', 0.00000100, 'DOGE', 'success', '6226446748', '2025-09-08 05:37:10', '2025-09-08 05:37:12'),
(19, 7, 'muzammilken95@gmail.com', 0.00000100, 'DOGE', 'success', '6226449356', '2025-09-08 05:39:04', '2025-09-08 05:39:05'),
(20, 7, 'muzammilken95@gmail.com', 0.00001334, 'DOGE', 'failed', NULL, '2025-09-08 06:28:53', '2025-09-08 06:28:54'),
(21, 7, 'muzammilken95@gmail.com', 999.00000000, 'DOGE', 'success', '6226536139', '2025-09-08 06:41:04', '2025-09-08 06:41:05'),
(22, 7, 'muzammilken95@gmail.com', 999.00000000, 'DOGE', 'success', '6226539477', '2025-09-08 06:43:26', '2025-09-08 06:43:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_mains`
--
ALTER TABLE `about_mains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exchange_token_limits`
--
ALTER TABLE `exchange_token_limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiance_on_claims`
--
ALTER TABLE `experiance_on_claims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `front_footers`
--
ALTER TABLE `front_footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_bonus_on_experiances`
--
ALTER TABLE `level_bonus_on_experiances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_tags`
--
ALTER TABLE `meta_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `per_day_limits`
--
ALTER TABLE `per_day_limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ptc_durations`
--
ALTER TABLE `ptc_durations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ptc_intervals`
--
ALTER TABLE `ptc_intervals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_comissions`
--
ALTER TABLE `referral_comissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_commision_percentages`
--
ALTER TABLE `referral_commision_percentages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reward_tokens`
--
ALTER TABLE `reward_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `set_rewards`
--
ALTER TABLE `set_rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timers`
--
ALTER TABLE `timers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reward_cliams`
--
ALTER TABLE `user_reward_cliams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `about_mains`
--
ALTER TABLE `about_mains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exchange_token_limits`
--
ALTER TABLE `exchange_token_limits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `experiance_on_claims`
--
ALTER TABLE `experiance_on_claims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_footers`
--
ALTER TABLE `front_footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `level_bonus_on_experiances`
--
ALTER TABLE `level_bonus_on_experiances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meta_tags`
--
ALTER TABLE `meta_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `per_day_limits`
--
ALTER TABLE `per_day_limits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ptc_durations`
--
ALTER TABLE `ptc_durations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ptc_intervals`
--
ALTER TABLE `ptc_intervals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `referral_comissions`
--
ALTER TABLE `referral_comissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `referral_commision_percentages`
--
ALTER TABLE `referral_commision_percentages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reward_tokens`
--
ALTER TABLE `reward_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `set_rewards`
--
ALTER TABLE `set_rewards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timers`
--
ALTER TABLE `timers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_reward_cliams`
--
ALTER TABLE `user_reward_cliams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
