-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2022 at 04:39 PM
-- Server version: 10.6.5-MariaDB-log
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `detil_gajian`
--

CREATE TABLE `detil_gajian` (
  `id_gajian` int(11) NOT NULL,
  `kode_gaji` varchar(50) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_kryn` int(11) NOT NULL,
  `terima_gp` int(11) NOT NULL,
  `terima_tj` int(11) NOT NULL,
  `terima_um` int(11) NOT NULL,
  `id_bpjs` int(11) NOT NULL,
  `pot_pph21` int(11) NOT NULL,
  `pot_absensi` int(11) NOT NULL,
  `pot_pinjaman` int(11) NOT NULL,
  `pot_lain` int(11) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `date_update` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_gajian`
--

INSERT INTO `detil_gajian` (`id_gajian`, `kode_gaji`, `bulan`, `tahun`, `id_kryn`, `terima_gp`, `terima_tj`, `terima_um`, `id_bpjs`, `pot_pph21`, `pot_absensi`, `pot_pinjaman`, `pot_lain`, `id_usr`, `date_update`, `status`) VALUES
(213, 'UPH-0001', 1, 2022, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(214, 'UPH-0001', 1, 2022, 2, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(215, 'UPH-0001', 1, 2022, 4, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(216, 'UPH-0001', 1, 2022, 5, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(217, 'UPH-0001', 1, 2022, 6, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(218, 'UPH-0001', 1, 2022, 7, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(219, 'UPH-0001', 1, 2022, 11, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(220, 'UPH-0001', 1, 2022, 12, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(221, 'UPH-0001', 1, 2022, 13, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(222, 'UPH-0001', 1, 2022, 15, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(223, 'UPH-0001', 1, 2022, 16, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(224, 'UPH-0001', 1, 2022, 18, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(225, 'UPH-0001', 1, 2022, 22, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(226, 'UPH-0001', 1, 2022, 25, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(227, 'UPH-0001', 1, 2022, 26, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(228, 'UPH-0001', 1, 2022, 27, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(229, 'UPH-0001', 1, 2022, 28, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(230, 'UPH-0001', 1, 2022, 29, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(231, 'UPH-0001', 1, 2022, 30, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(232, 'UPH-0001', 1, 2022, 31, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(233, 'UPH-0001', 1, 2022, 32, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(234, 'UPH-0001', 1, 2022, 33, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(235, 'UPH-0001', 1, 2022, 35, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(236, 'UPH-0001', 1, 2022, 38, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(237, 'UPH-0001', 1, 2022, 41, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(238, 'UPH-0001', 1, 2022, 42, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(239, 'UPH-0001', 1, 2022, 46, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(240, 'UPH-0001', 1, 2022, 49, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(241, 'UPH-0001', 1, 2022, 52, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(242, 'UPH-0001', 1, 2022, 55, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(243, 'UPH-0001', 1, 2022, 56, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(244, 'UPH-0001', 1, 2022, 68, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(245, 'UPH-0001', 1, 2022, 81, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(246, 'UPH-0001', 1, 2022, 85, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(247, 'UPH-0001', 1, 2022, 92, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(248, 'UPH-0001', 1, 2022, 135, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(249, 'UPH-0001', 1, 2022, 136, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(250, 'UPH-0001', 1, 2022, 138, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(251, 'UPH-0001', 1, 2022, 141, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(252, 'UPH-0001', 1, 2022, 142, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(253, 'UPH-0001', 1, 2022, 145, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(254, 'UPH-0001', 1, 2022, 147, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(255, 'UPH-0001', 1, 2022, 148, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(256, 'UPH-0001', 1, 2022, 149, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(257, 'UPH-0001', 1, 2022, 150, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(258, 'UPH-0001', 1, 2022, 151, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(259, 'UPH-0001', 1, 2022, 152, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(260, 'UPH-0001', 1, 2022, 154, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(261, 'UPH-0001', 1, 2022, 155, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(262, 'UPH-0001', 1, 2022, 157, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detil_gajian`
--
ALTER TABLE `detil_gajian`
  ADD PRIMARY KEY (`id_gajian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detil_gajian`
--
ALTER TABLE `detil_gajian`
  MODIFY `id_gajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
