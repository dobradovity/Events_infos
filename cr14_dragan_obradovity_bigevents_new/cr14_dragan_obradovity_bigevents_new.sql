-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 04. Mai 2018 um 22:22
-- Server-Version: 5.6.38
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr14_dragan_obradovity_bigevents_new`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `events_name` varchar(255) NOT NULL,
  `events_date_and_time` date NOT NULL,
  `events_description` varchar(255) NOT NULL,
  `events_image` varbinary(500) NOT NULL,
  `events_capacity` varchar(255) NOT NULL,
  `events_contact_e_mail` varchar(255) NOT NULL,
  `events_contact_phone_number` varchar(255) NOT NULL,
  `events_address` varchar(255) NOT NULL,
  `events_url` varchar(255) NOT NULL,
  `events_type` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `events`
--

INSERT INTO `events` (`id`, `events_name`, `events_date_and_time`, `events_description`, `events_image`, `events_capacity`, `events_contact_e_mail`, `events_contact_phone_number`, `events_address`, `events_url`, `events_type`, `active`) VALUES
(1, 'Álvaro Soler Concerts', '2018-03-23', 'Music Concert', 0x68747470733a2f2f7777772e616c7661726f736f6c65722e636f6d2f696d672f616c62756d2d657465726e6f2d61676f73746f2e6a7067, '230', 'alvaro@example.es', '+43123456789', 'Wiener Stadthalle', 'https://www.alvarosoler.com', 'Music', 0),
(20, 'Lorenzo Fragola', '2018-08-09', 'Music Festival', '', '2400', 'lorenzo_fragola@example.com', '+34 (12) 3456789', 'Donauinselfest', 'https://de-de.facebook.com/lorenzostrawberry/', 'Music Po', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`) VALUES
(1, 'admin', 'admin@admin.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
(2, 'asaa', 'a@la.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
