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
	}
