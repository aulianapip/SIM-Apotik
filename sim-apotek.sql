-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2019 at 04:34 PM
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
-- Database: `sim-apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `barcode`
--

CREATE TABLE `barcode` (
  `kode_pasok` varchar(99) NOT NULL,
  `kode_obat` varchar(99) NOT NULL,
  `kode_barcode` varchar(99) NOT NULL,
  `tanggal_pasok` date NOT NULL,
  `nomor_pasok` int(99) NOT NULL,
  `status` enum('DI GUDANG','RUSAK','DIPINJAM','HILANG','TERJUAL') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barcode`
--

INSERT INTO `barcode` (`kode_pasok`, `kode_obat`, `kode_barcode`, `tanggal_pasok`, `nomor_pasok`, `status`) VALUES
('ABK2', 'ABK', 'ABK2019-04-221', '2019-04-22', 1, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2210', '2019-04-22', 10, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2211', '2019-04-22', 11, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2212', '2019-04-22', 12, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2213', '2019-04-22', 13, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2214', '2019-04-22', 14, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2215', '2019-04-22', 15, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2216', '2019-04-22', 16, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2217', '2019-04-22', 17, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2218', '2019-04-22', 18, 'RUSAK'),
('ABK2', 'ABK', 'ABK2019-04-2219', '2019-04-22', 19, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-222', '2019-04-22', 2, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2220', '2019-04-22', 20, 'DIPINJAM'),
('ABK2', 'ABK', 'ABK2019-04-2221', '2019-04-22', 21, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2222', '2019-04-22', 22, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2223', '2019-04-22', 23, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2224', '2019-04-22', 24, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2225', '2019-04-22', 25, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2226', '2019-04-22', 26, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2227', '2019-04-22', 27, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2228', '2019-04-22', 28, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2229', '2019-04-22', 29, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-223', '2019-04-22', 3, 'DIPINJAM'),
('ABK2', 'ABK', 'ABK2019-04-2230', '2019-04-22', 30, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2231', '2019-04-22', 31, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2232', '2019-04-22', 32, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2233', '2019-04-22', 33, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2234', '2019-04-22', 34, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2235', '2019-04-22', 35, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2236', '2019-04-22', 36, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2237', '2019-04-22', 37, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2238', '2019-04-22', 38, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2239', '2019-04-22', 39, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-224', '2019-04-22', 4, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2240', '2019-04-22', 40, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2241', '2019-04-22', 41, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2242', '2019-04-22', 42, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2243', '2019-04-22', 43, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2244', '2019-04-22', 44, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2245', '2019-04-22', 45, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2246', '2019-04-22', 46, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2247', '2019-04-22', 47, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2248', '2019-04-22', 48, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2249', '2019-04-22', 49, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-225', '2019-04-22', 5, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-2250', '2019-04-22', 50, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-226', '2019-04-22', 6, 'HILANG'),
('ABK2', 'ABK', 'ABK2019-04-227', '2019-04-22', 7, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-228', '2019-04-22', 8, 'DI GUDANG'),
('ABK2', 'ABK', 'ABK2019-04-229', '2019-04-22', 9, 'DI GUDANG');

-- --------------------------------------------------------

--
-- Table structure for table `jualbeli`
--

CREATE TABLE `jualbeli` (
  `tanggal` date NOT NULL,
  `id` int(100) NOT NULL,
  `kodeobat` varchar(99) DEFAULT NULL,
  `lainnya` varchar(100) DEFAULT NULL,
  `jumlah` int(100) NOT NULL,
  `harga` int(100) DEFAULT NULL,
  `jenis` enum('debit','kredit','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jualbeli`
--

INSERT INTO `jualbeli` (`tanggal`, `id`, `kodeobat`, `lainnya`, `jumlah`, `harga`, `jenis`) VALUES
('2019-06-17', 5, 'LAN', NULL, 8, NULL, 'debit'),
('2019-06-16', 6, 'BRO', NULL, 7, NULL, 'debit'),
('2019-06-21', 7, 'HEP', NULL, 3, NULL, 'debit'),
('2019-06-05', 8, 'PAN', NULL, 4, NULL, 'debit'),
('2019-06-02', 9, 'ISO', NULL, 2, NULL, 'debit'),
('2019-06-08', 10, 'LAK', NULL, 8, NULL, 'debit'),
('2019-06-19', 11, NULL, 'makan', 6, 10000, 'kredit'),
('2019-04-22', 12, 'ABK', NULL, 47, 2000, 'kredit'),
('2019-06-13', 13, NULL, 'timbangan', 1, 200000, 'kredit'),
('2019-06-23', 14, 'KON', NULL, 3, NULL, 'debit'),
('2019-06-23', 15, NULL, 'parkir', 1, 2000, 'kredit'),
('2019-06-23', 19, NULL, 'parkir', 1, 2000, 'kredit'),
('2019-06-23', 20, 'KON', NULL, 1, 3000, 'debit'),
('2019-06-24', 21, 'ALB', NULL, 1, 30000, 'kredit');

-- --------------------------------------------------------

--
-- Table structure for table `kasawal`
--

CREATE TABLE `kasawal` (
  `jumlah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kasawal`
--

INSERT INTO `kasawal` (`jumlah`) VALUES
(3000000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `nama_obat` text NOT NULL,
  `harga` int(99) NOT NULL,
  `jenis` varchar(99) NOT NULL,
  `kode_obat` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`nama_obat`, `harga`, `jenis`, `kode_obat`) VALUES
('Anti Bokkek', 5000, 'Tablet', 'ABK'),
('Albumin', 7500, 'Syrup', 'ALB'),
('Ambroxol', 10000, 'Kapsul', 'AMB'),
('Amoxcilin', 15000, 'Tablet', 'AMO'),
('Antimo', 5000, 'Syrup', 'ANT'),
('Aspirin', 10000, 'Kapsul', 'ASP'),
('Bromifar', 5000, 'Pil', 'BRO'),
('Dexa', 10000, 'Pil', 'DEX'),
('Heparin', 10000, 'Tablet', 'HEP'),
('Ibuprofen', 7500, 'Kapsul', 'IBU'),
('Isoniazid', 7500, 'Pil', 'ISO'),
('Kalpanax', 4500, 'Salep', 'KAL'),
('Konvermeks', 10000, 'Tablet', 'KON'),
('Laktulosa', 7500, 'Pil', 'LAK'),
('Lanolin', 5000, 'Kapsul', 'LAN'),
('Mastin', 4000, 'Kaplet', 'MAS'),
('Morfin', 15000, 'Tablet', 'MOR'),
('Orphen', 7500, 'Pil', 'ORP'),
('Panadol', 7500, 'Tablet', 'PAN'),
('Paracetamol', 5000, 'Tablet', 'PAR'),
('Promag', 5000, 'Tablet', 'PRO');

-- --------------------------------------------------------

--
-- Table structure for table `opname`
--

CREATE TABLE `opname` (
  `kode_barcode` varchar(99) NOT NULL,
  `status` enum('DI GUDANG','HILANG','RUSAK','DIPINJAM','TERJUAL') NOT NULL,
  `catatan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opname`
--

INSERT INTO `opname` (`kode_barcode`, `status`, `catatan`, `tanggal`) VALUES
('ABK2019-04-2218', 'RUSAK', 'berkurang pak', '2019-06-14'),
('ABK2019-04-2220', 'DIPINJAM', 'mail', '2019-06-14'),
('ABK2019-04-223', 'DIPINJAM', 'asd', '2019-06-14'),
('ABK2019-04-226', 'HILANG', 'mail mabok', '2019-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `pasok`
--

CREATE TABLE `pasok` (
  `kode_pasok` varchar(99) NOT NULL,
  `kode_obat` varchar(99) NOT NULL,
  `kode_supplier` varchar(99) NOT NULL,
  `jumlah_pasok` int(99) NOT NULL,
  `harga_beli` int(99) NOT NULL,
  `tanggal_pasok` date NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasok`
--

INSERT INTO `pasok` (`kode_pasok`, `kode_obat`, `kode_supplier`, `jumlah_pasok`, `harga_beli`, `tanggal_pasok`, `tanggal_kadaluarsa`) VALUES
('ABK2', 'ABK', 'ABD', 47, 2000, '2019-04-22', '2030-04-22');

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
  `id` double NOT NULL,
  `no_transaksi` double NOT NULL,
  `no_faktur` varchar(15) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `total_penjualan` int(11) NOT NULL,
  `user` varchar(15) NOT NULL,
  `tipe` char(2) NOT NULL,
  `jenis` enum('debit','kredit','','') NOT NULL,
  `id_pelanggan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `no_transaksi`, `no_faktur`, `tgl_penjualan`, `total_penjualan`, `user`, `tipe`, `jenis`, `id_pelanggan`) VALUES
(11, 3, '19062200003', '2019-06-16', 17500, 'UID005', '', 'debit', '1003'),
(12, 4, '19062200004', '2019-06-16', 7500, 'UID005', '', 'debit', '1003'),
(13, 5, '19062200005', '2019-06-16', 25000, 'UID005', '', 'debit', '1003'),
(14, 6, '19062200006', '2019-06-17', 25000, 'UID005', '', 'debit', '1003'),
(15, 7, '19062200007', '2019-06-17', 30000, 'UID005', '', 'debit', '1003'),
(16, 8, '19062200008', '2019-06-17', 7500, 'UID005', '', 'debit', '1003'),
(17, 9, '19062200009', '2019-06-17', 22500, 'UID005', '', 'debit', '1005'),
(18, 10, '19062200010', '2019-06-17', 10000, 'UID005', '', 'debit', '1005'),
(19, 11, '19062200011', '2019-06-18', 5000, 'UID005', '', 'debit', '1006'),
(20, 12, '19062200012', '2019-06-18', 5000, 'UID005', '', 'debit', '1008'),
(21, 13, '19062200013', '2019-06-18', 5000, 'UID005', '', 'debit', '1008'),
(22, 14, '19062200014', '2019-06-18', 25000, 'UID005', '', 'debit', '1008'),
(23, 15, '19062200015', '2019-06-18', 5000, 'UID005', '', 'debit', '1008'),
(24, 16, '19062200016', '2019-06-18', 10000, 'UID005', '', 'debit', '1008'),
(25, 17, '19062200017', '2019-06-18', 7500, 'UID005', '', 'debit', '1008'),
(26, 18, '19062200018', '2019-06-18', 12500, 'UID005', '', 'debit', '1008'),
(27, 19, '19062200019', '2019-06-18', 5000, 'UID005', '', 'debit', '1005'),
(28, 20, '19062200020', '2019-06-18', 7500, 'UID005', '', 'debit', '1006'),
(29, 21, '19062200021', '2019-06-18', 5000, 'UID005', '', 'debit', '1009'),
(30, 22, '19062200022', '2019-06-18', 5000, 'UID005', '', 'debit', '1007'),
(31, 23, '19062200023', '2019-06-18', 5000, 'UID005', '', 'debit', '1005'),
(32, 24, '19062200024', '2019-06-18', 15000, 'UID005', '', 'debit', '1011'),
(33, 25, '19062200025', '2019-06-22', 20000, 'UID005', '', 'debit', '1012'),
(34, 26, '19062200026', '2019-06-22', 10000, 'UID005', '', 'debit', '1013'),
(35, 27, '19062300027', '2019-06-23', 5000, 'UID005', '', 'debit', '1014'),
(36, 28, '19062300028', '2019-06-23', 5000, 'UID005', '', 'debit', '1011'),
(37, 29, '19062400029', '2019-06-24', 5000, 'UID005', '', 'debit', '1013'),
(38, 30, '19062400030', '2019-06-24', 5000, 'UID005', '', 'debit', '1013'),
(39, 31, '19062400031', '2019-06-24', 5000, 'UID005', '', 'debit', '1003'),
(40, 32, '19062400032', '2019-06-25', 10000, 'UID005', '', 'debit', '1014');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id` double NOT NULL,
  `no_transaksi` double NOT NULL,
  `kode_obat` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `hrg_pokok` int(11) NOT NULL,
  `tipe` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id`, `no_transaksi`, `kode_obat`, `jumlah`, `harga`, `sub_total`, `hrg_pokok`, `tipe`) VALUES
(5, 3, 'BRO', 1, 5000, 5000, 0, ''),
(6, 3, 'PRO', 1, 5000, 5000, 0, ''),
(7, 3, 'ALB', 1, 7500, 7500, 0, ''),
(8, 4, 'ALB', 1, 7500, 7500, 0, ''),
(9, 5, 'AMB', 1, 10000, 10000, 0, ''),
(10, 5, 'AMO', 1, 15000, 15000, 0, ''),
(11, 6, 'ANT', 1, 5000, 5000, 0, ''),
(12, 6, 'ASP', 1, 10000, 10000, 0, ''),
(13, 6, 'DEX', 1, 10000, 10000, 0, ''),
(14, 7, 'IBU', 1, 7500, 7500, 0, ''),
(15, 7, 'IBU', 1, 7500, 7500, 0, ''),
(16, 7, 'IBU', 1, 7500, 7500, 0, ''),
(17, 7, 'IBU', 1, 7500, 7500, 0, ''),
(18, 8, 'PAN', 1, 7500, 7500, 0, ''),
(19, 9, 'PAN', 1, 7500, 7500, 0, ''),
(20, 9, 'PAN', 1, 7500, 7500, 0, ''),
(21, 9, 'PAN', 1, 7500, 7500, 0, ''),
(22, 10, 'PAR', 1, 5000, 5000, 0, ''),
(23, 10, 'PAR', 1, 5000, 5000, 0, ''),
(24, 11, 'PAR', 1, 5000, 5000, 0, ''),
(25, 12, 'PAR', 1, 5000, 5000, 0, ''),
(26, 13, 'PAR', 1, 5000, 5000, 0, ''),
(27, 14, 'PAR', 1, 5000, 5000, 0, ''),
(28, 14, 'PAR', 1, 5000, 5000, 0, ''),
(29, 14, 'PAR', 1, 5000, 5000, 0, ''),
(30, 14, 'PAR', 1, 5000, 5000, 0, ''),
(31, 14, 'PAR', 1, 5000, 5000, 0, ''),
(32, 15, 'PRO', 1, 5000, 5000, 0, ''),
(33, 16, 'KON', 1, 10000, 10000, 0, ''),
(34, 17, 'IBU', 1, 7500, 7500, 0, ''),
(35, 18, 'PAR', 1, 5000, 5000, 0, ''),
(36, 18, 'PAN', 1, 7500, 7500, 0, ''),
(37, 19, 'PRO', 1, 5000, 5000, 0, ''),
(38, 20, 'LAK', 1, 7500, 7500, 0, ''),
(39, 21, 'PRO', 1, 5000, 5000, 0, ''),
(40, 22, 'PRO', 1, 5000, 5000, 0, ''),
(41, 23, 'PAR', 1, 5000, 5000, 0, ''),
(42, 24, 'PAR', 1, 5000, 5000, 0, ''),
(43, 24, 'PAR', 1, 5000, 5000, 0, ''),
(44, 24, 'PAR', 1, 5000, 5000, 0, ''),
(45, 25, 'PAR', 1, 5000, 5000, 0, ''),
(46, 25, 'BRO', 1, 5000, 5000, 0, ''),
(47, 25, 'BRO', 1, 5000, 5000, 0, ''),
(48, 25, 'BRO', 1, 5000, 5000, 0, ''),
(49, 26, 'PAR', 1, 5000, 5000, 0, ''),
(50, 26, 'BRO', 1, 5000, 5000, 0, ''),
(51, 27, 'PRO', 1, 5000, 5000, 0, ''),
(52, 28, 'BRO', 1, 5000, 5000, 0, ''),
(53, 29, 'PRO', 1, 5000, 5000, 0, ''),
(54, 30, 'BRO', 1, 5000, 5000, 0, ''),
(55, 31, 'PRO', 1, 5000, 5000, 0, ''),
(56, 32, 'ABK', 1, 10000, 10000, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_tmp`
--

CREATE TABLE `penjualan_tmp` (
  `id` double NOT NULL,
  `no_faktur` double NOT NULL,
  `kode_obat` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `hrg_pokok` int(11) NOT NULL,
  `user` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE `retur` (
  `kode_retur` varchar(99) NOT NULL,
  `kode_obat` varchar(99) NOT NULL,
  `rusak` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur`
--

INSERT INTO `retur` (`kode_retur`, `kode_obat`, `rusak`, `tanggal`, `catatan`) VALUES
('KR', 'ALB', 10, '2019-05-25', 'Peyok');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `kode_obat` int(11) NOT NULL,
  `stok_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `nama_pemasok` text NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `alamat` varchar(99) NOT NULL,
  `contact_person` varchar(20) NOT NULL,
  `kode_supplier` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`nama_pemasok`, `nomor_telepon`, `alamat`, `contact_person`, `kode_supplier`) VALUES
('PT Abadi Jaya', '0218768932', 'Jl Magelang Selatan', '087654231827', 'ABD'),
('PT Aditarwan', '08217475938', 'Jl Klaten ', '089635478921', 'ADI'),
('PT Aica Indonesia', '0823475891', 'Jl Solo KM 15', '085763897213', 'AIC'),
('PT Adijaya Perdana Mandiri', '0217684903', 'Jl Sleman Barat', '087862548562', 'APM'),
('PT Asianagro Abadi', '0217465782', 'Jl Yogyakarta KM 30', '089645367891', 'ASI'),
('PT Dunia Express', '0821746657', 'Jl KulonProgo', '087826154678', 'DUN'),
(' PT Dwi Prima Sembada', '0213546789', 'Jl Kaliurang', '085764536726', 'DWI'),
('PT Hasil Jaya Industri', '08217445938', 'Jl Sleman Utara', '085667367891', 'HAS'),
('PT. Indoherbal', '0216454673', 'Jl Ring Road Utara', '08763547637', 'IND'),
('PT Jaya Mandiri', '0821787659', 'Jl Bantul Selatan', '087839186290', 'JAY'),
('PT Mega Kemiraya', '0821676453', 'Jl Adisucipto', '085674893647', 'MEG'),
('PT Mitra Infoparama', '08216455938', 'Jl Wonosari', '0857685367891', 'MIT'),
('PT Supramatra Abadi', '08217475456', 'Jl Maguwoharjo', '089645365791', 'SUP'),
(' PT Tapian Nadenggan', '0213427893', 'Jl Panembahan', '085674873657', 'TAP');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(100) NOT NULL,
  `jenis` enum('debit','kredit','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `jenis`) VALUES
(5, 'debit'),
(6, 'debit'),
(7, 'debit'),
(8, 'debit'),
(9, 'debit'),
(10, 'debit'),
(11, 'kredit'),
(12, 'kredit'),
(13, 'kredit'),
(14, 'debit'),
(15, 'kredit');

-- --------------------------------------------------------

--
-- Table structure for table `trans_ctr`
--

CREATE TABLE `trans_ctr` (
  `id` double NOT NULL,
  `counter` double NOT NULL,
  `stat` varchar(3) NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_ctr`
--

INSERT INTO `trans_ctr` (`id`, `counter`, `stat`, `user`) VALUES
(1, 31, 'O', 'hhalat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barcode`
--
ALTER TABLE `barcode`
  ADD PRIMARY KEY (`kode_barcode`),
  ADD KEY `kode_obat` (`kode_obat`),
  ADD KEY `kode_pasok` (`kode_pasok`);

--
-- Indexes for table `jualbeli`
--
ALTER TABLE `jualbeli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kodeobat` (`kodeobat`),
  ADD KEY `harga` (`harga`);

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
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indexes for table `opname`
--
ALTER TABLE `opname`
  ADD PRIMARY KEY (`kode_barcode`),
  ADD KEY `kode_barcode` (`kode_barcode`);

--
-- Indexes for table `pasok`
--
ALTER TABLE `pasok`
  ADD PRIMARY KEY (`kode_pasok`),
  ADD KEY `kode_obat` (`kode_obat`),
  ADD KEY `kode_supplier` (`kode_supplier`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID`);

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
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`kode_retur`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jualbeli`
--
ALTER TABLE `jualbeli`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `ID` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1015;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barcode`
--
ALTER TABLE `barcode`
  ADD CONSTRAINT `barcode_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`),
  ADD CONSTRAINT `barcode_ibfk_2` FOREIGN KEY (`kode_pasok`) REFERENCES `pasok` (`kode_pasok`);

--
-- Constraints for table `jualbeli`
--
ALTER TABLE `jualbeli`
  ADD CONSTRAINT `jualbeli_ibfk_1` FOREIGN KEY (`kodeobat`) REFERENCES `obat` (`kode_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `opname`
--
ALTER TABLE `opname`
  ADD CONSTRAINT `opname_ibfk_1` FOREIGN KEY (`kode_barcode`) REFERENCES `barcode` (`kode_barcode`);

--
-- Constraints for table `pasok`
--
ALTER TABLE `pasok`
  ADD CONSTRAINT `pasok_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`),
  ADD CONSTRAINT `pasok_ibfk_2` FOREIGN KEY (`kode_supplier`) REFERENCES `supplier` (`kode_supplier`);

--
-- Constraints for table `retur`
--
ALTER TABLE `retur`
  ADD CONSTRAINT `retur_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id`) REFERENCES `jualbeli` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
