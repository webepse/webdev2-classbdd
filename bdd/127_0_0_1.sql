-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 21 oct. 2018 à 13:14
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog2`
--
CREATE DATABASE IF NOT EXISTS `blog2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog2`;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(60) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`) VALUES
(1, 1, 'test', 'test test', '2018-10-18 18:36:35');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'test', 'lorem', '2018-10-18 05:12:14'),
(2, 'test 2', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi consectetur felis nulla, a convallis metus viverra non. Nunc interdum tincidunt mollis. Sed tincidunt blandit mi a sagittis. Duis ac elit ac nunc pellentesque sagittis. Vestibulum eu ullamcorper ex, sit amet venenatis nisi. Nam elementum, metus sed ultricies placerat, sapien augue tristique purus, in pellentesque ligula lorem vel orci. Fusce in metus et lorem finibus porta. Ut ac porttitor lectus. Suspendisse ultrices urna tellus, sed lacinia lorem interdum sit amet. Maecenas et faucibus est, in consectetur risus. Aenean cursus neque eu quam rutrum mattis. Maecenas eget augue velit.\r\n\r\nSed dictum efficitur tellus, et placerat lectus tincidunt non. Sed fermentum scelerisque urna, id mollis magna consequat id. Nam vehicula urna nibh, nec sollicitudin sapien placerat at. Aenean quis elit mi. Duis ex nisl, aliquam quis consequat eu, interdum eu odio. Mauris dapibus tortor ac felis sagittis, id aliquet velit aliquam. Nam porttitor tempor neque. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In hac habitasse platea dictumst. Vivamus enim leo, finibus sit amet turpis quis, elementum laoreet metus. ', '2018-10-17 00:00:00'),
(3, 'test 3', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi consectetur felis nulla, a convallis metus viverra non. Nunc interdum tincidunt mollis. Sed tincidunt blandit mi a sagittis. Duis ac elit ac nunc pellentesque sagittis. Vestibulum eu ullamcorper ex, sit amet venenatis nisi. Nam elementum, metus sed ultricies placerat, sapien augue tristique purus, in pellentesque ligula lorem vel orci. Fusce in metus et lorem finibus porta. Ut ac porttitor lectus. Suspendisse ultrices urna tellus, sed lacinia lorem interdum sit amet. Maecenas et faucibus est, in consectetur risus. Aenean cursus neque eu quam rutrum mattis. Maecenas eget augue velit.\r\n\r\nSed dictum efficitur tellus, et placerat lectus tincidunt non. Sed fermentum scelerisque urna, id mollis magna consequat id. Nam vehicula urna nibh, nec sollicitudin sapien placerat at. Aenean quis elit mi. Duis ex nisl, aliquam quis consequat eu, interdum eu odio. Mauris dapibus tortor ac felis sagittis, id aliquet velit aliquam. Nam porttitor tempor neque. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In hac habitasse platea dictumst. Vivamus enim leo, finibus sit amet turpis quis, elementum laoreet metus. ', '2018-10-22 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
