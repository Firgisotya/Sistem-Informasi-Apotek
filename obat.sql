-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 06:19 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obat`
--

-- --------------------------------------------------------

--
-- Table structure for table `fuzzy`
--

CREATE TABLE `fuzzy` (
  `id_fuzzy` varchar(255) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `jenis_obat` varchar(255) NOT NULL,
  `permintaan` varchar(255) NOT NULL,
  `persediaan` varchar(255) NOT NULL,
  `produksi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fuzzy`
--

INSERT INTO `fuzzy` (`id_fuzzy`, `bulan`, `tahun`, `jenis_obat`, `permintaan`, `persediaan`, `produksi`, `keterangan`) VALUES
('IDF-001', 'Januari', '2020', 'Obat Flu', 'SEDIKIT', 'SEDIKIT', 'SEDIKIT', 'STOK OBAT TETAP');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `kd_permintaan` varchar(255) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `jenis_obat` varchar(255) NOT NULL,
  `jumlah_obat` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`kd_permintaan`, `bulan`, `tahun`, `jenis_obat`, `jumlah_obat`) VALUES
('PM-001', 'Januari', '2021', 'Obat Flu', 10),
('PM-002', 'Februari', '2021', 'Obat Diare', 20),
('PM-003', 'Maret', '2021', 'Obat Maag', 30),
('PM-004', 'April', '2021', 'Obat Demam', 40);

-- --------------------------------------------------------

--
-- Table structure for table `persediaan`
--

CREATE TABLE `persediaan` (
  `kd_persediaan` varchar(255) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `jenis_obat` varchar(255) NOT NULL,
  `jumlah_obat` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persediaan`
--

INSERT INTO `persediaan` (`kd_persediaan`, `bulan`, `tahun`, `jenis_obat`, `jumlah_obat`) VALUES
('PS-001', 'Januari', '2021', 'Obat Flu', 10),
('PS-002', 'Februari', '2021', 'Obat Diare', 20),
('PS-003', 'Maret', '2021', 'Obat Maag', 30),
('PS-004', 'April', '2021', 'Obat Demam', 40),
('PS-005', 'Mei', '2021', 'Obat Flu', 5),
('PS-006', 'Juni', '2021', 'Obat Flu', 20),
('PS-007', 'Juli', '2021', 'Obat Maag', 30);

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `kd_produksi` varchar(255) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `jenis_obat` varchar(255) NOT NULL,
  `jumlah_obat` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`kd_produksi`, `bulan`, `tahun`, `jenis_obat`, `jumlah_obat`) VALUES
('PR-001', 'Januari', '2021', 'Obat Flu', 10),
('PR-002', 'Februari', '2021', 'Obat Diare', 20),
('PR-003', 'Maret', '2021', 'Obat Maag', 30),
('PR-004', 'April', '2021', 'Obat Demam', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(50) NOT NULL,
  `nm_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nm_kategori`) VALUES
(1, 'Obat Flu'),
(3, 'Obat Diare'),
(4, 'Obat Maag'),
(5, 'Obat Demam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `kd_obat` varchar(100) NOT NULL,
  `kat_obat` varchar(100) NOT NULL,
  `nm_obat` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `stok` int(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_obat`
--

INSERT INTO `tbl_obat` (`kd_obat`, `kat_obat`, `nm_obat`, `harga`, `stok`, `deskripsi`, `gambar`) VALUES
('KDO-001', 'Obat Maag', 'Promag', 5000, 80, 'Menghilangkan sakit maag', 'promag.jpg'),
('KDO-002', 'Obat Demam', 'Biogesic', 7000, 79, 'Obat untuk menurunkan Demam', 'biogesic.jpg'),
('KDO-003', 'Obat Demam', 'Sanmol', 10000, 80, 'Menurunkan Demam', 'sanmol.jpg'),
('KDO-004', 'Obat Maag', 'Mylanta', 15000, 80, 'Meringankan Sakit Maag', 'mylanta.jpg'),
('KDO-005', 'Obat Maag', 'Polysilane', 20000, 70, 'Meringankan Sakit Maag', 'polysilane.jpg'),
('KDO-006', 'Obat Diare', 'Diapet', 10000, 70, 'Menghambat Diare', 'diapet.jpg'),
('KDO-007', 'Obat Diare', 'Oralit', 12000, 80, 'Menghambat Diare', 'oralit.jpg'),
('KDO-008', 'Obat Flu', 'Paramex', 5000, 100, 'Meringankan gejala flu, batuk pilek, dan alergi', 'paramex.jpg'),
('KDO-009', 'Obat Flu', 'Mixagrip', 10000, 70, 'Meringankan gejala flu, batuk pilek, dan alergi', 'mixagrip.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `kd_beli` varchar(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `kd_obat` varchar(100) NOT NULL,
  `tgl_beli` varchar(100) NOT NULL,
  `jml_beli` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`kd_beli`, `id_user`, `kd_obat`, `tgl_beli`, `jml_beli`) VALUES
('TB-001', 1, 'KDO-003', '17-04-2021 02:50:31', 3);

--
-- Triggers `tbl_pembelian`
--
DELIMITER $$
CREATE TRIGGER `tambah_stok` AFTER INSERT ON `tbl_pembelian` FOR EACH ROW BEGIN
	UPDATE tbl_obat SET stok = stok + new.jml_beli WHERE tbl_obat.kd_obat = new.kd_obat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `kd_transaksi` varchar(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `kd_obat` varchar(100) NOT NULL,
  `tgl_transaksi` varchar(128) NOT NULL,
  `jml_transaksi` int(128) NOT NULL,
  `total` int(225) NOT NULL,
  `pembayaran` varchar(100) NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`kd_transaksi`, `id_user`, `kd_obat`, `tgl_transaksi`, `jml_transaksi`, `total`, `pembayaran`, `bukti`) VALUES
('TR-001', 3, 'KDO-001', '10-04-2021 23:05:26', 2, 590000, 'BCA', 'download.jpg'),
('TR-002', 2, 'KDO-002', '15-04-2021 21:18:33', 2, 2400000, 'BCA', ''),
('TR-003', 2, 'KDO-002', '19-12-2021 07:50:54', 1, 7000, 'BCA', 'WhatsApp Image 2021-12-19 at 07.10.40.jpeg');

--
-- Triggers `tbl_transaksi`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER UPDATE ON `tbl_transaksi` FOR EACH ROW BEGIN
	UPDATE tbl_obat SET stok = stok - NEW.jml_transaksi WHERE tbl_obat.kd_obat = NEW.kd_obat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `nm_user` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `tp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `jenis_kelamin`, `tp_lahir`, `tgl_lahir`, `alamat`, `no_telp`, `username`, `password`, `level`) VALUES
(1, 'admin', 'Laki-Laki', 'London', '2002-02-28', 'London', 123456789, 'admin', '123', 'admin'),
(2, 'user', 'Perempuan', 'PAS', '2021-03-26', 'Australia', 2147483647, 'user', 'user1235', 'user'),
(3, 'febret', 'Laki-Laki', 'rusia', '2021-03-27', 'boston', 2147483647, 'febret', 'febret12345', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fuzzy`
--
ALTER TABLE `fuzzy`
  ADD PRIMARY KEY (`id_fuzzy`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`kd_permintaan`);

--
-- Indexes for table `persediaan`
--
ALTER TABLE `persediaan`
  ADD PRIMARY KEY (`kd_persediaan`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`kd_produksi`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`kd_beli`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kd_obat` (`kd_obat`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`kd_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kd_obat` (`kd_obat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
