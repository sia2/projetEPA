<?php
function connectMaBase()
{
    $base = mysql_connect ('localhost', 'root', '');  
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

function mail_etudiant($destinataire)
{
	$expediteur   = 'Ensemble pour l afrique';
	$reponse      = $expediteur;
	$contenu 	  = 'votre demande est en cour de traitement';
	mail($destinataire,'Email au format HTML',$contenu);
}
?>