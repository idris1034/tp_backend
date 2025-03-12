-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 12 mars 2025 à 13:17
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
-- Base de données : `backend`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `profile` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `login`, `password`, `profile`) VALUES
(3, 'sow', 'idriss', 'hacker', '63c5902ca4fd118ae5353ecd89df57c6', 'repprofile/Capture d’écran (1).png'),
(8, 'diallo', 'moussa', 'groupe', 'e7247759c1633c0f9f1485f3690294a9', 'repprofile/Capture d’écran (3).png'),
(9, 'gueye', 'mame cheikh', 'Shota', 'e7247759c1633c0f9f1485f3690294a9', 'repprofile/Capture d’écran (22).png'),
(11, 'sarr', 'fatou', 'tifa', '5d41402abc4b2a76b9719d911017c592', 'repprofile/VirtualBox_UBUNTU_28_01_2025_22_07_42.p'),
(12, 'ndiaye', 'mohamed', 'mhd', '721a9b52bfceacc503c056e3b9b93cfa', 'repprofile/Capture d’écran (17).png'),
(13, 'diop', 'mouhamed', 'prof', '3817848ef191468810fc4b1cfc855ba1', 'repprofile/VirtualBox_UBUNTU_29_01_2025_19_33_10.p'),
(14, 'camara', 'Boubacar', 'boubs', 'ca2cd2bcc63c4d7c8725577442073dde', 'repprofile/Capture d’écran (16).png'),
(15, 'gueye', 'mouhamed', 'jinwoo', 'd6a6bc0db10694a2d90e3a69648f3a03', 'repprofile/Capture d’écran (28).png'),
(16, 'sow', 'amadou', 'baby', '0b180078d994cb2b5ed89d7ce8e7eea2', 'repprofile/Capture d’écran (20).png'),
(17, 'Ndoye', 'dame', 'devops', 'd6a6bc0db10694a2d90e3a69648f3a03', 'repprofile/VirtualBox_UBUNTU_29_01_2025_18_14_39.p');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
