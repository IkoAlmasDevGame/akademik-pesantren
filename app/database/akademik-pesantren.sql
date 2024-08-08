-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2024 at 10:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik-pesantren`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `niptk` varchar(16) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `tmpt_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `photo_src` varchar(100) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `niptk`, `nama_guru`, `tmpt_lahir`, `tgl_lahir`, `jenis_kelamin`, `photo_src`, `status`) VALUES
(1, '1150939739987717', 'Amanda Syafira Azzahra', 'Jambi', '2001-04-21', 'P', 'indah_cahya.jpg', ''),
(2, '7468290530198607', 'Flora Shafiq', 'Banten', '2005-04-04', 'P', 'flora_shafiq.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id_hari` int(11) NOT NULL,
  `nama_idn` varchar(32) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id_hari`, `nama_idn`, `status`) VALUES
(1, 'senin', '1'),
(2, 'selasa', '1'),
(3, 'rabu', '1'),
(4, 'kamis', '1'),
(5, 'jumat', '1'),
(6, 'sabtu', ''),
(7, 'minggu', '0');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_pelajaran` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jam_ke` int(11) NOT NULL,
  `hari` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `jam_ke` int(11) NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`jam_ke`, `mulai`, `selesai`, `status`) VALUES
(1, '06:30:00', '07:15:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(80) NOT NULL,
  `kapasitas` varchar(11) NOT NULL,
  `id_guru` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kode_kelas`, `nama_kelas`, `kapasitas`, `id_guru`) VALUES
(1, 'A-012541', 'Kelas 1 M&#039;i', '40', NULL),
(2, 'A-012542', 'Kelas 2 M&#039;i', '40', NULL),
(3, 'A-012543', 'Kelas 3 M&#039;i', '40', NULL),
(4, 'A-012544', 'Kelas 4 M&#039;i', '40', NULL),
(5, 'A-012545', 'Kelas 5 M&#039;i', '40', NULL),
(6, 'A-012546', 'Kelas 6 M&#039;i', '40', NULL),
(7, 'B-012541', 'Kelas 7 MT&#039;s', '40', 0),
(8, 'B-012542', 'Kelas 8 MT&#039;s', '40', NULL),
(9, 'B-012543', 'Kelas 9 MT&#039;s', '40', NULL),
(10, 'C-012541', 'Kelas 10 M&#039;A', '40', NULL),
(11, 'C-012542', 'Kelas 11 M&#039;A', '40', 2),
(12, 'C-012543', 'Kelas 12 M&#039;A', '40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `nama_pekerjaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `nama_pekerjaan`) VALUES
(1, 'Pegawai Negeri Sipil'),
(2, 'Ibu Rumah Tangga'),
(3, 'TNI'),
(4, 'Polisi'),
(5, 'Montir');

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id_pelajaran` int(11) NOT NULL,
  `kode_pelajaran` varchar(10) NOT NULL,
  `nama_idn` varchar(100) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`id_pelajaran`, `kode_pelajaran`, `nama_idn`, `status`) VALUES
(1, 'Upacara', 'Upacara Bendara', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tgl_bayar` varchar(2) NOT NULL,
  `bulan_dibayar` varchar(8) NOT NULL,
  `tahun_dibayar` varchar(4) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reg_kelas`
--

CREATE TABLE `reg_kelas` (
  `id_reg_kelas` int(11) NOT NULL,
  `id_santri` varchar(11) DEFAULT NULL,
  `id_kelas` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reg_kelas`
--

INSERT INTO `reg_kelas` (`id_reg_kelas`, `id_santri`, `id_kelas`) VALUES
(1, '1', '0'),
(2, '2', '11');

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id_santri` int(11) NOT NULL,
  `id_spp` int(11) NOT NULL DEFAULT 0,
  `nisn_santri` varchar(10) NOT NULL,
  `nama_santri` varchar(100) NOT NULL,
  `tmpt_lahir` varchar(80) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` varchar(64) NOT NULL,
  `jenjang` varchar(64) NOT NULL,
  `photo_src` varchar(100) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `pekerjaan_ayah` varchar(80) NOT NULL,
  `photo_src_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(80) NOT NULL,
  `photo_src_ibu` varchar(100) NOT NULL,
  `alamat_rumah` text NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `nomor_telepon` varchar(13) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`id_santri`, `id_spp`, `nisn_santri`, `nama_santri`, `tmpt_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `jenjang`, `photo_src`, `nama_ayah`, `pekerjaan_ayah`, `photo_src_ayah`, `nama_ibu`, `pekerjaan_ibu`, `photo_src_ibu`, `alamat_rumah`, `kode_pos`, `nomor_telepon`, `status`) VALUES
(1, 0, '1021544125', 'Fitri Aisyah Azzahra', 'Bandung Barat', '2011-09-01', 'P', '1', '2', 'susucoklat.jfif', 'Ahmad Sanusi', 'Pegawai Negeri Sipil', 'susustrawberry.jfif', 'Amanda Syahreza Pornama', 'Ibu Rumah Tangga', 'susuvanilla.jfif', 'jl. buto naga swasta', '13525', '0123456789', ''),
(2, 0, '1021544125', 'Aurhel Alana', 'Jakarta', '2006-09-14', 'P', '1', '3', 'aurhel_alana.jpg', 'Ahmad Sanusi', 'Montir', 'susuvanilla.jfif', 'Amanda Syahreza Pornama', 'Ibu Rumah Tangga', 'susustrawberry.jfif', 'Jl. Cilegon Raya No. 21', '13525', '0123456789', '');

-- --------------------------------------------------------

--
-- Table structure for table `sistem`
--

CREATE TABLE `sistem` (
  `id_sistem` int(11) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `nama_kepsek` varchar(100) NOT NULL,
  `icon` varchar(80) DEFAULT NULL,
  `flags` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sistem`
--

INSERT INTO `sistem` (`id_sistem`, `nama_sekolah`, `alamat_sekolah`, `nama_kepsek`, `icon`, `flags`) VALUES
(1, 'Al \' Mujahidin', 'Jl. Tongkol Raya No. 24 C', 'H. Syamsuridin', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `nominal` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `nominal`) VALUES
(2, '250000'),
(1, '300000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `repassword` varchar(255) NOT NULL,
  `role` enum('superadmin','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_akun`, `username`, `email`, `nama`, `password`, `repassword`, `role`) VALUES
(1, 'superadmin', 'superadmin@pesantren.com', 'super admin', '17c4520f6cfd1ab53d8745e84681eb49', '17c4520f6cfd1ab53d8745e84681eb49', 'superadmin'),
(2, 'adminpetugas', 'adminpetugas@pesantren.com', 'petugas admin', '0192023a7bbd73250516f069df18b500', '0192023a7bbd73250516f069df18b500', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`jam_ke`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `reg_kelas`
--
ALTER TABLE `reg_kelas`
  ADD PRIMARY KEY (`id_reg_kelas`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id_santri`);

--
-- Indexes for table `sistem`
--
ALTER TABLE `sistem`
  ADD PRIMARY KEY (`id_sistem`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`),
  ADD KEY `nominal` (`nominal`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_akun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `jam_ke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reg_kelas`
--
ALTER TABLE `reg_kelas`
  MODIFY `id_reg_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sistem`
--
ALTER TABLE `sistem`
  MODIFY `id_sistem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
