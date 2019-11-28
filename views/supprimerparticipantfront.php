<?php
include("../cores/participantCore.php");



if(isset($_POST['id'])) 
{   
	
	$participantCore=new participantCore();
	$participantCore->supprimerparticipant($_POST['id']);
	header('Location: ../views/choixevents.php');
	
}

else
{
echo "ma7abich ifasa5";
}

?>