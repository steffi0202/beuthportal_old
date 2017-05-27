<?php
/* User-Info ausgeben */
session_start();

if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "Bitte zuerst einloggen, um zum Profil zu gelangen!";
  header("location: error.php");    
}
else {
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Willkommen <?= $first_name.' '.$last_name ?></title>
  <?php include 'css/css.html'; ?>
</head>

<body>
  <div class="form">

          <h1>Willkommen</h1>
          
          <p>
          <?php 
     
          // Account-Verifzierungslink nur einmal anzeigen
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];

              unset( $_SESSION['message'] );
          }
          
          ?>
          </p>
          
          <?php
          
          // User-Account ist nicht aktiv, solange er nicht bestätigt wird
          if ( !$active ){
              echo
              '<div class="info">
              Bitte bestätige deinen User-Account, indem du auf den Link der Bestätigungsmail klickst!
              </div>';
          }
          
          ?>
          
          <h2>Schön, dass du da bist, <?php echo $first_name.' '.$last_name; ?></h2>
          <p>Du bist mit folgender E-Mail-Adresse angemeldet: <?= $email ?></p>
          
          <a href="logout.php"><button class="button button-block" name="logout"/>Ausloggen</button></a>

    </div>
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
