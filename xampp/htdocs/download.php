<?php
session_start();
//require_once("inc/config.inc.php");
require_once("register/inc/config.inc.php");
require_once("register/inc/functions.inc.php");

$pdo = new PDO('mysql:host=localhost;dbname=beuthportal', 'root', '');

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();

/*

	Download selected File

*/


if(isset($_GET['id']))
{
	$id    = $_GET['id'];
	
	$statement = $pdo->prepare("SELECT * FROM upload WHERE id = :id");
	$statement->execute(array('id' => $id));

	while($row = $statement->fetch()) {

		header("Content-Type: " .$row['type']);
		header("Content-Length: " .$row['size']);
		header("Content-Disposition: attachment; filename=" .$row['name']);
		
		ob_clean();
		
		echo $row['content'];
		
		exit;
	}
}

?>