<?php
session_start();
//require_once('inc/config.inc.php');
$pdo = new PDO('mysql:host=localhost;dbname=beuthportal', 'root', '');
require_once("inc/functions.inc.php");

include("templates/header.inc.php");
?>
 <div class="container small-container-330" style="max-width:400px; align-items: center; justify-content: center;">
	<h2 >Passwort vergessen</h2>


<?php
$showForm = true;

if(isset($_GET['send']) ) {
	if(!isset($_POST['email']) || empty($_POST['email'])) {
		$error = "<b>Bitte eine E-Mail-Adresse eintragen</b>";
	} else {
		$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
		$result = $statement->execute(array('email' => $_POST['email']));
		$user = $statement->fetch();

		if($user === false) {
			$error = "<b>Kein Benutzer gefunden</b>";
		} else {

			$passwortcode = random_string();
			$statement = $pdo->prepare("UPDATE users SET passwortcode = :passwortcode, passwortcode_time = NOW() WHERE id = :userid");
			$result = $statement->execute(array('passwortcode' => sha1($passwortcode), 'userid' => $user['id']));

			$empfaenger = $user['email'];
			$betreff = "Neues Passwort fuer deinen Beuth-Portal-Account"; 
			$from = "From: Studentenportal der Beuth Hochschule Berlin <beuthportal@gmail.com>"; 
			$url_passwortcode = getSiteURL().'passwortzuruecksetzen.php?userid='.$user['id'].'&code='.$passwortcode; 
			$text = 'Hallo '.$user['vorname'].',
fuer deinen Account des Studentenportals der Beuth Hochschule Berlin wurde nach einem neuen Passwort gefragt. 
Um ein neues Passwort zu vergeben, rufe innerhalb der naechsten 24 Stunden den folgenden Link auf:
'.$url_passwortcode.'

Sollte dir dein Passwort wieder eingefallen sein oder hast du dieses nicht angefordert, ignoriere diese E-Mail einfach.

Viele Gruesse,
dein Studentenportal-Team';
			//echo $text;
			//mail($empfaenger, $betreff, $text, $from);
			//mail($empfaenger, $betreff, $text);
			
			$headers =  'MIME-Version: 1.0' . "\r\n"; 
			$headers .= 'From: Beuth-Portal <beuthportal@gmail.com>' . "\r\n";
			//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
			mail( $to, $subject, $message_body, $headers );

			echo "Ein Link zum Zurücksetzen deines Passworts wurde an <span>$empfaenger</span> gesendet.";
			$showForm = false;
		}
	}
}

if($showForm):
?>
	<div>Gib deine E-Mail-Adresse ein, um dein Passwort zu ändern.</div><br /><br />

	<?php
	if(isset($error) && !empty($error)) {
		echo $error;
	}

	?>
	<form action="?send=1" method="post">
		<label for="inputEmail">E-Mail</label>
		<input class="form-control" placeholder="E-Mail" name="email" type="email" value="
		<?php echo isset($_POST['email']) ? htmlentities($_POST['email']) : ''; ?>" required>
		<br>
		<input  class="btn btn-lg btn-primary btn-block" type="submit" value="Neues Passwort anfordern">
	</form>
<?php
endif; //Endif von if($showForm)
?>

</div> <!-- /container -->


<?php
include("templates/footer.inc.php")
?>
