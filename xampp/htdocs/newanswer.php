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
				<form action="newanswer_script.php" method="post"> 
				  <fieldset>
					<legend style="color:white;">Neue Antwort zum Thread "
					
					<?php 
						
						$verbindung = mysqli_connect ("localhost", "root", "");
						mysqli_select_db($verbindung, "beuthportal");

						$abfrage = "SELECT * FROM threads WHERE id=".$_GET["fid"];
						$ergebnis = mysqli_query($verbindung, $abfrage) or die(mysqli_error($verbindung));
				
						$ausgabe = mysqli_fetch_assoc($ergebnis);
						echo "".$ausgabe['topic']."";
						
					?>
					
					" verfassen
					</legend>
					<div>
						
						<input type="hidden" id="fid" name="fid" value="<?php echo $_GET["fid"];?>">
						<input type="hidden" id="tid" name="tid" value="<?php echo $_GET["tid"];?>">
						<input type="hidden" id="ersteller" name="ersteller" value="<?php echo $user['vorname']." ".$user['nachname'];?>">
					</div>
					<br />
					<div>  					
						<textarea id="text" name="text" cols="70" rows="15" style="color:#000000;"></textarea> 
							<br />
						<input type="submit" value="Antworten" class="btn btn-primary btn-xl"/>
					</div> 
									
						
					</fieldset>
				</form> 
				
				
			
				
			</div>
			
			
		</div>
	</header>
</body>
<?php
include("templates/footer.inc.php");
?>
</html>