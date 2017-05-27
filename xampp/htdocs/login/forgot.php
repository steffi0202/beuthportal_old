<?php 
/* Passwort zurücksetzen, sendet Passwort-Link aus reset.php */
require 'db.php';
session_start();

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{   
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    if ( $result->num_rows == 0 ) // User existiert nicht
    { 
        $_SESSION['message'] = "E-Mail-Adresse unbekannt!";
        header("location: error.php");
    }
    else { // User existiert

        $user = $result->fetch_assoc();
        
        $email = $user['email'];
        $hash = $user['hash'];
        $first_name = $user['first_name'];

        // Session-Message ausgeben auf success.php
        $_SESSION['message'] = "<p>Bitte ueberpruefe dein E-Mail-Postfach: <span>$email</span>"
        . "Dort findest du einen Link, mit dem du dein Passwort zuruecksetzen kannst</p>";

        // Bestätigungslink schicken (reset.php)
        $to      = $email;
        $subject = 'Passwort zuruecksetzen (beuthportal.de)';
        $message_body = '
        Hallo '.$first_name.',

		mit einem Klick auf den folgenden Link setzt du dein Passwort zurueck:

        http://localhost/login/reset.php?email='.$email.'&hash='.$hash;  

        mail($to, $subject, $message_body);

        header("location: success.php");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Passwort zurücksetzen</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    
  <div class="form">

    <h1>Passwort zurücksetzen</h1>

    <form action="forgot.php" method="post">
     <div class="field-wrap">
      <label>
        E-Mail-Adresse<span class="req">*</span>
      </label>
      <input type="email"required autocomplete="off" name="email"/>
    </div>
    <button class="button button-block"/>Jetzt Passwort zurücksetzen</button>
    </form>
  </div>
          
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
</body>

</html>
