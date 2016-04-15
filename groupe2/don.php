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
				<h3>Faire un Don</h3>
				<hr>
				<p>N'hésitez pas à faire un don pour EPA, qu'il soit ponctuel ou régulier!</p>
			</div>
		</div>
    <div class="row mt">	
			<div class="col-lg-8 col-lg-offset-2">
          <div class="form-group centered">
            <form role = "form" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type='text' value="" name="amount" list="montant" autocomplete="off" placeholder="Autre Montant"  onChange="checkAmount(this.value, 'single')" onkeyUp="checkAmount(this.value, 'single')"></input>
              <datalist name="amount" id="montant" >
              <option value='10'>10 €</option>
              <option value='25'>25 €</option>
              <option value='50'>50 €</option>
              <option value='100'>100 €</option>
              </datalist>
            <input name="currency_code" type="hidden" value="EUR" />
            <input name="return" type="hidden" value="http://www.marmoh.com/SIA/IPN.php" />
            <input name="cancel_return" type="hidden" value="http://www.marmoh.com/SIA/don.php" />
            <input name="notify_url" type="hidden" value="http://marmoh.com/SIA/IPN.php" />
            <input name="cmd" type="hidden" value="_xclick" />
            <input name="business" type="hidden" value="mohamedhedidu78-facilitator@hotmail.fr" />
            <input name="item_name" type="hidden" value="Don EPA" />
            <input name="no_note" type="hidden" value="1" />
            <input name="lc" type="hidden" value="FR" />
             <input type="hidden" value="MARMOHZER" name="don-amount" id="don-amount" />
              <input type="hidden" value="" name="don-type" id="don-type" />
            <input name="bn" type="hidden" value="PP-BuyNowBF" />
           <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
           <img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
        </form>
				
                                </div>
			</div>
                </div>
              <div class="alert alert-success notice centered" id="notice" >
             </div> 
            <p>Les dons faits à approche soutiennent et assurent le maintien des activités de l'association. Votre don permettra de promouvoir le développement en Afrique
En choisissant de faire un don ponctuel), vous vous engagez auprès des actions menées par l'association Ensemble pour l'Afrique</p>
           
		
		</div><!-- /row -->
	</div><!-- /container -->
       
	       	 	  	
	
	<!-- +++++ Footer Section +++++ -->
	
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
        <script type="text/javascript">
    function date_heure(id)
{
        date = new Date;
        annee = date.getFullYear();
        moi = date.getMonth();
        mois = new Array('Janvier', 'F&eacute;vrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Ao&ucirc;t', 'Septembre', 'Octobre', 'Novembre', 'D&eacute;cembre');
        j = date.getDate();
        jour = date.getDay();
        jours = new Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        resultat = 'Nous sommes le '+jours[jour]+' '+j+' '+mois[moi]+' '+annee+' il est '+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = resultat;
        setTimeout('date_heure("'+id+'");','1000');
        return true;
}
    function setDon(amount,type){
	document.getElementById('don-amount').value = amount;
	document.getElementById('don-type').value = type;
	
	if(type == 'single'){
	document.getElementById('notice').innerHTML = ' Avec la r&eacute;duction de 66 %*, votre don ne vous revient en r&eacute;alit&eacute; &agrave; '+(Math.round((amount*0.34)*100)/100).toFixed(2)+' &#8364;';
	
	}
	
	
}
    function unsetRadio(){
    var checkboxes = document.getElementsByName('amount');
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = false;
    }
}

function unsetFree(){

if (document.getElementById("amount-free-single")) {
   document.getElementById('amount-free-single').value = '';
}
if (document.getElementById("amount-free-multi")) {
    document.getElementById('amount-free-multi').value = '';
}

}

function checkAmount(amount, type){ 
	var reg = new RegExp("^[0-9]+$");
	if(amount.match(reg)){
		setDon(amount,type);
	}else{
		document.getElementById('amount-free-single').value = amount.substring(0,amount.length-1);
	} 
}</script>
  </body>
</html>
