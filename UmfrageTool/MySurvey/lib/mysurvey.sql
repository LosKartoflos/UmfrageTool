-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Jun 2016 um 00:09
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
  `name` varchar(128) NOT NULL,
  `options` text NOT NULL,
  `hints` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tbl_umfragen`
--

INSERT INTO `tbl_umfragen` (`id`, `name`, `options`, `hints`) VALUES
(34, 'Wie heiÃŸt deine Mudda?', 'Else;Irmtraud;Gisela', '0;0;0'),
(35, 'Wie findest du?', 'sehr gut;gut;schlecht;sehr schlecht', '0;0;0;0');

--
-- Indizes der exportierten Tabellen
--

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
