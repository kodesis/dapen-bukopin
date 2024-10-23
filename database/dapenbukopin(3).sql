-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 11:21 AM
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
-- Table structure for table `active_status`
--

CREATE TABLE `active_status` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `uid` int(11) NOT NULL,
  `judul_banner` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `file_banner` varchar(225) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `running_text`
--

CREATE TABLE `running_text` (
  `uid` int(11) NOT NULL,
  `text` text NOT NULL,
  `active` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `uid` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `posisi` varchar(200) NOT NULL,
  `detail_posisi` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `token_reset` varchar(200) DEFAULT NULL,
  `active` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `kd_peserta`, `nama`, `email`, `role_id`, `password`, `nik`, `alamat`, `tgl_lahir`, `pegawai`, `peserta`, `token_reset`, `active`, `created`, `updated`, `deleted`) VALUES
(1, '1', 'Administrator', 'admin@admin.com', 1, '$2y$10$qB8v4PhfLuKo8/E2sPxwe.1KMgC7hAeL1IUa6rJz9GwaSU8w9GWri', 123, 'Halim', '2024-10-04', '2024-10-04', '2024-10-04', NULL, 1, '2024-10-04 13:25:59', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`uid`);

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
-- Indexes for table `running_text`
--
ALTER TABLE `running_text`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
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
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `running_text`
--
ALTER TABLE `running_text`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
