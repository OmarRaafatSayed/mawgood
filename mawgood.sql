-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2026 at 07:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mawgood`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `address_type` varchar(255) NOT NULL,
  `parent_address_id` int(10) UNSIGNED DEFAULT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'null if guest checkout',
  `cart_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'only for cart_addresses',
  `order_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'only for order_addresses',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `vat_id` varchar(255) DEFAULT NULL,
  `default_address` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'only for customer_addresses',
  `use_for_shipping` tinyint(1) NOT NULL DEFAULT 0,
  `additional` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `address_type`, `parent_address_id`, `customer_id`, `cart_id`, `order_id`, `first_name`, `last_name`, `gender`, `company_name`, `address`, `city`, `state`, `country`, `postcode`, `email`, `phone`, `vat_id`, `default_address`, `use_for_shipping`, `additional`, `created_at`, `updated_at`) VALUES
(1, 'customer', NULL, 2, NULL, NULL, 'عمر رافت', 'سيد', NULL, 'omar', '9 ش احمد يوسف بجوار البان البركه', 'cairo', 'cairo', 'EG', '17333', 'omarraafat2025@gmail.com', '01157571561', NULL, 0, 0, NULL, '2026-01-30 02:50:44', '2026-01-30 02:50:44'),
(2, 'cart_billing', 1, 2, 27, NULL, 'عمر رافت', 'سيد', NULL, 'omar', '9 ش احمد يوسف بجوار البان البركه', 'cairo', 'cairo', 'EG', '17333', 'omarraafat2025@gmail.com', '01157571561', NULL, 0, 1, NULL, '2026-01-30 02:51:06', '2026-01-30 02:51:06'),
(3, 'cart_shipping', 1, 2, 27, NULL, 'عمر رافت', 'سيد', NULL, 'omar', '9 ش احمد يوسف بجوار البان البركه', 'cairo', 'cairo', 'EG', '17333', 'omarraafat2025@gmail.com', '01157571561', NULL, 0, 0, NULL, '2026-01-30 02:51:06', '2026-01-30 02:51:06'),
(4, 'order_shipping', NULL, NULL, NULL, 1, 'عمر رافت', 'سيد', NULL, 'omar', '9 ش احمد يوسف بجوار البان البركه', 'cairo', 'cairo', 'EG', '17333', 'omarraafat2025@gmail.com', '01157571561', NULL, 0, 0, NULL, '2026-01-30 02:51:49', '2026-01-30 02:51:49'),
(5, 'order_billing', NULL, NULL, NULL, 1, 'عمر رافت', 'سيد', NULL, 'omar', '9 ش احمد يوسف بجوار البان البركه', 'cairo', 'cairo', 'EG', '17333', 'omarraafat2025@gmail.com', '01157571561', NULL, 0, 0, NULL, '2026-01-30 02:51:49', '2026-01-30 02:51:49'),
(6, 'cart_billing', 1, 2, 31, NULL, 'عمر رافت', 'سيد', NULL, 'omar', '9 ش احمد يوسف بجوار البان البركه', 'cairo', 'cairo', 'EG', '17333', 'omarraafat2025@gmail.com', '01157571561', NULL, 0, 1, NULL, '2026-01-31 23:29:13', '2026-01-31 23:29:13'),
(7, 'cart_shipping', 1, 2, 31, NULL, 'عمر رافت', 'سيد', NULL, 'omar', '9 ش احمد يوسف بجوار البان البركه', 'cairo', 'cairo', 'EG', '17333', 'omarraafat2025@gmail.com', '01157571561', NULL, 0, 0, NULL, '2026-01-31 23:29:13', '2026-01-31 23:29:13'),
(8, 'order_shipping', NULL, NULL, NULL, 2, 'عمر رافت', 'سيد', NULL, 'omar', '9 ش احمد يوسف بجوار البان البركه', 'cairo', 'cairo', 'EG', '17333', 'omarraafat2025@gmail.com', '01157571561', NULL, 0, 0, NULL, '2026-01-31 23:29:25', '2026-01-31 23:29:25'),
(9, 'order_billing', NULL, NULL, NULL, 2, 'عمر رافت', 'سيد', NULL, 'omar', '9 ش احمد يوسف بجوار البان البركه', 'cairo', 'cairo', 'EG', '17333', 'omarraafat2025@gmail.com', '01157571561', NULL, 0, 0, NULL, '2026-01-31 23:29:25', '2026-01-31 23:29:25'),
(10, 'cart_billing', 1, 2, 32, NULL, 'عمر رافت', 'سيد', NULL, 'omar', '9 ش احمد يوسف بجوار البان البركه', 'cairo', 'cairo', 'EG', '17333', 'omarraafat2025@gmail.com', '01157571561', NULL, 0, 1, NULL, '2026-02-02 14:51:47', '2026-02-02 14:51:47'),
(11, 'cart_shipping', 1, 2, 32, NULL, 'عمر رافت', 'سيد', NULL, 'omar', '9 ش احمد يوسف بجوار البان البركه', 'cairo', 'cairo', 'EG', '17333', 'omarraafat2025@gmail.com', '01157571561', NULL, 0, 0, NULL, '2026-02-02 14:51:47', '2026-02-02 14:51:47'),
(12, 'cart_billing', 1, 2, 36, NULL, 'عمر رافت', 'سيد', NULL, 'omar', '9 ش احمد يوسف بجوار البان البركه', 'cairo', 'cairo', 'EG', '17333', 'omarraafat2025@gmail.com', '01157571561', NULL, 0, 1, NULL, '2026-02-02 15:07:49', '2026-02-02 15:07:49'),
(13, 'cart_shipping', 1, 2, 36, NULL, 'عمر رافت', 'سيد', NULL, 'omar', '9 ش احمد يوسف بجوار البان البركه', 'cairo', 'cairo', 'EG', '17333', 'omarraafat2025@gmail.com', '01157571561', NULL, 0, 0, NULL, '2026-02-02 15:07:50', '2026-02-02 15:07:50'),
(14, 'order_shipping', NULL, NULL, NULL, 3, 'عمر رافت', 'سيد', NULL, 'omar', '9 ش احمد يوسف بجوار البان البركه', 'cairo', 'cairo', 'EG', '17333', 'omarraafat2025@gmail.com', '01157571561', NULL, 0, 0, NULL, '2026-02-02 15:08:35', '2026-02-02 15:08:35'),
(15, 'order_billing', NULL, NULL, NULL, 3, 'عمر رافت', 'سيد', NULL, 'omar', '9 ش احمد يوسف بجوار البان البركه', 'cairo', 'cairo', 'EG', '17333', 'omarraafat2025@gmail.com', '01157571561', NULL, 0, 0, NULL, '2026-02-02 15:08:35', '2026-02-02 15:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `api_token` varchar(80) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `role_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `api_token`, `status`, `role_id`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Example', 'admin@example.com', '$2y$10$ohjTbglngsC8S9TbethW3OYKu9UHPbe7mWA4fph147XIWcqxfb6JK', 'NOyZtlpqNni6DPcLDhfLw67DBUfESkhijLlzFgQT4yXtFto9h9RDedMVPJKfcxD8lzOARFKiTETd2WDV', 1, 1, NULL, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(2, 'Admin', 'admin@admin.com', '$2y$10$tiACRfBtglizwkVl/x1wOOKYa8UiAlLQxw0vvj7AqRTvBYKimStqW', NULL, 1, 1, NULL, NULL, '2026-01-26 17:42:36', '2026-01-26 17:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `swatch_type` varchar(255) DEFAULT NULL,
  `validation` varchar(255) DEFAULT NULL,
  `regex` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT 0,
  `is_unique` tinyint(1) NOT NULL DEFAULT 0,
  `is_filterable` tinyint(1) NOT NULL DEFAULT 0,
  `is_comparable` tinyint(1) NOT NULL DEFAULT 0,
  `is_configurable` tinyint(1) NOT NULL DEFAULT 0,
  `is_user_defined` tinyint(1) NOT NULL DEFAULT 1,
  `is_visible_on_front` tinyint(1) NOT NULL DEFAULT 0,
  `value_per_locale` tinyint(1) NOT NULL DEFAULT 0,
  `value_per_channel` tinyint(1) NOT NULL DEFAULT 0,
  `default_value` int(11) DEFAULT NULL,
  `enable_wysiwyg` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `code`, `admin_name`, `type`, `swatch_type`, `validation`, `regex`, `position`, `is_required`, `is_unique`, `is_filterable`, `is_comparable`, `is_configurable`, `is_user_defined`, `is_visible_on_front`, `value_per_locale`, `value_per_channel`, `default_value`, `enable_wysiwyg`, `created_at`, `updated_at`) VALUES
(1, 'sku', 'SKU', 'text', NULL, NULL, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(2, 'name', 'Name', 'text', NULL, NULL, NULL, 3, 1, 0, 0, 1, 0, 0, 0, 1, 0, NULL, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(3, 'url_key', 'URL Key', 'text', NULL, NULL, NULL, 4, 1, 1, 0, 0, 0, 0, 0, 1, 0, NULL, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(4, 'tax_category_id', 'Tax Category', 'select', NULL, NULL, NULL, 5, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(5, 'new', 'New', 'boolean', NULL, NULL, NULL, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(6, 'featured', 'Featured', 'boolean', NULL, NULL, NULL, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(7, 'visible_individually', 'Visible Individually', 'boolean', NULL, NULL, NULL, 9, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(8, 'status', 'Status', 'boolean', NULL, NULL, NULL, 10, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(9, 'short_description', 'Short Description', 'textarea', NULL, NULL, NULL, 11, 1, 0, 0, 0, 0, 0, 0, 1, 0, NULL, 1, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(10, 'description', 'Description', 'textarea', NULL, NULL, NULL, 12, 1, 0, 0, 1, 0, 0, 0, 1, 0, NULL, 1, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(11, 'price', 'Price', 'price', NULL, 'decimal', NULL, 13, 1, 0, 1, 1, 0, 0, 0, 0, 0, NULL, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(12, 'cost', 'Cost', 'price', NULL, 'decimal', NULL, 14, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(13, 'special_price', 'Special Price', 'price', NULL, 'decimal', NULL, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(14, 'special_price_from', 'Special Price From', 'date', NULL, NULL, NULL, 16, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(15, 'special_price_to', 'Special Price To', 'date', NULL, NULL, NULL, 17, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(16, 'meta_title', 'Meta Title', 'textarea', NULL, NULL, NULL, 18, 0, 0, 0, 0, 0, 0, 0, 1, 0, NULL, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(17, 'meta_keywords', 'Meta Keywords', 'textarea', NULL, NULL, NULL, 20, 0, 0, 0, 0, 0, 0, 0, 1, 0, NULL, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(18, 'meta_description', 'Meta Description', 'textarea', NULL, NULL, NULL, 21, 0, 0, 0, 0, 0, 1, 0, 1, 0, NULL, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(19, 'length', 'Length', 'text', NULL, 'decimal', NULL, 22, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(20, 'width', 'Width', 'text', NULL, 'decimal', NULL, 23, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(21, 'height', 'Height', 'text', NULL, 'decimal', NULL, 24, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(22, 'weight', 'Weight', 'text', NULL, 'decimal', NULL, 25, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(23, 'color', 'Color', 'select', NULL, NULL, NULL, 26, 0, 0, 1, 0, 1, 1, 0, 0, 0, NULL, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(24, 'size', 'Size', 'select', NULL, NULL, NULL, 27, 0, 0, 1, 0, 1, 1, 0, 0, 0, NULL, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(25, 'brand', 'Brand', 'select', NULL, NULL, NULL, 28, 0, 0, 1, 0, 0, 1, 1, 0, 0, NULL, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(26, 'guest_checkout', 'Guest Checkout', 'boolean', NULL, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(27, 'product_number', 'Product Number', 'text', NULL, NULL, NULL, 2, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(28, 'manage_stock', 'Manage Stock', 'boolean', NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, '2026-01-26 17:42:11', '2026-01-26 17:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_families`
--

CREATE TABLE `attribute_families` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `is_user_defined` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_families`
--

INSERT INTO `attribute_families` (`id`, `code`, `name`, `status`, `is_user_defined`) VALUES
(1, 'default', 'Default', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_groups`
--

CREATE TABLE `attribute_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `attribute_family_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `column` int(11) NOT NULL DEFAULT 1,
  `position` int(11) NOT NULL,
  `is_user_defined` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_groups`
--

INSERT INTO `attribute_groups` (`id`, `code`, `attribute_family_id`, `name`, `column`, `position`, `is_user_defined`) VALUES
(1, 'general', 1, 'General', 1, 1, 0),
(2, 'description', 1, 'Description', 1, 2, 0),
(3, 'meta_description', 1, 'Meta Description', 1, 3, 0),
(4, 'price', 1, 'Price', 2, 1, 0),
(5, 'shipping', 1, 'Shipping', 2, 2, 0),
(6, 'settings', 1, 'Settings', 2, 3, 0),
(7, 'inventories', 1, 'Inventories', 2, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_group_mappings`
--

CREATE TABLE `attribute_group_mappings` (
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `attribute_group_id` int(10) UNSIGNED NOT NULL,
  `position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_group_mappings`
--

INSERT INTO `attribute_group_mappings` (`attribute_id`, `attribute_group_id`, `position`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 4),
(4, 1, 5),
(5, 6, 1),
(6, 6, 2),
(7, 6, 3),
(8, 6, 4),
(9, 2, 1),
(10, 2, 2),
(11, 4, 1),
(12, 4, 2),
(13, 4, 3),
(14, 4, 4),
(15, 4, 5),
(16, 3, 1),
(17, 3, 2),
(18, 3, 3),
(19, 5, 1),
(20, 5, 2),
(21, 5, 3),
(22, 5, 4),
(23, 1, 6),
(24, 1, 7),
(25, 1, 8),
(26, 6, 5),
(27, 1, 2),
(28, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_options`
--

CREATE TABLE `attribute_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `swatch_value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_options`
--

INSERT INTO `attribute_options` (`id`, `attribute_id`, `admin_name`, `sort_order`, `swatch_value`) VALUES
(1, 23, 'Red', 1, NULL),
(2, 23, 'Green', 2, NULL),
(3, 23, 'Yellow', 3, NULL),
(4, 23, 'Black', 4, NULL),
(5, 23, 'White', 5, NULL),
(6, 24, 'S', 1, NULL),
(7, 24, 'M', 2, NULL),
(8, 24, 'L', 3, NULL),
(9, 24, 'XL', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_option_translations`
--

CREATE TABLE `attribute_option_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `attribute_option_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `label` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_option_translations`
--

INSERT INTO `attribute_option_translations` (`id`, `attribute_option_id`, `locale`, `label`) VALUES
(1, 1, 'en', 'Red'),
(2, 2, 'en', 'Green'),
(3, 3, 'en', 'Yellow'),
(4, 4, 'en', 'Black'),
(5, 5, 'en', 'White'),
(6, 6, 'en', 'S'),
(7, 7, 'en', 'M'),
(8, 8, 'en', 'L'),
(9, 9, 'en', 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_translations`
--

CREATE TABLE `attribute_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_translations`
--

INSERT INTO `attribute_translations` (`id`, `attribute_id`, `locale`, `name`) VALUES
(1, 1, 'en', 'SKU'),
(2, 2, 'en', 'Name'),
(3, 3, 'en', 'URL Key'),
(4, 4, 'en', 'Tax Category'),
(5, 5, 'en', 'New'),
(6, 6, 'en', 'Featured'),
(7, 7, 'en', 'Visible Individually'),
(8, 8, 'en', 'Status'),
(9, 9, 'en', 'Short Description'),
(10, 10, 'en', 'Description'),
(11, 11, 'en', 'Price'),
(12, 12, 'en', 'Cost'),
(13, 13, 'en', 'Special Price'),
(14, 14, 'en', 'Special Price From'),
(15, 15, 'en', 'Special Price To'),
(16, 16, 'en', 'Meta Title'),
(17, 17, 'en', 'Meta Keywords'),
(18, 18, 'en', 'Meta Description'),
(19, 19, 'en', 'Length'),
(20, 20, 'en', 'Width'),
(21, 21, 'en', 'Height'),
(22, 22, 'en', 'Weight'),
(23, 23, 'en', 'Color'),
(24, 24, 'en', 'Size'),
(25, 25, 'en', 'Brand'),
(26, 26, 'en', 'Guest Checkout'),
(27, 27, 'en', 'Product Number'),
(28, 28, 'en', 'Manage Stock');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `views` int(11) NOT NULL DEFAULT 0,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `order_item_id` int(10) UNSIGNED DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `qty` int(11) DEFAULT 0,
  `from` int(11) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  `booking_product_event_ticket_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_products`
--

CREATE TABLE `booking_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `qty` int(11) DEFAULT 0,
  `location` varchar(255) DEFAULT NULL,
  `show_location` tinyint(1) NOT NULL DEFAULT 0,
  `available_every_week` tinyint(1) DEFAULT NULL,
  `available_from` datetime DEFAULT NULL,
  `available_to` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_products`
--

INSERT INTO `booking_products` (`id`, `product_id`, `type`, `qty`, `location`, `show_location`, `available_every_week`, `available_from`, `available_to`, `created_at`, `updated_at`) VALUES
(1, 12, 'default', 30, 'fdhdhdfhdfh', 0, NULL, '2026-02-02 12:00:00', '2026-02-12 12:00:00', '2026-02-02 15:04:04', '2026-02-02 15:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `booking_product_appointment_slots`
--

CREATE TABLE `booking_product_appointment_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_product_id` int(10) UNSIGNED NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `break_time` int(11) DEFAULT NULL,
  `same_slot_all_days` tinyint(1) DEFAULT NULL,
  `slots` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`slots`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_product_default_slots`
--

CREATE TABLE `booking_product_default_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_product_id` int(10) UNSIGNED NOT NULL,
  `booking_type` varchar(255) NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `break_time` int(11) DEFAULT NULL,
  `slots` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`slots`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_product_default_slots`
--

INSERT INTO `booking_product_default_slots` (`id`, `booking_product_id`, `booking_type`, `duration`, `break_time`, `slots`) VALUES
(1, 1, 'one', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_product_event_tickets`
--

CREATE TABLE `booking_product_event_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_product_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(12,4) DEFAULT 0.0000,
  `qty` int(11) DEFAULT 0,
  `special_price` decimal(12,4) DEFAULT NULL,
  `special_price_from` datetime DEFAULT NULL,
  `special_price_to` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_product_event_ticket_translations`
--

CREATE TABLE `booking_product_event_ticket_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_product_event_ticket_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_product_rental_slots`
--

CREATE TABLE `booking_product_rental_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_product_id` int(10) UNSIGNED NOT NULL,
  `renting_type` varchar(255) NOT NULL,
  `daily_price` decimal(12,4) DEFAULT 0.0000,
  `hourly_price` decimal(12,4) DEFAULT 0.0000,
  `same_slot_all_days` tinyint(1) DEFAULT NULL,
  `slots` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`slots`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_product_table_slots`
--

CREATE TABLE `booking_product_table_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_product_id` int(10) UNSIGNED NOT NULL,
  `price_type` varchar(255) NOT NULL,
  `guest_limit` int(11) NOT NULL DEFAULT 0,
  `duration` int(11) NOT NULL,
  `break_time` int(11) NOT NULL,
  `prevent_scheduling_before` int(11) NOT NULL,
  `same_slot_all_days` tinyint(1) DEFAULT NULL,
  `slots` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`slots`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_first_name` varchar(255) DEFAULT NULL,
  `customer_last_name` varchar(255) DEFAULT NULL,
  `shipping_method` varchar(255) DEFAULT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `is_gift` tinyint(1) NOT NULL DEFAULT 0,
  `items_count` int(11) DEFAULT NULL,
  `items_qty` decimal(12,4) DEFAULT NULL,
  `exchange_rate` decimal(12,4) DEFAULT NULL,
  `global_currency_code` varchar(255) DEFAULT NULL,
  `base_currency_code` varchar(255) DEFAULT NULL,
  `channel_currency_code` varchar(255) DEFAULT NULL,
  `cart_currency_code` varchar(255) DEFAULT NULL,
  `grand_total` decimal(12,4) DEFAULT 0.0000,
  `base_grand_total` decimal(12,4) DEFAULT 0.0000,
  `sub_total` decimal(12,4) DEFAULT 0.0000,
  `base_sub_total` decimal(12,4) DEFAULT 0.0000,
  `tax_total` decimal(12,4) DEFAULT 0.0000,
  `base_tax_total` decimal(12,4) DEFAULT 0.0000,
  `discount_amount` decimal(12,4) DEFAULT 0.0000,
  `base_discount_amount` decimal(12,4) DEFAULT 0.0000,
  `shipping_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_shipping_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `shipping_amount_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_shipping_amount_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `sub_total_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_sub_total_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `checkout_method` varchar(255) DEFAULT NULL,
  `is_guest` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `applied_cart_rule_ids` varchar(255) DEFAULT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `channel_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `customer_email`, `customer_first_name`, `customer_last_name`, `shipping_method`, `coupon_code`, `is_gift`, `items_count`, `items_qty`, `exchange_rate`, `global_currency_code`, `base_currency_code`, `channel_currency_code`, `cart_currency_code`, `grand_total`, `base_grand_total`, `sub_total`, `base_sub_total`, `tax_total`, `base_tax_total`, `discount_amount`, `base_discount_amount`, `shipping_amount`, `base_shipping_amount`, `shipping_amount_incl_tax`, `base_shipping_amount_incl_tax`, `sub_total_incl_tax`, `base_sub_total_incl_tax`, `checkout_method`, `is_guest`, `is_active`, `applied_cart_rule_ids`, `customer_id`, `channel_id`, `created_at`, `updated_at`) VALUES
(7, 'omarraafat939@gmail.com', 'magdy', 'shaban', NULL, NULL, 0, NULL, NULL, NULL, 'USD', 'USD', 'USD', 'USD', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL, 0, 0, NULL, 2, 1, '2026-01-30 02:37:24', '2026-01-30 02:37:28'),
(8, 'omarraafat939@gmail.com', 'magdy', 'shaban', NULL, NULL, 0, NULL, NULL, NULL, 'USD', 'USD', 'USD', 'USD', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL, 0, 0, NULL, 2, 1, '2026-01-30 02:37:28', '2026-01-30 02:37:30'),
(9, 'omarraafat939@gmail.com', 'magdy', 'shaban', NULL, NULL, 0, NULL, NULL, NULL, 'USD', 'USD', 'USD', 'USD', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL, 0, 0, NULL, 2, 1, '2026-01-30 02:37:30', '2026-01-30 02:37:39'),
(11, 'omarraafat939@gmail.com', 'magdy', 'shaban', NULL, NULL, 0, NULL, NULL, NULL, 'USD', 'USD', 'USD', 'USD', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL, 0, 0, NULL, 2, 1, '2026-01-30 02:40:58', '2026-01-30 02:41:01'),
(12, 'omarraafat939@gmail.com', 'magdy', 'shaban', NULL, NULL, 0, NULL, NULL, NULL, 'USD', 'USD', 'USD', 'USD', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL, 0, 0, NULL, 2, 1, '2026-01-30 02:41:01', '2026-01-30 02:41:02'),
(13, 'omarraafat939@gmail.com', 'magdy', 'shaban', NULL, NULL, 0, NULL, NULL, NULL, 'USD', 'USD', 'USD', 'USD', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL, 0, 0, NULL, 2, 1, '2026-01-30 02:41:02', '2026-01-30 02:41:03'),
(14, 'omarraafat939@gmail.com', 'magdy', 'shaban', NULL, NULL, 0, NULL, NULL, NULL, 'USD', 'USD', 'USD', 'USD', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL, 0, 0, NULL, 2, 1, '2026-01-30 02:41:03', '2026-01-30 02:41:04'),
(16, 'omarraafat939@gmail.com', 'magdy', 'shaban', NULL, NULL, 0, NULL, NULL, NULL, 'USD', 'USD', 'USD', 'USD', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL, 0, 0, NULL, 2, 1, '2026-01-30 02:41:44', '2026-01-30 02:41:48'),
(17, 'omarraafat939@gmail.com', 'magdy', 'shaban', NULL, NULL, 0, NULL, NULL, NULL, 'USD', 'USD', 'USD', 'USD', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL, 0, 0, NULL, 2, 1, '2026-01-30 02:41:48', '2026-01-30 02:42:04'),
(18, 'omarraafat939@gmail.com', 'magdy', 'shaban', NULL, NULL, 0, NULL, NULL, NULL, 'USD', 'USD', 'USD', 'USD', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL, 0, 0, NULL, 2, 1, '2026-01-30 02:42:04', '2026-01-30 02:42:08'),
(19, 'omarraafat939@gmail.com', 'magdy', 'shaban', NULL, NULL, 0, NULL, NULL, NULL, 'USD', 'USD', 'USD', 'USD', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL, 0, 0, NULL, 2, 1, '2026-01-30 02:42:08', '2026-01-30 02:42:10'),
(21, 'omarraafat939@gmail.com', 'magdy', 'shaban', NULL, NULL, 0, NULL, NULL, NULL, 'USD', 'USD', 'USD', 'USD', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL, 0, 0, NULL, 2, 1, '2026-01-30 02:43:59', '2026-01-30 02:44:03'),
(23, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'USD', 'USD', 'USD', 'USD', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL, 1, 1, NULL, NULL, 1, '2026-01-30 02:45:48', '2026-01-30 02:45:48'),
(25, 'omarraafat939@gmail.com', 'magdy', 'shaban', NULL, NULL, 0, NULL, NULL, NULL, 'USD', 'USD', 'USD', 'USD', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL, 0, 0, NULL, 2, 1, '2026-01-30 02:46:32', '2026-01-30 02:47:20'),
(26, 'omarraafat939@gmail.com', 'magdy', 'shaban', NULL, NULL, 0, 1, 2.0000, NULL, 'USD', 'USD', 'USD', 'USD', 260.0000, 260.0000, 260.0000, 260.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 260.0000, 260.0000, NULL, 0, 0, NULL, 2, 1, '2026-01-30 02:47:20', '2026-01-30 02:49:17'),
(27, 'omarraafat939@gmail.com', 'magdy', 'shaban', 'flatrate_flatrate', NULL, 0, 1, 1.0000, NULL, 'USD', 'USD', 'USD', 'USD', 140.0000, 140.0000, 130.0000, 130.0000, 0.0000, 0.0000, 0.0000, 0.0000, 10.0000, 10.0000, 10.0000, 10.0000, 130.0000, 130.0000, NULL, 0, 0, NULL, 2, 1, '2026-01-30 02:49:17', '2026-01-30 02:51:49'),
(29, 'omarraafat939@gmail.com', 'مش مجدي', 'shaban', NULL, NULL, 0, 1, 1.0000, NULL, 'USD', 'USD', 'USD', 'USD', 220.0000, 220.0000, 220.0000, 220.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, NULL, 0, 0, NULL, 2, 1, '2026-01-31 23:28:13', '2026-01-31 23:28:41'),
(30, 'omarraafat939@gmail.com', 'مش مجدي', 'shaban', NULL, NULL, 0, 1, 1.0000, NULL, 'USD', 'USD', 'USD', 'USD', 220.0000, 220.0000, 220.0000, 220.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, NULL, 0, 0, NULL, 2, 1, '2026-01-31 23:28:41', '2026-01-31 23:28:42'),
(31, 'omarraafat939@gmail.com', 'مش مجدي', 'shaban', 'flatrate_flatrate', NULL, 0, 1, 1.0000, NULL, 'USD', 'USD', 'USD', 'USD', 230.0000, 230.0000, 220.0000, 220.0000, 0.0000, 0.0000, 0.0000, 0.0000, 10.0000, 10.0000, 10.0000, 10.0000, 220.0000, 220.0000, NULL, 0, 0, NULL, 2, 1, '2026-01-31 23:28:42', '2026-01-31 23:29:27'),
(32, 'omarraafat939@gmail.com', 'مش مجدي', 'shaban', NULL, NULL, 0, 1, 3.0000, NULL, 'USD', 'USD', 'USD', 'USD', 660.0000, 660.0000, 660.0000, 660.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 660.0000, 660.0000, NULL, 0, 0, NULL, 2, 1, '2026-02-01 18:12:36', '2026-02-02 15:05:41'),
(34, 'omarraafat939@gmail.com', 'مش مجدي', 'shaban', NULL, NULL, 0, 1, 1.0000, NULL, 'USD', 'USD', 'USD', 'USD', 220.0000, 220.0000, 220.0000, 220.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, NULL, 0, 0, NULL, 2, 1, '2026-02-02 15:06:07', '2026-02-02 15:06:19'),
(35, 'omarraafat939@gmail.com', 'مش مجدي', 'shaban', NULL, NULL, 0, 1, 3.0000, NULL, 'USD', 'USD', 'USD', 'USD', 660.0000, 660.0000, 660.0000, 660.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 660.0000, 660.0000, NULL, 0, 0, NULL, 2, 1, '2026-02-02 15:06:19', '2026-02-02 15:06:21'),
(36, 'omarraafat939@gmail.com', 'مش مجدي', 'shaban', 'flatrate_flatrate', NULL, 0, 1, 3.0000, NULL, 'USD', 'USD', 'USD', 'USD', 690.0000, 690.0000, 660.0000, 660.0000, 0.0000, 0.0000, 0.0000, 0.0000, 30.0000, 30.0000, 30.0000, 30.0000, 660.0000, 660.0000, NULL, 0, 0, NULL, 2, 1, '2026-02-02 15:06:21', '2026-02-02 15:08:37'),
(37, 'omarraafat939@gmail.com', 'مش مجدي', 'shaban', NULL, NULL, 0, 1, 5.0000, NULL, 'USD', 'USD', 'USD', 'USD', 1100.0000, 1100.0000, 1100.0000, 1100.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, NULL, 0, 0, NULL, 2, 1, '2026-02-02 15:12:08', '2026-02-02 15:13:26'),
(39, 'omarraafat939@gmail.com', 'مش مجدي', 'shaban', NULL, NULL, 0, 2, 3.0000, NULL, 'USD', 'USD', 'USD', 'USD', 63.0000, 63.0000, 63.0000, 63.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 63.0000, 63.0000, NULL, 0, 1, NULL, 2, 1, '2026-02-03 02:24:44', '2026-02-03 03:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `sku` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `weight` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `total_weight` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_total_weight` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `price` decimal(12,4) NOT NULL DEFAULT 1.0000,
  `base_price` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `custom_price` decimal(12,4) DEFAULT NULL,
  `total` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_total` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `tax_percent` decimal(12,4) DEFAULT 0.0000,
  `tax_amount` decimal(12,4) DEFAULT 0.0000,
  `base_tax_amount` decimal(12,4) DEFAULT 0.0000,
  `discount_percent` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `discount_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_discount_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `price_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_price_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `total_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_total_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `applied_tax_rate` varchar(255) DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `cart_id` int(10) UNSIGNED NOT NULL,
  `tax_category_id` int(10) UNSIGNED DEFAULT NULL,
  `applied_cart_rule_ids` varchar(255) DEFAULT NULL,
  `additional` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `quantity`, `sku`, `type`, `name`, `coupon_code`, `weight`, `total_weight`, `base_total_weight`, `price`, `base_price`, `custom_price`, `total`, `base_total`, `tax_percent`, `tax_amount`, `base_tax_amount`, `discount_percent`, `discount_amount`, `base_discount_amount`, `price_incl_tax`, `base_price_incl_tax`, `total_incl_tax`, `base_total_incl_tax`, `applied_tax_rate`, `parent_id`, `product_id`, `cart_id`, `tax_category_id`, `applied_cart_rule_ids`, `additional`, `created_at`, `updated_at`) VALUES
(4, 1, 'PROD-1769887342', 'simple', 'المنتج التاني', NULL, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, NULL, 220.0000, 220.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, 220.0000, 220.0000, NULL, NULL, 11, 29, NULL, NULL, '{\"cart_id\":29,\"product_id\":\"11\",\"is_buy_now\":\"0\",\"quantity\":1}', '2026-01-31 23:28:13', '2026-01-31 23:28:13'),
(5, 1, 'PROD-1769887342', 'simple', 'المنتج التاني', NULL, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, NULL, 220.0000, 220.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, 220.0000, 220.0000, NULL, NULL, 11, 30, NULL, NULL, '{\"cart_id\":30,\"product_id\":\"11\",\"is_buy_now\":\"1\",\"quantity\":1}', '2026-01-31 23:28:41', '2026-01-31 23:28:41'),
(6, 1, 'PROD-1769887342', 'simple', 'المنتج التاني', NULL, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, NULL, 220.0000, 220.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, 220.0000, 220.0000, NULL, NULL, 11, 31, NULL, NULL, '{\"cart_id\":31,\"product_id\":\"11\",\"is_buy_now\":\"1\",\"quantity\":1}', '2026-01-31 23:28:42', '2026-01-31 23:28:42'),
(7, 3, 'PROD-1769887342', 'simple', 'المنتج التاني', NULL, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, NULL, 660.0000, 660.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, 660.0000, 660.0000, NULL, NULL, 11, 32, NULL, NULL, '{\"cart_id\":32,\"quantity\":3,\"product_id\":11}', '2026-02-01 18:12:36', '2026-02-02 14:50:47'),
(8, 1, 'PROD-1769887342', 'simple', 'المنتج التاني', NULL, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, NULL, 220.0000, 220.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, 220.0000, 220.0000, NULL, NULL, 11, 34, NULL, NULL, '{\"cart_id\":34,\"product_id\":\"11\",\"is_buy_now\":\"0\",\"quantity\":1}', '2026-02-02 15:06:07', '2026-02-02 15:06:07'),
(9, 3, 'PROD-1769887342', 'simple', 'المنتج التاني', NULL, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, NULL, 660.0000, 660.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, 660.0000, 660.0000, NULL, NULL, 11, 35, NULL, NULL, '{\"cart_id\":35,\"product_id\":\"11\",\"is_buy_now\":\"1\",\"quantity\":3}', '2026-02-02 15:06:19', '2026-02-02 15:06:19'),
(10, 3, 'PROD-1769887342', 'simple', 'المنتج التاني', NULL, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, NULL, 660.0000, 660.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, 660.0000, 660.0000, NULL, NULL, 11, 36, NULL, NULL, '{\"cart_id\":36,\"product_id\":\"11\",\"is_buy_now\":\"1\",\"quantity\":3}', '2026-02-02 15:06:21', '2026-02-02 15:06:21'),
(11, 5, 'PROD-1769887342', 'simple', 'المنتج التاني', NULL, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, NULL, 1100.0000, 1100.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, 1100.0000, 1100.0000, NULL, NULL, 11, 37, NULL, NULL, '{\"cart_id\":36,\"product_id\":\"11\",\"is_buy_now\":\"1\",\"quantity\":5,\"locale\":\"ar\"}', '2026-02-02 15:12:08', '2026-02-02 15:13:26'),
(13, 2, 'PROD-1770066729', 'simple', 'Image Carousel', NULL, 1.0000, 2.0000, 2.0000, 21.0000, 21.0000, NULL, 42.0000, 42.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 21.0000, 21.0000, 42.0000, 42.0000, NULL, NULL, 20, 39, NULL, NULL, '{\"cart_id\":39,\"quantity\":2,\"product_id\":20}', '2026-02-03 02:24:44', '2026-02-03 02:24:45'),
(14, 1, 'PROD-1770069275', 'simple', 'مش منتج خالص', NULL, 0.9800, 0.9800, 0.9800, 21.0000, 21.0000, NULL, 21.0000, 21.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 21.0000, 21.0000, 21.0000, 21.0000, NULL, NULL, 25, 39, NULL, NULL, '{\"cart_id\":39,\"quantity\":1,\"product_id\":25}', '2026-02-03 02:24:56', '2026-02-03 02:24:56');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item_inventories`
--

CREATE TABLE `cart_item_inventories` (
  `id` int(10) UNSIGNED NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `inventory_source_id` int(10) UNSIGNED DEFAULT NULL,
  `cart_item_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_payment`
--

CREATE TABLE `cart_payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `method` varchar(255) NOT NULL,
  `method_title` varchar(255) DEFAULT NULL,
  `cart_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_payment`
--

INSERT INTO `cart_payment` (`id`, `method`, `method_title`, `cart_id`, `created_at`, `updated_at`) VALUES
(2, 'cashondelivery', 'Cash On Delivery', 27, '2026-01-30 02:51:47', '2026-01-30 02:51:47'),
(3, 'cashondelivery', 'Cash On Delivery', 31, '2026-01-31 23:29:22', '2026-01-31 23:29:22'),
(4, 'cashondelivery', 'Cash On Delivery', 36, '2026-02-02 15:08:23', '2026-02-02 15:08:23');

-- --------------------------------------------------------

--
-- Table structure for table `cart_rules`
--

CREATE TABLE `cart_rules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `starts_from` datetime DEFAULT NULL,
  `ends_till` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `coupon_type` int(11) NOT NULL DEFAULT 1,
  `use_auto_generation` tinyint(1) NOT NULL DEFAULT 0,
  `usage_per_customer` int(11) NOT NULL DEFAULT 0,
  `uses_per_coupon` int(11) NOT NULL DEFAULT 0,
  `times_used` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `condition_type` tinyint(1) NOT NULL DEFAULT 1,
  `conditions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`conditions`)),
  `end_other_rules` tinyint(1) NOT NULL DEFAULT 0,
  `uses_attribute_conditions` tinyint(1) NOT NULL DEFAULT 0,
  `action_type` varchar(255) DEFAULT NULL,
  `discount_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `discount_quantity` int(11) NOT NULL DEFAULT 1,
  `discount_step` varchar(255) NOT NULL DEFAULT '1',
  `apply_to_shipping` tinyint(1) NOT NULL DEFAULT 0,
  `free_shipping` tinyint(1) NOT NULL DEFAULT 0,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_rule_channels`
--

CREATE TABLE `cart_rule_channels` (
  `cart_rule_id` int(10) UNSIGNED NOT NULL,
  `channel_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_rule_coupons`
--

CREATE TABLE `cart_rule_coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `usage_limit` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `usage_per_customer` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `times_used` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `type` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_primary` tinyint(1) NOT NULL DEFAULT 0,
  `expired_at` date DEFAULT NULL,
  `cart_rule_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_rule_coupon_usage`
--

CREATE TABLE `cart_rule_coupon_usage` (
  `id` int(10) UNSIGNED NOT NULL,
  `times_used` int(11) NOT NULL DEFAULT 0,
  `cart_rule_coupon_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_rule_customers`
--

CREATE TABLE `cart_rule_customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `times_used` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `cart_rule_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_rule_customer_groups`
--

CREATE TABLE `cart_rule_customer_groups` (
  `cart_rule_id` int(10) UNSIGNED NOT NULL,
  `customer_group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_rule_translations`
--

CREATE TABLE `cart_rule_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `label` text DEFAULT NULL,
  `cart_rule_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_shipping_rates`
--

CREATE TABLE `cart_shipping_rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `carrier` varchar(255) NOT NULL,
  `carrier_title` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `method_title` varchar(255) NOT NULL,
  `method_description` varchar(255) DEFAULT NULL,
  `price` double DEFAULT 0,
  `base_price` double DEFAULT 0,
  `discount_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_discount_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `tax_percent` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `tax_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_tax_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `price_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_price_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `applied_tax_rate` varchar(255) DEFAULT NULL,
  `is_calculate_tax` tinyint(1) NOT NULL DEFAULT 1,
  `cart_address_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cart_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_shipping_rates`
--

INSERT INTO `cart_shipping_rates` (`id`, `carrier`, `carrier_title`, `method`, `method_title`, `method_description`, `price`, `base_price`, `discount_amount`, `base_discount_amount`, `tax_percent`, `tax_amount`, `base_tax_amount`, `price_incl_tax`, `base_price_incl_tax`, `applied_tax_rate`, `is_calculate_tax`, `cart_address_id`, `created_at`, `updated_at`, `cart_id`) VALUES
(11, 'flatrate', 'Flat Rate', 'flatrate_flatrate', 'Flat Rate', 'Flat Rate Shipping', 10, 10, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 10.0000, 10.0000, NULL, 1, 3, '2026-01-30 02:51:44', '2026-01-30 02:51:44', 27),
(12, 'free', 'Free Shipping', 'free_free', 'Free Shipping', 'Free Shipping', 0, 0, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL, 1, 3, '2026-01-30 02:51:44', '2026-01-30 02:51:44', 27),
(17, 'flatrate', 'Flat Rate', 'flatrate_flatrate', 'Flat Rate', 'Flat Rate Shipping', 10, 10, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 10.0000, 10.0000, NULL, 1, 7, '2026-01-31 23:29:19', '2026-01-31 23:29:19', 31),
(18, 'free', 'Free Shipping', 'free_free', 'Free Shipping', 'Free Shipping', 0, 0, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL, 1, 7, '2026-01-31 23:29:19', '2026-01-31 23:29:19', 31),
(19, 'flatrate', 'Flat Rate', 'flatrate_flatrate', 'Flat Rate', 'Flat Rate Shipping', 30, 30, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 30.0000, 30.0000, NULL, 1, 11, '2026-02-02 14:51:47', '2026-02-02 14:51:47', 32),
(20, 'free', 'Free Shipping', 'free_free', 'Free Shipping', 'Free Shipping', 0, 0, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL, 1, 11, '2026-02-02 14:51:47', '2026-02-02 14:51:47', 32),
(23, 'flatrate', 'Flat Rate', 'flatrate_flatrate', 'Flat Rate', 'Flat Rate Shipping', 30, 30, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 30.0000, 30.0000, NULL, 1, 13, '2026-02-02 15:08:06', '2026-02-02 15:08:06', 36),
(24, 'free', 'Free Shipping', 'free_free', 'Free Shipping', 'Free Shipping', 0, 0, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL, 1, 13, '2026-02-02 15:08:06', '2026-02-02 15:08:06', 36);

-- --------------------------------------------------------

--
-- Table structure for table `catalog_rules`
--

CREATE TABLE `catalog_rules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `starts_from` date DEFAULT NULL,
  `ends_till` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `condition_type` tinyint(1) NOT NULL DEFAULT 1,
  `conditions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`conditions`)),
  `end_other_rules` tinyint(1) NOT NULL DEFAULT 0,
  `action_type` varchar(255) DEFAULT NULL,
  `discount_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_rule_channels`
--

CREATE TABLE `catalog_rule_channels` (
  `catalog_rule_id` int(10) UNSIGNED NOT NULL,
  `channel_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_rule_customer_groups`
--

CREATE TABLE `catalog_rule_customer_groups` (
  `catalog_rule_id` int(10) UNSIGNED NOT NULL,
  `customer_group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_rule_products`
--

CREATE TABLE `catalog_rule_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `starts_from` datetime DEFAULT NULL,
  `ends_till` datetime DEFAULT NULL,
  `end_other_rules` tinyint(1) NOT NULL DEFAULT 0,
  `action_type` varchar(255) DEFAULT NULL,
  `discount_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `product_id` int(10) UNSIGNED NOT NULL,
  `customer_group_id` int(10) UNSIGNED NOT NULL,
  `catalog_rule_id` int(10) UNSIGNED NOT NULL,
  `channel_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_rule_product_prices`
--

CREATE TABLE `catalog_rule_product_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `price` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `rule_date` date NOT NULL,
  `starts_from` datetime DEFAULT NULL,
  `ends_till` datetime DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `customer_group_id` int(10) UNSIGNED NOT NULL,
  `catalog_rule_id` int(10) UNSIGNED NOT NULL,
  `channel_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `logo_path` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `display_mode` varchar(255) DEFAULT 'products_and_description',
  `_lft` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `_rgt` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `additional` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional`)),
  `banner_path` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `position`, `logo_path`, `status`, `display_mode`, `_lft`, `_rgt`, `parent_id`, `additional`, `banner_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'category/1/TGYv0C4LbOsdZyTShAiVtPzUa5mNjsHMwet8r7d3.webp', 1, 'products_and_description', 1, 6, NULL, NULL, 'category/1/mOwNicCcwNP30GHLqeVdCQ1yy3eOwRyRfim2gNEG.webp', '2026-01-26 17:42:11', '2026-02-01 01:18:14'),
(2, 1, 'category/electronics.jpg', 1, 'products_and_description', 7, 8, NULL, NULL, NULL, '2026-01-26 19:59:38', '2026-01-26 19:59:38'),
(3, 1, 'category/fashion.png', 1, 'products_and_description', 9, 10, NULL, NULL, NULL, '2026-01-26 19:59:39', '2026-01-26 19:59:39'),
(5, 1, 'category/beauty.png', 1, 'products_and_description', 11, 12, NULL, NULL, NULL, '2026-01-26 19:59:39', '2026-01-26 19:59:39'),
(6, 1, 'category/sport.png', 1, 'products_and_description', 13, 14, NULL, NULL, NULL, '2026-01-26 19:59:39', '2026-01-26 19:59:39'),
(7, 1, 'category/books.jpg', 1, 'products_and_description', 15, 16, NULL, NULL, NULL, '2026-01-26 19:59:39', '2026-01-26 19:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `category_filterable_attributes`
--

CREATE TABLE `category_filterable_attributes` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_filterable_attributes`
--

INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES
(1, 11),
(1, 23),
(1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `url_path` varchar(2048) NOT NULL,
  `description` text DEFAULT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `locale_id` int(10) UNSIGNED DEFAULT NULL,
  `locale` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `name`, `slug`, `url_path`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `locale_id`, `locale`) VALUES
(1, 1, 'MENS', 'mens', '', '<p>وصف قسم الملابس</p>', '', '', '', NULL, 'en'),
(2, 2, 'Electronics', 'electronics', 'electronics', NULL, NULL, NULL, NULL, NULL, 'en'),
(3, 3, 'Fashion', 'fashion', 'fashion', NULL, NULL, NULL, NULL, NULL, 'en'),
(5, 5, 'Beauty', 'beauty', 'beauty', NULL, NULL, NULL, NULL, NULL, 'en'),
(6, 6, 'Sports', 'sports', 'sports', NULL, NULL, NULL, NULL, NULL, 'en'),
(7, 7, 'Books', 'books', 'books', NULL, NULL, NULL, NULL, NULL, 'en'),
(14, 2, 'إلكترونيات', 'electronics', 'electronics', NULL, NULL, NULL, NULL, NULL, 'ar'),
(15, 3, 'أزياء', 'fashion', 'fashion', NULL, NULL, NULL, NULL, NULL, 'ar'),
(17, 5, 'جمال', 'beauty', 'beauty', NULL, NULL, NULL, NULL, NULL, 'ar'),
(18, 6, 'رياضة', 'sports', 'sports', NULL, NULL, NULL, NULL, NULL, 'ar'),
(19, 7, 'كتب', 'books', 'books', NULL, NULL, NULL, NULL, NULL, 'ar');

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `theme` varchar(255) DEFAULT NULL,
  `hostname` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `home_seo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`home_seo`)),
  `is_maintenance_on` tinyint(1) NOT NULL DEFAULT 0,
  `allowed_ips` text DEFAULT NULL,
  `root_category_id` int(10) UNSIGNED DEFAULT NULL,
  `default_locale_id` int(10) UNSIGNED NOT NULL,
  `base_currency_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`id`, `code`, `timezone`, `theme`, `hostname`, `logo`, `favicon`, `home_seo`, `is_maintenance_on`, `allowed_ips`, `root_category_id`, `default_locale_id`, `base_currency_id`, `created_at`, `updated_at`) VALUES
(1, 'default', NULL, 'default', 'http://localhost:8000', 'channel/1/B1oA1klRLPR2i48CtDAjUGOjfTgVpMqubkDwtOBH.png', NULL, NULL, 0, '', 1, 1, 1, '2026-01-26 17:42:11', '2026-01-30 03:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `channel_currencies`
--

CREATE TABLE `channel_currencies` (
  `channel_id` int(10) UNSIGNED NOT NULL,
  `currency_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `channel_currencies`
--

INSERT INTO `channel_currencies` (`channel_id`, `currency_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `channel_inventory_sources`
--

CREATE TABLE `channel_inventory_sources` (
  `channel_id` int(10) UNSIGNED NOT NULL,
  `inventory_source_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `channel_inventory_sources`
--

INSERT INTO `channel_inventory_sources` (`channel_id`, `inventory_source_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `channel_locales`
--

CREATE TABLE `channel_locales` (
  `channel_id` int(10) UNSIGNED NOT NULL,
  `locale_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `channel_locales`
--

INSERT INTO `channel_locales` (`channel_id`, `locale_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `channel_translations`
--

CREATE TABLE `channel_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `channel_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `maintenance_mode_text` text DEFAULT NULL,
  `home_seo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`home_seo`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `channel_translations`
--

INSERT INTO `channel_translations` (`id`, `channel_id`, `locale`, `name`, `description`, `maintenance_mode_text`, `home_seo`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Default', '', NULL, '{\"meta_title\":\"Demo store\",\"meta_description\":\"Demo store meta description\",\"meta_keywords\":\"Demo store meta keyword\"}', NULL, '2026-01-30 03:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `layout` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `layout`, `created_at`, `updated_at`) VALUES
(1, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(2, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(3, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(4, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(5, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(6, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(7, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(8, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(9, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(10, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `cms_page_channels`
--

CREATE TABLE `cms_page_channels` (
  `cms_page_id` int(10) UNSIGNED NOT NULL,
  `channel_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_page_channels`
--

INSERT INTO `cms_page_channels` (`cms_page_id`, `channel_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_page_translations`
--

CREATE TABLE `cms_page_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `url_key` varchar(255) NOT NULL,
  `html_content` longtext DEFAULT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `locale` varchar(255) NOT NULL,
  `cms_page_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_page_translations`
--

INSERT INTO `cms_page_translations` (`id`, `page_title`, `url_key`, `html_content`, `meta_title`, `meta_description`, `meta_keywords`, `locale`, `cms_page_id`) VALUES
(1, 'About Us', 'about-us', '<div class=\"static-container\"><div class=\"mb-5\">About Us Page Content</div></div>', 'about us', '', 'aboutus', 'en', 1),
(2, 'Return Policy', 'return-policy', '<div class=\"static-container\"><div class=\"mb-5\">Return Policy Page Content</div></div>', 'return policy', '', 'return, policy', 'en', 2),
(3, 'Refund Policy', 'refund-policy', '<div class=\"static-container\"><div class=\"mb-5\">Refund Policy Page Content</div></div>', 'Refund policy', '', 'refund, policy', 'en', 3),
(4, 'Terms & Conditions', 'terms-conditions', '<div class=\"static-container\"><div class=\"mb-5\">Terms & Conditions Page Content</div></div>', 'Terms & Conditions', '', 'term, conditions', 'en', 4),
(5, 'Terms of Use', 'terms-of-use', '<div class=\"static-container\"><div class=\"mb-5\">Terms of Use Page Content</div></div>', 'Terms of use', '', 'term, use', 'en', 5),
(6, 'Customer Service', 'customer-service', '<div class=\"static-container\"><div class=\"mb-5\">Customer Service Page Content</div></div>', 'Customer Service', '', 'customer, service', 'en', 6),
(7, 'What\'s New', 'whats-new', '<div class=\"static-container\"><div class=\"mb-5\">What\'s New page content</div></div>', 'What\'s New', '', 'new', 'en', 7),
(8, 'Payment Policy', 'payment-policy', '<div class=\"static-container\"><div class=\"mb-5\">Payment Policy Page Content</div></div>', 'Payment Policy', '', 'payment, policy', 'en', 8),
(9, 'Shipping Policy', 'shipping-policy', '<div class=\"static-container\"><div class=\"mb-5\">Shipping Policy Page Content</div></div>', 'Shipping Policy', '', 'shipping, policy', 'en', 9),
(10, 'Privacy Policy', 'privacy-policy', '<div class=\"static-container\"><div class=\"mb-5\">Privacy Policy Page Content</div></div>', 'Privacy Policy', '', 'privacy, policy', 'en', 10);

-- --------------------------------------------------------

--
-- Table structure for table `company_profiles`
--

CREATE TABLE `company_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compare_items`
--

CREATE TABLE `compare_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_config`
--

CREATE TABLE `core_config` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `channel_code` varchar(255) DEFAULT NULL,
  `locale_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_config`
--

INSERT INTO `core_config` (`id`, `code`, `value`, `channel_code`, `locale_code`, `created_at`, `updated_at`) VALUES
(1, 'sales.checkout.shopping_cart.allow_guest_checkout', '1', NULL, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(2, 'emails.general.notifications.emails.general.notifications.registration', '1', NULL, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(3, 'emails.general.notifications.emails.general.notifications.customer_registration_confirmation_mail_to_admin', '0', NULL, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(4, 'emails.general.notifications.emails.general.notifications.customer_account_credentials', '1', NULL, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(5, 'emails.general.notifications.emails.general.notifications.new_order', '1', NULL, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(6, 'emails.general.notifications.emails.general.notifications.new_order_mail_to_admin', '1', NULL, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(7, 'emails.general.notifications.emails.general.notifications.new_invoice', '1', NULL, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(8, 'emails.general.notifications.emails.general.notifications.new_invoice_mail_to_admin', '0', NULL, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(9, 'emails.general.notifications.emails.general.notifications.new_refund', '1', NULL, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(10, 'emails.general.notifications.emails.general.notifications.new_refund_mail_to_admin', '0', NULL, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(11, 'emails.general.notifications.emails.general.notifications.new_shipment', '1', NULL, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(12, 'emails.general.notifications.emails.general.notifications.new_shipment_mail_to_admin', '0', NULL, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(13, 'emails.general.notifications.emails.general.notifications.new_inventory_source', '1', NULL, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(14, 'emails.general.notifications.emails.general.notifications.cancel_order', '1', NULL, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(15, 'emails.general.notifications.emails.general.notifications.cancel_order_mail_to_admin', '0', NULL, NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(16, 'customer.settings.social_login.enable_facebook', '1', 'default', NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(17, 'customer.settings.social_login.enable_twitter', '1', 'default', NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(18, 'customer.settings.social_login.enable_google', '1', 'default', NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(19, 'customer.settings.social_login.enable_linkedin', '1', 'default', NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(20, 'customer.settings.social_login.enable_github', '1', 'default', NULL, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(21, 'sales.invoice_settings.pdf_print_outs.logo', 'channel/1/B1oA1klRLPR2i48CtDAjUGOjfTgVpMqubkDwtOBH.png', 'default', 'ar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AX', 'Åland Islands'),
(3, 'AL', 'Albania'),
(4, 'DZ', 'Algeria'),
(5, 'AS', 'American Samoa'),
(6, 'AD', 'Andorra'),
(7, 'AO', 'Angola'),
(8, 'AI', 'Anguilla'),
(9, 'AQ', 'Antarctica'),
(10, 'AG', 'Antigua & Barbuda'),
(11, 'AR', 'Argentina'),
(12, 'AM', 'Armenia'),
(13, 'AW', 'Aruba'),
(14, 'AC', 'Ascension Island'),
(15, 'AU', 'Australia'),
(16, 'AT', 'Austria'),
(17, 'AZ', 'Azerbaijan'),
(18, 'BS', 'Bahamas'),
(19, 'BH', 'Bahrain'),
(20, 'BD', 'Bangladesh'),
(21, 'BB', 'Barbados'),
(22, 'BY', 'Belarus'),
(23, 'BE', 'Belgium'),
(24, 'BZ', 'Belize'),
(25, 'BJ', 'Benin'),
(26, 'BM', 'Bermuda'),
(27, 'BT', 'Bhutan'),
(28, 'BO', 'Bolivia'),
(29, 'BA', 'Bosnia & Herzegovina'),
(30, 'BW', 'Botswana'),
(31, 'BR', 'Brazil'),
(32, 'IO', 'British Indian Ocean Territory'),
(33, 'VG', 'British Virgin Islands'),
(34, 'BN', 'Brunei'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'KH', 'Cambodia'),
(39, 'CM', 'Cameroon'),
(40, 'CA', 'Canada'),
(41, 'IC', 'Canary Islands'),
(42, 'CV', 'Cape Verde'),
(43, 'BQ', 'Caribbean Netherlands'),
(44, 'KY', 'Cayman Islands'),
(45, 'CF', 'Central African Republic'),
(46, 'EA', 'Ceuta & Melilla'),
(47, 'TD', 'Chad'),
(48, 'CL', 'Chile'),
(49, 'CN', 'China'),
(50, 'CX', 'Christmas Island'),
(51, 'CC', 'Cocos (Keeling) Islands'),
(52, 'CO', 'Colombia'),
(53, 'KM', 'Comoros'),
(54, 'CG', 'Congo - Brazzaville'),
(55, 'CD', 'Congo - Kinshasa'),
(56, 'CK', 'Cook Islands'),
(57, 'CR', 'Costa Rica'),
(58, 'CI', 'Côte d’Ivoire'),
(59, 'HR', 'Croatia'),
(60, 'CU', 'Cuba'),
(61, 'CW', 'Curaçao'),
(62, 'CY', 'Cyprus'),
(63, 'CZ', 'Czechia'),
(64, 'DK', 'Denmark'),
(65, 'DG', 'Diego Garcia'),
(66, 'DJ', 'Djibouti'),
(67, 'DM', 'Dominica'),
(68, 'DO', 'Dominican Republic'),
(69, 'EC', 'Ecuador'),
(70, 'EG', 'Egypt'),
(71, 'SV', 'El Salvador'),
(72, 'GQ', 'Equatorial Guinea'),
(73, 'ER', 'Eritrea'),
(74, 'EE', 'Estonia'),
(75, 'ET', 'Ethiopia'),
(76, 'EZ', 'Eurozone'),
(77, 'FK', 'Falkland Islands'),
(78, 'FO', 'Faroe Islands'),
(79, 'FJ', 'Fiji'),
(80, 'FI', 'Finland'),
(81, 'FR', 'France'),
(82, 'GF', 'French Guiana'),
(83, 'PF', 'French Polynesia'),
(84, 'TF', 'French Southern Territories'),
(85, 'GA', 'Gabon'),
(86, 'GM', 'Gambia'),
(87, 'GE', 'Georgia'),
(88, 'DE', 'Germany'),
(89, 'GH', 'Ghana'),
(90, 'GI', 'Gibraltar'),
(91, 'GR', 'Greece'),
(92, 'GL', 'Greenland'),
(93, 'GD', 'Grenada'),
(94, 'GP', 'Guadeloupe'),
(95, 'GU', 'Guam'),
(96, 'GT', 'Guatemala'),
(97, 'GG', 'Guernsey'),
(98, 'GN', 'Guinea'),
(99, 'GW', 'Guinea-Bissau'),
(100, 'GY', 'Guyana'),
(101, 'HT', 'Haiti'),
(102, 'HN', 'Honduras'),
(103, 'HK', 'Hong Kong SAR China'),
(104, 'HU', 'Hungary'),
(105, 'IS', 'Iceland'),
(106, 'IN', 'India'),
(107, 'ID', 'Indonesia'),
(108, 'IR', 'Iran'),
(109, 'IQ', 'Iraq'),
(110, 'IE', 'Ireland'),
(111, 'IM', 'Isle of Man'),
(112, 'IL', 'Israel'),
(113, 'IT', 'Italy'),
(114, 'JM', 'Jamaica'),
(115, 'JP', 'Japan'),
(116, 'JE', 'Jersey'),
(117, 'JO', 'Jordan'),
(118, 'KZ', 'Kazakhstan'),
(119, 'KE', 'Kenya'),
(120, 'KI', 'Kiribati'),
(121, 'XK', 'Kosovo'),
(122, 'KW', 'Kuwait'),
(123, 'KG', 'Kyrgyzstan'),
(124, 'LA', 'Laos'),
(125, 'LV', 'Latvia'),
(126, 'LB', 'Lebanon'),
(127, 'LS', 'Lesotho'),
(128, 'LR', 'Liberia'),
(129, 'LY', 'Libya'),
(130, 'LI', 'Liechtenstein'),
(131, 'LT', 'Lithuania'),
(132, 'LU', 'Luxembourg'),
(133, 'MO', 'Macau SAR China'),
(134, 'MK', 'Macedonia'),
(135, 'MG', 'Madagascar'),
(136, 'MW', 'Malawi'),
(137, 'MY', 'Malaysia'),
(138, 'MV', 'Maldives'),
(139, 'ML', 'Mali'),
(140, 'MT', 'Malta'),
(141, 'MH', 'Marshall Islands'),
(142, 'MQ', 'Martinique'),
(143, 'MR', 'Mauritania'),
(144, 'MU', 'Mauritius'),
(145, 'YT', 'Mayotte'),
(146, 'MX', 'Mexico'),
(147, 'FM', 'Micronesia'),
(148, 'MD', 'Moldova'),
(149, 'MC', 'Monaco'),
(150, 'MN', 'Mongolia'),
(151, 'ME', 'Montenegro'),
(152, 'MS', 'Montserrat'),
(153, 'MA', 'Morocco'),
(154, 'MZ', 'Mozambique'),
(155, 'MM', 'Myanmar (Burma)'),
(156, 'NA', 'Namibia'),
(157, 'NR', 'Nauru'),
(158, 'NP', 'Nepal'),
(159, 'NL', 'Netherlands'),
(160, 'NC', 'New Caledonia'),
(161, 'NZ', 'New Zealand'),
(162, 'NI', 'Nicaragua'),
(163, 'NE', 'Niger'),
(164, 'NG', 'Nigeria'),
(165, 'NU', 'Niue'),
(166, 'NF', 'Norfolk Island'),
(167, 'KP', 'North Korea'),
(168, 'MP', 'Northern Mariana Islands'),
(169, 'NO', 'Norway'),
(170, 'OM', 'Oman'),
(171, 'PK', 'Pakistan'),
(172, 'PW', 'Palau'),
(173, 'PS', 'Palestinian Territories'),
(174, 'PA', 'Panama'),
(175, 'PG', 'Papua New Guinea'),
(176, 'PY', 'Paraguay'),
(177, 'PE', 'Peru'),
(178, 'PH', 'Philippines'),
(179, 'PN', 'Pitcairn Islands'),
(180, 'PL', 'Poland'),
(181, 'PT', 'Portugal'),
(182, 'PR', 'Puerto Rico'),
(183, 'QA', 'Qatar'),
(184, 'RE', 'Réunion'),
(185, 'RO', 'Romania'),
(186, 'RU', 'Russia'),
(187, 'RW', 'Rwanda'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'São Tomé & Príncipe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SX', 'Sint Maarten'),
(198, 'SK', 'Slovakia'),
(199, 'SI', 'Slovenia'),
(200, 'SB', 'Solomon Islands'),
(201, 'SO', 'Somalia'),
(202, 'ZA', 'South Africa'),
(203, 'GS', 'South Georgia & South Sandwich Islands'),
(204, 'KR', 'South Korea'),
(205, 'SS', 'South Sudan'),
(206, 'ES', 'Spain'),
(207, 'LK', 'Sri Lanka'),
(208, 'BL', 'St. Barthélemy'),
(209, 'SH', 'St. Helena'),
(210, 'KN', 'St. Kitts & Nevis'),
(211, 'LC', 'St. Lucia'),
(212, 'MF', 'St. Martin'),
(213, 'PM', 'St. Pierre & Miquelon'),
(214, 'VC', 'St. Vincent & Grenadines'),
(215, 'SD', 'Sudan'),
(216, 'SR', 'Suriname'),
(217, 'SJ', 'Svalbard & Jan Mayen'),
(218, 'SZ', 'Swaziland'),
(219, 'SE', 'Sweden'),
(220, 'CH', 'Switzerland'),
(221, 'SY', 'Syria'),
(222, 'TW', 'Taiwan'),
(223, 'TJ', 'Tajikistan'),
(224, 'TZ', 'Tanzania'),
(225, 'TH', 'Thailand'),
(226, 'TL', 'Timor-Leste'),
(227, 'TG', 'Togo'),
(228, 'TK', 'Tokelau'),
(229, 'TO', 'Tonga'),
(230, 'TT', 'Trinidad & Tobago'),
(231, 'TA', 'Tristan da Cunha'),
(232, 'TN', 'Tunisia'),
(233, 'TR', 'Turkey'),
(234, 'TM', 'Turkmenistan'),
(235, 'TC', 'Turks & Caicos Islands'),
(236, 'TV', 'Tuvalu'),
(237, 'UM', 'U.S. Outlying Islands'),
(238, 'VI', 'U.S. Virgin Islands'),
(239, 'UG', 'Uganda'),
(240, 'UA', 'Ukraine'),
(241, 'AE', 'United Arab Emirates'),
(242, 'GB', 'United Kingdom'),
(244, 'US', 'United States'),
(245, 'UY', 'Uruguay'),
(246, 'UZ', 'Uzbekistan'),
(247, 'VU', 'Vanuatu'),
(248, 'VA', 'Vatican City'),
(249, 'VE', 'Venezuela'),
(250, 'VN', 'Vietnam'),
(251, 'WF', 'Wallis & Futuna'),
(252, 'EH', 'Western Sahara'),
(253, 'YE', 'Yemen'),
(254, 'ZM', 'Zambia'),
(255, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `country_states`
--

CREATE TABLE `country_states` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `default_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_states`
--

INSERT INTO `country_states` (`id`, `country_id`, `country_code`, `code`, `default_name`) VALUES
(1, 244, 'US', 'AL', 'Alabama'),
(2, 244, 'US', 'AK', 'Alaska'),
(3, 244, 'US', 'AS', 'American Samoa'),
(4, 244, 'US', 'AZ', 'Arizona'),
(5, 244, 'US', 'AR', 'Arkansas'),
(6, 244, 'US', 'AE', 'Armed Forces Africa'),
(7, 244, 'US', 'AA', 'Armed Forces Americas'),
(8, 244, 'US', 'AE', 'Armed Forces Canada'),
(9, 244, 'US', 'AE', 'Armed Forces Europe'),
(10, 244, 'US', 'AE', 'Armed Forces Middle East'),
(11, 244, 'US', 'AP', 'Armed Forces Pacific'),
(12, 244, 'US', 'CA', 'California'),
(13, 244, 'US', 'CO', 'Colorado'),
(14, 244, 'US', 'CT', 'Connecticut'),
(15, 244, 'US', 'DE', 'Delaware'),
(16, 244, 'US', 'DC', 'District of Columbia'),
(17, 244, 'US', 'FM', 'Federated States Of Micronesia'),
(18, 244, 'US', 'FL', 'Florida'),
(19, 244, 'US', 'GA', 'Georgia'),
(20, 244, 'US', 'GU', 'Guam'),
(21, 244, 'US', 'HI', 'Hawaii'),
(22, 244, 'US', 'ID', 'Idaho'),
(23, 244, 'US', 'IL', 'Illinois'),
(24, 244, 'US', 'IN', 'Indiana'),
(25, 244, 'US', 'IA', 'Iowa'),
(26, 244, 'US', 'KS', 'Kansas'),
(27, 244, 'US', 'KY', 'Kentucky'),
(28, 244, 'US', 'LA', 'Louisiana'),
(29, 244, 'US', 'ME', 'Maine'),
(30, 244, 'US', 'MH', 'Marshall Islands'),
(31, 244, 'US', 'MD', 'Maryland'),
(32, 244, 'US', 'MA', 'Massachusetts'),
(33, 244, 'US', 'MI', 'Michigan'),
(34, 244, 'US', 'MN', 'Minnesota'),
(35, 244, 'US', 'MS', 'Mississippi'),
(36, 244, 'US', 'MO', 'Missouri'),
(37, 244, 'US', 'MT', 'Montana'),
(38, 244, 'US', 'NE', 'Nebraska'),
(39, 244, 'US', 'NV', 'Nevada'),
(40, 244, 'US', 'NH', 'New Hampshire'),
(41, 244, 'US', 'NJ', 'New Jersey'),
(42, 244, 'US', 'NM', 'New Mexico'),
(43, 244, 'US', 'NY', 'New York'),
(44, 244, 'US', 'NC', 'North Carolina'),
(45, 244, 'US', 'ND', 'North Dakota'),
(46, 244, 'US', 'MP', 'Northern Mariana Islands'),
(47, 244, 'US', 'OH', 'Ohio'),
(48, 244, 'US', 'OK', 'Oklahoma'),
(49, 244, 'US', 'OR', 'Oregon'),
(50, 244, 'US', 'PW', 'Palau'),
(51, 244, 'US', 'PA', 'Pennsylvania'),
(52, 244, 'US', 'PR', 'Puerto Rico'),
(53, 244, 'US', 'RI', 'Rhode Island'),
(54, 244, 'US', 'SC', 'South Carolina'),
(55, 244, 'US', 'SD', 'South Dakota'),
(56, 244, 'US', 'TN', 'Tennessee'),
(57, 244, 'US', 'TX', 'Texas'),
(58, 244, 'US', 'UT', 'Utah'),
(59, 244, 'US', 'VT', 'Vermont'),
(60, 244, 'US', 'VI', 'Virgin Islands'),
(61, 244, 'US', 'VA', 'Virginia'),
(62, 244, 'US', 'WA', 'Washington'),
(63, 244, 'US', 'WV', 'West Virginia'),
(64, 244, 'US', 'WI', 'Wisconsin'),
(65, 244, 'US', 'WY', 'Wyoming'),
(66, 40, 'CA', 'AB', 'Alberta'),
(67, 40, 'CA', 'BC', 'British Columbia'),
(68, 40, 'CA', 'MB', 'Manitoba'),
(69, 40, 'CA', 'NL', 'Newfoundland and Labrador'),
(70, 40, 'CA', 'NB', 'New Brunswick'),
(71, 40, 'CA', 'NS', 'Nova Scotia'),
(72, 40, 'CA', 'NT', 'Northwest Territories'),
(73, 40, 'CA', 'NU', 'Nunavut'),
(74, 40, 'CA', 'ON', 'Ontario'),
(75, 40, 'CA', 'PE', 'Prince Edward Island'),
(76, 40, 'CA', 'QC', 'Quebec'),
(77, 40, 'CA', 'SK', 'Saskatchewan'),
(78, 40, 'CA', 'YT', 'Yukon Territory'),
(79, 88, 'DE', 'NDS', 'Niedersachsen'),
(80, 88, 'DE', 'BAW', 'Baden-Württemberg'),
(81, 88, 'DE', 'BAY', 'Bayern'),
(82, 88, 'DE', 'BER', 'Berlin'),
(83, 88, 'DE', 'BRG', 'Brandenburg'),
(84, 88, 'DE', 'BRE', 'Bremen'),
(85, 88, 'DE', 'HAM', 'Hamburg'),
(86, 88, 'DE', 'HES', 'Hessen'),
(87, 88, 'DE', 'MEC', 'Mecklenburg-Vorpommern'),
(88, 88, 'DE', 'NRW', 'Nordrhein-Westfalen'),
(89, 88, 'DE', 'RHE', 'Rheinland-Pfalz'),
(90, 88, 'DE', 'SAR', 'Saarland'),
(91, 88, 'DE', 'SAS', 'Sachsen'),
(92, 88, 'DE', 'SAC', 'Sachsen-Anhalt'),
(93, 88, 'DE', 'SCN', 'Schleswig-Holstein'),
(94, 88, 'DE', 'THE', 'Thüringen'),
(95, 16, 'AT', 'WI', 'Wien'),
(96, 16, 'AT', 'NO', 'Niederösterreich'),
(97, 16, 'AT', 'OO', 'Oberösterreich'),
(98, 16, 'AT', 'SB', 'Salzburg'),
(99, 16, 'AT', 'KN', 'Kärnten'),
(100, 16, 'AT', 'ST', 'Steiermark'),
(101, 16, 'AT', 'TI', 'Tirol'),
(102, 16, 'AT', 'BL', 'Burgenland'),
(103, 16, 'AT', 'VB', 'Vorarlberg'),
(104, 220, 'CH', 'AG', 'Aargau'),
(105, 220, 'CH', 'AI', 'Appenzell Innerrhoden'),
(106, 220, 'CH', 'AR', 'Appenzell Ausserrhoden'),
(107, 220, 'CH', 'BE', 'Bern'),
(108, 220, 'CH', 'BL', 'Basel-Landschaft'),
(109, 220, 'CH', 'BS', 'Basel-Stadt'),
(110, 220, 'CH', 'FR', 'Freiburg'),
(111, 220, 'CH', 'GE', 'Genf'),
(112, 220, 'CH', 'GL', 'Glarus'),
(113, 220, 'CH', 'GR', 'Graubünden'),
(114, 220, 'CH', 'JU', 'Jura'),
(115, 220, 'CH', 'LU', 'Luzern'),
(116, 220, 'CH', 'NE', 'Neuenburg'),
(117, 220, 'CH', 'NW', 'Nidwalden'),
(118, 220, 'CH', 'OW', 'Obwalden'),
(119, 220, 'CH', 'SG', 'St. Gallen'),
(120, 220, 'CH', 'SH', 'Schaffhausen'),
(121, 220, 'CH', 'SO', 'Solothurn'),
(122, 220, 'CH', 'SZ', 'Schwyz'),
(123, 220, 'CH', 'TG', 'Thurgau'),
(124, 220, 'CH', 'TI', 'Tessin'),
(125, 220, 'CH', 'UR', 'Uri'),
(126, 220, 'CH', 'VD', 'Waadt'),
(127, 220, 'CH', 'VS', 'Wallis'),
(128, 220, 'CH', 'ZG', 'Zug'),
(129, 220, 'CH', 'ZH', 'Zürich'),
(130, 206, 'ES', 'A Coruсa', 'A Coruña'),
(131, 206, 'ES', 'Alava', 'Alava'),
(132, 206, 'ES', 'Albacete', 'Albacete'),
(133, 206, 'ES', 'Alicante', 'Alicante'),
(134, 206, 'ES', 'Almeria', 'Almeria'),
(135, 206, 'ES', 'Asturias', 'Asturias'),
(136, 206, 'ES', 'Avila', 'Avila'),
(137, 206, 'ES', 'Badajoz', 'Badajoz'),
(138, 206, 'ES', 'Baleares', 'Baleares'),
(139, 206, 'ES', 'Barcelona', 'Barcelona'),
(140, 206, 'ES', 'Burgos', 'Burgos'),
(141, 206, 'ES', 'Caceres', 'Caceres'),
(142, 206, 'ES', 'Cadiz', 'Cadiz'),
(143, 206, 'ES', 'Cantabria', 'Cantabria'),
(144, 206, 'ES', 'Castellon', 'Castellon'),
(145, 206, 'ES', 'Ceuta', 'Ceuta'),
(146, 206, 'ES', 'Ciudad Real', 'Ciudad Real'),
(147, 206, 'ES', 'Cordoba', 'Cordoba'),
(148, 206, 'ES', 'Cuenca', 'Cuenca'),
(149, 206, 'ES', 'Girona', 'Girona'),
(150, 206, 'ES', 'Granada', 'Granada'),
(151, 206, 'ES', 'Guadalajara', 'Guadalajara'),
(152, 206, 'ES', 'Guipuzcoa', 'Guipuzcoa'),
(153, 206, 'ES', 'Huelva', 'Huelva'),
(154, 206, 'ES', 'Huesca', 'Huesca'),
(155, 206, 'ES', 'Jaen', 'Jaen'),
(156, 206, 'ES', 'La Rioja', 'La Rioja'),
(157, 206, 'ES', 'Las Palmas', 'Las Palmas'),
(158, 206, 'ES', 'Leon', 'Leon'),
(159, 206, 'ES', 'Lleida', 'Lleida'),
(160, 206, 'ES', 'Lugo', 'Lugo'),
(161, 206, 'ES', 'Madrid', 'Madrid'),
(162, 206, 'ES', 'Malaga', 'Malaga'),
(163, 206, 'ES', 'Melilla', 'Melilla'),
(164, 206, 'ES', 'Murcia', 'Murcia'),
(165, 206, 'ES', 'Navarra', 'Navarra'),
(166, 206, 'ES', 'Ourense', 'Ourense'),
(167, 206, 'ES', 'Palencia', 'Palencia'),
(168, 206, 'ES', 'Pontevedra', 'Pontevedra'),
(169, 206, 'ES', 'Salamanca', 'Salamanca'),
(170, 206, 'ES', 'Santa Cruz de Tenerife', 'Santa Cruz de Tenerife'),
(171, 206, 'ES', 'Segovia', 'Segovia'),
(172, 206, 'ES', 'Sevilla', 'Sevilla'),
(173, 206, 'ES', 'Soria', 'Soria'),
(174, 206, 'ES', 'Tarragona', 'Tarragona'),
(175, 206, 'ES', 'Teruel', 'Teruel'),
(176, 206, 'ES', 'Toledo', 'Toledo'),
(177, 206, 'ES', 'Valencia', 'Valencia'),
(178, 206, 'ES', 'Valladolid', 'Valladolid'),
(179, 206, 'ES', 'Vizcaya', 'Vizcaya'),
(180, 206, 'ES', 'Zamora', 'Zamora'),
(181, 206, 'ES', 'Zaragoza', 'Zaragoza'),
(182, 81, 'FR', '1', 'Ain'),
(183, 81, 'FR', '2', 'Aisne'),
(184, 81, 'FR', '3', 'Allier'),
(185, 81, 'FR', '4', 'Alpes-de-Haute-Provence'),
(186, 81, 'FR', '5', 'Hautes-Alpes'),
(187, 81, 'FR', '6', 'Alpes-Maritimes'),
(188, 81, 'FR', '7', 'Ardèche'),
(189, 81, 'FR', '8', 'Ardennes'),
(190, 81, 'FR', '9', 'Ariège'),
(191, 81, 'FR', '10', 'Aube'),
(192, 81, 'FR', '11', 'Aude'),
(193, 81, 'FR', '12', 'Aveyron'),
(194, 81, 'FR', '13', 'Bouches-du-Rhône'),
(195, 81, 'FR', '14', 'Calvados'),
(196, 81, 'FR', '15', 'Cantal'),
(197, 81, 'FR', '16', 'Charente'),
(198, 81, 'FR', '17', 'Charente-Maritime'),
(199, 81, 'FR', '18', 'Cher'),
(200, 81, 'FR', '19', 'Corrèze'),
(201, 81, 'FR', '2A', 'Corse-du-Sud'),
(202, 81, 'FR', '2B', 'Haute-Corse'),
(203, 81, 'FR', '21', 'Côte-d\'Or'),
(204, 81, 'FR', '22', 'Côtes-d\'Armor'),
(205, 81, 'FR', '23', 'Creuse'),
(206, 81, 'FR', '24', 'Dordogne'),
(207, 81, 'FR', '25', 'Doubs'),
(208, 81, 'FR', '26', 'Drôme'),
(209, 81, 'FR', '27', 'Eure'),
(210, 81, 'FR', '28', 'Eure-et-Loir'),
(211, 81, 'FR', '29', 'Finistère'),
(212, 81, 'FR', '30', 'Gard'),
(213, 81, 'FR', '31', 'Haute-Garonne'),
(214, 81, 'FR', '32', 'Gers'),
(215, 81, 'FR', '33', 'Gironde'),
(216, 81, 'FR', '34', 'Hérault'),
(217, 81, 'FR', '35', 'Ille-et-Vilaine'),
(218, 81, 'FR', '36', 'Indre'),
(219, 81, 'FR', '37', 'Indre-et-Loire'),
(220, 81, 'FR', '38', 'Isère'),
(221, 81, 'FR', '39', 'Jura'),
(222, 81, 'FR', '40', 'Landes'),
(223, 81, 'FR', '41', 'Loir-et-Cher'),
(224, 81, 'FR', '42', 'Loire'),
(225, 81, 'FR', '43', 'Haute-Loire'),
(226, 81, 'FR', '44', 'Loire-Atlantique'),
(227, 81, 'FR', '45', 'Loiret'),
(228, 81, 'FR', '46', 'Lot'),
(229, 81, 'FR', '47', 'Lot-et-Garonne'),
(230, 81, 'FR', '48', 'Lozère'),
(231, 81, 'FR', '49', 'Maine-et-Loire'),
(232, 81, 'FR', '50', 'Manche'),
(233, 81, 'FR', '51', 'Marne'),
(234, 81, 'FR', '52', 'Haute-Marne'),
(235, 81, 'FR', '53', 'Mayenne'),
(236, 81, 'FR', '54', 'Meurthe-et-Moselle'),
(237, 81, 'FR', '55', 'Meuse'),
(238, 81, 'FR', '56', 'Morbihan'),
(239, 81, 'FR', '57', 'Moselle'),
(240, 81, 'FR', '58', 'Nièvre'),
(241, 81, 'FR', '59', 'Nord'),
(242, 81, 'FR', '60', 'Oise'),
(243, 81, 'FR', '61', 'Orne'),
(244, 81, 'FR', '62', 'Pas-de-Calais'),
(245, 81, 'FR', '63', 'Puy-de-Dôme'),
(246, 81, 'FR', '64', 'Pyrénées-Atlantiques'),
(247, 81, 'FR', '65', 'Hautes-Pyrénées'),
(248, 81, 'FR', '66', 'Pyrénées-Orientales'),
(249, 81, 'FR', '67', 'Bas-Rhin'),
(250, 81, 'FR', '68', 'Haut-Rhin'),
(251, 81, 'FR', '69', 'Rhône'),
(252, 81, 'FR', '70', 'Haute-Saône'),
(253, 81, 'FR', '71', 'Saône-et-Loire'),
(254, 81, 'FR', '72', 'Sarthe'),
(255, 81, 'FR', '73', 'Savoie'),
(256, 81, 'FR', '74', 'Haute-Savoie'),
(257, 81, 'FR', '75', 'Paris'),
(258, 81, 'FR', '76', 'Seine-Maritime'),
(259, 81, 'FR', '77', 'Seine-et-Marne'),
(260, 81, 'FR', '78', 'Yvelines'),
(261, 81, 'FR', '79', 'Deux-Sèvres'),
(262, 81, 'FR', '80', 'Somme'),
(263, 81, 'FR', '81', 'Tarn'),
(264, 81, 'FR', '82', 'Tarn-et-Garonne'),
(265, 81, 'FR', '83', 'Var'),
(266, 81, 'FR', '84', 'Vaucluse'),
(267, 81, 'FR', '85', 'Vendée'),
(268, 81, 'FR', '86', 'Vienne'),
(269, 81, 'FR', '87', 'Haute-Vienne'),
(270, 81, 'FR', '88', 'Vosges'),
(271, 81, 'FR', '89', 'Yonne'),
(272, 81, 'FR', '90', 'Territoire-de-Belfort'),
(273, 81, 'FR', '91', 'Essonne'),
(274, 81, 'FR', '92', 'Hauts-de-Seine'),
(275, 81, 'FR', '93', 'Seine-Saint-Denis'),
(276, 81, 'FR', '94', 'Val-de-Marne'),
(277, 81, 'FR', '95', 'Val-d\'Oise'),
(278, 185, 'RO', 'AB', 'Alba'),
(279, 185, 'RO', 'AR', 'Arad'),
(280, 185, 'RO', 'AG', 'Argeş'),
(281, 185, 'RO', 'BC', 'Bacău'),
(282, 185, 'RO', 'BH', 'Bihor'),
(283, 185, 'RO', 'BN', 'Bistriţa-Năsăud'),
(284, 185, 'RO', 'BT', 'Botoşani'),
(285, 185, 'RO', 'BV', 'Braşov'),
(286, 185, 'RO', 'BR', 'Brăila'),
(287, 185, 'RO', 'B', 'Bucureşti'),
(288, 185, 'RO', 'BZ', 'Buzău'),
(289, 185, 'RO', 'CS', 'Caraş-Severin'),
(290, 185, 'RO', 'CL', 'Călăraşi'),
(291, 185, 'RO', 'CJ', 'Cluj'),
(292, 185, 'RO', 'CT', 'Constanţa'),
(293, 185, 'RO', 'CV', 'Covasna'),
(294, 185, 'RO', 'DB', 'Dâmboviţa'),
(295, 185, 'RO', 'DJ', 'Dolj'),
(296, 185, 'RO', 'GL', 'Galaţi'),
(297, 185, 'RO', 'GR', 'Giurgiu'),
(298, 185, 'RO', 'GJ', 'Gorj'),
(299, 185, 'RO', 'HR', 'Harghita'),
(300, 185, 'RO', 'HD', 'Hunedoara'),
(301, 185, 'RO', 'IL', 'Ialomiţa'),
(302, 185, 'RO', 'IS', 'Iaşi'),
(303, 185, 'RO', 'IF', 'Ilfov'),
(304, 185, 'RO', 'MM', 'Maramureş'),
(305, 185, 'RO', 'MH', 'Mehedinţi'),
(306, 185, 'RO', 'MS', 'Mureş'),
(307, 185, 'RO', 'NT', 'Neamţ'),
(308, 185, 'RO', 'OT', 'Olt'),
(309, 185, 'RO', 'PH', 'Prahova'),
(310, 185, 'RO', 'SM', 'Satu-Mare'),
(311, 185, 'RO', 'SJ', 'Sălaj'),
(312, 185, 'RO', 'SB', 'Sibiu'),
(313, 185, 'RO', 'SV', 'Suceava'),
(314, 185, 'RO', 'TR', 'Teleorman'),
(315, 185, 'RO', 'TM', 'Timiş'),
(316, 185, 'RO', 'TL', 'Tulcea'),
(317, 185, 'RO', 'VS', 'Vaslui'),
(318, 185, 'RO', 'VL', 'Vâlcea'),
(319, 185, 'RO', 'VN', 'Vrancea'),
(320, 80, 'FI', 'Lappi', 'Lappi'),
(321, 80, 'FI', 'Pohjois-Pohjanmaa', 'Pohjois-Pohjanmaa'),
(322, 80, 'FI', 'Kainuu', 'Kainuu'),
(323, 80, 'FI', 'Pohjois-Karjala', 'Pohjois-Karjala'),
(324, 80, 'FI', 'Pohjois-Savo', 'Pohjois-Savo'),
(325, 80, 'FI', 'Etelä-Savo', 'Etelä-Savo'),
(326, 80, 'FI', 'Etelä-Pohjanmaa', 'Etelä-Pohjanmaa'),
(327, 80, 'FI', 'Pohjanmaa', 'Pohjanmaa'),
(328, 80, 'FI', 'Pirkanmaa', 'Pirkanmaa'),
(329, 80, 'FI', 'Satakunta', 'Satakunta'),
(330, 80, 'FI', 'Keski-Pohjanmaa', 'Keski-Pohjanmaa'),
(331, 80, 'FI', 'Keski-Suomi', 'Keski-Suomi'),
(332, 80, 'FI', 'Varsinais-Suomi', 'Varsinais-Suomi'),
(333, 80, 'FI', 'Etelä-Karjala', 'Etelä-Karjala'),
(334, 80, 'FI', 'Päijät-Häme', 'Päijät-Häme'),
(335, 80, 'FI', 'Kanta-Häme', 'Kanta-Häme'),
(336, 80, 'FI', 'Uusimaa', 'Uusimaa'),
(337, 80, 'FI', 'Itä-Uusimaa', 'Itä-Uusimaa'),
(338, 80, 'FI', 'Kymenlaakso', 'Kymenlaakso'),
(339, 80, 'FI', 'Ahvenanmaa', 'Ahvenanmaa'),
(340, 74, 'EE', 'EE-37', 'Harjumaa'),
(341, 74, 'EE', 'EE-39', 'Hiiumaa'),
(342, 74, 'EE', 'EE-44', 'Ida-Virumaa'),
(343, 74, 'EE', 'EE-49', 'Jõgevamaa'),
(344, 74, 'EE', 'EE-51', 'Järvamaa'),
(345, 74, 'EE', 'EE-57', 'Läänemaa'),
(346, 74, 'EE', 'EE-59', 'Lääne-Virumaa'),
(347, 74, 'EE', 'EE-65', 'Põlvamaa'),
(348, 74, 'EE', 'EE-67', 'Pärnumaa'),
(349, 74, 'EE', 'EE-70', 'Raplamaa'),
(350, 74, 'EE', 'EE-74', 'Saaremaa'),
(351, 74, 'EE', 'EE-78', 'Tartumaa'),
(352, 74, 'EE', 'EE-82', 'Valgamaa'),
(353, 74, 'EE', 'EE-84', 'Viljandimaa'),
(354, 74, 'EE', 'EE-86', 'Võrumaa'),
(355, 125, 'LV', 'LV-DGV', 'Daugavpils'),
(356, 125, 'LV', 'LV-JEL', 'Jelgava'),
(357, 125, 'LV', 'Jēkabpils', 'Jēkabpils'),
(358, 125, 'LV', 'LV-JUR', 'Jūrmala'),
(359, 125, 'LV', 'LV-LPX', 'Liepāja'),
(360, 125, 'LV', 'LV-LE', 'Liepājas novads'),
(361, 125, 'LV', 'LV-REZ', 'Rēzekne'),
(362, 125, 'LV', 'LV-RIX', 'Rīga'),
(363, 125, 'LV', 'LV-RI', 'Rīgas novads'),
(364, 125, 'LV', 'Valmiera', 'Valmiera'),
(365, 125, 'LV', 'LV-VEN', 'Ventspils'),
(366, 125, 'LV', 'Aglonas novads', 'Aglonas novads'),
(367, 125, 'LV', 'LV-AI', 'Aizkraukles novads'),
(368, 125, 'LV', 'Aizputes novads', 'Aizputes novads'),
(369, 125, 'LV', 'Aknīstes novads', 'Aknīstes novads'),
(370, 125, 'LV', 'Alojas novads', 'Alojas novads'),
(371, 125, 'LV', 'Alsungas novads', 'Alsungas novads'),
(372, 125, 'LV', 'LV-AL', 'Alūksnes novads'),
(373, 125, 'LV', 'Amatas novads', 'Amatas novads'),
(374, 125, 'LV', 'Apes novads', 'Apes novads'),
(375, 125, 'LV', 'Auces novads', 'Auces novads'),
(376, 125, 'LV', 'Babītes novads', 'Babītes novads'),
(377, 125, 'LV', 'Baldones novads', 'Baldones novads'),
(378, 125, 'LV', 'Baltinavas novads', 'Baltinavas novads'),
(379, 125, 'LV', 'LV-BL', 'Balvu novads'),
(380, 125, 'LV', 'LV-BU', 'Bauskas novads'),
(381, 125, 'LV', 'Beverīnas novads', 'Beverīnas novads'),
(382, 125, 'LV', 'Brocēnu novads', 'Brocēnu novads'),
(383, 125, 'LV', 'Burtnieku novads', 'Burtnieku novads'),
(384, 125, 'LV', 'Carnikavas novads', 'Carnikavas novads'),
(385, 125, 'LV', 'Cesvaines novads', 'Cesvaines novads'),
(386, 125, 'LV', 'Ciblas novads', 'Ciblas novads'),
(387, 125, 'LV', 'LV-CE', 'Cēsu novads'),
(388, 125, 'LV', 'Dagdas novads', 'Dagdas novads'),
(389, 125, 'LV', 'LV-DA', 'Daugavpils novads'),
(390, 125, 'LV', 'LV-DO', 'Dobeles novads'),
(391, 125, 'LV', 'Dundagas novads', 'Dundagas novads'),
(392, 125, 'LV', 'Durbes novads', 'Durbes novads'),
(393, 125, 'LV', 'Engures novads', 'Engures novads'),
(394, 125, 'LV', 'Garkalnes novads', 'Garkalnes novads'),
(395, 125, 'LV', 'Grobiņas novads', 'Grobiņas novads'),
(396, 125, 'LV', 'LV-GU', 'Gulbenes novads'),
(397, 125, 'LV', 'Iecavas novads', 'Iecavas novads'),
(398, 125, 'LV', 'Ikšķiles novads', 'Ikšķiles novads'),
(399, 125, 'LV', 'Ilūkstes novads', 'Ilūkstes novads'),
(400, 125, 'LV', 'Inčukalna novads', 'Inčukalna novads'),
(401, 125, 'LV', 'Jaunjelgavas novads', 'Jaunjelgavas novads'),
(402, 125, 'LV', 'Jaunpiebalgas novads', 'Jaunpiebalgas novads'),
(403, 125, 'LV', 'Jaunpils novads', 'Jaunpils novads'),
(404, 125, 'LV', 'LV-JL', 'Jelgavas novads'),
(405, 125, 'LV', 'LV-JK', 'Jēkabpils novads'),
(406, 125, 'LV', 'Kandavas novads', 'Kandavas novads'),
(407, 125, 'LV', 'Kokneses novads', 'Kokneses novads'),
(408, 125, 'LV', 'Krimuldas novads', 'Krimuldas novads'),
(409, 125, 'LV', 'Krustpils novads', 'Krustpils novads'),
(410, 125, 'LV', 'LV-KR', 'Krāslavas novads'),
(411, 125, 'LV', 'LV-KU', 'Kuldīgas novads'),
(412, 125, 'LV', 'Kārsavas novads', 'Kārsavas novads'),
(413, 125, 'LV', 'Lielvārdes novads', 'Lielvārdes novads'),
(414, 125, 'LV', 'LV-LM', 'Limbažu novads'),
(415, 125, 'LV', 'Lubānas novads', 'Lubānas novads'),
(416, 125, 'LV', 'LV-LU', 'Ludzas novads'),
(417, 125, 'LV', 'Līgatnes novads', 'Līgatnes novads'),
(418, 125, 'LV', 'Līvānu novads', 'Līvānu novads'),
(419, 125, 'LV', 'LV-MA', 'Madonas novads'),
(420, 125, 'LV', 'Mazsalacas novads', 'Mazsalacas novads'),
(421, 125, 'LV', 'Mālpils novads', 'Mālpils novads'),
(422, 125, 'LV', 'Mārupes novads', 'Mārupes novads'),
(423, 125, 'LV', 'Naukšēnu novads', 'Naukšēnu novads'),
(424, 125, 'LV', 'Neretas novads', 'Neretas novads'),
(425, 125, 'LV', 'Nīcas novads', 'Nīcas novads'),
(426, 125, 'LV', 'LV-OG', 'Ogres novads'),
(427, 125, 'LV', 'Olaines novads', 'Olaines novads'),
(428, 125, 'LV', 'Ozolnieku novads', 'Ozolnieku novads'),
(429, 125, 'LV', 'LV-PR', 'Preiļu novads'),
(430, 125, 'LV', 'Priekules novads', 'Priekules novads'),
(431, 125, 'LV', 'Priekuļu novads', 'Priekuļu novads'),
(432, 125, 'LV', 'Pārgaujas novads', 'Pārgaujas novads'),
(433, 125, 'LV', 'Pāvilostas novads', 'Pāvilostas novads'),
(434, 125, 'LV', 'Pļaviņu novads', 'Pļaviņu novads'),
(435, 125, 'LV', 'Raunas novads', 'Raunas novads'),
(436, 125, 'LV', 'Riebiņu novads', 'Riebiņu novads'),
(437, 125, 'LV', 'Rojas novads', 'Rojas novads'),
(438, 125, 'LV', 'Ropažu novads', 'Ropažu novads'),
(439, 125, 'LV', 'Rucavas novads', 'Rucavas novads'),
(440, 125, 'LV', 'Rugāju novads', 'Rugāju novads'),
(441, 125, 'LV', 'Rundāles novads', 'Rundāles novads'),
(442, 125, 'LV', 'LV-RE', 'Rēzeknes novads'),
(443, 125, 'LV', 'Rūjienas novads', 'Rūjienas novads'),
(444, 125, 'LV', 'Salacgrīvas novads', 'Salacgrīvas novads'),
(445, 125, 'LV', 'Salas novads', 'Salas novads'),
(446, 125, 'LV', 'Salaspils novads', 'Salaspils novads'),
(447, 125, 'LV', 'LV-SA', 'Saldus novads'),
(448, 125, 'LV', 'Saulkrastu novads', 'Saulkrastu novads'),
(449, 125, 'LV', 'Siguldas novads', 'Siguldas novads'),
(450, 125, 'LV', 'Skrundas novads', 'Skrundas novads'),
(451, 125, 'LV', 'Skrīveru novads', 'Skrīveru novads'),
(452, 125, 'LV', 'Smiltenes novads', 'Smiltenes novads'),
(453, 125, 'LV', 'Stopiņu novads', 'Stopiņu novads'),
(454, 125, 'LV', 'Strenču novads', 'Strenču novads'),
(455, 125, 'LV', 'Sējas novads', 'Sējas novads'),
(456, 125, 'LV', 'LV-TA', 'Talsu novads'),
(457, 125, 'LV', 'LV-TU', 'Tukuma novads'),
(458, 125, 'LV', 'Tērvetes novads', 'Tērvetes novads'),
(459, 125, 'LV', 'Vaiņodes novads', 'Vaiņodes novads'),
(460, 125, 'LV', 'LV-VK', 'Valkas novads'),
(461, 125, 'LV', 'LV-VM', 'Valmieras novads'),
(462, 125, 'LV', 'Varakļānu novads', 'Varakļānu novads'),
(463, 125, 'LV', 'Vecpiebalgas novads', 'Vecpiebalgas novads'),
(464, 125, 'LV', 'Vecumnieku novads', 'Vecumnieku novads'),
(465, 125, 'LV', 'LV-VE', 'Ventspils novads'),
(466, 125, 'LV', 'Viesītes novads', 'Viesītes novads'),
(467, 125, 'LV', 'Viļakas novads', 'Viļakas novads'),
(468, 125, 'LV', 'Viļānu novads', 'Viļānu novads'),
(469, 125, 'LV', 'Vārkavas novads', 'Vārkavas novads'),
(470, 125, 'LV', 'Zilupes novads', 'Zilupes novads'),
(471, 125, 'LV', 'Ādažu novads', 'Ādažu novads'),
(472, 125, 'LV', 'Ērgļu novads', 'Ērgļu novads'),
(473, 125, 'LV', 'Ķeguma novads', 'Ķeguma novads'),
(474, 125, 'LV', 'Ķekavas novads', 'Ķekavas novads'),
(475, 131, 'LT', 'LT-AL', 'Alytaus Apskritis'),
(476, 131, 'LT', 'LT-KU', 'Kauno Apskritis'),
(477, 131, 'LT', 'LT-KL', 'Klaipėdos Apskritis'),
(478, 131, 'LT', 'LT-MR', 'Marijampolės Apskritis'),
(479, 131, 'LT', 'LT-PN', 'Panevėžio Apskritis'),
(480, 131, 'LT', 'LT-SA', 'Šiaulių Apskritis'),
(481, 131, 'LT', 'LT-TA', 'Tauragės Apskritis'),
(482, 131, 'LT', 'LT-TE', 'Telšių Apskritis'),
(483, 131, 'LT', 'LT-UT', 'Utenos Apskritis'),
(484, 131, 'LT', 'LT-VL', 'Vilniaus Apskritis'),
(485, 31, 'BR', 'AC', 'Acre'),
(486, 31, 'BR', 'AL', 'Alagoas'),
(487, 31, 'BR', 'AP', 'Amapá'),
(488, 31, 'BR', 'AM', 'Amazonas'),
(489, 31, 'BR', 'BA', 'Bahia'),
(490, 31, 'BR', 'CE', 'Ceará'),
(491, 31, 'BR', 'ES', 'Espírito Santo'),
(492, 31, 'BR', 'GO', 'Goiás'),
(493, 31, 'BR', 'MA', 'Maranhão'),
(494, 31, 'BR', 'MT', 'Mato Grosso'),
(495, 31, 'BR', 'MS', 'Mato Grosso do Sul'),
(496, 31, 'BR', 'MG', 'Minas Gerais'),
(497, 31, 'BR', 'PA', 'Pará'),
(498, 31, 'BR', 'PB', 'Paraíba'),
(499, 31, 'BR', 'PR', 'Paraná'),
(500, 31, 'BR', 'PE', 'Pernambuco'),
(501, 31, 'BR', 'PI', 'Piauí'),
(502, 31, 'BR', 'RJ', 'Rio de Janeiro'),
(503, 31, 'BR', 'RN', 'Rio Grande do Norte'),
(504, 31, 'BR', 'RS', 'Rio Grande do Sul'),
(505, 31, 'BR', 'RO', 'Rondônia'),
(506, 31, 'BR', 'RR', 'Roraima'),
(507, 31, 'BR', 'SC', 'Santa Catarina'),
(508, 31, 'BR', 'SP', 'São Paulo'),
(509, 31, 'BR', 'SE', 'Sergipe'),
(510, 31, 'BR', 'TO', 'Tocantins'),
(511, 31, 'BR', 'DF', 'Distrito Federal'),
(512, 59, 'HR', 'HR-01', 'Zagrebačka županija'),
(513, 59, 'HR', 'HR-02', 'Krapinsko-zagorska županija'),
(514, 59, 'HR', 'HR-03', 'Sisačko-moslavačka županija'),
(515, 59, 'HR', 'HR-04', 'Karlovačka županija'),
(516, 59, 'HR', 'HR-05', 'Varaždinska županija'),
(517, 59, 'HR', 'HR-06', 'Koprivničko-križevačka županija'),
(518, 59, 'HR', 'HR-07', 'Bjelovarsko-bilogorska županija'),
(519, 59, 'HR', 'HR-08', 'Primorsko-goranska županija'),
(520, 59, 'HR', 'HR-09', 'Ličko-senjska županija'),
(521, 59, 'HR', 'HR-10', 'Virovitičko-podravska županija'),
(522, 59, 'HR', 'HR-11', 'Požeško-slavonska županija'),
(523, 59, 'HR', 'HR-12', 'Brodsko-posavska županija'),
(524, 59, 'HR', 'HR-13', 'Zadarska županija'),
(525, 59, 'HR', 'HR-14', 'Osječko-baranjska županija'),
(526, 59, 'HR', 'HR-15', 'Šibensko-kninska županija'),
(527, 59, 'HR', 'HR-16', 'Vukovarsko-srijemska županija'),
(528, 59, 'HR', 'HR-17', 'Splitsko-dalmatinska županija'),
(529, 59, 'HR', 'HR-18', 'Istarska županija'),
(530, 59, 'HR', 'HR-19', 'Dubrovačko-neretvanska županija'),
(531, 59, 'HR', 'HR-20', 'Međimurska županija'),
(532, 59, 'HR', 'HR-21', 'Grad Zagreb'),
(533, 106, 'IN', 'AN', 'Andaman and Nicobar Islands'),
(534, 106, 'IN', 'AP', 'Andhra Pradesh'),
(535, 106, 'IN', 'AR', 'Arunachal Pradesh'),
(536, 106, 'IN', 'AS', 'Assam'),
(537, 106, 'IN', 'BR', 'Bihar'),
(538, 106, 'IN', 'CH', 'Chandigarh'),
(539, 106, 'IN', 'CT', 'Chhattisgarh'),
(540, 106, 'IN', 'DN', 'Dadra and Nagar Haveli'),
(541, 106, 'IN', 'DD', 'Daman and Diu'),
(542, 106, 'IN', 'DL', 'Delhi'),
(543, 106, 'IN', 'GA', 'Goa'),
(544, 106, 'IN', 'GJ', 'Gujarat'),
(545, 106, 'IN', 'HR', 'Haryana'),
(546, 106, 'IN', 'HP', 'Himachal Pradesh'),
(547, 106, 'IN', 'JK', 'Jammu and Kashmir'),
(548, 106, 'IN', 'JH', 'Jharkhand'),
(549, 106, 'IN', 'KA', 'Karnataka'),
(550, 106, 'IN', 'KL', 'Kerala'),
(551, 106, 'IN', 'LD', 'Lakshadweep'),
(552, 106, 'IN', 'MP', 'Madhya Pradesh'),
(553, 106, 'IN', 'MH', 'Maharashtra'),
(554, 106, 'IN', 'MN', 'Manipur'),
(555, 106, 'IN', 'ML', 'Meghalaya'),
(556, 106, 'IN', 'MZ', 'Mizoram'),
(557, 106, 'IN', 'NL', 'Nagaland'),
(558, 106, 'IN', 'OR', 'Odisha'),
(559, 106, 'IN', 'PY', 'Puducherry'),
(560, 106, 'IN', 'PB', 'Punjab'),
(561, 106, 'IN', 'RJ', 'Rajasthan'),
(562, 106, 'IN', 'SK', 'Sikkim'),
(563, 106, 'IN', 'TN', 'Tamil Nadu'),
(564, 106, 'IN', 'TG', 'Telangana'),
(565, 106, 'IN', 'TR', 'Tripura'),
(566, 106, 'IN', 'UP', 'Uttar Pradesh'),
(567, 106, 'IN', 'UT', 'Uttarakhand'),
(568, 106, 'IN', 'WB', 'West Bengal'),
(569, 176, 'PY', 'PY-16', 'Alto Paraguay'),
(570, 176, 'PY', 'PY-10', 'Alto Paraná'),
(571, 176, 'PY', 'PY-13', 'Amambay'),
(572, 176, 'PY', 'PY-ASU', 'Asunción'),
(573, 176, 'PY', 'PY-19', 'Boquerón'),
(574, 176, 'PY', 'PY-5', 'Caaguazú'),
(575, 176, 'PY', 'PY-6', 'Caazapá'),
(576, 176, 'PY', 'PY-14', 'Canindeyú'),
(577, 176, 'PY', 'PY-11', 'Central'),
(578, 176, 'PY', 'PY-1', 'Concepción'),
(579, 176, 'PY', 'PY-3', 'Cordillera'),
(580, 176, 'PY', 'PY-4', 'Guairá'),
(581, 176, 'PY', 'PY-7', 'Itapúa'),
(582, 176, 'PY', 'PY-8', 'Misiones'),
(583, 176, 'PY', 'PY-9', 'Paraguarí'),
(584, 176, 'PY', 'PY-15', 'Presidente Hayes'),
(585, 176, 'PY', 'PY-2', 'San Pedro'),
(586, 176, 'PY', 'PY-12', 'Ñeembucú');

-- --------------------------------------------------------

--
-- Table structure for table `country_state_translations`
--

CREATE TABLE `country_state_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_state_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `default_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country_translations`
--

CREATE TABLE `country_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `decimal` int(10) UNSIGNED NOT NULL DEFAULT 2,
  `group_separator` varchar(255) NOT NULL DEFAULT ',',
  `decimal_separator` varchar(255) NOT NULL DEFAULT '.',
  `currency_position` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `name`, `symbol`, `decimal`, `group_separator`, `decimal_separator`, `currency_position`, `created_at`, `updated_at`) VALUES
(1, 'USD', 'United States Dollar', '$', 2, ',', '.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currency_exchange_rates`
--

CREATE TABLE `currency_exchange_rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `rate` decimal(24,12) NOT NULL,
  `target_currency` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_type` enum('customer','company','vendor') NOT NULL DEFAULT 'customer',
  `company_name` varchar(255) DEFAULT NULL,
  `company_description` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `account_type` enum('individual','vendor') DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `api_token` varchar(80) DEFAULT NULL,
  `customer_group_id` int(10) UNSIGNED DEFAULT NULL,
  `channel_id` int(10) UNSIGNED DEFAULT NULL,
  `subscribed_to_news_letter` tinyint(1) NOT NULL DEFAULT 0,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `is_suspended` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `token` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `wallet_balance` decimal(12,4) NOT NULL DEFAULT 0.0000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `gender`, `date_of_birth`, `email`, `user_type`, `company_name`, `company_description`, `phone`, `image`, `status`, `account_type`, `password`, `api_token`, `customer_group_id`, `channel_id`, `subscribed_to_news_letter`, `is_verified`, `is_suspended`, `token`, `remember_token`, `created_at`, `updated_at`, `wallet_balance`) VALUES
(1, 'omar', 'raafat', NULL, NULL, 'omarraafat2023@gmail.com', 'vendor', '', '', NULL, NULL, 1, NULL, '$2y$10$f.pfOqvztqZ4z.iE/1TBtOboeMOyRzktvFA9ghhcTHE6KhiYDSPia', 'nk9F0Z47fcUb0bMuRjWfJ6vPzzAJz9U93I3ky9vEHHiDRdlCBvjyV52mHmmeUlDO1yxe6gZU2Hyg218x', 2, 1, 0, 1, 0, 'f1fa2e4b20a873bf72a3e2f47540b33b', NULL, '2026-01-26 18:40:18', '2026-01-26 18:40:18', 0.0000),
(2, 'مش مجدي', 'shaban', 'Male', '2004-12-14', 'omarraafat939@gmail.com', 'vendor', '', '', '01157571561', 'customer/2/VlcnReingULuPfDXpZ09N0QyCL88d4cu1qooPnhM.png', 1, NULL, '$2y$10$drrwRMeKSqf47kG1YLQvVeTciPglAh1mcP90Lstvh/NLAqNgADWsu', '2cNgzsE8idClcr2PAiF1iGxWBi9WtYHQqDc2PXf0e42XKnc1KKTBK6WOXOJi6tPZ069h3cRinRJKfKZb', 2, 1, 0, 1, 0, 'f26133b24209d6bc49cdbf59d7131d8e', NULL, '2026-01-27 05:57:07', '2026-01-30 19:49:42', 0.0000),
(3, 'مش عمر', 'داوود', NULL, NULL, 'omarraafat2025@gmail.com', 'vendor', '', '', NULL, NULL, 1, NULL, '$2y$10$PMqQQcjqAYIsfyKPEyIlSOlweaSoUVppLPUX8vLMOF/mfV3L4tsh6', 'vtviY6o5ffP08IkiqaTyFYOCsAzVlAwOEM0bMEjGHcmid1lwIgNYdT2sooXC8SbQjezbHNrlUNbMC7Ng', 2, 1, 0, 1, 0, 'cbc93b920599df6ebca44082b6685d22', NULL, '2026-01-31 09:56:23', '2026-01-31 09:56:23', 0.0000);

-- --------------------------------------------------------

--
-- Table structure for table `customer_groups`
--

CREATE TABLE `customer_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_user_defined` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_groups`
--

INSERT INTO `customer_groups` (`id`, `code`, `name`, `is_user_defined`, `created_at`, `updated_at`) VALUES
(1, 'guest', 'Guest', 0, NULL, NULL),
(2, 'general', 'General', 0, NULL, NULL),
(3, 'wholesale', 'Wholesale', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_notes`
--

CREATE TABLE `customer_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `note` text NOT NULL,
  `customer_notified` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_password_resets`
--

CREATE TABLE `customer_password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_password_resets`
--

INSERT INTO `customer_password_resets` (`email`, `token`, `created_at`) VALUES
('omarraafat939@gmail.com', '$2y$10$goxIlfHyp3lfGnHH1quohOusERzw.uNN32vYacoOggWn0tEWVrsom', '2026-01-28 19:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `customer_social_accounts`
--

CREATE TABLE `customer_social_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `provider_name` varchar(255) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_wallet_transactions`
--

CREATE TABLE `customer_wallet_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `type` enum('charge','refund','payment') NOT NULL,
  `amount` decimal(12,4) NOT NULL,
  `currency` varchar(3) NOT NULL DEFAULT 'SAR',
  `metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`metadata`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datagrid_saved_filters`
--

CREATE TABLE `datagrid_saved_filters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `applied` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`applied`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `downloadable_link_purchased`
--

CREATE TABLE `downloadable_link_purchased` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `download_bought` int(11) NOT NULL DEFAULT 0,
  `download_used` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) DEFAULT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_item_id` int(10) UNSIGNED NOT NULL,
  `download_canceled` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `gdpr_data_request`
--

CREATE TABLE `gdpr_data_request` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL,
  `revoked_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imports`
--

CREATE TABLE `imports` (
  `id` int(10) UNSIGNED NOT NULL,
  `state` varchar(255) NOT NULL DEFAULT 'pending',
  `process_in_queue` tinyint(1) NOT NULL DEFAULT 1,
  `type` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `validation_strategy` varchar(255) NOT NULL,
  `allowed_errors` int(11) NOT NULL DEFAULT 0,
  `processed_rows_count` int(11) NOT NULL DEFAULT 0,
  `invalid_rows_count` int(11) NOT NULL DEFAULT 0,
  `errors_count` int(11) NOT NULL DEFAULT 0,
  `errors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`errors`)),
  `field_separator` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `images_directory_path` varchar(255) DEFAULT NULL,
  `error_file_path` varchar(255) DEFAULT NULL,
  `summary` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`summary`)),
  `started_at` datetime DEFAULT NULL,
  `completed_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `import_batches`
--

CREATE TABLE `import_batches` (
  `id` int(10) UNSIGNED NOT NULL,
  `state` varchar(255) NOT NULL DEFAULT 'pending',
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `summary` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`summary`)),
  `import_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_sources`
--

CREATE TABLE `inventory_sources` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `contact_fax` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 0,
  `latitude` decimal(10,5) DEFAULT NULL,
  `longitude` decimal(10,5) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_sources`
--

INSERT INTO `inventory_sources` (`id`, `code`, `name`, `description`, `contact_name`, `contact_email`, `contact_number`, `contact_fax`, `country`, `state`, `city`, `street`, `postcode`, `priority`, `latitude`, `longitude`, `status`, `created_at`, `updated_at`) VALUES
(1, 'default', 'Default', NULL, 'Default', 'warehouse@example.com', '1234567899', NULL, 'US', 'MI', 'Detroit', '12th Street', '48127', 0, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `increment_id` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `email_sent` tinyint(1) NOT NULL DEFAULT 0,
  `total_qty` int(11) DEFAULT NULL,
  `base_currency_code` varchar(255) DEFAULT NULL,
  `channel_currency_code` varchar(255) DEFAULT NULL,
  `order_currency_code` varchar(255) DEFAULT NULL,
  `sub_total` decimal(12,4) DEFAULT 0.0000,
  `base_sub_total` decimal(12,4) DEFAULT 0.0000,
  `grand_total` decimal(12,4) DEFAULT 0.0000,
  `base_grand_total` decimal(12,4) DEFAULT 0.0000,
  `shipping_amount` decimal(12,4) DEFAULT 0.0000,
  `base_shipping_amount` decimal(12,4) DEFAULT 0.0000,
  `tax_amount` decimal(12,4) DEFAULT 0.0000,
  `base_tax_amount` decimal(12,4) DEFAULT 0.0000,
  `discount_amount` decimal(12,4) DEFAULT 0.0000,
  `base_discount_amount` decimal(12,4) DEFAULT 0.0000,
  `shipping_tax_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_shipping_tax_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `sub_total_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_sub_total_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `shipping_amount_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_shipping_amount_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `reminders` int(11) NOT NULL DEFAULT 0,
  `next_reminder_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `increment_id`, `state`, `email_sent`, `total_qty`, `base_currency_code`, `channel_currency_code`, `order_currency_code`, `sub_total`, `base_sub_total`, `grand_total`, `base_grand_total`, `shipping_amount`, `base_shipping_amount`, `tax_amount`, `base_tax_amount`, `discount_amount`, `base_discount_amount`, `shipping_tax_amount`, `base_shipping_tax_amount`, `sub_total_incl_tax`, `base_sub_total_incl_tax`, `shipping_amount_incl_tax`, `base_shipping_amount_incl_tax`, `order_id`, `transaction_id`, `reminders`, `next_reminder_at`, `created_at`, `updated_at`) VALUES
(1, '1', 'paid', 1, 1, 'USD', 'USD', 'USD', 130.0000, 130.0000, 140.0000, 140.0000, 10.0000, 10.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 130.0000, 130.0000, 10.0000, 10.0000, 1, NULL, 0, NULL, '2026-01-30 03:08:55', '2026-02-02 15:11:53'),
(2, '2', 'paid', 1, 3, 'USD', 'USD', 'USD', 660.0000, 660.0000, 690.0000, 690.0000, 30.0000, 30.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 660.0000, 660.0000, 30.0000, 30.0000, 3, NULL, 0, NULL, '2026-02-02 15:11:53', '2026-02-02 15:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_price` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `total` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_total` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `tax_amount` decimal(12,4) DEFAULT 0.0000,
  `base_tax_amount` decimal(12,4) DEFAULT 0.0000,
  `discount_percent` decimal(12,4) DEFAULT 0.0000,
  `discount_amount` decimal(12,4) DEFAULT 0.0000,
  `base_discount_amount` decimal(12,4) DEFAULT 0.0000,
  `price_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_price_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `total_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_total_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `order_item_id` int(10) UNSIGNED DEFAULT NULL,
  `invoice_id` int(10) UNSIGNED DEFAULT NULL,
  `additional` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `parent_id`, `name`, `description`, `sku`, `qty`, `price`, `base_price`, `total`, `base_total`, `tax_amount`, `base_tax_amount`, `discount_percent`, `discount_amount`, `base_discount_amount`, `price_incl_tax`, `base_price_incl_tax`, `total_incl_tax`, `base_total_incl_tax`, `product_id`, `product_type`, `order_item_id`, `invoice_id`, `additional`, `created_at`, `updated_at`) VALUES
(1, NULL, 'منتج جديد', NULL, 'mntg-gdyd-1769725215', 1, 130.0000, 130.0000, 130.0000, 130.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 130.0000, 130.0000, 130.0000, 130.0000, 7, 'Webkul\\Product\\Models\\Product', 1, 1, '{\"cart_id\":27,\"product_id\":\"7\",\"is_buy_now\":\"1\",\"quantity\":1,\"locale\":\"ar\"}', '2026-01-30 03:08:55', '2026-01-30 03:08:55'),
(2, NULL, 'المنتج التاني', NULL, 'PROD-1769887342', 3, 220.0000, 220.0000, 660.0000, 660.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, 660.0000, 660.0000, 11, 'Webkul\\Product\\Models\\Product', 3, 2, '{\"cart_id\":36,\"product_id\":\"11\",\"is_buy_now\":\"1\",\"quantity\":3,\"locale\":\"ar\"}', '2026-02-02 15:11:53', '2026-02-02 15:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` enum('draft','published','closed') NOT NULL DEFAULT 'published',
  `application_link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `company_id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`, `type`, `status`, `application_link`, `image`) VALUES
(1, NULL, 'default', '{\"uuid\":\"407cf7c5-d7a7-4338-a3e8-1c968feb267f\",\"displayName\":\"Webkul\\\\Admin\\\\Mail\\\\Order\\\\CreatedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:43:\\\"Webkul\\\\Admin\\\\Mail\\\\Order\\\\CreatedNotification\\\":2:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:25:\\\"Webkul\\\\Sales\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"items\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1769728909, 1769728909, NULL, 'published', NULL, NULL),
(2, NULL, 'broadcastable', '{\"uuid\":\"8b30b911-3e83-4c17-9ef1-da6c88b1f20c\",\"displayName\":\"Webkul\\\\Notification\\\\Events\\\\CreateOrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:50:\\\"Webkul\\\\Notification\\\\Events\\\\CreateOrderNotification\\\":0:{}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1769728909, 1769728909, NULL, 'published', NULL, NULL),
(3, NULL, 'default', '{\"uuid\":\"e25dcdde-f873-4c99-8587-0af99611931e\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:7;}}\"}}', 0, NULL, 1769728909, 1769728909, NULL, 'published', NULL, NULL),
(4, NULL, 'default', '{\"uuid\":\"90eced9f-d437-4c20-ad52-19a03a701c0e\",\"displayName\":\"Webkul\\\\Shop\\\\Mail\\\\Order\\\\CreatedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:42:\\\"Webkul\\\\Shop\\\\Mail\\\\Order\\\\CreatedNotification\\\":2:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:25:\\\"Webkul\\\\Sales\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:6:{i:0;s:5:\\\"items\\\";i:1;s:9:\\\"all_items\\\";i:2;s:17:\\\"all_items.product\\\";i:3;s:34:\\\"all_items.product.attribute_family\\\";i:4;s:34:\\\"all_items.product.attribute_values\\\";i:5;s:7:\\\"payment\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1769728909, 1769728909, NULL, 'published', NULL, NULL),
(5, NULL, 'broadcastable', '{\"uuid\":\"6ba58db5-2fea-4e3a-b986-b29758712e41\",\"displayName\":\"Webkul\\\\Notification\\\\Events\\\\UpdateOrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:50:\\\"Webkul\\\\Notification\\\\Events\\\\UpdateOrderNotification\\\":1:{s:7:\\\"\\u0000*\\u0000data\\\";a:2:{s:2:\\\"id\\\";i:1;s:6:\\\"status\\\";s:10:\\\"processing\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1769729936, 1769729936, NULL, 'published', NULL, NULL),
(6, NULL, 'default', '{\"uuid\":\"8a9a11a9-410a-4aa1-94c4-b8a03d2c097b\",\"displayName\":\"Webkul\\\\Shop\\\\Mail\\\\Order\\\\InvoicedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:43:\\\"Webkul\\\\Shop\\\\Mail\\\\Order\\\\InvoicedNotification\\\":2:{s:7:\\\"invoice\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:27:\\\"Webkul\\\\Sales\\\\Models\\\\Invoice\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:4:{i:0;s:5:\\\"items\\\";i:1;s:5:\\\"order\\\";i:2;s:14:\\\"order.invoices\\\";i:3;s:13:\\\"order.payment\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1769729936, 1769729936, NULL, 'published', NULL, NULL),
(7, NULL, 'default', '{\"uuid\":\"908ee05b-6a02-4c9c-90db-e7500d030a19\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1769730100, 1769730100, NULL, 'published', NULL, NULL),
(8, NULL, 'default', '{\"uuid\":\"7f2db40d-0a51-4a7a-8241-5a79afaa4cd5\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:7;}s:7:\\\"chained\\\";a:2:{i:0;s:89:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:7;}}\\\";i:1;s:98:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:7;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1769730101, 1769730101, NULL, 'published', NULL, NULL),
(9, NULL, 'broadcastable', '{\"uuid\":\"a6652f43-ccaa-497a-b524-b120d59d5dc3\",\"displayName\":\"Webkul\\\\Notification\\\\Events\\\\UpdateOrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:50:\\\"Webkul\\\\Notification\\\\Events\\\\UpdateOrderNotification\\\":1:{s:7:\\\"\\u0000*\\u0000data\\\";a:2:{s:2:\\\"id\\\";i:1;s:6:\\\"status\\\";s:9:\\\"completed\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1769730101, 1769730101, NULL, 'published', NULL, NULL),
(10, NULL, 'default', '{\"uuid\":\"0141de8f-6d75-4b5f-a516-a142fd7a4427\",\"displayName\":\"Webkul\\\\Admin\\\\Mail\\\\Order\\\\InventorySourceNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:51:\\\"Webkul\\\\Admin\\\\Mail\\\\Order\\\\InventorySourceNotification\\\":2:{s:8:\\\"shipment\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:28:\\\"Webkul\\\\Sales\\\\Models\\\\Shipment\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:4:{i:0;s:5:\\\"order\\\";i:1;s:13:\\\"order.channel\\\";i:2;s:16:\\\"inventory_source\\\";i:3;s:5:\\\"items\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1769730101, 1769730101, NULL, 'published', NULL, NULL),
(11, NULL, 'default', '{\"uuid\":\"31355fc0-dcf6-4a39-95f5-5d56a0bc4330\",\"displayName\":\"Webkul\\\\Shop\\\\Mail\\\\Order\\\\ShippedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:42:\\\"Webkul\\\\Shop\\\\Mail\\\\Order\\\\ShippedNotification\\\":2:{s:8:\\\"shipment\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:28:\\\"Webkul\\\\Sales\\\\Models\\\\Shipment\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:4:{i:0;s:5:\\\"order\\\";i:1;s:13:\\\"order.channel\\\";i:2;s:16:\\\"inventory_source\\\";i:3;s:5:\\\"items\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1769730101, 1769730101, NULL, 'published', NULL, NULL),
(12, NULL, 'default', '{\"uuid\":\"193f9574-a728-44c0-a9b9-502cd7bbab0c\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1769790490, 1769790490, NULL, 'published', NULL, NULL),
(13, NULL, 'default', '{\"uuid\":\"d7668e33-9d56-49ed-815c-c219c6b87a27\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:8;}s:7:\\\"chained\\\";a:2:{i:0;s:89:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:8;}}\\\";i:1;s:98:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:8;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1769790490, 1769790490, NULL, 'published', NULL, NULL),
(14, NULL, 'default', '{\"uuid\":\"cb8ddf4d-9c73-4a83-a13e-00968eeafd97\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1769790626, 1769790626, NULL, 'published', NULL, NULL),
(15, NULL, 'default', '{\"uuid\":\"dd6e1528-1257-4b45-a444-f9dee47c40ac\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:8;}s:7:\\\"chained\\\";a:2:{i:0;s:89:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:8;}}\\\";i:1;s:98:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:8;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1769790627, 1769790627, NULL, 'published', NULL, NULL),
(16, NULL, 'default', '{\"uuid\":\"fce22372-b0e4-4f5e-a81a-eb5aa5972497\",\"displayName\":\"Webkul\\\\Shop\\\\Mail\\\\Customer\\\\RegistrationNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:50:\\\"Webkul\\\\Shop\\\\Mail\\\\Customer\\\\RegistrationNotification\\\":2:{s:8:\\\"customer\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:31:\\\"Webkul\\\\Customer\\\\Models\\\\Customer\\\";s:2:\\\"id\\\";i:3;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1769840783, 1769840783, NULL, 'published', NULL, NULL),
(17, NULL, 'default', '{\"uuid\":\"1ce83502-9346-43cb-b562-7f5bb442dbcb\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"command\":\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:9;}}\"}}', 0, NULL, 1769881524, 1769881524, NULL, 'published', NULL, NULL),
(18, NULL, 'default', '{\"uuid\":\"6badbefc-ba1b-4762-a215-4541db91d171\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:9;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1769881617, 1769881617, NULL, 'published', NULL, NULL),
(19, NULL, 'default', '{\"uuid\":\"273c1d0b-74ce-4764-83af-254356012493\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:9;}s:7:\\\"chained\\\";a:2:{i:0;s:89:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:9;}}\\\";i:1;s:98:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:9;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1769881618, 1769881618, NULL, 'published', NULL, NULL),
(20, NULL, 'default', '{\"uuid\":\"1771aec4-efd7-480d-9508-965453ae902d\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:9;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1769881640, 1769881640, NULL, 'published', NULL, NULL),
(21, NULL, 'default', '{\"uuid\":\"9fb5d5d7-6269-418e-a502-941c90d105f1\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:9;}s:7:\\\"chained\\\";a:2:{i:0;s:89:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:9;}}\\\";i:1;s:98:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:9;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1769881640, 1769881640, NULL, 'published', NULL, NULL),
(22, NULL, 'default', '{\"uuid\":\"ac4cc819-1526-4bdf-82d3-31f8a9282cb5\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:9;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1769883879, 1769883879, NULL, 'published', NULL, NULL),
(23, NULL, 'default', '{\"uuid\":\"672067de-13c8-4dd9-b6d7-538e990b94c6\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:9;}s:7:\\\"chained\\\";a:2:{i:0;s:89:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:9;}}\\\";i:1;s:98:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:9;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1769883879, 1769883879, NULL, 'published', NULL, NULL),
(24, NULL, 'default', '{\"uuid\":\"844fd424-c8cf-478d-bdc3-de9ab99e9fb9\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1769883879, 1769883879, NULL, 'published', NULL, NULL),
(25, NULL, 'default', '{\"uuid\":\"a40af6ab-ae44-44a7-a51e-f1e099470af9\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:8;}s:7:\\\"chained\\\";a:2:{i:0;s:89:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:8;}}\\\";i:1;s:98:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:8;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1769883879, 1769883879, NULL, 'published', NULL, NULL),
(26, NULL, 'default', '{\"uuid\":\"081b5591-6e4d-405a-9ab8-70078c8b458e\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1769883879, 1769883879, NULL, 'published', NULL, NULL),
(27, NULL, 'default', '{\"uuid\":\"dc5e6dde-cd31-4171-96e3-2d6f3c6647df\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:7;}s:7:\\\"chained\\\";a:2:{i:0;s:89:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:7;}}\\\";i:1;s:98:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:7;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1769883880, 1769883880, NULL, 'published', NULL, NULL),
(28, NULL, 'default', '{\"uuid\":\"7c02919b-767f-4625-97fa-1244a9b920ab\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1769883880, 1769883880, NULL, 'published', NULL, NULL),
(29, NULL, 'default', '{\"uuid\":\"e5f3720f-f207-4598-b16d-3d03b7129e1b\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:2;}s:7:\\\"chained\\\";a:2:{i:0;s:89:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:2;}}\\\";i:1;s:98:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:2;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1769883880, 1769883880, NULL, 'published', NULL, NULL),
(30, NULL, 'default', '{\"uuid\":\"4e6fcafc-3555-43b5-a656-47b4ac9f57be\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1769883880, 1769883880, NULL, 'published', NULL, NULL),
(31, NULL, 'default', '{\"uuid\":\"ef43bf28-3d2b-4859-aa62-215621057fb1\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:1;}s:7:\\\"chained\\\";a:2:{i:0;s:89:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:1;}}\\\";i:1;s:98:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:1;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1769883880, 1769883880, NULL, 'published', NULL, NULL),
(32, NULL, 'default', '{\"uuid\":\"47c73b89-3bfa-4b24-a02e-788f5698901c\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:9;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1769885682, 1769885682, NULL, 'published', NULL, NULL),
(33, NULL, 'default', '{\"uuid\":\"91596477-0b0e-4010-bcd8-d7454e6e15f4\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:9;}s:7:\\\"chained\\\";a:2:{i:0;s:89:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:9;}}\\\";i:1;s:98:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:9;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1769885683, 1769885683, NULL, 'published', NULL, NULL),
(34, NULL, 'default', '{\"uuid\":\"474ca4b5-bc9f-4147-a41a-73aeed7b52a7\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"command\":\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}}\"}}', 0, NULL, 1769886670, 1769886670, NULL, 'published', NULL, NULL),
(35, NULL, 'default', '{\"uuid\":\"e98f6708-1f3d-46b0-ab04-6f169f6d2af9\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1769886670, 1769886670, NULL, 'published', NULL, NULL),
(36, NULL, 'default', '{\"uuid\":\"ec4bb901-e574-46a2-9b40-4221df6d5b17\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1769886670, 1769886670, NULL, 'published', NULL, NULL),
(37, NULL, 'default', '{\"uuid\":\"c2935886-48f9-4271-b32d-c554fa711f39\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1769886692, 1769886692, NULL, 'published', NULL, NULL),
(38, NULL, 'default', '{\"uuid\":\"979af02f-daa9-44b7-b707-3d1ecf50fc3b\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1769886692, 1769886692, NULL, 'published', NULL, NULL),
(39, NULL, 'default', '{\"uuid\":\"768d285e-3e70-4579-9959-eb6a3d1bbb56\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"command\":\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\"}}', 0, NULL, 1769887393, 1769887393, NULL, 'published', NULL, NULL),
(40, NULL, 'default', '{\"uuid\":\"8a1fa824-9984-46b0-a49f-ac3bee76377e\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1769887393, 1769887393, NULL, 'published', NULL, NULL),
(41, NULL, 'default', '{\"uuid\":\"94d4f8e5-ee9c-4b32-89e9-f7d8d888dbea\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1769887393, 1769887393, NULL, 'published', NULL, NULL),
(42, NULL, 'default', '{\"uuid\":\"9d3b14b0-bd0a-4eb7-a088-72155ea4f481\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1769887426, 1769887426, NULL, 'published', NULL, NULL),
(43, NULL, 'default', '{\"uuid\":\"c63251c3-5e64-4924-929f-7904852878b5\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1769887426, 1769887426, NULL, 'published', NULL, NULL),
(44, NULL, 'default', '{\"uuid\":\"b946c0d7-7d0b-4395-b07f-f4cc008e399a\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1769887806, 1769887806, NULL, 'published', NULL, NULL),
(45, NULL, 'default', '{\"uuid\":\"4f857281-34c3-4579-be32-1ff4538a2c59\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1769887807, 1769887807, NULL, 'published', NULL, NULL),
(46, NULL, 'default', '{\"uuid\":\"53b6a8a4-e724-431a-ab3b-a1d760cd10d0\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1769887807, 1769887807, NULL, 'published', NULL, NULL),
(47, NULL, 'default', '{\"uuid\":\"f51a3c4c-bafc-45b9-bde1-e831de6d7ae1\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1769887807, 1769887807, NULL, 'published', NULL, NULL),
(48, NULL, 'default', '{\"uuid\":\"ec44493b-c777-4533-9962-d22e1db49146\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1769887816, 1769887816, NULL, 'published', NULL, NULL),
(49, NULL, 'default', '{\"uuid\":\"a454d369-0f18-49e6-9b3b-9c11f148bbef\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1769887816, 1769887816, NULL, 'published', NULL, NULL),
(50, NULL, 'default', '{\"uuid\":\"f3228210-663a-4eb0-8794-46b125bd1bed\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1769887816, 1769887816, NULL, 'published', NULL, NULL);
INSERT INTO `jobs` (`id`, `company_id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`, `type`, `status`, `application_link`, `image`) VALUES
(51, NULL, 'default', '{\"uuid\":\"cf8d003d-de72-4b73-94e5-ef49f23b09d8\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1769887816, 1769887816, NULL, 'published', NULL, NULL),
(52, NULL, 'default', '{\"uuid\":\"fd4aaae4-3656-4ff0-8c21-2c170b75c317\",\"displayName\":\"Webkul\\\\Admin\\\\Mail\\\\Order\\\\CreatedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:43:\\\"Webkul\\\\Admin\\\\Mail\\\\Order\\\\CreatedNotification\\\":2:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:25:\\\"Webkul\\\\Sales\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"items\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1769889566, 1769889566, NULL, 'published', NULL, NULL),
(53, NULL, 'broadcastable', '{\"uuid\":\"6973d2d3-7bff-4829-9bd6-58f8c7d0cdc6\",\"displayName\":\"Webkul\\\\Notification\\\\Events\\\\CreateOrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:50:\\\"Webkul\\\\Notification\\\\Events\\\\CreateOrderNotification\\\":0:{}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1769889566, 1769889566, NULL, 'published', NULL, NULL),
(54, NULL, 'default', '{\"uuid\":\"2feb79d9-1b6a-412c-b3c2-226af4ac37cc\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\"}}', 0, NULL, 1769889566, 1769889566, NULL, 'published', NULL, NULL),
(55, NULL, 'default', '{\"uuid\":\"612cda9f-21b8-4113-8885-7edd068698dd\",\"displayName\":\"Webkul\\\\Shop\\\\Mail\\\\Order\\\\CreatedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:42:\\\"Webkul\\\\Shop\\\\Mail\\\\Order\\\\CreatedNotification\\\":2:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:25:\\\"Webkul\\\\Sales\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:6:{i:0;s:5:\\\"items\\\";i:1;s:9:\\\"all_items\\\";i:2;s:17:\\\"all_items.product\\\";i:3;s:34:\\\"all_items.product.attribute_family\\\";i:4;s:34:\\\"all_items.product.attribute_values\\\";i:5;s:7:\\\"payment\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1769889567, 1769889567, NULL, 'published', NULL, NULL),
(56, NULL, 'default', '{\"uuid\":\"9b64a0da-353d-40d2-b022-3cab875cc859\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"command\":\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\"}}', 0, NULL, 1770031740, 1770031740, NULL, 'published', NULL, NULL),
(57, NULL, 'default', '{\"uuid\":\"3b0ba774-cfa3-4bb7-b38e-00aaded6a557\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770032044, 1770032044, NULL, 'published', NULL, NULL),
(58, NULL, 'default', '{\"uuid\":\"3ccaf1df-acd9-4c78-ab12-289de0ac4dda\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770032045, 1770032045, NULL, 'published', NULL, NULL),
(59, NULL, 'default', '{\"uuid\":\"4649bafd-ffb0-4606-a479-a2e47d9debfd\",\"displayName\":\"Webkul\\\\Admin\\\\Mail\\\\Order\\\\CreatedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:43:\\\"Webkul\\\\Admin\\\\Mail\\\\Order\\\\CreatedNotification\\\":2:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:25:\\\"Webkul\\\\Sales\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:3;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"items\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1770032316, 1770032316, NULL, 'published', NULL, NULL),
(60, NULL, 'broadcastable', '{\"uuid\":\"381fdb54-df75-4612-8e5a-6f40fcbb6866\",\"displayName\":\"Webkul\\\\Notification\\\\Events\\\\CreateOrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:50:\\\"Webkul\\\\Notification\\\\Events\\\\CreateOrderNotification\\\":0:{}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1770032317, 1770032317, NULL, 'published', NULL, NULL),
(61, NULL, 'default', '{\"uuid\":\"3d8eee5d-b55d-4024-bc90-48ef9afde3a2\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\"}}', 0, NULL, 1770032317, 1770032317, NULL, 'published', NULL, NULL),
(62, NULL, 'default', '{\"uuid\":\"cb087f61-bfb4-401e-ad0b-71aea9a0d995\",\"displayName\":\"Webkul\\\\Shop\\\\Mail\\\\Order\\\\CreatedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:42:\\\"Webkul\\\\Shop\\\\Mail\\\\Order\\\\CreatedNotification\\\":2:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:25:\\\"Webkul\\\\Sales\\\\Models\\\\Order\\\";s:2:\\\"id\\\";i:3;s:9:\\\"relations\\\";a:6:{i:0;s:5:\\\"items\\\";i:1;s:9:\\\"all_items\\\";i:2;s:17:\\\"all_items.product\\\";i:3;s:34:\\\"all_items.product.attribute_family\\\";i:4;s:34:\\\"all_items.product.attribute_values\\\";i:5;s:7:\\\"payment\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1770032317, 1770032317, NULL, 'published', NULL, NULL),
(63, NULL, 'broadcastable', '{\"uuid\":\"afd7ef59-6fd4-4bcf-8655-8a406b258a8e\",\"displayName\":\"Webkul\\\\Notification\\\\Events\\\\UpdateOrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:50:\\\"Webkul\\\\Notification\\\\Events\\\\UpdateOrderNotification\\\":1:{s:7:\\\"\\u0000*\\u0000data\\\";a:2:{s:2:\\\"id\\\";i:3;s:6:\\\"status\\\";s:10:\\\"processing\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1770032483, 1770032483, NULL, 'published', NULL, NULL),
(64, NULL, 'default', '{\"uuid\":\"ca066e51-3fc8-4a65-98d1-35285e9ad1b3\",\"displayName\":\"Webkul\\\\Admin\\\\Mail\\\\Order\\\\InventorySourceNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:51:\\\"Webkul\\\\Admin\\\\Mail\\\\Order\\\\InventorySourceNotification\\\":2:{s:8:\\\"shipment\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:28:\\\"Webkul\\\\Sales\\\\Models\\\\Shipment\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"inventory_source\\\";i:1;s:5:\\\"items\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1770032483, 1770032483, NULL, 'published', NULL, NULL),
(65, NULL, 'default', '{\"uuid\":\"6ef03aed-7dc8-4a3b-b2d1-7296cb1a8643\",\"displayName\":\"Webkul\\\\Shop\\\\Mail\\\\Order\\\\ShippedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:42:\\\"Webkul\\\\Shop\\\\Mail\\\\Order\\\\ShippedNotification\\\":2:{s:8:\\\"shipment\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:28:\\\"Webkul\\\\Sales\\\\Models\\\\Shipment\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"inventory_source\\\";i:1;s:5:\\\"items\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1770032483, 1770032483, NULL, 'published', NULL, NULL),
(66, NULL, 'broadcastable', '{\"uuid\":\"9fcb237a-cfa6-454d-9e9b-3b78c626f56f\",\"displayName\":\"Webkul\\\\Notification\\\\Events\\\\UpdateOrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:50:\\\"Webkul\\\\Notification\\\\Events\\\\UpdateOrderNotification\\\":1:{s:7:\\\"\\u0000*\\u0000data\\\";a:2:{s:2:\\\"id\\\";i:3;s:6:\\\"status\\\";s:9:\\\"completed\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1770032513, 1770032513, NULL, 'published', NULL, NULL),
(67, NULL, 'default', '{\"uuid\":\"42005d8f-3744-440e-a7d0-541f5bb5a4cc\",\"displayName\":\"Webkul\\\\Shop\\\\Mail\\\\Order\\\\InvoicedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:43:\\\"Webkul\\\\Shop\\\\Mail\\\\Order\\\\InvoicedNotification\\\":2:{s:7:\\\"invoice\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:27:\\\"Webkul\\\\Sales\\\\Models\\\\Invoice\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:4:{i:0;s:5:\\\"items\\\";i:1;s:5:\\\"order\\\";i:2;s:14:\\\"order.invoices\\\";i:3;s:13:\\\"order.payment\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1770032513, 1770032513, NULL, 'published', NULL, NULL),
(68, NULL, 'default', '{\"uuid\":\"e8513c11-acaa-47e1-b423-5458e7b3f46f\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"command\":\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\"}}', 0, NULL, 1770033080, 1770033080, NULL, 'published', NULL, NULL),
(69, NULL, 'default', '{\"uuid\":\"86dd28f7-5ec5-4020-bed0-7e121f938bc9\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770033080, 1770033080, NULL, 'published', NULL, NULL),
(70, NULL, 'default', '{\"uuid\":\"309baf36-fdcc-4ed3-8607-76381fbffded\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770033081, 1770033081, NULL, 'published', NULL, NULL),
(71, NULL, 'default', '{\"uuid\":\"edae6c89-5df5-4eaa-8139-0c5b39487c04\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770033189, 1770033189, NULL, 'published', NULL, NULL),
(72, NULL, 'default', '{\"uuid\":\"5d0d5009-e813-42a4-9cf6-52b2abb91182\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770033190, 1770033190, NULL, 'published', NULL, NULL),
(73, NULL, 'default', '{\"uuid\":\"9451b8bb-9aa0-4bf5-b837-8e7012c08142\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770033342, 1770033342, NULL, 'published', NULL, NULL),
(74, NULL, 'default', '{\"uuid\":\"3ede9c86-068b-45d2-ad4f-f7297acb3dd6\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770033342, 1770033342, NULL, 'published', NULL, NULL),
(75, NULL, 'default', '{\"uuid\":\"d7330802-8e72-4b7d-b445-ae550c74e8f8\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"command\":\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\"}}', 0, NULL, 1770058835, 1770058835, NULL, 'published', NULL, NULL),
(76, NULL, 'default', '{\"uuid\":\"55468021-b463-4ee7-843e-45d566419fc2\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770058835, 1770058835, NULL, 'published', NULL, NULL),
(77, NULL, 'default', '{\"uuid\":\"0260d950-07d9-4ee2-97ff-6bae9ea27cce\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770058836, 1770058836, NULL, 'published', NULL, NULL),
(78, NULL, 'default', '{\"uuid\":\"74410d52-ace0-47ca-98c1-04d331844c0d\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770058855, 1770058855, NULL, 'published', NULL, NULL),
(79, NULL, 'default', '{\"uuid\":\"bad76a68-1efb-46aa-ab74-4d2a026e0b48\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770058855, 1770058855, NULL, 'published', NULL, NULL),
(80, NULL, 'default', '{\"uuid\":\"4dba2d8d-717c-4142-9f65-44ff3c5a4844\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770059682, 1770059682, NULL, 'published', NULL, NULL),
(81, NULL, 'default', '{\"uuid\":\"56c831f3-0fa2-4959-ba56-f1b950672ea9\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770059682, 1770059682, NULL, 'published', NULL, NULL),
(82, NULL, 'default', '{\"uuid\":\"06aa315d-e0dc-4936-96f7-a5d92e1db13d\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770059707, 1770059707, NULL, 'published', NULL, NULL),
(83, NULL, 'default', '{\"uuid\":\"e59a1d1d-3d1e-4625-8608-9a38b2e8644c\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770059707, 1770059707, NULL, 'published', NULL, NULL),
(84, NULL, 'default', '{\"uuid\":\"10ff25c4-0dd0-45db-88e4-dcb91fd35c16\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770059979, 1770059979, NULL, 'published', NULL, NULL),
(85, NULL, 'default', '{\"uuid\":\"c42bc2f1-3c46-4d7c-9ff1-fdcb7b21bf0d\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770059979, 1770059979, NULL, 'published', NULL, NULL),
(86, NULL, 'default', '{\"uuid\":\"e7389981-f723-4f2a-bc1d-a8c4be58b6a4\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770059979, 1770059979, NULL, 'published', NULL, NULL),
(87, NULL, 'default', '{\"uuid\":\"f41d06bc-c0b2-43fe-aa1d-cffc4f99ceb3\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770059979, 1770059979, NULL, 'published', NULL, NULL),
(88, NULL, 'default', '{\"uuid\":\"76f3e162-721f-45b7-a203-21988b08ff62\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770059979, 1770059979, NULL, 'published', NULL, NULL),
(89, NULL, 'default', '{\"uuid\":\"e98092d0-fa54-45fb-89eb-b69d92481a5f\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770059979, 1770059979, NULL, 'published', NULL, NULL),
(90, NULL, 'default', '{\"uuid\":\"5eb0affa-856f-4af3-89c7-62990cedd9a8\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770059979, 1770059979, NULL, 'published', NULL, NULL),
(91, NULL, 'default', '{\"uuid\":\"141c6099-823c-41b6-a1c2-902e5970fb8a\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770059979, 1770059979, NULL, 'published', NULL, NULL),
(92, NULL, 'default', '{\"uuid\":\"fc6e55bb-f968-46d4-9ee9-036e61b72c0d\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770059979, 1770059979, NULL, 'published', NULL, NULL),
(93, NULL, 'default', '{\"uuid\":\"389e1c3e-2e48-4de0-9869-9a530c9f327c\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770059979, 1770059979, NULL, 'published', NULL, NULL),
(94, NULL, 'default', '{\"uuid\":\"12441879-9027-4180-bb80-a4f254f21f50\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770059987, 1770059987, NULL, 'published', NULL, NULL),
(95, NULL, 'default', '{\"uuid\":\"27dacd3b-5405-4b08-a69a-eb9934c89064\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770059987, 1770059987, NULL, 'published', NULL, NULL),
(96, NULL, 'default', '{\"uuid\":\"cb91ee63-6aac-43f1-b3c0-564cbbe628c0\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770059987, 1770059987, NULL, 'published', NULL, NULL),
(97, NULL, 'default', '{\"uuid\":\"27f9319b-ed7b-4e0f-b2b7-2f2a2fb9787b\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770059987, 1770059987, NULL, 'published', NULL, NULL),
(98, NULL, 'default', '{\"uuid\":\"08fbfb29-9fe2-467d-be88-2c69d761af5e\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770059987, 1770059987, NULL, 'published', NULL, NULL),
(99, NULL, 'default', '{\"uuid\":\"e69da4f3-ad4c-4d40-ac88-ea6eeea106e2\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770059987, 1770059987, NULL, 'published', NULL, NULL),
(100, NULL, 'default', '{\"uuid\":\"3efff3e2-5bb8-4af9-8013-456796a697f3\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770059987, 1770059987, NULL, 'published', NULL, NULL);
INSERT INTO `jobs` (`id`, `company_id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`, `type`, `status`, `application_link`, `image`) VALUES
(101, NULL, 'default', '{\"uuid\":\"cfbe7bc9-9ef0-4ffb-ae52-bac5d5cb8cd2\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770059987, 1770059987, NULL, 'published', NULL, NULL),
(102, NULL, 'default', '{\"uuid\":\"1c0ff5ae-a168-4841-82aa-c45622474c02\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770059987, 1770059987, NULL, 'published', NULL, NULL),
(103, NULL, 'default', '{\"uuid\":\"b7e65434-7973-4899-9c31-0e249754a998\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770059987, 1770059987, NULL, 'published', NULL, NULL),
(104, NULL, 'default', '{\"uuid\":\"217fde48-6a16-4d84-be67-5ccfb277370b\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770060273, 1770060273, NULL, 'published', NULL, NULL),
(105, NULL, 'default', '{\"uuid\":\"7d222892-f5de-465a-bc9e-bb5343ddff9a\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770060273, 1770060273, NULL, 'published', NULL, NULL),
(106, NULL, 'default', '{\"uuid\":\"c2a8fa3a-acb4-494f-9fd8-3212efc95a14\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770060273, 1770060273, NULL, 'published', NULL, NULL),
(107, NULL, 'default', '{\"uuid\":\"753fe8eb-0ecb-406d-8de2-a07c852ae8ca\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770060273, 1770060273, NULL, 'published', NULL, NULL),
(108, NULL, 'default', '{\"uuid\":\"b996fe57-2b96-4e1c-bb83-9d45e4032b0a\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770060273, 1770060273, NULL, 'published', NULL, NULL),
(109, NULL, 'default', '{\"uuid\":\"c2b581dd-6832-43fd-bc58-47eee41825ad\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770060273, 1770060273, NULL, 'published', NULL, NULL),
(110, NULL, 'default', '{\"uuid\":\"4fbe7412-d569-4a33-a838-bcca949ad4e1\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770060273, 1770060273, NULL, 'published', NULL, NULL),
(111, NULL, 'default', '{\"uuid\":\"eec3960b-3332-4418-b298-e1db07b4e498\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770060273, 1770060273, NULL, 'published', NULL, NULL),
(112, NULL, 'default', '{\"uuid\":\"e141a64c-1648-48bf-b376-2aa0f0259cb8\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770060273, 1770060273, NULL, 'published', NULL, NULL),
(113, NULL, 'default', '{\"uuid\":\"0cb6b952-7936-4987-a554-e747ab253160\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770060273, 1770060273, NULL, 'published', NULL, NULL),
(114, NULL, 'default', '{\"uuid\":\"73009104-1e8f-4edd-a477-fadedddebc26\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770060289, 1770060289, NULL, 'published', NULL, NULL),
(115, NULL, 'default', '{\"uuid\":\"cfe23895-cc7b-42fa-9a48-de02551b0048\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770060289, 1770060289, NULL, 'published', NULL, NULL),
(116, NULL, 'default', '{\"uuid\":\"523df25c-accd-4d6f-830f-9c45e50bf09e\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770060290, 1770060290, NULL, 'published', NULL, NULL),
(117, NULL, 'default', '{\"uuid\":\"4e33a0c8-7d7b-4f35-b912-f507e181d6d4\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770060290, 1770060290, NULL, 'published', NULL, NULL),
(118, NULL, 'default', '{\"uuid\":\"368b3211-e32b-42b2-80b1-99d80debb04a\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770060290, 1770060290, NULL, 'published', NULL, NULL),
(119, NULL, 'default', '{\"uuid\":\"175c4188-e5c6-4b90-be9d-a32a2bf91580\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770060290, 1770060290, NULL, 'published', NULL, NULL),
(120, NULL, 'default', '{\"uuid\":\"60ecfb7e-1ce1-4270-b6d3-99f03c8242cf\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770060290, 1770060290, NULL, 'published', NULL, NULL),
(121, NULL, 'default', '{\"uuid\":\"37f5d9bf-fd97-4775-9fcd-f4cb3a71ec0c\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770060290, 1770060290, NULL, 'published', NULL, NULL),
(122, NULL, 'default', '{\"uuid\":\"b7df7308-3d73-4c2a-915f-b1ba987cd15d\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770060290, 1770060290, NULL, 'published', NULL, NULL),
(123, NULL, 'default', '{\"uuid\":\"00468d8f-378f-406b-915e-15f732ae195b\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:10;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770060290, 1770060290, NULL, 'published', NULL, NULL),
(124, NULL, 'default', '{\"uuid\":\"40492c29-671c-44f1-ad17-e28ad34b7910\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"command\":\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\"}}', 0, NULL, 1770060348, 1770060348, NULL, 'published', NULL, NULL),
(125, NULL, 'default', '{\"uuid\":\"eb57de05-a0c7-4c6b-8401-8f8f0639252b\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770060348, 1770060348, NULL, 'published', NULL, NULL),
(126, NULL, 'default', '{\"uuid\":\"ec019e2f-92fa-41ef-8a7d-4084c2ff102d\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770060349, 1770060349, NULL, 'published', NULL, NULL),
(127, NULL, 'default', '{\"uuid\":\"e959d94f-dc1c-42fc-b38a-c58fa669ddb8\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770060365, 1770060365, NULL, 'published', NULL, NULL),
(128, NULL, 'default', '{\"uuid\":\"f04354d5-5163-4c08-8ffa-4eeebe6c5c0c\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770060365, 1770060365, NULL, 'published', NULL, NULL),
(129, NULL, 'default', '{\"uuid\":\"17f0a12a-1729-4c26-9439-8af7c67ce7b3\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770060366, 1770060366, NULL, 'published', NULL, NULL),
(130, NULL, 'default', '{\"uuid\":\"f9fda53e-cc7c-40c9-914b-e01323e4ebf4\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770060366, 1770060366, NULL, 'published', NULL, NULL),
(131, NULL, 'default', '{\"uuid\":\"7341a6fa-89ce-4daf-ba8e-a249b02ddd96\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770060366, 1770060366, NULL, 'published', NULL, NULL),
(132, NULL, 'default', '{\"uuid\":\"9d1defe4-dbe3-4bdf-af55-813c0b78c2c9\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770060366, 1770060366, NULL, 'published', NULL, NULL),
(133, NULL, 'default', '{\"uuid\":\"c1d46dc7-ad43-4c79-aaff-d07c203b2f08\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770060366, 1770060366, NULL, 'published', NULL, NULL),
(134, NULL, 'default', '{\"uuid\":\"24c56438-876c-439f-87c6-da584c2c27cf\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770060366, 1770060366, NULL, 'published', NULL, NULL),
(135, NULL, 'default', '{\"uuid\":\"c49feead-0311-467b-aca5-af83208293b4\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770060366, 1770060366, NULL, 'published', NULL, NULL),
(136, NULL, 'default', '{\"uuid\":\"791c66ec-23dc-4b02-a609-97bb669b1a69\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770060366, 1770060366, NULL, 'published', NULL, NULL),
(137, NULL, 'default', '{\"uuid\":\"9f8dbbb5-5bd7-4c47-afb8-7120d4348b5f\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770060708, 1770060708, NULL, 'published', NULL, NULL),
(138, NULL, 'default', '{\"uuid\":\"45de1e6d-b228-49d3-a300-5674ab289423\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770060708, 1770060708, NULL, 'published', NULL, NULL),
(139, NULL, 'default', '{\"uuid\":\"d98738e6-0b36-4598-9091-d4260b9cfc28\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770060727, 1770060727, NULL, 'published', NULL, NULL),
(140, NULL, 'default', '{\"uuid\":\"19da20b0-f302-4b12-a191-054f7919cfaa\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770060727, 1770060727, NULL, 'published', NULL, NULL),
(141, NULL, 'default', '{\"uuid\":\"8a20f6a4-d67c-42ad-b146-0b94d475181a\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770063122, 1770063122, NULL, 'published', NULL, NULL),
(142, NULL, 'default', '{\"uuid\":\"4a8d3044-9277-4c65-8416-92aa73c39255\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770063122, 1770063122, NULL, 'published', NULL, NULL),
(143, NULL, 'default', '{\"uuid\":\"24a034da-1c76-4a47-82bb-a7dd9f3a7edb\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770063140, 1770063140, NULL, 'published', NULL, NULL),
(144, NULL, 'default', '{\"uuid\":\"effb398a-82e7-4e55-b023-b0c5948c9227\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770063140, 1770063140, NULL, 'published', NULL, NULL),
(145, NULL, 'default', '{\"uuid\":\"7c64d1a1-48e5-4c85-8bef-1570e1ac2637\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770063140, 1770063140, NULL, 'published', NULL, NULL),
(146, NULL, 'default', '{\"uuid\":\"f25d5956-7615-4613-bfd3-4a922dc945dc\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770063140, 1770063140, NULL, 'published', NULL, NULL),
(147, NULL, 'default', '{\"uuid\":\"fed3e6d0-8471-4590-977a-86336e5f3856\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770063140, 1770063140, NULL, 'published', NULL, NULL),
(148, NULL, 'default', '{\"uuid\":\"8caacafa-ff86-4faf-938c-b002cf8eceed\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770063141, 1770063141, NULL, 'published', NULL, NULL),
(149, NULL, 'default', '{\"uuid\":\"cb141356-dc4d-4b4b-9a8f-d0fed5078218\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770063141, 1770063141, NULL, 'published', NULL, NULL),
(150, NULL, 'default', '{\"uuid\":\"7cc7fb21-fbfd-4bed-9073-554967a34973\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770063141, 1770063141, NULL, 'published', NULL, NULL),
(151, NULL, 'default', '{\"uuid\":\"9208dbc1-6181-48d2-bacc-d6d3586fb5be\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770063141, 1770063141, NULL, 'published', NULL, NULL),
(152, NULL, 'default', '{\"uuid\":\"56eff584-ab70-4aff-abde-2ba390eb0eab\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770063141, 1770063141, NULL, 'published', NULL, NULL);
INSERT INTO `jobs` (`id`, `company_id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`, `type`, `status`, `application_link`, `image`) VALUES
(153, NULL, 'default', '{\"uuid\":\"b0659de2-89b6-41eb-9b7d-ebcaff3d88c8\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770063207, 1770063207, NULL, 'published', NULL, NULL),
(154, NULL, 'default', '{\"uuid\":\"6a95316e-0815-40e0-b959-f45c97c0e67f\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770063207, 1770063207, NULL, 'published', NULL, NULL),
(155, NULL, 'default', '{\"uuid\":\"e092f36b-e73a-4f46-a78b-73e3d60b0872\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"command\":\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\"}}', 0, NULL, 1770063678, 1770063678, NULL, 'published', NULL, NULL),
(156, NULL, 'default', '{\"uuid\":\"9708d215-8ebc-48c7-9646-ca8162c4b5c2\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:16;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770063678, 1770063678, NULL, 'published', NULL, NULL),
(157, NULL, 'default', '{\"uuid\":\"a09d2cd5-a341-476f-8831-316689202ce1\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770063678, 1770063678, NULL, 'published', NULL, NULL),
(158, NULL, 'default', '{\"uuid\":\"3eee4749-3f92-44c1-bcc6-9cc8191b8fbe\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:16;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770063695, 1770063695, NULL, 'published', NULL, NULL),
(159, NULL, 'default', '{\"uuid\":\"d8bda9e0-f228-494c-a8f5-dee94af5556b\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770063695, 1770063695, NULL, 'published', NULL, NULL),
(160, NULL, 'default', '{\"uuid\":\"3ca03637-0df7-4514-9c3d-8baf60a0748a\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:16;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770063931, 1770063931, NULL, 'published', NULL, NULL),
(161, NULL, 'default', '{\"uuid\":\"ea3bf27b-b6b4-4c75-b1f2-dbc227d1c947\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770063932, 1770063932, NULL, 'published', NULL, NULL),
(162, NULL, 'default', '{\"uuid\":\"473846fd-6369-429b-b588-bcacaaeb48c9\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:16;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770063954, 1770063954, NULL, 'published', NULL, NULL),
(163, NULL, 'default', '{\"uuid\":\"05b1bde3-cdc4-4490-99d7-94dcc403ac01\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770063954, 1770063954, NULL, 'published', NULL, NULL),
(164, NULL, 'default', '{\"uuid\":\"6d4b1ad2-75b5-42e9-b2c8-017452b593fe\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"command\":\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\"}}', 0, NULL, 1770064008, 1770064008, NULL, 'published', NULL, NULL),
(165, NULL, 'default', '{\"uuid\":\"38855955-2f56-41ad-bbc3-a4b71f20491a\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:17;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064008, 1770064008, NULL, 'published', NULL, NULL),
(166, NULL, 'default', '{\"uuid\":\"10a83f17-90c3-4e67-9c6e-99fa931694d4\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064008, 1770064008, NULL, 'published', NULL, NULL),
(167, NULL, 'default', '{\"uuid\":\"050fc2e2-7250-40c2-8102-5586cdcc5050\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064045, 1770064045, NULL, 'published', NULL, NULL),
(168, NULL, 'default', '{\"uuid\":\"29928423-f3be-4527-bfdd-ff4e610bb17c\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064045, 1770064045, NULL, 'published', NULL, NULL),
(169, NULL, 'default', '{\"uuid\":\"4e5da37b-08c0-4121-a6b3-a1f18ca26478\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064045, 1770064045, NULL, 'published', NULL, NULL),
(170, NULL, 'default', '{\"uuid\":\"7ab43057-8f9a-4197-835c-3a12cc6cd13c\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064045, 1770064045, NULL, 'published', NULL, NULL),
(171, NULL, 'default', '{\"uuid\":\"58b72a66-8800-4967-a9f0-6045bd85c43b\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064045, 1770064045, NULL, 'published', NULL, NULL),
(172, NULL, 'default', '{\"uuid\":\"6a03f217-0709-4345-a3b9-5eb80b409bd1\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064045, 1770064045, NULL, 'published', NULL, NULL),
(173, NULL, 'default', '{\"uuid\":\"eeaa8d86-3ee0-4ee5-aad7-8b09bebce13e\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064045, 1770064045, NULL, 'published', NULL, NULL),
(174, NULL, 'default', '{\"uuid\":\"9d4aefad-ca87-450f-b2e1-64aedd8424ee\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064045, 1770064045, NULL, 'published', NULL, NULL),
(175, NULL, 'default', '{\"uuid\":\"58929e9c-22b9-49aa-980e-eedad55dfedc\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064045, 1770064045, NULL, 'published', NULL, NULL),
(176, NULL, 'default', '{\"uuid\":\"94b60737-71c8-4ff3-8abb-0abf319a30f3\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064045, 1770064045, NULL, 'published', NULL, NULL),
(177, NULL, 'default', '{\"uuid\":\"c0a89f17-ea71-4c66-90a4-5915b0a54f02\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:16;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064045, 1770064045, NULL, 'published', NULL, NULL),
(178, NULL, 'default', '{\"uuid\":\"6a2dc38c-62ab-416c-9c5d-35272be6b92a\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064045, 1770064045, NULL, 'published', NULL, NULL),
(179, NULL, 'default', '{\"uuid\":\"0d7e2e8e-de7c-41ba-830f-2e50fed0c765\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:17;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064045, 1770064045, NULL, 'published', NULL, NULL),
(180, NULL, 'default', '{\"uuid\":\"c96b43a7-09aa-42da-9e2e-1816972d07d7\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064045, 1770064045, NULL, 'published', NULL, NULL),
(181, NULL, 'default', '{\"uuid\":\"17f7d7c7-7993-4fca-b479-e3317070d084\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064417, 1770064417, NULL, 'published', NULL, NULL),
(182, NULL, 'default', '{\"uuid\":\"24e2ba74-1d76-4b35-8ade-e85a88973122\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064417, 1770064417, NULL, 'published', NULL, NULL),
(183, NULL, 'default', '{\"uuid\":\"c7f88c34-384b-4082-8ade-35cf950e3e5e\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064424, 1770064424, NULL, 'published', NULL, NULL),
(184, NULL, 'default', '{\"uuid\":\"f4e9182b-2557-4c22-9392-5c9ba81902c5\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064425, 1770064425, NULL, 'published', NULL, NULL),
(185, NULL, 'default', '{\"uuid\":\"117419e8-5a80-4448-b925-6579ad227756\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064425, 1770064425, NULL, 'published', NULL, NULL),
(186, NULL, 'default', '{\"uuid\":\"0c943a25-faee-4aed-844c-86938fd189a9\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064425, 1770064425, NULL, 'published', NULL, NULL),
(187, NULL, 'default', '{\"uuid\":\"2eb818c5-2e72-480f-a479-e8e641a20824\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064425, 1770064425, NULL, 'published', NULL, NULL),
(188, NULL, 'default', '{\"uuid\":\"cc039cad-805a-4a1c-ad31-e8f732100a13\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064425, 1770064425, NULL, 'published', NULL, NULL),
(189, NULL, 'default', '{\"uuid\":\"3aa5a15d-1a0b-4fcc-a350-cd9c1aafec83\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064425, 1770064425, NULL, 'published', NULL, NULL),
(190, NULL, 'default', '{\"uuid\":\"6fe0950b-5d6b-4197-9d00-6b8f869bb412\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064425, 1770064425, NULL, 'published', NULL, NULL),
(191, NULL, 'default', '{\"uuid\":\"eaf552fe-6b60-4f95-b9ef-1665fce706c0\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064425, 1770064425, NULL, 'published', NULL, NULL),
(192, NULL, 'default', '{\"uuid\":\"378f2241-0044-459d-ac90-022f79a9573f\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064425, 1770064425, NULL, 'published', NULL, NULL),
(193, NULL, 'default', '{\"uuid\":\"ffdec426-3304-47e1-a53e-8c357db0bd0c\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:16;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064425, 1770064425, NULL, 'published', NULL, NULL),
(194, NULL, 'default', '{\"uuid\":\"72eb6c99-064c-4b80-a774-6507e2cb868e\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064425, 1770064425, NULL, 'published', NULL, NULL),
(195, NULL, 'default', '{\"uuid\":\"058d85af-f132-4bce-88ae-3c762e07006d\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:17;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064425, 1770064425, NULL, 'published', NULL, NULL),
(196, NULL, 'default', '{\"uuid\":\"8cae2a51-0e1f-47b2-816b-dc259f2d7a6b\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064425, 1770064425, NULL, 'published', NULL, NULL),
(197, NULL, 'default', '{\"uuid\":\"071f83d2-0574-4694-8a5a-7b6c098a8dd0\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:17;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064494, 1770064494, NULL, 'published', NULL, NULL),
(198, NULL, 'default', '{\"uuid\":\"7591e4bb-3fe4-4ae5-b654-eafcc05d5757\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064494, 1770064494, NULL, 'published', NULL, NULL),
(199, NULL, 'default', '{\"uuid\":\"4aa24d66-4a21-4bbf-96a0-6e5c8ec96ec8\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064522, 1770064522, NULL, 'published', NULL, NULL),
(200, NULL, 'default', '{\"uuid\":\"bf7e0158-28f4-4efe-8c2a-8258f8bb82e0\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064523, 1770064523, NULL, 'published', NULL, NULL),
(201, NULL, 'default', '{\"uuid\":\"995689fc-b117-4f2f-bf1c-77c550d750bf\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:17;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064523, 1770064523, NULL, 'published', NULL, NULL),
(202, NULL, 'default', '{\"uuid\":\"24b5cb05-1ce5-4613-91d8-b71064eb4796\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064523, 1770064523, NULL, 'published', NULL, NULL),
(203, NULL, 'default', '{\"uuid\":\"0d756fd4-ed6e-4966-a0ad-aaf96ffe8894\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064523, 1770064523, NULL, 'published', NULL, NULL),
(204, NULL, 'default', '{\"uuid\":\"489b65d9-bb83-4fbc-a7eb-6ff0cf8d7314\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064523, 1770064523, NULL, 'published', NULL, NULL),
(205, NULL, 'default', '{\"uuid\":\"afca1e08-d2b2-42bb-afb3-3072e25248f1\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064523, 1770064523, NULL, 'published', NULL, NULL);
INSERT INTO `jobs` (`id`, `company_id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`, `type`, `status`, `application_link`, `image`) VALUES
(206, NULL, 'default', '{\"uuid\":\"5748f449-ba98-41a1-bb3d-c51836d92e5d\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064523, 1770064523, NULL, 'published', NULL, NULL),
(207, NULL, 'default', '{\"uuid\":\"db323aa2-eab6-4797-abff-7321024c5343\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064523, 1770064523, NULL, 'published', NULL, NULL),
(208, NULL, 'default', '{\"uuid\":\"024e303a-030c-44c0-830d-4e8d66944396\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064523, 1770064523, NULL, 'published', NULL, NULL),
(209, NULL, 'default', '{\"uuid\":\"62443c9c-3a38-4475-b4ba-da4d389f704d\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064523, 1770064523, NULL, 'published', NULL, NULL),
(210, NULL, 'default', '{\"uuid\":\"5c62d397-b152-401c-aa02-390513b93167\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064523, 1770064523, NULL, 'published', NULL, NULL),
(211, NULL, 'default', '{\"uuid\":\"ea22b69a-abb2-4f0f-8b4c-11dd9e0dcf02\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:16;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064523, 1770064523, NULL, 'published', NULL, NULL),
(212, NULL, 'default', '{\"uuid\":\"7060c88b-384d-49f6-a7fb-499cc4027e08\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064523, 1770064523, NULL, 'published', NULL, NULL),
(213, NULL, 'default', '{\"uuid\":\"39dc4e83-f8e2-42c9-8d40-7bfda6c12050\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"command\":\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}}\"}}', 0, NULL, 1770064590, 1770064590, NULL, 'published', NULL, NULL),
(214, NULL, 'default', '{\"uuid\":\"9098b5d7-4806-47ec-9fca-e50729d47a97\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:18;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064590, 1770064590, NULL, 'published', NULL, NULL),
(215, NULL, 'default', '{\"uuid\":\"f0f35257-7acb-4018-852c-fcf248988575\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064591, 1770064591, NULL, 'published', NULL, NULL),
(216, NULL, 'default', '{\"uuid\":\"0e16b51f-7995-4452-9f0d-97d3cbc687ff\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"command\":\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}}\"}}', 0, NULL, 1770064774, 1770064774, NULL, 'published', NULL, NULL),
(217, NULL, 'default', '{\"uuid\":\"3aea9068-3e47-4035-8d25-89e3b9fbfb2c\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:19;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064774, 1770064774, NULL, 'published', NULL, NULL),
(218, NULL, 'default', '{\"uuid\":\"c5cb4e98-31ad-4209-93ac-e4f5526677aa\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064774, 1770064774, NULL, 'published', NULL, NULL),
(219, NULL, 'default', '{\"uuid\":\"e4b2ef2a-0fab-4f40-98b7-51a7424afb0c\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064841, 1770064841, NULL, 'published', NULL, NULL),
(220, NULL, 'default', '{\"uuid\":\"737dcb1d-6d9f-4816-975a-d89f95fb7268\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064841, 1770064841, NULL, 'published', NULL, NULL),
(221, NULL, 'default', '{\"uuid\":\"6c4b4bb8-2736-4c7f-9409-bad7f9772413\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:17;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064841, 1770064841, NULL, 'published', NULL, NULL),
(222, NULL, 'default', '{\"uuid\":\"2c8fe6c4-db6e-4294-a55c-8d36db7b2d8f\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064841, 1770064841, NULL, 'published', NULL, NULL),
(223, NULL, 'default', '{\"uuid\":\"a3735f27-0032-4965-8d7c-a7c09153d4ee\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064841, 1770064841, NULL, 'published', NULL, NULL),
(224, NULL, 'default', '{\"uuid\":\"ecfd4d76-a556-44fe-bd49-d826791511ce\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064841, 1770064841, NULL, 'published', NULL, NULL),
(225, NULL, 'default', '{\"uuid\":\"5a998867-34e8-4d86-8408-6faac09ed759\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064841, 1770064841, NULL, 'published', NULL, NULL),
(226, NULL, 'default', '{\"uuid\":\"786a9f5c-d5af-4c1d-909f-93aad2d2ec6f\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064841, 1770064841, NULL, 'published', NULL, NULL),
(227, NULL, 'default', '{\"uuid\":\"22f76512-f1ea-4898-9f3c-8b125b2693b4\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064841, 1770064841, NULL, 'published', NULL, NULL),
(228, NULL, 'default', '{\"uuid\":\"2bcf4d53-3062-4b7d-85a2-a960f460890c\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064841, 1770064841, NULL, 'published', NULL, NULL),
(229, NULL, 'default', '{\"uuid\":\"4605c2bd-464b-4b87-81f7-215d8d4464d6\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064841, 1770064841, NULL, 'published', NULL, NULL),
(230, NULL, 'default', '{\"uuid\":\"23a0c06b-281d-487c-a3d0-e17f67d36625\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064841, 1770064841, NULL, 'published', NULL, NULL),
(231, NULL, 'default', '{\"uuid\":\"9b1b36ff-3522-4f58-8ec1-0afc4e3e736c\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:19;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064841, 1770064841, NULL, 'published', NULL, NULL),
(232, NULL, 'default', '{\"uuid\":\"a7ea1764-7df4-4630-acfa-56f10b9c98db\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064841, 1770064841, NULL, 'published', NULL, NULL),
(233, NULL, 'default', '{\"uuid\":\"8c833887-5100-41cc-ad0a-22917d906f34\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:16;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064841, 1770064841, NULL, 'published', NULL, NULL),
(234, NULL, 'default', '{\"uuid\":\"436b4e9d-de78-46de-883e-5137e2f3637d\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064841, 1770064841, NULL, 'published', NULL, NULL),
(235, NULL, 'default', '{\"uuid\":\"a127105f-54c9-47df-aac3-f34751ef9ca4\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:18;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770064841, 1770064841, NULL, 'published', NULL, NULL),
(236, NULL, 'default', '{\"uuid\":\"457c8204-cfbe-4ad4-b399-05101c03ef3b\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770064841, 1770064841, NULL, 'published', NULL, NULL),
(237, NULL, 'default', '{\"uuid\":\"eca376d7-e640-4f2a-b3e3-dea299e95d6f\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065161, 1770065161, NULL, 'published', NULL, NULL),
(238, NULL, 'default', '{\"uuid\":\"52a927a2-1e59-452c-af5b-829eaed05fca\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065161, 1770065161, NULL, 'published', NULL, NULL),
(239, NULL, 'default', '{\"uuid\":\"7879db00-f3d5-4982-8360-e8b0425522f8\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:17;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065161, 1770065161, NULL, 'published', NULL, NULL),
(240, NULL, 'default', '{\"uuid\":\"828c55a9-e9f7-476f-84c8-b5784b41353f\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065162, 1770065162, NULL, 'published', NULL, NULL),
(241, NULL, 'default', '{\"uuid\":\"e9505233-ef73-4ec5-8f9b-b0f3542292fb\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065162, 1770065162, NULL, 'published', NULL, NULL),
(242, NULL, 'default', '{\"uuid\":\"d3814475-9ff7-485b-a318-28ef38154f96\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065162, 1770065162, NULL, 'published', NULL, NULL),
(243, NULL, 'default', '{\"uuid\":\"28e73003-15fe-4cdf-bdf5-03af83e3087f\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065162, 1770065162, NULL, 'published', NULL, NULL),
(244, NULL, 'default', '{\"uuid\":\"10a9b22f-9a13-491e-a0df-3c001119ac78\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065162, 1770065162, NULL, 'published', NULL, NULL),
(245, NULL, 'default', '{\"uuid\":\"1af6ed0d-45c7-42d2-871e-16e63066c6d4\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065162, 1770065162, NULL, 'published', NULL, NULL),
(246, NULL, 'default', '{\"uuid\":\"3c8419d7-25c9-4319-9f29-6ba9b15e91eb\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065162, 1770065162, NULL, 'published', NULL, NULL),
(247, NULL, 'default', '{\"uuid\":\"22453210-1d9e-445d-a660-27d965b4f497\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065162, 1770065162, NULL, 'published', NULL, NULL),
(248, NULL, 'default', '{\"uuid\":\"cb8d5130-2358-45a0-9c6c-3f2de16718be\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065162, 1770065162, NULL, 'published', NULL, NULL),
(249, NULL, 'default', '{\"uuid\":\"623e4071-f2eb-4f5c-bfd3-71d6de76880a\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:19;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065162, 1770065162, NULL, 'published', NULL, NULL),
(250, NULL, 'default', '{\"uuid\":\"e7aeb7cf-3a09-4608-b21e-d28283fe8789\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065162, 1770065162, NULL, 'published', NULL, NULL),
(251, NULL, 'default', '{\"uuid\":\"e8018c5f-687c-4eda-8210-ad4cf44b16d5\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:16;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065162, 1770065162, NULL, 'published', NULL, NULL),
(252, NULL, 'default', '{\"uuid\":\"74533720-225d-4f6d-9d43-b1b456fb81a8\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065162, 1770065162, NULL, 'published', NULL, NULL),
(253, NULL, 'default', '{\"uuid\":\"db0a9224-4ac0-403c-a912-2001dc19e11b\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:18;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065162, 1770065162, NULL, 'published', NULL, NULL),
(254, NULL, 'default', '{\"uuid\":\"2a1030c0-73a3-425f-96e4-f61e245c0115\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065162, 1770065162, NULL, 'published', NULL, NULL),
(255, NULL, 'default', '{\"uuid\":\"7e06f2aa-d81f-41d8-9e96-f5d693cdd016\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065171, 1770065171, NULL, 'published', NULL, NULL),
(256, NULL, 'default', '{\"uuid\":\"5826481b-fa18-438c-92a4-5b64754d0d11\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065171, 1770065171, NULL, 'published', NULL, NULL),
(257, NULL, 'default', '{\"uuid\":\"b8b7791f-00b4-4988-a404-13cc8eb3c802\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:17;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065171, 1770065171, NULL, 'published', NULL, NULL),
(258, NULL, 'default', '{\"uuid\":\"0c1281f5-bb52-4ec0-8e1c-83b8d9dbce50\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065171, 1770065171, NULL, 'published', NULL, NULL);
INSERT INTO `jobs` (`id`, `company_id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`, `type`, `status`, `application_link`, `image`) VALUES
(259, NULL, 'default', '{\"uuid\":\"407f1ac8-6be7-4ed0-a4d7-8bd5753a2fbd\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065171, 1770065171, NULL, 'published', NULL, NULL),
(260, NULL, 'default', '{\"uuid\":\"efb8bfe2-fc9c-4208-b35f-d4c13301e54a\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065171, 1770065171, NULL, 'published', NULL, NULL),
(261, NULL, 'default', '{\"uuid\":\"efdd279f-9ad5-4f7a-acfe-1f866a6e3ebb\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065171, 1770065171, NULL, 'published', NULL, NULL),
(262, NULL, 'default', '{\"uuid\":\"262e1774-ff54-4b6d-815e-e80ca2f44664\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065171, 1770065171, NULL, 'published', NULL, NULL),
(263, NULL, 'default', '{\"uuid\":\"d5625cb1-b559-404e-a08b-af7aeda87309\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065171, 1770065171, NULL, 'published', NULL, NULL),
(264, NULL, 'default', '{\"uuid\":\"e31a9fbf-0757-40cd-8447-f584df76dc71\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065171, 1770065171, NULL, 'published', NULL, NULL),
(265, NULL, 'default', '{\"uuid\":\"879b2403-b427-4887-83b9-b0ddf6c18a4b\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065171, 1770065171, NULL, 'published', NULL, NULL),
(266, NULL, 'default', '{\"uuid\":\"ca652b67-45e7-4a26-abf0-8f377e6337b3\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065171, 1770065171, NULL, 'published', NULL, NULL),
(267, NULL, 'default', '{\"uuid\":\"b2532461-dd6f-4c66-8bde-cc38fa366c88\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:19;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065171, 1770065171, NULL, 'published', NULL, NULL),
(268, NULL, 'default', '{\"uuid\":\"4fa70eed-a719-4407-88db-8aec863659be\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065171, 1770065171, NULL, 'published', NULL, NULL),
(269, NULL, 'default', '{\"uuid\":\"513bfe44-43a0-47c1-9f43-e5f20d28cea4\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:16;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065171, 1770065171, NULL, 'published', NULL, NULL),
(270, NULL, 'default', '{\"uuid\":\"f2e64b25-4345-4b73-8de6-89cded302792\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065171, 1770065171, NULL, 'published', NULL, NULL),
(271, NULL, 'default', '{\"uuid\":\"98cd064f-7a28-4671-a99a-2d79e13b5345\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:18;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065172, 1770065172, NULL, 'published', NULL, NULL),
(272, NULL, 'default', '{\"uuid\":\"5b676bfe-3747-4b1f-ba78-2ed27c021a8a\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065172, 1770065172, NULL, 'published', NULL, NULL),
(273, NULL, 'default', '{\"uuid\":\"830a9344-ef3a-4e71-8868-10fda31268a9\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:19;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065188, 1770065188, NULL, 'published', NULL, NULL),
(274, NULL, 'default', '{\"uuid\":\"ef088358-8aad-4cc9-83cf-62ad2259f94b\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065188, 1770065188, NULL, 'published', NULL, NULL),
(275, NULL, 'default', '{\"uuid\":\"62b2ad2a-ee94-4fc4-81e9-54a7dda321fc\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065232, 1770065232, NULL, 'published', NULL, NULL),
(276, NULL, 'default', '{\"uuid\":\"6997b1fe-d762-46b9-9741-2d8884c637fb\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065232, 1770065232, NULL, 'published', NULL, NULL),
(277, NULL, 'default', '{\"uuid\":\"b25f8dc9-6ac6-447f-9c0a-6bdf22e9a4e5\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:17;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065232, 1770065232, NULL, 'published', NULL, NULL),
(278, NULL, 'default', '{\"uuid\":\"7c31dca6-f23f-4d48-8682-7b2a38ec2074\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065233, 1770065233, NULL, 'published', NULL, NULL),
(279, NULL, 'default', '{\"uuid\":\"283c40c2-ec57-46e1-b6d5-d6ed80cc7e00\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065233, 1770065233, NULL, 'published', NULL, NULL),
(280, NULL, 'default', '{\"uuid\":\"4bd797ed-c23c-4028-a892-6a1b2f893133\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065233, 1770065233, NULL, 'published', NULL, NULL),
(281, NULL, 'default', '{\"uuid\":\"d3df717f-8c6e-4245-9ce8-ca62cbe1a47e\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065233, 1770065233, NULL, 'published', NULL, NULL),
(282, NULL, 'default', '{\"uuid\":\"3c6462a5-3b87-4bf5-a9c9-f03c3fa99e06\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065233, 1770065233, NULL, 'published', NULL, NULL),
(283, NULL, 'default', '{\"uuid\":\"e347cc39-fe65-41aa-9ee7-c43332061be8\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065233, 1770065233, NULL, 'published', NULL, NULL),
(284, NULL, 'default', '{\"uuid\":\"98f17d1c-59e7-48dc-84d7-d09e84de941f\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065233, 1770065233, NULL, 'published', NULL, NULL),
(285, NULL, 'default', '{\"uuid\":\"0d64847b-9ebf-435d-85be-9b2324dc3744\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065233, 1770065233, NULL, 'published', NULL, NULL),
(286, NULL, 'default', '{\"uuid\":\"97ffc6dc-9aa7-4c87-b0af-bf01c46e6748\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065233, 1770065233, NULL, 'published', NULL, NULL),
(287, NULL, 'default', '{\"uuid\":\"3eb88226-0efc-4aa4-857f-e1113755682d\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:19;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065233, 1770065233, NULL, 'published', NULL, NULL),
(288, NULL, 'default', '{\"uuid\":\"d043b7c8-f797-4fe5-a697-3262c6ebc6f1\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065233, 1770065233, NULL, 'published', NULL, NULL),
(289, NULL, 'default', '{\"uuid\":\"172e1e0e-e841-47e1-ad77-e936f4a30e9f\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:16;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065233, 1770065233, NULL, 'published', NULL, NULL),
(290, NULL, 'default', '{\"uuid\":\"1935568e-9974-4870-999e-3cf3f6bfd062\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065233, 1770065233, NULL, 'published', NULL, NULL),
(291, NULL, 'default', '{\"uuid\":\"27dfb49a-8f7e-4986-82c7-cc842f61fa8a\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:18;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065233, 1770065233, NULL, 'published', NULL, NULL),
(292, NULL, 'default', '{\"uuid\":\"4665a8aa-2928-4303-9e43-8584226d4a97\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065233, 1770065233, NULL, 'published', NULL, NULL),
(293, NULL, 'default', '{\"uuid\":\"21e290f5-7b0c-4e7b-bc4b-2581cbf1f407\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065945, 1770065945, NULL, 'published', NULL, NULL),
(294, NULL, 'default', '{\"uuid\":\"a09e47ae-04c1-4d2e-9c67-06558ac6bc12\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065946, 1770065946, NULL, 'published', NULL, NULL),
(295, NULL, 'default', '{\"uuid\":\"143bfd43-db25-4b0b-be72-9533fe913b46\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:17;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065946, 1770065946, NULL, 'published', NULL, NULL),
(296, NULL, 'default', '{\"uuid\":\"362c81d6-2600-4fdc-9742-e5e494259ea9\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065946, 1770065946, NULL, 'published', NULL, NULL),
(297, NULL, 'default', '{\"uuid\":\"bf4ceb78-6616-4c47-9c6f-5f926e813373\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065946, 1770065946, NULL, 'published', NULL, NULL),
(298, NULL, 'default', '{\"uuid\":\"0e880796-bf9e-44b7-86f5-e1c84a26389d\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065946, 1770065946, NULL, 'published', NULL, NULL),
(299, NULL, 'default', '{\"uuid\":\"ad17354f-c28b-4df7-aeda-a4cd08c5fc27\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065946, 1770065946, NULL, 'published', NULL, NULL),
(300, NULL, 'default', '{\"uuid\":\"916fee05-649d-44aa-a81d-7bf1023f5378\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065946, 1770065946, NULL, 'published', NULL, NULL),
(301, NULL, 'default', '{\"uuid\":\"d0ec69e8-ae34-485d-bc41-472512d9d8ef\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065946, 1770065946, NULL, 'published', NULL, NULL),
(302, NULL, 'default', '{\"uuid\":\"e9313260-9c82-4ffc-8b40-dcf3e51d5601\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065946, 1770065946, NULL, 'published', NULL, NULL),
(303, NULL, 'default', '{\"uuid\":\"ca8045b6-a0df-4723-9304-98185adda29c\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065946, 1770065946, NULL, 'published', NULL, NULL),
(304, NULL, 'default', '{\"uuid\":\"3a918f59-ac21-4e66-bbc0-2682b57f18a6\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065946, 1770065946, NULL, 'published', NULL, NULL),
(305, NULL, 'default', '{\"uuid\":\"a9e6d4cb-6416-4bfa-8d86-73445e3c5e95\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:19;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065946, 1770065946, NULL, 'published', NULL, NULL),
(306, NULL, 'default', '{\"uuid\":\"839b7e8d-b116-412a-9e06-fba3d0c6405c\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065946, 1770065946, NULL, 'published', NULL, NULL),
(307, NULL, 'default', '{\"uuid\":\"bdb04143-62cc-476d-b164-57f9e2df9a69\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:16;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065946, 1770065946, NULL, 'published', NULL, NULL),
(308, NULL, 'default', '{\"uuid\":\"e3ac3fd5-f1a9-42be-b66c-12a116cbd8de\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065946, 1770065946, NULL, 'published', NULL, NULL),
(309, NULL, 'default', '{\"uuid\":\"7d3f81a0-bee6-4a05-a760-ba93fd58bb31\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:18;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770065946, 1770065946, NULL, 'published', NULL, NULL),
(310, NULL, 'default', '{\"uuid\":\"4cad380a-bad1-464a-a408-702a4112d090\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770065946, 1770065946, NULL, 'published', NULL, NULL);
INSERT INTO `jobs` (`id`, `company_id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`, `type`, `status`, `application_link`, `image`) VALUES
(311, NULL, 'default', '{\"uuid\":\"8e873784-70c1-4ea0-8c83-0787a917f31e\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"command\":\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:20;}}\"}}', 0, NULL, 1770066770, 1770066770, NULL, 'published', NULL, NULL),
(312, NULL, 'default', '{\"uuid\":\"f27e0149-4d40-4d03-a967-43a863644679\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:20;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770066770, 1770066770, NULL, 'published', NULL, NULL),
(313, NULL, 'default', '{\"uuid\":\"5cfad296-56a1-4e46-b082-4dd6ed3d5de1\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:20;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:20;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:20;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770066771, 1770066771, NULL, 'published', NULL, NULL),
(314, NULL, 'default', '{\"uuid\":\"1e8642b5-eb18-473e-ae1f-63fcf42b0506\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770066806, 1770066806, NULL, 'published', NULL, NULL),
(315, NULL, 'default', '{\"uuid\":\"43e194ba-afeb-4783-b53d-3b2ad6d04bbf\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770066807, 1770066807, NULL, 'published', NULL, NULL),
(316, NULL, 'default', '{\"uuid\":\"1ac551ef-0079-4b2e-9cc7-d87d785e4200\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:20;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770066807, 1770066807, NULL, 'published', NULL, NULL),
(317, NULL, 'default', '{\"uuid\":\"ae84b35a-47a4-4090-8270-c65b2e03dc6c\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:20;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:20;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:20;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770066807, 1770066807, NULL, 'published', NULL, NULL),
(318, NULL, 'default', '{\"uuid\":\"a2ff9f95-79be-4918-9a13-f4d1b2a310fe\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:17;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770066807, 1770066807, NULL, 'published', NULL, NULL),
(319, NULL, 'default', '{\"uuid\":\"6f0726d2-d553-45a8-912c-8324fa666e37\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770066807, 1770066807, NULL, 'published', NULL, NULL),
(320, NULL, 'default', '{\"uuid\":\"1c4ac998-ba6c-4fdf-9267-14101c05a5d0\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770066807, 1770066807, NULL, 'published', NULL, NULL),
(321, NULL, 'default', '{\"uuid\":\"901258d2-a897-4d49-9464-e19673d5aa10\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770066807, 1770066807, NULL, 'published', NULL, NULL),
(322, NULL, 'default', '{\"uuid\":\"b8e34de0-026a-438a-b743-73535f0d799d\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770066807, 1770066807, NULL, 'published', NULL, NULL),
(323, NULL, 'default', '{\"uuid\":\"d3246210-7927-4130-99ad-c6f0d8489946\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770066807, 1770066807, NULL, 'published', NULL, NULL),
(324, NULL, 'default', '{\"uuid\":\"820ef1b8-3d60-426a-880e-ff432cd2824a\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770066807, 1770066807, NULL, 'published', NULL, NULL),
(325, NULL, 'default', '{\"uuid\":\"1b602d2a-cb04-4f94-8f1d-9bee7ed13fc7\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770066808, 1770066808, NULL, 'published', NULL, NULL),
(326, NULL, 'default', '{\"uuid\":\"c3d1301e-c0b7-4f6b-92de-cbc0eb9dd341\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770066808, 1770066808, NULL, 'published', NULL, NULL),
(327, NULL, 'default', '{\"uuid\":\"b30dc1df-5b23-419f-a581-422bf9540efe\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770066808, 1770066808, NULL, 'published', NULL, NULL),
(328, NULL, 'default', '{\"uuid\":\"2ce259f6-cbbf-4834-bbbb-11916d654ed7\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:19;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770066808, 1770066808, NULL, 'published', NULL, NULL),
(329, NULL, 'default', '{\"uuid\":\"49590324-24da-4042-b34f-5f54899d87b6\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770066808, 1770066808, NULL, 'published', NULL, NULL),
(330, NULL, 'default', '{\"uuid\":\"ef48389d-96b6-462a-a9b6-e13d082d353a\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:16;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770066808, 1770066808, NULL, 'published', NULL, NULL),
(331, NULL, 'default', '{\"uuid\":\"244932d6-97d4-4628-be5f-d0cd8f620608\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770066808, 1770066808, NULL, 'published', NULL, NULL),
(332, NULL, 'default', '{\"uuid\":\"8d370759-ef2b-4588-bf2f-735e088a4842\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:18;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770066808, 1770066808, NULL, 'published', NULL, NULL),
(333, NULL, 'default', '{\"uuid\":\"f04c4a98-914b-4d19-9f10-c41e4a90b8fc\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:18;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770066808, 1770066808, NULL, 'published', NULL, NULL),
(334, NULL, 'default', '{\"uuid\":\"f4092be0-f18d-4ce9-b829-adb4348248e4\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"command\":\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:21;}}\"}}', 0, NULL, 1770067311, 1770067311, NULL, 'published', NULL, NULL),
(335, NULL, 'default', '{\"uuid\":\"e618e66f-6b17-47c3-8ba7-b5e029255849\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:21;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770067311, 1770067311, NULL, 'published', NULL, NULL),
(336, NULL, 'default', '{\"uuid\":\"03f4bdb1-d3fb-4d72-ab8c-dda54450efe5\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:21;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:21;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:21;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770067312, 1770067312, NULL, 'published', NULL, NULL),
(337, NULL, 'default', '{\"uuid\":\"d02606a8-7509-4efd-ac27-72296c274e39\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770067432, 1770067432, NULL, 'published', NULL, NULL),
(338, NULL, 'default', '{\"uuid\":\"ef88d62e-5f80-4440-977f-b67d800f3b88\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:12;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770067432, 1770067432, NULL, 'published', NULL, NULL),
(339, NULL, 'default', '{\"uuid\":\"ba1b6ec3-05c0-402b-a78a-3b0fd158ec79\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:20;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770067432, 1770067432, NULL, 'published', NULL, NULL),
(340, NULL, 'default', '{\"uuid\":\"6239459e-28ef-4777-aa07-24bc42f4276e\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:20;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:20;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:20;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770067432, 1770067432, NULL, 'published', NULL, NULL),
(341, NULL, 'default', '{\"uuid\":\"f81e8278-6626-48c7-ae2d-376e3bf8673e\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:17;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770067432, 1770067432, NULL, 'published', NULL, NULL),
(342, NULL, 'default', '{\"uuid\":\"bb2d4fb7-fcbf-4285-bd75-7e24ebd4232c\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:17;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770067432, 1770067432, NULL, 'published', NULL, NULL),
(343, NULL, 'default', '{\"uuid\":\"951990cc-3e79-4c2c-829f-4ef39aa30577\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770067432, 1770067432, NULL, 'published', NULL, NULL),
(344, NULL, 'default', '{\"uuid\":\"cfbd6c6f-cf81-4d93-908e-6cc139e386b5\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:11;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770067433, 1770067433, NULL, 'published', NULL, NULL),
(345, NULL, 'default', '{\"uuid\":\"953c25ea-fe76-4f4a-a813-8d9a00020429\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770067433, 1770067433, NULL, 'published', NULL, NULL),
(346, NULL, 'default', '{\"uuid\":\"8e310f82-3b35-4e17-9378-72bb86e37209\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:13;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770067433, 1770067433, NULL, 'published', NULL, NULL),
(347, NULL, 'default', '{\"uuid\":\"ad267d78-551f-4248-be58-890ab21d2553\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770067433, 1770067433, NULL, 'published', NULL, NULL),
(348, NULL, 'default', '{\"uuid\":\"e911568a-8ff0-47e0-8905-4e569d34aef5\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:14;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770067433, 1770067433, NULL, 'published', NULL, NULL),
(349, NULL, 'default', '{\"uuid\":\"4552cf7a-14bc-441c-b08d-09a790eaab07\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:15;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770067433, 1770067433, NULL, 'published', NULL, NULL),
(350, NULL, 'default', '{\"uuid\":\"cf4f45e5-5589-4a23-aa2e-c8cb3d5f0663\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:15;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770067433, 1770067433, NULL, 'published', NULL, NULL),
(351, NULL, 'default', '{\"uuid\":\"0cfbb4d1-2777-474d-9d92-c5912137f487\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:19;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770067433, 1770067433, NULL, 'published', NULL, NULL),
(352, NULL, 'default', '{\"uuid\":\"d6058e85-6456-43f3-834d-c0697026cb87\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:19;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770067433, 1770067433, NULL, 'published', NULL, NULL),
(353, NULL, 'default', '{\"uuid\":\"fd7188d7-55a4-4281-aa53-e7ac61e1bd56\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:16;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770067433, 1770067433, NULL, 'published', NULL, NULL),
(354, NULL, 'default', '{\"uuid\":\"b879e1de-021e-4643-8314-42a1e746ccee\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:16;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770067433, 1770067433, NULL, 'published', NULL, NULL),
(355, NULL, 'default', '{\"uuid\":\"16557df6-1a12-47fe-99b5-bba75f472597\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:21;s:9:\\\"relations\\\";a:1:{i:0;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770067433, 1770067433, NULL, 'published', NULL, NULL),
(356, NULL, 'default', '{\"uuid\":\"04a1ab71-b63a-4105-a0b6-c0bab9ecc59e\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:21;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:21;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:21;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770067434, 1770067434, NULL, 'published', NULL, NULL),
(357, NULL, 'default', '{\"uuid\":\"e27fa952-6998-4329-95a8-8bef551308ac\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\",\"command\":\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:25;}}\"}}', 0, NULL, 1770069305, 1770069305, NULL, 'published', NULL, NULL),
(358, NULL, 'default', '{\"uuid\":\"8b5fd55f-74f2-4aca-8949-cbc38d1f77dc\",\"displayName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\",\"command\":\"O:48:\\\"Webkul\\\\CatalogRule\\\\Jobs\\\\UpdateCreateProductIndex\\\":1:{s:10:\\\"\\u0000*\\u0000product\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:25;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 0, NULL, 1770069306, 1770069306, NULL, 'published', NULL, NULL),
(359, NULL, 'default', '{\"uuid\":\"f4f06667-370a-4515-80a7-d613ec89e7c5\",\"displayName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\",\"command\":\"O:46:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreateInventoryIndex\\\":3:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:25;}s:7:\\\"chained\\\";a:2:{i:0;s:90:\\\"O:42:\\\"Webkul\\\\Product\\\\Jobs\\\\UpdateCreatePriceIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:25;}}\\\";i:1;s:99:\\\"O:51:\\\"Webkul\\\\Product\\\\Jobs\\\\ElasticSearch\\\\UpdateCreateIndex\\\":1:{s:13:\\\"\\u0000*\\u0000productIds\\\";a:1:{i:0;i:25;}}\\\";}s:19:\\\"chainCatchCallbacks\\\";a:0:{}}\"}}', 0, NULL, 1770069306, 1770069306, NULL, 'published', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `job_listing_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `applicant_name` varchar(255) NOT NULL,
  `applicant_email` varchar(255) NOT NULL,
  `applicant_phone` varchar(255) DEFAULT NULL,
  `cover_letter` text DEFAULT NULL,
  `resume_path` varchar(255) DEFAULT NULL,
  `status` enum('pending','reviewed','rejected','accepted') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_job_ids` text NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `name`, `name_ar`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'قسم التكنولوجي', 'قسم التكنولوجي', 'التكنولوجي', NULL, 1, '2026-02-01 14:35:03', '2026-02-01 14:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `job_listings`
--

CREATE TABLE `job_listings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `description_ar` text DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `requirements_ar` text DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL DEFAULT 'Egypt',
  `job_type` enum('full-time','part-time','contract','freelance') NOT NULL,
  `salary_range` varchar(255) DEFAULT NULL,
  `experience_level` varchar(255) DEFAULT NULL,
  `application_url` varchar(255) NOT NULL,
  `job_category_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `expires_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_listings`
--

INSERT INTO `job_listings` (`id`, `title`, `title_ar`, `slug`, `description`, `description_ar`, `requirements`, `requirements_ar`, `company_name`, `company_logo`, `location`, `city`, `country`, `job_type`, `salary_range`, `experience_level`, `application_url`, `job_category_id`, `customer_id`, `status`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'مطور ويب', NULL, 'web-developer-1', 'نبحث عن مطور ويب محترف', NULL, NULL, NULL, 'شركة التقنية', NULL, '', 'القاهرة', 'Egypt', 'full-time', NULL, NULL, '', 1, 0, 1, NULL, '2026-02-01 14:46:55', '2026-02-01 14:46:55'),
(2, 'مصمم جرافيك', NULL, 'graphic-designer-1', 'نبحث عن مصمم جرافيك مبدع', NULL, NULL, NULL, 'شركة الإبداع', NULL, '', 'الرياض', 'Egypt', 'part-time', NULL, NULL, '', 1, 0, 1, NULL, '2026-02-01 14:46:55', '2026-02-01 14:46:55'),
(3, '9شارع الوظيفه', NULL, '9sharaa-alothyfh-1769945297', 'وصف الوظيفة *', NULL, NULL, NULL, 'عمر', NULL, '', 'cairo', 'Egypt', 'contract', NULL, NULL, '', 1, 0, 0, NULL, '2026-02-01 14:58:17', '2026-02-01 15:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `locales`
--

CREATE TABLE `locales` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `direction` enum('ltr','rtl') NOT NULL DEFAULT 'ltr',
  `logo_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locales`
--

INSERT INTO `locales` (`id`, `code`, `name`, `direction`, `logo_path`, `created_at`, `updated_at`) VALUES
(1, 'en', 'English', 'ltr', 'locales/PMJRinzxNMJTm9wuuTth7FrzmWInj6xYcNzbAHDk.png', NULL, NULL),
(2, 'ar', 'العربية', 'rtl', NULL, '2026-01-26 19:20:09', '2026-01-26 19:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `marketing_campaigns`
--

CREATE TABLE `marketing_campaigns` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `type` varchar(255) NOT NULL,
  `mail_to` varchar(255) NOT NULL,
  `spooling` varchar(255) DEFAULT NULL,
  `channel_id` int(10) UNSIGNED DEFAULT NULL,
  `customer_group_id` int(10) UNSIGNED DEFAULT NULL,
  `marketing_template_id` int(10) UNSIGNED DEFAULT NULL,
  `marketing_event_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marketing_events`
--

CREATE TABLE `marketing_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marketing_events`
--

INSERT INTO `marketing_events` (`id`, `name`, `description`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Birthday', 'Birthday', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `marketing_templates`
--

CREATE TABLE `marketing_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `content` text NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_admin_password_resets_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_06_12_111907_create_admins_table', 1),
(5, '2018_06_13_055341_create_roles_table', 1),
(6, '2018_07_05_130148_create_attributes_table', 1),
(7, '2018_07_05_132854_create_attribute_translations_table', 1),
(8, '2018_07_05_135150_create_attribute_families_table', 1),
(9, '2018_07_05_135152_create_attribute_groups_table', 1),
(10, '2018_07_05_140832_create_attribute_options_table', 1),
(11, '2018_07_05_140856_create_attribute_option_translations_table', 1),
(12, '2018_07_05_142820_create_categories_table', 1),
(13, '2018_07_10_055143_create_locales_table', 1),
(14, '2018_07_20_054426_create_countries_table', 1),
(15, '2018_07_20_054502_create_currencies_table', 1),
(16, '2018_07_20_054542_create_currency_exchange_rates_table', 1),
(17, '2018_07_20_064849_create_channels_table', 1),
(18, '2018_07_21_142836_create_category_translations_table', 1),
(19, '2018_07_23_110040_create_inventory_sources_table', 1),
(20, '2018_07_24_082635_create_customer_groups_table', 1),
(21, '2018_07_24_082930_create_customers_table', 1),
(22, '2018_07_27_065727_create_products_table', 1),
(23, '2018_07_27_070011_create_product_attribute_values_table', 1),
(24, '2018_07_27_092623_create_product_reviews_table', 1),
(25, '2018_07_27_113941_create_product_images_table', 1),
(26, '2018_07_27_113956_create_product_inventories_table', 1),
(27, '2018_08_30_064755_create_tax_categories_table', 1),
(28, '2018_08_30_065042_create_tax_rates_table', 1),
(29, '2018_08_30_065840_create_tax_mappings_table', 1),
(30, '2018_09_05_150444_create_cart_table', 1),
(31, '2018_09_05_150915_create_cart_items_table', 1),
(32, '2018_09_11_064045_customer_password_resets', 1),
(33, '2018_09_19_093453_create_cart_payment', 1),
(34, '2018_09_19_093508_create_cart_shipping_rates_table', 1),
(35, '2018_09_20_060658_create_core_config_table', 1),
(36, '2018_09_27_113154_create_orders_table', 1),
(37, '2018_09_27_113207_create_order_items_table', 1),
(38, '2018_09_27_115022_create_shipments_table', 1),
(39, '2018_09_27_115029_create_shipment_items_table', 1),
(40, '2018_09_27_115135_create_invoices_table', 1),
(41, '2018_09_27_115144_create_invoice_items_table', 1),
(42, '2018_10_01_095504_create_order_payment_table', 1),
(43, '2018_10_03_025230_create_wishlist_table', 1),
(44, '2018_10_12_101803_create_country_translations_table', 1),
(45, '2018_10_12_101913_create_country_states_table', 1),
(46, '2018_10_12_101923_create_country_state_translations_table', 1),
(47, '2018_11_16_173504_create_subscribers_list_table', 1),
(48, '2018_11_21_144411_create_cart_item_inventories_table', 1),
(49, '2018_12_06_185202_create_product_flat_table', 1),
(50, '2018_12_24_123812_create_channel_inventory_sources_table', 1),
(51, '2018_12_26_165327_create_product_ordered_inventories_table', 1),
(52, '2019_05_13_024321_create_cart_rules_table', 1),
(53, '2019_05_13_024322_create_cart_rule_channels_table', 1),
(54, '2019_05_13_024323_create_cart_rule_customer_groups_table', 1),
(55, '2019_05_13_024324_create_cart_rule_translations_table', 1),
(56, '2019_05_13_024325_create_cart_rule_customers_table', 1),
(57, '2019_05_13_024326_create_cart_rule_coupons_table', 1),
(58, '2019_05_13_024327_create_cart_rule_coupon_usage_table', 1),
(59, '2019_06_17_180258_create_product_downloadable_samples_table', 1),
(60, '2019_06_17_180314_create_product_downloadable_sample_translations_table', 1),
(61, '2019_06_17_180325_create_product_downloadable_links_table', 1),
(62, '2019_06_17_180346_create_product_downloadable_link_translations_table', 1),
(63, '2019_06_21_202249_create_downloadable_link_purchased_table', 1),
(64, '2019_07_02_180307_create_booking_products_table', 1),
(65, '2019_07_05_154415_create_booking_product_default_slots_table', 1),
(66, '2019_07_05_154429_create_booking_product_appointment_slots_table', 1),
(67, '2019_07_05_154440_create_booking_product_event_tickets_table', 1),
(68, '2019_07_05_154451_create_booking_product_rental_slots_table', 1),
(69, '2019_07_05_154502_create_booking_product_table_slots_table', 1),
(70, '2019_07_30_153530_create_cms_pages_table', 1),
(71, '2019_07_31_143339_create_category_filterable_attributes_table', 1),
(72, '2019_08_02_105320_create_product_grouped_products_table', 1),
(73, '2019_08_20_170510_create_product_bundle_options_table', 1),
(74, '2019_08_20_170520_create_product_bundle_option_translations_table', 1),
(75, '2019_08_20_170528_create_product_bundle_option_products_table', 1),
(76, '2019_09_11_184511_create_refunds_table', 1),
(77, '2019_09_11_184519_create_refund_items_table', 1),
(78, '2019_12_03_184613_create_catalog_rules_table', 1),
(79, '2019_12_03_184651_create_catalog_rule_channels_table', 1),
(80, '2019_12_03_184732_create_catalog_rule_customer_groups_table', 1),
(81, '2019_12_06_101110_create_catalog_rule_products_table', 1),
(82, '2019_12_06_110507_create_catalog_rule_product_prices_table', 1),
(83, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(84, '2020_01_14_191854_create_cms_page_translations_table', 1),
(85, '2020_01_15_130209_create_cms_page_channels_table', 1),
(86, '2020_02_18_165639_create_bookings_table', 1),
(87, '2020_02_21_121201_create_booking_product_event_ticket_translations_table', 1),
(88, '2020_04_16_185147_add_table_addresses', 1),
(89, '2020_05_06_171638_create_order_comments_table', 1),
(90, '2020_05_21_171500_create_product_customer_group_prices_table', 1),
(91, '2020_06_25_162154_create_customer_social_accounts_table', 1),
(92, '2020_08_07_174804_create_gdpr_data_request_table', 1),
(93, '2020_11_19_112228_create_product_videos_table', 1),
(94, '2020_11_26_141455_create_marketing_templates_table', 1),
(95, '2020_11_26_150534_create_marketing_events_table', 1),
(96, '2020_11_26_150644_create_marketing_campaigns_table', 1),
(97, '2020_12_21_000200_create_channel_translations_table', 1),
(98, '2020_12_27_121950_create_jobs_table', 1),
(99, '2021_03_11_212124_create_order_transactions_table', 1),
(100, '2021_04_07_132010_create_product_review_images_table', 1),
(101, '2021_12_15_104544_notifications', 1),
(102, '2022_03_15_160510_create_failed_jobs_table', 1),
(103, '2022_04_01_094622_create_sitemaps_table', 1),
(104, '2022_10_03_144232_create_product_price_indices_table', 1),
(105, '2022_10_04_144444_create_job_batches_table', 1),
(106, '2022_10_08_134150_create_product_inventory_indices_table', 1),
(107, '2023_05_26_213105_create_wishlist_items_table', 1),
(108, '2023_05_26_213120_create_compare_items_table', 1),
(109, '2023_06_27_163529_rename_product_review_images_to_product_review_attachments', 1),
(110, '2023_07_06_140013_add_logo_path_column_to_locales', 1),
(111, '2023_07_10_184256_create_theme_customizations_table', 1),
(112, '2023_07_12_181722_remove_home_page_and_footer_content_column_from_channel_translations_table', 1),
(113, '2023_07_20_185324_add_column_column_in_attribute_groups_table', 1),
(114, '2023_07_25_145943_add_regex_column_in_attributes_table', 1),
(115, '2023_07_25_165945_drop_notes_column_from_customers_table', 1),
(116, '2023_07_25_171058_create_customer_notes_table', 1),
(117, '2023_07_31_125232_rename_image_and_category_banner_columns_from_categories_table', 1),
(118, '2023_09_15_170053_create_theme_customization_translations_table', 1),
(119, '2023_09_20_102031_add_default_value_column_in_attributes_table', 1),
(120, '2023_09_20_102635_add_inventories_group_in_attribute_groups_table', 1),
(121, '2023_09_26_155709_add_columns_to_currencies', 1),
(122, '2023_10_05_163612_create_visits_table', 1),
(123, '2023_10_12_090446_add_tax_category_id_column_in_order_items_table', 1),
(124, '2023_11_08_054614_add_code_column_in_attribute_groups_table', 1),
(125, '2023_11_08_140116_create_search_terms_table', 1),
(126, '2023_11_09_162805_create_url_rewrites_table', 1),
(127, '2023_11_17_150401_create_search_synonyms_table', 1),
(128, '2023_12_11_054614_add_channel_id_column_in_product_price_indices_table', 1),
(129, '2024_01_11_154640_create_imports_table', 1),
(130, '2024_01_11_154741_create_import_batches_table', 1),
(131, '2024_01_19_170350_add_unique_id_column_in_product_attribute_values_table', 1),
(132, '2024_01_19_170350_add_unique_id_column_in_product_customer_group_prices_table', 1),
(133, '2024_01_22_170814_add_unique_index_in_mapping_tables', 1),
(134, '2024_02_26_153000_add_columns_to_addresses_table', 1),
(135, '2024_03_07_193421_rename_address1_column_in_addresses_table', 1),
(136, '2024_04_16_144400_add_cart_id_column_in_cart_shipping_rates_table', 1),
(137, '2024_04_19_102939_add_incl_tax_columns_in_orders_table', 1),
(138, '2024_04_19_135405_add_incl_tax_columns_in_cart_items_table', 1),
(139, '2024_04_19_144641_add_incl_tax_columns_in_order_items_table', 1),
(140, '2024_04_23_133154_add_incl_tax_columns_in_cart_table', 1),
(141, '2024_04_23_150945_add_incl_tax_columns_in_cart_shipping_rates_table', 1),
(142, '2024_04_24_102939_add_incl_tax_columns_in_invoices_table', 1),
(143, '2024_04_24_102939_add_incl_tax_columns_in_refunds_table', 1),
(144, '2024_04_24_144641_add_incl_tax_columns_in_invoice_items_table', 1),
(145, '2024_04_24_144641_add_incl_tax_columns_in_refund_items_table', 1),
(146, '2024_04_24_144641_add_incl_tax_columns_in_shipment_items_table', 1),
(147, '2024_05_10_152848_create_saved_filters_table', 1),
(148, '2024_06_03_174128_create_product_channels_table', 1),
(149, '2024_06_04_130527_add_channel_id_column_in_customers_table', 1),
(150, '2024_06_04_134403_add_channel_id_column_in_visits_table', 1),
(151, '2024_06_13_184426_add_theme_column_into_theme_customizations_table', 1),
(152, '2024_07_17_172645_add_additional_column_to_sitemaps_table', 1),
(153, '2024_10_11_135010_create_product_customizable_options_table', 1),
(154, '2024_10_11_135110_create_product_customizable_option_translations_table', 1),
(155, '2024_10_11_135228_create_product_customizable_option_prices_table', 1),
(156, '2025_05_07_121250_update_total_weight_columns_in_shipments_and_weight_shipment_items_tables', 1),
(157, '2025_09_05_000100_add_indexes_to_channels_tables', 1),
(158, '2025_09_05_000200_add_indexes_to_product_relation_tables', 1),
(159, '2025_09_05_000300_add_indexes_to_product_media_and_attributes', 1),
(160, '2025_09_05_000400_add_indexes_to_attributes_and_product_types', 1),
(161, '2025_09_05_000500_add_indexes_to_product_grouped_products_and_product_bundle_option_products', 1),
(162, '2025_09_05_000500_add_indexes_to_url_rewrites_and_visits', 1),
(163, '2026_01_02_143841_create_job_categories_table', 1),
(164, '2026_01_02_143846_create_jobs_table', 1),
(165, '2026_01_02_143852_create_job_applications_table', 1),
(166, '2026_01_02_145832_add_user_type_to_customers_table', 1),
(167, '2026_01_07_120001_add_seller_id_to_products_table', 1),
(168, '2026_01_07_120002_add_seller_id_to_orders_table', 1),
(169, '2026_01_07_120003_create_sellers_table', 1),
(170, '2026_01_12_212103_create_vendors_table', 1),
(171, '2026_01_12_212128_add_vendor_id_to_products_table', 1),
(172, '2026_01_12_212150_create_vendor_orders_table', 1),
(173, '2026_01_12_212206_create_vendor_payouts_table', 1),
(174, '2026_01_12_225848_add_vendor_status_to_order_items_table', 1),
(175, '2026_01_13_090000_create_vendor_wallet_transactions_table', 1),
(176, '2026_01_13_090010_add_available_unavailable_balance_to_vendors_table', 1),
(178, '2026_01_20_000000_add_performance_indexes', 2),
(179, '2026_01_13_090020_create_vendor_order_items_table', 3),
(180, '2026_01_21_200000_add_seo_fields_to_vendors', 4),
(181, '2026_01_21_200001_create_vendor_reviews_table', 5),
(182, '2026_01_22_000000_add_customer_id_to_vendors_table', 6),
(183, '2026_01_22_100000_add_store_fields_to_vendors_table', 7),
(184, '2024_01_15_create_vendor_notifications_table', 8),
(185, '2026_01_13_120000_create_job_applications_table', 9),
(186, '2026_01_13_163600_add_account_type_to_customers_table', 9),
(187, '2026_01_13_212334_add_customer_id_to_vendors_table', 9),
(188, '2026_01_13_212700_add_store_slug_to_vendors_table', 9),
(189, '2026_01_13_213004_modify_vendors_email_column', 9),
(190, '2026_01_13_213738_add_rejection_reason_to_vendors_table', 9),
(191, '2026_01_14_141739_create_personal_access_tokens_table', 10),
(192, '2026_01_15_000000_add_missing_fields_to_vendor_orders', 10),
(193, '2026_01_15_000001_create_payment_transactions_table', 10),
(194, '2026_01_15_120000_add_vendor_onboarding_fields', 10),
(195, '2026_01_16_120000_add_comprehensive_vendor_fields', 11),
(196, '2026_01_21_000000_create_roles_system', 12),
(197, '2026_01_21_000001_create_profiles_table', 13),
(198, '2026_01_21_100000_create_company_profiles_table', 14),
(199, '2026_01_21_100001_update_jobs_table', 14),
(200, '2026_01_21_100002_update_job_applications_table', 14),
(201, '2026_01_22_000000_create_customer_wallet_system', 14),
(202, '2026_01_23_000000_fix_cart_database_structure', 15),
(203, '2026_01_23_000001_emergency_products_table_fix', 16),
(204, '2026_01_24_000000_populate_bagisto_core_data', 17),
(205, '2026_01_24_000002_quick_product_fix', 18),
(206, '2026_01_30_000000_restore_product_flat', 19),
(207, '2026_01_23_000002_fix_url_mappings', 20),
(208, '2026_01_24_000001_fix_product_display', 21),
(209, '2026_02_01_002918_add_approved_by_admin_to_products_table', 21),
(210, '2026_02_01_163929_add_application_link_to_jobs_table', 22),
(211, '2026_02_01_170630_add_image_to_jobs_table', 23),
(215, '2025_01_15_000001_create_blog_posts_table', 24),
(216, '2026_02_03_044719_add_performance_indexes_to_core_tables', 24);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0,
  `order_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `read`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 'order', 1, 1, '2026-01-30 02:51:49', '2026-01-30 03:06:16'),
(2, 'order', 0, 2, '2026-01-31 23:29:26', '2026-01-31 23:29:26'),
(3, 'order', 1, 3, '2026-02-02 15:08:36', '2026-02-02 15:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED DEFAULT NULL,
  `increment_id` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `channel_name` varchar(255) DEFAULT NULL,
  `is_guest` tinyint(1) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_first_name` varchar(255) DEFAULT NULL,
  `customer_last_name` varchar(255) DEFAULT NULL,
  `shipping_method` varchar(255) DEFAULT NULL,
  `shipping_title` varchar(255) DEFAULT NULL,
  `shipping_description` varchar(255) DEFAULT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `is_gift` tinyint(1) NOT NULL DEFAULT 0,
  `total_item_count` int(11) DEFAULT NULL,
  `total_qty_ordered` int(11) DEFAULT NULL,
  `base_currency_code` varchar(255) DEFAULT NULL,
  `channel_currency_code` varchar(255) DEFAULT NULL,
  `order_currency_code` varchar(255) DEFAULT NULL,
  `grand_total` decimal(12,4) DEFAULT 0.0000,
  `base_grand_total` decimal(12,4) DEFAULT 0.0000,
  `grand_total_invoiced` decimal(12,4) DEFAULT 0.0000,
  `base_grand_total_invoiced` decimal(12,4) DEFAULT 0.0000,
  `grand_total_refunded` decimal(12,4) DEFAULT 0.0000,
  `base_grand_total_refunded` decimal(12,4) DEFAULT 0.0000,
  `sub_total` decimal(12,4) DEFAULT 0.0000,
  `base_sub_total` decimal(12,4) DEFAULT 0.0000,
  `sub_total_invoiced` decimal(12,4) DEFAULT 0.0000,
  `base_sub_total_invoiced` decimal(12,4) DEFAULT 0.0000,
  `sub_total_refunded` decimal(12,4) DEFAULT 0.0000,
  `base_sub_total_refunded` decimal(12,4) DEFAULT 0.0000,
  `discount_percent` decimal(12,4) DEFAULT 0.0000,
  `discount_amount` decimal(12,4) DEFAULT 0.0000,
  `base_discount_amount` decimal(12,4) DEFAULT 0.0000,
  `discount_invoiced` decimal(12,4) DEFAULT 0.0000,
  `base_discount_invoiced` decimal(12,4) DEFAULT 0.0000,
  `discount_refunded` decimal(12,4) DEFAULT 0.0000,
  `base_discount_refunded` decimal(12,4) DEFAULT 0.0000,
  `tax_amount` decimal(12,4) DEFAULT 0.0000,
  `base_tax_amount` decimal(12,4) DEFAULT 0.0000,
  `tax_amount_invoiced` decimal(12,4) DEFAULT 0.0000,
  `base_tax_amount_invoiced` decimal(12,4) DEFAULT 0.0000,
  `tax_amount_refunded` decimal(12,4) DEFAULT 0.0000,
  `base_tax_amount_refunded` decimal(12,4) DEFAULT 0.0000,
  `shipping_amount` decimal(12,4) DEFAULT 0.0000,
  `base_shipping_amount` decimal(12,4) DEFAULT 0.0000,
  `shipping_invoiced` decimal(12,4) DEFAULT 0.0000,
  `base_shipping_invoiced` decimal(12,4) DEFAULT 0.0000,
  `shipping_refunded` decimal(12,4) DEFAULT 0.0000,
  `base_shipping_refunded` decimal(12,4) DEFAULT 0.0000,
  `shipping_discount_amount` decimal(12,4) DEFAULT 0.0000,
  `base_shipping_discount_amount` decimal(12,4) DEFAULT 0.0000,
  `shipping_tax_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_shipping_tax_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `shipping_tax_refunded` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_shipping_tax_refunded` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `sub_total_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_sub_total_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `shipping_amount_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_shipping_amount_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `customer_type` varchar(255) DEFAULT NULL,
  `channel_id` int(10) UNSIGNED DEFAULT NULL,
  `channel_type` varchar(255) DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `applied_cart_rule_ids` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `seller_id`, `increment_id`, `status`, `channel_name`, `is_guest`, `customer_email`, `customer_first_name`, `customer_last_name`, `shipping_method`, `shipping_title`, `shipping_description`, `coupon_code`, `is_gift`, `total_item_count`, `total_qty_ordered`, `base_currency_code`, `channel_currency_code`, `order_currency_code`, `grand_total`, `base_grand_total`, `grand_total_invoiced`, `base_grand_total_invoiced`, `grand_total_refunded`, `base_grand_total_refunded`, `sub_total`, `base_sub_total`, `sub_total_invoiced`, `base_sub_total_invoiced`, `sub_total_refunded`, `base_sub_total_refunded`, `discount_percent`, `discount_amount`, `base_discount_amount`, `discount_invoiced`, `base_discount_invoiced`, `discount_refunded`, `base_discount_refunded`, `tax_amount`, `base_tax_amount`, `tax_amount_invoiced`, `base_tax_amount_invoiced`, `tax_amount_refunded`, `base_tax_amount_refunded`, `shipping_amount`, `base_shipping_amount`, `shipping_invoiced`, `base_shipping_invoiced`, `shipping_refunded`, `base_shipping_refunded`, `shipping_discount_amount`, `base_shipping_discount_amount`, `shipping_tax_amount`, `base_shipping_tax_amount`, `shipping_tax_refunded`, `base_shipping_tax_refunded`, `sub_total_incl_tax`, `base_sub_total_incl_tax`, `shipping_amount_incl_tax`, `base_shipping_amount_incl_tax`, `customer_id`, `customer_type`, `channel_id`, `channel_type`, `cart_id`, `applied_cart_rule_ids`, `created_at`, `updated_at`) VALUES
(1, NULL, '1', 'completed', NULL, 0, 'omarraafat939@gmail.com', 'magdy', 'shaban', 'flatrate_flatrate', 'Flat Rate - Flat Rate', 'Flat Rate Shipping', NULL, 0, 1, 1, 'USD', 'USD', 'USD', 140.0000, 140.0000, 140.0000, 140.0000, 0.0000, 0.0000, 130.0000, 130.0000, 130.0000, 130.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 10.0000, 10.0000, 10.0000, 10.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 130.0000, 130.0000, 10.0000, 10.0000, 2, 'Webkul\\Customer\\Models\\Customer', 1, 'Webkul\\Core\\Models\\Channel', 27, NULL, '2026-01-30 02:51:49', '2026-01-30 03:11:41'),
(2, NULL, '2', 'pending', 'Default', 0, 'omarraafat939@gmail.com', 'مش مجدي', 'shaban', 'flatrate_flatrate', 'Flat Rate - Flat Rate', 'Flat Rate Shipping', NULL, 0, 1, 1, 'USD', 'USD', 'USD', 230.0000, 230.0000, 0.0000, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 10.0000, 10.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, 10.0000, 10.0000, 2, 'Webkul\\Customer\\Models\\Customer', 1, 'Webkul\\Core\\Models\\Channel', 31, NULL, '2026-01-31 23:29:25', '2026-01-31 23:29:25'),
(3, NULL, '3', 'completed', NULL, 0, 'omarraafat939@gmail.com', 'مش مجدي', 'shaban', 'flatrate_flatrate', 'Flat Rate - Flat Rate', 'Flat Rate Shipping', NULL, 0, 1, 3, 'USD', 'USD', 'USD', 690.0000, 690.0000, 690.0000, 690.0000, 0.0000, 0.0000, 660.0000, 660.0000, 660.0000, 660.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 30.0000, 30.0000, 30.0000, 30.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 660.0000, 660.0000, 30.0000, 30.0000, 2, 'Webkul\\Customer\\Models\\Customer', 1, 'Webkul\\Core\\Models\\Channel', 36, NULL, '2026-02-02 15:08:35', '2026-02-02 15:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `order_comments`
--

CREATE TABLE `order_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `comment` text NOT NULL,
  `customer_notified` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `weight` decimal(12,4) DEFAULT 0.0000,
  `total_weight` decimal(12,4) DEFAULT 0.0000,
  `qty_ordered` int(11) DEFAULT 0,
  `qty_shipped` int(11) DEFAULT 0,
  `qty_invoiced` int(11) DEFAULT 0,
  `qty_canceled` int(11) DEFAULT 0,
  `qty_refunded` int(11) DEFAULT 0,
  `price` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_price` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `total` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_total` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `total_invoiced` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_total_invoiced` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `amount_refunded` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_amount_refunded` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `discount_percent` decimal(12,4) DEFAULT 0.0000,
  `discount_amount` decimal(12,4) DEFAULT 0.0000,
  `base_discount_amount` decimal(12,4) DEFAULT 0.0000,
  `discount_invoiced` decimal(12,4) DEFAULT 0.0000,
  `base_discount_invoiced` decimal(12,4) DEFAULT 0.0000,
  `discount_refunded` decimal(12,4) DEFAULT 0.0000,
  `base_discount_refunded` decimal(12,4) DEFAULT 0.0000,
  `tax_percent` decimal(12,4) DEFAULT 0.0000,
  `tax_amount` decimal(12,4) DEFAULT 0.0000,
  `base_tax_amount` decimal(12,4) DEFAULT 0.0000,
  `tax_amount_invoiced` decimal(12,4) DEFAULT 0.0000,
  `base_tax_amount_invoiced` decimal(12,4) DEFAULT 0.0000,
  `tax_amount_refunded` decimal(12,4) DEFAULT 0.0000,
  `base_tax_amount_refunded` decimal(12,4) DEFAULT 0.0000,
  `price_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_price_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `total_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_total_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `tax_category_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `additional` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional`)),
  `vendor_status` enum('pending','processing','shipped','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `sku`, `type`, `name`, `coupon_code`, `weight`, `total_weight`, `qty_ordered`, `qty_shipped`, `qty_invoiced`, `qty_canceled`, `qty_refunded`, `price`, `base_price`, `total`, `base_total`, `total_invoiced`, `base_total_invoiced`, `amount_refunded`, `base_amount_refunded`, `discount_percent`, `discount_amount`, `base_discount_amount`, `discount_invoiced`, `base_discount_invoiced`, `discount_refunded`, `base_discount_refunded`, `tax_percent`, `tax_amount`, `base_tax_amount`, `tax_amount_invoiced`, `base_tax_amount_invoiced`, `tax_amount_refunded`, `base_tax_amount_refunded`, `price_incl_tax`, `base_price_incl_tax`, `total_incl_tax`, `base_total_incl_tax`, `product_id`, `product_type`, `order_id`, `tax_category_id`, `parent_id`, `additional`, `vendor_status`, `created_at`, `updated_at`) VALUES
(1, 'mntg-gdyd-1769725215', 'simple', 'منتج جديد', NULL, 0.0000, 0.0000, 1, 1, 1, 0, 0, 130.0000, 130.0000, 130.0000, 130.0000, 130.0000, 130.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 130.0000, 130.0000, 130.0000, 130.0000, 7, 'Webkul\\Product\\Models\\Product', 1, NULL, NULL, '{\"cart_id\":27,\"product_id\":\"7\",\"is_buy_now\":\"1\",\"quantity\":1,\"locale\":\"ar\"}', 'pending', '2026-01-30 02:51:49', '2026-01-30 03:11:41'),
(2, 'PROD-1769887342', 'simple', 'المنتج التاني', NULL, 0.0000, 0.0000, 1, 0, 0, 0, 0, 220.0000, 220.0000, 220.0000, 220.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, 220.0000, 220.0000, 11, 'Webkul\\Product\\Models\\Product', 2, NULL, NULL, '{\"cart_id\":31,\"product_id\":\"11\",\"is_buy_now\":\"1\",\"quantity\":1,\"locale\":\"en\"}', 'pending', '2026-01-31 23:29:25', '2026-01-31 23:29:25'),
(3, 'PROD-1769887342', 'simple', 'المنتج التاني', NULL, 0.0000, 0.0000, 3, 3, 3, 0, 0, 220.0000, 220.0000, 660.0000, 660.0000, 660.0000, 660.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 220.0000, 220.0000, 660.0000, 660.0000, 11, 'Webkul\\Product\\Models\\Product', 3, NULL, NULL, '{\"cart_id\":36,\"product_id\":\"11\",\"is_buy_now\":\"1\",\"quantity\":3,\"locale\":\"ar\"}', 'pending', '2026-02-02 15:08:35', '2026-02-02 15:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `order_payment`
--

CREATE TABLE `order_payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `method` varchar(255) NOT NULL,
  `method_title` varchar(255) DEFAULT NULL,
  `additional` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_payment`
--

INSERT INTO `order_payment` (`id`, `order_id`, `method`, `method_title`, `additional`, `created_at`, `updated_at`) VALUES
(1, 1, 'cashondelivery', 'Cash On Delivery', NULL, '2026-01-30 02:51:49', '2026-01-30 02:51:49'),
(2, 2, 'cashondelivery', 'Cash On Delivery', NULL, '2026-01-31 23:29:25', '2026-01-31 23:29:25'),
(3, 3, 'cashondelivery', 'Cash On Delivery', NULL, '2026-02-02 15:08:35', '2026-02-02 15:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `order_transactions`
--

CREATE TABLE `order_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `amount` decimal(12,4) DEFAULT 0.0000,
  `payment_method` varchar(255) DEFAULT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data`)),
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_transactions`
--

INSERT INTO `order_transactions` (`id`, `transaction_id`, `status`, `type`, `amount`, `payment_method`, `data`, `invoice_id`, `order_id`, `created_at`, `updated_at`) VALUES
(1, '8f4ec5956a8f8f9b671e60b93cd7ac58', 'paid', 'cashondelivery', 140.0000, 'cashondelivery', NULL, 1, 1, '2026-01-30 03:08:56', '2026-01-30 03:08:56'),
(2, '1a00380dbfea4d6584362f207f131f53', 'paid', 'cashondelivery', 690.0000, 'cashondelivery', NULL, 2, 3, '2026-02-02 15:11:53', '2026-02-02 15:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_transactions`
--

CREATE TABLE `payment_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `amount` decimal(12,4) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `status` enum('pending','processing','completed','failed','refunded') NOT NULL DEFAULT 'pending',
  `gateway_response` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gateway_response`)),
  `metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`metadata`)),
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `approved_by_admin` tinyint(1) NOT NULL DEFAULT 0,
  `seller_id` int(10) UNSIGNED DEFAULT NULL,
  `sku` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `visibility` int(11) NOT NULL DEFAULT 4,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `attribute_family_id` int(10) UNSIGNED DEFAULT NULL,
  `additional` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `vendor_id`, `approved_by_admin`, `seller_id`, `sku`, `type`, `status`, `visibility`, `parent_id`, `attribute_family_id`, `additional`, `created_at`, `updated_at`) VALUES
(11, 1, 1, NULL, 'PROD-1769887342', 'simple', 1, 4, NULL, 1, NULL, '2026-01-31 22:53:12', '2026-01-31 23:17:37'),
(12, NULL, 0, NULL, 'PROD-1769881477', 'booking', 1, 4, NULL, 1, NULL, '2026-02-02 14:58:58', '2026-02-02 14:58:58'),
(13, 1, 1, NULL, 'PROD-1770032983', 'simple', 1, 4, NULL, 1, NULL, '2026-02-02 15:21:20', '2026-02-02 15:21:20'),
(14, 1, 1, NULL, 'PROD-1770058801', 'simple', 1, 4, NULL, 1, NULL, '2026-02-02 22:30:34', '2026-02-02 22:30:34'),
(15, 1, 1, NULL, 'PROD-1770060316', 'simple', 1, 4, NULL, 1, NULL, '2026-02-02 22:55:48', '2026-02-02 22:55:48'),
(16, 1, 1, NULL, 'PROD-1770063638', 'simple', 1, 4, NULL, 1, NULL, '2026-02-02 23:51:18', '2026-02-02 23:51:18'),
(17, 1, 1, NULL, 'PROD-1770063983', 'simple', 1, 4, NULL, 1, NULL, '2026-02-02 23:56:47', '2026-02-02 23:56:47'),
(18, 1, 1, NULL, 'PROD-1770064563', 'simple', 1, 4, NULL, 1, NULL, '2026-02-03 00:06:30', '2026-02-03 00:06:30'),
(19, 1, 0, NULL, 'PROD-1770064747', 'simple', 1, 4, NULL, 1, NULL, '2026-02-03 00:09:34', '2026-02-03 00:09:34'),
(20, 1, 0, NULL, 'PROD-1770066729', 'simple', 1, 4, NULL, 1, NULL, '2026-02-03 00:42:50', '2026-02-03 00:42:50'),
(21, 1, 1, NULL, 'PROD-1770067285', 'simple', 1, 4, NULL, 1, NULL, '2026-02-03 00:51:51', '2026-02-03 00:51:51'),
(22, 1, 0, NULL, 'PROD-1770068226', 'simple', 1, 4, NULL, 1, NULL, '2026-02-03 01:07:37', '2026-02-03 01:07:37'),
(23, 1, 0, NULL, 'PROD-1770068418', 'simple', 1, 4, NULL, 1, NULL, '2026-02-03 01:10:46', '2026-02-03 01:10:46'),
(24, 1, 0, NULL, 'PROD-1770068988', 'simple', 1, 4, NULL, 1, NULL, '2026-02-03 01:20:17', '2026-02-03 01:20:17'),
(25, 1, 0, NULL, 'PROD-1770069275', 'simple', 1, 4, NULL, 1, NULL, '2026-02-03 01:25:05', '2026-02-03 01:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute_values`
--

CREATE TABLE `product_attribute_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) DEFAULT NULL,
  `channel` varchar(255) DEFAULT NULL,
  `text_value` text DEFAULT NULL,
  `boolean_value` tinyint(1) DEFAULT NULL,
  `integer_value` int(11) DEFAULT NULL,
  `float_value` decimal(12,4) DEFAULT NULL,
  `datetime_value` datetime DEFAULT NULL,
  `date_value` date DEFAULT NULL,
  `json_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_value`)),
  `product_id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `unique_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attribute_values`
--

INSERT INTO `product_attribute_values` (`id`, `locale`, `channel`, `text_value`, `boolean_value`, `integer_value`, `float_value`, `datetime_value`, `date_value`, `json_value`, `product_id`, `attribute_id`, `unique_id`) VALUES
(128, 'en', NULL, 'لسلسللسيي', NULL, NULL, NULL, NULL, NULL, NULL, 11, 9, 'en|11|9'),
(129, 'en', NULL, 'سيلسيلسيلسيل', NULL, NULL, NULL, NULL, NULL, NULL, 11, 10, 'en|11|10'),
(130, NULL, NULL, 'PROD-1769887342', NULL, NULL, NULL, NULL, NULL, NULL, 11, 1, '11|1'),
(131, 'en', NULL, 'المنتج التاني', NULL, NULL, NULL, NULL, NULL, NULL, 11, 2, 'en|11|2'),
(133, NULL, 'default', NULL, 0, NULL, NULL, NULL, NULL, NULL, 11, 28, 'default|11|28'),
(134, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 11, 16, 'en|11|16'),
(135, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 11, 18, 'en|11|18'),
(136, NULL, NULL, NULL, NULL, NULL, 220.0000, NULL, NULL, NULL, 11, 11, '11|11'),
(137, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 11, 5, '11|5'),
(138, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 11, 6, '11|6'),
(139, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 11, 7, '11|7'),
(140, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 11, 8, 'default|11|8'),
(141, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 11, 26, '11|26'),
(142, 'ar', 'default', 'almntg-altany-11', NULL, NULL, NULL, NULL, NULL, NULL, 11, 3, 'default|ar|11|3'),
(143, 'en', 'default', 'almntg-altany-11', NULL, NULL, NULL, NULL, NULL, NULL, 11, 3, 'default|en|11|3'),
(144, 'ar', NULL, '<p>dffhfdhfdh</p>', NULL, NULL, NULL, NULL, NULL, NULL, 12, 9, 'ar|12|9'),
(145, 'ar', NULL, '<p>bcvncvn</p>', NULL, NULL, NULL, NULL, NULL, NULL, 12, 10, 'ar|12|10'),
(146, NULL, NULL, 'PROD-1769881477', NULL, NULL, NULL, NULL, NULL, NULL, 12, 1, '12|1'),
(147, 'ar', NULL, 'سماعات سمارت', NULL, NULL, NULL, NULL, NULL, NULL, 12, 2, 'ar|12|2'),
(148, 'ar', NULL, 'سماعات-سمارت', NULL, NULL, NULL, NULL, NULL, NULL, 12, 3, 'ar|12|3'),
(149, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 12, 27, '12|27'),
(150, NULL, 'default', NULL, 0, NULL, NULL, NULL, NULL, NULL, 12, 28, 'default|12|28'),
(151, 'ar', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 12, 16, 'ar|12|16'),
(152, 'ar', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 12, 17, 'ar|12|17'),
(153, 'ar', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 12, 18, 'ar|12|18'),
(154, NULL, NULL, NULL, NULL, NULL, 500.0000, NULL, NULL, NULL, 12, 11, '12|11'),
(155, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 12, '12|12'),
(156, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 13, '12|13'),
(157, NULL, 'default', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 14, 'default|12|14'),
(158, NULL, 'default', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 15, 'default|12|15'),
(159, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 12, 5, '12|5'),
(160, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 12, 6, '12|6'),
(161, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 12, 7, '12|7'),
(162, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 12, 8, 'default|12|8'),
(163, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 12, 26, '12|26'),
(164, 'en', NULL, '<p>سيلسيلسيلسيل</p>', NULL, NULL, NULL, NULL, NULL, NULL, 13, 9, 'en|13|9'),
(165, 'en', NULL, '<p>يللللقل</p>', NULL, NULL, NULL, NULL, NULL, NULL, 13, 10, 'en|13|10'),
(166, NULL, NULL, 'PROD-1770032983', NULL, NULL, NULL, NULL, NULL, NULL, 13, 1, '13|1'),
(167, 'en', NULL, 'تيشيرت', NULL, NULL, NULL, NULL, NULL, NULL, 13, 2, 'en|13|2'),
(168, 'en', NULL, 'tyshyrt-13', NULL, NULL, NULL, NULL, NULL, NULL, 13, 3, 'en|13|3'),
(169, NULL, 'default', NULL, 0, NULL, NULL, NULL, NULL, NULL, 13, 28, 'default|13|28'),
(170, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 13, 16, 'en|13|16'),
(171, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 13, 18, 'en|13|18'),
(172, NULL, NULL, NULL, NULL, NULL, 50.0000, NULL, NULL, NULL, 13, 11, '13|11'),
(173, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 13, 5, '13|5'),
(174, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 13, 6, '13|6'),
(175, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 13, 7, '13|7'),
(176, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 13, 8, 'default|13|8'),
(177, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 13, 26, '13|26'),
(178, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 13, 27, '13|27'),
(179, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 13, 17, 'en|13|17'),
(180, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, 12, '13|12'),
(181, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, 13, '13|13'),
(182, NULL, 'default', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, 14, 'default|13|14'),
(183, NULL, 'default', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, 15, 'default|13|15'),
(184, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 13, 19, '13|19'),
(185, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 13, 20, '13|20'),
(186, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 13, 21, '13|21'),
(187, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 13, 22, '13|22'),
(188, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 14, 9, 'en|14|9'),
(189, 'en', NULL, 'تيشيترت جامد جدا', NULL, NULL, NULL, NULL, NULL, NULL, 14, 10, 'en|14|10'),
(190, NULL, NULL, 'PROD-1770058801', NULL, NULL, NULL, NULL, NULL, NULL, 14, 1, '14|1'),
(191, 'en', NULL, 'تيشيرت 2', NULL, NULL, NULL, NULL, NULL, NULL, 14, 2, 'en|14|2'),
(192, 'en', NULL, 'tyshyrt-2-14', NULL, NULL, NULL, NULL, NULL, NULL, 14, 3, 'en|14|3'),
(193, NULL, 'default', NULL, 0, NULL, NULL, NULL, NULL, NULL, 14, 28, 'default|14|28'),
(194, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 14, 16, 'en|14|16'),
(195, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 14, 18, 'en|14|18'),
(196, NULL, NULL, NULL, NULL, NULL, 60.0000, NULL, NULL, NULL, 14, 11, '14|11'),
(197, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 14, 5, '14|5'),
(198, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 14, 6, '14|6'),
(199, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 14, 7, '14|7'),
(200, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 14, 8, 'default|14|8'),
(201, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 14, 26, '14|26'),
(202, 'ar', NULL, 'وصف المنتج: تيشيرت', NULL, NULL, NULL, NULL, NULL, NULL, 13, 10, NULL),
(203, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 14, 22, NULL),
(204, 'ar', NULL, 'وصف المنتج: تيشيرت 2', NULL, NULL, NULL, NULL, NULL, NULL, 14, 10, NULL),
(205, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 15, 9, 'en|15|9'),
(206, 'en', NULL, 'بيبسلسيلسيليسل', NULL, NULL, NULL, NULL, NULL, NULL, 15, 10, 'en|15|10'),
(207, NULL, NULL, 'PROD-1770060316', NULL, NULL, NULL, NULL, NULL, NULL, 15, 1, '15|1'),
(208, 'en', NULL, 'تيشيرت 4', NULL, NULL, NULL, NULL, NULL, NULL, 15, 2, 'en|15|2'),
(209, 'en', NULL, 'tyshyrt-3-15', NULL, NULL, NULL, NULL, NULL, NULL, 15, 3, 'en|15|3'),
(210, NULL, 'default', NULL, 0, NULL, NULL, NULL, NULL, NULL, 15, 28, 'default|15|28'),
(211, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 15, 16, 'en|15|16'),
(212, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 15, 18, 'en|15|18'),
(213, NULL, NULL, NULL, NULL, NULL, 70.0000, NULL, NULL, NULL, 15, 11, '15|11'),
(214, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 15, 5, '15|5'),
(215, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 15, 6, '15|6'),
(216, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 15, 7, '15|7'),
(217, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 15, 8, 'default|15|8'),
(218, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 15, 26, '15|26'),
(219, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 15, 22, '15|22'),
(220, 'ar', NULL, 'وصف المنتج: تيشيرت 3', NULL, NULL, NULL, NULL, NULL, NULL, 15, 10, NULL),
(221, 'en', NULL, 'لسلسلسيلسيلسي', NULL, NULL, NULL, NULL, NULL, NULL, 16, 9, 'en|16|9'),
(222, 'en', NULL, 'بسيبسيلسيلسي', NULL, NULL, NULL, NULL, NULL, NULL, 16, 10, 'en|16|10'),
(223, NULL, NULL, 'PROD-1770063638', NULL, NULL, NULL, NULL, NULL, NULL, 16, 1, '16|1'),
(224, 'en', NULL, 'سماعات سمارت1', NULL, NULL, NULL, NULL, NULL, NULL, 16, 2, 'en|16|2'),
(225, 'en', NULL, 'smaaaat-smart-16', NULL, NULL, NULL, NULL, NULL, NULL, 16, 3, 'en|16|3'),
(226, NULL, 'default', NULL, 0, NULL, NULL, NULL, NULL, NULL, 16, 28, 'default|16|28'),
(227, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 16, 16, 'en|16|16'),
(228, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 16, 18, 'en|16|18'),
(229, NULL, NULL, NULL, NULL, NULL, 50.0000, NULL, NULL, NULL, 16, 11, '16|11'),
(230, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 16, 5, '16|5'),
(231, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 16, 6, '16|6'),
(232, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 16, 7, '16|7'),
(233, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 16, 8, 'default|16|8'),
(234, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 16, 26, '16|26'),
(235, NULL, NULL, '1.01', NULL, NULL, NULL, NULL, NULL, NULL, 16, 22, '16|22'),
(236, 'ar', NULL, 'وصف المنتج: سماعات سمارت', NULL, NULL, NULL, NULL, NULL, NULL, 16, 10, NULL),
(237, 'en', NULL, 'شسبشبلشل', NULL, NULL, NULL, NULL, NULL, NULL, 17, 9, 'en|17|9'),
(238, 'en', NULL, 'بسيلبيسل', NULL, NULL, NULL, NULL, NULL, NULL, 17, 10, 'en|17|10'),
(239, NULL, NULL, 'PROD-1770063983', NULL, NULL, NULL, NULL, NULL, NULL, 17, 1, '17|1'),
(240, 'en', NULL, 'اتمنبالميبنل', NULL, NULL, NULL, NULL, NULL, NULL, 17, 2, 'en|17|2'),
(241, 'en', NULL, 'sylysl-17', NULL, NULL, NULL, NULL, NULL, NULL, 17, 3, 'en|17|3'),
(242, NULL, 'default', NULL, 0, NULL, NULL, NULL, NULL, NULL, 17, 28, 'default|17|28'),
(243, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 17, 16, 'en|17|16'),
(244, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 17, 18, 'en|17|18'),
(245, NULL, NULL, NULL, NULL, NULL, 21.0000, NULL, NULL, NULL, 17, 11, '17|11'),
(246, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 17, 5, '17|5'),
(247, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 17, 6, '17|6'),
(248, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 17, 7, '17|7'),
(249, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 17, 8, 'default|17|8'),
(250, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 17, 26, '17|26'),
(251, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 17, 22, '17|22'),
(252, 'ar', NULL, 'وصف المنتج: سيليسل', NULL, NULL, NULL, NULL, NULL, NULL, 17, 10, NULL),
(253, 'en', NULL, 'يسليلسيلسي', NULL, NULL, NULL, NULL, NULL, NULL, 18, 9, 'en|18|9'),
(254, 'en', NULL, 'ليؤلاؤلاءؤلاؤءلاؤء', NULL, NULL, NULL, NULL, NULL, NULL, 18, 10, 'en|18|10'),
(255, NULL, NULL, 'PROD-1770064563', NULL, NULL, NULL, NULL, NULL, NULL, 18, 1, '18|1'),
(256, 'en', NULL, 'ماسيتلايستلا', NULL, NULL, NULL, NULL, NULL, NULL, 18, 2, 'en|18|2'),
(257, 'en', NULL, 'masytlaystla-18', NULL, NULL, NULL, NULL, NULL, NULL, 18, 3, 'en|18|3'),
(258, NULL, 'default', NULL, 0, NULL, NULL, NULL, NULL, NULL, 18, 28, 'default|18|28'),
(259, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 18, 16, 'en|18|16'),
(260, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 18, 18, 'en|18|18'),
(261, NULL, NULL, NULL, NULL, NULL, 21.0000, NULL, NULL, NULL, 18, 11, '18|11'),
(262, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 18, 5, '18|5'),
(263, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 18, 6, '18|6'),
(264, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 18, 7, '18|7'),
(265, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 18, 8, 'default|18|8'),
(266, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 18, 26, '18|26'),
(267, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 18, 22, '18|22'),
(268, 'ar', NULL, 'وصف المنتج: ماسيتلايستلا', NULL, NULL, NULL, NULL, NULL, NULL, 18, 10, NULL),
(269, 'en', NULL, 'رئءررئءرئءرئء', NULL, NULL, NULL, NULL, NULL, NULL, 19, 9, 'en|19|9'),
(270, 'en', NULL, 'رئءررئءرئءرئء', NULL, NULL, NULL, NULL, NULL, NULL, 19, 10, 'en|19|10'),
(271, NULL, NULL, 'PROD-1770064747', NULL, NULL, NULL, NULL, NULL, NULL, 19, 1, '19|1'),
(272, 'en', NULL, 'سماعات سمارت', NULL, NULL, NULL, NULL, NULL, NULL, 19, 2, 'en|19|2'),
(273, 'en', NULL, 'smaaaat-smart-19', NULL, NULL, NULL, NULL, NULL, NULL, 19, 3, 'en|19|3'),
(274, NULL, 'default', NULL, 0, NULL, NULL, NULL, NULL, NULL, 19, 28, 'default|19|28'),
(275, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 19, 16, 'en|19|16'),
(276, 'en', NULL, 'رئءررئءرئءرئء', NULL, NULL, NULL, NULL, NULL, NULL, 19, 18, 'en|19|18'),
(277, NULL, NULL, NULL, NULL, NULL, 21.0000, NULL, NULL, NULL, 19, 11, '19|11'),
(278, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 19, 5, '19|5'),
(279, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 19, 6, '19|6'),
(280, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 19, 7, '19|7'),
(281, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 19, 8, 'default|19|8'),
(282, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 19, 26, '19|26'),
(283, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 19, 22, '19|22'),
(284, 'en', NULL, 'dsfdsfds', NULL, NULL, NULL, NULL, NULL, NULL, 20, 9, 'en|20|9'),
(285, 'en', NULL, 'dssgsdgsdgsdgsdg', NULL, NULL, NULL, NULL, NULL, NULL, 20, 10, 'en|20|10'),
(286, NULL, NULL, 'PROD-1770066729', NULL, NULL, NULL, NULL, NULL, NULL, 20, 1, '20|1'),
(287, 'en', NULL, 'Image Carousel', NULL, NULL, NULL, NULL, NULL, NULL, 20, 2, 'en|20|2'),
(288, 'en', NULL, 'image-carousel-20', NULL, NULL, NULL, NULL, NULL, NULL, 20, 3, 'en|20|3'),
(289, NULL, 'default', NULL, 0, NULL, NULL, NULL, NULL, NULL, 20, 28, 'default|20|28'),
(290, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 20, 16, 'en|20|16'),
(291, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 20, 18, 'en|20|18'),
(292, NULL, NULL, NULL, NULL, NULL, 21.0000, NULL, NULL, NULL, 20, 11, '20|11'),
(293, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 20, 5, '20|5'),
(294, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 20, 6, '20|6'),
(295, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 20, 7, '20|7'),
(296, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 20, 8, 'default|20|8'),
(297, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 20, 26, '20|26'),
(298, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 20, 22, '20|22'),
(299, 'en', NULL, 'سيسيبسيبسيب', NULL, NULL, NULL, NULL, NULL, NULL, 21, 9, 'en|21|9'),
(300, 'en', NULL, 'يسبيبسيبيسبسيب', NULL, NULL, NULL, NULL, NULL, NULL, 21, 10, 'en|21|10'),
(301, NULL, NULL, 'PROD-1770067285', NULL, NULL, NULL, NULL, NULL, NULL, 21, 1, '21|1'),
(302, 'en', NULL, 'سماعات سمارت5', NULL, NULL, NULL, NULL, NULL, NULL, 21, 2, 'en|21|2'),
(303, 'en', NULL, 'smaaaat-smart5-21', NULL, NULL, NULL, NULL, NULL, NULL, 21, 3, 'en|21|3'),
(304, NULL, 'default', NULL, 0, NULL, NULL, NULL, NULL, NULL, 21, 28, 'default|21|28'),
(305, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 21, 16, 'en|21|16'),
(306, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 21, 18, 'en|21|18'),
(307, NULL, NULL, NULL, NULL, NULL, 21.0000, NULL, NULL, NULL, 21, 11, '21|11'),
(308, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 21, 5, '21|5'),
(309, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 21, 6, '21|6'),
(310, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 21, 7, '21|7'),
(311, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 21, 8, 'default|21|8'),
(312, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 21, 26, '21|26'),
(313, NULL, NULL, '1.06', NULL, NULL, NULL, NULL, NULL, NULL, 21, 22, '21|22'),
(314, 'en', NULL, 'لمنتلمنستلمنسيتلمنيس', NULL, NULL, NULL, NULL, NULL, NULL, 25, 9, 'en|25|9'),
(315, 'en', NULL, 'ىلاؤةلاىةؤلاىلاؤلا', NULL, NULL, NULL, NULL, NULL, NULL, 25, 10, 'en|25|10'),
(316, NULL, NULL, 'PROD-1770069275', NULL, NULL, NULL, NULL, NULL, NULL, 25, 1, '25|1'),
(317, 'en', NULL, 'مش منتج خالص', NULL, NULL, NULL, NULL, NULL, NULL, 25, 2, 'en|25|2'),
(318, 'en', NULL, 'msh-mntg-khals-25', NULL, NULL, NULL, NULL, NULL, NULL, 25, 3, 'en|25|3'),
(319, NULL, 'default', NULL, 0, NULL, NULL, NULL, NULL, NULL, 25, 28, 'default|25|28'),
(320, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 25, 16, 'en|25|16'),
(321, 'en', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 25, 18, 'en|25|18'),
(322, NULL, NULL, NULL, NULL, NULL, 21.0000, NULL, NULL, NULL, 25, 11, '25|11'),
(323, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 25, 5, '25|5'),
(324, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 25, 6, '25|6'),
(325, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 25, 7, '25|7'),
(326, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 25, 8, 'default|25|8'),
(327, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 25, 26, '25|26'),
(328, NULL, NULL, '0.98', NULL, NULL, NULL, NULL, NULL, NULL, 25, 22, '25|22');

-- --------------------------------------------------------

--
-- Table structure for table `product_bundle_options`
--

CREATE TABLE `product_bundle_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_bundle_option_products`
--

CREATE TABLE `product_bundle_option_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_bundle_option_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `is_user_defined` tinyint(1) NOT NULL DEFAULT 1,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `sort_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_bundle_option_translations`
--

CREATE TABLE `product_bundle_option_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `product_bundle_option_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES
(21, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_channels`
--

CREATE TABLE `product_channels` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `channel_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_channels`
--

INSERT INTO `product_channels` (`product_id`, `channel_id`) VALUES
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_cross_sells`
--

CREATE TABLE `product_cross_sells` (
  `parent_id` int(10) UNSIGNED NOT NULL,
  `child_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_customer_group_prices`
--

CREATE TABLE `product_customer_group_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `value_type` varchar(255) NOT NULL,
  `value` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `product_id` int(10) UNSIGNED NOT NULL,
  `customer_group_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unique_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_customizable_options`
--

CREATE TABLE `product_customizable_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT 1,
  `max_characters` text DEFAULT NULL,
  `supported_file_extensions` text DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_customizable_option_prices`
--

CREATE TABLE `product_customizable_option_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` text DEFAULT NULL,
  `price` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `product_customizable_option_id` int(10) UNSIGNED NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_customizable_option_translations`
--

CREATE TABLE `product_customizable_option_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `label` text DEFAULT NULL,
  `product_customizable_option_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_downloadable_links`
--

CREATE TABLE `product_downloadable_links` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `price` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `sample_url` varchar(255) DEFAULT NULL,
  `sample_file` varchar(255) DEFAULT NULL,
  `sample_file_name` varchar(255) DEFAULT NULL,
  `sample_type` varchar(255) DEFAULT NULL,
  `downloads` int(11) NOT NULL DEFAULT 0,
  `sort_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_downloadable_link_translations`
--

CREATE TABLE `product_downloadable_link_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_downloadable_link_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_downloadable_samples`
--

CREATE TABLE `product_downloadable_samples` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_downloadable_sample_translations`
--

CREATE TABLE `product_downloadable_sample_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_downloadable_sample_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_flat`
--

CREATE TABLE `product_flat` (
  `id` int(10) UNSIGNED NOT NULL,
  `sku` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `product_number` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url_key` varchar(255) DEFAULT NULL,
  `new` tinyint(1) DEFAULT NULL,
  `featured` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `price` decimal(12,4) DEFAULT NULL,
  `special_price` decimal(12,4) DEFAULT NULL,
  `special_price_from` date DEFAULT NULL,
  `special_price_to` date DEFAULT NULL,
  `weight` decimal(12,4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `locale` varchar(255) DEFAULT NULL,
  `channel` varchar(255) DEFAULT NULL,
  `attribute_family_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `visible_individually` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_flat`
--

INSERT INTO `product_flat` (`id`, `sku`, `type`, `product_number`, `name`, `short_description`, `description`, `url_key`, `new`, `featured`, `status`, `meta_title`, `meta_keywords`, `meta_description`, `price`, `special_price`, `special_price_from`, `special_price_to`, `weight`, `created_at`, `locale`, `channel`, `attribute_family_id`, `product_id`, `updated_at`, `parent_id`, `visible_individually`) VALUES
(15, 'PROD-1769887342', 'simple', NULL, 'المنتج التاني', 'لسلسللسيي', 'سيلسيلسيلسيل', 'almntg-altany-11', 0, 0, 1, '', NULL, '', 220.0000, NULL, NULL, NULL, NULL, '2026-02-01 00:53:13', 'en', 'default', 1, 11, '2026-02-03 02:16:11', NULL, 1),
(16, 'PROD-1769887342', 'simple', NULL, NULL, NULL, NULL, 'almntg-altany-11', 0, 0, 1, NULL, NULL, NULL, 220.0000, NULL, NULL, NULL, NULL, '2026-02-01 00:53:13', 'ar', 'default', 1, 11, '2026-02-03 02:16:11', NULL, 1),
(17, 'PROD-1769881477', 'booking', '', NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 500.0000, NULL, NULL, NULL, NULL, '2026-02-02 16:58:58', 'en', 'default', 1, 12, '2026-02-03 02:16:11', NULL, 1),
(18, 'PROD-1769881477', 'booking', '', 'سماعات سمارت', '<p>dffhfdhfdh</p>', '<p>bcvncvn</p>', 'سماعات-سمارت', 1, 1, 1, '', '', '', 500.0000, NULL, NULL, NULL, NULL, '2026-02-02 16:58:58', 'ar', 'default', 1, 12, '2026-02-03 02:16:11', NULL, 1),
(19, 'PROD-1770032983', 'simple', '', 'تيشيرت', '<p>سيلسيلسيلسيل</p>', '<p>يللللقل</p>', 'tyshyrt-13', 0, 0, 1, '', '', '', 50.0000, NULL, NULL, NULL, 1.0000, '2026-02-02 17:21:20', 'en', 'default', 1, 13, '2026-02-03 02:53:53', NULL, 1),
(20, 'PROD-1770032983', 'simple', '', NULL, NULL, 'وصف المنتج: تيشيرت', NULL, 0, 0, 1, NULL, NULL, NULL, 50.0000, NULL, NULL, NULL, 1.0000, '2026-02-02 17:21:20', 'ar', 'default', 1, 13, '2026-02-03 02:53:53', NULL, 1),
(21, 'PROD-1770058801', 'simple', NULL, 'تيشيرت 2', '', 'تيشيترت جامد جدا', 'tyshyrt-2-14', 0, 0, 1, '', NULL, '', 60.0000, NULL, NULL, NULL, 1.0000, '2026-02-03 00:30:34', 'en', 'default', 1, 14, '2026-02-03 02:53:53', NULL, 1),
(22, 'PROD-1770058801', 'simple', NULL, NULL, NULL, 'وصف المنتج: تيشيرت 2', NULL, 0, 0, 1, NULL, NULL, NULL, 60.0000, NULL, NULL, NULL, 1.0000, '2026-02-03 00:30:35', 'ar', 'default', 1, 14, '2026-02-03 02:53:53', NULL, 1),
(23, 'PROD-1770060316', 'simple', NULL, 'تيشيرت 4', '', 'بيبسلسيلسيليسل', 'tyshyrt-3-15', 0, 0, 1, '', NULL, '', 70.0000, NULL, NULL, NULL, 1.0000, '2026-02-03 00:55:48', 'en', 'default', 1, 15, '2026-02-03 02:53:53', NULL, 1),
(24, 'PROD-1770060316', 'simple', NULL, NULL, NULL, 'وصف المنتج: تيشيرت 3', NULL, 0, 0, 1, NULL, NULL, NULL, 70.0000, NULL, NULL, NULL, 1.0000, '2026-02-03 00:55:48', 'ar', 'default', 1, 15, '2026-02-03 02:53:53', NULL, 1),
(25, 'PROD-1770063638', 'simple', NULL, 'سماعات سمارت1', 'لسلسلسيلسيلسي', 'بسيبسيلسيلسي', 'smaaaat-smart-16', 0, 0, 1, '', NULL, '', 50.0000, NULL, NULL, NULL, 1.0100, '2026-02-03 01:51:18', 'en', 'default', 1, 16, '2026-02-03 02:53:53', NULL, 1),
(26, 'PROD-1770063638', 'simple', NULL, NULL, NULL, 'وصف المنتج: سماعات سمارت', NULL, 0, 0, 1, NULL, NULL, NULL, 50.0000, NULL, NULL, NULL, 1.0100, '2026-02-03 01:51:18', 'ar', 'default', 1, 16, '2026-02-03 02:53:53', NULL, 1),
(27, 'PROD-1770063983', 'simple', NULL, 'اتمنبالميبنل', 'شسبشبلشل', 'بسيلبيسل', 'sylysl-17', 0, 0, 1, '', NULL, '', 21.0000, NULL, NULL, NULL, 1.0000, '2026-02-03 01:56:48', 'en', 'default', 1, 17, '2026-02-03 02:53:52', NULL, 1),
(28, 'PROD-1770063983', 'simple', NULL, NULL, NULL, 'وصف المنتج: سيليسل', NULL, 0, 0, 1, NULL, NULL, NULL, 21.0000, NULL, NULL, NULL, 1.0000, '2026-02-03 01:56:48', 'ar', 'default', 1, 17, '2026-02-03 02:53:52', NULL, 1),
(29, 'PROD-1770064563', 'simple', NULL, 'ماسيتلايستلا', 'يسليلسيلسي', 'ليؤلاؤلاءؤلاؤءلاؤء', 'masytlaystla-18', 0, 0, 1, '', NULL, '', 21.0000, NULL, NULL, NULL, 1.0000, '2026-02-03 02:06:30', 'en', 'default', 1, 18, '2026-02-03 02:43:28', NULL, 1),
(30, 'PROD-1770064563', 'simple', NULL, NULL, NULL, 'وصف المنتج: ماسيتلايستلا', NULL, 0, 0, 1, NULL, NULL, NULL, 21.0000, NULL, NULL, NULL, 1.0000, '2026-02-03 02:06:30', 'ar', 'default', 1, 18, '2026-02-03 02:43:28', NULL, 1),
(31, 'PROD-1770064747', 'simple', NULL, 'سماعات سمارت', 'رئءررئءرئءرئء', 'رئءررئءرئءرئء', 'smaaaat-smart-19', 0, 0, 1, '', NULL, 'رئءررئءرئءرئء', 21.0000, NULL, NULL, NULL, 1.0000, '2026-02-03 02:09:34', 'en', 'default', 1, 19, '2026-02-03 02:53:53', NULL, 1),
(32, 'PROD-1770064747', 'simple', NULL, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, NULL, NULL, 21.0000, NULL, NULL, NULL, 1.0000, '2026-02-03 02:09:34', 'ar', 'default', 1, 19, '2026-02-03 02:53:53', NULL, 1),
(33, 'PROD-1770066729', 'simple', NULL, 'Image Carousel', 'dsfdsfds', 'dssgsdgsdgsdgsdg', 'image-carousel-20', 0, 0, 1, '', NULL, '', 21.0000, NULL, NULL, NULL, 1.0000, '2026-02-03 02:42:50', 'en', 'default', 1, 20, '2026-02-03 02:53:52', NULL, 1),
(34, 'PROD-1770066729', 'simple', NULL, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, NULL, NULL, 21.0000, NULL, NULL, NULL, 1.0000, '2026-02-03 02:42:50', 'ar', 'default', 1, 20, '2026-02-03 02:53:52', NULL, 1),
(35, 'PROD-1770067285', 'simple', NULL, 'سماعات سمارت5', 'سيسيبسيبسيب', 'يسبيبسيبيسبسيب', 'smaaaat-smart5-21', 0, 0, 1, '', NULL, '', 21.0000, NULL, NULL, NULL, 1.0600, '2026-02-03 02:51:51', 'en', 'default', 1, 21, '2026-02-03 02:53:53', NULL, 1),
(36, 'PROD-1770067285', 'simple', NULL, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, NULL, NULL, 21.0000, NULL, NULL, NULL, 1.0600, '2026-02-03 02:51:51', 'ar', 'default', 1, 21, '2026-02-03 02:53:54', NULL, 1),
(37, 'PROD-1770069275', 'simple', NULL, 'مش منتج خالص', 'لمنتلمنستلمنسيتلمنيس', 'ىلاؤةلاىةؤلاىلاؤلا', 'msh-mntg-khals-25', 0, 0, 1, '', NULL, '', 21.0000, NULL, NULL, NULL, 0.9800, '2026-02-03 03:25:05', 'en', 'default', 1, 25, '2026-02-03 03:25:06', NULL, 1),
(38, 'PROD-1770069275', 'simple', NULL, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, NULL, NULL, 21.0000, NULL, NULL, NULL, 0.9800, '2026-02-03 03:25:05', 'ar', 'default', 1, 25, '2026-02-03 03:25:06', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_grouped_products`
--

CREATE TABLE `product_grouped_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `associated_product_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `sort_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `position` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `type`, `path`, `product_id`, `position`) VALUES
(7, NULL, 'product/11/8712m85gkTCVrFKrbKcfW11FRAbmwvYbVZ7LSqfW.png', 11, 0),
(8, 'images', 'product/12/xLISytHMKN4Fq6IuRt1j7QdjCEdmCvzNR59KUTXr.webp', 12, 1),
(13, NULL, 'product/placeholder.jpg', 13, 0),
(14, NULL, 'product/placeholder.jpg', 14, 0),
(15, NULL, 'product/placeholder.jpg', 15, 0),
(20, NULL, 'product/17/XRfcLcq4P8FSist3F5Zd6oL7TOufbYHtLkncTt2k.png', 17, 0),
(21, NULL, 'product/18/u4kfd20EEkqZGJAiJRWcSCiRdugr5HNPPnGksNHj.png', 18, 0),
(23, NULL, 'product/20/6v0LUioGye7Fiw5IidhMQxjAacJN3biBOEjjHqBa.png', 20, 0),
(24, NULL, 'product/21/qAJKPM3RSa0VX0NeK2nPXvN6AnVghhnpcq2E9wdF.png', 21, 0),
(25, NULL, 'product/25/ebJUdQS6t3S6UFpcaZ4pZmVQaVYi60AyFuNbFhhi.png', 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_inventories`
--

CREATE TABLE `product_inventories` (
  `id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `product_id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL DEFAULT 0,
  `inventory_source_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_inventories`
--

INSERT INTO `product_inventories` (`id`, `qty`, `product_id`, `vendor_id`, `inventory_source_id`) VALUES
(12, 20, 11, 1, 1),
(13, 80, 13, 1, 1),
(14, 40, 14, 1, 1),
(15, 55, 15, 1, 1),
(16, 6, 16, 1, 1),
(17, 23, 17, 1, 1),
(18, 233, 18, 1, 1),
(19, 7, 19, 1, 1),
(20, 0, 20, 1, 1),
(21, 10, 21, 1, 1),
(22, 5, 25, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_inventory_indices`
--

CREATE TABLE `product_inventory_indices` (
  `id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `product_id` int(10) UNSIGNED NOT NULL,
  `channel_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_inventory_indices`
--

INSERT INTO `product_inventory_indices` (`id`, `qty`, `product_id`, `channel_id`, `created_at`, `updated_at`) VALUES
(7, 20, 11, 1, NULL, NULL),
(8, 80, 13, 1, NULL, NULL),
(9, 40, 14, 1, NULL, NULL),
(10, 55, 15, 1, NULL, NULL),
(11, 6, 16, 1, NULL, NULL),
(12, 23, 17, 1, NULL, NULL),
(13, 233, 18, 1, NULL, NULL),
(14, 7, 19, 1, NULL, NULL),
(15, 0, 20, 1, NULL, NULL),
(16, 10, 21, 1, NULL, NULL),
(17, 0, 12, 1, NULL, NULL),
(18, 5, 25, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_ordered_inventories`
--

CREATE TABLE `product_ordered_inventories` (
  `id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `product_id` int(10) UNSIGNED NOT NULL,
  `channel_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_price_indices`
--

CREATE TABLE `product_price_indices` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `customer_group_id` int(10) UNSIGNED DEFAULT NULL,
  `channel_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `min_price` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `regular_min_price` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `max_price` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `regular_max_price` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_price_indices`
--

INSERT INTO `product_price_indices` (`id`, `product_id`, `customer_group_id`, `channel_id`, `min_price`, `regular_min_price`, `max_price`, `regular_max_price`, `created_at`, `updated_at`) VALUES
(11, 11, 1, 1, 220.0000, 220.0000, 220.0000, 220.0000, NULL, NULL),
(12, 21, 1, 1, 21.0000, 21.0000, 21.0000, 21.0000, NULL, NULL),
(13, 12, 1, 1, 500.0000, 500.0000, 500.0000, 500.0000, NULL, NULL),
(14, 13, 1, 1, 50.0000, 50.0000, 50.0000, 50.0000, NULL, NULL),
(15, 14, 1, 1, 60.0000, 60.0000, 60.0000, 60.0000, NULL, NULL),
(16, 15, 1, 1, 70.0000, 70.0000, 70.0000, 70.0000, NULL, NULL),
(17, 16, 1, 1, 50.0000, 50.0000, 50.0000, 50.0000, NULL, NULL),
(18, 17, 1, 1, 21.0000, 21.0000, 21.0000, 21.0000, NULL, NULL),
(19, 18, 1, 1, 21.0000, 21.0000, 21.0000, 21.0000, NULL, NULL),
(20, 19, 1, 1, 21.0000, 21.0000, 21.0000, 21.0000, NULL, NULL),
(21, 20, 1, 1, 21.0000, 21.0000, 21.0000, 21.0000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_relations`
--

CREATE TABLE `product_relations` (
  `parent_id` int(10) UNSIGNED NOT NULL,
  `child_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_review_attachments`
--

CREATE TABLE `product_review_attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `review_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'image',
  `mime_type` varchar(255) DEFAULT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_super_attributes`
--

CREATE TABLE `product_super_attributes` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_up_sells`
--

CREATE TABLE `product_up_sells` (
  `parent_id` int(10) UNSIGNED NOT NULL,
  `child_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_videos`
--

CREATE TABLE `product_videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `position` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('vendor','company') NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE `refunds` (
  `id` int(10) UNSIGNED NOT NULL,
  `increment_id` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `email_sent` tinyint(1) NOT NULL DEFAULT 0,
  `total_qty` int(11) DEFAULT NULL,
  `base_currency_code` varchar(255) DEFAULT NULL,
  `channel_currency_code` varchar(255) DEFAULT NULL,
  `order_currency_code` varchar(255) DEFAULT NULL,
  `adjustment_refund` decimal(12,4) DEFAULT 0.0000,
  `base_adjustment_refund` decimal(12,4) DEFAULT 0.0000,
  `adjustment_fee` decimal(12,4) DEFAULT 0.0000,
  `base_adjustment_fee` decimal(12,4) DEFAULT 0.0000,
  `sub_total` decimal(12,4) DEFAULT 0.0000,
  `base_sub_total` decimal(12,4) DEFAULT 0.0000,
  `grand_total` decimal(12,4) DEFAULT 0.0000,
  `base_grand_total` decimal(12,4) DEFAULT 0.0000,
  `shipping_amount` decimal(12,4) DEFAULT 0.0000,
  `base_shipping_amount` decimal(12,4) DEFAULT 0.0000,
  `tax_amount` decimal(12,4) DEFAULT 0.0000,
  `base_tax_amount` decimal(12,4) DEFAULT 0.0000,
  `discount_percent` decimal(12,4) DEFAULT 0.0000,
  `discount_amount` decimal(12,4) DEFAULT 0.0000,
  `base_discount_amount` decimal(12,4) DEFAULT 0.0000,
  `shipping_tax_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_shipping_tax_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `sub_total_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_sub_total_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `shipping_amount_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_shipping_amount_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refund_items`
--

CREATE TABLE `refund_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_price` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `total` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_total` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `tax_amount` decimal(12,4) DEFAULT 0.0000,
  `base_tax_amount` decimal(12,4) DEFAULT 0.0000,
  `discount_percent` decimal(12,4) DEFAULT 0.0000,
  `discount_amount` decimal(12,4) DEFAULT 0.0000,
  `base_discount_amount` decimal(12,4) DEFAULT 0.0000,
  `price_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_price_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `total_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_total_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `order_item_id` int(10) UNSIGNED DEFAULT NULL,
  `refund_id` int(10) UNSIGNED DEFAULT NULL,
  `additional` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `permission_type` varchar(255) NOT NULL,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`permissions`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `permission_type`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'This role users will have all the access', 'all', NULL, NULL, NULL),
(2, 'vendor', NULL, '', NULL, '2026-01-27 02:52:51', '2026-01-27 02:52:51'),
(3, 'company', NULL, '', NULL, '2026-01-27 02:52:51', '2026-01-27 02:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `search_synonyms`
--

CREATE TABLE `search_synonyms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `terms` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `search_terms`
--

CREATE TABLE `search_terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `term` varchar(255) NOT NULL,
  `results` int(11) NOT NULL DEFAULT 0,
  `uses` int(11) NOT NULL DEFAULT 0,
  `redirect_url` varchar(255) DEFAULT NULL,
  `display_in_suggested_terms` tinyint(1) NOT NULL DEFAULT 0,
  `locale` varchar(255) NOT NULL,
  `channel_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `store_slug` varchar(255) NOT NULL,
  `store_description` text DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `store_logo` varchar(255) DEFAULT NULL,
  `store_banner` varchar(255) DEFAULT NULL,
  `commission_rate` decimal(5,2) NOT NULL DEFAULT 10.00,
  `status` enum('pending','approved','rejected','suspended') NOT NULL DEFAULT 'pending',
  `total_earnings` decimal(12,2) NOT NULL DEFAULT 0.00,
  `current_balance` decimal(12,2) NOT NULL DEFAULT 0.00,
  `bank_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`bank_details`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `total_qty` int(11) DEFAULT NULL,
  `total_weight` decimal(12,4) DEFAULT NULL,
  `carrier_code` varchar(255) DEFAULT NULL,
  `carrier_title` varchar(255) DEFAULT NULL,
  `track_number` text DEFAULT NULL,
  `email_sent` tinyint(1) NOT NULL DEFAULT 0,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `customer_type` varchar(255) DEFAULT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_address_id` int(10) UNSIGNED DEFAULT NULL,
  `inventory_source_id` int(10) UNSIGNED DEFAULT NULL,
  `inventory_source_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `status`, `total_qty`, `total_weight`, `carrier_code`, `carrier_title`, `track_number`, `email_sent`, `customer_id`, `customer_type`, `order_id`, `order_address_id`, `inventory_source_id`, `inventory_source_name`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 0.0000, NULL, 'أرامكس', '', 1, 2, 'Webkul\\Customer\\Models\\Customer', 1, 4, 1, 'Default', '2026-01-30 03:11:40', '2026-02-02 15:11:23'),
(2, NULL, 3, 0.0000, NULL, '', '', 1, 2, 'Webkul\\Customer\\Models\\Customer', 3, 14, 1, 'Default', '2026-02-02 15:11:22', '2026-02-02 15:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `shipment_items`
--

CREATE TABLE `shipment_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `weight` decimal(12,4) DEFAULT NULL,
  `price` decimal(12,4) DEFAULT 0.0000,
  `base_price` decimal(12,4) DEFAULT 0.0000,
  `total` decimal(12,4) DEFAULT 0.0000,
  `base_total` decimal(12,4) DEFAULT 0.0000,
  `price_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `base_price_incl_tax` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `order_item_id` int(10) UNSIGNED DEFAULT NULL,
  `shipment_id` int(10) UNSIGNED NOT NULL,
  `additional` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipment_items`
--

INSERT INTO `shipment_items` (`id`, `name`, `description`, `sku`, `qty`, `weight`, `price`, `base_price`, `total`, `base_total`, `price_incl_tax`, `base_price_incl_tax`, `product_id`, `product_type`, `order_item_id`, `shipment_id`, `additional`, `created_at`, `updated_at`) VALUES
(1, 'منتج جديد', NULL, 'mntg-gdyd-1769725215', 1, 0.0000, 130.0000, 130.0000, 130.0000, 130.0000, 130.0000, 130.0000, 7, 'Webkul\\Product\\Models\\Product', 1, 1, '{\"cart_id\":27,\"product_id\":\"7\",\"is_buy_now\":\"1\",\"quantity\":1,\"locale\":\"ar\"}', '2026-01-30 03:11:40', '2026-01-30 03:11:40'),
(2, 'المنتج التاني', NULL, 'PROD-1769887342', 3, 0.0000, 220.0000, 220.0000, 660.0000, 660.0000, 220.0000, 220.0000, 11, 'Webkul\\Product\\Models\\Product', 3, 2, '{\"cart_id\":36,\"product_id\":\"11\",\"is_buy_now\":\"1\",\"quantity\":3,\"locale\":\"ar\"}', '2026-02-02 15:11:22', '2026-02-02 15:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `sitemaps`
--

CREATE TABLE `sitemaps` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `additional` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional`)),
  `generated_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers_list`
--

CREATE TABLE `subscribers_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_subscribed` tinyint(1) NOT NULL DEFAULT 0,
  `token` varchar(255) DEFAULT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `channel_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_categories`
--

CREATE TABLE `tax_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_categories_tax_rates`
--

CREATE TABLE `tax_categories_tax_rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `tax_category_id` int(10) UNSIGNED NOT NULL,
  `tax_rate_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_rates`
--

CREATE TABLE `tax_rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `is_zip` tinyint(1) NOT NULL DEFAULT 0,
  `zip_code` varchar(255) DEFAULT NULL,
  `zip_from` varchar(255) DEFAULT NULL,
  `zip_to` varchar(255) DEFAULT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `tax_rate` decimal(12,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theme_customizations`
--

CREATE TABLE `theme_customizations` (
  `id` int(10) UNSIGNED NOT NULL,
  `theme_code` varchar(255) DEFAULT 'default',
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `channel_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theme_customizations`
--

INSERT INTO `theme_customizations` (`id`, `theme_code`, `type`, `name`, `sort_order`, `status`, `channel_id`, `created_at`, `updated_at`) VALUES
(1, 'default', 'image_carousel', 'Image Carousel', 1, 1, 1, '2026-01-26 17:42:11', '2026-01-28 04:42:43'),
(2, 'default', 'static_content', 'Offer Information', 2, 1, 1, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(3, 'default', 'category_carousel', 'Categories Collections', 3, 1, 1, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(4, 'default', 'product_carousel', 'New Products', 4, 1, 1, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(5, 'default', 'static_content', 'Top Collections', 5, 1, 1, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(6, 'default', 'static_content', 'Bold Collections', 7, 1, 1, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(7, 'default', 'product_carousel', 'Featured Collections', 8, 1, 1, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(8, 'default', 'static_content', 'Game Container', 9, 0, 1, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(9, 'default', 'product_carousel', 'All Products', 10, 1, 1, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(10, 'default', 'static_content', 'Bold Collections', 11, 0, 1, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(11, 'default', 'footer_links', 'Footer Links', 12, 1, 1, '2026-01-26 17:42:11', '2026-01-26 17:42:11'),
(12, 'default', 'services_content', 'Services Content', 6, 1, 1, '2026-01-26 17:42:11', '2026-01-26 17:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `theme_customization_translations`
--

CREATE TABLE `theme_customization_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `theme_customization_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`options`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theme_customization_translations`
--

INSERT INTO `theme_customization_translations` (`id`, `theme_customization_id`, `locale`, `options`) VALUES
(1, 1, 'en', '{\"images\":[{\"title\":\"Get Ready For New Collection\",\"link\":\"\",\"image\":\"storage\\/theme\\/1\\/iYVLJNIkzbDajdQvgbIZlRZcdFPca0bVZVTPibsS.webp\"},{\"title\":\"Get Ready For New Collection\",\"link\":\"\",\"image\":\"storage\\/theme\\/1\\/0VjYGOmVJxDpeO4BjNdviqMBR9CoIsghv6LSbWWK.webp\"},{\"title\":\"Get Ready For New Collection\",\"link\":\"\",\"image\":\"storage\\/theme\\/1\\/VdFl78qi0jyGy5SbjOzYvvMREZmipboWr6oncWwq.webp\"},{\"image\":\"storage\\/theme\\/1\\/Vqom1U8SJRAEJ2qIfx3WhNXTRdIuj8jOLMKY7CVH.webp\",\"link\":\"\",\"title\":\"\\u0623\\u0643\\u0628\\u0631 \\u062a\\u062c\\u0645\\u0639 \\u0644\\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0627\\u0644\\u0645\\u062d\\u0644\\u064a\\u0647\"}]}'),
(2, 2, 'en', '{\"html\":\"<div class=\\\"home-offer\\\"><h1>Get UPTO 40% OFF on your 1st order SHOP NOW<\\/h1><\\/div>\",\"css\":\".home-offer h1 {display: block;font-weight: 500;text-align: center;font-size: 22px;font-family: DM Serif Display;background-color: #E8EDFE;padding-top: 20px;padding-bottom: 20px;}@media (max-width:768px){.home-offer h1 {font-size:18px;padding-top: 10px;padding-bottom: 10px;}@media (max-width:525px) {.home-offer h1 {font-size:14px;padding-top: 6px;padding-bottom: 6px;}}\"}'),
(3, 3, 'en', '{\"title\":\"\\u062a\\u0633\\u0648\\u0642 \\u062d\\u0633\\u0628 \\u0627\\u0644\\u0641\\u0626\\u0629\",\"filters\":{\"sort\":\"asc\",\"limit\":10}}'),
(4, 4, 'en', '{\"title\":\"New Products\",\"filters\":{\"new\":1,\"sort\":\"name-asc\",\"limit\":12}}'),
(5, 5, 'en', '{\"html\":\"<div class=\\\"top-collection-container\\\"><div class=\\\"top-collection-header\\\"><h2>The game with our new additions!<\\/h2><\\/div><div class=\\\"top-collection-grid container\\\"><div class=\\\"top-collection-card\\\"><img src=\\\"\\\" data-src=\\\"storage\\/theme\\/5\\/image1.png\\\" class=\\\"lazy\\\" width=\\\"396\\\" height=\\\"396\\\" alt=\\\"The game with our new additions!\\\"><\\/div><div class=\\\"top-collection-card\\\"><img src=\\\"\\\" data-src=\\\"storage\\/theme\\/5\\/image2.png\\\" class=\\\"lazy\\\" width=\\\"396\\\" height=\\\"396\\\" alt=\\\"The game with our new additions!\\\"><\\/div><div class=\\\"top-collection-card\\\"><img src=\\\"\\\" data-src=\\\"storage\\/theme\\/5\\/image3.png\\\" class=\\\"lazy\\\" width=\\\"396\\\" height=\\\"396\\\" alt=\\\"The game with our new additions!\\\"><\\/div><\\/div><\\/div>\",\"css\":\".top-collection-container {overflow: hidden;}.top-collection-header {padding-left: 15px;padding-right: 15px;text-align: center;font-size: 70px;line-height: 90px;color: #060C3B;margin-top: 80px;}.top-collection-header h2 {max-width: 595px;margin-left: auto;margin-right: auto;font-family: DM Serif Display;}.top-collection-grid {display: flex;flex-wrap: wrap;gap: 32px;justify-content: center;margin-top: 60px;width: 100%;margin-right: auto;margin-left: auto;padding-right: 90px;padding-left: 90px;}.top-collection-card {position: relative;background: #f9fafb;overflow:hidden;border-radius:20px;}.top-collection-card img {border-radius: 16px;max-width: 100%;text-indent:-9999px;transition: transform 300ms ease;transform: scale(1);}.top-collection-card:hover img {transform: scale(1.05);transition: all 300ms ease;}.top-collection-card h3 {color: #060C3B;font-size: 30px;font-family: DM Serif Display;transform: translateX(-50%);width: max-content;left: 50%;bottom: 30px;position: absolute;margin: 0;font-weight: inherit;}@media not all and (min-width: 525px) {.top-collection-header {margin-top: 28px;font-size: 20px;line-height: 1.5;}.top-collection-grid {gap: 10px}}@media not all and (min-width: 768px) {.top-collection-header {margin-top: 30px;font-size: 28px;line-height: 3;}.top-collection-header h2 {line-height:2; margin-bottom:20px;} .top-collection-grid {gap: 14px}} @media not all and (min-width: 1024px) {.top-collection-grid {padding-left: 30px;padding-right: 30px;}}@media (max-width: 768px) {.top-collection-grid { row-gap:15px; column-gap:0px;justify-content: space-between;margin-top: 0px;} .top-collection-card{width:48%} .top-collection-card img {width:100%;} .top-collection-card h3 {font-size:24px; bottom: 16px;}}@media (max-width:520px) { .top-collection-grid{padding-left: 15px;padding-right: 15px;} .top-collection-card h3 {font-size:18px; bottom: 10px;}}\"}'),
(6, 6, 'en', '{\"html\":\"<div class=\\\"section-gap bold-collections container\\\"> <div class=\\\"inline-col-wrapper\\\"> <div class=\\\"inline-col-image-wrapper\\\"> <img src=\\\"\\\" data-src=\\\"storage\\/theme\\/6\\/section3.png\\\" class=\\\"lazy\\\" width=\\\"632\\\" height=\\\"510\\\" alt=\\\"Pride of Egyptian Industry\\\"> <\\/div> <div class=\\\"inline-col-content-wrapper\\\"> <h2 class=\\\"inline-col-title\\\"> Pride of Egyptian Industry <\\/h2> <p class=\\\"inline-col-description\\\">We proudly offer authentic Egyptian products from the finest local factories. High quality and distinctive designs that reflect the excellence of Egyptian industry and meet your needs with the best standards.<\\/p> <button class=\\\"primary-button\\\">Shop Now<\\/button> <\\/div> <\\/div> <\\/div>\",\"css\":\".section-gap{margin-top:80px}.direction-ltr{direction:ltr}.direction-rtl{direction:rtl}.inline-col-wrapper{display:grid;grid-template-columns:auto 1fr;grid-gap:60px;align-items:center}.inline-col-wrapper .inline-col-image-wrapper{overflow:hidden}.inline-col-wrapper .inline-col-image-wrapper img{max-width:100%;height:auto;border-radius:16px;text-indent:-9999px}.inline-col-wrapper .inline-col-content-wrapper{display:flex;flex-wrap:wrap;gap:20px;max-width:464px}.inline-col-wrapper .inline-col-content-wrapper .inline-col-title{max-width:442px;font-size:60px;font-weight:400;color:#060c3b;line-height:70px;font-family:DM Serif Display;margin:0}.inline-col-wrapper .inline-col-content-wrapper .inline-col-description{margin:0;font-size:18px;color:#6e6e6e;font-family:Poppins}@media (max-width:991px){.inline-col-wrapper{grid-template-columns:1fr;grid-gap:16px}.inline-col-wrapper .inline-col-content-wrapper{gap:10px}} @media (max-width:768px){.inline-col-wrapper .inline-col-image-wrapper img {width:100%;} .inline-col-wrapper .inline-col-content-wrapper .inline-col-title{font-size:28px !important;line-height:normal !important}} @media (max-width:525px){.inline-col-wrapper .inline-col-content-wrapper .inline-col-title{font-size:20px !important;} .inline-col-description{font-size:16px} .inline-col-wrapper{grid-gap:10px}}\"}'),
(7, 7, 'en', '{\"title\":\"Featured Products\",\"filters\":{\"featured\":1,\"sort\":\"name-desc\",\"limit\":12}}'),
(8, 8, 'en', '{\"html\":\"<div class=\\\"section-game\\\"><div class=\\\"section-title\\\"> <h2>The game with our new additions!<\\/h2> <\\/div> <div class=\\\"section-gap container\\\"> <div class=\\\"collection-card-wrapper\\\"> <div class=\\\"single-collection-card\\\"> <img src=\\\"\\\" data-src=\\\"storage\\/theme\\/8\\/BAUisIPdeTt2521OOoLZ3TlxSpNe8swEz3AOEGFv.webp\\\" class=\\\"lazy\\\" width=\\\"615\\\" height=\\\"600\\\" alt=\\\"The game with our new additions!\\\"> <h3 class=\\\"overlay-text\\\">Our Collections<\\/h3> <\\/div> <div class=\\\"single-collection-card\\\"> <img src=\\\"\\\" data-src=\\\"storage\\/theme\\/8\\/K9l8xhtuNwV78pjjdsHfOb51czkWNWb75e9ju3IB.webp\\\" class=\\\"lazy\\\" width=\\\"615\\\" height=\\\"600\\\" alt=\\\"The game with our new additions!\\\"> <h3 class=\\\"overlay-text\\\"> Our Collections <\\/h3> <\\/div> <\\/div> <\\/div> <\\/div>\",\"css\":\".section-game {overflow: hidden;}.section-title,.section-title h2{font-weight:400;font-family:DM Serif Display}.section-title{margin-top:80px;padding-left:15px;padding-right:15px;text-align:center;line-height:90px}.section-title h2{font-size:70px;color:#060c3b;max-width:595px;margin:auto}.collection-card-wrapper{display:flex;flex-wrap:wrap;justify-content:center;gap:30px}.collection-card-wrapper .single-collection-card{position:relative}.collection-card-wrapper .single-collection-card img{border-radius:16px;background-color:#f5f5f5;max-width:100%;height:auto;text-indent:-9999px}.collection-card-wrapper .single-collection-card .overlay-text{font-size:50px;font-weight:400;max-width:234px;font-style:italic;color:#060c3b;font-family:DM Serif Display;position:absolute;bottom:30px;left:30px;margin:0}@media (max-width:1024px){.section-title{padding:0 30px}}@media (max-width:991px){.collection-card-wrapper{flex-wrap:wrap}}@media (max-width:768px) {.collection-card-wrapper .single-collection-card .overlay-text{font-size:32px; bottom:20px}.section-title{margin-top:32px}.section-title h2{font-size:28px;line-height:normal}} @media (max-width:525px){.collection-card-wrapper .single-collection-card .overlay-text{font-size:18px; bottom:10px} .section-title{margin-top:28px}.section-title h2{font-size:20px;} .collection-card-wrapper{gap:10px; 15px; row-gap:15px; column-gap:0px;justify-content: space-between;margin-top: 15px;} .collection-card-wrapper .single-collection-card {width:48%;}}\"}'),
(9, 9, 'en', '{\"title\":\"All Products\",\"filters\":{\"sort\":\"name-desc\",\"limit\":12}}'),
(10, 10, 'en', '{\"html\":\"<div class=\\\"section-gap bold-collections container\\\"> <div class=\\\"inline-col-wrapper direction-rtl\\\"> <div class=\\\"inline-col-image-wrapper\\\"> <img src=\\\"\\\" data-src=\\\"storage\\/theme\\/10\\/pj2BuJSv13QAikKPyJ32pYmbHGR6F5PO3R1YWAqV.webp\\\" class=\\\"lazy\\\" width=\\\"632\\\" height=\\\"510\\\" alt=\\\"Get Ready for our new Bold Collections!\\\"> <\\/div> <div class=\\\"inline-col-content-wrapper direction-ltr\\\"> <h2 class=\\\"inline-col-title\\\"> Get Ready for our new Bold Collections! <\\/h2> <p class=\\\"inline-col-description\\\">Introducing Our New Bold Collections! Elevate your style with daring designs and vibrant statements. Explore striking patterns and bold colors that redefine your wardrobe. Get ready to embrace the extraordinary!<\\/p> <button class=\\\"primary-button max-md:rounded-lg max-md:px-4 max-md:py-2.5 max-md:text-sm\\\">View Collections<\\/button> <\\/div> <\\/div> <\\/div>\",\"css\":\".section-gap{margin-top:80px}.direction-ltr{direction:ltr}.direction-rtl{direction:rtl}.inline-col-wrapper{display:grid;grid-template-columns:auto 1fr;grid-gap:60px;align-items:center}.inline-col-wrapper .inline-col-image-wrapper{overflow:hidden}.inline-col-wrapper .inline-col-image-wrapper img{max-width:100%;height:auto;border-radius:16px;text-indent:-9999px}.inline-col-wrapper .inline-col-content-wrapper{display:flex;flex-wrap:wrap;gap:20px;max-width:464px}.inline-col-wrapper .inline-col-content-wrapper .inline-col-title{max-width:442px;font-size:60px;font-weight:400;color:#060c3b;line-height:70px;font-family:DM Serif Display;margin:0}.inline-col-wrapper .inline-col-content-wrapper .inline-col-description{margin:0;font-size:18px;color:#6e6e6e;font-family:Poppins}@media (max-width:991px){.inline-col-wrapper{grid-template-columns:1fr;grid-gap:16px}.inline-col-wrapper .inline-col-content-wrapper{gap:10px}}@media (max-width:768px) {.inline-col-wrapper .inline-col-image-wrapper img {max-width:100%;}.inline-col-wrapper .inline-col-content-wrapper{max-width:100%;justify-content:center; text-align:center} .section-gap{padding:0 30px; gap:20px;margin-top:24px} .bold-collections{margin-top:32px;}} @media (max-width:525px){.inline-col-wrapper .inline-col-content-wrapper{gap:10px} .inline-col-wrapper .inline-col-content-wrapper .inline-col-title{font-size:20px;line-height:normal} .section-gap{padding:0 15px; gap:15px;margin-top:10px} .bold-collections{margin-top:28px;}  .inline-col-description{font-size:16px !important} .inline-col-wrapper{grid-gap:15px}\"}'),
(11, 11, 'en', '{\"column_1\":[{\"url\":\"http:\\/\\/localhost:8000\\/page\\/about-us\",\"title\":\"About Us\",\"sort_order\":1},{\"url\":\"http:\\/\\/localhost:8000\\/contact-us\",\"title\":\"Contact Us\",\"sort_order\":2},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/customer-service\",\"title\":\"Customer Service\",\"sort_order\":3},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/whats-new\",\"title\":\"What\'s New\",\"sort_order\":4},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/terms-of-use\",\"title\":\"Terms of Use\",\"sort_order\":5},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/terms-conditions\",\"title\":\"Terms & Conditions\",\"sort_order\":6}],\"column_2\":[{\"url\":\"http:\\/\\/localhost:8000\\/page\\/privacy-policy\",\"title\":\"Privacy Policy\",\"sort_order\":1},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/payment-policy\",\"title\":\"Payment Policy\",\"sort_order\":2},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/shipping-policy\",\"title\":\"Shipping Policy\",\"sort_order\":3},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/refund-policy\",\"title\":\"Refund Policy\",\"sort_order\":4},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/return-policy\",\"title\":\"Return Policy\",\"sort_order\":5}]}'),
(12, 12, 'en', '{\"services\":[{\"title\":\"Free Shipping\",\"description\":\"Enjoy free shipping on all orders\",\"service_icon\":\"icon-truck\"},{\"title\":\"Product Replace\",\"description\":\"Easy Product Replacement Available!\",\"service_icon\":\"icon-product\"},{\"title\":\"Emi Available\",\"description\":\"No cost EMI available on all major credit cards\",\"service_icon\":\"icon-dollar-sign\"},{\"title\":\"24\\/7 Support\",\"description\":\"Dedicated 24\\/7 support via chat and email\",\"service_icon\":\"icon-support\"}]}'),
(13, 1, 'ar', '{\"images\":[{\"title\":\"Get Ready For New Collection\",\"link\":\"\",\"image\":\"storage\\/theme\\/1\\/yy6Vc8M3rhJAKN9wXmiOz6JSb8HThfdrPuy9NGYZ.webp\"},{\"title\":\"Get Ready For New Collection\",\"link\":\"\",\"image\":\"storage\\/theme\\/1\\/iYVLJNIkzbDajdQvgbIZlRZcdFPca0bVZVTPibsS.webp\"},{\"title\":\"Get Ready For New Collection\",\"link\":\"\",\"image\":\"storage\\/theme\\/1\\/0VjYGOmVJxDpeO4BjNdviqMBR9CoIsghv6LSbWWK.webp\"},{\"title\":\"Get Ready For New Collection\",\"link\":\"\",\"image\":\"storage\\/theme\\/1\\/VdFl78qi0jyGy5SbjOzYvvMREZmipboWr6oncWwq.webp\"}]}'),
(14, 2, 'ar', '{\"html\":\"<div class=\\\"home-offer\\\"><h1>\\u0627\\u062d\\u0635\\u0644 \\u0639\\u0644\\u0649 \\u062e\\u0635\\u0645 \\u064a\\u0635\\u0644 \\u0625\\u0644\\u0649 40% \\u0639\\u0644\\u0649 \\u0637\\u0644\\u0628\\u0643 \\u0627\\u0644\\u0623\\u0648\\u0644 \\u062a\\u0633\\u0648\\u0642 \\u0627\\u0644\\u0622\\u0646<\\/h1><\\/div>\",\"css\":\".home-offer h1 {display: block;font-weight: 500;text-align: center;font-size: 22px;font-family: DM Serif Display;background-color: #E8EDFE;padding-top: 20px;padding-bottom: 20px;}@media (max-width:768px){.home-offer h1 {font-size:18px;padding-top: 10px;padding-bottom: 10px;}@media (max-width:525px) {.home-offer h1 {font-size:14px;padding-top: 6px;padding-bottom: 6px;}}\"}'),
(15, 3, 'ar', '{\"title\":\"\\u062a\\u0633\\u0648\\u0642 \\u062d\\u0633\\u0628 \\u0627\\u0644\\u0641\\u0626\\u0629\",\"filters\":{\"sort\":\"asc\",\"limit\":10}}'),
(16, 4, 'ar', '{\"title\":\"\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u062c\\u062f\\u064a\\u062f\\u0629\",\"filters\":{\"new\":1,\"sort\":\"name-asc\",\"limit\":12}}'),
(17, 5, 'ar', '{\"html\":\"<div class=\\\"top-collection-container\\\"><div class=\\\"top-collection-header\\\"><h2>فين الفرصه ؟!<\\/h2><\\/div><div class=\\\"top-collection-grid container\\\"><div class=\\\"top-collection-card\\\"><img src=\\\"\\\" data-src=\\\"storage\\/theme\\/5\\/image1.png\\\" class=\\\"lazy\\\" width=\\\"396\\\" height=\\\"396\\\" alt=\\\"فين الفرصه ؟!\\\"><\\/div><div class=\\\"top-collection-card\\\"><img src=\\\"\\\" data-src=\\\"storage\\/theme\\/5\\/image2.png\\\" class=\\\"lazy\\\" width=\\\"396\\\" height=\\\"396\\\" alt=\\\"فين الفرصه ؟!\\\"><\\/div><div class=\\\"top-collection-card\\\"><img src=\\\"\\\" data-src=\\\"storage\\/theme\\/5\\/image3.png\\\" class=\\\"lazy\\\" width=\\\"396\\\" height=\\\"396\\\" alt=\\\"فين الفرصه ؟!\\\"><\\/div><\\/div><\\/div>\",\"css\":\".top-collection-container {overflow: hidden;}.top-collection-header {padding-left: 15px;padding-right: 15px;text-align: center;font-size: 70px;line-height: 90px;color: #060C3B;margin-top: 80px;}.top-collection-header h2 {max-width: 595px;margin-left: auto;margin-right: auto;font-family: DM Serif Display;}.top-collection-grid {display: flex;flex-wrap: wrap;gap: 32px;justify-content: center;margin-top: 60px;width: 100%;margin-right: auto;margin-left: auto;padding-right: 90px;padding-left: 90px;}.top-collection-card {position: relative;background: #f9fafb;overflow:hidden;border-radius:20px;}.top-collection-card img {border-radius: 16px;max-width: 100%;text-indent:-9999px;transition: transform 300ms ease;transform: scale(1);}.top-collection-card:hover img {transform: scale(1.05);transition: all 300ms ease;}.top-collection-card h3 {color: #060C3B;font-size: 30px;font-family: DM Serif Display;transform: translateX(-50%);width: max-content;left: 50%;bottom: 30px;position: absolute;margin: 0;font-weight: inherit;}@media not all and (min-width: 525px) {.top-collection-header {margin-top: 28px;font-size: 20px;line-height: 1.5;}.top-collection-grid {gap: 10px}}@media not all and (min-width: 768px) {.top-collection-header {margin-top: 30px;font-size: 28px;line-height: 3;}.top-collection-header h2 {line-height:2; margin-bottom:20px;} .top-collection-grid {gap: 14px}} @media not all and (min-width: 1024px) {.top-collection-grid {padding-left: 30px;padding-right: 30px;}}@media (max-width: 768px) {.top-collection-grid { row-gap:15px; column-gap:0px;justify-content: space-between;margin-top: 0px;} .top-collection-card{width:48%} .top-collection-card img {width:100%;} .top-collection-card h3 {font-size:24px; bottom: 16px;}}@media (max-width:520px) { .top-collection-grid{padding-left: 15px;padding-right: 15px;} .top-collection-card h3 {font-size:18px; bottom: 10px;}}\"}'),
(18, 6, 'ar', '{\"html\":\"<div class=\\\"section-gap bold-collections container\\\"> <div class=\\\"inline-col-wrapper\\\"> <div class=\\\"inline-col-image-wrapper\\\"> <img src=\\\"\\\" data-src=\\\"storage\\/theme\\/6\\/section3.png\\\" class=\\\"lazy\\\" width=\\\"632\\\" height=\\\"510\\\" alt=\\\"\\u0641\\u062e\\u0631 \\u0627\\u0644\\u0635\\u0646\\u0627\\u0639\\u0629 \\u0627\\u0644\\u0645\\u0635\\u0631\\u064a\\u0629\\\"> <\\/div> <div class=\\\"inline-col-content-wrapper\\\"> <h2 class=\\\"inline-col-title\\\"> \\u0641\\u062e\\u0631 \\u0627\\u0644\\u0635\\u0646\\u0627\\u0639\\u0629 \\u0627\\u0644\\u0645\\u0635\\u0631\\u064a\\u0629 <\\/h2> <p class=\\\"inline-col-description\\\">\\u0646\\u0641\\u062e\\u0631 \\u0628\\u062a\\u0642\\u062f\\u064a\\u0645 \\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0645\\u0635\\u0631\\u064a\\u0629 \\u0623\\u0635\\u064a\\u0644\\u0629 \\u0645\\u0646 \\u0623\\u0641\\u0636\\u0644 \\u0627\\u0644\\u0645\\u0635\\u0627\\u0646\\u0639 \\u0627\\u0644\\u0645\\u062d\\u0644\\u064a\\u0629. \\u062c\\u0648\\u062f\\u0629 \\u0639\\u0627\\u0644\\u064a\\u0629 \\u0648\\u062a\\u0635\\u0627\\u0645\\u064a\\u0645 \\u0645\\u0645\\u064a\\u0632\\u0629 \\u062a\\u0639\\u0643\\u0633 \\u0628\\u0631\\u0627\\u0639\\u0629 \\u0627\\u0644\\u0635\\u0646\\u0627\\u0639\\u0629 \\u0627\\u0644\\u0645\\u0635\\u0631\\u064a\\u0629 \\u0648\\u062a\\u0644\\u0628\\u064a \\u0627\\u062d\\u062a\\u064a\\u0627\\u062c\\u0627\\u062a\\u0643 \\u0628\\u0623\\u0641\\u0636\\u0644 \\u0627\\u0644\\u0645\\u0639\\u0627\\u064a\\u064a\\u0631.<\\/p> <button class=\\\"primary-button\\\">\\u062a\\u0633\\u0648\\u0642 \\u0627\\u0644\\u0622\\u0646<\\/button> <\\/div> <\\/div> <\\/div>\",\"css\":\".section-gap{margin-top:80px}.direction-ltr{direction:ltr}.direction-rtl{direction:rtl}.inline-col-wrapper{display:grid;grid-template-columns:auto 1fr;grid-gap:60px;align-items:center}.inline-col-wrapper .inline-col-image-wrapper{overflow:hidden}.inline-col-wrapper .inline-col-image-wrapper img{max-width:100%;height:auto;border-radius:16px;text-indent:-9999px}.inline-col-wrapper .inline-col-content-wrapper{display:flex;flex-wrap:wrap;gap:20px;max-width:464px}.inline-col-wrapper .inline-col-content-wrapper .inline-col-title{max-width:442px;font-size:60px;font-weight:400;color:#060c3b;line-height:70px;font-family:DM Serif Display;margin:0}.inline-col-wrapper .inline-col-content-wrapper .inline-col-description{margin:0;font-size:18px;color:#6e6e6e;font-family:Poppins}@media (max-width:991px){.inline-col-wrapper{grid-template-columns:1fr;grid-gap:16px}.inline-col-wrapper .inline-col-content-wrapper{gap:10px}} @media (max-width:768px){.inline-col-wrapper .inline-col-image-wrapper img {width:100%;} .inline-col-wrapper .inline-col-content-wrapper .inline-col-title{font-size:28px !important;line-height:normal !important}} @media (max-width:525px){.inline-col-wrapper .inline-col-content-wrapper .inline-col-title{font-size:20px !important;} .inline-col-description{font-size:16px} .inline-col-wrapper{grid-gap:10px}}\"}'),
(19, 7, 'ar', '{\"title\":\"\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a \\u0645\\u0645\\u064a\\u0632\\u0629\",\"filters\":{\"featured\":1,\"sort\":\"name-desc\",\"limit\":12}}'),
(20, 8, 'ar', '{\"html\":\"<div class=\\\"top-collection-container\\\"><div class=\\\"top-collection-header\\\"><h2>\\u0627\\u0644\\u0639\\u0628 \\u0645\\u0639 \\u0625\\u0636\\u0627\\u0641\\u0627\\u062a\\u0646\\u0627 \\u0627\\u0644\\u062c\\u062f\\u064a\\u062f\\u0629!<\\/h2><\\/div><div class=\\\"top-collection-grid container\\\"><div class=\\\"top-collection-card\\\"><img src=\\\"\\\" data-src=\\\"storage\\/theme\\/8\\/MJLZN2knHke36qDF6uf7xYDsE81Qlu9pBLNtfXPk.webp\\\" class=\\\"lazy\\\" width=\\\"396\\\" height=\\\"396\\\" alt=\\\"\\u0627\\u0644\\u0639\\u0628 \\u0645\\u0639 \\u0625\\u0636\\u0627\\u0641\\u0627\\u062a\\u0646\\u0627 \\u0627\\u0644\\u062c\\u062f\\u064a\\u062f\\u0629!\\\"><h3>\\u0645\\u062c\\u0645\\u0648\\u0639\\u0627\\u062a\\u0646\\u0627<\\/h3><\\/div><div class=\\\"top-collection-card\\\"><img src=\\\"\\\" data-src=\\\"storage\\/theme\\/8\\/4JI0uTHbcRYK7xI6wX7ksxpjumYhzkpODSByzxkl.webp\\\" class=\\\"lazy\\\" width=\\\"396\\\" height=\\\"396\\\" alt=\\\"\\u0627\\u0644\\u0639\\u0628 \\u0645\\u0639 \\u0625\\u0636\\u0627\\u0641\\u0627\\u062a\\u0646\\u0627 \\u0627\\u0644\\u062c\\u062f\\u064a\\u062f\\u0629!\\\"><h3>\\u0645\\u062c\\u0645\\u0648\\u0639\\u0627\\u062a\\u0646\\u0627<\\/h3><\\/div><\\/div><\\/div>\",\"css\":\".section-game {overflow: hidden;}.section-title,.section-title h2{font-weight:400;font-family:DM Serif Display}.section-title{margin-top:80px;padding-left:15px;padding-right:15px;text-align:center;line-height:90px}.section-title h2{font-size:70px;color:#060c3b;max-width:595px;margin:auto}.collection-card-wrapper{display:flex;flex-wrap:wrap;justify-content:center;gap:30px}.collection-card-wrapper .single-collection-card{position:relative}.collection-card-wrapper .single-collection-card img{border-radius:16px;background-color:#f5f5f5;max-width:100%;height:auto;text-indent:-9999px}.collection-card-wrapper .single-collection-card .overlay-text{font-size:50px;font-weight:400;max-width:234px;font-style:italic;color:#060c3b;font-family:DM Serif Display;position:absolute;bottom:30px;left:30px;margin:0}@media (max-width:1024px){.section-title{padding:0 30px}}@media (max-width:991px){.collection-card-wrapper{flex-wrap:wrap}}@media (max-width:768px) {.collection-card-wrapper .single-collection-card .overlay-text{font-size:32px; bottom:20px}.section-title{margin-top:32px}.section-title h2{font-size:28px;line-height:normal}} @media (max-width:525px){.collection-card-wrapper .single-collection-card .overlay-text{font-size:18px; bottom:10px} .section-title{margin-top:28px}.section-title h2{font-size:20px;} .collection-card-wrapper{gap:10px; 15px; row-gap:15px; column-gap:0px;justify-content: space-between;margin-top: 15px;} .collection-card-wrapper .single-collection-card {width:48%;}}\"}'),
(21, 9, 'ar', '{\"title\":\"\\u062c\\u0645\\u064a\\u0639 \\u0627\\u0644\\u0645\\u0646\\u062a\\u062c\\u0627\\u062a\",\"filters\":{\"sort\":\"name-desc\",\"limit\":12}}'),
(22, 10, 'ar', '{\"html\":\"<div class=\\\"section-gap bold-collections container\\\"> <div class=\\\"inline-col-wrapper\\\"> <div class=\\\"inline-col-image-wrapper\\\"> <img src=\\\"\\\" data-src=\\\"storage\\/theme\\/10\\/ILlKW23W2Um4SE2unzWPqSuov9E2c7Txkk6zdHNC.webp\\\" class=\\\"lazy\\\" width=\\\"632\\\" height=\\\"510\\\" alt=\\\"\\u0627\\u0633\\u062a\\u0639\\u062f \\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0627\\u062a\\u0646\\u0627 \\u0627\\u0644\\u062c\\u0631\\u064a\\u0626\\u0629 \\u0627\\u0644\\u062c\\u062f\\u064a\\u062f\\u0629!\\\"> <\\/div> <div class=\\\"inline-col-content-wrapper\\\"> <h2 class=\\\"inline-col-title\\\"> \\u0627\\u0633\\u062a\\u0639\\u062f \\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0627\\u062a\\u0646\\u0627 \\u0627\\u0644\\u062c\\u0631\\u064a\\u0626\\u0629 \\u0627\\u0644\\u062c\\u062f\\u064a\\u062f\\u0629! <\\/h2> <p class=\\\"inline-col-description\\\">\\u0646\\u0642\\u062f\\u0645 \\u0644\\u0643\\u0645 \\u0645\\u062c\\u0645\\u0648\\u0639\\u0627\\u062a\\u0646\\u0627 \\u0627\\u0644\\u062c\\u0631\\u064a\\u0626\\u0629 \\u0627\\u0644\\u062c\\u062f\\u064a\\u062f\\u0629! \\u0627\\u0631\\u062a\\u0642\\u0650 \\u0628\\u0623\\u0633\\u0644\\u0648\\u0628\\u0643 \\u0645\\u0639 \\u062a\\u0635\\u0627\\u0645\\u064a\\u0645 \\u062c\\u0631\\u064a\\u0626\\u0629 \\u0648\\u0639\\u0628\\u0627\\u0631\\u0627\\u062a \\u0646\\u0627\\u0628\\u0636\\u0629 \\u0628\\u0627\\u0644\\u062d\\u064a\\u0627\\u0629. \\u0627\\u0643\\u062a\\u0634\\u0641 \\u0627\\u0644\\u0642\\u0637\\u0639 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062c\\u0639\\u0644\\u0643 \\u0645\\u062a\\u0645\\u064a\\u0632\\u0627\\u064b \\u0648\\u062a\\u0639\\u0628\\u0631 \\u0639\\u0646 \\u0634\\u062e\\u0635\\u064a\\u062a\\u0643 \\u0627\\u0644\\u0641\\u0631\\u064a\\u062f\\u0629.<\\/p> <button class=\\\"primary-button\\\">\\u062a\\u0633\\u0648\\u0642 \\u0627\\u0644\\u0622\\u0646<\\/button> <\\/div> <\\/div> <\\/div>\",\"css\":\".section-gap{margin-top:80px}.direction-ltr{direction:ltr}.direction-rtl{direction:rtl}.inline-col-wrapper{display:grid;grid-template-columns:auto 1fr;grid-gap:60px;align-items:center}.inline-col-wrapper .inline-col-image-wrapper{overflow:hidden}.inline-col-wrapper .inline-col-image-wrapper img{max-width:100%;height:auto;border-radius:16px;text-indent:-9999px}.inline-col-wrapper .inline-col-content-wrapper{display:flex;flex-wrap:wrap;gap:20px;max-width:464px}.inline-col-wrapper .inline-col-content-wrapper .inline-col-title{max-width:442px;font-size:60px;font-weight:400;color:#060c3b;line-height:70px;font-family:DM Serif Display;margin:0}.inline-col-wrapper .inline-col-content-wrapper .inline-col-description{margin:0;font-size:18px;color:#6e6e6e;font-family:Poppins}@media (max-width:991px){.inline-col-wrapper{grid-template-columns:1fr;grid-gap:16px}.inline-col-wrapper .inline-col-content-wrapper{gap:10px}}@media (max-width:768px) {.inline-col-wrapper .inline-col-image-wrapper img {max-width:100%;}.inline-col-wrapper .inline-col-content-wrapper{max-width:100%;justify-content:center; text-align:center} .section-gap{padding:0 30px; gap:20px;margin-top:24px} .bold-collections{margin-top:32px;}} @media (max-width:525px){.inline-col-wrapper .inline-col-content-wrapper{gap:10px} .inline-col-wrapper .inline-col-content-wrapper .inline-col-title{font-size:20px;line-height:normal} .section-gap{padding:0 15px; gap:15px;margin-top:10px} .bold-collections{margin-top:28px;}  .inline-col-description{font-size:16px !important} .inline-col-wrapper{grid-gap:15px}\"}'),
(23, 11, 'ar', '{\"column_1\":[{\"url\":\"http:\\/\\/localhost:8000\\/page\\/about-us\",\"title\":\"About Us\",\"sort_order\":1},{\"url\":\"http:\\/\\/localhost:8000\\/contact-us\",\"title\":\"Contact Us\",\"sort_order\":2},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/customer-service\",\"title\":\"Customer Service\",\"sort_order\":3},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/whats-new\",\"title\":\"What\'s New\",\"sort_order\":4},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/terms-of-use\",\"title\":\"Terms of Use\",\"sort_order\":5},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/terms-conditions\",\"title\":\"Terms & Conditions\",\"sort_order\":6}],\"column_2\":[{\"url\":\"http:\\/\\/localhost:8000\\/page\\/privacy-policy\",\"title\":\"Privacy Policy\",\"sort_order\":1},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/payment-policy\",\"title\":\"Payment Policy\",\"sort_order\":2},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/shipping-policy\",\"title\":\"Shipping Policy\",\"sort_order\":3},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/refund-policy\",\"title\":\"Refund Policy\",\"sort_order\":4},{\"url\":\"http:\\/\\/localhost:8000\\/page\\/return-policy\",\"title\":\"Return Policy\",\"sort_order\":5}]}'),
(24, 12, 'ar', '{\"services\":[{\"title\":\"شحن مجاني\",\"description\":\"استمتع بالشحن المجاني على جميع الطلبات\",\"service_icon\":\"icon-truck\"},{\"title\":\"استبدال المنتج\",\"description\":\"استبدال المنتج متاح بسهولة!\",\"service_icon\":\"icon-product\"},{\"title\":\"التقسيط متاح\",\"description\":\"التقسيط بدون فوائد متاح على جميع بطاقات الائتمان الرئيسية\",\"service_icon\":\"icon-dollar-sign\"},{\"title\":\"دعم 24/7\",\"description\":\"دعم مخصص على مدار الساعة عبر الدردشة والبريد الإلكتروني\",\"service_icon\":\"icon-support\"}]}');

-- --------------------------------------------------------

--
-- Table structure for table `url_rewrites`
--

CREATE TABLE `url_rewrites` (
  `id` int(10) UNSIGNED NOT NULL,
  `entity_type` varchar(255) NOT NULL,
  `request_path` varchar(255) NOT NULL,
  `target_path` varchar(255) NOT NULL,
  `redirect_type` varchar(255) DEFAULT NULL,
  `locale` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `url_rewrites`
--

INSERT INTO `url_rewrites` (`id`, `entity_type`, `request_path`, `target_path`, `redirect_type`, `locale`, `created_at`, `updated_at`) VALUES
(1, 'category', 'root', 'mens', '301', 'en', '2026-02-01 01:18:09', '2026-02-01 01:18:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `store_name` varchar(255) DEFAULT NULL,
  `store_slug` varchar(255) DEFAULT NULL,
  `store_description` text DEFAULT NULL,
  `store_logo` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `tax_id` varchar(255) DEFAULT NULL,
  `business_email` varchar(255) DEFAULT NULL,
  `business_phone` varchar(255) DEFAULT NULL,
  `business_address` text DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `shop_description` text DEFAULT NULL,
  `shop_logo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `commercial_register` varchar(255) DEFAULT NULL,
  `commission_rate` decimal(5,2) NOT NULL DEFAULT 10.00,
  `available_balance` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `unavailable_balance` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `wallet_balance` decimal(15,2) NOT NULL DEFAULT 0.00,
  `status` enum('pending','approved','rejected','suspended') NOT NULL DEFAULT 'pending',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_banner` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `rejection_reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `customer_id`, `name`, `email`, `email_verified_at`, `password`, `shop_name`, `store_name`, `store_slug`, `store_description`, `store_logo`, `category_id`, `business_name`, `tax_id`, `business_email`, `business_phone`, `business_address`, `facebook_url`, `instagram_url`, `shop_description`, `shop_logo`, `phone`, `address`, `commercial_register`, `commission_rate`, `available_balance`, `unavailable_balance`, `wallet_balance`, `status`, `remember_token`, `created_at`, `updated_at`, `store_banner`, `meta_title`, `meta_description`, `rejection_reason`) VALUES
(1, 2, '', '', NULL, '', '', 'متجر عمر', 'mtgr-aamr', 'ةىنتاتن', 'vendor/logos/0JCeyYCPgBwSUHPtnVP8nO6IB7dwo54I37vcfClV.jpg', 4, 'omar store', '', 'omarraafat2025@gmail.com', '01157571561', '4bcjnc', '', '', NULL, NULL, NULL, NULL, NULL, 10.00, 0.0000, 0.0000, 0.00, 'approved', NULL, '2026-01-27 06:32:06', '2026-01-27 06:32:06', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_notifications`
--

CREATE TABLE `vendor_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data`)),
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_orders`
--

CREATE TABLE `vendor_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `sub_total` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `tax_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `shipping_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `discount_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `grand_total` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `commission_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `vendor_amount` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `status` enum('pending','processing','shipped','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_order_items`
--

CREATE TABLE `vendor_order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_order_id` bigint(20) UNSIGNED NOT NULL,
  `order_item_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `price` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `total` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_payouts`
--

CREATE TABLE `vendor_payouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(12,4) NOT NULL,
  `status` enum('pending','approved','paid','rejected') NOT NULL DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `requested_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `processed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_reviews`
--

CREATE TABLE `vendor_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_wallet_transactions`
--

CREATE TABLE `vendor_wallet_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('credit','debit') NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `balance_after` decimal(15,4) DEFAULT NULL,
  `availability` enum('available','unavailable') NOT NULL DEFAULT 'available',
  `reference_type` varchar(255) DEFAULT NULL,
  `reference_id` bigint(20) UNSIGNED DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method` varchar(255) DEFAULT NULL,
  `request` mediumtext DEFAULT NULL,
  `url` mediumtext DEFAULT NULL,
  `referer` mediumtext DEFAULT NULL,
  `languages` text DEFAULT NULL,
  `useragent` text DEFAULT NULL,
  `headers` text DEFAULT NULL,
  `device` text DEFAULT NULL,
  `platform` text DEFAULT NULL,
  `browser` text DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `visitable_type` varchar(255) DEFAULT NULL,
  `visitable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `visitor_type` varchar(255) DEFAULT NULL,
  `visitor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `channel_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(10) UNSIGNED NOT NULL,
  `channel_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `item_options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`item_options`)),
  `moved_to_cart` date DEFAULT NULL,
  `shared` tinyint(1) DEFAULT NULL,
  `time_of_moving` date DEFAULT NULL,
  `additional` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_items`
--

CREATE TABLE `wishlist_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `channel_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `additional` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional`)),
  `moved_to_cart` date DEFAULT NULL,
  `shared` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlist_items`
--

INSERT INTO `wishlist_items` (`id`, `channel_id`, `product_id`, `customer_id`, `additional`, `moved_to_cart`, `shared`, `created_at`, `updated_at`) VALUES
(4, 1, 11, 2, NULL, NULL, NULL, '2026-02-01 18:12:31', '2026-02-01 18:12:31'),
(5, 1, 12, 2, NULL, NULL, NULL, '2026-02-02 23:44:02', '2026-02-02 23:44:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_customer_id_foreign` (`customer_id`),
  ADD KEY `addresses_cart_id_foreign` (`cart_id`),
  ADD KEY `addresses_order_id_foreign` (`order_id`),
  ADD KEY `addresses_parent_address_id_foreign` (`parent_address_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_api_token_unique` (`api_token`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attributes_code_unique` (`code`),
  ADD KEY `attributes_code_index` (`code`);

--
-- Indexes for table `attribute_families`
--
ALTER TABLE `attribute_families`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_groups`
--
ALTER TABLE `attribute_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attribute_groups_attribute_family_id_name_unique` (`attribute_family_id`,`name`);

--
-- Indexes for table `attribute_group_mappings`
--
ALTER TABLE `attribute_group_mappings`
  ADD PRIMARY KEY (`attribute_id`,`attribute_group_id`),
  ADD KEY `attribute_group_mappings_attribute_group_id_foreign` (`attribute_group_id`);

--
-- Indexes for table `attribute_options`
--
ALTER TABLE `attribute_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_options_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `attribute_option_translations`
--
ALTER TABLE `attribute_option_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attribute_option_locale_unique` (`attribute_option_id`,`locale`);

--
-- Indexes for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attribute_translations_attribute_id_locale_unique` (`attribute_id`,`locale`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_posts_slug_unique` (`slug`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_order_item_id_foreign` (`order_item_id`),
  ADD KEY `bookings_booking_product_event_ticket_id_foreign` (`booking_product_event_ticket_id`),
  ADD KEY `bookings_order_id_foreign` (`order_id`),
  ADD KEY `bookings_product_id_foreign` (`product_id`);

--
-- Indexes for table `booking_products`
--
ALTER TABLE `booking_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `booking_product_appointment_slots`
--
ALTER TABLE `booking_product_appointment_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_product_appointment_slots_booking_product_id_foreign` (`booking_product_id`);

--
-- Indexes for table `booking_product_default_slots`
--
ALTER TABLE `booking_product_default_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_product_default_slots_booking_product_id_foreign` (`booking_product_id`);

--
-- Indexes for table `booking_product_event_tickets`
--
ALTER TABLE `booking_product_event_tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_product_event_tickets_booking_product_id_foreign` (`booking_product_id`);

--
-- Indexes for table `booking_product_event_ticket_translations`
--
ALTER TABLE `booking_product_event_ticket_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bpet_locale_unique` (`booking_product_event_ticket_id`,`locale`);

--
-- Indexes for table `booking_product_rental_slots`
--
ALTER TABLE `booking_product_rental_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_product_rental_slots_booking_product_id_foreign` (`booking_product_id`);

--
-- Indexes for table `booking_product_table_slots`
--
ALTER TABLE `booking_product_table_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_product_table_slots_booking_product_id_foreign` (`booking_product_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_channel_id_foreign` (`channel_id`),
  ADD KEY `idx_cart_customer_active` (`customer_id`,`is_active`),
  ADD KEY `idx_cart_created_at` (`created_at`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_parent_id_foreign` (`parent_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_tax_category_id_foreign` (`tax_category_id`);

--
-- Indexes for table `cart_item_inventories`
--
ALTER TABLE `cart_item_inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_payment`
--
ALTER TABLE `cart_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_payment_cart_id_foreign` (`cart_id`);

--
-- Indexes for table `cart_rules`
--
ALTER TABLE `cart_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_rule_channels`
--
ALTER TABLE `cart_rule_channels`
  ADD PRIMARY KEY (`cart_rule_id`,`channel_id`),
  ADD KEY `cart_rule_channels_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `cart_rule_coupons`
--
ALTER TABLE `cart_rule_coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_rule_coupons_cart_rule_id_foreign` (`cart_rule_id`);

--
-- Indexes for table `cart_rule_coupon_usage`
--
ALTER TABLE `cart_rule_coupon_usage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_rule_coupon_usage_cart_rule_coupon_id_foreign` (`cart_rule_coupon_id`),
  ADD KEY `cart_rule_coupon_usage_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `cart_rule_customers`
--
ALTER TABLE `cart_rule_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_rule_customers_cart_rule_id_foreign` (`cart_rule_id`),
  ADD KEY `cart_rule_customers_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `cart_rule_customer_groups`
--
ALTER TABLE `cart_rule_customer_groups`
  ADD PRIMARY KEY (`cart_rule_id`,`customer_group_id`),
  ADD KEY `cart_rule_customer_groups_customer_group_id_foreign` (`customer_group_id`);

--
-- Indexes for table `cart_rule_translations`
--
ALTER TABLE `cart_rule_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cart_rule_translations_cart_rule_id_locale_unique` (`cart_rule_id`,`locale`);

--
-- Indexes for table `cart_shipping_rates`
--
ALTER TABLE `cart_shipping_rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_shipping_rates_cart_id_foreign` (`cart_id`);

--
-- Indexes for table `catalog_rules`
--
ALTER TABLE `catalog_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalog_rule_channels`
--
ALTER TABLE `catalog_rule_channels`
  ADD PRIMARY KEY (`catalog_rule_id`,`channel_id`),
  ADD KEY `catalog_rule_channels_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `catalog_rule_customer_groups`
--
ALTER TABLE `catalog_rule_customer_groups`
  ADD PRIMARY KEY (`catalog_rule_id`,`customer_group_id`),
  ADD KEY `catalog_rule_customer_groups_customer_group_id_foreign` (`customer_group_id`);

--
-- Indexes for table `catalog_rule_products`
--
ALTER TABLE `catalog_rule_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catalog_rule_products_product_id_foreign` (`product_id`),
  ADD KEY `catalog_rule_products_customer_group_id_foreign` (`customer_group_id`),
  ADD KEY `catalog_rule_products_catalog_rule_id_foreign` (`catalog_rule_id`),
  ADD KEY `catalog_rule_products_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `catalog_rule_product_prices`
--
ALTER TABLE `catalog_rule_product_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catalog_rule_product_prices_product_id_foreign` (`product_id`),
  ADD KEY `catalog_rule_product_prices_customer_group_id_foreign` (`customer_group_id`),
  ADD KEY `catalog_rule_product_prices_catalog_rule_id_foreign` (`catalog_rule_id`),
  ADD KEY `catalog_rule_product_prices_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`),
  ADD KEY `idx_cat_status_parent` (`status`,`parent_id`),
  ADD KEY `idx_cat_position_status` (`position`,`status`);

--
-- Indexes for table `category_filterable_attributes`
--
ALTER TABLE `category_filterable_attributes`
  ADD KEY `category_filterable_attributes_category_id_foreign` (`category_id`),
  ADD KEY `category_filterable_attributes_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_translations_category_id_slug_locale_unique` (`category_id`,`slug`,`locale`),
  ADD KEY `category_translations_locale_id_foreign` (`locale_id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `channels_root_category_id_foreign` (`root_category_id`),
  ADD KEY `channels_default_locale_id_foreign` (`default_locale_id`),
  ADD KEY `channels_base_currency_id_foreign` (`base_currency_id`),
  ADD KEY `channels_hostname_idx` (`hostname`);

--
-- Indexes for table `channel_currencies`
--
ALTER TABLE `channel_currencies`
  ADD PRIMARY KEY (`channel_id`,`currency_id`),
  ADD KEY `channel_currencies_currency_id_foreign` (`currency_id`),
  ADD KEY `channel_currencies_cid_cyid_idx` (`channel_id`,`currency_id`);

--
-- Indexes for table `channel_inventory_sources`
--
ALTER TABLE `channel_inventory_sources`
  ADD UNIQUE KEY `channel_inventory_source_unique` (`channel_id`,`inventory_source_id`),
  ADD KEY `channel_inventory_sources_inventory_source_id_foreign` (`inventory_source_id`);

--
-- Indexes for table `channel_locales`
--
ALTER TABLE `channel_locales`
  ADD PRIMARY KEY (`channel_id`,`locale_id`),
  ADD KEY `channel_locales_locale_id_foreign` (`locale_id`),
  ADD KEY `channel_locales_cid_lid_idx` (`channel_id`,`locale_id`);

--
-- Indexes for table `channel_translations`
--
ALTER TABLE `channel_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `channel_translations_channel_id_locale_unique` (`channel_id`,`locale`),
  ADD KEY `channel_translations_locale_index` (`locale`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_page_channels`
--
ALTER TABLE `cms_page_channels`
  ADD UNIQUE KEY `cms_page_channels_cms_page_id_channel_id_unique` (`cms_page_id`,`channel_id`),
  ADD KEY `cms_page_channels_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `cms_page_translations`
--
ALTER TABLE `cms_page_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cms_page_translations_cms_page_id_url_key_locale_unique` (`cms_page_id`,`url_key`,`locale`);

--
-- Indexes for table `company_profiles`
--
ALTER TABLE `company_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compare_items`
--
ALTER TABLE `compare_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compare_items_product_id_foreign` (`product_id`),
  ADD KEY `compare_items_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `core_config`
--
ALTER TABLE `core_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_states`
--
ALTER TABLE `country_states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_states_country_id_foreign` (`country_id`);

--
-- Indexes for table `country_state_translations`
--
ALTER TABLE `country_state_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_state_translations_country_state_id_foreign` (`country_state_id`);

--
-- Indexes for table `country_translations`
--
ALTER TABLE `country_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_translations_country_id_foreign` (`country_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_exchange_rates`
--
ALTER TABLE `currency_exchange_rates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `currency_exchange_rates_target_currency_unique` (`target_currency`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`),
  ADD UNIQUE KEY `customers_api_token_unique` (`api_token`),
  ADD KEY `customers_customer_group_id_foreign` (`customer_group_id`),
  ADD KEY `customers_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `customer_groups`
--
ALTER TABLE `customer_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_groups_code_unique` (`code`);

--
-- Indexes for table `customer_notes`
--
ALTER TABLE `customer_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_notes_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `customer_password_resets`
--
ALTER TABLE `customer_password_resets`
  ADD KEY `customer_password_resets_email_index` (`email`);

--
-- Indexes for table `customer_social_accounts`
--
ALTER TABLE `customer_social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_social_accounts_provider_id_unique` (`provider_id`),
  ADD KEY `customer_social_accounts_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `customer_wallet_transactions`
--
ALTER TABLE `customer_wallet_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_wallet_transactions_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `datagrid_saved_filters`
--
ALTER TABLE `datagrid_saved_filters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `datagrid_saved_filters_user_id_name_src_unique` (`user_id`,`name`,`src`);

--
-- Indexes for table `downloadable_link_purchased`
--
ALTER TABLE `downloadable_link_purchased`
  ADD PRIMARY KEY (`id`),
  ADD KEY `downloadable_link_purchased_customer_id_foreign` (`customer_id`),
  ADD KEY `downloadable_link_purchased_order_id_foreign` (`order_id`),
  ADD KEY `downloadable_link_purchased_order_item_id_foreign` (`order_item_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gdpr_data_request`
--
ALTER TABLE `gdpr_data_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gdpr_data_request_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `imports`
--
ALTER TABLE `imports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_batches`
--
ALTER TABLE `import_batches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `import_batches_import_id_foreign` (`import_id`);

--
-- Indexes for table `inventory_sources`
--
ALTER TABLE `inventory_sources`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inventory_sources_code_unique` (`code`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_order_id_foreign` (`order_id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_items_invoice_id_foreign` (`invoice_id`),
  ADD KEY `invoice_items_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`),
  ADD KEY `jobs_company_id_foreign` (`company_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_job_listing_id_foreign` (`job_listing_id`),
  ADD KEY `job_applications_job_id_foreign` (`job_id`),
  ADD KEY `job_applications_user_id_foreign` (`user_id`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_categories_slug_unique` (`slug`);

--
-- Indexes for table `job_listings`
--
ALTER TABLE `job_listings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_listings_slug_unique` (`slug`);

--
-- Indexes for table `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locales_code_unique` (`code`);

--
-- Indexes for table `marketing_campaigns`
--
ALTER TABLE `marketing_campaigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marketing_campaigns_channel_id_foreign` (`channel_id`),
  ADD KEY `marketing_campaigns_customer_group_id_foreign` (`customer_group_id`),
  ADD KEY `marketing_campaigns_marketing_template_id_foreign` (`marketing_template_id`),
  ADD KEY `marketing_campaigns_marketing_event_id_foreign` (`marketing_event_id`);

--
-- Indexes for table `marketing_events`
--
ALTER TABLE `marketing_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketing_templates`
--
ALTER TABLE `marketing_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_order_id_foreign` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_increment_id_unique` (`increment_id`),
  ADD KEY `orders_channel_id_foreign` (`channel_id`),
  ADD KEY `orders_seller_id_index` (`seller_id`),
  ADD KEY `idx_orders_customer` (`customer_id`),
  ADD KEY `idx_orders_created_at` (`created_at`);

--
-- Indexes for table `order_comments`
--
ALTER TABLE `order_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_comments_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_parent_id_foreign` (`parent_id`),
  ADD KEY `order_items_tax_category_id_foreign` (`tax_category_id`);

--
-- Indexes for table `order_payment`
--
ALTER TABLE `order_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_payment_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_transactions`
--
ALTER TABLE `order_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_transactions_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_transactions_order_id_foreign` (`order_id`),
  ADD KEY `payment_transactions_transaction_id_payment_method_index` (`transaction_id`,`payment_method`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_attribute_family_id_foreign` (`attribute_family_id`),
  ADD KEY `products_parent_id_foreign` (`parent_id`),
  ADD KEY `products_seller_id_index` (`seller_id`),
  ADD KEY `idx_products_vendor` (`vendor_id`),
  ADD KEY `idx_products_created_at` (`created_at`),
  ADD KEY `idx_prod_status_visibility` (`status`,`visibility`),
  ADD KEY `idx_prod_created_at` (`created_at`),
  ADD KEY `idx_prod_vendor_status` (`vendor_id`,`status`);

--
-- Indexes for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chanel_locale_attribute_value_index_unique` (`channel`,`locale`,`attribute_id`,`product_id`),
  ADD UNIQUE KEY `product_attribute_values_unique_id_unique` (`unique_id`),
  ADD KEY `product_attribute_values_attribute_id_foreign` (`attribute_id`),
  ADD KEY `prod_attr_product_id_idx` (`product_id`);

--
-- Indexes for table `product_bundle_options`
--
ALTER TABLE `product_bundle_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_bundle_options_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_bundle_option_products`
--
ALTER TABLE `product_bundle_option_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bundle_option_products_product_id_bundle_option_id_unique` (`product_id`,`product_bundle_option_id`),
  ADD KEY `pbop_option_id_idx` (`product_bundle_option_id`);

--
-- Indexes for table `product_bundle_option_translations`
--
ALTER TABLE `product_bundle_option_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_bundle_option_translations_option_id_locale_unique` (`product_bundle_option_id`,`locale`),
  ADD UNIQUE KEY `bundle_option_translations_locale_label_bundle_option_id_unique` (`locale`,`label`,`product_bundle_option_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD UNIQUE KEY `product_categories_product_id_category_id_unique` (`product_id`,`category_id`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_channels`
--
ALTER TABLE `product_channels`
  ADD UNIQUE KEY `product_channels_product_id_channel_id_unique` (`product_id`,`channel_id`),
  ADD KEY `product_channels_channel_id_foreign` (`channel_id`),
  ADD KEY `pc_product_id_channel_id_idx` (`product_id`,`channel_id`);

--
-- Indexes for table `product_cross_sells`
--
ALTER TABLE `product_cross_sells`
  ADD UNIQUE KEY `product_cross_sells_parent_id_child_id_unique` (`parent_id`,`child_id`),
  ADD KEY `product_cross_sells_child_id_foreign` (`child_id`);

--
-- Indexes for table `product_customer_group_prices`
--
ALTER TABLE `product_customer_group_prices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_customer_group_prices_unique_id_unique` (`unique_id`),
  ADD KEY `product_customer_group_prices_product_id_foreign` (`product_id`),
  ADD KEY `product_customer_group_prices_customer_group_id_foreign` (`customer_group_id`);

--
-- Indexes for table `product_customizable_options`
--
ALTER TABLE `product_customizable_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_customizable_options_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_customizable_option_prices`
--
ALTER TABLE `product_customizable_option_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pcop_product_customizable_option_id_foreign` (`product_customizable_option_id`);

--
-- Indexes for table `product_customizable_option_translations`
--
ALTER TABLE `product_customizable_option_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_customizable_option_id_locale_unique` (`product_customizable_option_id`,`locale`);

--
-- Indexes for table `product_downloadable_links`
--
ALTER TABLE `product_downloadable_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_downloadable_links_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_downloadable_link_translations`
--
ALTER TABLE `product_downloadable_link_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `link_translations_link_id_foreign` (`product_downloadable_link_id`);

--
-- Indexes for table `product_downloadable_samples`
--
ALTER TABLE `product_downloadable_samples`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_downloadable_samples_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_downloadable_sample_translations`
--
ALTER TABLE `product_downloadable_sample_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sample_translations_sample_id_foreign` (`product_downloadable_sample_id`);

--
-- Indexes for table `product_flat`
--
ALTER TABLE `product_flat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_flat_unique_index` (`product_id`,`channel`,`locale`),
  ADD KEY `product_flat_attribute_family_id_foreign` (`attribute_family_id`),
  ADD KEY `product_flat_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `product_grouped_products`
--
ALTER TABLE `product_grouped_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grouped_products_product_id_associated_product_id_unique` (`product_id`,`associated_product_id`),
  ADD KEY `product_grouped_products_associated_product_id_foreign` (`associated_product_id`),
  ADD KEY `pgp_product_id_idx` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_img_product_id_idx` (`product_id`);

--
-- Indexes for table `product_inventories`
--
ALTER TABLE `product_inventories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_source_vendor_index_unique` (`product_id`,`inventory_source_id`,`vendor_id`),
  ADD KEY `product_inventories_inventory_source_id_foreign` (`inventory_source_id`);

--
-- Indexes for table `product_inventory_indices`
--
ALTER TABLE `product_inventory_indices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_inventory_indices_product_id_channel_id_unique` (`product_id`,`channel_id`),
  ADD KEY `product_inventory_indices_channel_id_foreign` (`channel_id`),
  ADD KEY `prod_inv_product_id_idx` (`product_id`);

--
-- Indexes for table `product_ordered_inventories`
--
ALTER TABLE `product_ordered_inventories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_ordered_inventories_product_id_channel_id_unique` (`product_id`,`channel_id`),
  ADD KEY `product_ordered_inventories_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `product_price_indices`
--
ALTER TABLE `product_price_indices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `price_indices_product_id_customer_group_id_channel_id_unique` (`product_id`,`customer_group_id`,`channel_id`),
  ADD KEY `product_price_indices_customer_group_id_foreign` (`customer_group_id`),
  ADD KEY `product_price_indices_channel_id_foreign` (`channel_id`),
  ADD KEY `ppi_product_id_customer_group_id_idx` (`product_id`,`customer_group_id`);

--
-- Indexes for table `product_relations`
--
ALTER TABLE `product_relations`
  ADD UNIQUE KEY `product_relations_parent_id_child_id_unique` (`parent_id`,`child_id`),
  ADD KEY `product_relations_child_id_foreign` (`child_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_rev_product_id_idx` (`product_id`);

--
-- Indexes for table `product_review_attachments`
--
ALTER TABLE `product_review_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_review_images_review_id_foreign` (`review_id`);

--
-- Indexes for table `product_super_attributes`
--
ALTER TABLE `product_super_attributes`
  ADD UNIQUE KEY `product_super_attributes_product_id_attribute_id_unique` (`product_id`,`attribute_id`),
  ADD KEY `product_super_attributes_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `product_up_sells`
--
ALTER TABLE `product_up_sells`
  ADD UNIQUE KEY `product_up_sells_parent_id_child_id_unique` (`parent_id`,`child_id`),
  ADD KEY `product_up_sells_child_id_foreign` (`child_id`);

--
-- Indexes for table `product_videos`
--
ALTER TABLE `product_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_vid_product_id_idx` (`product_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `refunds_order_id_foreign` (`order_id`);

--
-- Indexes for table `refund_items`
--
ALTER TABLE `refund_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `refund_items_parent_id_foreign` (`parent_id`),
  ADD KEY `refund_items_order_item_id_foreign` (`order_item_id`),
  ADD KEY `refund_items_refund_id_foreign` (`refund_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `search_synonyms`
--
ALTER TABLE `search_synonyms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_terms`
--
ALTER TABLE `search_terms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `search_terms_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sellers_store_slug_unique` (`store_slug`),
  ADD KEY `sellers_customer_id_status_index` (`customer_id`,`status`),
  ADD KEY `sellers_category_id_foreign` (`category_id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipments_order_id_foreign` (`order_id`),
  ADD KEY `shipments_inventory_source_id_foreign` (`inventory_source_id`);

--
-- Indexes for table `shipment_items`
--
ALTER TABLE `shipment_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipment_items_shipment_id_foreign` (`shipment_id`);

--
-- Indexes for table `sitemaps`
--
ALTER TABLE `sitemaps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers_list`
--
ALTER TABLE `subscribers_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscribers_list_customer_id_foreign` (`customer_id`),
  ADD KEY `subscribers_list_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `tax_categories`
--
ALTER TABLE `tax_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tax_categories_code_unique` (`code`);

--
-- Indexes for table `tax_categories_tax_rates`
--
ALTER TABLE `tax_categories_tax_rates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tax_map_index_unique` (`tax_category_id`,`tax_rate_id`),
  ADD KEY `tax_categories_tax_rates_tax_rate_id_foreign` (`tax_rate_id`);

--
-- Indexes for table `tax_rates`
--
ALTER TABLE `tax_rates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tax_rates_identifier_unique` (`identifier`);

--
-- Indexes for table `theme_customizations`
--
ALTER TABLE `theme_customizations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theme_customizations_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `theme_customization_translations`
--
ALTER TABLE `theme_customization_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theme_customization_id_foreign` (`theme_customization_id`);

--
-- Indexes for table `url_rewrites`
--
ALTER TABLE `url_rewrites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `url_rewrites_et_rp_lc_idx` (`entity_type`,`request_path`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_store_slug_unique` (`store_slug`),
  ADD KEY `vendors_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `vendor_notifications`
--
ALTER TABLE `vendor_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_notifications_vendor_id_read_at_index` (`vendor_id`,`read_at`);

--
-- Indexes for table `vendor_orders`
--
ALTER TABLE `vendor_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_orders_order_id_foreign` (`order_id`),
  ADD KEY `idx_vendor_orders_vendor_status` (`vendor_id`,`status`),
  ADD KEY `idx_vendor_orders_created` (`created_at`);

--
-- Indexes for table `vendor_order_items`
--
ALTER TABLE `vendor_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_order_items_vendor_order_id_foreign` (`vendor_order_id`),
  ADD KEY `vendor_order_items_order_item_id_foreign` (`order_item_id`),
  ADD KEY `vendor_order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `vendor_payouts`
--
ALTER TABLE `vendor_payouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_payouts_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `vendor_reviews`
--
ALTER TABLE `vendor_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_reviews_vendor_id_foreign` (`vendor_id`),
  ADD KEY `vendor_reviews_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `vendor_wallet_transactions`
--
ALTER TABLE `vendor_wallet_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_wallet_transactions_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visits_visitable_type_visitable_id_index` (`visitable_type`,`visitable_id`),
  ADD KEY `visits_visitor_type_visitor_id_index` (`visitor_type`,`visitor_id`),
  ADD KEY `visits_cid_ip_m_vid_vt_ca_idx` (`channel_id`,`ip`,`method`,`visitor_id`,`visitor_type`,`created_at`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlist_channel_id_foreign` (`channel_id`),
  ADD KEY `wishlist_product_id_foreign` (`product_id`),
  ADD KEY `wishlist_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `wishlist_items`
--
ALTER TABLE `wishlist_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlist_items_channel_id_foreign` (`channel_id`),
  ADD KEY `wishlist_items_product_id_foreign` (`product_id`),
  ADD KEY `wishlist_items_customer_id_foreign` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `attribute_families`
--
ALTER TABLE `attribute_families`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attribute_groups`
--
ALTER TABLE `attribute_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attribute_options`
--
ALTER TABLE `attribute_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `attribute_option_translations`
--
ALTER TABLE `attribute_option_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_products`
--
ALTER TABLE `booking_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_product_appointment_slots`
--
ALTER TABLE `booking_product_appointment_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_product_default_slots`
--
ALTER TABLE `booking_product_default_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_product_event_tickets`
--
ALTER TABLE `booking_product_event_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_product_event_ticket_translations`
--
ALTER TABLE `booking_product_event_ticket_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_product_rental_slots`
--
ALTER TABLE `booking_product_rental_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_product_table_slots`
--
ALTER TABLE `booking_product_table_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cart_item_inventories`
--
ALTER TABLE `cart_item_inventories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_payment`
--
ALTER TABLE `cart_payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart_rules`
--
ALTER TABLE `cart_rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_rule_coupons`
--
ALTER TABLE `cart_rule_coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_rule_coupon_usage`
--
ALTER TABLE `cart_rule_coupon_usage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_rule_customers`
--
ALTER TABLE `cart_rule_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_rule_translations`
--
ALTER TABLE `cart_rule_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_shipping_rates`
--
ALTER TABLE `cart_shipping_rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `catalog_rules`
--
ALTER TABLE `catalog_rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catalog_rule_products`
--
ALTER TABLE `catalog_rule_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catalog_rule_product_prices`
--
ALTER TABLE `catalog_rule_product_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `channel_translations`
--
ALTER TABLE `channel_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cms_page_translations`
--
ALTER TABLE `cms_page_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `company_profiles`
--
ALTER TABLE `company_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compare_items`
--
ALTER TABLE `compare_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_config`
--
ALTER TABLE `core_config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `country_states`
--
ALTER TABLE `country_states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=587;

--
-- AUTO_INCREMENT for table `country_state_translations`
--
ALTER TABLE `country_state_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country_translations`
--
ALTER TABLE `country_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currency_exchange_rates`
--
ALTER TABLE `currency_exchange_rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_groups`
--
ALTER TABLE `customer_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_notes`
--
ALTER TABLE `customer_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_social_accounts`
--
ALTER TABLE `customer_social_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_wallet_transactions`
--
ALTER TABLE `customer_wallet_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datagrid_saved_filters`
--
ALTER TABLE `datagrid_saved_filters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `downloadable_link_purchased`
--
ALTER TABLE `downloadable_link_purchased`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gdpr_data_request`
--
ALTER TABLE `gdpr_data_request`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imports`
--
ALTER TABLE `imports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `import_batches`
--
ALTER TABLE `import_batches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_sources`
--
ALTER TABLE `inventory_sources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_listings`
--
ALTER TABLE `job_listings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locales`
--
ALTER TABLE `locales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marketing_campaigns`
--
ALTER TABLE `marketing_campaigns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marketing_events`
--
ALTER TABLE `marketing_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marketing_templates`
--
ALTER TABLE `marketing_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_comments`
--
ALTER TABLE `order_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_payment`
--
ALTER TABLE `order_payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_transactions`
--
ALTER TABLE `order_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT for table `product_bundle_options`
--
ALTER TABLE `product_bundle_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_bundle_option_products`
--
ALTER TABLE `product_bundle_option_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_bundle_option_translations`
--
ALTER TABLE `product_bundle_option_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_customer_group_prices`
--
ALTER TABLE `product_customer_group_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_customizable_options`
--
ALTER TABLE `product_customizable_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_customizable_option_prices`
--
ALTER TABLE `product_customizable_option_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_customizable_option_translations`
--
ALTER TABLE `product_customizable_option_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_downloadable_links`
--
ALTER TABLE `product_downloadable_links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_downloadable_link_translations`
--
ALTER TABLE `product_downloadable_link_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_downloadable_samples`
--
ALTER TABLE `product_downloadable_samples`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_downloadable_sample_translations`
--
ALTER TABLE `product_downloadable_sample_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_flat`
--
ALTER TABLE `product_flat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `product_grouped_products`
--
ALTER TABLE `product_grouped_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_inventories`
--
ALTER TABLE `product_inventories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_inventory_indices`
--
ALTER TABLE `product_inventory_indices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_ordered_inventories`
--
ALTER TABLE `product_ordered_inventories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_price_indices`
--
ALTER TABLE `product_price_indices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_review_attachments`
--
ALTER TABLE `product_review_attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_videos`
--
ALTER TABLE `product_videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refunds`
--
ALTER TABLE `refunds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refund_items`
--
ALTER TABLE `refund_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `search_synonyms`
--
ALTER TABLE `search_synonyms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `search_terms`
--
ALTER TABLE `search_terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipment_items`
--
ALTER TABLE `shipment_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sitemaps`
--
ALTER TABLE `sitemaps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers_list`
--
ALTER TABLE `subscribers_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_categories`
--
ALTER TABLE `tax_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_categories_tax_rates`
--
ALTER TABLE `tax_categories_tax_rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_rates`
--
ALTER TABLE `tax_rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theme_customizations`
--
ALTER TABLE `theme_customizations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `theme_customization_translations`
--
ALTER TABLE `theme_customization_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `url_rewrites`
--
ALTER TABLE `url_rewrites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor_notifications`
--
ALTER TABLE `vendor_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor_orders`
--
ALTER TABLE `vendor_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor_order_items`
--
ALTER TABLE `vendor_order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor_payouts`
--
ALTER TABLE `vendor_payouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor_reviews`
--
ALTER TABLE `vendor_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor_wallet_transactions`
--
ALTER TABLE `vendor_wallet_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist_items`
--
ALTER TABLE `wishlist_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `addresses_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `addresses_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `addresses_parent_address_id_foreign` FOREIGN KEY (`parent_address_id`) REFERENCES `addresses` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `attribute_groups`
--
ALTER TABLE `attribute_groups`
  ADD CONSTRAINT `attribute_groups_attribute_family_id_foreign` FOREIGN KEY (`attribute_family_id`) REFERENCES `attribute_families` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_group_mappings`
--
ALTER TABLE `attribute_group_mappings`
  ADD CONSTRAINT `attribute_group_mappings_attribute_group_id_foreign` FOREIGN KEY (`attribute_group_id`) REFERENCES `attribute_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_group_mappings_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_options`
--
ALTER TABLE `attribute_options`
  ADD CONSTRAINT `attribute_options_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_option_translations`
--
ALTER TABLE `attribute_option_translations`
  ADD CONSTRAINT `attribute_option_translations_attribute_option_id_foreign` FOREIGN KEY (`attribute_option_id`) REFERENCES `attribute_options` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  ADD CONSTRAINT `attribute_translations_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_booking_product_event_ticket_id_foreign` FOREIGN KEY (`booking_product_event_ticket_id`) REFERENCES `booking_product_event_tickets` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `bookings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `bookings_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `bookings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `booking_products`
--
ALTER TABLE `booking_products`
  ADD CONSTRAINT `booking_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `booking_product_appointment_slots`
--
ALTER TABLE `booking_product_appointment_slots`
  ADD CONSTRAINT `booking_product_appointment_slots_booking_product_id_foreign` FOREIGN KEY (`booking_product_id`) REFERENCES `booking_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `booking_product_default_slots`
--
ALTER TABLE `booking_product_default_slots`
  ADD CONSTRAINT `booking_product_default_slots_booking_product_id_foreign` FOREIGN KEY (`booking_product_id`) REFERENCES `booking_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `booking_product_event_tickets`
--
ALTER TABLE `booking_product_event_tickets`
  ADD CONSTRAINT `booking_product_event_tickets_booking_product_id_foreign` FOREIGN KEY (`booking_product_id`) REFERENCES `booking_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `booking_product_event_ticket_translations`
--
ALTER TABLE `booking_product_event_ticket_translations`
  ADD CONSTRAINT `bpet_translations_fk` FOREIGN KEY (`booking_product_event_ticket_id`) REFERENCES `booking_product_event_tickets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `booking_product_rental_slots`
--
ALTER TABLE `booking_product_rental_slots`
  ADD CONSTRAINT `booking_product_rental_slots_booking_product_id_foreign` FOREIGN KEY (`booking_product_id`) REFERENCES `booking_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `booking_product_table_slots`
--
ALTER TABLE `booking_product_table_slots`
  ADD CONSTRAINT `booking_product_table_slots_booking_product_id_foreign` FOREIGN KEY (`booking_product_id`) REFERENCES `booking_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `cart_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_tax_category_id_foreign` FOREIGN KEY (`tax_category_id`) REFERENCES `tax_categories` (`id`);

--
-- Constraints for table `cart_payment`
--
ALTER TABLE `cart_payment`
  ADD CONSTRAINT `cart_payment_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_rule_channels`
--
ALTER TABLE `cart_rule_channels`
  ADD CONSTRAINT `cart_rule_channels_cart_rule_id_foreign` FOREIGN KEY (`cart_rule_id`) REFERENCES `cart_rules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_rule_channels_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_rule_coupons`
--
ALTER TABLE `cart_rule_coupons`
  ADD CONSTRAINT `cart_rule_coupons_cart_rule_id_foreign` FOREIGN KEY (`cart_rule_id`) REFERENCES `cart_rules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_rule_coupon_usage`
--
ALTER TABLE `cart_rule_coupon_usage`
  ADD CONSTRAINT `cart_rule_coupon_usage_cart_rule_coupon_id_foreign` FOREIGN KEY (`cart_rule_coupon_id`) REFERENCES `cart_rule_coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_rule_coupon_usage_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_rule_customers`
--
ALTER TABLE `cart_rule_customers`
  ADD CONSTRAINT `cart_rule_customers_cart_rule_id_foreign` FOREIGN KEY (`cart_rule_id`) REFERENCES `cart_rules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_rule_customers_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_rule_customer_groups`
--
ALTER TABLE `cart_rule_customer_groups`
  ADD CONSTRAINT `cart_rule_customer_groups_cart_rule_id_foreign` FOREIGN KEY (`cart_rule_id`) REFERENCES `cart_rules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_rule_customer_groups_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_rule_translations`
--
ALTER TABLE `cart_rule_translations`
  ADD CONSTRAINT `cart_rule_translations_cart_rule_id_foreign` FOREIGN KEY (`cart_rule_id`) REFERENCES `cart_rules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_shipping_rates`
--
ALTER TABLE `cart_shipping_rates`
  ADD CONSTRAINT `cart_shipping_rates_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `catalog_rule_channels`
--
ALTER TABLE `catalog_rule_channels`
  ADD CONSTRAINT `catalog_rule_channels_catalog_rule_id_foreign` FOREIGN KEY (`catalog_rule_id`) REFERENCES `catalog_rules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `catalog_rule_channels_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `catalog_rule_customer_groups`
--
ALTER TABLE `catalog_rule_customer_groups`
  ADD CONSTRAINT `catalog_rule_customer_groups_catalog_rule_id_foreign` FOREIGN KEY (`catalog_rule_id`) REFERENCES `catalog_rules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `catalog_rule_customer_groups_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `catalog_rule_products`
--
ALTER TABLE `catalog_rule_products`
  ADD CONSTRAINT `catalog_rule_products_catalog_rule_id_foreign` FOREIGN KEY (`catalog_rule_id`) REFERENCES `catalog_rules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `catalog_rule_products_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `catalog_rule_products_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `catalog_rule_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `catalog_rule_product_prices`
--
ALTER TABLE `catalog_rule_product_prices`
  ADD CONSTRAINT `catalog_rule_product_prices_catalog_rule_id_foreign` FOREIGN KEY (`catalog_rule_id`) REFERENCES `catalog_rules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `catalog_rule_product_prices_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `catalog_rule_product_prices_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `catalog_rule_product_prices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_filterable_attributes`
--
ALTER TABLE `category_filterable_attributes`
  ADD CONSTRAINT `category_filterable_attributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_filterable_attributes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_translations_locale_id_foreign` FOREIGN KEY (`locale_id`) REFERENCES `locales` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `channels`
--
ALTER TABLE `channels`
  ADD CONSTRAINT `channels_base_currency_id_foreign` FOREIGN KEY (`base_currency_id`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `channels_default_locale_id_foreign` FOREIGN KEY (`default_locale_id`) REFERENCES `locales` (`id`),
  ADD CONSTRAINT `channels_root_category_id_foreign` FOREIGN KEY (`root_category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `channel_currencies`
--
ALTER TABLE `channel_currencies`
  ADD CONSTRAINT `channel_currencies_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `channel_currencies_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `channel_inventory_sources`
--
ALTER TABLE `channel_inventory_sources`
  ADD CONSTRAINT `channel_inventory_sources_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `channel_inventory_sources_inventory_source_id_foreign` FOREIGN KEY (`inventory_source_id`) REFERENCES `inventory_sources` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `channel_locales`
--
ALTER TABLE `channel_locales`
  ADD CONSTRAINT `channel_locales_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `channel_locales_locale_id_foreign` FOREIGN KEY (`locale_id`) REFERENCES `locales` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `channel_translations`
--
ALTER TABLE `channel_translations`
  ADD CONSTRAINT `channel_translations_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cms_page_channels`
--
ALTER TABLE `cms_page_channels`
  ADD CONSTRAINT `cms_page_channels_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cms_page_channels_cms_page_id_foreign` FOREIGN KEY (`cms_page_id`) REFERENCES `cms_pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cms_page_translations`
--
ALTER TABLE `cms_page_translations`
  ADD CONSTRAINT `cms_page_translations_cms_page_id_foreign` FOREIGN KEY (`cms_page_id`) REFERENCES `cms_pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `compare_items`
--
ALTER TABLE `compare_items`
  ADD CONSTRAINT `compare_items_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compare_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `country_states`
--
ALTER TABLE `country_states`
  ADD CONSTRAINT `country_states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `country_state_translations`
--
ALTER TABLE `country_state_translations`
  ADD CONSTRAINT `country_state_translations_country_state_id_foreign` FOREIGN KEY (`country_state_id`) REFERENCES `country_states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `country_translations`
--
ALTER TABLE `country_translations`
  ADD CONSTRAINT `country_translations_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `currency_exchange_rates`
--
ALTER TABLE `currency_exchange_rates`
  ADD CONSTRAINT `currency_exchange_rates_target_currency_foreign` FOREIGN KEY (`target_currency`) REFERENCES `currencies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `customers_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `customer_notes`
--
ALTER TABLE `customer_notes`
  ADD CONSTRAINT `customer_notes_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_social_accounts`
--
ALTER TABLE `customer_social_accounts`
  ADD CONSTRAINT `customer_social_accounts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_wallet_transactions`
--
ALTER TABLE `customer_wallet_transactions`
  ADD CONSTRAINT `customer_wallet_transactions_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `downloadable_link_purchased`
--
ALTER TABLE `downloadable_link_purchased`
  ADD CONSTRAINT `downloadable_link_purchased_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `downloadable_link_purchased_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `downloadable_link_purchased_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gdpr_data_request`
--
ALTER TABLE `gdpr_data_request`
  ADD CONSTRAINT `gdpr_data_request_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `import_batches`
--
ALTER TABLE `import_batches`
  ADD CONSTRAINT `import_batches_import_id_foreign` FOREIGN KEY (`import_id`) REFERENCES `imports` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD CONSTRAINT `invoice_items_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `invoice_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `job_listings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applications_job_listing_id_foreign` FOREIGN KEY (`job_listing_id`) REFERENCES `job_listings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `marketing_campaigns`
--
ALTER TABLE `marketing_campaigns`
  ADD CONSTRAINT `marketing_campaigns_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `marketing_campaigns_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `marketing_campaigns_marketing_event_id_foreign` FOREIGN KEY (`marketing_event_id`) REFERENCES `marketing_events` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `marketing_campaigns_marketing_template_id_foreign` FOREIGN KEY (`marketing_template_id`) REFERENCES `marketing_templates` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_comments`
--
ALTER TABLE `order_comments`
  ADD CONSTRAINT `order_comments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_tax_category_id_foreign` FOREIGN KEY (`tax_category_id`) REFERENCES `tax_categories` (`id`);

--
-- Constraints for table `order_payment`
--
ALTER TABLE `order_payment`
  ADD CONSTRAINT `order_payment_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_transactions`
--
ALTER TABLE `order_transactions`
  ADD CONSTRAINT `order_transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  ADD CONSTRAINT `payment_transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_attribute_family_id_foreign` FOREIGN KEY (`attribute_family_id`) REFERENCES `attribute_families` (`id`),
  ADD CONSTRAINT `products_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD CONSTRAINT `product_attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_attribute_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_bundle_options`
--
ALTER TABLE `product_bundle_options`
  ADD CONSTRAINT `product_bundle_options_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_bundle_option_products`
--
ALTER TABLE `product_bundle_option_products`
  ADD CONSTRAINT `product_bundle_option_id_foreign` FOREIGN KEY (`product_bundle_option_id`) REFERENCES `product_bundle_options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_bundle_option_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_bundle_option_translations`
--
ALTER TABLE `product_bundle_option_translations`
  ADD CONSTRAINT `product_bundle_option_translations_option_id_foreign` FOREIGN KEY (`product_bundle_option_id`) REFERENCES `product_bundle_options` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_channels`
--
ALTER TABLE `product_channels`
  ADD CONSTRAINT `product_channels_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_channels_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_cross_sells`
--
ALTER TABLE `product_cross_sells`
  ADD CONSTRAINT `product_cross_sells_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_cross_sells_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_customer_group_prices`
--
ALTER TABLE `product_customer_group_prices`
  ADD CONSTRAINT `product_customer_group_prices_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_customer_group_prices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_customizable_options`
--
ALTER TABLE `product_customizable_options`
  ADD CONSTRAINT `product_customizable_options_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_customizable_option_prices`
--
ALTER TABLE `product_customizable_option_prices`
  ADD CONSTRAINT `pcop_product_customizable_option_id_foreign` FOREIGN KEY (`product_customizable_option_id`) REFERENCES `product_customizable_options` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_customizable_option_translations`
--
ALTER TABLE `product_customizable_option_translations`
  ADD CONSTRAINT `pcot_product_customizable_option_id_foreign` FOREIGN KEY (`product_customizable_option_id`) REFERENCES `product_customizable_options` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_downloadable_links`
--
ALTER TABLE `product_downloadable_links`
  ADD CONSTRAINT `product_downloadable_links_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_downloadable_link_translations`
--
ALTER TABLE `product_downloadable_link_translations`
  ADD CONSTRAINT `link_translations_link_id_foreign` FOREIGN KEY (`product_downloadable_link_id`) REFERENCES `product_downloadable_links` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_downloadable_samples`
--
ALTER TABLE `product_downloadable_samples`
  ADD CONSTRAINT `product_downloadable_samples_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_downloadable_sample_translations`
--
ALTER TABLE `product_downloadable_sample_translations`
  ADD CONSTRAINT `sample_translations_sample_id_foreign` FOREIGN KEY (`product_downloadable_sample_id`) REFERENCES `product_downloadable_samples` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_flat`
--
ALTER TABLE `product_flat`
  ADD CONSTRAINT `product_flat_attribute_family_id_foreign` FOREIGN KEY (`attribute_family_id`) REFERENCES `attribute_families` (`id`),
  ADD CONSTRAINT `product_flat_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `product_flat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_flat_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_grouped_products`
--
ALTER TABLE `product_grouped_products`
  ADD CONSTRAINT `product_grouped_products_associated_product_id_foreign` FOREIGN KEY (`associated_product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_grouped_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_inventories`
--
ALTER TABLE `product_inventories`
  ADD CONSTRAINT `product_inventories_inventory_source_id_foreign` FOREIGN KEY (`inventory_source_id`) REFERENCES `inventory_sources` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_inventories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_inventory_indices`
--
ALTER TABLE `product_inventory_indices`
  ADD CONSTRAINT `product_inventory_indices_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_inventory_indices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_ordered_inventories`
--
ALTER TABLE `product_ordered_inventories`
  ADD CONSTRAINT `product_ordered_inventories_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ordered_inventories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_price_indices`
--
ALTER TABLE `product_price_indices`
  ADD CONSTRAINT `product_price_indices_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_price_indices_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_price_indices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_relations`
--
ALTER TABLE `product_relations`
  ADD CONSTRAINT `product_relations_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_relations_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_review_attachments`
--
ALTER TABLE `product_review_attachments`
  ADD CONSTRAINT `product_review_images_review_id_foreign` FOREIGN KEY (`review_id`) REFERENCES `product_reviews` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_super_attributes`
--
ALTER TABLE `product_super_attributes`
  ADD CONSTRAINT `product_super_attributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`),
  ADD CONSTRAINT `product_super_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_up_sells`
--
ALTER TABLE `product_up_sells`
  ADD CONSTRAINT `product_up_sells_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_up_sells_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_videos`
--
ALTER TABLE `product_videos`
  ADD CONSTRAINT `product_videos_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `refunds`
--
ALTER TABLE `refunds`
  ADD CONSTRAINT `refunds_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `refund_items`
--
ALTER TABLE `refund_items`
  ADD CONSTRAINT `refund_items_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `refund_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `refund_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `refund_items_refund_id_foreign` FOREIGN KEY (`refund_id`) REFERENCES `refunds` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `search_terms`
--
ALTER TABLE `search_terms`
  ADD CONSTRAINT `search_terms_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `sellers_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sellers_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `shipments_inventory_source_id_foreign` FOREIGN KEY (`inventory_source_id`) REFERENCES `inventory_sources` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `shipments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipment_items`
--
ALTER TABLE `shipment_items`
  ADD CONSTRAINT `shipment_items_shipment_id_foreign` FOREIGN KEY (`shipment_id`) REFERENCES `shipments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscribers_list`
--
ALTER TABLE `subscribers_list`
  ADD CONSTRAINT `subscribers_list_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscribers_list_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tax_categories_tax_rates`
--
ALTER TABLE `tax_categories_tax_rates`
  ADD CONSTRAINT `tax_categories_tax_rates_tax_category_id_foreign` FOREIGN KEY (`tax_category_id`) REFERENCES `tax_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tax_categories_tax_rates_tax_rate_id_foreign` FOREIGN KEY (`tax_rate_id`) REFERENCES `tax_rates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `theme_customizations`
--
ALTER TABLE `theme_customizations`
  ADD CONSTRAINT `theme_customizations_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `theme_customization_translations`
--
ALTER TABLE `theme_customization_translations`
  ADD CONSTRAINT `theme_customization_id_foreign` FOREIGN KEY (`theme_customization_id`) REFERENCES `theme_customizations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_notifications`
--
ALTER TABLE `vendor_notifications`
  ADD CONSTRAINT `vendor_notifications_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_orders`
--
ALTER TABLE `vendor_orders`
  ADD CONSTRAINT `vendor_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendor_orders_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_order_items`
--
ALTER TABLE `vendor_order_items`
  ADD CONSTRAINT `vendor_order_items_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendor_order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `vendor_order_items_vendor_order_id_foreign` FOREIGN KEY (`vendor_order_id`) REFERENCES `vendor_orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_payouts`
--
ALTER TABLE `vendor_payouts`
  ADD CONSTRAINT `vendor_payouts_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_reviews`
--
ALTER TABLE `vendor_reviews`
  ADD CONSTRAINT `vendor_reviews_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendor_reviews_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_wallet_transactions`
--
ALTER TABLE `vendor_wallet_transactions`
  ADD CONSTRAINT `vendor_wallet_transactions_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `visits_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlist_items`
--
ALTER TABLE `wishlist_items`
  ADD CONSTRAINT `wishlist_items_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_items_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
