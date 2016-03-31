<?php

include("fonction.php");

connectMaBase();
$etat='val_default';
$valeur=$_GET[etat] ;
$name=$_GET[name];
$mail=$_GET[mail];
if(strcmp($valeur,'en_cours')==0){
	$etat='traitee';
}
if(strcmp($valeur,'traitee'==0)){
	$etat='arrivee';
}

$demande1=$_GET[demande];
$requet= mysql_query("UPDATE demande_accueil SET etat='$etat' WHERE id=$demande1");

if (!$requet) {
    die('Requête invalide : ' . mysql_error());
}else ?>
	<a> Votre demande est <?php echo $etat ?></a><br/>

<form method=POST action=envoyer_mail.php >
<input type=hidden name=subject value=formmail>
<table>
<tr><td>Votre Nom:</td>
<td><input type=text name=name size=30 value="<?php echo $name ?>" /></td></tr>
<tr><td>Votre Email:</td>
<td><input type=text name=mail size=30 value="<?php echo $mail ?>"></td></tr>
<tr><td colspan=2>Votre message:<br>
<textarea COLS=50 ROWS=6 name=comments></textarea>
</td></tr>
</table>
<br> <input type=submit value=Envoyer> -
<input type=reset value=Annuler>
</form>

<?php

mysql_close();

?>