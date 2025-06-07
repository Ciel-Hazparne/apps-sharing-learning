-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 07 juin 2025 à 13:51
-- Version du serveur : 8.0.42-0ubuntu0.24.04.1
-- Version de PHP : 8.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `apps_sharing`
--

-- --------------------------------------------------------

--
-- Structure de la table `apps`
--

CREATE TABLE `apps` (
  `app_id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `creator` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `file` varchar(255) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `apps`
--

INSERT INTO `apps` (`app_id`, `name`, `description`, `creator`, `file`, `is_enabled`) VALUES
(1, 'App Qt_sous-réseaux', 'Application en Qt de calcul de sous-réseaux', 'ciel.ir1@ciel-ir.eh', 'app_68429d3ab0be99.87554209.zip', 1),
(2, 'App PS_installation logiciel', 'Appli Power Shell installation logiciel', 'ciel.ir2@ciel-ir.eh', '', 1),
(3, 'App SF64_Pluviométrie', 'Appli Symfony 6.4 Système Pluvio', 'ciel.ir3@ciel-ir.eh', '', 1),
(4, 'App SF64_Accès GSM', 'Appli Symfony 6.4 Système Accsès GSM', 'ciel.ir4@ciel-ir.eh', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL,
  `user_id` int NOT NULL,
  `app_id` int NOT NULL,
  `comment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `app_id`, `comment`, `created_at`) VALUES
(1, 2, 1, 'Je vous propose d\'ajouter un champ CIDR qui sera calculé automatiquement en fonction du masque saisi.', '2025-06-07 15:45:11'),
(2, 1, 3, 'Serait-il possible d\'avoir un affichage du niveau des cuves ?', '2025-06-07 15:45:11'),
(3, 3, 4, 'Serait-il possible de proposer également une requête par SMS ?', '2025-06-07 15:45:11'),
(4, 4, 2, 'ciel.ir2, as-tu envisagé d\'inclure une recherche de fichiers à installer ?', '2025-06-07 15:45:11');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `full_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `age` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `age`, `email`, `password`) VALUES
(1, 'CIEL IR1', 19, 'ciel.ir1@ciel-ir.eh', 'ciel-ir1'),
(2, 'CIEL IR2', 19, 'ciel.ir2@ciel-ir.eh', 'ciel-ir2'),
(3, 'CIEL IR3', 20, 'ciel.ir3@ciel-ir.eh', 'ciel-ir3'),
(4, 'CIEL IR4', 19, 'ciel.ir4@ciel-ir.eh', 'ciel-ir4');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`app_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `IDX_5F9E962A9D86650F` (`user_id`),
  ADD KEY `IDX_5F9E962A69574A48` (`app_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `apps`
--
ALTER TABLE `apps`
  MODIFY `app_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_5F9E962A69574A48` FOREIGN KEY (`app_id`) REFERENCES `apps` (`app_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5F9E962A9D86650F` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
