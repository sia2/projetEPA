<?php

include("fonction.php");

connectMaBase();
$email;
$requete= mysql_query("SELECT email FROM adherent");
$i=0;
while ($row = mysql_fetch_array($requete)) {
	
?>
		<td><?php echo $row[email]; $email[$i] = $row[email];?></td>
		
   <?php
   $i=$i+1;
}
print_r($email);
$message = "notification : vous avez une demande";
$message = wordwrap($message, 70, "\r\n");
mail($email[0], 'Mon Sujet', $message);
mysql_close();

?>





