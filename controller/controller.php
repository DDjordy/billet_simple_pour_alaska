<?php
require_once('./model/PostManager.php');
require_once('./model/UserManager.php');
require_once('./model/CommentManager.php');
require_once('./model/AdminManager.php');

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

	$commentManager = new commentManager();
	$req = $commentManager->listComment($ID);

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
		$_SESSION['autorisation'] = $userInfo['autorisation'];
		header("Location: index.php");
				}
				else{ echo "Pseudo ou mot de passe incorrect";}
}

function postComment($comment,$articleId,$userId)
{
	$commentManager = new commentManager();
	$req = $commentManager->postComment($comment,$articleId,$userId);

	header("Location: index.php?action=post&ID=$articleId");
}

function reportComment($articleId, $commentId)
{
	$commentManager = new commentManager();
	$req = $commentManager->reportComment($commentId);

	header("Location: index.php?action=post&ID=$articleId");
}

function admin()
{

	$postManager = new PostManager();
	$posts = $postManager->getPosts();

	$adminManager = new AdminManager();
	$reportComments = $adminManager->reportComment();

	require('./view/admin.php');
}
function deleteArticle($IdArticle)
{
	$adminManager = new AdminManager();
	$req = $adminManager->deleteArticle($IdArticle);

	header("Location: index.php?action=admin");
}

function addArticle($title, $content)
{
	$adminManager = new AdminManager();
	$req = $adminManager->addArticle($title, $content);

	header("Location: index.php?action=admin");
}

function editArticle($IdArticle)
{
	$postManager = new PostManager();
	$posts = $postManager->getPosts();

	$postManager = new PostManager();
	$editArticle = $postManager->post($IdArticle);

	require('./view/admin.php');
}

function upArticle($title, $content, $IdArticle)
{
	$adminManager = new AdminManager();
	$req = $adminManager->upArticle($title, $content, $IdArticle);

	header("Location: index.php?action=admin");
}


function deleteComment($idComment)
{
	$adminManager = new AdminManager();
	$req = $adminManager->deleteComment($idComment);

	header("Location: index.php?action=admin");
}


function acceptComment($idComment)
{
	$adminManager = new AdminManager();
	$req = $adminManager->acceptComment($idComment);

	header("Location: index.php?action=admin");
}

?>