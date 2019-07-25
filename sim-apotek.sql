-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jul 2019 pada 11.14
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

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
  `kode_obat` varchar(99) NOT NULL,
  `tanggal_pasok` date NOT NULL,
  `nomor_pasok` int(99) NOT NULL,
  `status` enum('Hilang','Rusak','Dipinjam','Terjual') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barcode`
--

INSERT INTO `barcode` (`kode_obat`, `tanggal_pasok`, `nomor_pasok`, `status`) VALUES
('ADS', '2019-05-25', 1, 'Hilang'),
('ADS', '2019-05-25', 2, 'Hilang'),
('ADS', '2019-05-25', 3, 'Hilang'),
('ADS', '2019-05-25', 4, 'Hilang'),
('ADS', '2019-05-25', 5, 'Hilang'),
('ADS', '2019-05-25', 6, 'Hilang'),
('ADS', '2019-05-25', 7, 'Hilang'),
('ADS', '2019-05-25', 8, 'Hilang'),
('ADS', '2019-05-25', 9, 'Hilang'),
('ADS', '2019-05-25', 10, 'Hilang'),
('ADS', '2019-05-25', 11, 'Hilang'),
('ADS', '2019-05-25', 12, 'Hilang'),
('ADS', '2019-05-25', 13, 'Hilang'),
('ADS', '2019-05-25', 14, 'Hilang'),
('ADS', '2019-05-25', 15, 'Hilang'),
('ADS', '2019-05-25', 16, 'Hilang'),
('ADS', '2019-05-25', 17, 'Hilang'),
('ADS', '2019-05-25', 18, 'Hilang'),
('ADS', '2019-05-25', 19, 'Hilang'),
('ADS', '2019-05-25', 20, 'Hilang'),
('ADS', '2019-05-25', 21, 'Hilang'),
('ADS', '2019-05-25', 22, 'Hilang'),
('ADS', '2019-05-25', 23, 'Hilang'),
('AMO', '2019-03-06', 1, 'Hilang'),
('AMO', '2019-03-06', 2, 'Hilang'),
('AMO', '2019-03-06', 3, 'Hilang'),
('AMO', '2019-03-06', 4, 'Hilang'),
('AMO', '2019-03-06', 5, 'Hilang'),
('AMO', '2019-03-06', 6, 'Hilang'),
('AMO', '2019-03-06', 7, 'Hilang'),
('AMO', '2019-03-06', 8, 'Hilang'),
('AMO', '2019-03-06', 9, 'Hilang'),
('AMO', '2019-03-06', 10, 'Hilang'),
('AMO', '2019-03-06', 11, 'Hilang'),
('AMO', '2019-03-06', 12, 'Hilang'),
('AMO', '2019-03-06', 13, 'Hilang'),
('AMO', '2019-03-06', 14, 'Hilang'),
('AMO', '2019-03-06', 15, 'Hilang'),
('AMO', '2019-03-06', 16, 'Hilang'),
('AMO', '2019-03-06', 17, 'Hilang'),
('AMO', '2019-03-06', 18, 'Hilang'),
('AMO', '2019-03-06', 19, 'Hilang'),
('AMO', '2019-03-06', 20, 'Hilang'),
('AMO', '2019-03-06', 21, 'Hilang'),
('AMO', '2019-03-06', 22, 'Hilang'),
('AMO', '2019-03-06', 23, 'Hilang'),
('AMO', '2019-03-06', 24, 'Hilang'),
('AMO', '2019-03-06', 25, 'Hilang'),
('AMO', '2019-03-06', 26, 'Hilang'),
('AMO', '2019-03-06', 27, 'Hilang'),
('AMO', '2019-03-06', 28, 'Hilang'),
('AMO', '2019-03-06', 29, 'Hilang'),
('AMO', '2019-03-06', 30, 'Hilang'),
('ABK', '2019-03-06', 1, 'Hilang'),
('ABK', '2019-03-06', 2, 'Hilang'),
('ABK', '2019-03-06', 3, 'Hilang'),
('ABK', '2019-03-06', 4, 'Hilang'),
('ABK', '2019-03-06', 5, 'Hilang'),
('ABK', '2019-03-06', 6, 'Hilang'),
('ABK', '2019-03-06', 7, 'Hilang'),
('ABK', '2019-03-06', 8, 'Hilang'),
('ABK', '2019-03-06', 9, 'Hilang'),
('ABK', '2019-03-06', 10, 'Hilang'),
('ABK', '2019-03-06', 11, 'Hilang'),
('ABK', '2019-03-06', 12, 'Hilang'),
('ABK', '2019-03-06', 13, 'Hilang'),
('ABK', '2019-03-06', 14, 'Hilang'),
('ABK', '2019-03-06', 15, 'Hilang'),
('ABK', '2019-03-06', 16, 'Hilang'),
('ABK', '2019-03-06', 17, 'Hilang'),
('ABK', '2019-03-06', 18, 'Hilang'),
('ABK', '2019-03-06', 19, 'Hilang'),
('ABK', '2019-03-06', 20, 'Hilang'),
('ABK', '2019-03-06', 21, 'Hilang'),
('ABK', '2019-03-06', 22, 'Hilang'),
('ABK', '2019-03-06', 23, 'Hilang'),
('ABK', '2019-03-06', 24, 'Hilang'),
('ABK', '2019-03-06', 25, 'Hilang'),
('ABK', '2019-03-06', 26, 'Hilang'),
('ABK', '2019-03-06', 27, 'Hilang'),
('ABK', '2019-03-06', 28, 'Hilang'),
('ABK', '2019-03-06', 29, 'Hilang'),
('ABK', '2019-03-06', 30, 'Hilang'),
('ABK', '2019-03-06', 31, 'Hilang'),
('ABK', '2019-03-06', 32, 'Hilang'),
('ABK', '2019-03-06', 33, 'Hilang'),
('ABK', '2019-03-06', 34, 'Hilang'),
('ABK', '2019-03-06', 35, 'Hilang'),
('ABK', '2019-03-06', 36, 'Hilang'),
('ABK', '2019-03-06', 37, 'Hilang'),
('ABK', '2019-03-06', 38, 'Hilang'),
('ABK', '2019-03-06', 39, 'Hilang'),
('ABK', '2019-03-06', 40, 'Hilang'),
('ABK', '2019-03-06', 41, 'Hilang'),
('ABK', '2019-03-06', 42, 'Hilang'),
('ABK', '2019-03-06', 43, 'Hilang'),
('ABK', '2019-03-06', 44, 'Hilang'),
('ABK', '2019-03-06', 45, 'Hilang'),
('ABK', '2019-03-06', 46, 'Hilang'),
('ABK', '2019-03-06', 47, 'Hilang'),
('ABK', '2019-03-06', 48, 'Hilang'),
('ABK', '2019-03-06', 49, 'Hilang'),
('ABK', '2019-03-06', 50, 'Hilang');

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
  `kode_opname` varchar(99) NOT NULL,
  `kode_obat` varchar(99) NOT NULL,
  `hilang` int(11) NOT NULL,
  `rusak` int(11) NOT NULL,
  `dipinjam` int(11) NOT NULL,
  `status` enum('Belum Sesuai','Sesuai') NOT NULL,
  `catatan` text NOT NULL,
  `tanggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `opname`
--

INSERT INTO `opname` (`kode_opname`, `kode_obat`, `hilang`, `rusak`, `dipinjam`, `status`, `catatan`, `tanggal`) VALUES
('1', 'ALB', 3, 0, 0, 'Belum Sesuai', 'Hilang saat pengecekan', 20190518),
('2', 'ASP', 0, 5, 0, 'Belum Sesuai', 'Rusak Saat pengecekan', 20190518),
('3', 'HEP', 3, 2, 1, 'Belum Sesuai', 'Hilang dan rusak saat pengecekan, dipinjam oleh mail', 20190518);

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
('KP1', 'AMO', 'ABD', 82, 7500, '2019-05-08', '2021-02-05'),
('KP10', 'IBU', 'SUP', 100, 3500, '2019-05-15', '2022-05-07'),
('KP11', 'ISO', 'MEG', 100, 4000, '2019-05-09', '2020-07-04'),
('KP12', 'KON', 'DUN', 75, 5000, '2019-05-18', '2020-10-17'),
('KP13', 'LAK', 'MIT', 50, 5000, '2019-05-11', '2021-04-03'),
('KP14', 'LAN', 'JAY', 200, 2000, '2019-05-13', '2020-09-26'),
('KP15', 'MOR', 'AIC', 100, 10000, '2019-05-08', '2021-02-06'),
('KP16', 'ORP', 'MEG', 125, 5000, '2019-05-16', '2020-05-02'),
('KP17', 'PAN', 'JAY', 150, 5000, '2019-05-10', '2021-06-05'),
('KP18', 'PAR', 'SUP', 75, 4000, '2019-05-15', '2021-04-17'),
('KP19', 'PAR', 'IND', 100, 2500, '2019-05-01', '2021-03-06'),
('KP2', 'AMO', 'APM', 82, 5000, '2019-05-13', '2022-01-06'),
('KP20', 'PRO', 'APM', 100, 2500, '2019-05-01', '2020-12-04'),
('KP21', 'MAS', 'AIC', 45, 2500, '2019-02-14', '2021-07-31'),
('KP22', 'KAL', 'IND', 65, 3000, '2019-01-19', '2021-06-30'),
('KP23', 'KAL', 'IND', 30, 3000, '2019-01-20', '2021-06-30'),
('KP24', 'ALB', 'IND', 45, 5000, '2019-03-05', '2020-10-03'),
('KP25', 'AMO', 'IND', 20, 2000, '2019-04-15', '2020-04-07'),
('KP26', 'AMO', 'IND', 47, 2000, '2019-03-06', '2020-03-06'),
('KP27', 'AMO', 'AIC', 30, 3000, '2019-03-06', '2020-04-07'),
('KP28', 'AMO', 'AIC', 45, 2000, '2019-05-25', '2020-04-07'),
('KP3', 'ALB', 'DUN', 37, 5000, '2019-05-21', '2019-05-31'),
('KP30', 'ABK', 'JAY', 50, 3000, '2019-03-06', '2020-04-07'),
('KP4', 'AMB', 'IND', 54, 5000, '2019-05-17', '2021-11-06'),
('KP5', 'ANT', 'TAP', 150, 3000, '2019-05-01', '2021-05-01'),
('KP6', 'ASP', 'DUN', 30, 7500, '2019-05-01', '2022-03-12'),
('KP7', 'BRO', 'ADI', 45, 2500, '2019-04-17', '2020-11-06'),
('KP8', 'DEX', 'JAY', 200, 5000, '2019-05-16', '2021-03-06'),
('KP9', 'HEP', 'JAY', 150, 4000, '2019-05-13', '2020-10-03');

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
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indeks untuk tabel `opname`
--
ALTER TABLE `opname`
  ADD PRIMARY KEY (`kode_opname`),
  ADD KEY `kode_obat` (`kode_obat`);

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
-- Ketidakleluasaan untuk tabel `opname`
--
ALTER TABLE `opname`
  ADD CONSTRAINT `opname_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`);

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
