-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 19 Lip 2013, 15:51
-- Wersja serwera: 5.1.69
-- Wersja PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `pearnet_ctest`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `surname` varchar(255) COLLATE utf8_bin NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('m','f') COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=21 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `age`, `gender`) VALUES
(1, 'Paul', 'Crowe', 28, 'm'),
(2, 'Rob', 'Fitz', 23, 'm'),
(3, 'Ben', 'O''Carolan', 0, 'm'),
(4, 'Victor', '', 28, 'm'),
(5, 'Peter', 'Mac', 29, 'm'),
(6, 'John', 'Barry', 18, 'm'),
(7, 'Sarah', 'Lane', 30, 'f'),
(8, 'Susan', 'Downe', 28, 'f'),
(9, 'Jack', 'Stam', 28, 'm'),
(10, 'Amy', 'Lane', 24, 'f'),
(11, 'Sandra', 'Phelan', 28, 'f'),
(12, 'Laura', 'Murphy', 33, 'f'),
(13, 'Lisa', 'Daly', 28, 'f'),
(14, 'Mark', 'Johnson', 28, 'm'),
(15, 'Seamus', 'Crowe', 24, 'm'),
(16, 'Daren', 'Slater', 28, 'm'),
(17, 'Dara', 'Zoltan', 48, 'm'),
(18, 'Marie', 'D', 28, 'f'),
(19, 'Catriona', 'Long', 28, 'f'),
(20, 'Katy', 'Couch', 28, 'f');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `users_friends`
--

DROP TABLE IF EXISTS `users_friends`;
CREATE TABLE IF NOT EXISTS `users_friends` (
  `user` int(11) NOT NULL,
  `friend` int(11) NOT NULL,
  UNIQUE KEY `user_friend` (`user`,`friend`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `users_friends`
--

INSERT INTO `users_friends` (`user`, `friend`) VALUES
(1, 2),
(2, 1),
(2, 3),
(3, 2),
(3, 4),
(3, 5),
(3, 7),
(4, 3),
(5, 3),
(5, 6),
(5, 7),
(5, 10),
(5, 11),
(6, 5),
(7, 3),
(7, 5),
(7, 8),
(7, 12),
(7, 20),
(8, 7),
(9, 12),
(10, 5),
(10, 11),
(11, 5),
(11, 10),
(11, 19),
(11, 20),
(12, 7),
(12, 9),
(12, 13),
(12, 20),
(13, 12),
(13, 14),
(13, 20),
(14, 13),
(14, 15),
(15, 14),
(16, 18),
(16, 20),
(17, 18),
(17, 20),
(18, 17),
(19, 11),
(19, 20),
(20, 7),
(20, 11),
(20, 12),
(20, 13),
(20, 16),
(20, 17),
(20, 19);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
