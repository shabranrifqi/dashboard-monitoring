-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26 Okt 2016 pada 18.56
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_rjw`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `t_dshr`
--
CREATE TABLE `t_dshr` (
`area` varchar(30)
,`order_tiket` int(11)
,`close` int(11)
,`performansi` decimal(10,0)
,`tanggal` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `t_gangguan`
--
CREATE TABLE `t_gangguan` (
`area` varchar(30)
,`order_tiket` int(11)
,`close` int(11)
,`performansi` decimal(10,0)
,`tanggal` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `t_migrasi`
--
CREATE TABLE `t_migrasi` (
`area` varchar(30)
,`order_tiket` int(11)
,`close` int(11)
,`performansi` decimal(10,0)
,`tanggal` varchar(30)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_performansi`
--

CREATE TABLE `t_performansi` (
  `id` int(11) NOT NULL,
  `area` varchar(30) NOT NULL,
  `order_tiket` int(11) NOT NULL,
  `close` int(11) NOT NULL,
  `performansi` decimal(10,0) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `tiket` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_performansi`
--

INSERT INTO `t_performansi` (`id`, `area`, `order_tiket`, `close`, `performansi`, `tanggal`, `tiket`) VALUES
(11, 'Rajawali 1', 100, 80, '80', '01-10-2016', 'Gangguan'),
(12, 'Rajawali 1', 20, 20, '100', '01-10-2016', 'Provisioning'),
(13, 'Rajawali 1', 5, 5, '100', '01-10-2016', 'Migrasi'),
(14, 'Rajawali 1', 3, 3, '100', '01-10-2016', 'DSHR'),
(15, 'Rajawali 2', 20, 20, '100', '01-10-2016', 'Gangguan'),
(16, 'Rajawali 2', 30, 30, '100', '01-10-2016', 'Provisioning'),
(17, 'Rajawali 2', 60, 60, '100', '01-10-2016', 'Migrasi'),
(18, 'Rajawali 2', 5, 5, '100', '01-10-2016', 'DSHR'),
(19, 'Rajawali 3', 50, 25, '50', '01-10-2016', 'Provisioning'),
(20, 'Rajawali 5', 100, 90, '90', '01-10-2016', 'Gangguan'),
(21, 'Rajawali 4', 50, 50, '100', '01-10-2016', 'Gangguan'),
(22, 'Rajawali 3', 30, 30, '100', '01-10-2016', 'Gangguan'),
(23, 'Rajawali 5', 30, 30, '100', '01-10-2016', 'Gangguan'),
(24, 'Rajawali 1', 30, 30, '100', '02-10-2016', 'Gangguan'),
(25, 'Rajawali 1', 30, 30, '100', '03-10-2016', 'Gangguan'),
(26, 'Rajawali 1', 20, 20, '100', '05-10-2016', 'Gangguan'),
(27, 'Rajawali 1', 30, 30, '100', '06-10-2016', 'Gangguan'),
(29, 'Rajawali 1', 20, 15, '75', '07-10-2016', 'Gangguan'),
(30, 'Rajawali 1', 19, 18, '95', '08-10-2016', 'Gangguan');

-- --------------------------------------------------------

--
-- Stand-in structure for view `t_provisioning`
--
CREATE TABLE `t_provisioning` (
`area` varchar(30)
,`order_tiket` int(11)
,`close` int(11)
,`performansi` decimal(10,0)
,`tanggal` varchar(30)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', 'admin', '', 'admin'),
(2, 'spv', 'spv', '', '');

-- --------------------------------------------------------

--
-- Struktur untuk view `t_dshr`
--
DROP TABLE IF EXISTS `t_dshr`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `t_dshr`  AS  select `t_performansi`.`area` AS `area`,`t_performansi`.`order_tiket` AS `order_tiket`,`t_performansi`.`close` AS `close`,`t_performansi`.`performansi` AS `performansi`,`t_performansi`.`tanggal` AS `tanggal` from `t_performansi` where (`t_performansi`.`tiket` = 'Dshr') ;

-- --------------------------------------------------------

--
-- Struktur untuk view `t_gangguan`
--
DROP TABLE IF EXISTS `t_gangguan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `t_gangguan`  AS  select `t_performansi`.`area` AS `area`,`t_performansi`.`order_tiket` AS `order_tiket`,`t_performansi`.`close` AS `close`,`t_performansi`.`performansi` AS `performansi`,`t_performansi`.`tanggal` AS `tanggal` from `t_performansi` where (`t_performansi`.`tiket` = 'Gangguan') ;

-- --------------------------------------------------------

--
-- Struktur untuk view `t_migrasi`
--
DROP TABLE IF EXISTS `t_migrasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `t_migrasi`  AS  select `t_performansi`.`area` AS `area`,`t_performansi`.`order_tiket` AS `order_tiket`,`t_performansi`.`close` AS `close`,`t_performansi`.`performansi` AS `performansi`,`t_performansi`.`tanggal` AS `tanggal` from `t_performansi` where (`t_performansi`.`tiket` = 'Migrasi') ;

-- --------------------------------------------------------

--
-- Struktur untuk view `t_provisioning`
--
DROP TABLE IF EXISTS `t_provisioning`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `t_provisioning`  AS  select `t_performansi`.`area` AS `area`,`t_performansi`.`order_tiket` AS `order_tiket`,`t_performansi`.`close` AS `close`,`t_performansi`.`performansi` AS `performansi`,`t_performansi`.`tanggal` AS `tanggal` from `t_performansi` where (`t_performansi`.`tiket` = 'Provisioning') ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_performansi`
--
ALTER TABLE `t_performansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_performansi`
--
ALTER TABLE `t_performansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
