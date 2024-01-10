-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2023 pada 04.16
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-11-05-235058', 'App\\Database\\Migrations\\Outlet', 'default', 'App', 1699228514, 1),
(2, '2023-11-06-003703', 'App\\Database\\Migrations\\Member', 'default', 'App', 1699231573, 2),
(3, '2023-11-06-010614', 'App\\Database\\Migrations\\Paket', 'default', 'App', 1699233081, 3),
(4, '2023-11-06-020042', 'App\\Database\\Migrations\\User', 'default', 'App', 1699237858, 4),
(5, '2023-11-06-020456', 'App\\Database\\Migrations\\Transaksi', 'default', 'App', 1699243422, 5),
(6, '2023-11-06-021054', 'App\\Database\\Migrations\\DetailTransaksi', 'default', 'App', 1699243842, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `qty` double NOT NULL,
  `total` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`id`, `id_transaksi`, `id_paket`, `qty`, `total`, `keterangan`) VALUES
(11, 14, 1, 2, 95000, 'Very Good Very Well'),
(12, 15, 7, 5, 31750, 'Baik'),
(13, 16, 8, 2, 37000, 'Noda Bandel'),
(14, 17, 1, 2, 95000, 'Very Good Very Well'),
(15, 18, 1, 1, 52500, 'Baik'),
(16, 19, 7, 5, 31750, 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_member`
--

CREATE TABLE `tb_member` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_member`
--

INSERT INTO `tb_member` (`id`, `nama`, `alamat`, `jenis_kelamin`, `tlp`) VALUES
(1, 'Max Verstappen', 'Lowokwaru, Malang', 'L', '087859842366'),
(2, 'Margot Robbie', 'Klojen, Malang', 'P', '087888923561'),
(4, 'Erwin Schrodinger', 'Blimbing, Malang', 'L', '087765361255'),
(5, 'Leonardo Dicaprio', 'Gadang, Malang', 'L', '087599325441'),
(6, 'Marion Jola', 'Singosari, Malang', 'P', '085521239755');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_outlet`
--

INSERT INTO `tb_outlet` (`id`, `nama`, `alamat`, `tlp`) VALUES
(1, 'Clean Malang', 'Jl. Bunga Cokelat No. 12, Malang', '085565753103'),
(2, 'Clean Surabaya', 'Jl. Tunjungan No. 72', '085576549909'),
(4, 'Clean Yogyakarta', 'Jl. Adi Sucipto No. 18', '085565227182');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `jenis` enum('kiloan','selimut','bed_cover','kaos','lainnya') NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id`, `id_outlet`, `jenis`, `nama_paket`, `harga`) VALUES
(1, 1, 'kiloan', 'Paket A (10 kg)', 50000),
(2, 1, 'kiloan', 'Paket B (20 kg)', 85000),
(4, 2, 'bed_cover', 'Bed Cover Tipis', 20000),
(5, 2, 'bed_cover', 'Bed Cover Tebal', 35000),
(6, 1, 'kiloan', 'Paket C (30 kg)', 120000),
(7, 1, 'kiloan', 'Satuan (1 kg)', 7000),
(8, 1, 'bed_cover', 'Bed Cover Tipis', 20000),
(9, 1, 'bed_cover', 'Bed Cover Tebal', 35000),
(10, 2, 'kiloan', 'Paket 1 (5 kg)', 30000),
(11, 2, 'kiloan', 'Paket 2 (10 kg)', 55000),
(12, 2, 'kiloan', 'Paket 3 (15 kg)', 75000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `kode_invoice` varchar(100) NOT NULL,
  `id_member` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `batas_waktu` date NOT NULL,
  `tgl_bayar` date NOT NULL,
  `biaya_tambahan` int(11) NOT NULL,
  `diskon` double NOT NULL,
  `pajak` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `status` enum('baru','proses','selesai','diambil') NOT NULL,
  `dibayar` enum('dibayar','belum_dibayar') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_outlet`, `kode_invoice`, `id_member`, `tgl`, `batas_waktu`, `tgl_bayar`, `biaya_tambahan`, `diskon`, `pajak`, `Total`, `status`, `dibayar`, `id_user`) VALUES
(14, 1, '06071128112023', 6, '2023-11-08', '2023-11-11', '2023-11-08', 5000, 15000, 5000, 95000, 'selesai', 'dibayar', 7),
(15, 1, '13071128112023', 1, '2023-11-08', '2023-11-11', '2023-11-11', 0, 5000, 1750, 31750, 'selesai', 'dibayar', 7),
(16, 1, '47070808112023', 5, '2023-11-08', '2023-11-11', '2023-11-08', 5000, 10000, 2000, 37000, 'baru', 'dibayar', 1),
(17, 1, '34540623112023', 4, '2023-11-08', '2023-11-11', '2023-11-11', 0, 10000, 12000, 242000, 'baru', 'belum_dibayar', 1),
(18, 1, '07370823112023', 1, '2023-11-23', '2023-11-26', '2023-11-26', 5000, 5000, 2500, 52500, 'baru', 'dibayar', 7),
(19, 1, '02380823112023', 6, '2023-11-23', '2023-11-26', '2023-11-26', 0, 5000, 1750, 31750, 'baru', 'dibayar', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `role` enum('admin','kasir','owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `id_outlet`, `role`) VALUES
(7, 'Administrator', 'admin', '$2y$10$pbYtTS5aDvf33tCq9bk6puSf31ONSMXn/mRhhKza8czvrXE0xCz.S', 1, 'admin'),
(8, 'Anya Geraldine', 'kasirmalang1', '$2y$10$Ih4aXa4ucEMPOUBIMLZDQexi62nMR/5eOJZGtpNR5xu9W0SvSLs2K', 1, 'kasir'),
(9, 'Robert Budi Hartono', 'ownermalang', '$2y$10$vqXlP3uIwPxpf.TqPmNQpu/M7of/8yWf17V81kjQeG1wQrYgQW9qG', 1, 'owner');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
