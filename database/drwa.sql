-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2019 at 07:28 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(100) NOT NULL,
  `ime_prezime` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lozinka` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime_prezime`, `email`, `lozinka`) VALUES
(2, 'Dusan Rajkovic', 'dusanrajkovic.dr@gmail.com', '12345678'),
(4, 'Milos Milicevic', 'milos.milicevic@dalkom.rs', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `kvarovi`
--

CREATE TABLE `kvarovi` (
  `ID` int(100) NOT NULL,
  `radnik` varchar(100) NOT NULL,
  `vozilo` varchar(100) NOT NULL,
  `reg_broj` varchar(100) NOT NULL,
  `opis` longtext NOT NULL,
  `datum` varchar(100) NOT NULL,
  `vreme` varchar(100) NOT NULL,
  `di_naloga` varchar(100) NOT NULL,
  `vi_naloga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kvarovi`
--

INSERT INTO `kvarovi` (`ID`, `radnik`, `vozilo`, `reg_broj`, `opis`, `datum`, `vreme`, `di_naloga`, `vi_naloga`) VALUES
(39, 'Petar Petrovic', 'Fiat Punto', '5555', 'Kvar kvar Kvar kvar Kvar kvar Kvar kvar Kvar kvar Kvar kvar Kvar kvar Kvar kvar Kvar kvar Kvar kvarKvar kvar Kvar kvar', '22.02.2019', '10:11', '22.02.2019', '10:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `materijal`
--

CREATE TABLE `materijal` (
  `id` int(100) NOT NULL,
  `naziv` varchar(100) NOT NULL,
  `stanje` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materijal`
--

INSERT INTO `materijal` (`id`, `naziv`, `stanje`) VALUES
(1, 'Krovni pano KP-1', 22),
(2, 'Krovni pano KP-2', 22),
(3, 'Krovni pano KP-3', 22),
(4, 'Krovni pano KP-4', 22),
(5, 'Krovni pano KP-5\r\n\r\n\r\n', 22);

-- --------------------------------------------------------

--
-- Table structure for table `radnici`
--

CREATE TABLE `radnici` (
  `id` int(100) NOT NULL,
  `imeprezime` varchar(100) NOT NULL,
  `satnica` decimal(10,0) NOT NULL DEFAULT '0',
  `radni_dani` int(100) NOT NULL DEFAULT '0',
  `radni_sati` float NOT NULL DEFAULT '0',
  `mesecna_zarada` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `radnici`
--

INSERT INTO `radnici` (`id`, `imeprezime`, `satnica`, `radni_dani`, `radni_sati`, `mesecna_zarada`) VALUES
(1, 'Petar Petrovic', '300', 0, 0, 0),
(2, 'Marko Markovic', '300', 0, 0, 0),
(6, 'Ana Panic', '10', 0, 0, 0),
(7, 'Ena Monic', '130', 0, 0, 0),
(14, 'Milan Milanic', '4', 0, 0, 0),
(15, 'Milica Petrovic', '300', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ts`
--

CREATE TABLE `ts` (
  `id` int(100) NOT NULL,
  `naziv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts`
--

INSERT INTO `ts` (`id`, `naziv`) VALUES
(2, 'C1'),
(3, 'D1');

-- --------------------------------------------------------

--
-- Table structure for table `tsmaterijal`
--

CREATE TABLE `tsmaterijal` (
  `id` int(100) NOT NULL,
  `tsid` int(100) NOT NULL,
  `materijal_id` int(100) NOT NULL,
  `potrebno_komada` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsmaterijal`
--

INSERT INTO `tsmaterijal` (`id`, `tsid`, `materijal_id`, `potrebno_komada`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 2),
(24, 2, 1, 2),
(25, 2, 2, 2),
(26, 3, 3, 3),
(27, 3, 4, 4),
(30, 1, 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kvarovi`
--
ALTER TABLE `kvarovi`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `materijal`
--
ALTER TABLE `materijal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radnici`
--
ALTER TABLE `radnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ts`
--
ALTER TABLE `ts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tsmaterijal`
--
ALTER TABLE `tsmaterijal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kvarovi`
--
ALTER TABLE `kvarovi`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `materijal`
--
ALTER TABLE `materijal`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `radnici`
--
ALTER TABLE `radnici`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ts`
--
ALTER TABLE `ts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tsmaterijal`
--
ALTER TABLE `tsmaterijal`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
