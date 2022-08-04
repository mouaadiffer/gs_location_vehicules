-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 16 mai 2022 à 15:49
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_parc_automobile`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `email`, `mdp`) VALUES
(3, 'Fahdani', 'Saad', 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `assurence`
--

CREATE TABLE `assurence` (
  `num` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL,
  `date_assur` date NOT NULL DEFAULT current_timestamp(),
  `date_exp` date NOT NULL,
  `matr_vihecule` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(7, 'voiture'),
(8, 'camion'),
(9, 'MOTO');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `cin` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `tele` varchar(50) NOT NULL,
  `adresse` text NOT NULL,
  `email` text NOT NULL,
  `mdp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`cin`, `nom`, `prenom`, `tele`, `adresse`, `email`, `mdp`) VALUES
('BE8927338', 'Semrani', 'Walid', '0784392749', 'G68G+Fes', 'walid@gmail.com', '111111'),
('cd12345', 'aymane', 'aymne', '0632435', 'sefrou', 'aymanebachchour@gmail.com', '123AZE'),
('CD123456', 'dvbev', 'cdaah', '9075324', 'fez', 'madiffer10@gmail.com', '10082002');

-- --------------------------------------------------------

--
-- Structure de la table `entretien`
--

CREATE TABLE `entretien` (
  `id` int(11) NOT NULL,
  `nom_garage` varchar(50) NOT NULL,
  `datee` date NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entretien`
--

INSERT INTO `entretien` (`id`, `nom_garage`, `datee`, `type`) VALUES
(4, 'Sghiouri', '2022-05-10', 'Type1');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` int(11) NOT NULL,
  `departement` varchar(50) NOT NULL,
  `tele` varchar(50) NOT NULL,
  `adresse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `departement`, `tele`, `adresse`) VALUES
(7, 'Garage Sport Car', '+212 615346791', 'Megador , quartier 2 '),
(8, 'Luxe Car', '+212 631469710', 'Rue Immouzer , Quartier 3 Fez'),
(11, 'CAR SOS', '+212 646879265', 'Maos 2 , Quartier 5 Fes');

-- --------------------------------------------------------

--
-- Structure de la table `localisations`
--

CREATE TABLE `localisations` (
  `id` int(11) NOT NULL,
  `matr_vehecule` varchar(50) NOT NULL,
  `localisation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `localisations`
--

INSERT INTO `localisations` (`id`, `matr_vehecule`, `localisation`) VALUES
(21, 'AY331LM', 'Mohammédia'),
(25, 'AT46441', 'Mohammédia'),
(26, 'AE46021', 'Rabat');

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id`, `libelle`) VALUES
(14, 'RENAULT'),
(15, 'MERCEDES'),
(16, 'IVECO'),
(17, 'DAF'),
(18, ' MAN'),
(19, 'Peugeot'),
(20, 'Citroën'),
(21, 'Opel'),
(23, 'Audi');

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`id`, `libelle`, `prix`) VALUES
(8, 'lampe', 17),
(9, 'Freinage', 30),
(10, 'Filtration', 50),
(11, 'Moteur', 200);

-- --------------------------------------------------------

--
-- Structure de la table `reparation`
--

CREATE TABLE `reparation` (
  `id` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `panne` text DEFAULT NULL,
  `matr_vihecule` varchar(50) NOT NULL,
  `id_entretien` int(11) NOT NULL,
  `id_piece` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'encours'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reparation`
--

INSERT INTO `reparation` (`id`, `date_debut`, `date_fin`, `prix`, `panne`, `matr_vihecule`, `id_entretien`, `id_piece`, `status`) VALUES
(29, '2022-05-06', '2020-05-07', 60, 'roue', 'AY331LM', 4, 9, 'reparer'),
(30, '2022-05-06', '2022-05-07', 68, 'azert', 'AE46021', 4, 8, 'reparer');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `matr_vehecule` varchar(50) NOT NULL,
  `cin_client` varchar(50) NOT NULL,
  `date_debut` date NOT NULL DEFAULT current_timestamp(),
  `date_fin` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `vehecule`
--

CREATE TABLE `vehecule` (
  `matricule` varchar(50) NOT NULL,
  `couleur` varchar(50) NOT NULL,
  `id_marque` int(11) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `carburant` varchar(50) NOT NULL,
  `id_fournisseur` int(11) NOT NULL,
  `is_achat` int(11) NOT NULL DEFAULT 1,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vehecule`
--

INSERT INTO `vehecule` (`matricule`, `couleur`, `id_marque`, `modele`, `id_categorie`, `carburant`, `id_fournisseur`, `is_achat`, `img`) VALUES
('AE46021', 'Purple', 14, '2020', 7, 'Gazoile', 7, 1, '490_1765518.jpg,'),
('AT46441', 'BLUE', 23, '2020', 7, 'Gazoile', 7, 1, '586_1618359.jpg,'),
('AY331LM', 'Noire Carbonne', 15, '2020', 7, 'Gazoile', 7, 1, '890_Mercedes amg 4.jpg,690_Mercedes amg 42.jpg,992_mercedes amg41.jpg,');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `assurence`
--
ALTER TABLE `assurence`
  ADD PRIMARY KEY (`num`),
  ADD KEY `matr_vihecule` (`matr_vihecule`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`cin`);

--
-- Index pour la table `entretien`
--
ALTER TABLE `entretien`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `localisations`
--
ALTER TABLE `localisations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matr_vehecule` (`matr_vehecule`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reparation`
--
ALTER TABLE `reparation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_entretien` (`id_entretien`),
  ADD KEY `id_piece` (`id_piece`),
  ADD KEY `matr_vihecule` (`matr_vihecule`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cin_client` (`cin_client`),
  ADD KEY `matr_vehecule` (`matr_vehecule`);

--
-- Index pour la table `vehecule`
--
ALTER TABLE `vehecule`
  ADD PRIMARY KEY (`matricule`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_fournisseur` (`id_fournisseur`),
  ADD KEY `id_marque` (`id_marque`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `assurence`
--
ALTER TABLE `assurence`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `entretien`
--
ALTER TABLE `entretien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `localisations`
--
ALTER TABLE `localisations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `reparation`
--
ALTER TABLE `reparation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `assurence`
--
ALTER TABLE `assurence`
  ADD CONSTRAINT `assurence_ibfk_1` FOREIGN KEY (`matr_vihecule`) REFERENCES `vehecule` (`matricule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `localisations`
--
ALTER TABLE `localisations`
  ADD CONSTRAINT `localisations_ibfk_1` FOREIGN KEY (`matr_vehecule`) REFERENCES `vehecule` (`matricule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reparation`
--
ALTER TABLE `reparation`
  ADD CONSTRAINT `reparation_ibfk_1` FOREIGN KEY (`id_entretien`) REFERENCES `entretien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reparation_ibfk_2` FOREIGN KEY (`matr_vihecule`) REFERENCES `vehecule` (`matricule`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reparation_ibfk_3` FOREIGN KEY (`id_piece`) REFERENCES `piece` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`matr_vehecule`) REFERENCES `vehecule` (`matricule`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`cin_client`) REFERENCES `client` (`cin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `vehecule`
--
ALTER TABLE `vehecule`
  ADD CONSTRAINT `vehecule_ibfk_1` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehecule_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehecule_ibfk_3` FOREIGN KEY (`id_marque`) REFERENCES `marque` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
