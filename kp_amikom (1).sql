-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2019 pada 22.05
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp_amikom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `nim` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`nim`, `nama`, `kelas`) VALUES
('17.11.0059', 'Nadila', 'SI17S'),
('17.11.0169', 'Rahmat', 'TI16F');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kaprodi`
--

CREATE TABLE `tb_kaprodi` (
  `id` int(50) NOT NULL,
  `judul_surat` varchar(100) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `file_surat` text NOT NULL,
  `isi_surat` text NOT NULL,
  `id_user` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kaprodi`
--

INSERT INTO `tb_kaprodi` (`id`, `judul_surat`, `jenis_surat`, `tanggal`, `file_surat`, `isi_surat`, `id_user`) VALUES
(3, 'BB', 'BB', '2019-07-26', 'http://localhost/kp_amikom/uploads_kaprodi/BB_26-07-2019_1564168022.pdf', 'BB_26-07-2019_1564168022.pdf', 6),
(4, 'AA', 'BB', '2019-07-26', 'http://localhost/kp_amikom/uploads_kaprodi/BB_26-07-2019_1564169151.pdf', 'BB_26-07-2019_1564169151.pdf', 7),
(5, 'AA', 'BB', '2019-07-26', 'http://localhost/kp_amikom/uploads_kaprodi/BB_26-07-2019_1564169269.pdf', 'BB_26-07-2019_1564169269.pdf', 7),
(6, 'AA', 'BB', '2019-07-26', 'http://localhost/kp_amikom/uploads_kaprodi/BB_26-07-2019_1564170482.pdf', 'BB_26-07-2019_1564170482.pdf', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_post`
--

CREATE TABLE `tb_post` (
  `id` int(30) NOT NULL,
  `title_post` varchar(350) NOT NULL,
  `body_post` text NOT NULL,
  `date` date NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `gambar` varchar(300) NOT NULL,
  `id_user` int(50) NOT NULL,
  `full_gambar` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_post`
--

INSERT INTO `tb_post` (`id`, `title_post`, `body_post`, `date`, `kategori`, `gambar`, `id_user`, `full_gambar`) VALUES
(1001, 'sDfghjkj', '<p>xfgh,/</p>', '2019-07-26', 'Berita', 'Berita_26-07-2019_1564114901.jpeg', 7, 'http://localhost/kp_amikom/kp_amikom/uploads_artikel/Berita_26-07-2019_1564114901.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id` int(30) NOT NULL,
  `judul_surat` varchar(30) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `lampiran` text NOT NULL,
  `id_user` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nidn` int(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `nidn`, `email`, `password`, `kategori`) VALUES
(6, 'Untung', 16110137, 'untungkhifni18@gmail.com', '0192023a7bbd73250516f069df18b500', 'Kaprodi'),
(7, 'Trian', 4567890, 'triandamai@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Kaprodi'),
(8, 'Yanuar', 16110180, 'ijal@gmail.com', '5261aa6496d31b51718d354cdaa0e275', 'Dosen');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `tb_kaprodi`
--
ALTER TABLE `tb_kaprodi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_post`
--
ALTER TABLE `tb_post`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
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
-- AUTO_INCREMENT untuk tabel `tb_kaprodi`
--
ALTER TABLE `tb_kaprodi`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_post`
--
ALTER TABLE `tb_post`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
