-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2022 at 02:59 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `returns`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_gajian`
--

CREATE TABLE `tb_gajian` (
  `id_gajian` int(11) NOT NULL,
  `priode_gajian` date NOT NULL,
  `id_kryn` int(11) NOT NULL,
  `terima_gp` int(11) NOT NULL,
  `terima_tj` int(11) NOT NULL,
  `terima_um` int(11) NOT NULL,
  `pot_bpjs` int(11) NOT NULL,
  `pot_pph21` int(11) NOT NULL,
  `pot_absensi` int(11) NOT NULL,
  `pot_pinjaman` int(11) NOT NULL,
  `pot_lain` int(11) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `ket_gaji` varchar(50) NOT NULL,
  `date_apdated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_gajian`
--
ALTER TABLE `tb_gajian`
  ADD PRIMARY KEY (`id_gajian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_gajian`
--
ALTER TABLE `tb_gajian`
  MODIFY `id_gajian` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
