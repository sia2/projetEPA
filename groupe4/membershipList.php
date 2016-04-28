<?php
    session_start();

    require_once('class/class_db.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/register.css">
        <style>
          table, th, td {
              border: 1px solid black;
              border-collapse: collapse;
          }
          th, td {
            text-align: center;
            height: 3.5em;
          }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h1><u>Ensemble pour l'Afrique</u></h1>
        <a type='button' class='btn btn-info' href="connected.php">Accueil</a>
        <h3>Gestion des adhérents</h3><br><br>
        <h4><b><u>Liste des adhérents :</u></b></h4><br>
        <div class="membershipDemand_result" style="text-align: center;">
          <table style="width:90%; text-align: center; margin: 0 auto;">
            <tr>
              <th style="display:none;">Id</th>
              <th>Prénom</th>
              <th>Nom</th>
              <th>Statut</th>
              <th>Plus d'infos</th>
            </tr>
            <?php
              $database = new Database();
              $database->open_db();
              $array = $database->get_all_membership();
              $i = 0;
              foreach ($array as $value) {
                  $jsonIterator = new RecursiveIteratorIterator(
                  new RecursiveArrayIterator(json_decode($value, TRUE)),
                  RecursiveIteratorIterator::SELF_FIRST);

                  $nom = '';
                  $prenom = '';
                  $status = '';
                  $id = '';
                  $tel = '';
                  $address = '';
                  $email = '';
                  $gender = '';
                  $profession = '';
                  $interests = '';

                  foreach ($jsonIterator as $key => $val) {
                      if(is_array($val)) {

                      } else {
                          if($key == 'prenom_personne_ph') {
                              $prenom = $val;
                          } else if($key == 'nom_personne_ph') {
                              $nom = $val;
                          } else if($key == 'id_personne_ph') {
                              $id = $val;
                          } else if($key == 'status') {
                              $status = $val;
                          } else if($key == 'tel') {
                              $tel = $val;
                          } else if($key == 'adresse_personne_ph') {
                              $address = $val;
                          } else if($key == 'cp_personne_ph') {
                              $postalCode = $val;
                          } else if($key == 'ville_personne_ph') {
                              $city = $val;
                          } else if($key == 'email') {
                              $email = $val;
                          } else if($key == 'sexe') {
                              $gender = $val;
                          } else if($key == 'profession') {
                              $profession = $val;
                          } else if($key == 'centre_interet') {
                              $interests = $val;
                          }
                      }
                  }

                  echo "<tr>
                          <td style='display: none;' id='"."id".$i."'>".$id."</td>
                          <td id='"."firstname".$i."'>".$prenom."</td>
                          <td id='"."name".$i."'>".$nom."</td>
                          <td id='"."status".$i."'>".$status."</td>
                          <td id='"."infos".$i."'><a data-trigger='hover' data-toggle='popover' data-html='true' title='Informations supplémentaires' data-content='
                                                  <b><u>Nom</u></b> : ".$nom." <br>
                                                  <b><u>Prénom</u></b> : ".$prenom." <br>
                                                  <b><u>Email</u></b> : ".$email." <br>
                                                  <b><u>Adresse</u></b> : ".$address." <br>
                                                  <b><u>Téléphone</u></b> : ".$tel." <br>
                                                  <b><u>Sexe</u></b> : ".$gender." <br>
                                                  <b><u>Profession</u></b> : ".$profession." <br>
                                                  <b><u>Centre d interets</u></b> : ".$interests."'><span class='glyphicon glyphicon-info-sign'></span></a></td>
                       </tr>";
                  $i = $i + 1;
              }
              $database->close_db();
            ?>
          </table>
        </div>
        <script>
          $(document).ready(function(){
            $('[data-toggle="popover"]').popover();
          });
        </script>
    </body>
</html>
