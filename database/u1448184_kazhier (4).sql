-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Mar 2023 pada 06.34
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1448184_kazhier`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `assets`
--

CREATE TABLE `assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `type` varchar(25) NOT NULL,
  `purchase_date` date NOT NULL,
  `supported_date` date NOT NULL,
  `amount` double(16,2) NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `balance`
--

CREATE TABLE `balance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `previous_month` float(16,2) NOT NULL DEFAULT 0.00,
  `amount` float(16,2) NOT NULL,
  `account_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `balance`
--

INSERT INTO `balance` (`id`, `date`, `previous_month`, `amount`, `account_id`, `created_by`) VALUES
(1, '2021-08-01', 0.00, -308000.00, 3, 21),
(2, '2021-11-01', 0.00, 13000.00, 4, 26),
(3, '2021-04-01', 0.00, 50000.00, 5, 27),
(4, '2021-11-01', 0.00, 0.00, 5, 27),
(5, '2021-12-01', 0.00, 1885000.00, 5, 27),
(6, '2021-12-01', 0.00, 0.00, 15, 27),
(7, '2021-12-01', 0.00, 13000.00, 8, 27),
(8, '2022-01-01', 0.00, 325000.00, 5, 27),
(9, '2022-01-01', 0.00, 65000.00, 15, 27),
(10, '2022-03-01', 0.00, 960000.00, 5, 27),
(11, '2022-04-01', 0.00, 5500.00, 5, 27),
(12, '2022-05-01', 0.00, 2000.00, 5, 27),
(13, '2022-08-01', 0.00, 995000.00, 5, 27),
(14, '2022-08-01', 0.00, 5000.00, 15, 27),
(15, '2021-12-01', 0.00, 500000.00, 6, 33),
(16, '2022-02-01', 0.00, 827000.00, 10, 38),
(17, '2022-03-01', 0.00, -573620.00, 10, 38),
(18, '2022-04-01', 0.00, 4851534.00, 10, 38),
(19, '2022-07-01', 0.00, 2047000.00, 10, 38),
(20, '2022-09-01', 0.00, 12000000.00, 14, 38),
(21, '2022-10-01', 0.00, 5160540.00, 10, 38),
(22, '2022-10-01', 0.00, 7500000.00, 14, 38),
(23, '2022-05-01', 0.00, -7000000.00, 14, 38),
(24, '2022-06-01', 0.00, -5000000.00, 10, 38),
(25, '2022-06-01', 0.00, -2000000.00, 14, 38),
(26, '2022-07-01', 0.00, -7000000.00, 14, 38),
(27, '2022-08-01', 0.00, -7000000.00, 14, 38),
(28, '2022-11-01', 0.00, -9250000.00, 14, 38),
(29, '2022-11-01', 0.00, -168299.00, 10, 38),
(30, '2022-04-01', 0.00, -5000000.00, 14, 38),
(31, '2022-03-01', 0.00, 1080000.00, 11, 41),
(32, '2022-03-01', 0.00, 240000.00, 13, 51),
(33, '2022-03-01', 0.00, 960000.00, 18, 51),
(34, '2022-04-01', 0.00, 100000.00, 13, 51),
(35, '2022-06-01', 0.00, 1682542.00, 18, 51),
(36, '2022-11-01', 0.00, 492000.00, 13, 51),
(37, '2022-07-01', 0.00, -1160000.00, 18, 51),
(38, '2022-08-01', 0.00, -1539752.00, 18, 51),
(39, '2022-11-01', 0.00, 2036985.00, 18, 51),
(40, '2022-07-01', 0.00, -340000.00, 13, 51),
(41, '2022-05-01', 0.00, 50000.00, 19, 60),
(42, '2022-09-01', 0.00, 502000.00, 24, 77),
(43, '2022-11-01', 0.00, -2988249.00, 25, 83),
(44, '2022-10-01', 0.00, -1200000.00, 26, 84),
(45, '2022-11-01', 0.00, -2260000.00, 26, 84),
(46, '2022-10-01', 0.00, -112040.00, 18, 51),
(47, '2022-12-01', 0.00, -206000.00, 13, 51),
(48, '2022-12-01', 0.00, -1369021.00, 25, 83),
(49, '2023-01-01', 0.00, 109831.00, 27, 85),
(50, '2023-01-01', 0.00, -586700.00, 25, 83),
(51, '2023-01-01', 0.00, 4000.00, 13, 51),
(52, '2023-01-01', 0.00, -19000.00, 28, 83),
(53, '2023-01-01', 0.00, -112500.00, 29, 83),
(54, '2023-02-01', 0.00, 0.00, 28, 83),
(55, '2023-01-01', 0.00, 38000.00, 30, 83),
(56, '2023-02-01', 0.00, -19000.00, 30, 83),
(57, '2023-02-01', 0.00, 11400.00, 31, 83),
(58, '2023-01-01', 0.00, -19000.00, 31, 83),
(59, '2023-02-01', 0.00, -1446400.00, 25, 83),
(60, '2023-02-01', 0.00, 112500.00, 29, 83),
(61, '2023-02-01', 0.00, -22074.00, 27, 85),
(62, '2022-12-01', 0.00, 0.00, 31, 83),
(63, '2023-01-01', 0.00, -389000.00, 26, 84),
(64, '2022-12-01', 0.00, -1785000.00, 26, 84),
(65, '2023-02-01', 0.00, -250000.00, 26, 84),
(66, '2023-03-01', 0.00, -2030000.00, 34, 86),
(67, '2023-03-01', 0.00, 3430000.00, 32, 86),
(68, '2023-03-01', 0.00, 3495000.00, 33, 86);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `holder_name` varchar(191) NOT NULL,
  `bank_name` varchar(191) NOT NULL,
  `account_number` varchar(191) NOT NULL,
  `opening_balance` double(16,2) NOT NULL DEFAULT 0.00,
  `current_balance` double(16,2) NOT NULL DEFAULT 0.00,
  `contact_number` varchar(191) NOT NULL,
  `bank_address` text NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `holder_name`, `bank_name`, `account_number`, `opening_balance`, `current_balance`, `contact_number`, `bank_address`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Fauziza Yonas', 'BSI', '-', 8000000.00, 4991000.00, '-', '-', 19, '2021-07-21 23:51:39', '2022-01-08 21:40:49', '2022-01-08 21:40:49'),
(2, 'kejar tayang', 'Kas', '-', 0.00, 51196800.00, '-', '-', 20, '2021-07-24 08:41:29', '2023-02-02 07:15:32', NULL),
(3, 'Kas Utama', 'Kas Utama', '-', 10000000.00, 9692000.00, '-', '-', 21, '2021-08-21 22:42:46', '2022-11-18 18:10:41', NULL),
(4, 'Gina Novilla', 'BCA', '0885181193', 23905325.00, 23918325.00, '08563277765', 'Cabang Darmo', 26, '2021-11-07 21:43:18', '2022-11-18 18:10:41', NULL),
(5, 'Saya', 'Dompet', '-', 50000.00, 4272500.00, '-', '9999', 27, '2021-11-12 00:07:33', '2022-11-18 18:10:41', NULL),
(6, 'mas mehdy', 'mandiri', '000901801', 20000000.00, 20500000.00, '08128983981639', 'surabaya', 33, '2021-12-04 20:39:50', '2022-11-18 18:10:41', NULL),
(7, 'Dlo', 'BSI', '0000', 50000.00, 100000.00, '000', 'Veteran', 37, '2022-02-09 15:06:31', '2022-03-17 12:04:15', '2022-03-17 12:04:15'),
(8, 'Saya', 'Dimana', '000', 50000.00, 63000.00, '000', 'Indonesia', 27, '2022-02-15 07:05:45', '2022-11-18 18:10:41', NULL),
(10, 'TIN - Operasional', 'Kas', '-', 0.00, 7144155.00, '-', '-', 38, '2022-03-06 13:55:08', '2022-12-12 08:38:22', NULL),
(11, 'test pemilik', 'dasdas', '34234234', 100000.00, 1180000.00, '12321231231', 'test alamat', 41, '2022-03-11 05:44:36', '2022-11-18 18:10:41', NULL),
(12, 'Kejar Tayang', 'kas', '-', 0.00, 70000.00, '-', '-', 50, '2022-04-10 10:53:24', '2022-10-27 10:07:15', '2022-10-27 10:07:15'),
(13, 'Kejar Tayang', 'Kas', '-', 0.00, 290000.00, '-', '-', 51, '2022-04-10 11:14:43', '2023-02-02 09:20:55', NULL),
(14, 'TIN - Utama', 'Mandiri', '-', 40000000.00, 22250000.00, '-', '-', 38, '2022-04-14 06:55:50', '2022-12-12 08:38:22', NULL),
(15, 'Kina', 'BSI', '000', 100000.00, 170000.00, '000', 'Indonesia', 27, '2022-04-15 07:01:50', '2022-11-18 18:10:41', NULL),
(16, 'Tarmizi', 'Mandiri', '9993838', 10000000.00, 10000000.00, '87317', 'Wiyung', 56, '2022-04-26 08:36:22', '2022-12-15 11:42:41', NULL),
(17, 'Artha', 'BCA', '12345', 5000000.00, 5000000.00, '081232774007', 'Indrapura', 32, '2022-04-26 08:36:27', '2022-11-18 18:10:41', NULL),
(18, 'Kejar Tayang', 'Mandiri', '000', 100000.00, 1967735.00, '000', 'Indonesia', 51, '2022-05-11 22:07:56', '2023-02-02 09:15:33', NULL),
(19, 'Abu Amar Fikri', 'BCA', '2710729177', 0.00, 50000.00, '1500888', 'BCA - KCP Sepanjang', 60, '2022-05-27 11:47:03', '2022-11-18 18:10:41', NULL),
(20, 'Eka Dianchusnul Budifityanti', 'BCA', '7880944350', 0.00, 0.00, '085656434788', 'BCA KCU Kertajaya', 54, '2022-06-09 08:29:03', '2022-11-18 18:10:41', NULL),
(21, 'AJENG TRI ANINDITA', 'BANK BCA', '5123001582', 1000000.00, -1688462.00, '081332239642', 'Cabang Pondok Candra', 72, '2022-07-20 04:45:35', '2022-10-17 01:50:02', '2022-10-17 01:50:02'),
(22, 'Kas Kecil', 'Kas Kecil', '0', 724220.00, 4798935.00, '0', 'Pondok Candra', 72, '2022-07-20 04:46:40', '2022-10-17 01:50:02', '2022-10-17 01:50:02'),
(23, 'CASH BU AJENG', 'CASH BU AJENG', '0', 0.00, -9400000.00, '0', 'PONDOK CANDRA', 72, '2022-07-25 06:21:34', '2022-10-17 01:50:02', '2022-10-17 01:50:02'),
(24, 'Dyah ayu widyaning lestari', 'Bca', '0640610395', 0.00, 502000.00, '081249939584', 'Pucang', 77, '2022-09-19 13:02:15', '2022-11-18 18:10:42', NULL),
(25, 'Fandi', 'Kas', '-', 10000000.00, 3609630.00, '-', '-', 83, '2022-10-27 10:21:35', '2023-02-13 09:58:18', NULL),
(26, 'Beta Pangan', 'Kas', '-', 20000000.00, 14116000.00, '-', '-', 84, '2022-11-18 18:21:54', '2023-02-07 18:07:13', NULL),
(27, 'Kas', 'Frontage', '-', 0.00, 87757.00, '-', '-', 85, '2023-01-02 13:17:42', '2023-02-07 11:03:13', NULL),
(29, 'Dewi', 'Kas', '-', 0.00, 0.00, '-', '-', 83, '2023-01-30 09:53:53', '2023-02-13 09:58:18', NULL),
(31, 'Ari', 'Kas', '-', 0.00, -7600.00, '-', '-', 83, '2023-02-06 05:34:13', '2023-02-06 09:27:50', NULL),
(32, 'Putri Lailatul Maghfiroh', 'Mandiri', '14526871920', 100000.00, 3530000.00, '085330147129', 'Telang', 86, '2023-02-11 11:53:55', '2023-03-05 14:20:56', NULL),
(33, 'Putri Lailatul Maghfiroh', 'BCA', '1425367890', 10000000.00, 13495000.00, '085330147129', 'Jl.Trunojoyo', 86, '2023-03-01 14:09:38', '2023-03-05 14:20:26', NULL),
(34, 'Putri Lailatul Maghfiroh', 'BTN', '1425367890', 5000000.00, 2970000.00, '085330147129', 'Telang', 86, '2023-03-01 14:10:49', '2023-03-05 14:21:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` varchar(191) NOT NULL DEFAULT '0',
  `vender_id` int(11) NOT NULL,
  `bill_date` date NOT NULL,
  `due_date` date NOT NULL,
  `order_number` text DEFAULT '',
  `signed_by` varchar(250) DEFAULT NULL,
  `signee_position` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `shipping_display` int(11) NOT NULL DEFAULT 1,
  `send_date` date DEFAULT NULL,
  `discount_apply` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `served_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bills`
--

INSERT INTO `bills` (`id`, `bill_id`, `vender_id`, `bill_date`, `due_date`, `order_number`, `signed_by`, `signee_position`, `status`, `shipping_display`, `send_date`, `discount_apply`, `category_id`, `created_by`, `served_by`, `created_at`, `updated_at`) VALUES
(1, '1', 1, '2021-11-08', '2021-11-08', '0', NULL, NULL, 0, 1, NULL, 0, 38, 26, 0, '2021-11-07 22:05:16', '2021-11-07 22:05:16'),
(2, '1', 2, '2022-05-09', '2022-05-09', '', NULL, NULL, 1, 1, '2022-08-03', 0, 49, 27, 27, '2022-05-09 05:06:29', '2022-08-03 07:39:13'),
(3, '1', 7, '2022-08-02', '2023-04-02', '', NULL, NULL, 4, 1, '2022-08-02', 0, 547, 72, 72, '2022-08-02 13:49:34', '2022-09-24 03:04:28'),
(4, '2', 8, '2022-08-02', '2022-08-02', '', NULL, NULL, 4, 1, '2022-08-02', 0, 551, 72, 72, '2022-08-02 14:19:34', '2022-08-02 14:25:00'),
(5, '3', 7, '2022-07-31', '2022-07-31', '', NULL, NULL, 4, 1, '2022-08-02', 0, 547, 72, 72, '2022-08-02 14:38:15', '2022-08-02 14:38:36'),
(6, '2', 2, '2022-08-03', '2022-08-05', '', NULL, NULL, 4, 1, '2022-08-03', 0, 49, 27, 27, '2022-08-03 07:38:51', '2022-08-03 07:39:42'),
(7, '4', 10, '2022-07-31', '2022-08-04', '', NULL, NULL, 4, 1, '2022-08-04', 0, 552, 72, 72, '2022-08-04 04:46:02', '2022-08-04 04:46:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bill_payments`
--

CREATE TABLE `bill_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` double(16,2) NOT NULL DEFAULT 0.00,
  `account_id` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `reference` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `served_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bill_payments`
--

INSERT INTO `bill_payments` (`id`, `bill_id`, `date`, `amount`, `account_id`, `payment_method`, `reference`, `description`, `created_by`, `served_by`, `created_at`, `updated_at`) VALUES
(3, 4, '2022-07-31', 44963200.00, 21, 143, '', '', 72, 0, '2022-08-02 14:25:00', '2022-08-02 14:25:00'),
(4, 5, '2022-07-31', 5700000.00, 21, 143, '', '', 72, 0, '2022-08-02 14:38:36', '2022-08-02 14:38:36'),
(6, 6, '2022-08-03', 1500000.00, 5, 17, '', '', 27, 0, '2022-08-03 07:39:42', '2022-08-03 07:39:42'),
(7, 7, '2022-08-03', 2800000.00, 21, 143, '', '', 72, 0, '2022-08-04 04:46:51', '2022-08-04 04:46:51'),
(8, 3, '2022-09-22', 2473900.00, 21, 143, '', '', 72, 0, '2022-09-22 12:20:21', '2022-09-22 12:20:21'),
(10, 3, '2022-07-30', 2473900.00, 21, 143, '', '', 72, 0, '2022-09-24 03:04:28', '2022-09-24 03:04:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bill_products`
--

CREATE TABLE `bill_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `tax` double(16,2) NOT NULL DEFAULT 0.00,
  `discount` double(16,2) NOT NULL DEFAULT 0.00,
  `price` double(16,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bill_products`
--

INSERT INTO `bill_products` (`id`, `bill_id`, `product_id`, `quantity`, `tax`, `discount`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 0.00, 0.00, 25000.00, '2021-11-07 22:05:16', '2021-11-07 22:05:16'),
(2, 2, 8, 4, 10.00, 0.00, 3000.00, '2022-05-09 05:06:29', '2022-05-09 05:06:29'),
(3, 3, 58, 1, 0.00, 0.00, 9659033.00, '2022-08-02 13:49:34', '2022-08-02 13:49:34'),
(4, 3, 59, 1, 0.00, 0.00, 7358033.00, '2022-08-02 13:49:34', '2022-08-02 13:49:34'),
(5, 3, 60, 1, 0.00, 0.00, 5248033.00, '2022-08-02 13:49:34', '2022-08-02 13:49:34'),
(6, 4, 61, 1, 0.00, 0.00, 44963200.00, '2022-08-02 14:19:34', '2022-08-02 14:19:34'),
(7, 5, 62, 1, 0.00, 0.00, 2500000.00, '2022-08-02 14:38:15', '2022-08-02 14:38:15'),
(8, 5, 63, 1, 0.00, 0.00, 3200000.00, '2022-08-02 14:38:15', '2022-08-02 14:38:15'),
(9, 6, 12, 100, 0.00, 500000.00, 20000.00, '2022-08-03 07:38:51', '2022-08-03 07:38:51'),
(10, 7, 38, 1, 0.00, 0.00, 2800000.00, '2022-08-04 04:46:02', '2022-08-04 04:46:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `code` varchar(191) NOT NULL,
  `discount` double(16,2) NOT NULL DEFAULT 0.00,
  `limit` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `code`, `discount`, `limit`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Referal Mas arda', 'kazhierarda', 20.00, 10, NULL, 1, '2021-11-23 23:59:00', '2021-11-24 00:00:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `credit_notes`
--

CREATE TABLE `credit_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` int(11) NOT NULL DEFAULT 0,
  `customer` int(11) NOT NULL DEFAULT 0,
  `amount` double(16,2) NOT NULL DEFAULT 0.00,
  `date` date NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `credit_notes`
--

INSERT INTO `credit_notes` (`id`, `invoice`, `customer`, `amount`, `date`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 38000.00, '2021-11-08', '', '2021-11-07 21:58:24', '2021-11-07 21:58:24'),
(3, 4, 5, 3000.00, '2021-11-10', '', '2021-11-10 07:40:04', '2021-11-10 07:40:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `contact` varchar(191) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT '',
  `created_by` int(11) NOT NULL DEFAULT 0,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `billing_name` varchar(191) DEFAULT NULL,
  `billing_country` varchar(191) DEFAULT NULL,
  `billing_state` varchar(191) DEFAULT NULL,
  `billing_city` varchar(191) DEFAULT NULL,
  `billing_phone` varchar(191) DEFAULT NULL,
  `billing_zip` varchar(191) DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `shipping_name` varchar(191) DEFAULT NULL,
  `shipping_country` varchar(191) DEFAULT NULL,
  `shipping_state` varchar(191) DEFAULT NULL,
  `shipping_city` varchar(191) DEFAULT NULL,
  `shipping_phone` varchar(191) DEFAULT NULL,
  `shipping_zip` varchar(191) DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `lang` varchar(8) NOT NULL DEFAULT 'id',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `customer_id`, `name`, `email`, `password`, `contact`, `category_id`, `avatar`, `created_by`, `is_active`, `email_verified_at`, `billing_name`, `billing_country`, `billing_state`, `billing_city`, `billing_phone`, `billing_zip`, `billing_address`, `shipping_name`, `shipping_country`, `shipping_state`, `shipping_city`, `shipping_phone`, `shipping_zip`, `shipping_address`, `lang`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 1, 'Ds Bistro', 'ads@gmail.com', '$2y$10$6vT7BSiJyZVOgIa91zO1ZenlHR/4SqlCGhoP0Ka.6.q93lZjEY66u', '08564566609', NULL, '', 26, 1, NULL, 'Ds Bistro', 'Indonesia', 'Jawa Timur', 'Surabaya', '085645666609', '60117', 'Surabaya', 'Ds Bistro', 'Indonesia', 'Jawa Timur', 'Surabaya', '085645666609', '60117', 'Surabaya', 'en', NULL, '2021-11-07 21:49:53', '2021-11-07 21:49:53'),
(4, 2, 'Jw Marriot', 'hidroponikvege@gmail.com', '$2y$10$fAMeFKLxQGcvGy4UCOqMIu7Z6IWsbI88ey4trM65Moy07Gpj1qNdm', '08564566609', NULL, '', 26, 1, NULL, 'Jw Marriot', 'Indonesia', 'Jawa Timur', 'Surabaya', '0856456609', '60117', 'Surabaya', 'Jw Marriot', 'Indonesia', 'Jawa Timur', 'Surabaya', '08564566609', '60117', 'Surabaya', 'en', NULL, '2021-11-07 21:53:02', '2021-11-07 21:54:00'),
(5, 1, 'mas mehdy', 'admin3@kejartayang.com', '$2y$10$e4L3SN2VGJsjbJeuHM3y.e2I4moFnUu8KXOEk/7CuQGQMun6.TuO2', '099199191', NULL, '', 20, 1, NULL, 'lknadlakn', 'lksnafl', 'laknal', 'kjafa', '098098', '9809', 'landfalk', 'lknadlakn', 'lksnafl', 'laknal', 'kjafa', '098098', '9809', 'afakfna', 'en', NULL, '2021-11-10 07:04:36', '2021-11-10 07:04:36'),
(6, 1, 'Rea', '', NULL, '8877', NULL, '', 27, 1, NULL, 'Rea', NULL, '', '', '8877', '', 'Depan Rumah', 'Rea', 'Indonesia', '', 'Kota ini', '8877', '', 'Depan Rumah', 'id', NULL, '2021-11-12 08:26:39', '2021-11-12 08:26:39'),
(7, 1, 'fikir', 'tarmizibantan@gmail.com', NULL, '9879170', NULL, '', 33, 1, NULL, 'jkabs.ajb', NULL, 'Jawa Timur', 'Surabaya', '+6281233476611', '60227', 'Graha Sunan Ampel 2 Blok D No. 44', 'jkabs.ajb', 'Indonesia', 'Jawa Timur', 'Surabaya', '+6281233476611', '60227', 'Graha Sunan Ampel 2 Blok D No. 44', 'id', NULL, '2021-12-04 20:57:33', '2021-12-04 20:57:33'),
(8, 1, 'A', '', NULL, 'A', NULL, '', 37, 1, NULL, 'A', NULL, '', '', '0', '', 'A', 'A', 'Indonesia', '', '', '0', '', 'A', 'id', NULL, '2021-12-29 13:41:53', '2021-12-29 13:41:53'),
(9, 2, '\"Tes Coba Coba\"', NULL, NULL, '0', NULL, '', 27, 1, NULL, '\"Tes Coba Coba\"', NULL, NULL, NULL, '0', NULL, '-', '\"Tes Coba Coba\"', NULL, NULL, NULL, '0', NULL, '-', 'id', NULL, '2022-01-04 10:29:59', '2022-01-04 10:29:59'),
(10, 3, 'Tes Coba Coba', NULL, NULL, '0', NULL, '', 27, 1, NULL, 'Tes Coba Coba', NULL, NULL, NULL, '0', NULL, '-', 'Tes Coba Coba', NULL, NULL, NULL, '0', NULL, '-', 'id', NULL, '2022-01-04 10:31:29', '2022-01-04 10:31:29'),
(12, 4, 'Era', '', NULL, '09876', NULL, '', 27, 1, NULL, 'Era', NULL, '', '', '09876', '', 'Era', 'Era', 'Indonesia', '', '', '09876', '', 'Era', 'id', NULL, '2022-01-20 17:29:57', '2022-01-20 17:29:57'),
(13, 1, 'tes123', 'tes@tes.com', NULL, '09239291992', NULL, '', 41, 1, NULL, 'rsds asa', NULL, 'test', 'kota test', '0989232', '1234', 'jalan test', 'rsds asa', 'Indonesia', 'test', 'kota test', '0989232', '1234', 'jalan test', 'id', NULL, '2022-03-11 05:43:24', '2022-03-11 05:43:24'),
(17, 2, 'shjssjsj', 'ggsah@djjs.jejs', NULL, '7346464', NULL, '', 41, 1, NULL, 'shjssjsj', NULL, NULL, NULL, '7346464', NULL, 'nzjsjsjssj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'id', NULL, '2022-03-17 12:33:37', '2022-03-17 12:33:37'),
(18, 3, 'Walk In Customer', 'noemail@example.com', NULL, '000000', NULL, '', 41, 1, NULL, 'Walk In Customer', NULL, NULL, NULL, '000000', NULL, 'no address', 'Walk In Customer', NULL, NULL, NULL, '000000', NULL, 'no address', 'id', NULL, '2022-03-18 02:52:37', '2022-03-18 02:52:37'),
(20, 5, 'Bu Bos', '', NULL, '080000000000', NULL, '', 27, 1, NULL, 'Bu Bos', NULL, NULL, NULL, '080000000000', NULL, 'Indonesia', 'Bu Bos', NULL, NULL, NULL, '080000000000', NULL, 'Indonesia', 'id', NULL, '2022-04-15 07:01:50', '2022-04-15 07:01:50'),
(21, 6, 'Rin', '', NULL, '0000', 0, '', 27, 1, NULL, 'RinKari', NULL, 'Jawa Timur', 'Gresik', '0000', '', 'Jl. jalan aja yuk', 'RinKari', 'Indonesia', 'Jawa Timur', 'Gresik', '0000', '', 'Jl. jalan aja yuk', 'id', NULL, '2022-05-11 14:43:46', '2022-05-11 14:43:46'),
(22, 7, 'Levi', '', NULL, '0000', 2, '', 27, 1, NULL, 'Levi', NULL, 'Jawa Timur', 'Gresik', '0000', '', 'Jl. kemana kuy', 'Levi', 'Indonesia', 'Jawa Timur', 'Gresik', '0000', '', 'Jl. kemana kuy', 'id', NULL, '2022-05-11 14:45:06', '2022-05-11 14:45:06'),
(23, 1, 'Safir Academy', 'lbbsafiracademy@gmail.com', NULL, '081331813704', 0, '', 51, 1, NULL, 'Safir Academy', NULL, 'Jawa Timur', 'Sidoarjo', '081331813704', 'xxxx', 'xxxx', 'Safir Academy', 'Indonesia', 'Jawa Timur', 'Sidoarjo', '081331813704', 'xxxx', 'xxxx', 'id', NULL, '2022-05-11 14:51:51', '2022-05-11 14:51:51'),
(24, 8, 'Safir Academy', '', NULL, '080000000000', NULL, '', 27, 1, NULL, 'Safir Academy', NULL, NULL, NULL, '080000000000', NULL, 'Indonesia', 'Safir Academy', NULL, NULL, NULL, '080000000000', NULL, 'Indonesia', 'id', NULL, '2022-05-12 09:32:21', '2022-05-12 09:32:21'),
(25, 1, 'Walk In Customer', 'noemail@example.com', NULL, '000000', NULL, '', 50, 1, NULL, 'Walk In Customer', NULL, NULL, NULL, '000000', NULL, 'no address', 'Walk In Customer', NULL, NULL, NULL, '000000', NULL, 'no address', 'id', NULL, '2022-05-17 09:44:28', '2022-05-17 09:44:28'),
(26, 1, 'Abu Amar Fikri', '', NULL, '085733682363', 0, '', 60, 1, NULL, 'Fikri', NULL, 'jatim', 'sidoarjo', '085733682363', '', 'wonocolo', 'Fikri', 'Indonesia', 'jatim', 'sidoarjo', '085733682363', '', 'wonocolo', 'id', NULL, '2022-05-28 08:20:08', '2022-05-28 08:20:08'),
(27, 1, 'intan', '', NULL, '083861849485', 0, '', 24, 1, NULL, 'Intan', NULL, 'Jawa Timur', 'Surabaya', '083861849485', '60232', 'Ketintang selatan no 51', 'Mega intan', 'Indonesia', 'Jawa timur', 'Surabaya', '083861849485', '60232', 'Ketintang', 'id', NULL, '2022-06-16 05:35:17', '2022-06-16 05:35:17'),
(28, 1, 'PT. GARUDA INOVASI LENTERA SEMESTA', '', NULL, '085790292102', 3, '', 72, 1, NULL, 'PT. GARUDA INOVASI LENTERA SEMESTA', NULL, 'Jawa Timur', 'Kota Surabaya', '085790292102', '', 'surabaya', 'PT. GARUDA INOVASI LENTERA SEMESTA', 'Indonesia', 'Jawa Timur', 'Kota Surabaya', '085790292102', '', 'surabaya', 'id', NULL, '2022-07-20 04:30:25', '2022-07-20 10:23:53'),
(29, 2, 'PT. TEROBOSAN ANAK BANGSA', '', NULL, '085790292102', 3, '', 72, 1, NULL, 'PT. TEROBOSAN ANAK BANGSA', NULL, 'Jawa Timur', 'Surabaya', '085790292102', '', 'Surabaya', 'PT. TEROBOSAN ANAK BANGSA', 'Indonesia', 'Jawa Timur', 'Surabaya', '085790292102', '', 'Surabaya', 'id', NULL, '2022-07-20 04:46:43', '2022-07-20 10:24:18'),
(30, 3, 'PT. SEKAWAN BANGKIT TEKNOLOGI BERSAMA', '', NULL, '085790292102', 3, '', 72, 1, NULL, 'PT. SEKAWAN BANGKIT TEKNOLOGI BERSAMA', NULL, 'Jawa Timur', 'Surabaya', '085790292102', '', 'Surabaya', 'PT. SEKAWAN BANGKIT TEKNOLOGI BERSAMA', 'Indonesia', 'Jawa Timur', 'Surabaya', '085790292102', '', 'Surabaya', 'id', NULL, '2022-07-20 04:57:56', '2022-07-20 10:24:33'),
(31, 4, 'PT. BERLIAN PERKASA CIPTA TEKNOLOGI', '', NULL, '085790292102', 3, '', 72, 1, NULL, 'PT. BERLIAN PERKASA CIPTA TEKNOLOGI', NULL, 'Jawa Timur', 'Surabaya', '085790292102', '', 'Surabaya', 'PT. BERLIAN PERKASA CIPTA TEKNOLOGI', 'Indonesia', 'Jawa Timur', 'Surabaya', '085790292102', '', 'Surabaya', 'id', NULL, '2022-07-22 03:38:46', '2022-07-22 03:38:46'),
(32, 5, 'PT. PRIMABOGA NUSANTARA INTI', '', NULL, '08113109379', 8, '', 72, 1, NULL, 'PT. PRIMABOGA NUSANTARA INTI', NULL, 'Jawa Timur', 'Sidoarjo', '08113109379', '', 'Kompleks Industri & Pergudangan Bisspark, Jl. Tambak Sawah No. 52-53, Kabupaten Sidoarjo', 'PT. PRIMABOGA NUSANTARA INTI', 'Indonesia', 'Jawa Timur', 'Sidoarjo', '08113109379', '', 'Kompleks Industri & Pergudangan Bisspark, Jl. Tambak Sawah No. 52-53, Kabupaten Sidoarjo', 'id', NULL, '2022-07-25 08:44:01', '2022-07-25 08:44:01'),
(33, 6, 'PT. BERKAT MANDIRI REKATAMA', '', NULL, '081230097299', 8, '', 72, 1, NULL, 'PT. BERKAT MANDIRI REKATAMA', NULL, 'Jawa Timur', 'Surabaya', '081230097299', '', 'Medayu Utara 26/26-A', 'PT. BERKAT MANDIRI REKATAMA', 'Indonesia', 'Jawa Timur', 'Surabaya', '081230097299', '', 'Medayu Utara 26/26-A', 'id', NULL, '2022-07-25 08:45:42', '2022-07-25 08:45:42'),
(34, 7, 'PT. JALAN BERSAMA KAMU', '', NULL, '081333058787', 8, '', 72, 1, NULL, 'PT. JALAN BERSAMA KAMU', NULL, 'Jawa Timur', 'Surabaya', '081333058787', '', 'Kebonsari Regency Blok A No. 9A', 'PT. JALAN BERSAMA KAMU', 'Indonesia', 'Jawa Timur', 'Surabaya', '081333058787', '', 'Kebonsari Regency Blok A No. 9A', 'id', NULL, '2022-07-25 08:47:44', '2022-07-25 08:47:44'),
(35, 8, 'CV. NURITA CAHAYA KENCANA', '', NULL, '081216037635', 3, '', 72, 1, NULL, 'CV. NURITA CAHAYA KENCANA', NULL, 'Jawa Timur', 'Surabaya', '081216037635', '', 'Greenlake Natural Living C1-59', 'CV. NURITA CAHAYA KENCANA', 'Indonesia', 'Jawa Timur', 'Surabaya', '081216037635', '', 'Greenlake Natural Living C1-59', 'id', NULL, '2022-07-25 08:49:21', '2022-07-25 08:57:07'),
(36, 2, 'Tarmizi Erfandi', 'tarmizibantan@gmail.com', NULL, '081233476611', 0, '', 51, 1, NULL, 'Tarmizi Erfandi', NULL, 'JAWA TIMUR', 'KOTA SURABAYA', '+6281233476611', '60227', 'Graha Sunan Ampel 2 Blok D No 44', 'Tarmizi Erfandi', 'Indonesia', 'JAWA TIMUR', 'KOTA SURABAYA', '+6281233476611', '60227', 'Graha Sunan Ampel 2 Blok D No 44', 'id', NULL, '2022-07-28 10:26:43', '2022-07-28 10:26:43'),
(37, 9, 'Dr. WITDADA KURNIADI', '', NULL, '081703900323', 5, '', 72, 1, NULL, 'Dr. WITDADA KURNIADI', NULL, 'JAWA TIMUR', 'SURABAYA', '081703900323', '', 'SURABAYA', 'Dr. WITDADA KURNIADI', 'Indonesia', 'JAWA TIMUR', 'SURABAYA', '081703900323', '', 'SURABAYA', 'id', NULL, '2022-07-29 05:38:10', '2022-07-29 05:38:10'),
(38, 10, 'MATEYUS EKO AGUS KRISTIYANTO', '', NULL, 'MATEYUS EKO AGUS KRISTIYANTO', 5, '', 72, 1, NULL, 'MATEYUS EKO AGUS KRISTIYANTO', NULL, 'Jawa TImur', 'surabaya', '081703900323', '', 'Surabaya', 'MATEYUS EKO AGUS KRISTIYANTO', 'Indonesia', 'Jawa TImur', 'surabaya', '081703900323', '', 'Surabaya', 'id', NULL, '2022-07-29 06:33:13', '2022-07-29 06:33:13'),
(39, 11, 'SUPARTI', '', NULL, '081703900323', 7, '', 72, 1, NULL, 'SUPARTI', NULL, 'JAWA TIMUR', 'SIDOARJO', '081703900323', '', 'SIDOARJO', 'SUPARTI', 'Indonesia', 'JAWA TIMUR', 'SIDOARJO', '081703900323', '', 'SIDOARJO', 'id', NULL, '2022-07-29 06:34:19', '2022-07-29 06:34:19'),
(40, 12, 'HARIS', '', NULL, '081703900323', 7, '', 72, 1, NULL, 'HARIS', NULL, 'JAWA TIMUR', 'SIDOARJO', '081703900323', '', 'SIDOARJO', 'HARIS', 'Indonesia', 'JAWA TIMUR', 'SIDOARJO', '081703900323', '', 'SIDOARJO', 'id', NULL, '2022-07-29 06:36:20', '2022-07-29 06:36:20'),
(41, 13, 'WINARNO', '', NULL, '081703900323', 5, '', 72, 1, NULL, 'WINARNO', NULL, 'JAWA TIMUR', 'SURABAYA', '081703900323', '', 'SURABAYA', 'WINARNO', 'Indonesia', 'JAWA TIMUR', 'SURABAYA', '081703900323', '', 'SURABAYA', 'id', NULL, '2022-07-29 06:37:22', '2022-07-29 06:37:22'),
(42, 14, 'INDRA WIDIYAWANTO', '', NULL, '081703900323', 7, '', 72, 1, NULL, 'INDRA WIDIYAWANTO', NULL, 'JAWA TIMUR', 'SIDOARJO', '081703900323', '', 'SIDOARJO', 'INDRA WIDIYAWANTO', 'Indonesia', 'JAWA TIMUR', 'SIDOARJO', '081703900323', '', 'SIDOARJO', 'id', NULL, '2022-07-29 06:39:25', '2022-07-29 06:39:25'),
(43, 15, 'AMALIA PERMATA NURANI, SE', '', NULL, '081703900323', 7, '', 72, 1, NULL, 'AMALIA PERMATA', NULL, 'JAWA TIMUR', 'SIDOARJO', '081703900323', '', 'SIDOARJO', 'AMALIA PERMATA', 'Indonesia', 'JAWA TIMUR', 'SIDOARJO', '081703900323', '', 'SIDOARJO', 'id', NULL, '2022-07-29 06:40:09', '2022-07-29 07:35:48'),
(44, 16, 'SAMUEL SETIAWAN KINARIJADI', '', NULL, '081703900323', 7, '', 72, 1, NULL, 'MUEL SETIAWAN KINARIJADI', NULL, 'JAWA TIMUR', 'SIDOARJO', '081703900323', '', 'SIDOARJO', 'MUEL SETIAWAN KINARIJADI', 'Indonesia', 'JAWA TIMUR', 'SIDOARJO', '081703900323', '', 'SIDOARJO', 'id', NULL, '2022-07-29 06:43:42', '2022-07-29 06:43:42'),
(45, 17, 'HENY YUNAIDAH', '', NULL, '081703900323', 7, '', 72, 1, NULL, 'HENY YUNAIDAH', NULL, 'JAWA TIMUR', 'SIDOARJO', '081703900323', '', 'SIDOARJO', 'HENY YUNAIDAH', 'Indonesia', 'JAWA TIMUR', 'SIDOARJO', '081703900323', '', 'SIDOARJO', 'id', NULL, '2022-07-29 06:45:51', '2022-07-29 06:45:51'),
(46, 18, 'STANLEY ALFARIZ HENDRICK SAWAI', '', NULL, '081703900323', 7, '', 72, 1, NULL, 'STANLEY ALFARIZ HENDRICK SAWAI', NULL, 'JAWA TIMUR', 'SIDOARJO', '081703900323', '', 'SIDOARJO', 'STANLEY ALFARIZ HENDRICK SAWAI', 'Indonesia', 'JAWA TIMUR', 'SIDOARJO', '081703900323', '', 'SIDOARJO', 'id', NULL, '2022-07-29 06:49:31', '2022-07-29 06:49:31'),
(47, 19, 'edrus (Sertipikat Hilang)', '', NULL, 'edrus (Sertipikat Hilang)', 8, '', 72, 1, NULL, 'edrus (Sertipikat Hilang)', NULL, 'jawa timur', 'sidoarjo', '081703900323', '', 'sidoarjo', 'edrus (Sertipikat Hilang)', 'Indonesia', 'jawa timur', 'sidoarjo', '081703900323', '', 'sidoarjo', 'id', NULL, '2022-08-03 06:25:56', '2022-08-03 06:25:56'),
(48, 20, 'PT XYX AYASI GLOBAL', '', NULL, '081231359121', 0, '', 72, 1, NULL, 'PT XYX AYASI GLOBAL', NULL, 'JAWA TIMUR', 'SURABAYA', '081231359121', '', 'SURABAYA', 'PT XYX AYASI GLOBAL', 'Indonesia', 'JAWA TIMUR', 'SURABAYA', '081231359121', '', 'SURABAYA', 'id', NULL, '2022-08-29 04:52:56', '2022-08-29 04:52:56'),
(49, 21, 'PT JAYA MUSTIKA PERKASA', '', NULL, '087854774308', 0, '', 72, 1, NULL, 'PT JAYA MUSTIKA PERKASA', NULL, 'JAWA TIMUR', 'SURABAYA', '087854774308', '', 'SURABAYA', 'PT JAYA MUSTIKA PERKASA', 'Indonesia', 'JAWA TIMUR', 'SURABAYA', '087854774308', '', 'SURABAYA', 'id', NULL, '2022-08-29 04:54:02', '2022-08-29 04:54:02'),
(50, 1, 'Tarmizi Erfandi', 'tarmizibantan@gmail.com', NULL, '081233476611', 0, '', 38, 1, NULL, 'tarmizi', NULL, 'JAWA TIMUR', 'KOTA SURABAYA', '+6281233476611', '60227', 'Graha Sunan Ampel 2 Blok D No 44', 'tarmizi', 'Indonesia', 'JAWA TIMUR', 'KOTA SURABAYA', '+6281233476611', '60227', 'Graha Sunan Ampel 2 Blok D No 44', 'id', NULL, '2022-08-31 06:37:32', '2022-08-31 06:37:32'),
(51, 2, 'Yayasan Al Muslim', 'mehdyriza@gmail.com', NULL, '0318681416', 0, '', 24, 1, NULL, 'Yayasan Al Muslim', NULL, 'Jawa Timur', 'Kota Sidoarjo', '0318681416', '61256', 'jl Raya Wadung Asri no 39F, Ngipa, Wadungasri', 'Yayasan Al Muslim', 'Indonesia', 'Jawa Timur', 'Kota Sidoarjo', '0318681416', '61256', 'jl Raya Wadung Asri no 39F, Ngipa, Wadungasri', 'id', NULL, '2022-09-10 14:29:51', '2022-09-10 14:29:51'),
(52, 22, 'HADI(SURABAYA1)', 'pbfsurabaya1@gmail.com', NULL, '0', 4, '', 72, 1, NULL, 'HADI (Surabaya 1)', NULL, 'Jawa timur', 'SURABAYA', '0', '', 'Surabaya', 'HADI (Surabaya 1)', 'Indonesia', 'Jawa timur', 'SURABAYA', '0', '', 'Surabaya', 'id', NULL, '2022-09-12 12:04:43', '2022-09-12 12:04:43'),
(53, 23, 'muchid (suarabaya 1 )', 'kantornotarisajeng@gmail.com', NULL, '0', 4, '', 72, 1, NULL, 'muchid (surabaya 1)', NULL, 'Jawa timur', 'SURABAYA', '0', '', 'surabaya', 'muchid (surabaya 1)', 'Indonesia', 'Jawa timur', 'SURABAYA', '0', '', 'surabaya', 'id', NULL, '2022-09-12 12:37:15', '2022-09-12 12:37:15'),
(54, 24, 'i wayan ray ( bfi waru)', 'kantornotarisajeng@gmail.com', NULL, '0', 7, '', 72, 1, NULL, 'i wayan ray (bfi waru)', NULL, 'jawa timur', 'sidoarjo', '0', '', 'Sidoarjo', 'i wayan ray (bfi waru)', 'Indonesia', 'jawa timur', 'sidoarjo', '0', '', 'Sidoarjo', 'id', NULL, '2022-09-12 13:14:51', '2022-09-12 13:14:51'),
(55, 25, 'HADI(SURABAYA1)', 'kantornotarisajeng@gmail.com', NULL, '0', 7, '', 72, 1, NULL, 'HADI (Surabaya 1)', NULL, 'Jawa timur', 'SURABAYA', '0', '', 'sidoarjo', 'HADI (Surabaya 1)', 'Indonesia', 'Jawa timur', 'SURABAYA', '0', '', 'sidoarjo', 'id', NULL, '2022-09-12 13:15:27', '2022-09-12 13:15:27'),
(56, 26, 'moh yusam (bfi sidoarjo)', 'kantornotarisajeng@gmail.com', NULL, '0', 7, '', 72, 1, NULL, 'moh yusam (bfiu sidoarjo)', NULL, 'Jawa timur', 'sidoarjo', '0', '', 'Sidoarjo', 'moh yusam (bfiu sidoarjo)', 'Indonesia', 'Jawa timur', 'sidoarjo', '0', '', 'Sidoarjo', 'id', NULL, '2022-09-12 13:16:20', '2022-09-12 13:16:20'),
(57, 27, 'haposan siregar (bfi sidoarjo)', 'kantornotarisajeng@gmail.com', NULL, '0', 7, '', 72, 1, NULL, 'haposan siregar (bfi sidoarjo )', NULL, 'Jawa timur', 'sidoarjo', '0', '', 'sidoarjo', 'haposan siregar (bfi sidoarjo )', 'Indonesia', 'Jawa timur', 'sidoarjo', '0', '', 'sidoarjo', 'id', NULL, '2022-09-12 13:17:16', '2022-09-12 13:17:16'),
(58, 28, 'santi (bfi sidoarjo)', 'kantornotarisajeng@gmail.com', NULL, '0', 7, '', 72, 1, NULL, 'santi (bfi sidaorjo)', NULL, 'Jawa timur', 'sidoarjo', '0', '', 'sidoarjo', 'santi (bfi sidaorjo)', 'Indonesia', 'Jawa timur', 'sidoarjo', '0', '', 'sidoarjo', 'id', NULL, '2022-09-12 13:17:54', '2022-09-12 13:17:54'),
(59, 29, 'ida (bfi sby 2)', 'kantornotarisajeng@gmail.com', NULL, '0', 7, '', 72, 1, NULL, 'ida (bfi sby 2 )', NULL, 'jawa timur', 'SURABAYA', '0', '', 'surabaya', 'ida (bfi sby 2 )', 'Indonesia', 'jawa timur', 'SURABAYA', '0', '', 'surabaya', 'id', NULL, '2022-09-12 13:19:10', '2022-09-12 13:19:10'),
(60, 30, 'sodikin', 'kantornotarisajeng@gmail.com', NULL, '0', 7, '', 72, 1, NULL, 'sodikin (bfi sidoarjo)', NULL, 'jawa timur', 'sidoarjo', '0', '', 'sidoarjo', 'sodikin (bfi sidoarjo)', 'Indonesia', 'jawa timur', 'sidoarjo', '0', '', 'sidoarjo', 'id', NULL, '2022-09-12 13:19:52', '2022-09-12 13:19:52'),
(61, 31, 'mario nova', 'kantornotarisajeng@gmail.com', NULL, '0', 7, '', 72, 1, NULL, 'mario (bfi sidoarjo)', NULL, 'Jawa timur', 'SURABAYA', '0', '', 'sidaorjo', 'mario (bfi sidoarjo)', 'Indonesia', 'Jawa timur', 'SURABAYA', '0', '', 'sidaorjo', 'id', NULL, '2022-09-12 13:22:52', '2022-09-12 13:22:52'),
(62, 32, 'daniel (bfi sidoarjo', 'kantornotarisajeng@gmail.com', NULL, '0', 7, '', 72, 1, NULL, 'daniel ( bfi sidoarjo)', NULL, 'Jawa timur', 'sidoarjo', '0', '', 'sidoarjo', 'daniel ( bfi sidoarjo)', 'Indonesia', 'Jawa timur', 'sidoarjo', '0', '', 'sidoarjo', 'id', NULL, '2022-09-12 13:23:32', '2022-09-12 13:23:32'),
(63, 33, 'robby (bfi sby 2 )', 'kantornotarisajeng@gmail.com', NULL, '0', 5, '', 72, 1, NULL, 'robby (bfi sby 2 )', NULL, 'jawa timur', 'sidoarjo', '0', '', 'sidoarjo', 'robby (bfi sby 2 )', 'Indonesia', 'jawa timur', 'sidoarjo', '0', '', 'sidoarjo', 'id', NULL, '2022-09-12 13:24:27', '2022-09-12 13:24:27'),
(64, 34, 'fitri (bfi sby 2 )', 'kantornotarisajeng@gmail.com', NULL, '0', 5, '', 72, 1, NULL, 'fitri (bfi sby 2 )', NULL, 'jawa timur', 'SURABAYA', '0', '', 'surabaya', 'fitri (bfi sby 2 )', 'Indonesia', 'jawa timur', 'SURABAYA', '0', '', 'surabaya', 'id', NULL, '2022-09-12 13:25:08', '2022-09-12 13:25:08'),
(65, 2, 'Yayasan Al Muslim Jawa Timur', '', NULL, '0318681416', 0, '', 38, 1, NULL, 'Yayasan Al Muslim Jawa Timur', NULL, 'JAWA TIMUR', 'KOTA SIDOARJO', '0318681416', '61256', 'Jl. Raya Wadung Asri No.39F, Ngipa, Wadungasri, Kec. Waru', 'Yayasan Al Muslim Jawa Timur', 'Indonesia', 'JAWA TIMUR', 'KOTA SIDOARJO', '0318681416', '60227', 'Jl. Raya Wadung Asri No.39F, Ngipa, Wadungasri, Kec. Waru', 'id', NULL, '2022-09-14 03:54:49', '2022-09-14 03:54:49'),
(66, 35, 'pendirian cabang dan kuasa', 'kantornotarisajeng@gmail.com', NULL, '0', 8, '', 72, 1, NULL, 'pendirian cabang dan kuasa', NULL, 'Jawa Timur', 'Kota Surabaya', '0', '60223', 'Pondok Tjandra Palem Timur MA 28', 'pendirian cabang dan kuasa', 'Indonesia', 'Jawa Timur', 'Kota Surabaya', '0', '60223', 'Pondok Tjandra Palem Timur MA 28', 'id', NULL, '2022-09-15 04:06:20', '2022-09-15 04:06:20'),
(67, 36, 'PT. BERKAT ARANG SUKSES', 'kantornotarisajeng@gmail.com', NULL, '0', 8, '', 72, 1, NULL, 'PT.BERKAT ARANG SUKSES', NULL, 'Jawa Timur', 'Kota Surabaya', '0', '60223', 'Pondok Tjandra Palem Timur MA 28', 'PT.BERKAT ARANG SUKSES', 'Indonesia', 'Jawa Timur', 'Kota Surabaya', '0', '60223', 'Pondok Tjandra Palem Timur MA 28', 'id', NULL, '2022-09-15 04:09:57', '2022-09-15 04:09:57'),
(68, 1, 'Maya', 'Maimunatus23shobiro@gmail.com', NULL, '085334375949', 9, '', 77, 1, NULL, 'Maya', NULL, '0853343775949', 'Surabaya', '085334375949', '60232', 'Urabaya', 'Maya', 'Indonesia', '0853343775949', 'Surabaya', '085334375949', '60232', 'Urabaya', 'id', NULL, '2022-09-19 13:46:46', '2022-09-19 13:46:46'),
(69, 2, 'Umum', 'Maimunatus23shobiro@gmail.com', NULL, '085334375949', 9, '', 77, 1, NULL, 'Umum', NULL, '0853343775949', 'Surabaya', '085334375949', '', 'Surabaya', 'Umum', 'Indonesia', '0853343775949', 'Surabaya', '085334375949', '', 'Surabaya', 'id', NULL, '2022-09-19 14:08:47', '2022-09-19 14:08:47'),
(70, 37, 'Akta Kuasa dan Persetujuan', 'kantornotarisajeng@gmail.com', NULL, '0', 8, '', 72, 1, NULL, 'Akta Kuasa dan Persetujuan', NULL, 'Jawa Timur', 'Kota Surabaya', '0', '60223', 'Pondok Tjandra Palem Timur MA 28', 'Akta Kuasa dan Persetujuan', 'Indonesia', 'Jawa Timur', 'Kota Surabaya', '0', '60223', 'Pondok Tjandra Palem Timur MA 28', 'id', NULL, '2022-09-21 04:02:16', '2022-09-21 04:02:16'),
(71, 3, 'Customer Juragan', '', NULL, '081xxx', 0, '', 77, 1, NULL, 'Customer', NULL, 'Jawa timur', 'Surabaya', '0812', '', 'Surabaya', 'Customer', 'Indonesia', 'Jawa timur', 'Surabaya', '0812', '', 'Surabaya', 'id', NULL, '2022-09-22 14:02:17', '2022-09-22 14:02:17'),
(72, 38, 'CV WATU JAYA MAKMUR', 'cvwatujayamakmur@gmail.com', NULL, '0', 8, '', 72, 1, NULL, 'CV WATU JAYA MAKMUR', NULL, 'Jawa Timur', 'Kota Surabaya', '0', '0', 'Surabaya', 'CV WATU JAYA MAKMUR', 'Indonesia', 'Jawa Timur', 'Kota Surabaya', '0', '0', 'Surabaya', 'id', NULL, '2022-09-26 09:19:17', '2022-09-26 09:19:17'),
(73, 39, 'ROYAN ABDILAH ZAKARIA (Surabaya 2)', 'kantornotarisajeng@gmail.com', NULL, '0', 5, '', 72, 1, NULL, 'ROYAN ABDILAH ZAKARIA(Surabaya 2)', NULL, 'Jawa Timur', 'Kota Surabaya', '0', '0', 'Surabaya', 'ROYAN ABDILAH ZAKARIA (Surabaya 2)', 'Indonesia', 'Jawa Timur', 'Kota Surabaya', '0', '0', 'Surabaya', 'id', NULL, '2022-09-27 06:30:52', '2022-09-27 06:32:18'),
(74, 40, 'ERICH HUDI PRASETYA', 'kantornotarisajeng@gmail.com', NULL, '0', 8, '', 72, 1, NULL, 'ERICH HUDI PRASETYA', NULL, 'Jawa Timur', 'Kota Surabaya', '0', '0', 'Surabaya', 'ERICH HUDI PRASETYA', 'Indonesia', 'Jawa Timur', 'Kota Surabaya', '0', '0', 'Surabaya', 'id', NULL, '2022-10-01 03:16:38', '2022-10-01 03:16:38'),
(75, 1, 'Ester', 'ester@gmail.com', NULL, '085548291023', 0, '', 86, 1, NULL, 'Ester', NULL, 'Jawa Barat', 'Bandung', '087657381920', '76589', 'Jl Sultan Ahmad 88', 'Ester', 'Indonesia', 'Jawa Barat', 'Bandung', '087657381920', '76589', 'Jl Sultan Ahmad 88', 'id', NULL, '2023-03-01 14:08:17', '2023-03-01 14:08:17'),
(76, 2, 'Fajar', 'putrilailatul26@gmail.com', NULL, '085548291023', 0, '', 86, 1, NULL, 'Fajar', NULL, 'Jawa Barat', 'Bandung', '087657381920', '76589', 'Jl Sultan Ahmad 88', 'Fajar', 'Indonesia', 'Jawa Barat', 'Bandung', '087657381920', '76589', 'Jl Sultan Ahmad 88', 'id', NULL, '2023-03-01 14:16:13', '2023-03-01 14:16:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_categories`
--

CREATE TABLE `customer_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `discount_type` tinyint(4) NOT NULL,
  `discount` float NOT NULL,
  `max_discount` float NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `customer_categories`
--

INSERT INTO `customer_categories` (`id`, `name`, `discount_type`, `discount`, `max_discount`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Kebun Sayur Surabaya', 0, 0, 0, 54, '2022-04-18 10:11:13', '2022-04-18 10:11:13'),
(2, 'Loyal', 0, 20, 100000, 27, '2022-05-11 14:44:32', '2022-05-11 14:44:32'),
(3, 'Legal Hub', 1, 0, 1500000, 72, '2022-07-20 05:22:18', '2022-07-25 05:34:24'),
(4, 'BFI SURABAYA 1', 1, 0, 0, 72, '2022-07-20 05:24:02', '2022-07-29 05:40:54'),
(5, 'BFI SURABAYA 2', 1, 0, 0, 72, '2022-07-20 05:24:51', '2022-07-29 05:40:43'),
(6, 'AJB', 1, 0, 0, 72, '2022-07-20 05:25:13', '2022-07-29 05:41:11'),
(7, 'BFI SIDOARJO', 1, 0, 0, 72, '2022-07-20 05:25:43', '2022-07-29 05:41:20'),
(8, 'UMUM', 1, 0, 0, 72, '2022-07-21 03:12:17', '2022-07-21 03:12:17'),
(9, 'Umum', 1, 0, 0, 77, '2022-09-19 13:43:58', '2022-09-19 13:43:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `custom_fields`
--

CREATE TABLE `custom_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `module` varchar(191) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `custom_fields`
--

INSERT INTO `custom_fields` (`id`, `name`, `type`, `module`, `created_by`, `created_at`, `updated_at`) VALUES
(3, 'wilayah pengantaran', 'text', 'customer', 51, '2022-04-26 09:52:36', '2022-04-26 09:52:36'),
(4, 'Surat Jalan', 'textarea', 'customer', 72, '2022-08-02 14:23:00', '2022-08-02 14:23:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `custom_field_values`
--

CREATE TABLE `custom_field_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `record_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(191) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `custom_field_values`
--

INSERT INTO `custom_field_values` (`id`, `record_id`, `field_id`, `value`, `created_by`, `created_at`, `updated_at`) VALUES
(7, 23, 3, 'Sidoarjo', 51, NULL, NULL),
(8, 36, 3, '', 51, NULL, NULL),
(9, 47, 4, '', 72, NULL, NULL),
(10, 48, 4, '', 72, NULL, NULL),
(11, 49, 4, '', 72, NULL, NULL),
(12, 52, 4, '', 72, NULL, NULL),
(13, 53, 4, '', 72, NULL, NULL),
(14, 54, 4, '', 72, NULL, NULL),
(15, 55, 4, '', 72, NULL, NULL),
(16, 56, 4, '', 72, NULL, NULL),
(17, 57, 4, '', 72, NULL, NULL),
(18, 58, 4, '', 72, NULL, NULL),
(19, 59, 4, '', 72, NULL, NULL),
(20, 60, 4, '', 72, NULL, NULL),
(21, 61, 4, '', 72, NULL, NULL),
(22, 62, 4, '', 72, NULL, NULL),
(23, 63, 4, '', 72, NULL, NULL),
(24, 64, 4, '', 72, NULL, NULL),
(25, 66, 4, '', 72, NULL, NULL),
(26, 67, 4, '', 72, NULL, NULL),
(27, 70, 4, '', 72, NULL, NULL),
(28, 72, 4, '', 72, NULL, NULL),
(29, 73, 4, '', 72, NULL, NULL),
(30, 74, 4, '', 72, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `debit_notes`
--

CREATE TABLE `debit_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill` int(11) NOT NULL DEFAULT 0,
  `vendor` int(11) NOT NULL DEFAULT 0,
  `amount` double(16,2) NOT NULL DEFAULT 0.00,
  `date` date NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `debit_notes`
--

INSERT INTO `debit_notes` (`id`, `bill`, `vendor`, `amount`, `date`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 25000.00, '2021-11-08', '', '2021-11-07 22:08:40', '2021-11-07 22:08:40'),
(3, 3, 7, 19791199.00, '2022-09-22', '', '2022-09-22 12:25:19', '2022-09-22 12:25:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `default_values`
--

CREATE TABLE `default_values` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(100) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `type` varchar(127) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `default_values`
--

INSERT INTO `default_values` (`id`, `name`, `value`, `color`, `type`, `created_at`, `updated_at`) VALUES
(2, 'PPn', '10', '', 'Tax', '2021-11-22 09:19:18', '2021-11-22 09:19:18'),
(3, 'Bebas Pajak', '0', '', 'Tax', '2021-11-22 09:36:08', '2021-11-22 09:36:08'),
(4, 'Penjualan', '', '9A91D9', 'Income', '2021-11-22 09:37:41', '2021-11-22 13:37:29'),
(5, 'Penambahan Modal', '', '99B1FF', 'Income', '2021-11-22 09:37:56', '2021-11-22 13:33:55'),
(6, 'Pendapatan Lain', '', 'F4C2FF', 'Income', '2021-11-22 09:38:09', '2021-11-22 13:35:55'),
(7, 'Pendapatan Jasa', '', 'DACFFF', 'Income', '2021-11-22 09:39:06', '2021-11-22 13:34:23'),
(8, 'Hibah', '', '54AFFF', 'Income', '2021-11-22 09:40:22', '2021-11-22 13:33:28'),
(9, 'Pinjaman', '', '798AC7', 'Income', '2021-11-22 09:40:37', '2021-11-22 13:37:14'),
(10, 'Piutang', '', '7DADD4', 'Income', '2021-11-22 09:40:53', '2021-11-22 13:37:54'),
(11, 'Pembelian Stok Barang', '', 'FF5959', 'Expense', '2021-11-22 09:41:58', '2021-11-22 13:30:49'),
(12, 'Pembelian Bahan Baku', '', 'FF8F73', 'Expense', '2021-11-22 09:42:10', '2021-11-22 13:30:33'),
(13, 'Biaya Operasional', '', 'FFB899', 'Expense', '2021-11-22 09:42:28', '2021-11-22 13:29:29'),
(14, 'Pengeluaran Lain-lain', '', 'FFA845', 'Expense', '2021-11-22 09:42:48', '2021-11-22 13:31:18'),
(15, 'Pembayaran Hutang', '', 'FFCD78', 'Expense', '2021-11-22 09:43:00', '2021-11-22 13:28:38'),
(16, 'Pemberian Utang', '', 'FFC561', 'Expense', '2021-11-22 09:43:11', '2021-11-22 13:31:02'),
(17, 'Donasi', '', 'CF885F', 'Expense', '2021-11-22 09:43:20', '2021-11-22 13:28:51'),
(18, 'Produk Organik', '', 'D1FFA8', 'Product Service', '2021-11-22 09:43:42', '2021-11-22 13:32:48'),
(19, 'Produk Impor', '', 'BFFFDB', 'Product Service', '2021-11-22 09:43:54', '2021-11-22 13:32:00'),
(20, 'Produk Premium', '', '9AFF4D', 'Product Service', '2021-11-22 09:44:08', '2021-11-22 13:33:09'),
(21, 'Produk Lokal', '', '8CFF94', 'Product Service', '2021-11-22 09:44:22', '2021-11-22 13:32:15'),
(22, 'Layanan Jasa', '', '87FFD3', 'Product Service', '2021-11-22 09:44:37', '2021-11-22 13:31:45'),
(23, 'Biji', '', '', 'Unit', '2021-11-22 09:44:52', '2021-11-22 09:44:52'),
(24, 'Botol', '', '', 'Unit', '2021-11-22 09:45:00', '2021-11-22 09:45:00'),
(25, 'Bungkus', '', '', 'Unit', '2021-11-22 09:45:12', '2021-11-22 09:45:12'),
(26, 'Copy', '', '', 'Unit', '2021-11-22 09:45:24', '2021-11-22 09:45:24'),
(27, 'Dus', '', '', 'Unit', '2021-11-22 09:45:49', '2021-11-22 09:45:49'),
(28, 'Gross', '', '', 'Unit', '2021-11-22 09:45:57', '2021-11-22 09:45:57'),
(29, 'Kaleng', '', '', 'Unit', '2021-11-22 09:46:05', '2021-11-22 09:46:05'),
(30, 'Karung', '', '', 'Unit', '2021-11-22 09:46:15', '2021-11-22 09:46:15'),
(31, 'Gram', '', '', 'Unit', '2021-11-22 09:46:27', '2021-11-22 09:46:27'),
(32, 'Kg', '', '', 'Unit', '2021-11-22 09:46:35', '2021-11-22 09:46:35'),
(33, 'Kodi', '', '', 'Unit', '2021-11-22 09:46:43', '2021-11-22 09:46:43'),
(34, 'Lembar', '', '', 'Unit', '2021-11-22 09:47:11', '2021-11-22 09:47:11'),
(35, 'Lempeng', '', '', 'Unit', '2021-11-22 09:47:19', '2021-11-22 09:47:19'),
(36, 'Liter', '', '', 'Unit', '2021-11-22 09:47:30', '2021-11-22 09:47:30'),
(37, 'Lusin', '', '', 'Unit', '2021-11-22 09:47:37', '2021-11-22 09:47:37'),
(38, 'Pasang', '', '', 'Unit', '2021-11-22 09:47:46', '2021-11-22 09:47:46'),
(39, 'Pcs', '', '', 'Unit', '2021-11-22 09:47:56', '2021-11-22 09:47:56'),
(40, 'Rim', '', '', 'Unit', '2021-11-22 09:48:04', '2021-11-22 09:48:04'),
(41, 'Unit', '', '', 'Unit', '2021-11-22 09:48:12', '2021-11-22 09:48:12'),
(42, 'Gaji', '', 'FFB675', 'Expense', '2021-11-22 09:49:19', '2021-11-22 13:28:27'),
(43, 'Administrasi Bank', '', 'FF8C7A', 'Expense', '2021-11-22 09:49:33', '2021-11-22 13:29:43'),
(44, 'Pajak', '', 'C4996E', 'Expense', '2021-11-22 09:50:04', '2021-11-22 13:28:16'),
(45, 'Utilitas', '', 'FF773D', 'Expense', '2021-11-22 09:50:18', '2021-11-22 13:31:30'),
(46, 'Bonus', '', 'FF9D47', 'Expense', '2021-11-22 09:50:59', '2021-11-22 13:29:05'),
(47, 'Cash', '', 'FFFFFF', 'Payment Method', '2021-11-23 06:32:52', '2021-11-23 06:32:52'),
(48, 'Transfer Bank', '', 'FFFFFF', 'Payment Method', '2021-11-23 06:33:33', '2021-11-23 06:33:33'),
(49, 'OVO', '', 'FFFFFF', 'Payment Method', '2021-11-23 06:34:09', '2021-11-23 06:34:09'),
(50, 'GoPay', '', 'FFFFFF', 'Payment Method', '2021-11-23 06:34:30', '2021-11-23 06:34:30'),
(51, 'Dana', '', 'FFFFFF', 'Payment Method', '2021-11-23 06:34:57', '2021-11-23 06:34:57'),
(52, 'LinkAja', '', 'FFFFFF', 'Payment Method', '2021-11-23 06:35:33', '2021-11-23 06:35:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `equities`
--

CREATE TABLE `equities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(16,2) NOT NULL,
  `description` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `amount` double(16,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `project` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `attachment` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `goals`
--

CREATE TABLE `goals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `from` varchar(191) DEFAULT NULL,
  `to` varchar(191) DEFAULT NULL,
  `amount` double(16,2) NOT NULL DEFAULT 0.00,
  `is_display` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `goals`
--

INSERT INTO `goals` (`id`, `name`, `type`, `from`, `to`, `amount`, `is_display`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Total Penjualan', '2', '2021-01', '2021-12', 8000000.00, 1, 19, '2021-07-27 22:10:34', '2021-07-27 22:10:34'),
(3, 'Pendapatan', '0', '2022-02', '2022-03', 500000.00, 1, 27, '2022-03-16 01:51:14', '2022-03-16 01:51:14'),
(4, 'Revenue', '2', '2022-01', '2022-12', 100000000.00, 1, 38, '2022-03-17 06:23:46', '2022-03-17 06:23:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `issue_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `due_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `send_date` timestamp NULL DEFAULT NULL,
  `pickup_time` datetime DEFAULT NULL,
  `delivery_time` datetime DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `ref_number` text DEFAULT NULL,
  `signed_by` varchar(250) DEFAULT NULL,
  `signee_position` varchar(250) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `customer_tax` tinyint(1) NOT NULL DEFAULT 0,
  `shipping_display` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `discount_apply` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `served_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_id`, `customer_id`, `issue_date`, `due_date`, `send_date`, `pickup_time`, `delivery_time`, `category_id`, `ref_number`, `signed_by`, `signee_position`, `status`, `type`, `customer_tax`, `shipping_display`, `discount_apply`, `created_by`, `served_by`, `created_at`, `updated_at`) VALUES
(2, 1, 3, '2021-11-07 17:00:00', '2021-11-07 17:00:00', NULL, NULL, NULL, 37, '', NULL, NULL, 0, 0, 0, 1, 0, 26, NULL, '2021-11-07 21:57:28', '2021-11-07 21:57:28'),
(5, 1, 5, '2022-04-21 21:16:19', '2021-12-14 17:00:00', '2021-12-14 17:00:00', NULL, NULL, 12, '', NULL, NULL, 4, 0, 0, 1, 0, 20, NULL, '2021-12-15 14:00:01', '2022-04-21 21:16:19'),
(18, 1, 13, '2022-03-10 17:00:00', '2022-03-10 17:00:00', '2022-03-10 17:00:00', NULL, NULL, 207, '', NULL, NULL, 1, 0, 0, 1, 0, 41, 41, '2022-03-11 05:48:21', '2022-03-11 05:48:21'),
(20, 2, 18, '2022-03-17 17:00:00', '2022-03-17 17:00:00', NULL, NULL, NULL, 207, '', NULL, NULL, 2, 0, 0, 1, 0, 41, 41, '2022-03-18 02:56:02', '2022-03-18 02:56:02'),
(21, 3, 18, '2022-03-17 17:00:00', '2022-03-17 17:00:00', NULL, NULL, NULL, 207, '', NULL, NULL, 2, 0, 0, 1, 0, 41, 41, '2022-03-18 02:58:40', '2022-03-18 02:58:40'),
(22, 4, 18, '2022-03-17 17:00:00', '2022-03-17 17:00:00', NULL, NULL, NULL, 207, '', NULL, NULL, 4, 0, 0, 1, 0, 41, 41, '2022-03-18 03:02:52', '2022-03-18 03:02:52'),
(23, 5, 18, '2022-03-17 17:00:00', '2022-03-17 17:00:00', NULL, NULL, NULL, 207, '', NULL, NULL, 4, 0, 0, 1, 0, 41, 41, '2022-03-18 03:08:19', '2022-03-18 03:08:19'),
(24, 6, 13, '2022-03-17 17:00:00', '2022-03-17 17:00:00', NULL, NULL, NULL, 207, '', NULL, NULL, 4, 0, 0, 1, 0, 41, 41, '2022-03-18 03:11:42', '2022-03-18 03:11:42'),
(25, 7, 18, '2022-03-17 17:00:00', '2022-03-17 17:00:00', NULL, NULL, NULL, 207, '', NULL, NULL, 4, 0, 0, 1, 0, 41, 41, '2022-03-18 03:13:07', '2022-03-18 03:13:07'),
(26, 8, 18, '2022-03-18 03:30:29', '2022-03-18 03:30:00', NULL, NULL, NULL, 207, '', NULL, NULL, 4, 0, 0, 1, 0, 41, 41, '2022-03-18 03:30:29', '2022-03-18 03:30:29'),
(27, 2, 5, '2022-04-11 05:51:38', '2022-04-10 17:00:00', '2022-04-10 17:00:00', NULL, NULL, 10, '', NULL, NULL, 1, 0, 0, 1, 0, 20, 20, '2022-04-11 05:51:38', '2022-04-11 05:51:38'),
(28, 2, 6, '2022-04-14 06:21:56', '2022-04-13 17:00:00', '2022-04-13 17:00:00', '2022-04-14 13:21:42', NULL, 42, '', NULL, NULL, 5, 1, 0, 1, 0, 27, 27, '2022-04-14 06:21:33', '2022-04-14 06:21:56'),
(36, 3, 12, '2022-05-12 05:43:20', '2022-05-11 17:00:00', '2022-05-11 17:00:00', NULL, NULL, 42, '', NULL, NULL, 3, 0, 0, 1, 0, 27, 27, '2022-05-12 05:43:04', '2022-05-12 05:43:20'),
(37, 1, 25, '2022-05-17 09:44:28', '2022-05-17 10:44:00', NULL, NULL, NULL, 421, '', NULL, NULL, 4, 0, 0, 1, 0, 50, 50, '2022-05-17 09:44:28', '2022-05-17 09:44:28'),
(38, 2, 25, '2022-05-17 10:21:13', '2022-05-17 11:21:00', NULL, NULL, NULL, 421, '', NULL, NULL, 4, 0, 0, 1, 0, 50, 50, '2022-05-17 10:21:13', '2022-05-17 10:21:13'),
(39, 1, 26, '2022-05-28 08:24:47', '2022-05-27 17:00:00', '2022-05-27 17:00:00', NULL, NULL, 386, '', NULL, NULL, 1, 2, 0, 1, 0, 60, 60, '2022-05-28 08:24:47', '2022-05-28 08:24:47'),
(43, 1, 27, '2022-06-16 05:36:25', '2022-06-15 17:00:00', '2022-06-15 17:00:00', NULL, NULL, 31, '', NULL, NULL, 1, 0, 0, 1, 0, 24, 24, '2022-06-16 05:36:25', '2022-06-16 05:36:25'),
(44, 1, 28, '2022-07-29 02:41:06', '2022-07-29 17:00:00', '2022-07-19 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 74, '2022-07-20 04:36:29', '2022-07-29 02:41:06'),
(45, 2, 29, '2022-07-29 02:40:32', '2022-07-25 17:00:00', '2022-07-24 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 72, '2022-07-25 05:30:39', '2022-07-29 02:40:32'),
(46, 3, 30, '2022-07-29 02:40:11', '2022-07-25 17:00:00', '2022-07-24 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 72, '2022-07-25 05:31:33', '2022-07-29 02:40:11'),
(47, 4, 31, '2022-07-29 02:40:53', '2022-07-25 17:00:00', '2022-07-24 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 72, '2022-07-25 05:33:42', '2022-07-29 02:40:53'),
(48, 5, 32, '2022-07-25 09:01:10', '2022-07-11 17:00:00', '2022-07-24 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 72, '2022-07-25 08:52:38', '2022-07-25 09:01:10'),
(49, 6, 33, '2022-07-25 09:01:45', '2022-07-14 17:00:00', '2022-07-24 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 72, '2022-07-25 08:53:39', '2022-07-25 09:01:45'),
(50, 7, 34, '2022-07-30 17:00:00', '2022-07-18 17:00:00', '2022-07-24 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 72, '2022-07-25 08:54:27', '2022-08-04 07:07:31'),
(51, 8, 35, '2022-07-25 08:59:25', '2022-07-18 17:00:00', '2022-07-24 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 72, '2022-07-25 08:57:37', '2022-07-25 08:59:25'),
(53, 9, 37, '2022-07-30 17:00:00', '2022-07-30 17:00:00', '2022-07-28 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 72, '2022-07-29 05:47:17', '2022-08-05 15:22:16'),
(54, 10, 38, '2022-07-28 17:00:00', '2022-07-30 17:00:00', '2022-07-28 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 72, '2022-07-29 06:56:23', '2022-08-05 15:24:59'),
(55, 11, 39, '2022-07-30 17:00:00', '2022-07-30 17:00:00', '2022-07-28 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 72, '2022-07-29 07:23:43', '2022-08-05 15:24:24'),
(56, 12, 40, '2022-07-30 17:00:00', '2022-07-30 17:00:00', '2022-07-28 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 72, '2022-07-29 07:26:08', '2022-08-05 15:23:35'),
(57, 13, 41, '2022-07-29 07:51:15', '2022-07-28 17:00:00', '2022-07-28 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 72, '2022-07-29 07:32:44', '2022-07-29 07:51:15'),
(58, 14, 42, '2022-07-30 17:00:00', '2022-07-28 17:00:00', '2022-08-02 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 72, '2022-07-29 07:34:33', '2022-08-04 07:13:04'),
(59, 15, 43, '2022-07-30 17:00:00', '2022-07-22 17:00:00', '2022-07-28 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 72, '2022-07-29 07:38:31', '2022-08-04 07:11:49'),
(60, 16, 44, '2022-07-30 17:00:00', '2022-07-17 17:00:00', '2022-07-28 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 72, '2022-07-29 07:42:55', '2022-08-04 07:09:08'),
(61, 17, 45, '2022-07-30 17:00:00', '2022-07-14 17:00:00', '2022-07-28 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 72, '2022-07-29 07:44:12', '2022-08-04 07:08:28'),
(62, 18, 46, '2022-07-30 17:00:00', '2022-07-07 17:00:00', '2022-07-28 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 72, '2022-07-29 07:47:02', '2022-08-04 07:08:51'),
(63, 19, 47, '2022-07-30 17:00:00', '2022-07-12 17:00:00', '2022-08-02 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 72, '2022-08-03 06:28:37', '2022-08-04 07:08:11'),
(64, 4, 6, '2022-08-03 07:54:03', '2022-08-03 17:00:00', '2022-08-02 17:00:00', NULL, NULL, 42, '', NULL, NULL, 4, 0, 0, 1, 0, 27, 27, '2022-08-03 07:53:52', '2022-08-03 07:54:03'),
(65, 20, 48, '2022-09-15 03:59:46', '2022-08-31 17:00:00', '2022-08-28 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 72, '2022-08-29 04:55:24', '2022-09-15 03:59:46'),
(66, 21, 49, '2022-08-23 17:00:00', '2022-08-31 17:00:00', '2022-08-28 17:00:00', NULL, NULL, 527, '', NULL, NULL, 1, 0, 0, 1, 0, 72, 72, '2022-08-29 04:55:59', '2022-09-11 04:33:53'),
(68, 2, 51, '2022-09-10 14:43:12', '2022-09-09 17:00:00', '2022-09-09 17:00:00', NULL, NULL, 164, '', NULL, NULL, 1, 0, 0, 1, 0, 24, 24, '2022-09-10 14:43:12', '2022-09-10 14:43:12'),
(69, 22, 52, '2022-09-15 04:05:19', '2022-08-31 17:00:00', '2022-09-11 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 73, '2022-09-12 12:11:18', '2022-09-15 04:05:19'),
(72, 1, 68, '2022-09-19 13:48:36', '2022-09-18 17:00:00', '2022-09-18 17:00:00', NULL, NULL, 556, '', NULL, NULL, 4, 0, 0, 1, 0, 77, 77, '2022-09-19 13:47:33', '2022-09-19 13:48:36'),
(73, 2, 69, '2022-09-19 14:11:44', '2022-09-18 17:00:00', '2022-09-18 17:00:00', NULL, NULL, 556, '', NULL, NULL, 1, 0, 0, 1, 0, 77, 77, '2022-09-19 14:11:44', '2022-09-19 14:11:44'),
(74, 23, 70, '2022-09-25 15:41:30', '2022-09-20 17:00:00', '2022-09-20 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 72, '2022-09-21 04:04:32', '2022-09-25 15:41:30'),
(75, 3, 69, '2022-09-21 14:23:30', '2022-09-20 17:00:00', '2022-09-20 17:00:00', NULL, NULL, 556, '', NULL, NULL, 4, 0, 0, 1, 0, 77, 77, '2022-09-21 12:50:23', '2022-09-21 14:23:30'),
(76, 4, 69, '2022-09-20 17:00:00', '2022-09-20 17:00:00', '2022-09-20 17:00:00', NULL, NULL, 556, '', NULL, NULL, 1, 0, 0, 1, 0, 77, 82, '2022-09-21 14:17:48', '2022-09-21 14:22:45'),
(77, 5, 69, '2022-09-21 14:29:45', '2022-09-20 17:00:00', '2022-09-20 17:00:00', NULL, NULL, 556, '', NULL, NULL, 1, 0, 0, 1, 0, 77, 82, '2022-09-21 14:29:45', '2022-09-21 14:29:45'),
(78, 6, 69, '2022-09-21 14:35:50', '2022-09-20 17:00:00', '2022-09-20 17:00:00', NULL, NULL, 556, '', NULL, NULL, 1, 0, 0, 1, 0, 77, 82, '2022-09-21 14:35:50', '2022-09-21 14:35:50'),
(79, 7, 69, '2022-09-21 14:37:19', '2022-09-20 17:00:00', '2022-09-20 17:00:00', NULL, NULL, 556, '', NULL, NULL, 1, 0, 0, 1, 0, 77, 77, '2022-09-21 14:37:19', '2022-09-21 14:37:19'),
(80, 8, 69, '2022-09-22 02:08:17', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 1, 0, 0, 1, 0, 77, 82, '2022-09-22 02:08:17', '2022-09-22 02:08:17'),
(81, 9, 69, '2022-09-22 03:47:40', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 1, 0, 0, 1, 0, 77, 82, '2022-09-22 03:47:40', '2022-09-22 03:47:40'),
(82, 10, 69, '2022-09-22 03:50:43', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 1, 0, 0, 1, 0, 77, 82, '2022-09-22 03:50:43', '2022-09-22 03:50:43'),
(83, 11, 69, '2022-09-22 03:53:13', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 1, 0, 0, 1, 0, 77, 82, '2022-09-22 03:53:13', '2022-09-22 03:53:13'),
(84, 12, 69, '2022-09-22 03:54:23', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 1, 0, 0, 1, 0, 77, 82, '2022-09-22 03:54:23', '2022-09-22 03:54:23'),
(85, 13, 69, '2022-09-22 04:09:25', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 1, 0, 0, 1, 0, 77, 82, '2022-09-22 04:09:25', '2022-09-22 04:09:25'),
(86, 14, 69, '2022-09-22 04:20:34', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 1, 0, 0, 1, 0, 77, 82, '2022-09-22 04:20:34', '2022-09-22 04:20:34'),
(87, 15, 69, '2022-09-22 04:21:45', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 1, 0, 0, 1, 0, 77, 82, '2022-09-22 04:21:45', '2022-09-22 04:21:45'),
(88, 16, 69, '2022-09-22 11:11:13', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 4, 0, 0, 1, 0, 77, 82, '2022-09-22 04:22:21', '2022-09-22 11:11:13'),
(89, 17, 69, '2022-09-22 11:10:39', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 4, 0, 0, 1, 0, 77, 82, '2022-09-22 05:02:50', '2022-09-22 11:10:39'),
(90, 18, 69, '2022-09-22 11:10:07', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 4, 0, 0, 1, 0, 77, 82, '2022-09-22 05:18:50', '2022-09-22 11:10:07'),
(91, 19, 69, '2022-09-22 11:09:55', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 4, 0, 0, 1, 0, 77, 82, '2022-09-22 05:20:03', '2022-09-22 11:09:55'),
(92, 20, 69, '2022-09-22 11:09:37', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 4, 0, 0, 1, 0, 77, 82, '2022-09-22 05:20:32', '2022-09-22 11:09:37'),
(93, 21, 69, '2022-09-22 11:08:54', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 4, 0, 0, 1, 0, 77, 82, '2022-09-22 05:49:20', '2022-09-22 11:08:54'),
(94, 22, 69, '2022-09-22 11:08:41', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 4, 0, 0, 1, 0, 77, 82, '2022-09-22 05:49:52', '2022-09-22 11:08:41'),
(95, 23, 69, '2022-09-22 11:08:13', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 4, 0, 0, 1, 0, 77, 82, '2022-09-22 06:56:37', '2022-09-22 11:08:13'),
(96, 24, 69, '2022-09-22 11:07:42', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 4, 0, 0, 1, 0, 77, 82, '2022-09-22 06:59:54', '2022-09-22 11:07:42'),
(97, 25, 69, '2022-09-22 11:06:52', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 4, 0, 0, 1, 0, 77, 82, '2022-09-22 09:17:55', '2022-09-22 11:06:52'),
(98, 26, 69, '2022-09-22 11:06:41', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 4, 0, 0, 1, 0, 77, 82, '2022-09-22 09:18:39', '2022-09-22 11:06:41'),
(99, 27, 69, '2022-09-22 11:06:30', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 4, 0, 0, 1, 0, 77, 82, '2022-09-22 09:19:05', '2022-09-22 11:06:30'),
(100, 28, 69, '2022-09-22 11:06:18', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 4, 0, 0, 1, 0, 77, 82, '2022-09-22 10:13:21', '2022-09-22 11:06:18'),
(101, 29, 69, '2022-09-22 11:06:03', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 4, 0, 0, 1, 0, 77, 82, '2022-09-22 10:19:28', '2022-09-22 11:06:03'),
(102, 30, 69, '2022-09-22 11:05:33', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 4, 0, 0, 1, 0, 77, 82, '2022-09-22 10:19:56', '2022-09-22 11:05:33'),
(103, 31, 69, '2022-09-22 11:04:47', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 4, 0, 0, 1, 0, 77, 82, '2022-09-22 10:21:03', '2022-09-22 11:04:47'),
(104, 32, 69, '2022-09-22 11:03:58', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 4, 0, 0, 1, 0, 77, 82, '2022-09-22 10:38:25', '2022-09-22 11:03:58'),
(105, 33, 69, '2022-09-22 11:01:11', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 4, 0, 0, 1, 0, 77, 82, '2022-09-22 10:38:43', '2022-09-22 11:01:11'),
(106, 34, 71, '2022-09-22 14:06:18', '2022-09-21 17:00:00', '2022-09-21 17:00:00', NULL, NULL, 556, '', NULL, NULL, 1, 0, 0, 1, 0, 77, 77, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(107, 24, 72, '2022-09-26 09:29:39', '2022-10-02 17:00:00', '2022-09-25 17:00:00', NULL, NULL, 527, '', NULL, NULL, 3, 0, 0, 1, 0, 72, 72, '2022-09-26 09:23:59', '2022-09-26 09:29:39'),
(108, 25, 73, '2022-09-27 06:34:55', '2022-10-03 17:00:00', '2022-09-26 17:00:00', NULL, NULL, 527, '', NULL, NULL, 1, 0, 0, 1, 0, 72, 72, '2022-09-27 06:34:40', '2022-09-27 06:34:55'),
(109, 26, 74, '2022-10-01 03:19:58', '2022-10-07 17:00:00', '2022-09-30 17:00:00', NULL, NULL, 527, '', NULL, NULL, 4, 0, 0, 1, 0, 72, 72, '2022-10-01 03:18:19', '2022-10-01 03:19:58'),
(110, 27, 74, '2022-10-01 03:18:21', '2022-10-07 17:00:00', '2022-09-30 17:00:00', NULL, NULL, 527, '', NULL, NULL, 1, 0, 0, 1, 0, 72, 72, '2022-10-01 03:18:21', '2022-10-01 03:18:21'),
(111, 5, 6, '2022-10-04 04:51:17', '2022-10-03 17:00:00', '2022-10-03 17:00:00', NULL, NULL, 42, '', 'Iri', 'Owner', 1, 0, 0, 1, 0, 27, 27, '2022-10-04 04:51:17', '2022-10-04 04:51:17'),
(113, 5, 23, '2022-11-09 20:07:46', '2022-11-04 17:00:00', '2022-10-31 17:00:00', NULL, NULL, 286, '', 'Dewi Anggraeni', 'Bill & Payment Collection', 4, 0, 0, 1, 0, 51, 51, '2022-11-01 08:37:37', '2022-11-09 20:07:46'),
(114, 6, 23, '2022-12-05 04:06:18', '2022-12-05 17:00:00', '2022-11-30 17:00:00', NULL, NULL, 286, '', 'Dewi Anggraeni', 'Bill & Payment Collection', 4, 0, 0, 1, 0, 51, 51, '2022-12-01 11:48:37', '2022-12-05 04:06:18'),
(115, 7, 23, '2023-01-02 10:46:51', '2023-01-05 17:00:00', '2023-01-01 17:00:00', NULL, NULL, 286, '', 'Dewi Anggraeni', 'Bill & Payment Collection', 1, 0, 0, 1, 0, 51, 51, '2023-01-02 10:46:00', '2023-01-02 10:46:51'),
(117, 8, 23, '2023-02-02 09:29:22', '2023-02-05 17:00:00', '2023-02-01 17:00:00', NULL, NULL, 286, '', 'Dewi Anggraeni', 'Bill & Payment Collection', 1, 0, 0, 1, 0, 51, 51, '2023-02-02 09:28:38', '2023-02-02 09:29:22'),
(118, 1, 75, '2023-03-01 14:15:14', '2023-02-28 17:00:00', '2023-02-28 17:00:00', NULL, NULL, 604, '', 'Ester', '', 1, 0, 0, 1, 0, 86, 86, '2023-03-01 14:15:14', '2023-03-01 14:15:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_payments`
--

CREATE TABLE `invoice_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` double(16,2) NOT NULL DEFAULT 0.00,
  `account_id` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `reference` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `served_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `invoice_payments`
--

INSERT INTO `invoice_payments` (`id`, `invoice_id`, `date`, `amount`, `account_id`, `payment_method`, `reference`, `description`, `created_by`, `served_by`, `created_at`, `updated_at`) VALUES
(12, 18, '2022-03-11', 890000.00, 11, 63, 'ok', 'asdasd', 41, 0, '2022-03-11 05:48:53', '2022-03-11 05:48:53'),
(13, 22, '2022-03-18', 10000.00, 11, 63, '', '', 41, 41, '2022-03-18 03:02:52', '2022-03-18 03:02:52'),
(14, 23, '2022-03-18', 10000.00, 11, 63, '', '', 41, 41, '2022-03-18 03:08:19', '2022-03-18 03:08:19'),
(15, 24, '2022-03-18', 10000.00, 11, 69, '', '', 41, 41, '2022-03-18 03:11:42', '2022-03-18 03:11:42'),
(16, 25, '2022-03-18', 50000.00, 11, 63, '', '', 41, 41, '2022-03-18 03:13:07', '2022-03-18 03:13:07'),
(17, 26, '2022-03-18', 30000.00, 11, 63, '', '', 41, 41, '2022-03-18 03:30:29', '2022-03-18 03:30:29'),
(18, 28, '2022-04-14', 5500.00, 5, 17, '', '', 27, 0, '2022-04-14 06:21:56', '2022-04-14 06:21:56'),
(20, 5, '2022-04-22', 10000.00, 2, 3, '', '', 20, 0, '2022-04-21 21:16:19', '2022-04-21 21:16:19'),
(24, 36, '2022-05-12', 2000.00, 5, 17, '', '', 27, 0, '2022-05-12 05:43:20', '2022-05-12 05:43:20'),
(25, 37, '2022-05-17', 10000.00, 12, 81, '', '', 50, 50, '2022-05-17 09:44:28', '2022-05-17 09:44:28'),
(26, 38, '2022-05-17', 10000.00, 12, 81, '', '', 50, 50, '2022-05-17 10:21:13', '2022-05-17 10:21:13'),
(31, 51, '2022-07-08', 2500000.00, 21, 143, '', '', 72, 0, '2022-07-25 08:59:25', '2022-07-25 08:59:25'),
(33, 48, '2022-07-08', 6000000.00, 21, 143, '', '', 72, 0, '2022-07-25 09:01:10', '2022-07-25 09:01:10'),
(34, 49, '2022-07-13', 6000000.00, 21, 143, '', '', 72, 0, '2022-07-25 09:01:45', '2022-07-25 09:01:45'),
(35, 46, '2022-07-29', 4500000.00, 21, 143, '', '', 72, 0, '2022-07-29 02:40:11', '2022-07-29 02:40:11'),
(36, 45, '2022-07-29', 4500000.00, 21, 143, '', '', 72, 0, '2022-07-29 02:40:32', '2022-07-29 02:40:32'),
(37, 47, '2022-07-29', 5500000.00, 21, 143, '', '', 72, 0, '2022-07-29 02:40:53', '2022-07-29 02:40:53'),
(38, 44, '2022-07-29', 4500000.00, 21, 143, '', '', 72, 0, '2022-07-29 02:41:06', '2022-07-29 02:41:06'),
(40, 54, '2022-07-27', 6000000.00, 21, 143, '', '', 72, 0, '2022-07-29 07:50:24', '2022-07-29 07:50:24'),
(41, 57, '2022-07-25', 5750000.00, 21, 143, '', '', 72, 0, '2022-07-29 07:51:15', '2022-07-29 07:51:15'),
(43, 62, '2022-07-01', 8300000.00, 21, 143, '', '', 72, 0, '2022-08-01 02:14:33', '2022-08-01 02:14:33'),
(44, 60, '2022-07-12', 14050000.00, 21, 143, '', '', 72, 0, '2022-08-01 02:15:36', '2022-08-01 02:15:36'),
(45, 59, '2022-07-18', 5050000.00, 21, 143, '', '', 72, 0, '2022-08-01 02:15:59', '2022-08-01 02:15:59'),
(46, 58, '2022-07-25', 3550000.00, 21, 143, '', '', 72, 0, '2022-08-01 02:16:26', '2022-08-01 02:16:26'),
(47, 56, '2022-07-26', 9500000.00, 21, 143, '', '', 72, 0, '2022-08-01 02:16:50', '2022-08-01 02:16:50'),
(48, 55, '2022-07-28', 4800000.00, 21, 143, '', '', 72, 0, '2022-08-01 02:17:07', '2022-08-01 02:17:07'),
(49, 53, '2022-07-29', 14500000.00, 21, 143, '', '', 72, 0, '2022-08-01 02:17:28', '2022-08-01 02:17:28'),
(50, 50, '2022-07-31', 6000000.00, 21, 143, '', '', 72, 0, '2022-08-03 05:12:57', '2022-08-03 05:12:57'),
(52, 64, '2022-08-03', 2500000.00, 5, 17, '', '', 27, 0, '2022-08-03 07:54:03', '2022-08-03 07:54:03'),
(53, 61, '2022-08-04', 8750000.00, 21, 143, '', '', 72, 0, '2022-08-04 07:07:48', '2022-08-04 07:07:48'),
(54, 61, '2022-08-04', 8750000.00, 21, 143, '', '', 72, 0, '2022-08-04 07:07:48', '2022-08-04 07:07:48'),
(55, 63, '2022-08-04', 15000000.00, 21, 143, '', '', 72, 0, '2022-08-04 07:07:57', '2022-08-04 07:07:57'),
(56, 58, '2022-07-31', 3500000.00, 21, 143, '', '', 72, 0, '2022-08-04 07:10:36', '2022-08-04 07:10:36'),
(57, 58, '2022-07-31', 3500000.00, 21, 143, '', '', 72, 0, '2022-08-04 07:10:36', '2022-08-04 07:10:36'),
(62, 65, '2022-09-14', 6000000.00, 21, 143, '', '', 72, 0, '2022-09-15 03:59:46', '2022-09-15 03:59:46'),
(63, 69, '2022-09-25', 5000000.00, 21, 143, '', '', 72, 0, '2022-09-15 04:05:19', '2022-09-15 04:05:19'),
(64, 72, '2022-09-19', 12000.00, 24, 145, '', '', 77, 0, '2022-09-19 13:48:36', '2022-09-19 13:48:36'),
(66, 75, '2022-09-21', 14800.00, 24, 149, '', '', 77, 0, '2022-09-21 14:23:30', '2022-09-21 14:23:30'),
(67, 105, '2022-09-22', 12000.00, 24, 145, '', '', 77, 0, '2022-09-22 11:01:11', '2022-09-22 11:01:11'),
(68, 104, '2022-09-22', 12000.00, 24, 145, '', '', 77, 0, '2022-09-22 11:03:58', '2022-09-22 11:03:58'),
(69, 103, '2022-09-22', 12000.00, 24, 145, '', '', 77, 0, '2022-09-22 11:04:47', '2022-09-22 11:04:47'),
(70, 102, '2022-09-22', 12000.00, 24, 145, '', '', 77, 0, '2022-09-22 11:05:33', '2022-09-22 11:05:33'),
(71, 101, '2022-09-22', 12000.00, 24, 145, '', '', 77, 0, '2022-09-22 11:06:03', '2022-09-22 11:06:03'),
(72, 100, '2022-09-22', 72000.00, 24, 145, '', '', 77, 0, '2022-09-22 11:06:18', '2022-09-22 11:06:18'),
(73, 99, '2022-09-22', 12000.00, 24, 145, '', '', 77, 0, '2022-09-22 11:06:30', '2022-09-22 11:06:30'),
(74, 98, '2022-09-22', 53600.00, 24, 145, '', '', 77, 0, '2022-09-22 11:06:41', '2022-09-22 11:06:41'),
(75, 97, '2022-09-22', 62800.00, 24, 145, '', '', 77, 0, '2022-09-22 11:06:52', '2022-09-22 11:06:52'),
(76, 96, '2022-09-22', 48000.00, 24, 145, '', '', 77, 0, '2022-09-22 11:07:42', '2022-09-22 11:07:42'),
(77, 95, '2022-09-22', 86000.00, 24, 145, '', '', 77, 0, '2022-09-22 11:08:13', '2022-09-22 11:08:13'),
(78, 94, '2022-09-22', 36000.00, 24, 145, '', '', 77, 0, '2022-09-22 11:08:41', '2022-09-22 11:08:41'),
(79, 93, '2022-09-22', 14800.00, 24, 145, '', '', 77, 0, '2022-09-22 11:08:54', '2022-09-22 11:08:54'),
(80, 92, '2022-09-22', 12000.00, 24, 145, '', '', 77, 0, '2022-09-22 11:09:37', '2022-09-22 11:09:37'),
(81, 91, '2022-09-22', 12000.00, 24, 145, '', '', 77, 0, '2022-09-22 11:09:55', '2022-09-22 11:09:55'),
(82, 90, '2022-09-22', 12000.00, 24, 145, '', '', 77, 0, '2022-09-22 11:10:07', '2022-09-22 11:10:07'),
(83, 89, '2022-09-22', 20000.00, 24, 145, '', '', 77, 0, '2022-09-22 11:10:39', '2022-09-22 11:10:39'),
(84, 88, '2022-09-22', 24000.00, 24, 145, '', '', 77, 0, '2022-09-22 11:11:13', '2022-09-22 11:11:13'),
(85, 74, '2022-09-25', 2500000.00, 21, 143, '', '', 72, 0, '2022-09-25 15:41:30', '2022-09-25 15:41:30'),
(86, 107, '2022-09-26', 3000000.00, 21, 143, '', 'dp pembayaran cv', 72, 0, '2022-09-26 09:29:16', '2022-09-26 09:29:16'),
(88, 109, '2022-10-01', 1500000.00, 21, 143, '', 'pembayaran', 72, 0, '2022-10-01 03:19:58', '2022-10-01 03:19:58'),
(90, 113, '2022-11-05', 2470000.00, 18, 84, '', '', 51, 0, '2022-11-09 20:07:46', '2022-11-09 20:07:46'),
(91, 114, '2022-12-05', 818000.00, 13, 84, 'Bukti Transfer', 'Dibayar pada tanggal 05 Desember 2022 pukul 10:36', 51, 0, '2022-12-05 04:06:18', '2022-12-05 04:06:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_products`
--

CREATE TABLE `invoice_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `tax` double(16,2) NOT NULL DEFAULT 0.00,
  `discount` double(16,2) NOT NULL DEFAULT 0.00,
  `price` double(16,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `invoice_products`
--

INSERT INTO `invoice_products` (`id`, `invoice_id`, `product_id`, `quantity`, `tax`, `discount`, `price`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 1, 0.00, 0.00, 38000.00, '2021-11-07 21:57:28', '2021-11-07 21:57:28'),
(5, 5, 5, 1, 0.00, 0.00, 10000.00, '2021-12-15 14:00:01', '2021-12-15 14:00:01'),
(12, 18, 15, 1, 0.00, 0.00, 890000.00, '2022-03-11 05:48:21', '2022-03-11 05:48:21'),
(16, 21, 14, 1, 0.00, 0.00, 10000.00, '2022-03-18 02:58:40', '2022-03-18 02:58:40'),
(17, 22, 14, 1, 0.00, 0.00, 10000.00, '2022-03-18 03:02:52', '2022-03-18 03:02:52'),
(18, 23, 14, 1, 0.00, 0.00, 10000.00, '2022-03-18 03:08:19', '2022-03-18 03:08:19'),
(19, 24, 14, 1, 0.00, 0.00, 10000.00, '2022-03-18 03:11:42', '2022-03-18 03:11:42'),
(20, 25, 14, 5, 0.00, 0.00, 10000.00, '2022-03-18 03:13:07', '2022-03-18 03:13:07'),
(21, 26, 14, 3, 0.00, 0.00, 10000.00, '2022-03-18 03:30:29', '2022-03-18 03:30:29'),
(22, 27, 4, 1, 0.00, 0.00, 10000.00, '2022-04-11 05:51:38', '2022-04-11 05:51:38'),
(23, 28, 9, 1, 10.00, 0.00, 5000.00, '2022-04-14 06:21:33', '2022-04-14 06:21:33'),
(24, 29, 17, 1, 0.00, 0.00, 100000.00, '2022-04-14 07:23:44', '2022-04-14 07:23:44'),
(25, 30, 17, 2, 0.00, 0.00, 100000.00, '2022-04-26 08:58:48', '2022-04-26 09:37:50'),
(33, 36, 9, 3, 10.00, 0.00, 5000.00, '2022-05-12 05:43:04', '2022-05-12 05:43:04'),
(34, 37, 22, 1, 0.00, 0.00, 10000.00, '2022-05-17 09:44:28', '2022-05-17 09:44:28'),
(35, 38, 22, 1, 0.00, 0.00, 10000.00, '2022-05-17 10:21:13', '2022-05-17 10:21:13'),
(36, 39, 23, 1, 0.00, 2000.00, 5000.00, '2022-05-28 08:24:47', '2022-05-28 08:24:47'),
(46, 43, 29, 1, 0.00, 0.00, 55000.00, '2022-06-16 05:36:25', '2022-06-16 05:36:25'),
(47, 44, 31, 1, 0.00, 1500000.00, 6000000.00, '2022-07-20 04:36:29', '2022-07-20 04:36:29'),
(48, 45, 31, 1, 0.00, 1500000.00, 6000000.00, '2022-07-25 05:30:39', '2022-07-25 05:30:39'),
(49, 46, 31, 1, 0.00, 1500000.00, 6000000.00, '2022-07-25 05:31:33', '2022-07-25 05:31:33'),
(50, 47, 44, 1, 0.00, 500000.00, 6000000.00, '2022-07-25 05:33:42', '2022-07-25 05:35:13'),
(51, 48, 44, 1, 0.00, 0.00, 6000000.00, '2022-07-25 08:52:38', '2022-07-25 08:52:38'),
(52, 49, 31, 1, 0.00, 0.00, 6000000.00, '2022-07-25 08:53:39', '2022-07-25 08:53:39'),
(53, 50, 31, 1, 0.00, 0.00, 6000000.00, '2022-07-25 08:54:27', '2022-08-04 07:07:31'),
(54, 51, 34, 1, 0.00, 1000000.00, 3500000.00, '2022-07-25 08:57:37', '2022-07-25 08:57:37'),
(56, 53, 33, 2, 0.00, 0.00, 300000.00, '2022-07-29 05:47:17', '2022-08-05 15:22:16'),
(57, 53, 32, 2, 0.00, 0.00, 500000.00, '2022-07-29 05:47:17', '2022-08-05 15:22:16'),
(58, 53, 38, 1, 0.00, 0.00, 5000000.00, '2022-07-29 05:47:17', '2022-08-05 15:22:16'),
(59, 53, 50, 2, 0.00, 0.00, 1000000.00, '2022-07-29 05:47:17', '2022-08-05 15:22:16'),
(60, 53, 40, 1, 0.00, 0.00, 1250000.00, '2022-07-29 05:47:17', '2022-08-05 15:22:16'),
(61, 53, 41, 1, 0.00, 0.00, 750000.00, '2022-07-29 05:47:17', '2022-08-05 15:22:16'),
(62, 53, 39, 1, 0.00, 0.00, 250000.00, '2022-07-29 05:47:17', '2022-08-05 15:22:16'),
(63, 54, 56, 1, 0.00, 0.00, 500000.00, '2022-07-29 06:56:23', '2022-08-05 15:24:59'),
(64, 54, 33, 1, 0.00, 0.00, 300000.00, '2022-07-29 06:56:23', '2022-08-05 15:24:59'),
(65, 54, 52, 1, 0.00, 0.00, 1000000.00, '2022-07-29 06:56:23', '2022-08-05 15:24:59'),
(66, 54, 36, 1, 0.00, 0.00, 250000.00, '2022-07-29 06:56:23', '2022-08-05 15:24:59'),
(67, 54, 37, 1, 0.00, 0.00, 250000.00, '2022-07-29 06:56:23', '2022-08-05 15:24:59'),
(68, 54, 38, 1, 0.00, 0.00, 5000000.00, '2022-07-29 06:56:23', '2022-08-05 15:24:59'),
(69, 54, 41, 1, 0.00, 0.00, 750000.00, '2022-07-29 06:56:23', '2022-08-05 15:24:59'),
(70, 54, 39, 1, 0.00, 0.00, 250000.00, '2022-07-29 06:56:23', '2022-08-05 15:24:59'),
(71, 55, 33, 1, 0.00, 0.00, 300000.00, '2022-07-29 07:23:43', '2022-08-05 15:24:24'),
(72, 55, 32, 1, 0.00, 0.00, 500000.00, '2022-07-29 07:23:43', '2022-08-05 15:24:24'),
(73, 55, 40, 1, 0.00, 0.00, 1250000.00, '2022-07-29 07:23:43', '2022-08-05 15:24:24'),
(74, 55, 38, 1, 0.00, 0.00, 5000000.00, '2022-07-29 07:23:43', '2022-08-05 15:24:24'),
(75, 55, 39, 1, 0.00, 0.00, 250000.00, '2022-07-29 07:23:43', '2022-08-05 15:24:24'),
(76, 56, 33, 1, 0.00, 0.00, 300000.00, '2022-07-29 07:26:08', '2022-08-05 15:23:35'),
(77, 56, 56, 1, 0.00, 0.00, 500000.00, '2022-07-29 07:26:08', '2022-08-05 15:23:35'),
(78, 56, 52, 1, 0.00, 0.00, 1000000.00, '2022-07-29 07:26:08', '2022-08-05 15:23:35'),
(79, 56, 40, 1, 0.00, 0.00, 1250000.00, '2022-07-29 07:26:08', '2022-08-05 15:23:35'),
(80, 56, 41, 1, 0.00, 0.00, 750000.00, '2022-07-29 07:26:08', '2022-08-05 15:23:35'),
(81, 56, 38, 1, 0.00, 0.00, 5000000.00, '2022-07-29 07:26:08', '2022-08-05 15:23:35'),
(82, 56, 39, 1, 0.00, 0.00, 250000.00, '2022-07-29 07:26:08', '2022-08-05 15:23:35'),
(83, 56, 55, 1, 0.00, 0.00, 500000.00, '2022-07-29 07:26:08', '2022-08-05 15:23:35'),
(84, 57, 33, 1, 0.00, 0.00, 500000.00, '2022-07-29 07:32:44', '2022-07-29 07:32:44'),
(85, 57, 32, 2, 0.00, 0.00, 500000.00, '2022-07-29 07:32:44', '2022-07-29 07:32:44'),
(86, 57, 36, 1, 0.00, 0.00, 250000.00, '2022-07-29 07:32:44', '2022-07-29 07:32:44'),
(87, 57, 37, 1, 0.00, 0.00, 250000.00, '2022-07-29 07:32:44', '2022-07-29 07:32:44'),
(88, 57, 57, 1, 0.00, 0.00, 250000.00, '2022-07-29 07:32:44', '2022-07-29 07:32:44'),
(89, 57, 38, 1, 0.00, 0.00, 2500000.00, '2022-07-29 07:32:44', '2022-07-29 07:32:44'),
(90, 57, 41, 1, 0.00, 0.00, 750000.00, '2022-07-29 07:32:44', '2022-07-29 07:32:44'),
(91, 57, 39, 1, 0.00, 0.00, 250000.00, '2022-07-29 07:32:44', '2022-07-29 07:32:44'),
(92, 58, 33, 1, 0.00, 0.00, 300000.00, '2022-07-29 07:34:33', '2022-08-04 07:13:04'),
(93, 58, 32, 1, 0.00, 0.00, 500000.00, '2022-07-29 07:34:33', '2022-08-04 07:13:04'),
(94, 58, 36, 1, 0.00, 0.00, 250000.00, '2022-07-29 07:34:33', '2022-08-04 07:13:04'),
(95, 58, 37, 1, 0.00, 0.00, 250000.00, '2022-07-29 07:34:33', '2022-08-04 07:13:04'),
(96, 58, 38, 1, 0.00, 0.00, 5000000.00, '2022-07-29 07:34:33', '2022-08-04 07:13:04'),
(97, 58, 56, 1, 0.00, 0.00, 500000.00, '2022-07-29 07:34:33', '2022-08-04 07:13:04'),
(98, 58, 39, 1, 0.00, 0.00, 250000.00, '2022-07-29 07:34:33', '2022-08-04 07:13:04'),
(99, 59, 33, 1, 0.00, 0.00, 300000.00, '2022-07-29 07:38:31', '2022-08-04 07:11:49'),
(100, 59, 32, 1, 0.00, 0.00, 500000.00, '2022-07-29 07:38:31', '2022-08-04 07:11:49'),
(101, 59, 36, 1, 0.00, 0.00, 250000.00, '2022-07-29 07:38:31', '2022-08-04 07:11:49'),
(102, 59, 37, 1, 0.00, 0.00, 250000.00, '2022-07-29 07:38:31', '2022-08-04 07:11:49'),
(103, 59, 57, 1, 0.00, 0.00, 250000.00, '2022-07-29 07:38:31', '2022-08-04 07:11:49'),
(104, 59, 35, 1, 0.00, 0.00, 1000000.00, '2022-07-29 07:38:31', '2022-08-04 07:11:49'),
(105, 59, 42, 1, 0.00, 0.00, 500000.00, '2022-07-29 07:38:31', '2022-08-04 07:11:49'),
(106, 59, 38, 1, 0.00, 0.00, 5000000.00, '2022-07-29 07:38:31', '2022-08-04 07:11:49'),
(107, 59, 39, 1, 0.00, 0.00, 250000.00, '2022-07-29 07:38:31', '2022-08-04 07:11:49'),
(108, 60, 56, 1, 0.00, 0.00, 500000.00, '2022-07-29 07:42:55', '2022-08-04 07:09:08'),
(109, 60, 33, 1, 0.00, 0.00, 300000.00, '2022-07-29 07:42:55', '2022-08-04 07:09:08'),
(110, 60, 32, 1, 0.00, 0.00, 500000.00, '2022-07-29 07:42:55', '2022-08-04 07:09:08'),
(111, 60, 40, 1, 0.00, 0.00, 1250000.00, '2022-07-29 07:42:55', '2022-08-04 07:09:08'),
(112, 60, 41, 1, 0.00, 0.00, 750000.00, '2022-07-29 07:42:55', '2022-08-04 07:09:08'),
(113, 60, 51, 1, 0.00, 0.00, 15000000.00, '2022-07-29 07:42:55', '2022-08-04 07:09:08'),
(114, 60, 42, 1, 0.00, 0.00, 500000.00, '2022-07-29 07:42:55', '2022-08-04 07:09:08'),
(115, 60, 38, 1, 0.00, 0.00, 5000000.00, '2022-07-29 07:42:55', '2022-08-04 07:09:08'),
(116, 60, 39, 1, 0.00, 0.00, 250000.00, '2022-07-29 07:42:55', '2022-08-04 07:09:08'),
(117, 61, 33, 1, 0.00, 0.00, 300000.00, '2022-07-29 07:44:12', '2022-08-04 07:08:28'),
(118, 61, 52, 1, 0.00, 0.00, 1000000.00, '2022-07-29 07:44:12', '2022-08-04 07:08:28'),
(119, 61, 40, 1, 0.00, 0.00, 1250000.00, '2022-07-29 07:44:12', '2022-08-04 07:08:28'),
(120, 61, 41, 1, 0.00, 0.00, 750000.00, '2022-07-29 07:44:12', '2022-08-04 07:08:28'),
(121, 61, 38, 1, 0.00, 0.00, 5000000.00, '2022-07-29 07:44:12', '2022-08-04 07:08:28'),
(122, 61, 39, 1, 0.00, 0.00, 250000.00, '2022-07-29 07:44:12', '2022-08-04 07:08:28'),
(123, 62, 32, 1, 0.00, 0.00, 500000.00, '2022-07-29 07:47:02', '2022-08-04 07:08:51'),
(124, 62, 56, 1, 0.00, 0.00, 500000.00, '2022-07-29 07:47:02', '2022-08-04 07:08:51'),
(125, 62, 33, 1, 0.00, 0.00, 300000.00, '2022-07-29 07:47:02', '2022-08-04 07:08:51'),
(126, 62, 38, 1, 0.00, 0.00, 5000000.00, '2022-07-29 07:47:02', '2022-08-04 07:08:51'),
(127, 62, 39, 1, 0.00, 0.00, 250000.00, '2022-07-29 07:47:02', '2022-08-04 07:08:51'),
(128, 62, 40, 1, 0.00, 0.00, 1250000.00, '2022-07-29 07:47:02', '2022-08-04 07:08:51'),
(129, 62, 57, 2, 0.00, 0.00, 250000.00, '2022-07-29 07:47:02', '2022-08-04 07:08:51'),
(130, 63, 64, 1, 0.00, 0.00, 15000000.00, '2022-08-03 06:28:37', '2022-08-04 07:08:11'),
(131, 64, 12, 100, 0.00, 500000.00, 30000.00, '2022-08-03 07:53:52', '2022-08-03 07:53:52'),
(132, 65, 44, 1, 0.00, 0.00, 6000000.00, '2022-08-29 04:55:24', '2022-08-29 04:55:24'),
(133, 66, 44, 1, 0.00, 0.00, 5500000.00, '2022-08-29 04:55:59', '2022-09-11 04:33:53'),
(135, 68, 66, 1, 0.00, 0.00, 100000000.00, '2022-09-10 14:43:12', '2022-09-10 14:43:12'),
(136, 69, 67, 1, 0.00, 0.00, 5000000.00, '2022-09-12 12:11:18', '2022-09-12 12:11:18'),
(139, 72, 70, 1, 0.00, 0.00, 12000.00, '2022-09-19 13:47:33', '2022-09-19 13:47:33'),
(140, 73, 70, 5, 0.00, 0.00, 12000.00, '2022-09-19 14:11:44', '2022-09-19 14:11:44'),
(141, 74, 76, 1, 0.00, 0.00, 2500000.00, '2022-09-21 04:04:32', '2022-09-21 04:04:32'),
(142, 75, 71, 1, 0.00, 0.00, 14800.00, '2022-09-21 12:50:23', '2022-09-21 12:50:23'),
(143, 76, 79, 1, 0.00, 0.00, 10000.00, '2022-09-21 14:17:48', '2022-09-21 14:22:45'),
(144, 76, 78, 1, 0.00, 0.00, 10000.00, '2022-09-21 14:17:48', '2022-09-21 14:22:45'),
(145, 76, 81, 1, 0.00, 0.00, 10000.00, '2022-09-21 14:17:48', '2022-09-21 14:22:45'),
(146, 77, 87, 1, 0.00, 0.00, 12000.00, '2022-09-21 14:29:45', '2022-09-21 14:29:45'),
(147, 78, 72, 1, 0.00, 0.00, 12000.00, '2022-09-21 14:35:50', '2022-09-21 14:35:50'),
(148, 79, 71, 1, 0.00, 0.00, 14800.00, '2022-09-21 14:37:19', '2022-09-21 14:37:19'),
(149, 80, 75, 1, 0.00, 10800.00, 12000.00, '2022-09-22 02:08:17', '2022-09-22 02:08:17'),
(150, 81, 70, 1, 0.00, 0.00, 12000.00, '2022-09-22 03:47:40', '2022-09-22 03:47:40'),
(151, 82, 84, 1, 0.00, 0.00, 10000.00, '2022-09-22 03:50:43', '2022-09-22 03:50:43'),
(152, 83, 71, 2, 0.00, 0.00, 14800.00, '2022-09-22 03:53:13', '2022-09-22 03:53:13'),
(153, 84, 72, 1, 0.00, 0.00, 12000.00, '2022-09-22 03:54:23', '2022-09-22 03:54:23'),
(154, 85, 71, 2, 0.00, 13320.00, 14800.00, '2022-09-22 04:09:25', '2022-09-22 04:09:25'),
(155, 86, 71, 2, 0.00, 0.00, 14800.00, '2022-09-22 04:20:34', '2022-09-22 04:20:34'),
(156, 87, 71, 1, 0.00, 0.00, 14800.00, '2022-09-22 04:21:45', '2022-09-22 04:21:45'),
(157, 87, 87, 1, 0.00, 0.00, 12000.00, '2022-09-22 04:21:45', '2022-09-22 04:21:45'),
(158, 88, 70, 2, 0.00, 0.00, 12000.00, '2022-09-22 04:22:21', '2022-09-22 04:22:21'),
(159, 89, 83, 2, 0.00, 0.00, 10000.00, '2022-09-22 05:02:50', '2022-09-22 05:02:50'),
(160, 90, 70, 1, 0.00, 0.00, 12000.00, '2022-09-22 05:18:50', '2022-09-22 05:18:50'),
(161, 91, 70, 1, 0.00, 0.00, 12000.00, '2022-09-22 05:20:03', '2022-09-22 05:20:03'),
(162, 92, 87, 1, 0.00, 0.00, 12000.00, '2022-09-22 05:20:32', '2022-09-22 05:20:32'),
(163, 93, 71, 1, 0.00, 0.00, 14800.00, '2022-09-22 05:49:20', '2022-09-22 05:49:20'),
(164, 94, 87, 2, 0.00, 0.00, 12000.00, '2022-09-22 05:49:52', '2022-09-22 05:49:52'),
(165, 94, 72, 1, 0.00, 0.00, 12000.00, '2022-09-22 05:49:52', '2022-09-22 05:49:52'),
(166, 95, 84, 5, 0.00, 0.00, 10000.00, '2022-09-22 06:56:37', '2022-09-22 06:56:37'),
(167, 95, 70, 3, 0.00, 0.00, 12000.00, '2022-09-22 06:56:37', '2022-09-22 06:56:37'),
(168, 96, 87, 2, 0.00, 0.00, 12000.00, '2022-09-22 06:59:54', '2022-09-22 06:59:54'),
(169, 96, 70, 1, 0.00, 0.00, 12000.00, '2022-09-22 06:59:54', '2022-09-22 06:59:54'),
(170, 96, 72, 1, 0.00, 0.00, 12000.00, '2022-09-22 06:59:54', '2022-09-22 06:59:54'),
(171, 97, 72, 2, 0.00, 0.00, 12000.00, '2022-09-22 09:17:55', '2022-09-22 09:17:55'),
(172, 97, 71, 1, 0.00, 0.00, 14800.00, '2022-09-22 09:17:55', '2022-09-22 09:17:55'),
(173, 97, 70, 1, 0.00, 0.00, 12000.00, '2022-09-22 09:17:55', '2022-09-22 09:17:55'),
(174, 97, 75, 1, 0.00, 0.00, 12000.00, '2022-09-22 09:17:55', '2022-09-22 09:17:55'),
(175, 98, 71, 2, 0.00, 0.00, 14800.00, '2022-09-22 09:18:39', '2022-09-22 09:18:39'),
(176, 98, 72, 1, 0.00, 0.00, 12000.00, '2022-09-22 09:18:39', '2022-09-22 09:18:39'),
(177, 98, 70, 1, 0.00, 0.00, 12000.00, '2022-09-22 09:18:39', '2022-09-22 09:18:39'),
(178, 99, 70, 1, 0.00, 0.00, 12000.00, '2022-09-22 09:19:05', '2022-09-22 09:19:05'),
(179, 100, 70, 3, 0.00, 0.00, 12000.00, '2022-09-22 10:13:21', '2022-09-22 10:13:21'),
(180, 100, 74, 3, 0.00, 0.00, 12000.00, '2022-09-22 10:13:21', '2022-09-22 10:13:21'),
(181, 101, 70, 1, 0.00, 0.00, 12000.00, '2022-09-22 10:19:28', '2022-09-22 10:19:28'),
(182, 102, 70, 1, 0.00, 0.00, 12000.00, '2022-09-22 10:19:56', '2022-09-22 10:19:56'),
(183, 103, 87, 1, 0.00, 0.00, 12000.00, '2022-09-22 10:21:03', '2022-09-22 10:21:03'),
(184, 104, 87, 1, 0.00, 0.00, 12000.00, '2022-09-22 10:38:25', '2022-09-22 10:38:25'),
(185, 105, 87, 1, 0.00, 0.00, 12000.00, '2022-09-22 10:38:43', '2022-09-22 10:38:43'),
(186, 106, 70, 1, 0.00, 0.00, 12000.00, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(187, 106, 71, 1, 0.00, 0.00, 14800.00, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(188, 106, 72, 1, 0.00, 0.00, 12000.00, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(189, 106, 74, 1, 0.00, 0.00, 12000.00, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(190, 106, 75, 1, 0.00, 0.00, 12000.00, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(191, 106, 77, 1, 0.00, 0.00, 10000.00, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(192, 106, 78, 1, 0.00, 0.00, 10000.00, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(193, 106, 79, 1, 0.00, 0.00, 10000.00, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(194, 106, 80, 1, 0.00, 0.00, 10000.00, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(195, 106, 81, 1, 0.00, 0.00, 10000.00, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(196, 106, 82, 1, 0.00, 0.00, 10000.00, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(197, 106, 83, 1, 0.00, 0.00, 10000.00, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(198, 106, 84, 1, 0.00, 0.00, 10000.00, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(199, 106, 85, 1, 0.00, 0.00, 11500.00, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(200, 106, 86, 1, 0.00, 0.00, 11500.00, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(201, 106, 87, 1, 0.00, 0.00, 12000.00, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(202, 106, 88, 6, 0.00, 0.00, 3000.00, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(203, 107, 34, 1, 0.00, 1000000.00, 6000000.00, '2022-09-26 09:23:59', '2022-09-26 09:23:59'),
(204, 108, 33, 1, 0.00, 0.00, 500000.00, '2022-09-27 06:34:40', '2022-09-27 06:34:40'),
(205, 108, 32, 1, 0.00, 0.00, 500000.00, '2022-09-27 06:34:40', '2022-09-27 06:34:40'),
(206, 108, 36, 1, 0.00, 0.00, 250000.00, '2022-09-27 06:34:40', '2022-09-27 06:34:40'),
(207, 108, 37, 1, 0.00, 0.00, 250000.00, '2022-09-27 06:34:40', '2022-09-27 06:34:40'),
(208, 108, 38, 1, 0.00, 0.00, 2500000.00, '2022-09-27 06:34:40', '2022-09-27 06:34:40'),
(209, 108, 41, 1, 0.00, 0.00, 750000.00, '2022-09-27 06:34:40', '2022-09-27 06:34:40'),
(210, 108, 39, 1, 0.00, 0.00, 250000.00, '2022-09-27 06:34:40', '2022-09-27 06:34:40'),
(211, 109, 35, 1, 0.00, 0.00, 1500000.00, '2022-10-01 03:18:19', '2022-10-01 03:18:19'),
(212, 110, 35, 1, 0.00, 0.00, 1500000.00, '2022-10-01 03:18:21', '2022-10-01 03:18:21'),
(213, 111, 8, 1, 10.00, 0.00, 5000.00, '2022-10-04 04:51:17', '2022-10-04 04:51:17'),
(215, 113, 21, 1, 0.00, 0.00, 1230000.00, '2022-11-01 08:37:37', '2022-11-01 08:37:37'),
(216, 113, 21, 1, 0.00, 10000.00, 1250000.00, '2022-11-01 08:37:37', '2022-11-01 08:37:37'),
(217, 114, 21, 1, 0.00, 492000.00, 1240000.00, '2022-12-01 11:48:37', '2022-12-01 11:48:37'),
(218, 114, 89, 7, 0.00, 0.00, 10000.00, '2022-12-01 11:48:37', '2022-12-01 11:48:37'),
(219, 115, 21, 1, 0.00, 180000.00, 1245000.00, '2023-01-02 10:46:00', '2023-01-02 10:46:00'),
(222, 117, 21, 1, 0.00, 0.00, 1065000.00, '2023-02-02 09:28:38', '2023-02-02 09:28:38'),
(223, 117, 21, 1, 0.00, 4000.00, 1192000.00, '2023-02-02 09:28:38', '2023-02-02 09:28:38'),
(224, 118, 90, 2, 0.00, 0.00, 13000.00, '2023-03-01 14:15:14', '2023-03-01 14:15:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `liabilities`
--

CREATE TABLE `liabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `due_date` date NOT NULL,
  `amount` double(16,2) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `liabilities`
--

INSERT INTO `liabilities` (`id`, `name`, `type`, `date`, `due_date`, `amount`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Hutang', 'current liability', '2022-06-23', '2022-12-31', 12000000.00, '', 51, '2022-11-09 19:52:32', '2022-11-09 19:52:32'),
(2, 'Hutang Macbook', 'current liability', '2022-03-28', '2022-12-31', 37000000.00, '', 38, '2022-11-09 21:04:39', '2022-11-09 21:04:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(2, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(3, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(4, '2016_06_01_000004_create_oauth_clients_table', 1),
(5, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(6, '2022_04_27_145401_create_product_service_stock_changes_table', 2),
(7, '2022_04_27_151403_update_product_service_stock_changes_table', 2),
(8, '2022_09_25_215103_add_signature_to_invoice', 3),
(9, '2022_09_25_223955_add_signature_to_bills', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\Customer', 3),
(2, 'App\\Models\\Customer', 4),
(2, 'App\\Models\\Customer', 5),
(2, 'App\\Models\\Customer', 6),
(2, 'App\\Models\\Customer', 7),
(2, 'App\\Models\\Customer', 8),
(2, 'App\\Models\\Customer', 12),
(2, 'App\\Models\\Customer', 13),
(2, 'App\\Models\\Customer', 21),
(2, 'App\\Models\\Customer', 22),
(2, 'App\\Models\\Customer', 23),
(2, 'App\\Models\\Customer', 26),
(2, 'App\\Models\\Customer', 27),
(2, 'App\\Models\\Customer', 28),
(2, 'App\\Models\\Customer', 29),
(2, 'App\\Models\\Customer', 30),
(2, 'App\\Models\\Customer', 31),
(2, 'App\\Models\\Customer', 32),
(2, 'App\\Models\\Customer', 33),
(2, 'App\\Models\\Customer', 34),
(2, 'App\\Models\\Customer', 35),
(2, 'App\\Models\\Customer', 36),
(2, 'App\\Models\\Customer', 37),
(2, 'App\\Models\\Customer', 38),
(2, 'App\\Models\\Customer', 39),
(2, 'App\\Models\\Customer', 40),
(2, 'App\\Models\\Customer', 41),
(2, 'App\\Models\\Customer', 42),
(2, 'App\\Models\\Customer', 43),
(2, 'App\\Models\\Customer', 44),
(2, 'App\\Models\\Customer', 45),
(2, 'App\\Models\\Customer', 46),
(2, 'App\\Models\\Customer', 47),
(2, 'App\\Models\\Customer', 48),
(2, 'App\\Models\\Customer', 49),
(2, 'App\\Models\\Customer', 50),
(2, 'App\\Models\\Customer', 51),
(2, 'App\\Models\\Customer', 52),
(2, 'App\\Models\\Customer', 53),
(2, 'App\\Models\\Customer', 54),
(2, 'App\\Models\\Customer', 55),
(2, 'App\\Models\\Customer', 56),
(2, 'App\\Models\\Customer', 57),
(2, 'App\\Models\\Customer', 58),
(2, 'App\\Models\\Customer', 59),
(2, 'App\\Models\\Customer', 60),
(2, 'App\\Models\\Customer', 61),
(2, 'App\\Models\\Customer', 62),
(2, 'App\\Models\\Customer', 63),
(2, 'App\\Models\\Customer', 64),
(2, 'App\\Models\\Customer', 65),
(2, 'App\\Models\\Customer', 66),
(2, 'App\\Models\\Customer', 67),
(2, 'App\\Models\\Customer', 68),
(2, 'App\\Models\\Customer', 69),
(2, 'App\\Models\\Customer', 70),
(2, 'App\\Models\\Customer', 71),
(2, 'App\\Models\\Customer', 72),
(2, 'App\\Models\\Customer', 73),
(2, 'App\\Models\\Customer', 74),
(2, 'App\\Models\\Customer', 75),
(2, 'App\\Models\\Customer', 76),
(3, 'App\\Models\\Vender', 4),
(3, 'App\\Models\\Vender', 6),
(3, 'App\\Models\\Vender', 7),
(3, 'App\\Models\\Vender', 8),
(3, 'App\\Models\\Vender', 9),
(3, 'App\\Models\\Vender', 10),
(3, 'App\\Models\\Vender', 11),
(3, 'App\\Models\\Vender', 12),
(3, 'App\\Models\\Vender', 13),
(3, 'App\\Models\\Vender', 14),
(3, 'App\\Models\\Vender', 15),
(3, 'App\\Models\\Vender', 17),
(4, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 19),
(4, 'App\\Models\\User', 20),
(4, 'App\\Models\\User', 21),
(4, 'App\\Models\\User', 22),
(4, 'App\\Models\\User', 23),
(4, 'App\\Models\\User', 24),
(4, 'App\\Models\\User', 25),
(4, 'App\\Models\\User', 26),
(4, 'App\\Models\\User', 27),
(4, 'App\\Models\\User', 28),
(4, 'App\\Models\\User', 29),
(4, 'App\\Models\\User', 30),
(4, 'App\\Models\\User', 31),
(4, 'App\\Models\\User', 32),
(4, 'App\\Models\\User', 33),
(4, 'App\\Models\\User', 34),
(4, 'App\\Models\\User', 35),
(4, 'App\\Models\\User', 36),
(4, 'App\\Models\\User', 37),
(4, 'App\\Models\\User', 38),
(4, 'App\\Models\\User', 39),
(4, 'App\\Models\\User', 40),
(4, 'App\\Models\\User', 41),
(4, 'App\\Models\\User', 42),
(4, 'App\\Models\\User', 43),
(4, 'App\\Models\\User', 44),
(4, 'App\\Models\\User', 45),
(4, 'App\\Models\\User', 46),
(4, 'App\\Models\\User', 47),
(4, 'App\\Models\\User', 48),
(4, 'App\\Models\\User', 49),
(4, 'App\\Models\\User', 50),
(4, 'App\\Models\\User', 51),
(4, 'App\\Models\\User', 54),
(4, 'App\\Models\\User', 55),
(4, 'App\\Models\\User', 56),
(4, 'App\\Models\\User', 58),
(4, 'App\\Models\\User', 59),
(4, 'App\\Models\\User', 60),
(4, 'App\\Models\\User', 61),
(4, 'App\\Models\\User', 62),
(4, 'App\\Models\\User', 63),
(4, 'App\\Models\\User', 64),
(4, 'App\\Models\\User', 65),
(4, 'App\\Models\\User', 66),
(4, 'App\\Models\\User', 67),
(4, 'App\\Models\\User', 68),
(4, 'App\\Models\\User', 69),
(4, 'App\\Models\\User', 70),
(4, 'App\\Models\\User', 71),
(4, 'App\\Models\\User', 72),
(4, 'App\\Models\\User', 75),
(4, 'App\\Models\\User', 76),
(4, 'App\\Models\\User', 77),
(4, 'App\\Models\\User', 81),
(4, 'App\\Models\\User', 83),
(4, 'App\\Models\\User', 84),
(4, 'App\\Models\\User', 85),
(4, 'App\\Models\\User', 86),
(7, 'App\\Models\\User', 52),
(12, 'App\\Models\\User', 57),
(13, 'App\\Models\\User', 73),
(14, 'App\\Models\\User', 82);

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('041b3b8609ddf92c33d4343108bfdddfddda0c8003efa8121b3f964bada24cfac7d9e838bcf80975', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 13:36:09', '2022-03-17 13:36:09', '2023-03-17 20:36:09'),
('05874c4f8f08d7893057a7bfb05c3e2eb2409b8696c437b767f5dcc89c4308cfb9409ef633fec75a', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-18 01:57:00', '2022-03-18 01:57:00', '2023-03-18 08:57:00'),
('0850e2286b2d60e64405009e590cc15209bc8fe0937e4ec74af617a3dc0b312e02eee212f7f75866', 50, 1, 'KazhierPAC', '[]', 0, '2022-05-17 09:37:29', '2022-05-17 09:37:29', '2023-05-17 16:37:29'),
('0b8f38456a05065b4456f9e9602b382ff5e3d9770063d1f0a259466e7c3c6888550d0b7bb24af86d', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 11:41:57', '2022-03-17 11:41:57', '2023-03-17 18:41:57'),
('0ba836274ef30c0d33c81815f5eb4703996467cf20021d2ed9da0e49e672d018a8e66e22dea25b42', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 17:34:35', '2022-03-17 17:34:35', '2023-03-18 00:34:35'),
('0ce8eb75dbfa85ec1e2e59b33841a5cb0b33ccfc1a46a3a93adda8d5b348c2c91944b7a466a4edae', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 11:41:21', '2022-03-17 11:41:21', '2023-03-17 18:41:21'),
('105039af99575cfaea2d18dd8b1b78ff37903f9b06362b83e645a3f92b98eaa17eea8a42871d5a74', 27, 1, 'Kazhier Personal Access Client', '[]', 0, '2022-01-04 10:24:50', '2022-01-04 10:24:50', '2023-01-04 17:24:50'),
('114e553f7a2f9f0a49f088c1facf3ab0c139dd7a1c4f2648b5228a2071c826e583afdaebfa99d8a8', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-16 15:58:59', '2022-03-16 15:58:59', '2023-03-16 22:58:59'),
('116bcc976b83efdd30553b33c43d6c01946263a5f5e648a5a487f45b7ab9ada614255c6c1a793035', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 04:00:07', '2022-03-17 04:00:07', '2023-03-17 11:00:07'),
('147e5122b6df888541697c266bd56e7952bc4a2ef96079210c83b7c94e197b031c2468b43ad80e95', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-16 15:57:31', '2022-03-16 15:57:31', '2023-03-16 22:57:31'),
('14ae0563e9db2b482c2093d05ae2fb7e5f70bf6592826ca0c7a8eed456a91ebc33718c4f2dddef2d', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 17:21:01', '2022-03-17 17:21:01', '2023-03-18 00:21:01'),
('159b3582c9328fe21ccbc76859c0e536110c531a5350e42d4ef031337ac483a0f52091af6ca65176', 40, 1, 'KazhierPAC', '[]', 0, '2022-03-15 17:09:46', '2022-03-15 17:09:46', '2023-03-16 00:09:46'),
('1dece36aa3f4f297cf3220fe4b7839ff783a883db2046ccb2c6c285e74284f7fd9e0b9738a5f5ae2', 40, 1, 'KazhierPAC', '[]', 0, '2022-03-16 02:19:58', '2022-03-16 02:19:58', '2023-03-16 09:19:58'),
('1e3fad355b4a00dd072cd433bf47d68ac264582cd61a967b7610e0e0a54492cfeb314f901864b87e', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 11:40:45', '2022-03-17 11:40:45', '2023-03-17 18:40:45'),
('1f7c548a873b22d850d7dba7bdb18a770b35870e989690e1ea933ac7cca0804e36a16808f0c34e6e', 50, 1, 'KazhierPAC', '[]', 0, '2022-05-17 10:17:36', '2022-05-17 10:17:36', '2023-05-17 17:17:36'),
('20a0657a7b6dd7029b9ec4b1ae6bd71fef6ff4b91582e8dcaef64d6535044bbcae151e7196b4a3a5', 40, 1, 'KazhierPAC', '[]', 0, '2022-03-16 04:39:59', '2022-03-16 04:39:59', '2023-03-16 11:39:59'),
('2211542959cefba1582c860e956401f280cb6f0c715cb265c1ca29a63eeef0ac5c041bf094e5737d', 51, 1, 'KazhierPAC', '[]', 0, '2022-06-10 12:56:07', '2022-06-10 12:56:07', '2023-06-10 19:56:07'),
('2711c61a698277d27e75cca778898ba99de929abf63f567135d4956b09903eef492965df61c64684', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 05:48:08', '2022-03-17 05:48:08', '2023-03-17 12:48:08'),
('271be79f62b0cb88728de316486ee6e19683296d5edb8fddf313637edb0bc807bcf4cbd906d934cd', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 11:41:50', '2022-03-17 11:41:50', '2023-03-17 18:41:50'),
('274b4c26fcbbbf2d72e82daecf47b190fa5eb11afcc9f7a8f6556554d8295e90c1fd33036fabbe95', 50, 1, 'KazhierPAC', '[]', 0, '2022-05-13 02:47:22', '2022-05-13 02:47:22', '2023-05-13 09:47:22'),
('2cbe8249944b0c4c8972aef4752c482a41fced3c5afb339c4e3ef918047bb1705d1e322769fdc913', 40, 1, 'KazhierPAC', '[]', 0, '2022-03-16 02:43:59', '2022-03-16 02:43:59', '2023-03-16 09:43:59'),
('2e56acc6a4876eb81821f07378a34cd14331404f01f058dcd6d3b0e8d254e7b4388ea561037081b8', 27, 1, 'KazhierPAC', '[]', 0, '2022-03-17 02:48:17', '2022-03-17 02:48:17', '2023-03-17 09:48:17'),
('2ee398666e54d6dd75207e5fef658507b73ad5cacfda346452f3c4bc5ec1aad5299249ac7aebe745', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 16:58:00', '2022-03-17 16:58:00', '2023-03-17 23:58:00'),
('319fb31548cbcd6d7aa1379152fcc26ec9dfcd8a58a5eb8a6e8ced8d9ec4d3b14f0395b3fc431702', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 11:41:26', '2022-03-17 11:41:26', '2023-03-17 18:41:26'),
('31cd84c8d3d5095404856b117be0fe76b6072ba2bc2a1f6df6aeafadc966c9001c32183f644d8317', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 13:04:39', '2022-03-17 13:04:39', '2023-03-17 20:04:39'),
('37cb69f40720ec1dcccd604cdf4d7e53208b22efb03e4ba421d9f75b59e979cfaf5e22468d96268a', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 12:25:58', '2022-03-17 12:25:58', '2023-03-17 19:25:58'),
('3b4f43e3bba6579fcb642f874169febb9f2af611f34e8c2730eadaa5137036489fa7788a40cc816e', 40, 1, 'KazhierPAC', '[]', 0, '2022-03-15 17:08:28', '2022-03-15 17:08:28', '2023-03-16 00:08:28'),
('3bd035d997d264459f111a702f62ab5189b8826246f2bbbb4eb77bde09c0341952dcf5ec71fc68c8', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-16 15:55:39', '2022-03-16 15:55:39', '2023-03-16 22:55:39'),
('3d77fbfc0a87d828cc1f7c836b0ba4f6a738b516829bbe882d20ccf4bbc7262a30ea03c9d948fd02', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-18 02:12:18', '2022-03-18 02:12:18', '2023-03-18 09:12:18'),
('3e788c6f4caf82b5b250263c49a71decb144e043536db47878edf5fe0eaf19d16530b6cd1835816a', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 11:51:05', '2022-03-17 11:51:05', '2023-03-17 18:51:05'),
('3e9d920e9b0f5e0f4d306381a5180f2afb7723cde6a5ac3de8564b79197e5798ee0db7350ea03adb', 40, 1, 'KazhierPAC', '[]', 0, '2022-03-16 05:33:29', '2022-03-16 05:33:29', '2023-03-16 12:33:29'),
('3f24aad5b03f2ae73bd888552fe99d6771b92c124731f3288808a52000695ff353cc62b910f0ada8', 51, 1, 'KazhierPAC', '[]', 0, '2022-06-10 12:55:31', '2022-06-10 12:55:31', '2023-06-10 19:55:31'),
('41159ab7e66dc57e436022da1c0e7c403f773bc7b128ceec0a247614f9cec3ca6038900e1235a6a9', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-18 03:30:11', '2022-03-18 03:30:11', '2023-03-18 10:30:11'),
('4151c34666cc8d34b5e965faeddadd64d31bcbccc3648f276af2eeaaa45aac73f4919dafe04179e3', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 05:55:10', '2022-03-17 05:55:10', '2023-03-17 12:55:10'),
('41e0663f341036954e09bd835f08ec991b169f99b25f88d4ccd6ca18431e838e33f9d1826b47daaa', 50, 1, 'KazhierPAC', '[]', 0, '2022-05-17 10:18:12', '2022-05-17 10:18:12', '2023-05-17 17:18:12'),
('44eaefa3f536164fb12aeabac8d629827a85b9030b0cbbbbd348ae6df9effe1937d2e73fce8df9e0', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-16 10:21:28', '2022-03-16 10:21:28', '2023-03-16 17:21:28'),
('49dbac72bb5e390db66c92c711ecca8c24c6076c612fb12a0b0d51dbeb3ebeef04e01842b009b1e0', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 16:58:50', '2022-03-17 16:58:50', '2023-03-17 23:58:50'),
('4aea91da36c91ec2dd4b043c73109d6d4e9d15bc1733e7f94b526efa32c236f57b8cf7b35ddd9511', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 13:00:46', '2022-03-17 13:00:46', '2023-03-17 20:00:46'),
('4fbab558ecb5b3506b09e0c1a8bd6dfbcfd1efa515743a227a1cc464a3abd3720e72f4838a58c370', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 11:40:59', '2022-03-17 11:40:59', '2023-03-17 18:40:59'),
('50ec9fef7c8f7f5b8dd14afaf71cd85f32f8dbe5dbe426d9b2701674de84846f446854d2990202b3', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 07:05:48', '2022-03-17 07:05:48', '2023-03-17 14:05:48'),
('53ba9ff42b770e1db0ad3ef778509b58d7e9647571821698aff7d1ed155bba3e0ccf4b140db625a6', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 02:19:17', '2022-03-17 02:19:17', '2023-03-17 09:19:17'),
('549aad68609d1b1e3bd8625e549b9cff59eb566ffe979e340bc9593cefe1afe1a996fd510387729a', 50, 1, 'KazhierPAC', '[]', 0, '2022-05-17 10:25:01', '2022-05-17 10:25:01', '2023-05-17 17:25:01'),
('55fe29d31e27b5bc5312c01d6e80e0e87bb5600427611b6fcde08feff8a90b6105f51ea0c915dc62', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-16 05:46:33', '2022-03-16 05:46:33', '2023-03-16 12:46:33'),
('5c3f14fbe59d5139dab8ce8734f8a4247e40839e6057d59e734b5d9e32d2279b11375dcb6e0106f4', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 11:43:32', '2022-03-17 11:43:32', '2023-03-17 18:43:32'),
('5c6f53c9abcbfa994133d53499eeba409bc6fd0b9bc4a60e502e0c574ab9b7153b8b0f168bd10307', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 05:54:09', '2022-03-17 05:54:09', '2023-03-17 12:54:09'),
('62b8ec69c87c5a77233332e14db8c44df09799f415dba0286d2a9d3b65d2a58fbe5cef71cee6e573', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 12:59:33', '2022-03-17 12:59:33', '2023-03-17 19:59:33'),
('632bf6c04bb401e34514755606b8216c7043837d4f22d74d8d05524eb236dae62a97668a09946dfd', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 05:36:35', '2022-03-17 05:36:35', '2023-03-17 12:36:35'),
('6a46b466e14fa307dbff038d069815fd1e46cdd9a737561673969573b4bbe94f5cc270579648495d', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 12:45:04', '2022-03-17 12:45:04', '2023-03-17 19:45:04'),
('6b42f836634ad82502202733ee86079a06a1fc1e05cc8e01219f1dcbdc05be09ce72ca1fd07d7c2e', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-16 05:57:34', '2022-03-16 05:57:34', '2023-03-16 12:57:34'),
('6dd65fd43f18c36b279e18280a0eebdc2dbc9424e33cf77da20d12ef49da7a598495c6bac4e5fc4e', 40, 1, 'KazhierPAC', '[]', 0, '2022-03-15 17:09:28', '2022-03-15 17:09:28', '2023-03-16 00:09:28'),
('72f138246da2b03f69667d78776cc23f23017022638d231dd4f1edf4fe051985e063f8885a74739f', 27, 1, 'KazhierPAC', '[]', 0, '2022-03-17 02:51:00', '2022-03-17 02:51:00', '2023-03-17 09:51:00'),
('777d554cec18a785ce4b40963920a7eedbfb44e7a7bc282ff02fdfd83e746be19caaeea8db9f582c', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 19:04:34', '2022-03-17 19:04:34', '2023-03-18 02:04:34'),
('7b40cc00624b87c7e8cdf2ea430cc9e19c6973491f0955f8c91ba9fbeee5d889284a3712ce107e46', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 13:35:23', '2022-03-17 13:35:23', '2023-03-17 20:35:23'),
('7c71a6358c214cbf9789a2daabc7239b7b6018014fb846c36a2cb3f71bde376a8c1b68ed2fa49194', 50, 1, 'KazhierPAC', '[]', 0, '2022-05-17 10:23:14', '2022-05-17 10:23:14', '2023-05-17 17:23:14'),
('7e97bbfe751206a760ba381396285f536f84c0bed43b5468c0dc9ac516f905d640bb1c3d2ba6ad49', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 08:47:44', '2022-03-17 08:47:44', '2023-03-17 15:47:44'),
('855af223d170962c2471062a03147ca213569f2611263e576d0cc035adf1f7ccd2fffdc2d20d4172', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 18:23:09', '2022-03-17 18:23:09', '2023-03-18 01:23:09'),
('8823d1fc1794b9b13b7de7fdeedc821a88c71ed06cd467fe68759d8e1a82e631013f9c9961ea27c2', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-18 01:56:13', '2022-03-18 01:56:13', '2023-03-18 08:56:13'),
('8a0c0bba677d3c2bedecde029528260fb43cc204c13192034bfa6f0612e3fe9b7fcda42fc9256a77', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-16 23:44:57', '2022-03-16 23:44:57', '2023-03-17 06:44:57'),
('8c927c36a3fb74f7f484e0bf62e44f388cdf46bf129705dc6f00f16cf11ff5f37f3dde0a5a2397ac', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 05:25:02', '2022-03-17 05:25:02', '2023-03-17 12:25:02'),
('8d5f73ec93dcf7558be3b447cc0bdd9c51b0c38259fbc7914a6023f1290f05564a5576c334f845aa', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-16 10:07:20', '2022-03-16 10:07:20', '2023-03-16 17:07:20'),
('8ef278da9a9cc37e2b599b7efcc1e72af187b470e9b155359edb08bc3b36d071ec9bbc258cccfee5', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-16 15:21:55', '2022-03-16 15:21:55', '2023-03-16 22:21:55'),
('8fec5b2b92924040ad4f1fa4ee0516881a651863fb3f72487fddbaf56a1a1dd6f68c134191dda46e', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-16 10:10:31', '2022-03-16 10:10:31', '2023-03-16 17:10:31'),
('913098cfe47c0fdf02595aad70fcb8a6336134c2131b05b625ae309fdfe902cb8f1e41907ad25ba3', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 17:08:09', '2022-03-17 17:08:09', '2023-03-18 00:08:09'),
('9160e95f12af24f8fa58b74035e54c592dc81613943d687fd05ba97985e8d3e1c69904f68bf0b9e7', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-18 02:07:18', '2022-03-18 02:07:18', '2023-03-18 09:07:18'),
('93ea6b40325b04f6362bb799dd7a598cf967779ddeb868f9c9af89536d2fbddabc03dc99da466626', 40, 1, 'KazhierPAC', '[]', 0, '2022-03-16 05:16:17', '2022-03-16 05:16:17', '2023-03-16 12:16:17'),
('94a1148c92c24765c202c72f85892de39b81e1486d7c6492b2b65c55a1e84e5f704723205a7a2c22', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-16 10:08:41', '2022-03-16 10:08:41', '2023-03-16 17:08:41'),
('954ac38661be31f01343ac5972003cb5ca8e804ae2a06d1d0f8d339105b72f185cd925f3a4858cc1', 40, 1, 'KazhierPAC', '[]', 0, '2022-03-16 04:42:15', '2022-03-16 04:42:15', '2023-03-16 11:42:15'),
('95d929fdb2fa4b99938b317a9d044498a862100b12518ceeedcc3bb59c283cb7fb27276c820f3d72', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-16 10:09:45', '2022-03-16 10:09:45', '2023-03-16 17:09:45'),
('99c834c60e2ae53fdbfdff180b661eedd67f860694c7050171bc971cb0ab489a7726fa9d8099e692', 40, 1, 'KazhierPAC', '[]', 0, '2022-03-16 05:11:53', '2022-03-16 05:11:53', '2023-03-16 12:11:53'),
('99f94d0d0b55fa3f1ef27681bee3085991bbe7f315e6bf57bc413414daa9a29d9c84913ff555134b', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-16 15:56:40', '2022-03-16 15:56:40', '2023-03-16 22:56:40'),
('a104e9c0535225d8adc9335a75fcb7aaffad1c360eb23c602a3b2bb5ffc17788eec07c3772e210f0', 40, 1, 'KazhierPAC', '[]', 0, '2022-03-16 02:13:37', '2022-03-16 02:13:37', '2023-03-16 09:13:37'),
('a45c1d7496dcf06c811498a6ce1e2b07545051b944ee75e14820925c5da009b46c600cbca95c1e67', 40, 1, 'KazhierPAC', '[]', 0, '2022-03-16 05:09:40', '2022-03-16 05:09:40', '2023-03-16 12:09:40'),
('a5fe325217cb07df198015a910606a11c7d596fca6508c42439f970cc846e3073639605638b75bad', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 06:27:27', '2022-03-17 06:27:27', '2023-03-17 13:27:27'),
('a71c03bd66af42aea38fbf2feb93f896e5fe63b9a89869c7d86d4e51b6e16ede0a0f10c969f54c10', 40, 1, 'KazhierPAC', '[]', 0, '2022-03-16 02:16:48', '2022-03-16 02:16:48', '2023-03-16 09:16:48'),
('a7ab3f3ad6ee8746131f3cf4949eda3b89a71aa7759cbd6ccb9203da1aabfb8c3f95507376946cc1', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 19:01:33', '2022-03-17 19:01:33', '2023-03-18 02:01:33'),
('a98fb9c5ee2bafb2b631af23901830c14993c52acd1aa572009fc473a18e583a61ffb07fa970e93f', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 05:55:01', '2022-03-17 05:55:01', '2023-03-17 12:55:01'),
('aae906856839eb40931801da111a2fc3625761a8e45d910c6567e03b2871a3062f0b38a3c80bb1bf', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-18 01:55:00', '2022-03-18 01:55:00', '2023-03-18 08:55:00'),
('abe198635797dad6f61c056283c363880490ceca3430eb36a05c387c0b2b205bedea75c89ae3ce3e', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-16 23:46:38', '2022-03-16 23:46:38', '2023-03-17 06:46:38'),
('adc311dc41883cc6fa07093e10b36e7262b37b29305c848d749a9c66e1715a074a8a442a40f253ce', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 13:34:19', '2022-03-17 13:34:19', '2023-03-17 20:34:19'),
('b12ad742294f610f77dbfa7d123b84dd22b58a01fec5230a1930935fe67bf0fe0c0867e65929a57a', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-16 23:47:43', '2022-03-16 23:47:43', '2023-03-17 06:47:43'),
('b3b0a0ab80b7c23e0804ff62525454c1e201ff6998b1a5027aec9cf8538da0640aa473e268c94149', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-18 03:12:53', '2022-03-18 03:12:53', '2023-03-18 10:12:53'),
('b5062b5a55d314499f31f3042e8d15061e7640d6e17a89775ada9f42c55b094b925791689b1bfceb', 40, 1, 'KazhierPAC', '[]', 0, '2022-03-16 02:18:30', '2022-03-16 02:18:30', '2023-03-16 09:18:30'),
('b56bc173070b3dfaffae584e29439b0d7c7ba50717b20fa1208f4f5e3814f60c56faa64bfc87fb88', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 07:18:46', '2022-03-17 07:18:46', '2023-03-17 14:18:46'),
('be041354b6565a1924866b026cb0ec66a7e1e355c8feee43482b1bc5d9d6a10f0bcff851508ff6c1', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-18 03:10:01', '2022-03-18 03:10:01', '2023-03-18 10:10:01'),
('c44378fb83754684ec06a4bf7c2bd2cdb63129b39cc95bc9631ffa3bce5d0006c7cf869acb9201c4', 40, 1, 'KazhierPAC', '[]', 0, '2022-03-16 03:09:31', '2022-03-16 03:09:31', '2023-03-16 10:09:31'),
('c760be35ab1558e746ecaff3d14f26f018e28da6d86a2437403a2e3c23083c272c7510ebafc75f93', 40, 1, 'KazhierPAC', '[]', 0, '2022-03-16 05:57:03', '2022-03-16 05:57:03', '2023-03-16 12:57:03'),
('c8589316afa471d760253c8bd2764856cf7ada762fbcbad629987d1f7ec92284a5c5619124281993', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-18 03:08:07', '2022-03-18 03:08:07', '2023-03-18 10:08:07'),
('cc63ca698658244a9eecd32225928552714ea83b5bc605f4afbd6b38e5013c25dd24f0965e805443', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 07:08:26', '2022-03-17 07:08:26', '2023-03-17 14:08:26'),
('cefaebe568190a6cebac8054155b846e5e24ad462aaf15cc04f52c67b41154275044c5e6b5eb1060', 50, 1, 'KazhierPAC', '[]', 0, '2022-05-17 09:43:29', '2022-05-17 09:43:29', '2023-05-17 16:43:29'),
('cfa2c27ccd62934d7efd6c51e12810d3f6999ba6d66089660a5a245821d7a9e6f8367fa50e652aeb', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-16 10:09:10', '2022-03-16 10:09:10', '2023-03-16 17:09:10'),
('d233a80749e7537591f0055b06d6cb3c03e79131731039c9ef6f5dd68467617b2d6f69280188724f', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 18:24:16', '2022-03-17 18:24:16', '2023-03-18 01:24:16'),
('d4e7d78c6cc1e7578848a0fdd55af50ff2bc1cd54afe7e5ba29a0aa0ef02b18689bfe6d3093c2cc2', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 11:43:50', '2022-03-17 11:43:50', '2023-03-17 18:43:50'),
('d50d201084b8a77dee2e84691b0ab3f7688ea9ec14e3924425603ceea7f58287ea4829bd53508c1b', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 05:46:16', '2022-03-17 05:46:16', '2023-03-17 12:46:16'),
('d53e7115a6b71b80405ff61178c2a941a5818ff68185036bbcd08c3396b731ec8e15706fd8835a68', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 03:59:09', '2022-03-17 03:59:09', '2023-03-17 10:59:09'),
('d847741d553886ff5e6dd67cabc7b5143b3bfe56b9bb9ce627d1e088d9d1c4f6d7f3a8b1b1af2522', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 11:37:08', '2022-03-17 11:37:08', '2023-03-17 18:37:08'),
('dadb2acefb63f3d9ffd6d9cca2b99e263ade6dd8c0f6210fc897e70f66e68e5195168ab48d593d1e', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 19:06:19', '2022-03-17 19:06:19', '2023-03-18 02:06:19'),
('dc358af0b5765f337ca5cd65b264d6d0d6d7b294bb8568b90ca075dde5b3abebebb3a342bbafdb01', 50, 1, 'KazhierPAC', '[]', 0, '2022-05-17 10:25:56', '2022-05-17 10:25:56', '2023-05-17 17:25:56'),
('df51f8cce4945c2eb5fbe7faea7044fb98fff7c94f37a8fac6416766b026aa5d08723d87eb6ea43a', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 05:30:24', '2022-03-17 05:30:24', '2023-03-17 12:30:24'),
('e037415de5d5f1a55f4dce5aee2641bdc869ecac794ef820ad336cf2f7a9994bf62cb326658edd99', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 13:00:36', '2022-03-17 13:00:36', '2023-03-17 20:00:36'),
('e0b85b5caae9aa204e525b168b7aeb94037f106a077960c44ee118f72681ce039f4c5ce825e24638', 40, 1, 'KazhierPAC', '[]', 0, '2022-03-15 16:40:29', '2022-03-15 16:40:29', '2023-03-15 23:40:29'),
('e268714819547918b738850626c25f0d98350156f2a2ab12061a1b4cb56216c93500b66236a86861', 40, 1, 'KazhierPAC', '[]', 0, '2022-03-16 01:45:44', '2022-03-16 01:45:44', '2023-03-16 08:45:44'),
('e43235931c90f2dc319f2e851805b1bd58d1fce4768b0d6f580e79eaee56ec76aca6bfa1059c1bb4', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 04:54:36', '2022-03-17 04:54:36', '2023-03-17 11:54:36'),
('e69a9c7960ec66efd1db016ab541859f6aebb09f6abd96ed437369d432cc0dc82daaf537175c6cd9', 40, 1, 'KazhierPAC', '[]', 0, '2022-03-16 02:07:37', '2022-03-16 02:07:37', '2023-03-16 09:07:37'),
('e7a3d01f7f398c2138f6f1c5baa9e80513362d1cce1b4e920a68e6f2cc25bd585c83a9c5426f84b9', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 05:23:22', '2022-03-17 05:23:22', '2023-03-17 12:23:22'),
('e7a43d4d08b6ae539a1d0952763afc849fb1e4a8c2238233d19ae8654cc7be277b5b63177fff3598', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 11:53:07', '2022-03-17 11:53:07', '2023-03-17 18:53:07'),
('e85fb0b34db82c95a2e2840899335c69811775751b2df7beddb70e7a85635e4c0c6242f35fde191d', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 07:21:44', '2022-03-17 07:21:44', '2023-03-17 14:21:44'),
('e8d1d2e03b9b4347de3eaa04cccf481f095d306f7ca26e88667e7c93a70751d6f402cfe2157a05ef', 51, 1, 'KazhierPAC', '[]', 0, '2022-06-10 13:00:42', '2022-06-10 13:00:42', '2023-06-10 20:00:42'),
('ea5bb6e6a47ac98f4acac9bdc533175881c1ca161f9032522e73e350aafccf219fd022e73fbda8d0', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 11:50:45', '2022-03-17 11:50:45', '2023-03-17 18:50:45'),
('eca26b21cc09d5a3769e1dbddcea4df3ed96ddfddea8cd61352c541f12458e205544ff96a9b8aee0', 40, 1, 'KazhierPAC', '[]', 0, '2022-03-16 04:46:08', '2022-03-16 04:46:08', '2023-03-16 11:46:08'),
('ee08e0d712f6036f39c2fdc4b7f8e4b7360188faf607109c3f2ef04f49c70a5aa1313d34273de261', 40, 1, 'KazhierPAC', '[]', 0, '2022-03-15 17:09:32', '2022-03-15 17:09:32', '2023-03-16 00:09:32'),
('f3fddf4297e0e7fc8cbc5045df16625af909fe6b466709550eeed4ebc379cc390f432552761ba6d4', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 11:36:12', '2022-03-17 11:36:12', '2023-03-17 18:36:12'),
('f4c47adce44a887d6175ee74800dbfca3ca49c3129b2c47e63c440f6c1df7d6fc34587c52dcdffdf', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-18 01:54:11', '2022-03-18 01:54:11', '2023-03-18 08:54:11'),
('f903f4cfd2ffa657436d0eaff63c5a7c991008d52dbb5082c9c80dc5d56dfda05b41523518534dc4', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-17 11:43:43', '2022-03-17 11:43:43', '2023-03-17 18:43:43'),
('fcf0d90d19074ca56d88401a19657daaee0b94d75e10537337cf5ae41bc28bda76df345c5617422f', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-16 15:32:55', '2022-03-16 15:32:55', '2023-03-16 22:32:55'),
('ff868dc06679748947423d518f46364c203759c2a2663b24317f5634f13fbeaef6cc22d4332634db', 41, 1, 'KazhierPAC', '[]', 0, '2022-03-16 15:52:14', '2022-03-16 15:52:14', '2023-03-16 22:52:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(191) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Kazhier Personal Access Client', '1mWXND4QC49rj0pvagRi1ksK5mHTDHCwEqmUUE2h', NULL, 'http://localhost', 1, 0, 0, '2022-01-03 10:47:23', '2022-01-03 10:47:23'),
(2, NULL, 'Kazhier Password Grant Client', 'OlbVobepk7rr66mzm0Kgpncovfm5mhTDcAThnQ46', 'users', 'http://localhost', 0, 1, 0, '2022-01-03 10:47:23', '2022-01-03 10:47:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-01-03 10:47:23', '2022-01-03 10:47:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `card_number` varchar(10) DEFAULT NULL,
  `card_exp_month` varchar(10) DEFAULT NULL,
  `card_exp_year` varchar(10) DEFAULT NULL,
  `plan_name` varchar(100) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `price` double(16,2) NOT NULL,
  `duration` int(11) NOT NULL DEFAULT 1,
  `price_currency` varchar(10) NOT NULL DEFAULT 'IDR',
  `txn_id` varchar(100) DEFAULT NULL,
  `payment_status` varchar(100) NOT NULL,
  `receipt` varchar(191) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `name`, `email`, `card_number`, `card_exp_month`, `card_exp_year`, `plan_name`, `plan_id`, `price`, `duration`, `price_currency`, `txn_id`, `payment_status`, `receipt`, `user_id`, `created_at`, `updated_at`) VALUES
(26, '/INV/20220307/PYM/19203727', 'D\' Test', NULL, NULL, NULL, NULL, 'Enterprise', 4, 1794000.00, 6, 'IDR', NULL, 'pending', NULL, 27, '2022-03-07 12:20:37', '2022-03-07 12:20:37'),
(27, '/INV/20220316/PYM/00531638', 'TIN', NULL, NULL, NULL, NULL, 'Premium', 2, 1188000.00, 12, 'IDR', NULL, 'pending', NULL, 38, '2022-03-15 17:53:16', '2022-03-15 17:53:16'),
(28, '/INV/20220329/PYM/01024827', 'D\' Test', NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', NULL, 'pending', NULL, 27, '2022-03-28 18:02:48', '2022-03-28 18:02:48'),
(29, '/INV/20220329/PYM/17061638', 'TIN', NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', NULL, 'pending', NULL, 38, '2022-03-29 10:06:16', '2022-03-29 10:06:16'),
(30, '/INV/20220329/PYM/20514546', 'Arda', NULL, NULL, NULL, NULL, 'Premium', 2, 89100.00, 1, 'IDR', NULL, 'SUCCESS', NULL, 46, '2022-03-29 13:51:45', '2022-03-29 13:54:45'),
(41, '/INV/20220329/PYM/22194227', 'D\' Test', NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', NULL, 'EXPIRED', NULL, 27, '2022-03-29 15:19:42', '2022-03-30 15:20:45'),
(42, '/INV/20220329/PYM/22492544', 'Dlo Spam Referral', NULL, NULL, NULL, NULL, 'Premium', 2, 89100.00, 1, 'IDR', NULL, 'SUCCESS', 'https://app.midtrans.com/snap/v1/transactions/63c9adec-c047-4d1a-9c01-b8d5c77fa73f/pdf', 44, '2022-03-29 15:49:25', '2022-03-29 15:49:59'),
(43, '/INV/20220414/PYM/14275551', 'Kejar Tayang', NULL, NULL, NULL, NULL, 'Premium', 2, 89100.00, 1, 'IDR', NULL, 'EXPIRED', NULL, 51, '2022-04-14 07:27:55', '2022-04-15 07:28:06'),
(44, '/INV/20220414/PYM/14294451', 'Kejar Tayang', NULL, NULL, NULL, NULL, 'Premium', 2, 89100.00, 1, 'IDR', NULL, 'pending', NULL, 51, '2022-04-14 07:29:44', '2022-04-14 07:29:44'),
(45, '/INV/20220420/PYM/14130138', 'TIN', NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', NULL, 'pending', NULL, 38, '2022-04-20 07:13:01', '2022-04-20 07:13:01'),
(46, '/INV/20220426/PYM/09235738', 'TIN', NULL, NULL, NULL, NULL, 'Premium', 2, 1188000.00, 12, 'IDR', NULL, 'EXPIRED', NULL, 38, '2022-04-26 02:23:57', '2022-04-27 02:24:09'),
(47, '62A9D65C7338A987486267', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 38, '2022-06-15 12:53:48', '2022-06-15 12:53:48'),
(48, '62A9D66F652AB353249702', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 38, '2022-06-15 12:54:07', '2022-06-15 12:54:07'),
(49, '62E263384041B536600696', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 20, '2022-07-28 10:21:44', '2022-07-28 10:21:44'),
(50, '62E2634553063876491158', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 20, '2022-07-28 10:21:57', '2022-07-28 10:21:57'),
(51, '62E2634E29766188015796', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 20, '2022-07-28 10:22:06', '2022-07-28 10:22:06'),
(52, '62E2635534406359286437', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 20, '2022-07-28 10:22:13', '2022-07-28 10:22:13'),
(53, '62E2640BC3AAD955478483', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 51, '2022-07-28 10:25:15', '2022-07-28 10:25:15'),
(54, '62E2769090BEF669808969', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 24, '2022-07-28 11:44:16', '2022-07-28 11:44:16'),
(55, '62E2799FB9F77486983605', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 72, '2022-07-28 11:57:19', '2022-07-28 11:57:19'),
(56, '/INV/20220731/PYM/11421138', 'TIN', NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', NULL, 'EXPIRED', NULL, 38, '2022-07-31 04:42:11', '2022-07-31 04:57:47'),
(57, '/INV/20220804/PYM/12282672', 'Kantor notaris Ajeng Tri Anindita,S.H.,M.Kn', NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', NULL, 'pending', NULL, 72, '2022-08-04 05:28:26', '2022-08-04 05:28:26'),
(58, '/INV/20220804/PYM/12293072', 'Kantor notaris Ajeng Tri Anindita,S.H.,M.Kn', NULL, NULL, NULL, NULL, 'Premium', 2, 1188000.00, 12, 'IDR', NULL, 'pending', NULL, 72, '2022-08-04 05:29:30', '2022-08-04 05:29:30'),
(59, '/INV/20220818/PYM/18475251', 'Kejar Tayang', NULL, NULL, NULL, NULL, 'Premium', 2, 89100.00, 1, 'IDR', NULL, 'EXPIRED', NULL, 51, '2022-08-18 11:47:52', '2022-08-19 11:48:06'),
(60, '630F0175561CC182535092', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 38, '2022-08-31 06:36:37', '2022-08-31 06:36:37'),
(61, '/INV/20220905/PYM/14293538', 'TIN', NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', NULL, 'pending', NULL, 38, '2022-09-05 07:29:35', '2022-09-05 07:29:35'),
(62, '/INV/20220919/PYM/20343277', 'Dyah ayu', NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', NULL, 'EXPIRED', NULL, 77, '2022-09-19 13:34:32', '2022-09-20 13:34:48'),
(63, '/INV/20220919/PYM/20351077', 'Dyah ayu', NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', NULL, 'EXPIRED', NULL, 77, '2022-09-19 13:35:10', '2022-09-20 13:35:25'),
(64, '633A8BFADC02F493791236', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 38, '2022-10-03 07:15:06', '2022-10-03 07:15:06'),
(65, '/INV/20221006/PYM/19394338', 'TIN', NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', NULL, 'EXPIRED', NULL, 38, '2022-10-06 12:39:43', '2022-10-07 13:03:24'),
(66, '6344FA032B34F936210169', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 51, '2022-10-11 05:07:15', '2022-10-11 05:07:15'),
(67, '636C0C2FD9573768680266', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 38, '2022-11-09 20:23:11', '2022-11-09 20:23:11'),
(68, '6371E7CA2A445318159914', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 51, '2022-11-14 07:01:30', '2022-11-14 07:01:30'),
(69, '6371E7D735646030828201', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 51, '2022-11-14 07:01:43', '2022-11-14 07:01:43'),
(70, '/INV/20221124/PYM/1422442', 'company', NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', NULL, 'pending', NULL, 2, '2022-11-24 07:22:44', '2022-11-24 07:22:44'),
(71, '/INV/20221205/PYM/20213138', 'TIN', NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', NULL, 'pending', NULL, 38, '2022-12-05 13:21:31', '2022-12-05 13:21:31'),
(72, '6396E87E3C36E859938251', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 38, '2022-12-12 08:38:22', '2022-12-12 08:38:22'),
(73, '639B0831CBC25720746178', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 56, '2022-12-15 11:42:41', '2022-12-15 11:42:41'),
(74, '63B2D74E756EE036189569', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 83, '2023-01-02 13:08:30', '2023-01-02 13:08:30'),
(75, '63B2D752642F8072368994', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 83, '2023-01-02 13:08:34', '2023-01-02 13:08:34'),
(76, '63DB6310AEA68916592367', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 20, '2023-02-02 07:15:28', '2023-02-02 07:15:28'),
(77, '63DB63142386E837165242', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 20, '2023-02-02 07:15:32', '2023-02-02 07:15:32'),
(78, '63DB7F3203E15385523937', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 51, '2023-02-02 09:15:30', '2023-02-02 09:15:30'),
(79, '63DB7F35B32C4558933824', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 51, '2023-02-02 09:15:33', '2023-02-02 09:15:33'),
(80, '63E27C659CD81686074018', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 84, '2023-02-07 16:29:25', '2023-02-07 16:29:25'),
(81, '63E27C6953107040798174', NULL, NULL, NULL, NULL, NULL, 'Premium', 2, 99000.00, 1, 'IDR', '', 'succeeded', NULL, 84, '2023-02-07 16:29:29', '2023-02-07 16:29:29'),
(82, '63F05F868C17F367961407', NULL, NULL, NULL, NULL, NULL, 'Enterprise', 4, 299000.00, 1, 'IDR', '', 'succeeded', NULL, 2, '2023-02-18 05:17:58', '2023-02-18 05:17:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('Megaintanpermata68@gmail.com', '$2y$10$/0J2cUBLqzWg8QOEmTWzUOwie9Ttws/kcPbX68h/wzhh3MI18pB36', '2022-04-16 01:40:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` double(16,2) NOT NULL DEFAULT 0.00,
  `account_id` int(11) NOT NULL,
  `vender_id` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `recurring` varchar(191) DEFAULT NULL,
  `payment_method` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL DEFAULT 'nofile.svg',
  `created_by` int(11) NOT NULL DEFAULT 0,
  `served_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id`, `date`, `amount`, `account_id`, `vender_id`, `description`, `category_id`, `recurring`, `payment_method`, `reference`, `created_by`, `served_by`, `created_at`, `updated_at`) VALUES
(1, '2021-03-02', 4000000.00, 1, 0, 'Beli Persil', 3, NULL, 2, 'nofile.svg', 19, 0, '2021-07-22 00:12:52', '2021-07-22 00:12:52'),
(2, '2021-04-01', 386000.00, 1, 0, 'Obat rumput dan buruh', 4, NULL, 2, 'nofile.svg', 19, 0, '2021-07-22 00:21:07', '2021-07-22 00:21:07'),
(3, '2021-04-12', 320000.00, 1, 0, 'pupuk dan buruh', 4, NULL, 2, 'nofile.svg', 19, 0, '2021-07-22 00:25:11', '2021-07-22 00:25:11'),
(4, '2021-04-13', 129000.00, 1, 0, 'Pajak Tanah', 5, NULL, 2, 'nofile.svg', 19, 0, '2021-07-22 00:25:59', '2021-07-22 00:25:59'),
(5, '2021-06-26', 995000.00, 1, 0, 'Tanam jagung', 8, NULL, 2, 'nofile.svg', 19, 0, '2021-07-22 00:45:40', '2021-07-22 00:45:40'),
(6, '2021-06-29', 320000.00, 1, 0, 'pupuk dan buruh', 8, NULL, 2, 'nofile.svg', 19, 0, '2021-07-22 00:47:59', '2021-07-22 00:47:59'),
(7, '2021-07-01', 320000.00, 1, 0, 'pupuk dan buruh', 8, NULL, 2, 'nofile.svg', 19, 0, '2021-07-22 00:50:42', '2021-07-22 00:50:42'),
(8, '2021-07-06', 7500000.00, 2, 0, 'Gaji tim', 11, NULL, 3, 'nofile.svg', 20, 0, '2021-07-24 09:34:36', '2021-07-24 09:34:36'),
(9, '2021-07-25', 816000.00, 1, 0, 'paralon sumur', 3, NULL, 1, 'nofile.svg', 19, 0, '2021-07-27 21:55:12', '2021-07-27 21:55:12'),
(10, '2021-07-25', 340000.00, 1, 0, 'mengairi jagung', 8, NULL, 1, 'nofile.svg', 19, 0, '2021-07-27 22:00:55', '2021-07-27 22:00:55'),
(11, '2021-07-26', 4500000.00, 1, 0, 'pembayaran sumur', 3, NULL, 1, 'nofile.svg', 19, 0, '2021-07-27 22:02:54', '2021-07-27 22:02:54'),
(12, '2021-08-01', 7500000.00, 2, 0, '', 11, NULL, 3, 'nofile.svg', 20, 0, '2021-08-23 21:31:12', '2021-08-23 21:31:12'),
(13, '2021-08-14', 1000000.00, 2, 0, 'Transport', 17, NULL, 3, 'nofile.svg', 20, 0, '2021-08-23 21:40:26', '2021-08-23 21:40:26'),
(14, '2021-08-14', 586000.00, 2, 0, 'Villa', 17, NULL, 3, '20_P_61247af77eb88_Screen Shot 2021-08-24 at 11.51.32.png', 20, 0, '2021-08-23 21:52:07', '2021-08-23 21:52:07'),
(16, '2021-08-14', 530000.00, 2, 0, 'Konsumsi', 17, NULL, 3, 'nofile.svg', 20, 0, '2021-08-23 22:46:25', '2021-08-23 22:46:25'),
(17, '2021-08-22', 208000.00, 3, 0, '', 19, NULL, 5, 'nofile.svg', 21, 0, '2021-08-24 04:35:09', '2021-08-24 04:35:09'),
(18, '2021-08-22', 100000.00, 3, 0, '', 16, NULL, 5, 'nofile.svg', 21, 0, '2021-08-24 04:35:37', '2021-08-24 04:35:37'),
(19, '2021-10-02', 8900000.00, 2, 0, '', 11, NULL, 3, 'nofile.svg', 20, 0, '2021-10-20 11:12:34', '2021-10-20 11:12:34'),
(20, '2021-09-01', 7150000.00, 2, 0, '', 11, NULL, 3, 'nofile.svg', 20, 0, '2021-10-20 11:16:26', '2021-10-20 11:16:26'),
(21, '2021-11-08', 25000.00, 4, 1, '', 38, NULL, 15, 'nofile.svg', 26, 0, '2021-11-07 22:09:31', '2021-11-07 22:09:31'),
(23, '2021-11-05', 1700000.00, 2, 0, '', 39, NULL, 3, 'nofile.svg', 20, 0, '2021-11-09 12:41:54', '2021-11-09 12:41:54'),
(24, '2021-11-02', 9000000.00, 2, 0, '', 11, NULL, 3, 'nofile.svg', 20, 0, '2021-11-09 13:25:46', '2021-11-09 13:25:46'),
(25, '2021-11-04', 295000.00, 2, 0, 'hotel dan snack', 17, NULL, 3, 'nofile.svg', 20, 0, '2021-11-09 13:58:24', '2021-11-09 13:58:24'),
(26, '2021-09-25', 1000000.00, 2, 0, 'Transport', 17, NULL, 3, 'nofile.svg', 20, 0, '2021-11-09 14:07:39', '2021-11-09 14:07:39'),
(27, '2021-08-25', 232200.00, 2, 0, 'Course Udemy', 22, NULL, 3, 'nofile.svg', 20, 0, '2021-11-09 14:19:25', '2021-11-09 14:19:25'),
(28, '2021-11-12', 5000.00, 5, NULL, 'Beli minum', 49, NULL, 17, 'nofile.svg', 27, 0, '2021-11-12 00:10:10', '2022-01-20 17:38:33'),
(31, '2022-02-22', 208000.00, 10, NULL, 'Beli 104 Kartu', 181, NULL, 54, 'nofile.svg', 38, 0, '2022-03-13 16:04:34', '2022-03-13 16:04:34'),
(32, '2022-03-09', 14500.00, 10, NULL, 'Cetak stiker', 181, NULL, 53, 'ccf6d7958ba65b50485cfb42db6ef3f5.jpg', 38, 0, '2022-03-13 18:11:39', '2022-03-13 18:18:39'),
(33, '2022-02-22', 9500.00, 10, NULL, 'Cetak stiker', 181, NULL, 53, 'f49bbf11a5f941e89b5c0312926fff6a.jpg', 38, 0, '2022-03-13 18:15:23', '2022-03-13 18:15:23'),
(34, '2022-02-22', 85500.00, 10, NULL, 'Cetak stiker', 181, NULL, 53, '7627bd90fe9e57a0b88b3a0314104ccb.jpg', 38, 0, '2022-03-13 18:16:45', '2022-03-13 18:16:45'),
(35, '2022-03-15', 127416.00, 10, NULL, 'Domain suksesptn.com', 179, NULL, 54, 'c2abf49d8fd85a690a735861919a8d1c.png', 38, 0, '2022-03-15 17:10:31', '2022-03-15 17:10:31'),
(36, '2022-03-15', 369203.00, 10, NULL, 'Akun Play Store', 179, NULL, 54, 'e5fd249830fde46f6a2ae678a5224beb.png', 38, 0, '2022-03-15 17:12:52', '2022-03-15 17:12:52'),
(37, '2022-03-29', 62500.00, 10, NULL, 'Beli Charger', 181, NULL, 53, 'a5784171b3ff015a5106d5c49821c6c0.png', 38, 0, '2022-04-09 15:40:17', '2022-04-09 15:40:17'),
(38, '2022-01-03', 65000.00, 15, 5, 'Tomat 10kg', 290, NULL, 18, 'nofile.svg', 27, 0, '2022-04-15 07:34:51', '2022-04-15 07:34:51'),
(39, '2021-12-08', 65000.00, 15, 5, 'Tomat 10kg', 290, NULL, 18, 'nofile.svg', 27, 0, '2022-04-15 07:34:51', '2022-04-15 07:34:51'),
(40, '2021-12-12', 65000.00, 15, 5, 'Tomat 10kg', 290, NULL, 18, 'nofile.svg', 27, 0, '2022-04-15 07:34:51', '2022-04-15 07:34:51'),
(41, '2021-12-02', 65000.00, 15, 5, 'Tomat 10kg', 290, NULL, 18, 'nofile.svg', 27, 0, '2022-04-15 07:34:51', '2022-04-15 07:34:51'),
(42, '2021-12-01', 65000.00, 15, 5, 'Tomat 10kg', 290, NULL, 18, 'nofile.svg', 27, 0, '2022-04-15 07:34:51', '2022-04-15 07:34:51'),
(43, '2021-12-20', 65000.00, 15, 5, 'Tomat 10kg', 290, NULL, 18, 'nofile.svg', 27, 0, '2022-04-15 07:34:51', '2022-04-15 07:34:51'),
(44, '2022-04-14', 244204.00, 10, NULL, 'domain nahini', 179, NULL, 54, '5b32f7f40323e18a55160bd25f9b6247.png', 38, 0, '2022-04-17 19:02:28', '2022-04-17 19:02:28'),
(45, '2022-04-14', 116625.00, 10, NULL, 'domain niatngaji', 179, NULL, 54, '89ba01090fa332cc2e604879b414658b.png', 38, 0, '2022-04-17 19:03:46', '2022-04-17 19:03:46'),
(46, '2022-04-18', 227637.00, 10, NULL, 'domain goquran', 179, NULL, 54, '8c8cec40bd04c2b83346a14f923f517b.png', 38, 0, '2022-04-17 19:04:51', '2022-04-17 19:04:51'),
(47, '2022-07-01', 50000.00, 22, NULL, 'minum mobil', 540, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 06:02:25', '2022-07-25 06:02:54'),
(48, '2022-07-04', 20000.00, 22, NULL, 'bensin seminar', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 06:06:35', '2022-07-25 06:06:35'),
(49, '2022-07-04', 6000.00, 22, NULL, 'prkir', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 06:07:27', '2022-07-25 06:07:27'),
(50, '2022-07-05', 20000.00, 22, NULL, 'bensin bpn', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 06:08:23', '2022-07-25 06:08:23'),
(51, '2022-07-05', 13000.00, 22, NULL, 'Kantor Pos + Parkir', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 06:09:46', '2022-07-25 06:09:46'),
(52, '2022-07-05', 3000.00, 22, NULL, 'CD PT', 541, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 06:10:38', '2022-07-25 06:10:38'),
(53, '2022-07-06', 400000.00, 22, NULL, 'Bayar Nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 06:15:34', '2022-07-25 06:32:39'),
(54, '2022-07-06', 50000.00, 22, NULL, 'checking Izzudin', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 06:27:45', '2022-07-25 06:51:19'),
(55, '2022-07-06', 200000.00, 22, NULL, 'bayar Nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 06:29:06', '2022-07-25 06:29:06'),
(56, '2022-07-07', 50000.00, 22, NULL, 'SPS checking Nur', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 06:32:14', '2022-07-25 06:50:34'),
(57, '2022-07-07', 51000.00, 22, NULL, 'SPS Checking Heny', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 06:33:37', '2022-07-25 06:50:48'),
(58, '2022-07-07', 20000.00, 22, NULL, 'Bensin BPN', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 06:34:43', '2022-07-25 06:34:43'),
(59, '2022-07-07', 20000.00, 22, NULL, 'bensin bpn', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 06:36:33', '2022-07-25 06:36:33'),
(60, '2022-07-07', 100000.00, 22, NULL, 'Dana bpn', 543, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 06:37:10', '2022-07-25 06:38:10'),
(61, '2022-07-07', 600000.00, 22, NULL, 'uang Checking Mas Rohman', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 06:39:13', '2022-07-25 06:51:07'),
(62, '2022-07-11', 36000.00, 22, NULL, 'uang yakult', 540, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 06:40:24', '2022-07-25 06:40:24'),
(63, '2022-07-11', 200000.00, 22, NULL, 'bpn Nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 06:41:17', '2022-07-25 06:41:17'),
(64, '2022-07-11', 51000.00, 22, NULL, 'checking sps Samuel', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 06:42:10', '2022-07-25 06:50:19'),
(65, '2022-07-11', 20000.00, 22, NULL, 'bensin bpn', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 06:42:45', '2022-07-25 06:42:45'),
(66, '2022-07-11', 30000.00, 22, NULL, 'Blanko Bpn', 544, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 06:47:29', '2022-07-25 06:47:29'),
(67, '2022-07-11', 150000.00, 22, NULL, 'voucher CV', 545, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 06:52:35', '2022-07-25 06:52:35'),
(68, '2022-07-12', 20000.00, 22, NULL, 'bensin Bpn', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 06:54:50', '2022-07-25 06:54:50'),
(69, '2022-07-12', 20000.00, 22, NULL, 'bensin Bfi', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 06:55:33', '2022-07-25 06:55:33'),
(70, '2022-07-13', 24000.00, 22, NULL, 'bensin Bpn', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 06:56:16', '2022-07-25 06:58:06'),
(71, '2022-07-13', 30000.00, 22, NULL, 'Blanko', 544, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 06:59:13', '2022-07-25 06:59:13'),
(72, '2022-07-14', 51000.00, 22, NULL, 'sps skpt samuel', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 07:00:24', '2022-07-25 07:00:24'),
(73, '2022-07-14', 105000.00, 22, NULL, 'isi tinta', 541, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 07:01:25', '2022-07-25 07:01:25'),
(74, '2022-07-15', 40000.00, 22, NULL, 'kresek 2 buat sampah', 541, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 07:09:26', '2022-07-25 07:09:26'),
(75, '2022-07-15', 200000.00, 22, NULL, 'uang bpn nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 07:10:08', '2022-07-25 07:10:08'),
(76, '2022-07-15', 50000.00, 22, NULL, 'sps checking Eny', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 07:10:48', '2022-07-25 07:10:48'),
(77, '2022-07-15', 200000.00, 22, NULL, 'sps HT Djuariyah', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 07:17:16', '2022-07-25 07:17:16'),
(78, '2022-07-15', 50000.00, 22, NULL, 'sps HT Bambang', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 07:17:58', '2022-07-25 07:17:58'),
(79, '2022-07-15', 200000.00, 22, NULL, 'sps HT Yamin', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 07:18:26', '2022-07-25 07:18:26'),
(80, '2022-07-15', 250000.00, 22, NULL, 'uang Kelurahan', 543, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 07:19:35', '2022-07-25 07:19:35'),
(81, '2022-07-15', 42000.00, 22, NULL, 'bensing surabaya sidorjo', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 07:20:11', '2022-07-25 07:20:11'),
(82, '2022-07-18', 51000.00, 22, NULL, 'sps checking titut', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 07:21:02', '2022-07-25 07:21:02'),
(83, '2022-07-18', 22000.00, 22, NULL, 'bensin kelurahan dan parkir bensin', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 07:21:54', '2022-07-25 07:21:54'),
(84, '2022-07-18', 62000.00, 22, NULL, 'bufalo', 541, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 07:22:47', '2022-07-25 07:22:47'),
(85, '2022-07-18', 200000.00, 22, NULL, 'sps edwin', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 07:23:16', '2022-07-25 07:23:16'),
(86, '2022-07-18', 20000.00, 22, NULL, 'bensin salma', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 07:23:58', '2022-07-25 07:23:58'),
(87, '2022-07-18', 20000.00, 22, NULL, 'bensin Bpn', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 07:24:36', '2022-07-25 07:24:36'),
(88, '2022-07-18', 20000.00, 22, NULL, 'bensin Bfi', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 07:25:03', '2022-07-25 07:25:03'),
(89, '2022-07-18', 50000.00, 22, NULL, 'kembalian PBB', 530, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 07:25:57', '2022-07-25 07:25:57'),
(90, '2022-07-19', 50000.00, 22, NULL, 'sps checking akman', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 07:33:59', '2022-07-25 07:33:59'),
(91, '2022-07-19', 200000.00, 22, NULL, 'mbak nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 07:34:30', '2022-07-25 07:34:30'),
(92, '2022-07-19', 50000.00, 22, NULL, 'sps checking titut', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 07:35:19', '2022-07-25 07:35:19'),
(93, '2022-07-19', 200000.00, 22, NULL, 'mbak nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 07:36:11', '2022-07-25 07:36:11'),
(94, '2022-07-20', 200000.00, 22, NULL, 'bayar HT eny', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 07:38:57', '2022-07-25 07:38:57'),
(95, '2022-07-20', 22000.00, 22, NULL, 'bensin BFI dan parkir', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 07:39:32', '2022-07-25 07:39:32'),
(96, '2022-07-20', 100000.00, 22, NULL, 'buat nambahin uang Wahjoe pph', 530, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 07:40:09', '2022-07-25 07:40:09'),
(97, '2022-07-20', 250000.00, 22, NULL, 'uang sanksi laporan', 543, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 07:41:46', '2022-07-25 07:41:46'),
(98, '2022-07-20', 50000.00, 22, NULL, 'sps checking theresa', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 07:43:04', '2022-07-25 07:43:04'),
(99, '2022-07-20', 2500000.00, 22, NULL, 'sps HT Titut', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 07:45:07', '2022-07-25 07:45:07'),
(100, '2022-07-20', 50000.00, 22, NULL, 'sps checking joice', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 07:46:10', '2022-07-25 07:46:10'),
(101, '2022-07-20', 400000.00, 22, NULL, 'bayar nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 07:47:05', '2022-07-25 07:47:05'),
(102, '2022-07-21', 50000.00, 22, NULL, 'checking Rohmania', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 07:47:58', '2022-07-25 07:47:58'),
(103, '2022-07-20', 3000.00, 22, NULL, 'parkir polsek', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 07:48:56', '2022-07-25 07:48:56'),
(104, '2022-07-21', 50000.00, 22, NULL, 'sps Roya', 545, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 07:49:52', '2022-07-25 07:49:52'),
(105, '2022-07-21', 50000.00, 22, NULL, 'masukno roya', 543, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 07:50:27', '2022-07-25 07:50:27'),
(106, '2022-07-21', 23000.00, 22, NULL, 'bensin bpn dan parkir', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 07:51:01', '2022-07-25 07:51:01'),
(107, '2022-07-21', 200000.00, 22, NULL, 'sps HT Joice', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 07:51:28', '2022-07-25 07:51:28'),
(108, '2022-07-25', 50000.00, 22, NULL, 'sps ramelan lagi checking', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-25 07:52:13', '2022-07-25 07:52:13'),
(109, '2022-07-25', 105000.00, 22, NULL, 'isi tinta canon', 541, NULL, 144, 'nofile.svg', 72, 0, '2022-07-25 07:53:47', '2022-07-25 07:53:47'),
(110, '2022-07-25', 50000.00, 22, NULL, 'Sps Cheking sby2', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-29 07:56:19', '2022-07-29 07:56:19'),
(111, '2022-07-26', 51000.00, 22, NULL, 'cheking Supardi', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-29 07:57:08', '2022-07-29 07:57:08'),
(112, '2022-07-26', 150000.00, 22, NULL, 'Transfer Sella', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-07-29 07:58:35', '2022-07-29 07:58:35'),
(113, '2022-07-26', 40000.00, 22, NULL, 'Bensin Bpn + blanko Bpn', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-07-29 08:00:31', '2022-07-29 08:00:31'),
(114, '2022-07-27', 41000.00, 22, NULL, 'Uang Gojek Kirim berkas Kepak Ferry', 533, NULL, 144, 'nofile.svg', 72, 0, '2022-07-29 08:01:38', '2022-07-29 08:01:38'),
(115, '2022-07-27', 51000.00, 22, NULL, 'cheking Idjoh II', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-29 08:02:22', '2022-07-29 08:02:22'),
(116, '2022-07-27', 156500.00, 22, NULL, 'Transfer ke Sella + Admin Bank', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-07-29 08:02:51', '2022-07-29 08:10:32'),
(117, '2022-07-27', 2500000.00, 22, NULL, 'sps HT THERESA', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-29 08:06:46', '2022-07-29 08:06:46'),
(118, '2022-07-27', 20000.00, 22, NULL, 'Bensin BFi', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-07-29 08:07:21', '2022-07-29 08:07:21'),
(119, '2022-07-28', 30000.00, 22, NULL, 'Uang Kembalian Materai dari Bfi', 534, NULL, 144, 'nofile.svg', 72, 0, '2022-07-29 08:11:49', '2022-07-29 08:11:49'),
(120, '2022-07-28', 63000.00, 22, NULL, 'Beli Yakult', 540, NULL, 144, 'nofile.svg', 72, 0, '2022-07-29 08:12:41', '2022-07-29 08:12:41'),
(121, '2022-07-28', 50000.00, 22, NULL, 'Cheking Haris', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-07-29 08:13:47', '2022-07-29 08:13:47'),
(122, '2022-07-28', 20000.00, 22, NULL, 'Bensin BFi', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-07-29 08:14:13', '2022-07-29 08:14:13'),
(123, '2022-07-29', 8680000.00, 21, NULL, 'Gaji pegawai', 535, NULL, 144, 'nofile.svg', 72, 0, '2022-08-01 09:32:53', '2022-08-01 09:32:53'),
(125, '2022-07-31', 55000000.00, 21, 9, 'Seharusnya bayar 3 tahun langsung tapi tahun kedua dibayar 1 februari 2023 tahun ke tiga bayar 1 Agustus 2023', 548, NULL, 143, 'nofile.svg', 72, 0, '2022-08-02 14:31:44', '2022-08-02 14:32:34'),
(126, '2022-07-31', 500000.00, 21, NULL, '', 547, NULL, 143, 'nofile.svg', 72, 0, '2022-08-02 14:39:24', '2022-08-02 14:39:24'),
(127, '2022-07-31', 5500000.00, 21, 8, 'Design Kantor ruang design', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-08-03 06:20:24', '2022-08-03 06:20:24'),
(128, '2022-07-31', 450000.00, 21, 8, 'benerin bocor kamar madni ruko', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-08-03 06:21:05', '2022-08-03 06:21:05'),
(129, '2022-07-11', 5000000.00, 21, 8, 'biaya renovasi', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-08-03 06:23:05', '2022-08-03 06:23:05'),
(130, '2022-07-13', 750000.00, 21, 8, 'Renovasi Ruko', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-08-03 06:23:58', '2022-08-03 06:23:58'),
(132, '2022-08-01', 1000000.00, 22, NULL, 'beli materai', 541, NULL, 144, 'nofile.svg', 72, 0, '2022-08-04 07:36:33', '2022-08-04 07:36:33'),
(133, '2022-08-01', 26500.00, 22, NULL, 'kirim pos malang, mojokerto, kpp', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-08-04 07:40:38', '2022-08-04 07:40:38'),
(134, '2022-08-01', 51000.00, 22, NULL, 'cheking wahjoe', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-04 07:41:12', '2022-08-04 07:41:12'),
(135, '2022-08-01', 20000.00, 22, NULL, 'bensin bfi', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-08-04 07:41:46', '2022-08-04 07:41:46'),
(136, '2022-08-01', 40000.00, 22, NULL, 'bensin bfi dan polres', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-08-04 07:42:30', '2022-08-04 07:42:30'),
(137, '2022-08-01', 5000.00, 22, NULL, 'parkir pos dan bfi', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-08-04 07:43:02', '2022-08-04 07:43:02'),
(138, '2022-08-01', 50000.00, 22, NULL, 'ngasih kelurahan', 543, NULL, 144, 'nofile.svg', 72, 0, '2022-08-04 07:44:05', '2022-08-04 07:44:05'),
(139, '2022-08-01', 3000.00, 22, NULL, 'parkir polres', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-08-04 07:44:33', '2022-08-04 07:44:33'),
(140, '2022-08-01', 150000.00, 22, NULL, 'transfer ke mbak sella', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-08-04 07:45:33', '2022-08-04 07:45:33'),
(141, '2022-08-01', 52900.00, 22, NULL, 'uang beli ATK', 547, NULL, 144, 'nofile.svg', 72, 0, '2022-08-04 07:47:08', '2022-08-04 07:47:08'),
(142, '2022-08-01', 50000.00, 22, NULL, 'cheking aminah', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-04 07:47:34', '2022-08-04 07:47:34'),
(143, '2022-08-01', 20000.00, 22, NULL, 'bensin bpn', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-08-04 07:48:05', '2022-08-04 07:48:05'),
(144, '2022-08-01', 22000.00, 22, NULL, 'parkir dan bensin beli ATK', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-08-04 07:48:45', '2022-08-04 07:48:45'),
(145, '2022-08-01', 22000.00, 22, NULL, 'bensin dan parkir bfi  waru', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-08-04 07:49:18', '2022-08-04 07:49:18'),
(146, '2022-08-04', 20000.00, 22, NULL, 'bensin salma bpn', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-08-04 07:51:18', '2022-08-04 07:51:18'),
(147, '2022-08-04', 20000.00, 22, NULL, 'bensin jimerto mengurus pbb haris', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-08-04 07:56:34', '2022-08-04 07:56:34'),
(148, '2022-08-04', 50000.00, 22, NULL, 'salam tempel peningkatan izzudin', 543, NULL, 144, 'nofile.svg', 72, 0, '2022-08-04 07:57:32', '2022-08-04 07:57:32'),
(150, '2022-08-04', 200000.00, 22, NULL, 'sps HT ramelan', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-08 12:28:50', '2022-08-08 12:28:50'),
(151, '2022-08-04', 50000.00, 22, NULL, 'sps peningkatan', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-08 12:29:50', '2022-08-08 12:29:50'),
(152, '2022-08-04', 50000.00, 22, NULL, 'sps mettasari peningkatan', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-08 12:30:29', '2022-09-20 08:17:31'),
(153, '2022-08-04', 20000.00, 22, NULL, 'bensin bfi sby1', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-08-08 12:50:34', '2022-08-08 12:50:34'),
(154, '2022-08-05', 260000.00, 22, NULL, 'beli tinta brother 2', 541, NULL, 144, 'nofile.svg', 72, 0, '2022-08-08 12:52:02', '2022-08-08 12:52:02'),
(155, '2022-08-05', 50000.00, 22, NULL, 'sps cheking ariyanti', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-08 12:52:34', '2022-08-08 12:52:34'),
(156, '2022-08-05', 64000.00, 22, NULL, 'beli yakult', 540, NULL, 144, 'nofile.svg', 72, 0, '2022-08-08 12:53:03', '2022-08-08 12:53:03'),
(157, '2022-08-05', 150000.00, 22, NULL, 'uang bayar setting komputer', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-08-08 12:53:50', '2022-08-08 12:53:50'),
(159, '2022-08-08', 50000.00, 22, NULL, 'beli handsanitazer', 541, NULL, 143, 'nofile.svg', 72, 0, '2022-08-08 12:55:02', '2022-08-08 12:55:02'),
(160, '2022-08-08', 39000.00, 22, NULL, 'go send notaris pak ferry kirim berkas', 533, NULL, 143, 'nofile.svg', 72, 0, '2022-08-08 12:55:40', '2022-08-08 12:55:40'),
(161, '2022-08-08', 400000.00, 22, NULL, 'transfer mbak nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-08-08 12:56:17', '2022-08-08 12:56:17'),
(162, '2022-08-08', 105000.00, 22, NULL, 'tagihan nomer kantor', 531, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:04:56', '2022-08-19 08:04:56'),
(163, '2022-08-08', 308000.00, 22, NULL, 'salam tempel ke polisi untuk pengurusan surat kehilangan skw edrus', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:06:49', '2022-09-20 08:18:40'),
(164, '2022-08-08', 26000.00, 22, NULL, 'bensin bpn + parkir sifin', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:07:26', '2022-08-19 08:07:26'),
(165, '2022-08-08', 206500.00, 22, NULL, 'sps ht heny yunaidah', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:10:17', '2022-08-19 08:10:17'),
(166, '2022-08-08', 200000.00, 22, NULL, 'sps ht haris', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:10:45', '2022-08-19 08:10:45'),
(167, '2022-08-08', 200000.00, 22, NULL, 'sps ht linda', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:11:11', '2022-08-19 08:11:11'),
(168, '2022-08-08', 50000.00, 22, NULL, 'sps cheking pak ferry', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:11:39', '2022-08-19 08:11:39'),
(169, '2022-08-08', 60000.00, 22, NULL, 'tisu kantor', 533, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:12:04', '2022-08-19 08:12:04'),
(170, '2022-08-08', 20000.00, 22, NULL, 'bensin bpn sifin', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:12:35', '2022-08-19 08:12:35'),
(171, '2022-08-10', 400000.00, 22, NULL, 'uang tf ke mas rohman', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:13:01', '2022-08-19 08:13:01'),
(172, '2022-08-10', 200000.00, 22, NULL, 'uang fee sifin untuk pengurusan  surat kehilangan shm edrus', 532, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:17:54', '2022-08-19 08:17:54'),
(173, '2022-08-10', 20000.00, 22, NULL, 'bensin salma bpn', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:19:02', '2022-08-19 08:19:02'),
(174, '2022-08-10', 50000.00, 22, NULL, 'uang salam tempel pengurusan peningkatan titut', 543, NULL, 144, 'nofile.svg', 72, 0, '2022-08-19 08:20:42', '2022-08-19 08:20:42'),
(175, '2022-08-10', 50000.00, 22, NULL, 'uang ploting', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:21:04', '2022-08-19 08:21:04'),
(176, '2022-08-10', 50000.00, 22, NULL, 'cheking mettasari kedua', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:25:29', '2022-08-19 08:25:29'),
(177, '2022-08-12', 50000.00, 22, NULL, 'peningkatan titut', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:26:44', '2022-08-19 08:26:44'),
(178, '2022-08-12', 50000.00, 22, NULL, 'balik nama aphb wahjoe', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:28:23', '2022-08-19 08:28:23'),
(179, '2022-08-12', 20000.00, 22, NULL, 'bensin bpn salma', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:28:47', '2022-08-19 08:28:47'),
(180, '2022-08-12', 50000.00, 22, NULL, 'uang ploting', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:29:10', '2022-08-19 08:29:10'),
(181, '2022-08-12', 16800.00, 22, NULL, 'print berkas waktu dibpn', 541, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:29:41', '2022-08-19 08:29:41'),
(182, '2022-08-12', 22000.00, 22, NULL, 'parkir dan bensin andre', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:30:18', '2022-08-19 08:30:18'),
(183, '2022-08-12', 10000.00, 22, NULL, 'kirim berkas ke pos dan parkir pos', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:30:46', '2022-08-19 08:30:46'),
(184, '2022-08-12', 11000.00, 22, NULL, 'print berkas untuk pengurusan telkom dan parkir', 533, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:31:26', '2022-08-19 08:31:26'),
(185, '2022-08-12', 20000.00, 22, NULL, 'bensin bpn andre', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:32:10', '2022-08-19 08:32:10'),
(186, '2022-08-12', 200000.00, 22, NULL, 'uang transfer ke mbak nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:33:34', '2022-08-19 08:33:34'),
(187, '2022-08-12', 154600.00, 22, NULL, 'sps edrus pengukuran', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:34:00', '2022-08-19 08:34:00'),
(188, '2022-08-16', 519150.00, 22, NULL, 'uang pembayaran internet kantor', 531, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:35:55', '2022-08-19 08:35:55'),
(189, '2022-08-16', 50000.00, 22, NULL, 'sps ht mettasari', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:36:18', '2022-08-19 08:36:18'),
(190, '2022-08-16', 10000.00, 22, NULL, 'krupuk', 540, NULL, 144, 'nofile.svg', 72, 0, '2022-08-19 08:36:43', '2022-08-19 08:36:43'),
(191, '2022-08-16', 50000.00, 22, NULL, 'sps peningkatan titut', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:37:09', '2022-08-19 08:37:09'),
(192, '2022-08-16', 179735.00, 22, NULL, 'sps balik nama aphb', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:39:03', '2022-08-19 08:39:03'),
(193, '2022-08-16', 20000.00, 22, NULL, 'bensin bpn andre', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:39:32', '2022-08-19 08:39:32'),
(194, '2022-08-16', 10000.00, 22, NULL, 'kirim pos dan parkir', 533, NULL, 144, 'nofile.svg', 72, 0, '2022-08-19 08:40:11', '2022-08-19 08:40:11'),
(195, '2022-08-16', 40000.00, 22, NULL, 'bensin petemon dan bpn', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:40:43', '2022-08-19 08:40:43'),
(196, '2022-08-16', 6500.00, 22, NULL, 'fotocopy, parkir ruko, parkir bfi waru', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-08-19 08:41:36', '2022-09-20 08:22:38'),
(197, '2022-08-19', 51000.00, 22, NULL, 'sps cheking eny wahyuningsih II', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:42:48', '2022-08-19 08:42:48'),
(198, '2022-08-19', 50000.00, 22, NULL, 'sps cheking fitri', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:43:16', '2022-08-19 08:43:16'),
(199, '2022-08-19', 50000.00, 22, NULL, 'sps cheking dyah ayu (BFI sby 2)', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:43:47', '2022-08-19 08:43:47'),
(200, '2022-08-19', 400000.00, 22, NULL, 'transfer kembak nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-08-19 08:44:13', '2022-08-19 08:44:13'),
(201, '2022-08-22', 17000.00, 22, NULL, 'kirim pos pph + parkir', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-08-29 01:47:25', '2022-08-29 01:47:25'),
(203, '2022-08-22', 20000.00, 22, NULL, 'bensin bpn andre', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-08-29 01:51:07', '2022-08-29 01:51:07'),
(205, '2022-08-22', 50000.00, 22, NULL, 'sps cheking daniel', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-29 01:52:39', '2022-08-29 01:52:39'),
(206, '2022-08-22', 51000.00, 22, NULL, 'sps titut II', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-29 01:54:26', '2022-08-29 01:54:26'),
(207, '2022-08-23', 5000.00, 22, NULL, 'admin bphtb', 533, NULL, 143, 'nofile.svg', 72, 0, '2022-08-29 01:55:01', '2022-08-29 01:55:01'),
(208, '2022-08-23', 50000.00, 22, NULL, 'sps cheking mario', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-29 01:55:33', '2022-08-29 01:55:33'),
(209, '2022-08-23', 100000.00, 22, NULL, 'salam tempel rt edrus', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-08-29 01:56:25', '2022-08-29 01:56:25'),
(210, '2022-08-23', 20000.00, 22, NULL, 'bensin bpn sifin', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-08-29 01:57:01', '2022-08-29 01:57:01'),
(211, '2022-08-23', 500000.00, 22, NULL, 'beli materai', 541, NULL, 143, 'nofile.svg', 72, 0, '2022-08-29 01:57:45', '2022-08-29 01:57:45'),
(213, '2022-08-23', 305000.00, 22, NULL, 'ATK untuk kantor baru', 541, NULL, 143, 'nofile.svg', 72, 0, '2022-08-29 02:00:42', '2022-08-29 02:00:42'),
(214, '2022-08-23', 400000.00, 22, NULL, 'tf mbak nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-08-29 02:03:01', '2022-08-29 02:03:01'),
(215, '2022-08-24', 200000.00, 22, NULL, 'tf mbak nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-08-29 02:06:41', '2022-08-29 02:06:41'),
(216, '2022-08-24', 200000.00, 22, NULL, 'sps ht', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-08-29 02:07:27', '2022-08-29 02:07:27'),
(217, '2022-08-24', 40000.00, 22, NULL, 'bensin sifin edrus sama lembur', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-08-29 02:08:50', '2022-08-29 02:08:50'),
(218, '2022-08-26', 22000.00, 22, NULL, 'bensin tbmo + parkir', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-08-29 02:09:16', '2022-09-21 08:07:12'),
(219, '2022-08-26', 774000.00, 22, NULL, 'atk kantor baru', 541, NULL, 143, 'nofile.svg', 72, 0, '2022-08-29 02:09:49', '2022-08-29 02:09:49'),
(220, '2022-08-26', 22000.00, 22, NULL, 'bensin bfi waru + parkir andre', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-08-29 02:10:26', '2022-08-29 02:10:26'),
(221, '2022-08-26', 10000.00, 22, NULL, 'es teh orang cctv', 540, NULL, 143, 'nofile.svg', 72, 0, '2022-08-29 02:11:12', '2022-08-29 02:11:12'),
(222, '2022-08-26', 200000.00, 22, NULL, 'benerin listrik', 533, NULL, 144, 'nofile.svg', 72, 0, '2022-09-05 01:48:25', '2022-09-05 01:48:25'),
(223, '2022-08-26', 5000.00, 22, NULL, 'beli baterai', 541, NULL, 144, 'nofile.svg', 72, 0, '2022-09-05 01:49:54', '2022-09-05 01:49:54'),
(224, '2022-08-29', 50000.00, 22, NULL, 'sps cheking', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-05 01:55:18', '2022-09-05 01:55:18'),
(225, '2022-08-29', 600000.00, 22, NULL, 'transfer ke mbak nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-05 01:55:49', '2022-09-05 01:55:49'),
(226, '2022-08-30', 102000.00, 22, NULL, 'bayar sps cheking', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-05 01:56:20', '2022-09-05 01:56:20'),
(227, '2022-08-30', 600000.00, 22, NULL, 'transfer ke mbak nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-05 01:57:55', '2022-09-05 01:57:55'),
(228, '2022-08-30', 16000.00, 22, NULL, 'kopi tukang', 540, NULL, 144, 'nofile.svg', 72, 0, '2022-09-05 01:58:22', '2022-09-05 01:58:22'),
(229, '2022-08-30', 100000.00, 22, NULL, 'salam tempel kelurahan', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-05 01:58:49', '2022-09-05 01:58:49'),
(230, '2022-08-30', 20000.00, 22, NULL, 'bensin sifin', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-09-05 01:59:20', '2022-09-05 01:59:20'),
(231, '2022-08-30', 22000.00, 22, NULL, 'bensin + parkir', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-09-05 02:14:32', '2022-09-05 02:14:32'),
(232, '2022-08-30', 22000.00, 22, NULL, 'bensuin jimerto sifin', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 11:48:37', '2022-09-10 11:48:37'),
(233, '2022-08-30', 20000.00, 22, NULL, 'bensin pengukuran samuel', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 11:51:27', '2022-09-10 11:51:27'),
(234, '2022-08-30', 60000.00, 22, NULL, 'tisu kantor', 541, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 11:51:53', '2022-09-10 11:51:53'),
(235, '2022-08-30', 20000.00, 22, NULL, 'bensuin bpn sifin', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 11:52:19', '2022-09-10 11:52:19'),
(236, '2022-08-30', 7000.00, 22, NULL, 'kirim pos guntur', 533, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 11:53:08', '2022-09-10 11:53:08'),
(237, '2022-08-30', 7000.00, 22, NULL, 'kirim pos marji', 533, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 11:53:31', '2022-09-10 11:53:31'),
(238, '2022-08-30', 3000.00, 22, NULL, 'parkir pos', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 11:54:29', '2022-09-10 11:54:29'),
(239, '2022-08-30', 1000000.00, 22, NULL, 'beli materai', 541, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 11:57:07', '2022-09-10 11:57:07'),
(240, '2022-08-30', 8000.00, 22, NULL, 'parkir pos , parkir gramedia', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 11:59:46', '2022-09-10 11:59:46'),
(241, '2022-08-30', 168000.00, 22, NULL, 'pembuatan stempel notaris', 541, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:00:46', '2022-09-10 12:00:46'),
(242, '2022-08-30', 188000.00, 22, NULL, 'pembuatan stempel legalisir', 541, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:01:26', '2022-09-10 12:01:26'),
(243, '2022-08-30', 40000.00, 22, NULL, 'bensin andre', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 12:01:50', '2022-09-10 13:02:25'),
(244, '2022-08-30', 20000.00, 22, NULL, 'bensin bfi', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 12:02:20', '2022-09-10 12:02:20'),
(245, '2022-09-01', 25000.00, 22, NULL, 'bensin bfi+ parkir', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 12:04:21', '2022-09-10 12:04:21'),
(247, '2022-09-01', 51000.00, 22, NULL, 'cheking zamroni', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:08:00', '2022-09-10 12:08:00'),
(248, '2022-09-02', 20000.00, 22, NULL, 'bensin andre kpp', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:08:58', '2022-09-10 12:08:58'),
(249, '2022-09-02', 10000.00, 22, NULL, 'uang pos +parkir', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 12:09:55', '2022-09-10 12:09:55'),
(250, '2022-09-02', 63000.00, 22, NULL, 'beli yakult buajeng', 540, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 12:10:22', '2022-09-10 12:10:22'),
(251, '2022-09-02', 10000.00, 22, NULL, 'map blanko dari bpn', 541, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 12:11:28', '2022-09-10 12:11:28'),
(252, '2022-09-02', 6500.00, 22, NULL, 'parkir dispenda + print sertipikat', 541, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 12:12:39', '2022-09-10 12:12:39'),
(253, '2022-09-02', 51000.00, 22, NULL, 'sps ht indra', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:13:03', '2022-09-10 12:13:03'),
(254, '2022-09-02', 22500.00, 22, NULL, 'konsumsi klien', 540, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 12:13:24', '2022-09-10 12:13:24'),
(255, '2022-09-03', 10000.00, 22, NULL, 'kirim pos sokeh +parkir', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 12:14:10', '2022-09-10 12:14:10'),
(256, '2022-09-03', 25000.00, 22, NULL, 'perlengkapan kantor palu', 533, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 12:14:40', '2022-09-10 12:14:40'),
(257, '2022-09-03', 65000.00, 22, NULL, 'kabel saklar', 533, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 12:15:39', '2022-09-10 12:15:39'),
(258, '2022-09-03', 20900.00, 22, NULL, 'super pell kantor', 533, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:16:21', '2022-09-10 12:16:21'),
(259, '2022-09-05', 50000.00, 22, NULL, 'sps cheking suhartiningsih', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:16:53', '2022-09-10 12:16:53'),
(260, '2022-09-05', 400000.00, 22, NULL, 'transfer mbak nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:23:01', '2022-09-10 12:23:01'),
(261, '2022-09-05', 25000.00, 22, NULL, 'bensin bpn andre', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:23:26', '2022-09-10 12:23:26'),
(262, '2022-09-05', 50000.00, 22, NULL, 'salam tempel peningkatan', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:23:48', '2022-09-10 12:23:48'),
(263, '2022-09-05', 25000.00, 22, NULL, 'bensin bpn andre', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 12:24:11', '2022-09-10 12:24:11'),
(264, '2022-09-05', 19000.00, 22, NULL, 'staples buat bu ajeng', 541, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 12:24:49', '2022-09-10 12:24:49'),
(265, '2022-09-06', 50000.00, 22, NULL, 'sps cheking i wayan', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:25:16', '2022-09-10 12:25:16'),
(266, '2022-09-06', 51000.00, 22, NULL, 'sps winarno ht', 545, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 12:25:46', '2022-09-10 12:25:46'),
(267, '2022-09-06', 11000.00, 22, NULL, 'print di bpn', 541, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 12:26:23', '2022-09-10 12:26:23'),
(268, '2022-09-07', 25000.00, 22, NULL, 'bensin kelurahan sifin', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 12:28:31', '2022-09-10 12:28:31'),
(269, '2022-09-07', 400000.00, 22, NULL, 'bayar mbak nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:29:20', '2022-09-10 12:29:20'),
(270, '2022-09-07', 200000.00, 22, NULL, 'sps HT SUPARTI', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:29:47', '2022-09-10 12:29:47'),
(271, '2022-09-07', 2500000.00, 22, NULL, 'sps HT WITDADA', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:32:25', '2022-09-10 12:32:25'),
(272, '2022-09-07', 10000.00, 22, NULL, 'bayar kelurahan', 543, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 12:32:59', '2022-09-10 12:32:59'),
(273, '2022-09-08', 201000.00, 22, NULL, 'sps ht nur hasan basri', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:38:30', '2022-09-10 12:38:30'),
(274, '2022-09-08', 25000.00, 22, NULL, 'bensin bpn andre', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:43:26', '2022-09-10 12:43:26'),
(275, '2022-09-08', 127000.00, 22, NULL, 'sps balik nama samuji', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:44:06', '2022-09-10 12:44:06'),
(276, '2022-09-09', 51000.00, 22, NULL, 'sps cheking marji', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:46:50', '2022-09-10 12:46:50'),
(277, '2022-09-09', 50000.00, 22, NULL, 'cekplot', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:47:24', '2022-09-10 12:47:24'),
(278, '2022-09-09', 25000.00, 22, NULL, 'bensin andre', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 12:47:48', '2022-09-10 12:47:48'),
(279, '2022-09-09', 10000.00, 22, NULL, 'kirim pos+parkir pos', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:48:33', '2022-09-10 12:48:33'),
(280, '2022-09-09', 63000.00, 22, NULL, 'yakult bu ajeng', 540, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 12:49:25', '2022-09-10 12:49:25'),
(281, '2022-09-09', 200000.00, 22, NULL, 'transfer mbak nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:50:44', '2022-09-10 12:50:44'),
(282, '2022-09-09', 51000.00, 22, NULL, 'sps SKPT salim', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:51:33', '2022-09-10 12:51:33'),
(283, '2022-09-09', 51000.00, 22, NULL, 'cheking daryono', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:52:02', '2022-09-10 12:52:02'),
(284, '2022-09-09', 50000.00, 22, NULL, 'chekiing daryono II', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 12:52:30', '2022-09-10 12:52:30'),
(285, '2022-09-09', 200000.00, 22, NULL, 'uang iuran ruko', 533, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 12:54:09', '2022-09-10 12:54:09'),
(286, '2022-09-10', 27000.00, 22, NULL, 'bensin bfi +parkir', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:00:10', '2022-09-10 13:00:10'),
(287, '2022-09-10', 100000.00, 22, NULL, 'salam tempel balik nama sodikin sama marji', 543, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 13:03:02', '2022-09-10 13:03:02'),
(288, '2022-09-10', 200000.00, 22, NULL, 'uang transfer ke mbak nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:03:22', '2022-09-10 13:03:22'),
(289, '2022-09-10', 150000.00, 23, NULL, 'uang iuran bulanan rw dan rt', 533, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 13:05:32', '2022-09-10 13:05:32'),
(290, '2022-08-16', 519150.00, 21, NULL, 'uang wifi kantor', 531, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:06:34', '2022-09-10 13:06:34'),
(291, '2022-08-28', 500000.00, 21, NULL, 'pembayaran token listrik kantor', 531, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:07:29', '2022-09-10 13:07:29'),
(293, '2022-08-26', 84000.00, 21, NULL, 'alat2 listrik', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:14:57', '2022-09-10 13:14:57'),
(294, '2022-08-26', 1350000.00, 21, NULL, 'alat2 kebutuhan tukang untuk renovasi', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:15:59', '2022-09-10 13:15:59'),
(295, '2022-08-29', 1265000.00, 21, NULL, 'uang catering pembukaan ruko', 540, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:16:57', '2022-09-10 13:16:57'),
(296, '2022-08-15', 10000.00, 21, NULL, 'alat2 kebutuhan tukang untuk renovasi', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:17:49', '2022-09-10 13:17:49'),
(297, '2022-08-15', 28000.00, 21, NULL, 'alat2 kebutuhan tukang untuk renovasi', 551, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 13:18:58', '2022-09-10 13:18:58'),
(298, '2022-08-15', 128000.00, 21, NULL, 'alat2 kebutuhan tukang untuk renovasi', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:19:21', '2022-09-10 13:19:21'),
(299, '2022-08-15', 25000.00, 21, NULL, 'alat2 kebutuhan tukang untuk renovasi', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:19:44', '2022-09-10 13:19:44'),
(300, '2022-08-11', 279076.00, 21, NULL, 'alat2 kebutuhan tukang untuk renovasi', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:21:48', '2022-09-10 13:21:48'),
(301, '2022-08-18', 15000.00, 21, NULL, 'alat2 kebutuhan tukang untuk renovasi', 551, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 13:22:19', '2022-09-10 13:22:19'),
(302, '2022-08-01', 145000.00, 21, NULL, 'alat2 kebutuhan tukang untuk renovasi', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:23:07', '2022-09-10 13:23:07'),
(303, '2022-08-01', 146500.00, 21, NULL, 'alat2 kebutuhan tukang untuk renovasi', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:23:44', '2022-09-10 13:23:44'),
(304, '2022-08-02', 15000.00, 21, NULL, 'alat2 kebutuhan tukang untuk renovasi', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:25:06', '2022-09-10 13:25:06'),
(305, '2022-08-02', 15000.00, 21, NULL, 'alat2 kebutuhan tukang untuk renovasi', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:25:40', '2022-09-10 13:25:40'),
(306, '2022-08-01', 141000.00, 21, NULL, 'alat2 kebutuhan tukang untuk renovasi', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:26:36', '2022-09-10 13:26:36'),
(307, '2022-08-01', 173500.00, 21, NULL, 'alat2 kebutuhan tukang untuk renovasi', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:27:18', '2022-09-10 13:27:18'),
(308, '2022-08-01', 412000.00, 21, NULL, 'alat2 kebutuhan tukang untuk renovasi', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:28:06', '2022-09-10 13:28:06'),
(309, '2022-08-02', 612000.00, 21, NULL, 'alat2 kebutuhan tukang untuk renovasi', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:28:55', '2022-09-10 13:28:55'),
(310, '2022-08-01', 200000.00, 21, NULL, 'iuran perbulan ruko', 533, NULL, 144, 'nofile.svg', 72, 0, '2022-09-10 13:29:35', '2022-09-10 13:29:35'),
(311, '2022-08-01', 3894000.00, 21, NULL, 'alat2 kebutuhan tukang untuk renovasi', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:30:45', '2022-09-10 13:30:45'),
(312, '2022-08-03', 430500.00, 21, NULL, 'alat2 kebutuhan tukang untuk renovasi', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:32:25', '2022-09-10 13:32:25'),
(313, '2022-08-03', 1756000.00, 21, NULL, 'alat2 kebutuhan tukang untuk renovasi', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:33:39', '2022-09-10 13:33:39'),
(314, '2022-08-25', 5698000.00, 21, NULL, 'ac kantor', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:35:13', '2022-09-10 13:35:13'),
(315, '2022-08-25', 2499000.00, 21, NULL, 'alat2 kebutuhan tukang untuk renovasi', 551, NULL, 143, 'nofile.svg', 72, 0, '2022-09-10 13:35:50', '2022-09-10 13:35:50'),
(316, '2022-09-12', 50000.00, 22, NULL, 'beli map blanko bpn', 541, NULL, 144, 'nofile.svg', 72, 0, '2022-09-12 07:35:55', '2022-10-07 02:29:15'),
(317, '2022-09-12', 25000.00, 22, NULL, 'bensin bfi andre', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-09-12 08:48:04', '2022-09-12 08:48:04'),
(318, '2022-09-12', 248000.00, 21, NULL, 'pembelian galon dan lpg kantor', 540, NULL, 143, 'nofile.svg', 72, 0, '2022-09-12 14:04:45', '2022-09-12 14:04:45'),
(319, '2022-09-15', 471750.00, 21, NULL, 'pembayaran wifi', 531, NULL, 143, 'nofile.svg', 72, 0, '2022-09-15 04:51:29', '2022-09-15 04:51:29'),
(320, '2022-07-26', 10000.00, 22, NULL, 'blanko bpn', 541, NULL, 144, 'nofile.svg', 72, 0, '2022-09-19 09:12:24', '2022-09-19 09:12:24'),
(321, '2022-07-18', 50000.00, 22, NULL, 'bayar pbb', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-19 09:14:06', '2022-09-19 09:14:06'),
(322, '2022-07-15', 6000.00, 22, NULL, 'parkir', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-09-19 09:15:26', '2022-09-19 09:15:26'),
(323, '2022-09-19', 50000.00, 24, NULL, '', 562, NULL, 148, 'nofile.svg', 77, 0, '2022-09-19 14:13:34', '2022-09-19 14:13:34'),
(324, '2022-09-21', 1000000.00, 21, NULL, 'pembayaran fee Akta Kuasa dan Persetujuan', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-21 04:51:49', '2022-09-21 04:51:49'),
(325, '2022-09-12', 100000.00, 22, NULL, 'sps balik nama marji', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 03:11:01', '2022-09-24 03:11:01'),
(326, '2022-09-12', 50000.00, 22, NULL, 'sps subuki', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 03:18:50', '2022-09-24 03:18:50'),
(327, '2022-09-12', 200000.00, 22, NULL, 'tf mbak nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 03:23:25', '2022-09-24 03:23:25'),
(328, '2022-09-14', 500000.00, 22, NULL, 'beli materai', 541, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 03:31:06', '2022-09-24 03:31:06'),
(329, '2022-09-12', 25000.00, 22, NULL, 'bensin ke pt garam', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 03:38:51', '2022-09-24 03:38:51'),
(330, '2022-09-12', 50000.00, 22, NULL, 'sps sodikin', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 03:39:19', '2022-09-24 03:39:19'),
(331, '2022-09-14', 12000.00, 22, NULL, 'peralatan untuk tukang', 533, NULL, 144, 'nofile.svg', 72, 0, '2022-09-24 03:41:03', '2022-09-24 03:41:03'),
(332, '2022-09-14', 25000.00, 22, NULL, 'bensin bpn andre', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 03:41:48', '2022-09-24 03:41:48'),
(333, '2022-09-14', 3000.00, 22, NULL, 'parkir', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-09-24 03:43:03', '2022-09-24 03:43:03'),
(334, '2022-09-14', 33500.00, 22, NULL, 'sabun  biore', 534, NULL, 144, 'nofile.svg', 72, 0, '2022-09-24 03:43:48', '2022-09-24 03:43:48'),
(335, '2022-09-14', 25000.00, 22, NULL, 'bensin bpn andre', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 03:53:39', '2022-09-24 03:53:39'),
(336, '2022-09-14', 27000.00, 22, NULL, 'kirim pos +parkir', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 03:54:11', '2022-09-24 03:54:11'),
(337, '2022-09-14', 25000.00, 22, NULL, 'bensin sifin', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 03:54:40', '2022-09-24 03:54:40'),
(338, '2022-09-16', 63000.00, 22, NULL, 'beli yakult', 540, NULL, 144, 'nofile.svg', 72, 0, '2022-09-24 03:55:13', '2022-09-24 03:55:13'),
(339, '2022-09-16', 50000.00, 22, NULL, 'voucher profil PT', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 03:55:39', '2022-09-24 03:55:39'),
(340, '2022-09-16', 100000.00, 22, NULL, 'konsumsi kantor', 540, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 03:55:59', '2022-09-24 03:55:59'),
(341, '2022-09-16', 50000.00, 22, NULL, 'besnin bfi waru + sukomanunggal', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 03:56:27', '2022-09-24 03:56:27'),
(342, '2022-09-16', 4000.00, 22, NULL, 'parkir bfi waru dan sukomanunggal', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 03:59:35', '2022-09-24 03:59:35'),
(343, '2022-09-16', 51000.00, 22, NULL, 'sps siswandie cheking', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 04:01:50', '2022-09-24 04:01:50'),
(344, '2022-09-17', 100000.00, 22, NULL, 'salam tempel bpn 2', 543, NULL, 144, 'nofile.svg', 72, 0, '2022-09-24 04:04:03', '2022-09-24 04:04:03'),
(345, '2022-09-17', 100000.00, 22, NULL, 'sps haposan dan lilik', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 04:04:56', '2022-09-24 04:04:56'),
(346, '2022-09-17', 17000.00, 22, NULL, 'uang pos dan parkir', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 04:05:27', '2022-09-24 04:05:27'),
(347, '2022-09-19', 7000.00, 22, NULL, 'print dan lem', 541, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 04:05:55', '2022-09-24 04:05:55'),
(348, '2022-09-19', 25000.00, 22, NULL, 'bensin andre bpn', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 04:06:17', '2022-09-24 04:06:17'),
(349, '2022-09-19', 30000.00, 22, NULL, 'blanko peningkatan untuk bpn', 547, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 04:07:05', '2022-09-24 04:07:05'),
(350, '2022-09-20', 30000.00, 22, NULL, 'konsumsi buajeng', 540, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 04:07:41', '2022-09-24 04:07:41'),
(351, '2022-09-20', 201000.00, 22, NULL, 'sps ht fitri', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 04:08:09', '2022-09-24 04:08:09'),
(352, '2022-09-20', 180000.00, 22, NULL, 'sps ht lilik', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 04:08:46', '2022-09-24 04:08:46'),
(353, '2022-09-20', 50000.00, 22, NULL, 'sps ht mateyus', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 04:09:24', '2022-09-24 04:09:24'),
(354, '2022-09-20', 200000.00, 22, NULL, 'tf mbak nadia cheking siswandie', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 04:09:54', '2022-09-24 04:09:54'),
(355, '2022-09-20', 56000.00, 22, NULL, 'laminating sop', 533, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 04:10:22', '2022-09-24 04:10:22'),
(356, '2022-09-21', 51000.00, 22, NULL, 'sps cheking yayuk', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 04:10:56', '2022-09-24 04:10:56'),
(357, '2022-09-21', 200000.00, 22, NULL, 'transfer mbak nadia untuk biaya cheking', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 04:12:25', '2022-09-24 04:12:25');
INSERT INTO `payments` (`id`, `date`, `amount`, `account_id`, `vender_id`, `description`, `category_id`, `recurring`, `payment_method`, `reference`, `created_by`, `served_by`, `created_at`, `updated_at`) VALUES
(358, '2022-09-21', 50000.00, 22, NULL, 'sps ht daniel', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 04:13:01', '2022-09-24 04:13:01'),
(359, '2022-09-21', 50000.00, 22, NULL, 'bensin bfi waru+ sukomanunggal', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 04:14:01', '2022-09-24 04:14:01'),
(360, '2022-09-21', 50000.00, 22, NULL, 'salam tempel bpn', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 04:14:28', '2022-09-24 04:14:28'),
(361, '2022-09-21', 37500.00, 22, NULL, 'kirim kantor pos', 534, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 04:15:09', '2022-09-24 04:15:09'),
(362, '2022-09-21', 11500.00, 22, NULL, 'konsumsi bubur', 540, NULL, 144, 'nofile.svg', 72, 0, '2022-09-24 04:15:39', '2022-09-24 04:15:39'),
(363, '2022-09-21', 63000.00, 22, NULL, 'yakult', 540, NULL, 144, 'nofile.svg', 72, 0, '2022-09-24 04:16:03', '2022-09-24 04:16:03'),
(364, '2022-09-22', 25000.00, 22, NULL, 'bensin bpn andre', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 04:16:35', '2022-09-24 04:16:35'),
(365, '2022-09-23', 50000.00, 22, NULL, 'bensin kpp + bensin bfi', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-09-24 04:17:17', '2022-09-24 04:17:17'),
(366, '2022-09-23', 20000.00, 22, NULL, 'blanko sk', 533, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 04:17:50', '2022-09-24 04:17:50'),
(367, '2022-09-23', 37500.00, 22, NULL, 'konsumsi bubur kacang ijo', 540, NULL, 144, 'nofile.svg', 72, 0, '2022-09-24 04:18:17', '2022-09-24 04:18:17'),
(368, '2022-09-23', 40400.00, 22, NULL, 'tinta stempel', 533, NULL, 143, 'nofile.svg', 72, 0, '2022-09-24 04:19:03', '2022-09-24 04:19:03'),
(369, '2022-09-26', 152000.00, 22, NULL, 'pembayaran vocher pendirian dan pemesanan nama cv + parkir', 545, NULL, 144, 'nofile.svg', 72, 0, '2022-09-26 01:59:04', '2022-09-26 01:59:04'),
(371, '2022-09-26', 2500000.00, 23, NULL, 'pinjaman buajeng ke uang kantor untuk pembayaran mbak ainun', 553, NULL, 143, 'nofile.svg', 72, 0, '2022-09-26 02:32:42', '2022-09-26 04:49:41'),
(372, '2022-09-26', 2500000.00, 23, NULL, 'biaya pembayaran ke mbak ainun bpn', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-26 03:25:33', '2022-09-26 03:25:33'),
(373, '2022-09-26', 6000000.00, 23, NULL, 'biaya pembayaran mitra notaris ke pak miftah assabil', 553, NULL, 143, 'nofile.svg', 72, 0, '2022-09-26 04:50:38', '2022-09-26 04:50:38'),
(375, '2022-08-30', 1250000.00, 21, NULL, 'pemabayaran mitra nitaris ke pak ferry gunawan', 552, NULL, 143, 'nofile.svg', 72, 0, '2022-09-28 04:20:24', '2022-09-28 04:20:24'),
(376, '2022-08-08', 102020.00, 21, NULL, 'pembayaran telfon kantor', 531, NULL, 143, 'nofile.svg', 72, 0, '2022-09-28 04:29:11', '2022-09-28 04:29:11'),
(377, '2022-08-08', 1836000.00, 21, NULL, 'pembayaran pln', 531, NULL, 143, 'nofile.svg', 72, 0, '2022-09-28 04:31:18', '2022-09-28 04:31:18'),
(378, '2022-08-08', 1250000.00, 21, NULL, 'pembayaran mitra notaris ferry gunawan', 552, NULL, 143, 'nofile.svg', 72, 0, '2022-09-28 04:41:36', '2022-09-28 04:41:36'),
(379, '2022-08-08', 2500000.00, 21, NULL, 'pembayaran mitra notaris ani suhaini', 552, NULL, 143, 'nofile.svg', 72, 0, '2022-09-28 04:42:16', '2022-09-28 04:42:16'),
(380, '2022-08-15', 5000000.00, 21, NULL, 'pembayaran rasuna untuk masuk bpn', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-28 04:54:33', '2022-09-28 04:54:33'),
(381, '2022-08-15', 8000000.00, 21, NULL, 'pembayaran fee mas lukman', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-28 04:56:38', '2022-09-28 04:56:38'),
(382, '2022-08-15', 179000.00, 21, NULL, 'bayar sps bpn', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-28 04:58:18', '2022-09-28 04:58:18'),
(383, '2022-08-31', 9135000.00, 21, NULL, 'gaji anak2', 535, NULL, 143, 'nofile.svg', 72, 0, '2022-09-28 05:01:50', '2022-09-28 05:01:50'),
(384, '2022-08-26', 8200000.00, 21, NULL, 'biaya pemasangan wifi', 533, NULL, 143, 'nofile.svg', 72, 0, '2022-09-28 05:29:13', '2022-09-28 05:29:13'),
(385, '2022-08-10', 306090.00, 21, NULL, 'perlengkapan kantor', 533, NULL, 143, 'nofile.svg', 72, 0, '2022-09-28 06:27:32', '2022-09-28 06:27:32'),
(386, '2022-08-11', 279076.00, 21, NULL, 'beli perlengkapan mitra 10', 533, NULL, 143, 'nofile.svg', 72, 0, '2022-09-28 06:31:32', '2022-09-28 06:31:32'),
(387, '2022-08-24', 2515000.00, 21, NULL, 'pembayaran bpn', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-28 06:35:08', '2022-09-28 06:35:08'),
(388, '2022-08-29', 2013700.00, 21, NULL, 'biaya perlengkapan untuk kantor', 533, NULL, 143, 'nofile.svg', 72, 0, '2022-09-28 06:36:31', '2022-09-28 06:36:31'),
(389, '2022-08-30', 19800000.00, 21, NULL, 'tarikan tunai oleh buajeng', 553, NULL, 144, 'nofile.svg', 72, 0, '2022-09-28 06:39:36', '2022-09-28 06:39:36'),
(390, '2022-09-26', 20000.00, 22, NULL, 'konsumsi untuk buajeng', 540, NULL, 144, 'nofile.svg', 72, 0, '2022-09-29 07:07:03', '2022-09-29 07:07:03'),
(391, '2022-09-26', 51000.00, 22, NULL, 'sps HT santi', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-29 07:07:27', '2022-09-29 07:07:27'),
(392, '2022-09-26', 25000.00, 22, NULL, 'uang makan ikbal', 540, NULL, 144, 'nofile.svg', 72, 0, '2022-09-29 07:07:55', '2022-09-29 07:07:55'),
(393, '2022-09-27', 51000.00, 22, NULL, 'sps cheking sokeh', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-29 07:10:42', '2022-09-29 07:10:42'),
(394, '2022-09-27', 50000.00, 22, NULL, 'sps cheking guntur', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-29 07:11:08', '2022-09-29 07:11:08'),
(395, '2022-09-27', 53000.00, 22, NULL, 'bensin sifin dan parkir', 540, NULL, 143, 'nofile.svg', 72, 0, '2022-09-29 07:16:30', '2022-09-29 07:16:30'),
(396, '2022-09-27', 30000.00, 22, NULL, 'kartu nama buajeng', 541, NULL, 143, 'nofile.svg', 72, 0, '2022-09-29 07:17:22', '2022-09-29 07:17:22'),
(397, '2022-09-27', 10000.00, 22, NULL, 'parkir marina mas fahmi', 533, NULL, 143, 'nofile.svg', 72, 0, '2022-09-29 07:17:57', '2022-09-29 07:17:57'),
(398, '2022-09-27', 400000.00, 22, NULL, 'biaya tf mbak nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-29 07:19:02', '2022-09-29 07:19:02'),
(399, '2022-09-27', 306500.00, 22, NULL, 'transfer ke pak donny', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-29 07:20:23', '2022-09-29 07:20:23'),
(400, '2022-09-27', 4000.00, 22, NULL, 'parkir bfi dan bni', 540, NULL, 144, 'nofile.svg', 72, 0, '2022-09-29 07:21:11', '2022-09-29 07:21:11'),
(401, '2022-09-28', 100000.00, 22, NULL, 'cekplot panghudi dan paini', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-29 07:23:29', '2022-09-29 07:23:29'),
(402, '2022-09-28', 100000.00, 22, NULL, 'salam tempel masuk roya', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-09-29 07:24:15', '2022-09-29 07:24:15'),
(403, '2022-09-28', 100000.00, 22, NULL, 'sps roya dan paini dan panghuni', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-09-29 07:26:42', '2022-09-29 07:26:42'),
(404, '2022-09-28', 50000.00, 22, NULL, 'bensin bpn dan surabaya', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-09-29 07:27:20', '2022-09-29 07:27:20'),
(405, '2022-09-28', 30000.00, 22, NULL, 'bensin bpn dan print', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-09-29 07:36:44', '2022-09-29 07:36:44'),
(406, '2022-09-28', 25000.00, 22, NULL, 'bensin bpn sifin', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-10-01 04:01:29', '2022-10-01 04:01:29'),
(407, '2022-09-28', 50000.00, 22, NULL, 'sps hilary cheking', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-10-01 04:02:10', '2022-10-01 04:02:10'),
(408, '2022-09-28', 50000.00, 22, NULL, 'sps fungky', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-10-01 04:02:45', '2022-10-01 04:02:45'),
(409, '2022-09-28', 50000.00, 22, NULL, 'sps cheking rudy', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-10-01 04:04:55', '2022-10-01 04:04:55'),
(410, '2022-09-01', 59000.00, 22, NULL, 'perlengkapan finger print', 533, NULL, 144, 'nofile.svg', 72, 0, '2022-10-01 04:25:50', '2022-10-01 04:25:50'),
(411, '2022-09-03', 50000.00, 22, NULL, 'sps cheking samuji', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-10-01 04:47:59', '2022-10-01 04:47:59'),
(414, '2022-09-26', 500000.00, 22, NULL, 'beli materai', 541, NULL, 143, 'nofile.svg', 72, 0, '2022-10-01 04:51:45', '2022-10-01 04:51:45'),
(415, '2022-09-05', 66000000.00, 21, NULL, 'uang dtransfer kerekening buajeng', 553, NULL, 143, 'nofile.svg', 72, 0, '2022-10-03 05:07:11', '2022-10-03 07:35:52'),
(416, '2022-09-30', 11365000.00, 21, NULL, 'gaji anak2', 535, NULL, 143, 'nofile.svg', 72, 0, '2022-10-03 07:26:04', '2022-10-03 07:26:04'),
(417, '2022-09-26', 2300000.00, 21, NULL, 'biaya mitra notaris bu nandyta wulandari', 552, NULL, 143, 'nofile.svg', 72, 0, '2022-10-03 07:30:46', '2022-10-03 07:33:03'),
(418, '2022-10-05', 424900.00, 21, NULL, 'pembayaran PDAM', 531, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:15:29', '2022-10-05 08:15:29'),
(419, '2022-10-05', 2473900.00, 21, NULL, 'pembayaran indihome', 531, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:15:53', '2022-10-05 08:15:53'),
(420, '2022-10-05', 80500.00, 21, NULL, 'telfon kantor', 531, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:16:15', '2022-10-05 08:16:15'),
(421, '2022-10-05', 107100.00, 22, NULL, 'bayar nomer hp kantor', 531, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:16:45', '2022-10-05 08:16:45'),
(422, '2022-10-01', 50000.00, 22, NULL, 'uang blanko bpn', 541, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:21:38', '2022-10-05 08:21:38'),
(423, '2022-10-01', 100000.00, 22, NULL, 'salam tempel sokeh dan guntur', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:22:20', '2022-10-05 08:22:20'),
(424, '2022-10-01', 63000.00, 22, NULL, 'yakult', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:22:52', '2022-10-05 08:22:52'),
(425, '2022-10-01', 50000.00, 22, NULL, 'bayar paket buajeng dari papua', 533, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:32:32', '2022-10-05 08:32:32'),
(426, '2022-10-01', 111000.00, 22, NULL, 'rujak konsumsi buajeng', 540, NULL, 144, 'nofile.svg', 72, 0, '2022-10-05 08:33:24', '2022-10-05 08:33:24'),
(427, '2022-10-01', 5000.00, 22, NULL, 'parkir', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:33:49', '2022-10-05 08:33:49'),
(428, '2022-10-01', 50000.00, 22, NULL, 'bensin bpn', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:34:19', '2022-10-05 08:34:19'),
(429, '2022-10-01', 11700.00, 22, NULL, 'materai', 541, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:37:16', '2022-10-05 08:37:16'),
(430, '2022-10-01', 50000.00, 22, NULL, 'bensin bpn +BFi andre', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:38:24', '2022-10-05 08:38:24'),
(431, '2022-10-01', 1000.00, 22, NULL, 'print', 541, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:38:59', '2022-10-05 08:38:59'),
(432, '2022-10-01', 200000.00, 22, NULL, 'transfer nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:39:43', '2022-10-05 08:39:43'),
(433, '2022-10-01', 25000.00, 22, NULL, 'bensin bpn', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:41:02', '2022-10-05 08:41:02'),
(434, '2022-10-03', 400000.00, 22, NULL, 'pembayaran mesin fotocopy', 531, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:41:49', '2022-10-05 08:41:49'),
(435, '2022-10-03', 50000.00, 22, NULL, 'salam tempel', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:42:29', '2022-10-05 08:42:29'),
(436, '2022-10-03', 25000.00, 22, NULL, 'bensin bpn sifin', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:42:54', '2022-10-05 08:42:54'),
(437, '2022-10-03', 200000.00, 22, NULL, 'iuran satpam', 531, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:43:21', '2022-10-05 08:43:21'),
(438, '2022-10-03', 150000.00, 22, NULL, 'iuran bu susi', 531, NULL, 144, 'nofile.svg', 72, 0, '2022-10-05 08:44:18', '2022-10-05 08:44:18'),
(439, '2022-10-03', 250000.00, 22, NULL, 'iuran rt', 531, NULL, 144, 'nofile.svg', 72, 0, '2022-10-05 08:45:27', '2022-10-05 08:45:27'),
(440, '2022-10-03', 470000.00, 22, NULL, 'sps hibah', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:45:49', '2022-10-05 08:45:49'),
(441, '2022-10-03', 25000.00, 22, NULL, 'bensin andre', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:46:10', '2022-10-05 08:46:10'),
(442, '2022-10-03', 51000.00, 22, NULL, 'cheking fauzi', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:46:37', '2022-10-05 08:46:37'),
(443, '2022-10-03', 50000.00, 22, NULL, 'cheking haposan', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:47:04', '2022-10-05 08:47:04'),
(444, '2022-10-03', 400000.00, 22, NULL, 'bayar nadia', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:47:32', '2022-10-05 08:47:32'),
(445, '2022-10-05', 10000.00, 22, NULL, 'uang pos', 533, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:48:03', '2022-10-05 08:48:03'),
(446, '2022-10-05', 25000.00, 22, NULL, 'bensin andre', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-10-05 08:49:50', '2022-10-05 08:49:50'),
(447, '2022-10-05', 11500.00, 22, NULL, 'bayar pos kilat malang', 533, NULL, 144, 'nofile.svg', 72, 0, '2022-10-05 08:50:24', '2022-10-05 08:50:24'),
(448, '2022-10-05', 5000.00, 22, NULL, 'parkir pos bfi', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-10-05 08:50:49', '2022-10-05 08:50:49'),
(449, '2022-10-05', 2500000.00, 21, NULL, 'pembayaran sps ht aswin', 553, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:57:53', '2022-10-05 08:57:53'),
(450, '2022-10-05', 12500000.00, 21, NULL, 'pelunasan rekom pecah dan pertek sambisari', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-10-05 08:59:39', '2022-10-05 08:59:39'),
(452, '2022-10-07', 63000.00, 22, NULL, 'yakult', 540, NULL, 144, 'nofile.svg', 72, 0, '2022-10-07 02:04:06', '2022-10-07 02:04:06'),
(453, '2022-09-12', 25000.00, 22, NULL, 'bensin salma', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-10-07 02:42:15', '2022-10-07 02:42:15'),
(454, '2022-09-12', 50000.00, 22, NULL, 'bayar sps ht', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-10-07 02:42:50', '2022-10-07 02:42:50'),
(455, '2022-10-07', 955000.00, 22, NULL, 'sps iftah dan timo', 545, NULL, 143, 'nofile.svg', 72, 0, '2022-10-07 06:56:22', '2022-10-07 06:56:22'),
(456, '2022-10-07', 79000.00, 22, NULL, 'beli galon', 540, NULL, 144, 'nofile.svg', 72, 0, '2022-10-07 06:57:10', '2022-10-07 06:57:10'),
(457, '2022-10-07', 150000.00, 22, NULL, 'salma tempel bpn', 543, NULL, 143, 'nofile.svg', 72, 0, '2022-10-07 06:57:36', '2022-10-07 06:57:36'),
(458, '2022-10-07', 4000.00, 22, NULL, 'parkir bfi suko + bfi waru', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-10-07 06:58:06', '2022-10-07 06:58:06'),
(459, '2022-10-07', 50000.00, 22, NULL, 'bensin bfi dan bpn andre', 542, NULL, 144, 'nofile.svg', 72, 0, '2022-10-07 06:58:30', '2022-10-07 06:58:30'),
(460, '2022-10-07', 25000.00, 22, NULL, 'bensin bfi', 542, NULL, 143, 'nofile.svg', 72, 0, '2022-10-07 06:58:50', '2022-10-07 06:58:50'),
(461, '2022-09-26', 600000.00, 21, NULL, 'token listrik', 531, NULL, 143, 'nofile.svg', 72, 0, '2022-10-10 07:03:03', '2022-10-10 07:03:03'),
(462, '2022-09-26', 575000.00, 21, NULL, 'bpjs', 531, NULL, 143, 'nofile.svg', 72, 0, '2022-10-10 07:03:46', '2022-10-10 07:03:46'),
(463, '2022-07-09', 350000.00, 21, NULL, 'bpjs juli', 531, NULL, 143, 'nofile.svg', 72, 0, '2022-10-10 07:04:51', '2022-10-12 02:22:47'),
(465, '2022-11-07', 100000.00, 25, NULL, 'Biaya Gaji Dewi Anggraeni', 574, NULL, 152, 'b6d6c378f00f3dd9d179d6b1a5a57be4.jpeg', 83, 0, '2022-11-07 13:37:19', '2022-11-10 13:47:18'),
(466, '2022-06-24', 1851412.00, 18, NULL, 'AWS', 287, NULL, 84, 'ed0f9bd3e12efd572d97c68b10fb07d0.jpeg', 51, 0, '2022-11-09 19:45:06', '2022-11-09 19:45:06'),
(467, '2022-06-25', 8466046.00, 18, NULL, 'AWS', 287, NULL, 84, 'c6c1f88aeb7ad8217447cfb40f81cd86.jpeg', 51, 0, '2022-11-09 19:46:15', '2022-11-09 19:46:15'),
(468, '2022-08-29', 1539752.00, 18, NULL, 'Server SSD Nodes', 287, NULL, 84, 'd514e9f2e63099a00c7cc9ba573655f0.jpeg', 51, 0, '2022-11-09 19:49:06', '2022-11-09 19:49:06'),
(469, '2022-07-15', 500000.00, 18, NULL, 'Pelunasan Hutang Alfin tahap 1', 580, NULL, 84, 'ef8d20e57bb35ac1760d498cfd7877eb.jpeg', 51, 0, '2022-11-09 20:03:12', '2022-11-09 20:03:12'),
(470, '2022-07-30', 500000.00, 18, NULL, 'Pelunasan Hutang Alfin Tahap 3', 580, NULL, 84, '7a16ddd0f995a6310ea7b99314a67ed3.jpeg', 51, 0, '2022-11-09 20:04:15', '2022-11-09 20:05:37'),
(471, '2022-07-25', 500000.00, 18, NULL, 'Pelunasan Hutang Alfin Tahap 2', 580, NULL, 84, '9042643789ff42b7bf861d7269a868f2.jpeg', 51, 0, '2022-11-09 20:05:28', '2022-11-09 20:05:28'),
(472, '2022-11-06', 2500000.00, 14, NULL, '', 180, NULL, 54, 'bdf520b2be9c72a948b068cdfe82a126.jpeg', 38, 0, '2022-11-09 20:33:21', '2022-11-09 20:33:21'),
(473, '2022-11-06', 5000000.00, 14, NULL, 'Untuk Bulan september dan oktober', 180, NULL, 54, 'c6ab18b6f3b537a54b6b3ac3b1af796a.jpeg', 38, 0, '2022-11-09 20:34:27', '2022-11-09 20:34:41'),
(474, '2022-11-06', 350000.00, 14, NULL, 'Gaji Wira - 1 Minggu', 180, NULL, 54, 'd93919bdd7f34dc624bbb7d5188f0ebd.jpeg', 38, 0, '2022-11-09 20:35:29', '2022-11-09 20:36:30'),
(475, '2022-11-06', 1400000.00, 14, NULL, 'Kevin - Probation', 180, NULL, 54, '0f9c094451d9d937349e5ab4c5ff485f.jpeg', 38, 0, '2022-11-09 20:36:22', '2022-11-09 20:36:22'),
(476, '2022-10-04', 2500000.00, 14, NULL, '', 180, NULL, 54, 'eee5f8da49f55292a1aac88f68a6b0c9.jpeg', 38, 0, '2022-11-09 20:38:46', '2022-11-09 20:38:46'),
(477, '2022-09-02', 3000000.00, 14, NULL, 'alfin', 180, NULL, 54, '50f72beeac39ce3f8aae21dbb9e6d697.jpeg', 38, 0, '2022-11-10 04:31:00', '2022-11-10 04:31:00'),
(478, '2022-09-02', 3000000.00, 14, NULL, 'tarmi', 180, NULL, 54, 'f157c0cd6ec7ea08f2c3ddccfc529380.jpeg', 38, 0, '2022-11-10 04:32:17', '2022-11-10 04:32:17'),
(479, '2022-09-02', 2000000.00, 14, NULL, 'dlomiri', 180, NULL, 54, 'd47f8dec035bd1f33719d9693c86e190.jpeg', 38, 0, '2022-11-10 04:33:06', '2022-11-10 04:33:06'),
(480, '2022-03-29', 18500000.00, 10, NULL, 'beli macbook', 582, NULL, 54, 'nofile.svg', 38, 0, '2022-11-10 04:36:11', '2022-11-10 04:36:11'),
(481, '2022-04-13', 18500000.00, 10, NULL, 'beli macbook', 582, NULL, 54, 'nofile.svg', 38, 0, '2022-11-10 04:36:56', '2022-11-10 04:36:56'),
(482, '2022-08-02', 2000000.00, 14, NULL, 'tarmi', 180, NULL, 54, '66196b2143d9fb4c4819d87550475db0.jpeg', 38, 0, '2022-11-10 07:48:27', '2022-11-10 07:48:27'),
(483, '2022-08-02', 3000000.00, 14, NULL, 'Alfin', 180, NULL, 54, '85978c4e4ab860b4fce4af22296e32cb.jpeg', 38, 0, '2022-11-10 07:49:04', '2022-11-10 07:49:04'),
(484, '2022-08-02', 2000000.00, 14, NULL, 'Dlomiri', 180, NULL, 54, 'e300c62f935f8400ad1bc3a3525efd61.jpeg', 38, 0, '2022-11-10 07:49:45', '2022-11-10 07:49:45'),
(485, '2022-11-10', 1080700.00, 25, NULL, 'Beli Mesin Kopi Espresso + Ongkir', 577, NULL, 152, 'd0b0ff04c759a0eeaab065e2046c2f26.jpeg', 83, 0, '2022-11-10 13:33:33', '2023-01-06 10:52:57'),
(486, '2022-11-10', 300000.00, 18, NULL, 'Biaya Gaji Setyo Wahyu Trianto', 288, NULL, 84, 'f36b1a332b08affca77543d870fc8537.jpeg', 51, 0, '2022-11-10 13:35:36', '2022-11-10 13:35:36'),
(487, '2022-11-13', 1000000.00, 25, NULL, 'Beli Meja', 590, NULL, 152, '8f6018158f688196a64b252d4ea57d62.jpeg', 83, 0, '2022-11-14 07:57:42', '2023-01-06 10:52:41'),
(488, '2022-10-05', 512400.00, 10, NULL, '', 181, NULL, 54, '66e4acd602f6198f5dfe1d14dc3a826b.png', 38, 0, '2022-11-16 14:56:35', '2022-11-16 14:56:35'),
(489, '2022-10-05', 599500.00, 10, NULL, '', 181, NULL, 54, 'f2963d1d5032e432946ca53d388952be.png', 38, 0, '2022-11-16 14:57:08', '2022-11-16 14:57:08'),
(490, '2022-10-06', 31200.00, 10, NULL, '', 181, NULL, 54, '83c12691c4cf4a9a49d2a5840d886384.png', 38, 0, '2022-11-16 14:57:49', '2022-11-16 14:57:49'),
(491, '2022-10-06', 1636000.00, 10, NULL, '', 181, NULL, 54, '0221e15d8c339bbb3579d9ac04143ef4.png', 38, 0, '2022-11-16 14:58:28', '2022-11-16 14:58:28'),
(492, '2022-10-06', 60360.00, 10, NULL, '', 181, NULL, 54, '4e2d39c59c3025edb2edf7d23c3ac71a.png', 38, 0, '2022-11-16 14:58:58', '2022-11-16 14:58:58'),
(493, '2022-05-02', 3000000.00, 14, NULL, 'Alfin', 180, NULL, 54, 'ba7d6de2c774faf6b1253fc3fc7cddff.jpeg', 38, 0, '2022-11-16 15:20:29', '2022-11-16 15:20:29'),
(494, '2022-05-02', 2000000.00, 14, NULL, 'Tarmi', 180, NULL, 54, 'd567e896902920f0d96e8edfc17c8bfa.jpeg', 38, 0, '2022-11-16 15:21:06', '2022-11-16 15:21:06'),
(495, '2022-05-02', 2000000.00, 14, NULL, 'Dlomiri', 180, NULL, 54, 'b8304cc478c39b87d51b8acba5a000e9.jpeg', 38, 0, '2022-11-16 15:21:41', '2022-11-16 15:21:41'),
(496, '2022-06-11', 2000000.00, 14, NULL, 'Tarmi', 180, NULL, 54, 'a32402b9b7cabd88cfb10cd2d4fff7fa.jpeg', 38, 0, '2022-11-16 15:23:32', '2022-11-16 15:23:32'),
(497, '2022-06-11', 2000000.00, 10, NULL, 'Dlomiri', 180, NULL, 54, 'nofile.svg', 38, 0, '2022-11-16 15:28:39', '2022-11-16 15:28:39'),
(498, '2022-06-11', 3000000.00, 10, NULL, 'Alfin', 180, NULL, 54, 'nofile.svg', 38, 0, '2022-11-16 15:29:02', '2022-11-16 15:29:02'),
(499, '2022-07-05', 2000000.00, 14, NULL, 'Dlomiri', 180, NULL, 54, '6f281f3241929bcd3f04b819d557b555.jpeg', 38, 0, '2022-11-16 15:40:00', '2022-11-16 15:40:00'),
(500, '2022-07-05', 2000000.00, 14, NULL, 'tarmi', 180, NULL, 54, 'nofile.svg', 38, 0, '2022-11-16 15:40:36', '2022-11-16 15:40:36'),
(501, '2022-07-05', 3000000.00, 14, NULL, 'alfin', 180, NULL, 54, 'nofile.svg', 38, 0, '2022-11-16 15:41:06', '2022-11-16 15:41:06'),
(502, '2022-11-17', 168299.00, 10, NULL, 'Domain Kazhier', 179, NULL, 54, '643d7d8927c8651e75ea73a52cfeef66.png', 38, 0, '2022-11-17 01:27:54', '2022-11-17 01:27:54'),
(503, '2022-10-30', 750000.00, 26, NULL, 'Tanam Jagung', 586, NULL, 154, 'nofile.svg', 84, 0, '2022-11-18 18:23:22', '2022-11-18 18:23:22'),
(504, '2022-11-15', 595000.00, 26, NULL, 'perawatan', 586, NULL, 154, 'nofile.svg', 84, 0, '2022-11-18 18:30:34', '2022-11-18 18:30:34'),
(505, '2022-11-15', 825000.00, 26, NULL, 'perawatan cabai kebun 1', 588, NULL, 154, 'nofile.svg', 84, 0, '2022-11-18 18:31:03', '2023-02-07 17:05:49'),
(506, '2022-11-15', 480000.00, 26, NULL, 'penanaman padi sawah 1', 587, NULL, 154, 'nofile.svg', 84, 0, '2022-11-18 18:31:45', '2023-02-07 16:45:39'),
(507, '2022-10-30', 450000.00, 26, NULL, 'penanaman cabai kebun 1', 588, NULL, 154, 'nofile.svg', 84, 0, '2022-11-18 18:32:32', '2023-02-07 17:06:24'),
(508, '2022-11-18', 174580.00, 25, NULL, 'Beli Milk Jug Kopi, Espresso Shot Glass, Toso Vietnam Drip Sekrup (Saringan Kopi) + Biaya Layanan Jasa Aplikasi', 577, NULL, 152, 'be1a3fb014010507863cd0aaa1476291.jpeg', 83, 0, '2022-11-21 13:20:17', '2023-01-06 10:51:34'),
(509, '2022-11-15', 273769.00, 25, NULL, 'Beli Bubuk Cokelat, Bubuk Cheese, Ginger Syrup, Wijen Hitam Panggang', 575, NULL, 152, '73436bc293d1a785ce8f7e6dc223d0f5.jpeg', 83, 0, '2022-11-21 13:29:32', '2023-01-06 10:52:23'),
(510, '2022-11-17', 155000.00, 25, NULL, 'Beli LCD Touchscreen Xiaomi Redmi 5+', 576, NULL, 152, '835c0a8efc6fc9f7ac3f8428fd82789e.jpeg', 83, 0, '2022-11-21 13:42:54', '2023-01-06 10:52:09'),
(511, '2022-11-18', 70400.00, 25, NULL, 'Beli TW Milk Frother Electric Hand Mixer', 577, NULL, 152, 'b4523048aeec7c9dca8acf9c5841077f.jpeg', 83, 0, '2022-11-22 17:29:24', '2023-01-06 10:51:55'),
(512, '2022-11-19', 62900.00, 25, NULL, 'Beli Tamping Mat Silicon, Kantong Kopi Teh Celup 2x100 Pcs, + Biaya Asuransi Pengiriman', 590, NULL, 152, 'e359ef2e452342815fcd27d567314d9f.jpeg', 83, 0, '2022-11-22 17:38:38', '2023-01-06 10:50:59'),
(513, '2022-11-19', 70900.00, 25, NULL, 'Beli Kantong Plastik Gelas 4pcs, Sedotan Plastik 2x300pcs, Gelas Plastik 2pcs.', 590, NULL, 152, '721b1e787bcdbe7944c16bc7ea22810b.jpeg', 83, 0, '2022-11-22 17:43:25', '2023-01-06 10:51:14'),
(514, '2022-10-05', 112040.00, 18, NULL, 'domain kejarpppk', 287, NULL, 84, 'db2e682310cf0038f3ff57188f20892d.png', 51, 0, '2022-11-23 21:40:54', '2022-11-23 21:40:54'),
(515, '2022-11-23', 133015.00, 18, NULL, 'domain kejardikdin', 287, NULL, 84, 'd4e7c9377bf07d47ea886decbbbf5ca7.png', 51, 0, '2022-11-23 21:42:24', '2022-11-23 21:42:24'),
(516, '2022-11-26', 120000.00, 26, NULL, 'pupuk', 588, NULL, 154, 'nofile.svg', 84, 0, '2022-11-26 16:49:41', '2022-11-26 16:49:41'),
(517, '2022-11-26', 240000.00, 26, NULL, 'cabut rumput cabai kebun 1', 588, NULL, 154, 'nofile.svg', 84, 0, '2022-11-26 16:50:30', '2023-02-07 17:05:07'),
(518, '2022-12-06', 500000.00, 25, NULL, 'Biaya Gaji Dewi Anggraeni', 574, NULL, 152, '525f5239c12d5fc41e3ca8d995255f3f.jpeg', 83, 0, '2022-12-12 12:05:40', '2022-12-12 12:05:40'),
(519, '2022-12-06', 1200000.00, 13, NULL, 'Biaya Gaji Setyo Wahyu Trianto', 288, NULL, 84, '67166ae3c550434ad0e010aaa3ffc8f9.jpeg', 51, 0, '2022-12-12 12:07:49', '2022-12-12 12:07:49'),
(520, '2022-11-19', 320005.00, 25, NULL, 'Makan di Royal', 591, NULL, 152, 'a0525c22504f86622bac33eb1b0ae4b1.jpg', 83, 0, '2022-12-12 12:23:20', '2022-12-12 12:23:41'),
(521, '2023-01-02', 1500.00, 27, NULL, '', 595, NULL, 155, 'nofile.svg', 85, 0, '2023-01-02 13:20:41', '2023-01-02 13:20:41'),
(522, '2022-12-28', 16500.00, 25, NULL, 'Cetak Stiker Bontak A3', 598, NULL, 151, 'bf277d397c29eb4b192ed7ad353b55f6.jpeg', 83, 0, '2023-01-06 10:31:53', '2023-01-06 10:31:53'),
(523, '2022-12-20', 40000.00, 25, NULL, 'Beli Ob Stop Kontak 4L Uticon, Steker Amasco, Obeng', 577, NULL, 151, '6296e2b52e89caef2c65fe7843363f87.jpeg', 83, 0, '2023-01-06 10:50:15', '2023-01-06 10:50:15'),
(524, '2022-12-21', 19000.00, 25, NULL, 'Beli Karton Linen', 590, NULL, 151, 'f34a7c26398d4a8ba7aca0cb1cd46a0a.jpeg', 83, 0, '2023-01-06 10:57:35', '2023-01-06 10:57:35'),
(525, '2022-12-21', 11517.00, 25, NULL, 'Beli Lemon', 591, NULL, 151, 'a68709ce23cf5e9f7b6f5ef56d01a25b.jpeg', 83, 0, '2023-01-06 12:27:05', '2023-01-06 12:27:05'),
(526, '2022-12-28', 167000.00, 25, NULL, 'Beli Dispenser Tape, Isolasi, Crayon, Balon, Gabus', 590, NULL, 151, '08699e6906fd70899225ab146d335902.jpeg', 83, 0, '2023-01-06 12:32:04', '2023-01-12 08:53:58'),
(527, '2022-12-20', 21000.00, 25, NULL, 'Beli Susu Ultra UHT 1L', 575, NULL, 151, '320a2194b6a954ab8e05c188169d0bfe.jpeg', 83, 0, '2023-01-06 12:34:39', '2023-01-12 09:04:33'),
(528, '2023-01-09', 1000.00, 27, NULL, '', 595, NULL, 156, 'nofile.svg', 85, 0, '2023-01-09 14:11:06', '2023-01-09 14:11:06'),
(529, '2022-12-26', 57500.00, 25, NULL, 'Beli Tripod Stand Banner Display', 590, NULL, 152, '391bfe99e81373d6a0ce12b56f808768.jpeg', 83, 0, '2023-01-12 08:49:17', '2023-01-12 08:49:17'),
(530, '2022-12-26', 48000.00, 25, NULL, 'Beli Sedotan Pipih Kopi', 590, NULL, 152, '1909bb77d07339eb8652d0ea51a9a70e.jpeg', 83, 0, '2023-01-12 08:53:14', '2023-01-12 08:53:47'),
(531, '2022-12-21', 261500.00, 25, NULL, 'Beli Cash Drawer Laci Kasir', 577, NULL, 152, '6465ab820f52c33d3e190eaef39f2254.jpeg', 83, 0, '2023-01-12 08:57:04', '2023-01-12 08:57:04'),
(532, '2022-12-20', 25999.00, 25, NULL, 'Beli Gula Aren Cair 1Kg', 575, NULL, 152, 'c5e8a8d3c4d0f0bf0ceb4093339d263e.jpeg', 83, 0, '2023-01-12 09:00:22', '2023-01-12 09:00:22'),
(533, '2023-01-03', 15700.00, 25, NULL, 'Beli Susu Kental Manis Putih FF', 575, NULL, 151, 'bbe66194a830542302f274c77c56b024.jpeg', 83, 0, '2023-01-12 09:03:01', '2023-01-12 09:03:01'),
(535, '2023-01-10', 8000.00, 25, NULL, 'Beli Jahe Merah AMH 5 Sachet', 575, NULL, 151, '168f215c3650317f3975f05ee1dbf53d.jpeg', 83, 0, '2023-01-12 09:12:24', '2023-01-12 09:12:24'),
(536, '2023-01-13', 10000.00, 27, NULL, 'es batu 2 bungkus', 596, NULL, 156, 'nofile.svg', 85, 0, '2023-01-24 03:48:52', '2023-01-24 03:48:52'),
(537, '2023-01-16', 28600.00, 27, NULL, 'gelas panas 1 slop', 594, NULL, 155, 'a50ff078e4bd9e2836a8f38750967e4b.png', 85, 0, '2023-01-24 04:02:44', '2023-01-24 04:02:58'),
(538, '2023-01-16', 44750.00, 27, NULL, '2 slop gelas plastik', 594, NULL, 155, '43d698ef5f291d55549208dda886b54b.png', 85, 0, '2023-01-24 04:03:46', '2023-01-24 04:03:46'),
(539, '2023-01-20', 10000.00, 27, NULL, 'galon', 596, NULL, 156, 'nofile.svg', 85, 0, '2023-01-24 04:07:44', '2023-01-24 04:07:44'),
(540, '2023-01-13', 13000.00, 25, NULL, 'Beli Label Florsc T&J', 590, NULL, 151, 'fcace958bfafef89d09289a4fea5ba67.jpeg', 83, 0, '2023-01-30 09:48:52', '2023-01-30 09:48:52'),
(542, '2023-01-21', 33200.00, 29, NULL, 'Beli Biji Kopi Exelco Robst', 575, NULL, 151, 'fff432bf9e00e3004918a5ca8581e6fa.jpeg', 83, 0, '2023-01-30 09:57:46', '2023-01-30 09:57:46'),
(543, '2023-01-21', 16800.00, 29, NULL, 'Biaya Bensin Ari', 600, NULL, 151, 'nofile.svg', 83, 0, '2023-01-30 09:59:18', '2023-01-30 09:59:18'),
(544, '2023-01-22', 15000.00, 25, NULL, 'Beli Samosa', 575, NULL, 151, '12f139797f51acc0f819bcf96b480363.jpeg', 83, 0, '2023-01-30 10:03:16', '2023-01-30 10:03:16'),
(545, '2023-01-22', 60000.00, 25, NULL, 'Beli Apple Pie dan Samosa', 575, NULL, 151, '4b8811e185b80070ad92ac80b1f17f10.jpeg', 83, 0, '2023-01-30 10:05:40', '2023-01-30 10:05:40'),
(546, '2023-01-22', 27900.00, 25, NULL, 'Beli Kertas Box Kemasan Makanan', 598, NULL, 152, 'e79ceec6a18b928ed728fee9fbf01bed.jpeg', 83, 0, '2023-01-30 10:09:41', '2023-01-30 10:09:41'),
(547, '2023-01-17', 28300.00, 25, NULL, 'Beli Kantong Kertas Kentang Goreng', 598, NULL, 152, 'facbbad271cab305f939176c2d07cf28.jpeg', 83, 0, '2023-01-30 10:13:24', '2023-01-30 10:13:24'),
(548, '2023-01-17', 28000.00, 25, NULL, 'Beli Sosis Jumbo', 575, NULL, 152, 'c7352e90a81bc227fe3c7997e0bc5dac.jpeg', 83, 0, '2023-01-30 10:16:23', '2023-01-30 10:16:23'),
(549, '2023-01-17', 28300.00, 25, NULL, 'Beli Gula Cair', 575, NULL, 152, 'cb18e9f8f36c9174a1777964cf7e9514.jpeg', 83, 0, '2023-01-30 10:18:42', '2023-01-30 10:18:42'),
(550, '2023-01-17', 31000.00, 25, NULL, 'Beli Infraboard Putih', 590, NULL, 152, '0313fe727bdcf7e39ab6fa38c95c9e95.jpeg', 83, 0, '2023-01-30 10:21:12', '2023-01-30 10:21:12'),
(551, '2023-01-25', 19000.00, 25, NULL, 'Beli Susu Ultra UHT 1L', 575, NULL, 151, '7d3ce55d7efb624c6d87be0a49d0c246.jpeg', 83, 0, '2023-01-30 10:27:01', '2023-01-30 10:27:01'),
(552, '2023-01-25', 7500.00, 25, NULL, 'Beli You C1000 Drink', 591, NULL, 151, '2bbc8465211294bc8ae670a3746aa403.jpeg', 83, 0, '2023-01-30 10:28:06', '2023-01-30 10:28:06'),
(558, '2023-01-04', 19000.00, 31, NULL, 'Beli Susu Ultra UHT 1L', 575, NULL, 151, '4208cc23f22a8122d145026e31795af4.jpeg', 83, 0, '2023-02-06 05:39:00', '2023-02-07 07:58:19'),
(559, '2023-01-17', 108000.00, 31, NULL, 'Bayar Listrik', 599, NULL, 151, 'nofile.svg', 83, 0, '2023-02-06 05:40:12', '2023-02-06 05:41:45'),
(560, '2023-01-31', 90000.00, 25, NULL, 'Beli Samosa, Apple Pie, Donat', 575, NULL, 151, '34a8f3bcf3eb8f2b64cfdc531a10105e.jpeg', 83, 0, '2023-02-06 08:34:31', '2023-02-06 08:34:31'),
(561, '2023-02-02', 30000.00, 25, NULL, 'Beli Samosa', 575, NULL, 151, '89f23f447bb4ec21a789511a754a8285.jpeg', 83, 0, '2023-02-06 08:36:32', '2023-02-06 08:36:32'),
(562, '2023-02-04', 66600.00, 31, NULL, 'Beli SKM Frisian, Susu Ultra 1L, Kopi Exelco', 575, NULL, 151, 'c837e176096e1f94d7418491060cfd28.jpeg', 83, 0, '2023-02-06 08:40:25', '2023-02-06 08:48:48'),
(563, '2022-12-31', 96000.00, 25, NULL, 'Beli Makanan + Minuman Frontage Coffee', 591, NULL, 152, '05217fff6e1ab76d1f56b6443d4eebe2.jpg', 83, 0, '2023-02-06 09:00:20', '2023-02-06 09:00:20'),
(564, '2023-01-27', 62500.00, 29, NULL, 'Bayar Kasir Pintar', 573, NULL, 152, '9e290e60f3df0ef4fd4761a2dd8e10bc.jpg', 83, 0, '2023-02-06 09:02:32', '2023-02-06 09:02:32'),
(565, '2023-02-06', 700000.00, 31, NULL, 'Bayar Gaji Pegawai', 574, NULL, 151, 'nofile.svg', 83, 0, '2023-02-06 09:27:50', '2023-02-06 09:27:50'),
(566, '2023-02-01', 50400.00, 27, NULL, 'Resin', 601, NULL, 155, '422de48ad52eba792eeed11864ec79f3.png', 85, 0, '2023-02-07 07:06:49', '2023-02-07 07:06:49'),
(567, '2023-02-03', 5000.00, 27, NULL, 'air galon', 596, NULL, 156, 'nofile.svg', 85, 0, '2023-02-07 10:55:29', '2023-02-07 10:55:29'),
(568, '2023-02-06', 9674.00, 27, NULL, 'Dana', 595, NULL, 156, 'nofile.svg', 85, 0, '2023-02-07 10:57:15', '2023-02-07 10:57:15'),
(569, '2023-01-31', 12319.00, 27, NULL, 'dana', 595, NULL, 156, 'nofile.svg', 85, 0, '2023-02-07 11:03:13', '2023-02-07 11:03:13'),
(570, '2023-01-24', 1029000.00, 26, NULL, 'Perawatan Padi sawah 2', 587, NULL, 154, 'nofile.svg', 84, 0, '2023-02-07 16:32:51', '2023-02-07 16:32:51'),
(571, '2022-12-27', 820000.00, 26, NULL, 'Perawatan padi sawah 2', 587, NULL, 154, 'nofile.svg', 84, 0, '2023-02-07 16:33:42', '2023-02-07 16:33:42'),
(572, '2022-12-15', 965000.00, 26, NULL, 'Perawatan padi sawah 1', 587, NULL, 154, 'nofile.svg', 84, 0, '2023-02-07 16:46:53', '2023-02-07 16:46:53'),
(573, '2023-01-29', 460000.00, 26, NULL, 'Perawatan cabe kebun 1', 588, NULL, 154, 'nofile.svg', 84, 0, '2023-02-07 16:59:20', '2023-02-07 16:59:20'),
(574, '2023-02-05', 450000.00, 26, NULL, 'penanaman cabai kebun 2', 588, NULL, 154, 'nofile.svg', 84, 0, '2023-02-07 17:04:05', '2023-02-07 17:04:05'),
(575, '2023-01-15', 1400000.00, 26, NULL, 'Perawatan Padi sawah 1', 587, NULL, 154, 'nofile.svg', 84, 0, '2023-02-07 18:07:13', '2023-02-07 18:07:13'),
(576, '2023-02-06', 500000.00, 25, NULL, 'Biaya Gaji Dewi Rp500.000', 574, NULL, 152, '7c96a3f83dab8352d30f41a4038ca22f.jpeg', 83, 0, '2023-02-13 09:46:49', '2023-02-13 09:46:49'),
(577, '2023-02-07', 6900.00, 25, NULL, 'Beli Jahe Merah AMH', 575, NULL, 151, 'e1d1362bd5c9373bf3594a7afe805bec.jpeg', 83, 0, '2023-02-13 09:51:17', '2023-02-13 09:51:17'),
(578, '2023-02-07', 30000.00, 25, NULL, 'Duplikat Kunci 2', 576, NULL, 151, '660d2b9230747b0812f3020d16b224ce.jpeg', 83, 0, '2023-02-13 09:55:24', '2023-02-13 09:55:24'),
(579, '2023-03-01', 1600000.00, 32, 17, '', 613, NULL, 159, 'nofile.svg', 86, 0, '2023-03-01 14:19:56', '2023-03-01 14:19:56'),
(580, '2023-03-05', 60000.00, 32, 17, '', 609, NULL, 157, 'nofile.svg', 86, 0, '2023-03-05 11:16:23', '2023-03-05 11:16:23'),
(581, '2023-03-05', 60000.00, 33, 17, '', 610, NULL, 158, 'nofile.svg', 86, 0, '2023-03-05 13:07:33', '2023-03-05 13:07:33'),
(582, '2023-03-05', 100000.00, 34, 17, '', 611, NULL, 159, 'nofile.svg', 86, 0, '2023-03-05 13:15:32', '2023-03-05 13:15:32'),
(583, '2023-03-05', 100000.00, 32, 17, '', 612, NULL, 160, 'nofile.svg', 86, 0, '2023-03-05 13:16:40', '2023-03-05 13:16:40'),
(584, '2023-03-05', 100000.00, 33, 17, '', 612, NULL, 161, 'nofile.svg', 86, 0, '2023-03-05 13:17:14', '2023-03-05 13:17:14'),
(585, '2023-03-05', 40000.00, 33, 17, '', 620, NULL, 162, 'nofile.svg', 86, 0, '2023-03-05 13:20:36', '2023-03-05 13:20:36'),
(586, '2023-03-05', 40000.00, 34, 17, '', 619, NULL, 157, 'nofile.svg', 86, 0, '2023-03-05 13:28:13', '2023-03-05 13:28:13'),
(587, '2023-03-05', 10000.00, 33, 17, '', 618, NULL, 157, 'nofile.svg', 86, 0, '2023-03-05 13:45:08', '2023-03-05 13:45:08'),
(588, '2023-03-05', 700000.00, 34, 17, '', 616, NULL, 158, 'nofile.svg', 86, 0, '2023-03-05 14:02:52', '2023-03-05 14:02:52'),
(589, '2023-03-04', 10000.00, 32, 17, '', 615, NULL, 159, 'nofile.svg', 86, 0, '2023-03-05 14:04:28', '2023-03-05 14:04:28'),
(590, '2023-03-05', 5000.00, 33, 17, '', 614, NULL, 160, 'nofile.svg', 86, 0, '2023-03-05 14:07:21', '2023-03-05 14:07:21'),
(591, '2023-03-05', 600000.00, 34, 17, '', 613, NULL, 161, 'nofile.svg', 86, 0, '2023-03-05 14:12:27', '2023-03-05 14:12:27'),
(592, '2023-03-05', 1600000.00, 32, 17, '', 612, NULL, 162, 'nofile.svg', 86, 0, '2023-03-05 14:17:22', '2023-03-05 14:17:22'),
(593, '2023-03-05', 10000.00, 33, 17, '', 609, NULL, 160, 'nofile.svg', 86, 0, '2023-03-05 14:18:11', '2023-03-05 14:18:11'),
(594, '2023-03-05', 2000000.00, 33, 17, '', 611, NULL, 159, 'nofile.svg', 86, 0, '2023-03-05 14:18:34', '2023-03-05 14:18:34'),
(595, '2023-03-05', 90000.00, 34, 17, '', 619, NULL, 161, 'nofile.svg', 86, 0, '2023-03-05 14:19:22', '2023-03-05 14:19:22'),
(596, '2023-03-05', 850000.00, 34, 17, '', 612, NULL, 158, 'nofile.svg', 86, 0, '2023-03-05 14:19:48', '2023-03-05 14:19:48'),
(597, '2023-03-05', 600000.00, 33, 17, '', 613, NULL, 160, 'nofile.svg', 86, 0, '2023-03-05 14:20:26', '2023-03-05 14:20:26'),
(598, '2023-03-05', 100000.00, 32, 17, '', 611, NULL, 159, 'nofile.svg', 86, 0, '2023-03-05 14:20:56', '2023-03-05 14:20:56'),
(599, '2023-03-05', 150000.00, 34, 17, '', 618, NULL, 159, 'nofile.svg', 86, 0, '2023-03-05 14:21:30', '2023-03-05 14:21:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'transfer bank', 19, '2021-07-21 23:50:57', '2021-07-21 23:50:57'),
(2, 'cash', 19, '2021-07-21 23:50:57', '2021-07-21 23:50:57'),
(3, 'transfer bank', 20, '2021-07-24 08:37:29', '2021-07-24 08:37:29'),
(4, 'cash', 20, '2021-07-24 08:37:29', '2021-07-24 08:37:29'),
(5, 'transfer bank', 21, '2021-08-21 22:38:27', '2021-08-21 22:38:27'),
(6, 'cash', 21, '2021-08-21 22:38:27', '2021-08-21 22:38:27'),
(7, 'transfer bank', 22, '2021-08-29 10:53:25', '2021-08-29 10:53:25'),
(8, 'cash', 22, '2021-08-29 10:53:25', '2021-08-29 10:53:25'),
(9, 'transfer bank', 23, '2021-08-31 23:37:23', '2021-08-31 23:37:23'),
(10, 'cash', 23, '2021-08-31 23:37:23', '2021-08-31 23:37:23'),
(11, 'transfer bank', 24, '2021-10-21 06:25:36', '2021-10-21 06:25:36'),
(12, 'cash', 24, '2021-10-21 06:25:36', '2021-10-21 06:25:36'),
(13, 'transfer bank', 25, '2021-10-21 16:49:56', '2021-10-21 16:49:56'),
(14, 'cash', 25, '2021-10-21 16:49:56', '2021-10-21 16:49:56'),
(15, 'transfer bank', 26, '2021-11-07 21:40:13', '2021-11-07 21:40:13'),
(16, 'cash', 26, '2021-11-07 21:40:13', '2021-11-07 21:40:13'),
(17, 'Cash', 27, NULL, NULL),
(18, 'Transfer bank', 27, NULL, NULL),
(19, 'Cash', 28, NULL, NULL),
(20, 'Transfer bank', 28, NULL, NULL),
(21, 'Dana', 29, NULL, NULL),
(22, 'OVO', 29, NULL, NULL),
(23, 'LinkAja', 29, NULL, NULL),
(24, 'Cash', 29, NULL, NULL),
(25, 'Transfer Bank', 29, NULL, NULL),
(26, 'Cash', 32, NULL, NULL),
(27, 'Transfer Bank', 32, NULL, NULL),
(28, 'Cash', 33, NULL, NULL),
(29, 'GoPay', 33, NULL, NULL),
(30, 'Transfer Bank', 33, NULL, NULL),
(31, 'Cash', 34, NULL, NULL),
(32, 'Dana', 34, NULL, NULL),
(33, 'GoPay', 34, NULL, NULL),
(34, 'LinkAja', 34, NULL, NULL),
(35, 'OVO', 34, NULL, NULL),
(36, 'Transfer Bank', 34, NULL, NULL),
(37, 'Cash', 35, NULL, NULL),
(38, 'GoPay', 35, NULL, NULL),
(39, 'OVO', 35, NULL, NULL),
(40, 'Transfer Bank', 35, NULL, NULL),
(41, 'Dana', 35, NULL, NULL),
(42, 'Cash', 36, NULL, NULL),
(43, 'Transfer Bank', 36, NULL, NULL),
(44, 'OVO', 36, NULL, NULL),
(45, 'GoPay', 36, NULL, NULL),
(46, 'Dana', 37, NULL, NULL),
(47, 'LinkAja', 37, NULL, NULL),
(48, 'Transfer Bank', 37, NULL, NULL),
(49, 'OVO', 37, NULL, NULL),
(50, 'Transfer Bank', 24, NULL, NULL),
(51, 'GoPay', 24, NULL, NULL),
(52, 'Cash', 24, NULL, NULL),
(53, 'Cash', 38, NULL, NULL),
(54, 'Transfer Bank', 38, NULL, NULL),
(55, 'Dana', 39, NULL, NULL),
(56, 'LinkAja', 39, NULL, NULL),
(57, 'Cash', 39, NULL, NULL),
(58, 'Transfer Bank', 39, NULL, NULL),
(59, 'OVO', 39, NULL, NULL),
(60, 'GoPay', 39, NULL, NULL),
(61, 'Dana', 41, NULL, NULL),
(62, 'LinkAja', 41, NULL, NULL),
(63, 'Cash', 41, NULL, NULL),
(64, 'Dana', 43, NULL, NULL),
(65, 'LinkAja', 43, NULL, NULL),
(66, 'Transfer Bank', 43, NULL, NULL),
(67, 'Dana', 43, NULL, NULL),
(68, 'LinkAja', 43, NULL, NULL),
(69, 'CARD', 41, '2022-03-18 03:11:42', '2022-03-18 03:11:42'),
(70, 'Dana', 44, NULL, NULL),
(71, 'LinkAja', 44, NULL, NULL),
(72, 'OVO', 44, NULL, NULL),
(73, 'Dana', 45, NULL, NULL),
(74, 'LinkAja', 45, NULL, NULL),
(75, 'Transfer Bank', 45, NULL, NULL),
(76, 'Dana', 46, NULL, NULL),
(77, 'LinkAja', 46, NULL, NULL),
(78, 'Transfer Bank', 46, NULL, NULL),
(81, 'Cash', 50, NULL, NULL),
(82, 'Transfer Bank', 50, NULL, NULL),
(83, 'Cash', 51, NULL, NULL),
(84, 'Transfer Bank', 51, NULL, NULL),
(85, 'Cash', 54, NULL, NULL),
(86, 'Transfer Bank', 54, NULL, NULL),
(87, 'GoPay', 54, NULL, NULL),
(88, 'ShopeePay', 54, NULL, NULL),
(89, 'Dana', 55, NULL, NULL),
(90, 'LinkAja', 55, NULL, NULL),
(91, 'Cash', 55, NULL, NULL),
(92, 'GoPay', 55, NULL, NULL),
(93, 'OVO', 55, NULL, NULL),
(94, 'Transfer Bank', 55, NULL, NULL),
(95, 'Dana', 32, NULL, NULL),
(96, 'LinkAja', 32, NULL, NULL),
(97, 'OVO', 32, NULL, NULL),
(98, 'GoPay', 32, NULL, NULL),
(99, 'Transfer Bank', 56, NULL, NULL),
(100, 'GoPay', 56, NULL, NULL),
(101, 'Cash', 56, NULL, NULL),
(102, 'Dana', 58, NULL, NULL),
(103, 'LinkAja', 58, NULL, NULL),
(104, 'Transfer Bank', 59, NULL, NULL),
(105, 'Cash', 59, NULL, NULL),
(106, 'OVO', 59, NULL, NULL),
(107, 'GoPay', 59, NULL, NULL),
(108, 'Dana', 60, NULL, NULL),
(109, 'Cash', 60, NULL, NULL),
(110, 'OVO', 60, NULL, NULL),
(111, 'GoPay', 60, NULL, NULL),
(112, 'Transfer Bank', 60, NULL, NULL),
(113, 'Shopee Pay', 60, NULL, NULL),
(114, 'Dana', 61, NULL, NULL),
(115, 'LinkAja', 61, NULL, NULL),
(116, 'Dana', 62, NULL, NULL),
(117, 'LinkAja', 62, NULL, NULL),
(118, 'Cash', 62, NULL, NULL),
(119, 'Transfer Bank', 62, NULL, NULL),
(120, 'OVO', 62, NULL, NULL),
(121, 'GoPay', 62, NULL, NULL),
(122, 'Dana', 64, NULL, NULL),
(123, 'LinkAja', 64, NULL, NULL),
(124, 'LinkAja', 65, NULL, NULL),
(125, 'Cash', 67, NULL, NULL),
(126, 'Transfer Bank', 67, NULL, NULL),
(127, 'Dana', 68, NULL, NULL),
(128, 'LinkAja', 68, NULL, NULL),
(129, 'OVO', 68, NULL, NULL),
(130, 'GoPay', 68, NULL, NULL),
(131, 'Transfer Bank', 68, NULL, NULL),
(132, 'Cash', 68, NULL, NULL),
(133, 'Dana', 69, NULL, NULL),
(134, 'LinkAja', 69, NULL, NULL),
(135, 'Dana', 71, NULL, NULL),
(136, 'LinkAja', 71, NULL, NULL),
(137, 'Cash', 71, NULL, NULL),
(138, 'Transfer Bank', 71, NULL, NULL),
(139, 'OVO', 71, NULL, NULL),
(140, 'GoPay', 71, NULL, NULL),
(143, 'Transfer Bank', 72, NULL, NULL),
(144, 'Cash', 72, NULL, NULL),
(145, 'Dana', 77, NULL, NULL),
(146, 'LinkAja', 77, NULL, NULL),
(147, 'Cash', 77, NULL, NULL),
(148, 'OVO', 77, NULL, NULL),
(149, 'Transfer Bank', 77, NULL, NULL),
(150, 'GoPay', 77, NULL, NULL),
(151, 'Cash', 83, NULL, NULL),
(152, 'Pembayaran Online', 83, NULL, NULL),
(153, 'Transfer Bank', 84, NULL, NULL),
(154, 'Cash', 84, NULL, NULL),
(155, 'Transfer Bank', 85, NULL, NULL),
(156, 'Cash', 85, NULL, NULL),
(157, 'Dana', 86, NULL, NULL),
(158, 'LinkAja', 86, NULL, NULL),
(159, 'Cash', 86, NULL, NULL),
(160, 'Transfer Bank', 86, NULL, NULL),
(161, 'OVO', 86, NULL, NULL),
(162, 'GoPay', 86, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manage user', 'web', '2021-02-03 07:33:59', '2021-02-03 07:33:59'),
(2, 'create user', 'web', '2021-02-03 07:34:00', '2021-02-03 07:34:00'),
(3, 'edit user', 'web', '2021-02-03 07:34:00', '2021-02-03 07:34:00'),
(4, 'delete user', 'web', '2021-02-03 07:34:00', '2021-02-03 07:34:00'),
(5, 'manage language', 'web', '2021-02-03 07:34:00', '2021-02-03 07:34:00'),
(6, 'create language', 'web', '2021-02-03 07:34:00', '2021-02-03 07:34:00'),
(7, 'manage account', 'web', '2021-02-03 07:34:00', '2021-02-03 07:34:00'),
(8, 'edit account', 'web', '2021-02-03 07:34:00', '2021-02-03 07:34:00'),
(9, 'change password account', 'web', '2021-02-03 07:34:00', '2021-02-03 07:34:00'),
(10, 'manage system settings', 'web', '2021-02-03 07:34:00', '2021-02-03 07:34:00'),
(11, 'manage role', 'web', '2021-02-03 07:34:00', '2021-02-03 07:34:00'),
(12, 'create role', 'web', '2021-02-03 07:34:01', '2021-02-03 07:34:01'),
(13, 'edit role', 'web', '2021-02-03 07:34:01', '2021-02-03 07:34:01'),
(14, 'delete role', 'web', '2021-02-03 07:34:01', '2021-02-03 07:34:01'),
(15, 'manage permission', 'web', '2021-02-03 07:34:01', '2021-02-03 07:34:01'),
(16, 'create permission', 'web', '2021-02-03 07:34:01', '2021-02-03 07:34:01'),
(17, 'edit permission', 'web', '2021-02-03 07:34:01', '2021-02-03 07:34:01'),
(18, 'delete permission', 'web', '2021-02-03 07:34:01', '2021-02-03 07:34:01'),
(19, 'manage company settings', 'web', '2021-02-03 07:34:01', '2021-02-03 07:34:01'),
(20, 'manage business settings', 'web', '2021-02-03 07:34:01', '2021-02-03 07:34:01'),
(21, 'manage stripe settings', 'web', '2021-02-03 07:34:01', '2021-02-03 07:34:01'),
(22, 'manage expense', 'web', '2021-02-03 07:34:01', '2021-02-03 07:34:01'),
(23, 'create expense', 'web', '2021-02-03 07:34:01', '2021-02-03 07:34:01'),
(24, 'edit expense', 'web', '2021-02-03 07:34:01', '2021-02-03 07:34:01'),
(25, 'delete expense', 'web', '2021-02-03 07:34:01', '2021-02-03 07:34:01'),
(26, 'manage invoice', 'web', '2021-02-03 07:34:01', '2021-02-03 07:34:01'),
(27, 'create invoice', 'web', '2021-02-03 07:34:01', '2021-02-03 07:34:01'),
(28, 'edit invoice', 'web', '2021-02-03 07:34:02', '2021-02-03 07:34:02'),
(29, 'delete invoice', 'web', '2021-02-03 07:34:02', '2021-02-03 07:34:02'),
(30, 'show invoice', 'web', '2021-02-03 07:34:02', '2021-02-03 07:34:02'),
(31, 'create payment invoice', 'web', '2021-02-03 07:34:02', '2021-02-03 07:34:02'),
(32, 'delete payment invoice', 'web', '2021-02-03 07:34:02', '2021-02-03 07:34:02'),
(33, 'send invoice', 'web', '2021-02-03 07:34:02', '2021-02-03 07:34:02'),
(34, 'delete invoice product', 'web', '2021-02-03 07:34:02', '2021-02-03 07:34:02'),
(35, 'convert invoice', 'web', '2021-02-03 07:34:02', '2021-02-03 07:34:02'),
(36, 'manage change password', 'web', '2021-02-03 07:34:02', '2021-02-03 07:34:02'),
(37, 'manage plan', 'web', '2021-02-03 07:34:02', '2021-02-03 07:34:02'),
(38, 'create plan', 'web', '2021-02-03 07:34:02', '2021-02-03 07:34:02'),
(39, 'edit plan', 'web', '2021-02-03 07:34:02', '2021-02-03 07:34:02'),
(40, 'manage constant unit', 'web', '2021-02-03 07:34:02', '2021-02-03 07:34:02'),
(41, 'create constant unit', 'web', '2021-02-03 07:34:02', '2021-02-03 07:34:02'),
(42, 'edit constant unit', 'web', '2021-02-03 07:34:02', '2021-02-03 07:34:02'),
(43, 'delete constant unit', 'web', '2021-02-03 07:34:02', '2021-02-03 07:34:02'),
(44, 'manage constant tax', 'web', '2021-02-03 07:34:02', '2021-02-03 07:34:02'),
(45, 'create constant tax', 'web', '2021-02-03 07:34:03', '2021-02-03 07:34:03'),
(46, 'edit constant tax', 'web', '2021-02-03 07:34:03', '2021-02-03 07:34:03'),
(47, 'delete constant tax', 'web', '2021-02-03 07:34:03', '2021-02-03 07:34:03'),
(48, 'manage constant category', 'web', '2021-02-03 07:34:03', '2021-02-03 07:34:03'),
(49, 'create constant category', 'web', '2021-02-03 07:34:03', '2021-02-03 07:34:03'),
(50, 'edit constant category', 'web', '2021-02-03 07:34:03', '2021-02-03 07:34:03'),
(51, 'delete constant category', 'web', '2021-02-03 07:34:03', '2021-02-03 07:34:03'),
(52, 'manage product & service', 'web', '2021-02-03 07:34:03', '2021-02-03 07:34:03'),
(53, 'create product & service', 'web', '2021-02-03 07:34:03', '2021-02-03 07:34:03'),
(54, 'edit product & service', 'web', '2021-02-03 07:34:03', '2021-02-03 07:34:03'),
(55, 'delete product & service', 'web', '2021-02-03 07:34:03', '2021-02-03 07:34:03'),
(56, 'manage customer', 'web', '2021-02-03 07:34:03', '2021-02-03 07:34:03'),
(57, 'create customer', 'web', '2021-02-03 07:34:03', '2021-02-03 07:34:03'),
(58, 'edit customer', 'web', '2021-02-03 07:34:04', '2021-02-03 07:34:04'),
(59, 'delete customer', 'web', '2021-02-03 07:34:04', '2021-02-03 07:34:04'),
(60, 'manage vender', 'web', '2021-02-03 07:34:04', '2021-02-03 07:34:04'),
(61, 'create vender', 'web', '2021-02-03 07:34:04', '2021-02-03 07:34:04'),
(62, 'edit vender', 'web', '2021-02-03 07:34:04', '2021-02-03 07:34:04'),
(63, 'delete vender', 'web', '2021-02-03 07:34:04', '2021-02-03 07:34:04'),
(64, 'manage bank account', 'web', '2021-02-03 07:34:04', '2021-02-03 07:34:04'),
(65, 'create bank account', 'web', '2021-02-03 07:34:04', '2021-02-03 07:34:04'),
(66, 'edit bank account', 'web', '2021-02-03 07:34:04', '2021-02-03 07:34:04'),
(67, 'delete bank account', 'web', '2021-02-03 07:34:04', '2021-02-03 07:34:04'),
(68, 'manage transfer', 'web', '2021-02-03 07:34:04', '2021-02-03 07:34:04'),
(69, 'create transfer', 'web', '2021-02-03 07:34:04', '2021-02-03 07:34:04'),
(70, 'edit transfer', 'web', '2021-02-03 07:34:04', '2021-02-03 07:34:04'),
(71, 'delete transfer', 'web', '2021-02-03 07:34:04', '2021-02-03 07:34:04'),
(72, 'manage constant payment method', 'web', '2021-02-03 07:34:04', '2021-02-03 07:34:04'),
(73, 'create constant payment method', 'web', '2021-02-03 07:34:04', '2021-02-03 07:34:04'),
(74, 'edit constant payment method', 'web', '2021-02-03 07:34:05', '2021-02-03 07:34:05'),
(75, 'delete constant payment method', 'web', '2021-02-03 07:34:05', '2021-02-03 07:34:05'),
(76, 'manage transaction', 'web', '2021-02-03 07:34:05', '2021-02-03 07:34:05'),
(77, 'manage revenue', 'web', '2021-02-03 07:34:05', '2021-02-03 07:34:05'),
(78, 'create revenue', 'web', '2021-02-03 07:34:05', '2021-02-03 07:34:05'),
(79, 'edit revenue', 'web', '2021-02-03 07:34:06', '2021-02-03 07:34:06'),
(80, 'delete revenue', 'web', '2021-02-03 07:34:06', '2021-02-03 07:34:06'),
(81, 'manage bill', 'web', '2021-02-03 07:34:06', '2021-02-03 07:34:06'),
(82, 'create bill', 'web', '2021-02-03 07:34:06', '2021-02-03 07:34:06'),
(83, 'edit bill', 'web', '2021-02-03 07:34:06', '2021-02-03 07:34:06'),
(84, 'delete bill', 'web', '2021-02-03 07:34:06', '2021-02-03 07:34:06'),
(85, 'show bill', 'web', '2021-02-03 07:34:06', '2021-02-03 07:34:06'),
(86, 'manage payment', 'web', '2021-02-03 07:34:06', '2021-02-03 07:34:06'),
(87, 'create payment', 'web', '2021-02-03 07:34:06', '2021-02-03 07:34:06'),
(88, 'edit payment', 'web', '2021-02-03 07:34:06', '2021-02-03 07:34:06'),
(89, 'delete payment', 'web', '2021-02-03 07:34:06', '2021-02-03 07:34:06'),
(90, 'delete bill product', 'web', '2021-02-03 07:34:07', '2021-02-03 07:34:07'),
(91, 'buy plan', 'web', '2021-02-03 07:34:07', '2021-02-03 07:34:07'),
(92, 'send bill', 'web', '2021-02-03 07:34:07', '2021-02-03 07:34:07'),
(93, 'create payment bill', 'web', '2021-02-03 07:34:07', '2021-02-03 07:34:07'),
(94, 'delete payment bill', 'web', '2021-02-03 07:34:07', '2021-02-03 07:34:07'),
(95, 'manage order', 'web', '2021-02-03 07:34:07', '2021-02-03 07:34:07'),
(96, 'income report', 'web', '2021-02-03 07:34:07', '2021-02-03 07:34:07'),
(97, 'expense report', 'web', '2021-02-03 07:34:07', '2021-02-03 07:34:07'),
(98, 'income vs expense report', 'web', '2021-02-03 07:34:07', '2021-02-03 07:34:07'),
(99, 'tax report', 'web', '2021-02-03 07:34:07', '2021-02-03 07:34:07'),
(100, 'loss & profit report', 'web', '2021-02-03 07:34:07', '2021-02-03 07:34:07'),
(101, 'manage customer payment', 'web', '2021-02-03 07:34:07', '2021-02-03 07:34:07'),
(102, 'manage customer transaction', 'web', '2021-02-03 07:34:07', '2021-02-03 07:34:07'),
(103, 'manage customer invoice', 'web', '2021-02-03 07:34:07', '2021-02-03 07:34:07'),
(104, 'vender manage bill', 'web', '2021-02-03 07:34:07', '2021-02-03 07:34:07'),
(105, 'manage vender bill', 'web', '2021-02-03 07:34:07', '2021-02-03 07:34:07'),
(106, 'manage vender payment', 'web', '2021-02-03 07:34:07', '2021-02-03 07:34:07'),
(107, 'manage vender transaction', 'web', '2021-02-03 07:34:07', '2021-02-03 07:34:07'),
(108, 'manage credit note', 'web', '2021-02-03 07:34:08', '2021-02-03 07:34:08'),
(109, 'create credit note', 'web', '2021-02-03 07:34:08', '2021-02-03 07:34:08'),
(110, 'edit credit note', 'web', '2021-02-03 07:34:08', '2021-02-03 07:34:08'),
(111, 'delete credit note', 'web', '2021-02-03 07:34:08', '2021-02-03 07:34:08'),
(112, 'manage debit note', 'web', '2021-02-03 07:34:08', '2021-02-03 07:34:08'),
(113, 'create debit note', 'web', '2021-02-03 07:34:08', '2021-02-03 07:34:08'),
(114, 'edit debit note', 'web', '2021-02-03 07:34:08', '2021-02-03 07:34:08'),
(115, 'delete debit note', 'web', '2021-02-03 07:34:08', '2021-02-03 07:34:08'),
(116, 'duplicate invoice', 'web', '2021-02-03 07:34:08', '2021-02-03 07:34:08'),
(117, 'duplicate bill', 'web', '2021-02-03 07:34:08', '2021-02-03 07:34:08'),
(118, 'manage coupon', 'web', '2021-02-03 07:34:08', '2021-02-03 07:34:08'),
(119, 'create coupon', 'web', '2021-02-03 07:34:08', '2021-02-03 07:34:08'),
(120, 'edit coupon', 'web', '2021-02-03 07:34:08', '2021-02-03 07:34:08'),
(121, 'delete coupon', 'web', '2021-02-03 07:34:08', '2021-02-03 07:34:08'),
(122, 'manage proposal', 'web', '2021-02-03 07:34:08', '2021-02-03 07:34:08'),
(123, 'create proposal', 'web', '2021-02-03 07:34:08', '2021-02-03 07:34:08'),
(124, 'edit proposal', 'web', '2021-02-03 07:34:08', '2021-02-03 07:34:08'),
(125, 'delete proposal', 'web', '2021-02-03 07:34:08', '2021-02-03 07:34:08'),
(126, 'duplicate proposal', 'web', '2021-02-03 07:34:09', '2021-02-03 07:34:09'),
(127, 'show proposal', 'web', '2021-02-03 07:34:09', '2021-02-03 07:34:09'),
(128, 'send proposal', 'web', '2021-02-03 07:34:09', '2021-02-03 07:34:09'),
(129, 'delete proposal product', 'web', '2021-02-03 07:34:09', '2021-02-03 07:34:09'),
(130, 'manage customer proposal', 'web', '2021-02-03 07:34:09', '2021-02-03 07:34:09'),
(131, 'manage goal', 'web', '2021-02-03 07:34:09', '2021-02-03 07:34:09'),
(132, 'create goal', 'web', '2021-02-03 07:34:09', '2021-02-03 07:34:09'),
(133, 'edit goal', 'web', '2021-02-03 07:34:09', '2021-02-03 07:34:09'),
(134, 'delete goal', 'web', '2021-02-03 07:34:09', '2021-02-03 07:34:09'),
(135, 'manage assets', 'web', '2021-02-03 07:34:09', '2021-02-03 07:34:09'),
(136, 'create assets', 'web', '2021-02-03 07:34:09', '2021-02-03 07:34:09'),
(137, 'edit assets', 'web', '2021-02-03 07:34:09', '2021-02-03 07:34:09'),
(138, 'delete assets', 'web', '2021-02-03 07:34:09', '2021-02-03 07:34:09'),
(139, 'statement report', 'web', '2021-02-03 07:34:09', '2021-02-03 07:34:09'),
(140, 'manage constant custom field', 'web', '2021-02-03 07:34:09', '2021-02-03 07:34:09'),
(141, 'create constant custom field', 'web', '2021-02-03 07:34:10', '2021-02-03 07:34:10'),
(142, 'edit constant custom field', 'web', '2021-02-03 07:34:10', '2021-02-03 07:34:10'),
(143, 'delete constant custom field', 'web', '2021-02-03 07:34:10', '2021-02-03 07:34:10'),
(144, 'view journal', 'web', '2021-02-03 07:34:10', '2021-02-03 07:34:10'),
(145, 'view ledger', 'web', '2021-02-03 07:34:10', '2021-02-03 07:34:10'),
(146, 'delete plan', 'web', NULL, NULL),
(147, 'manage equities', 'web', '2021-02-03 07:34:10', '2021-02-03 07:34:10'),
(148, 'create equities', 'web', '2021-02-03 07:34:10', '2021-02-03 07:34:10'),
(149, 'edit equities', 'web', '2021-02-03 07:34:10', '2021-02-03 07:34:10'),
(150, 'delete equities', 'web', '2021-02-03 07:34:10', '2021-02-03 07:34:10'),
(151, 'manage liabilities', 'web', '2021-02-03 07:34:10', '2021-02-03 07:34:10'),
(152, 'create liabilities', 'web', '2021-02-03 07:34:10', '2021-02-03 07:34:10'),
(153, 'edit liabilities', 'web', '2021-02-03 07:34:10', '2021-02-03 07:34:10'),
(154, 'delete liabilities', 'web', '2021-02-03 07:34:10', '2021-02-03 07:34:10'),
(155, 'view balance sheet', 'web', '2021-02-03 07:34:10', '2021-02-03 07:34:10'),
(156, 'manage defaults', 'web', NULL, NULL),
(157, 'create defaults', 'web', NULL, NULL),
(158, 'edit defaults', 'web', NULL, NULL),
(159, 'destroy defaults', 'web', NULL, NULL),
(160, 'manage midtrans settings', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double(16,2) NOT NULL DEFAULT 0.00,
  `duration` varchar(100) NOT NULL,
  `max_users` int(11) NOT NULL DEFAULT 0,
  `max_bank_accounts` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `plans`
--

INSERT INTO `plans` (`id`, `name`, `price`, `duration`, `max_users`, `max_bank_accounts`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Premium', 99000.00, 'month', 5, 3, 'Untuk usaha menengah', NULL, '2021-03-17 03:16:01', '2021-12-04 14:01:23'),
(4, 'Enterprise', 299000.00, 'month', 10, 10, '', NULL, '2021-12-04 14:07:27', '2021-12-04 14:07:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_services`
--

CREATE TABLE `product_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `sku` varchar(191) NOT NULL,
  `sale_price` double(16,2) NOT NULL DEFAULT 0.00,
  `purchase_price` double(16,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `tax_id` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `unit_id` int(11) NOT NULL DEFAULT 0,
  `type` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_services`
--

INSERT INTO `product_services` (`id`, `name`, `sku`, `sale_price`, `purchase_price`, `quantity`, `tax_id`, `category_id`, `unit_id`, `type`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'Romain', 'Romain', 50000.00, 25000.00, 0, 8, 36, 8, 'product', '', 26, '2021-11-07 21:41:18', '2021-11-07 21:41:18'),
(3, 'Baby Romain', 'Baby Romain', 50000.00, 25000.00, 0, 8, 36, 8, 'product', '', 26, '2021-11-07 21:54:48', '2021-11-07 21:54:48'),
(4, 'sayur', '001', 10000.00, 8000.00, 9, 9, 9, 2, 'product', 'sayur sehat selalu', 20, '2021-11-10 07:05:36', '2022-04-11 05:51:38'),
(5, 'sayur a', '009', 10000.00, 8000.00, 0, 9, 9, 10, 'product', '', 20, '2021-11-10 07:30:01', '2021-11-10 07:30:01'),
(6, 'Benda', '7654', 8000.00, 7000.00, 4, 10, 41, 23, 'product', '', 27, '2021-11-25 05:07:28', '2022-01-20 17:31:47'),
(7, 'sayur', '0001', 10000.00, 5000.00, 0, 17, 95, 45, 'product', '', 33, '2021-12-04 20:48:50', '2021-12-04 20:48:50'),
(8, 'Barang', '765', 5000.00, 3000.00, 7, 11, 40, 12, 'product', NULL, 27, '2022-01-10 09:09:31', '2022-10-04 04:51:17'),
(9, 'Kecap', '10920', 5000.00, 2000.00, 14, 11, 40, 12, 'product', NULL, 27, '2022-02-15 07:11:26', '2022-05-12 05:43:04'),
(11, 'Gula', '12875', 8000.00, 4000.00, 30, 11, 40, 24, 'product', '', 27, '2022-02-15 07:11:26', '2022-05-11 15:02:21'),
(12, 'Kacang', '14830', 30000.00, 20000.00, 0, 10, 40, 18, 'product', NULL, 27, '2022-02-15 07:11:26', '2022-08-03 07:53:52'),
(13, 'Salak', '15807', 20000.00, 12000.00, 45, 10, 40, 24, 'product', NULL, 27, '2022-02-15 07:11:26', '2022-05-11 14:26:12'),
(14, 'admin', 'erdassas', 10000.00, 8000.00, 88, 29, 220, 87, 'product', 'test', 41, '2022-03-11 05:34:52', '2022-03-18 03:30:29'),
(15, 'buku', 'ppoewo', 890000.00, 780000.00, 99, 29, 220, 85, 'product', 'asdmo', 41, '2022-03-11 05:47:31', '2022-03-11 05:48:21'),
(18, 'gloves neomed size M', 'gloves neomed size M', 71000.00, 53500.00, 0, 42, 341, 132, 'product', '', 55, '2022-04-26 08:25:06', '2022-04-26 08:25:06'),
(19, 'Akun PPG', '001', 10000.00, 0.00, 9999999, 39, 289, 121, 'product', '', 51, '2022-05-11 14:09:41', '2022-11-09 19:13:35'),
(20, 'Akun Sekdin', '002', 10000.00, 0.00, 99999, 39, 289, 121, 'product', '', 51, '2022-05-11 14:10:10', '2022-11-09 19:13:35'),
(21, 'Server Standby', '003', 2900000.00, 0.00, 993, 39, 289, 158, 'service', '', 51, '2022-05-11 20:13:54', '2023-02-02 09:28:38'),
(22, 'Babi', '120', 10000.00, 9000.00, 118, 38, 285, 120, 'product', 'te', 50, '2022-05-17 09:43:19', '2022-05-17 10:21:13'),
(23, 'Keripik Kaca Lv.1 - 55gr D\'Lombok', 'KCA1L1', 8000.00, 4000.00, 99, 50, 400, 160, 'product', 'Keripik Kaca Pedas Daun Jeruk, Level 1 55gram\r\nD\'Lombok', 60, '2022-05-28 08:13:13', '2022-05-28 08:24:47'),
(24, 'Nasi Ayam GP Ori', '111', 14500.00, 9940.00, 1, 40, 310, 124, 'product', 'Nasi ayam geprek dengan sambal bawang', 54, '2022-06-09 08:47:36', '2022-06-09 08:47:36'),
(25, 'Nasi Ayam GP Terasi', '112', 14500.00, 9940.00, 1, 40, 310, 124, 'product', 'Nasi ayam geprek dengan sambal terasi', 54, '2022-06-09 08:48:39', '2022-06-09 08:48:39'),
(26, 'Ayam Gp S Bawang', '221', 13000.00, 8440.00, 1, 40, 311, 124, 'product', 'Ayam kriuk yang digeprek dengan sambal bawang', 54, '2022-06-09 08:58:26', '2022-06-09 08:58:26'),
(27, 'Ayam GP S Terasi', '222', 13000.00, 8440.00, 1, 40, 311, 124, 'product', '', 54, '2022-06-09 08:59:07', '2022-06-09 08:59:07'),
(28, 'Nasi Putih', '223', 3000.00, 1200.00, 1, 40, 311, 124, 'product', '', 54, '2022-06-09 09:00:30', '2022-06-09 09:00:43'),
(29, 'Gloves powder neomed', 'Gpn', 55000.00, 33000.00, 0, 26, 30, 62, 'product', '', 24, '2022-06-16 05:32:28', '2022-06-16 05:36:25'),
(30, 'sssss', '32', 10000.00, 4000.00, 100, 60, 522, 208, 'product', 'ssssss', 71, '2022-06-26 11:27:58', '2022-06-26 11:27:58'),
(31, 'Akta Pendirian PT dan SK Kemenkumham', 'Akta Pendirian PT dan SK Kemenkumham', 6000000.00, 600000.00, 997, 62, 538, 213, 'service', '', 72, '2022-07-20 04:27:00', '2022-07-25 08:54:27'),
(32, 'Pengurusan pengecekan sertipikat', 'Pengurusan pengecekan sertipikat', 500000.00, 250000.00, 991, 62, 546, 213, 'service', '', 72, '2022-07-20 04:31:32', '2022-09-27 06:34:40'),
(33, 'Pengurusan ploting sertipikat', 'Pengurusan  ploting sertipikat', 300000.00, 0.00, 989, 62, 539, 213, 'service', '', 72, '2022-07-20 04:40:30', '2022-09-27 06:34:40'),
(34, 'Akta Pendirian CV dan SK Kemenkumham', 'Akta Pendirian CV dan SK Kemenkumham', 3500000.00, 150000.00, 999, 62, 538, 213, 'service', '', 72, '2022-07-20 04:43:34', '2022-09-26 09:23:59'),
(35, 'Pengurusan Pendaftaran roya', 'Pengurusan Proses Pendaftaran roya', 1000000.00, 50000.00, 998, 62, 539, 213, 'service', '', 72, '2022-07-20 04:48:57', '2022-10-01 03:18:21'),
(36, 'Legalisasi Perjanjian Pembiayaan', 'Legalisasi Perjanjian Pembiayaan', 250000.00, 0.00, 996, 62, 539, 213, 'service', '', 72, '2022-07-20 04:51:20', '2022-09-27 06:34:40'),
(37, 'Legalisasi Struktur Perjanjian Pembiayaan', 'Legalisasi Struktur Perjanjian Pembiayaan', 250000.00, 0.00, 996, 62, 539, 213, 'service', '', 72, '2022-07-20 04:52:37', '2022-09-27 06:34:40'),
(38, 'APHT DAN PENDAFTARAN HT ONLINE', 'APHT DAN PENDAFTARAN HT ONLINE', 5000000.00, 0.00, 991, 62, 539, 213, 'service', '', 72, '2022-07-20 04:55:12', '2022-09-27 06:34:40'),
(39, 'PNBP HT', 'PNBP HT', 250000.00, 200000.00, 990, 62, 539, 213, 'service', '', 72, '2022-07-20 04:55:51', '2022-09-27 06:34:40'),
(40, 'Pk Notariil', 'Pk Notariil', 1250000.00, 0.00, 995, 62, 539, 213, 'service', '', 72, '2022-07-20 04:56:27', '2022-07-29 07:47:02'),
(41, 'SKMHT', 'SKMHT', 750000.00, 750000.00, 994, 62, 539, 213, 'service', '', 72, '2022-07-20 04:56:58', '2022-09-27 06:34:40'),
(42, 'Pengurusan Pengecekan Untuk Ht', 'Pengurusan Pengecekan Untuk Ht', 500000.00, 150000.00, 999, 62, 539, 213, 'service', '', 72, '2022-07-20 04:58:03', '2022-07-29 07:42:55'),
(43, 'Pengurusan Peningkatan Sertipikat SHGB ke SHM luas dibawah 200', 'Pengurusan Peningkatan Sertipikat SHGB ke SHM luas dibawah 200', 5000000.00, 1000000.00, 1001, 62, 539, 213, 'service', '', 72, '2022-07-20 04:59:27', '2022-07-29 06:23:46'),
(44, 'Akta Perubahan PT dan SK Kemenkumham', 'Akta Perubahan PT dan SK Kemenkumham', 5500000.00, 1200000.00, 997, 62, 538, 213, 'service', '', 72, '2022-07-20 05:00:32', '2022-08-29 04:55:59'),
(45, 'Akta Perubahan CV dan SK Kemenkumham', 'Akta Perubahan CV dan SK Kemenkumham', 3000000.00, 100000.00, 1001, 62, 538, 213, 'service', '', 72, '2022-07-20 05:06:12', '2022-07-25 05:23:39'),
(46, 'Akta Pendirian Yayasan dan SK Kemenkumham', 'Akta Pendirian Yayasan dan SK Kemenkumham', 6000000.00, 600000.00, 1001, 62, 538, 213, 'service', '', 72, '2022-07-20 05:07:09', '2022-07-25 05:23:48'),
(47, 'Akta Perubahan Yayasan dan SK Kemenkumham', 'Akta Perubahan Yayasan dan SK Kemenkumham', 5000000.00, 350000.00, 1001, 62, 538, 213, 'service', '', 72, '2022-07-20 05:20:08', '2022-07-25 05:23:57'),
(48, 'Akta Pendirian Perkumpulan dan SK Kemenkumham', 'Akta Pendirian Perkumpulan dan SK Kemenkumham', 6000000.00, 350000.00, 1001, 62, 538, 213, 'service', '', 72, '2022-07-20 05:20:37', '2022-07-25 05:24:06'),
(49, 'Akta Perubahan Perkumpulan dan SK Kemenkumham', 'Akta Perubahan Perkumpulan dan SK Kemenkumham', 5000000.00, 250000.00, 1001, 62, 538, 213, 'service', '', 72, '2022-07-20 05:21:07', '2022-07-25 05:24:15'),
(50, 'Pengurusan Pemekaran wilayah sertipikat', 'Pengurusan Pemekaran wilayah sertipikat', 1000000.00, 250000.00, 999, 62, 546, 213, 'service', '', 72, '2022-07-29 05:44:50', '2022-07-29 05:47:17'),
(51, 'Pengurusan Perpanjangan HGB luas dibawah 200', 'Pengurusan Perpanjangan HGB luas dibawah 200', 15000000.00, 7000000.00, 1000, 62, 546, 213, 'service', '', 72, '2022-07-29 06:21:26', '2022-07-29 07:42:55'),
(52, 'Pengurusan Pengecekan Sertipikat Kilat', 'Pengurusan Pengecekan Sertipikat Kilat', 1000000.00, 150000.00, 998, 62, 539, 213, 'service', '', 72, '2022-07-29 06:25:12', '2022-07-29 07:44:12'),
(53, 'Pengurusan Verifikasi dan Validasi Pajak BPHTB', 'Pengurusan Verifikasi dan Validasi Pajak BPHTB', 500000.00, 0.00, 1001, 62, 539, 213, 'product', '', 72, '2022-07-29 06:29:02', '2022-07-29 06:29:02'),
(54, 'Pengurusan SKB', 'Pengurusan SKB', 500000.00, 0.00, 1001, 62, 539, 213, 'service', '', 72, '2022-07-29 06:29:44', '2022-07-29 06:29:44'),
(55, 'Pengurusan Perbedaan Luas PBB', 'Pengurusan Perbedaan Luas PBB', 500000.00, 0.00, 1000, 62, 539, 213, 'service', '', 72, '2022-07-29 06:35:30', '2022-07-29 07:26:08'),
(56, 'Pengurusan Intip Sertipikat', 'Pengurusan Intip Sertipikat', 500000.00, 0.00, 996, 62, 539, 213, 'service', '', 72, '2022-07-29 06:52:18', '2022-07-29 07:47:02'),
(57, 'Legalisasi Surat Penyataan', 'Legalisasi Surat Penyataan', 250000.00, 0.00, 997, 62, 539, 213, 'service', '', 72, '2022-07-29 07:27:40', '2022-07-29 07:47:02'),
(58, 'Komputer lenovo', 'Komputer lenovo', 0.00, 9659033.00, 2, 62, 549, 213, 'product', '', 72, '2022-08-02 13:35:13', '2022-08-02 13:49:34'),
(59, 'Komputer HP', 'Komputer HP', 0.00, 7358033.00, 2, 62, 549, 213, 'product', '', 72, '2022-08-02 13:36:29', '2022-08-02 13:49:34'),
(60, 'AC Chang hong', 'AC Chang hong', 0.00, 5248033.00, 2, 62, 549, 213, 'product', '', 72, '2022-08-02 13:39:26', '2022-08-02 13:49:34'),
(61, 'Renovasi Ruko', 'Renovasi Ruko', 0.00, 44963200.00, 2, 62, 550, 216, 'product', '', 72, '2022-08-02 14:18:20', '2022-08-02 14:19:34'),
(62, 'Akari AC 0.5 PK', 'Akari AC 0.5 PK', 0.00, 2500000.00, 2, 62, 549, 213, 'product', '', 72, '2022-08-02 14:34:23', '2022-08-02 14:38:15'),
(63, 'AC Akari 1 PK', 'AC Akari 1 PK', 0.00, 3200000.00, 2, 62, 549, 212, 'product', '', 72, '2022-08-02 14:35:03', '2022-08-02 14:38:15'),
(64, 'Sertipikat Hilang', 'Sertipikat Hilang', 15000000.00, 0.00, 1000, 62, 546, 213, 'service', '', 72, '2022-08-03 06:27:59', '2022-08-03 06:28:37'),
(65, 'bakso', '001', 100000.00, 50000.00, 1, 27, 291, 122, 'product', '', 38, '2022-08-31 06:38:40', '2022-08-31 07:33:27'),
(66, 'jasa', 'lengkap', 100000000.00, 0.00, 0, 6, 30, 217, 'product', 'pembuatan web dan aplikasi Al Muslim', 24, '2022-09-10 14:40:56', '2022-09-10 14:43:12'),
(67, 'pembuatan IMB baru', 'pembuatan IMB baru', 5000000.00, 8000000.00, 0, 62, 537, 216, 'service', '', 72, '2022-09-12 12:10:14', '2022-09-12 12:11:18'),
(68, 'Down Payment Pembuatan LMS MyAlmuslim', '003', 25000000.00, 0.00, 10, 27, 291, 122, 'service', '', 38, '2022-09-14 03:56:48', '2022-11-09 20:23:59'),
(69, 'Pembuatan LMS MyAlmuslim', '004', 100000000.00, 0.00, 2, 27, 291, 122, 'service', '', 38, '2022-09-14 04:06:58', '2022-11-09 20:23:55'),
(70, 'Alpukat kocok Authentic', 'AKA', 12000.00, 0.00, 977, 63, 570, 219, 'service', '', 77, '2022-09-19 13:10:19', '2022-09-22 14:06:18'),
(71, 'Durian kocok', 'DK', 14800.00, 0.00, 986, 63, 570, 219, 'service', '', 77, '2022-09-19 13:11:39', '2022-09-22 14:06:18'),
(72, 'Strawberry Kocok', 'SK', 12000.00, 0.00, 992, 63, 570, 219, 'service', '', 77, '2022-09-19 14:17:48', '2022-09-22 14:06:18'),
(74, 'Mangga Kocok', 'MK', 12000.00, 0.00, 996, 63, 570, 219, 'service', '', 77, '2022-09-19 14:19:48', '2022-09-22 14:06:18'),
(75, 'Nangka Kocok', 'NK', 12000.00, 0.00, 997, 63, 570, 219, 'service', '', 77, '2022-09-19 14:21:12', '2022-09-22 14:06:18'),
(76, 'Akta Kuasa dan Persetujuan', 'Akta Kuasa dan Persetujuan', 0.00, 2500000.00, 0, 62, 538, 213, 'product', '', 72, '2022-09-21 04:03:52', '2022-09-21 04:04:32'),
(77, 'Leci squash', 'LS', 10000.00, 0.00, 999, 63, 570, 219, 'service', '', 77, '2022-09-21 10:02:42', '2022-09-22 14:06:18'),
(78, 'Orange squash', 'OS', 10000.00, 0.00, 998, 63, 570, 219, 'service', '', 77, '2022-09-21 10:03:44', '2022-09-22 14:06:18'),
(79, 'Melon squash', 'MS', 10000.00, 0.00, 998, 63, 570, 219, 'service', '', 77, '2022-09-21 10:05:01', '2022-09-22 14:06:18'),
(80, 'Strawberry squash', 'SS', 10000.00, 0.00, 999, 63, 570, 219, 'service', '', 77, '2022-09-21 10:06:08', '2022-09-22 14:06:18'),
(81, 'Fruit Puch squash', 'FS', 10000.00, 0.00, 998, 63, 570, 219, 'service', '', 77, '2022-09-21 10:07:06', '2022-09-22 14:06:18'),
(82, 'Queenberry mocktail', 'QM', 10000.00, 0.00, 999, 63, 570, 219, 'service', '', 77, '2022-09-21 10:08:55', '2022-09-22 14:06:18'),
(83, 'Green Tropical Mocktail', 'GM', 10000.00, 0.00, 997, 63, 570, 219, 'service', '', 77, '2022-09-21 10:09:48', '2022-09-22 14:06:18'),
(84, 'Jeju sparkling mocktail', 'JM', 10000.00, 0.00, 993, 63, 570, 219, 'service', '', 77, '2022-09-21 10:10:53', '2022-09-22 14:06:18'),
(85, 'Purple love pation mocktail', 'PM', 11500.00, 0.00, 999, 63, 570, 219, 'service', '', 77, '2022-09-21 10:12:13', '2022-09-22 14:06:18'),
(86, 'Winterberry Mocktail', 'WM', 11500.00, 0.00, 999, 63, 570, 219, 'service', '', 77, '2022-09-21 10:12:49', '2022-09-22 14:06:18'),
(87, 'Alpukat kocok klasik', 'AKK', 12000.00, 0.00, 989, 63, 570, 219, 'service', '', 77, '2022-09-21 10:15:05', '2022-09-22 14:06:18'),
(88, 'Topping buah', 'TB', 3000.00, 0.00, 994, 63, 570, 219, 'service', '', 77, '2022-09-22 06:45:31', '2022-09-22 14:06:18'),
(89, 'Transaksi Manual', '004', 10000.00, 0.00, 0, 39, 289, 121, 'service', 'Transaksi yang tidak melalui aplikasi', 51, '2022-12-01 11:39:26', '2022-12-01 11:48:37'),
(90, 'Rengginang', 'R1', 13000.00, 20000.00, 38, 67, 625, 233, 'product', '', 86, '2023-03-01 14:06:36', '2023-03-01 14:15:14'),
(91, 'Kerupuk Ikan', 'K1', 20000.00, 25000.00, 40, 67, 621, 227, 'product', '', 86, '2023-03-01 15:26:25', '2023-03-01 15:26:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_service_categories`
--

CREATE TABLE `product_service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL DEFAULT '0',
  `color` varchar(191) NOT NULL DEFAULT '#fc544b',
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_service_categories`
--

INSERT INTO `product_service_categories` (`id`, `name`, `type`, `color`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Produk', '0', '4ffa00', 19, '2021-07-21 23:50:57', '2021-07-21 23:50:57'),
(3, 'Pembelian', '2', 'ff5909', 19, '2021-07-21 23:50:57', '2021-07-21 23:50:57'),
(4, 'Perawatan Labu', '2', '45FF45', 19, '2021-07-22 00:18:56', '2021-07-22 00:49:24'),
(5, 'Pajak', '2', 'C28CFF', 19, '2021-07-22 00:19:40', '2021-07-22 00:19:51'),
(6, 'Panen Labu', '1', '40FF46', 19, '2021-07-22 00:29:23', '2021-07-22 00:29:23'),
(7, 'Panen Pisang', '1', '5454FF', 19, '2021-07-22 00:29:52', '2021-07-22 00:29:52'),
(8, 'Perawatan Jagung', '2', 'FFD52E', 19, '2021-07-22 00:43:56', '2021-07-22 00:56:04'),
(9, 'Produk', '0', '4ffa00', 20, '2021-07-24 08:37:29', '2021-07-24 08:37:29'),
(10, 'Akun CPNS', '1', '0097F8', 20, '2021-07-24 08:37:29', '2021-07-24 08:42:36'),
(11, 'Gaji', '2', 'FF5909', 20, '2021-07-24 08:37:29', '2021-07-24 09:34:56'),
(12, 'Akun P3K', '1', '81FF03', 20, '2021-07-24 08:42:57', '2021-07-24 08:42:57'),
(13, 'Penambahan Modal', '1', '9CD4FF', 19, '2021-07-27 21:57:39', '2021-07-27 21:57:39'),
(14, 'Produk', '0', '4ffa00', 21, '2021-08-21 22:38:27', '2021-08-21 22:38:27'),
(15, 'Ads Youtube', '1', '0097F8', 21, '2021-08-21 22:38:27', '2021-08-24 04:32:50'),
(16, 'Transport', '2', 'FF5909', 21, '2021-08-21 22:38:27', '2021-08-24 04:32:31'),
(17, 'Camp Kejar Tayang', '2', 'AF38FF', 20, '2021-08-23 21:38:25', '2021-08-23 21:38:25'),
(19, 'Konsumsi', '2', 'FFC642', 21, '2021-08-24 04:33:13', '2021-08-24 04:33:13'),
(20, 'Sewa alat', '2', 'FFEA61', 21, '2021-08-24 04:34:11', '2021-08-24 04:34:11'),
(21, 'Sewa Tempat', '2', 'FF63EF', 21, '2021-08-24 04:34:37', '2021-08-24 04:34:37'),
(22, 'RnD', '2', '7236FF', 20, '2021-08-25 10:40:36', '2021-08-25 10:40:36'),
(23, 'Produk', '0', '4ffa00', 22, '2021-08-29 10:53:25', '2021-08-29 10:53:25'),
(24, 'Penjualan', '1', '0097f8', 22, '2021-08-29 10:53:25', '2021-08-29 10:53:25'),
(25, 'Pembelian', '2', 'ff5909', 22, '2021-08-29 10:53:25', '2021-08-29 10:53:25'),
(26, 'Produk', '0', '4ffa00', 23, '2021-08-31 23:37:23', '2021-08-31 23:37:23'),
(27, 'Penjualan', '1', '0097f8', 23, '2021-08-31 23:37:23', '2021-08-31 23:37:23'),
(28, 'Pembelian', '2', 'ff5909', 23, '2021-08-31 23:37:23', '2021-08-31 23:37:23'),
(30, 'Produk', '0', '4ffa00', 24, '2021-10-21 06:25:36', '2021-10-21 06:25:36'),
(31, 'Penjualan', '1', '0097f8', 24, '2021-10-21 06:25:36', '2021-10-21 06:25:36'),
(32, 'Pembelian', '2', 'ff5909', 24, '2021-10-21 06:25:36', '2021-10-21 06:25:36'),
(33, 'Produk', '0', '4ffa00', 25, '2021-10-21 16:49:56', '2021-10-21 16:49:56'),
(34, 'Penjualan', '1', '0097f8', 25, '2021-10-21 16:49:56', '2021-10-21 16:49:56'),
(35, 'Pembelian', '2', 'ff5909', 25, '2021-10-21 16:49:56', '2021-10-21 16:49:56'),
(36, 'Produk', '0', '4ffa00', 26, '2021-11-07 21:40:13', '2021-11-07 21:40:13'),
(37, 'Penjualan', '1', '0097f8', 26, '2021-11-07 21:40:13', '2021-11-07 21:40:13'),
(38, 'Pembelian', '2', 'ff5909', 26, '2021-11-07 21:40:13', '2021-11-07 21:40:13'),
(39, 'Sewa Tempat', '2', 'FB85FF', 20, '2021-11-09 12:41:27', '2021-11-09 12:41:27'),
(40, 'Produk', '0', 'befba2', 27, NULL, NULL),
(41, 'Layanan jasa', '0', '87b771', 27, NULL, NULL),
(42, 'Penjualan', '1', '8ed1fb', 27, NULL, NULL),
(43, 'Penambahan modal', '1', 'b2d8f0', 27, NULL, NULL),
(44, 'Pendapatan lain', '1', 'adc4d2', 27, NULL, NULL),
(45, 'Pendapatan jasa', '1', '648ca6', 27, NULL, NULL),
(46, 'Hibah', '1', 'a5b2bb', 27, NULL, NULL),
(47, 'Pinjaman', '1', '5989ab', 27, NULL, NULL),
(48, 'Piutang', '1', '61a5d6', 27, NULL, NULL),
(49, 'Pembelian', '2', 'f0af8f', 27, NULL, NULL),
(50, 'Pembelian bahan baku', '2', 'eea0a0', 27, NULL, NULL),
(51, 'Biaya operasional', '2', 'f2cfa6', 27, NULL, NULL),
(52, 'Pengeluaran lain-lain', '2', 'c9907e', 27, NULL, NULL),
(53, 'Pembayaran utang', '2', 'e88e73', 27, NULL, NULL),
(54, 'Pemberian utang', '2', 'd7865b', 27, NULL, NULL),
(55, 'Produk', '0', 'befba2', 28, NULL, NULL),
(56, 'Layanan jasa', '0', '87b771', 28, NULL, NULL),
(57, 'Penjualan', '1', '8ed1fb', 28, NULL, NULL),
(58, 'Penambahan modal', '1', 'b2d8f0', 28, NULL, NULL),
(59, 'Pendapatan lain', '1', 'adc4d2', 28, NULL, NULL),
(60, 'Pendapatan jasa', '1', '648ca6', 28, NULL, NULL),
(61, 'Hibah', '1', 'a5b2bb', 28, NULL, NULL),
(62, 'Pinjaman', '1', '5989ab', 28, NULL, NULL),
(63, 'Piutang', '1', '61a5d6', 28, NULL, NULL),
(64, 'Pembelian', '2', 'f0af8f', 28, NULL, NULL),
(65, 'Pembelian bahan baku', '2', 'eea0a0', 28, NULL, NULL),
(66, 'Biaya operasional', '2', 'f2cfa6', 28, NULL, NULL),
(67, 'Pengeluaran lain-lain', '2', 'c9907e', 28, NULL, NULL),
(68, 'Pembayaran utang', '2', 'e88e73', 28, NULL, NULL),
(69, 'Pemberian utang', '2', 'd7865b', 28, NULL, NULL),
(70, 'Penjualan', '1', '9A91D9', 29, NULL, NULL),
(71, 'Pinjaman', '1', '798AC7', 29, NULL, NULL),
(72, 'Piutang', '1', '7DADD4', 29, NULL, NULL),
(73, 'Pendapatan Jasa', '1', 'DACFFF', 29, NULL, NULL),
(74, 'Pendapatan Lain', '1', 'F4C2FF', 29, NULL, NULL),
(75, 'Biaya Operasional', '2', 'FFB899', 29, NULL, NULL),
(76, 'Pajak', '2', 'C4996E', 29, NULL, NULL),
(77, 'Pembelian Bahan Baku', '2', 'FF8F73', 29, NULL, NULL),
(78, 'Pengeluaran Lain-lain', '2', 'FFA845', 29, NULL, NULL),
(79, 'Layanan Jasa', '0', '87FFD3', 29, NULL, NULL),
(80, 'Produk Organik', '0', 'D1FFA8', 29, NULL, NULL),
(81, 'Penjualan', '1', '9A91D9', 32, NULL, NULL),
(82, 'Piutang', '1', '7DADD4', 32, NULL, NULL),
(83, 'Pembelian Stok Barang', '2', 'FF5959', 32, NULL, NULL),
(84, 'Pemberian Utang', '2', 'FFC561', 32, NULL, NULL),
(85, 'Pengeluaran Lain-lain', '2', 'FFA845', 32, NULL, NULL),
(86, 'Produk Organik', '0', 'D1FFA8', 32, NULL, NULL),
(87, 'sogokan orang', '1', '0087f8', 33, NULL, NULL),
(88, 'Pendapatan Jasa', '1', 'DACFFF', 33, NULL, NULL),
(89, 'Penjualan', '1', '9A91D9', 33, NULL, NULL),
(90, 'Gaji', '2', 'FFB675', 33, NULL, NULL),
(91, 'Pajak', '2', 'C4996E', 33, NULL, NULL),
(92, 'Biaya Operasional', '2', 'FFB899', 33, NULL, NULL),
(93, 'Administrasi Bank', '2', 'FF8C7A', 33, NULL, NULL),
(94, 'sogok', '2', '996b69', 33, NULL, NULL),
(95, 'Produk Lokal', '0', '8CFF94', 33, NULL, NULL),
(96, 'grosir', '0', '3B9DFF', 33, '2021-12-04 20:52:03', '2021-12-04 20:52:03'),
(97, 'Pendapatan Jasa', '1', 'DACFFF', 34, NULL, NULL),
(98, 'Penjualan', '1', '9A91D9', 34, NULL, NULL),
(99, 'Piutang', '1', '7DADD4', 34, NULL, NULL),
(100, 'Penambahan Modal', '1', '99B1FF', 34, NULL, NULL),
(101, 'Pendapatan Lain', '1', 'F4C2FF', 34, NULL, NULL),
(102, 'Pinjaman', '1', '798AC7', 34, NULL, NULL),
(103, 'Hibah', '1', '54AFFF', 34, NULL, NULL),
(104, 'Administrasi Bank', '2', 'FF8C7A', 34, NULL, NULL),
(105, 'Biaya Operasional', '2', 'FFB899', 34, NULL, NULL),
(106, 'Bonus', '2', 'FF9D47', 34, NULL, NULL),
(107, 'Donasi', '2', 'CF885F', 34, NULL, NULL),
(108, 'Gaji', '2', 'FFB675', 34, NULL, NULL),
(109, 'Pajak', '2', 'C4996E', 34, NULL, NULL),
(110, 'Pemberian Utang', '2', 'FFC561', 34, NULL, NULL),
(111, 'Pengeluaran Lain-lain', '2', 'FFA845', 34, NULL, NULL),
(112, 'Utilitas', '2', 'FF773D', 34, NULL, NULL),
(113, 'Pembayaran Hutang', '2', 'FFCD78', 34, NULL, NULL),
(114, 'Layanan Jasa', '0', '87FFD3', 34, NULL, NULL),
(115, 'Pendapatan Jasa', '1', 'DACFFF', 35, NULL, NULL),
(116, 'Penambahan Modal', '1', '99B1FF', 35, NULL, NULL),
(117, 'Pendapatan Lain', '1', 'F4C2FF', 35, NULL, NULL),
(118, 'Penjualan', '1', '9A91D9', 35, NULL, NULL),
(119, 'Pinjaman', '1', '798AC7', 35, NULL, NULL),
(120, 'Piutang', '1', '7DADD4', 35, NULL, NULL),
(121, 'Hibah', '1', '54AFFF', 35, NULL, NULL),
(122, 'Administrasi Bank', '2', 'FF8C7A', 35, NULL, NULL),
(123, 'Biaya Operasional', '2', 'FFB899', 35, NULL, NULL),
(124, 'Gaji', '2', 'FFB675', 35, NULL, NULL),
(125, 'Pajak', '2', 'C4996E', 35, NULL, NULL),
(126, 'Bonus', '2', 'FF9D47', 35, NULL, NULL),
(127, 'Pembelian Bahan Baku', '2', 'FF8F73', 35, NULL, NULL),
(128, 'Pembelian Stok Barang', '2', 'FF5959', 35, NULL, NULL),
(129, 'Pemberian Utang', '2', 'FFC561', 35, NULL, NULL),
(130, 'Utilitas', '2', 'FF773D', 35, NULL, NULL),
(131, 'Pengeluaran Lain-lain', '2', 'FFA845', 35, NULL, NULL),
(132, 'Pembayaran Hutang', '2', 'FFCD78', 35, NULL, NULL),
(133, 'Layanan Jasa', '0', '87FFD3', 35, NULL, NULL),
(134, 'Produk Lokal', '0', '8CFF94', 35, NULL, NULL),
(135, 'Penjualan', '1', '9A91D9', 36, NULL, NULL),
(136, 'Hibah', '1', '54AFFF', 36, NULL, NULL),
(137, 'Administrasi Bank', '2', 'FF8C7A', 36, NULL, NULL),
(138, 'Biaya Operasional', '2', 'FFB899', 36, NULL, NULL),
(139, 'Bonus', '2', 'FF9D47', 36, NULL, NULL),
(140, 'Donasi', '2', 'CF885F', 36, NULL, NULL),
(141, 'Gaji', '2', 'FFB675', 36, NULL, NULL),
(142, 'Pajak', '2', 'C4996E', 36, NULL, NULL),
(143, 'Pembayaran Hutang', '2', 'FFCD78', 36, NULL, NULL),
(144, 'Pembelian Bahan Baku', '2', 'FF8F73', 36, NULL, NULL),
(145, 'Pembelian Stok Barang', '2', 'FF5959', 36, NULL, NULL),
(146, 'Pengeluaran Lain-lain', '2', 'FFA845', 36, NULL, NULL),
(147, 'Utilitas', '2', 'FF773D', 36, NULL, NULL),
(148, 'Produk Lokal', '0', '8CFF94', 36, NULL, NULL),
(149, 'Pinjaman', '1', '798AC7', 37, NULL, NULL),
(150, 'Piutang', '1', '7DADD4', 37, NULL, NULL),
(151, 'Penjualan', '1', '9A91D9', 37, NULL, NULL),
(152, 'Penambahan Modal', '1', '99B1FF', 37, NULL, NULL),
(153, 'Pajak', '2', 'C4996E', 37, NULL, NULL),
(154, 'Utilitas', '2', 'FF773D', 37, NULL, NULL),
(155, 'Bonus', '2', 'FF9D47', 37, NULL, NULL),
(156, 'Biaya Operasional', '2', 'FFB899', 37, NULL, NULL),
(157, 'Pengeluaran Lain-lain', '2', 'FFA845', 37, NULL, NULL),
(158, 'Layanan Jasa', '0', '87FFD3', 37, NULL, NULL),
(159, 'Produk Impor', '0', 'BFFFDB', 37, NULL, NULL),
(160, 'Produk Premium', '0', '9AFF4D', 37, NULL, NULL),
(161, 'Pinjaman', '1', '798AC7', 24, NULL, NULL),
(162, 'Piutang', '1', '7DADD4', 24, NULL, NULL),
(163, 'Penjualan', '1', '9A91D9', 24, NULL, NULL),
(164, 'Pendapatan Jasa', '1', 'DACFFF', 24, NULL, NULL),
(165, 'Pendapatan Lain', '1', 'F4C2FF', 24, NULL, NULL),
(166, 'Utilitas', '2', 'FF773D', 24, NULL, NULL),
(167, 'Bonus', '2', 'FF9D47', 24, NULL, NULL),
(168, 'Pembelian Stok Barang', '2', 'FF5959', 24, NULL, NULL),
(169, 'Pembelian Bahan Baku', '2', 'FF8F73', 24, NULL, NULL),
(170, 'Biaya Operasional', '2', 'FFB899', 24, NULL, NULL),
(171, 'Pengeluaran Lain-lain', '2', 'FFA845', 24, NULL, NULL),
(172, 'Gaji', '2', 'FFB675', 24, NULL, NULL),
(173, 'Administrasi Bank', '2', 'FF8C7A', 24, NULL, NULL),
(174, 'Pajak', '2', 'C4996E', 24, NULL, NULL),
(175, 'Layanan Jasa', '0', '87FFD3', 24, NULL, NULL),
(176, 'Produk Lokal', '0', '8CFF94', 24, NULL, NULL),
(177, 'Presentee', '1', '241FB8', 38, NULL, '2022-03-15 17:15:24'),
(178, 'Kazhier', '1', '0087F8', 38, NULL, '2022-11-10 03:34:33'),
(179, 'Utilitas', '2', 'FF773D', 38, NULL, NULL),
(180, 'Gaji', '2', 'FFB675', 38, NULL, NULL),
(181, 'Pembelian Stok Barang', '2', 'FF5959', 38, NULL, NULL),
(183, 'Pinjaman', '1', '798AC7', 39, NULL, NULL),
(184, 'Piutang', '1', '7DADD4', 39, NULL, NULL),
(185, 'Penjualan', '1', '9A91D9', 39, NULL, NULL),
(186, 'Penambahan Modal', '1', '99B1FF', 39, NULL, NULL),
(187, 'Pendapatan Jasa', '1', 'DACFFF', 39, NULL, NULL),
(188, 'Pendapatan Lain', '1', 'F4C2FF', 39, NULL, NULL),
(189, 'Hibah', '1', '54AFFF', 39, NULL, NULL),
(190, 'Pajak', '2', 'C4996E', 39, NULL, NULL),
(191, 'Utilitas', '2', 'FF773D', 39, NULL, NULL),
(192, 'Bonus', '2', 'FF9D47', 39, NULL, NULL),
(193, 'Pembelian Stok Barang', '2', 'FF5959', 39, NULL, NULL),
(194, 'Biaya Operasional', '2', 'FFB899', 39, NULL, NULL),
(195, 'Pembelian Bahan Baku', '2', 'FF8F73', 39, NULL, NULL),
(196, 'Pengeluaran Lain-lain', '2', 'FFA845', 39, NULL, NULL),
(197, 'Pembayaran Hutang', '2', 'FFCD78', 39, NULL, NULL),
(198, 'Pemberian Utang', '2', 'FFC561', 39, NULL, NULL),
(199, 'Donasi', '2', 'CF885F', 39, NULL, NULL),
(200, 'Gaji', '2', 'FFB675', 39, NULL, NULL),
(201, 'Administrasi Bank', '2', 'FF8C7A', 39, NULL, NULL),
(202, 'Layanan Jasa', '0', '87FFD3', 39, NULL, NULL),
(203, 'Produk Organik', '0', 'D1FFA8', 39, NULL, NULL),
(204, 'Produk Impor', '0', 'BFFFDB', 39, NULL, NULL),
(205, 'Produk Premium', '0', '9AFF4D', 39, NULL, NULL),
(206, 'Produk Lokal', '0', '8CFF94', 39, NULL, NULL),
(207, 'Penjualan', '1', '9A91D9', 41, NULL, NULL),
(208, 'Pendapatan Lain', '1', 'F4C2FF', 41, NULL, NULL),
(209, 'Pendapatan Jasa', '1', 'DACFFF', 41, NULL, NULL),
(210, 'Penambahan Modal', '1', '99B1FF', 41, NULL, NULL),
(211, 'Hibah', '1', '54AFFF', 41, NULL, NULL),
(212, 'Piutang', '1', '7DADD4', 41, NULL, NULL),
(213, 'Pinjaman', '1', '798AC7', 41, NULL, NULL),
(214, 'Pajak', '2', 'C4996E', 41, NULL, NULL),
(215, 'Utilitas', '2', 'FF773D', 41, NULL, NULL),
(216, 'Bonus', '2', 'FF9D47', 41, NULL, NULL),
(217, 'Pembelian Stok Barang', '2', 'FF5959', 41, NULL, NULL),
(218, 'Pengeluaran Lain-lain', '2', 'FFA845', 41, NULL, NULL),
(219, 'Layanan Jasa', '0', '87FFD3', 41, NULL, NULL),
(220, 'Produk Lokal', '0', '8CFF94', 41, NULL, NULL),
(221, 'Nahini', '1', 'FFC259', 38, '2022-03-15 17:14:18', '2022-11-10 03:34:24'),
(222, 'Pinjaman', '1', '798AC7', 43, NULL, NULL),
(223, 'Piutang', '1', '7DADD4', 43, NULL, NULL),
(224, 'Penjualan', '1', '9A91D9', 43, NULL, NULL),
(225, 'Pajak', '2', 'C4996E', 43, NULL, NULL),
(226, 'Utilitas', '2', 'FF773D', 43, NULL, NULL),
(227, 'Bonus', '2', 'FF9D47', 43, NULL, NULL),
(228, 'Pembelian Stok Barang', '2', 'FF5959', 43, NULL, NULL),
(229, 'Gaji', '2', 'FFB675', 43, NULL, NULL),
(230, 'Layanan Jasa', '0', '87FFD3', 43, NULL, NULL),
(231, 'produk segar', '0', '70f880', 43, NULL, NULL),
(232, 'Pajak', '2', 'C4996E', 43, NULL, NULL),
(233, 'Utilitas', '2', 'FF773D', 43, NULL, NULL),
(234, 'Bonus', '2', 'FF9D47', 43, NULL, NULL),
(235, 'Gaji', '2', 'FFB675', 43, NULL, NULL),
(236, 'Donasi', '2', 'CF885F', 43, NULL, NULL),
(237, 'Layanan Jasa', '0', '87FFD3', 43, NULL, NULL),
(238, 'Pajak', '2', 'C4996E', 43, NULL, NULL),
(239, 'Utilitas', '2', 'FF773D', 43, NULL, NULL),
(240, 'Bonus', '2', 'FF9D47', 43, NULL, NULL),
(241, 'Layanan Jasa', '0', '87FFD3', 43, NULL, NULL),
(242, 'Pinjaman', '1', '798AC7', 44, NULL, NULL),
(243, 'Piutang', '1', '7DADD4', 44, NULL, NULL),
(244, 'Penjualan', '1', '9A91D9', 44, NULL, NULL),
(245, 'Pajak', '2', 'C4996E', 44, NULL, NULL),
(246, 'Utilitas', '2', 'FF773D', 44, NULL, NULL),
(247, 'Bonus', '2', 'FF9D47', 44, NULL, NULL),
(248, 'Gaji', '2', 'FFB675', 44, NULL, NULL),
(249, 'Layanan Jasa', '0', '87FFD3', 44, NULL, NULL),
(250, 'Produk Impor', '0', 'BFFFDB', 44, NULL, NULL),
(251, 'Pinjaman', '1', '798AC7', 45, NULL, NULL),
(252, 'Piutang', '1', '7DADD4', 45, NULL, NULL),
(253, 'Penjualan', '1', '9A91D9', 45, NULL, NULL),
(254, 'Pajak', '2', 'C4996E', 45, NULL, NULL),
(255, 'Utilitas', '2', 'FF773D', 45, NULL, NULL),
(256, 'Bonus', '2', 'FF9D47', 45, NULL, NULL),
(257, 'Pembelian Stok Barang', '2', 'FF5959', 45, NULL, NULL),
(258, 'Biaya Operasional', '2', 'FFB899', 45, NULL, NULL),
(259, 'Pembelian Bahan Baku', '2', 'FF8F73', 45, NULL, NULL),
(260, 'Layanan Jasa', '0', '87FFD3', 45, NULL, NULL),
(261, 'Produk Lokal', '0', '8CFF94', 45, NULL, NULL),
(262, 'Produk Impor', '0', 'BFFFDB', 45, NULL, NULL),
(263, 'Pinjaman', '1', '798AC7', 46, NULL, NULL),
(264, 'Piutang', '1', '7DADD4', 46, NULL, NULL),
(265, 'Penjualan', '1', '9A91D9', 46, NULL, NULL),
(266, 'Pajak', '2', 'C4996E', 46, NULL, NULL),
(267, 'Utilitas', '2', 'FF773D', 46, NULL, NULL),
(268, 'Bonus', '2', 'FF9D47', 46, NULL, NULL),
(269, 'Pembelian Stok Barang', '2', 'FF5959', 46, NULL, NULL),
(270, 'Biaya Operasional', '2', 'FFB899', 46, NULL, NULL),
(271, 'Pembelian Bahan Baku', '2', 'FF8F73', 46, NULL, NULL),
(272, 'Layanan Jasa', '0', '87FFD3', 46, NULL, NULL),
(273, 'Produk Lokal', '0', '8CFF94', 46, NULL, NULL),
(274, 'Produk Impor', '0', 'BFFFDB', 46, NULL, NULL),
(275, 'Pinjaman', '1', '798AC7', 47, NULL, NULL),
(276, 'Piutang', '1', '7DADD4', 47, NULL, NULL),
(277, 'Pajak', '2', 'C4996E', 47, NULL, NULL),
(278, 'Utilitas', '2', 'FF773D', 47, NULL, NULL),
(279, 'Bonus', '2', 'FF9D47', 47, NULL, NULL),
(280, 'Layanan Jasa', '0', '87FFD3', 47, NULL, NULL),
(281, 'Akun SiapASN', '1', '0087f8', 50, NULL, NULL),
(283, 'Utilitas', '2', 'FF773D', 50, NULL, NULL),
(284, 'Gaji', '2', 'FFB675', 50, NULL, NULL),
(285, 'Layanan Jasa', '0', '87FFD3', 50, NULL, NULL),
(286, 'Sistem Try Out', '1', '0087F8', 51, NULL, '2022-05-11 20:35:49'),
(287, 'Utilitas', '2', 'FF773D', 51, NULL, NULL),
(288, 'Gaji', '2', 'FFB675', 51, NULL, NULL),
(289, 'Layanan Jasa', '0', '87FFD3', 51, NULL, NULL),
(290, 'Penjualan', '2', '0087ff', 27, '2022-04-15 07:34:51', '2022-04-15 07:34:51'),
(291, 'Presentee', '0', 'DA61FF', 38, '2022-04-17 21:24:16', '2022-04-17 21:24:16'),
(292, 'Pinjaman', '1', '798AC7', 54, NULL, NULL),
(293, 'Piutang', '1', '7DADD4', 54, NULL, NULL),
(294, 'Penjualan', '1', '9A91D9', 54, NULL, NULL),
(295, 'Penambahan Modal', '1', '99B1FF', 54, NULL, NULL),
(296, 'Pendapatan Lain', '1', 'F4C2FF', 54, NULL, NULL),
(297, 'Pendapatan Jasa', '1', 'DACFFF', 54, NULL, NULL),
(298, 'Hibah', '1', '54AFFF', 54, NULL, NULL),
(299, 'Pajak', '2', 'C4996E', 54, NULL, NULL),
(300, 'Utilitas', '2', 'FF773D', 54, NULL, NULL),
(301, 'Bonus', '2', 'FF9D47', 54, NULL, NULL),
(302, 'Pembelian Stok Barang', '2', 'FF5959', 54, NULL, NULL),
(303, 'Pembelian Bahan Baku', '2', 'FF8F73', 54, NULL, NULL),
(304, 'Biaya Operasional', '2', 'FFB899', 54, NULL, NULL),
(305, 'Pengeluaran Lain-lain', '2', 'FFA845', 54, NULL, NULL),
(306, 'Pembayaran Hutang', '2', 'FFCD78', 54, NULL, NULL),
(307, 'Pemberian Utang', '2', 'FFC561', 54, NULL, NULL),
(308, 'Gaji', '2', 'FFB675', 54, NULL, NULL),
(309, 'Administrasi Bank', '2', 'FF8C7A', 54, NULL, NULL),
(310, 'Nasi Ayam Geprek', '0', '70F880', 54, NULL, '2022-06-09 08:44:46'),
(311, 'Ala Carte', '0', '70F880', 54, NULL, '2022-06-09 08:45:20'),
(320, 'Penjualan', '1', '9A91D9', 55, NULL, NULL),
(321, 'Penambahan Modal', '1', '99B1FF', 55, NULL, NULL),
(322, 'Pendapatan Lain', '1', 'F4C2FF', 55, NULL, NULL),
(323, 'Pendapatan Jasa', '1', 'DACFFF', 55, NULL, NULL),
(324, 'Pinjaman', '1', '798AC7', 55, NULL, NULL),
(325, 'Piutang', '1', '7DADD4', 55, NULL, NULL),
(326, 'Pajak', '2', 'C4996E', 55, NULL, NULL),
(327, 'Utilitas', '2', 'FF773D', 55, NULL, NULL),
(328, 'Bonus', '2', 'FF9D47', 55, NULL, NULL),
(329, 'Pembelian Stok Barang', '2', 'FF5959', 55, NULL, NULL),
(330, 'Pembelian Bahan Baku', '2', 'FF8F73', 55, NULL, NULL),
(331, 'Biaya Operasional', '2', 'FFB899', 55, NULL, NULL),
(332, 'Pengeluaran Lain-lain', '2', 'FFA845', 55, NULL, NULL),
(333, 'Pembayaran Hutang', '2', 'FFCD78', 55, NULL, NULL),
(334, 'Pemberian Utang', '2', 'FFC561', 55, NULL, NULL),
(335, 'Gaji', '2', 'FFB675', 55, NULL, NULL),
(336, 'Donasi', '2', 'CF885F', 55, NULL, NULL),
(337, 'Administrasi Bank', '2', 'FF8C7A', 55, NULL, NULL),
(338, 'Layanan Jasa', '0', '87FFD3', 55, NULL, NULL),
(339, 'Laboratory', '0', '70f880', 55, NULL, NULL),
(340, 'Radiologi', '0', '70f880', 55, NULL, NULL),
(341, 'Disposible', '0', '70f880', 55, NULL, NULL),
(342, 'Hibah', '1', '54AFFF', 32, NULL, NULL),
(343, 'Pajak', '2', 'C4996E', 32, NULL, NULL),
(344, 'Utilitas', '2', 'FF773D', 32, NULL, NULL),
(345, 'Bonus', '2', 'FF9D47', 32, NULL, NULL),
(346, 'Produk Impor', '0', 'BFFFDB', 32, NULL, NULL),
(347, 'Produk Lokal', '0', '8CFF94', 32, NULL, NULL),
(348, 'Produk Premium', '0', '9AFF4D', 32, NULL, NULL),
(349, 'Penjualan', '1', '9A91D9', 56, NULL, NULL),
(350, 'Pendapatan Jasa', '1', 'DACFFF', 56, NULL, NULL),
(351, 'Pendapatan referal', '1', '0087f8', 56, NULL, NULL),
(353, 'Pajak', '2', 'C4996E', 56, NULL, NULL),
(354, 'Utilitas', '2', 'FF773D', 56, NULL, NULL),
(355, 'Biaya Operasional', '2', 'FFB899', 56, NULL, NULL),
(356, 'Produk Organik', '0', 'D1FFA8', 56, NULL, NULL),
(357, 'Layanan Jasa', '0', '87FFD3', 56, NULL, NULL),
(358, 'Pinjaman', '1', '798AC7', 58, NULL, NULL),
(359, 'Piutang', '1', '7DADD4', 58, NULL, NULL),
(360, 'Pajak', '2', 'C4996E', 58, NULL, NULL),
(361, 'Utilitas', '2', 'FF773D', 58, NULL, NULL),
(362, 'Bonus', '2', 'FF9D47', 58, NULL, NULL),
(363, 'Layanan Jasa', '0', '87FFD3', 58, NULL, NULL),
(364, 'Pendapatan Jasa', '1', 'DACFFF', 59, NULL, NULL),
(365, 'Pinjaman', '1', '798AC7', 59, NULL, NULL),
(366, 'Penambahan Modal', '1', '99B1FF', 59, NULL, NULL),
(367, 'Hibah', '1', '54AFFF', 59, NULL, NULL),
(368, 'Piutang', '1', '7DADD4', 59, NULL, NULL),
(369, 'Penjualan', '1', '9A91D9', 59, NULL, NULL),
(370, 'Pendapatan Lain', '1', 'F4C2FF', 59, NULL, NULL),
(371, 'Pajak', '2', 'C4996E', 59, NULL, NULL),
(372, 'Utilitas', '2', 'FF773D', 59, NULL, NULL),
(373, 'Bonus', '2', 'FF9D47', 59, NULL, NULL),
(374, 'Biaya Operasional', '2', 'FFB899', 59, NULL, NULL),
(375, 'Pengeluaran Lain-lain', '2', 'FFA845', 59, NULL, NULL),
(376, 'Pembayaran Hutang', '2', 'FFCD78', 59, NULL, NULL),
(377, 'Pemberian Utang', '2', 'FFC561', 59, NULL, NULL),
(378, 'Donasi', '2', 'CF885F', 59, NULL, NULL),
(379, 'Gaji', '2', 'FFB675', 59, NULL, NULL),
(380, 'Administrasi Bank', '2', 'FF8C7A', 59, NULL, NULL),
(381, 'Pembelian Bahan Baku', '2', 'FF8F73', 59, NULL, NULL),
(382, 'Pembelian Stok Barang', '2', 'FF5959', 59, NULL, NULL),
(383, 'Layanan Jasa', '0', '87FFD3', 59, NULL, NULL),
(384, 'Pinjaman', '1', '798AC7', 60, NULL, NULL),
(385, 'Piutang', '1', '7DADD4', 60, NULL, NULL),
(386, 'Penjualan', '1', '9A91D9', 60, NULL, NULL),
(387, 'Pendapatan Lain', '1', 'F4C2FF', 60, NULL, NULL),
(388, 'Penambahan Modal', '1', '99B1FF', 60, NULL, NULL),
(389, 'Pajak', '2', 'C4996E', 60, NULL, NULL),
(390, 'Utilitas', '2', 'FF773D', 60, NULL, NULL),
(391, 'Bonus', '2', 'FF9D47', 60, NULL, NULL),
(392, 'Pembelian Stok Barang', '2', 'FF5959', 60, NULL, NULL),
(393, 'Pembelian Bahan Baku', '2', 'FF8F73', 60, NULL, NULL),
(394, 'Biaya Operasional', '2', 'FFB899', 60, NULL, NULL),
(395, 'Pengeluaran Lain-lain', '2', 'FFA845', 60, NULL, NULL),
(396, 'Gaji', '2', 'FFB675', 60, NULL, NULL),
(397, 'Donasi', '2', 'CF885F', 60, NULL, NULL),
(398, 'Administrasi Bank', '2', 'FF8C7A', 60, NULL, NULL),
(399, 'Layanan Jasa', '0', '87FFD3', 60, NULL, NULL),
(400, 'Produk Lokal', '0', '8CFF94', 60, NULL, NULL),
(401, 'Produk Premium', '0', '9AFF4D', 60, NULL, NULL),
(402, 'Pinjaman', '1', '798AC7', 60, NULL, NULL),
(403, 'Piutang', '1', '7DADD4', 60, NULL, NULL),
(404, 'Penjualan', '1', '9A91D9', 60, NULL, NULL),
(405, 'Pendapatan Lain', '1', 'F4C2FF', 60, NULL, NULL),
(406, 'Penambahan Modal', '1', '99B1FF', 60, NULL, NULL),
(407, 'Pajak', '2', 'C4996E', 60, NULL, NULL),
(408, 'Utilitas', '2', 'FF773D', 60, NULL, NULL),
(409, 'Bonus', '2', 'FF9D47', 60, NULL, NULL),
(410, 'Pembelian Stok Barang', '2', 'FF5959', 60, NULL, NULL),
(411, 'Pembelian Bahan Baku', '2', 'FF8F73', 60, NULL, NULL),
(412, 'Biaya Operasional', '2', 'FFB899', 60, NULL, NULL),
(413, 'Pengeluaran Lain-lain', '2', 'FFA845', 60, NULL, NULL),
(414, 'Donasi', '2', 'CF885F', 60, NULL, NULL),
(415, 'Gaji', '2', 'FFB675', 60, NULL, NULL),
(416, 'Administrasi Bank', '2', 'FF8C7A', 60, NULL, NULL),
(417, 'Layanan Jasa', '0', '87FFD3', 60, NULL, NULL),
(418, 'Produk Premium', '0', '9AFF4D', 60, NULL, NULL),
(419, 'Produk Lokal', '0', '8CFF94', 60, NULL, NULL),
(420, 'Sistem Try Out', '1', '0087ff', 27, '2022-05-12 09:32:21', '2022-05-12 09:32:21'),
(421, 'Penjualan', '1', '0087f8', 50, '2022-05-17 09:44:28', '2022-05-17 09:44:28'),
(422, 'Pinjaman', '1', '798AC7', 61, NULL, NULL),
(423, 'Piutang', '1', '7DADD4', 61, NULL, NULL),
(424, 'Pajak', '2', 'C4996E', 61, NULL, NULL),
(425, 'Utilitas', '2', 'FF773D', 61, NULL, NULL),
(426, 'Bonus', '2', 'FF9D47', 61, NULL, NULL),
(427, 'Layanan Jasa', '0', '87FFD3', 61, NULL, NULL),
(428, 'Pendapatan Jasa', '1', 'DACFFF', 62, NULL, NULL),
(429, 'Pendapatan Lain', '1', 'F4C2FF', 62, NULL, NULL),
(430, 'Penambahan Modal', '1', '99B1FF', 62, NULL, NULL),
(431, 'Penjualan', '1', '9A91D9', 62, NULL, NULL),
(432, 'Hibah', '1', '54AFFF', 62, NULL, NULL),
(433, 'Piutang', '1', '7DADD4', 62, NULL, NULL),
(434, 'Pinjaman', '1', '798AC7', 62, NULL, NULL),
(435, 'Pajak', '2', 'C4996E', 62, NULL, NULL),
(436, 'Utilitas', '2', 'FF773D', 62, NULL, NULL),
(437, 'Bonus', '2', 'FF9D47', 62, NULL, NULL),
(438, 'Pembelian Stok Barang', '2', 'FF5959', 62, NULL, NULL),
(439, 'Pembelian Bahan Baku', '2', 'FF8F73', 62, NULL, NULL),
(440, 'Biaya Operasional', '2', 'FFB899', 62, NULL, NULL),
(441, 'Pengeluaran Lain-lain', '2', 'FFA845', 62, NULL, NULL),
(442, 'Pembayaran Hutang', '2', 'FFCD78', 62, NULL, NULL),
(443, 'Pemberian Utang', '2', 'FFC561', 62, NULL, NULL),
(444, 'Donasi', '2', 'CF885F', 62, NULL, NULL),
(445, 'Gaji', '2', 'FFB675', 62, NULL, NULL),
(446, 'Administrasi Bank', '2', 'FF8C7A', 62, NULL, NULL),
(447, 'Layanan Jasa', '0', '87FFD3', 62, NULL, NULL),
(448, 'Produk Organik', '0', 'D1FFA8', 62, NULL, NULL),
(449, 'Produk Impor', '0', 'BFFFDB', 62, NULL, NULL),
(450, 'Produk Premium', '0', '9AFF4D', 62, NULL, NULL),
(451, 'Produk Lokal', '0', '8CFF94', 62, NULL, NULL),
(452, 'Pinjaman', '1', '798AC7', 64, NULL, NULL),
(453, 'Piutang', '1', '7DADD4', 64, NULL, NULL),
(454, 'inventory', '1', '0087f8', 64, NULL, NULL),
(455, 'Pendapatan Lain', '1', 'F4C2FF', 64, NULL, NULL),
(456, 'Hibah', '1', '54AFFF', 64, NULL, NULL),
(457, 'Pendapatan Jasa', '1', 'DACFFF', 64, NULL, NULL),
(458, 'Penambahan Modal', '1', '99B1FF', 64, NULL, NULL),
(459, 'Penjualan', '1', '9A91D9', 64, NULL, NULL),
(460, 'Pajak', '2', 'C4996E', 64, NULL, NULL),
(461, 'Pembelian Bahan Baku', '2', 'FF8F73', 64, NULL, NULL),
(462, 'Biaya Operasional', '2', 'FFB899', 64, NULL, NULL),
(463, 'Pengeluaran Lain-lain', '2', 'FFA845', 64, NULL, NULL),
(464, 'Pembayaran Hutang', '2', 'FFCD78', 64, NULL, NULL),
(465, 'Gaji', '2', 'FFB675', 64, NULL, NULL),
(466, 'Layanan Jasa', '0', '87FFD3', 64, NULL, NULL),
(467, 'Produk Lokal', '0', '8CFF94', 64, NULL, NULL),
(468, 'Pinjaman', '1', '798AC7', 65, NULL, NULL),
(469, 'Piutang', '1', '7DADD4', 65, NULL, NULL),
(470, 'Pajak', '2', 'C4996E', 65, NULL, NULL),
(471, 'Utilitas', '2', 'FF773D', 65, NULL, NULL),
(472, 'Bonus', '2', 'FF9D47', 65, NULL, NULL),
(473, 'Layanan Jasa', '0', '87FFD3', 65, NULL, NULL),
(474, 'Minuman', '0', 'FFCD29', 54, '2022-06-09 08:37:52', '2022-06-09 08:45:30'),
(475, 'Snack', '0', '0080FF', 54, '2022-06-09 08:45:46', '2022-06-09 08:45:46'),
(476, 'Sambal', '0', 'FF0D0D', 54, '2022-06-09 08:46:02', '2022-06-09 08:46:02'),
(477, 'Pinjaman', '1', '798AC7', 67, NULL, NULL),
(478, 'Piutang', '1', '7DADD4', 67, NULL, NULL),
(479, 'Penjualan', '1', '9A91D9', 67, NULL, NULL),
(480, 'Penambahan Modal', '1', '99B1FF', 67, NULL, NULL),
(481, 'Pendapatan Lain', '1', 'F4C2FF', 67, NULL, NULL),
(482, 'Pendapatan Jasa', '1', 'DACFFF', 67, NULL, NULL),
(483, 'Pajak', '2', 'C4996E', 67, NULL, NULL),
(484, 'Utilitas', '2', 'FF773D', 67, NULL, NULL),
(485, 'Bonus', '2', 'FF9D47', 67, NULL, NULL),
(486, 'Pembelian Stok Barang', '2', 'FF5959', 67, NULL, NULL),
(487, 'Pembelian Bahan Baku', '2', 'FF8F73', 67, NULL, NULL),
(488, 'Biaya Operasional', '2', 'FFB899', 67, NULL, NULL),
(489, 'Pengeluaran Lain-lain', '2', 'FFA845', 67, NULL, NULL),
(490, 'Gaji', '2', 'FFB675', 67, NULL, NULL),
(491, 'Layanan Jasa', '0', '87FFD3', 67, NULL, NULL),
(492, 'Produk Lokal', '0', '8CFF94', 67, NULL, NULL),
(493, 'Penjualan', '1', '9A91D9', 68, NULL, NULL),
(494, 'Pajak', '2', 'C4996E', 68, NULL, NULL),
(495, 'Utilitas', '2', 'FF773D', 68, NULL, NULL),
(496, 'Bonus', '2', 'FF9D47', 68, NULL, NULL),
(497, 'Biaya Operasional', '2', 'FFB899', 68, NULL, NULL),
(498, 'Pembelian Stok Barang', '2', 'FF5959', 68, NULL, NULL),
(499, 'Pembelian Bahan Baku', '2', 'FF8F73', 68, NULL, NULL),
(500, 'Gaji', '2', 'FFB675', 68, NULL, NULL),
(501, 'Pengeluaran Lain-lain', '2', 'FFA845', 68, NULL, NULL),
(502, 'Produk Lokal', '0', '8CFF94', 68, NULL, NULL),
(503, 'Pinjaman', '1', '798AC7', 69, NULL, NULL),
(504, 'Piutang', '1', '7DADD4', 69, NULL, NULL),
(505, 'Pajak', '2', 'C4996E', 69, NULL, NULL),
(506, 'Utilitas', '2', 'FF773D', 69, NULL, NULL),
(507, 'Bonus', '2', 'FF9D47', 69, NULL, NULL),
(508, 'Layanan Jasa', '0', '87FFD3', 69, NULL, NULL),
(509, 'Pinjaman', '1', '798AC7', 70, NULL, NULL),
(510, 'Piutang', '1', '7DADD4', 70, NULL, NULL),
(511, 'Penjualan', '1', '9A91D9', 70, NULL, NULL),
(512, 'Pinjaman', '1', '798AC7', 71, NULL, NULL),
(513, 'Piutang', '1', '7DADD4', 71, NULL, NULL),
(514, 'Penjualan', '1', '9A91D9', 71, NULL, NULL),
(515, 'Pendapatan Jasa', '1', 'DACFFF', 71, NULL, NULL),
(516, 'Pajak', '2', 'C4996E', 71, NULL, NULL),
(517, 'Utilitas', '2', 'FF773D', 71, NULL, NULL),
(518, 'Bonus', '2', 'FF9D47', 71, NULL, NULL),
(519, 'Pembelian Stok Barang', '2', 'FF5959', 71, NULL, NULL),
(520, 'Pembelian Bahan Baku', '2', 'FF8F73', 71, NULL, NULL),
(521, 'Gaji', '2', 'FFB675', 71, NULL, NULL),
(522, 'Layanan Jasa', '0', '87FFD3', 71, NULL, NULL),
(523, 'Produk Lokal', '0', '8CFF94', 71, NULL, NULL),
(524, 'Produk Organik', '0', 'D1FFA8', 71, NULL, NULL),
(525, 'Pinjaman', '1', '798AC7', 72, NULL, NULL),
(526, 'Piutang', '1', '7DADD4', 72, NULL, NULL),
(527, 'Pendapatan Jasa', '1', 'DACFFF', 72, NULL, NULL),
(528, 'Pendapatan Lain', '1', 'F4C2FF', 72, NULL, NULL),
(529, 'Penjualan', '1', '9A91D9', 72, NULL, NULL),
(530, 'Pajak', '2', 'C4996E', 72, NULL, NULL),
(531, 'Utilitas', '2', 'FF773D', 72, NULL, NULL),
(532, 'Bonus', '2', 'FF9D47', 72, NULL, NULL),
(533, 'Biaya Operasional', '2', 'FFB899', 72, NULL, NULL),
(534, 'Pengeluaran Lain-lain', '2', 'FFA845', 72, NULL, NULL),
(535, 'Gaji', '2', 'FFB675', 72, NULL, NULL),
(536, 'Administrasi Bank', '2', 'FF8C7A', 72, NULL, NULL),
(537, 'Layanan Jasa', '0', '87FFD3', 72, NULL, NULL),
(538, 'AKTA NOTARIS', '0', '70f880', 72, NULL, NULL),
(539, 'AKTA PPAT', '0', '70f880', 72, NULL, NULL),
(540, 'konsumsi', '2', 'E9C2FF', 72, '2022-07-25 06:00:09', '2022-07-25 06:03:28'),
(541, 'ATK', '2', 'FFEFB0', 72, '2022-07-25 06:04:48', '2022-07-25 06:04:48'),
(542, 'Transport', '2', '29FF86', 72, '2022-07-25 06:05:15', '2022-07-25 06:05:15'),
(543, 'Biaya Entertain', '2', 'CFFFF7', 72, '2022-07-25 06:13:43', '2022-07-25 06:13:43'),
(544, 'BPN', '2', '1F17FF', 72, '2022-07-25 06:46:25', '2022-07-25 06:46:25'),
(545, 'PNBP', '2', 'FF0FE7', 72, '2022-07-25 06:49:24', '2022-07-25 06:49:24'),
(546, 'Pengurusan BPN', '0', '7C5CFF', 72, '2022-07-27 08:50:04', '2022-07-27 08:50:04'),
(547, 'Peralatan', '2', 'FFB546', 72, '2022-08-02 13:30:37', '2022-08-02 13:30:37'),
(548, 'Sewa Ruko', '2', '7FFFEA', 72, '2022-08-02 13:31:22', '2022-08-02 13:31:22'),
(549, 'ASET', '0', '6574FF', 72, '2022-08-02 13:38:14', '2022-08-02 13:38:14'),
(550, 'Renovasi Ruko', '0', 'FFFB8E', 72, '2022-08-02 14:17:38', '2022-08-02 14:17:38'),
(551, 'Renovasi Ruko', '2', 'D7FFC3', 72, '2022-08-02 14:19:10', '2022-08-02 14:19:10'),
(552, 'Biaya Mitra Notaris', '2', 'CDFF42', 72, '2022-08-04 04:43:25', '2022-08-04 04:43:25'),
(553, 'PINJAMAN', '2', '5EB7FF', 72, '2022-09-19 07:43:10', '2022-09-19 07:43:10'),
(554, 'Pinjaman', '1', '798AC7', 77, NULL, NULL),
(555, 'Piutang', '1', '7DADD4', 77, NULL, NULL),
(556, 'Penjualan', '1', '9A91D9', 77, NULL, NULL),
(557, 'Pendapatan Jasa', '1', 'DACFFF', 77, NULL, NULL),
(558, 'Pendapatan Lain', '1', 'F4C2FF', 77, NULL, NULL),
(559, 'Pajak', '2', 'C4996E', 77, NULL, NULL),
(560, 'Utilitas', '2', 'FF773D', 77, NULL, NULL),
(561, 'Bonus', '2', 'FF9D47', 77, NULL, NULL),
(562, 'Pembelian Bahan Baku', '2', 'FF8F73', 77, NULL, NULL),
(563, 'Biaya Operasional', '2', 'FFB899', 77, NULL, NULL),
(564, 'Pengeluaran Lain-lain', '2', 'FFA845', 77, NULL, NULL),
(565, 'Pembayaran Hutang', '2', 'FFCD78', 77, NULL, NULL),
(566, 'Pemberian Utang', '2', 'FFC561', 77, NULL, NULL),
(567, 'Gaji', '2', 'FFB675', 77, NULL, NULL),
(568, 'Administrasi Bank', '2', 'FF8C7A', 77, NULL, NULL),
(569, 'Donasi', '2', 'CF885F', 77, NULL, NULL),
(570, 'Layanan Jasa', '0', '87FFD3', 77, NULL, NULL),
(571, 'Penjualan', '1', '9A91D9', 83, NULL, NULL),
(572, 'Pajak', '2', 'FF5B42', 83, NULL, '2022-12-12 12:28:54'),
(573, 'Biaya Utilitas', '2', 'FFF242', 83, NULL, '2022-12-12 12:29:55'),
(574, 'Biaya Gaji', '2', 'FFB675', 83, NULL, '2022-11-21 14:04:55'),
(575, 'Bahan Baku', '2', 'C6FF42', 83, NULL, '2022-12-12 12:30:14'),
(576, 'Biaya Lain-lain', '2', '8EFF42', 83, NULL, '2022-12-12 12:30:46'),
(577, 'Peralatan', '2', '42FF42', 83, NULL, '2022-12-12 12:31:09'),
(578, 'Makanan dan Minuman', '0', '70f880', 83, NULL, NULL),
(579, 'Hutang', '1', 'FFE84F', 51, '2022-11-09 19:41:03', '2022-11-09 19:41:03'),
(580, 'Pembayaran Hutang', '2', 'FFCD78', 51, '2022-11-09 20:02:13', '2022-11-09 20:02:13'),
(581, 'Hutang', '1', 'FFBAF6', 38, '2022-11-09 20:56:58', '2022-11-09 20:57:07'),
(582, 'Pembelian Asset', '2', '8363FF', 38, '2022-11-10 04:35:34', '2022-11-10 04:35:34'),
(583, 'Penjualan Jagung', '1', 'F8F00F', 84, NULL, '2022-11-18 18:34:06'),
(584, 'Penjualan Padi', '1', 'F8AF32', 84, NULL, '2022-11-18 18:33:54'),
(585, 'Penjualan Cabai', '1', 'F83D2F', 84, NULL, '2022-11-18 18:33:39'),
(586, 'Pengeluaran Jagung', '2', 'F7E928', 84, NULL, '2022-11-18 18:35:04'),
(587, 'Pengeluaran Padi', '2', 'FFBC36', 84, NULL, '2022-11-18 18:35:31'),
(588, 'Pengeluaran Cabai', '2', 'F53131', 84, NULL, '2022-11-18 18:35:41'),
(589, 'Produk Segar', '0', '70f880', 84, NULL, NULL),
(590, 'Perlengkapan', '2', '42FF87', 83, '2022-11-21 13:59:25', '2022-12-12 12:31:31'),
(591, 'Prive', '2', '42FFC6', 83, '2022-12-12 12:18:09', '2022-12-12 12:31:48'),
(592, 'Penjualan', '1', '9A91D9', 85, NULL, NULL),
(594, 'Beli Kemasan', '2', '309909', 85, NULL, '2023-01-02 13:18:46'),
(595, 'Biaya Dana', '2', '288699', 85, NULL, '2023-01-02 13:18:55'),
(596, 'Bahan Baku', '2', '8E2699', 85, NULL, '2023-01-24 03:48:01'),
(597, 'Produk Lokal', '0', '8CFF94', 85, NULL, NULL),
(598, 'Biaya Kemasan', '2', '42D9FF', 83, '2023-01-06 10:28:48', '2023-02-06 08:21:37'),
(599, 'Biaya Listrik & Air', '2', '4294FF', 83, '2023-01-30 09:49:33', '2023-02-06 08:22:19'),
(600, 'Biaya Transportasi', '2', '4942FF', 83, '2023-01-30 09:58:32', '2023-02-06 08:24:02'),
(601, 'Perawatan Tempat', '2', 'A7FF8C', 85, '2023-02-07 07:05:08', '2023-02-07 07:05:08'),
(602, 'Pinjaman', '1', '798AC7', 86, NULL, NULL),
(603, 'Piutang', '1', '7DADD4', 86, NULL, NULL),
(604, 'Penjualan', '1', '9A91D9', 86, NULL, NULL),
(605, 'Penambahan Modal', '1', '99B1FF', 86, NULL, NULL),
(606, 'Pendapatan Lain', '1', 'F4C2FF', 86, NULL, NULL),
(607, 'Pendapatan Jasa', '1', 'DACFFF', 86, NULL, NULL),
(609, 'Pajak', '2', 'C4996E', 86, NULL, NULL),
(610, 'Utilitas', '2', 'FF773D', 86, NULL, NULL),
(611, 'Bonus', '2', 'FF9D47', 86, NULL, NULL),
(612, 'Pembelian Stok Barang', '2', 'FF5959', 86, NULL, NULL),
(613, 'Pembelian Bahan Baku', '2', 'FF8F73', 86, NULL, NULL),
(614, 'Biaya Operasional', '2', 'FFB899', 86, NULL, NULL),
(615, 'Pengeluaran Lain-lain', '2', 'FFA845', 86, NULL, NULL),
(616, 'Pembayaran Hutang', '2', 'FFCD78', 86, NULL, NULL),
(617, 'Pemberian Utang', '2', 'FFC561', 86, NULL, NULL),
(618, 'Donasi', '2', 'CF885F', 86, NULL, NULL),
(619, 'Gaji', '2', 'FFB675', 86, NULL, NULL),
(620, 'Administrasi Bank', '2', 'FF8C7A', 86, NULL, NULL),
(621, 'Layanan Jasa', '0', '87FFD3', 86, NULL, NULL),
(622, 'Produk Organik', '0', 'D1FFA8', 86, NULL, NULL),
(623, 'Produk Impor', '0', 'BFFFDB', 86, NULL, NULL),
(624, 'Produk Premium', '0', '9AFF4D', 86, NULL, NULL),
(625, 'Produk Lokal', '0', '8CFF94', 86, NULL, NULL),
(626, 'Hibah', '1', '54AFFF', 86, '2023-03-16 03:50:32', '2023-03-16 03:50:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_service_stock_changes`
--

CREATE TABLE `product_service_stock_changes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(191) NOT NULL DEFAULT '',
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bill_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_service_stock_changes`
--

INSERT INTO `product_service_stock_changes` (`id`, `description`, `date`, `quantity`, `product_id`, `invoice_id`, `bill_id`, `created_by`, `created_at`, `updated_at`) VALUES
(2, '', '2022-05-09', 4, 8, NULL, 2, 27, '2022-05-09 05:06:29', '2022-05-09 05:06:29'),
(3, 'Initial stock', '2022-05-11', 9999999, 19, NULL, NULL, 51, '2022-05-11 14:09:41', '2022-05-11 14:09:41'),
(4, 'Initial stock', '2022-05-11', 99999, 20, NULL, NULL, 51, '2022-05-11 14:10:10', '2022-05-11 14:10:10'),
(7, 'Initial stock', '2022-05-12', 999, 21, NULL, NULL, 51, '2022-05-11 20:13:54', '2022-05-11 20:13:54'),
(8, '', '2022-05-12', -173, 19, 35, NULL, 51, '2022-05-11 20:21:07', '2022-05-11 20:21:07'),
(9, '', '2022-05-12', -6, 20, 35, NULL, 51, '2022-05-11 20:21:07', '2022-05-11 20:21:07'),
(10, '', '2022-05-12', -1, 21, 35, NULL, 51, '2022-05-11 20:21:07', '2022-05-11 20:21:07'),
(11, '', '2022-05-12', -3, 9, 36, NULL, 27, '2022-05-12 05:43:04', '2022-05-12 05:43:04'),
(12, 'Initial stock', '2022-05-17', 120, 22, NULL, NULL, 50, '2022-05-17 09:43:19', '2022-05-17 09:43:19'),
(13, 'Initial stock', '2022-05-28', 100, 23, NULL, NULL, 60, '2022-05-28 08:13:13', '2022-05-28 08:13:13'),
(14, '', '2022-05-28', -1, 23, 39, NULL, 60, '2022-05-28 08:24:47', '2022-05-28 08:24:47'),
(15, '', '2022-06-02', -15, 19, 40, NULL, 51, '2022-06-02 05:31:09', '2022-06-02 05:32:01'),
(16, '', '2022-06-02', -12, 20, 40, NULL, 51, '2022-06-02 05:31:09', '2022-06-02 05:32:01'),
(17, '', '2022-06-02', -1, 21, 40, NULL, 51, '2022-06-02 05:31:09', '2022-06-02 05:32:01'),
(18, '', '2022-06-02', -15, 19, 41, NULL, 51, '2022-06-02 05:35:39', '2022-06-02 05:45:40'),
(19, '', '2022-06-02', -12, 20, 41, NULL, 51, '2022-06-02 05:35:39', '2022-06-02 05:45:40'),
(20, '', '2022-06-02', -1, 21, 41, NULL, 51, '2022-06-02 05:35:39', '2022-06-02 05:45:40'),
(21, '', '2022-06-02', -15, 19, 42, NULL, 51, '2022-06-02 05:57:32', '2022-06-02 05:57:32'),
(22, '', '2022-06-02', -12, 20, 42, NULL, 51, '2022-06-02 05:57:32', '2022-06-02 05:57:32'),
(23, '', '2022-06-02', -1, 21, 42, NULL, 51, '2022-06-02 05:57:32', '2022-06-02 05:57:32'),
(24, 'Initial stock', '2022-06-09', 1, 24, NULL, NULL, 54, '2022-06-09 08:47:36', '2022-06-09 08:47:36'),
(25, 'Initial stock', '2022-06-09', 1, 25, NULL, NULL, 54, '2022-06-09 08:48:39', '2022-06-09 08:48:39'),
(26, 'Initial stock', '2022-06-09', 1, 26, NULL, NULL, 54, '2022-06-09 08:58:26', '2022-06-09 08:58:26'),
(27, 'Initial stock', '2022-06-09', 1, 27, NULL, NULL, 54, '2022-06-09 08:59:07', '2022-06-09 08:59:07'),
(28, 'Initial stock', '2022-06-09', 1, 28, NULL, NULL, 54, '2022-06-09 09:00:30', '2022-06-09 09:00:30'),
(29, 'Initial stock', '2022-06-16', 1, 29, NULL, NULL, 24, '2022-06-16 05:32:28', '2022-06-16 05:32:28'),
(30, '', '2022-06-16', -1, 29, 43, NULL, 24, '2022-06-16 05:36:25', '2022-06-16 05:36:25'),
(31, 'Initial stock', '2022-06-26', 100, 30, NULL, NULL, 71, '2022-06-26 11:27:58', '2022-06-26 11:27:58'),
(32, 'Initial stock', '2022-07-20', 1, 31, NULL, NULL, 72, '2022-07-20 04:27:00', '2022-07-20 04:27:00'),
(33, 'Initial stock', '2022-07-20', 1, 32, NULL, NULL, 72, '2022-07-20 04:31:32', '2022-07-20 04:31:32'),
(34, '', '2022-07-19', -1, 31, 44, NULL, 72, '2022-07-20 04:36:29', '2022-07-20 04:36:29'),
(35, 'Initial stock', '2022-07-20', 1, 33, NULL, NULL, 72, '2022-07-20 04:40:30', '2022-07-20 04:40:30'),
(36, 'Initial stock', '2022-07-20', 1, 34, NULL, NULL, 72, '2022-07-20 04:43:34', '2022-07-20 04:43:34'),
(37, 'Initial stock', '2022-07-20', 1, 35, NULL, NULL, 72, '2022-07-20 04:48:57', '2022-07-20 04:48:57'),
(38, 'Initial stock', '2022-07-20', 1, 36, NULL, NULL, 72, '2022-07-20 04:51:20', '2022-07-20 04:51:20'),
(39, 'Initial stock', '2022-07-20', 1, 37, NULL, NULL, 72, '2022-07-20 04:52:37', '2022-07-20 04:52:37'),
(40, 'Initial stock', '2022-07-20', 1, 38, NULL, NULL, 72, '2022-07-20 04:55:12', '2022-07-20 04:55:12'),
(41, 'Initial stock', '2022-07-20', 1, 39, NULL, NULL, 72, '2022-07-20 04:55:51', '2022-07-20 04:55:51'),
(42, 'Initial stock', '2022-07-20', 1, 40, NULL, NULL, 72, '2022-07-20 04:56:27', '2022-07-20 04:56:27'),
(43, 'Initial stock', '2022-07-20', 1, 41, NULL, NULL, 72, '2022-07-20 04:56:58', '2022-07-20 04:56:58'),
(44, 'Initial stock', '2022-07-20', 1, 42, NULL, NULL, 72, '2022-07-20 04:58:03', '2022-07-20 04:58:03'),
(45, 'Initial stock', '2022-07-20', 1, 43, NULL, NULL, 72, '2022-07-20 04:59:27', '2022-07-20 04:59:27'),
(46, 'Initial stock', '2022-07-20', 1, 44, NULL, NULL, 72, '2022-07-20 05:00:32', '2022-07-20 05:00:32'),
(47, 'Initial stock', '2022-07-20', 1, 45, NULL, NULL, 72, '2022-07-20 05:06:12', '2022-07-20 05:06:12'),
(48, 'Initial stock', '2022-07-20', 1, 46, NULL, NULL, 72, '2022-07-20 05:07:09', '2022-07-20 05:07:09'),
(49, 'Initial stock', '2022-07-20', 1, 47, NULL, NULL, 72, '2022-07-20 05:20:08', '2022-07-20 05:20:08'),
(50, 'Initial stock', '2022-07-20', 1, 48, NULL, NULL, 72, '2022-07-20 05:20:37', '2022-07-20 05:20:37'),
(51, 'Initial stock', '2022-07-20', 1, 49, NULL, NULL, 72, '2022-07-20 05:21:07', '2022-07-20 05:21:07'),
(52, '', '2022-07-22', 0, 31, NULL, NULL, 72, '2022-07-22 03:36:30', '2022-07-22 03:36:30'),
(53, 'bayar kemenhumkam', '2022-07-22', 500000, 31, NULL, NULL, 72, '2022-07-22 03:37:01', '2022-07-22 03:37:01'),
(54, '', '2022-07-22', -499000, 31, NULL, NULL, 72, '2022-07-22 03:38:06', '2022-07-22 03:38:06'),
(55, '', '2022-07-22', -999, 31, NULL, NULL, 72, '2022-07-22 03:38:14', '2022-07-22 03:38:14'),
(56, '', '2022-07-25', 1000, 31, NULL, NULL, 72, '2022-07-25 05:20:52', '2022-07-25 05:20:52'),
(57, '', '2022-07-25', 1000, 32, NULL, NULL, 72, '2022-07-25 05:21:01', '2022-07-25 05:21:01'),
(58, '', '2022-07-25', 1000, 33, NULL, NULL, 72, '2022-07-25 05:21:08', '2022-07-25 05:21:08'),
(59, '', '2022-07-25', 1000, 34, NULL, NULL, 72, '2022-07-25 05:21:21', '2022-07-25 05:21:21'),
(60, '', '2022-07-25', 1000, 35, NULL, NULL, 72, '2022-07-25 05:21:30', '2022-07-25 05:21:30'),
(61, '', '2022-07-25', 1000, 36, NULL, NULL, 72, '2022-07-25 05:21:36', '2022-07-25 05:21:36'),
(62, '', '2022-07-25', 1000, 37, NULL, NULL, 72, '2022-07-25 05:21:43', '2022-07-25 05:21:43'),
(63, '', '2022-07-25', 1000, 38, NULL, NULL, 72, '2022-07-25 05:21:51', '2022-07-25 05:21:51'),
(64, '', '2022-07-25', 1000, 39, NULL, NULL, 72, '2022-07-25 05:22:22', '2022-07-25 05:22:22'),
(65, '', '2022-07-25', 1000, 40, NULL, NULL, 72, '2022-07-25 05:22:29', '2022-07-25 05:22:29'),
(66, '', '2022-07-25', 1000, 41, NULL, NULL, 72, '2022-07-25 05:22:59', '2022-07-25 05:22:59'),
(67, '', '2022-07-25', 1000, 42, NULL, NULL, 72, '2022-07-25 05:23:12', '2022-07-25 05:23:12'),
(68, '', '2022-07-25', 1000, 43, NULL, NULL, 72, '2022-07-25 05:23:20', '2022-07-25 05:23:20'),
(69, '', '2022-07-25', 1000, 44, NULL, NULL, 72, '2022-07-25 05:23:30', '2022-07-25 05:23:30'),
(70, '', '2022-07-25', 1000, 45, NULL, NULL, 72, '2022-07-25 05:23:39', '2022-07-25 05:23:39'),
(71, '', '2022-07-25', 1000, 46, NULL, NULL, 72, '2022-07-25 05:23:48', '2022-07-25 05:23:48'),
(72, '', '2022-07-25', 1000, 47, NULL, NULL, 72, '2022-07-25 05:23:57', '2022-07-25 05:23:57'),
(73, '', '2022-07-25', 1000, 48, NULL, NULL, 72, '2022-07-25 05:24:06', '2022-07-25 05:24:06'),
(74, '', '2022-07-25', 1000, 49, NULL, NULL, 72, '2022-07-25 05:24:15', '2022-07-25 05:24:15'),
(75, '', '2022-07-19', -1, 31, 45, NULL, 72, '2022-07-25 05:30:39', '2022-07-25 05:30:39'),
(76, '', '2022-07-19', -1, 31, 46, NULL, 72, '2022-07-25 05:31:33', '2022-07-25 05:31:33'),
(77, '', '2022-07-25', -1, 44, 47, NULL, 72, '2022-07-25 05:33:42', '2022-07-25 05:35:13'),
(78, '', '2022-07-05', -1, 44, 48, NULL, 72, '2022-07-25 08:52:38', '2022-07-25 08:52:38'),
(79, '', '2022-07-08', -1, 31, 49, NULL, 72, '2022-07-25 08:53:39', '2022-07-25 08:53:39'),
(80, '', '2022-07-31', -1, 31, 50, NULL, 72, '2022-07-25 08:54:27', '2022-08-04 07:07:31'),
(81, '', '2022-07-12', -1, 34, 51, NULL, 72, '2022-07-25 08:57:37', '2022-07-25 08:57:37'),
(82, '', '2022-07-28', -10, 20, 52, NULL, 51, '2022-07-28 10:28:19', '2022-07-28 10:28:19'),
(83, 'Initial stock', '2022-07-29', 1001, 50, NULL, NULL, 72, '2022-07-29 05:44:50', '2022-07-29 05:44:50'),
(84, '', '2022-07-31', -2, 33, 53, NULL, 72, '2022-07-29 05:47:17', '2022-08-05 15:22:16'),
(85, '', '2022-07-31', -2, 32, 53, NULL, 72, '2022-07-29 05:47:17', '2022-08-05 15:22:16'),
(86, '', '2022-07-31', -1, 38, 53, NULL, 72, '2022-07-29 05:47:17', '2022-08-05 15:22:16'),
(87, '', '2022-07-31', -2, 50, 53, NULL, 72, '2022-07-29 05:47:17', '2022-08-05 15:22:16'),
(88, '', '2022-07-31', -1, 40, 53, NULL, 72, '2022-07-29 05:47:17', '2022-08-05 15:22:16'),
(89, '', '2022-07-31', -1, 41, 53, NULL, 72, '2022-07-29 05:47:17', '2022-08-05 15:22:16'),
(90, '', '2022-07-31', -1, 39, 53, NULL, 72, '2022-07-29 05:47:17', '2022-08-05 15:22:16'),
(91, 'Initial stock', '2022-07-29', 1001, 51, NULL, NULL, 72, '2022-07-29 06:21:26', '2022-07-29 06:21:26'),
(92, 'Initial stock', '2022-07-29', 1001, 52, NULL, NULL, 72, '2022-07-29 06:25:12', '2022-07-29 06:25:12'),
(93, 'Initial stock', '2022-07-29', 1001, 53, NULL, NULL, 72, '2022-07-29 06:29:02', '2022-07-29 06:29:02'),
(94, 'Initial stock', '2022-07-29', 1001, 54, NULL, NULL, 72, '2022-07-29 06:29:44', '2022-07-29 06:29:44'),
(95, 'Initial stock', '2022-07-29', 1001, 55, NULL, NULL, 72, '2022-07-29 06:35:30', '2022-07-29 06:35:30'),
(96, 'Initial stock', '2022-07-29', 1001, 56, NULL, NULL, 72, '2022-07-29 06:52:18', '2022-07-29 06:52:18'),
(97, '', '2022-07-29', -1, 56, 54, NULL, 72, '2022-07-29 06:56:23', '2022-08-05 15:24:59'),
(98, '', '2022-07-29', -1, 33, 54, NULL, 72, '2022-07-29 06:56:23', '2022-08-05 15:24:59'),
(99, '', '2022-07-29', -1, 52, 54, NULL, 72, '2022-07-29 06:56:23', '2022-08-05 15:24:59'),
(100, '', '2022-07-29', -1, 36, 54, NULL, 72, '2022-07-29 06:56:23', '2022-08-05 15:24:59'),
(101, '', '2022-07-29', -1, 37, 54, NULL, 72, '2022-07-29 06:56:23', '2022-08-05 15:24:59'),
(102, '', '2022-07-29', -1, 38, 54, NULL, 72, '2022-07-29 06:56:23', '2022-08-05 15:24:59'),
(103, '', '2022-07-29', -1, 41, 54, NULL, 72, '2022-07-29 06:56:23', '2022-08-05 15:24:59'),
(104, '', '2022-07-29', -1, 39, 54, NULL, 72, '2022-07-29 06:56:23', '2022-08-05 15:24:59'),
(105, '', '2022-07-31', -1, 33, 55, NULL, 72, '2022-07-29 07:23:43', '2022-08-05 15:24:24'),
(106, '', '2022-07-31', -1, 32, 55, NULL, 72, '2022-07-29 07:23:43', '2022-08-05 15:24:24'),
(107, '', '2022-07-31', -1, 40, 55, NULL, 72, '2022-07-29 07:23:43', '2022-08-05 15:24:24'),
(108, '', '2022-07-31', -1, 38, 55, NULL, 72, '2022-07-29 07:23:43', '2022-08-05 15:24:24'),
(109, '', '2022-07-31', -1, 39, 55, NULL, 72, '2022-07-29 07:23:43', '2022-08-05 15:24:24'),
(110, '', '2022-07-31', -1, 33, 56, NULL, 72, '2022-07-29 07:26:08', '2022-08-05 15:23:35'),
(111, '', '2022-07-31', -1, 56, 56, NULL, 72, '2022-07-29 07:26:08', '2022-08-05 15:23:35'),
(112, '', '2022-07-31', -1, 52, 56, NULL, 72, '2022-07-29 07:26:08', '2022-08-05 15:23:35'),
(113, '', '2022-07-31', -1, 40, 56, NULL, 72, '2022-07-29 07:26:08', '2022-08-05 15:23:35'),
(114, '', '2022-07-31', -1, 41, 56, NULL, 72, '2022-07-29 07:26:08', '2022-08-05 15:23:35'),
(115, '', '2022-07-31', -1, 38, 56, NULL, 72, '2022-07-29 07:26:08', '2022-08-05 15:23:35'),
(116, '', '2022-07-31', -1, 39, 56, NULL, 72, '2022-07-29 07:26:08', '2022-08-05 15:23:35'),
(117, '', '2022-07-31', -1, 55, 56, NULL, 72, '2022-07-29 07:26:08', '2022-08-05 15:23:35'),
(118, 'Initial stock', '2022-07-29', 1001, 57, NULL, NULL, 72, '2022-07-29 07:27:40', '2022-07-29 07:27:40'),
(119, '', '2022-07-22', -1, 33, 57, NULL, 72, '2022-07-29 07:32:44', '2022-07-29 07:32:44'),
(120, '', '2022-07-22', -2, 32, 57, NULL, 72, '2022-07-29 07:32:44', '2022-07-29 07:32:44'),
(121, '', '2022-07-22', -1, 36, 57, NULL, 72, '2022-07-29 07:32:44', '2022-07-29 07:32:44'),
(122, '', '2022-07-22', -1, 37, 57, NULL, 72, '2022-07-29 07:32:44', '2022-07-29 07:32:44'),
(123, '', '2022-07-22', -1, 57, 57, NULL, 72, '2022-07-29 07:32:44', '2022-07-29 07:32:44'),
(124, '', '2022-07-22', -1, 38, 57, NULL, 72, '2022-07-29 07:32:44', '2022-07-29 07:32:44'),
(125, '', '2022-07-22', -1, 41, 57, NULL, 72, '2022-07-29 07:32:44', '2022-07-29 07:32:44'),
(126, '', '2022-07-22', -1, 39, 57, NULL, 72, '2022-07-29 07:32:44', '2022-07-29 07:32:44'),
(127, '', '2022-07-31', -1, 33, 58, NULL, 72, '2022-07-29 07:34:33', '2022-08-04 07:13:04'),
(128, '', '2022-07-31', -1, 32, 58, NULL, 72, '2022-07-29 07:34:33', '2022-08-04 07:13:04'),
(129, '', '2022-07-31', -1, 36, 58, NULL, 72, '2022-07-29 07:34:33', '2022-08-04 07:13:04'),
(130, '', '2022-07-31', -1, 37, 58, NULL, 72, '2022-07-29 07:34:33', '2022-08-04 07:13:04'),
(131, '', '2022-07-31', -1, 38, 58, NULL, 72, '2022-07-29 07:34:33', '2022-08-04 07:13:04'),
(132, '', '2022-07-31', -1, 56, 58, NULL, 72, '2022-07-29 07:34:33', '2022-08-04 07:13:04'),
(133, '', '2022-07-31', -1, 39, 58, NULL, 72, '2022-07-29 07:34:33', '2022-08-04 07:13:04'),
(134, '', '2022-07-31', -1, 33, 59, NULL, 72, '2022-07-29 07:38:31', '2022-08-04 07:11:49'),
(135, '', '2022-07-31', -1, 32, 59, NULL, 72, '2022-07-29 07:38:31', '2022-08-04 07:11:49'),
(136, '', '2022-07-31', -1, 36, 59, NULL, 72, '2022-07-29 07:38:31', '2022-08-04 07:11:49'),
(137, '', '2022-07-31', -1, 37, 59, NULL, 72, '2022-07-29 07:38:31', '2022-08-04 07:11:49'),
(138, '', '2022-07-31', -1, 57, 59, NULL, 72, '2022-07-29 07:38:31', '2022-08-04 07:11:49'),
(139, '', '2022-07-31', -1, 35, 59, NULL, 72, '2022-07-29 07:38:31', '2022-08-04 07:11:49'),
(140, '', '2022-07-31', -1, 42, 59, NULL, 72, '2022-07-29 07:38:31', '2022-08-04 07:11:49'),
(141, '', '2022-07-31', -1, 38, 59, NULL, 72, '2022-07-29 07:38:31', '2022-08-04 07:11:49'),
(142, '', '2022-07-31', -1, 39, 59, NULL, 72, '2022-07-29 07:38:31', '2022-08-04 07:11:49'),
(143, '', '2022-07-31', -1, 56, 60, NULL, 72, '2022-07-29 07:42:55', '2022-08-04 07:09:08'),
(144, '', '2022-07-31', -1, 33, 60, NULL, 72, '2022-07-29 07:42:55', '2022-08-04 07:09:08'),
(145, '', '2022-07-31', -1, 32, 60, NULL, 72, '2022-07-29 07:42:55', '2022-08-04 07:09:08'),
(146, '', '2022-07-31', -1, 40, 60, NULL, 72, '2022-07-29 07:42:55', '2022-08-04 07:09:08'),
(147, '', '2022-07-31', -1, 41, 60, NULL, 72, '2022-07-29 07:42:55', '2022-08-04 07:09:08'),
(148, '', '2022-07-31', -1, 51, 60, NULL, 72, '2022-07-29 07:42:55', '2022-08-04 07:09:08'),
(149, '', '2022-07-31', -1, 42, 60, NULL, 72, '2022-07-29 07:42:55', '2022-08-04 07:09:08'),
(150, '', '2022-07-31', -1, 38, 60, NULL, 72, '2022-07-29 07:42:55', '2022-08-04 07:09:08'),
(151, '', '2022-07-31', -1, 39, 60, NULL, 72, '2022-07-29 07:42:55', '2022-08-04 07:09:08'),
(152, '', '2022-07-31', -1, 33, 61, NULL, 72, '2022-07-29 07:44:12', '2022-08-04 07:08:28'),
(153, '', '2022-07-31', -1, 52, 61, NULL, 72, '2022-07-29 07:44:12', '2022-08-04 07:08:28'),
(154, '', '2022-07-31', -1, 40, 61, NULL, 72, '2022-07-29 07:44:12', '2022-08-04 07:08:28'),
(155, '', '2022-07-31', -1, 41, 61, NULL, 72, '2022-07-29 07:44:12', '2022-08-04 07:08:28'),
(156, '', '2022-07-31', -1, 38, 61, NULL, 72, '2022-07-29 07:44:12', '2022-08-04 07:08:28'),
(157, '', '2022-07-31', -1, 39, 61, NULL, 72, '2022-07-29 07:44:12', '2022-08-04 07:08:28'),
(158, '', '2022-07-31', -1, 32, 62, NULL, 72, '2022-07-29 07:47:02', '2022-08-04 07:08:51'),
(159, '', '2022-07-31', -1, 56, 62, NULL, 72, '2022-07-29 07:47:02', '2022-08-04 07:08:51'),
(160, '', '2022-07-31', -1, 33, 62, NULL, 72, '2022-07-29 07:47:02', '2022-08-04 07:08:51'),
(161, '', '2022-07-31', -1, 38, 62, NULL, 72, '2022-07-29 07:47:02', '2022-08-04 07:08:51'),
(162, '', '2022-07-31', -1, 39, 62, NULL, 72, '2022-07-29 07:47:02', '2022-08-04 07:08:51'),
(163, '', '2022-07-31', -1, 40, 62, NULL, 72, '2022-07-29 07:47:02', '2022-08-04 07:08:51'),
(164, '', '2022-07-31', -2, 57, 62, NULL, 72, '2022-07-29 07:47:02', '2022-08-04 07:08:51'),
(165, 'Initial stock', '2022-08-02', 1, 58, NULL, NULL, 72, '2022-08-02 13:35:13', '2022-08-02 13:35:13'),
(166, 'Initial stock', '2022-08-02', 1, 59, NULL, NULL, 72, '2022-08-02 13:36:29', '2022-08-02 13:36:29'),
(167, 'Initial stock', '2022-08-02', 1, 60, NULL, NULL, 72, '2022-08-02 13:39:26', '2022-08-02 13:39:26'),
(168, '', '2022-08-02', 1, 58, NULL, 3, 72, '2022-08-02 13:49:34', '2022-08-02 13:49:34'),
(169, '', '2022-08-02', 1, 59, NULL, 3, 72, '2022-08-02 13:49:34', '2022-08-02 13:49:34'),
(170, '', '2022-08-02', 1, 60, NULL, 3, 72, '2022-08-02 13:49:34', '2022-08-02 13:49:34'),
(171, 'Initial stock', '2022-08-02', 1, 61, NULL, NULL, 72, '2022-08-02 14:18:20', '2022-08-02 14:18:20'),
(172, '', '2022-08-02', 1, 61, NULL, 4, 72, '2022-08-02 14:19:34', '2022-08-02 14:19:34'),
(173, 'Initial stock', '2022-08-02', 1, 62, NULL, NULL, 72, '2022-08-02 14:34:23', '2022-08-02 14:34:23'),
(174, 'Initial stock', '2022-08-02', 1, 63, NULL, NULL, 72, '2022-08-02 14:35:03', '2022-08-02 14:35:03'),
(175, '', '2022-07-31', 1, 62, NULL, 5, 72, '2022-08-02 14:38:15', '2022-08-02 14:38:15'),
(176, '', '2022-07-31', 1, 63, NULL, 5, 72, '2022-08-02 14:38:15', '2022-08-02 14:38:15'),
(177, 'Initial stock', '2022-08-03', 1001, 64, NULL, NULL, 72, '2022-08-03 06:27:59', '2022-08-03 06:27:59'),
(178, '', '2022-07-31', -1, 64, 63, NULL, 72, '2022-08-03 06:28:37', '2022-08-04 07:08:11'),
(179, '', '2022-08-03', 100, 12, NULL, 6, 27, '2022-08-03 07:38:51', '2022-08-03 07:38:51'),
(180, '', '2022-08-03', -100, 12, 64, NULL, 27, '2022-08-03 07:53:52', '2022-08-03 07:53:52'),
(181, '', '2022-07-31', 1, 38, NULL, 7, 72, '2022-08-04 04:46:02', '2022-08-04 04:46:02'),
(183, '', '2022-08-25', -1, 44, 65, NULL, 72, '2022-08-29 04:55:24', '2022-09-11 04:34:29'),
(184, '', '2022-08-24', -1, 44, 66, NULL, 72, '2022-08-29 04:55:59', '2022-09-11 04:33:53'),
(185, 'Initial stock', '2022-08-31', 1, 65, NULL, NULL, 38, '2022-08-31 06:38:40', '2022-08-31 06:38:40'),
(186, '', '2022-08-31', -1, 65, 67, NULL, 38, '2022-08-31 06:39:19', '2022-08-31 06:39:19'),
(187, 'Initial stock', '2022-09-10', 1, 66, NULL, NULL, 24, '2022-09-10 14:40:56', '2022-09-10 14:40:56'),
(188, '', '2022-09-10', -1, 66, 68, NULL, 24, '2022-09-10 14:43:12', '2022-09-10 14:43:12'),
(189, 'Initial stock', '2022-09-12', 1, 67, NULL, NULL, 72, '2022-09-12 12:10:14', '2022-09-12 12:10:14'),
(190, '', '2022-09-01', -1, 67, 69, NULL, 72, '2022-09-12 12:11:18', '2022-09-12 12:11:18'),
(191, 'Initial stock', '2022-09-14', 10, 68, NULL, NULL, 38, '2022-09-14 03:56:48', '2022-09-14 03:56:48'),
(192, '', '2022-09-14', -1, 68, 70, NULL, 38, '2022-09-14 04:02:31', '2022-09-14 04:02:31'),
(193, 'Initial stock', '2022-09-14', 2, 69, NULL, NULL, 38, '2022-09-14 04:06:58', '2022-09-14 04:06:58'),
(194, '', '2022-09-14', -1, 69, 71, NULL, 38, '2022-09-14 04:07:30', '2022-09-14 04:07:30'),
(195, 'Initial stock', '2022-09-19', 1, 70, NULL, NULL, 77, '2022-09-19 13:10:19', '2022-09-19 13:10:19'),
(196, 'Initial stock', '2022-09-19', 0, 71, NULL, NULL, 77, '2022-09-19 13:11:39', '2022-09-19 13:11:39'),
(197, '', '2022-09-19', -1, 70, 72, NULL, 77, '2022-09-19 13:47:33', '2022-09-19 13:47:33'),
(198, '', '2022-09-19', 1000, 70, NULL, NULL, 77, '2022-09-19 14:10:33', '2022-09-19 14:10:33'),
(199, '', '2022-09-19', 1000, 71, NULL, NULL, 77, '2022-09-19 14:10:40', '2022-09-19 14:10:40'),
(200, '', '2022-09-19', -5, 70, 73, NULL, 77, '2022-09-19 14:11:44', '2022-09-19 14:11:44'),
(201, '', '2022-09-19', 1000, 70, NULL, NULL, 77, '2022-09-19 14:16:04', '2022-09-19 14:16:04'),
(202, '', '2022-09-19', -1000, 70, NULL, NULL, 77, '2022-09-19 14:16:23', '2022-09-19 14:16:23'),
(203, 'Initial stock', '2022-09-19', 0, 72, NULL, NULL, 77, '2022-09-19 14:17:48', '2022-09-19 14:17:48'),
(204, 'Initial stock', '2022-09-19', 0, 73, NULL, NULL, 77, '2022-09-19 14:18:55', '2022-09-19 14:18:55'),
(205, 'Initial stock', '2022-09-19', 0, 74, NULL, NULL, 77, '2022-09-19 14:19:48', '2022-09-19 14:19:48'),
(206, 'Initial stock', '2022-09-19', 0, 75, NULL, NULL, 77, '2022-09-19 14:21:12', '2022-09-19 14:21:12'),
(207, '', '2022-09-19', 1000, 72, NULL, NULL, 77, '2022-09-19 14:27:53', '2022-09-19 14:27:53'),
(208, '', '2022-09-19', 1000, 74, NULL, NULL, 77, '2022-09-19 14:28:04', '2022-09-19 14:28:04'),
(209, '', '2022-09-19', 1000, 75, NULL, NULL, 77, '2022-09-19 14:28:16', '2022-09-19 14:28:16'),
(210, 'Initial stock', '2022-09-21', 1, 76, NULL, NULL, 72, '2022-09-21 04:03:52', '2022-09-21 04:03:52'),
(211, '', '2022-09-21', -1, 76, 74, NULL, 72, '2022-09-21 04:04:32', '2022-09-21 04:04:32'),
(212, 'Initial stock', '2022-09-21', 0, 77, NULL, NULL, 77, '2022-09-21 10:02:42', '2022-09-21 10:02:42'),
(213, 'Initial stock', '2022-09-21', 0, 78, NULL, NULL, 77, '2022-09-21 10:03:44', '2022-09-21 10:03:44'),
(214, 'Initial stock', '2022-09-21', 0, 79, NULL, NULL, 77, '2022-09-21 10:05:01', '2022-09-21 10:05:01'),
(215, 'Initial stock', '2022-09-21', 0, 80, NULL, NULL, 77, '2022-09-21 10:06:08', '2022-09-21 10:06:08'),
(216, 'Initial stock', '2022-09-21', 0, 81, NULL, NULL, 77, '2022-09-21 10:07:06', '2022-09-21 10:07:06'),
(217, 'Initial stock', '2022-09-21', 0, 82, NULL, NULL, 77, '2022-09-21 10:08:55', '2022-09-21 10:08:55'),
(218, 'Initial stock', '2022-09-21', 0, 83, NULL, NULL, 77, '2022-09-21 10:09:48', '2022-09-21 10:09:48'),
(219, 'Initial stock', '2022-09-21', 0, 84, NULL, NULL, 77, '2022-09-21 10:10:53', '2022-09-21 10:10:53'),
(220, 'Initial stock', '2022-09-21', 0, 85, NULL, NULL, 77, '2022-09-21 10:12:13', '2022-09-21 10:12:13'),
(221, 'Initial stock', '2022-09-21', 0, 86, NULL, NULL, 77, '2022-09-21 10:12:49', '2022-09-21 10:12:49'),
(222, 'Initial stock', '2022-09-21', 0, 87, NULL, NULL, 77, '2022-09-21 10:15:05', '2022-09-21 10:15:05'),
(223, '', '2022-09-21', -1, 71, 75, NULL, 77, '2022-09-21 12:50:23', '2022-09-21 12:50:23'),
(224, '', '2022-09-21', 1000, 77, NULL, NULL, 77, '2022-09-21 14:09:13', '2022-09-21 14:09:13'),
(225, '', '2022-09-21', 1000, 78, NULL, NULL, 77, '2022-09-21 14:10:20', '2022-09-21 14:10:20'),
(226, '', '2022-09-21', 1000, 79, NULL, NULL, 77, '2022-09-21 14:10:37', '2022-09-21 14:10:37'),
(227, '', '2022-09-21', 1000, 80, NULL, NULL, 77, '2022-09-21 14:10:53', '2022-09-21 14:10:53'),
(228, '', '2022-09-21', 1000, 81, NULL, NULL, 77, '2022-09-21 14:11:03', '2022-09-21 14:11:03'),
(229, '', '2022-09-21', 1000, 82, NULL, NULL, 77, '2022-09-21 14:11:23', '2022-09-21 14:11:23'),
(230, '', '2022-09-21', 1000, 83, NULL, NULL, 77, '2022-09-21 14:11:42', '2022-09-21 14:11:42'),
(231, '', '2022-09-21', 1000, 84, NULL, NULL, 77, '2022-09-21 14:11:59', '2022-09-21 14:11:59'),
(232, '', '2022-09-21', 1000, 85, NULL, NULL, 77, '2022-09-21 14:12:17', '2022-09-21 14:12:17'),
(233, '', '2022-09-21', 1000, 86, NULL, NULL, 77, '2022-09-21 14:12:31', '2022-09-21 14:12:31'),
(234, '', '2022-09-21', 1000, 87, NULL, NULL, 77, '2022-09-21 14:12:47', '2022-09-21 14:12:47'),
(235, '', '2022-09-21', -1, 79, 76, NULL, 77, '2022-09-21 14:17:48', '2022-09-21 14:22:45'),
(236, '', '2022-09-21', -1, 78, 76, NULL, 77, '2022-09-21 14:17:48', '2022-09-21 14:22:45'),
(237, '', '2022-09-21', -1, 81, 76, NULL, 77, '2022-09-21 14:17:48', '2022-09-21 14:22:45'),
(238, '', '2022-09-21', 1000, 77, NULL, NULL, 77, '2022-09-21 14:21:18', '2022-09-21 14:21:18'),
(239, 'Pcs', '2022-09-21', -1000, 77, NULL, NULL, 77, '2022-09-21 14:21:45', '2022-09-21 14:21:45'),
(240, '', '2022-09-21', 1000, 77, NULL, NULL, 77, '2022-09-21 14:22:08', '2022-09-21 14:22:08'),
(241, '', '2022-09-21', -1000, 77, NULL, NULL, 77, '2022-09-21 14:22:21', '2022-09-21 14:22:21'),
(242, '', '2022-09-21', -1, 87, 77, NULL, 77, '2022-09-21 14:29:45', '2022-09-21 14:29:45'),
(243, '', '2022-09-21', -1, 72, 78, NULL, 77, '2022-09-21 14:35:50', '2022-09-21 14:35:50'),
(244, '', '2022-09-21', -1, 71, 79, NULL, 77, '2022-09-21 14:37:19', '2022-09-21 14:37:19'),
(245, '', '2022-09-22', -1, 75, 80, NULL, 77, '2022-09-22 02:08:17', '2022-09-22 02:08:17'),
(246, '', '2022-09-22', -1, 70, 81, NULL, 77, '2022-09-22 03:47:40', '2022-09-22 03:47:40'),
(247, '', '2022-09-22', -1, 84, 82, NULL, 77, '2022-09-22 03:50:43', '2022-09-22 03:50:43'),
(248, '', '2022-09-22', -2, 71, 83, NULL, 77, '2022-09-22 03:53:13', '2022-09-22 03:53:13'),
(249, '', '2022-09-22', -1, 72, 84, NULL, 77, '2022-09-22 03:54:23', '2022-09-22 03:54:23'),
(250, '', '2022-09-22', -2, 71, 85, NULL, 77, '2022-09-22 04:09:25', '2022-09-22 04:09:25'),
(251, '', '2022-09-22', -2, 71, 86, NULL, 77, '2022-09-22 04:20:34', '2022-09-22 04:20:34'),
(252, '', '2022-09-22', -1, 71, 87, NULL, 77, '2022-09-22 04:21:45', '2022-09-22 04:21:45'),
(253, '', '2022-09-22', -1, 87, 87, NULL, 77, '2022-09-22 04:21:45', '2022-09-22 04:21:45'),
(254, '', '2022-09-22', -2, 70, 88, NULL, 77, '2022-09-22 04:22:21', '2022-09-22 04:22:21'),
(255, '', '2022-09-22', -2, 83, 89, NULL, 77, '2022-09-22 05:02:50', '2022-09-22 05:02:50'),
(256, '', '2022-09-22', -1, 70, 90, NULL, 77, '2022-09-22 05:18:50', '2022-09-22 05:18:50'),
(257, '', '2022-09-22', -1, 70, 91, NULL, 77, '2022-09-22 05:20:03', '2022-09-22 05:20:03'),
(258, '', '2022-09-22', -1, 87, 92, NULL, 77, '2022-09-22 05:20:32', '2022-09-22 05:20:32'),
(259, '', '2022-09-22', -1, 71, 93, NULL, 77, '2022-09-22 05:49:20', '2022-09-22 05:49:20'),
(260, '', '2022-09-22', -2, 87, 94, NULL, 77, '2022-09-22 05:49:52', '2022-09-22 05:49:52'),
(261, '', '2022-09-22', -1, 72, 94, NULL, 77, '2022-09-22 05:49:52', '2022-09-22 05:49:52'),
(262, 'Initial stock', '2022-09-22', 0, 88, NULL, NULL, 77, '2022-09-22 06:45:31', '2022-09-22 06:45:31'),
(263, '', '2022-09-22', -5, 84, 95, NULL, 77, '2022-09-22 06:56:37', '2022-09-22 06:56:37'),
(264, '', '2022-09-22', -3, 70, 95, NULL, 77, '2022-09-22 06:56:37', '2022-09-22 06:56:37'),
(265, '', '2022-09-22', -2, 87, 96, NULL, 77, '2022-09-22 06:59:54', '2022-09-22 06:59:54'),
(266, '', '2022-09-22', -1, 70, 96, NULL, 77, '2022-09-22 06:59:54', '2022-09-22 06:59:54'),
(267, '', '2022-09-22', -1, 72, 96, NULL, 77, '2022-09-22 06:59:54', '2022-09-22 06:59:54'),
(268, '', '2022-09-22', -2, 72, 97, NULL, 77, '2022-09-22 09:17:55', '2022-09-22 09:17:55'),
(269, '', '2022-09-22', -1, 71, 97, NULL, 77, '2022-09-22 09:17:55', '2022-09-22 09:17:55'),
(270, '', '2022-09-22', -1, 70, 97, NULL, 77, '2022-09-22 09:17:55', '2022-09-22 09:17:55'),
(271, '', '2022-09-22', -1, 75, 97, NULL, 77, '2022-09-22 09:17:55', '2022-09-22 09:17:55'),
(272, '', '2022-09-22', -2, 71, 98, NULL, 77, '2022-09-22 09:18:39', '2022-09-22 09:18:39'),
(273, '', '2022-09-22', -1, 72, 98, NULL, 77, '2022-09-22 09:18:39', '2022-09-22 09:18:39'),
(274, '', '2022-09-22', -1, 70, 98, NULL, 77, '2022-09-22 09:18:39', '2022-09-22 09:18:39'),
(275, '', '2022-09-22', -1, 70, 99, NULL, 77, '2022-09-22 09:19:05', '2022-09-22 09:19:05'),
(276, '', '2022-09-22', -3, 70, 100, NULL, 77, '2022-09-22 10:13:21', '2022-09-22 10:13:21'),
(277, '', '2022-09-22', -3, 74, 100, NULL, 77, '2022-09-22 10:13:21', '2022-09-22 10:13:21'),
(278, '', '2022-09-22', -1, 70, 101, NULL, 77, '2022-09-22 10:19:28', '2022-09-22 10:19:28'),
(279, '', '2022-09-22', -1, 70, 102, NULL, 77, '2022-09-22 10:19:56', '2022-09-22 10:19:56'),
(280, '', '2022-09-22', -1, 87, 103, NULL, 77, '2022-09-22 10:21:03', '2022-09-22 10:21:03'),
(281, '', '2022-09-22', -1, 87, 104, NULL, 77, '2022-09-22 10:38:25', '2022-09-22 10:38:25'),
(282, '', '2022-09-22', -1, 87, 105, NULL, 77, '2022-09-22 10:38:43', '2022-09-22 10:38:43'),
(283, '', '2022-09-22', 1000, 88, NULL, NULL, 77, '2022-09-22 10:40:06', '2022-09-22 10:40:06'),
(284, '', '2022-09-22', -1, 70, 106, NULL, 77, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(285, '', '2022-09-22', -1, 71, 106, NULL, 77, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(286, '', '2022-09-22', -1, 72, 106, NULL, 77, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(287, '', '2022-09-22', -1, 74, 106, NULL, 77, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(288, '', '2022-09-22', -1, 75, 106, NULL, 77, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(289, '', '2022-09-22', -1, 77, 106, NULL, 77, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(290, '', '2022-09-22', -1, 78, 106, NULL, 77, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(291, '', '2022-09-22', -1, 79, 106, NULL, 77, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(292, '', '2022-09-22', -1, 80, 106, NULL, 77, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(293, '', '2022-09-22', -1, 81, 106, NULL, 77, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(294, '', '2022-09-22', -1, 82, 106, NULL, 77, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(295, '', '2022-09-22', -1, 83, 106, NULL, 77, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(296, '', '2022-09-22', -1, 84, 106, NULL, 77, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(297, '', '2022-09-22', -1, 85, 106, NULL, 77, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(298, '', '2022-09-22', -1, 86, 106, NULL, 77, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(299, '', '2022-09-22', -1, 87, 106, NULL, 77, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(300, '', '2022-09-22', -6, 88, 106, NULL, 77, '2022-09-22 14:06:18', '2022-09-22 14:06:18'),
(301, '', '2022-09-26', -1, 34, 107, NULL, 72, '2022-09-26 09:23:59', '2022-09-26 09:23:59'),
(302, '', '2022-09-27', -1, 33, 108, NULL, 72, '2022-09-27 06:34:40', '2022-09-27 06:34:40'),
(303, '', '2022-09-27', -1, 32, 108, NULL, 72, '2022-09-27 06:34:40', '2022-09-27 06:34:40'),
(304, '', '2022-09-27', -1, 36, 108, NULL, 72, '2022-09-27 06:34:40', '2022-09-27 06:34:40'),
(305, '', '2022-09-27', -1, 37, 108, NULL, 72, '2022-09-27 06:34:40', '2022-09-27 06:34:40'),
(306, '', '2022-09-27', -1, 38, 108, NULL, 72, '2022-09-27 06:34:40', '2022-09-27 06:34:40'),
(307, '', '2022-09-27', -1, 41, 108, NULL, 72, '2022-09-27 06:34:40', '2022-09-27 06:34:40'),
(308, '', '2022-09-27', -1, 39, 108, NULL, 72, '2022-09-27 06:34:40', '2022-09-27 06:34:40'),
(309, '', '2022-10-01', -1, 35, 109, NULL, 72, '2022-10-01 03:18:19', '2022-10-01 03:18:19'),
(310, '', '2022-10-01', -1, 35, 110, NULL, 72, '2022-10-01 03:18:21', '2022-10-01 03:18:21'),
(311, '', '2022-10-04', -1, 8, 111, NULL, 27, '2022-10-04 04:51:17', '2022-10-04 04:51:17'),
(312, '', '2022-10-11', -1, 21, 112, NULL, 51, '2022-10-11 05:18:09', '2022-10-17 13:31:25'),
(313, '', '2022-11-01', -1, 21, 113, NULL, 51, '2022-11-01 08:37:37', '2022-11-01 08:37:37'),
(314, '', '2022-11-01', -1, 21, 113, NULL, 51, '2022-11-01 08:37:37', '2022-11-01 08:37:37'),
(315, 'Initial stock', '2022-12-01', 7, 89, NULL, NULL, 51, '2022-12-01 11:39:26', '2022-12-01 11:39:26'),
(316, '', '2022-12-02', -1, 21, 114, NULL, 51, '2022-12-01 11:48:37', '2022-12-01 11:48:37'),
(317, '', '2022-12-02', -7, 89, 114, NULL, 51, '2022-12-01 11:48:37', '2022-12-01 11:48:37'),
(318, '', '2023-01-02', -1, 21, 115, NULL, 51, '2023-01-02 10:46:00', '2023-01-02 10:46:00'),
(319, '', '2023-02-02', -1, 21, 116, NULL, 51, '2023-02-02 09:25:16', '2023-02-02 09:25:16'),
(320, '', '2023-02-02', -1, 21, 116, NULL, 51, '2023-02-02 09:25:16', '2023-02-02 09:25:16'),
(321, '', '2023-02-02', -1, 21, 117, NULL, 51, '2023-02-02 09:28:38', '2023-02-02 09:28:38'),
(322, '', '2023-02-02', -1, 21, 117, NULL, 51, '2023-02-02 09:28:38', '2023-02-02 09:28:38'),
(323, 'Initial stock', '2023-03-01', 50, 90, NULL, NULL, 86, '2023-03-01 14:06:36', '2023-03-01 14:06:36'),
(324, '', '2023-03-01', -10, 90, NULL, NULL, 86, '2023-03-01 14:06:58', '2023-03-01 14:06:58'),
(325, '', '2023-03-01', -2, 90, 118, NULL, 86, '2023-03-01 14:15:14', '2023-03-01 14:15:14'),
(326, 'Initial stock', '2023-03-01', 40, 91, NULL, NULL, 86, '2023-03-01 15:26:25', '2023-03-01 15:26:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_service_units`
--

CREATE TABLE `product_service_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_service_units`
--

INSERT INTO `product_service_units` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'unit', 19, '2021-07-21 23:50:57', '2021-07-21 23:50:57'),
(2, 'unit', 20, '2021-07-24 08:37:29', '2021-07-24 08:37:29'),
(3, 'unit', 21, '2021-08-21 22:38:27', '2021-08-21 22:38:27'),
(4, 'unit', 22, '2021-08-29 10:53:25', '2021-08-29 10:53:25'),
(5, 'unit', 23, '2021-08-31 23:37:23', '2021-08-31 23:37:23'),
(6, 'unit', 24, '2021-10-21 06:25:36', '2021-10-21 06:25:36'),
(7, 'unit', 25, '2021-10-21 16:49:56', '2021-10-21 16:49:56'),
(8, 'unit', 26, '2021-11-07 21:40:13', '2021-11-07 21:40:13'),
(9, 'gram', 20, '2021-11-10 07:28:53', '2021-11-10 07:28:53'),
(10, 'Kg', 20, '2021-11-10 07:29:04', '2021-11-10 07:29:04'),
(11, 'Botol', 27, NULL, NULL),
(12, 'Bungkus', 27, NULL, NULL),
(13, 'Copy', 27, NULL, NULL),
(14, 'Dus', 27, NULL, NULL),
(15, 'Gram', 27, NULL, NULL),
(16, 'Item', 27, NULL, NULL),
(17, 'Kaleng', 27, NULL, NULL),
(18, 'Karung', 27, NULL, NULL),
(19, 'kg', 27, NULL, NULL),
(20, 'Lembar', 27, NULL, NULL),
(21, 'Liter', 27, NULL, NULL),
(22, 'Ons', 27, NULL, NULL),
(23, 'Pasang', 27, NULL, NULL),
(24, 'Unit', 27, NULL, NULL),
(25, 'Botol', 28, NULL, NULL),
(26, 'Bungkus', 28, NULL, NULL),
(27, 'Copy', 28, NULL, NULL),
(28, 'Dus', 28, NULL, NULL),
(29, 'Gram', 28, NULL, NULL),
(30, 'Item', 28, NULL, NULL),
(31, 'Kaleng', 28, NULL, NULL),
(32, 'Karung', 28, NULL, NULL),
(33, 'kg', 28, NULL, NULL),
(34, 'Lembar', 28, NULL, NULL),
(35, 'Liter', 28, NULL, NULL),
(36, 'Ons', 28, NULL, NULL),
(37, 'Pasang', 28, NULL, NULL),
(38, 'Unit', 28, NULL, NULL),
(39, 'Biji', 29, NULL, NULL),
(40, 'Dus', 29, NULL, NULL),
(41, 'Bungkus', 29, NULL, NULL),
(42, 'Kaleng', 29, NULL, NULL),
(43, 'Kg', 32, NULL, NULL),
(44, 'Pcs', 32, NULL, NULL),
(45, 'Gram', 33, NULL, NULL),
(46, 'Unit', 34, NULL, NULL),
(47, 'Kg', 35, NULL, NULL),
(48, 'Dus', 35, NULL, NULL),
(49, 'Gram', 35, NULL, NULL),
(50, 'Bungkus', 35, NULL, NULL),
(51, 'Pcs', 36, NULL, NULL),
(52, 'Pasang', 37, NULL, NULL),
(53, 'Pcs', 37, NULL, NULL),
(54, 'Rim', 37, NULL, NULL),
(55, 'Unit', 37, NULL, NULL),
(56, 'Biji', 37, NULL, NULL),
(57, 'Botol', 37, NULL, NULL),
(58, 'Bungkus', 37, NULL, NULL),
(59, 'Copy', 37, NULL, NULL),
(60, 'Pcs', 24, NULL, NULL),
(61, 'Kg', 24, NULL, NULL),
(62, 'pack', 24, NULL, NULL),
(65, 'Pasang', 39, NULL, NULL),
(66, 'Pcs', 39, NULL, NULL),
(67, 'Rim', 39, NULL, NULL),
(68, 'Unit', 39, NULL, NULL),
(69, 'Biji', 39, NULL, NULL),
(70, 'Botol', 39, NULL, NULL),
(71, 'Bungkus', 39, NULL, NULL),
(72, 'Copy', 39, NULL, NULL),
(73, 'Dus', 39, NULL, NULL),
(74, 'Gross', 39, NULL, NULL),
(75, 'Kaleng', 39, NULL, NULL),
(76, 'Karung', 39, NULL, NULL),
(77, 'Gram', 39, NULL, NULL),
(78, 'Kg', 39, NULL, NULL),
(79, 'Kodi', 39, NULL, NULL),
(80, 'Lembar', 39, NULL, NULL),
(81, 'Lempeng', 39, NULL, NULL),
(82, 'Liter', 39, NULL, NULL),
(83, 'Lusin', 39, NULL, NULL),
(84, 'Pasang', 41, NULL, NULL),
(85, 'Pcs', 41, NULL, NULL),
(86, 'Rim', 41, NULL, NULL),
(87, 'Unit', 41, NULL, NULL),
(88, 'Biji', 41, NULL, NULL),
(89, 'Botol', 41, NULL, NULL),
(90, 'Copy', 41, NULL, NULL),
(91, 'Dus', 41, NULL, NULL),
(92, 'Lembar', 41, NULL, NULL),
(93, 'Lusin', 41, NULL, NULL),
(94, 'Pasang', 43, NULL, NULL),
(95, 'Pcs', 43, NULL, NULL),
(96, 'Rim', 43, NULL, NULL),
(97, 'Unit', 43, NULL, NULL),
(98, 'Pasang', 43, NULL, NULL),
(99, 'Pcs', 43, NULL, NULL),
(100, 'Rim', 43, NULL, NULL),
(101, 'Unit', 43, NULL, NULL),
(102, 'Pasang', 44, NULL, NULL),
(103, 'Pcs', 44, NULL, NULL),
(104, 'Rim', 44, NULL, NULL),
(105, 'Unit', 44, NULL, NULL),
(106, 'Botol', 44, NULL, NULL),
(107, 'Pasang', 45, NULL, NULL),
(108, 'Pcs', 45, NULL, NULL),
(109, 'Rim', 45, NULL, NULL),
(110, 'Unit', 45, NULL, NULL),
(111, 'Pasang', 46, NULL, NULL),
(112, 'Pcs', 46, NULL, NULL),
(113, 'Rim', 46, NULL, NULL),
(114, 'Unit', 46, NULL, NULL),
(115, 'Biji', 46, NULL, NULL),
(116, 'Pasang', 47, NULL, NULL),
(117, 'Pcs', 47, NULL, NULL),
(118, 'Rim', 47, NULL, NULL),
(119, 'Unit', 47, NULL, NULL),
(120, 'Akun', 50, NULL, NULL),
(121, 'Akun', 51, NULL, NULL),
(122, 'PCS', 38, '2022-04-17 21:24:41', '2022-04-17 21:24:41'),
(124, 'Pcs', 54, NULL, NULL),
(127, 'Kg', 54, NULL, NULL),
(129, 'm2', 54, NULL, NULL),
(130, 'Pcs', 55, NULL, NULL),
(131, 'Unit', 55, NULL, NULL),
(132, 'Box', 55, NULL, NULL),
(133, 'Pasang', 32, NULL, NULL),
(134, 'Pcs', 32, NULL, NULL),
(135, 'Rim', 32, NULL, NULL),
(136, 'Unit', 32, NULL, NULL),
(137, 'Botol', 32, NULL, NULL),
(138, 'Bungkus', 32, NULL, NULL),
(139, 'Copy', 32, NULL, NULL),
(140, 'Dus', 32, NULL, NULL),
(141, 'Gross', 32, NULL, NULL),
(142, 'Kaleng', 32, NULL, NULL),
(143, 'Karung', 32, NULL, NULL),
(144, 'Kodi', 32, NULL, NULL),
(145, 'Lembar', 32, NULL, NULL),
(146, 'Lempeng', 32, NULL, NULL),
(147, 'Liter', 32, NULL, NULL),
(148, 'Lusin', 32, NULL, NULL),
(149, 'Pcs', 56, NULL, NULL),
(150, 'Unit', 56, NULL, NULL),
(151, 'Pasang', 58, NULL, NULL),
(152, 'Pcs', 58, NULL, NULL),
(153, 'Rim', 58, NULL, NULL),
(154, 'Unit', 58, NULL, NULL),
(155, 'SLO', 59, NULL, NULL),
(156, 'SUPERVISI', 59, NULL, NULL),
(157, 'Instalasi', 59, NULL, NULL),
(158, 'Unit', 51, '2022-05-11 20:12:07', '2022-05-11 20:12:07'),
(159, 'Pasang', 60, NULL, NULL),
(160, 'Pcs', 60, NULL, NULL),
(161, 'Rim', 60, NULL, NULL),
(162, 'Unit', 60, NULL, NULL),
(163, 'Biji', 60, NULL, NULL),
(164, 'Kg', 60, NULL, NULL),
(165, 'Pasang', 61, NULL, NULL),
(166, 'Pcs', 61, NULL, NULL),
(167, 'Rim', 61, NULL, NULL),
(168, 'Unit', 61, NULL, NULL),
(169, 'Pasang', 62, NULL, NULL),
(170, 'Pcs', 62, NULL, NULL),
(171, 'Rim', 62, NULL, NULL),
(172, 'Unit', 62, NULL, NULL),
(173, 'Biji', 62, NULL, NULL),
(174, 'Botol', 62, NULL, NULL),
(175, 'Bungkus', 62, NULL, NULL),
(176, 'Copy', 62, NULL, NULL),
(177, 'Dus', 62, NULL, NULL),
(178, 'Gross', 62, NULL, NULL),
(179, 'Kaleng', 62, NULL, NULL),
(180, 'Karung', 62, NULL, NULL),
(181, 'Gram', 62, NULL, NULL),
(182, 'Kg', 62, NULL, NULL),
(183, 'Kodi', 62, NULL, NULL),
(184, 'Lembar', 62, NULL, NULL),
(185, 'Lempeng', 62, NULL, NULL),
(186, 'Liter', 62, NULL, NULL),
(187, 'Lusin', 62, NULL, NULL),
(188, 'Pasang', 64, NULL, NULL),
(189, 'Pcs', 64, NULL, NULL),
(190, 'Rim', 64, NULL, NULL),
(191, 'Unit', 64, NULL, NULL),
(192, 'Pasang', 65, NULL, NULL),
(193, 'Pcs', 65, NULL, NULL),
(194, 'Rim', 65, NULL, NULL),
(195, 'Unit', 65, NULL, NULL),
(196, 'Pasang', 67, NULL, NULL),
(197, 'Pcs', 67, NULL, NULL),
(198, 'Rim', 67, NULL, NULL),
(199, 'Unit', 67, NULL, NULL),
(200, 'Pcs', 68, NULL, NULL),
(201, 'Botol', 68, NULL, NULL),
(202, 'Bungkus', 68, NULL, NULL),
(203, 'Pasang', 69, NULL, NULL),
(204, 'Pcs', 69, NULL, NULL),
(205, 'Rim', 69, NULL, NULL),
(206, 'Unit', 69, NULL, NULL),
(207, 'Pasang', 71, NULL, NULL),
(208, 'Pcs', 71, NULL, NULL),
(209, 'Rim', 71, NULL, NULL),
(210, 'Unit', 71, NULL, NULL),
(211, 'Bungkus', 71, NULL, NULL),
(212, 'Pasang', 72, NULL, NULL),
(213, 'Pcs', 72, NULL, NULL),
(214, 'Rim', 72, NULL, NULL),
(215, 'Unit', 72, NULL, NULL),
(216, 'Proyek', 72, NULL, NULL),
(217, 'persen', 24, '2022-09-10 14:39:57', '2022-09-10 14:39:57'),
(218, 'Pasang', 77, NULL, NULL),
(219, 'Pcs', 77, NULL, NULL),
(220, 'Rim', 77, NULL, NULL),
(221, 'Unit', 77, NULL, NULL),
(222, 'Biji', 77, '2022-09-21 14:20:51', '2022-09-21 14:20:51'),
(223, 'Pcs', 83, NULL, NULL),
(224, 'Kg', 84, NULL, NULL),
(225, 'Kwintal', 84, NULL, NULL),
(226, 'Pcs', 85, NULL, NULL),
(227, 'Pasang', 86, NULL, NULL),
(228, 'Pcs', 86, NULL, NULL),
(229, 'Rim', 86, NULL, NULL),
(230, 'Unit', 86, NULL, NULL),
(231, 'Biji', 86, NULL, NULL),
(232, 'Botol', 86, NULL, NULL),
(233, 'Bungkus', 86, NULL, NULL),
(234, 'Copy', 86, NULL, NULL),
(235, 'Dus', 86, NULL, NULL),
(236, 'Gross', 86, NULL, NULL),
(237, 'Kaleng', 86, NULL, NULL),
(238, 'Karung', 86, NULL, NULL),
(239, 'Gram', 86, NULL, NULL),
(240, 'Kg', 86, NULL, NULL),
(241, 'Kodi', 86, NULL, NULL),
(242, 'Lembar', 86, NULL, NULL),
(243, 'Lempeng', 86, NULL, NULL),
(244, 'Liter', 86, NULL, NULL),
(245, 'Lusin', 86, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposals`
--

CREATE TABLE `proposals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proposal_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `issue_date` date NOT NULL,
  `send_date` date DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `discount_apply` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `served_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `proposals`
--

INSERT INTO `proposals` (`id`, `proposal_id`, `customer_id`, `issue_date`, `send_date`, `category_id`, `status`, `discount_apply`, `created_by`, `served_by`, `created_at`, `updated_at`) VALUES
(2, 1, 6, '2021-11-25', '2021-11-25', 42, 4, 0, 27, 0, '2021-11-25 06:10:45', '2021-11-25 06:18:51'),
(3, 1, 28, '2022-07-19', '2022-07-20', 527, 1, 1, 72, 0, '2022-07-20 04:33:20', '2022-07-20 04:35:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposal_products`
--

CREATE TABLE `proposal_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `tax` double(16,2) NOT NULL DEFAULT 0.00,
  `discount` double(16,2) NOT NULL DEFAULT 0.00,
  `price` double(16,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `proposal_products`
--

INSERT INTO `proposal_products` (`id`, `proposal_id`, `product_id`, `quantity`, `tax`, `discount`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 6, 6, 0.00, 0.00, 8000.00, '2021-11-25 06:10:45', '2021-11-25 06:10:45'),
(2, 3, 31, 1, 0.00, 1500000.00, 6000000.00, '2022-07-20 04:33:20', '2022-07-20 04:33:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `referral_points`
--

CREATE TABLE `referral_points` (
  `id` bigint(20) NOT NULL,
  `point` int(11) NOT NULL,
  `created_by` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `referral_points`
--

INSERT INTO `referral_points` (`id`, `point`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 0, 27, '2021-12-01 09:51:07', '2021-12-01 09:51:07'),
(2, 0, 24, '2021-12-02 03:42:39', '2021-12-02 03:42:39'),
(3, 0, 20, '2021-12-15 13:06:17', '2021-12-15 13:06:17'),
(4, 0, 37, '2021-12-29 13:43:05', '2021-12-29 13:43:05'),
(5, 0, 41, '2022-03-16 05:58:44', '2022-03-16 05:58:44'),
(6, 20000, 38, '2022-03-29 10:15:38', '2022-03-29 15:49:59'),
(7, 0, 47, '2022-04-06 14:38:40', '2022-04-06 14:38:40'),
(8, 0, 50, '2022-04-10 11:11:14', '2022-04-10 11:11:14'),
(9, 0, 51, '2022-04-10 11:17:17', '2022-04-10 11:17:17'),
(10, 0, 49, '2022-04-10 21:45:04', '2022-04-10 21:45:04'),
(11, 0, 54, '2022-06-09 08:22:57', '2022-06-09 08:22:57'),
(12, 0, 72, '2022-07-21 03:14:14', '2022-07-21 03:14:14'),
(13, 0, 77, '2022-09-21 09:55:43', '2022-09-21 09:55:43'),
(14, 0, 83, '2022-10-31 12:27:46', '2022-10-31 12:27:46'),
(15, 0, 84, '2022-11-18 18:36:33', '2022-11-18 18:36:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `referral_point_histories`
--

CREATE TABLE `referral_point_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `amount` int(11) NOT NULL,
  `ref_id` bigint(20) NOT NULL,
  `created_by` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `referral_point_histories`
--

INSERT INTO `referral_point_histories` (`id`, `description`, `amount`, `ref_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Arda membeli paket layanan', 10000, 6, 46, '2022-03-29 13:54:45', '2022-03-29 13:54:45'),
(2, 'Dlo Spam Referral membeli paket layanan', 10000, 6, 44, '2022-03-29 15:49:59', '2022-03-29 15:49:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `referral_withdraw_requests`
--

CREATE TABLE `referral_withdraw_requests` (
  `id` bigint(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `destination` text NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `revenues`
--

CREATE TABLE `revenues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` double(16,2) NOT NULL DEFAULT 0.00,
  `account_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL DEFAULT 'nofile.svg',
  `description` text NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `served_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `revenues`
--

INSERT INTO `revenues` (`id`, `date`, `amount`, `account_id`, `customer_id`, `category_id`, `payment_method`, `reference`, `description`, `created_by`, `served_by`, `created_at`, `updated_at`) VALUES
(1, '2021-05-20', 810000.00, 1, 0, 6, 1, 'nofile.svg', 'Panen Labu 300kg', 19, 0, '2021-07-22 00:33:38', '2021-07-22 00:33:38'),
(2, '2021-06-10', 100000.00, 1, 0, 7, 1, 'nofile.svg', '1 tundun pisang', 19, 0, '2021-07-22 00:35:17', '2021-07-22 00:35:17'),
(3, '2021-07-08', 127000.00, 1, 0, 7, 2, 'nofile.svg', 'pisang 2 tundun', 19, 0, '2021-07-22 00:54:25', '2021-07-22 00:54:25'),
(4, '2021-07-18', 40000.00, 1, 0, 6, 2, 'nofile.svg', 'Labu 3 buah', 19, 0, '2021-07-22 00:55:00', '2021-07-22 00:55:00'),
(5, '2021-07-24', 20000.00, 1, 0, 6, 1, 'nofile.svg', '2 labu', 19, 0, '2021-07-24 04:04:10', '2021-07-24 04:04:10'),
(6, '2021-04-02', 40000.00, 2, 0, 10, 3, 'nofile.svg', '4 cpns', 20, 0, '2021-07-24 08:44:14', '2021-07-24 08:44:14'),
(7, '2021-04-03', 30000.00, 2, 0, 10, 3, 'nofile.svg', '3 cpns', 20, 0, '2021-07-24 08:45:13', '2021-07-24 08:45:13'),
(9, '2021-04-04', 30000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-07-24 08:46:49', '2021-07-24 08:46:49'),
(10, '2021-04-05', 20000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-07-24 08:47:14', '2021-07-24 08:47:14'),
(11, '2021-04-06', 10000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-07-24 08:47:33', '2021-07-24 08:47:33'),
(12, '2021-04-08', 30000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-07-24 08:47:58', '2021-07-24 08:47:58'),
(13, '2021-04-09', 40000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-07-24 08:51:16', '2021-07-24 08:51:16'),
(14, '2021-04-10', 50000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-07-24 08:51:39', '2021-07-24 08:51:39'),
(15, '2021-04-11', 70000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-07-24 08:52:29', '2021-07-24 08:52:29'),
(16, '2021-04-12', 50000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-07-24 08:53:19', '2021-07-24 08:53:19'),
(18, '2021-04-13', 300000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-07-24 08:55:00', '2021-07-24 08:55:00'),
(19, '2021-04-14', 100000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-07-24 08:55:32', '2021-07-24 08:55:32'),
(20, '2021-06-14', 90000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 08:59:22', '2021-07-24 08:59:22'),
(21, '2021-06-15', 140000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 08:59:59', '2021-07-24 08:59:59'),
(22, '2021-06-16', 90000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:00:35', '2021-07-24 09:00:35'),
(23, '2021-06-17', 110000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:01:05', '2021-07-24 09:01:05'),
(24, '2021-06-18', 170000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:01:35', '2021-07-24 09:01:35'),
(25, '2021-06-19', 130000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:02:03', '2021-07-24 09:02:03'),
(26, '2021-06-20', 240000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:02:28', '2021-07-24 09:02:28'),
(27, '2021-06-21', 130000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:03:07', '2021-07-24 09:03:07'),
(28, '2021-06-22', 220000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:09:15', '2021-07-24 09:09:15'),
(29, '2021-06-23', 370000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:09:53', '2021-07-24 09:09:53'),
(30, '2021-06-24', 640000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:10:37', '2021-07-24 09:10:37'),
(31, '2021-06-25', 840000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:11:22', '2021-07-24 09:11:22'),
(32, '2021-06-26', 920000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:12:03', '2021-07-24 09:12:03'),
(33, '2021-06-27', 400000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:13:00', '2021-07-24 09:13:00'),
(34, '2021-06-28', 520000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:13:33', '2021-07-24 09:13:33'),
(35, '2021-06-29', 490000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:14:02', '2021-07-24 09:14:02'),
(36, '2021-06-30', 1130000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:14:49', '2021-07-24 09:14:49'),
(37, '2021-07-01', 1500000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:15:31', '2021-07-24 09:15:31'),
(38, '2021-07-02', 1420000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:16:09', '2021-07-24 09:16:09'),
(39, '2021-07-03', 1460000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:16:52', '2021-07-24 09:16:52'),
(40, '2021-07-04', 1250000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:17:51', '2021-07-24 09:17:51'),
(41, '2021-07-05', 870000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:18:25', '2021-07-24 09:18:25'),
(42, '2021-07-06', 950000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:19:06', '2021-07-24 09:19:06'),
(43, '2021-07-07', 750000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:19:39', '2021-07-24 09:19:39'),
(44, '2021-07-08', 910000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:20:27', '2021-07-24 09:20:27'),
(45, '2021-07-09', 740000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:20:59', '2021-07-24 09:20:59'),
(46, '2021-07-10', 1190000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:21:47', '2021-07-24 09:21:47'),
(47, '2021-07-11', 870000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:22:20', '2021-07-24 09:22:20'),
(48, '2021-07-12', 690000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:23:02', '2021-07-24 09:23:02'),
(49, '2021-07-13', 860000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:23:36', '2021-07-24 09:23:36'),
(50, '2021-07-14', 790000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:24:07', '2021-07-24 09:24:07'),
(51, '2021-07-15', 900000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:24:43', '2021-07-24 09:24:43'),
(52, '2021-07-16', 860000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:25:26', '2021-07-24 09:25:26'),
(53, '2021-07-17', 1240000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:26:02', '2021-07-24 09:26:02'),
(54, '2021-07-18', 580000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:26:33', '2021-07-24 09:26:33'),
(55, '2021-07-19', 530000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:27:12', '2021-07-24 09:27:12'),
(56, '2021-07-20', 410000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:27:44', '2021-07-24 09:27:44'),
(57, '2021-07-21', 450000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:28:13', '2021-07-24 09:28:13'),
(58, '2021-07-22', 540000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:28:49', '2021-07-24 09:28:49'),
(59, '2021-07-23', 860000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-07-24 09:30:21', '2021-07-24 09:30:21'),
(60, '2021-07-27', 20000.00, 1, 0, 6, 1, 'nofile.svg', 'jual labu', 19, 0, '2021-07-27 22:01:40', '2021-07-27 22:01:40'),
(61, '2021-07-26', 8000000.00, 1, 0, 13, 1, 'nofile.svg', 'tambah modal', 19, 0, '2021-07-27 22:02:10', '2021-07-27 22:02:10'),
(62, '2021-08-01', 410000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 21:25:43', '2021-08-23 21:25:43'),
(63, '2021-08-02', 380000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 21:26:22', '2021-08-23 21:26:22'),
(64, '2021-08-03', 760000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 21:26:59', '2021-08-23 21:26:59'),
(65, '2021-08-04', 690000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 21:28:18', '2021-08-23 21:28:18'),
(66, '2021-08-05', 480000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 21:28:54', '2021-08-23 21:28:54'),
(67, '2021-08-06', 560000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 21:30:03', '2021-08-23 21:30:03'),
(68, '2021-08-07', 530000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 21:30:35', '2021-08-23 21:30:35'),
(69, '2021-08-08', 440000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 21:56:44', '2021-08-23 21:56:44'),
(70, '2021-08-09', 460000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 21:57:31', '2021-08-23 21:57:31'),
(71, '2021-08-10', 1820000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 21:58:11', '2021-08-23 21:58:11'),
(72, '2021-08-11', 4250000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 21:59:03', '2021-08-23 21:59:03'),
(73, '2021-08-12', 1590000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 21:59:43', '2021-08-23 21:59:43'),
(74, '2021-08-13', 1120000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:00:55', '2021-08-23 22:00:55'),
(75, '2021-08-14', 740000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:01:24', '2021-08-23 22:01:24'),
(76, '2021-08-15', 750000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:01:59', '2021-08-23 22:01:59'),
(77, '2021-08-16', 550000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:02:31', '2021-08-23 22:02:31'),
(78, '2021-08-17', 1480000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:03:10', '2021-08-23 22:03:10'),
(79, '2021-08-18', 830000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:08:49', '2021-08-23 22:08:49'),
(80, '2021-08-19', 610000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:10:29', '2021-08-23 22:10:29'),
(81, '2021-08-20', 930000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:11:01', '2021-08-23 22:11:01'),
(82, '2021-08-21', 900000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:11:31', '2021-08-23 22:11:31'),
(83, '2021-08-22', 470000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:12:06', '2021-08-23 22:12:06'),
(84, '2021-08-23', 440000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:12:57', '2021-08-23 22:12:57'),
(85, '2021-08-01', 60000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:16:23', '2021-08-23 22:16:23'),
(86, '2021-08-02', 50000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:16:45', '2021-08-23 22:16:45'),
(87, '2021-08-03', 510000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:17:19', '2021-08-23 22:17:19'),
(89, '2021-08-04', 270000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:19:33', '2021-08-23 22:19:33'),
(91, '2021-08-05', 230000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:20:35', '2021-08-23 22:20:35'),
(92, '2021-08-06', 230000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:22:03', '2021-08-23 22:22:03'),
(93, '2021-08-07', 120000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:22:33', '2021-08-23 22:22:33'),
(94, '2021-08-08', 120000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:23:00', '2021-08-23 22:23:00'),
(95, '2021-08-09', 90000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:23:19', '2021-08-23 22:23:19'),
(96, '2021-08-10', 100000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:23:42', '2021-08-23 22:23:42'),
(97, '2021-08-11', 340000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:24:17', '2021-08-23 22:24:17'),
(98, '2021-08-12', 110000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:27:32', '2021-08-23 22:27:32'),
(99, '2021-08-13', 120000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:35:54', '2021-08-23 22:35:54'),
(100, '2021-08-14', 180000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:36:18', '2021-08-23 22:36:18'),
(101, '2021-08-15', 40000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:36:42', '2021-08-23 22:36:42'),
(102, '2021-08-16', 130000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:37:06', '2021-08-23 22:37:06'),
(103, '2021-08-17', 250000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:37:32', '2021-08-23 22:37:32'),
(104, '2021-08-18', 80000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:38:01', '2021-08-23 22:38:01'),
(105, '2021-08-19', 160000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:38:24', '2021-08-23 22:38:24'),
(106, '2021-08-20', 260000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:38:47', '2021-08-23 22:38:47'),
(107, '2021-08-21', 110000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:39:09', '2021-08-23 22:39:09'),
(108, '2021-08-22', 100000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:39:31', '2021-08-23 22:39:31'),
(109, '2021-08-23', 130000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-08-23 22:39:59', '2021-08-23 22:39:59'),
(110, '2021-09-01', 580000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-10-20 11:23:31', '2021-10-20 11:23:31'),
(111, '2021-09-02', 700000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-10-20 11:24:18', '2021-10-20 11:24:18'),
(112, '2021-09-03', 840000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-10-20 11:25:07', '2021-10-20 11:25:07'),
(114, '2021-09-04', 1160000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-10-20 11:26:02', '2021-10-20 11:26:02'),
(115, '2021-09-05', 900000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-10-20 11:27:11', '2021-10-20 11:27:11'),
(116, '2021-09-06', 500000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-10-20 11:29:33', '2021-10-20 11:29:33'),
(117, '2021-09-07', 310000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-10-20 11:30:55', '2021-10-20 11:30:55'),
(118, '2021-09-08', 290000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-10-20 11:31:45', '2021-10-20 11:31:45'),
(119, '2021-09-09', 1390000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-10-20 11:49:45', '2021-10-20 11:49:45'),
(120, '2021-09-10', 720000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-10-20 11:50:29', '2021-10-20 11:50:29'),
(121, '2021-09-11', 370000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-10-20 11:51:10', '2021-10-20 11:51:10'),
(122, '2021-09-12', 270000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-10-20 11:52:27', '2021-10-20 11:52:27'),
(123, '2021-09-13', 450000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-10-20 11:53:37', '2021-10-20 11:53:37'),
(124, '2021-09-14', 370000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-10-20 11:54:07', '2021-10-20 11:54:07'),
(125, '2021-09-15', 300000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-10-20 11:54:59', '2021-10-20 11:54:59'),
(126, '2021-11-08', 38000.00, 4, 1, 37, 15, 'nofile.svg', '', 26, 0, '2021-11-07 22:02:25', '2021-11-07 22:02:25'),
(127, '2021-08-24', 100000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:45:31', '2021-11-09 12:45:31'),
(128, '2021-08-25', 130000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:46:12', '2021-11-09 12:46:12'),
(129, '2021-08-26', 100000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:46:43', '2021-11-09 12:46:43'),
(130, '2021-08-27', 50000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:47:08', '2021-11-09 12:47:08'),
(131, '2021-08-28', 20000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:48:17', '2021-11-09 12:48:17'),
(132, '2021-08-29', 120000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:48:43', '2021-11-09 12:48:43'),
(133, '2021-08-30', 40000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:49:16', '2021-11-09 12:49:16'),
(134, '2021-08-31', 50000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:49:35', '2021-11-09 12:49:35'),
(135, '2021-09-01', 40000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:49:56', '2021-11-09 12:49:56'),
(136, '2021-09-02', 40000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:50:19', '2021-11-09 12:50:19'),
(137, '2021-09-03', 40000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:50:56', '2021-11-09 12:50:56'),
(138, '2021-09-04', 120000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:51:23', '2021-11-09 12:51:23'),
(139, '2021-09-05', 170000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:52:05', '2021-11-09 12:52:05'),
(140, '2021-09-06', 80000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:52:36', '2021-11-09 12:52:36'),
(141, '2021-09-07', 50000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:52:58', '2021-11-09 12:52:58'),
(142, '2021-09-08', 60000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:53:38', '2021-11-09 12:53:38'),
(143, '2021-09-09', 150000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:54:10', '2021-11-09 12:54:10'),
(144, '2021-09-10', 60000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:54:35', '2021-11-09 12:54:35'),
(145, '2021-09-11', 30000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:55:01', '2021-11-09 12:55:01'),
(146, '2021-09-12', 30000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:55:29', '2021-11-09 12:55:29'),
(147, '2021-09-13', 20000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:55:50', '2021-11-09 12:55:50'),
(148, '2021-09-14', 40000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:56:17', '2021-11-09 12:56:17'),
(149, '2021-09-16', 50000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:56:45', '2021-11-09 12:56:45'),
(150, '2021-09-17', 40000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 12:57:52', '2021-11-09 12:57:52'),
(151, '2021-09-18', 60000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:09:01', '2021-11-09 13:09:01'),
(152, '2021-09-19', 20000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:09:29', '2021-11-09 13:09:29'),
(153, '2021-09-20', 40000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:09:59', '2021-11-09 13:09:59'),
(154, '2021-09-21', 20000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:10:19', '2021-11-09 13:10:19'),
(155, '2021-09-22', 30000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:10:39', '2021-11-09 13:10:39'),
(156, '2021-09-23', 10000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:11:01', '2021-11-09 13:11:01'),
(157, '2021-09-24', 10000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:11:16', '2021-11-09 13:11:16'),
(158, '2021-09-25', 10000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:11:29', '2021-11-09 13:11:29'),
(159, '2021-09-26', 30000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:11:56', '2021-11-09 13:11:56'),
(160, '2021-09-28', 10000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:12:16', '2021-11-09 13:12:16'),
(161, '2021-09-29', 20000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:12:39', '2021-11-09 13:12:39'),
(162, '2021-09-30', 10000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:12:58', '2021-11-09 13:12:58'),
(163, '2021-10-02', 10000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:13:30', '2021-11-09 13:13:30'),
(164, '2021-10-03', 30000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:13:54', '2021-11-09 13:13:54'),
(165, '2021-10-04', 20000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:14:22', '2021-11-09 13:14:22'),
(166, '2021-10-05', 20000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:14:46', '2021-11-09 13:14:46'),
(167, '2021-10-06', 20000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:15:09', '2021-11-09 13:15:09'),
(168, '2021-10-07', 10000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:15:24', '2021-11-09 13:15:24'),
(169, '2021-10-09', 10000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:15:44', '2021-11-09 13:15:44'),
(170, '2021-10-10', 10000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:15:59', '2021-11-09 13:15:59'),
(171, '2021-10-12', 10000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:16:11', '2021-11-09 13:16:11'),
(172, '2021-11-01', 100000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:18:11', '2021-11-09 13:18:11'),
(173, '2021-11-02', 210000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:18:45', '2021-11-09 13:18:45'),
(175, '2021-11-03', 130000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:20:21', '2021-11-09 13:20:21'),
(176, '2021-11-04', 40000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:20:58', '2021-11-09 13:20:58'),
(178, '2021-11-06', 50000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:21:39', '2021-11-09 13:21:39'),
(179, '2021-11-05', 60000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:22:12', '2021-11-09 13:22:12'),
(180, '2021-11-07', 70000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:22:41', '2021-11-09 13:22:41'),
(181, '2021-11-08', 60000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:23:09', '2021-11-09 13:23:09'),
(182, '2021-09-16', 410000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:32:31', '2021-11-09 13:32:31'),
(183, '2021-09-17', 570000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:33:01', '2021-11-09 13:33:01'),
(184, '2021-09-18', 250000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:34:04', '2021-11-09 13:34:04'),
(185, '2021-09-19', 250000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:34:31', '2021-11-09 13:34:31'),
(186, '2021-09-20', 180000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:35:01', '2021-11-09 13:35:01'),
(187, '2021-09-21', 200000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:35:30', '2021-11-09 13:35:30'),
(188, '2021-09-22', 210000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:35:56', '2021-11-09 13:35:56'),
(189, '2021-09-23', 200000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:36:27', '2021-11-09 13:36:27'),
(190, '2021-09-24', 130000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:36:51', '2021-11-09 13:36:51'),
(191, '2021-09-25', 70000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:37:15', '2021-11-09 13:37:15'),
(192, '2021-09-26', 40000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:37:41', '2021-11-09 13:37:41'),
(193, '2021-09-27', 90000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:38:11', '2021-11-09 13:38:11'),
(194, '2021-09-28', 60000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:38:34', '2021-11-09 13:38:34'),
(195, '2021-09-29', 70000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:39:29', '2021-11-09 13:39:29'),
(196, '2021-09-30', 30000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:39:57', '2021-11-09 13:39:57'),
(197, '2021-10-01', 40000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:40:29', '2021-11-09 13:40:29'),
(198, '2021-10-02', 60000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:41:01', '2021-11-09 13:41:01'),
(199, '2021-10-03', 50000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:41:26', '2021-11-09 13:41:26'),
(200, '2021-10-04', 160000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:41:53', '2021-11-09 13:41:53'),
(201, '2021-10-05', 160000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:42:22', '2021-11-09 13:42:22'),
(202, '2021-10-06', 200000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:42:47', '2021-11-09 13:42:47'),
(203, '2021-10-07', 120000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:43:23', '2021-11-09 13:43:23'),
(204, '2021-10-08', 780000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:43:52', '2021-11-09 13:43:52'),
(205, '2021-10-09', 1660000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:44:27', '2021-11-09 13:44:27'),
(206, '2021-10-10', 1660000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:45:14', '2021-11-09 13:45:14'),
(207, '2021-10-11', 2520000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:45:51', '2021-11-09 13:45:51'),
(208, '2021-10-12', 750000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:46:15', '2021-11-09 13:46:15'),
(209, '2021-10-13', 480000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:46:45', '2021-11-09 13:46:45'),
(210, '2021-10-14', 590000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:47:34', '2021-11-09 13:47:34'),
(211, '2021-10-15', 490000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:47:59', '2021-11-09 13:47:59'),
(212, '2021-10-16', 230000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:48:18', '2021-11-09 13:48:18'),
(213, '2021-10-17', 290000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:48:46', '2021-11-09 13:48:46'),
(214, '2021-10-18', 330000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:49:09', '2021-11-09 13:49:09'),
(215, '2021-10-19', 250000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:49:32', '2021-11-09 13:49:32'),
(216, '2021-10-20', 240000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:49:52', '2021-11-09 13:49:52'),
(217, '2021-10-21', 390000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:50:28', '2021-11-09 13:50:28'),
(218, '2021-10-22', 400000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:50:55', '2021-11-09 13:50:55'),
(219, '2021-10-23', 360000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:51:21', '2021-11-09 13:51:21'),
(220, '2021-10-24', 260000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:51:56', '2021-11-09 13:51:56'),
(221, '2021-10-25', 230000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:52:21', '2021-11-09 13:52:21'),
(222, '2021-10-26', 170000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:52:48', '2021-11-09 13:52:48'),
(223, '2021-10-27', 200000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:53:22', '2021-11-09 13:53:22'),
(224, '2021-10-28', 280000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:53:45', '2021-11-09 13:53:45'),
(225, '2021-10-29', 210000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:54:06', '2021-11-09 13:54:06'),
(226, '2021-10-30', 300000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:54:30', '2021-11-09 13:54:30'),
(227, '2021-10-31', 100000.00, 2, 0, 12, 3, 'nofile.svg', '', 20, 0, '2021-11-09 13:55:06', '2021-11-09 13:55:06'),
(228, '2021-04-15', 260000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 14:16:18', '2021-11-09 14:16:18'),
(229, '2021-04-16', 70000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 14:24:11', '2021-11-09 14:24:11'),
(230, '2021-04-17', 10000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 14:24:40', '2021-11-09 14:24:40'),
(231, '2021-04-19', 10000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 14:25:05', '2021-11-09 14:25:05'),
(232, '2021-04-20', 20000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 14:26:14', '2021-11-09 14:26:14'),
(233, '2021-04-21', 10000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 14:26:39', '2021-11-09 14:26:39'),
(234, '2021-04-22', 10000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 14:26:55', '2021-11-09 14:26:55'),
(235, '2021-04-23', 30000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 14:27:21', '2021-11-09 14:27:21'),
(236, '2021-04-24', 10000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 14:27:52', '2021-11-09 14:27:52'),
(237, '2021-04-25', 10000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 14:28:09', '2021-11-09 14:28:09'),
(238, '2021-04-26', 10000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 14:28:29', '2021-11-09 14:28:29'),
(239, '2021-04-27', 10000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 14:28:50', '2021-11-09 14:28:50'),
(240, '2021-04-28', 20000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 14:29:38', '2021-11-09 14:29:38'),
(241, '2021-04-30', 30000.00, 2, 0, 10, 3, 'nofile.svg', '', 20, 0, '2021-11-09 14:30:10', '2021-11-09 14:30:10'),
(242, '2021-05-31', 700000.00, 2, 0, 10, 3, 'nofile.svg', 'akumulasi mei', 20, 0, '2021-11-09 14:33:25', '2021-11-09 14:33:25'),
(243, '2021-06-30', 510000.00, 2, 0, 10, 3, 'nofile.svg', 'akumulasi juni', 20, 0, '2021-11-09 14:36:33', '2021-11-09 14:36:33'),
(244, '2021-07-31', 5230000.00, 2, 0, 10, 3, 'nofile.svg', 'akumulasi akun cpns juli', 20, 0, '2021-11-09 14:39:17', '2021-11-09 14:39:17'),
(245, '2021-05-31', 8000000.00, 2, 0, 12, 3, 'nofile.svg', 'akumulasi akun p3k', 20, 0, '2021-11-09 14:56:06', '2021-11-09 14:56:06'),
(246, '2021-11-12', 5000.00, 5, NULL, 42, 17, 'nofile.svg', 'Coba LLL', 27, 0, '2021-11-12 00:09:35', '2021-11-12 00:17:51'),
(247, '2021-12-05', 500000.00, 6, 7, 89, 28, 'nofile.svg', 'pameran', 33, 0, '2021-12-04 21:00:09', '2021-12-04 21:00:09'),
(251, '2021-08-11', 50000.00, 7, 8, 151, 46, 'nofile.svg', 'Coba', 37, 0, '2022-02-09 15:07:18', '2022-02-09 15:07:18'),
(252, '2021-12-10', 5000.00, 8, 6, 42, 18, 'nofile.svg', ' ', 27, 0, '2022-02-15 07:05:45', '2022-02-15 07:05:45'),
(253, '2021-12-10', 8000.00, 8, 6, 42, 18, 'nofile.svg', ' ', 27, 0, '2022-02-15 07:05:45', '2022-02-15 07:05:45'),
(254, '2021-04-15', 50000.00, 5, 12, 42, 18, 'nofile.svg', '', 27, 0, '2022-02-15 07:05:45', '2022-04-11 03:24:57'),
(257, '2022-03-11', 80000.00, 11, 13, 207, 63, 'nofile.svg', 'asdasd', 41, 0, '2022-03-11 05:45:11', '2022-03-11 05:45:11'),
(258, '2022-02-22', 1130000.00, 10, NULL, 177, 54, 'nofile.svg', 'Kartu Golden Sun', 38, 0, '2022-03-13 15:59:41', '2022-03-13 15:59:41'),
(259, '2022-04-01', 440000.00, 10, NULL, 177, 53, 'nofile.svg', 'Kartu Muhammadiyah 1', 38, 0, '2022-04-09 15:44:05', '2022-04-09 15:44:05'),
(260, '2022-03-22', 50000.00, 12, NULL, 281, 81, 'nofile.svg', '', 50, 0, '2022-04-10 10:58:08', '2022-04-10 10:58:08'),
(261, '2022-03-22', 50000.00, 13, NULL, 286, 83, 'nofile.svg', '', 51, 0, '2022-04-10 11:20:36', '2022-04-10 11:20:36'),
(262, '2022-03-23', 190000.00, 13, NULL, 286, 83, 'nofile.svg', '', 51, 0, '2022-04-10 11:22:03', '2022-04-10 11:22:03'),
(263, '2022-01-03', 65000.00, 15, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:01:50', '2022-04-15 07:01:50'),
(264, '2021-12-08', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:01:50', '2022-04-15 07:01:50'),
(265, '2021-12-12', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:01:50', '2022-04-15 07:01:50'),
(266, '2021-12-02', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:01:50', '2022-04-15 07:01:50'),
(267, '2021-12-01', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:01:50', '2022-04-15 07:01:50'),
(268, '2021-12-20', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:01:50', '2022-04-15 07:01:50'),
(269, '2022-01-03', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:07:27', '2022-04-15 07:07:27'),
(270, '2021-12-08', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:07:27', '2022-04-15 07:07:27'),
(271, '2021-12-12', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:07:27', '2022-04-15 07:07:27'),
(272, '2021-12-02', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:07:27', '2022-04-15 07:07:27'),
(273, '2021-12-01', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:07:27', '2022-04-15 07:07:27'),
(274, '2021-12-20', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:07:27', '2022-04-15 07:07:27'),
(275, '2022-01-03', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:07:48', '2022-04-15 07:07:48'),
(276, '2021-12-08', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:07:48', '2022-04-15 07:07:48'),
(277, '2021-12-12', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:07:48', '2022-04-15 07:07:48'),
(278, '2021-12-02', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:07:48', '2022-04-15 07:07:48'),
(279, '2021-12-01', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:07:48', '2022-04-15 07:07:48'),
(281, '2022-01-03', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:10:43', '2022-04-15 07:10:43'),
(282, '2021-12-08', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:10:43', '2022-04-15 07:10:43'),
(283, '2021-12-12', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:10:43', '2022-04-15 07:10:43'),
(284, '2021-12-02', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:10:43', '2022-04-15 07:10:43'),
(285, '2021-12-01', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:10:43', '2022-04-15 07:10:43'),
(286, '2021-12-20', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:10:43', '2022-04-15 07:10:43'),
(287, '2022-01-03', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:11:59', '2022-04-15 07:11:59'),
(288, '2021-12-08', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:11:59', '2022-04-15 07:11:59'),
(289, '2021-12-12', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:11:59', '2022-04-15 07:11:59'),
(290, '2021-12-02', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:11:59', '2022-04-15 07:11:59'),
(291, '2021-12-01', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:11:59', '2022-04-15 07:11:59'),
(292, '2021-12-20', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:11:59', '2022-04-15 07:11:59'),
(293, '2022-01-03', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:14:16', '2022-04-15 07:14:16'),
(294, '2021-12-08', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:14:16', '2022-04-15 07:14:16'),
(295, '2021-12-12', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:14:16', '2022-04-15 07:14:16'),
(296, '2021-12-02', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:14:16', '2022-04-15 07:14:16'),
(297, '2021-12-01', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:14:16', '2022-04-15 07:14:16'),
(298, '2021-12-20', 65000.00, 5, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:14:16', '2022-04-15 07:14:16'),
(299, '2022-01-03', 65000.00, 15, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:18:42', '2022-04-15 07:18:42'),
(300, '2021-12-08', 65000.00, 15, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:18:42', '2022-04-15 07:18:42'),
(301, '2021-12-12', 65000.00, 15, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:18:42', '2022-04-15 07:18:42'),
(302, '2021-12-02', 65000.00, 15, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:18:42', '2022-04-15 07:18:42'),
(303, '2021-12-01', 65000.00, 15, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:18:42', '2022-04-15 07:18:42'),
(304, '2021-12-20', 65000.00, 15, 20, 42, 18, 'nofile.svg', 'Tomat 10kg', 27, 0, '2022-04-15 07:18:42', '2022-04-15 07:18:42'),
(306, '2022-04-02', 100000.00, 13, NULL, 286, 83, 'nofile.svg', 'ini pembayaran yag belum tercatat', 51, 0, '2022-04-26 09:43:58', '2022-04-26 09:43:58'),
(307, '2022-03-24', 200000.00, 18, 23, 286, 84, 'nofile.svg', ' ', 51, 0, '2022-05-11 22:07:56', '2022-05-11 22:07:56'),
(310, '2022-03-27', 120000.00, 18, 23, 286, 84, 'nofile.svg', ' ', 51, 0, '2022-05-11 22:07:56', '2022-05-11 22:07:56'),
(311, '2022-03-28', 110000.00, 18, 23, 286, 84, 'nofile.svg', ' ', 51, 0, '2022-05-11 22:07:56', '2022-05-11 22:07:56'),
(312, '2022-03-29', 60000.00, 18, 23, 286, 84, 'nofile.svg', ' ', 51, 0, '2022-05-11 22:07:56', '2022-05-11 22:07:56'),
(313, '2022-03-30', 40000.00, 18, 23, 286, 84, 'nofile.svg', ' ', 51, 0, '2022-05-11 22:07:56', '2022-05-11 22:07:56'),
(314, '2022-03-31', 120000.00, 18, 23, 286, 84, 'nofile.svg', ' ', 51, 0, '2022-05-11 22:07:56', '2022-05-11 22:07:56'),
(316, '2022-03-25', 170000.00, 18, 23, 286, 84, 'nofile.svg', ' ', 51, 0, '2022-05-11 22:10:52', '2022-05-11 22:10:52'),
(317, '2022-03-26', 140000.00, 18, 23, 286, 84, 'nofile.svg', ' ', 51, 0, '2022-05-11 22:10:52', '2022-05-11 22:10:52'),
(323, '2022-03-24', 200000.00, 5, 24, 420, 18, 'nofile.svg', ' ', 27, 0, '2022-05-12 09:32:21', '2022-05-12 09:32:21'),
(324, '2022-03-25', 170000.00, 5, 24, 420, 18, 'nofile.svg', ' ', 27, 0, '2022-05-12 09:32:21', '2022-05-12 09:32:21'),
(325, '2022-03-26', 140000.00, 5, 24, 420, 18, 'nofile.svg', ' ', 27, 0, '2022-05-12 09:32:21', '2022-05-12 09:32:21'),
(326, '2022-03-27', 120000.00, 5, 24, 420, 18, 'nofile.svg', ' ', 27, 0, '2022-05-12 09:32:21', '2022-05-12 09:32:21'),
(327, '2022-03-28', 110000.00, 5, 24, 420, 18, 'nofile.svg', ' ', 27, 0, '2022-05-12 09:32:21', '2022-05-12 09:32:21'),
(328, '2022-03-29', 60000.00, 5, 24, 420, 18, 'nofile.svg', ' ', 27, 0, '2022-05-12 09:32:21', '2022-05-12 09:32:21'),
(329, '2022-03-30', 40000.00, 5, 24, 420, 18, 'nofile.svg', ' ', 27, 0, '2022-05-12 09:32:21', '2022-05-12 09:32:21'),
(330, '2022-03-31', 120000.00, 5, 24, 420, 18, 'nofile.svg', ' ', 27, 0, '2022-05-12 09:32:21', '2022-05-12 09:32:21'),
(331, '2022-05-28', 25000.00, 19, NULL, 386, 111, 'nofile.svg', '', 60, 0, '2022-05-28 08:16:00', '2022-05-28 08:16:00'),
(332, '2022-05-28', 25000.00, 19, 26, 386, 108, 'nofile.svg', '', 60, 0, '2022-05-28 08:20:38', '2022-05-28 08:20:38'),
(336, '2022-09-08', 2500000.00, 21, NULL, 527, 143, 'nofile.svg', 'pembayaran pembuatan akta pendirian dan kuasa', 72, 0, '2022-09-15 04:07:32', '2022-09-15 04:07:32'),
(337, '2022-09-02', 6000000.00, 21, 67, 527, 143, 'nofile.svg', 'PEMBAYARAN PT BERKAT ARANG SUKSES', 72, 0, '2022-09-15 04:10:37', '2022-09-15 04:10:37'),
(339, '2022-09-07', 9550000.00, 21, 54, 527, 143, 'nofile.svg', 'PEMBAYARAN HT I WAYAN RAY', 72, 0, '2022-09-15 04:12:11', '2022-09-15 04:12:11'),
(340, '2022-09-05', 6300000.00, 21, 52, 527, 143, 'nofile.svg', 'PEMBAYARAN PEMBUATAN HT', 72, 0, '2022-09-15 04:13:02', '2022-09-15 04:13:02'),
(342, '2022-08-30', 8300000.00, 21, 57, 527, 143, 'nofile.svg', 'PEMBAYARAN HAPOSAN', 72, 0, '2022-09-15 04:19:25', '2022-09-15 04:19:25'),
(343, '2022-08-30', 3050000.00, 21, 58, 527, 143, 'nofile.svg', 'PEMBAYARAN HT SANTI', 72, 0, '2022-09-15 04:20:10', '2022-09-15 04:20:10'),
(344, '2022-08-30', 4050000.00, 21, 59, 527, 143, 'nofile.svg', 'PEMBAYARAN HT IDA', 72, 0, '2022-09-15 04:23:38', '2022-09-15 04:23:38'),
(345, '2022-08-29', 7050000.00, 21, 60, 527, 143, 'nofile.svg', 'PEMBAYARAN HT SODIKIN', 72, 0, '2022-09-15 04:42:42', '2022-09-15 04:42:42'),
(346, '2022-08-24', 3300000.00, 21, 61, 527, 143, 'nofile.svg', 'INVOICE MARIO NOVA', 72, 0, '2022-09-15 04:44:57', '2022-09-15 04:44:57'),
(347, '2022-08-23', 3050000.00, 21, 62, 527, 143, 'nofile.svg', 'PEMBAYARAN HT Daniel', 72, 0, '2022-09-15 04:46:02', '2022-09-15 04:46:02'),
(348, '2022-08-23', 3050000.00, 21, 63, 527, 143, 'nofile.svg', 'pembayaran HT ROBBY', 72, 0, '2022-09-15 04:47:48', '2022-09-15 04:47:48'),
(349, '2022-08-15', 5500000.00, 21, 64, 527, 143, 'nofile.svg', 'PEMBAYARAN HT FITRI', 72, 0, '2022-09-15 04:48:50', '2022-10-03 05:18:02'),
(350, '2022-07-31', 19973200.00, 21, NULL, 525, 143, 'nofile.svg', 'Hutang Ke Bu ajeng pribadi', 72, 0, '2022-09-19 07:32:55', '2022-09-19 07:32:55'),
(352, '2022-09-25', 833000.00, 23, NULL, 525, 144, 'nofile.svg', 'Pinjaman cash utuk balancing cash kecil', 72, 0, '2022-09-25 15:49:07', '2022-09-25 15:49:07'),
(353, '2022-08-22', 4000000.00, 21, NULL, 527, 143, 'nofile.svg', 'pembayaran peningkatan kilat titut', 72, 0, '2022-09-28 04:12:03', '2022-09-28 04:12:03'),
(354, '2022-08-30', 7050000.00, 21, NULL, 527, 143, 'nofile.svg', 'pemabayaran ht dari bfi atas nama yusam', 72, 0, '2022-09-28 04:17:23', '2022-09-28 04:17:23'),
(355, '2022-09-08', 750000.00, 21, NULL, 527, 143, 'nofile.svg', 'biaya pengurusan polres bu rasuna', 72, 0, '2022-09-28 06:20:14', '2022-09-28 06:20:14'),
(356, '2022-09-23', 2000000.00, 21, NULL, 527, 143, 'nofile.svg', 'pembayaran pengurusan pse', 72, 0, '2022-10-03 05:14:55', '2022-10-03 05:14:55'),
(357, '2022-09-02', 7050000.00, 21, NULL, 527, 143, 'nofile.svg', 'pembayaran ht moh yusam fauzi', 72, 0, '2022-10-03 05:19:07', '2022-10-03 05:19:07'),
(358, '2022-09-12', 3050000.00, 21, NULL, 527, 143, 'nofile.svg', 'M. DELTI REZA', 72, 0, '2022-10-03 05:21:08', '2022-10-03 05:21:08'),
(359, '2022-09-13', 9550000.00, 21, NULL, 527, 143, 'nofile.svg', 'SUBUKI BUDI UTOMO (BFI Waru)', 72, 0, '2022-10-03 05:22:47', '2022-10-03 05:24:07'),
(360, '2022-09-12', 3050000.00, 21, NULL, 527, 143, 'nofile.svg', 'YAMIN (bfi waru)', 72, 0, '2022-10-03 05:23:48', '2022-10-03 05:23:48'),
(361, '2022-09-17', 7300000.00, 21, NULL, 527, 143, 'nofile.svg', 'pembayaran ht IWAN AGUS SETIAWAN (SBY 2)', 72, 0, '2022-10-03 05:25:20', '2022-10-03 05:25:20'),
(362, '2022-09-22', 6050000.00, 21, NULL, 527, 143, 'nofile.svg', 'pembayaran HT yayuk mawarti', 72, 0, '2022-10-03 05:26:10', '2022-10-03 05:26:10'),
(363, '2022-09-22', 5550000.00, 21, NULL, 527, 143, 'nofile.svg', 'Pembayaran HT sariyo putra', 72, 0, '2022-10-03 05:27:15', '2022-10-03 05:27:15'),
(364, '2022-09-22', 20550000.00, 21, NULL, 527, 143, 'nofile.svg', 'pembayaran HT ASWIN YANUAR', 72, 0, '2022-10-03 05:27:58', '2022-10-03 05:27:58'),
(365, '2022-09-22', 8000000.00, 21, NULL, 527, 143, 'nofile.svg', 'Pembayaran IMB HADI', 72, 0, '2022-10-03 05:28:51', '2022-10-03 05:28:51'),
(366, '2022-09-28', 5000000.00, 21, NULL, 527, 143, 'nofile.svg', 'pembayaran ht royan abdilah zakaria', 72, 0, '2022-10-03 05:29:47', '2022-10-03 05:29:47'),
(367, '2022-09-29', 11100000.00, 21, NULL, 527, 143, 'nofile.svg', 'pembayaran HT rudy haryanto', 72, 0, '2022-10-03 05:33:56', '2022-10-03 05:33:56'),
(368, '2022-09-30', 4550000.00, 21, NULL, 527, 143, 'nofile.svg', 'Pembayaran', 72, 0, '2022-10-03 05:35:32', '2022-10-03 05:35:32'),
(369, '2022-09-26', 5000000.00, 21, NULL, 527, 143, 'nofile.svg', 'Pembuatan Cv Watu jaya Makmur', 72, 0, '2022-10-03 07:24:21', '2022-10-03 07:24:21'),
(370, '2022-10-05', 500000.00, 21, NULL, 527, 143, 'nofile.svg', 'pembayaran pencabutan verifikasi erik', 72, 0, '2022-10-05 09:00:25', '2022-10-05 09:00:25'),
(371, '2022-10-07', 52000.00, 22, NULL, 528, 144, 'nofile.svg', 'uang legalisir', 72, 0, '2022-10-07 02:00:22', '2022-10-07 02:00:22'),
(373, '2022-11-07', 126000.00, 13, 23, 286, 84, 'nofile.svg', 'Transaksi tgl 31 Okt - 06 Nov 2022', 51, 0, '2022-11-08 10:39:32', '2022-11-14 07:10:40'),
(374, '2022-06-23', 9000000.00, 18, NULL, 579, 83, 'nofile.svg', 'Hutang Operasional Server (Tarmizi)', 51, 0, '2022-11-09 19:42:31', '2022-11-09 19:42:31'),
(375, '2022-06-23', 3000000.00, 18, NULL, 579, 83, 'nofile.svg', 'Hutang Operasional Server (alfin)', 51, 0, '2022-11-09 19:43:23', '2022-11-09 19:46:55'),
(376, '2022-03-28', 18500000.00, 10, NULL, 581, 54, 'fc94e731b4f2b00bca2aa0ed79885bd3.jpeg', 'Untuk Beli Macbook', 38, 0, '2022-11-09 21:00:36', '2022-11-09 21:00:36'),
(377, '2022-04-11', 18500000.00, 10, NULL, 581, 54, '41c77d61189a5b7bab62593f5ac9ce91.jpeg', 'Untuk Beli Macbook Alfin', 38, 0, '2022-11-09 21:02:14', '2022-11-09 21:02:14'),
(378, '2022-09-23', 10000000.00, 14, 65, 221, 54, '21c7de7f8d78352e24bace00b52b86c9.jpeg', 'DP ke 1', 38, 0, '2022-11-10 03:26:15', '2022-11-10 03:26:15'),
(379, '2022-10-31', 10000000.00, 14, 65, 221, 54, '24f789891b75d727eceb5f282a4d5cad.jpeg', 'DP ke 2', 38, 0, '2022-11-10 03:27:31', '2022-11-10 03:27:31'),
(380, '2022-09-23', 10000000.00, 14, NULL, 221, 54, 'a4f5d4e55fef1c30882e07f84e85022a.jpeg', 'Pembuatan Goquran', 38, 0, '2022-11-10 03:35:24', '2022-11-10 03:35:24'),
(381, '2022-11-14', 130000.00, 13, 23, 286, 84, 'nofile.svg', 'Transaksi Tgl 07 - 13 Nov 2022', 51, 0, '2022-11-14 07:10:20', '2022-11-14 07:10:53'),
(382, '2022-07-26', 2047000.00, 10, NULL, 177, 54, 'nofile.svg', 'DP SMP Tanggulangin 1 3jt dikurangi biaya vendor foto 953.000', 38, 0, '2022-11-16 14:42:30', '2022-11-16 14:42:30'),
(383, '2022-10-05', 8000000.00, 10, NULL, 177, 54, 'nofile.svg', 'Pembayaran ke 2 SMP Tanggulangin, 10JT Untuk mas rohman 2JT', 38, 0, '2022-11-16 14:52:06', '2022-11-16 14:52:06'),
(384, '2022-11-21', 80000.00, 13, 23, 286, 84, '5b3a3d9cb8f3671f22224ffeb1429f0d.png', 'Transaksi Tgl 14 - 20 Nov 2022', 51, 0, '2022-11-21 08:24:11', '2022-11-21 08:33:58'),
(385, '2022-11-28', 156000.00, 13, 23, 286, 84, '5e8d8ac009ca4fc65ddaa4b3b7a1f50b.png', 'Transaksi Tgl 21 - 27 Nov 2022', 51, 0, '2022-11-28 08:48:25', '2022-12-05 04:35:38'),
(386, '2022-12-05', 148000.00, 13, 23, 286, 84, 'nofile.svg', 'Transaksi Tgl 27 Nov - 04 Des 2022', 51, 0, '2022-12-05 04:35:18', '2022-12-05 04:36:04'),
(387, '2022-12-12', 22000.00, 13, 23, 286, 84, 'nofile.svg', 'Transaksi Tgl 05 - 11 Des 2022', 51, 0, '2022-12-12 08:09:06', '2022-12-12 08:09:06'),
(388, '2022-12-19', 10000.00, 13, 23, 286, 84, 'nofile.svg', 'Transaksi Tgl 12 - 18 Des 2022', 51, 0, '2022-12-19 09:07:26', '2022-12-19 09:07:26'),
(389, '2023-01-02', 3000.00, 27, NULL, 592, 156, 'nofile.svg', '', 85, 0, '2023-01-02 13:19:54', '2023-01-02 13:19:54'),
(390, '2023-01-09', 2000.00, 13, 23, 286, 84, 'nofile.svg', 'Transaksi Tgl 02 - 08 Jan 2023', 51, 0, '2023-01-09 10:59:03', '2023-01-09 10:59:16'),
(391, '2023-01-09', 61000.00, 27, NULL, 592, 156, 'nofile.svg', '', 85, 0, '2023-01-09 14:08:52', '2023-01-09 14:08:52'),
(393, '2023-01-16', 50000.00, 27, NULL, 592, 156, 'nofile.svg', '', 85, 0, '2023-01-24 03:45:03', '2023-01-24 03:45:03'),
(394, '2023-01-23', 56000.00, 27, NULL, 592, 156, 'nofile.svg', '', 85, 0, '2023-01-24 03:46:33', '2023-01-24 03:46:33'),
(395, '2023-01-30', 48000.00, 27, NULL, 592, 156, 'nofile.svg', '', 85, 0, '2023-01-31 18:16:03', '2023-01-31 18:16:03'),
(396, '2023-01-16', 2000.00, 13, 23, 286, 84, 'nofile.svg', 'Transaksi Tgl 09 - 15 Jan 2023', 51, 0, '2023-02-02 09:20:55', '2023-02-02 09:21:04'),
(402, '2023-01-03', 30000.00, 31, NULL, 571, 151, 'nofile.svg', 'Pendapatan Tgl 26 Des 2022 - 01 Jan 2023', 83, 0, '2023-02-06 05:35:59', '2023-02-07 07:21:46'),
(403, '2023-01-11', 57000.00, 31, NULL, 571, 151, 'nofile.svg', 'Pendapatan Tgl 02 - 08 Januari 2023', 83, 0, '2023-02-06 05:37:37', '2023-02-06 05:37:37'),
(404, '2023-01-16', 32000.00, 31, NULL, 571, 151, 'nofile.svg', 'Pendapatan Tgl 09 - 15 Januari 2023', 83, 0, '2023-02-06 05:38:16', '2023-02-07 07:56:24'),
(405, '2023-02-06', 43000.00, 27, NULL, 592, 156, 'nofile.svg', '', 85, 0, '2023-02-07 10:52:38', '2023-02-07 10:52:38'),
(406, '2023-01-25', 2500000.00, 26, NULL, 583, 154, 'nofile.svg', 'Penjualan jagung', 84, 0, '2023-02-07 16:48:01', '2023-02-07 16:48:01'),
(407, '2023-02-03', 200000.00, 26, NULL, 585, 154, 'nofile.svg', 'Cabai kebun 1 - 9kg', 84, 0, '2023-02-07 16:49:28', '2023-02-07 17:07:07'),
(408, '2023-03-01', 700000.00, 32, 76, 605, 160, 'nofile.svg', '', 86, 0, '2023-03-01 14:16:51', '2023-03-01 14:16:51'),
(409, '2023-03-01', 1600000.00, 32, 76, 604, 160, 'nofile.svg', '', 86, 0, '2023-03-01 15:27:47', '2023-03-01 15:27:47'),
(410, '2023-03-02', 100000.00, 34, 75, 604, 159, 'nofile.svg', '', 86, 0, '2023-03-01 18:09:03', '2023-03-01 18:09:03'),
(411, '2023-03-02', 20000.00, 33, 75, 604, 157, 'nofile.svg', '', 86, 0, '2023-03-01 18:09:34', '2023-03-01 18:09:34'),
(412, '2023-03-02', 700000.00, 33, 76, 605, 157, 'nofile.svg', '', 86, 0, '2023-03-01 18:09:59', '2023-03-01 18:09:59'),
(413, '2023-03-02', 100000.00, 33, 75, 602, 157, 'nofile.svg', '', 86, 0, '2023-03-01 18:11:11', '2023-03-01 18:11:11'),
(414, '2023-03-02', 700000.00, 33, 76, 603, 159, 'nofile.svg', '', 86, 0, '2023-03-01 18:11:38', '2023-03-01 18:11:38'),
(415, '2023-03-04', 1600000.00, 33, 75, 606, 159, 'nofile.svg', '', 86, 0, '2023-03-04 12:09:10', '2023-03-04 12:09:10'),
(416, '2023-03-03', 40000.00, 34, 76, 606, 157, 'nofile.svg', '', 86, 0, '2023-03-04 12:22:08', '2023-03-04 12:22:08'),
(417, '2023-03-03', 600000.00, 33, 76, 603, 158, 'nofile.svg', '', 86, 0, '2023-03-04 12:24:08', '2023-03-04 12:24:08'),
(418, '2023-03-05', 200000.00, 32, 76, 605, 160, 'nofile.svg', '', 86, 0, '2023-03-04 12:28:54', '2023-03-04 12:28:54'),
(419, '2023-03-05', 10000.00, 34, 76, 602, 162, 'nofile.svg', '', 86, 0, '2023-03-04 12:31:08', '2023-03-04 12:31:08'),
(420, '2023-03-03', 500000.00, 33, 76, 608, 161, 'nofile.svg', '', 86, 0, '2023-03-04 12:33:59', '2023-03-04 12:33:59'),
(421, '2023-03-02', 300000.00, 33, 76, 606, 158, 'nofile.svg', '', 86, 0, '2023-03-04 12:35:24', '2023-03-04 12:35:24'),
(422, '2023-03-04', 10000.00, 33, 76, 604, 162, 'nofile.svg', '', 86, 0, '2023-03-04 12:37:36', '2023-03-04 12:37:36'),
(423, '2023-03-02', 1600000.00, 33, 75, 605, 159, 'nofile.svg', '', 86, 0, '2023-03-04 12:39:31', '2023-03-04 12:39:31'),
(424, '2023-03-04', 700000.00, 34, 75, 607, 161, 'nofile.svg', '', 86, 0, '2023-03-04 12:40:44', '2023-03-04 12:40:44'),
(425, '2023-03-05', 40000.00, 33, 75, 608, 158, 'nofile.svg', '', 86, 0, '2023-03-04 12:46:11', '2023-03-04 12:46:11'),
(426, '2023-03-03', 100000.00, 32, 75, 606, 161, 'nofile.svg', '', 86, 0, '2023-03-04 12:50:24', '2023-03-04 12:50:24'),
(427, '2023-03-05', 150000.00, 33, 75, 606, 157, 'nofile.svg', '', 86, 0, '2023-03-05 09:32:43', '2023-03-05 09:32:43'),
(428, '2023-03-05', 45000.00, 34, 75, 607, 160, 'nofile.svg', '', 86, 0, '2023-03-05 09:34:57', '2023-03-05 09:34:57'),
(429, '2023-03-05', 1600000.00, 32, 75, 604, 162, 'nofile.svg', '', 86, 0, '2023-03-05 09:37:13', '2023-03-05 09:37:13'),
(430, '2023-03-05', 300000.00, 34, 75, 605, 159, 'nofile.svg', '', 86, 0, '2023-03-05 09:39:19', '2023-03-05 09:39:19'),
(431, '2023-03-05', 5000.00, 34, 75, 606, 161, 'nofile.svg', '', 86, 0, '2023-03-05 10:27:03', '2023-03-05 10:27:03'),
(432, '2023-03-05', 2000000.00, 32, 75, 602, 162, 'nofile.svg', '', 86, 0, '2023-03-05 10:39:51', '2023-03-05 10:39:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'web', 0, '2021-02-03 07:34:10', '2021-02-03 07:34:10'),
(2, 'customer', 'web', 0, '2021-02-03 07:34:12', '2021-02-03 07:34:12'),
(3, 'vender', 'web', 0, '2021-02-03 07:34:14', '2021-02-03 07:34:14'),
(4, 'company', 'web', 1, '2021-02-03 07:34:15', '2021-02-03 07:34:15'),
(5, 'accountant', 'web', 2, '2021-02-03 07:34:27', '2021-02-03 07:34:27'),
(6, 'Akuntan', 'web', 38, '2022-03-15 17:51:07', '2022-03-15 17:51:07'),
(7, 'Shareholder', 'web', 51, '2022-04-10 11:18:38', '2022-04-10 11:18:38'),
(8, 'Cek Pendapatan', 'web', 27, '2022-04-11 03:46:55', '2022-04-11 03:46:55'),
(9, 'Cek pengeluaran', 'web', 27, '2022-04-11 03:47:15', '2022-04-11 03:47:15'),
(10, 'Cek Pemasukan vs pengeluaran', 'web', 27, '2022-04-11 03:47:36', '2022-04-11 03:47:36'),
(11, 'Cek laba rugi', 'web', 27, '2022-04-11 03:47:58', '2022-04-11 03:47:58'),
(12, 'Stock Checker', 'web', 51, '2022-04-26 09:10:13', '2022-04-26 09:10:13'),
(13, 'ADMIN', 'web', 72, '2022-07-18 03:27:34', '2022-07-18 03:27:34'),
(14, 'Admin', 'web', 77, '2022-09-19 13:06:02', '2022-09-19 13:06:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 4),
(1, 13),
(2, 1),
(2, 4),
(3, 1),
(3, 4),
(4, 1),
(4, 4),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(6, 1),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(7, 13),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(8, 5),
(8, 13),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(10, 1),
(11, 1),
(11, 4),
(11, 13),
(12, 1),
(12, 4),
(13, 1),
(13, 4),
(14, 1),
(14, 4),
(15, 1),
(15, 4),
(16, 1),
(16, 4),
(17, 1),
(17, 4),
(18, 1),
(18, 4),
(19, 4),
(19, 13),
(20, 4),
(21, 1),
(22, 4),
(22, 5),
(23, 4),
(23, 5),
(24, 4),
(24, 5),
(25, 4),
(25, 5),
(26, 4),
(26, 5),
(26, 6),
(26, 13),
(26, 14),
(27, 4),
(27, 5),
(27, 6),
(27, 13),
(27, 14),
(28, 4),
(28, 5),
(28, 6),
(28, 13),
(28, 14),
(29, 4),
(29, 5),
(29, 6),
(30, 2),
(30, 4),
(30, 5),
(30, 6),
(30, 14),
(31, 4),
(31, 5),
(31, 6),
(31, 13),
(31, 14),
(32, 4),
(32, 5),
(32, 6),
(33, 4),
(33, 5),
(33, 6),
(33, 13),
(33, 14),
(34, 4),
(34, 5),
(35, 4),
(35, 5),
(36, 1),
(36, 4),
(36, 5),
(37, 1),
(37, 4),
(37, 13),
(38, 1),
(39, 1),
(40, 4),
(40, 5),
(40, 13),
(41, 4),
(41, 5),
(41, 13),
(42, 4),
(42, 5),
(42, 13),
(43, 4),
(43, 5),
(44, 4),
(44, 5),
(44, 13),
(45, 4),
(45, 5),
(45, 13),
(46, 4),
(46, 5),
(46, 13),
(47, 4),
(47, 5),
(48, 4),
(48, 5),
(48, 13),
(49, 4),
(49, 5),
(49, 13),
(50, 4),
(50, 5),
(50, 13),
(51, 4),
(51, 5),
(52, 4),
(52, 5),
(52, 12),
(52, 13),
(53, 4),
(53, 5),
(53, 12),
(53, 13),
(54, 4),
(54, 5),
(54, 12),
(54, 13),
(55, 4),
(55, 5),
(55, 12),
(56, 4),
(56, 5),
(56, 13),
(57, 4),
(57, 5),
(57, 13),
(58, 4),
(58, 5),
(58, 13),
(59, 4),
(59, 5),
(60, 4),
(60, 5),
(60, 13),
(61, 4),
(61, 5),
(61, 13),
(62, 4),
(62, 5),
(62, 13),
(63, 4),
(63, 5),
(64, 4),
(64, 5),
(64, 6),
(64, 13),
(64, 14),
(65, 4),
(65, 5),
(65, 6),
(65, 13),
(66, 4),
(66, 5),
(66, 6),
(66, 13),
(67, 4),
(67, 5),
(67, 6),
(68, 4),
(68, 5),
(68, 6),
(68, 13),
(68, 14),
(69, 4),
(69, 5),
(69, 6),
(69, 13),
(70, 4),
(70, 5),
(70, 6),
(70, 13),
(71, 4),
(71, 5),
(71, 6),
(72, 4),
(72, 5),
(72, 13),
(73, 4),
(73, 5),
(73, 13),
(74, 4),
(74, 5),
(74, 13),
(75, 4),
(75, 5),
(76, 4),
(76, 5),
(76, 13),
(76, 14),
(77, 4),
(77, 5),
(77, 6),
(77, 13),
(78, 4),
(78, 5),
(78, 6),
(78, 13),
(78, 14),
(79, 4),
(79, 5),
(79, 6),
(79, 13),
(80, 4),
(80, 5),
(80, 6),
(81, 4),
(81, 5),
(81, 6),
(81, 13),
(82, 4),
(82, 5),
(82, 6),
(82, 13),
(83, 4),
(83, 5),
(83, 6),
(83, 13),
(84, 4),
(84, 5),
(84, 6),
(85, 3),
(85, 4),
(85, 5),
(85, 6),
(86, 4),
(86, 5),
(86, 6),
(86, 13),
(87, 4),
(87, 5),
(87, 6),
(87, 13),
(88, 4),
(88, 5),
(88, 6),
(88, 13),
(89, 4),
(89, 5),
(89, 6),
(90, 4),
(90, 5),
(91, 4),
(91, 13),
(92, 4),
(92, 5),
(92, 6),
(92, 13),
(93, 4),
(93, 5),
(93, 6),
(93, 13),
(94, 4),
(94, 5),
(94, 6),
(95, 1),
(95, 4),
(96, 4),
(96, 5),
(96, 6),
(96, 7),
(96, 8),
(97, 4),
(97, 5),
(97, 6),
(97, 7),
(97, 9),
(98, 4),
(98, 5),
(98, 6),
(98, 7),
(98, 10),
(99, 4),
(99, 5),
(99, 6),
(99, 7),
(100, 4),
(100, 5),
(100, 6),
(100, 7),
(100, 11),
(101, 2),
(102, 2),
(103, 2),
(104, 3),
(105, 3),
(106, 3),
(107, 3),
(108, 4),
(108, 5),
(108, 6),
(109, 4),
(109, 5),
(109, 6),
(110, 4),
(110, 5),
(110, 6),
(111, 4),
(111, 5),
(111, 6),
(112, 4),
(112, 5),
(112, 6),
(113, 4),
(113, 5),
(113, 6),
(114, 4),
(114, 5),
(114, 6),
(115, 4),
(115, 5),
(115, 6),
(116, 4),
(116, 6),
(116, 13),
(117, 4),
(117, 6),
(117, 13),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 4),
(122, 5),
(122, 13),
(123, 4),
(123, 5),
(123, 13),
(124, 4),
(124, 5),
(124, 13),
(125, 4),
(125, 5),
(126, 4),
(126, 5),
(126, 13),
(127, 2),
(127, 4),
(127, 5),
(128, 4),
(128, 5),
(128, 13),
(129, 4),
(129, 5),
(130, 2),
(131, 4),
(131, 5),
(131, 13),
(132, 4),
(132, 5),
(132, 13),
(133, 4),
(133, 5),
(133, 13),
(134, 4),
(134, 5),
(135, 4),
(135, 5),
(135, 12),
(136, 4),
(136, 5),
(136, 12),
(136, 13),
(137, 4),
(137, 5),
(137, 12),
(137, 13),
(138, 4),
(138, 5),
(139, 4),
(139, 5),
(140, 4),
(140, 5),
(141, 4),
(141, 5),
(141, 13),
(142, 4),
(142, 5),
(142, 13),
(143, 4),
(143, 5),
(144, 4),
(145, 4),
(146, 1),
(147, 4),
(148, 4),
(149, 4),
(150, 4),
(151, 4),
(152, 4),
(153, 4),
(154, 4),
(155, 4),
(156, 1),
(157, 1),
(158, 1),
(159, 1),
(160, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'company_logo', '2_logo.png', 2, NULL, NULL),
(2, 'company_small_logo', '2_small_logo.png', 2, NULL, NULL),
(3, 'stripe_currency_symbol', 'Rp', 1, '2021-02-17 23:54:41', '2021-02-17 23:54:41'),
(4, 'stripe_currency', 'IDR', 1, '2021-02-17 23:54:43', '2021-02-17 23:54:43'),
(5, 'site_currency', 'Rupiah', 2, '2021-02-25 03:58:19', '2021-02-25 03:58:19'),
(6, 'site_currency_symbol', 'Rp', 2, '2021-02-25 03:58:19', '2021-02-25 03:58:19'),
(7, 'site_currency_symbol_position', 'pre', 2, '2021-02-25 03:58:19', '2021-02-25 03:58:19'),
(8, 'site_date_format', 'M j, Y', 2, '2021-02-25 03:58:19', '2021-02-25 03:58:19'),
(9, 'site_time_format', 'g:i A', 2, '2021-02-25 03:58:20', '2021-02-25 03:58:20'),
(10, 'invoice_prefix', '#INVO', 2, '2021-02-25 03:58:20', '2021-02-25 03:58:20'),
(11, 'proposal_prefix', '#PROP', 2, '2021-02-25 03:58:20', '2021-02-25 03:58:20'),
(12, 'bill_prefix', '#BILL', 2, '2021-02-25 03:58:20', '2021-02-25 03:58:20'),
(13, 'customer_prefix', '#CUST', 2, '2021-02-25 03:58:20', '2021-02-25 03:58:20'),
(14, 'vender_prefix', '#VEND', 2, '2021-02-25 03:58:20', '2021-02-25 03:58:20'),
(15, 'invoice_color', 'FFFFFF', 2, '2021-02-25 03:58:20', '2021-02-25 03:58:20'),
(16, 'footer_title', '', 2, '2021-02-25 03:58:20', '2021-02-25 03:58:20'),
(17, 'footer_notes', '', 2, '2021-02-25 03:58:20', '2021-02-25 03:58:20'),
(18, 'site_currency', 'Rupiah', 10, '2021-03-10 03:17:26', '2021-03-10 03:17:26'),
(19, 'site_currency_symbol', 'Rp', 10, '2021-03-10 03:17:26', '2021-03-10 03:17:26'),
(20, 'site_currency_symbol_position', 'pre', 10, '2021-03-10 03:17:26', '2021-03-10 03:17:26'),
(21, 'site_date_format', 'd-m-Y', 10, '2021-03-10 03:17:26', '2021-03-10 03:17:26'),
(22, 'site_time_format', 'g:i A', 10, '2021-03-10 03:17:26', '2021-03-10 03:17:26'),
(23, 'invoice_prefix', '#INVO', 10, '2021-03-10 03:17:26', '2021-03-10 03:17:26'),
(24, 'proposal_prefix', '#PROP', 10, '2021-03-10 03:17:26', '2021-03-10 03:17:26'),
(25, 'bill_prefix', '#BILL', 10, '2021-03-10 03:17:26', '2021-03-10 03:17:26'),
(26, 'customer_prefix', '#CUST', 10, '2021-03-10 03:17:26', '2021-03-10 03:17:26'),
(27, 'vender_prefix', '#VEND', 10, '2021-03-10 03:17:26', '2021-03-10 03:17:26'),
(28, 'invoice_color', 'FFFFFF', 10, '2021-03-10 03:17:26', '2021-03-10 03:17:26'),
(29, 'footer_title', '', 10, '2021-03-10 03:17:26', '2021-03-10 03:17:26'),
(30, 'footer_notes', '', 10, '2021-03-10 03:17:26', '2021-03-10 03:17:26'),
(35, 'company_small_logo', '27_small_logo.jpeg?1659012281', 27, NULL, NULL),
(36, 'company_logo', '51_logo.png?1665464905', 51, NULL, NULL),
(39, 'company_name', 'Kejar Tayang', 51, NULL, NULL),
(40, 'company_address', 'Kutisari 8 No 22', 51, NULL, NULL),
(41, 'company_city', 'Surabaya', 51, NULL, NULL),
(42, 'company_state', 'Jawa Timur', 51, NULL, NULL),
(43, 'company_zipcode', '60118', 51, NULL, NULL),
(44, 'company_country', 'Indonesia', 51, NULL, NULL),
(45, 'company_telephone', '081233476611', 51, NULL, NULL),
(46, 'company_email', 'kejartayangapp@gmail.com', 51, NULL, NULL),
(47, 'company_email_from_name', 'Kejar Tayang', 51, NULL, NULL),
(48, 'registration_number', '000', 51, NULL, NULL),
(49, 'vat_number', '0000', 51, NULL, NULL),
(50, 'invoice_type', '0', 51, NULL, NULL),
(51, 'invoice_template', 'template7', 51, NULL, NULL),
(52, 'invoice_color', 'ffffff', 51, NULL, NULL),
(53, 'invoice_automail', '0', 51, NULL, NULL),
(62, 'title_text', 'Aneka Keripik Pedas', 60, NULL, NULL),
(68, 'invoice_type', '0', 72, NULL, NULL),
(69, 'invoice_automail', '1', 72, NULL, NULL),
(70, 'invoice_template', 'template2', 72, NULL, NULL),
(71, 'invoice_color', 'ffffff', 72, NULL, NULL),
(72, 'bill_template', 'template1', 72, NULL, NULL),
(73, 'bill_color', 'f2f6fa', 72, NULL, NULL),
(74, 'title_text', 'Kantor Notaris & PPAT AJENG TRI ANINDITA,S.H.,M.Kn', 72, NULL, NULL),
(81, 'company_name', 'KANTOR NOTARIS & PPAT', 72, NULL, NULL),
(82, 'company_address', 'AJENG TRI ANINDITA,S.H.,M.Kn', 72, NULL, NULL),
(83, 'company_city', 'Ruko Palm Square Jl. Raya Taman Asri TF-23 , Pondok Tjandra', 72, NULL, NULL),
(84, 'company_state', 'jawa timur', 72, NULL, NULL),
(85, 'company_zipcode', '61256', 72, NULL, NULL),
(86, 'company_country', 'indonesia', 72, NULL, NULL),
(87, 'company_telephone', '(031) 8670877', 72, NULL, NULL),
(88, 'company_email', 'Notarisajeng@gmail.com', 72, NULL, NULL),
(89, 'company_email_from_name', 'Notarisajeng@gmail.com', 72, NULL, NULL),
(90, 'registration_number', '311/KEP-400.20.3/XI/2017', 72, NULL, NULL),
(91, 'vat_number', '97.274.093.0-609.000', 72, NULL, NULL),
(120, 'company_logo', '27_logo.png?1658839642', 27, NULL, NULL),
(121, 'company_logo', '38_logo.jpeg?1663127472', 38, NULL, NULL),
(125, 'title_text', 'Kejar Tayang', 51, NULL, NULL),
(128, 'company_logo', '24_logo.png?1659008662', 24, NULL, NULL),
(129, 'company_small_logo', '24_small_logo.png?1659008815', 24, NULL, NULL),
(130, 'company_logo', '72_logo.png?1664075379', 72, NULL, NULL),
(168, 'invoice_type', '0', 77, NULL, NULL),
(169, 'invoice_automail', '1', 77, NULL, NULL),
(170, 'invoice_template', 'template1', 77, NULL, NULL),
(171, 'invoice_color', 'C1D82F', 77, NULL, NULL),
(172, 'company_logo', '77_logo.jpeg?1663768830', 77, NULL, NULL),
(173, 'bill_template', 'template1', 77, NULL, NULL),
(174, 'bill_color', 'ffffff', 77, NULL, NULL),
(175, 'site_currency', 'IDR', 77, '2022-09-21 14:01:47', '2022-09-21 14:01:47'),
(176, 'site_currency_symbol', 'Rp', 77, '2022-09-21 14:01:47', '2022-09-21 14:01:47'),
(177, 'site_currency_symbol_position', 'pre', 77, '2022-09-21 14:01:47', '2022-09-21 14:01:47'),
(178, 'site_date_format', 'short', 77, '2022-09-21 14:01:47', '2022-09-21 14:01:47'),
(179, 'site_time_format', 'short', 77, '2022-09-21 14:01:47', '2022-09-21 14:01:47'),
(180, 'invoice_prefix', '#INVO', 77, '2022-09-21 14:01:47', '2022-09-21 14:01:47'),
(181, 'proposal_prefix', '#PROP', 77, '2022-09-21 14:01:47', '2022-09-21 14:01:47'),
(182, 'bill_prefix', '#BILL', 77, '2022-09-21 14:01:47', '2022-09-21 14:01:47'),
(183, 'customer_prefix', '#CUST', 77, '2022-09-21 14:01:47', '2022-09-21 14:01:47'),
(184, 'vender_prefix', '#VEND', 77, '2022-09-21 14:01:47', '2022-09-21 14:01:47'),
(186, 'footer_title', '', 77, '2022-09-21 14:01:47', '2022-09-21 14:01:47'),
(187, 'footer_notes', '', 77, '2022-09-21 14:01:47', '2022-09-21 14:01:47'),
(202, 'site_currency', 'IDR', 72, '2022-09-25 03:53:41', '2022-09-25 03:53:41'),
(203, 'site_currency_symbol', 'Rp', 72, '2022-09-25 03:53:41', '2022-09-25 03:53:41'),
(204, 'site_currency_symbol_position', 'pre', 72, '2022-09-25 03:53:41', '2022-09-25 03:53:41'),
(205, 'site_date_format', 'short', 72, '2022-09-25 03:53:41', '2022-09-25 03:53:41'),
(206, 'site_time_format', 'short', 72, '2022-09-25 03:53:41', '2022-09-25 03:53:41'),
(207, 'invoice_prefix', '#INVO', 72, '2022-09-25 03:53:41', '2022-09-25 03:53:41'),
(208, 'proposal_prefix', '#PROP', 72, '2022-09-25 03:53:41', '2022-09-25 03:53:41'),
(209, 'bill_prefix', '#BILL', 72, '2022-09-25 03:53:41', '2022-09-25 03:53:41'),
(210, 'customer_prefix', '#CUST', 72, '2022-09-25 03:53:41', '2022-09-25 03:53:41'),
(211, 'vender_prefix', '#VEND', 72, '2022-09-25 03:53:41', '2022-09-25 03:53:41'),
(213, 'footer_title', '', 72, '2022-09-25 03:53:41', '2022-09-25 03:53:41'),
(214, 'footer_notes', 'Pembayaran dapat dilakukan melalui transfer', 72, '2022-09-25 03:53:41', '2022-09-25 03:53:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `rate` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `taxes`
--

INSERT INTO `taxes` (`id`, `name`, `rate`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'PPn', '10', 19, '2021-07-21 23:50:57', '2021-07-21 23:50:57'),
(2, 'PPn', '10', 20, '2021-07-24 08:37:29', '2021-07-24 08:37:29'),
(3, 'PPn', '10', 21, '2021-08-21 22:38:27', '2021-08-21 22:38:27'),
(4, 'PPn', '10', 22, '2021-08-29 10:53:25', '2021-08-29 10:53:25'),
(5, 'PPn', '10', 23, '2021-08-31 23:37:23', '2021-08-31 23:37:23'),
(6, 'PPn', '10', 24, '2021-10-21 06:25:36', '2021-10-21 06:25:36'),
(7, 'PPn', '10', 25, '2021-10-21 16:49:56', '2021-10-21 16:49:56'),
(8, 'PPn', '10', 26, '2021-11-07 21:40:13', '2021-11-07 21:40:13'),
(9, 'no ppn', '0', 20, '2021-11-10 07:07:09', '2021-11-10 07:07:09'),
(10, 'Bebas pajak', '0', 27, NULL, NULL),
(11, 'PPn', '10', 27, NULL, NULL),
(12, 'Bebas pajak', '0', 28, NULL, NULL),
(13, 'PPn', '10', 28, NULL, NULL),
(14, 'PPn', '10', 29, NULL, NULL),
(15, 'Bebas Pajak', '0', 29, NULL, NULL),
(16, 'Bebas Pajak', '0', 32, NULL, NULL),
(17, 'Bebas Pajak', '0', 33, NULL, NULL),
(18, 'pph', '5%', 33, NULL, NULL),
(19, 'Bebas Pajak', '0', 34, NULL, NULL),
(20, 'PPn', '10', 34, NULL, NULL),
(21, 'PPn', '10', 35, NULL, NULL),
(22, 'Bebas Pajak', '0', 35, NULL, NULL),
(23, 'Bebas Pajak', '0', 36, NULL, NULL),
(24, 'Bebas Pajak', '0', 37, NULL, NULL),
(25, 'PPn', '10', 37, NULL, NULL),
(26, 'Bebas Pajak', '0', 24, NULL, NULL),
(27, 'Bebas Pajak', '0', 38, NULL, NULL),
(28, 'Bebas Pajak', '0', 39, NULL, NULL),
(29, 'Bebas Pajak', '0', 41, NULL, NULL),
(30, 'Bebas Pajak', '0', 43, NULL, NULL),
(31, 'PPN', '10', 38, '2022-03-16 06:12:57', '2022-03-16 06:12:57'),
(32, 'Bebas Pajak', '0', 44, NULL, NULL),
(33, 'Bebas Pajak', '0', 45, NULL, NULL),
(34, 'PPn', '10', 45, NULL, NULL),
(35, 'Bebas Pajak', '0', 46, NULL, NULL),
(36, 'PPn', '10', 46, NULL, NULL),
(37, 'Bebas Pajak', '0', 47, NULL, NULL),
(38, 'Bebas Pajak', '0', 50, NULL, NULL),
(39, 'Bebas Pajak', '0', 51, NULL, NULL),
(40, 'Bebas Pajak', '0', 54, NULL, NULL),
(41, 'PPn', '10', 54, NULL, NULL),
(42, 'Bebas Pajak', '0', 55, NULL, NULL),
(43, 'PPn', '10', 55, NULL, NULL),
(44, 'Bebas Pajak', '0', 32, NULL, NULL),
(45, 'PPn', '10', 32, NULL, NULL),
(46, 'Bebas Pajak', '0', 56, NULL, NULL),
(47, 'PPn', '10', 56, NULL, NULL),
(48, 'Bebas Pajak', '0', 58, NULL, NULL),
(49, 'Bebas Pajak', '0', 59, NULL, NULL),
(50, 'Bebas Pajak', '0', 60, NULL, NULL),
(51, 'Bebas Pajak', '0', 61, NULL, NULL),
(52, 'Bebas Pajak', '0', 62, NULL, NULL),
(53, 'PPn', '10', 62, NULL, NULL),
(54, 'Bebas Pajak', '0', 64, NULL, NULL),
(55, 'Bebas Pajak', '0', 65, NULL, NULL),
(56, 'PPn', '10', 64, '2022-05-23 00:59:50', '2022-05-23 00:59:50'),
(57, 'Bebas Pajak', '0', 67, NULL, NULL),
(58, 'PPn', '10', 68, NULL, NULL),
(59, 'Bebas Pajak', '0', 69, NULL, NULL),
(60, 'Bebas Pajak', '0', 71, NULL, NULL),
(61, 'PPn', '10', 71, NULL, NULL),
(62, 'Bebas Pajak', '0', 72, NULL, NULL),
(63, 'Bebas Pajak', '0', 77, NULL, NULL),
(64, 'Bebas Pajak', '0', 83, NULL, NULL),
(65, 'Bebas Pajak', '0', 84, NULL, NULL),
(66, 'Bebas Pajak', '0', 85, NULL, NULL),
(67, 'Bebas Pajak', '0', 86, NULL, NULL),
(68, 'PPn', '10', 86, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT 1,
  `user_type` varchar(191) NOT NULL,
  `account` int(11) NOT NULL,
  `type` varchar(191) NOT NULL,
  `amount` double(16,2) NOT NULL DEFAULT 0.00,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `payment_id` int(11) NOT NULL DEFAULT 0,
  `category` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `user_type`, `account`, `type`, `amount`, `description`, `date`, `created_by`, `payment_id`, `category`, `created_at`, `updated_at`) VALUES
(1, 0, 'Vender', 1, 'Payment', 4000000.00, 'Beli Persil', '2021-03-02', 19, 1, 'Pembelian', '2021-07-22 00:12:52', '2021-07-22 00:12:52'),
(2, 0, 'Vender', 1, 'Payment', 386000.00, 'Obat rumput dan buruh', '2021-04-01', 19, 2, 'Pemeliharaan', '2021-07-22 00:21:07', '2021-07-22 00:21:07'),
(3, 0, 'Vender', 1, 'Payment', 320000.00, 'pupuk dan buruh', '2021-04-12', 19, 3, 'Pemeliharaan', '2021-07-22 00:25:11', '2021-07-22 00:25:11'),
(4, 0, 'Vender', 1, 'Payment', 129000.00, 'Pajak Tanah', '2021-04-13', 19, 4, 'Pajak', '2021-07-22 00:25:59', '2021-07-22 00:25:59'),
(5, 0, 'Customer', 1, 'Payment', 810000.00, 'Panen Labu 300kg', '2021-05-20', 19, 1, 'Panen Labu', '2021-07-22 00:33:38', '2021-07-22 00:33:38'),
(6, 0, 'Customer', 1, 'Payment', 100000.00, '1 tundun pisang', '2021-06-10', 19, 2, 'Panen Pisang', '2021-07-22 00:35:17', '2021-07-22 00:35:17'),
(7, 0, 'Vender', 1, 'Payment', 995000.00, 'Tanam jagung', '2021-06-26', 19, 5, 'Perawatan Jagung', '2021-07-22 00:45:40', '2021-07-22 00:45:40'),
(8, 0, 'Vender', 1, 'Payment', 320000.00, 'pupuk dan buruh', '2021-06-29', 19, 6, 'Perawatan Jagung', '2021-07-22 00:47:59', '2021-07-22 00:47:59'),
(9, 0, 'Vender', 1, 'Payment', 320000.00, 'pupuk dan buruh', '2021-07-01', 19, 7, 'Perawatan Jagung', '2021-07-22 00:50:42', '2021-07-22 00:50:42'),
(10, 0, 'Customer', 1, 'Payment', 127000.00, 'pisang 2 tundun', '2021-07-08', 19, 3, 'Panen Pisang', '2021-07-22 00:54:25', '2021-07-22 00:54:25'),
(11, 0, 'Customer', 1, 'Payment', 40000.00, 'Labu 3 buah', '2021-07-18', 19, 4, 'Panen Labu', '2021-07-22 00:55:00', '2021-07-22 00:55:00'),
(12, 0, 'Customer', 1, 'Payment', 20000.00, '2 labu', '2021-07-24', 19, 5, 'Panen Labu', '2021-07-24 04:04:10', '2021-07-24 04:04:10'),
(13, 0, 'Customer', 2, 'Payment', 40000.00, '4 cpns', '2021-04-02', 20, 6, 'Akun CPNS', '2021-07-24 08:44:14', '2021-07-24 08:44:14'),
(14, 0, 'Customer', 2, 'Payment', 30000.00, '3 cpns', '2021-04-03', 20, 7, 'Akun CPNS', '2021-07-24 08:45:13', '2021-07-24 08:45:13'),
(16, 0, 'Customer', 2, 'Payment', 30000.00, '', '2021-04-04', 20, 9, 'Akun CPNS', '2021-07-24 08:46:49', '2021-07-24 08:46:49'),
(17, 0, 'Customer', 2, 'Payment', 20000.00, '', '2021-04-05', 20, 10, 'Akun CPNS', '2021-07-24 08:47:14', '2021-07-24 08:47:14'),
(18, 0, 'Customer', 2, 'Payment', 10000.00, '', '2021-04-06', 20, 11, 'Akun CPNS', '2021-07-24 08:47:33', '2021-07-24 08:47:33'),
(19, 0, 'Customer', 2, 'Payment', 30000.00, '', '2021-04-08', 20, 12, 'Akun CPNS', '2021-07-24 08:47:58', '2021-07-24 08:47:58'),
(20, 0, 'Customer', 2, 'Payment', 40000.00, '', '2021-04-09', 20, 13, 'Akun CPNS', '2021-07-24 08:51:16', '2021-07-24 08:51:16'),
(21, 0, 'Customer', 2, 'Payment', 50000.00, '', '2021-04-10', 20, 14, 'Akun CPNS', '2021-07-24 08:51:39', '2021-07-24 08:51:39'),
(22, 0, 'Customer', 2, 'Payment', 70000.00, '', '2021-04-11', 20, 15, 'Akun CPNS', '2021-07-24 08:52:29', '2021-07-24 08:52:29'),
(23, 0, 'Customer', 2, 'Payment', 50000.00, '', '2021-04-12', 20, 16, 'Akun CPNS', '2021-07-24 08:53:19', '2021-07-24 08:53:19'),
(25, 0, 'Customer', 2, 'Payment', 300000.00, '', '2021-04-13', 20, 18, 'Akun CPNS', '2021-07-24 08:55:00', '2021-07-24 08:55:00'),
(26, 0, 'Customer', 2, 'Payment', 100000.00, '', '2021-04-14', 20, 19, 'Akun CPNS', '2021-07-24 08:55:32', '2021-07-24 08:55:32'),
(27, 0, 'Customer', 2, 'Payment', 90000.00, '', '2021-06-14', 20, 20, 'Akun P3K', '2021-07-24 08:59:22', '2021-07-24 08:59:22'),
(28, 0, 'Customer', 2, 'Payment', 140000.00, '', '2021-06-15', 20, 21, 'Akun P3K', '2021-07-24 08:59:59', '2021-07-24 08:59:59'),
(29, 0, 'Customer', 2, 'Payment', 90000.00, '', '2021-06-16', 20, 22, 'Akun P3K', '2021-07-24 09:00:35', '2021-07-24 09:00:35'),
(30, 0, 'Customer', 2, 'Payment', 110000.00, '', '2021-06-17', 20, 23, 'Akun P3K', '2021-07-24 09:01:05', '2021-07-24 09:01:05'),
(31, 0, 'Customer', 2, 'Payment', 170000.00, '', '2021-06-18', 20, 24, 'Akun P3K', '2021-07-24 09:01:35', '2021-07-24 09:01:35'),
(32, 0, 'Customer', 2, 'Payment', 130000.00, '', '2021-06-19', 20, 25, 'Akun P3K', '2021-07-24 09:02:03', '2021-07-24 09:02:03'),
(33, 0, 'Customer', 2, 'Payment', 240000.00, '', '2021-06-20', 20, 26, 'Akun P3K', '2021-07-24 09:02:28', '2021-07-24 09:02:28'),
(34, 0, 'Customer', 2, 'Payment', 130000.00, '', '2021-06-21', 20, 27, 'Akun P3K', '2021-07-24 09:03:07', '2021-07-24 09:03:07'),
(35, 0, 'Customer', 5, 'Payment', 5000.00, 'Beli minum', '2021-11-12', 20, 28, 'Pembelian', '2021-07-24 09:09:15', '2022-01-20 17:38:33'),
(36, 0, 'Customer', 2, 'Payment', 370000.00, '', '2021-06-23', 20, 29, 'Akun P3K', '2021-07-24 09:09:53', '2021-07-24 09:09:53'),
(37, 0, 'Customer', 2, 'Payment', 640000.00, '', '2021-06-24', 20, 30, 'Akun P3K', '2021-07-24 09:10:37', '2021-07-24 09:10:37'),
(38, 0, 'Customer', 2, 'Payment', 840000.00, '', '2021-06-25', 20, 31, 'Akun P3K', '2021-07-24 09:11:22', '2021-07-24 09:11:22'),
(39, 0, 'Customer', 10, 'Payment', 14500.00, 'Cetak stiker', '2022-03-09', 20, 32, 'Pembelian Stok Barang', '2021-07-24 09:12:03', '2022-03-13 18:18:39'),
(40, 0, 'Customer', 2, 'Payment', 400000.00, '', '2021-06-27', 20, 33, 'Akun P3K', '2021-07-24 09:13:00', '2021-07-24 09:13:00'),
(41, 0, 'Customer', 2, 'Payment', 520000.00, '', '2021-06-28', 20, 34, 'Akun P3K', '2021-07-24 09:13:33', '2021-07-24 09:13:33'),
(42, 0, 'Customer', 2, 'Payment', 490000.00, '', '2021-06-29', 20, 35, 'Akun P3K', '2021-07-24 09:14:02', '2021-07-24 09:14:02'),
(43, 0, 'Customer', 2, 'Payment', 1130000.00, '', '2021-06-30', 20, 36, 'Akun P3K', '2021-07-24 09:14:49', '2021-07-24 09:14:49'),
(44, 0, 'Customer', 2, 'Payment', 1500000.00, '', '2021-07-01', 20, 37, 'Akun P3K', '2021-07-24 09:15:31', '2021-07-24 09:15:31'),
(45, 0, 'Customer', 2, 'Payment', 1420000.00, '', '2021-07-02', 20, 38, 'Akun P3K', '2021-07-24 09:16:09', '2021-07-24 09:16:09'),
(46, 0, 'Customer', 2, 'Payment', 1460000.00, '', '2021-07-03', 20, 39, 'Akun P3K', '2021-07-24 09:16:52', '2021-07-24 09:16:52'),
(47, 0, 'Customer', 2, 'Payment', 1250000.00, '', '2021-07-04', 20, 40, 'Akun P3K', '2021-07-24 09:17:51', '2021-07-24 09:17:51'),
(48, 0, 'Customer', 2, 'Payment', 870000.00, '', '2021-07-05', 20, 41, 'Akun P3K', '2021-07-24 09:18:25', '2021-07-24 09:18:25'),
(49, 0, 'Customer', 2, 'Payment', 950000.00, '', '2021-07-06', 20, 42, 'Akun P3K', '2021-07-24 09:19:06', '2021-07-24 09:19:06'),
(50, 0, 'Customer', 2, 'Payment', 750000.00, '', '2021-07-07', 20, 43, 'Akun P3K', '2021-07-24 09:19:39', '2021-07-24 09:19:39'),
(51, 0, 'Customer', 2, 'Payment', 910000.00, '', '2021-07-08', 20, 44, 'Akun P3K', '2021-07-24 09:20:27', '2021-07-24 09:20:27'),
(52, 0, 'Customer', 2, 'Payment', 740000.00, '', '2021-07-09', 20, 45, 'Akun P3K', '2021-07-24 09:20:59', '2021-07-24 09:20:59'),
(53, 0, 'Customer', 2, 'Payment', 1190000.00, '', '2021-07-10', 20, 46, 'Akun P3K', '2021-07-24 09:21:47', '2021-07-24 09:21:47'),
(54, 0, 'Customer', 22, 'Payment', 50000.00, 'minum mobil', '2022-07-01', 20, 47, 'konsumsi', '2021-07-24 09:22:20', '2022-07-25 06:02:54'),
(55, 0, 'Customer', 2, 'Payment', 690000.00, '', '2021-07-12', 20, 48, 'Akun P3K', '2021-07-24 09:23:02', '2021-07-24 09:23:02'),
(56, 0, 'Customer', 2, 'Payment', 860000.00, '', '2021-07-13', 20, 49, 'Akun P3K', '2021-07-24 09:23:36', '2021-07-24 09:23:36'),
(57, 0, 'Customer', 2, 'Payment', 790000.00, '', '2021-07-14', 20, 50, 'Akun P3K', '2021-07-24 09:24:07', '2021-07-24 09:24:07'),
(58, 0, 'Customer', 2, 'Payment', 900000.00, '', '2021-07-15', 20, 51, 'Akun P3K', '2021-07-24 09:24:43', '2021-07-24 09:24:43'),
(59, 0, 'Customer', 2, 'Payment', 860000.00, '', '2021-07-16', 20, 52, 'Akun P3K', '2021-07-24 09:25:26', '2021-07-24 09:25:26'),
(60, 0, 'Customer', 22, 'Payment', 400000.00, 'Bayar Nadia', '2022-07-06', 20, 53, 'Biaya Entertain', '2021-07-24 09:26:02', '2022-07-25 06:32:39'),
(61, 0, 'Customer', 22, 'Payment', 50000.00, 'checking Izzudin', '2022-07-06', 20, 54, 'PNBP', '2021-07-24 09:26:33', '2022-07-25 06:51:19'),
(62, 0, 'Customer', 2, 'Payment', 530000.00, '', '2021-07-19', 20, 55, 'Akun P3K', '2021-07-24 09:27:12', '2021-07-24 09:27:12'),
(63, 0, 'Customer', 22, 'Payment', 50000.00, 'SPS checking Nur', '2022-07-07', 20, 56, 'PNBP', '2021-07-24 09:27:44', '2022-07-25 06:50:34'),
(64, 0, 'Customer', 22, 'Payment', 51000.00, 'SPS Checking Heny', '2022-07-07', 20, 57, 'PNBP', '2021-07-24 09:28:13', '2022-07-25 06:50:48'),
(65, 0, 'Customer', 2, 'Payment', 540000.00, '', '2021-07-22', 20, 58, 'Akun P3K', '2021-07-24 09:28:49', '2021-07-24 09:28:49'),
(66, 0, 'Customer', 2, 'Payment', 860000.00, '', '2021-07-23', 20, 59, 'Akun P3K', '2021-07-24 09:30:21', '2021-07-24 09:30:21'),
(67, 0, 'Vender', 2, 'Payment', 7500000.00, 'Gaji tim', '2021-07-06', 20, 8, 'Pembelian', '2021-07-24 09:34:36', '2021-07-24 09:34:36'),
(68, 0, 'Vender', 1, 'Payment', 816000.00, 'paralon sumur', '2021-07-25', 19, 9, 'Pembelian', '2021-07-27 21:55:12', '2021-07-27 21:55:12'),
(69, 0, 'Vender', 1, 'Payment', 340000.00, 'mengairi jagung', '2021-07-25', 19, 10, 'Perawatan Jagung', '2021-07-27 22:00:55', '2021-07-27 22:00:55'),
(70, 0, 'Customer', 22, 'Payment', 100000.00, 'Dana bpn', '2022-07-07', 19, 60, 'Biaya Entertain', '2021-07-27 22:01:40', '2022-07-25 06:38:10'),
(71, 0, 'Customer', 22, 'Payment', 600000.00, 'uang Checking Mas Rohman', '2022-07-07', 19, 61, 'PNBP', '2021-07-27 22:02:10', '2022-07-25 06:51:07'),
(72, 0, 'Vender', 1, 'Payment', 4500000.00, 'pembayaran sumur', '2021-07-26', 19, 11, 'Pembelian', '2021-07-27 22:02:54', '2021-07-27 22:02:54'),
(73, 0, 'Customer', 2, 'Payment', 410000.00, '', '2021-08-01', 20, 62, 'Akun P3K', '2021-08-23 21:25:43', '2021-08-23 21:25:43'),
(74, 0, 'Customer', 2, 'Payment', 380000.00, '', '2021-08-02', 20, 63, 'Akun P3K', '2021-08-23 21:26:22', '2021-08-23 21:26:22'),
(75, 0, 'Customer', 22, 'Payment', 51000.00, 'checking sps Samuel', '2022-07-11', 20, 64, 'PNBP', '2021-08-23 21:26:59', '2022-07-25 06:50:19'),
(76, 0, 'Customer', 2, 'Payment', 690000.00, '', '2021-08-04', 20, 65, 'Akun P3K', '2021-08-23 21:28:18', '2021-08-23 21:28:18'),
(77, 0, 'Customer', 2, 'Payment', 480000.00, '', '2021-08-05', 20, 66, 'Akun P3K', '2021-08-23 21:28:54', '2021-08-23 21:28:54'),
(78, 0, 'Customer', 2, 'Payment', 560000.00, '', '2021-08-06', 20, 67, 'Akun P3K', '2021-08-23 21:30:03', '2021-08-23 21:30:03'),
(79, 0, 'Customer', 2, 'Payment', 530000.00, '', '2021-08-07', 20, 68, 'Akun P3K', '2021-08-23 21:30:35', '2021-08-23 21:30:35'),
(80, 0, 'Vender', 2, 'Payment', 7500000.00, '', '2021-08-01', 20, 12, 'Gaji', '2021-08-23 21:31:12', '2021-08-23 21:31:12'),
(81, 0, 'Vender', 2, 'Payment', 1000000.00, 'Transport', '2021-08-14', 20, 13, 'Camp Kejar Tayang', '2021-08-23 21:40:26', '2021-08-23 21:40:26'),
(82, 0, 'Vender', 2, 'Payment', 586000.00, 'Villa', '2021-08-14', 20, 14, 'Camp Kejar Tayang', '2021-08-23 21:52:07', '2021-08-23 21:52:07'),
(83, 0, 'Customer', 2, 'Payment', 440000.00, '', '2021-08-08', 20, 69, 'Akun P3K', '2021-08-23 21:56:44', '2021-08-23 21:56:44'),
(84, 0, 'Customer', 22, 'Payment', 24000.00, 'bensin Bpn', '2022-07-13', 20, 70, 'Transport', '2021-08-23 21:57:31', '2022-07-25 06:58:06'),
(85, 0, 'Customer', 2, 'Payment', 1820000.00, '', '2021-08-10', 20, 71, 'Akun P3K', '2021-08-23 21:58:11', '2021-08-23 21:58:11'),
(86, 0, 'Customer', 2, 'Payment', 4250000.00, '', '2021-08-11', 20, 72, 'Akun P3K', '2021-08-23 21:59:03', '2021-08-23 21:59:03'),
(87, 0, 'Customer', 2, 'Payment', 1590000.00, '', '2021-08-12', 20, 73, 'Akun P3K', '2021-08-23 21:59:43', '2021-08-23 21:59:43'),
(88, 0, 'Customer', 2, 'Payment', 1120000.00, '', '2021-08-13', 20, 74, 'Akun P3K', '2021-08-23 22:00:55', '2021-08-23 22:00:55'),
(89, 0, 'Customer', 2, 'Payment', 740000.00, '', '2021-08-14', 20, 75, 'Akun P3K', '2021-08-23 22:01:24', '2021-08-23 22:01:24'),
(90, 0, 'Customer', 2, 'Payment', 750000.00, '', '2021-08-15', 20, 76, 'Akun P3K', '2021-08-23 22:01:59', '2021-08-23 22:01:59'),
(91, 0, 'Customer', 2, 'Payment', 550000.00, '', '2021-08-16', 20, 77, 'Akun P3K', '2021-08-23 22:02:31', '2021-08-23 22:02:31'),
(92, 0, 'Customer', 2, 'Payment', 1480000.00, '', '2021-08-17', 20, 78, 'Akun P3K', '2021-08-23 22:03:10', '2021-08-23 22:03:10'),
(93, 0, 'Customer', 2, 'Payment', 830000.00, '', '2021-08-18', 20, 79, 'Akun P3K', '2021-08-23 22:08:49', '2021-08-23 22:08:49'),
(94, 0, 'Customer', 2, 'Payment', 610000.00, '', '2021-08-19', 20, 80, 'Akun P3K', '2021-08-23 22:10:29', '2021-08-23 22:10:29'),
(95, 0, 'Customer', 2, 'Payment', 930000.00, '', '2021-08-20', 20, 81, 'Akun P3K', '2021-08-23 22:11:01', '2021-08-23 22:11:01'),
(96, 0, 'Customer', 2, 'Payment', 900000.00, '', '2021-08-21', 20, 82, 'Akun P3K', '2021-08-23 22:11:31', '2021-08-23 22:11:31'),
(97, 0, 'Customer', 2, 'Payment', 470000.00, '', '2021-08-22', 20, 83, 'Akun P3K', '2021-08-23 22:12:06', '2021-08-23 22:12:06'),
(98, 0, 'Customer', 2, 'Payment', 440000.00, '', '2021-08-23', 20, 84, 'Akun P3K', '2021-08-23 22:12:57', '2021-08-23 22:12:57'),
(99, 0, 'Customer', 2, 'Payment', 60000.00, '', '2021-08-01', 20, 85, 'Akun CPNS', '2021-08-23 22:16:23', '2021-08-23 22:16:23'),
(100, 0, 'Customer', 2, 'Payment', 50000.00, '', '2021-08-02', 20, 86, 'Akun CPNS', '2021-08-23 22:16:45', '2021-08-23 22:16:45'),
(101, 0, 'Customer', 2, 'Payment', 510000.00, '', '2021-08-03', 20, 87, 'Akun CPNS', '2021-08-23 22:17:19', '2021-08-23 22:17:19'),
(103, 0, 'Customer', 2, 'Payment', 270000.00, '', '2021-08-04', 20, 89, 'Akun CPNS', '2021-08-23 22:19:33', '2021-08-23 22:19:33'),
(105, 0, 'Customer', 2, 'Payment', 230000.00, '', '2021-08-05', 20, 91, 'Akun CPNS', '2021-08-23 22:20:35', '2021-08-23 22:20:35'),
(106, 0, 'Customer', 2, 'Payment', 230000.00, '', '2021-08-06', 20, 92, 'Akun CPNS', '2021-08-23 22:22:03', '2021-08-23 22:22:03'),
(107, 0, 'Customer', 2, 'Payment', 120000.00, '', '2021-08-07', 20, 93, 'Akun CPNS', '2021-08-23 22:22:33', '2021-08-23 22:22:33'),
(108, 0, 'Customer', 2, 'Payment', 120000.00, '', '2021-08-08', 20, 94, 'Akun CPNS', '2021-08-23 22:23:00', '2021-08-23 22:23:00'),
(109, 0, 'Customer', 2, 'Payment', 90000.00, '', '2021-08-09', 20, 95, 'Akun CPNS', '2021-08-23 22:23:19', '2021-08-23 22:23:19'),
(110, 0, 'Customer', 2, 'Payment', 100000.00, '', '2021-08-10', 20, 96, 'Akun CPNS', '2021-08-23 22:23:42', '2021-08-23 22:23:42'),
(111, 0, 'Customer', 2, 'Payment', 340000.00, '', '2021-08-11', 20, 97, 'Akun CPNS', '2021-08-23 22:24:17', '2021-08-23 22:24:17'),
(112, 0, 'Customer', 2, 'Payment', 110000.00, '', '2021-08-12', 20, 98, 'Akun CPNS', '2021-08-23 22:27:32', '2021-08-23 22:27:32'),
(113, 0, 'Customer', 2, 'Payment', 120000.00, '', '2021-08-13', 20, 99, 'Akun CPNS', '2021-08-23 22:35:54', '2021-08-23 22:35:54'),
(114, 0, 'Customer', 2, 'Payment', 180000.00, '', '2021-08-14', 20, 100, 'Akun CPNS', '2021-08-23 22:36:18', '2021-08-23 22:36:18'),
(115, 0, 'Customer', 2, 'Payment', 40000.00, '', '2021-08-15', 20, 101, 'Akun CPNS', '2021-08-23 22:36:42', '2021-08-23 22:36:42'),
(116, 0, 'Customer', 2, 'Payment', 130000.00, '', '2021-08-16', 20, 102, 'Akun CPNS', '2021-08-23 22:37:06', '2021-08-23 22:37:06'),
(117, 0, 'Customer', 2, 'Payment', 250000.00, '', '2021-08-17', 20, 103, 'Akun CPNS', '2021-08-23 22:37:32', '2021-08-23 22:37:32'),
(118, 0, 'Customer', 2, 'Payment', 80000.00, '', '2021-08-18', 20, 104, 'Akun CPNS', '2021-08-23 22:38:01', '2021-08-23 22:38:01'),
(119, 0, 'Customer', 2, 'Payment', 160000.00, '', '2021-08-19', 20, 105, 'Akun CPNS', '2021-08-23 22:38:24', '2021-08-23 22:38:24'),
(120, 0, 'Customer', 2, 'Payment', 260000.00, '', '2021-08-20', 20, 106, 'Akun CPNS', '2021-08-23 22:38:47', '2021-08-23 22:38:47'),
(121, 0, 'Customer', 2, 'Payment', 110000.00, '', '2021-08-21', 20, 107, 'Akun CPNS', '2021-08-23 22:39:09', '2021-08-23 22:39:09'),
(122, 0, 'Customer', 2, 'Payment', 100000.00, '', '2021-08-22', 20, 108, 'Akun CPNS', '2021-08-23 22:39:31', '2021-08-23 22:39:31'),
(123, 0, 'Customer', 2, 'Payment', 130000.00, '', '2021-08-23', 20, 109, 'Akun CPNS', '2021-08-23 22:39:59', '2021-08-23 22:39:59'),
(125, 0, 'Vender', 2, 'Payment', 530000.00, 'Konsumsi', '2021-08-14', 20, 16, 'Camp Kejar Tayang', '2021-08-23 22:46:25', '2021-08-23 22:46:25'),
(126, 0, 'Vender', 3, 'Payment', 208000.00, '', '2021-08-22', 21, 17, 'Konsumsi', '2021-08-24 04:35:09', '2021-08-24 04:35:09'),
(127, 0, 'Vender', 3, 'Payment', 100000.00, '', '2021-08-22', 21, 18, 'Transport', '2021-08-24 04:35:37', '2021-08-24 04:35:37'),
(129, 0, 'Vender', 2, 'Payment', 8900000.00, '', '2021-10-02', 20, 19, 'Gaji', '2021-10-20 11:12:34', '2021-10-20 11:12:34'),
(130, 0, 'Vender', 2, 'Payment', 7150000.00, '', '2021-09-01', 20, 20, 'Gaji', '2021-10-20 11:16:26', '2021-10-20 11:16:26'),
(131, 0, 'Customer', 2, 'Payment', 580000.00, '', '2021-09-01', 20, 110, 'Akun P3K', '2021-10-20 11:23:31', '2021-10-20 11:23:31'),
(132, 0, 'Customer', 2, 'Payment', 700000.00, '', '2021-09-02', 20, 111, 'Akun P3K', '2021-10-20 11:24:18', '2021-10-20 11:24:18'),
(133, 0, 'Customer', 2, 'Payment', 840000.00, '', '2021-09-03', 20, 112, 'Akun P3K', '2021-10-20 11:25:07', '2021-10-20 11:25:07'),
(135, 0, 'Customer', 2, 'Payment', 1160000.00, '', '2021-09-04', 20, 114, 'Akun P3K', '2021-10-20 11:26:02', '2021-10-20 11:26:02'),
(136, 0, 'Customer', 2, 'Payment', 900000.00, '', '2021-09-05', 20, 115, 'Akun P3K', '2021-10-20 11:27:11', '2021-10-20 11:27:11'),
(137, 0, 'Customer', 22, 'Payment', 156500.00, 'Transfer ke Sella + Admin Bank', '2022-07-27', 20, 116, 'Biaya Entertain', '2021-10-20 11:29:33', '2022-07-29 08:10:32'),
(138, 0, 'Customer', 2, 'Payment', 310000.00, '', '2021-09-07', 20, 117, 'Akun P3K', '2021-10-20 11:30:55', '2021-10-20 11:30:55'),
(139, 0, 'Customer', 2, 'Payment', 290000.00, '', '2021-09-08', 20, 118, 'Akun P3K', '2021-10-20 11:31:45', '2021-10-20 11:31:45'),
(140, 0, 'Customer', 2, 'Payment', 1390000.00, '', '2021-09-09', 20, 119, 'Akun P3K', '2021-10-20 11:49:45', '2021-10-20 11:49:45'),
(141, 0, 'Customer', 2, 'Payment', 720000.00, '', '2021-09-10', 20, 120, 'Akun P3K', '2021-10-20 11:50:29', '2021-10-20 11:50:29'),
(142, 0, 'Customer', 2, 'Payment', 370000.00, '', '2021-09-11', 20, 121, 'Akun P3K', '2021-10-20 11:51:10', '2021-10-20 11:51:10'),
(143, 0, 'Customer', 2, 'Payment', 270000.00, '', '2021-09-12', 20, 122, 'Akun P3K', '2021-10-20 11:52:27', '2021-10-20 11:52:27'),
(144, 0, 'Customer', 2, 'Payment', 450000.00, '', '2021-09-13', 20, 123, 'Akun P3K', '2021-10-20 11:53:37', '2021-10-20 11:53:37'),
(145, 0, 'Customer', 2, 'Payment', 370000.00, '', '2021-09-14', 20, 124, 'Akun P3K', '2021-10-20 11:54:07', '2021-10-20 11:54:07'),
(146, 0, 'Customer', 21, 'Payment', 55000000.00, 'Seharusnya bayar 3 tahun langsung tapi tahun kedua dibayar 1 februari 2023 tahun ke tiga bayar 1 Agustus 2023', '2022-07-31', 20, 125, 'Sewa Ruko', '2021-10-20 11:54:59', '2022-08-02 14:32:34'),
(147, 1, 'Customer', 4, 'Payment', 38000.00, '', '2021-11-08', 26, 126, 'Penjualan', '2021-11-07 22:02:25', '2021-11-07 22:02:25'),
(148, 1, 'Vender', 4, 'Payment', 25000.00, '', '2021-11-08', 26, 21, 'Pembelian', '2021-11-07 22:09:31', '2021-11-07 22:09:31'),
(150, 0, 'Vender', 2, 'Payment', 1700000.00, '', '2021-11-05', 20, 23, 'Sewa Tempat', '2021-11-09 12:41:54', '2021-11-09 12:41:54'),
(151, 0, 'Customer', 2, 'Payment', 100000.00, '', '2021-08-24', 20, 127, 'Akun CPNS', '2021-11-09 12:45:31', '2021-11-09 12:45:31'),
(152, 0, 'Customer', 2, 'Payment', 130000.00, '', '2021-08-25', 20, 128, 'Akun CPNS', '2021-11-09 12:46:12', '2021-11-09 12:46:12'),
(153, 0, 'Customer', 2, 'Payment', 100000.00, '', '2021-08-26', 20, 129, 'Akun CPNS', '2021-11-09 12:46:43', '2021-11-09 12:46:43'),
(154, 0, 'Customer', 2, 'Payment', 50000.00, '', '2021-08-27', 20, 130, 'Akun CPNS', '2021-11-09 12:47:08', '2021-11-09 12:47:08'),
(155, 0, 'Customer', 2, 'Payment', 20000.00, '', '2021-08-28', 20, 131, 'Akun CPNS', '2021-11-09 12:48:17', '2021-11-09 12:48:17'),
(156, 0, 'Customer', 2, 'Payment', 120000.00, '', '2021-08-29', 20, 132, 'Akun CPNS', '2021-11-09 12:48:43', '2021-11-09 12:48:43'),
(157, 0, 'Customer', 2, 'Payment', 40000.00, '', '2021-08-30', 20, 133, 'Akun CPNS', '2021-11-09 12:49:16', '2021-11-09 12:49:16'),
(158, 0, 'Customer', 2, 'Payment', 50000.00, '', '2021-08-31', 20, 134, 'Akun CPNS', '2021-11-09 12:49:35', '2021-11-09 12:49:35'),
(159, 0, 'Customer', 2, 'Payment', 40000.00, '', '2021-09-01', 20, 135, 'Akun CPNS', '2021-11-09 12:49:56', '2021-11-09 12:49:56'),
(160, 0, 'Customer', 2, 'Payment', 40000.00, '', '2021-09-02', 20, 136, 'Akun CPNS', '2021-11-09 12:50:19', '2021-11-09 12:50:19'),
(161, 0, 'Customer', 2, 'Payment', 40000.00, '', '2021-09-03', 20, 137, 'Akun CPNS', '2021-11-09 12:50:56', '2021-11-09 12:50:56'),
(162, 0, 'Customer', 2, 'Payment', 120000.00, '', '2021-09-04', 20, 138, 'Akun CPNS', '2021-11-09 12:51:23', '2021-11-09 12:51:23'),
(163, 0, 'Customer', 2, 'Payment', 170000.00, '', '2021-09-05', 20, 139, 'Akun CPNS', '2021-11-09 12:52:05', '2021-11-09 12:52:05'),
(164, 0, 'Customer', 2, 'Payment', 80000.00, '', '2021-09-06', 20, 140, 'Akun CPNS', '2021-11-09 12:52:36', '2021-11-09 12:52:36'),
(165, 0, 'Customer', 2, 'Payment', 50000.00, '', '2021-09-07', 20, 141, 'Akun CPNS', '2021-11-09 12:52:58', '2021-11-09 12:52:58'),
(166, 0, 'Customer', 2, 'Payment', 60000.00, '', '2021-09-08', 20, 142, 'Akun CPNS', '2021-11-09 12:53:38', '2021-11-09 12:53:38'),
(167, 0, 'Customer', 2, 'Payment', 150000.00, '', '2021-09-09', 20, 143, 'Akun CPNS', '2021-11-09 12:54:10', '2021-11-09 12:54:10'),
(168, 0, 'Customer', 2, 'Payment', 60000.00, '', '2021-09-10', 20, 144, 'Akun CPNS', '2021-11-09 12:54:35', '2021-11-09 12:54:35'),
(169, 0, 'Customer', 2, 'Payment', 30000.00, '', '2021-09-11', 20, 145, 'Akun CPNS', '2021-11-09 12:55:01', '2021-11-09 12:55:01'),
(170, 0, 'Customer', 2, 'Payment', 30000.00, '', '2021-09-12', 20, 146, 'Akun CPNS', '2021-11-09 12:55:29', '2021-11-09 12:55:29'),
(171, 0, 'Customer', 2, 'Payment', 20000.00, '', '2021-09-13', 20, 147, 'Akun CPNS', '2021-11-09 12:55:50', '2021-11-09 12:55:50'),
(172, 0, 'Customer', 2, 'Payment', 40000.00, '', '2021-09-14', 20, 148, 'Akun CPNS', '2021-11-09 12:56:18', '2021-11-09 12:56:18'),
(173, 0, 'Customer', 2, 'Payment', 50000.00, '', '2021-09-16', 20, 149, 'Akun CPNS', '2021-11-09 12:56:45', '2021-11-09 12:56:45'),
(174, 0, 'Customer', 2, 'Payment', 40000.00, '', '2021-09-17', 20, 150, 'Akun CPNS', '2021-11-09 12:57:52', '2021-11-09 12:57:52'),
(175, 0, 'Customer', 2, 'Payment', 60000.00, '', '2021-09-18', 20, 151, 'Akun CPNS', '2021-11-09 13:09:01', '2021-11-09 13:09:01'),
(176, 0, 'Customer', 22, 'Payment', 50000.00, 'sps mettasari peningkatan', '2022-08-04', 20, 152, 'PNBP', '2021-11-09 13:09:29', '2022-09-20 08:17:31'),
(177, 0, 'Customer', 2, 'Payment', 40000.00, '', '2021-09-20', 20, 153, 'Akun CPNS', '2021-11-09 13:09:59', '2021-11-09 13:09:59'),
(178, 0, 'Customer', 2, 'Payment', 20000.00, '', '2021-09-21', 20, 154, 'Akun CPNS', '2021-11-09 13:10:19', '2021-11-09 13:10:19'),
(179, 0, 'Customer', 2, 'Payment', 30000.00, '', '2021-09-22', 20, 155, 'Akun CPNS', '2021-11-09 13:10:39', '2021-11-09 13:10:39'),
(180, 0, 'Customer', 2, 'Payment', 10000.00, '', '2021-09-23', 20, 156, 'Akun CPNS', '2021-11-09 13:11:01', '2021-11-09 13:11:01'),
(181, 0, 'Customer', 2, 'Payment', 10000.00, '', '2021-09-24', 20, 157, 'Akun CPNS', '2021-11-09 13:11:16', '2021-11-09 13:11:16'),
(182, 0, 'Customer', 2, 'Payment', 10000.00, '', '2021-09-25', 20, 158, 'Akun CPNS', '2021-11-09 13:11:29', '2021-11-09 13:11:29'),
(183, 0, 'Customer', 2, 'Payment', 30000.00, '', '2021-09-26', 20, 159, 'Akun CPNS', '2021-11-09 13:11:56', '2021-11-09 13:11:56'),
(184, 0, 'Customer', 2, 'Payment', 10000.00, '', '2021-09-28', 20, 160, 'Akun CPNS', '2021-11-09 13:12:16', '2021-11-09 13:12:16'),
(185, 0, 'Customer', 2, 'Payment', 20000.00, '', '2021-09-29', 20, 161, 'Akun CPNS', '2021-11-09 13:12:39', '2021-11-09 13:12:39'),
(186, 0, 'Customer', 2, 'Payment', 10000.00, '', '2021-09-30', 20, 162, 'Akun CPNS', '2021-11-09 13:12:58', '2021-11-09 13:12:58'),
(187, 0, 'Customer', 22, 'Payment', 308000.00, 'salam tempel ke polisi untuk pengurusan surat kehilangan skw edrus', '2022-08-08', 20, 163, 'Biaya Entertain', '2021-11-09 13:13:30', '2022-09-20 08:18:40'),
(188, 0, 'Customer', 2, 'Payment', 30000.00, '', '2021-10-03', 20, 164, 'Akun CPNS', '2021-11-09 13:13:54', '2021-11-09 13:13:54'),
(189, 0, 'Customer', 2, 'Payment', 20000.00, '', '2021-10-04', 20, 165, 'Akun CPNS', '2021-11-09 13:14:22', '2021-11-09 13:14:22'),
(190, 0, 'Customer', 2, 'Payment', 20000.00, '', '2021-10-05', 20, 166, 'Akun CPNS', '2021-11-09 13:14:46', '2021-11-09 13:14:46'),
(191, 0, 'Customer', 2, 'Payment', 20000.00, '', '2021-10-06', 20, 167, 'Akun CPNS', '2021-11-09 13:15:09', '2021-11-09 13:15:09'),
(192, 0, 'Customer', 2, 'Payment', 10000.00, '', '2021-10-07', 20, 168, 'Akun CPNS', '2021-11-09 13:15:24', '2021-11-09 13:15:24'),
(193, 0, 'Customer', 2, 'Payment', 10000.00, '', '2021-10-09', 20, 169, 'Akun CPNS', '2021-11-09 13:15:44', '2021-11-09 13:15:44'),
(194, 0, 'Customer', 2, 'Payment', 10000.00, '', '2021-10-10', 20, 170, 'Akun CPNS', '2021-11-09 13:15:59', '2021-11-09 13:15:59'),
(195, 0, 'Customer', 2, 'Payment', 10000.00, '', '2021-10-12', 20, 171, 'Akun CPNS', '2021-11-09 13:16:11', '2021-11-09 13:16:11'),
(196, 0, 'Customer', 2, 'Payment', 100000.00, '', '2021-11-01', 20, 172, 'Akun P3K', '2021-11-09 13:18:11', '2021-11-09 13:18:11'),
(197, 0, 'Customer', 2, 'Payment', 210000.00, '', '2021-11-02', 20, 173, 'Akun P3K', '2021-11-09 13:18:45', '2021-11-09 13:18:45'),
(199, 0, 'Customer', 2, 'Payment', 130000.00, '', '2021-11-03', 20, 175, 'Akun P3K', '2021-11-09 13:20:21', '2021-11-09 13:20:21'),
(200, 0, 'Customer', 2, 'Payment', 40000.00, '', '2021-11-04', 20, 176, 'Akun P3K', '2021-11-09 13:20:58', '2021-11-09 13:20:58'),
(202, 0, 'Customer', 2, 'Payment', 50000.00, '', '2021-11-06', 20, 178, 'Akun P3K', '2021-11-09 13:21:39', '2021-11-09 13:21:39'),
(203, 0, 'Customer', 2, 'Payment', 60000.00, '', '2021-11-05', 20, 179, 'Akun P3K', '2021-11-09 13:22:12', '2021-11-09 13:22:12'),
(204, 0, 'Customer', 2, 'Payment', 70000.00, '', '2021-11-07', 20, 180, 'Akun P3K', '2021-11-09 13:22:41', '2021-11-09 13:22:41'),
(205, 0, 'Customer', 2, 'Payment', 60000.00, '', '2021-11-08', 20, 181, 'Akun P3K', '2021-11-09 13:23:09', '2021-11-09 13:23:09'),
(206, 0, 'Vender', 2, 'Payment', 9000000.00, '', '2021-11-02', 20, 24, 'Gaji', '2021-11-09 13:25:46', '2021-11-09 13:25:46'),
(207, 0, 'Customer', 2, 'Payment', 410000.00, '', '2021-09-16', 20, 182, 'Akun P3K', '2021-11-09 13:32:31', '2021-11-09 13:32:31'),
(208, 0, 'Customer', 2, 'Payment', 570000.00, '', '2021-09-17', 20, 183, 'Akun P3K', '2021-11-09 13:33:01', '2021-11-09 13:33:01'),
(209, 0, 'Customer', 2, 'Payment', 250000.00, '', '2021-09-18', 20, 184, 'Akun P3K', '2021-11-09 13:34:04', '2021-11-09 13:34:04'),
(210, 0, 'Customer', 2, 'Payment', 250000.00, '', '2021-09-19', 20, 185, 'Akun P3K', '2021-11-09 13:34:31', '2021-11-09 13:34:31'),
(211, 0, 'Customer', 2, 'Payment', 180000.00, '', '2021-09-20', 20, 186, 'Akun P3K', '2021-11-09 13:35:01', '2021-11-09 13:35:01'),
(212, 0, 'Customer', 2, 'Payment', 200000.00, '', '2021-09-21', 20, 187, 'Akun P3K', '2021-11-09 13:35:30', '2021-11-09 13:35:30'),
(213, 0, 'Customer', 2, 'Payment', 210000.00, '', '2021-09-22', 20, 188, 'Akun P3K', '2021-11-09 13:35:56', '2021-11-09 13:35:56'),
(214, 0, 'Customer', 2, 'Payment', 200000.00, '', '2021-09-23', 20, 189, 'Akun P3K', '2021-11-09 13:36:27', '2021-11-09 13:36:27'),
(215, 0, 'Customer', 2, 'Payment', 130000.00, '', '2021-09-24', 20, 190, 'Akun P3K', '2021-11-09 13:36:51', '2021-11-09 13:36:51'),
(216, 0, 'Customer', 2, 'Payment', 70000.00, '', '2021-09-25', 20, 191, 'Akun P3K', '2021-11-09 13:37:15', '2021-11-09 13:37:15'),
(217, 0, 'Customer', 2, 'Payment', 40000.00, '', '2021-09-26', 20, 192, 'Akun P3K', '2021-11-09 13:37:41', '2021-11-09 13:37:41'),
(218, 0, 'Customer', 2, 'Payment', 90000.00, '', '2021-09-27', 20, 193, 'Akun P3K', '2021-11-09 13:38:11', '2021-11-09 13:38:11'),
(219, 0, 'Customer', 2, 'Payment', 60000.00, '', '2021-09-28', 20, 194, 'Akun P3K', '2021-11-09 13:38:34', '2021-11-09 13:38:34'),
(220, 0, 'Customer', 2, 'Payment', 70000.00, '', '2021-09-29', 20, 195, 'Akun P3K', '2021-11-09 13:39:29', '2021-11-09 13:39:29'),
(221, 0, 'Customer', 22, 'Payment', 6500.00, 'fotocopy, parkir ruko, parkir bfi waru', '2022-08-16', 20, 196, 'Transport', '2021-11-09 13:39:57', '2022-09-20 08:22:38'),
(222, 0, 'Customer', 2, 'Payment', 40000.00, '', '2021-10-01', 20, 197, 'Akun P3K', '2021-11-09 13:40:29', '2021-11-09 13:40:29'),
(223, 0, 'Customer', 2, 'Payment', 60000.00, '', '2021-10-02', 20, 198, 'Akun P3K', '2021-11-09 13:41:01', '2021-11-09 13:41:01'),
(224, 0, 'Customer', 2, 'Payment', 50000.00, '', '2021-10-03', 20, 199, 'Akun P3K', '2021-11-09 13:41:26', '2021-11-09 13:41:26'),
(225, 0, 'Customer', 2, 'Payment', 160000.00, '', '2021-10-04', 20, 200, 'Akun P3K', '2021-11-09 13:41:53', '2021-11-09 13:41:53'),
(226, 0, 'Customer', 2, 'Payment', 160000.00, '', '2021-10-05', 20, 201, 'Akun P3K', '2021-11-09 13:42:22', '2021-11-09 13:42:22'),
(227, 0, 'Customer', 2, 'Payment', 200000.00, '', '2021-10-06', 20, 202, 'Akun P3K', '2021-11-09 13:42:47', '2021-11-09 13:42:47'),
(228, 0, 'Customer', 2, 'Payment', 120000.00, '', '2021-10-07', 20, 203, 'Akun P3K', '2021-11-09 13:43:23', '2021-11-09 13:43:23'),
(229, 0, 'Customer', 2, 'Payment', 780000.00, '', '2021-10-08', 20, 204, 'Akun P3K', '2021-11-09 13:43:52', '2021-11-09 13:43:52'),
(230, 0, 'Customer', 2, 'Payment', 1660000.00, '', '2021-10-09', 20, 205, 'Akun P3K', '2021-11-09 13:44:27', '2021-11-09 13:44:27'),
(231, 0, 'Customer', 2, 'Payment', 1660000.00, '', '2021-10-10', 20, 206, 'Akun P3K', '2021-11-09 13:45:14', '2021-11-09 13:45:14'),
(232, 0, 'Customer', 2, 'Payment', 2520000.00, '', '2021-10-11', 20, 207, 'Akun P3K', '2021-11-09 13:45:51', '2021-11-09 13:45:51'),
(233, 0, 'Customer', 2, 'Payment', 750000.00, '', '2021-10-12', 20, 208, 'Akun P3K', '2021-11-09 13:46:15', '2021-11-09 13:46:15'),
(234, 0, 'Customer', 2, 'Payment', 480000.00, '', '2021-10-13', 20, 209, 'Akun P3K', '2021-11-09 13:46:45', '2021-11-09 13:46:45'),
(235, 0, 'Customer', 2, 'Payment', 590000.00, '', '2021-10-14', 20, 210, 'Akun P3K', '2021-11-09 13:47:34', '2021-11-09 13:47:34'),
(236, 0, 'Customer', 2, 'Payment', 490000.00, '', '2021-10-15', 20, 211, 'Akun P3K', '2021-11-09 13:47:59', '2021-11-09 13:47:59'),
(237, 0, 'Customer', 2, 'Payment', 230000.00, '', '2021-10-16', 20, 212, 'Akun P3K', '2021-11-09 13:48:18', '2021-11-09 13:48:18'),
(238, 0, 'Customer', 2, 'Payment', 290000.00, '', '2021-10-17', 20, 213, 'Akun P3K', '2021-11-09 13:48:46', '2021-11-09 13:48:46'),
(239, 0, 'Customer', 2, 'Payment', 330000.00, '', '2021-10-18', 20, 214, 'Akun P3K', '2021-11-09 13:49:09', '2021-11-09 13:49:09'),
(240, 0, 'Customer', 2, 'Payment', 250000.00, '', '2021-10-19', 20, 215, 'Akun P3K', '2021-11-09 13:49:32', '2021-11-09 13:49:32'),
(241, 0, 'Customer', 2, 'Payment', 240000.00, '', '2021-10-20', 20, 216, 'Akun P3K', '2021-11-09 13:49:52', '2021-11-09 13:49:52'),
(242, 0, 'Customer', 2, 'Payment', 390000.00, '', '2021-10-21', 20, 217, 'Akun P3K', '2021-11-09 13:50:28', '2021-11-09 13:50:28'),
(243, 0, 'Customer', 22, 'Payment', 22000.00, 'bensin tbmo + parkir', '2022-08-26', 20, 218, 'Transport', '2021-11-09 13:50:55', '2022-09-21 08:07:12'),
(244, 0, 'Customer', 2, 'Payment', 360000.00, '', '2021-10-23', 20, 219, 'Akun P3K', '2021-11-09 13:51:21', '2021-11-09 13:51:21'),
(245, 0, 'Customer', 2, 'Payment', 260000.00, '', '2021-10-24', 20, 220, 'Akun P3K', '2021-11-09 13:51:56', '2021-11-09 13:51:56'),
(246, 0, 'Customer', 2, 'Payment', 230000.00, '', '2021-10-25', 20, 221, 'Akun P3K', '2021-11-09 13:52:21', '2021-11-09 13:52:21'),
(247, 0, 'Customer', 2, 'Payment', 170000.00, '', '2021-10-26', 20, 222, 'Akun P3K', '2021-11-09 13:52:48', '2021-11-09 13:52:48'),
(248, 0, 'Customer', 2, 'Payment', 200000.00, '', '2021-10-27', 20, 223, 'Akun P3K', '2021-11-09 13:53:22', '2021-11-09 13:53:22'),
(249, 0, 'Customer', 2, 'Payment', 280000.00, '', '2021-10-28', 20, 224, 'Akun P3K', '2021-11-09 13:53:45', '2021-11-09 13:53:45'),
(250, 0, 'Customer', 2, 'Payment', 210000.00, '', '2021-10-29', 20, 225, 'Akun P3K', '2021-11-09 13:54:06', '2021-11-09 13:54:06'),
(251, 0, 'Customer', 2, 'Payment', 300000.00, '', '2021-10-30', 20, 226, 'Akun P3K', '2021-11-09 13:54:30', '2021-11-09 13:54:30'),
(252, 0, 'Customer', 2, 'Payment', 100000.00, '', '2021-10-31', 20, 227, 'Akun P3K', '2021-11-09 13:55:06', '2021-11-09 13:55:06'),
(253, 0, 'Vender', 2, 'Payment', 295000.00, 'hotel dan snack', '2021-11-04', 20, 25, 'Camp Kejar Tayang', '2021-11-09 13:58:24', '2021-11-09 13:58:24'),
(254, 0, 'Vender', 2, 'Payment', 1000000.00, 'Transport', '2021-09-25', 20, 26, 'Camp Kejar Tayang', '2021-11-09 14:07:39', '2021-11-09 14:07:39'),
(255, 0, 'Customer', 2, 'Payment', 260000.00, '', '2021-04-15', 20, 228, 'Akun CPNS', '2021-11-09 14:16:18', '2021-11-09 14:16:18'),
(256, 0, 'Vender', 2, 'Payment', 232200.00, 'Course Udemy', '2021-08-25', 20, 27, 'RnD', '2021-11-09 14:19:25', '2021-11-09 14:19:25'),
(257, 0, 'Customer', 2, 'Payment', 70000.00, '', '2021-04-16', 20, 229, 'Akun CPNS', '2021-11-09 14:24:11', '2021-11-09 14:24:11'),
(258, 0, 'Customer', 2, 'Payment', 10000.00, '', '2021-04-17', 20, 230, 'Akun CPNS', '2021-11-09 14:24:40', '2021-11-09 14:24:40'),
(259, 0, 'Customer', 2, 'Payment', 10000.00, '', '2021-04-19', 20, 231, 'Akun CPNS', '2021-11-09 14:25:05', '2021-11-09 14:25:05'),
(260, 0, 'Customer', 2, 'Payment', 20000.00, '', '2021-04-20', 20, 232, 'Akun CPNS', '2021-11-09 14:26:14', '2021-11-09 14:26:14'),
(261, 0, 'Customer', 2, 'Payment', 10000.00, '', '2021-04-21', 20, 233, 'Akun CPNS', '2021-11-09 14:26:39', '2021-11-09 14:26:39'),
(262, 0, 'Customer', 2, 'Payment', 10000.00, '', '2021-04-22', 20, 234, 'Akun CPNS', '2021-11-09 14:26:55', '2021-11-09 14:26:55'),
(263, 0, 'Customer', 2, 'Payment', 30000.00, '', '2021-04-23', 20, 235, 'Akun CPNS', '2021-11-09 14:27:21', '2021-11-09 14:27:21'),
(264, 0, 'Customer', 2, 'Payment', 10000.00, '', '2021-04-24', 20, 236, 'Akun CPNS', '2021-11-09 14:27:52', '2021-11-09 14:27:52'),
(265, 0, 'Customer', 2, 'Payment', 10000.00, '', '2021-04-25', 20, 237, 'Akun CPNS', '2021-11-09 14:28:09', '2021-11-09 14:28:09'),
(266, 0, 'Customer', 2, 'Payment', 10000.00, '', '2021-04-26', 20, 238, 'Akun CPNS', '2021-11-09 14:28:29', '2021-11-09 14:28:29'),
(267, 0, 'Customer', 2, 'Payment', 10000.00, '', '2021-04-27', 20, 239, 'Akun CPNS', '2021-11-09 14:28:50', '2021-11-09 14:28:50'),
(268, 0, 'Customer', 2, 'Payment', 20000.00, '', '2021-04-28', 20, 240, 'Akun CPNS', '2021-11-09 14:29:38', '2021-11-09 14:29:38'),
(269, 0, 'Customer', 2, 'Payment', 30000.00, '', '2021-04-30', 20, 241, 'Akun CPNS', '2021-11-09 14:30:10', '2021-11-09 14:30:10'),
(270, 0, 'Customer', 2, 'Payment', 700000.00, 'akumulasi mei', '2021-05-31', 20, 242, 'Akun CPNS', '2021-11-09 14:33:25', '2021-11-09 14:33:25'),
(271, 0, 'Customer', 22, 'Payment', 40000.00, 'bensin andre', '2022-08-30', 20, 243, 'Transport', '2021-11-09 14:36:33', '2022-09-10 13:02:25'),
(272, 0, 'Customer', 2, 'Payment', 5230000.00, 'akumulasi akun cpns juli', '2021-07-31', 20, 244, 'Akun CPNS', '2021-11-09 14:39:17', '2021-11-09 14:39:17'),
(273, 0, 'Customer', 2, 'Payment', 8000000.00, 'akumulasi akun p3k', '2021-05-31', 20, 245, 'Akun P3K', '2021-11-09 14:56:06', '2021-11-09 14:56:06'),
(274, 5, 'Customer', 2, 'Partial', 10000.00, '', '2021-11-10', 20, 2, 'Invoice', '2021-11-10 07:12:52', '2021-11-10 07:12:52'),
(275, 5, 'Customer', 2, 'Partial', 11000.00, '', '2021-11-11', 20, 3, 'Invoice', '2021-11-10 07:14:39', '2021-11-10 07:14:39'),
(276, 5, 'Customer', 2, 'Partial', 10000.00, '', '2021-11-10', 20, 4, 'Invoice', '2021-11-10 07:34:39', '2021-11-10 07:34:39'),
(277, NULL, 'Customer', 5, 'Payment', 5000.00, 'Coba LLL', '2021-11-12', 27, 246, 'Penjualan', '2021-11-12 00:09:35', '2021-11-12 00:17:51'),
(278, NULL, 'Vender', 5, 'Payment', 5000.00, 'Coba', '2021-11-12', 27, 28, 'Pembelian', '2021-11-12 00:10:10', '2021-11-12 00:10:10'),
(282, 6, 'Customer', 5, 'Partial', 32000.00, '', '2022-01-21', 27, 10, 'Invoice', '2022-01-20 17:36:44', '2022-01-20 17:36:44'),
(283, 12, 'Customer', 5, 'Partial', 2000.00, '', '2022-01-21', 27, 11, 'Invoice', '2022-01-20 17:37:07', '2022-01-20 17:37:07'),
(288, 8, 'Customer', 7, 'Payment', 50000.00, 'Coba', '2021-08-11', 37, 251, 'Penjualan', '2022-02-09 15:07:18', '2022-02-09 15:07:18'),
(289, 6, 'Customer', 8, 'Payment', 5000.00, ' ', '2021-12-10', 27, 252, 'Penjualan', '2022-02-15 07:05:45', '2022-02-15 07:05:45'),
(290, 6, 'Customer', 8, 'Payment', 8000.00, ' ', '2021-12-10', 27, 253, 'Penjualan', '2022-02-15 07:05:45', '2022-02-15 07:05:45'),
(291, 12, 'Customer', 5, 'Payment', 50000.00, '', '2021-04-15', 27, 254, 'Penjualan', '2022-02-15 07:05:45', '2022-04-11 03:24:57'),
(294, 13, 'Customer', 11, 'Payment', 80000.00, 'asdasd', '2022-03-11', 41, 257, 'Penjualan', '2022-03-11 05:45:11', '2022-03-11 05:45:11'),
(295, 13, 'Customer', 11, 'Partial', 890000.00, 'asdasd', '2022-03-11', 41, 12, 'Invoice', '2022-03-11 05:48:53', '2022-03-11 05:48:53'),
(296, NULL, 'Customer', 10, 'Payment', 1130000.00, 'Kartu Golden Sun', '2022-02-22', 38, 258, 'Presentee', '2022-03-13 15:59:41', '2022-03-13 15:59:41'),
(297, NULL, 'Vender', 10, 'Payment', 208000.00, 'Beli 104 Kartu', '2022-02-22', 38, 31, 'Pembelian Stok Barang', '2022-03-13 16:04:34', '2022-03-13 16:04:34'),
(298, NULL, 'Vender', 10, 'Payment', 14500.00, '', '2022-03-09', 38, 32, 'Pembelian Stok Barang', '2022-03-13 18:11:39', '2022-03-13 18:11:39'),
(299, NULL, 'Vender', 10, 'Payment', 9500.00, 'Cetak stiker', '2022-02-22', 38, 33, 'Pembelian Stok Barang', '2022-03-13 18:15:23', '2022-03-13 18:15:23'),
(300, NULL, 'Vender', 10, 'Payment', 85500.00, 'Cetak stiker', '2022-02-22', 38, 34, 'Pembelian Stok Barang', '2022-03-13 18:16:45', '2022-03-13 18:16:45'),
(301, NULL, 'Vender', 10, 'Payment', 127416.00, 'Domain suksesptn.com', '2022-03-15', 38, 35, 'Utilitas', '2022-03-15 17:10:31', '2022-03-15 17:10:31'),
(302, NULL, 'Vender', 10, 'Payment', 369203.00, 'Akun Play Store', '2022-03-15', 38, 36, 'Utilitas', '2022-03-15 17:12:52', '2022-03-15 17:12:52'),
(303, NULL, 'Vender', 10, 'Payment', 62500.00, 'Beli Charger', '2022-03-29', 38, 37, 'Pembelian Stok Barang', '2022-04-09 15:40:17', '2022-04-09 15:40:17'),
(304, NULL, 'Customer', 10, 'Payment', 440000.00, 'Kartu Muhammadiyah 1', '2022-04-01', 38, 259, 'Presentee', '2022-04-09 15:44:05', '2022-04-09 15:44:05'),
(305, NULL, 'Customer', 12, 'Payment', 50000.00, '', '2022-03-22', 50, 260, 'Akun SiapASN', '2022-04-10 10:58:08', '2022-04-10 10:58:08'),
(306, NULL, 'Customer', 13, 'Payment', 50000.00, '', '2022-03-22', 51, 261, 'Akun SiapASN', '2022-04-10 11:20:36', '2022-04-10 11:20:36'),
(307, NULL, 'Customer', 13, 'Payment', 190000.00, '', '2022-03-23', 51, 262, 'Akun SiapASN', '2022-04-10 11:22:03', '2022-04-10 11:22:03'),
(308, 6, 'Customer', 5, 'Partial', 5500.00, '', '2022-04-14', 27, 18, 'Invoice', '2022-04-14 06:21:56', '2022-04-14 06:21:56'),
(309, 19, 'Customer', 13, 'Partial', 100000.00, ',saa', '2022-04-14', 51, 19, 'Invoice', '2022-04-14 07:24:46', '2022-04-14 07:24:46'),
(310, 20, 'Customer', 15, 'Payment', 65000.00, 'Tomat 10kg', '2022-01-03', 27, 263, 'Penjualan', '2022-04-15 07:01:50', '2022-04-15 07:01:50'),
(311, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-08', 27, 264, 'Penjualan', '2022-04-15 07:01:50', '2022-04-15 07:01:50'),
(312, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-12', 27, 265, 'Penjualan', '2022-04-15 07:01:50', '2022-04-15 07:01:50'),
(313, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-02', 27, 266, 'Penjualan', '2022-04-15 07:01:50', '2022-04-15 07:01:50'),
(314, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-01', 27, 267, 'Penjualan', '2022-04-15 07:01:50', '2022-04-15 07:01:50'),
(315, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-20', 27, 268, 'Penjualan', '2022-04-15 07:01:50', '2022-04-15 07:01:50'),
(316, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2022-01-03', 27, 269, 'Penjualan', '2022-04-15 07:07:27', '2022-04-15 07:07:27'),
(317, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-08', 27, 270, 'Penjualan', '2022-04-15 07:07:27', '2022-04-15 07:07:27'),
(318, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-12', 27, 271, 'Penjualan', '2022-04-15 07:07:27', '2022-04-15 07:07:27'),
(319, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-02', 27, 272, 'Penjualan', '2022-04-15 07:07:27', '2022-04-15 07:07:27'),
(320, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-01', 27, 273, 'Penjualan', '2022-04-15 07:07:27', '2022-04-15 07:07:27'),
(321, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-20', 27, 274, 'Penjualan', '2022-04-15 07:07:27', '2022-04-15 07:07:27'),
(322, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2022-01-03', 27, 275, 'Penjualan', '2022-04-15 07:07:48', '2022-04-15 07:07:48'),
(323, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-08', 27, 276, 'Penjualan', '2022-04-15 07:07:48', '2022-04-15 07:07:48'),
(324, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-12', 27, 277, 'Penjualan', '2022-04-15 07:07:48', '2022-04-15 07:07:48'),
(325, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-02', 27, 278, 'Penjualan', '2022-04-15 07:07:48', '2022-04-15 07:07:48'),
(326, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-01', 27, 279, 'Penjualan', '2022-04-15 07:07:48', '2022-04-15 07:07:48'),
(328, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2022-01-03', 27, 281, 'Penjualan', '2022-04-15 07:10:43', '2022-04-15 07:10:43'),
(329, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-08', 27, 282, 'Penjualan', '2022-04-15 07:10:43', '2022-04-15 07:10:43'),
(330, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-12', 27, 283, 'Penjualan', '2022-04-15 07:10:43', '2022-04-15 07:10:43'),
(331, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-02', 27, 284, 'Penjualan', '2022-04-15 07:10:43', '2022-04-15 07:10:43'),
(332, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-01', 27, 285, 'Penjualan', '2022-04-15 07:10:43', '2022-04-15 07:10:43'),
(333, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-20', 27, 286, 'Penjualan', '2022-04-15 07:10:43', '2022-04-15 07:10:43'),
(334, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2022-01-03', 27, 287, 'Penjualan', '2022-04-15 07:11:59', '2022-04-15 07:11:59'),
(335, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-08', 27, 288, 'Penjualan', '2022-04-15 07:11:59', '2022-04-15 07:11:59'),
(336, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-12', 27, 289, 'Penjualan', '2022-04-15 07:11:59', '2022-04-15 07:11:59'),
(337, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-02', 27, 290, 'Penjualan', '2022-04-15 07:11:59', '2022-04-15 07:11:59'),
(338, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-01', 27, 291, 'Penjualan', '2022-04-15 07:11:59', '2022-04-15 07:11:59'),
(339, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-20', 27, 292, 'Penjualan', '2022-04-15 07:11:59', '2022-04-15 07:11:59'),
(340, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2022-01-03', 27, 293, 'Penjualan', '2022-04-15 07:14:16', '2022-04-15 07:14:16'),
(341, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-08', 27, 294, 'Penjualan', '2022-04-15 07:14:16', '2022-04-15 07:14:16'),
(342, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-12', 27, 295, 'Penjualan', '2022-04-15 07:14:16', '2022-04-15 07:14:16'),
(343, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-02', 27, 296, 'Penjualan', '2022-04-15 07:14:16', '2022-04-15 07:14:16'),
(344, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-01', 27, 297, 'Penjualan', '2022-04-15 07:14:16', '2022-04-15 07:14:16'),
(345, 20, 'Customer', 5, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-20', 27, 298, 'Penjualan', '2022-04-15 07:14:16', '2022-04-15 07:14:16'),
(346, 20, 'Customer', 15, 'Payment', 65000.00, 'Tomat 10kg', '2022-01-03', 27, 299, 'Penjualan', '2022-04-15 07:18:42', '2022-04-15 07:18:42'),
(347, 20, 'Customer', 15, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-08', 27, 300, 'Penjualan', '2022-04-15 07:18:42', '2022-04-15 07:18:42'),
(348, 20, 'Customer', 15, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-12', 27, 301, 'Penjualan', '2022-04-15 07:18:42', '2022-04-15 07:18:42'),
(349, 20, 'Customer', 15, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-02', 27, 302, 'Penjualan', '2022-04-15 07:18:42', '2022-04-15 07:18:42'),
(350, 20, 'Customer', 15, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-01', 27, 303, 'Penjualan', '2022-04-15 07:18:42', '2022-04-15 07:18:42'),
(351, 20, 'Customer', 15, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-20', 27, 304, 'Penjualan', '2022-04-15 07:18:42', '2022-04-15 07:18:42'),
(352, 5, 'Vender', 15, 'Payment', 65000.00, 'Tomat 10kg', '2022-01-03', 27, 38, 'Penjualan', '2022-04-15 07:34:51', '2022-04-15 07:34:51'),
(353, 5, 'Vender', 15, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-08', 27, 39, 'Penjualan', '2022-04-15 07:34:51', '2022-04-15 07:34:51'),
(354, 5, 'Vender', 15, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-12', 27, 40, 'Penjualan', '2022-04-15 07:34:51', '2022-04-15 07:34:51'),
(355, 5, 'Vender', 15, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-02', 27, 41, 'Penjualan', '2022-04-15 07:34:51', '2022-04-15 07:34:51'),
(356, 5, 'Vender', 15, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-01', 27, 42, 'Penjualan', '2022-04-15 07:34:51', '2022-04-15 07:34:51'),
(357, 5, 'Vender', 15, 'Payment', 65000.00, 'Tomat 10kg', '2021-12-20', 27, 43, 'Penjualan', '2022-04-15 07:34:51', '2022-04-15 07:34:51'),
(358, NULL, 'Vender', 10, 'Payment', 244204.00, 'domain nahini', '2022-04-14', 38, 44, 'Utilitas', '2022-04-17 19:02:28', '2022-04-17 19:02:28'),
(359, NULL, 'Vender', 10, 'Payment', 116625.00, 'domain niatngaji', '2022-04-14', 38, 45, 'Utilitas', '2022-04-17 19:03:46', '2022-04-17 19:03:46'),
(360, NULL, 'Vender', 10, 'Payment', 227637.00, 'domain goquran', '2022-04-18', 38, 46, 'Utilitas', '2022-04-17 19:04:51', '2022-04-17 19:04:51'),
(361, 5, 'Customer', 2, 'Partial', 10000.00, '', '2022-04-22', 20, 20, 'Invoice', '2022-04-21 21:16:19', '2022-04-21 21:16:19'),
(363, NULL, 'Customer', 13, 'Payment', 100000.00, 'ini pembayaran yag belum tercatat', '2022-04-02', 51, 306, 'Akun SiapASN', '2022-04-26 09:43:58', '2022-04-26 09:43:58'),
(364, 23, 'Customer', 18, 'Payment', 200000.00, ' ', '2022-03-24', 51, 307, 'Sistem Try Out', '2022-05-11 22:07:56', '2022-05-11 22:07:56'),
(367, 23, 'Customer', 18, 'Payment', 120000.00, ' ', '2022-03-27', 51, 310, 'Sistem Try Out', '2022-05-11 22:07:56', '2022-05-11 22:07:56'),
(368, 23, 'Customer', 18, 'Payment', 110000.00, ' ', '2022-03-28', 51, 311, 'Sistem Try Out', '2022-05-11 22:07:56', '2022-05-11 22:07:56'),
(369, 23, 'Customer', 18, 'Payment', 60000.00, ' ', '2022-03-29', 51, 312, 'Sistem Try Out', '2022-05-11 22:07:56', '2022-05-11 22:07:56'),
(370, 23, 'Customer', 18, 'Payment', 40000.00, ' ', '2022-03-30', 51, 313, 'Sistem Try Out', '2022-05-11 22:07:56', '2022-05-11 22:07:56'),
(371, 23, 'Customer', 18, 'Payment', 120000.00, ' ', '2022-03-31', 51, 314, 'Sistem Try Out', '2022-05-11 22:07:56', '2022-05-11 22:07:56'),
(373, 23, 'Customer', 22, 'Payment', 50000.00, 'beli map blanko bpn', '2022-09-12', 51, 316, 'ATK', '2022-05-11 22:10:52', '2022-10-07 02:29:15'),
(374, 23, 'Customer', 18, 'Payment', 140000.00, ' ', '2022-03-26', 51, 317, 'Sistem Try Out', '2022-05-11 22:10:52', '2022-05-11 22:10:52'),
(380, 12, 'Customer', 5, 'Partial', 2000.00, '', '2022-05-12', 27, 24, 'Invoice', '2022-05-12 05:43:20', '2022-05-12 05:43:20'),
(381, 24, 'Customer', 5, 'Payment', 200000.00, ' ', '2022-03-24', 27, 323, 'Sistem Try Out', '2022-05-12 09:32:21', '2022-05-12 09:32:21'),
(382, 24, 'Customer', 5, 'Payment', 170000.00, ' ', '2022-03-25', 27, 324, 'Sistem Try Out', '2022-05-12 09:32:21', '2022-05-12 09:32:21'),
(383, 24, 'Customer', 5, 'Payment', 140000.00, ' ', '2022-03-26', 27, 325, 'Sistem Try Out', '2022-05-12 09:32:21', '2022-05-12 09:32:21'),
(384, 24, 'Customer', 5, 'Payment', 120000.00, ' ', '2022-03-27', 27, 326, 'Sistem Try Out', '2022-05-12 09:32:21', '2022-05-12 09:32:21'),
(385, 24, 'Customer', 5, 'Payment', 110000.00, ' ', '2022-03-28', 27, 327, 'Sistem Try Out', '2022-05-12 09:32:21', '2022-05-12 09:32:21'),
(386, 24, 'Customer', 5, 'Payment', 60000.00, ' ', '2022-03-29', 27, 328, 'Sistem Try Out', '2022-05-12 09:32:21', '2022-05-12 09:32:21'),
(387, 24, 'Customer', 5, 'Payment', 40000.00, ' ', '2022-03-30', 27, 329, 'Sistem Try Out', '2022-05-12 09:32:21', '2022-05-12 09:32:21'),
(388, 24, 'Customer', 5, 'Payment', 120000.00, ' ', '2022-03-31', 27, 330, 'Sistem Try Out', '2022-05-12 09:32:21', '2022-05-12 09:32:21'),
(389, NULL, 'Customer', 19, 'Payment', 25000.00, '', '2022-05-28', 60, 331, 'Penjualan', '2022-05-28 08:16:00', '2022-05-28 08:16:00'),
(390, 26, 'Customer', 19, 'Payment', 25000.00, '', '2022-05-28', 60, 332, 'Penjualan', '2022-05-28 08:20:38', '2022-05-28 08:20:38'),
(391, 23, 'Customer', 13, 'Partial', 1360000.00, '', '2022-05-16', 51, 27, 'Invoice', '2022-06-02 05:27:00', '2022-06-02 05:27:00'),
(393, NULL, 'Vender', 22, 'Payment', 50000.00, 'makan', '2022-07-25', 72, 47, 'konsumsi', '2022-07-25 06:02:25', '2022-07-25 06:02:25'),
(394, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin seminar', '2022-07-04', 72, 48, 'Transport', '2022-07-25 06:06:35', '2022-07-25 06:06:35'),
(395, NULL, 'Vender', 22, 'Payment', 6000.00, 'prkir', '2022-07-04', 72, 49, 'Transport', '2022-07-25 06:07:27', '2022-07-25 06:07:27'),
(396, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin bpn', '2022-07-05', 72, 50, 'Transport', '2022-07-25 06:08:23', '2022-07-25 06:08:23'),
(397, NULL, 'Vender', 22, 'Payment', 13000.00, 'Kantor Pos + Parkir', '2022-07-05', 72, 51, 'Transport', '2022-07-25 06:09:46', '2022-07-25 06:09:46'),
(398, NULL, 'Vender', 22, 'Payment', 3000.00, 'CD PT', '2022-07-05', 72, 52, 'ATK', '2022-07-25 06:10:38', '2022-07-25 06:10:38'),
(399, NULL, 'Vender', 22, 'Payment', 400000.00, 'Bayar Nadia', '2022-07-06', 72, 53, 'Biaya Entertain', '2022-07-25 06:15:34', '2022-07-25 06:15:34'),
(400, NULL, 'Vender', 22, 'Payment', 50000.00, 'checking Izzudin', '2022-07-06', 72, 54, 'Pajak', '2022-07-25 06:27:45', '2022-07-25 06:27:45');
INSERT INTO `transactions` (`id`, `user_id`, `user_type`, `account`, `type`, `amount`, `description`, `date`, `created_by`, `payment_id`, `category`, `created_at`, `updated_at`) VALUES
(401, NULL, 'Vender', 22, 'Payment', 200000.00, 'bayar Nadia', '2022-07-06', 72, 55, 'Biaya Entertain', '2022-07-25 06:29:06', '2022-07-25 06:29:06'),
(402, NULL, 'Vender', 22, 'Payment', 50000.00, 'SPS checking Nur', '2022-07-07', 72, 56, 'Pajak', '2022-07-25 06:32:14', '2022-07-25 06:32:14'),
(403, NULL, 'Vender', 22, 'Payment', 51000.00, 'SPS Checking Heny', '2022-07-07', 72, 57, 'Pajak', '2022-07-25 06:33:37', '2022-07-25 06:33:37'),
(404, NULL, 'Vender', 22, 'Payment', 20000.00, 'Bensin BPN', '2022-07-07', 72, 58, 'Transport', '2022-07-25 06:34:43', '2022-07-25 06:34:43'),
(405, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin bpn', '2022-07-07', 72, 59, 'Transport', '2022-07-25 06:36:33', '2022-07-25 06:36:33'),
(406, NULL, 'Vender', 22, 'Payment', 100000.00, 'Dana', '2022-07-07', 72, 60, 'Biaya Entertain', '2022-07-25 06:37:10', '2022-07-25 06:37:10'),
(407, NULL, 'Vender', 22, 'Payment', 600000.00, 'uang Checking Mas Rohman', '2022-07-07', 72, 61, 'Pajak', '2022-07-25 06:39:13', '2022-07-25 06:39:13'),
(408, NULL, 'Vender', 22, 'Payment', 36000.00, 'uang yakult', '2022-07-11', 72, 62, 'konsumsi', '2022-07-25 06:40:24', '2022-07-25 06:40:24'),
(409, NULL, 'Vender', 22, 'Payment', 200000.00, 'bpn Nadia', '2022-07-11', 72, 63, 'Biaya Entertain', '2022-07-25 06:41:17', '2022-07-25 06:41:17'),
(410, NULL, 'Vender', 22, 'Payment', 51000.00, 'checking sps Samuel', '2022-07-11', 72, 64, 'Pajak', '2022-07-25 06:42:10', '2022-07-25 06:42:10'),
(411, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin bpn', '2022-07-11', 72, 65, 'Transport', '2022-07-25 06:42:45', '2022-07-25 06:42:45'),
(412, NULL, 'Vender', 22, 'Payment', 30000.00, 'Blanko Bpn', '2022-07-11', 72, 66, 'BPN', '2022-07-25 06:47:29', '2022-07-25 06:47:29'),
(413, NULL, 'Vender', 22, 'Payment', 150000.00, 'voucher CV', '2022-07-11', 72, 67, 'PNBP', '2022-07-25 06:52:35', '2022-07-25 06:52:35'),
(414, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin Bpn', '2022-07-12', 72, 68, 'Transport', '2022-07-25 06:54:50', '2022-07-25 06:54:50'),
(415, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin Bfi', '2022-07-12', 72, 69, 'Transport', '2022-07-25 06:55:33', '2022-07-25 06:55:33'),
(416, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin Bpn', '2022-07-13', 72, 70, 'Transport', '2022-07-25 06:56:16', '2022-07-25 06:56:16'),
(417, NULL, 'Vender', 22, 'Payment', 30000.00, 'Blanko', '2022-07-13', 72, 71, 'BPN', '2022-07-25 06:59:13', '2022-07-25 06:59:13'),
(418, NULL, 'Vender', 22, 'Payment', 51000.00, 'sps skpt samuel', '2022-07-14', 72, 72, 'PNBP', '2022-07-25 07:00:24', '2022-07-25 07:00:24'),
(419, NULL, 'Vender', 22, 'Payment', 105000.00, 'isi tinta', '2022-07-14', 72, 73, 'ATK', '2022-07-25 07:01:25', '2022-07-25 07:01:25'),
(420, NULL, 'Vender', 22, 'Payment', 40000.00, 'kresek 2 buat sampah', '2022-07-15', 72, 74, 'ATK', '2022-07-25 07:09:26', '2022-07-25 07:09:26'),
(421, NULL, 'Vender', 22, 'Payment', 200000.00, 'uang bpn nadia', '2022-07-15', 72, 75, 'Biaya Entertain', '2022-07-25 07:10:08', '2022-07-25 07:10:08'),
(422, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps checking Eny', '2022-07-15', 72, 76, 'PNBP', '2022-07-25 07:10:48', '2022-07-25 07:10:48'),
(423, NULL, 'Vender', 22, 'Payment', 200000.00, 'sps HT Djuariyah', '2022-07-15', 72, 77, 'PNBP', '2022-07-25 07:17:16', '2022-07-25 07:17:16'),
(424, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps HT Bambang', '2022-07-15', 72, 78, 'PNBP', '2022-07-25 07:17:58', '2022-07-25 07:17:58'),
(425, NULL, 'Vender', 22, 'Payment', 200000.00, 'sps HT Yamin', '2022-07-15', 72, 79, 'PNBP', '2022-07-25 07:18:26', '2022-07-25 07:18:26'),
(426, NULL, 'Vender', 22, 'Payment', 250000.00, 'uang Kelurahan', '2022-07-15', 72, 80, 'Biaya Entertain', '2022-07-25 07:19:35', '2022-07-25 07:19:35'),
(427, NULL, 'Vender', 22, 'Payment', 42000.00, 'bensing surabaya sidorjo', '2022-07-15', 72, 81, 'Transport', '2022-07-25 07:20:11', '2022-07-25 07:20:11'),
(428, NULL, 'Vender', 22, 'Payment', 51000.00, 'sps checking titut', '2022-07-18', 72, 82, 'PNBP', '2022-07-25 07:21:02', '2022-07-25 07:21:02'),
(429, NULL, 'Vender', 22, 'Payment', 22000.00, 'bensin kelurahan dan parkir bensin', '2022-07-18', 72, 83, 'Transport', '2022-07-25 07:21:54', '2022-07-25 07:21:54'),
(430, NULL, 'Vender', 22, 'Payment', 62000.00, 'bufalo', '2022-07-18', 72, 84, 'ATK', '2022-07-25 07:22:47', '2022-07-25 07:22:47'),
(431, NULL, 'Vender', 22, 'Payment', 200000.00, 'sps edwin', '2022-07-18', 72, 85, 'PNBP', '2022-07-25 07:23:16', '2022-07-25 07:23:16'),
(432, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin salma', '2022-07-18', 72, 86, 'Transport', '2022-07-25 07:23:58', '2022-07-25 07:23:58'),
(433, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin Bpn', '2022-07-18', 72, 87, 'Transport', '2022-07-25 07:24:36', '2022-07-25 07:24:36'),
(434, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin Bfi', '2022-07-18', 72, 88, 'Transport', '2022-07-25 07:25:03', '2022-07-25 07:25:03'),
(435, NULL, 'Vender', 22, 'Payment', 50000.00, 'kembalian PBB', '2022-07-18', 72, 89, 'Pajak', '2022-07-25 07:25:57', '2022-07-25 07:25:57'),
(436, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps checking akman', '2022-07-19', 72, 90, 'PNBP', '2022-07-25 07:33:59', '2022-07-25 07:33:59'),
(437, NULL, 'Vender', 22, 'Payment', 200000.00, 'mbak nadia', '2022-07-19', 72, 91, 'Biaya Entertain', '2022-07-25 07:34:30', '2022-07-25 07:34:30'),
(438, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps checking titut', '2022-07-19', 72, 92, 'PNBP', '2022-07-25 07:35:19', '2022-07-25 07:35:19'),
(439, NULL, 'Vender', 22, 'Payment', 200000.00, 'mbak nadia', '2022-07-19', 72, 93, 'Biaya Entertain', '2022-07-25 07:36:11', '2022-07-25 07:36:11'),
(440, NULL, 'Vender', 22, 'Payment', 200000.00, 'bayar HT eny', '2022-07-20', 72, 94, 'PNBP', '2022-07-25 07:38:57', '2022-07-25 07:38:57'),
(441, NULL, 'Vender', 22, 'Payment', 22000.00, 'bensin BFI dan parkir', '2022-07-20', 72, 95, 'Transport', '2022-07-25 07:39:32', '2022-07-25 07:39:32'),
(442, NULL, 'Vender', 22, 'Payment', 100000.00, 'buat nambahin uang Wahjoe pph', '2022-07-20', 72, 96, 'Pajak', '2022-07-25 07:40:09', '2022-07-25 07:40:09'),
(443, NULL, 'Vender', 22, 'Payment', 250000.00, 'uang sanksi laporan', '2022-07-20', 72, 97, 'Biaya Entertain', '2022-07-25 07:41:46', '2022-07-25 07:41:46'),
(444, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps checking theresa', '2022-07-20', 72, 98, 'PNBP', '2022-07-25 07:43:04', '2022-07-25 07:43:04'),
(445, NULL, 'Vender', 22, 'Payment', 2500000.00, 'sps HT Titut', '2022-07-20', 72, 99, 'PNBP', '2022-07-25 07:45:07', '2022-07-25 07:45:07'),
(446, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps checking joice', '2022-07-20', 72, 100, 'PNBP', '2022-07-25 07:46:10', '2022-07-25 07:46:10'),
(447, NULL, 'Vender', 22, 'Payment', 400000.00, 'bayar nadia', '2022-07-20', 72, 101, 'Biaya Entertain', '2022-07-25 07:47:05', '2022-07-25 07:47:05'),
(448, NULL, 'Vender', 22, 'Payment', 50000.00, 'checking Rohmania', '2022-07-21', 72, 102, 'PNBP', '2022-07-25 07:47:58', '2022-07-25 07:47:58'),
(449, NULL, 'Vender', 22, 'Payment', 3000.00, 'parkir polsek', '2022-07-20', 72, 103, 'Transport', '2022-07-25 07:48:56', '2022-07-25 07:48:56'),
(450, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps Roya', '2022-07-21', 72, 104, 'PNBP', '2022-07-25 07:49:52', '2022-07-25 07:49:52'),
(451, NULL, 'Vender', 22, 'Payment', 50000.00, 'masukno roya', '2022-07-21', 72, 105, 'Biaya Entertain', '2022-07-25 07:50:27', '2022-07-25 07:50:27'),
(452, NULL, 'Vender', 22, 'Payment', 23000.00, 'bensin bpn dan parkir', '2022-07-21', 72, 106, 'Transport', '2022-07-25 07:51:01', '2022-07-25 07:51:01'),
(453, NULL, 'Vender', 22, 'Payment', 200000.00, 'sps HT Joice', '2022-07-21', 72, 107, 'PNBP', '2022-07-25 07:51:28', '2022-07-25 07:51:28'),
(454, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps ramelan lagi checking', '2022-07-25', 72, 108, 'PNBP', '2022-07-25 07:52:13', '2022-07-25 07:52:13'),
(455, NULL, 'Vender', 22, 'Payment', 105000.00, 'isi tinta canon', '2022-07-25', 72, 109, 'ATK', '2022-07-25 07:53:47', '2022-07-25 07:53:47'),
(458, 35, 'Customer', 21, 'Partial', 2500000.00, '', '2022-07-08', 72, 31, 'Invoice', '2022-07-25 08:59:25', '2022-07-25 08:59:25'),
(460, 32, 'Customer', 21, 'Partial', 6000000.00, '', '2022-07-08', 72, 33, 'Invoice', '2022-07-25 09:01:10', '2022-07-25 09:01:10'),
(461, 33, 'Customer', 21, 'Partial', 6000000.00, '', '2022-07-13', 72, 34, 'Invoice', '2022-07-25 09:01:45', '2022-07-25 09:01:45'),
(462, 30, 'Customer', 21, 'Partial', 4500000.00, '', '2022-07-29', 72, 35, 'Invoice', '2022-07-29 02:40:11', '2022-07-29 02:40:11'),
(463, 29, 'Customer', 21, 'Partial', 4500000.00, '', '2022-07-29', 72, 36, 'Invoice', '2022-07-29 02:40:32', '2022-07-29 02:40:32'),
(464, 31, 'Customer', 21, 'Partial', 5500000.00, '', '2022-07-29', 72, 37, 'Invoice', '2022-07-29 02:40:53', '2022-07-29 02:40:53'),
(465, 28, 'Customer', 21, 'Partial', 4500000.00, '', '2022-07-29', 72, 38, 'Invoice', '2022-07-29 02:41:06', '2022-07-29 02:41:06'),
(467, 38, 'Customer', 21, 'Partial', 6000000.00, '', '2022-07-27', 72, 40, 'Invoice', '2022-07-29 07:50:24', '2022-07-29 07:50:24'),
(468, 41, 'Customer', 21, 'Partial', 5750000.00, '', '2022-07-25', 72, 41, 'Invoice', '2022-07-29 07:51:15', '2022-07-29 07:51:15'),
(469, NULL, 'Vender', 22, 'Payment', 50000.00, 'Sps Cheking sby2', '2022-07-25', 72, 110, 'PNBP', '2022-07-29 07:56:19', '2022-07-29 07:56:19'),
(470, NULL, 'Vender', 22, 'Payment', 51000.00, 'cheking Supardi', '2022-07-26', 72, 111, 'PNBP', '2022-07-29 07:57:08', '2022-07-29 07:57:08'),
(471, NULL, 'Vender', 22, 'Payment', 150000.00, 'Transfer Sella', '2022-07-26', 72, 112, 'Biaya Entertain', '2022-07-29 07:58:35', '2022-07-29 07:58:35'),
(472, NULL, 'Vender', 22, 'Payment', 40000.00, 'Bensin Bpn + blanko Bpn', '2022-07-26', 72, 113, 'Transport', '2022-07-29 08:00:31', '2022-07-29 08:00:31'),
(473, NULL, 'Vender', 22, 'Payment', 41000.00, 'Uang Gojek Kirim berkas Kepak Ferry', '2022-07-27', 72, 114, 'Biaya Operasional', '2022-07-29 08:01:38', '2022-07-29 08:01:38'),
(474, NULL, 'Vender', 22, 'Payment', 51000.00, 'cheking Idjoh II', '2022-07-27', 72, 115, 'PNBP', '2022-07-29 08:02:22', '2022-07-29 08:02:22'),
(475, NULL, 'Vender', 22, 'Payment', 150000.00, 'Transfer ke Sella', '2022-07-27', 72, 116, 'Biaya Entertain', '2022-07-29 08:02:51', '2022-07-29 08:02:51'),
(476, NULL, 'Vender', 22, 'Payment', 2500000.00, 'sps HT THERESA', '2022-07-27', 72, 117, 'PNBP', '2022-07-29 08:06:46', '2022-07-29 08:06:46'),
(477, NULL, 'Vender', 22, 'Payment', 20000.00, 'Bensin BFi', '2022-07-27', 72, 118, 'Transport', '2022-07-29 08:07:21', '2022-07-29 08:07:21'),
(478, NULL, 'Vender', 22, 'Payment', 30000.00, 'Uang Kembalian Materai dari Bfi', '2022-07-28', 72, 119, 'Pengeluaran Lain-lain', '2022-07-29 08:11:49', '2022-07-29 08:11:49'),
(479, NULL, 'Vender', 22, 'Payment', 63000.00, 'Beli Yakult', '2022-07-28', 72, 120, 'konsumsi', '2022-07-29 08:12:41', '2022-07-29 08:12:41'),
(480, NULL, 'Vender', 22, 'Payment', 50000.00, 'Cheking Haris', '2022-07-28', 72, 121, 'PNBP', '2022-07-29 08:13:47', '2022-07-29 08:13:47'),
(481, NULL, 'Vender', 22, 'Payment', 20000.00, 'Bensin BFi', '2022-07-28', 72, 122, 'Transport', '2022-07-29 08:14:13', '2022-07-29 08:14:13'),
(483, 46, 'Customer', 21, 'Partial', 8300000.00, '', '2022-07-01', 72, 43, 'Invoice', '2022-08-01 02:14:33', '2022-08-01 02:14:33'),
(484, 44, 'Customer', 21, 'Partial', 14050000.00, '', '2022-07-12', 72, 44, 'Invoice', '2022-08-01 02:15:36', '2022-08-01 02:15:36'),
(485, 43, 'Customer', 21, 'Partial', 5050000.00, '', '2022-07-18', 72, 45, 'Invoice', '2022-08-01 02:15:59', '2022-08-01 02:15:59'),
(486, 42, 'Customer', 21, 'Partial', 3550000.00, '', '2022-07-25', 72, 46, 'Invoice', '2022-08-01 02:16:26', '2022-08-01 02:16:26'),
(487, 40, 'Customer', 21, 'Partial', 9500000.00, '', '2022-07-26', 72, 47, 'Invoice', '2022-08-01 02:16:50', '2022-08-01 02:16:50'),
(488, 39, 'Customer', 21, 'Partial', 4800000.00, '', '2022-07-28', 72, 48, 'Invoice', '2022-08-01 02:17:07', '2022-08-01 02:17:07'),
(489, 37, 'Customer', 21, 'Partial', 14500000.00, '', '2022-07-29', 72, 49, 'Invoice', '2022-08-01 02:17:28', '2022-08-01 02:17:28'),
(490, NULL, 'Vender', 21, 'Payment', 8680000.00, 'Gaji pegawai', '2022-07-29', 72, 123, 'Gaji', '2022-08-01 09:32:53', '2022-08-01 09:32:53'),
(494, 8, 'Vender', 21, 'Partial', 44963200.00, '', '2022-07-31', 72, 3, 'Bill', '2022-08-02 14:25:00', '2022-08-02 14:25:00'),
(495, 9, 'Vender', 21, 'Payment', 55000000.00, 'Seharusnya bayar 3 tahun langsung tapi tahun kedua dibayar 1 februari 2023 tahun ke tiga bayar 1 Agustus 2023', '2022-08-02', 72, 125, 'Sewa Ruko', '2022-08-02 14:31:44', '2022-08-02 14:31:44'),
(496, 7, 'Vender', 21, 'Partial', 5700000.00, '', '2022-07-31', 72, 4, 'Bill', '2022-08-02 14:38:36', '2022-08-02 14:38:36'),
(497, NULL, 'Vender', 21, 'Payment', 500000.00, '', '2022-07-31', 72, 126, 'Peralatan', '2022-08-02 14:39:24', '2022-08-02 14:39:24'),
(498, 34, 'Customer', 21, 'Partial', 6000000.00, '', '2022-07-31', 72, 50, 'Invoice', '2022-08-03 05:12:57', '2022-08-03 05:12:57'),
(500, 8, 'Vender', 21, 'Payment', 5500000.00, 'Design Kantor ruang design', '2022-07-31', 72, 127, 'Renovasi Ruko', '2022-08-03 06:20:24', '2022-08-03 06:20:24'),
(501, 8, 'Vender', 21, 'Payment', 450000.00, 'benerin bocor kamar madni ruko', '2022-07-31', 72, 128, 'Renovasi Ruko', '2022-08-03 06:21:05', '2022-08-03 06:21:05'),
(502, 8, 'Vender', 21, 'Payment', 5000000.00, 'biaya renovasi', '2022-07-11', 72, 129, 'Renovasi Ruko', '2022-08-03 06:23:05', '2022-08-03 06:23:05'),
(503, 8, 'Vender', 21, 'Payment', 750000.00, 'Renovasi Ruko', '2022-07-13', 72, 130, 'Renovasi Ruko', '2022-08-03 06:23:58', '2022-08-03 06:23:58'),
(505, 2, 'Vender', 5, 'Partial', 1500000.00, '', '2022-08-03', 27, 6, 'Bill', '2022-08-03 07:39:42', '2022-08-03 07:39:42'),
(506, 6, 'Customer', 5, 'Partial', 2500000.00, '', '2022-08-03', 27, 52, 'Invoice', '2022-08-03 07:54:03', '2022-08-03 07:54:03'),
(507, 10, 'Vender', 21, 'Partial', 2800000.00, '', '2022-08-03', 72, 7, 'Bill', '2022-08-04 04:46:51', '2022-08-04 04:46:51'),
(508, 45, 'Customer', 21, 'Partial', 8750000.00, '', '2022-08-04', 72, 53, 'Invoice', '2022-08-04 07:07:48', '2022-08-04 07:07:48'),
(509, 45, 'Customer', 21, 'Partial', 8750000.00, '', '2022-08-04', 72, 54, 'Invoice', '2022-08-04 07:07:48', '2022-08-04 07:07:48'),
(510, 47, 'Customer', 21, 'Partial', 15000000.00, '', '2022-08-04', 72, 55, 'Invoice', '2022-08-04 07:07:57', '2022-08-04 07:07:57'),
(511, 42, 'Customer', 21, 'Partial', 3500000.00, '', '2022-07-31', 72, 56, 'Invoice', '2022-08-04 07:10:36', '2022-08-04 07:10:36'),
(512, 42, 'Customer', 21, 'Partial', 3500000.00, '', '2022-07-31', 72, 57, 'Invoice', '2022-08-04 07:10:36', '2022-08-04 07:10:36'),
(514, NULL, 'Vender', 22, 'Payment', 1000000.00, 'beli materai', '2022-08-01', 72, 132, 'ATK', '2022-08-04 07:36:33', '2022-08-04 07:36:33'),
(515, NULL, 'Vender', 22, 'Payment', 26500.00, 'kirim pos malang, mojokerto, kpp', '2022-08-01', 72, 133, 'Transport', '2022-08-04 07:40:38', '2022-08-04 07:40:38'),
(516, NULL, 'Vender', 22, 'Payment', 51000.00, 'cheking wahjoe', '2022-08-01', 72, 134, 'PNBP', '2022-08-04 07:41:12', '2022-08-04 07:41:12'),
(517, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin bfi', '2022-08-01', 72, 135, 'Transport', '2022-08-04 07:41:46', '2022-08-04 07:41:46'),
(518, NULL, 'Vender', 22, 'Payment', 40000.00, 'bensin bfi dan polres', '2022-08-01', 72, 136, 'Transport', '2022-08-04 07:42:30', '2022-08-04 07:42:30'),
(519, NULL, 'Vender', 22, 'Payment', 5000.00, 'parkir pos dan bfi', '2022-08-01', 72, 137, 'Transport', '2022-08-04 07:43:02', '2022-08-04 07:43:02'),
(520, NULL, 'Vender', 22, 'Payment', 50000.00, 'ngasih kelurahan', '2022-08-01', 72, 138, 'Biaya Entertain', '2022-08-04 07:44:05', '2022-08-04 07:44:05'),
(521, NULL, 'Vender', 22, 'Payment', 3000.00, 'parkir polres', '2022-08-01', 72, 139, 'Transport', '2022-08-04 07:44:33', '2022-08-04 07:44:33'),
(522, NULL, 'Vender', 22, 'Payment', 150000.00, 'transfer ke mbak sella', '2022-08-01', 72, 140, 'Biaya Entertain', '2022-08-04 07:45:33', '2022-08-04 07:45:33'),
(523, NULL, 'Vender', 22, 'Payment', 52900.00, 'uang beli ATK', '2022-08-01', 72, 141, 'Peralatan', '2022-08-04 07:47:08', '2022-08-04 07:47:08'),
(524, NULL, 'Vender', 22, 'Payment', 50000.00, 'cheking aminah', '2022-08-01', 72, 142, 'PNBP', '2022-08-04 07:47:34', '2022-08-04 07:47:34'),
(525, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin bpn', '2022-08-01', 72, 143, 'Transport', '2022-08-04 07:48:05', '2022-08-04 07:48:05'),
(526, NULL, 'Vender', 22, 'Payment', 22000.00, 'parkir dan bensin beli ATK', '2022-08-01', 72, 144, 'Transport', '2022-08-04 07:48:45', '2022-08-04 07:48:45'),
(527, NULL, 'Vender', 22, 'Payment', 22000.00, 'bensin dan parkir bfi  waru', '2022-08-01', 72, 145, 'Transport', '2022-08-04 07:49:18', '2022-08-04 07:49:18'),
(528, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin salma bpn', '2022-08-04', 72, 146, 'Transport', '2022-08-04 07:51:18', '2022-08-04 07:51:18'),
(529, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin jimerto mengurus pbb haris', '2022-08-04', 72, 147, 'Transport', '2022-08-04 07:56:34', '2022-08-04 07:56:34'),
(530, NULL, 'Vender', 22, 'Payment', 50000.00, 'salam tempel peningkatan izzudin', '2022-08-04', 72, 148, 'Biaya Entertain', '2022-08-04 07:57:32', '2022-08-04 07:57:32'),
(532, NULL, 'Vender', 22, 'Payment', 200000.00, 'sps HT ramelan', '2022-08-04', 72, 150, 'PNBP', '2022-08-08 12:28:50', '2022-08-08 12:28:50'),
(533, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps peningkatan', '2022-08-04', 72, 151, 'PNBP', '2022-08-08 12:29:50', '2022-08-08 12:29:50'),
(534, NULL, 'Vender', 22, 'Payment', 40000.00, 'sps mettasari peningkatan', '2022-08-04', 72, 152, 'PNBP', '2022-08-08 12:30:29', '2022-08-08 12:30:29'),
(535, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin bfi sby1', '2022-08-04', 72, 153, 'Transport', '2022-08-08 12:50:34', '2022-08-08 12:50:34'),
(536, NULL, 'Vender', 22, 'Payment', 260000.00, 'beli tinta brother 2', '2022-08-05', 72, 154, 'ATK', '2022-08-08 12:52:02', '2022-08-08 12:52:02'),
(537, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps cheking ariyanti', '2022-08-05', 72, 155, 'PNBP', '2022-08-08 12:52:34', '2022-08-08 12:52:34'),
(538, NULL, 'Vender', 22, 'Payment', 64000.00, 'beli yakult', '2022-08-05', 72, 156, 'konsumsi', '2022-08-08 12:53:03', '2022-08-08 12:53:03'),
(539, NULL, 'Vender', 22, 'Payment', 150000.00, 'uang bayar setting komputer', '2022-08-05', 72, 157, 'Biaya Entertain', '2022-08-08 12:53:50', '2022-08-08 12:53:50'),
(541, NULL, 'Vender', 22, 'Payment', 50000.00, 'beli handsanitazer', '2022-08-08', 72, 159, 'ATK', '2022-08-08 12:55:02', '2022-08-08 12:55:02'),
(542, NULL, 'Vender', 22, 'Payment', 39000.00, 'go send notaris pak ferry kirim berkas', '2022-08-08', 72, 160, 'Biaya Operasional', '2022-08-08 12:55:40', '2022-08-08 12:55:40'),
(543, NULL, 'Vender', 22, 'Payment', 400000.00, 'transfer mbak nadia', '2022-08-08', 72, 161, 'Biaya Entertain', '2022-08-08 12:56:17', '2022-08-08 12:56:17'),
(544, NULL, 'Vender', 22, 'Payment', 105000.00, 'tagihan nomer kantor', '2022-08-08', 72, 162, 'Utilitas', '2022-08-19 08:04:56', '2022-08-19 08:04:56'),
(545, NULL, 'Vender', 22, 'Payment', 308000.00, 'salam tempel ke polisi untuk pengurusan surat kehilangan skw edrus', '2022-08-08', 72, 163, 'Biaya Entertain', '2022-08-19 08:06:49', '2022-08-19 08:06:49'),
(546, NULL, 'Vender', 22, 'Payment', 26000.00, 'bensin bpn + parkir sifin', '2022-08-08', 72, 164, 'Transport', '2022-08-19 08:07:26', '2022-08-19 08:07:26'),
(547, NULL, 'Vender', 22, 'Payment', 206500.00, 'sps ht heny yunaidah', '2022-08-08', 72, 165, 'PNBP', '2022-08-19 08:10:17', '2022-08-19 08:10:17'),
(548, NULL, 'Vender', 22, 'Payment', 200000.00, 'sps ht haris', '2022-08-08', 72, 166, 'PNBP', '2022-08-19 08:10:45', '2022-08-19 08:10:45'),
(549, NULL, 'Vender', 22, 'Payment', 200000.00, 'sps ht linda', '2022-08-08', 72, 167, 'PNBP', '2022-08-19 08:11:11', '2022-08-19 08:11:11'),
(550, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps cheking pak ferry', '2022-08-08', 72, 168, 'PNBP', '2022-08-19 08:11:39', '2022-08-19 08:11:39'),
(551, NULL, 'Vender', 22, 'Payment', 60000.00, 'tisu kantor', '2022-08-08', 72, 169, 'Biaya Operasional', '2022-08-19 08:12:04', '2022-08-19 08:12:04'),
(552, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin bpn sifin', '2022-08-08', 72, 170, 'Transport', '2022-08-19 08:12:35', '2022-08-19 08:12:35'),
(553, NULL, 'Vender', 22, 'Payment', 400000.00, 'uang tf ke mas rohman', '2022-08-10', 72, 171, 'Biaya Entertain', '2022-08-19 08:13:01', '2022-08-19 08:13:01'),
(554, NULL, 'Vender', 22, 'Payment', 200000.00, 'uang fee sifin untuk pengurusan  surat kehilangan shm edrus', '2022-08-10', 72, 172, 'Bonus', '2022-08-19 08:17:54', '2022-08-19 08:17:54'),
(555, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin salma bpn', '2022-08-10', 72, 173, 'Transport', '2022-08-19 08:19:02', '2022-08-19 08:19:02'),
(556, NULL, 'Vender', 22, 'Payment', 50000.00, 'uang salam tempel pengurusan peningkatan titut', '2022-08-10', 72, 174, 'Biaya Entertain', '2022-08-19 08:20:42', '2022-08-19 08:20:42'),
(557, NULL, 'Vender', 22, 'Payment', 50000.00, 'uang ploting', '2022-08-10', 72, 175, 'Biaya Entertain', '2022-08-19 08:21:04', '2022-08-19 08:21:04'),
(558, NULL, 'Vender', 22, 'Payment', 50000.00, 'cheking mettasari kedua', '2022-08-10', 72, 176, 'PNBP', '2022-08-19 08:25:29', '2022-08-19 08:25:29'),
(559, NULL, 'Vender', 22, 'Payment', 50000.00, 'peningkatan titut', '2022-08-12', 72, 177, 'PNBP', '2022-08-19 08:26:44', '2022-08-19 08:26:44'),
(560, NULL, 'Vender', 22, 'Payment', 50000.00, 'balik nama aphb wahjoe', '2022-08-12', 72, 178, 'PNBP', '2022-08-19 08:28:23', '2022-08-19 08:28:23'),
(561, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin bpn salma', '2022-08-12', 72, 179, 'Transport', '2022-08-19 08:28:47', '2022-08-19 08:28:47'),
(562, NULL, 'Vender', 22, 'Payment', 50000.00, 'uang ploting', '2022-08-12', 72, 180, 'Biaya Entertain', '2022-08-19 08:29:10', '2022-08-19 08:29:10'),
(563, NULL, 'Vender', 22, 'Payment', 16800.00, 'print berkas waktu dibpn', '2022-08-12', 72, 181, 'ATK', '2022-08-19 08:29:41', '2022-08-19 08:29:41'),
(564, NULL, 'Vender', 22, 'Payment', 22000.00, 'parkir dan bensin andre', '2022-08-12', 72, 182, 'Transport', '2022-08-19 08:30:18', '2022-08-19 08:30:18'),
(565, NULL, 'Vender', 22, 'Payment', 10000.00, 'kirim berkas ke pos dan parkir pos', '2022-08-12', 72, 183, 'Transport', '2022-08-19 08:30:46', '2022-08-19 08:30:46'),
(566, NULL, 'Vender', 22, 'Payment', 11000.00, 'print berkas untuk pengurusan telkom dan parkir', '2022-08-12', 72, 184, 'Biaya Operasional', '2022-08-19 08:31:26', '2022-08-19 08:31:26'),
(567, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin bpn andre', '2022-08-12', 72, 185, 'Transport', '2022-08-19 08:32:10', '2022-08-19 08:32:10'),
(568, NULL, 'Vender', 22, 'Payment', 200000.00, 'uang transfer ke mbak nadia', '2022-08-12', 72, 186, 'Biaya Entertain', '2022-08-19 08:33:34', '2022-08-19 08:33:34'),
(569, NULL, 'Vender', 22, 'Payment', 154600.00, 'sps edrus pengukuran', '2022-08-12', 72, 187, 'PNBP', '2022-08-19 08:34:00', '2022-08-19 08:34:00'),
(570, NULL, 'Vender', 22, 'Payment', 519150.00, 'uang pembayaran internet kantor', '2022-08-16', 72, 188, 'Utilitas', '2022-08-19 08:35:55', '2022-08-19 08:35:55'),
(571, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps ht mettasari', '2022-08-16', 72, 189, 'PNBP', '2022-08-19 08:36:18', '2022-08-19 08:36:18'),
(572, NULL, 'Vender', 22, 'Payment', 10000.00, 'krupuk', '2022-08-16', 72, 190, 'konsumsi', '2022-08-19 08:36:43', '2022-08-19 08:36:43'),
(573, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps peningkatan titut', '2022-08-16', 72, 191, 'PNBP', '2022-08-19 08:37:09', '2022-08-19 08:37:09'),
(574, NULL, 'Vender', 22, 'Payment', 179735.00, 'sps balik nama aphb', '2022-08-16', 72, 192, 'PNBP', '2022-08-19 08:39:03', '2022-08-19 08:39:03'),
(575, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin bpn andre', '2022-08-16', 72, 193, 'Transport', '2022-08-19 08:39:32', '2022-08-19 08:39:32'),
(576, NULL, 'Vender', 22, 'Payment', 10000.00, 'kirim pos dan parkir', '2022-08-16', 72, 194, 'Biaya Operasional', '2022-08-19 08:40:11', '2022-08-19 08:40:11'),
(577, NULL, 'Vender', 22, 'Payment', 40000.00, 'bensin petemon dan bpn', '2022-08-16', 72, 195, 'Transport', '2022-08-19 08:40:43', '2022-08-19 08:40:43'),
(578, NULL, 'Vender', 22, 'Payment', 7500.00, 'fotocopy, parkir ruko, parkir bfi waru', '2022-08-16', 72, 196, 'Transport', '2022-08-19 08:41:36', '2022-08-19 08:41:36'),
(579, NULL, 'Vender', 22, 'Payment', 51000.00, 'sps cheking eny wahyuningsih II', '2022-08-19', 72, 197, 'PNBP', '2022-08-19 08:42:48', '2022-08-19 08:42:48'),
(580, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps cheking fitri', '2022-08-19', 72, 198, 'PNBP', '2022-08-19 08:43:16', '2022-08-19 08:43:16'),
(581, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps cheking dyah ayu (BFI sby 2)', '2022-08-19', 72, 199, 'PNBP', '2022-08-19 08:43:47', '2022-08-19 08:43:47'),
(582, NULL, 'Vender', 22, 'Payment', 400000.00, 'transfer kembak nadia', '2022-08-19', 72, 200, 'Biaya Entertain', '2022-08-19 08:44:13', '2022-08-19 08:44:13'),
(583, NULL, 'Vender', 22, 'Payment', 17000.00, 'kirim pos pph + parkir', '2022-08-22', 72, 201, 'Transport', '2022-08-29 01:47:25', '2022-08-29 01:47:25'),
(585, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin bpn andre', '2022-08-22', 72, 203, 'Transport', '2022-08-29 01:51:07', '2022-08-29 01:51:07'),
(587, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps cheking daniel', '2022-08-22', 72, 205, 'PNBP', '2022-08-29 01:52:39', '2022-08-29 01:52:39'),
(588, NULL, 'Vender', 22, 'Payment', 51000.00, 'sps titut II', '2022-08-22', 72, 206, 'PNBP', '2022-08-29 01:54:26', '2022-08-29 01:54:26'),
(589, NULL, 'Vender', 22, 'Payment', 5000.00, 'admin bphtb', '2022-08-23', 72, 207, 'Biaya Operasional', '2022-08-29 01:55:01', '2022-08-29 01:55:01'),
(590, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps cheking mario', '2022-08-23', 72, 208, 'PNBP', '2022-08-29 01:55:33', '2022-08-29 01:55:33'),
(591, NULL, 'Vender', 22, 'Payment', 100000.00, 'salam tempel rt edrus', '2022-08-23', 72, 209, 'Biaya Entertain', '2022-08-29 01:56:25', '2022-08-29 01:56:25'),
(592, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin bpn sifin', '2022-08-23', 72, 210, 'Transport', '2022-08-29 01:57:01', '2022-08-29 01:57:01'),
(593, NULL, 'Vender', 22, 'Payment', 500000.00, 'beli materai', '2022-08-23', 72, 211, 'ATK', '2022-08-29 01:57:45', '2022-08-29 01:57:45'),
(595, NULL, 'Vender', 22, 'Payment', 305000.00, 'ATK untuk kantor baru', '2022-08-23', 72, 213, 'ATK', '2022-08-29 02:00:42', '2022-08-29 02:00:42'),
(596, NULL, 'Vender', 22, 'Payment', 400000.00, 'tf mbak nadia', '2022-08-23', 72, 214, 'Biaya Entertain', '2022-08-29 02:03:01', '2022-08-29 02:03:01'),
(597, NULL, 'Vender', 22, 'Payment', 200000.00, 'tf mbak nadia', '2022-08-24', 72, 215, 'Biaya Entertain', '2022-08-29 02:06:41', '2022-08-29 02:06:41'),
(598, NULL, 'Vender', 22, 'Payment', 200000.00, 'sps ht', '2022-08-24', 72, 216, 'PNBP', '2022-08-29 02:07:27', '2022-08-29 02:07:27'),
(599, NULL, 'Vender', 22, 'Payment', 40000.00, 'bensin sifin edrus sama lembur', '2022-08-24', 72, 217, 'Transport', '2022-08-29 02:08:50', '2022-08-29 02:08:50'),
(600, NULL, 'Vender', 22, 'Payment', 22000.00, 'bensin tbmo + lembur', '2022-08-26', 72, 218, 'Transport', '2022-08-29 02:09:16', '2022-08-29 02:09:16'),
(601, NULL, 'Vender', 22, 'Payment', 774000.00, 'atk kantor baru', '2022-08-26', 72, 219, 'ATK', '2022-08-29 02:09:49', '2022-08-29 02:09:49'),
(602, NULL, 'Vender', 22, 'Payment', 22000.00, 'bensin bfi waru + parkir andre', '2022-08-26', 72, 220, 'Transport', '2022-08-29 02:10:26', '2022-08-29 02:10:26'),
(603, NULL, 'Vender', 22, 'Payment', 10000.00, 'es teh orang cctv', '2022-08-26', 72, 221, 'konsumsi', '2022-08-29 02:11:12', '2022-08-29 02:11:12'),
(604, 50, 'Customer', 10, 'Partial', 50000.00, '', '2022-08-31', 38, 58, 'Invoice', '2022-08-31 06:44:37', '2022-08-31 06:44:37'),
(605, 50, 'Customer', 10, 'Partial', 30000.00, '', '2022-08-31', 38, 59, 'Invoice', '2022-08-31 06:45:15', '2022-08-31 06:45:15'),
(606, NULL, 'Vender', 22, 'Payment', 200000.00, 'benerin listrik', '2022-08-26', 72, 222, 'Biaya Operasional', '2022-09-05 01:48:25', '2022-09-05 01:48:25'),
(607, NULL, 'Vender', 22, 'Payment', 5000.00, 'beli baterai', '2022-08-26', 72, 223, 'ATK', '2022-09-05 01:49:54', '2022-09-05 01:49:54'),
(608, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps cheking', '2022-08-29', 72, 224, 'PNBP', '2022-09-05 01:55:18', '2022-09-05 01:55:18'),
(609, NULL, 'Vender', 22, 'Payment', 600000.00, 'transfer ke mbak nadia', '2022-08-29', 72, 225, 'Biaya Entertain', '2022-09-05 01:55:49', '2022-09-05 01:55:49'),
(610, NULL, 'Vender', 22, 'Payment', 102000.00, 'bayar sps cheking', '2022-08-30', 72, 226, 'PNBP', '2022-09-05 01:56:20', '2022-09-05 01:56:20'),
(611, NULL, 'Vender', 22, 'Payment', 600000.00, 'transfer ke mbak nadia', '2022-08-30', 72, 227, 'Biaya Entertain', '2022-09-05 01:57:55', '2022-09-05 01:57:55'),
(612, NULL, 'Vender', 22, 'Payment', 16000.00, 'kopi tukang', '2022-08-30', 72, 228, 'konsumsi', '2022-09-05 01:58:22', '2022-09-05 01:58:22'),
(613, NULL, 'Vender', 22, 'Payment', 100000.00, 'salam tempel kelurahan', '2022-08-30', 72, 229, 'Biaya Entertain', '2022-09-05 01:58:49', '2022-09-05 01:58:49'),
(614, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin sifin', '2022-08-30', 72, 230, 'Transport', '2022-09-05 01:59:20', '2022-09-05 01:59:20'),
(615, NULL, 'Vender', 22, 'Payment', 22000.00, 'bensin + parkir', '2022-08-30', 72, 231, 'Transport', '2022-09-05 02:14:32', '2022-09-05 02:14:32'),
(616, NULL, 'Vender', 22, 'Payment', 22000.00, 'bensuin jimerto sifin', '2022-08-30', 72, 232, 'Transport', '2022-09-10 11:48:37', '2022-09-10 11:48:37'),
(617, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin pengukuran samuel', '2022-08-30', 72, 233, 'Transport', '2022-09-10 11:51:27', '2022-09-10 11:51:27'),
(618, NULL, 'Vender', 22, 'Payment', 60000.00, 'tisu kantor', '2022-08-30', 72, 234, 'ATK', '2022-09-10 11:51:53', '2022-09-10 11:51:53'),
(619, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensuin bpn sifin', '2022-08-30', 72, 235, 'Transport', '2022-09-10 11:52:19', '2022-09-10 11:52:19'),
(620, NULL, 'Vender', 22, 'Payment', 7000.00, 'kirim pos guntur', '2022-08-30', 72, 236, 'Biaya Operasional', '2022-09-10 11:53:08', '2022-09-10 11:53:08'),
(621, NULL, 'Vender', 22, 'Payment', 7000.00, 'kirim pos marji', '2022-08-30', 72, 237, 'Biaya Operasional', '2022-09-10 11:53:31', '2022-09-10 11:53:31'),
(622, NULL, 'Vender', 22, 'Payment', 3000.00, 'parkir pos', '2022-08-30', 72, 238, 'Transport', '2022-09-10 11:54:29', '2022-09-10 11:54:29'),
(623, NULL, 'Vender', 22, 'Payment', 1000000.00, 'beli materai', '2022-08-30', 72, 239, 'ATK', '2022-09-10 11:57:07', '2022-09-10 11:57:07'),
(624, NULL, 'Vender', 22, 'Payment', 8000.00, 'parkir pos , parkir gramedia', '2022-08-30', 72, 240, 'Transport', '2022-09-10 11:59:46', '2022-09-10 11:59:46'),
(625, NULL, 'Vender', 22, 'Payment', 168000.00, 'pembuatan stempel notaris', '2022-08-30', 72, 241, 'ATK', '2022-09-10 12:00:46', '2022-09-10 12:00:46'),
(626, NULL, 'Vender', 22, 'Payment', 188000.00, 'pembuatan stempel legalisir', '2022-08-30', 72, 242, 'ATK', '2022-09-10 12:01:26', '2022-09-10 12:01:26'),
(627, NULL, 'Vender', 22, 'Payment', 40000.00, 'bensin andre', '2022-09-30', 72, 243, 'Transport', '2022-09-10 12:01:50', '2022-09-10 12:01:50'),
(628, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin bfi', '2022-08-30', 72, 244, 'Transport', '2022-09-10 12:02:20', '2022-09-10 12:02:20'),
(629, NULL, 'Vender', 22, 'Payment', 25000.00, 'bensin bfi+ parkir', '2022-09-01', 72, 245, 'Transport', '2022-09-10 12:04:21', '2022-09-10 12:04:21'),
(631, NULL, 'Vender', 22, 'Payment', 51000.00, 'cheking zamroni', '2022-09-01', 72, 247, 'PNBP', '2022-09-10 12:08:00', '2022-09-10 12:08:00'),
(632, NULL, 'Vender', 22, 'Payment', 20000.00, 'bensin andre kpp', '2022-09-02', 72, 248, 'Transport', '2022-09-10 12:08:58', '2022-09-10 12:08:58'),
(633, NULL, 'Vender', 22, 'Payment', 10000.00, 'uang pos +parkir', '2022-09-02', 72, 249, 'Transport', '2022-09-10 12:09:55', '2022-09-10 12:09:55'),
(634, NULL, 'Vender', 22, 'Payment', 63000.00, 'beli yakult buajeng', '2022-09-02', 72, 250, 'konsumsi', '2022-09-10 12:10:22', '2022-09-10 12:10:22'),
(635, NULL, 'Vender', 22, 'Payment', 10000.00, 'map blanko dari bpn', '2022-09-02', 72, 251, 'ATK', '2022-09-10 12:11:28', '2022-09-10 12:11:28'),
(636, NULL, 'Vender', 22, 'Payment', 6500.00, 'parkir dispenda + print sertipikat', '2022-09-02', 72, 252, 'ATK', '2022-09-10 12:12:39', '2022-09-10 12:12:39'),
(637, NULL, 'Vender', 22, 'Payment', 51000.00, 'sps ht indra', '2022-09-02', 72, 253, 'PNBP', '2022-09-10 12:13:03', '2022-09-10 12:13:03'),
(638, NULL, 'Vender', 22, 'Payment', 22500.00, 'konsumsi klien', '2022-09-02', 72, 254, 'konsumsi', '2022-09-10 12:13:24', '2022-09-10 12:13:24'),
(639, NULL, 'Vender', 22, 'Payment', 10000.00, 'kirim pos sokeh +parkir', '2022-09-03', 72, 255, 'Transport', '2022-09-10 12:14:10', '2022-09-10 12:14:10'),
(640, NULL, 'Vender', 22, 'Payment', 25000.00, 'perlengkapan kantor palu', '2022-09-03', 72, 256, 'Biaya Operasional', '2022-09-10 12:14:40', '2022-09-10 12:14:40'),
(641, NULL, 'Vender', 22, 'Payment', 65000.00, 'kabel saklar', '2022-09-03', 72, 257, 'Biaya Operasional', '2022-09-10 12:15:39', '2022-09-10 12:15:39'),
(642, NULL, 'Vender', 22, 'Payment', 20900.00, 'super pell kantor', '2022-09-03', 72, 258, 'Biaya Operasional', '2022-09-10 12:16:21', '2022-09-10 12:16:21'),
(643, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps cheking suhartiningsih', '2022-09-05', 72, 259, 'PNBP', '2022-09-10 12:16:53', '2022-09-10 12:16:53'),
(644, NULL, 'Vender', 22, 'Payment', 400000.00, 'transfer mbak nadia', '2022-09-05', 72, 260, 'Biaya Entertain', '2022-09-10 12:23:01', '2022-09-10 12:23:01'),
(645, NULL, 'Vender', 22, 'Payment', 25000.00, 'bensin bpn andre', '2022-09-05', 72, 261, 'Transport', '2022-09-10 12:23:26', '2022-09-10 12:23:26'),
(646, NULL, 'Vender', 22, 'Payment', 50000.00, 'salam tempel peningkatan', '2022-09-05', 72, 262, 'Biaya Entertain', '2022-09-10 12:23:48', '2022-09-10 12:23:48'),
(647, NULL, 'Vender', 22, 'Payment', 25000.00, 'bensin bpn andre', '2022-09-05', 72, 263, 'Transport', '2022-09-10 12:24:11', '2022-09-10 12:24:11'),
(648, NULL, 'Vender', 22, 'Payment', 19000.00, 'staples buat bu ajeng', '2022-09-05', 72, 264, 'ATK', '2022-09-10 12:24:49', '2022-09-10 12:24:49'),
(649, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps cheking i wayan', '2022-09-06', 72, 265, 'PNBP', '2022-09-10 12:25:16', '2022-09-10 12:25:16'),
(650, NULL, 'Vender', 22, 'Payment', 51000.00, 'sps winarno ht', '2022-09-06', 72, 266, 'PNBP', '2022-09-10 12:25:46', '2022-09-10 12:25:46'),
(651, NULL, 'Vender', 22, 'Payment', 11000.00, 'print di bpn', '2022-09-06', 72, 267, 'ATK', '2022-09-10 12:26:23', '2022-09-10 12:26:23'),
(652, NULL, 'Vender', 22, 'Payment', 25000.00, 'bensin kelurahan sifin', '2022-09-07', 72, 268, 'Transport', '2022-09-10 12:28:31', '2022-09-10 12:28:31'),
(653, NULL, 'Vender', 22, 'Payment', 400000.00, 'bayar mbak nadia', '2022-09-07', 72, 269, 'Biaya Entertain', '2022-09-10 12:29:20', '2022-09-10 12:29:20'),
(654, NULL, 'Vender', 22, 'Payment', 200000.00, 'sps HT SUPARTI', '2022-09-07', 72, 270, 'PNBP', '2022-09-10 12:29:47', '2022-09-10 12:29:47'),
(655, NULL, 'Vender', 22, 'Payment', 2500000.00, 'sps HT WITDADA', '2022-09-07', 72, 271, 'PNBP', '2022-09-10 12:32:25', '2022-09-10 12:32:25'),
(656, NULL, 'Vender', 22, 'Payment', 10000.00, 'bayar kelurahan', '2022-09-07', 72, 272, 'Biaya Entertain', '2022-09-10 12:32:59', '2022-09-10 12:32:59'),
(657, NULL, 'Vender', 22, 'Payment', 201000.00, 'sps ht nur hasan basri', '2022-09-08', 72, 273, 'PNBP', '2022-09-10 12:38:30', '2022-09-10 12:38:30'),
(658, NULL, 'Vender', 22, 'Payment', 25000.00, 'bensin bpn andre', '2022-09-08', 72, 274, 'Transport', '2022-09-10 12:43:26', '2022-09-10 12:43:26'),
(659, NULL, 'Vender', 22, 'Payment', 127000.00, 'sps balik nama samuji', '2022-09-08', 72, 275, 'PNBP', '2022-09-10 12:44:06', '2022-09-10 12:44:06'),
(660, NULL, 'Vender', 22, 'Payment', 51000.00, 'sps cheking marji', '2022-09-09', 72, 276, 'PNBP', '2022-09-10 12:46:50', '2022-09-10 12:46:50'),
(661, NULL, 'Vender', 22, 'Payment', 50000.00, 'cekplot', '2022-09-09', 72, 277, 'Biaya Entertain', '2022-09-10 12:47:24', '2022-09-10 12:47:24'),
(662, NULL, 'Vender', 22, 'Payment', 25000.00, 'bensin andre', '2022-09-09', 72, 278, 'Transport', '2022-09-10 12:47:48', '2022-09-10 12:47:48'),
(663, NULL, 'Vender', 22, 'Payment', 10000.00, 'kirim pos+parkir pos', '2022-09-09', 72, 279, 'Transport', '2022-09-10 12:48:33', '2022-09-10 12:48:33'),
(664, NULL, 'Vender', 22, 'Payment', 63000.00, 'yakult bu ajeng', '2022-09-09', 72, 280, 'konsumsi', '2022-09-10 12:49:25', '2022-09-10 12:49:25'),
(665, NULL, 'Vender', 22, 'Payment', 200000.00, 'transfer mbak nadia', '2022-09-09', 72, 281, 'Biaya Entertain', '2022-09-10 12:50:44', '2022-09-10 12:50:44'),
(666, NULL, 'Vender', 22, 'Payment', 51000.00, 'sps SKPT salim', '2022-09-09', 72, 282, 'PNBP', '2022-09-10 12:51:33', '2022-09-10 12:51:33'),
(667, NULL, 'Vender', 22, 'Payment', 51000.00, 'cheking daryono', '2022-09-09', 72, 283, 'PNBP', '2022-09-10 12:52:02', '2022-09-10 12:52:02'),
(668, NULL, 'Vender', 22, 'Payment', 50000.00, 'chekiing daryono II', '2022-09-09', 72, 284, 'PNBP', '2022-09-10 12:52:30', '2022-09-10 12:52:30'),
(669, NULL, 'Vender', 22, 'Payment', 200000.00, 'uang iuran ruko', '2022-09-09', 72, 285, 'Biaya Operasional', '2022-09-10 12:54:09', '2022-09-10 12:54:09'),
(670, NULL, 'Vender', 22, 'Payment', 27000.00, 'bensin bfi +parkir', '2022-09-10', 72, 286, 'Transport', '2022-09-10 13:00:10', '2022-09-10 13:00:10'),
(671, NULL, 'Vender', 22, 'Payment', 100000.00, 'salam tempel balik nama sodikin sama marji', '2022-09-10', 72, 287, 'Biaya Entertain', '2022-09-10 13:03:02', '2022-09-10 13:03:02'),
(672, NULL, 'Vender', 22, 'Payment', 200000.00, 'uang transfer ke mbak nadia', '2022-09-10', 72, 288, 'Biaya Entertain', '2022-09-10 13:03:22', '2022-09-10 13:03:22'),
(673, NULL, 'Vender', 23, 'Payment', 150000.00, 'uang iuran bulanan rw dan rt', '2022-09-10', 72, 289, 'Biaya Operasional', '2022-09-10 13:05:32', '2022-09-10 13:05:32'),
(674, NULL, 'Vender', 21, 'Payment', 519150.00, 'uang wifi kantor', '2022-08-16', 72, 290, 'Utilitas', '2022-09-10 13:06:34', '2022-09-10 13:06:34'),
(675, NULL, 'Vender', 21, 'Payment', 500000.00, 'pembayaran token listrik kantor', '2022-08-28', 72, 291, 'Utilitas', '2022-09-10 13:07:29', '2022-09-10 13:07:29'),
(677, NULL, 'Vender', 21, 'Payment', 84000.00, 'alat2 listrik', '2022-08-26', 72, 293, 'Renovasi Ruko', '2022-09-10 13:14:57', '2022-09-10 13:14:57'),
(678, NULL, 'Vender', 21, 'Payment', 1350000.00, 'alat2 kebutuhan tukang untuk renovasi', '2022-08-26', 72, 294, 'Renovasi Ruko', '2022-09-10 13:15:59', '2022-09-10 13:15:59'),
(679, NULL, 'Vender', 21, 'Payment', 1265000.00, 'uang catering pembukaan ruko', '2022-08-29', 72, 295, 'konsumsi', '2022-09-10 13:16:57', '2022-09-10 13:16:57'),
(680, NULL, 'Vender', 21, 'Payment', 10000.00, 'alat2 kebutuhan tukang untuk renovasi', '2022-08-15', 72, 296, 'Renovasi Ruko', '2022-09-10 13:17:49', '2022-09-10 13:17:49'),
(681, NULL, 'Vender', 21, 'Payment', 28000.00, 'alat2 kebutuhan tukang untuk renovasi', '2022-08-15', 72, 297, 'Renovasi Ruko', '2022-09-10 13:18:58', '2022-09-10 13:18:58'),
(682, NULL, 'Vender', 21, 'Payment', 128000.00, 'alat2 kebutuhan tukang untuk renovasi', '2022-08-15', 72, 298, 'Renovasi Ruko', '2022-09-10 13:19:21', '2022-09-10 13:19:21'),
(683, NULL, 'Vender', 21, 'Payment', 25000.00, 'alat2 kebutuhan tukang untuk renovasi', '2022-08-15', 72, 299, 'Renovasi Ruko', '2022-09-10 13:19:44', '2022-09-10 13:19:44'),
(684, NULL, 'Vender', 21, 'Payment', 279076.00, 'alat2 kebutuhan tukang untuk renovasi', '2022-08-11', 72, 300, 'Renovasi Ruko', '2022-09-10 13:21:48', '2022-09-10 13:21:48'),
(685, NULL, 'Vender', 21, 'Payment', 15000.00, 'alat2 kebutuhan tukang untuk renovasi', '2022-08-18', 72, 301, 'Renovasi Ruko', '2022-09-10 13:22:19', '2022-09-10 13:22:19'),
(686, NULL, 'Vender', 21, 'Payment', 145000.00, 'alat2 kebutuhan tukang untuk renovasi', '2022-08-01', 72, 302, 'Renovasi Ruko', '2022-09-10 13:23:07', '2022-09-10 13:23:07'),
(687, NULL, 'Vender', 21, 'Payment', 146500.00, 'alat2 kebutuhan tukang untuk renovasi', '2022-08-01', 72, 303, 'Renovasi Ruko', '2022-09-10 13:23:44', '2022-09-10 13:23:44'),
(688, NULL, 'Vender', 21, 'Payment', 15000.00, 'alat2 kebutuhan tukang untuk renovasi', '2022-08-02', 72, 304, 'Renovasi Ruko', '2022-09-10 13:25:06', '2022-09-10 13:25:06'),
(689, NULL, 'Vender', 21, 'Payment', 15000.00, 'alat2 kebutuhan tukang untuk renovasi', '2022-08-02', 72, 305, 'Renovasi Ruko', '2022-09-10 13:25:40', '2022-09-10 13:25:40'),
(690, NULL, 'Vender', 21, 'Payment', 141000.00, 'alat2 kebutuhan tukang untuk renovasi', '2022-08-01', 72, 306, 'Renovasi Ruko', '2022-09-10 13:26:36', '2022-09-10 13:26:36'),
(691, NULL, 'Vender', 21, 'Payment', 173500.00, 'alat2 kebutuhan tukang untuk renovasi', '2022-08-01', 72, 307, 'Renovasi Ruko', '2022-09-10 13:27:18', '2022-09-10 13:27:18'),
(692, NULL, 'Vender', 21, 'Payment', 412000.00, 'alat2 kebutuhan tukang untuk renovasi', '2022-08-01', 72, 308, 'Renovasi Ruko', '2022-09-10 13:28:06', '2022-09-10 13:28:06'),
(693, NULL, 'Vender', 21, 'Payment', 612000.00, 'alat2 kebutuhan tukang untuk renovasi', '2022-08-02', 72, 309, 'Renovasi Ruko', '2022-09-10 13:28:55', '2022-09-10 13:28:55'),
(694, NULL, 'Vender', 21, 'Payment', 200000.00, 'iuran perbulan ruko', '2022-08-01', 72, 310, 'Biaya Operasional', '2022-09-10 13:29:35', '2022-09-10 13:29:35'),
(695, NULL, 'Vender', 21, 'Payment', 3894000.00, 'alat2 kebutuhan tukang untuk renovasi', '2022-08-01', 72, 311, 'Renovasi Ruko', '2022-09-10 13:30:45', '2022-09-10 13:30:45'),
(696, NULL, 'Vender', 21, 'Payment', 430500.00, 'alat2 kebutuhan tukang untuk renovasi', '2022-08-03', 72, 312, 'Renovasi Ruko', '2022-09-10 13:32:25', '2022-09-10 13:32:25'),
(697, NULL, 'Vender', 21, 'Payment', 1756000.00, 'alat2 kebutuhan tukang untuk renovasi', '2022-08-03', 72, 313, 'Renovasi Ruko', '2022-09-10 13:33:39', '2022-09-10 13:33:39'),
(698, NULL, 'Vender', 21, 'Payment', 5698000.00, 'ac kantor', '2022-08-25', 72, 314, 'Renovasi Ruko', '2022-09-10 13:35:13', '2022-09-10 13:35:13'),
(699, NULL, 'Vender', 21, 'Payment', 2499000.00, 'alat2 kebutuhan tukang untuk renovasi', '2022-08-25', 72, 315, 'Renovasi Ruko', '2022-09-10 13:35:50', '2022-09-10 13:35:50'),
(700, NULL, 'Vender', 22, 'Payment', 55000.00, 'beli map blanko bpn', '2022-09-12', 72, 316, 'ATK', '2022-09-12 07:35:55', '2022-09-12 07:35:55'),
(701, NULL, 'Vender', 22, 'Payment', 25000.00, 'bensin bfi andre', '2022-09-12', 72, 317, 'Transport', '2022-09-12 08:48:04', '2022-09-12 08:48:04'),
(705, NULL, 'Vender', 21, 'Payment', 248000.00, 'pembelian galon dan lpg kantor', '2022-09-12', 72, 318, 'konsumsi', '2022-09-12 14:04:45', '2022-09-12 14:04:45'),
(706, 65, 'Customer', 10, 'Partial', 5000000.00, 'dp nya dp', '2022-09-14', 38, 60, 'Invoice', '2022-09-14 04:02:55', '2022-09-14 04:02:55'),
(708, 48, 'Customer', 21, 'Partial', 6000000.00, '', '2022-09-14', 72, 62, 'Invoice', '2022-09-15 03:59:46', '2022-09-15 03:59:46'),
(709, 52, 'Customer', 21, 'Partial', 5000000.00, '', '2022-09-25', 72, 63, 'Invoice', '2022-09-15 04:05:19', '2022-09-15 04:05:19'),
(710, NULL, 'Customer', 21, 'Payment', 2500000.00, 'pembayaran pembuatan akta pendirian dan kuasa', '2022-09-08', 72, 336, 'Pendapatan Jasa', '2022-09-15 04:07:32', '2022-09-15 04:07:32'),
(711, 67, 'Customer', 21, 'Payment', 6000000.00, 'PEMBAYARAN PT BERKAT ARANG SUKSES', '2022-09-02', 72, 337, 'Pendapatan Jasa', '2022-09-15 04:10:37', '2022-09-15 04:10:37'),
(713, 54, 'Customer', 21, 'Payment', 9550000.00, 'PEMBAYARAN HT I WAYAN RAY', '2022-09-07', 72, 339, 'Pendapatan Jasa', '2022-09-15 04:12:11', '2022-09-15 04:12:11'),
(714, 52, 'Customer', 21, 'Payment', 6300000.00, 'PEMBAYARAN PEMBUATAN HT', '2022-09-05', 72, 340, 'Pendapatan Jasa', '2022-09-15 04:13:02', '2022-09-15 04:13:02'),
(716, 57, 'Customer', 21, 'Payment', 8300000.00, 'PEMBAYARAN HAPOSAN', '2022-08-30', 72, 342, 'Pendapatan Jasa', '2022-09-15 04:19:25', '2022-09-15 04:19:25'),
(717, 58, 'Customer', 21, 'Payment', 3050000.00, 'PEMBAYARAN HT SANTI', '2022-08-30', 72, 343, 'Pendapatan Jasa', '2022-09-15 04:20:10', '2022-09-15 04:20:10'),
(718, 59, 'Customer', 21, 'Payment', 4050000.00, 'PEMBAYARAN HT IDA', '2022-08-30', 72, 344, 'Pendapatan Jasa', '2022-09-15 04:23:38', '2022-09-15 04:23:38'),
(719, 60, 'Customer', 21, 'Payment', 7050000.00, 'PEMBAYARAN HT SODIKIN', '2022-08-29', 72, 345, 'Pendapatan Jasa', '2022-09-15 04:42:42', '2022-09-15 04:42:42'),
(720, 61, 'Customer', 21, 'Payment', 3300000.00, 'INVOICE MARIO NOVA', '2022-08-24', 72, 346, 'Pendapatan Jasa', '2022-09-15 04:44:57', '2022-09-15 04:44:57'),
(721, 62, 'Customer', 21, 'Payment', 3050000.00, 'PEMBAYARAN HT Daniel', '2022-08-23', 72, 347, 'Pendapatan Jasa', '2022-09-15 04:46:02', '2022-09-15 04:46:02'),
(722, 63, 'Customer', 21, 'Payment', 3050000.00, 'pembayaran HT ROBBY', '2022-08-23', 72, 348, 'Pendapatan Jasa', '2022-09-15 04:47:48', '2022-09-15 04:47:48'),
(723, 64, 'Customer', 21, 'Payment', 5500000.00, 'PEMBAYARAN HT FITRI', '2022-08-15', 72, 349, 'Pendapatan Jasa', '2022-09-15 04:48:50', '2022-10-03 05:18:02'),
(724, NULL, 'Vender', 21, 'Payment', 471750.00, 'pembayaran wifi', '2022-09-15', 72, 319, 'Utilitas', '2022-09-15 04:51:29', '2022-09-15 04:51:29'),
(725, NULL, 'Customer', 21, 'Payment', 19973200.00, 'Hutang Ke Bu ajeng pribadi', '2022-07-31', 72, 350, 'Pinjaman', '2022-09-19 07:32:55', '2022-09-19 07:32:55'),
(726, NULL, 'Vender', 22, 'Payment', 10000.00, 'blanko bpn', '2022-07-26', 72, 320, 'ATK', '2022-09-19 09:12:24', '2022-09-19 09:12:24'),
(727, NULL, 'Vender', 22, 'Payment', 50000.00, 'bayar pbb', '2022-07-18', 72, 321, 'PNBP', '2022-09-19 09:14:06', '2022-09-19 09:14:06'),
(728, NULL, 'Vender', 22, 'Payment', 6000.00, 'parkir', '2022-07-15', 72, 322, 'Transport', '2022-09-19 09:15:26', '2022-09-19 09:15:26'),
(729, 68, 'Customer', 24, 'Partial', 12000.00, '', '2022-09-19', 77, 64, 'Invoice', '2022-09-19 13:48:36', '2022-09-19 13:48:36'),
(730, NULL, 'Vender', 24, 'Payment', 50000.00, '', '2022-09-19', 77, 323, 'Pembelian Bahan Baku', '2022-09-19 14:13:34', '2022-09-19 14:13:34'),
(732, NULL, 'Vender', 21, 'Payment', 1000000.00, 'pembayaran fee Akta Kuasa dan Persetujuan', '2022-09-21', 72, 324, 'Biaya Entertain', '2022-09-21 04:51:49', '2022-09-21 04:51:49'),
(733, 69, 'Customer', 24, 'Partial', 14800.00, '', '2022-09-21', 82, 66, 'Invoice', '2022-09-21 14:23:30', '2022-09-21 14:23:30'),
(734, 69, 'Customer', 24, 'Partial', 12000.00, '', '2022-09-22', 77, 67, 'Invoice', '2022-09-22 11:01:11', '2022-09-22 11:01:11'),
(736, 69, 'Customer', 24, 'Partial', 12000.00, '', '2022-09-22', 77, 68, 'Invoice', '2022-09-22 11:03:58', '2022-09-22 11:03:58'),
(737, 69, 'Customer', 24, 'Partial', 12000.00, '', '2022-09-22', 77, 69, 'Invoice', '2022-09-22 11:04:47', '2022-09-22 11:04:47'),
(738, 69, 'Customer', 24, 'Partial', 12000.00, '', '2022-09-22', 77, 70, 'Invoice', '2022-09-22 11:05:33', '2022-09-22 11:05:33'),
(739, 69, 'Customer', 24, 'Partial', 12000.00, '', '2022-09-22', 77, 71, 'Invoice', '2022-09-22 11:06:03', '2022-09-22 11:06:03'),
(740, 69, 'Customer', 24, 'Partial', 72000.00, '', '2022-09-22', 77, 72, 'Invoice', '2022-09-22 11:06:18', '2022-09-22 11:06:18'),
(741, 69, 'Customer', 24, 'Partial', 12000.00, '', '2022-09-22', 77, 73, 'Invoice', '2022-09-22 11:06:30', '2022-09-22 11:06:30'),
(742, 69, 'Customer', 24, 'Partial', 53600.00, '', '2022-09-22', 77, 74, 'Invoice', '2022-09-22 11:06:41', '2022-09-22 11:06:41'),
(743, 69, 'Customer', 24, 'Partial', 62800.00, '', '2022-09-22', 77, 75, 'Invoice', '2022-09-22 11:06:52', '2022-09-22 11:06:52'),
(744, 69, 'Customer', 24, 'Partial', 48000.00, '', '2022-09-22', 77, 76, 'Invoice', '2022-09-22 11:07:42', '2022-09-22 11:07:42'),
(745, 69, 'Customer', 24, 'Partial', 86000.00, '', '2022-09-22', 77, 77, 'Invoice', '2022-09-22 11:08:13', '2022-09-22 11:08:13'),
(746, 69, 'Customer', 24, 'Partial', 36000.00, '', '2022-09-22', 77, 78, 'Invoice', '2022-09-22 11:08:42', '2022-09-22 11:08:42'),
(747, 69, 'Customer', 24, 'Partial', 14800.00, '', '2022-09-22', 77, 79, 'Invoice', '2022-09-22 11:08:54', '2022-09-22 11:08:54'),
(748, 69, 'Customer', 24, 'Partial', 12000.00, '', '2022-09-22', 77, 80, 'Invoice', '2022-09-22 11:09:37', '2022-09-22 11:09:37'),
(749, 69, 'Customer', 24, 'Partial', 12000.00, '', '2022-09-22', 77, 81, 'Invoice', '2022-09-22 11:09:55', '2022-09-22 11:09:55'),
(750, 69, 'Customer', 24, 'Partial', 12000.00, '', '2022-09-22', 77, 82, 'Invoice', '2022-09-22 11:10:07', '2022-09-22 11:10:07'),
(751, 69, 'Customer', 24, 'Partial', 20000.00, '', '2022-09-22', 77, 83, 'Invoice', '2022-09-22 11:10:39', '2022-09-22 11:10:39'),
(752, 69, 'Customer', 24, 'Partial', 24000.00, '', '2022-09-22', 77, 84, 'Invoice', '2022-09-22 11:11:13', '2022-09-22 11:11:13'),
(753, 7, 'Vender', 21, 'Partial', 2473900.00, '', '2022-09-22', 72, 8, 'Bill', '2022-09-22 12:20:21', '2022-09-22 12:20:21'),
(755, 7, 'Vender', 21, 'Partial', 2473900.00, '', '2022-07-30', 72, 10, 'Bill', '2022-09-24 03:04:28', '2022-09-24 03:04:28'),
(756, NULL, 'Vender', 22, 'Payment', 100000.00, 'sps balik nama marji', '2022-09-12', 72, 325, 'PNBP', '2022-09-24 03:11:01', '2022-09-24 03:11:01'),
(757, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps subuki', '2022-09-12', 72, 326, 'PNBP', '2022-09-24 03:18:50', '2022-09-24 03:18:50'),
(758, NULL, 'Vender', 22, 'Payment', 200000.00, 'tf mbak nadia', '2022-09-12', 72, 327, 'Biaya Entertain', '2022-09-24 03:23:25', '2022-09-24 03:23:25'),
(759, NULL, 'Vender', 22, 'Payment', 500000.00, 'beli materai', '2022-09-14', 72, 328, 'ATK', '2022-09-24 03:31:06', '2022-09-24 03:31:06'),
(760, NULL, 'Vender', 22, 'Payment', 25000.00, 'bensin ke pt garam', '2022-09-12', 72, 329, 'Transport', '2022-09-24 03:38:51', '2022-09-24 03:38:51'),
(761, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps sodikin', '2022-09-12', 72, 330, 'PNBP', '2022-09-24 03:39:19', '2022-09-24 03:39:19'),
(762, NULL, 'Vender', 22, 'Payment', 12000.00, 'peralatan untuk tukang', '2022-09-14', 72, 331, 'Biaya Operasional', '2022-09-24 03:41:03', '2022-09-24 03:41:03');
INSERT INTO `transactions` (`id`, `user_id`, `user_type`, `account`, `type`, `amount`, `description`, `date`, `created_by`, `payment_id`, `category`, `created_at`, `updated_at`) VALUES
(763, NULL, 'Vender', 22, 'Payment', 25000.00, 'bensin bpn andre', '2022-09-14', 72, 332, 'Transport', '2022-09-24 03:41:48', '2022-09-24 03:41:48'),
(764, NULL, 'Vender', 22, 'Payment', 3000.00, 'parkir', '2022-09-14', 72, 333, 'Transport', '2022-09-24 03:43:03', '2022-09-24 03:43:03'),
(765, NULL, 'Vender', 22, 'Payment', 33500.00, 'sabun  biore', '2022-09-14', 72, 334, 'Pengeluaran Lain-lain', '2022-09-24 03:43:48', '2022-09-24 03:43:48'),
(766, NULL, 'Vender', 22, 'Payment', 25000.00, 'bensin bpn andre', '2022-09-14', 72, 335, 'Transport', '2022-09-24 03:53:39', '2022-09-24 03:53:39'),
(767, NULL, 'Vender', 22, 'Payment', 27000.00, 'kirim pos +parkir', '2022-09-14', 72, 336, 'Transport', '2022-09-24 03:54:11', '2022-09-24 03:54:11'),
(768, NULL, 'Vender', 22, 'Payment', 25000.00, 'bensin sifin', '2022-09-14', 72, 337, 'Transport', '2022-09-24 03:54:40', '2022-09-24 03:54:40'),
(769, NULL, 'Vender', 22, 'Payment', 63000.00, 'beli yakult', '2022-09-16', 72, 338, 'konsumsi', '2022-09-24 03:55:13', '2022-09-24 03:55:13'),
(770, NULL, 'Vender', 22, 'Payment', 50000.00, 'voucher profil PT', '2022-09-16', 72, 339, 'PNBP', '2022-09-24 03:55:39', '2022-09-24 03:55:39'),
(771, NULL, 'Vender', 22, 'Payment', 100000.00, 'konsumsi kantor', '2022-09-16', 72, 340, 'konsumsi', '2022-09-24 03:55:59', '2022-09-24 03:55:59'),
(772, NULL, 'Vender', 22, 'Payment', 50000.00, 'besnin bfi waru + sukomanunggal', '2022-09-16', 72, 341, 'Transport', '2022-09-24 03:56:27', '2022-09-24 03:56:27'),
(773, NULL, 'Vender', 22, 'Payment', 4000.00, 'parkir bfi waru dan sukomanunggal', '2022-09-16', 72, 342, 'Transport', '2022-09-24 03:59:35', '2022-09-24 03:59:35'),
(774, NULL, 'Vender', 22, 'Payment', 51000.00, 'sps siswandie cheking', '2022-09-16', 72, 343, 'PNBP', '2022-09-24 04:01:50', '2022-09-24 04:01:50'),
(775, NULL, 'Vender', 22, 'Payment', 100000.00, 'salam tempel bpn 2', '2022-09-17', 72, 344, 'Biaya Entertain', '2022-09-24 04:04:03', '2022-09-24 04:04:03'),
(776, NULL, 'Vender', 22, 'Payment', 100000.00, 'sps haposan dan lilik', '2022-09-17', 72, 345, 'PNBP', '2022-09-24 04:04:56', '2022-09-24 04:04:56'),
(777, NULL, 'Vender', 22, 'Payment', 17000.00, 'uang pos dan parkir', '2022-09-17', 72, 346, 'Transport', '2022-09-24 04:05:27', '2022-09-24 04:05:27'),
(778, NULL, 'Vender', 22, 'Payment', 7000.00, 'print dan lem', '2022-09-19', 72, 347, 'ATK', '2022-09-24 04:05:55', '2022-09-24 04:05:55'),
(779, NULL, 'Vender', 22, 'Payment', 25000.00, 'bensin andre bpn', '2022-09-19', 72, 348, 'Transport', '2022-09-24 04:06:17', '2022-09-24 04:06:17'),
(780, NULL, 'Vender', 22, 'Payment', 30000.00, 'blanko peningkatan untuk bpn', '2022-09-19', 72, 349, 'Peralatan', '2022-09-24 04:07:05', '2022-09-24 04:07:05'),
(781, NULL, 'Vender', 22, 'Payment', 30000.00, 'konsumsi buajeng', '2022-09-20', 72, 350, 'konsumsi', '2022-09-24 04:07:41', '2022-09-24 04:07:41'),
(782, NULL, 'Vender', 22, 'Payment', 201000.00, 'sps ht fitri', '2022-09-20', 72, 351, 'PNBP', '2022-09-24 04:08:09', '2022-09-24 04:08:09'),
(783, NULL, 'Vender', 22, 'Payment', 180000.00, 'sps ht lilik', '2022-09-20', 72, 352, 'PNBP', '2022-09-24 04:08:46', '2022-09-24 04:08:46'),
(784, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps ht mateyus', '2022-09-20', 72, 353, 'PNBP', '2022-09-24 04:09:24', '2022-09-24 04:09:24'),
(785, NULL, 'Vender', 22, 'Payment', 200000.00, 'tf mbak nadia cheking siswandie', '2022-09-20', 72, 354, 'Biaya Entertain', '2022-09-24 04:09:54', '2022-09-24 04:09:54'),
(786, NULL, 'Vender', 22, 'Payment', 56000.00, 'laminating sop', '2022-09-20', 72, 355, 'Biaya Operasional', '2022-09-24 04:10:22', '2022-09-24 04:10:22'),
(787, NULL, 'Vender', 22, 'Payment', 51000.00, 'sps cheking yayuk', '2022-09-21', 72, 356, 'PNBP', '2022-09-24 04:10:56', '2022-09-24 04:10:56'),
(788, NULL, 'Vender', 22, 'Payment', 200000.00, 'transfer mbak nadia untuk biaya cheking', '2022-09-21', 72, 357, 'Biaya Entertain', '2022-09-24 04:12:25', '2022-09-24 04:12:25'),
(789, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps ht daniel', '2022-09-21', 72, 358, 'PNBP', '2022-09-24 04:13:01', '2022-09-24 04:13:01'),
(790, NULL, 'Vender', 21, 'Payment', 9550000.00, 'SUBUKI BUDI UTOMO (BFI Waru)', '2022-09-13', 72, 359, 'Pendapatan Jasa', '2022-09-24 04:14:01', '2022-10-03 05:24:07'),
(791, NULL, 'Vender', 22, 'Payment', 50000.00, 'salam tempel bpn', '2022-09-21', 72, 360, 'Biaya Entertain', '2022-09-24 04:14:28', '2022-09-24 04:14:28'),
(792, NULL, 'Vender', 22, 'Payment', 37500.00, 'kirim kantor pos', '2022-09-21', 72, 361, 'Pengeluaran Lain-lain', '2022-09-24 04:15:09', '2022-09-24 04:15:09'),
(793, NULL, 'Vender', 22, 'Payment', 11500.00, 'konsumsi bubur', '2022-09-21', 72, 362, 'konsumsi', '2022-09-24 04:15:39', '2022-09-24 04:15:39'),
(794, NULL, 'Vender', 22, 'Payment', 63000.00, 'yakult', '2022-09-21', 72, 363, 'konsumsi', '2022-09-24 04:16:03', '2022-09-24 04:16:03'),
(795, NULL, 'Vender', 22, 'Payment', 25000.00, 'bensin bpn andre', '2022-09-22', 72, 364, 'Transport', '2022-09-24 04:16:35', '2022-09-24 04:16:35'),
(796, NULL, 'Vender', 22, 'Payment', 50000.00, 'bensin kpp + bensin bfi', '2022-09-23', 72, 365, 'Transport', '2022-09-24 04:17:17', '2022-09-24 04:17:17'),
(797, NULL, 'Vender', 22, 'Payment', 20000.00, 'blanko sk', '2022-09-23', 72, 366, 'Biaya Operasional', '2022-09-24 04:17:50', '2022-09-24 04:17:50'),
(798, NULL, 'Vender', 22, 'Payment', 37500.00, 'konsumsi bubur kacang ijo', '2022-09-23', 72, 367, 'konsumsi', '2022-09-24 04:18:17', '2022-09-24 04:18:17'),
(799, NULL, 'Vender', 22, 'Payment', 40400.00, 'tinta stempel', '2022-09-23', 72, 368, 'Biaya Operasional', '2022-09-24 04:19:03', '2022-09-24 04:19:03'),
(800, 70, 'Customer', 21, 'Partial', 2500000.00, '', '2022-09-25', 72, 85, 'Invoice', '2022-09-25 15:41:30', '2022-09-25 15:41:30'),
(801, NULL, 'Customer', 23, 'Payment', 833000.00, 'Pinjaman cash utuk balancing cash kecil', '2022-09-25', 72, 352, 'Pinjaman', '2022-09-25 15:49:07', '2022-09-25 15:49:07'),
(802, NULL, 'Vender', 22, 'Payment', 152000.00, 'pembayaran vocher pendirian dan pemesanan nama cv + parkir', '2022-09-26', 72, 369, 'PNBP', '2022-09-26 01:59:04', '2022-09-26 01:59:04'),
(804, NULL, 'Vender', 23, 'Payment', 2500000.00, 'pinjaman buajeng ke uang kantor untuk pembayaran mbak ainun', '2022-09-26', 72, 371, 'PINJAMAN', '2022-09-26 02:32:42', '2022-09-26 04:49:41'),
(805, NULL, 'Vender', 23, 'Payment', 2500000.00, 'biaya pembayaran ke mbak ainun bpn', '2022-09-26', 72, 372, 'Biaya Entertain', '2022-09-26 03:25:33', '2022-09-26 03:25:33'),
(806, NULL, 'Vender', 13, 'Payment', 126000.00, 'Transaksi tgl 31 Okt - 06 Nov 2022', '2022-11-07', 72, 373, 'Sistem Try Out', '2022-09-26 04:50:38', '2022-11-14 07:10:40'),
(808, 72, 'Customer', 21, 'Partial', 3000000.00, 'dp pembayaran cv', '2022-09-26', 72, 86, 'Invoice', '2022-09-26 09:29:16', '2022-09-26 09:29:16'),
(810, NULL, 'Customer', 21, 'Payment', 4000000.00, 'pembayaran peningkatan kilat titut', '2022-08-22', 72, 353, 'Pendapatan Jasa', '2022-09-28 04:12:03', '2022-09-28 04:12:03'),
(811, NULL, 'Customer', 21, 'Payment', 7050000.00, 'pemabayaran ht dari bfi atas nama yusam', '2022-08-30', 72, 354, 'Pendapatan Jasa', '2022-09-28 04:17:23', '2022-09-28 04:17:23'),
(812, NULL, 'Vender', 18, 'Payment', 3000000.00, 'Hutang Operasional Server (alfin)', '2022-06-23', 72, 375, 'Hutang', '2022-09-28 04:20:24', '2022-11-09 19:46:55'),
(813, NULL, 'Vender', 21, 'Payment', 102020.00, 'pembayaran telfon kantor', '2022-08-08', 72, 376, 'Utilitas', '2022-09-28 04:29:11', '2022-09-28 04:29:11'),
(814, NULL, 'Vender', 21, 'Payment', 1836000.00, 'pembayaran pln', '2022-08-08', 72, 377, 'Utilitas', '2022-09-28 04:31:18', '2022-09-28 04:31:18'),
(815, NULL, 'Vender', 21, 'Payment', 1250000.00, 'pembayaran mitra notaris ferry gunawan', '2022-08-08', 72, 378, 'Biaya Mitra Notaris', '2022-09-28 04:41:36', '2022-09-28 04:41:36'),
(816, NULL, 'Vender', 21, 'Payment', 2500000.00, 'pembayaran mitra notaris ani suhaini', '2022-08-08', 72, 379, 'Biaya Mitra Notaris', '2022-09-28 04:42:16', '2022-09-28 04:42:16'),
(817, NULL, 'Vender', 21, 'Payment', 5000000.00, 'pembayaran rasuna untuk masuk bpn', '2022-08-15', 72, 380, 'Biaya Entertain', '2022-09-28 04:54:33', '2022-09-28 04:54:33'),
(818, NULL, 'Vender', 13, 'Payment', 130000.00, 'Transaksi Tgl 07 - 13 Nov 2022', '2022-11-14', 72, 381, 'Sistem Try Out', '2022-09-28 04:56:38', '2022-11-14 07:10:53'),
(819, NULL, 'Vender', 21, 'Payment', 179000.00, 'bayar sps bpn', '2022-08-15', 72, 382, 'PNBP', '2022-09-28 04:58:18', '2022-09-28 04:58:18'),
(820, NULL, 'Vender', 21, 'Payment', 9135000.00, 'gaji anak2', '2022-08-31', 72, 383, 'Gaji', '2022-09-28 05:01:50', '2022-09-28 05:01:50'),
(821, NULL, 'Vender', 13, 'Payment', 80000.00, 'Transaksi Tgl 14 - 20 Nov 2022', '2022-11-21', 72, 384, 'Sistem Try Out', '2022-09-28 05:29:13', '2022-11-21 08:33:58'),
(822, NULL, 'Customer', 21, 'Payment', 750000.00, 'biaya pengurusan polres bu rasuna', '2022-09-08', 72, 355, 'Pendapatan Jasa', '2022-09-28 06:20:14', '2022-09-28 06:20:14'),
(823, NULL, 'Vender', 13, 'Payment', 156000.00, 'Transaksi Tgl 21 - 27 Nov 2022', '2022-11-28', 72, 385, 'Sistem Try Out', '2022-09-28 06:27:32', '2022-12-05 04:35:38'),
(824, NULL, 'Vender', 13, 'Payment', 148000.00, 'Transaksi Tgl 27 Nov - 04 Des 2022', '2022-12-05', 72, 386, 'Sistem Try Out', '2022-09-28 06:31:32', '2022-12-05 04:36:04'),
(825, NULL, 'Vender', 21, 'Payment', 2515000.00, 'pembayaran bpn', '2022-08-24', 72, 387, 'Biaya Entertain', '2022-09-28 06:35:08', '2022-09-28 06:35:08'),
(826, NULL, 'Vender', 21, 'Payment', 2013700.00, 'biaya perlengkapan untuk kantor', '2022-08-29', 72, 388, 'Biaya Operasional', '2022-09-28 06:36:31', '2022-09-28 06:36:31'),
(827, NULL, 'Vender', 21, 'Payment', 19800000.00, 'tarikan tunai oleh buajeng', '2022-08-30', 72, 389, 'PINJAMAN', '2022-09-28 06:39:36', '2022-09-28 06:39:36'),
(828, NULL, 'Vender', 13, 'Payment', 2000.00, 'Transaksi Tgl 02 - 08 Jan 2023', '2023-01-09', 72, 390, 'Sistem Try Out', '2022-09-29 07:07:03', '2023-01-09 10:59:16'),
(829, NULL, 'Vender', 22, 'Payment', 51000.00, 'sps HT santi', '2022-09-26', 72, 391, 'PNBP', '2022-09-29 07:07:27', '2022-09-29 07:07:27'),
(830, NULL, 'Vender', 28, 'Payment', 57000.00, 'Pendapatan Tgl 02 - 08 Januari 2023', '2023-01-11', 72, 392, 'Penjualan', '2022-09-29 07:07:55', '2023-02-06 04:53:22'),
(831, NULL, 'Vender', 22, 'Payment', 51000.00, 'sps cheking sokeh', '2022-09-27', 72, 393, 'PNBP', '2022-09-29 07:10:42', '2022-09-29 07:10:42'),
(832, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps cheking guntur', '2022-09-27', 72, 394, 'PNBP', '2022-09-29 07:11:08', '2022-09-29 07:11:08'),
(833, NULL, 'Vender', 22, 'Payment', 53000.00, 'bensin sifin dan parkir', '2022-09-27', 72, 395, 'konsumsi', '2022-09-29 07:16:30', '2022-09-29 07:16:30'),
(834, NULL, 'Vender', 13, 'Payment', 2000.00, 'Transaksi Tgl 09 - 15 Jan 2023', '2023-01-16', 72, 396, 'Sistem Try Out', '2022-09-29 07:17:22', '2023-02-02 09:21:04'),
(835, NULL, 'Vender', 22, 'Payment', 10000.00, 'parkir marina mas fahmi', '2022-09-27', 72, 397, 'Biaya Operasional', '2022-09-29 07:17:57', '2022-09-29 07:17:57'),
(836, NULL, 'Vender', 22, 'Payment', 400000.00, 'biaya tf mbak nadia', '2022-09-27', 72, 398, 'Biaya Entertain', '2022-09-29 07:19:02', '2022-09-29 07:19:02'),
(837, NULL, 'Vender', 22, 'Payment', 306500.00, 'transfer ke pak donny', '2022-09-27', 72, 399, 'Biaya Entertain', '2022-09-29 07:20:23', '2022-09-29 07:20:23'),
(838, NULL, 'Vender', 22, 'Payment', 4000.00, 'parkir bfi dan bni', '2022-09-27', 72, 400, 'konsumsi', '2022-09-29 07:21:11', '2022-09-29 07:21:11'),
(839, NULL, 'Vender', 22, 'Payment', 100000.00, 'cekplot panghudi dan paini', '2022-09-28', 72, 401, 'Biaya Entertain', '2022-09-29 07:23:29', '2022-09-29 07:23:29'),
(840, NULL, 'Vender', 31, 'Payment', 30000.00, 'Pendapatan Tgl 26 Des 2022 - 01 Jan 2023', '2023-01-03', 72, 402, 'Penjualan', '2022-09-29 07:24:15', '2023-02-07 07:21:46'),
(841, NULL, 'Vender', 22, 'Payment', 100000.00, 'sps roya dan paini dan panghuni', '2022-09-28', 72, 403, 'PNBP', '2022-09-29 07:26:42', '2022-09-29 07:26:42'),
(842, NULL, 'Vender', 31, 'Payment', 32000.00, 'Pendapatan Tgl 09 - 15 Januari 2023', '2023-01-16', 72, 404, 'Penjualan', '2022-09-29 07:27:20', '2023-02-07 07:56:24'),
(843, NULL, 'Vender', 22, 'Payment', 30000.00, 'bensin bpn dan print', '2022-09-28', 72, 405, 'Transport', '2022-09-29 07:36:44', '2022-09-29 07:36:44'),
(844, 74, 'Customer', 21, 'Partial', 1500000.00, 'pembayaran', '2022-10-01', 72, 88, 'Invoice', '2022-10-01 03:19:58', '2022-10-01 03:19:58'),
(845, NULL, 'Vender', 22, 'Payment', 25000.00, 'bensin bpn sifin', '2022-09-28', 72, 406, 'Transport', '2022-10-01 04:01:29', '2022-10-01 04:01:29'),
(846, NULL, 'Vender', 26, 'Payment', 200000.00, 'Cabai kebun 1 - 9kg', '2023-02-03', 72, 407, 'Penjualan Cabai', '2022-10-01 04:02:10', '2023-02-07 17:07:07'),
(847, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps fungky', '2022-09-28', 72, 408, 'PNBP', '2022-10-01 04:02:45', '2022-10-01 04:02:45'),
(848, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps cheking rudy', '2022-09-28', 72, 409, 'PNBP', '2022-10-01 04:04:55', '2022-10-01 04:04:55'),
(849, NULL, 'Vender', 22, 'Payment', 59000.00, 'perlengkapan finger print', '2022-09-01', 72, 410, 'Biaya Operasional', '2022-10-01 04:25:50', '2022-10-01 04:25:50'),
(850, NULL, 'Vender', 22, 'Payment', 50000.00, 'sps cheking samuji', '2022-09-03', 72, 411, 'PNBP', '2022-10-01 04:47:59', '2022-10-01 04:47:59'),
(853, NULL, 'Vender', 22, 'Payment', 500000.00, 'beli materai', '2022-09-26', 72, 414, 'ATK', '2022-10-01 04:51:45', '2022-10-01 04:51:45'),
(854, NULL, 'Vender', 21, 'Payment', 66000000.00, 'uang dtransfer kerekening buajeng', '2022-09-05', 72, 415, 'PINJAMAN', '2022-10-03 05:07:11', '2022-10-03 07:35:52'),
(855, NULL, 'Customer', 21, 'Payment', 2000000.00, 'pembayaran pengurusan pse', '2022-09-23', 72, 356, 'Pendapatan Jasa', '2022-10-03 05:14:55', '2022-10-03 05:14:55'),
(856, NULL, 'Customer', 21, 'Payment', 7050000.00, 'pembayaran ht moh yusam fauzi', '2022-09-02', 72, 357, 'Pendapatan Jasa', '2022-10-03 05:19:07', '2022-10-03 05:19:07'),
(857, NULL, 'Customer', 21, 'Payment', 3050000.00, 'M. DELTI REZA', '2022-09-12', 72, 358, 'Pendapatan Jasa', '2022-10-03 05:21:08', '2022-10-03 05:21:08'),
(858, NULL, 'Customer', 21, 'Payment', 9550000.00, 'SUBUKI BUDI UTOMO (BFI SBY1)', '2022-09-13', 72, 359, 'Pendapatan Jasa', '2022-10-03 05:22:47', '2022-10-03 05:22:47'),
(859, NULL, 'Customer', 21, 'Payment', 3050000.00, 'YAMIN (bfi waru)', '2022-09-12', 72, 360, 'Pendapatan Jasa', '2022-10-03 05:23:48', '2022-10-03 05:23:48'),
(860, NULL, 'Customer', 21, 'Payment', 7300000.00, 'pembayaran ht IWAN AGUS SETIAWAN (SBY 2)', '2022-09-17', 72, 361, 'Pendapatan Jasa', '2022-10-03 05:25:20', '2022-10-03 05:25:20'),
(861, NULL, 'Customer', 21, 'Payment', 6050000.00, 'pembayaran HT yayuk mawarti', '2022-09-22', 72, 362, 'Pendapatan Jasa', '2022-10-03 05:26:10', '2022-10-03 05:26:10'),
(862, NULL, 'Customer', 21, 'Payment', 5550000.00, 'Pembayaran HT sariyo putra', '2022-09-22', 72, 363, 'Pendapatan Jasa', '2022-10-03 05:27:15', '2022-10-03 05:27:15'),
(863, NULL, 'Customer', 21, 'Payment', 20550000.00, 'pembayaran HT ASWIN YANUAR', '2022-09-22', 72, 364, 'Pendapatan Jasa', '2022-10-03 05:27:58', '2022-10-03 05:27:58'),
(864, NULL, 'Customer', 21, 'Payment', 8000000.00, 'Pembayaran IMB HADI', '2022-09-22', 72, 365, 'Pendapatan Jasa', '2022-10-03 05:28:51', '2022-10-03 05:28:51'),
(865, NULL, 'Customer', 21, 'Payment', 5000000.00, 'pembayaran ht royan abdilah zakaria', '2022-09-28', 72, 366, 'Pendapatan Jasa', '2022-10-03 05:29:47', '2022-10-03 05:29:47'),
(866, NULL, 'Customer', 21, 'Payment', 11100000.00, 'pembayaran HT rudy haryanto', '2022-09-29', 72, 367, 'Pendapatan Jasa', '2022-10-03 05:33:56', '2022-10-03 05:33:56'),
(867, NULL, 'Customer', 21, 'Payment', 4550000.00, 'Pembayaran', '2022-09-30', 72, 368, 'Pendapatan Jasa', '2022-10-03 05:35:32', '2022-10-03 05:35:32'),
(868, NULL, 'Customer', 21, 'Payment', 5000000.00, 'Pembuatan Cv Watu jaya Makmur', '2022-09-26', 72, 369, 'Pendapatan Jasa', '2022-10-03 07:24:21', '2022-10-03 07:24:21'),
(869, NULL, 'Vender', 21, 'Payment', 11365000.00, 'gaji anak2', '2022-09-30', 72, 416, 'Gaji', '2022-10-03 07:26:04', '2022-10-03 07:26:04'),
(870, NULL, 'Vender', 21, 'Payment', 2300000.00, 'biaya mitra notaris bu nandyta wulandari', '2022-09-26', 72, 417, 'Biaya Mitra Notaris', '2022-10-03 07:30:46', '2022-10-03 07:33:03'),
(871, NULL, 'Vender', 21, 'Payment', 424900.00, 'pembayaran PDAM', '2022-10-05', 72, 418, 'Utilitas', '2022-10-05 08:15:29', '2022-10-05 08:15:29'),
(872, NULL, 'Vender', 21, 'Payment', 2473900.00, 'pembayaran indihome', '2022-10-05', 72, 419, 'Utilitas', '2022-10-05 08:15:53', '2022-10-05 08:15:53'),
(873, NULL, 'Vender', 21, 'Payment', 80500.00, 'telfon kantor', '2022-10-05', 72, 420, 'Utilitas', '2022-10-05 08:16:15', '2022-10-05 08:16:15'),
(874, NULL, 'Vender', 22, 'Payment', 107100.00, 'bayar nomer hp kantor', '2022-10-05', 72, 421, 'Utilitas', '2022-10-05 08:16:45', '2022-10-05 08:16:45'),
(875, NULL, 'Vender', 22, 'Payment', 50000.00, 'uang blanko bpn', '2022-10-01', 72, 422, 'ATK', '2022-10-05 08:21:38', '2022-10-05 08:21:38'),
(876, NULL, 'Vender', 22, 'Payment', 100000.00, 'salam tempel sokeh dan guntur', '2022-10-01', 72, 423, 'Biaya Entertain', '2022-10-05 08:22:20', '2022-10-05 08:22:20'),
(877, NULL, 'Vender', 22, 'Payment', 63000.00, 'yakult', '2022-10-01', 72, 424, 'Biaya Entertain', '2022-10-05 08:22:52', '2022-10-05 08:22:52'),
(878, NULL, 'Vender', 22, 'Payment', 50000.00, 'bayar paket buajeng dari papua', '2022-10-01', 72, 425, 'Biaya Operasional', '2022-10-05 08:32:32', '2022-10-05 08:32:32'),
(879, NULL, 'Vender', 22, 'Payment', 111000.00, 'rujak konsumsi buajeng', '2022-10-01', 72, 426, 'konsumsi', '2022-10-05 08:33:24', '2022-10-05 08:33:24'),
(880, NULL, 'Vender', 22, 'Payment', 5000.00, 'parkir', '2022-10-01', 72, 427, 'Transport', '2022-10-05 08:33:49', '2022-10-05 08:33:49'),
(881, NULL, 'Vender', 22, 'Payment', 50000.00, 'bensin bpn', '2022-10-01', 72, 428, 'Transport', '2022-10-05 08:34:19', '2022-10-05 08:34:19'),
(882, NULL, 'Vender', 22, 'Payment', 11700.00, 'materai', '2022-10-01', 72, 429, 'ATK', '2022-10-05 08:37:16', '2022-10-05 08:37:16'),
(883, NULL, 'Vender', 22, 'Payment', 50000.00, 'bensin bpn +BFi andre', '2022-10-01', 72, 430, 'Transport', '2022-10-05 08:38:24', '2022-10-05 08:38:24'),
(884, NULL, 'Vender', 22, 'Payment', 1000.00, 'print', '2022-10-01', 72, 431, 'ATK', '2022-10-05 08:38:59', '2022-10-05 08:38:59'),
(885, NULL, 'Vender', 22, 'Payment', 200000.00, 'transfer nadia', '2022-10-01', 72, 432, 'Biaya Entertain', '2022-10-05 08:39:43', '2022-10-05 08:39:43'),
(886, NULL, 'Vender', 22, 'Payment', 25000.00, 'bensin bpn', '2022-10-01', 72, 433, 'Transport', '2022-10-05 08:41:02', '2022-10-05 08:41:02'),
(887, NULL, 'Vender', 22, 'Payment', 400000.00, 'pembayaran mesin fotocopy', '2022-10-03', 72, 434, 'Utilitas', '2022-10-05 08:41:49', '2022-10-05 08:41:49'),
(888, NULL, 'Vender', 22, 'Payment', 50000.00, 'salam tempel', '2022-10-03', 72, 435, 'Biaya Entertain', '2022-10-05 08:42:29', '2022-10-05 08:42:29'),
(889, NULL, 'Vender', 22, 'Payment', 25000.00, 'bensin bpn sifin', '2022-10-03', 72, 436, 'Transport', '2022-10-05 08:42:54', '2022-10-05 08:42:54'),
(890, NULL, 'Vender', 22, 'Payment', 200000.00, 'iuran satpam', '2022-10-03', 72, 437, 'Utilitas', '2022-10-05 08:43:21', '2022-10-05 08:43:21'),
(891, NULL, 'Vender', 22, 'Payment', 150000.00, 'iuran bu susi', '2022-10-03', 72, 438, 'Utilitas', '2022-10-05 08:44:18', '2022-10-05 08:44:18'),
(892, NULL, 'Vender', 22, 'Payment', 250000.00, 'iuran rt', '2022-10-03', 72, 439, 'Utilitas', '2022-10-05 08:45:27', '2022-10-05 08:45:27'),
(893, NULL, 'Vender', 22, 'Payment', 470000.00, 'sps hibah', '2022-10-03', 72, 440, 'PNBP', '2022-10-05 08:45:49', '2022-10-05 08:45:49'),
(894, NULL, 'Vender', 22, 'Payment', 25000.00, 'bensin andre', '2022-10-03', 72, 441, 'Transport', '2022-10-05 08:46:10', '2022-10-05 08:46:10'),
(895, NULL, 'Vender', 22, 'Payment', 51000.00, 'cheking fauzi', '2022-10-03', 72, 442, 'PNBP', '2022-10-05 08:46:37', '2022-10-05 08:46:37'),
(896, NULL, 'Vender', 22, 'Payment', 50000.00, 'cheking haposan', '2022-10-03', 72, 443, 'PNBP', '2022-10-05 08:47:04', '2022-10-05 08:47:04'),
(897, NULL, 'Vender', 22, 'Payment', 400000.00, 'bayar nadia', '2022-10-03', 72, 444, 'Biaya Entertain', '2022-10-05 08:47:32', '2022-10-05 08:47:32'),
(898, NULL, 'Vender', 22, 'Payment', 10000.00, 'uang pos', '2022-10-05', 72, 445, 'Biaya Operasional', '2022-10-05 08:48:03', '2022-10-05 08:48:03'),
(899, NULL, 'Vender', 22, 'Payment', 25000.00, 'bensin andre', '2022-10-05', 72, 446, 'Transport', '2022-10-05 08:49:50', '2022-10-05 08:49:50'),
(900, NULL, 'Vender', 22, 'Payment', 11500.00, 'bayar pos kilat malang', '2022-10-05', 72, 447, 'Biaya Operasional', '2022-10-05 08:50:24', '2022-10-05 08:50:24'),
(901, NULL, 'Vender', 22, 'Payment', 5000.00, 'parkir pos bfi', '2022-10-05', 72, 448, 'Transport', '2022-10-05 08:50:49', '2022-10-05 08:50:49'),
(902, NULL, 'Vender', 21, 'Payment', 2500000.00, 'pembayaran sps ht aswin', '2022-10-05', 72, 449, 'PINJAMAN', '2022-10-05 08:57:53', '2022-10-05 08:57:53'),
(903, NULL, 'Vender', 21, 'Payment', 12500000.00, 'pelunasan rekom pecah dan pertek sambisari', '2022-10-05', 72, 450, 'Biaya Entertain', '2022-10-05 08:59:39', '2022-10-05 08:59:39'),
(904, NULL, 'Customer', 21, 'Payment', 500000.00, 'pembayaran pencabutan verifikasi erik', '2022-10-05', 72, 370, 'Pendapatan Jasa', '2022-10-05 09:00:25', '2022-10-05 09:00:25'),
(905, NULL, 'Customer', 22, 'Payment', 52000.00, 'uang legalisir', '2022-10-07', 72, 371, 'Pendapatan Lain', '2022-10-07 02:00:22', '2022-10-07 02:00:22'),
(907, NULL, 'Vender', 22, 'Payment', 63000.00, 'yakult', '2022-10-07', 72, 452, 'konsumsi', '2022-10-07 02:04:06', '2022-10-07 02:04:06'),
(908, NULL, 'Vender', 22, 'Payment', 25000.00, 'bensin salma', '2022-09-12', 72, 453, 'Transport', '2022-10-07 02:42:15', '2022-10-07 02:42:15'),
(909, NULL, 'Vender', 22, 'Payment', 50000.00, 'bayar sps ht', '2022-09-12', 72, 454, 'PNBP', '2022-10-07 02:42:50', '2022-10-07 02:42:50'),
(910, NULL, 'Vender', 22, 'Payment', 955000.00, 'sps iftah dan timo', '2022-10-07', 72, 455, 'PNBP', '2022-10-07 06:56:22', '2022-10-07 06:56:22'),
(911, NULL, 'Vender', 22, 'Payment', 79000.00, 'beli galon', '2022-10-07', 72, 456, 'konsumsi', '2022-10-07 06:57:10', '2022-10-07 06:57:10'),
(912, NULL, 'Vender', 22, 'Payment', 150000.00, 'salma tempel bpn', '2022-10-07', 72, 457, 'Biaya Entertain', '2022-10-07 06:57:36', '2022-10-07 06:57:36'),
(913, NULL, 'Vender', 22, 'Payment', 4000.00, 'parkir bfi suko + bfi waru', '2022-10-07', 72, 458, 'Transport', '2022-10-07 06:58:06', '2022-10-07 06:58:06'),
(914, NULL, 'Vender', 22, 'Payment', 50000.00, 'bensin bfi dan bpn andre', '2022-10-07', 72, 459, 'Transport', '2022-10-07 06:58:30', '2022-10-07 06:58:30'),
(915, NULL, 'Vender', 22, 'Payment', 25000.00, 'bensin bfi', '2022-10-07', 72, 460, 'Transport', '2022-10-07 06:58:50', '2022-10-07 06:58:50'),
(916, NULL, 'Vender', 21, 'Payment', 600000.00, 'token listrik', '2022-09-26', 72, 461, 'Utilitas', '2022-10-10 07:03:03', '2022-10-10 07:03:03'),
(917, NULL, 'Vender', 21, 'Payment', 575000.00, 'bpjs', '2022-09-26', 72, 462, 'Utilitas', '2022-10-10 07:03:46', '2022-10-10 07:03:46'),
(918, NULL, 'Vender', 21, 'Payment', 350000.00, 'bpjs juli', '2022-07-09', 72, 463, 'Utilitas', '2022-10-10 07:04:51', '2022-10-12 02:22:47'),
(921, NULL, 'Vender', 25, 'Payment', 100000.00, 'Biaya Gaji Dewi Anggraeni', '2022-11-07', 83, 465, 'Gaji', '2022-11-07 13:37:19', '2022-11-10 13:47:18'),
(922, 23, 'Customer', 13, 'Payment', 126000.00, 'Transaksi tgl 31 Okt - 06 Nov', '2022-11-07', 51, 373, 'Sistem Try Out', '2022-11-08 10:39:32', '2022-11-08 10:39:32'),
(923, NULL, 'Customer', 18, 'Payment', 9000000.00, 'Hutang Operasional Server (Tarmizi)', '2022-06-23', 51, 374, 'Hutang', '2022-11-09 19:42:31', '2022-11-09 19:42:31'),
(924, NULL, 'Customer', 18, 'Payment', 3000000.00, 'Hutang Operasional Server (alfin)', '2022-11-10', 51, 375, 'Hutang', '2022-11-09 19:43:23', '2022-11-09 19:43:23'),
(925, NULL, 'Vender', 18, 'Payment', 1851412.00, 'AWS', '2022-06-24', 51, 466, 'Utilitas', '2022-11-09 19:45:06', '2022-11-09 19:45:06'),
(926, NULL, 'Vender', 18, 'Payment', 8466046.00, 'AWS', '2022-06-25', 51, 467, 'Utilitas', '2022-11-09 19:46:15', '2022-11-09 19:46:15'),
(927, NULL, 'Vender', 18, 'Payment', 1539752.00, 'Server SSD Nodes', '2022-08-29', 51, 468, 'Utilitas', '2022-11-09 19:49:06', '2022-11-09 19:49:06'),
(928, NULL, 'Vender', 18, 'Payment', 500000.00, 'Pelunasan Hutang Alfin tahap 1', '2022-07-15', 51, 469, 'Pembayaran Hutang', '2022-11-09 20:03:12', '2022-11-09 20:03:12'),
(929, NULL, 'Vender', 18, 'Payment', 500000.00, 'Pelunasan Hutang Alfin Tahap 3', '2022-07-30', 51, 470, 'Pembayaran Hutang', '2022-11-09 20:04:15', '2022-11-09 20:05:37'),
(930, NULL, 'Vender', 18, 'Payment', 500000.00, 'Pelunasan Hutang Alfin Tahap 2', '2022-07-25', 51, 471, 'Pembayaran Hutang', '2022-11-09 20:05:28', '2022-11-09 20:05:28'),
(932, 23, 'Customer', 18, 'Partial', 2470000.00, '', '2022-11-05', 51, 90, 'Invoice', '2022-11-09 20:07:46', '2022-11-09 20:07:46'),
(933, NULL, 'Vender', 14, 'Payment', 2500000.00, '', '2022-11-06', 38, 472, 'Gaji', '2022-11-09 20:33:21', '2022-11-09 20:33:21'),
(934, NULL, 'Vender', 14, 'Payment', 5000000.00, 'Untuk Bulan september dan oktober', '2022-11-06', 38, 473, 'Gaji', '2022-11-09 20:34:27', '2022-11-09 20:34:41'),
(935, NULL, 'Vender', 14, 'Payment', 350000.00, 'Gaji Wira - 1 Minggu', '2022-11-06', 38, 474, 'Gaji', '2022-11-09 20:35:29', '2022-11-09 20:36:30'),
(936, NULL, 'Vender', 14, 'Payment', 1400000.00, 'Kevin - Probation', '2022-11-06', 38, 475, 'Gaji', '2022-11-09 20:36:22', '2022-11-09 20:36:22'),
(937, NULL, 'Vender', 14, 'Payment', 2500000.00, '', '2022-10-04', 38, 476, 'Gaji', '2022-11-09 20:38:46', '2022-11-09 20:38:46'),
(938, NULL, 'Customer', 10, 'Payment', 18500000.00, 'Untuk Beli Macbook', '2022-03-28', 38, 376, 'Hutang', '2022-11-09 21:00:36', '2022-11-09 21:00:36'),
(939, NULL, 'Customer', 10, 'Payment', 18500000.00, 'Untuk Beli Macbook Alfin', '2022-04-11', 38, 377, 'Hutang', '2022-11-09 21:02:14', '2022-11-09 21:02:14'),
(940, 65, 'Customer', 14, 'Payment', 10000000.00, 'DP ke 1', '2022-09-23', 38, 378, 'Naikin', '2022-11-10 03:26:15', '2022-11-10 03:26:15'),
(941, 65, 'Customer', 14, 'Payment', 10000000.00, 'DP ke 2', '2022-10-31', 38, 379, 'Naikin', '2022-11-10 03:27:31', '2022-11-10 03:27:31'),
(942, NULL, 'Customer', 14, 'Payment', 10000000.00, 'Pembuatan Goquran', '2022-09-23', 38, 380, 'Nahini', '2022-11-10 03:35:24', '2022-11-10 03:35:24'),
(943, NULL, 'Vender', 14, 'Payment', 3000000.00, 'alfin', '2022-09-02', 38, 477, 'Gaji', '2022-11-10 04:31:00', '2022-11-10 04:31:00'),
(944, NULL, 'Vender', 14, 'Payment', 3000000.00, 'tarmi', '2022-09-02', 38, 478, 'Gaji', '2022-11-10 04:32:17', '2022-11-10 04:32:17'),
(945, NULL, 'Vender', 14, 'Payment', 2000000.00, 'dlomiri', '2022-09-02', 38, 479, 'Gaji', '2022-11-10 04:33:06', '2022-11-10 04:33:06'),
(946, NULL, 'Vender', 10, 'Payment', 18500000.00, 'beli macbook', '2022-03-29', 38, 480, 'Pembelian Asset', '2022-11-10 04:36:11', '2022-11-10 04:36:11'),
(947, NULL, 'Vender', 10, 'Payment', 18500000.00, 'beli macbook', '2022-04-13', 38, 481, 'Pembelian Asset', '2022-11-10 04:36:56', '2022-11-10 04:36:56'),
(948, NULL, 'Vender', 14, 'Payment', 2000000.00, 'tarmi', '2022-08-02', 38, 482, 'Gaji', '2022-11-10 07:48:27', '2022-11-10 07:48:27'),
(949, NULL, 'Vender', 14, 'Payment', 3000000.00, 'Alfin', '2022-08-02', 38, 483, 'Gaji', '2022-11-10 07:49:04', '2022-11-10 07:49:04'),
(950, NULL, 'Vender', 14, 'Payment', 2000000.00, 'Dlomiri', '2022-08-02', 38, 484, 'Gaji', '2022-11-10 07:49:45', '2022-11-10 07:49:45'),
(951, NULL, 'Vender', 25, 'Payment', 1080700.00, 'Beli Mesin Kopi Espresso + Ongkir', '2022-11-10', 83, 485, 'Peralatan', '2022-11-10 13:33:33', '2023-01-06 10:52:57'),
(952, NULL, 'Vender', 18, 'Payment', 300000.00, 'Biaya Gaji Setyo Wahyu Trianto', '2022-11-10', 51, 486, 'Gaji', '2022-11-10 13:35:36', '2022-11-10 13:35:36'),
(953, NULL, 'Customer', 13, 'Payment', 130000.00, 'Transaksi Tgl 07 - 13 Nov 2022', '2022-11-14', 51, 381, 'Sistem Try Out', '2022-11-14 07:10:20', '2022-11-14 07:10:20'),
(954, NULL, 'Vender', 25, 'Payment', 1000000.00, 'Beli Meja', '2022-11-13', 83, 487, 'Perlengkapan', '2022-11-14 07:57:42', '2023-01-06 10:52:41'),
(955, NULL, 'Customer', 10, 'Payment', 2047000.00, 'DP SMP Tanggulangin 1 3jt dikurangi biaya vendor foto 953.000', '2022-07-26', 38, 382, 'Presentee', '2022-11-16 14:42:30', '2022-11-16 14:42:30'),
(956, NULL, 'Customer', 10, 'Payment', 8000000.00, 'Pembayaran ke 2 SMP Tanggulangin, 10JT Untuk mas rohman 2JT', '2022-10-05', 38, 383, 'Presentee', '2022-11-16 14:52:06', '2022-11-16 14:52:06'),
(957, NULL, 'Vender', 10, 'Payment', 512400.00, '', '2022-10-05', 38, 488, 'Pembelian Stok Barang', '2022-11-16 14:56:35', '2022-11-16 14:56:35'),
(958, NULL, 'Vender', 10, 'Payment', 599500.00, '', '2022-10-05', 38, 489, 'Pembelian Stok Barang', '2022-11-16 14:57:08', '2022-11-16 14:57:08'),
(959, NULL, 'Vender', 10, 'Payment', 31200.00, '', '2022-10-06', 38, 490, 'Pembelian Stok Barang', '2022-11-16 14:57:49', '2022-11-16 14:57:49'),
(960, NULL, 'Vender', 10, 'Payment', 1636000.00, '', '2022-10-06', 38, 491, 'Pembelian Stok Barang', '2022-11-16 14:58:28', '2022-11-16 14:58:28'),
(961, NULL, 'Vender', 10, 'Payment', 60360.00, '', '2022-10-06', 38, 492, 'Pembelian Stok Barang', '2022-11-16 14:58:58', '2022-11-16 14:58:58'),
(962, NULL, 'Vender', 14, 'Payment', 3000000.00, 'Alfin', '2022-05-02', 38, 493, 'Gaji', '2022-11-16 15:20:29', '2022-11-16 15:20:29'),
(963, NULL, 'Vender', 14, 'Payment', 2000000.00, 'Tarmi', '2022-05-02', 38, 494, 'Gaji', '2022-11-16 15:21:06', '2022-11-16 15:21:06'),
(964, NULL, 'Vender', 14, 'Payment', 2000000.00, 'Dlomiri', '2022-05-02', 38, 495, 'Gaji', '2022-11-16 15:21:41', '2022-11-16 15:21:41'),
(965, NULL, 'Vender', 14, 'Payment', 2000000.00, 'Tarmi', '2022-06-11', 38, 496, 'Gaji', '2022-11-16 15:23:32', '2022-11-16 15:23:32'),
(966, NULL, 'Vender', 10, 'Payment', 2000000.00, 'Dlomiri', '2022-06-11', 38, 497, 'Gaji', '2022-11-16 15:28:39', '2022-11-16 15:28:39'),
(967, NULL, 'Vender', 10, 'Payment', 3000000.00, 'Alfin', '2022-06-11', 38, 498, 'Gaji', '2022-11-16 15:29:02', '2022-11-16 15:29:02'),
(968, NULL, 'Vender', 14, 'Payment', 2000000.00, 'Dlomiri', '2022-07-05', 38, 499, 'Gaji', '2022-11-16 15:40:00', '2022-11-16 15:40:00'),
(969, NULL, 'Vender', 14, 'Payment', 2000000.00, 'tarmi', '2022-07-05', 38, 500, 'Gaji', '2022-11-16 15:40:36', '2022-11-16 15:40:36'),
(970, NULL, 'Vender', 14, 'Payment', 3000000.00, 'alfin', '2022-07-05', 38, 501, 'Gaji', '2022-11-16 15:41:06', '2022-11-16 15:41:06'),
(971, NULL, 'Vender', 10, 'Payment', 168299.00, 'Domain Kazhier', '2022-11-17', 38, 502, 'Utilitas', '2022-11-17 01:27:54', '2022-11-17 01:27:54'),
(972, NULL, 'Vender', 26, 'Payment', 750000.00, 'Tanam Jagung', '2022-10-30', 84, 503, 'Pengeluaran Jagung', '2022-11-18 18:23:22', '2022-11-18 18:23:22'),
(973, NULL, 'Vender', 26, 'Payment', 595000.00, 'perawatan', '2022-11-15', 84, 504, 'Pengeluaran Jagung', '2022-11-18 18:30:34', '2022-11-18 18:30:34'),
(974, NULL, 'Vender', 26, 'Payment', 825000.00, 'perawatan cabai kebun 1', '2022-11-15', 84, 505, 'Pengeluaran Cabai', '2022-11-18 18:31:03', '2023-02-07 17:05:49'),
(975, NULL, 'Vender', 26, 'Payment', 480000.00, 'penanaman padi sawah 1', '2022-11-15', 84, 506, 'Pengeluaran Padi', '2022-11-18 18:31:45', '2023-02-07 16:45:39'),
(976, NULL, 'Vender', 26, 'Payment', 450000.00, 'penanaman cabai kebun 1', '2022-10-30', 84, 507, 'Pengeluaran Cabai', '2022-11-18 18:32:32', '2023-02-07 17:06:24'),
(977, 23, 'Customer', 13, 'Payment', 80000.00, 'Transaksi Tgl 14 - 20 Nov 2022', '2022-11-21', 51, 384, 'Sistem Try Out', '2022-11-21 08:24:11', '2022-11-21 08:24:11'),
(978, NULL, 'Vender', 25, 'Payment', 174580.00, 'Beli Milk Jug Kopi, Espresso Shot Glass, Toso Vietnam Drip Sekrup (Saringan Kopi) + Biaya Layanan Jasa Aplikasi', '2022-11-18', 83, 508, 'Peralatan', '2022-11-21 13:20:17', '2023-01-06 10:51:34'),
(979, NULL, 'Vender', 25, 'Payment', 273769.00, 'Beli Bubuk Cokelat, Bubuk Cheese, Ginger Syrup, Wijen Hitam Panggang', '2022-11-15', 83, 509, 'Bahan Baku', '2022-11-21 13:29:32', '2023-01-06 10:52:23'),
(980, NULL, 'Vender', 25, 'Payment', 155000.00, 'Beli LCD Touchscreen Xiaomi Redmi 5+', '2022-11-17', 83, 510, 'Biaya Lain-lain', '2022-11-21 13:42:54', '2023-01-06 10:52:09'),
(981, NULL, 'Vender', 25, 'Payment', 70400.00, 'Beli TW Milk Frother Electric Hand Mixer', '2022-11-18', 83, 511, 'Peralatan', '2022-11-22 17:29:24', '2023-01-06 10:51:55'),
(982, NULL, 'Vender', 25, 'Payment', 62900.00, 'Beli Tamping Mat Silicon, Kantong Kopi Teh Celup 2x100 Pcs, + Biaya Asuransi Pengiriman', '2022-11-19', 83, 512, 'Perlengkapan', '2022-11-22 17:38:38', '2023-01-06 10:50:59'),
(983, NULL, 'Vender', 25, 'Payment', 70900.00, 'Beli Kantong Plastik Gelas 4pcs, Sedotan Plastik 2x300pcs, Gelas Plastik 2pcs.', '2022-11-19', 83, 513, 'Perlengkapan', '2022-11-22 17:43:25', '2023-01-06 10:51:14'),
(984, NULL, 'Vender', 18, 'Payment', 112040.00, 'domain kejarpppk', '2022-10-05', 51, 514, 'Utilitas', '2022-11-23 21:40:54', '2022-11-23 21:40:54'),
(985, NULL, 'Vender', 18, 'Payment', 133015.00, 'domain kejardikdin', '2022-11-23', 51, 515, 'Utilitas', '2022-11-23 21:42:24', '2022-11-23 21:42:24'),
(986, NULL, 'Vender', 26, 'Payment', 120000.00, 'pupuk', '2022-11-26', 84, 516, 'Pengeluaran Cabai', '2022-11-26 16:49:41', '2022-11-26 16:49:41'),
(987, NULL, 'Vender', 26, 'Payment', 240000.00, 'cabut rumput cabai kebun 1', '2022-11-26', 84, 517, 'Pengeluaran Cabai', '2022-11-26 16:50:30', '2023-02-07 17:05:07'),
(988, 23, 'Customer', 13, 'Payment', 156000.00, 'Transaksi Tgl 21 - 27 Nov 2022', '2022-11-28', 51, 385, 'Sistem Try Out', '2022-11-28 08:48:25', '2022-11-28 08:48:25'),
(989, 23, 'Customer', 13, 'Partial', 818000.00, 'Dibayar pada tanggal 05 Desember 2022 pukul 10:36', '2022-12-05', 51, 91, 'Invoice', '2022-12-05 04:06:18', '2022-12-05 04:06:18'),
(990, 23, 'Customer', 13, 'Payment', 146000.00, 'Transaksi Tgl 27 Nov - 04 Des 2022', '2022-12-05', 51, 386, 'Sistem Try Out', '2022-12-05 04:35:18', '2022-12-05 04:35:18'),
(991, 23, 'Customer', 13, 'Payment', 22000.00, 'Transaksi Tgl 05 - 11 Des 2022', '2022-12-12', 51, 387, 'Sistem Try Out', '2022-12-12 08:09:06', '2022-12-12 08:09:06'),
(992, NULL, 'Vender', 25, 'Payment', 500000.00, 'Biaya Gaji Dewi Anggraeni', '2022-12-06', 83, 518, 'Biaya Gaji', '2022-12-12 12:05:40', '2022-12-12 12:05:40'),
(993, NULL, 'Vender', 13, 'Payment', 1200000.00, 'Biaya Gaji Setyo Wahyu Trianto', '2022-12-06', 51, 519, 'Gaji', '2022-12-12 12:07:49', '2022-12-12 12:07:49'),
(994, NULL, 'Vender', 25, 'Payment', 320005.00, 'Makan di Royal', '2022-11-19', 83, 520, 'Prive', '2022-12-12 12:23:20', '2022-12-12 12:23:41'),
(995, 23, 'Customer', 13, 'Payment', 10000.00, 'Transaksi Tgl 12 - 18 Des 2022', '2022-12-19', 51, 388, 'Sistem Try Out', '2022-12-19 09:07:26', '2022-12-19 09:07:26'),
(996, NULL, 'Customer', 27, 'Payment', 3000.00, '', '2023-01-02', 85, 389, 'Penjualan', '2023-01-02 13:19:54', '2023-01-02 13:19:54'),
(997, NULL, 'Vender', 27, 'Payment', 1500.00, '', '2023-01-02', 85, 521, 'Biaya Dana', '2023-01-02 13:20:41', '2023-01-02 13:20:41'),
(998, NULL, 'Vender', 25, 'Payment', 16500.00, 'Cetak Stiker Bontak A3', '2022-12-28', 83, 522, 'Biaya Promosi', '2023-01-06 10:31:53', '2023-01-06 10:31:53'),
(999, NULL, 'Vender', 25, 'Payment', 40000.00, 'Beli Ob Stop Kontak 4L Uticon, Steker Amasco, Obeng', '2022-12-20', 83, 523, 'Peralatan', '2023-01-06 10:50:15', '2023-01-06 10:50:15'),
(1000, NULL, 'Vender', 25, 'Payment', 19000.00, 'Beli Karton Linen', '2022-12-21', 83, 524, 'Perlengkapan', '2023-01-06 10:57:35', '2023-01-06 10:57:35'),
(1001, NULL, 'Vender', 25, 'Payment', 11517.00, 'Beli Lemon', '2022-12-21', 83, 525, 'Prive', '2023-01-06 12:27:05', '2023-01-06 12:27:05'),
(1002, NULL, 'Vender', 25, 'Payment', 167000.00, 'Beli Dispenser Tape, Isolasi, Crayon, Balon, Gabus', '2022-12-28', 83, 526, 'Perlengkapan', '2023-01-06 12:32:04', '2023-01-12 08:53:58'),
(1003, NULL, 'Vender', 25, 'Payment', 21000.00, 'Beli Susu Ultra UHT 1L', '2022-12-20', 83, 527, 'Bahan Baku', '2023-01-06 12:34:39', '2023-01-12 09:04:33'),
(1004, NULL, 'Customer', 13, 'Payment', 2000.00, 'Transaksi Tgl 02 - 08 Jan 2023', '2023-01-09', 51, 390, 'Sistem Try Out', '2023-01-09 10:59:03', '2023-01-09 10:59:03'),
(1005, NULL, 'Customer', 27, 'Payment', 61000.00, '', '2023-01-09', 85, 391, 'Penjualan', '2023-01-09 14:08:52', '2023-01-09 14:08:52'),
(1006, NULL, 'Vender', 27, 'Payment', 1000.00, '', '2023-01-09', 85, 528, 'Biaya Dana', '2023-01-09 14:11:06', '2023-01-09 14:11:06'),
(1007, NULL, 'Vender', 25, 'Payment', 57500.00, 'Beli Tripod Stand Banner Display', '2022-12-26', 83, 529, 'Perlengkapan', '2023-01-12 08:49:17', '2023-01-12 08:49:17'),
(1008, NULL, 'Vender', 25, 'Payment', 48000.00, 'Beli Sedotan Pipih Kopi', '2022-12-26', 83, 530, 'Perlengkapan', '2023-01-12 08:53:14', '2023-01-12 08:53:47'),
(1009, NULL, 'Vender', 25, 'Payment', 261500.00, 'Beli Cash Drawer Laci Kasir', '2022-12-21', 83, 531, 'Peralatan', '2023-01-12 08:57:04', '2023-01-12 08:57:04'),
(1010, NULL, 'Vender', 25, 'Payment', 25999.00, 'Beli Gula Aren Cair 1Kg', '2022-12-20', 83, 532, 'Bahan Baku', '2023-01-12 09:00:22', '2023-01-12 09:00:22'),
(1011, NULL, 'Vender', 25, 'Payment', 15700.00, 'Beli Susu Kental Manis Putih FF', '2023-01-03', 83, 533, 'Bahan Baku', '2023-01-12 09:03:01', '2023-01-12 09:03:01'),
(1013, NULL, 'Vender', 25, 'Payment', 8000.00, 'Beli Jahe Merah AMH 5 Sachet', '2023-01-10', 83, 535, 'Bahan Baku', '2023-01-12 09:12:24', '2023-01-12 09:12:24'),
(1015, NULL, 'Customer', 27, 'Payment', 50000.00, '', '2023-01-16', 85, 393, 'Penjualan', '2023-01-24 03:45:03', '2023-01-24 03:45:03'),
(1016, NULL, 'Customer', 27, 'Payment', 56000.00, '', '2023-01-23', 85, 394, 'Penjualan', '2023-01-24 03:46:33', '2023-01-24 03:46:33'),
(1017, NULL, 'Vender', 27, 'Payment', 10000.00, 'es batu 2 bungkus', '2023-01-13', 85, 536, 'Bahan Baku', '2023-01-24 03:48:52', '2023-01-24 03:48:52'),
(1018, NULL, 'Vender', 27, 'Payment', 28600.00, 'gelas panas 1 slop', '2023-01-16', 85, 537, 'Beli Kemasan', '2023-01-24 04:02:44', '2023-01-24 04:02:58'),
(1019, NULL, 'Vender', 27, 'Payment', 44750.00, '2 slop gelas plastik', '2023-01-16', 85, 538, 'Beli Kemasan', '2023-01-24 04:03:46', '2023-01-24 04:03:46'),
(1020, NULL, 'Vender', 27, 'Payment', 10000.00, 'galon', '2023-01-20', 85, 539, 'Bahan Baku', '2023-01-24 04:07:44', '2023-01-24 04:07:44'),
(1021, NULL, 'Vender', 25, 'Payment', 13000.00, 'Beli Label Florsc T&J', '2023-01-13', 83, 540, 'Perlengkapan', '2023-01-30 09:48:52', '2023-01-30 09:48:52'),
(1023, NULL, 'Vender', 29, 'Payment', 33200.00, 'Beli Biji Kopi Exelco Robst', '2023-01-21', 83, 542, 'Bahan Baku', '2023-01-30 09:57:46', '2023-01-30 09:57:46'),
(1024, NULL, 'Vender', 29, 'Payment', 16800.00, 'Biaya Bensin Ari', '2023-01-21', 83, 543, 'Biaya Transportasi', '2023-01-30 09:59:18', '2023-01-30 09:59:18'),
(1025, NULL, 'Vender', 25, 'Payment', 15000.00, 'Beli Samosa', '2023-01-22', 83, 544, 'Bahan Baku', '2023-01-30 10:03:16', '2023-01-30 10:03:16'),
(1026, NULL, 'Vender', 25, 'Payment', 60000.00, 'Beli Apple Pie dan Samosa', '2023-01-22', 83, 545, 'Bahan Baku', '2023-01-30 10:05:40', '2023-01-30 10:05:40'),
(1027, NULL, 'Vender', 25, 'Payment', 27900.00, 'Beli Kertas Box Kemasan Makanan', '2023-01-22', 83, 546, 'Biaya Kemasan', '2023-01-30 10:09:41', '2023-01-30 10:09:41'),
(1028, NULL, 'Vender', 25, 'Payment', 28300.00, 'Beli Kantong Kertas Kentang Goreng', '2023-01-17', 83, 547, 'Biaya Kemasan', '2023-01-30 10:13:24', '2023-01-30 10:13:24'),
(1029, NULL, 'Vender', 25, 'Payment', 28000.00, 'Beli Sosis Jumbo', '2023-01-17', 83, 548, 'Bahan Baku', '2023-01-30 10:16:23', '2023-01-30 10:16:23'),
(1030, NULL, 'Vender', 25, 'Payment', 28300.00, 'Beli Gula Cair', '2023-01-17', 83, 549, 'Bahan Baku', '2023-01-30 10:18:42', '2023-01-30 10:18:42'),
(1031, NULL, 'Vender', 25, 'Payment', 31000.00, 'Beli Infraboard Putih', '2023-01-17', 83, 550, 'Perlengkapan', '2023-01-30 10:21:12', '2023-01-30 10:21:12'),
(1032, NULL, 'Vender', 25, 'Payment', 19000.00, 'Beli Susu Ultra UHT 1L', '2023-01-25', 83, 551, 'Bahan Baku', '2023-01-30 10:27:01', '2023-01-30 10:27:01'),
(1033, NULL, 'Vender', 25, 'Payment', 7500.00, 'Beli You C1000 Drink', '2023-01-25', 83, 552, 'Prive', '2023-01-30 10:28:06', '2023-01-30 10:28:06'),
(1034, NULL, 'Customer', 27, 'Payment', 48000.00, '', '2023-01-30', 85, 395, 'Penjualan', '2023-01-31 18:16:03', '2023-01-31 18:16:03'),
(1035, NULL, 'Customer', 13, 'Payment', 2000.00, 'Transaksi Tgl 09 - 15 Jan 2023', '2023-01-16', 51, 396, 'Sistem Try Out', '2023-02-02 09:20:55', '2023-02-02 09:20:55'),
(1046, NULL, 'Customer', 31, 'Payment', 30000.00, 'Pendapatan Tgl 26 Des 2022 - 01 Jan 2023', '2023-02-06', 83, 402, 'Penjualan', '2023-02-06 05:35:59', '2023-02-06 05:35:59'),
(1047, NULL, 'Customer', 31, 'Payment', 57000.00, 'Pendapatan Tgl 02 - 08 Januari 2023', '2023-01-11', 83, 403, 'Penjualan', '2023-02-06 05:37:37', '2023-02-06 05:37:37'),
(1048, NULL, 'Customer', 31, 'Payment', 32000.00, 'Pendapatan Tgl 09 - 15 Januari 2023', '2023-01-16', 83, 404, 'Penjualan', '2023-02-06 05:38:16', '2023-02-06 05:38:16'),
(1049, NULL, 'Vender', 31, 'Payment', 19000.00, 'Beli Susu Ultra UHT 1L', '2023-01-04', 83, 558, 'Bahan Baku', '2023-02-06 05:39:00', '2023-02-07 07:58:19'),
(1050, NULL, 'Vender', 31, 'Payment', 108000.00, 'Bayar Listrik', '2023-01-17', 83, 559, 'Biaya Listrik & Air', '2023-02-06 05:40:12', '2023-02-06 05:41:45'),
(1051, NULL, 'Vender', 25, 'Payment', 90000.00, 'Beli Samosa, Apple Pie, Donat', '2023-01-31', 83, 560, 'Bahan Baku', '2023-02-06 08:34:31', '2023-02-06 08:34:31'),
(1052, NULL, 'Vender', 25, 'Payment', 30000.00, 'Beli Samosa', '2023-02-02', 83, 561, 'Bahan Baku', '2023-02-06 08:36:32', '2023-02-06 08:36:32'),
(1053, NULL, 'Vender', 31, 'Payment', 66600.00, 'Beli SKM Frisian, Susu Ultra 1L, Kopi Exelco', '2023-02-04', 83, 562, 'Bahan Baku', '2023-02-06 08:40:25', '2023-02-06 08:48:48'),
(1054, NULL, 'Vender', 25, 'Payment', 96000.00, 'Beli Makanan + Minuman Frontage Coffee', '2022-12-31', 83, 563, 'Prive', '2023-02-06 09:00:20', '2023-02-06 09:00:20'),
(1055, NULL, 'Vender', 29, 'Payment', 62500.00, 'Bayar Kasir Pintar', '2023-01-27', 83, 564, 'Biaya Utilitas', '2023-02-06 09:02:32', '2023-02-06 09:02:32'),
(1056, NULL, 'Vender', 31, 'Payment', 700000.00, 'Bayar Gaji Pegawai', '2023-02-06', 83, 565, 'Biaya Gaji', '2023-02-06 09:27:50', '2023-02-06 09:27:50'),
(1057, NULL, 'Vender', 27, 'Payment', 50400.00, 'Resin', '2023-02-01', 85, 566, 'Perawatan Tempat', '2023-02-07 07:06:49', '2023-02-07 07:06:49'),
(1058, NULL, 'Customer', 27, 'Payment', 43000.00, '', '2023-02-06', 85, 405, 'Penjualan', '2023-02-07 10:52:38', '2023-02-07 10:52:38'),
(1059, NULL, 'Vender', 27, 'Payment', 5000.00, 'air galon', '2023-02-03', 85, 567, 'Bahan Baku', '2023-02-07 10:55:29', '2023-02-07 10:55:29'),
(1060, NULL, 'Vender', 27, 'Payment', 9674.00, 'Dana', '2023-02-06', 85, 568, 'Biaya Dana', '2023-02-07 10:57:15', '2023-02-07 10:57:15'),
(1061, NULL, 'Vender', 27, 'Payment', 12319.00, 'dana', '2023-01-31', 85, 569, 'Biaya Dana', '2023-02-07 11:03:13', '2023-02-07 11:03:13'),
(1062, NULL, 'Vender', 26, 'Payment', 1029000.00, 'Perawatan Padi sawah 2', '2023-01-24', 84, 570, 'Pengeluaran Padi', '2023-02-07 16:32:51', '2023-02-07 16:32:51'),
(1063, NULL, 'Vender', 26, 'Payment', 820000.00, 'Perawatan padi sawah 2', '2022-12-27', 84, 571, 'Pengeluaran Padi', '2023-02-07 16:33:42', '2023-02-07 16:33:42'),
(1064, NULL, 'Vender', 26, 'Payment', 965000.00, 'Perawatan padi sawah 1', '2022-12-15', 84, 572, 'Pengeluaran Padi', '2023-02-07 16:46:53', '2023-02-07 16:46:53'),
(1065, NULL, 'Customer', 26, 'Payment', 2500000.00, 'Penjualan jagung', '2023-01-25', 84, 406, 'Penjualan Jagung', '2023-02-07 16:48:01', '2023-02-07 16:48:01'),
(1066, NULL, 'Customer', 26, 'Payment', 200000.00, 'Cabai 9kg', '2023-02-03', 84, 407, 'Penjualan Cabai', '2023-02-07 16:49:28', '2023-02-07 16:49:28'),
(1067, NULL, 'Vender', 26, 'Payment', 460000.00, 'Perawatan cabe kebun 1', '2023-01-29', 84, 573, 'Pengeluaran Cabai', '2023-02-07 16:59:20', '2023-02-07 16:59:20'),
(1068, NULL, 'Vender', 26, 'Payment', 450000.00, 'penanaman cabai kebun 2', '2023-02-05', 84, 574, 'Pengeluaran Cabai', '2023-02-07 17:04:05', '2023-02-07 17:04:05'),
(1069, NULL, 'Vender', 26, 'Payment', 1400000.00, 'Perawatan Padi sawah 1', '2023-01-15', 84, 575, 'Pengeluaran Padi', '2023-02-07 18:07:13', '2023-02-07 18:07:13'),
(1070, NULL, 'Vender', 25, 'Payment', 500000.00, 'Biaya Gaji Dewi Rp500.000', '2023-02-06', 83, 576, 'Biaya Gaji', '2023-02-13 09:46:49', '2023-02-13 09:46:49'),
(1071, NULL, 'Vender', 25, 'Payment', 6900.00, 'Beli Jahe Merah AMH', '2023-02-07', 83, 577, 'Bahan Baku', '2023-02-13 09:51:17', '2023-02-13 09:51:17'),
(1072, NULL, 'Vender', 25, 'Payment', 30000.00, 'Duplikat Kunci 2', '2023-02-07', 83, 578, 'Biaya Lain-lain', '2023-02-13 09:55:24', '2023-02-13 09:55:24'),
(1073, 76, 'Customer', 32, 'Payment', 700000.00, '', '2023-03-01', 86, 408, 'Penambahan Modal', '2023-03-01 14:16:51', '2023-03-01 14:16:51'),
(1074, 17, 'Vender', 32, 'Payment', 1600000.00, '', '2023-03-01', 86, 579, 'Pembelian Bahan Baku', '2023-03-01 14:19:56', '2023-03-01 14:19:56'),
(1075, 76, 'Customer', 32, 'Payment', 1600000.00, '', '2023-03-01', 86, 409, 'Penjualan', '2023-03-01 15:27:47', '2023-03-01 15:27:47'),
(1076, 75, 'Customer', 34, 'Payment', 100000.00, '', '2023-03-02', 86, 410, 'Penjualan', '2023-03-01 18:09:04', '2023-03-01 18:09:04'),
(1077, 75, 'Customer', 33, 'Payment', 20000.00, '', '2023-03-02', 86, 411, 'Penjualan', '2023-03-01 18:09:34', '2023-03-01 18:09:34'),
(1078, 76, 'Customer', 33, 'Payment', 700000.00, '', '2023-03-02', 86, 412, 'Penambahan Modal', '2023-03-01 18:09:59', '2023-03-01 18:09:59'),
(1079, 75, 'Customer', 33, 'Payment', 100000.00, '', '2023-03-02', 86, 413, 'Pinjaman', '2023-03-01 18:11:11', '2023-03-01 18:11:11'),
(1080, 76, 'Customer', 33, 'Payment', 700000.00, '', '2023-03-02', 86, 414, 'Piutang', '2023-03-01 18:11:38', '2023-03-01 18:11:38'),
(1081, 75, 'Customer', 33, 'Payment', 1600000.00, '', '2023-03-04', 86, 415, 'Pendapatan Lain', '2023-03-04 12:09:10', '2023-03-04 12:09:10'),
(1082, 76, 'Customer', 34, 'Payment', 40000.00, '', '2023-03-03', 86, 416, 'Pendapatan Lain', '2023-03-04 12:22:08', '2023-03-04 12:22:08'),
(1083, 76, 'Customer', 33, 'Payment', 600000.00, '', '2023-03-03', 86, 417, 'Piutang', '2023-03-04 12:24:08', '2023-03-04 12:24:08'),
(1084, 76, 'Customer', 32, 'Payment', 200000.00, '', '2023-03-05', 86, 418, 'Penambahan Modal', '2023-03-04 12:28:54', '2023-03-04 12:28:54'),
(1085, 76, 'Customer', 34, 'Payment', 10000.00, '', '2023-03-05', 86, 419, 'Pinjaman', '2023-03-04 12:31:08', '2023-03-04 12:31:08'),
(1086, 76, 'Customer', 33, 'Payment', 500000.00, '', '2023-03-03', 86, 420, 'Hibah', '2023-03-04 12:33:59', '2023-03-04 12:33:59'),
(1087, 76, 'Customer', 33, 'Payment', 300000.00, '', '2023-03-02', 86, 421, 'Pendapatan Lain', '2023-03-04 12:35:24', '2023-03-04 12:35:24'),
(1088, 76, 'Customer', 33, 'Payment', 10000.00, '', '2023-03-04', 86, 422, 'Penjualan', '2023-03-04 12:37:36', '2023-03-04 12:37:36'),
(1089, 75, 'Customer', 33, 'Payment', 1600000.00, '', '2023-03-02', 86, 423, 'Penambahan Modal', '2023-03-04 12:39:31', '2023-03-04 12:39:31'),
(1090, 75, 'Customer', 34, 'Payment', 700000.00, '', '2023-03-04', 86, 424, 'Pendapatan Jasa', '2023-03-04 12:40:44', '2023-03-04 12:40:44'),
(1091, 75, 'Customer', 33, 'Payment', 40000.00, '', '2023-03-05', 86, 425, 'Hibah', '2023-03-04 12:46:11', '2023-03-04 12:46:11'),
(1092, 75, 'Customer', 32, 'Payment', 100000.00, '', '2023-03-03', 86, 426, 'Pendapatan Lain', '2023-03-04 12:50:24', '2023-03-04 12:50:24'),
(1093, 75, 'Customer', 33, 'Payment', 150000.00, '', '2023-03-05', 86, 427, 'Pendapatan Lain', '2023-03-05 09:32:43', '2023-03-05 09:32:43'),
(1094, 75, 'Customer', 34, 'Payment', 45000.00, '', '2023-03-05', 86, 428, 'Pendapatan Jasa', '2023-03-05 09:34:57', '2023-03-05 09:34:57'),
(1095, 75, 'Customer', 32, 'Payment', 1600000.00, '', '2023-03-05', 86, 429, 'Penjualan', '2023-03-05 09:37:13', '2023-03-05 09:37:13'),
(1096, 75, 'Customer', 34, 'Payment', 300000.00, '', '2023-03-05', 86, 430, 'Penambahan Modal', '2023-03-05 09:39:19', '2023-03-05 09:39:19'),
(1097, 75, 'Customer', 34, 'Payment', 5000.00, '', '2023-03-05', 86, 431, 'Pendapatan Lain', '2023-03-05 10:27:03', '2023-03-05 10:27:03'),
(1098, 75, 'Customer', 32, 'Payment', 2000000.00, '', '2023-03-05', 86, 432, 'Pinjaman', '2023-03-05 10:39:51', '2023-03-05 10:39:51'),
(1099, 17, 'Vender', 32, 'Payment', 60000.00, '', '2023-03-05', 86, 580, 'Pajak', '2023-03-05 11:16:23', '2023-03-05 11:16:23'),
(1100, 17, 'Vender', 33, 'Payment', 60000.00, '', '2023-03-05', 86, 581, 'Utilitas', '2023-03-05 13:07:33', '2023-03-05 13:07:33'),
(1101, 17, 'Vender', 34, 'Payment', 100000.00, '', '2023-03-05', 86, 582, 'Bonus', '2023-03-05 13:15:32', '2023-03-05 13:15:32'),
(1102, 17, 'Vender', 32, 'Payment', 100000.00, '', '2023-03-05', 86, 583, 'Pembelian Stok Barang', '2023-03-05 13:16:40', '2023-03-05 13:16:40'),
(1103, 17, 'Vender', 33, 'Payment', 100000.00, '', '2023-03-05', 86, 584, 'Pembelian Stok Barang', '2023-03-05 13:17:14', '2023-03-05 13:17:14'),
(1104, 17, 'Vender', 33, 'Payment', 40000.00, '', '2023-03-05', 86, 585, 'Administrasi Bank', '2023-03-05 13:20:36', '2023-03-05 13:20:36'),
(1105, 17, 'Vender', 34, 'Payment', 40000.00, '', '2023-03-05', 86, 586, 'Gaji', '2023-03-05 13:28:13', '2023-03-05 13:28:13'),
(1106, 17, 'Vender', 33, 'Payment', 10000.00, '', '2023-03-05', 86, 587, 'Donasi', '2023-03-05 13:45:08', '2023-03-05 13:45:08'),
(1107, 17, 'Vender', 34, 'Payment', 700000.00, '', '2023-03-05', 86, 588, 'Pembayaran Hutang', '2023-03-05 14:02:52', '2023-03-05 14:02:52'),
(1108, 17, 'Vender', 32, 'Payment', 10000.00, '', '2023-03-04', 86, 589, 'Pengeluaran Lain-lain', '2023-03-05 14:04:28', '2023-03-05 14:04:28'),
(1109, 17, 'Vender', 33, 'Payment', 5000.00, '', '2023-03-05', 86, 590, 'Biaya Operasional', '2023-03-05 14:07:21', '2023-03-05 14:07:21');
INSERT INTO `transactions` (`id`, `user_id`, `user_type`, `account`, `type`, `amount`, `description`, `date`, `created_by`, `payment_id`, `category`, `created_at`, `updated_at`) VALUES
(1110, 17, 'Vender', 34, 'Payment', 600000.00, '', '2023-03-05', 86, 591, 'Pembelian Bahan Baku', '2023-03-05 14:12:27', '2023-03-05 14:12:27'),
(1111, 17, 'Vender', 32, 'Payment', 1600000.00, '', '2023-03-05', 86, 592, 'Pembelian Stok Barang', '2023-03-05 14:17:22', '2023-03-05 14:17:22'),
(1112, 17, 'Vender', 33, 'Payment', 10000.00, '', '2023-03-05', 86, 593, 'Pajak', '2023-03-05 14:18:11', '2023-03-05 14:18:11'),
(1113, 17, 'Vender', 33, 'Payment', 2000000.00, '', '2023-03-05', 86, 594, 'Bonus', '2023-03-05 14:18:34', '2023-03-05 14:18:34'),
(1114, 17, 'Vender', 34, 'Payment', 90000.00, '', '2023-03-05', 86, 595, 'Gaji', '2023-03-05 14:19:22', '2023-03-05 14:19:22'),
(1115, 17, 'Vender', 34, 'Payment', 850000.00, '', '2023-03-05', 86, 596, 'Pembelian Stok Barang', '2023-03-05 14:19:48', '2023-03-05 14:19:48'),
(1116, 17, 'Vender', 33, 'Payment', 600000.00, '', '2023-03-05', 86, 597, 'Pembelian Bahan Baku', '2023-03-05 14:20:26', '2023-03-05 14:20:26'),
(1117, 17, 'Vender', 32, 'Payment', 100000.00, '', '2023-03-05', 86, 598, 'Bonus', '2023-03-05 14:20:56', '2023-03-05 14:20:56'),
(1118, 17, 'Vender', 34, 'Payment', 150000.00, '', '2023-03-05', 86, 599, 'Donasi', '2023-03-05 14:21:30', '2023-03-05 14:21:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_account` int(11) NOT NULL DEFAULT 0,
  `to_account` int(11) NOT NULL DEFAULT 0,
  `amount` double(16,2) NOT NULL DEFAULT 0.00,
  `date` date NOT NULL,
  `payment_method` int(11) NOT NULL DEFAULT 0,
  `reference` varchar(255) NOT NULL DEFAULT 'nofile.svg',
  `description` text NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transfers`
--

INSERT INTO `transfers` (`id`, `from_account`, `to_account`, `amount`, `date`, `payment_method`, `reference`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 14, 10, 5000000.00, '2022-04-14', 54, 'nofile.svg', 'kas', 38, '2022-04-14 06:57:14', '2022-04-14 06:57:14'),
(2, 21, 22, 2000000.00, '2022-07-04', 143, 'nofile.svg', 'UANG MASUK', 72, '2022-07-25 05:52:29', '2022-08-03 04:24:28'),
(4, 21, 22, 2000000.00, '2022-07-15', 143, 'nofile.svg', 'uang masuk', 72, '2022-07-25 07:12:50', '2022-07-25 07:12:50'),
(6, 21, 22, 850000.00, '2022-07-19', 143, 'nofile.svg', 'uang masuk', 72, '2022-07-25 07:36:53', '2022-07-25 07:36:53'),
(7, 21, 22, 4000000.00, '2022-07-20', 143, 'nofile.svg', 'uang masuk', 72, '2022-07-25 07:37:40', '2022-07-25 07:37:40'),
(9, 21, 22, 3500000.00, '2022-07-27', 143, 'nofile.svg', 'uang masuk dari bu ajeng untuk kas', 72, '2022-07-29 08:04:16', '2022-07-29 08:04:16'),
(11, 5, 15, 5000.00, '2022-08-03', 18, 'nofile.svg', '', 27, '2022-08-03 08:33:07', '2022-08-03 08:33:07'),
(12, 21, 22, 80000.00, '2022-07-06', 143, 'nofile.svg', 'uang masuk', 72, '2022-08-04 07:25:08', '2022-08-04 07:25:08'),
(13, 23, 22, 54000.00, '2022-07-18', 144, 'nofile.svg', 'kembalian dari pembayaran pbb', 72, '2022-08-04 07:26:22', '2022-08-04 07:26:22'),
(14, 23, 22, 70000.00, '2022-07-22', 144, 'nofile.svg', 'uang materai dari bfi', 72, '2022-08-04 07:28:22', '2022-08-04 07:28:22'),
(15, 23, 22, 250000.00, '2022-07-31', 144, 'nofile.svg', 'uang masuk dari denda salma', 72, '2022-08-04 07:35:07', '2022-08-04 07:35:07'),
(16, 21, 22, 2000000.00, '2022-08-04', 143, 'nofile.svg', 'uang masuk untuk kas kecil', 72, '2022-08-08 12:05:58', '2022-08-08 12:05:58'),
(17, 21, 22, 2000000.00, '2022-08-08', 143, 'nofile.svg', 'uang masuk kekas kecil', 72, '2022-08-19 08:08:16', '2022-08-19 08:08:16'),
(18, 21, 22, 800000.00, '2022-08-12', 143, 'nofile.svg', 'uang masuk kekas kecil', 72, '2022-08-19 08:26:09', '2022-08-19 08:26:09'),
(19, 21, 22, 45000.00, '2022-08-12', 143, 'nofile.svg', 'uang masuk', 72, '2022-08-19 08:32:47', '2022-08-19 08:32:47'),
(20, 21, 22, 2000000.00, '2022-08-18', 143, 'nofile.svg', 'uang masuk kekas kecil', 72, '2022-08-19 08:42:09', '2022-08-19 08:42:09'),
(21, 21, 22, 2000000.00, '2022-08-23', 143, 'nofile.svg', 'uang masuk', 72, '2022-08-29 02:05:43', '2022-08-29 02:05:43'),
(22, 21, 22, 1000000.00, '2022-08-29', 143, 'nofile.svg', 'uang masuk', 72, '2022-09-05 01:54:10', '2022-09-05 01:54:10'),
(23, 21, 22, 200000.00, '2022-08-30', 143, 'nofile.svg', 'uang masuk', 72, '2022-09-05 01:56:52', '2022-09-05 01:56:52'),
(24, 21, 22, 100000.00, '2022-08-30', 143, 'nofile.svg', 'uang masuk', 72, '2022-09-05 01:57:20', '2022-09-05 01:57:20'),
(25, 21, 22, 1500000.00, '2022-08-30', 143, 'nofile.svg', 'uang masuk', 72, '2022-09-10 11:56:23', '2022-09-10 11:56:23'),
(27, 21, 22, 1000000.00, '2022-09-01', 143, 'nofile.svg', 'uang masuk', 72, '2022-09-10 12:08:28', '2022-09-10 12:08:28'),
(28, 23, 22, 79000.00, '2022-09-02', 144, 'nofile.svg', 'uang masuk', 72, '2022-09-10 12:10:51', '2022-09-10 12:10:51'),
(29, 21, 22, 500000.00, '2022-09-06', 143, 'nofile.svg', 'uang masuk', 72, '2022-09-10 12:27:40', '2022-09-10 12:27:40'),
(30, 21, 22, 3000000.00, '2022-09-07', 143, 'nofile.svg', 'UANG MASUK', 72, '2022-09-10 12:30:11', '2022-09-10 12:30:47'),
(31, 21, 22, 1000000.00, '2022-09-09', 143, 'nofile.svg', 'uang masuk', 72, '2022-09-10 12:50:05', '2022-09-10 12:50:05'),
(32, 23, 22, 100000.00, '2022-09-12', 144, 'nofile.svg', 'uang masuk', 72, '2022-09-12 07:49:05', '2022-09-12 07:49:05'),
(33, 21, 21, 1000000.00, '2022-09-12', 143, 'nofile.svg', 'uang masuk', 72, '2022-09-12 14:05:19', '2022-09-12 14:05:19'),
(36, 23, 22, 70000.00, '2022-09-14', 144, 'nofile.svg', 'uang masuk', 72, '2022-09-24 03:36:13', '2022-09-24 03:36:13'),
(37, 23, 22, 60000.00, '2022-09-14', 144, 'nofile.svg', 'uang masuk', 72, '2022-09-24 03:37:58', '2022-09-24 03:37:58'),
(38, 21, 22, 2000000.00, '2022-09-14', 143, 'nofile.svg', 'uang masuk', 72, '2022-09-24 03:39:55', '2022-09-24 03:39:55'),
(39, 21, 22, 2500000.00, '2022-09-21', 143, 'nofile.svg', 'uang masuk', 72, '2022-09-24 04:13:31', '2022-09-24 04:13:31'),
(40, 23, 22, 900000.00, '2022-09-27', 144, 'nofile.svg', 'uang masuk', 72, '2022-09-29 07:08:37', '2022-09-29 07:09:50'),
(41, 21, 22, 4000000.00, '2022-10-01', 143, 'nofile.svg', 'uang masuk ke kas kecil', 72, '2022-10-05 08:17:51', '2022-10-05 08:17:51'),
(42, 21, 22, 1000000.00, '2022-09-12', 143, 'nofile.svg', 'uang masuk', 72, '2022-10-07 02:08:56', '2022-10-07 02:08:56'),
(43, 22, 22, 52000.00, '2022-10-07', 144, 'nofile.svg', 'uang masuk', 72, '2022-10-07 06:53:22', '2022-10-07 06:53:22'),
(44, 13, 18, 340000.00, '2022-07-14', 84, 'nofile.svg', '', 51, '2022-11-09 19:58:45', '2022-11-09 19:58:45'),
(45, 25, 29, 1000000.00, '2023-02-06', 152, '83_T_63e0be23a92e2_06 Feb 2023 - Transfer ke Kas Dewi.jpeg', 'Kas Operasional Rp1.000.000', 83, '2023-02-06 08:45:23', '2023-02-06 08:45:23'),
(46, 29, 31, 767000.00, '2023-02-06', 152, '83_T_63e0c6e6ad087_06 Feb 2023 - Transfer ke Kas Ari.jpeg', 'Kas Operasional', 83, '2023-02-06 09:22:46', '2023-02-06 09:22:46'),
(47, 29, 25, 120500.00, '2023-02-12', 152, '83_T_63ea09ba3cb0a_12 Feb 2023 - Transfer ke Kas Fandi.jpeg', 'Kas Operasional', 83, '2023-02-13 09:58:18', '2023-02-13 09:58:18'),
(48, 34, 32, 700000.00, '2023-03-01', 160, 'nofile.svg', '', 86, '2023-03-01 14:11:14', '2023-03-01 14:11:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `type` varchar(20) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `lang` varchar(100) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `plan` int(11) DEFAULT NULL,
  `plan_expire_date` date DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT 1,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `initialized` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `referral_token` varchar(20) DEFAULT NULL,
  `referred_by` bigint(20) UNSIGNED DEFAULT NULL,
  `referral_redeemed` tinyint(4) NOT NULL DEFAULT 0,
  `active_time` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `last_active` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `avatar`, `lang`, `created_by`, `plan`, `plan_expire_date`, `delete_status`, `is_active`, `initialized`, `remember_token`, `referral_token`, `referred_by`, `referral_redeemed`, `active_time`, `last_active`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', '2021-12-01 10:04:27', '$2y$10$W9vekm0t6zZH0g3Y50a1duQTYT1zUbJiMmn.WJ7LZl9hlB20ox4Ay', 'super admin', '', 'en', 0, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 0, 264, '2023-02-02 09:14:55', '2021-02-03 07:34:12', '2021-12-03 14:20:37'),
(2, 'company', 'company@example.com', '2022-02-02 14:49:32', '$2y$10$uvAaXEkFofqqBvHNX4SWceGsSyMheYrcYBUG6P.lz1Lmg8vFvWL6q', 'company', 'Onigiri Boi_1613988671.png', 'id', 1, 4, '2023-03-18', 1, 1, 1, '6DWHjUupuLSzbAtqU8CCzl9vYDz4ltbKSzVqY27ghyetJKfRjGjQIiWhalmF', NULL, NULL, 0, 9, '2023-02-18 05:19:05', '2021-02-03 07:34:27', '2023-02-18 05:17:58'),
(3, 'accountant', 'accountant@example.com', NULL, '$2y$10$p7.owbvLxByZpuxAE8gfH.m/lQIqPhklnlFvJ2LXbQmAPnWksiDTW', 'accountant', '', 'id', 2, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, 0, 0, NULL, '2021-02-03 07:34:37', '2023-02-18 05:17:58'),
(19, 'Kebun Neyoza', 'admin@kebunneyoza.com', NULL, '$2y$10$aVW3o3Jf7MF/7Y2pAuW5qeaq9prdQbt27Y6vDwrPlndCj.0ouSRdy', 'company', NULL, 'id', 1, 0, NULL, 1, 1, 0, 'q1JAKxqieUsVGPAN2B32FD0El7Je0e53TNagpTk0ORizKp4PbZanAjY8l21Z', NULL, NULL, 0, 0, NULL, '2021-07-21 23:50:57', '2022-01-08 21:40:49'),
(20, 'kejar tayang', 'admin@kejartayang.com', '2021-12-28 13:12:39', '$2y$10$945PRAgONcINuoH75IThwO4tu2uoTggxUYacDH10Fne6037AOM/5y', 'company', NULL, 'id', 1, 2, '2023-04-02', 1, 1, 1, '9dAQijf6YFjzzY7qStkdyMqLhmWIVdSj8fWXe5rSWLmSmbgawQKOiL8zBQhs', '6c1a98', NULL, 0, 103, '2022-12-12 08:42:44', '2021-07-24 08:37:29', '2023-02-02 07:15:32'),
(21, 'admin', 'admin@barumulai.com', NULL, '$2y$10$kYh2HV1ezsYtiDSbKNx5Fe8B659PBEKWN9wyCHUfsOj8ZIrbGEagi', 'company', NULL, 'id', 1, 1, NULL, 1, 1, 0, NULL, NULL, NULL, 0, 0, NULL, '2021-08-21 22:38:27', '2021-08-21 22:38:27'),
(22, 'M Wildan Kautsar', 'basoaciunnie@gmail.com', NULL, '$2y$10$1KJ/4oHSQpERq9HJARHsd.MNYRZU0tjRKUdUc3wo.H2Vfd3QeKY8i', 'company', NULL, 'id', 1, 1, NULL, 1, 1, 0, NULL, NULL, NULL, 0, 0, NULL, '2021-08-29 10:53:25', '2021-08-29 10:53:25'),
(23, 'admin', 'admin@tumbasgo.com', NULL, '$2y$10$m6/tOEgYW4a/oMrVSyj5FOrPYtPu5uSHWrEX/QoAatKP6sn5N7IA6', 'company', NULL, 'id', 1, 1, NULL, 1, 1, 0, NULL, NULL, NULL, 0, 0, NULL, '2021-08-31 23:37:23', '2021-08-31 23:37:23'),
(24, 'mehdy riza', 'mehdyriza@gmail.com', '2022-01-12 01:41:46', '$2y$10$KN0pmWkClUjbKiWIv8KkbO20xSuQZWowYyaAvimGIUnhi1NUMQ1wG', 'company', NULL, 'id', 1, 2, '2023-05-24', 1, 1, 1, 'XqGaCqpDGXZ1gEUL6l1EEgXAZAENaYzU1x1hgNXrnyglCCJXz0Fw9jDnwz4O', 'e615c4', NULL, 0, 70, '2022-09-10 14:44:19', '2021-10-21 06:25:36', '2022-07-28 11:44:16'),
(26, 'Suci', 'ryugaavilashputra@gmail.com', NULL, '$2y$10$Lhc35QwO8v46W2bfjjn1V.XrjlnfWyijQd0QprKU2b4CQ5uhfucLu', 'company', NULL, 'id', 1, 1, NULL, 1, 1, 0, NULL, NULL, NULL, 0, 0, NULL, '2021-11-07 21:40:13', '2021-11-07 21:40:13'),
(27, 'D\' Test', 'Iri@test.irimold.web.id', '2021-12-20 10:16:44', '$2y$10$I/NXiwublX8JD0KMSpLNdekHDoHv2zNI229CyoY.R4E8bRrDCL2d.', 'company', NULL, 'id', 1, 2, '2024-03-02', 1, 1, 1, NULL, 'cf5fc3', NULL, 0, 406, '2022-10-05 12:27:20', '2021-11-11 10:55:00', '2022-05-09 03:28:29'),
(32, 'Emak Farm', 'emakfarmhidroponic@gmail.com', '2022-04-26 08:15:42', '$2y$10$yYuKujMiXPuu9cPnip7x4.TDjcNSR37m6b4.HXRO90uC5w2x8MsvO', 'company', NULL, 'id', 1, 2, '2022-06-26', 1, 1, 1, NULL, NULL, NULL, 0, 18, '2022-04-26 09:58:14', '2021-12-02 17:17:04', '2022-04-26 08:26:08'),
(33, 'usaha haram', 'usaha@gmail.com', NULL, '$2y$10$8/1t3OQ/0R/KtXHqC.ucSOQiDeeUd9QdfjOuCJwWsCWWTzb.EMm4K', 'company', NULL, 'id', 1, 1, NULL, 1, 1, 0, NULL, NULL, NULL, 0, 27, '2021-12-04 21:03:08', '2021-12-04 20:30:29', '2022-11-18 18:09:29'),
(34, 'Bejo', 'leisuretime.tour@gmail.com', NULL, '$2y$10$D2e5Lk78D8fZB6WmyH6A5ODEYbuDMgS9HIg7XdXMMXve.JEsSy2Iy', 'company', NULL, 'id', 1, 1, NULL, 1, 1, 0, NULL, NULL, NULL, 0, 8, '2021-12-15 14:00:20', '2021-12-15 13:49:31', '2021-12-15 13:49:31'),
(35, 'ahmad fadil', 'fadil_fadil@yahoo.com', NULL, '$2y$10$7OVogr.xlinn24.sKyeT6OuBKhL0j7q.YPT15cyLIqtgz0sFi7n3O', 'company', NULL, 'id', 1, 0, NULL, 1, 1, 0, NULL, NULL, NULL, 0, 0, NULL, '2021-12-15 13:49:32', '2022-11-18 18:10:15'),
(36, 'Abu Amar Fikri', 'abuamarfikri@gmail.com', NULL, '$2y$10$t7LuIpSqQ4uHNT6C.znzf.edyPcyC.015dZqxiWa9wTGcpBnzYRXO', 'company', NULL, 'id', 1, 1, NULL, 1, 1, 0, NULL, NULL, NULL, 0, 3, '2021-12-18 02:36:17', '2021-12-18 02:31:34', '2021-12-18 02:31:34'),
(37, 'Ahmad Dlomiri', 'ahmad.dlomiri00@gmail.com', '2021-12-29 13:35:49', '$2y$10$77mX7FS89.KBqKMP9/mFoOvj9G.KTu4B0W79bMcekcnHA00EmRSCC', 'company', NULL, 'id', 1, 0, NULL, 1, 1, 1, '99dWvPOVWXU2oEvc09LZIUQSdsYS3MIZ14tlW4XS1XeXxEEGzeYiIjGlJlX7', '639808', NULL, 0, 6, '2022-03-17 12:04:37', '2021-12-29 13:35:28', '2022-03-17 12:04:15'),
(38, 'TIN', 'inspiratorteknologi@gmail.com', '2022-02-26 02:49:09', '$2y$10$ko5/57MooL9LadBc8DW49Oyoz4vHq7OB6TU7eFaLsFabcDD7Vedp2', 'company', NULL, 'id', 1, 2, '2023-01-12', 1, 1, 1, '2pv4ImgjDuiHi8ahlv3UETuJfotikqX0MdMxeRu2JL4yBQraZFmRcC0FI6Hg', '3dc959', NULL, 0, 500, '2022-12-14 08:00:11', '2022-02-26 02:48:07', '2022-12-12 08:38:22'),
(39, 'Haikal', 'haikalzaky415@gmail.com', '2022-03-08 04:40:53', '$2y$10$Mz0txlAzXNkFbd2eoMf80OlXyq/bvR2tNqwPMSEjA8NbHsZsZusEe', 'company', NULL, 'id', 1, 2, '2022-05-08', 1, 1, 1, NULL, NULL, NULL, 0, 39, '2022-04-11 14:08:58', '2022-03-08 04:40:27', '2022-03-08 04:43:09'),
(40, 'tes tes', 'tes@tes.com', NULL, '$2y$10$RQVyWGicxVGyZK4ecAXe9uJItn0F4i1kc984OvPRf/Qr69W5aHmyO', 'company', NULL, 'id', 1, 0, NULL, 1, 1, 0, NULL, NULL, NULL, 0, 0, NULL, '2022-03-11 05:28:10', '2022-11-18 18:09:57'),
(41, 'lyne dre', 'lyne.dre@gmail.com', '2022-03-11 05:30:34', '$2y$10$K1iQmKfPHO3Ylj4kMs6lx.wdUBveFXDWsUZFV9M5H5woo/Sta3wle', 'company', NULL, 'en', 1, 2, '2022-05-11', 1, 1, 1, '0cL8KeiiFxwQTIO44UVYXJ1HKzWzWyX207r2KvOy6Yo1OhwXquBh6GxmlLrH', 'aa1556', NULL, 0, 33, '2022-03-18 02:31:49', '2022-03-11 05:29:10', '2022-03-17 08:29:25'),
(42, 'testing', 'tes@tes.int', NULL, '$2y$10$AXQc8Lo/Vu9H6oE5MTtDyeO06655UPLFc6Xnez4tZPxAlYxhHUaUa', 'company', NULL, 'id', 1, 0, NULL, 1, 1, 0, NULL, NULL, NULL, 0, 0, NULL, '2022-03-16 05:38:38', '2022-03-16 05:39:19'),
(43, 'tes', 'hello@kazhier.com', '2022-03-16 05:46:21', '$2y$10$lchUBMj3qolW5Uk9zwlnmuKVWR3WoBc1rr/hS9ucvcdS5j5i5Vcum', 'company', NULL, 'id', 1, 2, '2022-05-16', 1, 1, 1, NULL, NULL, NULL, 0, 17, '2022-03-16 06:24:54', '2022-03-16 05:44:19', '2022-03-16 06:07:32'),
(44, 'Dlo Spam Referral', 'dlomiri@irimold.web.id', '2022-03-29 13:08:13', '$2y$10$I/NXiwublX8JD0KMSpLNdekHDoHv2zNI229CyoY.R4E8bRrDCL2d.', 'company', NULL, 'id', 1, 2, '2022-06-29', 1, 1, 1, NULL, NULL, 38, 1, 22, '2022-03-29 16:55:57', '2022-03-29 13:05:58', '2022-03-29 15:49:59'),
(45, 'Arda Surya Editya', 'ardasurya@gmail.com', '2022-03-29 13:37:37', '$2y$10$tL45Q3ZZAN8RMLI1VyrPEeQwgWLiJ0lAQ7Q3xrGo5dUzKaMIDFn9m', 'company', NULL, 'id', 1, 2, '2022-05-29', 1, 1, 1, NULL, NULL, NULL, 0, 9, '2022-03-29 13:46:30', '2022-03-29 13:37:09', '2022-03-29 13:38:20'),
(46, 'Arda', 'ardasurya.tif@unusida.ac.id', '2022-03-29 13:49:01', '$2y$10$k/Erop2fs66GrpK4lDxPj.1JSJ0YFM5ZZ8qM8fBN4GqrGp1meDHJG', 'company', NULL, 'id', 1, 2, '2022-06-28', 1, 1, 1, NULL, NULL, 38, 1, 12, '2022-03-29 14:01:49', '2022-03-29 13:48:48', '2022-03-29 13:49:30'),
(47, 'Adi kurniawan saputro', 'Adikurniawansaputro@gmail.com', '2022-04-06 14:37:02', '$2y$10$LSKl0nhvFcvaett3NQXGNeL0wJ5MChdhqSBeAPA2UYGgS9xpbPotG', 'company', NULL, 'id', 1, 2, '2022-06-06', 1, 1, 1, NULL, '5f1990', NULL, 0, 22, '2022-04-26 08:52:56', '2022-04-06 14:36:43', '2022-04-06 14:38:40'),
(48, 'Omah Penyetan Bangah', 'hadhi.karuniawan@gmail.com', '2022-04-09 12:38:01', '$2y$10$QO.Pp5qp093fMTiJHoYKweiRNJUyo9jhx0Q005viWsWxALu.eyLlO', 'company', NULL, 'id', 1, 1, NULL, 1, 1, 0, NULL, NULL, 24, 0, 0, NULL, '2022-04-09 12:34:23', '2022-04-09 12:38:01'),
(49, 'Tri Iva F', 'triivon77@gmail.com', '2022-04-10 07:53:48', '$2y$10$owff7HPV46nPOBWzLxkiXedUBZYToa/98cYJiuGxlC27srw2Uktre', 'company', NULL, 'id', 1, 2, '2022-06-11', 1, 1, 1, 'l8zntyLvrH7SwuL5n05NSIVn8fI3YNNU5FRSYJ7OsK1ICOajXHzGx40K0Z1x', '08ccc9', 24, 0, 3, '2022-04-10 21:52:47', '2022-04-10 07:21:52', '2022-04-10 21:45:41'),
(50, 'Tarmizi Erfandi', 'tarmizibantan@gmail.com', '2022-04-10 10:48:18', '$2y$10$rcuhUBaogtKQwg0T59qgmeHiUCh43R4XOFwLZx1txOOblUTc./xRm', 'company', NULL, 'id', 1, 0, NULL, 1, 1, 1, NULL, '3003f5', NULL, 0, 17, '2022-05-17 10:43:11', '2022-04-10 10:46:36', '2022-10-27 10:07:15'),
(51, 'Kejar Tayang', 'kejartayangapp@gmail.com', '2022-04-10 11:12:58', '$2y$10$omUHmkENI.ZF63OjpKuXrueBokH5Kfdd9DBeemwb8EN8ReIvHm4ii', 'company', NULL, 'id', 1, 2, '2023-04-02', 1, 1, 1, 'vRBEpN1iJm1JWzglXzJ2XwycvrM5HpmriW4BBOfpQkFbGrJCiG7kJLWqCIqh', 'dc5ea5', 50, 0, 640, '2023-02-02 09:28:38', '2022-04-10 11:12:11', '2023-02-02 09:15:33'),
(52, 'Shareholder', 'shareholder@kejartayang.com', '2022-04-10 11:15:58', '$2y$10$knpepHT/k7bfeSPMgeFlFeD1TsSv/lv4/E7Huhcvlav2JmIbDkPGC', 'Shareholder', NULL, 'id', 51, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, 0, 0, NULL, '2022-04-10 11:19:20', '2023-02-02 09:15:33'),
(54, 'Geprek Bika', 'eka.dianchusnul@gmail.com', '2022-04-18 09:05:08', '$2y$10$SVGvnqbpPDJC9BuLn.6Wp.Lx9cNeyRE0qsIFC0/zxbp6Cbjg5AR6m', 'company', NULL, 'id', 1, 2, '2022-06-18', 1, 1, 1, 'CHztoOLPWPjSN01BPCdUH5RlOdYko7zxqDdiMa7eG6osyohLCahPljed29fM', '2c1ca2', NULL, 0, 78, '2022-06-09 09:35:56', '2022-04-11 05:22:51', '2022-06-09 08:23:18'),
(55, 'Mega Intan', 'megaintanpermata68@gmail.com', '2022-04-26 08:16:19', '$2y$10$vxz.Y.YEt.OjNHob/GeFq.W8qO68IrRb4yh8LUJOStWCqFcy3iVpK', 'company', NULL, 'id', 1, 0, NULL, 1, 1, 1, 'zOENNu90pqCRxhMWCW5b9PNc95RKqxfyZDoRdmvppqyE97cuTNAqxKjtYV6S', NULL, NULL, 0, 45, '2022-06-14 06:48:21', '2022-04-26 08:14:14', '2022-09-21 04:25:35'),
(56, 'Tarmi Bantan', 'id.kakatoo@gmail.com', '2022-04-26 08:22:06', '$2y$10$abbYL6rED5KbVPFr.vkZceing8seK82LTMpyGxYJBLEaAjnzQs5TG', 'company', NULL, 'id', 1, 2, '2023-01-15', 1, 1, 1, NULL, NULL, NULL, 0, 72, '2022-04-26 09:58:45', '2022-04-26 08:21:31', '2022-12-15 11:42:41'),
(57, 'tarmi', 'otebe.smart@gmail.com', '2022-04-01 09:17:23', '$2y$10$TLxyAoUQGbcKusnuCkVTNuof5g6ehpOKGb4D5GqWAgtj2LJRbA9ey', 'Stock Checker', NULL, 'id', 51, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, 0, 0, NULL, '2022-04-26 09:11:34', '2023-02-02 09:15:33'),
(58, 'YUKSRI UNGKEPAN', 'bebekungkepyuksri@gmail.com', '2022-04-28 08:05:18', '$2y$10$p36GuYAcIv9bKsqkl08RQ.dyKzhVe/VgyjfBL4shK/TYeTuti2m8O', 'company', NULL, 'id', 1, 2, '2022-06-28', 1, 1, 1, 'JfCHDr94bCuzCs6LOgpCDgbgocRPBUIWfqPiP6XXxNnSAKMQgLJRQDqiWVU6', NULL, NULL, 0, 3, '2022-04-28 08:16:53', '2022-04-28 08:01:40', '2022-04-28 08:06:04'),
(59, 'Kopontren Balonggading', 'kopontren.balunggading@gmail.com', '2022-05-11 11:09:54', '$2y$10$mmWOmCPKHVF/jlUMcagIeOXRpwKEJN3jZQCu8ac9NXjd/Txwpxbda', 'company', NULL, 'id', 1, 2, '2022-07-11', 1, 1, 1, NULL, NULL, NULL, 0, 0, '2022-05-11 11:14:31', '2022-05-11 11:09:26', '2022-05-11 11:14:19'),
(60, 'Abu Amar Fikri', 'tetsufiq@gmail.com', '2022-05-12 06:53:06', '$2y$10$OuEjQ6TN8GIRJlU54wpW6.0M0Faw1yg6x5JsPMIacEakU/90nlgOi', 'company', NULL, 'id', 1, 2, '2022-07-12', 1, 1, 1, 'j4bKdXhhGFZHlwrtT6O3wspv2j7ZsuFURiWf9IKoFHQeEX5NkD6ilmdm19Gv', NULL, NULL, 0, 24, '2022-05-28 08:26:13', '2022-05-12 06:52:24', '2022-05-27 11:46:22'),
(61, 'Rida', 'husnarida00@gmail.com', '2022-05-20 13:01:59', '$2y$10$qAYuEBgRcC.YPxMX.icbS.gbVsVLILUuIAoiWWuzNELtlLzv0w2CO', 'company', NULL, 'id', 1, 2, '2022-07-20', 1, 1, 1, NULL, NULL, NULL, 0, 12, '2022-05-20 14:07:40', '2022-05-20 13:01:38', '2022-05-20 13:03:16'),
(62, 'Maharani', 'hijabkasihmurah@gmail.com', '2022-05-21 06:37:44', '$2y$10$F4na8Lw0KisntJQf8nNvgOMPNKaauJMtkoNzUI6XoJse1rbBf2G9q', 'company', NULL, 'id', 1, 2, '2022-07-21', 1, 1, 1, NULL, NULL, NULL, 0, 1, '2022-05-21 06:39:39', '2022-05-21 06:37:11', '2022-05-21 06:39:00'),
(63, 'Lailatul Rohma Hadi', 'lailatulrohmahadi05@gmail.com', NULL, '$2y$10$Tx.Tet8n5QBgUGlM.fuJpeHyn5vObHJBukN7VSIGK.CbA0h49qoRO', 'company', NULL, 'id', 1, 1, NULL, 1, 1, 0, NULL, NULL, NULL, 0, 0, NULL, '2022-05-21 12:09:35', '2022-05-21 12:09:35'),
(64, 'Nurya Rizkiyani', 'rizkiny09@gmail.com', '2022-05-21 12:10:47', '$2y$10$cUyTk73TvHq8NxzQ3/lzpuUsxs2VJbglmCA9ozX1qU01w6W7Ql3uS', 'company', NULL, 'id', 1, 2, '2022-07-21', 1, 1, 1, 'YZsUdLLBK3U6pIcKtiDogf56E5e7S6hrymAuO9VoFZ6uSJTAA4zEVyrqmD1a', NULL, NULL, 0, 79, '2022-05-23 09:27:34', '2022-05-21 12:10:06', '2022-05-21 12:13:14'),
(65, 'danis', 'danisbendul@gmail.com', '2022-05-21 12:19:42', '$2y$10$o0pPF5X.n5uxS1vYOn99/e0ZvoqHtVRL531vZ8cgySmIYTYzLbs4S', 'company', NULL, 'id', 1, 2, '2022-07-21', 1, 1, 1, NULL, NULL, NULL, 0, 0, NULL, '2022-05-21 12:19:03', '2022-05-21 12:20:56'),
(66, 'Wahyu Ananda', 'wahyuwahyu717@gmail.com', '2022-06-09 04:59:03', '$2y$10$zrj29GvSiTwIehaXPRJE7eYRuDFdfqkLgPAhPtCOvyaSeoQpp15Wu', 'company', NULL, 'id', 1, 1, NULL, 1, 1, 0, NULL, NULL, NULL, 0, 0, NULL, '2022-06-09 04:58:15', '2022-06-09 04:59:03'),
(67, 'moch naza ilham yannis', 'm.naza.ilham@gmail.com', '2022-06-11 02:10:37', '$2y$10$.WTjW4svmWOddpQw9lfTZOV1.By2UgoWZ.aM9pdniVpQtvZKSM5ee', 'company', NULL, 'id', 1, 2, '2022-08-11', 1, 1, 1, 'fjnTE2c6UG0htKwHW1pRXXrrkRx22WYYhkNlwKiI0uoDVLxGAwfJ3EX7u7Fa', NULL, NULL, 0, 16, '2022-06-17 16:49:29', '2022-06-11 02:09:29', '2022-06-11 02:14:00'),
(68, 'MUHAMMAD NUR', 'dhaninur81@gmail.com', '2022-06-20 05:41:33', '$2y$10$FfqfjHXsjVN0x0vOPhTUvORS7.y/R.Lzt1IGjl6uezrHDqu0zKJaC', 'company', NULL, 'id', 1, 2, '2022-08-20', 1, 1, 1, 'Jqj6mPE1WnAqKBbUcMVjaCH6YAI2mdWeeOCR0U7ZSciqSUsUrGiNN0scfGLQ', NULL, NULL, 0, 32, '2022-06-20 06:23:40', '2022-06-20 05:40:17', '2022-06-20 05:44:57'),
(69, 'bayu aji saputro', 'ajibayu590@gmail.com', '2022-06-23 06:59:25', '$2y$10$OtnVu2eERdsAx4CAvmIW6O7VnSIpuP796Dlg/uIjTYoywJQspvQ4K', 'company', NULL, 'id', 1, 2, '2022-08-23', 1, 1, 1, NULL, NULL, NULL, 0, 5, '2022-06-24 07:12:03', '2022-06-23 06:59:00', '2022-06-23 06:59:52'),
(70, 'Dhany Putra', 'rahmadhanyc@gmail.com', '2022-06-25 12:36:17', '$2y$10$HPsZA1q87dkXq2DzROQThOF.2ShR/n0pMYw74MGGHO1oJ3aLyHM8e', 'company', NULL, 'id', 1, 0, NULL, 1, 1, 0, NULL, NULL, NULL, 0, 3, '2022-06-25 14:56:16', '2022-06-25 12:33:02', '2022-06-25 12:36:17'),
(71, 'moh nurdin', 'didinck0@gmail.com', '2022-06-26 10:57:09', '$2y$10$SuUTrkLwKbHxusH.YCsatOcJ0L8KqFDpsK6ghRbF7VZ/5KORNmPQS', 'company', NULL, 'id', 1, 2, '2022-08-26', 1, 1, 1, NULL, NULL, NULL, 0, 16, '2022-06-26 12:31:05', '2022-06-26 10:56:04', '2022-06-26 10:58:25'),
(72, 'Kantor notaris Ajeng Tri Anindita,S.H.,M.Kn', 'notarisajeng@gmail.com', '2022-07-15 03:25:56', '$2y$10$3kBhNNekX0U/KQdA321.ZutRQlXj/H..4KCXvQvA.fvg.lGuYi/PC', 'company', NULL, 'id', 1, 0, NULL, 1, 1, 1, '2G0Fh5hOo1OlKIIHg8Z6P28y7rRsXGVznOeCfJa7ugCavPTh8FSqPnZUljUx', 'f8fbd6', NULL, 0, 3211, '2022-10-14 00:20:24', '2022-07-15 03:25:37', '2022-10-17 01:50:02'),
(73, 'fitrotin', 'fitrotin22@gmail.com', '2022-07-20 04:19:49', '$2y$10$TvtMICJu2YxE/SDRQ6y4iOOxTkdITwLWCEAJkiXPYw2XBW6bdiq/2', 'ADMIN', NULL, 'id', 72, NULL, NULL, 1, 0, 0, '2B0ChWMJdysPXkeIj9SjarH63CKN2tLa7c0nfO6WpCEVbpeP1P4LET1wuLYj', NULL, NULL, 0, 0, NULL, '2022-07-20 03:43:57', '2022-10-17 01:50:02'),
(75, 'MOHAMMAD RIDWAN YUSUF', 'ridwanlikethis@gmail.com', '2022-09-12 06:45:07', '$2y$10$QrF.Yl4h3pmTbTLAo2MIe.v/8ivslU24Lt4QDWf3KAXOHF3o7.uqm', 'company', NULL, 'id', 1, 0, NULL, 1, 1, 0, 'slSukjbMReKZA1WQ64URt4jiuRFcw6DS90hs1nor3d0jEDqVAZxf5RKpg8V5', NULL, NULL, 0, 0, NULL, '2022-09-12 06:43:40', '2022-09-12 06:45:07'),
(76, 'Juragan kocok', 'DM.juragakocok@gmail.com', NULL, '$2y$10$NXiT8VRfvtKdQ8IpeUATYu0h/V35LjPI.Uj8AEbBT1Ay3AUk.qbJy', 'company', NULL, 'id', 1, 0, NULL, 1, 1, 0, NULL, NULL, NULL, 0, 0, NULL, '2022-09-19 12:35:17', '2022-09-19 13:14:32'),
(77, 'Dyah ayu', 'Dyah080889@gmail.com', '2022-09-19 12:50:57', '$2y$10$kpxVjWMH5ou0QIxnkNe2CORgCyqXD0s1cHTXj2CCmy2i95TPGlRRi', 'company', NULL, 'id', 1, 2, '2022-11-19', 1, 1, 1, 'way7X4E9mdCpRP9x0YWz8YYQXVqR7ug8yOnGwNdBqEs7uiTDFML9Mn7Y4nHq', '368cf7', NULL, 0, 309, '2022-09-22 12:22:13', '2022-09-19 12:48:43', '2022-09-21 09:55:43'),
(81, 'Juragan kocok', 'ajuragankocok@gmail.com', NULL, '$2y$10$mTdlVlmOdiNXe1AFG0p4COWTPOT/ml1uk/QBy2985zc7foQHRDe7i', 'company', NULL, 'id', 1, 0, NULL, 1, 1, 0, 'JU39EUERWXGksKbEdcFFtQASlDjrg0U4YbwVCQahUJwOZ6aljjG7M6Z41BUv', NULL, NULL, 0, 0, NULL, '2022-09-21 09:30:46', '2022-09-21 09:31:56'),
(82, 'juragan', 'dm.juragankocok@gmail.com', '2022-09-21 11:55:41', '$2y$10$XXIWKBgsqq7HKuoex9kPC.FKGPAoVrt50xuS66WtG7.YYMpitxw1W', 'Admin', NULL, 'id', 77, NULL, NULL, 1, 1, 0, 'j7304L0od36eV2ozZVXkCVMfAP2advzPr8oz8SjbPVAuDCc4Tkz7KWjzVEPt', NULL, NULL, 0, 0, NULL, '2022-09-21 11:53:49', '2022-09-21 11:55:41'),
(83, 'Cafe Bersama', 'cafebersama@gmail.com', '2022-10-27 10:10:03', '$2y$10$rux2CVHKudIdVLnwF1gsSuDvov4j12yplPPBHDMyko1blaKQkU8Ve', 'company', NULL, 'id', 1, 2, '2023-03-02', 1, 1, 1, 'teb7T5nNr0Rvy8s0IHunTkVRd33hxy5A8JSuuKHkEukVTEafvwWftYtMDd6f', '7dfc8c', 50, 0, 663, '2023-02-13 09:58:18', '2022-10-27 10:07:42', '2023-01-02 13:08:34'),
(84, 'Beta Pangan Nusantara', 'betapangan@gmail.com', '2022-11-18 18:18:21', '$2y$10$HYJChf58Ac6Wg50IdSy95OcE4XENmM8YCmGVTBAVjz2CR7qCktV1O', 'company', NULL, 'id', 1, 2, '2023-04-07', 1, 1, 1, NULL, 'd0cb6e', 50, 0, 44, '2023-02-09 05:49:47', '2022-11-18 18:17:55', '2023-02-07 16:29:29'),
(85, 'Frontage', 'admin@frontage.com', '2022-11-18 18:18:21', '$2y$10$4tpJytdBoMBqJCVjE9UKKeoRmoN.4qfIGXoJGVAncxXZEgIcv53Ci', 'company', NULL, 'id', 1, 2, '2023-03-02', 1, 1, 1, NULL, NULL, NULL, 0, 16, '2023-01-31 18:20:13', '2023-01-02 13:09:57', '2023-01-02 13:17:08'),
(86, 'Putri', 'putrilailatul26@gmail.com', '2023-02-11 11:51:05', '$2y$10$SQzWoPZxwCzsvSKwhg/iv.wHfNoT9bGh9RKEeMvVwuQW6XalUz6sa', 'company', NULL, 'id', 1, 2, '2023-04-11', 1, 1, 1, 'tFecZ3zd4mvEWnF9bT1WsftmUOduijj0dKr4OVeBaCb7PPV1oea1x8o0XK6B', NULL, NULL, 0, 584, '2023-03-19 15:44:41', '2023-02-11 11:50:41', '2023-02-11 11:52:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_coupons`
--

CREATE TABLE `user_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `coupon` int(11) NOT NULL,
  `order` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `venders`
--

CREATE TABLE `venders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vender_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `contact` varchar(191) DEFAULT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT '',
  `created_by` int(11) NOT NULL DEFAULT 0,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `billing_name` varchar(191) DEFAULT NULL,
  `billing_country` varchar(191) DEFAULT NULL,
  `billing_state` varchar(191) DEFAULT NULL,
  `billing_city` varchar(191) DEFAULT NULL,
  `billing_phone` varchar(191) DEFAULT NULL,
  `billing_zip` varchar(191) DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `shipping_name` varchar(191) DEFAULT NULL,
  `shipping_country` varchar(191) DEFAULT NULL,
  `shipping_state` varchar(191) DEFAULT NULL,
  `shipping_city` varchar(191) DEFAULT NULL,
  `shipping_phone` varchar(191) DEFAULT NULL,
  `shipping_zip` varchar(191) DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `lang` varchar(8) NOT NULL DEFAULT 'id',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `venders`
--

INSERT INTO `venders` (`id`, `vender_id`, `name`, `email`, `password`, `contact`, `avatar`, `created_by`, `is_active`, `email_verified_at`, `billing_name`, `billing_country`, `billing_state`, `billing_city`, `billing_phone`, `billing_zip`, `billing_address`, `shipping_name`, `shipping_country`, `shipping_state`, `shipping_city`, `shipping_phone`, `shipping_zip`, `shipping_address`, `lang`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Suci', 'icuz.suci@yahoo.com', '$2y$10$kHT1v2.mbHdGHHJ11buUX.WPjl2HhGv5o2gD2rk7p938wSBb7JKZG', '008', '', 26, 1, NULL, 'suci', 'Indonesia', 'Jawa Timur', 'Surabaya', '008', '60117', 'Surabaya', 'suci', 'Indonesia', 'Jawa Timur', 'Surabaya', '008', '60117', 'Surabaya', 'en', NULL, '2021-11-07 22:04:03', '2021-11-07 22:04:03'),
(2, 1, 'Bu Bun', '', NULL, '5566', '', 27, 1, NULL, 'Bu Bun', NULL, '', '', '5566', '', 'Samping rumah', 'Bu Bun', NULL, '', '', '5566', '', 'Samping rumah', 'id', NULL, '2021-11-12 08:25:55', '2021-11-12 08:25:55'),
(3, 2, 'Pak Boha', '', NULL, '087887998', '', 27, 1, NULL, 'Pak Boha', NULL, NULL, NULL, '087887998', NULL, 'Kompleks sebelah', 'Pak Boha', NULL, NULL, NULL, '087887998', NULL, 'Kompleks sebelah', 'id', NULL, '2022-01-10 13:16:57', '2022-01-10 13:16:57'),
(4, 1, 'tes123', 'tes@tes.com', NULL, '09239291992', '', 41, 1, NULL, 'test nama', NULL, 'test', 'kota test', '0989232', '1234', 'jalan test', 'test nama', NULL, 'test', 'kota test', '0989232', '1234', 'jalan test', 'id', NULL, '2022-03-11 05:37:12', '2022-03-11 05:37:12'),
(5, 3, 'Bu Bos', '', NULL, '080000000000', '', 27, 1, NULL, 'Bu Bos', NULL, NULL, NULL, '080000000000', NULL, 'Indonesia', 'Bu Bos', NULL, NULL, NULL, '080000000000', NULL, 'Indonesia', 'id', NULL, '2022-04-15 07:34:51', '2022-04-15 07:34:51'),
(6, 1, 'Kemenkumham', '', NULL, '0311500105', '', 72, 1, NULL, 'Kemenkumham', NULL, 'DKI Jakarta', 'Jakarta', '0311500105', '', 'Jakarta', 'Kemenkumham', NULL, 'DKI Jakarta', 'Jakarta', '0311500105', '', 'Jakarta', 'id', NULL, '2022-07-20 04:31:53', '2022-07-20 04:31:53'),
(7, 2, 'Hartono', 'O', NULL, '0', '', 72, 1, NULL, 'Hartono', NULL, 'Jawa Timur', 'Surabaya', '0', '0', 'Rekening VA 4201567494', 'Hartono', NULL, 'Jawa Timur', 'Surabaya', '0', '0', 'Rekening VA 4201567494', 'id', NULL, '2022-08-02 13:28:18', '2022-08-02 13:28:18'),
(8, 3, 'Renovasi Ruko', '', NULL, '0', '', 72, 1, NULL, 'Renovasi ruko', NULL, 'Jawa Timur', 'Surabaya', '0', '', '0', 'Renovasi ruko', NULL, 'Jawa Timur', 'Surabaya', '0', '', '0', 'id', NULL, '2022-08-02 14:16:36', '2022-08-02 14:16:36'),
(9, 4, 'Sewa Ruko', '', NULL, '0', '', 72, 1, NULL, 'Sewa Ruko', NULL, 'Jawa Timur', 'Sidoarjo', '0', '', '0', 'Sewa Ruko', NULL, 'Jawa Timur', 'Sidoarjo', '0', '', '0', 'id', NULL, '2022-08-02 14:30:00', '2022-08-02 14:30:00'),
(10, 5, 'ERMA ZAHRO NUR S.H', '0', NULL, '0', '', 72, 1, NULL, 'ERMA ZAHRO NUR S.H', NULL, 'JAWA TIMUR', 'SURABAYA', '0', '', 'SURABYA', 'ERMA ZAHRO NUR S.H', NULL, 'JAWA TIMUR', 'SURABAYA', '0', '', 'SURABYA', 'id', NULL, '2022-08-04 04:41:54', '2022-08-04 04:41:54'),
(11, 6, 'EKO ARI KRISWANTORO,S.H.,M.Kn', '0', NULL, '0', '', 72, 1, NULL, 'EKO ARI KRISWANTORO,S.H.,M.Kn', NULL, 'jawa timur', 'mojokerto', '0', '0', 'mojokerto', 'EKO ARI KRISWANTORO,S.H.,M.Kn', NULL, 'jawa timur', 'mojokerto', '0', '0', 'mojokerto', 'id', NULL, '2022-08-09 02:00:53', '2022-08-09 02:00:53'),
(12, 7, 'FERRY GUNAWAN, S.H', '0', NULL, '0', '', 72, 1, NULL, 'FERRY GUNAWAN, S.H', NULL, 'JAWA TIMUR', 'SURABAYA', '0', '0', 'SURABAYA', 'FERRY GUNAWAN, S.H', NULL, 'JAWA TIMUR', 'SURABAYA', '0', '0', 'SURABAYA', 'id', NULL, '2022-08-09 02:04:16', '2022-08-09 02:04:16'),
(13, 8, 'YESICA WIDYAASTUTI', '0', NULL, '0', '', 72, 1, NULL, 'YESICA WIDYAASTUTI', NULL, 'Jawa timur', 'Malang', '0', '0', 'Malang', 'YESICA WIDYAASTUTI', NULL, 'Jawa timur', 'Malang', '0', '0', 'Malang', 'id', NULL, '2022-08-09 02:12:05', '2022-08-09 02:12:05'),
(14, 9, 'NANDYTA WULANDARI', '0', NULL, '0', '', 72, 1, NULL, 'NANDYTA WULANDARI', NULL, 'jawa timur', 'gresik', '0', '', 'gresik', 'NANDYTA WULANDARI', NULL, 'jawa timur', 'gresik', '0', '', 'gresik', 'id', NULL, '2022-08-19 08:47:23', '2022-08-19 08:47:23'),
(15, 1, 'Yayasan Al Muslim', 'mehdyriza@gmail.com', NULL, '0318681416', '', 24, 1, NULL, 'Yayasan Al Muslim', NULL, 'Jawa Timur', 'Kota Sidoarjo', '0318681416', '61256', 'jl Raya Wadung Asri no 39F, Ngipa, Wadungasri', 'Yayasan Al Muslim', NULL, 'Jawa Timur', 'Kota Sidoarjo', '0318681416', '61256', 'jl Raya Wadung Asri no 39F, Ngipa, Wadungasri', 'id', NULL, '2022-09-10 14:35:17', '2022-09-10 14:35:17'),
(17, 1, 'Putri Lailatul Maghfiroh', 'putrilailatul26@gmail.com', NULL, '085330147129', '', 86, 1, NULL, 'Putri', NULL, 'Jawa Barat', 'Bandung', '085330147129', '76589', 'Jl Sultan Ahmad 88', 'Putri', NULL, 'Jawa Barat', 'Bandung', '085330147129', '76589', 'Jl Sultan Ahmad 88', 'id', NULL, '2023-03-01 14:18:14', '2023-03-01 14:18:14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bill_payments`
--
ALTER TABLE `bill_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bill_products`
--
ALTER TABLE `bill_products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `credit_notes`
--
ALTER TABLE `credit_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer_categories`
--
ALTER TABLE `customer_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `custom_fields`
--
ALTER TABLE `custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `custom_field_values`
--
ALTER TABLE `custom_field_values`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `custom_field_values_record_id_field_id_unique` (`record_id`,`field_id`),
  ADD KEY `custom_field_values_field_id_foreign` (`field_id`);

--
-- Indeks untuk tabel `debit_notes`
--
ALTER TABLE `debit_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `default_values`
--
ALTER TABLE `default_values`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `equities`
--
ALTER TABLE `equities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoice_payments`
--
ALTER TABLE `invoice_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoice_products`
--
ALTER TABLE `invoice_products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `liabilities`
--
ALTER TABLE `liabilities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_id_unique` (`order_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plans_name_unique` (`name`);

--
-- Indeks untuk tabel `product_services`
--
ALTER TABLE `product_services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_service_categories`
--
ALTER TABLE `product_service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_service_stock_changes`
--
ALTER TABLE `product_service_stock_changes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_service_units`
--
ALTER TABLE `product_service_units`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proposal_products`
--
ALTER TABLE `proposal_products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `referral_points`
--
ALTER TABLE `referral_points`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `referral_point_histories`
--
ALTER TABLE `referral_point_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `referral_withdraw_requests`
--
ALTER TABLE `referral_withdraw_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `revenues`
--
ALTER TABLE `revenues`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_name_created_by_unique` (`name`,`created_by`);

--
-- Indeks untuk tabel `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_coupons`
--
ALTER TABLE `user_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `venders`
--
ALTER TABLE `venders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `balance`
--
ALTER TABLE `balance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `bill_payments`
--
ALTER TABLE `bill_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `bill_products`
--
ALTER TABLE `bill_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `credit_notes`
--
ALTER TABLE `credit_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `customer_categories`
--
ALTER TABLE `customer_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `custom_fields`
--
ALTER TABLE `custom_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `custom_field_values`
--
ALTER TABLE `custom_field_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `debit_notes`
--
ALTER TABLE `debit_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `default_values`
--
ALTER TABLE `default_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `equities`
--
ALTER TABLE `equities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `goals`
--
ALTER TABLE `goals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT untuk tabel `invoice_payments`
--
ALTER TABLE `invoice_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `invoice_products`
--
ALTER TABLE `invoice_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT untuk tabel `liabilities`
--
ALTER TABLE `liabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=600;

--
-- AUTO_INCREMENT untuk tabel `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT untuk tabel `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `product_services`
--
ALTER TABLE `product_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `product_service_categories`
--
ALTER TABLE `product_service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=627;

--
-- AUTO_INCREMENT untuk tabel `product_service_stock_changes`
--
ALTER TABLE `product_service_stock_changes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;

--
-- AUTO_INCREMENT untuk tabel `product_service_units`
--
ALTER TABLE `product_service_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT untuk tabel `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `proposal_products`
--
ALTER TABLE `proposal_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `referral_points`
--
ALTER TABLE `referral_points`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `referral_point_histories`
--
ALTER TABLE `referral_point_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `referral_withdraw_requests`
--
ALTER TABLE `referral_withdraw_requests`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `revenues`
--
ALTER TABLE `revenues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=433;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT untuk tabel `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1119;

--
-- AUTO_INCREMENT untuk tabel `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `user_coupons`
--
ALTER TABLE `user_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `venders`
--
ALTER TABLE `venders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `custom_field_values`
--
ALTER TABLE `custom_field_values`
  ADD CONSTRAINT `custom_field_values_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `custom_fields` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
