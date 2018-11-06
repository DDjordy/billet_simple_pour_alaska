<?php
	class Manager
	{
		protected function dbConnect()
	    {
	        $db = new PDO('mysql:host=localhost;dbname=alaska;charset=utf8','root','');
	        return $db;
	        //  $db = new PDO('mysql:host=projetszlxdjordy.mysql.db;dbname=projetszlxdjordy;charset=utf8','projetszlxdjordy','Lolilol59');

	    }
	}
?>