-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2023 at 08:21 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkasir`
--

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
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_07_22_111823_barang', 1),
(4, '2023_07_22_111834_jenis_barang', 1),
(5, '2023_07_22_111844_transaksi', 1),
(6, '2023_07_22_111851_detail_transaksi', 1),
(7, '2023_07_22_112911_diskon', 1),
(8, '2023_07_23_085502_role', 2);

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
-- Table structure for table `tblbarang`
--

CREATE TABLE `tblbarang` (
  `idBarang` bigint(20) UNSIGNED NOT NULL,
  `idJenis` int(11) NOT NULL,
  `namaBarang` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `stok` varchar(255) DEFAULT NULL,
  `img_produk` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblbarang`
--

INSERT INTO `tblbarang` (`idBarang`, `idJenis`, `namaBarang`, `harga`, `stok`, `img_produk`, `created_at`, `updated_at`) VALUES
(11, 3, 'Aslina Fresh Jagung Manis Frozen 500 gram', '30000', '11', '2023-07-31a5b18397fa8e8b6103633b3e17cf6e1d.png', '2023-07-31 05:24:46', '2023-08-19 05:02:10'),
(12, 1, 'Indomie Goreng 85 gram 1 kardus isi 40 pcs', '98500', '170', '2023-07-31indomie_indomie-goreng-spesial-1-dus-karton-isi-40-pcs-mie-instan_full01.webp', '2023-07-31 05:26:13', '2023-08-19 05:01:52'),
(13, 4, 'Black Bubble Wrapping 1 roll 50 x 50', '20200', '2', '2023-07-318f1777c1-817f-439f-8014-6c3507127b63.jpg', '2023-07-31 05:30:13', '2023-08-19 01:19:19'),
(14, 1, 'Indomie mi instan rasa rendang 1 dus isi 40 pcs', '137500', '0', '2023-07-311dae907a67d48224caedbe6f16d5d6a8.jpg', '2023-07-31 06:06:55', '2023-08-19 01:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbldetailtransaksi`
--

CREATE TABLE `tbldetailtransaksi` (
  `id_detailTransaksi` bigint(20) UNSIGNED NOT NULL,
  `noTransaksi` varchar(255) NOT NULL,
  `idBarang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbldiskon`
--

CREATE TABLE `tbldiskon` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diskon` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbldiskon`
--

INSERT INTO `tbldiskon` (`id`, `diskon`, `created_at`, `updated_at`) VALUES
(1, 10, NULL, '2023-08-12 04:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbljenisbarang`
--

CREATE TABLE `tbljenisbarang` (
  `idJenis` bigint(20) UNSIGNED NOT NULL,
  `namaJenis` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbljenisbarang`
--

INSERT INTO `tbljenisbarang` (`idJenis`, `namaJenis`, `created_at`, `updated_at`) VALUES
(1, 'Packaged Dry', '2023-07-25 09:02:38', '2023-07-25 09:43:20'),
(3, 'Frozen', '2023-07-25 09:18:31', '2023-07-25 09:18:31'),
(4, 'Packaging', '2023-07-25 09:18:54', '2023-07-25 09:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaksi`
--

CREATE TABLE `tbltransaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idBarang` varchar(255) DEFAULT NULL,
  `noTransaksi` varchar(255) NOT NULL,
  `namaBarang` varchar(255) DEFAULT NULL,
  `harga` varchar(255) NOT NULL,
  `tglTransaksi` date DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `pembayaran` varchar(255) DEFAULT NULL,
  `totalBayar` float DEFAULT NULL,
  `kembalian` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbltransaksi`
--

INSERT INTO `tbltransaksi` (`id`, `idBarang`, `noTransaksi`, `namaBarang`, `harga`, `tglTransaksi`, `qty`, `pembayaran`, `totalBayar`, `kembalian`, `created_at`, `updated_at`) VALUES
(84, '12,13', 'NT2023810001', 'Indomie Goreng 85 gram 1 kardus isi 40 pcsBlack Bubble Wrapping 1 roll 50 x 50', '98499.9,20199.9,', '2023-08-19', 4, '250000', 237400, 12600, '2023-08-19 00:59:25', '2023-08-19 01:00:39'),
(85, '11', 'NT2023810002', 'Aslina Fresh Jagung Manis Frozen 500 gram', '29999.9,', '2023-08-19', 5, '160000', 150000, 10000, '2023-08-19 01:16:53', '2023-08-19 04:36:47'),
(86, '12', 'NT2023810003', 'Indomie Goreng 85 gram 1 kardus isi 40 pcs', '98499.9,', NULL, 2, NULL, 197000, NULL, '2023-08-19 01:18:46', '2023-08-19 01:18:46'),
(87, '13', 'NT2023810004', 'Black Bubble Wrapping 1 roll 50 x 50', '20199.9,', NULL, 5, NULL, 101000, NULL, '2023-08-19 01:19:28', '2023-08-19 01:19:28'),
(88, '14', 'NT2023810005', 'Indomie mi instan rasa rendang 1 dus isi 40 pcs', '137499.9,', '2023-08-19', 15, '2100000', 2062500, 37500, '2023-08-19 01:20:07', '2023-08-19 01:22:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','kasir','user') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'CEO Program Kasir', 'admin@gmail.com', '$2y$10$XWOchs/PrDMTez/nezUcU.Gn3OMzVWs0pDX1exAyF8CdaGpZyMgj.', 'admin', NULL, '2023-07-26 06:06:25'),
(2, 'Muhammad Ulin Nuha Al Firas Manar', 'kasir@gmail.com', '$2y$10$ZJolmPk4muMb5vm97oNMNuVyrVM4RHQM44ZFQMWTCxHyaPwuc/.Xy', 'kasir', '2023-07-23 03:29:13', '2023-07-23 03:29:13'),
(4, 'Gading Indra Swari', 'gading@gmail.com', '$2y$10$3hTR1X6SpcU9j4rYp8EmF.w.2OP3vir1Z7rFg1ubleN3JxWky5.ji', 'user', '2023-07-23 09:37:13', '2023-08-02 08:57:46'),
(5, 'Al Firas Manar', 'firas@gmail.com', '$2y$10$BDtG1DQI6TFaIIkhYIQf/u94mvLky.q6TNT8C06k9jxc.O/Rl1VhK', 'user', '2023-07-26 10:27:16', '2023-07-30 10:14:42'),
(7, 'baskara', 'baskara@gmail.com', '$2y$10$1OGSidM3EiAc03jTf2iwCu1eiJA9I3OYZbVEMYzsJmNkZBBjWHRfK', 'user', '2023-08-09 10:06:00', '2023-08-09 10:06:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tblbarang`
--
ALTER TABLE `tblbarang`
  ADD PRIMARY KEY (`idBarang`);

--
-- Indexes for table `tbldetailtransaksi`
--
ALTER TABLE `tbldetailtransaksi`
  ADD PRIMARY KEY (`id_detailTransaksi`);

--
-- Indexes for table `tbldiskon`
--
ALTER TABLE `tbldiskon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbljenisbarang`
--
ALTER TABLE `tbljenisbarang`
  ADD PRIMARY KEY (`idJenis`);

--
-- Indexes for table `tbltransaksi`
--
ALTER TABLE `tbltransaksi`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblbarang`
--
ALTER TABLE `tblbarang`
  MODIFY `idBarang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbldetailtransaksi`
--
ALTER TABLE `tbldetailtransaksi`
  MODIFY `id_detailTransaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbldiskon`
--
ALTER TABLE `tbldiskon`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbljenisbarang`
--
ALTER TABLE `tbljenisbarang`
  MODIFY `idJenis` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbltransaksi`
--
ALTER TABLE `tbltransaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
