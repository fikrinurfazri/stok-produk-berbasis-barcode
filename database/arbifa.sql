-- phpMyAdmin SQL Dump
-- version 5.2.2-dev+20230702.42f0b8fe0f
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 04:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arbifa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(180) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `last_login`, `level`) VALUES
(1, 'arbifa', '$2y$10$bAv50GZCowISeenApb0h3..FBbYLAXr20V8p8vKbbJc5aLNKvYPXS', '2023-08-12 21:30:48', 2),
(2, 'superadmin', '$2y$10$/A.EUraHzU3qH.neNmayDusDjUxqi57UXiFpUeDDIOJkLMqPeH56i', '2023-10-08 21:28:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `barcode` varchar(25) NOT NULL,
  `suplier` varchar(180) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `barcode`
--

CREATE TABLE `barcode` (
  `id` varchar(50) NOT NULL,
  `namaProduk` varchar(250) NOT NULL,
  `total` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_produk`
--

CREATE TABLE `jumlah_produk` (
  `id_jumlah` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_barang`
--

CREATE TABLE `laporan_barang` (
  `id_laporan` int(11) NOT NULL,
  `barcode` varchar(120) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_barang`
--

INSERT INTO `laporan_barang` (`id_laporan`, `barcode`, `jumlah`, `tanggal`, `jenis`) VALUES
(582, 'ARB003', 1, '2023-09-21', 'MASUK'),
(583, 'ARB003', 1, '2023-09-21', 'MASUK'),
(584, 'ARB003', 1, '2023-09-21', 'MASUK'),
(585, 'ARBIFA002', 1, '2023-09-24', 'MASUK'),
(586, 'ARBIFA002', 1, '2023-09-24', 'MASUK'),
(587, 'ARBIFA002', 1, '2023-09-24', 'MASUK'),
(588, 'ARB0015', 1, '2023-09-24', 'MASUK'),
(589, 'ARBIFA002', 1, '2023-09-24', 'MASUK'),
(590, 'ARB0015', 1, '2023-09-24', 'MASUK'),
(591, 'ARB003', 1, '2023-09-24', 'MASUK'),
(592, 'ARB0015', 1, '2023-09-24', 'MASUK'),
(593, 'ARB0015', 1, '2023-09-24', 'MASUK'),
(594, 'ARB003', 1, '2023-09-24', 'MASUK'),
(595, 'ARBIFA002', 1, '2023-09-24', 'MASUK'),
(596, 'ARB0015', 1, '2023-09-24', 'MASUK'),
(597, 'ARB003', 1, '2023-09-24', 'MASUK'),
(598, 'ARB003', 1, '2023-09-24', 'MASUK'),
(599, 'ARBIFA002', 1, '2023-09-24', 'MASUK'),
(600, 'ARB0015', 1, '2023-09-24', 'MASUK'),
(601, 'ARB0015', 1, '2023-09-24', 'MASUK'),
(602, 'ARB003', 1, '2023-09-24', 'MASUK'),
(603, 'ARBIFA002', 1, '2023-10-06', 'MASUK'),
(604, 'ARBIFA002', 1, '2023-10-06', 'MASUK'),
(605, 'ARBIFA002', 1, '2023-10-06', 'MASUK'),
(606, 'ARBIFA002', 1, '2023-10-06', 'MASUK'),
(607, 'ARBIFA002', 1, '2023-10-06', 'MASUK'),
(608, 'ARBIFA002', 1, '2023-10-06', 'MASUK'),
(609, 'ARBIFA002', 1, '2023-10-06', 'MASUK'),
(610, 'ARBIFA002', 1, '2023-10-06', 'MASUK'),
(611, 'ARBIFA002', 1, '2023-10-06', 'MASUK'),
(612, 'ARBIFA002', 1, '2023-10-06', 'MASUK'),
(613, 'ARBIFA002', 1, '2023-10-06', 'MASUK'),
(614, 'ARBIFA002', 1, '2023-10-06', 'MASUK');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `model` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `model`) VALUES
(10, 'zelda'),
(11, 'syakila');

-- --------------------------------------------------------

--
-- Table structure for table `products_all`
--

CREATE TABLE `products_all` (
  `id_product` int(11) NOT NULL,
  `models` varchar(180) NOT NULL,
  `collor` varchar(120) NOT NULL,
  `barcode` varchar(120) NOT NULL,
  `lantai` int(3) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_all`
--

INSERT INTO `products_all` (`id_product`, `models`, `collor`, `barcode`, `lantai`, `jumlah`) VALUES
(2, 'zelda', 'hitam', 'ARBIFA002', 1, 151),
(14, 'syakila', 'Merah', 'ARB003', 1, 8),
(15, 'syakila', 'Hijau', 'ARB0015', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `id` int(11) NOT NULL,
  `warna` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`id`, `warna`) VALUES
(8, 'Hijau'),
(9, 'Merah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indexes for table `jumlah_produk`
--
ALTER TABLE `jumlah_produk`
  ADD PRIMARY KEY (`id_jumlah`);

--
-- Indexes for table `laporan_barang`
--
ALTER TABLE `laporan_barang`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_all`
--
ALTER TABLE `products_all`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jumlah_produk`
--
ALTER TABLE `jumlah_produk`
  MODIFY `id_jumlah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_barang`
--
ALTER TABLE `laporan_barang`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=615;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products_all`
--
ALTER TABLE `products_all`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
