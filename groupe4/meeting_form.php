<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/register.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h1><u>Ensemble pour l'Afrique</u></h1>
        <a type='button' class='btn btn-info' href="connected.php">Accueil</a>
        <h2>Formulaire de création d'une réunion</h2>
        <form action="" method="post">
            <br>Ordre du jour<br>
            <input class="formInput" type="text" name="pseudo">
            <br>Date<br>
            <input id="datePicker" class="formInput" type="date" name="date">
            <br>Heure<br>
            <input class="formInput" type="time" name="pseudo">
            <br>Message<br>
            <textarea rows="10" cols="50" name="message" class="formInput"></textarea>
            <br>Liste participants<br>
            <div class="list-group">
              <!-- <span><a>Joran Chalal</a><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></span><br><br>
              <span><a>Joran Chalal</a><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></span><br><br>
              <span><a>Joran Chalal</a><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></span><br><br> -->
            </div><br>
            <span>
              <a class="btn btn-success" title="Ajouter un participant" data-html="true" data-toggle="popover" data-content="
              <div id='addPopover'>
                <div class='form-group'>
                    <p><b><u>Prenom</u></b></p>
                    <input id='searchBarFirstname' type='text' class='form-control' placeholder='Prenom'>
                    <p><b><u>Nom</u></b></p>
                    <input id='searchBarName' type='text' class='form-control' placeholder='Nom'>
                    <a class='btn btn-info' onclick='user_suggestion()'><span class='glyphicon glyphicon-search'></a></button>
                </div>
                <div id='searchResult'></div>
              </div>
              "><span class="glyphicon glyphicon-plus" style="vertical-align:middle"></span></a><br>
            </span><br>
            <input class="formInput btn btn-primary dropdown-toggle registerButton" type="submit" value="Envoyer convocation"><br><br>
        <script>
          $(document).ready(function(){
              $('[data-toggle="popover"]').popover();
          });
        </script>
        <script>
        function user_suggestion()
        {
            var name = document.getElementById("searchBarName").value;
            var firstname = document.getElementById("searchBarFirstname").value;
            var xhr;
            if (window.XMLHttpRequest) { // Mozilla, Safari, ...
              xhr = new XMLHttpRequest();
            } else if (window.ActiveXObject) { // IE 8 and older
              xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
            var data = "firstname="+ firstname + "&name=" + name;
             xhr.open("GET", "user_suggestions.php?"+data, true);
             xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
             xhr.send(data);
             xhr.onreadystatechange = display_data;
          	function display_data() {
          	 if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                  var result = "<p></p>";
                  document.getElementById("searchResult").innerHTML = xhr.responseText['id_personne_ph'];
          	    }
             }
            }
        }
        </script>
    </body>
</html>
