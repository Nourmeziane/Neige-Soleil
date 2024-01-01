-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 21 nov. 2023 à 20:32
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `airfrance`
--

-- --------------------------------------------------------

--
-- Structure de la table `avion`
--

CREATE TABLE `avion` (
  `idavion` int NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `capacite` int DEFAULT NULL,
  `dateAchat` date DEFAULT NULL,
  `idconstructeur` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `avion`
--

INSERT INTO `avion` (`idavion`, `designation`, `capacite`, `dateAchat`, `idconstructeur`) VALUES
(2, 'Airbus A320-214', 188, '2022-06-15', 2),
(5, 'Airbus A321', 188, '2023-11-01', 2),
(7, 'Airbus A330', 300, '2023-11-09', 2),
(8, 'B77W', 410, '2023-10-31', 1);

-- --------------------------------------------------------

--
-- Structure de la table `constructeur`
--

CREATE TABLE `constructeur` (
  `idconstructeur` int NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `statut` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `constructeur`
--

INSERT INTO `constructeur` (`idconstructeur`, `nom`, `pays`, `statut`) VALUES
(1, 'Boeing', 'États-Unis', 'Actif'),
(2, 'Airbus', 'France', 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `pilote`
--

CREATE TABLE `pilote` (
  `idpilote` int NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nbvols` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pilote`
--

INSERT INTO `pilote` (`idpilote`, `nom`, `prenom`, `adresse`, `email`, `nbvols`) VALUES
(2, 'Martin', 'Marie', '456 avenue des Roses, Lyon', 'marie.martin@email.com', 30),
(3, 'Lefevre', 'Pierre', NULL, 'pierre.lefevre@email.com', 42),
(6, 'Guerrand', 'Anthony', NULL, 'anthony.guerrand92@gmail.com', 90);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `salt` char(16) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `mdp`, `salt`, `role`) VALUES
(1, 'a@gmail.com', '98a123340ef5de2c477608e0db1abd21f84eb9525261f3bed1b0d10fac6f88df', 'VmCILMZdKZtwvydd', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

CREATE TABLE `vol` (
  `idvol` int NOT NULL,
  `datevol` date DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `idavion` int DEFAULT NULL,
  `idpilote1` int DEFAULT NULL,
  `idpilote2` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `vol`
--

INSERT INTO `vol` (`idvol`, `datevol`, `designation`, `idavion`, `idpilote1`, `idpilote2`) VALUES
(2, '2022-08-10', 'Lyon - Nice', 2, 3, 2),
(8, '2023-01-01', 'Paris - Brest', 2, 6, 2),
(9, '2023-02-01', 'CDG - JFK', 8, 2, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avion`
--
ALTER TABLE `avion`
  ADD PRIMARY KEY (`idavion`),
  ADD KEY `idconstructeur` (`idconstructeur`);

--
-- Index pour la table `constructeur`
--
ALTER TABLE `constructeur`
  ADD PRIMARY KEY (`idconstructeur`);

--
-- Index pour la table `pilote`
--
ALTER TABLE `pilote`
  ADD PRIMARY KEY (`idpilote`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vol`
--
ALTER TABLE `vol`
  ADD PRIMARY KEY (`idvol`),
  ADD KEY `idavion` (`idavion`),
  ADD KEY `idPilote1` (`idpilote1`),
  ADD KEY `idpilote2` (`idpilote2`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avion`
--
ALTER TABLE `avion`
  MODIFY `idavion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `constructeur`
--
ALTER TABLE `constructeur`
  MODIFY `idconstructeur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `pilote`
--
ALTER TABLE `pilote`
  MODIFY `idpilote` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `vol`
--
ALTER TABLE `vol`
  MODIFY `idvol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avion`
--
ALTER TABLE `avion`
  ADD CONSTRAINT `avion_ibfk_1` FOREIGN KEY (`idconstructeur`) REFERENCES `constructeur` (`idconstructeur`);

--
-- Contraintes pour la table `vol`
--
ALTER TABLE `vol`
  ADD CONSTRAINT `vol_ibfk_1` FOREIGN KEY (`idavion`) REFERENCES `avion` (`idavion`),
  ADD CONSTRAINT `vol_ibfk_2` FOREIGN KEY (`idpilote1`) REFERENCES `pilote` (`idpilote`),
  ADD CONSTRAINT `vol_ibfk_3` FOREIGN KEY (`idpilote2`) REFERENCES `pilote` (`idpilote`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
