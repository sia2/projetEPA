<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function envoyerMail($client,$vendeur,$montant)
{

  $destinataire = $client;
  $email = htmlentities($vendeur);
 if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',str_replace('&amp;','&',$email)))
 {
  $sujet = 'Don EPA: ';
  $headers = "From: <" .$email. ">\n";
  $headers .= "Reply-To: ".$email."\n";
  $message .= "Nom : ".stripslashes($name)."\n".stripslashes(" MERCI POUR LE DON DE :").stripcslashes($montant);
  $headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"";
 if(mail($destinataire,$sujet,$message,$headers))
  {
	   mail($email,'Don association EPA','Bonjour, Nous avons bien recu votre don de :'.$montant.' euros !</br> Nous vous remercions d\'avoir contribuer à notre projet. \n Cordialement l\'Equipe EPA');
	}
	  else
	{
	 echo "<strong style=\"color:#ff0000;\">Une erreur c'est produite lors de l'envois du message.</strong>";
  }
  
}
}
	function enregistrerDon($nom,$prenom,$emailclient,$tel,$adresse,$ville,$cp,$numpaypal,$etatpaiement,$montant,$typep) {	
		try {// On se connecte � MySQL
			$bdd = new PDO('mysql:host=localhost;dbname=EPA', 'root', 'caramelle');
		}
		catch(Exception $e) {// En cas d'erreur, on affiche un message et on arr�te tout
				die('Erreur : '.$e->getMessage());
		}
                 if(strlen($numpaypal)!= 1)
                {
                    //On prepare la requete pour trouver ce login dans la BD
                    $valide = $bdd->prepare('SELECT * FROM don WHERE objet_don=?');
                    //On execute la requete
                    $valide->execute(array($numpaypal));

                    //Compte le nb de lignes dans le resultat pour verifier si le num existe
                    $nb = $valide->rowCount();
                    //Si le num est déjà présent est deja dans la BD
                    
                    if($nb > 0) { 
                            return -2;
                    }		 
                    $valide->closeCursor(); // Termine le traitement de la requête
                }
               
                    $numid = verififexist($emailclient);
                    if ( $numid == -1)
                    {
                    //REQUETE
                    $reponse = $bdd->query('SELECT MAX(id_personne_ph) AS num_max FROM personne_physique');
                    if($donnees = $reponse->fetch()) {
                            $numid = $donnees['num_max']+1;
                    }
                    $reponse->closeCursor();
                    //REQUETE
                    $req1 = $bdd ->prepare('INSERT INTO personne_physique(id_personne_ph,nom_personne_ph,prenom_personne_ph,email,tel,origine,sexe,profession,centre_interet)
                            VALUES (:id_personne_ph,:nom_personne_ph,:prenom_personne_ph,:email,:tel,:origine,:sexe,:profession,:centre_interet)');

                    $req1->execute(array(
                                    'id_personne_ph' => $numid,
                                    'nom_personne_ph' => $nom,
                                    'prenom_personne_ph' => $prenom,
                                    'email' => $emailclient,
                                    'tel' => $tel,
                                    'origine' => "France",
                                    'sexe' => "NA",
                                    'profession' => "NA",
                                    'centre_interet' => "NA"
                                     ));
                    $req1->closeCursor();
                    //REQUETE
                      $reponse12 = $bdd->query('SELECT MAX(id_adresse) AS num_max FROM adresse');
                    if($donnees = $reponse12->fetch()) {
                            $numadresse = $donnees['num_max']+1;
                    }
                    $reponse12->closeCursor();
                    //REQUETE
                    $req11 = $bdd ->prepare('INSERT INTO adresse(id_adresse,num_rue,nom_rue,code_postale,id_personne_ph)
                    VALUES (:id_adresse,:num_rue,:nom_rue,:code_postale,:id_personne_ph)');
                    $req11->execute(array(
                                    'id_adresse' => $numadresse,
                                    'num_rue' => $adresse,
                                    'nom_rue' => $ville,
                                    'code_postale' => $cp,
                                    'id_personne_ph' => $numid
                                     ));
                    $req11->closeCursor();
                    }
                    //REQUETE 
                    $reponse1 = $bdd->query('SELECT MAX(id_don) AS num_max FROM don');

                    if($donnees = $reponse1->fetch()) {
                            $numdonmax = $donnees['num_max']+1;
                    }

                    $reponse1->closeCursor();
                    //REQUETE
                    if ($numpaypal=="a")
                    {
                        $numpaypal = $numdonmax;
                    }
                    //On prepare la requete pour inserer les valeurs utilisateur dans la BD
                    $req2 = $bdd->prepare('INSERT INTO don(id_don, objet_don, id_recu_fiscal) 
                                                            VALUES ( :id_don, :objet_don , :id_recu_fiscal )');
                    //On execute la requete
                    $req2->execute(array(
                                    'id_don' => $numdonmax,
                                    'objet_don' => $numpaypal,
                                    'id_recu_fiscal' => 0,
                                    ));

                    $req2->closeCursor(); // Termine le traitement de la requ�te
                    //REQUETE
                    $reponse2 = $bdd->query('SELECT MAX(id_paiement) AS num_max FROM paiement');

                    if($donnees = $reponse2->fetch()) {
                            $numpaiementmax = $donnees['num_max']+1;
                    }

                    $reponse2->closeCursor();
                    $date = date('Y-m-d');
                    //REQUETE
                    $req11 = $bdd ->prepare('INSERT INTO paiement(id_paiement,etat_paiement,date,montant,idtypeP,id_don,id_personne_ph)
                    VALUES (:id_paiement,:etat_paiement,:date,:montant,:idtypeP,:id_don,:id_personne_ph)');
                    $req11->execute(array(
                                    'id_paiement' => $numpaiementmax,
                                    'etat_paiement' => $etatpaiement,
                                    'date' => $date,
                                    'montant' => $montant,
                                    'idtypeP' => $typep,
                                    'id_don' => $numdonmax,
                                    'id_personne_ph' => $numid
                                     ));
                    $req11->closeCursor();               
                    return 1; 
                
	}
        function enregistrerDon2($emailclient,$numpaypal,$etatpaiement,$montant,$typep) {	
		try {// On se connecte � MySQL
			$bdd = new PDO('mysql:host=localhost;dbname=EPA', 'root', 'caramelle');
		}
		catch(Exception $e) {// En cas d'erreur, on affiche un message et on arr�te tout
				die('Erreur : '.$e->getMessage());
		}
                $numid = verififexist($emailclient);
                if ( $numid == -1)
                {
                    return -1;
                }
                //REQUETE 
                $reponse1 = $bdd->query('SELECT MAX(id_don) AS num_max FROM don');
		
		if($donnees = $reponse1->fetch()) {
			$numdonmax = $donnees['num_max']+1;
		}
		
		$reponse1->closeCursor();
                //REQUETE
                 if ($numpaypal=="a")
                {
                    $numpaypal = $numdonmax;
                }
		//On prepare la requete pour inserer les valeurs utilisateur dans la BD
		$req2 = $bdd->prepare('INSERT INTO don(id_don, objet_don, id_recu_fiscal) 
							VALUES ( :id_don, :objet_don , :id_recu_fiscal )');
		//On execute la requete
		$req2->execute(array(
				'id_don' => $numdonmax,
				'objet_don' => $numpaypal,
				'id_recu_fiscal' => 0,
				));
		
		$req2->closeCursor(); // Termine le traitement de la requ�te
                //REQUETE
                $reponse2 = $bdd->query('SELECT MAX(id_paiement) AS num_max FROM paiement');
		
		if($donnees = $reponse2->fetch()) {
			$numpaiementmax = $donnees['num_max']+1;
		}
		
		$reponse2->closeCursor();
                $date = date('Y-m-d');
                //REQUETE
                $req11 = $bdd ->prepare('INSERT INTO paiement(id_paiement,etat_paiement,date,montant,idtypeP,id_don,id_personne_ph)
                VALUES (:id_paiement,:etat_paiement,:date,:montant,:idtypeP,:id_don,:id_personne_ph)');
                $req11->execute(array(
				'id_paiement' => $numpaiementmax,
				'etat_paiement' => $etatpaiement,
                                'date' => $date,
                                'montant' => $montant,
				'idtypeP' => $typep,
				'id_don' => $numdonmax,
                                'id_personne_ph' => $numid
                                 ));
		$req11->closeCursor();
                

                
		return 1; 		
	}
        function verififexist($email)
        {
          		try {// On se connecte à MySQL
			$bdd = new PDO('mysql:host=localhost;dbname=EPA', 'root', 'caramelle');
		}
		catch(Exception $e) {// En cas d'erreur, on affiche un message et on arrête tout
				die('Erreur : '.$e->getMessage());
		}
		
		//On prepare la requete pour trouver ce login dans la BD
		$test = $bdd->prepare('SELECT * FROM personne_physique WHERE email=?');
		//On execute la requete
		$test->execute(array($email));
		
		//Compte le nb de lignes dans le resultat pour verifier si le login existe
		$count = $test->rowCount();
		//Si le login est deja dans la BD
		if($count > 0) {
                    
                    $numid = $test ->fetch();
			$val = $numid['id_personne_ph'];
                         
                        return $val;
            
		}
		 
		$test->closeCursor(); // Termine le traitement de la requête
		
		return -1;  
        }
        function afficherhistorique()
        {
            try{
			$bdd = new PDO('mysql:host=localhost;dbname=EPA', 'root', 'caramelle');
		}
		catch (Exception $e){
			die('Erreur : ' . $e->getMessage());
		}
		
		//On execute la requete 
		$reponse = $bdd->query("SELECT d.objet_don,ph.nom_personne_ph,ph.prenom_personne_ph,p.date,p.id_don,p.montant,p.etat_paiement,ph.id_personne_ph,ph.email, ph.tel, a.num_rue, a.nom_rue,a.code_postale
                                        FROM paiement p,don d,personne_physique ph, adresse a
                                        WHERE p.id_don = d.id_don
                                        AND ph.id_personne_ph = p.id_personne_ph
                                        AND ph.id_personne_ph = a.id_personne_ph
                                        ORDER BY p.date DESC");
		$i = 0;
		$ok = true;
		
		//On enregistre les ingr�dients
               
		while ($donnees = $reponse->fetch()){
                     echo'<tr>';
                    echo '<td>'.$donnees['objet_don'].'</td>';
                    echo '<td>'.strtoupper($donnees['nom_personne_ph']).' '.$donnees['prenom_personne_ph'].'</td>';
                    $date = date_create($donnees['date']);
                    echo '<td>'.date_format($date,"d/m/Y").'</td>';
                    echo '<td>'.$donnees['montant'].'€</td>';
                    if($donnees['id_don'] == NULL )echo '<td> Cotisation </td>';
                    else echo '<td> Don </td>';
                    echo '<td>'.$donnees['etat_paiement'].'</td>';
                    echo'<td>
                        <form method="post">
                            <input type="hidden" name="id_don" value='.$donnees['id_personne_ph'].'>
                            <input type="hidden" name="nom_personne_ph" value='.$donnees['nom_personne_ph'].'>
                            <input type="hidden" name="prenom_personne_ph" value='.$donnees['prenom_personne_ph'].'>
                            <input type="hidden" name="email" value='.$donnees['email'].'>';
                            $lieu = explode(" ", $donnees['num_rue']);
                            $i = 0;
                            foreach ($lieu as $val){ echo'<input type="hidden" name="rue'.$i.'" value='.$val.'>';$i++;}
                            echo '<input type="hidden" name="ville" value='.$donnees['nom_rue'].'>
                            <input type="hidden" name="cp" value='.$donnees['code_postale'].'>
                            <input type="hidden" name="tel" value='.$donnees['tel'].'>
                            
                            <button name="submit_button" type="submit" type="button" class="btn btn-default btn-xs " >
                  <span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span>
                  </button>
                        </form>
                        </td>
                  <td><a href="historique.php?nom='.$donnees['nom_personne_ph'].'&amp;prenom='.$donnees['prenom_personne_ph'].'&amp;date='.$donnees['date'].'&amp;adresse='.$donnees['num_rue'].
                                    '&amp;cp='.$donnees['nom_rue'].'&amp;ville='.$donnees['code_postale'].'&amp;montant='.$donnees['montant'].'&amp;id='.$donnees['id_personne_ph'].'&amp;mail='.$donnees['email'].'"  class="btn btn-info" >Envoyer recu fiscal</a></form></td>';
                echo'</tr>';
			$i++;
		}
		
		//On met fin � la requ�te
		$reponse->closeCursor();
		
        }
        function afficherinfoscomp($id_personne)
        {
             try{
			$bdd = new PDO('mysql:host=localhost;dbname=EPA', 'root', 'caramelle');
		}
		catch (Exception $e){
			die('Erreur : ' . $e->getMessage());
		}
		
		//On execute la requete 
		$reponse2 = $bdd->query("SELECT p.date,p.id_don,p.montant
                                        FROM paiement p
                                        WHERE p.id_personne_ph = '".$id_personne."'");
		$i = 0;		
		//On enregistre les ingr�dients
               
		while ($donnees = $reponse2->fetch()){
                     echo'<tr>';                    
                    echo '<td>'.$donnees['date'].'</td>';
                    echo '<td>'.$donnees['montant'].'€</td>';
                    if($donnees['id_don'] == NULL )echo '<td> Cotisation </td>';
                    else echo '<td> Don </td>';
                    echo '<td>'.$donnees['etat_paiement'].'</td>';
                    echo'<tr>';
			$i++;
		}
		
		//On met fin � la requ�te
		$reponse2->closeCursor();
                
        }
        function pdf($nom,$prenom,$date,$adresse,$cp,$ville,$montant,$id)
{
// FDF header section
$fdf_header = <<<FDF
%FDF-1.2
%,,oe"
1 0 obj
<<
/FDF << /Fields [
FDF;

// FDF footer section
$fdf_footer = <<<FDF
] >> >>
endobj
trailer
<</Root 1 0 R>>
%%EOF;
FDF;

$test = date_create($date);
$jour = date_format($test,"d");
$mois =  date_format($test,"m");
$annee =  date_format($test,"Y");
// FDF content section
$fdf_content  = "<</T(z1)/V({$id})>>\n";
$fdf_content .= "<</T(z29)/V({$nom})>>\n";
$fdf_content .= "<</T(z30)/V({$prenom})>>\n";
$fdf_content .= "<</T(z31)/V({$adresse})>>\n";
$fdf_content .= "<</T(z32)/V({$cp})>>\n";
$fdf_content .= "<</T(z33)/V({$ville})>>\n";
$fdf_content .= "<</T(z34)/V({$montant})>>\n";
$montantlettre=int2str($montant);
$fdf_content .= "<</T(z35)/V({$montantlettre})>>\n";
$fdf_content .= "<</T(z36)/V({$jour})>>\n";
$fdf_content .= "<</T(z37)/V({$mois})>>\n";
$fdf_content .= "<</T(z38)/V({$annee})>>\n";
$test = date('d-m-y');
$jourr = date_format($test,"d");
$moisr =  date_format($test,"m");
$anneer =  date_format($test,"Y");
$fdf_content .= "<</T(z52)/V({$jourr})>>\n";
$fdf_content .= "<</T(z53)/V({$moisr})>>\n";
$fdf_content .= "<</T(z54)/V({$anneer})>>\n";
$content = $fdf_header . $fdf_content . $fdf_footer;

// Creating a temporary file for our FDF file.
$FDFfile = tempnam(sys_get_temp_dir(), gethostname());
file_put_contents($FDFfile, $content);

// Merging the FDF file with the raw PDF form
exec("/usr/bin/pdftk /var/www/SIA/PDF/form.pdf fill_form $FDFfile output /var/www/SIA/PDF/output.pdf flatten"); 
// Removing the FDF file as we don't need it anymore
unlink($FDFfile);
 


}

function int2str($a)
{
$convert = explode('.',$a);
if (isset($convert[1]) && $convert[1]!=''){
return int2str($convert[0]).' euros'.' et '.int2str($convert[1]).' centimes' ;
}
if ($a<0) return 'moins '.int2str(-$a);
if ($a<17){
switch ($a){
case 0: return 'zero';
case 1: return 'un';
case 2: return 'deux';
case 3: return 'trois';
case 4: return 'quatre';
case 5: return 'cinq';
case 6: return 'six';
case 7: return 'sept';
case 8: return 'huit';
case 9: return 'neuf';
case 10: return 'dix';
case 11: return 'onze';
case 12: return 'douze';
case 13: return 'treize';
case 14: return 'quatorze';
case 15: return 'quinze';
case 16: return 'seize';
}
} else if ($a<20){
return 'dix-'.int2str($a-10);
} else if ($a<100){
if ($a%10==0){
switch ($a){
case 20: return 'vingt';
case 30: return 'trente';
case 40: return 'quarante';
case 50: return 'cinquante';
case 60: return 'soixante';
case 70: return 'soixante-dix';
case 80: return 'quatre-vingt';
case 90: return 'quatre-vingt-dix';
}
} elseif (substr($a, -1)==1){
if( ((int)($a/10)*10)<70 ){
return int2str((int)($a/10)*10).'-et-un';
} elseif ($a==71) {
return 'soixante-et-onze';
} elseif ($a==81) {
return 'quatre-vingt-un';
} elseif ($a==91) {
return 'quatre-vingt-onze';
}
} elseif ($a<70){
return int2str($a-$a%10).'-'.int2str($a%10);
} elseif ($a<80){
return int2str(60).'-'.int2str($a%20);
} else{
return int2str(80).'-'.int2str($a%20);
}
} else if ($a==100){
return 'cent';
} else if ($a<200){
return int2str(100).' '.int2str($a%100);
} else if ($a<1000){
return int2str((int)($a/100)).' '.int2str(100).' '.int2str($a%100);
} else if ($a==1000){
return 'mille';
} else if ($a<2000){
return int2str(1000).' '.int2str($a%1000).' ';
} else if ($a<1000000){
return int2str((int)($a/1000)).' '.int2str(1000).' '.int2str($a%1000);
}
else if ($a==1000000){
return 'millions';
}
else if ($a<2000000){
return int2str(1000000).' '.int2str($a%1000000).' ';
}
else if ($a<1000000000){
return int2str((int)($a/1000000)).' '.int2str(1000000).' '.int2str($a%1000000);
}
}
function mailrecufiscal($mail_to)
{
    $from_mail = "association@epa.com"; //Expediteur  
    $from_name = "Association EPA"; //Votre nom, ou nom du site  
    $reply_to = "association@epa.com"; //Adresse de réponse  
    $subject = "Recu fiscal - Don association EPA";      
    $file_name = "output.pdf";  
    $path = $_SERVER['DOCUMENT_ROOT']."/fichiers";  
    $typepiecejointe = filetype("PDF/output.pdf");  
    $data = chunk_split( base64_encode(file_get_contents("PDF/output.pdf")) );  
    //Génération du séparateur  
    $boundary = md5(uniqid(time()));  
    $entete = "From: $from_mail \n";  
    $entete .= "Reply-to: $from_mail \n";  
    $entete .= "X-Priority: 1 \n";  
    $entete .= "MIME-Version: 1.0 \n";  
    $entete .= "Content-Type: multipart/mixed; boundary=\"$boundary\" \n";  
    $entete .= " \n";  
    $message  = "--$boundary \n";  
    $message .= "Content-Type: text/html; charset=\"iso-8859-1\" \n";  
    $message .= "Content-Transfer-Encoding:8bit \n";  
    $message .= "\n";  
    $message .= "Bonjour,  
    Veuillez trouver ci-joint le recu fiscal de votre don à EPA  
    Cordialement";  
    $message .= "\n";  
    $message .= "--$boundary \n";  
    $message .= "Content-Type: $typepiecejointe; name=\"$file_name\" \n";  
    $message .= "Content-Transfer-Encoding: base64 \n";  
    $message .= "Content-Disposition: attachment; filename=\"$file_name\" \n";  
    $message .= "\n";  
    $message .= $data."\n";  
    $message .= "\n";  
    $message .= "--".$boundary."--";  


if(mail($mail_to, $subject, $message, $entete))
{
    echo '<script language="javascript">alert("Le recu fiscal a bien été envoyé à :'.$mail_to.' ")</script>';
}
else
{
    echo '<script language="javascript">alert("Attention, le mail n\'a pas été envoyé à :'.$mail_to.' ! ")</script>';

}


}
?>