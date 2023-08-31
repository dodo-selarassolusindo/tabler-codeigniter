-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 11:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tamu3`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t00_mata_uang`
--

CREATE TABLE `t00_mata_uang` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `simbol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t00_mata_uang`
--

INSERT INTO `t00_mata_uang` (`id`, `kode`, `nama`, `simbol`) VALUES
(1, 'IDR', 'RUPIAH', 'Rp'),
(2, 'USD', 'US DOLLAR', '$'),
(3, 'AUD', 'AUSTRALIAN DOLLAR', '$'),
(4, 'EUR', 'EURO', '€');

-- --------------------------------------------------------

--
-- Table structure for table `t01_jenis_pembayaran`
--

CREATE TABLE `t01_jenis_pembayaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t01_jenis_pembayaran`
--

INSERT INTO `t01_jenis_pembayaran` (`id`, `nama`) VALUES
(1, 'USD'),
(2, 'AUD'),
(3, 'RP'),
(4, 'PAYPAL'),
(5, 'BCA DOLLAR'),
(6, 'CC BCA'),
(7, 'CC MANDIRI');

-- --------------------------------------------------------

--
-- Table structure for table `t02_jenis_selisih_pembayaran`
--

CREATE TABLE `t02_jenis_selisih_pembayaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t02_jenis_selisih_pembayaran`
--

INSERT INTO `t02_jenis_selisih_pembayaran` (`id`, `nama`) VALUES
(1, 'DISCOUNT');

-- --------------------------------------------------------

--
-- Table structure for table `t03_periode`
--

CREATE TABLE `t03_periode` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t03_periode`
--

INSERT INTO `t03_periode` (`id`, `tanggal`) VALUES
(1, '2022-01-01'),
(2, '2023-01-01'),
(3, '2024-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `t04_package`
--

CREATE TABLE `t04_package` (
  `id` int(11) NOT NULL,
  `periode` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ln3n_mata_uang` int(11) NOT NULL,
  `ln3n_harga` double NOT NULL COMMENT 'tamu asing 3 night',
  `ln6n_mata_uang` int(11) NOT NULL,
  `ln6n_harga` double NOT NULL COMMENT 'tamu asing 6 night',
  `ln1n_mata_uang` int(11) NOT NULL,
  `ln1n_harga` double NOT NULL COMMENT 'tamu asing 1 night',
  `dnrb_mata_uang` int(11) NOT NULL,
  `dnrb_harga` double NOT NULL COMMENT 'dalam negeri room + breakfast',
  `dnfb_mata_uang` int(11) NOT NULL,
  `dnfb_harga` double NOT NULL COMMENT 'dalam negeri fullboard'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t04_package`
--

INSERT INTO `t04_package` (`id`, `periode`, `kode`, `nama`, `ln3n_mata_uang`, `ln3n_harga`, `ln6n_mata_uang`, `ln6n_harga`, `ln1n_mata_uang`, `ln1n_harga`, `dnrb_mata_uang`, `dnrb_harga`, `dnfb_mata_uang`, `dnfb_harga`) VALUES
(1, 1, 'STD', 'STANDARD', 2, 625, 2, 750, 2, 100, -1, 0, -1, 0),
(2, 1, 'DEL', 'DELUXE', 2, 725, 2, 930, 2, 117, 1, 650000, 1, 550000),
(3, 1, 'SUP', 'SUPERIOR', 2, 800, 2, 1020, 2, 134, 1, 750000, 1, 625000),
(4, 1, 'VIP', 'VIP', 2, 850, 2, 1080, 2, 150, -1, 0, -1, 0),
(5, 2, 'STD', 'STANDARD', 2, 635, 2, 760, 2, 110, -1, 0, -1, 0),
(6, 2, 'DEL', 'DELUXE', 2, 735, 2, 940, 2, 127, 1, 800000, 1, 700000),
(7, 2, 'SUP', 'SUPERIOR', 2, 810, 2, 1030, 2, 144, 1, 900000, 1, 775000),
(8, 2, 'VIP', 'VIP', 2, 860, 2, 1090, 2, 160, -1, 0, -1, 0),
(9, 3, 'STD', 'STANDARD', 2, 650, 2, 775, 2, 125, -1, 0, -1, 0),
(10, 3, 'DEL', 'DELUXE', 2, 735, 2, 940, 2, 127, 1, 800000, 1, 700000),
(11, 3, 'SUP', 'SUPERIOR', 2, 810, 2, 1030, 2, 144, 1, 900000, 1, 775000),
(12, 3, 'VIP', 'VIP', 2, 860, 2, 1090, 2, 160, -1, 0, -1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t05_agent`
--

CREATE TABLE `t05_agent` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `komisi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t05_agent`
--

INSERT INTO `t05_agent` (`id`, `nama`, `komisi`) VALUES
(1, 'WS', 0.2),
(2, 'DIRECT', 0.3),
(3, 'TAKE OFF', 0),
(4, 'FOTOGRAFER', 0),
(5, 'NIC CHONG', 0),
(6, 'FREE', 0),
(7, 'OVERLAND', 0),
(8, 'BAYAR OVERSTAY', 0),
(9, '', 0),
(10, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t06_country`
--

CREATE TABLE `t06_country` (
  `id_country` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t06_country`
--

INSERT INTO `t06_country` (`id_country`, `country_name`) VALUES
(1, 'Aruba'),
(2, 'Afghanistan'),
(3, 'Angola'),
(4, 'Anguilla'),
(5, 'Åland'),
(6, 'Albania'),
(7, 'Andorra'),
(8, 'United Arab Emirates'),
(9, 'Argentina'),
(10, 'Armenia'),
(11, 'American Samoa'),
(12, 'Antarctica'),
(13, 'French Southern Territories'),
(14, 'Antigua and Barbuda'),
(15, 'Australia'),
(16, 'Austria'),
(17, 'Azerbaijan'),
(18, 'Burundi'),
(19, 'Belgium'),
(20, 'Benin'),
(21, 'Bonaire'),
(22, 'Burkina Faso'),
(23, 'Bangladesh'),
(24, 'Bulgaria'),
(25, 'Bahrain'),
(26, 'Bahamas'),
(27, 'Bosnia and Herzegovina'),
(28, 'Saint Barthélemy'),
(29, 'Belarus'),
(30, 'Belize'),
(31, 'Bermuda'),
(32, 'Bolivia'),
(33, 'Brazil'),
(34, 'Barbados'),
(35, 'Brunei'),
(36, 'Bhutan'),
(37, 'Bouvet Island'),
(38, 'Botswana'),
(39, 'Central African Republic'),
(40, 'Canada'),
(41, 'Cocos [Keeling] Islands'),
(42, 'Switzerland'),
(43, 'Chile'),
(44, 'China'),
(45, 'Ivory Coast'),
(46, 'Cameroon'),
(47, 'Democratic Republic of the Congo'),
(48, 'Republic of the Congo'),
(49, 'Cook Islands'),
(50, 'Colombia'),
(51, 'Comoros'),
(52, 'Cape Verde'),
(53, 'Costa Rica'),
(54, 'Cuba'),
(55, 'Curacao'),
(56, 'Christmas Island'),
(57, 'Cayman Islands'),
(58, 'Cyprus'),
(59, 'Czech Republic'),
(60, 'Germany'),
(61, 'Djibouti'),
(62, 'Dominica'),
(63, 'Denmark'),
(64, 'Dominican Republic'),
(65, 'Algeria'),
(66, 'Ecuador'),
(67, 'Egypt'),
(68, 'Eritrea'),
(69, 'Western Sahara'),
(70, 'Spain'),
(71, 'Estonia'),
(72, 'Ethiopia'),
(73, 'Finland'),
(74, 'Fiji'),
(75, 'Falkland Islands'),
(76, 'France'),
(77, 'Faroe Islands'),
(78, 'Micronesia'),
(79, 'Gabon'),
(80, 'United Kingdom'),
(81, 'Georgia'),
(82, 'Guernsey'),
(83, 'Ghana'),
(84, 'Gibraltar'),
(85, 'Guinea'),
(86, 'Guadeloupe'),
(87, 'Gambia'),
(88, 'Guinea-Bissau'),
(89, 'Equatorial Guinea'),
(90, 'Greece'),
(91, 'Grenada'),
(92, 'Greenland'),
(93, 'Guatemala'),
(94, 'French Guiana'),
(95, 'Guam'),
(96, 'Guyana'),
(97, 'Hong Kong'),
(98, 'Heard Island and McDonald Islands'),
(99, 'Honduras'),
(100, 'Croatia'),
(101, 'Haiti'),
(102, 'Hungary'),
(103, 'Indonesia'),
(104, 'Isle of Man'),
(105, 'India'),
(106, 'British Indian Ocean Territory'),
(107, 'Ireland'),
(108, 'Iran'),
(109, 'Iraq'),
(110, 'Iceland'),
(111, 'Israel'),
(112, 'Italy'),
(113, 'Jamaica'),
(114, 'Jersey'),
(115, 'Jordan'),
(116, 'Japan'),
(117, 'Kazakhstan'),
(118, 'Kenya'),
(119, 'Kyrgyzstan'),
(120, 'Cambodia'),
(121, 'Kiribati'),
(122, 'Saint Kitts and Nevis'),
(123, 'South Korea'),
(124, 'Kuwait'),
(125, 'Laos'),
(126, 'Lebanon'),
(127, 'Liberia'),
(128, 'Libya'),
(129, 'Saint Lucia'),
(130, 'Liechtenstein'),
(131, 'Sri Lanka'),
(132, 'Lesotho'),
(133, 'Lithuania'),
(134, 'Luxembourg'),
(135, 'Latvia'),
(136, 'Macao'),
(137, 'Saint Martin'),
(138, 'Morocco'),
(139, 'Monaco'),
(140, 'Moldova'),
(141, 'Madagascar'),
(142, 'Maldives'),
(143, 'Mexico'),
(144, 'Marshall Islands'),
(145, 'Macedonia'),
(146, 'Mali'),
(147, 'Malta'),
(148, 'Myanmar [Burma]'),
(149, 'Montenegro'),
(150, 'Mongolia'),
(151, 'Northern Mariana Islands'),
(152, 'Mozambique'),
(153, 'Mauritania'),
(154, 'Montserrat'),
(155, 'Martinique'),
(156, 'Mauritius'),
(157, 'Malawi'),
(158, 'Malaysia'),
(159, 'Mayotte'),
(160, 'Namibia'),
(161, 'New Caledonia'),
(162, 'Niger'),
(163, 'Norfolk Island'),
(164, 'Nigeria'),
(165, 'Nicaragua'),
(166, 'Niue'),
(167, 'Netherlands'),
(168, 'Norway'),
(169, 'Nepal'),
(170, 'Nauru'),
(171, 'New Zealand'),
(172, 'Oman'),
(173, 'Pakistan'),
(174, 'Panama'),
(175, 'Pitcairn Islands'),
(176, 'Peru'),
(177, 'Philippines'),
(178, 'Palau'),
(179, 'Papua New Guinea'),
(180, 'Poland'),
(181, 'Puerto Rico'),
(182, 'North Korea'),
(183, 'Portugal'),
(184, 'Paraguay'),
(185, 'Palestine'),
(186, 'French Polynesia'),
(187, 'Qatar'),
(188, 'Réunion'),
(189, 'Romania'),
(190, 'Russia'),
(191, 'Rwanda'),
(192, 'Saudi Arabia'),
(193, 'Sudan'),
(194, 'Senegal'),
(195, 'Singapore'),
(196, 'South Georgia and the South Sandwich Islands'),
(197, 'Saint Helena'),
(198, 'Svalbard and Jan Mayen'),
(199, 'Solomon Islands'),
(200, 'Sierra Leone'),
(201, 'El Salvador'),
(202, 'San Marino'),
(203, 'Somalia'),
(204, 'Saint Pierre and Miquelon'),
(205, 'Serbia'),
(206, 'South Sudan'),
(207, 'São Tomé and Príncipe'),
(208, 'Suriname'),
(209, 'Slovakia'),
(210, 'Slovenia'),
(211, 'Sweden'),
(212, 'Swaziland'),
(213, 'Sint Maarten'),
(214, 'Seychelles'),
(215, 'Syria'),
(216, 'Turks and Caicos Islands'),
(217, 'Chad'),
(218, 'Togo'),
(219, 'Thailand'),
(220, 'Tajikistan'),
(221, 'Tokelau'),
(222, 'Turkmenistan'),
(223, 'East Timor'),
(224, 'Tonga'),
(225, 'Trinidad and Tobago'),
(226, 'Tunisia'),
(227, 'Turkey'),
(228, 'Tuvalu'),
(229, 'Taiwan'),
(230, 'Tanzania'),
(231, 'Uganda'),
(232, 'Ukraine'),
(233, 'U.S. Minor Outlying Islands'),
(234, 'Uruguay'),
(235, 'United States'),
(236, 'Uzbekistan'),
(237, 'Vatican City'),
(238, 'Saint Vincent and the Grenadines'),
(239, 'Venezuela'),
(240, 'British Virgin Islands'),
(241, 'U.S. Virgin Islands'),
(242, 'Vietnam'),
(243, 'Vanuatu'),
(244, 'Wallis and Futuna'),
(245, 'Samoa'),
(246, 'Kosovo'),
(247, 'Yemen'),
(248, 'South Africa'),
(249, 'Zambia'),
(250, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `t07_kolom_payment`
--

CREATE TABLE `t07_kolom_payment` (
  `id` int(11) NOT NULL,
  `urutan` tinyint(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `mata_uang` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t07_kolom_payment`
--

INSERT INTO `t07_kolom_payment` (`id`, `urutan`, `nama`, `mata_uang`) VALUES
(1, 1, 'USD', 2),
(2, 2, 'AUD', 3),
(3, 3, '-', -1),
(4, 4, '-', -1),
(5, 5, 'PAYPAL', 2),
(6, 6, 'RP', 1),
(7, 7, 'CC BCA', 1),
(8, 8, 'CC MANDIRI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t30_bkm`
--

CREATE TABLE `t30_bkm` (
  `id` int(11) NOT NULL,
  `nomor` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `rate_usd` double NOT NULL,
  `rate_aud` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t30_bkm`
--

INSERT INTO `t30_bkm` (`id`, `nomor`, `tanggal`, `rate_usd`, `rate_aud`) VALUES
(1, 'T-02', '2020-07-01', 13900, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `t31_bkm_detail`
--

CREATE TABLE `t31_bkm_detail` (
  `id` int(11) NOT NULL,
  `bkm` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mf` varchar(10) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `id_number` varchar(50) DEFAULT NULL,
  `package` int(11) NOT NULL,
  `night` tinyint(4) NOT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date NOT NULL,
  `agent` int(11) NOT NULL,
  `mata_uang` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `usd` double DEFAULT NULL,
  `aud` double DEFAULT NULL,
  `paypal` double DEFAULT NULL,
  `bca_dollar` double DEFAULT NULL,
  `rp` double DEFAULT NULL,
  `cc_bca` double DEFAULT NULL,
  `cc_mandiri` double DEFAULT NULL,
  `price_1` text DEFAULT NULL,
  `price_1_value` text DEFAULT NULL,
  `fee_tanas` text DEFAULT NULL,
  `fee_tanas_value` text DEFAULT NULL,
  `price_2` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t31_bkm_detail`
--

INSERT INTO `t31_bkm_detail` (`id`, `bkm`, `name`, `mf`, `country`, `id_number`, `package`, `night`, `check_in`, `check_out`, `agent`, `mata_uang`, `price`, `remarks`, `usd`, `aud`, `paypal`, `bca_dollar`, `rp`, `cc_bca`, `cc_mandiri`, `price_1`, `price_1_value`, `fee_tanas`, `fee_tanas_value`, `price_2`) VALUES
(1, 1, 'Andrey Starcoff', NULL, NULL, NULL, 1, 6, '2020-07-15', '2020-07-21', 3, 2, 750, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' [$0000000025] * #,##0 ', '450', ' [$000000009] * #,##0 ', '100', 'US 2.150 * 13900'),
(2, 1, 'Vladimir', NULL, NULL, NULL, 1, 3, '2020-07-15', '2020-07-18', 3, 2, 625, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' [$0000000025] * #,##0 ', '450', ' [$0000000019] * #,##0 ', '50', ''),
(3, 1, 'Roman', NULL, NULL, NULL, 1, 3, '2020-07-15', '2020-07-18', 3, 2, 625, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' [$0000000025] * #,##0 ', '450', ' [$0000000019] * #,##0 ', '50', ''),
(4, 1, 'Alexander', NULL, NULL, NULL, 1, 3, '2020-07-15', '2020-07-18', 3, 2, 625, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' [$0000000026] * #,##0 ', '300', ' [$0000000019] * #,##0 ', '50', ''),
(5, 1, 'Shurik', NULL, NULL, NULL, 1, 6, '2020-07-15', '2020-07-21', 4, 2, 750, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' [$0000000014] * #,##0 ', '500', ' [$000000009] * #,##0 ', '100', ''),
(6, 1, 'Jarrod Moore', NULL, NULL, NULL, 1, 6, '2020-07-15', '2020-07-21', 2, 2, 750, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ' [$000000009] * #,##0 ', '100', 'Rp. 750.000 * 6N + Rp. 1.500.000 (fb) + 3%');

-- --------------------------------------------------------

--
-- Table structure for table `t32_bkm_detail_payment`
--

CREATE TABLE `t32_bkm_detail_payment` (
  `id` int(11) NOT NULL,
  `bkm_detail` int(11) NOT NULL,
  `kolom_payment` int(11) NOT NULL,
  `jumlah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t32_bkm_detail_payment`
--

INSERT INTO `t32_bkm_detail_payment` (`id`, `bkm_detail`, `kolom_payment`, `jumlah`) VALUES
(1, 1, 6, 29885000),
(2, 6, 7, 6180000);

-- --------------------------------------------------------

--
-- Table structure for table `t33_pembayaran`
--

CREATE TABLE `t33_pembayaran` (
  `id` int(11) NOT NULL,
  `bkm_detail` int(11) NOT NULL,
  `dibayar_oleh` int(11) NOT NULL,
  `mata_uang` int(11) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `selisih` int(11) DEFAULT NULL,
  `selisih_mata_uang` int(11) DEFAULT NULL,
  `selisih_jumlah` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t33_pembayaran`
--

INSERT INTO `t33_pembayaran` (`id`, `bkm_detail`, `dibayar_oleh`, `mata_uang`, `jumlah`, `selisih`, `selisih_mata_uang`, `selisih_jumlah`) VALUES
(1, 1, 1, 1, 29885000, NULL, NULL, NULL),
(2, 6, 6, 1, 6180000, NULL, NULL, NULL),
(3, 2, 1, NULL, NULL, NULL, NULL, NULL),
(4, 3, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t99_catatan`
--

CREATE TABLE `t99_catatan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t99_catatan`
--

INSERT INTO `t99_catatan` (`id`, `tanggal`, `catatan`) VALUES
(1, '2022-12-28', '<div xss=\"removed\">MASTER > PACKAGE<br>[ * ] belum bisa edit</div><div xss=\"removed\">[ * ] belum bisa tambah</div><div xss=\"removed\">[ * ] kebijakan tentang data package :</div><div xss=\"removed\">        - sudah baku</div><div xss=\"removed\">        - apakah boleh ditambah dan/atau dihapus ? >> <u>sementara tidak boleh ditambah dan/atau dihapus</u></div><div xss=\"removed\">[ * ] data default package sudah disiapkan dari awal sebagai data acuan awal</div><div xss=\"removed\">[ * ] untuk periode baru apakah copy atau buat baru ? >> <u>copy</u></div>'),
(2, '2022-12-28', '-- DONE --<br><br>MASTER > PACKAGE<br>- data default sudah disediakan oleh aplikasi untuk periode 01-01-2022'),
(3, '2022-12-29', '-- DONE -- <br>trial by Pak Budi<br>tampilan menu master > package<br>di sebelah kanan tanggal (edit) apa gak sebaiknya \"view\" aja ? jaga-jaga kalo nanti ada tabel package lama kan bisa nya cuman view aja, gak bisa di edit.\r\n\r\nreply:\r\nkalo nnti ada periode baru maka periode lama >> button nya berubah hanya VIEW, hanya periode baru yang bisa EDIT'),
(4, '2023-01-02', '-- DONE --<br><br>MASTER > JENIS SELISIH PEMBAYARAN<br>- tidak perlu ada MATA UANG,<br>- digunakan sebagai KETERANGAN atau PENJELASAN tentang selisih pembayaran,<br>- untuk nilainya nanti disesuaikan saat TRANSAKSI > PEMBAYARAN'),
(5, '2023-01-02', '<b>TRANSAKSI > BKM > IMPORT<br></b>- <b>issue</b> :: bila terjadi duplikasi data antara data template excel dengan data existing (data yang sudah tersimpan di database) maka yang dipertahankan adalah data existing\r\n- disiapkan laporan data duplikat<br>  - <i><b>result</b> :: -- PENDING --</i>'),
(6, '2023-01-02', '- <b>issue</b> :: fitur COPY dihilangkan<br>  - <i><b>result</b> :: -- DONE --</i>'),
(7, '2023-01-02', '<b>TRIAL MASTER > PACKAGE</b><br>- trial by Pak Budi<br>  - <i><b>result</b> :: -- DONE --</i>'),
(8, '2023-01-03', '<b>master > pembayaran > jenis pembayaran<br></b>- <b>issue</b> :: berisi kolom nama dan kode aja<br>- <b>need modify</b> :: kolom mata uang dihapus saja\r\n(yg akan ditampilkan di combo pembayaran nanti hanya nama)<br>  - <i><b>result</b> :: -- DONE --</i>'),
(9, '2023-01-03', 'master > country\r\n- berisi kolom country name saja\r\n- untuk kolom code monggo dimasukkan kalo memang perlu utk pemrograman\r\n- yg akan ditampilkan di combo impor bkm hanya country name'),
(10, '2023-01-21', '<b>Transaksi Pembayaran</b>,<br>- digabung pada menu TRANSAKSI > BKM<br>- klik icon selector pada data NOMOR BKM yang diinginkan<br>- klik DETAIL BKM<br>- tampilan berikutnya :: NOMOR BKM dan daftar DETAIL BKM<br>- klik icon selector pada data TAMU yang diinginkan<br>- klik PEMBAYARAN<br>- tampil berikutnya NOMOR BKM dan TAMU<br>- klik NEW'),
(11, '2023-01-26', '<span xss=removed>trial import bkm</span>:<br>- kurs diletakkan di F3 dan H3<br>- format TANGGAL BKM harus dd-mm-yyyy misal >> 01-07-2019, di contoh masih 7/1/2019<br>- kolom D untuk NIGHT harus terisi hanya angka misal >> 6, di contoh terisi 6 N<br>- format TANGGAL CHECK-OUT harus dd-mm-yyyy<br>- NAMA AGENT harus terdaftar dulu di MASTER - AGENT<br>- perlu ada notice andai NAMA AGENT belum terdaftar, dengan cara try dan thrown'),
(12, '2023-02-09', '<b><u>TRIAL IMPORT BKM</u></b><br>- <b>issue</b> :: edit bkm tidak bisa<br>  - <i><b>result</b> :: -- DONE --</i><br><br>- <b>issue</b> :: new popup utk edit detail bkm per tamu tidak bisa dipindah (fleksibel) sehingga menghalangi nama-nama tamu (utk edit remark jika ada pembayaran kolektif)<br>  - <i><b>result</b> :: -- PENDING --</i>'),
(13, '2023-05-29', '-&nbsp;<span xss=\"removed\"><b>issue</b></span> :: baris tanggal pada template tamu diletakkan dibawah no. bkm, baris rate di bawah tanggal<br>  - <i xss=removed><b>result</b> :: -- PENDING --</i><br><br>- <span xss=\"removed\"><b>issue</b></span> :: tool geser kanan di menu master tdk tampil ketika data belum end (habis)<br>  - <i><b>result</b> :: mohon maaf, karena default bawaan template memang seperti itu</i><br><br>- <span xss=\"removed\"><b>issue</b></span> :: kolom agent gak tampil sesuai master data import<br>  - <i><b>result</b> :: -- DONE --</i>'),
(14, '2023-05-31', '- <b>issue</b> :: hasil import BKM kolom Agent tidak keluar (kosong) karena di Master > Agent belum diinput agent yang sesuai, <b>need modify</b> :: konsep nya dibalik, kolom Agent dari hasil import BKM ditampilkan semua sesuai data excel dari Bali dan nama-nama agent tersebut otomatis akan masuk di Master > Agent<br>  - <i><b>result</b> :: -- DONE --</i>'),
(15, '2023-06-06', '- <b>issue</b> :: Master - Package, proses Tambah Data, masih error<br>  - <i><b>result</b> :: -- PENDING --</i>'),
(16, '2023-06-06', '- <b>issue</b> :: saat hapus data BKM ... harus menghapus data BKM Detail dan data Pembayaran BKM Detail<br>  - <i><span xss=\"removed\"><b xss=removed>result</b></span> :: -- PENDING --</i>'),
(18, '2023-06-06', '-&nbsp;<span xss=\"removed\"><b>issue</b></span> :: Kolom Payment apakah bisa dijadikan sebagai Jenis Pembayaran ?<br>- <span xss=\"removed\"><b>issue</b></span> :: misal Kolom Payment bisa dijadikan sebagai Jenis Pembayaran -> bagaimana jika ada pembayaran dengan BCA DOLLAR seperti di TAMU2 ?<br>- <span xss=\"removed\"><b>issue</b></span> :: misal tetep ada Kolom Payment ... dan tetep ada Jenis Pembayaran ... maka :: di Jenis Pembayaran harus disetting kolom payment nya ... untuk keperluan akumulasi data jumlah pembayaran pada kolom pembayaran di BKM ... apakah begitu ya pak ?'),
(20, '2023-06-06', '- <b>issue</b> :: mohon info mengenai Transaksi Pembayaran ... yang diinput apa saja ? yang sudah tak kerjakan :: input pembayaran meliputi ::<br>  - nama tamu<br>  - tanggal pembayaran<br>  - jenis pembayaran<br>  - jumlah pembayaran<br><br>  - pertanyaan :: bagaimana dengan mata uang pada jenis pembayaran ? apakah pada Master Jenis Pembayaran tidak perlu disetting mata uang nya ?<br>  - pertanyaan :: apabila tidak disetting mata uang nya :: bagaimana untuk konversi mata uang ke rupiah nya ?<br><br>a s l i m u m e t i k i . . . hahaha ...'),
(21, '2023-06-12', '- kolom pembayaran :: disesuaikan dengan master jenis pembayaran<br>- transaksi pembayaran,<br>   - dalam satu form ditampilkan semua informasi, mulai dari<br>      - harga sesuai pricelist (jumlah yang harus dibayar)<br>      - jenis selisih pricelist<br>      - jumlah pembayaran real (yang dibayar tamu)<br>      - jumlah potongan <br>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$10$s2L2FkWeoth4SpuPz.bSHeMmVcS9OlHgTCw1UIEyYR0fiweGaQjfG', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1689098667, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t00_mata_uang`
--
ALTER TABLE `t00_mata_uang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t01_jenis_pembayaran`
--
ALTER TABLE `t01_jenis_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t02_jenis_selisih_pembayaran`
--
ALTER TABLE `t02_jenis_selisih_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t03_periode`
--
ALTER TABLE `t03_periode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t04_package`
--
ALTER TABLE `t04_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t05_agent`
--
ALTER TABLE `t05_agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t06_country`
--
ALTER TABLE `t06_country`
  ADD PRIMARY KEY (`id_country`);

--
-- Indexes for table `t07_kolom_payment`
--
ALTER TABLE `t07_kolom_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t30_bkm`
--
ALTER TABLE `t30_bkm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t31_bkm_detail`
--
ALTER TABLE `t31_bkm_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t32_bkm_detail_payment`
--
ALTER TABLE `t32_bkm_detail_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t33_pembayaran`
--
ALTER TABLE `t33_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t99_catatan`
--
ALTER TABLE `t99_catatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t00_mata_uang`
--
ALTER TABLE `t00_mata_uang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `t01_jenis_pembayaran`
--
ALTER TABLE `t01_jenis_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t02_jenis_selisih_pembayaran`
--
ALTER TABLE `t02_jenis_selisih_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t03_periode`
--
ALTER TABLE `t03_periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t04_package`
--
ALTER TABLE `t04_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t05_agent`
--
ALTER TABLE `t05_agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t06_country`
--
ALTER TABLE `t06_country`
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `t07_kolom_payment`
--
ALTER TABLE `t07_kolom_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t30_bkm`
--
ALTER TABLE `t30_bkm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t31_bkm_detail`
--
ALTER TABLE `t31_bkm_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t32_bkm_detail_payment`
--
ALTER TABLE `t32_bkm_detail_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t33_pembayaran`
--
ALTER TABLE `t33_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t99_catatan`
--
ALTER TABLE `t99_catatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
