-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2024 at 06:54 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ducthanh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `phone`, `name`, `password`, `created_at`, `updated_at`) VALUES
(1, '0348996904', 'admin', '$2y$12$WR1IcS0pdbINsfzxYbch3.JfwaiKYarw1SbtVdtnFcUh1HWz8oDYa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` bigint UNSIGNED NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `index` int NOT NULL DEFAULT '0',
  `display` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `name_en`, `slug`, `src`, `index`, `created_at`, `updated_at`) VALUES
(1, 'Phấn', 'Chalk', 'phan', '/storage/banner/BsBGQFx8tFuef7dQs6vUt3ZVVkelrwx7Cws436TD.png', 1, '2024-07-24 19:49:31', '2024-07-24 19:49:31'),
(2, 'Bảng', 'Board', 'bang', '/storage/banner/FkyVnehHvrBZIGxKmTU5eZKT6cCYX9LMAmH1KFWd.jpg', 2, '2024-07-24 19:50:30', '2024-07-24 19:50:30'),
(3, 'Bút sáp màu', 'Crayon', 'but-sap-mau', '/storage/banner/6RsAY6aY3ZInp9rC1NBYfjg5hPwbL0VOa0E9dF2N.jpg', 3, '2024-07-24 19:50:49', '2024-07-24 19:50:49'),
(4, 'Sáp nặn', 'Modeling wax', 'sap-nan', '/storage/banner/VyuM49Li9ByiVBC4zXcMU9zJFLZxRtc299O3E89i.jpg', 4, '2024-07-24 19:51:22', '2024-07-24 19:51:22'),
(5, 'Mực và Bút máy', 'Ink and Fountain Pens', 'muc-va-but-may', '/storage/banner/xtuPLFYpr4hoBG5rfWb7s1oWteSvY8uiROxRvqbu.jpg', 5, '2024-07-24 19:51:48', '2024-07-24 19:51:48'),
(6, 'Sản phẩm khác', 'Other products', 'san-pham-khac', '/storage/banner/KzzwvpmWKYwBexACARLBgw90ZO18urw7mo3CAo6M.jpg', 6, '2024-07-24 19:52:28', '2024-07-24 19:52:28');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `describe` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `describe_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `name`, `name_en`, `src`, `describe`, `describe_en`, `link`, `display`, `created_at`, `updated_at`) VALUES
(1, 'Tập tô màu', 'Practice coloring', '/storage/product/bVGKW5fLv9NLafQH5rLEQxx4JCdaWvcVHVO3kOhG.webp', 'Bút sáp 12 màu có bao bì đa dạng, nhiều nhân vật ngộ nghĩnh, đáng yêu phù hợp với các bạn nhỏ đang đi học', '12-color wax pens have diverse packaging, many funny and adorable characters, suitable for school-going children', 'https://google.com', 1, '2024-07-26 19:55:58', '2024-07-26 19:55:58'),
(2, 'Tập tô màu 2', 'Practice coloring', '/storage/product/bVGKW5fLv9NLafQH5rLEQxx4JCdaWvcVHVO3kOhG.webp', 'Bút sáp 12 màu có bao bì đa dạng, nhiều nhân vật ngộ nghĩnh, đáng yêu phù hợp với các bạn nhỏ đang đi học', '12-color wax pens have diverse packaging, many funny and adorable characters, suitable for school-going children', 'https://google.com', 1, '2024-07-26 19:55:58', '2024-07-26 19:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `introduce`
--

CREATE TABLE `introduce` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `introduce`
--

INSERT INTO `introduce` (`id`, `name`, `name_en`, `content`, `content_en`, `src`, `index`, `created_at`, `updated_at`) VALUES
(1, '1996 Thành lập cơ sở sản xuất Đức Thanh', '1996 Established Duc Thanh production facility', '<p>Bắt đầu từ năm 1996, C&ocirc;ng ty TNHH Thiết bị gi&aacute;o dục Đức Thanh đ&atilde; ch&iacute;nh thức xuất&nbsp;hiện tr&ecirc;n thị trường th&ocirc;ng qua sự ra đời của Cơ sở sản xuất phấn Đức Thanh.<br />\r\nNg&agrave;y nay, thương hiệu Đức Thanh đ&atilde; khẳng định được chỗ đứng vững chắc tr&ecirc;n thị&nbsp;trường văn ph&ograve;ng phẩm v&agrave; đồ d&ugrave;ng học sinh Việt Nam v&agrave; xuất khẩu đến một số&nbsp;quốc gia tr&ecirc;n thế giới.</p>', '<p>Starting in 1996, Duc Thanh Educational Equipment Co., Ltd. officially appeared on the market through the birth of Duc Thanh Chalk Production Facility.<br />\r\nToday, the Duc Thanh brand has affirmed a solid foothold in the Vietnamese stationery and school supplies market and is exported to a number of countries around the world.</p>', '/storage/banner/NesM5rYCfda4UorWRg5RzSE2ru6mf3GNtM5dERf8.png', 1, '2024-07-26 19:50:11', '2024-07-26 19:50:11'),
(2, 'Thế giới văn phòng phẩm đa dạng và chất lượng', 'The world of diverse and quality stationery', '<p>Với những mục ti&ecirc;u v&agrave; kế hoạch kinh doanh vững bền, C&aacute;c sản phẩm của Đức Thanh đ&atilde; được Qu&yacute;&nbsp;Kh&aacute;ch h&agrave;ng, thầy c&ocirc; gi&aacute;o, học sinh, sinh vi&ecirc;n y&ecirc;u mến v&agrave; tin d&ugrave;ng. Những sản phẩm ti&ecirc;u biểu như&nbsp;Phấn N&eacute;t Hoa, B&uacute;t Phấn, Phấn m&agrave;u mỹ thuật, B&uacute;t s&aacute;p m&agrave;u, S&aacute;p nặn, c&aacute;c loại Bảng&hellip; đ&atilde; trở n&ecirc;n v&ocirc;&nbsp;c&ugrave;ng quen thuộc với người ti&ecirc;u d&ugrave;ng. Thời gian tới, C&ocirc;ng ty TNHH Thiết bị gi&aacute;o dục Đức Thanh sẽ&nbsp;tiếp tục đưa ra c&aacute;c sản phẩm mới, với thiết kế, chất lượng vượt trội v&agrave; gi&aacute; cả hợp l&yacute; để ph&ugrave; hợp với&nbsp;người ti&ecirc;u d&ugrave;ng tr&ecirc;n thị trường Việt Nam v&agrave; quốc tế.</p>', '<p>With sustainable business goals and plans, Duc Thanh\'s products have been loved and trusted by customers, teachers, students. Typical products such as Flower Chalk, Chalk Pens, Art Pastels, Crayons, Modeling Wax, Boards... have become extremely familiar with consumers. In the coming time, Duc Thanh Educational Equipment Co., Ltd. will continue to offer new products, with superior design, quality and reasonable prices to suit consumers in the Vietnamese and international markets. economic.</p>', '/storage/banner/vuqU7hy1m5zKInUL1UVsHYBzm4v9XfKTaVAWfvtL.png', 2, '2024-07-26 19:53:16', '2024-07-26 19:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE `meta` (
  `id` bigint UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_05_033924_create_admin_table', 1),
(6, '2024_07_19_134724_create_banner_table', 1),
(7, '2024_07_19_144716_create_policy_table', 1),
(8, '2024_07_19_153934_create_introduce_table', 1),
(9, '2024_07_20_022720_create_setting_table', 1),
(10, '2024_07_20_025508_create_contact_table', 1),
(11, '2024_07_20_031241_create_category_table', 1),
(12, '2024_07_20_081807_create_product_table', 1),
(13, '2024_07_20_092816_create_product_video_table', 1),
(14, '2024_07_20_151057_create_video_table', 1),
(15, '2024_07_20_152655_create_image_table', 1),
(16, '2024_07_26_025107_create_meta_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `index` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`id`, `name`, `name_en`, `content`, `content_en`, `index`, `created_at`, `updated_at`) VALUES
(1, 'Mục đích thu nhập thông tin', 'Purpose of information collection', '<p>Ch&iacute;nh s&aacute;ch bảo mật n&agrave;y giải th&iacute;ch c&aacute;ch ch&uacute;ng t&ocirc;i thu thập, sử dụng, chia sẻ dữ liệu c&aacute; nh&acirc;n của bạn khi bạn sử dụng c&aacute;c dịch vụ được cung cấp tr&ecirc;n c&aacute;c trang web v&agrave; ứng dụng của ch&uacute;ng t&ocirc;i hoặc tương t&aacute;c với ch&uacute;ng t&ocirc;i. Dữ liệu c&aacute; nh&acirc;n l&agrave; bất kỳ th&ocirc;ng tin n&agrave;o về bạn m&agrave; bạn c&oacute; thể được nhận dạng hoặc c&oacute; thể nhận dạng được. Điều n&agrave;y c&oacute; thể bao gồm c&aacute;c th&ocirc;ng tin như:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>T&ecirc;n, ng&agrave;y sinh, địa chỉ email, địa chỉ bưu điện, số điện thoại, số điện thoại di động, chi tiết t&agrave;i ch&iacute;nh, chẳng hạn như thẻ thanh to&aacute;n m&agrave; bạn sử dụng để mua sản phẩm&hellip;</p>\r\n	</li>\r\n	<li>\r\n	<p>Th&ocirc;ng tin về thiết bị của bạn (chẳng hạn như địa chỉ IP, l&agrave; m&atilde; số để x&aacute;c định thiết bị của bạn c&oacute; thể cung cấp th&ocirc;ng tin về quốc gia, khu vực hoặc th&agrave;nh phố nơi bạn ở)</p>\r\n	</li>\r\n</ul>', '<p>This privacy policy explains how we collect, use, share your personal data when you use the services provided on our websites and applications or interact with us. Personal data is any information about you by which you can be identified or identifiable. This may include information such as:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Name, date of birth, email address, postal address, telephone number, mobile number, financial details, such as the payment card you used to purchase the product…</p >\r\n	</li>\r\n	<li>\r\n	<p>Information about your device (such as your IP address, which is a code that identifies your device that can provide information about the country, region or city where you are located)</p >\r\n	</li>\r\n</ul>', 1, '2024-07-26 20:12:10', '2024-07-26 20:12:10'),
(2, 'Chúng tôi là ai và cách liên hệ với chúng tôi', 'Who we are and how to contact us', '<p>B&aacute;o Thanh Ni&ecirc;n, 268 - 270 Nguyễn Đ&igrave;nh Chiểu, Phường V&otilde; Thị S&aacute;u, Q.3, TP HCM l&agrave; đơn vị kiểm so&aacute;t dữ liệu li&ecirc;n quan đến dữ liệu c&aacute; nh&acirc;n của bạn. Điều n&agrave;y c&oacute; nghĩa l&agrave; ch&uacute;ng t&ocirc;i chịu tr&aacute;ch nhiệm quyết định c&aacute;ch thức v&agrave; l&yacute; do ch&uacute;ng t&ocirc;i giữ v&agrave; sử dụng dữ liệu c&aacute; nh&acirc;n của bạn. Nếu bạn muốn li&ecirc;n hệ trực tiếp với ch&uacute;ng t&ocirc;i, bạn c&oacute; thể t&igrave;m thấy chi tiết li&ecirc;n hệ của ch&uacute;ng t&ocirc;i tại đ&acirc;y: https://thanhnien.vn/toa-soan.html</p>', '<p>Thanh Nien Newspaper, 268 - 270 Nguyen Dinh Chieu, Vo Thi Sau Ward, District 3, Ho Chi Minh City is the data controller related to your personal data. This means we are responsible for deciding how and why we hold and use your personal data. If you would like to contact us directly, you can find our contact details here: https://thanhnien.vn/toa-soan.html</p>', 2, '2024-07-26 20:12:30', '2024-07-26 20:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `describe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `describe_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `name_en`, `slug`, `category_id`, `describe`, `describe_en`, `content`, `content_en`, `src`, `display`, `created_at`, `updated_at`) VALUES
(1, 'Phấn trắng', 'White chalk', 'phan-trang', '1', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/w1fgsJHrCvjQ3HZcbd3aQRIVC8S2QllFqe6uLURC.png', 1, '2024-07-24 19:56:47', '2024-07-25 00:44:27'),
(2, 'Phấn nét hoa', 'Floral powder', 'phan-net-hoa', '1', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-25 00:43:10'),
(3, 'Phấn màu mỹ thuật', 'White chalk', 'phan-mau-my-thuat', '1', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47'),
(4, 'Phấn trắng', 'White chalk', 'phan-trang', '1', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47'),
(5, 'Bảng gỗ', 'Wooden Board', 'bang-go', '1', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47'),
(6, 'Bảng gỗ', 'Wooden Board', 'bang-go', '2', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47'),
(7, 'Bảng bộ', 'Wooden Board', 'bang-bo', '2', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47'),
(8, 'Bảng nhóm học sinh', 'Wooden Board', 'bang-nhom-hoc-sinh', '2', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47'),
(9, 'Bút Sáp 12 Màu', '12 Color Crayons', 'but-sap-12-mau', '3', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47'),
(10, 'Bút Sáp 12 Màu', '12 Color Crayons', 'but-sap-12-mau', '3', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47'),
(11, 'Bút Sáp 12 Màu', '12 Color Crayons', 'but-sap-12-mau', '3', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47'),
(12, 'Bút Sáp 12 Màu', '12 Color Crayons', 'but-sap-12-mau', '3', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47'),
(13, 'Sáp nặn 5 màu', 'Modeling wax 5 colors', 'sap-nam-5-mau', '4', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47'),
(14, 'Sáp nặn 5 màu', 'Modeling wax 5 colors', 'sap-nam-5-mau', '4', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47'),
(15, 'Sáp nặn 5 màu', 'Modeling wax 5 colors', 'sap-nam-5-mau', '4', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47'),
(16, 'Sáp nặn 5 màu', 'Modeling wax 5 colors', 'sap-nam-5-mau', '4', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47'),
(17, 'Mực bút máy màu đen', 'Black fountain pen ink', 'muc-but-may-mau-den', '5', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47'),
(18, 'Mực bút máy màu đen', 'Black fountain pen ink', 'muc-but-may-mau-den', '5', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47'),
(19, 'Mực bút máy màu đen', 'Black fountain pen ink', 'muc-but-may-mau-den', '5', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47'),
(20, 'Mực bút máy màu đen', 'Black fountain pen ink', 'muc-but-may-mau-den', '5', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47'),
(21, 'Bút kẹp phấn', 'Chalk pen', 'but-kep-phan', '6', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47'),
(22, 'Bút kẹp phấn', 'Chalk pen', 'but-kep-phan', '6', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47'),
(23, 'Bút kẹp phấn', 'Chalk pen', 'but-kep-phan', '6', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47'),
(24, 'Bút kẹp phấn', 'Chalk pen', 'but-kep-phan', '6', 'Phấn trắng Đức Thanh (vỏ hộp màu xanh) là loại phấn viết phổ thông dành cho người tiêu dùng. . . .', 'Duc Thanh white chalk (blue box) is a popular type of writing chalk for consumers. . . .', '<p>M&atilde; sản phẩm: ĐT-BS12</p>', '<p>Product code: ĐT-BS12</p>', '/storage/banner/bzXTwNOtsCZWmSiMJgOltrA7djU6EVKQOORjT0uH.png', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `product_video`
--

CREATE TABLE `product_video` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `describe` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `describe_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_video`
--

INSERT INTO `product_video` (`id`, `product_id`, `src`, `link`, `channel_name`, `describe`, `describe_en`, `display`, `created_at`, `updated_at`) VALUES
(1, 1, '/storage/banner/w1fgsJHrCvjQ3HZcbd3aQRIVC8S2QllFqe6uLURC.png', 'https://www.tiktok.com/@moimixi12/video/7395254942426008840', '@ducthanh', 'Bộ bút sáp màu\"Cô bé quàng khăn đỏ\" mới ra mắt nhà Đức Thanh với màu sắc chủ đạo là tông màu đỏ, hoạ tiết bắt mắt, rất phù hợp dành cho các bạn học sinh sinh viên vẫn còn đang đi học', 'The newly launched \"Little Red Riding Hood\" crayon set from Duc Thanh with the main color being red tones, eye-catching patterns, very suitable for students who are still going to school.', 1, '2024-07-24 19:56:47', '2024-07-24 19:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zalo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `logo`, `address`, `phone`, `email`, `website`, `zalo`, `tiktok`, `facebook`, `youtube`, `map`, `created_at`, `updated_at`) VALUES
(1, '', 'KCN Hapro, Lệ Chi, Gia Lâm, Hà Nội', '024 3936 0099', 'phanvietducthanh@gmail.com', 'www.phanvietducthanh.com', '0348996903', 'https://www.tiktok.com', 'https://www.facebook.com', 'https://www.youtube.com', 'https://www.google.com/maps/place/tt.+C%C3%A2y+D%C6%B0%C6%A1ng,+Ph%E1%BB%A5ng+Hi%E1%BB%87p,+H%E1%BA%ADu+Giang,+Vi%E1%BB%87t+Nam/@9.7833698,105.7105777,14z/data=!3m1!4b1!4m6!3m5!1s0x31a0f68a0a8c781d:0xa88c255d7d2648f0!8m2!3d9.7807875!4d105.7292491!16s%2Fg%2F11fmqk53bz?hl=vi-VN&entry=ttu', '2024-07-26 21:12:57', '2024-07-26 21:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` bigint UNSIGNED NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `describe` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `describe_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `src`, `link`, `channel_name`, `describe`, `describe_en`, `display`, `created_at`, `updated_at`) VALUES
(1, '/storage/product/zC6qHqUDIIS8h8E3K4V0SJB1c9DoNMtRuCwnSEOB.webp', 'https://www.tiktok.com', 'Tập vẽ', 'Bộ bút sáp màu\"Cô bé quàng khăn đỏ\" mới ra mắt nhà Đức Thanh với màu sắc. . .', 'The \"Little Red Riding Hood\" crayon set has just launched at Duc Thanh with colors. . .', 1, '2024-07-26 19:58:23', '2024-07-26 19:58:23'),
(2, '/storage/product/zC6qHqUDIIS8h8E3K4V0SJB1c9DoNMtRuCwnSEOB.webp', 'https://www.tiktok.com', 'Tập vẽ', 'Bộ bút sáp màu\"Cô bé quàng khăn đỏ\" mới ra mắt nhà Đức Thanh với màu sắc. . .', 'The \"Little Red Riding Hood\" crayon set has just launched at Duc Thanh with colors. . .', 1, '2024-07-26 19:58:23', '2024-07-26 19:58:23'),
(3, '/storage/product/zC6qHqUDIIS8h8E3K4V0SJB1c9DoNMtRuCwnSEOB.webp', 'https://www.tiktok.com', 'Tập vẽ', 'Bộ bút sáp màu\"Cô bé quàng khăn đỏ\" mới ra mắt nhà Đức Thanh với màu sắc. . .', 'The \"Little Red Riding Hood\" crayon set has just launched at Duc Thanh with colors. . .', 1, '2024-07-26 19:58:23', '2024-07-26 19:58:23'),
(4, '/storage/product/zC6qHqUDIIS8h8E3K4V0SJB1c9DoNMtRuCwnSEOB.webp', 'https://www.tiktok.com', 'Tập vẽ', 'Bộ bút sáp màu\"Cô bé quàng khăn đỏ\" mới ra mắt nhà Đức Thanh với màu sắc. . .', 'The \"Little Red Riding Hood\" crayon set has just launched at Duc Thanh with colors. . .', 1, '2024-07-26 19:58:23', '2024-07-26 19:58:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `introduce`
--
ALTER TABLE `introduce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta`
--
ALTER TABLE `meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_video`
--
ALTER TABLE `product_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `introduce`
--
ALTER TABLE `introduce`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meta`
--
ALTER TABLE `meta`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_video`
--
ALTER TABLE `product_video`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
