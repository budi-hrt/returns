-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2022 at 04:19 PM
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
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `id` int(11) NOT NULL,
  `nama_status` varchar(11) NOT NULL,
  `status_tg` int(11) NOT NULL,
  `ket_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`id`, `nama_status`, `status_tg`, `ket_status`) VALUES
(1, 'TK/0', 0, 'tidak kawin dan tidak ada tanggungan'),
(2, 'TK/1', 1, 'tidak kawin dan 1 tanggungan'),
(3, 'TK/2', 2, 'tidak kawin dan 2 tanggungan'),
(4, 'TK/3', 3, 'tidak kawin dan 3 tanggungan'),
(5, 'K/0', 1, 'kawin dan tidak ada tanggungan'),
(6, 'K/1', 2, 'kawin dan 1 tanggungan'),
(7, 'K/2', 3, 'kawin dan 2 tanggungan'),
(8, 'K/3', 4, 'kawin dan 3 tanggungan'),
(9, 'K/I/0', 13, 'penghasilan digabung dan tidak ada tanggungan'),
(10, 'K/I/1', 14, 'penghasilan s & I digabung dan 1 tanggungan'),
(11, 'K/I/2', 15, 'penghasilan digabung dan 2 tanggungan'),
(12, 'K/I/3', 16, 'penghasilan digabung dan 3 tanggungan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
