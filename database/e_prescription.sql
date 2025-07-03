-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2025 at 06:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_prescription`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certain_mix_medicines`
--

CREATE TABLE `certain_mix_medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `signa` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certain_prescriptions`
--

CREATE TABLE `certain_prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_medicine` varchar(255) NOT NULL,
  `items` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `signa_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certain_prescriptions`
--

INSERT INTO `certain_prescriptions` (`id`, `name`, `type_medicine`, `items`, `qty`, `signa_id`, `created_at`, `updated_at`) VALUES
(1, 'Acliclovir', 'non racik', 'Acliclovir', '0', 1, '2025-07-02 20:35:05', '2025-07-02 20:35:05'),
(2, 'Acliclovir', 'non racik', 'Acliclovir', '0', 1, '2025-07-02 20:35:25', '2025-07-02 20:35:25'),
(3, 'Amoxicillin', 'non racik', 'Amoxicillin', '0', 2, '2025-07-02 20:35:25', '2025-07-02 20:35:25'),
(4, 'Obat Pegal Linu', 'racik', '6', '12', 1, '2025-07-02 20:36:30', '2025-07-02 20:36:30'),
(5, 'Obat Pegal Linu', 'racik', '3', '20', 2, '2025-07-02 20:36:30', '2025-07-02 20:36:30'),
(6, 'Obat Demam', 'racik', 'Acliclovir', '0', 1, '2025-07-02 21:08:04', '2025-07-02 21:08:04'),
(7, 'Obat Demam', 'racik', 'Parasetamol', '0', 1, '2025-07-02 21:08:04', '2025-07-02 21:08:04'),
(8, 'Obat Sembelit', 'racik', 'Acetaminophen', '0', 5, '2025-07-02 21:08:33', '2025-07-02 21:08:33'),
(9, 'Obat Sembelit', 'racik', 'Azithromycin', '0', 1, '2025-07-02 21:08:33', '2025-07-02 21:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `spesialis` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `kode`, `nama`, `slug`, `jenis_kelamin`, `spesialis`, `kontak`, `created_at`, `updated_at`) VALUES
(1, 'D001', 'Dr. Yulian A. R', 'dr-yulian-a-r', 'Pria', 'Mata', '02717326176', '2025-07-02 20:31:09', '2025-07-02 20:31:09'),
(2, 'D002', 'Dr. Ani R. L', 'dr-ani-r-l', 'Wanita', 'Jantung', '0291378656321', '2025-07-02 20:31:31', '2025-07-02 20:31:31');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
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
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `dosis` varchar(255) NOT NULL,
  `golongan` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` enum('Sirup','Kapsul','Tablet') NOT NULL,
  `signa_id` bigint(20) UNSIGNED NOT NULL,
  `kadaluarsa` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `kode`, `nama`, `slug`, `dosis`, `golongan`, `stok`, `satuan`, `signa_id`, `kadaluarsa`, `created_at`, `updated_at`) VALUES
(1, 'OB001', 'Parasetamol', 'parasetamol', '500mg', 'Obat dalam', 400, 'Tablet', 1, '2029-12-12', '2025-07-02 20:19:01', '2025-07-02 20:19:01'),
(2, 'OB002', 'Ibuprofen', 'ibuprofen', '400mg', 'Obat dala', 100, 'Kapsul', 1, '2027-02-22', '2025-07-02 20:19:40', '2025-07-02 20:19:40'),
(3, 'OB003', 'Amoxicillin', 'amoxicillin', '500mg', 'Obat dalam', 50, 'Tablet', 2, '2026-01-02', '2025-07-02 20:20:28', '2025-07-02 20:20:28'),
(4, 'OB004', 'Azithromycin', 'azithromycin', '500mg', 'Obat dalam', 20, 'Sirup', 1, '2028-02-22', '2025-07-02 20:21:16', '2025-07-02 20:21:16'),
(5, 'OB005', 'Acetaminophen', 'acetaminophen', '1000mg', 'Obat dalam', 20, 'Kapsul', 5, '2026-02-22', '2025-07-02 20:22:01', '2025-07-02 20:22:01'),
(6, 'P002', 'Acliclovir', 'acliclovir', '80ml', 'Obat Luar', 100, 'Tablet', 1, '2028-02-20', '2025-07-02 20:35:05', '2025-07-02 20:35:05');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_30_065155_create_patients_table', 1),
(5, '2025_06_30_065650_create_signas_table', 1),
(6, '2025_06_30_070315_create_prescriptions_table', 1),
(7, '2025_06_30_070633_create_doctors_table', 1),
(8, '2025_06_30_093134_create_transactions_table', 1),
(9, '2025_07_01_203839_create_mixed_medicines_table', 1),
(10, '2025_07_02_000456_create_medicines_table', 1),
(11, '2025_07_02_022945_create_pivot_medics_table', 1),
(12, '2025_07_02_041855_create_certain_mix_medicines_table', 1),
(13, '2025_07_02_225310_create_certain_prescriptions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mixed_medicines`
--

CREATE TABLE `mixed_medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `obat_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `signa_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mixed_medicines`
--

INSERT INTO `mixed_medicines` (`id`, `kode`, `nama`, `obat_id`, `qty`, `signa_id`, `created_at`, `updated_at`) VALUES
(1, 'ROB001', 'Obat Sakit Kepala', 5, 11, 5, '2025-07-02 20:29:04', '2025-07-02 20:29:04'),
(2, 'ROB001', 'Obat Sakit Kepala', 2, 11, 1, '2025-07-02 20:29:04', '2025-07-02 20:29:04'),
(3, 'ROB003', 'Obat Batuk', 5, 20, 5, '2025-07-02 20:29:52', '2025-07-02 20:29:52'),
(4, 'ROB003', 'Obat Batuk', 2, 20, 1, '2025-07-02 20:29:52', '2025-07-02 20:29:52'),
(5, 'ROB005', 'Obat Panas', 3, 12, 2, '2025-07-02 20:30:39', '2025-07-02 20:30:39'),
(6, 'ROB005', 'Obat Panas', 1, 22, 1, '2025-07-02 20:30:39', '2025-07-02 20:30:39'),
(7, 'ROB007', 'Obat Pegal Linu', 6, 12, 1, '2025-07-02 20:36:30', '2025-07-02 20:36:30'),
(8, 'ROB007', 'Obat Pegal Linu', 3, 20, 2, '2025-07-02 20:36:30', '2025-07-02 20:36:30'),
(9, 'ROB009', 'Obat Demam', 6, 0, 1, '2025-07-02 21:06:57', '2025-07-02 21:06:57'),
(10, 'ROB009', 'Obat Demam', 6, 0, 1, '2025-07-02 21:07:44', '2025-07-02 21:07:44'),
(11, 'ROB009', 'Obat Demam', 6, 0, 1, '2025-07-02 21:07:52', '2025-07-02 21:07:52'),
(12, 'ROB009', 'Obat Demam', 6, 0, 1, '2025-07-02 21:07:59', '2025-07-02 21:07:59'),
(13, 'ROB009', 'Obat Demam', 6, 0, 1, '2025-07-02 21:08:04', '2025-07-02 21:08:04'),
(14, 'ROB009', 'Obat Demam', 1, 0, 1, '2025-07-02 21:08:04', '2025-07-02 21:08:04'),
(15, 'ROB0015', 'Obat Sembelit', 5, 0, 5, '2025-07-02 21:08:33', '2025-07-02 21:08:33'),
(16, 'ROB0015', 'Obat Sembelit', 4, 0, 1, '2025-07-02 21:08:33', '2025-07-02 21:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `usia` enum('Anak-anak','Dewasa','Lansia') NOT NULL,
  `golongan_darah` enum('None','A','B','O','AB') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `kode`, `nama`, `slug`, `alamat`, `jenis_kelamin`, `tanggal_lahir`, `kontak`, `usia`, `golongan_darah`, `created_at`, `updated_at`) VALUES
(1, 'P001', 'Bpk. Jojo S. A.', 'bpk-jojo-s-a', 'Magelang', 'Pria', '1980-12-12', '0129738656673', 'Lansia', 'A', '2025-07-02 20:32:26', '2025-07-02 20:32:26'),
(2, 'P002', 'Ibu Sukirna L P', 'ibu-sukirna-l-p', 'Jakarta', 'Wanita', '1992-02-08', '029831756', 'Dewasa', 'None', '2025-07-02 20:33:19', '2025-07-02 20:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `pivot_medics`
--

CREATE TABLE `pivot_medics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` bigint(20) UNSIGNED NOT NULL,
  `mixedmedicine_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pivot_medics`
--

INSERT INTO `pivot_medics` (`id`, `medicine_id`, `mixedmedicine_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '2025-07-02 20:29:04', '2025-07-02 20:29:04'),
(2, 2, 2, '2025-07-02 20:29:04', '2025-07-02 20:29:04'),
(3, 5, 3, '2025-07-02 20:29:52', '2025-07-02 20:29:52'),
(4, 2, 4, '2025-07-02 20:29:52', '2025-07-02 20:29:52'),
(5, 3, 5, '2025-07-02 20:30:39', '2025-07-02 20:30:39'),
(6, 1, 6, '2025-07-02 20:30:39', '2025-07-02 20:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_medicine` varchar(255) NOT NULL,
  `items` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `signa_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('PZi11aRr5q9fhwyUHjzSgv9VNGkFqUatMBLlgKLN', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibHEzS09YV3R1S1dkTElIN3dWNXpmbm9ZTzc1OU1MRDVQNEdOZ1BxbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jZXRhayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1751516795);

-- --------------------------------------------------------

--
-- Table structure for table `signas`
--

CREATE TABLE `signas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `signa` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `signas`
--

INSERT INTO `signas` (`id`, `signa`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'ante coenam', 'sebelum makan', NULL, NULL),
(2, 'auris dextrae', 'telinga kanan', NULL, NULL),
(3, 'ad duas vices', 'untuk dua kali', NULL, NULL),
(4, 'ad usum exterum', 'untuk pemakaian luar', NULL, NULL),
(5, 'capsula', 'kapsul', NULL, NULL),
(6, 'agita', 'aduk', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'admin_123@test.com', '2025-07-02 20:05:53', '$2y$12$zRg0tZkSrtYnRWhKzrNtSeIXiXYAcvcOpxvKHkDiMtz6gpNGAYK3i', 'Om19Ywr5N2B8LBYFM2MfDndDyvzdTxPlqlUY3slWomwBvXeNkor9yWs2y1mt', '2025-07-02 20:05:53', '2025-07-02 20:05:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `certain_mix_medicines`
--
ALTER TABLE `certain_mix_medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certain_prescriptions`
--
ALTER TABLE `certain_prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicines_signa_id_foreign` (`signa_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mixed_medicines`
--
ALTER TABLE `mixed_medicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mixed_medicines_signa_id_foreign` (`signa_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pivot_medics`
--
ALTER TABLE `pivot_medics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pivot_medics_medicine_id_foreign` (`medicine_id`),
  ADD KEY `pivot_medics_mixedmedicine_id_foreign` (`mixedmedicine_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `signas`
--
ALTER TABLE `signas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `certain_mix_medicines`
--
ALTER TABLE `certain_mix_medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certain_prescriptions`
--
ALTER TABLE `certain_prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mixed_medicines`
--
ALTER TABLE `mixed_medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pivot_medics`
--
ALTER TABLE `pivot_medics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signas`
--
ALTER TABLE `signas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medicines`
--
ALTER TABLE `medicines`
  ADD CONSTRAINT `medicines_signa_id_foreign` FOREIGN KEY (`signa_id`) REFERENCES `signas` (`id`);

--
-- Constraints for table `mixed_medicines`
--
ALTER TABLE `mixed_medicines`
  ADD CONSTRAINT `mixed_medicines_signa_id_foreign` FOREIGN KEY (`signa_id`) REFERENCES `signas` (`id`);

--
-- Constraints for table `pivot_medics`
--
ALTER TABLE `pivot_medics`
  ADD CONSTRAINT `pivot_medics_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pivot_medics_mixedmedicine_id_foreign` FOREIGN KEY (`mixedmedicine_id`) REFERENCES `mixed_medicines` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
