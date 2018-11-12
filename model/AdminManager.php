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

    	public function upArticle($title, $content, $IdArticle)
    	{
			$db = $this->dbConnect();
    		$req = $db->prepare('UPDATE article SET titre = :nvTitre, contenu = :nvContenu WHERE ID = :ID');
			$req->execute(array(
				'nvTitre' => $title,
				'nvContenu' => $content,
				'ID' => $IdArticle
		));
    	}

    	public function reportComment()
   		{
	        $db = $this->dbConnect();
	        $req = $db->prepare('SELECT * FROM commentaire WHERE signalement >= ?');
	        $req->execute(array(1));

	        return $req;
    	}

    	public function deleteComment($idComment)
   		{
	        $db = $this->dbConnect();
	        $req = $db->prepare('DELETE FROM commentaire WHERE ID = ?');
	        $req->execute(array($idComment));

	        return $req;
    	}

    	public function acceptComment($idComment)
   		{
	        $db = $this->dbConnect();
    		$req = $db->prepare('UPDATE commentaire SET signalement = :nvSignalement WHERE ID = :ID');
			$req->execute(array(
				'nvSignalement' => 0,
				'ID' => $idComment
		));
    	}
	}
?>
