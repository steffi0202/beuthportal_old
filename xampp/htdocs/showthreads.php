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
						/* showthreads.php */ 
						//Herstellen der MySQL verbindung 
						$verbindung = mysqli_connect ("localhost", "root", "");
						mysqli_select_db($verbindung, "beuthportal");

						$abfrage = "SELECT * FROM threads WHERE fid=".$_GET["fid"];
						$ergebnis = mysqli_query($verbindung, $abfrage) or die(mysqli_error($verbindung));
				
						while($ausgabe = mysqli_fetch_assoc($ergebnis)){
							
							echo "Thread: ".$ausgabe['id']."<br />";
							echo "Forum: ".$ausgabe['fid']."<br />";
							echo "<a href=showanswers.php?fid=".$ausgabe['fid']."&tid=".$ausgabe["id"]."">"; 
							echo $ausgabe["topic"]."</a><br>"; 
						}
					?>
			</div>
			
			
		</div>
	</header>
</body>
<?php
include("templates/footer.inc.php")
?>
</html>