-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jun 2020 pada 04.28
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(150) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password_admin` varchar(100) NOT NULL,
  `level_admin` enum('1','2') NOT NULL COMMENT '1 = STAFF | 2 = SEKRETARIS',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username_admin`, `password_admin`, `level_admin`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Staff Mantap', 'staff', '6fad762833db1c13d166aa922620640d', '1', '2020-05-17 09:47:46', '2020-06-14 15:57:56', NULL),
(2, 'Sekretaris Oke', 'sekretaris', 'f5bb0c8de146c67b44babbf4e6584cc0', '2', '2020-05-17 09:47:46', '2020-05-17 09:47:46', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `register_barang` varchar(100) NOT NULL,
  `keterangan_barang` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_jenis`, `nama_barang`, `kode_barang`, `register_barang`, `keterangan_barang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Tanah Kebun Duren', 'TN123', 'KB0001', NULL, '2020-05-15 22:41:00', '2020-06-10 04:31:40', NULL),
(2, 1, 'Tanah Makamaaab', 'TN124', '11111', 'Ga adaaaa', '2020-06-07 03:39:22', '2020-06-11 00:17:03', NULL),
(3, 1, 'Tanah Kebun Duren', 'KB-001', 'KB-001', 'Ga ada', '2020-06-07 04:46:53', '2020-06-10 04:46:10', NULL),
(4, 1, 'Tanah Masjid', 'TN121', '213123', 'Ga ada', '2020-06-09 22:58:37', '2020-06-11 00:12:32', '2020-06-22 00:00:00'),
(5, 2, 'Alat Mantap', 'AL123', 'AL321', 'Mantap Cuy', '2020-06-11 00:35:21', '2020-06-11 00:35:21', NULL),
(6, 2, 'Mobil Xeniaaaa99', 'MB321', '123123099', 'Keteranganya99', '2020-06-11 00:39:40', '2020-06-11 00:57:03', NULL),
(7, 2, 'Kantor Balai Desa', 'BG123', 'BG123123', 'Ket 123', '2020-06-11 01:52:12', '2020-06-11 01:52:12', NULL),
(8, 2, 'Rumah Dinasi9', 'RM122', 'REG12399', 'Ket1239', '2020-06-11 02:02:57', '2020-06-11 02:13:39', NULL),
(9, 4, 'Jalan Sesama99', 'JL123123', 'REG1239999', 'Mantap Cuy99', '2020-06-11 02:47:59', '2020-06-14 15:18:53', NULL),
(10, 5, 'Barang Lain99', 'BL123', 'register12399', 'keterangan12399', '2020-06-11 03:37:36', '2020-06-11 03:46:38', NULL),
(11, 1, 'Tanah Lapangan', 'TANAH1234567', 'KB-001', 'keteranganya', '2020-06-14 11:13:18', '2020-06-14 11:13:18', NULL),
(12, 1, 'Jalan Sesama', 'JL324234', 'KB-001', '', '2020-06-14 13:48:21', '2020-06-14 13:48:21', NULL),
(13, 4, 'Cobain', 'Coba123', '123123', 'Ga adaaaaaaaa', '2020-06-14 15:15:43', '2020-06-14 15:15:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_bangunan`
--

CREATE TABLE `detail_bangunan` (
  `id_detail` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `kondisi_bangunan` varchar(100) DEFAULT NULL,
  `bertingkat_bangunan` varchar(100) DEFAULT NULL,
  `beton_bangunan` varchar(100) DEFAULT NULL,
  `luaslantai_bangunan` double DEFAULT NULL,
  `letak_bangunan` text,
  `dokumentanggal_bangunan` date DEFAULT NULL,
  `dokumenno_bangunan` varchar(100) DEFAULT NULL,
  `luastanah_bangunan` double DEFAULT NULL,
  `statustanah_bangunan` varchar(50) DEFAULT NULL,
  `nomor_bangunan` varchar(100) DEFAULT NULL,
  `asal_bangunan` varchar(150) DEFAULT NULL,
  `harga_bangunan` int(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_bangunan`
--

INSERT INTO `detail_bangunan` (`id_detail`, `id_barang`, `kondisi_bangunan`, `bertingkat_bangunan`, `beton_bangunan`, `luaslantai_bangunan`, `letak_bangunan`, `dokumentanggal_bangunan`, `dokumenno_bangunan`, `luastanah_bangunan`, `statustanah_bangunan`, `nomor_bangunan`, `asal_bangunan`, `harga_bangunan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 7, 'Baik', '0', '0', 123, 'Jl. Jalan yuk Ds. Klahang', '2020-06-17', 'Nomer Dokumen 123', 121, 'Status Tanah 123', 'Nomer Kode Tanah 123', 'Asal 123', 111222, '2020-06-11 01:52:12', '2020-06-11 01:52:12', NULL),
(2, 8, 'Rusak Berat', 'Tidak', 'Tidak', 1239, 'Letak1239', '2020-06-10', 'Nomor1239', 23219, 'Status1239', 'Kode12399', 'Aslas1239', 1239, '2020-06-11 02:02:57', '2020-06-11 02:12:45', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jalan`
--

CREATE TABLE `detail_jalan` (
  `id_detail` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `konstruksi_jalan` varchar(150) DEFAULT NULL,
  `panjang_jalan` double DEFAULT NULL,
  `lebar_jalan` double DEFAULT NULL,
  `luas_jalan` double NOT NULL,
  `letak_jalan` text,
  `dokumentanggal_jalan` date DEFAULT NULL,
  `dokumenno_jalan` varchar(100) DEFAULT NULL,
  `statustanah_jalan` varchar(100) DEFAULT NULL,
  `nokodetanah_jalan` varchar(100) DEFAULT NULL,
  `asal_jalan` varchar(150) DEFAULT NULL,
  `harga_jalan` int(10) DEFAULT NULL,
  `kondisi_jalan` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_jalan`
--

INSERT INTO `detail_jalan` (`id_detail`, `id_barang`, `konstruksi_jalan`, `panjang_jalan`, `lebar_jalan`, `luas_jalan`, `letak_jalan`, `dokumentanggal_jalan`, `dokumenno_jalan`, `statustanah_jalan`, `nokodetanah_jalan`, `asal_jalan`, `harga_jalan`, `kondisi_jalan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 9, 'konstruksi99', 433499, 453599, 123, 'letak12399', '2020-07-09', 'dokumen12399', 'status12399', 'kodetanah12399', 'asal12399', 534534599, 'Kurang Baik', '2020-06-11 02:47:59', '2020-06-14 15:18:53', NULL),
(2, 13, 'Coba Konstruksi', 123, 45, 1233, 'Dimana ya', '2020-06-13', 'dokumen12399', 'status123', 'kodetanah123', 'asal123', 2147483647, 'Baik', '2020-06-14 15:15:43', '2020-06-14 15:15:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_lainnya`
--

CREATE TABLE `detail_lainnya` (
  `id_detail` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `judul_lainnya` varchar(150) DEFAULT NULL,
  `spesifikasi_lainnya` varchar(150) DEFAULT NULL,
  `asaldaerah_lainnya` varchar(150) DEFAULT NULL,
  `pencipta_lainnya` varchar(150) DEFAULT NULL,
  `bahan_lainnya` varchar(150) DEFAULT NULL,
  `tanggal_lainnya` date DEFAULT NULL,
  `nomor_lainnya` varchar(150) DEFAULT NULL,
  `jumlah_lainnya` int(100) DEFAULT NULL,
  `tahun_lainnya` int(5) DEFAULT NULL,
  `asal_lainnya` varchar(150) DEFAULT NULL,
  `harga_lainnya` int(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_lainnya`
--

INSERT INTO `detail_lainnya` (`id_detail`, `id_barang`, `judul_lainnya`, `spesifikasi_lainnya`, `asaldaerah_lainnya`, `pencipta_lainnya`, `bahan_lainnya`, `tanggal_lainnya`, `nomor_lainnya`, `jumlah_lainnya`, `tahun_lainnya`, `asal_lainnya`, `harga_lainnya`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 10, 'judul12399', 'Spesifikasi12399', 'asal12399', 'pencipta12399', 'bahan12399', '2020-06-11', 'nomorhewan12399', 12399, 343499, 'asal343499', 122222299, '2020-06-11 03:37:36', '2020-06-11 03:46:02', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detailpeminjaman` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `banyak_barang` int(5) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detailpeminjaman`, `id_peminjaman`, `id_barang`, `banyak_barang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 10, 1, '2020-06-12 03:41:43', '2020-06-12 03:41:43', NULL),
(2, 1, 1, 1, '2020-06-12 03:41:43', '2020-06-12 03:41:43', NULL),
(3, 1, 2, 1, '2020-06-12 03:41:43', '2020-06-12 03:41:43', NULL),
(4, 1, 5, 1, '2020-06-12 03:41:43', '2020-06-12 03:41:43', NULL),
(5, 2, 4, 10, '2020-06-12 03:42:41', '2020-06-12 03:42:41', NULL),
(6, 2, 5, 5, '2020-06-12 03:42:41', '2020-06-12 03:42:41', NULL),
(7, 3, 4, 123, '2020-06-13 18:02:47', '2020-06-13 18:02:47', NULL),
(8, 3, 5, 323, '2020-06-13 18:02:47', '2020-06-13 18:02:47', NULL),
(9, 4, 1, 1, '2020-06-14 01:54:09', '2020-06-14 01:54:09', NULL),
(10, 4, 5, 2, '2020-06-14 01:54:09', '2020-06-14 01:54:09', NULL),
(11, 4, 7, 4, '2020-06-14 01:54:09', '2020-06-14 01:54:09', NULL),
(12, 4, 10, 5, '2020-06-14 01:54:09', '2020-06-14 01:54:09', NULL),
(13, 4, 9, 43, '2020-06-14 01:54:09', '2020-06-14 01:54:09', NULL),
(14, 5, 11, 1, '2020-06-14 11:15:35', '2020-06-14 11:15:35', NULL),
(15, 5, 5, 3, '2020-06-14 11:15:35', '2020-06-14 11:15:35', NULL),
(16, 5, 8, 5, '2020-06-14 11:15:35', '2020-06-14 11:15:35', NULL),
(17, 6, 3, 1, '2020-06-14 16:22:01', '2020-06-14 16:22:01', NULL),
(18, 6, 7, 2, '2020-06-14 16:22:01', '2020-06-14 16:22:01', NULL),
(19, 7, 9, 2, '2020-06-14 16:22:32', '2020-06-14 16:22:32', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peralatan`
--

CREATE TABLE `detail_peralatan` (
  `id_detail` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `merk_peralatan` varchar(100) DEFAULT NULL,
  `ukuran_peralatan` varchar(100) DEFAULT NULL,
  `bahan_peralatan` varchar(100) DEFAULT NULL,
  `tahun_peralatan` int(5) DEFAULT NULL,
  `nopabrik_peralatan` varchar(100) DEFAULT NULL,
  `norangka_peralatan` varchar(100) DEFAULT NULL,
  `nomesin_peralatan` varchar(100) DEFAULT NULL,
  `nopolisi_peralatan` varchar(100) DEFAULT NULL,
  `nobpkb_peralatan` varchar(100) DEFAULT NULL,
  `asal_peralatan` varchar(100) DEFAULT NULL,
  `harga_peralatan` int(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_peralatan`
--

INSERT INTO `detail_peralatan` (`id_detail`, `id_barang`, `merk_peralatan`, `ukuran_peralatan`, `bahan_peralatan`, `tahun_peralatan`, `nopabrik_peralatan`, `norangka_peralatan`, `nomesin_peralatan`, `nopolisi_peralatan`, `nobpkb_peralatan`, `asal_peralatan`, `harga_peralatan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 'Honda', '300', NULL, 2020, 'AL12345', 'AL67890', '123123', 'R1234R', '123123123', 'Nyuri', 15000000, '2020-06-11 00:35:21', '2020-06-11 00:35:21', NULL),
(2, 6, 'Xenia99', '15000099', 'aw', 2029, '123B12399', 'No Rangka 12399', 'No Mesin12399', 'R111R99', 'BPKB12399', 'Cuti99', 2147483647, '2020-06-11 00:39:40', '2020-06-11 00:55:14', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_tanah`
--

CREATE TABLE `detail_tanah` (
  `id_detail` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `luas_tanah` double NOT NULL,
  `tahun_pengadaan` int(5) DEFAULT NULL,
  `letak_tanah` varchar(150) DEFAULT NULL,
  `hak_tanah` varchar(150) DEFAULT NULL,
  `tanggal_tanah` date DEFAULT NULL,
  `nomor_tanah` varchar(150) DEFAULT NULL,
  `penggunaan_tanah` varchar(150) DEFAULT NULL,
  `asal_tanah` varchar(150) NOT NULL,
  `harga_tanah` int(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_tanah`
--

INSERT INTO `detail_tanah` (`id_detail`, `id_barang`, `luas_tanah`, `tahun_pengadaan`, `letak_tanah`, `hak_tanah`, `tanggal_tanah`, `nomor_tanah`, `penggunaan_tanah`, `asal_tanah`, `harga_tanah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1111, 2015, 'Alamat Mantappaaa', 'SHMaaa', '2020-06-16', 'TN-123aa', 'Berkebunaa', 'Waqafaa', 10000000, '2020-06-07 03:39:22', '2020-06-11 00:17:03', NULL),
(2, 3, 123121, 2013, 'Klahang', 'Hak Milik', '2020-06-09', 'TN-123', 'Berkebun', 'Waqaf', 1000000, '2020-06-07 04:46:53', '2020-06-07 04:46:53', NULL),
(3, 4, 155, 2015, 'RT 05/02 Desa Klahang', 'Hak Milik', '2020-06-16', 'SR-12345', 'Bangunan', 'Warisan', 15490000, '2020-06-09 22:58:37', '2020-06-09 22:58:37', NULL),
(4, 11, 200, 2000, 'Klahang', 'Hak Milik', '2019-01-14', 'ABCD123123', 'Penggunaanya', 'Waqaf', 500000000, '2020-06-14 11:13:18', '2020-06-14 11:13:18', NULL),
(5, 12, 34234, 2005, 'Pinggih Kali Berem', 'Hak Milik', '2020-06-16', 'SR-12345', 'Kuburan', 'Waqafaa', 1000000, '2020-06-14 13:48:21', '2020-06-14 13:48:21', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `nama_table` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `nama_table`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tanah', 'detail_tanah', '2020-05-15 22:37:10', '2020-05-15 22:37:10', NULL),
(2, 'Peralatan dan Mesin', 'detail_peralatan', '2020-05-15 22:37:10', '2020-05-15 22:37:10', NULL),
(3, 'Bangunan dan Gedung', 'detail_bangunan', '2020-05-15 22:37:10', '2020-05-15 22:37:10', NULL),
(4, 'Jalan, Irigasi, dan Jaringan', 'detail_jalan', '2020-05-15 22:37:10', '2020-05-15 22:37:10', NULL),
(5, 'Aset Tetap Lainnya', 'detail_lainnya', '2020-05-15 22:37:10', '2020-05-15 22:37:10', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `kode_peminjaman` varchar(50) NOT NULL,
  `nama_peminjaman` varchar(150) NOT NULL,
  `keperluan_peminjaman` varchar(150) NOT NULL,
  `waktupinjam_peminjaman` date NOT NULL,
  `waktukembali_peminjaman` date NOT NULL,
  `status_peminjaman` int(1) DEFAULT '1',
  `keterangan_peminjaman` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `kode_peminjaman`, `nama_peminjaman`, `keperluan_peminjaman`, `waktupinjam_peminjaman`, `waktukembali_peminjaman`, `status_peminjaman`, `keterangan_peminjaman`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'P1591908103', 'Rafli Firdausy', 'Nikahan', '2020-06-12', '2020-06-30', 1, NULL, '2020-06-12 03:41:43', '2020-06-12 04:08:51', NULL),
(2, 'P1591908161', 'Rafli Firdausy', 'Gabut', '2020-06-12', '2020-06-26', 2, 'asdasd', '2020-06-12 03:42:41', '2020-06-14 03:51:48', NULL),
(3, 'P1592046167', 'Rafli Firdausy', 'Nikahan', '2020-06-13', '2020-06-20', 1, NULL, '2020-06-13 18:02:47', '2020-06-13 18:02:47', NULL),
(4, 'P1592074449', 'Senia Trisna Saputri', 'Pengin Aja hehe', '2020-06-14', '2020-06-18', 2, 'Oke mantap', '2020-06-14 01:54:09', '2020-06-14 03:52:13', NULL),
(5, 'P1592108135', 'Reza', 'Nikahan', '2020-06-14', '2020-12-15', 2, 'Alatnya rusaak 10', '2020-06-14 11:15:35', '2020-06-14 11:18:44', NULL),
(6, 'P1592126521', 'Ervina Nadia', 'Iseng', '2020-06-14', '2020-06-17', 1, NULL, '2020-06-14 16:22:01', '2020-06-14 16:22:01', NULL),
(7, 'P1592126552', 'Senia', 'Iseng', '2020-06-14', '2020-06-11', 1, NULL, '2020-06-14 16:22:32', '2020-06-14 16:22:32', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `barang_jenis` (`id_jenis`);

--
-- Indeks untuk tabel `detail_bangunan`
--
ALTER TABLE `detail_bangunan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `detail_bangunan` (`id_barang`);

--
-- Indeks untuk tabel `detail_jalan`
--
ALTER TABLE `detail_jalan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `detal_jalan` (`id_barang`);

--
-- Indeks untuk tabel `detail_lainnya`
--
ALTER TABLE `detail_lainnya`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `detail_lainnya` (`id_barang`);

--
-- Indeks untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detailpeminjaman`),
  ADD KEY `detail_peminjaman` (`id_peminjaman`),
  ADD KEY `detail_barang` (`id_barang`);

--
-- Indeks untuk tabel `detail_peralatan`
--
ALTER TABLE `detail_peralatan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `detail_peralatan` (`id_barang`);

--
-- Indeks untuk tabel `detail_tanah`
--
ALTER TABLE `detail_tanah`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `detail_tanah` (`id_barang`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD UNIQUE KEY `kode_peminjaman` (`kode_peminjaman`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `detail_bangunan`
--
ALTER TABLE `detail_bangunan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_jalan`
--
ALTER TABLE `detail_jalan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_lainnya`
--
ALTER TABLE `detail_lainnya`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detailpeminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `detail_peralatan`
--
ALTER TABLE `detail_peralatan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_tanah`
--
ALTER TABLE `detail_tanah`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`);

--
-- Ketidakleluasaan untuk tabel `detail_bangunan`
--
ALTER TABLE `detail_bangunan`
  ADD CONSTRAINT `detail_bangunan` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `detail_jalan`
--
ALTER TABLE `detail_jalan`
  ADD CONSTRAINT `detal_jalan` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `detail_lainnya`
--
ALTER TABLE `detail_lainnya`
  ADD CONSTRAINT `detail_lainnya` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `detail_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `detail_peminjaman` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`);

--
-- Ketidakleluasaan untuk tabel `detail_peralatan`
--
ALTER TABLE `detail_peralatan`
  ADD CONSTRAINT `detail_peralatan` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `detail_tanah`
--
ALTER TABLE `detail_tanah`
  ADD CONSTRAINT `detail_tanah` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
