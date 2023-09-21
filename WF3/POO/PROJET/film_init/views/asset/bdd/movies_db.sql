-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 20 sep. 2023 à 16:13
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `movies_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `actor`
--

CREATE TABLE `actor` (
  `id_actor` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `actor`
--

INSERT INTO `actor` (`id_actor`, `name`, `email`) VALUES
(54, 'Christian Bale', 'christian.bale@exemple1.com'),
(58, 'Natalie Portman', 'natalie.portman@exemple3.com'),
(60, 'Tokai Teio', 'tokai.teio@exemple4.com'),
(62, 'Hugh Jackman', 'hugh.jackman@exemple5.com'),
(65, 'John Doe', 'john.doe@exemple6.com'),
(66, 'keith powers', 'keith.powers@mail.com');

-- --------------------------------------------------------

--
-- Structure de la table `actor_competition`
--

CREATE TABLE `actor_competition` (
  `id_actor_competition` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL,
  `competition_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `actor_competition`
--

INSERT INTO `actor_competition` (`id_actor_competition`, `actor_id`, `competition_id`) VALUES
(121, 56, 1),
(125, 58, 1),
(129, 60, 3),
(133, 54, 4),
(137, 65, 4),
(169, 54, 7),
(173, 56, 7),
(177, 58, 7),
(181, 60, 7),
(185, 62, 7),
(189, 65, 7);

-- --------------------------------------------------------

--
-- Structure de la table `competition`
--

CREATE TABLE `competition` (
  `id_competition` int(11) NOT NULL,
  `film_id` int(250) NOT NULL,
  `release_date` date NOT NULL,
  `best_actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `competition`
--

INSERT INTO `competition` (`id_competition`, `film_id`, `release_date`, `best_actor_id`) VALUES
(1, 12, '1974-01-30', 56),
(3, 13, '1934-01-30', 60),
(4, 14, '1984-01-30', 54),
(7, 16, '2000-05-14', 56);

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id_movie` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `number_main_actors` int(11) NOT NULL,
  `number_total_actors` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id_movie`, `title`, `number_main_actors`, `number_total_actors`) VALUES
(12, 'Leon', 1, 2),
(13, 'Pretty derby', 2, 10),
(14, 'Batman', 5, 11),
(15, 'The Prestige', 9, 26),
(16, 'Future World', 1, 6),
(23, 'un film', 3, 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id_actor`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `actor_competition`
--
ALTER TABLE `actor_competition`
  ADD PRIMARY KEY (`id_actor_competition`);

--
-- Index pour la table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`id_competition`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_movie`),
  ADD UNIQUE KEY `title` (`title`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actor`
--
ALTER TABLE `actor`
  MODIFY `id_actor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `actor_competition`
--
ALTER TABLE `actor_competition`
  MODIFY `id_actor_competition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT pour la table `competition`
--
ALTER TABLE `competition`
  MODIFY `id_competition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id_movie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
