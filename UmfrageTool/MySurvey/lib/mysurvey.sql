-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 24. Jun 2016 um 13:01
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
-- Tabellenstruktur für Tabelle `tbl_hits`
--

CREATE TABLE `tbl_hits` (
  `id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `hits_1` int(11) DEFAULT NULL,
  `hits_2` int(11) DEFAULT NULL,
  `hits_3` int(11) DEFAULT NULL,
  `hits_4` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tbl_hits`
--

INSERT INTO `tbl_hits` (`id`, `survey_id`, `hits_1`, `hits_2`, `hits_3`, `hits_4`) VALUES
(1, 7, 1, 4, 1, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_surveys`
--

CREATE TABLE `tbl_surveys` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer_1` text NOT NULL,
  `answer_2` text NOT NULL,
  `answer_3` text NOT NULL,
  `answer_4` text NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tbl_surveys`
--

INSERT INTO `tbl_surveys` (`id`, `question`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `active`) VALUES
(7, 'Wie alt bist du?', '10', '20', '30', 'Ã¤lter...', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_hits`
--
ALTER TABLE `tbl_hits`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tbl_surveys`
--
ALTER TABLE `tbl_surveys`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbl_hits`
--
ALTER TABLE `tbl_hits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `tbl_surveys`
--
ALTER TABLE `tbl_surveys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
