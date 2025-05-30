-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 26 mai 2025 à 17:01
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `transactions_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE `achat` (
  `id` int(11) NOT NULL,
  `codeTransaction` varchar(255) DEFAULT NULL,
  `caisse` varchar(255) DEFAULT NULL,
  `compteCaisseDevise` varchar(255) DEFAULT NULL,
  `devise` varchar(255) DEFAULT NULL,
  `montantDevise` decimal(10,2) DEFAULT NULL,
  `compteCaisseTND` varchar(255) DEFAULT NULL,
  `deviseLocal` varchar(255) DEFAULT NULL,
  `montantTnd` decimal(10,2) DEFAULT NULL,
  `modechange` varchar(255) DEFAULT NULL,
  `coursDeChange` decimal(10,4) DEFAULT NULL,
  `TypeConv` varchar(255) DEFAULT NULL,
  `PaysOrigineDevise` varchar(255) DEFAULT NULL,
  `codeBalancePaiement` varchar(255) DEFAULT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `NomBeneficiare` varchar(255) DEFAULT NULL,
  `Prenomeneficiare` varchar(255) DEFAULT NULL,
  `TypePieceIdentite` varchar(255) DEFAULT NULL,
  `nationalitePieceIdentite` varchar(255) DEFAULT NULL,
  `NumeroPiece` varchar(255) DEFAULT NULL,
  `dateDelivrance` date DEFAULT NULL,
  `dateValidite` date DEFAULT NULL,
  `dateNaiss` date DEFAULT NULL,
  `sexe` varchar(1) DEFAULT NULL,
  `etatCivil` varchar(255) DEFAULT NULL,
  `qualite` varchar(255) DEFAULT NULL,
  `Profession` varchar(255) DEFAULT NULL,
  `Nationalite` varchar(255) DEFAULT NULL,
  `paysResidance` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `tlf` varchar(255) DEFAULT NULL,
  `accompagne` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `RefDeclarationDouaniere` varchar(255) DEFAULT NULL,
  `dateEmmissionDeclar` date DEFAULT NULL,
  `deviseDeclar` date DEFAULT NULL,
  `montantDeclarationDouan` decimal(10,2) DEFAULT NULL,
  `montantUtiliseDeclaration` decimal(10,2) DEFAULT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `agence` varchar(255) NOT NULL,
  `num caisse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Structure de la table `vent`
--

CREATE TABLE `vent` (
  `id` int(11) NOT NULL,
  `codeTransaction` varchar(255) DEFAULT NULL,
  `caisse` varchar(255) DEFAULT NULL,
  `devise` varchar(255) DEFAULT NULL,
  `montantDevise` varchar(255) DEFAULT NULL,
  `compteCaisseDevise` varchar(255) DEFAULT NULL,
  `modechange` varchar(255) DEFAULT NULL,
  `coursDeChange` varchar(255) DEFAULT NULL,
  `montantTndSimulation` varchar(255) DEFAULT NULL,
  `coursDeChange2` varchar(255) DEFAULT NULL,
  `montantTnd` varchar(255) DEFAULT NULL,
  `deviseLocal` varchar(255) DEFAULT NULL,
  `compteCaisseTnd` varchar(255) DEFAULT NULL,
  `matriculePersonnelBmtn` varchar(255) DEFAULT NULL,
  `originesDesFonds` varchar(255) DEFAULT NULL,
  `motif` varchar(255) DEFAULT NULL,
  `coupure1` varchar(255) DEFAULT NULL,
  `nombreDeCoupure1` varchar(255) DEFAULT NULL,
  `codeBalancePaiement` varchar(255) DEFAULT NULL,
  `codedestination` varchar(255) DEFAULT NULL,
  `libelle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Index pour la table `vent`
--
ALTER TABLE `vent`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `achat`
--
ALTER TABLE `achat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1537;

--
-- AUTO_INCREMENT pour la table `vent`
--
ALTER TABLE `vent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
