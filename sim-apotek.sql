/*1.  Pada kelompok gudang, kami telah membuat beberapa kelas yang mempunyai fungsi sebagai berikut:
• Fungsi Sorting Nama Obat A-Z : fitur ini berfungsi mengurutkan nama obat sesuai alpabet dari awalan huruf A sampai awalan huruf Z.
• Fungsi Sorting Jenis Obat Kapsul : fitur ini berfungsi mensorting obat yang berjenis kapsul untuk di tampilkan.
• Fungsi Menampilkan seluruh data obat
• Fungsi Tanggal pasok obat
• Function Update Data Obat : Fitur ini berfungsi mengupdate perubahan yang telah kita tambah, Kurang, dan mengedit sesuai database
• Function Stok Obat Menipis : Fitur ini berfungsi menandai tabel obat yang stoknya telah menipis
• Function Pencarian  Data Tidak Ditemukan : fitur ini berfungsi  jika kita mencari obat atau supplier yang tidak ada didatabase
• Function Sorting Tanggal Supplier : fitur ini berfungsi mensorting obat dengan tanggal pemasok supplier yang telah memasok obat dari tanggal terdahulu
• Function Tambah Obat : fitur ini berfungsi untuk menambah data obat baru ke dalam tabel Obat
• Function Tambah Supllier : fitur ini berfungsi untuk menambah data supllier baru ke tabel Supllier
• Function Cari Obat : fitur ini berfungsi buat mencari data obat yang ada di tabel obat
• Fuction Cari Supplier : fitur ini berfungsi mncari data supplier yang ada di tabel supplier
• Function Sorting Nama Supplier A-Z : fitur ini berfungsi untuk mengurutkan nama supplier dari A-Z
• Function data suplier : fitur ini berfungsi untuk menampilkan data suplier sesuai database
*/

--Aditya Gusti Mandala Putra yang membuat database--

-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Bulan Mei 2019 pada 07.17
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim_apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barcode`
--

CREATE TABLE `barcode` (
  `kode_obat` varchar(99) NOT NULL,
  `tanggal_pasok` date NOT NULL,
  `nomor_pasok` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barcode`
--

INSERT INTO `barcode` (`kode_obat`, `tanggal_pasok`, `nomor_pasok`) VALUES
('ADS', '2019-05-25', 1),
('ADS', '2019-05-25', 2),
('ADS', '2019-05-25', 3),
('ADS', '2019-05-25', 4),
('ADS', '2019-05-25', 5),
('ADS', '2019-05-25', 6),
('ADS', '2019-05-25', 7),
('ADS', '2019-05-25', 8),
('ADS', '2019-05-25', 9),
('ADS', '2019-05-25', 10),
('ADS', '2019-05-25', 11),
('ADS', '2019-05-25', 12),
('ADS', '2019-05-25', 13),
('ADS', '2019-05-25', 14),
('ADS', '2019-05-25', 15),
('ADS', '2019-05-25', 16),
('ADS', '2019-05-25', 17),
('ADS', '2019-05-25', 18),
('ADS', '2019-05-25', 19),
('ADS', '2019-05-25', 20),
('ADS', '2019-05-25', 21),
('ADS', '2019-05-25', 22),
('ADS', '2019-05-25', 23),
('AMO', '2019-03-06', 1),
('AMO', '2019-03-06', 2),
('AMO', '2019-03-06', 3),
('AMO', '2019-03-06', 4),
('AMO', '2019-03-06', 5),
('AMO', '2019-03-06', 6),
('AMO', '2019-03-06', 7),
('AMO', '2019-03-06', 8),
('AMO', '2019-03-06', 9),
('AMO', '2019-03-06', 10),
('AMO', '2019-03-06', 11),
('AMO', '2019-03-06', 12),
('AMO', '2019-03-06', 13),
('AMO', '2019-03-06', 14),
('AMO', '2019-03-06', 15),
('AMO', '2019-03-06', 16),
('AMO', '2019-03-06', 17),
('AMO', '2019-03-06', 18),
('AMO', '2019-03-06', 19),
('AMO', '2019-03-06', 20),
('AMO', '2019-03-06', 21),
('AMO', '2019-03-06', 22),
('AMO', '2019-03-06', 23),
('AMO', '2019-03-06', 24),
('AMO', '2019-03-06', 25),
('AMO', '2019-03-06', 26),
('AMO', '2019-03-06', 27),
('AMO', '2019-03-06', 28),
('AMO', '2019-03-06', 29),
('AMO', '2019-03-06', 30);

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
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
