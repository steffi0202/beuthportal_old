<?php
session_start();
require_once("register/inc/config.inc.php");
require_once("register/inc/functions.inc.php");
include("templates/header.inc.php");

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
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
                <p>Bewerte deine Module und Dozenten und erfahre, wie andere Studenten bewertet haben .... Text folgt....</p>
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
                    <form method="post" action="database.php">
                    <div class="form-group">
                        <label for="Studiengang">Wähle deinen Studiengang:</label>
                            <select class="form-control" name="Studiengang">
                                 <option>Wirtschaftsinformatik - Online</option>
                                 <option>Medieninformatik - Online</option>
                                 <option>3</option>
                                 <option>4</option>
                                 <option>5</option>
                            </select>
                     </div>
                     <div class="form-group">
                        <label for="Modul">Wähle dein Modul:</label>
                            <select class="form-control" name="Modul">
                                 <option>Business Engineering</option>
                                 <option>Operations Research</option>
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
                        <label for="Textarea-Modul">Beschreibe das Modul</label>
                            <textarea class="form-control" name="Textarea-Modul" rows="3"></textarea>
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
                        <label for="Textarea-Dozent">Was ist dir zu deinem Dozenten besondern im Gedächtnis geblieben?</label>
                            <textarea class="form-control" name="Textarea-Dozent" rows="3"></textarea>
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

    <section id="contact">
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
                <div class="col-lg-12 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/creative.min.js"></script>

</body>

</html>
