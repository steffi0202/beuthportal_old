<?php
session_start();
require_once("register/inc/config.inc.php");
require_once("register/inc/functions.inc.php");
include("templates/header.inc.php");

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();
?>

<body id="page-top">
</div>
  <!--/.container-fluid-->
</nav>
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Hallo <?php echo htmlentities($user['vorname']); ?>,<br></h1>
                <hr>
            </div>
                  <div class="container">
                      <div class="row">
                        <div class="call-to-action">
          	               <div class="col-lg-8 col-lg-offset-2 text-center">
                              <h2 class="section-heading">Suche nach Studiengängen, Dozenten und Modulen</h2>
                            <!--  <hr class="light">
                              <p class="text-faded">Hilf anderen Studenten und teile deinen Content und Erfahrungen zum Studium hier!</p>-->
                              <div class="container" style="margin-top: 8%;">
                                <form id="search" method="post" action="?search#searchOutput">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <input style="width: 650px" class="form-control"  type="text" name="search" placeholder="Search..." required/>
                                      <span class="input-group-btn">
                                        <button style= "margin-right: 400px" class="btn btn-success" type="submit">
                                          <i class="glyphicon glyphicon-search" aria-hidden="true"></i>Search
                                        </button>
                                      </span>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          </div>
                      </div>
                  </div>
              </section>
        </div>
    </header>
    <?php
    if(isset($_GET['search']))
    {
      //* Datenbankverbindung aufbauen (START)

      $verbindung = mysql_connect ("localhost", "root", "")
      or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");

      mysql_select_db("beuthportal") or die ("Die Datenbank existiert nicht.");

      //* Datenbankverbindung aufbauen (ENDE)
      $suchbegriff = $_POST['search'];
    //  print_r($_POST); //fuer Fehleranalyse, prüfen ob Wert in Variable steht

      //* Überprüfung der Eingabe
          $abfrage = "SELECT * FROM ranking WHERE Dozent LIKE '%$suchbegriff%' OR  Modul LIKE '%$suchbegriff%' OR  Studiengang LIKE '%$suchbegriff%'";
          $ergebnis = mysql_query($abfrage) or die(mysql_error());
      ?>
    <section class="bg-primary" id="searchOutput">
      <div class="container">
              <div class="row">
                <div class="call-to-action">
  	               <div class="col-lg-8 col-lg-offset-2 text-center">
                     <?php
                    while($ausgabe = mysql_fetch_assoc($ergebnis)){
                    echo "".$ausgabe['Dozent']."/".$ausgabe['Modul']."<br>" ;
                     } //* Wenn was gefunden wurde, wird es hier ausgegeben.
                     if (mysql_num_rows($ergebnis) == 0) {
                     echo "Es wurde kein Ergebnis unter den Begriff \"<u>$suchbegriff</u>\" gefunden.<br />
                       Bitte versuche es mit einem anderen Begriff.<br />
                       <a href='dashboard.php'>Zur&uuml;ck!</a>";
                     }    // * Wenn nichts gefunden wurde, dann kommt diese Fehlermeldung.*/
                     ?>

                   </div>
               </div>
           </div>
       </section>
       <?php
     }
      ?>
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">At Your Service</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond text-primary sr-icons"></i>
                        <h3>Sturdy Templates</h3>
                        <p class="text-muted">Our templates are updated regularly so they don't break.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>
                        <h3>Ready to Ship</h3>
                        <p class="text-muted">You can use this theme as is, or you can make changes!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>
                        <h3>Up to Date</h3>
                        <p class="text-muted">We update dependencies to keep things fresh.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart text-primary sr-icons"></i>
                        <h3>Made with Love</h3>
                        <p class="text-muted">You have to make your websites with love these days!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter popup-gallery">
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/fullsize/1.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/fullsize/2.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/fullsize/3.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/fullsize/4.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/fullsize/5.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/fullsize/6.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
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
                    <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x sr-contact"></i>
                    <p>123-456-6789</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery -->
  <!--  <script src="vendor/jquery/jquery.min.js"></script>-->

    <!-- Bootstrap Core JavaScript -->
    <!--<script src="vendor/bootstrap/js/bootstrap.min.js"></script>-->

    <!-- Plugin JavaScript -->
  <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
-->
    <!-- Theme JavaScript -->
    <!--<script src="js/creative.min.js"></script>-->

</body>

</html>
