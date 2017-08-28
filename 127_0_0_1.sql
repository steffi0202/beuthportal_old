-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Aug 2017 um 15:47
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `beuthportal`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ranking`
--

CREATE TABLE `ranking` (
  `Studiengang` tinytext NOT NULL,
  `Modul` text NOT NULL,
  `Semester` varchar(30) NOT NULL,
  `Zeitaufwand` varchar(2) NOT NULL,
  `Modul_des` text NOT NULL,
  `Dozent` text NOT NULL,
  `Dozent_des` text NOT NULL,
  `Sterne` float NOT NULL,
  `id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `ranking`
--

INSERT INTO `ranking` (`Studiengang`, `Modul`, `Semester`, `Zeitaufwand`, `Modul_des`, `Dozent`, `Dozent_des`, `Sterne`, `id`, `created_at`) VALUES
('Wirtschaftsinformatik - Online', 'Business Engineering', '', '1', 'Das modul ist....', 'Prof. Dr. Peter Weim', 'der dozent ist', 4, 26, '2017-08-09 12:30:50'),
('Wirtschaftsinformatik - Online', 'Operations Research', '', '5', 'der dozent bla', 'Jane Brosnan', 'das modullbla', 1.4, 27, '2017-08-09 12:31:30'),
('Wirtschaftsinformatik - Online', 'Business Engineering', '', '1', '', 'Prof. Dr. Peter Weim', '', 2.6, 28, '2017-08-09 13:04:18'),
('Wirtschaftsinformatik - Online', 'Business Engineering', '', '1', 'sdsdff', 'Prof. Dr. Peter Weim', 'sdfsd', 4, 29, '2017-08-09 13:09:10'),
('Wirtschaftsinformatik - Online', 'Business Engineering', '', '1', 'adsd', 'Prof. Dr. Peter Weim', 'asdads', 4, 30, '2017-08-09 13:09:19'),
('Wirtschaftsinformatik - Online', 'Business Engineering', '', '1', 'dsfsd', 'Prof. Dr. Peter Weim', 'sdfs', 4, 31, '2017-08-09 13:16:59'),
('Wirtschaftsinformatik - Online', 'Business Engineering', '', '1', 'sfsdfsd', 'Prof. Dr. Peter Weimann', 'sfdsfsd', 4, 32, '2017-08-14 18:12:49'),
('Wirtschaftsinformatik - Online - Bachelor', 'Algorithmen und Datenstrukturen', '', '0', 'Ziemlich viel, ziemlich schwer...', 'Prof. Dr. Agate Merceron', 'Ziemlich hilfsbereit, ziemlich fair...', 5, 33, '2017-08-28 13:26:43'),
('Wirtschaftsinformatik - Online - Bachelor', 'Business Engineering', 'Wintersemester 2015 / 2016', '1', 'Passt', 'Thomas Boerner', 'Passt', 2, 34, '2017-08-28 13:44:03');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `securitytokens`
--

CREATE TABLE `securitytokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `securitytoken` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `securitytokens`
--

INSERT INTO `securitytokens` (`id`, `user_id`, `identifier`, `securitytoken`, `created_at`) VALUES
(1, 1, '3671be00c2e1c4f205945f3b2edd08eb', '5454fe89f178b92fbdb896af4999f1c91520ad08', '2017-07-19 14:15:40'),
(2, 1, 'ad471316bb2deba4f4521410b986d8d2', 'ca99ecf18105c07cb3435fdd7fc0c71a9bf22388', '2017-07-19 14:18:32'),
(3, 1, '057ef817f0eb6b8b86cbf71678b4ce56', 'd4c03a082e0b3a471b2b9b672aeb5bb2ce6dacf7', '2017-07-19 14:31:08'),
(4, 1, '610bde227ecf79e8e8067402611e30f4', '383ae9193396c9295e1fbb7b325c98d3c513a5ce', '2017-07-19 14:34:22'),
(5, 1, '1e6d9f48dc7c916ca429b47f6158ae56', '0f219df81dcda0e0152885c444da62ecdd88d1e8', '2017-07-19 14:35:17'),
(6, 1, '6418e2f5deea76640824976206d50fd9', 'b928eac7dbaac7e859ee3333b193a0ddac15f9b6', '2017-07-19 14:36:25'),
(7, 1, '57204ce41165e809f76b206788393111', 'daa43fad0a9ea16d13bcf8a8d27acbd2fb456aa6', '2017-07-19 14:37:15'),
(8, 1, 'a227d5476f513b628baac6e88c39249c', '1fb75ace41e7d59cb67e28c8ceec7324a1527d8b', '2017-07-25 13:31:08'),
(9, 1, '1ccfcebd69e84c9321cfe0830042e9bc', '22e7011c31064e2e263b2147822b154382964bd0', '2017-07-25 13:33:53'),
(10, 1, 'cba4e8b333cf1e9e2ef14aa6f37ae8fd', '1e2408fa197195e6886d2495f9c9ab9706d51a17', '2017-07-25 14:02:16'),
(11, 1, '1d903dc2e57554fce789b99f2f6c15fc', 'b2f4402a713861ef86e349e8650c7350e89696ef', '2017-07-25 14:20:23'),
(12, 1, 'd8d5362accde4ffeacd9bf702bc6f873', 'bd1e6daf8ca246a005984c07f9d0acfba4d773f9', '2017-07-25 14:26:19'),
(13, 1, '36e19ab64bd0d9a6e6a209cc4bd5f25c', 'fa33d407f8395c4cc0f901aa9cc47d794bbf2138', '2017-07-25 14:26:57'),
(14, 1, '7b4894d607cb8b190d314ec4e0555376', '632ca6203e53b2b93b484fd9cec295599dbb4159', '2017-07-25 14:42:54'),
(15, 1, '9df90d2043751449e872c55c290ad127', '41e9a9d77a0800ef2c72b264f6cb69e14f47a4dc', '2017-07-25 14:43:58'),
(16, 1, '3c2966da38d42b5f4e59cc7187cb5214', '619bebaf588d7b800dcccf25f20164f04aabd53b', '2017-07-26 13:55:32'),
(17, 1, '1530f82364c5b340be6494938af832b0', '504c45fa18149095bf86e41707c55b23291cc7c1', '2017-07-26 14:16:31'),
(18, 1, '96aa3b61f5b798bdd0acb8f3cc999df8', 'fc779f7cd92b5284a1306bcfe7230e59d4f9488f', '2017-08-07 14:14:49'),
(19, 1, '6baa3338726fd2604db068fe9151069e', '76997dee8264d9b96fb3626e2e0c5be0955405da', '2017-08-08 13:20:57'),
(20, 1, '8a174d8e99ba18bfc6a318b733b2c090', '8fd2776dbdbd346942c58501d022b2afde838a70', '2017-08-08 13:50:56'),
(21, 1, '6f17deff3f939f6a0bc6478223ef3ece', '99f813ce87d5efd14e6496bfff1a56563e12d90a', '2017-08-09 09:33:40'),
(22, 2, '984211007534ee22b2d912a9bd4a8b3c', '34b2b46c629a31e4c97c75bb627409935d05a618', '2017-08-09 10:13:56'),
(23, 1, '30e3062dcbb289c371cf3822bdb84eba', '439bb875ab0c722ca086c1777ecca9cf9ad8ec38', '2017-08-09 10:24:24'),
(24, 1, 'a32b58b56c47523b0b36be70f9f25a84', '2e5d7cd7417b36e1030b7ecda30eeeba0ecc745e', '2017-08-09 10:25:29'),
(25, 1, '3a8050f9a925c693ec5e42d8da4cccb9', '96ca6d4dd7960584b0778aacce6b59d297444036', '2017-08-09 11:26:16'),
(26, 1, 'a8f59ede87e46b804decfcc76b49389c', '57acee51e5e7f83e553c74008bdeb0d4e39379e9', '2017-08-10 12:10:42'),
(27, 1, '6a01fd3640fbd1ca693de03461c35f56', 'eef6fbf5c9feda2a5629fbd0158e38aba863f4cb', '2017-08-11 13:32:13'),
(28, 1, '983bbbf37da8c7de1ee8287c0734c525', 'e25c9ebd033fceba237846afda12a10a6e1ac2f5', '2017-08-14 09:30:35'),
(29, 1, '10897f47b13db515c9123b0c589e86dd', '0d5cd2b69bfa52e5e2a76137a6db81abc32110ef', '2017-08-14 18:12:14'),
(30, 1, 'a133e87dbbc5272c6d220f181ac8a46a', 'b6d5465516ec88723f273534fa6f4cde59e45b48', '2017-08-15 11:27:14'),
(31, 1, '88eb4a96e69edd6d6636c348c4508654', 'dfc22def9f0f53ca3508dc135513e466b7c138dd', '2017-08-15 11:27:56'),
(32, 3, '839e087930290e4df32d0bbfe0166099', '09cc948a32b4d0c575c536f037455dc84e0d7e1a', '2017-08-28 13:25:20'),
(33, 3, '03934a8297a432c0c45dd8d5f89f46ad', '3a033a75d257ad4d149bf3e152c8222b4ab403af', '2017-08-28 13:32:40'),
(34, 3, 'd9effaaf5efdac312bf1f9ab7dbdc580', '72963f283175e181600de42d3aced7cd19c2fbcd', '2017-08-28 13:32:53'),
(35, 3, '1a4ed5fbd534418b9dffeeffd4c35cfa', '01aba95d6d3430a42152b6337a866f7f697f44fe', '2017-08-28 13:35:04'),
(36, 3, '3022095fe68d66213d16b8d23570c424', '01c682ddf5f0797c325f0e8fef0e90e51b21ed81', '2017-08-28 13:40:01'),
(37, 3, '6ea8462eb07b1623a1889b8c46245fe1', 'ccd302fced3011ffbe7039eff712ea9de55f13bf', '2017-08-28 13:45:45');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `size` int(11) NOT NULL,
  `content` mediumblob NOT NULL,
  `studienfach` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passwort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vorname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nachname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `passwortcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passwortcode_time` timestamp NULL DEFAULT NULL,
  `hash` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `email`, `passwort`, `vorname`, `nachname`, `created_at`, `updated_at`, `passwortcode`, `passwortcode_time`, `hash`, `active`) VALUES
(1, 'test@test.de', '$2y$10$NDWkaKpR0t6HKxYApi3PZeRXZGrTgY8G4VcivBTMgIDwiAzl2To6K', 'test', 'test', '2017-07-19 14:09:02', NULL, '0416ab4975eba3941e784c27ff69cf38905fff0d', '2017-07-20 15:17:26', '', 1),
(2, 'test2@test.de', '$2y$10$UKIBTjVKuUtHZkZ3VHcC/.GA4LvnypXf8dqVGNaurdOTdcPIP5FY2', 'test2', 'test2', '2017-08-09 10:13:47', NULL, NULL, NULL, '', 1),
(3, 's49317@beuth-hochschule.de', '$2y$10$ezVUNBo.Y4K048soY/PO4eYShRZndWepCdgK8DK.BV60Meli6R2BK', 'Alexander', 'Roessner', '2017-08-28 13:23:06', NULL, NULL, NULL, '3a0772443a0739141292a5429b952fe6', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `securitytokens`
--
ALTER TABLE `securitytokens`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT für Tabelle `securitytokens`
--
ALTER TABLE `securitytokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT für Tabelle `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
