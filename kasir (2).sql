-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 06:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `detailpenjualan`
--

CREATE TABLE `detailpenjualan` (
  `DetailID` int(11) NOT NULL,
  `PenjualanID` int(11) NOT NULL,
  `ProdukID` int(11) DEFAULT NULL,
  `JumlahProduk` int(11) NOT NULL,
  `Subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detailpenjualan`
--

INSERT INTO `detailpenjualan` (`DetailID`, `PenjualanID`, `ProdukID`, `JumlahProduk`, `Subtotal`) VALUES
(16, 11, 4, 1, 31000000.00),
(26, 17, 4, 1, 14000.00),
(30, 11, 7, 2, 54550000.00),
(32, 19, 2, 1, 35000000.00),
(33, 21, 4, 1, 31000000.00),
(34, 20, 2, 1, 35000000.00),
(35, 16, 2, 1, 35000000.00);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `PelangganID` int(11) NOT NULL,
  `NamaPelanggan` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `NomorTelepon` varchar(15) NOT NULL,
  `JumlahPoin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`PelangganID`, `NamaPelanggan`, `Alamat`, `NomorTelepon`, `JumlahPoin`) VALUES
(1, 'Pelanggan', '-', '-', 0),
(1202060859, 'jaemin pacar sasa', 'korea pokonya', '8453674753', 125),
(1402082807, 'Daffa Egbert Faathir', 'depok', '2107202223', 2107),
(1702000148, 'Gissele ', 'jalanin aja dlu', '8123456789', 50),
(1702000149, 'Pelanggan', '', '', 0),
(1902092933, 'Tia', 'Cigugur tengah', '08965678847', 190),
(1902093222, 'icaanisa', 'padalarang ciburial', '08965678847', 3999),
(1902093549, 'zahwa ', 'padasuka', '892346455', 2401),
(2002031519, 'Mamat', 'Cigugur tengah', '811111111111', 100),
(2002074239, 'Tatang Sutarma', 'Cimahi Selatan', '84171268391', 67),
(2002074240, 'Pelanggan', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengelola`
--

CREATE TABLE `pengelola` (
  `PengelolaID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` enum('admin','kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengelola`
--

INSERT INTO `pengelola` (`PengelolaID`, `Username`, `Email`, `Password`, `Role`) VALUES
(6, 'Juminten', 'b@gmail.com', '$2y$10$QiJ4fDUWlGwf3ZKjI8LGBeRTr66tK.MMH.kj8Eb/ZlUd.lB/X/PEe', 'admin'),
(7, 'Suparman', 's@gmail.com', '$2y$10$W7R5ryqpUbgTGSXjVCyxluTQ1S13Lmc/wpnpX9a4bGCl.ld1aWXRq', 'kasir'),
(10, 'Anisa Risqy', 'nisaichaa@gmail.com', '$2y$10$yCbdyQjHyAPzlDXkni19/.NzNiY4eyMQQKqayVRGF01yDZFcNvrbi', 'kasir'),
(11, 'Fasya Syabila', 'fasya12@gmail.com', '$2y$10$/dQZqPdgxRmqzJKUweJkBuvdZKFmnhG8oJFDyfIewbQoZvkZ8fFGW', 'kasir'),
(12, 'Anisa Risqy', 'anisarisqy802@gmail.com', '$2y$10$raFZ.tB0R/VMY.5LzhSfk.uL.x3bGZnWSLbzqfeRMskMCS472Jmv2', 'kasir'),
(99, 'a', 'a@mail.cc', 'a', 'kasir'),
(100, 'Anisa Risqy', 'anisarisqy802@gmail.com', '$2y$10$ql32ZzzOcRVO7InFOqcOOenMJAPzMfw961qKA50ZrY3KFA4IgdgO6', 'kasir'),
(101, 'Anisa Risqy', 'anisarisqy802@gmail.com', '$2y$10$TfScuDmLYIvHnFj3p/ED3eJwa8voXpOqG/PL6VHhmrpdH7zK/hOTe', 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `PenjualanID` int(11) NOT NULL,
  `TanggalPenjualan` date NOT NULL,
  `TotalHarga` decimal(10,2) NOT NULL,
  `PelangganID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`PenjualanID`, `TanggalPenjualan`, `TotalHarga`, `PelangganID`) VALUES
(11, '2024-02-12', 76995000.00, 1202060859),
(15, '2024-02-14', 3000000.00, 1402082807),
(16, '2024-02-17', 35000000.00, 1702000148),
(17, '2024-02-19', 14000.00, 1902092933),
(18, '2024-02-19', 1500000.00, 1902093222),
(19, '2024-02-19', 29750000.00, 1902093549),
(20, '2024-02-20', 33250000.00, 2002031519),
(21, '2024-02-20', 31000000.00, 2002074239);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `ProdukID` int(11) NOT NULL,
  `NamaProduk` varchar(255) NOT NULL,
  `Harga` decimal(10,2) NOT NULL,
  `Stok` int(11) NOT NULL,
  `Gambar` varchar(100) NOT NULL,
  `Poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`ProdukID`, `NamaProduk`, `Harga`, `Stok`, `Gambar`, `Poin`) VALUES
(2, 'Crf 150L', 35000000.00, 1, 'Harga Honda CRF150L Terbaru 2024 _ PT Astra Honda Motor.jpeg', 350),
(4, 'Yamaha Nmax 155', 30000000.00, 18, '2023 Yamaha Aerox 155 Cyber City.jpeg', 55),
(7, 'Yamaha Aerox 155 Cyber City', 27275000.00, 4, '2023 Yamaha Aerox 155 Cyber City.jpeg', 155),
(11, 'Vario 125 ESP CBS dan ISS All New 2019', 25000000.00, 8, 'Honda Vario 125 & Honda Vario 150 gain new colours.jpeg', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD PRIMARY KEY (`DetailID`),
  ADD KEY `ProdukID` (`ProdukID`) USING BTREE,
  ADD KEY `PenjualanID` (`PenjualanID`) USING BTREE;

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`PelangganID`);

--
-- Indexes for table `pengelola`
--
ALTER TABLE `pengelola`
  ADD PRIMARY KEY (`PengelolaID`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`PenjualanID`),
  ADD KEY `PelangganID` (`PelangganID`) USING BTREE;

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ProdukID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  MODIFY `DetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `PelangganID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2002074241;

--
-- AUTO_INCREMENT for table `pengelola`
--
ALTER TABLE `pengelola`
  MODIFY `PengelolaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `PenjualanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `ProdukID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD CONSTRAINT `detailpenjualan_ibfk_1` FOREIGN KEY (`PenjualanID`) REFERENCES `penjualan` (`PenjualanID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailpenjualan_ibfk_2` FOREIGN KEY (`ProdukID`) REFERENCES `produk` (`ProdukID`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`PelangganID`) REFERENCES `pelanggan` (`PelangganID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
