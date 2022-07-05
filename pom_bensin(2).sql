-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2022 pada 14.00
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pom_bensin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bensin`
--

CREATE TABLE `bensin` (
  `id_bensin` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `isi` varchar(50) NOT NULL,
  `harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bensin`
--

INSERT INTO `bensin` (`id_bensin`, `jenis`, `isi`, `harga`) VALUES
(3, 'Pertamax', '490.17', '12000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `email`, `foto`) VALUES
(1, 'gw', 'gw@wibu.com', 'gw.39'),
(3, 'coba', 'coba@gmail.com', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `top_up`
--

CREATE TABLE `top_up` (
  `id_top_up` int(11) NOT NULL,
  `id_pegawai` varchar(50) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `tgl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `top_up`
--

INSERT INTO `top_up` (`id_top_up`, `id_pegawai`, `amount`, `id_user`, `tgl`) VALUES
(7, '1', '12000', '1', '05-07-2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `id_bensin` varchar(50) NOT NULL,
  `id_pegawai` varchar(50) NOT NULL,
  `pengisian` varchar(255) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tgl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_bensin`, `id_pegawai`, `pengisian`, `total_harga`, `tgl`) VALUES
(5, '1', '3', '1', '1.33', 16000, '05-07-2022'),
(6, '1', '3', '1', '1', 10000, '05-07-2022'),
(7, '1', '3', '1', '1', 10000, '05-07-2022'),
(8, '1', '3', '1', '1.67', 20000, '05-07-2022'),
(9, '1', '3', '1', '2.08', 25000, '05-07-2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `saldo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `nama`, `foto`, `email`, `saldo`) VALUES
(1, 'Akhwan Youno Kouji', '', 'blabla@bla.com', '2000'),
(3, 'Yogurt', 'Yogurt.jpg', 'yogurt@drink.co.id', '18000'),
(4, 'Coba', '', 'coba@gmail.com', '0'),
(5, 'haha', 'haha.png', 'haha@h.co.id', '0'),
(6, 'ehehe', 'ehe.jpeg', 'ehe@e.net', '0'),
(7, 'ads', '', 'asd@fas.asdf', '0'),
(8, 'Tupper Ware', '', 'tupper@ware.b', '0'),
(11, 'sade', 'sade.39', 'sade@sad.fas', '0'),
(12, 'coba', '', 'coba@gmail.com', '0'),
(14, 'wakaranai', 'wakaranai.png', 'wakaranai@watashi.te', '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bensin`
--
ALTER TABLE `bensin`
  ADD PRIMARY KEY (`id_bensin`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `top_up`
--
ALTER TABLE `top_up`
  ADD PRIMARY KEY (`id_top_up`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bensin`
--
ALTER TABLE `bensin`
  MODIFY `id_bensin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `top_up`
--
ALTER TABLE `top_up`
  MODIFY `id_top_up` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
