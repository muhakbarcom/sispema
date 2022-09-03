-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 12:48 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispema`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_detail_pemesanan` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_detail_pemesanan`, `id_pemesanan`, `id_produk`, `qty`, `total_harga`) VALUES
(12, 12, 11, 1, 50000),
(13, 12, 10, 1, 70000),
(14, 13, 10, 1, 70000),
(15, 14, 8, 5, 750000),
(16, 15, 11, 4, 200000),
(18, 17, 8, 1, 150000),
(19, 17, 7, 1, 230000),
(20, 17, 6, 1, 250000),
(21, 18, 14, 1, 5000),
(22, 18, 12, 1, 14700),
(23, 19, 14, 1, 5000),
(24, 20, 12, 1, 14700),
(25, 21, 12, 1, 14700),
(26, 21, 14, 1, 5000),
(27, 22, 14, 2, 10000),
(28, 22, 12, 1, 14700),
(29, 23, 12, 5, 73500),
(34, 28, 16, 100, 1470000),
(35, 28, 12, 1, 14700),
(36, 29, 16, 1, 14700),
(37, 30, 16, 1, 14700),
(38, 31, 16, 1, 14700),
(39, 32, 33, 1, 14500),
(40, 32, 32, 1, 6000),
(41, 38, 33, 1, 14500),
(42, 39, 33, 2, 29000),
(43, 39, 32, 1, 6000),
(44, 40, 15, 7, 102900),
(45, 40, 31, 10, 120),
(46, 41, 32, 1, 6000),
(47, 42, 32, 1, 6000),
(48, 43, 32, 1, 6000),
(49, 44, 32, 1, 6000),
(50, 45, 32, 1, 6000),
(51, 46, 27, 3, 36000),
(52, 47, 33, 1, 14500),
(53, 47, 31, 1, 12),
(54, 47, 30, 1, 15000),
(55, 48, 33, 1, 14500),
(56, 48, 31, 1, 12),
(57, 49, 33, 1, 14500),
(58, 49, 31, 1, 12),
(59, 50, 33, 1, 14500),
(60, 51, 30, 1, 15000),
(61, 51, 27, 1, 12000),
(62, 52, 33, 1, 14500),
(63, 52, 31, 1, 12),
(64, 52, 30, 2, 30000),
(65, 53, 30, 1, 15000),
(66, 54, 33, 1, 14500),
(67, 54, 31, 1, 12),
(68, 55, 33, 1, 14500),
(69, 55, 31, 1, 12),
(70, 56, 33, 1, 14500),
(71, 57, 33, 1, 14500),
(72, 57, 31, 1, 12),
(73, 58, 33, 1, 14500),
(74, 59, 33, 1, 14500),
(75, 60, 33, 1, 14500),
(76, 61, 33, 1, 14500),
(77, 62, 33, 2, 29000),
(78, 63, 33, 1, 14500),
(79, 64, 33, 1, 14500),
(80, 64, 31, 3, 36),
(81, 65, 33, 1, 14500);

-- --------------------------------------------------------

--
-- Table structure for table `frontend_menu`
--

CREATE TABLE `frontend_menu` (
  `id_menu` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frontend_menu`
--

INSERT INTO `frontend_menu` (`id_menu`, `label`, `link`, `id`, `sort`) VALUES
(1, 'Home', 'frontend/index', 'Home', 0),
(2, 'Features', 'frontend/features', 'Features', 1),
(3, 'About', 'frontend/about', 'about', 2),
(4, 'Sign in', 'login', 'signin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'waiter', 'General User'),
(33, 'restorant manager', 'manager toko'),
(34, 'cheff', 'cheff'),
(35, 'pelanggan', 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `groups_menu`
--

CREATE TABLE `groups_menu` (
  `id_groups` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups_menu`
--

INSERT INTO `groups_menu` (`id_groups`, `id_menu`) VALUES
(1, 40),
(1, 8),
(1, 89),
(1, 91),
(4, 91),
(1, 93),
(1, 94),
(1, 43),
(1, 44),
(1, 125),
(2, 125),
(7, 125),
(8, 125),
(17, 125),
(18, 125),
(24, 125),
(26, 125),
(28, 125),
(29, 125),
(1, 127),
(2, 127),
(2, 114),
(2, 117),
(2, 118),
(0, 122),
(1, 123),
(2, 124),
(34, 115),
(33, 120),
(1, 1),
(2, 1),
(33, 1),
(34, 1),
(35, 1),
(1, 3),
(2, 3),
(33, 3),
(34, 3),
(35, 3),
(2, 119),
(34, 119);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan`
-- (See below for the actual view)
--
CREATE TABLE `laporan` (
`tanggal_pemesanan` date
,`total_transaksi` bigint(21)
,`pendapatan` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 99,
  `level` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(125) NOT NULL,
  `label` varchar(25) NOT NULL,
  `link` varchar(125) NOT NULL,
  `id` varchar(25) NOT NULL DEFAULT '#',
  `id_menu_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `sort`, `level`, `parent_id`, `icon`, `label`, `link`, `id`, `id_menu_type`) VALUES
(1, 0, 1, 0, 'empty', 'MAIN NAVIGATION', '#', '#', 1),
(3, 1, 2, 1, 'fas fa-tachometer-alt', 'Dashboard', 'dashboard', '#', 1),
(4, 14, 2, 122, 'fas fa-table', 'CRUD Generator', 'crudbuilder', '1', 1),
(8, 10, 3, 40, 'fas fa-bars', 'Menu', 'cms/menu/side-menu', 'navMenu', 1),
(40, 9, 2, 122, 'empty', 'DEV', '#', '#', 1),
(44, 11, 2, 122, 'fas fa-angle-double-right', 'Groups', 'groups', '2', 1),
(89, 18, 2, 122, 'fas fa-th-list', 'Menu Type', 'menu_type', 'menu_type', 1),
(92, 3, 1, 0, 'empty', 'MASTER DATA', '#', 'masterdata', 1),
(107, 16, 2, 122, 'fas fa-cog', 'Setting', 'setting', 'setting', 1),
(109, 17, 2, 122, 'fas fa-align-justify', 'Frontend Menu', 'frontend_menu', 'Frontend Menu', 1),
(114, 12, 2, 122, 'fas fa-birthday-cake', 'Produk', 'produk', '#', 1),
(115, 6, 2, 92, 'fas fa-shopping-cart', 'Kelola Menu', 'produk', '#', 1),
(117, 13, 2, 122, 'fas fa-cart-arrow-down', 'Keranjang', '#', '#', 1),
(118, 15, 2, 122, 'fas fa-money-bill-wave', 'Pembayaran', '#', '#', 1),
(119, 7, 2, 92, 'fas fa-swatchbook', 'Kelola Pemesanan', 'pemesanan/admin', '#', 1),
(120, 4, 2, 92, 'far fa-calendar-alt', 'Kelola Laporan', 'laporan', '#', 1),
(122, 8, 1, 0, 'fas fa-ad', 'hidden', '#', '#', 1),
(123, 5, 2, 92, 'fas fa-user', 'Kelola User', 'users', '#', 1),
(124, 2, 2, 1, 'fas fa-cart-arrow-down', 'Kelola Pemesanan', 'frontend', '#', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_type`
--

CREATE TABLE `menu_type` (
  `id_menu_type` int(11) NOT NULL,
  `type` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_type`
--

INSERT INTO `menu_type` (`id_menu_type`, `type`) VALUES
(1, 'Side menu');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `metode_pembayaran` enum('bayar ditempat','transfer bank') NOT NULL,
  `status_pembayaran` enum('pembayaran tertunda','dalam proses','selesai') NOT NULL,
  `bukti_transfer` varchar(100) DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pemesanan`, `metode_pembayaran`, `status_pembayaran`, `bukti_transfer`) VALUES
(11, 12, 'transfer bank', 'dalam proses', 'iko13.jpg'),
(12, 13, 'bayar ditempat', 'dalam proses', NULL),
(13, 14, 'transfer bank', 'selesai', 'iko14.jpg'),
(14, 15, 'bayar ditempat', 'selesai', NULL),
(16, 17, 'bayar ditempat', 'selesai', NULL),
(17, 18, 'bayar ditempat', 'dalam proses', NULL),
(18, 19, 'bayar ditempat', 'selesai', NULL),
(19, 48, 'bayar ditempat', 'dalam proses', NULL),
(20, 49, 'transfer bank', 'dalam proses', 'iko13.jpg'),
(21, 50, 'bayar ditempat', 'dalam proses', NULL),
(22, 51, 'bayar ditempat', 'dalam proses', NULL),
(23, 52, 'transfer bank', 'selesai', 'iko13.jpg'),
(24, 53, 'transfer bank', 'selesai', 'iko13.jpg'),
(25, 55, 'transfer bank', 'pembayaran tertunda', 'iko13.jpg'),
(26, 56, 'bayar ditempat', 'pembayaran tertunda', NULL),
(27, 59, 'bayar ditempat', 'pembayaran tertunda', NULL),
(28, 61, 'bayar ditempat', 'pembayaran tertunda', ' '),
(29, 62, 'bayar ditempat', 'dalam proses', ' '),
(30, 63, 'transfer bank', 'selesai', 'Picture1.png'),
(31, 64, 'bayar ditempat', 'dalam proses', ' '),
(32, 65, 'transfer bank', 'selesai', 'Picture11.png');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `status_pemesanan` enum('sedang diproses','selesai','belum diproses') NOT NULL DEFAULT 'belum diproses',
  `id_cheff` int(11) DEFAULT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `no_meja` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `tanggal_pemesanan`, `total_pembayaran`, `id_pelanggan`, `status_pemesanan`, `id_cheff`, `nama_pemesan`, `no_meja`) VALUES
(18, '2022-08-02', 19700, 49, 'belum diproses', NULL, 'agus', '2'),
(19, '2022-08-11', 5000, 49, 'selesai', NULL, 'agus', '2'),
(20, '2022-08-11', 14700, 49, 'selesai', NULL, 'agus', '2'),
(21, '2022-08-11', 19700, 49, 'selesai', NULL, 'agus', '2'),
(22, '2022-08-11', 24700, 49, 'selesai', NULL, 'agus', '2'),
(23, '2022-08-11', 73500, 49, 'belum diproses', NULL, 'agus', '2'),
(24, '2022-08-11', 1484700, 49, 'belum diproses', NULL, 'agus', '2'),
(25, '2022-08-11', 1484700, 49, 'belum diproses', NULL, 'agus', '2'),
(26, '2022-08-11', 1484700, 49, 'belum diproses', NULL, 'agus', '2'),
(27, '2022-08-11', 1484700, 49, 'belum diproses', NULL, 'agus', '2'),
(28, '2022-08-11', 1484700, 49, 'belum diproses', NULL, 'agus', '2'),
(29, '2022-08-11', 14700, 49, 'selesai', NULL, 'agus', '2'),
(30, '2022-08-11', 14700, 49, 'selesai', NULL, 'agus', '2'),
(31, '2022-08-12', 14700, 49, 'belum diproses', NULL, 'agus', '2'),
(32, '2022-08-12', 20500, 49, 'selesai', NULL, 'agus', '2'),
(33, '2022-08-13', 0, 49, 'sedang diproses', NULL, 'agus', '2'),
(34, '2022-08-13', 0, 49, 'sedang diproses', NULL, 'agus', '2'),
(35, '2022-08-13', 0, 49, 'sedang diproses', NULL, 'agus', '2'),
(36, '2022-08-13', 0, 49, 'sedang diproses', NULL, 'agus', '2'),
(37, '2022-08-13', 0, 49, 'sedang diproses', NULL, 'agus', '2'),
(38, '2022-08-13', 14500, 49, 'sedang diproses', NULL, 'agus', '2'),
(39, '2022-08-15', 35000, 49, 'selesai', NULL, 'agus', '2'),
(40, '2022-08-16', 103020, 49, 'selesai', NULL, 'agus', '2'),
(41, '2022-08-19', 6000, 49, 'belum diproses', NULL, 'agus', '2'),
(42, '2022-08-19', 6000, 49, 'belum diproses', NULL, 'agus', '2'),
(43, '2022-08-19', 6000, 49, 'belum diproses', NULL, 'agus', '2'),
(44, '2022-08-19', 6000, 49, 'sedang diproses', 50, 'agus', '2'),
(45, '2022-08-19', 6000, 49, 'belum diproses', NULL, '', ''),
(46, '2022-09-02', 36000, 54, 'belum diproses', NULL, 'Pelanggan 01', NULL),
(47, '2022-09-02', 29512, 54, 'belum diproses', NULL, 'Pelanggan 01', NULL),
(48, '2022-09-02', 14512, 54, 'belum diproses', NULL, 'Pelanggan 01', NULL),
(49, '2022-09-02', 14512, 54, 'belum diproses', NULL, 'Pelanggan 01', NULL),
(50, '2022-09-02', 14500, 54, 'belum diproses', NULL, 'Pelanggan 01', NULL),
(51, '2022-09-02', 27000, 54, 'belum diproses', NULL, 'Pelanggan 01', NULL),
(52, '2022-09-02', 44512, 54, 'selesai', 50, 'Pelanggan 01', NULL),
(53, '2022-09-02', 15000, 54, 'sedang diproses', 50, 'Pelanggan 01', NULL),
(54, '2022-09-03', 14512, 49, 'belum diproses', NULL, 'gre', '9'),
(55, '2022-09-03', 14512, 54, 'belum diproses', NULL, 'Pelanggan 01', NULL),
(56, '2022-09-03', 14500, 56, 'belum diproses', NULL, 'muhammad grenius', NULL),
(57, '2022-09-03', 14512, 49, 'belum diproses', NULL, 'akbar', '09'),
(58, '2022-09-03', 14500, 49, 'belum diproses', NULL, '2020', '20'),
(59, '2022-09-03', 14500, 54, 'belum diproses', NULL, 'Pelanggan 01', NULL),
(60, '2022-09-03', 14500, 49, 'belum diproses', NULL, 'mama', '90'),
(61, '2022-09-03', 14500, 49, 'belum diproses', NULL, 'muhammad grenius', '09'),
(62, '2022-09-03', 29000, 49, 'selesai', 50, 'grenius geovani', '99'),
(63, '2022-09-03', 14500, 54, 'selesai', 50, 'Pelanggan 01', NULL),
(64, '2022-09-03', 14536, 49, 'selesai', NULL, 'asjkhdn', '89'),
(65, '2022-09-03', 14500, 54, 'selesai', 50, 'Pelanggan 01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `gambar_produk` varchar(50) NOT NULL,
  `ketersediaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `gambar_produk`, `ketersediaan`) VALUES
(12, 'Mie angel', 14700, 'mie_angel.jpg', 'Tersedia'),
(14, 'teh', 5000, 'teh.jpg', 'Tersedia'),
(15, 'mie setan', 14700, 'mie_setan1.jpg', 'Tersedia'),
(16, 'mie iblis', 14700, 'mie_iblis.jpg', 'Tersedia'),
(18, 'Siomay', 14, 'siomay.jpg', 'Tersedia'),
(19, 'Es Coklat', 12, 'es.jpg', 'Tersedia'),
(24, 'es sundelbolong', 8500, 'es1.jpg', 'Tersedia'),
(27, 'ceker', 12000, 'ceker.jpg', 'Tersedia'),
(30, 'lumpia udang', 15000, 'Lumpia_udang.jpg', 'Tersedia'),
(31, 'Green Thai tea', 12, '12.png', 'Tersedia'),
(32, 'Air Mineral', 6000, 'air_mineral2.jpg', 'Tidak Tersedia'),
(33, 'pangsit', 14500, 'pangsit.png', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nilai` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `kode`, `nama`, `nilai`) VALUES
(1, 'store.png', 'Sispema', 'www.sispema.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(254) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `image` varchar(128) NOT NULL DEFAULT 'default.jpg',
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `first_name`, `last_name`, `password`, `active`, `image`, `phone`) VALUES
(48, 'admin@gmail.com', 'admin@gmail.com', 'admin', 'grenius', '$2y$08$XikdAwJ3KSaqfSj71RuSO.755Qlu3vqXW6HCsJxioUR1wjjFQ14VS', 1, 'default.jpg', '0822222'),
(49, 'waiter@sispema.com', 'waiter@sispema.com', 'waiter', '1', '$2y$08$ef74XEANqDTWdXse2SW4tew0isSgyDULY/Y.S0xB4BcUsVR1Xflke', 1, 'default.jpg', '0821212'),
(50, 'cheff@sispema.com', 'cheff@sispema.com', 'cheff', '1', '$2y$08$7PSOxFmcb4ZMv8qOK9ggBeTtjeOg/sAYRaubKsAkDnBtBwilwnyTG', 1, 'default.jpg', '0822221'),
(51, 'manager@sispema.com', 'manager@sispema.com', 'restoran', 'manager', '$2y$08$44LisO.JjK1YXeNvsWAnvOfsl4Kskrd4chisxDEaQOCnESlBheMHu', 1, 'default.jpg', '0822222'),
(54, '', 'pelanggan01@gmail.com', 'Pelanggan', '01', '$2y$08$fbSv9bLe2YJUrODMQmCMy.z7.Ib8Lxt.oOtiS6nSikzCWb8AwyZyW', 1, 'default.jpg', '98888899'),
(55, '', 'admin2@gmail.com', 'admin2', '02', '$2y$08$2un5a.rgPWE.Uw7o5laetedgeDyEk9gr0u3nwSKYfGtqz4C.SWOii', 1, 'default.jpg', '99'),
(56, '', 'muhgre@gmail.com', 'muhammad', 'grenius', '$2y$08$j5XPJEvIk4ud15etLclni.fYTCdp3.Ng0ANgJW1vUAr4H0T/pqTqK', 1, 'default.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(25, 2, 2),
(11, 3, 2),
(10, 4, 2),
(13, 5, 8),
(17, 6, 5),
(19, 7, 6),
(21, 8, 7),
(1, 9, 17),
(90, 12, 2),
(67, 12, 8),
(135, 48, 1),
(138, 49, 2),
(136, 50, 34),
(137, 51, 33),
(140, 54, 35),
(141, 55, 1),
(142, 56, 35);

-- --------------------------------------------------------

--
-- Structure for view `laporan`
--
DROP TABLE IF EXISTS `laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan`  AS  (select `pemesanan`.`tanggal_pemesanan` AS `tanggal_pemesanan`,count(`pemesanan`.`id_pemesanan`) AS `total_transaksi`,sum(`pemesanan`.`total_pembayaran`) AS `pendapatan` from `pemesanan` group by `pemesanan`.`tanggal_pemesanan`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_detail_pemesanan`);

--
-- Indexes for table `frontend_menu`
--
ALTER TABLE `frontend_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id_menu_type`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id_detail_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `frontend_menu`
--
ALTER TABLE `frontend_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id_menu_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
