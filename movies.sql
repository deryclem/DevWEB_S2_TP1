-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 06 Mai 2015 à 08:33
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `movies`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteurs`
--

CREATE TABLE IF NOT EXISTS `acteurs` (
  `id_film` mediumint(6) unsigned NOT NULL,
  `id_personne` mediumint(6) unsigned NOT NULL,
  `role` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id_film`,`id_personne`),
  KEY `id_personne` (`id_personne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `acteurs`
--

INSERT INTO `acteurs` (`id_film`, `id_personne`, `role`) VALUES
(10568, 14100, 'Forrest Gump'),
(10568, 14624, 'Le lieutenant Dan Taylor '),
(22779, 14100, 'Paul Edgecomb'),
(22779, 31950, 'John Coffey '),
(115362, 8471, 'Batman / Bruce Wayne'),
(115362, 33198, 'Le Joker'),
(135063, 1146, 'Walt Kowalski'),
(135063, 240551, 'Tao'),
(190918, 32404, 'Django'),
(190918, 155364, ' Dr. King Schultz');

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE IF NOT EXISTS `films` (
  `id` mediumint(6) unsigned NOT NULL,
  `titre` varchar(254) DEFAULT NULL,
  `date_sortie` date DEFAULT NULL,
  `duree` smallint(3) unsigned DEFAULT NULL,
  `note_presse` decimal(2,1) DEFAULT NULL,
  `note_public` decimal(2,1) DEFAULT NULL,
  `affiche` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `films`
--

INSERT INTO `films` (`id`, `titre`, `date_sortie`, `duree`, `note_presse`, `note_public`, `affiche`) VALUES
(10568, 'Forrest Gump', '1994-10-05', 140, '2.6', '4.5', 'http://fr.web.img3.acsta.net/cx_120_160/medias/nmedia/18/63/30/77/18686566.jpg'),
(22779, 'La Ligne verte', '2000-03-01', 189, '2.8', '4.5', 'http://fr.web.img2.acsta.net/cx_120_160/medias/nmedia/18/66/15/78/19254683.jpg'),
(115362, 'The Dark Knight, Le Chevalier Noir ', '2008-08-13', 147, '4.0', '4.5', 'http://fr.web.img6.acsta.net/cx_120_160/medias/nmedia/18/63/97/89/18949761.jpg'),
(135063, 'Gran Torino', '2009-02-25', 111, '4.7', '4.5', 'http://fr.web.img4.acsta.net/cx_120_160/medias/nmedia/18/67/90/93/19057560.jpg'),
(190918, 'Django Unchained', '2013-01-16', 164, '4.5', '4.5', 'http://fr.web.img4.acsta.net/cx_120_160/medias/nmedia/18/90/08/59/20366454.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `fonctions`
--

CREATE TABLE IF NOT EXISTS `fonctions` (
  `id` smallint(3) unsigned NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fonctions`
--

INSERT INTO `fonctions` (`id`, `nom`) VALUES
(1, 'Réalisateur'),
(2, 'Producteur');

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `id` smallint(3) unsigned NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `genres`
--

INSERT INTO `genres` (`id`, `nom`) VALUES
(2, 'Comédie dramatique'),
(8, 'Drame'),
(12, 'Fantastique'),
(18, 'Policier'),
(19, 'Western'),
(23, 'Thriller'),
(24, 'Romance'),
(25, 'Action');

-- --------------------------------------------------------

--
-- Structure de la table `genres_films`
--

CREATE TABLE IF NOT EXISTS `genres_films` (
  `id_film` mediumint(6) unsigned NOT NULL,
  `id_genre` smallint(3) unsigned NOT NULL,
  PRIMARY KEY (`id_film`,`id_genre`),
  KEY `id_genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `genres_films`
--

INSERT INTO `genres_films` (`id_film`, `id_genre`) VALUES
(10568, 2),
(115362, 8),
(135063, 8),
(22779, 12),
(22779, 18),
(190918, 19),
(135063, 23),
(10568, 24),
(115362, 25);

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE IF NOT EXISTS `personnes` (
  `id` mediumint(6) unsigned NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `prenom` varchar(254) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `date_deces` date DEFAULT NULL,
  `lieu_naissance` varchar(254) DEFAULT NULL,
  `pays_naissance` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personnes`
--

INSERT INTO `personnes` (`id`, `nom`, `prenom`, `date_naissance`, `date_deces`, `lieu_naissance`, `pays_naissance`) VALUES
(1146, 'Eastwood', 'Clint', '1930-05-31', NULL, 'San-Francisco, Californie', 'Etats-Unis'),
(1457, 'Zemeckis', 'Robert', '1951-05-14', NULL, 'Chicago, Illinois', 'Etats-Unis'),
(8471, 'Bale', 'Christian', '1974-01-30', NULL, 'Pembrokshire, Pays de Galles', 'Royaume-Uni'),
(14100, 'Hanks', 'Tom', '1956-07-09', NULL, 'Oakland, Californie', 'Etats-Unis'),
(14624, 'Sinise', 'Gary', '1955-03-17', NULL, 'Blue Island, Illinois', 'Etats-Unis'),
(15570, 'Tarantino', 'Quentin', '1963-03-27', NULL, 'Knoxville, Tennessee', 'Etats-Unis'),
(30367, 'Nolan', 'Christopher', '1970-07-30', NULL, 'Londres', 'Angleterre'),
(31406, 'Darabont', 'Frank', '1959-01-28', NULL, 'Montbéliard', 'France'),
(31950, 'Duncan', 'Michael Clarke', '1957-12-10', '2012-09-03', 'Chicago, Illinois', 'Etats-Unis'),
(32404, 'Foxx', 'Jamie', '1967-12-13', NULL, 'Terrell, Texas', 'Etats-Unis'),
(33198, 'Ledger', 'Heath', '1979-04-04', NULL, 'Perth', 'Australie'),
(155364, 'Waltz', 'Christoph', '1956-10-04', NULL, 'Vienne', 'Autriche'),
(240551, 'Vang', 'Bee', '1991-11-04', NULL, 'Fresno, Californie', 'Etats-Unis');

-- --------------------------------------------------------

--
-- Structure de la table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id_film` mediumint(6) unsigned NOT NULL,
  `id_personne` mediumint(6) unsigned NOT NULL,
  `id_fonction` smallint(3) unsigned NOT NULL,
  PRIMARY KEY (`id_film`,`id_personne`,`id_fonction`),
  KEY `id_personne` (`id_personne`),
  KEY `id_fonction` (`id_fonction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `staff`
--

INSERT INTO `staff` (`id_film`, `id_personne`, `id_fonction`) VALUES
(10568, 1457, 1),
(22779, 31406, 1),
(115362, 30367, 1),
(135063, 1146, 1),
(190918, 15570, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `acteurs`
--
ALTER TABLE `acteurs`
  ADD CONSTRAINT `acteurs_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `films` (`id`),
  ADD CONSTRAINT `acteurs_ibfk_2` FOREIGN KEY (`id_personne`) REFERENCES `personnes` (`id`);

--
-- Contraintes pour la table `genres_films`
--
ALTER TABLE `genres_films`
  ADD CONSTRAINT `genres_films_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `films` (`id`),
  ADD CONSTRAINT `genres_films_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genres` (`id`);

--
-- Contraintes pour la table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `films` (`id`),
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`id_personne`) REFERENCES `personnes` (`id`),
  ADD CONSTRAINT `staff_ibfk_3` FOREIGN KEY (`id_fonction`) REFERENCES `fonctions` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
