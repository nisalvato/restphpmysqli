-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 20, 2023 alle 16:12
-- Versione del server: 10.4.20-MariaDB
-- Versione PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediateca`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `dischi`
--

CREATE TABLE `dischi` (
  `NRcatalogo` varchar(12) NOT NULL,
  `titolo` varchar(40) DEFAULT NULL,
  `interprete` varchar(40) DEFAULT NULL,
  `genere` varchar(40) DEFAULT NULL,
  `etichetta` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `dischi`
--

INSERT INTO `dischi` (`NRcatalogo`, `titolo`, `interprete`, `genere`, `etichetta`) VALUES
('MDF33118', 'Suspiria', 'Goblin', 'Soundtrack', 'Cinevox'),
('MDF3385', 'Profondo Rosso', 'Goblin', 'Soundtrack', 'Cinevox'),
('PMCQ31510', 'Revolver', 'The Beatles ', 'Rock', 'Parlophon'),
('SHVL802', 'Meddle', 'Pink Floyd', 'Rock', 'Harvest'),
('SHVL804', 'Ummagumma', 'Pink Floyd', 'Rock', 'Harvest'),
('SMRL6107', 'Darwin', 'Banco del Mutuo Soccorso', 'Progressivo', 'Sony Music');

-- --------------------------------------------------------

--
-- Struttura della tabella `film`
--

CREATE TABLE `film` (
  `ID_film` int(11) NOT NULL,
  `titolo` varchar(50) DEFAULT NULL,
  `sceneggiatore` varchar(50) DEFAULT NULL,
  `produttore` varchar(50) DEFAULT NULL,
  `nazione` varchar(50) DEFAULT NULL,
  `durata` varchar(50) DEFAULT NULL,
  `genere` varchar(50) DEFAULT NULL,
  `anno` date DEFAULT NULL,
  `costo` int(11) DEFAULT NULL,
  `incasso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `generi`
--
-- Si è verificato un errore durante la lettura della struttura della tabella mediateca.generi: #1932 - Table 'mediateca.generi' doesn't exist in engine
-- Si è verificato un errore durante la lettura dei dati della tabella mediateca.generi: #1064 - Errore di sintassi nella query SQL vicino a 'FROM `mediateca`.`generi`' linea 1

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `dischi`
--
ALTER TABLE `dischi`
  ADD PRIMARY KEY (`NRcatalogo`);

--
-- Indici per le tabelle `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`ID_film`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
