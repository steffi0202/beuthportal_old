<?php
/* Passwort zurücksetzen */
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    // Passwörter müssen übereinstimmen
    if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) { 

        $new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
        
        //$_POST['email'] und $_POST['hash'] aus reset.php Formular
        $email = $mysqli->escape_string($_POST['email']);
        $hash = $mysqli->escape_string($_POST['hash']);
        
        $sql = "UPDATE users SET password='$new_password', hash='$hash' WHERE email='$email'";

        if ( $mysqli->query($sql) ) {

        $_SESSION['message'] = "Dein Passwort wurde zurückgesetzt!";
        header("location: success.php");    

        }

    }
    else {
        $_SESSION['message'] = "Die beiden eingegebenen Passwörter stimmen nicht überein!";
        header("location: error.php");    
    }

}
?>