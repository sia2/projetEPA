<?php
    session_start();

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once('class/class_db.php');

    if(isset($_SESSION) && !empty($_SESSION['user']) && !empty($_SESSION['password'])) {
        header("Location: connected.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/register.css">
    </head>
    <body>
        <h1><u>Ensemble pour l'Afrique</u></h1>
        <div class="container">
            <div class="connectionForm">
                <h3>Connexion</h3>
                <form action="connection_handler.php" method="post">
                    <br>Pseudo<br>
                    <input class="formInput" type="text" name="pseudo">
                    <br>Mot de passe<br>
                    <input class="formInput" type="password" name="password"><br>
                    <input class="formInput btn btn-primary dropdown-toggle registerButton" type="submit" value="Connexion">
                </form>
                <?php
                    if(isset($_SESSION) && !empty($_SESSION['failedConnection'])) {
                        echo '<p style="color: red; margin-top:1.5em;">Mauvais identifiants</p>';
                        $_SESSION['failedConnection'] = NULL;
                    }
                ?>
            </div>
            <div class="register">
                <h3>Vous n'êtes pas encore inscrit ?</h3>
                <a href="register.php" class="btn btn-success">Inscrivez vous !</a>
            </div>
        </div>
    </body>
</html>
