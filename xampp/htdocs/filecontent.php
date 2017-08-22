<?php
session_start();
//require_once("inc/config.inc.php");
require_once("register/inc/config.inc.php");
require_once("register/inc/functions.inc.php");

include("templates/header.inc.php");
$pdo = new PDO('mysql:host=localhost;dbname=beuthportal', 'root', '');

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein

?>
<?php
$user = check_user();
?>


<!DOCTYPE html>
<html>



<body id="page-top">
        </div>
          <!--/.container-fluid-->
     </nav>

     <center>
    <br/>
    <br/>
    <br/>
    <br/>
    <p><h2>Wähle deinen Upload aus!</h2></p>
    <br/>
    <br/>

    <form action="upload.php" method="post" enctype="multipart/form-data">

    <label class="btn btn-primary">Browse ... <input type="file" name="fileToUpload" id="fileToUpload" style="display: none;"></label>
    <p></p>
    <input type="submit" value="Upload" class="btn btn-success">

    </form>
    <br/>
    
    <span id=message></span>

    <br/>
    
    <br/>

    <div id="download">

      <table>
        <thead>
          <th>Dateiname </th>
          <th>Download </th>
        </thead>
        <tbody>
          <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script src="/js/global.js">   </script>
        </tbody>
      </table>

    </div>

</center>

</body>
</html>
