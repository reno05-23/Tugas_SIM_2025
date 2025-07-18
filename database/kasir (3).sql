-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20250526.403f5512ff
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2025 at 06:06 PM
-- Server version: 8.4.3
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int NOT NULL,
  `nama_barang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int NOT NULL,
  `stok` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `stok`, `created_at`, `update_at`) VALUES
(1, 'Oli Enduro Racing', 60000, '6', '2025-06-19 02:33:37', '2025-07-03 16:40:30'),
(2, 'Ban Luar Honda (uk 250/17)', 150000, '4', '2025-06-19 02:33:37', '2025-06-19 05:23:59'),
(4, 'Kampas Rem Aspira', 35000, '2', '2025-06-19 04:56:52', '2025-07-03 17:14:51'),
(5, 'Oli Shell  | Advance AX7 Scooter', 70000, '7', '2025-06-19 16:19:07', '2025-07-18 16:42:22'),
(6, 'Spion', 45000, '2', '2025-06-19 16:24:29', '2025-07-01 19:10:21'),
(7, 'Lampu Sein', 20000, '8', '2025-06-19 16:25:17', '2025-06-19 16:25:17'),
(8, 'Ban Dalam IRC (uk 250-17)', 32000, '4', '2025-06-19 16:28:01', '2025-06-19 16:28:01'),
(9, 'Aki Akalin (5Ah/12v)', 80000, '9', '2025-07-01 17:01:37', '2025-07-18 16:43:40'),
(10, 'Busi', 30000, '5', '2025-07-03 15:56:23', '2025-07-03 16:49:10'),
(13, 'Knalpot Racing', 120000, '5', '2025-07-04 01:25:14', '2025-07-04 01:25:14'),
(14, 'Laker', 25000, '10', '2025-07-04 01:25:39', '2025-07-04 01:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `montir`
--

CREATE TABLE `montir` (
  `id` int NOT NULL,
  `nama` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_telepon` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gaji` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `montir`
--

INSERT INTO `montir` (`id`, `nama`, `no_telepon`, `alamat`, `tgl_lahir`, `gaji`) VALUES
(1, 'Agus Kopling', '098765678334', 'Jombang Mojowarno', '2000-06-08', 'Rp2.500.000'),
(2, 'Mamad Karbu Ninja', '0856673452113', 'Sumatra Barat', '1998-08-04', 'Rp1.500.000');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pelanggan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jenis_kelamin`, `no_hp`, `alamat`) VALUES
('PLG001', 'Ronaldo', 'L', '083478667194', 'Desa Portugal, Kecamatan Inggris, Kabupaten Belanda'),
('PLG002', 'Maul', 'L', '085443791364', 'Ds. London, Kec.Indonesia, Kab.Indonesia'),
('PLG003', 'Sucipto', 'L', '085667776482', 'Ds. Megaluh, Kec. Megaluh, Kab.Jombang'),
('PLG004', 'Siti', 'P', '085644337891', 'Ds.Bunder, Kec.Plandaan, Kab.Jombang'),
('PLG005', 'Rama', 'L', '085224678914', 'Ds.Pacitan, Kec, Pacitan, Kab.Inggris'),
('PLG006', 'Abdul', 'L', '085637876554', 'Jombang'),
('PLG007', 'Mas Eep', 'L', '087665489112', 'Desa. Tambak Beras'),
('PLG008', 'Lisa', 'P', '085676689445', 'Malaysia'),
('PLG009', 'Laila', 'P', '085441267869', 'Megaluh, Jombang'),
('PLG010', 'Laila', 'P', '085441267869', 'megaluh'),
('PLG011', 'Rendi', 'L', '085441267869', 'Jombang'),
('PLG012', 'Abdul', 'L', '085776368245', 'Jakarta'),
('PLG013', 'Ronaldo', 'L', '087656678834', 'Desa Portugal, Kec Portugal Kabupaten Jombang'),
('PLG014', 'Riya', 'P', '08564397654', 'Dsn Bunder, Kec Plandaan, Kab Jombang'),
('PLG015', 'Kiki', 'L', '086544565712', 'Jombang Jogoroto'),
('PLG016', 'Slamet', 'L', '085667554723', 'Sudimoro Megaluh Jombang'),
('PLG017', 'Naruto', 'L', '085643878912', 'Konohagakure'),
('PLG018', 'Prabowo', 'L', '085445786556', 'Jakarta Timur'),
('PLG019', 'Cak Dek', 'L', '085443789914', 'Kedung Urip Megaluh Jombang'),
('PLG020', 'Kusmianti', 'P', '085767890445', 'Jombang'),
('PLG021', 'Latief', 'L', '085678963567', 'Krian'),
('PLG022', 'Supri', 'L', '086545678883', 'Ploso'),
('PLG023', 'Raven', 'L', '0856789983412', 'Sumombito'),
('PLG024', 'Kintaro', 'L', '085850878112', 'Konohagokure');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int NOT NULL,
  `id_barang` int NOT NULL,
  `id_pelanggan` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `id_user` int NOT NULL,
  `status` enum('0','1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_pesanan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_barang`, `id_pelanggan`, `jumlah`, `id_user`, `status`, `tanggal_pesanan`) VALUES
(13, 1, 'PLG011', 1, 1, '2', '2025-07-02 00:32:55'),
(14, 1, 'PLG012', 2, 1, '2', '2025-07-02 00:37:35'),
(15, 9, 'PLG013', 4, 1, '2', '2025-07-02 00:54:56'),
(16, 2, 'PLG014', 4, 1, '2', '2025-07-02 01:00:31'),
(17, 4, 'PLG015', 2, 1, '2', '2025-07-02 01:44:34'),
(18, 9, 'PLG016', 2, 1, '2', '2025-07-02 01:52:21'),
(19, 5, 'PLG017', 2, 1, '2', '2025-07-02 02:01:15'),
(20, 6, 'PLG018', 2, 1, '2', '2025-07-02 02:10:03'),
(21, 4, 'PLG019', 5, 1, '2', '2025-07-02 02:11:15'),
(22, 1, 'PLG020', 2, 1, '2', '2025-07-03 23:12:08'),
(23, 10, 'PLG021', 3, 1, '2', '2025-07-03 23:20:00'),
(24, 4, 'PLG022', 3, 1, '2', '2025-07-04 00:14:30'),
(25, 5, 'PLG023', 1, 1, '2', '2025-07-18 23:42:01'),
(26, 9, 'PLG024', 1, 1, '2', '2025-07-18 23:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_pesanan` int NOT NULL,
  `total` int NOT NULL,
  `bayar` int NOT NULL,
  `kembalian` int NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pesanan`, `total`, `bayar`, `kembalian`, `create_at`) VALUES
('', 22, 120000, 120000, 0, '2025-07-03 23:40:30'),
('TRX001', 13, 60000, 60000, 0, '2025-07-02 00:38:03'),
('TRX002', 14, 120000, 150000, 30000, '2025-07-02 00:38:14'),
('TRX003', 15, 320000, 350000, 30000, '2025-07-02 00:55:26'),
('TRX004', 16, 600000, 600000, 0, '2025-07-02 01:06:35'),
('TRX005', 17, 70000, 70000, 0, '2025-07-02 01:48:31'),
('TRX006', 18, 160000, 200000, 40000, '2025-07-02 01:52:44'),
('TRX007', 19, 140000, 150000, 10000, '2025-07-02 02:01:37'),
('TRX008', 20, 90000, 100000, 10000, '2025-07-02 02:10:21'),
('TRX009', 21, 175000, 175000, 0, '2025-07-02 02:11:35'),
('TRX010', 22, 120000, 120000, 0, '2025-07-03 23:24:00'),
('TRX011', 23, 90000, 100000, 10000, '2025-07-03 23:49:10'),
('TRX012', 24, 105000, 110000, 5000, '2025-07-04 00:14:51'),
('TRX013', 25, 70000, 100000, 30000, '2025-07-18 23:42:22'),
('TRX014', 26, 80000, 100000, 20000, '2025-07-18 23:43:40');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` enum('admin','pemilik','kasir','waiter') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `montir`
--
ALTER TABLE `montir`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_barang` (`id_barang`);

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
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `montir`
--
ALTER TABLE `montir`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
