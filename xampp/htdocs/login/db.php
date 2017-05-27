<?php
/* Datenbankverbindung*/
$host = 'localhost';
$user = 'root';
$pass = 'phpmyadminpasswort';
$db = 'beuthportal';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

