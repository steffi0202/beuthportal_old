<!DOCTYPE html>
<html lang="en">

<head>
<!--meta http-equiv="refresh" content="5; URL=../index.php"-->

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Logout</title>

  <!-- Bootstrap Core CSS -->
 <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Fonts -->
 <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <!-- Custom styles for this template -->
 <link href="../css/style.css" rel="stylesheet">
  <!-- Plugin CSS -->
 <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS -->
  <link href="../css/creative.min.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Star Rating -->
  <link href="css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
  <script src="js/star-rating.js" type="text/javascript"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">
        </div>
          <!--/.container-fluid-->
     </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
			<div class="container main-container" style="text-align:center; font-size:120%;">

               <br /> <br />
Dein Logout war erfolgreich.
<br /> <br />
<a href="../index.php">Zurück zur Startseite</a>
<!--Du wirst in 5 Sekunden zur Startseite weitergeleitet.-->
<br /> <br />
</div>
            </div>
        </div>
    </header>
<?php
session_start();
session_destroy();
unset($_SESSION['userid']);

//Remove Cookies
setcookie("identifier","",time()-(3600*24*365));
setcookie("securitytoken","",time()-(3600*24*365));
header("location:../index.php");
//require_once("inc/config.inc.php");
//require_once("inc/functions.inc.php");

//include("../templates/header.inc.php");

?>



<?php
include("../templates/footer.inc.php")
?>
</body>
</html>