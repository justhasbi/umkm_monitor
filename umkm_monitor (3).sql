-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2020 at 12:25 PM
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
(2219, 29, 'Roti Modern', 'Jalan Pandanaran 1', 'Menjual aneka roti ', '2020-06-20 17:06:41'),
(2221, 29, 'Roti Aligator Semarang', 'Manyaran', 'Menjual roti untuk kebutuhan pernikahan dan hajatan', '2020-06-20 17:07:21'),
(2223, 31, 'Toko Kosmetik Laras', 'Gajahmungkur', 'Toko kosmetik herbal', '2020-06-20 17:14:19'),
(2225, 31, 'Toko Oleh - Oleh Semarang Dilan', 'Kedungmundu', 'Menjual makanan khas semarang', '2020-06-20 17:15:17'),
(2227, 33, 'Lumpia Pandanaran', 'Pandanaran', 'Menjual makanan Lumpia khas Semarang', '2020-06-20 17:16:04');

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
(13, 'Minuman', '2020-06-20 17:10:07', NULL),
(15, 'Kerajinan Tangan', '2020-06-20 17:10:15', NULL),
(17, 'Kosmetik', '2020-06-20 17:10:22', NULL),
(19, 'Kebersihan', '2020-06-20 17:10:28', NULL),
(21, 'Makanan Ringan', '2020-06-20 17:12:55', NULL);

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
(25, 2201, 'M0072', 'pasta gigi', 1, 1, 12000, 100, '2020-06-16 13:17:40', NULL),
(27, 2213, 'M150', 'Kratingdaeng', 1, 1, 15000, 0, '2020-06-16 16:07:08', NULL),
(33, 2219, 'P001', 'Donat Coklat Keju', 1, 13, 1500, 0, '2020-06-20 17:17:08', NULL),
(35, 2219, 'P002', 'Roti Sus Lumer Coklat', 1, 13, 3000, 0, '2020-06-20 17:17:58', NULL),
(37, 2219, 'P003', 'Roti Bantal Coklat, Keju, Pisang', 1, 13, 6000, 0, '2020-06-20 17:18:33', NULL),
(39, 2221, 'P004', 'Roti Buaya Toping Coklat Keju', 1, 13, 30000, 0, '2020-06-20 17:19:13', NULL),
(41, 2221, 'P005', 'Toping Coklat Meses', 1, 1, 20000, 0, '2020-06-20 17:19:58', NULL),
(43, 2223, 'P007', 'Sabun Cuci Muka Aloe Vera', 17, 13, 40000, 0, '2020-06-20 17:20:34', NULL),
(45, 2223, 'P008', 'Sabun Herbal Aroma Kasturi', 17, 13, 10000, 0, '2020-06-20 17:21:10', NULL),
(47, 2225, 'P009', 'Kacang Atom Rasa Bawang', 21, 1, 30000, 0, '2020-06-20 17:21:47', NULL),
(49, 2225, 'P010', 'Kacang Bogares Brebes', 21, 1, 30000, 0, '2020-06-20 17:22:14', NULL),
(51, 2227, 'P011', 'Lumpia Bandeng Pedas', 1, 11, 25000, 0, '2020-06-20 17:22:55', NULL),
(53, 2227, 'P012', 'Lumpia Ayam Asam Manis', 1, 11, 12000, 0, '2020-06-20 17:23:28', NULL),
(55, 2227, 'P013', 'Lumpia Ayam Barbeque', 1, 11, 12000, 0, '2020-06-20 17:23:59', NULL);

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
(11, 'Bungkus', '2020-06-15 20:53:14', NULL),
(13, 'Buah', '2020-06-20 17:10:47', NULL);

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
(19, 'hasbish', 'hasbish', '876a8313c3e46b9e10c2437d5a5a2c5cffad630d', 'Tegal', '1999-05-05', 'hasbi@gmail.com', 1),
(29, 'vidoriz', 'Vido Rizqy Setiardo', '22b7eb50080d1c1e640f4a9a7c43250b74c0f23f', 'Manyaran', '1999-01-20', 'vidorizqy@gmail.com', 2),
(31, 'dilanalya', 'Dilan Allya Barqy', '0da64ef3aefb8964c0b372875dc7e876ed40568f', 'Kelurahan Mugasari', '1999-06-04', 'dilanalya@gmail.com', 2),
(33, 'robbybirham', 'Robby Birham Nur Fajry', 'db88dfd509522004fb921d0afae0db0cc35f2035', 'Desa Kandri', '1999-12-12', 'robbybirham@gmail.com', 2);

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
  MODIFY `laporan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `laporan_item`
--
ALTER TABLE `laporan_item`
  MODIFY `laporan_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `outlet`
--
ALTER TABLE `outlet`
  MODIFY `outlet_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2229;

--
-- AUTO_INCREMENT for table `p_category`
--
ALTER TABLE `p_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `p_item`
--
ALTER TABLE `p_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `p_item`
--
ALTER TABLE `p_item`
  ADD CONSTRAINT `p_item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `p_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `p_unit` (`unit_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`outlet_id`) REFERENCES `outlet` (`outlet_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
