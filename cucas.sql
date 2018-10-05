-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 05 Octobre 2018 à 03:56
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.9-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cucas`
--

-- --------------------------------------------------------

--
-- Structure de la table `AFFECT`
--

CREATE TABLE `AFFECT` (
  `ID_PERSONNEL` int(11) NOT NULL,
  `ID_SESSION` int(11) NOT NULL,
  `DATE` date NOT NULL,
  `COMMENTAIRE` varchar(250) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `CLIENT`
--

CREATE TABLE `CLIENT` (
  `ID_CLIENT` int(11) NOT NULL,
  `CIN_CLIENT` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `NOM_CLIENT` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `DATE_NAISSANCE` date DEFAULT NULL,
  `LIEU_NAISSANCE` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `NUM_TEL` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `NOM_PERE` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `FCT_PERE` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `TEL_PERE` varchar(50) COLLATE utf8_bin NOT NULL,
  `NOM_MERE` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `FCT_MERE` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `TEL_MERE` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `EMAIL` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `ADR_CLIENT` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `NIVEAU_ETUDE` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `DOMAINE_ETUDE` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `NATIONALITE` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `DERNIER_ETABLISEMENT` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `CERTIF_ANGLAIS` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `PROGRAM` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `COMMENTAIRE` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `IMAGE` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `DATE2` date DEFAULT NULL,
  `DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `CLIENT`
--

INSERT INTO `CLIENT` (`ID_CLIENT`, `CIN_CLIENT`, `NOM_CLIENT`, `DATE_NAISSANCE`, `LIEU_NAISSANCE`, `NUM_TEL`, `NOM_PERE`, `FCT_PERE`, `TEL_PERE`, `NOM_MERE`, `FCT_MERE`, `TEL_MERE`, `EMAIL`, `ADR_CLIENT`, `NIVEAU_ETUDE`, `DOMAINE_ETUDE`, `NATIONALITE`, `DERNIER_ETABLISEMENT`, `CERTIF_ANGLAIS`, `PROGRAM`, `COMMENTAIRE`, `IMAGE`, `DATE2`, `DATE`) VALUES
(2, NULL, 'aderalle', '1987-01-01', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Halitiyet', NULL, NULL, NULL, NULL, 'light_sky_stars_background_85555_1920x1080.jpg', NULL, NULL),
(3, NULL, 'Salah', '2010-06-15', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Maghrebi', NULL, NULL, NULL, NULL, 'starry_sky_stars_space_galaxy_118510_1920x1080.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `DOSSIER`
--

CREATE TABLE `DOSSIER` (
  `ID_DOSSIER` int(11) NOT NULL,
  `ID_SESSION` int(11) NOT NULL,
  `CONTRAT` tinyint(1) DEFAULT NULL,
  `PASSEPORT` tinyint(1) DEFAULT NULL,
  `BILLET` tinyint(1) DEFAULT NULL,
  `REPONSE` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `ETAT_DOSSIER` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Structure de la table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `PAIEMENT`
--

CREATE TABLE `PAIEMENT` (
  `ID_PAIEMENT` int(11) NOT NULL,
  `ID_SESSION` int(11) NOT NULL,
  `MONTANT_PAIEM` float DEFAULT NULL,
  `A_PAYE` float DEFAULT NULL,
  `METHOD_PAIEMENT` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `ETAT_PAIEMENT` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `DATE_PAIEMENT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `PERSONNEL`
--

CREATE TABLE `PERSONNEL` (
  `ID_PERSONNEL` int(11) NOT NULL,
  `CIN_PERSONNEL` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `NOM_PERSONNEL` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `NUM_TEL` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `CATEGORIE` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `EMAIL` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `PWD` varchar(250) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `SESSION`
--

CREATE TABLE `SESSION` (
  `ID_SESSION` int(11) NOT NULL,
  `ID_CLIENT` int(11) NOT NULL,
  `TYPE_SESSION` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `DATE_DEBUT` date DEFAULT NULL,
  `DATE_CLOTURE` date DEFAULT NULL,
  `PARTENAIRE` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `TYPE_FINANCE` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `ETAT_SESSION` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `TRADUCTION`
--

CREATE TABLE `TRADUCTION` (
  `ID_TRADUCTION` int(11) NOT NULL,
  `ID_CLIENT` int(11) NOT NULL,
  `MONTANT` float DEFAULT NULL,
  `PAIEMENT` float DEFAULT NULL,
  `ETAT_TRAD` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1538698425, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Structure de la table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `VISA`
--

CREATE TABLE `VISA` (
  `ID_VISA` int(11) NOT NULL,
  `ID_SESSION` int(11) NOT NULL,
  `DATE_VISA` date DEFAULT NULL,
  `DUREE_VISA` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `PAYS` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `ETAT_VISA` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `AFFECT`
--
ALTER TABLE `AFFECT`
  ADD PRIMARY KEY (`ID_PERSONNEL`,`ID_SESSION`),
  ADD KEY `FK_AFFECT` (`ID_SESSION`);

--
-- Index pour la table `CLIENT`
--
ALTER TABLE `CLIENT`
  ADD PRIMARY KEY (`ID_CLIENT`);

--
-- Index pour la table `DOSSIER`
--
ALTER TABLE `DOSSIER`
  ADD PRIMARY KEY (`ID_DOSSIER`),
  ADD KEY `FK_COMPLETER` (`ID_SESSION`);

--
-- Index pour la table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `PAIEMENT`
--
ALTER TABLE `PAIEMENT`
  ADD PRIMARY KEY (`ID_PAIEMENT`),
  ADD KEY `FK_REGLER` (`ID_SESSION`);

--
-- Index pour la table `PERSONNEL`
--
ALTER TABLE `PERSONNEL`
  ADD PRIMARY KEY (`ID_PERSONNEL`);

--
-- Index pour la table `SESSION`
--
ALTER TABLE `SESSION`
  ADD PRIMARY KEY (`ID_SESSION`),
  ADD KEY `FK_AFFECTER` (`ID_CLIENT`);

--
-- Index pour la table `TRADUCTION`
--
ALTER TABLE `TRADUCTION`
  ADD PRIMARY KEY (`ID_TRADUCTION`),
  ADD KEY `FK_EFFECTUER` (`ID_CLIENT`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Index pour la table `VISA`
--
ALTER TABLE `VISA`
  ADD PRIMARY KEY (`ID_VISA`),
  ADD KEY `FK_DEPOSER` (`ID_SESSION`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `CLIENT`
--
ALTER TABLE `CLIENT`
  MODIFY `ID_CLIENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `AFFECT`
--
ALTER TABLE `AFFECT`
  ADD CONSTRAINT `FK_AFFECT` FOREIGN KEY (`ID_SESSION`) REFERENCES `SESSION` (`ID_SESSION`),
  ADD CONSTRAINT `FK_AFFECT2` FOREIGN KEY (`ID_PERSONNEL`) REFERENCES `PERSONNEL` (`ID_PERSONNEL`);

--
-- Contraintes pour la table `DOSSIER`
--
ALTER TABLE `DOSSIER`
  ADD CONSTRAINT `FK_COMPLETER` FOREIGN KEY (`ID_SESSION`) REFERENCES `SESSION` (`ID_SESSION`);

--
-- Contraintes pour la table `PAIEMENT`
--
ALTER TABLE `PAIEMENT`
  ADD CONSTRAINT `FK_REGLER` FOREIGN KEY (`ID_SESSION`) REFERENCES `SESSION` (`ID_SESSION`);

--
-- Contraintes pour la table `SESSION`
--
ALTER TABLE `SESSION`
  ADD CONSTRAINT `FK_AFFECTER` FOREIGN KEY (`ID_CLIENT`) REFERENCES `CLIENT` (`ID_CLIENT`);

--
-- Contraintes pour la table `TRADUCTION`
--
ALTER TABLE `TRADUCTION`
  ADD CONSTRAINT `FK_EFFECTUER` FOREIGN KEY (`ID_CLIENT`) REFERENCES `CLIENT` (`ID_CLIENT`);

--
-- Contraintes pour la table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `VISA`
--
ALTER TABLE `VISA`
  ADD CONSTRAINT `FK_DEPOSER` FOREIGN KEY (`ID_SESSION`) REFERENCES `SESSION` (`ID_SESSION`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
