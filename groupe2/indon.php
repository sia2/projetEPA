<!DOCTYPE html>
<?php include_once('function.php');?>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
   <link rel="shortcut icon" href="../assets/img/user.png">

    <title>Paiment EPA</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="../assets/css/main.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../assets/js/hover.zoom.js"></script>
    <script src="../assets/js/hover.zoom.conf.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-default-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">EPA</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="about.html">Forum</a></li>
            <li><a href="blog.html">Forum2</a></li>
            <li><a href="contact.html">Forum 3</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    	<!-- +++++ Footer Section +++++ -->
	<div class="container pt">
		<div class="row mt">
			<div class="col-lg-6 col-lg-offset-3 centered">
				<h3>Ajouter un don</h3>
				<hr>
				<p>Don recu par courrier (chèque ou espèce)</p>
                                <?php 
if(isset($_POST['valider']))
{
    if(isset($_POST['type']) and isset($_POST['typep']) and  isset($_POST['montant']))
    {
        if($_POST['montant']<20)
        {
            echo'<div class="alert alert-danger" role="alert">Don minimum de 20 € !</div>';
        }
        else
        {
            if(isset($_POST['email']) and strlen($_POST['email'])>1)
            {
                if($_POST['type'] == "don")
                {
                    if(enregistrerDon2($_POST['email'],"a","Validé", $_POST['montant'],$_POST['typep']) == -1)
                    {
                        echo'<div class="alert alert-danger" role="alert">Ce mail n\'identifie personne. Remplissez le formulaire ou vérifier le mail !</div>';
                    }
                    else
                    {
                     echo '<div class="alert alert-success" role="alert">Transaction enregistré 1 !</div>';
                    }
                }
                else
                {
                    //ICI AJOUTER LA FONCTION POUR ADHERENT
                }
            }
            else if ( isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['adresse']) and isset($_POST['cp']) and isset($_POST['city']) and isset($_POST['phone']) and isset($_POST['eemail'])) 
            {
                 if($_POST['type'] == "don")
                {
                    if(enregistrerDon($_POST['nom'], $_POST['prenom'], $_POST['eemail'], $_POST['phone'], $_POST['adresse'], $_POST['city'], $_POST['cp'], "a", "Validé", $_POST['montant'],$_POST['typep']) ==1)
                    {
                        echo '<div class="alert alert-success" role="alert">Transaction enregistré !</div>';
                    }
                    else
                    {
                         echo'<div class="alert alert-danger" role="alert">Quelque chose ne va pas !</div>';
                    }
                }
                else
                {
                                        //ICI AJOUTER LA FONCTION POUR ADHERENT

                }
            }
            else
            {
                echo '<div class="alert alert-success" role="alert">Veuillez à renseigner tout les champs ! </div>';
            }
        }
        
    }
    else
{
    echo'<div class="alert alert-danger" role="alert">Attention danger !</div>';
}
}

?>
			</div>
                    
		</div>
            				<div class="col-lg-8 col-lg-offset-2 centered">

  <form role="form-vertical" method="post">
            <div class="input-group">
                Selectionner le type <select  name="type"  class="btn btn-default-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
  <option>cotisation</option>
  <option>don</option>
</select>
<!-- /btn-group -->
      <div class="input-group-addon">$</div>
      <input type="text" name="montant" class="form-control"  placeholder="Montant">
      <div class="input-group-addon">.00</div>         
            </div><!-- /input-group -->   
<label class="radio-inline">
  <input type="radio" name="typep" id="inlineRadio1" value="1"> Espèces
</label>
<label class="radio-inline">
  <input type="radio" name="typep" id="inlineRadio2" value="2"> RIB
</label>
<label class="radio-inline">
  <input type="radio" name="typep" id="inlineRadio3" value="3"> Autres
</label>
        <hr/>
<p>Seulement si déjà enregistré dans le système </p>
<div class="input-group">
    <span class="input-group-addon">@</span>
    <input type="text" name="email" class="form-control"  placeholder="email">
  </div>
<br/>
<p>Sinon</p>
<hr>
<br/>
    <div class="input-group">
    <span class="input-group-addon">Nom</span>
    <input type="text" name="nom" class="form-control" >
  </div>
<br/>

    <div class="input-group">
    <span class="input-group-addon">Prénom</span>
    <input type="text" name="prenom" class="form-control" >
  </div>
<br/>

    <div class="input-group">
    <span class="input-group-addon">Adresse</span>
    <input type="text" name="adresse" class="form-control" >
  </div>
<br/>
    <div class="input-group">
    <span class="input-group-addon">Code Postal</span>
    <input type="text" name="cp" class="form-control" >
  </div>
<br/>
    <div class="input-group">
    <span class="input-group-addon">Ville</span>
    <input type="text" name="city" class="form-control" >
  </div>
<br/>
    <div class="input-group">
    <span class="input-group-addon">Téléphone</span>
    <input type="text" name="phone" class="form-control" >
  </div>
<br/>
    <div class="input-group">
    <span class="input-group-addon">Mail</span>
    <input type="text" name="eemail" class="form-control" >
  </div>
<br/>


 <button type="submit" name="valider" class="btn btn-info">Valider </button>
<br/>
  </form>

                                        </div>
        </div>
	<div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<h4>Ensemble pour l'Afrique</h4>
					<p>
						Paris (75)<br/>
						01 39 15 62 21, <br/>
						France.
					</p>
				</div><!-- /col-lg-4 -->
				
				<div class="col-lg-4">
					<h4>Réseaux sociaux</h4>
					<p>
						<a href="#">Facebook</a><br/>
						<a href="#">Twitter</a><br/>
                                                <a href="#">Youtube</a><br/>
						
					</p>
				</div><!-- /col-lg-4 -->
				
				<div class="col-lg-4">
					<h4>A propos d'EPA</h4>
					<p>EPA BLABLABLABLAAKZD AJODHN ZBLZAEJFA ZEJFAZOEJBNFAZBFUBFIOA KJNO.</p>
				</div><!-- /col-lg-4 -->
			
			</div>
		
		</div>
	</div>
	<footer>
	<p class ="text-center">
		Made in France - Marmoh tous droits réservés
	</p>
	</footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/bootstrap.min.js"></script>
       
  </body>
</html>