<?php
session_start();
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

        if($_GET['action'] == 'addUser') {
        	if (!empty($_POST['pseudo']) AND !empty($_POST['password']) AND !empty($_POST['passwordConfirm'])) {
					$pseudoLength = strlen($_POST['pseudo']);
						if ($pseudoLength <= 255) {
							if ($_POST['password'] == $_POST['passwordConfirm']) { 
							addUser($_POST['pseudo'],$_POST['password']);
					}
				}
			}
        }
	}// Fin de if isset

	else {
		listPosts();
	}

?>