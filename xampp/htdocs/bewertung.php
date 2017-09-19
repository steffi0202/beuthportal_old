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

<body id="page-top">
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
                    	$semester = trim($_POST['Semester']);
                    	$zeit = trim($_POST['Zeitaufwand']);
                      $modul_des = trim($_POST['TextareaModul']);
                    	$dozent = trim($_POST['Dozent']);
                      $dozent_des = trim($_POST['TextareaDozent']);
                      $sterne = trim($_POST['Sterne']);

                      //Keine Fehler, wir können die Daten in die DB schreiben
                      if(!$error) {

                        $statement = $pdo->prepare("INSERT INTO ranking (Studiengang, Modul, Semester, Zeitaufwand, Dozent, Modul_des, Dozent_des, Sterne) VALUES (:Studiengang, :Modul, :Semester, :Zeitaufwand, :Dozent, :TextareaModul, :TextareaDozent, :Sterne)");
                        $result = $statement->execute(array('Studiengang' => $studiengang, 'Modul' => $modul, 'Semester' => $semester, 'Zeitaufwand' => $zeit, 'Dozent' => $dozent, 'TextareaModul' => $modul_des, 'TextareaDozent' => $dozent_des, 'Sterne' => $sterne));

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
                      if(selectedValue == 'Wirtschaftsinformatik - Online') {
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
                                <option >Bitte Studiengang auswählen</option>
                                 <option value="Wirtschaftsinformatik - Online" >Wirtschaftsinformatik - Online</option>
                                 <option value="Medieninformatik - Online">Medieninformatik - Online</option>
                     </select>
                     </div>
                     <div id="v1" style="display:none;"  class="form-group">
                        <label for="Modul">Wähle dein Modul:</label>
                            <select class="form-control" name="Modul" >
                                 <option>Einführung in die Betriebswirtschaftslehre 1</option>
                                 <option>Einführung in die Wirtschaftsinformatik</option>
                                 <option>English for Computer Scientists</option>
                                 <option>Grundlagen der Mathematik</option>
                                 <option>Grundlagen der Programmierung 1</option>
                                 <option>Kommunikation, Führung und Selbstmanagement</option>
                                 <option>Grundlagen der Programmierung 2</option>
                                 <option>Einführung in die Betriebswirtschaftslehre 2</option>
                                 <option>Grundlagen betrieblicher Anwendungssysteme</option>
                                 <option>Organisationslehre</option>
                                 <option>Rechnernetze</option>
                                 <option>Mensch-Computer-Kommunikation</option>
                                 <option>Algorithmen und Datenstrukturen</option>
                                 <option>Datenbanken</option>
                                 <option>Internettechnologie / Client/Server</option>
                                 <option>Projektmanagement</option>
                                 <option>Wirtschaftsstatistik</option>
                                 <option>IT-Recht</option>
                                 <option>Business Engineering</option>
                                 <option>Einführung in wissenschaftliche Projektarbeit</option>
                                 <option>Kosten- und Erlösrechnung</option>
                                 <option>Operations Research</option>
                                 <option>Softwaretechnik</option>
                                 <option>Wirtschaftsinformatik-Projekt</option>
                                 <option>Wirtschaftsrecht</option>
                                 <option>Softwaretechnik-Projekt</option>
                                 <option>Business Intelligence</option>
                                 <option>Informationsmanagement</option>
                                 <option>Wirtschaftsinformatik-Workshop</option>
                                 <option>WP: Grundlagen der IT-Sicherheit</option>
                                 <option>WP: Kommunikationsnetze</option>
                                 <option>WP: Controlling</option>
                                 <option>WP: Marketing</option>
                                 <option>WP: Rich Media Anwendungen</option>
                                 <option>WP: Unternehmensplanspiel</option>
                                 <option>WP: Business English</option>


                            </select>
                     </div>
                     <div id="v2" style="display:none;" class="form-group">
                        <label for="Modul">Wähle dein Modul:</label>
                            <select class="form-control" name="Modul">
                                 <option>Computerarchitektur und Betriebssysteme</option>
                                 <option>Einführung in die Informatik</option>
                                 <option>Grundlagen der Programmierung 1</option>
                                 <option>Kommunikation, Führung und Selbstmanagement</option>
                                 <option>Lineare Algebra</option>
                                 <option>Mediendesign 1</option>
                                 <option>Grundlagen der Programmierung 2</option>
                                 <option>Kommunikationsnetze 1</option>
                                 <option>Mediendesign 2</option>
                                 <option>Mensch-Computer-Kommunikation</option>
                                 <option>Relationen und Funktionen</option>
                                 <option>Theoretische Informatik</option>
                                 <option>Algorithmen und Datenstrukturen</option>
                                 <option>Computergrafik 1</option>
                                 <option>Datenbanken</option>
                                 <option>IT-Recht</option>
                                 <option>Multimediatechnik</option>
                                 <option>Web-Programmierung</option>
                                 <option>Betriebswirtschaftslehre</option>
                                 <option>Einführung in wissenschaftliche Projektarbeit</option>
                                 <option>Grundlagen IT-Sicherheit</option>
                                 <option>Internet-Anwendungen für mobile Geräte</option>
                                 <option>Internetserver-Programmierung</option>
                                 <option>Softwaretechnik</option>
                                 <option>Pattern und Frameworks</option>
                                 <option>Praxisprojekt</option>
                                 <option>Informationsmanagement</option>
                                 <option>WP: Anforderungsanalyse und Modellierung</option>
                                 <option>WP: Ausgewählte Kapitel zu Betriebssystemen</option>
                                 <option>WP: Bildbearbeitung und Bildverarbeitung</option>
                                 <option>WP: Content Management Systeme</option>
                                 <option>WP: Einführung Projektmanagement</option>
                                 <option>WP: Grundlagen virtueller Welten</option>
                                 <option>WP: Kommunikationsnetze 2</option>
                                 <option>WP: Medienwirtschaft und Kommunikationspolitik</option>
                                 <option>WP: Objektorientierte Skriptsprachen</option>
                                 <option>WP: Programmierung in C++ (Teile 1 und 2)</option>
                                 <option>WP: Rich Media Anwendungen</option>
                                 <option>WP: Sicherheit von Mediendaten und Medienanwendungen</option>
                                <option>WP: Technisches Englisch</option>
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
                            <label for="Dozent">Wähle deinen Dozenten</label>
                                <select class="form-control" name="Dozent">
                                     <option>Arnke, Peter, Prof. Dipl.-Ing.</option>
                                     <option>Bode, Christopher, Prof. Dr.-Ing.</option>
                                     <option>Celebi, Furutan, Prof.</option>
                                     <option>Downie, Timothy, Prof. Dr.</option>
                                     <option>Edlich, Stefan, Prof. Dr.-Ing.</option>
                                     <option>Finke, Ulrich, Prof. Dr.</option>
                                     <option>Edlich, Stefan, Prof. Dr.-Ing.</option>
                                     <option>Görlitz, Gudrun, Prof. Dr.</option>
                                     <option>Hambrecht, Andreas, Prof. Dr.-Ing.</option>
                                     <option>Irrgang, Klaus-Dieter, Prof. Dr..</option>
                                     <option>Jekel, Nicole, Prof. Dr..</option>
                                     <option>Körner, Ursula, Prof. Dr.-Ing.</option>
                                     <option>Lunau, Ralf, Prof. Dr.</option>
                                     <option>Merceron, Agathe, Prof. Dr.</option>
                                     <option>Newesely, Bri, Prof. Dr.-Ing.</option>
                                     <option>Off, Thomas, Prof. Dr.</option>
                                     <option>Pinardi, Mara, Prof. Dipl.-Ing.</option>
                                     <option>Richter, Markus, Prof. Dr.</option>
                                     <option>Stock, Detlev, Prof. Dr. rer. pol.</option>
                                     <option>Trettin, Karin, Prof. Dr. rer. nat.</option>
                                     <option>Ullmann, Werner, Prof. Dr.-Ing.</option>
                                     <option>Voß, Sven-Hendrik, Prof. Dr.</option>
                                     <option>Weimann, Peter, Prof. Dr. phil.</option>
                                     <option>Ziouziou, Sammy, Prof. Dr. phil.</option>
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


</body>
<?php
include("templates/footer.inc.php")
?>

</html>
