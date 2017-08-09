<?php
//$pdo = new PDO('mysql:host=localhost;dbname=beuthportal', 'root', '');
//* Datenbankverbindung aufbauen (START)

$verbindung = mysql_connect ("localhost", "root", "")
or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");

mysql_select_db("beuthportal") or die ("Die Datenbank existiert nicht.");

//* Datenbankverbindung aufbauen (ENDE)
$suche = $_POST['search'];

//* Überprüfung der Eingabe
    $abfrage = "SELECT * FROM ranking WHERE Dozent LIKE '%$suche%' OR Modul LIKE '%$suche%'";
    $ergebnis = mysql_query($abfrage) or die(mysql_error());
    if($ausgabe = mysql_fetch_assoc($ergebnis))
        { echo "".$ausgabe['search'].""; } //* Wenn was gefunden wurde, wird es hier ausgegeben.
    else
        { echo "Es wurde kein Ergebnis unter den Begriff \"<u>$suche</u>\" gefunden.<br />
        Bitte versuche es mit einem anderen Begriff.<br />
        <a href='dashboard.php'>Zur&uuml;ck!</a>";
    }    // * Wenn nichts gefunden wurde, dann kommt diese Fehlermeldung.
?>
