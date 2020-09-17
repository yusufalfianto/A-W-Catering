-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2020 at 10:44 AM
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
(1, 'Owner AW Catering', 'superadmin@gmail.com', '257292c94f118c69575a635f47131cb39cf9b78981a254425923151e24e0313394f7cb31e6f875604c605955efb9a1a3cab919a8625bfb8950c18cac23ae35a8', '087776666677', 'admin.png', 'Super Admin', '2020-08-05 23:10:25', '2020-08-08 23:10:25'),
(17, 'Ilham Kusuma', 'ilhamaye@gmail.com', '257292c94f118c69575a635f47131cb39cf9b78981a254425923151e24e0313394f7cb31e6f875604c605955efb9a1a3cab919a8625bfb8950c18cac23ae35a8', '(0812) 8312-312', 'admin.png', 'Admin Pesanan', '0000-00-00 00:00:00', NULL),
(18, 'Bebe', 'bebe@gmail.com', '257292c94f118c69575a635f47131cb39cf9b78981a254425923151e24e0313394f7cb31e6f875604c605955efb9a1a3cab919a8625bfb8950c18cac23ae35a8', '(0182) 7391-231', 'admin.png', 'Admin Gudang Bahan', '0000-00-00 00:00:00', NULL);

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
(28, 17, 1),
(31, 18, 1),
(32, 19, 3),
(33, 19, 4);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_number` char(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone_number`, `address`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('', 'andi123', '08771231', 'Bogor Jawabarat', 'Owner AW Catering', '2020-09-16 11:50:35', NULL, '2020-09-16 11:50:35');

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
(17, 'Capcay', 'Sayur dan Sup', 'porsi', 6000, 'menu_makanan.png', 'Owner AW Catering', '2020-09-17 04:32:14', 'Owner AW Catering', '2020-09-17 08:39:46');

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
(45, 17, 18, 2.9, '2020-09-17 08:39:48');

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
(1, 'bawang merah', 'kg', 100.5, 22000, 'pasar swalayan', 'Bahan Kering', 'jenis-bumbu-dapur.jpg', '', 'admin123', '2020-08-31 13:53:05', 'dani', '2020-09-17 08:41:44'),
(2, 'Kemiri', 'gram', 500, 250000, 'Pasar', 'Kering', 'jenis-bumbu-dapur.jpg', '', 'dani', '2020-09-11 11:58:27', 'dani', '2020-09-17 08:41:37'),
(3, 'Cabai', 'kg', 12.2, 120000, 'pasar tradisional', 'bahan kering', 'jenis-bumbu-dapur.jpg', '', 'admin123', '2020-08-31 14:23:19', 'admin super', '2020-09-17 08:41:33'),
(6, 'kunyit', 'kg', 9.9, 15000, 'pasar tradisional', 'Bahan Kering', 'jenis-bumbu-dapur.jpg', '', 'super admin', '2020-08-31 14:57:32', 'admin super', '2020-09-17 08:41:28'),
(7, 'lengkuas', 'kg', 2.5, 15000, 'Pasar swalayan', 'Bahan Kering', 'jenis-bumbu-dapur.jpg', '', 'super admin', '2020-08-31 15:46:37', NULL, '2020-09-17 08:41:23'),
(8, 'cengkeh', 'kg', 12.5, 13000, 'pasar tradisional', 'Bahan Kering', 'jenis-bumbu-dapur.jpg', '', 'super admin', '2020-08-31 16:00:31', NULL, '2020-09-17 08:41:13'),
(9, 'kelapa', 'buah', 200, 800000, 'Pasar', 'Basah', 'jenis-bumbu-dapur.jpg', '', 'admin demo', '2020-08-31 17:35:30', 'dani', '2020-09-17 08:41:19'),
(11, 'Lengkuas', 'Kg', 32.5, 30000, 'Pasar Swalayan', 'Bahan Kering', 'jenis-bumbu-dapur.jpg', 'Jawafood', 'Owner AW Catering', '2020-09-16 12:06:05', NULL, '2020-09-17 08:41:47'),
(12, 'Terasi', 'kg', NULL, NULL, NULL, NULL, 'jenis-bumbu-dapur.jpg', NULL, 'Owner AW Catering', '2020-09-17 04:18:47', NULL, '2020-09-17 08:41:09'),
(13, 'Bawang Putih', 'kg', NULL, NULL, NULL, NULL, 'jenis-bumbu-dapur.jpg', NULL, 'Owner AW Catering', '2020-09-17 04:32:16', NULL, '2020-09-17 04:32:16'),
(14, 'Merica', 'kg', NULL, NULL, NULL, NULL, 'jenis-bumbu-dapur.jpg', NULL, 'Owner AW Catering', '2020-09-17 04:32:16', NULL, '2020-09-17 04:32:16'),
(18, 'Wortel', 'kg', NULL, NULL, NULL, NULL, 'jenis-bumbu-dapur.jpg', NULL, 'Owner AW Catering', '2020-09-17 08:39:48', NULL, '2020-09-17 08:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) NOT NULL,
  `custmr_id` varchar(10) NOT NULL,
  `order_at` datetime NOT NULL,
  `finshed_at` datetime DEFAULT NULL,
  `sum_price` int(15) NOT NULL,
  `status` int(1) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_datail`
--

CREATE TABLE `order_datail` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `menu_id` int(10) NOT NULL,
  `sum_order` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_datail`
--
ALTER TABLE `order_datail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `food_menu`
--
ALTER TABLE `food_menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `food_recipe`
--
ALTER TABLE `food_recipe`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_datail`
--
ALTER TABLE `order_datail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
