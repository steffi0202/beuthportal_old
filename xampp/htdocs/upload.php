<?php
session_start();
require_once("register/inc/config.inc.php");
require_once("register/inc/functions.inc.php");
include("templates/header.inc.php");
$pdo = new PDO('mysql:host=localhost;dbname=beuthportal', 'root', '');
$user = check_user();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
	<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
	<script src="js/btn_upload.js"></script>
</head>

<body id="page-top">
    <header>
		<center>
        <div class="header-content">
            <div class="header-content-inner">
				<div class="container main-container" style="text-align:center; font-size:120%; max-width:100%;">				
					<h2>Upload-Area</h2>
					<br />
					<div class="container" style="width: 550px">	 
						<form method="post" enctype="multipart/form-data">
							<button class="browse btn btn-primary pull-left" type="button"><i class="glyphicon glyphicon-search"></i> Browse </button>
							<input style="width: 400px;" type="text" class="form-control pull-left" disabled placeholder="Dein Upload, max. 25 MByte">
							<input type="file" name="userfile" id="userfile" style="visibility: hidden;" class="click">
							<label class="pull-left" for="Modulup">Für welches Studienfach ist der Upload?</label>
								<select class="form-control pull-left" name="Modulup" style="width: 500px;">
									 <option></option>
									 <?php 
										$sql = "SELECT studienfach_name FROM studienfach order by 1 ASC";
										foreach ($pdo->query($sql) as $row) {
											echo "<option>" .$row['studienfach_name']. "</option>";
										}
									  ?>
								</select>
							<input name="upload" type="submit" class="box btn btn-success" id="upload" value=" Upload " style="width: 100px" >
						</form>
					</div>
					<br />
					<br />
					<h2 >Download-Area</h2>
					<br />
					<div class="container" style="width: 40%">
						<form method="get" enctype="text/plain">
							<label style="width: 300px" for="Moduldown">Welches Fach interessiert dich?</label>
							<p><select style="width: 230px" class="form-control" name="Moduldown" onchange="this.form.submit()"></p>
							<option></option>
							<?php 
								$sql = "SELECT DISTINCT(studienfach) FROM upload order by 1 ASC";
								foreach ($pdo->query($sql) as $row) {
									echo "<option>" .$row['studienfach']. "</option>";
								}
							?>
							</select>
						</form>
					</div>
				</div>
			</div>
			<?php 
				if(isset($_GET['Moduldown'])){
					echo "<div style ='font:16px Arial,tahoma,sans-serif;color:#40FF00'>Deine Suchergebnisse werden unten angezeigt:</div>";
				}
			?>
        </div>
		</center>
	
	</header> 

	<?php

/*

	Upload into mysqlDB

*/


if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0 && $_POST['Modulup'] != "" )
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];
$studienfach = trim($_POST['Modulup']);

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}

$statement = $pdo->prepare("INSERT INTO upload (name, size, type, content, studienfach) "."VALUES ('$fileName', '$fileSize', '$fileType', '$content', '$studienfach')");
$result = $statement->execute(array('name' => $fileName, 'size' => $fileSize, 'type' => $fileType, 'content' => $content , 'studienfach' => $studienfach));

	# Erfolgreicher Upload

	echo '<meta http-equiv="refresh" content="0; url=http://localhost/upload.php">';
	
	echo "<script type='text/javascript'>alert('Die Daten wurden erfolgreich übertragen!')</script>";


} elseif (isset($_POST['upload']) && $_FILES['userfile']['size'] >= 26214400) {

	# Fehlermeldung für Dateien über 25 MB.

	echo "<script type='text/javascript'>alert('Die Datei ist leider zu groß!')</script>";

} elseif (isset($_POST['upload']) && $_POST['Modulup'] == "") {
	
	# Fehlermeldung wenn kein Studienfach für den Upload angegeben wurde.

	echo "<script type='text/javascript'>alert('Du hast vergessen ein Studienfach zu benennen für den Upload!')</script>";

} elseif (isset($_POST['upload']) && $_FILES['userfile']['size'] == 0) {

	# Fehlermeldung wenn keine Datei Ausgewählt wurde!

	echo "<script type='text/javascript'>alert('Du hast vergessen eine Datei zu wählen!')</script>";

}



/*

	Genereting Download-Links from mysql saved Files

*/


if(isset($_GET['Moduldown'])){

	$studienfach = trim($_GET['Moduldown']);


	// Datum mit Uhrzeit--> DATE_FORMAT(Datum, '%d.%m.%Y %H:%i:%s')

	$sql = "SELECT id, name, studienfach, ROUND((size/1024/1024),2) as filesize, DATE_FORMAT(Datum, '%d.%m.%Y') AS Datum FROM upload where Studienfach = '$studienfach'";

	   		echo "<center><table style=\" font-family: arial, sans-serif;border-collapse: collapse;width: 50%; \"><tr style=\"background-color: #dddddd; :nth-child(even); \">
	    			<th style=\"border: 1px solid #dddddd; text-align: left; padding: 8px; \">Studienfach</th>
	    			<th style=\"border: 1px solid #dddddd; text-align: left; padding: 8px; \">Datei</th>
	    			<th style=\"border: 1px solid #dddddd; text-align: left; padding: 8px; \">Größe</th>
	    			<th style=\"border: 1px solid #dddddd; text-align: left; padding: 8px; \">Datum</th>
  				</tr>";

	foreach ($pdo->query($sql) as $row) {
   		  		
  		echo "<tr><td style=\"border: 1px solid #dddddd; text-align: left; padding: 8px; \">" .$row['studienfach']. 
  		
  		"</td><td style=\"border: 1px solid #dddddd; text-align: left; padding: 8px;width: 400px \"> <a href=\"download.php?id=".$row['id']."\"> ".$row['name']." </a>

  		<td style=\"border: 1px solid #dddddd; text-align: left; padding: 8px; \">" .$row['filesize']. " MByte </td>

  		<td style=\"border: 1px solid #dddddd; text-align: left; padding: 8px; \">" .$row['Datum']. " </td><tr>";
 		
	}
	echo "</table></center>";
}

?>


</body>
<?php
include("templates/footer.inc.php")
?>
</html>