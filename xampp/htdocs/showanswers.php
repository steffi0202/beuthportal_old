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
    
 
                <div align="center" style="background-color:grey;padding-top:100px;">
				<?php 
						/* showanswers.php */ 
						//Herstellen der MySQL verbindung 
						$verbindung = mysqli_connect ("localhost", "root", "");
						mysqli_select_db($verbindung, "beuthportal");
						
						//print_r($_GET);
						
						//Ursprungsbeitrag vom Threadstarter ausgeben
						$abfrage = "SELECT * FROM threads WHERE fid=".$_GET["fid"]." AND id=".$_GET["tid"];
						$ergebnis = mysqli_query($verbindung, $abfrage) or die(mysqli_error($verbindung));
						
						while($ausgabe = mysqli_fetch_assoc($ergebnis)){
							$text = nl2br($ausgabe["text"]);
							echo "<p>"; 
							//echo "<u>Ursprungsbeitrag:</u><br />";
							echo "<b>Thema: ".$ausgabe['topic']."</b><br />"; 
							echo "Gestartet von: ".$ausgabe['ersteller']."<br />"; 
							echo "Am: ".$ausgabe['created']."<br />";							
							echo "<i>\"".$text."\"</i><br />"; 
							echo "</p>";
						}
						
						//Alle Antworten darauf ausgeben 
						$abfrage = "SELECT * FROM answers WHERE fid=".$_GET["fid"]." AND tid=".$_GET["tid"];
						$ergebnis = mysqli_query($verbindung, $abfrage) or die(mysqli_error($verbindung));
						
						$antwortNummer = 1;
						while($ausgabe = mysqli_fetch_assoc($ergebnis)){
							$text = nl2br($ausgabe["text"]);
							
							echo "<p>"; 
							echo "<u>Antwort #".$antwortNummer."</u><br />";
							echo "Von: ".$ausgabe['user']."<br />"; 
							echo "Am: ".$ausgabe['created']."<br />";
							//echo "<b>Betreff: ".$ausgabe['topic']."</b><br />"; 
							echo "<i>\"".$text."\"</i><br />"; 
							echo "</p>";
							$antwortNummer++;
						}
				?>
				
				<p>
										
						<a class="btn btn-primary btn-xl" href="newanswer.php?fid=<?php 
						$verbindung = mysqli_connect ("localhost", "root", "");
						mysqli_select_db($verbindung, "beuthportal");

						$abfrage = "SELECT * FROM threads WHERE fid=".$_GET["fid"]." AND id=".$_GET["tid"];
						$ergebnis = mysqli_query($verbindung, $abfrage) or die(mysqli_error($verbindung));
						$ausgabe = mysqli_fetch_assoc($ergebnis);
						echo "".$ausgabe['fid']."&tid=".$ausgabe['id'];?>">												
						Neue Antwort schreiben
						</a>
				</p>
			
				<br />
				<div style="width:100%;" >
					<a style="background-color:grey;color:white;font-size:large;" href="showthreads.php?id=<?php 
					echo "".$_GET["fid"].""?>"><u>Zurück zur Threadübersicht</u></a>
				</div>
				<br />
				<br />
					<div style="width:100%;" >
						<a style="background-color:grey;color:white;font-size:large;" href="forum.php#forum"><u>Zurück zur Forenübersicht</u></a>
					</div>
			
		</div>

</body>
<?php
include("templates/footer.inc.php");
?>
</html>