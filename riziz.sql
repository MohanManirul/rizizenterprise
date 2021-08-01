-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 12:49 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riziz`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `aboutUs` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sAbout` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `qOne` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qTwo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qThree` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mAbout` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `aboutUs`, `sAbout`, `qOne`, `qTwo`, `qThree`, `mAbout`, `created_at`, `updated_at`) VALUES
(2, '<p><em>Lorem ipsum</em>, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s De Finibus Bonorum et Malorum for use in a type specimen book.</p>', '<p><em>Lorem ipsum</em>, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s De Finibus Bonorum et Malorum for use in a type specimen book.</p>', 'This simple article demonstrates of laravel install ckeditor example.', 'This simple article demonstrates of laravel install ckeditor example.', 'This simple article demonstrates of laravel install ckeditor example.', '<p><em>Lorem ipsum</em>, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s De Finibus Bonorum et Malorum for use in a type specimen book.</p>', '2021-03-30 00:03:42', '2021-03-30 00:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Super Admin' COMMENT 'Admin|Super Admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone_no`, `avatar`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Manirul', 'fiforeg@gmail.com', '$2y$10$6M7.5A8wDNmzHLvIewSHm.0nqhAJliQ739ID8sNcU928i5pphuyFy', '01915985336', NULL, 'Super Admin', 'c8ycQrzdrO65BY87cal4LbIpcsNHFsjGOFwdTPP9LovAjof40F8FRqOTLgd6', '2020-07-09 12:55:55', '2020-07-09 12:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `background_images`
--

CREATE TABLE `background_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `background_images`
--

INSERT INTO `background_images` (`id`, `image`, `created_at`, `updated_at`) VALUES
(3, '1617792211.jpg', '2021-04-07 04:13:18', '2021-04-07 04:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `circle_images`
--

CREATE TABLE `circle_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `slogan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageOne` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageTwo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageThree` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageFour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `circle_images`
--

INSERT INTO `circle_images` (`id`, `slogan`, `imageOne`, `imageTwo`, `imageThree`, `imageFour`, `created_at`, `updated_at`) VALUES
(6, 'Thinking', '1415381570.jpg', '526686140.jpg', '1287340120.jpg', '214681447.jpeg', '2021-04-07 00:47:43', '2021-04-07 00:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `contactuses`
--

CREATE TABLE `contactuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactuses`
--

INSERT INTO `contactuses` (`id`, `location`, `phone_no`, `email`, `title`, `twitter`, `facebook`, `instagram`, `skype`, `linkedin`, `created_at`, `updated_at`) VALUES
(3, 'Shewrapara , Mirpur, Dhaka', '1212121212', 'fiforeg@gmail.com', 'Easy and Quick Solution of Online Ecommerce', 'tw.com/cc', 'facebook.com/bd', 'in.com/nn', 'sss.com/cc', 'ldd.com/mm', '2021-03-30 23:33:45', '2021-03-30 23:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `enlisteds`
--

CREATE TABLE `enlisteds` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enlisteds`
--

INSERT INTO `enlisteds` (`id`, `name`, `link`, `created_at`, `updated_at`) VALUES
(2, 'NSSD(Bangladesh Navy)', 'http://www.nssd.navy.mil.bd/0/0/front-tender', '2021-04-06 07:51:17', '2021-04-06 07:51:17'),
(3, 'CMTD (Bangladesh Army)', 'https://cmtd.itdte.net/cmtd', '2021-04-06 07:51:39', '2021-04-06 07:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` int(10) UNSIGNED NOT NULL,
  `weare` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `weare`, `address`, `mobile`, `email`, `website`, `created_at`, `updated_at`) VALUES
(1, 'We supply all kinds of Aviation Stores, Marine Stores, Spares, Systems, Electronics, computer and IT equipment. We also provide support for servicing, overhauling and repair of equipment and Vehicle.', 'Dhaka ,asasas', '01915985336', 'fiforeg@gmail.com', 'dsfasfs', '2021-04-07 03:22:30', '2021-04-07 03:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `image`, `created_at`, `updated_at`) VALUES
(4, '1617720008.gif', '2021-04-06 08:40:08', '2021-04-06 08:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `mobile`, `message`, `created_at`, `updated_at`) VALUES
(3, 'Manirul Islam', 'fiforeg@gmail.com', 'Abou producyt xcxcxcxcsedadddddddddddddddddddddddddddddddddd', '01915985336', 'Abou producyt xcxcxcxcsedaddddddddddddddddddddddddddddddddddAbou producyt xcxcxcxcsedaddddddddddddddddddddddddddddddddddAbou producyt xcxcxcxcsedaddddddddddddddddddddddddddddddddddAbou producyt xcxcxcxcsedaddddddddddddddddddddddddddddddddddAbou producyt xcxcxcxcsedaddddddddddddddddddddddddddddddddddAbou producyt xcxcxcxcsedaddddddddddddddddddddddddddddddddddAbou producyt xcxcxcxcsedadddddddddddddddddddddddddddddddddd', '2021-03-31 02:09:35', '2021-03-31 02:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2014_10_12_000000_create_users_table', 3),
(18, '2018_02_23_015128_create_admins_table', 9),
(54, '2021_03_30_051515_create_abouts_table', 23),
(58, '2021_03_30_104318_create_services_table', 24),
(60, '2021_03_31_033929_create_contact_uses_table', 26),
(62, '2021_03_31_044645_create_contactuses_table', 27),
(64, '2021_03_31_061351_create_messages_table', 28),
(65, '2019_02_24_043826_create_sliders_table', 29),
(66, '2018_02_23_015040_create_brands_table', 30),
(69, '2021_04_06_094202_create_enlisteds_table', 31),
(70, '2021_04_06_135553_create_logos_table', 32),
(74, '2021_04_07_054939_create_circle_images_table', 33),
(77, '2021_04_07_070917_create_footers_table', 34),
(78, '2021_04_07_093828_create_background_images_table', 35);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('manirujjamanakash@gmail.com', '$2y$10$6kvdXSTLNfyuumf/HeFgVuJLWKRsPNU248kv8PKbiOEddlq5U69Uq', '2019-06-15 07:40:30'),
('fiforeg@gmail.com', '$2y$10$F5OTS.UqIWEyh0JFR2n73eiCNpqTIrkAUFATZyXIG0cplzjDY31pq', '2020-08-25 12:51:35'),
('asj@gmail.com', '$2y$10$ErOMDKsEc60KZVfJKWQQre0sjfMlB.NCRBvFx9DcXWLK8.kKvCL.S', '2021-01-09 14:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `descriptions`, `image`, `created_at`, `updated_at`) VALUES
(8, 'What is Lorem Ipsum?', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '1617102676.jpg', '2021-03-30 05:11:16', '2021-03-30 05:11:16'),
(9, 'only five centuries, but also the leap', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '1617102696.jpg', '2021-03-30 05:11:36', '2021-03-30 05:11:36'),
(10, 'to electronic typesetting,', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '1617102716.jpg', '2021-03-30 05:11:56', '2021-03-30 05:11:56'),
(11, 'desktop publishing software like Aldus PageMaker', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '1617102737.jpg', '2021-03-30 05:12:17', '2021-03-30 05:12:17'),
(12, 'containing Lorem Ipsum passages, and', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '1617102756.jpg', '2021-03-30 05:12:36', '2021-03-30 05:12:36'),
(13, 'Lorem Ipsum passages, and', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '1617102778.jpg', '2021-03-30 05:12:59', '2021-03-30 05:12:59'),
(14, 'oftware like Aldus PageMake', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '1617102802.jpg', '2021-03-30 05:13:22', '2021-03-30 05:13:22'),
(15, 'It was popularised in the 1960s with', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '1617102822.jpg', '2021-03-30 05:13:42', '2021-03-30 05:13:42'),
(16, 'publishing software like Aldus PageMaker', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '1617102838.jpg', '2021-03-30 05:13:58', '2021-03-30 05:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgPicture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `favicon`, `logo`, `bgPicture`, `title`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, '341453395.png', '160268725.jpeg', '244150247.png', 'We supply all kinds of Aviation, Stores, Marine Stores, Electronics and technical stores', 'Thanking Ahead and Growing First', '2021-03-31 10:49:09', '2021-03-31 10:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL COMMENT 'Division Table ID',
  `district_id` int(10) UNSIGNED NOT NULL COMMENT 'District Table ID',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=Inactive|1=Active|2=Ban',
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `phone_no`, `email`, `password`, `street_address`, `division_id`, `district_id`, `status`, `ip_address`, `avatar`, `shipping_address`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'Maniruzzaman', 'Akash', 'maniruzzamanakash2', '1951233084', 'manirujjamanakash@gmail.com', '$2y$10$hFKyIY6GoQ.anijWOknn7eKyXKn9xQC7jvWthDPs3./hXG3tXQ8Gi', 'Patuakhali, Bangladesh', 4, 2, 1, '::1', NULL, 'New', 'OOqu99dDW7f9qUdSPRk2KEqaTDjMeIWfEKFE4Hs9CCM8m29essCueddLBXRI', '2018-07-22 00:35:46', '2018-08-27 19:45:20'),
(9, 'Rekha', 'Akter', 'rekhaakter', '01720550615', 'rekha50615@gmail.com', '$2y$10$oZ271qFeCJWxwrj792adBuINJg70mjR3i6/7pH.YAiQejv14t.cji', 'South banasree,blk -c,mainroad', 2, 5, 1, '103.58.73.123', NULL, NULL, 'HVVYGHDIJjyBcfnncGo06eyGMNo14FxC83uQROdI1LVWBf9BHF', '2020-07-21 12:56:44', '2020-07-21 12:56:44'),
(12, 'Pk', 'Asif', 'pkasif', '01720496650', 'faridayeasminr99@gmail.com', '$2y$10$qAiKaFpiVQbN8u.0eTYlOOxFRgLpu/cO6PVWjsQaIgn60kNTRA79a', 'Tanore', 3, 13, 0, '37.111.239.225', NULL, NULL, 'wkhwiC6LaYPNbfgHZINyd4k38yQH4YFzIfXtKAuD5nAApThiwu', '2020-07-25 17:51:46', '2020-07-25 17:51:46'),
(20, 'M', 'Islam', 'mislam', '+8801717514200', 'fifol@gmail.com', '$2y$10$UEjKKXANT7aEn0P39rEDc.A2YE8E5DyLEk1xmpHG5ziac3zfvw5Zi', 'Dhaka', 3, 8, 0, '37.111.227.17', NULL, NULL, 'sTyMxCmSymAp8V831UfFlwm9dQjLUgOjF82gCbdo0EgHLQ6dLL', '2020-10-26 19:44:50', '2020-10-26 19:44:50'),
(23, 'fgf', 'fgf', 'fgffgf', '+8801717514286', 'fiforeg@gmail.com', '$2y$10$iP91Fp2OchJa6KUh4YkHwusUahF8PAp5NMWnx8X5/2mH9Svhc8p86', 'Dhaka', 3, 8, 0, '37.111.227.17', NULL, NULL, 'Tb2Sns2R7F6167ZrlP5SZ884fyYFykuIR8GzQLjtrYN46ehqWy', '2020-10-26 20:21:07', '2020-10-26 20:21:07'),
(24, 'Manirul', 'Islam', 'manirulislam', '+8801717514000', 'fiforegmm@gmail.com', '$2y$10$77NMb3NKkZTjK/7sZAewj.93/S6p/NWuA5g9P5hGDfkAfZQT4NxLG', 'Dhaka', 3, 8, 0, '37.111.227.17', NULL, NULL, 'XdpFPgQyiSUkyDywvGfLoMwKNeGGFUKwfjCrKdgxY6Sa2hLsr3', '2020-10-26 20:47:54', '2020-10-26 20:47:54'),
(26, 'sds', 'sdsd', 'sdssdsd', '01915888888', 'sdss@gmail.com', '$2y$10$FIO9VRPqBaJ6LYI3OY2EHOVp0k9WduFVc4oV4tFb8t4ffL9SYHwEm', 'Dhaka', 3, 8, 0, '37.111.227.17', NULL, NULL, 'T7chPXbYL5IO7OCMDpoH4U29bYmjV8oIckhliLgT8yHt5oHU9j', '2020-10-26 20:51:34', '2020-10-26 20:51:34'),
(27, 'dsdsffd', 'dfdf', 'dsdsffddfdf', '+8801717514333', 'sl@gmail.com', '$2y$10$L6xv06QdxIa7pCHEDizF2e257gY.OMt59WNAo5eZG7q5WmUT0SwSO', 'Dhaka', 3, 8, 0, '37.111.227.17', NULL, NULL, 'DHMobPBfeo10iq5mUYgnpdTKawfg4MIcJ8vYAfcxG6LL9OKqPF', '2020-10-26 22:36:47', '2020-10-26 22:36:47'),
(30, 'asewq', 'qwwqee', 'asewqqwwqee', '+8801717514300', 'aqwe@gmail.com', '$2y$10$9XW1Nf9APKCA0chq3KdvdeMLbeb5nvfUUWido1JBs9Apln1QJ3pzS', 'Dhaka', 3, 8, 1, '103.35.168.154', NULL, NULL, 'xTqvQGTIvCH1Xmkwgqxt3IVQddjYFwrrX3R8Yf1eumjaaUzlzmoWCWaOfxPN', '2021-01-09 14:00:09', '2021-01-09 14:00:09'),
(31, 'a', 's', 'as', '01913985336', 'asj@gmail.com', '$2y$10$nnrQgBNRInqzjzYBk2NIreDTm2hmzjazh33KlDeU6ahvdI75bVWeK', 'Dhaka', 3, 8, 1, '103.35.168.154', NULL, NULL, '2BTVIZPC2EPOUskIwtFGA9Od3NtX2gBAgovTr2FA0Hl8EhFhskFi7cCmtmcb', '2021-01-09 14:07:36', '2021-01-09 14:07:36'),
(34, 'ggh', 'hhh', 'gghhhh', '+8801717514001', 'hhasdh@gmail.com', '$2y$10$1d/AepTuh0yNsH4vDaB3fO8Nmlj01x6u0e96jkqaoI0QpPXx7ai/K', 'Dhaka', 3, 8, 0, '103.35.168.154', NULL, NULL, 'iC4tN2QJxliQltgxl71D03IOAsUtHMdv66EG9wtkYR88IwXbgF', '2021-01-09 15:44:03', '2021-01-09 15:44:03'),
(37, 's', 'oio', 'soio', '01915636969', 'gfgfgf@gmail.com', '$2y$10$m5rz2r3/qkY3aOpnexqtY.4T195qaXmI19hUJCN/ijZIeQWtcIR6a', 'Dhaka', 3, 8, 0, '103.35.168.154', NULL, NULL, '7NETgMcWqY3bzBICm1m7QnFthGhoG8leceawAlL9nq3n3uVqNZ', '2021-01-09 15:48:31', '2021-01-09 15:48:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `background_images`
--
ALTER TABLE `background_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `circle_images`
--
ALTER TABLE `circle_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactuses`
--
ALTER TABLE `contactuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enlisteds`
--
ALTER TABLE `enlisteds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_no_unique` (`phone_no`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `background_images`
--
ALTER TABLE `background_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `circle_images`
--
ALTER TABLE `circle_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contactuses`
--
ALTER TABLE `contactuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enlisteds`
--
ALTER TABLE `enlisteds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
