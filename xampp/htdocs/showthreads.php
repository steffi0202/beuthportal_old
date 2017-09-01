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

						$abfrage = "SELECT * FROM threads WHERE fid=".$_GET["id"];
						$ergebnis = mysqli_query($verbindung, $abfrage) or die(mysqli_error($verbindung));
				
						while($ausgabe = mysqli_fetch_assoc($ergebnis)){
					?>
					<div>
						<p>
						<a style="color:black;" href="showanswers.php?fid=<?php echo "".$ausgabe['fid']."&tid=".$ausgabe['id']?>">
						<?php echo "".$ausgabe['topic'].""?>
						</a>
						</p>
					</div>
					<?php
							//echo "Forum: ".$ausgabe['email']."<br />";
							//echo "<font color='#000000'><a href=showthreads.php?fid=".$ausgabe['id'];
							//echo "<br />"."Forum: ".$ausgabe["email"]."</font><br />";
						   // echo "Forum: ".$ausgabe["email"]."<br>"; 
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