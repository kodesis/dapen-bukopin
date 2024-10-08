-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2024 at 06:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dapenbukopin`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `uid` int(11) NOT NULL,
  `nama_file` varchar(200) NOT NULL,
  `deskripsi_file` text DEFAULT NULL,
  `file` varchar(200) NOT NULL,
  `jenis_file` varchar(200) NOT NULL,
  `halaman_page` varchar(200) NOT NULL,
  `tipe` varchar(200) NOT NULL,
  `active` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`uid`, `nama_file`, `deskripsi_file`, `file`, `jenis_file`, `halaman_page`, `tipe`, `active`, `created`, `updated`, `deleted`) VALUES
(1, 'File', 'tes', 'file_tes.docx', 'word', 'Halaman Formulir Iuran Sukarela', '', 0, '2024-10-04 09:58:46', '2024-10-04 10:10:41', '2024-10-04 10:12:51'),
(2, 'tes', 'tes', 'file_tes1.docx', 'word', 'Halaman Formulir Iuran Sukarela', 'Formulir Permohonan', 0, '2024-10-04 10:13:30', '2024-10-07 15:42:02', '2024-10-07 15:43:43'),
(3, 'Formulir Permohonan Pencarian Dapen', '', 'file_Formulir_Permohonan_Pencarian_Dapen.docx', 'word', 'Halaman Formulir Permohonan', 'Formulir Permohonan', 1, '2024-10-04 14:38:33', NULL, NULL),
(4, 'Formulir Permohonan Pengalihan', '', 'file_Formulir_Permohonan_Pengalihan.docx', 'word', 'Halaman Formulir Permohonan', 'Formulir Permohonan', 1, '2024-10-04 14:39:05', NULL, NULL),
(5, 'Formulir Permohonan Pembayaran Anuitas', '', 'file_Formulir_Permohonan_Pembayaran_Anuitas.docx', 'word', 'Halaman Formulir Permohonan', 'Formulir Permohonan', 1, '2024-10-04 14:39:25', NULL, NULL),
(6, 'Form Pernyataan Pembelian Anuitas', '', 'file_Form_Pernyataan_Pembelian_Anuitas.docx', 'word', 'Halaman Formulir Permohonan', 'Formulir Permohonan', 1, '2024-10-04 14:40:26', NULL, NULL),
(7, 'Formulir Iuran Sukarela', '', 'file_Formulir_Iuran_Sukarela.pdf', 'pdf', 'Halaman Formulir Iuran Sukarela', 'Formulir Iuran Sukarela', 1, '2024-10-04 14:40:48', NULL, NULL),
(8, 'ada', 'ada', 'file_ada1.docx', 'word', 'Halaman Formulir Iuran Sukarela', 'Formulir Permohonan', 0, '2024-10-07 15:39:51', NULL, NULL),
(9, 'Investasi Dana Pensiun', '', 'file_Investasi_Dana_Pensiun.pdf', 'pdf', 'Halaman Formulir Iuran Sukarela', 'Peraturan', 1, '2024-10-07 16:13:42', NULL, NULL),
(10, 'Tata Kelola Dana Pensiun', '', 'file_Tata_Kelola_Dana_Pensiun1.pdf', 'pdf', '', 'Peraturan', 1, '2024-10-07 16:16:09', NULL, NULL),
(11, 'Penerapan Manajemen Risiko LJKNB', '', 'file_Penerapan_Manajemen_Risiko_LJKNB.pdf', 'pdf', '', 'Peraturan', 1, '2024-10-07 16:16:29', NULL, NULL),
(12, 'Peraturan Pemerintah No 76 Tahun 1992', '', 'file_Peraturan_Pemerintah_No_76_Tahun_1992.pdf', 'pdf', '', 'Peraturan', 1, '2024-10-07 16:17:23', NULL, NULL),
(13, 'Buku Layanan Kepesertaan (Edisi 3 - 2024)', '', 'file_Buku_Layanan_Kepesertaan_(Edisi_3_-_2024).pdf', 'pdf', '', 'Buku Layanan Kepesertaan', 1, '2024-10-07 16:17:47', NULL, NULL),
(14, 'Undang Undang No 4 Tahun 2023', '', 'file_Undang_Undang_No_4_Tahun_2023.pdf', 'pdf', '', 'Peraturan', 1, '2024-10-07 16:58:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `uid` int(11) NOT NULL,
  `uid_user` int(11) NOT NULL,
  `ips_awal` int(50) NOT NULL,
  `ipk_awal` int(50) NOT NULL,
  `total_awal` int(50) NOT NULL,
  `ips_iuran` int(50) NOT NULL,
  `ipk_iuran` int(50) NOT NULL,
  `ips_p` int(50) NOT NULL,
  `ipk_p` int(50) NOT NULL,
  `ips_akhir` int(50) NOT NULL,
  `ipk_akhir` int(50) NOT NULL,
  `total_akhir` int(50) NOT NULL,
  `tanggal_data` date NOT NULL,
  `active` int(11) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`uid`, `uid_user`, `ips_awal`, `ipk_awal`, `total_awal`, `ips_iuran`, `ipk_iuran`, `ips_p`, `ipk_p`, `ips_akhir`, `ipk_akhir`, `total_akhir`, `tanggal_data`, `active`, `updated`, `deleted`) VALUES
(1, 2, 61281897, 328105071, 389386968, 360855, 1804275, 312253, 1671810, 61955005, 331581156, 393536161, '2024-10-04', 1, NULL, NULL),
(2, 1, 2000, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-10-04', 1, NULL, NULL),
(3, 1, 2000, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-10-04', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `kd_peserta` varchar(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `nik` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `pegawai` date NOT NULL,
  `peserta` date NOT NULL,
  `active` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `kd_peserta`, `nama`, `email`, `role_id`, `password`, `nik`, `alamat`, `tgl_lahir`, `pegawai`, `peserta`, `active`, `created`, `updated`, `deleted`) VALUES
(1, '1', 'Administrator', 'admin@admin.com', 1, '$2y$10$qB8v4PhfLuKo8/E2sPxwe.1KMgC7hAeL1IUa6rJz9GwaSU8w9GWri', 123, 'Halim', '2024-10-04', '2024-10-04', '2024-10-04', 1, '2024-10-04 13:25:59', NULL, NULL),
(2, '100001', 'Dimas Ramadhan Agustian', 'dimas@gmail.com', 2, '$2y$10$PUT8yvLaSQ.G4T0zoIT2PuxWOmbuI.vCtUhrXwZuWsyncbLVnbiNC', 123, 'Condet', '2024-10-04', '2024-10-04', '2024-10-04', 1, '2024-10-04 13:26:47', NULL, NULL),
(6, '', 'nopal', 'nopal@gmail.com', 0, '$2y$10$ai90kbDUXaujmPSZ.a4Oned8sfknTy9Z3f61OAGYNp708RCferrla', 515166, NULL, '2024-10-08', '0000-00-00', '0000-00-00', 1, '2024-10-08 10:20:45', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
