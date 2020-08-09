-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2020 at 06:14 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penitipan_hewan`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hewan`
--

CREATE TABLE `hewan` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis_hewan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hewan`
--

INSERT INTO `hewan` (`id`, `jenis_hewan`, `created_at`, `updated_at`) VALUES
(1, 'kucing', '2020-07-07 11:56:06', '2020-07-07 11:56:06'),
(2, 'anjing', '2020-07-07 11:56:06', '2020-07-07 11:56:06'),
(3, 'kelinci', '2020-07-07 11:56:06', '2020-07-07 11:56:06'),
(4, 'hamster', '2020-07-07 11:56:06', '2020-07-07 11:56:06'),
(5, 'tupai', '2020-07-06 17:00:00', '2020-07-06 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hewan_pemilik`
--

CREATE TABLE `hewan_pemilik` (
  `id_pemilik` int(10) UNSIGNED NOT NULL,
  `id_hewan` int(10) UNSIGNED NOT NULL,
  `jenis_kelamin` enum('Jantan','Betina') COLLATE utf8_unicode_ci NOT NULL,
  `nama_hewan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hewan_pemilik`
--

INSERT INTO `hewan_pemilik` (`id_pemilik`, `id_hewan`, `jenis_kelamin`, `nama_hewan`, `foto`, `created_at`, `updated_at`) VALUES
(5, 4, 'Jantan', 'ggcall', NULL, '2020-07-07 10:03:39', '2020-07-07 10:03:39'),
(8, 2, 'Jantan', 'joni', '20200708073444.png', '2020-07-08 00:34:44', '2020-07-08 00:34:44'),
(9, 1, 'Jantan', 'lonedruid', '20200708073552.jpg', '2020-07-08 00:35:52', '2020-07-08 00:35:52'),
(11, 5, 'Betina', 'dudi', NULL, '2020-07-08 00:43:53', '2020-07-08 00:43:53'),
(13, 5, 'Jantan', 'move', '20200713033311.png', '2020-07-12 20:33:11', '2020-07-12 20:33:11'),
(17, 3, 'Jantan', 'erere', '20200713031935.jpg', '2020-07-12 20:19:35', '2020-07-12 20:19:35'),
(18, 5, 'Jantan', 'dododo', '20200713034726.png', '2020-07-12 20:47:26', '2020-07-12 20:47:26'),
(19, 3, 'Jantan', 'cecece', '20200713035319.jpg', '2020-07-12 20:53:19', '2020-07-12 20:53:19'),
(20, 2, 'Jantan', 'nanoano', '20200713035356.png', '2020-07-12 20:53:56', '2020-07-12 20:53:56'),
(21, 4, 'Jantan', 'jklash', '20200713035428.png', '2020-07-12 20:54:28', '2020-07-12 20:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_04_104853_create_pemilik_table', 1),
(5, '2020_07_04_132800_create_hewan_table', 1),
(6, '2020_07_04_132856_create_hewan_pemilik_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_pemilik` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batas_waktu_titip` date NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`id`, `nama_pemilik`, `nomor_telepon`, `batas_waktu_titip`, `alamat`, `created_at`, `updated_at`) VALUES
(5, 'zzzz', '021421841242', '2020-07-14', 'Jl. melati no.52 bogor', '2020-07-07 10:03:39', '2020-07-07 10:03:39'),
(8, 'gogon', '042187412141', '2020-07-15', 'jl.nonong batu', '2020-07-08 00:34:44', '2020-07-08 00:34:44'),
(9, 'zuker', '04721849712', '2020-07-18', 'Jl. tupai', '2020-07-08 00:35:52', '2020-07-08 00:35:52'),
(11, 'podik', '024124212141', '2020-07-11', 'jl.lolo', '2020-07-08 00:43:52', '2020-07-08 00:50:32'),
(13, 'soti', '08412842121', '2020-07-10', 'jl.tuti', '2020-07-08 00:45:08', '2020-07-08 00:45:08'),
(17, 'gguugu', '04219842144', '2020-07-20', 'jl. cius', '2020-07-12 20:19:35', '2020-07-12 20:19:35'),
(18, 'qoqo', '04218411204', '2020-07-22', 'jl gogo', '2020-07-12 20:47:06', '2020-07-12 20:47:06'),
(19, 'winter', '042174892017', '2020-07-21', 'jlfdsakjf', '2020-07-12 20:53:19', '2020-07-12 20:53:19'),
(20, 'hohoho', '0491281973', '2020-07-21', 'joldh', '2020-07-12 20:53:56', '2020-07-12 20:53:56'),
(21, 'hhkhkh', '0042109481', '2020-07-22', 'jjjj', '2020-07-12 20:54:28', '2020-07-12 20:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$10$/j/FOw2YeUzLyNpGjT4bGuRtsQzP0Mq8t7x83tWLAZ80s/T5sERnu', NULL, '2020-07-06 20:45:17', '2020-07-06 20:45:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hewan`
--
ALTER TABLE `hewan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hewan_pemilik`
--
ALTER TABLE `hewan_pemilik`
  ADD PRIMARY KEY (`id_pemilik`,`id_hewan`),
  ADD KEY `hewan_pemilik_id_pemilik_index` (`id_pemilik`),
  ADD KEY `hewan_pemilik_id_hewan_index` (`id_hewan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pemilik_nomor_telepon_unique` (`nomor_telepon`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hewan`
--
ALTER TABLE `hewan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hewan_pemilik`
--
ALTER TABLE `hewan_pemilik`
  ADD CONSTRAINT `hewan_pemilik_id_hewan_foreign` FOREIGN KEY (`id_hewan`) REFERENCES `hewan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hewan_pemilik_id_pemilik_foreign` FOREIGN KEY (`id_pemilik`) REFERENCES `pemilik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
