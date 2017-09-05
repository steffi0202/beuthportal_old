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
//require_once('inc/config.inc.php');
$pdo = new PDO('mysql:host=localhost;dbname=beuthportal', 'root', '');
require_once("inc/functions.inc.php");

//include("../templates/header.inc.php");
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
			$from = "From: Studentenportal der Beuth Hochschule Berlin <beuthportal@web.de>"; 
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
			$headers .= 'From: Beuth-Portal <beuthportal@web.de>' . "\r\n";
			//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
			mail( $empfaenger, $betreff, $text, $headers );

			echo "<font color='white'>Ein Link zum Zurücksetzen deines Passworts wurde an <span>$empfaenger</span> gesendet.</font>";
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
<div style="font-size:110%; font-family:Arial;">
<br />
<br />
	<a href="login.php">Zum Login</a>
	<br /><br />
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
</html>
