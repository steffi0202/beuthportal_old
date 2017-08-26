<?php
session_start();
//require_once("inc/config.inc.php");
require_once("register/inc/config.inc.php");
require_once("register/inc/functions.inc.php");
include("templates/header.inc.php");

$pdo = new PDO('mysql:host=localhost;dbname=beuthportal', 'root', '');

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();



// Prepare DB with table upload
$pdo->exec("CREATE TABLE upload (id INT NOT NULL AUTO_INCREMENT,name VARCHAR(255) NOT NULL,type VARCHAR(50) NOT NULL,size INT NOT NULL,content MEDIUMBLOB NOT NULL,studienfach VARCHAR(50) NOT NULL, PRIMARY KEY(id));");


?>

<!DOCTYPE html>
<html>
<body>

<center>

	<h2 >Upload-Area</h2>
	<br>
	<form method="post" enctype="multipart/form-data">
	<table style=" font-family: arial, sans-serif;border-collapse: collapse;">
	<tr>
	<td style="border: 0px solid #dddddd; text-align: left; padding: 8px;"">
	<input type="hidden" name="MAX_FILE_SIZE" value="52428800">
	<input name="userfile" type="file" id="userfile">  Max. 8 MByte
	</td>
	<td style="border: 0px solid #dddddd; text-align: left; padding: 8px; width: 200px;">	
	<div class="form-group">
	<label for="Modulup">Für welches Studienfach ist der Upload?</label>
	    <select class="form-control" name="Modulup">
	         <option></option>
	         <option>Business Engineering</option>
	         <option>Operations Research</option>
	    </select>
	</div>
	</td>
	<td style="border: 0px solid #dddddd; text-align: left; padding: 8px; width:80px";><input name="upload" type="submit" class="box" id="upload" value=" Upload " ></td>
	</tr>
	</table>
	</form>
<br>
<br>
<br>



<h2 >Download-Area</h2>
<br>
	
	<form method="get" enctype="text/plain">
	<label style="width: 300px" for="Moduldown">Welches Fach interessiert dich?</label>
	    <select style="width: 10%" class="form-control" name="Moduldown" onchange="this.form.submit()">
	         <option> </option>
	         <option>Business Engineering</option>
	         <option>Operations Research</option>
	    </select>
	</form>

</center>
</body>
</html>

 
<?php

/*

	Check ob Tabelle vorhanden

*/










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

	echo "<script type='text/javascript'>alert('Die Daten wurden erfolgreich übertragen!')</script>";

}



/*

	Genereting Download-Links from mysql saved Files

*/


if(isset($_GET['Moduldown'])){

	$studienfach = trim($_GET['Moduldown']);


	$sql = "SELECT id, name, studienfach, ROUND((size/1024/1024),2) as filesize FROM upload where Studienfach = '$studienfach'";

	   		echo "<center><table style=\" font-family: arial, sans-serif;border-collapse: collapse;width: 50%; \"><tr style=\"background-color: #dddddd; :nth-child(even); \">
	    			<th style=\"border: 1px solid #dddddd; text-align: left; padding: 8px; \">Studienfach</th>
	    			<th style=\"border: 1px solid #dddddd; text-align: left; padding: 8px; \">Datei</th>
	    			<th style=\"border: 1px solid #dddddd; text-align: left; padding: 8px; \">Größe</th>
  				</tr>";

	foreach ($pdo->query($sql) as $row) {
   		  		

  		echo "<tr><td style=\"border: 1px solid #dddddd; text-align: left; padding: 8px; \">" .$row['studienfach']. 
  		
  		"</td><td style=\"border: 1px solid #dddddd; text-align: left; padding: 8px;width: 60% \"> <a href=\"download.php?id=".$row['id']."\"> ".$row['name']." </a>

  		<td style=\"border: 1px solid #dddddd; text-align: left; padding: 8px; \">" .$row['filesize']. " MByte </td></tr>";

   		//echo $row['studienfach']." <a href=\"download.php?id=".$row['id']."\"> ".$row['name']." </a> " .$row['filesize']. " MByte <br />";


  		

	}
	echo "</table></center>";
}

?>