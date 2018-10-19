<?php
	require_once("Manager.php");

	class UserManager extends Manager
	{
    	public function addUser($pseudo, $password)
    	{
    		$db = $this->dbConnect();
    		$req = $db->prepare("INSERT INTO membre(pseudo, password, autorisation)VALUES(?,?,?)");
    		$req->execute(array($pseudo,$password,1));
    	}

    	public function pseudoVerif($pseudo)
    	{
    		$db = $this->dbConnect();
    		$pseudoVerif = $db->prepare("SELECT * FROM membre WHERE pseudo = ?");
			$pseudoVerif->execute(array($pseudo));

			return $pseudoVerif;
    	}

        public function connection($pseudoConnect, $passwordConnect)
        {
            $db = $this->dbConnect();
            $reqUser = $db->prepare("SELECT * FROM membre WHERE pseudo = ? AND password = ?");
            $reqUser->execute(array($pseudoConnect, $passwordConnect));

            return $reqUser;
        }

	}
?>