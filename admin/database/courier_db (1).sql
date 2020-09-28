-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 25 sep. 2020 à 13:46
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `courier_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_courier`
--

CREATE TABLE `tbl_courier` (
  `cid` int(11) NOT NULL,
  `cuid` int(5) NOT NULL,
  `Date` date DEFAULT NULL,
  `Nom` varchar(40) NOT NULL,
  `Tel` int(11) NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Fax` varchar(30) NOT NULL,
  `MarsaMaroc` varchar(40) NOT NULL,
  `Objet` varchar(50) NOT NULL,
  `Statut` varchar(40) NOT NULL,
  `Commentaire` text NOT NULL,
  `Outil` varchar(30) NOT NULL,
  `Entité` varchar(30) NOT NULL,
  `Instruction` text NOT NULL,
  `pdf` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_courier`
--

INSERT INTO `tbl_courier` (`cid`, `cuid`, `Date`, `Nom`, `Tel`, `Adresse`, `Email`, `Fax`, `MarsaMaroc`, `Objet`, `Statut`, `Commentaire`, `Outil`, `Entité`, `Instruction`, `pdf`) VALUES
(1, 2, '2020-09-23', 'BP', 567486908, 'Agadir, Maroc', 'bp@gmail.com', '00 13 55 77 11', 'BO', 'Remboursement', 'Envoyé', 'ceci est un test', 'Mail', 'Maritime', 'test', ''),
(2, 2, '2020-09-16', 'Ismail', 623111980, 'Agadir, Maroc', 'ismail@gmail.com', '00 13 55 77 11', 'Sec. Dir', 'Test2', 'Arrivé', 'Hello world', 'Fax', 'SAA', 'Hello', ''),
(3, 2, '2020-09-24', 'Mohammed', 567486908, 'Agadir, Maroc', 'Mohamed@gmail.com', '00 99 65 44 32', 'BO', 'demande de stage', 'Arrivé', 'Coucou', 'Mail', 'DRH', 'Hello', 'cv asmae.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_courier_officers`
--

CREATE TABLE `tbl_courier_officers` (
  `cuid` int(10) NOT NULL,
  `officer_name` varchar(40) NOT NULL,
  `off_pwd` varchar(40) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ph_no` varchar(12) NOT NULL,
  `office` varchar(100) NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_courier_officers`
--

INSERT INTO `tbl_courier_officers` (`cuid`, `officer_name`, `off_pwd`, `address`, `email`, `ph_no`, `office`, `reg_date`) VALUES
(1, 'courier', 'courier', 'nyarugenge, kigali', 'courier@gmail.com', '0788845459', 'Fast Courier - Kigali', '2011-01-30 09:25:21'),
(2, 'test', 'test', 'test, huye', 'test@gmail.com', '0786790914', 'Fast Courier - Huye', '2011-01-30 09:40:42'),
(3, 'waka', 'waka', 'waka, musanze', 'waka@gmail.com', '0780271726', 'Fast Courier - Musanze', '2011-01-30 17:50:34');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_courier_track`
--

CREATE TABLE `tbl_courier_track` (
  `id` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `cons_no` varchar(20) NOT NULL,
  `current_city` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `bk_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_courier_track`
--

INSERT INTO `tbl_courier_track` (`id`, `cid`, `cons_no`, `current_city`, `status`, `comments`, `bk_time`) VALUES
(1, 1, 'M22P7KHM', 'Fast Courier - Kigali', 'Delayed', 'Delay due to rain', '2011-01-30 10:23:04'),
(3, 1, 'M22P7KHM', 'Fast Courier - Kigali', 'Delayed', 'Delayed due to rain', '2011-01-30 10:26:43'),
(4, 4, '2THBV8UM', 'Fast Courier - Huye', 'Delayed', 'Due to rain', '2011-01-30 17:44:52'),
(5, 1, 'M22P7KHM', 'Fast Courier - Kigali', 'Completed', 'Completed', '2011-01-30 17:49:11'),
(6, 1, 'M22P7KHM', 'Fast Courier - Kigali', 'Landed', '', '2018-06-19 06:21:43'),
(7, 3, 'Q906F73L', 'Fast Courier - Kigali', 'Onhold', '', '2018-06-20 07:48:56'),
(8, 1, 'M22P7KHM', 'Fast Courier - Kigali', 'Completed', '', '2018-06-20 08:55:49'),
(9, 3, 'Q906F73L', 'Fast Courier - Kigali', '', '', '2018-07-03 11:58:39'),
(10, 3, 'Q906F73L', 'Fast Courier - Kigali', '', '', '2018-07-03 12:01:17'),
(11, 3, 'Q906F73L', 'Fast Courier - Kigali', '', '', '2018-07-03 15:03:30'),
(12, 3, 'Q906F73L', 'Fast Courier - Kigali', '', '', '2018-07-03 15:08:28'),
(13, 3, 'Q906F73L', 'Fast Courier - Kigali', '', '', '2018-07-03 15:12:18'),
(14, 3, 'Q906F73L', 'Fast Courier - Kigali', '', '', '2018-07-03 15:14:46'),
(15, 3, 'Q906F73L', 'Fast Courier - Kigali', '', '', '2018-07-03 15:19:07'),
(16, 3, 'Q906F73L', 'Fast Courier - Kigali', '', '', '2018-07-03 16:14:18'),
(17, 3, 'Q906F73L', 'Fast Courier - Kigali', '', '', '2018-07-03 16:15:31'),
(18, 3, 'Q906F73L', 'Fast Courier - Kigali', '', '', '2018-07-03 16:19:01');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_offices`
--

CREATE TABLE `tbl_offices` (
  `id` int(10) NOT NULL,
  `off_name` varchar(100) NOT NULL,
  `address` varchar(230) NOT NULL,
  `city` varchar(100) NOT NULL,
  `ph_no` varchar(20) NOT NULL,
  `office_time` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_offices`
--

INSERT INTO `tbl_offices` (`id`, `off_name`, `address`, `city`, `ph_no`, `office_time`, `contact_person`) VALUES
(1, 'Fast Courier - Kigali', 'nyarugenge, kigali', 'kigali', '0257-25125', '10.00 am - 9.00 pm', 'courier kigali'),
(2, 'Fast Courier - Huye', 'test, huye', 'huye', '0245-858521', '10.00 am - 9.00 pm', 'test huye'),
(3, 'Fast Courier - Musanze', 'waka, musanze', 'musanze', '020-25125', '10.00 am - 9.00 pm', 'waka design');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tbl_courier`
--
ALTER TABLE `tbl_courier`
  ADD PRIMARY KEY (`cid`);

--
-- Index pour la table `tbl_courier_officers`
--
ALTER TABLE `tbl_courier_officers`
  ADD PRIMARY KEY (`cuid`),
  ADD KEY `cuid` (`cuid`);

--
-- Index pour la table `tbl_courier_track`
--
ALTER TABLE `tbl_courier_track`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_offices`
--
ALTER TABLE `tbl_offices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tbl_courier`
--
ALTER TABLE `tbl_courier`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tbl_courier_officers`
--
ALTER TABLE `tbl_courier_officers`
  MODIFY `cuid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tbl_courier_track`
--
ALTER TABLE `tbl_courier_track`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `tbl_offices`
--
ALTER TABLE `tbl_offices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
