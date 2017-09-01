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
		<div class="header-content">
			<div class="header-content-inner">
				<h1 id="homeHeading"><br /><br />Hallo <?php $user = check_user(); echo htmlentities($user['vorname']); ?>!</h1><br />
				<hr>
				<div class="container" style="max-width:100%;">
					<div class="row" style="max-width:100%;">
						<a href="bewertung.php">
							<div class="col-lg-3 col-md-6 text-center" style="max-width:100%;">
								<div class="service-box">
									<i class="fa fa-4x fa-diamond text-primary sr-icons"></i>
									<h3>Studiengang bewerten</h3>
									<p class="text-muted" style="color:white;">Bewerte Module und Dozenten</p>
								</div>
							</div>
						</a>
						<a href="upload.php">
							<div class="col-lg-3 col-md-6 text-center" style="max-width:100%;">
								<div class="service-box">
									<i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>
									<h3>Dokument-Area</h3>
									<p class="text-muted" style="color:white;">Lade z. B. alte Klausuren hoch oder runter</p>
								</div>
							</div>
						</a>
						<a href="mensa.php">
							<div class="col-lg-3 col-md-6 text-center" style="max-width:100%;">
								<div class="service-box">
									<i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>
									<h3>Mensapläne</h3>
									<p class="text-muted" style="color:white;">Die aktuellen Mensa-Speisepläne</p>
								</div>
							</div>
						</a>
						<a href="forum.php">
							<div class="col-lg-3 col-md-6 text-center" style="max-width:100%;">
								<div class="service-box">
									<i class="fa fa-4x fa-heart text-primary sr-icons"></i>
									<h3>Forum</h3>
									<p class="text-muted" style="color:white;">Tausche dich im Forum mit anderen aus</p>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
    </header>
	<div class="container" style="max-width:100%;">
		<div class="row" style="max-width:100%;">
			<div class="call-to-action" style="max-width:100%;">
				<div class="col-lg-8 col-lg-offset-2 text-center" style="max-width:100%;"><br /><br />
					<h2 class="section-heading" style="max-width:100%;">Suche nach Studiengängen, Dozenten und Modulen...</h2>
					<div class="container" style="margin-top:8%; max-width:100%;">
						<form id="search" method="post" action="?search#searchOutput">
							<div class="form-group" style="max-width:100%;">
								<div class="input-group" style="max-width:100%;">
									<input class="form-control"  type="text" name="search" placeholder="Search..." style="max-width:100%;" required/>
									<span class="input-group-btn">
										<button style= "margin-right:0px;" class="btn btn-primary btn-success" type="submit">
											<i class="glyphicon glyphicon-search" aria-hidden="true"></i>Search
										</button>
									</span>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php
	$ergebnis = 0;
	$suchbegriff = '';
    if(isset($_GET['search']))
    {
      //* Datenbankverbindung aufbauen (START)
      $verbindung = mysqli_connect ("localhost", "root", "")
      or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");
      mysqli_select_db($verbindung, "beuthportal") or die ("Die Datenbank existiert nicht.");
      //* Datenbankverbindung aufbauen (ENDE)
      $suchbegriff = $_POST["search"];
      //* Überprüfung der Eingabe
          $abfrage = "SELECT * FROM ranking WHERE Dozent LIKE '%$suchbegriff%' OR  Modul LIKE '%$suchbegriff%' OR  Studiengang LIKE '%$suchbegriff%'";
          $ergebnis = mysqli_query($verbindung, $abfrage) or die(mysqli_error($verbindung));

         while($ausgabe = mysqli_fetch_assoc($ergebnis)){
    ?>
		<div class="list-group">
	  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
	    <div class="d-flex w-100 justify-content-between">
	      <h5 class="mb-1"><b><?php echo "".$ausgabe['Studiengang'].", "?> <?php echo "".$ausgabe['Modul']." bei "?> <?php echo "".$ausgabe['Dozent'].""?></b></h5>
				<h5 class="mb-1"><?php echo "Zeitaufwand: ".$ausgabe['Zeitaufwand']." Stunden pro Woche"?></h5>
				<small><p  class="text-right"><?php echo "".$ausgabe['Sterne']." von 5 Sternen"?></p></small>
				</div>
			<p class="mb-1"><b>Modul: </b><?php echo "".$ausgabe['Modul_des'].""?></p>
	    <p class="mb-1"><b>Dozent/in: </b>	<?php echo " ".$ausgabe['Dozent_des'].""?></p>
	    <small>	<?php echo "".$ausgabe['created_at']." "?></small>
	  </a>
	</div>
	<?php }
}
	 ?>
	<section>
		<div class="container">
			<div class="row">
				<div class="call-to-action">
					<div class="col-lg-8 col-lg-offset-2 text-center"><br /><br />
						<h4 class="section-heading">
						<?php
							if (!empty($_GET) AND !$ergebnis || mysqli_num_rows($ergebnis) == 0) {
							 echo "<font color='#FF0000'>Es wurde kein Ergebnis unter dem Begriff \"<u>$suchbegriff</u>\" gefunden.<br />
							   Bitte versuche es mit einem anderen Begriff.
							   </font>";
							   //<a href='dashboard.php'>Zurueck!</a>
							 }    // * Wenn nichts gefunden wurde, dann kommt diese Fehlermeldung.*/

						?>
						</h4>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
<?php
include("templates/footer.inc.php")
?>

</html>
