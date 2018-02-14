-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 14. 02 2018 kl. 11:14:44
-- Serverversion: 10.1.28-MariaDB
-- PHP-version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databaseexam`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `adminusers`
--

CREATE TABLE `adminusers` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `adminusers`
--

INSERT INTO `adminusers` (`id`, `username`, `password`, `name`) VALUES
(1, 'admin', 'admin', ''),
(2, '', '$1$pA0.8D3.$HGRkhzC9VUcKKEEgLMIsv/', ''),
(3, 'a', '$1$Ls3.262.$cMz2pZLikX2hnPCRZSEFL.', 'a'),
(4, 'a', '$2y$10$xvWt3n66r8E2MGSeAsaGK.eGRnkM3Q1X6cb2sHQUgqYyRvBqSs9u2', 'a'),
(5, 'to', '$2y$10$n6njYApkCGNMXFwzcfXOO.VDQBi6bQnYADuyYSrimsZT3MNi/VgeC', 'to');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `imageURL` varchar(255) NOT NULL,
  `owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `images`
--

INSERT INTO `images` (`id`, `imageURL`, `owner`) VALUES
(2, 'https://imgix.ranker.com/user_node_img/50047/1000931279/original/millennium-falcon-photo-u1?w=650&q=50&fm=jpg&fit=crop&crop=faces', 8),
(6, 'http://static.tvtropes.org/pmwiki/pub/images/friendship_is_magic_newpageimage_1684.png', 8),
(7, 'https://vignette.wikia.nocookie.net/mugen/images/1/13/Fluttershy_artwork.png/revision/latest?cb=20130311003323', 8);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(120) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`) VALUES
(2, 'fShy34', 'friendshipism4gic', 'Fluttershy'),
(6, 'as', '$1$vY4.MV5.$6w70C1B8o7FcCxldOb7/', 'tobia'),
(8, 'to', '$2y$10$mOipbre3mXgFmt7V0PB5r.WnGOLgVZjGkDC2x5tHkcDswTEMvLjs2', 'to');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign key` (`owner`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `adminusers`
--
ALTER TABLE `adminusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tilføj AUTO_INCREMENT i tabel `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `foreign key` FOREIGN KEY (`owner`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
