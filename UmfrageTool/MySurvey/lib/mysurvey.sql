-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 11. Jun 2016 um 14:00
-- Server-Version: 10.1.13-MariaDB
-- PHP-Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `mysurvey`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_1`
--

CREATE TABLE `tbl_1` (
  `id` int(11) NOT NULL,
  `Question` text CHARACTER SET latin1 NOT NULL,
  `Answer_1` text CHARACTER SET latin1 NOT NULL,
  `Answer_2` text CHARACTER SET latin1 NOT NULL,
  `Answer_3` text CHARACTER SET latin1 NOT NULL,
  `Answer_4` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_beitraege`
--

CREATE TABLE `tbl_beitraege` (
  `id` int(11) NOT NULL,
  `thread_ID` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_threads`
--

CREATE TABLE `tbl_threads` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_umfragen`
--

CREATE TABLE `tbl_umfragen` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tbl_umfragen`
--

INSERT INTO `tbl_umfragen` (`id`, `name`) VALUES
(1, 'Umfrage_1'),
(2, 'umfrage_2');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_1`
--
ALTER TABLE `tbl_1`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tbl_beitraege`
--
ALTER TABLE `tbl_beitraege`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tbl_threads`
--
ALTER TABLE `tbl_threads`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tbl_umfragen`
--
ALTER TABLE `tbl_umfragen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbl_1`
--
ALTER TABLE `tbl_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `tbl_beitraege`
--
ALTER TABLE `tbl_beitraege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `tbl_threads`
--
ALTER TABLE `tbl_threads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `tbl_umfragen`
--
ALTER TABLE `tbl_umfragen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
