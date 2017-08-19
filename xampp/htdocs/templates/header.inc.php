<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Beuthportal</title>

    <!-- Bootstrap Core CSS -->

	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
   
	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Custom styles for this template -->
  
	 <link href="css/style.css" rel="stylesheet">
    <!-- Plugin CSS -->
    
	<link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->

	 <link href="css/creative.min.css" rel="stylesheet">
    <link href="css/table.css" rel="stylesheet">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<!-- CSS und JS für Star Rating im Bewertungsportal -->
	  <link href="css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
	  <script src="js/star-rating.js" type="text/javascript"></script>
</head>
<body>
<body id="page-top">
<!--  <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php"></i> Start</a>
        </div>-->
        <div class="container main-container">

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
        <?php if(!is_checked_in()): ?>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" action="register/login.php" method="post">
			<table class="login" role="presentation">
				<tbody>
					<tr>
						<td>
							<div class="input-group">
								<div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
								<input class="form-control" placeholder="E-Mail" name="email" type="email" required>
							</div>
						</td>
						<td><input class="form-control" placeholder="Passwort" name="passwort" type="password" value="" required></td>
						<td><button type="submit" class="btn btn-success">Login</button></td>
					</tr>
					<tr>
						<td><label style="margin-bottom: 0px; font-weight: normal;"><input type="checkbox" name="angemeldet_bleiben" 
						value="remember-me" title="Angemeldet bleiben"  checked="checked" style="margin: 0; vertical-align: middle;" /> 
						<small>Angemeldet bleiben</small></label></td>
						<td><small><a style="color: white;" href="passwortvergessen.php">Passwort vergessen</a></small></td>
						<td></td>
					</tr>
				</tbody>
			</table>


          </form>
        </div><!--/.navbar-collapse -->
        <?php else: ?>
        <div id="navbar" class="navbar-collapse collapse">
         <ul class="nav navbar-nav navbar-right">
         	<li><a href="../dashboard.php">Interner Bereich</a></li>
            <li><a href="#upload">Upload</a></li>
            <li><a href="bewertung.php">Bewerten!</a></li>
            <li><a href="register/settings.php">Einstellungen</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="register/logout.php">Logout</a></li>
          </ul>
        </div><!--/.navbar-collapse -->
        <?php endif; ?>
      </div>
        <!--/.container-fluid-->
    </nav>

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
