-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 28 Feb 2020 pada 05.22
-- Versi Server: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3074218_latihanarjun`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id` bigint(20) NOT NULL,
  `humidity` float DEFAULT NULL,
  `temperature` float DEFAULT NULL,
  `resistansi_hidrogen_sulfida` float DEFAULT NULL,
  `nilai_hidrogen_sulfida` float DEFAULT NULL,
  `nilai_amonia_sulfida_benzena` float DEFAULT NULL,
  `resistansi_amonia_sulfida_benzena` float DEFAULT NULL,
  `nilai_gas_lpg` float DEFAULT NULL,
  `nilai_asap` float DEFAULT NULL,
  `nilai_karbonmonoksida` float DEFAULT NULL,
  `nilai_gas_metana` float DEFAULT NULL,
  `konsentrasi_debu` float NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id`, `humidity`, `temperature`, `resistansi_hidrogen_sulfida`, `nilai_hidrogen_sulfida`, `nilai_amonia_sulfida_benzena`, `resistansi_amonia_sulfida_benzena`, `nilai_gas_lpg`, `nilai_asap`, `nilai_karbonmonoksida`, `nilai_gas_metana`, `konsentrasi_debu`, `date`) VALUES
(902, 111, 1000, 10, 11, 12, 10, 11, 20, 11, 12, 12, '2020-02-21 09:48:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanah`
--

CREATE TABLE `tanah` (
  `id` bigint(20) NOT NULL,
  `suhu` float DEFAULT NULL,
  `kelembapan_tanah` float DEFAULT NULL,
  `kelembapan_udara` float DEFAULT NULL,
  `ph` float DEFAULT NULL,
  `waktu` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tanah`
--

INSERT INTO `tanah` (`id`, `suhu`, `kelembapan_tanah`, `kelembapan_udara`, `ph`, `waktu`) VALUES
(23, 29, 984, 73, -15.83, '2020-02-25 02:09:19'),
(24, 29, 981, 72, -16.87, '2020-02-25 02:11:25'),
(25, 29, 981, 73, -17.7, '2020-02-25 02:13:22'),
(26, 29, 979, 72, -15.9, '2020-02-25 02:15:33'),
(27, 29, 980, 72, -16.73, '2020-02-25 02:17:23'),
(28, 29, 980, 72, -16.87, '2020-02-25 02:19:23'),
(29, 29, 979, 72, -16.8, '2020-02-25 02:21:30'),
(30, 29, 979, 72, -16.94, '2020-02-25 02:23:25'),
(31, 29, 978, 72, -17.35, '2020-02-25 02:25:32'),
(32, 29, 978, 72, -17.29, '2020-02-25 02:26:28'),
(33, 29, 978, 72, -17.42, '2020-02-25 02:28:30'),
(34, 29, 979, 72, -17.77, '2020-02-25 02:30:35'),
(35, 29, 978, 72, -17.15, '2020-02-25 02:32:36'),
(36, 29, 980, 72, -18.12, '2020-02-25 02:34:37'),
(37, 29, 978, 72, -17.22, '2020-02-25 02:36:38'),
(38, 29, 977, 72, -16.59, '2020-02-25 02:37:39'),
(39, 29, 978, 72, -17.63, '2020-02-25 02:39:37'),
(40, 29, 978, 72, -17.35, '2020-02-25 02:41:38'),
(41, 29, 974, 77, -17.22, '2020-02-25 02:45:00'),
(42, 29, 976, 72, -17.08, '2020-02-25 02:46:03'),
(43, 29, 977, 73, -17.98, '2020-02-25 02:48:01'),
(44, 29, 977, 73, -17.63, '2020-02-25 02:50:01'),
(45, 29, 976, 73, -17.49, '2020-02-25 02:52:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanah`
--
ALTER TABLE `tanah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=903;
--
-- AUTO_INCREMENT for table `tanah`
--
ALTER TABLE `tanah`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
