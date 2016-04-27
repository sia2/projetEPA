<?php 
session_start();
include("./fonction.php");

 if(!isset($_SESSION['user']) and !isset($_SESSION['password']) and !isset($_SESSION['status'])) {
	header('location: ../groupe4/index.php');
	exit();
}

if(!has_right($_SESSION['status'])) {
	header('location: ../groupe4/index.php');
	exit();
}

connectMaBase();
$bool = false;

$page_sub = "projet.php";
$page_traite = "liste-projet.php";

$recherche = "";
$Titre = ''; 
$Donnateur = '';
$Montant = '';
$erreurTitre = '';
$erreurDon = ''; 
$erreurMontant = ''; 
$id_projet = '';

if (isset($_POST['recherche'])) {
	$recherche = trim($_POST['recherche']);
	if (!empty($recherche)) {
		 
		$requete= mysql_query("SELECT * FROM projet WHERE nom_projet LIKE '%" . $recherche . "%' and `archivage` LIKE 'non' ORDER BY id_projet") or die(mysql_error());
	} else {
		$requete= mysql_query("SELECT * FROM projet WHERE `archivage` LIKE 'non' ORDER BY id_projet") or die(mysql_error());	
	}
} else {
	$requete= mysql_query("SELECT * FROM projet WHERE `archivage` LIKE 'non' ORDER BY id_projet") or die(mysql_error());
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="bootstrap-3.3.6/bootstrap-3.3.6/favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.6/bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap-3.3.6/bootstrap-3.3.6/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
	
	<!--Formulaire-->
	<link class="cssdeck" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.2.2/css/bootstrap.min.css">


    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="bootstrap-3.3.6/bootstrap-3.3.6/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap-3.3.6/bootstrap-3.3.6/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>
	
	 <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <center><img class="first-slide" src="projet1.jpg" alt="First slide"></center>
      
        </div>
        <div class="item">
          <center><img class="second-slide" src="projet2.jpg" alt="Second slide"></center>
       
        </div>
        <div class="item">
          <center><img class="third-slide" src="projet3.jpg" alt="Third slide"></center>
          
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->

    <div class="container">
      <div class="row">
        
        <div >
			<h2 class="page-header">Liste des projets </h1>
			
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading" style="padding-bottom:50px">
				
					<form class="navbar-form span7" role="search" method="POST" action="<?php echo $page_traite; ?>" style="margin-top:0px">
						<div class="form-group">
						  <input type="text" class="form-control" placeholder="Nom du projet" style="height:35px" name="recherche">
						</div>
						<button type="submit" class="btn btn-default">Rechercher</button>
					</form>
					<button type="button" class="btn btn-default pull-right" style="margin-right:50px" span3><a href="<?php echo $page_sub; ?>">Ajouter un projet</a></button>

				</div>

				<!-- Table -->
				<table class="table">
					<tr>
						<td>Nom du projet</td>
						<td>Date du début du projet</td>
						<td>Date de fin du projet</td>
						<td>Date de fin du projet</td>
						<td>Description</td>
					</tr>
					<?php while ($personne = mysql_fetch_array($requete)) {
							echo "<tr>
								<td><a href='" . $page_sub . "?pj=" . $personne['id_projet'] . "'>" . $personne['nom_projet'] . "</a></td>
								<td>" . $personne['date_debut_projet'] . "</td>
								<td>" . $personne['date_fin_projet'] . "</td>
								<td>" . $personne['description'] . "</td>
							</tr>";
						}
					?>
						
				</table>
			</div>
		</div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="bootstrap-3.3.6/bootstrap-3.3.6/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrap-3.3.6/bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="bootstrap-3.3.6/bootstrap-3.3.6/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.6/bootstrap-3.3.6/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
