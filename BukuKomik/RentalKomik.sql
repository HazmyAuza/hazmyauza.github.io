-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 05:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalkomik`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `ID_Anggota` int(11) NOT NULL,
  `Nama` varchar(255) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Nomor_Telepon` varchar(15) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`ID_Anggota`, `Nama`, `Alamat`, `Nomor_Telepon`, `Email`, `Password`, `role`) VALUES
(101, 'Hazmy', 'Ciledug, Indonesia', '089994444', 'Hazmy@gmail.com', 'admin', 'admin'),
(102, 'Hina', 'Osaka, Jepang', '9932138', 'Hina@yahoo.co.jp', 'user', 'user'),
(103, 'Auza', 'Cildug, Indonesia', '98018251', 'Auza@gmail.com', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `bukukomik`
--

CREATE TABLE `bukukomik` (
  `ID_Buku` int(11) NOT NULL,
  `Judul` varchar(255) DEFAULT NULL,
  `Pengarang` varchar(255) DEFAULT NULL,
  `Tahun_Terbit` int(11) DEFAULT NULL,
  `Genre` varchar(100) DEFAULT NULL,
  `Jumlah_Stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bukukomik`
--

INSERT INTO `bukukomik` (`ID_Buku`, `Judul`, `Pengarang`, `Tahun_Terbit`, `Genre`, `Jumlah_Stok`) VALUES
(0, 'Berserk', 'Kentaro Miura', 1988, 'Dark fantasy', 5),
(1, 'Bakemonogatari', 'NisiO Isin', 2018, 'Misteri', 10),
(2, 'Ousama Ranking', 'Sosuke Toka', 2017, 'Petualangan', 8),
(3, 'Attack on Titan', 'Hajime Isayama', 2009, 'Fantasi', 12);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_Transaksi` int(11) NOT NULL,
  `ID_Anggota` int(11) DEFAULT NULL,
  `ID_Buku` int(11) DEFAULT NULL,
  `Tanggal_Pinjam` date DEFAULT NULL,
  `Tanggal_Kembali` date DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`ID_Transaksi`, `ID_Anggota`, `ID_Buku`, `Tanggal_Pinjam`, `Tanggal_Kembali`, `Status`) VALUES
(201, 101, 1, '2024-04-01', '2024-04-08', 'Kembali'),
(202, 102, 2, '2024-04-03', '2024-04-10', 'Kembali'),
(203, 103, 3, '2024-04-05', '2024-04-12', 'Terlambat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`ID_Anggota`);

--
-- Indexes for table `bukukomik`
--
ALTER TABLE `bukukomik`
  ADD PRIMARY KEY (`ID_Buku`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_Transaksi`),
  ADD KEY `ID_Anggota` (`ID_Anggota`),
  ADD KEY `ID_Buku` (`ID_Buku`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`ID_Anggota`) REFERENCES `anggota` (`ID_Anggota`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`ID_Buku`) REFERENCES `bukukomik` (`ID_Buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
