-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2018 at 03:55 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pusoln`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
`id` int(10) unsigned NOT NULL,
  `namalengkap` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `jk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `gambar` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alamatcusts`
--

CREATE TABLE IF NOT EXISTS `alamatcusts` (
`id` int(10) unsigned NOT NULL,
  `id_cus` int(11) NOT NULL,
  `desa` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `kec` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `kab` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `prov` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE IF NOT EXISTS `carts` (
`id` int(10) unsigned NOT NULL,
  `idprod` int(11) NOT NULL,
  `idcus` int(11) NOT NULL,
  `qtt` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `idprod`, `idcus`, `qtt`, `created_at`, `updated_at`) VALUES
(38, 22, 1, 1, '2018-12-07 12:28:41', '2018-12-07 12:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`id` int(10) unsigned NOT NULL,
  `nama` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `noHp` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `foto` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `id`
--

CREATE TABLE IF NOT EXISTS `id` (
`id` int(10) unsigned NOT NULL,
  `nama_paket` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kurirs`
--

CREATE TABLE IF NOT EXISTS `kurirs` (
`id` int(10) unsigned NOT NULL,
  `namakurir` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `jeniskurir` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `gambar` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kurirs`
--

INSERT INTO `kurirs` (`id`, `namakurir`, `jeniskurir`, `alamat`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'JNE', 'REG', 'JL. Jakarta', '', '2018-11-04 17:00:00', '2018-11-04 17:00:00'),
(2, 'JNE', 'EXPRESS', 'JL. Jakarta', '', '2018-11-04 17:00:00', '2018-11-04 17:00:00'),
(3, 'JNT', 'REG', 'JL. Jakarta', '', '2018-11-04 17:00:00', '2018-11-04 17:00:00'),
(4, 'JNT', 'EXPRESS', 'JL. Jakarta Barat', '', '2018-11-04 17:00:00', '2018-11-04 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2018_11_11_235640_customer', 1),
('2018_11_11_235717_alamatcust', 1),
('2018_11_11_235744_produk', 1),
('2018_11_11_235758_paket', 1),
('2018_11_11_235815_transaksi', 1),
('2018_11_25_023031_Cart', 1),
('2018_11_26_100744_Admin', 1),
('2018_11_26_142921_Kurir', 2),
('2018_12_04_045354_TotalTransc', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE IF NOT EXISTS `produks` (
`id` int(10) unsigned NOT NULL,
  `nama_prod` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `desc_prod` text COLLATE utf8_unicode_ci NOT NULL,
  `harga_prod` int(11) NOT NULL,
  `foto1_prod` text COLLATE utf8_unicode_ci NOT NULL,
  `foto2_prod` text COLLATE utf8_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `Kategori` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `khas` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_cus` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `nama_prod`, `desc_prod`, `harga_prod`, `foto1_prod`, `foto2_prod`, `stok`, `Kategori`, `khas`, `id_cus`, `created_at`, `updated_at`) VALUES
(20, 'Bawang Goreng Teri Medan', 'bawang goreng teri mean adalah salah satu makanan khas dari kota medan yang yang rasanya begitu lezat dan mantap jika disajikan dengan nasi.', 25000, '1544207766.jpg', '', 4, 'Makanan', 'Medan', 1, '2018-12-07 11:36:06', '2018-12-07 11:36:06'),
(21, 'Kue Biki Pala Khas Sukabumi', 'makanan ini adalah makanan yang terbuat dari biji pala yang sudah tua kemudian diolah dan menghasilkan cita rasa yang manis namun juga gurih. dan sangat menarik simpati jika melihatnya.', 15000, '1544207916.jpg', '', 10, 'Makanan', 'Sukabumi', 1, '2018-12-07 11:38:36', '2018-12-07 11:38:36'),
(22, 'Bolu Khas Madura', 'bolu ini merupakan bolu yang memiliki textur yang lembut dan menggoyang lidah, sehingga memanjakan orang yang memakannya.', 30000, '1544208007.jpg', '', 5, 'Makanan', 'Madura', 1, '2018-12-07 11:40:07', '2018-12-07 11:40:07'),
(23, 'Bolu Pisang Khas Sukabumi', 'bolu ini sangat lezat dan gurih dengan bahan yang berkualitas dengan ditambah toping rasa yang bervarian sehingga membuat cita rasa yang nikmat.', 28000, '1544208189.jpg', '', 6, 'Makanan', 'Sukabumi', 1, '2018-12-07 11:43:09', '2018-12-07 11:43:09'),
(24, 'Cimol Sangar Kawali', 'ini merupakan cimol yang terbuat dari berbagai bahan pilihan yang berkualitas dengan mempertimbangkan cita rasa yang sesuai dengan lidah para penggemarnya.', 32000, '1544210387.jpg', '', 11, 'Makanan', 'Kawali', 1, '2018-12-07 12:19:47', '2018-12-07 12:19:47'),
(25, 'Jajanan Sumedang', 'jajanan sumedang adalah makanan siap untuk di goreng yang mana nantinya akan mengembang dan memiliki rasa yang gurih.', 14000, '1544210478.jpg', '', 9, 'Makanan', 'Sumedang', 1, '2018-12-07 12:21:19', '2018-12-07 12:21:19'),
(26, 'Kacang Disco Bali', 'kacang disco adalah salah satu makanan khas dari bali yang dibuat dengan resep nenk moyang.', 27000, '1544210557.jpg', '', 28, 'Makanan', 'Bali', 1, '2018-12-07 12:22:37', '2018-12-07 12:22:37'),
(27, 'Kacang Polong Bali', 'ini adalah salah satu produk khas dari bali yang menjadi incara para rouris asing, yang hendak ingin berbelanja ke bali.', 17000, '1544210642.jpg', '', 17, 'Makanan', 'Bali', 1, '2018-12-07 12:24:02', '2018-12-07 12:24:02'),
(28, 'Kacang Kapri Cap Putri Bandung', 'kacang ini merupakan kacang yang ditanam tanah pasundan dan rasanya yang gurih dan lezat.', 29000, '1544210757.jpg', '', 12, 'Makanan', 'Bandung', 1, '2018-12-07 12:25:57', '2018-12-07 12:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `totaltransaksis`
--

CREATE TABLE IF NOT EXISTS `totaltransaksis` (
`id` int(10) unsigned NOT NULL,
  `id_cus` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_kurir` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `totaltransaksis`
--

INSERT INTO `totaltransaksis` (`id`, `id_cus`, `total`, `id_kurir`, `status`, `created_at`, `updated_at`) VALUES
(124, 1, 20525, 1, 1, '2018-12-04 20:02:31', '2018-12-04 20:02:31'),
(125, 1, 50502, 1, 1, '2018-12-05 02:27:59', '2018-12-05 02:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE IF NOT EXISTS `transaksis` (
`id` int(10) unsigned NOT NULL,
  `tanggal_transc` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `id_cus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_prod` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `qtt` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `namapenerima` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nohp` varchar(17) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `kota` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prov` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kodepos` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `tanggal_transc`, `id_cus`, `id_prod`, `qtt`, `harga_satuan`, `id_paket`, `namapenerima`, `nohp`, `alamat`, `kota`, `prov`, `kodepos`, `status`, `created_at`, `updated_at`) VALUES
(63, '', '1', '2', 0, 20000, 1, 'Fiki', '08678577588', 'Banjarsari Sukabumi', 'Kab. Sukabumi', 'Jawa Barat', '43183', 0, '2018-12-04 20:02:31', '2018-12-04 20:02:31'),
(64, '', '1', '1', 0, 50000, 1, 'Fiki', '08678577588', 'Banjarsari Sukabumi', 'Kab. Sukabumi', 'Jawa Barat', '43183', 1, '2018-12-05 02:27:59', '2018-12-05 02:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nohp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kodepos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `nohp`, `alamat`, `kodepos`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fiki', 'fikiirmansyah@gmail.com', '$2y$10$3fOa8c9NHHvMFj5HkUdYg.JA/034OMWOzTZh5OoAWmVK4qO6.whti', '08678577588', 'Banjarsari Sukabumi', '43183', NULL, '2018-11-26 03:19:22', '2018-11-26 03:19:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alamatcusts`
--
ALTER TABLE `alamatcusts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `id`
--
ALTER TABLE `id`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kurirs`
--
ALTER TABLE `kurirs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `totaltransaksis`
--
ALTER TABLE `totaltransaksis`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `alamatcusts`
--
ALTER TABLE `alamatcusts`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `id`
--
ALTER TABLE `id`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kurirs`
--
ALTER TABLE `kurirs`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `totaltransaksis`
--
ALTER TABLE `totaltransaksis`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
