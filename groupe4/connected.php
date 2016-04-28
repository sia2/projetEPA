<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        		 <link href="assets/css/bootstrap.css" rel="stylesheet" />
   
		<link href="assets/css/font-awesome.css" rel="stylesheet" />
    
		<link href="assets/css/style.css" rel="stylesheet" />
		
		
			<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script> 
		
		<script type='text/javascript'> 
		$(function(){ 
		$(window).scroll(function () {
		//Au scroll dans la fenetre on déclenche la fonction 
		if ($(this).scrollTop() > 105) { 
		//si on a défilé de plus de 150px du haut vers le bas 
		$('#navigation').addClass("fixNavigation"); //on ajoute la classe "fixNavigation" à <div id="navigation"> 
		} else {
		$('#navigation').removeClass("fixNavigation");//sinon on retire la classe "fixNavigation" à <div id="navigation"> 
		}
		}); 
		}); 
		</script>
    </head>
    <body>
		<?php
			include("entete.php");
		?>
		
		<div class="content-wrapper">
		
		
		
				<div class="col-md-6 menu_gauche">
		<!--
			<li><a href="#">Mot de la directrice</a></li>
			<li><a href="#">Membres</a></li>
			<li><a href="#">Projets</a></li>
			<li><a href="#">Partenaires</a></li>
			-->
			
			<ul class="list-group">
				<!--
				<li class="list-group-item"><a href="#mot_directrice">Mot de la directrice</a></li>

				<li class="list-group-item"><a href="#membres">Membres</a></li>

				<li class="list-group-item"><a href="#projets">Projets</a></li>

				<li class="list-group-item"><a href="#partenaires">Partenaires</a></li>
				-->
				
				
		 <?php
		
            if(isset($_SESSION) && isset($_SESSION['user']) && isset($_SESSION['password'])) {
              if(isset($_SESSION['membershipDemand']) && $_SESSION['membershipDemand'] != 'exist' && $_SESSION['membership'] != 'exist' && ($_SESSION['status'] != 'President' || $_SESSION['status'] != 'Tresorier' || $_SESSION['status'] != 'Secretaire' ||
              $_SESSION['status'] != 'Membre CA')) {
        ?>
               <li class="list-group-item"> <a  href="membershipDemand_handler.php">Devenir adhérent</a><br><br></li>
        <?php
              } else if(isset($_SESSION['membershipDemand']) && $_SESSION['membershipDemand'] != 'exist' && $_SESSION['membership'] == 'exist') {
                  echo "<p>Votre statut au sein de l'association : <b><u>".$_SESSION['status']."</b></u>.</p>";
              } else if($_SESSION['status'] == 'President'){

              } else {
                  echo "<p>Votre demande d'adhésion a bien été prise en compte. Un responsable vous contactera prochainement.</p>";
              }
              if($_SESSION['status'] != 'President' && $_SESSION['status'] != 'Tresorier' && $_SESSION['status'] != 'Secretaire' && $_SESSION['status'] != 'Membre CA') {
        ?>
                <li class="list-group-item"><a  href="../groupe3/FormFr.html">Faire une demande d'accueil</a><br><br></li>
        <?php
              }
                if(isset($_SESSION['status']) && ($_SESSION['status'] == 'President' || $_SESSION['status'] == 'Secretaire' || $_SESSION['status'] == 'Tresorier' || $_SESSION['status'] == 'Membre CA')) {
        ?>
                  <li class="list-group-item"><a  href="membershipDemand.php">Gestion des demandes d'adhésions</a><br><br></li>
                 <li class="list-group-item"> <a  href="membershipList.php">Liste des adhérents</a><br><br></li>
                 <li class="list-group-item"> <a  href="membershipGestion.php">Gestion des adhérents</a><br><br></li>
        <?php
                }
                if($_SESSION['status'] == 'Tresorier') {
        ?>
                 <li class="list-group-item"> <a  href="http://www.ciel.com">Ciel</a><br><br></li>
        <?php
                }   if($_SESSION['status'] == 'Secretaire') {
        ?>
                 <li class="list-group-item"> <a  href="membershipUpdate.php">Mise à jour informations adhérent</a><br><br></li>
        <?php
                }
                if($_SESSION['status'] == 'Secretaire' || $_SESSION['status'] == 'President') {
        ?>
                  <li class="list-group-item"><a  href="meeting_form.php">Créer une réunion</a><br><br></li>
        <?php
                }
        ?>
                <li class="list-group-item"><a href="/projetEPA/" >Se déconnecter</a></li>
        <?php
            } else {
                echo "Vous n'êtes pas connecté.";
            }
        ?>
	
				
				
				

			</ul>
			
		</div>
		
		<div class=" col-md-6 contenu">
	
			<div class="panel panel-default">
				<div class="panel-heading"><a href="#"> Forum </a></div>
					<div class="panel-body">
						
						<div class="list-group">
							<a href="#" class="liste-forum list-group-item active">
								<h4 class="list-group-item-heading">Accueil des étudiants en France</h4>
								<p class="list-group-item-text">...</p>
							</a>
							<a href="#" class="liste-forum list-group-item active">
								<h4 class="list-group-item-heading">Action sociale et solidarité</h4>
								<p class="list-group-item-text">...</p>
							</a>
							<a href="#" class="liste-forum list-group-item active">
								<h4 class="list-group-item-heading">Santé mutuelle</h4>
								<p class="list-group-item-text">...</p>
							</a>
						</div>
						
					</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><a href="#"> Projets </a></h3>
				</div>
				<div class="panel-body">
					
					<div class="list-group">
							<a href="#" class="liste-forum list-group-item active">
								<h4 class="list-group-item-heading">Projet 1</h4>
								<p class="list-group-item-text">...</p>
							</a>
							<a href="#" class="liste-forum list-group-item active">
								<h4 class="list-group-item-heading">Projet 2</h4>
								<p class="list-group-item-text">...</p>
							</a>
							<a href="#" class="liste-forum list-group-item active">
								<h4 class="list-group-item-heading">Projet 3</h4>
								<p class="list-group-item-text">...</p>
							</a>
						</div>
					
				</div>
			</div>

		</div>
		
	</div>
	 
	 
	 <?php
	include("footer.php");
	?>
    </body>
</html>
