<!DOCTYPE html>
<?php
session_start();
//require_once("inc/config.inc.php");
require_once("register/inc/config.inc.php");
require_once("register/inc/functions.inc.php");

//include("templates/header.inc.php");
$pdo = new PDO('mysql:host=localhost;dbname=beuthportal', 'root', '');
if(is_checked_in()){
	header("location:dashboard.php");
}
?>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Studentenportal der Beuth Hochschule Berlin</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/creative.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">
  
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Start</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
					<?php if(is_checked_in()): ?>	
					<li>
                        <a class="page-scroll" href="dashboard.php">Dashboard</a>
                    </li>
					 <?php else: ?>
                    <li>
                        <a class="page-scroll" href="#services">Deine Möglichkeiten</a>
                    </li>
                    <!--li>
                        <a class="page-scroll" href="#portfolio">Portfolio</a>
                    </li-->
					<?php endif; ?>
                    <li>
                        <a class="page-scroll" href="#contact">Kontakt</a>
                    </li>
					 <?php if(!is_checked_in()): ?>					
                    <li>
                        <a  href="register/login.php">Login</a>
                    </li>
					 <?php else: ?>
					 <li>
                        <a  href="register/logout.php">Logout</a>
                    </li>
					<?php endif; ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
	<?php if(!is_checked_in()): ?>	
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Studentenportal der Beuth Hochschule Berlin</h1>
                <hr>
                Registriere dich um Dozenten und Module zu bewerten oder um Dokumente hoch- und runterzuladen.<br /><br />
                <a class="btn btn-primary btn-xl page-scroll" href="register/register.php">Jetzt registrieren</a><br />
				<hr> 
				Du bist bereits registriert? Dann melde dich jetzt an, um alle Funktionen nutzen zu können.<br/><br />
				<a class="btn btn-primary btn-xl page-scroll" href="register/login.php">Zum Login</a>
            </div>
        </div>
    </header>
	 <?php else: ?>
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
		</header>
   
		<?php endif; ?>
		
		<?php if(!is_checked_in()): ?>	
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
					 <h2 class="section-heading">Was dich als angemeldeter Benutzer erwartet</h2>                  
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!--a href="bewertung.php"--><div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond text-primary sr-icons"></i>
                        <h3>Studiengang bewerten</h3>
                        <p class="text-muted">Bewerte Module und Dozenten</p>
                    </div>
                </div><!--/a-->
              
					<div class="col-lg-3 col-md-6 text-center">
						<div class="service-box">
							<i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>
							<h3>Dokument-Area</h3>
							<p class="text-muted">Lade z. B. alte Klausuren hoch oder runter</p>
						</div>
					</div>
               
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
    </section>

    <!--section class="no-padding" id="portfolio">
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
    </section-->
	
	<?php else: ?>

<?php endif; ?>
	
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Fragen, Wünsche, Anregungen?</h2>
                    <hr class="primary">
                    <p>Sende uns eine E-Mail und wir werden uns so schnell wie möglich bei dir melden!</p>
                </div>
            <!--  <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x sr-contact"></i>
                    <p>123-456-6789</p>
                </div>-->
                <div class="col-lg-12 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a href="mailto:beuthportal@gmail.com">beuthportal@gmail.com</a></p>
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
