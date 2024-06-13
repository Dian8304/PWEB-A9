-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2024 at 03:23 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpagari`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_gudang`
--

CREATE TABLE `admin_gudang` (
  `id_admin` int NOT NULL,
  `nama_admin` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telepon` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `users_id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_gudang`
--

INSERT INTO `admin_gudang` (`id_admin`, `nama_admin`, `no_telepon`, `users_id_user`) VALUES
(1, 'Laras Syifa', '081827345526', 2),
(2, 'Laila Marlina', '083565832342', 3),
(3, 'Mario Lagi', '088153479287', 9),
(4, 'Nadhief', '085768921376', 10),
(5, 'Rara Romlah', '087298024630', 11),
(6, 'Laras Syifa', '089445738892', 2),
(7, 'Nadhief', '085333129392', 10),
(8, 'Laras Syifa', '081736222819', 2),
(9, 'Zahra Hilmi', '082344457102', 22);

-- --------------------------------------------------------

--
-- Table structure for table `gudang_penyimpanan`
--

CREATE TABLE `gudang_penyimpanan` (
  `id_gudang` int NOT NULL,
  `nama_gudang` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `kapasitas` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `lokasi` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `operator_id_opr` int NOT NULL,
  `admin_gudang_id_admin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gudang_penyimpanan`
--

INSERT INTO `gudang_penyimpanan` (`id_gudang`, `nama_gudang`, `kapasitas`, `lokasi`, `operator_id_opr`, `admin_gudang_id_admin`) VALUES
(1, 'Berkah Jaya', '309', 'Jl. Budiman', 1, 1),
(2, 'Fresh Fresh', '500', 'Jl. Sadar Iya', 1, 2),
(3, 'Family Buah', '1000', 'Jl. Kaliurang', 1, 3),
(4, 'Sehat Jaya', '700', 'Jl. Citarum', 1, 4),
(5, 'Buah Asih', '650', 'Jl. Pagar Asih', 1, 5),
(10, 'Murah Buah', '300', 'Jl. Trunojoyo', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_panen`
--

CREATE TABLE `hasil_panen` (
  `id_panen` int NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pekebun_id_pekebun` int NOT NULL,
  `jenis_buah_naga_id_jenis` int NOT NULL,
  `wilayah_kebun_id_wilayah` int NOT NULL,
  `verif_id_opsi` int NOT NULL,
  `gudang_penyimpanan_id_gudang` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_panen`
--

INSERT INTO `hasil_panen` (`id_panen`, `tanggal`, `jumlah`, `pekebun_id_pekebun`, `jenis_buah_naga_id_jenis`, `wilayah_kebun_id_wilayah`, `verif_id_opsi`, `gudang_penyimpanan_id_gudang`) VALUES
(1, '2024-05-13', '10', 4, 2, 1, 1, 1),
(2, '2024-05-10', '16', 5, 1, 2, 3, 2),
(3, '2024-05-11', '11', 3, 4, 3, 2, 3),
(4, '2024-05-12', '9', 1, 4, 4, 1, 4),
(5, '2024-05-13', '11', 2, 3, 5, 1, 5),
(6, '2024-05-19', '10', 4, 2, 1, 1, 1),
(9, '2024-06-04', '25', 7, 2, 4, 2, 2),
(10, '2024-06-06', '8', 7, 4, 4, 1, 5),
(11, '2024-06-06', '5', 7, 4, 1, 1, 2),
(12, '2024-06-06', '2', 7, 2, 2, 1, 4),
(13, '2024-06-06', '3', 5, 4, 4, 2, 4),
(14, '2024-06-03', '2', 5, 2, 3, 1, 4),
(15, '2024-06-06', '11', 7, 4, 5, 2, 5),
(16, '2024-06-10', '5', 7, 4, 4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_buah_naga`
--

CREATE TABLE `jenis_buah_naga` (
  `id_jenis` int NOT NULL,
  `nama_jenis` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `operator_id_opr` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_buah_naga`
--

INSERT INTO `jenis_buah_naga` (`id_jenis`, `nama_jenis`, `operator_id_opr`) VALUES
(1, 'Naga Merah', 1),
(2, 'Naga Putih', 1),
(3, 'Naga Hitam', 1),
(4, 'Naga Kuning', 1);

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id_opr` int NOT NULL,
  `nama_opr` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telepon` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `users_id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id_opr`, `nama_opr`, `no_telepon`, `users_id_user`) VALUES
(1, 'Aldi Nugroho', '08235768890', 1),
(2, 'Gunawan', '081255349865', 24);

-- --------------------------------------------------------

--
-- Table structure for table `pekebun`
--

CREATE TABLE `pekebun` (
  `id_pekebun` int NOT NULL,
  `nama_pekebun` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telepon` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `users_id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pekebun`
--

INSERT INTO `pekebun` (`id_pekebun`, `nama_pekebun`, `no_telepon`, `users_id_user`) VALUES
(1, 'Bimo', '082547956612', 4),
(2, 'Agus Mahendra', '085525769523', 5),
(3, 'Sugeng', '082335768091', 6),
(4, 'Prapto', '087577312850', 7),
(5, 'Rizky Ridho', '082189734932', 8),
(6, 'Fizi Rahmani', '081255392930', 12),
(7, 'Felisita Dian', '081259210231', 21),
(8, 'Ayu Andrinova', '087322345887', 23);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `nama_role` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'Operator'),
(2, 'Admin Gudang'),
(3, 'Pekebun');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_id_role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role_id_role`) VALUES
(1, 'operatorpagari', 'pagari12', 1),
(2, 'laras_syifa', 'larassyf', 2),
(3, 'laila_marlina', 'lmarlina', 2),
(4, 'bimonaga', 'bimbim00', 3),
(5, 'agus_mahendra', 'agsmahen', 3),
(6, 'sugengg', 'sugeng60', 3),
(7, 'prapto', 'prpt1234', 3),
(8, 'rizky_ridho', 'ryrd0000', 3),
(9, 'mariolg', 'mario111', 2),
(10, 'nadhiefloh', 'nadhief1', 2),
(11, 'rararoro', 'rrrr0987', 2),
(12, 'fizi123', '$2y$10$sARpKYgbTwr9NDyIYi6Rueu4TTxhhzFPseDMc5OA.YPzG.9XTLCza', 3),
(19, 'nadhiefloh', '$2y$10$72wVRIbUk1ffbi75GJm.BuQ67jaU6se7WO1Al3WfxkUYBoP9ySVtW', 2),
(20, 'laras_syifa', '$2y$10$EG593v9q.Tz5.ozvXzsGNO3hnBq6hO/i1p2FtXaAQXkUxULITm3Pa', 2),
(21, 'feliscatus', '$2y$10$gWRgLf7dGTMD7o.qdX0gYeanGGGfzVRX9EtYS1AjwramVSNG.2bte', 3),
(22, 'zahrahlm', '$2y$10$GPUw9OAh4qrGXt19ro3TEuBigYIPZISU.BKglI6LdSwrwu4RC9zIG', 2),
(23, 'ayuandri', '$2y$10$3QOCnNuKG4yiv4Aw9tJRRO7JXgIRzX1J20tTBF4410yCu6iaCpjvO', 3),
(24, 'oprpagari', '$2y$10$/I8iLxW3Fvl1I11CM5Hfe.TW8pcJ5PZSIZrP7YCJc1U0IJbX/QTAa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `verif`
--

CREATE TABLE `verif` (
  `id_opsi` int NOT NULL,
  `opsi` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verif`
--

INSERT INTO `verif` (`id_opsi`, `opsi`) VALUES
(1, 'Disetujui'),
(2, 'Ditolak'),
(3, 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_kebun`
--

CREATE TABLE `wilayah_kebun` (
  `id_wilayah` int NOT NULL,
  `nama_wilayah` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `operator_id_opr` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wilayah_kebun`
--

INSERT INTO `wilayah_kebun` (`id_wilayah`, `nama_wilayah`, `operator_id_opr`) VALUES
(1, 'Wilayah 1', 1),
(2, 'Wilayah 2', 1),
(3, 'Wilayah 3', 1),
(4, 'Wilayah 4', 1),
(5, 'Wilayah 5', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_gudang`
--
ALTER TABLE `admin_gudang`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `users_id_user` (`users_id_user`);

--
-- Indexes for table `gudang_penyimpanan`
--
ALTER TABLE `gudang_penyimpanan`
  ADD PRIMARY KEY (`id_gudang`),
  ADD KEY `operator_id_opr` (`operator_id_opr`),
  ADD KEY `admin_gudang_id_admin` (`admin_gudang_id_admin`);

--
-- Indexes for table `hasil_panen`
--
ALTER TABLE `hasil_panen`
  ADD PRIMARY KEY (`id_panen`),
  ADD KEY `pekebun_id_pekebun` (`pekebun_id_pekebun`),
  ADD KEY `jenis_buah_naga_id_jenis` (`jenis_buah_naga_id_jenis`),
  ADD KEY `wilayah_kebun_id_wilayah` (`wilayah_kebun_id_wilayah`),
  ADD KEY `verif_id_opsi` (`verif_id_opsi`),
  ADD KEY `gudang_penyimpanan_id_gudang` (`gudang_penyimpanan_id_gudang`);

--
-- Indexes for table `jenis_buah_naga`
--
ALTER TABLE `jenis_buah_naga`
  ADD PRIMARY KEY (`id_jenis`),
  ADD KEY `operator_id_opr` (`operator_id_opr`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_opr`),
  ADD KEY `operator_users_fk` (`users_id_user`);

--
-- Indexes for table `pekebun`
--
ALTER TABLE `pekebun`
  ADD PRIMARY KEY (`id_pekebun`),
  ADD KEY `users_id_user` (`users_id_user`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `users_role_fk` (`role_id_role`);

--
-- Indexes for table `verif`
--
ALTER TABLE `verif`
  ADD PRIMARY KEY (`id_opsi`);

--
-- Indexes for table `wilayah_kebun`
--
ALTER TABLE `wilayah_kebun`
  ADD PRIMARY KEY (`id_wilayah`),
  ADD KEY `operator_id_opr` (`operator_id_opr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_gudang`
--
ALTER TABLE `admin_gudang`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gudang_penyimpanan`
--
ALTER TABLE `gudang_penyimpanan`
  MODIFY `id_gudang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hasil_panen`
--
ALTER TABLE `hasil_panen`
  MODIFY `id_panen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jenis_buah_naga`
--
ALTER TABLE `jenis_buah_naga`
  MODIFY `id_jenis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id_opr` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pekebun`
--
ALTER TABLE `pekebun`
  MODIFY `id_pekebun` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `verif`
--
ALTER TABLE `verif`
  MODIFY `id_opsi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wilayah_kebun`
--
ALTER TABLE `wilayah_kebun`
  MODIFY `id_wilayah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_gudang`
--
ALTER TABLE `admin_gudang`
  ADD CONSTRAINT `admin_gudang_ibfk_1` FOREIGN KEY (`users_id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gudang_penyimpanan`
--
ALTER TABLE `gudang_penyimpanan`
  ADD CONSTRAINT `gudang_penyimpanan_ibfk_1` FOREIGN KEY (`operator_id_opr`) REFERENCES `operator` (`id_opr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gudang_penyimpanan_ibfk_2` FOREIGN KEY (`admin_gudang_id_admin`) REFERENCES `admin_gudang` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hasil_panen`
--
ALTER TABLE `hasil_panen`
  ADD CONSTRAINT `hasil_panen_ibfk_1` FOREIGN KEY (`pekebun_id_pekebun`) REFERENCES `pekebun` (`id_pekebun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_panen_ibfk_2` FOREIGN KEY (`jenis_buah_naga_id_jenis`) REFERENCES `jenis_buah_naga` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_panen_ibfk_3` FOREIGN KEY (`wilayah_kebun_id_wilayah`) REFERENCES `wilayah_kebun` (`id_wilayah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_panen_ibfk_4` FOREIGN KEY (`verif_id_opsi`) REFERENCES `verif` (`id_opsi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_panen_ibfk_5` FOREIGN KEY (`gudang_penyimpanan_id_gudang`) REFERENCES `gudang_penyimpanan` (`id_gudang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jenis_buah_naga`
--
ALTER TABLE `jenis_buah_naga`
  ADD CONSTRAINT `jenis_buah_naga_ibfk_1` FOREIGN KEY (`operator_id_opr`) REFERENCES `operator` (`id_opr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `operator`
--
ALTER TABLE `operator`
  ADD CONSTRAINT `operator_ibfk_1` FOREIGN KEY (`users_id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pekebun`
--
ALTER TABLE `pekebun`
  ADD CONSTRAINT `pekebun_ibfk_1` FOREIGN KEY (`users_id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wilayah_kebun`
--
ALTER TABLE `wilayah_kebun`
  ADD CONSTRAINT `wilayah_kebun_ibfk_1` FOREIGN KEY (`operator_id_opr`) REFERENCES `operator` (`id_opr`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
