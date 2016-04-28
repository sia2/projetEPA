<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/register.css">
    </head>
    <body>
        <h1><u>Ensemble pour l'Afrique</u></h1>
        <?php
            if(isset($_SESSION) && isset($_SESSION['user']) && isset($_SESSION['password'])) {
              if(isset($_SESSION['membershipDemand']) && $_SESSION['membershipDemand'] != 'exist' && $_SESSION['membership'] != 'exist' && ($_SESSION['status'] != 'President' || $_SESSION['status'] != 'Tresorier' || $_SESSION['status'] != 'Secretaire' ||
              $_SESSION['status'] != 'Membre CA')) {
        ?>
                <a class="btn btn-primary" href="membershipDemand_handler.php">Devenir adhérent</a><br><br>
        <?php
              } else if(isset($_SESSION['membershipDemand']) && $_SESSION['membershipDemand'] != 'exist' && $_SESSION['membership'] == 'exist') {
                  echo "<p>Votre statut au sein de l'association : <b><u>".$_SESSION['status']."</b></u>.</p>";
        ?>
                  <a class="btn btn-primary" href="../groupe3/affichagedemande.php">Afficher la liste des demandes d'accueil </a><br><br>
        <?php
              } else if($_SESSION['status'] == 'President'){

              } else {
                  echo "<p>Votre demande d'adhésion a bien été prise en compte. Un responsable vous contactera prochainement.</p>";
              }
              if($_SESSION['status'] != 'President' && $_SESSION['status'] != 'Tresorier' && $_SESSION['status'] != 'Secretaire' && $_SESSION['status'] != 'Membre CA') {
        ?>
                <a class="btn btn-primary" href="../groupe3/FormFr.html">Vous êtes étudiant et souhaitez faire une demande d'accueil</a><br><br>
                <a class="btn btn-primary" href="../groupe5/liste-projet.php">Liste des projets</a><br><br>
        <?php
              }
                if(isset($_SESSION['status']) && ($_SESSION['status'] == 'President' || $_SESSION['status'] == 'Secretaire' || $_SESSION['status'] == 'Tresorier' || $_SESSION['status'] == 'Membre CA')) {
        ?>
                  <a class="btn btn-info" href="membershipDemand.php">Gestion des demandes d'adhésions</a><br><br>
                  <a class="btn btn-success" href="membershipList.php">Liste des adhérents</a><br><br>
                  <a class="btn btn-success" href="membershipGestion.php">Gestion des adhérents</a><br><br>
        <?php
                }
                if($_SESSION['status'] == 'Tresorier') {
        ?>
                  <a class="btn btn-info" href="http://www.ciel.com">Ciel</a><br><br>
        <?php
                }   if($_SESSION['status'] == 'Secretaire') {
        ?>
                  <a class="btn btn-info" href="membershipUpdate.php">Mise à jour informations adhérent</a><br><br>
        <?php
                }
                if($_SESSION['status'] == 'Secretaire' || $_SESSION['status'] == 'President') {
        ?>
                  <a class="btn btn-warning" href="meeting_form.php">Créer une réunion</a><br><br>
        <?php
                }
        ?>
                <a href="deconnection_handler.php" class="btn btn-danger">Se déconnecter</a>
        <?php
            } else {
                echo "Vous n'êtes pas connecté.";
            }
        ?>
    </body>
</html>
