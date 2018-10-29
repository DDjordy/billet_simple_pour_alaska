<?php
	require_once("Manager.php");

	class CommentManager extends Manager
	{
    	public function postComment($comment,$articleId,$userId)
    	{
    		$db = $this->dbConnect();
    		$ins = $db->prepare('INSERT INTO commentaire (contenu, membreID, articleID) VALUES (?,?,?)');
    		$ins->execute(array($comment,$userId,$articleId));
    	}

    	public function listComment($articleId)
    	{
    		$db = $this->dbConnect();
    		$req = $db->prepare('SELECT * FROM commentaire WHERE articleID = ?');
    		$req->execute(array($articleId));

			$commentaire = $req->fetch();
    		return $commentaire;
    	}

	}
