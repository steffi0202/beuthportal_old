<?php 
/* Verifiziert die E-Mail-Adresse des registrierten Users.
	Der Link zu dieser Seite ist in der register.php-E-Mail-Nachricht
*/
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");
$pdo = new PDO('mysql:host=localhost;dbname=beuthportal', 'root', '');

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) AND isset($_GET['active']))
{
    $email = $_GET['email'];
	$pdo->query("SELECT * FROM users WHERE email = :email");
	
    $hash = $_GET['hash'];
	$pdo->query("SELECT * FROM users WHERE hash = :hash"); 
	
	$active = $_GET['active'];
	$pdo->query("SELECT * FROM users WHERE active = :active"); 
    
    // Wähle User, die ihren Account noch nicht bestätigt haben, mit zugehöriger E-Mail-Adresse und Hash-Wert (active = 0)
		
	$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email AND hash = :hash AND active = :active");
	$result = $statement->execute(array('email' => $email, 'hash' => $hash, 'active' => $active));
	$user = $statement->fetch();

	if($user == 0) {
		echo "<font color='#FF0000'>Dein Account wurde bereits aktiviert oder die URL ist ungültig!<br /><br />
		Versuche dich <a href='login.php'>einzuloggen</a> oder <a href='register.php'>registriere dich neu</a>. <br /><br />
		Zur <a href='../index.php'>Startseite</a></font>";
		$error = true;
	}
    else {
       echo "<font color='#008000'>Dein Account wurde aktiviert!<br /><br />
	   Du kannst dich jetzt <a href='login.php'>einloggen</a></font>";
        
        // Set the user status to active (active = 1)
		$statement = $pdo->prepare("UPDATE users SET active = 1 WHERE email = :email");
		$result = $statement->execute(array('email' => $email));
       // header("location: success.php");
    }
}
else {
    echo "<font color='#FF0000'>Ungültige Parameter für die Verifizierung!<br></font>";
    //header("location: error.php");
}     
?>