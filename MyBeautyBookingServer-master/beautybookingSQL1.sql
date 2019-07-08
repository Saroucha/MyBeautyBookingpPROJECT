-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 29, 2019 at 09:18 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beautybooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `adminis`
--

DROP TABLE IF EXISTS `adminis`;
CREATE TABLE IF NOT EXISTS `adminis` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Full_name` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Password` varchar(200) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminis`
--

INSERT INTO `adminis` (`Id`, `Full_name`, `Email`, `Password`) VALUES
(1, 'sarah BOURAHLA\r\n', 'sarah@hotmail.fr', 'sarah1995');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL,
  `Full_name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `Full_name`, `Email`, `Password`) VALUES
(0, 'Sarah BOURAHLA', 'sarah@hotmail.fr', 'sarah1995'),
(0, 'Sandra', 'sandra@hotmail.fr', 'sandra');

-- --------------------------------------------------------

--
-- Table structure for table `assem`
--

DROP TABLE IF EXISTS `assem`;
CREATE TABLE IF NOT EXISTS `assem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_pro` varchar(210) NOT NULL,
  `Email` varchar(210) NOT NULL,
  `Password` varchar(210) NOT NULL,
  `Adresse` varchar(150) NOT NULL,
  `Postale` int(5) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `Traite` tinyint(1) NOT NULL,
  `Actif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assem`
--

INSERT INTO `assem` (`id`, `Nom_pro`, `Email`, `Password`, `Adresse`, `Postale`, `image_path`, `image_name`, `url`, `name`, `Traite`, `Actif`) VALUES
(19, 'sarah Bourahla', 'Hjj', 'test', '', 0, 'beautybooking/upload/tyhb.jpg', 'tyhb', 'http://10.192.130.162/beautybooking/uploads/19.jpg', 'sarah Bourahla', 1, 0),
(20, 'Thomas', 'Hb', '2be88ca4242c76e8253ac62474851065032d6833', '', 0, 'beautybooking/upload/kcugk.jpg', 'kcugk', 'http://10.192.130.162/beautybooking/uploads/20.pdf', 'sarah Bourahla', 1, 0),
(21, 'sarah Bourahla', 'Thv', '2be88ca4242c76e8253ac62474851065032d6833', 'Paris', 92342, 'beautybooking/upload/yuyjjj.jpg', 'yuyjjj', 'http://10.192.130.162/beautybooking/uploads/21.jpg', 'sarah Bourahla', 1, 1),
(22, 'sarah Bourahla', 'yuyu@hotmail.fr', '2be88ca4242c76e8253ac62474851065032d6833', 'Massy', 91234, 'beautybooking/upload/test1.jpg', 'test1', 'http://10.192.130.162/beautybooking/uploads/22.jpg', 'sarah Bourahla', 1, 0),
(25, 'sarah Bourahla', 'sarah.bourahla2018@gmail.com', '2be88ca4242c76e8253ac62474851065032d6833', 'Paris', 91000, 'beautybooking/upload/sarah Bourahla.jpg', 'sarah Bourahla', 'http://10.192.130.162/beautybooking/uploads/25.jpg', 'TVA DE sarah Bourahla', 0, 0),
(23, 'sarah Bourahla', 'tyty@hotmail.fr', '2be88ca4242c76e8253ac62474851065032d6833', 'Paris', 72345, 'beautybooking/upload/sarah Bourahla.jpg', 'sarah Bourahla', 'http://10.192.130.162/beautybooking/uploads/23.jpg', 'sarah Bourahla', 0, 0),
(24, 'Athmane Aoudjit', 'athmane@hotmail.fr', '2be88ca4242c76e8253ac62474851065032d6833', 'Paris', 91000, 'beautybooking/upload/Athmane Aoudjit.jpg', 'Athmane Aoudjit', 'http://10.192.130.162/beautybooking/uploads/24.pdf', 'TVA DE Athmane Aoudjit', 0, 0),
(26, 'sarah Bourahla', 'sarah.bourahla2015@gmail.com', '2be88ca4242c76e8253ac62474851065032d6833', 'Val Marne', 91000, 'beautybooking/upload/sarah Bourahla.jpg', 'sarah Bourahla', 'http://10.192.130.162/beautybooking/uploads/26.jpg', 'TVA DE sarah Bourahla', 0, 0),
(27, 'sarah Bourahla', 'sarah.bourahla2018@gmail.fr', '2be88ca4242c76e8253ac62474851065032d6833', 'Hhjn', 34566, 'beautybooking/upload/sarah Bourahla.jpg', 'sarah Bourahla', 'http://10.192.130.162/beautybooking/uploads/27.jpg', 'TVA DE sarah Bourahla', 0, 0),
(28, 'sarah Bourahla', 'sarahla2018@gmail.com', '2be88ca4242c76e8253ac62474851065032d6833', 'Bbn', 14666, 'beautybooking/upload/sarah Bourahla.jpg', 'sarah Bourahla', 'http://10.192.130.162/beautybooking/uploads/28.pdf', 'TVA DE sarah Bourahla', 0, 0),
(29, 'sarah Bourahla', 'sarah.bourahla2018@gmail.com', '2be88ca4242c76e8253ac62474851065032d6833', 'Hhh', 23344, 'beautybooking/upload/sarah Bourahla.jpg', 'sarah Bourahla', 'http://10.192.130.162/beautybooking/uploads/29.jpg', 'TVA DE sarah Bourahla', 0, 0),
(30, 'sarah Bourahla', 'sarah.bourahla2018@gmail.fr', '2be88ca4242c76e8253ac62474851065032d6833', 'Hhh', 93000, 'beautybooking/upload/sarah Bourahla.jpg', 'sarah Bourahla', 'http://10.192.130.162/beautybooking/uploads/30TVA DETVA DE sarah Bourahla.jpg', 'TVA DE sarah Bourahla', 0, 0),
(31, 'Lilya', 'sarah.bourahla2018@gmail.com', '2be88ca4242c76e8253ac62474851065032d6833', 'Hjnn', 91900, 'beautybooking/upload/Lilya.jpg', 'Lilya', 'http://10.192.130.162/beautybooking/uploads/31TVA DETVA DE Lilya.jpg', 'TVA DE Lilya', 0, 0),
(32, 'Toto', 'sarah.bourahla2018@gmail.fr', '2be88ca4242c76e8253ac62474851065032d6833', 'Jdkdn', 91340, 'beautybooking/upload/Toto.jpg', 'Toto', 'http://10.192.130.162/beautybooking/uploads/32TVA DETVA DE Toto.png', 'TVA DE Toto', 0, 0),
(33, 'Titi', 'sarah.bourahla2018@gmail.dz', '2be88ca4242c76e8253ac62474851065032d6833', 'Bonjour', 91803, 'beautybooking/upload/Titi.jpg', 'Titi', 'http://10.192.130.162/beautybooking/uploads/33TVA DETVA DE Titi.png', 'TVA DE Titi', 0, 0),
(34, 'Papiou', 'sarah.bourahla2018@gmail.com', '2be88ca4242c76e8253ac62474851065032d6833', 'Bonjour', 78945, 'beautybooking/upload/Papiou.jpg', 'Papiou', 'http://10.192.130.162/beautybooking/uploads/34.png', 'Papiou', 0, 0),
(35, 'sarah Bourahla', 'sarah.bourahla2018@gmail.com', '2be88ca4242c76e8253ac62474851065032d6833', 'Jdk', 91830, 'beautybooking/upload/sarah Bourahla.jpg', 'sarah Bourahla', 'http://10.192.130.162/beautybooking/uploads/35.png', 'sarah Bourahla', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `first_name`, `email`, `password`, `phone`, `street`, `zip`, `city`) VALUES
(13, 'sarah', 'sarah', 'sarah@homail.com', 'sarah12345', '123456789', 'paris', '75000', 'paris'),
(28, 'tott', 'chloé', 'toto@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0595256535', '', '', 'KKJDKJD'),
(29, 'dubois', 'francois', 'franc@gmail.com', '25f9e794323b453885f5181f1b624d0b', '062535148', '1 rue de la fontaine', '75012', 'paris'),
(30, 'Dupond', 'Kevin', 'dupont@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0698768734', '13 Boulevard Perrier', '92000', 'Nanterre'),
(31, 'Neki', 'nekiniu', 'nek@gmail.com', 'b83ad96560fc732cdae64d4394e962d4', '0652562567', '13 rue test', '92500', 'nanterre'),
(32, 'neki', 'neki', 'neki@gmail.com', 'b83ad96560fc732cdae64d4394e962d4', '06525352514', '13 eeeeee', '75024', 'paris'),
(33, 'marc', 'Test', 'marc@gmail.com', 'b0d4b5c947206664901b1f4ad1e8efcb', '0987766667', 'Paris', '75013', 'Pariq');

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

DROP TABLE IF EXISTS `developers`;
CREATE TABLE IF NOT EXISTS `developers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `developers`
--

INSERT INTO `developers` (`id`, `name`, `skills`, `address`, `gender`, `Password`, `annee`) VALUES
(1, 'Aurore test', 'gog\r\n', 'Aurore@hotmail.com', 'Femme', 'aurore123', 2018),
(2, 'test test', '', 'test@hotmail.fr', 'Female', 'test', 2019),
(3, 'Sandra chapenat', '', 'Sandra@gmail.fr', 'female', 'sandraa', 2020),
(4, 'test test', 'test', 'test2@hotmail.fr', 'female', '12345', 2018),
(5, 'test5 test', '', 'test5@hotmail.fr', 'male', '123456', 2019),
(6, 'test7 test', '', 'TEST7@gmail.fr', 'female', '1254', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `email`, `photo`) VALUES
(8, 'logo', 'sarah@hotmail.fr', 'http://10.0.37.128/beautybooking//upload/logo.JPG'),
(9, 'logo', 'sarah@hotmail.fr', 'http://10.0.37.128/beautybooking//upload/logo.JPG'),
(10, 'background', 'lili@hotmail.fr', 'http://10.0.37.128/beautybooking//upload/background.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

DROP TABLE IF EXISTS `pdf`;
CREATE TABLE IF NOT EXISTS `pdf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pdf`
--

INSERT INTO `pdf` (`id`, `url`, `name`) VALUES
(1, 'http://10.0.70.176/beautybooking/uploads/1.pdf', 'my file'),
(2, 'http://10.0.70.176/beautybooking/uploads/2.pdf', 'my file'),
(3, 'http://10.192.130.162/beautybooking/uploads/3.pdf', 'hhg'),
(4, 'http://10.192.130.162/beautybooking/uploads/4.pdf', 'test'),
(5, 'http://10.192.130.162/beautybooking/uploads/5.pdf', 'oui'),
(6, 'http://10.192.130.162/beautybooking/uploads/1.pdf', 'ghghjh'),
(7, 'http://10.192.130.162/beautybooking/uploads/7.pdf', 'gjgh'),
(8, 'http://10.192.130.162/beautybooking/uploads/8.pdf', 'testtt'),
(9, 'http://10.192.130.162/beautybooking/uploads/9.pdf', 'yuy'),
(10, 'http://10.192.130.162/beautybooking/uploads/10.pdf', '124455'),
(11, 'http://10.192.130.162/beautybooking/uploads/11.pdf', 'yuyutghjijfvb'),
(12, 'http://10.192.130.162/beautybooking/uploads/12.pdf', 'sarah Bourahla'),
(13, 'http://10.192.130.162/beautybooking/uploads/13.pdf', 'sarah Bourahla');

-- --------------------------------------------------------

--
-- Table structure for table `professionels`
--

DROP TABLE IF EXISTS `professionels`;
CREATE TABLE IF NOT EXISTS `professionels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NomP` varchar(200) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `Password` varchar(150) DEFAULT NULL,
  `Telephone` varchar(150) DEFAULT NULL,
  `Categorie` varchar(50) NOT NULL,
  `image_path` varchar(150) DEFAULT NULL,
  `image_name` varchar(150) DEFAULT NULL,
  `Adresse` varchar(200) DEFAULT NULL,
  `Postale` int(5) DEFAULT NULL,
  `Distance` int(3) DEFAULT NULL,
  `NomEntreprise` varchar(150) DEFAULT NULL,
  `Registre` varchar(150) DEFAULT NULL,
  `Description` longtext,
  `Traite` tinyint(1) NOT NULL,
  `Actif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `professionels`
--

INSERT INTO `professionels` (`id`, `NomP`, `Email`, `Password`, `Telephone`, `Categorie`, `image_path`, `image_name`, `Adresse`, `Postale`, `Distance`, `NomEntreprise`, `Registre`, `Description`, `Traite`, `Actif`) VALUES
(23, 'sarah Bourahla', 'sarah@hotmail.fr', '9e9d7a08e048e9d604b79460b54969c3', '067868447', 'Coiffure', 'http://10.192.133.155/beautybooking/upload/test.jpg', 'sarah Bourahla', 'jkfvjjkkkvjijjkkhjhv', 75349, 110, 'sarah Bourahla', '12345678978125', 'https://stackoverflow.com/ \r\n\r\nhttps://stackoverflow.com/ \r\n\r\nhttps://stackoverflow.com/ \r\n\r\nhttps://google.com/\r\n\r\n', 1, 1),
(43, 'aurore', 'sandracharpenat@gmail.com', '16d7a4fca7442dda3ad93c9a726597e4', '0698975012', 'Onglerie', 'http://10.192.133.155/beautybooking/upload/aurore.jpg', 'aurore', 'nanterre', 92100, 12, 'cesi', '12345678912345', 'http://www.Google.fr', 1, 1),
(32, 'lilya biurahkq', 'lilyabou@gmail.com', '60539e04d8bb5f3aa7f63e383c6940ce', '0678978302', 'Onglerie', 'http://10.192.133.155/beautybooking/upload/test.jpg', 'lilya biurahkq', 'Paris', 15000, 10, 'BPCE', '12345678987654', 'https://Google.com', 1, 1),
(45, 'sarah Bourahla', 'sarah.bourahla2018@gmail.com', 'ec26202651ed221cf8f993668c459d46', '067854354', 'Bien dans son corps', 'http://10.192.133.155/beautybooking/upload/sarah Bourahla.jpg', 'sarah Bourahla', 'paris', 71000, 12, 'sarah Bourahla', '12345678912552', 'http://www.google.fr', 0, 0),
(41, 'sandra', 'LefÃ¨vre.marc96@gmail.com', 'f40a37048732da05928c3d374549c832', '0836849972', 'Maquillage', 'http://10.192.133.155/beautybooking/upload/sandra.jpg', 'sandra', 'paris', 71000, 12, 'cesi', '12345678912345', 'http://Google.com', 1, 1),
(42, 'marco', 'lefevre.marc96@gmail.com', '798cd5501c5a5d9a674bf32a9e06a501', '0826883776', 'Maquillage', 'http://10.192.133.155/beautybooking/upload/marco.jpg', 'marco', 'paris', 71000, 12, 'cesi', '12345678912345', 'http://google.fr', 1, 1),
(44, 'sarah Bourahla', 'sarah.bourahla2018@gmail.com', '46c8a5616e326cc01b573e5d863225be', '097386727', 'Onglerie', 'http://10.192.133.155/beautybooking/upload/sarah Bourahla.jpg', 'sarah Bourahla', 'paris', 71800, 80, 'sarah Bourahla', '12345678987985', 'http://Google.fr', 1, 0),
(40, 'rrara', 'sarah@gmail.com', '65c7e52b10b19458ff7137d2a5a852f5', '067895863', 'Onglerie', 'http://10.192.133.155/beautybooking/upload/rrara.jpg', 'rrara', 'paris', 71200, 25, 'bpce', '12548521256666', 'http://google.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vente_privee`
--

DROP TABLE IF EXISTS `vente_privee`;
CREATE TABLE IF NOT EXISTS `vente_privee` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `titre` varchar(250) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `ancien_prix` float NOT NULL,
  `nouveau_prix` float NOT NULL,
  `image` varchar(50) NOT NULL,
  `texte` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vente_privee`
--

INSERT INTO `vente_privee` (`id`, `titre`, `date_debut`, `date_fin`, `ancien_prix`, `nouveau_prix`, `image`, `texte`) VALUES
(1, 'promo', '2019-04-09', '2019-04-19', 455.5, 256.6, '', 'test');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
