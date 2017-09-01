<?php 
session_start();
require_once("register/inc/config.inc.php");
require_once("register/inc/functions.inc.php");
include("templates/header.inc.php");
$user = check_user();
?>
<!DOCTYPE html>
<html lang="en">

<body id="page-top">
    <header>
        <div class="header-content" style="max-width:100%;">
            <div class="header-content-inner" style="background-color:grey;">
                
				<?php 
						/* showanswers.php */ 
						//Herstellen der MySQL verbindung 
						$verbindung = mysqli_connect ("localhost", "root", "");
						mysqli_select_db($verbindung, "beuthportal");

						$abfrage = "SELECT * FROM answers WHERE fid=".$_GET["fid"]." AND tid=".$_GET["tid"];
						$ergebnis = mysqli_query($verbindung, $abfrage) or die(mysqli_error($verbindung));
						
						//ausgeben 
						while($ausgabe = mysqli_fetch_assoc($ergebnis)){
							$text = nl2br($ausgabe["text"]);
							echo "<p>"; 
							echo "Antwort #: ".$ausgabe['id']."<br />";
							echo "Von: ".$ausgabe['user']."<br />"; 
							echo "Am: ".$ausgabe['created']."<br /><br />";
							echo "Betreff: ".$ausgabe['topic']."<br /><br />"; 
							echo "Beitrag: ".$text."<br />"; 
							echo "</p>";
						}
				?>
			</div>
			
			
		</div>
	</header>
</body>
<?php
include("templates/footer.inc.php");
?>
</html>