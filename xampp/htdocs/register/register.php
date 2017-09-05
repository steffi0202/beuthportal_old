<!DOCTYPE html>
<html lang="en">

<head>
<!--meta http-equiv="refresh" content="5; URL=../index.php"-->

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Bootstrap Core CSS -->
 <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Fonts -->
 <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <!-- Custom styles for this template -->
 <link href="../css/style.css" rel="stylesheet">
  <!-- Plugin CSS -->
 <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS -->
  <link href="../css/creative.min.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Star Rating -->
  <link href="css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
  <script src="js/star-rating.js" type="text/javascript"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">
        </div>
          <!--/.container-fluid-->
     </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
				<div class="container main-container" style="text-align:center; font-size:120%;">


				</div>
            </div>
        </div>

<?php
session_start();
//require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");
$pdo = new PDO('mysql:host=localhost;dbname=beuthportal', 'root', '');
include("templatesforregister/headerregister.inc.php")
?>
<div class="container main-container registration-form" style="max-width:500px;">
<h1>Registrierung</h1>
<!--Diese Registrierung ist Studenten mit einer Beuth-Email-Adresse vorbehalten.-->
<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll

if(isset($_GET['register'])) {
	$error = false;
	$vorname = trim($_POST['vorname']);
	$nachname = trim($_POST['nachname']);
	$email = trim($_POST['email']);
	$passwort = $_POST['passwort'];
	$passwort2 = $_POST['passwort2'];
	//neu
	$hash = md5(rand(0,1000));
	$active = 0;

	if(empty($vorname) || empty($nachname) || empty($email)) {
		echo "<font color='#FF0000'>Bitte alle Felder ausfüllen<br></font>";
		$error = true;
	}

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "<font color='#FF0000'>Bitte eine gültige E-Mail-Adresse eingeben<br></font>";
		$error = true;
	}

	if(strlen($passwort) == 0) {
		echo "<font color='#FF0000'>Bitte ein Passwort angeben<br></font>";
		$error = true;
	}
	if($passwort != $passwort2) {
		echo "<font color='#FF0000'>Die Passwörter müssen übereinstimmen<br></font>";
		$error = true;
	}

	//Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
	if(!$error) {
		$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
		$result = $statement->execute(array('email' => $email));
		$user = $statement->fetch();

		if($user !== false) {
			echo "<font color='#FF0000'>Diese E-Mail-Adresse ist bereits vergeben<br></font>";
			$error = true;
		}
	}

	//Überprüfe, dass die E-Mail-Adresse eine Beuth-Adresse ist
	if(!$error) {
		list ($user, $domain) = explode('@', $email);

		if($domain !== 'beuth-hochschule.de'){
			echo "<font color='#FF0000'>Deine E-Mail-Adresse ist keine gültige Beuth-Email-Adresse!<br></font>";
			$error = true;
		}
	}

	//Das Passwort muss bestimmte Richtlinien befolgen
	if(!$error) {
		if (!preg_match('/[A-Z]/', $passwort) OR !preg_match('/[a-z]/', $passwort) OR !preg_match('/[0-9]/', $passwort)  OR strlen($passwort) < 8) {
			echo "<font color='#FF0000'>Das Passwort muss mindestens 8 Zeichen lang sein und aus Zahlen, Klein- und Grossbuchstaben bestehen<br></font>";
			$error = true;
		}
	}

	//Keine Fehler, wir können den Nutzer registrieren
	if(!$error) {
		$passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

		$statement = $pdo->prepare("INSERT INTO users (email, passwort, vorname, nachname, hash, active) VALUES (:email, :passwort, :vorname, :nachname, :hash, :active)");
		$result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash, 'vorname' => $vorname, 'nachname' => $nachname, 'hash' => $hash, 'active' => $active));

		if($result) {


			//start neu

				$_SESSION['active'] = 0; //solange 0 bis User aktiviert -> verify.php
				$_SESSION['logged_in'] = true; // User ist eingeloggt
				$_SESSION['message'] =

						 "Ein Bestätigungslink wurde an $email verschickt,
						 bitte bestätige deine Registrierung durch einen Klick auf den Bestätigungslink!";
				$to      = $email;

				$url_registrierungsverfikation = getSiteURL().'verify.php?email='.$email.'&hash='.$hash.'&active='.$active;
				$subject = 'Bestaetigung deiner Registrierung (Studentenportal der Beuth Hochschule Berlin)';
				$message_body = '
				Hallo '.$vorname.',

				danke fuer deine Registrierung beim Studentenportal der Beuth Hochschule Berlin!

				Mit einem Klick auf den folgenden Link bestaetigst du deine Registrierung:

				'.$url_registrierungsverfikation.'

				Viele Gruesse,

				dein Studentenportal-Team';

				$headers =  'MIME-Version: 1.0' . "\r\n";
				$headers .= 'From: Beuth-Portal <beuthportal@web.de>' . "\r\n";
				//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

				mail( $to, $subject, $message_body, $headers );

			//ende neu


			echo "<font color='#008000'>Du wurdest erfolgreich registriert.<br /> <br />
			Bitte bestaetige die E-Mail, die wir an $to gesendet haben, bevor du dich anmelden kannst.</font>";

			$showFormular = false;
		} else {
			echo "<font color='#FF0000'>Beim Abspeichern ist ein Fehler aufgetreten<br></font>";
		}
	}
}

if($showFormular) {
?>

<form action="?register=1" method="post">

<div class="form-group">
<label for="inputVorname">Vorname:</label>
<input type="text" id="inputVorname" size="40" maxlength="250" name="vorname" class="form-control" required>
</div>

<div class="form-group">
<label for="inputNachname">Nachname:</label>
<input type="text" id="inputNachname" size="40" maxlength="250" name="nachname" class="form-control" required>
</div>

<div class="form-group">
<label for="inputEmail">E-Mail:</label>
<input type="email" id="inputEmail" size="40" maxlength="250" name="email" class="form-control" required>
</div>

<div class="form-group">
<label for="inputPasswort">Dein Passwort:</label>
<input type="password" id="inputPasswort" size="40"  maxlength="250" name="passwort" class="form-control" required>
</div>

<div class="form-group">
<label for="inputPasswort2">Passwort wiederholen:</label>
<input type="password" id="inputPasswort2" size="40" maxlength="250" name="passwort2" class="form-control" required>
</div>
<button type="submit" class="btn btn-lg btn-primary btn-block">Registrieren</button>
</form>

<?php
} //Ende von if($showFormular)


?>
<div style="font-size:110%;">
	<br />
	<br />
	<a href="login.php">Zum Login</a>
	<br /><br />
	<a href="../index.php">Zur Startseite</a>
</div>

</div>

 </header>
</body>
<?php
include("../templates/footer.inc.php")
?>
</html>
