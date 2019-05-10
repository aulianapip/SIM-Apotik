-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 Mei 2019 pada 10.10
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

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
-- Struktur dari tabel `gaji_pegawai`
--

CREATE TABLE `gaji_pegawai` (
  `id` int(11) NOT NULL,
  `kerja` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `kode_jenis` int(10) NOT NULL,
  `nama_jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_obat`
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
-- Struktur dari tabel `kasawal`
--

CREATE TABLE `kasawal` (
  `jumlah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kasawal`
--

INSERT INTO `kasawal` (`jumlah`) VALUES
(3000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
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
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `user`, `password`, `nama`, `jabatan`, `tanggal_terdaftar`) VALUES
(1, 'admin', 'admin', '0', 'admin', '2019-04-10'),
(2, 'user', 'user', '0', 'karyawan', '2019-04-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
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
-- Dumping data untuk tabel `obat`
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
-- Struktur dari tabel `pengeluaran`
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
-- Struktur dari tabel `supplier`
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
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`kode_obat`, `jumlah_obat`, `kode_supplier`, `harga_beli`, `tanggal_beli`, `tanggal_kadaluarsa`) VALUES
('B022', 4, '', 78650, '2019-01-30', '2019-05-11'),
('B005', 3, 'R001', 199529, '2018-12-12', '2019-04-30'),
('B005', 1, 'R002', 199529, '2018-12-30', '2019-05-03'),
('B022', 4, 'R003', 78650, '2018-12-22', '2019-05-09'),
('B012', 2, 'R004', 10164, '2019-04-12', '2019-05-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_penjualan`
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
-- Dumping data untuk tabel `tabel_penjualan`
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
('P011', '2019-04-08', NULL, 'Pembelian Makanan', 5, 15000, 75000),
('P012', '2019-05-04', NULL, 'bayar parkir', 1, 5000, 5000),
('P013', '2019-04-26', NULL, 'Pembelian Etalase ', 1, 1000000, 1000000),
('P014', '2019-05-01', 'B003', NULL, 10, 10286, 102860),
('P015', '2019-04-30', 'B009', NULL, 10, 217800, 2178000),
('P016', '2019-01-30', 'B022', NULL, 4, 78650, 314600),
('P017', '2018-12-12', 'B005', NULL, 3, 199529, 598587),
('P018', '2018-12-30', 'B005', NULL, 1, 199529, 199529),
('P019', '2018-12-22', 'B022', NULL, 4, 78650, 314600),
('P020', '2019-04-12', 'B012', NULL, 2, 10164, 20328),
('P021', '2019-01-01', 'B005', NULL, 3, 199529, 598587),
('P022', '2019-05-05', NULL, 'Pembelian lemari', 2, 500000, 1000000),
('P023', '2019-05-10', NULL, 'Beli Loker', 1, 750000, 750000),
('P024', '2019-05-10', 'B018', NULL, 10, 48400, 484000),
('P025', '2019-05-11', 'B015', NULL, 5, 12100, 60500),
('P026', '2019-05-11', 'B025', NULL, 20, 3993, 79860),
('P027', '2019-05-11', 'B024', NULL, 10, 217800, 2178000),
('P028', '2019-05-11', 'B020', NULL, 2, 90750, 181500),
('P029', '2019-05-11', 'B010', NULL, 1, 12100, 12100),
('P030', '2019-05-11', 'B013', NULL, 1, 21599, 21599),
('P031', '2019-05-11', 'B016', NULL, 4, 18150, 72600),
('P032', '2019-05-11', 'B002', NULL, 5, 208725, 1043625);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_penjualan` varchar(20) DEFAULT NULL,
  `jenis` enum('kredit','debit','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
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
('P011', 'kredit'),
('P012', 'kredit'),
('P013', 'kredit'),
('P014', 'debit'),
('P015', 'kredit'),
('P015', 'debit'),
('P016', 'kredit'),
('P017', 'kredit'),
('P018', 'kredit'),
('P019', 'kredit'),
('P020', 'kredit'),
('P021', 'debit'),
('P022', 'kredit'),
('P023', 'kredit'),
('P024', 'debit'),
('P025', 'debit'),
('P026', 'debit'),
('P027', 'debit'),
('P027', 'debit'),
('P028', 'debit'),
('P029', 'debit'),
('P030', 'debit'),
('P031', 'debit'),
('P032', 'debit');

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
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gaji_pegawai`
--
ALTER TABLE `gaji_pegawai`
  ADD CONSTRAINT `gaji_pegawai_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login` (`id`);

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`kode_jenis`) REFERENCES `jenis_obat` (`kode_jenis`);

--
-- Ketidakleluasaan untuk tabel `tabel_penjualan`
--
ALTER TABLE `tabel_penjualan`
  ADD CONSTRAINT `tabel_penjualan_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `tabel_penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
