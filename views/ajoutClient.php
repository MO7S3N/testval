<html>
<head>
<meta charset="utf8">
</head>
<body>
<?php
/*********************************************************************************************************************/
//1- établir la cnx avec la base de données
//2- récupérer les informations depuis le formulaire
//3- créer un objet chauffeur et l'insérer dans la base [méthode d'insertion dans la base dans la classe chauffeur ]
/*********************************************************************************************************************/
include ("../cores/crudClient.php");

$cc=new crudClient(); //cnx déjà établie dans le constructeur de la classe crudChauffeur
//2-récupérer les informations depuis le formulaire et créer un objet chauffeur à insérer

$sexe="";
$log = "";
 if ($_POST['mot_passe']==$_POST['mot_passe2'])
	
	{
if (isset($_POST['sexe_client'])){$sexe=$_POST['sexe_client'];} else {$sexe="";};


if (isset($_POST['login']) and isset($_POST['nom_client']) and isset($_POST['prenom_client']) and isset($_POST['mot_passe']) and isset($_POST['email_client']) and isset($_POST['datenaissance_client']) and isset($_POST['tel_client']) and isset($_POST['cin_client']) and isset($_POST['adresse_client']) and isset($_POST['codepostal_client']) and isset($_POST['ville_client']) and isset($_POST['pays_client']))
   {
	$hi = $cc->verifier_compte($_POST['login'],$cc->conn);
	foreach($hi as $l){
		$log = $l['count(*)'];
	}
	
	//echo "<script>alert('".$log."')</script>";
	if($log !== "1"){			
	$cl=new Clients($_POST['login'],$_POST['nom_client'],$_POST['prenom_client'],$_POST['mot_passe'],$_POST['email_client'],$sexe,$_POST['datenaissance_client'],$_POST['tel_client'],$_POST['cin_client'],$_POST['adresse_client'],$_POST['codepostal_client'],$_POST['ville_client'],$_POST['pays_client']);	
	$cc->insertClient($cl,$cc->conn);
	echo "Insertion effectuée avec succès";
	}else{
		echo "<script> alert ('login deja existe');</script>";
		echo '<meta http-equiv="refresh" content="0;URL=login.html">'; 
	}

}
else{
	echo "Insertion non effectuée ";
}
session_start();
		$_SESSION['l']=$_POST['login'];
		$_SESSION['p']=$_POST['mot_passe'];
		$_SESSION["nom"] = $_POST['nom_client'];
//blehy t la alolo
$id=$_POST['login'];
//header('location:index.html?id='.$id);
// header('Location: afficher.php');
header('location: login.html');
	}
	else
	{
		echo "<script> alert ('Mot de passe incorrect');</script>";
	}


?>

</body>
</html>