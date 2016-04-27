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


$titre = ''; 
$numero = '';
$date_d = '';
$date_f = '';
$commentaire = '';
$montant = '0.00';
$erreur = '';
$erreurMontant = ''; 
$id_projet = '';
$projet_ok = false;
$requete = NULL;
$mon_projet = 'Mon projet';
$page_traite = 'projet.php';
$page_jalon = '#';
$page_base = 'liste-projet.php';
$page_sub = '#';

$page_supp = '#';
$page_arch = '#';

if (isset($_GET['pj'])) {
	$page_arch = 'confirmer-archivage-projet.php?pj=' . $id_projet;
	$page_supp = 'confirmer-supprimer-projet.php?pj=' . $id_projet;
		
	$page_sub = 'donnateur.php?pj=' . $_GET['pj'];
	$page_jalon = 'jalon.php?pj=' . $_GET['pj'];
	$id_projet = $_GET['pj'];
	$requete_projet = mysql_query("SELECT * FROM projet WHERE id_projet=" . $id_projet) or die(mysql_error());
	
	$page_arch = 'confirmer-archivage-projet.php?pj=' . $id_projet;
	$page_supp = 'confirmer-supprimer-projet.php?pj=' . $id_projet;

	while ($requete = mysql_fetch_array($requete_projet )) {
		$titre = $requete['nom_projet']; 
		$date_d = $requete['date_debut_projet']; 
		$date_f = $requete['date_fin_projet'];   
		$commentaire = $requete['description']; 
		$mon_projet = $titre;
	}
}


if( isset( $_POST['titre']) Or isset( $_POST['montant']) Or isset( $_POST['date_d']) ) { 
    $titre = trim( $_POST['titre'] ); 
	$date_d = trim( $_POST['date_d'] ); 
	$date_f = trim( $_POST['date_f'] ); 
	
	
	$commentaire = trim( $_POST['commentaire'] );
	
	$id_projet = trim($_POST['pj']);
	
	if (! empty($id_jalon) and !empty($id_projet)) {
		
	}
	
	if (!empty($id_projet)) {
		$page_sub = 'donnateur.php?pj=' . $id_projet;
		$page_jalon = 'jalon.php?pj=' . $id_projet;
		
		$page_arch = 'confirmer-archivage-projet.php?pj=' . $id_projet;
		$page_supp = 'confirmer-supprimer-projet.php?pj=' . $id_projet;
	}
    
	if (empty($titre)) {
		$erreur = "Veuillez renseigner un titre";

	} elseif (empty($date_d)) {
		$erreur = "Veuillez renseigner une date de lancement";
	} elseif (! preg_match('`^[0-9]{4}-[0-9]{2}-[0-9]{2}$`i', $date_d) ) {
		$erreur = "Entrez une date de lancement au format JJ/MM/YYYY";
	} elseif (! empty($date_f) AND ! preg_match('`^[0-9]{4}-[0-9]{2}-[0-9]{2}$`i', $date_f) ) {
		$erreur = "Entrez une date de cloture au format JJ/MM/YYYY";
	} elseif (! preg_match('`^([0-9] ?){1,}.[0-9]{2}$`i', $montant) ) {
		$erreur = "Le montant doit être au format 199.99";

	} else { 
            
		if (empty($id_projet)) {
			// on écrit la requête sql 
			$sql = "INSERT INTO projet(nom_projet, date_debut_projet, date_fin_projet, description) VALUES('$titre','$date_d','$date_f', '$commentaire')"; 
			// on insère les informations du formulaire dans la table 
			mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
			header('location: crea-projet.php?pj=' . mysql_insert_id()); 

		} else {
			// on écrit la requête sql 
			$sql = "UPDATE projet SET nom_projet = '$titre', date_debut_projet = '$date_d', date_fin_projet = '$date_f', description = '$commentaire' WHERE id_projet=" . $id_projet; 
			// on insère les informations du formulaire dans la table 
			mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
			header('location: modif_projet.php' ); 
		}
				
        exit;    
	} 
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
      <div class="row">
		<?php
			affiche_jalons($id_projet);
		?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header"><?php echo $mon_projet ?></h1>
			<?php
				if(! empty ($erreur)) {
					echo '<div class="alert alert-danger" role="alert"><a href="#" class="alert-link">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span> ' . $erreur . '</a>
					</div>';
				}
				if ($projet_ok) {
					echo '<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
							<div class="alert alert-success" role="alert">
								<a href="#" class="alert-link">Votre projet a bien été modifié</a>
							</div>
				  
						</div>';
				}
			?>
			<form class="well " method="post" style="width:750px;height:520px" action="<?php echo $page_traite; ?>">
				<div class="row">
					<div class="span3">
						<label>Nom du projet: </label>
						<input type="text" class="span3" placeholder="Nom" name="titre" value="<?php echo $titre; ?>" required>
						<label>Date de lancement : </label>
						<input type="date" class="span3" placeholder="Date de lancement" name="date_d" value="<?php echo $date_d; ?>" required>
						<label>Date de cloture : </label>
						<input type="date" class="span3" placeholder="Date de cloture" name = "date_f" value="<?php echo $date_f; ?>">

					</div>
					<div class="span5">
						<label>Commentaire</label>
						<textarea id="message" name="commentaire" class="input-xlarge span5" rows="20"><?php echo $commentaire; ?></textarea>
					</div>	
				
				</div>
				<input type="hidden" name='pj' value="<?php echo $id_projet; ?>" >
				
				<button type="button" class="btn btn-default pull-right" style="margin-right:50px"><a href="<?php echo $page_base; ?>">Annuler</a></button>
				<?php 
					if (has_right_modif($_SESSION['status'])) {
				?>
				<button type="submit" class="btn btn-primary pull-right">Enregister</button>
				<?php 
					}
				?>
				<?php 
				if (!empty($id_projet)) {
					if (has_right_add($_SESSION['status'])) {
						echo '<button type="button" class="btn btn-default pull-right" style="margin-right:10px"><a href="' . $page_jalon . '"> ajouter un jalon </a></button>';
						echo '<button type="button" class="btn btn-default pull-right" style="margin-right:10px"><a href="' . $page_sub . '"> ajouter un subvention </a></button>';
					}
					if (has_right_delete($_SESSION['status'])) {
						echo '<button type="button" class="btn btn-default pull-right" style="margin-right:10px"><a href=' . $page_supp . ' >supprimer</a></button>';
						echo '<button type="button" class="btn btn-default pull-right" style="margin-right:10px"><a href="' .  $page_arch . '" >archiver</a></button>';

					}
				}
				?>
			</form>
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
