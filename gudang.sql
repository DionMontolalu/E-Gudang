-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2018 at 02:58 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`) VALUES
(1, 'admin', '12345', 'admin'),
(2, 'dion', '12345', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `gudang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `gudang_id`) VALUES
(1, 'FILTER SOLAR FC 1005', 106, 4),
(2, 'FILTER SOLAR FC 1003', 34, 1),
(3, 'FILTER SOLAR  16444 - 99128D', 17, 4);

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id_gudang` int(11) NOT NULL,
  `nama_gudang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id_gudang`, `nama_gudang`) VALUES
(1, 'Gudang Sindulang'),
(3, 'Gudang Mantos'),
(4, 'Gudang Malioboro'),
(5, 'Gudang Marina');

-- --------------------------------------------------------

--
-- Table structure for table `pemakai`
--

CREATE TABLE `pemakai` (
  `id_pemakai` int(11) NOT NULL,
  `nama_pemakai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemakai`
--

INSERT INTO `pemakai` (`id_pemakai`, `nama_pemakai`) VALUES
(1, 'TRONTON FUSO BELL UP DB 8501 QA'),
(2, 'TRONTON DB 8034 AU');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_in`
--

CREATE TABLE `transaksi_in` (
  `id_in` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `gudang_id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `item` int(20) NOT NULL,
  `harga` int(100) NOT NULL,
  `jumlah_harga` int(100) NOT NULL,
  `hormat` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_in`
--

INSERT INTO `transaksi_in` (`id_in`, `tgl`, `gudang_id`, `id_barang`, `item`, `harga`, `jumlah_harga`, `hormat`, `keterangan`) VALUES
(4, '2018-03-18', 4, 3, 10, 5000, 50000, 'ds', 'asa'),
(5, '2018-03-21', 1, 2, 20, 15000, 300000, 'Hdmi', 'Barang bagus');

--
-- Triggers `transaksi_in`
--
DELIMITER $$
CREATE TRIGGER `trans_masuk` AFTER INSERT ON `transaksi_in` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok + NEW.item
    WHERE id_barang=NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_out`
--

CREATE TABLE `transaksi_out` (
  `id_out` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_pemakai` int(11) NOT NULL,
  `item` int(50) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `pembawa` varchar(50) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_out`
--

INSERT INTO `transaksi_out` (`id_out`, `tgl`, `id_barang`, `id_pemakai`, `item`, `pengirim`, `pembawa`, `penerima`, `keterangan`) VALUES
(1, '2018-03-18', 1, 2, 20, 'ds', 'ds', 'ds', 'dwq'),
(2, '2018-03-18', 1, 1, 20, 'Paseo', 'Sidu', 'Asus', '-');

--
-- Triggers `transaksi_out`
--
DELIMITER $$
CREATE TRIGGER `trans_keluar` AFTER INSERT ON `transaksi_out` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok - NEW.item
    WHERE id_barang=NEW.id_barang;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indexes for table `pemakai`
--
ALTER TABLE `pemakai`
  ADD PRIMARY KEY (`id_pemakai`);

--
-- Indexes for table `transaksi_in`
--
ALTER TABLE `transaksi_in`
  ADD PRIMARY KEY (`id_in`);

--
-- Indexes for table `transaksi_out`
--
ALTER TABLE `transaksi_out`
  ADD PRIMARY KEY (`id_out`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pemakai`
--
ALTER TABLE `pemakai`
  MODIFY `id_pemakai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi_in`
--
ALTER TABLE `transaksi_in`
  MODIFY `id_in` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transaksi_out`
--
ALTER TABLE `transaksi_out`
  MODIFY `id_out` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
