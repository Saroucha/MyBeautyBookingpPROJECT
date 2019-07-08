-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  jeu. 18 avr. 2019 à 16:09
-- Version du serveur :  5.7.24-0ubuntu0.18.04.1
-- Version de PHP :  7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mybeautybooking`
--

-- --------------------------------------------------------

--
-- Structure de la table `Client`
--

CREATE TABLE `Client` (
  `id_client` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Client`
--

INSERT INTO `Client` (`id_client`, `name`, `first_name`, `email`, `password`, `phone`, `street`, `zip`, `city`) VALUES
(3, 'test', 'testy', 'test@hotmail.com', 'test', 'test', 'test', 'test', 'test'),
(4, 'toto', 'gérard', 'toto@gmail.com', 'toto12345', '222555885', '25 rue machin', '75000', 'paris'),
(5, 'nek', 'tata', 'titi@hotmail.com', 'test', '00000000000', 'aaaaaaaa', 'aaaaaaa', 'versaille'),
(6, 'aaaaaaaaaa', '', 'toto@gmail.com', 'aaaaaaaaaa', 'aaaaaaaaaa', 'aaaaaaaaaa', 'aaaaaaaaaa', 'aaaaaaaaaa'),
(7, 'aaaaaaaaa', '', 'toto@gmail.com', 'aaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaa'),
(8, 'aaaaaa', '', 'aaaaaaaa', 'aaaaaa', 'aaaaaa', 'aaaaaa', 'aaaaaa', 'aaaaaa'),
(9, 'test', '', 'tes@test.te', 'tesdfghjj', 'test', 'test', 'test', 'test'),
(10, 'new', '', 'new@gmail.com', 'newnew', '555555', 'new', '5555', 'nex'),
(11, 'test1', '', 'test@1.fr', '111111111', 'test1', 'tes1', 'tes1', 'test1'),
(12, 'yahya', 'Moh', 'moh@gmail.com', 'moh123456', '02536458', 'rue 45', '92000', 'nanterre'),
(13, 'sarah', 'sarah', 'sarah@homail.com', 'sarah12345', '123456789', 'paris', '75000', 'paris'),
(14, 'lilya', 'lil', 'lilya@hotmail.fr', 'jojo1995', '0528781', 'hjdddd', '25220', 'khkdh'),
(15, 'aaaaaa', 'aaaaaaaa', 'sarah@hotmail.com', 'sarah12345', '4444444444444', 'aaaaaaaaaa', '44444', 'aaaaaaa'),
(16, 'ttttttttttt', 'tttttttttt', 'aaaaa@aaa.de', 'aaaaaaaaaa', '1111111111111111', 'aaaaaaaaaa', '11111', 'vvvvvvvvv'),
(17, 'test', 'test', 'testtest@test.com', 'testtest', '444444444', 'test 5555', '44444', 'test'),
(18, 'BOURAHLA', 'SARAH', 'SAROUCHA@hotmail.com', 'sarah1995,', '068782125', '50 RUE GENERAL', '94240', 'HAY LES ROSES'),
(19, 'test', 'test', 'marouane@gmail.com', 'marouane', '0254665555', '25 ruee macchin', '25645', 'nanterre');

-- --------------------------------------------------------

--
-- Structure de la table `professionnel`
--

CREATE TABLE `professionnel` (
  `id` int(11) NOT NULL,
  `Nom` varchar(150) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `Ville` varchar(150) NOT NULL,
  `Specialite` varchar(150) NOT NULL,
  `Lien` varchar(150) NOT NULL,
  `Nom_entreprise` varchar(150) NOT NULL,
  `Description_entreprise` varchar(150) NOT NULL,
  `Telephone` varchar(150) NOT NULL,
  `Actif` tinyint(1) NOT NULL,
  `Traite` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `professionnel`
--

INSERT INTO `professionnel` (`id`, `Nom`, `prenom`, `email`, `password`, `Ville`, `Specialite`, `Lien`, `Nom_entreprise`, `Description_entreprise`, `Telephone`, `Actif`, `Traite`) VALUES
(1, 'BOURAHLA', 'SARAH', 'sarah@hotmail.fr', 'sarah', 'paris', 'onglerie', 'www.fac.com', 'BPCE', 'BANQUE', '055785422', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `vente_privee`
--

CREATE TABLE `vente_privee` (
  `id` int(250) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `ancien_prix` float NOT NULL,
  `nouveau_prix` float NOT NULL,
  `image` varchar(50) NOT NULL,
  `texte` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vente_privee`
--

INSERT INTO `vente_privee` (`id`, `titre`, `date_debut`, `date_fin`, `ancien_prix`, `nouveau_prix`, `image`, `texte`) VALUES
(1, 'promo', '2019-04-09', '2019-04-19', 455.5, 256.6, '', 'test');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `professionnel`
--
ALTER TABLE `professionnel`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vente_privee`
--
ALTER TABLE `vente_privee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Client`
--
ALTER TABLE `Client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `professionnel`
--
ALTER TABLE `professionnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `vente_privee`
--
ALTER TABLE `vente_privee`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
