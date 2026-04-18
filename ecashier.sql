-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2019 at 11:28 AM
-- Server version: 10.3.16-MariaDB
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
-- Database: `ecashier`
--

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `bulantahun` varchar(20) NOT NULL,
  `gaji` varchar(20) NOT NULL,
  `statuspenggajian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `id`, `bulantahun`, `gaji`, `statuspenggajian`) VALUES
(6, 2, 'September 2019', '1500000', 'Sudah digaji'),
(7, 3, 'September 2019', '1500000', 'Sudah digaji'),
(8, 4, 'September 2019', '1500000', 'Sudah digaji'),
(9, 5, 'September 2019', '1450000', 'Sudah digaji'),
(10, 5, 'October 2019', '750000', 'Sudah digaji');

-- --------------------------------------------------------

--
-- Table structure for table `hasilpenghasilan`
--

CREATE TABLE `hasilpenghasilan` (
  `no_counter` int(11) NOT NULL,
  `totalpenghasilan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasilpenghasilan`
--

INSERT INTO `hasilpenghasilan` (`no_counter`, `totalpenghasilan`) VALUES
(1, 136000),
(2, 34000),
(5, 60000),
(7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `tglhadir` date NOT NULL,
  `statushadir` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id_kehadiran`, `id`, `tglhadir`, `statushadir`) VALUES
(1, 2, '2019-09-01', 'Hadir'),
(2, 3, '2019-09-01', 'Hadir'),
(3, 4, '2019-09-01', 'Hadir'),
(4, 5, '2019-09-01', 'Hadir'),
(5, 2, '2019-09-02', 'Hadir'),
(6, 3, '2019-09-02', 'Hadir'),
(7, 4, '2019-09-02', 'Hadir'),
(8, 5, '2019-09-02', 'Tidak Hadir'),
(9, 2, '2019-09-03', 'Hadir'),
(10, 3, '2019-09-03', 'Hadir'),
(11, 4, '2019-09-03', 'Hadir'),
(12, 5, '2019-09-03', 'Hadir'),
(13, 2, '2019-09-04', 'Hadir'),
(14, 3, '2019-09-04', 'Hadir'),
(15, 4, '2019-09-04', 'Hadir'),
(16, 5, '2019-09-04', 'Hadir'),
(17, 2, '2019-09-05', 'Hadir'),
(18, 3, '2019-09-05', 'Hadir'),
(19, 4, '2019-09-05', 'Hadir'),
(20, 5, '2019-09-05', 'Hadir'),
(21, 2, '2019-09-06', 'Hadir'),
(22, 3, '2019-09-06', 'Hadir'),
(23, 4, '2019-09-06', 'Hadir'),
(24, 5, '2019-09-06', 'Hadir'),
(25, 2, '2019-09-07', 'Hadir'),
(26, 3, '2019-09-07', 'Hadir'),
(27, 4, '2019-09-07', 'Hadir'),
(28, 5, '2019-09-07', 'Hadir'),
(29, 2, '2019-09-08', 'Hadir'),
(30, 3, '2019-09-08', 'Hadir'),
(31, 4, '2019-09-08', 'Hadir'),
(32, 5, '2019-09-08', 'Hadir'),
(33, 2, '2019-09-09', 'Hadir'),
(34, 3, '2019-09-09', 'Hadir'),
(35, 4, '2019-09-09', 'Hadir'),
(36, 5, '2019-09-09', 'Hadir'),
(37, 2, '2019-09-10', 'Hadir'),
(38, 3, '2019-09-10', 'Hadir'),
(39, 4, '2019-09-10', 'Hadir'),
(40, 5, '2019-09-10', 'Hadir'),
(41, 2, '2019-09-11', 'Hadir'),
(42, 3, '2019-09-11', 'Hadir'),
(43, 4, '2019-09-11', 'Hadir'),
(44, 5, '2019-09-11', 'Hadir'),
(45, 2, '2019-09-12', 'Hadir'),
(46, 3, '2019-09-12', 'Hadir'),
(47, 4, '2019-09-12', 'Hadir'),
(48, 5, '2019-09-12', 'Hadir'),
(49, 2, '2019-09-13', 'Hadir'),
(50, 3, '2019-09-13', 'Hadir'),
(51, 4, '2019-09-13', 'Hadir'),
(52, 5, '2019-09-13', 'Hadir'),
(53, 2, '2019-09-14', 'Hadir'),
(54, 3, '2019-09-14', 'Hadir'),
(55, 4, '2019-09-14', 'Hadir'),
(56, 5, '2019-09-14', 'Hadir'),
(57, 2, '2019-09-15', 'Hadir'),
(58, 3, '2019-09-15', 'Hadir'),
(59, 4, '2019-09-15', 'Hadir'),
(60, 5, '2019-09-15', 'Hadir'),
(61, 2, '2019-09-16', 'Hadir'),
(62, 3, '2019-09-16', 'Hadir'),
(63, 4, '2019-09-16', 'Hadir'),
(64, 5, '2019-09-16', 'Hadir'),
(65, 2, '2019-09-17', 'Hadir'),
(66, 3, '2019-09-17', 'Hadir'),
(67, 4, '2019-09-17', 'Hadir'),
(68, 5, '2019-09-17', 'Hadir'),
(69, 2, '2019-09-18', 'Hadir'),
(70, 3, '2019-09-18', 'Hadir'),
(71, 4, '2019-09-18', 'Hadir'),
(72, 5, '2019-09-18', 'Hadir'),
(73, 2, '2019-09-19', 'Hadir'),
(74, 3, '2019-09-19', 'Hadir'),
(75, 4, '2019-09-19', 'Hadir'),
(76, 5, '2019-09-19', 'Hadir'),
(77, 2, '2019-09-20', 'Hadir'),
(78, 3, '2019-09-20', 'Hadir'),
(79, 4, '2019-09-20', 'Hadir'),
(80, 5, '2019-09-20', 'Hadir'),
(81, 2, '2019-09-21', 'Hadir'),
(82, 3, '2019-09-21', 'Hadir'),
(83, 4, '2019-09-21', 'Hadir'),
(84, 5, '2019-09-21', 'Hadir'),
(85, 2, '2019-09-22', 'Hadir'),
(86, 3, '2019-09-22', 'Hadir'),
(87, 4, '2019-09-22', 'Hadir'),
(88, 5, '2019-09-22', 'Hadir'),
(89, 2, '2019-09-23', 'Hadir'),
(90, 3, '2019-09-23', 'Hadir'),
(91, 4, '2019-09-23', 'Hadir'),
(92, 5, '2019-09-23', 'Hadir'),
(93, 2, '2019-09-24', 'Hadir'),
(94, 3, '2019-09-24', 'Hadir'),
(95, 4, '2019-09-24', 'Hadir'),
(96, 5, '2019-09-24', 'Hadir'),
(97, 2, '2019-09-25', 'Hadir'),
(98, 3, '2019-09-25', 'Hadir'),
(99, 4, '2019-09-25', 'Hadir'),
(100, 5, '2019-09-25', 'Hadir'),
(101, 2, '2019-09-26', 'Hadir'),
(102, 3, '2019-09-26', 'Hadir'),
(103, 4, '2019-09-26', 'Hadir'),
(104, 5, '2019-09-26', 'Hadir'),
(105, 2, '2019-09-27', 'Hadir'),
(106, 3, '2019-09-27', 'Hadir'),
(107, 4, '2019-09-27', 'Hadir'),
(108, 5, '2019-09-27', 'Hadir'),
(109, 2, '2019-09-28', 'Hadir'),
(110, 3, '2019-09-28', 'Hadir'),
(111, 4, '2019-09-28', 'Hadir'),
(112, 5, '2019-09-28', 'Hadir'),
(113, 2, '2019-09-29', 'Hadir'),
(114, 3, '2019-09-29', 'Hadir'),
(115, 4, '2019-09-29', 'Hadir'),
(116, 5, '2019-09-29', 'Hadir'),
(117, 2, '2019-09-30', 'Hadir'),
(118, 3, '2019-09-30', 'Hadir'),
(119, 4, '2019-09-30', 'Hadir'),
(120, 5, '2019-09-30', 'Hadir'),
(121, 2, '2019-10-01', 'Hadir'),
(122, 3, '2019-10-01', 'Hadir'),
(123, 4, '2019-10-01', 'Hadir'),
(124, 5, '2019-10-01', 'Hadir'),
(125, 2, '2019-10-02', 'Hadir'),
(126, 3, '2019-10-02', 'Hadir'),
(127, 4, '2019-10-02', 'Hadir'),
(128, 5, '2019-10-02', 'Hadir'),
(129, 2, '2019-10-03', 'Hadir'),
(130, 3, '2019-10-03', 'Hadir'),
(131, 4, '2019-10-03', 'Hadir'),
(132, 5, '2019-10-03', 'Hadir'),
(133, 2, '2019-10-04', 'Hadir'),
(134, 3, '2019-10-04', 'Hadir'),
(135, 4, '2019-10-04', 'Hadir'),
(136, 5, '2019-10-04', 'Hadir'),
(137, 2, '2019-10-05', 'Hadir'),
(138, 3, '2019-10-05', 'Hadir'),
(139, 4, '2019-10-05', 'Hadir'),
(140, 5, '2019-10-05', 'Hadir'),
(141, 2, '2019-10-06', 'Hadir'),
(142, 3, '2019-10-06', 'Hadir'),
(143, 4, '2019-10-06', 'Hadir'),
(144, 5, '2019-10-06', 'Hadir'),
(145, 2, '2019-10-07', 'Hadir'),
(146, 3, '2019-10-07', 'Hadir'),
(147, 4, '2019-10-07', 'Hadir'),
(148, 5, '2019-10-07', 'Hadir'),
(149, 2, '2019-10-08', 'Hadir'),
(150, 3, '2019-10-08', 'Hadir'),
(151, 4, '2019-10-08', 'Hadir'),
(152, 5, '2019-10-08', 'Hadir'),
(153, 2, '2019-10-09', 'Hadir'),
(154, 3, '2019-10-09', 'Hadir'),
(155, 4, '2019-10-09', 'Hadir'),
(156, 5, '2019-10-09', 'Hadir'),
(157, 2, '2019-10-10', 'Hadir'),
(158, 3, '2019-10-10', 'Hadir'),
(159, 4, '2019-10-10', 'Hadir'),
(160, 5, '2019-10-10', 'Hadir'),
(161, 2, '2019-10-11', 'Hadir'),
(162, 3, '2019-10-11', 'Hadir'),
(163, 4, '2019-10-11', 'Hadir'),
(164, 5, '2019-10-11', 'Hadir'),
(165, 2, '2019-10-12', 'Hadir'),
(166, 3, '2019-10-12', 'Hadir'),
(167, 4, '2019-10-12', 'Hadir'),
(168, 5, '2019-10-12', 'Hadir'),
(169, 2, '2019-10-13', 'Hadir'),
(170, 3, '2019-10-13', 'Tidak Hadir'),
(171, 4, '2019-10-13', 'Hadir'),
(172, 5, '2019-10-13', 'Tidak Hadir'),
(173, 2, '2019-10-14', 'Hadir'),
(174, 3, '2019-10-14', 'Hadir'),
(175, 4, '2019-10-14', 'Hadir'),
(176, 5, '2019-10-14', 'Hadir'),
(177, 2, '2019-10-15', 'Hadir'),
(178, 3, '2019-10-15', 'Tidak Hadir'),
(179, 4, '2019-10-15', 'Hadir'),
(180, 5, '2019-10-15', 'Hadir'),
(181, 2, '2019-10-16', 'Hadir'),
(182, 3, '2019-10-16', 'Tidak Hadir'),
(183, 4, '2019-10-16', 'Hadir'),
(184, 5, '2019-10-16', 'Hadir'),
(185, 2, '2019-12-03', 'Hadir'),
(186, 3, '2019-12-03', 'Tidak Hadir'),
(187, 4, '2019-12-03', 'Hadir'),
(188, 5, '2019-12-03', 'Hadir'),
(189, 8, '2019-12-03', 'Hadir'),
(190, 2, '2019-12-04', 'Hadir'),
(191, 3, '2019-12-04', 'Hadir'),
(192, 4, '2019-12-04', 'Hadir'),
(193, 5, '2019-12-04', 'Tidak Hadir'),
(194, 8, '2019-12-04', 'Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(20) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `notlp` varchar(12) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `gaji` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama_pegawai`, `jeniskelamin`, `tgllahir`, `alamat`, `notlp`, `jabatan`, `gaji`) VALUES
(1, 'Bima', 'Laki-Laki', '1998-04-10', 'Bandung', '080880801111', 'Administrasi', '200000'),
(2, 'Nurhayati', 'Perempuan', '1995-09-03', 'Jakarta', '087712341234', 'Operator Kasir', '2000000'),
(3, 'Yudi', 'Laki-Laki', '1997-05-12', 'Solo', '088012344321', 'Petugas Kebersihan', '2000000'),
(4, 'Juned', 'Laki-Laki', '1998-10-03', 'Sukabumi', '082213429861', 'Petugas Kebersihan', '2000000'),
(5, 'Ahmad', 'Laki-Laki', '1980-11-01', 'Bandung', '088888888888', 'Petugas Kebersihan', '2000000'),
(8, 'aang', 'Laki-Laki', '1980-04-01', 'Bandung', '081111111288', 'Petugas Kebersihan', ''),
(9, 'agustus', 'Laki-Laki', '1980-01-01', 'adassa', '081111111111', 'tukang pel', ''),
(10, 'agustus', 'Laki-Laki', '1980-01-01', 'adassa', '080000000000', 'sudah diterima jam s', '');

-- --------------------------------------------------------

--
-- Table structure for table `penarikan`
--

CREATE TABLE `penarikan` (
  `id_penarikan` int(11) NOT NULL,
  `no_counter` int(11) NOT NULL,
  `tglpenarikan` date NOT NULL,
  `jmlpenarikan` float NOT NULL,
  `sisapenghasilan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penarikan`
--

INSERT INTO `penarikan` (`id_penarikan`, `no_counter`, `tglpenarikan`, `jmlpenarikan`, `sisapenghasilan`) VALUES
(2, 1, '2019-10-09', 3000, 33000),
(3, 2, '2019-11-22', 10000, 34000);

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `no_counter` int(11) NOT NULL,
  `nama_penyewa` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `notlp` varchar(12) NOT NULL,
  `tglawalsewa` date NOT NULL,
  `tglakhirsewa` date NOT NULL,
  `biaya` float NOT NULL,
  `bayar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`no_counter`, `nama_penyewa`, `alamat`, `notlp`, `tglawalsewa`, `tglakhirsewa`, `biaya`, `bayar`) VALUES
(1, 'Bambang', 'Bandung', '083344441111', '2019-09-02', '2019-10-02', 1000000, 1000000),
(2, 'Aldi', 'Bandung', '081111111112', '2019-10-15', '2020-01-15', 3000000, 1000000),
(5, 'Nur', 'Bandung', '081231231231', '2019-10-13', '2020-01-13', 3000000, 3000000),
(7, 'Yuli', 'Band', '087878787899', '2019-12-03', '2020-01-03', 1000000, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_counter` int(11) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `makan_minum` varchar(100) NOT NULL,
  `totalharga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_counter`, `tgltransaksi`, `makan_minum`, `totalharga`) VALUES
(2, 1, '2019-10-08', 'Nasi Katsu', 16000),
(6, 1, '2019-10-09', 'Udang Bakar', 20000),
(7, 1, '2019-10-13', 'Ayam Bakar, Air Botol', 23000),
(8, 1, '2019-10-13', 'Nasi Goreng Sosis', 13000),
(9, 5, '2019-10-14', 'Nasi Goreng', 12000),
(10, 5, '2019-10-14', 'Nasi Goreng ', 10000),
(11, 2, '2019-10-15', 'Mie Goreng Double + telur', 14000),
(12, 2, '2019-10-15', 'Mie Rebus', 10000),
(13, 2, '2019-10-15', 'Mie Goreng', 10000),
(14, 5, '2019-10-15', 'Nasi Goreng ', 12000),
(15, 1, '2019-10-15', 'Udang Bakar', 20000),
(16, 1, '2019-10-15', 'Mie Goreng', 10000),
(17, 1, '2019-10-15', 'Mie Goreng Double', 13000),
(18, 1, '2019-10-15', 'Ayam Bakar Madu', 16000),
(19, 5, '2019-10-15', 'Nasi Goreng Sosis', 13000),
(20, 1, '2019-10-15', 'Nasi Goreng', 10000),
(21, 2, '2019-11-21', 'Udang', 10000),
(22, 5, '2019-11-22', 'Mie Goreng Double Telor', 13000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `id`) VALUES
('admin', 'admin1', 1),
('kasir', 'kasir1', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `hasilpenghasilan`
--
ALTER TABLE `hasilpenghasilan`
  ADD PRIMARY KEY (`no_counter`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penarikan`
--
ALTER TABLE `penarikan`
  ADD PRIMARY KEY (`id_penarikan`),
  ADD KEY `penarikan_ibfk_1` (`no_counter`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`no_counter`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `transaksi_ibfk_1` (`no_counter`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penarikan`
--
ALTER TABLE `penarikan`
  MODIFY `id_penarikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `no_counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hasilpenghasilan`
--
ALTER TABLE `hasilpenghasilan`
  ADD CONSTRAINT `hasilpenghasilan_ibfk_1` FOREIGN KEY (`no_counter`) REFERENCES `penyewa` (`no_counter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penarikan`
--
ALTER TABLE `penarikan`
  ADD CONSTRAINT `penarikan_ibfk_1` FOREIGN KEY (`no_counter`) REFERENCES `penyewa` (`no_counter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`no_counter`) REFERENCES `penyewa` (`no_counter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
