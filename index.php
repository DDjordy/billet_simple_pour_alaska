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

        if ($_GET['action'] == 'postComment') {
        	if (!empty($_POST['comment']) && isset($_POST['comment'])) {
        		if (isset($_GET['ID']) && isset($_SESSION['ID'])) {

     				postComment(htmlspecialchars($_POST['comment']),$_GET['ID'],$_SESSION['ID']);

        		} else
        		{
        			echo "Merci de vous connecter";
        		} 		
        	}
        	else
        	{
        		echo "Tous les champs ne sont pas remplis";
        	}
        }

        if ($_GET['action'] == 'report') 
        {
        	if (isset($_SESSION['ID']))
        	{
        		reportComment($_GET['ID'], $_GET['commentaireID']);
        	}
        }

        if ($_GET['action'] == 'admin') {
        	if (isset($_SESSION['ID']) && $_SESSION['autorisation'] == 2) {
	        	admin();
        	}
        }

        if ($_GET['action'] == 'deleteArticle') {
        	if (isset($_SESSION['ID']) && $_SESSION['autorisation'] == 2) {
	        	deleteArticle($_GET['IdArticle']);
        	}
        }

        if ($_GET['action'] == 'addArticle') {
        	if (isset($_SESSION['ID']) && $_SESSION['autorisation'] == 2) {
        		if (!empty($_POST['title']) && !empty($_POST['content'])) {

        			addArticle($_POST['title'], $_POST['content']);
        		}
        	}
        }
        
        if ($_GET['action'] == 'editArticle') {
        	if (isset($_SESSION['ID']) && $_SESSION['autorisation'] == 2) {

        			editArticle($_GET['IdArticle']);
        		
        	}
        }

        if ($_GET['action'] == 'upArticle') {
        	if (isset($_SESSION['ID']) && $_SESSION['autorisation'] == 2) {

        			upArticle($_POST['title'], $_POST['content'], $_GET['IdArticle']);
        	}
        }

        if ($_GET['action'] == 'deleteComment') {
            if (isset($_SESSION['ID']) && $_SESSION['autorisation'] == 2) {

                   deleteComment($_GET['idComment']);
            }
        }

        if ($_GET['action'] == 'acceptComment') {
            if (isset($_SESSION['ID']) && $_SESSION['autorisation'] == 2) {

                  acceptComment($_GET['idComment']);
            }
        }

	}// Fin de if isset

	else {
		listPosts();
	}

?>