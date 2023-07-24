-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 08:48 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `kode_rekap` varchar(255) NOT NULL,
  `nokartu` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `mapel` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `guru` varchar(255) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `kode_rekap`, `nokartu`, `tanggal`, `mapel`, `jurusan`, `kelas`, `guru`, `jam_masuk`, `jam_keluar`) VALUES
(39, 'XIMM2-Matematika', '22613223025', '2023-02-06', 'Matematika', 'Multimedia', 'XIMM2', 'Nugie Dwitama, S.Kom.', '15:24:02', '15:30:32'),
(40, 'XIMM2-Bahasa Indonesia', '5017311133', '2023-02-06', 'Bahasa Indonesia', 'Multimedia', 'XIMM2', 'Nugie Dwitama, S.Kom.', '15:29:57', '15:30:07'),
(41, 'XIMM1-Bahasa Indonesia', '22613223025', '2023-02-06', 'Bahasa Indonesia', 'Multimedia', 'XIMM2', 'Nugie Dwitama, S.Kom.', '15:30:22', '15:30:32'),
(44, 'XIMM2-Matematika', '5017311133', '2023-02-10', 'Matematika', 'Multimedia', 'XIMM2', 'Nugie Dwitama, S.Kom.', '11:21:01', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kode_mata_pelajaran` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kode_mata_pelajaran`, `tanggal`) VALUES
('XIMM-BI-2', '2023-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kode_kelas` varchar(255) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kode_kelas`, `nama_kelas`, `jurusan`) VALUES
(1, 'XIMM2', 'XI Multimedia 2', 'Multimedia');

-- --------------------------------------------------------

--
-- Table structure for table `kode_rekap`
--

CREATE TABLE `kode_rekap` (
  `kode_rekap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kode_rekap`
--

INSERT INTO `kode_rekap` (`kode_rekap`) VALUES
('XIMM2-Matematika'),
('XIMM1-Matematika'),
('XIMM2-Bahasa Indonesia'),
('XIMM1-Bahasa Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` int(11) NOT NULL,
  `kode_mata_pelajaran` varchar(255) NOT NULL,
  `nama_mata_pelajaran` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `kode_mata_pelajaran`, `nama_mata_pelajaran`, `jurusan`, `kelas`) VALUES
(1, 'XIMM-MTK-2', 'Matematika', 'Multimedia', 'XIMM2'),
(2, 'XIMM-IPA-1', 'Ilmu Pengetahuan Alam', 'Multimedia', 'XIMM1'),
(3, 'XIMM-BJ-2', 'Bahasa Jawa', 'Multimedia', 'XIMM2'),
(4, 'XIMM-BI-2', 'Bahasa Indonesia', 'Multimedia', 'XIMM2'),
(6, 'XIMM-MTK-1', 'Matematika', 'Multimedia', 'XIMM1');

-- --------------------------------------------------------

--
-- Table structure for table `rekap`
--

CREATE TABLE `rekap` (
  `id` int(11) NOT NULL,
  `kode_rekap` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `mapel` varchar(255) NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekap`
--

INSERT INTO `rekap` (`id`, `kode_rekap`, `kelas`, `mapel`, `tahun_ajaran`, `semester`) VALUES
(1, 'XIMM2-Matematika', 'XIMM2', 'Matematika', '2022/2023', 'Ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nokartu` varchar(255) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nokartu`, `nis`, `nama`, `alamat`, `jurusan`, `kelas`) VALUES
(6, '5017311133', '3312345956', 'Muhammad Dimas Surya', 'Banteran RT 03 RW 02', 'MULTIMEDIA', 'XIMM2'),
(7, '22613223025', '5654326272', 'Irma Khaerunisa', 'Sikapat RT 04 RW 05', 'MULTIMEDIA', 'XIMM2');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `mode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`mode`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `tmprfid`
--

CREATE TABLE `tmprfid` (
  `nokartu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama`, `email`, `password`, `level`) VALUES
(1, 'admindewa', 'Nugie Dwitama, S.Kom.', 'admin@idcr.co.id', '9c99a64493632dc2f89f10f14ab3e7cb', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekap`
--
ALTER TABLE `rekap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`mode`);

--
-- Indexes for table `tmprfid`
--
ALTER TABLE `tmprfid`
  ADD PRIMARY KEY (`nokartu`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rekap`
--
ALTER TABLE `rekap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
