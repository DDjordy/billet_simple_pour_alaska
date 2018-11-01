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
    		$req = $db->prepare('SELECT commentaire.date, commentaire.contenu, membre.pseudo 
            FROM commentaire 
            INNER JOIN membre 
            ON commentaire.membreID = membre.ID
            WHERE commentaire.articleID = ?');
    		$req->execute(array($articleId));

    		return $req;
    	}

	}
