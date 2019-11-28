<?php


include ("../cores/crudClient.php");

$cc=new crudClient();


$id_client=$_GET['id_client'];


	$cc->activeClient($cc->conn,$id_client);
header('Location:affichageDesClients.php');


?>