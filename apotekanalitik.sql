-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2018 at 06:33 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `apoteker`
--

CREATE TABLE `apoteker` (
  `nama_apoteker` varchar(10) NOT NULL,
  `jenis_kelamin_apt` varchar(1) NOT NULL,
  `shift_apt` varchar(5) NOT NULL,
  `lokasi_apt` varchar(8) NOT NULL,
  `kode_apoteker` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apoteker`
--

INSERT INTO `apoteker` (`nama_apoteker`, `jenis_kelamin_apt`, `shift_apt`, `lokasi_apt`, `kode_apoteker`) VALUES
('Reky', 'P', 'Senin', 'Apotek 3', 1),
('Putri', 'P', 'Senin', 'Apotek 3', 2),
('Putra', 'L', 'Senin', 'Apotek 1', 3),
('Fadhila', 'P', 'Rabu', 'Apotek 1', 4),
('Izhal', 'L', 'Kamis', 'Apotek 3', 5),
('Izhala', 'P', 'Siang', 'Apotek 2', 6),
('Reka', 'L', 'Siang', 'Apotek 2', 7),
('Rifky', 'L', 'Siang', 'Apotek 1', 8),
('Rifka', 'P', 'Siang', 'Apotek 3', 9),
('Fadhil', 'L', 'Malam', 'Apotek 2', 10);

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE `beli` (
  `kode_obat` int(10) NOT NULL,
  `kode_pelanggan` int(10) NOT NULL,
  `kode_pembelian` int(10) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `jumlah_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beli`
--

INSERT INTO `beli` (`kode_obat`, `kode_pelanggan`, `kode_pembelian`, `tanggal_pembelian`, `jumlah_beli`) VALUES
(1, 601, 801, '2018-11-14', 3),
(2, 601, 802, '2018-11-14', 3),
(5, 602, 803, '2018-11-14', 3),
(8, 603, 804, '2018-11-07', 5),
(3, 602, 805, '2018-12-25', 4),
(4, 605, 806, '2018-12-10', 5),
(6, 603, 807, '2018-10-17', 5),
(7, 601, 808, '2018-10-01', 4),
(9, 603, 809, '2018-09-05', 6),
(10, 602, 810, '2018-09-19', 5),
(11, 604, 811, '2018-08-06', 4),
(12, 603, 812, '2018-08-28', 7),
(15, 603, 813, '2018-06-14', 9),
(13, 601, 814, '2018-07-06', 5),
(14, 604, 815, '2018-07-09', 9);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `kode_jenis` int(10) NOT NULL,
  `nama_jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_obat`
--

INSERT INTO `jenis_obat` (`kode_jenis`, `nama_jenis`) VALUES
(101, 'Tablet'),
(102, 'Serbuk'),
(103, 'Pil'),
(104, 'Kapsul'),
(105, 'Kaplet'),
(106, 'Syrup'),
(107, 'Salep'),
(108, 'Tetes'),
(109, 'Suntik');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `nama_obat` varchar(15) NOT NULL,
  `harga_obat` int(15) NOT NULL,
  `kode_obat` int(10) NOT NULL,
  `dosis_obat` varchar(3) NOT NULL,
  `kode_jenis` int(10) NOT NULL,
  `tanggal_kadaluarsa` int(2) NOT NULL,
  `bulan_kadaluarsa` varchar(12) NOT NULL,
  `tahun_kadaluarsa` int(4) NOT NULL,
  `Stok_Obat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`nama_obat`, `harga_obat`, `kode_obat`, `dosis_obat`, `kode_jenis`, `tanggal_kadaluarsa`, `bulan_kadaluarsa`, `tahun_kadaluarsa`, `Stok_Obat`) VALUES
('Konvermex', 2500, 1, '2x1', 101, 20, 'Januari', 2020, 20),
('Paracetamol', 2500, 2, '3x1', 106, 21, 'September', 2020, 30),
('Promagh', 3500, 3, '2x1', 106, 23, 'Oktober', 2020, 25),
('Mastin', 3500, 4, '1x1', 105, 20, 'Februari', 2019, 50),
('Hemavitan', 3000, 5, '2x1', 103, 30, 'Maret', 2019, 75),
('Antimo', 5000, 6, '1x1', 101, 15, 'April', 2019, 100),
('Diapet', 4000, 7, '3x1', 106, 16, 'Mei', 2019, 10),
('Vatigon', 4500, 8, '1x1', 104, 24, 'Juni', 2019, 35),
('Oskadon', 2000, 9, '2x1', 101, 27, 'Juli', 2019, 40),
('Kalpanak', 3000, 10, '3x1', 107, 23, 'Agustus', 2019, 60),
('Mylanta', 5000, 11, '2x1', 106, 18, 'September', 2019, 70),
('Paramex', 3000, 12, '2x1', 101, 25, 'Oktober', 2019, 80),
('Procold', 4000, 13, '2x1', 101, 13, 'November', 2019, 45),
('Hemaviton', 6500, 14, '3x1', 106, 3, 'April', 2019, 55),
('Inza', 5500, 15, '3x1', 101, 7, 'Maret', 2020, 65),
('Albotil', 15000, 16, '3x1', 106, 30, 'Oktober', 2019, 40),
('Ambroxol', 11000, 17, '1x1', 101, 9, 'Juni', 2019, 25),
('Alphara', 12000, 18, '1x1', 106, 18, 'Juli', 2020, 95),
('Decolgen', 8000, 19, '3x1', 101, 19, 'Desember', 2018, 60),
('Catropile', 10000, 20, '1x1', 101, 13, 'Desember', 2018, 15),
('Amoxilin', 7000, 21, '2x1', 101, 21, 'Januari', 2019, 15),
('Neutropin', 9000, 22, '3x1', 105, 7, 'Desember', 2020, 35),
('Darsi', 13000, 23, '1x1', 105, 9, 'Februari', 2020, 115),
('Amlodipin', 14000, 24, '3x1', 106, 3, 'Maret', 2020, 120),
('Komik', 5000, 25, '3x1', 105, 9, 'April', 2020, 125);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kode_pelanggan` int(10) NOT NULL,
  `nama_pelanggan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kode_pelanggan`, `nama_pelanggan`) VALUES
(601, 'Hodi'),
(602, 'Joni'),
(603, 'Wera'),
(604, 'Koni'),
(605, 'Tana');

-- --------------------------------------------------------

--
-- Table structure for table `racik`
--

CREATE TABLE `racik` (
  `kode_obat` int(10) NOT NULL,
  `kode_apoteker` int(10) NOT NULL,
  `tanggal_racik` date NOT NULL,
  `kode_racik` int(10) NOT NULL,
  `jumlah_racik` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `racik`
--

INSERT INTO `racik` (`kode_obat`, `kode_apoteker`, `tanggal_racik`, `kode_racik`, `jumlah_racik`) VALUES
(7, 3, '2018-09-11', 701, 10),
(2, 4, '2018-09-13', 702, 11);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `nama_pemasok` varchar(15) NOT NULL,
  `kode_obat` int(10) NOT NULL,
  `jumlah_pasok` int(10) NOT NULL,
  `nomer_telepon_supp` varchar(15) NOT NULL,
  `kode_pasok` int(10) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `tanggal_pasok` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`nama_pemasok`, `kode_obat`, `jumlah_pasok`, `nomer_telepon_supp`, `kode_pasok`, `harga_beli`, `tanggal_pasok`) VALUES
('Terobat', 7, 30, '081227171781', 901, 3000, '2018-12-29'),
('Hexobat', 2, 25, '085646738121', 902, 1700, '2018-12-29'),
('Naobat', 1, 50, '089887766553', 903, 1500, '2018-12-30'),
('Faobat', 5, 30, '08335552278', 904, 2000, '2018-12-31'),
('Riobat', 8, 20, '08776337489', 905, 3500, '2018-12-26'),
('Faobat', 3, 30, '08335552278', 906, 2500, '2018-12-26'),
('Faobat', 4, 30, '08335552278', 907, 2500, '2018-12-26'),
('Faobat', 6, 30, '08335552278', 908, 4000, '2018-12-27'),
('Faobat', 9, 30, '08335552278', 909, 1000, '2018-12-28'),
('Faobat', 10, 30, '08335552278', 910, 2000, '2018-12-29'),
('Faobat', 11, 30, '08335552278', 911, 4500, '2018-12-30'),
('Faobat', 12, 30, '08335552278', 912, 2000, '2018-12-31'),
('Faobat', 13, 30, '08335552278', 913, 3000, '2018-12-26'),
('Faobat', 14, 30, '08335552278', 914, 5500, '2018-12-27'),
('Faobat', 15, 30, '08335552278', 915, 4500, '2018-12-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apoteker`
--
ALTER TABLE `apoteker`
  ADD PRIMARY KEY (`kode_apoteker`);

--
-- Indexes for table `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`kode_pembelian`),
  ADD KEY `kode_obat` (`kode_obat`),
  ADD KEY `kode_pelanggan` (`kode_pelanggan`);

--
-- Indexes for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  ADD PRIMARY KEY (`kode_jenis`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`),
  ADD KEY `kode_jenis` (`kode_jenis`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `racik`
--
ALTER TABLE `racik`
  ADD PRIMARY KEY (`kode_racik`),
  ADD KEY `kode_obat` (`kode_obat`),
  ADD KEY `kode_apoteker` (`kode_apoteker`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_pasok`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beli`
--
ALTER TABLE `beli`
  ADD CONSTRAINT `beli_ibfk_1` FOREIGN KEY (`kode_pelanggan`) REFERENCES `pelanggan` (`kode_pelanggan`),
  ADD CONSTRAINT `beli_ibfk_2` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`);

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`kode_jenis`) REFERENCES `jenis_obat` (`kode_jenis`);

--
-- Constraints for table `racik`
--
ALTER TABLE `racik`
  ADD CONSTRAINT `racik_ibfk_2` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`),
  ADD CONSTRAINT `racik_ibfk_3` FOREIGN KEY (`kode_apoteker`) REFERENCES `apoteker` (`kode_apoteker`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
