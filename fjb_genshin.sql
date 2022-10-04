-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 03 Okt 2022 pada 06.04
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
-- Database: `fjb_genshin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `password`) VALUES
(5, 'rojudin123@gmail.com', 'admin1', '$2y$10$rTJenIzWJtlkIPM6IUxsgeLgxye48U4x.lKA1Yv4gLJICRBAyjpRO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_terjual`
--

CREATE TABLE `akun_terjual` (
  `id` int(255) NOT NULL,
  `data_akun` varchar(255) NOT NULL,
  `nama_akun` varchar(255) NOT NULL,
  `harga_jual` int(255) NOT NULL,
  `harga_beli` int(255) NOT NULL,
  `kode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_terjual`
--

INSERT INTO `akun_terjual` (`id`, `data_akun`, `nama_akun`, `harga_jual`, `harga_beli`, `kode`) VALUES
(7, 'rainay9997 mudah321', 'XIAO KAZUHA KOKOMI AYAKA RATE ON 260K', 260000, 135000, 'B4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_akun`
--

CREATE TABLE `data_akun` (
  `id` int(255) NOT NULL,
  `data_akun` varchar(255) NOT NULL,
  `nama_akun` varchar(255) NOT NULL,
  `harga_jual` int(255) NOT NULL,
  `harga_beli` int(255) NOT NULL,
  `kode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_akun`
--

INSERT INTO `data_akun` (`id`, `data_akun`, `nama_akun`, `harga_jual`, `harga_beli`, `kode`) VALUES
(16, 'tuankelana mudah321', 'BAAL XIAO AYAKA RATE ON 260k', 260000, 210000, 'B3'),
(17, 'guaiam mudah321', 'ZHONGLI CHILDE KAZUHA AYAKA 260K', 260000, 220000, 'B5'),
(18, 'Naeyjaa mudah321', 'AYATO GANYU C1 YOIMIYA KOKOMI 260K', 260000, 220000, 'B14'),
(19, 'silampukau mudah321', 'XIAO SIGN GANYU KAZUHA 250K', 250000, 210000, 'B9'),
(21, 'kuroxiao99 mudah321', 'BAAL YOIMIYA XIAO VENTI 260K', 260000, 212000, 'B10'),
(22, 'Ayaya1234567 mudah321', 'AYAKA C1 TIGHNARI KOKOMI ITTO 250K', 250000, 150000, 'B1'),
(23, 'nzhtp747 mudah321', 'KAZUHA TIGHNARI ZHONGLI SIGN GANYU 260K', 260000, 155000, 'B7'),
(24, 'Who_zero mudah321', 'CYNO ZHONGLI KLEE ITTO C1 YELAN 270K', 270000, 225000, 'B6'),
(25, 'hpf615961568 mudah321', 'HUTAO KAZUHA XIAO SIGN 250K', 250000, 180000, 'B12'),
(26, 'Lynzer mudah321', 'YELAN KAZUHA HUTAO XIAO 200K', 200000, 165000, 'B11'),
(27, 'sagenur014@gmail.com mudah321', 'GANYUI VENTI CHILDE RATE ON 250K', 250000, 205000, 'B2'),
(28, 'Yaudahiyaiyaiya mudah321', 'YAE EULA AYAKA ITTO 260K', 260000, 210000, 'B15'),
(29, 'Dimensity_S mudah321', 'AYAKA ITTO VENTI KOKOMI GANYU 250K', 250000, 165000, 'B13'),
(30, 'Simpkomi16 mudah321', 'ZHONGLI GANYU XIAO KOKOMI CHILDE 270K', 270000, 225000, 'B16'),
(31, 'miyu3ii mudah321', 'HUTAO AYATO KLEE 250K', 250000, 210000, 'B8');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `akun_terjual`
--
ALTER TABLE `akun_terjual`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_akun`
--
ALTER TABLE `data_akun`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `akun_terjual`
--
ALTER TABLE `akun_terjual`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_akun`
--
ALTER TABLE `data_akun`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
