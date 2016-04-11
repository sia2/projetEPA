<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/register.css">
    </head>
    <body>
        <h1><u>Ensemble pour l'Afrique</u></h1>
        <div class="registerForm">
            <h1>Formulaire d'inscription</h1>
            <form action="register_handler.php" method="post">
                <br>Pseudo<br>
                <input class="formInput" type="text" name="pseudo">
                <br>Mot de passe<br>
                <input class="formInput" type="password" name="password">
                <br>Nom<br>
                <input class="formInput" type="text" name="name">
                <br>Prénom<br>
                <input class="formInput" type="text" name="firstname">
                <br>Origine<br>
                <input class="formInput" type="text" name="origine">
                <br>Sexe<br>
                <div class="gender formInput">
                    <input type="radio" name="gender" value="male"> Male<br>
                    <input type="radio" name="gender" value="female"> Female<br>
                </div>
                <br>Telephone<br>
                <input class="formInput" type="text" name="tel">
                <br>Numéro de rue<br>
                <input class="formInput" type="text" name="streetNumber">
                <br>Nom de rue<br>
                <input class="formInput" type="text" name="streetName">
                <br>Code postal<br>
                <input class="formInput" type="text" name="postalCode">
                <br>Ville<br>
                <input class="formInput" type="text" name="city">
                <br>Email<br>
                <input class="formInput" type="email" name="email">
                <br>Profession<br>
                <input class="formInput" type="text" name="profession">
                <br>Centre d'intérêts<br>
                <input class="formInput" type="text" name="interests">
                <br>
                <input class="formInput btn btn-primary dropdown-toggle registerButton" type="submit" value="Envoyer">
            </form>
        </div><br>
    </body>
</html>
