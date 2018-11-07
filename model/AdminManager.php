<?php
	require_once("Manager.php");

	class AdminManager extends Manager
	{
    	public function deleteArticle($IdArticle)
    	{
    		$db = $this->dbConnect();
			$req = $db->prepare('DELETE fROM article WHERE ID = :IdArticle');
			$req->execute(array(
			'IdArticle' => $IdArticle
			));

    	}
	}
?>
