-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 01. Sep 2017 um 12:19
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `beuthportal`
--
CREATE DATABASE IF NOT EXISTS `beuthportal` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `beuthportal`;

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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `ranking`
--

INSERT INTO `ranking` (`Studiengang`, `Modul`, `Semester`, `Zeitaufwand`, `Modul_des`, `Dozent`, `Dozent_des`, `Sterne`, `id`, `created_at`) VALUES
('Wirtschaftsinformatik - Online - Bachelor', 'Algorithmen und Datenstrukturen', '', '0', 'Ziemlich viel, ziemlich schwer...', 'Prof. Dr. Agate Merceron', 'Ziemlich hilfsbereit, ziemlich fair...', 5, 33, '2017-08-28 00:00:00'),
('Wirtschaftsinformatik - Online', 'Computerarchitektur und Betriebssysteme', '', '2', 'Ich bin ziemlich offen an die Sachen gegangen und wollte mir einfach ,unvoreingenommen, ein Bild machen. Ich wusste zwar in welche Richtung der Studiengang geht aber was genau und wie nicht. Hatte am meisten Bammel vor dem Informatik Teil, da das fÃ¼r mich Neuland ist. Muss aber ehrlich gesagt sagen, dass es mich positiv Ã¼berrascht hat. Es ist zwar anspruchsvoll und man muss was tum, um weiter zu kommen. Da es fÃ¼r mich ja alles komplett neu ist, ist der Reiz auch da alles kennenzulernen.', 'Off, Thomas, Prof. Dr.', 'Der Studiengang Wirtschaftsinformatik an der Uni Duisburg-Essen bietet sehr gute und vielfÃ¤ltige Berufschancen. Die Lehrveranstaltungen sind gut durchdacht und anspruchsvoll. Manche sind auch ohne viele Vorkenntnisse gut nachvollziehbar. Die Dozenten sind super freundlich und hilfsbereit. Die Bibliotheken sowie die Pc-Halls bieten sehr gute LernmÃ¶glichkeiten mit guten Pc\'s und einer groÃŸen Auswahl an Fachliteratur. Die Vorlesungen sind meistens ziemlich gut besucht, weswegen man frÃ¼h genug da sein sollte um einen guten Sitzplatz zu bekommeb (hinten sitzen meistens die, die nur am quatschen sind ;) ).\r\nIch bin positiv Ã¼berrascht von diesem Studiengang und dieser UniversitÃ¤t und kann es nur jedem empfehlen der sich fÃ¼r Wirtschaft in Kombination mit Informatik, gute Berufschancen mit vielen MÃ¶glichkeiten haben mÃ¶chte und natÃ¼rlich SpaÃŸ am Lernen (Studentenleben) hat.', 4, 40, '0000-00-00 00:00:00'),
('Medieninformatik - Online', 'Computerarchitektur und Betriebssysteme', '', '2', 'Der Studiengang Wirtschaftsinformatik an der Uni Duisburg-Essen bietet sehr gute und vielfÃ¤ltige Berufschancen. Die Lehrveranstaltungen sind gut durchdacht und anspruchsvoll. Manche sind auch ohne viele Vorkenntnisse gut nachvollziehbar. Die Dozenten sind super freundlich und hilfsbereit. Die Bibliotheken sowie die Pc-Halls bieten sehr gute LernmÃ¶glichkeiten mit guten Pc\'s und einer groÃŸen Auswahl an Fachliteratur. Die Vorlesungen sind meistens ziemlich gut besucht, weswegen man frÃ¼h genug da sein sollte um einen guten Sitzplatz zu bekommeb (hinten sitzen meistens die, die nur am quatschen sind ;) ).\r\nIch bin positiv Ã¼berrascht von diesem Studiengang und dieser UniversitÃ¤t und kann es nur jedem empfehlen der sich fÃ¼r Wirtschaft in Kombination mit Informatik, gute Berufschancen mit vielen MÃ¶glichkeiten haben mÃ¶chte und natÃ¼rlich SpaÃŸ am Lernen (Studentenleben) hat.', 'Pinardi, Mara, Prof. Dipl.-Ing.', 'Der Studiengang Wirtschaftsinformatik an der Uni Duisburg-Essen bietet sehr gute und vielfÃ¤ltige Berufschancen. Die Lehrveranstaltungen sind gut durchdacht und anspruchsvoll. Manche sind auch ohne viele Vorkenntnisse gut nachvollziehbar. Die Dozenten sind super freundlich und hilfsbereit. Die Bibliotheken sowie die Pc-Halls bieten sehr gute LernmÃ¶glichkeiten mit guten Pc\'s und einer groÃŸen Auswahl an Fachliteratur. Die Vorlesungen sind meistens ziemlich gut besucht, weswegen man frÃ¼h genug da sein sollte um einen guten Sitzplatz zu bekommeb (hinten sitzen meistens die, die nur am quatschen sind ;) ).\r\nIch bin positiv Ã¼berrascht von diesem Studiengang und dieser UniversitÃ¤t und kann es nur jedem empfehlen der sich fÃ¼r Wirtschaft in Kombination mit Informatik, gute Berufschancen mit vielen MÃ¶glichkeiten haben mÃ¶chte und natÃ¼rlich SpaÃŸ am Lernen (Studentenleben) hat.', 1.6, 41, '0000-00-00 00:00:00'),
('Wirtschaftsinformatik - Online', 'Computerarchitektur und Betriebssysteme', '', '3', 'Der Studiengang Wirtschaftsinformatik hat meine Erwartungen vollstÃ¤ndig erfÃ¼llt.\r\nEs ist ein anspruchsvoller (vor allem durch die Lehrinhalte Programmierung und Mathematik) aber sehr interessanter Studiengang mit Zukunftspotential.\r\nDie DurchfÃ¼hrung der Lehrinhalte und die Begleitung der Studierenden durch die Dozenten bzw. wissenschaftlichen Mitarbeiter ist sehr gut. Ãœber die Plattform Moodle steht man mit den Lehrenden und anderen Studierenden laufend in Kontakt und Fragen werden zÃ¼gig geklÃ¤rt. Es gibt durchweg genÃ¼gend PlÃ¤tze in den Ãœbungsgruppen, bei EngpÃ¤ssen werden ohne Probleme neue Ãœbungsgruppen ins Leben gerufen.', 'Bode, Christopher, Prof. Dr.-Ing.', 'ch stehe inzwischen kurz vor dem Ende meines Bachelorstudiums und versuche an dieser Stelle mal, einen etwas ausfÃ¼hrlicheren Bericht zum Studium an der UDE zu schreiben.', 4.6, 42, '0000-00-00 00:00:00'),
('Wirtschaftsinformatik - Online', 'Computerarchitektur und Betriebssysteme', '', '4', 'Da ich gerade erst im 1. Semester bin, kann ich natÃ¼rlich auch nur dazu etwas sagen. Mir gefÃ¤llt es bisher sehr gut, bis auf dass es ziemlich schwierige FÃ¤cher zu Anfang gibt, zu denen gesagt wird, dass man keine Vorkenntnisse braucht, aber es aus meiner Erfahrung und der einer Menge meiner Kommilitonen, sinnvoll ist, wenn man vor allem im Informatikbereich Vorkenntnisse mitbringt. Ansonsten muss man schauen und einige FÃ¤cher in den Semestern tauschen. Trotz allem bin ich immernoch begeistert, obwohl die Anzahl an MÃ¤dchen schon geringer ist und ich also eher mit mÃ¤nnlichen Kommilitonen zu tun habe. Aber ein paar MÃ¤dchen findet man trotzdem immer.', 'Edlich, Stefan, Prof. Dr.-Ing.', 'Wenn ich meinen Studiengang bewerten muss, kann ich grob sagen, dass alles in Ordnung ist. Die Studieninhalte werden ziemlich gut von den Dozenten, aber auch den studentischen Mitarbeiten gut vermittelt. In neueren GebÃ¤uden, wo sich auch meist die Vorlesungen und Ãœbungen/Tutorien befinden sind technisch sehr gut ausgestattet. Was ich jedoch schlecht finde, sind die PrÃ¼fungstermine, dass sie alle so eng zueinander liegen :/.   Wobei in den anderen StudiengÃ¤ngen ist es ebenfalls so.', 4.8, 43, '0000-00-00 00:00:00'),
('Wirtschaftsinformatik - Online', 'Computerarchitektur und Betriebssysteme', '', '>5', 'Ich bin im ersten Semester und da bald Klausuren sind bin ich schon jetzt am Lernen, weil es inhaltlich einfach viel zu viel ist. Das Abitur ist verglichen damit ein Klacks gewesen. Das einzig gute ist, dass es keine Anwesenheitspflicht gibt. Der Campus ist auch in Ordnung, vorallem ist das Essen in der Mensa relativ gÃ¼nstig.', 'Off, Thomas, Prof. Dr.', 'Mit der Uni bin ich im GroÃŸen und Ganzen zufrieden. Doch der Studiengang ist dehr anspruchsvoll und nicht fÃ¼r jeden geeignet. Wenn man noch nie Informatik hatte, sollte die Finger davonlassen. \r\nEs ist leider nicht so wie in der Schule man muss vieles selber erarbeiten.', 1.6, 44, '2017-09-01 12:17:56');

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
(37, 3, '6ea8462eb07b1623a1889b8c46245fe1', 'ccd302fced3011ffbe7039eff712ea9de55f13bf', '2017-08-28 13:45:45'),
(38, 3, '1008eddd29c61e501d519c07f6de02bc', 'e64b6ade3d50f67d9ef0cadebc3d750f6ad0fc64', '2017-08-28 14:04:23'),
(39, 3, 'f2370b131b4359d90d0aca50481793b7', '5c094d19286a05c8ea97aff79d2c8fc695430c27', '2017-08-28 21:08:51'),
(40, 3, '7389631bb1998ad56afc5eee1db07a82', 'ae0e28f6632e880643c5ae1ca0d94272261bcc58', '2017-08-28 21:10:34'),
(41, 3, '63079bfddabd687c136ab720586d11b2', '3e431487607f5424edd7568d31df6f2d12e257d6', '2017-08-29 19:52:30'),
(42, 3, '4ef25a3c67b8cfd4c1d307eb23293fd5', '26911cec60b66e0240b96221f7fc69a8768cc9f6', '2017-08-29 19:56:56'),
(43, 3, '9b68c3d94e3a6925684e0707f710f801', 'fd9efd3167bb2e3208dfc123f74993f1e3d08cd6', '2017-08-30 13:02:47'),
(44, 3, 'f6476b15570305fb2c5cfa2d8be57c60', 'bb818cdc3f508e3d7f0f0d16bfc552a55f7f9596', '2017-08-31 16:48:40'),
(45, 1, '07c700fb5f0a13bf8d2a7295f1248341', 'ee1ec71a9247d0b60ab2a40a611af19b230f2061', '2017-08-31 17:32:47');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `studienfach`
--

CREATE TABLE `studienfach` (
  `id` int(11) NOT NULL,
  `studienfach_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `studienfach`
--

INSERT INTO `studienfach` (`id`, `studienfach_name`) VALUES
(1, 'Einfuehrung in die Betriebswirtschaftslehre I'),
(2, 'Einfuehrung in die Wirtschaftsinformatik'),
(3, 'English for Computer Scientists'),
(4, 'Grundlagen der Mathematik'),
(5, 'Grundlagen der Programmierung I'),
(6, 'Kommunikation, Fuehrung und Selbstmanagement'),
(7, 'Einfuehrung in die Betriebswirtschaftslehre II'),
(8, 'Grundlagen betrieblicher Anwendungssysteme'),
(9, 'Grundlagen der Programmierung II'),
(10, 'Mensch-Computer-Kommunikation'),
(11, 'Organisationslehre'),
(12, 'Rechnernetze'),
(13, 'Algorithmen und Datenstrukturen'),
(14, 'Datenbanken'),
(15, 'IT-Recht'),
(16, 'Internettechnologie / Client / Server'),
(17, 'Projektmanagement'),
(18, 'Wirtschaftsstatistik'),
(19, 'Business Engineering'),
(20, 'Einfuehrung in wissenschaftliche Projektarbeit'),
(21, 'Kosten- und Erloesrechnung'),
(22, 'Operations Research'),
(23, 'Softwaretechnik'),
(24, 'Wirtschaftsinformatik-Projekt'),
(25, 'Business Intelligence'),
(26, 'Informationsmanagement'),
(27, 'Softwaretechnik-Projekt'),
(28, 'Wirtschaftsinformatik-Workshop'),
(29, 'Wirtschaftsrecht'),
(30, 'Projektphase'),
(31, 'Bachelor-Arbeit und -kolloquium'),
(32, 'Business English'),
(33, 'Controlling'),
(34, 'Grundlagen IT-Sicherheit'),
(35, 'Kommunikationsnetze');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `size` int(11) NOT NULL,
  `content` longblob NOT NULL,
  `studienfach` varchar(50) NOT NULL,
  `Datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `email`, `passwort`, `vorname`, `nachname`, `created_at`, `updated_at`, `passwortcode`, `passwortcode_time`, `hash`, `active`) VALUES
(1, 'test@test.de', '$2y$10$NDWkaKpR0t6HKxYApi3PZeRXZGrTgY8G4VcivBTMgIDwiAzl2To6K', 'test', 'test', '2017-07-19 14:09:02', NULL, '0416ab4975eba3941e784c27ff69cf38905fff0d', '2017-07-20 15:17:26', '', 1),
(2, 'test2@test.de', '$2y$10$UKIBTjVKuUtHZkZ3VHcC/.GA4LvnypXf8dqVGNaurdOTdcPIP5FY2', 'test2', 'test2', '2017-08-09 10:13:47', NULL, NULL, NULL, '', 1),
(3, 's49317@beuth-hochschule.de', '$2y$10$97/AwBrPT8ZSJ1x/JcrIvuktDL/FwunMkL3s7L8AbzFazpG8XTzvu', 'Alexander', 'RÃ¶ÃŸner', '2017-08-31 16:46:11', NULL, NULL, NULL, '8b6dd7db9af49e67306feb59a8bdc52c', 1),
(5, 's65299@beuth-hochschule.de', '$2y$10$wGPwUh.3JhTvxUIdmYWu0eJz7GLYob3574nCfarxmf96rsAEL9gny', 'Steffi', 'Schalitz', '2017-08-31 17:27:45', NULL, NULL, NULL, 'd709f38ef758b5066ef31b18039b8ce5', 0);

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
-- Indizes für die Tabelle `studienfach`
--
ALTER TABLE `studienfach`
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT für Tabelle `securitytokens`
--
ALTER TABLE `securitytokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT für Tabelle `studienfach`
--
ALTER TABLE `studienfach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT für Tabelle `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;--
-- Datenbank: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

--
-- Daten für Tabelle `pma__bookmark`
--

INSERT INTO `pma__bookmark` (`id`, `dbase`, `user`, `label`, `query`) VALUES
(1, 'beuthportal', '', 'Index lÃ¶schen', 'ALTER TABLE `ranking` DROP INDEX `Modul_des`;  '),
(3, 'beuthportal', 'root', 'Index lÃ¶schen', 'ALTER TABLE `ranking` DROP INDEX `Dozent`;  ');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Daten für Tabelle `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"beuthportal\",\"table\":\"ranking\"},{\"db\":\"beuthportal\",\"table\":\"users\"},{\"db\":\"beuthportal\",\"table\":\"securitytokens\"},{\"db\":\"ranking\",\"table\":\"project\"}]');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Daten für Tabelle `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'beuthportal', 'ranking', '{\"CREATE_TIME\":\"2017-08-09 12:21:08\",\"col_visib\":[\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\"]}', '2017-09-01 09:20:33'),
('root', 'ranking', 'project', '[]', '2017-05-24 15:55:33');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Daten für Tabelle `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2017-05-24 14:07:28', '{\"lang\":\"de\",\"collation_connection\":\"utf8mb4_unicode_ci\"}');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indizes für die Tabelle `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indizes für die Tabelle `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indizes für die Tabelle `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indizes für die Tabelle `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indizes für die Tabelle `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indizes für die Tabelle `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indizes für die Tabelle `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indizes für die Tabelle `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indizes für die Tabelle `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indizes für die Tabelle `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indizes für die Tabelle `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indizes für die Tabelle `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indizes für die Tabelle `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indizes für die Tabelle `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indizes für die Tabelle `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indizes für die Tabelle `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indizes für die Tabelle `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;--
-- Datenbank: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
