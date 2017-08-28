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


﻿<!DOCTYPE html>
<html lang="en">

<body id="page-top">

</div>
  <!--/.container-fluid-->
</nav>

<header>
    <div class="header-content">
        <div class="header-content-inner">
            <h1 id="homeHeading">MM - Euer Mensa Menue!</h1>
            <p>Mensa - oder doch lieber Döner? Finde heraus, was in den kommenden zwei Wochen auf den Tisch kommt!</p>
            <hr>
        </div>
    </div>
</header>

<body id="page-top">

    <!--h2 class="page-header">MM - Euer Mensa Menue</h2-->
    <!--p>Hier findet ihr die Speisepläne der kommenden zwei Wochen!</p>
    <p>Guten Hunger!</p-->

    <!--div class="jumbotron">
        <a class="btn btn-primary btn-xl page-scroll" href="Menue1.pdf" target="_blank" rel="noopener">Menue 09.10.-13.10.2017</a-->
        <!--button type="button" class="btn btn-default">Menue 17.07.-21.07.2017</button-->
        <!--p></p>
        <a class="btn btn-primary btn-xl page-scroll" href="Menue2.pdf" target="_blank" rel="noopener">Menue 16.10.-20.10.2017</a>
    </div-->
    <section class="bg-primary" id="mensa">

        <div class="container">
            <div class="row">
                <div class="call-to-action">
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <h2 class="section-heading">Besser-Esser</h2>
                        <hr class="light">
                        <p class="text-faded">Hier erfahrt ihr, was euer Mensa-Team in den kommenden Wochen auf den Tisch zaubert.</p>
                        <a class="btn btn-primary btn-xl page-scroll" href="Menue1.pdf" target="_blank" rel="noopener">Menue 17.07.-21.07.2017</a>
                        <a class="btn btn-primary btn-xl page-scroll" href="Menue2.pdf" target="_blank" rel="noopener">Menue 24.07.-28.07.2017</a>
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
                    <p>Du hast Fragen, Anregungen oder Verbesserungswünsche? Dann tritt mit uns in Kontakt!</p>
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
