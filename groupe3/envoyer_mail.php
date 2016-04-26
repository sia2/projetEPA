<?php

include("fonction.php");
connectMaBase();

//On récupère les valeurs entrées par l'utilisateur (le reste sera recuperer apres test:
$name=$_GET['name'];
$mail=$_GET['mail'];
$contenu=$_GET['contenu'];
$demande=$_GET['demande_id'];
$requet= mysql_query("SELECT email FROM `demande_accueil` WHERE id_demande =$demande");

while ($res = mysql_fetch_array($requet)) {
//on envoi au mails de chaques adherents
$destinataire = $res;
$expediteur   = $mail;
$reponse      = $expediteur;

echo "Ce script envoie un mail au format HTML à $destinataire $contenu";

mail($destinataire,'Email au format HTML',$contenu);

 
}

  header("Location: http://localhost/projetEPA/groupe4/index.php"); 
  exit();
?> 