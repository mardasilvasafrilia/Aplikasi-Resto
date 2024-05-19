-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 04:12 AM
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
-- Database: `resto`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_menu` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_menu`, `jumlah_menu`, `total_harga`) VALUES
(79, 49, 23, 2, 50000),
(80, 43, 16, 1, 300000),
(81, 52, 17, 1, 38000),
(82, 38, 15, 1, 200000),
(83, 53, 16, 12312, 2147483647),
(84, 54, 16, 2, 600000),
(85, 58, 16, 2, 600000),
(86, 63, 15, 2, 400000),
(87, 63, 16, 2, 600000),
(89, 63, 28, 1, 50000),
(90, 65, 15, 2, 400000),
(113, 66, 15, 4, 800000),
(114, 66, 15, 3, 600000),
(115, 66, 20, 3, 75000),
(116, 67, 17, 3, 114000),
(117, 67, 29, 2, 40000),
(118, 67, 23, 4, 100000),
(119, 68, 15, 3, 600000),
(120, 70, 17, 3, 114000),
(121, 71, 35, 3, 174000),
(122, 72, 35, 3, 174000),
(123, 73, 34, 2, 50000),
(124, 73, 31, 2, 90000),
(125, 75, 16, 4, 1200000),
(127, 60, 17, 1, 38000),
(129, 76, 23, 2, 50000),
(130, 77, 29, 3, 60000),
(131, 77, 16, 3, 900000),
(135, 78, 15, 2, 400000),
(136, 79, 35, 3, 174000),
(137, 80, 29, 4, 80000),
(139, 81, 23, 4, 100000),
(140, 81, 27, 3, 150000),
(141, 82, 20, 2, 50000),
(142, 83, 32, 2, 50000),
(143, 83, 16, 2, 600000),
(144, 84, 28, 100, 5000000),
(146, 85, 34, 1, 25000),
(147, 86, 30, 2, 100000),
(148, 87, 36, 4, 180000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_menu`
--

CREATE TABLE `kategori_menu` (
  `id_kategori_menu` int(11) NOT NULL,
  `nama_kategori_menu` varchar(30) NOT NULL,
  `foto_kategori_menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_menu`
--

INSERT INTO `kategori_menu` (`id_kategori_menu`, `nama_kategori_menu`, `foto_kategori_menu`) VALUES
(32, 'Japanese food', 'mknanjpg.jpg'),
(33, 'Beef', 'yknk.jpg'),
(34, 'Ramen', 'ramen.jpeg'),
(35, 'Drink', 'minuman.jpg'),
(37, 'Ice Cream', 'eskrim.jpeg'),
(40, 'Dessert', 'dsrt.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_kategori_menu` int(11) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `deskripsi_menu` varchar(255) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `status_menu` enum('tersedia','habis') NOT NULL,
  `foto_menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_kategori_menu`, `nama_menu`, `deskripsi_menu`, `harga_menu`, `status_menu`, `foto_menu`) VALUES
(15, 32, 'Sushi', 'Sushi terdiri dari dua bagian yaitu nasi (shari) dan makanan yang diletakkan di atas nasi (neta).', 200000, 'tersedia', 'sushi.jpg'),
(16, 33, 'Yakiniku', 'Kepiting yang enakk', 300000, 'tersedia', 'yknk.jpg'),
(17, 34, 'Ramen Souyu', 'Ramen enakk lohh', 38000, 'tersedia', 'ramen.jpeg'),
(20, 37, 'Ice Cream ', 'Ice cream berbagai rasa', 25000, 'tersedia', 'eskrim.jpeg'),
(23, 40, 'Dessert Box', 'Berbagai Rasaaa, dijamin enakkk', 25000, 'tersedia', 'box.jpeg'),
(27, 32, 'Curry Rice', 'kari ayam, nasi', 50000, 'tersedia', 'kare.jpg'),
(28, 32, 'Onigiri', 'nasi yang diperas dengan tangan hingga berbentuk bulat, segitiga, atau agak lonjong', 50000, 'tersedia', 'onigiri.jpg'),
(29, 35, 'Lemon Tea', '===', 20000, 'tersedia', 'lemon.jpg'),
(30, 33, 'Teriyaki', 'Ayam teriyaki khas Jepang bisa dibuat dengan rasa gurih yang kuat. ', 50000, 'tersedia', 'teriyaki.jpeg'),
(31, 33, 'Katsu', 'Daging katsu', 45000, 'tersedia', 'katsu.jpg'),
(32, 35, 'Maccha', '====', 25000, 'tersedia', 'grtea.jpg'),
(34, 35, 'Brown sugar', '====', 25000, 'tersedia', 'boba.jpg'),
(35, 34, 'Ramen Miso', 'Gurih dan enakkk', 58000, 'tersedia', 'miso.jpg'),
(36, 34, 'Ramen Tsukemen', '=====', 45000, 'tersedia', 'ttt2.jpg'),
(37, 40, 'Cake Coklat', '=====', 32000, 'tersedia', 'ds2.jpg'),
(38, 40, 'Cake ', '====-====', 30000, 'tersedia', 'des.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id_role_user` int(11) NOT NULL,
  `nama_role_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id_role_user`, `nama_role_user`) VALUES
(1, 'admin'),
(2, 'kasir'),
(4, 'manager'),
(13, 'costumer');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `waktu_transaksi` datetime NOT NULL,
  `nomor_transaksi` varchar(30) NOT NULL,
  `grand_total_harga` int(11) NOT NULL DEFAULT 0,
  `nama_pembeli` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_transaksi` enum('selesai','onproses') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `waktu_transaksi`, `nomor_transaksi`, `grand_total_harga`, `nama_pembeli`, `id_user`, `status_transaksi`) VALUES
(38, '2023-11-17 07:32:37', 'INV/2023/0001', 150000, 'Cilpaa', 15, 'selesai'),
(39, '2023-11-17 07:33:27', 'INV/2023/0002', 20000, 'Zoroo', 1, 'selesai'),
(40, '2023-11-17 07:53:20', 'INV/2023/0003', 90000, 'Giepp', 1, 'selesai'),
(41, '2023-11-17 09:24:41', 'INV/2023/0004', 35000, 'Levii', 1, 'selesai'),
(42, '2023-11-17 09:31:59', 'INV/2023/0005', 46000, 'ppp', 1, 'selesai'),
(43, '2023-11-17 09:35:22', 'INV/2023/0006', 300000, 'gass', 1, 'selesai'),
(44, '2023-11-17 10:58:35', 'INV/2023/0007', 30000, 'nall', 1, 'selesai'),
(45, '2023-11-24 08:21:14', 'INV/2023/0008', 114000, 'gggg', 1, 'selesai'),
(46, '2023-11-24 08:30:14', 'INV/2023/0009', 0, 'kchan', 11, 'onproses'),
(47, '2023-12-04 07:09:54', 'INV/2023/0010', 0, 'aaaaaa', 1, 'onproses'),
(48, '2023-12-05 06:42:06', 'INV/2023/0011', 0, 'pppp', 1, 'onproses'),
(49, '2023-12-05 08:33:25', 'INV/2023/0012', 50000, 'hbtf', 1, 'selesai'),
(50, '2023-12-05 08:43:42', 'INV/2023/0013', 0, 'cdd', 1, 'onproses'),
(51, '2023-12-05 08:49:11', 'INV/2023/0014', 0, 'fcd', 1, 'onproses'),
(52, '2023-12-05 08:49:35', 'INV/2023/0015', 38000, 'hhhh', 1, 'selesai'),
(53, '2023-12-06 09:02:33', 'INV/2023/0016', 0, 'gfff', 1, 'onproses'),
(54, '2023-12-06 09:03:26', 'INV/2023/0017', 600000, 's', 1, 'selesai'),
(55, '2023-12-06 09:14:18', 'INV/2023/0018', 0, 'a', 1, 'onproses'),
(56, '2023-12-06 09:25:09', 'INV/2023/0019', 0, 'aaaa', 1, 'onproses'),
(57, '2023-12-06 09:42:21', 'INV/2023/0020', 0, 'hhhh', 1, 'onproses'),
(58, '2023-12-06 09:49:18', 'INV/2023/0021', 600000, '', 1, 'selesai'),
(59, '2023-12-07 06:44:37', 'INV/2023/0022', 0, 'aaaaa', 1, 'onproses'),
(60, '2023-12-07 12:53:03', 'INV/2023/0000', 38000, '', 15, 'selesai'),
(61, '2023-12-07 12:54:07', 'INV/2023/0000', 0, 'abc testing ya', 15, 'onproses'),
(62, '2023-12-07 12:55:26', 'INV/2023/0000', 0, 'abc testing lagi ya', 15, 'onproses'),
(63, '2023-12-07 12:56:24', 'INV/2023/0026', 1050000, 'cihuy', 15, 'selesai'),
(64, '2023-12-07 12:58:51', 'INV/2023/0027', 0, 'Coba ah', 15, 'onproses'),
(65, '2023-12-07 01:39:21', 'INV/2023/0028', 400000, 'jjlljj', 15, 'selesai'),
(66, '2023-12-07 02:22:41', 'INV/2023/0029', 1475000, 'misal yaa', 15, 'selesai'),
(67, '2023-12-07 03:27:30', 'INV/2023/0030', 254000, 'Alfi', 15, 'selesai'),
(68, '2023-12-07 03:46:03', 'INV/2023/0031', 0, 'yailaaa', 15, 'onproses'),
(69, '2023-12-07 04:02:32', 'INV/2023/0032', 0, 'aaaaaa', 15, 'onproses'),
(70, '2023-12-07 04:05:23', 'INV/2023/0033', 0, 'cdd', 15, 'onproses'),
(71, '2023-12-07 04:22:15', 'INV/2023/0034', 0, 'yaallah', 15, 'onproses'),
(72, '2023-12-07 04:33:55', 'INV/2023/0035', 0, 'part 2', 15, 'onproses'),
(73, '2023-12-07 04:47:57', 'INV/2023/0036', 0, 'cdd', 15, 'onproses'),
(74, '2023-12-08 10:30:59', 'INV/2023/0037', 0, 'ssas', 1, 'onproses'),
(75, '2023-12-08 04:46:47', 'INV/2023/0038', 1200000, 'yaallah', 15, 'selesai'),
(76, '2023-12-08 09:59:14', 'INV/2023/0039', 0, 'ffdfggd', 15, 'onproses'),
(77, '2023-12-08 10:00:55', 'INV/2023/0040', 0, 'hhhh', 15, 'onproses'),
(78, '2023-12-08 10:17:12', 'INV/2023/0041', 400000, 'cdd', 15, 'selesai'),
(79, '2023-12-08 10:39:51', 'INV/2023/0042', 174000, 'inall', 15, 'selesai'),
(80, '2023-12-08 10:40:32', 'INV/2023/0043', 80000, 'agipp', 15, 'selesai'),
(81, '2023-12-08 10:42:39', 'INV/2023/0044', 225000, 'ka rehan', 15, 'selesai'),
(82, '2023-12-08 04:52:50', 'INV/2023/0045', 50000, 'f', 1, 'selesai'),
(83, '2023-12-08 10:56:16', 'INV/2023/0046', 650000, 'cilpaaagippp', 15, 'selesai'),
(84, '2023-12-08 11:19:17', 'INV/2023/0047', 5000000, 'zorooo', 15, 'selesai'),
(85, '2023-12-10 01:58:10', 'INV/2023/0048', 50000, 'rara', 15, 'selesai'),
(86, '2023-12-10 02:38:54', 'INV/2023/0049', 100000, 'aaaaaa', 15, 'selesai'),
(87, '2023-12-10 02:39:35', 'INV/2023/0050', 180000, 'rabiahh', 15, 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_role_user` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_role_user`, `nama_user`, `username`, `password`, `foto_user`) VALUES
(1, 1, 'administartor aplikasi', 'admin', '$2y$10$DI1k0xsRHcgDf.CUnCdxo.5VfcukHQvmc14Ciza19vH8GJh6ZnnK.', 'zoro.jpg'),
(2, 2, 'kasir toko123', 'kasir', '$2y$10$bgrMAsiXU8GFp2xxKXrP6.wLj8lx6un.3FLQnV5cPpd8ygxKwOtQ.', 'icon.png'),
(11, 1, 'mrdsv', 'cilpa', '$2y$10$rH4X45Js.3wCT9B2wi0xEelWFI20S.EkUg27HLW6NYKFHoIdJ8KQa', 'kacchan.jpg'),
(14, 1, 'FIQRI', 'fnr', '$2y$10$yzJ.lnJGbHNqfBwbUwSBJ.DRD32wm.XzWqSXt94EBILwyRsNwYJDS', 'zoro.jpg'),
(15, 13, 'customer', 'customer', '$2y$10$liFKGsu5ht.QSifa65PIm.SSaqC62oxXyOYL2fWAuVlOB165nM.DG', 'icon.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `transaksi` (`id_transaksi`),
  ADD KEY `barang` (`id_menu`);

--
-- Indexes for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  ADD PRIMARY KEY (`id_kategori_menu`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `kategori` (`id_kategori_menu`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id_role_user`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_user` (`id_role_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  MODIFY `id_kategori_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id_role_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `barang` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `kategori_menu` FOREIGN KEY (`id_kategori_menu`) REFERENCES `kategori_menu` (`id_kategori_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `role_user` FOREIGN KEY (`id_role_user`) REFERENCES `role_user` (`id_role_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
