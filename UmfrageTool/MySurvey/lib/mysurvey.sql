-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 29. Jun 2016 um 16:37
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
-- Tabellenstruktur für Tabelle `hits_gritzbach_walther`
--

CREATE TABLE `hits_gritzbach_walther` (
  `id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `hits_1` int(11) DEFAULT NULL,
  `hits_2` int(11) DEFAULT NULL,
  `hits_3` int(11) DEFAULT NULL,
  `hits_4` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `hits_gritzbach_walther`
--

INSERT INTO `hits_gritzbach_walther` (`id`, `survey_id`, `hits_1`, `hits_2`, `hits_3`, `hits_4`) VALUES
(1, 7, 3, 4, 1, 4),
(4, 10, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `surveys_gritzbach_walther`
--

CREATE TABLE `surveys_gritzbach_walther` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer_1` text NOT NULL,
  `answer_2` text NOT NULL,
  `answer_3` text NOT NULL,
  `answer_4` text NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `surveys_gritzbach_walther`
--

INSERT INTO `surveys_gritzbach_walther` (`id`, `question`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `active`) VALUES
(7, 'Wie alt bist du?', '10', '20', '30', 'Ã¤lter...', 1),
(10, 'Was ist gelb?', 'Sonne', 'Himmel', 'Wasser', 'Blut', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `hits_gritzbach_walther`
--
ALTER TABLE `hits_gritzbach_walther`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `surveys_gritzbach_walther`
--
ALTER TABLE `surveys_gritzbach_walther`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `hits_gritzbach_walther`
--
ALTER TABLE `hits_gritzbach_walther`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `surveys_gritzbach_walther`
--
ALTER TABLE `surveys_gritzbach_walther`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
