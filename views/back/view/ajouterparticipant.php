<?php
include('../cores/participantCore.php');


if(isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['pays'])) 
	{
		$participant= new participant($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['pays']);
		$participantCore= new participantCore();
		$participantCore->ajouterparticiper($participant);
		header('Location: ../view/ajouterparticipant.html');
		
	}


?>