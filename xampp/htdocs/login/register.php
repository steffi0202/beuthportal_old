<?php
/* Registrierung */

// Sessionvariablen für profile.php
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];

// $_POST gegen SQL-Injections schützen
$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
      
// Gibt es die E-Mail bereits?
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

// Wenn ja
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'Diese E-Mail-Adresse wurde bereits registriert!';
    header("location: error.php");
    
}
else { // Wenn nein

    $sql = "INSERT INTO users (first_name, last_name, email, password, hash) " 
            . "VALUES ('$first_name','$last_name','$email','$password', '$hash')";

    // User in Datenbank einfügen
    if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 0; //0 solange bis er seinen Account bestätigt (verify.php)
        $_SESSION['logged_in'] = true; // User ist eingeloggt
        $_SESSION['message'] =
                
                 "Ein Bestätigungslink wurde an $email verschickt,
                 bitte bestätige deine Registrierung durch einen Klick auf den Bestätigungslink!";
        $to      = $email;
        $subject = 'Bestaetigung der Registrierung (beuthportal.de)';
        $message_body = '
        Hallo '.$first_name.',

        danke fuer deine Registrierung beim Studentenportal der Beuth-Hochschule!

        Mit einem Klick auf den folgenden Link bestaetigst du deine Registrierung
		(falls der Link nicht korrekt angezeigt wird, kopiere ihn und fuege ihn in deinem Browser ein):

        http://localhost/login/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );

        header("location: profile.php"); 

    }

    else {
        $_SESSION['message'] = 'Registrierung fehlgeschlagen!';
        header("location: error.php");
    }

}