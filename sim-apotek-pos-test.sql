-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Mar 2019 pada 03.01
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

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
-- Struktur dari tabel `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `kd_satuan` varchar(6) NOT NULL,
  `nm_satuan` varchar(25) NOT NULL,
  `active` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_obat`
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
-- Struktur dari tabel `nama_obat`
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
-- Dumping data untuk tabel `nama_obat`
--

INSERT INTO `nama_obat` (`kd_barang`, `nm_barang`, `kd_satuan`, `kd_kategori`, `hrg_jual`, `hrg_beli`, `active`) VALUES
('00001', 'Konvermeks', 'S00002', 'K00008', 3000, 2500, 'Y'),
('00003', 'Paracetamol', 'S00002', 'K00008', 3000, 2500, 'Y'),
('00004', 'Promagh', 'S00002', 'K00008', 4000, 3500, 'Y'),
('00005', 'Mastin', 'S00002', 'K00008', 4000, 3500, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_toko`
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
-- Dumping data untuk tabel `nama_toko`
--

INSERT INTO `nama_toko` (`kd_toko`, `nm_toko`, `almt_toko`, `kota`, `tlp_toko`, `fax_toko`, `logo`) VALUES
('TK001', 'Apotek UAD PRPL Kelas E', 'Jalan Ring Road Selatan, Tamanan, Banguntapan, Daerah Istimewa Yogyakarta, Indonesia 55191', 'Bantul', '3132', '3132', 'logo_sarolangun.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_user`
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
-- Dumping data untuk tabel `nama_user`
--

INSERT INTO `nama_user` (`id_user`, `nm_lengkap`, `nm_user`, `password`, `akses`, `active`) VALUES
('UID005', 'Lara Ayu', 'ayu12045', '3737c7fc1e5f24c37f0dd56394932f41', 'Kasir', 'Y'),
('UID007', 'Superadmin', 'super', '1b3231655cebb7a1f783eddf27d254ca', 'Super', 'Y'),
('UID008', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID` char(4) NOT NULL,
  `Nama` varchar(35) NOT NULL,
  `Jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `NoHp` varchar(15) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Alamat` text NOT NULL,
  `Member` enum('member','bukan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`ID`, `Nama`, `Jk`, `NoHp`, `Email`, `Alamat`, `Member`) VALUES
('A001', 'Carto Ardiyanto', 'Laki-Laki', '089604943794', 'zone9robe@gmail.com', 'Ds Kertawinangun', 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
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
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `no_transaksi`, `no_faktur`, `tgl_penjualan`, `total_penjualan`, `user`) VALUES
(13, 56, '19031400001', '2019-03-14', 28500, 'UID005'),
(14, 57, '#19031500002', '2019-03-15', 3000, 'UID005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_detail`
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
-- Dumping data untuk tabel `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id`, `no_transaksi`, `kd_barang`, `jumlah`, `harga`, `sub_total`, `hrg_pokok`) VALUES
(31, 56, '00001', 1, 28500, 28500, 0),
(32, 57, '00001', 1, 3000, 3000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_tmp`
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
-- Indeks untuk tabel `jenis_obat`
--
ALTER TABLE `jenis_obat`
  ADD PRIMARY KEY (`kd_satuan`);

--
-- Indeks untuk tabel `nama_obat`
--
ALTER TABLE `nama_obat`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indeks untuk tabel `nama_toko`
--
ALTER TABLE `nama_toko`
  ADD PRIMARY KEY (`kd_toko`);

--
-- Indeks untuk tabel `nama_user`
--
ALTER TABLE `nama_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_faktur` (`no_faktur`);

--
-- Indeks untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan_tmp`
--
ALTER TABLE `penjualan_tmp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_faktur` (`no_faktur`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
