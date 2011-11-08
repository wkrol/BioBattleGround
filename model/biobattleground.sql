-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 08 Lis 2011, 09:33
-- Wersja serwera: 5.5.16
-- Wersja PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `biobattleground`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `climate`
--

CREATE TABLE IF NOT EXISTS `climate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `sun` int(11) DEFAULT NULL,
  `rain` int(11) DEFAULT NULL,
  `wind` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_privileges` int(11) DEFAULT NULL,
  `id_organism` int(11) DEFAULT NULL,
  `id_simulation` int(11) DEFAULT NULL,
  `survive` tinyint(1) DEFAULT NULL,
  `average_life_length` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `deaths` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_organism` (`id_organism`),
  KEY `id_simulation` (`id_simulation`),
  KEY `id_user_privileges` (`id_user_privileges`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `map`
--

CREATE TABLE IF NOT EXISTS `map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `map_string` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `organism`
--

CREATE TABLE IF NOT EXISTS `organism` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `instinct` int(11) DEFAULT NULL,
  `toughness` int(11) DEFAULT NULL,
  `vitality` int(11) DEFAULT NULL,
  `type` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=5 ;


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `round`
--

CREATE TABLE IF NOT EXISTS `round` (
  `id` int(11) NOT NULL,
  `id_organism` int(11) DEFAULT NULL,
  `id_simulation` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `avg_hunger` int(11) DEFAULT NULL,
  `avg_hitPoints` int(11) DEFAULT NULL,
  `number_of_newborn` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_organism` (`id_organism`),
  KEY `id_simulation` (`id_simulation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `simulation`
--

CREATE TABLE IF NOT EXISTS `simulation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_climate` int(11) DEFAULT NULL,
  `id_map` int(11) DEFAULT NULL,
  `simulation_length` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_map` (`id_map`),
  KEY `id_climate` (`id_climate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `simulation_privileges`
--

CREATE TABLE IF NOT EXISTS `simulation_privileges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `create` tinyint(1) DEFAULT NULL,
  `join` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_UNIQUE` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `user_privileges`
--

CREATE TABLE IF NOT EXISTS `user_privileges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_organism` int(11) DEFAULT NULL,
  `id_map` int(11) DEFAULT NULL,
  `id_climate` int(11) DEFAULT NULL,
  `play` tinyint(1) DEFAULT NULL,
  `fight` tinyint(1) DEFAULT NULL,
  `edit` tinyint(1) DEFAULT NULL,
  `show_stats` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_organizm` (`id_organism`),
  KEY `id_user` (`id_user`),
  KEY `id_map` (`id_map`),
  KEY `id_climate` (`id_climate`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;


--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `id_gp_organism` FOREIGN KEY (`id_organism`) REFERENCES `organism` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_gp_simulation` FOREIGN KEY (`id_simulation`) REFERENCES `simulation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_gp_user_privileges` FOREIGN KEY (`id_user_privileges`) REFERENCES `user_privileges` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `round`
--
ALTER TABLE `round`
  ADD CONSTRAINT `id_rd_organism` FOREIGN KEY (`id_organism`) REFERENCES `organism` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_rd_simulation` FOREIGN KEY (`id_simulation`) REFERENCES `simulation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `simulation`
--
ALTER TABLE `simulation`
  ADD CONSTRAINT `id_sim_climate` FOREIGN KEY (`id_climate`) REFERENCES `climate` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_sim_map` FOREIGN KEY (`id_map`) REFERENCES `map` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `simulation_privileges`
--
ALTER TABLE `simulation_privileges`
  ADD CONSTRAINT `id_sp_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `user_privileges`
--
ALTER TABLE `user_privileges`
  ADD CONSTRAINT `id_up_climate` FOREIGN KEY (`id_climate`) REFERENCES `climate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_up_map` FOREIGN KEY (`id_map`) REFERENCES `map` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_up_organism` FOREIGN KEY (`id_organism`) REFERENCES `organism` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_up_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
