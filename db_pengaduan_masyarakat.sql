-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2021 at 01:00 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengaduan_masyarakat`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `login_masyarakat` (IN `user` VARCHAR(35), IN `pass` VARCHAR(255))  SELECT * FROM tb_masyarakat WHERE masyarakat_username = user AND masyarakat_password = pass$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login_petugas` (IN `user` VARCHAR(35), IN `pass` VARCHAR(255))  SELECT * FROM tb_petugas WHERE petugas_username = user AND petugas_password = pass$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_masyarakat`
--

CREATE TABLE `tb_masyarakat` (
  `masyarakat_nik` char(16) NOT NULL,
  `masyarakat_nama` varchar(35) NOT NULL,
  `masyarakat_username` varchar(25) NOT NULL,
  `masyarakat_password` varchar(255) NOT NULL,
  `masyarakat_telp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_masyarakat`
--

INSERT INTO `tb_masyarakat` (`masyarakat_nik`, `masyarakat_nama`, `masyarakat_username`, `masyarakat_password`, `masyarakat_telp`) VALUES
('320192324234823', 'apip', 'apip', '235698e7b1e003df7d695eebf458363ed638cf81', ''),
('3400123456123456', 'nama masyarakat', 'masyarakat', '12ecbdc192c678a410bcf7f3b48b168f3640287a', NULL),
('340012345612368', 'user', 'user', '95c946bf622ef93b0a211cd0fd028dfdfcf7e39e', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaduan`
--

CREATE TABLE `tb_pengaduan` (
  `pengaduan_id` int(11) NOT NULL,
  `pengaduan_tgl` date NOT NULL,
  `pengaduan_nik` char(16) NOT NULL,
  `pengaduan_judul` text NOT NULL,
  `pengaduan_isi` text NOT NULL,
  `pengaduan_foto` varchar(255) DEFAULT NULL,
  `pengaduan_status` enum('0','Proses','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengaduan`
--

INSERT INTO `tb_pengaduan` (`pengaduan_id`, `pengaduan_tgl`, `pengaduan_nik`, `pengaduan_judul`, `pengaduan_isi`, `pengaduan_foto`, `pengaduan_status`) VALUES
(1, '2021-03-08', '3400123456123456', 'ini judul pengaduan', 'ini isi dari judul pengaduan', NULL, '0'),
(2, '2021-03-16', '340012345612368', 'ini judul', 'laporan', NULL, '0'),
(3, '2021-03-19', '340012345612368', 'Lorem Ipsum', 'isian', NULL, '0'),
(4, '2021-03-25', '340012345612368', 'Lorem Ipsum', 'erere', '1-12.png', '0'),
(5, '2021-03-17', '340012345612368', 'Lorem', 'asdsad', '1-13.png', '0'),
(6, '2021-03-31', '340012345612368', 'judul wisata', 'sad', 'business-man-outdoors-near-business-center-ZTW9HUC-e1604944953967.jpg', 'Selesai'),
(7, '2021-03-26', '340012345612368', 'Wisata Alam Kalibiru', 'kalibiru', '63958-Array.jpg', '0'),
(8, '2021-03-26', '340012345612368', 'Taman Tebing Breksi Prambanan', 'erthj', '81795-.png', 'Proses'),
(9, '2021-03-29', '340012345612368', 'ini laporan', 'masukan laporan yang anda inginkan', '96275-.jpeg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `petugas_id` int(11) NOT NULL,
  `petugas_nama` varchar(35) NOT NULL,
  `petugas_username` varchar(25) NOT NULL,
  `petugas_password` varchar(255) NOT NULL,
  `petugas_telp` varchar(13) DEFAULT NULL,
  `petugas_level` enum('Admin','Petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`petugas_id`, `petugas_nama`, `petugas_username`, `petugas_password`, `petugas_telp`, `petugas_level`) VALUES
(1, 'nama petugas', 'petugas', 'aa027e41edc3372c35646eb382168ecd7092de7a', NULL, 'Petugas'),
(2, 'nama admin', 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', NULL, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tanggapan`
--

CREATE TABLE `tb_tanggapan` (
  `tanggapan_id` int(11) NOT NULL,
  `tanggapan_pengaduan_id` int(11) NOT NULL,
  `tanggapan_tgl` date NOT NULL,
  `tanggapan_isi` text NOT NULL,
  `tanggapan_petugas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tanggapan`
--

INSERT INTO `tb_tanggapan` (`tanggapan_id`, `tanggapan_pengaduan_id`, `tanggapan_tgl`, `tanggapan_isi`, `tanggapan_petugas_id`) VALUES
(1, 1, '2021-03-08', 'ini tanggapan dari judul pengaduan', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD PRIMARY KEY (`masyarakat_nik`);

--
-- Indexes for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD PRIMARY KEY (`pengaduan_id`),
  ADD KEY `pengaduan_nik` (`pengaduan_nik`) USING BTREE;

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`petugas_id`);

--
-- Indexes for table `tb_tanggapan`
--
ALTER TABLE `tb_tanggapan`
  ADD PRIMARY KEY (`tanggapan_id`),
  ADD KEY `tb_tanggapan_ibfk_1` (`tanggapan_petugas_id`),
  ADD KEY `tb_tanggapan_ibfk_2` (`tanggapan_pengaduan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  MODIFY `pengaduan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `petugas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_tanggapan`
--
ALTER TABLE `tb_tanggapan`
  MODIFY `tanggapan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD CONSTRAINT `tb_pengaduan_ibfk_1` FOREIGN KEY (`pengaduan_nik`) REFERENCES `tb_masyarakat` (`masyarakat_nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_tanggapan`
--
ALTER TABLE `tb_tanggapan`
  ADD CONSTRAINT `tb_tanggapan_ibfk_1` FOREIGN KEY (`tanggapan_petugas_id`) REFERENCES `tb_petugas` (`petugas_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_tanggapan_ibfk_2` FOREIGN KEY (`tanggapan_pengaduan_id`) REFERENCES `tb_pengaduan` (`pengaduan_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
