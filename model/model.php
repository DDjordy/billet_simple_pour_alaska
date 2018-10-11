<?php
function getPosts() 
{
	$bdd = new PDO('mysql:host=localhost;dbname=alaska;charset=utf8','root','');
	$reponse =  $bdd->query('SELECT * FROM article');
	return $reponse;
}
?>
