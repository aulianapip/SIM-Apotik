-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2019 pada 18.38
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim-apotik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barcode`
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
-- Dumping data untuk tabel `barcode`
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
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `nama_obat` text NOT NULL,
  `harga` int(99) NOT NULL,
  `jenis` varchar(99) NOT NULL,
  `kode_obat` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
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
-- Struktur dari tabel `opname`
--

CREATE TABLE `opname` (
  `kode_barcode` varchar(99) NOT NULL,
  `status` enum('DI GUDANG','HILANG','RUSAK','DIPINJAM','TERJUAL') NOT NULL,
  `catatan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `opname`
--

INSERT INTO `opname` (`kode_barcode`, `status`, `catatan`, `tanggal`) VALUES
('ABK2019-04-2218', 'RUSAK', 'berkurang pak', '2019-06-14'),
('ABK2019-04-2220', 'DIPINJAM', 'mail', '2019-06-14'),
('ABK2019-04-223', 'DIPINJAM', 'asd', '2019-06-14'),
('ABK2019-04-226', 'HILANG', 'mail mabok', '2019-06-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasok`
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
-- Dumping data untuk tabel `pasok`
--

INSERT INTO `pasok` (`kode_pasok`, `kode_obat`, `kode_supplier`, `jumlah_pasok`, `harga_beli`, `tanggal_pasok`, `tanggal_kadaluarsa`) VALUES
('ABK2', 'ABK', 'ABD', 47, 2000, '2019-04-22', '2030-04-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur`
--

CREATE TABLE `retur` (
  `kode_retur` varchar(99) NOT NULL,
  `kode_obat` varchar(99) NOT NULL,
  `rusak` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `retur`
--

INSERT INTO `retur` (`kode_retur`, `kode_obat`, `rusak`, `tanggal`, `catatan`) VALUES
('KR', 'ALB', 10, '2019-05-25', 'Peyok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `kode_obat` int(11) NOT NULL,
  `stok_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `nama_pemasok` text NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `alamat` varchar(99) NOT NULL,
  `contact_person` varchar(20) NOT NULL,
  `kode_supplier` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
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

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barcode`
--
ALTER TABLE `barcode`
  ADD PRIMARY KEY (`kode_barcode`),
  ADD KEY `kode_obat` (`kode_obat`),
  ADD KEY `kode_pasok` (`kode_pasok`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indeks untuk tabel `opname`
--
ALTER TABLE `opname`
  ADD PRIMARY KEY (`kode_barcode`),
  ADD KEY `kode_barcode` (`kode_barcode`);

--
-- Indeks untuk tabel `pasok`
--
ALTER TABLE `pasok`
  ADD PRIMARY KEY (`kode_pasok`),
  ADD KEY `kode_obat` (`kode_obat`),
  ADD KEY `kode_supplier` (`kode_supplier`);

--
-- Indeks untuk tabel `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`kode_retur`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barcode`
--
ALTER TABLE `barcode`
  ADD CONSTRAINT `barcode_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`),
  ADD CONSTRAINT `barcode_ibfk_2` FOREIGN KEY (`kode_pasok`) REFERENCES `pasok` (`kode_pasok`);

--
-- Ketidakleluasaan untuk tabel `opname`
--
ALTER TABLE `opname`
  ADD CONSTRAINT `opname_ibfk_1` FOREIGN KEY (`kode_barcode`) REFERENCES `barcode` (`kode_barcode`);

--
-- Ketidakleluasaan untuk tabel `pasok`
--
ALTER TABLE `pasok`
  ADD CONSTRAINT `pasok_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`),
  ADD CONSTRAINT `pasok_ibfk_2` FOREIGN KEY (`kode_supplier`) REFERENCES `supplier` (`kode_supplier`);

--
-- Ketidakleluasaan untuk tabel `retur`
--
ALTER TABLE `retur`
  ADD CONSTRAINT `retur_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
