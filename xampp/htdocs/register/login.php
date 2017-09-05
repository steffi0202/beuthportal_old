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
if(is_checked_in()){
	header("location:../dashboard.php");
}
else{
$pdo = new PDO('mysql:host=localhost;dbname=beuthportal', 'root', '');

$error_msg = "";
if(isset($_POST['email']) && isset($_POST['passwort'])) {
	$email = $_POST['email'];
	$passwort = $_POST['passwort'];


		$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email AND active = 0");
		$result = $statement->execute(array('email' => $email));
		$user = $statement->fetch();

	if($user !== false){
		echo "<font color='#FF0000'><br />Bitte aktiviere zuerst deinen Account, indem du den Link bestätigst,
		den wir an <span>$email</span> geschickt haben.<br /><br /></font>";
	}
	else{
		$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
		$result = $statement->execute(array('email' => $email));
		$user = $statement->fetch();

		//Überprüfung des Passworts
		if ($user !== false && password_verify($passwort, $user['passwort'])) {
			$_SESSION['userid'] = $user['id'];

			//Möchte der Nutzer angemeldet beleiben?
			if(isset($_POST['angemeldet_bleiben'])) {
				$identifier = random_string();
				$securitytoken = random_string();

				$insert = $pdo->prepare("INSERT INTO securitytokens (user_id, identifier, securitytoken) VALUES (:user_id, :identifier, :securitytoken)");
				$insert->execute(array('user_id' => $user['id'], 'identifier' => $identifier, 'securitytoken' => sha1($securitytoken)));
				setcookie("identifier", $identifier, time()+(3600*24*365)); //Valid for 1 year
				setcookie("securitytoken", $securitytoken, time()+(3600*24*365)); //Valid for 1 year

			}
			header("location:../dashboard.php");
			exit;
		} else {
			$error_msg = "<font color='#FF0000'><br />E-Mail oder Passwort war ungültig<br /><br /></font>";
		}
	}
}

$email_value = "";
if(isset($_POST['email']))
	$email_value = htmlentities($_POST['email']);

}
//include("templates/header.inc.php");
?>
 <div class="container small-container-330 form-signin"  style="max-width:300px;padding-top:70px;">
  <form action="login.php" method="post">
	<h2 class="form-signin-heading">Login</h2>

<?php
if(isset($error_msg) && !empty($error_msg)) {
	echo $error_msg;
}
?>
	<label for="inputEmail" class="sr-only">E-Mail</label>
	<input type="email" name="email" id="inputEmail" class="form-control" placeholder="E-Mail" value="<?php echo $email_value; ?>" required autofocus>
	<label for="inputPassword" class="sr-only">Passwort</label>
	<input type="password" name="passwort" id="inputPassword" class="form-control" placeholder="Passwort" required>
	<div class="checkbox">
	  <label>
		<input type="checkbox" name="angemeldet_bleiben" title="Angemeldet bleiben" value="1" checked="checked"> Angemeldet bleiben
	  </label>
	</div>
	<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
	<div style="font-size:110%; font-family:Arial;">
	<br />
	<br />
	<a href="passwortvergessen.php">Passwort vergessen</a>
	<br /><br />
	<a href="register.php">Zur Registrierung</a>
	<br /><br />
	<a href="../index.php">Zur Startseite</a>
	</div>
  </form>

</div> <!-- /container -->
   </header>
   </body>
<?php
include("../templates/footer.inc.php")
?>
</html>