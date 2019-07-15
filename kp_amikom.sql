-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2019 at 08:05 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

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
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `nim` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`nim`, `nama`, `kelas`) VALUES
('16.11.8787', 'Sofyan Fathur', 'TI17F'),
('16.11.9876', 'Desi Putri Pratiwi', 'TI16F'),
('17.11.0059', 'Nadila', 'SI17S'),
('17.11.0169', 'Rahmat', 'TI16D'),
('18.11.0132', 'Trisna Maulida', 'TI18C'),
('dsds', 'dsd', 'sdsd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_post`
--

CREATE TABLE `tb_post` (
  `id` int(30) NOT NULL,
  `title_post` varchar(350) NOT NULL,
  `body_post` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_post`
--

INSERT INTO `tb_post` (`id`, `title_post`, `body_post`, `date`) VALUES
(1, 'Judul pertama', 'Ini adalah isi pertama', '2019-07-07'),
(15, 'Fais Ihzan Jaya', 'Makhluk hidup yang bisa bernafas dengan paru-paru', '2019-07-08'),
(16, 'Untung Nur Khifni', 'Sedang Proses belajar', '2019-07-08'),
(17, 'Trian Damai', 'Tanjung Pinang', '2019-07-08'),
(18, 'Yanuar Arviansyah', 'Karang Lewas', '2019-07-08'),
(928, 'Mata Elang', 'Sebuah hewan yang berbisa', '2019-07-08'),
(929, 'Zaenurrochman', 'Karang Kesmana', '2019-07-08'),
(930, 'Izal Fanjaya', 'Kedungbanteng', '2019-07-08'),
(931, 'Manusia', 'bernafas menggunakan paru-paru', '2019-07-11'),
(932, 'Manusia', 'bernafas menggunakan paru-paru', '2019-07-11'),
(933, 'Manusia', 'bernafas menggunakan paru-paru', '2019-07-11'),
(934, 'Manusia', 'bernafas menggunakan paru-paru', '2019-07-11'),
(935, 'Manusia', 'bernafas menggunakan paru-paru', '2019-07-11'),
(936, 'Manusia', 'bernafas menggunakan paru-paru', '2019-07-11'),
(937, 'Manusia', 'bernafas menggunakan paru-paru', '2019-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id` int(30) NOT NULL,
  `judul_surat` varchar(30) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `lampiran` text NOT NULL,
  `id_user` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nidn` int(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `nidn`, `email`, `password`, `kategori`) VALUES
(1, 'Irfan santiko', 16110137, 'untungkhinfi18@gmail.com', '334rtrt', 'Dosen'),
(2, 'Trian Damai', 16110188, 'trian18@gmail.com', '334rtrt', 'Dosen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_post`
--
ALTER TABLE `tb_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_post`
--
ALTER TABLE `tb_post`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=938;

--
-- AUTO_INCREMENT for table `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
