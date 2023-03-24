-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jun 2021 pada 10.09
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hijaumobile`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `petani` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `gambar` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama`, `harga`, `petani`, `kontak`, `gambar`, `deskripsi`) VALUES
(9, 'sayur', 5000, 'Dany Fahrurrozy', '085443779834', 'sayur.jpg', ''),
(10, 'Bawang Putih', 35000, 'Gunawan', '085446337212', 'bawangputih.jpg', ''),
(11, 'Kunyit', 20000, 'Rizki Maulana', '089644347588', 'kunyit.jpg', ''),
(12, 'Jahe', 20000, 'Yudis ', '082245879475', 'jahe.jpg', ''),
(13, 'Tomat', 35000, 'Abrari Liwalidina', '081234567487', 'tomat.jpeg', ''),
(14, 'Mentimun', 7000, 'Wendy', '089634768374', 'timun.jpeg', ''),
(15, 'Bawang Merah', 46000, 'Deka', '085676897364', 'bawangmerah.jpg', ''),
(16, 'Jagung', 8000, 'Asmat', '089666578677', 'jagung.jpg', ''),
(17, 'Kangkung', 5000, 'Biyan', '085677859484', 'kangkung.jpg', ''),
(18, 'Petai', 15000, 'Joni', '081234465775', 'petai.jpg', 'deskripsi petai'),
(19, 'Kentang', 22000, 'Ahmad', '082234847585', 'kentang.jpg', ''),
(20, 'Kacang Panjang', 8000, 'Jabir', '082234578696', 'kacangpanajng.jpg', 'Kacang Panjang ini dibuat tanam dengan cara pemupukan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `nomorhp` varchar(15) NOT NULL,
  `barang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `nama`, `alamat`, `nomorhp`, `barang_id`) VALUES
(1, 'test', 'test', 'test', 7),
(2, 'Dany Anjeng', 'Paret Haji', '08123761423', 7),
(3, 'asd', 'asd', '123', 7);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
