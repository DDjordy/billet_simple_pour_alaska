<?php
require('./controller/controller.php');

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'listPosts') {
		listPosts();
	}

}// Fin de if isset
else {
	listPosts();
}

?>