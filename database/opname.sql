-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 03, 2019 at 04:11 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SIM-Apotik`
--

-- --------------------------------------------------------

--
-- Table structure for table `opname`
--

CREATE TABLE `opname` (
  `kode_opname` varchar(20) NOT NULL,
  `kode_obat` varchar(20) NOT NULL,
  `status_obat` enum('RUSAK','HILANG','DIPINJAM','SUKSES') NOT NULL,
  `obat_kurang` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opname`
--

INSERT INTO `opname` (`kode_opname`, `kode_obat`, `status_obat`, `obat_kurang`, `catatan`, `tanggal`) VALUES
('1', 'B001', 'SUKSES', 0, 'Rusak saat pengecekan', '2019-05-22'),
('2', 'B003', 'SUKSES', 0, 'Dipinjam opleh mail, digantinya hari kamis,20 april 2019', '2019-05-09'),
('3', 'B004', 'SUKSES', 0, 'asda', '2019-05-03'),
('4', 'B005', 'RUSAK', 3, 'Mail ngerusakin', '2019-05-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `opname`
--
ALTER TABLE `opname`
  ADD PRIMARY KEY (`kode_opname`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `opname`
--
ALTER TABLE `opname`
  ADD CONSTRAINT `opname_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
