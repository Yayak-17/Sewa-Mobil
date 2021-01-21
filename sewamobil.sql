-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2020 at 07:30 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewamobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `status_bayar` enum('Lunas','DP') NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `kurang` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id_bayar`, `tgl_bayar`, `status_bayar`, `total_bayar`, `kurang`, `id_sewa`) VALUES
(1, '2020-05-13', 'Lunas', 2400000, 0, 1),
(2, '2020-05-15', 'Lunas', 4850000, 0, 2),
(3, '2020-05-14', 'Lunas', 2400000, 0, 3),
(4, '2020-05-15', 'Lunas', 2400000, 0, 4),
(5, '2020-05-15', 'Lunas', 2450000, 0, 5),
(6, '2020-05-15', 'Lunas', 2400000, 0, 6),
(7, '2020-05-15', 'Lunas', 4850000, 0, 7),
(8, '2020-05-15', 'DP', 100000, 2350000, 8),
(9, '2020-05-15', 'DP', 100000, 4750000, 9),
(10, '2020-05-16', 'Lunas', 4800000, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `jaminan`
--

CREATE TABLE `jaminan` (
  `id_jaminan` int(11) NOT NULL,
  `jenis_jaminan` enum('STNK Motor','KTP') NOT NULL,
  `no_jaminan` varchar(20) NOT NULL,
  `atas_nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jaminan`
--

INSERT INTO `jaminan` (`id_jaminan`, `jenis_jaminan`, `no_jaminan`, `atas_nama`) VALUES
(1, 'STNK Motor', '12345', 'Yayak'),
(2, 'STNK Motor', '12345', 'Yayak'),
(3, 'STNK Motor', '54321', 'Messi'),
(4, 'STNK Motor', '12345', 'Bean'),
(5, 'STNK Motor', '12345', 'Bean'),
(6, 'STNK Motor', '12345', 'Yayak'),
(7, 'STNK Motor', '12345', 'Yayak'),
(8, 'STNK Motor', '45678', 'Bean'),
(9, 'STNK Motor', '12345', 'Siska'),
(10, 'STNK Motor', '567890', 'Azza'),
(11, 'KTP', '765489', 'Siska'),
(12, 'STNK Motor', '8765432', 'Bean'),
(13, 'STNK Motor', '12345678', 'Azza');

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan`
-- (See below for the actual view)
--
CREATE TABLE `laporan` (
`merek` varchar(20)
,`nama_mobil` varchar(20)
,`warna` varchar(20)
,`nama_penyewa` varchar(40)
,`nama_sopir` varchar(40)
,`jenis_jaminan` enum('STNK Motor','KTP')
,`tgl_sewa` date
,`lama_sewa` int(11)
,`harga_sewa` int(11)
,`tgl_kembali` date
,`denda` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `no_polisi` char(20) NOT NULL,
  `merek` varchar(20) NOT NULL,
  `nama_mobil` varchar(20) NOT NULL,
  `jenis` enum('Matic','Manual') NOT NULL,
  `warna` varchar(20) NOT NULL,
  `status_mobil` enum('Disewa','Tidak Disewa') NOT NULL DEFAULT 'Tidak Disewa',
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `no_polisi`, `merek`, `nama_mobil`, `jenis`, `warna`, `status_mobil`, `harga`) VALUES
(6, 'AG 12345', 'Toyota', 'Fortuner', 'Manual', 'Putih', 'Disewa', 200000),
(7, 'N 12345', 'Honda', 'Jazz', 'Manual', 'Hitam', 'Disewa', 100000),
(8, 'N 876543', 'Mitsubishi', 'Pajero', 'Manual', 'Hitam', 'Disewa', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` int(11) DEFAULT NULL,
  `id_sewa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `tgl_kembali`, `denda`, `id_sewa`) VALUES
(1, '2020-05-13', 0, 1),
(2, '2020-05-14', 0, 3),
(3, '2020-05-15', 0, 4),
(4, '2020-05-15', 0, 5),
(5, '2020-05-15', 0, 6),
(6, '2020-05-15', 100000, 2),
(7, '2020-05-15', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `id_penyewa` int(11) NOT NULL,
  `nama_penyewa` varchar(40) NOT NULL,
  `alamat_penyewa` varchar(40) NOT NULL,
  `notlp_penyewa` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`id_penyewa`, `nama_penyewa`, `alamat_penyewa`, `notlp_penyewa`, `username`, `password`, `gender`) VALUES
(1, 'Yayak', 'Blitar', '08765354298', 'yayak', 'yayak', 'Laki-Laki'),
(2, 'Siska', 'Malang', '087654765980', 'siska', 'siska', 'Perempuan'),
(3, 'Messi', 'Surabaya', '08176589765', 'messi', 'messi', 'Laki-Laki'),
(4, 'Bean', 'Jakarta', '087654789655', 'pengguna', 'pengguna', 'Laki-Laki'),
(5, 'Azza', 'Blitar', '081865765876', 'azza', 'azza', 'Laki-Laki');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `id_penyewa` int(11) NOT NULL,
  `id_jaminan` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `tgl_boking` date DEFAULT NULL,
  `id_sopir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_mobil`, `id_penyewa`, `id_jaminan`, `tgl_sewa`, `lama_sewa`, `harga_sewa`, `tgl_boking`, `id_sopir`) VALUES
(1, 7, 1, 1, '2020-05-13', 24, 2400000, NULL, 1),
(2, 6, 1, 1, '2020-05-13', 24, 4850000, NULL, 2),
(3, 7, 3, 3, '2020-05-14', 24, 2400000, NULL, 1),
(4, 7, 1, 1, '2020-05-15', 24, 2400000, NULL, 1),
(5, 7, 4, 8, '2020-05-15', 24, 2450000, NULL, 3),
(6, 7, 2, 1, '2020-05-15', 24, 2400000, NULL, 1),
(7, 6, 5, 10, '2020-05-15', 24, 4850000, NULL, 4),
(8, 7, 2, 11, '2020-05-15', 24, 2450000, NULL, 5),
(9, 6, 4, 12, '2020-05-15', 24, 4850000, NULL, 4),
(10, 8, 5, 13, '2020-05-16', 24, 4800000, NULL, 1);

--
-- Triggers `sewa`
--
DELIMITER $$
CREATE TRIGGER `update_status_mobil` AFTER INSERT ON `sewa` FOR EACH ROW BEGIN UPDATE mobil SET status_mobil = "disewa" WHERE id_mobil = NEW.id_mobil;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sopir`
--

CREATE TABLE `sopir` (
  `id_sopir` int(11) NOT NULL,
  `nama_sopir` varchar(40) NOT NULL,
  `alamat_sopir` varchar(40) NOT NULL,
  `no_tlp_sopir` varchar(20) NOT NULL,
  `status_sopir` enum('Disewa','Tidak Disewa') NOT NULL DEFAULT 'Tidak Disewa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sopir`
--

INSERT INTO `sopir` (`id_sopir`, `nama_sopir`, `alamat_sopir`, `no_tlp_sopir`, `status_sopir`) VALUES
(1, 'Tanpa Sopir', 'Tanpa Sopir', 'Tanpa Sopir', 'Tidak Disewa'),
(2, 'Bambang', 'Magelang', '087987908565', 'Tidak Disewa'),
(3, 'Budi', 'Medan', '087987908565', 'Tidak Disewa'),
(4, 'Maman', 'Jember', '081645567890', 'Disewa'),
(5, 'Kari', 'Kediri', '087987908565', 'Disewa');

-- --------------------------------------------------------

--
-- Structure for view `laporan`
--
DROP TABLE IF EXISTS `laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan`  AS  select `mobil`.`merek` AS `merek`,`mobil`.`nama_mobil` AS `nama_mobil`,`mobil`.`warna` AS `warna`,`penyewa`.`nama_penyewa` AS `nama_penyewa`,`sopir`.`nama_sopir` AS `nama_sopir`,`jaminan`.`jenis_jaminan` AS `jenis_jaminan`,`sewa`.`tgl_sewa` AS `tgl_sewa`,`sewa`.`lama_sewa` AS `lama_sewa`,`sewa`.`harga_sewa` AS `harga_sewa`,`pengembalian`.`tgl_kembali` AS `tgl_kembali`,`pengembalian`.`denda` AS `denda` from (((((`sewa` join `mobil` on(`sewa`.`id_mobil` = `mobil`.`id_mobil`)) join `penyewa` on(`sewa`.`id_penyewa` = `penyewa`.`id_penyewa`)) join `sopir` on(`sewa`.`id_sopir` = `sopir`.`id_sopir`)) join `pengembalian` on(`sewa`.`id_sewa` = `pengembalian`.`id_sewa`)) join `jaminan` on(`sewa`.`id_jaminan` = `jaminan`.`id_jaminan`)) where `sewa`.`id_mobil` = `mobil`.`id_mobil` and `sewa`.`id_penyewa` = `penyewa`.`id_penyewa` and `sewa`.`id_sopir` = `sopir`.`id_sopir` and `sewa`.`id_jaminan` = `jaminan`.`id_jaminan` and `sewa`.`id_sewa` = `pengembalian`.`id_sewa` and `sewa`.`id_jaminan` = `jaminan`.`id_jaminan` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `bayar_FK` (`id_sewa`);

--
-- Indexes for table `jaminan`
--
ALTER TABLE `jaminan`
  ADD PRIMARY KEY (`id_jaminan`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `pengembalian_FK` (`id_sewa`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id_penyewa`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `sewa_FK_1` (`id_mobil`),
  ADD KEY `sewa_FK_2` (`id_penyewa`),
  ADD KEY `sewa_FK` (`id_jaminan`);

--
-- Indexes for table `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`id_sopir`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jaminan`
--
ALTER TABLE `jaminan`
  MODIFY `id_jaminan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id_penyewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sopir`
--
ALTER TABLE `sopir`
  MODIFY `id_sopir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bayar`
--
ALTER TABLE `bayar`
  ADD CONSTRAINT `bayar_FK` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`id_sewa`);

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_FK` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`id_sewa`);

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_FK` FOREIGN KEY (`id_jaminan`) REFERENCES `jaminan` (`id_jaminan`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `denda` ON SCHEDULE EVERY 1 DAY STARTS '2020-04-24 22:15:03' ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO pengembalian(SELECT null, id_sewa, 100000 FROM pengembalian WHERE tgl_kembali = CURDATE())$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
