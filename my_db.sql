-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 10:36 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `anunt`
--

CREATE TABLE `anunt` (
  `ID_anunt` int(10) NOT NULL,
  `Titlu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Adresa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ID_ofertant` int(5) NOT NULL,
  `Pret` int(5) NOT NULL,
  `Inceput` datetime NOT NULL,
  `Final` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anunt`
--

INSERT INTO `anunt` (`ID_anunt`, `Titlu`, `Adresa`, `ID_ofertant`, `Pret`, `Inceput`, `Final`) VALUES
(1, 'Teren Tenis', 'Strada Popii', 1, 100, '2019-04-06 00:00:00', '2019-04-07 00:00:00'),
(2, 'Barosaneala cu baetii', 'Lizeanu', 1, 200, '2019-04-18 00:00:00', '2019-04-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `ID_client` int(5) NOT NULL,
  `Nume` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Prenume` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Parola` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `E-mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Nr_telefon` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `Scor` int(2) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`ID_client`, `Nume`, `Prenume`, `Parola`, `E-mail`, `Nr_telefon`, `Scor`) VALUES
(1, 'Padureanu', 'Vasile', 'ayylmao', 'vasile@gmail.com', '+40321356672', 10);

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `ID_contract` int(10) NOT NULL,
  `ID_anunt` int(10) NOT NULL,
  `ID_ofertant` int(5) NOT NULL,
  `ID_client` int(5) NOT NULL,
  `Inceput` datetime NOT NULL,
  `Final` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`ID_contract`, `ID_anunt`, `ID_ofertant`, `ID_client`, `Inceput`, `Final`) VALUES
(1, 2, 1, 1, '2019-04-06 00:00:00', '2019-04-08 00:00:00'),
(2, 1, 1, 1, '2019-04-09 00:00:00', '2019-04-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ofertanti`
--

CREATE TABLE `ofertanti` (
  `ID_ofertant` int(5) NOT NULL,
  `Nume` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Prenume` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Parola` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `E-mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Nr_telefon` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `Scor` int(2) NOT NULL DEFAULT '10',
  `Username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ofertanti`
--

INSERT INTO `ofertanti` (`ID_ofertant`, `Nume`, `Prenume`, `Parola`, `E-mail`, `Nr_telefon`, `Scor`, `Username`, `Password`) VALUES
(1, 'Perfect', 'Perfect', 'Perfect', 'perfect@yahoo.com', '+40712345678', 10, 'geani123', 'geanina123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Age` int(3) NOT NULL,
  `Hometown` varchar(30) NOT NULL,
  `Job` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `FirstName`, `LastName`, `Age`, `Hometown`, `Job`) VALUES
(1, 'Peter', 'Griffin', 41, 'Quahog', 'Brewery'),
(2, 'Lois', 'Griffin', 40, 'Newport', 'Teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anunt`
--
ALTER TABLE `anunt`
  ADD PRIMARY KEY (`ID_anunt`),
  ADD KEY `FK_id_ofertant` (`ID_ofertant`);

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`ID_client`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`ID_contract`),
  ADD KEY `FK_contract.anunt` (`ID_anunt`),
  ADD KEY `FK_contract.client` (`ID_client`),
  ADD KEY `FK_contract.ofertant` (`ID_ofertant`);

--
-- Indexes for table `ofertanti`
--
ALTER TABLE `ofertanti`
  ADD PRIMARY KEY (`ID_ofertant`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anunt`
--
ALTER TABLE `anunt`
  MODIFY `ID_anunt` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clienti`
--
ALTER TABLE `clienti`
  MODIFY `ID_client` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `ID_contract` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ofertanti`
--
ALTER TABLE `ofertanti`
  MODIFY `ID_ofertant` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anunt`
--
ALTER TABLE `anunt`
  ADD CONSTRAINT `FK_id_ofertant` FOREIGN KEY (`ID_ofertant`) REFERENCES `ofertanti` (`ID_ofertant`);

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `FK_contract.anunt` FOREIGN KEY (`ID_anunt`) REFERENCES `anunt` (`ID_anunt`),
  ADD CONSTRAINT `FK_contract.client` FOREIGN KEY (`ID_client`) REFERENCES `clienti` (`ID_client`),
  ADD CONSTRAINT `FK_contract.ofertant` FOREIGN KEY (`ID_ofertant`) REFERENCES `ofertanti` (`ID_ofertant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
