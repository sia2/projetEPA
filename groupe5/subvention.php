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

$beneficiaire = ''; 
$Donnateur = '';
$id_donnateur = '';
$id_projet = '';
$id_sub ='';
$commentaire = '';
$Montant = '0.00';
$erreurTitre = '';
$erreurDon = ''; 
$erreurMontant = ''; 
$num_subvention = '';
$page_traite = "subvention.php";
$h_titre = 'Ajouter une subvention ou un contrat';
$page_retour='#';

$page_supp = '#';
$page_arch = '#';

if( isset( $_GET['name']) and isset($_GET['pers']) and isset($_GET['pj']) ) { 
	$Donnateur = htmlspecialchars($_GET['name']);
	$id_donnateur = htmlspecialchars($_GET['pers']);
	$id_projet = $_GET['pj'];
	$h_titre = 'Subvention : ' . $Donnateur;
	$page_retour='projet.php?pj=' . $_GET['pj'];
}
if (isset($_GET['pj'])) {
	$id_projet = $_GET['pj'];
	$page_retour='projet.php?pj=' . $_GET['pj'];
}
	

if (isset($_GET['sb'])) {
	$page_arch = 'confirmer-archivage-subvention.php?pj=' . $id_projet . '&sb=' .$_GET['sb'];
	$page_supp = 'confirmer-supprimer-subvention.php?pj=' . $id_projet . '&sb=' .$_GET['sb'];

	$id_sub = $_GET['sb'];
	// on écrit la requête sql 
	$sql = "SELECT * FROM subvention WHERE id_subvention=" . $_GET['sb']; 
	// on insère les informations du formulaire dans la table 
	$requete = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 

	while ($elt = mysql_fetch_array($requete)){
		$beneficiaire = $elt['beneficiaire']; 
		$Donnateur = $elt['nom_titulaire']; 
		$id_donnateur = $elt['id_personne_moral']; 
		$id_projet = $elt['id_projet']; 
		$commentaire = $elt['commentaire']; 
		$h_titre = 'Subvention : ' . $Donnateur;
		$Montant = $elt['montant_subvention'];
	}
	
}
if( isset( $_POST['beneficiaire']) Or isset( $_POST['donnateur']) Or isset( $_POST['montant']) ) { 
    $beneficiaire = trim( $_POST['beneficiaire'] ); 
	
	$Montant = trim( $_POST['montant'] );
	$commentaire = trim( $_POST['commentaire'] );
	//$nom_titulaire = trim( $_POST['nom_titulaire'] );
	$commentaire = trim( $_POST['commentaire'] );
    $Donnateur = trim( $_POST['don'] );
	$id_donnateur = trim( $_POST['pm'] );
	$id_projet = trim( $_POST['pj'] );
	$id_sub = trim( $_POST['sb'] );
	$page_retour='projet.php?pj=' . $id_projet;
	
	
	if ($Montant == '0')
		$Montant = '0.00';

	if (! preg_match('`^[- a-zàâäéèêëïîôöùûü\']{0,}$`i', $beneficiaire) ) {
		$erreur = "Le beneficiaire ne doit pas contenir de caratère spécial";
	} elseif (! preg_match('`^[0-9]{1,}.[0-9]{2}$`i', $Montant) ) {
		$erreur = "Le montant ne doit être au format 199.99";

	} else { 
		$sql = '';
        if (!empty($id_sub) and !empty($id_projet)) {
			// on écrit la requête sql 
			$sql = "UPDATE subvention SET montant_subvention='$Montant', beneficiaire='$beneficiaire', nom_titulaire='$Donnateur', commentaire='$commentaire' WHERE id_subvention=" . $id_sub; 
		} else {
			// on écrit la requête sql 
			$sql = "INSERT INTO subvention(montant_subvention, beneficiaire, nom_titulaire, commentaire, id_projet, id_personne_moral) VALUES('$Montant','$beneficiaire','$Donnateur','$commentaire','$id_projet', '$id_donnateur')"; 
		}
				 
		// on insère les informations du formulaire dans la table 
		mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 

        header('location: contrat_ok.php?pj=' . $id_projet); 
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
			<h1 class="page-header"><?php echo $h_titre; ?></h1>
			
			<?php
				if(! empty ($erreur)) {
					echo '<div class="alert alert-danger" role="alert"><a href="#" class="alert-link">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span> ' . $erreur . '</a>
					</div>';
				}
			?>
			
			<form class="well span9" method="post" action="<?php echo $page_traite; ?>">
				<div class="row">
					<div class="span3">
						<!--<label>Identifiant Subvention </label>
						<input type="text" class="span3" placeholder="Identifiant automatique" name="titre" value="<?php echo htmlspecialchars( $num_subvention ) ?>" disabled>-->
						<label>Donnateur : </label>
						<input type="text" class="span3" placeholder="Donnateur" name="donnateur" value="<?php echo htmlspecialchars( $Donnateur ) ?>" disabled>
						<label>Montant de la subvention : </label>
						<input type="text" class="span3" placeholder="Montant de la subvention" name="montant" value="<?php echo htmlspecialchars( $Montant ) ?>">
						<label>Bénéficiaire : </label>
						<input type="text" class="span3" placeholder="bénéficiaire" name="beneficiaire" value="<?php echo htmlspecialchars( $beneficiaire ) ?>">
	
						<!--<label>Ajouter un document <span>(*)</span></label>
						<input type="text" class="span3" placeholder="Nom document">
						<button type="" class="btn btn-primary pull-right">Ajouter</button>-->
					</div>
					<div class="span4">
						<label>Commentaire</label>
						<textarea name="commentaire" id="message" class="input-xlarge span5" rows="20"><?php echo htmlspecialchars( $commentaire ) ?></textarea>
					</div>
					<input type="hidden" name="sb" value="<?php echo $id_sub ?>">
					<input type="hidden" name="pj" value="<?php echo $id_projet; ?>">
					<input type="hidden" name="pm" value="<?php echo $id_donnateur; ?>">
					<input type="hidden" name="don" value="<?php echo $Donnateur; ?>">
				</div>
				<button type="button" class="btn btn-default pull-right" style="margin-right:50px"><a href="<?php echo $page_retour; ?>" >Annuler</a></button>
				<?php
					if (has_right_delete($_SESSION['status'])) {
				?>
				<button type="button" class="btn btn-default pull-right" style="margin-right:10px"><a href="<?php echo $page_supp; ?>" <?php if (empty($id_jalon) or empty($id_projet)) echo 'disabled'; ?>>supprimer</a></button>
				<?php 
					}
				 
					if (has_right_modif($_SESSION['status'])) {
				?>
				<button type="submit" class="btn btn-primary pull-right">Valider</button>
				<?php 
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
