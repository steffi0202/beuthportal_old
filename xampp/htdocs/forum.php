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
                <h1 id="homeHeading">Forum</h1>
                <hr>
                <p>Tausche dich mit anderen Studenten der Beuth-Hochschule aus.</p>
                <a class="btn btn-primary btn-xl page-scroll" href="#forum">Zu den Foren</a>
            </div>
        </div>
    </header>
	<section class="bg-primary" id="forum"> 
	<div class="container">
		<div class="row">
			<div class="call-to-action">
				<div class="col-lg-8 col-lg-offset-2 text-center">
					<p>Folgende Foren sind vorhanden:</p>
					<?php 
						$verbindung = mysqli_connect ("localhost", "root", "");
						mysqli_select_db($verbindung, "beuthportal");

						$abfrage = "SELECT * FROM foren";
						$ergebnis = mysqli_query($verbindung, $abfrage) or die(mysqli_error($verbindung));

						while($ausgabe = mysqli_fetch_assoc($ergebnis)){
					?>
					<div>
						<p>
						<a class="btn btn-primary btn-xl" style="color:black;" href="showthreads.php?id=<?php echo "".$ausgabe['id'].""?>">
							<?php echo "".$ausgabe['name'].""?>						
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
			</div>
			<form method="post" action="?forum"></form>
		</div>
	</div>
	</section>
	
	
</body>
<?php
include("templates/footer.inc.php")
?>
</html>