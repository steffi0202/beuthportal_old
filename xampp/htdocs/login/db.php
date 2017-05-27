<?php
/* Datenbankverbindung*/
$host = 'localhost';
$user = 'root';
$pass = 'phpmyadminpasswort'; //das müsst ihr auf euer xampp/phpmyadmin-Passwort ändern
$db = 'beuthportal'; //die müsst ihr lokal anlegen bei phpmyadmin, siehe die beiden files im Unterordner "sql"
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

