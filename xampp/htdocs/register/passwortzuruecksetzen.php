<?php 
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");
include("../templates/header.inc.php");
if(!isset($_GET['userid']) || !isset($_GET['code'])) {
	error("<font color='#FF0000'><br />Leider wurde beim Aufruf dieser Website kein Code zum Zurücksetzen deines Passworts übermittelt<br /></font>");
}

$showForm = true; 
$userid = $_GET['userid'];
$code = $_GET['code'];
 
//Abfrage des Nutzers
$statement = $pdo->prepare("SELECT * FROM users WHERE id = :userid");
$result = $statement->execute(array('userid' => $userid));
$user = $statement->fetch();
 
//Überprüfe dass ein Nutzer gefunden wurde und dieser auch ein Passwortcode hat
if($user === null || $user['passwortcode'] === null) {
	error("<font color='#FF0000'><br />Der Benutzer wurde nicht gefunden oder hat kein neues Passwort angefordert.<br /></font>");
}
 
if($user['passwortcode_time'] === null || strtotime($user['passwortcode_time']) < (time()-24*3600) ) {
	error("<font color='#FF0000'><br />Dein Code ist leider abgelaufen. Bitte benutze die Passwort-Vergessen-Funktion erneut.<br /></font>");
}
 
 
//Überprüfe den Passwortcode
if(sha1($code) != $user['passwortcode']) {
	error("<font color='#FF0000'><br />Der übergebene Code war ungültig. Stelle bitte sicher, dass du den genauen Link in der URL aufgerufen hast.<br /><br />
	Solltest du mehrmals die Passwort-Vergessen-Funktion genutzt haben, rufe den Link der neuesten E-Mail auf.<br /></font>");
}
 
//Der Code war korrekt, der Nutzer darf ein neues Passwort eingeben
 
if(isset($_GET['send'])) {
	$passwort = $_POST['passwort'];
	$passwort2 = $_POST['passwort2'];
	
		//Das Passwort muss bestimmte Richtlinien befolgen
	if (!preg_match('/[A-Z]/', $passwort) OR !preg_match('/[a-z]/', $passwort) OR !preg_match('/[0-9]/', $passwort)  OR strlen($passwort) < 8) {
			$msg = "<font color='#FF0000'><br />Das Passwort muss mindestens 8 Zeichen lang sein und aus Zahlen, Klein- und Grossbuchstaben bestehen<br /></font>";
	}
	else if($passwort != $passwort2) {
		$msg =  "<font color='#FF0000'><br />Bitte identische Passwörter eingeben<br /></font>";
	} else { //Speichere neues Passwort und lösche den Code
		$passworthash = password_hash($passwort, PASSWORD_DEFAULT);
		$statement = $pdo->prepare("UPDATE users SET passwort = :passworthash, passwortcode = NULL, passwortcode_time = NULL WHERE id = :userid");
		$result = $statement->execute(array('passworthash' => $passworthash, 'userid'=> $userid ));
		
		if($result) {
			$msg = "<font color='#008000'><br />Dein Passwort wurde erfolgreich geändert.<br /><br />
			Du kannst dich jetzt mit dem neuen Passwort anmelden.<br /></font><br /> <br /><a href='login.php'>Zum Login</a>";
			$showForm = false;
			
		}
	}
}

include("../templates/header.inc.php");
?>

 <div class="container small-container-500" style="max-width:400px; align-items: center; justify-content: center;">
 
<h1>Neues Passwort vergeben</h1>
<?php 
if(isset($msg)) {
	echo $msg;
}

if($showForm):
?>

<form action="?send=1&amp;userid=<?php echo htmlentities($userid); ?>&amp;code=<?php echo htmlentities($code); ?>" method="post">
<label for="passwort">Bitte gib ein neues Passwort ein:</label><br>
<input type="password" id="passwort" name="passwort" class="form-control" required><br>
 
<label for="passwort2">Passwort erneut eingeben:</label><br>
<input type="password" id="passwort2" name="passwort2" class="form-control" required><br>
 
<input type="submit" value="Passwort speichern" class="btn btn-lg btn-primary btn-block">
</form>
<?php 
endif;
?>

</div> <!-- /container -->
 

<?php 
include("templates/footer.inc.php")
?>