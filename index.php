<?php
	require('./controller/controller.php');

	if (isset($_GET['action'])) {

		if ($_GET['action'] == 'listPosts') {
			listPosts();
		}

	    if ($_GET['action'] == 'post') {
            if (isset($_GET['ID']) && $_GET['ID'] > 0) {
                post($_GET['ID']);
            }
        }

       if ($_GET['action'] == 'registration') {
       		registration();
            }
	}// Fin de if isset

	else {
		listPosts();
	}

?>