-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2020 at 06:23 PM
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
  `adm_password` varchar(25) NOT NULL,
  `adm_phone` char(15) NOT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `role` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_number` char(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `created_at` int(11) NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `food_recipe`
--

CREATE TABLE `food_recipe` (
  `id` int(10) NOT NULL,
  `menu_id` int(10) NOT NULL,
  `ingredient_id` int(10) NOT NULL,
  `ingredient_ammout` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `img_url` varchar(255) DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_menu`
--
ALTER TABLE `food_menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_recipe`
--
ALTER TABLE `food_recipe`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

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
