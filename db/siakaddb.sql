-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2025 at 08:09 AM
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
-- Database: `siakaddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int NOT NULL,
  `nidn` varchar(10) NOT NULL,
  `nama` varchar(75) NOT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nidn`, `nama`, `jenis_kelamin`, `alamat`, `hp`, `waktu`) VALUES
(1, '1323450001', 'Nur Hasan', 'L', 'Banyumas', '0897654336', '2025-10-13 06:47:09'),
(2, '1323450002', 'Khusnul', 'L', 'Purwokerto', '0864353627', '2025-10-13 06:48:33'),
(4, '737389', 'yeyieu', 'P', 'wqjhqwu', '81727', '2025-12-04 09:42:04'),
(5, '1323450004', 'Nandi', 'L', 'Padamara', '08988765', '2025-12-14 08:04:20'),
(6, '1323450005', 'Faridah', 'P', 'Cilacap', '0873543736', '2025-12-14 08:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `id` int NOT NULL,
  `nim` varchar(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prodi` int NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id`, `nim`, `nama`, `jenis_kelamin`, `alamat`, `prodi`, `waktu`) VALUES
(1, '244110601001', 'Aya', 'P', 'Bumiayu', 1, '2025-10-06 08:35:39'),
(2, '244110601002', 'Bayu', 'L', 'Bandung', 1, '2025-10-13 05:56:17'),
(3, '244110601003', 'Caca', 'P', 'Purwokerto', 2, '2025-10-13 06:02:42'),
(4, '244110601017', 'kasih', 'P', 'Jogja', 3, '2025-11-10 07:43:26'),
(7, '4488484', 'dhfhfh', 'P', 'hdhfhf', 1, '2025-12-04 09:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `level` enum('mhs','dosen','admin','superadmin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `level`) VALUES
(31, '244110601001', 'aya@example.com', '81dc9bdb52d04dc20036dbd8313ed055', 'mhs'),
(32, 'Admin1', 'admin1@example.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(33, '244110601002', 'bayu@example.com', '81dc9bdb52d04dc20036dbd8313ed055', 'mhs'),
(34, '1323450001', 'nurhasan@example.com', '81dc9bdb52d04dc20036dbd8313ed055', 'dosen'),
(35, '244110601003', 'caca@example.com', '81dc9bdb52d04dc20036dbd8313ed055', 'mhs'),
(36, '1323450002', 'khusnul@example.com', '81dc9bdb52d04dc20036dbd8313ed055', 'dosen'),
(41, 'Admin2', 'admin2@example.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(42, 'superadmin', 'superadmin@example.com', '81dc9bdb52d04dc20036dbd8313ed055', 'superadmin'),
(44, 'Admin3', 'admin3@example.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(45, 'Admin4', 'admin4@example.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(46, 'Admin5', 'admin5@example.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
