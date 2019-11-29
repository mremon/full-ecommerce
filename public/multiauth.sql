-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 06:30 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multiauth`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Admin', '01961363543', 'mremon.raj@gmail.com', NULL, '$2y$10$z5W9H8.Q9NLyXvz3aBKkYOWM7PxetWU4wIOJn7Bkxl9KCG2CfBeyC', NULL, NULL, '2019-11-08 06:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_slug`, `brand_logo`, `created_at`, `updated_at`) VALUES
(1, 'Decent Footwear', 'decent-footwear', 'public/media/brand/091119_11_17_35.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(2, 'Women Fashion', 'women-fashion', '2019-11-09 00:17:23', '2019-11-09 00:17:23'),
(4, 'Children Fashion', 'children-fashion', '2019-11-12 07:09:37', '2019-11-12 07:09:37'),
(6, 'Men Fashion', 'men-fashion', '2019-11-09 13:04:31', '2019-11-09 13:04:31'),
(10, 'Accessories', 'accessories', '2019-11-13 07:08:42', '2019-11-13 07:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'DFWO1', '5.5', NULL, NULL),
(2, 'DFW02', '10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `front_setting`
--

CREATE TABLE `front_setting` (
  `id` int(11) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `address` text NOT NULL,
  `about` text NOT NULL,
  `site_logo` varchar(191) DEFAULT NULL,
  `facebook` varchar(191) DEFAULT NULL,
  `twitter` varchar(191) DEFAULT NULL,
  `youtube` varchar(191) DEFAULT NULL,
  `google` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `front_setting`
--

INSERT INTO `front_setting` (`id`, `phone`, `email`, `address`, `about`, `site_logo`, `facebook`, `twitter`, `youtube`, `google`) VALUES
(1, '01303459442', 'decentfootwearltd@hotmail.com', 'Factory- 143/1; Hazaribag, dhaka-1209 Dhaka bangladesh', 'decent footwear limited We are manufacturer, exporter, wholesaler and retailer of all types of footwear. hundred percent customer satisfaction is our destination.', 'public/media/logo/1650919265008721.png', 'https://www.facebook.com/Decentfootwearltd/', 'https://www.facebook.com/Decentfootwearltd/', 'https://www.facebook.com/Decentfootwearltd/', 'https://www.facebook.com/Decentfootwearltd/');

-- --------------------------------------------------------

--
-- Table structure for table `front_top_banner_title`
--

CREATE TABLE `front_top_banner_title` (
  `id` int(11) NOT NULL,
  `front_page_offer_title` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `front_top_banner_title`
--

INSERT INTO `front_top_banner_title` (`id`, `front_page_offer_title`) VALUES
(1, 'ধামাকা অফার কোয়ালিটি পণ্যের সমাহার');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_05_052517_create_admins_table', 1),
(5, '2019_11_08_130043_create_categories_table', 2),
(6, '2019_11_08_130134_create_subcategories_table', 2),
(7, '2019_11_08_130202_create_brands_table', 2),
(8, '2019_11_10_053701_create_coupons_table', 3),
(9, '2019_11_10_100033_create_newslaters_table', 4),
(10, '2019_11_10_140404_create_products_table', 5),
(11, '2019_11_12_103054_create_post_categories_table', 6),
(12, '2019_11_12_103128_create_posts_table', 6),
(13, '2019_11_15_191721_create_wishlists_table', 7),
(14, '2019_11_23_201017_create_settings_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `newslaters`
--

CREATE TABLE `newslaters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newslaters`
--

INSERT INTO `newslaters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(2, 'mremon.raj@gmail.com', '2019-11-10 10:43:02', NULL),
(3, 'emonmondal720@gmail.com', '2019-11-10 11:25:03', NULL),
(4, 'tinku@gmail.com', '2018-11-10 11:43:10', NULL),
(6, 'sishihabr@gmail.com', '2019-11-10 20:32:01', NULL),
(7, 'rksumon@gmail.com', '2019-11-12 13:07:56', NULL),
(8, 'emon@gmail.com', '2019-11-14 10:51:59', NULL),
(10, 'shakilahamed@gmail.com', '2019-11-18 12:06:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offer_banner`
--

CREATE TABLE `offer_banner` (
  `id` int(11) NOT NULL,
  `offer_banner_image_one` varchar(191) NOT NULL,
  `offer_banner_image_two` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offer_banner`
--

INSERT INTO `offer_banner` (`id`, `offer_banner_image_one`, `offer_banner_image_two`) VALUES
(1, 'public/media/banner/1650903456843014.png', 'public/media/banner/1650903457076006.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `offer_time`
--

CREATE TABLE `offer_time` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `h` varchar(50) NOT NULL,
  `m` varchar(50) NOT NULL,
  `s` varchar(50) NOT NULL,
  `hot_offer_title` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offer_time`
--

INSERT INTO `offer_time` (`id`, `date`, `h`, `m`, `s`, `hot_offer_title`) VALUES
(0, '2019-11-28', '22', '59', '59', 'Special Offer for this Item Hurry Up');

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
('mremon.raj@gmail.com', '$2y$10$ROFJJAcOaBUXbqA43qteVeOheNZdGkSeJ/Z/4xbbWokvt/vS8i35O', '2019-11-15 08:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title_en_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_title_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title_bn_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_details_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_details_bn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_category_id`, `post_title_en`, `post_title_en_slug`, `post_title_bn`, `post_title_bn_slug`, `post_image`, `post_details_en`, `post_details_bn`, `created_at`, `updated_at`) VALUES
(1, 2, 'Hello how are you?', 'hello-how-are-you?', 'হ্যালো, আপনি কেমন আছেন?', 'হ্যালো,-আপনি-কেমন-আছেন?', 'public/media/post/1650012288487968.jpg', '<p>                    \r\n                   <strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p>', '<p>                    \r\n                   Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং শিল্পের ডামি পাঠ্য। লোরেম ইপসাম 1500 এর দশক থেকে শিল্পের স্ট্যান্ডার্ড ডামি পাঠ্যরূপে রয়েছেন, যখন কোনও অজানা প্রিন্টার একটি প্রকারের গ্যালি নেন এবং কোনও ধরণের নমুনার বই তৈরি করতে স্ক্র্যাম্বল করে। এটি কেবল পাঁচটি শতাব্দীই বেঁচে নেই, বৈদ্যুতিন টাইপসেটেটিংয়ে ঝাঁপিয়ে পড়েছে, মূলত অপরিবর্তিত রয়েছে। ১৯60০ এর দশকে এটি লোরেম ইপসাম প্যাসেজ সমেত লেট্রেসেট শিট প্রকাশের মাধ্যমে এবং সম্প্রতি সম্প্রতি এলডাস পেজমেকারের মতো ডেস্কটপ প্রকাশনা সফটওয়্যার সহ লোরেম ইপসামের সংস্করণ সহ জনপ্রিয় হয়েছিল।</p>', NULL, NULL),
(2, 1, 'Hi are you happy..?', 'hi-are-you-happy..?', 'হাই তুমি কি খুশি ..?', 'হাই-তুমি-কি-খুশি-..?', 'public/media/post/1650019962930254.jpg', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.', 'Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং শিল্পের ডামি পাঠ্য। লোরেম ইপসাম 1500 এর দশক থেকে শিল্পের স্ট্যান্ডার্ড ডামি পাঠ্যরূপে রয়েছেন, যখন কোনও অজানা প্রিন্টার একটি প্রকারের গ্যালি নেন এবং কোনও ধরণের নমুনার বই তৈরি করতে স্ক্র্যাম্বল করে। এটি কেবল পাঁচটি শতাব্দীই বেঁচে নেই, বৈদ্যুতিন টাইপসেটেটিংয়ে ঝাঁপিয়ে পড়েছে, মূলত অপরিবর্তিত রয়েছে। ১৯60০ এর দশকে এটি লোরেম ইপসাম প্যাসেজ সমেত লেট্রেসেট শিট প্রকাশের মাধ্যমে এবং সম্প্রতি সম্প্রতি এলডাস পেজমেকারের মতো ডেস্কটপ প্রকাশনা সফটওয়্যার সহ লোরেম ইপসামের সংস্করণ সহ জনপ্রিয় হয়েছিল।', '2019-11-12 18:01:01', NULL),
(5, 3, 'Are you mad..?', 'are-you-mad..?', 'তুমি কি পাগল..?', 'তুমি-কি-পাগল..?', 'public/media/post/1650025425992788.jpg', 'Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং শিল্পের ডামি পাঠ্য। লোরেম ইপসাম 1500 এর দশক থেকে শিল্পের স্ট্যান্ডার্ড ডামি পাঠ্যরূপে রয়েছেন, যখন কোনও অজানা প্রিন্টার একটি প্রকারের গ্যালি নেন এবং কোনও ধরণের নমুনার বই তৈরি করতে স্ক্র্যাম্বল করে। এটি কেবল পাঁচটি শতাব্দীই বেঁচে নেই, বৈদ্যুতিন টাইপসেটেটিংয়ে ঝাঁপিয়ে পড়েছে, মূলত অপরিবর্তিত রয়েছে। ১৯60০ এর দশকে এটি লোরেম ইপসাম প্যাসেজ সমেত লেট্রেসেট শিট প্রকাশের মাধ্যমে এবং সম্প্রতি সম্প্রতি এলডাস পেজমেকারের মতো ডেস্কটপ প্রকাশনা সফটওয়্যার সহ লোরেম ইপসামের সংস্করণ সহ জনপ্রিয় হয়েছিল।<br>', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.', '2019-11-12 19:26:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_en_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_bn_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `category_name_en`, `category_name_en_slug`, `category_name_bn`, `category_name_bn_slug`, `created_at`, `updated_at`) VALUES
(1, 'Women Fashion', 'women-fashion', 'উইমেন ফ্যাশান', 'উইমেন-ফ্যাশান', NULL, NULL),
(2, 'Men Fashion', 'men-fashion', 'ম্যান ফ্যাশান', 'ম্যান-ফ্যাশান', NULL, NULL),
(3, 'Children Fashion', 'children-fashion', 'চাইল্ড ফ্যাশান', 'চাইল্ড-ফ্যাশান', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_short_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_discount_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_video_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_slider` int(11) DEFAULT NULL,
  `hot_deal` int(11) DEFAULT NULL,
  `best_rated` int(11) DEFAULT NULL,
  `mid_slider_one` int(11) DEFAULT NULL,
  `mid_slider_two` int(11) DEFAULT NULL,
  `mid_slider_three` int(11) DEFAULT NULL,
  `mid_slider_four` int(11) DEFAULT NULL,
  `hot_deal_new` int(11) DEFAULT NULL,
  `buyone_getone` int(11) DEFAULT NULL,
  `trend` int(11) DEFAULT NULL,
  `product_image_one` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image_two` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image_three` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `brand_id`, `product_name`, `product_slug`, `product_code`, `product_quantity`, `product_details`, `product_short_details`, `product_color`, `product_size`, `product_selling_price`, `product_discount_price`, `product_video_link`, `main_slider`, `hot_deal`, `best_rated`, `mid_slider_one`, `mid_slider_two`, `mid_slider_three`, `mid_slider_four`, `hot_deal_new`, `buyone_getone`, `trend`, `product_image_one`, `product_image_two`, `product_image_three`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 10, 1, 'DF Loofer011', 'df-loofer011', 'DF01', '50', '<p>                    \r\n                   <strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book.</p><p><strong>Lorem Ipsum</strong> is simply dummy text of the</p><p> printing and \r\ntypesetting industry. Lorem Ipsum</p><p> has been the industry\'s standard dummy\r\n text e</p><p>ver since the 1500s, when an unknown printer</p><p> took a galley of \r\ntype and scrambled it to make</p><p> a type specimen book.<br></p>', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the</p><p> printing and \r\ntypesetting industry. Lorem Ipsum</p><p> has been the industry\'s standard dummy\r\n text e</p><p><br></p>', 'red,gray,blue', 'multi,larg,medium', '1800', '1500', 'https://youtu.be/fBaZ8TTs2XY', 1, 1, 1, NULL, NULL, NULL, NULL, 1, 1, 1, 'public/media/product/1650113050475907.png', 'public/media/product/1650001243164987.jpg', 'public/media/product/1649986666453582.jpg', 1, NULL, NULL),
(2, 6, 10, 1, 'DF Loofer2', 'df-loofer2', 'DF02', '50', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. </p><p>Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book.                    \r\n                   </p>', '<p>                    \r\n                   <strong>Lorem Ipsum</strong> is simply</p><p>dummy text of the printing</p><p>and \r\ntypesetting industry. </p>', 'red,blue', 'sm,md,lg', '2000', '1800', 'https://youtu.be/fBaZ8TTs2XY', NULL, 1, 1, NULL, NULL, NULL, NULL, 1, 1, 1, 'public/media/product/1650112725180326.png', 'public/media/product/1649900769826370.jpg', 'public/media/product/1649900769882498.jpg', 1, '2019-11-11 10:26:28', NULL),
(3, 6, 8, 1, 'DF Casual', 'df-casual', 'DFC01', '20', '<p>                    \r\n                   <strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. L</p><p>orem Ipsum has been the industry\'s </p><p>standard dummy\r\n text ever since the 1500s, when an unknown printer </p><p>took a galley of \r\ntype and scrambled it to make a type specimen book.</p>', '', 'red,gray', 'sm,md,lg', '2000', NULL, 'https://youtu.be/fBaZ8TTs2XY', NULL, 1, 1, NULL, NULL, NULL, NULL, 1, NULL, 1, 'public/media/product/1650605641793325.jpg', 'public/media/product/1649900889260175.jpg', 'public/media/product/1649900889291498.jpg', 1, '2019-11-11 10:28:22', NULL),
(4, 6, 10, 1, 'DF Loofer', 'df-loofer', 'DF03', '15', '<p>                    \r\n                   <strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. </p><p>Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 15</p><p>00s, when an unknown printer took a galley of \r\ntype and scrambled it to make</p><p> a type specimen book.</p>', '', 'gray,ass', 'sm,md,lg', '1200', NULL, 'https://youtu.be/fBaZ8TTs2XY', NULL, 1, 1, NULL, NULL, NULL, NULL, 1, 1, 1, 'public/media/product/1650605673987722.jpg', 'public/media/product/1649901069318717.jpg', 'public/media/product/1649901069355277.jpg', 1, '2019-11-11 10:31:14', NULL),
(5, 4, 7, 1, 'DF Kidz 01', 'df-kidz-01', 'DFK01', '50', '<p> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book.<strong>Lorem Ipsum</strong>                    \r\n                   </p>', '', 'multi color', 'sm,md,lg', '1000', NULL, 'https://youtu.be/fBaZ8TTs2XY', NULL, 1, 1, 1, NULL, NULL, NULL, 1, NULL, 1, 'public/media/product/1650247416925687.png', 'public/media/product/1649901248068478.jpg', 'public/media/product/1649901248187929.jpg', 1, '2019-11-11 10:34:05', NULL),
(6, 4, 7, 1, 'DF Kidz 02', 'df-kidz-02', 'DFK02', '44', '<p>                    \r\n                   <strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book.</p>', '', 'multi', 'multi', '1200', NULL, 'https://youtu.be/fBaZ8TTs2XY', NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'public/media/product/1650605727071516.jpg', 'public/media/product/1649901346393062.jpg', 'public/media/product/1649901346414981.jpg', 1, '2019-11-11 10:35:38', NULL),
(7, 4, 7, 1, 'DF Kidz 03', 'df-kidz-03', 'DFK03', '50', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book.', '', 'multi', 'multi', '1200', '1100', 'https://youtu.be/fBaZ8TTs2XY', NULL, 1, 1, NULL, NULL, NULL, NULL, 1, 1, 1, 'public/media/product/1650605754246582.jpg', 'public/media/product/1649901422516730.jpg', 'public/media/product/1649901422553143.jpg', 1, '2019-11-11 10:36:51', NULL),
(8, 2, 5, 1, 'DFL Casual', 'dfl-casual', 'DFL01', '20', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book.', '<p>                    \r\n                   <strong>Lorem Ipsum</strong> is simply dummy</p><p> text of the printing and \r\ntypesetting industry.</p>', 'multi', 'multi', '2000', NULL, 'https://youtu.be/fBaZ8TTs2XY', NULL, 1, 1, NULL, NULL, NULL, NULL, 1, NULL, 1, 'public/media/product/1650605851256993.jpg', 'public/media/product/1649901533150226.jpg', 'public/media/product/1649901533218461.png', 1, '2019-11-11 10:38:37', NULL),
(9, 2, 5, 1, 'DFL Casual2', 'dfl-casual2', 'DFL02', '20', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book.', '', 'multi', 'multi', '1500', NULL, 'https://youtu.be/fBaZ8TTs2XY', NULL, 1, 1, NULL, NULL, NULL, NULL, 1, NULL, 1, 'public/media/product/1650605830030208.jpg', 'public/media/product/1649901622066848.png', 'public/media/product/1649901622144347.jpg', 1, '2019-11-11 10:40:01', NULL),
(10, 2, 6, 1, 'DFL party01', 'dfl-party01', 'DFLP01', '24', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book.', '', 'multi', 'multi', '2200', NULL, 'https://youtu.be/fBaZ8TTs2XY', NULL, 1, 1, 1, NULL, NULL, NULL, 1, NULL, 1, 'public/media/product/1650247437658695.png', 'public/media/product/1649901706252359.jpg', 'public/media/product/1649901706296148.jpg', 1, '2019-11-11 10:41:22', NULL),
(11, 6, 9, 1, 'DFF Formal', 'dff-formal', 'DFF01', '100', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book.', '', 'multi', 'multi', '3000', NULL, 'https://youtu.be/fBaZ8TTs2XY', NULL, 1, 1, NULL, NULL, NULL, NULL, 1, 1, 1, 'public/media/product/1650605527995770.jpg', 'public/media/product/1649901801995389.jpg', 'public/media/product/1649901802125193.jpg', 1, '2019-11-11 10:42:53', NULL),
(12, 6, 9, 1, 'DFF Formal03', 'dff-formal03', 'DFF03', '20', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book.', '', 'multi', 'multi', '3500', '2800', 'https://youtu.be/fBaZ8TTs2XY', NULL, 1, 1, 1, NULL, NULL, NULL, 1, NULL, 1, 'public/media/product/1650247398225853.png', 'public/media/product/1649901886377754.jpg', 'public/media/product/1649901886421189.jpg', 1, '2019-11-11 10:44:13', NULL),
(13, 6, 8, 1, 'DFC Casual01', 'dfc-casual01', 'DFC001', '20', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book.', '', 'multi', 'multi', '1200', NULL, 'https://youtu.be/fBaZ8TTs2XY', NULL, 1, 1, NULL, NULL, NULL, NULL, 1, NULL, 1, 'public/media/product/1650211341921254.jpg', 'public/media/product/1649901976414287.jpg', 'public/media/product/1649901976474164.jpg', 1, '2019-11-11 10:45:39', NULL),
(14, 6, 8, 1, 'DFC Casual02', 'dfc-casual02', 'DFC002', '20', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book.', '<p>                    \r\n                   <strong>Lorem Ipsum</strong> is simply dummy</p><p> text of the printing and \r\ntypesetting industry. </p>', 'multi', 'multi', '1300', NULL, 'https://youtu.be/fBaZ8TTs2XY', NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 'public/media/product/1650737690684293.jpg', 'public/media/product/1650737690751219.jpg', 'public/media/product/1649902048905826.jpg', 1, '2019-11-11 10:46:48', NULL),
(18, 4, 7, 1, 'test product 01', 'test-product-01', '0011101', '40', 'ok this is description<br>', '', 'multi', 'multi', '400', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'public/media/product/1650562586136741.png', 'public/media/product/1650562587190019.jpg', 'public/media/product/1650562587570527.jpg', 1, '2019-11-18 17:45:47', NULL),
(19, 4, 12, 1, 'MR Special', 'mr-special', 'DFMR01', '20', '<p>                    \r\n                   <strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book.</p>', '<p>                    \r\n                   <strong>Lorem Ipsum</strong> </p><p>is simply dummy text of the</p><p> printing and \r\ntypesetting.</p>', 'multi', 'multi', '1000', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'public/media/product/1650610191342872.jpg', 'public/media/product/1650610191413032.jpg', 'public/media/product/1650610191534959.jpg', 1, '2019-11-19 06:22:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `vat`, `shipping_charge`, `shopname`, `email`, `phone`, `address`, `logo`, `created_at`, `updated_at`) VALUES
(1, '7', '50', 'Decent Footwear', 'decentfootwearltd@hotmail.com', '01303459442', 'Hazaribag, Dhaka-1209', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `subcategory_slug`, `created_at`, `updated_at`) VALUES
(5, 2, 'Casual Shoes', 'casual-shoes', NULL, NULL),
(6, 2, 'Sports Shoes', 'sports-shoes', NULL, NULL),
(7, 4, 'Boys', 'boys', NULL, NULL),
(8, 6, 'Casual Shoes', 'casual-shoes', NULL, NULL),
(9, 6, 'Formal Shoes', 'formal-shoes', NULL, NULL),
(10, 6, 'Loafer', 'loafer', NULL, NULL),
(12, 4, 'Girls', 'girls', NULL, NULL),
(13, 6, 'Sports Shoes', 'sports-shoes', NULL, NULL),
(14, 6, 'Sandals', 'sandals', NULL, NULL),
(15, 2, 'Ladies Sandals', 'ladies-sandals', NULL, NULL),
(16, 2, 'Ladies Heel', 'ladies-heel', NULL, NULL),
(17, 10, 'Belt', 'belt', NULL, NULL),
(18, 10, 'Ladies bag', 'ladies-bag', NULL, NULL),
(19, 10, 'Wallet', 'wallet', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `provider`, `provider_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sohidul Islam', NULL, 'sohidulislam@gmail.com', '', '', NULL, '$2y$10$AXmPJQ.tg/8z5VJr6Z9Ar.XJzte2Ytw058vRAes3CxI7CXwAr/CT6', NULL, '2019-10-04 23:27:57', '2019-10-04 23:27:57'),
(2, 'Jahidul Islam', NULL, 'jahidulislam@gmail.com', '', '', NULL, '$2y$10$t58WdGEyeKN5e/80mbWoRev4WSW8ANTJugJW.NfosJx31W0qxbjEq', NULL, '2019-10-05 04:47:42', '2019-10-05 04:47:42'),
(6, 'MD. MAMUN OR RASHID', NULL, 'mremon.raj@gmail.com', 'google', '100613631048050556616', NULL, NULL, NULL, '2019-11-17 09:04:47', '2019-11-17 09:04:47'),
(7, 'emon mondal', NULL, 'emonmondal720@gmail.com', 'google', '112633548906612379630', NULL, NULL, NULL, '2019-11-17 12:33:09', '2019-11-17 12:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 4, 14, NULL, NULL),
(7, 4, 12, NULL, NULL),
(8, 4, 11, NULL, NULL),
(9, 4, 8, NULL, NULL),
(10, 4, 5, NULL, NULL),
(11, 4, 13, NULL, NULL),
(12, 4, 9, NULL, NULL),
(13, 4, 1, NULL, NULL),
(14, 6, 14, NULL, NULL),
(15, 6, 10, NULL, NULL),
(16, 6, 11, NULL, NULL),
(17, 6, 8, NULL, NULL),
(18, 6, 9, NULL, NULL),
(19, 6, 13, NULL, NULL),
(20, 6, 18, NULL, NULL),
(21, 6, 7, NULL, NULL),
(22, 6, 19, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

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
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_setting`
--
ALTER TABLE `front_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_top_banner_title`
--
ALTER TABLE `front_top_banner_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newslaters`
--
ALTER TABLE `newslaters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_banner`
--
ALTER TABLE `offer_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_time`
--
ALTER TABLE `offer_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_setting`
--
ALTER TABLE `front_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `front_top_banner_title`
--
ALTER TABLE `front_top_banner_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `newslaters`
--
ALTER TABLE `newslaters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `offer_banner`
--
ALTER TABLE `offer_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
