<?php

include("fonction.php");

//On récupère les valeurs entrées par l'utilisateur (le reste sera recuperer apres test:
$name=$_POST['name'];
$prenom=$_POST['prenom'];
$age=$_POST['age'];
$langue=$_POST['langue'];
$email=$_POST['mail'];

$adress_origine=$_POST['adress_origine'];
$adress_arrivee=$_POST['adress_arrivee'];

$date=$_POST['date'];
$heure=$_POST['heure'];


$motif=$_POST['motif'];
$etat ='en_cour';
$uni=$_POST['uni'];
$uniarr=$_POST['uni_arrivee'];
// variable date du jour grâce à la fonction date() de PHP
$dateDemande = date("d.m.y");
 
//connection avec fonction.php
connectMaBase();
 
//On prépare la commande sql d'insertion
$sql = 'INSERT INTO demande_accueil(name,prenom,age,langue,adress_origine,adress_arrivee,date,heure,dateDemande,motif,etat,uni,uniarr,email) VALUES("'.$name.'","'.$prenom.'","'.$age.'","'.$langue.'","'.$adress_origine.'","'.$adress_arrivee.'","'.$date.'","'.$heure.'","'.$dateDemande.'","'.$motif.'","'.$etat.'","'.$uni.'","'.$uniarr.'","'.$email.'")';
 
//execution de la demande
mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
//on recupere tous les mails
$requet=mysql_query("SELECT email FROM adherent");

while ($adherent = mysql_fetch_array($requet)) {
//on envoi au mails de chaques adherents
$destinataire = $adherent[0];
$expediteur   = 'Ensemble pour l afrique';
$reponse      = $expediteur;

echo "Ce script envoie un mail au format HTML à $destinataire";

mail($destinataire,
     'Email au format HTML',
     $motif,
     "From: $expediteur\r\n".
        "Reply-To: $reponse\r\n".
        "Content-Type: text/html; charset=\"UTF-8\"\r\n");

 
}
 
 
 
// on ferme la connexion
mysql_close();

  header("Location: http://localhost/my-site/projetEPA-master/groupe4/connected.php");
  exit();

?>
