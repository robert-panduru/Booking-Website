-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 21, 2019 at 12:51 PM
-- Server version: 8.0.13-4
-- PHP Version: 7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c4rsd0QBSS`
--

-- --------------------------------------------------------

--
-- Table structure for table `Anunt`
--

CREATE TABLE `Anunt` (
  `ID_anunt` int(10) NOT NULL,
  `Titlu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Adresa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ID_ofertant` int(5) NOT NULL,
  `Pret` int(5) NOT NULL,
  `Inceput` datetime NOT NULL,
  `Final` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Anunt`
--

INSERT INTO `Anunt` (`ID_anunt`, `Titlu`, `Adresa`, `ID_ofertant`, `Pret`, `Inceput`, `Final`) VALUES
(1, 'Teren Tenis', 'Strada Popii', 1, 100, '2019-04-06 00:00:00', '2019-04-07 00:00:00'),
(2, 'Barosaneala cu baetii', 'Lizeanu', 1, 200, '2019-04-18 00:00:00', '2019-04-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Clienti`
--

CREATE TABLE `Clienti` (
  `ID_client` int(5) NOT NULL,
  `Nume` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Prenume` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Parola` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `E-mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Nr_telefon` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `Scor` int(2) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Clienti`
--

INSERT INTO `Clienti` (`ID_client`, `Nume`, `Prenume`, `Parola`, `E-mail`, `Nr_telefon`, `Scor`) VALUES
(1, 'Padureanu', 'Vasile', 'ayylmao', 'vasile@gmail.com', '+40321356672', 10);

-- --------------------------------------------------------

--
-- Table structure for table `Contract`
--

CREATE TABLE `Contract` (
  `ID_contract` int(10) NOT NULL,
  `ID_anunt` int(10) NOT NULL,
  `ID_ofertant` int(5) NOT NULL,
  `ID_client` int(5) NOT NULL,
  `Inceput` datetime NOT NULL,
  `Final` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Contract`
--

INSERT INTO `Contract` (`ID_contract`, `ID_anunt`, `ID_ofertant`, `ID_client`, `Inceput`, `Final`) VALUES
(1, 2, 1, 1, '2019-04-06 00:00:00', '2019-04-08 00:00:00'),
(2, 1, 1, 1, '2019-04-09 00:00:00', '2019-04-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Ofertanti`
--

CREATE TABLE `Ofertanti` (
  `ID_ofertant` int(5) NOT NULL,
  `Nume` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Prenume` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Parola` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `E-mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Nr_telefon` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `Scor` int(2) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Ofertanti`
--

INSERT INTO `Ofertanti` (`ID_ofertant`, `Nume`, `Prenume`, `Parola`, `E-mail`, `Nr_telefon`, `Scor`) VALUES
(1, 'Perfect', 'Perfect', 'Perfect', 'perfect@yahoo.com', '+40712345678', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Anunt`
--
ALTER TABLE `Anunt`
  ADD PRIMARY KEY (`ID_anunt`),
  ADD KEY `FK_id_ofertant` (`ID_ofertant`);

--
-- Indexes for table `Clienti`
--
ALTER TABLE `Clienti`
  ADD PRIMARY KEY (`ID_client`);

--
-- Indexes for table `Contract`
--
ALTER TABLE `Contract`
  ADD PRIMARY KEY (`ID_contract`),
  ADD KEY `FK_contract.anunt` (`ID_anunt`),
  ADD KEY `FK_contract.client` (`ID_client`),
  ADD KEY `FK_contract.ofertant` (`ID_ofertant`);

--
-- Indexes for table `Ofertanti`
--
ALTER TABLE `Ofertanti`
  ADD PRIMARY KEY (`ID_ofertant`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Anunt`
--
ALTER TABLE `Anunt`
  MODIFY `ID_anunt` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Clienti`
--
ALTER TABLE `Clienti`
  MODIFY `ID_client` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Contract`
--
ALTER TABLE `Contract`
  MODIFY `ID_contract` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Ofertanti`
--
ALTER TABLE `Ofertanti`
  MODIFY `ID_ofertant` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Anunt`
--
ALTER TABLE `Anunt`
  ADD CONSTRAINT `FK_id_ofertant` FOREIGN KEY (`ID_ofertant`) REFERENCES `Ofertanti` (`id_ofertant`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `Contract`
--
ALTER TABLE `Contract`
  ADD CONSTRAINT `FK_contract.anunt` FOREIGN KEY (`ID_anunt`) REFERENCES `Anunt` (`id_anunt`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_contract.client` FOREIGN KEY (`ID_client`) REFERENCES `Clienti` (`id_client`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_contract.ofertant` FOREIGN KEY (`ID_ofertant`) REFERENCES `Ofertanti` (`id_ofertant`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
