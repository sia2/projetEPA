<?php 
session_start();

if(!isset($_SESSION['user']) and !isset($_SESSION['password'] and !isset($_SESSION['status'])) {
	header('location: ../groupe4/index.php');
	exit();
}

if(!has_right($_SESSION['status'])) {
	header('location: ../groupe4/index.php');
	exit();
}
include("./fonction.php");
connectMaBase();

$beneficiaire = ''; 
$Donnateur = '';
$id_donnateur = '';
$id_projet = '';
$commentaire = '';
$Montant = '0.00';
$erreurTitre = '';
$erreurDon = ''; 
$erreurMontant = ''; 
$num_subvention = '';
$page_retour = "#";
$page_traite = 'confirmer-supprimer-projet.php';
$id_jalon = '';


if(isset($_GET['pj'])) { 
	if (!empty($_GET['pj'])) {
		$id_projet = $_GET['pj'];
		$page_retour = 'projet.php?pj=' . $id_projet;
	}
}
if( isset( $_POST['confirmer'])) { 
		$id_projet = $_POST['pj'];
		// on écrit la requête sql 
		//$sql = "UPDATE jalon SET archivage='oui' WHERE id_jalon=" . $id_jalon; 
		$sql = "DELETE FROM projet WHERE id_projet=" . $id_projet; 

		//on insère les informations du formulaire dans la table 
		mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 

		header('location: supprimer-projet.php'); 	  
    
        exit;
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

    <div class="container-fluid">
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		  <div class="row">
			<?php
			affiche_jalons($id_projet);
			?>
			<div class="alert alert-success" role="alert">
					<a href="#" class="alert-link">Souhaitez vous supprimer le projet ? </a>
				</div>
					<form method="POST" action="<?php echo $page_traite; ?>">
						<button type="submit" class="btn btn-default">Confirmer</button>
						
						<input type="hidden" name="pj" value="<?php echo $id_projet; ?>">
						<input type="hidden" name="confirmer" value="oui">
						<button type="button" class="btn btn-default"><a href="<?php echo $page_retour; ?>">Annuler</a></button>
					</form>
				</div>
			</div>
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
