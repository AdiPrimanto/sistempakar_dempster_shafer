-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 15, 2019 at 09:30 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pakar`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(15) NOT NULL,
  `id_kategori` int(4) NOT NULL,
  `id_tanda` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `id_kategori`, `id_tanda`) VALUES
(1, 1, 1),
(2, 1, 3),
(4, 2, 3),
(5, 4, 1),
(6, 4, 4),
(7, 2, 4),
(9, 2, 2),
(10, 4, 2),
(11, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `bobotbaru`
--

CREATE TABLE `bobotbaru` (
  `id_bobotbaru` int(9) NOT NULL,
  `id_tanda` int(9) NOT NULL,
  `id_kategori` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobotbaru`
--

INSERT INTO `bobotbaru` (`id_bobotbaru`, `id_tanda`, `id_kategori`) VALUES
(35, 1, 2),
(38, 1, 4),
(39, 2, 1),
(40, 3, 1),
(41, 3, 2),
(42, 4, 2),
(43, 4, 4),
(44, 5, 1),
(45, 6, 1),
(46, 6, 2),
(47, 7, 1),
(48, 8, 1),
(49, 8, 2),
(50, 8, 4),
(51, 9, 2),
(52, 9, 4),
(53, 10, 1),
(54, 10, 2),
(55, 11, 1),
(56, 11, 2),
(57, 11, 4),
(58, 12, 2),
(59, 12, 4);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(2) NOT NULL,
  `kode_kategori` varchar(4) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kode_kategori`, `nama_kategori`) VALUES
(1, 'K001', 'Potensi Tinggi'),
(2, 'K002', 'Potensi Sedang'),
(4, 'K003', 'Potensi Rendah');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(50) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `nim` int(10) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `jenjang` varchar(2) NOT NULL,
  `perguruan_tinggi` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `ipk` float NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `nim`, `jurusan`, `jenjang`, `perguruan_tinggi`, `tempat_lahir`, `ipk`, `asal_sekolah`) VALUES
(6, 'Widya Az Zahra', 155410100, 'Teknik Informatika', 'S1', 'STMIK AKAKOM', 'Jakarta', 3.84, 'Akuntansi'),
(7, 'Arisa Higashino', 156410101, 'Sistem Informasi', 'S1', 'STMIK AKAKOM', 'Banyuwangi', 3.79, 'TKJ'),
(8, 'Mohammad Ahsan', 152410001, 'Teknik Komputer', 'D3', 'STMIK AKAKOM', 'Palembang', 3.8, 'Otomotif');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tanda`
--

CREATE TABLE `tanda` (
  `id_tanda` int(2) NOT NULL,
  `kode_tanda` varchar(4) NOT NULL,
  `bobot` float NOT NULL,
  `nama_tanda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanda`
--

INSERT INTO `tanda` (`id_tanda`, `kode_tanda`, `bobot`, `nama_tanda`) VALUES
(1, 'T001', 0.7, 'Kehadiran Kurang'),
(2, 'T002', 0.8, 'IPK dengan Tren Turun (3 semester berturut - turut)'),
(3, 'T003', 8.8, 'IPK dibawah standar 2 semester berturut - turut'),
(4, 'T004', 0.6, 'Cuti Ijin 2 semester'),
(5, 'T005', 0.5, 'Pelanggaran Kode Etik'),
(6, 'T006', 0.8, 'Masa Studi Maksimal tinggi 1 semester'),
(7, 'T007', 0.9, 'Nilai D dan E masih 30% setiap semester'),
(8, 'T008', 0.7, 'Cuti tanpa ijin 2 Semester'),
(9, 'T009', 0.4, 'Kegiatan Organisasi dominan (4 semester)'),
(10, 'T010', 0.6, 'Kuliah sambil Kerja (lebih dari 3 semester)'),
(11, 'T011', 0.7, 'Salah Pergaulan'),
(12, 'T012', 0.5, 'Tidak bisa menyesuaikan kegiatan kampus');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$AIFR22aIr/xW0fKwCR.Jf.fMa.CVXplcHR98nneEODI10NLAaJ3Qe', NULL, '2019-07-15 09:14:40', '2019-07-15 09:14:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `bobotbaru`
--
ALTER TABLE `bobotbaru`
  ADD PRIMARY KEY (`id_bobotbaru`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanda`
--
ALTER TABLE `tanda`
  ADD PRIMARY KEY (`id_tanda`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id_bobot` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `bobotbaru`
--
ALTER TABLE `bobotbaru`
  MODIFY `id_bobotbaru` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tanda`
--
ALTER TABLE `tanda`
  MODIFY `id_tanda` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
