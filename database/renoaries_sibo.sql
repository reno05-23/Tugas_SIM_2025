-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 18, 2025 at 05:12 PM
-- Server version: 10.3.39-MariaDB-0ubuntu0.20.04.2
-- PHP Version: 8.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `renoaries_sibo`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `stok`, `created_at`, `update_at`) VALUES
(1, 'Oli Enduro Racing', 60000, '8', '2025-06-19 02:33:37', '2025-07-05 15:30:54'),
(2, 'Ban Luar Honda (uk 250/17)', 150000, '8', '2025-06-19 02:33:37', '2025-07-05 15:31:03'),
(4, 'Kampas Rem Aspira', 35000, '5', '2025-06-19 04:56:52', '2025-07-01 19:11:35'),
(5, 'Oli Shell  | Advance AX7 Scooter', 70000, '6', '2025-06-19 16:19:07', '2025-07-02 14:41:40'),
(6, 'Spion', 45000, '19', '2025-06-19 16:24:29', '2025-07-04 02:06:30'),
(7, 'Lampu Sein', 20000, '8', '2025-06-19 16:25:17', '2025-06-19 16:25:17'),
(8, 'Ban Dalam IRC (uk 250-17)', 32000, '4', '2025-06-19 16:28:01', '2025-06-19 16:28:01'),
(9, 'Aki Akalin (5Ah/12v)', 80000, '10', '2025-07-01 17:01:37', '2025-07-01 17:01:37'),
(10, 'Busi', 20000, '12', '2025-07-02 06:01:16', '2025-07-02 06:01:16'),
(11, 'Ban Dalam IRC (uk 275-17)', 35000, '6', '2025-07-02 06:02:01', '2025-07-02 06:02:01'),
(12, 'Aki Alkalin (3,5Ah/12v)', 90000, '4', '2025-07-02 06:02:53', '2025-07-02 06:02:53'),
(13, 'Knalpot Racing', 350000, '6', '2025-07-02 06:03:25', '2025-07-04 02:01:14'),
(14, 'Oli Skock Jumbo', 95000, '5', '2025-07-02 06:04:08', '2025-07-02 06:04:08'),
(15, 'Master Rem', 60000, '9', '2025-07-02 06:04:41', '2025-07-07 07:46:46'),
(16, 'Minyak Rem', 40000, '9', '2025-07-02 06:05:10', '2025-07-07 07:46:55'),
(17, 'Laker', 25000, '15', '2025-07-04 01:55:21', '2025-07-04 01:55:21'),
(19, 'Jari Jari Velg TDR ring 17', 55000, '8', '2025-07-04 02:03:19', '2025-07-04 02:21:15'),
(20, 'Cakram TDR', 35000, '15', '2025-07-05 15:18:53', '2025-07-05 15:18:53'),
(21, 'Skok', 65000, '6', '2025-07-05 15:19:20', '2025-07-05 15:19:20'),
(22, 'Sticker Body', 30000, '10', '2025-07-05 15:19:56', '2025-07-05 15:32:29'),
(23, 'Jok Motor', 70000, '4', '2025-07-05 15:20:29', '2025-07-05 15:20:29'),
(24, 'Hand Grip Karet RZM', 100000, '10', '2025-07-05 15:21:02', '2025-07-05 15:21:02'),
(25, 'Stabilizer', 200000, '8', '2025-07-05 15:22:12', '2025-07-05 15:22:12'),
(26, 'Lampu Neon', 66000, '5', '2025-07-05 15:22:43', '2025-07-05 15:22:43'),
(27, 'Kampas Rem Tromol', 50000, '8', '2025-07-05 15:25:05', '2025-07-05 15:25:05'),
(28, 'Vanbelt AHM', 100000, '9', '2025-07-05 15:25:58', '2025-07-07 06:52:01'),
(29, 'Oli AHM OIL MPX 2', 54000, '10', '2025-07-05 15:26:23', '2025-07-05 15:26:23'),
(30, 'Gear Oil', 18000, '6', '2025-07-05 15:26:52', '2025-07-05 15:26:52'),
(31, 'Lampu Biled', 500000, '4', '2025-07-05 15:27:18', '2025-07-05 15:27:18'),
(32, 'Cover Radiator', 100000, '6', '2025-07-05 15:27:45', '2025-07-09 03:34:48'),
(33, 'Air Radiator (Coolent)', 20000, '10', '2025-07-05 15:28:24', '2025-07-05 15:28:24'),
(34, 'Filter Udara', 50000, '6', '2025-07-05 15:28:46', '2025-07-07 06:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `montir`
--

CREATE TABLE `montir` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `no_telepon` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gaji` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `montir`
--

INSERT INTO `montir` (`id`, `nama`, `no_telepon`, `alamat`, `tgl_lahir`, `gaji`) VALUES
(13, 'Yanto Kopling', '085809723416', 'Jawa Timur', '2003-10-14', 'Rp2.500.000'),
(14, 'Gus Pixmen', '085984668345', 'Jombang', '2000-03-04', 'Rp2.500.000');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL
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
('PLG020', 'Messi Bocil', 'L', '085675674339', 'Argentina'),
('PLG021', 'Mamad', 'L', '085676489334', 'Kalimantan'),
('PLG022', 'Aca', 'L', '086786467546', 'Megaluh'),
('PLG023', 'Rusman', 'L', '085678935672', 'Jombang'),
('PLG024', 'Rusmantoro', 'L', '085678935672', 'Jombang'),
('PLG025', 'Kuasmantoro', 'L', '086545617892', 'Mojokerto'),
('PLG026', 'Ibu Umi', 'P', '085435689765', 'Bunder Plandaan'),
('PLG027', 'Heri Akik', 'L', '085678965469', 'Desa Bunder'),
('PLG028', 'Qomariyah', 'P', '085678543236', 'Denanyar Jombang'),
('PLG029', 'Jojo', 'L', '086545678887', 'Sumbrjo Pagak'),
('PLG030', 'Kokoh Latif', 'L', '085678654367', 'Jogjakarta'),
('PLG031', 'cantika', 'P', '085464367287', 'plosokerep'),
('PLG032', 'Bisma', 'L', '085678907650', 'Sukoharjo'),
('PLG033', 'Abah Juned', 'L', '085840989223', 'Kedungkerep');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_pelanggan` varchar(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `tanggal_pesanan` datetime NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_barang`, `id_pelanggan`, `jumlah`, `id_user`, `status`, `tanggal_pesanan`, `is_read`) VALUES
(13, 1, 'PLG011', 1, 1, '2', '2025-07-02 00:32:55', 0),
(14, 1, 'PLG012', 2, 1, '2', '2025-07-02 00:37:35', 0),
(15, 9, 'PLG013', 4, 1, '2', '2025-07-02 00:54:56', 0),
(16, 2, 'PLG014', 4, 1, '2', '2025-07-02 01:00:31', 0),
(17, 4, 'PLG015', 2, 1, '2', '2025-07-02 01:44:34', 0),
(18, 9, 'PLG016', 2, 1, '2', '2025-07-02 01:52:21', 0),
(19, 5, 'PLG017', 2, 1, '2', '2025-07-02 02:01:15', 0),
(20, 6, 'PLG018', 2, 1, '2', '2025-07-02 02:10:03', 0),
(21, 4, 'PLG019', 5, 1, '2', '2025-07-02 02:11:15', 0),
(22, 13, 'PLG020', 1, 1, '2', '2025-07-02 13:06:38', 0),
(23, 5, 'PLG021', 2, 1, '2', '2025-07-02 21:40:39', 0),
(24, 1, 'PLG022', 1, 1, '2', '2025-07-03 23:47:47', 0),
(25, 13, 'PLG024', 2, 1, '2', '2025-07-04 09:00:46', 0),
(26, 6, 'PLG025', 2, 1, '2', '2025-07-04 09:04:06', 0),
(27, 6, 'PLG026', 1, 1, '2', '2025-07-04 09:05:33', 0),
(28, 19, 'PLG027', 2, 1, '2', '2025-07-04 09:16:22', 0),
(29, 22, 'PLG028', 2, 1, '2', '2025-07-05 22:32:03', 0),
(30, 34, 'PLG029', 1, 1, '2', '2025-07-07 13:50:32', 0),
(31, 28, 'PLG030', 1, 1, '2', '2025-07-07 13:51:08', 0),
(32, 15, 'PLG031', 1, 1, '2', '2025-07-07 14:03:17', 0),
(33, 16, 'PLG032', 1, 1, '2', '2025-07-07 14:29:00', 0),
(34, 32, 'PLG033', 1, 1, '2', '2025-07-08 17:01:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pesanan`, `total`, `bayar`, `kembalian`, `create_at`) VALUES
('TRX001', 13, 60000, 60000, 0, '2025-07-02 00:38:03'),
('TRX002', 14, 120000, 150000, 30000, '2025-07-02 00:38:14'),
('TRX003', 15, 320000, 350000, 30000, '2025-07-02 00:55:26'),
('TRX004', 16, 600000, 600000, 0, '2025-07-02 01:06:35'),
('TRX005', 17, 70000, 70000, 0, '2025-07-02 01:48:31'),
('TRX006', 18, 160000, 200000, 40000, '2025-07-02 01:52:44'),
('TRX007', 19, 140000, 150000, 10000, '2025-07-02 02:01:37'),
('TRX008', 20, 90000, 100000, 10000, '2025-07-02 02:10:21'),
('TRX009', 21, 175000, 175000, 0, '2025-07-02 02:11:35'),
('TRX010', 22, 350000, 400000, 50000, '2025-07-02 13:07:20'),
('TRX011', 23, 140000, 150000, 10000, '2025-07-02 21:41:40'),
('TRX012', 24, 60000, 100000, 40000, '2025-07-03 23:48:06'),
('TRX013', 25, 700000, 700000, 0, '2025-07-04 09:01:14'),
('TRX014', 26, 90000, 100000, 10000, '2025-07-04 09:04:36'),
('TRX015', 27, 45000, 100000, 55000, '2025-07-04 09:06:30'),
('TRX016', 28, 110000, 150000, 40000, '2025-07-04 09:21:15'),
('TRX017', 29, 60000, 100000, 40000, '2025-07-05 22:32:29'),
('TRX018', 30, 50000, 100000, 50000, '2025-07-07 13:51:36'),
('TRX019', 31, 100000, 100000, 0, '2025-07-07 13:52:01'),
('TRX020', 32, 60000, 60000, 0, '2025-07-07 14:46:46'),
('TRX021', 33, 40000, 50000, 10000, '2025-07-07 14:46:55'),
('TRX022', 34, 100000, 100000, 0, '2025-07-08 17:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','pemilik','kasir','waiter') NOT NULL
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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `montir`
--
ALTER TABLE `montir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
