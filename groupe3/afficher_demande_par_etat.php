<?php

include("fonction.php");

connectMaBase();
$etat=$_GET[etat];
$requet= mysql_query("SELECT * FROM demande_accueil WHERE etat = '$etat' ");
echo "Ce sont les demande qui ont l etat ".$etat;
$j=1;
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
		<legend>Demande n°<?php echo $j ;$j=$j+1?></legend>
	
		<a style="color:red;">nom : </a> <?php echo "".$demande[name];?></br>
		<a style="color:red;">Prenom :</a><?php echo "".$demande[prenom];?></br>
		<a style="color:red;">Email :</a><?php echo "".$demande[email];?></br>
		<a style="color:red;">Date de la Demande :</a><?php echo "".$demande[dateDemande];?></br>
		<a style="color:red;">Motif du voyage :</a><?php echo "".$demande[motif];?></br></br>
		<?php
		$tempslimite = 7;
		$date = date("d.m.Y");
		$timestamp = strtotime($demande[date]);
		$timestamp1 = strtotime($date);
		$calcul = $timestamp-$timestamp1;
		if($calcul<604800 ){
			//mail_dirgeant();
			?>
			<img src="Urgence.png" alt="Photo urgence" width="60" height="50"/>
			<a style="text-align: center;" >Attention notre invité arrive bientôt</a></br>
			<?php
		}
		
		
		?>
		<?php
			if($demande[etat]=='en_cour'){ ?>
			</br><a> Demande à traiter avec votre compte ? </a><br/>
		 <input type="hidden" name="demande" value="<?php echo "".$demande[id]."" ?>"></br>&nbsp;&nbsp; 
		<label><input type="submit" name="invite" value="oui"> </label></td>
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
			if($demande[etat]=='traitee'){ ?>
			<p> Demande à cloturer</p>
			<input type="hidden" name="demande" value="<?php echo "".$resultat[id]."" ?>">
			<label><input type="submit" name="etat" value="cloturer la demande">  </label><br/>
			
		<?php	
		}	
		?> 
	</fieldset>	
</form>	
</body>
</html>
   <?php
   
}

mysql_close();
?>
