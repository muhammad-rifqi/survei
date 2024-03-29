-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2022 at 01:54 PM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survei`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE IF NOT EXISTS `agama` (
  `id` int(11) NOT NULL,
  `nama_agama` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `nama_agama`) VALUES
(1, 'Islam'),
(2, 'Protestan'),
(3, 'Hindu'),
(4, 'Budha'),
(6, 'Khatolik');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE IF NOT EXISTS `jawaban` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pemilih` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `jawaban` varchar(100) NOT NULL,
  `point` int(11) NOT NULL,
  `benar` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `id_user`, `id_pemilih`, `id_pertanyaan`, `jawaban`, `point`, `benar`) VALUES
(11, 3, 6, 2, 'A', 0, 'A'),
(13, 3, 8, 4, 'A', 0, 'A'),
(14, 3, 9, 2, 'A', 0, 'A'),
(15, 3, 10, 2, 'A', 0, 'A'),
(16, 3, 11, 2, 'A', 0, 'A'),
(17, 3, 12, 2, 'A', 0, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `id_kota`, `nama_kecamatan`) VALUES
(2, 3, 'Sukabumi'),
(3, 5, 'Tiakar');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `nama_kota` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `id_provinsi`, `nama_kota`) VALUES
(3, 8, 'Bandung'),
(5, 3, 'Payakumbuh'),
(6, 8, 'Cimahi');

-- --------------------------------------------------------

--
-- Table structure for table `pemilih`
--

CREATE TABLE IF NOT EXISTS `pemilih` (
  `id` int(11) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `suku` int(11) NOT NULL,
  `agama` int(11) NOT NULL,
  `provinsi` int(11) NOT NULL,
  `kota` int(11) NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `umur` int(11) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemilih`
--

INSERT INTO `pemilih` (`id`, `no_ktp`, `nama`, `email`, `suku`, `agama`, `provinsi`, `kota`, `kecamatan`, `umur`, `pekerjaan`, `alamat`, `foto`, `token`, `latitude`, `longitude`, `id_user`) VALUES
(6, '10890983495893', 'muhammad rifki', 'muhammad45rifki@gmail.com', 2, 1, 8, 3, 2, 45, 'petani', 'ciputat, tangerang selatan', 'rifki.JPG', 'lehjatmq7flmal56aragsspq7u', '-6.5971469', '106.8060388', 3),
(9, '37879863458683', 'Rizky Darmawan', 'darmawanrizsky@gmail.com', 1, 1, 8, 3, 2, 34, 'karyawanswasta', 'Pamulang', 'image9.jpg', '0d5obp3lor91t92n8gokt0kb9d', '-6.1169309', '106.1538519', 3),
(10, '37879863458683', 'Khalid', 'khalid@localhost', 1, 1, 8, 3, 2, 26, 'karyawanswasta', 'ciputat, tangerang selatan', 'lmpattra.jpeg', '7bjlrg1chudcgo973vhvll7h67', '-6.4408153', '106.7415669', 3),
(11, '3781874873346876834', 'Andra Backbone', 'andra@gmail.com', 1, 1, 8, 3, 2, 39, 'karyawanswasta', 'blok M jakarta', '168345580_201189575101824_8910491921445866768_n.jpeg', 'mbt1fkl60j8vuk5un64n48tot2', '-6.5971469', '106.8060388', 3),
(12, '10890983495893', 'Rahman', 'rahman@localhost', 1, 1, 8, 3, 2, 40, 'karyawanswasta', 'Kebayoran Lama , jakarta selatan', 'warna-nodrop.PNG', '7menpo4nvr629hjamghd2gi9l1', '-6.5971469', '106.8060388', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE IF NOT EXISTS `pertanyaan` (
  `id` int(11) NOT NULL,
  `soal` text NOT NULL,
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `jawaban` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `provinsi` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `soal`, `a`, `b`, `c`, `d`, `jawaban`, `foto`, `provinsi`) VALUES
(1, 'Siapakah Presiden indonesia tahun 2022', 'SBY', 'Jokowi', 'Habibi', 'Megawati', 'B', 'images.jpeg', 5),
(2, 'Siapakah Penemu Gravitasi ', 'Newton', 'Harry Potter', 'Spider', 'Superman', 'A', 'download.jpeg', 8),
(4, 'Dimanakah letak negara indonesia ??', 'Benua Asia', 'Benua Afrika', '', '', 'A', 'Login.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `id` int(11) NOT NULL,
  `nama_provinsi` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama_provinsi`) VALUES
(1, 'Aceh'),
(2, 'Medan'),
(3, 'Sumatera barat'),
(4, 'Riau'),
(5, 'Lampung'),
(6, 'Bengkulu'),
(7, 'Palembang'),
(8, 'Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `suku`
--

CREATE TABLE IF NOT EXISTS `suku` (
  `id` int(11) NOT NULL,
  `nama_suku` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suku`
--

INSERT INTO `suku` (`id`, `nama_suku`) VALUES
(1, 'Sunda'),
(2, 'Minang'),
(3, 'Bugis');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('admin','surveyor') NOT NULL DEFAULT 'surveyor'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(3, 'mudasir', 'b2614e8ef4ae3e38c2ff86344556ee5a', 'surveyor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suku`
--
ALTER TABLE `suku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pemilih`
--
ALTER TABLE `pemilih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `suku`
--
ALTER TABLE `suku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
