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
//if(!isset($_SESSION['pseudo'])) 
include("./fonction.php");
connectMaBase();


$titre = ''; 
$numero = '';
$date_d = '';
$date_f = '';
$commentaire = '';
$montant = '0.00';
$erreur = '';
$erreurDon = ''; 
$erreurMontant = ''; 
$id_projet = '';
$id_jalon = '';
$h_jalon = 'Mon jalon';
$avancement = '';
$etat = '';
$termine = 0;
$page_retour = '#';

$page_supp = '#';
$page_arch = '#';

if (isset($_GET['pj'])) {
	$id_projet = $_GET['pj'];
}

if (isset($_GET['jl']) and isset($_GET['pj'])) {
	$page_retour = 'projet.php?pj=' . $_GET['pj'];
	$entrees = mysql_query("SELECT * FROM jalon WHERE id_jalon=" . $_GET['jl']) or die(mysql_error());
	while ($requete = mysql_fetch_array($entrees )) {
		$titre = $requete['titre']; 
		$numero = $requete['niveau']; 
		$date_d = $requete['date_debut']; 
		$date_f = $requete['date_fin']; 
		$montant = $requete['montant']; 
		$paye = $requete['paye']; 
		$termine = $requete['termine']; 
		$commentaire = $requete['commentaire'];
	
		$id_jalon = $_GET['jl'];
		$id_projet = $_GET['pj'];
		
		$page_arch = 'confirmer-archivage-jalon.php?pj=' . $id_projet . '&jl=' .$id_jalon;
		$page_supp = 'confirmer-supprimer-jalon.php?pj=' . $id_projet . '&jl=' .$id_jalon;
		
		if ($termine == 0) {
			$avancement = 'En attente';
		}
		if ($termine == 1) {
			$avancement = 'En cours';
		}
		if ($termine == 2) {
			$avancement = 'Terminé';
		}
		if ($paye == 0) {
			$etat = 'En attente de paiement';
		}
		if ($paye == 1) {
			$etat = 'Payé';
		}
		
		$h_jalon = 'Jalon : ' . $titre . ' - <em>' . $avancement . '</em> - <em>' . $etat . '</em>';

	}
}

if( isset( $_POST['titre']) Or isset( $_POST['montant']) Or isset( $_POST['date_d']) ) { 
    $titre = trim( $_POST['titre'] ); 
	$date_d = trim( $_POST['date_d'] ); 
	$date_f = trim( $_POST['date_f'] ); 
	$montant = trim( $_POST['montant'] ); 
	$paye = trim( $_POST['paye'] ); 
	$termine = trim( $_POST['termine'] ); 
	$commentaire = trim( $_POST['commentaire'] );
	$id_jalon = $_POST['jl'];
	$id_projet = $_POST['pj'];
	$page_retour = 'projet.php?pj=' . $id_projet;
	
	if (! empty($id_jalon) and !empty($id_projet)) {
		$page_arch = 'confirmer-archivage-jalon.php?pj=' . $id_projet . '&jl=' .$id_jalon;
		$page_supp = 'confirmer-supprimer-jalon.php?pj=' . $id_projet . '&jl=' .$id_jalon;
	}
    
	if ($montant == '0')
		$montant = '0.00';

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
            
		if (empty($id_jalon)) {
			// on écrit la requête sql 
			$sql = "INSERT INTO jalon(titre, date_debut, date_fin, montant, termine, paye, commentaire, id_projet) VALUES('$titre','$date_d','$date_f','$montant', '$termine', '$paye','$commentaire','$id_projet')"; 
			// on insère les informations du formulaire dans la table 
			mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
			
			//$sql = "SELECT id_jalon FROM jalon WHERE id_jalon>" . $id_jalon . " AND archivage='non' ORDER BY id_jalon LIMIT 1";
			// on insère les informations du formulaire dans la table 
			//$requete = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 


			header('location: modif_jalon.php?pj=' . $id_projet); 
		} else {
			// on écrit la requête sql 
			$sql = "UPDATE jalon SET titre='$titre', date_debut='$date_d', date_fin='$date_f', montant='$montant', termine='$termine', paye='$paye', commentaire='$commentaire' WHERE id_jalon=" . $id_jalon; 
			// on insère les informations du formulaire dans la table 
			mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
			
			if ($termine == 2) {
				$sql = "SELECT id_jalon FROM jalon WHERE id_jalon>" . $id_jalon . " AND archivage='non' ORDER BY id_jalon LIMIT 1";
				// on insère les informations du formulaire dans la table 
				$requete = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 

				$next_id = '';
				while ($elt = mysql_fetch_array($requete)) {
					$next_id = $elt['id_jalon'];
				}
				if(!empty($next_id)) {
					
					// on écrit la requête sql 
					$sql = "UPDATE jalon SET termine='1' WHERE id_jalon=" . $next_id; 
					// on insère les informations du formulaire dans la table 
					mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
				}
			}
			

			header('location: modif_jalon.php?pj=' . $id_projet);
			
			exit; 
		}
          
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
			<h1 class="page-header"><?php echo $h_jalon; ?></h1>
			<?php
				if(! empty ($erreur)) {
					echo '<div class="alert alert-danger" role="alert"><a href="#" class="alert-link">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span> ' . $erreur . '</a>
					</div>';
				}
			?>
			<form class="well span9" method="post" action="jalon.php">
				<div class="row">
					<div class="span3">
						<label>Titre : </label>
						<input type="text" class="span3" placeholder="Titre" name="titre" value="<?php echo $titre; ?>" required>
						<!--<label>N° : </label>
						<input type="text" class="span3" placeholder="N° du jalon" name="numero" value="<?php echo $numero; ?>">-->
						<label>Date de lancement : </label>
						<input type="date" class="span3" placeholder="Date de lancement" name="date_d" value="<?php echo $date_d; ?>" required>
						<label>Date de cloture : </label>
						<input type="date" class="span3" placeholder="Date de cloture" name = "date_f" value="<?php echo $date_f; ?>">
						<label>Montant : </label>
						<input type="text" class="span3" placeholder="Montant de l'appel de fond" name="montant" value="<?php echo $montant; ?>">
						<hr>
						<label>Non payé  :   <input type="radio" name="paye" value="0" checked></label>
						<label>Payé      :   <input type="radio" name="paye" value="1" ></label><hr>
						
						<label>En attente  :   <input type="radio" name="termine" value="0" <?php if ($termine == 0) echo 'checked'; ?>></label>
						<label>En cours  :   <input type="radio" name="termine" value="1" <?php if ($termine == 1) echo 'checked'; ?>></label>
						<label>Terminé      :   <input type="radio" name="termine" value="2" <?php if ($termine == 2) echo 'checked'; ?>></label>
					</div>
					<div class="span5">
						<label>Commentaire</label>
						<textarea id="message" name="commentaire" class="input-xlarge span5" rows="20"><?php echo $commentaire; ?></textarea>
					</div>
					
				
				</div>
				<button type="button" class="btn btn-default pull-right" style="margin-right:50px"><a href="<?php echo $page_retour; ?>" >Annuler</a></button>
				<?php
					if (has_right_delete($_SESSION['status'])) {
				?>
				<button type="button" class="btn btn-default pull-right" style="margin-right:10px"><a href="<?php echo $page_supp; ?>" <?php if (empty($id_jalon) or empty($id_projet)) echo 'disabled'; ?>>supprimer</a></button>
				<?php 
					}
				?>
				<?php 
					if (has_right_modif($_SESSION['status'])) {
				?>
				<button type="submit" class="btn btn-primary pull-right" style="margin-right:10px">valider</button>
				<?php 
					}
				?>
				
				<input type="hidden" name="pj" value="<?php echo $id_projet; ?>">
				<input type="hidden" name="jl" value="<?php echo $id_jalon; ?>">
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
