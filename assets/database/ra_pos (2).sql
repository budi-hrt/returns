-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2019 at 04:41 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ra_pos`
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
(10003, '8992775212103', 'Kacang Telur', 1, 7, 'Pcs', 'Pak', 10, 5, 0, 1, 1);

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
  `status_detil` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_pembelian`
--

INSERT INTO `detil_pembelian` (`id_detil`, `no_faktur`, `kode_produk`, `qty`, `id_satuan`, `harga_detil`, `disc_detil`, `subtotal_detil`, `status_detil`) VALUES
(1, 'PB19110001', '10001', 200, 0, 56000, 0, 11200000, 'Pending'),
(2, 'PB19110001', '10001', 10, 1, 56000, 0, 560000, 'Pending');

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
  `terkirim` int(11) NOT NULL DEFAULT 0,
  `retur` int(11) NOT NULL DEFAULT 0,
  `harga_item` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `status_detil_po` varchar(50) NOT NULL DEFAULT 'pendding'
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
(36, 'PO19110001', '10002', 10, 4, 0, 0, 10000, 100000, 'pendding');

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
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `faktur_in` varchar(128) NOT NULL,
  `tanggal_in` date NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `no_po` varchar(128) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pembelian` varchar(50) NOT NULL DEFAULT 'Hutang'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(13, 'PO19110001', '2019-11-23', 2, 3, 1485000, 'Harap Dikirim di minggu ke 25', 1, 'open');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(15, 3, 2);

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
(29, 1, 20, 6);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `icon`) VALUES
(1, 'Admin', 'icon-screen-desktop'),
(2, 'User', 'icon-user'),
(3, 'Menu', 'icon-list'),
(4, 'Barang', 'icon-social-dropbox'),
(5, 'Pembelian', 'icon-basket'),
(6, 'Master', 'icon-film');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon_sub`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'icon-speedometer', 1),
(2, 2, 'My Profile', 'user', 'icon-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'icon-pencil', 1),
(4, 3, 'Menu Management', 'menu', 'icon-folder', 1),
(5, 3, 'Submneu Mgt', 'menu/submenu', 'icon-folder-alt', 1),
(7, 1, 'Role', 'admin/role', 'icon-share', 1),
(8, 2, 'Change Password', 'user/changepassword', 'icon-settings', 1),
(9, 1, 'Data User', 'admin/datauser', 'icon-people', 1),
(10, 4, 'Data Barang', 'barang/barang', 'icon-grid', 1),
(11, 4, 'Kategori', 'barang/kategori', 'icon-list', 1),
(12, 4, 'Satuan & Merek', 'barang/satuan', 'icon-layers', 1),
(13, 4, 'Sub Kategori', 'barang/kategori/subkategori', 'icon-options-vertical', 1),
(14, 6, 'Data Suplier', 'master/suplier', 'icon-support', 1),
(15, 6, 'Data Customer', 'master/customer', 'icon-people', 1),
(16, 4, 'Merek', 'barang/merek', 'icon-tag', 1),
(17, 6, 'Level', 'master/level', 'icon-chart', 1),
(18, 5, 'Purchase Order', 'pembelian/po', 'icon-cursor', 1),
(19, 5, 'Stok In', 'pembelian/stok_in', 'icon-social-linkedin', 1),
(20, 6, 'Gudang', 'master/gudang', 'icon-home', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `tb_po`
--
ALTER TABLE `tb_po`
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
-- AUTO_INCREMENT for table `detil_pembelian`
--
ALTER TABLE `detil_pembelian`
  MODIFY `id_detil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detil_po`
--
ALTER TABLE `detil_po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `tb_po`
--
ALTER TABLE `tb_po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_dashboard`
--
ALTER TABLE `user_dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
