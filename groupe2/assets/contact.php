<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
   <link rel="shortcut icon" href="assets/img/user.png">

    <title>Mohamed-Hédi - CV </title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/hover.zoom.js"></script>
    <script src="assets/js/hover.zoom.conf.js"></script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49962352-1', 'auto');
  ga('send', 'pageview');

</script>

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
          <a class="navbar-brand" href="index.html">Mohamed-Hédi</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="about.html">A propos de Moi</a></li>
            <li><a href="blog.html">Expérience</a></li>
            <li><a href="contact.php">Me contacter</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    
    <!-- +++++ Contact Section +++++ -->
    
    <div class="container pt">
        <div class="row mt">
            <div class="col-lg-6 col-lg-offset-3 centered">
                <h3>ME CONTACTER</h3>
                <hr>
                <p>N'hésitez pas à me contacter</p>
            </div>
        </div>
        <div class="row mt">    
            <div class="col-lg-8 col-lg-offset-2">
                <form role="form" method="post">
                  <div class="form-group">
                    <input type="name" name="name" class="form-control" id="NameInputEmail1" placeholder="Votre nom">
                    <br>
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Entrer un E-mail">
                    <br>
                  </div>
                  <div class="form-group">
                    <input type="sujet" name="sujet" class="form-control" id="subjectEmail1" placeholder="Sujet">
                    <br>
                  </div>
                  <textarea class="form-control" name="texte" rows="6" placeholder="Entrer votre texte"></textarea>
                    <br>
                  <button type="submit" name="submit" class="btn btn-success">Envoyer</button>
                </form>  
                <?php
if(isset($_POST['email']) and isset($_POST['sujet']) and isset($_POST['name']) and isset($_POST['texte']))
{
  $destinataire = 'mohamedhedi.mizouri@gmail.com';
  $email = htmlentities($_POST['email']);
 if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',str_replace('&amp;','&',$email)))
 {
  $sujet = 'Contact: '.stripslashes($_POST['sujet']);
  $headers = "From: <".$email.">\n";
  $headers .= "Reply-To: ".$email."\n";
  $message .= "Name : ".stripslashes($_POST['name'])."\n".stripslashes($_POST['texte']);
 $headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"";
 if(mail($destinataire,$sujet,$message,$headers))
  {
 echo "<strong>Votre message a bien &eacute;t&eacute; envoy&eacute;.</strong>";
 }
  else
  {
 echo "<strong style=\"color:#ff0000;\">Une erreur c'est produite lors de l'envois du message.</strong>";
  }
  }
  else
  {
  echo "<strong style=\"color:#ff0000;\">L'email que vous avez entr&eacute; est invalide.</strong>";
  }
}

?>           
            </div>
        </div><!-- /row -->
    </div><!-- /container -->
    
    
    <!-- +++++ Footer Section +++++ -->
    
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h4>My Bunker</h4>
                    <p>
                        Sartrouville (78),<br/>
                        +33 6 42 51 38 43, <br/>
                        France.
                    </p>
                </div><!-- /col-lg-4 -->
                
                <div class="col-lg-4">
                    <h4>Réseaux sociaux</h4>
                    <p>
                        <a href="http://fr.viadeo.com/fr/profile/mohamed-hedi.mizouri">Viadéo</a><br/>
                        <a href="https://www.linkedin.com/pub/mohamedhedi-mizouri/91/281/8ab?domainCountryName=&csrfToken=guest_token#reg-modal">Linkedin</a><br/>
                        
                    </p>
                </div><!-- /col-lg-4 -->
                
                <div class="col-lg-4">
                    <h4>A propos de moi</h4>
                    <p>Ce site a été crée pour montrer mes compétences de manière simple et efficace.</p>
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
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
