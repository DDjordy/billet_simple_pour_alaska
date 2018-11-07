<?php
	require_once("Manager.php");

	class AdminManager extends Manager
	{
    	public function deleteArticle($IdArticle)
    	{
    		$db = $this->dbConnect();
			$req = $db->prepare('DELETE FROM article WHERE ID = :IdArticle');
			$req->execute(array(
			'IdArticle' => $IdArticle
			));
    	}

    	public function addArticle($title, $content)
    	{
    		$db = $this->dbConnect();
			$req = $db->prepare('INSERT INTO article(titre, contenu) VALUES(:title, :content)');
			$req->execute(array(
			'title' => $title,
			'content' => $content
			));
    	}
	}
?>
