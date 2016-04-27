<?php
function connectMaBase()
{
    $base = @mysql_connect ('localhost:', 'root', '');  
    mysql_select_db ('bddepa', $base);
}


function mail_dirigeant()
{
	$destinataire = 'dirigent@hotmail.fr';
	$expediteur   = 'Ensemble pour l afrique';
	$reponse      = $expediteur;
	$contenu 	  = 'vous avez une demande urgente à traitée. il arrive dans moin de une semaine';
	mail($destinataire,'Email au format HTML',$contenu);
}

function has_right_modif($statut) {
	return (($statut == 'CA') or ($statut == 'bureau')  or ($statut == 'admin'));
}

function has_right_add($statut) {
	return ($statut == 'bureau');
}
function has_right_delete($statut) {
	return (($statut == 'CA') or ($statut == 'admin'));
}

function has_right($statut) {
	return (($statut == 'CA') or ($statut == 'bureau')  or ($statut == 'admin'));
}

function affiche_jalons($id_projet) {
	//if (! empty($id_projet) and has_right($_SESSION['pseudo'], $_SESSION['mdp'])) {
	if (! empty($id_projet)) {
		$requete = mysql_query("SELECT * FROM jalon WHERE id_projet=" . intval($id_projet) . " and archivage LIKE 'non' ORDER BY `id_jalon`") or die(mysql_error());
		$requete2 = mysql_query("SELECT * FROM subvention WHERE id_projet=" . intval($id_projet) . " and archivage LIKE 'non' ORDER BY `id_subvention`") or die(mysql_error());

		$i = 1;
		echo '<div class="col-sm-3 col-md-2 sidebar">
				  <ul class="nav nav-sidebar">';
		while ($elt = mysql_fetch_array($requete2)) {
				
				echo '<li style="background-color: rgba(0, 0, 255, 0.1)"><a href="subvention.php?sb=' . $elt['id_subvention'] . '&pj=' . $id_projet . '">Subvention ' . $i . '</a></li>';
			
				$i++;
			}
			echo '</ul>';
			$i = 1;
			echo '<ul class="nav nav-sidebar">';
		while ($elt = mysql_fetch_array($requete)) {
				$couleur = '';
				if ($elt['termine'] == 0)
					$couleur = 'rgba(204, 204, 153, 0.3)';
				if ($elt['termine'] == 1)
					$couleur = 'rgba(102, 204, 102, 0.1)'; 
				if ($elt['termine'] == 2)
					$couleur = 'rgba(255, 102, 102, 0.6)';
				
				if ($elt['termine'] == 1) {
					echo '<li class="active" style="background-color=' . $couleur . '" ><a href="jalon.php?pj=' . $id_projet . '&jl=' . $elt['id_jalon'] . '">Jalon ' . $i . ' : ' . $elt['titre'] . ' <span class="sr-only">(current)</span></a></li>';
				} else {
					echo '<li style="background-color:' . $couleur . '"><a href="jalon.php?pj=' . $id_projet . '&jl=' . $elt['id_jalon'] . '">Jalon ' . $i . ' : ' . $elt['titre'] . '</a></li>';
				}
				$i++;
			}
			echo '</ul>
				</div>';
	} else {
		echo '<div class="col-sm-3 col-md-2 sidebar">
				  <ul class="nav nav-sidebar"></ul>
			</div>';
	}
	//}
}

function mail_etudiant($destinataire)
{
	$expediteur   = 'Ensemble pour l afrique';
	$reponse      = $expediteur;
	$contenu 	  = 'votre demande est en cour de traitement';
	mail($destinataire,'Email au format HTML',$contenu);
}
//on choisi toutes les infos de la demande en cour
	//$requet= mysql_query("SELECT * FROM demande_accueil");
	//while ($demande = mysql_fetch_array($requet)) {

function ajouter_subvention($titre, $id_donnateur, $montant, $id_projet) 
{
	$requet= mysql_query("INSERT INTO Subvention SET Titre='" . $titre . "', date_crea='" . $date . "', montant='" . $montant . "', id_projet=" . $id_projet);

	if (!$requet) die('Requête invalide : ' . mysql_error());
	
}


?>