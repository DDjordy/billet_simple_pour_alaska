<?php
	require_once("Manager.php");

	class AdminManager extends Manager
	{
    	public function deleteArticle()
    	{
    		$db = $this->dbConnect();
    		$req = $db->query('SELECT * FROM article');
    		return $req;
    	}
	}
?>
