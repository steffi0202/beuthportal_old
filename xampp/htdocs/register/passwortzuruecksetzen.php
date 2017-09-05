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
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");
//include("../templates/header.inc.php");
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

//include("../templates/header.inc.php");
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

	<div style="font-size:110%; font-family:Arial;">
	<br />
	<br />
	<a href="register.php">Zur Registrierung</a>
	<br /><br />
	<a href="../index.php">Zur Startseite</a>
	</div>
</div> <!-- /container -->
 </header>
</body>
<?php 
include("templates/footer.inc.php")
?>
</head>