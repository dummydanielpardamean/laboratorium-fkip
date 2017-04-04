-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2017 at 12:29 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.1.3-2+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labor`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(10) UNSIGNED NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `ruang` varchar(255) NOT NULL,
  `kelas_peserta` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `NIS` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `gambar_profil` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`NIS`, `password`, `nama`, `kelas`, `gambar_profil`, `admin`) VALUES
('191', 'd56b699830e77ba53855679cb1d252da', 'Siswa 1', 'X-A', 'avatar.png', 0),
('192', 'd56b699830e77ba53855679cb1d252da', 'Siswa 2', 'IA', 'avatar.png', 0),
('193', 'd56b699830e77ba53855679cb1d252da', 'Siswa 3', 'X-A', 'avatar.png', 0),
('admin', 'd56b699830e77ba53855679cb1d252da', 'Admin', 'XII-C', 'avatar.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`NIS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
