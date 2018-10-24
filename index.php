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
        if ($_GET['action'] == 'connection') {
        	if (!empty($_POST['pseudoConnect']) AND !empty($_POST['passwordConnect'])){
        		connection($_POST['pseudoConnect'],$_POST['passwordConnect']);
        	}
        }

        if ($_GET['action'] == 'disconnection') {
        	session_start();
			session_destroy();
			header('Location: index.php');
        }
	}// Fin de if isset

	else {
		listPosts();
	}

?>