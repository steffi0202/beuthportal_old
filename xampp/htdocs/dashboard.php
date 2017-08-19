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
	
	$ergebnis = 0;
	$suchbegriff = '';
    if(isset($_GET['search']))
    {
      //* Datenbankverbindung aufbauen (START)
      $verbindung = mysqli_connect ("localhost", "root", "")
      or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");
      mysqli_select_db($verbindung, "beuthportal") or die ("Die Datenbank existiert nicht.");
      //* Datenbankverbindung aufbauen (ENDE)
      $suchbegriff = $_POST["search"];
      //* Überprüfung der Eingabe
          $abfrage = "SELECT * FROM ranking WHERE Dozent LIKE '%$suchbegriff%' OR  Modul LIKE '%$suchbegriff%' OR  Studiengang LIKE '%$suchbegriff%'";
          $ergebnis = mysqli_query($verbindung, $abfrage) or die(mysqli_error($verbindung));

         while($ausgabe = mysql_fetch_assoc($ergebnis)){
           ?>
          <h1><?php echo "".$ausgabe['created_at'].""?></h1>
       </div>
       <section class="text-center" id="searchOutput">
       <div class="col-sm-3 col-md-3 col-xs-12">
         <div class="box-1 center">
           <div class="panel panel-success panel-pricing">
             <div class="panel-heading">
               <h3>Dozent</h3>
             </div>
             <div class="panel-body text-center">
               <p><strong><?php echo "".$ausgabe['Dozent'].""?></strong></p>
             </div>
             </div>
       </div>
      </div>

      <div class="col-sm-3 col-md-3 col-xs-12">
        <div class="box-1 center">
          <div class="panel panel-success panel-pricing">
            <div class="panel-heading">
              <h3>Modul</h3>
            </div>
            <div class="panel-body text-center">
              <p><strong><?php echo "".$ausgabe['Modul'].""?></strong></p>
            </div>
            </div>
      </div>
     </div>

     <div class="col-sm-3 col-md-3 col-xs-12">
       <div class="box-1 center">
         <div class="panel panel-success panel-pricing">
           <div class="panel-heading">
             <h3>Zeit</h3>
           </div>
           <div class="panel-body text-center">
             <p><strong><?php echo "".$ausgabe['Zeitaufwand'].""?></strong></p>
           </div>
           </div>
     </div>
    </div>

    <div class="col-sm-3 col-md-3 col-xs-12">
      <div class="box-1 center">
        <div class="panel panel-success panel-pricing">
          <div class="panel-heading">
            <h3>Beschreibung des Dozenten</h3>
          </div>
          <div class="panel-body text-center">
            <p><strong><?php echo "".$ausgabe['Dozent_des'].""?></strong></p>
          </div>
          </div>
    </div>
   </div>

   <div class="col-sm-3 col-md-3 col-xs-12">
     <div class="box-1 center">
       <div class="panel panel-success panel-pricing">
         <div class="panel-heading">
           <h3>Beschreibung des Moduls</h3>
         </div>
         <div class="panel-body text-center">
           <p><strong><?php echo "".$ausgabe['Modul_des'].""?></strong></p>
         </div>
         </div>
   </div>
  </div>

  <div class="col-sm-3 col-md-3 col-xs-12">
    <div class="box-1 center">
      <div class="panel panel-success panel-pricing">
        <div class="panel-heading">
          <h3>Gesamtwertung</h3>
        </div>
        <div class="panel-body text-center">
          <p><strong><?php echo "".$ausgabe['Sterne']." von 5"?></strong></p>
        </div>
        </div>
  </div>
 </div>
 </section>
      <?php
    }
  }
  if ( !$ergebnis || mysqli_num_rows($ergebnis) == 0) {
                     echo "Es wurde kein Ergebnis unter den Begriff \"<u>$suchbegriff</u>\" gefunden.<br />
                       Bitte versuche es mit einem anderen Begriff.<br />
                       <a href='dashboard.php'>Zur&uuml;ck!</a>";
                     }    // * Wenn nichts gefunden wurde, dann kommt diese Fehlermeldung.*/

   ?>


  <section id="upload">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Lade hier was hoch</h2>
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

  <!--  <section class="no-padding" id="portfolio">
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
-->
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
<?php
include("templates/footer.inc.php")
?>

</html>
