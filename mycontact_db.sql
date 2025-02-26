-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 12 mars 2019 à 21:59
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mycontact_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `numero`, `email`, `status`, `created_at`, `filename`, `updated_at`) VALUES
(5, 'BALOTELLI', 'Mario', 772236085, 'supermario@om.net', 1, '2019-03-09 03:06:19', '5c87086817909994447508.jpg', '2019-03-12 02:16:23'),
(6, 'THAUVIN', 'Florian', 779594739, 'flotov@om.net', 1, '2019-03-09 03:06:19', '5c8708a8406a6003513477.jpg', '2019-03-12 02:17:28'),
(7, 'PAYET', 'Dimitri', 779716082, 'dim@om.net', 1, '2019-03-09 03:06:19', '5c8709048c0d9814152300.jpg', '2019-03-12 02:19:00'),
(8, 'GUSTAVO', 'Luiz', 779371918, 'luizdssanos@om.net', 1, '2019-03-09 03:06:19', '5c87093794113171656849.jpg', '2019-03-12 02:19:51'),
(9, 'AMAVI', 'Jordan', 774430382, 'joamavi@om.net', 1, '2019-03-09 03:06:19', '5c87dae466821558530768.jpg', '2019-03-12 17:14:27'),
(10, 'CALETA CAR', 'Duje', 778572158, 'dujesupercar@om.net', 1, '2019-03-09 03:06:19', '5c87db4ae55f9277890159.jpg', '2019-03-12 17:16:10'),
(11, 'GERMAIN', 'Valere', 771486640, 'valeregermain@om.net', 1, '2019-03-09 03:06:19', '5c87db96c305c115488739.jpg', '2019-03-12 17:17:26'),
(12, 'KAMARA', 'Boubacar', 771458767, 'boubadarkos@om.net', 1, '2019-03-09 03:06:19', '5c87dc07c7ae9663472729.jpg', '2019-03-12 17:19:19'),
(13, 'LOPEZ', 'Maxime', 773163487, 'lopezizou@om.et', 1, '2019-03-09 03:06:19', '5c87dc4f3df09000426069.jpg', '2019-03-12 17:20:31'),
(14, 'NJIE', 'Clinton', 776957944, 'clintonfou@om.net', 1, '2019-03-09 03:06:19', '5c87dc99707d4554446054.jpg', '2019-03-12 17:21:45'),
(15, 'OCAMPOS', 'Lucas', 778245069, 'lucaslima@om.net', 1, '2019-03-09 03:06:19', '5c87dd3184bed940408953.jpg', '2019-03-12 17:24:17'),
(16, 'PELE', 'Yohann', 771436103, 'ypele@om.net', 1, '2019-03-09 03:06:19', '5c87dd550abcb473499646.jpg', '2019-03-12 17:24:52'),
(17, 'RADONJIC', 'Nemanja', 771245039, 'nrandnjic@om.net', 1, '2019-03-09 03:06:19', '5c87dd9c6d800741420734.jpg', '2019-03-12 17:26:04'),
(18, 'RAMI', 'Adil', 774937841, 'ramigeek@om.net', 1, '2019-03-09 03:06:19', '5c87ddbb739a5871233878.jpg', '2019-03-12 17:26:35'),
(19, 'ROLANDO', 'Jorge', 774760488, 'rolandoronaldo@om.net', 1, '2019-03-09 03:06:19', '5c87ddfabd78b484430132.jpg', '2019-03-12 17:27:38'),
(20, 'SAKAI', 'Hiroki', 771790497, 'hirosamourai@om.net', 0, '2019-03-09 03:06:19', '5c87de76c53da781538742.jpg', '2019-03-12 17:29:42'),
(21, 'SANSON', 'Morgan', 773876273, 'sansonmorgan@om.net', 0, '2019-03-09 03:06:19', '5c87debd33ea2513552886.jpg', '2019-03-12 17:30:53'),
(22, 'SARR', 'Bouna', 773536984, 'bounacarvajal@om.net', 0, '2019-03-09 03:06:19', '5c87def965478336620834.jpg', '2019-03-12 17:31:53'),
(23, 'STROOTMAN', 'Kevin', 771342490, 'kstroot@om.net', 0, '2019-03-09 03:06:19', '5c87df1f81fc7609744157.jpg', '2019-03-12 17:32:31'),
(24, 'GARCIA', 'Rudi', 772346342, 'coachrudi@om.net', 1, '2019-03-12 18:26:41', '5c87ebd320f04024692105.jpg', '2019-03-12 18:26:42');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190307094422', '2019-03-07 09:47:27'),
('20190307133716', '2019-03-07 13:38:29'),
('20190308110252', '2019-03-08 11:04:01'),
('20190309151848', '2019-03-09 15:20:01'),
('20190309153731', '2019-03-09 15:37:49');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(3, 'papou', '$2y$12$sASwe4jzwAwnuHxmc8J1M.k2OirIar/5LslLeqLdX.UEueLmO.Ar2');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
