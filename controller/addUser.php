<?php

require_once('../model/UserManager.php');

	if (isset($_POST['registration'])) 
	{

		if (!empty($_POST['pseudo']) AND !empty($_POST['password']) AND !empty($_POST['passwordConfirm'])) 
		{ 
				$pseudo = htmlspecialchars($_POST['pseudo']);
				$password = sha1($_POST['password']);
				$passwordConfirm = sha1($_POST['passwordConfirm']);

				$pseudoLength = strlen($pseudo);
				if ($pseudoLength <= 255)
			{

						$userManager = new UserManager();
						$pseudoVerif = $userManager->pseudoVerif($pseudo);
						$pseudoExist = $pseudoVerif->rowCount();
					if ($pseudoExist == 0)
					{ 

						if ($password == $passwordConfirm)
						{ 
							$erreur = "Bienvenue !";
							$userManager = new UserManager();
							$addUser = $userManager->addUser($pseudo, $password);
						} 
						
						else{
							$erreur = "vos mot de passe ne correspondent pas !";}

					}
					else{
						$erreur = "Votre pseudo n'est pas disponible !";}

				}
				else{
					$erreur = "Votre pseudo ne dois pas dépasser 255 caractères !";}

		}
		else{
				$erreur = "Tous les champs doivent être complétés !";}
	}
		
		

if (isset($erreur)) {
	echo $erreur;
}
?>

