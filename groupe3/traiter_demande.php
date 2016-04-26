<?php

include("fonction.php");

connectMaBase();
$etat='val_default';
$valeur=$_GET['etat2'] ;
echo $valeur;
$name=$_GET['name'];
echo $name;
$mail=$_GET['mail1'];

if(strcmp($valeur,'en_cour')==0){
	$etat='traitee';
}
if(strcmp($valeur,'traitee')==0){
	$etat='arrivee';
}

$demande1=$_GET['demande'];
$requet= mysql_query("UPDATE demande_accueil SET etat='$etat' WHERE id_demande=$demande1");

if (!$requet) {
    die('Requête invalide : ' . mysql_error());
}else ?>
	<a> Votre demande est <?php echo $etat; ?></a><br/>
 <?php   if(!empty($mail))
  {?>
<head><link href="style.css" rel="stylesheet" media="all" type="text/css"></head>
<body>
<form method=get action=envoyer_mail.php >
<fieldset>
<input type=hidden name=subject value=formmail>
<table>
<tr><td>Votre Nom:</td>
<td><input type=text name=name size=30 value="<?php echo $name ?>" /></td></tr>
<tr><td>Votre Email:</td>
<td><input type=text name=mail size=30 value="<?php echo $mail ?>"></td></tr>
<tr><td colspan=2>Votre message:<br>
<textarea COLS=50 ROWS=6 name=contenu></textarea>
<input type="hidden" name="demande_id" value="<?php echo "".$demande1."" ?>">
<input type="hidden" name="demande_etat" value="<?php echo "".$valeur."" ?>">
</td></tr>
</table>
<br> <input type=submit value=Envoyer> -
<input type=reset value=Annuler>
</fieldset>
</form>
</body>
<?php
  }else{
	  ?> 
  <head><link href="style.css" rel="stylesheet" media="all" type="text/css"></head>
<body>
<form method=get action=envoyer_mail.php >
<fieldset>
<input type=hidden name=subject value=formmail>
<table>
<tr><td>Votre Nom:</td>
<td><input type=text name=name size=30 value="<?php echo $_SESSION['name'] ?>" /></td></tr>
<tr><td>Votre Email:</td>
<td><input type=text name=mail size=30 value="<?php echo $_SESSION['email'] ?>"></td></tr>
<tr><td colspan=2>Votre message:<br>
<textarea COLS=50 ROWS=6 name=contenu></textarea>
<input type="hidden" name="demande_id" value="<?php echo "".$demande1."" ?>">
<input type="hidden" name="demande_etat" value="<?php echo "".$valeur."" ?>">
</td></tr>
</table>
<br> <input type=submit value=Envoyer > 
<input type=reset value=Annuler>
</fieldset>
</form>
</body>
<?php
  }
mysql_close();
 //header("Location: http://localhost/my-site/projetEPA-master/groupe4/connected.php");
  //exit();
?>