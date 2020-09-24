-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2020 at 06:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_w_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `adm_name` varchar(100) NOT NULL,
  `adm_email` varchar(100) NOT NULL,
  `adm_password` varchar(150) NOT NULL,
  `adm_phone` char(15) NOT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `role` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adm_name`, `adm_email`, `adm_password`, `adm_phone`, `img_url`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', '257292c94f118c69575a635f47131cb39cf9b78981a254425923151e24e0313394f7cb31e6f875604c605955efb9a1a3cab919a8625bfb8950c18cac23ae35a8', '087776666677', 'admin.png', 'Super Admin', '2020-08-05 23:10:25', '2020-08-08 23:10:25'),
(21, 'Ilham', 'ilham@gmail.com', '257292c94f118c69575a635f47131cb39cf9b78981a254425923151e24e0313394f7cb31e6f875604c605955efb9a1a3cab919a8625bfb8950c18cac23ae35a8', '087711233312', 'https://res.cloudinary.com/bookingjasa/image/upload/v1599293855/Service%20Image/fvwcnumxgszgfmyni6tg.jpg', 'Admin Pesanan', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `id` int(10) NOT NULL,
  `admin_id` int(10) NOT NULL,
  `role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`id`, `admin_id`, `role`) VALUES
(15, 11, 2),
(16, 11, 3),
(24, 1, 1),
(25, 1, 2),
(26, 1, 3),
(27, 1, 4),
(32, 19, 3),
(33, 19, 4),
(36, 21, 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_number` char(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone_number`, `address`, `type`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Ilham Kusuma Aji', '081211111111', 'Sentul, Kab. Bogor, Jawabarat', 'Individu', 'Super Admin', '2020-09-24 07:50:10', NULL, '2020-09-24 15:19:44'),
(2, 'Yusuf Alfianto', '081233123312', 'Jl.Santai, Bandung, Jawabarat', 'Perusahaan', 'Super Admin', '2020-09-24 08:08:17', 'Super Admin', '2020-09-24 15:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `food_menu`
--

CREATE TABLE `food_menu` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `menu_type` varchar(50) NOT NULL,
  `unit` varchar(25) NOT NULL,
  `price` int(7) NOT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_menu`
--

INSERT INTO `food_menu` (`id`, `name`, `menu_type`, `unit`, `price`, `img_url`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(4, 'Sayur asem', 'Sayur dan Sup', 'Porsi', 5000, 'menu_makanan.png', 'Owner AW Catering', '2020-09-16 14:15:54', NULL, '2020-09-16 14:15:54'),
(10, 'Terong balado', 'Lauk Pauk', 'Posrsi', 5000, 'menu_makanan.png', 'Owner AW Catering', '2020-09-17 03:49:26', NULL, '2020-09-17 03:49:26'),
(13, 'Ayam suir', 'Lauk Pauk', 'Porsi', 15000, 'menu_makanan.png', 'Owner AW Catering', '2020-09-17 04:13:00', NULL, '2020-09-17 04:13:00'),
(17, 'Capcay', 'Sayur dan Sup', 'porsi', 6000, 'menu_makanan.png', 'Owner AW Catering', '2020-09-17 04:32:14', 'Owner AW Catering', '2020-09-17 08:39:46'),
(18, 'Sayur Sop', 'Sayur dan Sup', 'porsi', 10000, 'menu_makanan.png', 'Owner AW Catering', '2020-09-21 11:29:43', NULL, '2020-09-21 11:29:43'),
(19, 'Perkedel Ketang', 'Lauk Pauk', 'porsi', 5000, 'menu_makanan.png', 'Super Admin', '2020-09-24 06:07:11', NULL, '2020-09-24 06:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `food_recipe`
--

CREATE TABLE `food_recipe` (
  `id` int(10) NOT NULL,
  `menu_id` int(10) NOT NULL,
  `ingredient_id` int(10) NOT NULL,
  `ingredient_amount` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_recipe`
--

INSERT INTO `food_recipe` (`id`, `menu_id`, `ingredient_id`, `ingredient_amount`, `created_at`) VALUES
(1, 4, 1, 0.1, '2020-09-16 14:41:02'),
(2, 4, 2, 0.2, '2020-09-16 14:41:02'),
(3, 4, 3, 0.3, '2020-09-16 14:41:02'),
(7, 10, 1, 10, '2020-09-17 04:13:01'),
(8, 10, 3, 30, '2020-09-17 04:13:02'),
(9, 10, 6, 60, '2020-09-17 04:13:02'),
(10, 13, 1, 10, '2020-09-17 04:15:54'),
(11, 13, 3, 30, '2020-09-17 04:15:54'),
(12, 13, 12, 10, '2020-09-17 04:18:47'),
(43, 17, 1, 2.5, '2020-09-17 08:39:48'),
(44, 17, 3, 2.8, '2020-09-17 08:39:48'),
(45, 17, 18, 2.9, '2020-09-17 08:39:48'),
(46, 18, 9, 10, '2020-09-21 11:29:43'),
(47, 18, 18, 10, '2020-09-21 11:29:43'),
(48, 18, 20, 15, '2020-09-21 11:29:43'),
(49, 19, 19, 20, '2020-09-24 06:07:13'),
(50, 19, 9, 12, '2020-09-24 06:07:13'),
(51, 19, 8, 5, '2020-09-24 06:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `id` int(10) NOT NULL,
  `ingrdnt_name` varchar(100) NOT NULL,
  `ingrdnt_unit` varchar(25) NOT NULL,
  `ingrdnt_stock` float DEFAULT NULL,
  `unit_price` int(7) DEFAULT NULL,
  `ingrdnt_origin` varchar(25) DEFAULT NULL,
  `ingrdnt_type` varchar(100) DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `brand` varchar(150) DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`id`, `ingrdnt_name`, `ingrdnt_unit`, `ingrdnt_stock`, `unit_price`, `ingrdnt_origin`, `ingrdnt_type`, `img_url`, `brand`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(8, 'cengkeh', 'kg', 12.5, 13000, 'pasar tradisional', 'Bahan Kering', 'jenis-bumbu-dapur.jpg', '', 'super admin', '2020-08-31 16:00:31', NULL, '2020-09-17 08:41:13'),
(9, 'kelapa', 'buah', 200, 800000, 'Pasar', 'Basah', 'jenis-bumbu-dapur.jpg', '', 'admin demo', '2020-08-31 17:35:30', 'dani', '2020-09-17 08:41:19'),
(11, 'Lengkuas', 'Kg', 32.5, 30000, 'Pasar Swalayan', 'Bahan Kering', 'jenis-bumbu-dapur.jpg', 'Jawafood', 'Owner AW Catering', '2020-09-16 12:06:05', NULL, '2020-09-17 08:41:47'),
(12, 'Terasi', 'kg', NULL, NULL, NULL, NULL, 'jenis-bumbu-dapur.jpg', NULL, 'Owner AW Catering', '2020-09-17 04:18:47', NULL, '2020-09-17 08:41:09'),
(13, 'Bawang Putih', 'kg', NULL, NULL, NULL, NULL, 'jenis-bumbu-dapur.jpg', NULL, 'Owner AW Catering', '2020-09-17 04:32:16', NULL, '2020-09-17 04:32:16'),
(14, 'Merica', 'kg', NULL, NULL, NULL, NULL, 'jenis-bumbu-dapur.jpg', NULL, 'Owner AW Catering', '2020-09-17 04:32:16', NULL, '2020-09-17 04:32:16'),
(18, 'Wortel', 'kg', NULL, NULL, NULL, NULL, 'jenis-bumbu-dapur.jpg', NULL, 'Owner AW Catering', '2020-09-17 08:39:48', NULL, '2020-09-17 08:39:48'),
(19, 'Kunyit', 'kg', 20, 15000, 'Pasar Bogor', 'sayur-sayuran', 'jenis-bumbu-dapur.jpg', '', 'Owner AW Catering', '2020-09-17 15:39:34', NULL, '2020-09-17 15:39:34'),
(20, 'Toge', 'kg', 20, 12000, 'Pasar Cicurug', 'sayur-sayuran', 'jenis-bumbu-dapur.jpg', '', 'Owner AW Catering', '2020-09-17 15:43:33', NULL, '2020-09-17 15:43:33'),
(21, 'Paprika', 'kg', 20, 120000, 'Lottemart Bogor', 'sayur-sayuran', 'jenis-bumbu-dapur.jpg', '', 'Owner AW Catering', '2020-09-21 11:36:39', NULL, '2020-09-21 11:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `custmr_id` varchar(10) NOT NULL,
  `order_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `finished_at` datetime DEFAULT NULL,
  `sum_price` int(15) NOT NULL,
  `sum_amount` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `custmr_id`, `order_at`, `finished_at`, `sum_price`, `sum_amount`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(2, '1', '2020-09-24 09:55:55', '2020-09-10 00:00:00', 15000000, 2000, 4, 'Super Admin', '2020-09-24 09:55:55', NULL, '2020-09-24 15:37:23'),
(3, '1', '2020-09-24 09:58:52', '2020-09-10 00:00:00', 13000000, 1500, 1, 'Super Admin', '2020-09-24 09:58:52', NULL, '2020-09-24 09:58:52'),
(4, '1', '2020-09-24 10:06:19', '2020-09-10 00:00:00', 21500000, 10000, 1, 'Super Admin', '2020-09-24 10:06:19', NULL, '2020-09-24 10:06:19'),
(5, '1', '2020-09-24 12:20:20', '2020-09-22 00:00:00', 15000000, 2500, 1, 'Super Admin', '2020-09-24 12:20:20', NULL, '2020-09-24 12:20:20'),
(6, '1', '2020-09-24 12:20:21', '2020-09-23 00:00:00', 15000000, 2500, 1, 'Super Admin', '2020-09-24 12:20:21', NULL, '2020-09-24 12:20:21'),
(7, '1', '2020-09-24 12:20:21', '2020-09-24 00:00:00', 15000000, 2500, 1, 'Super Admin', '2020-09-24 12:20:21', NULL, '2020-09-24 12:20:21'),
(8, '1', '2020-09-24 12:20:21', '2020-09-25 00:00:00', 15000000, 2500, 1, 'Super Admin', '2020-09-24 12:20:21', NULL, '2020-09-24 12:20:21'),
(9, '1', '2020-09-24 12:20:21', '2020-09-26 00:00:00', 15000000, 2500, 1, 'Super Admin', '2020-09-24 12:20:21', NULL, '2020-09-24 12:20:21'),
(11, '1', '2020-09-24 12:35:51', '2020-10-02 00:00:00', 2500000, 300, 1, 'Super Admin', '2020-09-24 12:35:51', NULL, '2020-09-24 12:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `menu_id` int(10) NOT NULL,
  `sum_amount` int(10) NOT NULL,
  `sum_price` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `menu_id`, `sum_amount`, `sum_price`, `created_at`, `updated_at`) VALUES
(4, 11, 4, 100, 500000, '0000-00-00 00:00:00', NULL),
(5, 11, 10, 100, 500000, '0000-00-00 00:00:00', NULL),
(6, 11, 13, 100, 1500000, '0000-00-00 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_menu`
--
ALTER TABLE `food_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_recipe`
--
ALTER TABLE `food_recipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food_menu`
--
ALTER TABLE `food_menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `food_recipe`
--
ALTER TABLE `food_recipe`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
