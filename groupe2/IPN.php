
                    <?php
                    include_once('function.php');
// lire le formulaire provenant du système PayPal et ajouter 'cmd'
    $req = 'cmd=_notify-validate';
   
    foreach ($_POST as $key => $value) {
        $value = urlencode(stripslashes($value));
        $req .= "&$key=$value";
    }
     
    // renvoyer au système PayPal pour validation
 // post back to PayPal system to validate
$header .= "POST /cgi-bin/webscr HTTP/1.1\r\n";
$header .= "Host: www.sandbox.paypal.com\r\n";
$header .= "Connection: close\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
    
    $item_name = $_POST['item_name'];
    
    $item_number = $_POST['item_number'];
    $payment_status = $_POST['payment_status'];
    $payment_amount = $_POST['mc_gross'];
    $payment_currency = $_POST['mc_currency'];
    $txn_id = $_POST['txn_id'];
    $receiver_email = $_POST['receiver_email'];
    $payer_email = $_POST['payer_email'];
    $id_user = $_POST['custom'];
    $prenom = $_POST['first_name'];
    $nom = $_POST['last_name'];
    $adresse = $_POST['address_street'];
    $cp = $_POST['address_zip'];
    $city = $_POST['address_city'];
    $phone = $_POST['contact_phone'];
    $etat = $_POST['pending_reason'];
    $date = date('Y-m-d');
    if (!$fp) {
    } else {
        fputs ($fp, $header . $req);
        while (!feof($fp)) {
            $res = fgets ($fp, 1024);
            if (strcmp (trim($res), "VERIFIED") == 0){
                
                 if(strcmp (trim($payment_status),"Completed")==0 )
                 {
                     if(strcmp (trim($item_name),"Don EPA")==0 ){
                          if(enregistrerDon($nom, $prenom, $payer_email, $phone, $adresse, $city, $cp, $txn_id, "Validé",$payment_amount,0) ==1);
                     //envoyerMail("mohamedhedidu78@hotmail.fr", "mohamedhedi.mizouri@gmail.com", $payment_amount);
                     }
                     else if (strcmp (trim($item_name),"Cotisation")==0 ){
                         echo' COTISATION ';
                     }
                   
                    
                 }
                 else if (strcmp (trim($payment_status),"Pending")==0 && strcmp (trim($etat),"paymentreview")==0)
                 {
                     if(strcmp (trim($item_name),"Don EPA")==0 ){
                         
                          if(enregistrerDon($nom, $prenom, $payer_email, $phone, $adresse, $city, $cp, $txn_id, "Validé",$payment_amount,0) ==1);
                     //envoyerMail("mohamedhedidu78@hotmail.fr", "mohamedhedi.mizouri@gmail.com", $payment_amount);
                     }
                     else if (strcmp (trim($item_name),"Don EPA")==0 ){
                         echo' COTISATION ';
                     }
                   ;
                 }
                 else 
                 {
                     echo'Votre paiement est invalide ! Merci de réessayer avec une nouvelle carte <br/>';
                    
                header('Location: http://www.marmoh.com/SIA/erreur.php');
                 exit();

                                   
                 }
                     
                 }
            else if (strcmp(trim($res), "INVALID") == 0) {
            
        } 
        
    }
        fclose ($fp);
    }

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
   <link rel="shortcut icon" href="../assets/img/user.png">

    <title>Don EPA</title>

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

	
	<!-- +++++ Contact Section +++++ -->
	
	<div class="container pt">
		<div class="row mt">
			<div class="col-lg-6 col-lg-offset-3 centered">
				<h3>Bonjour <?php echo $prenom?></h3>
				<hr>
				<p>L'association EPA vous remercie de votre <?php if(strcmp (trim($item_name),"Don EPA")==0 ) echo'don'; else echo'adhésion';?>!</p>
			</div>
                    
		</div>
            
  	<div class="row mt">
       <!-- Button trigger modal -->
    

      
        <div class="col-lg-6">
          <h4>Vos informations</h4>
          <p>Nom : <?php echo$nom; ?> <br/>Prenom : <?php echo $prenom;?></p>
          <p>Adresse : <?php echo $adresse.' '.$city.' '.$cp; ?><br/> Mail : <?php echo $payer_email ?></p>
      
        </div>

        <div class="col-lg-6">
          <h4>Montant <?php if(strcmp (trim($item_name),"Don EPA")==0 ) echo'don'; else echo'adhésion';?> </h4>
          <p><?php echo $payment_amount+$payment_currency?></p>          
        </div>
   </div>
            <h4> Si une de ces informations est erroné, veuillez envoyé un mail à <a>contact@EPA.org</a>.<br/> </h4><hr>
            <h4 class="centered"> A bientôt ! </h4>
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