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

		
		 <link href="assets/css/bootstrap.css" rel="stylesheet" />
   
		<link href="assets/css/font-awesome.css" rel="stylesheet" />
    
		<link href="assets/css/style.css" rel="stylesheet" />
		
		
			<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script> 
		
		<script type='text/javascript'> 
		$(function(){ 
		$(window).scroll(function () {
		//Au scroll dans la fenetre on déclenche la fonction 
		if ($(this).scrollTop() > 105) { 
		//si on a défilé de plus de 150px du haut vers le bas 
		$('#navigation').addClass("fixNavigation"); //on ajoute la classe "fixNavigation" à <div id="navigation"> 
		} else {
		$('#navigation').removeClass("fixNavigation");//sinon on retire la classe "fixNavigation" à <div id="navigation"> 
		}
		}); 
		}); 
		</script>
		
		
    </head>
    <body>
	<?php
	include("entete.php");
	?>
	
	<div class="content-wrapper">
		 
        <div class="container">
            <div class="col-md-6 div-con">
			<div class="connectionForm">
                <legend id="" class="titres">Connexion</legend>
                <form action="connection_handler.php" method="post">
                    <br>Pseudo<br>
                    <input class="formInput" type="text" name="pseudo">
                    <br>Mot de passe<br>
                    <input class="formInput" type="password" name="password">
					<br> <br>
                    <input class="formInput btn btn-primary dropdown-toggle registerButton" type="submit" value="Connexion">
                </form>
                <?php
                    if(isset($_SESSION) && !empty($_SESSION['failedConnection'])) {
                        echo '<p style="color: red; margin-top:1.5em;">Mauvais identifiants</p>';
                        $_SESSION['failedConnection'] = NULL;
                    }
                ?>
            </div>
		</div>
		
		<div class="col-md-6 div-inscrit">
			<div class="register">
                 <legend id="" class="titres">Vous n'êtes pas encore inscrit ?</legend>
                <a href="register.php" class="btn btn-success">Inscrivez vous !</a>
            </div>
		</div>
            
		</div>
		
		
		
	 </div>
	 
	 
	 <?php
	include("footer.php");
	?>

    </body>
</html>
