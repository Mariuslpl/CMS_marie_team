-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 25 fév. 2021 à 16:33
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cms_marie_team`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$0CLojXz/k5hH9VJpAjMfYeUQ7iX4HNN2Riywta4GTyZU1By4z/M1q');

-- --------------------------------------------------------

--
-- Structure de la table `bateau`
--

CREATE TABLE `bateau` (
  `id_bateau` int(11) NOT NULL,
  `nom_bateau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bateau`
--

INSERT INTO `bateau` (`id_bateau`, `nom_bateau`) VALUES
(1, 'Le Hollandais Volant'),
(2, 'Le Titanic'),
(3, 'Le Bismarck'),
(4, 'Le Kaga'),
(5, 'Le Garfield'),
(6, 'Le Jerry');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `lettre_categorie` char(1) NOT NULL,
  `libelle_categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`lettre_categorie`, `libelle_categorie`) VALUES
('A', 'Passager'),
('B', 'Véhicule inférieur à 2m'),
('C', 'Véhicule supérieur à 2m'),
('D', 'Clandestins'),
('E', 'Poid-lourd');

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE `contenir` (
  `id_bateau_contient` int(11) NOT NULL,
  `lettre_categorie_contient` char(1) NOT NULL,
  `capacite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contenir`
--

INSERT INTO `contenir` (`id_bateau_contient`, `lettre_categorie_contient`, `capacite`) VALUES
(1, 'A', 300),
(1, 'B', 50),
(1, 'C', 20),
(2, 'A', 1000),
(2, 'B', 300),
(2, 'C', 50),
(3, 'A', 800),
(3, 'B', 400),
(3, 'C', 150);

-- --------------------------------------------------------

--
-- Structure de la table `enregistre`
--

CREATE TABLE `enregistre` (
  `num_reservation_enregistre` int(11) NOT NULL,
  `num_type_enregistre` varchar(2) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `enregistre`
--

INSERT INTO `enregistre` (`num_reservation_enregistre`, `num_type_enregistre`, `quantite`) VALUES
(5, 'A1', 1),
(6, 'A1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `liaison`
--

CREATE TABLE `liaison` (
  `code_liaison` int(11) NOT NULL,
  `distance` int(11) NOT NULL,
  `id_port_depart` int(11) NOT NULL,
  `id_port_arrivee` int(11) NOT NULL,
  `id_secteur_concerne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `liaison`
--

INSERT INTO `liaison` (`code_liaison`, `distance`, `id_port_depart`, `id_port_arrivee`, `id_secteur_concerne`) VALUES
(101, 50, 1, 2, 1),
(102, 52, 2, 1, 1),
(201, 180, 3, 4, 2),
(202, 190, 4, 3, 2),
(301, 80, 5, 6, 3),
(302, 85, 6, 5, 3),
(401, 250, 7, 8, 4),
(402, 255, 8, 7, 4),
(501, 60, 9, 10, 5),
(502, 70, 10, 9, 5),
(601, 140, 11, 12, 6),
(602, 150, 12, 11, 6);

-- --------------------------------------------------------

--
-- Structure de la table `periode`
--

CREATE TABLE `periode` (
  `debut_periode` date NOT NULL,
  `fin_periode` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `periode`
--

INSERT INTO `periode` (`debut_periode`, `fin_periode`) VALUES
('2020-09-01', '2021-06-15'),
('2021-06-16', '2021-09-01'),
('2021-09-02', '2022-06-15');

-- --------------------------------------------------------

--
-- Structure de la table `port`
--

CREATE TABLE `port` (
  `id_port` int(11) NOT NULL,
  `nom_port` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `port`
--

INSERT INTO `port` (`id_port`, `nom_port`) VALUES
(1, 'Dunkerque'),
(2, 'Calais'),
(3, 'Brest'),
(4, 'Saint-Mâlo'),
(5, 'Cherbourg'),
(6, 'Granville'),
(7, 'Douvre'),
(8, 'Brighton'),
(9, 'La Turballe'),
(10, 'La Rochelle'),
(11, 'Marseille'),
(12, 'Toulon'),
(13, 'tset'),
(14, 'retest'),
(15, 'RERETEST'),
(16, 'un nouveau test'),
(17, 'un test sans supp');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `num_reservation` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `num_traversee_reserve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`num_reservation`, `nom`, `adresse`, `cp`, `ville`, `num_traversee_reserve`) VALUES
(3, 'lepley', '32 rue de cronstadt', '59000', 'Lille', 10101),
(4, 'lepley', '32 rue de cronstadt', '59000', 'Lille', 10101),
(5, 'Briant', '102 rue jules Verne', '59000', 'Lille', 10101),
(6, 'Briant', '102 rue jules Verne', '59000', 'Lille', 10101),
(7, 'Second', '402 rue jules Michael', '12546', 'Très Loin', 10102),
(8, 'De Quinteros', '458 boulevard Coua de Can', '83550', 'Vidauban', 10102),
(9, 'Thiberge', '10B rue de béthune', '59000', 'Lille', 10102),
(10, 'Nadka', '45 rue Douaumont', '69000', 'Lyon', 10201),
(11, 'Daron', '1287 ruelle de la soif', '59145', 'Loin', 10201),
(12, 'Codeville', '12 rue de Strasbourg', '59000', 'Lille', 10201),
(13, 'Shaïte', '610 boulevard Gambetta', '06000', 'Nice', 10202),
(14, 'Mono-boule', '12 avenue des Teubés', '06100', 'Nice', 10202);

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

CREATE TABLE `secteur` (
  `id_secteur` int(11) NOT NULL,
  `nom_secteur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `secteur`
--

INSERT INTO `secteur` (`id_secteur`, `nom_secteur`) VALUES
(1, 'Nord'),
(2, 'Bretagne'),
(3, 'Normandie'),
(4, 'Angleterre'),
(5, 'Vendée'),
(6, 'Sud'),
(7, 'test'),
(8, 'qdsqdqsd'),
(9, 'w<xw<x<wx'),
(10, 'testest'),
(11, 'le blablabla');

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

CREATE TABLE `tarif` (
  `debut_periode_tarif` date NOT NULL,
  `code_liaison_tarif` int(11) NOT NULL,
  `num_type_tarif` varchar(2) NOT NULL,
  `tarif` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tarif`
--

INSERT INTO `tarif` (`debut_periode_tarif`, `code_liaison_tarif`, `num_type_tarif`, `tarif`) VALUES
('2020-09-01', 101, 'A1', 18),
('2020-09-01', 101, 'A2', 11.1),
('2020-09-01', 101, 'A3', 5.6),
('2020-09-01', 101, 'B1', 86),
('2020-09-01', 101, 'B2', 129),
('2020-09-01', 101, 'C1', 189),
('2020-09-01', 101, 'C2', 268);

-- --------------------------------------------------------

--
-- Structure de la table `traversee`
--

CREATE TABLE `traversee` (
  `num_traversee` int(11) NOT NULL,
  `date_traversee` date NOT NULL,
  `heure_traversee` time NOT NULL,
  `code_liaison_realise` int(11) NOT NULL,
  `id_bateau_effectue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `traversee`
--

INSERT INTO `traversee` (`num_traversee`, `date_traversee`, `heure_traversee`, `code_liaison_realise`, `id_bateau_effectue`) VALUES
(10101, '2021-03-01', '08:00:00', 101, 1),
(10201, '2021-03-01', '12:00:00', 102, 1),
(10102, '2021-03-01', '16:00:00', 101, 1),
(10202, '2021-03-01', '20:00:00', 102, 1);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `num_type` varchar(2) NOT NULL,
  `libelle_type` varchar(50) NOT NULL,
  `lettre_categorie_classe` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`num_type`, `libelle_type`, `lettre_categorie_classe`) VALUES
('A1', 'Adulte', 'A'),
('A2', 'Enfant 8/18 ans', 'A'),
('A3', 'Junior 0/7 ans', 'A'),
('B1', 'voitures 2 portes', 'B'),
('B2', 'Voiture 4 portes', 'B'),
('C1', 'Fourgon', 'C'),
('C2', 'Camping-car', 'C'),
('E1', 'Clandestins UE', 'E'),
('E2', 'Clandestins monde', 'E');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bateau`
--
ALTER TABLE `bateau`
  ADD PRIMARY KEY (`id_bateau`),
  ADD KEY `id_bateau` (`id_bateau`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`lettre_categorie`),
  ADD KEY `lettre_categorie` (`lettre_categorie`);

--
-- Index pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD UNIQUE KEY `id_bateau_contient` (`id_bateau_contient`,`lettre_categorie_contient`),
  ADD KEY `lettre_categorie_contient` (`lettre_categorie_contient`);

--
-- Index pour la table `enregistre`
--
ALTER TABLE `enregistre`
  ADD UNIQUE KEY `num_reservation_enregistre` (`num_reservation_enregistre`,`num_type_enregistre`),
  ADD KEY `num_type_enregistre` (`num_type_enregistre`);

--
-- Index pour la table `liaison`
--
ALTER TABLE `liaison`
  ADD PRIMARY KEY (`code_liaison`),
  ADD UNIQUE KEY `id_port_depart` (`id_port_depart`,`id_port_arrivee`,`id_secteur_concerne`),
  ADD KEY `id_port_arrivee` (`id_port_arrivee`),
  ADD KEY `id_secteur_concerne` (`id_secteur_concerne`);

--
-- Index pour la table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`debut_periode`),
  ADD KEY `debut_periode` (`debut_periode`);

--
-- Index pour la table `port`
--
ALTER TABLE `port`
  ADD PRIMARY KEY (`id_port`),
  ADD KEY `id_port` (`id_port`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`num_reservation`),
  ADD KEY `num_reservation` (`num_reservation`),
  ADD KEY `num_traversee_reserve` (`num_traversee_reserve`);

--
-- Index pour la table `secteur`
--
ALTER TABLE `secteur`
  ADD PRIMARY KEY (`id_secteur`),
  ADD KEY `id_secteur` (`id_secteur`);

--
-- Index pour la table `tarif`
--
ALTER TABLE `tarif`
  ADD UNIQUE KEY `debut_periode_tarif` (`debut_periode_tarif`,`code_liaison_tarif`,`num_type_tarif`),
  ADD KEY `code_liaison_tarif` (`code_liaison_tarif`),
  ADD KEY `num_type_tarif` (`num_type_tarif`);

--
-- Index pour la table `traversee`
--
ALTER TABLE `traversee`
  ADD PRIMARY KEY (`num_traversee`),
  ADD UNIQUE KEY `date_traversee` (`date_traversee`,`heure_traversee`,`code_liaison_realise`,`id_bateau_effectue`),
  ADD KEY `code_liaison_realise` (`code_liaison_realise`),
  ADD KEY `id_bateau_effectue` (`id_bateau_effectue`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`num_type`),
  ADD KEY `lettre_categorie_classe` (`lettre_categorie_classe`),
  ADD KEY `num_type` (`num_type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `bateau`
--
ALTER TABLE `bateau`
  MODIFY `id_bateau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `port`
--
ALTER TABLE `port`
  MODIFY `id_port` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `num_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `secteur`
--
ALTER TABLE `secteur`
  MODIFY `id_secteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `contenir_ibfk_1` FOREIGN KEY (`id_bateau_contient`) REFERENCES `bateau` (`id_bateau`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contenir_ibfk_2` FOREIGN KEY (`lettre_categorie_contient`) REFERENCES `categorie` (`lettre_categorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `enregistre`
--
ALTER TABLE `enregistre`
  ADD CONSTRAINT `enregistre_ibfk_1` FOREIGN KEY (`num_reservation_enregistre`) REFERENCES `reservation` (`num_reservation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enregistre_ibfk_2` FOREIGN KEY (`num_type_enregistre`) REFERENCES `type` (`num_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `liaison`
--
ALTER TABLE `liaison`
  ADD CONSTRAINT `liaison_ibfk_1` FOREIGN KEY (`id_port_arrivee`) REFERENCES `port` (`id_port`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liaison_ibfk_2` FOREIGN KEY (`id_port_depart`) REFERENCES `port` (`id_port`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liaison_ibfk_3` FOREIGN KEY (`id_secteur_concerne`) REFERENCES `secteur` (`id_secteur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`num_traversee_reserve`) REFERENCES `traversee` (`num_traversee`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tarif`
--
ALTER TABLE `tarif`
  ADD CONSTRAINT `tarif_ibfk_1` FOREIGN KEY (`debut_periode_tarif`) REFERENCES `periode` (`debut_periode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tarif_ibfk_2` FOREIGN KEY (`code_liaison_tarif`) REFERENCES `liaison` (`code_liaison`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tarif_ibfk_3` FOREIGN KEY (`num_type_tarif`) REFERENCES `type` (`num_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `traversee`
--
ALTER TABLE `traversee`
  ADD CONSTRAINT `traversee_ibfk_1` FOREIGN KEY (`code_liaison_realise`) REFERENCES `liaison` (`code_liaison`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `traversee_ibfk_2` FOREIGN KEY (`id_bateau_effectue`) REFERENCES `bateau` (`id_bateau`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `type_ibfk_1` FOREIGN KEY (`lettre_categorie_classe`) REFERENCES `categorie` (`lettre_categorie`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
