-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 25 mars 2020 à 09:31
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `beautyhair`
--

-- --------------------------------------------------------

--
-- Structure de la table `appointments`
--

CREATE TABLE `appointments` (
  `ID` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_hairdresser` int(11) NOT NULL,
  `price_paid` int(11) NOT NULL,
  `ID_speciality` int(11) NOT NULL,
  `ID_salon` int(11) NOT NULL,
  `appointment_start` datetime NOT NULL,
  `appointment_end` datetime NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body_content` text NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `creator_firstname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `hairdressers`
--

CREATE TABLE `hairdressers` (
  `ID` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `hairdressers_salons`
--

CREATE TABLE `hairdressers_salons` (
  `ID_salons` int(11) NOT NULL,
  `ID_hairdresser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `hairdresser_specialities`
--

CREATE TABLE `hairdresser_specialities` (
  `ID_hairdresser` int(11) NOT NULL,
  `ID_speciality` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `ID` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `role_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`ID`, `role_name`, `role_description`) VALUES
(1, 'User', 'Rôle basique. Accès à son propre espace membre. L\'utilisateur peut prendre rendez-vous.'),
(2, 'Hairdresser', 'Rôle coiffeur. Accès à son espace membre et à son salon de coiffure.'),
(3, 'Admin', 'Rôle administrateur. Accès au panel administration du site.');

-- --------------------------------------------------------

--
-- Structure de la table `salons`
--

CREATE TABLE `salons` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ID_owner` int(11) DEFAULT NULL,
  `google_map` text DEFAULT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `salons_photos`
--

CREATE TABLE `salons_photos` (
  `ID` int(11) NOT NULL,
  `ID_salon` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `salons_schedule`
--

CREATE TABLE `salons_schedule` (
  `day` varchar(10) NOT NULL,
  `ID_salons` int(11) NOT NULL,
  `day_schedule_start` time DEFAULT NULL,
  `day_schedule_end` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `specialities`
--

CREATE TABLE `specialities` (
  `ID` int(11) NOT NULL,
  `speciality_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `duration` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `active` tinyint(2) NOT NULL DEFAULT 1,
  `avatar` varchar(255) NOT NULL DEFAULT 'upload/membres/default_avatar.png',
  `register_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `lastname`, `firstname`, `email`, `password`, `address`, `telephone`, `active`, `avatar`, `register_date`) VALUES
(241, 'Administrateur', 'BeautyHair', 'admin@admin', '$2y$10$1DIklQN2ap9jgENaCcKLp.TGBtn8LmPGgpJOCe3lflcxqHGQkghuu', '', '', 1, 'upload/membres/default_avatar.png', '2020-03-25 08:27:50');

-- --------------------------------------------------------

--
-- Structure de la table `users_roles`
--

CREATE TABLE `users_roles` (
  `ID` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_role` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users_roles`
--

INSERT INTO `users_roles` (`ID`, `ID_user`, `ID_role`) VALUES
(139, 241, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_appointments_ID_user` (`ID_user`),
  ADD KEY `FK_appointments_ID_speciality` (`ID_speciality`),
  ADD KEY `FK_appointments_ID_salon_Salons_ID` (`ID_salon`),
  ADD KEY `FK_appointments_ID_hairdresser_Hairdresser_ID_user` (`ID_hairdresser`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `hairdressers`
--
ALTER TABLE `hairdressers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_hairdressers_ID_user` (`ID_user`) USING BTREE;

--
-- Index pour la table `hairdressers_salons`
--
ALTER TABLE `hairdressers_salons`
  ADD PRIMARY KEY (`ID_salons`,`ID_hairdresser`),
  ADD KEY `FK_Hairdressers_Salons_ID_hairdresser_Hairdressers_ID_user` (`ID_hairdresser`);

--
-- Index pour la table `hairdresser_specialities`
--
ALTER TABLE `hairdresser_specialities`
  ADD PRIMARY KEY (`ID_hairdresser`,`ID_speciality`),
  ADD KEY `FK_hairdresser_specialities_ID_speciality` (`ID_speciality`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `salons`
--
ALTER TABLE `salons`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_salons_ID_owner_hairdressers_ID_user` (`ID_owner`);

--
-- Index pour la table `salons_photos`
--
ALTER TABLE `salons_photos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Salons_Photos_ID_salon_Salons_ID` (`ID_salon`);

--
-- Index pour la table `salons_schedule`
--
ALTER TABLE `salons_schedule`
  ADD PRIMARY KEY (`ID_salons`,`day`);

--
-- Index pour la table `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_users_roles_ID_user` (`ID_user`) USING BTREE,
  ADD KEY `FK_users_roles_ID_role` (`ID_role`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `hairdressers`
--
ALTER TABLE `hairdressers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `salons`
--
ALTER TABLE `salons`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT pour la table `salons_photos`
--
ALTER TABLE `salons_photos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT pour la table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT pour la table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `FK_appointments_ID_hairdresser_Hairdresser_ID_user` FOREIGN KEY (`ID_hairdresser`) REFERENCES `hairdressers` (`ID_user`),
  ADD CONSTRAINT `FK_appointments_ID_salon_Salons_ID` FOREIGN KEY (`ID_salon`) REFERENCES `salons` (`ID`),
  ADD CONSTRAINT `FK_appointments_ID_speciality` FOREIGN KEY (`ID_speciality`) REFERENCES `specialities` (`ID`),
  ADD CONSTRAINT `FK_appointments_ID_user` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID`);

--
-- Contraintes pour la table `hairdressers`
--
ALTER TABLE `hairdressers`
  ADD CONSTRAINT `FK_Hairdressers_ID_user` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID`);

--
-- Contraintes pour la table `hairdressers_salons`
--
ALTER TABLE `hairdressers_salons`
  ADD CONSTRAINT `FK_Hairdressers_Salons_ID_Salons_Salons_ID` FOREIGN KEY (`ID_salons`) REFERENCES `salons` (`ID`),
  ADD CONSTRAINT `FK_Hairdressers_Salons_ID_hairdresser_Hairdressers_ID_user` FOREIGN KEY (`ID_hairdresser`) REFERENCES `hairdressers` (`ID_user`);

--
-- Contraintes pour la table `hairdresser_specialities`
--
ALTER TABLE `hairdresser_specialities`
  ADD CONSTRAINT `FK_hairdresser_specialities_ID_hairdresser` FOREIGN KEY (`ID_hairdresser`) REFERENCES `hairdressers` (`ID_user`),
  ADD CONSTRAINT `FK_hairdresser_specialities_ID_speciality` FOREIGN KEY (`ID_speciality`) REFERENCES `specialities` (`ID`);

--
-- Contraintes pour la table `salons`
--
ALTER TABLE `salons`
  ADD CONSTRAINT `FK_salons_ID_owner_hairdressers_ID_user` FOREIGN KEY (`ID_owner`) REFERENCES `hairdressers` (`ID_user`);

--
-- Contraintes pour la table `salons_photos`
--
ALTER TABLE `salons_photos`
  ADD CONSTRAINT `FK_Salons_Photos_ID_salon_Salons_ID` FOREIGN KEY (`ID_salon`) REFERENCES `salons` (`ID`);

--
-- Contraintes pour la table `salons_schedule`
--
ALTER TABLE `salons_schedule`
  ADD CONSTRAINT `FK_salons_schedule_ID_salons` FOREIGN KEY (`ID_salons`) REFERENCES `salons` (`ID`);

--
-- Contraintes pour la table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `FK_ID_role` FOREIGN KEY (`ID_role`) REFERENCES `roles` (`ID`),
  ADD CONSTRAINT `FK_ID_user` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
