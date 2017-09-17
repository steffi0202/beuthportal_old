<?php

class databaseTest extends PHPUnit_Framework_TestCase
{
     //TESTET DIE DATENBANKVERBINDUNG UND OB EINTRÄGE VORHANDEN SIND
	 public function testDatabaseConnection()
	{
$db_host = 'localhost';
$db_name = 'beuthportal';
$db_user = 'root';
$db_password = '';
$pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);

$this->assertNotNull($pdo);
	}
 

}