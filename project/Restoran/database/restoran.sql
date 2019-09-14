-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31 Mar 2019 pada 09.25
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
(13, 12, 7, '', 'menunggu'),
(14, 13, 4, '', 'menunggu'),
(15, 14, 9, '', 'menunggu'),
(16, 14, 6, 'Pedas Sedang', 'menunggu'),
(17, 15, 7, '', 'menunggu'),
(18, 15, 9, '', 'menunggu'),
(19, 15, 9, '', 'menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritik`
--

CREATE TABLE `kritik` (
  `id_kritik` int(11) NOT NULL,
  `tanggal_kritik` varchar(15) NOT NULL,
  `kritik` varchar(200) NOT NULL,
  `star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kritik`
--

INSERT INTO `kritik` (`id_kritik`, `tanggal_kritik`, `kritik`, `star`) VALUES
(1, '2019-03-05', 'testimoni', 0),
(2, '2019-03-30', 'Masakan nya enak - enak', 1),
(3, '2019-03-30', 'Bikin Pngn Nambah', 1);

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
(1, '1', 'kosong'),
(2, '2', 'kosong'),
(3, '3', 'dipesan'),
(4, '4', 'kosong'),
(5, '5', 'kosong'),
(6, '6', 'kosong'),
(7, '7', 'kosong'),
(8, '8', 'dipesan'),
(9, '9', 'kosong'),
(10, '10', 'kosong'),
(11, '11', 'dipesan'),
(12, '12', 'kosong'),
(13, '13', 'kosong'),
(14, '14', 'dipesan'),
(15, '15', 'dipesan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masakan`
--

CREATE TABLE `masakan` (
  `id_masakann` int(5) NOT NULL,
  `nama_masakan` varchar(25) NOT NULL,
  `gambar_refrensi` varchar(255) NOT NULL,
  `harga` varchar(25) NOT NULL,
  `status_makanan` enum('ada','habis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masakan`
--

INSERT INTO `masakan` (`id_masakann`, `nama_masakan`, `gambar_refrensi`, `harga`, `status_makanan`) VALUES
(3, 'Rujak Buah', 'upload/galeri3.jpg', '7000', 'ada'),
(4, 'Jus Buah Naga', 'upload/galeri.jpg', '5000', 'ada'),
(6, 'Rujak Petis', 'upload/galeri5.jpg', '5000', 'ada'),
(7, 'Rujak Buah Jumbo', 'upload/galeri4.jpg', '20000', 'habis'),
(8, 'Tahu Tek', 'upload/galeri6.jpg', '5000', 'ada'),
(9, 'Coklat Oreo', 'upload/coklat-8.jpg', '7000', 'ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderan`
--

CREATE TABLE `orderan` (
  `id_order` int(2) NOT NULL,
  `no_meja` varchar(100) NOT NULL,
  `tanggal` varchar(25) NOT NULL,
  `id_user` int(2) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status_order` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orderan`
--

INSERT INTO `orderan` (`id_order`, `no_meja`, `tanggal`, `id_user`, `keterangan`, `status_order`) VALUES
(10, '2,5,8', '2019-03-08', 4, 'Pesanan Biasa', 'selesai'),
(11, '2,3,5,6', '2019-03-08', 4, 'Pesanan Biasa', 'batal'),
(12, '8,11,15', '2019-03-12', 4, 'Pesanan Biasa', 'selesai'),
(13, '3', '2019-03-12', 4, 'Pesanan Biasa', 'dikonfirmasi'),
(14, '14', '2019-03-22', 13, 'Sendiri', 'dikonfirmasi'),
(15, '1', '2019-03-22', 13, 'Couple', 'menunggu');

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
  `tanggal` varchar(25) NOT NULL,
  `total_bayar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_profil` varchar(255) NOT NULL,
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
(17, 'pemilik', '58399557dae3c60e23c78606771dfa3d', '', 'pemilik', '4');

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
  MODIFY `id_detail_order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kritik`
--
ALTER TABLE `kritik`
  MODIFY `id_kritik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `listmeja`
--
ALTER TABLE `listmeja`
  MODIFY `id_meja` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `masakan`
--
ALTER TABLE `masakan`
  MODIFY `id_masakann` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orderan`
--
ALTER TABLE `orderan`
  MODIFY `id_order` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
