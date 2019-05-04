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
-- Waktu pembuatan: 03 Bulan Mei 2019 pada 16.18
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
-- Database: `sim-apotek`
--

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
-- Struktur dari tabel `login`
--

CREATE TABLE `login` ( --dimas menambahkan tabel login untuk login tampilan awal--
  `user` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`user`, `password`) VALUES
('user', 'user'),
('admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `nama_obat` varchar(15) NOT NULL,
  `harga_obat` int(15) NOT NULL,
  `kode_obat` int(10) NOT NULL,
  `dosis_obat` varchar(3) NOT NULL,
  `kode_jenis` int(10) NOT NULL,
  `Stok_Obat` int(10) NOT NULL,
  `tanggal_input` date NOT NULL,
  `kadaluarsa_obat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`nama_obat`, `harga_obat`, `kode_obat`, `dosis_obat`, `kode_jenis`, `Stok_Obat`, `tanggal_input`, `kadaluarsa_obat`) VALUES
('Konvermeks', 2500, 1, '2x3', 101, 20, '2019-01-05', '2024-02-10'),
('Paracetamol', 2500, 2, '3x1', 106, 30, '2019-01-05', '2024-05-25'),
('Promagh', 3500, 3, '2x1', 106, 25, '2019-04-13', '0024-08-18'),
('Mastin', 3500, 4, '1x1', 105, 50, '2019-01-12', '2022-05-20'),
('Hemavitan', 3000, 5, '2x1', 103, 75, '2019-02-02', '2023-08-17'),
('Antimo', 5000, 6, '1x1', 101, 5, '2019-02-16', '2022-03-10'),
('Diapet', 4000, 7, '3x1', 106, 10, '2019-03-02', '2023-04-20'),
('Vatigon', 4500, 8, '1x1', 104, 35, '2019-03-09', '2024-02-10'),
('Oskadon', 2000, 9, '2x1', 101, 40, '2019-03-09', '2023-06-20'),
('Kalpanak', 3000, 10, '3x1', 107, 60, '2019-03-16', '2023-09-13'),
('Mylanta', 5000, 11, '2x1', 106, 70, '2019-03-30', '2023-06-11'),
('Paramex', 3000, 12, '2x1', 101, 80, '2019-03-30', '2024-11-22'),
('Procold', 4000, 13, '2x1', 101, 45, '2019-03-30', '2024-04-12'),
('Hemaviton', 6500, 14, '3x1', 106, 55, '2019-03-30', '2023-12-28'),
('Inza', 5500, 15, '3x1', 101, 65, '2019-03-30', '2024-11-29'),
('Albotil', 15000, 16, '3x1', 106, 40, '2018-11-10', '2023-05-28'),
('Ambroxol', 11000, 17, '1x1', 101, 25, '2019-02-23', '2023-04-25'),
('Alphara', 12000, 18, '1x1', 106, 95, '2019-02-16', '2023-02-10'),
('Decolgen', 8000, 19, '3x1', 101, 60, '2019-02-09', '2023-10-13'),
('Catropile', 10000, 20, '1x1', 101, 15, '2019-03-30', '2024-11-20'),
('Amoxilin', 7000, 21, '2x1', 101, 15, '2019-03-09', '2024-03-18'),
('Neutropin', 9000, 22, '3x1', 105, 35, '2019-02-09', '2023-05-17'),
('Darsi', 13000, 23, '1x1', 105, 115, '2019-03-02', '2024-01-10'),
('Komik', 5000, 25, '3x1', 105, 125, '2019-03-16', '2023-04-20'),
('Bodrex', 2000, 26, '3x1', 101, 110, '2019-04-07', '2023-05-28'),
('Mimin', 5000, 27, '3x1', 101, 20, '2019-04-07', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `nama_pemasok` varchar(15) NOT NULL,
  `kode_obat` int(10) NOT NULL,
  `jumlah_pasok` int(10) NOT NULL,
  `nomer_telepon_supp` varchar(15) NOT NULL,
  `kode_pasok` int(10) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `tanggal_pasok` date NOT NULL,
  `Alamat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`nama_pemasok`, `kode_obat`, `jumlah_pasok`, `nomer_telepon_supp`, `kode_pasok`, `harga_beli`, `tanggal_pasok`, `Alamat`) VALUES
('PT Daya Sembada', 7, 30, '(024) 8449568', 901, 3000, '2019-01-29', 'Jl Simpang Lima 1'),
('PT Dexa Medica', 2, 25, '(021) 54200134', 902, 1700, '2019-01-29', 'Jl Kelapa Gading'),
('PT Interbat', 1, 50, '(021) 55768884', 903, 1500, '2019-01-01', 'Jl Imam Bonjol'),
('PT Metro Pillar', 5, 30, '(021) 88357528', 904, 2000, '2019-01-01', 'Jl Cempaka Km 37'),
('PT Brayat Sehat', 8, 20, '(0778) 7022453', 905, 3500, '2018-12-26', 'Jl Bukit Indah I 7 K'),
('PT Sejahtera', 3, 30, '(021) 5529035', 906, 2500, '2018-12-26', 'Jl Honoris Raya'),
('PT Trimitra Med', 4, 30, '(031) 5686161', 907, 2500, '2018-12-26', 'Jl Kapuas 2 Surabaya'),
('PT Mandara Medi', 6, 30, '(021) 5881090', 908, 4000, '2018-12-27', 'Jl Pantai Indah'),
('PT Kimia Farma', 9, 30, '(021) 3847709', 909, 1000, '2018-12-28', 'Jl. Veteran No. 9'),
('PT Brayat Sehat', 10, 30, '(0778) 7022453', 910, 2000, '2018-12-29', 'Jl Bukit Indah I 7 K'),
('PT Interbat', 11, 30, '(021) 55768884', 911, 4500, '2018-12-30', 'Jl Imam Bonjol'),
('PT Mandara Medi', 12, 30, '(021) 5881090', 912, 2000, '2018-12-31', 'Jl Kapuas 2 Surabaya'),
('PT Daya Sembada', 13, 30, '(024) 8449568', 913, 3000, '2018-12-26', 'Jl Simpang Lima 1'),
('PT Metro Pillar', 14, 30, '(021) 88357528', 914, 5500, '2019-03-18', 'Jl Cempaka Km 37'),
('PT Sejahtera', 15, 30, '(021) 5529035', 915, 4500, '2019-04-01', 'Jl Honoris Raya');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_obat`
--
ALTER TABLE `jenis_obat`
  ADD PRIMARY KEY (`kode_jenis`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`),
  ADD KEY `kode_jenis` (`kode_jenis`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_pasok`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`kode_jenis`) REFERENCES `jenis_obat` (`kode_jenis`);

--
-- Ketidakleluasaan untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

