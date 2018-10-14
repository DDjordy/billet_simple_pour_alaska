<?php

	require_once("Manager.php");

	class PostManager extends Manager
	{
    	public function getPosts()
    	{
    		$db = $this->dbConnect();
    		$req = $db->query('SELECT * FROM article');
    		return $req;
    	}

   		public function getPost($postId)
   		 {
        	$db = $this->dbConnect();
        	$req = $db->prepare('SELECT * FROM article WHERE id = ?');
        	$req->execute(array($postId));
        	$post = $req->fetch();
        	return $post;
    	}

	}
