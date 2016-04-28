<?php

require_once './const.php';

error_reporting(0);

$path = $_GET['dir'];

$uploaddir = $path.'/';
$newname=str_replace(" ",'_',$_FILES['fic']['name']);
$uploadfile = $uploaddir.basename($newname);
$uploaddirBDD = $path.'/';
$uploadfileBDD = $uploaddirBDD.basename($newname);
$nameF = $_FILES['fic']['name'];
$typeF = $_FILES['fic']['type'];
$tailleF = $_FILES['fic']['size'];
$cheminF = $_FILES['fic']['tmp_name'];

/*echo 'Chemin fic : '.$cheminF.'<br/>';*/

$statut = $_POST["droit"];

/* On récupère le chemin du répertoire du fichier (sans le non du fichier) */
$rep = dirname($uploadfile);

/* On récupère le dossier ou est stocké le fichier (uniquement le nom du dossier, pas le chemin) */
$occ = substr(strrchr($rep, '/'), 1);

/* On récupère l'id du dossier ou est stocké le fichier pour pouvoir le stocker dans la base de données lors de l'insertion d'un document */
$resultat = $co->execQuery("SELECT id_dossier FROM `bddepa`.`dossier` WHERE nom_dossier ='".$occ."'");
$idd = $co->recup1Res();

/*echo ("Le répertoire parent est : ".$rep.'<br/>') ; 
echo 'Derniere occurence : '.$occ.'<br/>';
echo 'IDENTIFIANT DOSSIER : '.$idd['id_dossier'].';';*/

/* Si le fichier est inexistant dans le répertoire d'upload */
if(!file_exists($uploadfile))
{
    
    $req = "INSERT INTO `bddepa`.`document`(`nom_document`,`type_document`,`chemin_r_doc`, `id_projet`,`chemin_a_doc`, `date`,`taille`,`id_statut`,`id_dossier`) 
            VALUES ('".$newname."', '".$typeF."' ,'".$uploadfile."', 1, '".$uploadfileBDD."', CURRENT_DATE(), '".$tailleF."','".$statut."' ,'".$idd['id_dossier']."')";
   
   // echo 'La requete : '.$req.'';
    $resultat = $co->execQuery($req);  
	//echo $resultat;
    
    if($resultat)
    {
        
        copy($cheminF, $uploadfile);
        
        if (move_uploaded_file($cheminF, $uploadfile)) 
        {
            chmod($uploadfile, 0777);
            header('Location:index.php?dir='.$path.'&in=0');
        }
    }
    else
    {
        echo 'toto';
    }
}
else
     header('Location:index.php?in=1');
