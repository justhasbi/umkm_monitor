-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 11:14 AM
-- Server version: 10.4.10-MariaDB-log
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umkm_monitor`
--

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `laporan_id` int(11) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`laporan_id`, `outlet_id`, `tanggal`) VALUES
(33, 2201, '2020-06-19 15:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_item`
--

CREATE TABLE `laporan_item` (
  `laporan_item_id` int(11) NOT NULL,
  `laporan_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `terjual` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_item`
--

INSERT INTO `laporan_item` (`laporan_item_id`, `laporan_id`, `item_id`, `price`, `terjual`, `sub_total`) VALUES
(73, 33, 15, 20000, 3, 60000),
(75, 33, 17, 5000, 3, 15000),
(77, 33, 21, 3000, 2, 6000),
(79, 33, 23, 123123, 2, 246246),
(81, 33, 25, 12000, 2, 24000);

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE `outlet` (
  `outlet_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `outlet_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `outlet_desc` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `outlet`
--

INSERT INTO `outlet` (`outlet_id`, `user_id`, `outlet_name`, `address`, `outlet_desc`, `created`) VALUES
(2201, 9, 'Bakso Malang', 'Tegal', 'coba Outlet', '2020-06-15 08:56:11'),
(2203, 25, 'Rena Bakery', 'Manyaran', 'Menjual Produk Aneka Roti, enak dan Maknyoss', '2020-05-27 13:49:52'),
(2205, 9, 'Lumpia Bangjo', 'Bendan Ngisor, Semarang', 'Menjual Produk lumpia semarang, enak dan mantap. Berlokasi di Bendan Ngisor, Semarang samping UNISBANK menjadikan lokasi toko ini strategis', '2020-05-27 13:49:52'),
(2209, 25, 'Bakso Malang Cak Tajab', 'Samping Gor jati diri', 'coba saja sendiri', '2020-05-28 10:30:40'),
(2211, 25, 'Bandeng Presto Pandanaran', 'Pandanaran, Semarang', NULL, '2020-05-28 10:56:58'),
(2213, 27, 'Oleh Oleh semarang', 'pandanaran', 'Coba', '2020-06-15 09:17:07'),
(2215, 19, 'Toko Kecantikan Rina', 'Genuk', 'Menjual barang-barang kecantikan', '2020-06-19 14:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `p_category`
--

CREATE TABLE `p_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_category`
--

INSERT INTO `p_category` (`category_id`, `category_name`, `created`, `updated`) VALUES
(1, 'Makanan', '2020-06-14 21:32:50', NULL),
(3, 'asasdasd', '2020-06-13 10:37:04', NULL),
(7, 'kategori asalasd', '2020-06-13 11:22:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_item`
--

CREATE TABLE `p_item` (
  `item_id` int(11) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(10) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_item`
--

INSERT INTO `p_item` (`item_id`, `outlet_id`, `barcode`, `product_name`, `category_id`, `unit_id`, `price`, `stock`, `created`, `updated`) VALUES
(1, 2203, 'M001', 'Coba', 1, 1, 20000, 0, '2020-06-14 21:08:36', NULL),
(5, 2205, 'M004', 'Kacang Umpet Baru', 1, 1, 10000, 0, '2020-06-15 20:48:22', NULL),
(7, 2205, 'M007', 'Kripk Bayem', 1, 1, 15000, 0, '2020-06-15 20:50:43', NULL),
(9, 2209, 'M0071', 'Mie Aceh telur Puyuh', 1, 11, 20000, 0, '2020-06-15 20:54:53', NULL),
(11, 2209, 'M021', 'Capjay enak', 1, 11, 14500, 0, '2020-06-15 20:55:50', NULL),
(13, 2211, 'M0022', 'Soto Pandanaran', 1, 11, 15000, 0, '2020-06-15 20:58:40', NULL),
(15, 2201, 'M033', 'Bakso Malangm Cak Nun 2', 1, 11, 20000, 0, '2020-06-15 21:08:33', '2020-06-16 08:31:12'),
(17, 2201, 'M0023', 'Krupuk Udang Malang', 1, 11, 5000, 70, '2020-06-15 22:11:23', NULL),
(21, 2201, 'M0021', 'Televisi', 1, 1, 3000, 50, '2020-06-16 11:31:03', NULL),
(23, 2201, 'M0213', 'coba', 7, 1, 123123, 0, '2020-06-16 11:47:15', NULL),
(25, 2201, 'M0072', 'pasta gigi', 1, 1, 12000, 100, '2020-06-16 13:17:40', NULL),
(27, 2213, 'M150', 'Kratingdaeng', 1, 1, 15000, 0, '2020-06-16 16:07:08', NULL),
(29, 2215, 'M023', 'Hand Body Wash Wardah', 3, 3, 20000, 0, '2020-06-19 14:51:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_unit`
--

CREATE TABLE `p_unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_unit`
--

INSERT INTO `p_unit` (`unit_id`, `unit_name`, `created`, `updated`) VALUES
(1, 'Kilogram', '2020-06-14 21:32:26', NULL),
(3, 'asasdasd', '2020-06-13 10:37:04', NULL),
(7, 'kategori asalasd', '2020-06-13 11:22:53', NULL),
(9, 'Kilogram', '2020-06-13 17:20:41', NULL),
(11, 'Bungkus', '2020-06-15 20:53:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `item_id`, `outlet_id`, `type`, `qty`, `date`, `created`, `keterangan`) VALUES
(1, 25, 2201, 'in', 20, '2020-06-17', '2020-06-17 06:20:33', 'Dikirim dari pak joko'),
(3, 21, 2201, 'in', 20, '2020-06-17', '2020-06-17 06:21:04', 'Dikirim dari pak joko'),
(13, 17, 2201, 'in', 20, '2020-06-17', '2020-06-17 21:37:42', 'coba kirim');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `hak_akses` int(1) NOT NULL COMMENT '1:admin. 2:kasir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `nama`, `password`, `alamat`, `tanggal_lahir`, `email`, `hak_akses`) VALUES
(9, 'tokomulya', 'Vido Rizqy Setiardo', '67e6ea6352359c16b3964bced760498ebc00ce10', 'Tegal', '2000-03-02', 'hasbi@gmail.com', 2),
(19, 'hasbish', 'hasbish', '876a8313c3e46b9e10c2437d5a5a2c5cffad630d', 'Tegal', '1999-05-05', 'hasbi@gmail.com', 1),
(23, 'umkm1', 'umkmsample', 'c72b74599de55dccb9e63bc1bcbe26f70f519977', 'Semarang', '1999-06-09', 'umkm@gmail.com', 2),
(25, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', '1999-07-07', 'amin@gmail.com', 1),
(27, 'cobauser', 'cobauser', '34f70892f40cd3b2a340769c070c4f1a02335d87', 'Adiwerna', '2020-06-25', 'saifulcoba@mail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`laporan_id`),
  ADD KEY `outlet_id` (`outlet_id`);

--
-- Indexes for table `laporan_item`
--
ALTER TABLE `laporan_item`
  ADD PRIMARY KEY (`laporan_item_id`),
  ADD KEY `laporan_id` (`laporan_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`outlet_id`),
  ADD KEY `account_id` (`user_id`);

--
-- Indexes for table `p_category`
--
ALTER TABLE `p_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `p_item`
--
ALTER TABLE `p_item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `p_unit`
--
ALTER TABLE `p_unit`
  ADD PRIMARY KEY (`unit_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `outlet_id` (`outlet_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `laporan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `laporan_item`
--
ALTER TABLE `laporan_item`
  MODIFY `laporan_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `outlet`
--
ALTER TABLE `outlet`
  MODIFY `outlet_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2217;

--
-- AUTO_INCREMENT for table `p_category`
--
ALTER TABLE `p_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `p_item`
--
ALTER TABLE `p_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `p_item`
--
ALTER TABLE `p_item`
  ADD CONSTRAINT `p_item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `p_category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `p_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `p_unit` (`unit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`outlet_id`) REFERENCES `outlet` (`outlet_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
