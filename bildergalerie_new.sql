-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Mrz 2017 um 12:45
-- Server-Version: 10.1.19-MariaDB
-- PHP-Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `bildergalerie`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `id` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `passwort` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`id`, `email`, `passwort`) VALUES
(1, 'max.muster@example.com', 'gibbiX12345?');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bilder`
--

CREATE TABLE `bilder` (
  `id` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `pfad` varchar(254) NOT NULL,
  `name` varchar(254) NOT NULL,
  `endung` varchar(30) NOT NULL,
  `bildtyp` varchar(20) NOT NULL,
  `beschreibung` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `bilder`
--

INSERT INTO `bilder` (`id`, `gid`, `pfad`, `name`, `endung`, `bildtyp`, `beschreibung`) VALUES
(32, 0, 'Desert', '', 'jpg', 'image/jpeg', ''),
(33, 0, 'Lighthouse', '', 'jpg', 'image/jpeg', ''),
(34, 0, 'Penguins', '', 'jpg', 'image/jpeg', ''),
(35, 0, 'Lighthouse', '', 'jpg', 'image/jpeg', ''),
(36, 0, 'Chrysanthemum', '', 'jpg', 'image/jpeg', ''),
(37, 0, 'Jellyfish', '', 'jpg', 'image/jpeg', 'sdfgsdfff'),
(38, 0, '18', '', 'jpg', 'image/jpeg', ''),
(39, 0, '19', '', 'jpg', 'image/jpeg', ''),
(40, 0, '21', '', 'jpg', 'image/jpeg', ''),
(41, 0, '8', '', 'jpg', 'image/jpeg', ''),
(42, 0, '20', '', 'jpg', 'image/jpeg', ''),
(43, 0, '17', '', 'jpg', 'image/jpeg', ''),
(44, 0, '17', '', 'jpg', 'image/jpeg', ''),
(45, 17, 'jpg', '', 'image/jpeg', '', ''),
(46, 1, '19', '', 'jpg', 'image/jpeg', 'sddfghfgfg'),
(47, 1, '19', '', 'jpg', 'image/jpeg', 'sddfghfgfg'),
(48, 1, '19', '', 'jpg', 'image/jpeg', 'sddfghfgfg'),
(51, 8, '13', '', 'jpg', 'image/jpeg', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `galerie`
--

CREATE TABLE `galerie` (
  `id` int(11) NOT NULL,
  `name` varchar(254) NOT NULL,
  `uid` int(11) NOT NULL,
  `istPublik` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `galerie`
--

INSERT INTO `galerie` (`id`, `name`, `uid`, `istPublik`) VALUES
(1, 'MeineErsteGalerie', 1, b'0'),
(2, 'MeineOeffentlicheGalerie', 1, b'1'),
(4, 'MyGalerye', 9, b'1'),
(5, 'Standard', 10, b'0'),
(6, 'Galerie3', 10, b'1'),
(7, 'Galerie4', 10, b'1'),
(8, 'publik', 10, b'0');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indizes für die Tabelle `bilder`
--
ALTER TABLE `bilder`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT für Tabelle `bilder`
--
ALTER TABLE `bilder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT für Tabelle `galerie`
--
ALTER TABLE `galerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
