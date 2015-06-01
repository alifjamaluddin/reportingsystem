-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jun 01, 2015 at 09:24 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `slkpkh2`
--

-- --------------------------------------------------------

--
-- Table structure for table `hukuman`
--

CREATE TABLE `hukuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hukuman`
--

INSERT INTO `hukuman` (`id`, `nama`) VALUES
(0, 'Belum ditetapkan'),
(1, 'Tahanan cuti'),
(2, 'Kawad tambahan'),
(3, 'Gantung Belajar'),
(4, 'Potong elaun');

-- --------------------------------------------------------

--
-- Table structure for table `kesalahan`
--

CREATE TABLE `kesalahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `kesalahan`
--

INSERT INTO `kesalahan` (`id`, `nama`) VALUES
(1, 'Tidak hadir kuliah/tutorial/amali/penilaian akademik tanpa sebab munasabah'),
(2, 'Lapor sakit Attend B, tetapi tidak hadir kuliah/tutorial/amali/penilaian akademik'),
(3, 'Tidur sewaktu kuliah/tutorial/amali/penilaian akademik'),
(4, 'Terlewat masuk kelas kuliah/tutorial/amali/penilaian akademik'),
(5, 'Menipu/meniru dalam penilaian akademik'),
(6, 'Keputusan penilaian akademik tidak memuaskan'),
(7, 'Tidak membawa kelengkapan perang2');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL AUTO_INCREMENT,
  `kadet` varchar(10) NOT NULL,
  `tarikh` date NOT NULL,
  `masa` time NOT NULL,
  `pelapor` varchar(100) NOT NULL,
  `matapelajaran` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `kesalahan` int(11) NOT NULL,
  `hukuman` int(11) NOT NULL,
  `dekansah` varchar(15) NOT NULL DEFAULT 'Dalam semakan',
  `catatan` varchar(200) NOT NULL,
  PRIMARY KEY (`id_laporan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `kadet`, `tarikh`, `masa`, `pelapor`, `matapelajaran`, `status`, `kesalahan`, `hukuman`, `dekansah`, `catatan`) VALUES
(4, '12345', '2015-05-05', '13:00:00', 'abcd', 'Sains ', 'Dilaksanakan', 1, 1, 'Sah', 'Test jer kot2');

-- --------------------------------------------------------

--
-- Table structure for table `pkdt`
--

CREATE TABLE `pkdt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_matrik` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_tentera` varchar(10) NOT NULL,
  `pengambilan` int(10) NOT NULL,
  `batalion` varchar(10) NOT NULL,
  `fakulti` varchar(10) NOT NULL,
  `penyelia_akademik` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_matrik` (`no_matrik`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pkdt`
--

INSERT INTO `pkdt` (`id`, `no_matrik`, `nama`, `no_tentera`, `pengambilan`, `batalion`, `fakulti`, `penyelia_akademik`) VALUES
(1, '2120471', 'Siti Aminah binti Abdullah', '301361', 2011, 'Kasturi', 'fstp', 'Dr. Ali Imran'),
(3, '2120472', 'Ali Bin Abu', '12345', 2003, 'A-Team', 'FSKTM', 'Dr Ahmad');

-- --------------------------------------------------------

--
-- Table structure for table `t141_level`
--

CREATE TABLE `t141_level` (
  `f140idlevel` int(11) NOT NULL AUTO_INCREMENT,
  `f140penerangan` varchar(255) NOT NULL,
  `f140catatan` varchar(255) NOT NULL,
  PRIMARY KEY (`f140idlevel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `t141_level`
--

INSERT INTO `t141_level` (`f140idlevel`, `f140penerangan`, `f140catatan`) VALUES
(1, 'Administrator', 'Administrator'),
(2, 'Pelapor', 'Pensyarah'),
(3, 'ALK', 'Ketua Batalion'),
(4, 'Dekan', 'Dekan');

-- --------------------------------------------------------

--
-- Table structure for table `t142_akaun`
--

CREATE TABLE `t142_akaun` (
  `f142idakaun` int(11) NOT NULL AUTO_INCREMENT,
  `f142noID` varchar(20) NOT NULL,
  `f142password` varchar(255) NOT NULL,
  `f142email` varchar(255) NOT NULL,
  `f142Name` varchar(255) NOT NULL,
  `f142idlevel` int(11) NOT NULL,
  `f142photo` varchar(255) DEFAULT NULL,
  `f142ipadd` varchar(255) DEFAULT NULL,
  `f142thupdate` date DEFAULT NULL,
  `f142updateby` varchar(255) DEFAULT NULL,
  `f142catatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`f142idakaun`),
  UNIQUE KEY `f142noIC` (`f142noID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20806 ;

--
-- Dumping data for table `t142_akaun`
--

INSERT INTO `t142_akaun` (`f142idakaun`, `f142noID`, `f142password`, `f142email`, `f142Name`, `f142idlevel`, `f142photo`, `f142ipadd`, `f142thupdate`, `f142updateby`, `f142catatan`) VALUES
(20789, '3013456', 'd6a9a933c8aafc51e55ac0662b6e4d4a', 'nikmuzamer@gmal.com', 'NIK MUZAMER', 3, 'img/default-avatar.png', NULL, NULL, NULL, NULL),
(20795, '0015-05', 'e19d5cd5af0378da05f63f891c7467af', '', 'ZURAINI ZAINOL', 2, 'img/default-avatar.png', NULL, NULL, NULL, NULL),
(20802, 'abcd', 'e19d5cd5af0378da05f63f891c7467af', 'admin@email.com', 'Alif Jamaluddin', 3, 'img/default-avatar.png', NULL, NULL, NULL, NULL);
