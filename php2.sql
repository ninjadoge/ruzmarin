-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2019 at 09:36 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php2`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(12) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `email`, `adresa`, `telefon`, `lozinka`) VALUES
(1, 'Vladan', 'Ciric', 'vladanciric1994@gmail.com', 'Medakoviceva 88', '123', 'vladacira'),
(2, 'Petar', 'Peric', 'happynemac@gmail.com', 'Jovan', 'asdasdas', ''),
(4, 'asd', 'asd', 'rattlesnakesrbija@yahoo.com', 'asd', 'asd', '$2y$10$ZH24qzUgDmQNG4io.Z5Jb.4tqtKo81pOGRLpo2XKsuL32bduG5UFm'),
(5, 'petar', 'jovanovic', 'admin@gmail.com', 'mikica', '123', '$2y$10$Qfw5FkzBrgA8Gz2tPhuw5.P4NngMQ0MxZ/TC7UU/RAqKj5/.WxLGm'),
(6, 'qwe1', 'qwe2', 'stoka@gmail.com', 'qwe3', 'qwe4', '$2y$10$dez9vjoayySPsyOKASDzwO4pyOCPLa/XDOhAFep7sA26PDraUrv6u'),
(7, 'Ema', 'Beslac', 'emab95@gmail.com', 'Olge', '0644177380', '$2y$10$34JJ5zHmcORgV1Msn1onm.mqB8IwO77S/HmLUqbwRGwotVPNbqJ92');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id` int(11) NOT NULL,
  `naziv` varchar(40) NOT NULL,
  `deskripcija` varchar(250) NOT NULL,
  `slika` varchar(150) NOT NULL,
  `cena` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `naziv`, `deskripcija`, `slika`, `cena`) VALUES
(1, 'Nana', '', 'images/nana.jpg', 100),
(2, 'Ruzmarin', 'Ruzmarin je bogat etarskim uljem u ?iji sastav ulaze kamfor, cineol i pinen. Ruzmarin je žbunolika zimzelena biljka igli?astih listova i krhkih svetloplavih cvetova. Igli?asti listovi intenzivnog su mirisa, kao i pikantno ljutog, oporog i gorkog ukus', 'images/ruzmarin.jpg', 450),
(5, 'Žalfija', 'Medonosna i lekovita, žalfija jedna je od najstarijih medicinskih biljaka. U spisima je pominju svi anti?ki lekari, a u njenu lekovitost i dan danas se mnogo veruje. Lekovite osobine imaju samo listovi bogati ugljenim hidratima, celulozom, taninima i', 'images/zalfija.jpg', 600),
(9, 'Stevija', 'Stevija je višegodišnja zeljasta biljka iz porodice glavo?ika (Asteraceae). Najbolje uspeva u podru?jima mediteranske (suptropske)', 'images/1550345020stevija.jpg', 1400),
(10, 'Stevija', 'Stevija je višegodišnja zeljasta biljka iz porodice glavo?ika (Asteraceae). Najbolje uspeva u podru?jima mediteranske (suptropske)', 'images/1550345043stevija.jpg', 1500),
(11, 'Stevija', 'Stevija je višegodišnja zeljasta biljka iz porodice glavo?ika (Asteraceae). Najbolje uspeva u podru?jima mediteranske (suptropske)', 'images/1550346721stevija.jpg', 1500),
(12, 'Vlasac', 'Vlasac je otporna biljka, koja naraste do 50 cm visine. Korijen je duguljasta lukovica. Dugi izdanci su uski, okrugli, cjevasti listovi, zelene ili zeleno-sive boje.', 'images/1550347537chives.jpg', 100),
(13, 'Vlasac', '', 'images/1550347814chives.jpg', 1400);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
