-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18 Apr 2019 pada 08.28
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail_order` int(10) NOT NULL,
  `id_order` int(25) NOT NULL,
  `id_masakan` int(10) NOT NULL,
  `keterangan` varchar(25) NOT NULL,
  `status_detail_order` enum('konfirmasi','batal','menunggu') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_order`
--

INSERT INTO `detail_order` (`id_detail_order`, `id_order`, `id_masakan`, `keterangan`, `status_detail_order`) VALUES
(11, 10, 8, '', 'konfirmasi'),
(12, 10, 7, '', 'konfirmasi'),
(13, 12, 7, '', 'konfirmasi'),
(14, 13, 4, '', 'konfirmasi'),
(15, 14, 9, '', 'konfirmasi'),
(16, 14, 6, 'Pedas Sedang', 'konfirmasi'),
(17, 15, 7, '', 'konfirmasi'),
(18, 15, 9, '', 'konfirmasi'),
(19, 15, 9, '', 'konfirmasi'),
(20, 16, 8, 'Pedas Sedang', 'konfirmasi'),
(21, 16, 9, '', 'konfirmasi'),
(22, 17, 3, 'Ekstra Pedass', 'konfirmasi'),
(23, 18, 6, 'Pedas', 'konfirmasi'),
(24, 18, 4, '', 'konfirmasi'),
(25, 19, 10, 'Super Pedas', 'konfirmasi'),
(26, 20, 6, '', 'konfirmasi'),
(27, 21, 6, 'Pedass Sangaddd', 'konfirmasi'),
(28, 21, 9, '', 'konfirmasi'),
(29, 25, 4, 'Ga Pake Gula', 'konfirmasi'),
(30, 25, 6, 'Pedas', 'konfirmasi'),
(31, 26, 4, '', 'menunggu'),
(32, 24, 4, '', 'menunggu'),
(33, 27, 3, 'Pedas', 'menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritik`
--

CREATE TABLE `kritik` (
  `id_kritik` int(11) NOT NULL,
  `tanggal_kritik` date NOT NULL,
  `kritik` varchar(50) NOT NULL,
  `star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kritik`
--

INSERT INTO `kritik` (`id_kritik`, `tanggal_kritik`, `kritik`, `star`) VALUES
(1, '2019-03-05', 'testimoni', 0),
(2, '2019-03-30', 'Masakan nya enak - enak', 1),
(3, '2019-03-30', 'Bikin Pngn Nambah', 1),
(4, '2019-04-01', 'Pelayanan nya baik', 0),
(5, '2019-04-01', 'Kurang Nikmat', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(2) NOT NULL,
  `nama_level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(0, 'admin'),
(1, 'user'),
(2, 'waiter'),
(3, 'kasir'),
(4, 'owner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `listmeja`
--

CREATE TABLE `listmeja` (
  `id_meja` int(2) NOT NULL,
  `no_meja` varchar(5) NOT NULL,
  `status_meja` enum('kosong','dipesan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `listmeja`
--

INSERT INTO `listmeja` (`id_meja`, `no_meja`, `status_meja`) VALUES
(1, '1', 'dipesan'),
(4, '4', 'dipesan'),
(5, '5', 'kosong'),
(6, '6', 'kosong'),
(7, '7', 'kosong'),
(8, '8', 'kosong'),
(9, '9', 'kosong'),
(10, '10', 'kosong'),
(11, '11', 'kosong'),
(12, '12', 'kosong'),
(13, '13', 'kosong'),
(14, '14', 'kosong'),
(15, '15', 'kosong'),
(16, '2', 'kosong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masakan`
--

CREATE TABLE `masakan` (
  `id_masakann` int(5) NOT NULL,
  `nama_masakan` varchar(25) NOT NULL,
  `gambar_refrensi` varchar(25) NOT NULL,
  `harga` int(11) NOT NULL,
  `status_makanan` enum('ada','habis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masakan`
--

INSERT INTO `masakan` (`id_masakann`, `nama_masakan`, `gambar_refrensi`, `harga`, `status_makanan`) VALUES
(3, 'Rujak Buah', 'upload/galeri3.jpg', 7000, 'ada'),
(4, 'Jus Buah Naga', 'upload/galeri.jpg', 5000, 'ada'),
(6, 'Rujak Petis', 'upload/galeri5.jpg', 5000, 'ada'),
(7, 'Rujak Buah Jumbo', 'upload/galeri4.jpg', 20000, 'habis'),
(8, 'Tahu Tek', 'upload/galeri6.jpg', 5000, 'ada'),
(9, 'Coklat Oreo', 'upload/coklat-8.jpg', 7000, 'ada'),
(10, 'Gurame Goreng', 'upload/parallax3.jpg', 12000, 'ada'),
(11, 'Nasi Goreng Special', 'upload/parallax1.jpg', 14000, 'habis'),
(12, 'Telor Dadar', 'upload/parallax.jpg', 8000, 'ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderan`
--

CREATE TABLE `orderan` (
  `id_order` int(2) NOT NULL,
  `no_meja` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(2) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status_order` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orderan`
--

INSERT INTO `orderan` (`id_order`, `no_meja`, `tanggal`, `id_user`, `keterangan`, `status_order`) VALUES
(10, '2,5,8', '2019-03-08', 4, 'Pesanan Biasa', 'selesai'),
(11, '2,3,5,6', '2019-03-08', 4, 'Pesanan Biasa', 'batal'),
(12, '8,11,15', '2019-03-12', 4, 'Pesanan Biasa', 'selesai'),
(13, '3', '2019-03-12', 4, 'Pesanan Biasa', 'selesai'),
(14, '14', '2019-03-22', 13, 'Sendiri', 'selesai'),
(15, '1', '2019-03-22', 13, 'Couple', 'selesai'),
(16, '13', '2019-04-01', 18, 'Jomblo', 'selesai'),
(17, '1', '2019-04-01', 18, 'Pesanan Biasa', 'selesai'),
(18, '2', '2019-04-01', 20, 'Jam 3 Sore', 'selesai'),
(19, '14', '2019-04-01', 21, 'Couple', 'selesai'),
(20, '3', '2019-04-02', 4, 'asw', 'selesai'),
(21, '5', '2019-04-06', 22, 'Jam 4 Sore', 'selesai'),
(22, '12', '2019-04-06', 22, 'Pesanan Biasa', 'batal'),
(23, '4', '2019-04-07', 4, 'Pesanan Biasa', 'batal'),
(24, '1', '2019-04-16', 4, 'Jam 4 Sore', 'dikonfirmasi'),
(25, '1', '2019-04-09', 23, 'Jam 4 Sore', 'selesai'),
(26, '3', '2019-04-09', 23, 'Jam 1 Siang', 'dikonfirmasi'),
(27, '4', '2019-04-18', 4, 'Jam 12 Siang', 'dikonfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_meja`
--

CREATE TABLE `status_meja` (
  `id_meja` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_meja`
--

INSERT INTO `status_meja` (`id_meja`) VALUES
(0),
(0),
(0),
(0),
(0),
(0),
(0),
(0),
(0),
(0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(2) NOT NULL,
  `id_user` int(2) NOT NULL,
  `id_order` int(2) NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_order`, `tanggal`, `total_bayar`) VALUES
(1, 18, 16, '2019-04-01', '12000'),
(2, 18, 17, '2019-04-01', '7000'),
(3, 20, 18, '2019-04-01', '10000'),
(4, 21, 19, '2019-04-01', '12000'),
(5, 4, 20, '2019-04-02', '5000'),
(6, 22, 21, '2019-04-06', '12000'),
(7, 23, 25, '2019-04-09', '10000'),
(8, 23, 26, '2019-04-09', '5000'),
(9, 4, 24, '2019-04-16', '5000'),
(10, 4, 27, '2019-04-18', '7000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `foto_profil` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `id_level` enum('0','1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `foto_profil`, `nama_user`, `id_level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 'adminniadminadminadmin', '0'),
(2, 'ami', '122135c47880cd51cc4f27a22f5168b3', '', 'Nurendah Trisnawati', '0'),
(4, 'dhiya', '3ea98548e31f0d0360e0fdd51263a11c', '', 'Dhiya Ulhaq', '1'),
(7, 'dhiyaz', 'd9e85deab6f10641503cd00a88f5ffa1', '', 'Dhiya Ulhaq', '1'),
(8, 'dhiyazz', '6da3b8d9c6a7e3d0ff2ddf32e59c1f23', '', 'Dhiya Ulhaq', '1'),
(9, 'hakim', '522748524ad010358705b6852b81be4c', '', 'yy', '1'),
(10, 'dasdas', '7815696ecbf1c96e6894b779456d330e', '', 'asdasd', '1'),
(11, 'asdasda', '0aa1ea9a5a04b78d4581dd6d17742627', 'upload/avatar/concertt.jpg', 'sdaasda', '1'),
(12, 'asda', 'adbf5a778175ee757c34d0eba4e932bc', '', 'asda', '1'),
(13, 'Gabril', '9984820917781512e7fd251d2be5e352', 'upload/avatar/1551974088032..jpg', 'Brilliano Dhiya Ulhaq', '1'),
(14, 'Geo', 'ecc174e3e02c82f34c14fe860bf47ef2', 'upload/avatar/15522116380225756201566132716516.jpg', 'Geovanny', '1'),
(15, 'kasir', 'c7911af3adbd12a035b289556d96470a', '', 'kepalakasir', '3'),
(16, 'waiter', 'f64cff138020a2060a9817272f563b3c', '', 'kepalawaiter', '2'),
(17, 'pemilik', '58399557dae3c60e23c78606771dfa3d', '', 'pemilik', '4'),
(18, 'Kelpin', '127b4d31f96d4dd9a828ebfc826e1169', 'upload/avatar/K0526011202552.JPG', 'Celvin Abdul HarisJ', '1'),
(19, 'danang', '6a17faad3b1275fd2558d5435c58440e', 'upload/avatar/K0526011202578.JPG', 'Danang Bayu Wahyu Aji', '1'),
(20, 'maya', 'b2693d9c2124f3ca9547b897794ac6a1', 'upload/avatar/admin.png', 'Maya Agustina', '1'),
(21, 'antoon', '09249e4fd60aaf23fd872cd205668b23', 'upload/avatar/K0526011202498.JPG', 'Antoon Virnanda', '1'),
(22, 'test', '098f6bcd4621d373cade4e832627b4f6', '', 'testi', '1'),
(23, 'Brilli', '8d309f7a47494150ad915568202e712d', 'upload/avatar/default.jpg', 'Brilliano Dhiya', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail_order`);

--
-- Indexes for table `kritik`
--
ALTER TABLE `kritik`
  ADD PRIMARY KEY (`id_kritik`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `listmeja`
--
ALTER TABLE `listmeja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indexes for table `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id_masakann`);

--
-- Indexes for table `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail_order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `kritik`
--
ALTER TABLE `kritik`
  MODIFY `id_kritik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `listmeja`
--
ALTER TABLE `listmeja`
  MODIFY `id_meja` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `masakan`
--
ALTER TABLE `masakan`
  MODIFY `id_masakann` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orderan`
--
ALTER TABLE `orderan`
  MODIFY `id_order` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
