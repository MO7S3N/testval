
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Classic Style a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Products :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Classic Style Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
<script src="js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
<link href='//fonts.googleapis.com/css?family=Cabin:400,500,600,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'></head>






<body>
<?php 
//include ("../entities/client.php");
include_once 'config.php';
//$log="admin";
//$pwd="admin";
/*$servername="localhost";
	$username="root";
	$password="";
	$dbname="dblogin";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", 
	$username, $password);
	$req="select * from users where user_name='$login' && user_pass='$pwd'";
	$rep=$conn->query($req);
	$res=$rep->fetchAll();
	*/
$c=new config();
$conn=$c->getConnexion();
$clt=new Clients($_POST['login'],'','',$_POST['mot_passe'],'','','','','','','','','','');
$u=$clt->Logedin($conn,$_POST['login'],$_POST['mot_passe']);

	//var_dump($u);
//$logR=$_POST['login'];
//$pwdR=$_POST['pwd'];
$vide=false;
if (!empty($_POST['login']) && !empty($_POST['mot_passe'])){
	
	foreach($u as $t){
		$vide=true;
	if ($t['login']==$_POST['login'] && $t['mot_passe']==$_POST['mot_passe'] && $t['etat']==1){
		
		session_start();
		$_SESSION['l']=$_POST['login'];
		$_SESSION['p']=$_POST['mot_passe'];
		$_SESSION["nom"] = $t['nom_client'];
        $_SESSION['pre']=$t['prenom_client'];
	    $_SESSION['e']=$t['email_client'];
	    $_SESSION['s']=$t['sexe_client'];
	    $_SESSION['d']=$t['datenaissance_client'];
	    $_SESSION['ad']=$t['adresse_client'];
	    $_SESSION['te']=$t['tel_client'];
	    $_SESSION['c']=$t['cin_client'];
	    $_SESSION['co']=$t['codepostal_client'];
	    $_SESSION['v']=$t['ville_client'];
	    $_SESSION['pa']=$t['pays_client'];
	    $_SESSION['id']=$t['id_client'];
		
		header("location:informationspersonnelllesfront.php");
		
		}
		
		if ($t['login']==$_POST['login'] && $t['mot_passe']==$_POST['mot_passe'] && $t['etat']==0 ){

				 echo '<body onLoad="alert(\'Votre Compte a été desactivé Cliquer sur le lien pour activer votre compte...\')">'; ?>
			<center>
				<div class="alert alert-danger" >
        <strong>Oh snap!</strong> Pour récupérer votre compte Cliquer sur le lien au dessous .
      </div></center>
	  <center>
				<a href="recuperer_client.php">Récupérer votre compte</a>
				</center>
				<?php 
				
}  


			
	
}
if ($vide==false) { 
         // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
         echo '<body onLoad="alert(\'Membre non reconnu...\')">'; 
         // puis on le redirige vers la page d'accueil
         echo '<meta http-equiv="refresh" content="0;URL=login.html">'; 
      } 
}	  
 
else { 
      echo "Les variables du formulaire ne sont pas déclarées.<br> Vous devez remplir le formulaire"; 
     ?> <a href="login.html">Retour au formulaire</a>	 <?php 
}  


?> 
</body>
</html>