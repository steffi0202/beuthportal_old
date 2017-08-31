<!DOCTYPE html>
<html lang="en">

<head>
<!--meta http-equiv="refresh" content="5; URL=../index.php"-->
</head>
<body>
<?php
session_start();
session_destroy();
unset($_SESSION['userid']);

//Remove Cookies
setcookie("identifier","",time()-(3600*24*365));
setcookie("securitytoken","",time()-(3600*24*365));

require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

include("../templates/header.inc.php");
?>

<div class="container main-container" style="text-align:center; font-size:120%;">
<br /> <br />
Dein Logout war erfolgreich.
<br /> <br />
<a href="../index.php">Zurück zur Startseite</a>
<!--Du wirst in 5 Sekunden zur Startseite weitergeleitet.-->
<br /> <br />
</div>
<?php
include("../templates/footer.inc.php")
?>
</body>
</html>
