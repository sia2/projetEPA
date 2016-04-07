<?php

include("fonction.php");
connectMaBase();

//On récupère les valeurs entrées par l'utilisateur (le reste sera recuperer apres test:
$name=$_POST['name'];
$requet= mysql_query("SELECT email FROM adherent");
$mail=$_POST['mail'];
$contenu=$_GET['contenu'];
$demande2=$_GET['demande_id']
//mail_etudiant($demande2[email]);

while ($adherent = mysql_fetch_array($requet)) {
//on envoi au mails de chaques adherents
$destinataire = $adherent[0];
$expediteur   = 'Ensemble pour l afrique';
$reponse      = $expediteur;

echo "Ce script envoie un mail au format HTML à $destinataire $contenu";

mail($destinataire,'Email au format HTML',$contenu);

 
}
?> 