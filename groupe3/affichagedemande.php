
<?php


session_start();
if(isset($_SESSION['pseudo'])) {
 include("fonction.php");
connectMaBase();
//on choisi toutes les infos de la demande en cour
$requet= mysql_query("SELECT * FROM demande_accueil");
$j=1;
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" media="all" type="text/css">
</head>
<body>
<form action="afficher_demande_par_etat.php" method="get">
<fieldset>
<legend style="background-color:rgb(0,51,0);">La liste des demandes</legend>
		<p style="text-align: center;"> Vous pouvez sélectionner l'état des demandes qui vous interèsse :</p><br></br>
			<input type="radio" name="etat" value="en_cour" checked /><label>En Attente de traitement</label><br/>
			  <input type="radio" name="etat" value="traitee" /> <label>Traitée</label><br />
			  <input type="radio" name="etat" value="arrivee" /> <label>Arrivée</label><br /><td></br></br>	
	
		<label><input type="submit" name="affich_demande" value="Afficher"></label>	
</fieldset>
</form>	
</body>
</html>
<?php
$i=0;
function printr($var, $pIsSQL=false, $pIsOpen=true){
    $lColor = (is_string($pIsSQL)?$pIsSQL:($pIsSQL===true?'#FFF5DD':'#F2FFEE'));
    $pIsSQL = ($pIsSQL===true || $lColor=='#FEE');
    $var = ($pIsSQL===true?wordwrap($var.";\n", 100):$var);
    $lHeight = ($pIsSQL===true?'100px':'200px');
    $lUniqId = uniqid(md5(rand()));
    echo '<table cellspacing="0" cellpadding="0" style="width:100%;border:1px dashed gray;background-color:'.$lColor.';">
<tr><td><a style="display:block;padding:4px;" href="javascript:void(0);"
onClick="var tr = document.getElementById(\'printr_'.$lUniqId.'\');
if (tr.style.display!=\'none\') tr.style.display = \'none\';
else tr.style.display = \'table-row\';"></a></td></tr>
<tr style="display:'.($pIsOpen?'table-row':'none').';"
id="printr_'.$lUniqId.'"><td><textarea
style="padding:2 5px;width:100%;overflow:auto;height:'.$lHeight.';background-color:transparent;
border:none;border-top:1px dashed gray;font-size:11px;font-family:monospace;"
title="Affichage avec print_r() pour debug" '.($pIsSQL===true?' onFocus="select();"':'').'>';
    @print_r($var);
    echo '</textarea></td></tr></table>';
}
while ($demande = mysql_fetch_array($requet)) {
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" media="all" type="text/css">
</head>
<body>
<form action="traiter_demande.php" method="get">
<fieldset>
<legend style="background-color:rgb(0,51,0);">Demande n°<?php echo $j ;$j=$j+1?></legend>
		<?php
		$tempslimite = 7;
		$date = date("d.m.Y");
		$timestamp = strtotime($demande['date']);
		$timestamp1 = strtotime($date);
		$calcul = $timestamp-$timestamp1;
		if($calcul<604800 ){
			//mail_dirgeant();
			?>
			<img src="Urgence.png" alt="Photo urgence" width="40" height="40"/></br>
			<a style="text-align: center;" >Attention notre invité arrive dans moin d'une semaine</a></br>
			<?php
		}
		
		
		?>
		</br>
		<a style="color:red;">nom : </a> <?php echo "".$demande['name'];?></br>
		<a style="color:red;">Prenom :</a><?php echo "".$demande['prenom'];?></br>
		<a style="color:red;">Email :</a><?php echo "".$demande['email'];?></br>
		<a style="color:red;">Date de la Demande :</a><?php echo "".$demande['dateDemande'];?></br>
		<a style="color:red;">Motif du voyage :</a><?php echo "".$demande['motif'];?></br></br>
		<input type="hidden" name="etat2" value="<?php echo "".$demande['etat']."" ?>">
		<input type="hidden" name="name" value="<?php echo "".$demande['name']."" ?>">
	
		
		<?php
			//affichage des demande qui ont l'etat en cour 
			if($demande['etat']=='en_cour'){ ?>
			</br><a> Demande à traiter avec votre compte ? </a><br/>
		 <input type="hidden" name="demande" value="<?php echo "".$demande['id_demande']."" ?>"></br>&nbsp;&nbsp; 
		<label><input type="submit" name="invite" value="oui"> </label></td><br/>
		<button type="button" onclick="toggle_text('span_txt2<?php echo $i?>');">non c'est un invité</button><br/>
		<span id="span_txt2<?php echo $i?>"style="display:none;"><br/>
		<Label style="font-family: Comic Sans MS;">  Son nom : &nbsp;&nbsp; <input type="text" placeholder="Entrer Son nom" name="name"></label><br><br>
		<Label style="font-family: Comic Sans MS;">  Son email : &nbsp;&nbsp; <input type="text" placeholder="Entrer son email" name="mail1"></label><br><br>
		<label><input type="submit" name="invite1" value="traitée"></label></td>
		</span>
		
		<script type="text/javascript">
		function toggle_text(id) {
		var span = document.getElementById(id);
		if(span.style.display == "none") {
		span.style.display = "inline";
		} else {
		span.style.display = "none";
		}
		}
 
</script> <br>
		<label></label><td></br>
	
		<?php
			$i=$i+1;
			}
			//affichage des demandes qui ont l'etat en cour	
			if($demande['etat']=='traitee'){ ?>
			<input type="hidden" name="demande" value="<?php echo "".$demande['id_demande']."" ?>">
			<label><input type="submit" name="etat" value="cloturer la demande">  </label></td><br/>
		<?php	
		}	
		?> 
	</fieldset>

	</body>
</html>		
</form>	
<?php 
}

mysql_close();
  exit();
}else{ 
 header("Location: http://localhost/projetEPA/groupe4/index.php"); 
      exit();}

?>
