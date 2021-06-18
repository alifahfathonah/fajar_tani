-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 06:15 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fajar_tani`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_detail_user`
--

CREATE TABLE `t_detail_user` (
  `detail_id` int(11) NOT NULL,
  `detail_id_user` int(11) DEFAULT NULL,
  `detail_jabatan` varchar(50) DEFAULT NULL,
  `detail_pendidikan` text DEFAULT NULL,
  `detail_alamat` text DEFAULT NULL,
  `detail_biodata` text DEFAULT NULL,
  `detail_hapus` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_detail_user`
--

INSERT INTO `t_detail_user` (`detail_id`, `detail_id_user`, `detail_jabatan`, `detail_pendidikan`, `detail_alamat`, `detail_biodata`, `detail_hapus`) VALUES
(1, 1, 'BOS', 'pendidikan', 'alamat', 'ini biodata ku', 0),
(4, 2, NULL, NULL, NULL, NULL, 0),
(5, 3, NULL, NULL, NULL, NULL, 0),
(6, 4, NULL, NULL, NULL, NULL, 0),
(7, 2, NULL, NULL, NULL, NULL, 0),
(8, 3, NULL, NULL, NULL, NULL, 0),
(9, 3, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_diagnosa`
--

CREATE TABLE `t_diagnosa` (
  `diagnosa_id` int(11) NOT NULL,
  `diagnosa_user` text NOT NULL,
  `diagnosa_indikasi` text NOT NULL,
  `diagnosa_penyakit` text NOT NULL,
  `diagnosa_obat` text NOT NULL,
  `diagnosa_status` text NOT NULL,
  `diagnosa_hapus` int(11) NOT NULL DEFAULT 0,
  `diagnosa_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_indikasi`
--

CREATE TABLE `t_indikasi` (
  `indikasi_id` int(11) NOT NULL,
  `indikasi_nama` text NOT NULL,
  `indikasi_hapus` int(11) NOT NULL DEFAULT 0,
  `indikasi_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_indikasi`
--

INSERT INTO `t_indikasi` (`indikasi_id`, `indikasi_nama`, `indikasi_hapus`, `indikasi_tanggal`) VALUES
(1, 'Daun lebat buah kecil-kecil', 0, '2020-08-01'),
(3, 'Akar kering', 0, '2020-08-02'),
(4, 'Buah cepat busuk', 0, '2020-08-02'),
(5, 'Daun Menguning', 0, '2020-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `t_log`
--

CREATE TABLE `t_log` (
  `log_id` int(11) NOT NULL,
  `log_user` text NOT NULL,
  `log_kode` text NOT NULL,
  `log_obat` text NOT NULL,
  `log_harga` text NOT NULL,
  `log_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_obat`
--

CREATE TABLE `t_obat` (
  `obat_id` int(11) NOT NULL,
  `obat_kode` text NOT NULL,
  `obat_nama` text NOT NULL,
  `obat_aturan` text NOT NULL,
  `obat_harga` text NOT NULL,
  `obat_hapus` int(11) NOT NULL DEFAULT 0,
  `obat_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_obat`
--

INSERT INTO `t_obat` (`obat_id`, `obat_kode`, `obat_nama`, `obat_aturan`, `obat_harga`, `obat_hapus`, `obat_tanggal`) VALUES
(4, 'OBT01', 'DECIS 25 EC 250 ML', 'Gunakan pagi hari campur dengan air 500ml', '12000', 0, '2021-06-16'),
(5, 'OBT02', 'Pestisida imidakloprid TIODOR 30 WP 100 gram', 'Campur dengan air 300ml\r\n', '7000', 0, '2021-06-16'),
(6, 'OBT03', 'INSEKTISIDA PENGENDALI HAMA WERENG KUTU', 'Gunakan pagi hari campur dengan air 500ml', '15000', 0, '2021-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `t_penyakit`
--

CREATE TABLE `t_penyakit` (
  `penyakit_id` int(11) NOT NULL,
  `penyakit_nama` text NOT NULL,
  `penyakit_deskripsi` text NOT NULL,
  `penyakit_obat` int(11) DEFAULT NULL,
  `penyakit_hapus` int(11) NOT NULL DEFAULT 0,
  `penyakit_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_penyakit`
--

INSERT INTO `t_penyakit` (`penyakit_id`, `penyakit_nama`, `penyakit_deskripsi`, `penyakit_obat`, `penyakit_hapus`, `penyakit_tanggal`) VALUES
(1, 'Di serang wereng walang', 'Cek dan test phone kemungkinan pesawat telepone pelanggan', 4, 0, '2020-08-02'),
(2, 'Akar keropos', 'Akar keropos dan kering', 5, 0, '2021-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `t_rules`
--

CREATE TABLE `t_rules` (
  `rules_id` int(11) NOT NULL,
  `rules_nama` text NOT NULL,
  `rules_gangguan` text NOT NULL,
  `rules_indikasi` text NOT NULL,
  `rules_penyakit` text NOT NULL,
  `rules_hapus` int(11) NOT NULL DEFAULT 0,
  `rules_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_rules`
--

INSERT INTO `t_rules` (`rules_id`, `rules_nama`, `rules_gangguan`, `rules_indikasi`, `rules_penyakit`, `rules_hapus`, `rules_tanggal`) VALUES
(4, 'Rules 1', '1', '1,3,4,5', '1', 0, '2020-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `transaksi_total` text NOT NULL,
  `transaksi_kembali` text NOT NULL,
  `transaksi_bayar` text NOT NULL,
  `transaksi_tanggal` date DEFAULT NULL,
  `transaksi_hapus` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_transaksi`
--

INSERT INTO `t_transaksi` (`transaksi_id`, `transaksi_total`, `transaksi_kembali`, `transaksi_bayar`, `transaksi_tanggal`, `transaksi_hapus`) VALUES
(3, '41000', '9000', '50000', '2021-06-18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_level` varchar(50) DEFAULT NULL,
  `user_email` text DEFAULT NULL,
  `user_password` text DEFAULT NULL,
  `user_tanggal` date DEFAULT NULL,
  `user_foto` text DEFAULT NULL,
  `user_hapus` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`user_id`, `user_name`, `user_level`, `user_email`, `user_password`, `user_tanggal`, `user_foto`, `user_hapus`) VALUES
(1, 'Vendik', '1', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '2019-12-27', 'noimage.gif', 0),
(2, 'user', '2', 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', '2020-07-20', NULL, 0),
(3, 'Laila', '2', 'laila@gmail.com', 'f30618ed64655812746272636a992b95', '2020-07-21', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_detail_user`
--
ALTER TABLE `t_detail_user`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `t_diagnosa`
--
ALTER TABLE `t_diagnosa`
  ADD PRIMARY KEY (`diagnosa_id`);

--
-- Indexes for table `t_indikasi`
--
ALTER TABLE `t_indikasi`
  ADD PRIMARY KEY (`indikasi_id`);

--
-- Indexes for table `t_log`
--
ALTER TABLE `t_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `t_obat`
--
ALTER TABLE `t_obat`
  ADD PRIMARY KEY (`obat_id`);

--
-- Indexes for table `t_penyakit`
--
ALTER TABLE `t_penyakit`
  ADD PRIMARY KEY (`penyakit_id`);

--
-- Indexes for table `t_rules`
--
ALTER TABLE `t_rules`
  ADD PRIMARY KEY (`rules_id`);

--
-- Indexes for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_detail_user`
--
ALTER TABLE `t_detail_user`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_diagnosa`
--
ALTER TABLE `t_diagnosa`
  MODIFY `diagnosa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `t_indikasi`
--
ALTER TABLE `t_indikasi`
  MODIFY `indikasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_log`
--
ALTER TABLE `t_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `t_obat`
--
ALTER TABLE `t_obat`
  MODIFY `obat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_penyakit`
--
ALTER TABLE `t_penyakit`
  MODIFY `penyakit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_rules`
--
ALTER TABLE `t_rules`
  MODIFY `rules_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
