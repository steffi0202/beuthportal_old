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
            <div class="header-content-inner">
                
					<?php 
						/* newthread_script.php */ 
						//Herstellen der MySQL verbindung 
						$verbindung = mysqli_connect ("localhost", "root", "");
						mysqli_select_db($verbindung, "beuthportal");
						$pdo = new PDO('mysql:host=localhost;dbname=beuthportal', 'root', '');

						$text = $_POST["text"]; 
						$topic = $_POST["topic"]; 
						$name = $_POST["name"]; 
						$fid = $_POST["fid"]; 
						
						$statement = $pdo->prepare("INSERT INTO threads (fid, topic) VALUES (:fid, :topic)");
                        $result = $statement->execute(array('fid' => $fid, 'topic' => $topic));


						//nun brauchen wir noch die neue ID des Threads, um sie in answers 
						// einzutragen 
						
						$abfrage = "SELECT max(id) AS max FROM threads";
						$ergebnis = mysqli_query($verbindung, $abfrage) or die(mysqli_error($verbindung));
						
						$res = mysql_query("select max(id) AS max from threads"); 
						$ausgabe = mysqli_fetch_assoc($ergebnis);
						$thread_id = $ausgabe["max"]; 

						//so nun schreiben wir den eigentlichen Beitrag in die DB 
						$statement = $pdo->prepare("INSERT INTO answers (text, topic, user, fid, tid) VALUES (:text, :topic, :user, :fid, :tid)");
                        $result = $statement->execute(array('text' => $text, 'topic' => $topic, 'user' => $name, 'fid' => $fid, 'tid' => $thread_id));

						
						mysql_query("insert into answers set text='$text', topic='$topic', user='$name', fid='$fid', tid='$thread_id', created=now()");

						//Weiterleitung zu der Auflistung der Threads im 
						//bereits ausgewählten Forum 
						header("Location: showthreads.php?fid=".$fid); 
					?>
			</div>
			
			
		</div>
	</header>
</body>
<?php
include("templates/footer.inc.php");
?>
</html>