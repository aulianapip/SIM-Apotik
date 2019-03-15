-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 15, 2019 at 11:28 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SIM-Apotek-Pos-Test`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `kd_satuan` varchar(6) NOT NULL,
  `nm_satuan` varchar(25) NOT NULL,
  `active` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_obat`
--

INSERT INTO `jenis_obat` (`kd_satuan`, `nm_satuan`, `active`) VALUES
('S00001', 'Tablet', 'Y'),
('S00002', 'Serbuk', 'Y'),
('S00003', 'Pil', 'Y'),
('S00004', 'Kapsul', 'T'),
('S00005', 'Kaplet', 'Y'),
('S00006', 'Syrup', 'Y'),
('S00007', 'Salep', 'Y'),
('S00008', 'Tetes', 'Y'),
('S00009', 'Suntik', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `nama_obat`
--

CREATE TABLE `nama_obat` (
  `kd_barang` varchar(5) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `kd_satuan` varchar(10) NOT NULL,
  `kd_kategori` varchar(10) NOT NULL,
  `hrg_jual` int(11) NOT NULL,
  `hrg_beli` int(11) NOT NULL,
  `active` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nama_obat`
--

INSERT INTO `nama_obat` (`kd_barang`, `nm_barang`, `kd_satuan`, `kd_kategori`, `hrg_jual`, `hrg_beli`, `active`) VALUES
('00001', 'Konvermeks', 'S00002', 'K00008', 3000, 2500, 'Y'),
('00003', 'Paracetamol', 'S00002', 'K00008', 3000, 2500, 'Y'),
('00004', 'Promagh', 'S00002', 'K00008', 4000, 3500, 'Y'),
('00005', 'Mastin', 'S00002', 'K00008', 4000, 3500, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `nama_toko`
--

CREATE TABLE `nama_toko` (
  `kd_toko` varchar(15) NOT NULL,
  `nm_toko` varchar(30) NOT NULL,
  `almt_toko` varchar(150) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `tlp_toko` varchar(15) NOT NULL,
  `fax_toko` varchar(15) NOT NULL,
  `logo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nama_toko`
--

INSERT INTO `nama_toko` (`kd_toko`, `nm_toko`, `almt_toko`, `kota`, `tlp_toko`, `fax_toko`, `logo`) VALUES
('TK001', 'Apotek UAD PRPL Kelas E', 'Jalan Ring Road Selatan, Tamanan, Banguntapan, Daerah Istimewa Yogyakarta, Indonesia 55191', 'Bantul', '3132', '3132', 'logo_sarolangun.png');

-- --------------------------------------------------------

--
-- Table structure for table `nama_user`
--

CREATE TABLE `nama_user` (
  `id_user` varchar(6) NOT NULL,
  `nm_lengkap` varchar(30) NOT NULL,
  `nm_user` varchar(25) NOT NULL,
  `password` varchar(35) NOT NULL,
  `akses` varchar(15) NOT NULL,
  `active` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nama_user`
--

INSERT INTO `nama_user` (`id_user`, `nm_lengkap`, `nm_user`, `password`, `akses`, `active`) VALUES
('UID005', 'Lara Ayu', 'ayu12045', '3737c7fc1e5f24c37f0dd56394932f41', 'Kasir', 'Y'),
('UID007', 'Superadmin', 'super', '1b3231655cebb7a1f783eddf27d254ca', 'Super', 'Y'),
('UID008', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` double NOT NULL,
  `no_transaksi` double NOT NULL,
  `no_faktur` varchar(15) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `total_penjualan` int(11) NOT NULL,
  `user` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `no_transaksi`, `no_faktur`, `tgl_penjualan`, `total_penjualan`, `user`) VALUES
(13, 56, '19031400001', '2019-03-14', 28500, 'UID005'),
(14, 57, '#19031500002', '2019-03-15', 3000, 'UID005');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id` double NOT NULL,
  `no_transaksi` double NOT NULL,
  `kd_barang` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `hrg_pokok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id`, `no_transaksi`, `kd_barang`, `jumlah`, `harga`, `sub_total`, `hrg_pokok`) VALUES
(31, 56, '00001', 1, 28500, 28500, 0),
(32, 57, '00001', 1, 3000, 3000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_tmp`
--

CREATE TABLE `penjualan_tmp` (
  `id` double NOT NULL,
  `no_faktur` double NOT NULL,
  `kd_barang` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `hrg_pokok` int(11) NOT NULL,
  `user` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  ADD PRIMARY KEY (`kd_satuan`);

--
-- Indexes for table `nama_obat`
--
ALTER TABLE `nama_obat`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `nama_toko`
--
ALTER TABLE `nama_toko`
  ADD PRIMARY KEY (`kd_toko`);

--
-- Indexes for table `nama_user`
--
ALTER TABLE `nama_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_faktur` (`no_faktur`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan_tmp`
--
ALTER TABLE `penjualan_tmp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_faktur` (`no_faktur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
