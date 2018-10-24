<?php
require_once('./model/PostManager.php');
require_once('./model/UserManager.php');

function listPosts() 
{
	$postManager = new PostManager();
	$posts = $postManager->getPosts();
	require('./view/listPosts.php');
}

function post($ID)
{
	$postManager = new PostManager();
	$post = $postManager->post($ID);
	require('./view/postView.php');
}

function registration()
{
	require('./view/registration.php');
}

function addUser($pseudo, $password)
{
	$pseudo = htmlspecialchars($pseudo);
	$password = sha1($password);

	$userManager = new UserManager();
	$pseudoVerif = $userManager->pseudoVerif($pseudo);
	$pseudoExist = $pseudoVerif->rowCount();
	if ($pseudoExist == 0){ 

		$userManager = new UserManager();
		$addUser = $userManager->addUser($pseudo, $password);
		echo "VOUS ETES INSCRIT";
		header('Location: index.php');
  		exit();
	}
}

function connection($pseudo,$password)
{
	$userManager = new UserManager();
	$reqUser = $userManager->connection($pseudo, sha1($password));
	$userExist = $reqUser->rowCount();
		
	if ($userExist == 1) {
		$userInfo = $reqUser->fetch();
		$_SESSION['ID'] = $userInfo['ID'];
		$_SESSION['pseudo'] = $userInfo['pseudo'];
		header("Location: index.php?ID=".$_SESSION['ID']);
				}
				else{ echo "Pseudo ou mot de passe incorrect";}
}

