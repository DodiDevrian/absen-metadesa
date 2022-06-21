-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 09:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metadesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(10) NOT NULL,
  `id_karyawan` int(10) NOT NULL,
  `sesi_absen` varchar(20) NOT NULL,
  `apakah_hadir` enum('Hadir','Tidak Hadir','Izin','Sakit') NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `id_karyawan`, `sesi_absen`, `apakah_hadir`, `keterangan`, `tanggal`, `waktu`) VALUES
(49, 211, 'Berangkat', 'Hadir', '', '2022-06-16', '10:01:06'),
(50, 211, 'Berangkat', 'Hadir', 'Masuk', '0000-00-00', '10:01:42'),
(51, 211, 'Berangkat', 'Hadir', 'Masuk2', '2022-06-16', '10:02:09'),
(52, 211, 'Berangkat', 'Hadir', 'Masuk3', '0000-00-00', '10:03:18'),
(53, 211, 'Berangkat', 'Hadir', 'Masuko', '2022-06-16', '10:25:43'),
(54, 214, 'Berangkat', 'Izin', 'Pulang Kampung', '2022-06-21', '09:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id` int(10) NOT NULL,
  `nama_departemen` varchar(250) NOT NULL,
  `dibuat` date NOT NULL,
  `diganti` date NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id`, `nama_departemen`, `dibuat`, `diganti`, `status`) VALUES
(2, 'Keuangan', '2019-06-22', '2019-06-22', 'Aktif'),
(3, 'It', '2019-06-22', '2019-06-22', 'Aktif'),
(4, 'Design', '2019-06-22', '2019-06-30', 'Aktif'),
(5, 'Marketing', '2019-06-28', '2019-06-28', 'Aktif'),
(6, 'Research and Development', '2019-06-29', '2019-06-29', 'Aktif'),
(7, 'Keamanan', '2019-06-30', '2019-06-30', 'Aktif'),
(9, 'Belum DIketahui', '2022-06-20', '2022-06-20', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `id_departemen` int(10) NOT NULL DEFAULT 0,
  `id_posisi` int(10) NOT NULL DEFAULT 0,
  `nama_depan` varchar(25) NOT NULL,
  `nama_belakang` varchar(25) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `mulai_kerja` date NOT NULL,
  `dibuat` datetime NOT NULL,
  `diganti` datetime NOT NULL,
  `status` enum('Karyawan Aktif','Interview','Tidak Diterima','Menolak Kerja','Berhenti Kerja','Diberhentikan') NOT NULL,
  `role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `id_departemen`, `id_posisi`, `nama_depan`, `nama_belakang`, `email`, `password`, `alamat`, `dob`, `jenis_kelamin`, `nomor_telepon`, `nomor_hp`, `mulai_kerja`, `dibuat`, `diganti`, `status`, `role`) VALUES
(211, 6, 7, 'Dodi Devrian', 'Andrianto', 'admin@admin.com', '$2y$10$Vw8oSTlcJkMpjEBNKVdrte0W.e7a9hDKiQT2DDQZF/Iij2AMZFREG', 'Bandar Jaya', '2022-02-09', 'Pria', '0853806585', '0853806585', '0000-00-00', '2022-06-15 11:12:49', '2022-06-20 05:04:29', 'Karyawan Aktif', 1),
(212, 2, 2, 'User', 'Satu', 'user1@user.com', '$2y$10$xevRbup3aZKdBeu4WqwYBOwqmdzyDDjBJGPcPLkiAxhtDVWU0p9KG', 'Bandar Jaya', '2022-04-05', 'Wanita', '0853806588712', '0853806588712', '0000-00-00', '2022-06-20 05:30:35', '2022-06-21 04:53:46', 'Karyawan Aktif', 2),
(214, 2, 2, 'User', 'Dua', 'user2@user.com', '$2y$10$8mZx6GkaZwgcEJgMJokYuu9vyeApdcS1s8.2M94TlfQC4ZL7hmBm6', 'Bandar Jaya', '2022-04-12', 'Pria', '085380658598', '085380658598', '0000-00-00', '2022-06-21 04:01:09', '2022-06-21 04:52:23', 'Karyawan Aktif', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `nama_kategori` varchar(300) NOT NULL,
  `keterangan` text NOT NULL,
  `dibuat` datetime NOT NULL,
  `diganti` datetime NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `tipe`, `nama_kategori`, `keterangan`, `dibuat`, `diganti`, `status`) VALUES
(1, 'gjt', 'Gaji', '', '2019-06-29 16:58:52', '2019-06-29 17:11:56', 'Aktif'),
(2, 'gjt', 'Uang Makan', 'Uang makan karyawan', '2019-06-29 17:12:29', '2019-06-29 17:12:29', 'Aktif'),
(3, 'gjt', 'THR', 'THR untuk karyawan', '2019-06-29 17:13:02', '2019-06-29 17:13:02', 'Aktif'),
(4, 'gjt', 'Uang Bensin', 'Uang bensin karyawan yang dijalan seperti kurir', '2019-06-29 17:13:55', '2019-06-29 17:13:55', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `id` int(10) NOT NULL,
  `nama_posisi` varchar(150) NOT NULL,
  `dibuat` date NOT NULL,
  `diganti` date NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id`, `nama_posisi`, `dibuat`, `diganti`, `status`) VALUES
(2, 'Staff', '2019-06-22', '2019-06-22', 'Aktif'),
(3, 'Manager', '2019-06-22', '2019-06-22', 'Aktif'),
(4, 'Supervisor', '2019-06-28', '2022-06-17', 'Aktif'),
(5, 'Direktur', '2019-06-29', '2019-06-30', 'Aktif'),
(6, 'CEO', '2019-06-30', '2022-06-20', 'Aktif'),
(7, 'Master Admin', '2022-06-16', '2022-06-16', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan`
--

CREATE TABLE `tunjangan` (
  `id` int(10) NOT NULL,
  `id_karyawan` int(10) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `nominal` int(10) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `dibuat` datetime NOT NULL,
  `diganti` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tunjangan`
--

INSERT INTO `tunjangan` (`id`, `id_karyawan`, `id_kategori`, `nominal`, `status`, `dibuat`, `diganti`) VALUES
(12, 212, 1, 10000000, 'Aktif', '2022-06-21 06:28:11', '2022-06-21 06:28:11'),
(13, 214, 1, 5000000, 'Aktif', '2022-06-21 06:41:32', '2022-06-21 06:41:32'),
(14, 214, 2, 100000, 'Aktif', '2022-06-21 06:47:09', '2022-06-21 06:47:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tunjangan`
--
ALTER TABLE `tunjangan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
