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
                <a class="btn btn-primary btn-xl page-scroll" href="#forum">Zum Forum</a>
            </div>
        </div>
    </header>
	<section class="bg-primary" id="forum"> <div class="container">
		<div class="row">
			<div class="call-to-action">
				<div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Forum</h2>
                    <hr class="light">
                    <p class="text-faded">Tausche dich mit anderen Studenten der Beuth-Hochschule aus.</p>
					<?php 
						$verbindung = mysqli_connect ("localhost", "root", "");
						mysqli_select_db($verbindung, "beuthportal");

						$abfrage = "SELECT * FROM foren";
						$ergebnis = mysqli_query($verbindung, $abfrage) or die(mysqli_error($verbindung));

						while($ausgabe = mysqli_fetch_assoc($ergebnis)){
						
							echo "Forum: ".$ausgabe['name']."<br />";
							echo "<a href=showthreads.php?fid=".$ausgabe['id'].""; 
						    echo $ausgabe["name"]."</a><br>"; 
						} 
					?>
					

				</div>
			</div
			<form method="post" action="?forum"></form>
		</div>
	</section>
</body>
<?php
include("templates/footer.inc.php")
?>
</html>