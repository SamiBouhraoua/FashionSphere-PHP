-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 09 déc. 2024 à 23:21
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
-- Base de données : `fashionsphere`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `ID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`ID`, `Username`, `Password`) VALUES
(1, 'sami', 'sami');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `Titre` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Prix` decimal(10,2) NOT NULL,
  `Taille` varchar(10) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`ID`, `categorie`, `Titre`, `Description`, `Prix`, `Taille`, `Stock`, `Photo`) VALUES
(1, 'men', 'Sweat', 'Sweat à capuche en jersey doux', 98.00, 'M', 60, '67576a260bd70-men1.png'),
(2, 'men', 'Sweat', 'Sweat à capuche Steady State', 128.00, 'L', 100, 'men2.png'),
(3, 'men', 'Sweat', 'Sweat à capuche en coton à double tricot texturé', 148.00, 'X', 50, 'men3.png'),
(4, 'men', 'Sweat', 'Sweat à capuche en jersey', 88.00, 'S', 60, 'men4.png'),
(5, 'men', 'Veste', 'Veste Wunder Puff 600 en duvet Iridescent', 348.00, 'M', 20, 'men5.png'),
(6, 'men', 'Veste', 'Gilet Wunder Puff 600 en duvet', 248.00, 'L', 100, 'men6.png'),
(7, 'men', 'Veste', 'Veste coupe-vent Sojourn', 148.00, 'M', 60, 'men7.png'),
(8, 'men', 'Veste', 'Veste compressible Warp Light', 146.00, 'L', 70, 'men8.png'),
(9, 'men', 'Pantalon', 'Pantalon slim ABC 32\"LSergé de coton extensible VersaTwill', 80.00, 'L', 40, 'men9.png'),
(10, 'men', 'Pantalon', 'Pantalon coupe classique ABC 32\"LSergé de coton extensible VersaTwill', 148.00, 'M', 90, 'men10.png'),
(11, 'men', 'Pantalon', 'Pantalon coupe classique en velours côtelé Régulier', 166.00, 'L', 80, 'men11.png'),
(12, 'men', 'Pantalon', 'Jogger ABC Régulier', 138.00, 'M', 30, 'men12.png'),
(13, 'women', 'Robe', 'Robe Align™ de Lululemon', 148.00, 'M', 80, 'women1.png'),
(14, 'women', 'Robe', 'Robe débardeur côtelée coupe slim en tissu Softstreme', 128.00, 'L', 40, 'women2.png'),
(15, 'women', 'Robe', 'Robe mi-longue côtelée entièrement alignée', 128.00, 'X', 50, 'women3.png'),
(16, 'women', 'Robe', 'Robe longue à bretelles spaghetti ultra-douce en Nulu de Wundermost', 98.00, 'S', 60, 'women4.png'),
(17, 'women', 'Veste', 'Veste en duvet StretchSeal™ Sleet Street 600', 448.00, 'M', 60, 'women5.png'),
(18, 'women', 'Veste', 'Veste Varsity surdimensionnée Scuba Peluche', 168.00, 'L', 100, 'women6.png'),
(19, 'women', 'Veste', 'Veste Another Mile', 248.00, 'L', 60, 'women7.png'),
(20, 'women', 'Veste', 'Veste à capuche Define Nul', 146.00, 'L', 70, 'women8.png'),
(21, 'women', 'T-shirt', 'T-shirt à manches longues Hold Tight', 68.00, 'L', 80, 'women9.png'),
(22, 'women', 'T-shirt', 'T-shirt à manches longues Hold', 78.00, 'M', 90, 'women10.png'),
(23, 'women', 'T-shirt', 'Chemise à manches longues Rulur', 88.00, 'L', 100, 'women11.png'),
(24, 'women', 'T-shirt', 'Pull court demi-zippé Rulu', 98.00, 'M', 30, 'women12.png'),
(25, 'Accessories', 'Sac', 'Sac bandoulière pour appareil photo avec poignée supérieure', 98.00, 'S', 90, 'acc1.png'),
(26, 'Accessories', 'Sac', 'Sac bandoulière avec pochette nano', 128.00, 'L', 20, 'acc2.png'),
(27, 'Accessories', 'Sac', 'Sac à dos seau avec cordon de serrage', 245.00, 'S', 50, 'acc3.png'),
(28, 'Accessories', 'Sac', 'Sac fourre-tout matelassé à grille Polaire en peluche', 98.00, 'XL', 60, 'acc4.png'),
(29, 'Accessories', 'Bonnet', 'Bonnet à pompon en tricot torsadé pour femme', 98.00, 'M', 60, 'acc5.png'),
(30, 'Accessories', 'Bonnet', 'Disney et Lululemon Bonnet Révélation Chaud', 58.00, 'XL', 50, 'acc6.png'),
(31, 'Accessories', 'Casquette', 'Disney et Lululemon Casquette de baseball classique structurée unisexe', 248.00, 'L', 60, 'acc7.png'),
(32, 'Accessories', 'Casquette', 'Casquette de baseball classique unisexe Mot-symbole', 48.00, 'L', 70, 'acc8.png'),
(33, 'Accessories', 'Sac à dos', 'Sac à dos pour nouveau parent', 148.00, 'L', 70, 'acc9.png'),
(34, 'Accessories', 'Sac à dos', 'Nouveau sac à dos Crew Logo', 124.00, 'M', 90, 'acc10.png'),
(35, 'Accessories', 'Sac à dos', 'Sac à dos triple zip', 138.00, 'L', 20, 'acc11.png'),
(36, 'Accessories', 'Sac à dos', 'Sac à dos à double fermeture éclair', 98.00, 'X', 30, 'acc12.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Email`, `Username`, `Password`) VALUES
(1, 'sami', 'sami@gmail.com', 'sami', 'sami'),
(3, 'sam', 'sami@gmail.com', 'sa', 'sa'),
(4, 'asd', 'sami@gmail.com', 'a', 'a');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
