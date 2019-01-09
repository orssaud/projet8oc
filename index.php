<?php
session_start();

require('controller/controller.php');

if (isset($_GET['action'])) {

    if ($_GET['action'] == 'listPosts') {
    	if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
			logged();
		}
		else{
			listPosts();
		}
        
    }
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'login'){    
	    if (isset($_POST['password']) && isset($_POST['account'])){ 
			if(connect($_POST['account'], $_POST['password'])) {

				        logged();
				       
			}
			else {
				 echo 'Mauvais identifiant ou mot de passe !';
				login();
			}
		}
		else{
			login();
		}
	}
	elseif ($_GET['action'] == 'save'){
		if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
			if (isset($_POST['text'])){ // add title cheker
				saveChapter($_POST['title'], $_POST['text']);
			}
			else{
				echo "aucun contenu à sauvegarder";
			}
		}
		else{
			listPosts();
		}
	}
	elseif ($_GET['action'] == 'newChapter'){
		if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
			newChapter();
		}
		else{
			listPosts();
		}
	}
	elseif ($_GET['action'] == 'disconect'){
		destroySession();
		
	}
	
}
else {
	if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
		logged();
	}
	else{
		listPosts();
	}
    
}
