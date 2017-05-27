<?php
/* Logout */
session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Logout</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    <div class="form">
          <h1>Tschüß, bis bald...</h1>
              
          <p><?= 'Du hast dich ausgeloggt!'; ?></p>
          
          <a href="index.php"><button class="button button-block"/>Startseite</button></a>

    </div>
</body>
</html>
