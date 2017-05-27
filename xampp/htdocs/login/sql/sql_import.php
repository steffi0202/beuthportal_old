<?php

$host = 'localhost';
$user = 'root';
$password = 'phpmyadminpasswort';

//Mysql-Verbindung herstellen
$mysqli = new mysqli($host,$user,$password);
if ($mysqli->connect_errno) {
    printf("Verbindung fehlgeschlagen: %s\n", $mysqli->connect_error);
    die();
}

//Datenbank anlegen
if ( !$mysqli->query('CREATE DATABASE beuthportal') ) {
    printf("Fehler: %s\n", $mysqli->error);
}

//User-Tabelle anlegen
$mysqli->query('
CREATE TABLE `beuthportal`.`users` 
(
    `id` INT NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(50) NOT NULL,
    `last_name` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    `hash` VARCHAR(32) NOT NULL,
    `active` BOOL NOT NULL DEFAULT 0,
PRIMARY KEY (`id`) 
);') or die($mysqli->error);

?>