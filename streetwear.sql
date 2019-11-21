-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 31, 2019 at 05:16 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `streetwear`
--

-- --------------------------------------------------------

--
-- Table structure for table `measurements`
--

CREATE TABLE `measurements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_product` int(11) NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waist` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inseam` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `knee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `measurements`
--

INSERT INTO `measurements` (`id`, `id_product`, `size`, `waist`, `tight`, `inseam`, `knee`, `leg`, `created_at`, `updated_at`) VALUES
(20, 1, 'XS', '24', '14', '60', '12', '15', '2019-05-27 09:17:36', '2019-05-27 09:17:36'),
(21, 1, 'S', '25', '15', '62', '11', '14', '2019-05-27 09:17:36', '2019-05-27 09:17:36'),
(22, 1, 'L', '26', '16', '64', '10', '13', '2019-05-27 09:17:36', '2019-05-27 09:17:36'),
(23, 1, 'XL', '27', '17', '66', '9', '12', '2019-05-27 09:17:36', '2019-05-27 09:17:36'),
(24, 2, 'L', NULL, NULL, NULL, NULL, NULL, '2019-05-29 10:48:12', '2019-05-29 10:48:12'),
(25, 2, 'XL', NULL, NULL, NULL, NULL, NULL, '2019-05-29 10:48:12', '2019-05-29 10:48:12'),
(26, 3, 'S', NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:05:32', '2019-05-31 02:05:32'),
(27, 3, 'M', NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:05:32', '2019-05-31 02:05:32'),
(28, 3, 'L', NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:05:32', '2019-05-31 02:05:32'),
(29, 4, 'M', NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:07:41', '2019-05-31 02:07:41'),
(30, 4, 'L', NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:07:41', '2019-05-31 02:07:41'),
(31, 5, 'M', NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:10:06', '2019-05-31 02:10:06'),
(32, 5, 'L', NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:10:06', '2019-05-31 02:10:06'),
(33, 6, 'M', NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:11:54', '2019-05-31 02:11:54'),
(34, 6, 'L', NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:11:54', '2019-05-31 02:11:54'),
(35, 7, 'S', NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:14:35', '2019-05-31 02:14:35'),
(36, 7, 'M', NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:14:35', '2019-05-31 02:14:35'),
(37, 7, 'L', NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:14:35', '2019-05-31 02:14:35'),
(38, 8, 'S', NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:16:54', '2019-05-31 02:16:54'),
(39, 8, 'M', NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:16:54', '2019-05-31 02:16:54'),
(40, 8, 'L', NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:16:54', '2019-05-31 02:16:54'),
(41, 9, 'S', NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:34:53', '2019-05-31 02:34:53'),
(42, 9, 'M', NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:34:53', '2019-05-31 02:34:53'),
(43, 9, 'L', NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:34:53', '2019-05-31 02:34:53'),
(44, 10, 'S', NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:46:05', '2019-05-31 02:46:05'),
(45, 10, 'M', NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:46:05', '2019-05-31 02:46:05'),
(46, 10, 'L', NULL, NULL, NULL, NULL, NULL, '2019-05-31 02:46:05', '2019-05-31 02:46:05');

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
(3, '2019_03_24_144331_create_products_table', 1),
(11, '2019_05_17_143003_create_orders_table', 2),
(13, '2019_05_26_150542_create_measurements_table', 3),
(14, '2019_05_29_173512_create_descriptionlists_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `name`, `provinsi`, `kabupaten`, `kecamatan`, `address`, `zip`, `phone`, `email`, `note`, `order`, `harga`, `bukti`, `resi`, `created_at`, `updated_at`) VALUES
(1, 78211, 'Racsi Beryl Wirawienta Hartono', 'Jawa Tengah', 'Magelang', 'Mertoyudan', 'Jl. Mrica IV No. 51 Perumahan Lembah Hijau', '511123', '0812345747', 'coba@test.com', 'packing yang rapi ya', 'Levi\'s T-Shirt-XL x 2,Wrangler Regular Fit-XL x 2,', '1,540,000', NULL, NULL, '2019-05-18 12:04:19', '2019-05-18 13:06:37'),
(2, 39761, 'Tegar Satrio Utomo', 'Bali', 'Denpasar', 'Kute', 'Perumahan Dosen Blok U ITS No. 49', '923194', '08981235487', 'tegar@gmail.com', 'bla bla bla', 'Levi\'s T-Shirt-XL x 2,Wrangler Regular Fit-XL x 2,', '1,556,000', NULL, NULL, '2019-05-18 12:06:14', '2019-05-18 12:48:27'),
(3, 52139, 'Andrea Janar', 'Jawa Tengah', 'Salatiga', 'Ngagel', 'Jl. Manggis No. 17 Bulurejo', '283710', '0891839283', 'janar@test.com', 'cepat kirim lur', 'Levi\'s T-Shirt-XL x 1,Wrangler Regular Fit-XL x 5,', '2,416,000', NULL, NULL, '2019-05-25 09:05:26', '2019-05-25 09:05:26'),
(8, 93139, 'Faris', 'Bali', 'Denpasar', 'Menanggal', 'Jl. Jeruk No. 46', '232413', '0812313123', 'faris@gmail.com', 'sadfjl', 'Wrangler Regular Fit-XL x 3,Levi\'s T-Shirt-L x 2,', '1,984,000', NULL, NULL, '2019-05-25 11:24:19', '2019-05-25 11:24:19'),
(9, 17285, 'Pandu', 'Sumatera Utara', 'Samosir', 'Mulyasari', 'Jl. Pisang No. 23 Desa Sukamaju', '293910', '081231231311', 'pandu@coba.com', 'lksjdflkjalsdfj', 'Wrangler Regular Fit-S x 2,', '845,000', NULL, NULL, '2019-05-29 11:23:38', '2019-05-29 11:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(13,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `xs` int(11) NOT NULL,
  `s` int(11) NOT NULL,
  `m` int(11) NOT NULL,
  `l` int(11) NOT NULL,
  `xl` int(11) NOT NULL,
  `none` int(11) NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `category`, `price`, `description`, `xs`, `s`, `m`, `l`, `xl`, `none`, `color`, `stock`, `gender`, `image`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Wrangler Regular Fit', 'Wrangler', 'bottom', '400000.00', 'Nice Jeans!', 1, 1, 0, 1, 1, 0, 'Grey', 5, 'men', 'images/originals/98461556623648.jpg,images/originals/58711556623649.jpg,images/originals/22251556623649.jpg', 'images/thumbnails/22251556623649.jpg', '2019-04-30 04:27:31', '2019-05-27 09:14:58'),
(2, 'Levi\'s T-Shirt', 'Levi\'s', 'top', '350000.00', 'Nice T-Shirt!\r\nbalkdsflkjds\r\nlksadflkjsdlfjl\r\nsadlkfjlaskdjflkj\r\nlaskdjflsajdlfjalsdkjf', 0, 0, 0, 1, 1, 0, 'White', 3, 'men', 'images/originals/34541556623829.jpg,images/originals/55791556623829.jpg', 'images/thumbnails/55791556623829.jpg', '2019-04-30 04:30:30', '2019-05-29 10:48:12'),
(3, 'Venice Slim Fit Chinos', 'Edwin Jeans', 'bottom', '237600.00', 'celana', 0, 1, 1, 1, 0, 0, 'Grey', 10, 'men', 'images/originals/19431559293533.jpg,images/originals/25391559293534.jpg', 'images/thumbnails/25391559293534.jpg', '2019-05-31 02:05:35', '2019-05-31 02:05:35'),
(4, 'Slim Fit Long Denim Pants', 'Denim Addict', 'bottom', '199000.00', 'celana', 0, 0, 1, 1, 0, 0, 'Black', 10, 'men', 'images/originals/82141559293661.jpg,images/originals/99641559293661.jpg', 'images/thumbnails/99641559293661.jpg', '2019-05-31 02:07:42', '2019-05-31 02:07:42'),
(5, 'Jasper Lace Up', 'Hush Puppies', 'bottom', '299500.00', 'sepatu', 0, 0, 1, 1, 0, 0, 'Grey', 10, 'Unisex', 'images/originals/67441559293806.jpg,images/originals/12511559293806.jpg', 'images/thumbnails/12511559293806.jpg', '2019-05-31 02:10:07', '2019-05-31 02:10:07'),
(6, 'New Port Bay', 'Timberland', 'bottom', '754500.00', 'sepatu', 0, 0, 1, 1, 0, 0, 'Black', 10, 'Unisex', 'images/originals/91791559293915.jpg,images/originals/68801559293915.jpg', 'images/thumbnails/68801559293915.jpg', '2019-05-31 02:11:56', '2019-05-31 02:11:56'),
(7, 'Striped Polo', 'Cressida', 'top', '181000.00', 'baju', 0, 1, 1, 1, 0, 0, 'Blue', 10, 'men', 'images/originals/70981559294075.jpg,images/originals/87731559294076.jpg', 'images/thumbnails/87731559294076.jpg', '2019-05-31 02:14:37', '2019-05-31 02:14:37'),
(8, 'High Neck Polo Shirts', 'Cressida', 'top', '149900.00', 'baju', 0, 1, 1, 1, 0, 0, 'Grey', 10, 'men', 'images/originals/16031559294214.jpg,images/originals/90711559294215.jpg', 'images/thumbnails/90711559294215.jpg', '2019-05-31 02:16:56', '2019-05-31 02:16:56'),
(9, 'Standard Issue Polo Shirt', 'Billabong', 'top', '449000.00', 'baju', 0, 1, 1, 1, 0, 0, 'Black', 10, 'men', 'images/originals/98661559295294.jpg,images/originals/56041559295294.jpg', 'images/thumbnails/56041559295294.jpg', '2019-05-31 02:34:55', '2019-05-31 02:34:55'),
(10, 'Everyday Sun Cruise Polo Shirt', 'Quicksilver', 'top', '399900.00', 'baju', 0, 1, 1, 1, 0, 0, 'Grey', 10, 'men', 'images/originals/24041559295965.jpg,images/originals/58251559295966.jpg', 'images/thumbnails/58251559295966.jpg', '2019-05-31 02:46:07', '2019-05-31 02:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@test.com', NULL, '$2y$10$5PYriv.SxTBqgQjTnNnBOOkayoBJZ7sgpy4bCrh4GipNzx7T9C/yi', NULL, '2019-04-30 04:08:42', '2019-04-30 04:08:42'),
(2, 'test2', 'test2@test.com', NULL, '$2y$10$9./NmaE1CGK4E9wE74.5levd8zf.hGoylwYg7NYt2Ry93YgUpdZme', NULL, '2019-04-30 04:20:06', '2019-04-30 04:20:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `measurements`
--
ALTER TABLE `measurements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `measurements`
--
ALTER TABLE `measurements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
