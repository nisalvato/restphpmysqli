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
-- Struttura della tabella `film` creata per scopi futuri
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


NSERT INTO film (ID_film, titolo, sceneggiatore, produttore, nazione, durata, genere, anno, costo, incasso) VALUES
(1, 'Il Padrino', 'Mario Puzo', 'Albert S. Ruddy', 'USA', '175', 'Drammatico', '1972-03-24', 6000000, 250000000),
(2, 'Pulp Fiction', 'Quentin Tarantino', 'Lawrence Bender', 'USA', '154', 'Thriller', '1994-10-14', 8000000, 213900000),
(3, 'Inception', 'Christopher Nolan', 'Emma Thomas', 'USA', '148', 'Fantascienza', '2010-07-16', 160000000, 829895144),
(4, 'La vita è bella', 'Roberto Benigni', 'Gianluigi Braschi', 'Italia', '116', 'Drammatico', '1997-12-20', 20000000, 230098753),
(5, 'Titanic', 'James Cameron', 'Jon Landau', 'USA', '195', 'Romantico', '1997-12-19', 200000000, 2187463944),
(6, 'Il Gladiatore', 'David Franzoni', 'Douglas Wick', 'USA', '155', 'Storico', '2000-05-05', 103000000, 460583960),
(7, 'Matrix', 'Wachowski', 'Joel Silver', 'USA', '136', 'Fantascienza', '1999-03-31', 63000000, 463517383),
(8, 'Forrest Gump', 'Eric Roth', 'Wendy Finerman', 'USA', '142', 'Drammatico', '1994-07-06', 55000000, 678200000),
(9, 'Il Signore degli Anelli', 'Peter Jackson', 'Barrie M. Osborne', 'Nuova Zelanda', '178', 'Fantasy', '2001-12-19', 93000000, 871530324),
(10, 'Avatar', 'James Cameron', 'Jon Landau', 'USA', '162', 'Fantascienza', '2009-12-18', 237000000, 2923706026);


ALTER TABLE `dischi`
  ADD PRIMARY KEY (`NRcatalogo`);

--
-- Indici per le tabelle `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`ID_film`);
COMMIT;


