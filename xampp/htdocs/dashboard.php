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
	
	<div class="header-content" style="">
				<div class="header-content-inner">
					<h1 id="homeHeading">Hallo <?php $user = check_user(); echo htmlentities($user['vorname']); ?>!<br /></h1>
			<hr>		
			<div class="container">
            <div class="row">
                <a href="bewertung.php"><div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond text-primary sr-icons"></i>
                        <h3>Studiengang bewerten</h3>
                        <p class="text-muted">Bewerte Module und Dozenten</p>
                    </div>
                </div></a>
								
               <a href="upload.php">
					<div class="col-lg-3 col-md-6 text-center">
						<div class="service-box">
							<i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>
							<h3>Dokument-Area</h3>
							<p class="text-muted">Lade z. B. alte Klausuren hoch oder runter</p>
						</div>
					</div>
				</a>
      
              <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>
                        <h3>Mensapläne</h3>
                        <p class="text-muted">Hier folgt evtl. der Mensa-Content</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart text-primary sr-icons"></i>
                        <h3>Forum</h3>
                        <p class="text-muted">Hier folgt evtl. das Forum</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
				</div>
			</div>
        <!--div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Hallo <?php// echo htmlentities($user['vorname']); ?>!<br></h1>
                <hr>
            </div>
                  <div class="container">
                      <div class="row">
                        <div class="call-to-action">
          	               <div class="col-lg-8 col-lg-offset-2 text-center">
                              <h2 class="section-heading">Suche nach Studiengängen, Dozenten und Modulen</h2>
                            <!--  <hr class="light">
                              <p class="text-faded">Hilf anderen Studenten und teile deinen Content und Erfahrungen zum Studium hier!</p>>
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
        </div-->
    </header>
	

	
	
	<!-- ------------------------------------Die Datenbankeinträge von Bewertungen in der Gesamtübersicht START-->
	<div class="row">
			<div class="call-to-action">
				<div class="col-lg-8 col-lg-offset-2 text-center"><br /><br />
					
	<?php
	 $verbindung = mysqli_connect ("localhost", "root", "")
      or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");
      mysqli_select_db($verbindung, "beuthportal") or die ("Die Datenbank existiert nicht.");
      //* Datenbankverbindung aufbauen (ENDE)
    
      //* Überprüfung der Eingabe
          $abfrage = "SELECT * FROM ranking";
          $ergebnis = mysqli_query($verbindung, $abfrage) or die(mysqli_error($verbindung));
           ?>
			<h2 class="section-heading">Bisherige Bewertungen</h2>	
			<br />
          <table style="width:100%; border-style:solid; border-width:1px;">
			<tr style="border-style:solid; border-width:1px;">
				<td style="max-width:16.6%; text-align:center; border-style:solid; border-width:1px;"><b>Bewertungsdatum</b></td>
				<td style="max-width:16.6%; text-align:center; border-style:solid; border-width:1px;"><b>Studiengang</b></td>
				<td style="max-width:16.6%; text-align:center; border-style:solid; border-width:1px;"><b>Modul</b></td>
				<td style="max-width:16.6%; text-align:center; border-style:solid; border-width:1px;"><b>Semester</b></td>
				<td style="max-width:16.6%; text-align:center; border-style:solid; border-width:1px;"><b>Dozent</b></td>
				<td style="max-width:16.6%; text-align:center; border-style:solid; border-width:1px;"><b>Bewertung</b></td>			
			</tr>			
			<?php 
			 while($ausgabe = mysqli_fetch_assoc($ergebnis)){
				 ?>		 			
			<tr style="border-style:solid; border-width:1px;">
				<td style="max-width:16.6%; text-align:center; border-style:solid; border-width:1px;"><?php echo $ausgabe['created_at']?></td>
				<td style="max-width:16.6%; text-align:center;border-style:solid; border-width:1px;"><?php echo $ausgabe['Studiengang']?></td>
				<td style="max-width:16.6%; text-align:center;border-style:solid; border-width:1px;"><?php echo $ausgabe['Modul']?></td>
				<td style="max-width:16.6%; text-align:center;border-style:solid; border-width:1px;"><?php echo $ausgabe['Semester']?></td>
				<td style="max-width:16.6%; text-align:center;border-style:solid; border-width:1px;"><?php echo $ausgabe['Dozent']?></td>
				<td style="max-width:16.6%; text-align:center;border-style:solid; border-width:1px;"><?php echo $ausgabe['Sterne']?></td>
			</tr>	
				<?php
				}?>
				</table>
       </div>
	   </div>
	   </div>
	   <!-- ------------------------------------Die Datenbankeinträge von Bewertungen in der Gesamtübersicht ENDE-->
	   



	
	<div class="container">
		<div class="row">
			<div class="call-to-action">
				<div class="col-lg-8 col-lg-offset-2 text-center"><br /><br />
					<h2 class="section-heading">Suche nach Studiengängen, Dozenten und Modulen...</h2>				
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

	
	<!-- ------------------------------------Alternative Anzeige von Suchergebnissen------------ START -->
	
	
		<div class="row">
			<div class="call-to-action">
				<div class="col-lg-8 col-lg-offset-2 text-center"><br /><br />
					
	<?php
	
	$ergebnis = 0;
	$suchbegriff = '';
    if(isset($_GET['search']))
    {
	 $verbindung = mysqli_connect ("localhost", "root", "")
	 or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");
      mysqli_select_db($verbindung, "beuthportal") or die ("Die Datenbank existiert nicht.");
      //* Datenbankverbindung aufbauen (ENDE)
      $suchbegriff = $_POST["search"];
      //* Überprüfung der Eingabe
          $abfrage = "SELECT * FROM ranking WHERE Dozent LIKE '%$suchbegriff%' OR  Modul LIKE '%$suchbegriff%' OR  Studiengang LIKE '%$suchbegriff%'";
          $ergebnis = mysqli_query($verbindung, $abfrage) or die(mysqli_error($verbindung));

           ?>
			<h2 class="section-heading">Ergebnis der Suche</h2>	
			<br />
			
			<?php 
			 while($ausgabe = mysqli_fetch_assoc($ergebnis)){
				 ?>		 
          <table style="width:100%; border-style:solid; border-width:1px;">
			<tr style="border-style:solid; border-width:1px;">
				<td style="max-width:16.6%; text-align:center; border-style:solid; border-width:1px;"><b>Bewertungsdatum</b></td>
				<td style="max-width:16.6%; text-align:center; border-style:solid; border-width:1px;"><b>Studiengang</b></td>
				<td style="max-width:16.6%; text-align:center; border-style:solid; border-width:1px;"><b>Modul</b></td>
				<td style="max-width:16.6%; text-align:center; border-style:solid; border-width:1px;"><b>Semester</b></td>
				<td style="max-width:16.6%; text-align:center; border-style:solid; border-width:1px;"><b>Dozent</b></td>
				<td style="max-width:16.6%; text-align:center; border-style:solid; border-width:1px;"><b>Bewertung</b></td>			
			</tr>			
						
			<tr style="border-style:solid; border-width:1px;">
				<td style="max-width:16.6%; text-align:center; border-style:solid; border-width:1px;"><?php echo $ausgabe['created_at']?></td>
				<td style="max-width:16.6%; text-align:center;border-style:solid; border-width:1px;"><?php echo $ausgabe['Studiengang']?></td>
				<td style="max-width:16.6%; text-align:center;border-style:solid; border-width:1px;"><?php echo $ausgabe['Modul']?></td>
				<td style="max-width:16.6%; text-align:center;border-style:solid; border-width:1px;"><?php echo $ausgabe['Semester']?></td>
				<td style="max-width:16.6%; text-align:center;border-style:solid; border-width:1px;"><?php echo $ausgabe['Dozent']?></td>
				<td style="max-width:16.6%; text-align:center;border-style:solid; border-width:1px;"><?php echo $ausgabe['Sterne']?></td>
			</tr>	
			<tr style="border-style:solid; border-width:1px;">
				<td style="text-align:left;" colspan="6"><?php echo "Zeitaufwand: ". $ausgabe['Zeitaufwand']?></td>
			</tr>		
			<tr style="border-style:solid; border-width:1px;">
				<td  style="text-align:left;" colspan="6"><?php echo "Modulbeschreibung: ". $ausgabe['Modul_des']?></td>
			</tr>
			<tr style="border-style:solid; border-width:1px;">
				<td style="text-align:left;" colspan="6"><?php echo "Dozentenbeschreibung: ". $ausgabe['Dozent_des']?></td>
			</tr>
			<tr style="border-style:solid; border-width:1px;">
				<td style="text-align:left;" colspan="6"><?php echo "<br />"?></td>
			</tr>
				<?php
				}?>
				</table>
				
				<?php
				  }?>
  
  <div class="container">
		<div class="row">
			<div class="call-to-action">
				<div class="col-lg-8 col-lg-offset-2 text-center"><br /><br />
					<h4 class="section-heading">
					<?php
						if (!empty($_GET) AND !$ergebnis || mysqli_num_rows($ergebnis) == 0) {
						 echo "<font color='#FF0000'>Es wurde kein Ergebnis unter dem Begriff \"<u>$suchbegriff</u>\" gefunden.<br />
						   Bitte versuche es mit einem anderen Begriff.
						   </font>";
						   //<a href='dashboard.php'>Zurueck!</a>
						 }    // * Wenn nichts gefunden wurde, dann kommt diese Fehlermeldung.*/

					?>
       </div>
	   </div>
	   </div>
	
	
	
	<!-- ------------------------------------Alternative Anzeige von Suchergebnissen------------ ENDE -->
	
	
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

         while($ausgabe = mysqli_fetch_assoc($ergebnis)){
           ?>
          <h1><?php echo "Bewertung vom ".$ausgabe['created_at'].":"?></h1>
       </div>
       <section class="text-center" id="searchOutput">    
	   
	  <div class="col-sm-3 col-md-3 col-xs-12" style="width:100%;">
         <div class="box-1 center">
           <div class="panel panel-success panel-pricing">
             <div class="panel-heading">
               <h3>Studiengang</h3>
             </div>
             <div class="panel-body text-center">
               <p><strong><?php echo "".$ausgabe['Studiengang'].""?></strong></p>
             </div>
             </div>
       </div>
      </div>
	  
	   <div class="col-sm-3 col-md-3 col-xs-12" style="width:100%;">
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
           <h3>Belegt im</h3>
         </div>
         <div class="panel-body text-center">
           <p><strong><?php echo "".$ausgabe['Semester'].""?></strong></p>
         </div>
         </div>
   </div>
  </div>

     <div class="col-sm-3 col-md-3 col-xs-12">
       <div class="box-1 center">
         <div class="panel panel-success panel-pricing">
           <div class="panel-heading">
             <h3>Zeitaufwand</h3>
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
          <h3>Gesamtwertung</h3>
        </div>
        <div class="panel-body text-center">
          <p><strong><?php echo "".$ausgabe['Sterne']." von 5"?></strong></p>
        </div>
        </div>
  </div>
 </div>

    <div class="col-sm-3 col-md-3 col-xs-12" style="width:100%;">
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

   <div class="col-sm-3 col-md-3 col-xs-12" style="width:100%;">
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

 </section>
      <?php
    }
  }
  ?>
  <section>
  <div class="container">
		<div class="row">
			<div class="call-to-action">
				<div class="col-lg-8 col-lg-offset-2 text-center"><br /><br />
					<h4 class="section-heading">
					<?php
						if (!empty($_GET) AND !$ergebnis || mysqli_num_rows($ergebnis) == 0) {
						 echo "<font color='#FF0000'>Es wurde kein Ergebnis unter dem Begriff \"<u>$suchbegriff</u>\" gefunden.<br />
						   Bitte versuche es mit einem anderen Begriff.
						   </font>";
						   //<a href='dashboard.php'>Zurueck!</a>
						 }    // * Wenn nichts gefunden wurde, dann kommt diese Fehlermeldung.*/

					?>
					
					
					</h4>				
			
				</div>
			</div>
		</div>
	</div>
  
  </section>
  

  <!--section class="text-center">
        <!--div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">...oder gehe direkt zum gewünschten Bereich:</h2>
                    <hr class="primary">
                </div>
            </div>
        </div-->
		
        <!--div class="container">
            <div class="row">
                  <a href="bewertung.php"><div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond text-primary sr-icons"></i>
                        <h3>Studiengang bewerten</h3>
                        <p class="text-muted">Bewerte Module und Dozenten</p>
                    </div>
                </div></a>
								
               <a href="upload.php">
					<div class="col-lg-3 col-md-6 text-center">
						<div class="service-box">
							<i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>
							<h3>Dokument-Area</h3>
							<p class="text-muted">Lade z. B. alte Klausuren hoch oder runter</p>
						</div>
					</div>
				</a>
                 <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>
                        <h3>Mensapläne</h3>
                        <p class="text-muted">Hier folgt evtl. der Mensa-Content</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart text-primary sr-icons"></i>
                        <h3>Forum</h3>
                        <p class="text-muted">Hier folgt evtl. das Forum</p>
                    </div>
                </div>
            </div>
        </div>
    </section-->

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
