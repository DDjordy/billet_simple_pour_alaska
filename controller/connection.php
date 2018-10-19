<?php

require_once('../model/UserManager.php');

if (isset($_POST['connection'])) {
	$pseudoConnect = htmlspecialchars($_POST['pseudoConnect']);
	$passwordConnect = sha1($_POST['passwordConnect']);

	if (!empty($pseudoConnect) AND !empty($passwordConnect)) 
	{

		$userManager = new UserManager();
		$reqUser = $userManager->connection($pseudoConnect, $passwordConnect);
		$userExist = $reqUser->rowCount();

		if ($userExist == 1) {
			

		}
		else
		{
			$erreur = "Pseudo ou mot de passe incorrect";
		}
	}
	else
	{
		$erreur = "Tous les champs doivent être complétés !";
	}
}

if (!empty($erreur)) {
	echo $erreur;
}
?>

