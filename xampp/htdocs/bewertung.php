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
                    <form method="post" action="?bewertung">
                    <div class="form-group">
                        <label for="Studiengang">Wähle deinen Studiengang:</label>
                            <select class="form-control" name="Studiengang">
                                 <option>Data Science - Master</option>
								 <option>Medieninformatik - Bachelor</option>
                                 <option>Medieninformatik - Master</option>
                                 <option>Medieninformatik - Online - Bachelor</option>
                                 <option>Medieninformatik - Online - Master</option>
                                 <option>Wirtschaftsinformatik - Online - Bachelor</option>
                                 <option>Wirtschaftsingenieurwesen - Online - Bachelor</option>
							</select>
                     </div>
                     <div class="form-group">
                        <label for="Modul">Wähle das zu bewertende Modul:</label>
                            <select class="form-control" name="Modul">
                              
                                 <option>Algorithmen und Datenstrukturen</option>
								 <option>Business Engineering</option>
                                 <option>Business English</option> 
								 <option>Einführung in die Wirtschaftsinformatik</option>
								 <option>Operations Research</option>
                                 <option>Projektmanagement</option>
                                 <option>Projektphase</option>
                 
                            </select>
                     </div>
					  <div class="form-group">
                        <label for="Modul">Wähle das Semester, in dem du es belegt hast:</label>
                            <select class="form-control" name="Semester">
                                 <option>Wintersemester 2017 / 2018</option>
                                 <option>Sommersemester 2017</option>
                                 <option>Wintersemester 2016 / 2017</option>
                                 <option>Sommersemester 2016</option>
                                 <option>Wintersemester 2015 / 2016</option>
                                 <option>Sommersemester 2015</option>
								 <option>Wintersemester 2014 / 2015</option>
                                 <option>Sommersemester 2014</option>
								 <option>Wintersemester 2013 / 2014</option>
                                 <option>Sommersemester 2013</option>
								 <option>Wintersemester 2012 / 2013</option>
                                 <option>Sommersemester 2012</option>
                            </select>
                     </div>
					 
					 <div class="form-group">

                        <label for="Dozent">Wählen den Dozenten, der das Modul unterrichtet hat:</label>
                            <select class="form-control" name="Dozent">
                                <option>Thomas Boerner</option>
								<option>Jane Brosnan</option>
								<option>Prof. Dr. Stefan Edlich</option>
								<option>Prof. Dr. Alexander Huber</option>
								<option>Prof. Dr. Agate Merceron</option>
								<option>Prof. Dr. Peter Weimann</option>
                    
                          
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

    <!--section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="primary">
                    <p>Du hast Fragen oder Anregungen? Super! Sende uns eine Mail und wir werden uns so schnell wie möglich bei dir melden!</p>
                </div>
            <!--  <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x sr-contact"></i>
                    <p>123-456-6789</p>
                </div>-->
                <!--div class="col-lg-12 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>
                </div>
            </div>
        </div>
    </section-->

</body>
<?php
include("templates/footer.inc.php")
?>

</html>

