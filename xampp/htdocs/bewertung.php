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
<html lang="en">

<body id="page-top">
        </div>
          <!--/.container-fluid-->
     </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Bewerte deinen Studiengang!</h1>
                <hr>
                <p>Bewerte deine Module und Dozenten und erfahre, wie andere Studenten bewertet haben</p>
                <a class="btn btn-primary btn-xl page-scroll" href="#bewerten">Bewerten</a>
            </div>
        </div>
    </header>
    <section class="bg-primary" id="bewerten">

        <div class="container">
            <div class="row">

    <div class="call-to-action">
    <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Bewerte jetzt deinen Studiengang!</h2>
                    <hr class="light">
                    <p class="text-faded">Hilf anderen Studenten und teile deinen Content und deine Erfahrungen zum Studium hier!</p>
<?php
                    $showFormular = true; //Variable ob das Bewertungsformular anezeigt werden soll

                    if(isset($_GET['bewertung']))
                    {
                    	$error = false;
                    	$studiengang = trim($_POST['Studiengang']);
                    	$modul = trim($_POST['Modul']);
                    	$zeit = trim($_POST['Zeitaufwand']);
                      $modul_des = trim($_POST['TextareaModul']);
                    	$dozent = trim($_POST['Dozent']);
                      $dozent_des = trim($_POST['TextareaDozent']);
                      $sterne = trim($_POST['Sterne']);

                      //Keine Fehler, wir können die Daten in die DB schreiben
                      if(!$error) {

                        $statement = $pdo->prepare("INSERT INTO ranking (Studiengang, Modul, Zeitaufwand, Dozent, Modul_des, Dozent_des, Sterne) VALUES (:Studiengang, :Modul, :Zeitaufwand, :Dozent, :TextareaModul, :TextareaDozent, :Sterne)");
                        $result = $statement->execute(array('Studiengang' => $studiengang, 'Modul' => $modul, 'Zeitaufwand' => $zeit, 'Dozent' => $dozent, 'TextareaModul' => $modul_des, 'TextareaDozent' => $dozent_des, 'Sterne' => $sterne));

                        if($result) {
                          echo "<script type='text/javascript'>alert('Die Daten wurden erfolgreich übertragen!')</script>";
                          $showFormular = false;
                          echo "<meta http-equiv='refresh' content='1; URL=dashboard.php'>";
                        } else {
                          echo "<script type='text/javascript'>alert('Beim Abspeichern ist leider ein Fehler aufgetreten!')</script>";
                        }
                      }
                    }

                     if($showFormular) {
?>
                  <script type="text/javascript">

                     function doit() {
                      var selectBox = document.getElementById("Studiengang");
                      var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                      //alert(selectedValue);
                      if(selectedValue == 1) {
                        document.getElementById('v1').style.display='block';
                        document.getElementById('v2').style.display='none';
                      } else {
                        document.getElementById('v1').style.display='none';
                        document.getElementById('v2').style.display='block';
                      }

                     }



                    </script>
                    <form method="post" action="?bewertung">
                    <div class="form-group">
                        <label for="Studiengang">Wähle deinen Studiengang:</label>
                          <select onChange="doit();" id="Studiengang" class="form-control" name="Studiengang">
                                <option >Bitte Modul auswählen</option>
                                 <option value="1" >Wirtschaftsinformatik - Online</option>
                                 <option value="2">Medieninformatik - Online</option>
                     </select>
                     </div>
                     <div id="v1" style="display:none;" class="form-group">
                        <label for="Modul">Wähle dein Modul:</label>
                            <select class="form-control" name="Modul" >
                                 <option>Business Engineering</option>
                                 <option>Operations Research</option>
                                 <option>3</option>
                                 <option>4</option>
                                 <option>5</option>
                            </select>
                     </div>
                     <div id="v2" style="display:none;" class="form-group">
                        <label for="Modul">Wähle dein Modul:</label>
                            <select class="form-control" name="Modul">
                                 <option>Medieninfo1</option>
                                 <option>2</option>
                                 <option>3</option>
                                 <option>4</option>
                                 <option>5</option>
                            </select>
                     </div>

                     <div class="form-group">
                        <label for="Zeitaufwand">Wieviel Stunden hast du pro Woche für das Modul benötigt?</label>
                            <select class="form-control" name="Zeitaufwand">
                                 <option>1</option>
                                 <option>2</option>
                                 <option>3</option>
                                 <option>4</option>
                                 <option>5</option>
                                 <option>>5</option>
                            </select>
                     </div>

                      <div class="form-group">
                        <label for="TextareaModul">Beschreibe das Modul</label>
                            <textarea class="form-control" name="TextareaModul" rows="3"></textarea>
                         </div>
                      <div class="form-group">

                        <label for="Dozent">Wer hat das Modul unterrrichtet:</label>
                            <select class="form-control" name="Dozent">
                                 <option>Prof. Dr. Peter Weimann</option>
                                 <option>Jane Brosnan</option>
                                 <option>3</option>
                                 <option>4</option>
                                 <option>5</option>
                            </select>
                     </div>
                     <div class="form-group">
                        <label for="TextareaDozent">Was ist dir zu deinem Dozenten besondern im Gedächtnis geblieben?</label>
                            <textarea class="form-control" name="TextareaDozent" rows="3"></textarea>
                         </div>
                         <div>
                         <label for="star-rating">Wie viele Sterne bekommt das Modul und der Dozent von dir?</label>
                        <input name="Sterne" id="input-21b" value="4" type="text" class="rating" data-min=0 data-max=5 data-step=0.2 data-size="lg"
                        required title="">
                        <div class="clearfix"></div>
                        <hr>
                        </div>
                        <input type="submit" class="page-scroll btn btn-default btn-xl sr-button" value="bewerten">
                        </form>
                </div>
            </div>
        </div>
    </section>
    <?php
  } //Ende von if($showFormular)

    ?>
    <?php include("templates/footer.inc.php");
     ?>

</body>

</html>
