-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Des 2022 pada 11.21
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ekatalog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id` int(11) NOT NULL,
  `isbn` char(13) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `tanggal_rilis` date DEFAULT NULL,
  `jumlah_halaman` int(7) NOT NULL,
  `sinopsis` text DEFAULT NULL,
  `id_penerbit` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tersedia` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`id`, `isbn`, `judul`, `pengarang`, `tanggal_rilis`, `jumlah_halaman`, `sinopsis`, `id_penerbit`, `gambar`, `tersedia`) VALUES
(1, '985632147', 'Judul Buku', 'Nama Pengarang', '2022-11-01', 100, 'Sinopsis Buku Baru', 1, 'gambar_20221201111933.png', 1),
(2, '9786230035159', 'Materi Pemrograman Web untuk Pemula', 'Nama Pengarang', '2022-11-10', 80, 'Sinopsis', 2, 'gambar_20221201054200.jpg', 1),
(3, '985632147', 'Judul Buku', 'Nama Pengarang', '2022-11-01', 100, 'Sinopsis Buku Baru', 1, 'gambar_20221201054149.jpg', 1),
(4, '9786230035159', 'Materi Pemrograman Web untuk Pemula', 'Nama Pengarang', '2022-11-10', 80, 'Sinopsis', 2, 'gambar_20221201054200.jpg', 1),
(5, '9786230035159', 'Materi Pemrograman Web untuk Pemula', 'Nama Pengarang', '2022-11-10', 80, 'Sinopsis', 2, 'gambar_20221201054200.jpg', 1),
(6, '985632147', 'Judul Buku', 'Nama Pengarang', '2022-11-01', 100, 'Sinopsis Buku Baru', 1, 'gambar_20221201054149.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penerbit`
--

CREATE TABLE `tbl_penerbit` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telpon` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_penerbit`
--

INSERT INTO `tbl_penerbit` (`id`, `nama`, `alamat`, `telpon`, `email`) VALUES
(1, 'Nama Penerbit', 'Alamat Penerbit', '0812584255', 'penerbit@gmail.com'),
(2, 'Nama Penerbit 2', 'ALAMAT BANDUNG', '022-25842222', 'penerbit@telkompcc.co.id');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id_buku` (`id`),
  ADD KEY `fk_id_penerbit_buku_penerbit` (`id_penerbit`);

--
-- Indeks untuk tabel `tbl_penerbit`
--
ALTER TABLE `tbl_penerbit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_penerbit`
--
ALTER TABLE `tbl_penerbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD CONSTRAINT `fk_id_penerbit_buku_penerbit` FOREIGN KEY (`id_penerbit`) REFERENCES `tbl_penerbit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
