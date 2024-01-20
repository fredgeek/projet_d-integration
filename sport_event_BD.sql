-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 06 déc. 2023 à 13:07
-- Version du serveur :  10.3.38-MariaDB-0ubuntu0.20.04.1
-- Version de PHP : 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nos_test`
--

-- --------------------------------------------------------
--
-- Structure de la table `annee_academique`
--

CREATE TABLE `annee_academique` (
  `id_anneee` int(11) NOT NULL,
  `annee` varchar(255) NOT NULL,
  `etat_annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annee_academique`
--

INSERT INTO `annee_academique` (`id_anneee`, `annee`, `etat_annee`) VALUES
(1, '2020/2021', 0);

-- --------------------------------------------------------

--
-- Structure de la table `annee_autre`
--

CREATE TABLE `annee_autre` (
  `id-annee` int(11) NOT NULL,
  `annee_id` int(11) NOT NULL,
  `autre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annee_autre`
--

INSERT INTO `annee_autre` (`id-annee`, `annee_id`, `autre_id`) VALUES
(0, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `annee_competition`
--

CREATE TABLE `annee_competition` (
  `id_annee_competition` int(11) NOT NULL,
  `annee_id` int(11) NOT NULL,
  `competition_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annee_competition`
--

INSERT INTO `annee_competition` (`id_annee_competition`, `annee_id`, `competition_id`) VALUES
(31, 1, 415),
(32, 1, 416),
(33, 1, 417),
(34, 1, 418),
(35, 1, 419);

-- --------------------------------------------------------

--
-- Structure de la table `autre`
--

CREATE TABLE `autre` (
  `id_autre` int(11) NOT NULL,
  `nom_autre` varchar(255) NOT NULL,
  `date_autre` date NOT NULL,
  `etat_autre` int(11) NOT NULL,
  `statut_autre` int(11) NOT NULL,
  `occupation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `autre`
--

INSERT INTO `autre` (`id_autre`, `nom_autre`, `date_autre`, `etat_autre`, `statut_autre`, `occupation_id`) VALUES
(4, 'Entrainements FC Ngaoundéré', '2021-10-09', 0, 1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `faite_le` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `faite_le`) VALUES
(3, 'Basket', '2021-08-25 18:32:38'),
(4, 'Football', '2021-08-25 18:32:38'),
(5, 'Handball', '2021-08-25 18:33:03'),
(6, 'Volleyball', '2021-08-25 18:33:03');

-- --------------------------------------------------------

--
-- Structure de la table `competition`
--

CREATE TABLE `competition` (
  `id_competition` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date_debut` varchar(255) NOT NULL,
  `date_fin` varchar(255) NOT NULL,
  `etat_competition` int(11) DEFAULT NULL,
  `commentaire_competition` varchar(255) DEFAULT NULL,
  `type_competition` varchar(255) NOT NULL,
  `creer_le` datetime NOT NULL DEFAULT current_timestamp(),
  `respo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `competition`
--

INSERT INTO `competition` (`id_competition`, `nom`, `date_debut`, `date_fin`, `etat_competition`, `commentaire_competition`, `type_competition`, `creer_le`, `respo_id`) VALUES
(415, 'Coupe du Directeur', '2021-10-01', '2021-10-31', 1, '', 'Feminine', '2021-10-01 20:49:10', 10),
(416, 'Coupe du Directeur', '2021-10-08', '2021-10-31', 2, 'Stade Indisponible pour cette periode', 'Masculine', '2021-10-07 22:07:38', 10),
(417, 'Coupe du Directeur', '2021-10-15', '2021-10-31', 1, '', 'Feminine', '2021-10-07 22:13:03', 10),
(418, 'Coupe du Directeur', '2021-09-01', '2021-09-10', 1, '', 'Feminine', '2021-08-31 07:30:39', 10),
(419, 'Coupe du Directeur', '2023-12-01', '2024-01-01', NULL, NULL, 'Masculine', '2023-12-01 14:18:15', 10);

-- --------------------------------------------------------

--
-- Structure de la table `competition_discipline`
--

CREATE TABLE `competition_discipline` (
  `id_comp_discipline` int(11) NOT NULL,
  `id_compet` int(11) NOT NULL,
  `id_discipline` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `competition_discipline`
--

INSERT INTO `competition_discipline` (`id_comp_discipline`, `id_compet`, `id_discipline`) VALUES
(129, 415, 3),
(130, 416, 2),
(131, 417, 9),
(132, 418, 2);

-- --------------------------------------------------------

--
-- Structure de la table `competition_etablissement`
--

CREATE TABLE `competition_etablissement` (
  `id-competition_etablissement` int(11) NOT NULL,
  `id_competition` int(11) NOT NULL,
  `etablissement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `competition_etablissement`
--

INSERT INTO `competition_etablissement` (`id-competition_etablissement`, `id_competition`, `etablissement_id`) VALUES
(29, 415, 1),
(30, 416, 1),
(31, 417, 1),
(32, 418, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cycle`
--

CREATE TABLE `cycle` (
  `id_cycle` int(11) NOT NULL,
  `nom_cycle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cycle`
--

INSERT INTO `cycle` (`id_cycle`, `nom_cycle`) VALUES
(1, 'DUT'),
(2, 'Licence Technologique'),
(3, 'BTS'),
(4, 'Ingenieur de Conception'),
(5, 'Master');

-- --------------------------------------------------------

--
-- Structure de la table `discipline`
--

CREATE TABLE `discipline` (
  `id_discipline` int(11) NOT NULL,
  `nom_discipline` varchar(255) NOT NULL,
  `type_discipline` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `discipline`
--

INSERT INTO `discipline` (`id_discipline`, `nom_discipline`, `type_discipline`) VALUES
(1, 'Athletisme', 'Individuelle'),
(2, 'Basket', 'Collective'),
(3, 'Football', 'Collective'),
(4, 'Handball', 'Collective'),
(5, 'Judo', 'Individuelle'),
(6, 'Lutte', 'Individuelle'),
(7, 'Tennis', 'Individuelle'),
(8, 'Tennis de table', 'Individuelle'),
(9, 'Volley', 'Collective');

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `equipe_id` int(11) NOT NULL,
  `parcours_id` int(11) NOT NULL,
  `id_etab` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `discipline` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `matricule_responsable` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`equipe_id`, `parcours_id`, `id_etab`, `nom`, `discipline`, `genre`, `matricule_responsable`) VALUES
(371, 1, 1, 'Genie Informatique DUT 1', 'Football', 'Feminine', '20IO21IU'),
(372, 15, 1, 'Genie Civil Construction Durable DUT 1', 'Football', 'Feminine', '20BO21IU'),
(373, 2, 1, 'Genie Informatique DUT 2', 'Football', 'Feminine', '19IO21IU'),
(374, 9, 1, 'Genie Biologique IAB DUT 2', 'Football', 'Feminine', '18UI21IO'),
(375, 10, 1, 'Genie Biologique ABB DUT 2', 'Football', 'Feminine', ''),
(376, 11, 1, 'Genie Biologique GEN DUT 2', 'Football', 'Feminine', '20UI21IO'),
(377, 16, 1, 'Genie Civil Construction Durable DUT 2', 'Football', 'Feminine', '19UI21IO'),
(378, 17, 1, 'Genie Civil Construction Durable DUT 3', 'Football', 'Feminine', ''),
(379, 3, 1, 'Genie Informatique GLO Licence Technologique 1', 'Football', 'Feminine', ''),
(380, 4, 1, 'Genie Informatique RI Licence Technologique 1', 'Football', 'Feminine', ''),
(381, 12, 1, 'Genie Biologique IAB Licence Technologique 1', 'Football', 'Feminine', ''),
(382, 13, 1, 'Genie Biologique ABB Licence Technologique 1', 'Football', 'Feminine', ''),
(383, 14, 1, 'Genie Biologique GEN Licence Technologique 1', 'Football', 'Feminine', ''),
(384, 18, 1, 'Genie Informatique BTS 1', 'Football', 'Feminine', ''),
(385, 20, 1, 'Genie Civil Construction Durable BTS 1', 'Football', 'Feminine', ''),
(386, 19, 1, 'Genie Informatique BTS 2', 'Football', 'Feminine', ''),
(387, 21, 1, 'Genie Civil Construction Durable BTS 2', 'Football', 'Feminine', ''),
(388, 1, 1, 'Genie Informatique DUT 1', 'Basket', 'Masculine', ''),
(389, 15, 1, 'Genie Civil Construction Durable DUT 1', 'Basket', 'Masculine', ''),
(390, 2, 1, 'Genie Informatique DUT 2', 'Basket', 'Masculine', ''),
(391, 9, 1, 'Genie Biologique IAB DUT 2', 'Basket', 'Masculine', ''),
(392, 10, 1, 'Genie Biologique ABB DUT 2', 'Basket', 'Masculine', ''),
(393, 11, 1, 'Genie Biologique GEN DUT 2', 'Basket', 'Masculine', ''),
(394, 16, 1, 'Genie Civil Construction Durable DUT 2', 'Basket', 'Masculine', ''),
(395, 17, 1, 'Genie Civil Construction Durable DUT 3', 'Basket', 'Masculine', ''),
(396, 3, 1, 'Genie Informatique GLO Licence Technologique 1', 'Basket', 'Masculine', ''),
(397, 4, 1, 'Genie Informatique RI Licence Technologique 1', 'Basket', 'Masculine', ''),
(398, 12, 1, 'Genie Biologique IAB Licence Technologique 1', 'Basket', 'Masculine', ''),
(399, 13, 1, 'Genie Biologique ABB Licence Technologique 1', 'Basket', 'Masculine', ''),
(400, 14, 1, 'Genie Biologique GEN Licence Technologique 1', 'Basket', 'Masculine', ''),
(401, 18, 1, 'Genie Informatique BTS 1', 'Basket', 'Masculine', ''),
(402, 20, 1, 'Genie Civil Construction Durable BTS 1', 'Basket', 'Masculine', ''),
(403, 19, 1, 'Genie Informatique BTS 2', 'Basket', 'Masculine', ''),
(404, 21, 1, 'Genie Civil Construction Durable BTS 2', 'Basket', 'Masculine', ''),
(405, 1, 1, 'Genie Informatique DUT 1', 'Volley', 'Feminine', ''),
(406, 15, 1, 'Genie Civil Construction Durable DUT 1', 'Volley', 'Feminine', ''),
(407, 2, 1, 'Genie Informatique DUT 2', 'Volley', 'Feminine', '19IO21IU'),
(408, 9, 1, 'Genie Biologique IAB DUT 2', 'Volley', 'Feminine', ''),
(409, 10, 1, 'Genie Biologique ABB DUT 2', 'Volley', 'Feminine', ''),
(410, 11, 1, 'Genie Biologique GEN DUT 2', 'Volley', 'Feminine', ''),
(411, 16, 1, 'Genie Civil Construction Durable DUT 2', 'Volley', 'Feminine', ''),
(412, 17, 1, 'Genie Civil Construction Durable DUT 3', 'Volley', 'Feminine', ''),
(413, 3, 1, 'Genie Informatique GLO Licence Technologique 1', 'Volley', 'Feminine', ''),
(414, 4, 1, 'Genie Informatique RI Licence Technologique 1', 'Volley', 'Feminine', ''),
(415, 12, 1, 'Genie Biologique IAB Licence Technologique 1', 'Volley', 'Feminine', ''),
(416, 13, 1, 'Genie Biologique ABB Licence Technologique 1', 'Volley', 'Feminine', ''),
(417, 14, 1, 'Genie Biologique GEN Licence Technologique 1', 'Volley', 'Feminine', ''),
(418, 18, 1, 'Genie Informatique BTS 1', 'Volley', 'Feminine', ''),
(419, 20, 1, 'Genie Civil Construction Durable BTS 1', 'Volley', 'Feminine', ''),
(420, 19, 1, 'Genie Informatique BTS 2', 'Volley', 'Feminine', ''),
(421, 21, 1, 'Genie Civil Construction Durable BTS 2', 'Volley', 'Feminine', '21I077IU'),
(422, 1, 1, 'Genie Informatique DUT 1', 'Basket', 'Feminine', '20IO21IU'),
(423, 15, 1, 'Genie Civil Construction Durable DUT 1', 'Basket', 'Feminine', '20BO21IU'),
(424, 2, 1, 'Genie Informatique DUT 2', 'Basket', 'Feminine', '19I021IU'),
(425, 9, 1, 'Genie Biologique IAB DUT 2', 'Basket', 'Feminine', ''),
(426, 10, 1, 'Genie Biologique ABB DUT 2', 'Basket', 'Feminine', ''),
(427, 11, 1, 'Genie Biologique GEN DUT 2', 'Basket', 'Feminine', ''),
(428, 16, 1, 'Genie Civil Construction Durable DUT 2', 'Basket', 'Feminine', '19UI21IO'),
(429, 17, 1, 'Genie Civil Construction Durable DUT 3', 'Basket', 'Feminine', ''),
(430, 3, 1, 'Genie Informatique GLO Licence Technologique 1', 'Basket', 'Feminine', ''),
(431, 4, 1, 'Genie Informatique RI Licence Technologique 1', 'Basket', 'Feminine', ''),
(432, 12, 1, 'Genie Biologique IAB Licence Technologique 1', 'Basket', 'Feminine', ''),
(433, 13, 1, 'Genie Biologique ABB Licence Technologique 1', 'Basket', 'Feminine', ''),
(434, 14, 1, 'Genie Biologique GEN Licence Technologique 1', 'Basket', 'Feminine', ''),
(435, 18, 1, 'Genie Informatique BTS 1', 'Basket', 'Feminine', ''),
(436, 20, 1, 'Genie Civil Construction Durable BTS 1', 'Basket', 'Feminine', ''),
(437, 19, 1, 'Genie Informatique BTS 2', 'Basket', 'Feminine', ''),
(438, 21, 1, 'Genie Civil Construction Durable BTS 2', 'Basket', 'Feminine', '');

-- --------------------------------------------------------

--
-- Structure de la table `equipe_rencontre`
--

CREATE TABLE `equipe_rencontre` (
  `id_equip_rencontre` int(11) NOT NULL,
  `rencontre_id` int(11) NOT NULL,
  `equipe_id` int(255) NOT NULL,
  `equipe_id2` int(255) NOT NULL,
  `nom_equipe1` varchar(255) NOT NULL,
  `nom_equipe2` varchar(255) NOT NULL,
  `resultat_equipe1` int(11) NOT NULL,
  `resultat_equipe2` int(11) NOT NULL,
  `statut_rencontre` int(11) NOT NULL,
  `etat_rencontre` int(11) NOT NULL,
  `commentaire_rencontre` varchar(255) NOT NULL,
  `poule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equipe_rencontre`
--

INSERT INTO `equipe_rencontre` (`id_equip_rencontre`, `rencontre_id`, `equipe_id`, `equipe_id2`, `nom_equipe1`, `nom_equipe2`, `resultat_equipe1`, `resultat_equipe2`, `statut_rencontre`, `etat_rencontre`, `commentaire_rencontre`, `poule_id`) VALUES
(242, 578, 377, 372, 'Genie Civil Construction Durable DUT 2 ', 'Genie Civil Construction Durable DUT 1 ', 1, 1, 1, 1, '', 623),
(243, 579, 374, 373, 'Genie Biologique IAB DUT 2 ', 'Genie Informatique DUT 2 ', 0, 0, 0, 2, 'Stade occupé', 624),
(246, 582, 424, 422, 'Genie Informatique DUT 2 ', 'Genie Informatique DUT 1 ', 54, 31, 1, 1, '', 670);

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE `etablissement` (
  `id_etablissement` int(11) NOT NULL,
  `nom_etablissement` varchar(255) NOT NULL,
  `sigle` varchar(255) NOT NULL,
  `contact_etablissement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etablissement`
--

INSERT INTO `etablissement` (`id_etablissement`, `nom_etablissement`, `sigle`, `contact_etablissement`) VALUES
(1, 'Institut Universitaire De Technologie De Ngaoundere', 'IUT', 222254002),
(2, 'Ecole Nationale Supérieure des Sciences Agro-industrielles', 'ENSAI', 222251313);

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `title`, `start_date`, `end_date`, `user_id`) VALUES
(14, 'Préparation défilé  Stade principal', '2021-09-30 15:00:00', '2021-10-10 00:00:00', 0),
(15, 'Coupe du directeur', '2021-09-08 17:30:00', '2021-09-30 17:00:00', 0),
(17, 'Stade de basket indisponible', '2021-09-03 08:00:00', '2022-06-30 10:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `id_filiere` int(11) NOT NULL,
  `nom_filiere` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`id_filiere`, `nom_filiere`) VALUES
(1, 'Genie Informatique'),
(2, 'Genie Biologique'),
(3, 'Genie Civil Construction Durable'),
(4, 'Genie Informatique GLO'),
(5, 'Genie Informatique RI'),
(6, 'Genie Biologique IAB'),
(7, 'Genie Biologique ABB'),
(8, 'Genie Biologique GEN'),
(9, 'Genie Industriel et Maintenance GEL'),
(10, 'Genie Industriel et Maintenance GMP'),
(11, 'Genie Industriel et Maintenance MIP'),
(12, 'Genie Industriel et Maintenance TE'),
(13, 'Génie des Procédés industriels'),
(14, 'Sciences Alimentaires et Nutrition'),
(15, 'Ingénierie des Equipements Agro-industriels'),
(16, 'Chimie Industrielle et Environnement');

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `id` int(11) NOT NULL,
  `parcours` varchar(255) NOT NULL,
  `matricule` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `Genre_discipline` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `inscription` datetime NOT NULL DEFAULT current_timestamp(),
  `annee_academique` varchar(255) NOT NULL,
  `matricule_respo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`id`, `parcours`, `matricule`, `nom`, `prenom`, `Genre_discipline`, `contact`, `email`, `inscription`, `annee_academique`, `matricule_respo`) VALUES
(83, '', '19IO21IU', 'FOUDA', 'ONDOA', 'Masculine', '695249549', 'yvesjourdanfouda555@gmail.com', '2021-10-07 22:58:37', '2020/2021', '19IO21IU'),
(84, '', '19IO455IU', 'Cold', 'Worldend', 'Masculine', '6559255', 'cold@gmail,com', '2021-10-07 22:59:08', '2020/2021', '19IO21IU'),
(98, '', '19IO210IU', 'Lou', 'Deshom', 'Masculine', '6971254', 'Lou@gmail,com', '2021-10-08 06:47:49', '2020/2021', '19IO21IU'),
(99, '', '19IO145IU', 'Yoshi', 'Island', 'Feminine', '6454554', 'Yoshi@gmail,com', '2021-10-08 06:47:49', '2020/2021', '19IO21IU'),
(100, '', '19IO450IU', 'Edgar', 'Gothique', 'Masculine', '', 'Edgar@gmail,com', '2021-10-08 06:47:49', '2020/2021', '19IO21IU'),
(101, '', '19IO560IU', 'Elprimo', 'Istgame', 'Masculine', '', '', '2021-10-08 06:47:49', '2020/2021', '19IO21IU'),
(102, '', '19IO586IU', 'Jessy', 'Fantastiquejess', 'Feminine', '', '', '2021-10-08 06:47:49', '2020/2021', '19IO21IU'),
(103, '', '18IO587IU', 'Bull', 'Poidslourd', 'Masculine', '', '', '2021-10-08 06:47:49', '2020/2021', '19IO21IU'),
(104, '', '18IO589IU', 'Rosa', 'Poidslourd', 'Feminine', '', '', '2021-10-08 06:47:49', '2020/2021', '19IO21IU'),
(105, '', '19io256IU', 'Like', 'Likeme', 'Masculine', '', '', '2021-10-08 06:47:49', '2020/2021', '19IO21IU'),
(106, '', '19IO5840IU', 'Edgar', 'Istgame', 'Masculine', '', '', '2021-10-08 06:47:49', '2020/2021', '19IO21IU'),
(107, '', '19IO486IU', 'Feel ', 'Goodjess', 'Feminine', '', '', '2021-10-08 06:47:49', '2020/2021', '19IO21IU'),
(109, '', '18IO789IU', 'Benzene', 'Messi', 'Feminine', '', '', '2021-10-08 06:47:49', '2020/2021', '19IO21IU'),
(111, '', '18IO887IU', 'Loky', 'Brook', 'Masculine', '', '', '2021-10-08 11:06:43', '2020/2021', '19IO21IU'),
(112, '', '19IO2568IU', 'Madogo', 'Liklike', 'Masculine', '', '', '2021-10-08 11:06:43', '2020/2021', '19IO21IU');

-- --------------------------------------------------------

--
-- Structure de la table `joueur_discipline`
--

CREATE TABLE `joueur_discipline` (
  `id_jr_dis` int(11) NOT NULL,
  `joueur_id` int(11) NOT NULL,
  `discipline_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `joueur_discipline`
--

INSERT INTO `joueur_discipline` (`id_jr_dis`, `joueur_id`, `discipline_id`) VALUES
(62, 99, 3),
(63, 102, 3),
(64, 104, 3),
(65, 107, 3),
(66, 109, 3);

-- --------------------------------------------------------

--
-- Structure de la table `joueur_equipe`
--

CREATE TABLE `joueur_equipe` (
  `id_joueur_equipe` int(11) NOT NULL,
  `equipe_id` int(11) NOT NULL,
  `id_jr` int(255) NOT NULL,
  `annee_academique` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `joueur_equipe`
--

INSERT INTO `joueur_equipe` (`id_joueur_equipe`, `equipe_id`, `id_jr`, `annee_academique`, `date_inscription`) VALUES
(72, 373, 62, '', '2021-10-08 06:49:14'),
(73, 373, 63, '', '2021-10-08 06:49:15'),
(74, 373, 64, '', '2021-10-08 06:49:15'),
(75, 373, 65, '', '2021-10-08 06:49:15'),
(76, 373, 66, '', '2021-10-08 06:49:15');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `poster_le` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `post` timestamp NOT NULL DEFAULT current_timestamp(),
  `text` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `categorie_id`, `user_id`, `title`, `slug`, `post`, `text`, `image`) VALUES
(28, 4, 10, 'Coupe féminine de Football', 'coupe-f??minine-de-football', '2021-10-01 17:30:06', '<p>Etablissement :&nbsp;<strong>Institut Universitaire De Technologie De Ngaoundere</strong></p>\r\n\r\n<p><strong>Du:</strong>01-Oct-2021&nbsp;<strong>au&nbsp;</strong>31-Oct-2021</p>\r\n\r\n<p><strong>discipline :</strong>Football</p>\r\n\r\n<p><strong>annee acad&eacute;mique :</strong>2020/2021&nbsp;&nbsp;</p>\r\n\r\n<p>Les responsables de classe concercen&eacute;s sont prier de se rendre au service des sports de l&#39;&eacute;tablissement pour remplir les modalit&eacute;s d&#39;inscription de leurs &eacute;quipes respectives</p>\r\n', 'vide.png'),
(29, 3, 10, 'Coupe du Directeur Masculine de Basket', 'coupe-du-directeurmasculine-de-basket', '2021-10-07 19:32:47', '<p>Etablissement :&nbsp;<strong>Institut Universitaire De Technologie De Ngaoundere</strong></p>\r\n\r\n<p><strong>Du:</strong>08-Oct-2021&nbsp;<strong>au&nbsp;</strong>31-Oct-2021</p>\r\n\r\n<p><strong>discipline :</strong>Basket</p>\r\n\r\n<p><strong>annee acad&eacute;mique :</strong>2020/2021&nbsp;</p>\r\n\r\n<p>Nous vous informons que la coupe du directeur initialement pr&eacute;vue le 8 octobre sera report&eacute;e a une date qui vous sera communiqu&eacute; ult&eacute;rieurement</p>\r\n', 'vide.png'),
(30, 3, 10, 'Coupe du Directeur Féminine de Basket', 'coupe-du-directeur-f??minine-de-basket', '2021-08-25 04:59:16', '<p>Etablissement :&nbsp;<strong>Institut Universitaire De Technologie De Ngaoundere</strong></p>\r\n\r\n<p><strong>Du:</strong>01-Sep-2021&nbsp;<strong>au&nbsp;</strong>10-Oct-2021</p>\r\n\r\n<p><strong>discipline :</strong>Basket</p>\r\n\r\n<p><strong>annee acad&eacute;mique :</strong>2020/2021</p>\r\n', 'vide.png'),
(31, 3, 10, 'Coupe du Directeur Féminine de Basket', 'coupe-du-directeurf??minine-de-basket', '2021-09-10 05:00:39', '<p>Etablissement :&nbsp;<strong>Institut Universitaire De Technologie De Ngaoundere</strong></p>\r\n\r\n<p><strong>Du:</strong>01-Sep-2021&nbsp;<strong>au&nbsp;</strong>10-Sep-2021</p>\r\n\r\n<p><strong>discipline :</strong>Basket</p>\r\n\r\n<p><strong>annee acad&eacute;mique :</strong>2020/2021</p>\r\n\r\n<p>Nous communiquons sur la victoire de Genie Informatique DUT 2 sur la comp&eacute;tition f&eacute;minine de Basket.</p>\r\n', 'vide.png'),
(32, 4, 10, 'Resumé du match', 'resumé-du-match', '2023-12-01 13:25:18', '<p>Dans le monde du web et du graphisme, le contenu est roi. Mais avant d&rsquo;arriver &agrave; la phase finale d&rsquo;une maquette ou d&rsquo;un site web, les concepteurs ont souvent besoin d&rsquo;une base sur laquelle ils peuvent travailler sans &ecirc;tre distraits par le contenu r&eacute;el. C&rsquo;est ici que le faux texte entre en jeu, un &eacute;l&eacute;ment essentiel de l&rsquo;arsenal d&rsquo;un graphiste ou d&rsquo;un d&eacute;veloppeur. Le g&eacute;n&eacute;rateur de faux texte est un outil web con&ccedil;u pour aider les concepteurs, les r&eacute;dacteurs et les d&eacute;veloppeurs &agrave; produire du texte de remplissage pour leurs projets.</p>\r\n', 'vide.png');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `id_niveau` int(11) NOT NULL,
  `nom_niveau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`id_niveau`, `nom_niveau`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5');

-- --------------------------------------------------------

--
-- Structure de la table `occupation`
--

CREATE TABLE `occupation` (
  `id_occupation` int(11) NOT NULL,
  `debut_occupation` time NOT NULL,
  `fin_occupation` time NOT NULL,
  `etat_occupation` int(11) NOT NULL,
  `uniq` varchar(255) NOT NULL,
  `stade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `occupation`
--

INSERT INTO `occupation` (`id_occupation`, `debut_occupation`, `fin_occupation`, `etat_occupation`, `uniq`, `stade_id`) VALUES
(9, '22:00:00', '23:30:00', 0, '1fa675e16fc09a', 6),
(13, '07:05:00', '09:20:00', 0, '2ff339ea2517a2', 6),
(14, '17:10:00', '19:25:00', 0, '66f66b3feee9b8', 9),
(20, '08:45:00', '11:00:00', 0, 'ca6e6372e65e52', 6),
(21, '09:00:00', '11:15:00', 0, '4b5e3e89e0b4de', 6),
(22, '07:30:00', '09:45:00', 0, 'f981cf964e47e4', 7),
(23, '07:30:00', '09:45:00', 0, 'c06548ae4a9690', 7),
(24, '10:30:00', '12:45:00', 0, '1039a1e51a803e', 7);

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

CREATE TABLE `parcours` (
  `id_parcours` int(11) NOT NULL,
  `id_nom_etablissement` int(11) NOT NULL,
  `id_cycle_parcours` int(11) NOT NULL,
  `id_filiere_parcours` int(11) NOT NULL,
  `id_niveau_parcours` int(11) NOT NULL,
  `etat_parcours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parcours`
--

INSERT INTO `parcours` (`id_parcours`, `id_nom_etablissement`, `id_cycle_parcours`, `id_filiere_parcours`, `id_niveau_parcours`, `etat_parcours`) VALUES
(1, 1, 1, 1, 1, 0),
(2, 1, 1, 1, 2, 0),
(3, 1, 2, 4, 1, 0),
(4, 1, 2, 5, 1, 0),
(9, 1, 1, 6, 2, 0),
(10, 1, 1, 7, 2, 0),
(11, 1, 1, 8, 2, 0),
(12, 1, 2, 6, 1, 0),
(13, 1, 2, 7, 1, 0),
(14, 1, 2, 8, 1, 0),
(15, 1, 1, 3, 1, 0),
(16, 1, 1, 3, 2, 0),
(17, 1, 1, 3, 3, 0),
(18, 1, 3, 1, 1, 0),
(19, 1, 3, 1, 2, 0),
(20, 1, 3, 3, 1, 0),
(21, 1, 3, 3, 2, 0),
(23, 2, 5, 14, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `performance`
--

CREATE TABLE `performance` (
  `id` int(11) NOT NULL,
  `valeur_performance` int(11) NOT NULL,
  `victoire` int(11) NOT NULL,
  `defaite` int(11) NOT NULL,
  `nul` int(11) NOT NULL,
  `difference_de_score` int(11) NOT NULL,
  `rencontre_id` int(11) NOT NULL,
  `editer_le` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `phase`
--

CREATE TABLE `phase` (
  `id_phase` int(11) NOT NULL,
  `nom_phase` varchar(255) NOT NULL,
  `date_debut` varchar(255) NOT NULL,
  `compet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `phase`
--

INSERT INTO `phase` (`id_phase`, `nom_phase`, `date_debut`, `compet_id`) VALUES
(537, 'Demies-Finales', '2021-10-20', 415),
(538, 'Finale', '2021-10-30', 415),
(539, 'Eliminatoire', '2021-10-09', 416),
(540, '8-Finales', '2021-10-13', 416),
(541, '4-Finales', '2021-10-17', 416),
(542, 'Demies-Finales', '2021-10-20', 416),
(543, 'Finale', '2021-10-30', 416),
(544, 'Eliminatoire', '2021-10-16', 417),
(545, '8-Finales', '2021-10-20', 417),
(546, '4-Finales', '2021-10-23', 417),
(547, 'Demies-Finales', '2021-10-25', 417),
(548, 'Finale', '2021-10-30', 417),
(550, 'Finale', '2021-09-09', 418);

-- --------------------------------------------------------

--
-- Structure de la table `phase_discipline`
--

CREATE TABLE `phase_discipline` (
  `id_phase_discipline` int(11) NOT NULL,
  `phase_id` int(11) NOT NULL,
  `discipline_id` int(11) NOT NULL,
  `id_compet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `phase_discipline`
--

INSERT INTO `phase_discipline` (`id_phase_discipline`, `phase_id`, `discipline_id`, `id_compet`) VALUES
(428, 537, 3, 415),
(429, 538, 3, 415),
(430, 539, 2, 416),
(431, 540, 2, 416),
(432, 541, 2, 416),
(433, 542, 2, 416),
(434, 543, 2, 416),
(435, 544, 9, 417),
(436, 545, 9, 417),
(437, 546, 9, 417),
(438, 547, 9, 417),
(439, 548, 9, 417),
(441, 550, 2, 418);

-- --------------------------------------------------------

--
-- Structure de la table `poule`
--

CREATE TABLE `poule` (
  `id` int(11) NOT NULL,
  `nom_poule` varchar(255) NOT NULL,
  `phase_id` int(255) NOT NULL,
  `competition_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `poule`
--

INSERT INTO `poule` (`id`, `nom_poule`, `phase_id`, `competition_id`) VALUES
(623, 'Demies-Finales 1', 537, 415),
(624, 'Demies-Finales 2', 537, 415),
(625, 'Finale', 538, 415),
(626, 'Groupe 1', 539, 416),
(627, 'Groupe 2', 539, 416),
(628, 'Groupe 3', 539, 416),
(629, 'Groupe 4', 539, 416),
(630, 'Groupe 5', 539, 416),
(631, 'Groupe 6', 539, 416),
(632, '8-Finales 1', 540, 416),
(633, '8-Finales 2', 540, 416),
(634, '8-Finales 3', 540, 416),
(635, '8-Finales 4', 540, 416),
(636, '8-Finales 5', 540, 416),
(637, '8-Finales 6', 540, 416),
(638, '8-Finales 7', 540, 416),
(639, '8-Finales 8', 540, 416),
(640, '4-Finales 1', 541, 416),
(641, '4-Finales 2', 541, 416),
(642, '4-Finales 3', 541, 416),
(643, '4-Finales 4', 541, 416),
(644, 'Demies-Finales 1', 542, 416),
(645, 'Demies-Finales 2', 542, 416),
(646, 'Finale', 543, 416),
(647, 'Groupe 1', 544, 417),
(648, 'Groupe 2', 544, 417),
(649, 'Groupe 3', 544, 417),
(650, 'Groupe 4', 544, 417),
(651, 'Groupe 5', 544, 417),
(652, 'Groupe 6', 544, 417),
(653, '8-Finales 1', 545, 417),
(654, '8-Finales 2', 545, 417),
(655, '8-Finales 3', 545, 417),
(656, '8-Finales 4', 545, 417),
(657, '8-Finales 5', 545, 417),
(658, '8-Finales 6', 545, 417),
(659, '8-Finales 7', 545, 417),
(660, '8-Finales 8', 545, 417),
(661, '4-Finales 1', 546, 417),
(662, '4-Finales 2', 546, 417),
(663, '4-Finales 3', 546, 417),
(664, '4-Finales 4', 546, 417),
(665, 'Demies-Finales 1', 547, 417),
(666, 'Demies-Finales 2', 547, 417),
(667, 'Finale', 548, 417),
(670, 'Finale', 550, 418);

-- --------------------------------------------------------

--
-- Structure de la table `poule_equipe`
--

CREATE TABLE `poule_equipe` (
  `id` int(11) NOT NULL,
  `id_poule` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL,
  `phase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `poule_equipe`
--

INSERT INTO `poule_equipe` (`id`, `id_poule`, `id_equipe`, `phase`) VALUES
(324, 623, 377, 537),
(325, 623, 372, 537),
(326, 624, 374, 537),
(327, 624, 373, 537),
(332, 670, 424, 550),
(333, 670, 422, 550),
(334, 625, 371, 538),
(335, 625, 373, 538),
(336, 647, 421, 544);

-- --------------------------------------------------------

--
-- Structure de la table `rencontre`
--

CREATE TABLE `rencontre` (
  `id_rencontre` int(11) NOT NULL,
  `date_rencontre` date NOT NULL,
  `Journee` varchar(255) NOT NULL,
  `occupation_id` int(11) NOT NULL,
  `phasedisciple_id` int(11) NOT NULL,
  `recup_unique` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rencontre`
--

INSERT INTO `rencontre` (`id_rencontre`, `date_rencontre`, `Journee`, `occupation_id`, `phasedisciple_id`, `recup_unique`) VALUES
(578, '2021-10-21', '1 ', 20, 428, '94a3e0bcba3bb1'),
(579, '2021-10-24', '1 ', 21, 428, '136f51e5dfa117'),
(582, '2021-09-09', '1 ', 24, 441, '05335f49ccfe2a');

-- --------------------------------------------------------

--
-- Structure de la table `stade`
--

CREATE TABLE `stade` (
  `id_stade` int(11) NOT NULL,
  `nom_stade` varchar(255) NOT NULL,
  `lieu_stade` varchar(255) NOT NULL,
  `etat_stade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stade`
--

INSERT INTO `stade` (`id_stade`, `nom_stade`, `lieu_stade`, `etat_stade`) VALUES
(6, 'Football', 'Guerite', 0),
(7, 'Basket', 'Guerite', 0),
(8, 'Volley', 'Guerite', 0),
(9, 'Handball', 'Faculte des sciences de l\'education', 0);

-- --------------------------------------------------------

--
-- Structure de la table `type_competition`
--

CREATE TABLE `type_competition` (
  `competition_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_competition`
--

INSERT INTO `type_competition` (`competition_type`) VALUES
('Feminine'),
('Masculine');

-- --------------------------------------------------------

--
-- Structure de la table `type_discipline`
--

CREATE TABLE `type_discipline` (
  `type_discipline` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_discipline`
--

INSERT INTO `type_discipline` (`type_discipline`) VALUES
('Collective'),
('Individuelle');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `matricule` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `username`, `nom`, `prenom`, `role`, `password`, `matricule`, `email`, `contact`) VALUES
(9, 'Olga', '', '', 'Administrateur', 'olga_admin', '', '', ''),
(10, 'Lejeune', '', '', 'Responsable de competition', 'lejeune123456', '', '', ''),
(11, 'RC-IUT-GLO3', '', '', 'Responsable de classe', 'yves123456', '18IO21IU', '', ''),
(12, 'Like', '', '', 'Daza', 'like123456', '', '', ''),
(13, 'RC-IUT-GIN2', '', '', 'Responsable de classe', 'RC-IUT-GIN2123456', '19IO21IU', '', ''),
(14, 'RCENSAI', '', '', 'Responsable de competition', 'RCENSAI123456', '', '', ''),
(19, 'RC-IUT-GIN1', '', '', 'Responsable de classe', 'RC-IUT-GIN1123456', '20IO21IU', '', ''),
(20, 'RC-IUT-GCD2', '', '', 'Responsable de classe', 'RC-IUT-GCD2123456', '19UI21IO', '', ''),
(21, 'RC-IUT-GEN2', '', '', 'Responsable de classe', 'RC-IUT-GCD2123456', '20UI21IO', '', ''),
(22, 'RC-IUT-IAB2', '', '', 'Responsable de classe', 'RC-IUT-IAB2123456', '18UI21IO', '', ''),
(23, 'RC-IUT-GCD1', '', '', 'Responsable de classe', 'RC-IUT-GCD1123456', '20BO21IU', '', ''),
(24, 'RC-IUT-MIP1', '', '', 'Responsable de classe', 'RC-IUT-MIP1123456', '20MP21IO', '', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annee_academique`
--
ALTER TABLE `annee_academique`
  ADD PRIMARY KEY (`id_anneee`);

--
-- Index pour la table `annee_autre`
--
ALTER TABLE `annee_autre`
  ADD KEY `annee_id` (`annee_id`),
  ADD KEY `autre_id` (`autre_id`);

--
-- Index pour la table `annee_competition`
--
ALTER TABLE `annee_competition`
  ADD PRIMARY KEY (`id_annee_competition`),
  ADD KEY `annee_competition_ibfk_1` (`annee_id`),
  ADD KEY `competition_id` (`competition_id`);

--
-- Index pour la table `autre`
--
ALTER TABLE `autre`
  ADD PRIMARY KEY (`id_autre`),
  ADD KEY `occupation_id` (`occupation_id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`id_competition`),
  ADD KEY `type_competition` (`type_competition`);

--
-- Index pour la table `competition_discipline`
--
ALTER TABLE `competition_discipline`
  ADD PRIMARY KEY (`id_comp_discipline`),
  ADD KEY `id_compet` (`id_compet`),
  ADD KEY `id_discipline` (`id_discipline`);

--
-- Index pour la table `competition_etablissement`
--
ALTER TABLE `competition_etablissement`
  ADD PRIMARY KEY (`id-competition_etablissement`),
  ADD KEY `competition_etablissement_ibfk_1` (`etablissement_id`),
  ADD KEY `id_competition` (`id_competition`);

--
-- Index pour la table `cycle`
--
ALTER TABLE `cycle`
  ADD PRIMARY KEY (`id_cycle`);

--
-- Index pour la table `discipline`
--
ALTER TABLE `discipline`
  ADD PRIMARY KEY (`id_discipline`),
  ADD KEY `id_type_disciple` (`type_discipline`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`equipe_id`);

--
-- Index pour la table `equipe_rencontre`
--
ALTER TABLE `equipe_rencontre`
  ADD PRIMARY KEY (`id_equip_rencontre`),
  ADD KEY `rencontre_id` (`rencontre_id`),
  ADD KEY `equipe_rencontre_ibfk_3` (`equipe_id`),
  ADD KEY `equipe_rencontre_ibfk_4` (`equipe_id2`);

--
-- Index pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`id_etablissement`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id_filiere`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `joueur_discipline`
--
ALTER TABLE `joueur_discipline`
  ADD PRIMARY KEY (`id_jr_dis`),
  ADD KEY `joueur_id` (`joueur_id`),
  ADD KEY `discipline_id` (`discipline_id`);

--
-- Index pour la table `joueur_equipe`
--
ALTER TABLE `joueur_equipe`
  ADD PRIMARY KEY (`id_joueur_equipe`),
  ADD KEY `equipe_id` (`equipe_id`),
  ADD KEY `joueur_equipe_ibfk_3` (`annee_academique`),
  ADD KEY `joueur_equipe_ibfk_1` (`id_jr`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id_niveau`);

--
-- Index pour la table `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`id_occupation`),
  ADD KEY `stade_id` (`stade_id`);

--
-- Index pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD PRIMARY KEY (`id_parcours`),
  ADD KEY `parcours_ibfk_1` (`id_nom_etablissement`),
  ADD KEY `id_filiere_parcours` (`id_filiere_parcours`),
  ADD KEY `id_niveau_parcours` (`id_niveau_parcours`),
  ADD KEY `id_cycle_parcours` (`id_cycle_parcours`);

--
-- Index pour la table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rencontre_id` (`rencontre_id`);

--
-- Index pour la table `phase`
--
ALTER TABLE `phase`
  ADD PRIMARY KEY (`id_phase`);

--
-- Index pour la table `phase_discipline`
--
ALTER TABLE `phase_discipline`
  ADD PRIMARY KEY (`id_phase_discipline`),
  ADD KEY `phase_discipline_ibfk_3` (`phase_id`),
  ADD KEY `phase_discipline_ibfk_4` (`discipline_id`);

--
-- Index pour la table `poule`
--
ALTER TABLE `poule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phase_id` (`phase_id`);

--
-- Index pour la table `poule_equipe`
--
ALTER TABLE `poule_equipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_poule` (`id_poule`),
  ADD KEY `id_equipe` (`id_equipe`);

--
-- Index pour la table `rencontre`
--
ALTER TABLE `rencontre`
  ADD PRIMARY KEY (`id_rencontre`),
  ADD KEY `phasedisciple_id` (`phasedisciple_id`);

--
-- Index pour la table `stade`
--
ALTER TABLE `stade`
  ADD PRIMARY KEY (`id_stade`);

--
-- Index pour la table `type_competition`
--
ALTER TABLE `type_competition`
  ADD PRIMARY KEY (`competition_type`);

--
-- Index pour la table `type_discipline`
--
ALTER TABLE `type_discipline`
  ADD PRIMARY KEY (`type_discipline`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annee_academique`
--
ALTER TABLE `annee_academique`
  MODIFY `id_anneee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `annee_competition`
--
ALTER TABLE `annee_competition`
  MODIFY `id_annee_competition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `autre`
--
ALTER TABLE `autre`
  MODIFY `id_autre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `competition`
--
ALTER TABLE `competition`
  MODIFY `id_competition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;

--
-- AUTO_INCREMENT pour la table `competition_discipline`
--
ALTER TABLE `competition_discipline`
  MODIFY `id_comp_discipline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT pour la table `competition_etablissement`
--
ALTER TABLE `competition_etablissement`
  MODIFY `id-competition_etablissement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `cycle`
--
ALTER TABLE `cycle`
  MODIFY `id_cycle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `discipline`
--
ALTER TABLE `discipline`
  MODIFY `id_discipline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `equipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=439;

--
-- AUTO_INCREMENT pour la table `equipe_rencontre`
--
ALTER TABLE `equipe_rencontre`
  MODIFY `id_equip_rencontre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT pour la table `etablissement`
--
ALTER TABLE `etablissement`
  MODIFY `id_etablissement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id_filiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT pour la table `joueur_discipline`
--
ALTER TABLE `joueur_discipline`
  MODIFY `id_jr_dis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `joueur_equipe`
--
ALTER TABLE `joueur_equipe`
  MODIFY `id_joueur_equipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id_niveau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `id_occupation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `parcours`
--
ALTER TABLE `parcours`
  MODIFY `id_parcours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `performance`
--
ALTER TABLE `performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `phase`
--
ALTER TABLE `phase`
  MODIFY `id_phase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=551;

--
-- AUTO_INCREMENT pour la table `phase_discipline`
--
ALTER TABLE `phase_discipline`
  MODIFY `id_phase_discipline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=442;

--
-- AUTO_INCREMENT pour la table `poule`
--
ALTER TABLE `poule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=671;

--
-- AUTO_INCREMENT pour la table `poule_equipe`
--
ALTER TABLE `poule_equipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

--
-- AUTO_INCREMENT pour la table `rencontre`
--
ALTER TABLE `rencontre`
  MODIFY `id_rencontre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=583;

--
-- AUTO_INCREMENT pour la table `stade`
--
ALTER TABLE `stade`
  MODIFY `id_stade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annee_autre`
--
ALTER TABLE `annee_autre`
  ADD CONSTRAINT `annee_autre_ibfk_1` FOREIGN KEY (`annee_id`) REFERENCES `annee_academique` (`id_anneee`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `annee_autre_ibfk_2` FOREIGN KEY (`autre_id`) REFERENCES `autre` (`id_autre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `annee_competition`
--
ALTER TABLE `annee_competition`
  ADD CONSTRAINT `annee_competition_ibfk_1` FOREIGN KEY (`annee_id`) REFERENCES `annee_academique` (`id_anneee`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `annee_competition_ibfk_2` FOREIGN KEY (`competition_id`) REFERENCES `competition` (`id_competition`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `autre`
--
ALTER TABLE `autre`
  ADD CONSTRAINT `autre_ibfk_1` FOREIGN KEY (`occupation_id`) REFERENCES `occupation` (`id_occupation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `competition`
--
ALTER TABLE `competition`
  ADD CONSTRAINT `competition_ibfk_1` FOREIGN KEY (`type_competition`) REFERENCES `type_competition` (`competition_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `competition_discipline`
--
ALTER TABLE `competition_discipline`
  ADD CONSTRAINT `competition_discipline_ibfk_1` FOREIGN KEY (`id_compet`) REFERENCES `competition` (`id_competition`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `competition_discipline_ibfk_2` FOREIGN KEY (`id_discipline`) REFERENCES `discipline` (`id_discipline`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `competition_etablissement`
--
ALTER TABLE `competition_etablissement`
  ADD CONSTRAINT `competition_etablissement_ibfk_1` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissement` (`id_etablissement`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `competition_etablissement_ibfk_2` FOREIGN KEY (`id_competition`) REFERENCES `competition` (`id_competition`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `discipline`
--
ALTER TABLE `discipline`
  ADD CONSTRAINT `discipline_ibfk_1` FOREIGN KEY (`type_discipline`) REFERENCES `type_discipline` (`type_discipline`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `equipe_rencontre`
--
ALTER TABLE `equipe_rencontre`
  ADD CONSTRAINT `equipe_rencontre_ibfk_2` FOREIGN KEY (`rencontre_id`) REFERENCES `rencontre` (`id_rencontre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipe_rencontre_ibfk_3` FOREIGN KEY (`equipe_id`) REFERENCES `equipe` (`equipe_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipe_rencontre_ibfk_4` FOREIGN KEY (`equipe_id2`) REFERENCES `equipe` (`equipe_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `joueur_discipline`
--
ALTER TABLE `joueur_discipline`
  ADD CONSTRAINT `joueur_discipline_ibfk_1` FOREIGN KEY (`joueur_id`) REFERENCES `joueur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `joueur_discipline_ibfk_2` FOREIGN KEY (`discipline_id`) REFERENCES `discipline` (`id_discipline`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `joueur_equipe`
--
ALTER TABLE `joueur_equipe`
  ADD CONSTRAINT `joueur_equipe_ibfk_1` FOREIGN KEY (`id_jr`) REFERENCES `joueur_discipline` (`id_jr_dis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `occupation`
--
ALTER TABLE `occupation`
  ADD CONSTRAINT `occupation_ibfk_1` FOREIGN KEY (`stade_id`) REFERENCES `stade` (`id_stade`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD CONSTRAINT `parcours_ibfk_1` FOREIGN KEY (`id_nom_etablissement`) REFERENCES `etablissement` (`id_etablissement`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parcours_ibfk_2` FOREIGN KEY (`id_filiere_parcours`) REFERENCES `filiere` (`id_filiere`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parcours_ibfk_3` FOREIGN KEY (`id_niveau_parcours`) REFERENCES `niveau` (`id_niveau`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parcours_ibfk_4` FOREIGN KEY (`id_cycle_parcours`) REFERENCES `cycle` (`id_cycle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `phase_discipline`
--
ALTER TABLE `phase_discipline`
  ADD CONSTRAINT `phase_discipline_ibfk_3` FOREIGN KEY (`phase_id`) REFERENCES `phase` (`id_phase`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phase_discipline_ibfk_4` FOREIGN KEY (`discipline_id`) REFERENCES `discipline` (`id_discipline`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `poule`
--
ALTER TABLE `poule`
  ADD CONSTRAINT `poule_ibfk_1` FOREIGN KEY (`phase_id`) REFERENCES `phase` (`id_phase`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `poule_equipe`
--
ALTER TABLE `poule_equipe`
  ADD CONSTRAINT `poule_equipe_ibfk_2` FOREIGN KEY (`id_poule`) REFERENCES `poule` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `poule_equipe_ibfk_3` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`equipe_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rencontre`
--
ALTER TABLE `rencontre`
  ADD CONSTRAINT `rencontre_ibfk_1` FOREIGN KEY (`phasedisciple_id`) REFERENCES `phase_discipline` (`id_phase_discipline`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
