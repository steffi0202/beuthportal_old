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
				
					<div style="width:100%;" >
					
						<a style="background-color:grey;color:white;font-size:large;" href="forum.php#forum"><u>Zurück zur Forenübersicht</u></a>
						<br />
						<br />
						
						<?php 
						$verbindung = mysqli_connect ("localhost", "root", "");
						mysqli_select_db($verbindung, "beuthportal");

						$abfrage = "SELECT * FROM foren WHERE id=".$_GET["id"];
						$ergebnis = mysqli_query($verbindung, $abfrage) or die(mysqli_error($verbindung));
						$ausgabe = mysqli_fetch_assoc($ergebnis);
						echo "<b><font size='18' face='Arial' color='white'>".$ausgabe['name']."</font></b><br />";
					?>
					</div>
					<br />
					<br />
					<?php 
						/* showthreads.php */ 
						//Herstellen der MySQL verbindung 
						$verbindung = mysqli_connect ("localhost", "root", "");
						mysqli_select_db($verbindung, "beuthportal");

						$abfrage = "SELECT * FROM threads WHERE fid=".$_GET["id"];
						$ergebnis = mysqli_query($verbindung, $abfrage) or die(mysqli_error($verbindung));
						$threadNummer = 1;
						while($ausgabe = mysqli_fetch_assoc($ergebnis)){
					?>
					<div>
						<p>
						<a style="color:black;" href="showanswers.php?fid=<?php echo "".$ausgabe['fid']."&tid=".$ausgabe['id']?>">
						<?php echo "Thema #".$threadNummer.": <b>".$ausgabe['topic']."</b> - Gestartet von ".$ausgabe['ersteller']." am ".$ausgabe['created'].""?>
						</a>
						
						</p>
					</div>
					<?php
							//echo "Forum: ".$ausgabe['email']."<br />";
							//echo "<font color='#000000'><a href=showthreads.php?fid=".$ausgabe['id'];
							//echo "<br />"."Forum: ".$ausgabe["email"]."</font><br />";
						   // echo "Forum: ".$ausgabe["email"]."<br>"; 
						   $threadNummer++;
						} 
					//print_r($_GET);
					?>
					<br />
					<p>
						<a class="btn btn-primary btn-xl" href="newthread.php?fid=<?php 
						$verbindung = mysqli_connect ("localhost", "root", "");
						mysqli_select_db($verbindung, "beuthportal");

						$abfrage = "SELECT * FROM foren WHERE id=".$_GET["id"];
						$ergebnis = mysqli_query($verbindung, $abfrage) or die(mysqli_error($verbindung));
						$ausgabe = mysqli_fetch_assoc($ergebnis);
						echo "".$ausgabe['id']?>">
						Neuen Thread eröffnen
						</a>
						
					</p>
					<br />
					<br />
					<div style="width:100%;" >
						<a style="background-color:grey;color:white;font-size:large;" href="forum.php#forum"><u>Zurück zur Forenübersicht</u></a>
					</div>
			</div>	
			<br />
			<br />
			

</body>
<?php
include("templates/footer.inc.php");
?>
</html>