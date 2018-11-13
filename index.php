<?php
session_start();
	require('./controller/controller.php');

	if (isset($_GET['action'])) 
    {
		if ($_GET['action'] == 'listPosts') 
        {
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
            try {
            	if (!empty($_POST['pseudo']) AND !empty($_POST['password']) AND !empty($_POST['passwordConfirm'])) 
                {
    				$pseudoLength = strlen($_POST['pseudo']);
                    try {
    						if ($pseudoLength <= 255) 
                            {
                                try {
            						if ($_POST['password'] == $_POST['passwordConfirm']) 
                                        { 
            							 addUser($_POST['pseudo'],$_POST['password']);
                                        }
                                        else
                                        { throw new Exception('Les mots de passe ne correspondent pas'); }
                                    }
                                    catch (Exception $e)
                                    { header('Location: index.php?action=erreur&message='.$e->getMessage());}
                            }
                            else
                            { throw new Exception('Votre pseudo ne doit pas dépasser 255 caractéres'); }
                        }
                        catch (Exception $e)
                        { header('Location: index.php?action=erreur&message='.$e->getMessage());}
    			}
                else
                    { throw new Exception('Tous les champs ne sont pas remplis'); }
                }
                catch (Exception $e)
                { header('Location: index.php?action=erreur&message='.$e->getMessage());}

        }

        if ($_GET['action'] == 'connection') {
            try 
            {
            	if (!empty($_POST['pseudoConnect']) AND !empty($_POST['passwordConnect'])){
            		connection($_POST['pseudoConnect'],$_POST['passwordConnect']);
            	}
                else
                { throw new Exception('Tous les champs ne sont pas remplis'); }
            }
            catch (Exception $e)
            { header('Location: index.php?action=erreur&message='.$e->getMessage());}
        }

        if ($_GET['action'] == 'disconnection') {
        	session_start();
			session_destroy();
			header('Location: index.php');
        }

        if ($_GET['action'] == 'postComment') {
            try 
            {
            	if (!empty($_POST['comment']) && isset($_POST['comment'])) {
                    try
                    {
                		if (isset($_GET['ID']) && isset($_SESSION['ID'])) {

             				postComment(htmlspecialchars($_POST['comment']),$_GET['ID'],$_SESSION['ID']);

                		} 
                        else
                		{ throw new Exception('Vous n\'etes pas connecté'); }	
                    }
                    catch (Exception $e)
                    { header('Location: index.php?action=erreur&message='.$e->getMessage());}
            	}
            	else
            	{ throw new Exception('Tous les champs ne sont pas remplis'); }
            }
            catch (Exception $e)
            { header('Location: index.php?action=erreur&message='.$e->getMessage());}
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

        if ($_GET['action'] == 'erreur') {
            error();
        }

	}// Fin de if isset

	else {
		listPosts();
	}

?>