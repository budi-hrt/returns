-- phpMyAdmin SQL Dump
-- version 4.9.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2022 at 07:53 AM
-- Server version: 10.6.5-MariaDB-log
-- PHP Version: 5.6.35

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
-- Table structure for table `access_dashboard`
--

CREATE TABLE `access_dashboard` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `dashboard_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_dashboard`
--

INSERT INTO `access_dashboard` (`id`, `role_id`, `dashboard_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode` int(11) NOT NULL,
  `barcode` varchar(128) NOT NULL,
  `nama_barang` varchar(256) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_subkategori` int(11) NOT NULL,
  `satuan1` varchar(50) NOT NULL,
  `satuan2` varchar(50) NOT NULL,
  `isi2` int(11) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok_minim` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode`, `barcode`, `nama_barang`, `id_kategori`, `id_subkategori`, `satuan1`, `satuan2`, `isi2`, `id_merek`, `harga`, `stok_minim`, `is_active`) VALUES
(10001, '8990289833', 'Nota Kontan', 3, 4, 'Pcs', 'Dos', 250, 2, 0, 1, 1),
(10002, '8996001355046', 'Wafer Superstar', 1, 6, 'Pak', 'Dos', 10, 4, 0, 1, 1),
(10003, '8992775212103', 'Kacang Telur', 1, 7, 'Pcs', 'Dos', 10, 5, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detil_bpjs`
--

CREATE TABLE `detil_bpjs` (
  `id_detil_bpjs` int(11) NOT NULL,
  `kode_iuran_bpjs` varchar(50) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_kry_bpjs` int(11) NOT NULL,
  `bpjs_kesehatan` int(11) NOT NULL,
  `bpjs_ktk` int(11) NOT NULL,
  `tambahan` int(11) NOT NULL,
  `type` varchar(11) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `date_update` int(11) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_bpjs`
--

INSERT INTO `detil_bpjs` (`id_detil_bpjs`, `kode_iuran_bpjs`, `bulan`, `tahun`, `id_kry_bpjs`, `bpjs_kesehatan`, `bpjs_ktk`, `tambahan`, `type`, `id_usr`, `date_update`, `status`) VALUES
(44, 'IUR-BPJS/0001', 1, 2022, 52, 26750, 53000, 0, 'manual', 1, 1645703809, 'selesai'),
(46, 'IUR-BPJS/0001', 1, 2022, 141, 52000, 55000, 2, 'manual', 1, 1645706860, 'selesai'),
(47, 'IUR-BPJS/0001', 1, 2022, 7, 96000, 96000, 2, 'auto', 1, 1645706822, 'selesai'),
(48, 'IUR-BPJS/0001', 1, 2022, 1, 50000, 150000, 0, 'manual', 1, 1645703983, 'selesai'),
(49, 'IUR-BPJS/0001', 1, 2022, 4, 100000, 150000, 1, 'auto', 1, 1645706768, 'selesai'),
(50, 'IUR-BPJS/0002', 2, 2022, 4, 100000, 150000, 1, 'auto', 1, 1645789977, 'selesai'),
(51, 'IUR-BPJS/0002', 2, 2022, 1, 50000, 150000, 0, 'manual', 1, 1645789947, 'selesai'),
(52, 'IUR-BPJS/0002', 2, 2022, 7, 32000, 96000, 0, 'auto', 1, 1645789963, 'selesai'),
(53, 'IUR-BPJS/0002', 2, 2022, 141, 52000, 55000, 2, 'manual', 1, 1645789947, 'selesai'),
(54, 'IUR-BPJS/0002', 2, 2022, 52, 26750, 53000, 0, 'manual', 1, 1645789947, 'selesai'),
(55, 'IUR-BPJS/0001', 1, 2022, 13, 65000, 195000, 0, 'auto', 1, 1647152073, 'selesai');

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
(262, 'UPH-0001', 1, 2022, 157, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1647184229, 'pending'),
(263, 'UPH-0001', 2, 2022, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(264, 'UPH-0001', 2, 2022, 2, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(265, 'UPH-0001', 2, 2022, 4, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(266, 'UPH-0001', 2, 2022, 5, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(267, 'UPH-0001', 2, 2022, 6, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(268, 'UPH-0001', 2, 2022, 7, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(269, 'UPH-0001', 2, 2022, 11, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(270, 'UPH-0001', 2, 2022, 12, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(271, 'UPH-0001', 2, 2022, 13, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(272, 'UPH-0001', 2, 2022, 15, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(273, 'UPH-0001', 2, 2022, 16, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(274, 'UPH-0001', 2, 2022, 18, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(275, 'UPH-0001', 2, 2022, 22, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(276, 'UPH-0001', 2, 2022, 25, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(277, 'UPH-0001', 2, 2022, 26, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(278, 'UPH-0001', 2, 2022, 27, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(279, 'UPH-0001', 2, 2022, 28, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(280, 'UPH-0001', 2, 2022, 29, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(281, 'UPH-0001', 2, 2022, 30, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(282, 'UPH-0001', 2, 2022, 31, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(283, 'UPH-0001', 2, 2022, 32, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(284, 'UPH-0001', 2, 2022, 33, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(285, 'UPH-0001', 2, 2022, 35, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(286, 'UPH-0001', 2, 2022, 38, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(287, 'UPH-0001', 2, 2022, 41, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(288, 'UPH-0001', 2, 2022, 42, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(289, 'UPH-0001', 2, 2022, 46, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(290, 'UPH-0001', 2, 2022, 49, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(291, 'UPH-0001', 2, 2022, 52, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(292, 'UPH-0001', 2, 2022, 55, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(293, 'UPH-0001', 2, 2022, 56, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(294, 'UPH-0001', 2, 2022, 68, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(295, 'UPH-0001', 2, 2022, 81, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(296, 'UPH-0001', 2, 2022, 85, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(297, 'UPH-0001', 2, 2022, 92, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(298, 'UPH-0001', 2, 2022, 135, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(299, 'UPH-0001', 2, 2022, 136, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(300, 'UPH-0001', 2, 2022, 138, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(301, 'UPH-0001', 2, 2022, 141, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(302, 'UPH-0001', 2, 2022, 142, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(303, 'UPH-0001', 2, 2022, 145, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(304, 'UPH-0001', 2, 2022, 147, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(305, 'UPH-0001', 2, 2022, 148, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(306, 'UPH-0001', 2, 2022, 149, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(307, 'UPH-0001', 2, 2022, 150, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(308, 'UPH-0001', 2, 2022, 151, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(309, 'UPH-0001', 2, 2022, 152, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(310, 'UPH-0001', 2, 2022, 154, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(311, 'UPH-0001', 2, 2022, 155, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending'),
(312, 'UPH-0001', 2, 2022, 157, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1653960867, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `detil_pembelian`
--

CREATE TABLE `detil_pembelian` (
  `id_detil` int(11) NOT NULL,
  `no_faktur` varchar(128) NOT NULL,
  `kode_produk` varchar(128) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `harga_detil` int(11) NOT NULL,
  `disc_detil` int(11) NOT NULL,
  `subtotal_detil` int(11) NOT NULL,
  `nomor_po` varchar(128) NOT NULL,
  `id_sup` int(11) NOT NULL,
  `status_detil` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_pembelian`
--

INSERT INTO `detil_pembelian` (`id_detil`, `no_faktur`, `kode_produk`, `qty`, `id_satuan`, `harga_detil`, `disc_detil`, `subtotal_detil`, `nomor_po`, `id_sup`, `status_detil`) VALUES
(1, 'PB19110001', '10003', 100, 2, 55000, 0, 5500000, 'PO19100009', 2, 'Pending'),
(2, 'PB19110001', '10002', 100, 2, 10000, 0, 1000000, 'PO19100009', 2, 'Pending'),
(3, 'PB19110001', '10001', 10, 2, 56000, 0, 560000, 'PO19100009', 2, 'Pending'),
(4, 'PB19110002', '10003', 100, 2, 55000, 0, 5500000, 'PO19100009', 2, 'Pending'),
(5, 'PB19110002', '10002', 100, 2, 10000, 0, 1000000, 'PO19100009', 2, 'Pending'),
(6, 'PB19110002', '10001', 10, 2, 56000, 0, 560000, 'PO19100009', 2, 'Pending'),
(7, 'PB19110004', '10001', 50, 2, 56000, 0, 2800000, 'PO19100008', 1, 'Pending'),
(8, 'PB19110004', '10002', 50, 2, 10000, 0, 500000, 'PO19100008', 1, 'Pending'),
(9, 'PB19110005', '10001', 2000, 0, 56000, 0, 11200000, 'PO19100010', 2, 'Pending'),
(10, 'PB19110005', '10001', 10, 1, 56000, 0, 560000, 'PO19100010', 2, 'Pending'),
(11, 'PB19110006', '10001', 50, 2, 56000, 0, 2800000, 'PO19100008', 1, 'Pending'),
(12, 'PB19110006', '10002', 50, 2, 10000, 5000, 500000, 'PO19100008', 1, 'Pending'),
(13, 'PB19120001', '10001', 500, 2, 12000, 500, 600000, 'PO19100003', 1, 'Pending'),
(14, 'PB19120002', '10002', 14, 2, 10000, 0, 140000, 'PO19100004', 1, 'Pending'),
(15, 'PB19120002', '10001', 120, 2, 12000, 0, 1440000, 'PO19100004', 1, 'Pending'),
(16, 'PB19120005', '10002', 14, 2, 10000, 0, 140000, 'PO19100004', 1, 'Pending'),
(17, 'PB19120005', '10001', 120, 2, 12000, 0, 1440000, 'PO19100004', 1, 'Pending'),
(18, 'PB21040001', '10001', 50, 1, 12000, 0, 600000, 'PO19100001', 1, 'Pending'),
(19, 'PB21040001', '10002', 20, 2, 10000, 0, 200000, 'PO19100001', 1, 'Pending'),
(20, 'PB22020001', '10001', 50, 2, 12000, 0, 600000, 'PO19100003', 1, 'Pending'),
(21, 'PB22030001', '10001', 50, 2, 11000, 0, 600000, 'PO19100001', 1, 'Pending'),
(22, 'PB22030001', '10002', 20, 1, 10000, 0, 200000, 'PO19100001', 1, 'Pending'),
(23, 'PB22030004', '10001', 50, 1, 12000, 0, 600000, 'PO19100001', 1, 'Pending'),
(24, 'PB22030004', '10002', 20, 2, 10000, 0, 200000, 'PO19100001', 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `detil_po`
--

CREATE TABLE `detil_po` (
  `id` int(11) NOT NULL,
  `faktur_po` varchar(50) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `terkirim` int(11) NOT NULL,
  `retur` int(11) NOT NULL,
  `harga_item` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `status_detil_po` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_po`
--

INSERT INTO `detil_po` (`id`, `faktur_po`, `kode_produk`, `qty`, `id_satuan`, `terkirim`, `retur`, `harga_item`, `subtotal`, `status_detil_po`) VALUES
(1, 'PO19090001', '10002', 100, 1, 0, 0, 10000, 1000000, 'pendding'),
(2, 'PO19090001', '10001', 20, 1, 0, 0, 200000, 4000000, 'pendding'),
(3, 'PO19090001', '10001', 10, 3, 0, 0, 3000, 30000, 'pendding'),
(4, 'PO19100001', '10001', 50, 1, 0, 0, 12000, 600000, 'pendding'),
(7, 'PO19100001', '10002', 20, 2, 0, 0, 10000, 200000, 'pendding'),
(8, 'PO19100002', '10002', 120, 1, 0, 0, 10000, 1200000, 'pendding'),
(9, 'PO19100003', '10001', 50, 2, 0, 0, 12000, 600000, 'pendding'),
(10, 'PO19100004', '10002', 14, 2, 0, 0, 10000, 140000, 'pendding'),
(11, 'PO19100004', '10001', 120, 2, 0, 0, 12000, 1440000, 'pendding'),
(15, 'PO19100005', '10002', 10, 1, 0, 0, 10000, 100000, 'pendding'),
(16, 'PO19100006', '10002', 15, 2, 0, 0, 10000, 150000, 'pendding'),
(17, 'PO19100006', '10001', 10, 1, 0, 0, 12000, 120000, 'pendding'),
(18, 'PO19100007', '10001', 12, 1, 0, 0, 56000, 672000, 'pendding'),
(19, 'PO19100008', '10001', 50, 2, 0, 0, 56000, 2800000, 'pendding'),
(20, 'PO19100008', '10002', 50, 2, 0, 0, 10000, 500000, 'pendding'),
(21, 'PO19100009', '10003', 100, 2, 0, 0, 55000, 5500000, 'pendding'),
(22, 'PO19100009', '10002', 100, 2, 0, 0, 10000, 1000000, 'pendding'),
(23, 'PO19100009', '10001', 10, 2, 0, 0, 56000, 560000, 'pendding'),
(24, 'PO19100010', '10001', 200, 0, 0, 0, 56000, 11200000, 'pendding'),
(25, 'PO19100010', '10001', 10, 1, 0, 0, 56000, 560000, 'pendding'),
(26, 'PO19110001', '10001', 10, 2, 0, 0, 56000, 560000, 'pendding'),
(29, 'PO19110001', '10003', 15, 1, 0, 0, 55000, 825000, 'pendding'),
(36, 'PO19110001', '10002', 10, 4, 0, 0, 10000, 100000, 'pendding'),
(37, 'PO19120001', '10003', 10, 1, 0, 0, 55000, 550000, 'pendding'),
(38, 'PO19120001', '10002', 12, 2, 0, 0, 10000, 120000, 'pendding'),
(39, 'PO21040001', '10003', 100, 2, 0, 0, 55000, 5500000, 'pendding'),
(40, 'PO21040001', '10001', 2, 1, 0, 0, 56000, 112000, 'pendding'),
(41, 'PO22020001', '10001', 10, 1, 0, 0, 56000, 560000, 'pendding'),
(43, 'PO22020002', '10001', 1, 1, 0, 0, 56000, 56000, 'pendding'),
(44, 'PO22030001', '10003', 25, 1, 0, 0, 55000, 1375000, 'pendding');

-- --------------------------------------------------------

--
-- Table structure for table `detil_pph`
--

CREATE TABLE `detil_pph` (
  `id` int(11) NOT NULL,
  `kode_iuran_pph` varchar(50) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_kry` int(11) NOT NULL,
  `ptkp` int(11) NOT NULL,
  `bruto` int(20) NOT NULL,
  `iuran_pph` int(11) NOT NULL,
  `type` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_update` int(50) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detil_pph21`
--

CREATE TABLE `detil_pph21` (
  `id_detil_pph21` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `kode_pph21` varchar(11) NOT NULL,
  `id_kry_pph21` int(11) NOT NULL,
  `upah` int(11) NOT NULL,
  `id_ptkp` int(11) NOT NULL,
  `ttl_pph` int(11) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'pending',
  `id_user` int(11) NOT NULL,
  `date_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id` int(11) NOT NULL,
  `kode_gudang` varchar(50) NOT NULL,
  `nama_gudang` varchar(100) NOT NULL,
  `deskripsi` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id`, `kode_gudang`, `nama_gudang`, `deskripsi`, `is_active`) VALUES
(1, '001', 'Gudang Utama', 'Gudang Barang Baik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `id` int(11) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `icon`) VALUES
(1, 'fa-glass'),
(2, 'fa-music'),
(3, 'fa-search'),
(4, 'fa-envelope-o'),
(5, 'fa-heart'),
(6, 'fa-star'),
(7, 'fa-star-o'),
(8, 'fa-user'),
(9, 'fa-film'),
(10, 'fa-th-large'),
(11, 'fa-th'),
(12, 'fa-th-list'),
(13, 'fa-check'),
(14, 'fa-remove'),
(15, 'fa-close'),
(16, 'fa-times'),
(17, 'fa-search-plus'),
(18, 'fa-search-minus'),
(19, 'fa-power-off'),
(20, 'fa-signal'),
(21, 'fa-gear'),
(22, 'fa-cog'),
(23, 'fa-trash-o'),
(24, 'fa-home'),
(25, 'fa-file-o'),
(26, 'fa-clock-o'),
(27, 'fa-road'),
(28, 'fa-download'),
(29, 'fa-arrow-circle-o-do'),
(30, 'fa-arrow-circle-o-up'),
(31, 'fa-inbox'),
(32, 'fa-play-circle-o'),
(33, 'fa-rotate-right'),
(34, 'fa-repeat'),
(35, 'fa-refresh'),
(36, 'fa-list-alt'),
(37, 'fa-lock'),
(38, 'fa-flag'),
(39, 'fa-headphones'),
(40, 'fa-volume-off'),
(41, 'fa-volume-down'),
(42, 'fa-volume-up'),
(43, 'fa-qrcode'),
(44, 'fa-barcode'),
(45, 'fa-tag'),
(46, 'fa-tags'),
(47, 'fa-book'),
(48, 'fa-bookmark'),
(49, 'fa-print f'),
(50, 'fa-camera'),
(51, 'fa-font'),
(52, 'fa-bold'),
(53, 'fa-italic'),
(54, 'fa-text-height'),
(55, 'fa-text-width'),
(56, 'fa-align-left'),
(57, 'fa-align-center'),
(58, 'fa-align-right'),
(59, 'fa-align-justify'),
(60, 'fa-list'),
(61, 'fa-dedent'),
(62, 'fa-outdent'),
(63, 'fa-indent'),
(64, 'fa-video-camera'),
(65, 'fa-photo'),
(66, 'fa-image'),
(67, 'fa-picture-o'),
(68, 'fa-pencil'),
(69, 'fa-map-marker'),
(70, 'fa-adjust'),
(71, 'fa-tint'),
(72, 'fa-edit'),
(73, 'fa-pencil-square-o'),
(74, 'fa-share-square-o'),
(75, 'fa-check-square-o'),
(76, 'fa-arrows'),
(77, 'fa-step-backward'),
(78, 'fa-fast-backward'),
(79, 'fa-backward'),
(80, 'fa-play'),
(81, 'fa-pause'),
(82, 'fa-stop'),
(83, 'fa-forward'),
(84, 'fa-fast-forward'),
(85, 'fa-step-forward'),
(86, 'fa-eject'),
(87, 'fa-chevron-left'),
(88, 'fa-chevron-right'),
(89, 'fa-plus-circle'),
(90, 'fa-minus-circle'),
(91, 'fa-times-circle'),
(92, 'fa-check-circle'),
(93, 'fa-question-circle'),
(94, 'fa-info-circle'),
(95, 'fa-crosshairs'),
(96, 'fa-times-circle-o'),
(97, 'fa-check-circle-o'),
(98, 'fa-ban'),
(99, 'fa-arrow-left'),
(100, 'fa-arrow-right'),
(101, 'fa-arrow-up'),
(102, 'fa-arrow-down'),
(103, 'fa-mail-forward'),
(104, 'fa-share'),
(105, 'fa-expand'),
(106, 'fa-compress'),
(107, 'fa-plus'),
(108, 'fa-minus'),
(109, 'fa-asterisk'),
(110, 'fa-exclamation-circl'),
(111, 'fa-gift'),
(112, 'fa-leaf'),
(113, 'fa-fire'),
(114, 'fa-eye'),
(115, 'fa-eye-slash'),
(116, 'fa-warning'),
(117, 'fa-exclamation-trian'),
(118, 'fa-plane'),
(119, 'fa-calendar'),
(120, 'fa-random'),
(121, 'fa-comment'),
(122, 'fa-magnet'),
(123, 'fa-chevron-up'),
(124, 'fa-chevron-down'),
(125, 'fa-retweet'),
(126, 'fa-shopping-cart'),
(127, 'fa-folder'),
(128, 'fa-folder-open'),
(129, 'fa-arrows-v'),
(130, 'fa-arrows-h'),
(131, 'fa-bar-chart-o'),
(132, 'fa-bar-chart'),
(133, 'fa-twitter-square'),
(134, 'fa-facebook-square'),
(135, 'fa-camera-retro'),
(136, 'fa-key'),
(137, 'fa-gears'),
(138, 'fa-cogs'),
(139, 'fa-comments'),
(140, 'fa-thumbs-o-up'),
(141, 'fa-thumbs-o-down'),
(142, 'fa-star-half'),
(143, 'fa-heart-o'),
(144, 'fa-sign-out'),
(145, 'fa-linkedin-square'),
(146, 'fa-thumb-tack'),
(147, 'fa-external-link'),
(148, 'fa-sign-in'),
(149, 'fa-trophy'),
(150, 'fa-github-square'),
(151, 'fa-upload'),
(152, 'fa-lemon-o'),
(153, 'fa-phone'),
(154, 'fa-square-o'),
(155, 'fa-bookmark-o'),
(156, 'fa-phone-square'),
(157, 'fa-twitter'),
(158, 'fa-facebook-f'),
(159, 'fa-facebook'),
(160, 'fa-github'),
(161, 'fa-unlock'),
(162, 'fa-credit-card'),
(163, 'fa-rss'),
(164, 'fa-hdd-o'),
(165, 'fa-bullhorn'),
(166, 'fa-bell'),
(167, 'fa-certificate'),
(168, 'fa-hand-o-right'),
(169, 'fa-hand-o-left'),
(170, 'fa-hand-o-up'),
(171, 'fa-hand-o-down'),
(172, 'fa-arrow-circle-left'),
(173, 'fa-arrow-circle-righ'),
(174, 'fa-arrow-circle-up'),
(175, 'fa-arrow-circle-down'),
(176, 'fa-globe'),
(177, 'fa-wrench'),
(178, 'fa-tasks'),
(179, 'fa-filter'),
(180, 'fa-briefcase'),
(181, 'fa-arrows-alt'),
(182, 'fa-group'),
(183, 'fa-users'),
(184, 'fa-chain'),
(185, 'fa-link'),
(186, 'fa-cloud'),
(187, 'fa-flask'),
(188, 'fa-cut'),
(189, 'fa-scissors'),
(190, 'fa-copy'),
(191, 'fa-files-o'),
(192, 'fa-paperclip'),
(193, 'fa-save'),
(194, 'fa-floppy-o'),
(195, 'fa-square'),
(196, 'fa-navicon'),
(197, 'fa-reorder'),
(198, 'fa-bars'),
(199, 'fa-list-ul'),
(200, 'fa-list-ol'),
(201, 'fa-strikethrough'),
(202, 'fa-underline'),
(203, 'fa-table'),
(204, 'fa-magic'),
(205, 'fa-truck'),
(206, 'fa-pinterest'),
(207, 'fa-pinterest-square'),
(208, 'fa-google-plus-squar'),
(209, 'fa-google-plus'),
(210, 'fa-money'),
(211, 'fa-caret-down'),
(212, 'fa-caret-up'),
(213, 'fa-caret-left'),
(214, 'fa-caret-right'),
(215, 'fa-columns'),
(216, 'fa-unsorted'),
(217, 'fa-sort'),
(218, 'fa-sort-down'),
(219, 'fa-sort-desc'),
(220, 'fa-sort-up'),
(221, 'fa-sort-asc'),
(222, 'fa-envelope'),
(223, 'fa-linkedin'),
(224, 'fa-rotate-left'),
(225, 'fa-undo'),
(226, 'fa-legal'),
(227, 'fa-gavel'),
(228, 'fa-dashboard'),
(229, 'fa-tachometer'),
(230, 'fa-comment-o'),
(231, 'fa-comments-o'),
(232, 'fa-flash'),
(233, 'fa-bolt'),
(234, 'fa-sitemap'),
(235, 'fa-umbrella'),
(236, 'fa-paste'),
(237, 'fa-clipboard'),
(238, 'fa-lightbulb-o'),
(239, 'fa-exchange'),
(240, 'fa-cloud-download'),
(241, 'fa-cloud-upload'),
(242, 'fa-user-md'),
(243, 'fa-stethoscope'),
(244, 'fa-suitcase'),
(245, 'fa-bell-o'),
(246, 'fa-coffee'),
(247, 'fa-cutlery'),
(248, 'fa-file-text-o'),
(249, 'fa-building-o'),
(250, 'fa-hospital-o'),
(251, 'fa-ambulance'),
(252, 'fa-medkit'),
(253, 'fa-fighter-jet'),
(254, 'fa-beer'),
(255, 'fa-h-square'),
(256, 'fa-plus-square'),
(257, 'fa-angle-double-left'),
(258, 'fa-angle-double-righ'),
(259, 'fa-angle-double-up'),
(260, 'fa-angle-double-down'),
(261, 'fa-angle-left'),
(262, 'fa-angle-right'),
(263, 'fa-angle-up'),
(264, 'fa-angle-down'),
(265, 'fa-desktop'),
(266, 'fa-laptop'),
(267, 'fa-tablet'),
(268, 'fa-mobile-phone'),
(269, 'fa-mobile'),
(270, 'fa-circle-o'),
(271, 'fa-quote-left'),
(272, 'fa-quote-right'),
(273, 'fa-spinner'),
(274, 'fa-circle'),
(275, 'fa-mail-reply'),
(276, 'fa-reply'),
(277, 'fa-github-alt'),
(278, 'fa-folder-o'),
(279, 'fa-folder-open-o'),
(280, 'fa-smile-o'),
(281, 'fa-frown-o'),
(282, 'fa-meh-o'),
(283, 'fa-gamepad'),
(284, 'fa-keyboard-o'),
(285, 'fa-flag-o'),
(286, 'fa-flag-checkered'),
(287, 'fa-terminal'),
(288, 'fa-code'),
(289, 'fa-mail-reply-all'),
(290, 'fa-reply-all'),
(291, 'fa-star-half-empty'),
(292, 'fa-star-half-full'),
(293, 'fa-star-half-o'),
(294, 'fa-location-arrow'),
(295, 'fa-crop'),
(296, 'fa-code-fork'),
(297, 'fa-unlink'),
(298, 'fa-chain-broken'),
(299, 'fa-question'),
(300, 'fa-info'),
(301, 'fa-exclamation'),
(302, 'fa-superscript'),
(303, 'fa-subscript'),
(304, 'fa-eraser'),
(305, 'fa-puzzle-piece'),
(306, 'fa-microphone'),
(307, 'fa-microphone-slash'),
(308, 'fa-shield'),
(309, 'fa-calendar-o'),
(310, 'fa-fire-extinguisher'),
(311, 'fa-rocket'),
(312, 'fa-maxcdn'),
(313, 'fa-chevron-circle-le'),
(314, 'fa-chevron-circle-ri'),
(315, 'fa-chevron-circle-up'),
(316, 'fa-chevron-circle-do'),
(317, 'fa-html5'),
(318, 'fa-css3'),
(319, 'fa-anchor'),
(320, 'fa-unlock-alt'),
(321, 'fa-bullseye'),
(322, 'fa-ellipsis-h'),
(323, 'fa-ellipsis-v'),
(324, 'fa-rss-square'),
(325, 'fa-play-circle'),
(326, 'fa-ticket'),
(327, 'fa-minus-square'),
(328, 'fa-minus-square-o'),
(329, 'fa-level-up'),
(330, 'fa-level-down'),
(331, 'fa-check-square'),
(332, 'fa-pencil-square'),
(333, 'fa-external-link-squ'),
(334, 'fa-share-square'),
(335, 'fa-compass'),
(336, 'fa-toggle-down'),
(337, 'fa-caret-square-o-do'),
(338, 'fa-toggle-up'),
(339, 'fa-caret-square-o-up'),
(340, 'fa-toggle-right'),
(341, 'fa-caret-square-o-ri'),
(342, 'fa-euro'),
(343, 'fa-eur'),
(344, 'fa-gbp'),
(345, 'fa-dollar'),
(346, 'fa-usd'),
(347, 'fa-rupee'),
(348, 'fa-inr'),
(349, 'fa-cny'),
(350, 'fa-rmb'),
(351, 'fa-yen'),
(352, 'fa-jpy'),
(353, 'fa-ruble'),
(354, 'fa-rouble'),
(355, 'fa-rub'),
(356, 'fa-won'),
(357, 'fa-krw'),
(358, 'fa-bitcoin'),
(359, 'fa-btc'),
(360, 'fa-file'),
(361, 'fa-file-text'),
(362, 'fa-sort-alpha-asc'),
(363, 'fa-sort-alpha-desc'),
(364, 'fa-sort-amount-asc'),
(365, 'fa-sort-amount-desc'),
(366, 'fa-sort-numeric-asc'),
(367, 'fa-sort-numeric-desc'),
(368, 'fa-thumbs-up'),
(369, 'fa-thumbs-down'),
(370, 'fa-youtube-square'),
(371, 'fa-youtube'),
(372, 'fa-xing'),
(373, 'fa-xing-square'),
(374, 'fa-youtube-play'),
(375, 'fa-dropbox'),
(376, 'fa-stack-overflow'),
(377, 'fa-instagram'),
(378, 'fa-flickr'),
(379, 'fa-adn'),
(380, 'fa-bitbucket'),
(381, 'fa-bitbucket-square'),
(382, 'fa-tumblr'),
(383, 'fa-tumblr-square'),
(384, 'fa-long-arrow-down'),
(385, 'fa-long-arrow-up'),
(386, 'fa-long-arrow-left'),
(387, 'fa-long-arrow-right'),
(388, 'fa-apple'),
(389, 'fa-windows'),
(390, 'fa-android'),
(391, 'fa-linux'),
(392, 'fa-dribbble'),
(393, 'fa-skype'),
(394, 'fa-foursquare'),
(395, 'fa-trello'),
(396, 'fa-female'),
(397, 'fa-male'),
(398, 'fa-gittip'),
(399, 'fa-gratipay'),
(400, 'fa-sun-o'),
(401, 'fa-moon-o'),
(402, 'fa-archive'),
(403, 'fa-bug'),
(404, 'fa-vk'),
(405, 'fa-weibo'),
(406, 'fa-renren'),
(407, 'fa-pagelines'),
(408, 'fa-stack-exchange'),
(409, 'fa-arrow-circle-o-ri'),
(410, 'fa-arrow-circle-o-le'),
(411, 'fa-toggle-left'),
(412, 'fa-caret-square-o-le'),
(413, 'fa-dot-circle-o'),
(414, 'fa-wheelchair'),
(415, 'fa-vimeo-square'),
(416, 'fa-turkish-lira'),
(417, 'fa-try'),
(418, 'fa-plus-square-o'),
(419, 'fa-space-shuttle'),
(420, 'fa-slack'),
(421, 'fa-envelope-square'),
(422, 'fa-wordpress'),
(423, 'fa-openid'),
(424, 'fa-institution'),
(425, 'fa-bank'),
(426, 'fa-university'),
(427, 'fa-mortar-board'),
(428, 'fa-graduation-cap'),
(429, 'fa-yahoo'),
(430, 'fa-google'),
(431, 'fa-reddit'),
(432, 'fa-reddit-square'),
(433, 'fa-stumbleupon-circl'),
(434, 'fa-stumbleupon'),
(435, 'fa-delicious'),
(436, 'fa-digg'),
(437, 'fa-pied-piper'),
(438, 'fa-pied-piper-alt'),
(439, 'fa-drupal'),
(440, 'fa-joomla'),
(441, 'fa-language'),
(442, 'fa-fax'),
(443, 'fa-building'),
(444, 'fa-child'),
(445, 'fa-paw'),
(446, 'fa-spoon'),
(447, 'fa-cube'),
(448, 'fa-cubes'),
(449, 'fa-behance'),
(450, 'fa-behance-square'),
(451, 'fa-steam'),
(452, 'fa-steam-square'),
(453, 'fa-recycle'),
(454, 'fa-automobile'),
(455, 'fa-car'),
(456, 'fa-cab'),
(457, 'fa-taxi'),
(458, 'fa-tree'),
(459, 'fa-spotify'),
(460, 'fa-deviantart'),
(461, 'fa-soundcloud'),
(462, 'fa-database'),
(463, 'fa-file-pdf-o'),
(464, 'fa-file-word-o'),
(465, 'fa-file-excel-o'),
(466, 'fa-file-powerpoint-o'),
(467, 'fa-file-photo-o'),
(468, 'fa-file-picture-o'),
(469, 'fa-file-image-o'),
(470, 'fa-file-zip-o'),
(471, 'fa-file-archive-o'),
(472, 'fa-file-sound-o'),
(473, 'fa-file-audio-o'),
(474, 'fa-file-movie-o'),
(475, 'fa-file-video-o'),
(476, 'fa-file-code-o'),
(477, 'fa-vine'),
(478, 'fa-codepen'),
(479, 'fa-jsfiddle'),
(480, 'fa-life-bouy'),
(481, 'fa-life-buoy'),
(482, 'fa-life-saver'),
(483, 'fa-support'),
(484, 'fa-life-ring'),
(485, 'fa-circle-o-notch'),
(486, 'fa-ra'),
(487, 'fa-rebel'),
(488, 'fa-ge'),
(489, 'fa-empire'),
(490, 'fa-git-square'),
(491, 'fa-git'),
(492, 'fa-hacker-news'),
(493, 'fa-tencent-weibo'),
(494, 'fa-qq'),
(495, 'fa-wechat'),
(496, 'fa-weixin'),
(497, 'fa-send'),
(498, 'fa-paper-plane'),
(499, 'fa-send-o'),
(500, 'fa-paper-plane-o'),
(501, 'fa-history'),
(502, 'fa-genderless'),
(503, 'fa-circle-thin'),
(504, 'fa-header'),
(505, 'fa-paragraph'),
(506, 'fa-sliders'),
(507, 'fa-share-alt'),
(508, 'fa-share-alt-square'),
(509, 'fa-bomb'),
(510, 'fa-soccer-ball-o'),
(511, 'fa-futbol-o'),
(512, 'fa-tty'),
(513, 'fa-binoculars'),
(514, 'fa-plug'),
(515, 'fa-slideshare'),
(516, 'fa-twitch'),
(517, 'fa-yelp'),
(518, 'fa-newspaper-o'),
(519, 'fa-wifi'),
(520, 'fa-calculator'),
(521, 'fa-paypal'),
(522, 'fa-google-wallet'),
(523, 'fa-cc-visa'),
(524, 'fa-cc-mastercard'),
(525, 'fa-cc-discover'),
(526, 'fa-cc-amex'),
(527, 'fa-cc-paypal'),
(528, 'fa-cc-stripe'),
(529, 'fa-bell-slash'),
(530, 'fa-bell-slash-o'),
(531, 'fa-trash'),
(532, 'fa-copyright'),
(533, 'fa-at'),
(534, 'fa-eyedropper'),
(535, 'fa-paint-brush'),
(536, 'fa-birthday-cake'),
(537, 'fa-area-chart'),
(538, 'fa-pie-chart'),
(539, 'fa-line-chart'),
(540, 'fa-lastfm'),
(541, 'fa-lastfm-square'),
(542, 'fa-toggle-off'),
(543, 'fa-toggle-on'),
(544, 'fa-bicycle'),
(545, 'fa-bus'),
(546, 'fa-ioxhost'),
(547, 'fa-angellist'),
(548, 'fa-cc za'),
(549, 'fa-shekel'),
(550, 'fa-sheqel'),
(551, 'fa-ils'),
(552, 'fa-meanpath'),
(553, 'fa-buysellads'),
(554, 'fa-connectdevelop'),
(555, 'fa-dashcube'),
(556, 'fa-forumbee'),
(557, 'fa-leanpub'),
(558, 'fa-sellsy'),
(559, 'fa-shirtsinbulk'),
(560, 'fa-simplybuilt'),
(561, 'fa-skyatlas'),
(562, 'fa-cart-plus'),
(563, 'fa-cart-arrow-down'),
(564, 'fa-diamond'),
(565, 'fa-ship'),
(566, 'fa-user-secret'),
(567, 'fa-motorcycle'),
(568, 'fa-street-view'),
(569, 'fa-heartbeat'),
(570, 'fa-venus'),
(571, 'fa-mars'),
(572, 'fa-mercury'),
(573, 'fa-transgender'),
(574, 'fa-transgender-alt'),
(575, 'fa-venus-double'),
(576, 'fa-mars-double'),
(577, 'fa-venus-mars'),
(578, 'fa-mars-stroke'),
(579, 'fa-mars-stroke-v'),
(580, 'fa-mars-stroke-h'),
(581, 'fa-neuter'),
(582, 'fa-facebook-official'),
(583, 'fa-pinterest-p'),
(584, 'fa-whatsapp'),
(585, 'fa-server'),
(586, 'fa-user-plus'),
(587, 'fa-user-times'),
(588, 'fa-hotel'),
(589, 'fa-bed'),
(590, 'fa-viacoin'),
(591, 'fa-train'),
(592, 'fa-subway'),
(593, 'fa-medium'),
(1, 'fa-glass'),
(2, 'fa-music'),
(3, 'fa-search'),
(4, 'fa-envelope-o'),
(5, 'fa-heart'),
(6, 'fa-star'),
(7, 'fa-star-o'),
(8, 'fa-user'),
(9, 'fa-film'),
(10, 'fa-th-large'),
(11, 'fa-th'),
(12, 'fa-th-list'),
(13, 'fa-check'),
(14, 'fa-remove'),
(15, 'fa-close'),
(16, 'fa-times'),
(17, 'fa-search-plus'),
(18, 'fa-search-minus'),
(19, 'fa-power-off'),
(20, 'fa-signal'),
(21, 'fa-gear'),
(22, 'fa-cog'),
(23, 'fa-trash-o'),
(24, 'fa-home'),
(25, 'fa-file-o'),
(26, 'fa-clock-o'),
(27, 'fa-road'),
(28, 'fa-download'),
(29, 'fa-arrow-circle-o-do'),
(30, 'fa-arrow-circle-o-up'),
(31, 'fa-inbox'),
(32, 'fa-play-circle-o'),
(33, 'fa-rotate-right'),
(34, 'fa-repeat'),
(35, 'fa-refresh'),
(36, 'fa-list-alt'),
(37, 'fa-lock'),
(38, 'fa-flag'),
(39, 'fa-headphones'),
(40, 'fa-volume-off'),
(41, 'fa-volume-down'),
(42, 'fa-volume-up'),
(43, 'fa-qrcode'),
(44, 'fa-barcode'),
(45, 'fa-tag'),
(46, 'fa-tags'),
(47, 'fa-book'),
(48, 'fa-bookmark'),
(49, 'fa-print f'),
(50, 'fa-camera'),
(51, 'fa-font'),
(52, 'fa-bold'),
(53, 'fa-italic'),
(54, 'fa-text-height'),
(55, 'fa-text-width'),
(56, 'fa-align-left'),
(57, 'fa-align-center'),
(58, 'fa-align-right'),
(59, 'fa-align-justify'),
(60, 'fa-list'),
(61, 'fa-dedent'),
(62, 'fa-outdent'),
(63, 'fa-indent'),
(64, 'fa-video-camera'),
(65, 'fa-photo'),
(66, 'fa-image'),
(67, 'fa-picture-o'),
(68, 'fa-pencil'),
(69, 'fa-map-marker'),
(70, 'fa-adjust'),
(71, 'fa-tint'),
(72, 'fa-edit'),
(73, 'fa-pencil-square-o'),
(74, 'fa-share-square-o'),
(75, 'fa-check-square-o'),
(76, 'fa-arrows'),
(77, 'fa-step-backward'),
(78, 'fa-fast-backward'),
(79, 'fa-backward'),
(80, 'fa-play'),
(81, 'fa-pause'),
(82, 'fa-stop'),
(83, 'fa-forward'),
(84, 'fa-fast-forward'),
(85, 'fa-step-forward'),
(86, 'fa-eject'),
(87, 'fa-chevron-left'),
(88, 'fa-chevron-right'),
(89, 'fa-plus-circle'),
(90, 'fa-minus-circle'),
(91, 'fa-times-circle'),
(92, 'fa-check-circle'),
(93, 'fa-question-circle'),
(94, 'fa-info-circle'),
(95, 'fa-crosshairs'),
(96, 'fa-times-circle-o'),
(97, 'fa-check-circle-o'),
(98, 'fa-ban'),
(99, 'fa-arrow-left'),
(100, 'fa-arrow-right'),
(101, 'fa-arrow-up'),
(102, 'fa-arrow-down'),
(103, 'fa-mail-forward'),
(104, 'fa-share'),
(105, 'fa-expand'),
(106, 'fa-compress'),
(107, 'fa-plus'),
(108, 'fa-minus'),
(109, 'fa-asterisk'),
(110, 'fa-exclamation-circl'),
(111, 'fa-gift'),
(112, 'fa-leaf'),
(113, 'fa-fire'),
(114, 'fa-eye'),
(115, 'fa-eye-slash'),
(116, 'fa-warning'),
(117, 'fa-exclamation-trian'),
(118, 'fa-plane'),
(119, 'fa-calendar'),
(120, 'fa-random'),
(121, 'fa-comment'),
(122, 'fa-magnet'),
(123, 'fa-chevron-up'),
(124, 'fa-chevron-down'),
(125, 'fa-retweet'),
(126, 'fa-shopping-cart'),
(127, 'fa-folder'),
(128, 'fa-folder-open'),
(129, 'fa-arrows-v'),
(130, 'fa-arrows-h'),
(131, 'fa-bar-chart-o'),
(132, 'fa-bar-chart'),
(133, 'fa-twitter-square'),
(134, 'fa-facebook-square'),
(135, 'fa-camera-retro'),
(136, 'fa-key'),
(137, 'fa-gears'),
(138, 'fa-cogs'),
(139, 'fa-comments'),
(140, 'fa-thumbs-o-up'),
(141, 'fa-thumbs-o-down'),
(142, 'fa-star-half'),
(143, 'fa-heart-o'),
(144, 'fa-sign-out'),
(145, 'fa-linkedin-square'),
(146, 'fa-thumb-tack'),
(147, 'fa-external-link'),
(148, 'fa-sign-in'),
(149, 'fa-trophy'),
(150, 'fa-github-square'),
(151, 'fa-upload'),
(152, 'fa-lemon-o'),
(153, 'fa-phone'),
(154, 'fa-square-o'),
(155, 'fa-bookmark-o'),
(156, 'fa-phone-square'),
(157, 'fa-twitter'),
(158, 'fa-facebook-f'),
(159, 'fa-facebook'),
(160, 'fa-github'),
(161, 'fa-unlock'),
(162, 'fa-credit-card'),
(163, 'fa-rss'),
(164, 'fa-hdd-o'),
(165, 'fa-bullhorn'),
(166, 'fa-bell'),
(167, 'fa-certificate'),
(168, 'fa-hand-o-right'),
(169, 'fa-hand-o-left'),
(170, 'fa-hand-o-up'),
(171, 'fa-hand-o-down'),
(172, 'fa-arrow-circle-left'),
(173, 'fa-arrow-circle-righ'),
(174, 'fa-arrow-circle-up'),
(175, 'fa-arrow-circle-down'),
(176, 'fa-globe'),
(177, 'fa-wrench'),
(178, 'fa-tasks'),
(179, 'fa-filter'),
(180, 'fa-briefcase'),
(181, 'fa-arrows-alt'),
(182, 'fa-group'),
(183, 'fa-users'),
(184, 'fa-chain'),
(185, 'fa-link'),
(186, 'fa-cloud'),
(187, 'fa-flask'),
(188, 'fa-cut'),
(189, 'fa-scissors'),
(190, 'fa-copy'),
(191, 'fa-files-o'),
(192, 'fa-paperclip'),
(193, 'fa-save'),
(194, 'fa-floppy-o'),
(195, 'fa-square'),
(196, 'fa-navicon'),
(197, 'fa-reorder'),
(198, 'fa-bars'),
(199, 'fa-list-ul'),
(200, 'fa-list-ol'),
(201, 'fa-strikethrough'),
(202, 'fa-underline'),
(203, 'fa-table'),
(204, 'fa-magic'),
(205, 'fa-truck'),
(206, 'fa-pinterest'),
(207, 'fa-pinterest-square'),
(208, 'fa-google-plus-squar'),
(209, 'fa-google-plus'),
(210, 'fa-money'),
(211, 'fa-caret-down'),
(212, 'fa-caret-up'),
(213, 'fa-caret-left'),
(214, 'fa-caret-right'),
(215, 'fa-columns'),
(216, 'fa-unsorted'),
(217, 'fa-sort'),
(218, 'fa-sort-down'),
(219, 'fa-sort-desc'),
(220, 'fa-sort-up'),
(221, 'fa-sort-asc'),
(222, 'fa-envelope'),
(223, 'fa-linkedin'),
(224, 'fa-rotate-left'),
(225, 'fa-undo'),
(226, 'fa-legal'),
(227, 'fa-gavel'),
(228, 'fa-dashboard'),
(229, 'fa-tachometer'),
(230, 'fa-comment-o'),
(231, 'fa-comments-o'),
(232, 'fa-flash'),
(233, 'fa-bolt'),
(234, 'fa-sitemap'),
(235, 'fa-umbrella'),
(236, 'fa-paste'),
(237, 'fa-clipboard'),
(238, 'fa-lightbulb-o'),
(239, 'fa-exchange'),
(240, 'fa-cloud-download'),
(241, 'fa-cloud-upload'),
(242, 'fa-user-md'),
(243, 'fa-stethoscope'),
(244, 'fa-suitcase'),
(245, 'fa-bell-o'),
(246, 'fa-coffee'),
(247, 'fa-cutlery'),
(248, 'fa-file-text-o'),
(249, 'fa-building-o'),
(250, 'fa-hospital-o'),
(251, 'fa-ambulance'),
(252, 'fa-medkit'),
(253, 'fa-fighter-jet'),
(254, 'fa-beer'),
(255, 'fa-h-square'),
(256, 'fa-plus-square'),
(257, 'fa-angle-double-left'),
(258, 'fa-angle-double-righ'),
(259, 'fa-angle-double-up'),
(260, 'fa-angle-double-down'),
(261, 'fa-angle-left'),
(262, 'fa-angle-right'),
(263, 'fa-angle-up'),
(264, 'fa-angle-down'),
(265, 'fa-desktop'),
(266, 'fa-laptop'),
(267, 'fa-tablet'),
(268, 'fa-mobile-phone'),
(269, 'fa-mobile'),
(270, 'fa-circle-o'),
(271, 'fa-quote-left'),
(272, 'fa-quote-right'),
(273, 'fa-spinner'),
(274, 'fa-circle'),
(275, 'fa-mail-reply'),
(276, 'fa-reply'),
(277, 'fa-github-alt'),
(278, 'fa-folder-o'),
(279, 'fa-folder-open-o'),
(280, 'fa-smile-o'),
(281, 'fa-frown-o'),
(282, 'fa-meh-o'),
(283, 'fa-gamepad'),
(284, 'fa-keyboard-o'),
(285, 'fa-flag-o'),
(286, 'fa-flag-checkered'),
(287, 'fa-terminal'),
(288, 'fa-code'),
(289, 'fa-mail-reply-all'),
(290, 'fa-reply-all'),
(291, 'fa-star-half-empty'),
(292, 'fa-star-half-full'),
(293, 'fa-star-half-o'),
(294, 'fa-location-arrow'),
(295, 'fa-crop'),
(296, 'fa-code-fork'),
(297, 'fa-unlink'),
(298, 'fa-chain-broken'),
(299, 'fa-question'),
(300, 'fa-info'),
(301, 'fa-exclamation'),
(302, 'fa-superscript'),
(303, 'fa-subscript'),
(304, 'fa-eraser'),
(305, 'fa-puzzle-piece'),
(306, 'fa-microphone'),
(307, 'fa-microphone-slash'),
(308, 'fa-shield'),
(309, 'fa-calendar-o'),
(310, 'fa-fire-extinguisher'),
(311, 'fa-rocket'),
(312, 'fa-maxcdn'),
(313, 'fa-chevron-circle-le'),
(314, 'fa-chevron-circle-ri'),
(315, 'fa-chevron-circle-up'),
(316, 'fa-chevron-circle-do'),
(317, 'fa-html5'),
(318, 'fa-css3'),
(319, 'fa-anchor'),
(320, 'fa-unlock-alt'),
(321, 'fa-bullseye'),
(322, 'fa-ellipsis-h'),
(323, 'fa-ellipsis-v'),
(324, 'fa-rss-square'),
(325, 'fa-play-circle'),
(326, 'fa-ticket'),
(327, 'fa-minus-square'),
(328, 'fa-minus-square-o'),
(329, 'fa-level-up'),
(330, 'fa-level-down'),
(331, 'fa-check-square'),
(332, 'fa-pencil-square'),
(333, 'fa-external-link-squ'),
(334, 'fa-share-square'),
(335, 'fa-compass'),
(336, 'fa-toggle-down'),
(337, 'fa-caret-square-o-do'),
(338, 'fa-toggle-up'),
(339, 'fa-caret-square-o-up'),
(340, 'fa-toggle-right'),
(341, 'fa-caret-square-o-ri'),
(342, 'fa-euro'),
(343, 'fa-eur'),
(344, 'fa-gbp'),
(345, 'fa-dollar'),
(346, 'fa-usd'),
(347, 'fa-rupee'),
(348, 'fa-inr'),
(349, 'fa-cny'),
(350, 'fa-rmb'),
(351, 'fa-yen'),
(352, 'fa-jpy'),
(353, 'fa-ruble'),
(354, 'fa-rouble'),
(355, 'fa-rub'),
(356, 'fa-won'),
(357, 'fa-krw'),
(358, 'fa-bitcoin'),
(359, 'fa-btc'),
(360, 'fa-file'),
(361, 'fa-file-text'),
(362, 'fa-sort-alpha-asc'),
(363, 'fa-sort-alpha-desc'),
(364, 'fa-sort-amount-asc'),
(365, 'fa-sort-amount-desc'),
(366, 'fa-sort-numeric-asc'),
(367, 'fa-sort-numeric-desc'),
(368, 'fa-thumbs-up'),
(369, 'fa-thumbs-down'),
(370, 'fa-youtube-square'),
(371, 'fa-youtube'),
(372, 'fa-xing'),
(373, 'fa-xing-square'),
(374, 'fa-youtube-play'),
(375, 'fa-dropbox'),
(376, 'fa-stack-overflow'),
(377, 'fa-instagram'),
(378, 'fa-flickr'),
(379, 'fa-adn'),
(380, 'fa-bitbucket'),
(381, 'fa-bitbucket-square'),
(382, 'fa-tumblr'),
(383, 'fa-tumblr-square'),
(384, 'fa-long-arrow-down'),
(385, 'fa-long-arrow-up'),
(386, 'fa-long-arrow-left'),
(387, 'fa-long-arrow-right'),
(388, 'fa-apple'),
(389, 'fa-windows'),
(390, 'fa-android'),
(391, 'fa-linux'),
(392, 'fa-dribbble'),
(393, 'fa-skype'),
(394, 'fa-foursquare'),
(395, 'fa-trello'),
(396, 'fa-female'),
(397, 'fa-male'),
(398, 'fa-gittip'),
(399, 'fa-gratipay'),
(400, 'fa-sun-o'),
(401, 'fa-moon-o'),
(402, 'fa-archive'),
(403, 'fa-bug'),
(404, 'fa-vk'),
(405, 'fa-weibo'),
(406, 'fa-renren'),
(407, 'fa-pagelines'),
(408, 'fa-stack-exchange'),
(409, 'fa-arrow-circle-o-ri'),
(410, 'fa-arrow-circle-o-le'),
(411, 'fa-toggle-left'),
(412, 'fa-caret-square-o-le'),
(413, 'fa-dot-circle-o'),
(414, 'fa-wheelchair'),
(415, 'fa-vimeo-square'),
(416, 'fa-turkish-lira'),
(417, 'fa-try'),
(418, 'fa-plus-square-o'),
(419, 'fa-space-shuttle'),
(420, 'fa-slack'),
(421, 'fa-envelope-square'),
(422, 'fa-wordpress'),
(423, 'fa-openid'),
(424, 'fa-institution'),
(425, 'fa-bank'),
(426, 'fa-university'),
(427, 'fa-mortar-board'),
(428, 'fa-graduation-cap'),
(429, 'fa-yahoo'),
(430, 'fa-google'),
(431, 'fa-reddit'),
(432, 'fa-reddit-square'),
(433, 'fa-stumbleupon-circl'),
(434, 'fa-stumbleupon'),
(435, 'fa-delicious'),
(436, 'fa-digg'),
(437, 'fa-pied-piper'),
(438, 'fa-pied-piper-alt'),
(439, 'fa-drupal'),
(440, 'fa-joomla'),
(441, 'fa-language'),
(442, 'fa-fax'),
(443, 'fa-building'),
(444, 'fa-child'),
(445, 'fa-paw'),
(446, 'fa-spoon'),
(447, 'fa-cube'),
(448, 'fa-cubes'),
(449, 'fa-behance'),
(450, 'fa-behance-square'),
(451, 'fa-steam'),
(452, 'fa-steam-square'),
(453, 'fa-recycle'),
(454, 'fa-automobile'),
(455, 'fa-car'),
(456, 'fa-cab'),
(457, 'fa-taxi'),
(458, 'fa-tree'),
(459, 'fa-spotify'),
(460, 'fa-deviantart'),
(461, 'fa-soundcloud'),
(462, 'fa-database'),
(463, 'fa-file-pdf-o'),
(464, 'fa-file-word-o'),
(465, 'fa-file-excel-o'),
(466, 'fa-file-powerpoint-o'),
(467, 'fa-file-photo-o'),
(468, 'fa-file-picture-o'),
(469, 'fa-file-image-o'),
(470, 'fa-file-zip-o'),
(471, 'fa-file-archive-o'),
(472, 'fa-file-sound-o'),
(473, 'fa-file-audio-o'),
(474, 'fa-file-movie-o'),
(475, 'fa-file-video-o'),
(476, 'fa-file-code-o'),
(477, 'fa-vine'),
(478, 'fa-codepen'),
(479, 'fa-jsfiddle'),
(480, 'fa-life-bouy'),
(481, 'fa-life-buoy'),
(482, 'fa-life-saver'),
(483, 'fa-support'),
(484, 'fa-life-ring'),
(485, 'fa-circle-o-notch'),
(486, 'fa-ra'),
(487, 'fa-rebel'),
(488, 'fa-ge'),
(489, 'fa-empire'),
(490, 'fa-git-square'),
(491, 'fa-git'),
(492, 'fa-hacker-news'),
(493, 'fa-tencent-weibo'),
(494, 'fa-qq'),
(495, 'fa-wechat'),
(496, 'fa-weixin'),
(497, 'fa-send'),
(498, 'fa-paper-plane'),
(499, 'fa-send-o'),
(500, 'fa-paper-plane-o'),
(501, 'fa-history'),
(502, 'fa-genderless'),
(503, 'fa-circle-thin'),
(504, 'fa-header'),
(505, 'fa-paragraph'),
(506, 'fa-sliders'),
(507, 'fa-share-alt'),
(508, 'fa-share-alt-square'),
(509, 'fa-bomb'),
(510, 'fa-soccer-ball-o'),
(511, 'fa-futbol-o'),
(512, 'fa-tty'),
(513, 'fa-binoculars'),
(514, 'fa-plug'),
(515, 'fa-slideshare'),
(516, 'fa-twitch'),
(517, 'fa-yelp'),
(518, 'fa-newspaper-o'),
(519, 'fa-wifi'),
(520, 'fa-calculator'),
(521, 'fa-paypal'),
(522, 'fa-google-wallet'),
(523, 'fa-cc-visa'),
(524, 'fa-cc-mastercard'),
(525, 'fa-cc-discover'),
(526, 'fa-cc-amex'),
(527, 'fa-cc-paypal'),
(528, 'fa-cc-stripe'),
(529, 'fa-bell-slash'),
(530, 'fa-bell-slash-o'),
(531, 'fa-trash'),
(532, 'fa-copyright'),
(533, 'fa-at'),
(534, 'fa-eyedropper'),
(535, 'fa-paint-brush'),
(536, 'fa-birthday-cake'),
(537, 'fa-area-chart'),
(538, 'fa-pie-chart'),
(539, 'fa-line-chart'),
(540, 'fa-lastfm'),
(541, 'fa-lastfm-square'),
(542, 'fa-toggle-off'),
(543, 'fa-toggle-on'),
(544, 'fa-bicycle'),
(545, 'fa-bus'),
(546, 'fa-ioxhost'),
(547, 'fa-angellist'),
(548, 'fa-cc za'),
(549, 'fa-shekel'),
(550, 'fa-sheqel'),
(551, 'fa-ils'),
(552, 'fa-meanpath'),
(553, 'fa-buysellads'),
(554, 'fa-connectdevelop'),
(555, 'fa-dashcube'),
(556, 'fa-forumbee'),
(557, 'fa-leanpub'),
(558, 'fa-sellsy'),
(559, 'fa-shirtsinbulk'),
(560, 'fa-simplybuilt'),
(561, 'fa-skyatlas'),
(562, 'fa-cart-plus'),
(563, 'fa-cart-arrow-down'),
(564, 'fa-diamond'),
(565, 'fa-ship'),
(566, 'fa-user-secret'),
(567, 'fa-motorcycle'),
(568, 'fa-street-view'),
(569, 'fa-heartbeat'),
(570, 'fa-venus'),
(571, 'fa-mars'),
(572, 'fa-mercury'),
(573, 'fa-transgender'),
(574, 'fa-transgender-alt'),
(575, 'fa-venus-double'),
(576, 'fa-mars-double'),
(577, 'fa-venus-mars'),
(578, 'fa-mars-stroke'),
(579, 'fa-mars-stroke-v'),
(580, 'fa-mars-stroke-h'),
(581, 'fa-neuter'),
(582, 'fa-facebook-official'),
(583, 'fa-pinterest-p'),
(584, 'fa-whatsapp'),
(585, 'fa-server'),
(586, 'fa-user-plus'),
(587, 'fa-user-times'),
(588, 'fa-hotel'),
(589, 'fa-bed'),
(590, 'fa-viacoin'),
(591, 'fa-train'),
(592, 'fa-subway'),
(593, 'fa-medium');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `active`) VALUES
(1, 'Makanan', 1),
(2, 'Minuman', 1),
(3, 'ATK', 1),
(4, 'Sabun', 1),
(5, 'Shampo', 1),
(6, 'Mainan Bayi', 1),
(7, 'Susu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `level_customer`
--

CREATE TABLE `level_customer` (
  `id` int(11) NOT NULL,
  `nama_level` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_customer`
--

INSERT INTO `level_customer` (`id`, `nama_level`, `is_active`) VALUES
(1, 'konsumen', 1),
(2, 'Retail', 1),
(3, 'Grosir', 1);

-- --------------------------------------------------------

--
-- Table structure for table `level_diskon`
--

CREATE TABLE `level_diskon` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `id_level_customer` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_diskon`
--

INSERT INTO `level_diskon` (`id`, `id_product`, `quantity`, `discount`, `tanggal_mulai`, `tanggal_selesai`, `id_level_customer`, `is_active`) VALUES
(1, 10001, 3000, 3000, '0000-00-00', '0000-00-00', 1, 1),
(2, 10001, 3000, 3000, '0000-00-00', '0000-00-00', 2, 1),
(3, 10001, 3000, 500, '0000-00-00', '0000-00-00', 3, 1),
(4, 10002, 12000, 12000, '0000-00-00', '0000-00-00', 1, 1),
(5, 10002, 11800, 11800, '0000-00-00', '0000-00-00', 2, 1),
(6, 10002, 11500, 11500, '0000-00-00', '0000-00-00', 3, 1),
(7, 10003, 11900, 11900, '0000-00-00', '0000-00-00', 1, 1),
(8, 10003, 11500, 11500, '0000-00-00', '0000-00-00', 2, 1),
(9, 10003, 11000, 11000, '0000-00-00', '0000-00-00', 3, 1),
(10, 10003, 6500, 6500, '0000-00-00', '0000-00-00', 1, 1),
(11, 10003, 6250, 6250, '0000-00-00', '0000-00-00', 2, 1),
(12, 10003, 6000, 6000, '0000-00-00', '0000-00-00', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `id` int(11) NOT NULL,
  `nama_merek` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`id`, `nama_merek`, `is_active`) VALUES
(1, 'Life Bouy', 1),
(2, 'Paperline', 1),
(3, 'Snowman', 1),
(4, 'Superstar', 1),
(5, 'Garuda', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nomor_po`
--

CREATE TABLE `nomor_po` (
  `id` int(11) NOT NULL,
  `nomor_po` varchar(128) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `faktur_in` varchar(128) NOT NULL,
  `tanggal_in` date NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `no_po` varchar(128) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `surat_jalan` varchar(128) NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pembelian` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `faktur_in`, `tanggal_in`, `jatuh_tempo`, `no_po`, `id_suplier`, `surat_jalan`, `total_item`, `total_harga`, `potongan`, `id_user`, `status_pembelian`) VALUES
(1, 'PB19110001', '2019-11-28', '2019-11-28', '', 0, '', 0, 0, 25000, 0, 'Hutang'),
(6, 'PB19110002', '2019-11-28', '2019-11-28', '', 0, '', 0, 0, 250000, 0, 'Pending'),
(7, 'PB19110003', '2019-11-28', '2019-11-28', '', 0, '', 0, 0, 0, 0, 'Pending'),
(8, 'PB19110004', '2019-11-28', '2019-11-28', '', 0, '', 0, 0, 20000, 0, 'Pending'),
(9, 'PB19110005', '2019-11-30', '2019-11-30', '', 0, '', 0, 0, 250000, 0, 'Pending'),
(10, 'PB19110006', '2019-11-30', '2019-11-30', '', 0, '', 0, 0, 0, 0, 'Pending'),
(11, 'PB19120001', '2019-12-11', '2019-12-11', '', 0, '', 0, 0, 750000, 0, 'Pending'),
(12, 'PB19120002', '2019-12-12', '2019-12-12', '', 0, '', 0, 0, 0, 0, 'Pending'),
(13, 'PB19120003', '2019-12-24', '2019-12-24', '', 0, '', 0, 0, 0, 0, 'Pending'),
(14, 'PB19120004', '2019-12-24', '2019-12-24', '', 0, '', 0, 0, 0, 0, 'Pending'),
(15, 'PB19120005', '2019-12-24', '2019-12-24', '', 0, '', 0, 0, 0, 0, 'Pending'),
(16, 'PB20010001', '2020-01-18', '2020-01-18', '', 0, '', 0, 0, 0, 0, 'Pending'),
(17, 'PB20010002', '2020-01-18', '2020-01-18', '', 0, '', 0, 0, 0, 0, 'Pending'),
(18, 'PB21040001', '2021-04-16', '2021-04-16', '', 0, '', 0, 0, 500000, 0, 'Pending'),
(19, 'PB21040002', '2021-04-16', '2021-04-16', '', 0, '', 0, 0, 0, 0, 'Pending'),
(20, 'PB22020001', '2022-02-23', '2022-02-23', '', 0, '', 0, 0, 0, 0, 'Pending'),
(21, 'PB22030001', '2022-03-13', '2022-03-13', '', 0, '', 0, 0, 0, 0, 'Pending'),
(22, 'PB22030002', '2022-03-13', '2022-03-13', '', 0, '', 0, 0, 0, 0, 'Pending'),
(23, 'PB22030003', '2022-03-13', '2022-03-13', '', 0, '', 0, 0, 0, 0, 'Pending'),
(24, 'PB22030004', '2022-03-13', '2022-03-13', '', 0, '', 0, 0, 0, 0, 'Pending'),
(25, 'PB22050001', '2022-05-31', '2022-05-31', '', 0, '', 0, 0, 0, 0, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `nama_satuan`, `active`) VALUES
(1, 'Dos', 1),
(2, 'Pak', 1),
(3, 'Pcs', 1),
(4, 'Sak', 1),
(5, 'Lembar ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_subkategori` varchar(50) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kategori`
--

INSERT INTO `sub_kategori` (`id`, `id_kategori`, `nama_subkategori`, `active`) VALUES
(1, 4, 'Sabun Cair', 1),
(2, 4, 'Sabun Batang', 1),
(3, 4, 'Sabun Cuci', 1),
(4, 3, 'Nota Kontan', 1),
(5, 3, 'Spidol', 1),
(6, 1, 'Wafer', 1),
(7, 1, 'Snack', 1),
(9, 2, 'Teh Pucuk harum', 1),
(10, 3, 'Pemggorok Pencil', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id` int(11) NOT NULL,
  `kode_suplier` varchar(50) NOT NULL,
  `nama_suplier` varchar(128) NOT NULL,
  `alamat_suplier` varchar(128) NOT NULL,
  `telephone_suplier` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id`, `kode_suplier`, `nama_suplier`, `alamat_suplier`, `telephone_suplier`, `is_active`) VALUES
(1, 'SUP001', 'Suplier Sabun', 'Kota Palu', '081xxx', 1),
(2, 'SUP002', 'Garuda Food', 'Jl. Igusti Ngurarari No.25', '0819887748485855', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bpjs`
--

CREATE TABLE `tb_bpjs` (
  `id_bpjs` int(11) NOT NULL,
  `kode_bpjs` varchar(50) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `ket_bpjs` varchar(50) NOT NULL,
  `total_orang` int(11) NOT NULL,
  `total_bpjs` int(11) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'pending',
  `id_usr` int(11) NOT NULL,
  `date_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bpjs`
--

INSERT INTO `tb_bpjs` (`id_bpjs`, `kode_bpjs`, `bulan`, `tahun`, `ket_bpjs`, `total_orang`, `total_bpjs`, `status`, `id_usr`, `date_update`) VALUES
(14, 'IUR-BPJS/0001', 1, 2022, 'JANUARI 2022', 6, 1088750, 'selesai', 1, 1647152116),
(15, 'IUR-BPJS/0002', 2, 2022, 'FEBRUARI 2022', 5, 764750, 'selesai', 1, 1645789979);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id_gaji` int(11) NOT NULL,
  `kode_gaji` varchar(20) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `jumlah_kry` int(11) NOT NULL,
  `total_upah` int(20) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'pending',
  `id_mengetahui` int(11) NOT NULL,
  `ket_gajian` varchar(50) NOT NULL,
  `date_update` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`id_gaji`, `kode_gaji`, `bulan`, `tahun`, `jumlah_kry`, `total_upah`, `status`, `id_mengetahui`, `ket_gajian`, `date_update`, `id_user`) VALUES
(16, 'UPH-0001', 1, 2022, 0, 0, 'pending', 1, 'Gaji Januari 2022', 1647184229, 1),
(17, 'UPH-0001', 2, 2022, 0, 0, 'pending', 1, 'Gaji Januari 2022', 1653960867, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gajian`
--

CREATE TABLE `tb_gajian` (
  `id_gajian` int(11) NOT NULL,
  `kode_gajian` varchar(50) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `ket_gajian` varchar(50) NOT NULL,
  `total_terima` int(11) NOT NULL,
  `total_potongan` int(11) NOT NULL,
  `total_gajian` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gajian`
--

INSERT INTO `tb_gajian` (`id_gajian`, `kode_gajian`, `bulan`, `tahun`, `ket_gajian`, `total_terima`, `total_potongan`, `total_gajian`, `status`, `id_user`, `date_update`) VALUES
(7, 'UPH-0001', 2, 2022, 'Gaji Februari 2022', 0, 0, 0, 0, 1, 1645008473);

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(32) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `jk_karyawan` varchar(10) NOT NULL,
  `jabatan_karyawan` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama_karyawan` varchar(15) NOT NULL,
  `status_pernikahan` varchar(20) NOT NULL,
  `telp_karyawan` varchar(15) NOT NULL,
  `email_karyawan` varchar(30) NOT NULL,
  `foto_karyawan` varchar(100) NOT NULL,
  `alamat_karyawan` varchar(100) NOT NULL,
  `npwp_karyawan` varchar(15) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `berijazah` varchar(20) NOT NULL,
  `rekening` varchar(128) NOT NULL,
  `id_status` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `id_absensi` int(11) NOT NULL,
  `url_img` varchar(250) NOT NULL,
  `aktif` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `jk_karyawan`, `jabatan_karyawan`, `tempat_lahir`, `tanggal_lahir`, `agama_karyawan`, `status_pernikahan`, `telp_karyawan`, `email_karyawan`, `foto_karyawan`, `alamat_karyawan`, `npwp_karyawan`, `pendidikan`, `berijazah`, `rekening`, `id_status`, `tanggal_masuk`, `id_absensi`, `url_img`, `aktif`) VALUES
(1, '7271031705610003', 'Antonius Lele', 'L', 'Pimpinan', 'Ende', '1961-05-17', 'Katolik', 'K3', '081 242 260 689', 'antoniuslele7@gmail.com', 'img_1510925528.jpg', 'Jl. Zebra 1 No.25 , Kota Palu', '749812988831000', 'SMA', 'No', '1510010604749', 1, '2004-03-03', 1, 'http://localhost/rest-karyawan/assets/img/', 1),
(2, '7210140505790003', 'Budi Harto', 'L', 'Administrasi', 'Palu', '1979-05-05', 'Islam', 'K2', '081 354 380 434', 'budhi.hrt82@gmail.com', 'img_1511081145.jpg', 'Btn Bumi Tinggede Indah 3 Blok B No.14 Kec. Marawola, Kab.Sigi', '749354932831000', 'SMP', 'Yes', '1510010604822', 1, '2004-08-08', 8, 'http://localhost/rest-karyawan/assets/img/', 1),
(3, '7271020210770005', 'Muhlis Kadir Laharijo', 'L', 'Sales', 'Palu', '1977-10-02', 'Islam', 'K3', '082 347 248 227', 'muhliskadir@yahoo.com', 'img_1513085050.jpg', 'Jl. Beringin No. 60 A', '749923983831000', 'SMA', 'Ada', '0', 3, '2003-03-15', 5, 'http://localhost/rest-karyawan/assets/img/', 2),
(4, '7271034107790002', 'Mashita Habibu', 'P', 'Penagihan', 'Palu', '1979-05-27', 'Islam', 'K1', '085 241 176 686', 'belum ada', 'img_1513084653.jpg', 'Jl. Beringin No. 60 A', '467822029831000', 'SMA', 'Ada', '0', 1, '2007-02-06', 3, 'http://localhost/rest-karyawan/assets/img/', 1),
(5, '7210081904920002', 'Galuh Tristrianto Utomo', 'L', 'Sales', 'Palu', '1992-04-19', 'Islam', 'TK', '082 213 001 061', 'galutristrianto@yahoo.com', 'img_1511614620.jpg', 'Kalawara, Gumbasa', '769367665831000', 'SMA', 'Ada', '0', 1, '2015-04-15', 50, 'http://localhost/rest-karyawan/assets/img/', 1),
(6, '7271 0301 0159 0007', 'Udi', 'L', 'Mekanik', 'Palu', '1959-01-01', 'Islam', 'TK', '082 195 421 490', 'udiudin97@gmail.com', 'img_1537334514.jpg', 'Jl. Zebra 1A No.93', '0', '0', 'Tidak Ada', '0', 1, '2006-03-15', 30, 'http://localhost/rest-karyawan/assets/img/', 1),
(7, '7210010207870001', 'Adrianus', 'L', 'Helper', 'Flores', '1987-07-02', 'Katolik', 'K1', '085 242 435 286', 'adrianus790@gmail.com', 'img_1514256807.jpg', 'Bulupontu Jaya Sidera', '749854626831000', 'SMA', 'Yes', '1510010604707', 1, '2014-08-01', 43, 'http://localhost/rest-karyawan/assets/img/', 1),
(8, '7203112005710004', 'Ahir', 'L', 'Driver', 'Tolongano', '1971-05-20', 'Islam', 'K2', '085 298 185 016', 'ahirahir088@gmail.com', 'img_1537260847.jpg', 'Dampal, Kec Sirenja', '769367756831000', 'SMA', 'Yes', '1510010604616', 3, '2010-10-01', 27, 'http://localhost/rest-karyawan/assets/img/', 2),
(11, '7210091901890001', 'Faisal', 'L', 'Salesman', 'Walatana', '1989-01-19', 'Islam', 'TK', '082 158 301 346', 'isalfaisal82@yahoo.com', 'img_1511081346.jpg', 'Jl. Poros Palu-Bangga, Walatana, Dolo', '753275593831000', 'SMA', 'Yes', '0', 1, '2014-05-01', 41, 'http://localhost/rest-karyawan/assets/img/', 1),
(12, '7271036903840003', 'Umi Baroro', 'P', 'Administrasi', 'klaten', '1984-03-29', 'Islam', 'K2', '085 298 708 462', '-', 'img_1511071350.jpg', 'Jl. Ongka Malino No. 14', '0', 'SMA', 'Tidak Ada', '0', 1, '2010-05-01', 4, 'http://localhost/rest-karyawan/assets/img/', 1),
(13, '7271 0344 0877 0003', 'Nurlina Abd Halim', 'P', 'Administrasi', 'Toli -Toli', '1977-08-04', 'Islam', 'K1', '081 341 477 548', '-', 'img_1511071268.jpg', 'Jl. HM. Soeharto Perum Vena Garden Blok B No 3', '0', 'SMA', 'Ada', '0', 1, '2003-04-01', 2, 'http://localhost/rest-karyawan/assets/img/', 1),
(14, '7208 0306 0591 0001', 'Moh. Rifai', 'L', 'Sales', 'Palu', '1991-05-06', 'Islam', 'TK', '085 395 944 504', 'rifaimoh128@gmail.com', 'img_1514261744.jpg', 'BTN Palupi Blok NB No.5, Palupi', '749924189831000', 'SMA', 'Ada', '0', 3, '2013-07-10', 36, 'http://localhost/rest-karyawan/assets/img/', 2),
(15, '7271032704710006', 'Raflin Laindjong', 'L', 'Sales', 'Palu', '1971-04-27', 'Islam', 'K3', '081 354 380 434', 'raflinlaindjong@yahoo.com', 'img_1512564607.jpg', 'Jl. Dewi Sartika Lrg. 2 No. 23 D', '749923330831000', 'SMA', 'Ada', '0', 1, '2004-03-22', 15, 'http://localhost/rest-karyawan/assets/img/', 1),
(16, '7271012602650001', 'Paulus Bambang Yuwono', 'L', 'Sales', 'Batu Malang', '1965-02-26', 'Katolik', 'K2', '085 395 781 386', 'paulusbambang949@yahoo.com', 'img_1514261829.jpg', 'BTN Pesona Teluk Palu Blok B1 No. 5, Tondo, Palu', '749923538831000', 'SMA', 'Tidak Ada (Hilang)', '0', 1, '2012-03-01', 29, 'http://localhost/rest-karyawan/assets/img/', 1),
(18, '7271012109760006', 'Fachrudin', 'L', 'Sales', 'Palu', '1976-09-21', 'Islam', 'K3', '085 241 968 595', 'u.fachrudin@yahoo.com', 'img_1537260886.jpg', 'Jl. S Parman II No. 17 E, Palu Timur', '169921426831000', 'SMA', 'Ada', '0', 1, '2009-05-15', 11, 'http://localhost/rest-karyawan/assets/img/', 1),
(21, '7271030305690005', 'Sugianto', 'L', 'Sales', 'Palu', '1969-05-03', 'Islam', 'K2', '085 256 652 221', 'sugiantonto495@gmail.com', 'img_1514262056.jpg', 'Jl. Zebra 1 A No. 61 Palu', '476975321831000', 'SMA', 'Ada', '0', 3, '2004-08-15', 6, 'http://localhost/rest-karyawan/assets/img/', 2),
(22, '7210080511850002', 'Dudi Frengki Karyono', 'L', 'Driver', 'Kalawara', '1985-11-05', 'Kristen', 'K1', '081 342 310 488', 'dudifrengk@yahoo.com', 'img_1517301769.jpg', 'Dusun 3, Kalawara, Gumbasa', '749812483831000', 'SMA', 'No', '0', 1, '2011-10-01', 28, 'http://localhost/rest-karyawan/assets/img/', 1),
(25, '7208201206920002', 'Randi', 'L', 'Sales', 'Jononunu', '1992-06-10', 'Islam', 'TK', '085 397 338 966', 'randirandi558@yahoo.com', 'img_1515226097.jpg', 'Jononunu, Parigi Tengah', '749854717831000', 'SMA', 'Ada', '0', 1, '2014-07-01', 42, 'http://localhost/rest-karyawan/assets/img/', 1),
(26, '7271011807680001', 'Hengky Hendry Singal', 'L', 'Driver', 'Amurang', '1968-07-16', 'Katolik', 'K2', '085 823 455 303', 'hengkyhendry7@gmail.com', 'img_1514261725.jpg', 'Jl. Saweri Gading Raya No. 42 , Mantikulore', '724147707831000', 'SMA', 'Ada', '0', 1, '2007-04-02', 21, 'http://localhost/rest-karyawan/assets/img/', 1),
(27, '7208012704700002', 'Mansur Badja', 'L', 'Driver', 'Dolago', '1970-04-27', 'Islam', 'K3', '085 255 932 091', 'mansurbadja@gmail.com', 'img_1525857025.jpg', 'Desa Jononunu, Parigi Tengah', '749812806831000', 'SMA', 'Ada', '0', 1, '2006-04-06', 19, 'http://localhost/rest-karyawan/assets/img/', 1),
(28, '7210 0102 0280 0004', 'Sapri', 'L', 'Sales', 'Oloboju', '1980-02-02', 'Islam', 'K1', '082 393 513 399', 'saprisapri672@yahoo.com', 'img_1520499652.jpg', 'Jl. Trans Palu Palolo, Oloboju, Sigi', '749923025831000', 'SMA', 'Ada', '0', 1, '2012-07-01', 32, 'http://localhost/rest-karyawan/assets/img/', 1),
(29, '7271 0231 0872 0002', 'Rusdin', 'L', 'Sales Droping', 'Palu', '1972-08-31', 'Islam', 'K2', '085 394 934 344', 'rrusdin231@gmail.com', 'img_1523947890.jpg', 'Jl. Beringin Lrg. 1 No. 08 A', '769367590831000', 'SMA', 'Ada', '0', 1, '2008-02-26', 33, 'http://localhost/rest-karyawan/assets/img/', 1),
(30, '7271030912840004', 'Andri Dani Triawan', 'L', 'Driver', 'Palu', '1984-12-09', 'Kristen', 'K3', '085 240 181 258', 'adani6535@gmail.com', 'img_1517297255.jpg', 'Jl. Gereja No. 2 , Palu', '547638924831000', 'SMA', 'Yes', '1510010604558', 1, '2013-05-01', 35, 'http://localhost/rest-karyawan/assets/img/', 1),
(31, '7210011511860001', 'Irwan Hamka', 'L', 'Driver', 'Siwa', '1986-11-15', 'Islam', 'K1', '085 241 213 096', 'irwanhamka92@gmail.com', 'img_1514261761.jpg', 'Jl. Lasoso Lolu Sigi', '0', 'SMA', 'Ada', '0', 1, '2013-09-01', 37, 'http://localhost/rest-karyawan/assets/img/', 1),
(32, '7210 0803 0692 0002', 'Didi Juniawan', 'L', 'Sales', 'Palu', '1992-06-01', 'Kristen', 'K0', '082 393 534 778', 'didijuniawan@yahoo.com', 'img_1517366708.jpg', 'Dusun 3, Kalawara, Gumbasa', '749812400831000', 'SMA', 'Ada', '0', 1, '2010-09-01', 14, 'http://localhost/rest-karyawan/assets/img/', 1),
(33, '7271020102860002', 'Yofan', 'L', 'Sales', 'Palu', '1985-08-17', 'Islam', 'TK', '081 241 854 450', 'yofanyof@gmail.com', 'img_1517301988.jpg', 'Jl. Sumur Yuga No.4 Balaroa', '0', 'SMA', 'Ada', '0', 1, '2007-07-13', 23, 'http://localhost/rest-karyawan/assets/img/', 1),
(34, '7271022107840003', 'Yusuf Hemuto', 'L', 'Salesman', 'Popayato', '1984-07-20', 'Islam', 'K2', '082 189 517 757', '-', 'img_1513513313.jpg', 'Jl. Gunung Gawalise No. 225.B', '0', 'SMA', 'Tidak Ada', '0', 3, '2012-07-01', 31, 'http://localhost/rest-karyawan/assets/img/', 2),
(35, '7271 0206 1182 0003', 'Fikra', 'L', 'Salesman', 'Palu', '1982-11-06', 'Islam', 'K3', '082 293 883 765', 'fikraikra@yahoo.com', 'img_1513866540.jpg', 'Jl. Beringin No. 17 Palu', '749812665831000', 'SMA', 'Yes', '0', 1, '2008-06-05', 10, 'http://localhost/rest-karyawan/assets/img/', 1),
(37, '7271033007810005', 'Marsit', 'L', 'Salesman', 'Marantale', '1981-07-28', 'Islam', 'K2', '082 187 311 381', 'marsitmar900@gmail.com', 'img_1512094097.jpg', 'Jl. Anoa 1 Lorong Pelangi', '750168551831000', 'SMA', 'Ada', '0', 3, '2004-06-29', 7, 'http://localhost/rest-karyawan/assets/img/', 2),
(38, '7210011108780002', 'Vinsensius Ndolu', 'L', 'Driver', 'Palu', '1978-08-11', 'Katolik', 'TK', '081 243 912 436', 'vinsensiusndolu@gmail.com', 'img_1517301643.jpg', 'Desa Oloboju, Sigi', '0', '-', 'Tidak Ada', '0', 1, '2008-03-05', 25, 'http://localhost/rest-karyawan/assets/img/', 1),
(39, '7504022309640001', 'Yahya Hurudji', 'L', 'Driver', 'Palu', '1964-09-23', 'Islam', 'TK', '085 397 326 663', 'yahyahurudji@gmail.com', 'img_1520499172.jpg', 'Jl. Gunung Loli No. 37 A', '769368143831000', 'SMA', 'Tidak Ada', '0', 3, '2003-06-20', 18, 'http://localhost/rest-karyawan/assets/img/', 2),
(41, '7210011303830002', 'Arman', 'L', 'Driver', 'Makassar', '1983-03-13', 'Islam', 'K2', '081 242 368 552', 'armanbil@gmail.com', 'img_1514261679.jpg', 'Jl. Mutaji, Lolu', '749853289831000', 'SMA', 'Yes', '1510010631403', 1, '2007-09-01', 40, 'http://localhost/rest-karyawan/assets/img/', 1),
(42, '7271 0324 0877 0003', 'Sujarno', 'L', 'Driver', 'Blora', '1977-08-24', 'Islam', 'K1', '082 195 121 514', 'sujarno247@gmail.com', 'img_1515226368.jpg', 'Jl. Dewi Sartika No 234', '749807095831000', 'SMA', 'Ada', '0', 1, '2004-06-02', 16, 'http://localhost/rest-karyawan/assets/img/', 1),
(43, '7271021705640001', 'Bambang Wahyudi', 'L', 'Sales', 'Palu', '1964-05-17', 'Islam', 'K0', '081 341 308 677', 'bambangwahyudi28@yahoo.com', 'img_1522904812.jpg', 'Jl. Lasoso No. 27 Palu', '753275726831000', 'SMA', 'Yes', '1510010604806', 3, '2008-07-14', 26, 'http://localhost/rest-karyawan/assets/img/', 2),
(45, '7271 0323 0480 0003', 'Aswin', 'L', 'Driver', 'Palu', '1980-04-23', 'Islam', 'K1', '085 215 320 633', 'aswinaswin221@yahoo.com', 'img_1514263705.jpg', 'Jl. Kijang Utara III No. 3', '836143297831000', 'SMA', 'Yes', '0', 3, '2014-01-01', 48, 'http://localhost/rest-karyawan/assets/img/', 2),
(46, '7271031707800001', 'Safrudin Rasyd', 'L', 'Driver', 'Ende', '1980-07-15', 'Islam', 'K2', '081 289 177 483', 'safrudinrasid@yahoo.com', 'img_1540804648.jpg', 'Jl. Zebra No. 93 A', '460586456831000', '-', 'Tidak Ada', '0', 1, '2006-05-29', 20, 'http://localhost/rest-karyawan/assets/img/', 1),
(48, '7271 0315 1280 0007', 'Marianus Didakus Reba', 'L', 'Sales', 'Tebuk', '1980-12-15', 'Katolik', 'K1', '082 393 288 453', 'marianusdidakus2@gmail.com', 'img_1514272728.jpg', 'Jl. Zebra IA Palu', '836143149831000', 'SMA', 'Ada', '0', 3, '2016-03-01', 54, 'http://localhost/rest-karyawan/assets/img/', 2),
(49, '7271031103780006', 'Maxianus Arifin Nurak', 'L', 'Driver', 'Nitakloang', '1978-03-11', 'Katolik', 'K1', '081 241 970 466', 'maxianusarifin@yahoo.com', 'img_1517301890.jpg', 'Jl. Zebra 2, No.31', '836141887831000', '-', 'Tidak Ada (Ada Di Ka', '0', 1, '2016-06-01', 24, 'http://localhost/rest-karyawan/assets/img/', 1),
(52, '7271020308830003', 'Abd. Aziz', 'L', 'Driver', 'Makassar', '1983-08-03', 'Islam', 'K1', '085 240 311 378', 'abd46282@gmail.com', 'img_1514261608.jpg', 'Jl. Jati Lr. II, Nunu, Palu Barat', '000000000000000', 'Paket C', 'No', '1510010604780', 1, '2016-11-01', 59, 'http://localhost/rest-karyawan/assets/img/', 1),
(53, '7202 0402 0883 0007', 'Anselmus Harianto', 'L', 'Driver', 'Flores/Maumere', '1983-09-20', 'Katolik', 'K2', '085 397 754 784', 'anselmusharianto@gmail.com', 'img_1514261664.jpg', 'Jl. Kesadaran No11, Palu Utara', '836141846831000', 'SD', 'No', '0', 3, '2016-11-01', 60, 'http://localhost/rest-karyawan/assets/img/', 2),
(55, '7371 0102 0292 0009', 'I Kadek Dwi Rustawan', 'L', 'Sales', 'Pakareme', '1992-02-02', 'Hindu', 'TK', '082 291 892 530', 'dwikadek361@gmail.com', 'img_1514261806.jpg', 'BTN Lasoani Blok C3 No 1, Palu Timur', '0', 'SMA', 'Ada', '0', 1, '2016-12-15', 62, 'http://localhost/rest-karyawan/assets/img/', 1),
(56, '7210111303930001', 'Gunawan Kelana', 'L', 'Driver', 'Sibalaya', '1993-03-13', 'Islam', 'K1', '082 197 258 899', 'kelanagunawan@yahoo.com', 'img_1520499320.jpg', 'Kalukutinggu Dusun 2, Dolo Barat', '0', 'SMA', 'Ada', '0', 1, '2017-02-01', 63, 'http://localhost/rest-karyawan/assets/img/', 1),
(66, '7271 0625 1295 0002', 'Moh.Fahril', 'L', 'Sales', 'Palu', '1995-12-25', 'Islam', 'TK', '085 287 398 555', '-', 'img_1511061438.jpg', 'Jl. Gunung Gawalise, Duyu', '0', 'SMA', 'Ada', '0', 3, '2017-03-01', 66, 'http://localhost/rest-karyawan/assets/img/', 2),
(67, '7572 0321 0793 0001', 'Teguh Suriyanto', 'L', 'Driver', 'Parigi', '1985-10-27', 'Islam', 'K1', '085 298 731 296', 'teguhsupriyanto75@yahoo.com', 'img_1514272430.jpg', 'Jl. Seruni Raya No 1, Palu', '0', 'SMA', 'Ada', '0', 3, '2017-03-01', 67, 'http://localhost/rest-karyawan/assets/img/', 2),
(68, '7210 0422 0789 0001', 'Frangklin', 'L', 'Driver', 'Toli -Toli', '1989-07-19', 'Kristen', 'TK', '082 293 061 798', 'frangfrangklin@yahoo.com', 'img_1523950484.JPG', 'Dusun 1, Tomado, Lindu', '0', 'SMA', 'Ada', '0', 1, '2017-04-01', 68, 'http://localhost/rest-karyawan/assets/img/', 1),
(69, '7203 3028 0399 0001', 'Moh. Padil', 'L', 'Sales', 'Labean', '1998-03-28', 'Islam', 'TK', '082 297 068 694', 'moh.padil@yahoo.com', 'img_1514272755.jpg', 'Jl. Gunung Sojol, Ogoamas 1', '0', 'SMA', 'Ada', '0', 3, '2017-04-01', 69, 'http://localhost/rest-karyawan/assets/img/', 2),
(74, '7202 0430 0988 0006', 'Nong Edison', 'L', 'Driver', 'Maumere', '1988-09-30', 'Katolik', 'K1', '085 298 635 455', 'edisonedis880@gmail.com', 'img_1514273147.jpg', 'Jl. Basuki Rahmat Lrg. Kesadaran No. 11 Palu', '0', '-', 'Tidak Ada', '0', 3, '2017-11-01', 74, 'http://localhost/rest-karyawan/assets/img/', 2),
(75, '7271 0205 0684 0007', 'Eugenius Nong Herbert', 'L', 'Sales', 'Flores', '1984-06-05', 'Katolik', 'K1', '081 243 535 018', 'eugeniusnong@gmail.com', 'img_1517298119.jpg', 'Jl. Lasoso Lrg. II No. 4', '641139290831000', 'S1', 'Ada', '0', 3, '2017-11-01', 75, 'http://localhost/rest-karyawan/assets/img/', 2),
(79, '7271 0220 0790 0001', 'Muzakir', 'L', 'Sales', 'Donggala Kodi', '1990-07-17', 'Islam', 'TK', '085 216 425 122', 'mmuzakir67@gmail.com', 'img_1520499130.jpg', 'Jl. Gawalise, Kel. Donggala Kodi, Kec. Palu Barat.', '0', 'SMA', 'Ada', '0', 3, '2017-11-02', 79, 'http://localhost/rest-karyawan/assets/img/', 2),
(81, '7271 0311 0993 0001', 'Sujarwadi', 'L', 'Administrasi', 'Poso', '1993-09-11', 'Islam', 'TK', '085 241 202 733', 'soedjarwadi70@gmail.com', 'img_1523950614.JPG', 'BTN Palupi Puskud Blok B1 No. 04', '944348630831000', 'S1 Kehutanan', 'Ada', '0', 1, '2017-12-06', 81, 'http://localhost/rest-karyawan/assets/img/', 1),
(85, '7271031111910002', 'Jefri', 'L', 'Driver', 'Palu', '1991-11-11', 'Islam', 'K0', '082 291 195 430', '-', 'img_1515225960.jpg', 'Jl. Lagarutu', '0', 'SMA', 'Ada', '0', 1, '2017-12-12', 85, 'http://localhost/rest-karyawan/assets/img/', 1),
(87, '7271 0154 0995 0001', 'Samsinar', 'P', 'Administrasi', 'Palu', '1995-09-14', 'Islam', 'TK', '082 296 067 551', '-', 'img_1520905743.jpg', 'Jl. Veteran Lrg 1', '000000000000000', 'S1 Ekonomi', 'Ada', '0', 3, '2018-01-08', 87, 'http://localhost/rest-karyawan/assets/img/', 2),
(88, '7208 1018 0689 0001', 'Muh.Syafaat', 'L', 'Driver', 'Tada', '1989-06-18', 'Islam', 'K1', '085 343 568 589', '-', 'img_1545288566.jpg', 'Jl. Hayam Wuruk No.33', '000000000000000', 'SMA', 'Ya', '0', 3, '2018-11-01', 88, 'http://localhost/rest-karyawan/assets/img/', 2),
(89, '7271 0310 0293 0007', 'Ahyadi', 'L', 'Sales Kanvas', 'Toli - toli', '1993-02-10', 'Islam', 'TK', '085 343 707 582', '-', 'img_1520905725.jpg', 'BTN Palupi Blok I1 No.12', '0', 'S1', 'Ada', '1510011139513', 3, '2018-02-26', 89, 'http://localhost/rest-karyawan/assets/img/', 2),
(91, '7203 0620 1193 0002', 'Salmon', 'L', 'Driver', 'Panii', '1993-11-26', 'Kristen', 'TK', '082 312 229 308', '-', 'img_1526521994.jpg', 'Jl. Touwa No.11 / Jl. Cendana Panii Dompelas Sojol', '825329832831000', 'SMA', 'Ya', '0', 3, '2018-04-30', 91, 'http://localhost/rest-karyawan/assets/img/', 2),
(92, '7271030211850011', 'Sunarto', 'L', 'Driver', 'Palu', '1985-11-02', 'Islam', 'K1', '085 240 483 212', '-', 'img_1531119207.jpg', 'JL. MAWAR KEL.PETOBO, KEC.PALU SELATAN', '0', 'SMA', 'Ya', '0', 1, '2018-07-02', 92, 'http://localhost/rest-karyawan/assets/img/', 1),
(93, '7208 0211 1097 0001', 'I Ketut Indra Sudarwan', 'L', 'Salesman', 'Buranga', '1997-10-11', 'Hindu', 'K1', '000 000 000 000', '-', 'img_1537260910.jpg', 'Talise Vallangguni RT 003 RW 006, Talise, Mantikulore.', '0', 'SMA', 'Ya', '0', 3, '2018-08-01', 93, 'http://localhost/rest-karyawan/assets/img/', 2),
(95, '7210 1018 1191 0001', 'Samrifky Nolfreyadi', 'L', 'Driver', 'Sibalaya', '1991-10-18', 'Islam', 'K1', '085 398 484 434', 'sam@gmail.com', 'img_1540602215.jpg', 'Desa Tulo RT/RW 001/001, desa Tulo, Kecamatan Dolo', '0', 'SMA', 'Ya', '0', 3, '2018-09-04', 95, 'http://localhost/rest-karyawan/assets/img/', 2),
(96, '7215222', 'Cahyadi', 'L', 'Serabutan', 'Palu', '1980-01-01', 'Islam', '', '085 356 265 662', '-', 'img_1566448555.jpg', 'Jl. Basuki Rahmat', '000000000000000', 'SMA', 'Yes', '0', 3, '2018-11-01', 96, 'http://localhost/rest-karyawan/assets/img/', 2),
(97, '7210012312910003', 'Kornelius', 'L', 'Serabutan', 'Flores', '1991-12-23', 'Khatolik', '', '085 398 861 469', '-', 'img_1566448530.jpg', 'Desa Jono Oge RT 004/RW 003 Kab. SIGI - SULTENG', '000000000000000', 'SMA', 'Yes', '0', 3, '2018-12-01', 97, 'http://localhost/rest-karyawan/assets/img/', 2),
(98, '7271 0212 0380 0007', 'Yohansah', 'L', 'Driver', 'Palu', '1980-03-12', 'Islam', 'K1', '085 241 205 297', '-', 'noprofile.png', 'Jl. Kedondong Lrg. 1', '0', 'SMA', 'Yes', '0', 3, '2015-02-01', 45, 'http://localhost/rest-karyawan/assets/img/', 2),
(99, '7271 0605 0184 0001', 'Zamsih', 'L', 'Driver', 'Luwuk', '1984-01-05', 'Islam', 'K0', '082 189 517 757', 'zamsihzam@gmail.com', 'img_1514272904.jpg', 'Jl. Gunung Gawalise No. 225.B', '836142117831000', '', '', '0', 3, '2016-03-28', 56, 'http://localhost/rest-karyawan/assets/img/', 2),
(100, '7271041107720002', 'MINHAR', 'L', 'Sales', 'Palu', '1972-07-11', '', 'K3', '000 000 000 000', '-', 'noprofile.png', 'Tawaili', '000000000000000', 'SMA', 'Yes', '0', 3, '2009-01-01', 13, 'http://localhost/rest-karyawan/assets/img/', 2),
(101, '7210 0118 0888 0003', 'Ilham', 'L', 'Sales', 'Sidera', '1988-08-10', 'Islam', 'TK', '085 696 012 448', 'ii0980421@gmail.com', 'img_1525856995.jpg', 'Jl. SDN Karawana, Kec. Sigi Biromaru', '0', 'S1', 'Ada', '0', 3, '2017-06-01', 80, 'http://localhost/rest-karyawan/assets/img/', 2),
(102, '7271 0305 0883 0006', 'Agung Junaedi', 'L', 'Sales', 'Palu', '1983-08-05', 'Islam', 'TK', '085 241 088 451', '-', 'noprofile.png', 'Jl. Basuki Rahmat', '0', 'SMA', 'Yes', '0', 3, '2009-06-01', 12, 'http://localhost/rest-karyawan/assets/img/', 2),
(103, '7271 0301 0189 0009', 'Rahmat Arif', 'L', 'Sales', 'Palu', '1989-01-01', 'Islam', 'k1', '', '', 'noprofile.png', '', '', 'SMA', '', '0', 3, '0000-00-00', 0, 'http://localhost/rest-karyawan/assets/img/', 2),
(104, '7208 1301 0596 0001', 'Kurniawan Ali badiri', 'L', 'Sales', 'Pinotu', '1905-06-18', 'Islam', 'TK', '000 000 000 000', '-', 'noprofile.png', 'Desa Pinotu', '000000000000000', 'SMA', 'Yes', '0', 3, '2015-05-01', 46, 'http://localhost/rest-karyawan/assets/img/', 2),
(105, '6402 0516 0592 0004', 'SYAMSUDIN', 'L', 'Driver', 'Muara Badak', '1992-05-16', 'Islam', 'TK', '000 000 000 000', '-', 'noprofile.png', 'Palu', '000000000000000', 'SMA', 'Yes', '0', 3, '1970-01-01', 44, 'http://localhost/rest-karyawan/assets/img/', 2),
(106, '7208 0313 0592 0003', 'Budi Setiawan', 'L', 'Sales', 'Palu', '1992-05-13', 'Islam', 'TK', '085 396 201 775', '-', 'noprofile.png', 'Tinombo', '0', '', '', '0', 3, '2013-09-01', 38, 'http://localhost/rest-karyawan/assets/img/', 2),
(107, '7271 0204 1187 0001', 'Andris', 'L', 'Driver', 'Palu', '1987-11-04', 'Islam', 'TK', '082 347 567 805', '-', 'noprofile.png', 'Jl. Padanjakaya', '0', 'SMA', 'Yes', '0', 3, '2016-03-01', 49, 'http://localhost/rest-karyawan/assets/img/', 2),
(108, '7271 0218 0880 0006', 'MUH.JUANG NUR SAURU', '', 'Driver', 'Palu', '1980-08-18', '', '', '', '', 'noprofile.png', '', '', '', '', '0', 3, '0000-00-00', 0, 'http://localhost/rest-karyawan/assets/img/', 2),
(109, '7271 0325 1274 0003', 'Andi Nandar', 'L', 'Sales', 'Palu', '1974-12-25', 'Islam', 'TK', '085 242 929 875', '-', 'noprofile.png', 'Jl. Dewi Sartika Lorong Kenangan No. 22 F', '0', '', '', '0', 3, '2004-08-01', 17, 'http://localhost/rest-karyawan/assets/img/', 2),
(110, '7210 0924 1093 0001', 'Yayat Hidayat', 'L', 'Salesman', 'Desa Bangga', '1993-10-24', 'Islam', 'K1', '082 322 349 281', '-', 'noprofile.png', 'Jl. Poros Palu - Bangga', '0', 'SMA', 'Yes', '0', 3, '2014-02-03', 39, 'http://localhost/rest-karyawan/assets/img/', 2),
(111, '7271063107820001', 'MOH. TAUFAN', 'L', 'Sales', 'Palu', '1982-07-31', 'Islam', 'K0', '000 000 000 000', '-', 'noprofile.png', 'Jl.Beringin', '000000000000000', 'SMA', 'Yes', '0', 3, '2007-01-01', 9, 'http://localhost/rest-karyawan/assets/img/', 2),
(112, '7208 0114 0489 0001', 'Ruri Rantika', 'L', 'Salesman', 'Parigi', '1989-04-14', 'Islam', 'K1', '082 393 534 293', '-', 'noprofile.png', 'Dusun 3, Desa Pangi, Parigi Utara', '0', '', '', '0', 3, '2015-05-01', 51, 'http://localhost/rest-karyawan/assets/img/', 2),
(113, '7271 0308 0783 0062', 'Moh. Taufik', 'L', 'Salesman', 'Tinombo', '1983-07-08', 'Islam', 'TK', '085 241 352 511', '-', 'noprofile.png', 'Jl. Kijang Selatan VII No 8', '749853149831000', '', '', '0', 3, '2015-03-15', 47, 'http://localhost/rest-karyawan/assets/img/', 2),
(114, '', 'AKBAR', 'L', 'Driver', 'Kaleke', '1980-01-01', 'Islam', 'K1', '', '', 'noprofile.png', '', '', '', '', '0', 3, '0000-00-00', 0, 'http://localhost/rest-karyawan/assets/img/', 2),
(115, '', 'Hari', '', '', '', '1980-01-01', '', '', '', '', 'noprofile.png', '', '', '', '', '0', 3, '0000-00-00', 0, 'http://localhost/rest-karyawan/assets/img/', 2),
(116, '7571 0321 0793 0001', 'Zulfikar Fais Madina', 'L', 'Sales', 'Palu', '1993-07-20', 'Islam', 'TK', '085 242 935 573', 'zulfikarfais@yahoo.com', 'img_1514273390.jpg', 'Jl. Dulohupa, Dulomo Utara', '0', 'SMA', 'Ada', '0', 3, '2016-11-01', 57, 'http://localhost/rest-karyawan/assets/img/', 2),
(117, '7271 0315 0991 0002', 'Moh. Riyan Aditya', 'L', 'administrasi', 'Palu', '1991-09-15', 'Islam', 'TK', '082 296 046 508', '-', 'noprofile.png', 'Jl. Anoa 1 No. 160', '0', '', '', '0', 3, '2016-09-01', 58, 'http://localhost/rest-karyawan/assets/img/', 2),
(118, '7202 0615 0687 0008', 'Syahrudin', 'L', 'Mekanik', 'Palu', '1987-06-15', 'Islam', 'K1', '082 187 848 599', '-', 'noprofile.png', 'Dusun 6, Desa Pandajaya, Pamona Selatan', '0', 'SMA', 'Yes', '0', 3, '2016-12-01', 0, 'http://localhost/rest-karyawan/assets/img/', 2),
(119, '', 'Puja', 'L', 'Sales', '', '1970-01-01', 'Kristen', '', '', '', 'noprofile.png', '', '', '', '', '0', 3, '0000-00-00', 0, 'http://localhost/rest-karyawan/assets/img/', 2),
(120, '7601 0426 1289 0005', 'Rahmat Hambali', 'L', 'Salesman', 'Madura', '1989-12-26', 'Islam', 'K1', '082 290 833 818', '-', 'noprofile.png', 'BTN Asri Permai Blok A No. 4', '0', '', '', '0', 3, '2017-05-01', 65, 'http://localhost/rest-karyawan/assets/img/', 2),
(121, '', 'Ram', 'L', 'Asisten Mekanik', '', '1980-01-01', 'Islam', '', '', '', 'noprofile.png', '', '', '', '', '0', 3, '0000-00-00', 0, 'http://localhost/rest-karyawan/assets/img/', 2),
(122, '7271 0313 0694 0001', 'Hastiawan', 'L', 'Salesman', 'Palu', '1994-06-13', 'Islam', 'K1', '000 000 000 000', '-', 'noprofile.png', 'Jl. Anoa 1', '0', '', '', '0', 3, '2017-08-01', 72, 'http://localhost/rest-karyawan/assets/img/', 2),
(123, '7271 0209 0987 0000', 'Awaluddin SI', 'L', 'Salesman', 'Kendari', '1987-09-09', 'Islam', 'K1', '085 343 888 433', '-', 'noprofile.png', 'Jl. Samudra 1 No. 12', '0', 'S1', 'Yes', '0', 3, '2017-08-01', 73, 'http://localhost/rest-karyawan/assets/img/', 2),
(124, '7206 0246 0894 0001', 'Etfian Masa', 'P', 'Administrasi', 'Dolupo Karya', '1970-01-01', 'Kristen', 'TK', '085 256 220 851', '-', 'img_1514272639.jpg', 'Jl. Miangas, Lrg. Pancasila', '0', '', '', '0', 3, '2017-12-26', 77, 'http://localhost/rest-karyawan/assets/img/', 2),
(125, '7208 1023 0792 0001', 'Randiansyah', 'L', 'Driver', 'Sigenti', '1992-07-20', 'Islam', 'TK', '081 343 823 090', 'randiansyahr0@gmail.com', 'img_1515226193.jpg', 'Desa Sigenti Selatan, Kec. Tinombo Selatan', '0', 'S1', 'Ada', '0', 3, '2017-12-02', 78, 'http://localhost/rest-karyawan/assets/img/', 2),
(126, '7203 0867 0395 0005', 'Ilham Akbar', 'L', 'Sales', 'Palu', '1970-01-01', 'Islam', 'TK', '082 291 509 572', '-', 'noprofile.png', 'Desa Boya, Kec Banawa', '78426533727000', '', '', '0', 3, '2015-05-03', 53, 'http://localhost/rest-karyawan/assets/img/', 2),
(127, '7271 0326 0189 0001', 'Roysno', 'L', 'Sales', 'Palu', '1989-01-26', 'Islam', 'K0', '085 299 960 679', '-', 'noprofile.png', 'Wombo, Kec. Tanantovea', '0', '', '', '0', 3, '2017-12-12', 82, 'http://localhost/rest-karyawan/assets/img/', 2),
(128, '7201 0403 0993 0004', 'Muh Ridha Arsid', 'L', 'Salesman', 'Luwuk', '1993-09-03', 'Islam', 'TK', '085 241 007 895', 'muhridhaarsidridha@gmail.com', 'img_1514367504.jpg', 'Jl. Katambak, Kel. Bukit Mambual, Kec.Luwuk Selatan', '000000000000000', 'SMA', 'Yes', '0', 3, '2017-12-14', 83, 'http://localhost/rest-karyawan/assets/img/', 2),
(129, '7271 0328 0292 0012', 'Moh. Saleh Lamusa', 'L', 'Sales', 'Ampana', '1992-02-28', 'Islam', 'TK', '082 394 665 358', '-', 'img_1517302074.jpg', 'Jl. Tg. Satu No. 04 Palu', '0', 'SMA', 'Ada', '0', 3, '2017-12-01', 84, 'http://localhost/rest-karyawan/assets/img/', 2),
(130, '7210 0112 0582 0002', 'Jusli R', 'L', 'Driver', 'Salumbia', '1982-05-12', 'Islam', 'K1', '081 341 349 339', '-', 'img_1523947574.jpg', 'Jl. Guru Tua, Kalukubula', '0', 'SMA', 'Ada', '0', 3, '2017-12-15', 86, 'http://localhost/rest-karyawan/assets/img/', 2),
(131, '7271 0205 0989 0005', 'Edy Saputra', 'L', 'Salesman', 'Lero', '1989-11-05', 'Islam', 'TK', '082 361 071 817', '-', 'img_1528339312.jpg', 'Jl. Parigi Raya, No. 75 BTN Silae', '0', 'S1 Komputer', 'Ya', '0', 3, '2018-03-12', 90, 'http://localhost/rest-karyawan/assets/img/', 2),
(132, '7271 0328 0793 0008', 'Gery Julian Stevano', 'L', 'Driver', 'Palu', '1993-07-28', 'Kristen', 'K0', '081 145 061 300', '-', 'img_1537334468.jpg', 'Jl.Patimura No.158 Palu', '857493159831000', 'SMA', 'Ya', '0', 3, '2018-09-04', 94, 'http://localhost/rest-karyawan/assets/img/', 2),
(133, '7271 0212 0587 0001', 'Djafrin', 'L', 'Serabutan', 'Palu', '1987-05-12', 'Islam', 'TK', '085 342 829 615', 'djadjafrin@yahoo.com', 'img_1517367440.jpg', 'Jl. Padanjakaya', '0', 'SMA', 'Ada', '0', 3, '2019-04-13', 70, 'http://localhost/rest-karyawan/assets/img/', 2),
(134, '7271 0202 1091 0002', 'Taufik Efendi', 'L', 'Sales', 'Palu', '1991-10-02', 'Islam', 'TK', '085 236 430 911', 'taufikefendi602@gmail.com', 'img_1540005571.jpg', 'Jl. Munif Rahman', '0', 'SMA', 'Ada', '0', 3, '2017-11-01', 76, 'http://localhost/rest-karyawan/assets/img/', 2),
(135, '6473020505700001', 'Abdul Hafid', 'L', 'Salesman', 'Palu', '1970-05-05', 'Islam', 'K1', '008 125 509 412', '-', 'img_1554515981.jpg', 'Jl. Selumit Pantai RT 002/ RW 000, Tarakan Tengah, No Hp : 0812 5509 412', '701595670723000', 'SMA', 'Ya', '1510011215073', 1, '2019-01-01', 98, 'http://localhost/rest-karyawan/assets/img/', 1),
(136, '7271 0260 0998 0005', 'Fisca Fricikia Triwardana', 'P', 'Administrasi', 'Palu', '1998-09-20', 'Islam', 'TK', '082 291 878 705', 'belumada', 'img_1562645816.jpg', 'Jl. S. Malino Lr. II No. 160, Nunu, Tatanga, Palu', '952291003831000', 'SMA', 'Ya', '0', 1, '2019-02-01', 99, 'http://localhost/rest-karyawan/assets/img/', 1),
(137, '7271 0131 0188 0005', 'Andhika', 'L', 'Driver', 'Palu', '1988-01-31', 'Islam', 'K1', '082 292 439 733', '-', 'img_1554775899.jpg', 'Jl. Hayam Wuruk I No. 72 Palu RT 002/RW 003  Besusu Barat, Palu Timur', '0', 'SMA', 'Ya', '1510011315139', 3, '2019-03-01', 100, 'http://localhost/rest-karyawan/assets/img/', 2),
(138, '7210091911950001', 'Memo Bahari', 'L', 'Driver', 'Palu', '1995-11-19', 'Islam', '', '085 395 052 155', '-', 'img_1583911097.jpg', 'Desa Pulu, Kab.Sigi Biromaru', '000000000000000', 'SMA', 'Yes', '0', 2, '2019-08-01', 101, 'http://localhost/rest-karyawan/assets/img/', 1),
(139, '7210121404950002', 'Fikrin', 'L', 'Sales Kanvas', 'Tulo', '1995-04-14', 'Islam', '', '085 256 900 784', 'muh.fikri1495@gmail.com', 'img_1566448003.jpg', 'Dusun 3 Rarantea, RT.002, RT,003, Desa Tulo, Kec.Dolo', '000000000000000', 'SMA', 'Yes', '0', 3, '2019-08-12', 102, 'http://localhost/rest-karyawan/assets/img/', 2),
(140, '7208112002910001', 'Vicky Vernando', 'L', 'Sales Kanvas', 'Manado', '1991-02-20', 'Kristen', '', '085 341 436 363', 'vernandovicky@ymail.com', 'img_1566448027.jpg', 'Olobaru RT.001, RW.001 Desa OLobaru, Kec.Parigi Selatan, Kab. Parigi Moutong - Sulteng', '000000000000000', 'SMA', 'Yes', '0', 3, '2019-08-15', 103, 'http://localhost/rest-karyawan/assets/img/', 2),
(141, '7271012004900003', 'Abd.Azis', 'L', 'Sales Kanvas', 'Sigenti', '1990-04-20', 'Islam', '', '085 298 094 716', '-', 'img_1576627756.jpg', 'Jl.Tombolotutu', '000000000000000', 'SMA', 'Yes', '1510012676042', 2, '2019-12-16', 104, 'http://localhost/rest-karyawan/assets/img/', 1),
(142, '7202021911870002', 'Hermansyah', 'L', 'Driver', 'Masamba', '1987-11-19', 'Islam', '', '082 396 482 287', '-', 'img_1577147586.jpg', 'Jl.Mutaji Desa Lolu, Kec.Sigi Biromaru Kab.Sigi', '000000000000000', 'S1', 'Yes', '0', 2, '2019-12-09', 105, 'http://localhost/rest-karyawan/assets/img/', 1),
(143, '7203081001880009', 'Feri', 'L', 'Driver', 'Lolioge', '1988-01-10', 'Islam', '', '082 291 878 948', '-', 'img_1589352532.jpg', 'Loli Saluran / Jl.Teuku Umar', '000000000000000', 'SMA', 'Yes', '0', 3, '2019-12-28', 106, 'http://localhost/rest-karyawan/assets/img/', 2),
(144, '7210120312920001', 'Achsan Subangkit', 'L', 'Driver', 'Bodi Karawana', '1992-12-03', 'Islam', '', '085 216 060 220', '-', 'noprofile.png', 'Desa Karawana RT/RW 09/03, Kec.Dolo, Kab.Sigi', '000000000000000', 'SMA', 'Yes', '0', 3, '2020-02-24', 107, 'http://localhost/rest-karyawan/assets/img/', 2),
(145, '7271020909950001', 'Moh.Riyan Hidayatullah.S', 'L', 'Serabutan', 'Palu', '1995-09-09', 'Islam', '', '080 000 000 000', 'riyanhidayatullah843@gmail.com', 'img_1583367324.jpg', 'Jl. Sungai Wera No.46 B', '000000000000000', 'SMA', 'Yes', '0', 2, '2020-03-02', 108, 'http://localhost/rest-karyawan/assets/img/', 1),
(146, '7208012704940001', 'Aditya Pratama', 'L', 'Driver', 'Lemusa , Parigi', '1994-04-27', 'Islam', '', '082 393 503 081', '-', 'noprofile.png', 'Jl. Pramuka Dusun I, Desa Pombewe, Kec.Sigi Biromaru', '000000000000000', 'SMA', 'Yes', '0', 3, '2020-06-02', 109, '', 2),
(147, '7208090310900001', 'ANDREW MANOPO', 'L', 'Driver', 'Palu', '1990-10-03', 'Kristen', '', '082 349 499 924', '-', 'noprofile.png', 'Jl.Pelita Air No.8', '000000000000000', 'S1', 'Yes', '0', 2, '2020-07-07', 110, '', 1),
(148, '7271010112940001', 'Moh.Zulfikar S.Akil', 'L', 'Driver', 'Panasakan, Toli-Toli', '1994-12-01', 'Islam', '', '082 193 740 916', 'fikarakil01@gmail.com', 'img_1608348917.jpg', 'Jl.Merak', '940776578831000', 'SMA', 'Yes', '0000000000000', 2, '2020-12-01', 111, '', 1),
(149, '72xxxxx', 'Ikbal', 'L', 'Helper', 'Palu', '2021-06-07', 'Islam', '', '081 253 255 555', '-', 'noprofile.png', 'Palu', '000000000000000', 'SMA', 'Yes', '', 2, '2021-05-20', 112, '', 1),
(150, '7271012907910007', 'Mohammad Irwan', 'L', 'Driver', 'Palu', '1991-07-29', 'Islam', '', '085 315 843 587', '-', 'noprofile.png', 'Jl. M.H Thamrin No.20', '831977541831000', 'SMA', 'Yes', '0000000000000', 2, '2021-06-07', 113, '', 1),
(151, '7271022301020003', 'Galang', 'L', 'Sales Kanvas', 'Palu', '2002-01-23', 'Islam', '', '082 190 136 839', '-', 'img_1624415877.jpg', 'Gawalise', '000000000000000', 'SMA', 'Yes', '0000000000000', 2, '2021-06-04', 115, '', 1),
(152, '7210012909920003', 'fadil', 'L', 'Sales Kanvas', 'Lolu', '1992-09-29', 'Islam', '', '085 337 548 039', '-', 'img_1624415857.jpg', 'Jl.Buwu Panda', '000000000000000', 'SMA', 'Yes', '0000000000000', 2, '2021-06-04', 114, '', 1),
(153, '7271030808990003', 'Amsal Gustiawan', 'L', 'Sales Kanvas', 'Palu', '1999-08-08', 'Islam', '', '082 252 700 833', 'amsalgustiawan08@gmail.com', 'noprofile.png', 'Jln. Abdul Rahman Saleh', '000000000000000', 'SMA', 'Yes', '', 3, '2021-09-18', 116, '', 2),
(154, '7271011201930001', 'Moh.Hamzah', 'L', 'Driver', 'Gorontalo', '2003-01-12', 'Islam', '', '081 343 768 948', 'lolayie12@gmail.com', 'noprofile.png', 'Desa Kalukutinngu Dusun II, Sigi', '000000000000000', 'PAKET', 'Yes', '', 2, '2021-09-29', 117, '', 1),
(155, '7208071312940003', 'Deprianto', 'L', 'Sales Kanvas', 'Sigenti', '1994-12-13', 'Islam', '', '082 119 343 964', '-', 'noprofile.png', 'Jl.Todonja', '000000000000000', 'SMA', 'Yes', '', 2, '2021-12-06', 118, '', 1),
(156, '7271012206910001', 'Nadir', 'L', 'Sales Kanvas', 'Kayumalue', '1991-06-22', 'Islam', '', '085 341 500 272', '-', 'noprofile.png', '-', '000000000000000', 'SMA', 'Yes', '', 3, '2021-12-23', 119, '', 2),
(157, '7210100101900003', 'JUFRI', 'L', 'Sales Kanvas', 'Sibowi', '1990-06-01', 'Islam', '', '082 239 065 344', '-', 'noprofile.png', 'Btn Petobo Blok F2 No.15', '000000000000000', 'SMA', 'Yes', '0000000000000', 2, '2022-02-03', 120, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_po`
--

CREATE TABLE `tb_po` (
  `id` int(11) NOT NULL,
  `no_po` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `keterangan_po` varchar(256) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_po` varchar(50) NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_po`
--

INSERT INTO `tb_po` (`id`, `no_po`, `tanggal`, `id_suplier`, `jumlah_item`, `total`, `keterangan_po`, `id_user`, `status_po`) VALUES
(1, 'PO19100001', '1970-01-01', 1, 2, 800000, '', 1, 'open'),
(2, 'PO19100001', '2019-10-03', 1, 2, 800000, '', 1, 'open'),
(3, 'PO19100002', '2019-10-03', 1, 1, 1200000, '', 1, 'open'),
(4, 'PO19100003', '1970-01-01', 1, 1, 600000, '', 1, 'open'),
(5, 'PO19100003', '2019-10-02', 1, 1, 600000, '', 1, 'open'),
(6, 'PO19100004', '2019-10-03', 1, 2, 1580000, '', 1, 'open'),
(7, 'PO19100005', '2019-10-02', 1, 1, 100000, '', 1, 'open'),
(8, 'PO19100006', '2019-10-03', 1, 2, 270000, '', 1, 'open'),
(9, 'PO19100007', '2019-10-02', 1, 1, 672000, '', 1, 'open'),
(10, 'PO19100008', '2019-10-04', 1, 2, 3300000, '', 1, 'open'),
(11, 'PO19100009', '2019-10-06', 2, 3, 7060000, 'Harap periksa expire produk sebelum pengiriman.', 1, 'open'),
(12, 'PO19100010', '2019-10-24', 2, 2, 11760000, '', 1, 'open'),
(13, 'PO19110001', '2019-11-23', 2, 3, 1485000, 'Harap Dikirim di minggu ke 25', 1, 'open'),
(14, 'PO19120001', '2019-12-23', 2, 2, 670000, '', 1, 'open'),
(15, 'PO21040001', '2021-04-16', 2, 2, 5612000, 'asaaaal', 1, 'open'),
(16, 'PO22020001', '2022-02-14', 2, 1, 560000, 'a', 1, 'open'),
(17, 'PO22030001', '2022-03-13', 1, 1, 1375000, '', 1, 'open');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pph21`
--

CREATE TABLE `tb_pph21` (
  `id` int(11) NOT NULL,
  `kode_iuran` varchar(50) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `uraian` varchar(50) NOT NULL,
  `ttl_kry` int(11) NOT NULL,
  `ttl_bruto` int(11) NOT NULL,
  `ttl_pph` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_update` int(30) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ptkp`
--

CREATE TABLE `tb_ptkp` (
  `id_ptkp` int(11) NOT NULL,
  `start_tahun` int(11) NOT NULL,
  `end_tahun` int(11) NOT NULL,
  `ptkp` int(11) NOT NULL,
  `tanggungan` int(11) NOT NULL,
  `date_update` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `aktif` varchar(11) NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ptkp`
--

INSERT INTO `tb_ptkp` (`id_ptkp`, `start_tahun`, `end_tahun`, `ptkp`, `tanggungan`, `date_update`, `id_user`, `aktif`) VALUES
(1, 2017, 2022, 54000000, 4500000, 1646921856, 1, 'aktif');

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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Adeeva Kirania', 'adeeva@outlook.com', '5.jpg', '$2y$10$riWNbU79EgEsX3bPtKd.4.2S65acytGcePqty7ic8BTBcDxtIZULu', 1, 1, 1552120289),
(2, 'Doddy Ferdiansyah', 'doddy@gmail.com', 'default.jpg', '$2y$10$FhGzXwwTWLN/yonJpDLR0.nKoeWlKWBoRG9bsk0jOAgbJ007XzeFO', 2, 1, 1552285263),
(3, 'Sandhika Galih', 'sandhikagalih@gmail.com', 'default.jpg', '$2y$10$0QYEK1pB2L.Rdo.ZQsJO5eeTSpdzT7PvHaEwsuEyGSs0J1Qf5BoSq', 2, 1, 1553151354),
(12, 'Budi Harto', 'budi.hrt@outlook.co.id', 'default.jpg', '$2y$10$KWynVFCbBOKScwlONdgllemFX40YkPNyfyhSIQVL5EoPIhvr4CqwK', 2, 0, 1568879478);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(7, 1, 3),
(8, 1, 2),
(9, 1, 4),
(10, 1, 5),
(11, 1, 6),
(15, 3, 2),
(16, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_sub_menu`
--

CREATE TABLE `user_access_sub_menu` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `submenu_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_sub_menu`
--

INSERT INTO `user_access_sub_menu` (`id`, `user_id`, `submenu_id`, `menu_id`) VALUES
(1, 1, 2, 2),
(2, 1, 3, 2),
(3, 1, 4, 3),
(4, 1, 5, 3),
(5, 1, 7, 1),
(6, 1, 8, 2),
(7, 1, 9, 1),
(8, 2, 2, 2),
(9, 2, 3, 2),
(10, 2, 8, 2),
(11, 3, 2, 2),
(12, 3, 3, 2),
(13, 3, 8, 2),
(14, 1, 10, 4),
(15, 1, 11, 4),
(19, 1, 13, 4),
(22, 1, 15, 6),
(23, 1, 14, 6),
(24, 1, 16, 4),
(25, 1, 17, 6),
(26, 1, 18, 5),
(27, 1, 19, 5),
(28, 1, 12, 4),
(29, 1, 20, 6),
(30, 1, 21, 9),
(31, 1, 22, 9),
(32, 1, 23, 9),
(33, 1, 24, 9),
(34, 1, 25, 6),
(35, 1, 26, 6),
(36, 1, 27, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_dashboard`
--

CREATE TABLE `user_dashboard` (
  `id` int(11) NOT NULL,
  `dashboard` varchar(128) NOT NULL,
  `url_dashboard` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_dashboard`
--

INSERT INTO `user_dashboard` (`id`, `dashboard`, `url_dashboard`, `icon`) VALUES
(1, 'Home', 'admin', 'fe-home'),
(2, 'Home', 'user', 'fe-home');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `icon`) VALUES
(1, 'Admin', 'icon-screen-desktop'),
(2, 'User', 'icon-user'),
(3, 'Menu', 'icon-list'),
(4, 'Barang', 'icon-social-dropbox'),
(5, 'Pembelian', 'icon-basket'),
(6, 'Master', 'icon-film'),
(8, 'Tools', 'Tools.png'),
(9, 'Gaji', 'icon-briefcase');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Admin'),
(3, 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon_sub` varchar(128) NOT NULL,
  `sc` varchar(11) NOT NULL DEFAULT 'single',
  `sub_menu_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon_sub`, `sc`, `sub_menu_id`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'icon-speedometer', 'single', 0, 1),
(2, 2, 'My Profile', 'user', 'icon-user', 'single', 0, 1),
(3, 2, 'Edit Profile', 'user/edit', 'icon-pencil', 'single', 0, 1),
(4, 3, 'Menu Management', 'menu', 'icon-folder', 'single', 0, 1),
(5, 3, 'Submneu Mgt', 'menu/submenu', 'icon-folder-alt', 'single', 0, 1),
(7, 1, 'Role', 'admin/role', 'icon-share', 'single', 0, 1),
(8, 2, 'Change Password', 'user/changepassword', 'icon-settings', 'single', 0, 1),
(9, 1, 'Data User', 'admin/datauser', 'icon-people', 'single', 0, 1),
(10, 4, 'Data Barang', 'barang/barang', 'icon-grid', 'single', 0, 1),
(11, 4, 'Kategori', 'barang/kategori', 'icon-list', 'single', 0, 1),
(12, 4, 'Satuan & Merek', 'barang/satuan', 'icon-layers', 'single', 0, 1),
(13, 4, 'Sub Kategori', 'barang/kategori/subkategori', 'icon-options-vertical', 'single', 0, 1),
(14, 6, 'Data Suplier', 'master/suplier', 'icon-support', 'single', 0, 1),
(15, 6, 'Data Customer', 'master/customer', 'icon-people', 'single', 0, 1),
(16, 4, 'Merek', 'barang/merek', 'icon-tag', 'single', 0, 1),
(17, 6, 'Level', 'master/level', 'icon-chart', 'single', 0, 1),
(18, 5, 'Purchase Order', 'pembelian/po', 'icon-cursor', 'single', 0, 1),
(19, 5, 'Stok In', 'pembelian/stok_in', 'icon-social-linkedin', 'single', 0, 1),
(20, 6, 'Gudang', 'master/gudang', 'icon-home', 'single', 0, 1),
(21, 9, 'Penggajian', 'gaji/penggajian', 'icon-credit-card', 'single', 0, 1),
(22, 9, 'Management Gaji', 'gaji/management_gaji', 'icon-calculator', 'single', 0, 1),
(23, 9, 'Iuran Bpjs', 'gaji/bpjs', 'icon-umbrella', 'single', 0, 1),
(24, 9, 'Iuran PPH21', 'gaji/pph21', 'icon-support', 'single', 0, 1),
(25, 6, 'Master PTKP', 'master/ptkp', 'icon-tag', 'single', 0, 1),
(26, 6, 'Manage Karyawan', 'karyawan', 'icon-user', 'parent', 0, 1),
(27, 6, 'Master Karyawan', 'karyawan/karyawan', 'icon-user-follow', 'child', 26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_dashboard`
--
ALTER TABLE `access_dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `detil_bpjs`
--
ALTER TABLE `detil_bpjs`
  ADD PRIMARY KEY (`id_detil_bpjs`);

--
-- Indexes for table `detil_gajian`
--
ALTER TABLE `detil_gajian`
  ADD PRIMARY KEY (`id_gajian`);

--
-- Indexes for table `detil_pembelian`
--
ALTER TABLE `detil_pembelian`
  ADD PRIMARY KEY (`id_detil`);

--
-- Indexes for table `detil_po`
--
ALTER TABLE `detil_po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detil_pph`
--
ALTER TABLE `detil_pph`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detil_pph21`
--
ALTER TABLE `detil_pph21`
  ADD PRIMARY KEY (`id_detil_pph21`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_customer`
--
ALTER TABLE `level_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_diskon`
--
ALTER TABLE `level_diskon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nomor_po`
--
ALTER TABLE `nomor_po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bpjs`
--
ALTER TABLE `tb_bpjs`
  ADD PRIMARY KEY (`id_bpjs`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `tb_gajian`
--
ALTER TABLE `tb_gajian`
  ADD PRIMARY KEY (`id_gajian`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_po`
--
ALTER TABLE `tb_po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pph21`
--
ALTER TABLE `tb_pph21`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ptkp`
--
ALTER TABLE `tb_ptkp`
  ADD PRIMARY KEY (`id_ptkp`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_dashboard`
--
ALTER TABLE `user_dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_dashboard`
--
ALTER TABLE `access_dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detil_bpjs`
--
ALTER TABLE `detil_bpjs`
  MODIFY `id_detil_bpjs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `detil_gajian`
--
ALTER TABLE `detil_gajian`
  MODIFY `id_gajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT for table `detil_pembelian`
--
ALTER TABLE `detil_pembelian`
  MODIFY `id_detil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `detil_po`
--
ALTER TABLE `detil_po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `detil_pph`
--
ALTER TABLE `detil_pph`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detil_pph21`
--
ALTER TABLE `detil_pph21`
  MODIFY `id_detil_pph21` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `level_customer`
--
ALTER TABLE `level_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `level_diskon`
--
ALTER TABLE `level_diskon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `merek`
--
ALTER TABLE `merek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nomor_po`
--
ALTER TABLE `nomor_po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_bpjs`
--
ALTER TABLE `tb_bpjs`
  MODIFY `id_bpjs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_gajian`
--
ALTER TABLE `tb_gajian`
  MODIFY `id_gajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `tb_po`
--
ALTER TABLE `tb_po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
