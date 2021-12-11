-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2021 at 02:53 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lazadi`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `status_berita` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_produk`, `judul_gambar`, `gambar`, `tanggal_update`) VALUES
(1, 1, 'Dress Motif', 'dress1.jpg', '2020-04-23 07:36:09'),
(2, 2, 'Dress Motif Bunga', 'dress4.jpg', '2020-04-23 07:38:34'),
(3, 3, 'Kerudung Motif', 'jilbab2.jpg', '2020-04-23 07:44:24'),
(4, 6, 'Denim Jaket Pria', 'denimpria1.jpg', '2020-04-23 08:15:45'),
(5, 7, 'High Heels', 'highheels1.jpg', '2020-04-23 08:20:04'),
(6, 9, 'Smart Watch', 'smartwatch1.jpg', '2020-04-23 08:27:22'),
(7, 9, 'Smart Watch', 'smartwatch2.jpg', '2020-04-23 08:27:30'),
(8, 11, 'Tote Bag', 'taswanita(2).jpg', '2020-04-23 08:31:28'),
(9, 12, 'Tas Kantor Wanita', 'taswanita(3)2.jpg', '2020-04-23 08:34:06'),
(10, 17, 'Jeans Levis', 'jeans2.jpg', '2020-04-23 08:43:06'),
(11, 17, 'Jeans Levis', 'jeans3.jpg', '2020-04-23 08:43:12'),
(12, 18, 'Kerudung Motif Rajut', 'hijab1.jpg', '2020-04-23 08:47:18'),
(13, 19, 'Flanel Panjang', 'panel2.jpg', '2020-04-23 08:51:20'),
(18, 19, 'Flanel Panjang', 'panel.jpg', '2020-07-31 10:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kode_transaksi` varchar(150) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `rekening_pelanggan` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(200) DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `id_user`, `id_pelanggan`, `nama_pelanggan`, `email`, `telepon`, `alamat`, `kode_transaksi`, `tanggal_transaksi`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `tanggal_post`, `tanggal_update`) VALUES
(1, 0, 1, 'Kimin', 'wd@gmail.com', '+62 877-1111-333', 'Tambun Selatan, Bekasi', '01082020FWTPO2KL', '2020-08-01 00:00:00', 1299000, 'Konfirmasi', 1299000, '2456782', 'Kimin', 'buktibayar.jpeg', 3, '2020-08-01', 'BANK BNI', '2020-08-01 16:22:02', '2020-08-01 14:24:07'),
(2, 0, 2, 'Testing', 'test1@gmail.com', '0873467346', 'Jalan Sama Aku, Nikah Sama Dia , Jawa Barat, Indonesia, 17519', '25062021LMPHF38G', '2021-06-25 00:00:00', 0, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-25 20:37:15', '2021-06-25 18:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(1, 'pakaian-pria', 'Pakaian Pria', 1, '2020-07-31 08:19:14'),
(2, 'pakaian-wanita', 'Pakaian Wanita', 2, '2020-07-31 08:19:23'),
(3, 'sepatu-pria', 'Sepatu Pria', 3, '2020-07-31 08:19:34'),
(4, 'sepatu-wanita', 'Sepatu Wanita', 4, '2020-07-31 08:28:52'),
(5, 'tas-pria', 'Tas Pria', 5, '2020-07-31 08:20:13'),
(6, 'tas-wanita', 'Tas Wanita', 6, '2020-07-31 08:20:28'),
(7, 'aksesoriss', 'Aksesoriss', 7, '2020-07-31 09:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(250) NOT NULL,
  `tagline` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `website` varchar(250) DEFAULT NULL,
  `keywords` text,
  `metatext` text,
  `telepon` varchar(25) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `rekening_pembayaran`, `tanggal_update`) VALUES
(1, 'Lazadi', 'Melayani Sepenuh Hati', 'codetechlabs@gmail.com', 'https://lazadi.rhmtin.com/', 'Toko Online Lazadi', 'Key Data Lazadi', '+62 877-8711-327', 'Jalan Sama Aku, Nikah Sama Dia , Jawa Barat, Indonesia, 17519', 'https://www.facebook.com/', 'https://www.instagram.com/', 'Lazadi Shop', 'logo.png', 'favicon.png', '666', '2020-05-20 18:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon` varchar(25) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
(1, 0, 'Pending', 'Kimin', 'wd@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '+62 877-1111-333', 'Tambun Selatan, Bekasi', '2020-08-01 16:12:38', '2020-08-01 14:12:38'),
(2, 0, 'Pending', 'Testing', 'test1@gmail.com', 'b444ac06613fc8d63795be9ad0beaf55011936ac', '0873467346', 'Jalan Sama Aku, Nikah Sama Dia , Jawa Barat, Indonesia, 17519', '2021-06-25 20:35:56', '2021-06-25 18:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `keywords` text,
  `harga` int(11) NOT NULL,
  `harga_beli` bigint(20) DEFAULT NULL,
  `harga_diskon` bigint(20) DEFAULT NULL,
  `tanggal_mulai_diskon` date DEFAULT NULL,
  `tanggal_selesai_diskon` date DEFAULT NULL,
  `stok_minimal` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `berat` float DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keywords`, `harga`, `harga_beli`, `harga_diskon`, `tanggal_mulai_diskon`, `tanggal_selesai_diskon`, `stok_minimal`, `stok`, `gambar`, `berat`, `size`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(1, 1, 2, 'DM01', 'Dress Motif', 'dress-motif-dm01', '<p>Bahan sangat lembut dan juga tidak tipis.</p>\r\n', 'Dress', 230000, 0, 0, NULL, NULL, 0, 5, 'dress.jpg', 300, 'All Size', 'Publish', '2020-04-23 09:27:58', '2021-06-25 17:30:16'),
(2, 1, 2, 'DM02', 'Dress Motif Bunga', 'dress-motif-bunga-dm02', '<p>Bahan sangat lembut dan juga tidak tipis. Sangat nyaman saat dipakai.</p>\r\n', 'Dress', 250000, 0, 0, NULL, NULL, 0, 7, 'dress3.jpg', 300, 'All Size', 'Publish', '2020-04-23 09:38:04', '2021-06-25 17:30:16'),
(3, 1, 2, 'KM01', 'Kerudung Motif', 'kerudung-motif-km01', '<p>Bahan yang lembut dan juga adem dikepala anda. Tidak terlalu tipis juga tidak terlalu tebal.. sangat nyaman dikepala anda.</p>\r\n', 'Kerudung', 120000, 0, 0, NULL, NULL, 0, 15, 'jilbab.jpg', 200, '', 'Publish', '2020-04-23 09:44:13', '2021-06-25 17:30:16'),
(4, 1, 1, 'JP01', 'Jaket Bomber', 'jaket-bomber-jp01', '<p>Jaket ini dibuat sepenuh hati. Juga mementingkan kualitas dari pada kuantitas. Walau harganya murah namun kualitas sangat berada di kelas papan atas.</p>\r\n', 'Jaket', 559000, 0, 0, NULL, NULL, 0, 16, 'bajupria.jpg', 600, 'L,XL', 'Publish', '2020-04-23 10:02:34', '2021-06-25 17:30:16'),
(5, 1, 2, 'JW01', 'Denim Jaket Wanita', 'denim-jaket-wanita-jw01', '<p>Bahan yang halus berbeda dari bahan jaket&nbsp;levis pada umumnya.</p>\r\n', 'Denim Jaket', 799000, 0, 0, NULL, NULL, 0, 10, 'Denim_Jaket_Wanita.jpg', 400, 'S,M,L', 'Publish', '2020-04-23 10:13:15', '2021-06-25 17:30:16'),
(6, 1, 1, 'JP02', 'Denim Jaket Pria', 'denim-jaket-pria-jp02', '<p>Bahan yang halus berbeda dari bahan jaket&nbsp;levis pada umumnya.</p>\r\n', 'Denim Jaket', 899000, 0, 0, NULL, NULL, 0, 13, 'denimpria.jpg', 600, 'M,L,XL', 'Publish', '2020-04-23 10:15:34', '2021-06-25 17:30:16'),
(7, 1, 4, 'SW01', 'High Heels', 'high-heels-sw01', '<p>Dari bahan-bahan yang berkualitas sehingga tidak mudah rusak, terlebih lagi sol bawah yang sangat kuat hingga tidak mudah patah. Dan pastinya anti&nbsp;<strong>SLIP&nbsp;</strong>.</p>\r\n', 'Sepatu Wanita', 999000, 0, 0, NULL, NULL, 0, 12, 'highheels.jpg', 500, '32-42', 'Publish', '2020-04-23 10:19:53', '2021-06-25 17:30:16'),
(8, 1, 4, 'SW02', 'Sepatu Long Heels', 'sepatu-long-heels-sw02', '<p>Terbuat dari bahan kulit buaya darat.</p>\r\n', 'Sepatu Wanita', 1490000, 0, 0, NULL, '0000-00-00', 0, 0, 'sepatuwanita.jpeg', 600, '30-40', 'Publish', '2020-04-23 10:24:41', '2021-06-25 17:30:36'),
(9, 1, 7, 'JAM01', 'Smart Watch', 'smart-watch-jam01', '<p>Original.</p>\r\n\r\n<p>Garansi 1 Tahun ibooooooxxx</p>\r\n', 'Jam Tangan', 2000000, 0, 0, NULL, NULL, 0, 4, 'smartwatch.jpg', 800, 'S,M,L,XL', 'Publish', '2020-04-23 10:27:10', '2021-06-25 17:30:51'),
(10, 1, 5, 'TASP01', 'BagPack', 'bagpack-tasp01', '<p>Sangat Berkualitas.</p>\r\n\r\n<p>Cocok untuk dipakai Generasi Milenial dan Gen-90</p>\r\n', 'Tas Pria', 1000000, 0, 0, NULL, NULL, 0, 15, 'taspria.jpeg', 600, '', 'Publish', '2020-04-23 10:29:51', '2021-06-25 17:31:00'),
(11, 1, 6, 'TASW01', 'Tote Bag', 'tote-bag-tasw01', '<p>Cocok untuk wanita Garis keras Indinesia</p>\r\n', 'Tas Wanita', 230000, 0, 0, NULL, NULL, 0, 12, 'taswanita.jpg', 300, '', 'Publish', '2020-04-23 10:31:07', '2021-06-25 17:30:57'),
(12, 1, 6, 'TASW02', 'Tas Kantor Wanita', 'tas-kantor-wanita-tasw02', '<p>Sangat cocok dipakai Wanita Karir. Dan pastinya akan menambah kesan cantik anda saat pergi dan pulang bekerja.</p>\r\n\r\n<p>Tersedia juga Warna Hitam.</p>\r\n', 'Tas Kulit', 2000000, 0, 0, NULL, NULL, 0, 12, 'taswanita(4).jpg', 600, '', 'Publish', '2020-04-23 10:33:56', '2021-06-25 17:31:10'),
(13, 1, 3, 'SP01', 'NIKI COSTUM SHOES', 'niki-costum-shoes-sp01', '<p>Sepatu NIKI Original dan di costum langsung oleh Designer terkenal</p>\r\n', 'Sepatu Costum', 3990000, 0, 0, NULL, NULL, 0, 2, 'sepatupria.jpeg', 700, '40-44', 'Publish', '2020-04-23 10:36:34', '2021-06-25 17:31:07'),
(14, 1, 7, 'KP01', 'Kalung Pria', 'kalung-pria-kp01', '<p>Dibuat dengan Kayu Jati .</p>\r\n', 'Kalung Kayu', 199000, 0, 0, NULL, NULL, 0, 11, 'kalungpria.jpg', 300, '', 'Publish', '2020-04-23 10:37:32', '2021-06-25 17:31:13'),
(15, 1, 7, 'KMATA01', 'Kacamata Black', 'kacamata-black-kmata01', '<p>Kacamata ini sangat cocok untuk kamu. Mengapa? Kerana ini bisa membuat kamu lebih ganteng lhoo~</p>\r\n', 'Kacamata', 899000, 0, 0, NULL, NULL, 0, 15, 'kacamata2.jpg', 400, '', 'Publish', '2020-04-23 10:39:29', '2021-06-25 17:31:16'),
(16, 1, 2, 'DR01', 'Dress Rajut Wanita', 'dress-rajut-wanita-dr01', '<p>Bahan yang tebal dan juga sangat adem saat dipakai.</p>\r\n', 'Dreess', 999000, 0, 0, NULL, NULL, 0, 10, 'bajuwanita.jpeg', 500, 'All Size', 'Publish', '2020-04-23 10:41:06', '2021-06-25 17:31:26'),
(17, 1, 1, 'JEANSL01', 'Jeans Levis', 'jeans-levis-jeansl01', '<p>Original Levis. Cocok buat kamu nihh~</p>\r\n', 'Levis', 400000, 0, 0, NULL, NULL, 0, 12, 'jeans.jpg', 600, '40-44', 'Publish', '2020-04-23 10:42:42', '2021-06-25 17:31:24'),
(18, 1, 2, 'KM02', 'Kerudung Motif Rajut', 'kerudung-motif-rajut-km02', '<p>Kerudung ini dibuat oleh bahan berkualitas, yang dikerjakan oleh penenun profesional. Yuk Order~~</p>\r\n', 'Kerudung Rajut', 199000, 100000, 109000, '2021-06-25', '2021-08-17', 1, 10, 'hijab.jpg', 200, '', 'Publish', '2020-04-23 10:47:07', '2021-06-25 18:10:36'),
(19, 1, 1, 'FLANEL01', 'Flanel Panjang', 'flanel-panjang-flanel01', '<p>Bahan yang lembut juga sangat nyaman dipakai. Buat kamu yang Bekerja atau Kuliah&nbsp; sangat cocok sekali. Kerana membuat kesan Cool pada kamu ..</p>\r\n', 'Flanel', 499000, 400000, 459000, '2021-06-24', '2021-07-10', 1, 120, 'panel1.jpg', 400, 'M,L,XL', 'Publish', '2020-04-23 10:50:52', '2021-06-25 18:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `gambar`, `tanggal_post`) VALUES
(1, 'BANK BNI', '2456782', 'Rahmat Subandi', NULL, '2020-04-24 18:46:32'),
(2, 'BANK BCA', '99838372721', 'Paing Supono', NULL, '2020-04-24 18:48:20'),
(3, 'BANK MANDIRI', '234342423', 'Kimin', NULL, '2020-08-01 03:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(1, 0, 1, '01082020FWTPO2KL', 6, 899000, 1, 899000, '2020-08-01 00:00:00', '2020-08-01 14:22:03'),
(2, 0, 1, '01082020FWTPO2KL', 17, 400000, 1, 400000, '2020-08-01 00:00:00', '2020-08-01 14:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(1, 'Rahmat Subandi', 'rhmtin12@gmail.com', 'rhmtin', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', 'Admin', '2020-04-22 14:54:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
