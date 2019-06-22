-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2019 at 02:51 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `gaji_pegawai`
--

CREATE TABLE `gaji_pegawai` (
  `id` int(11) NOT NULL,
  `kerja` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jabatan` enum('admin','karyawan') NOT NULL,
  `tanggal_terdaftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user`, `password`, `nama`, `jabatan`, `tanggal_terdaftar`) VALUES
(1, 'admin', 'admin', '0', 'admin', '2019-04-10'),
(2, 'user', 'user', '0', 'karyawan', '2019-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kode_obat` varchar(20) NOT NULL,
  `nama_obat` varchar(40) NOT NULL,
  `kode_jenis` int(10) NOT NULL,
  `Stok_Obat` int(10) NOT NULL,
  `harga_obat` int(11) NOT NULL,
  `dosis_obat` varchar(10) NOT NULL,
  `tanggal_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kode_obat`, `nama_obat`, `kode_jenis`, `Stok_Obat`, `harga_obat`, `dosis_obat`, `tanggal_input`) VALUES
('B001', 'A-B VASK TABLET 10 MG', 101, 69, 363000, '', '2020-07-31'),
('B002', 'A-B VASK TABLET 5 MG', 101, 65, 208725, '', '2019-11-30'),
('B003', 'A-D PLEX ORAL DROPS', 108, 80, 10286, '', '2020-06-27'),
('B004', 'ABBOTIC DRY SYRUP 125 MG/5 ML 30 ML', 106, 90, 124630, '', '2019-10-31'),
('B005', 'ABBOTIC DRY SYRUP 125 MG/5 ML 60 ML', 106, 100, 199529, '', '2022-05-31'),
('B006', 'ABDELYN ORAL DROPS', 108, 75, 9983, '', '2021-06-30'),
('B007', 'ABDIFLAM TABLET 25 MG', 101, 95, 49610, '', '2021-05-31'),
('B008', 'ABDIFLAM TABLET 50 MG', 101, 90, 78650, '', '2019-08-29'),
('B009', 'ABDIMOX CAPLET 500 MG', 105, 80, 217800, '', '2020-03-31'),
('B010', 'BACTOPRIM COMBI SYRUP', 106, 95, 12100, '', '2022-05-31'),
('B011', 'BACTOPRIM COMBI TABLET', 101, 99, 36300, '', '2021-04-30'),
('B012', 'BACTRICID SYRUP', 101, 60, 10164, '', '2019-05-31'),
('B013', 'BACTRIZOL SYRUP', 106, 90, 21599, '', '2020-05-31'),
('B014', 'GABBRYL SYRUP', 106, 90, 60500, '', '2021-05-31'),
('B015', 'EKSEDRYL EXPECTORANT SYRUP 60 ML', 106, 77, 12100, '', '2020-07-31'),
('B016', 'EKSEDRYL EXPECTORANT SYRUP 120 ML', 106, 99, 18150, '', '2020-08-29'),
('B017', 'EKINASE SYRUP 60 ML', 106, 90, 18150, '', '2020-05-28'),
('B018', 'DACIN CAPSUL 300 MG', 104, 90, 48400, '', '2020-09-30'),
('B019', 'D-VIT SYRUP 100 ML', 106, 70, 30250, '', '2020-01-31'),
('B020', 'D-VIT ', 101, 90, 90750, '', '2020-06-30'),
('B021', 'CALLUSOL SOLUTION', 106, 90, 30250, '', '2020-04-30'),
('B022', 'CALCIANTA TABLET 5 MG', 101, 90, 78650, '', '2021-04-30'),
('B023', 'CALAPOL TABLET', 101, 90, 24503, '', '2020-05-31'),
('B024', 'BAMGETOL CAPLET', 104, 80, 217800, '', '2020-05-26'),
('B025', 'BALSAMEX 20 G', 107, 80, 3993, '', '2020-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `idpengeluaran` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `nama` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kode_obat` varchar(20) NOT NULL,
  `jumlah_obat` int(10) NOT NULL,
  `kode_supplier` varchar(20) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kode_obat`, `jumlah_obat`, `kode_supplier`, `harga_beli`, `tanggal_beli`, `tanggal_kadaluarsa`) VALUES
('B022', 2, '', 2, '2019-04-12', '2019-05-11'),
('B005', 100, 'R001', 5000, '2019-04-01', '2019-04-30'),
('B005', 12, 'R002', 15, '2019-05-03', '2019-05-03'),
('B022', 11, 'R003', 3, '0000-00-00', '2019-05-09'),
('B012', 2, 'R004', 2, '2019-04-12', '2019-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_penjualan`
--

CREATE TABLE `tabel_penjualan` (
  `id_penjualan` varchar(20) NOT NULL,
  `tanggal_terjual` date NOT NULL,
  `kode_obat` varchar(20) DEFAULT NULL,
  `lain` varchar(20) DEFAULT NULL,
  `jumlah_terjual` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_penjualan`
--

INSERT INTO `tabel_penjualan` (`id_penjualan`, `tanggal_terjual`, `kode_obat`, `lain`, `jumlah_terjual`, `harga`, `subotal`) VALUES
('P001', '2019-01-17', 'B021', NULL, 3, 30250, 90750),
('P002', '2019-01-29', 'B010', NULL, 7, 12100, 84700),
('P003', '2019-02-01', 'B009', NULL, 2, 217800, 435600),
('P004', '2019-02-04', 'B023', NULL, 4, 24503, 98512),
('P005', '2019-02-21', 'B007', NULL, 3, 49610, 148830),
('P006', '2019-02-28', 'B014', NULL, 7, 68500, 423500),
('P007', '2019-03-02', 'B010', NULL, 9, 12100, 108900),
('P008', '2019-03-06', 'B003', NULL, 11, 10286, 113146),
('P009', '2019-03-20', 'B008', NULL, 9, 78650, 707850),
('P010', '2019-03-21', 'B007', NULL, 11, 49610, 545710),
('P011', '2019-04-08', NULL, 'Pembelian Makanan', 5, 15000, 75000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_penjualan` varchar(20) DEFAULT NULL,
  `jenis` enum('kredit','debit','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_penjualan`, `jenis`) VALUES
('P001', 'debit'),
('P002', 'debit'),
('P003', 'debit'),
('P004', 'debit'),
('P005', 'debit'),
('P006', 'debit'),
('P007', 'debit'),
('P008', 'debit'),
('P011', 'kredit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gaji_pegawai`
--
ALTER TABLE `gaji_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  ADD PRIMARY KEY (`kode_jenis`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`),
  ADD KEY `kode_jenis` (`kode_jenis`),
  ADD KEY `harga_obat` (`harga_obat`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Indexes for table `tabel_penjualan`
--
ALTER TABLE `tabel_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `kode_obat` (`kode_obat`),
  ADD KEY `tanggal_terjual` (`tanggal_terjual`),
  ADD KEY `jumlah_terjual` (`jumlah_terjual`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD KEY `id_penjualan` (`id_penjualan`,`jenis`),
  ADD KEY `id_pembelian` (`jenis`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gaji_pegawai`
--
ALTER TABLE `gaji_pegawai`
  ADD CONSTRAINT `gaji_pegawai_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login` (`id`);

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`kode_jenis`) REFERENCES `jenis_obat` (`kode_jenis`);

--
-- Constraints for table `tabel_penjualan`
--
ALTER TABLE `tabel_penjualan`
  ADD CONSTRAINT `tabel_penjualan_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `tabel_penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
