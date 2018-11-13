<?php
require_once('./model/PostManager.php');
require_once('./model/UserManager.php');
require_once('./model/CommentManager.php');
require_once('./model/AdminManager.php');

// Affiche l'enssemble des articles
function listPosts() 
{
	$postManager = new PostManager();
	$posts = $postManager->getPosts();
	require('./view/listPosts.php');
}

// Affiche uniquement l'article avec l'ID $ID
// Affiche les commentaires associer a l'article $ID
function post($ID)
{
	$postManager = new PostManager();
	$post = $postManager->post($ID);
	
	$commentManager = new commentManager();
	$req = $commentManager->listComment($ID);

	require('./view/postView.php');
}

// Affiche le formulaire d'inscription
function registration()
{
	require('./view/registration.php');
}

// Ajouter un utilisateur 
function addUser($pseudo, $password)
{
	$pseudo = htmlspecialchars($pseudo);
	$password = sha1($password);

	$userManager = new UserManager();
	$pseudoVerif = $userManager->pseudoVerif($pseudo);
	$pseudoExist = $pseudoVerif->rowCount();
	try
	{
		if ($pseudoExist == 0){ 

			$userManager = new UserManager();
			$addUser = $userManager->addUser($pseudo, $password);
			echo "VOUS ETES INSCRIT";
			header('Location: index.php');
	  		exit();
		}
		else
	    { throw new Exception('Votre pseudo est déja utilisé'); }
	}
	catch (Exception $e)
    { header('Location: index.php?action=erreur&message='.$e->getMessage());}

}

// gere la connexion des utilisateurs
function connection($pseudo,$password)
{
	$userManager = new UserManager();
	$reqUser = $userManager->connection($pseudo, sha1($password));
	$userExist = $reqUser->rowCount();
	try
	{	
		if ($userExist == 1) {
			$userInfo = $reqUser->fetch();
			$_SESSION['ID'] = $userInfo['ID'];
			$_SESSION['pseudo'] = $userInfo['pseudo'];
			$_SESSION['autorisation'] = $userInfo['autorisation'];
			header("Location: index.php");
		}
		else
	    { throw new Exception('Pseudo ou mot de passe incorrect'); }
	}
	catch (Exception $e)
    { header('Location: index.php?action=erreur&message='.$e->getMessage());}
}

// Permet d'ecrire un commentaire dans un article
function postComment($comment,$articleId,$userId)
{
	$commentManager = new commentManager();
	$req = $commentManager->postComment($comment,$articleId,$userId);

	header("Location: index.php?action=post&ID=$articleId");
}

// Permet de report un commentaire
function reportComment($articleId, $commentId)
{
	$commentManager = new commentManager();
	$req = $commentManager->reportComment($commentId);

	header("Location: index.php?action=post&ID=$articleId");
}

// Affiche le panel d'administration du blog
function admin()
{

	$postManager = new PostManager();
	$posts = $postManager->getPosts();

	$adminManager = new AdminManager();
	$reportComments = $adminManager->reportComment();

	$adminManager = new AdminManager();
	$comments = $adminManager->comment();

	require('./view/admin.php');
}

// Permet de supprimer un article
function deleteArticle($IdArticle)
{
	$adminManager = new AdminManager();
	$req = $adminManager->deleteArticle($IdArticle);

	header("Location: index.php?action=admin");
}

// Permet d'ajouter un article
function addArticle($title, $content)
{
	$adminManager = new AdminManager();
	$req = $adminManager->addArticle($title, $content);

	header("Location: index.php?action=admin");
}

//Permet d'éditer un article
function editArticle($IdArticle)
{
	$postManager = new PostManager();
	$posts = $postManager->getPosts();

	$postManager = new PostManager();
	$editArticle = $postManager->post($IdArticle);

	$adminManager = new AdminManager();
	$reportComments = $adminManager->reportComment();

	$adminManager = new AdminManager();
	$comments = $adminManager->comment();

	require('./view/admin.php');
}

// Permet de mettre a jour un article
function upArticle($title, $content, $IdArticle)
{
	$adminManager = new AdminManager();
	$req = $adminManager->upArticle($title, $content, $IdArticle);

	header("Location: index.php?action=admin");
}

// Permet de supprimer un commentaire
function deleteComment($idComment)
{
	$adminManager = new AdminManager();
	$req = $adminManager->deleteComment($idComment);

	header("Location: index.php?action=admin");
}

// Permet de remettre a 0 les signalement d'un commentaire
function acceptComment($idComment)
{
	$adminManager = new AdminManager();
	$req = $adminManager->acceptComment($idComment);

	header("Location: index.php?action=admin");
}

function error()
{
	require('./view/errorView.php');	
}

?>