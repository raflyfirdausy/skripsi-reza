-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2020 at 08:29 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `jenis_file` varchar(100) DEFAULT NULL,
  `lokasi_file` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id_file`, `id_user`, `nama_file`, `jenis_file`, `lokasi_file`, `created_at`, `updated_at`) VALUES
(18, 3, 'Foto Formal', 'foto_formal', 'ghozi_foto_formal_1581881295.jpg', '2020-02-17 02:24:36', '2020-02-17 02:28:15'),
(19, 3, 'Ijazah Sd', 'ijazah_sd', 'ghozi_ijazah_sd_1581881076.png', '2020-02-17 02:24:36', '2020-02-17 02:24:36'),
(20, 3, 'Ijazah Smp', 'ijazah_smp', 'ghozi_ijazah_smp_1581881076.png', '2020-02-17 02:24:36', '2020-02-17 02:24:36'),
(21, 3, 'Ijazah Smak', 'ijazah_smak', 'ghozi_ijazah_smak_1581881076.png', '2020-02-17 02:24:36', '2020-02-17 02:24:36'),
(22, 3, 'Ktp', 'ktp', 'ghozi_ktp_1581881076.png', '2020-02-17 02:24:36', '2020-02-17 02:24:36'),
(23, 14, 'Foto Formal', 'foto_formal', 'ghozi1_foto_formal_1582009036.jpg', '2020-02-18 13:57:16', '2020-02-18 13:57:16'),
(24, 14, 'Ijazah Sd', 'ijazah_sd', 'ghozi1_ijazah_sd_1582009036.jpg', '2020-02-18 13:57:16', '2020-02-18 13:57:16'),
(25, 14, 'Ijazah Smp', 'ijazah_smp', 'ghozi1_ijazah_smp_1582009036.jpg', '2020-02-18 13:57:16', '2020-02-18 13:57:16'),
(26, 14, 'Ktp', 'ktp', 'ghozi1_ktp_1582009036.jpg', '2020-02-18 13:57:16', '2020-02-18 13:57:16'),
(27, 14, 'Kk', 'kk', 'ghozi1_kk_1582009036.jpg', '2020-02-18 13:57:16', '2020-02-18 13:57:16'),
(28, 14, 'Sertifikat MTA', 'sertifikat', 'ghozi1_sertifikat_mta_1582009036.pdf', '2020-02-18 13:57:16', '2020-02-18 13:57:16'),
(29, 14, 'Surat Keterangan Ijin Praktek', 'surat_keterangan', 'ghozi1_surat_keterangan_ijin_praktek_1582009036.pdf', '2020-02-18 13:57:17', '2020-02-18 13:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Dokter', '2020-02-16 14:36:21', '2020-02-16 16:23:19'),
(2, 'Perawat', '2020-02-16 14:37:46', '2020-02-16 14:37:46'),
(3, 'Bidan', '2020-02-16 14:37:46', '2020-02-16 14:37:46'),
(4, 'Radiografer', '2020-02-16 14:37:47', '2020-02-16 14:37:47'),
(5, 'Gizi', '2020-02-16 14:37:47', '2020-02-16 14:37:47'),
(6, 'Laundry', '2020-02-16 14:37:47', '2020-02-16 14:37:47'),
(7, 'Pemulasaran Jenazah', '2020-02-16 14:37:47', '2020-02-16 14:37:47'),
(8, 'Administrasi', '2020-02-16 14:37:47', '2020-02-16 14:37:47'),
(9, 'IT', '2020-02-16 14:37:47', '2020-02-16 14:37:47'),
(10, 'Aset', '2020-02-16 14:37:47', '2020-02-18 03:03:26'),
(11, 'Keamanan', '2020-02-16 14:37:47', '2020-02-16 14:37:47'),
(12, 'Tenaga Kebersihan', '2020-02-16 14:37:47', '2020-02-16 14:37:47'),
(13, 'Kesehatan', '2020-02-16 14:37:47', '2020-02-16 14:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `gelardepan_user` varchar(50) NOT NULL,
  `nama_user` varchar(200) NOT NULL,
  `gelarbelakang_user` varchar(50) NOT NULL,
  `tanggallahir_user` date NOT NULL,
  `pendidikan_user` varchar(100) NOT NULL,
  `agama_user` varchar(50) NOT NULL,
  `username_user` varchar(200) NOT NULL,
  `password_user` text NOT NULL,
  `level_user` enum('1','2','3') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_jabatan`, `gelardepan_user`, `nama_user`, `gelarbelakang_user`, `tanggallahir_user`, `pendidikan_user`, `agama_user`, `username_user`, `password_user`, `level_user`, `created_at`, `updated_at`) VALUES
(1, 1, '', 'Administrator', '', '2020-02-01', 'TIDAK/BLM SEKOLAH', 'ISLAM', 'admin', 'f5bb0c8de146c67b44babbf4e6584cc0', '1', '2020-02-05 02:35:18', '2020-02-18 02:34:25'),
(2, 1, '', 'Direksi', '', '2020-02-01', 'SD', 'KRISTEN', 'direksi', 'f5bb0c8de146c67b44babbf4e6584cc0', '2', '2020-02-05 02:35:18', '2020-02-18 02:34:32'),
(3, 1, '', 'Ghozi', '', '2020-02-01', 'SLTA/SEDERAJAT', 'KATHOLIK', 'ghozi', 'f5bb0c8de146c67b44babbf4e6584cc0', '3', '2020-02-05 02:35:18', '2020-02-18 02:37:46'),
(9, 4, '', 'Ervina Nadia', '', '2020-02-01', 'DIPLOMA I', 'BUDHA', 'ervinanadia3', '25d55ad283aa400af464c76d713c07ad', '3', '2020-02-05 21:19:58', '2020-02-18 02:34:43'),
(10, 1, 'Dr.', 'Rafli Firdausy Irawan', 'S.Kom', '2020-02-18', 'AKADEMI/DIPLOMA III/SARJANA MUDA', 'KONGHUCU', 'raflifirdausy', 'f5bb0c8de146c67b44babbf4e6584cc0', '3', '2020-02-16 16:03:21', '2020-02-18 02:34:47'),
(11, 10, 'Dr.', 'Senia Trisna Saputri', 'S.Kom', '2020-02-21', 'DIPLOMA IV', 'KRISTEN', 'seniatrisna1', 'f5bb0c8de146c67b44babbf4e6584cc0', '3', '2020-02-16 16:05:22', '2020-02-18 02:34:52'),
(12, 5, 'dr.', 'Senia Trisna', 'S.Tht', '2020-02-21', 'SARJANA/S1', 'ISLAM', 'seniatrisna', 'f5bb0c8de146c67b44babbf4e6584cc0', '3', '2020-02-17 16:24:12', '2020-02-18 02:34:54'),
(13, 1, 'dr.', 'Rafli Firdausy Irawan', 'S.Kom', '2020-02-14', 'MAGISTER/S2', 'ISLAM', 'raflifirdausy1', 'f5bb0c8de146c67b44babbf4e6584cc0', '3', '2020-02-18 00:13:12', '2020-02-18 00:13:12'),
(14, 1, 'dr.', 'ghozi', 'S.Kom', '2020-02-10', 'SARJANA/S1', 'ISLAM', 'ghozi1', 'f5bb0c8de146c67b44babbf4e6584cc0', '3', '2020-02-18 13:54:57', '2020-02-18 14:01:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username_user` (`username_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `user_jabatan` (`id_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
