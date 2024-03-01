-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 04:50 PM
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
-- Database: `projectfilm_rpl3`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `qty` date NOT NULL,
  `harga` varchar(20) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_barang`, `qty`, `harga`, `photo`) VALUES
(3, 'Ejen Ali The Movie, Misi : NEO', '2019-02-13', 'Lihat Sinopsis', 'aq.jpg'),
(8, 'Megan', '2023-01-21', 'Lihat Sinopsis', 'poster-de-megan-original.jpg'),
(9, '5 CM', '2012-12-04', 'Lihat Sinopsis', 'R.jpeg'),
(10, 'Oppenheimer, Destroyer of the World', '2023-07-19', 'Lihat Sinopsis', 'oppenheimer.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sinopsis`
--

CREATE TABLE `sinopsis` (
  `id_sinopsis` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `pembukaan` text NOT NULL,
  `pembukaan_lagi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `gambar_lagi` varchar(100) NOT NULL,
  `sinopsis` text NOT NULL,
  `sinopsis_lagi` text NOT NULL,
  `poster` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sinopsis`
--

INSERT INTO `sinopsis` (`id_sinopsis`, `id_barang`, `pembukaan`, `pembukaan_lagi`, `gambar`, `gambar_lagi`, `sinopsis`, `sinopsis_lagi`, `poster`) VALUES
(4, 9, 'Film 5 cm adalah film Indonesia bergenre drama adventure yang tayang kali pertama pada 2012.\r\n\r\nCerita dalam film garapan sutradara Rizal Mantovani ini diadaptasi dari Novel best seller berjudul sama karya Donny Dhirgantoro.', 'Dibintangi sederet aktor dan aktris papan atas Indonesia seperti, Fedi Nuril, Herjunot Ali, Igor Saykoji, Denny Sumargo, Raline Shah dan Pevita Pearce.  Film ini sukses merajai box office selama penayangannya di bioskop pada 2012 dengan jumlah penonton mencapai angka 2,5 juta orang.\r\n', '5.jpg', 'cm.jpg', 'Film 5 cm menceritakan tentang 5 sahabat karib yang sedang mencoba menguji ikatan persahabatan mereka dengan mendaki puncak Semeru bersama-sama. Kelima sahabat ini terdiri dari Genta (Fedi Nuril), sosok yang memiliki pemikiran dewasa dan sering dianggap sebagai pemimpin dalam geng ini.\r\n<br>\r\nLalu ada Zafran (Herjunot Ali), sosok yang puitis dan sedikit narsis. Arial (Denny Sumargo), cowok paling macho, taat aturan tapi sering grogi jika berhadapan dengan wanita. Ke empat, Riani (Raline Shah), satu-satunya perempuan dalam geng, termasuk cewek yang cerdas dan berambisi tinggi. Terakhir, Ian (Igor Saykoji), cowok berbadan subur tapi menjadi pembawa humor dalam geng ini.\r\n', 'Petualangan dalam kisah ini, bukanlah petualangan yang menantang adrenalin, demi melihat kebesaran sang Ilahi dari atas puncak gunung. Tetapi petualangan ini, juga perjalanan hati. Hati untuk mencintai persahabatan yang erat, dan hati yang mencintai negeri ini.\r\n\r\nSegala rintangan dapat mereka hadapi, karena mereka memiliki impian. Impian yang ditaruh 5 cm dari depan kening.', 'R.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ulasan` text NOT NULL,
  `rating` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_barang`, `id_user`, `ulasan`, `rating`) VALUES
(1000000039, 9, 19, 'Sedih banget loh rek', '8 Dari 10'),
(1000000040, 3, 18, 'Mantep Banget rek', '9 Dari 10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `photo_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `role`, `photo_user`) VALUES
(17, 'Montea', 'montea@gmail.com', '$2y$10$e5/kybFnU7UKkEc.MbQwX.VRw1slEF/ySGJY3Z.puFziyLBI8tY8C', 'admin', 'minyak.jpeg'),
(18, 'Apel', 'panther@gmail.com', '$2y$10$nUQeG3nWCHLPY1SbFrJLveZSdrR/TYW2B4x2FxP61y7RDVXGQyMh.', 'user', 'OIP.jpg'),
(19, 'Intel', 'itel@gmail.com', '$2y$10$ifXeYLsCtqCmtfOBy3JSjOeYsH5P3ph4LcZx4ycznm3T/dj2AikTq', 'user', '211401f6790415222d65b5f9d2982243_t.jpg'),
(20, 'Kotak', 'box@gmail.com', '$2y$10$bxRGnGzdfsUSbNQNlqCvEutwaJP9hbKaoJYW8q/KFXEvJYBmCQgue', 'user', 't.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `sinopsis`
--
ALTER TABLE `sinopsis`
  ADD PRIMARY KEY (`id_sinopsis`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_barang_2` (`id_barang`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `id_barang` (`id_barang`) USING BTREE,
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sinopsis`
--
ALTER TABLE `sinopsis`
  MODIFY `id_sinopsis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000041;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sinopsis`
--
ALTER TABLE `sinopsis`
  ADD CONSTRAINT `sinopsis_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_4` FOREIGN KEY (`id_barang`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulasan_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
