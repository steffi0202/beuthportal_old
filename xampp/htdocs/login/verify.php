<?php 
/* Verifizierung der User-E-Mail-Adresse
*/
require 'db.php';
session_start();

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 
    
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash' AND active='0'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "Useraccount wurde bereits aktiviert oder die URL ist ungueltig!";

        header("location: error.php");
    }
    else {
        $_SESSION['message'] = "Dein Useraccount wurde aktiviert!";
        
        // Userstatus auf aktiv setzen (active = 1)
        $mysqli->query("UPDATE users SET active='1' WHERE email='$email'") or die($mysqli->error);
        $_SESSION['active'] = 1;
        
        header("location: success.php");
    }
}
else {
    $_SESSION['message'] = "Ungültige Parameter für Useraccount-Verifizierung!";
    header("location: error.php");
}     
?>