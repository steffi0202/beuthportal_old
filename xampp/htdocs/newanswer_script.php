<?php 
session_start();
require_once("register/inc/config.inc.php");
require_once("register/inc/functions.inc.php");
//include("templates/header.inc.php");
$user = check_user();
?>
<!DOCTYPE html>
<html lang="en">

<body id="page-top">
    <header>
        <div class="header-content" style="max-width:100%;">
            <div class="header-content-inner">
                
					<?php 
						/* newthread_script.php */ 
						//Herstellen der MySQL verbindung 
						$verbindung = mysqli_connect ("localhost", "root", "");
						mysqli_select_db($verbindung, "beuthportal");
						
						$pdo = new PDO('mysql:host=localhost;dbname=beuthportal', 'root', '');

						$fid = $_POST["fid"]; 
						$tid = $_POST["tid"]; 
						//$topic = $_POST["topic"]; 
						$text = $_POST["text"]; 
						$ersteller = $_POST["ersteller"]; 
					
						
						$abfrage = "SELECT max(id) AS max FROM threads";
						$ergebnis = mysqli_query($verbindung, $abfrage) or die(mysqli_error($verbindung));
						
						
						$ausgabe = mysqli_fetch_assoc($ergebnis);
						$thread_id = $ausgabe["max"]; 

						//so nun schreiben wir den eigentlichen Beitrag in die DB 
						$statement = $pdo->prepare("INSERT INTO answers (text, user, fid, tid) VALUES (:text, :user, :fid, :tid)");
                        $result = $statement->execute(array('text' => $text, 'user' => $ersteller, 'fid' => $fid, 'tid' => $tid));

					
						//Weiterleitung zu der Auflistung der Threads im 
						//bereits ausgewählten Forum 
						
						header("Location: showanswers.php?fid=".$_POST["fid"]."&tid=".$_POST["tid"]); 
						//print_r($_POST);
						
					?>
			</div>
			
			
		</div>
	</header>
</body>
<?php
include("templates/footer.inc.php");
?>
</html>