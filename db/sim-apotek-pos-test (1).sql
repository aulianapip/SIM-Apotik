-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2019 at 07:36 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim-apotek-pos-test`
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
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `tgl_daftar` date NOT NULL,
  `tipe` char(2) NOT NULL,
  `ID` double NOT NULL,
  `Nama` varchar(35) NOT NULL,
  `Jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `NoHp` varchar(15) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`tgl_daftar`, `tipe`, `ID`, `Nama`, `Jk`, `NoHp`, `Email`, `Alamat`) VALUES
('2019-04-07', 'm', 1003, 'carto', 'Laki-Laki', '085324798655', 'zone9robe@gmail.com', 'jogja'),
('2019-04-07', 'm', 1004, 'wais', 'Laki-Laki', '089765432167', 'w.alqorni240@gmail.com', 'jogja'),
('2019-04-07', 'm', 1005, 'putra', 'Laki-Laki', '087654344518', 'putraaditya1877@gmail.com', 'jogja'),
('2019-04-07', 'm', 1006, 'ripki', 'Laki-Laki', '087890012567', 'muhammadrifkifajri@gmail.com', 'jogja'),
('2019-04-07', 'm', 1007, 'herni', 'Perempuan', '081324555789', 'hernism7@gmail.com', 'jogja'),
('2019-04-07', 'm', 1008, 'amanda', 'Perempuan', '082313555777', 'fahmidyna25@gmail.com', 'jogja'),
('2019-04-07', 'm', 1009, 'cendani', 'Laki-Laki', '081325777834', 'cendaniasih@gmail.com', 'magelang'),
('2019-04-13', 'm', 1011, 'Harun Setiaji', 'Laki-Laki', '085701265598', 'harunsetiaji8@gmail.com', 'Magelang'),
('2019-04-13', 'm', 1012, 'Vikri Ammar Kholis', 'Laki-Laki', '087871234588', 'vikriammar@gmail.com', 'Serang, Banten'),
('2019-04-13', 'm', 1013, 'tesya', 'Perempuan', '081325678900', 'tesyapratiwi@gmal.com', 'jogja'),
('2019-05-04', 'm', 1014, 'Danial Arief', 'Laki-Laki', '08131112098', 'danialarif@gmail.com', 'purworejo,jawatengah');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `tipe` char(2) NOT NULL,
  `id` double NOT NULL,
  `no_transaksi` double NOT NULL,
  `no_faktur` varchar(15) NOT NULL,
  `tgl_penjualan` datetime NOT NULL,
  `total_penjualan` int(11) NOT NULL,
  `user` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`tipe`, `id`, `no_transaksi`, `no_faktur`, `tgl_penjualan`, `total_penjualan`, `user`) VALUES
('m', 1012, 1, '19031400001', '2019-05-07 12:00:00', 3000, '90'),
('m', 1012, 9, '19031400002', '2019-05-07 17:20:00', 3000, '90'),
('', 1013, 1, '#19051800003', '2019-05-07 12:00:00', 10000, 'UID005');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `tipe` char(2) NOT NULL,
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

INSERT INTO `penjualan_detail` (`tipe`, `id`, `no_transaksi`, `kd_barang`, `jumlah`, `harga`, `sub_total`, `hrg_pokok`) VALUES
('m', 1012, 1, '110', 1, 3000, 3000, 0),
('m', 1012, 9, '110', 1, 3000, 3000, 0),
('', 1013, 1, '00001', 1, 3000, 3000, 0),
('', 1014, 1, '00004', 1, 4000, 4000, 0);

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
-- Dumping data for table `penjualan_tmp`
--

INSERT INTO `penjualan_tmp` (`id`, `no_faktur`, `kd_barang`, `jumlah`, `harga`, `sub_total`, `hrg_pokok`, `user`) VALUES
(13, 19031400001, '00001', 4, 28500, 28500, 0, '22'),
(13, 19031400001, '00001', 4, 28500, 28500, 0, '22'),
(15, 0, '00004', 1, 4000, 4000, 0, 'UID005'),
(16, 0, '00004', 1, 4000, 4000, 0, 'UID005'),
(17, 0, '00003', 1, 3000, 3000, 0, 'UID005'),
(18, 0, '00004', 1, 4000, 4000, 0, 'UID005'),
(19, 0, '00003', 1, 3000, 3000, 0, 'UID005'),
(21, 0, '00001', 1, 3000, 3000, 0, 'UID005'),
(23, 0, '00004', 1, 4000, 4000, 0, 'UID005'),
(24, 0, '00004', 1, 4000, 4000, 0, 'UID005'),
(25, 0, '00004', 1, 4000, 4000, 0, 'UID005'),
(26, 0, '00004', 1, 4000, 4000, 0, 'UID005'),
(27, 0, '00001', 1, 3000, 3000, 0, 'UID005');

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
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD KEY `no_faktur` (`no_faktur`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD KEY `id` (`id`);

--
-- Indexes for table `penjualan_tmp`
--
ALTER TABLE `penjualan_tmp`
  ADD KEY `no_faktur` (`no_faktur`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `ID` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1015;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1014;

--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1015;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pelanggan` (`ID`);

--
-- Constraints for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD CONSTRAINT `penjualan_detail_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pelanggan` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
