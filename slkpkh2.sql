-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 05, 2015 at 06:55 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `slkpkh2`
--

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
