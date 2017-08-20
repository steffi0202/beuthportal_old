


--
-- Datenbank: `beuthportal`
--

-- --------------------------------------------------------

--
-- 
Tabellenstruktur für Tabelle `users`
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
) 
ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



