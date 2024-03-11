-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Gen 25, 2024 alle 13:37
-- Versione del server: 10.1.13-MariaDB
-- Versione PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labsres`
--
CREATE DATABASE IF NOT EXISTS `labsres` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `labsres`;

-- --------------------------------------------------------

--
-- Struttura della tabella `classe`
--

CREATE TABLE `classe` (
  `codice_classe` varchar(8) NOT NULL,
  `nome_classe` varchar(4) NOT NULL,
  `anno_scolastico` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `docente`
--

CREATE TABLE `docente` (
  `codice_Docente` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `laboratorio`
--

CREATE TABLE `laboratorio` (
  `codice_laboratorio` varchar(3) NOT NULL,
  `nome_Laboratorio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `codice_prenotazioni` int(11) NOT NULL,
  `data_prenotazioni` varchar(255) NOT NULL,
  `ora_prenotazioni` varchar(255) NOT NULL,
  `codice_laboratorio` varchar(3) NOT NULL,
  `codice_docente` varchar(255) NOT NULL,
  `codice_classe` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`codice_classe`);

--
-- Indici per le tabelle `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`codice_Docente`);

--
-- Indici per le tabelle `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`codice_laboratorio`);

--
-- Indici per le tabelle `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`codice_prenotazioni`),
  ADD KEY `codice_laboratorio` (`codice_laboratorio`),
  ADD KEY `codice_docente` (`codice_docente`),
  ADD KEY `codice_classe` (`codice_classe`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD CONSTRAINT `prenotazioni_ibfk_1` FOREIGN KEY (`codice_laboratorio`) REFERENCES `laboratorio` (`codice_laboratorio`),
  ADD CONSTRAINT `prenotazioni_ibfk_2` FOREIGN KEY (`codice_docente`) REFERENCES `docente` (`codice_Docente`),
  ADD CONSTRAINT `prenotazioni_ibfk_3` FOREIGN KEY (`codice_classe`) REFERENCES `classe` (`codice_classe`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
