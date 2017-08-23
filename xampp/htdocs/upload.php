
<?php
session_start();
require_once("register/inc/config.inc.php");
require_once("register/inc/functions.inc.php");
include("register/templates/header.inc.php");
$user = check_user();
$target_dir = "uploads/";

/***********Hier könnte und sollte noch (mit PHPUnit) umfangreich auf z.B. zulässige Dateigrößen und -formate getestet werden***********/

//print_r($_FILES);
//print_r($_POST);
//print_r($_FILES);
//Warning: POST Content-Length of 8886591 bytes exceeds the limit of 8388608 bytes in Unknown on line 0
/*if(!isset($_POST) OR $_POST["MAX_FILE_SIZE"]>8388608){
	echo "<font color='#FF0000'><br />Die hochzuladende Datei darf eine Größe von 8192 KB bzw. 8 MB nicht übersteigen.</font>";
	echo "<br /><br />Zurück zum  <a href='register/dashboard.php'>Dashboard</a>";
	echo "<br /><br />Eine weitere <a href='filecontent.php'>Datei hochladen</a>";
	die();	
}

if(isset($_FILES["fileToUpload"]["tmp_name"]) && ($_FILES["fileToUpload"]["size"]) > 8388608){
	echo "<font color='#FF0000'><br />Die hochzuladende Datei darf eine Größe von 8192 KB bzw. 8 MB nicht übersteigen!</font>";
	echo "<br /><br />Zurück zum  <a href='register/dashboard.php'>Dashboard</a>";
	echo "<br /><br />Eine weitere <a href='filecontent.php'>Datei hochladen</a>";
	die();
}
else{*/
	if(isset($_FILES["fileToUpload"]["name"])){
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image

		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "<font color='#008000'><br />Die Datei ". basename( $_FILES["fileToUpload"]["name"]). " wurde hochgeladen.</font>";
			// header("Location: filecontent.php"); 
			echo "<br /><br />Zurück zum  <a href='register/dashboard.php'>Dashboard</a>";
			echo "<br /><br />Eine <a href='filecontent.php'>weitere Datei hochladen</a>";
			die();
		} 
		else {
			echo "<font color='#FF0000'><br />Es ist ein Fehler beim Hochladen aufgetreten.</font>";
			echo "<br /><br />Zurück zum  <a href='register/dashboard.php'>Dashboard</a>";
			echo "<br /><br />Eine weitere <a href='filecontent.php'>Datei hochladen</a>";
		}
	}
	else {
		echo "<font color='#FF0000'><br />Es ist ein Fehler beim Hochladen aufgetreten.</font>";
		echo "<br /><br />Zurück zum  <a href='register/dashboard.php'>Dashboard</a>";
		echo "<br /><br />Eine weitere <a href='filecontent.php'>Datei hochladen</a>";
	}
//}



?>