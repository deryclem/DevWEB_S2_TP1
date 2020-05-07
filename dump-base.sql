-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jun 15, 2010 at 09:58 AM
-- Server version: 5.0.41
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `test`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `etudiants`
-- 

CREATE TABLE `etudiants` (
  `numero` int(15) NOT NULL auto_increment,
  `civilite` varchar(5) collate utf8_unicode_ci NOT NULL default 'M.',
  `nom` varchar(50) collate utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) collate utf8_unicode_ci NOT NULL,
  `promo` varchar(10) collate utf8_unicode_ci NOT NULL,
  `td` varchar(3) collate utf8_unicode_ci NOT NULL,
  `tp` varchar(3) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`numero`),
  KEY `nom` (`nom`,`prenom`,`promo`,`td`,`tp`),
  KEY `prenom` (`prenom`),
  KEY `promo` (`promo`),
  KEY `td` (`td`),
  KEY `tp` (`tp`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20704073 ;

-- 
-- Dumping data for table `etudiants`
-- 

INSERT INTO `etudiants` VALUES (20600507, 'Mlle.', 'ALLARD', 'Inès', 'SRC2', '2', '2,2');
INSERT INTO `etudiants` VALUES (20600394, 'M.', 'AUDOUIN', 'Yann', 'SRC2', '1', '1,2');
INSERT INTO `etudiants` VALUES (20501074, 'Mlle.', 'BAUZA', 'Marie', 'SRC2', '1', '1,1');
INSERT INTO `etudiants` VALUES (20500307, 'M.', 'BAUZA', 'Philippe', 'SRC2', '1', '1,1');
INSERT INTO `etudiants` VALUES (20600516, 'Mlle.', 'BOUTONNET', 'Elsa', 'SRC2', '2', '2,2');
INSERT INTO `etudiants` VALUES (20600510, 'M.', 'CHAMBARD', 'Pierrick', 'SRC2', '2', '2,1');
INSERT INTO `etudiants` VALUES (20600542, 'Mlle.', 'CHAUSSE', 'Laure', 'SRC2', '1', '1,2');
INSERT INTO `etudiants` VALUES (20600010, 'M.', 'CHÂTEL', 'Olivier', 'SRC2', '2', '2,2');
INSERT INTO `etudiants` VALUES (20301755, 'Mlle.', 'COURTOUX', 'Isabelle', 'SRC2', '1', '1,1');
INSERT INTO `etudiants` VALUES (20600544, 'Mlle.', 'DE SUREMAIN', 'Dorothée', 'SRC2', '1', '1,1');
INSERT INTO `etudiants` VALUES (20600449, 'M.', 'FAVRE', 'Thibault', 'SRC2', '2', '2,2');
INSERT INTO `etudiants` VALUES (20600707, 'M.', 'LOUBERE', 'Thibaut', 'SRC2', '2', '2,2');
INSERT INTO `etudiants` VALUES (20600637, 'M.', 'LÉON', 'Jérôme', 'SRC2', '1', '1,2');
INSERT INTO `etudiants` VALUES (20600647, 'M.', 'MALGRAND', 'Adrien', 'SRC2', '1', '1,2');
INSERT INTO `etudiants` VALUES (20602010, 'M.', 'MICHEA', 'Loïc', 'SRC2', '2', '2,1');
INSERT INTO `etudiants` VALUES (20600721, 'M.', 'MORTELECQUE', 'Bastien', 'SRC2', '1', '1,2');
INSERT INTO `etudiants` VALUES (20600740, 'M.', 'MOUTON', 'Alexis', 'SRC2', '2', '2,1');
INSERT INTO `etudiants` VALUES (20600695, 'Mlle.', 'POIGNANT', 'Sarah', 'SRC2', '2', '2,1');
INSERT INTO `etudiants` VALUES (20600690, 'Mlle.', 'RATEL', 'Magali', 'SRC2', '2', '2,1');
INSERT INTO `etudiants` VALUES (20500261, 'M.', 'ROSSET', 'Antonin', 'SRC2', '1', '1,1');
INSERT INTO `etudiants` VALUES (20601248, 'M.', 'ROSSETTO', 'Quentin', 'SRC2', '1', '1,1');
INSERT INTO `etudiants` VALUES (20600746, 'M.', 'SAINT-HILAIRE', 'Jérémy', 'SRC2', '2', '2,1');
INSERT INTO `etudiants` VALUES (20600517, 'Mlle.', 'SALLAZ', 'Mallorie', 'SRC2', '2', '2,2');
INSERT INTO `etudiants` VALUES (20600512, 'M.', 'SATO', 'Noé', 'SRC2', '2', '2,2');
INSERT INTO `etudiants` VALUES (20502579, 'Mlle.', 'SAÏZ', 'Jennifer', 'SRC2', '1', '1,1');
INSERT INTO `etudiants` VALUES (20600728, 'Mlle.', 'SECCO', 'Elsa', 'SRC2', '1', '1,1');
INSERT INTO `etudiants` VALUES (20600451, 'Mlle.', 'SOLVICHE', 'Perrine', 'SRC2', '2', '2,1');
INSERT INTO `etudiants` VALUES (20602011, 'Mlle.', 'PRIETO', 'Elsa', 'SRC2', '2', '2,1');
INSERT INTO `etudiants` VALUES (20600157, 'M.', 'TOCANNE', 'Manuel', 'SRC2', '1', '1,1');
INSERT INTO `etudiants` VALUES (20701651, 'M.', 'HÉLIÈS', 'Vincent', 'LPATC', '', '');
INSERT INTO `etudiants` VALUES (20701920, 'Mlle.', 'LE CORRE', 'Sabrina', 'LPATC', '', '');
INSERT INTO `etudiants` VALUES (20701796, 'M.', 'MEUNIER', 'David', 'LPATC', '', '');
INSERT INTO `etudiants` VALUES (20701930, 'M.', 'MIET', 'Vincent', 'LPATC', '', '');
INSERT INTO `etudiants` VALUES (20701597, 'M.', 'MORETTO', 'Romain', 'LPATC', '', '');
INSERT INTO `etudiants` VALUES (20704068, 'Mlle.', 'MOULIN', 'Marie', 'LPATC', '', '');
INSERT INTO `etudiants` VALUES (20701684, 'M.', 'OSSEDAT', 'Gilles', 'LPATC', '', '');
INSERT INTO `etudiants` VALUES (20701912, 'Mlle.', 'PASCAL', 'Clémentine', 'LPATC', '', '');
INSERT INTO `etudiants` VALUES (20500008, 'M.', 'PENNAMEN', 'Loïc', 'LPATC', '', '');
INSERT INTO `etudiants` VALUES (20701624, 'Mlle.', 'REVOL-BUISSON', 'Céline', 'LPATC', '', '');
INSERT INTO `etudiants` VALUES (20701915, 'M.', 'ROUSSET', 'François', 'LPATC', '', '');
