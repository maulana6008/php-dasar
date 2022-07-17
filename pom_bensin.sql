-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2022 pada 20.34
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
(5, 'Pertalite', '997.93', '7250');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengelola`
--

CREATE TABLE `pengelola` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengelola`
--

INSERT INTO `pengelola` (`id`, `nama`, `email`, `pass`, `type`, `foto`) VALUES
(1, 'admin', 'admin@saya.com', '7488e331b8b64e5794da3fa4eb10ad5d', 'admin', 'admin1.jpg'),
(2, 'Rea', 'rea@zombie.jp', 'a970756fc5ddba0e698da2b8d2da50ec', 'pegawai', 'Rea.jpg');

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
(8, '2', '10000', '15', '17-07-2022');

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
  `total_harga` varchar(255) NOT NULL,
  `tgl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_bensin`, `id_pegawai`, `pengisian`, `total_harga`, `tgl`) VALUES
(12, '15', '5', '2', '2.07', '15000', '17-07-2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `saldo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `nama`, `foto`, `email`, `pass`, `saldo`) VALUES
(15, 'Keima Katsuragi', 'Keima.png', 'keima@otoshigami.jp', '8245f1d9833fe8e1deae1c4032f15803', '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bensin`
--
ALTER TABLE `bensin`
  ADD PRIMARY KEY (`id_bensin`);

--
-- Indeks untuk tabel `pengelola`
--
ALTER TABLE `pengelola`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_bensin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengelola`
--
ALTER TABLE `pengelola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `top_up`
--
ALTER TABLE `top_up`
  MODIFY `id_top_up` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
